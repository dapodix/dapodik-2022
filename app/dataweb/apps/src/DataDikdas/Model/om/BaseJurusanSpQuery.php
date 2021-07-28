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
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\JurSpLong;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpPeer;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\VldJurusanSp;

/**
 * Base class that represents a query for the 'jurusan_sp' table.
 *
 * 
 *
 * @method JurusanSpQuery orderByJurusanSpId($order = Criteria::ASC) Order by the jurusan_sp_id column
 * @method JurusanSpQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method JurusanSpQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method JurusanSpQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method JurusanSpQuery orderByNamaJurusanSp($order = Criteria::ASC) Order by the nama_jurusan_sp column
 * @method JurusanSpQuery orderBySkIzin($order = Criteria::ASC) Order by the sk_izin column
 * @method JurusanSpQuery orderByTanggalSkIzin($order = Criteria::ASC) Order by the tanggal_sk_izin column
 * @method JurusanSpQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JurusanSpQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JurusanSpQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method JurusanSpQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method JurusanSpQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method JurusanSpQuery groupByJurusanSpId() Group by the jurusan_sp_id column
 * @method JurusanSpQuery groupBySekolahId() Group by the sekolah_id column
 * @method JurusanSpQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method JurusanSpQuery groupByJurusanId() Group by the jurusan_id column
 * @method JurusanSpQuery groupByNamaJurusanSp() Group by the nama_jurusan_sp column
 * @method JurusanSpQuery groupBySkIzin() Group by the sk_izin column
 * @method JurusanSpQuery groupByTanggalSkIzin() Group by the tanggal_sk_izin column
 * @method JurusanSpQuery groupByCreateDate() Group by the create_date column
 * @method JurusanSpQuery groupByLastUpdate() Group by the last_update column
 * @method JurusanSpQuery groupBySoftDelete() Group by the soft_delete column
 * @method JurusanSpQuery groupByLastSync() Group by the last_sync column
 * @method JurusanSpQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method JurusanSpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JurusanSpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JurusanSpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JurusanSpQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method JurusanSpQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method JurusanSpQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method JurusanSpQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method JurusanSpQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method JurusanSpQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method JurusanSpQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method JurusanSpQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method JurusanSpQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method JurusanSpQuery leftJoinAkreditasiProdi($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiProdi relation
 * @method JurusanSpQuery rightJoinAkreditasiProdi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiProdi relation
 * @method JurusanSpQuery innerJoinAkreditasiProdi($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiProdi relation
 *
 * @method JurusanSpQuery leftJoinJurSpLong($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurSpLong relation
 * @method JurusanSpQuery rightJoinJurSpLong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurSpLong relation
 * @method JurusanSpQuery innerJoinJurSpLong($relationAlias = null) Adds a INNER JOIN clause to the query using the JurSpLong relation
 *
 * @method JurusanSpQuery leftJoinJurusanKerjasama($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanKerjasama relation
 * @method JurusanSpQuery rightJoinJurusanKerjasama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanKerjasama relation
 * @method JurusanSpQuery innerJoinJurusanKerjasama($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanKerjasama relation
 *
 * @method JurusanSpQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JurusanSpQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JurusanSpQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method JurusanSpQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method JurusanSpQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method JurusanSpQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method JurusanSpQuery leftJoinVldJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldJurusanSp relation
 * @method JurusanSpQuery rightJoinVldJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldJurusanSp relation
 * @method JurusanSpQuery innerJoinVldJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the VldJurusanSp relation
 *
 * @method JurusanSp findOne(PropelPDO $con = null) Return the first JurusanSp matching the query
 * @method JurusanSp findOneOrCreate(PropelPDO $con = null) Return the first JurusanSp matching the query, or a new JurusanSp object populated from the query conditions when no match is found
 *
 * @method JurusanSp findOneBySekolahId(string $sekolah_id) Return the first JurusanSp filtered by the sekolah_id column
 * @method JurusanSp findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first JurusanSp filtered by the kebutuhan_khusus_id column
 * @method JurusanSp findOneByJurusanId(string $jurusan_id) Return the first JurusanSp filtered by the jurusan_id column
 * @method JurusanSp findOneByNamaJurusanSp(string $nama_jurusan_sp) Return the first JurusanSp filtered by the nama_jurusan_sp column
 * @method JurusanSp findOneBySkIzin(string $sk_izin) Return the first JurusanSp filtered by the sk_izin column
 * @method JurusanSp findOneByTanggalSkIzin(string $tanggal_sk_izin) Return the first JurusanSp filtered by the tanggal_sk_izin column
 * @method JurusanSp findOneByCreateDate(string $create_date) Return the first JurusanSp filtered by the create_date column
 * @method JurusanSp findOneByLastUpdate(string $last_update) Return the first JurusanSp filtered by the last_update column
 * @method JurusanSp findOneBySoftDelete(string $soft_delete) Return the first JurusanSp filtered by the soft_delete column
 * @method JurusanSp findOneByLastSync(string $last_sync) Return the first JurusanSp filtered by the last_sync column
 * @method JurusanSp findOneByUpdaterId(string $updater_id) Return the first JurusanSp filtered by the updater_id column
 *
 * @method array findByJurusanSpId(string $jurusan_sp_id) Return JurusanSp objects filtered by the jurusan_sp_id column
 * @method array findBySekolahId(string $sekolah_id) Return JurusanSp objects filtered by the sekolah_id column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return JurusanSp objects filtered by the kebutuhan_khusus_id column
 * @method array findByJurusanId(string $jurusan_id) Return JurusanSp objects filtered by the jurusan_id column
 * @method array findByNamaJurusanSp(string $nama_jurusan_sp) Return JurusanSp objects filtered by the nama_jurusan_sp column
 * @method array findBySkIzin(string $sk_izin) Return JurusanSp objects filtered by the sk_izin column
 * @method array findByTanggalSkIzin(string $tanggal_sk_izin) Return JurusanSp objects filtered by the tanggal_sk_izin column
 * @method array findByCreateDate(string $create_date) Return JurusanSp objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JurusanSp objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return JurusanSp objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return JurusanSp objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return JurusanSp objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanSpQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJurusanSpQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JurusanSp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JurusanSpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JurusanSpQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JurusanSpQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JurusanSpQuery) {
            return $criteria;
        }
        $query = new JurusanSpQuery();
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
     * @return   JurusanSp|JurusanSp[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JurusanSpPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JurusanSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JurusanSp A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJurusanSpId($key, $con = null)
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
     * @return                 JurusanSp A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jurusan_sp_id", "sekolah_id", "kebutuhan_khusus_id", "jurusan_id", "nama_jurusan_sp", "sk_izin", "tanggal_sk_izin", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "jurusan_sp" WHERE "jurusan_sp_id" = :p0';
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
            $obj = new JurusanSp();
            $obj->hydrate($row);
            JurusanSpPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JurusanSp|JurusanSp[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JurusanSp[]|mixed the list of results, formatted by the current formatter
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $keys, Criteria::IN);
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
     * @return JurusanSpQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $jurusanSpId, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JurusanSpPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::JURUSAN_ID, $jurusanId, $comparison);
    }

    /**
     * Filter the query on the nama_jurusan_sp column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaJurusanSp('fooValue');   // WHERE nama_jurusan_sp = 'fooValue'
     * $query->filterByNamaJurusanSp('%fooValue%'); // WHERE nama_jurusan_sp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaJurusanSp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByNamaJurusanSp($namaJurusanSp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaJurusanSp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaJurusanSp)) {
                $namaJurusanSp = str_replace('*', '%', $namaJurusanSp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::NAMA_JURUSAN_SP, $namaJurusanSp, $comparison);
    }

    /**
     * Filter the query on the sk_izin column
     *
     * Example usage:
     * <code>
     * $query->filterBySkIzin('fooValue');   // WHERE sk_izin = 'fooValue'
     * $query->filterBySkIzin('%fooValue%'); // WHERE sk_izin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skIzin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterBySkIzin($skIzin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skIzin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skIzin)) {
                $skIzin = str_replace('*', '%', $skIzin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::SK_IZIN, $skIzin, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_izin column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkIzin('2011-03-14'); // WHERE tanggal_sk_izin = '2011-03-14'
     * $query->filterByTanggalSkIzin('now'); // WHERE tanggal_sk_izin = '2011-03-14'
     * $query->filterByTanggalSkIzin(array('max' => 'yesterday')); // WHERE tanggal_sk_izin > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkIzin The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByTanggalSkIzin($tanggalSkIzin = null, $comparison = null)
    {
        if (is_array($tanggalSkIzin)) {
            $useMinMax = false;
            if (isset($tanggalSkIzin['min'])) {
                $this->addUsingAlias(JurusanSpPeer::TANGGAL_SK_IZIN, $tanggalSkIzin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkIzin['max'])) {
                $this->addUsingAlias(JurusanSpPeer::TANGGAL_SK_IZIN, $tanggalSkIzin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::TANGGAL_SK_IZIN, $tanggalSkIzin, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JurusanSpPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JurusanSpPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JurusanSpPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JurusanSpPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(JurusanSpPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(JurusanSpPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JurusanSpPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JurusanSpPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanSpPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JurusanSpPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(JurusanSpPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanSpPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
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
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
        } else {
            throw new PropelException('filterByJurusan() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jurusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jurusan');

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
            $this->addJoinObject($join, 'Jurusan');
        }

        return $this;
    }

    /**
     * Use the Jurusan relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanSpPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
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
     * @return JurusanSpQuery The current query, for fluid interface
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
     * Filter the query by a related AkreditasiProdi object
     *
     * @param   AkreditasiProdi|PropelObjectCollection $akreditasiProdi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiProdi($akreditasiProdi, $comparison = null)
    {
        if ($akreditasiProdi instanceof AkreditasiProdi) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $akreditasiProdi->getJurusanSpId(), $comparison);
        } elseif ($akreditasiProdi instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiProdiQuery()
                ->filterByPrimaryKeys($akreditasiProdi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiProdi() only accepts arguments of type AkreditasiProdi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiProdi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinAkreditasiProdi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiProdi');

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
            $this->addJoinObject($join, 'AkreditasiProdi');
        }

        return $this;
    }

    /**
     * Use the AkreditasiProdi relation AkreditasiProdi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiProdiQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiProdiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiProdi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiProdi', '\DataDikdas\Model\AkreditasiProdiQuery');
    }

    /**
     * Filter the query by a related JurSpLong object
     *
     * @param   JurSpLong|PropelObjectCollection $jurSpLong  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurSpLong($jurSpLong, $comparison = null)
    {
        if ($jurSpLong instanceof JurSpLong) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $jurSpLong->getJurusanSpId(), $comparison);
        } elseif ($jurSpLong instanceof PropelObjectCollection) {
            return $this
                ->useJurSpLongQuery()
                ->filterByPrimaryKeys($jurSpLong->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurSpLong() only accepts arguments of type JurSpLong or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurSpLong relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinJurSpLong($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurSpLong');

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
            $this->addJoinObject($join, 'JurSpLong');
        }

        return $this;
    }

    /**
     * Use the JurSpLong relation JurSpLong object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurSpLongQuery A secondary query class using the current class as primary query
     */
    public function useJurSpLongQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurSpLong($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurSpLong', '\DataDikdas\Model\JurSpLongQuery');
    }

    /**
     * Filter the query by a related JurusanKerjasama object
     *
     * @param   JurusanKerjasama|PropelObjectCollection $jurusanKerjasama  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanKerjasama($jurusanKerjasama, $comparison = null)
    {
        if ($jurusanKerjasama instanceof JurusanKerjasama) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $jurusanKerjasama->getJurusanSpId(), $comparison);
        } elseif ($jurusanKerjasama instanceof PropelObjectCollection) {
            return $this
                ->useJurusanKerjasamaQuery()
                ->filterByPrimaryKeys($jurusanKerjasama->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanKerjasama() only accepts arguments of type JurusanKerjasama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanKerjasama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinJurusanKerjasama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanKerjasama');

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
            $this->addJoinObject($join, 'JurusanKerjasama');
        }

        return $this;
    }

    /**
     * Use the JurusanKerjasama relation JurusanKerjasama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanKerjasamaQuery A secondary query class using the current class as primary query
     */
    public function useJurusanKerjasamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanKerjasama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanKerjasama', '\DataDikdas\Model\JurusanKerjasamaQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $registrasiPesertaDidik->getJurusanSpId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useRegistrasiPesertaDidikQuery()
                ->filterByPrimaryKeys($registrasiPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $rombonganBelajar->getJurusanSpId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
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
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related VldJurusanSp object
     *
     * @param   VldJurusanSp|PropelObjectCollection $vldJurusanSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldJurusanSp($vldJurusanSp, $comparison = null)
    {
        if ($vldJurusanSp instanceof VldJurusanSp) {
            return $this
                ->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $vldJurusanSp->getJurusanSpId(), $comparison);
        } elseif ($vldJurusanSp instanceof PropelObjectCollection) {
            return $this
                ->useVldJurusanSpQuery()
                ->filterByPrimaryKeys($vldJurusanSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldJurusanSp() only accepts arguments of type VldJurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldJurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function joinVldJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldJurusanSp');

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
            $this->addJoinObject($join, 'VldJurusanSp');
        }

        return $this;
    }

    /**
     * Use the VldJurusanSp relation VldJurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldJurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useVldJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldJurusanSp', '\DataDikdas\Model\VldJurusanSpQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JurusanSp $jurusanSp Object to remove from the list of results
     *
     * @return JurusanSpQuery The current query, for fluid interface
     */
    public function prune($jurusanSp = null)
    {
        if ($jurusanSp) {
            $this->addUsingAlias(JurusanSpPeer::JURUSAN_SP_ID, $jurusanSp->getJurusanSpId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
