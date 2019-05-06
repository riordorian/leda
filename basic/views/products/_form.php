<?php

use yii\bootstrap\Tabs;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

	<?php $form = ActiveForm::begin([
		'layout' => 'horizontal',
		'fieldConfig' => [
			'horizontalCssClasses' => [
				'wrapper' => 'col-md-6',
				'offset' => '',
				'label' => 'col-md-6',
			],
		],
		'options' => ['enctype' => 'multipart/form-data']
	]); ?>

	<?php

	echo Tabs::widget([
		'tabContentOptions' => [
			'style' => 'margin-top: 20px;'
		],
		'items' => [
			[
				'label' => 'Модель',
				'content' => $this->render('_product_form.php', ['model' => $model, 'form' => $form]),
				'options' => ['id' => 'model'],
				'active' => true
			],
			[
				'label' => 'Ткани',
				'content' => $this->render('_textile_form.php', [
						'model' => $model,
						'modelTextile' => $modelTextile,
						'form' => $form,
						'arTextile' => $arTextile
				]),
				'options' => ['id' => 'textile'],
			],
			[
				'label' => 'Фурнитура',
				'content' => $this->render('_furniture_form.php', [
						'model' => $model,
						'modelFurniture' => $modelFurniture,
						'form' => $form,
						'arFurniture' => $arFurniture
				]),
			],
        ],
	]);?>


    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Сохранить'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
