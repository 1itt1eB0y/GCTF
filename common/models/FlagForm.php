<?php

namespace common\models;

use common\models\Challenge;
use Yii;
use yii\base\Model;
use yii\validators\Validator;

/**
 * Flag submit form
 */
class FlagForm extends Model
{
    public $flag;
    public $challenge_id;

    protected $_result = false;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['flag', 'challenge_id'], 'required'],
        ];
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return bool whether the user is logged in successfully
     */
    public function submit()
    {
        if ($this->validate()) {
            $submit_model = new Submission();
            $submit_model->challenge_id = $this->challenge_id;
            $submit_model->user_id = Yii::$app->user->id;
            $submit_model->ip = Yii::$app->request->userIP;
            $submit_model->flag = $this->flag;
            $submit_model->date = date('Y-m-d H:i:s');
            $flag_model = Flag::findOne(['challenge_id' => $this->challenge_id]);
            if ($flag_model->flag == $this->flag) {
                $submit_model->result = 'success';
                $this->_result = true;
            } else {
                $submit_model->result = 'fail';
                $this->_result = false;
            }
            if ($submit_model->save()) {
                if ($submit_model->result == 'success' &&
                    Solve::findOne([
                        'challenge_id' => $submit_model->challenge_id,
                        'user_id' => $submit_model->user_id,
                    ]) == null) {
                    $solve_model = new Solve();
                    $solve_model->submit_id = $submit_model->id;
                    $solve_model->user_id = Yii::$app->user->id;
                    $solve_model->challenge_id = $this->challenge_id;
                    $solve_model = $this->dealChallenge($solve_model);
                    if ($solve_model->save()) {
                        return true;
                    }else{
                        $this->addError('flag', 'Something error, please try again.');
                    }
                }else if ($submit_model->result == 'fail') {
                    $this->addError('flag', 'Flag Wrong!');
                }else if ($submit_model->result == 'success') {
                    return true;
                }
            }
        }else{
            $this->addError('flag', 'Invalid Input!');
        }
        return false;
    }

    protected function dealChallenge($solve_model)
    {
        $challenge_model = Challenge::findOne($this->challenge_id);
        if ($challenge_model->dynamic == Challenge::DYNAMIC_ACTIVE && ($challenge_model->now - $challenge_model->decrease >= $challenge_model->least)) {
            $solve_model->score = $challenge_model->now;
            $challenge_model->now = $challenge_model->now - $challenge_model->decrease;
            $challenge_model->save();
        }else{
            $solve_model->score = $challenge_model->now;
        }
        return $solve_model;
    }

    public function getResult()
    {
        return $this->_result;
    }
}
