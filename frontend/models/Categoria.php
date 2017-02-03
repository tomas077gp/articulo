<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "categoria".
 *
 * @property integer $id_categoria
 * @property string $nombre_categoria
 *
 * @property ArticuloCategoria[] $articuloCategorias
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_categoria'], 'required'],
            [['id_categoria'], 'integer'],
            [['nombre_categoria'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_categoria' => 'Id Categoria',
            'nombre_categoria' => 'Nombre Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloCategorias()
    {
        return $this->hasMany(ArticuloCategoria::className(), ['id_categoria' => 'id_categoria']);
    }
}
