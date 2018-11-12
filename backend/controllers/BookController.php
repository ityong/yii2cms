<?php

namespace backend\controllers;

use Yii;
use common\models\Ebook;
use common\models\searchs\EbookSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * BookController implements the CRUD actions for Ebook model.
 */
class BookController extends BaseController
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
     * Lists all Ebook models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new EbookSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Ebook model.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Ebook model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Ebook();

        $params = Yii::$app->request->post();


        if (Yii::$app->request->isPost) {

            $params['Ebook']['cover'] = $params['Ebook']['cover'] ?
                str_replace(Yii::$app->params['WEB_SITE_RESOURCES_URL'],'',$params['Ebook']['cover']) : '';
            if ($model->load($params) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ebook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isPost) {
            $params = Yii::$app->request->post();
            $params['Ebook']['cover'] = $params['Ebook']['cover'] ?
                str_replace(Yii::$app->params['WEB_SITE_RESOURCES_URL'],'',$params['Ebook']['cover']) : '';

            if ($model->load($params) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Ebook model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionSetRes($id)
    {
        $model = $this->findModel($id);

        if (Yii::$app->request->isAjax) {
            $params = Yii::$app->request->post();
            Yii::$app->response->format = 'json';
            $model->find_info = $params['find_info'];
            $model->definition = $params['definition'];
            $model->status = $params['definition'] ? Ebook::BOOK_STATUS_HAVING :Ebook::BOOK_STATUS_NOT_FIND ;

            return $model->save() ? ['code'=>200,'msg'=>'ok'] : ['code'=>400,'msg'=>'更新失败'];

        }

        return $this->render('set-res', [
            'model' => $model,
        ]);
    }



    /**
     * Deletes an existing Ebook model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {

        $model = $this->findModel($id);
        $delRes = $model->delete();

        if (Yii::$app->request->isAjax) {
            if($delRes){
                return['code'=>200,"msg"=>"删除成功"];
            }else{
                $errors = $model->firstErrors;
                return ['code'=>400,"msg"=>reset($errors)];
            }
        } else {
            return $this->redirect(['index']);
        }

    }


    /**
     * Finds the Ebook model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Ebook the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Ebook::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
