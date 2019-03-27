<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Subscriptions;

/**
 * SubscriptionsSearch represents the model behind the search form of `common\models\Subscriptions`.
 */
class SubscriptionsSearch extends Subscriptions
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sub_id', 'owner', 'sms_quantity', 'used_sms', 'remaining_sms'], 'integer'],
            [['amount'], 'number'],
            [['bought_on', 'lastly_updated'], 'safe'],
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
        $query = Subscriptions::find();

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
            'sub_id' => $this->sub_id,
            'owner' => $this->owner,
            'amount' => $this->amount,
            'sms_quantity' => $this->sms_quantity,
            'used_sms' => $this->used_sms,
            'remaining_sms' => $this->remaining_sms,
            'bought_on' => $this->bought_on,
            'lastly_updated' => $this->lastly_updated,
        ]);

        return $dataProvider;
    }
}
