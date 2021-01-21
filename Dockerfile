FROM php:7.2-apache 

RUN apt-get update \
  && apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev
RUN pecl install xdebug

RUN mkdir /home/project
RUN apt-get install git -y

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '756890a4488ce9024fc62c56153228907f1545c228516cbf63f885e036d37e9a59d27d63f46af1d4d07ee0f76181c7d3') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --filename=composer
RUN mv composer /usr/bin/composer
RUN chmod +x /usr/bin/composer
RUN php -r "unlink('composer-setup.php');"

RUN export PATH=$PATH:/root/.local/bin/

WORKDIR /home/project
COPY ./docker/php/base.conf /etc/apache2/sites-available/base.conf
COPY ./docker/php/php.ini /usr/local/etc/php/
RUN a2ensite base.conf
RUN a2enmod rewrite.load
RUN ln -s /home/project /var/www/website

EXPOSE 8080

ENTRYPOINT "/bin/bash"