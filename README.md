<p>Перед запуском:</p>
<code>composer install</code><br>
<code>npm install</code>
<p>Перед запуском выполнить миграцию:</p>
<code>php artisan migrate</code>
<p>Для запонения базы данных произвольными значениями:</p>
<code>php artisan db:seed</code>
<div>
    <h3>Основные маршруты</h3>
    <p><b>system-administrator/</b> админ панель</p>
    <p><b>system-administrator/order/ad</b>d добавление заказа</p>
    <p><b>system-administrator/order/{id}/change/status</b> изменение статуса заказа</p>
    <p><b>system-administrator/user/{id}/orders</b> просмотр списка заказов определенного пользователя с пагинацией</p>
    <p><b>system-administrator/user/{id}/orders?status=processed</b> просмотр списка заказов со статусом processed определенного пользователя с пагинацией</p>
    <p><b>system-administrator/users</b> просмотр списка пользователей</p>
    <h3>Api</h3>
    <p><b>api/orders</b> список заказов с пагинацией</p>
    <p><b>PUT api/orders/{order}</b> изменение значений заказа</p>
</div>
