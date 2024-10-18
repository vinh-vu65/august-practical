# Part 2: Creating a Docker environment for development

## Requirement 1: Runs the latest version of PHP with extra modules:

Modules required:
- curl
- gd
- intl
- mbstring
- mysqlnd
- zip

**1. Go to Dockerhub and find the official [php image](https://hub.docker.com/_/php)**

Choosing an image:
> Linux Distribution

I generally prefer Alpine images for web applications because they are much smaller and you have full control over what software you choose to include.
Smaller image sizes will generally mean better performance in this context.

> Version tag

You can omit the php version number in the image tag and it will resolve to the current latest stable release of php, which is currently v8.3.12.
Personally I prefer to explicitly state the php version, as this will mitigate risk of breaking changes as new versions release.

The php image I will be using is `php:8.3.12-alpine`

**2. Install the dependencies**

From the docker hub documentation, section: `How to install more PHP extensions` as this is an official php image, extension helper scripts are included.
However, extra system packages need to be installed manually as dependencies and it can be difficult to know what packages are required.

Luckily, they reference a very handy tool in the documents to simplify this process: [docker-php-extension-installer](https://github.com/mlocati/docker-php-extension-installer) which handles installing all the dependencies for you.

**3. Verification**

Shell into the container and verify that the modules have installed successfully

```sh
# Output the php modules in the container
$ docker run -it <container_name> sh -c "php -m"
```

On a clean install of php v8.3.12, some of the required modules are already included.
I've included all the required modules in the Dockerfile to be explicit.
The system's default behaviour is to skip these modules as they are already installed.

## Requirement 2: Can handle inbound http requests on a configurable port (default to 80).

**1. Configure an Environment variable which the user can use to expose connections to, and set default value as 80.**

```Dockerfile
ENV HTTP_PORT 80
EXPOSE $HTTP_PORT
```

#### ENV vs ARG

Either keywords `ENV` or `ARG` can be used to set the `HTTP_PORT` variable.
I have favoured `ENV` in this scenario because using `ARG` would be setting the port at build-time.
It is more flexible to set this port at runtime using `ENV` in a development context becacuse changing this port would not require an image rebuild.

**2. Verification**

Create a "Hello World" php script to verify changes on the browser. Save as `index.php`

Run `php -S 0.0.0.0:${HTTP_PORT}` in the container to start up php with the inbuilt webserver.

```sh
# Default port value
docker run -d -p 80:80 <container_name>
```
> We should see "Hello World!" when we navigate to localhost:80 on our browser

```sh
# Custom port value
PORT=1234; docker run -d -p $PORT:$PORT -e HTTP_PORT=$PORT <container_name>
```
> We should see "Hello World!" when we navigate to localhost:1234 on our browser
