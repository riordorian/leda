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
				<th>Название модели</th>
				<th>Объем партии</th>
				<th>Тип материала</th>
				<th>Название материала</th>
				<th>Количество материала</th>
				<th>Цена на изделие</th>
			</tr>
		</thead>

		<tbody>
		<?
			foreach ($arData as $obItem) {

				foreach ($obItem->composition as $compositionType => $arTypeInfo) {
					foreach ($arTypeInfo as $materialName => $arMaterialInfo) {
						?><tr>
							<td><?= $obItem->id ?></td>
							<td><?= $obItem->name ?></td>
							<td> </td>
							<td><?= $compositionType ?></td>
							<td><?= $materialName ?></td>
							<td><?= $arMaterialInfo['amount'] ?></td>
							<td><?= $arMaterialInfo['price'] ?></td>
						</tr><?
					}
				}

			}
		?>
		</tbody>
	</table>



</div>
