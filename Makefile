include .env
#CURRENT DIR FOR WINDOWS & UNIX SYSTEMS
CURRENT_DIR := $(dir $(abspath $(lastword $(MAKEFILE_LIST))))
SHELL=/bin/bash
VERSION=${shell cat VERSION}
PROJECT_FOLDER :=${CURRENT_DIR}src
DOCKER_PATH :=${CURRENT_DIR}images
HOOKS_DIR :=${CURRENT_DIR}hooks
NGINX_CERTS_PATH :=${DOCKER_PATH}/nginx/certs

#DEFAULT BEHAVIOR
all:build

.PHONY: build
build:install env docker/build-nc up 

install:
	@chmod -R u+x "${CURRENT_DIR}/scripts"
	$(SHELL) -c "${CURRENT_DIR}/scripts/install-dependencies.sh"
	@mkdir -p "${CURRENT_DIR}src"
	@make certs

env:
	@if [ ! -f ${CURRENT_DIR}.env ]; then cp ${CURRENT_DIR}.env.example ${CURRENT_DIR}.env; fi

.PHONY: clean
clean:
	@$(SHELL) -c "rm -rfv ${CURRENT_DIR}${PROJECT_FOLDER}/{*,.*} ||:"

certs:
	mkcert -cert-file ssl.crt \
		-cert-file ssl.crt \
		-key-file ssl.key \
		$(APP_DOMAIN)
	mkdir -p ${NGINX_CERTS_PATH}
	mv ssl.crt ${NGINX_CERTS_PATH}
	mv ssl.key ${NGINX_CERTS_PATH}
	$(SHELL) -c "${CURRENT_DIR}scripts/manage-etc-hosts.sh add $(APP_DOMAIN)"

up: docker/up
	@make ps
down: docker/down
	@make ps
ps: docker/ps
restart:docker/down docker/up
destroy:docker/destroy
	$(SHELL) -c "${CURRENT_DIR}scripts/manage-etc-hosts.sh remove $(APP_DOMAIN)"

# DOCKER GENERIC COMMANDS
docker/ps: CMD=ps
docker/build: CMD=build
docker/build-nc: CMD=build --no-cache
docker/rebuild: CMD=up -d --no-deps --build --force-recreate
docker/up: CMD=up -d
docker/stop: CMD=stop
docker/down: CMD=down --remove-orphans
docker/restart: CMD=restart
docker/destroy: CMD=down --rmi all --volumes --remove-orphans
docker/destroy-volumes: CMD=down --volumes --remove-orphans
docker/run: CMD=run --rm $(command)
docker/exec: CMD=exec $(command)
docker/exec-tty: CMD=exec -T $(command)
	
docker/ps docker/up docker/build docker/rebuild docker/build-nc docker/stop docker/restart docker/down docker/destroy docker/destroy-volumes docker/run docker/exec docker/exec-tty:
	docker-compose ${CMD}

shell/nginx: CMD="nginx bash"
shell/php: CMD="php bash"
shell/db: CMD="db bash"
shell/redis: CMD="redis bash"

.PHONY: shell
shell shell/nginx shell/php shell/db shell/redis:
	@make docker/exec command=${CMD}