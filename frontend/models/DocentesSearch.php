<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Docentes;

/**
 * DocentesSearch represents the model behind the search form about `frontend\models\Docentes`.
 */
class DocentesSearch extends Docentes
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_docente', 'cedula', 'id_escuela'], 'integer'],
            [['nombre_docente', 'apellidos_docente', 'direccion', 'correo'], 'safe'],
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
        $query = Docentes::find();

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
            'id_docente' => $this->id_docente,
            'cedula' => $this->cedula,
            'id_escuela' => $this->id_escuela,
        ]);

        $query->andFilterWhere(['like', 'nombre_docente', $this->nombre_docente])
            ->andFilterWhere(['like', 'apellidos_docente', $this->apellidos_docente])
            ->andFilterWhere(['like', 'direccion', $this->direccion])
            ->andFilterWhere(['like', 'correo', $this->correo]);

        return $dataProvider;
    }
}
