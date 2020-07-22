<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\UzLatRules */

    $this->title = Yii::t('app', 'Create Uz Lat Rules');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'UzLatRules'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="uz-lat-rules-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>