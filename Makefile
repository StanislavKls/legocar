lint:
	composer run-script phpcs -- --standard=PSR12 src controllers models
setup:
	composer install
	touch database/database.sqlite
	php artisan migrate
	php artisan db:seed
deploy:
	git push heroku
