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
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\TetanggaKabkota;
use DataDikdas\Model\TetanggaKabkotaPeer;
use DataDikdas\Model\TetanggaKabkotaQuery;

/**
 * Base class that represents a query for the 'ref.tetangga_kabkota' table.
 *
 * 
 *
 * @method TetanggaKabkotaQuery orderByKodeWilayah1($order = Criteria::ASC) Order by the kode_wilayah1 column
 * @method TetanggaKabkotaQuery orderByKodeWilayah2($order = Criteria::ASC) Order by the kode_wilayah2 column
 * @method TetanggaKabkotaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TetanggaKabkotaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TetanggaKabkotaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TetanggaKabkotaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TetanggaKabkotaQuery groupByKodeWilayah1() Group by the kode_wilayah1 column
 * @method TetanggaKabkotaQuery groupByKodeWilayah2() Group by the kode_wilayah2 column
 * @method TetanggaKabkotaQuery groupByCreateDate() Group by the create_date column
 * @method TetanggaKabkotaQuery groupByLastUpdate() Group by the last_update column
 * @method TetanggaKabkotaQuery groupByExpiredDate() Group by the expired_date column
 * @method TetanggaKabkotaQuery groupByLastSync() Group by the last_sync column
 *
 * @method TetanggaKabkotaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TetanggaKabkotaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TetanggaKabkotaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TetanggaKabkotaQuery leftJoinMstWilayahRelatedByKodeWilayah1($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah1 relation
 * @method TetanggaKabkotaQuery rightJoinMstWilayahRelatedByKodeWilayah1($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah1 relation
 * @method TetanggaKabkotaQuery innerJoinMstWilayahRelatedByKodeWilayah1($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayahRelatedByKodeWilayah1 relation
 *
 * @method TetanggaKabkotaQuery leftJoinMstWilayahRelatedByKodeWilayah2($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah2 relation
 * @method TetanggaKabkotaQuery rightJoinMstWilayahRelatedByKodeWilayah2($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayahRelatedByKodeWilayah2 relation
 * @method TetanggaKabkotaQuery innerJoinMstWilayahRelatedByKodeWilayah2($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayahRelatedByKodeWilayah2 relation
 *
 * @method TetanggaKabkota findOne(PropelPDO $con = null) Return the first TetanggaKabkota matching the query
 * @method TetanggaKabkota findOneOrCreate(PropelPDO $con = null) Return the first TetanggaKabkota matching the query, or a new TetanggaKabkota object populated from the query conditions when no match is found
 *
 * @method TetanggaKabkota findOneByKodeWilayah1(string $kode_wilayah1) Return the first TetanggaKabkota filtered by the kode_wilayah1 column
 * @method TetanggaKabkota findOneByKodeWilayah2(string $kode_wilayah2) Return the first TetanggaKabkota filtered by the kode_wilayah2 column
 * @method TetanggaKabkota findOneByCreateDate(string $create_date) Return the first TetanggaKabkota filtered by the create_date column
 * @method TetanggaKabkota findOneByLastUpdate(string $last_update) Return the first TetanggaKabkota filtered by the last_update column
 * @method TetanggaKabkota findOneByExpiredDate(string $expired_date) Return the first TetanggaKabkota filtered by the expired_date column
 * @method TetanggaKabkota findOneByLastSync(string $last_sync) Return the first TetanggaKabkota filtered by the last_sync column
 *
 * @method array findByKodeWilayah1(string $kode_wilayah1) Return TetanggaKabkota objects filtered by the kode_wilayah1 column
 * @method array findByKodeWilayah2(string $kode_wilayah2) Return TetanggaKabkota objects filtered by the kode_wilayah2 column
 * @method array findByCreateDate(string $create_date) Return TetanggaKabkota objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TetanggaKabkota objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TetanggaKabkota objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TetanggaKabkota objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTetanggaKabkotaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTetanggaKabkotaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TetanggaKabkota', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TetanggaKabkotaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TetanggaKabkotaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TetanggaKabkotaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TetanggaKabkotaQuery) {
            return $criteria;
        }
        $query = new TetanggaKabkotaQuery();
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
                         A Primary key composition: [$kode_wilayah1, $kode_wilayah2]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TetanggaKabkota|TetanggaKabkota[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TetanggaKabkotaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TetanggaKabkotaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TetanggaKabkota A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kode_wilayah1", "kode_wilayah2", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."tetangga_kabkota" WHERE "kode_wilayah1" = :p0 AND "kode_wilayah2" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new TetanggaKabkota();
            $obj->hydrate($row);
            TetanggaKabkotaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return TetanggaKabkota|TetanggaKabkota[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TetanggaKabkota[]|mixed the list of results, formatted by the current formatter
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
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH1, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH2, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TetanggaKabkotaPeer::KODE_WILAYAH1, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TetanggaKabkotaPeer::KODE_WILAYAH2, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the kode_wilayah1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah1('fooValue');   // WHERE kode_wilayah1 = 'fooValue'
     * $query->filterByKodeWilayah1('%fooValue%'); // WHERE kode_wilayah1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah1($kodeWilayah1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah1)) {
                $kodeWilayah1 = str_replace('*', '%', $kodeWilayah1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH1, $kodeWilayah1, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah2 column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah2('fooValue');   // WHERE kode_wilayah2 = 'fooValue'
     * $query->filterByKodeWilayah2('%fooValue%'); // WHERE kode_wilayah2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah2($kodeWilayah2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah2)) {
                $kodeWilayah2 = str_replace('*', '%', $kodeWilayah2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH2, $kodeWilayah2, $comparison);
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
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TetanggaKabkotaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TetanggaKabkotaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TetanggaKabkotaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayahRelatedByKodeWilayah1($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH1, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH1, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayahRelatedByKodeWilayah1() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayahRelatedByKodeWilayah1 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function joinMstWilayahRelatedByKodeWilayah1($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayahRelatedByKodeWilayah1');

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
            $this->addJoinObject($join, 'MstWilayahRelatedByKodeWilayah1');
        }

        return $this;
    }

    /**
     * Use the MstWilayahRelatedByKodeWilayah1 relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahRelatedByKodeWilayah1Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayahRelatedByKodeWilayah1($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayahRelatedByKodeWilayah1', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TetanggaKabkotaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayahRelatedByKodeWilayah2($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH2, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TetanggaKabkotaPeer::KODE_WILAYAH2, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayahRelatedByKodeWilayah2() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayahRelatedByKodeWilayah2 relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function joinMstWilayahRelatedByKodeWilayah2($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayahRelatedByKodeWilayah2');

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
            $this->addJoinObject($join, 'MstWilayahRelatedByKodeWilayah2');
        }

        return $this;
    }

    /**
     * Use the MstWilayahRelatedByKodeWilayah2 relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahRelatedByKodeWilayah2Query($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayahRelatedByKodeWilayah2($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayahRelatedByKodeWilayah2', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TetanggaKabkota $tetanggaKabkota Object to remove from the list of results
     *
     * @return TetanggaKabkotaQuery The current query, for fluid interface
     */
    public function prune($tetanggaKabkota = null)
    {
        if ($tetanggaKabkota) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TetanggaKabkotaPeer::KODE_WILAYAH1), $tetanggaKabkota->getKodeWilayah1(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TetanggaKabkotaPeer::KODE_WILAYAH2), $tetanggaKabkota->getKodeWilayah2(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
