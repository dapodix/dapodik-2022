<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class NilaiRaporTableInfo extends base\BaseNilaiRaporTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->setTableValidation('vld_nilai_rapor');

        $this->getColumnByName('anggota_rombel_id')->setDescription('Peserta didik akan terpilih sesuai dengan anggota rombel yang telah terdaftar di rombongan belajar');
		$this->getColumnByName('nilai_kognitif_angka')->setDescription('Diisi nilai angka kognitif dari daftar nilai ');
		$this->getColumnByName('nilai_kognitif_huruf')->setDescription('Diisi nilai huruf kognitif dari daftar nilai ');
		$this->getColumnByName('ket_kognitif')->setDescription('Diisi dengan keterangan kognitif');
		$this->getColumnByName('nilai_psim_angka')->setDescription('Diisi dengan niali angka psim dari daftar nilai');
		$this->getColumnByName('nilai_psim_huruf')->setDescription('Diisi dengan niali huruf psim dari daftar nilai');
		$this->getColumnByName('ket_psim')->setDescription('Diisi dengan keterangan psim');
		$this->getColumnByName('nilai_afektif_angka')->setDescription('Diisi dengan niali angka afektif dari daftar nilai');
		$this->getColumnByName('nilai_afektif_huruf')->setDescription('Diisi dengan niali huruf afektif dari daftar nilai');
		$this->getColumnByName('ket_afektif')->setDescription('Diisi dengan keterangan afektif');
		$this->getColumnByName('nilai_afektif2_angka')->setDescription('Diisi dengan niali angka afektif dari daftar nilai');
		$this->getColumnByName('nilai_afektif2_huruf')->setDescription('Diisi dengan niali huruf afektif dari daftar nilai');
		$this->getColumnByName('ket_afektif2')->setDescription('Diisi dengan keterangan afektif');

    }

}