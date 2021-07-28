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
use DataDikdas\Model\JenjangKepengawasan;
use DataDikdas\Model\JenjangKepengawasanPeer;
use DataDikdas\Model\JenjangKepengawasanQuery;
use DataDikdas\Model\PengawasTerdaftar;

/**
 * Base class that represents a query for the 'ref.jenjang_kepengawasan' table.
 *
 * 
 *
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanId($order = Criteria::ASC) Order by the jenjang_kepengawasan_id column
 * @method JenjangKepengawasanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanTk($order = Criteria::ASC) Order by the jenjang_kepengawasan_tk column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanSd($order = Criteria::ASC) Order by the jenjang_kepengawasan_sd column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanSmp($order = Criteria::ASC) Order by the jenjang_kepengawasan_smp column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanSma($order = Criteria::ASC) Order by the jenjang_kepengawasan_sma column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanSmk($order = Criteria::ASC) Order by the jenjang_kepengawasan_smk column
 * @method JenjangKepengawasanQuery orderByJenjangKepengawasanSlb($order = Criteria::ASC) Order by the jenjang_kepengawasan_slb column
 * @method JenjangKepengawasanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenjangKepengawasanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenjangKepengawasanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenjangKepengawasanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanId() Group by the jenjang_kepengawasan_id column
 * @method JenjangKepengawasanQuery groupByNama() Group by the nama column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanTk() Group by the jenjang_kepengawasan_tk column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanSd() Group by the jenjang_kepengawasan_sd column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanSmp() Group by the jenjang_kepengawasan_smp column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanSma() Group by the jenjang_kepengawasan_sma column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanSmk() Group by the jenjang_kepengawasan_smk column
 * @method JenjangKepengawasanQuery groupByJenjangKepengawasanSlb() Group by the jenjang_kepengawasan_slb column
 * @method JenjangKepengawasanQuery groupByCreateDate() Group by the create_date column
 * @method JenjangKepengawasanQuery groupByLastUpdate() Group by the last_update column
 * @method JenjangKepengawasanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenjangKepengawasanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenjangKepengawasanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenjangKepengawasanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenjangKepengawasanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenjangKepengawasanQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method JenjangKepengawasanQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method JenjangKepengawasanQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method JenjangKepengawasan findOne(PropelPDO $con = null) Return the first JenjangKepengawasan matching the query
 * @method JenjangKepengawasan findOneOrCreate(PropelPDO $con = null) Return the first JenjangKepengawasan matching the query, or a new JenjangKepengawasan object populated from the query conditions when no match is found
 *
 * @method JenjangKepengawasan findOneByNama(string $nama) Return the first JenjangKepengawasan filtered by the nama column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanTk(string $jenjang_kepengawasan_tk) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_tk column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanSd(string $jenjang_kepengawasan_sd) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_sd column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanSmp(string $jenjang_kepengawasan_smp) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_smp column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanSma(string $jenjang_kepengawasan_sma) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_sma column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanSmk(string $jenjang_kepengawasan_smk) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_smk column
 * @method JenjangKepengawasan findOneByJenjangKepengawasanSlb(string $jenjang_kepengawasan_slb) Return the first JenjangKepengawasan filtered by the jenjang_kepengawasan_slb column
 * @method JenjangKepengawasan findOneByCreateDate(string $create_date) Return the first JenjangKepengawasan filtered by the create_date column
 * @method JenjangKepengawasan findOneByLastUpdate(string $last_update) Return the first JenjangKepengawasan filtered by the last_update column
 * @method JenjangKepengawasan findOneByExpiredDate(string $expired_date) Return the first JenjangKepengawasan filtered by the expired_date column
 * @method JenjangKepengawasan findOneByLastSync(string $last_sync) Return the first JenjangKepengawasan filtered by the last_sync column
 *
 * @method array findByJenjangKepengawasanId(string $jenjang_kepengawasan_id) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_id column
 * @method array findByNama(string $nama) Return JenjangKepengawasan objects filtered by the nama column
 * @method array findByJenjangKepengawasanTk(string $jenjang_kepengawasan_tk) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_tk column
 * @method array findByJenjangKepengawasanSd(string $jenjang_kepengawasan_sd) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_sd column
 * @method array findByJenjangKepengawasanSmp(string $jenjang_kepengawasan_smp) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_smp column
 * @method array findByJenjangKepengawasanSma(string $jenjang_kepengawasan_sma) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_sma column
 * @method array findByJenjangKepengawasanSmk(string $jenjang_kepengawasan_smk) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_smk column
 * @method array findByJenjangKepengawasanSlb(string $jenjang_kepengawasan_slb) Return JenjangKepengawasan objects filtered by the jenjang_kepengawasan_slb column
 * @method array findByCreateDate(string $create_date) Return JenjangKepengawasan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenjangKepengawasan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenjangKepengawasan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenjangKepengawasan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenjangKepengawasanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenjangKepengawasanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenjangKepengawasan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenjangKepengawasanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenjangKepengawasanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenjangKepengawasanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenjangKepengawasanQuery) {
            return $criteria;
        }
        $query = new JenjangKepengawasanQuery();
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
     * @return   JenjangKepengawasan|JenjangKepengawasan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenjangKepengawasanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenjangKepengawasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenjangKepengawasan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenjangKepengawasanId($key, $con = null)
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
     * @return                 JenjangKepengawasan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenjang_kepengawasan_id", "nama", "jenjang_kepengawasan_tk", "jenjang_kepengawasan_sd", "jenjang_kepengawasan_smp", "jenjang_kepengawasan_sma", "jenjang_kepengawasan_smk", "jenjang_kepengawasan_slb", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenjang_kepengawasan" WHERE "jenjang_kepengawasan_id" = :p0';
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
            $obj = new JenjangKepengawasan();
            $obj->hydrate($row);
            JenjangKepengawasanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenjangKepengawasan|JenjangKepengawasan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenjangKepengawasan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanId(1234); // WHERE jenjang_kepengawasan_id = 1234
     * $query->filterByJenjangKepengawasanId(array(12, 34)); // WHERE jenjang_kepengawasan_id IN (12, 34)
     * $query->filterByJenjangKepengawasanId(array('min' => 12)); // WHERE jenjang_kepengawasan_id >= 12
     * $query->filterByJenjangKepengawasanId(array('max' => 12)); // WHERE jenjang_kepengawasan_id <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanId($jenjangKepengawasanId = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanId)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanId['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanId['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId, $comparison);
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenjangKepengawasanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_tk column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanTk(1234); // WHERE jenjang_kepengawasan_tk = 1234
     * $query->filterByJenjangKepengawasanTk(array(12, 34)); // WHERE jenjang_kepengawasan_tk IN (12, 34)
     * $query->filterByJenjangKepengawasanTk(array('min' => 12)); // WHERE jenjang_kepengawasan_tk >= 12
     * $query->filterByJenjangKepengawasanTk(array('max' => 12)); // WHERE jenjang_kepengawasan_tk <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanTk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanTk($jenjangKepengawasanTk = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanTk)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanTk['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK, $jenjangKepengawasanTk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanTk['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK, $jenjangKepengawasanTk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_TK, $jenjangKepengawasanTk, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_sd column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanSd(1234); // WHERE jenjang_kepengawasan_sd = 1234
     * $query->filterByJenjangKepengawasanSd(array(12, 34)); // WHERE jenjang_kepengawasan_sd IN (12, 34)
     * $query->filterByJenjangKepengawasanSd(array('min' => 12)); // WHERE jenjang_kepengawasan_sd >= 12
     * $query->filterByJenjangKepengawasanSd(array('max' => 12)); // WHERE jenjang_kepengawasan_sd <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanSd($jenjangKepengawasanSd = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanSd)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanSd['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD, $jenjangKepengawasanSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanSd['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD, $jenjangKepengawasanSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SD, $jenjangKepengawasanSd, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_smp column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanSmp(1234); // WHERE jenjang_kepengawasan_smp = 1234
     * $query->filterByJenjangKepengawasanSmp(array(12, 34)); // WHERE jenjang_kepengawasan_smp IN (12, 34)
     * $query->filterByJenjangKepengawasanSmp(array('min' => 12)); // WHERE jenjang_kepengawasan_smp >= 12
     * $query->filterByJenjangKepengawasanSmp(array('max' => 12)); // WHERE jenjang_kepengawasan_smp <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanSmp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanSmp($jenjangKepengawasanSmp = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanSmp)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanSmp['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP, $jenjangKepengawasanSmp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanSmp['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP, $jenjangKepengawasanSmp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMP, $jenjangKepengawasanSmp, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanSma(1234); // WHERE jenjang_kepengawasan_sma = 1234
     * $query->filterByJenjangKepengawasanSma(array(12, 34)); // WHERE jenjang_kepengawasan_sma IN (12, 34)
     * $query->filterByJenjangKepengawasanSma(array('min' => 12)); // WHERE jenjang_kepengawasan_sma >= 12
     * $query->filterByJenjangKepengawasanSma(array('max' => 12)); // WHERE jenjang_kepengawasan_sma <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanSma($jenjangKepengawasanSma = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanSma)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanSma['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA, $jenjangKepengawasanSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanSma['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA, $jenjangKepengawasanSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMA, $jenjangKepengawasanSma, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_smk column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanSmk(1234); // WHERE jenjang_kepengawasan_smk = 1234
     * $query->filterByJenjangKepengawasanSmk(array(12, 34)); // WHERE jenjang_kepengawasan_smk IN (12, 34)
     * $query->filterByJenjangKepengawasanSmk(array('min' => 12)); // WHERE jenjang_kepengawasan_smk >= 12
     * $query->filterByJenjangKepengawasanSmk(array('max' => 12)); // WHERE jenjang_kepengawasan_smk <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanSmk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanSmk($jenjangKepengawasanSmk = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanSmk)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanSmk['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK, $jenjangKepengawasanSmk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanSmk['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK, $jenjangKepengawasanSmk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SMK, $jenjangKepengawasanSmk, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_slb column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanSlb(1234); // WHERE jenjang_kepengawasan_slb = 1234
     * $query->filterByJenjangKepengawasanSlb(array(12, 34)); // WHERE jenjang_kepengawasan_slb IN (12, 34)
     * $query->filterByJenjangKepengawasanSlb(array('min' => 12)); // WHERE jenjang_kepengawasan_slb >= 12
     * $query->filterByJenjangKepengawasanSlb(array('max' => 12)); // WHERE jenjang_kepengawasan_slb <= 12
     * </code>
     *
     * @param     mixed $jenjangKepengawasanSlb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanSlb($jenjangKepengawasanSlb = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanSlb)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanSlb['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB, $jenjangKepengawasanSlb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanSlb['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB, $jenjangKepengawasanSlb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_SLB, $jenjangKepengawasanSlb, $comparison);
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenjangKepengawasanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangKepengawasanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangKepengawasanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $pengawasTerdaftar->getJenjangKepengawasanId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenjangKepengawasan $jenjangKepengawasan Object to remove from the list of results
     *
     * @return JenjangKepengawasanQuery The current query, for fluid interface
     */
    public function prune($jenjangKepengawasan = null)
    {
        if ($jenjangKepengawasan) {
            $this->addUsingAlias(JenjangKepengawasanPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasan->getJenjangKepengawasanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
