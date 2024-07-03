@echo off

REM start icon

echo Creating Database ...
php artisan migrate:reset
php artisan migrate:refresh
php artisan db:seed CategorySeeder
if errorlevel 1 (
    echo failed to create database : php .\create_database\database.php
    exit /b 1
)


echo Running PHP scripts in icon directory...
php .databases/icon/user/user.php
if errorlevel 1 (
    echo PHP script icon\user\user.php error brother...!
    exit /b 1
)

php .\icon\user_details\user_details.php
if errorlevel 1 (
    echo PHP script icon\user_details\user_details.php error brother...!
    exit /b 1
)

php .\icon\product\product.php
if errorlevel 1 (
    echo PHP script icon\product\product.php error brother...!
    exit /b 1
)

REM end icon


REM start web-template
echo Running PHP scripts in web-template directory...

php .\web-template\user\user.php
if errorlevel 1 (
    echo PHP script web-template\user\user.php error brother...!
    exit /b 1
)

php .\web-template\user_details\user_details.php
if errorlevel 1 (
    echo PHP script web-template\user_details\user_details.php error brother...!
    exit /b 1
)

php .\web-template\product\product.php
if errorlevel 1 (
    echo PHP script web-template\product\product.php error brother...!
    exit /b 1
)

REM end web-template


REM start uikit
echo Running PHP scripts in uikit directory...

php .\uikit\user\user.php
if errorlevel 1 (
    echo PHP script uikit\user\user.php error brother...!
    exit /b 1
)

php .\uikit\user_details\user_details.php
if errorlevel 1 (
    echo PHP script uikit\user_details\user_details.php error brother...!
    exit /b 1
)

php .\uikit\product\product.php
if errorlevel 1 (
    echo PHP script uikit\product\product.php error brother...!
    exit /b 1
)


REM end uikit


REM start font
echo Running PHP scripts in font directory...

php .\font\user\user.php
if errorlevel 1 (
    echo PHP script font\user\user.php error brother...!
    exit /b 1
)

php .\font\user_details\user_details.php
if errorlevel 1 (
    echo PHP script font\user_details\user_details.php error brother...!
    exit /b 1
)

php .\font\product\product.php
if errorlevel 1 (
    echo PHP script font\product\product.php error brother...!
    exit /b 1
)


REM end font

REM start ebook
echo Running PHP scripts in ebook directory...

php .\ebook\user\user.php
if errorlevel 1 (
    echo PHP script ebook\user\user.php error brother...!
    exit /b 1
)

php .\ebook\user_details\user_details.php
if errorlevel 1 (
    echo PHP script ebook\user_details\user_details.php error brother...!
    exit /b 1
)

php .\ebook\product\product.php
if errorlevel 1 (
    echo PHP script ebook\product\product.php error brother...!
    exit /b 1
)


REM end ebook


REM start payment_method
echo Running PHP scripts in payment_method directory...

php .\payment_method\payment_method.php
if errorlevel 1 (
    echo PHP script payment_method\payment_method.php error brother...!
    exit /b 1
)

REM end payment_method


REM start mocking user
echo Running PHP scripts in mocking directory...

php .\mocking\user\user\user.php
if errorlevel 1 (
    echo PHP script mocking\user\user\user.php error brother...!
    exit /b 1
)

REM end moking user


echo All scripts executed successfully!
pause
