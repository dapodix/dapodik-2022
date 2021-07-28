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
use DataDikdas\Model\BitterTable;
use DataDikdas\Model\BitterTablePeer;
use DataDikdas\Model\BitterTableQuery;

/**
 * Base class that represents a query for the 'bitter_table' table.
 *
 * 
 *
 * @method BitterTableQuery orderByBitterTableId($order = Criteria::ASC) Order by the bitter_table_id column
 * @method BitterTableQuery orderByParam1($order = Criteria::ASC) Order by the param_1 column
 * @method BitterTableQuery orderByParam2($order = Criteria::ASC) Order by the param_2 column
 * @method BitterTableQuery orderByParam3($order = Criteria::ASC) Order by the param_3 column
 * @method BitterTableQuery orderByParam4($order = Criteria::ASC) Order by the param_4 column
 * @method BitterTableQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BitterTableQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BitterTableQuery orderByCountUpdate($order = Criteria::ASC) Order by the count_update column
 * @method BitterTableQuery orderByParam5($order = Criteria::ASC) Order by the param_5 column
 * @method BitterTableQuery orderByParam6($order = Criteria::ASC) Order by the param_6 column
 *
 * @method BitterTableQuery groupByBitterTableId() Group by the bitter_table_id column
 * @method BitterTableQuery groupByParam1() Group by the param_1 column
 * @method BitterTableQuery groupByParam2() Group by the param_2 column
 * @method BitterTableQuery groupByParam3() Group by the param_3 column
 * @method BitterTableQuery groupByParam4() Group by the param_4 column
 * @method BitterTableQuery groupByCreateDate() Group by the create_date column
 * @method BitterTableQuery groupByLastUpdate() Group by the last_update column
 * @method BitterTableQuery groupByCountUpdate() Group by the count_update column
 * @method BitterTableQuery groupByParam5() Group by the param_5 column
 * @method BitterTableQuery groupByParam6() Group by the param_6 column
 *
 * @method BitterTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BitterTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BitterTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BitterTable findOne(PropelPDO $con = null) Return the first BitterTable matching the query
 * @method BitterTable findOneOrCreate(PropelPDO $con = null) Return the first BitterTable matching the query, or a new BitterTable object populated from the query conditions when no match is found
 *
 * @method BitterTable findOneByParam1(string $param_1) Return the first BitterTable filtered by the param_1 column
 * @method BitterTable findOneByParam2(int $param_2) Return the first BitterTable filtered by the param_2 column
 * @method BitterTable findOneByParam3(string $param_3) Return the first BitterTable filtered by the param_3 column
 * @method BitterTable findOneByParam4(string $param_4) Return the first BitterTable filtered by the param_4 column
 * @method BitterTable findOneByCreateDate(string $create_date) Return the first BitterTable filtered by the create_date column
 * @method BitterTable findOneByLastUpdate(string $last_update) Return the first BitterTable filtered by the last_update column
 * @method BitterTable findOneByCountUpdate(int $count_update) Return the first BitterTable filtered by the count_update column
 * @method BitterTable findOneByParam5(string $param_5) Return the first BitterTable filtered by the param_5 column
 * @method BitterTable findOneByParam6(string $param_6) Return the first BitterTable filtered by the param_6 column
 *
 * @method array findByBitterTableId(string $bitter_table_id) Return BitterTable objects filtered by the bitter_table_id column
 * @method array findByParam1(string $param_1) Return BitterTable objects filtered by the param_1 column
 * @method array findByParam2(int $param_2) Return BitterTable objects filtered by the param_2 column
 * @method array findByParam3(string $param_3) Return BitterTable objects filtered by the param_3 column
 * @method array findByParam4(string $param_4) Return BitterTable objects filtered by the param_4 column
 * @method array findByCreateDate(string $create_date) Return BitterTable objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BitterTable objects filtered by the last_update column
 * @method array findByCountUpdate(int $count_update) Return BitterTable objects filtered by the count_update column
 * @method array findByParam5(string $param_5) Return BitterTable objects filtered by the param_5 column
 * @method array findByParam6(string $param_6) Return BitterTable objects filtered by the param_6 column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBitterTableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBitterTableQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\BitterTable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BitterTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BitterTableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BitterTableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BitterTableQuery) {
            return $criteria;
        }
        $query = new BitterTableQuery();
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
     * @return   BitterTable|BitterTable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BitterTablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BitterTablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BitterTable A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBitterTableId($key, $con = null)
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
     * @return                 BitterTable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "bitter_table_id", "param_1", "param_2", "param_3", "param_4", "create_date", "last_update", "count_update", "param_5", "param_6" FROM "bitter_table" WHERE "bitter_table_id" = :p0';
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
            $obj = new BitterTable();
            $obj->hydrate($row);
            BitterTablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return BitterTable|BitterTable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BitterTable[]|mixed the list of results, formatted by the current formatter
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
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BitterTablePeer::BITTER_TABLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BitterTablePeer::BITTER_TABLE_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bitter_table_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBitterTableId('fooValue');   // WHERE bitter_table_id = 'fooValue'
     * $query->filterByBitterTableId('%fooValue%'); // WHERE bitter_table_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bitterTableId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByBitterTableId($bitterTableId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bitterTableId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bitterTableId)) {
                $bitterTableId = str_replace('*', '%', $bitterTableId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::BITTER_TABLE_ID, $bitterTableId, $comparison);
    }

    /**
     * Filter the query on the param_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam1('fooValue');   // WHERE param_1 = 'fooValue'
     * $query->filterByParam1('%fooValue%'); // WHERE param_1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $param1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam1($param1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($param1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $param1)) {
                $param1 = str_replace('*', '%', $param1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_1, $param1, $comparison);
    }

    /**
     * Filter the query on the param_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam2(1234); // WHERE param_2 = 1234
     * $query->filterByParam2(array(12, 34)); // WHERE param_2 IN (12, 34)
     * $query->filterByParam2(array('min' => 12)); // WHERE param_2 >= 12
     * $query->filterByParam2(array('max' => 12)); // WHERE param_2 <= 12
     * </code>
     *
     * @param     mixed $param2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam2($param2 = null, $comparison = null)
    {
        if (is_array($param2)) {
            $useMinMax = false;
            if (isset($param2['min'])) {
                $this->addUsingAlias(BitterTablePeer::PARAM_2, $param2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($param2['max'])) {
                $this->addUsingAlias(BitterTablePeer::PARAM_2, $param2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_2, $param2, $comparison);
    }

    /**
     * Filter the query on the param_3 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam3('fooValue');   // WHERE param_3 = 'fooValue'
     * $query->filterByParam3('%fooValue%'); // WHERE param_3 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $param3 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam3($param3 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($param3)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $param3)) {
                $param3 = str_replace('*', '%', $param3);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_3, $param3, $comparison);
    }

    /**
     * Filter the query on the param_4 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam4('fooValue');   // WHERE param_4 = 'fooValue'
     * $query->filterByParam4('%fooValue%'); // WHERE param_4 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $param4 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam4($param4 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($param4)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $param4)) {
                $param4 = str_replace('*', '%', $param4);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_4, $param4, $comparison);
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
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BitterTablePeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BitterTablePeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BitterTablePeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BitterTablePeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the count_update column
     *
     * Example usage:
     * <code>
     * $query->filterByCountUpdate(1234); // WHERE count_update = 1234
     * $query->filterByCountUpdate(array(12, 34)); // WHERE count_update IN (12, 34)
     * $query->filterByCountUpdate(array('min' => 12)); // WHERE count_update >= 12
     * $query->filterByCountUpdate(array('max' => 12)); // WHERE count_update <= 12
     * </code>
     *
     * @param     mixed $countUpdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByCountUpdate($countUpdate = null, $comparison = null)
    {
        if (is_array($countUpdate)) {
            $useMinMax = false;
            if (isset($countUpdate['min'])) {
                $this->addUsingAlias(BitterTablePeer::COUNT_UPDATE, $countUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($countUpdate['max'])) {
                $this->addUsingAlias(BitterTablePeer::COUNT_UPDATE, $countUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::COUNT_UPDATE, $countUpdate, $comparison);
    }

    /**
     * Filter the query on the param_5 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam5('fooValue');   // WHERE param_5 = 'fooValue'
     * $query->filterByParam5('%fooValue%'); // WHERE param_5 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $param5 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam5($param5 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($param5)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $param5)) {
                $param5 = str_replace('*', '%', $param5);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_5, $param5, $comparison);
    }

    /**
     * Filter the query on the param_6 column
     *
     * Example usage:
     * <code>
     * $query->filterByParam6('fooValue');   // WHERE param_6 = 'fooValue'
     * $query->filterByParam6('%fooValue%'); // WHERE param_6 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $param6 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function filterByParam6($param6 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($param6)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $param6)) {
                $param6 = str_replace('*', '%', $param6);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BitterTablePeer::PARAM_6, $param6, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   BitterTable $bitterTable Object to remove from the list of results
     *
     * @return BitterTableQuery The current query, for fluid interface
     */
    public function prune($bitterTable = null)
    {
        if ($bitterTable) {
            $this->addUsingAlias(BitterTablePeer::BITTER_TABLE_ID, $bitterTable->getBitterTableId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
