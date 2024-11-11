<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Session;

/**
 * SessionSearch represents the model behind the search form of `app\models\Session`.
 */
class SessionSearch extends Session
{
    public $film;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'id_film', 'price'], 'integer'],
            [['date_pok', 'cenz'], 'safe'],
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
        $query = Session::find();

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
            'id_film' => $this->id_film,
            'price' => $this->price,
            'date_pok' => $this->date_pok,
        ]);

        $query->andFilterWhere(['like', Films::tableName() . '.title', $this->film]);
        $query->andFilterWhere(['like', 'cenz', $this->cenz]);

        return $dataProvider;
    }
}
