<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mahasiswa".
 *
 * @property string $nrp
 * @property string $nama
 * @property string $strata
 * @property string $mayor
 */
class Mahasiswa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mahasiswa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nrp', 'nama', 'strata', 'mayor'], 'required'],
            [['nrp'], 'string', 'max' => 15],
            [['nama'], 'string', 'max' => 30],
            [['strata'], 'string', 'max' => 3],
            [['mayor'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'nrp' => 'Nrp',
            'nama' => 'Nama',
            'strata' => 'Strata',
            'mayor' => 'Mayor',
        ];
    }
}
