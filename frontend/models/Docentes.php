<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "docentes".
 *
 * @property integer $id_docente
 * @property string $nombre_docente
 * @property string $apellidos_docente
 * @property string $direccion
 * @property integer $cedula
 * @property string $correo
 * @property integer $id_escuela
 *
 * @property ArticuloAutores[] $articuloAutores
 * @property Escuelas $idEscuela
 */
class Docentes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'docentes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula', 'id_escuela'], 'integer'],
            [['id_escuela'], 'required'],
            [['nombre_docente', 'apellidos_docente', 'correo'], 'string', 'max' => 15],
            [['direccion'], 'string', 'max' => 30],
            [['id_escuela'], 'exist', 'skipOnError' => true, 'targetClass' => Escuelas::className(), 'targetAttribute' => ['id_escuela' => 'id_escuela']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_docente' => 'Id Docente',
            'nombre_docente' => 'Nombre Docente',
            'apellidos_docente' => 'Apellidos Docente',
            'direccion' => 'Direccion',
            'cedula' => 'Cedula',
            'correo' => 'Correo',
            'id_escuela' => 'Id Escuela',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloAutores()
    {
        return $this->hasMany(ArticuloAutores::className(), ['id_autores' => 'id_docente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdEscuela()
    {
        return $this->hasOne(Escuelas::className(), ['id_escuela' => 'id_escuela']);
    }
}
