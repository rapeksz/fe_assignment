# PeakData FE Assignment

Welcome! This is the PeakData FE assignment.


### Run Project

1. pull this repo
1. run:
```
npm install
npm run dev
docker-compose build
docker-compose up
```
2. Go to container by running following command:
``` docker exec -it assignment-php-fpm bash ```
3. Inside the container run:
```
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
php artisan db:seed --class=CommentSeeder
```
4. in the browser navigate to `http://127.0.0.1:8000/`
5. in order to go into dev-mode run `npm run watch`
