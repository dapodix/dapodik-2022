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
use DataDikdas\Model\Penghargaan;
use DataDikdas\Model\TingkatPenghargaan;
use DataDikdas\Model\TingkatPenghargaanPeer;
use DataDikdas\Model\TingkatPenghargaanQuery;

/**
 * Base class that represents a query for the 'ref.tingkat_penghargaan' table.
 *
 * 
 *
 * @method TingkatPenghargaanQuery orderByTingkatPenghargaanId($order = Criteria::ASC) Order by the tingkat_penghargaan_id column
 * @method TingkatPenghargaanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method TingkatPenghargaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TingkatPenghargaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TingkatPenghargaanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TingkatPenghargaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TingkatPenghargaanQuery groupByTingkatPenghargaanId() Group by the tingkat_penghargaan_id column
 * @method TingkatPenghargaanQuery groupByNama() Group by the nama column
 * @method TingkatPenghargaanQuery groupByCreateDate() Group by the create_date column
 * @method TingkatPenghargaanQuery groupByLastUpdate() Group by the last_update column
 * @method TingkatPenghargaanQuery groupByExpiredDate() Group by the expired_date column
 * @method TingkatPenghargaanQuery groupByLastSync() Group by the last_sync column
 *
 * @method TingkatPenghargaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TingkatPenghargaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TingkatPenghargaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TingkatPenghargaanQuery leftJoinPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Penghargaan relation
 * @method TingkatPenghargaanQuery rightJoinPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Penghargaan relation
 * @method TingkatPenghargaanQuery innerJoinPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Penghargaan relation
 *
 * @method TingkatPenghargaan findOne(PropelPDO $con = null) Return the first TingkatPenghargaan matching the query
 * @method TingkatPenghargaan findOneOrCreate(PropelPDO $con = null) Return the first TingkatPenghargaan matching the query, or a new TingkatPenghargaan object populated from the query conditions when no match is found
 *
 * @method TingkatPenghargaan findOneByNama(string $nama) Return the first TingkatPenghargaan filtered by the nama column
 * @method TingkatPenghargaan findOneByCreateDate(string $create_date) Return the first TingkatPenghargaan filtered by the create_date column
 * @method TingkatPenghargaan findOneByLastUpdate(string $last_update) Return the first TingkatPenghargaan filtered by the last_update column
 * @method TingkatPenghargaan findOneByExpiredDate(string $expired_date) Return the first TingkatPenghargaan filtered by the expired_date column
 * @method TingkatPenghargaan findOneByLastSync(string $last_sync) Return the first TingkatPenghargaan filtered by the last_sync column
 *
 * @method array findByTingkatPenghargaanId(int $tingkat_penghargaan_id) Return TingkatPenghargaan objects filtered by the tingkat_penghargaan_id column
 * @method array findByNama(string $nama) Return TingkatPenghargaan objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return TingkatPenghargaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TingkatPenghargaan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TingkatPenghargaan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TingkatPenghargaan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTingkatPenghargaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTingkatPenghargaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TingkatPenghargaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TingkatPenghargaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TingkatPenghargaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TingkatPenghargaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TingkatPenghargaanQuery) {
            return $criteria;
        }
        $query = new TingkatPenghargaanQuery();
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
     * @return   TingkatPenghargaan|TingkatPenghargaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TingkatPenghargaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TingkatPenghargaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TingkatPenghargaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTingkatPenghargaanId($key, $con = null)
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
     * @return                 TingkatPenghargaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "tingkat_penghargaan_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."tingkat_penghargaan" WHERE "tingkat_penghargaan_id" = :p0';
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
            $obj = new TingkatPenghargaan();
            $obj->hydrate($row);
            TingkatPenghargaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TingkatPenghargaan|TingkatPenghargaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TingkatPenghargaan[]|mixed the list of results, formatted by the current formatter
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tingkat_penghargaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPenghargaanId(1234); // WHERE tingkat_penghargaan_id = 1234
     * $query->filterByTingkatPenghargaanId(array(12, 34)); // WHERE tingkat_penghargaan_id IN (12, 34)
     * $query->filterByTingkatPenghargaanId(array('min' => 12)); // WHERE tingkat_penghargaan_id >= 12
     * $query->filterByTingkatPenghargaanId(array('max' => 12)); // WHERE tingkat_penghargaan_id <= 12
     * </code>
     *
     * @param     mixed $tingkatPenghargaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByTingkatPenghargaanId($tingkatPenghargaanId = null, $comparison = null)
    {
        if (is_array($tingkatPenghargaanId)) {
            $useMinMax = false;
            if (isset($tingkatPenghargaanId['min'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPenghargaanId['max'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId, $comparison);
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TingkatPenghargaanPeer::NAMA, $nama, $comparison);
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPenghargaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPenghargaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPenghargaanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TingkatPenghargaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPenghargaanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Penghargaan object
     *
     * @param   Penghargaan|PropelObjectCollection $penghargaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPenghargaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghargaan($penghargaan, $comparison = null)
    {
        if ($penghargaan instanceof Penghargaan) {
            return $this
                ->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $penghargaan->getTingkatPenghargaanId(), $comparison);
        } elseif ($penghargaan instanceof PropelObjectCollection) {
            return $this
                ->usePenghargaanQuery()
                ->filterByPrimaryKeys($penghargaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPenghargaan() only accepts arguments of type Penghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Penghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function joinPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Penghargaan');

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
            $this->addJoinObject($join, 'Penghargaan');
        }

        return $this;
    }

    /**
     * Use the Penghargaan relation Penghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghargaanQuery A secondary query class using the current class as primary query
     */
    public function usePenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Penghargaan', '\DataDikdas\Model\PenghargaanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TingkatPenghargaan $tingkatPenghargaan Object to remove from the list of results
     *
     * @return TingkatPenghargaanQuery The current query, for fluid interface
     */
    public function prune($tingkatPenghargaan = null)
    {
        if ($tingkatPenghargaan) {
            $this->addUsingAlias(TingkatPenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaan->getTingkatPenghargaanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
