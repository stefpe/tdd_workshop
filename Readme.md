

# Installation

docker run --rm -it -v $PWD:/app composer install<br>
docker run --rm -it -v $PWD:/app -w /app php:7.3-cli-alpine sh


# Configuration for PHPUnit
./bin/phpunit --generate-configuration

# Run tests
./bin/phpunit -c phpunit.xml