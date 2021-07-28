<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BiblioTableInfo extends base\BaseBiblioTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.BiblioTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->setDisplayField('title');
        
        $this->getColumnByName('id_publisher')->setColumnWidth('250');
        $this->getColumnByName('id_publisher')->setHeader('Penerbit');
        $this->getColumnByName('id_gmd')->setColumnWidth('100');
        $this->getColumnByName('id_gmd')->setHeader('Jenis');
        $this->getColumnByName('title')->setColumnWidth('700');
        $this->getColumnByName('title')->setHeader('Judul');

        $this->getColumnByName('id_freq')->setXtype('hidden');
        $this->getColumnByName('id_freq')->setHideColumn(1);
        $this->getColumnByName('negara_id')->setXtype('hidden');
        $this->getColumnByName('negara_id')->setHideColumn(1);
        $this->getColumnByName('id_classification')->setXtype('hidden');
        $this->getColumnByName('id_classification')->setHideColumn(1);
        $this->getColumnByName('sor')->setXtype('hidden');
        $this->getColumnByName('sor')->setHideColumn(1);
        $this->getColumnByName('edition')->setXtype('hidden');
        $this->getColumnByName('edition')->setHideColumn(1);
        $this->getColumnByName('isbn_issn')->setXtype('hidden');
        $this->getColumnByName('isbn_issn')->setHideColumn(1);
        $this->getColumnByName('collations')->setXtype('hidden');
        $this->getColumnByName('collations')->setHideColumn(1);
        $this->getColumnByName('publisher')->setXtype('hidden');
        $this->getColumnByName('publisher')->setHideColumn(1);
        $this->getColumnByName('publish_year')->setXtype('hidden');
        $this->getColumnByName('publish_year')->setHideColumn(1);
        $this->getColumnByName('series_title')->setXtype('hidden');
        $this->getColumnByName('series_title')->setHideColumn(1);
        $this->getColumnByName('call_number')->setXtype('hidden');
        $this->getColumnByName('call_number')->setHideColumn(1);
        $this->getColumnByName('source')->setXtype('hidden');
        $this->getColumnByName('source')->setHideColumn(1);
        $this->getColumnByName('publish_place')->setXtype('hidden');
        $this->getColumnByName('publish_place')->setHideColumn(1);
        $this->getColumnByName('notes')->setXtype('hidden');
        $this->getColumnByName('notes')->setHideColumn(1);
        $this->getColumnByName('image')->setXtype('hidden');
        $this->getColumnByName('image')->setHideColumn(1);
        $this->getColumnByName('file_att')->setXtype('hidden');
        $this->getColumnByName('file_att')->setHideColumn(1);
        $this->getColumnByName('opac_hide')->setXtype('hidden');
        $this->getColumnByName('opac_hide')->setHideColumn(1);
        $this->getColumnByName('promoted')->setXtype('hidden');
        $this->getColumnByName('promoted')->setHideColumn(1);
        $this->getColumnByName('labels')->setXtype('hidden');
        $this->getColumnByName('labels')->setHideColumn(1);
        $this->getColumnByName('paper_printing_spec')->setXtype('hidden');
        $this->getColumnByName('paper_printing_spec')->setHideColumn(1);
        $this->getColumnByName('expired_date')->setXtype('hidden');
        $this->getColumnByName('expired_date')->setHideColumn(1);
    }
    
}