install:
	sudo apt update
	make composer
	sudo chmod a+rwx -R templates_c

dev:
	docker-compose build
	docker-compose up -d --force-recreate --renew-anon-volumes
	make composer
	@echo "Application démarrée : http://localhost:8080/"

dev-stop:
	docker-compose stop

composer:
	php composer.phar install
	php composer.phar dump-autoload -o

.PHONY: install dev dev-stop
