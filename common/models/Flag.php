<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "flag".
 *
 * @property int $id
 * @property int|null $challenge_id
 * @property string|null $flag
 *
 * @property Challenge $challenge
 */
class Flag extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'flag';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['challenge_id'], 'integer'],
            [['flag'], 'string'],
            [['challenge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Challenge::class, 'targetAttribute' => ['challenge_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'challenge_id' => 'Challenge ID',
            'flag' => 'Flag',
        ];
    }

    /**
     * Gets query for [[Challenge]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getChallenge()
    {
        return $this->hasOne(Challenge::class, ['id' => 'challenge_id']);
    }
}
