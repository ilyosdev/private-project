<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Resources */

    $this->title = Yii::t('app', 'Create Resources');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Resources'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
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