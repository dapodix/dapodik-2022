<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class RwySertifikasiTableInfo extends base\BaseRwySertifikasiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_rwy_sertifikasi');
        
        // Override below here!
        // $this->moveColumnBelow($this->getColumnByName('tahun_sertifikasi'), $this->getColumnByName('nomor_sertifikat'));
        // $this->moveColumnBelow($this->getColumnByName('bidang_studi_id'), $this->getColumnByName('tahun_sertifikasi'));
        
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        
        $this->getColumnByName('bidang_studi_id')->setColumnWidth(150);
        
        $this->getColumnByName('id_jenis_sertifikasi')->setHeader('Jenis Sertifikasi');

        $this->getColumnByName('kode_lemb_sert')->setHeader('Kode Lembaga Sertifikasi');
        $this->getColumnByName('kode_lemb_sert')->setColumnWidth(200);

        $this->getColumnByName('bidang_studi_id')->setColumnWidth(200);
        $this->getColumnByName('id_jenis_sertifikasi')->setColumnWidth(200);

        $this->getColumnByName('tgl_sert')->setHeader('Tgl Mulai Berlaku');
        $this->getColumnByName('tgl_sert')->setColumnWidth(150);
        $this->getColumnByName('tgl_exp_sert')->setHeader('Tgl Habis Berlaku');
        $this->getColumnByName('tgl_exp_sert')->setColumnWidth(150);
        $this->getColumnByName('nomor_sertifikat')->setColumnWidth(200);
        $this->getColumnByName('nomer_registrasi')->setColumnWidth(200);
        
        // $this->getColumnByName('tahun_sertifikasi')->setHeader('Thn Sertifikasi');
        // $this->getColumnByName('tahun_sertifikasi')->setColumnWidth(150);
        // $this->getColumnByName('tahun_sertifikasi')->setInputLength(4);
        // $this->getColumnByName('tahun_sertifikasi')->setMinLength(4);
        
        // $this->getColumnByName('nrg')->setXtype('numberfield');
        // $this->getColumnByName('nrg')->setHeader('NRG');
        // $this->getColumnByName('nrg')->setInputLength(14);
        // $this->getColumnByName('nrg')->setValidationType('numberonly');
        // $this->getColumnByName('tahun_sertifikasi')->setColumnWidth(120);

        // $this->getColumnByName('nomor_peserta')->setXtype('numberfield');
        $this->getColumnByName('nomor_peserta')->setColumnWidth(160);
        $this->getColumnByName('nomor_peserta')->setValidationType('numberonly');

        $this->getColumnByName('bidang_studi_id')->setDescription('Pilih bidang studi sertiikasi PTK.');
        $this->getColumnByName('id_jenis_sertifikasi')->setDescription('Pilih jenis sertifikasi yang diterima oleh PTK.');
        // $this->getColumnByName('tahun_sertifikasi')->setDescription('Diisi tahun lulus sertifikasi PTK.');
        $this->getColumnByName('nomor_sertifikat')->setDescription('Diisi nomor sertifikat sertifikasi yang diterima oleh PTK.');
        // $this->getColumnByName('nrg')->setDescription('Diisi Nomor Registrasi Guru PTK.');
        $this->getColumnByName('nomor_peserta')->setDescription('Diisi nomor peserta sertifikasi PTK.');

    }
    
}