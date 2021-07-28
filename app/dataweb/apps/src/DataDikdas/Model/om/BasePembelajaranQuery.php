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
use DataDikdas\Model\BukuPelajaran;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PembelajaranPeer;
use DataDikdas\Model\PembelajaranQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\Semester;
use DataDikdas\Model\VldPembelajaran;

/**
 * Base class that represents a query for the 'pembelajaran' table.
 *
 * 
 *
 * @method PembelajaranQuery orderByPembelajaranId($order = Criteria::ASC) Order by the pembelajaran_id column
 * @method PembelajaranQuery orderByRombonganBelajarId($order = Criteria::ASC) Order by the rombongan_belajar_id column
 * @method PembelajaranQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method PembelajaranQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method PembelajaranQuery orderByPtkTerdaftarId($order = Criteria::ASC) Order by the ptk_terdaftar_id column
 * @method PembelajaranQuery orderBySkMengajar($order = Criteria::ASC) Order by the sk_mengajar column
 * @method PembelajaranQuery orderByTanggalSkMengajar($order = Criteria::ASC) Order by the tanggal_sk_mengajar column
 * @method PembelajaranQuery orderByJamMengajarPerMinggu($order = Criteria::ASC) Order by the jam_mengajar_per_minggu column
 * @method PembelajaranQuery orderByStatusDiKurikulum($order = Criteria::ASC) Order by the status_di_kurikulum column
 * @method PembelajaranQuery orderByNamaMataPelajaran($order = Criteria::ASC) Order by the nama_mata_pelajaran column
 * @method PembelajaranQuery orderByIndukPembelajaranId($order = Criteria::ASC) Order by the induk_pembelajaran_id column
 * @method PembelajaranQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PembelajaranQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PembelajaranQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PembelajaranQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PembelajaranQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PembelajaranQuery groupByPembelajaranId() Group by the pembelajaran_id column
 * @method PembelajaranQuery groupByRombonganBelajarId() Group by the rombongan_belajar_id column
 * @method PembelajaranQuery groupBySemesterId() Group by the semester_id column
 * @method PembelajaranQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method PembelajaranQuery groupByPtkTerdaftarId() Group by the ptk_terdaftar_id column
 * @method PembelajaranQuery groupBySkMengajar() Group by the sk_mengajar column
 * @method PembelajaranQuery groupByTanggalSkMengajar() Group by the tanggal_sk_mengajar column
 * @method PembelajaranQuery groupByJamMengajarPerMinggu() Group by the jam_mengajar_per_minggu column
 * @method PembelajaranQuery groupByStatusDiKurikulum() Group by the status_di_kurikulum column
 * @method PembelajaranQuery groupByNamaMataPelajaran() Group by the nama_mata_pelajaran column
 * @method PembelajaranQuery groupByIndukPembelajaranId() Group by the induk_pembelajaran_id column
 * @method PembelajaranQuery groupByCreateDate() Group by the create_date column
 * @method PembelajaranQuery groupByLastUpdate() Group by the last_update column
 * @method PembelajaranQuery groupBySoftDelete() Group by the soft_delete column
 * @method PembelajaranQuery groupByLastSync() Group by the last_sync column
 * @method PembelajaranQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PembelajaranQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PembelajaranQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PembelajaranQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PembelajaranQuery leftJoinPembelajaranRelatedByIndukPembelajaranId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByIndukPembelajaranId relation
 * @method PembelajaranQuery rightJoinPembelajaranRelatedByIndukPembelajaranId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByIndukPembelajaranId relation
 * @method PembelajaranQuery innerJoinPembelajaranRelatedByIndukPembelajaranId($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByIndukPembelajaranId relation
 *
 * @method PembelajaranQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method PembelajaranQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method PembelajaranQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method PembelajaranQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method PembelajaranQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method PembelajaranQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method PembelajaranQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method PembelajaranQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method PembelajaranQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method PembelajaranQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method PembelajaranQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method PembelajaranQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method PembelajaranQuery leftJoinBukuPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the BukuPelajaran relation
 * @method PembelajaranQuery rightJoinBukuPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BukuPelajaran relation
 * @method PembelajaranQuery innerJoinBukuPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the BukuPelajaran relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe01($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe01 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe01($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe01 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe01($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe01 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe02($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe02 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe02($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe02 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe02($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe02 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe03($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe03 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe03($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe03 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe03($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe03 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe04($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe04 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe04($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe04 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe04($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe04 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe05($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe05 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe05($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe05 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe05($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe05 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe06($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe06 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe06($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe06 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe06($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe06 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe07($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe07 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe07($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe07 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe07($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe07 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe08($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe08 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe08($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe08 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe08($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe08 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe09($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe09 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe09($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe09 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe09($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe09 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe10($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe10 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe10($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe10 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe10($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe10 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe11($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe11 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe11($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe11 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe11($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe11 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe12($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe12 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe12($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe12 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe12($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe12 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe13($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe13 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe13($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe13 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe13($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe13 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe14($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe14 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe14($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe14 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe14($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe14 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe15($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe15 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe15($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe15 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe15($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe15 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe16($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe16 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe16($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe16 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe16($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe16 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe17($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe17 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe17($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe17 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe17($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe17 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe18($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe18 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe18($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe18 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe18($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe18 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe19($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe19 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe19($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe19 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe19($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe19 relation
 *
 * @method PembelajaranQuery leftJoinJadwalRelatedByBelKe20($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalRelatedByBelKe20 relation
 * @method PembelajaranQuery rightJoinJadwalRelatedByBelKe20($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalRelatedByBelKe20 relation
 * @method PembelajaranQuery innerJoinJadwalRelatedByBelKe20($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalRelatedByBelKe20 relation
 *
 * @method PembelajaranQuery leftJoinPembelajaranRelatedByPembelajaranId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PembelajaranRelatedByPembelajaranId relation
 * @method PembelajaranQuery rightJoinPembelajaranRelatedByPembelajaranId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PembelajaranRelatedByPembelajaranId relation
 * @method PembelajaranQuery innerJoinPembelajaranRelatedByPembelajaranId($relationAlias = null) Adds a INNER JOIN clause to the query using the PembelajaranRelatedByPembelajaranId relation
 *
 * @method PembelajaranQuery leftJoinVldPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPembelajaran relation
 * @method PembelajaranQuery rightJoinVldPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPembelajaran relation
 * @method PembelajaranQuery innerJoinVldPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPembelajaran relation
 *
 * @method Pembelajaran findOne(PropelPDO $con = null) Return the first Pembelajaran matching the query
 * @method Pembelajaran findOneOrCreate(PropelPDO $con = null) Return the first Pembelajaran matching the query, or a new Pembelajaran object populated from the query conditions when no match is found
 *
 * @method Pembelajaran findOneByRombonganBelajarId(string $rombongan_belajar_id) Return the first Pembelajaran filtered by the rombongan_belajar_id column
 * @method Pembelajaran findOneBySemesterId(string $semester_id) Return the first Pembelajaran filtered by the semester_id column
 * @method Pembelajaran findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first Pembelajaran filtered by the mata_pelajaran_id column
 * @method Pembelajaran findOneByPtkTerdaftarId(string $ptk_terdaftar_id) Return the first Pembelajaran filtered by the ptk_terdaftar_id column
 * @method Pembelajaran findOneBySkMengajar(string $sk_mengajar) Return the first Pembelajaran filtered by the sk_mengajar column
 * @method Pembelajaran findOneByTanggalSkMengajar(string $tanggal_sk_mengajar) Return the first Pembelajaran filtered by the tanggal_sk_mengajar column
 * @method Pembelajaran findOneByJamMengajarPerMinggu(string $jam_mengajar_per_minggu) Return the first Pembelajaran filtered by the jam_mengajar_per_minggu column
 * @method Pembelajaran findOneByStatusDiKurikulum(string $status_di_kurikulum) Return the first Pembelajaran filtered by the status_di_kurikulum column
 * @method Pembelajaran findOneByNamaMataPelajaran(string $nama_mata_pelajaran) Return the first Pembelajaran filtered by the nama_mata_pelajaran column
 * @method Pembelajaran findOneByIndukPembelajaranId(string $induk_pembelajaran_id) Return the first Pembelajaran filtered by the induk_pembelajaran_id column
 * @method Pembelajaran findOneByCreateDate(string $create_date) Return the first Pembelajaran filtered by the create_date column
 * @method Pembelajaran findOneByLastUpdate(string $last_update) Return the first Pembelajaran filtered by the last_update column
 * @method Pembelajaran findOneBySoftDelete(string $soft_delete) Return the first Pembelajaran filtered by the soft_delete column
 * @method Pembelajaran findOneByLastSync(string $last_sync) Return the first Pembelajaran filtered by the last_sync column
 * @method Pembelajaran findOneByUpdaterId(string $updater_id) Return the first Pembelajaran filtered by the updater_id column
 *
 * @method array findByPembelajaranId(string $pembelajaran_id) Return Pembelajaran objects filtered by the pembelajaran_id column
 * @method array findByRombonganBelajarId(string $rombongan_belajar_id) Return Pembelajaran objects filtered by the rombongan_belajar_id column
 * @method array findBySemesterId(string $semester_id) Return Pembelajaran objects filtered by the semester_id column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return Pembelajaran objects filtered by the mata_pelajaran_id column
 * @method array findByPtkTerdaftarId(string $ptk_terdaftar_id) Return Pembelajaran objects filtered by the ptk_terdaftar_id column
 * @method array findBySkMengajar(string $sk_mengajar) Return Pembelajaran objects filtered by the sk_mengajar column
 * @method array findByTanggalSkMengajar(string $tanggal_sk_mengajar) Return Pembelajaran objects filtered by the tanggal_sk_mengajar column
 * @method array findByJamMengajarPerMinggu(string $jam_mengajar_per_minggu) Return Pembelajaran objects filtered by the jam_mengajar_per_minggu column
 * @method array findByStatusDiKurikulum(string $status_di_kurikulum) Return Pembelajaran objects filtered by the status_di_kurikulum column
 * @method array findByNamaMataPelajaran(string $nama_mata_pelajaran) Return Pembelajaran objects filtered by the nama_mata_pelajaran column
 * @method array findByIndukPembelajaranId(string $induk_pembelajaran_id) Return Pembelajaran objects filtered by the induk_pembelajaran_id column
 * @method array findByCreateDate(string $create_date) Return Pembelajaran objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Pembelajaran objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Pembelajaran objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Pembelajaran objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Pembelajaran objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePembelajaranQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePembelajaranQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Pembelajaran', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PembelajaranQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PembelajaranQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PembelajaranQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PembelajaranQuery) {
            return $criteria;
        }
        $query = new PembelajaranQuery();
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
     * @return   Pembelajaran|Pembelajaran[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PembelajaranPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PembelajaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pembelajaran A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPembelajaranId($key, $con = null)
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
     * @return                 Pembelajaran A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pembelajaran_id", "rombongan_belajar_id", "semester_id", "mata_pelajaran_id", "ptk_terdaftar_id", "sk_mengajar", "tanggal_sk_mengajar", "jam_mengajar_per_minggu", "status_di_kurikulum", "nama_mata_pelajaran", "induk_pembelajaran_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "pembelajaran" WHERE "pembelajaran_id" = :p0';
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
            $obj = new Pembelajaran();
            $obj->hydrate($row);
            PembelajaranPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Pembelajaran|Pembelajaran[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Pembelajaran[]|mixed the list of results, formatted by the current formatter
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
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pembelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPembelajaranId('fooValue');   // WHERE pembelajaran_id = 'fooValue'
     * $query->filterByPembelajaranId('%fooValue%'); // WHERE pembelajaran_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pembelajaranId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByPembelajaranId($pembelajaranId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pembelajaranId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pembelajaranId)) {
                $pembelajaranId = str_replace('*', '%', $pembelajaranId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $pembelajaranId, $comparison);
    }

    /**
     * Filter the query on the rombongan_belajar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRombonganBelajarId('fooValue');   // WHERE rombongan_belajar_id = 'fooValue'
     * $query->filterByRombonganBelajarId('%fooValue%'); // WHERE rombongan_belajar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rombonganBelajarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByRombonganBelajarId($rombonganBelajarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rombonganBelajarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rombonganBelajarId)) {
                $rombonganBelajarId = str_replace('*', '%', $rombonganBelajarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajarId, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PembelajaranPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the mata_pelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMataPelajaranId(1234); // WHERE mata_pelajaran_id = 1234
     * $query->filterByMataPelajaranId(array(12, 34)); // WHERE mata_pelajaran_id IN (12, 34)
     * $query->filterByMataPelajaranId(array('min' => 12)); // WHERE mata_pelajaran_id >= 12
     * $query->filterByMataPelajaranId(array('max' => 12)); // WHERE mata_pelajaran_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaran()
     *
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(PembelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(PembelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
    }

    /**
     * Filter the query on the ptk_terdaftar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkTerdaftarId('fooValue');   // WHERE ptk_terdaftar_id = 'fooValue'
     * $query->filterByPtkTerdaftarId('%fooValue%'); // WHERE ptk_terdaftar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkTerdaftarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByPtkTerdaftarId($ptkTerdaftarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkTerdaftarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkTerdaftarId)) {
                $ptkTerdaftarId = str_replace('*', '%', $ptkTerdaftarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::PTK_TERDAFTAR_ID, $ptkTerdaftarId, $comparison);
    }

    /**
     * Filter the query on the sk_mengajar column
     *
     * Example usage:
     * <code>
     * $query->filterBySkMengajar('fooValue');   // WHERE sk_mengajar = 'fooValue'
     * $query->filterBySkMengajar('%fooValue%'); // WHERE sk_mengajar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skMengajar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterBySkMengajar($skMengajar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skMengajar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skMengajar)) {
                $skMengajar = str_replace('*', '%', $skMengajar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::SK_MENGAJAR, $skMengajar, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_mengajar column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkMengajar('2011-03-14'); // WHERE tanggal_sk_mengajar = '2011-03-14'
     * $query->filterByTanggalSkMengajar('now'); // WHERE tanggal_sk_mengajar = '2011-03-14'
     * $query->filterByTanggalSkMengajar(array('max' => 'yesterday')); // WHERE tanggal_sk_mengajar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkMengajar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByTanggalSkMengajar($tanggalSkMengajar = null, $comparison = null)
    {
        if (is_array($tanggalSkMengajar)) {
            $useMinMax = false;
            if (isset($tanggalSkMengajar['min'])) {
                $this->addUsingAlias(PembelajaranPeer::TANGGAL_SK_MENGAJAR, $tanggalSkMengajar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkMengajar['max'])) {
                $this->addUsingAlias(PembelajaranPeer::TANGGAL_SK_MENGAJAR, $tanggalSkMengajar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::TANGGAL_SK_MENGAJAR, $tanggalSkMengajar, $comparison);
    }

    /**
     * Filter the query on the jam_mengajar_per_minggu column
     *
     * Example usage:
     * <code>
     * $query->filterByJamMengajarPerMinggu(1234); // WHERE jam_mengajar_per_minggu = 1234
     * $query->filterByJamMengajarPerMinggu(array(12, 34)); // WHERE jam_mengajar_per_minggu IN (12, 34)
     * $query->filterByJamMengajarPerMinggu(array('min' => 12)); // WHERE jam_mengajar_per_minggu >= 12
     * $query->filterByJamMengajarPerMinggu(array('max' => 12)); // WHERE jam_mengajar_per_minggu <= 12
     * </code>
     *
     * @param     mixed $jamMengajarPerMinggu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByJamMengajarPerMinggu($jamMengajarPerMinggu = null, $comparison = null)
    {
        if (is_array($jamMengajarPerMinggu)) {
            $useMinMax = false;
            if (isset($jamMengajarPerMinggu['min'])) {
                $this->addUsingAlias(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU, $jamMengajarPerMinggu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jamMengajarPerMinggu['max'])) {
                $this->addUsingAlias(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU, $jamMengajarPerMinggu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::JAM_MENGAJAR_PER_MINGGU, $jamMengajarPerMinggu, $comparison);
    }

    /**
     * Filter the query on the status_di_kurikulum column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusDiKurikulum(1234); // WHERE status_di_kurikulum = 1234
     * $query->filterByStatusDiKurikulum(array(12, 34)); // WHERE status_di_kurikulum IN (12, 34)
     * $query->filterByStatusDiKurikulum(array('min' => 12)); // WHERE status_di_kurikulum >= 12
     * $query->filterByStatusDiKurikulum(array('max' => 12)); // WHERE status_di_kurikulum <= 12
     * </code>
     *
     * @param     mixed $statusDiKurikulum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByStatusDiKurikulum($statusDiKurikulum = null, $comparison = null)
    {
        if (is_array($statusDiKurikulum)) {
            $useMinMax = false;
            if (isset($statusDiKurikulum['min'])) {
                $this->addUsingAlias(PembelajaranPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusDiKurikulum['max'])) {
                $this->addUsingAlias(PembelajaranPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum, $comparison);
    }

    /**
     * Filter the query on the nama_mata_pelajaran column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaMataPelajaran('fooValue');   // WHERE nama_mata_pelajaran = 'fooValue'
     * $query->filterByNamaMataPelajaran('%fooValue%'); // WHERE nama_mata_pelajaran LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaMataPelajaran The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByNamaMataPelajaran($namaMataPelajaran = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaMataPelajaran)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaMataPelajaran)) {
                $namaMataPelajaran = str_replace('*', '%', $namaMataPelajaran);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::NAMA_MATA_PELAJARAN, $namaMataPelajaran, $comparison);
    }

    /**
     * Filter the query on the induk_pembelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByIndukPembelajaranId('fooValue');   // WHERE induk_pembelajaran_id = 'fooValue'
     * $query->filterByIndukPembelajaranId('%fooValue%'); // WHERE induk_pembelajaran_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $indukPembelajaranId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByIndukPembelajaranId($indukPembelajaranId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($indukPembelajaranId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $indukPembelajaranId)) {
                $indukPembelajaranId = str_replace('*', '%', $indukPembelajaranId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::INDUK_PEMBELAJARAN_ID, $indukPembelajaranId, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PembelajaranPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PembelajaranPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PembelajaranPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PembelajaranPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PembelajaranPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PembelajaranPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PembelajaranPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PembelajaranPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PembelajaranPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PembelajaranPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByIndukPembelajaranId($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(PembelajaranPeer::INDUK_PEMBELAJARAN_ID, $pembelajaran->getPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PembelajaranPeer::INDUK_PEMBELAJARAN_ID, $pembelajaran->toKeyValue('PrimaryKey', 'PembelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByPembelajaranRelatedByIndukPembelajaranId() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByIndukPembelajaranId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByIndukPembelajaranId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByIndukPembelajaranId');

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
            $this->addJoinObject($join, 'PembelajaranRelatedByIndukPembelajaranId');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByIndukPembelajaranId relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByIndukPembelajaranIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByIndukPembelajaranId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByIndukPembelajaranId', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PTK_TERDAFTAR_ID, $ptkTerdaftar->getPtkTerdaftarId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PembelajaranPeer::PTK_TERDAFTAR_ID, $ptkTerdaftar->toKeyValue('PrimaryKey', 'PtkTerdaftarId'), $comparison);
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

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
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(PembelajaranPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PembelajaranPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
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
     * @return PembelajaranQuery The current query, for fluid interface
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
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->getRombonganBelajarId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PembelajaranPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->toKeyValue('PrimaryKey', 'RombonganBelajarId'), $comparison);
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(PembelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PembelajaranPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related BukuPelajaran object
     *
     * @param   BukuPelajaran|PropelObjectCollection $bukuPelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBukuPelajaran($bukuPelajaran, $comparison = null)
    {
        if ($bukuPelajaran instanceof BukuPelajaran) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $bukuPelajaran->getPembelajaranId(), $comparison);
        } elseif ($bukuPelajaran instanceof PropelObjectCollection) {
            return $this
                ->useBukuPelajaranQuery()
                ->filterByPrimaryKeys($bukuPelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBukuPelajaran() only accepts arguments of type BukuPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BukuPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinBukuPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BukuPelajaran');

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
            $this->addJoinObject($join, 'BukuPelajaran');
        }

        return $this;
    }

    /**
     * Use the BukuPelajaran relation BukuPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useBukuPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBukuPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BukuPelajaran', '\DataDikdas\Model\BukuPelajaranQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe01($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe01(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe01Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe01() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe01 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe01($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe01');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe01');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe01 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe01Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe01($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe01', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe02($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe02(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe02Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe02() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe02 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe02($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe02');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe02');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe02 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe02Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe02($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe02', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe03($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe03(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe03Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe03() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe03 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe03($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe03');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe03');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe03 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe03Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe03($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe03', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe04($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe04(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe04Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe04() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe04 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe04($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe04');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe04');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe04 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe04Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe04($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe04', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe05($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe05(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe05Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe05() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe05 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe05($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe05');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe05');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe05 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe05Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe05($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe05', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe06($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe06(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe06Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe06() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe06 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe06($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe06');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe06');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe06 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe06Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe06($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe06', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe07($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe07(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe07Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe07() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe07 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe07($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe07');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe07');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe07 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe07Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe07($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe07', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe08($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe08(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe08Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe08() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe08 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe08($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe08');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe08');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe08 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe08Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe08($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe08', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe09($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe09(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe09Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe09() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe09 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe09($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe09');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe09');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe09 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe09Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe09($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe09', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe10($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe10(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe10Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe10() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe10 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe10($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe10');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe10');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe10 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe10Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe10($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe10', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe11($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe11(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe11Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe11() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe11 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe11($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe11');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe11');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe11 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe11Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe11($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe11', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe12($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe12(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe12Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe12() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe12 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe12($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe12');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe12');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe12 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe12Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe12($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe12', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe13($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe13(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe13Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe13() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe13 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe13($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe13');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe13');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe13 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe13Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe13($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe13', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe14($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe14(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe14Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe14() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe14 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe14($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe14');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe14');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe14 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe14Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe14($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe14', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe15($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe15(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe15Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe15() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe15 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe15($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe15');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe15');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe15 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe15Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe15($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe15', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe16($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe16(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe16Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe16() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe16 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe16($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe16');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe16');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe16 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe16Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe16($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe16', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe17($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe17(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe17Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe17() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe17 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe17($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe17');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe17');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe17 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe17Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe17($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe17', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe18($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe18(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe18Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe18() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe18 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe18($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe18');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe18');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe18 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe18Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe18($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe18', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe19($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe19(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe19Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe19() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe19 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe19($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe19');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe19');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe19 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe19Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe19($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe19', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalRelatedByBelKe20($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $jadwal->getBelKe20(), $comparison);
        } elseif ($jadwal instanceof PropelObjectCollection) {
            return $this
                ->useJadwalRelatedByBelKe20Query()
                ->filterByPrimaryKeys($jadwal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJadwalRelatedByBelKe20() only accepts arguments of type Jadwal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalRelatedByBelKe20 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinJadwalRelatedByBelKe20($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalRelatedByBelKe20');

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
            $this->addJoinObject($join, 'JadwalRelatedByBelKe20');
        }

        return $this;
    }

    /**
     * Use the JadwalRelatedByBelKe20 relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalRelatedByBelKe20Query($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJadwalRelatedByBelKe20($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalRelatedByBelKe20', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaranRelatedByPembelajaranId($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $pembelajaran->getIndukPembelajaranId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            return $this
                ->usePembelajaranRelatedByPembelajaranIdQuery()
                ->filterByPrimaryKeys($pembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPembelajaranRelatedByPembelajaranId() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PembelajaranRelatedByPembelajaranId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinPembelajaranRelatedByPembelajaranId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PembelajaranRelatedByPembelajaranId');

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
            $this->addJoinObject($join, 'PembelajaranRelatedByPembelajaranId');
        }

        return $this;
    }

    /**
     * Use the PembelajaranRelatedByPembelajaranId relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranRelatedByPembelajaranIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPembelajaranRelatedByPembelajaranId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PembelajaranRelatedByPembelajaranId', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related VldPembelajaran object
     *
     * @param   VldPembelajaran|PropelObjectCollection $vldPembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PembelajaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPembelajaran($vldPembelajaran, $comparison = null)
    {
        if ($vldPembelajaran instanceof VldPembelajaran) {
            return $this
                ->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $vldPembelajaran->getPembelajaranId(), $comparison);
        } elseif ($vldPembelajaran instanceof PropelObjectCollection) {
            return $this
                ->useVldPembelajaranQuery()
                ->filterByPrimaryKeys($vldPembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPembelajaran() only accepts arguments of type VldPembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPembelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function joinVldPembelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPembelajaran');

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
            $this->addJoinObject($join, 'VldPembelajaran');
        }

        return $this;
    }

    /**
     * Use the VldPembelajaran relation VldPembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPembelajaranQuery A secondary query class using the current class as primary query
     */
    public function useVldPembelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPembelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPembelajaran', '\DataDikdas\Model\VldPembelajaranQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Pembelajaran $pembelajaran Object to remove from the list of results
     *
     * @return PembelajaranQuery The current query, for fluid interface
     */
    public function prune($pembelajaran = null)
    {
        if ($pembelajaran) {
            $this->addUsingAlias(PembelajaranPeer::PEMBELAJARAN_ID, $pembelajaran->getPembelajaranId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
