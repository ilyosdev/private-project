<?php

namespace backend\controllers;

use common\models\Payment;
use common\models\search\UsersSearch;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends Controller
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UsersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param integer $id
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = User::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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

    public function actionStatus($s)
    {
        $users = Payment::findByStatus($s);

        if($s == 0) {
            return $this->render('activation', [
                'dataProvider' => $users,
            ]);
        }
       return $this->render('usersStatus', [
           'dataProvider' => $users,
       ]);
    }


    public function actionPayment($action, $id, $days)
    {
        if (Yii::$app->request->isAjax) {
            Yii::$app->response->format = Response::FORMAT_JSON;
            $modelPayment = Payment::find()->where(['id' => $id])->one();
            $modelUser = User::find()->where(['id' => $modelPayment->created_by])->one();

            $duedate = strtotime('now'."+$days days");

            if ($action === 'accept') {

                $modelPayment->status = 1;
                $modelUser->status = 2;
                $modelUser->due_date = $duedate;

                if ($modelPayment->save() && $modelUser->save()) {
                    return ['data' => [
                        'success' => true,
                        'message' => 'User has been activated.',
                    ]];
                }

                return ['data' => [
                    'success' => false,
                    'message' => 'check attributes',
                ]];
            } elseif ($action === 'reject') {

                $modelPayment->status = 2;
                $modelUser->status = 0;

                if ($modelPayment->save() && $modelUser->save()) {
                    return ['data' => [
                        'success' => true,
                        'message' => 'Payment rejected.',
                    ]];
                }

                return ['data' => [
                    'success' => false,
                    'message' => 'check attributes',
                ]];
            }
        }

        return ['data' => [
            'success' => false,
            'message' => 'this is not ajax request',
        ]];

    }

}
