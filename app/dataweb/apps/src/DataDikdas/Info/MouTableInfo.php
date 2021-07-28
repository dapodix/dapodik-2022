<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class MouTableInfo extends base\BaseMouTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_mou');

        // Override below here!
        $this->setDisplayField('judul_mou');
        $this->setBelongsTo(array('Sekolah'));

        $this->moveColumnBelow($this->getColumnByName('nama_dudi'), $this->getColumnByName('dudi_id'));

        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('dudi_id')->setHeader('Dunia Usaha & Industri');
        $this->getColumnByName('dudi_id')->setColumnWidth(200);
        $this->getColumnByName('nomor_mou')->setHeader('Nomor PKS');
        $this->getColumnByName('nomor_mou')->setColumnWidth(130);
        $this->getColumnByName('judul_mou')->setHeader('Judul PKS');
        $this->getColumnByName('judul_mou')->setColumnWidth(200);
        $this->getColumnByName('tanggal_mulai')->setHeader('Tgl Mulai');
        $this->getColumnByName('tanggal_mulai')->setColumnWidth(100);
        $this->getColumnByName('tanggal_selesai')->setHeader('Tgl Selesai');
        $this->getColumnByName('tanggal_selesai')->setColumnWidth(100);
        $this->getColumnByName('nama_dudi')->setHeader('Nama DUDI');
        $this->getColumnByName('npwp_dudi')->setHeader('NPWP DUDI');
        $this->getColumnByName('nama_bidang_usaha')->setHideColumn(0);
        $this->getColumnByName('telp_cp')->setHeader('Telepon CP');
        $this->getColumnByName('jabatan_cp')->setHeader('Jabatan CP');

        $this->getColumnByName('id_jns_ks')->setLabel('Jenis Kerjasama');
        $this->getColumnByName('id_jns_ks')->setHeader('Jenis Kerjasama');
    }

}