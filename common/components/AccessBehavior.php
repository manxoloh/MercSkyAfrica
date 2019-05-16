<?php

namespace common\components;

use Yii;
use yii\base\Behavior;
use yii\console\Controller;
use yii\helpers\Url;
/**
 * Redirects all users to login page if not logged in
 *
 * Class AccessBehavior
 * @package app\components
 * @author  Artem Voitko <r3verser@gmail.com>
 */
class AccessBehavior extends Behavior
{
    /**
     * Subscribe for events
     * @return array
     */
    public function events()
    {
        return [
            Controller::EVENT_BEFORE_ACTION => 'beforeAction'
        ];
    }
    /**
     * On event callback
     */
    public function beforeAction($event)
    {
        if (Yii::$app->getUser()->isGuest &&
            Yii::$app->getRequest()->url !== Url::to(\Yii::$app->getUser()->loginUrl) &&
            Yii::$app->getRequest()->url !== Url::to(['site/signup']) &&
            Yii::$app->getRequest()->url !== Url::to(['site/about']) &&
            Yii::$app->getRequest()->url !== Url::to(['site/contact']) &&
            Yii::$app->getRequest()->url !== Url::to(['site/request-password-reset']) &&
            Url::to([$event->sender->requestedRoute]) !== Url::to(['site/reset-password'])
            ) {
                Yii::$app->getResponse()->redirect(\Yii::$app->getUser()->loginUrl);
            }
    }
}