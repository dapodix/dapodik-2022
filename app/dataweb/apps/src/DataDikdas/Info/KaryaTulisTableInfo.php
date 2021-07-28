<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KaryaTulisTableInfo extends base\BaseKaryaTulisTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_karya_tulis');        
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('tahun_pembuatan')->setColumnWidth('130');
        $this->getColumnByName('tahun_pembuatan')->setHeader('Thn Pembuatan');
        $this->getColumnByName('tahun_pembuatan')->setInputLength(4);
        $this->getColumnByName('tahun_pembuatan')->setMinLength(4);
        
        $this->getColumnByName('keterangan')->setColumnWidth('200');

        $this->getColumnByName('ptk_id')->setDescription('Diisi judul karya tulis yang pernah dibuat oleh PTK. Skripsi dan Tesis pun termasuk Karya Tulis');
        $this->getColumnByName('tahun_pembuatan')->setDescription('Diisi tahun dipublikasikannya karya tulis yang pernah dibuat oleh PTK.');
        $this->getColumnByName('publikasi')->setDescription('Diisi tempat dipublikasikannya karya tulis yang pernah dibuat oleh PTK. Untuk Skripsi dan Tesis diisi dengan nama universitas');
        $this->getColumnByName('keterangan')->setDescription('Diisi keterangan terkait karya tulis yang pernah dibuat oleh PTK (jika diperlukan).');

    }
    
}