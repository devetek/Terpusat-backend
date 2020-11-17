generate-docs:
	@ php tools/swagger-generator.php

run-dev:
	@ test -f docker/mysql/volume || mkdir -p docker/mysql/volume
	@ test -f docker/mysql/restore || mkdir -p docker/mysql/restore
	@ test -f docker/redis || mkdir -p docker/redis
	@ test -d vendor || composer update -vvv
	@ test -d vendor || composer install -vvv
	@ docker-compose -f docker/dev.docker-compose.yaml down --remove-orphans
	@ docker-compose -f docker/dev.docker-compose.yaml up