<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sub_lessons".
 *
 * @property int $id
 * @property int $lesson_id
 * @property string $title
 * @property int $duration
 * @property string $file_url
 * @property string $file_type
 * @property int $status 1 -free, 0 - not free
 * @property int $created_at
 * @property int $updated_at
 */
class SubLessons extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sub_lessons';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['lesson_id', 'title', 'duration', 'file_url', 'file_type', 'created_at', 'updated_at'], 'required'],
            [['lesson_id', 'duration', 'status', 'created_at', 'updated_at'], 'integer'],
            [['title', 'file_url', 'file_type'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'lesson_id' => 'Lesson ID',
            'title' => 'Title',
            'duration' => 'Duration',
            'file_url' => 'File Url',
            'file_type' => 'File Type',
            'status' => '1 -free, 0 - not free',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
