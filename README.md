Rollbar for Yii2 (simple)
=========================
[![Dependency Status](https://www.versioneye.com/user/projects/5a8547320fb24f3ace5c54f6/badge.svg?style=flat)](https://www.versioneye.com/user/projects/5a8547320fb24f3ace5c54f6)
[![Packagist](https://img.shields.io/badge/license-BSD--3--Clause-blue.svg)](https://github.com/gelige/yii2-rollbar-simple/blob/master/README.md)

Simple [Rollbar](http://rollbar.com/) logger your Yii2 application.


Installation
------------

Through [composer](http://getcomposer.org/download/): 

 To install, either run
 ```
 $ php composer.phar require gelige/yii2-rollbar-simple:1.0.*
 ```
 or add
 ```
 "gelige/yii2-rollbar-simple": "1.0.*"
 ```
 to the `require` section of your `composer.json` file.


Usage
-----
1. Add the component configuration in your *global* `main.php` config file:
 ```php
 'components' => [
     'rollbar' => [
         'class' => 'gelige\yii\rollbar\Rollbar',
         'accessToken' => 'POST_SERVER_ITEM_ACCESS_TOKEN',
     ],
 ],
 ```
 
2. Add a new log target in your *global* `main.php` config file:
 ```php
 'components' => [
     'log' => [
         'targets' => [
             'class' => 'gelige\yii\rollbar\RollbarTarget',
             // 'except' => ['yii\web\HttpException:404'],
             // 'levels' => YII_DEBUG ? ['error', 'warning'] : ['error'],
         ],
     ],
 ],
 ```

