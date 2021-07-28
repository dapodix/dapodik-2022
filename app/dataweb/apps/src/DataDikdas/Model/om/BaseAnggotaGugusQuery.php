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
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\AnggotaGugusPeer;
use DataDikdas\Model\AnggotaGugusQuery;
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'anggota_gugus' table.
 *
 * 
 *
 * @method AnggotaGugusQuery orderByGugusId($order = Criteria::ASC) Order by the gugus_id column
 * @method AnggotaGugusQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method AnggotaGugusQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AnggotaGugusQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AnggotaGugusQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AnggotaGugusQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AnggotaGugusQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AnggotaGugusQuery groupByGugusId() Group by the gugus_id column
 * @method AnggotaGugusQuery groupBySekolahId() Group by the sekolah_id column
 * @method AnggotaGugusQuery groupByCreateDate() Group by the create_date column
 * @method AnggotaGugusQuery groupByLastUpdate() Group by the last_update column
 * @method AnggotaGugusQuery groupBySoftDelete() Group by the soft_delete column
 * @method AnggotaGugusQuery groupByLastSync() Group by the last_sync column
 * @method AnggotaGugusQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AnggotaGugusQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AnggotaGugusQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AnggotaGugusQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AnggotaGugusQuery leftJoinGugusSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the GugusSekolah relation
 * @method AnggotaGugusQuery rightJoinGugusSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GugusSekolah relation
 * @method AnggotaGugusQuery innerJoinGugusSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the GugusSekolah relation
 *
 * @method AnggotaGugusQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method AnggotaGugusQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method AnggotaGugusQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method AnggotaGugus findOne(PropelPDO $con = null) Return the first AnggotaGugus matching the query
 * @method AnggotaGugus findOneOrCreate(PropelPDO $con = null) Return the first AnggotaGugus matching the query, or a new AnggotaGugus object populated from the query conditions when no match is found
 *
 * @method AnggotaGugus findOneByGugusId(string $gugus_id) Return the first AnggotaGugus filtered by the gugus_id column
 * @method AnggotaGugus findOneBySekolahId(string $sekolah_id) Return the first AnggotaGugus filtered by the sekolah_id column
 * @method AnggotaGugus findOneByCreateDate(string $create_date) Return the first AnggotaGugus filtered by the create_date column
 * @method AnggotaGugus findOneByLastUpdate(string $last_update) Return the first AnggotaGugus filtered by the last_update column
 * @method AnggotaGugus findOneBySoftDelete(string $soft_delete) Return the first AnggotaGugus filtered by the soft_delete column
 * @method AnggotaGugus findOneByLastSync(string $last_sync) Return the first AnggotaGugus filtered by the last_sync column
 * @method AnggotaGugus findOneByUpdaterId(string $updater_id) Return the first AnggotaGugus filtered by the updater_id column
 *
 * @method array findByGugusId(string $gugus_id) Return AnggotaGugus objects filtered by the gugus_id column
 * @method array findBySekolahId(string $sekolah_id) Return AnggotaGugus objects filtered by the sekolah_id column
 * @method array findByCreateDate(string $create_date) Return AnggotaGugus objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AnggotaGugus objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AnggotaGugus objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AnggotaGugus objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AnggotaGugus objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaGugusQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAnggotaGugusQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AnggotaGugus', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnggotaGugusQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AnggotaGugusQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnggotaGugusQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnggotaGugusQuery) {
            return $criteria;
        }
        $query = new AnggotaGugusQuery();
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
                         A Primary key composition: [$gugus_id, $sekolah_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   AnggotaGugus|AnggotaGugus[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnggotaGugusPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnggotaGugusPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaGugus A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "gugus_id", "sekolah_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "anggota_gugus" WHERE "gugus_id" = :p0 AND "sekolah_id" = :p1';
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
            $obj = new AnggotaGugus();
            $obj->hydrate($row);
            AnggotaGugusPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return AnggotaGugus|AnggotaGugus[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AnggotaGugus[]|mixed the list of results, formatted by the current formatter
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
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AnggotaGugusPeer::GUGUS_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AnggotaGugusPeer::SEKOLAH_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AnggotaGugusPeer::GUGUS_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AnggotaGugusPeer::SEKOLAH_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the gugus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGugusId('fooValue');   // WHERE gugus_id = 'fooValue'
     * $query->filterByGugusId('%fooValue%'); // WHERE gugus_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gugusId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByGugusId($gugusId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gugusId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gugusId)) {
                $gugusId = str_replace('*', '%', $gugusId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::GUGUS_ID, $gugusId, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AnggotaGugusPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AnggotaGugusPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AnggotaGugusPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AnggotaGugusPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AnggotaGugusPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AnggotaGugusPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AnggotaGugusPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AnggotaGugusPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaGugusPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related GugusSekolah object
     *
     * @param   GugusSekolah|PropelObjectCollection $gugusSekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaGugusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGugusSekolah($gugusSekolah, $comparison = null)
    {
        if ($gugusSekolah instanceof GugusSekolah) {
            return $this
                ->addUsingAlias(AnggotaGugusPeer::GUGUS_ID, $gugusSekolah->getGugusId(), $comparison);
        } elseif ($gugusSekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaGugusPeer::GUGUS_ID, $gugusSekolah->toKeyValue('PrimaryKey', 'GugusId'), $comparison);
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
     * @return AnggotaGugusQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaGugusQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(AnggotaGugusPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaGugusPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

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
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AnggotaGugus $anggotaGugus Object to remove from the list of results
     *
     * @return AnggotaGugusQuery The current query, for fluid interface
     */
    public function prune($anggotaGugus = null)
    {
        if ($anggotaGugus) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AnggotaGugusPeer::GUGUS_ID), $anggotaGugus->getGugusId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AnggotaGugusPeer::SEKOLAH_ID), $anggotaGugus->getSekolahId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
