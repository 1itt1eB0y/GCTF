<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "image".
 *
 * @property int $id
 * @property string $hash
 * @property string $tag
 * @property string $created
 * @property int $challenge_id
 * @property string $author_name
 * @property int $author_id
 *
 * @property User $author
 * @property User $authorName
 * @property Challenge $challenge
 * @property Container[] $containers
 * @property Container[] $containers0
 */
class Image extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'created', 'challenge_id', 'author_name', 'author_id'], 'required'],
            [['id', 'challenge_id', 'author_id'], 'integer'],
            [['created'], 'safe'],
            [['hash', 'tag', 'author_name'], 'string', 'max' => 255],
            [['id'], 'unique'],
            [['author_name'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_name' => 'username']],
            [['author_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['author_id' => 'id']],
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
            'hash' => 'Hash',
            'tag' => 'Tag',
            'created' => 'Created',
            'challenge_id' => 'Challenge ID',
            'author_name' => 'Author Name',
            'author_id' => 'Author ID',
        ];
    }

    /**
     * Gets query for [[Author]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(User::class, ['id' => 'author_id']);
    }

    /**
     * Gets query for [[AuthorName]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthorName()
    {
        return $this->hasOne(User::class, ['username' => 'author_name']);
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
     * Gets query for [[Containers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContainers()
    {
        return $this->hasMany(Container::class, ['image_tag' => 'tag']);
    }

    /**
     * Gets query for [[Containers0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContainers0()
    {
        return $this->hasMany(Container::class, ['image_hash' => 'hash']);
    }
}
