README

Job Portal Project Setup Guide
This repository contains a Laravel project. Follow the steps below to set up and run the project on your local machine.

Prerequisites
Before you begin, make sure you have the following installed on your system:

PHP (>=8.1.0)
Composer (>=2.2.0)
Node.js (with npm or yarn)
MySQL or any other compatible database system
Installation Steps

Clone the Repository:
git clone https://github.com/ashishradadiya/job-portal-laravel.git


Navigate to Project Directory:
cd your-project

Install PHP Dependencies:
composer install

Copy Environment File:
cp .env.example .env

Generate Application Key:
php artisan key:generate

Update Environment Variables:
Open the .env file and update the database connection details according to your system configuration.

Run Migrations:
php artisan migrate

Seed Data (Follow the sequence as below):
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=AdminSeeder
php artisan db:seed --class=JobCategorySeeder

Install JavaScript Dependencies:
npm install

Compile Assets:
npm run dev

Serve the Application:
php artisan serve

Access the Application:
Visit http://localhost:8000 in your web browser to access the application.

Admin Login Credentials:
Email Address: admin@example.com
Password: password

Additional Steps
If you want to use a different server configuration (e.g., Apache, Nginx), configure it to point to the public directory of the project.
For advanced usage, refer to the Laravel documentation: https://laravel.com/docs

Troubleshooting
If you encounter any issues during installation or setup, please check the Laravel documentation or search for solutions online. If the problem persists, feel free to open an issue in this repository.

Contributing
Contributions are welcome! If you find any bugs or want to suggest improvements, please open an issue or submit a pull request.
