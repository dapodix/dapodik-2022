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
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\JenisGugus;
use DataDikdas\Model\JenisGugusPeer;
use DataDikdas\Model\JenisGugusQuery;

/**
 * Base class that represents a query for the 'ref.jenis_gugus' table.
 *
 * 
 *
 * @method JenisGugusQuery orderByJenisGugusId($order = Criteria::ASC) Order by the jenis_gugus_id column
 * @method JenisGugusQuery orderByJenisGugus($order = Criteria::ASC) Order by the jenis_gugus column
 * @method JenisGugusQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisGugusQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisGugusQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisGugusQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisGugusQuery groupByJenisGugusId() Group by the jenis_gugus_id column
 * @method JenisGugusQuery groupByJenisGugus() Group by the jenis_gugus column
 * @method JenisGugusQuery groupByCreateDate() Group by the create_date column
 * @method JenisGugusQuery groupByLastUpdate() Group by the last_update column
 * @method JenisGugusQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisGugusQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisGugusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisGugusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisGugusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisGugusQuery leftJoinGugusSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the GugusSekolah relation
 * @method JenisGugusQuery rightJoinGugusSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GugusSekolah relation
 * @method JenisGugusQuery innerJoinGugusSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the GugusSekolah relation
 *
 * @method JenisGugus findOne(PropelPDO $con = null) Return the first JenisGugus matching the query
 * @method JenisGugus findOneOrCreate(PropelPDO $con = null) Return the first JenisGugus matching the query, or a new JenisGugus object populated from the query conditions when no match is found
 *
 * @method JenisGugus findOneByJenisGugus(string $jenis_gugus) Return the first JenisGugus filtered by the jenis_gugus column
 * @method JenisGugus findOneByCreateDate(string $create_date) Return the first JenisGugus filtered by the create_date column
 * @method JenisGugus findOneByLastUpdate(string $last_update) Return the first JenisGugus filtered by the last_update column
 * @method JenisGugus findOneByExpiredDate(string $expired_date) Return the first JenisGugus filtered by the expired_date column
 * @method JenisGugus findOneByLastSync(string $last_sync) Return the first JenisGugus filtered by the last_sync column
 *
 * @method array findByJenisGugusId(string $jenis_gugus_id) Return JenisGugus objects filtered by the jenis_gugus_id column
 * @method array findByJenisGugus(string $jenis_gugus) Return JenisGugus objects filtered by the jenis_gugus column
 * @method array findByCreateDate(string $create_date) Return JenisGugus objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisGugus objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisGugus objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisGugus objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisGugusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisGugusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisGugus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisGugusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisGugusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisGugusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisGugusQuery) {
            return $criteria;
        }
        $query = new JenisGugusQuery();
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
     * @return   JenisGugus|JenisGugus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisGugusPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisGugusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisGugus A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisGugusId($key, $con = null)
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
     * @return                 JenisGugus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_gugus_id", "jenis_gugus", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_gugus" WHERE "jenis_gugus_id" = :p0';
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
            $obj = new JenisGugus();
            $obj->hydrate($row);
            JenisGugusPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisGugus|JenisGugus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisGugus[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_gugus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisGugusId(1234); // WHERE jenis_gugus_id = 1234
     * $query->filterByJenisGugusId(array(12, 34)); // WHERE jenis_gugus_id IN (12, 34)
     * $query->filterByJenisGugusId(array('min' => 12)); // WHERE jenis_gugus_id >= 12
     * $query->filterByJenisGugusId(array('max' => 12)); // WHERE jenis_gugus_id <= 12
     * </code>
     *
     * @param     mixed $jenisGugusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByJenisGugusId($jenisGugusId = null, $comparison = null)
    {
        if (is_array($jenisGugusId)) {
            $useMinMax = false;
            if (isset($jenisGugusId['min'])) {
                $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $jenisGugusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisGugusId['max'])) {
                $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $jenisGugusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $jenisGugusId, $comparison);
    }

    /**
     * Filter the query on the jenis_gugus column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisGugus('fooValue');   // WHERE jenis_gugus = 'fooValue'
     * $query->filterByJenisGugus('%fooValue%'); // WHERE jenis_gugus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisGugus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByJenisGugus($jenisGugus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisGugus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisGugus)) {
                $jenisGugus = str_replace('*', '%', $jenisGugus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS, $jenisGugus, $comparison);
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
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisGugusPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisGugusPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisGugusPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisGugusPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisGugusPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisGugusPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisGugusPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisGugusPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisGugusPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related GugusSekolah object
     *
     * @param   GugusSekolah|PropelObjectCollection $gugusSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisGugusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGugusSekolah($gugusSekolah, $comparison = null)
    {
        if ($gugusSekolah instanceof GugusSekolah) {
            return $this
                ->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $gugusSekolah->getJenisGugusId(), $comparison);
        } elseif ($gugusSekolah instanceof PropelObjectCollection) {
            return $this
                ->useGugusSekolahQuery()
                ->filterByPrimaryKeys($gugusSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGugusSekolah() only accepts arguments of type GugusSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GugusSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function joinGugusSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GugusSekolah');

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
            $this->addJoinObject($join, 'GugusSekolah');
        }

        return $this;
    }

    /**
     * Use the GugusSekolah relation GugusSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GugusSekolahQuery A secondary query class using the current class as primary query
     */
    public function useGugusSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGugusSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GugusSekolah', '\DataDikdas\Model\GugusSekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisGugus $jenisGugus Object to remove from the list of results
     *
     * @return JenisGugusQuery The current query, for fluid interface
     */
    public function prune($jenisGugus = null)
    {
        if ($jenisGugus) {
            $this->addUsingAlias(JenisGugusPeer::JENIS_GUGUS_ID, $jenisGugus->getJenisGugusId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
