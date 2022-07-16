#!make

include .env

.PHONY: help

SHELL         := /bin/bash
MAKEFILE_PATH := ./Makefile
APP=duck-backend
DOCKER_IMAGES = $(shell docker images -qa)
DOCKER_CONTAINERS = $(shell docker ps -qa)
DOCKER_VOLUMES = $(shell docker volume ls)

help:  ## Display this help
	@awk 'BEGIN {FS = ":.*##"; printf "\nUsage:\n  make \033[36m\033[0m\n\nOptions:\n"} /^[a-zA-Z_-]+:.*?##/ { printf "  \033[36m%-10s\033[0m %s\n", $$1, $$2 }' $(MAKEFILE_LIST)

config: ## Use for check docker-compose file
	$(info Start command check docker-compose file has begun)
	@docker-compose config

ps: ## View info about running containers
	$(info Start command for view all running containers)
	@docker ps --filter "name=duck"

create: ## Use for start project
	$(info Startup the project has begun)
	@docker-compose up --build -d

rebuild: ## Use for rebuild all containers in project
	$(info Rebuild all containers in project has begun)
	@docker-compose down
	@docker-compose up --build -d

down: ## Use for down backend
	$(info Stoping the backend has begun)
	@docker-compose down

clear: ## Use for clear docker images and containers
	$(info Pruning the backend has begun)
	@docker system prune -f

clear_with_data: ## Use for clear docker images and containers with volumes
	$(info Pruning the backend with volumes has begun)
	@docker system prune -f --volumes

clc: ## Use for clean docker containers
	$(info Cleaning the containers has begun)
	@docker rm -f ${DOCKER_CONTAINERS}

cli: ## Use for clean docker images
	$(info Cleaning the images has begun)
	@docker image rm -f ${DOCKER_IMAGES}

clv: ## Use for clean docker volumes
	$(info Cleaning the volumes has begun)
	@docker volume rm -f ${DOCKER_VOLUMES}

sh: ## Use for connetion to container
	$(info Connetion to container has begun)
	@docker exec -it ${APP} bash

shm: ## Use for connetion to mongodb
	$(info Connetion to mongodb has begun)
	@docker exec -it gfp_mongodb bash

shp: ## Use for connetion to postgresql
	$(info Connection to postgres has begun)
	@docker exec -it postgresdb bash

logs: ## Use for view container logs
	$(info View container logs has begun)
	@docker logs ${APP} -f

start: ## Use for start containers without build
	$(info Start containers (up without build) has begun)
	@docker-compose up -d

stop: ## Use for stop containers
	$(info Stop containers has begun)
	@docker-compose stop

restart: ## Use for up build containers
	$(info Startup the backend has begun)
	@docker-compose down
	@docker-compose up -d
