<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Textile */

$this->title = Yii::t('app', 'Добавить Ткань');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ткань'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="textile-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
