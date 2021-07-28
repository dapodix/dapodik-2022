<?php
namespace DataDikdas\Info;

use DataDikdas\FieldsetInfo;
use DataDikdas\FieldgroupInfo;
use DataDikdas\TableInfo;
use DataDikdas\ColumnInfo;
use DataDikdas\Info\base;

class PesertaDidikTableInfo extends base\BasePesertaDidikTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {

    	parent::setVariables();

        $this->setTableValidation('vld_peserta_didik');
        $this->setHasMany(array("AnggotaPanitia","AnggotaRombel","BeasiswaPesertaDidik","PesertaDidikLongitudinal","Prestasi","RegistrasiPesertaDidik","VldPesertaDidik"));
        $this->setRelatingColumns(array("AnggotaPanitia.peserta_didik_id","AnggotaRombel.peserta_didik_id","BeasiswaPesertaDidik.peserta_didik_id","PesertaDidikLongitudinal.peserta_didik_id","Prestasi.peserta_didik_id","RegistrasiPesertaDidik.peserta_didik_id","VldPesertaDidik.peserta_didik_id"));

        // Override below here!
        $this->moveColumnBelow($this->getColumnByName('reg_akta_lahir'), $this->getColumnByName('tanggal_lahir'));
        $this->moveColumnBelow($this->getColumnByName('penghasilan_id_ibu'), $this->getColumnByName('pekerjaan_id_ibu'));
        $this->moveColumnBelow($this->getColumnByName('kewarganegaraan'), $this->getColumnByName('nisn'));
        $this->moveColumnBelow($this->getColumnByName('nomor_telepon_rumah'), $this->getColumnByName('penghasilan_id_wali'));
        $this->moveColumnBelow($this->getColumnByName('nomor_telepon_seluler'), $this->getColumnByName('nomor_telepon_rumah'));
        $this->moveColumnBelow($this->getColumnByName('email'), $this->getColumnByName('nomor_telepon_seluler'));
        $this->moveColumnBelow($this->getColumnByName('nik_ayah'), $this->getColumnByName('nama_ayah'));
        $this->moveColumnBelow($this->getColumnByName('nik_ibu'), $this->getColumnByName('nama_ibu_kandung'));
        $this->moveColumnBelow($this->getColumnByName('nik_wali'), $this->getColumnByName('nama_wali'));
        $this->moveColumnBelow($this->getColumnByName('no_kks'), $this->getColumnByName('alat_transportasi_id'));
        $this->moveColumnBelow($this->getColumnByName('layak_pip'), $this->getColumnByName('nm_kip'));
        // $this->moveColumnBelow($this->getColumnByName('penerima_kip'), $this->getColumnByName('layak_pip'));
        $this->moveColumnBelow($this->getColumnByName('no_kip'), $this->getColumnByName('penerima_kip'));
        $this->moveColumnBelow($this->getColumnByName('nm_kip'), $this->getColumnByName('kebutuhan_khusus_id_ibu'));
        // $this->moveColumnBelow($this->getColumnByName('status_data'), $this->getColumnByName('layak_pip'));
        // $this->moveColumnBelow($this->getColumnByName('id_layak_pip'), $this->getColumnByName('status_data'));
        $this->moveColumnBelow($this->getColumnByName('pekerjaan_id'), $this->getColumnByName('anak_keberapa'));

