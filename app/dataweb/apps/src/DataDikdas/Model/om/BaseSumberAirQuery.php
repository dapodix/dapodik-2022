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
use DataDikdas\Model\SumberAir;
use DataDikdas\Model\SumberAirPeer;
use DataDikdas\Model\SumberAirQuery;

/**
 * Base class that represents a query for the 'ref.sumber_air' table.
 *
 * 
 *
 * @method SumberAirQuery orderBySumberAirId($order = Criteria::ASC) Order by the sumber_air_id column
 * @method SumberAirQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method SumberAirQuery orderBySumberAir($order = Criteria::ASC) Order by the sumber_air column
 * @method SumberAirQuery orderBySumberMinum($order = Criteria::ASC) Order by the sumber_minum column
 * @method SumberAirQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SumberAirQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SumberAirQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method SumberAirQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method SumberAirQuery groupBySumberAirId() Group by the sumber_air_id column
 * @method SumberAirQuery groupByNama() Group by the nama column
 * @method SumberAirQuery groupBySumberAir() Group by the sumber_air column
 * @method SumberAirQuery groupBySumberMinum() Group by the sumber_minum column
 * @method SumberAirQuery groupByCreateDate() Group by the create_date column
 * @method SumberAirQuery groupByLastUpdate() Group by the last_update column
 * @method SumberAirQuery groupByExpiredDate() Group by the expired_date column
 * @method SumberAirQuery groupByLastSync() Group by the last_sync column
 *
 * @method SumberAirQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SumberAirQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SumberAirQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SumberAirQuery leftJoinSanitasiRelatedBySumberAirId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SanitasiRelatedBySumberAirId relation
 * @method SumberAirQuery rightJoinSanitasiRelatedBySumberAirId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SanitasiRelatedBySumberAirId relation
 * @method SumberAirQuery innerJoinSanitasiRelatedBySumberAirId($relationAlias = null) Adds a INNER JOIN clause to the query using the SanitasiRelatedBySumberAirId relation
 *
 * @method SumberAirQuery leftJoinSanitasiRelatedBySumberAirMinumId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SanitasiRelatedBySumberAirMinumId relation
 * @method SumberAirQuery rightJoinSanitasiRelatedBySumberAirMinumId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SanitasiRelatedBySumberAirMinumId relation
 * @method SumberAirQuery innerJoinSanitasiRelatedBySumberAirMinumId($relationAlias = null) Adds a INNER JOIN clause to the query using the SanitasiRelatedBySumberAirMinumId relation
 *
 * @method SumberAir findOne(PropelPDO $con = null) Return the first SumberAir matching the query
 * @method SumberAir findOneOrCreate(PropelPDO $con = null) Return the first SumberAir matching the query, or a new SumberAir object populated from the query conditions when no match is found
 *
 * @method SumberAir findOneByNama(string $nama) Return the first SumberAir filtered by the nama column
 * @method SumberAir findOneBySumberAir(string $sumber_air) Return the first SumberAir filtered by the sumber_air column
 * @method SumberAir findOneBySumberMinum(string $sumber_minum) Return the first SumberAir filtered by the sumber_minum column
 * @method SumberAir findOneByCreateDate(string $create_date) Return the first SumberAir filtered by the create_date column
 * @method SumberAir findOneByLastUpdate(string $last_update) Return the first SumberAir filtered by the last_update column
 * @method SumberAir findOneByExpiredDate(string $expired_date) Return the first SumberAir filtered by the expired_date column
 * @method SumberAir findOneByLastSync(string $last_sync) Return the first SumberAir filtered by the last_sync column
 *
 * @method array findBySumberAirId(string $sumber_air_id) Return SumberAir objects filtered by the sumber_air_id column
 * @method array findByNama(string $nama) Return SumberAir objects filtered by the nama column
 * @method array findBySumberAir(string $sumber_air) Return SumberAir objects filtered by the sumber_air column
 * @method array findBySumberMinum(string $sumber_minum) Return SumberAir objects filtered by the sumber_minum column
 * @method array findByCreateDate(string $create_date) Return SumberAir objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return SumberAir objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return SumberAir objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return SumberAir objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSumberAirQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSumberAirQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SumberAir', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SumberAirQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SumberAirQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SumberAirQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SumberAirQuery) {
            return $criteria;
        }
        $query = new SumberAirQuery();
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
     * @return   SumberAir|SumberAir[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SumberAirPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SumberAirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SumberAir A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySumberAirId($key, $con = null)
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
     * @return                 SumberAir A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sumber_air_id", "nama", "sumber_air", "sumber_minum", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."sumber_air" WHERE "sumber_air_id" = :p0';
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
            $obj = new SumberAir();
            $obj->hydrate($row);
            SumberAirPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SumberAir|SumberAir[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SumberAir[]|mixed the list of results, formatted by the current formatter
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
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $keys, Criteria::IN);
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
     * @param     mixed $sumberAirId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterBySumberAirId($sumberAirId = null, $comparison = null)
    {
        if (is_array($sumberAirId)) {
            $useMinMax = false;
            if (isset($sumberAirId['min'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sumberAirId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberAirId['max'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sumberAirId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sumberAirId, $comparison);
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
     * @return SumberAirQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SumberAirPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the sumber_air column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberAir(1234); // WHERE sumber_air = 1234
     * $query->filterBySumberAir(array(12, 34)); // WHERE sumber_air IN (12, 34)
     * $query->filterBySumberAir(array('min' => 12)); // WHERE sumber_air >= 12
     * $query->filterBySumberAir(array('max' => 12)); // WHERE sumber_air <= 12
     * </code>
     *
     * @param     mixed $sumberAir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterBySumberAir($sumberAir = null, $comparison = null)
    {
        if (is_array($sumberAir)) {
            $useMinMax = false;
            if (isset($sumberAir['min'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_AIR, $sumberAir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberAir['max'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_AIR, $sumberAir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::SUMBER_AIR, $sumberAir, $comparison);
    }

    /**
     * Filter the query on the sumber_minum column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberMinum(1234); // WHERE sumber_minum = 1234
     * $query->filterBySumberMinum(array(12, 34)); // WHERE sumber_minum IN (12, 34)
     * $query->filterBySumberMinum(array('min' => 12)); // WHERE sumber_minum >= 12
     * $query->filterBySumberMinum(array('max' => 12)); // WHERE sumber_minum <= 12
     * </code>
     *
     * @param     mixed $sumberMinum The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterBySumberMinum($sumberMinum = null, $comparison = null)
    {
        if (is_array($sumberMinum)) {
            $useMinMax = false;
            if (isset($sumberMinum['min'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_MINUM, $sumberMinum['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberMinum['max'])) {
                $this->addUsingAlias(SumberAirPeer::SUMBER_MINUM, $sumberMinum['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::SUMBER_MINUM, $sumberMinum, $comparison);
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
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SumberAirPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SumberAirPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SumberAirPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SumberAirPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(SumberAirPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(SumberAirPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SumberAirPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SumberAirPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberAirPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Sanitasi object
     *
     * @param   Sanitasi|PropelObjectCollection $sanitasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SumberAirQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySanitasiRelatedBySumberAirId($sanitasi, $comparison = null)
    {
        if ($sanitasi instanceof Sanitasi) {
            return $this
                ->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sanitasi->getSumberAirId(), $comparison);
        } elseif ($sanitasi instanceof PropelObjectCollection) {
            return $this
                ->useSanitasiRelatedBySumberAirIdQuery()
                ->filterByPrimaryKeys($sanitasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySanitasiRelatedBySumberAirId() only accepts arguments of type Sanitasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SanitasiRelatedBySumberAirId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function joinSanitasiRelatedBySumberAirId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SanitasiRelatedBySumberAirId');

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
            $this->addJoinObject($join, 'SanitasiRelatedBySumberAirId');
        }

        return $this;
    }

    /**
     * Use the SanitasiRelatedBySumberAirId relation Sanitasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SanitasiQuery A secondary query class using the current class as primary query
     */
    public function useSanitasiRelatedBySumberAirIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSanitasiRelatedBySumberAirId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SanitasiRelatedBySumberAirId', '\DataDikdas\Model\SanitasiQuery');
    }

    /**
     * Filter the query by a related Sanitasi object
     *
     * @param   Sanitasi|PropelObjectCollection $sanitasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SumberAirQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySanitasiRelatedBySumberAirMinumId($sanitasi, $comparison = null)
    {
        if ($sanitasi instanceof Sanitasi) {
            return $this
                ->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sanitasi->getSumberAirMinumId(), $comparison);
        } elseif ($sanitasi instanceof PropelObjectCollection) {
            return $this
                ->useSanitasiRelatedBySumberAirMinumIdQuery()
                ->filterByPrimaryKeys($sanitasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySanitasiRelatedBySumberAirMinumId() only accepts arguments of type Sanitasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SanitasiRelatedBySumberAirMinumId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function joinSanitasiRelatedBySumberAirMinumId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SanitasiRelatedBySumberAirMinumId');

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
            $this->addJoinObject($join, 'SanitasiRelatedBySumberAirMinumId');
        }

        return $this;
    }

    /**
     * Use the SanitasiRelatedBySumberAirMinumId relation Sanitasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SanitasiQuery A secondary query class using the current class as primary query
     */
    public function useSanitasiRelatedBySumberAirMinumIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSanitasiRelatedBySumberAirMinumId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SanitasiRelatedBySumberAirMinumId', '\DataDikdas\Model\SanitasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SumberAir $sumberAir Object to remove from the list of results
     *
     * @return SumberAirQuery The current query, for fluid interface
     */
    public function prune($sumberAir = null)
    {
        if ($sumberAir) {
            $this->addUsingAlias(SumberAirPeer::SUMBER_AIR_ID, $sumberAir->getSumberAirId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
