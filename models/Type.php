<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type".
 *
 * @property int $Id
 * @property string $Description
 * @property int $Enabled
 *
 * @property Pet[] $pets
 */
class Type extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'type';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Description', 'Enabled'], 'required'],
            [['Id', 'Enabled'], 'integer'],
            [['Description'], 'string', 'max' => 45],
            [['Id'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Description' => 'Description',
            'Enabled' => 'Enabled',
        ];
    }

    /**
     * Gets query for [[Pets]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPets()
    {
        return $this->hasMany(Pet::className(), ['Type_Id' => 'Id']);
    }
}
