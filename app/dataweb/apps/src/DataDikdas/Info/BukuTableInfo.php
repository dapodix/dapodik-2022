<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BukuTableInfo extends base\BaseBukuTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setDisplayField('nm_buku');
        
        // Override below here!
        $arrayData = array(
            'id_ruang',
            'id_biblio',
            'mata_pelajaran_id',
            'tingkat_pendidikan_id',
            'nm_buku',
            'id_hapus_buku',
            'tgl_hapus_buku',

            'sekolah_id',
            'asal_data',
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fs1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_ruang', 'nm_buku', $fs1, 'Formulir Buku');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_hapus_buku', 'tgl_mutasi_keluar', $fs2, 'Diisi Saat Sudah Tidak Digunakan');
 
        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);

        $this->getColumnByName('id_ruang')->setColumnWidth(350);
        $this->getColumnByName('id_ruang')->setHeader('Ruang');
        $this->getColumnByName('id_ruang')->setLabel('Ruang');

        $this->getColumnByName('id_biblio')->setColumnWidth(300);
        $this->getColumnByName('id_biblio')->setHeader('Judul Buku Pustaka');
        $this->getColumnByName('id_biblio')->setLabel('Judul Buku Pustaka');

        $this->getColumnByName('mata_pelajaran_id')->setColumnWidth(200);
        $this->getColumnByName('tingkat_pendidikan_id')->setColumnWidth(150);

        $this->getColumnByName('nm_buku')->setColumnWidth(350);
        $this->getColumnByName('nm_buku')->setHeader('Judul Buku');
        $this->getColumnByName('nm_buku')->setLabel('Judul Buku');

        $this->getColumnByName('id_hapus_buku')->setColumnWidth(150);
        $this->getColumnByName('id_hapus_buku')->setHeader('Hapus Buku');
        $this->getColumnByName('id_hapus_buku')->setLabel('Hapus buku');
        
        $this->getColumnByName('tgl_hapus_buku')->setColumnWidth(150);
        $this->getColumnByName('tgl_hapus_buku')->setAllowEmpty(1);

        $this->getColumnByName('mata_pelajaran_id')->setDescription('pilih Mata pelajaran');
        $this->getColumnByName('tingkat_pendidikan_id')->setDescription('pilih Tingkat pendidikan');
        $this->getColumnByName('nm_buku')->setDescription('Nama buku');
        $this->getColumnByName('tgl_hapus_buku')->setDescription('tanggal hapus buku');
    }
    
}