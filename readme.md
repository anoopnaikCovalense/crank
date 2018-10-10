# Crank

Crank is a coding judgement tool mirroring popular services like Codechef and Hackerearth. This is a self-hosted service which currently depends on 3rd party API for code run and compilation (We use RunMyCodeOnline API).
There are network and request limitations for RunMyCodeOnline APIs.


## Dev Setup
* Install Composer and Laravel (Check Laravel Docs)
* Clone project: `git clone [project-git-url]`
* Install dependencies: `composer install`
* Create your `.env` file and use `.env.example` to configure the settings

* Create a database and put the name also into the `.env` file
* Run migrations to create the tables in the database: `php artisan migrate`
* Run dev server: `php artisan serve` or run it in your preferred server


---- 


Licensing
=========
Project Culminate is licensed under modified MIT Licence. See
[LICENCE](https://github.com/cvlnair/crank/blob/master/LICENCE) for the full
license text.
