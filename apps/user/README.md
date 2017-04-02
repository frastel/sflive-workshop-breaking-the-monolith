# User Service

Provides a vertical for the user pages.

## Docker Compose Snippet

      # ------------------
      # user
      # ------------------
      user-database:
        container_name: workshop-user-database
        environment:
          - MYSQL_ROOT_PASSWORD=workshop
        ports:
         - "9004:3306"
        image: "mariadb"
      user-init:
        container_name: workshop-user-init
        build: docker/moby-dick
        volumes:
         - ./apps/user:/code
        command: ["./bin/init.sh"]
      user:
        container_name: workshop-user
        build: docker/moby-dick
        ports:
         - "8004:80"
        volumes:
         - ./apps/user:/code
        depends_on:
          - user-database
          - user-init

      varnish:
        depends_on:
          # ...
          - user

