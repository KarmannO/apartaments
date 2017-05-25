<?php
/**
 * Created by PhpStorm.
 * User: zenbu
 * Date: 25.05.2017
 * Time: 12:29
 */

namespace app\controllers;


use yii\filters\Cors;
use yii\helpers\ArrayHelper;
use yii\rest\ActiveController;

class TypeController extends ActiveController
{
    public $modelClass = 'app\models\Type';

    public function behaviors()
    {
        return
            \yii\helpers\ArrayHelper::merge(parent::behaviors(), [
                'corsFilter' => [
                    'class' => \yii\filters\Cors::className(),
                ],
            ]);
    }
}