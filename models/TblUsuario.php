<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_usuario".
 *
 * @property integer $id
 * @property string $nom_usuario
 * @property string $contrasenia_usuario
 * @property string $estado_usuario
 * @property integer $iduser
 *
 * @property TblFuncionario $id0
 * @property User $iduser0
 */
class TblUsuario extends \yii\db\ActiveRecord
{
    public $password_repeat;
    static $usuario=null; 
    static $unidad=null; 
    public static function Usuario(){
        if(TblUsuario::$usuario==null){
            $id=Yii::$app->user->identity->id;
            TblUsuario::$usuario=TblUsuario::find()->where("iduser=".$id)->one();
        }
        return TblUsuario::$usuario;
    }
    public static function Unidad(){
        if(TblUsuario::$unidad==null){
            $User=TblUsuario::Usuario();
            TblUsuario::$unidad=TblUsuario::$unidad=$User->id0->idUnidad;
        }
        return TblUsuario::$unidad;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nom_usuario'], 'required'],
            [['id', 'iduser'], 'integer'],
            [['nom_usuario'], 'string', 'max' => 30],
            [['contrasenia_usuario'], 'string', 'max' => 256],
            [['estado_usuario'], 'string', 'max' => 1],
            ['password_repeat', 'compare', 'compareAttribute' => 'contrasenia_usuario'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nom_usuario' => 'Nom Usuario',
            'contrasenia_usuario' => 'Contrasenia Usuario',
            'estado_usuario' => 'Estado Usuario',
            'iduser' => 'Iduser',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getId0()
    {
        return $this->hasOne(TblFuncionario::className(), ['id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIduser0()
    {
        return $this->hasOne(User::className(), ['id' => 'iduser']);
    }
}
