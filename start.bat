@echo off

set "laravel_dir=C:\Users\TOP OFFICE STORE\Documents\GestionStock"


set "xampp_dir=C:\xampp"
start "" "%xampp_dir%\xampp_start.exe"

cd "%laravel_dir%"
php artisan serve