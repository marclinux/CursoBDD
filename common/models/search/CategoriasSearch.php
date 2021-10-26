<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Categorias;

/**
 * CategoriasSearch represents the model behind the search form of `common\models\Categorias`.
 */
class CategoriasSearch extends Categorias
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'Activo', 'idCategoriaPadre'], 'integer'],
            [['ClaveCategoria', 'NombreCategoria'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Categorias::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'Activo' => $this->Activo,
            'idCategoriaPadre' => $this->idCategoriaPadre,
        ]);

        $query->andFilterWhere(['like', 'ClaveCategoria', $this->ClaveCategoria])
            ->andFilterWhere(['like', 'NombreCategoria', $this->NombreCategoria]);

        return $dataProvider;
    }
}
