<?php

    use yii\helpers\Html;
    use yii\web\YiiAsset;
    use yii\widgets\DetailView;

    /* @var $this yii\web\View */
    /* @var $model common\models\Settings */

    $this->title = $model->setting_key;
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    YiiAsset::register($this);
?>
<div class="settings-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->setting_key], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model'      => $model,
        'attributes' => [
            'setting_key',
            'setting_value:ntext',
            'date',
        ],
    ]) ?>

</div>
