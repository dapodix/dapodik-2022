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
use DataDikdas\Model\WsRoleColumn;
use DataDikdas\Model\WsRoleColumnPeer;
use DataDikdas\Model\WsRoleColumnQuery;
use DataDikdas\Model\WsRoleTable;

/**
 * Base class that represents a query for the 'ws_role_column' table.
 *
 * 
 *
 * @method WsRoleColumnQuery orderByRoleColumnId($order = Criteria::ASC) Order by the role_column_id column
 * @method WsRoleColumnQuery orderByRoleTableId($order = Criteria::ASC) Order by the role_table_id column
 * @method WsRoleColumnQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method WsRoleColumnQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method WsRoleColumnQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method WsRoleColumnQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method WsRoleColumnQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 * @method WsRoleColumnQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method WsRoleColumnQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 *
 * @method WsRoleColumnQuery groupByRoleColumnId() Group by the role_column_id column
 * @method WsRoleColumnQuery groupByRoleTableId() Group by the role_table_id column
 * @method WsRoleColumnQuery groupByAktif() Group by the aktif column
 * @method WsRoleColumnQuery groupByExpiredDate() Group by the expired_date column
 * @method WsRoleColumnQuery groupByCreateDate() Group by the create_date column
 * @method WsRoleColumnQuery groupByLastUpdate() Group by the last_update column
 * @method WsRoleColumnQuery groupByUpdaterId() Group by the updater_id column
 * @method WsRoleColumnQuery groupByLastSync() Group by the last_sync column
 * @method WsRoleColumnQuery groupBySoftDelete() Group by the soft_delete column
 *
 * @method WsRoleColumnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method WsRoleColumnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method WsRoleColumnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method WsRoleColumnQuery leftJoinWsRoleTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the WsRoleTable relation
 * @method WsRoleColumnQuery rightJoinWsRoleTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WsRoleTable relation
 * @method WsRoleColumnQuery innerJoinWsRoleTable($relationAlias = null) Adds a INNER JOIN clause to the query using the WsRoleTable relation
 *
 * @method WsRoleColumn findOne(PropelPDO $con = null) Return the first WsRoleColumn matching the query
 * @method WsRoleColumn findOneOrCreate(PropelPDO $con = null) Return the first WsRoleColumn matching the query, or a new WsRoleColumn object populated from the query conditions when no match is found
 *
 * @method WsRoleColumn findOneByRoleTableId(string $role_table_id) Return the first WsRoleColumn filtered by the role_table_id column
 * @method WsRoleColumn findOneByAktif(string $aktif) Return the first WsRoleColumn filtered by the aktif column
 * @method WsRoleColumn findOneByExpiredDate(string $expired_date) Return the first WsRoleColumn filtered by the expired_date column
 * @method WsRoleColumn findOneByCreateDate(string $create_date) Return the first WsRoleColumn filtered by the create_date column
 * @method WsRoleColumn findOneByLastUpdate(string $last_update) Return the first WsRoleColumn filtered by the last_update column
 * @method WsRoleColumn findOneByUpdaterId(string $updater_id) Return the first WsRoleColumn filtered by the updater_id column
 * @method WsRoleColumn findOneByLastSync(string $last_sync) Return the first WsRoleColumn filtered by the last_sync column
 * @method WsRoleColumn findOneBySoftDelete(int $soft_delete) Return the first WsRoleColumn filtered by the soft_delete column
 *
 * @method array findByRoleColumnId(string $role_column_id) Return WsRoleColumn objects filtered by the role_column_id column
 * @method array findByRoleTableId(string $role_table_id) Return WsRoleColumn objects filtered by the role_table_id column
 * @method array findByAktif(string $aktif) Return WsRoleColumn objects filtered by the aktif column
 * @method array findByExpiredDate(string $expired_date) Return WsRoleColumn objects filtered by the expired_date column
 * @method array findByCreateDate(string $create_date) Return WsRoleColumn objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return WsRoleColumn objects filtered by the last_update column
 * @method array findByUpdaterId(string $updater_id) Return WsRoleColumn objects filtered by the updater_id column
 * @method array findByLastSync(string $last_sync) Return WsRoleColumn objects filtered by the last_sync column
 * @method array findBySoftDelete(int $soft_delete) Return WsRoleColumn objects filtered by the soft_delete column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsRoleColumnQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseWsRoleColumnQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\WsRoleColumn', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new WsRoleColumnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   WsRoleColumnQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return WsRoleColumnQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof WsRoleColumnQuery) {
            return $criteria;
        }
        $query = new WsRoleColumnQuery();
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
     * @return   WsRoleColumn|WsRoleColumn[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WsRoleColumnPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(WsRoleColumnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WsRoleColumn A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRoleColumnId($key, $con = null)
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
     * @return                 WsRoleColumn A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "role_column_id", "role_table_id", "aktif", "expired_date", "create_date", "last_update", "updater_id", "last_sync", "soft_delete" FROM "ws_role_column" WHERE "role_column_id" = :p0';
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
            $obj = new WsRoleColumn();
            $obj->hydrate($row);
            WsRoleColumnPeer::addInstanceToPool($obj, (string) $key);
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
     * @return WsRoleColumn|WsRoleColumn[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|WsRoleColumn[]|mixed the list of results, formatted by the current formatter
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WsRoleColumnPeer::ROLE_COLUMN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WsRoleColumnPeer::ROLE_COLUMN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the role_column_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleColumnId('fooValue');   // WHERE role_column_id = 'fooValue'
     * $query->filterByRoleColumnId('%fooValue%'); // WHERE role_column_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roleColumnId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByRoleColumnId($roleColumnId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roleColumnId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $roleColumnId)) {
                $roleColumnId = str_replace('*', '%', $roleColumnId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::ROLE_COLUMN_ID, $roleColumnId, $comparison);
    }

    /**
     * Filter the query on the role_table_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleTableId('fooValue');   // WHERE role_table_id = 'fooValue'
     * $query->filterByRoleTableId('%fooValue%'); // WHERE role_table_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $roleTableId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByRoleTableId($roleTableId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($roleTableId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $roleTableId)) {
                $roleTableId = str_replace('*', '%', $roleTableId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::ROLE_TABLE_ID, $roleTableId, $comparison);
    }

    /**
     * Filter the query on the aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByAktif(1234); // WHERE aktif = 1234
     * $query->filterByAktif(array(12, 34)); // WHERE aktif IN (12, 34)
     * $query->filterByAktif(array('min' => 12)); // WHERE aktif >= 12
     * $query->filterByAktif(array('max' => 12)); // WHERE aktif <= 12
     * </code>
     *
     * @param     mixed $aktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::AKTIF, $aktif, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsRoleColumnPeer::UPDATER_ID, $updaterId, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(WsRoleColumnPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(WsRoleColumnPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleColumnPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query by a related WsRoleTable object
     *
     * @param   WsRoleTable|PropelObjectCollection $wsRoleTable The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 WsRoleColumnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWsRoleTable($wsRoleTable, $comparison = null)
    {
        if ($wsRoleTable instanceof WsRoleTable) {
            return $this
                ->addUsingAlias(WsRoleColumnPeer::ROLE_TABLE_ID, $wsRoleTable->getRoleTableId(), $comparison);
        } elseif ($wsRoleTable instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WsRoleColumnPeer::ROLE_TABLE_ID, $wsRoleTable->toKeyValue('PrimaryKey', 'RoleTableId'), $comparison);
        } else {
            throw new PropelException('filterByWsRoleTable() only accepts arguments of type WsRoleTable or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WsRoleTable relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function joinWsRoleTable($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WsRoleTable');

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
            $this->addJoinObject($join, 'WsRoleTable');
        }

        return $this;
    }

    /**
     * Use the WsRoleTable relation WsRoleTable object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\WsRoleTableQuery A secondary query class using the current class as primary query
     */
    public function useWsRoleTableQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWsRoleTable($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WsRoleTable', '\DataDikdas\Model\WsRoleTableQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   WsRoleColumn $wsRoleColumn Object to remove from the list of results
     *
     * @return WsRoleColumnQuery The current query, for fluid interface
     */
    public function prune($wsRoleColumn = null)
    {
        if ($wsRoleColumn) {
            $this->addUsingAlias(WsRoleColumnPeer::ROLE_COLUMN_ID, $wsRoleColumn->getRoleColumnId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
