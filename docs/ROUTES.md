# Маршруты

* Получить список сессий
```
GET /api/session/active HTTP/1.1
Authorization: Bearer {token}
```
* Удалить сессию
```
DELETE /api/session/revoke/{tokenId} HTTP/1.1
Authorization: Bearer {token}
```
* Получить список типов заказов
```
GET /api/order-types/list HTTP/1.1
Authorization: Bearer {token}
```
* Получить список Компаний партнеров
```
GET /api/partnership/list HTTP/1.1
Authorization: Bearer {token}
```
* Получить список менеджеров
```
GET /api/users/list HTTP/1.1
Authorization: Bearer {token}
```
