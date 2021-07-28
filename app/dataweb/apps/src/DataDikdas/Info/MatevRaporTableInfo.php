<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class MatevRaporTableInfo extends base\BaseMatevRaporTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        // $this->moveColumnBelow($this->getColumnByName('nm_mata_evaluasi'), $this->getColumnByName('no_urut'));

        $this->getColumnByName('no_urut')->setColumnWidth('80');
        $this->getColumnByName('no_urut')->setXtype('numberfield');
        $this->getColumnByName('no_urut')->setMinLength(1);
        $this->getColumnByName('no_urut')->setInputLength(3);
        $this->getColumnByName('no_urut')->setMax(50);

        $this->getColumnByName('rombongan_belajar_id')->setXtype('hidden');
        $this->getColumnByName('pembelajaran_id')->setXtype('hidden');

        $this->getColumnByName('rombongan_belajar_id')->setHideColumn(1);
        $this->getColumnByName('pembelajaran_id')->setHideColumn(1);
        $this->getColumnByName('a_dari_template')->setHideColumn(1);
        $this->getColumnByName('mata_pelajaran_id')->setHideColumn(1);
        $this->getColumnByName('mata_pelajaran_id')->setXtype('hidden');
        $this->getColumnByName('a_dari_template')->setXtype('hidden');

        $this->getColumnByName('nm_mata_evaluasi')->setHeader('Nama Mata Evaluasi');
        $this->getColumnByName('nm_mata_evaluasi')->setLabel('Nama mata evaluasi');
        $this->getColumnByName('kkm_kognitif')->setHeader('KKM Pengetahuan');
        $this->getColumnByName('kkm_kognitif')->setLabel('KKM Pengetahuan');
        $this->getColumnByName('kkm_psikomotorik')->setHeader('KKM Keterampilan');
        $this->getColumnByName('kkm_psikomotorik')->setLabel('KKM Keterampilan');

        $this->getColumnByName('mata_pelajaran_id')->setColumnWidth('200');
        $this->getColumnByName('nm_mata_evaluasi')->setColumnWidth('200');
        $this->getColumnByName('kkm_kognitif')->setColumnWidth('130');
        $this->getColumnByName('kkm_psikomotorik')->setColumnWidth('130');

        $this->getColumnByName('kkm_kognitif')->setXtype('numberfield');
        $this->getColumnByName('kkm_psikomotorik')->setXtype('numberfield');
        $this->getColumnByName('kkm_kognitif')->setMinLength(1);
        $this->getColumnByName('kkm_psikomotorik')->setMinLength(1);
        $this->getColumnByName('kkm_kognitif')->setInputLength(3);
        $this->getColumnByName('kkm_psikomotorik')->setInputLength(3);
        $this->getColumnByName('kkm_kognitif')->setMax(100);
        $this->getColumnByName('kkm_psikomotorik')->setMax(100);

        // $this->setGroupField('a_dari_template');

        // $this->getColumnByName('mata_pelajaran_id')->setDescription('Diisi nama mata pelajaran untuk dijadikan mata evaluasi e-rapor pada rombongan belajar tersebut.');
        // $this->getColumnByName('nm_mata_evaluasi')->setDescription('Diisi nama mata evaluasi untuk dijadikan acuan e-rapor pada rombongan belajar tersebut.');
        $this->getColumnByName('nm_mata_evaluasi')->setDescription('Diketik sesuai dengan nama mata pelajaran dalam pembelajaran');
        $this->getColumnByName('a_dari_template')->setDescription('Menyalin data mata evaluasi rapor yang telah dibuat pada rombel yang telah dibuat');
        $this->getColumnByName('no_urut')->setDescription('Diisi sesuai urutan dalam format rapor');
        $this->getColumnByName('kkm_kognitif')->setDescription('Diisi dari KKM Kognitif (Pengetahuan) yang telah ditentukan dalam Silabus Sekolah ');
        $this->getColumnByName('kkm_psikomotorik')->setDescription('Diisi dari KKM psikomotorik (Keterampilan) yang telah ditentukan dalam Silabus Sekolah ');
        $this->getColumnByName('rombongan_belajar_id')->setDescription('rombongan belajar dari rombel yang sudah dibuat');
        $this->getColumnByName('mata_pelajaran_id')->setDescription('mata pelajaran sesuai dengan daftar mata pelajaran yang telah diisi dipembelajaran');
        $this->getColumnByName('pembelajaran_id')->setDescription('Dipilih dari mata pelajaran yang telah diinput di pembelajaran');

    }

}