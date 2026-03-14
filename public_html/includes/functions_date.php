<?php

function mkrealdate($day,$month,$birth_year)
{
	// range check months
	if ( $month < 1 || $month > 12)
	{
		return 'error';
	}
	// range check days
	switch ($month)
	{
		case 1: if ( $day > 31) return 'error';
		break;
		case 2: if ( $day > 29)
			return 'error';
			$epoch = $epoch + 31;
			break;
		case 3: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 59;
			break;
		case 4: if ( $day > 30)
			return 'error' ;
			$epoch = $epoch + 90;
			break;
		case 5: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 120;
			break;
		case 6: if ( $day > 30)
			return 'error';
			$epoch = $epoch + 151;
			break;
		case 7: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 181;
			break;
		case 8: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 212;
			break;
		case 9: if ( $day > 30)
			return 'error';
			$epoch = $epoch + 243;
			break;
		case 10: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 273;
			break;
		case 11: if ( $day > 30)
			return 'error';
			$epoch = $epoch + 304;
			break;
		case 12: if ( $day > 31)
			return 'error';
			$epoch = $epoch + 334;
			break;
	}
	$epoch = $epoch + $day;
	$epoch_Y = sqrt(($birth_year - 1970) * ($birth_year - 1970));
	$leapyear = round((($epoch_Y + 2) / 4)-.5);
	if (($epoch_Y + 2) % 4 == 0 )
	{
		// curent year is leapyear
		$leapyear--;
		if ( $birth_year > 1970 && $month >= 3)
		{
			$epoch = $epoch + 1;
		}
		if ( $birth_year < 1970 && $month < 3)
		{
			$epoch = $epoch - 1;
		}
	}
	else if ( $month == 2 && $day > 28)
	{
		return 'error'; //only 28 days in feb.
	}
	//year
	if ( $birth_year > 1970 ) 
	{
		$epoch = $epoch + $epoch_Y * 365 - 1 + $leapyear;
	}
	else
	{
		$epoch = $epoch - $epoch_Y * 365 - 1 - $leapyear;
	}

	return $epoch;
}

?>