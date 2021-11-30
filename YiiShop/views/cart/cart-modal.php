<?php

use yii\helpers\Html;

if ($session['cart']) : ?>
    <!-- Стилизуем модальное окно для корзины -->
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Название</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" area-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <!-- Перебераем и выводим карзину в сессии -->
                <?php foreach ($session['cart'] as $id => $item) : ?>
                    <tr>
                        <th><?= Html::img("@web/images/products/{$item['img']}", ['height' => 80]) ?></th>
                        <th><?= $item['name'] ?></th>
                        <th><?= $item['qty'] ?></th>
                        <th>$<?= $item['price'] ?></th>
                        <th><span class="glyphicon glyphicon-remove text-danger del-item" data-id="<?= $id ?>" area-hidden="true"></span></th>
                    </tr>
                <?php endforeach ?>
                <tr>
                    <th colspan="4">Итого:</th>
                    <th><?= $session['cart.qty'] ?></th>
                </tr>
                <tr>
                    <th colspan="4">Сумма:</th>
                    <th>$<?= $session['cart.sum'] ?></th>
                </tr>
            </tbody>
        </table>
    </div>
<?php else : ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>