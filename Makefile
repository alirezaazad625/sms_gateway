install:
	docker-compose run -u root --rm composer update
	docker-compose run -u root --rm composer dump-autoload

run:
	docker-compose up -d
