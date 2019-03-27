<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PaymentMethods;

/**
 * PaymentMethodsSearch represents the model behind the search form of `common\models\PaymentMethods`.
 */
class PaymentMethodsSearch extends PaymentMethods
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_method_id'], 'integer'],
            [['payment_method'], 'safe'],
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
        $query = PaymentMethods::find();

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
            'payment_method_id' => $this->payment_method_id,
        ]);

        $query->andFilterWhere(['like', 'payment_method', $this->payment_method]);

        return $dataProvider;
    }
}
