<?php

    namespace backend\components;

    use Yii;
    use yii\grid\DataColumn;
    use yii\helpers\Html;

    class LocalizationColumn extends DataColumn
    {

        const STATUS_ACTIVE = 1;
        const STATUS_INACTIVE = -1;
        const STATUS_PUBLISHED = 0;

        const LANGUAGES = [
            "uz" => 'Ўзбекча',
            "oz" => 'O`zbekcha',
            "ru" => 'Русский',
            "en" => 'English',
            "zh" => '中文',
            "ar" => 'عربي',
            "es" => "Español",
            "fr" => "Français",
            "de" => "Deutsch"
        ];


        public $header;
        public $url;

        protected function renderDataCellContent($model, $key, $index)
        {

            $result = "";
            foreach (self::LANGUAGES as $key => $name) {

                $class = 'btn-outline-dark';
                $title = Yii::t('app', 'Таржима қилинмаган');

                foreach ($model->translations as $translation) {
                    if ($translation->language == $key) {
                        if ($translation->status == self::STATUS_ACTIVE) {
                            $class = 'btn-primary';
                            $title = Yii::t('app', 'Чоп этилган');
                        }

                        if ($translation->status == self::STATUS_INACTIVE) {
                            $class = 'btn-outline-danger';
                            $title = Yii::t('app', 'Қоралама');
                        }

                        if ($translation->status == self::STATUS_PUBLISHED) {
                            $class = 'btn-outline-warning';
                            $title = Yii::t('app', 'Чоп қилишга таёр');
                        }

                        break;
                    }
                }

                $title = $title . ' (' . $name . ')';

                $result .= Html::a($key, [$this->url, 'folder_id' => $model->folder_id, 'id' => $model->id, 'lang' => $key,], [
                    'class' => "btn {$class} btn-sm",
                    'title' => $title
                ]);
            }
            return $result;

        }

    }