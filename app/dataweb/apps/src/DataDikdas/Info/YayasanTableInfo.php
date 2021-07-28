<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class YayasanTableInfo extends base\BaseYayasanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_yayasan');
        
        // Override below here!
        $this->getColumnByName('nama')->setHeader('Nama Yayasan');
        $this->getColumnByName('nama')->setColumnWidth('150');
        
        // $this->getColumnByName('alamat_jalan_yayasan')->setHeader('Alamat Yayasan');
        // $this->getColumnByName('alamat_jalan_yayasan')->setColumnWidth('200');
        
        $this->getColumnByName('kode_wilayah')->setHeader('Kecamatan');
        $this->getColumnByName('kode_wilayah')->setColumnWidth('300');
        
        $this->getColumnByName('no_pendirian_yayasan')->setHeader('No Pendirian Yayasan');
        $this->getColumnByName('no_pendirian_yayasan')->setColumnWidth('150');
        
        $this->getColumnByName('tanggal_pendirian_yayasan')->setHeader('Tgl Pendirian Yayasan');
        $this->getColumnByName('tanggal_pendirian_yayasan')->setColumnWidth('150');

        $this->getColumnByName('rt')->setColumnWidth('50');
        $this->getColumnByName('rt')->setHeader('RT');
        $this->getColumnByName('rw')->setHeader('RW');
        $this->getColumnByName('rw')->setColumnWidth('50');

        $this->getColumnByName('npyp')->setHideColumn(1);

        $this->getColumnByName('lintang')->setColumnWidth(120);
        $this->getColumnByName('lintang')->setXtype('numberfield');
        $this->getColumnByName('lintang')->setDecimalPrecision(16);
        $this->getColumnByName('bujur')->setColumnWidth(120);
        $this->getColumnByName('bujur')->setXtype('numberfield');
        $this->getColumnByName('bujur')->setDecimalPrecision(16);

        $this->getColumnByName('nomor_pengesahan_pn_ln')->setHeader('No. Pengesahan PN LN');
        $this->getColumnByName('nomor_pengesahan_pn_ln')->setColumnWidth(180);

        $this->getColumnByName('nomor_sk_bn')->setHeader('No. SK BN');
        $this->getColumnByName('nomor_sk_bn')->setColumnWidth(150);

        $this->getColumnByName('tanggal_sk_bn')->setHeader('Tgl SK BN');
        $this->getColumnByName('tanggal_sk_bn')->setColumnWidth(150);

        $this->getColumnByName('nama')->setDescription('Diisi nama yayasan.');
        $this->getColumnByName('nama_pimpinan_yayasan')->setDescription('Diisi nama pimpinan yang memimpin pada yayasan.');
        // $this->getColumnByName('alamat_jalan_yayasan')->setDescription('Diisi alamat lengkap yayasan.');
        $this->getColumnByName('desa_kelurahan')->setDescription('Diisi alamat desa/kelurahan yayasan.');
        $this->getColumnByName('kode_wilayah')->setDescription('Diisi dengan kecamatan yang sesuai. Ketikkan nama kecamatan untuk memfilter referensi kecamatan, lalu akan muncul nama kecamatan dan kabupatennya. Pilih kecamatan yang dimaksud');
        $this->getColumnByName('no_pendirian_yayasan')->setDescription('Diisi dengan nomor surat pendirian yayasan.');
        $this->getColumnByName('tanggal_pendirian_yayasan')->setDescription('Diisi dengan tanggal terbitnya nomor surat pendirian yayasan.');

    }
    
}