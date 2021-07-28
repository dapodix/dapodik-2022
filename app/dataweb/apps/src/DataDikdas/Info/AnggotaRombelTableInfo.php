<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AnggotaRombelTableInfo extends base\BaseAnggotaRombelTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('rombongan_belajar_id')->setHeader('Rombel');
        $this->setInfoBeforeDelete('Mohon berhati-hati apabila ingin menghapus anggota rombel, karena akan menyebabkan rombel tsb terkunci pada Kuncian Rombel GTK. Yang akan menyebabkan seluruh guru pada rombel tsb tidak akan diproses jam mengajarnya. Apakah anda yakin ingin menghapus rombel tsb?');

    }

}