<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "categorias".
 *
 * @property int $id
 * @property string|null $ClaveCategoria
 * @property string|null $NombreCategoria
 * @property int|null $Activo
 * @property int|null $idCategoriaPadre
 */
class Categorias extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categorias';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['Activo', 'idCategoriaPadre'], 'integer'],
            [['ClaveCategoria'], 'string', 'max' => 20],
            [['NombreCategoria'], 'string', 'max' => 200],
            [['ClaveCategoria'], 'unique'],
            [['NombreCategoria'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'ClaveCategoria' => Yii::t('app', 'Clave Categoria'),
            'NombreCategoria' => Yii::t('app', 'Nombre Categoria'),
            'Activo' => Yii::t('app', 'Activo'),
            'idCategoriaPadre' => Yii::t('app', 'Id Categoria Padre'),
        ];
    }
}
