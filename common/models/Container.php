<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "container".
 *
 * @property int $id
 * @property int $user_id
 * @property string $container_hash
 * @property string $container_name
 * @property string $image_hash
 * @property string $image_tag
 * @property int $created
 * @property int $private_port
 * @property int $public_port
 * @property string $ip_address
 * @property string $state
 * @property int $challenge_id
 *
 * @property Challenge $challenge
 * @property Image $imageHash
 * @property Image $imageTag
 * @property User $user
 */
class Container extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'container';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'created', 'private_port', 'public_port', 'challenge_id'], 'integer'],
            [['container_name', 'state', 'challenge_id'], 'required'],
            [['container_hash', 'container_name', 'image_hash', 'image_tag', 'ip_address', 'state'], 'string', 'max' => 255],
            [['image_tag'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['image_tag' => 'tag']],
            [['challenge_id'], 'exist', 'skipOnError' => true, 'targetClass' => Challenge::class, 'targetAttribute' => ['challenge_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['image_hash'], 'exist', 'skipOnError' => true, 'targetClass' => Image::class, 'targetAttribute' => ['image_hash' => 'hash']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'container_hash' => 'Container Hash',
            'container_name' => 'Container Name',
            'image_hash' => 'Image Hash',
            'image_tag' => 'Image Tag',
            'created' => 'Created',
            'private_port' => 'Private Port',
            'public_port' => 'Public Port',
            'ip_address' => 'Ip Address',
            'state' => 'State',
            'challenge_id' => 'Challenge ID',
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
     * Gets query for [[ImageHash]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImageHash()
    {
        return $this->hasOne(Image::class, ['hash' => 'image_hash']);
    }

    /**
     * Gets query for [[ImageTag]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImageTag()
    {
        return $this->hasOne(Image::class, ['tag' => 'image_tag']);
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
