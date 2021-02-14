# Run project
For run application you need to do this steps:
1. docker-compose up -d
2. docker-compose exec php-fpm composer install
3. docker-compose exec php-fpm php artisan migrate
4. docker-compose exec php-fpm php artisan storage:link
5. npm i && npm run production (in parent system you need to install node and npm)

# Run tests
1. docker-compose exec php-fpm php artisan test
