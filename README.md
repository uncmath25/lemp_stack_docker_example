# LEMP Stack Dockerized Example


### Description:
This project is a full LEMP stack example that is dockerized.  It consists of a basic bootstrap + jQUery front-end which communicates with the simple PHP endpoints via AJAX.  The PHP endpoints then access a MySQL database which exists locally.  The web-app is actually somewhat useful: I utilize a personal deployment of this project to keep track of errands :)

### Usage:
* Make sure that docker and docker-compose are installed
* ` make run ` handles everything involved in installing, building and running the server in the background: access the server locally on: http://localhost:5000
* Remember to stop the server when you're finished: ` make stop `
* You can reset the database with ` make reset `; otherwise changes made to the website are persistent across uses
