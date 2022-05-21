install:
	docker-compose run -u root --rm composer update
	docker-compose run -u root --rm composer dump-autoload

run:
	docker-compose up -d

migrate:
	docker-compose run --rm artisan migrate

start-workers:
	docker-compose run --rm artisan queue:work --sleep=1
