<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Submission;

/**
 * SubmissionSearch represents the model behind the search form of `common\models\Submission`.
 */
class SubmissionSearch extends Submission
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'challenge_id', 'user_id'], 'integer'],
            [['ip', 'flag', 'result', 'date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Submission::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'challenge_id' => $this->challenge_id,
            'user_id' => $this->user_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'ip', $this->ip])
            ->andFilterWhere(['like', 'flag', $this->flag])
            ->andFilterWhere(['like', 'result', $this->result]);

        return $dataProvider;
    }
}
