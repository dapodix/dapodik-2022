<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class InpassingTableInfo extends base\BaseInpassingTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_inpassing');
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('no_sk_inpassing')->setHeader('No SK Inpassing');

        $this->getColumnByName('tgl_sk_inpassing')->setHeader('Tgl SK Inpassing');
        $this->getColumnByName('tgl_sk_inpassing')->setColumnWidth(150);
        
        $this->getColumnByName('tmt_inpassing')->setColumnWidth(160);
        $this->getColumnByName('tmt_inpassing')->setHeader('TMT Inpassing');
        
        $this->getColumnByName('angka_kredit')->setColumnWidth(150);
        $this->getColumnByName('angka_kredit')->setMinLength(3);
        
        $this->getColumnByName('masa_kerja_tahun')->setHeader('Masa Kerja Thn');
        $this->getColumnByName('masa_kerja_tahun')->setColumnWidth(150);
        
        $this->getColumnByName('masa_kerja_bulan')->setHeader('Masa Kerja Bln');
        $this->getColumnByName('masa_kerja_bulan')->setColumnWidth(150);

        $this->getColumnByName('pangkat_golongan_id')->setDescription('Pilih pangkat golongan penyetaraan pada inpassing yang diterima PTK.');
        $this->getColumnByName('no_sk_inpassing')->setDescription('Diisi nomor SK inpassing yang diterima PTK.');
        $this->getColumnByName('tmt_inpassing')->setDescription('Diisi tanggal mulai bertugasnya PTK dalam pangkat golongan sesuai SK inpassing.');
        $this->getColumnByName('angka_kredit')->setDescription('Diisi angka kredit PTK sesuai yang tertera pada SK inpassing.');
        $this->getColumnByName('masa_kerja_tahun')->setDescription('Diisi jumlah tahun masa kerja PTK sesuai yang tertera pada SK inpassing');
        $this->getColumnByName('masa_kerja_bulan')->setDescription('Diisi jumlah bulan masa kerja PTK sesuai yang tertera pada SK inpassing.');

    }
    
}