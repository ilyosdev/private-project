<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Settings */

    $this->title = Yii::t('app', 'Update Settings: {name}', [
        'name' => $model->setting_key,
    ]);
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Settings'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->setting_key, 'url' => ['view', 'id' => $model->setting_key]];
    $this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="settings-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
