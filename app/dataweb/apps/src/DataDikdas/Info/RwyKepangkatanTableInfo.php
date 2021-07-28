<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwyKepangkatanTableInfo extends base\BaseRwyKepangkatanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_rwy_kepangkatan');
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('nomor_sk')->setHeader('Nomor SK');
        
        $this->getColumnByName('tanggal_sk')->setHeader('Tanggal SK');
        $this->getColumnByName('tanggal_sk')->setColumnWidth(120);
        
        $this->getColumnByName('tmt_pangkat')->setHeader('TMT Pangkat');
        $this->getColumnByName('tmt_pangkat')->setColumnWidth(120);
        
        $this->getColumnByName('masa_kerja_gol_tahun')->setHeader('Masa Kerja Thn');
        $this->getColumnByName('masa_kerja_gol_tahun')->setColumnWidth(150);
        $this->getColumnByName('masa_kerja_gol_tahun')->setInputLength(2);
        
        $this->getColumnByName('masa_kerja_gol_bulan')->setHeader('Masa Kerja Bln');
        $this->getColumnByName('masa_kerja_gol_bulan')->setColumnWidth(150);
        $this->getColumnByName('masa_kerja_gol_bulan')->setInputLength(2);

        $this->getColumnByName('pangkat_golongan_id')->setDescription('Pilih pangkat golongan PTK.');
        $this->getColumnByName('nomor_sk')->setDescription('Diisi nomor SK kenaikan pangkat PTK.');
        $this->getColumnByName('tanggal_sk')->setDescription('Diisi tanggal ditetapkannya SK kenaikan pangkat PTK.');
        $this->getColumnByName('tmt_pangkat')->setDescription('Diisi TMT pangkat sesuai yang tertera pada SK kenaikan pangkat PTK.');
        $this->getColumnByName('masa_kerja_gol_tahun')->setDescription('Diisi jumlah tahun masa kerja sesuai yang tertera pada SK kenaikan pangkat PTK.');
        $this->getColumnByName('masa_kerja_gol_bulan')->setDescription('Diisi jumlah bulan masa kerja sesuai yang tertera pada SK kenaikan pangkat PTK.');

    }
    
}