<?php

    use yii\helpers\Html;
    use yii\web\YiiAsset;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model common\models\Remarks */

    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Remarks'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    YiiAsset::register($this);
?>
<div class="remarks-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data'  => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method'  => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'id',
            'doc_id',
            'usefull_or_not',
            'body:ntext',
            'status',
            'remark_type',
            'lang_id',
            'user_comment:ntext',
            'date',
        ],
    ]) ?>

</div>
