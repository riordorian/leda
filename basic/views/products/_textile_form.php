<?php

$prevColor = '';

foreach ($arTextile as $arItem){
	if ($arItem['color'] != $prevColor){
		echo '<h2>' . $arItem['color'] . '</h2><hr>';
		$prevColor = $arItem['color'];
	}

	$label = $arItem['name'] . ', ' . $arItem['width'] . 'x' . $arItem['height'];
	$arCompositionVal = $model->composition[$modelTextile][$arItem['id']];
	$arItem['composition_count'] = [
		'width' => !empty($arCompositionVal['width']) ? $arCompositionVal['width'] : '',
		'height' => !empty($arCompositionVal['height']) ? $arCompositionVal['height'] : '',
	];

	?>
	<div class="row">
		<div class="col-md-6">
			<?= $form->field($model,
					'composition[' . $modelTextile . '][' . $arItem['id'] . '][width]',
					['inputTemplate' => '<div class="input-group"><span class="input-group-addon">ш</span>{input}</div>',]
				)
				->textInput(['value' => $arItem['composition_count']['width']])
				->label($label);?>
		</div>
		<div class="col-md-6">
			<?= $form->field($model,
					'composition[' . $modelTextile . '][' . $arItem['id'] . '][height]',
					['inputTemplate' => '<div class="input-group"><span class="input-group-addon">в</span>{input}</div>',]
				)
				->textInput(['value' => $arItem['composition_count']['height']])
				->label(false);?>
		</div>
	</div><?

}