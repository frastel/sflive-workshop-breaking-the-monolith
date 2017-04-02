# Workshop: Breaking the Monolith

## Requirements

* Vagrant: [1.9.*](https://www.vagrantup.com/downloads.html) 
* Virtual Box: [5.1.*](https://www.virtualbox.org/wiki/Downloads)
 
## Virtual Machine

Start the machine

    vagrant up --provider virtualbox
    
Destroy the machine
    
    vagrant destroy -f

## The Application

Start it with

    vagrant ssh
    cd /vagrant
    ./bin/start.sh

Call it via browser

    http://192.168.33.10:8000
    
## Ports
    
Varnish:
* http: http://192.168.33.10:8000

Monolith:
* http: http://192.168.33.10:8001
* database: 9000

Recipe:
* http: http://192.168.33.10:8002
* recipe-database: 9002    
  
Newsletter:
* http: http://192.168.33.10:8003
* **no** database
    
## Helper scripts

Composer

    # install by default
    ./bin/composer.sh
    
    # equals
    ./bin/composer.sh install
    
    # require lib
    ./bin/composer.sh require ramsey/uuid-doctrine
    
## Running the tests

For simplicity reasons you have to jump in the application container first

    ./bin/enter
    
Afterwards call the test runner with

    ./bin/phpunit
    
    
## Links
- [Vagrant](https://www.vagrantup.com/downloads.html)
- [VirtualBox](https://www.virtualbox.org/wiki/Downloads)
- [Announcing Docker Enterprise Edition](https://blog.docker.com/2017/03/docker-enterprise-edition/)
- [Docker Installation](https://docs.docker.com/engine/installation/linux/ubuntu/#install-using-the-repository) and [postinstall on linux](https://docs.docker.com/engine/installation/linux/linux-postinstall/#manage-docker-as-a-non-root-user)
- [Symfony File Permissions Hacks with Docker](http://stackoverflow.com/questions/34949083/symfony-docker-permission-problems-for-cache-files)
- [wait-for-it.sh script](https://github.com/vishnubob/wait-for-it)

## Pastebin 

Ignore this stuff :)

    sudo /vagrant/bin/provision.sh
    
    Image for service web was built because it did not already exist. To rebuild this image you must use `docker-compose build` or `docker-compose up --build`.
