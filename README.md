# Тестовое задание

## Развертывание проекта
> Добавить .env файл
```
cp .env.example .env
```
> Установить зависимости
```
composer install
```
> Сгенерировать ключ шифрования
```
php artisan key:generate
```
> Заупстить локальную БД
```
docker-compose up -d
```
> Заупстить локальный сервер
```
php artisan serve
```
> Сгенерировать ключи шифрования
```
php artisan passport:keys
```
> Применить все миграции
```
php artisan migrate
```
> затем наполнить БД стартовыми данными
```
php artisan db:seed
```
> Или выполнить миграцию с флагом ```--seed```:
```
php artisan migrate --seed
```

