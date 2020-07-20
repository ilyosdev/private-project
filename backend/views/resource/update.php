<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Resources */

    $this->title = Yii::t('app', 'Update Resources: {name}', [
        'name' => $model->id,
    ]);
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resources'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="resources-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
