# Laravel Subscription API

Simple subscription platform of a REST API with Laravel 9

## Setup Docker

```
    $ docker-compose up -d --build     
```

## Set Environment

```
    $ cp .env.example .env
```

## Set the application key

```
   $ docker exec laravel-app php artisan key:generate
```

## Run migrations and seeds

```
   $ docker exec laravel-app php artisan migrate --seed
```

## Run command to send email 

```
   $ docker exec laravel-app php artisan emails:subscriber
```

![image](https://user-images.githubusercontent.com/103549080/188579142-0d2516e7-b31d-4903-808e-c5d08b1c0e44.png)


## API Specification

This application adheres to the api specifications set by the [Postman]

> [Full API Spec](https://documenter.getpostman.com/view/8006043/VV4zNuF6)
