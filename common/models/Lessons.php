<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "lessons".
 *
 * @property int $id
 * @property string $title
 * @property int $status 1 - free, 0 -not free
 * @property int $created_at
 * @property int $updated_at
 */
class Lessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'status' => '1 - free, 0 -not free',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
