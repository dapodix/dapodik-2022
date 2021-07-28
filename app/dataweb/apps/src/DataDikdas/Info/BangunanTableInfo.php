<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class BangunanTableInfo extends base\BaseBangunanTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.BangunanTableMap';

    public function __construct(){        
        parent::__construct();        
    }
    
    public function setVariables() {
        parent::setVariables();
        $this->setTableValidation('vld_bangunan');
        
        // Override below here!
        $arrayData = array(
            'jenis_prasarana_id',
            'id_tanah',
            'nama',
            'panjang',
            'lebar',
            'luas_tapak_bangunan',
            'kepemilikan_sarpras_id',
            'ptk_id',
            'nilai_perolehan_aset',
            'jml_lantai',
            'thn_dibangun',
            'ket_bangunan',
            'tgl_sk_pemakai',
            'vol_pondasi_m3',
            'vol_sloop_kolom_balok_m3',
            'panj_kudakuda_m',
            'vol_kudakuda_m3',
            'panj_kaso_m',
            'panj_reng_m',
            'luas_tutup_atap_m2',
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
            'nama_sub_satker',
            'kd_satker_tanah',
            'nm_satker_tanah',
            'kd_brg_tanah',
            'nm_brg_tanah',
            'nup_brg_tanah'
        );

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
            $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fs1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_prasarana_id', 'luas_tutup_atap_m2', $fs1, 'Formulir Bangunan');

        $fs2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_hapus_buku', 'tgl_hapus_buku', $fs2, 'Diisi Saat Sudah Tidak Digunakan');

        $year = date('Y');

        $this->getColumnByName('nama')->setColumnWidth('200');
        $this->getColumnByName('kepemilikan_sarpras_id')->setHeader('Kepemilikan');
        $this->getColumnByName('kepemilikan_sarpras_id')->setLabel('Kepemilikan');
        $this->getColumnByName('panjang')->setHeader('Panjang (m)');
        $this->getColumnByName('panjang')->setLabel('Panjang (m)');
        $this->getColumnByName('panjang')->setColumnWidth('120');
        $this->getColumnByName('lebar')->setHeader('Lebar (m)');
        $this->getColumnByName('lebar')->setLabel('Lebar (m)');
        $this->getColumnByName('lebar')->setColumnWidth('120');
        $this->getColumnByName('luas_tapak_bangunan')->setHeader('Luas Tapak (m2)');
        $this->getColumnByName('luas_tapak_bangunan')->setLabel('Luas tapak bangunan (m2)');
        $this->getColumnByName('luas_tapak_bangunan')->setColumnWidth('120');
        $this->getColumnByName('nilai_perolehan_aset')->setColumnWidth('120');
        $this->getColumnByName('ket_bangunan')->setColumnWidth('200');
        $this->getColumnByName('jml_lantai')->setLabel('Jumlah lantai');
        $this->getColumnByName('jml_lantai')->setColumnWidth('120');
        $this->getColumnByName('jml_lantai')->setMin(1);
        $this->getColumnByName('jml_lantai')->setMax(50);
        $this->getColumnByName('jml_lantai')->setInputLength(2);
        $this->getColumnByName('thn_dibangun')->setLabel('Tahun dibangun');
        $this->getColumnByName('thn_dibangun')->setColumnWidth('120');
        $this->getColumnByName('thn_dibangun')->setMin(1910);
        $this->getColumnByName('thn_dibangun')->setMax($year);
        $this->getColumnByName('thn_dibangun')->setInputLength(4);
        $this->getColumnByName('panj_kudakuda_m')->setColumnWidth('120');
        $this->getColumnByName('panj_kudakuda_m')->setHeader('Panj. Kuda-Kuda (m)');
        $this->getColumnByName('panj_kudakuda_m')->setLabel('Panjang kuda-kuda (m)');
        $this->getColumnByName('panj_kaso_m')->setColumnWidth('120');
        $this->getColumnByName('panj_kaso_m')->setHeader('Panj. Kaso (m)');
        $this->getColumnByName('panj_kaso_m')->setLabel('Panjang kaso (m)');
        $this->getColumnByName('panj_reng_m')->setColumnWidth('120');
        $this->getColumnByName('panj_reng_m')->setHeader('Panj. Reng (m)');
        $this->getColumnByName('panj_reng_m')->setLabel('Panjang reng (m)');
        $this->getColumnByName('vol_pondasi_m3')->setColumnWidth('150');
        $this->getColumnByName('vol_pondasi_m3')->setHeader('Vol Pondasi (m3)');
        $this->getColumnByName('vol_pondasi_m3')->setLabel('Volume pondasi (m3)');
        $this->getColumnByName('vol_sloop_kolom_balok_m3')->setColumnWidth('150');
        $this->getColumnByName('vol_sloop_kolom_balok_m3')->setHeader('Vol Sloop Kolom Balok (m3)');
        $this->getColumnByName('vol_sloop_kolom_balok_m3')->setLabel('Volume sloop kolom balok (m3)');
        $this->getColumnByName('vol_kudakuda_m3')->setColumnWidth('150');
        $this->getColumnByName('vol_kudakuda_m3')->setHeader('Vol Kuda-Kuda (m3)');
        $this->getColumnByName('vol_kudakuda_m3')->setLabel('Volume kuda-kuda (m3)');
        $this->getColumnByName('luas_tutup_atap_m2')->setColumnWidth('150');
        $this->getColumnByName('luas_tutup_atap_m2')->setHeader('Luas Tutup Atap (m2)');
        $this->getColumnByName('luas_tutup_atap_m2')->setLabel('Luas tutup atap (m2)');
        $this->getColumnByName('tgl_sk_pemakai')->setColumnWidth('150');
        $this->getColumnByName('tgl_sk_pemakai')->setHeader('Tgl SK Pemakai');
        $this->getColumnByName('tgl_sk_pemakai')->setLabel('Tgl SK pemakai');
        $this->getColumnByName('ket_bangunan')->setLabel('Keterangan bangunan');

        $this->getColumnByName('panj_kudakuda_m')->setXtype('hidden');
        $this->getColumnByName('panj_kaso_m')->setXtype('hidden');
        $this->getColumnByName('panj_reng_m')->setXtype('hidden');
        $this->getColumnByName('vol_pondasi_m3')->setXtype('hidden');
        $this->getColumnByName('vol_sloop_kolom_balok_m3')->setXtype('hidden');
        $this->getColumnByName('vol_kudakuda_m3')->setXtype('hidden');
        $this->getColumnByName('luas_tutup_atap_m2')->setXtype('hidden');
        $this->getColumnByName('panj_kudakuda_m')->setHideColumn(1);
        $this->getColumnByName('panj_kaso_m')->setHideColumn(1);
        $this->getColumnByName('panj_reng_m')->setHideColumn(1);
        $this->getColumnByName('vol_pondasi_m3')->setHideColumn(1);
        $this->getColumnByName('vol_sloop_kolom_balok_m3')->setHideColumn(1);
        $this->getColumnByName('vol_kudakuda_m3')->setHideColumn(1);
        $this->getColumnByName('luas_tutup_atap_m2')->setHideColumn(1);
        
        $this->getColumnByName('ptk_id')->setHeader('Peminjam/yang Meminjamkan');
        $this->getColumnByName('ptk_id')->setLabel('Peminjam/yang meminjamkan');

        $this->getColumnByName('id_hapus_buku')->setHeader('Hapus buku');
        $this->getColumnByName('id_hapus_buku')->setLabel('Hapus buku');
        $this->getColumnByName('tgl_hapus_buku')->setAllowEmpty(1);

        $this->getColumnByName('sekolah_id')->setXtype('hidden');
        $this->getColumnByName('sekolah_id')->setHideColumn(1);
        $this->getColumnByName('id_tanah')->setLabel('Tanah');
        // $this->getColumnByName('id_tanah')->setXtype('hidden');
        $this->getColumnByName('id_tanah')->setHideColumn(1);
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
        $this->getColumnByName('kd_satker_tanah')->setXtype('hidden');
        $this->getColumnByName('kd_satker_tanah')->setHideColumn(1);
        $this->getColumnByName('nm_satker_tanah')->setXtype('hidden');
        $this->getColumnByName('nm_satker_tanah')->setHideColumn(1);
        $this->getColumnByName('kd_brg_tanah')->setXtype('hidden');
        $this->getColumnByName('kd_brg_tanah')->setHideColumn(1);
        $this->getColumnByName('nm_brg_tanah')->setXtype('hidden');
        $this->getColumnByName('nm_brg_tanah')->setHideColumn(1);
        $this->getColumnByName('nup_brg_tanah')->setXtype('hidden');
        $this->getColumnByName('nup_brg_tanah')->setHideColumn(1);

        $this->getColumnByName('tgl_hapus_buku')->setDescription('Tanggal penghapusan buku');
        $this->getColumnByName('asal_data')->setDescription('Asal muasal data');
    }
    
}