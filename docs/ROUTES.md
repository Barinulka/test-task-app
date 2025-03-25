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
* Добавить заказ
```
POST /api/order/create HTTP/1.1
Content-Type: application/json


{
    "type_id": int - ID order_type,
    "partnership_id": int - ID pertnership,
    "user_id": int - ID user,
    "description": "string" - описание,
    "date": "string" - дата в формате YYYY-mm-dd,
    "address": "string" - адрес,
    "amount":  int - количество,
    "status": "string" - статус ('created', 'assigned', 'completed')
}
```
