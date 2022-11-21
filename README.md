## About ServelLessMySQL

ServelLessMySQL is laravel based server to build server less applications.

## Setup 

1) cp .env.example .env
2) update database information
3) run php composer install
5) run php artisan key:generat
6) run php artisan migrate
7) run php artisan apikey:generate app1

## Use

use send key that is generated in step 7 in request header with "X-Authorization:".
```
Get -> select query
Post -> insert query
Put -> update query
Delete -> delete query
```
## Query Example


### Select
```
{
    "query" : "select * from users where id = :id", 
    "perm" : {'id' : '1'}
}
```
### Insert
```
{
    "query" : "insert into users (id, name) values (?, ?)", 
    "perm" : ['1', 'Dayle']
}
```
### Update
```
{
    "query" : "update users set votes = 100 where name = ?", 
    "perm" : ['John']
}
```
### Delete
```
{
    "query" : "delete from users where id = ?", 
    "perm" : ['1']
}
```

## Other commands
```
php artisan apikey:generate app1
php artisan apikey:deactivate app1
php artisan apikey:activate app1
php artisan apikey:delete app1
php artisan apikey:list -D
```
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
