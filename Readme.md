# Real TDD:
- fake it until you make it
- write test first/or within the same commit
- start from inside to outside to get a feeling for the problem
- You wont think about splitting to write tests and production code anymore
- Write greenfield code, start from scratch always and for legacy projects use a facade that uses your tested code


# Installation
docker run --rm -it -v $PWD:/app composer install<br>
docker run --rm -it -v $PWD:/app -w /app php:7.3-cli-alpine sh


# Configuration for PHPUnit
./bin/phpunit --generate-configuration

# Run tests
./bin/phpunit -c phpunit.xml