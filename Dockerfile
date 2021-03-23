FROM php:8-apache
RUN apt-get update && apt-get upgrade -y
RUN apt-get install -y git
RUN cd /var/www/
RUN git clone https://github.com/gusgeek/bloGo-app.git
RUN cd bloGo-app 
RUN cp /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/
COPY --chown=www-data:www-data . /var/www/html
RUN chmod 777 /var/www/html/artworks/publicaciones