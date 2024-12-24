php 8.3
==> php@8.3
To enable PHP in Apache add the following to httpd.conf and restart Apache:
    LoadModule php_module /opt/homebrew/opt/php@8.3/lib/httpd/modules/libphp.so

    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>

Finally, check DirectoryIndex includes index.php
    DirectoryIndex index.php index.html

The php.ini and php-fpm.ini file can be found in:
    /opt/homebrew/etc/php/8.3/

php@8.3 is keg-only, which means it was not symlinked into /opt/homebrew,
because this is an alternate version of another formula.

If you need to have php@8.3 first in your PATH, run:
  echo 'export PATH="/opt/homebrew/opt/php@8.3/bin:$PATH"' >> ~/.zshrc
  echo 'export PATH="/opt/homebrew/opt/php@8.3/sbin:$PATH"' >> ~/.zshrc

For compilers to find php@8.3 you may need to set:
  export LDFLAGS="-L/opt/homebrew/opt/php@8.3/lib"
  export CPPFLAGS="-I/opt/homebrew/opt/php@8.3/include"

To start php@8.3 now and restart at login:
  brew services start php@8.3
Or, if you don't want/need a background service you can just run:
  /opt/homebrew/opt/php@8.3/sbin/php-fpm --nodaemonize


  ====

  Đúng rồi, thông báo bạn nhận được cho biết PHP 8.3 đã được cài đặt thành công. Tuy nhiên, nó chưa được kích hoạt để sử dụng với Apache. 

**Hướng dẫn kích hoạt PHP 8.3 với Apache:**

1.  **Cấu hình httpd.conf:**

    *  Mở file `/opt/homebrew/etc/httpd/httpd.conf` bằng trình soạn thảo văn bản.
    *  Tìm phần **Modules** (thường ở gần đầu file).
    *  Sao chép và dán đoạn mã sau **vào bên dưới** phần Modules:

    ```apache
    LoadModule php_module /opt/homebrew/opt/php@8.3/lib/httpd/modules/libphp.so
    ```

    *  Tìm phần **<Directory />** (thường ở gần cuối file).
    *  Bên trong khối `<Directory />`, tìm kiếm các dòng:

    ```apache
    <FilesMatch \.php$>
        SetHandler application/x-httpd-php
    </FilesMatch>
    ```

    *  Nếu các dòng này không có, hãy **thêm chúng vào** bên trong khối `<Directory />`.

2.  **Kiểm tra DirectoryIndex:**

    *  Trong cùng file `httpd.conf`, đảm bảo dòng:

    ```apache
    DirectoryIndex index.php index.html
    ```

    *  Có nghĩa là Apache sẽ tìm kiếm file `index.php` trước tiên khi xử lý các thư mục.

3.  **Khởi động lại Apache:**

    *  Sau khi thực hiện các thay đổi, hãy khởi động lại Apache để áp dụng cấu hình mới:

        ```bash
        sudo apachectl restart  # Hoặc: brew services restart httpd
        ```

**Lưu ý:**

*  Thông báo cho biết `php@8.3 is keg-only`. Điều này có nghĩa phiên bản này không được tự động thêm vào đường dẫn (PATH) mặc định. 
*  Nếu bạn cần chạy các lệnh PHP từ dòng lệnh, bạn có thể thêm đường dẫn đến thư mục `bin` của PHP 8.3 vào file `~/.zshrc` theo hướng dẫn được cung cấp.
*  Thông báo cũng cung cấp các tùy chọn để khởi động và quản lý dịch vụ PHP-FPM (nếu bạn đang sử dụng).

Bằng cách thực hiện theo các bước trên, bạn đã kích hoạt PHP 8.3 thành công để sử dụng với Apache. Bây giờ, các file `.php` trên website của bạn sẽ được xử lý bởi phiên bản PHP mới này.

===

brew install mysql -> mysql_secure_installation cài pass 
 brew services start mysql

brew install phpmyadmin

