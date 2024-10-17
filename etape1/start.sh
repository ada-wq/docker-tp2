#!/bin/bash
docker build -t http-container -f Dockerfile.nginx .
docker run -d --name http -p 8080:8080 http-container

docker build -t php-container -f Dockerfile.php .
docker run -d --name script php-container
