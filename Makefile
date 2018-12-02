.PHONY: run
run:
	rm -rf logs/*
	mkdir -p logs
	touch logs/access.log logs/error.log
	docker-compose down
	docker-compose up --build -d

.PHONY: stop
stop:
	docker-compose down

.PHONY: reset
reset:
	docker-compose down
	docker volume rm -f lemp_stack_example_practice-db
