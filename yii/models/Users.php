<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "users".
 *
 * @property integer $Id
 * @property string $Name
 * @property string $Password
 * @property string $User_Name
 * @property string $Created_At
 * @property string $Update_At
 */
class Users extends ActiveRecord implements IdentityInterface
{
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
            [['Name', 'Password', 'User_Name', 'Created_At', 'Update_At'], 'required'],
            [['Created_At', 'Update_At'], 'safe'],
            [['Name'], 'string', 'max' => 200],
            [['Password', 'User_Name'], 'string', 'max' => 500],
            [['User_Name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'ID',
            'Name' => 'Name',
            'Password' => 'Password',
            'User_Name' => 'User  Name',
        ];
    }
/**
 * Finds an identity by the given ID.
 * @param string|integer $id the ID to be looked for
 * @return IdentityInterface the identity object that matches the given ID.
 * Null should be returned if such an identity cannot be found
 * or the identity is not in an active state (disabled, deleted, etc.)
 */public static function findIdentity($id)
{
    return static::findOne($id);
}/**
 * Finds an identity by the given token.
 * @param mixed $token the token to be looked for
 * @param mixed $type the type of the token. The value of this parameter depends on the implementation.
 * For example, [[\yii\filters\auth\HttpBearerAuth]] will set this parameter to be `yii\filters\auth\HttpBearerAuth`.
 * @return IdentityInterface the identity object that matches the given token.
 * Null should be returned if such an identity cannot be found
 * or the identity is not in an active state (disabled, deleted, etc.)
 */public static function findIdentityByAccessToken($token, $type = null)
{
    return static::findOne(['access_token' => $token]);
}/**
 * Returns an ID that can uniquely identify a user identity.
 * @return string|integer an ID that uniquely identifies a user identity.
 */public function getId()
{
    return $this->Id;
}/**
 * Returns a key that can be used to check the validity of a given identity ID.
 *
 * The key should be unique for each individual user, and should be persistent
 * so that it can be used to check the validity of the user identity.
 *
 * The space of such keys should be big enough to defeat potential identity attacks.
 *
 * This is required if [[User::enableAutoLogin]] is enabled.
 * @return string a key that is used to check the validity of a given identity ID.
 * @see validateAuthKey()
 */public function getAuthKey()
{
    return $this->auth_key;
}/**
 * Validates the given auth key.
 *
 * This is required if [[User::enableAutoLogin]] is enabled.
 * @param string $authKey the given auth key
 * @return boolean whether the given auth key is valid.
 * @see getAuthKey()
 */public function validateAuthKey($authKey)
{
    return $this->getAuthKey() === $authKey;
}}
