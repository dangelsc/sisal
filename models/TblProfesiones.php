<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tbl_profesiones".
 *
 * @property integer $id
 * @property string $profesion
 *
 * @property TblFuncionario[] $tblFuncionarios
 */
class TblProfesiones extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tbl_profesiones';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['profesion','abr'],'required'],
            [['profesion'], 'string', 'max' => 100]
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'profesion' => 'Profesión',
            'abr'=>'Abreviación',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTblFuncionarios()
    {
        return $this->hasMany(TblFuncionario::className(), ['id_profesion' => 'id']);
    }
}
