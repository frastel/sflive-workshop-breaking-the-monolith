# Recipe Service

Provides a JSON API for recipe data.


## Docker Compose Snippet

      # ------------------
      # recipe
      # ------------------
      recipe-database:
        container_name: workshop-recipe-database
        environment:
          - MYSQL_ROOT_PASSWORD=workshop
        ports:
         - "9002:3306"
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
         - "8002:80"
        volumes:
         - ./apps/recipe:/code
        depends_on:
          - recipe-database
          - recipe-init
      
      monolith:
        depends_on:
          # ...
          - recipe
