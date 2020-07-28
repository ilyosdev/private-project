<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\Modal;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UsersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'User');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-activation">


    <div class="c-index">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                [
                    'class' => 'yii\grid\SerialColumn',
                    'headerOptions' => ['width' => '70'],
                    'contentOptions' => ['class' => 'text-center']
                ],
                'id',
                [
                    'headerOptions' => ['width' => '450'],
                    'attribute' => 'check',
                    'content' => function ($dataProvider) {
                        return $this->render('_check_item', ['dataProvider'=> $dataProvider]);
                    }
                ],
                'username',
                'status',
                'created_at:date',
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{accept} {reject}',
                    'headerOptions' => ['width' => '350'],
                    'contentOptions' => ['class' => 'centerButtons'],
                    'buttons' => [
                        'accept' => function ($url, $dataProvider) {
//                            return Html::a('<span class="text-success fa fa-check"></span> Tasdiqlash', $url, [
//                               'id' => 'acceptPayment', 'data-action' => 'tasdiqlash', 'data-id' => $dataProvider['id']
//                            ]);
                            return Html::button('Tasdiqlash', [
                                'value' => '1',
                                'class' => 'btn btn-success btn-lg d-block mb-3  mt-3',
                                'id' => 'acceptModelId',
                                'data-toggle'=> 'modal',
                                'data-target'=> '#acceptModel',
                                'data-action' => 'tasdiqlash',
                                'data-id' => $dataProvider['id'],
                            ]);
                        },
                        'reject' => function ($url, $dataProvider) {
                            return Html::button('Rad etish', [
                                'class' => 'btn btn-danger btn-lg',
                                'id' => 'rejectPayment',
                                'data-action' => 'rad etish',
                                'data-id' => $dataProvider['id'],
                            ]);
                        },

                    ],
                ],
            ],
        ]); ?>

    </div>
</div>



<?php
    Modal::begin([
        'id' => 'acceptModel',
        'size' => 'modal-md',

    ]);

    echo "<div id='modalContent'>";
    ?>
    <form>
        <div class="form-group">
            <label for="days" class="col-form-label">Kunlarda kiriting:</label>
            <input type="number" class="form-control text-dark bg-white" value="" id="days" placeholder="30">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="sumbitDays">Send message</button>
        </div>
    </form>


    <? echo "</div>";

    Modal::end();
?>



