<?php

    use yii\grid\GridView;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'Resources');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="resources-index">


    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create Resources'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="c-index">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns'      => [
                [
                    'class'          => 'yii\grid\SerialColumn',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'title',
                'url:url',
                'order_by',
                [
                    'class'          => 'yii\grid\ActionColumn',
                    'template'       => '{update} {delete}',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
            ],
        ]); ?>

    </div>
</div>
