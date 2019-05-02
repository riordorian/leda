<?php

use app\models\Colors;
use app\models\Units;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="furniture-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'xml_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'color')->dropDownList(ArrayHelper::map(Colors::find()->all(), 'name', 'name')) ?>

    <?= $form->field($model, 'width')->textInput(['value' => $model->width ? $model->width : 0]) ?>

    <?= $form->field($model, 'height')->textInput(['value' => $model->height ? $model->height : 0]) ?>

    <?= $form->field($model, 'unit')->dropDownList(ArrayHelper::map(Units::find()->all(), 'name', 'name'))?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'discount')->textInput() ?>

    <?= $form->field($model, 'tax')->textInput() ?>

    <?= $form->field($model, 'total_price')->textInput() ?>

    <?= $form->field($model, 'amount')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
