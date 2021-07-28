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
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanDariBlockgrant;
use DataDikdas\Model\AngkutanDariBlockgrantPeer;
use DataDikdas\Model\AngkutanDariBlockgrantQuery;
use DataDikdas\Model\Blockgrant;

/**
 * Base class that represents a query for the 'angkutan_dari_blockgrant' table.
 *
 * 
 *
 * @method AngkutanDariBlockgrantQuery orderByBlockgrantId($order = Criteria::ASC) Order by the blockgrant_id column
 * @method AngkutanDariBlockgrantQuery orderByIdAngkutan($order = Criteria::ASC) Order by the id_angkutan column
 * @method AngkutanDariBlockgrantQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AngkutanDariBlockgrantQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AngkutanDariBlockgrantQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AngkutanDariBlockgrantQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AngkutanDariBlockgrantQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AngkutanDariBlockgrantQuery groupByBlockgrantId() Group by the blockgrant_id column
 * @method AngkutanDariBlockgrantQuery groupByIdAngkutan() Group by the id_angkutan column
 * @method AngkutanDariBlockgrantQuery groupByCreateDate() Group by the create_date column
 * @method AngkutanDariBlockgrantQuery groupByLastUpdate() Group by the last_update column
 * @method AngkutanDariBlockgrantQuery groupBySoftDelete() Group by the soft_delete column
 * @method AngkutanDariBlockgrantQuery groupByLastSync() Group by the last_sync column
 * @method AngkutanDariBlockgrantQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AngkutanDariBlockgrantQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AngkutanDariBlockgrantQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AngkutanDariBlockgrantQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AngkutanDariBlockgrantQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method AngkutanDariBlockgrantQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method AngkutanDariBlockgrantQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method AngkutanDariBlockgrantQuery leftJoinBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blockgrant relation
 * @method AngkutanDariBlockgrantQuery rightJoinBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blockgrant relation
 * @method AngkutanDariBlockgrantQuery innerJoinBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the Blockgrant relation
 *
 * @method AngkutanDariBlockgrant findOne(PropelPDO $con = null) Return the first AngkutanDariBlockgrant matching the query
 * @method AngkutanDariBlockgrant findOneOrCreate(PropelPDO $con = null) Return the first AngkutanDariBlockgrant matching the query, or a new AngkutanDariBlockgrant object populated from the query conditions when no match is found
 *
 * @method AngkutanDariBlockgrant findOneByBlockgrantId(string $blockgrant_id) Return the first AngkutanDariBlockgrant filtered by the blockgrant_id column
 * @method AngkutanDariBlockgrant findOneByIdAngkutan(string $id_angkutan) Return the first AngkutanDariBlockgrant filtered by the id_angkutan column
 * @method AngkutanDariBlockgrant findOneByCreateDate(string $create_date) Return the first AngkutanDariBlockgrant filtered by the create_date column
 * @method AngkutanDariBlockgrant findOneByLastUpdate(string $last_update) Return the first AngkutanDariBlockgrant filtered by the last_update column
 * @method AngkutanDariBlockgrant findOneBySoftDelete(string $soft_delete) Return the first AngkutanDariBlockgrant filtered by the soft_delete column
 * @method AngkutanDariBlockgrant findOneByLastSync(string $last_sync) Return the first AngkutanDariBlockgrant filtered by the last_sync column
 * @method AngkutanDariBlockgrant findOneByUpdaterId(string $updater_id) Return the first AngkutanDariBlockgrant filtered by the updater_id column
 *
 * @method array findByBlockgrantId(string $blockgrant_id) Return AngkutanDariBlockgrant objects filtered by the blockgrant_id column
 * @method array findByIdAngkutan(string $id_angkutan) Return AngkutanDariBlockgrant objects filtered by the id_angkutan column
 * @method array findByCreateDate(string $create_date) Return AngkutanDariBlockgrant objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AngkutanDariBlockgrant objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AngkutanDariBlockgrant objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AngkutanDariBlockgrant objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AngkutanDariBlockgrant objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAngkutanDariBlockgrantQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAngkutanDariBlockgrantQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AngkutanDariBlockgrant', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AngkutanDariBlockgrantQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AngkutanDariBlockgrantQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AngkutanDariBlockgrantQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AngkutanDariBlockgrantQuery) {
            return $criteria;
        }
        $query = new AngkutanDariBlockgrantQuery();
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
                         A Primary key composition: [$blockgrant_id, $id_angkutan]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   AngkutanDariBlockgrant|AngkutanDariBlockgrant[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AngkutanDariBlockgrantPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AngkutanDariBlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AngkutanDariBlockgrant A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "blockgrant_id", "id_angkutan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "angkutan_dari_blockgrant" WHERE "blockgrant_id" = :p0 AND "id_angkutan" = :p1';
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
            $obj = new AngkutanDariBlockgrant();
            $obj->hydrate($row);
            AngkutanDariBlockgrantPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return AngkutanDariBlockgrant|AngkutanDariBlockgrant[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AngkutanDariBlockgrant[]|mixed the list of results, formatted by the current formatter
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AngkutanDariBlockgrantPeer::ID_ANGKUTAN, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AngkutanDariBlockgrantPeer::ID_ANGKUTAN, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the blockgrant_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlockgrantId('fooValue');   // WHERE blockgrant_id = 'fooValue'
     * $query->filterByBlockgrantId('%fooValue%'); // WHERE blockgrant_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blockgrantId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByBlockgrantId($blockgrantId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blockgrantId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blockgrantId)) {
                $blockgrantId = str_replace('*', '%', $blockgrantId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrantId, $comparison);
    }

    /**
     * Filter the query on the id_angkutan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAngkutan('fooValue');   // WHERE id_angkutan = 'fooValue'
     * $query->filterByIdAngkutan('%fooValue%'); // WHERE id_angkutan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAngkutan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByIdAngkutan($idAngkutan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAngkutan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAngkutan)) {
                $idAngkutan = str_replace('*', '%', $idAngkutan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::ID_ANGKUTAN, $idAngkutan, $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanDariBlockgrantPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Angkutan object
     *
     * @param   Angkutan|PropelObjectCollection $angkutan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanDariBlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(AngkutanDariBlockgrantPeer::ID_ANGKUTAN, $angkutan->getIdAngkutan(), $comparison);
        } elseif ($angkutan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanDariBlockgrantPeer::ID_ANGKUTAN, $angkutan->toKeyValue('PrimaryKey', 'IdAngkutan'), $comparison);
        } else {
            throw new PropelException('filterByAngkutan() only accepts arguments of type Angkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Angkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Angkutan');

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
            $this->addJoinObject($join, 'Angkutan');
        }

        return $this;
    }

    /**
     * Use the Angkutan relation Angkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related Blockgrant object
     *
     * @param   Blockgrant|PropelObjectCollection $blockgrant The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanDariBlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlockgrant($blockgrant, $comparison = null)
    {
        if ($blockgrant instanceof Blockgrant) {
            return $this
                ->addUsingAlias(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrant->getBlockgrantId(), $comparison);
        } elseif ($blockgrant instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrant->toKeyValue('PrimaryKey', 'BlockgrantId'), $comparison);
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
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   AngkutanDariBlockgrant $angkutanDariBlockgrant Object to remove from the list of results
     *
     * @return AngkutanDariBlockgrantQuery The current query, for fluid interface
     */
    public function prune($angkutanDariBlockgrant = null)
    {
        if ($angkutanDariBlockgrant) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AngkutanDariBlockgrantPeer::BLOCKGRANT_ID), $angkutanDariBlockgrant->getBlockgrantId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AngkutanDariBlockgrantPeer::ID_ANGKUTAN), $angkutanDariBlockgrant->getIdAngkutan(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
