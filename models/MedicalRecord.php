<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "medical_record".
 *
 * @property int $Id
 * @property string $Id_Owner
 * @property int $Id_Pet
 * @property string $Description
 * @property int $Enabled
 *
 * @property Owner $owner
 * @property Pet $pet
 */
class MedicalRecord extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'medical_record';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Id', 'Id_Owner', 'Id_Pet', 'Description', 'Enabled'], 'required'],
            [['Id', 'Id_Pet', 'Enabled'], 'integer'],
            [['Id_Owner'], 'string', 'max' => 25],
            [['Description'], 'string', 'max' => 100],
            [['Id'], 'unique'],
            [['Id_Owner'], 'exist', 'skipOnError' => true, 'targetClass' => Owner::className(), 'targetAttribute' => ['Id_Owner' => 'Id']],
            [['Id_Pet'], 'exist', 'skipOnError' => true, 'targetClass' => Pet::className(), 'targetAttribute' => ['Id_Pet' => 'Id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'Id_Owner' => 'Owner',
            'Id_Pet' => 'Pet',
            'Description' => 'Description',
        ];
    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Owner::className(), ['Id' => 'Id_Owner']);
    }

    /**
     * Gets query for [[Pet]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPet()
    {
        return $this->hasOne(Pet::className(), ['Id' => 'Id_Pet']);
    }
}
