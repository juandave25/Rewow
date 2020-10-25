<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "owner".
 *
 * @property string $Id
 * @property string $First_Name
 * @property string $Last_Name
 * @property int $Enabled
 *
 * @property MedicalRecord[] $medicalRecords
 */
class Owner extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'owner';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'First_Name', 'Last_Name', 'Enabled'], 'required'],
            [['Enabled'], 'integer'],
            [['Id'], 'string', 'max' => 25],
            [['First_Name', 'Last_Name'], 'string', 'max' => 50],
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
            'First_Name' => 'First Name',
            'Last_Name' => 'Last Name',
            'Enabled' => 'Enabled',
        ];
    }

    /**
     * Gets query for [[MedicalRecords]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMedicalRecords()
    {
        return $this->hasMany(MedicalRecord::className(), ['Id_Owner' => 'Id']);
    }
}
