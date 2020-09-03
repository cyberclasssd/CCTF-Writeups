FROM ubuntu:16.04
RUN apt-get update && apt-get -y install apache2 php libapache2-mod-php php-mysql

RUN mkdir /var/www/html/intro/
COPY ["web intro/src/", "var/www/html/intro/"]

RUN mkdir /var/www/html/lair/
COPY ["snocs lair/snocslair/src/", "var/www/"]
COPY ["snocs lair/snocslair/src/public/", "var/www/html/lair/"]

RUN mkdir /var/www/html/cookies/
COPY ["kirkland signature variety cookie tray/src/", "var/www/html/cookies/"]

RUN mkdir /var/www/html/cheese/
COPY ["cheese/src/", "var/www/html/cheese/"]

RUN mkdir /var/www/html/cow/
COPY ["cow clients/src/", "var/www/html/cow/"]

RUN mkdir /var/www/html/uwu/
COPY ["uwu my owo b0ts/src/", "var/www/html/uwu/"]

RUN mkdir /var/www/html/bros/
COPY ["mac for bros/src/", "var/www/html/bros/"]

RUN mkdir /var/www/html/meinkraft/
COPY ["meinkraft/src/", "var/www/html/meinkraft"]

RUN rm /var/www/html/index.html
RUN a2dismod --force autoindex
RUN service apache2 restart
CMD ["apachectl","-D","FOREGROUND"]
EXPOSE 80
