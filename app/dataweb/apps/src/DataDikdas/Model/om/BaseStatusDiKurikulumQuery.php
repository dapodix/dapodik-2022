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
use DataDikdas\Model\StatusDiKurikulum;
use DataDikdas\Model\StatusDiKurikulumPeer;
use DataDikdas\Model\StatusDiKurikulumQuery;

/**
 * Base class that represents a query for the 'ref.status_di_kurikulum' table.
 *
 * 
 *
 * @method StatusDiKurikulumQuery orderByStatusDiKurikulum($order = Criteria::ASC) Order by the status_di_kurikulum column
 * @method StatusDiKurikulumQuery orderByKetStatDiKurikulum($order = Criteria::ASC) Order by the ket_stat_di_kurikulum column
 * @method StatusDiKurikulumQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method StatusDiKurikulumQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method StatusDiKurikulumQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method StatusDiKurikulumQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method StatusDiKurikulumQuery groupByStatusDiKurikulum() Group by the status_di_kurikulum column
 * @method StatusDiKurikulumQuery groupByKetStatDiKurikulum() Group by the ket_stat_di_kurikulum column
 * @method StatusDiKurikulumQuery groupByCreateDate() Group by the create_date column
 * @method StatusDiKurikulumQuery groupByLastUpdate() Group by the last_update column
 * @method StatusDiKurikulumQuery groupByExpiredDate() Group by the expired_date column
 * @method StatusDiKurikulumQuery groupByLastSync() Group by the last_sync column
 *
 * @method StatusDiKurikulumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StatusDiKurikulumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StatusDiKurikulumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StatusDiKurikulum findOne(PropelPDO $con = null) Return the first StatusDiKurikulum matching the query
 * @method StatusDiKurikulum findOneOrCreate(PropelPDO $con = null) Return the first StatusDiKurikulum matching the query, or a new StatusDiKurikulum object populated from the query conditions when no match is found
 *
 * @method StatusDiKurikulum findOneByKetStatDiKurikulum(string $ket_stat_di_kurikulum) Return the first StatusDiKurikulum filtered by the ket_stat_di_kurikulum column
 * @method StatusDiKurikulum findOneByCreateDate(string $create_date) Return the first StatusDiKurikulum filtered by the create_date column
 * @method StatusDiKurikulum findOneByLastUpdate(string $last_update) Return the first StatusDiKurikulum filtered by the last_update column
 * @method StatusDiKurikulum findOneByExpiredDate(string $expired_date) Return the first StatusDiKurikulum filtered by the expired_date column
 * @method StatusDiKurikulum findOneByLastSync(string $last_sync) Return the first StatusDiKurikulum filtered by the last_sync column
 *
 * @method array findByStatusDiKurikulum(string $status_di_kurikulum) Return StatusDiKurikulum objects filtered by the status_di_kurikulum column
 * @method array findByKetStatDiKurikulum(string $ket_stat_di_kurikulum) Return StatusDiKurikulum objects filtered by the ket_stat_di_kurikulum column
 * @method array findByCreateDate(string $create_date) Return StatusDiKurikulum objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return StatusDiKurikulum objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return StatusDiKurikulum objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return StatusDiKurikulum objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseStatusDiKurikulumQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStatusDiKurikulumQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\StatusDiKurikulum', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StatusDiKurikulumQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StatusDiKurikulumQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StatusDiKurikulumQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StatusDiKurikulumQuery) {
            return $criteria;
        }
        $query = new StatusDiKurikulumQuery();
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
     * @return   StatusDiKurikulum|StatusDiKurikulum[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StatusDiKurikulumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StatusDiKurikulumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StatusDiKurikulum A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByStatusDiKurikulum($key, $con = null)
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
     * @return                 StatusDiKurikulum A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "status_di_kurikulum", "ket_stat_di_kurikulum", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."status_di_kurikulum" WHERE "status_di_kurikulum" = :p0';
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
            $obj = new StatusDiKurikulum();
            $obj->hydrate($row);
            StatusDiKurikulumPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StatusDiKurikulum|StatusDiKurikulum[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StatusDiKurikulum[]|mixed the list of results, formatted by the current formatter
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $keys, Criteria::IN);
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByStatusDiKurikulum($statusDiKurikulum = null, $comparison = null)
    {
        if (is_array($statusDiKurikulum)) {
            $useMinMax = false;
            if (isset($statusDiKurikulum['min'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusDiKurikulum['max'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum, $comparison);
    }

    /**
     * Filter the query on the ket_stat_di_kurikulum column
     *
     * Example usage:
     * <code>
     * $query->filterByKetStatDiKurikulum('fooValue');   // WHERE ket_stat_di_kurikulum = 'fooValue'
     * $query->filterByKetStatDiKurikulum('%fooValue%'); // WHERE ket_stat_di_kurikulum LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketStatDiKurikulum The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByKetStatDiKurikulum($ketStatDiKurikulum = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketStatDiKurikulum)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketStatDiKurikulum)) {
                $ketStatDiKurikulum = str_replace('*', '%', $ketStatDiKurikulum);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::KET_STAT_DI_KURIKULUM, $ketStatDiKurikulum, $comparison);
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(StatusDiKurikulumPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusDiKurikulumPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   StatusDiKurikulum $statusDiKurikulum Object to remove from the list of results
     *
     * @return StatusDiKurikulumQuery The current query, for fluid interface
     */
    public function prune($statusDiKurikulum = null)
    {
        if ($statusDiKurikulum) {
            $this->addUsingAlias(StatusDiKurikulumPeer::STATUS_DI_KURIKULUM, $statusDiKurikulum->getStatusDiKurikulum(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
