.PHONY: stop reset run deploy

stop:
	@echo "*** Stopping all project docker containers ***"
	docker-compose -f ./docker-compose-dev.yml down
	docker-compose -f ./docker-compose-prod.yml down

reset: stop
	@echo "*** Removing the project database ***"
	docker volume rm -f lemp_stack_docker_example_practice-db

run:
	@echo "*** Running the project locally ***"
	rm -rf logs/*
	mkdir -p logs
	touch logs/access.log logs/error.log
	docker-compose -f ./docker-compose-dev.yml down
	docker-compose -f ./docker-compose-dev.yml up --build -d

deploy:
	@echo "*** Deploying the project ***"
	rm -rf logs/*
	mkdir -p logs
	touch logs/access.log logs/error.log logs/docker.log
	docker-compose -f ./docker-compose-prod.yml down
	docker-compose -f ./docker-compose-prod.yml up --build > ./logs/docker.log 2>&1 &
