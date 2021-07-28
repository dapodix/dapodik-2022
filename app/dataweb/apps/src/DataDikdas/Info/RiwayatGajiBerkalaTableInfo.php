<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RiwayatGajiBerkalaTableInfo extends base\BaseRiwayatGajiBerkalaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('nomor_sk')->setHeader('Nomor SK');
        
        $this->getColumnByName('tanggal_sk')->setColumnWidth(120);
        $this->getColumnByName('tanggal_sk')->setHeader('Tanggal SK');
        
        $this->getColumnByName('tmt_kgb')->setHeader('TMT KGB');
        $this->getColumnByName('tmt_kgb')->setColumnWidth(120);
        
        $this->getColumnByName('masa_kerja_tahun')->setHeader('Masa Kerja Thn');
        $this->getColumnByName('masa_kerja_tahun')->setColumnWidth(150);
        $this->getColumnByName('masa_kerja_tahun')->setInputLength(2);
        
        $this->getColumnByName('masa_kerja_bulan')->setHeader('Masa Kerja Bln');
        $this->getColumnByName('masa_kerja_bulan')->setColumnWidth(150);
        $this->getColumnByName('masa_kerja_bulan')->setInputLength(2);
        
        $this->getColumnByName('gaji_pokok')->setColumnWidth(150);

        $this->getColumnByName('pangkat_golongan_id')->setDescription('Pilih pangkat golongan PTK sesuai yang tertera di SK gaji berkala.');
        $this->getColumnByName('nomor_sk')->setDescription('Diisi nomor SK gaji berkala.');
        $this->getColumnByName('tanggal_sk')->setDescription('Diisi tanggal diterbitkannya SK gaji berkala.');
        $this->getColumnByName('tmt_kgb')->setDescription('Diisi tanggal mulai berlakunya gaji baru sesuai SK gaji berkala.');
        $this->getColumnByName('masa_kerja_tahun')->setDescription('Diisi jumlah tahun masa kerja sesuai yang tertera pada SK gaji berkala.');
        $this->getColumnByName('masa_kerja_bulan')->setDescription('Diisi jumlah bulan masa kerja  sesuai yang tertera pada SK gaji berkala.');
        $this->getColumnByName('gaji_pokok')->setDescription('Diisi jumlah gaji pokok baru sesuai yang tertera pada SK gaji berkala.');

    }
    
}