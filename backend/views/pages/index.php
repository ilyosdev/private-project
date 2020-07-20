<?php

    use yii\grid\GridView;
    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $searchModel common\models\search\PagesSearch */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'Pages');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="pages-index">


    <div class="block-header">
        <p>
            <?= Html::a(Yii::t('app', 'Create Pages'), ['create'], ['class' => 'btn btn-success']) ?>
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
                'title',
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
