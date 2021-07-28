<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class TracerLulusanTableInfo extends base\BaseTracerLulusanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        
        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('nm_prodi'), $this->getColumnByName('nm_sp'));
        $this->moveColumnBelow($this->getColumnByName('dudi_id'), $this->getColumnByName('nm_inst_perusahaan'));
        $this->moveColumnBelow($this->getColumnByName('bidang_usaha_id'), $this->getColumnByName('dudi_id'));
        $this->moveColumnBelow($this->getColumnByName('pekerjaan_id'), $this->getColumnByName('bidang_usaha_id'));
        $this->moveColumnBelow($this->getColumnByName('penghasilan_id'), $this->getColumnByName('pekerjaan_id'));
        $this->moveColumnBelow($this->getColumnByName('ikatan_kerja'), $this->getColumnByName('penghasilan_id'));
        $this->moveColumnBelow($this->getColumnByName('a_sesuai_kompetensi'), $this->getColumnByName('ikatan_kerja'));

        $fieldSet = new \DataDikdas\FieldsetInfo();
        $this->addRange('nm_inst_perusahaan', 'a_sesuai_kompetensi', $fieldSet, 'Bila Bekerja');
        $this->getColumnByName('a_sesuai_kompetensi')->setLabel('Apakah sesuai kompetensi');

        $col1 = $this->getColumnByName('a_sesuai_kompetensi');
        $col1->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        
        $col2 = $this->getColumnByName('ikatan_kerja');
        $col2->setEnumValues(array(
            "T" => "Tetap", 
            "K" => "Kontrak", 
            "F" => "Freelance", 
            "P" => "Profesional", 
            "A" => "Pejabat Publik", 
            "S" => "Usaha Sendiri", 
            "*" => "Lainnya"
        ));

        /* $col3 = $this->getColumnByName('akt_setelah_lulus');
        $col3->setEnumValues(array(
            1 => "Studi Lanjut",
            2 => "Bekerja",
            3 => "Wirausaha",
            9 => "Lainnya"
        ));

        $col4 = $this->getColumnByName('stat_tracer');
        $col4->setEnumValues(array(
            0 => "Belum diproses",
            1 => "Sudah diproses dan sukses",
            2 => "Sudah diproses namun gagal",
            9 => "Tidak perlu diproses lebih lanjut"
        )); */

        $fieldSet2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nm_sp', 'nm_prodi', $fieldSet2, 'Bila Melanjutkan ke Perguruan Tinggi');

        $this->moveColumnBelow($this->getColumnByName('tgl_entry'), $this->getColumnByName('nm_prodi'));
        $this->moveColumnBelow($this->getColumnByName('ket_tracer'), $this->getColumnByName('tgl_entry'));

        $fieldSet3 = new \DataDikdas\FieldsetInfo();
        $this->addRange('tgl_entry', 'ket_tracer', $fieldSet3, 'Keterangan');

    	$this->getColumnByName('registrasi_id')->setXtype('hidden');
    	// $this->getColumnByName('tgl_entry')->setXtype('hidden');
    	$this->getColumnByName('tgl_entry')->setLabel('Tanggal Masuk Kerja / Perguruan Tinggi');

    	$this->getColumnByName('akt_setelah_lulus')->setLabel('Aktivitas Setelah Lulus');
    	$this->getColumnByName('akt_setelah_lulus')->setXtype('hidden');
    	$this->getColumnByName('nm_inst_perusahaan')->setLabel('Nama Perusahaan');
    	$this->getColumnByName('nm_sp')->setLabel('Nama Perguruan Tinggi');
    	$this->getColumnByName('nm_prodi')->setLabel('Program Studi');
    	$this->getColumnByName('ket_tracer')->setLabel('Keterangan');
    	$this->getColumnByName('dudi_id')->setLabel('DUDI');
    	$this->getColumnByName('id_prodi')->setXtype('hidden');
    	$this->getColumnByName('stat_tracer')->setXtype('hidden');


    }
    
}