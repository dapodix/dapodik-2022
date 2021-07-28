<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class TanahLongitudinalTableInfo extends base\BaseTanahLongitudinalTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('njop')->setHeader('NJOP');
        $this->getColumnByName('njop')->setLabel('NJOP');

        $this->getColumnByName('njop')->setMax(999999999999999999);
        $this->getColumnByName('njop')->setLabel('NJOP (Rp)');

        $this->getColumnByName('njop')->setDescription('Diisikan dengan Nilai Jual Objek Pajak (NJOP)');
    }
    
}