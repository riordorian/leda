<?php

$prevColor = '';
foreach ($arFurniture as $arItem){
	if ($arItem['color'] != $prevColor){
		echo '<h2>' . $arItem['color'] . '</h2><hr>';
		$prevColor = $arItem['color'];
	}
	$arItem['composition_count'] = !empty($model->composition[$modelFurniture][$arItem['id']]) ? $model->composition[$modelFurniture][$arItem['id']] : '';

	echo $form
		->field(
			$model,
			'composition[' . $modelFurniture . '][' . $arItem['id'] . ']',
			['inputTemplate' => '<div class="input-group"><span class="input-group-addon">' . $arItem['unit'] . '</span>{input}</div>']
		)
		->textInput(['value' => $arItem['composition_count']])
		->label($arItem['name']);
}