# Newsletter Service

Provides a UI Fragment for the Newsletter Subscription box.

## Docker Compose Snippet

      # ------------------
      # newsletter
      # ------------------
      newsletter:
        container_name: workshop-newsletter
        build: docker/moby-dick
        ports:
         - "8003:80"
        volumes:
         - ./apps/newsletter:/code

      varnish:
        container_name: workshop-varnish
        ports:
         - "8000:80"
        build: docker/varnish
        depends_on:
          - monolith
          - newsletter

