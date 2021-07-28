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
use DataDikdas\Model\JabatanFungsional;
use DataDikdas\Model\JabatanFungsionalPeer;
use DataDikdas\Model\JabatanFungsionalQuery;
use DataDikdas\Model\RwyFungsional;

/**
 * Base class that represents a query for the 'ref.jabatan_fungsional' table.
 *
 * 
 *
 * @method JabatanFungsionalQuery orderByJabatanFungsionalId($order = Criteria::ASC) Order by the jabatan_fungsional_id column
 * @method JabatanFungsionalQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JabatanFungsionalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JabatanFungsionalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JabatanFungsionalQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JabatanFungsionalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JabatanFungsionalQuery groupByJabatanFungsionalId() Group by the jabatan_fungsional_id column
 * @method JabatanFungsionalQuery groupByNama() Group by the nama column
 * @method JabatanFungsionalQuery groupByCreateDate() Group by the create_date column
 * @method JabatanFungsionalQuery groupByLastUpdate() Group by the last_update column
 * @method JabatanFungsionalQuery groupByExpiredDate() Group by the expired_date column
 * @method JabatanFungsionalQuery groupByLastSync() Group by the last_sync column
 *
 * @method JabatanFungsionalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JabatanFungsionalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JabatanFungsionalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JabatanFungsionalQuery leftJoinRwyFungsional($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyFungsional relation
 * @method JabatanFungsionalQuery rightJoinRwyFungsional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyFungsional relation
 * @method JabatanFungsionalQuery innerJoinRwyFungsional($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyFungsional relation
 *
 * @method JabatanFungsional findOne(PropelPDO $con = null) Return the first JabatanFungsional matching the query
 * @method JabatanFungsional findOneOrCreate(PropelPDO $con = null) Return the first JabatanFungsional matching the query, or a new JabatanFungsional object populated from the query conditions when no match is found
 *
 * @method JabatanFungsional findOneByNama(string $nama) Return the first JabatanFungsional filtered by the nama column
 * @method JabatanFungsional findOneByCreateDate(string $create_date) Return the first JabatanFungsional filtered by the create_date column
 * @method JabatanFungsional findOneByLastUpdate(string $last_update) Return the first JabatanFungsional filtered by the last_update column
 * @method JabatanFungsional findOneByExpiredDate(string $expired_date) Return the first JabatanFungsional filtered by the expired_date column
 * @method JabatanFungsional findOneByLastSync(string $last_sync) Return the first JabatanFungsional filtered by the last_sync column
 *
 * @method array findByJabatanFungsionalId(string $jabatan_fungsional_id) Return JabatanFungsional objects filtered by the jabatan_fungsional_id column
 * @method array findByNama(string $nama) Return JabatanFungsional objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return JabatanFungsional objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JabatanFungsional objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JabatanFungsional objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JabatanFungsional objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJabatanFungsionalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJabatanFungsionalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JabatanFungsional', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JabatanFungsionalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JabatanFungsionalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JabatanFungsionalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JabatanFungsionalQuery) {
            return $criteria;
        }
        $query = new JabatanFungsionalQuery();
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
     * @return   JabatanFungsional|JabatanFungsional[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JabatanFungsionalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JabatanFungsionalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JabatanFungsional A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJabatanFungsionalId($key, $con = null)
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
     * @return                 JabatanFungsional A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jabatan_fungsional_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jabatan_fungsional" WHERE "jabatan_fungsional_id" = :p0';
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
            $obj = new JabatanFungsional();
            $obj->hydrate($row);
            JabatanFungsionalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JabatanFungsional|JabatanFungsional[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JabatanFungsional[]|mixed the list of results, formatted by the current formatter
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jabatan_fungsional_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanFungsionalId(1234); // WHERE jabatan_fungsional_id = 1234
     * $query->filterByJabatanFungsionalId(array(12, 34)); // WHERE jabatan_fungsional_id IN (12, 34)
     * $query->filterByJabatanFungsionalId(array('min' => 12)); // WHERE jabatan_fungsional_id >= 12
     * $query->filterByJabatanFungsionalId(array('max' => 12)); // WHERE jabatan_fungsional_id <= 12
     * </code>
     *
     * @param     mixed $jabatanFungsionalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByJabatanFungsionalId($jabatanFungsionalId = null, $comparison = null)
    {
        if (is_array($jabatanFungsionalId)) {
            $useMinMax = false;
            if (isset($jabatanFungsionalId['min'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jabatanFungsionalId['max'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId, $comparison);
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JabatanFungsionalPeer::NAMA, $nama, $comparison);
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanFungsionalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanFungsionalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanFungsionalPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JabatanFungsionalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanFungsionalPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related RwyFungsional object
     *
     * @param   RwyFungsional|PropelObjectCollection $rwyFungsional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JabatanFungsionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyFungsional($rwyFungsional, $comparison = null)
    {
        if ($rwyFungsional instanceof RwyFungsional) {
            return $this
                ->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $rwyFungsional->getJabatanFungsionalId(), $comparison);
        } elseif ($rwyFungsional instanceof PropelObjectCollection) {
            return $this
                ->useRwyFungsionalQuery()
                ->filterByPrimaryKeys($rwyFungsional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyFungsional() only accepts arguments of type RwyFungsional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyFungsional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function joinRwyFungsional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyFungsional');

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
            $this->addJoinObject($join, 'RwyFungsional');
        }

        return $this;
    }

    /**
     * Use the RwyFungsional relation RwyFungsional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyFungsionalQuery A secondary query class using the current class as primary query
     */
    public function useRwyFungsionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyFungsional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyFungsional', '\DataDikdas\Model\RwyFungsionalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JabatanFungsional $jabatanFungsional Object to remove from the list of results
     *
     * @return JabatanFungsionalQuery The current query, for fluid interface
     */
    public function prune($jabatanFungsional = null)
    {
        if ($jabatanFungsional) {
            $this->addUsingAlias(JabatanFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsional->getJabatanFungsionalId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
