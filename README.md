

## About Wacha


Wacha is a leave management system that allows staff to request any leave of absence, access their balances, and better plan their future
by applying for the number of days needed to to take off.

## Installation

### [Generate SSH Keys](https://git-scm.com/book/en/v2/Git-on-the-Server-Generating-Your-SSH-Public-Key)

`ssh-keygen -t rsa -C "your.email@example.com" -b 4096`

### [Clone Repo](https://git-scm.com/docs/git-clone)

`# cd /xampp/htdocs`

`www# git clone git@github.com:eingurat504/wacha.git wacha`

### [Composer install](https://laravel.com/docs/7.2/configuration#environment-configuration)

`wacha# composer install`

### [Environment Variables](https://laravel.com/docs/7.2/configuration#environment-configuration)

`wacha# cp .env.example .env`

`wacha# vim .env`

### Application key

`wacha# php artisan key:generate`

### Configurations Files

`wacha# php artisan config:cache`

### [Running Migrate](https://laravel.com/docs/7.2/migrations#running-migrations)

`php artisan migrate`


### [Running Database Seeder](https://laravel.com/docs/7.2/migrations#running-migrations)

`php artisan db:seed`

 




