# Kafka on Laravel
## Instructions
### for each app run the following commands:
 - `composer require --dev barryvdh/laravel-ide-helper`
 - `php artisan ide:generate`
 - `php artisan make:model Product -mc`
 - Add `Docker` file and `docker-compose.yml` and adjust ports
 - Copy `kafka` folder inside app folder
 - Finish Kafka configuration
 - docker-compose exec <container_name> sh
   - `php artisan migrate`
   - `php artisan ide:models` => yes
   - `php artisan make:job CreatedProduct`

### Get credentials for .env file 
(confluent)[https://www.confluent.io/]


