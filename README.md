WS Demo
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

<pre>
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
</pre>

The API
-------------

JSON:

<pre>
{"widget": {
    "name": "A name of a widget",
    "customers": [
        {
            "id": "50ab0860cf5dac7c1a000000",
            "name": "A customer name"
        }

}}
</pre>

Create a Widget
-------------
<pre>
/widgets
POST
Accept: application/json
Content-Type: application/json
</pre>


List of Widgets
-------------
<pre>
/widgets
GET
Accept: application/json
Content-Type: application/json
</pre>

Update a Widget
-------------
<pre>
/widgets/{id}
PUT
Accept: application/json
Content-Type: application/json
</pre>

Show a Widget
-------------
<pre>
/widgets/{id}
GET
Accept: application/json
Content-Type: application/json
</pre>

