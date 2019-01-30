<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "antrian".
 *
 * @property integer $id
 * @property string $nrp
 * @property integer $id_pengajuan
 * @property string $tanggal_pengajuan
 * @property string $loket
 * @property string $wadek
 * @property string $dekan
 * @property string $persuratan
 * @property string $keterangan
 */
class Antrian extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'antrian';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nrp', 'id_pengajuan'], 'required'],
            [['id_pengajuan'], 'integer'],
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
            'id' => 'ID',
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
    public static function NextOrPrev($currentId)
{
    $records = Antrian::find()->orderBy('id DESC')->all();

    foreach ($records as $i => $record) {
        if ($record->id == $currentId) {
            $next = isset($records[$i - 1]->id)?$records[$i - 1]->id:null;
            $prev = isset($records[$i + 1]->id)?$records[$i + 1]->id:null;
            break;
        }
    }
    return ['next'=>$next, 'prev'=>$prev];
}
 public function getPengajuan() {
        return $this->hasOne(Pengajuan::className(), ['id_pengajuan' => 'id_pengajuan']);

    } 
     public function getMahasiswa() {
        return $this->hasOne(Mahasiswa::className(), ['nrp' => 'nrp']);

    }
}
