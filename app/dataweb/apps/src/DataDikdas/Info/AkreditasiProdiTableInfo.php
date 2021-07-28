<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AkreditasiProdiTableInfo extends base\BaseAkreditasiProdiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('jurusan_sp_id')->setHideColumn(1);
        $this->getColumnByName('jurusan_sp_id')->setXtype('hidden');

        $this->getColumnByName('akreditasi_id')->setDisabled(true);

        $this->getColumnByName('la_id')->setHeader('Lembaga Akreditasi');

        $this->getColumnByName('no_sk_akred')->setLabel('No SK Akreditasi');
        $this->getColumnByName('no_sk_akred')->setHeader('No SK Akreditasi');
        $this->getColumnByName('no_sk_akred')->setDisabled(true);

        $this->getColumnByName('tgl_sk_akred')->setLabel('Tanggal SK Akreditasi');
        $this->getColumnByName('tgl_sk_akred')->setHeader('Tanggal SK Akreditasi');
        $this->getColumnByName('tgl_sk_akred')->setHeader('Tanggal SK Akreditasi');
        $this->getColumnByName('tgl_sk_akred')->setDisabled(true);
        $this->getColumnByName('tgl_sk_akred')->setColumnWidth(200);

        $this->getColumnByName('la_id')->setLabel('Lembaga Akreditasi');
        $this->getColumnByName('la_id')->setDisabled(true);

        $this->getColumnByName('tgl_akhir_akred')->setLabel('Tanggal Akhir Akreditasi');
        $this->getColumnByName('tgl_akhir_akred')->setHeader('Tanggal Akhir Akreditasi');
        $this->getColumnByName('tgl_akhir_akred')->setDisabled(true);
        $this->getColumnByName('tgl_akhir_akred')->setColumnWidth(200);
    }

}
