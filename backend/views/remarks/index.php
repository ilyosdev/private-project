<?php

    use yii\grid\GridView;
    use yii\widgets\Pjax;

    /* @var $this yii\web\View */
    /* @var $type_id integer
     * /* @var $searchModel common\models\search\RemarksSearch
     */
    /* @var $dataProvider yii\data\ActiveDataProvider */

    $this->title = Yii::t('app', "RemarksType{$type_id}");
    $this->params['breadcrumbs'][] = $this->title;


    $columns = [];

    switch ($type_id) {
        case 1:
            $columns = [
                [
                    'attribute'      => 'id',
                    'contentOptions' => ['width' => 100]
                ],
                [
                    'attribute' => 'doc_id',
                ],
                [
                    'attribute' => 'folder_id',
                    'value'     => 'doc.folder.default_title'
                ],
                [
                    'attribute' => 'doc_name',
                    'value'     => 'doc.default_name'
                ],
                'body:ntext',
                [
                    'attribute' => 'usefull_or_not',
                    'filter'    => [
                        1 => Yii::t('app', "Yes"),
                        0 => Yii::t('app', "No"),
                    ],
                    'value'     => function ($model) {
                        if ($model->usefull_or_not == 1) {
                            return Yii::t('app', "Yes");
                        } else {
                            return Yii::t('app', "No");
                        }
                    }
                ]
            ];
            break;
        case 2:
            $columns = [
                [
                    'attribute'      => 'id',
                    'contentOptions' => ['width' => 100]
                ],
                [
                    'attribute' => 'doc_id',
                ],
                [
                    'attribute' => 'folder_id',
                    'value'     => 'doc.folder.default_title'
                ],
                [
                    'attribute' => 'doc_name',
                    'value'     => 'doc.default_name'
                ],
                'body:ntext',
                'user_comment:ntext',
            ];
            break;
        case 3:
            $columns = [
                [
                    'attribute'      => 'id',
                    'contentOptions' => ['width' => 100]
                ],
                'body:ntext',
            ];
            break;
    }


    $columns[] = [
        'class'          => 'yii\grid\ActionColumn',
        'template'       => '{delete}',
        'headerOptions'  => ['width' => '70'],
        'contentOptions' => ['class' => 'text-center']
    ];

?>
<div class="remarks-index">

    <div class="c-index">

        <?php Pjax::begin(); ?>

        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel'  => $searchModel,
            'columns'      => $columns,
        ]); ?>

        <?php Pjax::end(); ?>
    </div>
</div>
