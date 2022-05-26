<?php
namespace backend\models;

use yii\base\Model;
use yii\web\UploadedFile;

class ChallengeFile extends Model
{
    /**
     * @var UploadedFile
     */
    public $challengeID;
    public $challengeFile;
    public $saveName;
    protected $_hashName;

    public function rules()
    {
        return [
            [['challengeID','challengeFile'], 'required'],
            [['challengeFile'], 'file', 'skipOnEmpty' => false],
        ];
    }
    
    public function upload()
    {
        if ($this->validate()) {
            $this->_hashName = hash_file('sha256', $this->challengeFile->tempName);
            $this->saveName = $this->_hashName . '.' . $this->challengeFile->extension;

            $this->challengeFile->saveAs(\Yii::$app->params['filePath'] . $this->saveName);
            return true;
        } else {
            return false;
        }
    }
}