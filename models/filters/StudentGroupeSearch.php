<?php

namespace app\models\filters;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\tables\StudentGroupe;

/**
 * StudentGroupeSearch represents the model behind the search form of `app\models\tables\StudentGroupe`.
 */
class StudentGroupeSearch extends StudentGroupe
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'groupe_id', 'student_id'], 'integer'],
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
//        $query = StudentGroupe::find();
        $query = StudentGroupe::find()
            ->select(['groupe_id'])
            ->groupBy('groupe_id');

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
            'groupe_id' => $this->groupe_id,
            'student_id' => $this->student_id,
        ]);

        return $dataProvider;
    }
}
