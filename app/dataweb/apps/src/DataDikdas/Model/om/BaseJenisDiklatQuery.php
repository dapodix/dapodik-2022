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
use DataDikdas\Model\Diklat;
use DataDikdas\Model\JenisDiklat;
use DataDikdas\Model\JenisDiklatPeer;
use DataDikdas\Model\JenisDiklatQuery;

/**
 * Base class that represents a query for the 'ref.jenis_diklat' table.
 *
 * 
 *
 * @method JenisDiklatQuery orderByJenisDiklatId($order = Criteria::ASC) Order by the jenis_diklat_id column
 * @method JenisDiklatQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisDiklatQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisDiklatQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisDiklatQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisDiklatQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisDiklatQuery groupByJenisDiklatId() Group by the jenis_diklat_id column
 * @method JenisDiklatQuery groupByNama() Group by the nama column
 * @method JenisDiklatQuery groupByCreateDate() Group by the create_date column
 * @method JenisDiklatQuery groupByLastUpdate() Group by the last_update column
 * @method JenisDiklatQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisDiklatQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisDiklatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisDiklatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisDiklatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisDiklatQuery leftJoinDiklat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Diklat relation
 * @method JenisDiklatQuery rightJoinDiklat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Diklat relation
 * @method JenisDiklatQuery innerJoinDiklat($relationAlias = null) Adds a INNER JOIN clause to the query using the Diklat relation
 *
 * @method JenisDiklat findOne(PropelPDO $con = null) Return the first JenisDiklat matching the query
 * @method JenisDiklat findOneOrCreate(PropelPDO $con = null) Return the first JenisDiklat matching the query, or a new JenisDiklat object populated from the query conditions when no match is found
 *
 * @method JenisDiklat findOneByNama(string $nama) Return the first JenisDiklat filtered by the nama column
 * @method JenisDiklat findOneByCreateDate(string $create_date) Return the first JenisDiklat filtered by the create_date column
 * @method JenisDiklat findOneByLastUpdate(string $last_update) Return the first JenisDiklat filtered by the last_update column
 * @method JenisDiklat findOneByExpiredDate(string $expired_date) Return the first JenisDiklat filtered by the expired_date column
 * @method JenisDiklat findOneByLastSync(string $last_sync) Return the first JenisDiklat filtered by the last_sync column
 *
 * @method array findByJenisDiklatId(int $jenis_diklat_id) Return JenisDiklat objects filtered by the jenis_diklat_id column
 * @method array findByNama(string $nama) Return JenisDiklat objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return JenisDiklat objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisDiklat objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisDiklat objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisDiklat objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisDiklatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisDiklatQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisDiklat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisDiklatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisDiklatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisDiklatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisDiklatQuery) {
            return $criteria;
        }
        $query = new JenisDiklatQuery();
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
     * @return   JenisDiklat|JenisDiklat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisDiklatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisDiklatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisDiklat A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisDiklatId($key, $con = null)
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
     * @return                 JenisDiklat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_diklat_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_diklat" WHERE "jenis_diklat_id" = :p0';
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
            $obj = new JenisDiklat();
            $obj->hydrate($row);
            JenisDiklatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisDiklat|JenisDiklat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisDiklat[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_diklat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisDiklatId(1234); // WHERE jenis_diklat_id = 1234
     * $query->filterByJenisDiklatId(array(12, 34)); // WHERE jenis_diklat_id IN (12, 34)
     * $query->filterByJenisDiklatId(array('min' => 12)); // WHERE jenis_diklat_id >= 12
     * $query->filterByJenisDiklatId(array('max' => 12)); // WHERE jenis_diklat_id <= 12
     * </code>
     *
     * @param     mixed $jenisDiklatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByJenisDiklatId($jenisDiklatId = null, $comparison = null)
    {
        if (is_array($jenisDiklatId)) {
            $useMinMax = false;
            if (isset($jenisDiklatId['min'])) {
                $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisDiklatId['max'])) {
                $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId, $comparison);
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
     * @return JenisDiklatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisDiklatPeer::NAMA, $nama, $comparison);
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
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisDiklatPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisDiklatPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisDiklatPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisDiklatPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisDiklatPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisDiklatPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisDiklatPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisDiklatPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisDiklatPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisDiklatPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisDiklatPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisDiklatPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Diklat object
     *
     * @param   Diklat|PropelObjectCollection $diklat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisDiklatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiklat($diklat, $comparison = null)
    {
        if ($diklat instanceof Diklat) {
            return $this
                ->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $diklat->getJenisDiklatId(), $comparison);
        } elseif ($diklat instanceof PropelObjectCollection) {
            return $this
                ->useDiklatQuery()
                ->filterByPrimaryKeys($diklat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiklat() only accepts arguments of type Diklat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Diklat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function joinDiklat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Diklat');

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
            $this->addJoinObject($join, 'Diklat');
        }

        return $this;
    }

    /**
     * Use the Diklat relation Diklat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DiklatQuery A secondary query class using the current class as primary query
     */
    public function useDiklatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiklat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Diklat', '\DataDikdas\Model\DiklatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisDiklat $jenisDiklat Object to remove from the list of results
     *
     * @return JenisDiklatQuery The current query, for fluid interface
     */
    public function prune($jenisDiklat = null)
    {
        if ($jenisDiklat) {
            $this->addUsingAlias(JenisDiklatPeer::JENIS_DIKLAT_ID, $jenisDiklat->getJenisDiklatId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
