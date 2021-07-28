<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class PtkTableInfo extends base\BasePtkTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        $this->setTableValidation('vld_ptk');

        // Override below here!
        $arrayData = array(
        		// identitas
        		'nama',
        		'jenis_kelamin',
        		'tempat_lahir',
        		'tanggal_lahir',
        		'nama_ibu_kandung',

        		// data pribadi
        		'alamat_jalan',
        		'rt',
        		'rw',
        		'nama_dusun',
        		'desa_kelurahan',
        		'kode_wilayah',
        		'kode_pos',
                'lintang',
                'bujur',
                'no_kk',
        		'agama_id',
                'npwp',
                'nm_wp',
                'kewarganegaraan',
        		'nik',
        		'status_perkawinan',
        		'nama_suami_istri',
        		'nip_suami_istri',
        		'pekerjaan_suami_istri',

        		// kepegawaian
        		'jenis_ptk_id',
                'status_kepegawaian_id',
                'nip',
                'niy_nigk',
                'nuptk',
                'nrg',
        		'status_keaktifan_id',
        		'sk_pengangkatan',
        		'tmt_pengangkatan',
        		'lembaga_pengangkat_id',
        		'sk_cpns',
        		'tgl_cpns',
        		'tmt_pns',
        		'pangkat_golongan_id',
        		'sumber_gaji_id',
                'karpeg',
                'karpas',

        		// kompetensi_khusus
                'sudah_lisensi_kepala_sekolah',
                'nuks',
        		'keahlian_laboratorium_id',
        		'mampu_handle_kk',
        		'keahlian_braille',
        		'keahlian_bhs_isyarat',

        		// kontak
        		'no_telepon_rumah',
        		'no_hp',
        		'email',
        		);

        for ($i=0; $i<sizeof($arrayData); $i++) {
        	$column_name = $arrayData[$i];
           $this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fieldSet1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nama', 'nama_ibu_kandung', $fieldSet1, 'Identitas');

        $fieldSet2 = new \DataDikdas\FieldsetInfo();
        $this->addRange('alamat_jalan', 'pekerjaan_suami_istri', $fieldSet2, 'Data Pribadi');

        $fieldSet3 = new \DataDikdas\FieldsetInfo();
        $this->addRange('jenis_ptk_id', 'karpas', $fieldSet3, 'Kepegawaian');

        $fieldSet4 = new \DataDikdas\FieldsetInfo();
        $this->addRange('sudah_lisensi_kepala_sekolah', 'keahlian_bhs_isyarat', $fieldSet4, 'Kompetensi Khusus');

        $fieldSet5 = new \DataDikdas\FieldsetInfo();
        $this->addRange('no_telepon_rumah', 'email', $fieldSet5, 'Kontak');

        // $this->moveColumnBelow($this->getColumnByName('id_bank'), $this->getColumnByName('rekening_bank'));
        // $this->moveColumnBelow($this->getColumnByName('rekening_bank'), $this->getColumnByName('rekening_atas_nama'));

        $fieldSetBank = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_bank', 'rekening_atas_nama', $fieldSetBank, 'Bank (diisi oleh ditjen GTK)');
        $this->getColumnByName('id_bank')->setLabel('Nama bank');
        $this->getColumnByName('rekening_bank')->setLabel('Nomor rekening');
        $this->getColumnByName('rekening_atas_nama')->setLabel('Rekening atas nama');
        // $this->getColumnByName('id_bank')->setXtype('displayfield');
        // $this->getColumnByName('rekening_bank')->setXtype('displayfield');
        // $this->getColumnByName('rekening_atas_nama')->setXtype('displayfield');

        $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setHeader('JK');
        $colJk->setEnumValues(array("L" => "L" , "P" => "P"));
        $colJk->setColumnWidth('60');

        $colJk3 = $this->getColumnByName('sudah_lisensi_kepala_sekolah');
        $colJk3->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));

        $colJk4 = $this->getColumnByName('status_perkawinan');
        $colJk4->setEnumValues(array("1" => "Kawin" , "2" => "Belum Kawin" , "3" => "Janda/Duda"));

        $colJk5 = $this->getColumnByName('keahlian_braille');
        $colJk5->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));

        $colJk6 = $this->getColumnByName('kewarganegaraan');
        // $colJk6->setEnumValues(array("ID" => "Indonesia" , "AS" => "Asing"));

        $colJk7 = $this->getColumnByName('keahlian_bhs_isyarat');
        $colJk7->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));

        // $this->getColumnByName('nama')->setReadOnly(1);
        // $this->getColumnByName('tanggal_lahir')->setReadOnly(1);
        $this->getColumnByName('agama_id')->setLabel('Agama & kepercayaan');
        $this->getColumnByName('agama_id')->setHeader('Agama & kepercayaan');

        $this->getColumnByName('nama')->setLabel('Nama (tanpa gelar)*');
        $this->getColumnByName('nama')->setInputLength(60);
        $this->getColumnByName('tempat_lahir')->setInputLength(32);

        $this->getColumnByName('nm_wp')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ibu_kandung')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ibu_kandung')->setColumnWidth('160');
        $this->getColumnByName('nama_suami_istri')->setValidationType('namaspecialchar');

        $this->getColumnByName('kode_pos')->setXtype('numberfield');
        $this->getColumnByName('kode_pos')->setMinLength(5);
        $this->getColumnByName('kode_pos')->setValidationType('numberonly');
        $this->getColumnByName('email')->setValidationType('email');
        $this->getColumnByName('nik')->setValidationType('numberonly');
        $this->getColumnByName('nik')->setMinLength(16);
        $this->getColumnByName('no_kk')->setLabel('No KK');
        $this->getColumnByName('no_kk')->setValidationType('numberonly');
        $this->getColumnByName('no_kk')->setMinLength(16);
        // $this->getColumnByName('nuks')->setLabel('Nomor Unik Kepala Sekolah (NUKS)');
        $this->getColumnByName('nuks')->setLabel('No Registrasi (STTPP)/NUKS');
        $this->getColumnByName('nuks')->setMinLength(22);
        // $this->getColumnByName('nuks')->setValidationType('numberonly');

        $this->getColumnByName('lintang')->setXtype('textfield');
        $this->getColumnByName('lintang')->setAnchor(50);
        $this->getColumnByName('lintang')->setFormTextAlignRight(1);
        $this->getColumnByName('lintang')->setInputLength(16);
        $this->getColumnByName('lintang')->setValidationType('maps');
        $this->getColumnByName('bujur')->setXtype('textfield');
        $this->getColumnByName('bujur')->setAnchor(50);
        $this->getColumnByName('bujur')->setFormTextAlignRight(1);
        $this->getColumnByName('bujur')->setInputLength(16);
        $this->getColumnByName('bujur')->setValidationType('maps');

        $this->getColumnByName('karpeg')->setLabel('Kartu pegawai');
        $this->getColumnByName('karpas')->setLabel('Karis / Karsu');
        $this->getColumnByName('keahlian_braille')->setLabel('Keahlian braille');
        $this->getColumnByName('keahlian_bhs_isyarat')->setLabel('Keahlian bahasa isyarat');
        $this->getColumnByName('nip')->setHeader('NIP');
        $this->getColumnByName('nip')->setLabel('NIP');
        $this->getColumnByName('nip')->setValidationType('numberonly');
        $this->getColumnByName('nip')->setMinLength(18);
        $this->getColumnByName('tempat_lahir')->setHeader('Tmp.Lahir');
        $this->getColumnByName('tanggal_lahir')->setHeader('Tgl Lahir');
        $this->getColumnByName('niy_nigk')->setLabel('NIY/NIGK');
        $this->getColumnByName('nik')->setHeader('NIK');
        $this->getColumnByName('nik')->setLabel('NIK');
        $this->getColumnByName('nuptk')->setHeader('NUPTK');
        $this->getColumnByName('nuptk')->setLabel('NUPTK');
        $this->getColumnByName('nrg')->setHeader('NRG');
        $this->getColumnByName('nrg')->setLabel('Nomor Registrasi Guru (NRG)');
        // $this->getColumnByName('nuptk')->setXtype('textfield');
        $this->getColumnByName('nuptk')->setMinLength(16);
        // $this->getColumnByName('nuptk')->setMax(16);
        $this->getColumnByName('jenis_ptk_id')->setLabel('Jenis PTK');
        $this->getColumnByName('rt')->setLabel('RT');
        $this->getColumnByName('rw')->setLabel('RW');
        $this->getColumnByName('desa_kelurahan')->setLabel('Desa/Kelurahan');
        $this->getColumnByName('kode_wilayah')->setLabel('Kecamatan');
        //$this->getColumnByName('kode_wilayah')->setInputLength(7);
        $this->getColumnByName('pekerjaan_suami_istri')->setLabel('Pekerjaan suami/istri');
        $this->getColumnByName('nama_suami_istri')->setLabel('Nama suami/istri');
        $this->getColumnByName('nip_suami_istri')->setLabel('NIP suami/istri');
        $this->getColumnByName('nip_suami_istri')->setValidationType('numberonly');
        // $this->getColumnByName('nip_suami_istri')->setMinLength(18);
        $this->getColumnByName('npwp')->setLabel('NPWP');
        $this->getColumnByName('nm_wp')->setLabel('Nama wajib pajak');
        $this->getColumnByName('sk_pengangkatan')->setLabel('SK pengangkatan');
        $this->getColumnByName('tmt_pengangkatan')->setLabel('TMT pengangkatan');
        $this->getColumnByName('sk_cpns')->setLabel('SK CPNS');
        $this->getColumnByName('tgl_cpns')->setLabel('TMT CPNS');
        $this->getColumnByName('tmt_pns')->setLabel('TMT PNS');
        $this->getColumnByName('pangkat_golongan_id')->setLabel('Pangkat/Golongan');
        $this->getColumnByName('sudah_lisensi_kepala_sekolah')->setLabel('Punya lisensi kepala sekolah');
        $this->getColumnByName('mampu_handle_kk')->setLabel('Mampu menangani keb. khusus');
        $this->getColumnByName('no_telepon_rumah')->setLabel('Nomor telepon rumah');
        $this->getColumnByName('no_telepon_rumah')->setValidationType('numberonly');
        $this->getColumnByName('no_hp')->setLabel('Nomor HP');
        $this->getColumnByName('no_hp')->setValidationType('numberonly');

        $this->setInfoBeforeDelete('Bagi PTK yg sudah keluar, harap keluarkan melalui tombol Penugasan');

        $this->getColumnByName('status_data')->setHideColumn(1);
        $this->getColumnByName('status_data')->setXtype('hidden');
        // $this->getColumnByName('entry_sekolah_id')->setXtype('hidden');
        $this->getColumnByName('jumlah_sekolah_binaan')->setXtype('hidden');
        $this->getColumnByName('pernah_diklat_kepengawasan')->setXtype('hidden');
        $this->getColumnByName('pengawas_bidang_studi_id')->setXtype('hidden');
        $this->getColumnByName('status_keaktifan_id')->setXtype('hidden');

        $this->getColumnByName('blob_id')->setXtype('hidden');
        $this->getColumnByName('mampu_handle_kk')->setAllowEmpty(1);

        //custom description
        $this->getColumnByName('nama')->setDescription('Diisi dengan nama PTK sesuai Akta Lahir atau KK. Hindari penggunaan gelar akademik maupun gelar sosial. (seperti Dr., Drs., S.Pd, Hj., dan H.).');
        $this->getColumnByName('nip')->setDescription('Diisi Nomor Induk Pegawai baru PTK sesuai yang dikeluarkan oleh BKN 18 digit. Hanya untuk PNS. ');
        $this->getColumnByName('jenis_kelamin')->setDescription('Pilih jenis kelamin/gender PTK.');
        $this->getColumnByName('tempat_lahir')->setDescription('Diisi dengan tempat lahir PTK sesuai Akta Lahir atau KK.');
        $this->getColumnByName('tanggal_lahir')->setDescription('Diisi tanggal lahir PTK sesuai Akta Lahir atau KK.');
        $this->getColumnByName('nik')->setDescription('Diisi dengan Nomor Induk Kependudukan PTK. NIK tertera di KK');
        $this->getColumnByName('niy_nigk')->setDescription('Diisi dengan Nomor Induk Yayasan (NIY) / Nomor Induk Guru Kontrak (NIGK) bagi PTK yang bertugas di sekolah swasta. Kosongkan untuk sekolah negeri.');
        $this->getColumnByName('nuptk')->setDescription('Diisi dengan Nomor Unik Pendidik dan Tenaga Kependidikan (jika memiliki). 16 Digit');
        $this->getColumnByName('status_kepegawaian_id')->setDescription('Pilih status kepegawaian PTK saat ini. Isian ini harus sama antara sekolah Induk dan bukan Induk. Misalkan PNS di Induk maka di sekolah Bukan Induk harus dinyatakan PNS juga walaupun sekolahnya swasta');
        $this->getColumnByName('jenis_ptk_id')->setDescription('Pilih jenis PTK sesuai dengan tugas utamanya di sekolah.');
        $this->getColumnByName('agama_id')->setDescription('Pilih agama PTK.');
        $this->getColumnByName('alamat_jalan')->setDescription('Diisi dengan nama jalan alamat PTK.');
        $this->getColumnByName('rt')->setDescription('Diisi dengan nomor RT alamat PTK.');
        $this->getColumnByName('rw')->setDescription('Diisi dengan nomor RW alamat PTK.');
        $this->getColumnByName('nama_dusun')->setDescription('Diisi dengan nama dusun alamat PTK.');
        $this->getColumnByName('desa_kelurahan')->setDescription('Diisi dengan nama desa alamat PTK.');
        $this->getColumnByName('kode_wilayah')->setDescription('Pilih kecamatan alamat PTK. Ketikkan nama kecamatan untuk memfilter referensi kecamatan, lalu akan muncul nama kecamatan dan kabupatennya. Pilih kecamatan yang dimaksud');
        $this->getColumnByName('kode_pos')->setDescription('Diisi dengan angka kode pos alamat PTK.');
        $this->getColumnByName('no_telepon_rumah')->setDescription('Diisi nomor telepon rumah milik PTK.');
        $this->getColumnByName('no_hp')->setDescription('Diisi nomor ponsel milik PTK.');
        $this->getColumnByName('email')->setDescription('Diisi email milik PTK.');
        $this->getColumnByName('sk_cpns')->setDescription('Diisi nomor SK CPNS apabila PTK adalah CPNS atau PNS. Kosongkan selain itu.');
        $this->getColumnByName('tgl_cpns')->setDescription('Diisi tanggal mulai bertugas sebagai CPNS. Kosongkan bila bukan CPNS atau PNS.');
        $this->getColumnByName('sk_pengangkatan')->setDescription('Diisi dengan nomor SK pengangkatan sesuai dengan status kepegawaian yang telah dipilih sebelumnya. Apabila status kepegawaian dipilih PNS, maka Diisi nomor SK pengangkatan sebagai PNS.');
        $this->getColumnByName('tmt_pengangkatan')->setDescription('Diisi tanggal SK pengangkatan sesuai dengan status kepegawaian yang telah dipilih sebelumnya.');
        $this->getColumnByName('lembaga_pengangkat_id')->setDescription('Pilih lembaga yang mengangkat PTK sesuai dengan SK pengangkatannya.');
        $this->getColumnByName('pangkat_golongan_id')->setDescription('Pilih pangkat dan golongan PTK (terbaru). Kosongkan bila bukan PNS.');
        $this->getColumnByName('keahlian_laboratorium_id')->setDescription('Pilih spesifikasi keahlian laboratorium yang dimiliki oleh PTK. Keahlian tersebut dibuktikan dengan adanya sertifikat sebagai laboran.');
        $this->getColumnByName('sumber_gaji_id')->setDescription('Pilih sumber gaji PTK.');
        $this->getColumnByName('nama_ibu_kandung')->setDescription('Diisi dengan nama ibu kandung PTK sesuai Akta Lahir atau KK.');
        $this->getColumnByName('status_perkawinan')->setDescription('Pilih status perkawinan PTK.');
        $this->getColumnByName('nama_suami_istri')->setDescription('Diisi dengan nama suami/istri PTK yang ditanggung (jika ada).');
        $this->getColumnByName('nip_suami_istri')->setDescription('Diisi dengan NIP suami/istri PTK yang ditanggung (jika ada).');
        $this->getColumnByName('pekerjaan_suami_istri')->setDescription('Diisi dengan pekerjaan utama suami/istri PTK yang ditanggung (jika ada). Pilih Lainnya khusus istri apabila sebagai ibu rumah tangga.');
        $this->getColumnByName('tmt_pns')->setDescription('Diisi tanggal mulai bertugas sebagai PNS. Kosongkan bila bukan PNS.');
        $this->getColumnByName('sudah_lisensi_kepala_sekolah')->setDescription('Pilih kepemilikikan lisensi kepala sekolah sebagai Ya atau Tidak. Kepemilikan lisensi ini dibuktikan dengan adanya sertifikat lulus diklat pelatihan kepala sekolah.');
        $this->getColumnByName('mampu_handle_kk')->setDescription('Pilih kemampuan khusus yang dapat ditangani oleh PTK. Dapat dipilih lebih dari satu');
        // $this->getColumnByName('keahlian_braille')->setDescription('Pilih 'Ya' jika PTK memiliki keahlian dalam berkomunikasi memakai Braille.');
        // $this->getColumnByName('keahlian_bhs_isyarat')->setDescription('Pilih 'Ya' jika  PTK meiliki keahlian dalam berkomunikasi memakai bahasa isyarat.');
        $this->getColumnByName('npwp')->setDescription('Diisi Nomor Pokok Wajib Pajak milik PTK (jika memiliki).');
        $this->getColumnByName('kewarganegaraan')->setDescription('Pilih kewarganegaraan PTK.');

    }

}