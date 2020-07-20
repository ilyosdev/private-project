<?php

    use yii\helpers\Html;
    use yii\web\YiiAsset;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model common\models\Localizations */

    $this->title = $model->id;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Localizations'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    YiiAsset::register($this);
?>
<div class="localizations-view">

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
            'ru',
            'uz',
            'en',
            'oz',
            'zh',
            'ar',
            'es',
            'fr',
            'de',
            'code',
        ],
    ]) ?>

</div>
