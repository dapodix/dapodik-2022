<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BeasiswaPesertaDidikTableInfo extends base\BaseBeasiswaPesertaDidikTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_bea_pd');

        // Override below here!
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        $this->getColumnByName('jenis_beasiswa_id')->setDescription('Pilih jenis beasiswa yang diterima oleh peserta didik.');
		$this->getColumnByName('keterangan')->setDescription('Diisi keterangan terkait beasiswa berdasarkan jenis beasiswa yang diterima oleh peserta didik. Misalkan jenis beasiswanya Pendidikan maka keterangannya Beasiswa Kementrian Pendidikan');
		$this->getColumnByName('tahun_mulai')->setDescription('Diisi angka tahun mulai diterimanya beasiswa oleh peserta didik.');
		$this->getColumnByName('tahun_selesai')->setDescription('Diisi dengan angka tahun selesai diterimanya beasiswa oleh peserta didik. Apabila beasiswa tersebut hanya diterima sekali dalam tahun yang sama, maka Diisi kolom ini dengan tahun yang sama pada kolom Tahun Mulai.');

    }

}