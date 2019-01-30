<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proses".
 *
 * @property integer $id_proses
 * @property integer $id_antrian
 * @property string $nrp
 * @property integer $id_pengajuan
 * @property string $tanggal_pengajuan
 * @property string $loket
 * @property string $wadek
 * @property string $dekan
 * @property string $persuratan
 * @property string $keterangan
 */
class Proses extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proses';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'nrp', 'id_pengajuan', 'tanggal_pengajuan', 'loket'], 'required'],
            [['id', 'id_pengajuan'], 'integer'],
            [['tanggal_pengajuan'], 'safe'],
            [['nrp'], 'string', 'max' => 15],
            [['loket', 'wadek', 'dekan', 'persuratan', 'keterangan'], 'string', 'max' => 10],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_proses' => 'Id Proses',
            'id' => 'Id Antrian',
            'nrp' => 'Nrp',
            'id_pengajuan' => 'Id Pengajuan',
            'tanggal_pengajuan' => 'Tanggal Pengajuan',
            'loket' => 'Loket',
            'wadek' => 'Wadek',
            'dekan' => 'Dekan',
            'persuratan' => 'Persuratan',
            'keterangan' => 'Keterangan',
        ];
    }
}
