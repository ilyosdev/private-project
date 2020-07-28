<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activation">


    <div class="c-index">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'id',
                [
                    'headerOptions' => ['width' => '450'],
                    'attribute' => 'check',
                    'content' => function ($dataProvider) {
                        return $this->render('_check_item', ['dataProvider'=> $dataProvider]);
                    }
                ],
                'username',
                'status',
                'created_at:date',
            ],
        ]); ?>

    </div>
</div>


