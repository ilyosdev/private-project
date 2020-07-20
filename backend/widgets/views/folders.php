<?php

    use yii\helpers\Url;

?>
<div class="sidebar">

    <div class="sidebar-sticky" style="height: 100%;">

        <div class="tree-list">
            <h3>
                Root
                <a href="<?= Url::to(['/admin/documents/add-folder']) ?>">
                    <span class="fas fa-plus"></span>
                </a>
            </h3>
            <?
                echo $model;
            ?>
        </div>

    </div>

</div>