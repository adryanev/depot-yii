<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pemesanan;

/**
 * PemesananSearch represents the model behind the search form of `common\models\Pemesanan`.
 */
class PemesananSearch extends Pemesanan
{
    public $username;
    public $statusString;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id','jumlah', 'status', 'created_at', 'updated_at'], 'integer'],
            [['alamat', 'telepon','username','statusPemesanan','statusString'], 'safe'],
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
        $query = Pemesanan::find()->joinWith('user');

        // add conditions that should always apply here


        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        $dataProvider->sort->attributes['username'] = [
            'asc'=>['user.username'=>SORT_ASC],
            'desc'=>['user.username'=>SORT_DESC]
        ];

        $dataProvider->sort->defaultOrder = [
            'id'=>SORT_DESC
        ];

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'jumlah' => $this->jumlah,
            'pemesanan.status' => $this->status,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'alamat', $this->alamat])
            ->andFilterWhere(['like', 'telepon', $this->telepon])
            ->andFilterWhere(['like', 'user.username', $this->username])
        ;

        return $dataProvider;
    }
}
