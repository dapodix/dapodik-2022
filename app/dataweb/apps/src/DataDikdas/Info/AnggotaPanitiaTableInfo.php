<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AnggotaPanitiaTableInfo extends base\BaseAnggotaPanitiaTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('unsur_ang'), $this->getColumnByName('id_panitia'));
        $this->moveColumnBelow($this->getColumnByName('ptk_id'), $this->getColumnByName('unsur_ang'));
        $this->moveColumnBelow($this->getColumnByName('peserta_didik_id'), $this->getColumnByName('ptk_id'));
        $this->moveColumnBelow($this->getColumnByName('peran_ang'), $this->getColumnByName('peserta_didik_id'));

        $this->getColumnByName('id_panitia')->setHideColumn(1);
        $this->getColumnByName('nm_ang')->setHeader('Nama Anggota');
        $this->getColumnByName('nm_ang')->setColumnWidth(180);
        $this->getColumnByName('peran_ang')->setHeader('Peran');
        $this->getColumnByName('unsur_ang')->setHeader('Unsur');
        $this->getColumnByName('unsur_ang')->setColumnWidth(150);
        $this->getColumnByName('unsur_ang')->setEnumValues(array("1" => "Kepala Sekolah","2" => "Guru dan Tendik","3" => "Peserta Didik","4" => "Orang Tua","5" => "Komite Sekolah","Z" => "Lainnya"));
        $this->getColumnByName('peserta_didik_id')->setHeader('Peserta Didik (bila peserta didik)');
        $this->getColumnByName('peserta_didik_id')->setColumnWidth(250);
        $this->getColumnByName('ptk_id')->setHeader('Guru (bila guru)');
        $this->getColumnByName('ptk_id')->setColumnWidth(250);
        $this->getColumnByName('no_kontak')->setValidationType('numberonly');
    }

}