<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AnggotaAktPdTableInfo extends base\BaseAnggotaAktPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!

        $this->getColumnByName('id_akt_pd')->setHideColumn(1);
        $this->getColumnByName('registrasi_id')->setHideColumn(1);
        $this->getColumnByName('nm_pd')->setHeader('Nama');
        $this->getColumnByName('nipd')->setHeader('NIS/NIPD');
        $this->getColumnByName('jns_peran_pd')->setHeader('Peran');
        $this->getColumnByName('jns_peran_pd')->setHideColumn(1);
    }
    
}