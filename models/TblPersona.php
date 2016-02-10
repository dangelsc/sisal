<?php

namespace app\models;


use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "tbl_persona".
 *
 * @property integer $id
 * @property string $ci
 * @property string $ci_exp
 * @property string $nombres
 * @property string $ap_paterno
 * @property string $ap_materno
 * @property string $fech_naci
 * @property string $genero
 * @property string $dir_foto
 *
 * @property TblFuncionario $tblFuncionario
 * @property TblProveedor $tblProveedor
 */
class TblPersona extends \yii\db\ActiveRecord
{
     public $imageFile;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_persona';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return //($this->isNewRecord?
            [
            [['ci', 'ci_exp', 'nombres', 'ap_paterno', 'fech_naci', 'genero'], 'required'],
            [['fech_naci'], 'safe'],
            [['ci'], 'string', 'max' => 12],
            [['ci_exp'], 'string', 'max' => 2],
            [['nombres'], 'string', 'max' => 50],
            [['ap_paterno', 'ap_materno'], 'string', 'max' => 30],
            [['genero'], 'string', 'max' => 1],
            [['dir_foto'], 'string', 'max' => 100],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg']
        ]/*:[
            [['ci', 'ci_exp', 'nombres', 'ap_paterno', 'fech_naci', 'genero'], 'required'],
            [['fech_naci'], 'safe'],
            [['ci'], 'string', 'max' => 12],
            [['ci_exp'], 'string', 'max' => 2],
            [['nombres'], 'string', 'max' => 50],
            [['ap_paterno', 'ap_materno'], 'string', 'max' => 30],
            [['genero'], 'string', 'max' => 1],
            [['dir_foto'], 'string', 'max' => 100],
        ])*/;
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ci' => 'CI',
            'ci_exp' => 'CI Expedido',
            'nombres' => 'Nombres',
            'ap_paterno' => 'Apellido Paterno',
            'ap_materno' => 'Apellido Materno',
            'fech_naci' => 'Fecha Nacimiento',
            'genero' => 'Genero',
            'dir_foto' => 'Dir Foto',
            'imageFile'=>"Fotografia",
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFuncionario()
    {
        return $this->hasOne(TblFuncionario::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblProveedor()
    {
        return $this->hasOne(TblProveedor::className(), ['id' => 'id']);
    }
}
