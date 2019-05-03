<?php

use app\models\Products;
use yii\console\widgets\Table;
use yii\helpers\Html;

foreach ($productComposition['composition'] as $group  => $arGroupComposition){
	echo Html::tag('h4', $group);
	echo Html::tag('hr');

	echo Html::ul($arGroupComposition, ['item' => function($item, $index) {
		return Html::tag(
			'li',
			Html::tag('b', $index) . ' - ' . $item,
			['class' => 'post']
		);
	}]);

	echo Html::tag('hr', '', ['style' => 'visibility: hidden;']);
}

?>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Чистая себестоимость</th>
			<th>Полная себестоимость</th>
			<th>Опт</th>
			<th>Розница</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td><?=$productComposition['price']['base']?></td>
			<td><?=$productComposition['price']['fullBase']?></td>
			<td><?=$productComposition['price']['wholeSale']?></td>
			<td><?=$productComposition['price']['retail']?></td>
		</tr>
	</tbody>
</table>
