<?php

    namespace backend\widgets;

    use common\components\TreeComponent;
    use common\models\Folders;
    use yii\base\Widget;
    use yii\helpers\Html;

    class FoldersWidget extends Widget
    {
        public $id;
        private $model;

        public function run()
        {
            $model = TreeComponent::build(Folders::getAllList(), "parent_id", "id");

            $this->model = $model;

            $model = self::buildToList($model, true);

            return $this->render('test', ['model' => $model]);

            return $this->render("folders", ["model" => $model]);
        }


        private function buildToList($array, $is_root = false)
        {
            $html = '<ul>';

            if ($is_root) {
                $array = $array[0]['nodes'];
            }

            foreach ($array as $item) {
                $html = $html . '<li>';
                $html .= Html::a($item['name'], ['/documents', 'folder_id' => $item['id']]);

                if (!empty($item['nodes'])) {
                    $html .= self::buildToList($item['nodes']);
                }

                $html = $html . '</li>';
            }

            $html .= '</ul>';

            return $html;
        }

        private function checked($item)
        {
            if (in_array($this->id, $item)) {
                return "checked";
            } else {
                return "";
            }
        }

    }