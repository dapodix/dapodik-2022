<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class UnitUsahaKerjasamaTableInfo extends base\BaseUnitUsahaKerjasamaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        // $this->setIsCompositePk(0);
        // $this->setPkName('unit_usaha_id');

        $this->setDisplayField('judul_mou');

        $this->getColumnByName('mou_id')->setHideColumn(1);
        $this->getColumnByName('mou_id')->setHeader('MoU');
        
        $this->getColumnByName('unit_usaha_id')->setHideColumn(0);
        $this->getColumnByName('unit_usaha_id')->setHeader('Unit Produksi');
        $this->getColumnByName('unit_usaha_id')->setXtype('unitusahacombo');
        $this->getColumnByName('unit_usaha_id')->setLabel('Bidang Usaha');

        $this->getColumnByName('produk_barang_dihasilkan')->setColumnWidth(200);

        $this->getColumnByName('jasa_produksi_dihasilkan')->setColumnWidth(200);

        $this->getColumnByName('omzet_barang_perbulan')->setXtype('numberfield');

        $this->getColumnByName('omzet_jasa_perbulan')->setXtype('numberfield');

        $this->getColumnByName('prestasi_penghargaan')->setColumnWidth(150);

        $this->getColumnByName('pangsa_pasar_produk')->setColumnWidth(150);

        $this->getColumnByName('pangsa_pasar_jasa')->setColumnWidth(150);
    }
    
}