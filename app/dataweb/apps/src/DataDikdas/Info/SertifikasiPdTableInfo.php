<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class SertifikasiPdTableInfo extends base\BaseSertifikasiPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        $this->getColumnByName('id_jenis_sertifikasi')->setColumnWidth('200');
        $this->getColumnByName('bidang_studi_id')->setColumnWidth('200');
        $this->getColumnByName('no_sert_pd')->setHeader('No Sertifikat');
        $this->getColumnByName('tgl_sert_pd')->setHeader('Tgl Sertifikat');
        $this->getColumnByName('tgl_sert_pd')->setColumnWidth('150');
        $this->getColumnByName('tgl_exp_sert_pd')->setHeader('Tgl Habis Masa Berlaku');
        $this->getColumnByName('tgl_exp_sert_pd')->setColumnWidth('170');
        $this->getColumnByName('no_peserta_sert_pd')->setHeader('No Peserta Sertifikasi');
        $this->getColumnByName('no_peserta_sert_pd')->setColumnWidth('250');
    }
    
}