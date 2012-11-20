BDD Demo
========================


1) Install dependencies
--------------------------------
    $ php bin/vendors install


2) Setup directory permissions
--------------------------------
    $ rm -rf app/cache/*
    $ rm -rf app/logs/*

3) Setup webserver
--------------------------------
Here is a sample Apache config:

  <VirtualHost *:80>
    ServerName ws
    DocumentRoot "/var/www/html/widget_service/web"
    DirectoryIndex app.php
    <Directory /var/www/html/widget_service/web">
      Options +Indexes FollowSymLinks +ExecCGI
      AllowOverride All
      Allow from All
      <IfModule mod_rewrite.c>
          RewriteEngine On
          RewriteCond %{REQUEST_FILENAME} !-f
          RewriteRule ^(.*)$ app.php [QSA,L]
      </IfModule>
    </Directory>
  </VirtualHost>

== The API

=== Create a Widget
--------------------------------
/widgets
POST
Accept: application/json
Content-Type: application/json


=== List of Widgets
--------------------------------
/widgets
GET
Accept: application/json
Content-Type: application/json

=== Update a Widget
/widgets/{id}
PUT
Accept: application/json
Content-Type: application/json

=== Show a Widget
/widgets/{id}
GET
Accept: application/json
Content-Type: application/json


