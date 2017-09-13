# See https://github.com/docker-library/php/blob/4677ca134fe48d20c820a19becb99198824d78e3/7.0/fpm/Dockerfile
FROM mysql

ADD conf.d/mysql_custom.cnf /etc/mysql/conf.d/mysql_custom.cnf
RUN chmod 644 /etc/mysql/conf.d/mysql_custom.cnf

