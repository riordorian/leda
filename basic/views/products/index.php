<?php

use app\models\Products;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Модели');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Добавить модель'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'name',
            'manufacturing',
			[
				'attribute' => 'image',
				'format' => ['image',['width'=>'200']],
				'value' => function($dataProvider) { return $dataProvider->image; },
			],
			[
				'label'  => (new $dataProvider->query->modelClass())->getAttributeLabel('composition'),
				'value'  => function ($model){
					return $this->render('_view_composition.php', [
							'model' => $model,
							'productComposition' => Products::getCompositionInfo($model->getAttribute('composition'), $model->manufacturing)
					]);
				},
				'format' => 'html'
			],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
