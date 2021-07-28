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
use DataDikdas\Model\KeahlianLaboratorium;
use DataDikdas\Model\KeahlianLaboratoriumPeer;
use DataDikdas\Model\KeahlianLaboratoriumQuery;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'ref.keahlian_laboratorium' table.
 *
 * 
 *
 * @method KeahlianLaboratoriumQuery orderByKeahlianLaboratoriumId($order = Criteria::ASC) Order by the keahlian_laboratorium_id column
 * @method KeahlianLaboratoriumQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method KeahlianLaboratoriumQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KeahlianLaboratoriumQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KeahlianLaboratoriumQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KeahlianLaboratoriumQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KeahlianLaboratoriumQuery groupByKeahlianLaboratoriumId() Group by the keahlian_laboratorium_id column
 * @method KeahlianLaboratoriumQuery groupByNama() Group by the nama column
 * @method KeahlianLaboratoriumQuery groupByCreateDate() Group by the create_date column
 * @method KeahlianLaboratoriumQuery groupByLastUpdate() Group by the last_update column
 * @method KeahlianLaboratoriumQuery groupByExpiredDate() Group by the expired_date column
 * @method KeahlianLaboratoriumQuery groupByLastSync() Group by the last_sync column
 *
 * @method KeahlianLaboratoriumQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KeahlianLaboratoriumQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KeahlianLaboratoriumQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KeahlianLaboratoriumQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method KeahlianLaboratoriumQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method KeahlianLaboratoriumQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method KeahlianLaboratorium findOne(PropelPDO $con = null) Return the first KeahlianLaboratorium matching the query
 * @method KeahlianLaboratorium findOneOrCreate(PropelPDO $con = null) Return the first KeahlianLaboratorium matching the query, or a new KeahlianLaboratorium object populated from the query conditions when no match is found
 *
 * @method KeahlianLaboratorium findOneByNama(string $nama) Return the first KeahlianLaboratorium filtered by the nama column
 * @method KeahlianLaboratorium findOneByCreateDate(string $create_date) Return the first KeahlianLaboratorium filtered by the create_date column
 * @method KeahlianLaboratorium findOneByLastUpdate(string $last_update) Return the first KeahlianLaboratorium filtered by the last_update column
 * @method KeahlianLaboratorium findOneByExpiredDate(string $expired_date) Return the first KeahlianLaboratorium filtered by the expired_date column
 * @method KeahlianLaboratorium findOneByLastSync(string $last_sync) Return the first KeahlianLaboratorium filtered by the last_sync column
 *
 * @method array findByKeahlianLaboratoriumId(int $keahlian_laboratorium_id) Return KeahlianLaboratorium objects filtered by the keahlian_laboratorium_id column
 * @method array findByNama(string $nama) Return KeahlianLaboratorium objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return KeahlianLaboratorium objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KeahlianLaboratorium objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return KeahlianLaboratorium objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return KeahlianLaboratorium objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKeahlianLaboratoriumQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKeahlianLaboratoriumQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KeahlianLaboratorium', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KeahlianLaboratoriumQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KeahlianLaboratoriumQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KeahlianLaboratoriumQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KeahlianLaboratoriumQuery) {
            return $criteria;
        }
        $query = new KeahlianLaboratoriumQuery();
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
     * @return   KeahlianLaboratorium|KeahlianLaboratorium[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KeahlianLaboratoriumPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KeahlianLaboratoriumPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KeahlianLaboratorium A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKeahlianLaboratoriumId($key, $con = null)
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
     * @return                 KeahlianLaboratorium A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "keahlian_laboratorium_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."keahlian_laboratorium" WHERE "keahlian_laboratorium_id" = :p0';
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
            $obj = new KeahlianLaboratorium();
            $obj->hydrate($row);
            KeahlianLaboratoriumPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KeahlianLaboratorium|KeahlianLaboratorium[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KeahlianLaboratorium[]|mixed the list of results, formatted by the current formatter
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the keahlian_laboratorium_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKeahlianLaboratoriumId(1234); // WHERE keahlian_laboratorium_id = 1234
     * $query->filterByKeahlianLaboratoriumId(array(12, 34)); // WHERE keahlian_laboratorium_id IN (12, 34)
     * $query->filterByKeahlianLaboratoriumId(array('min' => 12)); // WHERE keahlian_laboratorium_id >= 12
     * $query->filterByKeahlianLaboratoriumId(array('max' => 12)); // WHERE keahlian_laboratorium_id <= 12
     * </code>
     *
     * @param     mixed $keahlianLaboratoriumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByKeahlianLaboratoriumId($keahlianLaboratoriumId = null, $comparison = null)
    {
        if (is_array($keahlianLaboratoriumId)) {
            $useMinMax = false;
            if (isset($keahlianLaboratoriumId['min'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keahlianLaboratoriumId['max'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId, $comparison);
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::NAMA, $nama, $comparison);
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KeahlianLaboratoriumPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KeahlianLaboratoriumQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $ptk->getKeahlianLaboratoriumId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KeahlianLaboratorium $keahlianLaboratorium Object to remove from the list of results
     *
     * @return KeahlianLaboratoriumQuery The current query, for fluid interface
     */
    public function prune($keahlianLaboratorium = null)
    {
        if ($keahlianLaboratorium) {
            $this->addUsingAlias(KeahlianLaboratoriumPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratorium->getKeahlianLaboratoriumId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
