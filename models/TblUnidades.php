<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_unidades".
 *
 * @property integer $id
 * @property integer $id_institucion
 * @property string $descrip
 * @property string $cite
 * @property integer $padre
 * @property string $nombre_cargo
 * @property string $categoria
 * @property string $haber_basico
 * @property string $estado_cargo
 * @property string $clasificacion
 *
 * @property TblFuncionario[] $tblFuncionarios
 */
class TblUnidades extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_unidades';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_institucion'], 'required'],
            [['id_institucion', 'padre'], 'integer'],
            [['haber_basico'], 'number'],
            [['descrip', 'nombre_cargo'], 'string', 'max' => 100],
            [['cite', 'clasificacion'], 'string', 'max' => 20],
            [['categoria'], 'string', 'max' => 70],
            [['estado_cargo'], 'string', 'max' => 1]
        ];
    }
    public static function getItem($id){
        return TblUnidades::findOne($id);
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_institucion' => 'Id Institucion',
            'descrip' => 'Unidad',
            'cite' => 'Cite',
            'padre' => 'Padre',
            'nombre_cargo' => 'Nombre Cargo',
            'categoria' => 'Categoria',
            'haber_basico' => 'Haber Basico',
            'estado_cargo' => 'Estado Cargo',
            'clasificacion' => 'Clasificacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFuncionarios()
    {
        return $this->hasMany(TblFuncionario::className(), ['id_unidad' => 'id']);
    }
}
