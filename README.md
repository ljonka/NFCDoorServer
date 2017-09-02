# NFCDoorServer
Laravel 5.5 based Restfull API DB Server for NFC Door System

## Installation

 git clone git@github.com:ljonka/NFCDoorServer.git
 cd NFCDoorServer
 touch database/database.sqlite
 cp .env.example .env #change DB_DATABASE to suite your needs
 php artisan migrate
 php artisan passport:install
 #point your webserver to public directory of this app or use artisan Serve
 php artisan serve
