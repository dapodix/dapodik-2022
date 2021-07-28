<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\JenisBukuAlat;
use DataDikdas\Model\JenisBukuAlatPeer;
use DataDikdas\Model\JenisBukuAlatQuery;

/**
 * Base class that represents a query for the 'ref.jenis_buku_alat' table.
 *
 * 
 *
 * @method JenisBukuAlatQuery orderByJenisBukuAlatId($order = Criteria::ASC) Order by the jenis_buku_alat_id column
 * @method JenisBukuAlatQuery orderByJenisBukuAlat($order = Criteria::ASC) Order by the jenis_buku_alat column
 * @method JenisBukuAlatQuery orderBySpmQtyMinPerSiswa($order = Criteria::ASC) Order by the spm_qty_min_per_siswa column
 * @method JenisBukuAlatQuery orderBySpmQtyMinPerSekolah($order = Criteria::ASC) Order by the spm_qty_min_per_sekolah column
 * @method JenisBukuAlatQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisBukuAlatQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisBukuAlatQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisBukuAlatQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisBukuAlatQuery groupByJenisBukuAlatId() Group by the jenis_buku_alat_id column
 * @method JenisBukuAlatQuery groupByJenisBukuAlat() Group by the jenis_buku_alat column
 * @method JenisBukuAlatQuery groupBySpmQtyMinPerSiswa() Group by the spm_qty_min_per_siswa column
 * @method JenisBukuAlatQuery groupBySpmQtyMinPerSekolah() Group by the spm_qty_min_per_sekolah column
 * @method JenisBukuAlatQuery groupByCreateDate() Group by the create_date column
 * @method JenisBukuAlatQuery groupByLastUpdate() Group by the last_update column
 * @method JenisBukuAlatQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisBukuAlatQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisBukuAlatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisBukuAlatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisBukuAlatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisBukuAlat findOne(PropelPDO $con = null) Return the first JenisBukuAlat matching the query
 * @method JenisBukuAlat findOneOrCreate(PropelPDO $con = null) Return the first JenisBukuAlat matching the query, or a new JenisBukuAlat object populated from the query conditions when no match is found
 *
 * @method JenisBukuAlat findOneByJenisBukuAlat(string $jenis_buku_alat) Return the first JenisBukuAlat filtered by the jenis_buku_alat column
 * @method JenisBukuAlat findOneBySpmQtyMinPerSiswa(string $spm_qty_min_per_siswa) Return the first JenisBukuAlat filtered by the spm_qty_min_per_siswa column
 * @method JenisBukuAlat findOneBySpmQtyMinPerSekolah(string $spm_qty_min_per_sekolah) Return the first JenisBukuAlat filtered by the spm_qty_min_per_sekolah column
 * @method JenisBukuAlat findOneByCreateDate(string $create_date) Return the first JenisBukuAlat filtered by the create_date column
 * @method JenisBukuAlat findOneByLastUpdate(string $last_update) Return the first JenisBukuAlat filtered by the last_update column
 * @method JenisBukuAlat findOneByExpiredDate(string $expired_date) Return the first JenisBukuAlat filtered by the expired_date column
 * @method JenisBukuAlat findOneByLastSync(string $last_sync) Return the first JenisBukuAlat filtered by the last_sync column
 *
 * @method array findByJenisBukuAlatId(string $jenis_buku_alat_id) Return JenisBukuAlat objects filtered by the jenis_buku_alat_id column
 * @method array findByJenisBukuAlat(string $jenis_buku_alat) Return JenisBukuAlat objects filtered by the jenis_buku_alat column
 * @method array findBySpmQtyMinPerSiswa(string $spm_qty_min_per_siswa) Return JenisBukuAlat objects filtered by the spm_qty_min_per_siswa column
 * @method array findBySpmQtyMinPerSekolah(string $spm_qty_min_per_sekolah) Return JenisBukuAlat objects filtered by the spm_qty_min_per_sekolah column
 * @method array findByCreateDate(string $create_date) Return JenisBukuAlat objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisBukuAlat objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisBukuAlat objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisBukuAlat objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisBukuAlatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisBukuAlatQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisBukuAlat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisBukuAlatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisBukuAlatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisBukuAlatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisBukuAlatQuery) {
            return $criteria;
        }
        $query = new JenisBukuAlatQuery();
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
     * @return   JenisBukuAlat|JenisBukuAlat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisBukuAlatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisBukuAlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisBukuAlat A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisBukuAlatId($key, $con = null)
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
     * @return                 JenisBukuAlat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_buku_alat_id", "jenis_buku_alat", "spm_qty_min_per_siswa", "spm_qty_min_per_sekolah", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_buku_alat" WHERE "jenis_buku_alat_id" = :p0';
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
            $obj = new JenisBukuAlat();
            $obj->hydrate($row);
            JenisBukuAlatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisBukuAlat|JenisBukuAlat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisBukuAlat[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_buku_alat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisBukuAlatId(1234); // WHERE jenis_buku_alat_id = 1234
     * $query->filterByJenisBukuAlatId(array(12, 34)); // WHERE jenis_buku_alat_id IN (12, 34)
     * $query->filterByJenisBukuAlatId(array('min' => 12)); // WHERE jenis_buku_alat_id >= 12
     * $query->filterByJenisBukuAlatId(array('max' => 12)); // WHERE jenis_buku_alat_id <= 12
     * </code>
     *
     * @param     mixed $jenisBukuAlatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByJenisBukuAlatId($jenisBukuAlatId = null, $comparison = null)
    {
        if (is_array($jenisBukuAlatId)) {
            $useMinMax = false;
            if (isset($jenisBukuAlatId['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $jenisBukuAlatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBukuAlatId['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $jenisBukuAlatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $jenisBukuAlatId, $comparison);
    }

    /**
     * Filter the query on the jenis_buku_alat column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisBukuAlat('fooValue');   // WHERE jenis_buku_alat = 'fooValue'
     * $query->filterByJenisBukuAlat('%fooValue%'); // WHERE jenis_buku_alat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisBukuAlat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByJenisBukuAlat($jenisBukuAlat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisBukuAlat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisBukuAlat)) {
                $jenisBukuAlat = str_replace('*', '%', $jenisBukuAlat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT, $jenisBukuAlat, $comparison);
    }

    /**
     * Filter the query on the spm_qty_min_per_siswa column
     *
     * Example usage:
     * <code>
     * $query->filterBySpmQtyMinPerSiswa(1234); // WHERE spm_qty_min_per_siswa = 1234
     * $query->filterBySpmQtyMinPerSiswa(array(12, 34)); // WHERE spm_qty_min_per_siswa IN (12, 34)
     * $query->filterBySpmQtyMinPerSiswa(array('min' => 12)); // WHERE spm_qty_min_per_siswa >= 12
     * $query->filterBySpmQtyMinPerSiswa(array('max' => 12)); // WHERE spm_qty_min_per_siswa <= 12
     * </code>
     *
     * @param     mixed $spmQtyMinPerSiswa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterBySpmQtyMinPerSiswa($spmQtyMinPerSiswa = null, $comparison = null)
    {
        if (is_array($spmQtyMinPerSiswa)) {
            $useMinMax = false;
            if (isset($spmQtyMinPerSiswa['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spmQtyMinPerSiswa['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa, $comparison);
    }

    /**
     * Filter the query on the spm_qty_min_per_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterBySpmQtyMinPerSekolah(1234); // WHERE spm_qty_min_per_sekolah = 1234
     * $query->filterBySpmQtyMinPerSekolah(array(12, 34)); // WHERE spm_qty_min_per_sekolah IN (12, 34)
     * $query->filterBySpmQtyMinPerSekolah(array('min' => 12)); // WHERE spm_qty_min_per_sekolah >= 12
     * $query->filterBySpmQtyMinPerSekolah(array('max' => 12)); // WHERE spm_qty_min_per_sekolah <= 12
     * </code>
     *
     * @param     mixed $spmQtyMinPerSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterBySpmQtyMinPerSekolah($spmQtyMinPerSekolah = null, $comparison = null)
    {
        if (is_array($spmQtyMinPerSekolah)) {
            $useMinMax = false;
            if (isset($spmQtyMinPerSekolah['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spmQtyMinPerSekolah['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah, $comparison);
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
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisBukuAlatPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBukuAlatPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   JenisBukuAlat $jenisBukuAlat Object to remove from the list of results
     *
     * @return JenisBukuAlatQuery The current query, for fluid interface
     */
    public function prune($jenisBukuAlat = null)
    {
        if ($jenisBukuAlat) {
            $this->addUsingAlias(JenisBukuAlatPeer::JENIS_BUKU_ALAT_ID, $jenisBukuAlat->getJenisBukuAlatId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
