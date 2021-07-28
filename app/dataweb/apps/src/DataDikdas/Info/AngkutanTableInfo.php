<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class AngkutanTableInfo extends base\BaseAngkutanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setTableValidation('vld_angkutan');
        
        // Override below here!
        $arrayData = array(
            'jenis_sarana_id',
            'nama',
            'spesifikasi',
            'merk',
            'no_polisi',
            'no_bpkb',
            'alamat',
            'kepemilikan_sarpras_id',
            'ptk_id',
            'id_hapus_buku',
            'tgl_hapus_buku',
            
            'sekolah_id',
            'kd_kl',
            'kd_satker',
            'kd_brg',
            'nup',
            'kode_eselon1',
            'nama_eselon1',
            'kode_sub_satker',
            'nama_sub_satker',
            'asal_data',
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fs1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_sarana_id', 'ptk_id', $fs1, 'Formulir Angkutan');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_hapus_buku', 'tgl_hapus_buku', $fs2, 'Diisi Saat Sudah Tidak Digunakan');

        $this->getColumnByName('jenis_sarana_id')->setColumnWidth(150);
        $this->getColumnByName('nama')->setColumnWidth(200);
        $this->getColumnByName('spesifikasi')->setColumnWidth(150);
        $this->getColumnByName('merk')->setColumnWidth(150);
        $this->getColumnByName('no_polisi')->setColumnWidth(150);
        $this->getColumnByName('no_bpkb')->setColumnWidth(150);
        $this->getColumnByName('alamat')->setColumnWidth(200);
        $this->getColumnByName('kepemilikan_sarpras_id')->setColumnWidth(150);
        $this->getColumnByName('ptk_id')->setColumnWidth(150);
        $this->getColumnByName('id_hapus_buku')->setColumnWidth(150);
        $this->getColumnByName('tgl_hapus_buku')->setColumnWidth(150);

        $this->getColumnByName('id_hapus_buku')->setHeader('Hapus buku');
        $this->getColumnByName('id_hapus_buku')->setLabel('Hapus buku');
        $this->getColumnByName('tgl_hapus_buku')->setAllowEmpty(1);

        $this->getColumnByName('no_bpkb')->setHeader('No BPKB');
        $this->getColumnByName('no_bpkb')->setLabel('No BPKB');
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
        

        $this->getColumnByName('nama')->setDescription('Nama Angkutan');
        $this->getColumnByName('spesifikasi')->setDescription('Spesifikasi Angkutan');
        $this->getColumnByName('merk')->setDescription('Merk Angkutan');
        $this->getColumnByName('no_polisi')->setDescription('Nomor Polisi Angkutan');
        $this->getColumnByName('no_bpkb')->setDescription('Nomor Bpkb Angkutan');
        $this->getColumnByName('alamat')->setDescription('Alamat Angkutan');
        $this->getColumnByName('kepemilikan_sarpras_id')->setDescription('Kepemilikan_Sarpras_Id Angkutan');
        $this->getColumnByName('ptk_id')->setDescription('Ptk_Id Angkutan');
        $this->getColumnByName('id_hapus_buku')->setDescription('Id_Hapus_Buku Angkutan');
        $this->getColumnByName('tgl_hapus_buku')->setDescription('Tanggal Hapus Buku Angkutan');
        $this->getColumnByName('sekolah_id')->setDescription('Sekolah_Id Angkutan');
        $this->getColumnByName('kd_kl')->setDescription('Kd_Kl Angkutan');
        $this->getColumnByName('kd_satker')->setDescription('Kd_Satker Angkutan');
        $this->getColumnByName('kd_brg')->setDescription('Kd_Brg Angkutan');
        $this->getColumnByName('nup')->setDescription('Nup Angkutan');
        $this->getColumnByName('kode_eselon1')->setDescription('Kode_Eselon1 Angkutan');
        $this->getColumnByName('nama_eselon1')->setDescription('Nama_Eselon1 Angkutan');
        $this->getColumnByName('kode_sub_satker')->setDescription('Kode_Sub_Satker Angkutan');
        $this->getColumnByName('nama_sub_satker')->setDescription('Nama_Sub_Satker Angkutan');
        $this->getColumnByName('asal_data')->setDescription('Asal_Data Angkutan');
    }
    
}