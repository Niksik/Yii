<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $username
 * @property string $password
 *
 * @property Issuedbooks[] $issuedbooks
 * @property Books[] $books
 * @property Returnedlog[] $returnedlogs
 */
class Users extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
	public $id;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
			[['username'], 'unique'],
            [['username'], 'string', 'max' => 20],
            [['password'], 'string', 'max' => 120],
        ];
    }

	public function beforeSave($insert)
	{
		if (parent::beforeSave($insert)) {
			   $this->password = md5($this->password+$this->username);
		return true;
		} else {
			return false;
		}
	} 
    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'password' => 'Password',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIssuedbooks()
    {
        return $this->hasMany(Issuedbooks::className(), ['username' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::className(), ['bookId' => 'bookId'])->viaTable('issuedbooks', ['username' => 'username']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getReturnedlogs()
    {
        return $this->hasMany(Returnedlog::className(), ['username' => 'username']);
    }

    /**
     * @inheritdoc
     * @return UsersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsersQuery(get_called_class());
    }
	
    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return isset(self::$users[$id]) ? new static(self::$users[$id]) : null;
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        foreach (self::$users as $user) {
            if ($user['accessToken'] === $token) {
                return new static($user);
            }
        }

        return null;
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
          return  self::findOne(['username'=>$username]);
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->id;
    }
	
	

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->authKey === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return boolean if password provided is valid for current user
     */
    public function validatePassword($model)
    {
          return  self::findOne(['password'=>md5($model->password+$model->username)]);
    }
}
