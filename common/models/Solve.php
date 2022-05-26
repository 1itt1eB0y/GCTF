<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "solve".
 *
 * @property int $id
 * @property int $submit_id
 * @property int $challenge_id
 * @property int $user_id
 * @property int $score
 *
 * @property Challenge $challenge
 * @property Submission $submit
 * @property User $user
 */
class Solve extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'solve';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['submit_id', 'challenge_id', 'user_id', 'score'], 'required'],
            [['submit_id', 'challenge_id', 'user_id', 'score'], 'integer'],
            [['challenge_id', 'user_id'], 'unique', 'targetAttribute' => ['challenge_id', 'user_id']],
            [['challenge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Challenge::class, 'targetAttribute' => ['challenge_id' => 'id']],
            [['submit_id'], 'exist', 'skipOnError' => true, 'targetClass' => Submission::class, 'targetAttribute' => ['submit_id' => 'id']],
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
            'submit_id' => 'Submit ID',
            'challenge_id' => 'Challenge ID',
            'user_id' => 'User ID',
            'score' => 'Score',
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
     * Gets query for [[Submit]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmit()
    {
        return $this->hasOne(Submission::class, ['id' => 'submit_id']);
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
