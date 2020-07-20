<?php

    use yii\helpers\Html;

    /* @var $this yii\web\View */
    /* @var $model common\models\User */

    $this->title = Yii::t('app', 'Create User');
    $this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Users'), 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
?>
<div class="cm-form">
    <div class="cm-form-header"><?= Html::encode($this->title) ?></div>
    <div class="cm-form-body">
        <div class="user-create">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
    </div>
</div>