<?php

    namespace backend\controllers;

    use common\models\Remarks;
    use common\models\search\RemarksSearch;
    use Throwable;
    use Yii;
    use yii\db\StaleObjectException;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;

    class RemarksController extends Controller
    {
        /**
         * {@inheritdoc}
         */
        public function behaviors()
        {
            return [
                'access' => [
                    'class' => AccessControl::className(),
                    'rules' => [
                        [
                            'allow' => true,
                            'roles' => ['@'],
                        ],
                    ],
                ],
                'verbs'  => [
                    'class'   => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ];
        }

        /**
         * Lists all Remarks models.
         * @return mixed
         */
        public function actionIndex()
        {
            $type_id = Yii::$app->request->get('type');

            $searchModel = new RemarksSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $type_id);

            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
                'type_id'      => $type_id
            ]);
        }

        /**
         * Displays a single Remarks model.
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
         * Finds the Remarks model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return Remarks the loaded model
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id)
        {
            if (($model = Remarks::findOne($id)) !== null) {
                return $model;
            }

            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        /**
         * Deletes an existing Remarks model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         * @throws Throwable
         * @throws StaleObjectException
         */
        public function actionDelete($id)
        {
            $model = $this->findModel($id);

            $type_id = $model->remark_type;

            $model->delete();

            return $this->redirect(['index', 'type' => $type_id]);
        }
    }
