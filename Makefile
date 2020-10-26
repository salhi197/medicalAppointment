# HELP
# This will output the help for each task
# thanks to https://marmelab.com/blog/2016/02/29/auto-documented-makefile.html
.PHONY: help

help: ## This help.
	@awk 'BEGIN {FS = ":.*?## "} /^[a-zA-Z_-]+:.*?## / {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}' $(MAKEFILE_LIST)

.DEFAULT_GOAL := help

build: ## Build the docker image for production
	docker-compose --env-file=docker/prod/.env -f docker/prod/docker-compose.yml -p gp-prod build

install: ## Install the last package and launch the production server
	git checkout master
	git pull
	sudo docker-compose --env-file=docker/prod/.env -f docker/prod/docker-compose.yml -p gp-prod up -d --build

console: ## launch console of production web server
	sudo docker-compose --env-file=docker/prod/.env -f docker/prod/docker-compose.yml -p gp-prod exec app sh

start: ## Start the production server
	sudo docker-compose --env-file=docker/prod/.env -f docker/prod/docker-compose.yml -p gp-prod up -d

stop: ## stop the production server
	sudo docker-compose --env-file=docker/prod/.env -f docker/prod/docker-compose.yml -p gp-prod stop

dev: start-dev

start-dev: ## Start development server as docker
	@docker-compose --env-file=docker/dev/.env -f docker/dev/docker-compose.yml -p tebibe-dev up --build -d

stop-dev: ## Stop development server as docker
	@docker-compose --env-file=docker/dev/.env -f docker/dev/docker-compose.yml -p gp-dev stop

console-dev: ## launch console of dev web server
	@docker-compose --env-file=docker/dev/.env -f docker/dev/docker-compose.yml -p gp-dev exec app-dev sh
