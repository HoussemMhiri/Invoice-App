# Invoice App

A web application for managing invoices, built with **Vue.js** and **Laravel**. This app helps you efficiently handle tasks such as filtering, adding, editing, and printing invoices.

## Features

- **Filter Invoices:** Easily filter and search for invoices.
- **Add Invoice:** Create new invoices with client and item details.
- **View Invoice:** View detailed information for each invoice.
- **Edit Invoice:** Update invoice details as needed.
- **Delete Invoice:** Remove invoices that are no longer needed.
- **Print Invoice:** Print invoices directly from the app.

## Tech Stack

- **Frontend:** Vue.js (integrated within Laravel)
- **Backend:** Laravel 11
- **Database:** MySQL

## Installation

### Prerequisites

- **PHP 8.1 or higher**
- **Composer**
- **MySQL**

## Setup

### Clone the Repository

```bash
git clone https://github.com/yourusername/invoice-app.git
cd invoice-app
````
Install PHP Dependencies
bash
Copy code
composer install
Create a .env File
bash
Copy code
cp .env.example .env
Update Your .env File with Database Credentials
Open the .env file and configure your database settings:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=invoice_db
DB_USERNAME=root
DB_PASSWORD=yourpassword
Generate the Application Key
bash
Copy code
php artisan key:generate
Run Migrations to Set Up the Database
bash
Copy code
php artisan migrate
Start the Laravel Development Server
bash
Copy code
php artisan serve
Visit http://localhost:8000 in your browser to access the application.

Usage
Access the app in your browser.
Start filtering, adding, viewing, editing, deleting, and printing invoices.
