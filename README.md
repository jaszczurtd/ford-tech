# Ford-Tech.pl — Forum miłośników modyfikacji Fordów

Forum **ford-tech.pl** - phpBB 2.x z polską modyfikacją Przemo (~1.12.5, 2005).

Forum działa pod adresem: **http://ford-tech.pl**

Szczegółowy opis wszystkich zmian: [changes-2026-03-14.txt](changes-2026-03-14.txt)

---

## Instalacja lokalna

### Wymagania

- Dla przykładu: coś Debianowo-podobnego, np. Ubuntu 22.04 / 24.04 / Mint)
- Apache 2.4
- PHP 8.3
- MySQL 8.0

### 1. Pakiety systemowe

```bash
sudo apt update
sudo apt install -y \
  apache2 \
  php8.3 \
  php8.3-mysql \
  php8.3-gd \
  php8.3-mbstring \
  php8.3-xml \
  libapache2-mod-php8.3 \
  mysql-server
```

### 2. MySQL — baza danych

```bash
sudo mysql_secure_installation
sudo mysql -u root -p
```

```sql
CREATE DATABASE fordtech CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'fordtech'@'localhost' IDENTIFIED BY 'haslo';
GRANT ALL PRIVILEGES ON fordtech.* TO 'fordtech'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

Import dumpa bazy:

```bash
mysql -u fordtech -p fordtech < dump.sql
```

### 3. Pliki forum

```bash
git clone git@github.com:twoj-login/ford-tech.git /var/www/ford-tech
```

Utwórz `config.php` (plik jest wykluczony z repo - musisz go stworzyć ręcznie na podstawie działającej instalacji):

```php
<?php
$dbhost    = 'localhost';
$dbname    = 'fordtech';
$dbuser    = 'fordtech';
$dbpasswd  = 'haslo';
$table_prefix = 'phpbb2_';
```

### 4. Uprawnienia katalogów

Katalogi muszą być zapisywalne przez Apache:

```bash
sudo chown -R www-data:www-data /var/www/ford-tech/public_html/album_mod/upload/
sudo chown -R www-data:www-data /var/www/ford-tech/public_html/album_mod/upload/cache/
sudo chown -R www-data:www-data /var/www/ford-tech/public_html/cache/
sudo chown -R www-data:www-data /var/www/ford-tech/public_html/files/
```

> **Uwaga — pliki na CIFS/NAS:** `chown`/`chmod` nie działają na mountach Samba.
> W takim przypadku zmień użytkownika Apache na właściciela plików:
> ```bash
> sudo sed -i 's/APACHE_RUN_USER=www-data/APACHE_RUN_USER=twoj_user/' /etc/apache2/envvars
> sudo sed -i 's/APACHE_RUN_GROUP=www-data/APACHE_RUN_GROUP=twoj_user/' /etc/apache2/envvars
> ```

### 5. Konfiguracja Apache

```bash
sudo nano /etc/apache2/sites-available/ford-tech.conf
```

```apache
<VirtualHost *:80>
    ServerName localhost
    DocumentRoot /var/www/ford-tech/public_html

    <Directory /var/www/ford-tech/public_html>
        AllowOverride All
        Require all granted
    </Directory>
</VirtualHost>
```

```bash
sudo a2ensite ford-tech
sudo a2enmod rewrite
sudo systemctl restart apache2
```

### 6. Weryfikacja

```bash
# sprawdź czy GD działa
php -r "echo extension_loaded('gd') ? 'GD OK' : 'GD brak';"

# logi błędów Apache
sudo tail -f /var/log/apache2/error.log
```

Otwórz `http://localhost/` — forum powinno działać.
