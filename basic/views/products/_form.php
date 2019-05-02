<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

	<?php $form = ActiveForm::begin(); ?>

	<?php

	# MODEL #
	ob_start();

	echo $form->field($model, 'name')->textInput(['maxlength' => true]);
	echo $form->field($model, 'xml_id')->textInput(['maxlength' => true]);
	$productFields = ob_get_contents();

	ob_end_clean();
	# MODEL #


	# FURNITURE #
	ob_start();

	foreach ($arFurniture as $arItem){
		$label = implode(', ', [
				$arItem['name'],
				$arItem['color'],
				$arItem['unit'],
		]);
		$label .= ' (' . $arItem['xml_id'] . ')';

		echo $form->field($model, 'composition[furniture][' . $arItem['id'] . ']')->textInput(['maxlength' => true])->label($label);
	}

	$furnitureFields = ob_get_contents();

	ob_end_clean();
	# FURNITURE #

	echo Tabs::widget([
		'tabContentOptions' => [
			'class' => 'mt-md-2'
		],
		'items' => [
			[
				'label' => 'Модель',
				'content' => $productFields,
				'options' => ['id' => 'model'],
				'active' => true
			],
			[
				'label' => 'Ткани',
				'content' => 'Anim pariatur cliche...',
				'options' => ['id' => 'textile'],
			],
			[
				'label' => 'Фурнитура',
				'content' => $furnitureFields,
			],
        ],
	]);?>





<!--    --><?//= $form->field($model, 'composition')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
