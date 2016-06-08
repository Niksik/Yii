<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\IssuedBooks;

/**
 * IssuedBooksSearch represents the model behind the search form about `app\models\IssuedBooks`.
 */
class IssuedBooksSearch extends IssuedBooks
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['issueId', 'bookId', 'idNumber'], 'integer'],
            [['username', 'dateIssued', 'dateToReturn', 'status'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = IssuedBooks::find();

		$query->joinWith(['book','username','student']);
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
            'issueId' => $this->issueId,
            'dateIssued' => $this->dateIssued,
            'dateToReturn' => $this->dateToReturn,
            'issuedbooks.idNumber' => $this->idNumber,
        ]);

        $query
            ->andFilterWhere(['like', 'username', $this->username])
            ->andFilterWhere(['like', 'student.idNumber', $this->student])
            ->andFilterWhere(['like', 'students.fullName', $this->student])
            ->andFilterWhere(['like', 'status', 'O']);

        return $dataProvider;
    }
}
