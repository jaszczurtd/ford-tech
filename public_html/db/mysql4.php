<?php
/***************************************************************************
 *                                 mysql4.php
 *                            -------------------
 *   begin                : Saturday, Feb 13, 2001
 *   copyright            : (C) 2001 The phpBB Group
 *   email                : supportphpbb.com
 *
 *   Rewritten to use mysqli for PHP 7/8 compatibility
 *
 ***************************************************************************/

if(!defined("SQL_LAYER"))
{

define("SQL_LAYER","mysql4");

class sql_db
{

	var $db_connect_id;
	var $query_result;
	var $row = array();
	var $rowset = array();
	var $num_queries = 0;
	var $in_transaction = 0;

	//
	// Constructor
	//
	function __construct($sqlserver, $sqluser, $sqlpassword, $database, $persistency = true)
	{
		$this->persistency = $persistency;
		$this->user = $sqluser;
		$this->password = $sqlpassword;
		$this->server = $sqlserver;
		$this->dbname = $database;

		$host = ($this->persistency) ? 'p:' . $this->server : $this->server;
		$this->db_connect_id = mysqli_connect($host, $this->user, $this->password);

		if( $this->db_connect_id )
		{
			if( $database != "" )
			{
				$this->dbname = $database;
				$dbselect = mysqli_select_db($this->db_connect_id, $this->dbname);
				mysqli_query($this->db_connect_id, 'SET NAMES latin2 COLLATE latin2_general_ci');

				if( !$dbselect )
				{
					mysqli_close($this->db_connect_id);
					$this->db_connect_id = false;
				}
			}

			return $this->db_connect_id;
		}
		else
		{
			return false;
		}
	}

	// Old-style constructor alias for PHP 4/5 compatibility
	function sql_db($sqlserver, $sqluser, $sqlpassword, $database, $persistency = true)
	{
		return $this->__construct($sqlserver, $sqluser, $sqlpassword, $database, $persistency);
	}

	//
	// Other base methods
	//
	function sql_close()
	{
		if( $this->db_connect_id )
		{
			//
			// Commit any remaining transactions
			//
			if( $this->in_transaction )
			{
				mysqli_query($this->db_connect_id, "COMMIT");
			}

			return mysqli_close($this->db_connect_id);
		}
		else
		{
			return false;
		}
	}

	//
	// Base query method
	//
	function sql_query($query = "", $transaction = FALSE)
	{
		global $show_queries;
		if ( $show_queries )
		{
			global $queries;
		}
		//
		// Remove any pre-existing queries
		//
		unset($this->query_result);

		if( $query != "" )
		{
			if ( $show_queries )
			{
				$queries .= $query . '<hr>';
			}
			$this->num_queries++;
			if( $transaction == BEGIN_TRANSACTION && !$this->in_transaction )
			{
				$result = mysqli_query($this->db_connect_id, "BEGIN");
				if(!$result)
				{
					return false;
				}
				$this->in_transaction = TRUE;
			}

			$this->query_result = mysqli_query($this->db_connect_id, $query);
		}
		else
		{
			if( $transaction == END_TRANSACTION && $this->in_transaction )
			{
				$result = mysqli_query($this->db_connect_id, "COMMIT");
			}
		}

		if( $this->query_result )
		{
			if (is_object($this->query_result)) {
				unset($this->row[spl_object_id($this->query_result)]);
				unset($this->rowset[spl_object_id($this->query_result)]);
			}

			if( $transaction == END_TRANSACTION && $this->in_transaction )
			{
				$this->in_transaction = FALSE;

				if ( !mysqli_query($this->db_connect_id, "COMMIT") )
				{
					mysqli_query($this->db_connect_id, "ROLLBACK");
					return false;
				}
			}

			return $this->query_result;
		}
		else
		{
			if( $this->in_transaction )
			{
				mysqli_query($this->db_connect_id, "ROLLBACK");
				$this->in_transaction = FALSE;
			}
			return false;
		}
	}

	//
	// Other query methods
	//
	function sql_numrows($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		return ( $query_id ) ? mysqli_num_rows($query_id) : false;
	}

	function sql_affectedrows()
	{
		return ( $this->db_connect_id ) ? mysqli_affected_rows($this->db_connect_id) : false;
	}

	function sql_numfields($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		return ( $query_id ) ? mysqli_num_fields($query_id) : false;
	}

	function sql_fieldname($offset, $query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
			$field = mysqli_fetch_field_direct($query_id, $offset);
			return $field ? $field->name : false;
		}
		return false;
	}

	function sql_fieldtype($offset, $query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if ( $query_id )
		{
			$field = mysqli_fetch_field_direct($query_id, $offset);
			return $field ? $field->type : false;
		}
		return false;
	}

	function sql_fetchrow($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if( $query_id )
		{
			$this->row[spl_object_id($query_id)] = @mysqli_fetch_array($query_id, MYSQLI_ASSOC);
			return $this->row[spl_object_id($query_id)];
		}
		else
		{
			return false;
		}
	}

	function sql_fetchrowset($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if( $query_id )
		{
			unset($this->rowset[spl_object_id($query_id)]);
			unset($this->row[spl_object_id($query_id)]);

			$result = array();
			while($row = @mysqli_fetch_array($query_id, MYSQLI_ASSOC))
			{
				$result[] = $row;
			}

			return $result;
		}
		else
		{
			return false;
		}
	}

	function sql_fetchfield($field, $rownum = -1, $query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if( $query_id )
		{
			if( $rownum > -1 )
			{
				mysqli_data_seek($query_id, $rownum);
				$row = mysqli_fetch_array($query_id, MYSQLI_ASSOC);
				$result = isset($row[$field]) ? $row[$field] : false;
			}
			else
			{
				if( empty($this->row[spl_object_id($query_id)]) && empty($this->rowset[spl_object_id($query_id)]) )
				{
					if( $this->sql_fetchrow() )
					{
						$result = $this->row[spl_object_id($query_id)][$field];
					}
				}
				else
				{
					if( $this->rowset[spl_object_id($query_id)] )
					{
						$result = $this->rowset[spl_object_id($query_id)][0][$field];
					}
					else if( $this->row[spl_object_id($query_id)] )
					{
						$result = $this->row[spl_object_id($query_id)][$field];
					}
				}
			}

			return isset($result) ? $result : false;
		}
		else
		{
			return false;
		}
	}

	function sql_rowseek($rownum, $query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		return ( $query_id ) ? mysqli_data_seek($query_id, $rownum) : false;
	}

	function sql_nextid()
	{
		return ( $this->db_connect_id ) ? mysqli_insert_id($this->db_connect_id) : false;
	}

	function sql_freeresult($query_id = 0)
	{
		if( !$query_id )
		{
			$query_id = $this->query_result;
		}

		if ( $query_id && is_object($query_id) )
		{
			unset($this->row[spl_object_id($query_id)]);
			unset($this->rowset[spl_object_id($query_id)]);

			@mysqli_free_result($query_id);

			return true;
		}
		else
		{
			return false;
		}
	}

	function sql_error()
	{
		$result['message'] = @mysqli_error($this->db_connect_id);
		$result['code'] = @mysqli_errno($this->db_connect_id);

		return $result;
	}

} // class sql_db

} // if ... define

?>
