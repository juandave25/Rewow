<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $Id
 * @property string $Description
 * @property int $Enabled
 *
 * @property Pet[] $pets
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
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
        return $this->hasMany(Pet::className(), ['Size_Id' => 'Id']);
    }
}
