<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container">
<?php if (Yii::$app->session->hasFlash('success')) : ?>
    <div class="alert alert-success alert-dissmisable" role="alert">
        <button type="button" class="close" data-dismiss="alert" area-label="Close"><span area-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('success'); ?>
    </div>
<?php endif; ?>

<?php if (Yii::$app->session->hasFlash('error')) : ?>
    <div class="alert alert-danger alert-dissmisable" role="alert">
        <button type="button" class="close" data-dismiss="alert" area-label="Close"><span area-hidden="true">&times;</span></button>
        <?= Yii::$app->session->getFlash('error'); ?>
    </div>
<?php endif; ?>
<?php if ($session['cart']) : ?>
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
    <hr>
    <?php $form = ActiveForm::begin()?>
    <?= $form->field($order, 'name')?>
    <?= $form->field($order, 'email')?>
    <?= $form->field($order, 'phone')?>
    <?= $form->field($order, 'address')?>
    <?= Html::submitButton('Заказать', ['class'=>'btn btn-success'])?>
    <?php ActiveForm::end()?>
<?php else : ?>
    <h3>Корзина пуста</h3>
<?php endif; ?>
</div>