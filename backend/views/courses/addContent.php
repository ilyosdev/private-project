<?php

    use yii\helpers\Html;
    use yii\web\YiiAsset;

    /* @var $this yii\web\View */
    /* @var $model common\models\Courses */

    $this->title = $model->title;
    $this->params['breadcrumbs'][] = ['label' => 'Courses', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
    YiiAsset::register($this);

    $this->registerJsFile(
        '@web/js/courseContentHead.js'
    );
?>
    <div class="courses-body">

        <h1><?= Html::encode($this->title) ?></h1>

        <div class="content-wrapper">
            <div class="overlay-loading">Loading...</div>

            <div class="alert-box">
                <div class="alert-message"></div>
                <button onclick="AlertCancel()">OK</button>
            </div>

            <div class="confirm-box">
                <div class="confirm-message"></div>
                <div class="confirm-actions">
                    <button>YES</button>
                    <button>NO</button>
                </div>
            </div>


            <div class="prompt-box">
                <div class="prompt-message">
                    <label for='promptTxt'>Label:</label><br>
                    <input type="text" id="promptTxt">
                </div>
                <div class="prompt-actions">
                    <button>Cancel</button>
                    <button>OK</button>
                </div>
            </div>

            <div class="flex-grid-thirds">

                <!-- ===========================Single card item, to be rendered inside PHP loop with data-id being unique ID=========================== -->
                <div class="grid-col" data-id="1">
                    <div class="chapter-title">Chapter 1</div>

                    <div class="chapter-card">
                        <div class="chapter-controls">
                            <button class="btn-edit-chapter" onclick="EditChapterListener(event)">Edit chapter</button>
                            <button class="btn-delete-chapter" onclick="DeleteChapterListener(event)">Delete chapter</button>
                        </div>


                        <div class="chapter-contents">

                            <!-- following is to be rendered inside PHP loop -->
                            <!-- AGAIN, data-id is unique ID for each lesson item -->



                        </div>


                        <button class="btn-add-lesson" onclick="AddLessonListener(event)">+ Add lesson</button>

                    </div>
                </div>
                <!-- ===========================Single card item, to be rendered inside PHP loop with data-id being unique ID=========================== -->


                <div class="grid-col">
                    <div class="chapter-title"></div>
                    <div class="wrap-btn-add-chapter">
                        <button class="btn-add-chapter">+ Add chapter</button>
                    </div>
                </div>

            </div>
        </div>

    </div>
<?php


    $this->registerJsFile(
        '@web/js/courseContentFoot.js'
    );
?>