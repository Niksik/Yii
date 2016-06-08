<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "issuedbooks".
 *
 * @property integer $issueId
 * @property integer $bookId
 * @property string $issuedTo
 * @property string $username
 * @property string $dateIssued
 * @property string $dateToReturn
 * @property integer $idNumber
 *
 * @property Books $book
 * @property Users $username0
 */
class Issuedbooks extends \yii\db\ActiveRecord
{
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'issuedbooks';
    }
  
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bookId','username', 'dateIssued', 'dateToReturn', 'idNumber', 'status'], 'required'],
            [['bookId', 'idNumber'], 'integer'],
            [['dateIssued', 'dateToReturn'], 'safe'],
            [['username'], 'string', 'max' => 20],
            [['bookId'], 'exist', 'skipOnError' => true, 'targetClass' => Books::className(), 'targetAttribute' => ['bookId' => 'bookId']],
            [['username'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['username' => 'username']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'issueId' => 'Issue ID',
            'bookId' => 'Book ID',
            'username' => 'Username',
            'dateIssued' => 'Date Issued',
            'dateToReturn' => 'Date To Return',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Books::className(), ['bookId' => 'bookId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsername()
    {
        return $this->hasOne(Users::className(), ['username' => 'username']);
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
	public function getStudent()
    {
        return $this->hasOne(Students::className(), ['idNumber' => 'idNumber']);
    }

    /**
     * @inheritdoc
     * @return IssuedbooksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new IssuedbooksQuery(get_called_class());
    }
}