To enable phpMyAdmin in Apache, add the following to httpd.conf and
restart Apache:
    Alias /phpmyadmin /opt/homebrew/share/phpmyadmin
    <Directory /opt/homebrew/share/phpmyadmin/>
        Options Indexes FollowSymLinks MultiViews
        AllowOverride All
        <IfModule mod_authz_core.c>
            Require all granted
        </IfModule>
        <IfModule !mod_authz_core.c>
            Order allow,deny
            Allow from all
        </IfModule>
    </Directory>
Then open http://localhost/phpmyadmin
The configuration file is /opt/homebrew/etc/phpmyadmin.config.inc.php

====

ssl in mac

I'll help you create a self-signed SSL certificate for bagisto.test on your MacBook from scratch. Here are the steps:

1. First, create a directory for your certificates:
```bash
mkdir -p ~/Sites/certs
cd ~/Sites/certs
```

2. Create a new RSA private key and Certificate Signing Request (CSR) in one command:
```bash
openssl req -new -newkey rsa:2048 -nodes -keyout bagisto.test.key -out bagisto.test.csr -subj "/C=US/ST=State/L=City/O=Organization/OU=Department/CN=bagisto.test"
```

3. Create the self-signed certificate using the CSR and private key:
```bash
openssl x509 -req -days 365 -in bagisto.test.csr -signkey bagisto.test.key -out bagisto.test.crt
```

4. Set appropriate permissions:
```bash
chmod 644 bagisto.test.crt
chmod 600 bagisto.test.key
```

5. Now we'll need to add this certificate to macOS Keychain so your browser trusts it:
```bash
sudo security add-trusted-cert -d -r trustRoot -k "/Library/Keychains/System.keychain" bagisto.test.crt
```

After creating the certificates, I can help you configure Apache to use these certificates. Would you like me to proceed with the Apache configuration?

=>>> Hướng dẫn thêm 
https://www.youtube.com/watch?v=-VxQU1w9L6w&ab_channel=Xcreate
dùng sudo apachectl restart để restart khi config xong

===========

cài ssl cho sub domain
brew install mkcert
mkcert -install
tạo folder lưu key , sau đó tạo key : mkcert bagisto.test "*.bagisto.test"

cấu hình vhost httpd-vhosts.conf
<VirtualHost *:80>
    ServerName bagisto.test
    ServerAlias *.bagisto.test
    Redirect permanent / https://bagisto.test/
</VirtualHost>

<VirtualHost *:443>
    ServerName bagisto.test
    ServerAlias *.bagisto.test
    DocumentRoot "/path/to/your/bagisto/public" # Đường dẫn tới thư mục public của Bagisto

    SSLEngine on
    SSLCertificateFile "/path/to/your/certificates/bagisto.test.pem" # Đường dẫn tới file .pem
    SSLCertificateKeyFile "/path/to/your/certificates/bagisto.test-key.pem" # Đường dẫn tới file key

    <Directory "/path/to/your/bagisto/public">
        Options Indexes FollowSymLinks
        AllowOverride All # Quan trọng cho Bagisto (để sử dụng .htaccess)
        Require all granted
    </Directory>

    ErrorLog "/opt/homebrew/var/log/httpd/bagisto_error.log"
    CustomLog "/opt/homebrew/var/log/httpd/bagisto_access.log" combined
</VirtualHost>

/etc/hosts: Đây là bước quan trọng nhất. Đảm bảo bạn đã thêm 127.0.0.1 lovingusd.bagisto.test

=======

Run the `composer create-project` command from the Bagisto root directory.
Update the .env file according to your credentials and do not run any manual commands for installation except those in the SaaS installation guide.
Then followed each steps as mention for Saas Module.


#### Run the below mentioned commands from the root directory in terminal:

~~~
composer dump-autoload
~~~

~~~
php artisan saas:install
~~~

* Access super admin panel using:

~~~
Go to https://invoicedream.com/super/login and authenticate with:
Email: admin@example.com
Password: admin123@#
~~~
45.77.2.100 port 21
saas@invoicedream.com
EuZCKCVw6IjU

