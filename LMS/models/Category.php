<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property string $categoryType
 * @property string $category
 *
 * @property Books $books
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['categoryType', 'category'], 'required'],
			[['category', 'categoryType'], 'unique'],
            [['categoryType'], 'string', 'max' => 80],
            [['category'], 'string', 'max' => 180],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'categoryType' => 'Category Number',
            'category' => 'Category',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasOne(Books::className(), ['category' => 'categoryType']);
    }

    /**
     * @inheritdoc
     * @return CategoryQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new CategoryQuery(get_called_class());
    }
}
