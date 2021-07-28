<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class TunjanganTableInfo extends base\BaseTunjanganTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_tunjangan');
        
        // Override below here!
        $this->getColumnByName('nama')->setHeader('Nama Tunjangan');
        $this->getColumnByName('nominal')->setHeader('Nominal (Rp)');
        $this->getColumnByName('sk_tunjangan')->setHeader('SK Tunjangan');
        $this->getColumnByName('tgl_sk_tunjangan')->setHeader('Tgl SK Tunjangan');
        
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('dari_tahun')->setColumnWidth(100);
        $this->getColumnByName('dari_tahun')->setInputLength(4);
        $this->getColumnByName('dari_tahun')->setMinLength(4);
        $this->getColumnByName('sampai_tahun')->setColumnWidth(120);
        $this->getColumnByName('sampai_tahun')->setInputLength(4);
        $this->getColumnByName('sampai_tahun')->setMinLength(4);
        $this->getColumnByName('nominal')->setColumnWidth(150);
        $this->getColumnByName('status')->setColumnWidth(120);
        $this->getColumnByName('tgl_sk_tunjangan')->setColumnWidth(150);
        
        $colJk1 = $this->getColumnByName('status');
        $colJk1->setEnumValues(array("1" => "Masih Merima" , "0" => "Tidak Menerima"));

        $this->getColumnByName('jenis_tunjangan_id')->setDescription('Pilih jenis tunjangan yang pernah diterima PTK.');
        $this->getColumnByName('nama')->setDescription('Diisi nama tunjangan yang pernah diterima PTK.');
        $this->getColumnByName('instansi')->setDescription('Diisi nama instansi yang memberikan tunjangan pada PTK.');
        $this->getColumnByName('sumber_dana')->setDescription('Diisi nama sumber dana tunjangan yang diterima PTK.');
        $this->getColumnByName('dari_tahun')->setDescription('Diisi tahun mulai diterimanya tunjangan oleh PTK.');
        $this->getColumnByName('sampai_tahun')->setDescription('Diisi tahun selesai diterimanya tunjangan oleh PTK.');
        $this->getColumnByName('nominal')->setDescription('Diisi jumlah dana tunjangan yang diterima oleh PTK dalam rupiah.');
        $this->getColumnByName('status')->setDescription('Pilih status tunjangan yang diterima oleh PTK sekarang , apakah masih menerima atau tidak.');

    }
    
}