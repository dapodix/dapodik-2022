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
use DataDikdas\Model\Anak;
use DataDikdas\Model\StatusAnak;
use DataDikdas\Model\StatusAnakPeer;
use DataDikdas\Model\StatusAnakQuery;

/**
 * Base class that represents a query for the 'ref.status_anak' table.
 *
 * 
 *
 * @method StatusAnakQuery orderByStatusAnakId($order = Criteria::ASC) Order by the status_anak_id column
 * @method StatusAnakQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method StatusAnakQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method StatusAnakQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method StatusAnakQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method StatusAnakQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method StatusAnakQuery groupByStatusAnakId() Group by the status_anak_id column
 * @method StatusAnakQuery groupByNama() Group by the nama column
 * @method StatusAnakQuery groupByCreateDate() Group by the create_date column
 * @method StatusAnakQuery groupByLastUpdate() Group by the last_update column
 * @method StatusAnakQuery groupByExpiredDate() Group by the expired_date column
 * @method StatusAnakQuery groupByLastSync() Group by the last_sync column
 *
 * @method StatusAnakQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StatusAnakQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StatusAnakQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StatusAnakQuery leftJoinAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the Anak relation
 * @method StatusAnakQuery rightJoinAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Anak relation
 * @method StatusAnakQuery innerJoinAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the Anak relation
 *
 * @method StatusAnak findOne(PropelPDO $con = null) Return the first StatusAnak matching the query
 * @method StatusAnak findOneOrCreate(PropelPDO $con = null) Return the first StatusAnak matching the query, or a new StatusAnak object populated from the query conditions when no match is found
 *
 * @method StatusAnak findOneByNama(string $nama) Return the first StatusAnak filtered by the nama column
 * @method StatusAnak findOneByCreateDate(string $create_date) Return the first StatusAnak filtered by the create_date column
 * @method StatusAnak findOneByLastUpdate(string $last_update) Return the first StatusAnak filtered by the last_update column
 * @method StatusAnak findOneByExpiredDate(string $expired_date) Return the first StatusAnak filtered by the expired_date column
 * @method StatusAnak findOneByLastSync(string $last_sync) Return the first StatusAnak filtered by the last_sync column
 *
 * @method array findByStatusAnakId(string $status_anak_id) Return StatusAnak objects filtered by the status_anak_id column
 * @method array findByNama(string $nama) Return StatusAnak objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return StatusAnak objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return StatusAnak objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return StatusAnak objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return StatusAnak objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseStatusAnakQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStatusAnakQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\StatusAnak', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StatusAnakQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StatusAnakQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StatusAnakQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StatusAnakQuery) {
            return $criteria;
        }
        $query = new StatusAnakQuery();
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
     * @return   StatusAnak|StatusAnak[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StatusAnakPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StatusAnakPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StatusAnak A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByStatusAnakId($key, $con = null)
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
     * @return                 StatusAnak A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "status_anak_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."status_anak" WHERE "status_anak_id" = :p0';
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
            $obj = new StatusAnak();
            $obj->hydrate($row);
            StatusAnakPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StatusAnak|StatusAnak[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StatusAnak[]|mixed the list of results, formatted by the current formatter
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
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the status_anak_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusAnakId(1234); // WHERE status_anak_id = 1234
     * $query->filterByStatusAnakId(array(12, 34)); // WHERE status_anak_id IN (12, 34)
     * $query->filterByStatusAnakId(array('min' => 12)); // WHERE status_anak_id >= 12
     * $query->filterByStatusAnakId(array('max' => 12)); // WHERE status_anak_id <= 12
     * </code>
     *
     * @param     mixed $statusAnakId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByStatusAnakId($statusAnakId = null, $comparison = null)
    {
        if (is_array($statusAnakId)) {
            $useMinMax = false;
            if (isset($statusAnakId['min'])) {
                $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $statusAnakId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusAnakId['max'])) {
                $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $statusAnakId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $statusAnakId, $comparison);
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
     * @return StatusAnakQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StatusAnakPeer::NAMA, $nama, $comparison);
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
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(StatusAnakPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(StatusAnakPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusAnakPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(StatusAnakPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(StatusAnakPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusAnakPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(StatusAnakPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(StatusAnakPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusAnakPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(StatusAnakPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(StatusAnakPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusAnakPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Anak object
     *
     * @param   Anak|PropelObjectCollection $anak  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StatusAnakQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnak($anak, $comparison = null)
    {
        if ($anak instanceof Anak) {
            return $this
                ->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $anak->getStatusAnakId(), $comparison);
        } elseif ($anak instanceof PropelObjectCollection) {
            return $this
                ->useAnakQuery()
                ->filterByPrimaryKeys($anak->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnak() only accepts arguments of type Anak or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Anak relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function joinAnak($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Anak');

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
            $this->addJoinObject($join, 'Anak');
        }

        return $this;
    }

    /**
     * Use the Anak relation Anak object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnakQuery A secondary query class using the current class as primary query
     */
    public function useAnakQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnak($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Anak', '\DataDikdas\Model\AnakQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   StatusAnak $statusAnak Object to remove from the list of results
     *
     * @return StatusAnakQuery The current query, for fluid interface
     */
    public function prune($statusAnak = null)
    {
        if ($statusAnak) {
            $this->addUsingAlias(StatusAnakPeer::STATUS_ANAK_ID, $statusAnak->getStatusAnakId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
