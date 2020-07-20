<?php

    use yii\grid\GridView;
    use yii\widgets\Pjax;

    /* @var $this yii\web\View */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', 'Settings');
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-index">
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
                'setting_key',
                'setting_value:ntext',
                [
                    'class'          => 'yii\grid\ActionColumn',
                    'template'       => '{update}',
                    'headerOptions'  => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
            ],
        ]); ?>
        <?php Pjax::end(); ?>
    </div>
</div>