<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "submission".
 *
 * @property int $id
 * @property int|null $challenge_id
 * @property int|null $user_id
 * @property string|null $ip
 * @property string|null $flag
 * @property string|null $result
 * @property string|null $date
 *
 * @property Challenge $challenge
 * @property Solve[] $solves
 * @property User $user
 */
class Submission extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'submission';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['challenge_id', 'user_id'], 'integer'],
            [['flag'], 'string'],
            [['date'], 'safe'],
            [['ip', 'result'], 'string', 'max' => 255],
            [['challenge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Challenge::class, 'targetAttribute' => ['challenge_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'ip' => 'Ip',
            'flag' => 'Flag',
            'result' => 'Result',
            'date' => 'Date',
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

    /**
     * Gets query for [[Solves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolves()
    {
        return $this->hasMany(Solve::class, ['submit_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
