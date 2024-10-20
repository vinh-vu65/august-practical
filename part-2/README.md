# Task 2: PHP Docker config

## Developer Guide

### Pre-requisites

- [Docker Engine](https://docs.docker.com/engine/install/)
- [Docker Compose](https://docs.docker.com/compose/install/)

### Setting up Development Environment

**Environment Variables**

A reference for the environment variables used in the `docker-compose` config has been provided for you in `.env.reference`.

Create a copy of this file and fill in the environment variables to the values according to your application's specifications. (Recommended name for this env file is `.env`)

Default values have been provided for:
```sh
APP_HOST_PORT=80
APP_CONTAINER_PORT=80
PHP_ENV=development
DB_HOST_PORT=3306
DB_CONTAINER_PORT=3306
```

You will need to configure your own values for:
```sh
DB_ROOT_PASSWORD=
DB_DATABASE=
DB_USER=
DB_PASSWORD=
```

**Initial Database Data**

The `docker-compose` config mounts the `./sql` directory to the MariaDB initdb entrypoint.

`./sql/init.sql` has been provided to seed the MariaDB service with some example data.
You can modify this file to fit your use case or remove the file if you do not want to seed the database.

You can read more about the initdb entrypoint [here](https://hub.docker.com/_/mariadb#:~:text=Initializing%20the%20database%20contents)

**Running the containers**

After you have set-up the environment variables and the initial DB data you can start up the containers.

```sh
# If you named your environment variables file the default .env
docker-compose up -d --build

# If you named your environment variables file something else
docker-compose --env-file path/to/your/env/file up -d --build
```

This will start up the DB and App services and you can go to localhost:${APP_PORT} to see phpinfo

### Development

The App service mounts the `./src` directory onto the container so you can make changes to files in here and refresh the files in your browser to see your changes.

**Composer packages**

If you need to install additional Composer packages, you can run commands on the container to manage and install your dependencies:

Example:
```sh
docker-compose exec app sh -c "composer require monolog/monolog"
```

**Finished developing?**

```sh
docker-compose down
```

## For reviewers

You can read about my thoughts and problem solving process [here](./thought-process.md)
