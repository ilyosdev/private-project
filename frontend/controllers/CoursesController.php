<?php

namespace app\controllers;

use common\models\Courses;
use yii\data\ActiveDataProvider;

class CoursesController extends \yii\web\Controller
{

    /**
     * Lists all Payment models.
     * @return mixed
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Courses::find()
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }
}
