<?php

use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <?php Pjax::begin(); ?>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="c-index">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'id',
                'phone',
                'name',
                'due_date:date',
//                'dueDateFormat',
//                [
//                    'attribute' => 'due_date',
//                    'format' => ['date', 'php:d/m/Y']
//                ],
//                [
//                    'attribute' => 'due_date',
//                    'value' => 'dueDateFormat'
//                ],
//                [
//                    'attribute' => 'due_date',
//                    'value' => function ($model) {
//                        return date("d/m/Y", $model->due_date);
//                    }
//                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{update} {delete}',
                    'headerOptions' => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>

    </div>
</div>
