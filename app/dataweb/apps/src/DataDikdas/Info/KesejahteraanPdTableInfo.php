<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class KesejahteraanPdTableInfo extends base\BaseKesejahteraanPdTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->getColumnByName('peserta_didik_id')->setHideColumn(1);

        $this->getColumnByName('dari_tahun')->setXtype('textfield');
        $this->getColumnByName('dari_tahun')->setHeader('Tahun Mulai');
        $this->getColumnByName('dari_tahun')->setValidationType('numberonly');
        $this->getColumnByName('dari_tahun')->setColumnWidth('110');
        $this->getColumnByName('dari_tahun')->setInputLength(4);
        $this->getColumnByName('dari_tahun')->setMinLength(4);

        $this->getColumnByName('sampai_tahun')->setXtype('textfield');
        $this->getColumnByName('sampai_tahun')->setHeader('Tahun Selesai');
        $this->getColumnByName('sampai_tahun')->setValidationType('numberonly');
        $this->getColumnByName('sampai_tahun')->setColumnWidth('110');
        $this->getColumnByName('sampai_tahun')->setInputLength(4);
        $this->getColumnByName('sampai_tahun')->setMinLength(4);

        $this->getColumnByName('nomor')->setHeader('No Kartu');
        $this->getColumnByName('nm_di_kartu')->setHeader('Nama Di Kartu');

        $this->getColumnByName('jenis_kesejahteraan_id')->setDescription('Pilih jenis bantuan');
        $this->getColumnByName('nomor')->setDescription('Nomor dikartu');
        $this->getColumnByName('nm_di_kartu')->setDescription('Nama dikartu');
        $this->getColumnByName('dari_tahun')->setDescription('Tahun menerima');
        $this->getColumnByName('sampai_tahun')->setDescription('Tahun berakhir meneri');
    }

}