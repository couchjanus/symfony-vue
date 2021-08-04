# Клонируем репозиторий
1. переходим в домашний каталог:
```bash
cd 
```
2. создаем каталог проектов:
```bash
mkdir projects && cd projects
```
3. Клонируем репозиторий:
```bash
git clone https://github.com/couchjanus/symfony-vue/tree/unit_01
```
4. переходим в каталог:
```bash
cd symfony-vue
```
5. удаляем чужой origin:
```bash
rm -Rf .git
```
6. инициируем свой git:
```bash
git init
```
7. добавляем свой remote origin:
```bash
git remote add origin https://github.com/<your-profile>/<your-repo.git> 
```
8. меняем ветку:
```bash
git branch -M main
```

9. собираем контейнер:
```bash
docker-compose up -d --build
docker-compose down
```
10. выполняем деплой:
```bash
git add .

git commit -m "added docker"

git push origin main
```