        $this->getColumnByName('nama')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ayah')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_ibu_kandung')->setValidationType('namaspecialchar');
        $this->getColumnByName('nama_wali')->setValidationType('namaspecialchar');
        // $this->getColumnByName('nm_kip')->setValidationType('namaspecialchar');

        // $this->getColumnByName('nik')->setValidationType('numberonly');
        $this->getColumnByName('no_kk')->setValidationType('numberonly');
        $this->getColumnByName('no_kk')->setMinLength(16);
        $this->getColumnByName('no_kk')->setHeader('No KK');
        $this->getColumnByName('no_kk')->setLabel('No KK');

        $this->getColumnByName('nik_ayah')->setValidationType('numberonly');
        $this->getColumnByName('nik_ibu')->setValidationType('numberonly');
        $this->getColumnByName('nik_wali')->setValidationType('numberonly');
        $this->getColumnByName('nik')->setMinLength(16);
        $this->getColumnByName('nik_ayah')->setMinLength(16);
        $this->getColumnByName('nik_ibu')->setMinLength(16);
        $this->getColumnByName('nik_wali')->setMinLength(16);

        $fieldSet1 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nama', 'id_layak_pip', $fieldSet1, 'Data Pribadi');

        $this->getColumnByName('agama_id')->setLabel('Agama & Kepercayaan');
        $this->getColumnByName('agama_id')->setHeader('Agama & Kepercayaan');
        $this->getColumnByName('nik_ayah')->setLabel('NIK Ayah');
        $this->getColumnByName('nik_ibu')->setLabel('NIK Ibu');
        $this->getColumnByName('nik_wali')->setLabel('NIK Wali');

        $this->getColumnByName('no_kip')->setLabel('No KIP');
        $this->getColumnByName('no_kks')->setLabel('No KKS (Kartu Keluarga Sejahtera)');

        $this->getColumnByName('reg_akta_lahir')->setLabel('No Registrasi Akta Lahir');
        // $this->getColumnByName('reg_akta_lahir')->setInputLength(25);

        $fieldSetBank = new \DataDikdas\FieldsetInfo();
        $this->addRange('id_bank', 'rekening_atas_nama', $fieldSetBank, 'Bank diperuntukan PIP (diisi oleh pusat)');
        $this->getColumnByName('id_bank')->setLabel('Nama Bank');
        $this->getColumnByName('rekening_bank')->setLabel('Nomor Rekening');
        $this->getColumnByName('rekening_atas_nama')->setLabel('Rekening Atas Nama');
        $this->getColumnByName('id_bank')->setXtype('displayfield');
        $this->getColumnByName('rekening_bank')->setXtype('displayfield');
        $this->getColumnByName('rekening_atas_nama')->setXtype('displayfield');
        $this->getColumnByName('nama_kcp')->setXtype('displayfield');
        $this->getColumnByName('nama_kcp')->setLabel('Kantor Cabang Pembantu (KCP)');
        $this->getColumnByName('pekerjaan_id')->setLabel('Pekerjaan (diperuntukan warga belajar)');

        $colJk = $this->getColumnByName('jenis_kelamin');
        $colJk->setHeader('JK');
        $colJk->setEnumValues(array("L" => "L" , "P" => "P"));
        $colJk->setColumnWidth('60');

        $this->getColumnByName('nama')->setInputLength(100);
        $this->getColumnByName('tempat_lahir')->setInputLength(32);
        // $this->getColumnByName('nama')->setReadOnly(1);
        // $this->getColumnByName('tanggal_lahir')->setReadOnly(1);

        $this->getColumnByName('anak_keberapa')->setXtype('numberfield');
        $this->getColumnByName('anak_keberapa')->setAllowEmpty(0);
        $this->getColumnByName('anak_keberapa')->setInputLength(2);
        $this->getColumnByName('anak_keberapa')->setValidationType('numberonly');
        $this->getColumnByName('anak_keberapa')->setMin(1);
        $this->getColumnByName('anak_keberapa')->setLabel('Anak ke-berapa (berdasarkan KK)');

        $this->getColumnByName('kode_pos')->setXtype('numberfield');
        $this->getColumnByName('kode_pos')->setMinLength(5);
        $this->getColumnByName('email')->setValidationType('email');

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

        $this->getColumnByName('nisn')->setMinLength(10);
        $this->getColumnByName('nisn')->setLabel('NISN');
        $this->getColumnByName('nisn')->setHeader('NISN');
        // $this->getColumnByName('nik')->setXtype('numberfield');
        $this->getColumnByName('nik')->setLabel('NIK / No. KITAS (Untuk WNA)');
        $this->getColumnByName('nik')->setHeader('NIK');
        $this->getColumnByName('rt')->setLabel('RT');
        $this->getColumnByName('rt')->setInputLength(2);
        $this->getColumnByName('rw')->setLabel('RW');
        $this->getColumnByName('rw')->setInputLength(2);
        $this->getColumnByName('kode_wilayah')->setLabel('Kecamatan');
        $this->getColumnByName('tanggal_lahir')->setHeader('Tgl lahir');
        $this->getColumnByName('jenis_tinggal_id')->setLabel('Tempat tinggal');
        $this->getColumnByName('jenis_tinggal_id')->setAllowEmpty(0);
        $this->getColumnByName('alat_transportasi_id')->setLabel('Moda transportasi');
        $this->getColumnByName('alat_transportasi_id')->setAllowEmpty(0);
        $this->getColumnByName('nomor_telepon_rumah')->setLabel('Nomor telepon Rumah');
        $this->getColumnByName('nomor_telepon_rumah')->setValidationType('numberonly');
        $this->getColumnByName('nomor_telepon_seluler')->setLabel('Nomor HP');
        $this->getColumnByName('nomor_telepon_seluler')->setValidationType('numberonly');
        $this->getColumnByName('desa_kelurahan')->setLabel('Desa/Kelurahan');
        $this->getColumnByName('kebutuhan_khusus_id')->setAllowEmpty(1);

        $colJk2 = $this->getColumnByName('penerima_kps');
        $colJk2->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colJk2->setLabel('Penerima KPS/PKH');

        $this->getColumnByName('no_kps')->setLabel('No KPS/PKH');


        $fieldSet4 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nama_ayah', 'kebutuhan_khusus_id_ayah', $fieldSet4, 'Data Ayah Kandung');
        $this->getColumnByName('penghasilan_id_ayah')->setColumnsRadio(1);
        $this->getColumnByName('nama_ayah')->setLabel('Nama ayah');
        // $this->getColumnByName('nama_ayah')->setAllowEmpty(0);
        $this->getColumnByName('tahun_lahir_ayah')->setLabel('Tahun lahir ayah');
        $this->getColumnByName('tahun_lahir_ayah')->setInputLength(4);
        $this->getColumnByName('tahun_lahir_ayah')->setMinLength(4);
        $this->getColumnByName('tahun_lahir_ayah')->setValidationType('numberonly');
        $this->getColumnByName('tahun_lahir_ayah')->setXtype('textfield');
        $this->getColumnByName('jenjang_pendidikan_ayah')->setLabel('Pendidikan ayah');
        // $this->getColumnByName('jenjang_pendidikan_ayah')->setAllowEmpty(0);
        $this->getColumnByName('pekerjaan_id_ayah')->setLabel('Pekerjaan ayah');
        // $this->getColumnByName('pekerjaan_id_ayah')->setAllowEmpty(0);
        $this->getColumnByName('penghasilan_id_ayah')->setLabel('Penghasilan ayah');
        // $this->getColumnByName('penghasilan_id_ayah')->setAllowEmpty(0);
        $this->getColumnByName('kebutuhan_khusus_id_ayah')->setLabel('Berkebutuhan khusus ayah');
        $this->getColumnByName('kebutuhan_khusus_id_ayah')->setAllowEmpty(1);

        $fieldSet5 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nama_ibu_kandung', 'kebutuhan_khusus_id_ibu', $fieldSet5, 'Data Ibu Kandung');
        $this->getColumnByName('penghasilan_id_ibu')->setColumnsRadio(1);
        $this->getColumnByName('nama_ibu_kandung')->setLabel('Nama ibu');
        $this->getColumnByName('nama_ibu_kandung')->setColumnWidth('150');
        $this->getColumnByName('tahun_lahir_ibu')->setLabel('Tahun lahir ibu');
        $this->getColumnByName('tahun_lahir_ibu')->setInputLength(4);
        $this->getColumnByName('tahun_lahir_ibu')->setMinLength(4);
        $this->getColumnByName('tahun_lahir_ibu')->setXtype('textfield');
        $this->getColumnByName('tahun_lahir_ibu')->setValidationType('numberonly');
        $this->getColumnByName('jenjang_pendidikan_ibu')->setLabel('Pendidikan');
        $this->getColumnByName('jenjang_pendidikan_ibu')->setAllowEmpty(0);
        $this->getColumnByName('pekerjaan_id_ibu')->setLabel('Pekerjaan ibu');
        $this->getColumnByName('pekerjaan_id_ibu')->setAllowEmpty(0);
        $this->getColumnByName('penghasilan_id_ibu')->setLabel('Penghasilan ibu');
        $this->getColumnByName('penghasilan_id_ibu')->setAllowEmpty(0);
        $this->getColumnByName('pekerjaan_id_ibu')->setAllowEmpty(0);
        $this->getColumnByName('penghasilan_id_ibu')->setAllowEmpty(0);
        $this->getColumnByName('kebutuhan_khusus_id_ibu')->setLabel('Berkebutuhan khusus ibu');
        $this->getColumnByName('kebutuhan_khusus_id_ibu')->setAllowEmpty(1);

        $fieldSet6 = new \DataDikdas\FieldsetInfo();
        $this->addRange('nm_kip', 'penghasilan_id_wali', $fieldSet6, 'Data Wali');

        $colMemilikiWali = $this->getColumnByName('nm_kip');
        $colMemilikiWali->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colMemilikiWali->setLabel('Mempunyai wali');

        $this->getColumnByName('penghasilan_id_wali')->setColumnsRadio(1);
        $this->getColumnByName('nama_wali')->setLabel('Nama wali');
        $this->getColumnByName('tahun_lahir_wali')->setType('string');
        $this->getColumnByName('tahun_lahir_wali')->setLabel('Tahun lahir wali');
        $this->getColumnByName('tahun_lahir_wali')->setInputLength(4);
        $this->getColumnByName('tahun_lahir_wali')->setMinLength(4);
        $this->getColumnByName('tahun_lahir_wali')->setValidationType('numberonly');
        $this->getColumnByName('tahun_lahir_wali')->setXtype('textfield');
        $this->getColumnByName('jenjang_pendidikan_wali')->setLabel('Pendidikan wali');
        $this->getColumnByName('jenjang_pendidikan_wali')->setAllowEmpty(0);
        $this->getColumnByName('pekerjaan_id_wali')->setLabel('Pekerjaan wali');
        $this->getColumnByName('pekerjaan_id_wali')->setAllowEmpty(0);
        $this->getColumnByName('penghasilan_id_wali')->setLabel('Penghasilan wali');

        $this->setInfoBeforeDelete('Bagi Peserta Didik yg sudah lulus, harap keluarkan melalui tombol Registrasi');

        /* $colTerimaKartuKip = $this->getColumnByName('status_data');
        $colTerimaKartuKip->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colTerimaKartuKip->setLabel('Terima fisik kartu (KIP)'); */
        // $this->getColumnByName('status_data')->setLabel('Terima fisik kartu (KIP)');
        // $this->getColumnByName('status_data')->setHideColumn(1);
        $this->getColumnByName('status_data')->setXtype('hidden');
        // $this->getColumnByName('sekolah_id')->setXtype('hidden');

        // $this->getColumnByName('kewarganegaraan')->setXtype('hidden');
        $colPip = $this->getColumnByName('layak_pip');
        $colPip->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colPip->setLabel('Usulan dari sekolah (Layak PIP)');

        $colKip = $this->getColumnByName('penerima_kip');
        $colKip->setEnumValues(array("1" => "Ya" , "0" => "Tidak"));
        $colKip->setLabel('Penerima KIP (Kartu Indonesia Pintar)');
        // $this->getColumnByName('nm_kip')->setLabel('Memiliki wali');

        $this->getColumnByName('id_layak_pip')->setLabel('Alasan layak PIP');
        $this->getColumnByName('id_layak_pip')->setXtype('alasanlayakpipcombo');

        // $this->getColumnByName('id_bank')->setLabel('Bank');
        // $this->getColumnByName('rekening_bank')->setLabel('No rekening bank');

        $fieldSetKontak = new \DataDikdas\FieldsetInfo();
        $this->addRange('nomor_telepon_rumah', 'email', $fieldSetKontak, 'Kontak');

        //custom description
        $this->getColumnByName('peserta_didik_id')->setDescription('');
        $this->getColumnByName('nama')->setDescription('Diisi nama peserta didik sesuai dengan Akte Lahir atau ijazah sebelumnya (SMP/MTs/Paket B).');
        $this->getColumnByName('jenis_kelamin')->setDescription('Pilih jenis kelamin/gender peserta didik.');
        $this->getColumnByName('nisn')->setDescription('Diisi Nomor Induk Siswa Nasional peserta didik (jika memiliki). Jika belum memiliki maka wajib dikosongkan, NISN yang kosong akan dinilai mengajukan NISN ke PDSP');
        $this->getColumnByName('nik')->setDescription('Diisi Nomor Induk Kependudukan peserta didik (jika memiliki). NIK tertera di Kartu Keluarga');
        $this->getColumnByName('tempat_lahir')->setDescription('Diisi tempat lahir peserta didik sesuai dengan Akte Lahir atau ijazah sebelumnya (SD/MI/Paket A).');
        $this->getColumnByName('tanggal_lahir')->setDescription('Diisi tanggal lahir peserta didik sesuai Akte Lahir atau ijazah sebelumnya (SD/MI/Paket A).');
        $this->getColumnByName('agama_id')->setDescription('Pilih agama peserta didik.');
        $this->getColumnByName('kebutuhan_khusus_id')->setDescription('Pilih kebutuhan khusus yang disandang oleh peserta didik. Dapat dipilih lebih dari satu.');
        $this->getColumnByName('alamat_jalan')->setDescription('Diisi nama jalan untuk alamat peserta didik.');
        $this->getColumnByName('rt')->setDescription('Diisi nomor RT alamat peserta didik.');
        $this->getColumnByName('rw')->setDescription('Diisi nomor RW alamat peserta didik.');
        $this->getColumnByName('nama_dusun')->setDescription('Diisi nama dusun alamat peserta didik.');
        $this->getColumnByName('desa_kelurahan')->setDescription('Diisi nama desa alamat peserta didik.');
        $this->getColumnByName('kode_wilayah')->setDescription('Pilih kecamatan alamat peserta didik. Ketikkan nama kecamatan untuk memfilter referensi kecamatan, lalu akan muncul nama kecamatan dan kabupatennya. Pilih kecamatan yang dimaksud');
        $this->getColumnByName('kode_pos')->setDescription('Diisi nomor kode pos alamat peserta didik.');
        $this->getColumnByName('jenis_tinggal_id')->setDescription('Pilih jenis tempat tinggal peserta didik.');
        $this->getColumnByName('alat_transportasi_id')->setDescription('Pilih jenis transportasi utama yang digunakan peserta didik untuk ke sekolah.');
        $this->getColumnByName('nomor_telepon_rumah')->setDescription('Diisi nomor telepon peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali).');
        $this->getColumnByName('nomor_telepon_seluler')->setDescription('Diisi nomor telepon selular peserta didik yang dapat dihubungi (milik pribadi, orang tua, atau wali).');
        $this->getColumnByName('email')->setDescription('Diisi email pribadi milik peserta didik.');
        // $this->getColumnByName('no_skhun')->setDescription('Pilih status peserta didik sebagai penerima KPS (Kartu Penjaminan Sosial), sebagai Ya atau Tidak.');
        $this->getColumnByName('penerima_kps')->setDescription('Apabila status peserta didik sebagai penerima KPS, maka Diisi nomor KPS peserta didik pada kolom ini.');
        $this->getColumnByName('no_kps')->setDescription('Nomor KPS berupa campuran abjad dan angka.');
        $this->getColumnByName('nama_ayah')->setDescription('Diisi nama ayah kandung peserta didik sesuai Akte Lahir atau KK. Hindari penggunaan gelar akademik atau sosial (seperti Dr., Drs., S.Pd, dan H.).');
        $this->getColumnByName('tahun_lahir_ayah')->setDescription('Diisi dengan angka tahun lahir ayah kandung peserta didik.');
        $this->getColumnByName('jenjang_pendidikan_ayah')->setDescription('Pilih pendidikan terakhir ayah kandung peserta didik.');
        $this->getColumnByName('pekerjaan_id_ayah')->setDescription('Pilih pekerjaan utama ayah kandung peserta didik. Pilih Meninggal Dunia apabila ayah kandung peserta didik telah meninggal dunia.');
        $this->getColumnByName('penghasilan_id_ayah')->setDescription('Pilih rentang penghasilan ayah kandung peserta didik. Kosongkan kolom ini apabila ayah kandung peserta didik telah meninggal dunia atau tidak bekerja.');
        $this->getColumnByName('kebutuhan_khusus_id_ayah')->setDescription('Pilih kebutuhan khusus yang disandang oleh ayah peserta didik. Dapat dipilih lebih dari satu.');
        $this->getColumnByName('nama_ibu_kandung')->setDescription('Diisi nama ibu kandung peserta didik sesuai Akte Lahir atau KK. Hindari penggunaan gelar akademik atau sosial (seperti Dr., Drs., S.Pd, dan Hj.).');
        $this->getColumnByName('tahun_lahir_ibu')->setDescription('Diisi dengan angka tahun lahir ibu kandung peserta didik.');
        $this->getColumnByName('jenjang_pendidikan_ibu')->setDescription('Pilih pendidikan terakhir ibu kandung peserta didik.');
        $this->getColumnByName('penghasilan_id_ibu')->setDescription('Pilih rentang penghasilan ibu kandung peserta didik. Kosongkan kolom ini apabila ibu kandung peserta didik telah meninggal dunia, sebagai ibu rumah tangga, atau tidak bekerja.');
        $this->getColumnByName('pekerjaan_id_ibu')->setDescription('Pilih pekerjaan utama ibu kandung peserta didik. Pilih Meninggal Dunia apabila ibu kandung peserta didik telah meninggal dunia. Pilih Lainnya apabila ibu kandung peserta didik adalah ibu rumah tangga.');
        $this->getColumnByName('kebutuhan_khusus_id_ibu')->setDescription('Pilih kebutuhan khusus yang disandang oleh ibu peserta didik. Dapat dipilih lebih dari satu.');
        $this->getColumnByName('nama_wali')->setDescription('Diisi nama wali peserta didik sesuai Akte Lahir atau KK. Hindari penggunaan gelar akademik atau sosial (seperti Dr., Drs., S.Pd, dan H.).');
        $this->getColumnByName('tahun_lahir_wali')->setDescription('Diisi dengan angka tahun lahir wali peserta didik.');
        $this->getColumnByName('jenjang_pendidikan_wali')->setDescription('Pilih pendidikan terakhir wali peserta didik.');
        $this->getColumnByName('pekerjaan_id_wali')->setDescription('Pilih pekerjaan utama wali peserta didik.');
        $this->getColumnByName('penghasilan_id_wali')->setDescription('Pilih rentang penghasilan wali peserta didik.');

    }


}
