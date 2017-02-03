<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Categoria;

/**
 * CategoriaSearch represents the model behind the search form about `backend\models\Categoria`.
 */
class CategoriaSearch extends Categoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria'], 'integer'],
            [['nombre_categoria'], 'safe'],
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
        $query = Categoria::find();

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
            'id_categoria' => $this->id_categoria,
        ]);

        $query->andFilterWhere(['like', 'nombre_categoria', $this->nombre_categoria]);

        return $dataProvider;
    }
}
