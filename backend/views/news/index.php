<?php

    use common\models\Languages;
    use yii\grid\GridView;
    use yii\helpers\ArrayHelper;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\NewsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'News');
    $this->params['breadcrumbs'][] = $this->title;

    $status = [
        -1 => Yii::t('app', "Қоралама"),
        0  => Yii::t('app', "Чоп қилишга таёр"),
        1  => Yii::t('app', "Чоп этилган"),
    ];

    $lang = ArrayHelper::map(Languages::getList(), 'web_code', 'title');
?>
<div class="news-index">


    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create News'), ['create'], ['class' => 'btn btn-success']) ?>
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
                [
                    'headerOptions' => ['width' => '130'],
                    'attribute'     => 'date',
                    'format'        => ['date', 'php:d/m/Y']
                ],
                'title',
                [
                    'attribute' => 'status',
                    'filter'    => $status,
                    'value'     => function ($model) use ($status) {
                        return $status[$model->status];
                    }
                ],
                [
                    'attribute' => 'language',
                    'filter'    => $lang,
                    'value'     => function ($model) use ($lang) {
                        return $lang[$model->language];
                    }
                ],
                'view_counter',
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
