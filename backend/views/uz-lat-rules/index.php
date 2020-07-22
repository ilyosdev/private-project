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

    <?php Pjax::begin(); ?>

    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create Uz Lat Rules'), ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <?php echo $this->render('_search', ['model' => $searchModel]); ?>


    <div class="c-index">

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => [
                [
                    'class'          => 'yii\grid\SerialColumn',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'id',
                'uz_value',
                'oz_value',

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
