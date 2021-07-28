<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PrestasiTableInfo extends base\BasePrestasiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_prestasi');

        // Override below here!
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        $this->getColumnByName('tahun_prestasi')->setColumnWidth('110');
        $this->getColumnByName('tahun_prestasi')->setInputLength(4);
        $this->getColumnByName('tahun_prestasi')->setMinLength(4);
        $this->getColumnByName('nama')->setHeader('Nama Prestasi');
        $this->getColumnByName('nama')->setColumnWidth('150');
        $this->getColumnByName('peringkat')->setColumnWidth('90');
        $this->getColumnByName('peringkat')->setInputLength(3);

        $this->getColumnByName('jenis_prestasi_id')->setDescription('Diisi dengan memilih jenis prestasi yang diraih oleh peserta didik.');
        $this->getColumnByName('tingkat_prestasi_id')->setDescription('Diisi dengan memilih tingkat/level prestasi yang diraih oleh peserta didik.');
        $this->getColumnByName('nama')->setDescription('Diisi nama prestasi peserta didik.');
        $this->getColumnByName('tahun_prestasi')->setDescription('Diisi dengan angka tahun prestasi diraih oleh peserta didik.');
        $this->getColumnByName('penyelenggara')->setDescription('Diisi nama penyelenggara/panitia kegiatan dari  prestasi yang diraih peserta didik.');
        $this->getColumnByName('peringkat')->setDescription('Diisi angka peringkat prestasi yang diraih oleh peserta didik.');

    }

}