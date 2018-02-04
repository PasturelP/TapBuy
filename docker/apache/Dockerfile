FROM tapbuy_base

ENV DEBIAN_FRONTEND noninteractive

ENV APACHE_RUN_USER www-data
ENV APACHE_RUN_GROUP www-data
ENV APACHE_LOG_DIR /logs
ENV APACHE_LOCK_DIR /var/lock/apache2
ENV APACHE_PID_FILE /var/run/apache2/apache2.pid

RUN sed -i s/" main"/" main contrib non-free"/g /etc/apt/sources.list
RUN aptitude -y update
RUN aptitude -y install apache2 apache2-mpm-worker libapache2-mod-fastcgi libapache2-authenntlm-perl

RUN a2enmod rewrite proxy_fcgi actions headers
RUN mkdir /cgi-bin

ADD fastcgi.conf /etc/apache2/mods-available/
ADD tapbuy.conf /etc/apache2/sites-available/

RUN a2dissite 000-default.conf

RUN a2ensite tapbuy.conf

EXPOSE 80

CMD ["/usr/sbin/apache2", "-D", "FOREGROUND"]
