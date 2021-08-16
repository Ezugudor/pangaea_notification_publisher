# Pub/Sub Notification System (Publisher)(API)

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://poser.pugx.org/laravel/lumen-framework/d/total.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/lumen-framework/v/stable.svg)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://poser.pugx.org/laravel/lumen-framework/license.svg)](https://packagist.org/packages/laravel/lumen-framework)

<!-- ABOUT THE PROJECT -->
## About

Pub/Sub Notification System RESTFUL api project built with Laravel/Lumen framework.Observing the SOLID principle.


### Built With

This project is built with the following frameworks.
* [Laravel/Lumen](https://laravel.com)



<!-- GETTING STARTED -->
## Getting Started

Get this service up and running in your machine, just 5 easy steps as follow:

  
### Installation

1. Clone the repo
   ```sh
   git clone https://github.com/Ezugudor/pangaea_notification_publisher
   ```
2. Rename example.env file to .env
   ```sh
   sudo mv example.env .env 
   ```
3. Create a mysql db and fill the credentials accordingly in the .env file. Default db is "test_notification"
   ```.env
   DB_DATABASE=test_notification
   DB_USERNAME=yourDbUsername
   DB_PASSWORD=yourDbPassword
   ```
4. Install dependencies
   ```sh
   composer install
   ```
5. Run Migration and Seed
   ```sh
   php artisan migrate:fresh --seed
   ```
Thats all fire up the server and your are good to go!

## Contributing

Thank you for considering contributing to Pub/Sub Notification System! Please send a message to Ezugudor at nelsonsmrt@gmail.com lets kick start.

## Security Vulnerabilities

If you discover a security vulnerability within this app, please send an e-mail to Ezugudor at nelsonsmrt@gmail.com. All security vulnerabilities will be promptly addressed.

