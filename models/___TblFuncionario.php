<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_funcionario".
 *
 * @property integer $id_funcionario
 * @property integer $id_unidad
 * @property integer $item
 * @property string $nit
 * @property string $fech_ingreso
 * @property integer $antiguedad
 * @property string $estado
 * @property string $jefe_superior
 * @property string $estado_bono
 * @property string $subsidio
 * @property integer $id_tipoempleado
 * @property string $controltratamiento
 * @property integer $id_profesion
 *
 * @property TblUnidades $idUnidad
 * @property TblTipoempleo $idTipoempleado
 * @property TblPersona $idFuncionario
 * @property TblProfesiones $idProfesion
 * @property TblPermiso[] $tblPermisos
 * @property TblUsuario $tblUsuario
 */
class TblFuncionario extends \yii\db\ActiveRecord
{
    /*static $persona=null;
    private function getpersona(){

        return $persona==null?$this->ifFuncionario
    }*/

    //public $nombre;
    


    public  function getFullName(){
        return $this->idProfesion->abr." ".$this->idFuncionario->ap_paterno." ".$this->idFuncionario->ap_materno." ".$this->idFuncionario->nombres;
    }
   
    public function getFoto(){
        return (is_file("images/face/".$this->idFuncionario->dir_foto)?
                    $this->idFuncionario->dir_foto:
                    ($this->idFuncionario->genero==1?"masculino.jpg":"femenino.jpg"));
    }
    public function UnidadCargo(){
        return $this->idUnidad;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_funcionario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_unidad', 'item', 'antiguedad', 'id_tipoempleado', 'id_profesion'], 'integer'],
            [[ 'fech_ingreso', 'id_tipoempleado'], 'required'],
            [['fech_ingreso'], 'safe'],
            [['nit'], 'string', 'max' => 12,'min'=>10],
            [['estado'], 'integer', 'min' => 1],
            [['jefe_superior'], 'string', 'max' => 50],
            [['estado_bono', 'subsidio'], 'string', 'max' => 2],
            [['controltratamiento'], 'string', 'max' => 250]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'Funcionario',
            'id_unidad' => 'Unidad',
            'item' => 'Item',
            'nit' => 'Nit',
            'fech_ingreso' => 'Fecha Ingreso',
            'antiguedad' => 'Antiguedad',
            'estado' => 'Estado',
            'jefe_superior' => 'Jefe Superior',
            'estado_bono' => 'Estado Bono',
            'subsidio' => 'Subsidio',
            'id_tipoempleado' => 'Tipo mpleado',
            'controltratamiento' => 'Controltratamiento',
            'id_profesion' => 'Profesion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdUnidad()
    {
        return $this->hasOne(TblUnidades::className(), ['id' => 'id_unidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdTipoempleado()
    {
        return $this->hasOne(TblTipoempleo::className(), ['id' => 'id_tipoempleado']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncionario()
    {
        return $this->hasOne(TblPersona::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdProfesion()
    {
        return $this->hasOne(TblProfesiones::className(), ['id' => 'id_profesion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblPermisos()
    {
        return $this->hasMany(TblPermiso::className(), ['id_funcionario' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblUsuario()
    {
        return $this->hasOne(TblUsuario::className(), ['id' => 'id']);
    }
}
