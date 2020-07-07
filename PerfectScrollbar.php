<?php

namespace mhunesi\scrollbar;

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Json;

/**
 * This is just an example.
 */
class PerfectScrollbar extends \yii\base\Widget
{
    /**
     * @var int
     */
    public $height = '250px';

    /**
     * @var int
     */
    public $width = '250px';

    /**
     * @var array the HTML attributes for the widget container tag. The following special options are recognized:
     *
     * - `tag`: string, the tag name for the container. Defaults to `div`
     *   This option is available since version 2.0.7.
     *   See also [[\yii\helpers\Html::tag()]].
     *
     * @see \yii\helpers\Html::renderTagAttributes() for details on how attributes are being rendered.
     */
    public $options = [];

    /**
     * @var array the options for the underlying Select2 JS plugin.
     *            Please refer to the plugin Web page for possible options.
     *
     * @see https://github.com/mdbootstrap/perfect-scrollbar#options
     */
    public $clientOptions = [];

    public function init()
    {
        parent::init();
        ob_start();

        $style = array_merge([
            'position' => 'relative',
            'overflow' => 'auto',
            'width' => $this->width,
            'height' => $this->height,
        ],ArrayHelper::getValue($this->options,'style',[]));

        $this->options = array_merge($this->options,[
            'id' => $this->id,
            'style' => $style
        ]);

        $tag = ArrayHelper::remove($this->options, 'tag', 'div');
        echo Html::beginTag($tag, $this->options);

    }

    public function run()
    {
        echo Html::endTag(ArrayHelper::remove($this->options, 'tag', 'div'));

        $content = ob_get_clean();

        $this->registerClientScript();

        return $content;
    }

    public function registerClientScript()
    {
        PerfectScrollbarAsset::register($this->view);

        $id = $this->options['id'];

        $jsonConfig = Json::encode($this->clientOptions);

        $js = "var ps_{$id} = new PerfectScrollbar('#{$id}', $jsonConfig);";

        $this->view->registerJs($js);
    }
}
