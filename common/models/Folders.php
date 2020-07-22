<?php

    namespace common\models;

    use backend\custom\MultilingualQuery;
    use omgdef\multilingual\MultilingualBehavior;
    use Yii;
    use yii\db\ActiveRecord;
    use yii\helpers\Url;

    /**
     * This is the model class for table "folders".
     *
     * @property int $id
     * @property int|null $status
     * @property string|null $default_title
     * @property int|null $parent_id
     * @property int|null $order_by
     * @property string|null $folder_key
     * @property int|null $author_id
     * @property int|null $modifier_id
     * @property int|null $is_main
     * @property string|null $created_at
     * @property string|null $img
     * @property string|null $updated_at
     */
    class Folders extends ActiveRecord
    {

        public $name;
        public $matches;

        public static function getAllList()
        {
            return self::find()
                ->select(['id', 'default_title AS name', 'parent_id'])
                ->orderBy(['order_by' => SORT_ASC])
                ->asArray()
                ->all();
        }

        public static function find()
        {
            return new MultilingualQuery(get_called_class());
        }

        public static function getAllByCategoryId(int $category_id = 0, $is_main = 0)
        {
            $lang = Yii::$app->language;

            if($lang == 'en' && $is_main == 1){
                return self::find()
                    ->where(['parent_id' => 75])
                    ->orderBy(['order_by' => SORT_ASC])
                    ->localized()
                    ->all();
            }

            if (($lang == 'zh' || $lang == 'ar' || $lang == 'es' || $lang == 'fr' || $lang == 'de') && $category_id == 1) {

            }

            if ($is_main == 0) {
                return self::find()
                    ->where(['parent_id' => $category_id])
                    ->orderBy(['order_by' => SORT_ASC])
                    ->localized("title_value")
                    ->all();
            }

            return self::find()
                ->where(['parent_id' => $category_id, 'is_main' => $is_main])
                ->orderBy(['order_by' => SORT_ASC])
                ->localized("title_value")
                ->all();
        }

        public static function getById(int $folder_id, $multi = false)
        {

            if ($multi) {
                return Folders::find()->where(['id' => $folder_id])->multilingual()->one();
            }

            return Folders::find()->where(['id' => $folder_id])->one();
        }

        public static function getListById(array $array)
        {
            $array = array_keys($array);
            $lang = Yii::$app->language;

            return Folders::find()
                ->select([
                    "f.id",
                    "f.parent_id",
                    "l.title_value AS title",
                ])
                ->from(Folders::tableName() . ' f')
                ->innerJoin(FoldersLocalization::tableName() . ' l', "l.folder_id= f.id AND l.title_value !=''")
                ->where(['f.id' => $array, 'l.language' => $lang])
                ->orderBy(['f.order_by' => SORT_ASC])
                ->asArray()
                ->all();

        }

        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['title_value', 'annotation', 'is_main', 'img'], 'safe'],
                [['status', 'parent_id', 'order_by', 'author_id', 'modifier_id'], 'integer'],
                [['created_at', 'updated_at'], 'safe'],
                [['default_title'], 'string', 'max' => 500],
                [['folder_key'], 'string', 'max' => 50],
            ];
        }

        /**
         * {@inheritdoc}
         */
        public function attributeLabels()
        {
            return [
                'id'            => Yii::t('app', 'ID'),
                'status'        => Yii::t('app', 'Status'),
                'default_title' => Yii::t('app', 'Default Title'),
                'parent_id'     => Yii::t('app', 'Parent ID'),
                'order_by'      => Yii::t('app', 'Order By'),
                'folder_key'    => Yii::t('app', 'Folder Key'),
                'author_id'     => Yii::t('app', 'Author ID'),
                'modifier_id'   => Yii::t('app', 'Modifier ID'),
                'img'           => Yii::t('app', 'Img'),
                'is_main'       => Yii::t('app', 'Is Main'),
                'created_at'    => Yii::t('app', 'Created At'),
                'updated_at'    => Yii::t('app', 'Updated At'),
            ];
        }

        public function getLangs()
        {
            return $this->hasMany(FoldersLocalization::class, ['folder_id' => 'id']);
        }

        public function behaviors()
        {
            return [
                'ml' => [
                    'class'           => MultilingualBehavior::class,
                    'languages'       => [
                        'uz' => 'UZ',
                        'ru' => 'RU',
                        'en' => 'EN',
                        'oz' => 'OZ',
                        'zh' => 'ZH',
                        'ar' => 'AR',
                        'es' => 'ES',
                        'fr' => 'FR',
                        'de' => 'DE',
                    ],
                    'defaultLanguage' => 'uz',
                    'langForeignKey'  => 'folder_id',
                    'tableName'       => "{{%folders_localization}}",
                    'attributes'      => [
                        'title_value', 'annotation',
                    ]
                ],
            ];
        }


        public function getUrl()
        {
            return Url::to(['/documents/category', 'id' => $this->id]);
        }

        public function getTitle()
        {
            return $this->title_value;
        }

        public function getDocuments()
        {
            return $this->hasMany(Documents::class, ['folder_id' => 'id'])
                ->orderBy(['order_by' => SORT_ASC]);
        }

        public function getChild()
        {
            $lang = Yii::$app->language;
            return Folders::find()
                ->from(Folders::tableName() . ' f')
                ->leftJoin(FoldersLocalization::tableName() . ' l', "l.folder_id = f.id")
                ->where("f.parent_id = {$this->id} AND f.status = 1  AND l.language = '{$lang}'")
                ->orderBy(['f.order_by' => SORT_ASC])
                ->all();
        }

        /**
         * {@inheritdoc}
         */
        public static function tableName()
        {
            return 'folders';
        }

        public function getDocument()
        {
            $lang = Yii::$app->language;
            return Documents::find()
                ->from(Documents::tableName() . ' f')
                ->leftJoin(DocumentsLocalization::tableName() . ' l', 'l.doc_id = f.id AND l.status = 1')
                ->where(['f.folder_id' => $this->id, 'l.language' => $lang])
                ->orderBy(['f.order_by' => SORT_ASC])
                ->all();
        }

        public function getParent()
        {
            return $this->hasOne(Folders::class, ['id' => 'parent_id']);
        }
    }
