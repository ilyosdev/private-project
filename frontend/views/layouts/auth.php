<?php

/* @var $this \yii\web\View */

/* @var $content string */

use common\widgets\Alert;

$this->beginContent('@frontend/views/layouts/base.php');
?>
    <style>
        form{width:60%;margin:60px auto;background:#efefef;padding:60px 120px 80px;text-align:center;-webkit-box-shadow:2px 2px 3px rgba(0,0,0,0.1);box-shadow:2px 2px 3px rgba(0,0,0,0.1)}label{display:block;position:relative;margin:40px 0}.label-txt{position:absolute;top:-1.6em;padding:10px;font-family:sans-serif;font-size:.8em;letter-spacing:1px;color:#787878;transition:ease .3s}.input{width:100%;padding:10px;background:transparent;border:none;outline:none}.line-box{position:relative;width:100%;height:2px;background:#BCBCBC}.line{position:absolute;width:0;height:2px;top:0;left:50%;transform:translateX(-50%);background:#8BC34A;transition:ease .6s}.input:focus + .line-box .line{width:100%}.label-active{top:-3em}form button{display:inline-block;padding:12px 24px;background:#dcdcdc;font-weight:700;color:#787878;border:none;outline:none;border-radius:3px;cursor:pointer;transition:ease .3s}form button:hover{background:#8BC34A;color:#fff}
    </style>
    <main>
            <?= Alert::widget() ?>
            <?= $content ?>
    </main>
<?php $this->endContent() ?>