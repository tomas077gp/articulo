<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "articulo".
 *
 * @property integer $id_articulo
 * @property string $nombre_articulo
 * @property string $Url
 * @property string $descripcion
 * @property string $puntaje_articulo
 * @property string $ciudad
 * @property string $fecha_creacion
 * @property string $fehca_revision
 * @property string $fecha_publicacion
 * @property integer $id_escuela
 * @property integer $id_estados
 * @property string $archivo
 *
 * @property Escuelas $idEscuela
 * @property Estados $idEstados
 * @property ArticuloAutores[] $articuloAutores
 * @property ArticuloCategoria[] $articuloCategorias
 * @property ArticuloRevista[] $articuloRevistas
 */
class Articulo extends \yii\db\ActiveRecord
{
  public $file;
  public $anio;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'articulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Url', 'descripcion', 'archivo'], 'string'],
            [['puntaje_articulo'], 'number'],
            [['fecha_creacion', 'fehca_revision', 'fecha_publicacion'], 'safe'],
            [['id_escuela', 'id_estados'], 'required'],
            [['id_escuela', 'id_estados'], 'integer'],
            [['nombre_articulo'], 'string', 'max' => 200],
            [['ciudad'], 'string', 'max' => 80],
            [['id_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Escuelas::className(), 'targetAttribute' => ['id_escuela' => 'id_escuela']],
            [['id_estados'], 'exist', 'skipOnError' => true, 'targetClass' => Estados::className(), 'targetAttribute' => ['id_estados' => 'id_estados']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_articulo' => 'Id Articulo',
            'nombre_articulo' => 'Nombre Articulo',
            'Url' => 'Url',
            'descripcion' => 'Descripcion',
            'puntaje_articulo' => 'Puntaje Articulo',
            'ciudad' => 'Ciudad',
            'fecha_creacion' => 'Fecha Creacion',
            'fehca_revision' => 'Fehca Revision',
            'fecha_publicacion' => 'Fecha Publicacion',
            'id_escuela' => 'Id Escuela',
            'id_estados' => 'Id Estados',
            'archivo' => 'Archivo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEscuela()
    {
        return $this->hasOne(Escuelas::className(), ['id_escuela' => 'id_escuela']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEstados()
    {
        return $this->hasOne(Estados::className(), ['id_estados' => 'id_estados']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloAutores()
    {
        return $this->hasMany(ArticuloAutores::className(), ['id_articulo' => 'id_articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloCategorias()
    {
        return $this->hasMany(ArticuloCategoria::className(), ['id_articulo' => 'id_articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloRevistas()
    {
        return $this->hasMany(ArticuloRevista::className(), ['id_articulo' => 'id_articulo']);
    }
}
