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
use DataDikdas\Model\Biblio;
use DataDikdas\Model\Frequency;
use DataDikdas\Model\FrequencyPeer;
use DataDikdas\Model\FrequencyQuery;

/**
 * Base class that represents a query for the 'pustaka.frequency' table.
 *
 * 
 *
 * @method FrequencyQuery orderByIdFreq($order = Criteria::ASC) Order by the id_freq column
 * @method FrequencyQuery orderByFreq($order = Criteria::ASC) Order by the freq column
 * @method FrequencyQuery orderByInterval($order = Criteria::ASC) Order by the interval column
 * @method FrequencyQuery orderByTimeUnit($order = Criteria::ASC) Order by the time_unit column
 * @method FrequencyQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method FrequencyQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method FrequencyQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method FrequencyQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method FrequencyQuery groupByIdFreq() Group by the id_freq column
 * @method FrequencyQuery groupByFreq() Group by the freq column
 * @method FrequencyQuery groupByInterval() Group by the interval column
 * @method FrequencyQuery groupByTimeUnit() Group by the time_unit column
 * @method FrequencyQuery groupByCreateDate() Group by the create_date column
 * @method FrequencyQuery groupByLastUpdate() Group by the last_update column
 * @method FrequencyQuery groupByExpiredDate() Group by the expired_date column
 * @method FrequencyQuery groupByLastSync() Group by the last_sync column
 *
 * @method FrequencyQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method FrequencyQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method FrequencyQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method FrequencyQuery leftJoinBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the Biblio relation
 * @method FrequencyQuery rightJoinBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Biblio relation
 * @method FrequencyQuery innerJoinBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the Biblio relation
 *
 * @method Frequency findOne(PropelPDO $con = null) Return the first Frequency matching the query
 * @method Frequency findOneOrCreate(PropelPDO $con = null) Return the first Frequency matching the query, or a new Frequency object populated from the query conditions when no match is found
 *
 * @method Frequency findOneByFreq(string $freq) Return the first Frequency filtered by the freq column
 * @method Frequency findOneByInterval(string $interval) Return the first Frequency filtered by the interval column
 * @method Frequency findOneByTimeUnit(string $time_unit) Return the first Frequency filtered by the time_unit column
 * @method Frequency findOneByCreateDate(string $create_date) Return the first Frequency filtered by the create_date column
 * @method Frequency findOneByLastUpdate(string $last_update) Return the first Frequency filtered by the last_update column
 * @method Frequency findOneByExpiredDate(string $expired_date) Return the first Frequency filtered by the expired_date column
 * @method Frequency findOneByLastSync(string $last_sync) Return the first Frequency filtered by the last_sync column
 *
 * @method array findByIdFreq(string $id_freq) Return Frequency objects filtered by the id_freq column
 * @method array findByFreq(string $freq) Return Frequency objects filtered by the freq column
 * @method array findByInterval(string $interval) Return Frequency objects filtered by the interval column
 * @method array findByTimeUnit(string $time_unit) Return Frequency objects filtered by the time_unit column
 * @method array findByCreateDate(string $create_date) Return Frequency objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Frequency objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Frequency objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Frequency objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseFrequencyQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseFrequencyQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Frequency', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new FrequencyQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   FrequencyQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return FrequencyQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof FrequencyQuery) {
            return $criteria;
        }
        $query = new FrequencyQuery();
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
     * @return   Frequency|Frequency[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = FrequencyPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(FrequencyPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Frequency A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdFreq($key, $con = null)
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
     * @return                 Frequency A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_freq", "freq", "interval", "time_unit", "create_date", "last_update", "expired_date", "last_sync" FROM "pustaka"."frequency" WHERE "id_freq" = :p0';
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
            $obj = new Frequency();
            $obj->hydrate($row);
            FrequencyPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Frequency|Frequency[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Frequency[]|mixed the list of results, formatted by the current formatter
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
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(FrequencyPeer::ID_FREQ, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(FrequencyPeer::ID_FREQ, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_freq column
     *
     * Example usage:
     * <code>
     * $query->filterByIdFreq(1234); // WHERE id_freq = 1234
     * $query->filterByIdFreq(array(12, 34)); // WHERE id_freq IN (12, 34)
     * $query->filterByIdFreq(array('min' => 12)); // WHERE id_freq >= 12
     * $query->filterByIdFreq(array('max' => 12)); // WHERE id_freq <= 12
     * </code>
     *
     * @param     mixed $idFreq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByIdFreq($idFreq = null, $comparison = null)
    {
        if (is_array($idFreq)) {
            $useMinMax = false;
            if (isset($idFreq['min'])) {
                $this->addUsingAlias(FrequencyPeer::ID_FREQ, $idFreq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idFreq['max'])) {
                $this->addUsingAlias(FrequencyPeer::ID_FREQ, $idFreq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::ID_FREQ, $idFreq, $comparison);
    }

    /**
     * Filter the query on the freq column
     *
     * Example usage:
     * <code>
     * $query->filterByFreq('fooValue');   // WHERE freq = 'fooValue'
     * $query->filterByFreq('%fooValue%'); // WHERE freq LIKE '%fooValue%'
     * </code>
     *
     * @param     string $freq The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByFreq($freq = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($freq)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $freq)) {
                $freq = str_replace('*', '%', $freq);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::FREQ, $freq, $comparison);
    }

    /**
     * Filter the query on the interval column
     *
     * Example usage:
     * <code>
     * $query->filterByInterval(1234); // WHERE interval = 1234
     * $query->filterByInterval(array(12, 34)); // WHERE interval IN (12, 34)
     * $query->filterByInterval(array('min' => 12)); // WHERE interval >= 12
     * $query->filterByInterval(array('max' => 12)); // WHERE interval <= 12
     * </code>
     *
     * @param     mixed $interval The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByInterval($interval = null, $comparison = null)
    {
        if (is_array($interval)) {
            $useMinMax = false;
            if (isset($interval['min'])) {
                $this->addUsingAlias(FrequencyPeer::INTERVAL, $interval['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($interval['max'])) {
                $this->addUsingAlias(FrequencyPeer::INTERVAL, $interval['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::INTERVAL, $interval, $comparison);
    }

    /**
     * Filter the query on the time_unit column
     *
     * Example usage:
     * <code>
     * $query->filterByTimeUnit('fooValue');   // WHERE time_unit = 'fooValue'
     * $query->filterByTimeUnit('%fooValue%'); // WHERE time_unit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $timeUnit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByTimeUnit($timeUnit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($timeUnit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $timeUnit)) {
                $timeUnit = str_replace('*', '%', $timeUnit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::TIME_UNIT, $timeUnit, $comparison);
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
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(FrequencyPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(FrequencyPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(FrequencyPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(FrequencyPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(FrequencyPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(FrequencyPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(FrequencyPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(FrequencyPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(FrequencyPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Biblio object
     *
     * @param   Biblio|PropelObjectCollection $biblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 FrequencyQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBiblio($biblio, $comparison = null)
    {
        if ($biblio instanceof Biblio) {
            return $this
                ->addUsingAlias(FrequencyPeer::ID_FREQ, $biblio->getIdFreq(), $comparison);
        } elseif ($biblio instanceof PropelObjectCollection) {
            return $this
                ->useBiblioQuery()
                ->filterByPrimaryKeys($biblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBiblio() only accepts arguments of type Biblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Biblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function joinBiblio($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Biblio');

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
            $this->addJoinObject($join, 'Biblio');
        }

        return $this;
    }

    /**
     * Use the Biblio relation Biblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BiblioQuery A secondary query class using the current class as primary query
     */
    public function useBiblioQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Biblio', '\DataDikdas\Model\BiblioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Frequency $frequency Object to remove from the list of results
     *
     * @return FrequencyQuery The current query, for fluid interface
     */
    public function prune($frequency = null)
    {
        if ($frequency) {
            $this->addUsingAlias(FrequencyPeer::ID_FREQ, $frequency->getIdFreq(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
