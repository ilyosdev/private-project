<?php

namespace common\models;

use common\models\query\PaymentQuery;
use Yii;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\helpers\FileHelper;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property string $img
 * @property int $created_by
 * @property int|null $status 0 - waiting, 1 active, 2  rejected
 * @property int|null    $created_at
 * @property int|null    $updated_at
 *
 * @property User $user
 */
class Payment extends \yii\db\ActiveRecord
{
    const STATUS_WAITING = 0;
    const STATUS_ACTIVE = 1;
    const STATUS_REJECTED = 2;

    public $image;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     * @return PaymentQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PaymentQuery(get_called_class());
    }

    public function behaviors()
    {
        return [
            TimestampBehavior::class,
            [
                'class' => BlameableBehavior::class,
                'updatedByAttribute' => false
            ]
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['img'], 'required'],
            [['created_by', 'status', 'created_at', 'updated_at'], 'integer'],
            [['image'], 'image', 'minWidth' => 1280],
            [['created_by'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'img' => 'Image',
            'created_by' => 'User ID',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'check' => 'Chek'
        ];
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery|\common\models\query\UserQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getStatusLabel()
    {
        return [
            self::STATUS_WAITING => 'Tekshirilmoqda',
            self::STATUS_ACTIVE => 'Faollashtirildi',
            self::STATUS_REJECTED => 'Rad etildi',
        ];
    }

//    public function upload()
//    {
//        if ($this->validate()) {
//            $this->img->saveAs('uploads/'.self::getUser()->id.'/' .time(). '.' . $this->imageFile->extension);
//            return true;
//        } else {
//            return false;
//        }
//    }

    public function save($runValidation = false, $attributeNames = null)
    {
        $userID = Yii::$app->user->identity->id;
        $imagePath = 'uploads/' . $userID . '/' . time() . '.jpg';
        $isInsert = $this->isNewRecord;
        if ($isInsert) {
            $this->img = $imagePath;
        }
        $saved = parent::save($runValidation, $attributeNames);
        if (!$saved) {
            return false;
        }
        if ($isInsert) {
            $imgPath = Yii::getAlias('@frontend/web/'.$imagePath);
            if (!is_dir(dirname($imgPath))) {
                FileHelper::createDirectory(dirname($imgPath));
            }
            $this->image->saveAs($imgPath);
        }
        return true;
    }

    public function getCheckLink()
    {
//        echo '<pre>';
//        var_dump(Yii::$app->params['site_url'] . $this->img);
//        echo '</pre>';

        return Yii::$app->params['site_url'] . $this->img;
    }

}
