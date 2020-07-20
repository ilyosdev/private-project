<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\News */

    $this->title = Yii::t('app', 'Update News: {name}', [
        'name' => $model->title,
    ]);
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'News'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
    $this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="news-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>
