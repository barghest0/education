<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\LinkPager;

?>
<!-- Страница категории -->
<section id="advertisement">
	<div class="container">
		<img src="images/shop/advertisement.jpg" alt="" />
	</div>
</section>


<section>
	<div class="container">
		<div class="row">
			<div class="col-sm-3">
				<div class="left-sidebar">
					<h2>Category</h2>
					<ul class="catalog category-products">
						<?= app\widgets\MenuWidget::widget(['tpl' => "menu"]) ?>
					</ul>
					<!--/category-products-->

					<div class="brands_products">
						<!--brands_products-->
						<h2>Brands</h2>
						<div class="brands-name">
							<ul class="nav nav-pills nav-stacked">
								<li><a href="#"> <span class="pull-right">(50)</span>Acne</a></li>
								<li><a href="#"> <span class="pull-right">(56)</span>Grüne Erde</a></li>
								<li><a href="#"> <span class="pull-right">(27)</span>Albiro</a></li>
								<li><a href="#"> <span class="pull-right">(32)</span>Ronhill</a></li>
								<li><a href="#"> <span class="pull-right">(5)</span>Oddmolly</a></li>
								<li><a href="#"> <span class="pull-right">(9)</span>Boudestijn</a></li>
								<li><a href="#"> <span class="pull-right">(4)</span>Rösch creative culture</a></li>
							</ul>
						</div>
					</div>
					<!--/brands_products-->

					<div class="price-range">
						<!--price-range-->
						<h2>Price Range</h2>
						<div class="well text-center">
							<input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5" data-slider-value="[250,450]" id="sl2"><br />
							<b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
						</div>
					</div>
					<!--/price-range-->


				</div>
			</div>
			<?php if ($products) : ?>
				<div class="col-sm-9 padding-right">
					<div class="features_items">
						<!--features_items-->
						<h2 class="title text-center"><?= $category ?></h2>
						<?php foreach ($products as $product) : ?>
							<div class="col-sm-4">
								<div class="product-image-wrapper">
									<div class="single-products">
										<div class="productinfo text-center">
											<?= Html::img("@web/images/products/{$product->img}", ['alt' => $product->name]) ?>
											<h2> <?= $product->price ?></h2>
											<p><a href="<?= yii\helpers\Url::to(['product/view', 'id' => $product->id]) ?>"><?= $product->name ?></a></p>
											<a href="<?= yii\helpers\Url::to(['cart/add', 'id' => $product->id]) ?>" data-id="<?= $product->id ?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
										</div>
									</div>
									<?php if ($product->new) : ?>
										<?= Html::img("@web/images/home/new.png", ['alt' => 'Новинка', 'class' => 'new']) ?>
									<?php endif; ?>
									<?php if ($product->sale) : ?>
										<?= Html::img("@web/images/home/sale.png", ['alt' => 'Распродажа', 'class' => 'sale']) ?>
									<?php endif; ?>
									<div class="choose">
										<ul class="nav nav-pills nav-justified">
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
											<li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
										</ul>
									</div>
								</div>
							</div>
							<?php $i++ ?>
							<?php if ($i % 3 == 0) : ?>
								<!-- clearfix - пустой блок, для того, чтобы все не съезжало -->
								<div class="clearfix"></div>
							<?php endif; ?>
						<?php endforeach; ?>
						<div class="clearfix"></div>
						<!-- Выводим нашу пагинацию с помощью виджета -->
						<?= LinkPager::widget(['pagination' => $pages]) ?>
					<?php else : ?>
						<h2>Здесь товарова пока нет</h2>
					<?php endif; ?>
					<!-- <div class="clearfix"></div>
					<ul class="pagination">
						<li class="active"><a href="">1</a></li>
						<li><a href="">2</a></li>
						<li><a href="">3</a></li>
						<li><a href="">&raquo;</a></li>
					</ul>
					</div> -->
					<!--features_items-->
					</div>
				</div>
		</div>
</section>