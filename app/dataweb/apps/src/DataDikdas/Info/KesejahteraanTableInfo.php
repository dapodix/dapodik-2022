<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KesejahteraanTableInfo extends base\BaseKesejahteraanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_kesejahteraan');
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('dari_tahun')->setColumnWidth(100);
        $this->getColumnByName('dari_tahun')->setInputLength(4);
        $this->getColumnByName('dari_tahun')->setMinLength(4);
        $this->getColumnByName('sampai_tahun')->setColumnWidth(120);
        $this->getColumnByName('sampai_tahun')->setInputLength(4);
        $this->getColumnByName('sampai_tahun')->setMinLength(4);
        
        $this->getColumnByName('status')->setColumnWidth(110);
        $colJk1 = $this->getColumnByName('status');
        $colJk1->setEnumValues(array("1" => "Aktif" , "0" => "Non Aktif"));

        $this->getColumnByName('jenis_kesejahteraan_id')->setDescription('Pilih jenis program kesejahteraan yang pernah diterima oleh PTK.');
        $this->getColumnByName('nama')->setDescription('Diisi nama program kesejahteraan yang pernah diterima oleh PTK.');
        $this->getColumnByName('penyelenggara')->setDescription('Diisi nama penyelenggara program kesejahteraan yang pernah diterima oleh PTK.');
        $this->getColumnByName('dari_tahun')->setDescription('Diisi tahun mulai mengikuti program kesejahteraan oleh PTK.');
        $this->getColumnByName('sampai_tahun')->setDescription('Diisi tahun selesai mengikuti program kesejahteraan oleh PTK.');
        $this->getColumnByName('status')->setDescription('Pilih status keaktifan dalam program kesejahteraan yang diterima oleh PTK.');

    }
    
}