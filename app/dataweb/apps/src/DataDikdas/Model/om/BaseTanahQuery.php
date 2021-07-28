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
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\Tanah;
use DataDikdas\Model\TanahDariBlockgrant;
use DataDikdas\Model\TanahLongitudinal;
use DataDikdas\Model\TanahPeer;
use DataDikdas\Model\TanahQuery;
use DataDikdas\Model\VldTanah;

/**
 * Base class that represents a query for the 'tanah' table.
 *
 * 
 *
 * @method TanahQuery orderByIdTanah($order = Criteria::ASC) Order by the id_tanah column
 * @method TanahQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method TanahQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method TanahQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method TanahQuery orderByKepemilikanSarprasId($order = Criteria::ASC) Order by the kepemilikan_sarpras_id column
 * @method TanahQuery orderByKdKl($order = Criteria::ASC) Order by the kd_kl column
 * @method TanahQuery orderByKdSatker($order = Criteria::ASC) Order by the kd_satker column
 * @method TanahQuery orderByKdBrg($order = Criteria::ASC) Order by the kd_brg column
 * @method TanahQuery orderByNup($order = Criteria::ASC) Order by the nup column
 * @method TanahQuery orderByKodeEselon1($order = Criteria::ASC) Order by the kode_eselon1 column
 * @method TanahQuery orderByNamaEselon1($order = Criteria::ASC) Order by the nama_eselon1 column
 * @method TanahQuery orderByKodeSubSatker($order = Criteria::ASC) Order by the kode_sub_satker column
 * @method TanahQuery orderByNamaSubSatker($order = Criteria::ASC) Order by the nama_sub_satker column
 * @method TanahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method TanahQuery orderByPanjang($order = Criteria::ASC) Order by the panjang column
 * @method TanahQuery orderByLebar($order = Criteria::ASC) Order by the lebar column
 * @method TanahQuery orderByNilaiPerolehanAset($order = Criteria::ASC) Order by the nilai_perolehan_aset column
 * @method TanahQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method TanahQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method TanahQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method TanahQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method TanahQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method TanahQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method TanahQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method TanahQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method TanahQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method TanahQuery orderByTglMutasiKeluar($order = Criteria::ASC) Order by the tgl_mutasi_keluar column
 * @method TanahQuery orderByBatas($order = Criteria::ASC) Order by the batas column
 * @method TanahQuery orderByKetTanah($order = Criteria::ASC) Order by the ket_tanah column
 * @method TanahQuery orderByLuas($order = Criteria::ASC) Order by the luas column
 * @method TanahQuery orderByLuasLahanTersedia($order = Criteria::ASC) Order by the luas_lahan_tersedia column
 * @method TanahQuery orderByNoSertifikatTanah($order = Criteria::ASC) Order by the no_sertifikat_tanah column
 * @method TanahQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method TanahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TanahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TanahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method TanahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method TanahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method TanahQuery groupByIdTanah() Group by the id_tanah column
 * @method TanahQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method TanahQuery groupBySekolahId() Group by the sekolah_id column
 * @method TanahQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method TanahQuery groupByKepemilikanSarprasId() Group by the kepemilikan_sarpras_id column
 * @method TanahQuery groupByKdKl() Group by the kd_kl column
 * @method TanahQuery groupByKdSatker() Group by the kd_satker column
 * @method TanahQuery groupByKdBrg() Group by the kd_brg column
 * @method TanahQuery groupByNup() Group by the nup column
 * @method TanahQuery groupByKodeEselon1() Group by the kode_eselon1 column
 * @method TanahQuery groupByNamaEselon1() Group by the nama_eselon1 column
 * @method TanahQuery groupByKodeSubSatker() Group by the kode_sub_satker column
 * @method TanahQuery groupByNamaSubSatker() Group by the nama_sub_satker column
 * @method TanahQuery groupByNama() Group by the nama column
 * @method TanahQuery groupByPanjang() Group by the panjang column
 * @method TanahQuery groupByLebar() Group by the lebar column
 * @method TanahQuery groupByNilaiPerolehanAset() Group by the nilai_perolehan_aset column
 * @method TanahQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method TanahQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method TanahQuery groupByRt() Group by the rt column
 * @method TanahQuery groupByRw() Group by the rw column
 * @method TanahQuery groupByNamaDusun() Group by the nama_dusun column
 * @method TanahQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method TanahQuery groupByKodePos() Group by the kode_pos column
 * @method TanahQuery groupByLintang() Group by the lintang column
 * @method TanahQuery groupByBujur() Group by the bujur column
 * @method TanahQuery groupByTglMutasiKeluar() Group by the tgl_mutasi_keluar column
 * @method TanahQuery groupByBatas() Group by the batas column
 * @method TanahQuery groupByKetTanah() Group by the ket_tanah column
 * @method TanahQuery groupByLuas() Group by the luas column
 * @method TanahQuery groupByLuasLahanTersedia() Group by the luas_lahan_tersedia column
 * @method TanahQuery groupByNoSertifikatTanah() Group by the no_sertifikat_tanah column
 * @method TanahQuery groupByAsalData() Group by the asal_data column
 * @method TanahQuery groupByCreateDate() Group by the create_date column
 * @method TanahQuery groupByLastUpdate() Group by the last_update column
 * @method TanahQuery groupBySoftDelete() Group by the soft_delete column
 * @method TanahQuery groupByLastSync() Group by the last_sync column
 * @method TanahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method TanahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TanahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TanahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TanahQuery leftJoinJenisHapusBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHapusBuku relation
 * @method TanahQuery rightJoinJenisHapusBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHapusBuku relation
 * @method TanahQuery innerJoinJenisHapusBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHapusBuku relation
 *
 * @method TanahQuery leftJoinJenisPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrasarana relation
 * @method TanahQuery rightJoinJenisPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrasarana relation
 * @method TanahQuery innerJoinJenisPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrasarana relation
 *
 * @method TanahQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method TanahQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method TanahQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method TanahQuery leftJoinStatusKepemilikanSarpras($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method TanahQuery rightJoinStatusKepemilikanSarpras($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method TanahQuery innerJoinStatusKepemilikanSarpras($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepemilikanSarpras relation
 *
 * @method TanahQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method TanahQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method TanahQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method TanahQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method TanahQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method TanahQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method TanahQuery leftJoinTanahDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the TanahDariBlockgrant relation
 * @method TanahQuery rightJoinTanahDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TanahDariBlockgrant relation
 * @method TanahQuery innerJoinTanahDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the TanahDariBlockgrant relation
 *
 * @method TanahQuery leftJoinTanahLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the TanahLongitudinal relation
 * @method TanahQuery rightJoinTanahLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TanahLongitudinal relation
 * @method TanahQuery innerJoinTanahLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the TanahLongitudinal relation
 *
 * @method TanahQuery leftJoinVldTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTanah relation
 * @method TanahQuery rightJoinVldTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTanah relation
 * @method TanahQuery innerJoinVldTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTanah relation
 *
 * @method Tanah findOne(PropelPDO $con = null) Return the first Tanah matching the query
 * @method Tanah findOneOrCreate(PropelPDO $con = null) Return the first Tanah matching the query, or a new Tanah object populated from the query conditions when no match is found
 *
 * @method Tanah findOneByJenisPrasaranaId(int $jenis_prasarana_id) Return the first Tanah filtered by the jenis_prasarana_id column
 * @method Tanah findOneBySekolahId(string $sekolah_id) Return the first Tanah filtered by the sekolah_id column
 * @method Tanah findOneByIdHapusBuku(string $id_hapus_buku) Return the first Tanah filtered by the id_hapus_buku column
 * @method Tanah findOneByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return the first Tanah filtered by the kepemilikan_sarpras_id column
 * @method Tanah findOneByKdKl(string $kd_kl) Return the first Tanah filtered by the kd_kl column
 * @method Tanah findOneByKdSatker(string $kd_satker) Return the first Tanah filtered by the kd_satker column
 * @method Tanah findOneByKdBrg(string $kd_brg) Return the first Tanah filtered by the kd_brg column
 * @method Tanah findOneByNup(int $nup) Return the first Tanah filtered by the nup column
 * @method Tanah findOneByKodeEselon1(string $kode_eselon1) Return the first Tanah filtered by the kode_eselon1 column
 * @method Tanah findOneByNamaEselon1(string $nama_eselon1) Return the first Tanah filtered by the nama_eselon1 column
 * @method Tanah findOneByKodeSubSatker(string $kode_sub_satker) Return the first Tanah filtered by the kode_sub_satker column
 * @method Tanah findOneByNamaSubSatker(string $nama_sub_satker) Return the first Tanah filtered by the nama_sub_satker column
 * @method Tanah findOneByNama(string $nama) Return the first Tanah filtered by the nama column
 * @method Tanah findOneByPanjang(double $panjang) Return the first Tanah filtered by the panjang column
 * @method Tanah findOneByLebar(double $lebar) Return the first Tanah filtered by the lebar column
 * @method Tanah findOneByNilaiPerolehanAset(string $nilai_perolehan_aset) Return the first Tanah filtered by the nilai_perolehan_aset column
 * @method Tanah findOneByKodeWilayah(string $kode_wilayah) Return the first Tanah filtered by the kode_wilayah column
 * @method Tanah findOneByAlamatJalan(string $alamat_jalan) Return the first Tanah filtered by the alamat_jalan column
 * @method Tanah findOneByRt(string $rt) Return the first Tanah filtered by the rt column
 * @method Tanah findOneByRw(string $rw) Return the first Tanah filtered by the rw column
 * @method Tanah findOneByNamaDusun(string $nama_dusun) Return the first Tanah filtered by the nama_dusun column
 * @method Tanah findOneByDesaKelurahan(string $desa_kelurahan) Return the first Tanah filtered by the desa_kelurahan column
 * @method Tanah findOneByKodePos(string $kode_pos) Return the first Tanah filtered by the kode_pos column
 * @method Tanah findOneByLintang(string $lintang) Return the first Tanah filtered by the lintang column
 * @method Tanah findOneByBujur(string $bujur) Return the first Tanah filtered by the bujur column
 * @method Tanah findOneByTglMutasiKeluar(string $tgl_mutasi_keluar) Return the first Tanah filtered by the tgl_mutasi_keluar column
 * @method Tanah findOneByBatas(string $batas) Return the first Tanah filtered by the batas column
 * @method Tanah findOneByKetTanah(string $ket_tanah) Return the first Tanah filtered by the ket_tanah column
 * @method Tanah findOneByLuas(string $luas) Return the first Tanah filtered by the luas column
 * @method Tanah findOneByLuasLahanTersedia(string $luas_lahan_tersedia) Return the first Tanah filtered by the luas_lahan_tersedia column
 * @method Tanah findOneByNoSertifikatTanah(string $no_sertifikat_tanah) Return the first Tanah filtered by the no_sertifikat_tanah column
 * @method Tanah findOneByAsalData(string $asal_data) Return the first Tanah filtered by the asal_data column
 * @method Tanah findOneByCreateDate(string $create_date) Return the first Tanah filtered by the create_date column
 * @method Tanah findOneByLastUpdate(string $last_update) Return the first Tanah filtered by the last_update column
 * @method Tanah findOneBySoftDelete(string $soft_delete) Return the first Tanah filtered by the soft_delete column
 * @method Tanah findOneByLastSync(string $last_sync) Return the first Tanah filtered by the last_sync column
 * @method Tanah findOneByUpdaterId(string $updater_id) Return the first Tanah filtered by the updater_id column
 *
 * @method array findByIdTanah(string $id_tanah) Return Tanah objects filtered by the id_tanah column
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return Tanah objects filtered by the jenis_prasarana_id column
 * @method array findBySekolahId(string $sekolah_id) Return Tanah objects filtered by the sekolah_id column
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return Tanah objects filtered by the id_hapus_buku column
 * @method array findByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return Tanah objects filtered by the kepemilikan_sarpras_id column
 * @method array findByKdKl(string $kd_kl) Return Tanah objects filtered by the kd_kl column
 * @method array findByKdSatker(string $kd_satker) Return Tanah objects filtered by the kd_satker column
 * @method array findByKdBrg(string $kd_brg) Return Tanah objects filtered by the kd_brg column
 * @method array findByNup(int $nup) Return Tanah objects filtered by the nup column
 * @method array findByKodeEselon1(string $kode_eselon1) Return Tanah objects filtered by the kode_eselon1 column
 * @method array findByNamaEselon1(string $nama_eselon1) Return Tanah objects filtered by the nama_eselon1 column
 * @method array findByKodeSubSatker(string $kode_sub_satker) Return Tanah objects filtered by the kode_sub_satker column
 * @method array findByNamaSubSatker(string $nama_sub_satker) Return Tanah objects filtered by the nama_sub_satker column
 * @method array findByNama(string $nama) Return Tanah objects filtered by the nama column
 * @method array findByPanjang(double $panjang) Return Tanah objects filtered by the panjang column
 * @method array findByLebar(double $lebar) Return Tanah objects filtered by the lebar column
 * @method array findByNilaiPerolehanAset(string $nilai_perolehan_aset) Return Tanah objects filtered by the nilai_perolehan_aset column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Tanah objects filtered by the kode_wilayah column
 * @method array findByAlamatJalan(string $alamat_jalan) Return Tanah objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return Tanah objects filtered by the rt column
 * @method array findByRw(string $rw) Return Tanah objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return Tanah objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return Tanah objects filtered by the desa_kelurahan column
 * @method array findByKodePos(string $kode_pos) Return Tanah objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return Tanah objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return Tanah objects filtered by the bujur column
 * @method array findByTglMutasiKeluar(string $tgl_mutasi_keluar) Return Tanah objects filtered by the tgl_mutasi_keluar column
 * @method array findByBatas(string $batas) Return Tanah objects filtered by the batas column
 * @method array findByKetTanah(string $ket_tanah) Return Tanah objects filtered by the ket_tanah column
 * @method array findByLuas(string $luas) Return Tanah objects filtered by the luas column
 * @method array findByLuasLahanTersedia(string $luas_lahan_tersedia) Return Tanah objects filtered by the luas_lahan_tersedia column
 * @method array findByNoSertifikatTanah(string $no_sertifikat_tanah) Return Tanah objects filtered by the no_sertifikat_tanah column
 * @method array findByAsalData(string $asal_data) Return Tanah objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Tanah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Tanah objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Tanah objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Tanah objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Tanah objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTanahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTanahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Tanah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TanahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TanahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TanahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TanahQuery) {
            return $criteria;
        }
        $query = new TanahQuery();
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
     * @return   Tanah|Tanah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TanahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TanahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tanah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTanah($key, $con = null)
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
     * @return                 Tanah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_tanah", "jenis_prasarana_id", "sekolah_id", "id_hapus_buku", "kepemilikan_sarpras_id", "kd_kl", "kd_satker", "kd_brg", "nup", "kode_eselon1", "nama_eselon1", "kode_sub_satker", "nama_sub_satker", "nama", "panjang", "lebar", "nilai_perolehan_aset", "kode_wilayah", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_pos", "lintang", "bujur", "tgl_mutasi_keluar", "batas", "ket_tanah", "luas", "luas_lahan_tersedia", "no_sertifikat_tanah", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "tanah" WHERE "id_tanah" = :p0';
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
            $obj = new Tanah();
            $obj->hydrate($row);
            TanahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tanah|Tanah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tanah[]|mixed the list of results, formatted by the current formatter
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TanahPeer::ID_TANAH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TanahPeer::ID_TANAH, $keys, Criteria::IN);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::ID_TANAH, $idTanah, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(TanahPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(TanahPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByKepemilikanSarprasId($kepemilikanSarprasId = null, $comparison = null)
    {
        if (is_array($kepemilikanSarprasId)) {
            $useMinMax = false;
            if (isset($kepemilikanSarprasId['min'])) {
                $this->addUsingAlias(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepemilikanSarprasId['max'])) {
                $this->addUsingAlias(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::KD_KL, $kdKl, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::KD_SATKER, $kdSatker, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::KD_BRG, $kdBrg, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByNup($nup = null, $comparison = null)
    {
        if (is_array($nup)) {
            $useMinMax = false;
            if (isset($nup['min'])) {
                $this->addUsingAlias(TanahPeer::NUP, $nup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nup['max'])) {
                $this->addUsingAlias(TanahPeer::NUP, $nup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::NUP, $nup, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::KODE_ESELON1, $kodeEselon1, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::NAMA_ESELON1, $namaEselon1, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::KODE_SUB_SATKER, $kodeSubSatker, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::NAMA_SUB_SATKER, $namaSubSatker, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::NAMA, $nama, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByPanjang($panjang = null, $comparison = null)
    {
        if (is_array($panjang)) {
            $useMinMax = false;
            if (isset($panjang['min'])) {
                $this->addUsingAlias(TanahPeer::PANJANG, $panjang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($panjang['max'])) {
                $this->addUsingAlias(TanahPeer::PANJANG, $panjang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::PANJANG, $panjang, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLebar($lebar = null, $comparison = null)
    {
        if (is_array($lebar)) {
            $useMinMax = false;
            if (isset($lebar['min'])) {
                $this->addUsingAlias(TanahPeer::LEBAR, $lebar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lebar['max'])) {
                $this->addUsingAlias(TanahPeer::LEBAR, $lebar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LEBAR, $lebar, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByNilaiPerolehanAset($nilaiPerolehanAset = null, $comparison = null)
    {
        if (is_array($nilaiPerolehanAset)) {
            $useMinMax = false;
            if (isset($nilaiPerolehanAset['min'])) {
                $this->addUsingAlias(TanahPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiPerolehanAset['max'])) {
                $this->addUsingAlias(TanahPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::NILAI_PEROLEHAN_ASET, $nilaiPerolehanAset, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the alamat_jalan column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatJalan('fooValue');   // WHERE alamat_jalan = 'fooValue'
     * $query->filterByAlamatJalan('%fooValue%'); // WHERE alamat_jalan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatJalan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByAlamatJalan($alamatJalan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatJalan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatJalan)) {
                $alamatJalan = str_replace('*', '%', $alamatJalan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
    }

    /**
     * Filter the query on the rt column
     *
     * Example usage:
     * <code>
     * $query->filterByRt(1234); // WHERE rt = 1234
     * $query->filterByRt(array(12, 34)); // WHERE rt IN (12, 34)
     * $query->filterByRt(array('min' => 12)); // WHERE rt >= 12
     * $query->filterByRt(array('max' => 12)); // WHERE rt <= 12
     * </code>
     *
     * @param     mixed $rt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(TanahPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(TanahPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::RT, $rt, $comparison);
    }

    /**
     * Filter the query on the rw column
     *
     * Example usage:
     * <code>
     * $query->filterByRw(1234); // WHERE rw = 1234
     * $query->filterByRw(array(12, 34)); // WHERE rw IN (12, 34)
     * $query->filterByRw(array('min' => 12)); // WHERE rw >= 12
     * $query->filterByRw(array('max' => 12)); // WHERE rw <= 12
     * </code>
     *
     * @param     mixed $rw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(TanahPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(TanahPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::RW, $rw, $comparison);
    }

    /**
     * Filter the query on the nama_dusun column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDusun('fooValue');   // WHERE nama_dusun = 'fooValue'
     * $query->filterByNamaDusun('%fooValue%'); // WHERE nama_dusun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDusun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByNamaDusun($namaDusun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDusun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaDusun)) {
                $namaDusun = str_replace('*', '%', $namaDusun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::NAMA_DUSUN, $namaDusun, $comparison);
    }

    /**
     * Filter the query on the desa_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaKelurahan('fooValue');   // WHERE desa_kelurahan = 'fooValue'
     * $query->filterByDesaKelurahan('%fooValue%'); // WHERE desa_kelurahan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaKelurahan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByDesaKelurahan($desaKelurahan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaKelurahan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $desaKelurahan)) {
                $desaKelurahan = str_replace('*', '%', $desaKelurahan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
    }

    /**
     * Filter the query on the kode_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePos('fooValue');   // WHERE kode_pos = 'fooValue'
     * $query->filterByKodePos('%fooValue%'); // WHERE kode_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByKodePos($kodePos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodePos)) {
                $kodePos = str_replace('*', '%', $kodePos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::KODE_POS, $kodePos, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang >= 12
     * $query->filterByLintang(array('max' => 12)); // WHERE lintang <= 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(TanahPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(TanahPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur >= 12
     * $query->filterByBujur(array('max' => 12)); // WHERE bujur <= 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(TanahPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(TanahPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the tgl_mutasi_keluar column
     *
     * Example usage:
     * <code>
     * $query->filterByTglMutasiKeluar('2011-03-14'); // WHERE tgl_mutasi_keluar = '2011-03-14'
     * $query->filterByTglMutasiKeluar('now'); // WHERE tgl_mutasi_keluar = '2011-03-14'
     * $query->filterByTglMutasiKeluar(array('max' => 'yesterday')); // WHERE tgl_mutasi_keluar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglMutasiKeluar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByTglMutasiKeluar($tglMutasiKeluar = null, $comparison = null)
    {
        if (is_array($tglMutasiKeluar)) {
            $useMinMax = false;
            if (isset($tglMutasiKeluar['min'])) {
                $this->addUsingAlias(TanahPeer::TGL_MUTASI_KELUAR, $tglMutasiKeluar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglMutasiKeluar['max'])) {
                $this->addUsingAlias(TanahPeer::TGL_MUTASI_KELUAR, $tglMutasiKeluar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::TGL_MUTASI_KELUAR, $tglMutasiKeluar, $comparison);
    }

    /**
     * Filter the query on the batas column
     *
     * Example usage:
     * <code>
     * $query->filterByBatas('fooValue');   // WHERE batas = 'fooValue'
     * $query->filterByBatas('%fooValue%'); // WHERE batas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $batas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByBatas($batas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($batas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $batas)) {
                $batas = str_replace('*', '%', $batas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::BATAS, $batas, $comparison);
    }

    /**
     * Filter the query on the ket_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByKetTanah('fooValue');   // WHERE ket_tanah = 'fooValue'
     * $query->filterByKetTanah('%fooValue%'); // WHERE ket_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByKetTanah($ketTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketTanah)) {
                $ketTanah = str_replace('*', '%', $ketTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::KET_TANAH, $ketTanah, $comparison);
    }

    /**
     * Filter the query on the luas column
     *
     * Example usage:
     * <code>
     * $query->filterByLuas(1234); // WHERE luas = 1234
     * $query->filterByLuas(array(12, 34)); // WHERE luas IN (12, 34)
     * $query->filterByLuas(array('min' => 12)); // WHERE luas >= 12
     * $query->filterByLuas(array('max' => 12)); // WHERE luas <= 12
     * </code>
     *
     * @param     mixed $luas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLuas($luas = null, $comparison = null)
    {
        if (is_array($luas)) {
            $useMinMax = false;
            if (isset($luas['min'])) {
                $this->addUsingAlias(TanahPeer::LUAS, $luas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luas['max'])) {
                $this->addUsingAlias(TanahPeer::LUAS, $luas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LUAS, $luas, $comparison);
    }

    /**
     * Filter the query on the luas_lahan_tersedia column
     *
     * Example usage:
     * <code>
     * $query->filterByLuasLahanTersedia(1234); // WHERE luas_lahan_tersedia = 1234
     * $query->filterByLuasLahanTersedia(array(12, 34)); // WHERE luas_lahan_tersedia IN (12, 34)
     * $query->filterByLuasLahanTersedia(array('min' => 12)); // WHERE luas_lahan_tersedia >= 12
     * $query->filterByLuasLahanTersedia(array('max' => 12)); // WHERE luas_lahan_tersedia <= 12
     * </code>
     *
     * @param     mixed $luasLahanTersedia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLuasLahanTersedia($luasLahanTersedia = null, $comparison = null)
    {
        if (is_array($luasLahanTersedia)) {
            $useMinMax = false;
            if (isset($luasLahanTersedia['min'])) {
                $this->addUsingAlias(TanahPeer::LUAS_LAHAN_TERSEDIA, $luasLahanTersedia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($luasLahanTersedia['max'])) {
                $this->addUsingAlias(TanahPeer::LUAS_LAHAN_TERSEDIA, $luasLahanTersedia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LUAS_LAHAN_TERSEDIA, $luasLahanTersedia, $comparison);
    }

    /**
     * Filter the query on the no_sertifikat_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSertifikatTanah('fooValue');   // WHERE no_sertifikat_tanah = 'fooValue'
     * $query->filterByNoSertifikatTanah('%fooValue%'); // WHERE no_sertifikat_tanah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSertifikatTanah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByNoSertifikatTanah($noSertifikatTanah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSertifikatTanah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSertifikatTanah)) {
                $noSertifikatTanah = str_replace('*', '%', $noSertifikatTanah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TanahPeer::NO_SERTIFIKAT_TANAH, $noSertifikatTanah, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TanahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TanahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TanahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TanahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(TanahPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(TanahPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TanahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TanahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TanahPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TanahPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisHapusBuku object
     *
     * @param   JenisHapusBuku|PropelObjectCollection $jenisHapusBuku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHapusBuku($jenisHapusBuku, $comparison = null)
    {
        if ($jenisHapusBuku instanceof JenisHapusBuku) {
            return $this
                ->addUsingAlias(TanahPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), $comparison);
        } elseif ($jenisHapusBuku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TanahPeer::ID_HAPUS_BUKU, $jenisHapusBuku->toKeyValue('PrimaryKey', 'IdHapusBuku'), $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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
     * Filter the query by a related JenisPrasarana object
     *
     * @param   JenisPrasarana|PropelObjectCollection $jenisPrasarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrasarana($jenisPrasarana, $comparison = null)
    {
        if ($jenisPrasarana instanceof JenisPrasarana) {
            return $this
                ->addUsingAlias(TanahPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($jenisPrasarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TanahPeer::JENIS_PRASARANA_ID, $jenisPrasarana->toKeyValue('PrimaryKey', 'JenisPrasaranaId'), $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(TanahPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TanahPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepemilikanSarpras($statusKepemilikanSarpras, $comparison = null)
    {
        if ($statusKepemilikanSarpras instanceof StatusKepemilikanSarpras) {
            return $this
                ->addUsingAlias(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->getKepemilikanSarprasId(), $comparison);
        } elseif ($statusKepemilikanSarpras instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TanahPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->toKeyValue('PrimaryKey', 'KepemilikanSarprasId'), $comparison);
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
     * @return TanahQuery The current query, for fluid interface
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
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(TanahPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TanahPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(TanahPeer::ID_TANAH, $bangunan->getIdTanah(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            return $this
                ->useBangunanQuery()
                ->filterByPrimaryKeys($bangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related TanahDariBlockgrant object
     *
     * @param   TanahDariBlockgrant|PropelObjectCollection $tanahDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanahDariBlockgrant($tanahDariBlockgrant, $comparison = null)
    {
        if ($tanahDariBlockgrant instanceof TanahDariBlockgrant) {
            return $this
                ->addUsingAlias(TanahPeer::ID_TANAH, $tanahDariBlockgrant->getIdTanah(), $comparison);
        } elseif ($tanahDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useTanahDariBlockgrantQuery()
                ->filterByPrimaryKeys($tanahDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanahDariBlockgrant() only accepts arguments of type TanahDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TanahDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function joinTanahDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TanahDariBlockgrant');

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
            $this->addJoinObject($join, 'TanahDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the TanahDariBlockgrant relation TanahDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useTanahDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanahDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TanahDariBlockgrant', '\DataDikdas\Model\TanahDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related TanahLongitudinal object
     *
     * @param   TanahLongitudinal|PropelObjectCollection $tanahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanahLongitudinal($tanahLongitudinal, $comparison = null)
    {
        if ($tanahLongitudinal instanceof TanahLongitudinal) {
            return $this
                ->addUsingAlias(TanahPeer::ID_TANAH, $tanahLongitudinal->getIdTanah(), $comparison);
        } elseif ($tanahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useTanahLongitudinalQuery()
                ->filterByPrimaryKeys($tanahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanahLongitudinal() only accepts arguments of type TanahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TanahLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function joinTanahLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TanahLongitudinal');

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
            $this->addJoinObject($join, 'TanahLongitudinal');
        }

        return $this;
    }

    /**
     * Use the TanahLongitudinal relation TanahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useTanahLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanahLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TanahLongitudinal', '\DataDikdas\Model\TanahLongitudinalQuery');
    }

    /**
     * Filter the query by a related VldTanah object
     *
     * @param   VldTanah|PropelObjectCollection $vldTanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TanahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTanah($vldTanah, $comparison = null)
    {
        if ($vldTanah instanceof VldTanah) {
            return $this
                ->addUsingAlias(TanahPeer::ID_TANAH, $vldTanah->getIdTanah(), $comparison);
        } elseif ($vldTanah instanceof PropelObjectCollection) {
            return $this
                ->useVldTanahQuery()
                ->filterByPrimaryKeys($vldTanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTanah() only accepts arguments of type VldTanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function joinVldTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTanah');

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
            $this->addJoinObject($join, 'VldTanah');
        }

        return $this;
    }

    /**
     * Use the VldTanah relation VldTanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTanahQuery A secondary query class using the current class as primary query
     */
    public function useVldTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTanah', '\DataDikdas\Model\VldTanahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tanah $tanah Object to remove from the list of results
     *
     * @return TanahQuery The current query, for fluid interface
     */
    public function prune($tanah = null)
    {
        if ($tanah) {
            $this->addUsingAlias(TanahPeer::ID_TANAH, $tanah->getIdTanah(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
