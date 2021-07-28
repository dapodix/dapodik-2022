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
use DataDikdas\Model\BidangUsaha;
use DataDikdas\Model\BidangUsahaPeer;
use DataDikdas\Model\BidangUsahaQuery;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\TracerLulusan;

/**
 * Base class that represents a query for the 'ref.bidang_usaha' table.
 *
 * 
 *
 * @method BidangUsahaQuery orderByBidangUsahaId($order = Criteria::ASC) Order by the bidang_usaha_id column
 * @method BidangUsahaQuery orderByNamaBidangUsaha($order = Criteria::ASC) Order by the nama_bidang_usaha column
 * @method BidangUsahaQuery orderByLevelBidangUsaha($order = Criteria::ASC) Order by the level_bidang_usaha column
 * @method BidangUsahaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BidangUsahaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BidangUsahaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method BidangUsahaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method BidangUsahaQuery groupByBidangUsahaId() Group by the bidang_usaha_id column
 * @method BidangUsahaQuery groupByNamaBidangUsaha() Group by the nama_bidang_usaha column
 * @method BidangUsahaQuery groupByLevelBidangUsaha() Group by the level_bidang_usaha column
 * @method BidangUsahaQuery groupByCreateDate() Group by the create_date column
 * @method BidangUsahaQuery groupByLastUpdate() Group by the last_update column
 * @method BidangUsahaQuery groupByExpiredDate() Group by the expired_date column
 * @method BidangUsahaQuery groupByLastSync() Group by the last_sync column
 *
 * @method BidangUsahaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BidangUsahaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BidangUsahaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BidangUsahaQuery leftJoinDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dudi relation
 * @method BidangUsahaQuery rightJoinDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dudi relation
 * @method BidangUsahaQuery innerJoinDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the Dudi relation
 *
 * @method BidangUsahaQuery leftJoinTracerLulusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TracerLulusan relation
 * @method BidangUsahaQuery rightJoinTracerLulusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TracerLulusan relation
 * @method BidangUsahaQuery innerJoinTracerLulusan($relationAlias = null) Adds a INNER JOIN clause to the query using the TracerLulusan relation
 *
 * @method BidangUsaha findOne(PropelPDO $con = null) Return the first BidangUsaha matching the query
 * @method BidangUsaha findOneOrCreate(PropelPDO $con = null) Return the first BidangUsaha matching the query, or a new BidangUsaha object populated from the query conditions when no match is found
 *
 * @method BidangUsaha findOneByNamaBidangUsaha(string $nama_bidang_usaha) Return the first BidangUsaha filtered by the nama_bidang_usaha column
 * @method BidangUsaha findOneByLevelBidangUsaha(string $level_bidang_usaha) Return the first BidangUsaha filtered by the level_bidang_usaha column
 * @method BidangUsaha findOneByCreateDate(string $create_date) Return the first BidangUsaha filtered by the create_date column
 * @method BidangUsaha findOneByLastUpdate(string $last_update) Return the first BidangUsaha filtered by the last_update column
 * @method BidangUsaha findOneByExpiredDate(string $expired_date) Return the first BidangUsaha filtered by the expired_date column
 * @method BidangUsaha findOneByLastSync(string $last_sync) Return the first BidangUsaha filtered by the last_sync column
 *
 * @method array findByBidangUsahaId(string $bidang_usaha_id) Return BidangUsaha objects filtered by the bidang_usaha_id column
 * @method array findByNamaBidangUsaha(string $nama_bidang_usaha) Return BidangUsaha objects filtered by the nama_bidang_usaha column
 * @method array findByLevelBidangUsaha(string $level_bidang_usaha) Return BidangUsaha objects filtered by the level_bidang_usaha column
 * @method array findByCreateDate(string $create_date) Return BidangUsaha objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BidangUsaha objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return BidangUsaha objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return BidangUsaha objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBidangUsahaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBidangUsahaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BidangUsaha', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BidangUsahaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BidangUsahaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BidangUsahaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BidangUsahaQuery) {
            return $criteria;
        }
        $query = new BidangUsahaQuery();
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
     * @return   BidangUsaha|BidangUsaha[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BidangUsahaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BidangUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BidangUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBidangUsahaId($key, $con = null)
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
     * @return                 BidangUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "bidang_usaha_id", "nama_bidang_usaha", "level_bidang_usaha", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."bidang_usaha" WHERE "bidang_usaha_id" = :p0';
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
            $obj = new BidangUsaha();
            $obj->hydrate($row);
            BidangUsahaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BidangUsaha|BidangUsaha[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BidangUsaha[]|mixed the list of results, formatted by the current formatter
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
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the bidang_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangUsahaId('fooValue');   // WHERE bidang_usaha_id = 'fooValue'
     * $query->filterByBidangUsahaId('%fooValue%'); // WHERE bidang_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bidangUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByBidangUsahaId($bidangUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bidangUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bidangUsahaId)) {
                $bidangUsahaId = str_replace('*', '%', $bidangUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $bidangUsahaId, $comparison);
    }

    /**
     * Filter the query on the nama_bidang_usaha column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaBidangUsaha('fooValue');   // WHERE nama_bidang_usaha = 'fooValue'
     * $query->filterByNamaBidangUsaha('%fooValue%'); // WHERE nama_bidang_usaha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaBidangUsaha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByNamaBidangUsaha($namaBidangUsaha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaBidangUsaha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaBidangUsaha)) {
                $namaBidangUsaha = str_replace('*', '%', $namaBidangUsaha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::NAMA_BIDANG_USAHA, $namaBidangUsaha, $comparison);
    }

    /**
     * Filter the query on the level_bidang_usaha column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelBidangUsaha('fooValue');   // WHERE level_bidang_usaha = 'fooValue'
     * $query->filterByLevelBidangUsaha('%fooValue%'); // WHERE level_bidang_usaha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $levelBidangUsaha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByLevelBidangUsaha($levelBidangUsaha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($levelBidangUsaha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $levelBidangUsaha)) {
                $levelBidangUsaha = str_replace('*', '%', $levelBidangUsaha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::LEVEL_BIDANG_USAHA, $levelBidangUsaha, $comparison);
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
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BidangUsahaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BidangUsahaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BidangUsahaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BidangUsahaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(BidangUsahaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(BidangUsahaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BidangUsahaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BidangUsahaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangUsahaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Dudi object
     *
     * @param   Dudi|PropelObjectCollection $dudi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDudi($dudi, $comparison = null)
    {
        if ($dudi instanceof Dudi) {
            return $this
                ->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $dudi->getBidangUsahaId(), $comparison);
        } elseif ($dudi instanceof PropelObjectCollection) {
            return $this
                ->useDudiQuery()
                ->filterByPrimaryKeys($dudi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDudi() only accepts arguments of type Dudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function joinDudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dudi');

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
            $this->addJoinObject($join, 'Dudi');
        }

        return $this;
    }

    /**
     * Use the Dudi relation Dudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DudiQuery A secondary query class using the current class as primary query
     */
    public function useDudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dudi', '\DataDikdas\Model\DudiQuery');
    }

    /**
     * Filter the query by a related TracerLulusan object
     *
     * @param   TracerLulusan|PropelObjectCollection $tracerLulusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracerLulusan($tracerLulusan, $comparison = null)
    {
        if ($tracerLulusan instanceof TracerLulusan) {
            return $this
                ->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $tracerLulusan->getBidangUsahaId(), $comparison);
        } elseif ($tracerLulusan instanceof PropelObjectCollection) {
            return $this
                ->useTracerLulusanQuery()
                ->filterByPrimaryKeys($tracerLulusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTracerLulusan() only accepts arguments of type TracerLulusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TracerLulusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function joinTracerLulusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TracerLulusan');

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
            $this->addJoinObject($join, 'TracerLulusan');
        }

        return $this;
    }

    /**
     * Use the TracerLulusan relation TracerLulusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TracerLulusanQuery A secondary query class using the current class as primary query
     */
    public function useTracerLulusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTracerLulusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TracerLulusan', '\DataDikdas\Model\TracerLulusanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BidangUsaha $bidangUsaha Object to remove from the list of results
     *
     * @return BidangUsahaQuery The current query, for fluid interface
     */
    public function prune($bidangUsaha = null)
    {
        if ($bidangUsaha) {
            $this->addUsingAlias(BidangUsahaPeer::BIDANG_USAHA_ID, $bidangUsaha->getBidangUsahaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
