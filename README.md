# Устанавливаем symfony

1. поднимаем docker:
```bash
docker-compose up -d --build
```
2. запускаем контейнер
```bash
docker-compose exec shop-php bash
```
3. устанавливаем symfony
```bash
symfony new app
```
4. Смотрим права

```bash
ls -l

total 16
-rw-rw-r-- 1 1000 1000  408 Aug  4 13:45 README.md
drwxr-xr-x 9 root root 4096 Aug  4 13:50 app
drwxrwxr-x 4 1000 1000 4096 Aug  2 10:03 docker
-rw-rw-r-- 1 1000 1000  778 Aug  4 12:13 docker-compose.yml

```

5. Меняем права
```bash
chown 1000:1000 -R app/
```
6. Проверяем
```bash
ls -l

total 16
-rw-rw-r-- 1 1000 1000  408 Aug  4 13:45 README.md
drwxr-xr-x 9 1000 1000 4096 Aug  4 13:50 app
drwxrwxr-x 4 1000 1000 4096 Aug  2 10:03 docker
-rw-rw-r-- 1 1000 1000  778 Aug  4 12:13 docker-compose.yml
root@f75713e1c314:/var/www# ls -l app/
total 128
drwxr-xr-x 2 1000 1000  4096 Aug  4 13:50 bin
-rw-r--r-- 1 1000 1000  1411 Aug  4 13:50 composer.json
-rw-r--r-- 1 1000 1000 97362 Aug  4 13:50 composer.lock
drwxr-xr-x 4 1000 1000  4096 Aug  4 13:50 config
drwxr-xr-x 2 1000 1000  4096 Aug  4 13:50 public
drwxr-xr-x 3 1000 1000  4096 Aug  4 13:50 src
-rw-r--r-- 1 1000 1000  3564 Aug  4 13:50 symfony.lock
drwxrwxrwx 4 1000 1000  4096 Aug  4 13:50 var
drwxr-xr-x 6 1000 1000  4096 Aug  4 13:50 vendor

```
7. Поднимаем каталоги выше на один уровень 
```bash
mv ./app/* ./
mv ./app/.* ./
```
8. Удаляем ненужное
```bash
rm -Rf app/     
```
9. Выходим из контейнера
```bash
exit
```
10. Тестирем проект
http://27.0.0.1

11. выполняем деплой:
```bash
git add .

git commit -m "added docker"

git push origin main

```