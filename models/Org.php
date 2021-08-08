<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "org".
 *
 * @property int $id
 * @property string $org_name
 * @property int|null $parent_id
 *
 * @property Org $parent
 * @property Org[] $orgs
 */
class Org extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'org';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['org_name'], 'required'],
            [['parent_id'], 'string', 'max' => 255],
            [['org_name'], 'string', 'max' => 255],
            [['parent_id'], 'exist', 'skipOnError' => true, 'targetClass' => Org::className(), 'targetAttribute' => ['parent_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'org_name' => 'Org Name',
            'parent_id' => 'Parent ID',
        ];
    }

    /**
     * Gets query for [[Parent]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getParent()
    {
        return $this->hasOne(Org::className(), ['id' => 'parent_id']);
    }

    /**
     * Gets query for [[Orgs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrgs()
    {
        return $this->hasMany(Org::className(), ['parent_id' => 'id']);
    }
}
