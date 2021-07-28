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
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KelasEkskul;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarPeer;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\Semester;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\VldRombel;

/**
 * Base class that represents a query for the 'rombongan_belajar' table.
 *
 * 
 *
 * @method RombonganBelajarQuery orderByRombonganBelajarId($order = Criteria::ASC) Order by the rombongan_belajar_id column
 * @method RombonganBelajarQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method RombonganBelajarQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method RombonganBelajarQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method RombonganBelajarQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method RombonganBelajarQuery orderByJurusanSpId($order = Criteria::ASC) Order by the jurusan_sp_id column
 * @method RombonganBelajarQuery orderByKurikulumId($order = Criteria::ASC) Order by the kurikulum_id column
 * @method RombonganBelajarQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method RombonganBelajarQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RombonganBelajarQuery orderByMovingClass($order = Criteria::ASC) Order by the moving_class column
 * @method RombonganBelajarQuery orderByJenisRombel($order = Criteria::ASC) Order by the jenis_rombel column
 * @method RombonganBelajarQuery orderBySks($order = Criteria::ASC) Order by the sks column
 * @method RombonganBelajarQuery orderByTanggalMulai($order = Criteria::ASC) Order by the tanggal_mulai column
 * @method RombonganBelajarQuery orderByTanggalSelesai($order = Criteria::ASC) Order by the tanggal_selesai column
 * @method RombonganBelajarQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method RombonganBelajarQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RombonganBelajarQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RombonganBelajarQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RombonganBelajarQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RombonganBelajarQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RombonganBelajarQuery groupByRombonganBelajarId() Group by the rombongan_belajar_id column
 * @method RombonganBelajarQuery groupBySemesterId() Group by the semester_id column
 * @method RombonganBelajarQuery groupByIdRuang() Group by the id_ruang column
 * @method RombonganBelajarQuery groupBySekolahId() Group by the sekolah_id column
 * @method RombonganBelajarQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method RombonganBelajarQuery groupByJurusanSpId() Group by the jurusan_sp_id column
 * @method RombonganBelajarQuery groupByKurikulumId() Group by the kurikulum_id column
 * @method RombonganBelajarQuery groupByNama() Group by the nama column
 * @method RombonganBelajarQuery groupByPtkId() Group by the ptk_id column
 * @method RombonganBelajarQuery groupByMovingClass() Group by the moving_class column
 * @method RombonganBelajarQuery groupByJenisRombel() Group by the jenis_rombel column
 * @method RombonganBelajarQuery groupBySks() Group by the sks column
 * @method RombonganBelajarQuery groupByTanggalMulai() Group by the tanggal_mulai column
 * @method RombonganBelajarQuery groupByTanggalSelesai() Group by the tanggal_selesai column
 * @method RombonganBelajarQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method RombonganBelajarQuery groupByCreateDate() Group by the create_date column
 * @method RombonganBelajarQuery groupByLastUpdate() Group by the last_update column
 * @method RombonganBelajarQuery groupBySoftDelete() Group by the soft_delete column
 * @method RombonganBelajarQuery groupByLastSync() Group by the last_sync column
 * @method RombonganBelajarQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RombonganBelajarQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RombonganBelajarQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RombonganBelajarQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RombonganBelajarQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method RombonganBelajarQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method RombonganBelajarQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method RombonganBelajarQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method RombonganBelajarQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method RombonganBelajarQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method RombonganBelajarQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method RombonganBelajarQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method RombonganBelajarQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method RombonganBelajarQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method RombonganBelajarQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method RombonganBelajarQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method RombonganBelajarQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method RombonganBelajarQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method RombonganBelajarQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method RombonganBelajarQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RombonganBelajarQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RombonganBelajarQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RombonganBelajarQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method RombonganBelajarQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method RombonganBelajarQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method RombonganBelajarQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method RombonganBelajarQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method RombonganBelajarQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method RombonganBelajarQuery leftJoinAnggotaRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaRombel relation
 * @method RombonganBelajarQuery rightJoinAnggotaRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaRombel relation
 * @method RombonganBelajarQuery innerJoinAnggotaRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaRombel relation
 *
 * @method RombonganBelajarQuery leftJoinKelasEkskul($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelasEkskul relation
 * @method RombonganBelajarQuery rightJoinKelasEkskul($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelasEkskul relation
 * @method RombonganBelajarQuery innerJoinKelasEkskul($relationAlias = null) Adds a INNER JOIN clause to the query using the KelasEkskul relation
 *
 * @method RombonganBelajarQuery leftJoinPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pembelajaran relation
 * @method RombonganBelajarQuery rightJoinPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pembelajaran relation
 * @method RombonganBelajarQuery innerJoinPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the Pembelajaran relation
 *
 * @method RombonganBelajarQuery leftJoinVldRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRombel relation
 * @method RombonganBelajarQuery rightJoinVldRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRombel relation
 * @method RombonganBelajarQuery innerJoinVldRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRombel relation
 *
 * @method RombonganBelajar findOne(PropelPDO $con = null) Return the first RombonganBelajar matching the query
 * @method RombonganBelajar findOneOrCreate(PropelPDO $con = null) Return the first RombonganBelajar matching the query, or a new RombonganBelajar object populated from the query conditions when no match is found
 *
 * @method RombonganBelajar findOneBySemesterId(string $semester_id) Return the first RombonganBelajar filtered by the semester_id column
 * @method RombonganBelajar findOneByIdRuang(string $id_ruang) Return the first RombonganBelajar filtered by the id_ruang column
 * @method RombonganBelajar findOneBySekolahId(string $sekolah_id) Return the first RombonganBelajar filtered by the sekolah_id column
 * @method RombonganBelajar findOneByTingkatPendidikanId(string $tingkat_pendidikan_id) Return the first RombonganBelajar filtered by the tingkat_pendidikan_id column
 * @method RombonganBelajar findOneByJurusanSpId(string $jurusan_sp_id) Return the first RombonganBelajar filtered by the jurusan_sp_id column
 * @method RombonganBelajar findOneByKurikulumId(int $kurikulum_id) Return the first RombonganBelajar filtered by the kurikulum_id column
 * @method RombonganBelajar findOneByNama(string $nama) Return the first RombonganBelajar filtered by the nama column
 * @method RombonganBelajar findOneByPtkId(string $ptk_id) Return the first RombonganBelajar filtered by the ptk_id column
 * @method RombonganBelajar findOneByMovingClass(string $moving_class) Return the first RombonganBelajar filtered by the moving_class column
 * @method RombonganBelajar findOneByJenisRombel(string $jenis_rombel) Return the first RombonganBelajar filtered by the jenis_rombel column
 * @method RombonganBelajar findOneBySks(string $sks) Return the first RombonganBelajar filtered by the sks column
 * @method RombonganBelajar findOneByTanggalMulai(string $tanggal_mulai) Return the first RombonganBelajar filtered by the tanggal_mulai column
 * @method RombonganBelajar findOneByTanggalSelesai(string $tanggal_selesai) Return the first RombonganBelajar filtered by the tanggal_selesai column
 * @method RombonganBelajar findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first RombonganBelajar filtered by the kebutuhan_khusus_id column
 * @method RombonganBelajar findOneByCreateDate(string $create_date) Return the first RombonganBelajar filtered by the create_date column
 * @method RombonganBelajar findOneByLastUpdate(string $last_update) Return the first RombonganBelajar filtered by the last_update column
 * @method RombonganBelajar findOneBySoftDelete(string $soft_delete) Return the first RombonganBelajar filtered by the soft_delete column
 * @method RombonganBelajar findOneByLastSync(string $last_sync) Return the first RombonganBelajar filtered by the last_sync column
 * @method RombonganBelajar findOneByUpdaterId(string $updater_id) Return the first RombonganBelajar filtered by the updater_id column
 *
 * @method array findByRombonganBelajarId(string $rombongan_belajar_id) Return RombonganBelajar objects filtered by the rombongan_belajar_id column
 * @method array findBySemesterId(string $semester_id) Return RombonganBelajar objects filtered by the semester_id column
 * @method array findByIdRuang(string $id_ruang) Return RombonganBelajar objects filtered by the id_ruang column
 * @method array findBySekolahId(string $sekolah_id) Return RombonganBelajar objects filtered by the sekolah_id column
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return RombonganBelajar objects filtered by the tingkat_pendidikan_id column
 * @method array findByJurusanSpId(string $jurusan_sp_id) Return RombonganBelajar objects filtered by the jurusan_sp_id column
 * @method array findByKurikulumId(int $kurikulum_id) Return RombonganBelajar objects filtered by the kurikulum_id column
 * @method array findByNama(string $nama) Return RombonganBelajar objects filtered by the nama column
 * @method array findByPtkId(string $ptk_id) Return RombonganBelajar objects filtered by the ptk_id column
 * @method array findByMovingClass(string $moving_class) Return RombonganBelajar objects filtered by the moving_class column
 * @method array findByJenisRombel(string $jenis_rombel) Return RombonganBelajar objects filtered by the jenis_rombel column
 * @method array findBySks(string $sks) Return RombonganBelajar objects filtered by the sks column
 * @method array findByTanggalMulai(string $tanggal_mulai) Return RombonganBelajar objects filtered by the tanggal_mulai column
 * @method array findByTanggalSelesai(string $tanggal_selesai) Return RombonganBelajar objects filtered by the tanggal_selesai column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return RombonganBelajar objects filtered by the kebutuhan_khusus_id column
 * @method array findByCreateDate(string $create_date) Return RombonganBelajar objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RombonganBelajar objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RombonganBelajar objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RombonganBelajar objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RombonganBelajar objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRombonganBelajarQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRombonganBelajarQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RombonganBelajar', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RombonganBelajarQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RombonganBelajarQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RombonganBelajarQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RombonganBelajarQuery) {
            return $criteria;
        }
        $query = new RombonganBelajarQuery();
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
     * @return   RombonganBelajar|RombonganBelajar[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RombonganBelajarPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RombonganBelajarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RombonganBelajar A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRombonganBelajarId($key, $con = null)
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
     * @return                 RombonganBelajar A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "rombongan_belajar_id", "semester_id", "id_ruang", "sekolah_id", "tingkat_pendidikan_id", "jurusan_sp_id", "kurikulum_id", "nama", "ptk_id", "moving_class", "jenis_rombel", "sks", "tanggal_mulai", "tanggal_selesai", "kebutuhan_khusus_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rombongan_belajar" WHERE "rombongan_belajar_id" = :p0';
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
            $obj = new RombonganBelajar();
            $obj->hydrate($row);
            RombonganBelajarPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RombonganBelajar|RombonganBelajar[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RombonganBelajar[]|mixed the list of results, formatted by the current formatter
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
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $keys, Criteria::IN);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajarId, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRuang('fooValue');   // WHERE id_ruang = 'fooValue'
     * $query->filterByIdRuang('%fooValue%'); // WHERE id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByIdRuang($idRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRuang)) {
                $idRuang = str_replace('*', '%', $idRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::ID_RUANG, $idRuang, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the tingkat_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPendidikanId(1234); // WHERE tingkat_pendidikan_id = 1234
     * $query->filterByTingkatPendidikanId(array(12, 34)); // WHERE tingkat_pendidikan_id IN (12, 34)
     * $query->filterByTingkatPendidikanId(array('min' => 12)); // WHERE tingkat_pendidikan_id >= 12
     * $query->filterByTingkatPendidikanId(array('max' => 12)); // WHERE tingkat_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByTingkatPendidikan()
     *
     * @param     mixed $tingkatPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
    }

    /**
     * Filter the query on the jurusan_sp_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanSpId('fooValue');   // WHERE jurusan_sp_id = 'fooValue'
     * $query->filterByJurusanSpId('%fooValue%'); // WHERE jurusan_sp_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanSpId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByJurusanSpId($jurusanSpId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanSpId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanSpId)) {
                $jurusanSpId = str_replace('*', '%', $jurusanSpId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::JURUSAN_SP_ID, $jurusanSpId, $comparison);
    }

    /**
     * Filter the query on the kurikulum_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKurikulumId(1234); // WHERE kurikulum_id = 1234
     * $query->filterByKurikulumId(array(12, 34)); // WHERE kurikulum_id IN (12, 34)
     * $query->filterByKurikulumId(array('min' => 12)); // WHERE kurikulum_id >= 12
     * $query->filterByKurikulumId(array('max' => 12)); // WHERE kurikulum_id <= 12
     * </code>
     *
     * @see       filterByKurikulum()
     *
     * @param     mixed $kurikulumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByKurikulumId($kurikulumId = null, $comparison = null)
    {
        if (is_array($kurikulumId)) {
            $useMinMax = false;
            if (isset($kurikulumId['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::KURIKULUM_ID, $kurikulumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kurikulumId['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::KURIKULUM_ID, $kurikulumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::KURIKULUM_ID, $kurikulumId, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::NAMA, $nama, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the moving_class column
     *
     * Example usage:
     * <code>
     * $query->filterByMovingClass(1234); // WHERE moving_class = 1234
     * $query->filterByMovingClass(array(12, 34)); // WHERE moving_class IN (12, 34)
     * $query->filterByMovingClass(array('min' => 12)); // WHERE moving_class >= 12
     * $query->filterByMovingClass(array('max' => 12)); // WHERE moving_class <= 12
     * </code>
     *
     * @param     mixed $movingClass The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByMovingClass($movingClass = null, $comparison = null)
    {
        if (is_array($movingClass)) {
            $useMinMax = false;
            if (isset($movingClass['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::MOVING_CLASS, $movingClass['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($movingClass['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::MOVING_CLASS, $movingClass['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::MOVING_CLASS, $movingClass, $comparison);
    }

    /**
     * Filter the query on the jenis_rombel column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisRombel(1234); // WHERE jenis_rombel = 1234
     * $query->filterByJenisRombel(array(12, 34)); // WHERE jenis_rombel IN (12, 34)
     * $query->filterByJenisRombel(array('min' => 12)); // WHERE jenis_rombel >= 12
     * $query->filterByJenisRombel(array('max' => 12)); // WHERE jenis_rombel <= 12
     * </code>
     *
     * @param     mixed $jenisRombel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByJenisRombel($jenisRombel = null, $comparison = null)
    {
        if (is_array($jenisRombel)) {
            $useMinMax = false;
            if (isset($jenisRombel['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::JENIS_ROMBEL, $jenisRombel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisRombel['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::JENIS_ROMBEL, $jenisRombel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::JENIS_ROMBEL, $jenisRombel, $comparison);
    }

    /**
     * Filter the query on the sks column
     *
     * Example usage:
     * <code>
     * $query->filterBySks(1234); // WHERE sks = 1234
     * $query->filterBySks(array(12, 34)); // WHERE sks IN (12, 34)
     * $query->filterBySks(array('min' => 12)); // WHERE sks >= 12
     * $query->filterBySks(array('max' => 12)); // WHERE sks <= 12
     * </code>
     *
     * @param     mixed $sks The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterBySks($sks = null, $comparison = null)
    {
        if (is_array($sks)) {
            $useMinMax = false;
            if (isset($sks['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::SKS, $sks['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sks['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::SKS, $sks['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::SKS, $sks, $comparison);
    }

    /**
     * Filter the query on the tanggal_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalMulai('2011-03-14'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai('now'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai(array('max' => 'yesterday')); // WHERE tanggal_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByTanggalMulai($tanggalMulai = null, $comparison = null)
    {
        if (is_array($tanggalMulai)) {
            $useMinMax = false;
            if (isset($tanggalMulai['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_MULAI, $tanggalMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalMulai['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_MULAI, $tanggalMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_MULAI, $tanggalMulai, $comparison);
    }

    /**
     * Filter the query on the tanggal_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSelesai('2011-03-14'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai('now'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai(array('max' => 'yesterday')); // WHERE tanggal_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByTanggalSelesai($tanggalSelesai = null, $comparison = null)
    {
        if (is_array($tanggalSelesai)) {
            $useMinMax = false;
            if (isset($tanggalSelesai['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_SELESAI, $tanggalSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSelesai['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_SELESAI, $tanggalSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::TANGGAL_SELESAI, $tanggalSelesai, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id >= 12
     * $query->filterByKebutuhanKhususId(array('max' => 12)); // WHERE kebutuhan_khusus_id <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhusus()
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RombonganBelajarPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RombonganBelajarPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RombonganBelajarPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RombonganBelajarPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::JURUSAN_SP_ID, $jurusanSp->getJurusanSpId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::JURUSAN_SP_ID, $jurusanSp->toKeyValue('PrimaryKey', 'JurusanSpId'), $comparison);
        } else {
            throw new PropelException('filterByJurusanSp() only accepts arguments of type JurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanSp');

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
            $this->addJoinObject($join, 'JurusanSp');
        }

        return $this;
    }

    /**
     * Use the JurusanSp relation JurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhusus() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhusus');

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
            $this->addJoinObject($join, 'KebutuhanKhusus');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhusus relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhusus', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::KURIKULUM_ID, $kurikulum->getKurikulumId(), $comparison);
        } elseif ($kurikulum instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::KURIKULUM_ID, $kurikulum->toKeyValue('PrimaryKey', 'KurikulumId'), $comparison);
        } else {
            throw new PropelException('filterByKurikulum() only accepts arguments of type Kurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kurikulum');

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
            $this->addJoinObject($join, 'Kurikulum');
        }

        return $this;
    }

    /**
     * Use the Kurikulum relation Kurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KurikulumQuery A secondary query class using the current class as primary query
     */
    public function useKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kurikulum', '\DataDikdas\Model\KurikulumQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->toKeyValue('PrimaryKey', 'TingkatPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByTingkatPendidikan() only accepts arguments of type TingkatPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinTingkatPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPendidikan');

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
            $this->addJoinObject($join, 'TingkatPendidikan');
        }

        return $this;
    }

    /**
     * Use the TingkatPendidikan relation TingkatPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPendidikan', '\DataDikdas\Model\TingkatPendidikanQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RombonganBelajarPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return RombonganBelajarQuery The current query, for fluid interface
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
     * Filter the query by a related AnggotaRombel object
     *
     * @param   AnggotaRombel|PropelObjectCollection $anggotaRombel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaRombel($anggotaRombel, $comparison = null)
    {
        if ($anggotaRombel instanceof AnggotaRombel) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $anggotaRombel->getRombonganBelajarId(), $comparison);
        } elseif ($anggotaRombel instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaRombelQuery()
                ->filterByPrimaryKeys($anggotaRombel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaRombel() only accepts arguments of type AnggotaRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinAnggotaRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaRombel');

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
            $this->addJoinObject($join, 'AnggotaRombel');
        }

        return $this;
    }

    /**
     * Use the AnggotaRombel relation AnggotaRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaRombelQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaRombel', '\DataDikdas\Model\AnggotaRombelQuery');
    }

    /**
     * Filter the query by a related KelasEkskul object
     *
     * @param   KelasEkskul|PropelObjectCollection $kelasEkskul  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelasEkskul($kelasEkskul, $comparison = null)
    {
        if ($kelasEkskul instanceof KelasEkskul) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $kelasEkskul->getRombonganBelajarId(), $comparison);
        } elseif ($kelasEkskul instanceof PropelObjectCollection) {
            return $this
                ->useKelasEkskulQuery()
                ->filterByPrimaryKeys($kelasEkskul->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKelasEkskul() only accepts arguments of type KelasEkskul or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelasEkskul relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinKelasEkskul($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelasEkskul');

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
            $this->addJoinObject($join, 'KelasEkskul');
        }

        return $this;
    }

    /**
     * Use the KelasEkskul relation KelasEkskul object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelasEkskulQuery A secondary query class using the current class as primary query
     */
    public function useKelasEkskulQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKelasEkskul($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelasEkskul', '\DataDikdas\Model\KelasEkskulQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaran($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $pembelajaran->getRombonganBelajarId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            return $this
                ->usePembelajaranQuery()
                ->filterByPrimaryKeys($pembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPembelajaran() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pembelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinPembelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pembelajaran');

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
            $this->addJoinObject($join, 'Pembelajaran');
        }

        return $this;
    }

    /**
     * Use the Pembelajaran relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPembelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pembelajaran', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related VldRombel object
     *
     * @param   VldRombel|PropelObjectCollection $vldRombel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RombonganBelajarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRombel($vldRombel, $comparison = null)
    {
        if ($vldRombel instanceof VldRombel) {
            return $this
                ->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $vldRombel->getRombonganBelajarId(), $comparison);
        } elseif ($vldRombel instanceof PropelObjectCollection) {
            return $this
                ->useVldRombelQuery()
                ->filterByPrimaryKeys($vldRombel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRombel() only accepts arguments of type VldRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function joinVldRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRombel');

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
            $this->addJoinObject($join, 'VldRombel');
        }

        return $this;
    }

    /**
     * Use the VldRombel relation VldRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRombelQuery A secondary query class using the current class as primary query
     */
    public function useVldRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRombel', '\DataDikdas\Model\VldRombelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RombonganBelajar $rombonganBelajar Object to remove from the list of results
     *
     * @return RombonganBelajarQuery The current query, for fluid interface
     */
    public function prune($rombonganBelajar = null)
    {
        if ($rombonganBelajar) {
            $this->addUsingAlias(RombonganBelajarPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->getRombonganBelajarId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
