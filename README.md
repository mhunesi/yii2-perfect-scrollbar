Yii2 Perfect Scrollbar
======================
Yii2 Perfect Scrollbar Extension

Installation
------------

The preferred way to install this extension is through [composer](http://getcomposer.org/download/).

Either run

```
composer require mhunesi/yii2-perfect-scrollbar "*"
```

or add

```
"mhunesi/yii2-perfect-scrollbar": "*"
```

to the require section of your `composer.json` file.


Usage
-----

Once the extension is installed, simply use it in your code by  :

```php
<?php \mhunesi\scrollbar\PerfectScrollbar::begin([
        'width' => '200px',
        'height' => '200px',
        'options' => [
            'class' => 'p-2 mb-5',
        ],
        'clientOptions' => [
            'wheelPropagation' => true
        ]
]) ?>

    <p> HTML Content </p>

<?php \mhunesi\scrollbar\PerfectScrollbar::end() ?>

```
