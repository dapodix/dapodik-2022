<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class TanahTableInfo extends base\BaseTanahTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.TanahTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setTableValidation('vld_tanah');

        $arrayData = array(
            'jenis_prasarana_id',
            'nama',
            'no_sertifikat_tanah',
            'panjang',
            'lebar',
            'luas',
            'luas_lahan_tersedia',
            'kepemilikan_sarpras_id',
            'nilai_perolehan_aset',
            'ket_tanah',

            'alamat_jalan',
            'rt',
            'rw',
            'nama_dusun',
            'desa_kelurahan',
            'kode_wilayah',
            'kode_pos',
            'lintang',
            'bujur',

            'id_hapus_buku',
            'tgl_mutasi_keluar',    
            
            'batas',
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
        $this->addRange('jenis_prasarana_id', 'ket_tanah', $fs1, 'Formulir Tanah');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_hapus_buku', 'tgl_mutasi_keluar', $fs2, 'Diisi Saat Sudah Tidak Digunakan');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('alamat_jalan', 'bujur', $fs2, 'Lokasi Tanah');
        
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

        $this->getColumnByName('batas')->setXtype('hidden');
        $this->getColumnByName('batas')->setHideColumn(1);

        $this->getColumnByName('nilai_perolehan_aset')->setXtype('hidden');
        $this->getColumnByName('nilai_perolehan_aset')->setHideColumn(1);

        $this->getColumnByName('nama')->setColumnWidth('200');
        $this->getColumnByName('kepemilikan_sarpras_id')->setHeader('Kepemilikan');
        $this->getColumnByName('kepemilikan_sarpras_id')->setLabel('Kepemilikan');
        $this->getColumnByName('panjang')->setHeader('Panjang (m)');
        $this->getColumnByName('panjang')->setLabel('Panjang (m)');
        $this->getColumnByName('panjang')->setColumnWidth('120');
        $this->getColumnByName('lebar')->setHeader('Lebar (m)');
        $this->getColumnByName('lebar')->setLabel('Lebar (m)');
        $this->getColumnByName('lebar')->setColumnWidth('120');
        $this->getColumnByName('luas')->setHeader('Luas (m2)');
        $this->getColumnByName('luas')->setLabel('Luas (m2)');
        $this->getColumnByName('luas')->setColumnWidth('120');
        $this->getColumnByName('luas_lahan_tersedia')->setHeader('Luas Lahan Tersedia (m2)');
        $this->getColumnByName('luas_lahan_tersedia')->setLabel('Luas Lahan Tersedia (m2)');
        $this->getColumnByName('luas_lahan_tersedia')->setColumnWidth('120');
        $this->getColumnByName('ket_tanah')->setColumnWidth('200');
        
        $this->getColumnByName('alamat_jalan')->setColumnWidth('200');
        $this->getColumnByName('rt')->setColumnWidth('80');
        $this->getColumnByName('rw')->setColumnWidth('80');
        $this->getColumnByName('kode_pos')->setXtype('numberfield');
        $this->getColumnByName('kode_pos')->setColumnWidth('120');

        $this->getColumnByName('lintang')->setHideColumn(1);
        $this->getColumnByName('lintang')->setXtype('textfield');
        $this->getColumnByName('lintang')->setFormTextAlignRight(1);
        $this->getColumnByName('lintang')->setValidationType('maps');
        $this->getColumnByName('bujur')->setHideColumn(1);
        $this->getColumnByName('bujur')->setXtype('textfield');
        $this->getColumnByName('bujur')->setFormTextAlignRight(1);
        $this->getColumnByName('bujur')->setValidationType('maps');

        $this->getColumnByName('tgl_mutasi_keluar')->setAllowEmpty(1);
        $this->getColumnByName('tgl_mutasi_keluar')->setColumnWidth(150);
        $this->getColumnByName('tgl_mutasi_keluar')->setHeader('Tgl Hapus Buku');
        $this->getColumnByName('tgl_mutasi_keluar')->setLabel('Tgl Hapus Buku');
        $this->getColumnByName('id_hapus_buku')->setColumnWidth('150');
        $this->getColumnByName('id_hapus_buku')->setHeader('Alasan Hapus Buku');
        $this->getColumnByName('id_hapus_buku')->setLabel('Alasan Hapus Buku');

        // $this->getColumnByName('jenis_prasarana_id')->setColumnWidth('350');
        $this->getColumnByName('no_sertifikat_tanah')->setDescription('Nomor yang tertera pada sertifikat tanah');
        $this->getColumnByName('panjang')->setDescription('Ukuran panjang tanah');
        $this->getColumnByName('lebar')->setDescription('Ukuran lebar tanah');
        $this->getColumnByName('luas')->setDescription('Ukuran panjang tanah dikali luas tanah');
        $this->getColumnByName('luas_lahan_tersedia')->setDescription('Ukuran lahan yang dapat digunakan');
        $this->getColumnByName('kepemilikan_sarpras_id')->setDescription('Pilihan jenis kepemilikan');
        $this->getColumnByName('nilai_perolehan_aset')->setDescription('Harga hasil perolehan');
        $this->getColumnByName('ket_tanah')->setDescription('Keterangan tanah');
        $this->getColumnByName('id_hapus_buku')->setDescription('');
        $this->getColumnByName('tgl_mutasi_keluar')->setDescription('Tanggal pindah');
        $this->getColumnByName('batas')->setDescription('Batas Tanah');
    }
    
}