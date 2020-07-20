<?php


    namespace backend\controllers;


    use common\models\Districts;
    use common\models\FoldersLocalization;
    use common\models\User;
    use yii\web\Controller;

    class TestController extends Controller
    {

        public function actionIndex()
        {
            $model = new User();
            $model->password = "advice*&#$";
            $model->generateAuthKey();
            print_r($model);
        }

        public function actionIndex2()
        {

            $list = Districts::find()->all();
            foreach ($list as $item) {
                $model = Districts::findOne(['id' => $item->id]);
                $model->uz = $model->name;
                $model->oz = $model->name;
                $model->ru = $model->name;
                $model->en = $model->name;
                $model->zh = $model->name;
                $model->es = $model->name;
                $model->ar = $model->name;
                $model->fr = $model->name;
                $model->de = $model->name;
                $model->save(false);
            }

            return 0;
        }

        public function actionIndex23()
        {
            $list = FoldersLocalization::find()->all();

            $langs = [
                1 => 'ru',
                2 => 'uz',
                3 => 'en',
                4 => 'oz',
                5 => 'zh',
                6 => 'ar',
                7 => 'es',
                8 => 'fe',
                9 => 'de',
            ];

            foreach ($list as $item) {
                $model = FoldersLocalization::findOne(['id' => $item->id]);
                $model->language = $langs[$item->lang_id];
                $model->save(false);
            }
        }

    }