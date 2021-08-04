#

docker-compose down

docker-compose up -d --build


docker-compose exec shop-php  bash

symfony new app


mv ./app/* ./
mv ./app/.* ./

rm -Rf app/     

ls -l

drwxr-xr-x 2 root root  4096 Aug  4 12:26 bin
-rw-r--r-- 1 root root  1411 Aug  4 12:26 composer.json
-rw-r--r-- 1 root root 97362 Aug  4 12:26 composer.lock
drwxr-xr-x 4 root root  4096 Aug  4 12:26 config
drwxrwxr-x 4 1000 1000  4096 Aug  2 10:03 docker
-rw-rw-r-- 1 1000 1000   778 Aug  4 12:13 docker-compose.yml
drwxr-xr-x 2 root root  4096 Aug  4 12:26 public
drwxr-xr-x 3 root root  4096 Aug  4 12:26 src
-rw-r--r-- 1 root root  3564 Aug  4 12:26 symfony.lock
drwxrwxrwx 4 root root  4096 Aug  4 12:26 var
drwxr-xr-x 6 root root  4096 Aug  4 12:26 vendor

chown 1000:1000 -R .
ls -l

