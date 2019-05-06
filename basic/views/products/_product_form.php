<?php

use yii\helpers\Html;

echo $form->field($model, 'name')->textInput(['maxlength' => true]);
echo $form->field($model, 'xml_id')->textInput(['maxlength' => true]);
echo $form->field($model, 'manufacturing')->textInput(['type' => 'number']);
echo $form->field($model, 'image')->fileInput();

if ($model->image && file_exists(Yii::getAlias('@webroot') . $model->image)) {
	echo $form->field($model, 'image')->hiddenInput()->label(false);
	echo Html::img($model->image, ['width' => 300, 'class' => 'col-md-offset-6']);
}