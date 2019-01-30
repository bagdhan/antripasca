<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pengajuan;

/**
 * PengajuanSearch represents the model behind the search form about `app\models\Pengajuan`.
 */
class PengajuanSearch extends Pengajuan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_pengajuan', 'waktu'], 'integer'],
            [['nama_surat', 'syarat'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
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
        $query = Pengajuan::find();

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
            'id_pengajuan' => $this->id_pengajuan,
            'waktu' => $this->waktu,
        ]);

        $query->andFilterWhere(['like', 'nama_surat', $this->nama_surat])
            ->andFilterWhere(['like', 'syarat', $this->syarat]);

        return $dataProvider;
    }
}
