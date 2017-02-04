<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "articulo_autores".
 *
 * @property integer $id_articulo
 * @property integer $id_articulo_autores
 * @property integer $id_autores
 * @property double $puntaje_autor
 *
 * @property Articulo $idArticulo
 * @property Docentes $idAutores
 */
class ArticuloAutores extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo_autores';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_articulo', 'id_autores'], 'required'],
            [['id_articulo', 'id_autores'], 'integer'],
            [['puntaje_autor'], 'number'],
            [['id_articulo'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['id_articulo' => 'id_articulo']],
            [['id_autores'], 'exist', 'skipOnError' => true, 'targetClass' => Docentes::className(), 'targetAttribute' => ['id_autores' => 'id_docente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Id Articulo',
            'id_articulo_autores' => 'Id Articulo Autores',
            'id_autores' => 'Id Autores',
            'puntaje_autor' => 'Puntaje Autor',
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
    public function getIdAutores()
    {
        return $this->hasOne(Docentes::className(), ['id_docente' => 'id_autores']);
    }
}
