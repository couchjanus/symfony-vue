# Клонируем репозиторий
1. переходим в домашний каталог:
cd 
2. создаем каталог проектов:
mkdir projects && cd projects
3. Клонируем репозиторий:
git clone https://github.com/couchjanus/symfony-vue
4. переходим в каталог:
cd symfony-vue
5. удаляем чужой origin:
rm -Rf .git
6. инициируем свой git:
git init
7. добавляем свой remote origin:
git remote add origin https://github.com/<your-profile>/<your-repo.git> 
8. меняем ветку:
git branch -M main


9. собираем контейнер:
docker-compose up -d --build
docker-compose down

10. выполняем деплой:
git add .

git commit -m "added docker"

git push origin main

