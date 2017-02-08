<?php

    namespace common\models\search;

    use Yii;
    use yii\base\Model;
    use yii\data\ActiveDataProvider;
    use common\models\NewsModel;
    use yii\data\Sort;

    /**
     * NewsSearch represents the model behind the search form about `common\models\NewsModel`.
     */
    class NewsSearch extends NewsModel{
        /**
         * @inheritdoc
         */
        public function rules(){
            return [
                [
                    [
                        'id',
                        'active',
                        'created_at',
                        'updated_at',
                    ],
                    'integer'
                ],
                [
                    [
                        'title',
                        'description',
                        'photo'
                    ],
                    'safe'
                ],
            ];
        }

        /**
         * @inheritdoc
         */
        public function scenarios(){
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
        public function search($params){
            $query = NewsModel::find();

            // add conditions that should always apply here

            $dataProvider = new ActiveDataProvider([
                                                       'query' => $query,
                                                       'sort'  => new Sort ([
                                                                                'attributes' => [
                                                                                    'id',
                                                                                    'title',
                                                                                    //'description',
                                                                                    'active',
                                                                                    'updated_at'
                                                                                ]
                                                                            ])
                                                   ]);

            $this->load($params);

            if(!$this->validate()){
                // uncomment the following line if you do not want to return any records when validation fails
                // $query->where('0=1');
                return $dataProvider;
            }

            // grid filtering conditions
            $query->andFilterWhere([
                                       'id'     => $this->id,
                                       'title'  => $this->title,
                                       'active' => $this->active,
                                   ]);

            $query->andFilterWhere([
                                       'like',
                                       'id',
                                       $this->id
                                   ])
                  ->andFilterWhere([
                                       'like',
                                       'title',
                                       $this->title
                                   ])
                  ->andFilterWhere([
                                       'like',
                                       'active',
                                       $this->active
                                   ]);

            return $dataProvider;
        }
    }
