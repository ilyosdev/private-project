<?php

    namespace backend\custom;

    use Yii;

    /**
     * Multilingual trait.
     * Modify ActiveRecord query for multilingual support
     */
    trait MultilingualTrait
    {
        /**
         * @var string the name of the lang field of the translation table. Default to 'language'.
         */
        public $languageField = 'language';

        /**
         * Scope for querying by languages
         * @param string $emptyColumn
         * @param $language
         * @param bool $abridge
         * @return $this
         */
        public function localized($emptyColumn = "", $language = null, $abridge = true)
        {
            if (!$language)
                $language = Yii::$app->language;

            if (!isset($this->with['translations'])) {

                $this->joinWith(['translation' => function ($query) use ($language, $abridge, $emptyColumn) {
                    $query->where([$this->languageField => $abridge ? substr($language, 0, 2) : $language]);

                    if (!empty($emptyColumn)) {
                        $query->andWhere(["<>", $emptyColumn, ""]);
                    }
                }]);
            }

            return $this;
        }

        /**
         * Scope for querying by all languages
         * @return $this
         */
        public function multilingual()
        {
            if (isset($this->with['translation'])) {
                unset($this->with['translation']);
            }
            $this->with('translations');
            return $this;
        }

        /**
         * @return \yii\db\ActiveQuery
         */
        abstract public function with();
    }
