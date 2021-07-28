<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AnakTableInfo extends base\BaseAnakTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_anak');
        
        $this->moveColumn($this->getColumnByName('nama'), 1);
        
        // Override below here!
        $this->getColumnByName('ptk_id')->setHideColumn(1);
        $this->getColumnByName('status_anak_id')->setHeader('Status');
        $this->getColumnByName('jenjang_pendidikan_id')->setHeader('Jenjang');
        $this->getColumnByName('nisn')->setHeader('NISN');
        $this->getColumnByName('nama')->setHeader('Nama Anak');
        
        $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setEnumValues(array("L" => "Laki-laki" , "P" => "Perempuan"));
        $colJk->setColumnWidth('110');
        
        $this->getColumnByName('tanggal_lahir')->setHeader('Tgl Lahir');
        $this->getColumnByName('tahun_masuk')->setHeader('Thn Masuk');
        $this->getColumnByName('tahun_masuk')->setColumnWidth('100');
        $this->getColumnByName('tahun_masuk')->setInputLength(4);
        $this->getColumnByName('tahun_masuk')->setMinLength(4);
        
        $this->getColumnByName('status_anak_id')->setDescription('Diisi status anak PTK.');
        $this->getColumnByName('jenjang_pendidikan_id')->setDescription('Diisi jenjang pendidikan anak PTK saat ini.');
        $this->getColumnByName('nisn')->setDescription('Diisi NISN anak PTK (jika memiliki).');
        $this->getColumnByName('nama')->setDescription('Diisi nama anak PTK sesuai Akta Lahir atau KK.');
        $this->getColumnByName('jenis_kelamin')->setDescription('Diisi jenis kelamin/gender anak PTK.');
        $this->getColumnByName('tempat_lahir')->setDescription('Diisi tempat lahir anak PTK sesuai Akta Kelahiran atau KK.');
        $this->getColumnByName('tanggal_lahir')->setDescription('Diisi tanggal lahir anak PTK sesuai Akta Kelahiran atau KK.');
        $this->getColumnByName('tahun_masuk')->setDescription('Diisi tahun masuk sekolah sesuai dengan jenjang pendidikan anak PTK saat ini.');

    }
    
}