
<!-- Выводим наши ссылки из меню -->
<li>
    <a href="<?= yii\helpers\Url::to(['category/view', 'id' => $category['id']]) ?>">
        <?= $category['name'] ?>
        <?php
        if ($category['childs']) {
            echo '<span class="badge pull-right"><i class="fa fa-plus"></i></span>';
        }
        ?>
    </a>
    <?php
    if ($category['childs']) {
        echo '<ul>' . $this->getMenuHtml($category['childs']) . '</ul>';
    }
    ?>
</li>