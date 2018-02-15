<?php
namespace gelige\yii\rollbar;

use yii\helpers\ArrayHelper;
use yii\log\Target;

class RollbarTarget extends Target
{
    /**
     * Defaults to [] to avoid unnecessary duplicates with Rollbar default parameters
     * @var array
     */
    public $logVars = [];

    /**
     * @inheritdoc
     */
    public function export() {
        foreach ($this->messages as $message) {
            list($text, $yiiLoggerLevel, $category, $timestamp) = $message;
            $rollbarMessage = new RollbarMessage($text, $yiiLoggerLevel, $this->context());
            $this->rollbar()->log($rollbarMessage);
        }
    }

    /**
     * Returns array of global variables filtered by [[logVars]] option
     * @return array
     */
    protected function context() {
        return ArrayHelper::filter($GLOBALS, $this->logVars);
    }

    /**
     * Overrides default getContextMessage method to avoid creating separate log message with context variables
     * @return string
     */
    protected function getContextMessage() {
        return '';
    }

    /**
     * Returns Rollbar component
     * @return Rollbar
     */
    protected function rollbar() {
        return \Yii::$app->rollbar;
    }
}
