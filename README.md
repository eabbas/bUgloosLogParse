## About this script

this script is written by laravel framework ( https://laravel.com ).

what does it do?
It gets a large log file ( about 100 milion lines of different microservices logs ) and parses it then stores data in database as different fields. so you can do count on this database with different combination of filters.

How you can use this script?
    -in your webserver clone this script and update composer then generate a key finally serve to lunch:
        
        -composer update
        -php artisan key:generate
        -php artisan serve

    -sample log file content stored as logs.txt in the path storage/logs/logs.txt:
        order-service - [17/Sep/2022:10:21:53] "POST /orders HTTP/1.1" 201
        order-service - [17/Sep/2022:10:21:54] "POST /orders HTTP/1.1" 422
        invoice-service - [17/Sep/2022:10:21:55] "POST /invoices HTTP/1.1" 201
        order-service - [17/Sep/2022:10:21:56] "POST /orders HTTP/1.1" 201


    -command to parse log file:

        - php artisan parse:logFile


    -restapi to get count with GET method

        - /api/logs/count

        fields you can send:
            -serviceNames
            -statusCode
            -startDate
            -endDate

        example response:
            {
                count : 14
            }

    -feature tests you can test the script:

        -tests/api
        -tests/command

        test with this command

            - php artisan test
