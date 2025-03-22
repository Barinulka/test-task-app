# Авторизация/Регистрация
## Регистрация нового пользователя (менеджера)
```
POST /api/register HTTP/1.1
Content-Type: application/json

{
    "name": "string" - Имя пользователя (макс. 255 символов),
    "email": "string" - Email,
    "password": "string" - Пароль (мин. 4 символа)
}
```
## Вход (получение токена)
```
POST /api/login HTTP/1.1
Content-Type: application/json

{
    "email": "string",
    "password": "string"
}

## Выход (logout)
```
POST /api/logout HTTP/1.1
Authorization: Bearer {token}
```

## Успешные ответы
### Пользователь добавлен
```
HTTP/1.1 201 Created

{
    "id": int
}
```
где: **id** - (int) - ID созданного пользователя
### Получение токена (login)
```
HTTP/1.1 200 OK

{
    "token": "string" - токен
}
```
### Выход (logout)
```
HTTP/1.1 204 No Content
```
