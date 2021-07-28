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
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\SumberDanaPeer;
use DataDikdas\Model\SumberDanaQuery;
use DataDikdas\Model\UnitUsahaKerjasama;

/**
 * Base class that represents a query for the 'ref.sumber_dana' table.
 *
 * 
 *
 * @method SumberDanaQuery orderBySumberDanaId($order = Criteria::ASC) Order by the sumber_dana_id column
 * @method SumberDanaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method SumberDanaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SumberDanaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SumberDanaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method SumberDanaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method SumberDanaQuery groupBySumberDanaId() Group by the sumber_dana_id column
 * @method SumberDanaQuery groupByNama() Group by the nama column
 * @method SumberDanaQuery groupByCreateDate() Group by the create_date column
 * @method SumberDanaQuery groupByLastUpdate() Group by the last_update column
 * @method SumberDanaQuery groupByExpiredDate() Group by the expired_date column
 * @method SumberDanaQuery groupByLastSync() Group by the last_sync column
 *
 * @method SumberDanaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SumberDanaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SumberDanaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SumberDanaQuery leftJoinBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blockgrant relation
 * @method SumberDanaQuery rightJoinBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blockgrant relation
 * @method SumberDanaQuery innerJoinBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the Blockgrant relation
 *
 * @method SumberDanaQuery leftJoinJenisBeasiswa($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisBeasiswa relation
 * @method SumberDanaQuery rightJoinJenisBeasiswa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisBeasiswa relation
 * @method SumberDanaQuery innerJoinJenisBeasiswa($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisBeasiswa relation
 *
 * @method SumberDanaQuery leftJoinUnitUsahaKerjasama($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method SumberDanaQuery rightJoinUnitUsahaKerjasama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method SumberDanaQuery innerJoinUnitUsahaKerjasama($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsahaKerjasama relation
 *
 * @method SumberDana findOne(PropelPDO $con = null) Return the first SumberDana matching the query
 * @method SumberDana findOneOrCreate(PropelPDO $con = null) Return the first SumberDana matching the query, or a new SumberDana object populated from the query conditions when no match is found
 *
 * @method SumberDana findOneByNama(string $nama) Return the first SumberDana filtered by the nama column
 * @method SumberDana findOneByCreateDate(string $create_date) Return the first SumberDana filtered by the create_date column
 * @method SumberDana findOneByLastUpdate(string $last_update) Return the first SumberDana filtered by the last_update column
 * @method SumberDana findOneByExpiredDate(string $expired_date) Return the first SumberDana filtered by the expired_date column
 * @method SumberDana findOneByLastSync(string $last_sync) Return the first SumberDana filtered by the last_sync column
 *
 * @method array findBySumberDanaId(string $sumber_dana_id) Return SumberDana objects filtered by the sumber_dana_id column
 * @method array findByNama(string $nama) Return SumberDana objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return SumberDana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return SumberDana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return SumberDana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return SumberDana objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSumberDanaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSumberDanaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SumberDana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SumberDanaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SumberDanaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SumberDanaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SumberDanaQuery) {
            return $criteria;
        }
        $query = new SumberDanaQuery();
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
     * @return   SumberDana|SumberDana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SumberDanaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SumberDanaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SumberDana A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySumberDanaId($key, $con = null)
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
     * @return                 SumberDana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sumber_dana_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."sumber_dana" WHERE "sumber_dana_id" = :p0';
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
            $obj = new SumberDana();
            $obj->hydrate($row);
            SumberDanaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SumberDana|SumberDana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SumberDana[]|mixed the list of results, formatted by the current formatter
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
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the sumber_dana_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDanaId(1234); // WHERE sumber_dana_id = 1234
     * $query->filterBySumberDanaId(array(12, 34)); // WHERE sumber_dana_id IN (12, 34)
     * $query->filterBySumberDanaId(array('min' => 12)); // WHERE sumber_dana_id >= 12
     * $query->filterBySumberDanaId(array('max' => 12)); // WHERE sumber_dana_id <= 12
     * </code>
     *
     * @param     mixed $sumberDanaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterBySumberDanaId($sumberDanaId = null, $comparison = null)
    {
        if (is_array($sumberDanaId)) {
            $useMinMax = false;
            if (isset($sumberDanaId['min'])) {
                $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $sumberDanaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberDanaId['max'])) {
                $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $sumberDanaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $sumberDanaId, $comparison);
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
     * @return SumberDanaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SumberDanaPeer::NAMA, $nama, $comparison);
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
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SumberDanaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SumberDanaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberDanaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SumberDanaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SumberDanaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberDanaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(SumberDanaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(SumberDanaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberDanaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SumberDanaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SumberDanaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SumberDanaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Blockgrant object
     *
     * @param   Blockgrant|PropelObjectCollection $blockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SumberDanaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlockgrant($blockgrant, $comparison = null)
    {
        if ($blockgrant instanceof Blockgrant) {
            return $this
                ->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $blockgrant->getSumberDanaId(), $comparison);
        } elseif ($blockgrant instanceof PropelObjectCollection) {
            return $this
                ->useBlockgrantQuery()
                ->filterByPrimaryKeys($blockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlockgrant() only accepts arguments of type Blockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Blockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function joinBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Blockgrant');

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
            $this->addJoinObject($join, 'Blockgrant');
        }

        return $this;
    }

    /**
     * Use the Blockgrant relation Blockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Blockgrant', '\DataDikdas\Model\BlockgrantQuery');
    }

    /**
     * Filter the query by a related JenisBeasiswa object
     *
     * @param   JenisBeasiswa|PropelObjectCollection $jenisBeasiswa  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SumberDanaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisBeasiswa($jenisBeasiswa, $comparison = null)
    {
        if ($jenisBeasiswa instanceof JenisBeasiswa) {
            return $this
                ->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $jenisBeasiswa->getSumberDanaId(), $comparison);
        } elseif ($jenisBeasiswa instanceof PropelObjectCollection) {
            return $this
                ->useJenisBeasiswaQuery()
                ->filterByPrimaryKeys($jenisBeasiswa->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJenisBeasiswa() only accepts arguments of type JenisBeasiswa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisBeasiswa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function joinJenisBeasiswa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisBeasiswa');

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
            $this->addJoinObject($join, 'JenisBeasiswa');
        }

        return $this;
    }

    /**
     * Use the JenisBeasiswa relation JenisBeasiswa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisBeasiswaQuery A secondary query class using the current class as primary query
     */
    public function useJenisBeasiswaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisBeasiswa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisBeasiswa', '\DataDikdas\Model\JenisBeasiswaQuery');
    }

    /**
     * Filter the query by a related UnitUsahaKerjasama object
     *
     * @param   UnitUsahaKerjasama|PropelObjectCollection $unitUsahaKerjasama  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SumberDanaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsahaKerjasama($unitUsahaKerjasama, $comparison = null)
    {
        if ($unitUsahaKerjasama instanceof UnitUsahaKerjasama) {
            return $this
                ->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $unitUsahaKerjasama->getSumberDanaId(), $comparison);
        } elseif ($unitUsahaKerjasama instanceof PropelObjectCollection) {
            return $this
                ->useUnitUsahaKerjasamaQuery()
                ->filterByPrimaryKeys($unitUsahaKerjasama->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUnitUsahaKerjasama() only accepts arguments of type UnitUsahaKerjasama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsahaKerjasama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function joinUnitUsahaKerjasama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsahaKerjasama');

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
            $this->addJoinObject($join, 'UnitUsahaKerjasama');
        }

        return $this;
    }

    /**
     * Use the UnitUsahaKerjasama relation UnitUsahaKerjasama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaKerjasamaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaKerjasamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsahaKerjasama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsahaKerjasama', '\DataDikdas\Model\UnitUsahaKerjasamaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SumberDana $sumberDana Object to remove from the list of results
     *
     * @return SumberDanaQuery The current query, for fluid interface
     */
    public function prune($sumberDana = null)
    {
        if ($sumberDana) {
            $this->addUsingAlias(SumberDanaPeer::SUMBER_DANA_ID, $sumberDana->getSumberDanaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
