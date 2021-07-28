<?php

namespace DataDikdas\Model\om;

use \BasePeer;
use \Criteria;
use \PDO;
use \PDOStatement;
use \Propel;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiPeer;
use DataDikdas\Model\SekolahPeer;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\SumberAirPeer;
use DataDikdas\Model\map\SanitasiTableMap;

/**
 * Base static class for performing query and update operations on the 'sanitasi' table.
 *
 * 
 *
 * @package propel.generator.DataDikdas.Model.om
 */
abstract class BaseSanitasiPeer
{

    /** the default database name for this class */
    const DATABASE_NAME = 'pendataan';

    /** the table name for this class */
    const TABLE_NAME = 'sanitasi';

    /** the related Propel class for this table */
    const OM_CLASS = 'DataDikdas\\Model\\Sanitasi';

    /** the related TableMap class for this table */
    const TM_CLASS = 'SanitasiTableMap';

    /** The total number of columns. */
    const NUM_COLUMNS = 75;

    /** The number of lazy-loaded columns. */
    const NUM_LAZY_LOAD_COLUMNS = 0;

    /** The number of columns to hydrate (NUM_COLUMNS - NUM_LAZY_LOAD_COLUMNS) */
    const NUM_HYDRATE_COLUMNS = 75;

    /** the column name for the sekolah_id field */
    const SEKOLAH_ID = 'sanitasi.sekolah_id';

    /** the column name for the semester_id field */
    const SEMESTER_ID = 'sanitasi.semester_id';

    /** the column name for the sumber_air_id field */
    const SUMBER_AIR_ID = 'sanitasi.sumber_air_id';

    /** the column name for the sumber_air_minum_id field */
    const SUMBER_AIR_MINUM_ID = 'sanitasi.sumber_air_minum_id';

    /** the column name for the create_date field */
    const CREATE_DATE = 'sanitasi.create_date';

    /** the column name for the last_update field */
    const LAST_UPDATE = 'sanitasi.last_update';

    /** the column name for the soft_delete field */
    const SOFT_DELETE = 'sanitasi.soft_delete';

    /** the column name for the last_sync field */
    const LAST_SYNC = 'sanitasi.last_sync';

    /** the column name for the updater_id field */
    const UPDATER_ID = 'sanitasi.updater_id';

    /** the column name for the ketersediaan_air field */
    const KETERSEDIAAN_AIR = 'sanitasi.ketersediaan_air';

    /** the column name for the kecukupan_air field */
    const KECUKUPAN_AIR = 'sanitasi.kecukupan_air';

    /** the column name for the minum_siswa field */
    const MINUM_SISWA = 'sanitasi.minum_siswa';

    /** the column name for the memproses_air field */
    const MEMPROSES_AIR = 'sanitasi.memproses_air';

    /** the column name for the siswa_bawa_air field */
    const SISWA_BAWA_AIR = 'sanitasi.siswa_bawa_air';

    /** the column name for the toilet_siswa_laki field */
    const TOILET_SISWA_LAKI = 'sanitasi.toilet_siswa_laki';

    /** the column name for the toilet_siswa_perempuan field */
    const TOILET_SISWA_PEREMPUAN = 'sanitasi.toilet_siswa_perempuan';

    /** the column name for the toilet_siswa_kk field */
    const TOILET_SISWA_KK = 'sanitasi.toilet_siswa_kk';

    /** the column name for the toilet_siswa_kecil field */
    const TOILET_SISWA_KECIL = 'sanitasi.toilet_siswa_kecil';

    /** the column name for the jml_jamban_l_g field */
    const JML_JAMBAN_L_G = 'sanitasi.jml_jamban_l_g';

    /** the column name for the jml_jamban_l_tg field */
    const JML_JAMBAN_L_TG = 'sanitasi.jml_jamban_l_tg';

    /** the column name for the jml_jamban_p_g field */
    const JML_JAMBAN_P_G = 'sanitasi.jml_jamban_p_g';

    /** the column name for the jml_jamban_p_tg field */
    const JML_JAMBAN_P_TG = 'sanitasi.jml_jamban_p_tg';

    /** the column name for the jml_jamban_lp_g field */
    const JML_JAMBAN_LP_G = 'sanitasi.jml_jamban_lp_g';

    /** the column name for the jml_jamban_lp_tg field */
    const JML_JAMBAN_LP_TG = 'sanitasi.jml_jamban_lp_tg';

    /** the column name for the tempat_cuci_tangan field */
    const TEMPAT_CUCI_TANGAN = 'sanitasi.tempat_cuci_tangan';

    /** the column name for the tempat_cuci_tangan_rusak field */
    const TEMPAT_CUCI_TANGAN_RUSAK = 'sanitasi.tempat_cuci_tangan_rusak';

    /** the column name for the a_sabun_air_mengalir field */
    const A_SABUN_AIR_MENGALIR = 'sanitasi.a_sabun_air_mengalir';

    /** the column name for the jamban_difabel field */
    const JAMBAN_DIFABEL = 'sanitasi.jamban_difabel';

    /** the column name for the tipe_jamban field */
    const TIPE_JAMBAN = 'sanitasi.tipe_jamban';

    /** the column name for the a_sedia_pembalut field */
    const A_SEDIA_PEMBALUT = 'sanitasi.a_sedia_pembalut';

    /** the column name for the kegiatan_cuci_tangan field */
    const KEGIATAN_CUCI_TANGAN = 'sanitasi.kegiatan_cuci_tangan';

    /** the column name for the pembuangan_air_limbah field */
    const PEMBUANGAN_AIR_LIMBAH = 'sanitasi.pembuangan_air_limbah';

    /** the column name for the a_kuras_septitank field */
    const A_KURAS_SEPTITANK = 'sanitasi.a_kuras_septitank';

    /** the column name for the a_memiliki_solokan field */
    const A_MEMILIKI_SOLOKAN = 'sanitasi.a_memiliki_solokan';

    /** the column name for the a_tempat_sampah_kelas field */
    const A_TEMPAT_SAMPAH_KELAS = 'sanitasi.a_tempat_sampah_kelas';

    /** the column name for the a_tempat_sampah_tutup_p field */
    const A_TEMPAT_SAMPAH_TUTUP_P = 'sanitasi.a_tempat_sampah_tutup_p';

    /** the column name for the a_cermin_jamban_p field */
    const A_CERMIN_JAMBAN_P = 'sanitasi.a_cermin_jamban_p';

    /** the column name for the a_memiliki_tps field */
    const A_MEMILIKI_TPS = 'sanitasi.a_memiliki_tps';

    /** the column name for the a_tps_angkut_rutin field */
    const A_TPS_ANGKUT_RUTIN = 'sanitasi.a_tps_angkut_rutin';

    /** the column name for the a_anggaran_sanitasi field */
    const A_ANGGARAN_SANITASI = 'sanitasi.a_anggaran_sanitasi';

    /** the column name for the a_melibatkan_sanitasi_siswa field */
    const A_MELIBATKAN_SANITASI_SISWA = 'sanitasi.a_melibatkan_sanitasi_siswa';

    /** the column name for the a_kemitraan_san_daerah field */
    const A_KEMITRAAN_SAN_DAERAH = 'sanitasi.a_kemitraan_san_daerah';

    /** the column name for the a_kemitraan_san_puskesmas field */
    const A_KEMITRAAN_SAN_PUSKESMAS = 'sanitasi.a_kemitraan_san_puskesmas';

    /** the column name for the a_kemitraan_san_swasta field */
    const A_KEMITRAAN_SAN_SWASTA = 'sanitasi.a_kemitraan_san_swasta';

    /** the column name for the a_kemitraan_san_non_pem field */
    const A_KEMITRAAN_SAN_NON_PEM = 'sanitasi.a_kemitraan_san_non_pem';

    /** the column name for the kie_guru_cuci_tangan field */
    const KIE_GURU_CUCI_TANGAN = 'sanitasi.kie_guru_cuci_tangan';

    /** the column name for the kie_guru_haid field */
    const KIE_GURU_HAID = 'sanitasi.kie_guru_haid';

    /** the column name for the kie_guru_perawatan_toilet field */
    const KIE_GURU_PERAWATAN_TOILET = 'sanitasi.kie_guru_perawatan_toilet';

    /** the column name for the kie_guru_keamanan_pangan field */
    const KIE_GURU_KEAMANAN_PANGAN = 'sanitasi.kie_guru_keamanan_pangan';

    /** the column name for the kie_guru_minum_air field */
    const KIE_GURU_MINUM_AIR = 'sanitasi.kie_guru_minum_air';

    /** the column name for the kie_kelas_cuci_tangan field */
    const KIE_KELAS_CUCI_TANGAN = 'sanitasi.kie_kelas_cuci_tangan';

    /** the column name for the kie_kelas_haid field */
    const KIE_KELAS_HAID = 'sanitasi.kie_kelas_haid';

    /** the column name for the kie_kelas_perawatan_toilet field */
    const KIE_KELAS_PERAWATAN_TOILET = 'sanitasi.kie_kelas_perawatan_toilet';

    /** the column name for the kie_kelas_keamanan_pangan field */
    const KIE_KELAS_KEAMANAN_PANGAN = 'sanitasi.kie_kelas_keamanan_pangan';

    /** the column name for the kie_kelas_minum_air field */
    const KIE_KELAS_MINUM_AIR = 'sanitasi.kie_kelas_minum_air';

    /** the column name for the kie_toilet_cuci_tangan field */
    const KIE_TOILET_CUCI_TANGAN = 'sanitasi.kie_toilet_cuci_tangan';

    /** the column name for the kie_toilet_haid field */
    const KIE_TOILET_HAID = 'sanitasi.kie_toilet_haid';

    /** the column name for the kie_toilet_perawatan_toilet field */
    const KIE_TOILET_PERAWATAN_TOILET = 'sanitasi.kie_toilet_perawatan_toilet';

    /** the column name for the kie_toilet_keamanan_pangan field */
    const KIE_TOILET_KEAMANAN_PANGAN = 'sanitasi.kie_toilet_keamanan_pangan';

    /** the column name for the kie_toilet_minum_air field */
    const KIE_TOILET_MINUM_AIR = 'sanitasi.kie_toilet_minum_air';

    /** the column name for the kie_selasar_cuci_tangan field */
    const KIE_SELASAR_CUCI_TANGAN = 'sanitasi.kie_selasar_cuci_tangan';

    /** the column name for the kie_selasar_haid field */
    const KIE_SELASAR_HAID = 'sanitasi.kie_selasar_haid';

