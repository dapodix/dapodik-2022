<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class LayananKhususTableInfo extends base\BaseLayananKhususTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('id_jenis_lk')->setDisplayField('nm_jenis_lk');

        $this->getColumnByName('id_jenis_lk')->setHeader('Jenis Layanan Khusus');
        $this->getColumnByName('id_jenis_lk')->setColumnWidth(200);

        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('sk_lk')->setHeader('SK Layanan Khusus');
        $this->getColumnByName('sk_lk')->setColumnWidth(200);

        $this->getColumnByName('tmt_lk')->setHeader('TMT Layanan Khusus');
        $this->getColumnByName('tmt_lk')->setColumnWidth(200);

        $this->getColumnByName('tst_lk')->setHeader('TST Layanan Khusus');
        $this->getColumnByName('tst_lk')->setColumnWidth(200);

        $this->getColumnByName('ket_lk')->setHeader('Keterangan');
        $this->getColumnByName('ket_lk')->setColumnWidth(200);
    }
    
}