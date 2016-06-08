<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books".
 *
 * @property integer $bookId
 * @property string $bookName
 * @property string $category
 * @property integer $quantity
 *
 * @property Category $category0
 * @property Issuedbooks[] $issuedbooks
 * @property Users[] $usernames
 * @property Returnedlog[] $returnedlogs
 */
class Books extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['bookName', 'category', 'quantity'], 'required'],
            [['quantity'], 'integer'],
            [['bookName'], 'string', 'max' => 150],
            [['bookName'], 'unique'],
            [['category'], 'string', 'max' => 80],
            [['category'], 'unique'],
            [['category'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category' => 'categoryType']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'bookId' => 'Book ID',
            'bookName' => 'Book Name',
            'category' => 'Category',
            'quantity' => 'Quantity',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory0()
    {
        return $this->hasOne(Category::className(), ['categoryType' => 'category']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedbooks()
    {
        return $this->hasMany(Issuedbooks::className(), ['bookId' => 'bookId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsernames()
    {
        return $this->hasMany(Users::className(), ['username' => 'username'])->viaTable('issuedbooks', ['bookId' => 'bookId']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnedlogs()
    {
        return $this->hasMany(Returnedlog::className(), ['bookId' => 'bookId']);
    }

    /**
     * @inheritdoc
     * @return BooksQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new BooksQuery(get_called_class());
    }
}
