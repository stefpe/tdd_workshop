

#Installation

docker run --rm -it -v $PWD:/app composer install
docker run --rm -it -v $PWD:/app -w /app php:7.3-cli-alpine sh


# Configuration
./vendor/bin/phpunit --generate-configuration