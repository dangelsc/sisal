<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_tipoempleo".
 *
 * @property integer $id
 * @property string $tipoempleo
 * @property integer $estado
 *
 * @property TblFuncionario[] $tblFuncionarios
 */
class TblTipoempleo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_tipoempleo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['estado'], 'integer'],
            [['tipoempleo'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'tipoempleo' => 'Tipoempleo',
            'estado' => 'Estado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFuncionarios()
    {
        return $this->hasMany(TblFuncionario::className(), ['id_tipoempleado' => 'id']);
    }
}
