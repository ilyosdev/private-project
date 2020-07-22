<?php

    namespace common\models;

    use backend\custom\MultilingualQuery;
    use frontend\components\ImageThumb;
    use omgdef\multilingual\MultilingualBehavior;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\Url;

    /**
     * This is the model class for table "freelancers".
     *
     * @property int $id
     * @property int $experience
     * @property string $img
     * @property int $order_by
     * @property int $status
     * @property int $is_online
     */
    class Freelancers extends ActiveRecord
    {
        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'freelancers';
        }

        public static function getList()
        {
            return self::find()
                ->orderBy(['order_by' => SORT_ASC])
                ->localized("full_name")
                ->all();
        }

        public static function find()
        {
            return new MultilingualQuery(get_called_class());
        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['experience', 'order_by', 'status', 'is_online'], 'integer'],
                [['experience', 'order_by', 'status', 'is_online'], 'default', 'value' => 0],
                [["full_name", "body", "content", "education", "office"], 'safe'],
                [['img'], 'string', 'max' => 255],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id'         => Yii::t('app', 'ID'),
                'experience' => Yii::t('app', 'Experience'),
                'img'        => Yii::t('app', 'Img'),
                'order_by'   => Yii::t('app', 'Order By'),
                'status'     => Yii::t('app', 'Status'),
                'is_online'  => Yii::t('app', 'Is Online'),
            ];
        }

        public function behaviors()
        {
            return [
                'ml' => [
                    'class'               => MultilingualBehavior::class,
                    'languages'           => [
                        'uz' => 'UZ',
                        'ru' => 'RU',
                        'en' => 'EN',
                        'oz' => 'OZ',
                    ],
                    'requireTranslations' => false,
                    'defaultLanguage'     => 'uz',
                    'langForeignKey'      => 'freelancer_id',
                    'tableName'           => "{{%freelancers_localization}}",
                    'attributes'          => [
                        "full_name", "body", "content", "education", "office"
                    ]
                ],
            ];
        }

        public static function getById($id)
        {
            return self::find()->where(['id' => $id])->one();
        }

        public function getAvatar()
        {
            return $this->img;
        }

        public function getOnline()
        {
            if ($this->is_online == 1) {
                return "is-online";
            } else {
                return "";
            }
        }

        public function getName()
        {
            return $this->full_name;
        }

        public function getJobs()
        {
            return $this->education . ', ' . $this->office . ', ' . Yii::t("app", "{experience} йиллик тажриба", ['experience' => $this->experience]);
        }

        public function getImage()
        {
            return ImageThumb::default($this->img, 0, 0, false, 'expert');
        }

        public function getUrl()
        {
            return Url::to(["/freelancers/view", "id" => $this->id]);
        }
    }
