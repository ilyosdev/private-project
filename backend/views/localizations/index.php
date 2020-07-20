<?php

    use yii\grid\GridView;
    use yii\helpers\Html;
    use yii\widgets\Pjax;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\LocalizationsSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'Localizations');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="localizations-index">

    <?php Pjax::begin(); ?>

    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create Localizations'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'code',
                'uz',
                'oz',
                'ru',
                'en',
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
