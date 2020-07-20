<?php

    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\widgets\Pjax;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\UzLatRulesSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'UzLatRules');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="uz-lat-rules-index">

    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create Uz Lat Rules'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>


    <div class="c-index">
        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns'      => [
                [
                    'class'          => 'yii\grid\SerialColumn',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'id',
                'title',
                [
                    'class'          => 'yii\grid\ActionColumn',
                    'template'       => '{update} {delete}',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>
