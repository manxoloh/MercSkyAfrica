<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Payments;

/**
 * PaymentsSearch represents the model behind the search form of `common\models\Payments`.
 */
class PaymentsSearch extends Payments
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_id', 'payment_cat_id', 'payee_id', 'updated_by', 'payment_method'], 'integer'],
            [['amount_paid', 'balance'], 'number'],
            [['payment_date', 'last_update', 'reference_number'], 'safe'],
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
        $query = Payments::find();

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
            'payment_id' => $this->payment_id,
            'payment_cat_id' => $this->payment_cat_id,
            'amount_paid' => $this->amount_paid,
            'balance' => $this->balance,
            'payee_id' => $this->payee_id,
            'payment_date' => $this->payment_date,
            'last_update' => $this->last_update,
            'updated_by' => $this->updated_by,
            'payment_method' => $this->payment_method,
        ]);

        $query->andFilterWhere(['like', 'reference_number', $this->reference_number]);

        return $dataProvider;
    }
}
