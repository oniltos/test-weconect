.PHONY: up down build restart install artisan

# Start the Docker Compose services
up:
	docker-compose up -d

# Stop the Docker Compose services
down:
	docker-compose down

# Build/Rebuild the Docker Compose services
build:
	docker-compose build

# Restart the Docker Compose services
restart:
	docker-compose down
	docker-compose up -d

# Run composer install in the app container
install:
	docker-compose exec app composer install

artisan:
	docker-compose exec app php artisan $(cmd)
