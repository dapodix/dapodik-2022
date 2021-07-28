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
use DataDikdas\Model\LevelWilayah;
use DataDikdas\Model\LevelWilayahPeer;
use DataDikdas\Model\LevelWilayahQuery;
use DataDikdas\Model\MstWilayah;

/**
 * Base class that represents a query for the 'ref.level_wilayah' table.
 *
 * 
 *
 * @method LevelWilayahQuery orderByIdLevelWilayah($order = Criteria::ASC) Order by the id_level_wilayah column
 * @method LevelWilayahQuery orderByLevelWilayah($order = Criteria::ASC) Order by the level_wilayah column
 * @method LevelWilayahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LevelWilayahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LevelWilayahQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method LevelWilayahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method LevelWilayahQuery groupByIdLevelWilayah() Group by the id_level_wilayah column
 * @method LevelWilayahQuery groupByLevelWilayah() Group by the level_wilayah column
 * @method LevelWilayahQuery groupByCreateDate() Group by the create_date column
 * @method LevelWilayahQuery groupByLastUpdate() Group by the last_update column
 * @method LevelWilayahQuery groupByExpiredDate() Group by the expired_date column
 * @method LevelWilayahQuery groupByLastSync() Group by the last_sync column
 *
 * @method LevelWilayahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LevelWilayahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LevelWilayahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LevelWilayahQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method LevelWilayahQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method LevelWilayahQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method LevelWilayah findOne(PropelPDO $con = null) Return the first LevelWilayah matching the query
 * @method LevelWilayah findOneOrCreate(PropelPDO $con = null) Return the first LevelWilayah matching the query, or a new LevelWilayah object populated from the query conditions when no match is found
 *
 * @method LevelWilayah findOneByLevelWilayah(string $level_wilayah) Return the first LevelWilayah filtered by the level_wilayah column
 * @method LevelWilayah findOneByCreateDate(string $create_date) Return the first LevelWilayah filtered by the create_date column
 * @method LevelWilayah findOneByLastUpdate(string $last_update) Return the first LevelWilayah filtered by the last_update column
 * @method LevelWilayah findOneByExpiredDate(string $expired_date) Return the first LevelWilayah filtered by the expired_date column
 * @method LevelWilayah findOneByLastSync(string $last_sync) Return the first LevelWilayah filtered by the last_sync column
 *
 * @method array findByIdLevelWilayah(int $id_level_wilayah) Return LevelWilayah objects filtered by the id_level_wilayah column
 * @method array findByLevelWilayah(string $level_wilayah) Return LevelWilayah objects filtered by the level_wilayah column
 * @method array findByCreateDate(string $create_date) Return LevelWilayah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LevelWilayah objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return LevelWilayah objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return LevelWilayah objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLevelWilayahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLevelWilayahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LevelWilayah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LevelWilayahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LevelWilayahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LevelWilayahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LevelWilayahQuery) {
            return $criteria;
        }
        $query = new LevelWilayahQuery();
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
     * @return   LevelWilayah|LevelWilayah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LevelWilayahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LevelWilayahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LevelWilayah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLevelWilayah($key, $con = null)
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
     * @return                 LevelWilayah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_level_wilayah", "level_wilayah", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."level_wilayah" WHERE "id_level_wilayah" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new LevelWilayah();
            $obj->hydrate($row);
            LevelWilayahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LevelWilayah|LevelWilayah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LevelWilayah[]|mixed the list of results, formatted by the current formatter
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
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_level_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLevelWilayah(1234); // WHERE id_level_wilayah = 1234
     * $query->filterByIdLevelWilayah(array(12, 34)); // WHERE id_level_wilayah IN (12, 34)
     * $query->filterByIdLevelWilayah(array('min' => 12)); // WHERE id_level_wilayah >= 12
     * $query->filterByIdLevelWilayah(array('max' => 12)); // WHERE id_level_wilayah <= 12
     * </code>
     *
     * @param     mixed $idLevelWilayah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByIdLevelWilayah($idLevelWilayah = null, $comparison = null)
    {
        if (is_array($idLevelWilayah)) {
            $useMinMax = false;
            if (isset($idLevelWilayah['min'])) {
                $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLevelWilayah['max'])) {
                $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $idLevelWilayah, $comparison);
    }

    /**
     * Filter the query on the level_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelWilayah('fooValue');   // WHERE level_wilayah = 'fooValue'
     * $query->filterByLevelWilayah('%fooValue%'); // WHERE level_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $levelWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByLevelWilayah($levelWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($levelWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $levelWilayah)) {
                $levelWilayah = str_replace('*', '%', $levelWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::LEVEL_WILAYAH, $levelWilayah, $comparison);
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
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LevelWilayahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LevelWilayahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LevelWilayahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LevelWilayahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(LevelWilayahPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(LevelWilayahPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LevelWilayahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LevelWilayahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LevelWilayahPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LevelWilayahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $mstWilayah->getIdLevelWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            return $this
                ->useMstWilayahQuery()
                ->filterByPrimaryKeys($mstWilayah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LevelWilayah $levelWilayah Object to remove from the list of results
     *
     * @return LevelWilayahQuery The current query, for fluid interface
     */
    public function prune($levelWilayah = null)
    {
        if ($levelWilayah) {
            $this->addUsingAlias(LevelWilayahPeer::ID_LEVEL_WILAYAH, $levelWilayah->getIdLevelWilayah(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
