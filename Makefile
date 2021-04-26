lint:
	composer run-script phpcs -- --standard=PSR12 src controllers models
setup:
	composer install
deploy:
	git push heroku
