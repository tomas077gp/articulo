<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "articulo_autores".
 *
 * @property integer $id_articulo
 * @property integer $id_escuela
 * @property integer $id_autores
 * @property string $puntaje_autor
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
            [['id_articulo', 'id_escuela', 'id_autores'], 'required'],
            [['id_articulo', 'id_escuela', 'id_autores'], 'integer'],
            [['puntaje_autor'], 'string', 'max' => 40],
            [['id_articulo', 'id_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Articulo::className(), 'targetAttribute' => ['id_articulo' => 'id_articulo', 'id_escuela' => 'id_escuela']],
            [['id_autores', 'id_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Docentes::className(), 'targetAttribute' => ['id_autores' => 'id_docente', 'id_escuela' => 'id_escuela']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Id Articulo',
            'id_escuela' => 'Id Escuela',
            'id_autores' => 'Id Autores',
            'puntaje_autor' => 'Puntaje Autor',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdArticulo()
    {
        return $this->hasOne(Articulo::className(), ['id_articulo' => 'id_articulo', 'id_escuela' => 'id_escuela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdAutores()
    {
        return $this->hasOne(Docentes::className(), ['id_docente' => 'id_autores', 'id_escuela' => 'id_escuela']);
    }
}
