<?php

    namespace backend\controllers;

    use backend\models\DashboardStat;
    use backend\models\LoginForm;
    use Yii;
    use yii\filters\AccessControl;
    use yii\web\Controller;

    /**
     * Site controller
     */
    class SiteController extends Controller
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
                            'actions' => ['login', 'error'],
                            'allow'   => true,
                        ],
                        [
                            'actions' => ['logout', 'index'],
                            'allow'   => true,
                            'roles'   => ['@'],
                        ],
                    ],
                ],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function actions()
        {
            return [
                'error' => [
                    'class'  => 'yii\web\ErrorAction',
                    'layout' => "guest"
                ],
            ];
        }

        /**
         * Displays homepage.
         *
         * @return string
         */
        public function actionIndex()
        {
            $dashboardstat = new DashboardStat();
            $dashboardstat->countUsers();
            return $this->render('index', ['stats' => $dashboardstat]);
        }

        /**
         * Login action.
         *
         * @return string
         */
        public function actionLogin()
        {
            $this->layout = "guest";

            if (!Yii::$app->user->isGuest) {
                return $this->goHome();
            }

            $model = new LoginForm();
            if ($model->load(Yii::$app->request->post()) && $model->login()) {
                return $this->goBack();
            } else {
                $model->password = '';

                return $this->render('login', [
                    'model' => $model,
                ]);
            }
        }

        /**
         * Logout action.
         *
         * @return string
         */
        public function actionLogout()
        {
            Yii::$app->user->logout();

            return $this->goHome();
        }
    }
