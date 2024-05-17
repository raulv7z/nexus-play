# Nexus Play

This project is a web application developed in Laravel aimed at selling digital video game licenses.

## Environment Requirements

To run this project, you need to have a LAMP stack (Linux, Apache, MySQL, PHP) and Node.js configured in your development environment. The specific requirements are as follows:

- Apache
- MySQL
- PHP 8.x
- Composer
- Node.js

## Installation

Follow these steps to set up and run the project in your local environment.

### Clone the Repository

Clone the repository to your local machine using HTTPS or SSH:

# Clone using HTTPS
git clone https://github.com/raulv7z/nexus-play-proj.git

# Clone using SSH
git clone git@github.com:raulv7z/nexus-play-proj.git

### Configure the .env File

Copy the `.env.example` file to `.env` and configure the necessary values in the `.env` file. You can use the following command to copy the file:

cp .env.example .env

Make sure to configure the database connection and other necessary values in the `.env` file.

### Install Dependencies

Install PHP and Node.js dependencies using Composer and npm:

# Install PHP dependencies
composer install

# Install Node.js dependencies
npm install

### Run Migrations and Seeders

Run the database migrations and seeders to populate the initial records:

php artisan migrate --seed

## Running the Application

After completing the above steps, you can start the Laravel development server:

php artisan serve

By default, the application will be available at http://localhost:8000.

For development, run the following command to compile your assets:

npm run dev
