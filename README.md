# Bars.group-test
## Описание приложения
Приложение выполняет запрос для заданного ip-адреса в сервис https://2ip.ua/ru/api/our-api, извлекает данные об ip-адресе и сохраняет их в базе данных. В дальнейшем при отсутствии доступа к данному сервису при запросе данных уже сохраненного ip-адреса эти данные берутся непосредственно из базы данных.

## Требования к системе
Для запуска приложения необходимы
* MySQL 5.7
* PHP7
* Composer
* Node.js
* Yarn

## Установка приложения
1. скопировать содержимое репозитория в локальную папку
2. открыть папку проекта в командной строке
3. установить все зависимости backend
```
composer install
```
4. создать файл .env.local, скопировав в него содержимое .env
5. настроить подключение к базе данных в файле .env.local
6. создать базу данных
```
php bin/console doctrine:database:create
```
7. выполнить миграции
```
php bin/console doctrine:migrations:migrate
```
8. установить все зависимости frontend
```
yarn install
```
9. скомпоновать файлы frontend
```
yarn encore dev
```
10. запустить сервер разработки
```
php bin/console server:run
```

## Дополнительно
Можно получать сведения об ip-адресе через консоль командой
```
php bin/console app:check-ip {ip}
```
