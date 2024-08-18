<?php

namespace backend\models\Application;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Application\Application;

/**
 * ApplicationSearch represents the model behind the search form of `common\models\Application\Application`.
 */
class ApplicationSearch extends Application
{
    public $create_start_date;
    public $create_end_date;

    public $update_start_date;
    public $update_end_date;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status'], 'integer'],
            [['full_name', 'email', 'phone', 'message', 'moderator_comment', 'create_start_date', 'create_end_date', 'update_start_date', 'update_end_date'], 'safe'],
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
        $query = Application::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query'      => $query,
            'sort'       => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC
                ]
            ],
            'pagination' => [
                'pageSize' => 15,
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id'     => $this->id,
            'status' => $this->status,
        ]);

        if (!is_null($this->created_at) && str_contains($this->created_at, ' - ')) {
            list($create_start_date, $create_end_date) = explode(' - ', $this->created_at);
            // unset created_at from $params
            $query->andFilterWhere(['between', self::tableName() . '.created_at', strtotime($create_start_date), strtotime($create_end_date)]);
        }

        if (!is_null($this->updated_at) && str_contains($this->updated_at, ' - ')) {
            list($update_start_date, $update_end_date) = explode(' - ', $this->updated_at);
            // unset created_at from $params
            $query->andFilterWhere(['between', self::tableName() . '.updated_at', strtotime($update_start_date), strtotime($update_end_date)]);
        }

        $query->andFilterWhere(['like', 'full_name', $this->full_name])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'message', $this->message])
            ->andFilterWhere(['like', 'moderator_comment', $this->moderator_comment]);

        return $dataProvider;
    }
}
