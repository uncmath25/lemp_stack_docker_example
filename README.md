# LEMP Stack Dockerized Example


### Description:
This project is a full LEMP stack example that is dockerized.  It consists of a basic bootstrap + jQUery front-end which communicates with the simple PHP endpoints via AJAX.  The PHP endpoints then access a MySQL database which exists locally.  The entire project is dockerized for both local development through local file mounting and for more robust vps deployment.  The web-app can actually be somewhat useful: I utilize a personal deployment of this project to keep track of errands :)


### Local Usage:
Local testing is facilitated through file mounting, allowing for faster development:
* Make sure that **docker** and **docker-compose** are installed
* ` make run ` handles everything involved in installing, building and running the server in the background: access the server locally on: http://localhost:8080
* Remember to stop the server when you're finished: ` make stop `
* You can reset the database with ` make reset `; otherwise changes made to the website are persistent across uses


### Deployment:
Deployment to DigitalOcean is quite simple with the following steps:
1. Create a DigitalOcean account and a personal access token through their API tab
2. Install **docker-machine** if necessary
3. Create a new droplet configured for docker: ` docker-machine create --driver digitalocean --digitalocean-access-token PERSONAL_ACCESS_TOKEN DROPLET_NAME `
4. Use the newly created machine: ` eval $(docker-machine env temp) `
5. Build the containers on the remote droplet: ` make deploy `
6. Stop the containers using ` make stop ` and reset the database using ` make reset `
6. Stop using the machine and return to the local environment: ` eval $(docker-machine env -u) `
7. Destroy the droplet using ` docker-machine rm DROPLET_NAME ` (be careful)
7. Investigate the following article for more detailed deployment info: "https://www.digitalocean.com/community/tutorials/how-to-provision-and-manage-remote-docker-hosts-with-docker-machine-on-ubuntu-18-04"
