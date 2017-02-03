<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Escuelas;

/**
 * EscuelasSearch represents the model behind the search form about `backend\models\Escuelas`.
 */
class EscuelasSearch extends Escuelas
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_escuela'], 'integer'],
            [['nombre_escuela'], 'safe'],
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
        $query = Escuelas::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id_escuela' => $this->id_escuela,
        ]);

        $query->andFilterWhere(['like', 'nombre_escuela', $this->nombre_escuela]);

        return $dataProvider;
    }
}
