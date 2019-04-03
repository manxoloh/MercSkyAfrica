<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'theme/css/fonts.css?family=Montserrat:400,700,200',
        'theme/css/font-awesome.min.css',
        'theme/css/bootstrap.min.css',
        'theme/css/light-bootstrap-dashboard.css?v=2.0.1',
        'theme/css/demo.css',
        'theme/css/custom.css',
        'theme/css/clock.css',
    ];
    public $js = [
        //'theme/js/core/jquery.3.2.1.min.js',
        'theme/js/core/popper.min.js',
        'theme/js/core/bootstrap.min.js',
        //'theme/js/plugins/bootstrap-switch.js',
        //'theme/js/plugins/bootstrap-table.js',
        'theme/js/plugins/jquery.dataTables.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.flash.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js',
        'https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js',
        'theme/js/light-bootstrap-dashboard.js?v=2.0.1',
        //'theme/js/demo.js',
        'theme/js/custom.js',
        'theme/js/clock.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
