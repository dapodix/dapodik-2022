<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BukuPtkTableInfo extends base\BaseBukuPtkTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        $this->setTableValidation('vld_buku_ptk');

        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('tahun')->setColumnWidth('80');
        $this->getColumnByName('tahun')->setInputLength(4);
        $this->getColumnByName('tahun')->setMinLength(4);
        $this->getColumnByName('judul_buku')->setColumnWidth('200');
        $this->getColumnByName('isbn')->setHeader('ISBN');

        $this->getColumnByName('judul_buku')->setDescription('Diisi judul buku yang pernah ditulis oleh PTK.');
        $this->getColumnByName('tahun')->setDescription('Diisi tahun terbit buku yang ditulis oleh PTK.');
        $this->getColumnByName('penerbit')->setDescription('Diisi nama penerbit yang telah mempublikasikan buku yang ditulis oleh PTK.');

    }
    
}