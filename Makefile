run: .validate
	@ test -f docker/mysql/volume || mkdir -p docker/mysql/volume
	@ test -f docker/mysql/restore || mkdir -p docker/mysql/restore
	@ test -f docker/redis || mkdir -p docker/redis
	@ test -d vendor || composer update -vvv
	@ test -d vendor || composer install -vvv
	@ docker-compose -f docker/dev.docker-compose.yaml down --remove-orphans
	@ docker-compose -f docker/dev.docker-compose.yaml up

.validate:
	$(eval WHICH_COMPOSER := $(shell which composer))

	@ test -n "$(WHICH_COMPOSER)" || (echo "Please install composer before running this project. I'am not smart enough to answer how to install it in your machine!" & exit 1)

	$(eval WHICH_COMPOSE := $(shell which docker-compose))

	@ test -n "$(WHICH_COMPOSE)" || (echo "Please install docker-compose before running this project. I'am not smart enough to answer how to install it in your machine!" & exit 1)


.PHONY: run .validate
