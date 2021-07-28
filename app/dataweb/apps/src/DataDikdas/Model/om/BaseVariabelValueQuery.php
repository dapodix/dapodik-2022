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
use DataDikdas\Model\Variabel;
use DataDikdas\Model\VariabelValue;
use DataDikdas\Model\VariabelValuePeer;
use DataDikdas\Model\VariabelValueQuery;

/**
 * Base class that represents a query for the 'variabel_value' table.
 *
 * 
 *
 * @method VariabelValueQuery orderByVariabelId($order = Criteria::ASC) Order by the variabel_id column
 * @method VariabelValueQuery orderByValueId($order = Criteria::ASC) Order by the value_id column
 * @method VariabelValueQuery orderByValueName($order = Criteria::ASC) Order by the value_name column
 * @method VariabelValueQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method VariabelValueQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method VariabelValueQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method VariabelValueQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method VariabelValueQuery groupByVariabelId() Group by the variabel_id column
 * @method VariabelValueQuery groupByValueId() Group by the value_id column
 * @method VariabelValueQuery groupByValueName() Group by the value_name column
 * @method VariabelValueQuery groupByCreateDate() Group by the create_date column
 * @method VariabelValueQuery groupByLastUpdate() Group by the last_update column
 * @method VariabelValueQuery groupByExpiredDate() Group by the expired_date column
 * @method VariabelValueQuery groupByLastSync() Group by the last_sync column
 *
 * @method VariabelValueQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method VariabelValueQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method VariabelValueQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method VariabelValueQuery leftJoinVariabel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Variabel relation
 * @method VariabelValueQuery rightJoinVariabel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Variabel relation
 * @method VariabelValueQuery innerJoinVariabel($relationAlias = null) Adds a INNER JOIN clause to the query using the Variabel relation
 *
 * @method VariabelValue findOne(PropelPDO $con = null) Return the first VariabelValue matching the query
 * @method VariabelValue findOneOrCreate(PropelPDO $con = null) Return the first VariabelValue matching the query, or a new VariabelValue object populated from the query conditions when no match is found
 *
 * @method VariabelValue findOneByVariabelId(string $variabel_id) Return the first VariabelValue filtered by the variabel_id column
 * @method VariabelValue findOneByValueId(int $value_id) Return the first VariabelValue filtered by the value_id column
 * @method VariabelValue findOneByValueName(string $value_name) Return the first VariabelValue filtered by the value_name column
 * @method VariabelValue findOneByCreateDate(string $create_date) Return the first VariabelValue filtered by the create_date column
 * @method VariabelValue findOneByLastUpdate(string $last_update) Return the first VariabelValue filtered by the last_update column
 * @method VariabelValue findOneByExpiredDate(string $expired_date) Return the first VariabelValue filtered by the expired_date column
 * @method VariabelValue findOneByLastSync(string $last_sync) Return the first VariabelValue filtered by the last_sync column
 *
 * @method array findByVariabelId(string $variabel_id) Return VariabelValue objects filtered by the variabel_id column
 * @method array findByValueId(int $value_id) Return VariabelValue objects filtered by the value_id column
 * @method array findByValueName(string $value_name) Return VariabelValue objects filtered by the value_name column
 * @method array findByCreateDate(string $create_date) Return VariabelValue objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return VariabelValue objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return VariabelValue objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return VariabelValue objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseVariabelValueQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseVariabelValueQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\VariabelValue', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new VariabelValueQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   VariabelValueQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return VariabelValueQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof VariabelValueQuery) {
            return $criteria;
        }
        $query = new VariabelValueQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$variabel_id, $value_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   VariabelValue|VariabelValue[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = VariabelValuePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(VariabelValuePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 VariabelValue A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "variabel_id", "value_id", "value_name", "create_date", "last_update", "expired_date", "last_sync" FROM "variabel_value" WHERE "variabel_id" = :p0 AND "value_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new VariabelValue();
            $obj->hydrate($row);
            VariabelValuePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return VariabelValue|VariabelValue[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|VariabelValue[]|mixed the list of results, formatted by the current formatter
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
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(VariabelValuePeer::VARIABEL_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(VariabelValuePeer::VALUE_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(VariabelValuePeer::VARIABEL_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(VariabelValuePeer::VALUE_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the variabel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVariabelId('fooValue');   // WHERE variabel_id = 'fooValue'
     * $query->filterByVariabelId('%fooValue%'); // WHERE variabel_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variabelId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByVariabelId($variabelId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variabelId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variabelId)) {
                $variabelId = str_replace('*', '%', $variabelId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::VARIABEL_ID, $variabelId, $comparison);
    }

    /**
     * Filter the query on the value_id column
     *
     * Example usage:
     * <code>
     * $query->filterByValueId(1234); // WHERE value_id = 1234
     * $query->filterByValueId(array(12, 34)); // WHERE value_id IN (12, 34)
     * $query->filterByValueId(array('min' => 12)); // WHERE value_id >= 12
     * $query->filterByValueId(array('max' => 12)); // WHERE value_id <= 12
     * </code>
     *
     * @param     mixed $valueId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByValueId($valueId = null, $comparison = null)
    {
        if (is_array($valueId)) {
            $useMinMax = false;
            if (isset($valueId['min'])) {
                $this->addUsingAlias(VariabelValuePeer::VALUE_ID, $valueId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valueId['max'])) {
                $this->addUsingAlias(VariabelValuePeer::VALUE_ID, $valueId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::VALUE_ID, $valueId, $comparison);
    }

    /**
     * Filter the query on the value_name column
     *
     * Example usage:
     * <code>
     * $query->filterByValueName('fooValue');   // WHERE value_name = 'fooValue'
     * $query->filterByValueName('%fooValue%'); // WHERE value_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $valueName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByValueName($valueName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($valueName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $valueName)) {
                $valueName = str_replace('*', '%', $valueName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::VALUE_NAME, $valueName, $comparison);
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
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(VariabelValuePeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(VariabelValuePeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::CREATE_DATE, $createDate, $comparison);
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
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(VariabelValuePeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(VariabelValuePeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(VariabelValuePeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(VariabelValuePeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(VariabelValuePeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(VariabelValuePeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(VariabelValuePeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Variabel object
     *
     * @param   Variabel|PropelObjectCollection $variabel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 VariabelValueQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVariabel($variabel, $comparison = null)
    {
        if ($variabel instanceof Variabel) {
            return $this
                ->addUsingAlias(VariabelValuePeer::VARIABEL_ID, $variabel->getVariabelId(), $comparison);
        } elseif ($variabel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(VariabelValuePeer::VARIABEL_ID, $variabel->toKeyValue('PrimaryKey', 'VariabelId'), $comparison);
        } else {
            throw new PropelException('filterByVariabel() only accepts arguments of type Variabel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Variabel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function joinVariabel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Variabel');

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
            $this->addJoinObject($join, 'Variabel');
        }

        return $this;
    }

    /**
     * Use the Variabel relation Variabel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VariabelQuery A secondary query class using the current class as primary query
     */
    public function useVariabelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVariabel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Variabel', '\DataDikdas\Model\VariabelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   VariabelValue $variabelValue Object to remove from the list of results
     *
     * @return VariabelValueQuery The current query, for fluid interface
     */
    public function prune($variabelValue = null)
    {
        if ($variabelValue) {
            $this->addCond('pruneCond0', $this->getAliasedColName(VariabelValuePeer::VARIABEL_ID), $variabelValue->getVariabelId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(VariabelValuePeer::VALUE_ID), $variabelValue->getValueId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
