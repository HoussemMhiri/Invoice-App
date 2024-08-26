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
### Install PHP Dependencies
``` bash
composer install
````
### Create a .env File
``` bash
cp .env.example .env
````
### Update Your .env File with Database Credentials
Open the .env file and configure your database settings:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=invoice_db
DB_USERNAME=root
DB_PASSWORD=
````
### Generate the Application Key
``` bash
php artisan key:generate
````
### Run Migrations to Set Up the Database
``` bash
php artisan migrate
````
### Start the Laravel Development Server
``` bash
php artisan serve
````
#### Visit http://localhost:8000 in your browser to access the application.

### Usage:
- Access the app in your browser.
- Start filtering, adding, viewing, editing, deleting, and printing invoices.
  
### Contributing
Contributions are welcome! Please submit a pull request or open an issue to discuss your ideas.
 
### Contact
For any inquiries, feel free to reach out to me at houssemmhiri95@gmail.com.
