# Recipe Service

Provides a JSON API for recipe data.


## Docker Compose Snippet

      # ------------------
      # recipe api
      # ------------------
      recipe-database:
        container_name: workshop-recipe-database
        environment:
          - MYSQL_ROOT_PASSWORD=workshop
        ports:
         - "9001:3306"
        image: "mariadb"
      recipe-init:
        container_name: workshop-recipe-init
        build: docker/moby-dick
        volumes:
         - ./apps/recipe:/code
        command: ["./bin/init.sh"]
      recipe:
        container_name: workshop-recipe
        build: docker/moby-dick
        ports:
         - "8001:80"
        volumes:
         - ./apps/recipe:/code
        depends_on:
          - recipe-database
          - recipe-init
      
      monolith:
        depends_on:
          # ...
          - recipe
