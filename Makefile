install:
	docker-compose run -u root --rm composer update
	docker-compose run -u root --rm composer dump-autoload

create-env:
ifeq (,$(wildcard ./source/.env))
	cp source/.env.example source/.env
endif
ifeq (,$(wildcard /.env))
	cp .env.example .env
endif

run:
	docker-compose up -d

migrate:
	docker-compose run --rm artisan migrate

run-workers:
	docker-compose run --rm artisan queue:work --sleep=1

up: create-env install migrate run