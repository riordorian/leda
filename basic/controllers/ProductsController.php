<?php

namespace app\controllers;

use app\models\Furniture;
use app\models\Textile;
use Yii;
use app\models\Products;
use app\models\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Products models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
    	$model = $this->findModel($id);
        return $this->render('view', [
            'model' => $model,
            'productComposition' => Products::getCompositionInfo($model->composition, $model->manufacturing),
        ]);
    }

    public function actionComposition()
    {
		$searchModel = new ProductsSearch();
		$arData = $searchModel->search(Yii::$app->request->queryParams)->query->all();

		foreach ($arData as &$obItem) {
			$obItem->composition = Products::getCompositionInfo($obItem->composition, 0, true)['composition'];
		}
		unset($obItem);

		return $this->render('composition', [
			'searchModel' => $searchModel,
			'arData' => $arData,
		]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Products();
        $modelFurniture = Furniture::class;
        $modelTextile = Textile::class;

        $arTextile = Textile::find()
			->orderBy(['color' => 'asc'])
			->asArray()->all();
		$arFurniture = Furniture::find()->orderBy(['color' => 'asc'])->asArray()->all();

        if ($model->load(Yii::$app->request->post()) ) {
			$model->imageInfo = UploadedFile::getInstance($model, 'image');
			if ($model->imageInfo && $model->validate()) {
				$filePath = 'uploads/products/' . $model->imageInfo->baseName . '.' . $model->imageInfo->extension;
				$model->imageInfo->saveAs($filePath);
				$model->image = '/' . $filePath;
			}

			$model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'modelFurniture' => $modelFurniture,
            'modelTextile' => $modelTextile,
            'arTextile' => $arTextile,
            'arFurniture' => $arFurniture,
        ]);
    }

    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$modelFurniture = Furniture::class;
		$modelTextile = Textile::class;

		$arTextile = Textile::find()
			->orderBy(['color' => 'asc'])
			->asArray()->all();
		$arFurniture = Furniture::find()->orderBy(['color' => 'asc'])->asArray()->all();

        if ($model->load(Yii::$app->request->post())) {
			$model->imageInfo = UploadedFile::getInstance($model, 'image');
			if ($model->imageInfo && $model->validate()) {
				$filePath = 'uploads/products/' . $model->imageInfo->baseName . '.' . $model->imageInfo->extension;
				$model->imageInfo->saveAs($filePath);
				$model->image = '/' . $filePath;
			}

			$model->save();

            return $this->redirect(['view', 'id' => $model->id]);
        }

        $model->composition = is_array(json_decode($model->composition, 1)) && !empty($model->composition) ? json_decode($model->composition, 1) : [];

        return $this->render('update', [
            'model' => $model,
			'modelFurniture' => $modelFurniture,
			'modelTextile' => $modelTextile,
			'arTextile' => $arTextile,
			'arFurniture' => $arFurniture,
        ]);
    }

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Products::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