    /** the column name for the kie_selasar_perawatan_toilet field */
    const KIE_SELASAR_PERAWATAN_TOILET = 'sanitasi.kie_selasar_perawatan_toilet';

    /** the column name for the kie_selasar_keamanan_pangan field */
    const KIE_SELASAR_KEAMANAN_PANGAN = 'sanitasi.kie_selasar_keamanan_pangan';

    /** the column name for the kie_selasar_minum_air field */
    const KIE_SELASAR_MINUM_AIR = 'sanitasi.kie_selasar_minum_air';

    /** the column name for the kie_uks_cuci_tangan field */
    const KIE_UKS_CUCI_TANGAN = 'sanitasi.kie_uks_cuci_tangan';

    /** the column name for the kie_uks_haid field */
    const KIE_UKS_HAID = 'sanitasi.kie_uks_haid';

    /** the column name for the kie_uks_perawatan_toilet field */
    const KIE_UKS_PERAWATAN_TOILET = 'sanitasi.kie_uks_perawatan_toilet';

    /** the column name for the kie_uks_keamanan_pangan field */
    const KIE_UKS_KEAMANAN_PANGAN = 'sanitasi.kie_uks_keamanan_pangan';

    /** the column name for the kie_uks_minum_air field */
    const KIE_UKS_MINUM_AIR = 'sanitasi.kie_uks_minum_air';

    /** the column name for the kie_kantin_cuci_tangan field */
    const KIE_KANTIN_CUCI_TANGAN = 'sanitasi.kie_kantin_cuci_tangan';

    /** the column name for the kie_kantin_haid field */
    const KIE_KANTIN_HAID = 'sanitasi.kie_kantin_haid';

    /** the column name for the kie_kantin_perawatan_toilet field */
    const KIE_KANTIN_PERAWATAN_TOILET = 'sanitasi.kie_kantin_perawatan_toilet';

    /** the column name for the kie_kantin_keamanan_pangan field */
    const KIE_KANTIN_KEAMANAN_PANGAN = 'sanitasi.kie_kantin_keamanan_pangan';

    /** the column name for the kie_kantin_minum_air field */
    const KIE_KANTIN_MINUM_AIR = 'sanitasi.kie_kantin_minum_air';

    /** The default string format for model objects of the related table **/
    const DEFAULT_STRING_FORMAT = 'YAML';

    /**
     * An identiy map to hold any loaded instances of Sanitasi objects.
     * This must be public so that other peer classes can access this when hydrating from JOIN
     * queries.
     * @var        array Sanitasi[]
     */
    public static $instances = array();


