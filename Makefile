export USER_ID  := $(shell id -u)
export GROUP_ID := $(shell id -g)

COMPOSE_DEV = docker compose -f docker/docker-compose.dev.yml

.PHONY: dev-up dev-down dev-build dev-logs dev-shell dev-migrate dev-seed dev-artisan dev-composer dev-npm test ps help

dev-up:
	$(COMPOSE_DEV) up -d

dev-down:
	$(COMPOSE_DEV) down

dev-build:
	$(COMPOSE_DEV) build --no-cache

dev-logs:
	$(COMPOSE_DEV) logs -f

dev-shell:
	$(COMPOSE_DEV) exec app bash

dev-migrate:
	$(COMPOSE_DEV) exec app php artisan migrate

dev-seed:
	$(COMPOSE_DEV) exec app php artisan db:seed $(if $(class),--class=$(class))

dev-artisan:
	$(COMPOSE_DEV) exec app php artisan $(args)

dev-composer:
	$(COMPOSE_DEV) exec app composer $(args)

dev-npm:
	$(COMPOSE_DEV) exec app npm $(args)

test:
	$(COMPOSE_DEV) exec app php artisan test $(args)

ps:
	$(COMPOSE_DEV) ps

dev-dusk:
	$(COMPOSE_DEV) exec app touch database/testing.sqlite
	$(COMPOSE_DEV) exec app php artisan dusk $(args)

help:
	@echo "dev-up        Start containers"
	@echo "dev-down      Stop containers"
	@echo "dev-build     Rebuild image (no cache)"
	@echo "dev-logs      Follow logs"
	@echo "dev-shell     Shell inside app"
	@echo "dev-migrate   Run migrations"
	@echo "dev-seed      Run seeders (class=Name)"
	@echo "dev-artisan   args=\"make:model Pet -mfs\""
	@echo "dev-composer  args=\"require vendor/package\""
	@echo "dev-npm       args=\"run build\""
	@echo "test          Run tests (args=\"--testsuite Unit\")"
	@echo "ps            List containers"
	@echo "dev-dusk      Run browser tests (args=\"tests/Browser/LoginTest.php\")"