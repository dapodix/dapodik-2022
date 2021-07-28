<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BlockgrantTableInfo extends base\BaseBlockgrantTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('besar_bantuan')->setColumnWidth(170);
        $this->getColumnByName('dana_pendamping')->setColumnWidth(170);
        $this->getColumnByName('sumber_dana_id')->setColumnWidth(200);
        $this->getColumnByName('tahun')->setColumnWidth(110);
        $this->getColumnByName('tahun')->setInputLength(4);
        $this->getColumnByName('tahun')->setMinLength(0);
        $this->getColumnByName('tahun')->setMin(2000);
        
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('asal_data')->setHideColumn(1);

        $this->getColumnByName('nama')->setDescription('Nama dana bantuan yang diterima oleh sekolah.');
        $this->getColumnByName('tahun')->setDescription('Tahun dana bantuan tersebut diterima oleh sekolah.');
        $this->getColumnByName('jenis_bantuan_id')->setDescription('Jenis bantuan tersebut yang diterima oleh sekolah.');
        $this->getColumnByName('sumber_dana_id')->setDescription('Sumber dana bantuan tersebut yang diterima oleh sekolah.');
        $this->getColumnByName('besar_bantuan')->setDescription('Besarnya dana bantuan tersebut yang diterima oleh sekolah.');
        $this->getColumnByName('dana_pendamping')->setDescription('Besarnya dana pendamping (buffer) yang diterima oleh sekolah.');
        $this->getColumnByName('peruntukan_dana')->setDescription('Peruntukan penggunaan dana bantuan yang diterima oleh sekolah.');

    }
    
}