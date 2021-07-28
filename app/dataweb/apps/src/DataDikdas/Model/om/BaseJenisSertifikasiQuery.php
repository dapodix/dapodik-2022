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
use DataDikdas\Model\JenisSertifikasi;
use DataDikdas\Model\JenisSertifikasiPeer;
use DataDikdas\Model\JenisSertifikasiQuery;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\SertifikasiPd;

/**
 * Base class that represents a query for the 'ref.jenis_sertifikasi' table.
 *
 * 
 *
 * @method JenisSertifikasiQuery orderByIdJenisSertifikasi($order = Criteria::ASC) Order by the id_jenis_sertifikasi column
 * @method JenisSertifikasiQuery orderByJenisSertifikasi($order = Criteria::ASC) Order by the jenis_sertifikasi column
 * @method JenisSertifikasiQuery orderByProfGuru($order = Criteria::ASC) Order by the prof_guru column
 * @method JenisSertifikasiQuery orderByKepalaSekolah($order = Criteria::ASC) Order by the kepala_sekolah column
 * @method JenisSertifikasiQuery orderByLaboran($order = Criteria::ASC) Order by the laboran column
 * @method JenisSertifikasiQuery orderByAPd($order = Criteria::ASC) Order by the a_pd column
 * @method JenisSertifikasiQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method JenisSertifikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisSertifikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisSertifikasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisSertifikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisSertifikasiQuery groupByIdJenisSertifikasi() Group by the id_jenis_sertifikasi column
 * @method JenisSertifikasiQuery groupByJenisSertifikasi() Group by the jenis_sertifikasi column
 * @method JenisSertifikasiQuery groupByProfGuru() Group by the prof_guru column
 * @method JenisSertifikasiQuery groupByKepalaSekolah() Group by the kepala_sekolah column
 * @method JenisSertifikasiQuery groupByLaboran() Group by the laboran column
 * @method JenisSertifikasiQuery groupByAPd() Group by the a_pd column
 * @method JenisSertifikasiQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method JenisSertifikasiQuery groupByCreateDate() Group by the create_date column
 * @method JenisSertifikasiQuery groupByLastUpdate() Group by the last_update column
 * @method JenisSertifikasiQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisSertifikasiQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisSertifikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisSertifikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisSertifikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisSertifikasiQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method JenisSertifikasiQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method JenisSertifikasiQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method JenisSertifikasiQuery leftJoinRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwySertifikasi relation
 * @method JenisSertifikasiQuery rightJoinRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwySertifikasi relation
 * @method JenisSertifikasiQuery innerJoinRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the RwySertifikasi relation
 *
 * @method JenisSertifikasiQuery leftJoinSertifikasiPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the SertifikasiPd relation
 * @method JenisSertifikasiQuery rightJoinSertifikasiPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SertifikasiPd relation
 * @method JenisSertifikasiQuery innerJoinSertifikasiPd($relationAlias = null) Adds a INNER JOIN clause to the query using the SertifikasiPd relation
 *
 * @method JenisSertifikasi findOne(PropelPDO $con = null) Return the first JenisSertifikasi matching the query
 * @method JenisSertifikasi findOneOrCreate(PropelPDO $con = null) Return the first JenisSertifikasi matching the query, or a new JenisSertifikasi object populated from the query conditions when no match is found
 *
 * @method JenisSertifikasi findOneByJenisSertifikasi(string $jenis_sertifikasi) Return the first JenisSertifikasi filtered by the jenis_sertifikasi column
 * @method JenisSertifikasi findOneByProfGuru(string $prof_guru) Return the first JenisSertifikasi filtered by the prof_guru column
 * @method JenisSertifikasi findOneByKepalaSekolah(string $kepala_sekolah) Return the first JenisSertifikasi filtered by the kepala_sekolah column
 * @method JenisSertifikasi findOneByLaboran(string $laboran) Return the first JenisSertifikasi filtered by the laboran column
 * @method JenisSertifikasi findOneByAPd(string $a_pd) Return the first JenisSertifikasi filtered by the a_pd column
 * @method JenisSertifikasi findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first JenisSertifikasi filtered by the kebutuhan_khusus_id column
 * @method JenisSertifikasi findOneByCreateDate(string $create_date) Return the first JenisSertifikasi filtered by the create_date column
 * @method JenisSertifikasi findOneByLastUpdate(string $last_update) Return the first JenisSertifikasi filtered by the last_update column
 * @method JenisSertifikasi findOneByExpiredDate(string $expired_date) Return the first JenisSertifikasi filtered by the expired_date column
 * @method JenisSertifikasi findOneByLastSync(string $last_sync) Return the first JenisSertifikasi filtered by the last_sync column
 *
 * @method array findByIdJenisSertifikasi(string $id_jenis_sertifikasi) Return JenisSertifikasi objects filtered by the id_jenis_sertifikasi column
 * @method array findByJenisSertifikasi(string $jenis_sertifikasi) Return JenisSertifikasi objects filtered by the jenis_sertifikasi column
 * @method array findByProfGuru(string $prof_guru) Return JenisSertifikasi objects filtered by the prof_guru column
 * @method array findByKepalaSekolah(string $kepala_sekolah) Return JenisSertifikasi objects filtered by the kepala_sekolah column
 * @method array findByLaboran(string $laboran) Return JenisSertifikasi objects filtered by the laboran column
 * @method array findByAPd(string $a_pd) Return JenisSertifikasi objects filtered by the a_pd column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return JenisSertifikasi objects filtered by the kebutuhan_khusus_id column
 * @method array findByCreateDate(string $create_date) Return JenisSertifikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisSertifikasi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisSertifikasi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisSertifikasi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisSertifikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisSertifikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisSertifikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisSertifikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisSertifikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisSertifikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisSertifikasiQuery) {
            return $criteria;
        }
        $query = new JenisSertifikasiQuery();
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
     * @return   JenisSertifikasi|JenisSertifikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisSertifikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisSertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJenisSertifikasi($key, $con = null)
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
     * @return                 JenisSertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jenis_sertifikasi", "jenis_sertifikasi", "prof_guru", "kepala_sekolah", "laboran", "a_pd", "kebutuhan_khusus_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_sertifikasi" WHERE "id_jenis_sertifikasi" = :p0';
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
            $obj = new JenisSertifikasi();
            $obj->hydrate($row);
            JenisSertifikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisSertifikasi|JenisSertifikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisSertifikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jenis_sertifikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJenisSertifikasi(1234); // WHERE id_jenis_sertifikasi = 1234
     * $query->filterByIdJenisSertifikasi(array(12, 34)); // WHERE id_jenis_sertifikasi IN (12, 34)
     * $query->filterByIdJenisSertifikasi(array('min' => 12)); // WHERE id_jenis_sertifikasi >= 12
     * $query->filterByIdJenisSertifikasi(array('max' => 12)); // WHERE id_jenis_sertifikasi <= 12
     * </code>
     *
     * @param     mixed $idJenisSertifikasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByIdJenisSertifikasi($idJenisSertifikasi = null, $comparison = null)
    {
        if (is_array($idJenisSertifikasi)) {
            $useMinMax = false;
            if (isset($idJenisSertifikasi['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJenisSertifikasi['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi, $comparison);
    }

    /**
     * Filter the query on the jenis_sertifikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisSertifikasi('fooValue');   // WHERE jenis_sertifikasi = 'fooValue'
     * $query->filterByJenisSertifikasi('%fooValue%'); // WHERE jenis_sertifikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisSertifikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByJenisSertifikasi($jenisSertifikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisSertifikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisSertifikasi)) {
                $jenisSertifikasi = str_replace('*', '%', $jenisSertifikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::JENIS_SERTIFIKASI, $jenisSertifikasi, $comparison);
    }

    /**
     * Filter the query on the prof_guru column
     *
     * Example usage:
     * <code>
     * $query->filterByProfGuru(1234); // WHERE prof_guru = 1234
     * $query->filterByProfGuru(array(12, 34)); // WHERE prof_guru IN (12, 34)
     * $query->filterByProfGuru(array('min' => 12)); // WHERE prof_guru >= 12
     * $query->filterByProfGuru(array('max' => 12)); // WHERE prof_guru <= 12
     * </code>
     *
     * @param     mixed $profGuru The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByProfGuru($profGuru = null, $comparison = null)
    {
        if (is_array($profGuru)) {
            $useMinMax = false;
            if (isset($profGuru['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::PROF_GURU, $profGuru['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($profGuru['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::PROF_GURU, $profGuru['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::PROF_GURU, $profGuru, $comparison);
    }

    /**
     * Filter the query on the kepala_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByKepalaSekolah(1234); // WHERE kepala_sekolah = 1234
     * $query->filterByKepalaSekolah(array(12, 34)); // WHERE kepala_sekolah IN (12, 34)
     * $query->filterByKepalaSekolah(array('min' => 12)); // WHERE kepala_sekolah >= 12
     * $query->filterByKepalaSekolah(array('max' => 12)); // WHERE kepala_sekolah <= 12
     * </code>
     *
     * @param     mixed $kepalaSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByKepalaSekolah($kepalaSekolah = null, $comparison = null)
    {
        if (is_array($kepalaSekolah)) {
            $useMinMax = false;
            if (isset($kepalaSekolah['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::KEPALA_SEKOLAH, $kepalaSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepalaSekolah['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::KEPALA_SEKOLAH, $kepalaSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::KEPALA_SEKOLAH, $kepalaSekolah, $comparison);
    }

    /**
     * Filter the query on the laboran column
     *
     * Example usage:
     * <code>
     * $query->filterByLaboran(1234); // WHERE laboran = 1234
     * $query->filterByLaboran(array(12, 34)); // WHERE laboran IN (12, 34)
     * $query->filterByLaboran(array('min' => 12)); // WHERE laboran >= 12
     * $query->filterByLaboran(array('max' => 12)); // WHERE laboran <= 12
     * </code>
     *
     * @param     mixed $laboran The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLaboran($laboran = null, $comparison = null)
    {
        if (is_array($laboran)) {
            $useMinMax = false;
            if (isset($laboran['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LABORAN, $laboran['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($laboran['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LABORAN, $laboran['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::LABORAN, $laboran, $comparison);
    }

    /**
     * Filter the query on the a_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByAPd(1234); // WHERE a_pd = 1234
     * $query->filterByAPd(array(12, 34)); // WHERE a_pd IN (12, 34)
     * $query->filterByAPd(array('min' => 12)); // WHERE a_pd >= 12
     * $query->filterByAPd(array('max' => 12)); // WHERE a_pd <= 12
     * </code>
     *
     * @param     mixed $aPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByAPd($aPd = null, $comparison = null)
    {
        if (is_array($aPd)) {
            $useMinMax = false;
            if (isset($aPd['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::A_PD, $aPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPd['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::A_PD, $aPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::A_PD, $aPd, $comparison);
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the expired_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredDate('2011-03-14'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate('now'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate(array('max' => 'yesterday')); // WHERE expired_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisSertifikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSertifikasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JenisSertifikasiPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
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
     * @return JenisSertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related RwySertifikasi object
     *
     * @param   RwySertifikasi|PropelObjectCollection $rwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwySertifikasi($rwySertifikasi, $comparison = null)
    {
        if ($rwySertifikasi instanceof RwySertifikasi) {
            return $this
                ->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $rwySertifikasi->getIdJenisSertifikasi(), $comparison);
        } elseif ($rwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useRwySertifikasiQuery()
                ->filterByPrimaryKeys($rwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwySertifikasi() only accepts arguments of type RwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function joinRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwySertifikasi');

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
            $this->addJoinObject($join, 'RwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the RwySertifikasi relation RwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwySertifikasi', '\DataDikdas\Model\RwySertifikasiQuery');
    }

    /**
     * Filter the query by a related SertifikasiPd object
     *
     * @param   SertifikasiPd|PropelObjectCollection $sertifikasiPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySertifikasiPd($sertifikasiPd, $comparison = null)
    {
        if ($sertifikasiPd instanceof SertifikasiPd) {
            return $this
                ->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $sertifikasiPd->getIdJenisSertifikasi(), $comparison);
        } elseif ($sertifikasiPd instanceof PropelObjectCollection) {
            return $this
                ->useSertifikasiPdQuery()
                ->filterByPrimaryKeys($sertifikasiPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySertifikasiPd() only accepts arguments of type SertifikasiPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SertifikasiPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function joinSertifikasiPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SertifikasiPd');

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
            $this->addJoinObject($join, 'SertifikasiPd');
        }

        return $this;
    }

    /**
     * Use the SertifikasiPd relation SertifikasiPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SertifikasiPdQuery A secondary query class using the current class as primary query
     */
    public function useSertifikasiPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSertifikasiPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SertifikasiPd', '\DataDikdas\Model\SertifikasiPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisSertifikasi $jenisSertifikasi Object to remove from the list of results
     *
     * @return JenisSertifikasiQuery The current query, for fluid interface
     */
    public function prune($jenisSertifikasi = null)
    {
        if ($jenisSertifikasi) {
            $this->addUsingAlias(JenisSertifikasiPeer::ID_JENIS_SERTIFIKASI, $jenisSertifikasi->getIdJenisSertifikasi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
