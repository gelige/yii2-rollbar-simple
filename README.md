Rollbar for Yii2 (simple)
=========================

Simple error handler for [Rollbar](http://rollbar.com/) service for your Yii2 application.


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
 'bootstrap' => ['rollbar'],
 'components' => [
     'rollbar' => [
         'class' => 'gelige\yii2\rollbar\Rollbar',
         'accessToken' => 'POST_SERVER_ITEM_ACCESS_TOKEN',
         
         // You can specify exceptions to be ignored by yii2-rollbar-simple:
         // 'ignoreExceptions' => [
         //         ['yii\web\HttpException', 'statusCode' => [400, 404]],
         //         ['yii\web\HttpException', 'statusCode' => [403], 'message' => ['This action is forbidden']],
         // ],
     ],
 ],
 ```
 
2. Add the *web* error handler configuration in your *web* config file:
 ```php
 'components' => [
     'errorHandler' => [
         'class' => 'gelige\yii2\rollbar\web\ErrorHandler',
     ],
 ],
 ```

