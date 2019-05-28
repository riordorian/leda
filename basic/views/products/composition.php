<?php

use app\models\Products;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Состав моделей');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

	<table class="table-striped" border="1px">
		<thead>
			<tr>
				<th>ID модели</th>
				<th>Изображение</th>
				<th>Название модели</th>
				<th>Объем партии</th>
				<th>Тип материала</th>
				<th>Название материала</th>
				<th>Количество материала (шт, ширина)</th>
				<th>Количество материала (высота)</th>
				<th>Цена на изделие</th>
			</tr>
		</thead>

		<tbody>
		<?
			foreach ($arData as $obItem) {
				$i = 0;

				foreach ($obItem->composition as $compositionType => $arTypeInfo) {

					$j = 0;
					foreach ($arTypeInfo as $materialName => $arMaterialInfo) {
						?><tr>
							<td><?= $i == 0 ? $obItem->id : '' ?></td>
							<td>
								<img width="100" src="<?= $i == 0 ? $obItem->image : '' ?>" alt="">
							</td>
							<td><?= $i == 0 ? $obItem->name : '' ?></td>
							<td> </td>
							<td><?= $j == 0 ? $compositionType : '' ?></td>
							<td><?= $materialName ?></td>
							<td><?= number_format(floatval($arMaterialInfo['amount']), 2, ',', '') ?></td>
							<td><?= number_format(floatval($arMaterialInfo['height']), 2, ',', '') ?></td>
							<td><?= number_format(floatval($arMaterialInfo['price']), 2, ',', '') ?></td>
						</tr><?
						$j++;
					}

					$i++;
				}

			}
		?>
		</tbody>
	</table>



</div>
