<?php

use yii\helpers\Html;


?>
<!-- Стилизуем модальное окно для корзины -->
<div class="table-responsive">
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>Имя</th>
                <th>Email</th>
                <th>Телефон</th>
                <th>Адресс</th>
                <th>Название</th>
                <th>Кол-во</th>
                <th>Цена</th>
                <th>Сумма</th>
                <th><span class="glyphicon glyphicon-remove" area-hidden="true"></span></th>
            </tr>
        </thead>
        <tbody>
            <!-- Перебераем и выводим карзину в сессии -->
            <?php foreach ($session['cart'] as $id => $item) : ?>
                <tr>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $order['name'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $order['email'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $order['phone'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $order['address'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $item['name'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;"><?= $item['qty'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;">$<?= $item['price'] ?></td>
                    <td style="padding:8px; border: 1px solid #ddd;">$<?= $item['price'] *  $item['qty'] ?></td>

                </tr>
            <?php endforeach ?>
            <tr>
                <th colspan="7" style="padding:8px; border: 1px solid #ddd;">Итого:</th>
                <th style="padding:8px; border: 1px solid #ddd;"><?= $session['cart.qty'] ?></th>
            </tr>
            <tr>
                <th colspan="7" style="padding:8px; border: 1px solid #ddd;" colspan="4">Сумма:</th>
                <th style="padding:8px; border: 1px solid #ddd;">$<?= $session['cart.sum'] ?></th>
            </tr>
        </tbody>
    </table>
</div>