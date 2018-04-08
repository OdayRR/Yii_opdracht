<?php

namespace app\components;
class changelanguage extends \yii\base\Behavior{
    
    public function events() {
        return[
        \yii\web\Application::EVENT_BEFORE_REQUEST =>'changelanguage',
        ];
    }
    
    public function changelanguage(){
        if(\Yii::$app->getRequest()->getCookies()->has('lang')){
            \Yii::$app->language = \Yii::$app->getRequest()->getCookies()->getValue('lang');
        }
    }
}


