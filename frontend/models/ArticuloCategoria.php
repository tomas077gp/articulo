<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "articulo_categoria".
 *
 * @property integer $id_articulo
 * @property integer $id_articulo_categoria
 * @property integer $id_categoria
 *
 * @property Articulo $idArticulo
 * @property Categoria $idCategoria
 */
class ArticuloCategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo_categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_articulo', 'id_categoria'], 'required'],
            [['id_articulo', 'id_categoria'], 'integer'],
            [['id_articulo'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['id_articulo' => 'id_articulo']],
            [['id_categoria'], 'exist', 'skipOnError' => true, 'targetClass' => Categoria::className(), 'targetAttribute' => ['id_categoria' => 'id_categoria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Id Articulo',
            'id_articulo_categoria' => 'Id Articulo Categoria',
            'id_categoria' => 'Id Categoria',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArticulo()
    {
        return $this->hasOne(Articulo::className(), ['id_articulo' => 'id_articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdCategoria()
    {
        return $this->hasOne(Categoria::className(), ['id_categoria' => 'id_categoria']);
    }
}
