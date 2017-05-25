<?php
/**
 * Created by PhpStorm.
 * User: zenbu
 * Date: 25.05.2017
 * Time: 12:25
 */

namespace app\models;
use Yii;
use yii\db\ActiveRecord;

class Type extends ActiveRecord
{
    public static function tableName()
    {
        return 'types';
    }

    public function rules()
    {
        return [
            [['description'], 'required'],
            [['description'], 'string', 'max' => 255]
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Описание'
        ];
    }
}