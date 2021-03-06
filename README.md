# Solvians certificates

## Introduction

Hi, here you can find how to make the project up and running and much more.

## Installation using Composer

this project provides a `docker-compose.yml` for use with
[docker-compose](https://docs.docker.com/compose/); it
uses the provided `Dockerfile` to build a docker image
for the `laminas` container created with `docker-compose`.

Build and start the image and container using:

```bash
$ docker-compose up -d --build
```

At this point, you can visit http://localhost:8080 to see the site running.

You can also run commands such as `composer` in the container.  The container
environment is named "laminas" so you will pass that value to
`docker-compose run`:

```bash
$ docker-compose run laminas composer install
```

Once installed, you can test it out immediately using PHP's built-in web server:

```bash
$ cd path/to/install
$ php -S 0.0.0.0:8080 -t public
# OR use the composer alias:
$ composer run --timeout 0 serve
```

This will start the cli-server on port 8080, and bind it to all network
interfaces. You can then visit the site at http://localhost:8080/
- which will bring up solvians project welcome page.

**Note:** The built-in CLI server is *for development only*.

## Class Diagram
You can find a PNG image attached with email, with a class diagram to help you know more about the project.

## Notes:-
- You'll find the main business logic in The Service dir. ( The layer after Controller )
- Repository Will also responsible for data.
- Unittests here were written TDD.
- I've focused on Service and Model when we talk about unittest.
- If there is anything to discuss or ask about, don't hesitate to call me. 
- You can check (CODE-3000) to test XML exception.