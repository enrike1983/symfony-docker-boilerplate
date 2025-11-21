## Start the project
docker-compose up -d --build

## Stop the project
docker-compose down

## Enter the app container
docker-compose exec app /bin/bash

## Install symfony
docker-compose exec app
cd app
symfony new .

The built architecture is the following:

- /var/www/app
  - symfony application
  
- /var/www/app/public
  - docroot 