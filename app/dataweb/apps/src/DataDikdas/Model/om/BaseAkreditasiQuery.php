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
use DataDikdas\Model\Akreditasi;
use DataDikdas\Model\AkreditasiPeer;
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiQuery;
use DataDikdas\Model\AkreditasiSp;

/**
 * Base class that represents a query for the 'ref.akreditasi' table.
 *
 * 
 *
 * @method AkreditasiQuery orderByAkreditasiId($order = Criteria::ASC) Order by the akreditasi_id column
 * @method AkreditasiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method AkreditasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AkreditasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AkreditasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method AkreditasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method AkreditasiQuery groupByAkreditasiId() Group by the akreditasi_id column
 * @method AkreditasiQuery groupByNama() Group by the nama column
 * @method AkreditasiQuery groupByCreateDate() Group by the create_date column
 * @method AkreditasiQuery groupByLastUpdate() Group by the last_update column
 * @method AkreditasiQuery groupByExpiredDate() Group by the expired_date column
 * @method AkreditasiQuery groupByLastSync() Group by the last_sync column
 *
 * @method AkreditasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AkreditasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AkreditasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AkreditasiQuery leftJoinAkreditasiProdi($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiProdi relation
 * @method AkreditasiQuery rightJoinAkreditasiProdi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiProdi relation
 * @method AkreditasiQuery innerJoinAkreditasiProdi($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiProdi relation
 *
 * @method AkreditasiQuery leftJoinAkreditasiSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiSp relation
 * @method AkreditasiQuery rightJoinAkreditasiSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiSp relation
 * @method AkreditasiQuery innerJoinAkreditasiSp($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiSp relation
 *
 * @method Akreditasi findOne(PropelPDO $con = null) Return the first Akreditasi matching the query
 * @method Akreditasi findOneOrCreate(PropelPDO $con = null) Return the first Akreditasi matching the query, or a new Akreditasi object populated from the query conditions when no match is found
 *
 * @method Akreditasi findOneByNama(string $nama) Return the first Akreditasi filtered by the nama column
 * @method Akreditasi findOneByCreateDate(string $create_date) Return the first Akreditasi filtered by the create_date column
 * @method Akreditasi findOneByLastUpdate(string $last_update) Return the first Akreditasi filtered by the last_update column
 * @method Akreditasi findOneByExpiredDate(string $expired_date) Return the first Akreditasi filtered by the expired_date column
 * @method Akreditasi findOneByLastSync(string $last_sync) Return the first Akreditasi filtered by the last_sync column
 *
 * @method array findByAkreditasiId(string $akreditasi_id) Return Akreditasi objects filtered by the akreditasi_id column
 * @method array findByNama(string $nama) Return Akreditasi objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return Akreditasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Akreditasi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Akreditasi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Akreditasi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAkreditasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Akreditasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AkreditasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AkreditasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AkreditasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AkreditasiQuery) {
            return $criteria;
        }
        $query = new AkreditasiQuery();
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
     * @return   Akreditasi|Akreditasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AkreditasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Akreditasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAkreditasiId($key, $con = null)
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
     * @return                 Akreditasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "akreditasi_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."akreditasi" WHERE "akreditasi_id" = :p0';
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
            $obj = new Akreditasi();
            $obj->hydrate($row);
            AkreditasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Akreditasi|Akreditasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Akreditasi[]|mixed the list of results, formatted by the current formatter
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
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the akreditasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAkreditasiId(1234); // WHERE akreditasi_id = 1234
     * $query->filterByAkreditasiId(array(12, 34)); // WHERE akreditasi_id IN (12, 34)
     * $query->filterByAkreditasiId(array('min' => 12)); // WHERE akreditasi_id >= 12
     * $query->filterByAkreditasiId(array('max' => 12)); // WHERE akreditasi_id <= 12
     * </code>
     *
     * @param     mixed $akreditasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByAkreditasiId($akreditasiId = null, $comparison = null)
    {
        if (is_array($akreditasiId)) {
            $useMinMax = false;
            if (isset($akreditasiId['min'])) {
                $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($akreditasiId['max'])) {
                $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasiId, $comparison);
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
     * @return AkreditasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiPeer::NAMA, $nama, $comparison);
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
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AkreditasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AkreditasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AkreditasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AkreditasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(AkreditasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(AkreditasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AkreditasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AkreditasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related AkreditasiProdi object
     *
     * @param   AkreditasiProdi|PropelObjectCollection $akreditasiProdi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiProdi($akreditasiProdi, $comparison = null)
    {
        if ($akreditasiProdi instanceof AkreditasiProdi) {
            return $this
                ->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasiProdi->getAkreditasiId(), $comparison);
        } elseif ($akreditasiProdi instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiProdiQuery()
                ->filterByPrimaryKeys($akreditasiProdi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiProdi() only accepts arguments of type AkreditasiProdi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiProdi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function joinAkreditasiProdi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiProdi');

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
            $this->addJoinObject($join, 'AkreditasiProdi');
        }

        return $this;
    }

    /**
     * Use the AkreditasiProdi relation AkreditasiProdi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiProdiQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiProdiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiProdi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiProdi', '\DataDikdas\Model\AkreditasiProdiQuery');
    }

    /**
     * Filter the query by a related AkreditasiSp object
     *
     * @param   AkreditasiSp|PropelObjectCollection $akreditasiSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiSp($akreditasiSp, $comparison = null)
    {
        if ($akreditasiSp instanceof AkreditasiSp) {
            return $this
                ->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasiSp->getAkreditasiId(), $comparison);
        } elseif ($akreditasiSp instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiSpQuery()
                ->filterByPrimaryKeys($akreditasiSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiSp() only accepts arguments of type AkreditasiSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function joinAkreditasiSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiSp');

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
            $this->addJoinObject($join, 'AkreditasiSp');
        }

        return $this;
    }

    /**
     * Use the AkreditasiSp relation AkreditasiSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiSpQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiSp', '\DataDikdas\Model\AkreditasiSpQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Akreditasi $akreditasi Object to remove from the list of results
     *
     * @return AkreditasiQuery The current query, for fluid interface
     */
    public function prune($akreditasi = null)
    {
        if ($akreditasi) {
            $this->addUsingAlias(AkreditasiPeer::AKREDITASI_ID, $akreditasi->getAkreditasiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
