# Unit 4

1. Файлы конфигурации

	- Файлы конфигурации
	- Форматы конфигурации
	- Формат YAML


2. Управление окружениями

	- Файл .env
	- Выбор активного окружения
	- Синтаксис файла .env
	- Добавить значение к файлу .env;
	- Команда id в Linux
	- Id пользователя в Docker


3. Контроллер
	
	- Наследование php
	- Создание контроллера
	- Базовый класс контроллера

4. Дополнительные зависимости

	- Установка Profiler
	- Логирование и отладка
	- Ускорение разработки с помощью бандла Maker
	- Выбор формата конфигурации
	- Генерация контроллера
	- Аннотации Маршруты


## Команда id в Linux
Команда id в Linux используется для отображения реального и эффективного идентификатора пользователя и идентификатора группы пользователя.
```sh
Синтаксис id: id [пользователь]
```
### Вывод идентификатора пользователя и группы. 
Если пользователь не указан, выдается информация о пользователе, вызвавшем команду: id
```sh
id 

uid=1000(janus) gid=1000(janus) groups=1000(janus),4(adm),24(cdrom),27(sudo),30(dip),46(plugdev),113(lpadmin),130(sambashare),999(docker)

```

### Получить идентификаторы пользователя root: id root
```sh
id root

uid=0(root) gid=0(root) группы=0(root),1(bin),2(daemon),3(sys),4(adm),
6(disk),10(wheel),102(pkcs11) context=user_u:system_r:unconfined_t

```
## Получить идентификатор пользователя и группы

1. Получить идентификатор пользователя и группы (uid и gid текущего пользователя): id
1. Добавьте определение в docker-compose.yml
```yaml
version: '3.9'
services:
 Sphp: # это имя службы
   container_name: sphp
   user: "${UID}:${GID}" # мы добавили эту строку, чтобы получить идентификатор конкретного пользователя/группы
```

3. Установите значения в файле .env:
```yaml
# .env
UID=1000
GID=1000

```
Теперь пользователь в контейнере имеет идентификатор 1000 и группу - 1000.
Замените идентификаторы UID=1000, GID=1000 на идентификаторы пользователя/группы вашей хост-системы. 

## Параметр user $HOME в Docker


```bash

FROM php:8.0-fpm

RUN apt-get update \
    && DEBIAN_FRONTEND=noninteractive apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev libssl-dev libxml2-dev libpq-dev \
    && docker-php-ext-install -j$(nproc) intl opcache \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip \
    && apt-get clean && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug \
    && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini \
    && echo "xdebug.client_host = host.docker.internal" >> /usr/local/etc/php/conf.d/docker-php-ext-xdebug.ini 

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer --quiet

RUN curl -sS https://get.symfony.com/cli/installer | bash
RUN mv /root/.symfony/bin/symfony /usr/local/bin/symfony

RUN git config --global user.email "couchjanus@gmail.com" \ 
    && git config --global user.name "couchjanus"

RUN useradd -rm -d /home/www -s /bin/bash -g root -G sudo -u 1000 www
USER www

EXPOSE 9000

```
