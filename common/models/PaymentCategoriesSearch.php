<?php

namespace common\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PaymentCategories;

/**
 * PaymentCategoriesSearch represents the model behind the search form of `common\models\PaymentCategories`.
 */
class PaymentCategoriesSearch extends PaymentCategories
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['payment_cat_id'], 'integer'],
            [['payment_title', 'payment_decription', 'last_update'], 'safe'],
            [['amount'], 'number'],
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
        $query = PaymentCategories::find();

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
            'payment_cat_id' => $this->payment_cat_id,
            'amount' => $this->amount,
            'last_update' => $this->last_update,
        ]);

        $query->andFilterWhere(['like', 'payment_title', $this->payment_title])
            ->andFilterWhere(['like', 'payment_decription', $this->payment_decription]);

        return $dataProvider;
    }
}
