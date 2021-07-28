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
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatDariBlockgrant;
use DataDikdas\Model\AlatDariBlockgrantPeer;
use DataDikdas\Model\AlatDariBlockgrantQuery;
use DataDikdas\Model\Blockgrant;

/**
 * Base class that represents a query for the 'alat_dari_blockgrant' table.
 *
 * 
 *
 * @method AlatDariBlockgrantQuery orderByBlockgrantId($order = Criteria::ASC) Order by the blockgrant_id column
 * @method AlatDariBlockgrantQuery orderByIdAlat($order = Criteria::ASC) Order by the id_alat column
 * @method AlatDariBlockgrantQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AlatDariBlockgrantQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AlatDariBlockgrantQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AlatDariBlockgrantQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AlatDariBlockgrantQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AlatDariBlockgrantQuery groupByBlockgrantId() Group by the blockgrant_id column
 * @method AlatDariBlockgrantQuery groupByIdAlat() Group by the id_alat column
 * @method AlatDariBlockgrantQuery groupByCreateDate() Group by the create_date column
 * @method AlatDariBlockgrantQuery groupByLastUpdate() Group by the last_update column
 * @method AlatDariBlockgrantQuery groupBySoftDelete() Group by the soft_delete column
 * @method AlatDariBlockgrantQuery groupByLastSync() Group by the last_sync column
 * @method AlatDariBlockgrantQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AlatDariBlockgrantQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlatDariBlockgrantQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlatDariBlockgrantQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlatDariBlockgrantQuery leftJoinBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blockgrant relation
 * @method AlatDariBlockgrantQuery rightJoinBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blockgrant relation
 * @method AlatDariBlockgrantQuery innerJoinBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the Blockgrant relation
 *
 * @method AlatDariBlockgrantQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method AlatDariBlockgrantQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method AlatDariBlockgrantQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method AlatDariBlockgrant findOne(PropelPDO $con = null) Return the first AlatDariBlockgrant matching the query
 * @method AlatDariBlockgrant findOneOrCreate(PropelPDO $con = null) Return the first AlatDariBlockgrant matching the query, or a new AlatDariBlockgrant object populated from the query conditions when no match is found
 *
 * @method AlatDariBlockgrant findOneByBlockgrantId(string $blockgrant_id) Return the first AlatDariBlockgrant filtered by the blockgrant_id column
 * @method AlatDariBlockgrant findOneByIdAlat(string $id_alat) Return the first AlatDariBlockgrant filtered by the id_alat column
 * @method AlatDariBlockgrant findOneByCreateDate(string $create_date) Return the first AlatDariBlockgrant filtered by the create_date column
 * @method AlatDariBlockgrant findOneByLastUpdate(string $last_update) Return the first AlatDariBlockgrant filtered by the last_update column
 * @method AlatDariBlockgrant findOneBySoftDelete(string $soft_delete) Return the first AlatDariBlockgrant filtered by the soft_delete column
 * @method AlatDariBlockgrant findOneByLastSync(string $last_sync) Return the first AlatDariBlockgrant filtered by the last_sync column
 * @method AlatDariBlockgrant findOneByUpdaterId(string $updater_id) Return the first AlatDariBlockgrant filtered by the updater_id column
 *
 * @method array findByBlockgrantId(string $blockgrant_id) Return AlatDariBlockgrant objects filtered by the blockgrant_id column
 * @method array findByIdAlat(string $id_alat) Return AlatDariBlockgrant objects filtered by the id_alat column
 * @method array findByCreateDate(string $create_date) Return AlatDariBlockgrant objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AlatDariBlockgrant objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AlatDariBlockgrant objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AlatDariBlockgrant objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AlatDariBlockgrant objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlatDariBlockgrantQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlatDariBlockgrantQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AlatDariBlockgrant', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlatDariBlockgrantQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlatDariBlockgrantQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlatDariBlockgrantQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlatDariBlockgrantQuery) {
            return $criteria;
        }
        $query = new AlatDariBlockgrantQuery();
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
                         A Primary key composition: [$blockgrant_id, $id_alat]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   AlatDariBlockgrant|AlatDariBlockgrant[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlatDariBlockgrantPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlatDariBlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AlatDariBlockgrant A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "blockgrant_id", "id_alat", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "alat_dari_blockgrant" WHERE "blockgrant_id" = :p0 AND "id_alat" = :p1';
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
            $obj = new AlatDariBlockgrant();
            $obj->hydrate($row);
            AlatDariBlockgrantPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return AlatDariBlockgrant|AlatDariBlockgrant[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AlatDariBlockgrant[]|mixed the list of results, formatted by the current formatter
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(AlatDariBlockgrantPeer::BLOCKGRANT_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(AlatDariBlockgrantPeer::ID_ALAT, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(AlatDariBlockgrantPeer::BLOCKGRANT_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(AlatDariBlockgrantPeer::ID_ALAT, $key[1], Criteria::EQUAL);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrantId, $comparison);
    }

    /**
     * Filter the query on the id_alat column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAlat('fooValue');   // WHERE id_alat = 'fooValue'
     * $query->filterByIdAlat('%fooValue%'); // WHERE id_alat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAlat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByIdAlat($idAlat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAlat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAlat)) {
                $idAlat = str_replace('*', '%', $idAlat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatDariBlockgrantPeer::ID_ALAT, $idAlat, $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatDariBlockgrantPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatDariBlockgrantPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatDariBlockgrantPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatDariBlockgrantPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Blockgrant object
     *
     * @param   Blockgrant|PropelObjectCollection $blockgrant The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatDariBlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlockgrant($blockgrant, $comparison = null)
    {
        if ($blockgrant instanceof Blockgrant) {
            return $this
                ->addUsingAlias(AlatDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrant->getBlockgrantId(), $comparison);
        } elseif ($blockgrant instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatDariBlockgrantPeer::BLOCKGRANT_ID, $blockgrant->toKeyValue('PrimaryKey', 'BlockgrantId'), $comparison);
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
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
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
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatDariBlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(AlatDariBlockgrantPeer::ID_ALAT, $alat->getIdAlat(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatDariBlockgrantPeer::ID_ALAT, $alat->toKeyValue('PrimaryKey', 'IdAlat'), $comparison);
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AlatDariBlockgrant $alatDariBlockgrant Object to remove from the list of results
     *
     * @return AlatDariBlockgrantQuery The current query, for fluid interface
     */
    public function prune($alatDariBlockgrant = null)
    {
        if ($alatDariBlockgrant) {
            $this->addCond('pruneCond0', $this->getAliasedColName(AlatDariBlockgrantPeer::BLOCKGRANT_ID), $alatDariBlockgrant->getBlockgrantId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(AlatDariBlockgrantPeer::ID_ALAT), $alatDariBlockgrant->getIdAlat(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
