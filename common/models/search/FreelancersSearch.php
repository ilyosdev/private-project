<?php

    namespace common\models\search;

    use common\models\Freelancers;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;

    /**
     * FreelancersSearch represents the model behind the search form of `common\models\Freelancers`.
     */
    class FreelancersSearch extends Freelancers
    {
        /**
         * {@inheritdoc}
         */
        public function rules()
        {
            return [
                [['id', 'experience', 'order_by', 'status', 'is_online'], 'integer'],
                [['img'], 'safe'],
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
            $query = Freelancers::find();

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
                'id'         => $this->id,
                'experience' => $this->experience,
                'order_by'   => $this->order_by,
                'status'     => $this->status,
                'is_online'  => $this->is_online,
            ]);

            $query->andFilterWhere(['like', 'img', $this->img]);

            return $dataProvider;
        }
    }
