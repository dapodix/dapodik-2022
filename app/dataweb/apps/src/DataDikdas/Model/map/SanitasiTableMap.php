<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sanitasi' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.DataDikdas.Model.map
 */
class SanitasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SanitasiTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sanitasi');
        $this->setPhpName('Sanitasi');
        $this->setClassname('DataDikdas\\Model\\Sanitasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR' , 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('sumber_air_id', 'SumberAirId', 'DECIMAL', 'ref.sumber_air', 'sumber_air_id', true, 131072, null);
        $this->addForeignKey('sumber_air_minum_id', 'SumberAirMinumId', 'DECIMAL', 'ref.sumber_air', 'sumber_air_id', true, 131072, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('soft_delete', 'SoftDelete', 'DECIMAL', true, 65536, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        $this->addColumn('ketersediaan_air', 'KetersediaanAir', 'DECIMAL', true, 65536, null);
        $this->addColumn('kecukupan_air', 'KecukupanAir', 'DECIMAL', true, 65536, null);
        $this->addColumn('minum_siswa', 'MinumSiswa', 'DECIMAL', true, 65536, null);
        $this->addColumn('memproses_air', 'MemprosesAir', 'DECIMAL', true, 65536, null);
        $this->addColumn('siswa_bawa_air', 'SiswaBawaAir', 'DECIMAL', true, 65536, null);
        $this->addColumn('toilet_siswa_laki', 'ToiletSiswaLaki', 'DECIMAL', true, 131072, null);
        $this->addColumn('toilet_siswa_perempuan', 'ToiletSiswaPerempuan', 'DECIMAL', true, 131072, null);
        $this->addColumn('toilet_siswa_kk', 'ToiletSiswaKk', 'DECIMAL', true, 131072, null);
        $this->addColumn('toilet_siswa_kecil', 'ToiletSiswaKecil', 'DECIMAL', true, 65536, null);
        $this->addColumn('jml_jamban_l_g', 'JmlJambanLG', 'DECIMAL', true, 131072, 0);
        $this->addColumn('jml_jamban_l_tg', 'JmlJambanLTg', 'DECIMAL', true, 131072, 0);
        $this->addColumn('jml_jamban_p_g', 'JmlJambanPG', 'DECIMAL', true, 131072, 0);
        $this->addColumn('jml_jamban_p_tg', 'JmlJambanPTg', 'DECIMAL', true, 131072, 0);
        $this->addColumn('jml_jamban_lp_g', 'JmlJambanLpG', 'DECIMAL', true, 131072, 0);
        $this->addColumn('jml_jamban_lp_tg', 'JmlJambanLpTg', 'DECIMAL', true, 131072, 0);
        $this->addColumn('tempat_cuci_tangan', 'TempatCuciTangan', 'DECIMAL', true, 131072, null);
        $this->addColumn('tempat_cuci_tangan_rusak', 'TempatCuciTanganRusak', 'DECIMAL', true, 131072, null);
        $this->addColumn('a_sabun_air_mengalir', 'ASabunAirMengalir', 'DECIMAL', true, 65536, null);
        $this->addColumn('jamban_difabel', 'JambanDifabel', 'DECIMAL', true, 65536, null);
        $this->addColumn('tipe_jamban', 'TipeJamban', 'CHAR', true, 1, '9');
        $this->addColumn('a_sedia_pembalut', 'ASediaPembalut', 'DECIMAL', false, 65536, 0);
        $this->addColumn('kegiatan_cuci_tangan', 'KegiatanCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('pembuangan_air_limbah', 'PembuanganAirLimbah', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_kuras_septitank', 'AKurasSeptitank', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_memiliki_solokan', 'AMemilikiSolokan', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_tempat_sampah_kelas', 'ATempatSampahKelas', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_tempat_sampah_tutup_p', 'ATempatSampahTutupP', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_cermin_jamban_p', 'ACerminJambanP', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_memiliki_tps', 'AMemilikiTps', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_tps_angkut_rutin', 'ATpsAngkutRutin', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_anggaran_sanitasi', 'AAnggaranSanitasi', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_melibatkan_sanitasi_siswa', 'AMelibatkanSanitasiSiswa', 'DECIMAL', false, 65536, 0);
        $this->addColumn('a_kemitraan_san_daerah', 'AKemitraanSanDaerah', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_kemitraan_san_puskesmas', 'AKemitraanSanPuskesmas', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_kemitraan_san_swasta', 'AKemitraanSanSwasta', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_kemitraan_san_non_pem', 'AKemitraanSanNonPem', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_guru_cuci_tangan', 'KieGuruCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_guru_haid', 'KieGuruHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_guru_perawatan_toilet', 'KieGuruPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_guru_keamanan_pangan', 'KieGuruKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_guru_minum_air', 'KieGuruMinumAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kelas_cuci_tangan', 'KieKelasCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kelas_haid', 'KieKelasHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kelas_perawatan_toilet', 'KieKelasPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kelas_keamanan_pangan', 'KieKelasKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kelas_minum_air', 'KieKelasMinumAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_toilet_cuci_tangan', 'KieToiletCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_toilet_haid', 'KieToiletHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_toilet_perawatan_toilet', 'KieToiletPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_toilet_keamanan_pangan', 'KieToiletKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_toilet_minum_air', 'KieToiletMinumAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_selasar_cuci_tangan', 'KieSelasarCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_selasar_haid', 'KieSelasarHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_selasar_perawatan_toilet', 'KieSelasarPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_selasar_keamanan_pangan', 'KieSelasarKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_selasar_minum_air', 'KieSelasarMinumAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_uks_cuci_tangan', 'KieUksCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_uks_haid', 'KieUksHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_uks_perawatan_toilet', 'KieUksPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_uks_keamanan_pangan', 'KieUksKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_uks_minum_air', 'KieUksMinumAir', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kantin_cuci_tangan', 'KieKantinCuciTangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kantin_haid', 'KieKantinHaid', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kantin_perawatan_toilet', 'KieKantinPerawatanToilet', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kantin_keamanan_pangan', 'KieKantinKeamananPangan', 'DECIMAL', false, 65536, null);
        $this->addColumn('kie_kantin_minum_air', 'KieKantinMinumAir', 'DECIMAL', false, 65536, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberAirRelatedBySumberAirId', 'DataDikdas\\Model\\SumberAir', RelationMap::MANY_TO_ONE, array('sumber_air_id' => 'sumber_air_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SumberAirRelatedBySumberAirMinumId', 'DataDikdas\\Model\\SumberAir', RelationMap::MANY_TO_ONE, array('sumber_air_minum_id' => 'sumber_air_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // SanitasiTableMap
