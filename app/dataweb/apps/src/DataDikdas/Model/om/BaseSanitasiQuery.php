<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiPeer;
use DataDikdas\Model\SanitasiQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SumberAir;

/**
 * Base class that represents a query for the 'sanitasi' table.
 *
 * 
 *
 * @method SanitasiQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method SanitasiQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method SanitasiQuery orderBySumberAirId($order = Criteria::ASC) Order by the sumber_air_id column
 * @method SanitasiQuery orderBySumberAirMinumId($order = Criteria::ASC) Order by the sumber_air_minum_id column
 * @method SanitasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SanitasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SanitasiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method SanitasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method SanitasiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 * @method SanitasiQuery orderByKetersediaanAir($order = Criteria::ASC) Order by the ketersediaan_air column
 * @method SanitasiQuery orderByKecukupanAir($order = Criteria::ASC) Order by the kecukupan_air column
 * @method SanitasiQuery orderByMinumSiswa($order = Criteria::ASC) Order by the minum_siswa column
 * @method SanitasiQuery orderByMemprosesAir($order = Criteria::ASC) Order by the memproses_air column
 * @method SanitasiQuery orderBySiswaBawaAir($order = Criteria::ASC) Order by the siswa_bawa_air column
 * @method SanitasiQuery orderByToiletSiswaLaki($order = Criteria::ASC) Order by the toilet_siswa_laki column
 * @method SanitasiQuery orderByToiletSiswaPerempuan($order = Criteria::ASC) Order by the toilet_siswa_perempuan column
 * @method SanitasiQuery orderByToiletSiswaKk($order = Criteria::ASC) Order by the toilet_siswa_kk column
 * @method SanitasiQuery orderByToiletSiswaKecil($order = Criteria::ASC) Order by the toilet_siswa_kecil column
 * @method SanitasiQuery orderByJmlJambanLG($order = Criteria::ASC) Order by the jml_jamban_l_g column
 * @method SanitasiQuery orderByJmlJambanLTg($order = Criteria::ASC) Order by the jml_jamban_l_tg column
 * @method SanitasiQuery orderByJmlJambanPG($order = Criteria::ASC) Order by the jml_jamban_p_g column
 * @method SanitasiQuery orderByJmlJambanPTg($order = Criteria::ASC) Order by the jml_jamban_p_tg column
 * @method SanitasiQuery orderByJmlJambanLpG($order = Criteria::ASC) Order by the jml_jamban_lp_g column
 * @method SanitasiQuery orderByJmlJambanLpTg($order = Criteria::ASC) Order by the jml_jamban_lp_tg column
 * @method SanitasiQuery orderByTempatCuciTangan($order = Criteria::ASC) Order by the tempat_cuci_tangan column
 * @method SanitasiQuery orderByTempatCuciTanganRusak($order = Criteria::ASC) Order by the tempat_cuci_tangan_rusak column
 * @method SanitasiQuery orderByASabunAirMengalir($order = Criteria::ASC) Order by the a_sabun_air_mengalir column
 * @method SanitasiQuery orderByJambanDifabel($order = Criteria::ASC) Order by the jamban_difabel column
 * @method SanitasiQuery orderByTipeJamban($order = Criteria::ASC) Order by the tipe_jamban column
 * @method SanitasiQuery orderByASediaPembalut($order = Criteria::ASC) Order by the a_sedia_pembalut column
 * @method SanitasiQuery orderByKegiatanCuciTangan($order = Criteria::ASC) Order by the kegiatan_cuci_tangan column
 * @method SanitasiQuery orderByPembuanganAirLimbah($order = Criteria::ASC) Order by the pembuangan_air_limbah column
 * @method SanitasiQuery orderByAKurasSeptitank($order = Criteria::ASC) Order by the a_kuras_septitank column
 * @method SanitasiQuery orderByAMemilikiSolokan($order = Criteria::ASC) Order by the a_memiliki_solokan column
 * @method SanitasiQuery orderByATempatSampahKelas($order = Criteria::ASC) Order by the a_tempat_sampah_kelas column
 * @method SanitasiQuery orderByATempatSampahTutupP($order = Criteria::ASC) Order by the a_tempat_sampah_tutup_p column
 * @method SanitasiQuery orderByACerminJambanP($order = Criteria::ASC) Order by the a_cermin_jamban_p column
 * @method SanitasiQuery orderByAMemilikiTps($order = Criteria::ASC) Order by the a_memiliki_tps column
 * @method SanitasiQuery orderByATpsAngkutRutin($order = Criteria::ASC) Order by the a_tps_angkut_rutin column
 * @method SanitasiQuery orderByAAnggaranSanitasi($order = Criteria::ASC) Order by the a_anggaran_sanitasi column
 * @method SanitasiQuery orderByAMelibatkanSanitasiSiswa($order = Criteria::ASC) Order by the a_melibatkan_sanitasi_siswa column
 * @method SanitasiQuery orderByAKemitraanSanDaerah($order = Criteria::ASC) Order by the a_kemitraan_san_daerah column
 * @method SanitasiQuery orderByAKemitraanSanPuskesmas($order = Criteria::ASC) Order by the a_kemitraan_san_puskesmas column
 * @method SanitasiQuery orderByAKemitraanSanSwasta($order = Criteria::ASC) Order by the a_kemitraan_san_swasta column
 * @method SanitasiQuery orderByAKemitraanSanNonPem($order = Criteria::ASC) Order by the a_kemitraan_san_non_pem column
 * @method SanitasiQuery orderByKieGuruCuciTangan($order = Criteria::ASC) Order by the kie_guru_cuci_tangan column
 * @method SanitasiQuery orderByKieGuruHaid($order = Criteria::ASC) Order by the kie_guru_haid column
 * @method SanitasiQuery orderByKieGuruPerawatanToilet($order = Criteria::ASC) Order by the kie_guru_perawatan_toilet column
 * @method SanitasiQuery orderByKieGuruKeamananPangan($order = Criteria::ASC) Order by the kie_guru_keamanan_pangan column
 * @method SanitasiQuery orderByKieGuruMinumAir($order = Criteria::ASC) Order by the kie_guru_minum_air column
 * @method SanitasiQuery orderByKieKelasCuciTangan($order = Criteria::ASC) Order by the kie_kelas_cuci_tangan column
 * @method SanitasiQuery orderByKieKelasHaid($order = Criteria::ASC) Order by the kie_kelas_haid column
 * @method SanitasiQuery orderByKieKelasPerawatanToilet($order = Criteria::ASC) Order by the kie_kelas_perawatan_toilet column
 * @method SanitasiQuery orderByKieKelasKeamananPangan($order = Criteria::ASC) Order by the kie_kelas_keamanan_pangan column
 * @method SanitasiQuery orderByKieKelasMinumAir($order = Criteria::ASC) Order by the kie_kelas_minum_air column
 * @method SanitasiQuery orderByKieToiletCuciTangan($order = Criteria::ASC) Order by the kie_toilet_cuci_tangan column
 * @method SanitasiQuery orderByKieToiletHaid($order = Criteria::ASC) Order by the kie_toilet_haid column
 * @method SanitasiQuery orderByKieToiletPerawatanToilet($order = Criteria::ASC) Order by the kie_toilet_perawatan_toilet column
 * @method SanitasiQuery orderByKieToiletKeamananPangan($order = Criteria::ASC) Order by the kie_toilet_keamanan_pangan column
 * @method SanitasiQuery orderByKieToiletMinumAir($order = Criteria::ASC) Order by the kie_toilet_minum_air column
 * @method SanitasiQuery orderByKieSelasarCuciTangan($order = Criteria::ASC) Order by the kie_selasar_cuci_tangan column
 * @method SanitasiQuery orderByKieSelasarHaid($order = Criteria::ASC) Order by the kie_selasar_haid column
 * @method SanitasiQuery orderByKieSelasarPerawatanToilet($order = Criteria::ASC) Order by the kie_selasar_perawatan_toilet column
 * @method SanitasiQuery orderByKieSelasarKeamananPangan($order = Criteria::ASC) Order by the kie_selasar_keamanan_pangan column
 * @method SanitasiQuery orderByKieSelasarMinumAir($order = Criteria::ASC) Order by the kie_selasar_minum_air column
 * @method SanitasiQuery orderByKieUksCuciTangan($order = Criteria::ASC) Order by the kie_uks_cuci_tangan column
 * @method SanitasiQuery orderByKieUksHaid($order = Criteria::ASC) Order by the kie_uks_haid column
 * @method SanitasiQuery orderByKieUksPerawatanToilet($order = Criteria::ASC) Order by the kie_uks_perawatan_toilet column
 * @method SanitasiQuery orderByKieUksKeamananPangan($order = Criteria::ASC) Order by the kie_uks_keamanan_pangan column
 * @method SanitasiQuery orderByKieUksMinumAir($order = Criteria::ASC) Order by the kie_uks_minum_air column
 * @method SanitasiQuery orderByKieKantinCuciTangan($order = Criteria::ASC) Order by the kie_kantin_cuci_tangan column
 * @method SanitasiQuery orderByKieKantinHaid($order = Criteria::ASC) Order by the kie_kantin_haid column
 * @method SanitasiQuery orderByKieKantinPerawatanToilet($order = Criteria::ASC) Order by the kie_kantin_perawatan_toilet column
 * @method SanitasiQuery orderByKieKantinKeamananPangan($order = Criteria::ASC) Order by the kie_kantin_keamanan_pangan column
 * @method SanitasiQuery orderByKieKantinMinumAir($order = Criteria::ASC) Order by the kie_kantin_minum_air column
 *
 * @method SanitasiQuery groupBySekolahId() Group by the sekolah_id column
 * @method SanitasiQuery groupBySemesterId() Group by the semester_id column
 * @method SanitasiQuery groupBySumberAirId() Group by the sumber_air_id column
 * @method SanitasiQuery groupBySumberAirMinumId() Group by the sumber_air_minum_id column
 * @method SanitasiQuery groupByCreateDate() Group by the create_date column
 * @method SanitasiQuery groupByLastUpdate() Group by the last_update column
 * @method SanitasiQuery groupBySoftDelete() Group by the soft_delete column
 * @method SanitasiQuery groupByLastSync() Group by the last_sync column
 * @method SanitasiQuery groupByUpdaterId() Group by the updater_id column
 * @method SanitasiQuery groupByKetersediaanAir() Group by the ketersediaan_air column
 * @method SanitasiQuery groupByKecukupanAir() Group by the kecukupan_air column
 * @method SanitasiQuery groupByMinumSiswa() Group by the minum_siswa column
 * @method SanitasiQuery groupByMemprosesAir() Group by the memproses_air column
 * @method SanitasiQuery groupBySiswaBawaAir() Group by the siswa_bawa_air column
 * @method SanitasiQuery groupByToiletSiswaLaki() Group by the toilet_siswa_laki column
 * @method SanitasiQuery groupByToiletSiswaPerempuan() Group by the toilet_siswa_perempuan column
 * @method SanitasiQuery groupByToiletSiswaKk() Group by the toilet_siswa_kk column
 * @method SanitasiQuery groupByToiletSiswaKecil() Group by the toilet_siswa_kecil column
 * @method SanitasiQuery groupByJmlJambanLG() Group by the jml_jamban_l_g column
 * @method SanitasiQuery groupByJmlJambanLTg() Group by the jml_jamban_l_tg column
 * @method SanitasiQuery groupByJmlJambanPG() Group by the jml_jamban_p_g column
 * @method SanitasiQuery groupByJmlJambanPTg() Group by the jml_jamban_p_tg column
 * @method SanitasiQuery groupByJmlJambanLpG() Group by the jml_jamban_lp_g column
 * @method SanitasiQuery groupByJmlJambanLpTg() Group by the jml_jamban_lp_tg column
 * @method SanitasiQuery groupByTempatCuciTangan() Group by the tempat_cuci_tangan column
 * @method SanitasiQuery groupByTempatCuciTanganRusak() Group by the tempat_cuci_tangan_rusak column
 * @method SanitasiQuery groupByASabunAirMengalir() Group by the a_sabun_air_mengalir column
 * @method SanitasiQuery groupByJambanDifabel() Group by the jamban_difabel column
 * @method SanitasiQuery groupByTipeJamban() Group by the tipe_jamban column
 * @method SanitasiQuery groupByASediaPembalut() Group by the a_sedia_pembalut column
 * @method SanitasiQuery groupByKegiatanCuciTangan() Group by the kegiatan_cuci_tangan column
 * @method SanitasiQuery groupByPembuanganAirLimbah() Group by the pembuangan_air_limbah column
 * @method SanitasiQuery groupByAKurasSeptitank() Group by the a_kuras_septitank column
 * @method SanitasiQuery groupByAMemilikiSolokan() Group by the a_memiliki_solokan column
 * @method SanitasiQuery groupByATempatSampahKelas() Group by the a_tempat_sampah_kelas column
 * @method SanitasiQuery groupByATempatSampahTutupP() Group by the a_tempat_sampah_tutup_p column
 * @method SanitasiQuery groupByACerminJambanP() Group by the a_cermin_jamban_p column
 * @method SanitasiQuery groupByAMemilikiTps() Group by the a_memiliki_tps column
 * @method SanitasiQuery groupByATpsAngkutRutin() Group by the a_tps_angkut_rutin column
 * @method SanitasiQuery groupByAAnggaranSanitasi() Group by the a_anggaran_sanitasi column
 * @method SanitasiQuery groupByAMelibatkanSanitasiSiswa() Group by the a_melibatkan_sanitasi_siswa column
 * @method SanitasiQuery groupByAKemitraanSanDaerah() Group by the a_kemitraan_san_daerah column
 * @method SanitasiQuery groupByAKemitraanSanPuskesmas() Group by the a_kemitraan_san_puskesmas column
 * @method SanitasiQuery groupByAKemitraanSanSwasta() Group by the a_kemitraan_san_swasta column
 * @method SanitasiQuery groupByAKemitraanSanNonPem() Group by the a_kemitraan_san_non_pem column
 * @method SanitasiQuery groupByKieGuruCuciTangan() Group by the kie_guru_cuci_tangan column
 * @method SanitasiQuery groupByKieGuruHaid() Group by the kie_guru_haid column
 * @method SanitasiQuery groupByKieGuruPerawatanToilet() Group by the kie_guru_perawatan_toilet column
 * @method SanitasiQuery groupByKieGuruKeamananPangan() Group by the kie_guru_keamanan_pangan column
 * @method SanitasiQuery groupByKieGuruMinumAir() Group by the kie_guru_minum_air column
 * @method SanitasiQuery groupByKieKelasCuciTangan() Group by the kie_kelas_cuci_tangan column
 * @method SanitasiQuery groupByKieKelasHaid() Group by the kie_kelas_haid column
 * @method SanitasiQuery groupByKieKelasPerawatanToilet() Group by the kie_kelas_perawatan_toilet column
 * @method SanitasiQuery groupByKieKelasKeamananPangan() Group by the kie_kelas_keamanan_pangan column
 * @method SanitasiQuery groupByKieKelasMinumAir() Group by the kie_kelas_minum_air column
 * @method SanitasiQuery groupByKieToiletCuciTangan() Group by the kie_toilet_cuci_tangan column
 * @method SanitasiQuery groupByKieToiletHaid() Group by the kie_toilet_haid column
 * @method SanitasiQuery groupByKieToiletPerawatanToilet() Group by the kie_toilet_perawatan_toilet column
 * @method SanitasiQuery groupByKieToiletKeamananPangan() Group by the kie_toilet_keamanan_pangan column
 * @method SanitasiQuery groupByKieToiletMinumAir() Group by the kie_toilet_minum_air column
 * @method SanitasiQuery groupByKieSelasarCuciTangan() Group by the kie_selasar_cuci_tangan column
 * @method SanitasiQuery groupByKieSelasarHaid() Group by the kie_selasar_haid column
 * @method SanitasiQuery groupByKieSelasarPerawatanToilet() Group by the kie_selasar_perawatan_toilet column
 * @method SanitasiQuery groupByKieSelasarKeamananPangan() Group by the kie_selasar_keamanan_pangan column
 * @method SanitasiQuery groupByKieSelasarMinumAir() Group by the kie_selasar_minum_air column
 * @method SanitasiQuery groupByKieUksCuciTangan() Group by the kie_uks_cuci_tangan column
 * @method SanitasiQuery groupByKieUksHaid() Group by the kie_uks_haid column
 * @method SanitasiQuery groupByKieUksPerawatanToilet() Group by the kie_uks_perawatan_toilet column
 * @method SanitasiQuery groupByKieUksKeamananPangan() Group by the kie_uks_keamanan_pangan column
 * @method SanitasiQuery groupByKieUksMinumAir() Group by the kie_uks_minum_air column
 * @method SanitasiQuery groupByKieKantinCuciTangan() Group by the kie_kantin_cuci_tangan column
 * @method SanitasiQuery groupByKieKantinHaid() Group by the kie_kantin_haid column
 * @method SanitasiQuery groupByKieKantinPerawatanToilet() Group by the kie_kantin_perawatan_toilet column
 * @method SanitasiQuery groupByKieKantinKeamananPangan() Group by the kie_kantin_keamanan_pangan column
 * @method SanitasiQuery groupByKieKantinMinumAir() Group by the kie_kantin_minum_air column
 *
 * @method SanitasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SanitasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SanitasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SanitasiQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method SanitasiQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method SanitasiQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method SanitasiQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method SanitasiQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method SanitasiQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method SanitasiQuery leftJoinSumberAirRelatedBySumberAirId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberAirRelatedBySumberAirId relation
 * @method SanitasiQuery rightJoinSumberAirRelatedBySumberAirId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberAirRelatedBySumberAirId relation
 * @method SanitasiQuery innerJoinSumberAirRelatedBySumberAirId($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberAirRelatedBySumberAirId relation
 *
 * @method SanitasiQuery leftJoinSumberAirRelatedBySumberAirMinumId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberAirRelatedBySumberAirMinumId relation
 * @method SanitasiQuery rightJoinSumberAirRelatedBySumberAirMinumId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberAirRelatedBySumberAirMinumId relation
 * @method SanitasiQuery innerJoinSumberAirRelatedBySumberAirMinumId($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberAirRelatedBySumberAirMinumId relation
 *
 * @method Sanitasi findOne(PropelPDO $con = null) Return the first Sanitasi matching the query
 * @method Sanitasi findOneOrCreate(PropelPDO $con = null) Return the first Sanitasi matching the query, or a new Sanitasi object populated from the query conditions when no match is found
 *
 * @method Sanitasi findOneBySekolahId(string $sekolah_id) Return the first Sanitasi filtered by the sekolah_id column
 * @method Sanitasi findOneBySemesterId(string $semester_id) Return the first Sanitasi filtered by the semester_id column
 * @method Sanitasi findOneBySumberAirId(string $sumber_air_id) Return the first Sanitasi filtered by the sumber_air_id column
 * @method Sanitasi findOneBySumberAirMinumId(string $sumber_air_minum_id) Return the first Sanitasi filtered by the sumber_air_minum_id column
 * @method Sanitasi findOneByCreateDate(string $create_date) Return the first Sanitasi filtered by the create_date column
 * @method Sanitasi findOneByLastUpdate(string $last_update) Return the first Sanitasi filtered by the last_update column
 * @method Sanitasi findOneBySoftDelete(string $soft_delete) Return the first Sanitasi filtered by the soft_delete column
 * @method Sanitasi findOneByLastSync(string $last_sync) Return the first Sanitasi filtered by the last_sync column
 * @method Sanitasi findOneByUpdaterId(string $updater_id) Return the first Sanitasi filtered by the updater_id column
 * @method Sanitasi findOneByKetersediaanAir(string $ketersediaan_air) Return the first Sanitasi filtered by the ketersediaan_air column
 * @method Sanitasi findOneByKecukupanAir(string $kecukupan_air) Return the first Sanitasi filtered by the kecukupan_air column
 * @method Sanitasi findOneByMinumSiswa(string $minum_siswa) Return the first Sanitasi filtered by the minum_siswa column
 * @method Sanitasi findOneByMemprosesAir(string $memproses_air) Return the first Sanitasi filtered by the memproses_air column
 * @method Sanitasi findOneBySiswaBawaAir(string $siswa_bawa_air) Return the first Sanitasi filtered by the siswa_bawa_air column
 * @method Sanitasi findOneByToiletSiswaLaki(string $toilet_siswa_laki) Return the first Sanitasi filtered by the toilet_siswa_laki column
 * @method Sanitasi findOneByToiletSiswaPerempuan(string $toilet_siswa_perempuan) Return the first Sanitasi filtered by the toilet_siswa_perempuan column
 * @method Sanitasi findOneByToiletSiswaKk(string $toilet_siswa_kk) Return the first Sanitasi filtered by the toilet_siswa_kk column
 * @method Sanitasi findOneByToiletSiswaKecil(string $toilet_siswa_kecil) Return the first Sanitasi filtered by the toilet_siswa_kecil column
 * @method Sanitasi findOneByJmlJambanLG(string $jml_jamban_l_g) Return the first Sanitasi filtered by the jml_jamban_l_g column
 * @method Sanitasi findOneByJmlJambanLTg(string $jml_jamban_l_tg) Return the first Sanitasi filtered by the jml_jamban_l_tg column
 * @method Sanitasi findOneByJmlJambanPG(string $jml_jamban_p_g) Return the first Sanitasi filtered by the jml_jamban_p_g column
 * @method Sanitasi findOneByJmlJambanPTg(string $jml_jamban_p_tg) Return the first Sanitasi filtered by the jml_jamban_p_tg column
 * @method Sanitasi findOneByJmlJambanLpG(string $jml_jamban_lp_g) Return the first Sanitasi filtered by the jml_jamban_lp_g column
 * @method Sanitasi findOneByJmlJambanLpTg(string $jml_jamban_lp_tg) Return the first Sanitasi filtered by the jml_jamban_lp_tg column
 * @method Sanitasi findOneByTempatCuciTangan(string $tempat_cuci_tangan) Return the first Sanitasi filtered by the tempat_cuci_tangan column
 * @method Sanitasi findOneByTempatCuciTanganRusak(string $tempat_cuci_tangan_rusak) Return the first Sanitasi filtered by the tempat_cuci_tangan_rusak column
 * @method Sanitasi findOneByASabunAirMengalir(string $a_sabun_air_mengalir) Return the first Sanitasi filtered by the a_sabun_air_mengalir column
 * @method Sanitasi findOneByJambanDifabel(string $jamban_difabel) Return the first Sanitasi filtered by the jamban_difabel column
 * @method Sanitasi findOneByTipeJamban(string $tipe_jamban) Return the first Sanitasi filtered by the tipe_jamban column
 * @method Sanitasi findOneByASediaPembalut(string $a_sedia_pembalut) Return the first Sanitasi filtered by the a_sedia_pembalut column
 * @method Sanitasi findOneByKegiatanCuciTangan(string $kegiatan_cuci_tangan) Return the first Sanitasi filtered by the kegiatan_cuci_tangan column
 * @method Sanitasi findOneByPembuanganAirLimbah(string $pembuangan_air_limbah) Return the first Sanitasi filtered by the pembuangan_air_limbah column
 * @method Sanitasi findOneByAKurasSeptitank(string $a_kuras_septitank) Return the first Sanitasi filtered by the a_kuras_septitank column
 * @method Sanitasi findOneByAMemilikiSolokan(string $a_memiliki_solokan) Return the first Sanitasi filtered by the a_memiliki_solokan column
 * @method Sanitasi findOneByATempatSampahKelas(string $a_tempat_sampah_kelas) Return the first Sanitasi filtered by the a_tempat_sampah_kelas column
 * @method Sanitasi findOneByATempatSampahTutupP(string $a_tempat_sampah_tutup_p) Return the first Sanitasi filtered by the a_tempat_sampah_tutup_p column
 * @method Sanitasi findOneByACerminJambanP(string $a_cermin_jamban_p) Return the first Sanitasi filtered by the a_cermin_jamban_p column
 * @method Sanitasi findOneByAMemilikiTps(string $a_memiliki_tps) Return the first Sanitasi filtered by the a_memiliki_tps column
 * @method Sanitasi findOneByATpsAngkutRutin(string $a_tps_angkut_rutin) Return the first Sanitasi filtered by the a_tps_angkut_rutin column
 * @method Sanitasi findOneByAAnggaranSanitasi(string $a_anggaran_sanitasi) Return the first Sanitasi filtered by the a_anggaran_sanitasi column
 * @method Sanitasi findOneByAMelibatkanSanitasiSiswa(string $a_melibatkan_sanitasi_siswa) Return the first Sanitasi filtered by the a_melibatkan_sanitasi_siswa column
 * @method Sanitasi findOneByAKemitraanSanDaerah(string $a_kemitraan_san_daerah) Return the first Sanitasi filtered by the a_kemitraan_san_daerah column
 * @method Sanitasi findOneByAKemitraanSanPuskesmas(string $a_kemitraan_san_puskesmas) Return the first Sanitasi filtered by the a_kemitraan_san_puskesmas column
 * @method Sanitasi findOneByAKemitraanSanSwasta(string $a_kemitraan_san_swasta) Return the first Sanitasi filtered by the a_kemitraan_san_swasta column
 * @method Sanitasi findOneByAKemitraanSanNonPem(string $a_kemitraan_san_non_pem) Return the first Sanitasi filtered by the a_kemitraan_san_non_pem column
 * @method Sanitasi findOneByKieGuruCuciTangan(string $kie_guru_cuci_tangan) Return the first Sanitasi filtered by the kie_guru_cuci_tangan column
 * @method Sanitasi findOneByKieGuruHaid(string $kie_guru_haid) Return the first Sanitasi filtered by the kie_guru_haid column
 * @method Sanitasi findOneByKieGuruPerawatanToilet(string $kie_guru_perawatan_toilet) Return the first Sanitasi filtered by the kie_guru_perawatan_toilet column
 * @method Sanitasi findOneByKieGuruKeamananPangan(string $kie_guru_keamanan_pangan) Return the first Sanitasi filtered by the kie_guru_keamanan_pangan column
 * @method Sanitasi findOneByKieGuruMinumAir(string $kie_guru_minum_air) Return the first Sanitasi filtered by the kie_guru_minum_air column
 * @method Sanitasi findOneByKieKelasCuciTangan(string $kie_kelas_cuci_tangan) Return the first Sanitasi filtered by the kie_kelas_cuci_tangan column
 * @method Sanitasi findOneByKieKelasHaid(string $kie_kelas_haid) Return the first Sanitasi filtered by the kie_kelas_haid column
 * @method Sanitasi findOneByKieKelasPerawatanToilet(string $kie_kelas_perawatan_toilet) Return the first Sanitasi filtered by the kie_kelas_perawatan_toilet column
 * @method Sanitasi findOneByKieKelasKeamananPangan(string $kie_kelas_keamanan_pangan) Return the first Sanitasi filtered by the kie_kelas_keamanan_pangan column
 * @method Sanitasi findOneByKieKelasMinumAir(string $kie_kelas_minum_air) Return the first Sanitasi filtered by the kie_kelas_minum_air column
 * @method Sanitasi findOneByKieToiletCuciTangan(string $kie_toilet_cuci_tangan) Return the first Sanitasi filtered by the kie_toilet_cuci_tangan column
 * @method Sanitasi findOneByKieToiletHaid(string $kie_toilet_haid) Return the first Sanitasi filtered by the kie_toilet_haid column
 * @method Sanitasi findOneByKieToiletPerawatanToilet(string $kie_toilet_perawatan_toilet) Return the first Sanitasi filtered by the kie_toilet_perawatan_toilet column
 * @method Sanitasi findOneByKieToiletKeamananPangan(string $kie_toilet_keamanan_pangan) Return the first Sanitasi filtered by the kie_toilet_keamanan_pangan column
 * @method Sanitasi findOneByKieToiletMinumAir(string $kie_toilet_minum_air) Return the first Sanitasi filtered by the kie_toilet_minum_air column
 * @method Sanitasi findOneByKieSelasarCuciTangan(string $kie_selasar_cuci_tangan) Return the first Sanitasi filtered by the kie_selasar_cuci_tangan column
 * @method Sanitasi findOneByKieSelasarHaid(string $kie_selasar_haid) Return the first Sanitasi filtered by the kie_selasar_haid column
 * @method Sanitasi findOneByKieSelasarPerawatanToilet(string $kie_selasar_perawatan_toilet) Return the first Sanitasi filtered by the kie_selasar_perawatan_toilet column
 * @method Sanitasi findOneByKieSelasarKeamananPangan(string $kie_selasar_keamanan_pangan) Return the first Sanitasi filtered by the kie_selasar_keamanan_pangan column
 * @method Sanitasi findOneByKieSelasarMinumAir(string $kie_selasar_minum_air) Return the first Sanitasi filtered by the kie_selasar_minum_air column
 * @method Sanitasi findOneByKieUksCuciTangan(string $kie_uks_cuci_tangan) Return the first Sanitasi filtered by the kie_uks_cuci_tangan column
 * @method Sanitasi findOneByKieUksHaid(string $kie_uks_haid) Return the first Sanitasi filtered by the kie_uks_haid column
 * @method Sanitasi findOneByKieUksPerawatanToilet(string $kie_uks_perawatan_toilet) Return the first Sanitasi filtered by the kie_uks_perawatan_toilet column
 * @method Sanitasi findOneByKieUksKeamananPangan(string $kie_uks_keamanan_pangan) Return the first Sanitasi filtered by the kie_uks_keamanan_pangan column
 * @method Sanitasi findOneByKieUksMinumAir(string $kie_uks_minum_air) Return the first Sanitasi filtered by the kie_uks_minum_air column
 * @method Sanitasi findOneByKieKantinCuciTangan(string $kie_kantin_cuci_tangan) Return the first Sanitasi filtered by the kie_kantin_cuci_tangan column
 * @method Sanitasi findOneByKieKantinHaid(string $kie_kantin_haid) Return the first Sanitasi filtered by the kie_kantin_haid column
 * @method Sanitasi findOneByKieKantinPerawatanToilet(string $kie_kantin_perawatan_toilet) Return the first Sanitasi filtered by the kie_kantin_perawatan_toilet column
 * @method Sanitasi findOneByKieKantinKeamananPangan(string $kie_kantin_keamanan_pangan) Return the first Sanitasi filtered by the kie_kantin_keamanan_pangan column
 * @method Sanitasi findOneByKieKantinMinumAir(string $kie_kantin_minum_air) Return the first Sanitasi filtered by the kie_kantin_minum_air column
 *
 * @method array findBySekolahId(string $sekolah_id) Return Sanitasi objects filtered by the sekolah_id column
 * @method array findBySemesterId(string $semester_id) Return Sanitasi objects filtered by the semester_id column
 * @method array findBySumberAirId(string $sumber_air_id) Return Sanitasi objects filtered by the sumber_air_id column
 * @method array findBySumberAirMinumId(string $sumber_air_minum_id) Return Sanitasi objects filtered by the sumber_air_minum_id column
 * @method array findByCreateDate(string $create_date) Return Sanitasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Sanitasi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Sanitasi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Sanitasi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Sanitasi objects filtered by the updater_id column
 * @method array findByKetersediaanAir(string $ketersediaan_air) Return Sanitasi objects filtered by the ketersediaan_air column
 * @method array findByKecukupanAir(string $kecukupan_air) Return Sanitasi objects filtered by the kecukupan_air column
 * @method array findByMinumSiswa(string $minum_siswa) Return Sanitasi objects filtered by the minum_siswa column
 * @method array findByMemprosesAir(string $memproses_air) Return Sanitasi objects filtered by the memproses_air column
 * @method array findBySiswaBawaAir(string $siswa_bawa_air) Return Sanitasi objects filtered by the siswa_bawa_air column
 * @method array findByToiletSiswaLaki(string $toilet_siswa_laki) Return Sanitasi objects filtered by the toilet_siswa_laki column
 * @method array findByToiletSiswaPerempuan(string $toilet_siswa_perempuan) Return Sanitasi objects filtered by the toilet_siswa_perempuan column
 * @method array findByToiletSiswaKk(string $toilet_siswa_kk) Return Sanitasi objects filtered by the toilet_siswa_kk column
 * @method array findByToiletSiswaKecil(string $toilet_siswa_kecil) Return Sanitasi objects filtered by the toilet_siswa_kecil column
 * @method array findByJmlJambanLG(string $jml_jamban_l_g) Return Sanitasi objects filtered by the jml_jamban_l_g column
 * @method array findByJmlJambanLTg(string $jml_jamban_l_tg) Return Sanitasi objects filtered by the jml_jamban_l_tg column
 * @method array findByJmlJambanPG(string $jml_jamban_p_g) Return Sanitasi objects filtered by the jml_jamban_p_g column
 * @method array findByJmlJambanPTg(string $jml_jamban_p_tg) Return Sanitasi objects filtered by the jml_jamban_p_tg column
 * @method array findByJmlJambanLpG(string $jml_jamban_lp_g) Return Sanitasi objects filtered by the jml_jamban_lp_g column
 * @method array findByJmlJambanLpTg(string $jml_jamban_lp_tg) Return Sanitasi objects filtered by the jml_jamban_lp_tg column
 * @method array findByTempatCuciTangan(string $tempat_cuci_tangan) Return Sanitasi objects filtered by the tempat_cuci_tangan column
 * @method array findByTempatCuciTanganRusak(string $tempat_cuci_tangan_rusak) Return Sanitasi objects filtered by the tempat_cuci_tangan_rusak column
 * @method array findByASabunAirMengalir(string $a_sabun_air_mengalir) Return Sanitasi objects filtered by the a_sabun_air_mengalir column
 * @method array findByJambanDifabel(string $jamban_difabel) Return Sanitasi objects filtered by the jamban_difabel column
 * @method array findByTipeJamban(string $tipe_jamban) Return Sanitasi objects filtered by the tipe_jamban column
 * @method array findByASediaPembalut(string $a_sedia_pembalut) Return Sanitasi objects filtered by the a_sedia_pembalut column
 * @method array findByKegiatanCuciTangan(string $kegiatan_cuci_tangan) Return Sanitasi objects filtered by the kegiatan_cuci_tangan column
 * @method array findByPembuanganAirLimbah(string $pembuangan_air_limbah) Return Sanitasi objects filtered by the pembuangan_air_limbah column
 * @method array findByAKurasSeptitank(string $a_kuras_septitank) Return Sanitasi objects filtered by the a_kuras_septitank column
 * @method array findByAMemilikiSolokan(string $a_memiliki_solokan) Return Sanitasi objects filtered by the a_memiliki_solokan column
 * @method array findByATempatSampahKelas(string $a_tempat_sampah_kelas) Return Sanitasi objects filtered by the a_tempat_sampah_kelas column
 * @method array findByATempatSampahTutupP(string $a_tempat_sampah_tutup_p) Return Sanitasi objects filtered by the a_tempat_sampah_tutup_p column
 * @method array findByACerminJambanP(string $a_cermin_jamban_p) Return Sanitasi objects filtered by the a_cermin_jamban_p column
 * @method array findByAMemilikiTps(string $a_memiliki_tps) Return Sanitasi objects filtered by the a_memiliki_tps column
 * @method array findByATpsAngkutRutin(string $a_tps_angkut_rutin) Return Sanitasi objects filtered by the a_tps_angkut_rutin column
 * @method array findByAAnggaranSanitasi(string $a_anggaran_sanitasi) Return Sanitasi objects filtered by the a_anggaran_sanitasi column
 * @method array findByAMelibatkanSanitasiSiswa(string $a_melibatkan_sanitasi_siswa) Return Sanitasi objects filtered by the a_melibatkan_sanitasi_siswa column
 * @method array findByAKemitraanSanDaerah(string $a_kemitraan_san_daerah) Return Sanitasi objects filtered by the a_kemitraan_san_daerah column
 * @method array findByAKemitraanSanPuskesmas(string $a_kemitraan_san_puskesmas) Return Sanitasi objects filtered by the a_kemitraan_san_puskesmas column
 * @method array findByAKemitraanSanSwasta(string $a_kemitraan_san_swasta) Return Sanitasi objects filtered by the a_kemitraan_san_swasta column
 * @method array findByAKemitraanSanNonPem(string $a_kemitraan_san_non_pem) Return Sanitasi objects filtered by the a_kemitraan_san_non_pem column
 * @method array findByKieGuruCuciTangan(string $kie_guru_cuci_tangan) Return Sanitasi objects filtered by the kie_guru_cuci_tangan column
 * @method array findByKieGuruHaid(string $kie_guru_haid) Return Sanitasi objects filtered by the kie_guru_haid column
 * @method array findByKieGuruPerawatanToilet(string $kie_guru_perawatan_toilet) Return Sanitasi objects filtered by the kie_guru_perawatan_toilet column
 * @method array findByKieGuruKeamananPangan(string $kie_guru_keamanan_pangan) Return Sanitasi objects filtered by the kie_guru_keamanan_pangan column
 * @method array findByKieGuruMinumAir(string $kie_guru_minum_air) Return Sanitasi objects filtered by the kie_guru_minum_air column
 * @method array findByKieKelasCuciTangan(string $kie_kelas_cuci_tangan) Return Sanitasi objects filtered by the kie_kelas_cuci_tangan column
 * @method array findByKieKelasHaid(string $kie_kelas_haid) Return Sanitasi objects filtered by the kie_kelas_haid column
 * @method array findByKieKelasPerawatanToilet(string $kie_kelas_perawatan_toilet) Return Sanitasi objects filtered by the kie_kelas_perawatan_toilet column
 * @method array findByKieKelasKeamananPangan(string $kie_kelas_keamanan_pangan) Return Sanitasi objects filtered by the kie_kelas_keamanan_pangan column
 * @method array findByKieKelasMinumAir(string $kie_kelas_minum_air) Return Sanitasi objects filtered by the kie_kelas_minum_air column
 * @method array findByKieToiletCuciTangan(string $kie_toilet_cuci_tangan) Return Sanitasi objects filtered by the kie_toilet_cuci_tangan column
 * @method array findByKieToiletHaid(string $kie_toilet_haid) Return Sanitasi objects filtered by the kie_toilet_haid column
 * @method array findByKieToiletPerawatanToilet(string $kie_toilet_perawatan_toilet) Return Sanitasi objects filtered by the kie_toilet_perawatan_toilet column
 * @method array findByKieToiletKeamananPangan(string $kie_toilet_keamanan_pangan) Return Sanitasi objects filtered by the kie_toilet_keamanan_pangan column
 * @method array findByKieToiletMinumAir(string $kie_toilet_minum_air) Return Sanitasi objects filtered by the kie_toilet_minum_air column
 * @method array findByKieSelasarCuciTangan(string $kie_selasar_cuci_tangan) Return Sanitasi objects filtered by the kie_selasar_cuci_tangan column
 * @method array findByKieSelasarHaid(string $kie_selasar_haid) Return Sanitasi objects filtered by the kie_selasar_haid column
 * @method array findByKieSelasarPerawatanToilet(string $kie_selasar_perawatan_toilet) Return Sanitasi objects filtered by the kie_selasar_perawatan_toilet column
 * @method array findByKieSelasarKeamananPangan(string $kie_selasar_keamanan_pangan) Return Sanitasi objects filtered by the kie_selasar_keamanan_pangan column
 * @method array findByKieSelasarMinumAir(string $kie_selasar_minum_air) Return Sanitasi objects filtered by the kie_selasar_minum_air column
 * @method array findByKieUksCuciTangan(string $kie_uks_cuci_tangan) Return Sanitasi objects filtered by the kie_uks_cuci_tangan column
 * @method array findByKieUksHaid(string $kie_uks_haid) Return Sanitasi objects filtered by the kie_uks_haid column
 * @method array findByKieUksPerawatanToilet(string $kie_uks_perawatan_toilet) Return Sanitasi objects filtered by the kie_uks_perawatan_toilet column
 * @method array findByKieUksKeamananPangan(string $kie_uks_keamanan_pangan) Return Sanitasi objects filtered by the kie_uks_keamanan_pangan column
 * @method array findByKieUksMinumAir(string $kie_uks_minum_air) Return Sanitasi objects filtered by the kie_uks_minum_air column
 * @method array findByKieKantinCuciTangan(string $kie_kantin_cuci_tangan) Return Sanitasi objects filtered by the kie_kantin_cuci_tangan column
 * @method array findByKieKantinHaid(string $kie_kantin_haid) Return Sanitasi objects filtered by the kie_kantin_haid column
 * @method array findByKieKantinPerawatanToilet(string $kie_kantin_perawatan_toilet) Return Sanitasi objects filtered by the kie_kantin_perawatan_toilet column
 * @method array findByKieKantinKeamananPangan(string $kie_kantin_keamanan_pangan) Return Sanitasi objects filtered by the kie_kantin_keamanan_pangan column
 * @method array findByKieKantinMinumAir(string $kie_kantin_minum_air) Return Sanitasi objects filtered by the kie_kantin_minum_air column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSanitasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSanitasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Sanitasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SanitasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SanitasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SanitasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SanitasiQuery) {
            return $criteria;
        }
        $query = new SanitasiQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$sekolah_id, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Sanitasi|Sanitasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SanitasiPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SanitasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Sanitasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "semester_id", "sumber_air_id", "sumber_air_minum_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id", "ketersediaan_air", "kecukupan_air", "minum_siswa", "memproses_air", "siswa_bawa_air", "toilet_siswa_laki", "toilet_siswa_perempuan", "toilet_siswa_kk", "toilet_siswa_kecil", "jml_jamban_l_g", "jml_jamban_l_tg", "jml_jamban_p_g", "jml_jamban_p_tg", "jml_jamban_lp_g", "jml_jamban_lp_tg", "tempat_cuci_tangan", "tempat_cuci_tangan_rusak", "a_sabun_air_mengalir", "jamban_difabel", "tipe_jamban", "a_sedia_pembalut", "kegiatan_cuci_tangan", "pembuangan_air_limbah", "a_kuras_septitank", "a_memiliki_solokan", "a_tempat_sampah_kelas", "a_tempat_sampah_tutup_p", "a_cermin_jamban_p", "a_memiliki_tps", "a_tps_angkut_rutin", "a_anggaran_sanitasi", "a_melibatkan_sanitasi_siswa", "a_kemitraan_san_daerah", "a_kemitraan_san_puskesmas", "a_kemitraan_san_swasta", "a_kemitraan_san_non_pem", "kie_guru_cuci_tangan", "kie_guru_haid", "kie_guru_perawatan_toilet", "kie_guru_keamanan_pangan", "kie_guru_minum_air", "kie_kelas_cuci_tangan", "kie_kelas_haid", "kie_kelas_perawatan_toilet", "kie_kelas_keamanan_pangan", "kie_kelas_minum_air", "kie_toilet_cuci_tangan", "kie_toilet_haid", "kie_toilet_perawatan_toilet", "kie_toilet_keamanan_pangan", "kie_toilet_minum_air", "kie_selasar_cuci_tangan", "kie_selasar_haid", "kie_selasar_perawatan_toilet", "kie_selasar_keamanan_pangan", "kie_selasar_minum_air", "kie_uks_cuci_tangan", "kie_uks_haid", "kie_uks_perawatan_toilet", "kie_uks_keamanan_pangan", "kie_uks_minum_air", "kie_kantin_cuci_tangan", "kie_kantin_haid", "kie_kantin_perawatan_toilet", "kie_kantin_keamanan_pangan", "kie_kantin_minum_air" FROM "sanitasi" WHERE "sekolah_id" = :p0 AND "semester_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Sanitasi();
            $obj->hydrate($row);
            SanitasiPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Sanitasi|Sanitasi[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Sanitasi[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SanitasiPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SanitasiPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SanitasiPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SanitasiPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the sumber_air_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberAirId(1234); // WHERE sumber_air_id = 1234
     * $query->filterBySumberAirId(array(12, 34)); // WHERE sumber_air_id IN (12, 34)
     * $query->filterBySumberAirId(array('min' => 12)); // WHERE sumber_air_id >= 12
     * $query->filterBySumberAirId(array('max' => 12)); // WHERE sumber_air_id <= 12
     * </code>
     *
     * @see       filterBySumberAirRelatedBySumberAirId()
     *
     * @param     mixed $sumberAirId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySumberAirId($sumberAirId = null, $comparison = null)
    {
        if (is_array($sumberAirId)) {
            $useMinMax = false;
            if (isset($sumberAirId['min'])) {
                $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_ID, $sumberAirId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberAirId['max'])) {
                $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_ID, $sumberAirId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_ID, $sumberAirId, $comparison);
    }

    /**
     * Filter the query on the sumber_air_minum_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberAirMinumId(1234); // WHERE sumber_air_minum_id = 1234
     * $query->filterBySumberAirMinumId(array(12, 34)); // WHERE sumber_air_minum_id IN (12, 34)
     * $query->filterBySumberAirMinumId(array('min' => 12)); // WHERE sumber_air_minum_id >= 12
     * $query->filterBySumberAirMinumId(array('max' => 12)); // WHERE sumber_air_minum_id <= 12
     * </code>
     *
     * @see       filterBySumberAirRelatedBySumberAirMinumId()
     *
     * @param     mixed $sumberAirMinumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySumberAirMinumId($sumberAirMinumId = null, $comparison = null)
    {
        if (is_array($sumberAirMinumId)) {
            $useMinMax = false;
            if (isset($sumberAirMinumId['min'])) {
                $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_MINUM_ID, $sumberAirMinumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberAirMinumId['max'])) {
                $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_MINUM_ID, $sumberAirMinumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SUMBER_AIR_MINUM_ID, $sumberAirMinumId, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SanitasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SanitasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SanitasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SanitasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SanitasiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SanitasiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SanitasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SanitasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query on the ketersediaan_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKetersediaanAir(1234); // WHERE ketersediaan_air = 1234
     * $query->filterByKetersediaanAir(array(12, 34)); // WHERE ketersediaan_air IN (12, 34)
     * $query->filterByKetersediaanAir(array('min' => 12)); // WHERE ketersediaan_air >= 12
     * $query->filterByKetersediaanAir(array('max' => 12)); // WHERE ketersediaan_air <= 12
     * </code>
     *
     * @param     mixed $ketersediaanAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKetersediaanAir($ketersediaanAir = null, $comparison = null)
    {
        if (is_array($ketersediaanAir)) {
            $useMinMax = false;
            if (isset($ketersediaanAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KETERSEDIAAN_AIR, $ketersediaanAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ketersediaanAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KETERSEDIAAN_AIR, $ketersediaanAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KETERSEDIAAN_AIR, $ketersediaanAir, $comparison);
    }

    /**
     * Filter the query on the kecukupan_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKecukupanAir(1234); // WHERE kecukupan_air = 1234
     * $query->filterByKecukupanAir(array(12, 34)); // WHERE kecukupan_air IN (12, 34)
     * $query->filterByKecukupanAir(array('min' => 12)); // WHERE kecukupan_air >= 12
     * $query->filterByKecukupanAir(array('max' => 12)); // WHERE kecukupan_air <= 12
     * </code>
     *
     * @param     mixed $kecukupanAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKecukupanAir($kecukupanAir = null, $comparison = null)
    {
        if (is_array($kecukupanAir)) {
            $useMinMax = false;
            if (isset($kecukupanAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KECUKUPAN_AIR, $kecukupanAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kecukupanAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KECUKUPAN_AIR, $kecukupanAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KECUKUPAN_AIR, $kecukupanAir, $comparison);
    }

    /**
     * Filter the query on the minum_siswa column
     *
     * Example usage:
     * <code>
     * $query->filterByMinumSiswa(1234); // WHERE minum_siswa = 1234
     * $query->filterByMinumSiswa(array(12, 34)); // WHERE minum_siswa IN (12, 34)
     * $query->filterByMinumSiswa(array('min' => 12)); // WHERE minum_siswa >= 12
     * $query->filterByMinumSiswa(array('max' => 12)); // WHERE minum_siswa <= 12
     * </code>
     *
     * @param     mixed $minumSiswa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByMinumSiswa($minumSiswa = null, $comparison = null)
    {
        if (is_array($minumSiswa)) {
            $useMinMax = false;
            if (isset($minumSiswa['min'])) {
                $this->addUsingAlias(SanitasiPeer::MINUM_SISWA, $minumSiswa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($minumSiswa['max'])) {
                $this->addUsingAlias(SanitasiPeer::MINUM_SISWA, $minumSiswa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::MINUM_SISWA, $minumSiswa, $comparison);
    }

    /**
     * Filter the query on the memproses_air column
     *
     * Example usage:
     * <code>
     * $query->filterByMemprosesAir(1234); // WHERE memproses_air = 1234
     * $query->filterByMemprosesAir(array(12, 34)); // WHERE memproses_air IN (12, 34)
     * $query->filterByMemprosesAir(array('min' => 12)); // WHERE memproses_air >= 12
     * $query->filterByMemprosesAir(array('max' => 12)); // WHERE memproses_air <= 12
     * </code>
     *
     * @param     mixed $memprosesAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByMemprosesAir($memprosesAir = null, $comparison = null)
    {
        if (is_array($memprosesAir)) {
            $useMinMax = false;
            if (isset($memprosesAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::MEMPROSES_AIR, $memprosesAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($memprosesAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::MEMPROSES_AIR, $memprosesAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::MEMPROSES_AIR, $memprosesAir, $comparison);
    }

    /**
     * Filter the query on the siswa_bawa_air column
     *
     * Example usage:
     * <code>
     * $query->filterBySiswaBawaAir(1234); // WHERE siswa_bawa_air = 1234
     * $query->filterBySiswaBawaAir(array(12, 34)); // WHERE siswa_bawa_air IN (12, 34)
     * $query->filterBySiswaBawaAir(array('min' => 12)); // WHERE siswa_bawa_air >= 12
     * $query->filterBySiswaBawaAir(array('max' => 12)); // WHERE siswa_bawa_air <= 12
     * </code>
     *
     * @param     mixed $siswaBawaAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterBySiswaBawaAir($siswaBawaAir = null, $comparison = null)
    {
        if (is_array($siswaBawaAir)) {
            $useMinMax = false;
            if (isset($siswaBawaAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::SISWA_BAWA_AIR, $siswaBawaAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($siswaBawaAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::SISWA_BAWA_AIR, $siswaBawaAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::SISWA_BAWA_AIR, $siswaBawaAir, $comparison);
    }

    /**
     * Filter the query on the toilet_siswa_laki column
     *
     * Example usage:
     * <code>
     * $query->filterByToiletSiswaLaki(1234); // WHERE toilet_siswa_laki = 1234
     * $query->filterByToiletSiswaLaki(array(12, 34)); // WHERE toilet_siswa_laki IN (12, 34)
     * $query->filterByToiletSiswaLaki(array('min' => 12)); // WHERE toilet_siswa_laki >= 12
     * $query->filterByToiletSiswaLaki(array('max' => 12)); // WHERE toilet_siswa_laki <= 12
     * </code>
     *
     * @param     mixed $toiletSiswaLaki The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByToiletSiswaLaki($toiletSiswaLaki = null, $comparison = null)
    {
        if (is_array($toiletSiswaLaki)) {
            $useMinMax = false;
            if (isset($toiletSiswaLaki['min'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_LAKI, $toiletSiswaLaki['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toiletSiswaLaki['max'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_LAKI, $toiletSiswaLaki['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_LAKI, $toiletSiswaLaki, $comparison);
    }

    /**
     * Filter the query on the toilet_siswa_perempuan column
     *
     * Example usage:
     * <code>
     * $query->filterByToiletSiswaPerempuan(1234); // WHERE toilet_siswa_perempuan = 1234
     * $query->filterByToiletSiswaPerempuan(array(12, 34)); // WHERE toilet_siswa_perempuan IN (12, 34)
     * $query->filterByToiletSiswaPerempuan(array('min' => 12)); // WHERE toilet_siswa_perempuan >= 12
     * $query->filterByToiletSiswaPerempuan(array('max' => 12)); // WHERE toilet_siswa_perempuan <= 12
     * </code>
     *
     * @param     mixed $toiletSiswaPerempuan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByToiletSiswaPerempuan($toiletSiswaPerempuan = null, $comparison = null)
    {
        if (is_array($toiletSiswaPerempuan)) {
            $useMinMax = false;
            if (isset($toiletSiswaPerempuan['min'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_PEREMPUAN, $toiletSiswaPerempuan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toiletSiswaPerempuan['max'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_PEREMPUAN, $toiletSiswaPerempuan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_PEREMPUAN, $toiletSiswaPerempuan, $comparison);
    }

    /**
     * Filter the query on the toilet_siswa_kk column
     *
     * Example usage:
     * <code>
     * $query->filterByToiletSiswaKk(1234); // WHERE toilet_siswa_kk = 1234
     * $query->filterByToiletSiswaKk(array(12, 34)); // WHERE toilet_siswa_kk IN (12, 34)
     * $query->filterByToiletSiswaKk(array('min' => 12)); // WHERE toilet_siswa_kk >= 12
     * $query->filterByToiletSiswaKk(array('max' => 12)); // WHERE toilet_siswa_kk <= 12
     * </code>
     *
     * @param     mixed $toiletSiswaKk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByToiletSiswaKk($toiletSiswaKk = null, $comparison = null)
    {
        if (is_array($toiletSiswaKk)) {
            $useMinMax = false;
            if (isset($toiletSiswaKk['min'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KK, $toiletSiswaKk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toiletSiswaKk['max'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KK, $toiletSiswaKk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KK, $toiletSiswaKk, $comparison);
    }

    /**
     * Filter the query on the toilet_siswa_kecil column
     *
     * Example usage:
     * <code>
     * $query->filterByToiletSiswaKecil(1234); // WHERE toilet_siswa_kecil = 1234
     * $query->filterByToiletSiswaKecil(array(12, 34)); // WHERE toilet_siswa_kecil IN (12, 34)
     * $query->filterByToiletSiswaKecil(array('min' => 12)); // WHERE toilet_siswa_kecil >= 12
     * $query->filterByToiletSiswaKecil(array('max' => 12)); // WHERE toilet_siswa_kecil <= 12
     * </code>
     *
     * @param     mixed $toiletSiswaKecil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByToiletSiswaKecil($toiletSiswaKecil = null, $comparison = null)
    {
        if (is_array($toiletSiswaKecil)) {
            $useMinMax = false;
            if (isset($toiletSiswaKecil['min'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KECIL, $toiletSiswaKecil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($toiletSiswaKecil['max'])) {
                $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KECIL, $toiletSiswaKecil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TOILET_SISWA_KECIL, $toiletSiswaKecil, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_l_g column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanLG(1234); // WHERE jml_jamban_l_g = 1234
     * $query->filterByJmlJambanLG(array(12, 34)); // WHERE jml_jamban_l_g IN (12, 34)
     * $query->filterByJmlJambanLG(array('min' => 12)); // WHERE jml_jamban_l_g >= 12
     * $query->filterByJmlJambanLG(array('max' => 12)); // WHERE jml_jamban_l_g <= 12
     * </code>
     *
     * @param     mixed $jmlJambanLG The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanLG($jmlJambanLG = null, $comparison = null)
    {
        if (is_array($jmlJambanLG)) {
            $useMinMax = false;
            if (isset($jmlJambanLG['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_G, $jmlJambanLG['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanLG['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_G, $jmlJambanLG['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_G, $jmlJambanLG, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_l_tg column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanLTg(1234); // WHERE jml_jamban_l_tg = 1234
     * $query->filterByJmlJambanLTg(array(12, 34)); // WHERE jml_jamban_l_tg IN (12, 34)
     * $query->filterByJmlJambanLTg(array('min' => 12)); // WHERE jml_jamban_l_tg >= 12
     * $query->filterByJmlJambanLTg(array('max' => 12)); // WHERE jml_jamban_l_tg <= 12
     * </code>
     *
     * @param     mixed $jmlJambanLTg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanLTg($jmlJambanLTg = null, $comparison = null)
    {
        if (is_array($jmlJambanLTg)) {
            $useMinMax = false;
            if (isset($jmlJambanLTg['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_TG, $jmlJambanLTg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanLTg['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_TG, $jmlJambanLTg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_L_TG, $jmlJambanLTg, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_p_g column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanPG(1234); // WHERE jml_jamban_p_g = 1234
     * $query->filterByJmlJambanPG(array(12, 34)); // WHERE jml_jamban_p_g IN (12, 34)
     * $query->filterByJmlJambanPG(array('min' => 12)); // WHERE jml_jamban_p_g >= 12
     * $query->filterByJmlJambanPG(array('max' => 12)); // WHERE jml_jamban_p_g <= 12
     * </code>
     *
     * @param     mixed $jmlJambanPG The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanPG($jmlJambanPG = null, $comparison = null)
    {
        if (is_array($jmlJambanPG)) {
            $useMinMax = false;
            if (isset($jmlJambanPG['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_G, $jmlJambanPG['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanPG['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_G, $jmlJambanPG['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_G, $jmlJambanPG, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_p_tg column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanPTg(1234); // WHERE jml_jamban_p_tg = 1234
     * $query->filterByJmlJambanPTg(array(12, 34)); // WHERE jml_jamban_p_tg IN (12, 34)
     * $query->filterByJmlJambanPTg(array('min' => 12)); // WHERE jml_jamban_p_tg >= 12
     * $query->filterByJmlJambanPTg(array('max' => 12)); // WHERE jml_jamban_p_tg <= 12
     * </code>
     *
     * @param     mixed $jmlJambanPTg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanPTg($jmlJambanPTg = null, $comparison = null)
    {
        if (is_array($jmlJambanPTg)) {
            $useMinMax = false;
            if (isset($jmlJambanPTg['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_TG, $jmlJambanPTg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanPTg['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_TG, $jmlJambanPTg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_P_TG, $jmlJambanPTg, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_lp_g column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanLpG(1234); // WHERE jml_jamban_lp_g = 1234
     * $query->filterByJmlJambanLpG(array(12, 34)); // WHERE jml_jamban_lp_g IN (12, 34)
     * $query->filterByJmlJambanLpG(array('min' => 12)); // WHERE jml_jamban_lp_g >= 12
     * $query->filterByJmlJambanLpG(array('max' => 12)); // WHERE jml_jamban_lp_g <= 12
     * </code>
     *
     * @param     mixed $jmlJambanLpG The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanLpG($jmlJambanLpG = null, $comparison = null)
    {
        if (is_array($jmlJambanLpG)) {
            $useMinMax = false;
            if (isset($jmlJambanLpG['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_G, $jmlJambanLpG['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanLpG['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_G, $jmlJambanLpG['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_G, $jmlJambanLpG, $comparison);
    }

    /**
     * Filter the query on the jml_jamban_lp_tg column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlJambanLpTg(1234); // WHERE jml_jamban_lp_tg = 1234
     * $query->filterByJmlJambanLpTg(array(12, 34)); // WHERE jml_jamban_lp_tg IN (12, 34)
     * $query->filterByJmlJambanLpTg(array('min' => 12)); // WHERE jml_jamban_lp_tg >= 12
     * $query->filterByJmlJambanLpTg(array('max' => 12)); // WHERE jml_jamban_lp_tg <= 12
     * </code>
     *
     * @param     mixed $jmlJambanLpTg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJmlJambanLpTg($jmlJambanLpTg = null, $comparison = null)
    {
        if (is_array($jmlJambanLpTg)) {
            $useMinMax = false;
            if (isset($jmlJambanLpTg['min'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_TG, $jmlJambanLpTg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlJambanLpTg['max'])) {
                $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_TG, $jmlJambanLpTg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JML_JAMBAN_LP_TG, $jmlJambanLpTg, $comparison);
    }

    /**
     * Filter the query on the tempat_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatCuciTangan(1234); // WHERE tempat_cuci_tangan = 1234
     * $query->filterByTempatCuciTangan(array(12, 34)); // WHERE tempat_cuci_tangan IN (12, 34)
     * $query->filterByTempatCuciTangan(array('min' => 12)); // WHERE tempat_cuci_tangan >= 12
     * $query->filterByTempatCuciTangan(array('max' => 12)); // WHERE tempat_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $tempatCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByTempatCuciTangan($tempatCuciTangan = null, $comparison = null)
    {
        if (is_array($tempatCuciTangan)) {
            $useMinMax = false;
            if (isset($tempatCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN, $tempatCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tempatCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN, $tempatCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN, $tempatCuciTangan, $comparison);
    }

    /**
     * Filter the query on the tempat_cuci_tangan_rusak column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatCuciTanganRusak(1234); // WHERE tempat_cuci_tangan_rusak = 1234
     * $query->filterByTempatCuciTanganRusak(array(12, 34)); // WHERE tempat_cuci_tangan_rusak IN (12, 34)
     * $query->filterByTempatCuciTanganRusak(array('min' => 12)); // WHERE tempat_cuci_tangan_rusak >= 12
     * $query->filterByTempatCuciTanganRusak(array('max' => 12)); // WHERE tempat_cuci_tangan_rusak <= 12
     * </code>
     *
     * @param     mixed $tempatCuciTanganRusak The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByTempatCuciTanganRusak($tempatCuciTanganRusak = null, $comparison = null)
    {
        if (is_array($tempatCuciTanganRusak)) {
            $useMinMax = false;
            if (isset($tempatCuciTanganRusak['min'])) {
                $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK, $tempatCuciTanganRusak['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tempatCuciTanganRusak['max'])) {
                $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK, $tempatCuciTanganRusak['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TEMPAT_CUCI_TANGAN_RUSAK, $tempatCuciTanganRusak, $comparison);
    }

    /**
     * Filter the query on the a_sabun_air_mengalir column
     *
     * Example usage:
     * <code>
     * $query->filterByASabunAirMengalir(1234); // WHERE a_sabun_air_mengalir = 1234
     * $query->filterByASabunAirMengalir(array(12, 34)); // WHERE a_sabun_air_mengalir IN (12, 34)
     * $query->filterByASabunAirMengalir(array('min' => 12)); // WHERE a_sabun_air_mengalir >= 12
     * $query->filterByASabunAirMengalir(array('max' => 12)); // WHERE a_sabun_air_mengalir <= 12
     * </code>
     *
     * @param     mixed $aSabunAirMengalir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByASabunAirMengalir($aSabunAirMengalir = null, $comparison = null)
    {
        if (is_array($aSabunAirMengalir)) {
            $useMinMax = false;
            if (isset($aSabunAirMengalir['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_SABUN_AIR_MENGALIR, $aSabunAirMengalir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSabunAirMengalir['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_SABUN_AIR_MENGALIR, $aSabunAirMengalir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_SABUN_AIR_MENGALIR, $aSabunAirMengalir, $comparison);
    }

    /**
     * Filter the query on the jamban_difabel column
     *
     * Example usage:
     * <code>
     * $query->filterByJambanDifabel(1234); // WHERE jamban_difabel = 1234
     * $query->filterByJambanDifabel(array(12, 34)); // WHERE jamban_difabel IN (12, 34)
     * $query->filterByJambanDifabel(array('min' => 12)); // WHERE jamban_difabel >= 12
     * $query->filterByJambanDifabel(array('max' => 12)); // WHERE jamban_difabel <= 12
     * </code>
     *
     * @param     mixed $jambanDifabel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByJambanDifabel($jambanDifabel = null, $comparison = null)
    {
        if (is_array($jambanDifabel)) {
            $useMinMax = false;
            if (isset($jambanDifabel['min'])) {
                $this->addUsingAlias(SanitasiPeer::JAMBAN_DIFABEL, $jambanDifabel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jambanDifabel['max'])) {
                $this->addUsingAlias(SanitasiPeer::JAMBAN_DIFABEL, $jambanDifabel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::JAMBAN_DIFABEL, $jambanDifabel, $comparison);
    }

    /**
     * Filter the query on the tipe_jamban column
     *
     * Example usage:
     * <code>
     * $query->filterByTipeJamban('fooValue');   // WHERE tipe_jamban = 'fooValue'
     * $query->filterByTipeJamban('%fooValue%'); // WHERE tipe_jamban LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tipeJamban The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByTipeJamban($tipeJamban = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tipeJamban)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tipeJamban)) {
                $tipeJamban = str_replace('*', '%', $tipeJamban);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::TIPE_JAMBAN, $tipeJamban, $comparison);
    }

    /**
     * Filter the query on the a_sedia_pembalut column
     *
     * Example usage:
     * <code>
     * $query->filterByASediaPembalut(1234); // WHERE a_sedia_pembalut = 1234
     * $query->filterByASediaPembalut(array(12, 34)); // WHERE a_sedia_pembalut IN (12, 34)
     * $query->filterByASediaPembalut(array('min' => 12)); // WHERE a_sedia_pembalut >= 12
     * $query->filterByASediaPembalut(array('max' => 12)); // WHERE a_sedia_pembalut <= 12
     * </code>
     *
     * @param     mixed $aSediaPembalut The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByASediaPembalut($aSediaPembalut = null, $comparison = null)
    {
        if (is_array($aSediaPembalut)) {
            $useMinMax = false;
            if (isset($aSediaPembalut['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_SEDIA_PEMBALUT, $aSediaPembalut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSediaPembalut['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_SEDIA_PEMBALUT, $aSediaPembalut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_SEDIA_PEMBALUT, $aSediaPembalut, $comparison);
    }

    /**
     * Filter the query on the kegiatan_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKegiatanCuciTangan(1234); // WHERE kegiatan_cuci_tangan = 1234
     * $query->filterByKegiatanCuciTangan(array(12, 34)); // WHERE kegiatan_cuci_tangan IN (12, 34)
     * $query->filterByKegiatanCuciTangan(array('min' => 12)); // WHERE kegiatan_cuci_tangan >= 12
     * $query->filterByKegiatanCuciTangan(array('max' => 12)); // WHERE kegiatan_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kegiatanCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKegiatanCuciTangan($kegiatanCuciTangan = null, $comparison = null)
    {
        if (is_array($kegiatanCuciTangan)) {
            $useMinMax = false;
            if (isset($kegiatanCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KEGIATAN_CUCI_TANGAN, $kegiatanCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kegiatanCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KEGIATAN_CUCI_TANGAN, $kegiatanCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KEGIATAN_CUCI_TANGAN, $kegiatanCuciTangan, $comparison);
    }

    /**
     * Filter the query on the pembuangan_air_limbah column
     *
     * Example usage:
     * <code>
     * $query->filterByPembuanganAirLimbah(1234); // WHERE pembuangan_air_limbah = 1234
     * $query->filterByPembuanganAirLimbah(array(12, 34)); // WHERE pembuangan_air_limbah IN (12, 34)
     * $query->filterByPembuanganAirLimbah(array('min' => 12)); // WHERE pembuangan_air_limbah >= 12
     * $query->filterByPembuanganAirLimbah(array('max' => 12)); // WHERE pembuangan_air_limbah <= 12
     * </code>
     *
     * @param     mixed $pembuanganAirLimbah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByPembuanganAirLimbah($pembuanganAirLimbah = null, $comparison = null)
    {
        if (is_array($pembuanganAirLimbah)) {
            $useMinMax = false;
            if (isset($pembuanganAirLimbah['min'])) {
                $this->addUsingAlias(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH, $pembuanganAirLimbah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pembuanganAirLimbah['max'])) {
                $this->addUsingAlias(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH, $pembuanganAirLimbah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::PEMBUANGAN_AIR_LIMBAH, $pembuanganAirLimbah, $comparison);
    }

    /**
     * Filter the query on the a_kuras_septitank column
     *
     * Example usage:
     * <code>
     * $query->filterByAKurasSeptitank(1234); // WHERE a_kuras_septitank = 1234
     * $query->filterByAKurasSeptitank(array(12, 34)); // WHERE a_kuras_septitank IN (12, 34)
     * $query->filterByAKurasSeptitank(array('min' => 12)); // WHERE a_kuras_septitank >= 12
     * $query->filterByAKurasSeptitank(array('max' => 12)); // WHERE a_kuras_septitank <= 12
     * </code>
     *
     * @param     mixed $aKurasSeptitank The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAKurasSeptitank($aKurasSeptitank = null, $comparison = null)
    {
        if (is_array($aKurasSeptitank)) {
            $useMinMax = false;
            if (isset($aKurasSeptitank['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_KURAS_SEPTITANK, $aKurasSeptitank['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKurasSeptitank['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_KURAS_SEPTITANK, $aKurasSeptitank['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_KURAS_SEPTITANK, $aKurasSeptitank, $comparison);
    }

    /**
     * Filter the query on the a_memiliki_solokan column
     *
     * Example usage:
     * <code>
     * $query->filterByAMemilikiSolokan(1234); // WHERE a_memiliki_solokan = 1234
     * $query->filterByAMemilikiSolokan(array(12, 34)); // WHERE a_memiliki_solokan IN (12, 34)
     * $query->filterByAMemilikiSolokan(array('min' => 12)); // WHERE a_memiliki_solokan >= 12
     * $query->filterByAMemilikiSolokan(array('max' => 12)); // WHERE a_memiliki_solokan <= 12
     * </code>
     *
     * @param     mixed $aMemilikiSolokan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAMemilikiSolokan($aMemilikiSolokan = null, $comparison = null)
    {
        if (is_array($aMemilikiSolokan)) {
            $useMinMax = false;
            if (isset($aMemilikiSolokan['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_SOLOKAN, $aMemilikiSolokan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aMemilikiSolokan['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_SOLOKAN, $aMemilikiSolokan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_SOLOKAN, $aMemilikiSolokan, $comparison);
    }

    /**
     * Filter the query on the a_tempat_sampah_kelas column
     *
     * Example usage:
     * <code>
     * $query->filterByATempatSampahKelas(1234); // WHERE a_tempat_sampah_kelas = 1234
     * $query->filterByATempatSampahKelas(array(12, 34)); // WHERE a_tempat_sampah_kelas IN (12, 34)
     * $query->filterByATempatSampahKelas(array('min' => 12)); // WHERE a_tempat_sampah_kelas >= 12
     * $query->filterByATempatSampahKelas(array('max' => 12)); // WHERE a_tempat_sampah_kelas <= 12
     * </code>
     *
     * @param     mixed $aTempatSampahKelas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByATempatSampahKelas($aTempatSampahKelas = null, $comparison = null)
    {
        if (is_array($aTempatSampahKelas)) {
            $useMinMax = false;
            if (isset($aTempatSampahKelas['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS, $aTempatSampahKelas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTempatSampahKelas['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS, $aTempatSampahKelas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_KELAS, $aTempatSampahKelas, $comparison);
    }

    /**
     * Filter the query on the a_tempat_sampah_tutup_p column
     *
     * Example usage:
     * <code>
     * $query->filterByATempatSampahTutupP(1234); // WHERE a_tempat_sampah_tutup_p = 1234
     * $query->filterByATempatSampahTutupP(array(12, 34)); // WHERE a_tempat_sampah_tutup_p IN (12, 34)
     * $query->filterByATempatSampahTutupP(array('min' => 12)); // WHERE a_tempat_sampah_tutup_p >= 12
     * $query->filterByATempatSampahTutupP(array('max' => 12)); // WHERE a_tempat_sampah_tutup_p <= 12
     * </code>
     *
     * @param     mixed $aTempatSampahTutupP The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByATempatSampahTutupP($aTempatSampahTutupP = null, $comparison = null)
    {
        if (is_array($aTempatSampahTutupP)) {
            $useMinMax = false;
            if (isset($aTempatSampahTutupP['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P, $aTempatSampahTutupP['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTempatSampahTutupP['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P, $aTempatSampahTutupP['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_TEMPAT_SAMPAH_TUTUP_P, $aTempatSampahTutupP, $comparison);
    }

    /**
     * Filter the query on the a_cermin_jamban_p column
     *
     * Example usage:
     * <code>
     * $query->filterByACerminJambanP(1234); // WHERE a_cermin_jamban_p = 1234
     * $query->filterByACerminJambanP(array(12, 34)); // WHERE a_cermin_jamban_p IN (12, 34)
     * $query->filterByACerminJambanP(array('min' => 12)); // WHERE a_cermin_jamban_p >= 12
     * $query->filterByACerminJambanP(array('max' => 12)); // WHERE a_cermin_jamban_p <= 12
     * </code>
     *
     * @param     mixed $aCerminJambanP The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByACerminJambanP($aCerminJambanP = null, $comparison = null)
    {
        if (is_array($aCerminJambanP)) {
            $useMinMax = false;
            if (isset($aCerminJambanP['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_CERMIN_JAMBAN_P, $aCerminJambanP['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aCerminJambanP['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_CERMIN_JAMBAN_P, $aCerminJambanP['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_CERMIN_JAMBAN_P, $aCerminJambanP, $comparison);
    }

    /**
     * Filter the query on the a_memiliki_tps column
     *
     * Example usage:
     * <code>
     * $query->filterByAMemilikiTps(1234); // WHERE a_memiliki_tps = 1234
     * $query->filterByAMemilikiTps(array(12, 34)); // WHERE a_memiliki_tps IN (12, 34)
     * $query->filterByAMemilikiTps(array('min' => 12)); // WHERE a_memiliki_tps >= 12
     * $query->filterByAMemilikiTps(array('max' => 12)); // WHERE a_memiliki_tps <= 12
     * </code>
     *
     * @param     mixed $aMemilikiTps The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAMemilikiTps($aMemilikiTps = null, $comparison = null)
    {
        if (is_array($aMemilikiTps)) {
            $useMinMax = false;
            if (isset($aMemilikiTps['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_TPS, $aMemilikiTps['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aMemilikiTps['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_TPS, $aMemilikiTps['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_MEMILIKI_TPS, $aMemilikiTps, $comparison);
    }

    /**
     * Filter the query on the a_tps_angkut_rutin column
     *
     * Example usage:
     * <code>
     * $query->filterByATpsAngkutRutin(1234); // WHERE a_tps_angkut_rutin = 1234
     * $query->filterByATpsAngkutRutin(array(12, 34)); // WHERE a_tps_angkut_rutin IN (12, 34)
     * $query->filterByATpsAngkutRutin(array('min' => 12)); // WHERE a_tps_angkut_rutin >= 12
     * $query->filterByATpsAngkutRutin(array('max' => 12)); // WHERE a_tps_angkut_rutin <= 12
     * </code>
     *
     * @param     mixed $aTpsAngkutRutin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByATpsAngkutRutin($aTpsAngkutRutin = null, $comparison = null)
    {
        if (is_array($aTpsAngkutRutin)) {
            $useMinMax = false;
            if (isset($aTpsAngkutRutin['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_TPS_ANGKUT_RUTIN, $aTpsAngkutRutin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTpsAngkutRutin['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_TPS_ANGKUT_RUTIN, $aTpsAngkutRutin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_TPS_ANGKUT_RUTIN, $aTpsAngkutRutin, $comparison);
    }

    /**
     * Filter the query on the a_anggaran_sanitasi column
     *
     * Example usage:
     * <code>
     * $query->filterByAAnggaranSanitasi(1234); // WHERE a_anggaran_sanitasi = 1234
     * $query->filterByAAnggaranSanitasi(array(12, 34)); // WHERE a_anggaran_sanitasi IN (12, 34)
     * $query->filterByAAnggaranSanitasi(array('min' => 12)); // WHERE a_anggaran_sanitasi >= 12
     * $query->filterByAAnggaranSanitasi(array('max' => 12)); // WHERE a_anggaran_sanitasi <= 12
     * </code>
     *
     * @param     mixed $aAnggaranSanitasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAAnggaranSanitasi($aAnggaranSanitasi = null, $comparison = null)
    {
        if (is_array($aAnggaranSanitasi)) {
            $useMinMax = false;
            if (isset($aAnggaranSanitasi['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_ANGGARAN_SANITASI, $aAnggaranSanitasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aAnggaranSanitasi['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_ANGGARAN_SANITASI, $aAnggaranSanitasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_ANGGARAN_SANITASI, $aAnggaranSanitasi, $comparison);
    }

    /**
     * Filter the query on the a_melibatkan_sanitasi_siswa column
     *
     * Example usage:
     * <code>
     * $query->filterByAMelibatkanSanitasiSiswa(1234); // WHERE a_melibatkan_sanitasi_siswa = 1234
     * $query->filterByAMelibatkanSanitasiSiswa(array(12, 34)); // WHERE a_melibatkan_sanitasi_siswa IN (12, 34)
     * $query->filterByAMelibatkanSanitasiSiswa(array('min' => 12)); // WHERE a_melibatkan_sanitasi_siswa >= 12
     * $query->filterByAMelibatkanSanitasiSiswa(array('max' => 12)); // WHERE a_melibatkan_sanitasi_siswa <= 12
     * </code>
     *
     * @param     mixed $aMelibatkanSanitasiSiswa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAMelibatkanSanitasiSiswa($aMelibatkanSanitasiSiswa = null, $comparison = null)
    {
        if (is_array($aMelibatkanSanitasiSiswa)) {
            $useMinMax = false;
            if (isset($aMelibatkanSanitasiSiswa['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA, $aMelibatkanSanitasiSiswa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aMelibatkanSanitasiSiswa['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA, $aMelibatkanSanitasiSiswa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_MELIBATKAN_SANITASI_SISWA, $aMelibatkanSanitasiSiswa, $comparison);
    }

    /**
     * Filter the query on the a_kemitraan_san_daerah column
     *
     * Example usage:
     * <code>
     * $query->filterByAKemitraanSanDaerah(1234); // WHERE a_kemitraan_san_daerah = 1234
     * $query->filterByAKemitraanSanDaerah(array(12, 34)); // WHERE a_kemitraan_san_daerah IN (12, 34)
     * $query->filterByAKemitraanSanDaerah(array('min' => 12)); // WHERE a_kemitraan_san_daerah >= 12
     * $query->filterByAKemitraanSanDaerah(array('max' => 12)); // WHERE a_kemitraan_san_daerah <= 12
     * </code>
     *
     * @param     mixed $aKemitraanSanDaerah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAKemitraanSanDaerah($aKemitraanSanDaerah = null, $comparison = null)
    {
        if (is_array($aKemitraanSanDaerah)) {
            $useMinMax = false;
            if (isset($aKemitraanSanDaerah['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH, $aKemitraanSanDaerah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKemitraanSanDaerah['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH, $aKemitraanSanDaerah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_DAERAH, $aKemitraanSanDaerah, $comparison);
    }

    /**
     * Filter the query on the a_kemitraan_san_puskesmas column
     *
     * Example usage:
     * <code>
     * $query->filterByAKemitraanSanPuskesmas(1234); // WHERE a_kemitraan_san_puskesmas = 1234
     * $query->filterByAKemitraanSanPuskesmas(array(12, 34)); // WHERE a_kemitraan_san_puskesmas IN (12, 34)
     * $query->filterByAKemitraanSanPuskesmas(array('min' => 12)); // WHERE a_kemitraan_san_puskesmas >= 12
     * $query->filterByAKemitraanSanPuskesmas(array('max' => 12)); // WHERE a_kemitraan_san_puskesmas <= 12
     * </code>
     *
     * @param     mixed $aKemitraanSanPuskesmas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAKemitraanSanPuskesmas($aKemitraanSanPuskesmas = null, $comparison = null)
    {
        if (is_array($aKemitraanSanPuskesmas)) {
            $useMinMax = false;
            if (isset($aKemitraanSanPuskesmas['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS, $aKemitraanSanPuskesmas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKemitraanSanPuskesmas['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS, $aKemitraanSanPuskesmas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_PUSKESMAS, $aKemitraanSanPuskesmas, $comparison);
    }

    /**
     * Filter the query on the a_kemitraan_san_swasta column
     *
     * Example usage:
     * <code>
     * $query->filterByAKemitraanSanSwasta(1234); // WHERE a_kemitraan_san_swasta = 1234
     * $query->filterByAKemitraanSanSwasta(array(12, 34)); // WHERE a_kemitraan_san_swasta IN (12, 34)
     * $query->filterByAKemitraanSanSwasta(array('min' => 12)); // WHERE a_kemitraan_san_swasta >= 12
     * $query->filterByAKemitraanSanSwasta(array('max' => 12)); // WHERE a_kemitraan_san_swasta <= 12
     * </code>
     *
     * @param     mixed $aKemitraanSanSwasta The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAKemitraanSanSwasta($aKemitraanSanSwasta = null, $comparison = null)
    {
        if (is_array($aKemitraanSanSwasta)) {
            $useMinMax = false;
            if (isset($aKemitraanSanSwasta['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA, $aKemitraanSanSwasta['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKemitraanSanSwasta['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA, $aKemitraanSanSwasta['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_SWASTA, $aKemitraanSanSwasta, $comparison);
    }

    /**
     * Filter the query on the a_kemitraan_san_non_pem column
     *
     * Example usage:
     * <code>
     * $query->filterByAKemitraanSanNonPem(1234); // WHERE a_kemitraan_san_non_pem = 1234
     * $query->filterByAKemitraanSanNonPem(array(12, 34)); // WHERE a_kemitraan_san_non_pem IN (12, 34)
     * $query->filterByAKemitraanSanNonPem(array('min' => 12)); // WHERE a_kemitraan_san_non_pem >= 12
     * $query->filterByAKemitraanSanNonPem(array('max' => 12)); // WHERE a_kemitraan_san_non_pem <= 12
     * </code>
     *
     * @param     mixed $aKemitraanSanNonPem The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByAKemitraanSanNonPem($aKemitraanSanNonPem = null, $comparison = null)
    {
        if (is_array($aKemitraanSanNonPem)) {
            $useMinMax = false;
            if (isset($aKemitraanSanNonPem['min'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM, $aKemitraanSanNonPem['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aKemitraanSanNonPem['max'])) {
                $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM, $aKemitraanSanNonPem['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::A_KEMITRAAN_SAN_NON_PEM, $aKemitraanSanNonPem, $comparison);
    }

    /**
     * Filter the query on the kie_guru_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieGuruCuciTangan(1234); // WHERE kie_guru_cuci_tangan = 1234
     * $query->filterByKieGuruCuciTangan(array(12, 34)); // WHERE kie_guru_cuci_tangan IN (12, 34)
     * $query->filterByKieGuruCuciTangan(array('min' => 12)); // WHERE kie_guru_cuci_tangan >= 12
     * $query->filterByKieGuruCuciTangan(array('max' => 12)); // WHERE kie_guru_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieGuruCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieGuruCuciTangan($kieGuruCuciTangan = null, $comparison = null)
    {
        if (is_array($kieGuruCuciTangan)) {
            $useMinMax = false;
            if (isset($kieGuruCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_CUCI_TANGAN, $kieGuruCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieGuruCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_CUCI_TANGAN, $kieGuruCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_GURU_CUCI_TANGAN, $kieGuruCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_guru_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieGuruHaid(1234); // WHERE kie_guru_haid = 1234
     * $query->filterByKieGuruHaid(array(12, 34)); // WHERE kie_guru_haid IN (12, 34)
     * $query->filterByKieGuruHaid(array('min' => 12)); // WHERE kie_guru_haid >= 12
     * $query->filterByKieGuruHaid(array('max' => 12)); // WHERE kie_guru_haid <= 12
     * </code>
     *
     * @param     mixed $kieGuruHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieGuruHaid($kieGuruHaid = null, $comparison = null)
    {
        if (is_array($kieGuruHaid)) {
            $useMinMax = false;
            if (isset($kieGuruHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_HAID, $kieGuruHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieGuruHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_HAID, $kieGuruHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_GURU_HAID, $kieGuruHaid, $comparison);
    }

    /**
     * Filter the query on the kie_guru_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieGuruPerawatanToilet(1234); // WHERE kie_guru_perawatan_toilet = 1234
     * $query->filterByKieGuruPerawatanToilet(array(12, 34)); // WHERE kie_guru_perawatan_toilet IN (12, 34)
     * $query->filterByKieGuruPerawatanToilet(array('min' => 12)); // WHERE kie_guru_perawatan_toilet >= 12
     * $query->filterByKieGuruPerawatanToilet(array('max' => 12)); // WHERE kie_guru_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieGuruPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieGuruPerawatanToilet($kieGuruPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieGuruPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieGuruPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET, $kieGuruPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieGuruPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET, $kieGuruPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_GURU_PERAWATAN_TOILET, $kieGuruPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_guru_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieGuruKeamananPangan(1234); // WHERE kie_guru_keamanan_pangan = 1234
     * $query->filterByKieGuruKeamananPangan(array(12, 34)); // WHERE kie_guru_keamanan_pangan IN (12, 34)
     * $query->filterByKieGuruKeamananPangan(array('min' => 12)); // WHERE kie_guru_keamanan_pangan >= 12
     * $query->filterByKieGuruKeamananPangan(array('max' => 12)); // WHERE kie_guru_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieGuruKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieGuruKeamananPangan($kieGuruKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieGuruKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieGuruKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN, $kieGuruKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieGuruKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN, $kieGuruKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_GURU_KEAMANAN_PANGAN, $kieGuruKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_guru_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieGuruMinumAir(1234); // WHERE kie_guru_minum_air = 1234
     * $query->filterByKieGuruMinumAir(array(12, 34)); // WHERE kie_guru_minum_air IN (12, 34)
     * $query->filterByKieGuruMinumAir(array('min' => 12)); // WHERE kie_guru_minum_air >= 12
     * $query->filterByKieGuruMinumAir(array('max' => 12)); // WHERE kie_guru_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieGuruMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieGuruMinumAir($kieGuruMinumAir = null, $comparison = null)
    {
        if (is_array($kieGuruMinumAir)) {
            $useMinMax = false;
            if (isset($kieGuruMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_MINUM_AIR, $kieGuruMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieGuruMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_GURU_MINUM_AIR, $kieGuruMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_GURU_MINUM_AIR, $kieGuruMinumAir, $comparison);
    }

    /**
     * Filter the query on the kie_kelas_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKelasCuciTangan(1234); // WHERE kie_kelas_cuci_tangan = 1234
     * $query->filterByKieKelasCuciTangan(array(12, 34)); // WHERE kie_kelas_cuci_tangan IN (12, 34)
     * $query->filterByKieKelasCuciTangan(array('min' => 12)); // WHERE kie_kelas_cuci_tangan >= 12
     * $query->filterByKieKelasCuciTangan(array('max' => 12)); // WHERE kie_kelas_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieKelasCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKelasCuciTangan($kieKelasCuciTangan = null, $comparison = null)
    {
        if (is_array($kieKelasCuciTangan)) {
            $useMinMax = false;
            if (isset($kieKelasCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_CUCI_TANGAN, $kieKelasCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKelasCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_CUCI_TANGAN, $kieKelasCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KELAS_CUCI_TANGAN, $kieKelasCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_kelas_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKelasHaid(1234); // WHERE kie_kelas_haid = 1234
     * $query->filterByKieKelasHaid(array(12, 34)); // WHERE kie_kelas_haid IN (12, 34)
     * $query->filterByKieKelasHaid(array('min' => 12)); // WHERE kie_kelas_haid >= 12
     * $query->filterByKieKelasHaid(array('max' => 12)); // WHERE kie_kelas_haid <= 12
     * </code>
     *
     * @param     mixed $kieKelasHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKelasHaid($kieKelasHaid = null, $comparison = null)
    {
        if (is_array($kieKelasHaid)) {
            $useMinMax = false;
            if (isset($kieKelasHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_HAID, $kieKelasHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKelasHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_HAID, $kieKelasHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KELAS_HAID, $kieKelasHaid, $comparison);
    }

    /**
     * Filter the query on the kie_kelas_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKelasPerawatanToilet(1234); // WHERE kie_kelas_perawatan_toilet = 1234
     * $query->filterByKieKelasPerawatanToilet(array(12, 34)); // WHERE kie_kelas_perawatan_toilet IN (12, 34)
     * $query->filterByKieKelasPerawatanToilet(array('min' => 12)); // WHERE kie_kelas_perawatan_toilet >= 12
     * $query->filterByKieKelasPerawatanToilet(array('max' => 12)); // WHERE kie_kelas_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieKelasPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKelasPerawatanToilet($kieKelasPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieKelasPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieKelasPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET, $kieKelasPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKelasPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET, $kieKelasPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KELAS_PERAWATAN_TOILET, $kieKelasPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_kelas_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKelasKeamananPangan(1234); // WHERE kie_kelas_keamanan_pangan = 1234
     * $query->filterByKieKelasKeamananPangan(array(12, 34)); // WHERE kie_kelas_keamanan_pangan IN (12, 34)
     * $query->filterByKieKelasKeamananPangan(array('min' => 12)); // WHERE kie_kelas_keamanan_pangan >= 12
     * $query->filterByKieKelasKeamananPangan(array('max' => 12)); // WHERE kie_kelas_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieKelasKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKelasKeamananPangan($kieKelasKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieKelasKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieKelasKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN, $kieKelasKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKelasKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN, $kieKelasKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KELAS_KEAMANAN_PANGAN, $kieKelasKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_kelas_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKelasMinumAir(1234); // WHERE kie_kelas_minum_air = 1234
     * $query->filterByKieKelasMinumAir(array(12, 34)); // WHERE kie_kelas_minum_air IN (12, 34)
     * $query->filterByKieKelasMinumAir(array('min' => 12)); // WHERE kie_kelas_minum_air >= 12
     * $query->filterByKieKelasMinumAir(array('max' => 12)); // WHERE kie_kelas_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieKelasMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKelasMinumAir($kieKelasMinumAir = null, $comparison = null)
    {
        if (is_array($kieKelasMinumAir)) {
            $useMinMax = false;
            if (isset($kieKelasMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_MINUM_AIR, $kieKelasMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKelasMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KELAS_MINUM_AIR, $kieKelasMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KELAS_MINUM_AIR, $kieKelasMinumAir, $comparison);
    }

    /**
     * Filter the query on the kie_toilet_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieToiletCuciTangan(1234); // WHERE kie_toilet_cuci_tangan = 1234
     * $query->filterByKieToiletCuciTangan(array(12, 34)); // WHERE kie_toilet_cuci_tangan IN (12, 34)
     * $query->filterByKieToiletCuciTangan(array('min' => 12)); // WHERE kie_toilet_cuci_tangan >= 12
     * $query->filterByKieToiletCuciTangan(array('max' => 12)); // WHERE kie_toilet_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieToiletCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieToiletCuciTangan($kieToiletCuciTangan = null, $comparison = null)
    {
        if (is_array($kieToiletCuciTangan)) {
            $useMinMax = false;
            if (isset($kieToiletCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_CUCI_TANGAN, $kieToiletCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieToiletCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_CUCI_TANGAN, $kieToiletCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_TOILET_CUCI_TANGAN, $kieToiletCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_toilet_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieToiletHaid(1234); // WHERE kie_toilet_haid = 1234
     * $query->filterByKieToiletHaid(array(12, 34)); // WHERE kie_toilet_haid IN (12, 34)
     * $query->filterByKieToiletHaid(array('min' => 12)); // WHERE kie_toilet_haid >= 12
     * $query->filterByKieToiletHaid(array('max' => 12)); // WHERE kie_toilet_haid <= 12
     * </code>
     *
     * @param     mixed $kieToiletHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieToiletHaid($kieToiletHaid = null, $comparison = null)
    {
        if (is_array($kieToiletHaid)) {
            $useMinMax = false;
            if (isset($kieToiletHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_HAID, $kieToiletHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieToiletHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_HAID, $kieToiletHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_TOILET_HAID, $kieToiletHaid, $comparison);
    }

    /**
     * Filter the query on the kie_toilet_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieToiletPerawatanToilet(1234); // WHERE kie_toilet_perawatan_toilet = 1234
     * $query->filterByKieToiletPerawatanToilet(array(12, 34)); // WHERE kie_toilet_perawatan_toilet IN (12, 34)
     * $query->filterByKieToiletPerawatanToilet(array('min' => 12)); // WHERE kie_toilet_perawatan_toilet >= 12
     * $query->filterByKieToiletPerawatanToilet(array('max' => 12)); // WHERE kie_toilet_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieToiletPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieToiletPerawatanToilet($kieToiletPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieToiletPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieToiletPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET, $kieToiletPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieToiletPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET, $kieToiletPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_TOILET_PERAWATAN_TOILET, $kieToiletPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_toilet_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieToiletKeamananPangan(1234); // WHERE kie_toilet_keamanan_pangan = 1234
     * $query->filterByKieToiletKeamananPangan(array(12, 34)); // WHERE kie_toilet_keamanan_pangan IN (12, 34)
     * $query->filterByKieToiletKeamananPangan(array('min' => 12)); // WHERE kie_toilet_keamanan_pangan >= 12
     * $query->filterByKieToiletKeamananPangan(array('max' => 12)); // WHERE kie_toilet_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieToiletKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieToiletKeamananPangan($kieToiletKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieToiletKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieToiletKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN, $kieToiletKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieToiletKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN, $kieToiletKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_TOILET_KEAMANAN_PANGAN, $kieToiletKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_toilet_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieToiletMinumAir(1234); // WHERE kie_toilet_minum_air = 1234
     * $query->filterByKieToiletMinumAir(array(12, 34)); // WHERE kie_toilet_minum_air IN (12, 34)
     * $query->filterByKieToiletMinumAir(array('min' => 12)); // WHERE kie_toilet_minum_air >= 12
     * $query->filterByKieToiletMinumAir(array('max' => 12)); // WHERE kie_toilet_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieToiletMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieToiletMinumAir($kieToiletMinumAir = null, $comparison = null)
    {
        if (is_array($kieToiletMinumAir)) {
            $useMinMax = false;
            if (isset($kieToiletMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_MINUM_AIR, $kieToiletMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieToiletMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_TOILET_MINUM_AIR, $kieToiletMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_TOILET_MINUM_AIR, $kieToiletMinumAir, $comparison);
    }

    /**
     * Filter the query on the kie_selasar_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieSelasarCuciTangan(1234); // WHERE kie_selasar_cuci_tangan = 1234
     * $query->filterByKieSelasarCuciTangan(array(12, 34)); // WHERE kie_selasar_cuci_tangan IN (12, 34)
     * $query->filterByKieSelasarCuciTangan(array('min' => 12)); // WHERE kie_selasar_cuci_tangan >= 12
     * $query->filterByKieSelasarCuciTangan(array('max' => 12)); // WHERE kie_selasar_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieSelasarCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieSelasarCuciTangan($kieSelasarCuciTangan = null, $comparison = null)
    {
        if (is_array($kieSelasarCuciTangan)) {
            $useMinMax = false;
            if (isset($kieSelasarCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN, $kieSelasarCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieSelasarCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN, $kieSelasarCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_CUCI_TANGAN, $kieSelasarCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_selasar_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieSelasarHaid(1234); // WHERE kie_selasar_haid = 1234
     * $query->filterByKieSelasarHaid(array(12, 34)); // WHERE kie_selasar_haid IN (12, 34)
     * $query->filterByKieSelasarHaid(array('min' => 12)); // WHERE kie_selasar_haid >= 12
     * $query->filterByKieSelasarHaid(array('max' => 12)); // WHERE kie_selasar_haid <= 12
     * </code>
     *
     * @param     mixed $kieSelasarHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieSelasarHaid($kieSelasarHaid = null, $comparison = null)
    {
        if (is_array($kieSelasarHaid)) {
            $useMinMax = false;
            if (isset($kieSelasarHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_HAID, $kieSelasarHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieSelasarHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_HAID, $kieSelasarHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_HAID, $kieSelasarHaid, $comparison);
    }

    /**
     * Filter the query on the kie_selasar_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieSelasarPerawatanToilet(1234); // WHERE kie_selasar_perawatan_toilet = 1234
     * $query->filterByKieSelasarPerawatanToilet(array(12, 34)); // WHERE kie_selasar_perawatan_toilet IN (12, 34)
     * $query->filterByKieSelasarPerawatanToilet(array('min' => 12)); // WHERE kie_selasar_perawatan_toilet >= 12
     * $query->filterByKieSelasarPerawatanToilet(array('max' => 12)); // WHERE kie_selasar_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieSelasarPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieSelasarPerawatanToilet($kieSelasarPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieSelasarPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieSelasarPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET, $kieSelasarPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieSelasarPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET, $kieSelasarPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_PERAWATAN_TOILET, $kieSelasarPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_selasar_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieSelasarKeamananPangan(1234); // WHERE kie_selasar_keamanan_pangan = 1234
     * $query->filterByKieSelasarKeamananPangan(array(12, 34)); // WHERE kie_selasar_keamanan_pangan IN (12, 34)
     * $query->filterByKieSelasarKeamananPangan(array('min' => 12)); // WHERE kie_selasar_keamanan_pangan >= 12
     * $query->filterByKieSelasarKeamananPangan(array('max' => 12)); // WHERE kie_selasar_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieSelasarKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieSelasarKeamananPangan($kieSelasarKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieSelasarKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieSelasarKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN, $kieSelasarKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieSelasarKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN, $kieSelasarKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_KEAMANAN_PANGAN, $kieSelasarKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_selasar_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieSelasarMinumAir(1234); // WHERE kie_selasar_minum_air = 1234
     * $query->filterByKieSelasarMinumAir(array(12, 34)); // WHERE kie_selasar_minum_air IN (12, 34)
     * $query->filterByKieSelasarMinumAir(array('min' => 12)); // WHERE kie_selasar_minum_air >= 12
     * $query->filterByKieSelasarMinumAir(array('max' => 12)); // WHERE kie_selasar_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieSelasarMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieSelasarMinumAir($kieSelasarMinumAir = null, $comparison = null)
    {
        if (is_array($kieSelasarMinumAir)) {
            $useMinMax = false;
            if (isset($kieSelasarMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_MINUM_AIR, $kieSelasarMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieSelasarMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_MINUM_AIR, $kieSelasarMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_SELASAR_MINUM_AIR, $kieSelasarMinumAir, $comparison);
    }

    /**
     * Filter the query on the kie_uks_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieUksCuciTangan(1234); // WHERE kie_uks_cuci_tangan = 1234
     * $query->filterByKieUksCuciTangan(array(12, 34)); // WHERE kie_uks_cuci_tangan IN (12, 34)
     * $query->filterByKieUksCuciTangan(array('min' => 12)); // WHERE kie_uks_cuci_tangan >= 12
     * $query->filterByKieUksCuciTangan(array('max' => 12)); // WHERE kie_uks_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieUksCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieUksCuciTangan($kieUksCuciTangan = null, $comparison = null)
    {
        if (is_array($kieUksCuciTangan)) {
            $useMinMax = false;
            if (isset($kieUksCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_CUCI_TANGAN, $kieUksCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieUksCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_CUCI_TANGAN, $kieUksCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_UKS_CUCI_TANGAN, $kieUksCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_uks_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieUksHaid(1234); // WHERE kie_uks_haid = 1234
     * $query->filterByKieUksHaid(array(12, 34)); // WHERE kie_uks_haid IN (12, 34)
     * $query->filterByKieUksHaid(array('min' => 12)); // WHERE kie_uks_haid >= 12
     * $query->filterByKieUksHaid(array('max' => 12)); // WHERE kie_uks_haid <= 12
     * </code>
     *
     * @param     mixed $kieUksHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieUksHaid($kieUksHaid = null, $comparison = null)
    {
        if (is_array($kieUksHaid)) {
            $useMinMax = false;
            if (isset($kieUksHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_HAID, $kieUksHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieUksHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_HAID, $kieUksHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_UKS_HAID, $kieUksHaid, $comparison);
    }

    /**
     * Filter the query on the kie_uks_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieUksPerawatanToilet(1234); // WHERE kie_uks_perawatan_toilet = 1234
     * $query->filterByKieUksPerawatanToilet(array(12, 34)); // WHERE kie_uks_perawatan_toilet IN (12, 34)
     * $query->filterByKieUksPerawatanToilet(array('min' => 12)); // WHERE kie_uks_perawatan_toilet >= 12
     * $query->filterByKieUksPerawatanToilet(array('max' => 12)); // WHERE kie_uks_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieUksPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieUksPerawatanToilet($kieUksPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieUksPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieUksPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET, $kieUksPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieUksPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET, $kieUksPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_UKS_PERAWATAN_TOILET, $kieUksPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_uks_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieUksKeamananPangan(1234); // WHERE kie_uks_keamanan_pangan = 1234
     * $query->filterByKieUksKeamananPangan(array(12, 34)); // WHERE kie_uks_keamanan_pangan IN (12, 34)
     * $query->filterByKieUksKeamananPangan(array('min' => 12)); // WHERE kie_uks_keamanan_pangan >= 12
     * $query->filterByKieUksKeamananPangan(array('max' => 12)); // WHERE kie_uks_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieUksKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieUksKeamananPangan($kieUksKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieUksKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieUksKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN, $kieUksKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieUksKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN, $kieUksKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_UKS_KEAMANAN_PANGAN, $kieUksKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_uks_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieUksMinumAir(1234); // WHERE kie_uks_minum_air = 1234
     * $query->filterByKieUksMinumAir(array(12, 34)); // WHERE kie_uks_minum_air IN (12, 34)
     * $query->filterByKieUksMinumAir(array('min' => 12)); // WHERE kie_uks_minum_air >= 12
     * $query->filterByKieUksMinumAir(array('max' => 12)); // WHERE kie_uks_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieUksMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieUksMinumAir($kieUksMinumAir = null, $comparison = null)
    {
        if (is_array($kieUksMinumAir)) {
            $useMinMax = false;
            if (isset($kieUksMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_MINUM_AIR, $kieUksMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieUksMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_UKS_MINUM_AIR, $kieUksMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_UKS_MINUM_AIR, $kieUksMinumAir, $comparison);
    }

    /**
     * Filter the query on the kie_kantin_cuci_tangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKantinCuciTangan(1234); // WHERE kie_kantin_cuci_tangan = 1234
     * $query->filterByKieKantinCuciTangan(array(12, 34)); // WHERE kie_kantin_cuci_tangan IN (12, 34)
     * $query->filterByKieKantinCuciTangan(array('min' => 12)); // WHERE kie_kantin_cuci_tangan >= 12
     * $query->filterByKieKantinCuciTangan(array('max' => 12)); // WHERE kie_kantin_cuci_tangan <= 12
     * </code>
     *
     * @param     mixed $kieKantinCuciTangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKantinCuciTangan($kieKantinCuciTangan = null, $comparison = null)
    {
        if (is_array($kieKantinCuciTangan)) {
            $useMinMax = false;
            if (isset($kieKantinCuciTangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN, $kieKantinCuciTangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKantinCuciTangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN, $kieKantinCuciTangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_CUCI_TANGAN, $kieKantinCuciTangan, $comparison);
    }

    /**
     * Filter the query on the kie_kantin_haid column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKantinHaid(1234); // WHERE kie_kantin_haid = 1234
     * $query->filterByKieKantinHaid(array(12, 34)); // WHERE kie_kantin_haid IN (12, 34)
     * $query->filterByKieKantinHaid(array('min' => 12)); // WHERE kie_kantin_haid >= 12
     * $query->filterByKieKantinHaid(array('max' => 12)); // WHERE kie_kantin_haid <= 12
     * </code>
     *
     * @param     mixed $kieKantinHaid The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKantinHaid($kieKantinHaid = null, $comparison = null)
    {
        if (is_array($kieKantinHaid)) {
            $useMinMax = false;
            if (isset($kieKantinHaid['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_HAID, $kieKantinHaid['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKantinHaid['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_HAID, $kieKantinHaid['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_HAID, $kieKantinHaid, $comparison);
    }

    /**
     * Filter the query on the kie_kantin_perawatan_toilet column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKantinPerawatanToilet(1234); // WHERE kie_kantin_perawatan_toilet = 1234
     * $query->filterByKieKantinPerawatanToilet(array(12, 34)); // WHERE kie_kantin_perawatan_toilet IN (12, 34)
     * $query->filterByKieKantinPerawatanToilet(array('min' => 12)); // WHERE kie_kantin_perawatan_toilet >= 12
     * $query->filterByKieKantinPerawatanToilet(array('max' => 12)); // WHERE kie_kantin_perawatan_toilet <= 12
     * </code>
     *
     * @param     mixed $kieKantinPerawatanToilet The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKantinPerawatanToilet($kieKantinPerawatanToilet = null, $comparison = null)
    {
        if (is_array($kieKantinPerawatanToilet)) {
            $useMinMax = false;
            if (isset($kieKantinPerawatanToilet['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET, $kieKantinPerawatanToilet['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKantinPerawatanToilet['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET, $kieKantinPerawatanToilet['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_PERAWATAN_TOILET, $kieKantinPerawatanToilet, $comparison);
    }

    /**
     * Filter the query on the kie_kantin_keamanan_pangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKantinKeamananPangan(1234); // WHERE kie_kantin_keamanan_pangan = 1234
     * $query->filterByKieKantinKeamananPangan(array(12, 34)); // WHERE kie_kantin_keamanan_pangan IN (12, 34)
     * $query->filterByKieKantinKeamananPangan(array('min' => 12)); // WHERE kie_kantin_keamanan_pangan >= 12
     * $query->filterByKieKantinKeamananPangan(array('max' => 12)); // WHERE kie_kantin_keamanan_pangan <= 12
     * </code>
     *
     * @param     mixed $kieKantinKeamananPangan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKantinKeamananPangan($kieKantinKeamananPangan = null, $comparison = null)
    {
        if (is_array($kieKantinKeamananPangan)) {
            $useMinMax = false;
            if (isset($kieKantinKeamananPangan['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN, $kieKantinKeamananPangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKantinKeamananPangan['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN, $kieKantinKeamananPangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_KEAMANAN_PANGAN, $kieKantinKeamananPangan, $comparison);
    }

    /**
     * Filter the query on the kie_kantin_minum_air column
     *
     * Example usage:
     * <code>
     * $query->filterByKieKantinMinumAir(1234); // WHERE kie_kantin_minum_air = 1234
     * $query->filterByKieKantinMinumAir(array(12, 34)); // WHERE kie_kantin_minum_air IN (12, 34)
     * $query->filterByKieKantinMinumAir(array('min' => 12)); // WHERE kie_kantin_minum_air >= 12
     * $query->filterByKieKantinMinumAir(array('max' => 12)); // WHERE kie_kantin_minum_air <= 12
     * </code>
     *
     * @param     mixed $kieKantinMinumAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function filterByKieKantinMinumAir($kieKantinMinumAir = null, $comparison = null)
    {
        if (is_array($kieKantinMinumAir)) {
            $useMinMax = false;
            if (isset($kieKantinMinumAir['min'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_MINUM_AIR, $kieKantinMinumAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kieKantinMinumAir['max'])) {
                $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_MINUM_AIR, $kieKantinMinumAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SanitasiPeer::KIE_KANTIN_MINUM_AIR, $kieKantinMinumAir, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SanitasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(SanitasiPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SanitasiPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SanitasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(SanitasiPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SanitasiPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Filter the query by a related SumberAir object
     *
     * @param   SumberAir|PropelObjectCollection $sumberAir The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SanitasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberAirRelatedBySumberAirId($sumberAir, $comparison = null)
    {
        if ($sumberAir instanceof SumberAir) {
            return $this
                ->addUsingAlias(SanitasiPeer::SUMBER_AIR_ID, $sumberAir->getSumberAirId(), $comparison);
        } elseif ($sumberAir instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SanitasiPeer::SUMBER_AIR_ID, $sumberAir->toKeyValue('PrimaryKey', 'SumberAirId'), $comparison);
        } else {
            throw new PropelException('filterBySumberAirRelatedBySumberAirId() only accepts arguments of type SumberAir or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberAirRelatedBySumberAirId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function joinSumberAirRelatedBySumberAirId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberAirRelatedBySumberAirId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SumberAirRelatedBySumberAirId');
        }

        return $this;
    }

    /**
     * Use the SumberAirRelatedBySumberAirId relation SumberAir object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberAirQuery A secondary query class using the current class as primary query
     */
    public function useSumberAirRelatedBySumberAirIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberAirRelatedBySumberAirId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberAirRelatedBySumberAirId', '\DataDikdas\Model\SumberAirQuery');
    }

    /**
     * Filter the query by a related SumberAir object
     *
     * @param   SumberAir|PropelObjectCollection $sumberAir The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SanitasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberAirRelatedBySumberAirMinumId($sumberAir, $comparison = null)
    {
        if ($sumberAir instanceof SumberAir) {
            return $this
                ->addUsingAlias(SanitasiPeer::SUMBER_AIR_MINUM_ID, $sumberAir->getSumberAirId(), $comparison);
        } elseif ($sumberAir instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SanitasiPeer::SUMBER_AIR_MINUM_ID, $sumberAir->toKeyValue('PrimaryKey', 'SumberAirId'), $comparison);
        } else {
            throw new PropelException('filterBySumberAirRelatedBySumberAirMinumId() only accepts arguments of type SumberAir or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberAirRelatedBySumberAirMinumId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function joinSumberAirRelatedBySumberAirMinumId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberAirRelatedBySumberAirMinumId');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SumberAirRelatedBySumberAirMinumId');
        }

        return $this;
    }

    /**
     * Use the SumberAirRelatedBySumberAirMinumId relation SumberAir object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberAirQuery A secondary query class using the current class as primary query
     */
    public function useSumberAirRelatedBySumberAirMinumIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberAirRelatedBySumberAirMinumId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberAirRelatedBySumberAirMinumId', '\DataDikdas\Model\SumberAirQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Sanitasi $sanitasi Object to remove from the list of results
     *
     * @return SanitasiQuery The current query, for fluid interface
     */
    public function prune($sanitasi = null)
    {
        if ($sanitasi) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SanitasiPeer::SEKOLAH_ID), $sanitasi->getSekolahId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SanitasiPeer::SEMESTER_ID), $sanitasi->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
