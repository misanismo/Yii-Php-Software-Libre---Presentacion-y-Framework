<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property integer $Id
 * @property integer $Code_Product
 * @property string $Name
 * @property double $Price
 * @property string $Create_At
 * @property string $Update_At
 */
class Products extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Code_Product', 'Name', 'Price', 'Create_At', 'Update_At'], 'required'],
            [['Code_Product'], 'integer'],
            [['Price'], 'number'],
            [['Create_At', 'Update_At'], 'safe'],
            [['Name'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Id' => 'N° Registro',
            'Code_Product' => 'Código',
            'Name' => 'Nombre',
            'Price' => 'Precio',
            'Create_At' => 'Fecha de creación',
            'Update_At' => 'Fecha de modificación',
        ];
    }
}
