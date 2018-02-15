<?php
namespace gelige\yii\rollbar;

use Rollbar\Payload\Level;
use yii\log\Logger;

class RollbarMessage
{
    public $text;
    public $level;
    public $extra;

    public function __construct($text, $yiiLoggerLevel, $extra = []) {
        $this->text = $text;
        $this->level = $this->level($yiiLoggerLevel);
        $this->extra = $extra;
    }

    /**
     * @param $logMessageLevel int Yii2 log message level
     * @return string Rollbar log level
     */
    protected function level($logMessageLevel) {
        switch ($logMessageLevel) {
            case Logger::LEVEL_INFO:
                return Level::INFO;
            case Logger::LEVEL_WARNING:
                return Level::WARNING;
            case Logger::LEVEL_ERROR:
                return Level::ERROR;
            case Logger::LEVEL_TRACE:
                return Level::DEBUG;
            default:
                return Level::NOTICE;
        }
    }
}
