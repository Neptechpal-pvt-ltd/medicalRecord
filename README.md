This is a medical record app for Our Dipak Sir!

Environments:
php 8 or greater
mysql 
composer 2.5.1
Installation:

1. clone the project
2. Run the command composer install --ignore-platform-reqs to install necesary dependencies
3. After the installation is successful, copy .env.example and rename it as .env
4. Run the command php artisan key:generate
5. Make a empty database and insert the database credentials
6. Run the command php artisan config:clear
7. Run the command php artisan migrate to migrate all tables:
8. Run the command php artisan db:seed to seed initial data.

9. Credentials: admin@admin.com password