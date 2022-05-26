<?php

namespace frontend\models;

use yii\web\UnauthorizedHttpException;
use yii\base\Model;
use Yii;
use common\models\User;

/**
 * Password reset form
 */
class UpdatePasswordForm extends Model
{
    public $password;
    public $password_confirm;

    /**
     * @var \common\models\User
     */
    private $_user;


    /**
     * Creates a form model given a token.
     *
     * @param array $config name-value pairs that will be used to initialize the object properties
     * @throws UnauthorizedHttpException if token is empty or not valid
     */
    public function __construct($config = [])
    {
        $this->_user = User::findOne(Yii::$app->user->id);
        if (!$this->_user) {
            throw new UnauthorizedHttpException('Wrong password reset token.');
        }
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['password', 'password_confirm'], 'required'],
            ['password', 'string', 'min' => Yii::$app->params['user.passwordMinLength']],
            ['password_confirm', 'compare', 'compareAttribute' => 'password', 'message' => Yii::t('app', 'Passwords don\'t match')],
        ];
    }

    /**
     * Resets password.
     *
     * @return bool if password was reset.
     */
    public function resetPassword()
    {
        $user = $this->_user;
        $user->setPassword($this->password);
        $user->removePasswordResetToken();
        $user->generateAuthKey();

        return $user->save(false);
    }
}
