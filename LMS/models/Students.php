<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "students".
 *
 * @property integer $idNumber
 * @property string $fullName
 * @property string $email
 * @property string $phoneNumber
 *
 * @property Issuedbooks[] $issuedbooks
 */
class Students extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'students';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNumber', 'fullName', 'email', 'phoneNumber'], 'required'],
            [['idNumber'], 'integer'],
            [['fullName'], 'string', 'max' => 120],
            [['email'], 'string', 'max' => 255],
            [['email'], 'email'],
            [['phoneNumber'], 'string', 'max' => 40],
            [['phoneNumber'], 'match','pattern'=>'^\s*(?:\+?(\d{1,3}))?[-. (]*(\d{3})[-. )]*(\d{3})[-. ]*(\d{4})(?: *x(\d+))?\s*$^'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNumber' => 'Id Number',
            'fullName' => 'Full Name',
            'email' => 'Email',
            'phoneNumber' => 'Phone Number',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedbooks()
    {
        return $this->hasMany(Issuedbooks::className(), ['idNumber' => 'idNumber']);
    }

    /**
     * @inheritdoc
     * @return StudentsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StudentsQuery(get_called_class());
    }
}
