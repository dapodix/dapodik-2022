<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwyFungsionalTableInfo extends base\BaseRwyFungsionalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_rwy_fungsional');
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('jabatan_fungsional_id')->setColumnWidth('230');
        $this->getColumnByName('sk_jabfung')->setHeader('SK Jabfung');
        $this->getColumnByName('sk_jabfung')->setColumnWidth('120');
        $this->getColumnByName('tmt_jabatan')->setHeader('TMT Jabatan');
        $this->getColumnByName('tmt_jabatan')->setColumnWidth('120');

        $this->getColumnByName('jabatan_fungsional_id')->setDescription('Pilih jabatan fungsional PTK.');
        $this->getColumnByName('sk_jabfung')->setDescription('Diisi nomor SK jabatan fungsional PTK.');
        $this->getColumnByName('tmt_jabatan')->setDescription('Diisi TMT jabatan fungsional PTK sesuai yang tertera pada SK jabatan fungsional.');

    }
    
}