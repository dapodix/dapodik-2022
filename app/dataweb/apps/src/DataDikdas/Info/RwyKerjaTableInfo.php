<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwyKerjaTableInfo extends base\BaseRwyKerjaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);

        $this->setTableValidation("vld_rwy_kerja");

        $this->getColumnByName('no_sk_kerja')->setHeader("No SK Pengangkatan");
        $this->getColumnByName('lembaga_pengangkat')->setColumnWidth(200);
        $this->getColumnByName('no_sk_kerja')->setColumnWidth(200);
        $this->getColumnByName('tempat_kerja')->setColumnWidth(200);
        $this->getColumnByName('ttd_sk_kerja')->setColumnWidth(200);
        $this->getColumnByName('mapel_diajarkan')->setColumnWidth(200);

        $this->getColumnByName('jenis_ptk_id')->setHeader('Jenis PTK');
        $this->getColumnByName('no_sk_kerja')->setHeader('No SK Kerja');
        $this->getColumnByName('tgl_sk_kerja')->setHeader('Tgl SK Kerja');
        $this->getColumnByName('tmt_kerja')->setHeader('TMT Kerja');
        $this->getColumnByName('tst_kerja')->setHeader('TST Kerja');
        $this->getColumnByName('ttd_sk_kerja')->setHeader('TTD SK Kerja');
    }

}