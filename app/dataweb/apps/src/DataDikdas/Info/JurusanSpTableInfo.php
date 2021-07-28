<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class JurusanSpTableInfo extends base\BaseJurusanSpTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.JurusanSpTableInfo';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_jurusan_sp');

        // Override below here!
        $this->setHeader('Program Pengajaran/Kompetensi Keahlian Dilayani');
        $this->setDisplayField('nama_jurusan_sp');
        $this->setIsBigRef(1);

        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('nama_jurusan_sp')->setHeader('Nama Jurusan Satuan Pendidikan');
        $this->getColumnByName('nama_jurusan_sp')->setHideColumn(0);
        $this->getColumnByName('nama_jurusan_sp')->setLabelWidth('40%');
        $this->getColumnByName('jurusan_id')->setColumnWidth(300);
        $this->getColumnByName('jurusan_id')->setHideColumn(1);
        //$this->getColumnByName('jurusan_id')->setDisabled(true);
        $this->getColumnByName('jurusan_id')->setXtype('hidden');
        $this->getColumnByName('sk_izin')->setHeader('No. SK Izin');
        $this->getColumnByName('sk_izin')->setLabel('SK Izin');
        $this->getColumnByName('sk_izin')->setHideColumn(1);
        $this->getColumnByName('sk_izin')->setLabelWidth('40%');
        //$this->getColumnByName('sk_izin')->setXtype('hidden');
        $this->getColumnByName('tanggal_sk_izin')->setHeader('Tgl. SK Izin');
        $this->getColumnByName('tanggal_sk_izin')->setLabel('Tanggal SK Izin');
        $this->getColumnByName('tanggal_sk_izin')->setHideColumn(1);
        $this->getColumnByName('tanggal_sk_izin')->setLabelWidth('40%');

        $this->getColumnByName('kebutuhan_khusus_id')->setHideColumn(1);
        $this->getColumnByName('kebutuhan_khusus_id')->setXtype('hidden');

        $this->getColumnByName('nama_jurusan_sp')->setDescription('Untuk SMA diisi dengan Program Pengajaran Dilayani. Untuk SMK diisi dengan Kompetensi Keahlian Dilayani.');
    }

}