<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "courses".
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property int $duration
 * @property string $img_url
 * @property int $status 0 - not active, 1 active
 * @property int $created_at
 * @property int $updated_at
 */
class Courses extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'courses';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'description', 'duration', 'img_url', 'created_at', 'updated_at'], 'required'],
            [['duration', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'description', 'img_url'], 'string', 'max' => 255],
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
            'description' => 'Description',
            'duration' => 'Duration',
            'img_url' => 'Img Url',
            'status' => '0 - not active, 1 active',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
