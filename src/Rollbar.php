<?php
namespace gelige\yii\rollbar;

use Rollbar\Rollbar as BaseRollbar;
use yii\base\Component;

class Rollbar extends Component
{
    public $accessToken;
    public $environment = 'development';

    public function init() {
        BaseRollbar::init([
            'access_token' => $this->accessToken,
            'environment' => $this->environment,
        ], false, false, false);
    }

    /**
     * Logs a message
     * @param RollbarMessage $message
     * @internal param array $extra
     */
    public function log(RollbarMessage $message) {
        BaseRollbar::log($message->level, $message->text, $message->extra);
    }
}
