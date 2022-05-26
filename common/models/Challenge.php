<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "challenge".
 *
 * @property int $id
 * @property string $name
 * @property string|null $description
 * @property int $value
 * @property string $category
 * @property string|null $file
 * @property int $dynamic
 * @property int|null $decrease
 * @property int|null $least
 * @property int|null $now
 * @property int $status
 *
 * @property Container[] $containers
 * @property Flag[] $flags
 * @property Image[] $images
 * @property Solve[] $solves
 * @property Submission[] $submissions
 * @property User[] $users
 */
class Challenge extends \yii\db\ActiveRecord
{
    const STATUS_INACTIVE = 0;
    const STATUS_ACTIVE = 1;
    const DYNAMIC_INACTIVE = 0;
    const DYNAMIC_ACTIVE = 1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'challenge';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'value', 'category', 'dynamic'], 'required'],
            [['description'], 'string'],
            [['value', 'dynamic', 'decrease', 'least', 'now', 'status'], 'integer'],
            [['name', 'category'], 'string', 'max' => 80],
            [['file'], 'string', 'max' => 255],
            ['dynamic', 'default', 'value' => self::DYNAMIC_INACTIVE],
            ['status', 'default', 'value' => self::STATUS_INACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_INACTIVE]],
            ['dynamic', 'in', 'range' => [self::DYNAMIC_ACTIVE, self::DYNAMIC_INACTIVE]],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'description' => 'Description',
            'value' => 'Value',
            'category' => 'Category',
            'file' => 'File',
            'dynamic' => 'Dynamic',
            'decrease' => 'Decrease',
            'least' => 'Least',
            'now' => 'Now',
            'status' => 'Status',
        ];
    }

    /**
     * Get challenge status
     * 
     * @return string
     */
    public function getStatus()
    {
        if ($this->status == self::STATUS_ACTIVE) {
            return true;
        }
        return false;
    }

    /**
     * Get challenge dynamic
     * 
     * @return string
     */
    public function getDynamic()
    {
        if ($this->dynamic == self::DYNAMIC_ACTIVE) {
            return true;
        }
        return false;
    }

    /**
     * Gets query for [[Containers]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getContainers()
    {
        return $this->hasMany(Container::class, ['challenge_id' => 'id']);
    }

    /**
     * Gets query for [[Flags]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFlags()
    {
        return $this->hasMany(Flag::class, ['challenge_id' => 'id']);
    }

    /**
     * Gets query for [[Images]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(Image::class, ['challenge_id' => 'id']);
    }

    /**
     * Gets query for [[Solves]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSolves()
    {
        return $this->hasMany(Solve::class, ['challenge_id' => 'id']);
    }

    /**
     * Gets query for [[Submissions]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSubmissions()
    {
        return $this->hasMany(Submission::class, ['challenge_id' => 'id']);
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::class, ['id' => 'user_id'])->viaTable('solve', ['challenge_id' => 'id']);
    }
}
