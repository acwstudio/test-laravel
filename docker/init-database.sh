#!/bin/bash

#Black        0;30     Dark Gray     1;30
#Red          0;31     Light Red     1;31
#Green        0;32     Light Green   1;32
#Brown/Orange 0;33     Yellow        1;33
#Blue         0;34     Light Blue    1;34
#Purple       0;35     Light Purple  1;35
#Cyan         0;36     Light Cyan    1;36
#Light Gray   0;37     White         1;37

set -o allexport
source .env
set +o allexport

IP_PHP_CONTAINER=$(docker inspect -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' $PHP_CONTAINER_NAME)
echo $IP_PHP_CONTAINER

CREATE_USER="create USER '${DB_USERNAME}'@'%' identified by '${DB_PASSWORD}';"
USER_GRANT="grant all privileges on ${DB_DATABASE}.* to ${DB_USERNAME}@'%';"

#    .---------- constant part!
#    vvvv vvvv-- the code from above
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color
#printf "I ${RED}love${NC} Stack Overflow\n"

docker exec ${MYSQL_CONTAINER_NAME} mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "create database $DB_DATABASE;" 2>/dev/null
if [ $? != 0 ]; then
  echo -e "${RED}database " $DB_DATABASE "@'%' is already exists...${NC}"
else
  echo -e "${GREEN}database " $DB_DATABASE "@'%' created successfully...${NC}"
fi

docker exec ${MYSQL_CONTAINER_NAME} mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "$CREATE_USER" 2>/dev/null
if [ $? != 0 ]; then
  echo -e "${RED}User " $DB_USERNAME "@'%' is already exists...${NC}"
else
  echo -e "${GREEN}User " $DB_USERNAME "@'%' created successfully...${NC}"
fi

docker exec ${MYSQL_CONTAINER_NAME} mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "$USER_GRANT" 2>/dev/null

docker exec ${MYSQL_CONTAINER_NAME} mysql -uroot -p${MYSQL_ROOT_PASSWORD} -e "show databases;"

