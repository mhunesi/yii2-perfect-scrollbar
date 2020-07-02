<?php
namespace mhunesi\scrollbar;

class PerfectScrollbarAsset extends \yii\web\AssetBundle
{
    public $sourcePath = '@npm/perfect-scrollbar';

    public $css = [
        'css/perfect-scrollbar.css',
    ];

    public $js = [
        'dist/perfect-scrollbar.min.js',
    ];

    public $jsOptions = array(
        'position' => \yii\web\View::POS_HEAD
    );
}
