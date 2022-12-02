## Author

-   [Naman Makwana]

## About

This is simple laravel project with curd operation, login and filter functionality

## DataManager class

    The DataManager class is one and only class in entire app which interact with database, perform business logic. Thus data pass from controller to DataManager via layer
    like

    Controller->OperationManagerInterface->OperationManager->DataManagerInterface->DataManager

    and data return by DataManager is in following way
    DataManager->OperationManager->Controller

## Database models

    I have declared all Database related models in App\Repository\Models\

## Database Configuration

    Create the database named "laraveltest"

    and then run the migration command to add the tables in the database 

    and then run the seeds command to add the data into the database.


## useful commands

    1. php artisan serve
    2. php artisan migrate:fresh
    3. php artisan optimize
    4. composer install
    5. php artisan route:cache
    6. php artisan make:model <modelname>
    7. php artisan cache:clear
    8. php artisan config:clear
    9. php artisan make:provider <providername>
    10.php artisan make:controller <controller name>
    11.php artisan schedule:work
    12.php artisan queue:listen
    13.php artisan passport:client --personal


## Run project
   
    1.composer install
    2.php artisan migrate:fresh
    3.php artisan route:cache
    4.php artisan config:cache
    5.php artisan optimize
    6.php artisan serve

## Login Credentials 

  For the login the the admin use the below mention crential
  Email: admin@gmail.com
  Password: password