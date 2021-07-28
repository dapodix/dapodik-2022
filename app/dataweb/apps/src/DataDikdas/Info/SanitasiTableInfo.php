<?php
namespace DataDikdas\Info;

use DataDikdas\TableInfo;
use DataDikdas\Info\base;

class SanitasiTableInfo extends base\BaseSanitasiTableInfo
{
    const CLASS_NAME = 'DataDikdas.Info.PenggunaTableMap';

    public function __construct(){
        parent::__construct();
    }

    public function setVariables() {
        parent::setVariables();

        // Override below here!
        $arrayData = array (
            // HIDDEN
            // 'ketersediaan_air',
            // 'minum_siswa',
            // 'siswa_bawa_air',
            // 'toilet_siswa_laki',
            // 'toilet_siswa_perempuan',
            // 'toilet_siswa_kk',
            // 'toilet_siswa_kecil',
            // 'memproses_air',
            // semester_id: session.semester_id,
            // sekolah_id: session.sekolah_id,
            
            'sumber_air_id',
            'sumber_air_minum_id',
            'kecukupan_air',
            // 'a_air_mengalir',
            // 'a_sabun_cucitangan',
            'jamban_difabel',
            'tipe_jamban',
            'jml_jamban_l_g',
            'jml_jamban_l_tg',
            'jml_jamban_p_g',
            'jml_jamban_p_tg',
            'jml_jamban_lp_g',
            'jml_jamban_lp_tg',
            'a_sedia_pembalut',
            'kegiatan_cuci_tangan',
            'tempat_cuci_tangan',
            'tempat_cuci_tangan_rusak',
            'a_sabun_air_mengalir',
            'pembuangan_air_limbah',
            'a_kuras_septitank',
            'a_memiliki_solokan',
            'a_tempat_sampah_kelas',
            'a_tempat_sampah_tutup_p',
            'a_cermin_jamban_p',
            'a_memiliki_tps',
            'a_tps_angkut_rutin',
            'a_anggaran_sanitasi',
            'a_melibatkan_sanitasi_siswa',
            
            'a_kemitraan_san_daerah',
            'a_kemitraan_san_puskesmas',
            'a_kemitraan_san_swasta',
            'a_kemitraan_san_non_pem',

            // 'sumber_pdam',
            // 'sumber_terlindungi',
            // 'sumber_tidak_terlindungi',
            // 'sumber_air_hujan',
            // 'sumber_air_kemasan',
            // 'sumber_air_sungai',
            // 'sumber_mata_terlindungi',
            // 'sumber_mata_tdk_terlindungi',
            // 'minum_pdam',
            // 'minum_terlindungi',
            // 'minum_tdk_terlindungi',
            // 'minum_air_hujan',
            // 'minum_air_kemasan',
            // 'minum_air_sungai',
            // 'minum_mata_air_terlindungi',
            // 'minum_mata_air_tdk_terlindungi',
            
            'kie_guru_cuci_tangan',
            'kie_guru_haid',
            'kie_guru_perawatan_toilet',
            'kie_guru_keamanan_pangan',
            'kie_guru_minum_air',
            'kie_kelas_cuci_tangan',
            'kie_kelas_haid',
            'kie_kelas_perawatan_toilet',
            'kie_kelas_keamanan_pangan',
            'kie_kelas_minum_air',
            'kie_toilet_cuci_tangan',
            'kie_toilet_haid',
            'kie_toilet_perawatan_toilet',
            'kie_toilet_keamanan_pangan',
            'kie_toilet_minum_air',
            'kie_selasar_cuci_tangan',
            'kie_selasar_haid',
            'kie_selasar_perawatan_toilet',
            'kie_selasar_keamanan_pangan',
            'kie_selasar_minum_air',
            'kie_uks_cuci_tangan',
            'kie_uks_haid',
            'kie_uks_perawatan_toilet',
            'kie_uks_keamanan_pangan',
            'kie_uks_minum_air',
            'kie_kantin_cuci_tangan',
            'kie_kantin_haid',
            'kie_kantin_perawatan_toilet',
            'kie_kantin_keamanan_pangan',
            'kie_kantin_minum_air'
        );

        for ($i=0; ($i<sizeof($arrayData)); $i++) {
        	$column_name = $arrayData[$i];
        	// echo $column_name."<br>";
        	$this->moveColumn($this->getColumnByName($column_name), $i);
        }

        $fieldSetSdg = new \DataDikdas\FieldsetInfo();
        $this->addRange('sumber_air_id', 'a_kuras_septitank', $fieldSetSdg, 'Variabel Sustainable Development Goals (SDG)');

        $fieldSetUks = new \DataDikdas\FieldsetInfo();
        $this->addRange('a_memiliki_solokan', 'a_melibatkan_sanitasi_siswa', $fieldSetUks, 'Stratifikasi UKS');

        // $this->getColumnByName('sumber_air_id')->setXtype('hidden');
        $this->getColumnByName('ketersediaan_air')->setXtype('hidden');
        $this->getColumnByName('minum_siswa')->setXtype('hidden');
        $this->getColumnByName('siswa_bawa_air')->setXtype('hidden');
        $this->getColumnByName('toilet_siswa_laki')->setXtype('hidden');
        $this->getColumnByName('toilet_siswa_perempuan')->setXtype('hidden');
        $this->getColumnByName('toilet_siswa_kk')->setXtype('hidden');
        $this->getColumnByName('toilet_siswa_kecil')->setXtype('hidden');
        $this->getColumnByName('memproses_air')->setXtype('hidden');
        
        $this->getColumnByName('kecukupan_air')->setLabel('Kecukupan air bersih');
        $this->getColumnByName('kecukupan_air')->setEnumValues(array(1 => 'Tidak cukup sepanjang waktu', 2 => 'Cukup sepanjang waktu'));

        // $this->getColumnByName('a_air_mengalir')->setLabel('Apakah tersedia air mengalir untuk cuci tangan');
        // $this->getColumnByName('a_air_mengalir')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        // $this->getColumnByName('a_sabun_cucitangan')->setLabel('Apakah tersedia sabun untuk cuci tangan');
        // $this->getColumnByName('a_sabun_cucitangan')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('jamban_difabel')->setLabel('Sekolah menyediakan jamban yang dilengkapi dengan fasilitas pendukung untuk digunakan oleh siswa berkebutuhan khusus');
        $this->getColumnByName('jamban_difabel')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));
        
        $this->getColumnByName('tipe_jamban')->setEnumValues(
            array(  '1' => "Leher angsa (toilet duduk/jongkok)",
                    '2' => "Cubluk dengan tutup",
                    '3' => "Jamban menggantung di atas sungai",
                    '4' => "Cubluk tanpa tutup",
                    '9' => "Tidak tersedia jamban"
            )
        );

        $this->getColumnByName('a_sedia_pembalut')->setLabel('Sekolah menyediakan pembalut cadangan');
        $this->getColumnByName('a_sedia_pembalut')->setEnumValues(
            array(  0 => 'Tidak', 
                    1 => 'Menyediakan dengan cara siswi harus membeli', 
                    2 => 'Menyediakan dengan cara memberikan secara gratis'
                ));

        $this->getColumnByName('kegiatan_cuci_tangan')->setLabel('Jumlah hari dalam seminggu siswa mengikuti kegiatan cuci tangan berkelompok');
        $this->getColumnByName('kegiatan_cuci_tangan')->setEnumValues(
            array(  0 => 'Tidak pernah', 
                    1 => '1 hari', 
                    2 => '2 hari',
                    3 => '3 hari',
                    4 => '4 hari',
                    5 => '5 hari'
                ));

        $this->getColumnByName('pembuangan_air_limbah')->setLabel('Sekolah memiliki saluran pembuangan air limbah dari jamban');
        $this->getColumnByName('pembuangan_air_limbah')->setEnumValues(
            array(  1 => 'Ada saluran pembuangan air limbah ke tangki septik atau IPAL', 
                    2 => 'Ada saluran pembuangan air limbah ke selokan/kali/sungai'
                ));

        $this->getColumnByName('a_kuras_septitank')->setLabel('Sekolah pernah menguras tangki septik dalam 3 hingga 5 tahun terakhir dengan truk/motor sedot tinja');
        $this->getColumnByName('a_kuras_septitank')->setEnumValues(array(0 => 'Tidak/Tidak tahu', 1 => 'Ya'));

        $this->getColumnByName('a_memiliki_solokan')->setLabel('Sekolah memiliki selokan untuk menghindari genangan air');
        $this->getColumnByName('a_memiliki_solokan')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_tempat_sampah_kelas')->setLabel('Sekolah menyediakan tempat sampah di setiap ruang kelas (Sesuai permendikbud tentang standar sarpras)');
        $this->getColumnByName('a_tempat_sampah_kelas')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_tempat_sampah_tutup_p')->setLabel('Sekolah menyediakan tempat sampah tertutup di setiap unit jamban perempuan');
        $this->getColumnByName('a_tempat_sampah_tutup_p')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_cermin_jamban_p')->setLabel('Sekolah menyediakan cermin di setiap unit jamban perempuan');
        $this->getColumnByName('a_cermin_jamban_p')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_memiliki_tps')->setLabel('Sekolah memiliki tempat pembuangan sampah sementara (TPS) yang tertutup');
        $this->getColumnByName('a_memiliki_tps')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_tps_angkut_rutin')->setLabel('Sampah dari tempat pembuangan sampah sementara diangkut secara rutin');
        $this->getColumnByName('a_tps_angkut_rutin')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_anggaran_sanitasi')->setLabel('Ada perencanaan & penganggaran untuk kegiatan pemeliharaan dan perawatan sanitasi sekolah');
        $this->getColumnByName('a_anggaran_sanitasi')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('a_melibatkan_sanitasi_siswa')->setLabel('Ada kegiatan rutin yang melibatkan siswa untuk memelihara dan merawat fasilitas sanitasi di sekolah');
        $this->getColumnByName('a_melibatkan_sanitasi_siswa')->setEnumValues(array(0 => 'Tidak', 1 => 'Ya'));

        $this->getColumnByName('tempat_cuci_tangan')->setLabel('Jumlah tempat cuci tangan');
        $this->getColumnByName('tempat_cuci_tangan')->setMinLength(0);
        $this->getColumnByName('tempat_cuci_tangan')->setInputLength(2);

        $this->getColumnByName('tempat_cuci_tangan_rusak')->setLabel('Jumlah tempat cuci tangan rusak');
        $this->getColumnByName('tempat_cuci_tangan_rusak')->setMinLength(0);
        $this->getColumnByName('tempat_cuci_tangan_rusak')->setInputLength(2);

        $this->getColumnByName('a_sabun_air_mengalir')->setLabel('Apakah sabun dan air mengalir pada tempat cuci tangan');
        $this->getColumnByName('a_sabun_air_mengalir')->setEnumValues(array(0 => "Tidak", 1 => "Ya"));

        $kemitraanCheckbox = new \DataDikdas\CheckboxGroupInfo();
        $kemitraanCheckbox->setColumnNumber(2);
		$this->addRange('a_kemitraan_san_daerah', 'a_kemitraan_san_non_pem', $kemitraanCheckbox, 'Ada kemitraan dengan pihak luar untuk sanitasi sekolah');
        $this->getColumnByName('a_kemitraan_san_daerah')->setLabel('Ada, dengan pemerintah daerah');
        $this->getColumnByName('a_kemitraan_san_puskesmas')->setLabel('Ada, dengan puskesmas');
        $this->getColumnByName('a_kemitraan_san_swasta')->setLabel('Ada, dengan perusahaan swasta');
        $this->getColumnByName('a_kemitraan_san_non_pem')->setLabel('Ada, dengan lembaga non-pemerintah');
        
        $this->getColumnByName('jml_jamban_l_g')->setLabel('Jumlah jamban laki-laki dapat digunakan');
        $this->getColumnByName('jml_jamban_l_tg')->setLabel('Jumlah jamban laki-laki tidak dapat digunakan');
        $this->getColumnByName('jml_jamban_p_g')->setLabel('Jumlah jamban perempuan dapat digunakan');
        $this->getColumnByName('jml_jamban_p_tg')->setLabel('Jumlah jamban perempuan tidak dapat digunakan');
        $this->getColumnByName('jml_jamban_lp_g')->setLabel('Jumlah jamban laki-laki/perempuan dapat digunakan');
        $this->getColumnByName('jml_jamban_lp_tg')->setLabel('Jumlah jamban laki-laki/perempuan tidak dapat digunakan');

        // Description for html help
        $this->getColumnByName('sumber_air_id')->setDescription('pilih sumber air bersih pada satuan pendidikan');
        $this->getColumnByName('sumber_air_minum_id')->setDescription('pilih sumber air minum pada satuan pendidikan');
        $this->getColumnByName('ketersediaan_air')->setDescription('pilih kcukupan air bersih cukup atau tidak cukup ');
        $this->getColumnByName('toilet_siswa_laki')->setDescription('diisi jumlah toilet untuk siswa laki-laki');
        $this->getColumnByName('toilet_siswa_perempuan')->setDescription('diisi jumlah toilet untuk siswa perempuan-perempuan');
        $this->getColumnByName('toilet_siswa_kk')->setDescription('diisi jumlah toilet siswa dengan kebutuhan khusus');
        $this->getColumnByName('toilet_siswa_kecil')->setDescription('diisi jumlah toilet siswa k');
        $this->getColumnByName('jml_jamban_l_g')->setDescription('diisi jumlah jamban laki-laki yang digunakan');
        $this->getColumnByName('jml_jamban_l_tg')->setDescription('diisi jumlah jamban laki-laki yang tidak digunakan');
        $this->getColumnByName('jml_jamban_p_g')->setDescription('diisi jumlah jamban perempuan yang digunakan');
        $this->getColumnByName('jml_jamban_p_tg')->setDescription('diisi jumlah jamban perempuan yang tidak digunakan');
        $this->getColumnByName('jml_jamban_lp_g')->setDescription('diisi jumlah jamban bersama yang digunakan');
        $this->getColumnByName('jml_jamban_lp_tg')->setDescription('diisi jumlah jamban bersama yang tidak digunakan');
        $this->getColumnByName('tempat_cuci_tangan')->setDescription('diisi jumlah tempat cuci tangan');
        $this->getColumnByName('tempat_cuci_tangan_rusak')->setDescription('diisi jumlah tempat cuci tangan rusak');
        $this->getColumnByName('a_sabun_air_mengalir')->setDescription('diisi apakah air sabun dan air mengalir pada tempat cuci tangan ?');
        $this->getColumnByName('jamban_difabel')->setDescription('apakah memiliki jamban untuk difabel ?');
        $this->getColumnByName('tipe_jamban')->setDescription('dipilih tipe jamban yang tersedia di satuan pendidikan atau lembaga');
        $this->getColumnByName('a_sedia_pembalut')->setDescription('apakah sekolah menyediakan pembalut di satuan pendidikan');
        $this->getColumnByName('kegiatan_cuci_tangan')->setDescription('apakah sekolah memiliki kegiatan untuk cuci tangan');
        $this->getColumnByName('pembuangan_air_limbah')->setDescription('diisi saluran pembuangan air limbah dari jamban');
        $this->getColumnByName('a_kuras_septitank')->setDescription('diisi keterangan apakah sekolah menguras tangki septik dalam 2-5 tahun terakhir dengan truk atau motor sedot tinja');
        $this->getColumnByName('a_memiliki_solokan')->setDescription('diisi keterangan apakah sekolah memiliki selokan untuk menghindari genangan air');
        $this->getColumnByName('a_tempat_sampah_kelas')->setDescription('diisi keterangan apakah sekolah menyediakan tempat sampah di setiap ruang kelas sesuai dengan Permendikbud tentang standar Sarpras');
        $this->getColumnByName('a_tempat_sampah_tutup_p')->setDescription('diisi keterangan apakah sekolah menyediakan tempat sampah tertutup di setiap unit jamban perempuan');
        $this->getColumnByName('a_cermin_jamban_p')->setDescription('diisi apakah sekolah menyediakan cermin di setiap unit jamban perempuan');
        $this->getColumnByName('a_memiliki_tps')->setDescription('diisi keterangan apakah sekolah memiliki tempat pembuangan sampah sementara (TPS) yang tertutup');
        $this->getColumnByName('a_tps_angkut_rutin')->setDescription('diisi keterangan apakah sampah dari tempat pembuangan sampah sementara diangkut secara rutin');
        $this->getColumnByName('a_anggaran_sanitasi')->setDescription('diisi keterangan apakah sekolah memiliki anggaran untuk kegiatan dan perawatan sanitasi ');
        $this->getColumnByName('a_melibatkan_sanitasi_siswa')->setDescription('diisi keterangan apakah ada kegiatan rutin yang melibatkan siswa untuk memelihara dan merawat fasilitas sanitasi di sekolah');
        $this->getColumnByName('a_kemitraan_san_daerah')->setDescription('diisi keterangan apakah sekolah memiliki kemitraan dengan pihak luar untuk sanitasi sekolah');
        $this->getColumnByName('a_kemitraan_san_puskesmas')->setDescription('diisi keterangan apakah sekolah memiliki kemitraan dengan pihak luar untuk sanitasi sekolah');
        $this->getColumnByName('a_kemitraan_san_swasta')->setDescription('diisi keterangan apakah sekolah memiliki kemitraan dengan pihak luar untuk sanitasi sekolah');
        $this->getColumnByName('a_kemitraan_san_non_pem')->setDescription('diisi keterangan apakah sekolah memiliki kemitraan dengan pihak luar untuk sanitasi sekolah');
        $this->getColumnByName('kie_guru_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun oleh guru');
        $this->getColumnByName('kie_guru_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi oleh guru');
        $this->getColumnByName('kie_guru_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet oleh guru');
        $this->getColumnByName('kie_guru_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan oleh guru');
        $this->getColumnByName('kie_guru_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air oleh guru');
        $this->getColumnByName('kie_kelas_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun di kelas');
        $this->getColumnByName('kie_kelas_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi di kelas');
        $this->getColumnByName('kie_kelas_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet di kelas');
        $this->getColumnByName('kie_kelas_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan di kelas');
        $this->getColumnByName('kie_kelas_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air di kelas');
        $this->getColumnByName('kie_toilet_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun di toilet');
        $this->getColumnByName('kie_toilet_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi di toilet');
        $this->getColumnByName('kie_toilet_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet di toilet');
        $this->getColumnByName('kie_toilet_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan di toilet');
        $this->getColumnByName('kie_toilet_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air di toilet');
        $this->getColumnByName('kie_selasar_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun di selasar');
        $this->getColumnByName('kie_selasar_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi di selasar');
        $this->getColumnByName('kie_selasar_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet di selasar');
        $this->getColumnByName('kie_selasar_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan di selasar');
        $this->getColumnByName('kie_selasar_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air di selasar');
        $this->getColumnByName('kie_uks_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun di UKS');
        $this->getColumnByName('kie_uks_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi di UKS');
        $this->getColumnByName('kie_uks_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet di UKS');
        $this->getColumnByName('kie_uks_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan di UKS');
        $this->getColumnByName('kie_uks_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air di UKS');
        $this->getColumnByName('kie_kantin_cuci_tangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang cuci tangan pakai sabun di kantin');
        $this->getColumnByName('kie_kantin_haid')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang kebersihan dan kesehatan menstruasi di kantin');
        $this->getColumnByName('kie_kantin_perawatan_toilet')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang pemeliharaan dan perawatan toilet di kantin');
        $this->getColumnByName('kie_kantin_keamanan_pangan')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang keamanan pangan di kantin');
        $this->getColumnByName('kie_kantin_minum_air')->setDescription('diisi keterangan apakah ada kegiatan dan media komunikasi, informasi dan edukasi tentang gerakan ayo minum air di kantin');


        // $this->getColumnByName('kecukupan_air')->setDescription('Pilih tingkat kecukupan air sanitasi di sekolah.');
        // $this->getColumnByName('sumber_air_id')->setLabel('Sumber air bersih');
        // $this->getColumnByName('ketersediaan_air')->setLabel('Ketersediaan sumber air bersih dilingkungan sekolah');
        // $this->getColumnByName('ketersediaan_air')->setEnumValues(array("1" => "Ada sumber air", "2" => "Tidak ada sumber air"));
        // $this->getColumnByName('memproses_air')->setLabel('Sekolah memproses air minum sendiri');
        // $this->getColumnByName('minum_siswa')->setLabel('Apakah air minum disediakan oleh sekolah');
        // $this->getColumnByName('minum_siswa')->setEnumValues(array("1" => "Disediakan sekolah", "2" => "Tidak disediakan"));
        // $this->getColumnByName('memproses_air')->setEnumValues(array("1" => "Ya", "2" => "Tidak"));
        // $this->getColumnByName('siswa_bawa_air')->setLabel('Apakah mayoritas siswa membawa botol air minum sendiri');
        // $this->getColumnByName('siswa_bawa_air')->setLabel('Mayoritas Siswa Membawa Air Minum');
        // $this->getColumnByName('siswa_bawa_air')->setEnumValues(array("1" => "Ya (lebih dari 50% siswa membawa botol air minum sendiri)", "2" => "Tidak"));
        // $this->getColumnByName('toilet_siswa_laki')->setLabel('Jumlah toilet utk laki-laki');
        // $this->getColumnByName('toilet_siswa_laki')->setAnchor('40%');
        // $this->getColumnByName('toilet_siswa_laki')->setAnchor('40%');
        // $this->getColumnByName('toilet_siswa_laki')->setMinLength(0);
        // $this->getColumnByName('toilet_siswa_perempuan')->setLabel('Jumlah toilet utk perempuan');
        // $this->getColumnByName('toilet_siswa_perempuan')->setAnchor('40%');
        // $this->getColumnByName('toilet_siswa_perempuan')->setMinLength(0);
        // $this->getColumnByName('toilet_siswa_kk')->setLabel('Jumlah jamban berkebutuhan khusus');
        // $this->getColumnByName('toilet_siswa_kk')->setAnchor('100%');
        // $this->getColumnByName('toilet_siswa_kk')->setMinLength(0);
        // $this->getColumnByName('toilet_siswa_kk')->setInputLength(2);
        // $this->getColumnByName('toilet_siswa_kecil')->setLabel('Jml toilet utk siswa kecil (kls 1 & 2)');
        // $this->getColumnByName('toilet_siswa_kecil')->setAnchor('40%');
        // $this->getColumnByName('toilet_siswa_kecil')->setMinLength(0);
        // $this->getColumnByName('toilet_siswa_kecil')->setMax(9);
        // $this->getColumnByName('toilet_siswa_kecil')->setInputLength(1);
        // $this->getColumnByName('toilet_siswa_kecil')->setXtype('hidden');
        
        // $this->getColumnByName('toilet_siswa_laki')->setXtype('hidden');
        // $this->getColumnByName('toilet_siswa_perempuan')->setXtype('hidden');

        // $this->getColumnByName('sumber_air_id')->setDescription('Pilih sumber air utama sekolah untuk keperluan sanitasi.');
        // $this->getColumnByName('ketersediaan_air')->setDescription('Pilih ketersediaan sumber air utama untuk sanitasi, Ada sumber atau atau Tidak ada sumber air.');
        // $this->getColumnByName('minum_siswa')->setDescription('Pilih penyediaan air minum untuk siswa oleh sekolah, Disediakan oleh sekolah jika disediakan, Tidak disediakan jika sekolah tidak menyediakan air minum untuk siswa.');
        // $this->getColumnByName('memproses_air')->setDescription('Pilih manajemen air oleh sekolah, misalnya memroses air minum untuk warga sekolah. Pilih Ya jika memroses sendiri. Pilih Tidak jika air diproses oleh pihak ketiga (seperti penyediaan air galon untuk minum).');
        // $this->getColumnByName('siswa_bawa_air')->setDescription('Pilih Ya jika peserta didik mayoritas membawa air sendiri. Pilih Tidak jika mayoritas peserta didik tidak membawa air sendiri.');
        // $this->getColumnByName('toilet_siswa_kk')->setDescription('Diisi dengan angka jumlah toilet yang dimiliki sekolah untuk peserta didik dengan kebutuhan khusus.');
        // $this->getColumnByName('toilet_siswa_kecil')->setDescription('Diisi dengan angka jumlah toilet yang dimiliki sekolah untuk peserta didik kelas kecil (kelas I dan II SD). Untuk jenjang SMP tidak perlu mengisi.');
        // $this->getColumnByName('tempat_cuci_tangan')->setDescription('Diisi dengan angka jumlah tempat cuci tangan (wastafel) yang disediakan oleh sekolah.');

        // /Users/hasanchoiri/bin/Sencha/Cmd/sencha-6.0.0.202 app watch

    }

}