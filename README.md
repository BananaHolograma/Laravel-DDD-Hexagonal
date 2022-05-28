<div align="center">
  <h1 style="margin: 0;">Docker NGINX - PHP</h1>
</div>

- [Prerequisites](#prerequisites)
  - [Make tool](#make-tool)
    - [Windows](#windows)
      - [WSL 2](#wsl-2)
    - [Unix based systems](#unix-based-systems)
    - [Your PHP project](#your-php-project)
- [Makefile](#makefile)
  - [Makefile variables](#makefile-variables)
  - [Environment root file _(.env)_](#environment-root-file-env)
  - [Build and get running the local dev environment](#build-and-get-running-the-local-dev-environment)
    - [Working with containers](#working-with-containers)

# Prerequisites

---

## Make tool

### Windows

- Install [Chocolatey package manager](https://chocolatey.org/install)
- Once installed run: `sh choco install make`

##### WSL 2

We strongly recommend using Ubuntu as a subsystem when it comes to work as programmer on windows environments, it will save you a lot of trouble in the future. Here we give you the best resources to prepare the setup on your Windows system.
[How to setup the perfect development environment for windows](https://char.gd/blog/2017/how-to-set-up-the-perfect-modern-dev-environment-on-windows)
[Window 10 for web dev](https://fireship.io/lessons/windows-10-for-web-dev)
[Window terminal preview](https://www.microsoft.com/en-us/p/windows-terminal-preview/9n0dx20hk701?activetab=pivot:overviewtab#)

---

### Unix based systems

Usually is installed by default but if for whatever reason you don't have it, just install the build-essential package via terminal.

```sh
# DEBIAN based
sudo apt install build-essential

# CentOS and others that use yum
yum install make
```

# Your PHP project
Just put your PHP application inside `src` folder, the nginx serves this folder automatically.
For example you can install a fresh laravel project inside:
```bash
make shell/php 
# Now inside the php container run:
rm .gitkeep && composer create-project laravel/laravel .
```

# Makefile

This file help us to abstract the layer that interacts with your application in a standard way without needed to touch docker directly.

The default make command install automatically the dependencies needed to raise the local development environment and modify your **/etc/hosts** to setup your custom domain that you're plan to use for HTTPS, because of this you need to provide your user password in order to execute commands as **'sudo'** _(don't hesitate to check the bash scripts to make sure there is no malicious code)_.

**_Note: If you're using WSL you need to manually edit the /etc/hosts on your Window OS to setup the custom domain_**.


## Environment root file _(.env)_

Default configuration variables to be used on ` docker-compose.yml`, feel free to modify them to fit your requisites.

```bash
APP_USER=laravel
APP_DOMAIN=app.local
APPLICATION_FOLDER=./src

CONTAINER_PREFIX=php-environment
NGINX_INTERNAL_PORT=80

DB_PORT=3306
DB_NAME=app_db
DB_USER=admin
DB_USER_PASSWORD=secret
DB_ROOT_PASSWORD=secret
DB_ALLOW_EMPTY_PASSWORD=yes
```

## Build and get running the local dev environment

This process execute the initial scripts, create the local ssl certs and build the docker containers, .

```sh
# In LINUX distributions you need to run export HOST_UID=$(id -u) && export HOST_GID=$(id -g)
# In order to match your host user with the container one to avoid permission issues.

make or make build
```

### Working with containers

Once the containers are running we have few commands on the Makefile to make our lifes easy in order to execute the most common ones in our day-to-day.
This is mandatory, you can still use the docker commands directly on your shell.

```bash
# For local environment setup

make up # Start the containers
make down # To turn down completely
make restart # To restart all the containers

make destroy # To destroy them if you need a complete rebuild

make shell/php # Start a bash session inside the php container (to execute composer, artisan or node commands for example)

# DIG INTO THE MAKEFILE TO SEE ALL THE AVAILABLE COMMANDS
``
