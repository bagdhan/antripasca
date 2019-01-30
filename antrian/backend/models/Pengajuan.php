<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pengajuan".
 *
 * @property integer $id_pengajuan
 * @property string $nama_surat
 * @property integer $waktu
 * @property string $syarat
 */
class Pengajuan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pengajuan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama_surat', 'waktu', 'syarat'], 'required'],
            [['waktu'], 'integer'],
            [['syarat'], 'string'],
            [['nama_surat'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id_pengajuan' => 'Id Pengajuan',
            'nama_surat' => 'Nama Surat',
            'waktu' => 'Waktu',
            'syarat' => 'Syarat',
        ];
    }
}