<?php

    namespace backend\controllers;

    use common\models\Pages;
    use common\models\search\PagesSearch;
    use Throwable;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\db\StaleObjectException;
    use yii\filters\AccessControl;
    use yii\filters\VerbFilter;
    use yii\web\Controller;
    use yii\web\NotFoundHttpException;

    class PagesController extends Controller
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
         * Lists all Pages models.
         * @return mixed
         */
        public function actionIndex()
        {
            $searchModel = new PagesSearch();
            $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

            return $this->render('index', [
                'searchModel'  => $searchModel,
                'dataProvider' => $dataProvider,
            ]);
        }

        /**
         * Displays a single Pages model.
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
         * Finds the Pages model based on its primary key value.
         * If the model is not found, a 404 HTTP exception will be thrown.
         * @param integer $id
         * @return array|ActiveRecord
         * @throws NotFoundHttpException if the model cannot be found
         */
        protected function findModel($id)
        {
            if (($model = Pages::find()->where(['id' => $id])->multilingual()->one()) !== null) {
                return $model;
            }

            throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
        }

        /**
         * Creates a new Pages model.
         * If creation is successful, the browser will be redirected to the 'view' page.
         * @return mixed
         */
        public function actionCreate()
        {
            $model = new Pages();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('create', [
                'model' => $model,
            ]);
        }

        /**
         * Updates an existing Pages model.
         * If update is successful, the browser will be redirected to the 'view' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         */
        public function actionUpdate($id)
        {
            $model = $this->findModel($id);

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['index']);
            }

            return $this->render('update', [
                'model' => $model,
            ]);
        }

        /**
         * Deletes an existing Pages model.
         * If deletion is successful, the browser will be redirected to the 'index' page.
         * @param integer $id
         * @return mixed
         * @throws NotFoundHttpException if the model cannot be found
         * @throws Throwable
         * @throws StaleObjectException
         */
        public function actionDelete($id)
        {
            $this->findModel($id)->delete();

            return $this->redirect(['index']);
        }
    }
