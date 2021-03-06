<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Furniture */

$this->title = Yii::t('app', 'Добавить фурнитуру');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Фурнитура'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="furniture-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
