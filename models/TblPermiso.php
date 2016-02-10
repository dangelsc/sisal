<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_permiso".
 *
 * @property integer $id
 * @property integer $tipopermiso
 * @property string $fechaini
 * @property string $fechafin
 * @property integer $activo
 * @property integer $id_funcionario
 *
 * @property TblFuncionario $idFuncionario
 */
class TblPermiso extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_permiso';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['tipopermiso', 'activo', 'id_funcionario'], 'integer'],
            [['fechaini', 'fechafin'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipopermiso' => 'Tipopermiso',
            'fechaini' => 'Fechaini',
            'fechafin' => 'Fechafin',
            'activo' => 'Activo',
            'id_funcionario' => 'Id Funcionario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFuncionario()
    {
        return $this->hasOne(TblFuncionario::className(), ['id' => 'id_funcionario']);
    }
}
