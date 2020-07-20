<?php


    namespace common\components;


    class TreeComponent
    {

        public static function build($array, $pidKey, $idKey)
        {
            if (is_array($array)) {
                return self::buildTree($array, $pidKey, $idKey);
            } else {
                return [];
            }
        }

        private static function buildTree($array, $pidKey, $idKey)
        {
            $grouped = [];

            foreach ($array as $sub) {
                $grouped[$sub[$pidKey]][] = $sub;
            }

            $fnBuilder = function ($siblings) use (&$fnBuilder, $grouped, $idKey) {
                if (is_array($siblings)) {
                    foreach ($siblings as $k => $sibling) {
                        $id = $sibling[$idKey];
                        if (isset($grouped[$id])) {
                            $sibling['nodes'] = $fnBuilder($grouped[$id]);
                        }
                        $siblings[$k] = $sibling;
                    }

                    return $siblings;
                } else {
                    return [];
                }
            };

            return $fnBuilder($grouped[0]);
        }

        public static function getCategoryNotes($array)
        {
            $pidKey = "parent_id";

            $grouped = [];

            foreach ($array as $sub) {
                $grouped[$sub[$pidKey]][] = $sub;
            }

            return $grouped;
        }


        public static function toList($array)
        {
            return self::buildToList($array);
        }

        private static function buildToList($array)
        {
            $html = '';

            foreach ($array as $item) {
                $html = $html . '<li>';
                $html = $html . $item['name'];

                if (!empty($item['nodes'])) {
                    $html .= '<ul>';
                    $html .= self::buildToList($item['nodes']);
                    $html .= '</ul>';
                }

                $html = $html . '</li>';
            }

            return $html;
        }

    }