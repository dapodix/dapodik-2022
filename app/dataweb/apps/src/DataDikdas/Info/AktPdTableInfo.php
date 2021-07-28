<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AktPdTableInfo extends base\BaseAktPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
    
        $this->getColumnByName('mou_id')->setHideColumn(1);

        $this->getColumnByName('id_jns_akt_pd')->setHeader('Jenis Aktivitas PD');
        $this->getColumnByName('id_jns_akt_pd')->setColumnWidth(200);

        $this->getColumnByName('judul_akt_pd')->setHeader('Judul');
        $this->getColumnByName('judul_akt_pd')->setColumnWidth(200);

        $this->getColumnByName('sk_tugas')->setHeader('SK Tugas');

        $this->getColumnByName('tgl_sk_tugas')->setHeader('Tanggal SK Tugas');
        $this->getColumnByName('tgl_sk_tugas')->setColumnWidth(150);
        
        $this->getColumnByName('ket_akt')->setHeader('Keterangan');
        $this->getColumnByName('ket_akt')->setColumnWidth(300);

        $this->getColumnByName('a_komunal')->setHideColumn(1);
    }
    
}