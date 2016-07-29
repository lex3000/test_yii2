<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property integer $code
 * @property double $price
 * @property integer $availability
 * @property string $brand
 * @property string $description
 * @property integer $status
 *
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['category_id', 'code', 'price', 'availability', 'description'], 'required'],
            [['category_id', 'code', 'availability', 'status'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['name'], 'string', 'max' => 255],
            [['brand'], 'string', 'max' => 11],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'category_id' => 'Category ID',
            'code' => 'Code',
            'price' => 'Price',
            'availability' => 'Availability',
            'brand' => 'Brand',
            'description' => 'Description',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
}
