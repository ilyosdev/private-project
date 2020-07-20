<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\Pages */

    $this->title = Yii::t('app', 'Create Pages');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Pages'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="pages-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>