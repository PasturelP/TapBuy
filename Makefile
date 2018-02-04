DOCKER_NAME := tapbuy
CONTAINER_NAME := tapbuy

start:
	sudo docker-compose -p $(DOCKER_NAME) start

first_up:
	make build
	make up
	docker exec $(CONTAINER_NAME)_cli composer install
	docker exec $(CONTAINER_NAME)_cli bin/console doctrine:database:create
	docker exec $(CONTAINER_NAME)_cli bin/console doctrine:schema:update --force
	docker exec $(CONTAINER_NAME)_cli bin/console cache:clear --env=prod
	docker exec $(CONTAINER_NAME)_cli chmod 777 -R var/*

up:
	sudo docker-compose -p $(DOCKER_NAME) up -d --remove-orphans
	make start

build:
	sudo docker-compose -p $(DOCKER_NAME) build

stop:
	sudo docker-compose -p $(DOCKER_NAME) stop

clean:
	make stop
	sudo docker rm $(shell sudo docker ps -a -q)

clean-full:
	sudo docker rmi -f $(shell sudo docker images -q)

logs:
	sudo docker-compose -p $(DOCKER_NAME) logs

php:
	docker exec -ti $(CONTAINER_NAME)_php bash

cli:
	docker exec -ti $(CONTAINER_NAME)_cli bash