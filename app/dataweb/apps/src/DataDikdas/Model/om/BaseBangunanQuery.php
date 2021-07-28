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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\BangunanDariBlockgrant;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BangunanPeer;
use DataDikdas\Model\BangunanQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\VldBangunan;

/**
 * Base class that represents a query for the 'bangunan' table.
 *
 * 
 *
 * @method BangunanQuery orderByIdBangunan($order = Criteria::ASC) Order by the id_bangunan column
 * @method BangunanQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method BangunanQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method BangunanQuery orderByIdTanah($order = Criteria::ASC) Order by the id_tanah column
 * @method BangunanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method BangunanQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method BangunanQuery orderByKepemilikanSarprasId($order = Criteria::ASC) Order by the kepemilikan_sarpras_id column
 * @method BangunanQuery orderByKdKl($order = Criteria::ASC) Order by the kd_kl column
 * @method BangunanQuery orderByKdSatker($order = Criteria::ASC) Order by the kd_satker column
 * @method BangunanQuery orderByKdBrg($order = Criteria::ASC) Order by the kd_brg column
 * @method BangunanQuery orderByNup($order = Criteria::ASC) Order by the nup column
 * @method BangunanQuery orderByKodeEselon1($order = Criteria::ASC) Order by the kode_eselon1 column
 * @method BangunanQuery orderByNamaEselon1($order = Criteria::ASC) Order by the nama_eselon1 column
 * @method BangunanQuery orderByKodeSubSatker($order = Criteria::ASC) Order by the kode_sub_satker column
 * @method BangunanQuery orderByNamaSubSatker($order = Criteria::ASC) Order by the nama_sub_satker column
 * @method BangunanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method BangunanQuery orderByPanjang($order = Criteria::ASC) Order by the panjang column
 * @method BangunanQuery orderByLebar($order = Criteria::ASC) Order by the lebar column
 * @method BangunanQuery orderByNilaiPerolehanAset($order = Criteria::ASC) Order by the nilai_perolehan_aset column
 * @method BangunanQuery orderByJmlLantai($order = Criteria::ASC) Order by the jml_lantai column
 * @method BangunanQuery orderByThnDibangun($order = Criteria::ASC) Order by the thn_dibangun column
 * @method BangunanQuery orderByLuasTapakBangunan($order = Criteria::ASC) Order by the luas_tapak_bangunan column
 * @method BangunanQuery orderByVolPondasiM3($order = Criteria::ASC) Order by the vol_pondasi_m3 column
 * @method BangunanQuery orderByVolSloopKolomBalokM3($order = Criteria::ASC) Order by the vol_sloop_kolom_balok_m3 column
 * @method BangunanQuery orderByPanjKudakudaM($order = Criteria::ASC) Order by the panj_kudakuda_m column
 * @method BangunanQuery orderByVolKudakudaM3($order = Criteria::ASC) Order by the vol_kudakuda_m3 column
 * @method BangunanQuery orderByPanjKasoM($order = Criteria::ASC) Order by the panj_kaso_m column
 * @method BangunanQuery orderByPanjRengM($order = Criteria::ASC) Order by the panj_reng_m column
 * @method BangunanQuery orderByLuasTutupAtapM2($order = Criteria::ASC) Order by the luas_tutup_atap_m2 column
 * @method BangunanQuery orderByKdSatkerTanah($order = Criteria::ASC) Order by the kd_satker_tanah column
 * @method BangunanQuery orderByNmSatkerTanah($order = Criteria::ASC) Order by the nm_satker_tanah column
 * @method BangunanQuery orderByKdBrgTanah($order = Criteria::ASC) Order by the kd_brg_tanah column
 * @method BangunanQuery orderByNmBrgTanah($order = Criteria::ASC) Order by the nm_brg_tanah column
 * @method BangunanQuery orderByNupBrgTanah($order = Criteria::ASC) Order by the nup_brg_tanah column
 * @method BangunanQuery orderByTglSkPemakai($order = Criteria::ASC) Order by the tgl_sk_pemakai column
 * @method BangunanQuery orderByTglHapusBuku($order = Criteria::ASC) Order by the tgl_hapus_buku column
 * @method BangunanQuery orderByKetBangunan($order = Criteria::ASC) Order by the ket_bangunan column
 * @method BangunanQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BangunanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BangunanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BangunanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BangunanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BangunanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BangunanQuery groupByIdBangunan() Group by the id_bangunan column
 * @method BangunanQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method BangunanQuery groupBySekolahId() Group by the sekolah_id column
 * @method BangunanQuery groupByIdTanah() Group by the id_tanah column
 * @method BangunanQuery groupByPtkId() Group by the ptk_id column
 * @method BangunanQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method BangunanQuery groupByKepemilikanSarprasId() Group by the kepemilikan_sarpras_id column
 * @method BangunanQuery groupByKdKl() Group by the kd_kl column
 * @method BangunanQuery groupByKdSatker() Group by the kd_satker column
 * @method BangunanQuery groupByKdBrg() Group by the kd_brg column
 * @method BangunanQuery groupByNup() Group by the nup column
 * @method BangunanQuery groupByKodeEselon1() Group by the kode_eselon1 column
 * @method BangunanQuery groupByNamaEselon1() Group by the nama_eselon1 column
 * @method BangunanQuery groupByKodeSubSatker() Group by the kode_sub_satker column
 * @method BangunanQuery groupByNamaSubSatker() Group by the nama_sub_satker column
 * @method BangunanQuery groupByNama() Group by the nama column
 * @method BangunanQuery groupByPanjang() Group by the panjang column
 * @method BangunanQuery groupByLebar() Group by the lebar column
 * @method BangunanQuery groupByNilaiPerolehanAset() Group by the nilai_perolehan_aset column
 * @method BangunanQuery groupByJmlLantai() Group by the jml_lantai column
 * @method BangunanQuery groupByThnDibangun() Group by the thn_dibangun column
 * @method BangunanQuery groupByLuasTapakBangunan() Group by the luas_tapak_bangunan column
 * @method BangunanQuery groupByVolPondasiM3() Group by the vol_pondasi_m3 column
 * @method BangunanQuery groupByVolSloopKolomBalokM3() Group by the vol_sloop_kolom_balok_m3 column
 * @method BangunanQuery groupByPanjKudakudaM() Group by the panj_kudakuda_m column
 * @method BangunanQuery groupByVolKudakudaM3() Group by the vol_kudakuda_m3 column
 * @method BangunanQuery groupByPanjKasoM() Group by the panj_kaso_m column
 * @method BangunanQuery groupByPanjRengM() Group by the panj_reng_m column
 * @method BangunanQuery groupByLuasTutupAtapM2() Group by the luas_tutup_atap_m2 column
 * @method BangunanQuery groupByKdSatkerTanah() Group by the kd_satker_tanah column
 * @method BangunanQuery groupByNmSatkerTanah() Group by the nm_satker_tanah column
 * @method BangunanQuery groupByKdBrgTanah() Group by the kd_brg_tanah column
 * @method BangunanQuery groupByNmBrgTanah() Group by the nm_brg_tanah column
 * @method BangunanQuery groupByNupBrgTanah() Group by the nup_brg_tanah column
 * @method BangunanQuery groupByTglSkPemakai() Group by the tgl_sk_pemakai column
 * @method BangunanQuery groupByTglHapusBuku() Group by the tgl_hapus_buku column
 * @method BangunanQuery groupByKetBangunan() Group by the ket_bangunan column
 * @method BangunanQuery groupByAsalData() Group by the asal_data column
 * @method BangunanQuery groupByCreateDate() Group by the create_date column
 * @method BangunanQuery groupByLastUpdate() Group by the last_update column
 * @method BangunanQuery groupBySoftDelete() Group by the soft_delete column
 * @method BangunanQuery groupByLastSync() Group by the last_sync column
 * @method BangunanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BangunanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BangunanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BangunanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BangunanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BangunanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BangunanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BangunanQuery leftJoinJenisHapusBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHapusBuku relation
 * @method BangunanQuery rightJoinJenisHapusBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHapusBuku relation
 * @method BangunanQuery innerJoinJenisHapusBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHapusBuku relation
 *
 * @method BangunanQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method BangunanQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method BangunanQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method BangunanQuery leftJoinJenisPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrasarana relation
 * @method BangunanQuery rightJoinJenisPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrasarana relation
 * @method BangunanQuery innerJoinJenisPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrasarana relation
 *
 * @method BangunanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method BangunanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method BangunanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method BangunanQuery leftJoinStatusKepemilikanSarpras($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method BangunanQuery rightJoinStatusKepemilikanSarpras($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method BangunanQuery innerJoinStatusKepemilikanSarpras($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepemilikanSarpras relation
 *
 * @method BangunanQuery leftJoinBangunanDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the BangunanDariBlockgrant relation
 * @method BangunanQuery rightJoinBangunanDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BangunanDariBlockgrant relation
 * @method BangunanQuery innerJoinBangunanDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the BangunanDariBlockgrant relation
 *
 * @method BangunanQuery leftJoinBangunanLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the BangunanLongitudinal relation
 * @method BangunanQuery rightJoinBangunanLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BangunanLongitudinal relation
 * @method BangunanQuery innerJoinBangunanLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the BangunanLongitudinal relation
 *
 * @method BangunanQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method BangunanQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method BangunanQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method BangunanQuery leftJoinVldBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBangunan relation
 * @method BangunanQuery rightJoinVldBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBangunan relation
 * @method BangunanQuery innerJoinVldBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBangunan relation
 *
 * @method Bangunan findOne(PropelPDO $con = null) Return the first Bangunan matching the query
 * @method Bangunan findOneOrCreate(PropelPDO $con = null) Return the first Bangunan matching the query, or a new Bangunan object populated from the query conditions when no match is found
 *
 * @method Bangunan findOneByJenisPrasaranaId(int $jenis_prasarana_id) Return the first Bangunan filtered by the jenis_prasarana_id column
 * @method Bangunan findOneBySekolahId(string $sekolah_id) Return the first Bangunan filtered by the sekolah_id column
 * @method Bangunan findOneByIdTanah(string $id_tanah) Return the first Bangunan filtered by the id_tanah column
 * @method Bangunan findOneByPtkId(string $ptk_id) Return the first Bangunan filtered by the ptk_id column
 * @method Bangunan findOneByIdHapusBuku(string $id_hapus_buku) Return the first Bangunan filtered by the id_hapus_buku column
 * @method Bangunan findOneByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return the first Bangunan filtered by the kepemilikan_sarpras_id column
 * @method Bangunan findOneByKdKl(string $kd_kl) Return the first Bangunan filtered by the kd_kl column
 * @method Bangunan findOneByKdSatker(string $kd_satker) Return the first Bangunan filtered by the kd_satker column
 * @method Bangunan findOneByKdBrg(string $kd_brg) Return the first Bangunan filtered by the kd_brg column
 * @method Bangunan findOneByNup(int $nup) Return the first Bangunan filtered by the nup column
 * @method Bangunan findOneByKodeEselon1(string $kode_eselon1) Return the first Bangunan filtered by the kode_eselon1 column
 * @method Bangunan findOneByNamaEselon1(string $nama_eselon1) Return the first Bangunan filtered by the nama_eselon1 column
 * @method Bangunan findOneByKodeSubSatker(string $kode_sub_satker) Return the first Bangunan filtered by the kode_sub_satker column
 * @method Bangunan findOneByNamaSubSatker(string $nama_sub_satker) Return the first Bangunan filtered by the nama_sub_satker column
 * @method Bangunan findOneByNama(string $nama) Return the first Bangunan filtered by the nama column
 * @method Bangunan findOneByPanjang(double $panjang) Return the first Bangunan filtered by the panjang column
 * @method Bangunan findOneByLebar(double $lebar) Return the first Bangunan filtered by the lebar column
 * @method Bangunan findOneByNilaiPerolehanAset(string $nilai_perolehan_aset) Return the first Bangunan filtered by the nilai_perolehan_aset column
 * @method Bangunan findOneByJmlLantai(string $jml_lantai) Return the first Bangunan filtered by the jml_lantai column
 * @method Bangunan findOneByThnDibangun(string $thn_dibangun) Return the first Bangunan filtered by the thn_dibangun column
 * @method Bangunan findOneByLuasTapakBangunan(string $luas_tapak_bangunan) Return the first Bangunan filtered by the luas_tapak_bangunan column
 * @method Bangunan findOneByVolPondasiM3(string $vol_pondasi_m3) Return the first Bangunan filtered by the vol_pondasi_m3 column
 * @method Bangunan findOneByVolSloopKolomBalokM3(string $vol_sloop_kolom_balok_m3) Return the first Bangunan filtered by the vol_sloop_kolom_balok_m3 column
 * @method Bangunan findOneByPanjKudakudaM(string $panj_kudakuda_m) Return the first Bangunan filtered by the panj_kudakuda_m column
 * @method Bangunan findOneByVolKudakudaM3(string $vol_kudakuda_m3) Return the first Bangunan filtered by the vol_kudakuda_m3 column
 * @method Bangunan findOneByPanjKasoM(string $panj_kaso_m) Return the first Bangunan filtered by the panj_kaso_m column
 * @method Bangunan findOneByPanjRengM(string $panj_reng_m) Return the first Bangunan filtered by the panj_reng_m column
 * @method Bangunan findOneByLuasTutupAtapM2(string $luas_tutup_atap_m2) Return the first Bangunan filtered by the luas_tutup_atap_m2 column
 * @method Bangunan findOneByKdSatkerTanah(string $kd_satker_tanah) Return the first Bangunan filtered by the kd_satker_tanah column
 * @method Bangunan findOneByNmSatkerTanah(string $nm_satker_tanah) Return the first Bangunan filtered by the nm_satker_tanah column
 * @method Bangunan findOneByKdBrgTanah(string $kd_brg_tanah) Return the first Bangunan filtered by the kd_brg_tanah column
 * @method Bangunan findOneByNmBrgTanah(string $nm_brg_tanah) Return the first Bangunan filtered by the nm_brg_tanah column
 * @method Bangunan findOneByNupBrgTanah(string $nup_brg_tanah) Return the first Bangunan filtered by the nup_brg_tanah column
 * @method Bangunan findOneByTglSkPemakai(string $tgl_sk_pemakai) Return the first Bangunan filtered by the tgl_sk_pemakai column
 * @method Bangunan findOneByTglHapusBuku(string $tgl_hapus_buku) Return the first Bangunan filtered by the tgl_hapus_buku column
 * @method Bangunan findOneByKetBangunan(string $ket_bangunan) Return the first Bangunan filtered by the ket_bangunan column
 * @method Bangunan findOneByAsalData(string $asal_data) Return the first Bangunan filtered by the asal_data column
 * @method Bangunan findOneByCreateDate(string $create_date) Return the first Bangunan filtered by the create_date column
 * @method Bangunan findOneByLastUpdate(string $last_update) Return the first Bangunan filtered by the last_update column
 * @method Bangunan findOneBySoftDelete(string $soft_delete) Return the first Bangunan filtered by the soft_delete column
 * @method Bangunan findOneByLastSync(string $last_sync) Return the first Bangunan filtered by the last_sync column
 * @method Bangunan findOneByUpdaterId(string $updater_id) Return the first Bangunan filtered by the updater_id column
 *
 * @method array findByIdBangunan(string $id_bangunan) Return Bangunan objects filtered by the id_bangunan column
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return Bangunan objects filtered by the jenis_prasarana_id column
 * @method array findBySekolahId(string $sekolah_id) Return Bangunan objects filtered by the sekolah_id column
 * @method array findByIdTanah(string $id_tanah) Return Bangunan objects filtered by the id_tanah column
 * @method array findByPtkId(string $ptk_id) Return Bangunan objects filtered by the ptk_id column
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return Bangunan objects filtered by the id_hapus_buku column
 * @method array findByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return Bangunan objects filtered by the kepemilikan_sarpras_id column
 * @method array findByKdKl(string $kd_kl) Return Bangunan objects filtered by the kd_kl column
 * @method array findByKdSatker(string $kd_satker) Return Bangunan objects filtered by the kd_satker column
 * @method array findByKdBrg(string $kd_brg) Return Bangunan objects filtered by the kd_brg column
 * @method array findByNup(int $nup) Return Bangunan objects filtered by the nup column
 * @method array findByKodeEselon1(string $kode_eselon1) Return Bangunan objects filtered by the kode_eselon1 column
 * @method array findByNamaEselon1(string $nama_eselon1) Return Bangunan objects filtered by the nama_eselon1 column
 * @method array findByKodeSubSatker(string $kode_sub_satker) Return Bangunan objects filtered by the kode_sub_satker column
 * @method array findByNamaSubSatker(string $nama_sub_satker) Return Bangunan objects filtered by the nama_sub_satker column
 * @method array findByNama(string $nama) Return Bangunan objects filtered by the nama column
 * @method array findByPanjang(double $panjang) Return Bangunan objects filtered by the panjang column
 * @method array findByLebar(double $lebar) Return Bangunan objects filtered by the lebar column
 * @method array findByNilaiPerolehanAset(string $nilai_perolehan_aset) Return Bangunan objects filtered by the nilai_perolehan_aset column
 * @method array findByJmlLantai(string $jml_lantai) Return Bangunan objects filtered by the jml_lantai column
 * @method array findByThnDibangun(string $thn_dibangun) Return Bangunan objects filtered by the thn_dibangun column
 * @method array findByLuasTapakBangunan(string $luas_tapak_bangunan) Return Bangunan objects filtered by the luas_tapak_bangunan column
 * @method array findByVolPondasiM3(string $vol_pondasi_m3) Return Bangunan objects filtered by the vol_pondasi_m3 column
 * @method array findByVolSloopKolomBalokM3(string $vol_sloop_kolom_balok_m3) Return Bangunan objects filtered by the vol_sloop_kolom_balok_m3 column
 * @method array findByPanjKudakudaM(string $panj_kudakuda_m) Return Bangunan objects filtered by the panj_kudakuda_m column
 * @method array findByVolKudakudaM3(string $vol_kudakuda_m3) Return Bangunan objects filtered by the vol_kudakuda_m3 column
 * @method array findByPanjKasoM(string $panj_kaso_m) Return Bangunan objects filtered by the panj_kaso_m column
 * @method array findByPanjRengM(string $panj_reng_m) Return Bangunan objects filtered by the panj_reng_m column
 * @method array findByLuasTutupAtapM2(string $luas_tutup_atap_m2) Return Bangunan objects filtered by the luas_tutup_atap_m2 column
 * @method array findByKdSatkerTanah(string $kd_satker_tanah) Return Bangunan objects filtered by the kd_satker_tanah column
 * @method array findByNmSatkerTanah(string $nm_satker_tanah) Return Bangunan objects filtered by the nm_satker_tanah column
 * @method array findByKdBrgTanah(string $kd_brg_tanah) Return Bangunan objects filtered by the kd_brg_tanah column
 * @method array findByNmBrgTanah(string $nm_brg_tanah) Return Bangunan objects filtered by the nm_brg_tanah column
 * @method array findByNupBrgTanah(string $nup_brg_tanah) Return Bangunan objects filtered by the nup_brg_tanah column
 * @method array findByTglSkPemakai(string $tgl_sk_pemakai) Return Bangunan objects filtered by the tgl_sk_pemakai column
 * @method array findByTglHapusBuku(string $tgl_hapus_buku) Return Bangunan objects filtered by the tgl_hapus_buku column
 * @method array findByKetBangunan(string $ket_bangunan) Return Bangunan objects filtered by the ket_bangunan column
 * @method array findByAsalData(string $asal_data) Return Bangunan objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Bangunan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Bangunan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Bangunan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Bangunan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Bangunan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBangunanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBangunanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Bangunan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BangunanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BangunanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BangunanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BangunanQuery) {
            return $criteria;
        }
        $query = new BangunanQuery();
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
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Bangunan|Bangunan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BangunanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BangunanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Bangunan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdBangunan($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Bangunan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_bangunan", "jenis_prasarana_id", "sekolah_id", "id_tanah", "ptk_id", "id_hapus_buku", "kepemilikan_sarpras_id", "kd_kl", "kd_satker", "kd_brg", "nup", "kode_eselon1", "nama_eselon1", "kode_sub_satker", "nama_sub_satker", "nama", "panjang", "lebar", "nilai_perolehan_aset", "jml_lantai", "thn_dibangun", "luas_tapak_bangunan", "vol_pondasi_m3", "vol_sloop_kolom_balok_m3", "panj_kudakuda_m", "vol_kudakuda_m3", "panj_kaso_m", "panj_reng_m", "luas_tutup_atap_m2", "kd_satker_tanah", "nm_satker_tanah", "kd_brg_tanah", "nm_brg_tanah", "nup_brg_tanah", "tgl_sk_pemakai", "tgl_hapus_buku", "ket_bangunan", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "bangunan" WHERE "id_bangunan" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Bangunan();
            $obj->hydrate($row);
            BangunanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Bangunan|Bangunan[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Bangunan[]|mixed the list of results, formatted by the current formatter
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
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BangunanPeer::ID_BANGUNAN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BangunanPeer::ID_BANGUNAN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBangunan('fooValue');   // WHERE id_bangunan = 'fooValue'
     * $query->filterByIdBangunan('%fooValue%'); // WHERE id_bangunan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBangunan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByIdBangunan($idBangunan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBangunan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBangunan)) {
                $idBangunan = str_replace('*', '%', $idBangunan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::ID_BANGUNAN, $idBangunan, $comparison);
    }

    /**
     * Filter the query on the jenis_prasarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPrasaranaId(1234); // WHERE jenis_prasarana_id = 1234
     * $query->filterByJenisPrasaranaId(array(12, 34)); // WHERE jenis_prasarana_id IN (12, 34)
     * $query->filterByJenisPrasaranaId(array('min' => 12)); // WHERE jenis_prasarana_id >= 12
     * $query->filterByJenisPrasaranaId(array('max' => 12)); // WHERE jenis_prasarana_id <= 12
     * </code>
     *
     * @see       filterByJenisPrasarana()
     *
     * @param     mixed $jenisPrasaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(BangunanPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(BangunanPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BangunanPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the id_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTanah('fooValue');   // WHERE id_tanah = 'fooValue'
     * $query->filterByIdTanah('%fooValue%'); // WHERE id_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByIdTanah($idTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idTanah)) {
                $idTanah = str_replace('*', '%', $idTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::ID_TANAH, $idTanah, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the id_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHapusBuku('fooValue');   // WHERE id_hapus_buku = 'fooValue'
     * $query->filterByIdHapusBuku('%fooValue%'); // WHERE id_hapus_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idHapusBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByIdHapusBuku($idHapusBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idHapusBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idHapusBuku)) {
                $idHapusBuku = str_replace('*', '%', $idHapusBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
    }

    /**
     * Filter the query on the kepemilikan_sarpras_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKepemilikanSarprasId(1234); // WHERE kepemilikan_sarpras_id = 1234
     * $query->filterByKepemilikanSarprasId(array(12, 34)); // WHERE kepemilikan_sarpras_id IN (12, 34)
     * $query->filterByKepemilikanSarprasId(array('min' => 12)); // WHERE kepemilikan_sarpras_id >= 12
     * $query->filterByKepemilikanSarprasId(array('max' => 12)); // WHERE kepemilikan_sarpras_id <= 12
     * </code>
     *
     * @see       filterByStatusKepemilikanSarpras()
     *
     * @param     mixed $kepemilikanSarprasId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKepemilikanSarprasId($kepemilikanSarprasId = null, $comparison = null)
    {
        if (is_array($kepemilikanSarprasId)) {
            $useMinMax = false;
            if (isset($kepemilikanSarprasId['min'])) {
                $this->addUsingAlias(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepemilikanSarprasId['max'])) {
                $this->addUsingAlias(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId, $comparison);
    }

    /**
     * Filter the query on the kd_kl column
     *
     * Example usage:
     * <code>
     * $query->filterByKdKl('fooValue');   // WHERE kd_kl = 'fooValue'
     * $query->filterByKdKl('%fooValue%'); // WHERE kd_kl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdKl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKdKl($kdKl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdKl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdKl)) {
                $kdKl = str_replace('*', '%', $kdKl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KD_KL, $kdKl, $comparison);
    }

    /**
     * Filter the query on the kd_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByKdSatker('fooValue');   // WHERE kd_satker = 'fooValue'
     * $query->filterByKdSatker('%fooValue%'); // WHERE kd_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKdSatker($kdSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdSatker)) {
                $kdSatker = str_replace('*', '%', $kdSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KD_SATKER, $kdSatker, $comparison);
    }

    /**
     * Filter the query on the kd_brg column
     *
     * Example usage:
     * <code>
     * $query->filterByKdBrg('fooValue');   // WHERE kd_brg = 'fooValue'
     * $query->filterByKdBrg('%fooValue%'); // WHERE kd_brg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdBrg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKdBrg($kdBrg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdBrg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdBrg)) {
                $kdBrg = str_replace('*', '%', $kdBrg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KD_BRG, $kdBrg, $comparison);
    }

    /**
     * Filter the query on the nup column
     *
     * Example usage:
     * <code>
     * $query->filterByNup(1234); // WHERE nup = 1234
     * $query->filterByNup(array(12, 34)); // WHERE nup IN (12, 34)
     * $query->filterByNup(array('min' => 12)); // WHERE nup >= 12
     * $query->filterByNup(array('max' => 12)); // WHERE nup <= 12
     * </code>
     *
     * @param     mixed $nup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNup($nup = null, $comparison = null)
    {
        if (is_array($nup)) {
            $useMinMax = false;
            if (isset($nup['min'])) {
                $this->addUsingAlias(BangunanPeer::NUP, $nup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nup['max'])) {
                $this->addUsingAlias(BangunanPeer::NUP, $nup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NUP, $nup, $comparison);
    }

    /**
     * Filter the query on the kode_eselon1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeEselon1('fooValue');   // WHERE kode_eselon1 = 'fooValue'
     * $query->filterByKodeEselon1('%fooValue%'); // WHERE kode_eselon1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeEselon1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKodeEselon1($kodeEselon1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeEselon1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeEselon1)) {
                $kodeEselon1 = str_replace('*', '%', $kodeEselon1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KODE_ESELON1, $kodeEselon1, $comparison);
    }

    /**
     * Filter the query on the nama_eselon1 column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaEselon1('fooValue');   // WHERE nama_eselon1 = 'fooValue'
     * $query->filterByNamaEselon1('%fooValue%'); // WHERE nama_eselon1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaEselon1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNamaEselon1($namaEselon1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaEselon1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaEselon1)) {
                $namaEselon1 = str_replace('*', '%', $namaEselon1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NAMA_ESELON1, $namaEselon1, $comparison);
    }

    /**
     * Filter the query on the kode_sub_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeSubSatker('fooValue');   // WHERE kode_sub_satker = 'fooValue'
     * $query->filterByKodeSubSatker('%fooValue%'); // WHERE kode_sub_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeSubSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKodeSubSatker($kodeSubSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeSubSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeSubSatker)) {
                $kodeSubSatker = str_replace('*', '%', $kodeSubSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KODE_SUB_SATKER, $kodeSubSatker, $comparison);
    }

    /**
     * Filter the query on the nama_sub_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaSubSatker('fooValue');   // WHERE nama_sub_satker = 'fooValue'
     * $query->filterByNamaSubSatker('%fooValue%'); // WHERE nama_sub_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaSubSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNamaSubSatker($namaSubSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaSubSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaSubSatker)) {
                $namaSubSatker = str_replace('*', '%', $namaSubSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NAMA_SUB_SATKER, $namaSubSatker, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the panjang column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjang(1234); // WHERE panjang = 1234
     * $query->filterByPanjang(array(12, 34)); // WHERE panjang IN (12, 34)
     * $query->filterByPanjang(array('min' => 12)); // WHERE panjang >= 12
     * $query->filterByPanjang(array('max' => 12)); // WHERE panjang <= 12
     * </code>
     *
     * @param     mixed $panjang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPanjang($panjang = null, $comparison = null)
    {
        if (is_array($panjang)) {
            $useMinMax = false;
            if (isset($panjang['min'])) {
                $this->addUsingAlias(BangunanPeer::PANJANG, $panjang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjang['max'])) {
                $this->addUsingAlias(BangunanPeer::PANJANG, $panjang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::PANJANG, $panjang, $comparison);
    }

    /**
     * Filter the query on the lebar column
     *
     * Example usage:
     * <code>
     * $query->filterByLebar(1234); // WHERE lebar = 1234
     * $query->filterByLebar(array(12, 34)); // WHERE lebar IN (12, 34)
     * $query->filterByLebar(array('min' => 12)); // WHERE lebar >= 12
     * $query->filterByLebar(array('max' => 12)); // WHERE lebar <= 12
     * </code>
     *
     * @param     mixed $lebar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByLebar($lebar = null, $comparison = null)
    {
        if (is_array($lebar)) {
            $useMinMax = false;
            if (isset($lebar['min'])) {
                $this->addUsingAlias(BangunanPeer::LEBAR, $lebar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lebar['max'])) {
                $this->addUsingAlias(BangunanPeer::LEBAR, $lebar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::LEBAR, $lebar, $comparison);
    }

    /**
     * Filter the query on the nilai_perolehan_aset column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiPerolehanAset(1234); // WHERE nilai_perolehan_aset = 1234
     * $query->filterByNilaiPerolehanAset(array(12, 34)); // WHERE nilai_perolehan_aset IN (12, 34)
     * $query->filterByNilaiPerolehanAset(array('min' => 12)); // WHERE nilai_perolehan_aset >= 12
     * $query->filterByNilaiPerolehanAset(array('max' => 12)); // WHERE nilai_perolehan_aset <= 12
     * </code>
     *
     * @param     mixed $nilaiPerolehanAset The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNilaiPerolehanAset($nilaiPerolehanAset = null, $comparison = null)
    {
        if (is_array($nilaiPerolehanAset)) {
            $useMinMax = false;
            if (isset($nilaiPerolehanAset['min'])) {
                $this->addUsingAlias(BangunanPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiPerolehanAset['max'])) {
                $this->addUsingAlias(BangunanPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset, $comparison);
    }

    /**
     * Filter the query on the jml_lantai column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlLantai(1234); // WHERE jml_lantai = 1234
     * $query->filterByJmlLantai(array(12, 34)); // WHERE jml_lantai IN (12, 34)
     * $query->filterByJmlLantai(array('min' => 12)); // WHERE jml_lantai >= 12
     * $query->filterByJmlLantai(array('max' => 12)); // WHERE jml_lantai <= 12
     * </code>
     *
     * @param     mixed $jmlLantai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByJmlLantai($jmlLantai = null, $comparison = null)
    {
        if (is_array($jmlLantai)) {
            $useMinMax = false;
            if (isset($jmlLantai['min'])) {
                $this->addUsingAlias(BangunanPeer::JML_LANTAI, $jmlLantai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlLantai['max'])) {
                $this->addUsingAlias(BangunanPeer::JML_LANTAI, $jmlLantai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::JML_LANTAI, $jmlLantai, $comparison);
    }

    /**
     * Filter the query on the thn_dibangun column
     *
     * Example usage:
     * <code>
     * $query->filterByThnDibangun(1234); // WHERE thn_dibangun = 1234
     * $query->filterByThnDibangun(array(12, 34)); // WHERE thn_dibangun IN (12, 34)
     * $query->filterByThnDibangun(array('min' => 12)); // WHERE thn_dibangun >= 12
     * $query->filterByThnDibangun(array('max' => 12)); // WHERE thn_dibangun <= 12
     * </code>
     *
     * @param     mixed $thnDibangun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByThnDibangun($thnDibangun = null, $comparison = null)
    {
        if (is_array($thnDibangun)) {
            $useMinMax = false;
            if (isset($thnDibangun['min'])) {
                $this->addUsingAlias(BangunanPeer::THN_DIBANGUN, $thnDibangun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($thnDibangun['max'])) {
                $this->addUsingAlias(BangunanPeer::THN_DIBANGUN, $thnDibangun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::THN_DIBANGUN, $thnDibangun, $comparison);
    }

    /**
     * Filter the query on the luas_tapak_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTapakBangunan(1234); // WHERE luas_tapak_bangunan = 1234
     * $query->filterByLuasTapakBangunan(array(12, 34)); // WHERE luas_tapak_bangunan IN (12, 34)
     * $query->filterByLuasTapakBangunan(array('min' => 12)); // WHERE luas_tapak_bangunan >= 12
     * $query->filterByLuasTapakBangunan(array('max' => 12)); // WHERE luas_tapak_bangunan <= 12
     * </code>
     *
     * @param     mixed $luasTapakBangunan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByLuasTapakBangunan($luasTapakBangunan = null, $comparison = null)
    {
        if (is_array($luasTapakBangunan)) {
            $useMinMax = false;
            if (isset($luasTapakBangunan['min'])) {
                $this->addUsingAlias(BangunanPeer::LUAS_TAPAK_BANGUNAN, $luasTapakBangunan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTapakBangunan['max'])) {
                $this->addUsingAlias(BangunanPeer::LUAS_TAPAK_BANGUNAN, $luasTapakBangunan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::LUAS_TAPAK_BANGUNAN, $luasTapakBangunan, $comparison);
    }

    /**
     * Filter the query on the vol_pondasi_m3 column
     *
     * Example usage:
     * <code>
     * $query->filterByVolPondasiM3(1234); // WHERE vol_pondasi_m3 = 1234
     * $query->filterByVolPondasiM3(array(12, 34)); // WHERE vol_pondasi_m3 IN (12, 34)
     * $query->filterByVolPondasiM3(array('min' => 12)); // WHERE vol_pondasi_m3 >= 12
     * $query->filterByVolPondasiM3(array('max' => 12)); // WHERE vol_pondasi_m3 <= 12
     * </code>
     *
     * @param     mixed $volPondasiM3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByVolPondasiM3($volPondasiM3 = null, $comparison = null)
    {
        if (is_array($volPondasiM3)) {
            $useMinMax = false;
            if (isset($volPondasiM3['min'])) {
                $this->addUsingAlias(BangunanPeer::VOL_PONDASI_M3, $volPondasiM3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volPondasiM3['max'])) {
                $this->addUsingAlias(BangunanPeer::VOL_PONDASI_M3, $volPondasiM3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::VOL_PONDASI_M3, $volPondasiM3, $comparison);
    }

    /**
     * Filter the query on the vol_sloop_kolom_balok_m3 column
     *
     * Example usage:
     * <code>
     * $query->filterByVolSloopKolomBalokM3(1234); // WHERE vol_sloop_kolom_balok_m3 = 1234
     * $query->filterByVolSloopKolomBalokM3(array(12, 34)); // WHERE vol_sloop_kolom_balok_m3 IN (12, 34)
     * $query->filterByVolSloopKolomBalokM3(array('min' => 12)); // WHERE vol_sloop_kolom_balok_m3 >= 12
     * $query->filterByVolSloopKolomBalokM3(array('max' => 12)); // WHERE vol_sloop_kolom_balok_m3 <= 12
     * </code>
     *
     * @param     mixed $volSloopKolomBalokM3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByVolSloopKolomBalokM3($volSloopKolomBalokM3 = null, $comparison = null)
    {
        if (is_array($volSloopKolomBalokM3)) {
            $useMinMax = false;
            if (isset($volSloopKolomBalokM3['min'])) {
                $this->addUsingAlias(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3, $volSloopKolomBalokM3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volSloopKolomBalokM3['max'])) {
                $this->addUsingAlias(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3, $volSloopKolomBalokM3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::VOL_SLOOP_KOLOM_BALOK_M3, $volSloopKolomBalokM3, $comparison);
    }

    /**
     * Filter the query on the panj_kudakuda_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjKudakudaM(1234); // WHERE panj_kudakuda_m = 1234
     * $query->filterByPanjKudakudaM(array(12, 34)); // WHERE panj_kudakuda_m IN (12, 34)
     * $query->filterByPanjKudakudaM(array('min' => 12)); // WHERE panj_kudakuda_m >= 12
     * $query->filterByPanjKudakudaM(array('max' => 12)); // WHERE panj_kudakuda_m <= 12
     * </code>
     *
     * @param     mixed $panjKudakudaM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPanjKudakudaM($panjKudakudaM = null, $comparison = null)
    {
        if (is_array($panjKudakudaM)) {
            $useMinMax = false;
            if (isset($panjKudakudaM['min'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_KUDAKUDA_M, $panjKudakudaM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjKudakudaM['max'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_KUDAKUDA_M, $panjKudakudaM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::PANJ_KUDAKUDA_M, $panjKudakudaM, $comparison);
    }

    /**
     * Filter the query on the vol_kudakuda_m3 column
     *
     * Example usage:
     * <code>
     * $query->filterByVolKudakudaM3(1234); // WHERE vol_kudakuda_m3 = 1234
     * $query->filterByVolKudakudaM3(array(12, 34)); // WHERE vol_kudakuda_m3 IN (12, 34)
     * $query->filterByVolKudakudaM3(array('min' => 12)); // WHERE vol_kudakuda_m3 >= 12
     * $query->filterByVolKudakudaM3(array('max' => 12)); // WHERE vol_kudakuda_m3 <= 12
     * </code>
     *
     * @param     mixed $volKudakudaM3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByVolKudakudaM3($volKudakudaM3 = null, $comparison = null)
    {
        if (is_array($volKudakudaM3)) {
            $useMinMax = false;
            if (isset($volKudakudaM3['min'])) {
                $this->addUsingAlias(BangunanPeer::VOL_KUDAKUDA_M3, $volKudakudaM3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($volKudakudaM3['max'])) {
                $this->addUsingAlias(BangunanPeer::VOL_KUDAKUDA_M3, $volKudakudaM3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::VOL_KUDAKUDA_M3, $volKudakudaM3, $comparison);
    }

    /**
     * Filter the query on the panj_kaso_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjKasoM(1234); // WHERE panj_kaso_m = 1234
     * $query->filterByPanjKasoM(array(12, 34)); // WHERE panj_kaso_m IN (12, 34)
     * $query->filterByPanjKasoM(array('min' => 12)); // WHERE panj_kaso_m >= 12
     * $query->filterByPanjKasoM(array('max' => 12)); // WHERE panj_kaso_m <= 12
     * </code>
     *
     * @param     mixed $panjKasoM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPanjKasoM($panjKasoM = null, $comparison = null)
    {
        if (is_array($panjKasoM)) {
            $useMinMax = false;
            if (isset($panjKasoM['min'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_KASO_M, $panjKasoM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjKasoM['max'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_KASO_M, $panjKasoM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::PANJ_KASO_M, $panjKasoM, $comparison);
    }

    /**
     * Filter the query on the panj_reng_m column
     *
     * Example usage:
     * <code>
     * $query->filterByPanjRengM(1234); // WHERE panj_reng_m = 1234
     * $query->filterByPanjRengM(array(12, 34)); // WHERE panj_reng_m IN (12, 34)
     * $query->filterByPanjRengM(array('min' => 12)); // WHERE panj_reng_m >= 12
     * $query->filterByPanjRengM(array('max' => 12)); // WHERE panj_reng_m <= 12
     * </code>
     *
     * @param     mixed $panjRengM The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByPanjRengM($panjRengM = null, $comparison = null)
    {
        if (is_array($panjRengM)) {
            $useMinMax = false;
            if (isset($panjRengM['min'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_RENG_M, $panjRengM['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjRengM['max'])) {
                $this->addUsingAlias(BangunanPeer::PANJ_RENG_M, $panjRengM['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::PANJ_RENG_M, $panjRengM, $comparison);
    }

    /**
     * Filter the query on the luas_tutup_atap_m2 column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasTutupAtapM2(1234); // WHERE luas_tutup_atap_m2 = 1234
     * $query->filterByLuasTutupAtapM2(array(12, 34)); // WHERE luas_tutup_atap_m2 IN (12, 34)
     * $query->filterByLuasTutupAtapM2(array('min' => 12)); // WHERE luas_tutup_atap_m2 >= 12
     * $query->filterByLuasTutupAtapM2(array('max' => 12)); // WHERE luas_tutup_atap_m2 <= 12
     * </code>
     *
     * @param     mixed $luasTutupAtapM2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByLuasTutupAtapM2($luasTutupAtapM2 = null, $comparison = null)
    {
        if (is_array($luasTutupAtapM2)) {
            $useMinMax = false;
            if (isset($luasTutupAtapM2['min'])) {
                $this->addUsingAlias(BangunanPeer::LUAS_TUTUP_ATAP_M2, $luasTutupAtapM2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasTutupAtapM2['max'])) {
                $this->addUsingAlias(BangunanPeer::LUAS_TUTUP_ATAP_M2, $luasTutupAtapM2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::LUAS_TUTUP_ATAP_M2, $luasTutupAtapM2, $comparison);
    }

    /**
     * Filter the query on the kd_satker_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByKdSatkerTanah('fooValue');   // WHERE kd_satker_tanah = 'fooValue'
     * $query->filterByKdSatkerTanah('%fooValue%'); // WHERE kd_satker_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdSatkerTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKdSatkerTanah($kdSatkerTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdSatkerTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdSatkerTanah)) {
                $kdSatkerTanah = str_replace('*', '%', $kdSatkerTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KD_SATKER_TANAH, $kdSatkerTanah, $comparison);
    }

    /**
     * Filter the query on the nm_satker_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByNmSatkerTanah('fooValue');   // WHERE nm_satker_tanah = 'fooValue'
     * $query->filterByNmSatkerTanah('%fooValue%'); // WHERE nm_satker_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmSatkerTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNmSatkerTanah($nmSatkerTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmSatkerTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmSatkerTanah)) {
                $nmSatkerTanah = str_replace('*', '%', $nmSatkerTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NM_SATKER_TANAH, $nmSatkerTanah, $comparison);
    }

    /**
     * Filter the query on the kd_brg_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByKdBrgTanah('fooValue');   // WHERE kd_brg_tanah = 'fooValue'
     * $query->filterByKdBrgTanah('%fooValue%'); // WHERE kd_brg_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdBrgTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKdBrgTanah($kdBrgTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdBrgTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdBrgTanah)) {
                $kdBrgTanah = str_replace('*', '%', $kdBrgTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KD_BRG_TANAH, $kdBrgTanah, $comparison);
    }

    /**
     * Filter the query on the nm_brg_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByNmBrgTanah('fooValue');   // WHERE nm_brg_tanah = 'fooValue'
     * $query->filterByNmBrgTanah('%fooValue%'); // WHERE nm_brg_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmBrgTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNmBrgTanah($nmBrgTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmBrgTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmBrgTanah)) {
                $nmBrgTanah = str_replace('*', '%', $nmBrgTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NM_BRG_TANAH, $nmBrgTanah, $comparison);
    }

    /**
     * Filter the query on the nup_brg_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByNupBrgTanah('fooValue');   // WHERE nup_brg_tanah = 'fooValue'
     * $query->filterByNupBrgTanah('%fooValue%'); // WHERE nup_brg_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nupBrgTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByNupBrgTanah($nupBrgTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nupBrgTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nupBrgTanah)) {
                $nupBrgTanah = str_replace('*', '%', $nupBrgTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::NUP_BRG_TANAH, $nupBrgTanah, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_pemakai column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkPemakai('2011-03-14'); // WHERE tgl_sk_pemakai = '2011-03-14'
     * $query->filterByTglSkPemakai('now'); // WHERE tgl_sk_pemakai = '2011-03-14'
     * $query->filterByTglSkPemakai(array('max' => 'yesterday')); // WHERE tgl_sk_pemakai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkPemakai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByTglSkPemakai($tglSkPemakai = null, $comparison = null)
    {
        if (is_array($tglSkPemakai)) {
            $useMinMax = false;
            if (isset($tglSkPemakai['min'])) {
                $this->addUsingAlias(BangunanPeer::TGL_SK_PEMAKAI, $tglSkPemakai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkPemakai['max'])) {
                $this->addUsingAlias(BangunanPeer::TGL_SK_PEMAKAI, $tglSkPemakai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::TGL_SK_PEMAKAI, $tglSkPemakai, $comparison);
    }

    /**
     * Filter the query on the tgl_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByTglHapusBuku('2011-03-14'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku('now'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku(array('max' => 'yesterday')); // WHERE tgl_hapus_buku > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglHapusBuku The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByTglHapusBuku($tglHapusBuku = null, $comparison = null)
    {
        if (is_array($tglHapusBuku)) {
            $useMinMax = false;
            if (isset($tglHapusBuku['min'])) {
                $this->addUsingAlias(BangunanPeer::TGL_HAPUS_BUKU, $tglHapusBuku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglHapusBuku['max'])) {
                $this->addUsingAlias(BangunanPeer::TGL_HAPUS_BUKU, $tglHapusBuku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::TGL_HAPUS_BUKU, $tglHapusBuku, $comparison);
    }

    /**
     * Filter the query on the ket_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByKetBangunan('fooValue');   // WHERE ket_bangunan = 'fooValue'
     * $query->filterByKetBangunan('%fooValue%'); // WHERE ket_bangunan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketBangunan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByKetBangunan($ketBangunan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketBangunan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketBangunan)) {
                $ketBangunan = str_replace('*', '%', $ketBangunan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::KET_BANGUNAN, $ketBangunan, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BangunanPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BangunanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BangunanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BangunanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BangunanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BangunanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BangunanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BangunanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BangunanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BangunanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BangunanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BangunanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related JenisHapusBuku object
     *
     * @param   JenisHapusBuku|PropelObjectCollection $jenisHapusBuku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHapusBuku($jenisHapusBuku, $comparison = null)
    {
        if ($jenisHapusBuku instanceof JenisHapusBuku) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), $comparison);
        } elseif ($jenisHapusBuku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::ID_HAPUS_BUKU, $jenisHapusBuku->toKeyValue('PrimaryKey', 'IdHapusBuku'), $comparison);
        } else {
            throw new PropelException('filterByJenisHapusBuku() only accepts arguments of type JenisHapusBuku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisHapusBuku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinJenisHapusBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisHapusBuku');

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
            $this->addJoinObject($join, 'JenisHapusBuku');
        }

        return $this;
    }

    /**
     * Use the JenisHapusBuku relation JenisHapusBuku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisHapusBukuQuery A secondary query class using the current class as primary query
     */
    public function useJenisHapusBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisHapusBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisHapusBuku', '\DataDikdas\Model\JenisHapusBukuQuery');
    }

    /**
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_TANAH, $tanah->getIdTanah(), $comparison);
        } elseif ($tanah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::ID_TANAH, $tanah->toKeyValue('PrimaryKey', 'IdTanah'), $comparison);
        } else {
            throw new PropelException('filterByTanah() only accepts arguments of type Tanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tanah');

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
            $this->addJoinObject($join, 'Tanah');
        }

        return $this;
    }

    /**
     * Use the Tanah relation Tanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahQuery A secondary query class using the current class as primary query
     */
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Filter the query by a related JenisPrasarana object
     *
     * @param   JenisPrasarana|PropelObjectCollection $jenisPrasarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrasarana($jenisPrasarana, $comparison = null)
    {
        if ($jenisPrasarana instanceof JenisPrasarana) {
            return $this
                ->addUsingAlias(BangunanPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($jenisPrasarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::JENIS_PRASARANA_ID, $jenisPrasarana->toKeyValue('PrimaryKey', 'JenisPrasaranaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPrasarana() only accepts arguments of type JenisPrasarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPrasarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinJenisPrasarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPrasarana');

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
            $this->addJoinObject($join, 'JenisPrasarana');
        }

        return $this;
    }

    /**
     * Use the JenisPrasarana relation JenisPrasarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPrasaranaQuery A secondary query class using the current class as primary query
     */
    public function useJenisPrasaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPrasarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPrasarana', '\DataDikdas\Model\JenisPrasaranaQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(BangunanPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return BangunanQuery The current query, for fluid interface
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
     * Filter the query by a related StatusKepemilikanSarpras object
     *
     * @param   StatusKepemilikanSarpras|PropelObjectCollection $statusKepemilikanSarpras The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepemilikanSarpras($statusKepemilikanSarpras, $comparison = null)
    {
        if ($statusKepemilikanSarpras instanceof StatusKepemilikanSarpras) {
            return $this
                ->addUsingAlias(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->getKepemilikanSarprasId(), $comparison);
        } elseif ($statusKepemilikanSarpras instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BangunanPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->toKeyValue('PrimaryKey', 'KepemilikanSarprasId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKepemilikanSarpras() only accepts arguments of type StatusKepemilikanSarpras or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKepemilikanSarpras relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinStatusKepemilikanSarpras($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKepemilikanSarpras');

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
            $this->addJoinObject($join, 'StatusKepemilikanSarpras');
        }

        return $this;
    }

    /**
     * Use the StatusKepemilikanSarpras relation StatusKepemilikanSarpras object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKepemilikanSarprasQuery A secondary query class using the current class as primary query
     */
    public function useStatusKepemilikanSarprasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKepemilikanSarpras($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKepemilikanSarpras', '\DataDikdas\Model\StatusKepemilikanSarprasQuery');
    }

    /**
     * Filter the query by a related BangunanDariBlockgrant object
     *
     * @param   BangunanDariBlockgrant|PropelObjectCollection $bangunanDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunanDariBlockgrant($bangunanDariBlockgrant, $comparison = null)
    {
        if ($bangunanDariBlockgrant instanceof BangunanDariBlockgrant) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_BANGUNAN, $bangunanDariBlockgrant->getIdBangunan(), $comparison);
        } elseif ($bangunanDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useBangunanDariBlockgrantQuery()
                ->filterByPrimaryKeys($bangunanDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunanDariBlockgrant() only accepts arguments of type BangunanDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BangunanDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinBangunanDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BangunanDariBlockgrant');

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
            $this->addJoinObject($join, 'BangunanDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the BangunanDariBlockgrant relation BangunanDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useBangunanDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunanDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BangunanDariBlockgrant', '\DataDikdas\Model\BangunanDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related BangunanLongitudinal object
     *
     * @param   BangunanLongitudinal|PropelObjectCollection $bangunanLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunanLongitudinal($bangunanLongitudinal, $comparison = null)
    {
        if ($bangunanLongitudinal instanceof BangunanLongitudinal) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_BANGUNAN, $bangunanLongitudinal->getIdBangunan(), $comparison);
        } elseif ($bangunanLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useBangunanLongitudinalQuery()
                ->filterByPrimaryKeys($bangunanLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunanLongitudinal() only accepts arguments of type BangunanLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BangunanLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinBangunanLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BangunanLongitudinal');

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
            $this->addJoinObject($join, 'BangunanLongitudinal');
        }

        return $this;
    }

    /**
     * Use the BangunanLongitudinal relation BangunanLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useBangunanLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunanLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BangunanLongitudinal', '\DataDikdas\Model\BangunanLongitudinalQuery');
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_BANGUNAN, $ruang->getIdBangunan(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            return $this
                ->useRuangQuery()
                ->filterByPrimaryKeys($ruang->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ruang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ruang');

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
            $this->addJoinObject($join, 'Ruang');
        }

        return $this;
    }

    /**
     * Use the Ruang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related VldBangunan object
     *
     * @param   VldBangunan|PropelObjectCollection $vldBangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BangunanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBangunan($vldBangunan, $comparison = null)
    {
        if ($vldBangunan instanceof VldBangunan) {
            return $this
                ->addUsingAlias(BangunanPeer::ID_BANGUNAN, $vldBangunan->getIdBangunan(), $comparison);
        } elseif ($vldBangunan instanceof PropelObjectCollection) {
            return $this
                ->useVldBangunanQuery()
                ->filterByPrimaryKeys($vldBangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBangunan() only accepts arguments of type VldBangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function joinVldBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBangunan');

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
            $this->addJoinObject($join, 'VldBangunan');
        }

        return $this;
    }

    /**
     * Use the VldBangunan relation VldBangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBangunanQuery A secondary query class using the current class as primary query
     */
    public function useVldBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBangunan', '\DataDikdas\Model\VldBangunanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Bangunan $bangunan Object to remove from the list of results
     *
     * @return BangunanQuery The current query, for fluid interface
     */
    public function prune($bangunan = null)
    {
        if ($bangunan) {
            $this->addUsingAlias(BangunanPeer::ID_BANGUNAN, $bangunan->getIdBangunan(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
