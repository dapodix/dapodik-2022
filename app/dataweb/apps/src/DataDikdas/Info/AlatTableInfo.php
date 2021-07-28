<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AlatTableInfo extends base\BaseAlatTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setTableValidation('vld_alat');
        
        // Override below here!
        $arrayData = array(
            'id_ruang',
            'jenis_sarana_id',
            'nama',
            'spesifikasi',
            'kepemilikan_sarpras_id',
            'ptk_id',
            'id_hapus_buku',
            'tgl_hapus_buku',
            'asal_data',

            'sekolah_id',
            'kd_kl',
            'kd_satker',
            'kd_brg',
            'nup',
            'kode_eselon1',
            'nama_eselon1',
            'kode_sub_satker',
            'nama_sub_satker'
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fs1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_ruang', 'ptk_id', $fs1, 'Formulir Alat');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_hapus_buku', 'tgl_hapus_buku', $fs2, 'Diisi Saat Sudah Tidak Digunakan');

        $this->getColumnByName('id_ruang')->setColumnWidth(200);
        $this->getColumnByName('jenis_sarana_id')->setColumnWidth(200);
        $this->getColumnByName('nama')->setColumnWidth(200);
        $this->getColumnByName('spesifikasi')->setColumnWidth(150);
        $this->getColumnByName('kepemilikan_sarpras_id')->setColumnWidth(150);
        $this->getColumnByName('ptk_id')->setColumnWidth(150);
        $this->getColumnByName('id_hapus_buku')->setColumnWidth(150);
        $this->getColumnByName('tgl_hapus_buku')->setColumnWidth(150);

        $this->getColumnByName('id_ruang')->setHeader('Ruang');
        $this->getColumnByName('id_ruang')->setLabel('Ruang');
        $this->getColumnByName('id_hapus_buku')->setHeader('Hapus buku');
        $this->getColumnByName('id_hapus_buku')->setLabel('Hapus buku');
        $this->getColumnByName('tgl_hapus_buku')->setAllowEmpty(1);

        $this->getColumnByName('nama')->setColumnWidth('200');
        $this->getColumnByName('kepemilikan_sarpras_id')->setHeader('Kepemilikan');
        $this->getColumnByName('kepemilikan_sarpras_id')->setLabel('Kepemilikan');
        $this->getColumnByName('ptk_id')->setHeader('Peminjam/yang Meminjamkan');
        $this->getColumnByName('ptk_id')->setLabel('Peminjam/yang meminjamkan');

        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('kd_kl')->setXtype('hidden');
        $this->getColumnByName('kd_kl')->setHideColumn(1);
        $this->getColumnByName('kd_satker')->setXtype('hidden');
        $this->getColumnByName('kd_satker')->setHideColumn(1);
        $this->getColumnByName('kd_brg')->setXtype('hidden');
        $this->getColumnByName('kd_brg')->setHideColumn(1);
        $this->getColumnByName('nup')->setXtype('hidden');
        $this->getColumnByName('nup')->setHideColumn(1);
        $this->getColumnByName('kode_eselon1')->setXtype('hidden');
        $this->getColumnByName('kode_eselon1')->setHideColumn(1);
        $this->getColumnByName('nama_eselon1')->setXtype('hidden');
        $this->getColumnByName('nama_eselon1')->setHideColumn(1);
        $this->getColumnByName('kode_sub_satker')->setXtype('hidden');
        $this->getColumnByName('kode_sub_satker')->setHideColumn(1);
        $this->getColumnByName('nama_sub_satker')->setXtype('hidden');
        $this->getColumnByName('nama_sub_satker')->setHideColumn(1);


        $this->getColumnByName('jenis_sarana_id')->setDescription('pilih jenis sarana');
        $this->getColumnByName('nama')->setDescription('Nama Alat');
        $this->getColumnByName('spesifikasi')->setDescription('Spesifikasi Alat');
        $this->getColumnByName('kepemilikan_sarpras_id')->setDescription('Tanggal Sarpras Id Alat');
        $this->getColumnByName('id_hapus_buku')->setDescription('id Hapus Buku Alat');
        $this->getColumnByName('tgl_hapus_buku')->setDescription('Tanggal Hapus Buku Alat');
        $this->getColumnByName('nup')->setDescription('NUP Alat');
        $this->getColumnByName('kode_sub_satker')->setDescription('Kode substansi satuan kerja');
        $this->getColumnByName('nama_sub_satker')->setDescription('nama substansu satuan kerja');

    }
    
}