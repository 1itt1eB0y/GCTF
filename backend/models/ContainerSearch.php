<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Container;

/**
 * ContainerSearch represents the model behind the search form of `common\models\Container`.
 */
class ContainerSearch extends Container
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'created', 'private_port', 'public_port', 'challenge_id'], 'integer'],
            [['container_hash', 'container_name', 'image_hash', 'image_tag', 'ip_address', 'state'], 'safe'],
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
        $query = Container::find();

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
            'user_id' => $this->user_id,
            'created' => $this->created,
            'private_port' => $this->private_port,
            'public_port' => $this->public_port,
            'challenge_id' => $this->challenge_id,
        ]);

        $query->andFilterWhere(['like', 'container_hash', $this->container_hash])
            ->andFilterWhere(['like', 'container_name', $this->container_name])
            ->andFilterWhere(['like', 'image_hash', $this->image_hash])
            ->andFilterWhere(['like', 'image_tag', $this->image_tag])
            ->andFilterWhere(['like', 'ip_address', $this->ip_address])
            ->andFilterWhere(['like', 'state', $this->state]);

        return $dataProvider;
    }
}
