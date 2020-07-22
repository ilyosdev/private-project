<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="payment-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Chekni jo`natish', ['create'], ['class' => 'btn btn-success']) ?>
    </p>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                    'attribute' => 'check',
                    'content' => function ($model) {
                        return $this->render('_check_item', ['model'=> $model]);
                    }
            ],
            [
                'attribute' => 'status',
                'content' => function ($model) {
                    return $model->getStatusLabel()[$model->status];
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',
        ],
    ]); ?>


</div>
