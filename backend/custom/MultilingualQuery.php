<?php

    namespace backend\custom;


    use yii\db\ActiveQuery;

    class MultilingualQuery extends ActiveQuery
    {

        use MultilingualTrait;
    }