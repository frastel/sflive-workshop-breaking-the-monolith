FROM ubuntu:16.04

ENV DEBIAN_FRONTEND noninteractive

# upgrade system
RUN apt-get update && \
    apt-get upgrade -yq && \
    apt-get install -yq \
    curl \
    php7.0-cli \
    php7.0-fpm \
    php7.0-intl \
    php7.0-mysql  \
    php7.0-sqlite3\
    php7.0-curl \
    php7.0-gd \
    php7.0-xml \
    nginx-full \
    supervisor \
    mysql-client \
    --no-install-recommends && \
    apt-get clean && apt-get purge && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# requirements for symfony app
# --- PHP STUFF ---
# --- NGINX STUFF ---
# Append "daemon off;" to the beginning of the configuration
RUN sed -i "s@doc_root =@doc_root =/code/web@" /etc/php/7.0/fpm/php.ini && \
    sed -i "s@;error_log = php_errors.log@error_log = /proc/self/fd/2@" /etc/php/7.0/fpm/php.ini && \
    echo "date.timezone = Europe/Paris" >> /etc/php/7.0/cli/php.ini && \
    echo "date.timezone = Europe/Paris" >> /etc/php/7.0/fpm/php.ini && \
    echo "daemon off;" >> /etc/nginx/nginx.conf && \
    usermod -u 1000 www-data

# Use own configs
ADD src/ /

WORKDIR /code

EXPOSE 80 443

ENTRYPOINT ["/entrypoint.sh"]

CMD /usr/bin/supervisord
