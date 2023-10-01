# Makefile

.PHONY: start install

start:
	docker-compose up -d

install:
	docker-compose exec php composer install

test:
	docker-compose exec php php index.php
