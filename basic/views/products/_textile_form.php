<?php

foreach ($arTextile as $arItem){
	$label = implode(', ', [
		$arItem['name'],
		$arItem['color'],
		$arItem['unit'],
	]);

	echo $form->field($model, 'composition[furniture][' . $arItem['id'] . ']')->textInput(['maxlength' => true])->label($label);
}