    /**
     * holds an array of fieldnames
     *
     * first dimension keys are the type constants
     * e.g. SanitasiPeer::$fieldNames[SanitasiPeer::TYPE_PHPNAME][0] = 'Id'
     */
    protected static $fieldNames = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId', 'SemesterId', 'SumberAirId', 'SumberAirMinumId', 'CreateDate', 'LastUpdate', 'SoftDelete', 'LastSync', 'UpdaterId', 'KetersediaanAir', 'KecukupanAir', 'MinumSiswa', 'MemprosesAir', 'SiswaBawaAir', 'ToiletSiswaLaki', 'ToiletSiswaPerempuan', 'ToiletSiswaKk', 'ToiletSiswaKecil', 'JmlJambanLG', 'JmlJambanLTg', 'JmlJambanPG', 'JmlJambanPTg', 'JmlJambanLpG', 'JmlJambanLpTg', 'TempatCuciTangan', 'TempatCuciTanganRusak', 'ASabunAirMengalir', 'JambanDifabel', 'TipeJamban', 'ASediaPembalut', 'KegiatanCuciTangan', 'PembuanganAirLimbah', 'AKurasSeptitank', 'AMemilikiSolokan', 'ATempatSampahKelas', 'ATempatSampahTutupP', 'ACerminJambanP', 'AMemilikiTps', 'ATpsAngkutRutin', 'AAnggaranSanitasi', 'AMelibatkanSanitasiSiswa', 'AKemitraanSanDaerah', 'AKemitraanSanPuskesmas', 'AKemitraanSanSwasta', 'AKemitraanSanNonPem', 'KieGuruCuciTangan', 'KieGuruHaid', 'KieGuruPerawatanToilet', 'KieGuruKeamananPangan', 'KieGuruMinumAir', 'KieKelasCuciTangan', 'KieKelasHaid', 'KieKelasPerawatanToilet', 'KieKelasKeamananPangan', 'KieKelasMinumAir', 'KieToiletCuciTangan', 'KieToiletHaid', 'KieToiletPerawatanToilet', 'KieToiletKeamananPangan', 'KieToiletMinumAir', 'KieSelasarCuciTangan', 'KieSelasarHaid', 'KieSelasarPerawatanToilet', 'KieSelasarKeamananPangan', 'KieSelasarMinumAir', 'KieUksCuciTangan', 'KieUksHaid', 'KieUksPerawatanToilet', 'KieUksKeamananPangan', 'KieUksMinumAir', 'KieKantinCuciTangan', 'KieKantinHaid', 'KieKantinPerawatanToilet', 'KieKantinKeamananPangan', 'KieKantinMinumAir', ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId', 'semesterId', 'sumberAirId', 'sumberAirMinumId', 'createDate', 'lastUpdate', 'softDelete', 'lastSync', 'updaterId', 'ketersediaanAir', 'kecukupanAir', 'minumSiswa', 'memprosesAir', 'siswaBawaAir', 'toiletSiswaLaki', 'toiletSiswaPerempuan', 'toiletSiswaKk', 'toiletSiswaKecil', 'jmlJambanLG', 'jmlJambanLTg', 'jmlJambanPG', 'jmlJambanPTg', 'jmlJambanLpG', 'jmlJambanLpTg', 'tempatCuciTangan', 'tempatCuciTanganRusak', 'aSabunAirMengalir', 'jambanDifabel', 'tipeJamban', 'aSediaPembalut', 'kegiatanCuciTangan', 'pembuanganAirLimbah', 'aKurasSeptitank', 'aMemilikiSolokan', 'aTempatSampahKelas', 'aTempatSampahTutupP', 'aCerminJambanP', 'aMemilikiTps', 'aTpsAngkutRutin', 'aAnggaranSanitasi', 'aMelibatkanSanitasiSiswa', 'aKemitraanSanDaerah', 'aKemitraanSanPuskesmas', 'aKemitraanSanSwasta', 'aKemitraanSanNonPem', 'kieGuruCuciTangan', 'kieGuruHaid', 'kieGuruPerawatanToilet', 'kieGuruKeamananPangan', 'kieGuruMinumAir', 'kieKelasCuciTangan', 'kieKelasHaid', 'kieKelasPerawatanToilet', 'kieKelasKeamananPangan', 'kieKelasMinumAir', 'kieToiletCuciTangan', 'kieToiletHaid', 'kieToiletPerawatanToilet', 'kieToiletKeamananPangan', 'kieToiletMinumAir', 'kieSelasarCuciTangan', 'kieSelasarHaid', 'kieSelasarPerawatanToilet', 'kieSelasarKeamananPangan', 'kieSelasarMinumAir', 'kieUksCuciTangan', 'kieUksHaid', 'kieUksPerawatanToilet', 'kieUksKeamananPangan', 'kieUksMinumAir', 'kieKantinCuciTangan', 'kieKantinHaid', 'kieKantinPerawatanToilet', 'kieKantinKeamananPangan', 'kieKantinMinumAir', ),
        BasePeer::TYPE_COLNAME => array (SanitasiPeer::SEKOLAH_ID, SanitasiPeer::SEMESTER_ID, SanitasiPeer::SUMBER_AIR_ID, SanitasiPeer::SUMBER_AIR_MINUM_ID, SanitasiPeer::CREATE_DATE, SanitasiPeer::LAST_UPDATE, SanitasiPeer::SOFT_DELETE, SanitasiPeer::LAST_SYNC, SanitasiPeer::UPDATER_ID, SanitasiPeer::KETERSEDIAAN_AIR, SanitasiPeer::KECUKUPAN_AIR, SanitasiPeer::MINUM_SISWA, SanitasiPeer::MEMPROSES_AIR, SanitasiPeer::SISWA_BAWA_AIR, SanitasiPeer::TOILET_SISWA_LAKI, SanitasiPeer::TOILET_SISWA_PEREMPUAN, SanitasiPeer::TOILET_SISWA_KK, SanitasiPeer::TOILET_SISWA_KECIL, SanitasiPeer::JML_JAMBAN_L_G, SanitasiPeer::JML_JAMBAN_L_TG, SanitasiPeer::JML_JAMBAN_P_G, SanitasiPeer::JML_JAMBAN_P_TG, SanitasiPeer::JML_JAMBAN_LP_G, SanitasiPeer::JML_JAMBAN_LP_TG, SanitasiPeer::TEMPAT_CUCI_TANGAN, SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK, SanitasiPeer::A_SABUN_AIR_MENGALIR, SanitasiPeer::JAMBAN_DIFABEL, SanitasiPeer::TIPE_JAMBAN, SanitasiPeer::A_SEDIA_PEMBALUT, SanitasiPeer::KEGIATAN_CUCI_TANGAN, SanitasiPeer::PEMBUANGAN_AIR_LIMBAH, SanitasiPeer::A_KURAS_SEPTITANK, SanitasiPeer::A_MEMILIKI_SOLOKAN, SanitasiPeer::A_TEMPAT_SAMPAH_KELAS, SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P, SanitasiPeer::A_CERMIN_JAMBAN_P, SanitasiPeer::A_MEMILIKI_TPS, SanitasiPeer::A_TPS_ANGKUT_RUTIN, SanitasiPeer::A_ANGGARAN_SANITASI, SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA, SanitasiPeer::A_KEMITRAAN_SAN_DAERAH, SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS, SanitasiPeer::A_KEMITRAAN_SAN_SWASTA, SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM, SanitasiPeer::KIE_GURU_CUCI_TANGAN, SanitasiPeer::KIE_GURU_HAID, SanitasiPeer::KIE_GURU_PERAWATAN_TOILET, SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN, SanitasiPeer::KIE_GURU_MINUM_AIR, SanitasiPeer::KIE_KELAS_CUCI_TANGAN, SanitasiPeer::KIE_KELAS_HAID, SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET, SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN, SanitasiPeer::KIE_KELAS_MINUM_AIR, SanitasiPeer::KIE_TOILET_CUCI_TANGAN, SanitasiPeer::KIE_TOILET_HAID, SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET, SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN, SanitasiPeer::KIE_TOILET_MINUM_AIR, SanitasiPeer::KIE_SELASAR_CUCI_TANGAN, SanitasiPeer::KIE_SELASAR_HAID, SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET, SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN, SanitasiPeer::KIE_SELASAR_MINUM_AIR, SanitasiPeer::KIE_UKS_CUCI_TANGAN, SanitasiPeer::KIE_UKS_HAID, SanitasiPeer::KIE_UKS_PERAWATAN_TOILET, SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN, SanitasiPeer::KIE_UKS_MINUM_AIR, SanitasiPeer::KIE_KANTIN_CUCI_TANGAN, SanitasiPeer::KIE_KANTIN_HAID, SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET, SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN, SanitasiPeer::KIE_KANTIN_MINUM_AIR, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID', 'SEMESTER_ID', 'SUMBER_AIR_ID', 'SUMBER_AIR_MINUM_ID', 'CREATE_DATE', 'LAST_UPDATE', 'SOFT_DELETE', 'LAST_SYNC', 'UPDATER_ID', 'KETERSEDIAAN_AIR', 'KECUKUPAN_AIR', 'MINUM_SISWA', 'MEMPROSES_AIR', 'SISWA_BAWA_AIR', 'TOILET_SISWA_LAKI', 'TOILET_SISWA_PEREMPUAN', 'TOILET_SISWA_KK', 'TOILET_SISWA_KECIL', 'JML_JAMBAN_L_G', 'JML_JAMBAN_L_TG', 'JML_JAMBAN_P_G', 'JML_JAMBAN_P_TG', 'JML_JAMBAN_LP_G', 'JML_JAMBAN_LP_TG', 'TEMPAT_CUCI_TANGAN', 'TEMPAT_CUCI_TANGAN_RUSAK', 'A_SABUN_AIR_MENGALIR', 'JAMBAN_DIFABEL', 'TIPE_JAMBAN', 'A_SEDIA_PEMBALUT', 'KEGIATAN_CUCI_TANGAN', 'PEMBUANGAN_AIR_LIMBAH', 'A_KURAS_SEPTITANK', 'A_MEMILIKI_SOLOKAN', 'A_TEMPAT_SAMPAH_KELAS', 'A_TEMPAT_SAMPAH_TUTUP_P', 'A_CERMIN_JAMBAN_P', 'A_MEMILIKI_TPS', 'A_TPS_ANGKUT_RUTIN', 'A_ANGGARAN_SANITASI', 'A_MELIBATKAN_SANITASI_SISWA', 'A_KEMITRAAN_SAN_DAERAH', 'A_KEMITRAAN_SAN_PUSKESMAS', 'A_KEMITRAAN_SAN_SWASTA', 'A_KEMITRAAN_SAN_NON_PEM', 'KIE_GURU_CUCI_TANGAN', 'KIE_GURU_HAID', 'KIE_GURU_PERAWATAN_TOILET', 'KIE_GURU_KEAMANAN_PANGAN', 'KIE_GURU_MINUM_AIR', 'KIE_KELAS_CUCI_TANGAN', 'KIE_KELAS_HAID', 'KIE_KELAS_PERAWATAN_TOILET', 'KIE_KELAS_KEAMANAN_PANGAN', 'KIE_KELAS_MINUM_AIR', 'KIE_TOILET_CUCI_TANGAN', 'KIE_TOILET_HAID', 'KIE_TOILET_PERAWATAN_TOILET', 'KIE_TOILET_KEAMANAN_PANGAN', 'KIE_TOILET_MINUM_AIR', 'KIE_SELASAR_CUCI_TANGAN', 'KIE_SELASAR_HAID', 'KIE_SELASAR_PERAWATAN_TOILET', 'KIE_SELASAR_KEAMANAN_PANGAN', 'KIE_SELASAR_MINUM_AIR', 'KIE_UKS_CUCI_TANGAN', 'KIE_UKS_HAID', 'KIE_UKS_PERAWATAN_TOILET', 'KIE_UKS_KEAMANAN_PANGAN', 'KIE_UKS_MINUM_AIR', 'KIE_KANTIN_CUCI_TANGAN', 'KIE_KANTIN_HAID', 'KIE_KANTIN_PERAWATAN_TOILET', 'KIE_KANTIN_KEAMANAN_PANGAN', 'KIE_KANTIN_MINUM_AIR', ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id', 'semester_id', 'sumber_air_id', 'sumber_air_minum_id', 'create_date', 'last_update', 'soft_delete', 'last_sync', 'updater_id', 'ketersediaan_air', 'kecukupan_air', 'minum_siswa', 'memproses_air', 'siswa_bawa_air', 'toilet_siswa_laki', 'toilet_siswa_perempuan', 'toilet_siswa_kk', 'toilet_siswa_kecil', 'jml_jamban_l_g', 'jml_jamban_l_tg', 'jml_jamban_p_g', 'jml_jamban_p_tg', 'jml_jamban_lp_g', 'jml_jamban_lp_tg', 'tempat_cuci_tangan', 'tempat_cuci_tangan_rusak', 'a_sabun_air_mengalir', 'jamban_difabel', 'tipe_jamban', 'a_sedia_pembalut', 'kegiatan_cuci_tangan', 'pembuangan_air_limbah', 'a_kuras_septitank', 'a_memiliki_solokan', 'a_tempat_sampah_kelas', 'a_tempat_sampah_tutup_p', 'a_cermin_jamban_p', 'a_memiliki_tps', 'a_tps_angkut_rutin', 'a_anggaran_sanitasi', 'a_melibatkan_sanitasi_siswa', 'a_kemitraan_san_daerah', 'a_kemitraan_san_puskesmas', 'a_kemitraan_san_swasta', 'a_kemitraan_san_non_pem', 'kie_guru_cuci_tangan', 'kie_guru_haid', 'kie_guru_perawatan_toilet', 'kie_guru_keamanan_pangan', 'kie_guru_minum_air', 'kie_kelas_cuci_tangan', 'kie_kelas_haid', 'kie_kelas_perawatan_toilet', 'kie_kelas_keamanan_pangan', 'kie_kelas_minum_air', 'kie_toilet_cuci_tangan', 'kie_toilet_haid', 'kie_toilet_perawatan_toilet', 'kie_toilet_keamanan_pangan', 'kie_toilet_minum_air', 'kie_selasar_cuci_tangan', 'kie_selasar_haid', 'kie_selasar_perawatan_toilet', 'kie_selasar_keamanan_pangan', 'kie_selasar_minum_air', 'kie_uks_cuci_tangan', 'kie_uks_haid', 'kie_uks_perawatan_toilet', 'kie_uks_keamanan_pangan', 'kie_uks_minum_air', 'kie_kantin_cuci_tangan', 'kie_kantin_haid', 'kie_kantin_perawatan_toilet', 'kie_kantin_keamanan_pangan', 'kie_kantin_minum_air', ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, )
    );

    /**
     * holds an array of keys for quick access to the fieldnames array
     *
     * first dimension keys are the type constants
     * e.g. SanitasiPeer::$fieldNames[BasePeer::TYPE_PHPNAME]['Id'] = 0
     */
    protected static $fieldKeys = array (
        BasePeer::TYPE_PHPNAME => array ('SekolahId' => 0, 'SemesterId' => 1, 'SumberAirId' => 2, 'SumberAirMinumId' => 3, 'CreateDate' => 4, 'LastUpdate' => 5, 'SoftDelete' => 6, 'LastSync' => 7, 'UpdaterId' => 8, 'KetersediaanAir' => 9, 'KecukupanAir' => 10, 'MinumSiswa' => 11, 'MemprosesAir' => 12, 'SiswaBawaAir' => 13, 'ToiletSiswaLaki' => 14, 'ToiletSiswaPerempuan' => 15, 'ToiletSiswaKk' => 16, 'ToiletSiswaKecil' => 17, 'JmlJambanLG' => 18, 'JmlJambanLTg' => 19, 'JmlJambanPG' => 20, 'JmlJambanPTg' => 21, 'JmlJambanLpG' => 22, 'JmlJambanLpTg' => 23, 'TempatCuciTangan' => 24, 'TempatCuciTanganRusak' => 25, 'ASabunAirMengalir' => 26, 'JambanDifabel' => 27, 'TipeJamban' => 28, 'ASediaPembalut' => 29, 'KegiatanCuciTangan' => 30, 'PembuanganAirLimbah' => 31, 'AKurasSeptitank' => 32, 'AMemilikiSolokan' => 33, 'ATempatSampahKelas' => 34, 'ATempatSampahTutupP' => 35, 'ACerminJambanP' => 36, 'AMemilikiTps' => 37, 'ATpsAngkutRutin' => 38, 'AAnggaranSanitasi' => 39, 'AMelibatkanSanitasiSiswa' => 40, 'AKemitraanSanDaerah' => 41, 'AKemitraanSanPuskesmas' => 42, 'AKemitraanSanSwasta' => 43, 'AKemitraanSanNonPem' => 44, 'KieGuruCuciTangan' => 45, 'KieGuruHaid' => 46, 'KieGuruPerawatanToilet' => 47, 'KieGuruKeamananPangan' => 48, 'KieGuruMinumAir' => 49, 'KieKelasCuciTangan' => 50, 'KieKelasHaid' => 51, 'KieKelasPerawatanToilet' => 52, 'KieKelasKeamananPangan' => 53, 'KieKelasMinumAir' => 54, 'KieToiletCuciTangan' => 55, 'KieToiletHaid' => 56, 'KieToiletPerawatanToilet' => 57, 'KieToiletKeamananPangan' => 58, 'KieToiletMinumAir' => 59, 'KieSelasarCuciTangan' => 60, 'KieSelasarHaid' => 61, 'KieSelasarPerawatanToilet' => 62, 'KieSelasarKeamananPangan' => 63, 'KieSelasarMinumAir' => 64, 'KieUksCuciTangan' => 65, 'KieUksHaid' => 66, 'KieUksPerawatanToilet' => 67, 'KieUksKeamananPangan' => 68, 'KieUksMinumAir' => 69, 'KieKantinCuciTangan' => 70, 'KieKantinHaid' => 71, 'KieKantinPerawatanToilet' => 72, 'KieKantinKeamananPangan' => 73, 'KieKantinMinumAir' => 74, ),
        BasePeer::TYPE_STUDLYPHPNAME => array ('sekolahId' => 0, 'semesterId' => 1, 'sumberAirId' => 2, 'sumberAirMinumId' => 3, 'createDate' => 4, 'lastUpdate' => 5, 'softDelete' => 6, 'lastSync' => 7, 'updaterId' => 8, 'ketersediaanAir' => 9, 'kecukupanAir' => 10, 'minumSiswa' => 11, 'memprosesAir' => 12, 'siswaBawaAir' => 13, 'toiletSiswaLaki' => 14, 'toiletSiswaPerempuan' => 15, 'toiletSiswaKk' => 16, 'toiletSiswaKecil' => 17, 'jmlJambanLG' => 18, 'jmlJambanLTg' => 19, 'jmlJambanPG' => 20, 'jmlJambanPTg' => 21, 'jmlJambanLpG' => 22, 'jmlJambanLpTg' => 23, 'tempatCuciTangan' => 24, 'tempatCuciTanganRusak' => 25, 'aSabunAirMengalir' => 26, 'jambanDifabel' => 27, 'tipeJamban' => 28, 'aSediaPembalut' => 29, 'kegiatanCuciTangan' => 30, 'pembuanganAirLimbah' => 31, 'aKurasSeptitank' => 32, 'aMemilikiSolokan' => 33, 'aTempatSampahKelas' => 34, 'aTempatSampahTutupP' => 35, 'aCerminJambanP' => 36, 'aMemilikiTps' => 37, 'aTpsAngkutRutin' => 38, 'aAnggaranSanitasi' => 39, 'aMelibatkanSanitasiSiswa' => 40, 'aKemitraanSanDaerah' => 41, 'aKemitraanSanPuskesmas' => 42, 'aKemitraanSanSwasta' => 43, 'aKemitraanSanNonPem' => 44, 'kieGuruCuciTangan' => 45, 'kieGuruHaid' => 46, 'kieGuruPerawatanToilet' => 47, 'kieGuruKeamananPangan' => 48, 'kieGuruMinumAir' => 49, 'kieKelasCuciTangan' => 50, 'kieKelasHaid' => 51, 'kieKelasPerawatanToilet' => 52, 'kieKelasKeamananPangan' => 53, 'kieKelasMinumAir' => 54, 'kieToiletCuciTangan' => 55, 'kieToiletHaid' => 56, 'kieToiletPerawatanToilet' => 57, 'kieToiletKeamananPangan' => 58, 'kieToiletMinumAir' => 59, 'kieSelasarCuciTangan' => 60, 'kieSelasarHaid' => 61, 'kieSelasarPerawatanToilet' => 62, 'kieSelasarKeamananPangan' => 63, 'kieSelasarMinumAir' => 64, 'kieUksCuciTangan' => 65, 'kieUksHaid' => 66, 'kieUksPerawatanToilet' => 67, 'kieUksKeamananPangan' => 68, 'kieUksMinumAir' => 69, 'kieKantinCuciTangan' => 70, 'kieKantinHaid' => 71, 'kieKantinPerawatanToilet' => 72, 'kieKantinKeamananPangan' => 73, 'kieKantinMinumAir' => 74, ),
        BasePeer::TYPE_COLNAME => array (SanitasiPeer::SEKOLAH_ID => 0, SanitasiPeer::SEMESTER_ID => 1, SanitasiPeer::SUMBER_AIR_ID => 2, SanitasiPeer::SUMBER_AIR_MINUM_ID => 3, SanitasiPeer::CREATE_DATE => 4, SanitasiPeer::LAST_UPDATE => 5, SanitasiPeer::SOFT_DELETE => 6, SanitasiPeer::LAST_SYNC => 7, SanitasiPeer::UPDATER_ID => 8, SanitasiPeer::KETERSEDIAAN_AIR => 9, SanitasiPeer::KECUKUPAN_AIR => 10, SanitasiPeer::MINUM_SISWA => 11, SanitasiPeer::MEMPROSES_AIR => 12, SanitasiPeer::SISWA_BAWA_AIR => 13, SanitasiPeer::TOILET_SISWA_LAKI => 14, SanitasiPeer::TOILET_SISWA_PEREMPUAN => 15, SanitasiPeer::TOILET_SISWA_KK => 16, SanitasiPeer::TOILET_SISWA_KECIL => 17, SanitasiPeer::JML_JAMBAN_L_G => 18, SanitasiPeer::JML_JAMBAN_L_TG => 19, SanitasiPeer::JML_JAMBAN_P_G => 20, SanitasiPeer::JML_JAMBAN_P_TG => 21, SanitasiPeer::JML_JAMBAN_LP_G => 22, SanitasiPeer::JML_JAMBAN_LP_TG => 23, SanitasiPeer::TEMPAT_CUCI_TANGAN => 24, SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK => 25, SanitasiPeer::A_SABUN_AIR_MENGALIR => 26, SanitasiPeer::JAMBAN_DIFABEL => 27, SanitasiPeer::TIPE_JAMBAN => 28, SanitasiPeer::A_SEDIA_PEMBALUT => 29, SanitasiPeer::KEGIATAN_CUCI_TANGAN => 30, SanitasiPeer::PEMBUANGAN_AIR_LIMBAH => 31, SanitasiPeer::A_KURAS_SEPTITANK => 32, SanitasiPeer::A_MEMILIKI_SOLOKAN => 33, SanitasiPeer::A_TEMPAT_SAMPAH_KELAS => 34, SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P => 35, SanitasiPeer::A_CERMIN_JAMBAN_P => 36, SanitasiPeer::A_MEMILIKI_TPS => 37, SanitasiPeer::A_TPS_ANGKUT_RUTIN => 38, SanitasiPeer::A_ANGGARAN_SANITASI => 39, SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA => 40, SanitasiPeer::A_KEMITRAAN_SAN_DAERAH => 41, SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS => 42, SanitasiPeer::A_KEMITRAAN_SAN_SWASTA => 43, SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM => 44, SanitasiPeer::KIE_GURU_CUCI_TANGAN => 45, SanitasiPeer::KIE_GURU_HAID => 46, SanitasiPeer::KIE_GURU_PERAWATAN_TOILET => 47, SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN => 48, SanitasiPeer::KIE_GURU_MINUM_AIR => 49, SanitasiPeer::KIE_KELAS_CUCI_TANGAN => 50, SanitasiPeer::KIE_KELAS_HAID => 51, SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET => 52, SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN => 53, SanitasiPeer::KIE_KELAS_MINUM_AIR => 54, SanitasiPeer::KIE_TOILET_CUCI_TANGAN => 55, SanitasiPeer::KIE_TOILET_HAID => 56, SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET => 57, SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN => 58, SanitasiPeer::KIE_TOILET_MINUM_AIR => 59, SanitasiPeer::KIE_SELASAR_CUCI_TANGAN => 60, SanitasiPeer::KIE_SELASAR_HAID => 61, SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET => 62, SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN => 63, SanitasiPeer::KIE_SELASAR_MINUM_AIR => 64, SanitasiPeer::KIE_UKS_CUCI_TANGAN => 65, SanitasiPeer::KIE_UKS_HAID => 66, SanitasiPeer::KIE_UKS_PERAWATAN_TOILET => 67, SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN => 68, SanitasiPeer::KIE_UKS_MINUM_AIR => 69, SanitasiPeer::KIE_KANTIN_CUCI_TANGAN => 70, SanitasiPeer::KIE_KANTIN_HAID => 71, SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET => 72, SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN => 73, SanitasiPeer::KIE_KANTIN_MINUM_AIR => 74, ),
        BasePeer::TYPE_RAW_COLNAME => array ('SEKOLAH_ID' => 0, 'SEMESTER_ID' => 1, 'SUMBER_AIR_ID' => 2, 'SUMBER_AIR_MINUM_ID' => 3, 'CREATE_DATE' => 4, 'LAST_UPDATE' => 5, 'SOFT_DELETE' => 6, 'LAST_SYNC' => 7, 'UPDATER_ID' => 8, 'KETERSEDIAAN_AIR' => 9, 'KECUKUPAN_AIR' => 10, 'MINUM_SISWA' => 11, 'MEMPROSES_AIR' => 12, 'SISWA_BAWA_AIR' => 13, 'TOILET_SISWA_LAKI' => 14, 'TOILET_SISWA_PEREMPUAN' => 15, 'TOILET_SISWA_KK' => 16, 'TOILET_SISWA_KECIL' => 17, 'JML_JAMBAN_L_G' => 18, 'JML_JAMBAN_L_TG' => 19, 'JML_JAMBAN_P_G' => 20, 'JML_JAMBAN_P_TG' => 21, 'JML_JAMBAN_LP_G' => 22, 'JML_JAMBAN_LP_TG' => 23, 'TEMPAT_CUCI_TANGAN' => 24, 'TEMPAT_CUCI_TANGAN_RUSAK' => 25, 'A_SABUN_AIR_MENGALIR' => 26, 'JAMBAN_DIFABEL' => 27, 'TIPE_JAMBAN' => 28, 'A_SEDIA_PEMBALUT' => 29, 'KEGIATAN_CUCI_TANGAN' => 30, 'PEMBUANGAN_AIR_LIMBAH' => 31, 'A_KURAS_SEPTITANK' => 32, 'A_MEMILIKI_SOLOKAN' => 33, 'A_TEMPAT_SAMPAH_KELAS' => 34, 'A_TEMPAT_SAMPAH_TUTUP_P' => 35, 'A_CERMIN_JAMBAN_P' => 36, 'A_MEMILIKI_TPS' => 37, 'A_TPS_ANGKUT_RUTIN' => 38, 'A_ANGGARAN_SANITASI' => 39, 'A_MELIBATKAN_SANITASI_SISWA' => 40, 'A_KEMITRAAN_SAN_DAERAH' => 41, 'A_KEMITRAAN_SAN_PUSKESMAS' => 42, 'A_KEMITRAAN_SAN_SWASTA' => 43, 'A_KEMITRAAN_SAN_NON_PEM' => 44, 'KIE_GURU_CUCI_TANGAN' => 45, 'KIE_GURU_HAID' => 46, 'KIE_GURU_PERAWATAN_TOILET' => 47, 'KIE_GURU_KEAMANAN_PANGAN' => 48, 'KIE_GURU_MINUM_AIR' => 49, 'KIE_KELAS_CUCI_TANGAN' => 50, 'KIE_KELAS_HAID' => 51, 'KIE_KELAS_PERAWATAN_TOILET' => 52, 'KIE_KELAS_KEAMANAN_PANGAN' => 53, 'KIE_KELAS_MINUM_AIR' => 54, 'KIE_TOILET_CUCI_TANGAN' => 55, 'KIE_TOILET_HAID' => 56, 'KIE_TOILET_PERAWATAN_TOILET' => 57, 'KIE_TOILET_KEAMANAN_PANGAN' => 58, 'KIE_TOILET_MINUM_AIR' => 59, 'KIE_SELASAR_CUCI_TANGAN' => 60, 'KIE_SELASAR_HAID' => 61, 'KIE_SELASAR_PERAWATAN_TOILET' => 62, 'KIE_SELASAR_KEAMANAN_PANGAN' => 63, 'KIE_SELASAR_MINUM_AIR' => 64, 'KIE_UKS_CUCI_TANGAN' => 65, 'KIE_UKS_HAID' => 66, 'KIE_UKS_PERAWATAN_TOILET' => 67, 'KIE_UKS_KEAMANAN_PANGAN' => 68, 'KIE_UKS_MINUM_AIR' => 69, 'KIE_KANTIN_CUCI_TANGAN' => 70, 'KIE_KANTIN_HAID' => 71, 'KIE_KANTIN_PERAWATAN_TOILET' => 72, 'KIE_KANTIN_KEAMANAN_PANGAN' => 73, 'KIE_KANTIN_MINUM_AIR' => 74, ),
        BasePeer::TYPE_FIELDNAME => array ('sekolah_id' => 0, 'semester_id' => 1, 'sumber_air_id' => 2, 'sumber_air_minum_id' => 3, 'create_date' => 4, 'last_update' => 5, 'soft_delete' => 6, 'last_sync' => 7, 'updater_id' => 8, 'ketersediaan_air' => 9, 'kecukupan_air' => 10, 'minum_siswa' => 11, 'memproses_air' => 12, 'siswa_bawa_air' => 13, 'toilet_siswa_laki' => 14, 'toilet_siswa_perempuan' => 15, 'toilet_siswa_kk' => 16, 'toilet_siswa_kecil' => 17, 'jml_jamban_l_g' => 18, 'jml_jamban_l_tg' => 19, 'jml_jamban_p_g' => 20, 'jml_jamban_p_tg' => 21, 'jml_jamban_lp_g' => 22, 'jml_jamban_lp_tg' => 23, 'tempat_cuci_tangan' => 24, 'tempat_cuci_tangan_rusak' => 25, 'a_sabun_air_mengalir' => 26, 'jamban_difabel' => 27, 'tipe_jamban' => 28, 'a_sedia_pembalut' => 29, 'kegiatan_cuci_tangan' => 30, 'pembuangan_air_limbah' => 31, 'a_kuras_septitank' => 32, 'a_memiliki_solokan' => 33, 'a_tempat_sampah_kelas' => 34, 'a_tempat_sampah_tutup_p' => 35, 'a_cermin_jamban_p' => 36, 'a_memiliki_tps' => 37, 'a_tps_angkut_rutin' => 38, 'a_anggaran_sanitasi' => 39, 'a_melibatkan_sanitasi_siswa' => 40, 'a_kemitraan_san_daerah' => 41, 'a_kemitraan_san_puskesmas' => 42, 'a_kemitraan_san_swasta' => 43, 'a_kemitraan_san_non_pem' => 44, 'kie_guru_cuci_tangan' => 45, 'kie_guru_haid' => 46, 'kie_guru_perawatan_toilet' => 47, 'kie_guru_keamanan_pangan' => 48, 'kie_guru_minum_air' => 49, 'kie_kelas_cuci_tangan' => 50, 'kie_kelas_haid' => 51, 'kie_kelas_perawatan_toilet' => 52, 'kie_kelas_keamanan_pangan' => 53, 'kie_kelas_minum_air' => 54, 'kie_toilet_cuci_tangan' => 55, 'kie_toilet_haid' => 56, 'kie_toilet_perawatan_toilet' => 57, 'kie_toilet_keamanan_pangan' => 58, 'kie_toilet_minum_air' => 59, 'kie_selasar_cuci_tangan' => 60, 'kie_selasar_haid' => 61, 'kie_selasar_perawatan_toilet' => 62, 'kie_selasar_keamanan_pangan' => 63, 'kie_selasar_minum_air' => 64, 'kie_uks_cuci_tangan' => 65, 'kie_uks_haid' => 66, 'kie_uks_perawatan_toilet' => 67, 'kie_uks_keamanan_pangan' => 68, 'kie_uks_minum_air' => 69, 'kie_kantin_cuci_tangan' => 70, 'kie_kantin_haid' => 71, 'kie_kantin_perawatan_toilet' => 72, 'kie_kantin_keamanan_pangan' => 73, 'kie_kantin_minum_air' => 74, ),
        BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, )
    );

    /**
     * Translates a fieldname to another type
     *
     * @param      string $name field name
     * @param      string $fromType One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                         BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @param      string $toType   One of the class type constants
     * @return string          translated name of the field.
     * @throws PropelException - if the specified name could not be found in the fieldname mappings.
     */
    public static function translateFieldName($name, $fromType, $toType)
    {
        $toNames = SanitasiPeer::getFieldNames($toType);
        $key = isset(SanitasiPeer::$fieldKeys[$fromType][$name]) ? SanitasiPeer::$fieldKeys[$fromType][$name] : null;
        if ($key === null) {
            throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(SanitasiPeer::$fieldKeys[$fromType], true));
        }

        return $toNames[$key];
    }

    /**
     * Returns an array of field names.
     *
     * @param      string $type The type of fieldnames to return:
     *                      One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                      BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM
     * @return array           A list of field names
     * @throws PropelException - if the type is not valid.
     */
    public static function getFieldNames($type = BasePeer::TYPE_PHPNAME)
    {
        if (!array_key_exists($type, SanitasiPeer::$fieldNames)) {
            throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME, BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM. ' . $type . ' was given.');
        }

        return SanitasiPeer::$fieldNames[$type];
    }

    /**
     * Convenience method which changes table.column to alias.column.
     *
     * Using this method you can maintain SQL abstraction while using column aliases.
     * <code>
     *		$c->addAlias("alias1", TablePeer::TABLE_NAME);
     *		$c->addJoin(TablePeer::alias("alias1", TablePeer::PRIMARY_KEY_COLUMN), TablePeer::PRIMARY_KEY_COLUMN);
     * </code>
     * @param      string $alias The alias for the current table.
     * @param      string $column The column name for current table. (i.e. SanitasiPeer::COLUMN_NAME).
     * @return string
     */
    public static function alias($alias, $column)
    {
        return str_replace(SanitasiPeer::TABLE_NAME.'.', $alias.'.', $column);
    }

    /**
     * Add all the columns needed to create a new object.
     *
     * Note: any columns that were marked with lazyLoad="true" in the
     * XML schema will not be added to the select list and only loaded
     * on demand.
     *
     * @param      Criteria $criteria object containing the columns to add.
     * @param      string   $alias    optional table alias
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function addSelectColumns(Criteria $criteria, $alias = null)
    {
        if (null === $alias) {
            $criteria->addSelectColumn(SanitasiPeer::SEKOLAH_ID);
            $criteria->addSelectColumn(SanitasiPeer::SEMESTER_ID);
            $criteria->addSelectColumn(SanitasiPeer::SUMBER_AIR_ID);
            $criteria->addSelectColumn(SanitasiPeer::SUMBER_AIR_MINUM_ID);
            $criteria->addSelectColumn(SanitasiPeer::CREATE_DATE);
            $criteria->addSelectColumn(SanitasiPeer::LAST_UPDATE);
            $criteria->addSelectColumn(SanitasiPeer::SOFT_DELETE);
            $criteria->addSelectColumn(SanitasiPeer::LAST_SYNC);
            $criteria->addSelectColumn(SanitasiPeer::UPDATER_ID);
            $criteria->addSelectColumn(SanitasiPeer::KETERSEDIAAN_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KECUKUPAN_AIR);
            $criteria->addSelectColumn(SanitasiPeer::MINUM_SISWA);
            $criteria->addSelectColumn(SanitasiPeer::MEMPROSES_AIR);
            $criteria->addSelectColumn(SanitasiPeer::SISWA_BAWA_AIR);
            $criteria->addSelectColumn(SanitasiPeer::TOILET_SISWA_LAKI);
            $criteria->addSelectColumn(SanitasiPeer::TOILET_SISWA_PEREMPUAN);
            $criteria->addSelectColumn(SanitasiPeer::TOILET_SISWA_KK);
            $criteria->addSelectColumn(SanitasiPeer::TOILET_SISWA_KECIL);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_L_G);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_L_TG);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_P_G);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_P_TG);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_LP_G);
            $criteria->addSelectColumn(SanitasiPeer::JML_JAMBAN_LP_TG);
            $criteria->addSelectColumn(SanitasiPeer::TEMPAT_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK);
            $criteria->addSelectColumn(SanitasiPeer::A_SABUN_AIR_MENGALIR);
            $criteria->addSelectColumn(SanitasiPeer::JAMBAN_DIFABEL);
            $criteria->addSelectColumn(SanitasiPeer::TIPE_JAMBAN);
            $criteria->addSelectColumn(SanitasiPeer::A_SEDIA_PEMBALUT);
            $criteria->addSelectColumn(SanitasiPeer::KEGIATAN_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH);
            $criteria->addSelectColumn(SanitasiPeer::A_KURAS_SEPTITANK);
            $criteria->addSelectColumn(SanitasiPeer::A_MEMILIKI_SOLOKAN);
            $criteria->addSelectColumn(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS);
            $criteria->addSelectColumn(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P);
            $criteria->addSelectColumn(SanitasiPeer::A_CERMIN_JAMBAN_P);
            $criteria->addSelectColumn(SanitasiPeer::A_MEMILIKI_TPS);
            $criteria->addSelectColumn(SanitasiPeer::A_TPS_ANGKUT_RUTIN);
            $criteria->addSelectColumn(SanitasiPeer::A_ANGGARAN_SANITASI);
            $criteria->addSelectColumn(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA);
            $criteria->addSelectColumn(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH);
            $criteria->addSelectColumn(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS);
            $criteria->addSelectColumn(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA);
            $criteria->addSelectColumn(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM);
            $criteria->addSelectColumn(SanitasiPeer::KIE_GURU_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_GURU_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_GURU_MINUM_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KELAS_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KELAS_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KELAS_MINUM_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KIE_TOILET_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_TOILET_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_TOILET_MINUM_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_SELASAR_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_SELASAR_MINUM_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KIE_UKS_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_UKS_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_UKS_MINUM_AIR);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KANTIN_HAID);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN);
            $criteria->addSelectColumn(SanitasiPeer::KIE_KANTIN_MINUM_AIR);
        } else {
            $criteria->addSelectColumn($alias . '.sekolah_id');
            $criteria->addSelectColumn($alias . '.semester_id');
            $criteria->addSelectColumn($alias . '.sumber_air_id');
            $criteria->addSelectColumn($alias . '.sumber_air_minum_id');
            $criteria->addSelectColumn($alias . '.create_date');
            $criteria->addSelectColumn($alias . '.last_update');
            $criteria->addSelectColumn($alias . '.soft_delete');
            $criteria->addSelectColumn($alias . '.last_sync');
            $criteria->addSelectColumn($alias . '.updater_id');
            $criteria->addSelectColumn($alias . '.ketersediaan_air');
            $criteria->addSelectColumn($alias . '.kecukupan_air');
            $criteria->addSelectColumn($alias . '.minum_siswa');
            $criteria->addSelectColumn($alias . '.memproses_air');
            $criteria->addSelectColumn($alias . '.siswa_bawa_air');
            $criteria->addSelectColumn($alias . '.toilet_siswa_laki');
            $criteria->addSelectColumn($alias . '.toilet_siswa_perempuan');
            $criteria->addSelectColumn($alias . '.toilet_siswa_kk');
            $criteria->addSelectColumn($alias . '.toilet_siswa_kecil');
            $criteria->addSelectColumn($alias . '.jml_jamban_l_g');
            $criteria->addSelectColumn($alias . '.jml_jamban_l_tg');
            $criteria->addSelectColumn($alias . '.jml_jamban_p_g');
            $criteria->addSelectColumn($alias . '.jml_jamban_p_tg');
            $criteria->addSelectColumn($alias . '.jml_jamban_lp_g');
            $criteria->addSelectColumn($alias . '.jml_jamban_lp_tg');
            $criteria->addSelectColumn($alias . '.tempat_cuci_tangan');
            $criteria->addSelectColumn($alias . '.tempat_cuci_tangan_rusak');
            $criteria->addSelectColumn($alias . '.a_sabun_air_mengalir');
            $criteria->addSelectColumn($alias . '.jamban_difabel');
            $criteria->addSelectColumn($alias . '.tipe_jamban');
            $criteria->addSelectColumn($alias . '.a_sedia_pembalut');
            $criteria->addSelectColumn($alias . '.kegiatan_cuci_tangan');
            $criteria->addSelectColumn($alias . '.pembuangan_air_limbah');
            $criteria->addSelectColumn($alias . '.a_kuras_septitank');
            $criteria->addSelectColumn($alias . '.a_memiliki_solokan');
            $criteria->addSelectColumn($alias . '.a_tempat_sampah_kelas');
            $criteria->addSelectColumn($alias . '.a_tempat_sampah_tutup_p');
            $criteria->addSelectColumn($alias . '.a_cermin_jamban_p');
            $criteria->addSelectColumn($alias . '.a_memiliki_tps');
            $criteria->addSelectColumn($alias . '.a_tps_angkut_rutin');
            $criteria->addSelectColumn($alias . '.a_anggaran_sanitasi');
            $criteria->addSelectColumn($alias . '.a_melibatkan_sanitasi_siswa');
            $criteria->addSelectColumn($alias . '.a_kemitraan_san_daerah');
            $criteria->addSelectColumn($alias . '.a_kemitraan_san_puskesmas');
            $criteria->addSelectColumn($alias . '.a_kemitraan_san_swasta');
            $criteria->addSelectColumn($alias . '.a_kemitraan_san_non_pem');
            $criteria->addSelectColumn($alias . '.kie_guru_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_guru_haid');
            $criteria->addSelectColumn($alias . '.kie_guru_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_guru_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_guru_minum_air');
            $criteria->addSelectColumn($alias . '.kie_kelas_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_kelas_haid');
            $criteria->addSelectColumn($alias . '.kie_kelas_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_kelas_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_kelas_minum_air');
            $criteria->addSelectColumn($alias . '.kie_toilet_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_toilet_haid');
            $criteria->addSelectColumn($alias . '.kie_toilet_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_toilet_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_toilet_minum_air');
            $criteria->addSelectColumn($alias . '.kie_selasar_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_selasar_haid');
            $criteria->addSelectColumn($alias . '.kie_selasar_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_selasar_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_selasar_minum_air');
            $criteria->addSelectColumn($alias . '.kie_uks_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_uks_haid');
            $criteria->addSelectColumn($alias . '.kie_uks_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_uks_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_uks_minum_air');
            $criteria->addSelectColumn($alias . '.kie_kantin_cuci_tangan');
            $criteria->addSelectColumn($alias . '.kie_kantin_haid');
            $criteria->addSelectColumn($alias . '.kie_kantin_perawatan_toilet');
            $criteria->addSelectColumn($alias . '.kie_kantin_keamanan_pangan');
            $criteria->addSelectColumn($alias . '.kie_kantin_minum_air');
        }
    }

    /**
     * Returns the number of rows matching criteria.
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @return int Number of matching rows.
     */
    public static function doCount(Criteria $criteria, $distinct = false, PropelPDO $con = null)
    {
        // we may modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME); // Set the correct dbName

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        // BasePeer returns a PDOStatement
        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }
    /**
     * Selects one object from the DB.
     *
     * @param      Criteria $criteria object used to create the SELECT statement.
     * @param      PropelPDO $con
     * @return                 Sanitasi
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectOne(Criteria $criteria, PropelPDO $con = null)
    {
        $critcopy = clone $criteria;
        $critcopy->setLimit(1);
        $objects = SanitasiPeer::doSelect($critcopy, $con);
        if ($objects) {
            return $objects[0];
        }

        return null;
    }
    /**
     * Selects several row from the DB.
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con
     * @return array           Array of selected Objects
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelect(Criteria $criteria, PropelPDO $con = null)
    {
        return SanitasiPeer::populateObjects(SanitasiPeer::doSelectStmt($criteria, $con));
    }
    /**
     * Prepares the Criteria object and uses the parent doSelect() method to execute a PDOStatement.
     *
     * Use this method directly if you want to work with an executed statement directly (for example
     * to perform your own object hydration).
     *
     * @param      Criteria $criteria The Criteria object used to build the SELECT statement.
     * @param      PropelPDO $con The connection to use
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return PDOStatement The executed PDOStatement object.
     * @see        BasePeer::doSelect()
     */
    public static function doSelectStmt(Criteria $criteria, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        if (!$criteria->hasSelectClause()) {
            $criteria = clone $criteria;
            SanitasiPeer::addSelectColumns($criteria);
        }

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        // BasePeer returns a PDOStatement
        return BasePeer::doSelect($criteria, $con);
    }
    /**
     * Adds an object to the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doSelect*()
     * methods in your stub classes -- you may need to explicitly add objects
     * to the cache in order to ensure that the same objects are always returned by doSelect*()
     * and retrieveByPK*() calls.
     *
     * @param      Sanitasi $obj A Sanitasi object.
     * @param      string $key (optional) key to use for instance map (for performance boost if key was already calculated externally).
     */
    public static function addInstanceToPool($obj, $key = null)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if ($key === null) {
                $key = serialize(array((string) $obj->getSekolahId(), (string) $obj->getSemesterId()));
            } // if key === null
            SanitasiPeer::$instances[$key] = $obj;
        }
    }

    /**
     * Removes an object from the instance pool.
     *
     * Propel keeps cached copies of objects in an instance pool when they are retrieved
     * from the database.  In some cases -- especially when you override doDelete
     * methods in your stub classes -- you may need to explicitly remove objects
     * from the cache in order to prevent returning objects that no longer exist.
     *
     * @param      mixed $value A Sanitasi object or a primary key value.
     *
     * @return void
     * @throws PropelException - if the value is invalid.
     */
    public static function removeInstanceFromPool($value)
    {
        if (Propel::isInstancePoolingEnabled() && $value !== null) {
            if (is_object($value) && $value instanceof Sanitasi) {
                $key = serialize(array((string) $value->getSekolahId(), (string) $value->getSemesterId()));
            } elseif (is_array($value) && count($value) === 2) {
                // assume we've been passed a primary key
                $key = serialize(array((string) $value[0], (string) $value[1]));
            } else {
                $e = new PropelException("Invalid value passed to removeInstanceFromPool().  Expected primary key or Sanitasi object; got " . (is_object($value) ? get_class($value) . ' object.' : var_export($value,true)));
                throw $e;
            }

            unset(SanitasiPeer::$instances[$key]);
        }
    } // removeInstanceFromPool()

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      string $key The key (@see getPrimaryKeyHash()) for this instance.
     * @return   Sanitasi Found object or null if 1) no instance exists for specified key or 2) instance pooling has been disabled.
     * @see        getPrimaryKeyHash()
     */
    public static function getInstanceFromPool($key)
    {
        if (Propel::isInstancePoolingEnabled()) {
            if (isset(SanitasiPeer::$instances[$key])) {
                return SanitasiPeer::$instances[$key];
            }
        }

        return null; // just to be explicit
    }
    
    /**
     * Clear the instance pool.
     *
     * @return void
     */
    public static function clearInstancePool($and_clear_all_references = false)
    {
      if ($and_clear_all_references)
      {
        foreach (SanitasiPeer::$instances as $instance)
        {
          $instance->clearAllReferences(true);
        }
      }
        SanitasiPeer::$instances = array();
    }
    
    /**
     * Method to invalidate the instance pool of all tables related to sanitasi
     * by a foreign key with ON DELETE CASCADE
     */
    public static function clearRelatedInstancePool()
    {
    }

    /**
     * Retrieves a string version of the primary key from the DB resultset row that can be used to uniquely identify a row in this table.
     *
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, a serialize()d version of the primary key will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return string A string version of PK or null if the components of primary key in result array are all null.
     */
    public static function getPrimaryKeyHashFromRow($row, $startcol = 0)
    {
        // If the PK cannot be derived from the row, return null.
        if ($row[$startcol] === null && $row[$startcol + 1] === null) {
            return null;
        }

        return serialize(array((string) $row[$startcol], (string) $row[$startcol + 1]));
    }

    /**
     * Retrieves the primary key from the DB resultset row
     * For tables with a single-column primary key, that simple pkey value will be returned.  For tables with
     * a multi-column primary key, an array of the primary key columns will be returned.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @return mixed The primary key of the row
     */
    public static function getPrimaryKeyFromRow($row, $startcol = 0)
    {

        return array((string) $row[$startcol], (string) $row[$startcol + 1]);
    }
    
    /**
     * The returned array will contain objects of the default type or
     * objects that inherit from the default.
     *
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function populateObjects(PDOStatement $stmt)
    {
        $results = array();
    
        // set the class once to avoid overhead in the loop
        $cls = SanitasiPeer::getOMClass();
        // populate the object(s)
        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj = SanitasiPeer::getInstanceFromPool($key))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj->hydrate($row, 0, true); // rehydrate
                $results[] = $obj;
            } else {
                $obj = new $cls();
                $obj->hydrate($row);
                $results[] = $obj;
                SanitasiPeer::addInstanceToPool($obj, $key);
            } // if key exists
        }
        $stmt->closeCursor();

        return $results;
    }
    /**
     * Populates an object of the default type or an object that inherit from the default.
     *
     * @param      array $row PropelPDO resultset row.
     * @param      int $startcol The 0-based offset for reading from the resultset row.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     * @return array (Sanitasi object, last column rank)
     */
    public static function populateObject($row, $startcol = 0)
    {
        $key = SanitasiPeer::getPrimaryKeyHashFromRow($row, $startcol);
        if (null !== ($obj = SanitasiPeer::getInstanceFromPool($key))) {
            // We no longer rehydrate the object, since this can cause data loss.
            // See http://www.propelorm.org/ticket/509
            // $obj->hydrate($row, $startcol, true); // rehydrate
            $col = $startcol + SanitasiPeer::NUM_HYDRATE_COLUMNS;
        } else {
            $cls = SanitasiPeer::OM_CLASS;
            $obj = new $cls();
            $col = $obj->hydrate($row, $startcol);
            SanitasiPeer::addInstanceToPool($obj, $key);
        }

        return array($obj, $col);
    }


    /**
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberAirRelatedBySumberAirId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberAirRelatedBySumberAirId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberAirRelatedBySumberAirMinumId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinSumberAirRelatedBySumberAirMinumId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with their Sekolah objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol = SanitasiPeer::NUM_HYDRATE_COLUMNS;
        SekolahPeer::addSelectColumns($criteria);

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sanitasi) to $obj2 (Sekolah)
                $obj2->addSanitasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with their Semester objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol = SanitasiPeer::NUM_HYDRATE_COLUMNS;
        SemesterPeer::addSelectColumns($criteria);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SemesterPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sanitasi) to $obj2 (Semester)
                $obj2->addSanitasi($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with their SumberAir objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberAirRelatedBySumberAirId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol = SanitasiPeer::NUM_HYDRATE_COLUMNS;
        SumberAirPeer::addSelectColumns($criteria);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberAirPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberAirPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberAirPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sanitasi) to $obj2 (SumberAir)
                $obj2->addSanitasiRelatedBySumberAirId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with their SumberAir objects.
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinSumberAirRelatedBySumberAirMinumId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol = SanitasiPeer::NUM_HYDRATE_COLUMNS;
        SumberAirPeer::addSelectColumns($criteria);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {

                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if $obj1 already loaded

            $key2 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol);
            if ($key2 !== null) {
                $obj2 = SumberAirPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SumberAirPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol);
                    SumberAirPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 already loaded

                // Add the $obj1 (Sanitasi) to $obj2 (SumberAir)
                $obj2->addSanitasiRelatedBySumberAirMinumId($obj1);

            } // if joined row was not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining all related tables
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAll(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY won't ever affect the count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }

    /**
     * Selects a collection of Sanitasi objects pre-filled with all related objects.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAll(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol2 = SanitasiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol6 = $startcol5 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

            // Add objects for joined Sekolah rows

            $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
            if ($key2 !== null) {
                $obj2 = SekolahPeer::getInstanceFromPool($key2);
                if (!$obj2) {

                    $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if obj2 loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj2 (Sekolah)
                $obj2->addSanitasi($obj1);
            } // if joined row not null

            // Add objects for joined Semester rows

            $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
            if ($key3 !== null) {
                $obj3 = SemesterPeer::getInstanceFromPool($key3);
                if (!$obj3) {

                    $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if obj3 loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj3 (Semester)
                $obj3->addSanitasi($obj1);
            } // if joined row not null

            // Add objects for joined SumberAir rows

            $key4 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol4);
            if ($key4 !== null) {
                $obj4 = SumberAirPeer::getInstanceFromPool($key4);
                if (!$obj4) {

                    $cls = SumberAirPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SumberAirPeer::addInstanceToPool($obj4, $key4);
                } // if obj4 loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj4 (SumberAir)
                $obj4->addSanitasiRelatedBySumberAirId($obj1);
            } // if joined row not null

            // Add objects for joined SumberAir rows

            $key5 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol5);
            if ($key5 !== null) {
                $obj5 = SumberAirPeer::getInstanceFromPool($key5);
                if (!$obj5) {

                    $cls = SumberAirPeer::getOMClass();

                    $obj5 = new $cls();
                    $obj5->hydrate($row, $startcol5);
                    SumberAirPeer::addInstanceToPool($obj5, $key5);
                } // if obj5 loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj5 (SumberAir)
                $obj5->addSanitasiRelatedBySumberAirMinumId($obj1);
            } // if joined row not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Sekolah table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSekolah(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related Semester table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSemester(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberAirRelatedBySumberAirId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberAirRelatedBySumberAirId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Returns the number of rows matching criteria, joining the related SumberAirRelatedBySumberAirMinumId table
     *
     * @param      Criteria $criteria
     * @param      boolean $distinct Whether to select only distinct columns; deprecated: use Criteria->setDistinct() instead.
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return int Number of matching rows.
     */
    public static function doCountJoinAllExceptSumberAirRelatedBySumberAirMinumId(Criteria $criteria, $distinct = false, PropelPDO $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        // we're going to modify criteria, so copy it first
        $criteria = clone $criteria;

        // We need to set the primary table name, since in the case that there are no WHERE columns
        // it will be impossible for the BasePeer::createSelectSql() method to determine which
        // tables go into the FROM clause.
        $criteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);

        if ($distinct && !in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
            $criteria->setDistinct();
        }

        if (!$criteria->hasSelectClause()) {
            SanitasiPeer::addSelectColumns($criteria);
        }

        $criteria->clearOrderByColumns(); // ORDER BY should not affect count

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
    
        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $stmt = BasePeer::doCount($criteria, $con);

        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $count = (int) $row[0];
        } else {
            $count = 0; // no rows returned; we infer that means 0 matches.
        }
        $stmt->closeCursor();

        return $count;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with all related objects except Sekolah.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSekolah(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol2 = SanitasiPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Semester rows

                $key2 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SemesterPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SemesterPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj2 (Semester)
                $obj2->addSanitasi($obj1);

            } // if joined row is not null

                // Add objects for joined SumberAir rows

                $key3 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberAirPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberAirPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberAirPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj3 (SumberAir)
                $obj3->addSanitasiRelatedBySumberAirId($obj1);

            } // if joined row is not null

                // Add objects for joined SumberAir rows

                $key4 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SumberAirPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SumberAirPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SumberAirPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj4 (SumberAir)
                $obj4->addSanitasiRelatedBySumberAirMinumId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with all related objects except Semester.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSemester(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol2 = SanitasiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        SumberAirPeer::addSelectColumns($criteria);
        $startcol5 = $startcol4 + SumberAirPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SUMBER_AIR_MINUM_ID, SumberAirPeer::SUMBER_AIR_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sekolah rows

                $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj2 (Sekolah)
                $obj2->addSanitasi($obj1);

            } // if joined row is not null

                // Add objects for joined SumberAir rows

                $key3 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SumberAirPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SumberAirPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SumberAirPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj3 (SumberAir)
                $obj3->addSanitasiRelatedBySumberAirId($obj1);

            } // if joined row is not null

                // Add objects for joined SumberAir rows

                $key4 = SumberAirPeer::getPrimaryKeyHashFromRow($row, $startcol4);
                if ($key4 !== null) {
                    $obj4 = SumberAirPeer::getInstanceFromPool($key4);
                    if (!$obj4) {
    
                        $cls = SumberAirPeer::getOMClass();

                    $obj4 = new $cls();
                    $obj4->hydrate($row, $startcol4);
                    SumberAirPeer::addInstanceToPool($obj4, $key4);
                } // if $obj4 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj4 (SumberAir)
                $obj4->addSanitasiRelatedBySumberAirMinumId($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with all related objects except SumberAirRelatedBySumberAirId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberAirRelatedBySumberAirId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol2 = SanitasiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sekolah rows

                $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj2 (Sekolah)
                $obj2->addSanitasi($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj3 (Semester)
                $obj3->addSanitasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }


    /**
     * Selects a collection of Sanitasi objects pre-filled with all related objects except SumberAirRelatedBySumberAirMinumId.
     *
     * @param      Criteria  $criteria
     * @param      PropelPDO $con
     * @param      String    $join_behavior the type of joins to use, defaults to Criteria::LEFT_JOIN
     * @return array           Array of Sanitasi objects.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doSelectJoinAllExceptSumberAirRelatedBySumberAirMinumId(Criteria $criteria, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $criteria = clone $criteria;

        // Set the correct dbName if it has not been overridden
        // $criteria->getDbName() will return the same object if not set to another value
        // so == check is okay and faster
        if ($criteria->getDbName() == Propel::getDefaultDB()) {
            $criteria->setDbName(SanitasiPeer::DATABASE_NAME);
        }

        SanitasiPeer::addSelectColumns($criteria);
        $startcol2 = SanitasiPeer::NUM_HYDRATE_COLUMNS;

        SekolahPeer::addSelectColumns($criteria);
        $startcol3 = $startcol2 + SekolahPeer::NUM_HYDRATE_COLUMNS;

        SemesterPeer::addSelectColumns($criteria);
        $startcol4 = $startcol3 + SemesterPeer::NUM_HYDRATE_COLUMNS;

        $criteria->addJoin(SanitasiPeer::SEKOLAH_ID, SekolahPeer::SEKOLAH_ID, $join_behavior);

        $criteria->addJoin(SanitasiPeer::SEMESTER_ID, SemesterPeer::SEMESTER_ID, $join_behavior);


        $stmt = BasePeer::doSelect($criteria, $con);
        $results = array();

        while ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $key1 = SanitasiPeer::getPrimaryKeyHashFromRow($row, 0);
            if (null !== ($obj1 = SanitasiPeer::getInstanceFromPool($key1))) {
                // We no longer rehydrate the object, since this can cause data loss.
                // See http://www.propelorm.org/ticket/509
                // $obj1->hydrate($row, 0, true); // rehydrate
            } else {
                $cls = SanitasiPeer::getOMClass();

                $obj1 = new $cls();
                $obj1->hydrate($row);
                SanitasiPeer::addInstanceToPool($obj1, $key1);
            } // if obj1 already loaded

                // Add objects for joined Sekolah rows

                $key2 = SekolahPeer::getPrimaryKeyHashFromRow($row, $startcol2);
                if ($key2 !== null) {
                    $obj2 = SekolahPeer::getInstanceFromPool($key2);
                    if (!$obj2) {
    
                        $cls = SekolahPeer::getOMClass();

                    $obj2 = new $cls();
                    $obj2->hydrate($row, $startcol2);
                    SekolahPeer::addInstanceToPool($obj2, $key2);
                } // if $obj2 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj2 (Sekolah)
                $obj2->addSanitasi($obj1);

            } // if joined row is not null

                // Add objects for joined Semester rows

                $key3 = SemesterPeer::getPrimaryKeyHashFromRow($row, $startcol3);
                if ($key3 !== null) {
                    $obj3 = SemesterPeer::getInstanceFromPool($key3);
                    if (!$obj3) {
    
                        $cls = SemesterPeer::getOMClass();

                    $obj3 = new $cls();
                    $obj3->hydrate($row, $startcol3);
                    SemesterPeer::addInstanceToPool($obj3, $key3);
                } // if $obj3 already loaded

                // Add the $obj1 (Sanitasi) to the collection in $obj3 (Semester)
                $obj3->addSanitasi($obj1);

            } // if joined row is not null

            $results[] = $obj1;
        }
        $stmt->closeCursor();

        return $results;
    }

    /**
     * Returns the TableMap related to this peer.
     * This method is not needed for general use but a specific application could have a need.
     * @return TableMap
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function getTableMap()
    {
        return Propel::getDatabaseMap(SanitasiPeer::DATABASE_NAME)->getTable(SanitasiPeer::TABLE_NAME);
    }

    /**
     * Add a TableMap instance to the database for this peer class.
     */
    public static function buildTableMap()
    {
      $dbMap = Propel::getDatabaseMap(BaseSanitasiPeer::DATABASE_NAME);
      if (!$dbMap->hasTable(BaseSanitasiPeer::TABLE_NAME)) {
        $dbMap->addTableObject(new SanitasiTableMap());
      }
    }

    /**
     * The class that the Peer will make instances of.
     *
     *
     * @return string ClassName
     */
    public static function getOMClass()
    {
        return SanitasiPeer::OM_CLASS;
    }

    /**
     * Performs an INSERT on the database, given a Sanitasi or Criteria object.
     *
     * @param      mixed $values Criteria or Sanitasi object containing data that is used to create the INSERT statement.
     * @param      PropelPDO $con the PropelPDO connection to use
     * @return mixed           The new primary key.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doInsert($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity
        } else {
            $criteria = $values->buildCriteria(); // build Criteria from Sanitasi object
        }


        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        try {
            // use transaction because $criteria could contain info
            // for more than one table (I guess, conceivably)
            $con->beginTransaction();
            $pk = BasePeer::doInsert($criteria, $con);
            $con->commit();
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }

        return $pk;
    }

    /**
     * Performs an UPDATE on the database, given a Sanitasi or Criteria object.
     *
     * @param      mixed $values Criteria or Sanitasi object containing data that is used to create the UPDATE statement.
     * @param      PropelPDO $con The connection to use (specify PropelPDO connection object to exert more control over transactions).
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
    public static function doUpdate($values, PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $selectCriteria = new Criteria(SanitasiPeer::DATABASE_NAME);

        if ($values instanceof Criteria) {
            $criteria = clone $values; // rename for clarity

            $comparison = $criteria->getComparison(SanitasiPeer::SEKOLAH_ID);
            $value = $criteria->remove(SanitasiPeer::SEKOLAH_ID);
            if ($value) {
                $selectCriteria->add(SanitasiPeer::SEKOLAH_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);
            }

            $comparison = $criteria->getComparison(SanitasiPeer::SEMESTER_ID);
            $value = $criteria->remove(SanitasiPeer::SEMESTER_ID);
            if ($value) {
                $selectCriteria->add(SanitasiPeer::SEMESTER_ID, $value, $comparison);
            } else {
                $selectCriteria->setPrimaryTableName(SanitasiPeer::TABLE_NAME);
            }

        } else { // $values is Sanitasi object
            $criteria = $values->buildCriteria(); // gets full criteria
            $selectCriteria = $values->buildPkeyCriteria(); // gets criteria w/ primary key(s)
        }

        // set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        return BasePeer::doUpdate($selectCriteria, $criteria, $con);
    }

    /**
     * Deletes all rows from the sanitasi table.
     *
     * @param      PropelPDO $con the connection to use
     * @return int             The number of affected rows (if supported by underlying database driver).
     * @throws PropelException
     */
    public static function doDeleteAll(PropelPDO $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }
        $affectedRows = 0; // initialize var to track total num of affected rows
        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            $affectedRows += BasePeer::doDeleteAll(SanitasiPeer::TABLE_NAME, $con, SanitasiPeer::DATABASE_NAME);
            // Because this db requires some delete cascade/set null emulation, we have to
            // clear the cached instance *after* the emulation has happened (since
            // instances get re-added by the select statement contained therein).
            SanitasiPeer::clearInstancePool();
            SanitasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs a DELETE on the database, given a Sanitasi or Criteria object OR a primary key value.
     *
     * @param      mixed $values Criteria or Sanitasi object or primary key or array of primary keys
     *              which is used to create the DELETE statement
     * @param      PropelPDO $con the connection to use
     * @return int The number of affected rows (if supported by underlying database driver).  This includes CASCADE-related rows
     *				if supported by native driver or if emulated using Propel.
     * @throws PropelException Any exceptions caught during processing will be
     *		 rethrown wrapped into a PropelException.
     */
     public static function doDelete($values, PropelPDO $con = null)
     {
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        if ($values instanceof Criteria) {
            // invalidate the cache for all objects of this type, since we have no
            // way of knowing (without running a query) what objects should be invalidated
            // from the cache based on this Criteria.
            SanitasiPeer::clearInstancePool();
            // rename for clarity
            $criteria = clone $values;
        } elseif ($values instanceof Sanitasi) { // it's a model object
            // invalidate the cache for this single object
            SanitasiPeer::removeInstanceFromPool($values);
            // create criteria based on pk values
            $criteria = $values->buildPkeyCriteria();
        } else { // it's a primary key, or an array of pks
            $criteria = new Criteria(SanitasiPeer::DATABASE_NAME);
            // primary key is composite; we therefore, expect
            // the primary key passed to be an array of pkey values
            if (count($values) == count($values, COUNT_RECURSIVE)) {
                // array is not multi-dimensional
                $values = array($values);
            }
            foreach ($values as $value) {
                $criterion = $criteria->getNewCriterion(SanitasiPeer::SEKOLAH_ID, $value[0]);
                $criterion->addAnd($criteria->getNewCriterion(SanitasiPeer::SEMESTER_ID, $value[1]));
                $criteria->addOr($criterion);
                // we can invalidate the cache for this single PK
                SanitasiPeer::removeInstanceFromPool($value);
            }
        }

        // Set the correct dbName
        $criteria->setDbName(SanitasiPeer::DATABASE_NAME);

        $affectedRows = 0; // initialize var to track total num of affected rows

        try {
            // use transaction because $criteria could contain info
            // for more than one table or we could emulating ON DELETE CASCADE, etc.
            $con->beginTransaction();
            
            $affectedRows += BasePeer::doDelete($criteria, $con);
            SanitasiPeer::clearRelatedInstancePool();
            $con->commit();

            return $affectedRows;
        } catch (PropelException $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Validates all modified columns of given Sanitasi object.
     * If parameter $columns is either a single column name or an array of column names
     * than only those columns are validated.
     *
     * NOTICE: This does not apply to primary or foreign keys for now.
     *
     * @param      Sanitasi $obj The object to validate.
     * @param      mixed $cols Column name or array of column names.
     *
     * @return mixed TRUE if all columns are valid or the error message of the first invalid column.
     */
    public static function doValidate($obj, $cols = null)
    {
        $columns = array();

        if ($cols) {
            $dbMap = Propel::getDatabaseMap(SanitasiPeer::DATABASE_NAME);
            $tableMap = $dbMap->getTable(SanitasiPeer::TABLE_NAME);

            if (! is_array($cols)) {
                $cols = array($cols);
            }

            foreach ($cols as $colName) {
                if ($tableMap->hasColumn($colName)) {
                    $get = 'get' . $tableMap->getColumn($colName)->getPhpName();
                    $columns[$colName] = $obj->$get();
                }
            }
        } else {

        }

        return BasePeer::doValidate(SanitasiPeer::DATABASE_NAME, SanitasiPeer::TABLE_NAME, $columns);
    }

    /**
     * Retrieve object using using composite pkey values.
     * @param   string $sekolah_id
     * @param   string $semester_id
     * @param      PropelPDO $con
     * @return   Sanitasi
     */
    public static function retrieveByPK($sekolah_id, $semester_id, PropelPDO $con = null) {
        $_instancePoolKey = serialize(array((string) $sekolah_id, (string) $semester_id));
         if (null !== ($obj = SanitasiPeer::getInstanceFromPool($_instancePoolKey))) {
             return $obj;
        }

        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $criteria = new Criteria(SanitasiPeer::DATABASE_NAME);
        $criteria->add(SanitasiPeer::SEKOLAH_ID, $sekolah_id);
        $criteria->add(SanitasiPeer::SEMESTER_ID, $semester_id);
        $v = SanitasiPeer::doSelect($criteria, $con);

        return !empty($v) ? $v[0] : null;
    }
} // BaseSanitasiPeer

// This is the static code needed to register the TableMap for this table with the main Propel class.
//
BaseSanitasiPeer::buildTableMap();

