# Образ с DockerHub, включает Apache и PHP 7.4
FROM php:7.4-apache
# Обновляем и устанавливаем пакеты, устанавливаем расширения
RUN apt-get update && apt-get install -y \
        curl \
        wget \
    && docker-php-ext-install -j$(nproc) mysqli pdo_mysql
# Сообщаем, какие порты контейнера слушать
EXPOSE 80