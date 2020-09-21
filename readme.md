# Laravel 6.18 Rest Api

This API is created using Laravel 6.18.10 API Resource. It has Incident, Incidentpeople and  Category Models.

## Installation

Clone the project via git clone or download the zip file.

Copy contents of .env.example file to .env file.

Go to the project directory via terminal and run the following command to install composer packages.

```bash
composer install
```

## Datebase

This application using MYSQL database. Create a database and connect the database. Name of a database and .env file 'DB_DATABASE' should be same. 

## Run Migration

then run the following command to create migrations in the databbase.

```bash
php artisan migrate
```

## Database Seeding

This API content one seeder file i.e Category Table data.
finally run the following command to seed the database with dummy content.

```bash
php artisan db:seed
```

# API EndPoints

## Incidents

  * Incident GET http://localhost:8000/api/incidents/
  * Incident POST http://localhost:8000/api/incidents/

### For Post url inputs:

```json
{
  "data": [
    {
      "id": 0,
      "location": {
        "latitude": 12.9231501,
        "longitude": 74.7818517
      },
      "title": "incident title",
      "category": 1,
      "people": [
        {
          "name": "Name of person",
          "type": "staff"
        },
        {
          "name": "Name of person",
          "type": "witness"
        },
        {
          "name": "Name of person",
          "type": "staff"
        }
      ],
      "comments": "This is a string of comments",
      "incidentDate": "2020-09-01",
    }
  ]
}

```

