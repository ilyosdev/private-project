<?php

    namespace backend\assets;

    use yii\web\AssetBundle;
    use yii\web\View;

    class AppAsset extends AssetBundle
    {

        public function init()
        {
            $this->jsOptions['position'] = View::POS_BEGIN;
            parent::init();
        }

        public $basePath = '@webroot';
        public $baseUrl = '@web';
        public $css = [
            'resources/font-awesome/css/all.min.css',
            'resources/vendors/dataTable/datatables.min.css',
            'resources/assets/css/app.min.css',
            'css/site.css',
            'css/tree_list.css',
        ];

        public $js = [
            'resources/assets/js/bundle.js',
            'https://apexcharts.com/samples/assets/irregular-data-series.js',
            'resources/vendors/charts/apex/apexcharts.min.js',
            'resources/vendors/dataTable/datatables.min.js',
            'resources/assets/js/examples/dashboard.js',
            'resources/assets/js/app.min.js',
            'js/tree.js',
            'js/custom.js',
        ];

        public $depends = [
            'yii\web\YiiAsset',
            //'yii\bootstrap\BootstrapPluginAsset',
            'yii\bootstrap4\BootstrapPluginAsset',
        ];
    }
