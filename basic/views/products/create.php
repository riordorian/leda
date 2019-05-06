<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = Yii::t('app', 'Добавить модель');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Модели'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'modelFurniture' => $modelFurniture,
		'modelTextile' => $modelTextile,
		'arTextile' => $arTextile,
		'arFurniture' => $arFurniture,
    ]) ?>

</div>
