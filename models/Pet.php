<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pet".
 *
 * @property int $Id
 * @property string $Name
 * @property int $Type_Id
 * @property int $Size_Id
 *
 * @property MedicalRecord[] $medicalRecords
 * @property Size $size
 * @property Type $type
 */
class Pet extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pet';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Name', 'Type_Id', 'Size_Id'], 'required'],
            [['Id', 'Type_Id', 'Size_Id'], 'integer'],
            [['Name'], 'string', 'max' => 20],
            [['Id'], 'unique'],
            [['Size_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::className(), 'targetAttribute' => ['Size_Id' => 'Id']],
            [['Type_Id'], 'exist', 'skipOnError' => true, 'targetClass' => Type::className(), 'targetAttribute' => ['Type_Id' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Type_Id' => 'Type ID',
            'Size_Id' => 'Size ID',
        ];
    }

    /**
     * Gets query for [[MedicalRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['Id_Pet' => 'Id']);
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::className(), ['Id' => 'Size_Id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(Type::className(), ['Id' => 'Type_Id']);
    }
}
