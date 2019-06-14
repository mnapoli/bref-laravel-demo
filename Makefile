preview:
	php artisan serve

deploy:
	php artisan config:clear
	serverless deploy
