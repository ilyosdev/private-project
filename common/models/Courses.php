<?php

    namespace common\models;

    use Yii;
    use yii\behaviors\TimestampBehavior;
    use yii\db\Expression;
    use yii\helpers\FileHelper;

    /**
     * This is the model class for table "courses".
     *
     * @property int $id
     * @property string $title
     * @property string $slug
     * @property string $description
     * @property int $duration
     * @property string $img_url
     * @property int $status 0 - not active, 1 active
     * @property int $created_at
     * @property int $updated_at
     */
    class Courses extends \yii\db\ActiveRecord
    {
        public $image;

        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'courses';
        }

        public function behaviors()
        {
            return [
                [
                    'class' => TimestampBehavior::className(),
                    'createdAtAttribute' => 'created_at',
                    'updatedAtAttribute' => 'updated_at',
                ],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['title', 'description', 'slug', 'duration', 'img_url'], 'required'],
                [['duration', 'status', 'created_at', 'updated_at'], 'integer'],
                [['title', 'img_url'], 'string'],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id'          => 'ID',
                'title'       => 'Title',
                'slug'        => 'Slug',
                'description' => 'Description',
                'duration'    => 'Duration',
                'img_url'     => 'Img Url',
                'status'      => '0 - not active, 1 active',
                'created_at'  => 'Created At',
                'updated_at'  => 'Updated At',
            ];
        }

        public function save($runValidation = false, $attributeNames = null)
        {

            $imagePath = 'uploads/images/' . $this->image->basename . '.' . $this->image->extension;
            $isInsert = $this->isNewRecord;
            if ($isInsert) {
                $this->img_url = $imagePath;
            }
            $saved = parent::save($runValidation, $attributeNames);
            if (!$saved) {
                return false;
            }
            if ($isInsert) {
                $imgPath = Yii::getAlias('@frontend/web/' . $imagePath);
                if (!is_dir(dirname($imgPath))) {
                    FileHelper::createDirectory(dirname($imgPath));
                }
                $this->image->saveAs($imgPath);
            }
            return true;
        }
    }
