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
use DataDikdas\Model\WsAplikasi;
use DataDikdas\Model\WsRoleColumn;
use DataDikdas\Model\WsRoleTable;
use DataDikdas\Model\WsRoleTablePeer;
use DataDikdas\Model\WsRoleTableQuery;

/**
 * Base class that represents a query for the 'ws_role_table' table.
 *
 * 
 *
 * @method WsRoleTableQuery orderByRoleTableId($order = Criteria::ASC) Order by the role_table_id column
 * @method WsRoleTableQuery orderByAplikasiId($order = Criteria::ASC) Order by the aplikasi_id column
 * @method WsRoleTableQuery orderByRoleRead($order = Criteria::ASC) Order by the role_read column
 * @method WsRoleTableQuery orderByRoleCreate($order = Criteria::ASC) Order by the role_create column
 * @method WsRoleTableQuery orderByRoleUpdate($order = Criteria::ASC) Order by the role_update column
 * @method WsRoleTableQuery orderByRoleDelete($order = Criteria::ASC) Order by the role_delete column
 * @method WsRoleTableQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method WsRoleTableQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method WsRoleTableQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method WsRoleTableQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method WsRoleTableQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method WsRoleTableQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 * @method WsRoleTableQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method WsRoleTableQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method WsRoleTableQuery orderByNamaTable($order = Criteria::ASC) Order by the nama_table column
 * @method WsRoleTableQuery orderByNamaAlias($order = Criteria::ASC) Order by the nama_alias column
 *
 * @method WsRoleTableQuery groupByRoleTableId() Group by the role_table_id column
 * @method WsRoleTableQuery groupByAplikasiId() Group by the aplikasi_id column
 * @method WsRoleTableQuery groupByRoleRead() Group by the role_read column
 * @method WsRoleTableQuery groupByRoleCreate() Group by the role_create column
 * @method WsRoleTableQuery groupByRoleUpdate() Group by the role_update column
 * @method WsRoleTableQuery groupByRoleDelete() Group by the role_delete column
 * @method WsRoleTableQuery groupByAsalData() Group by the asal_data column
 * @method WsRoleTableQuery groupByAktif() Group by the aktif column
 * @method WsRoleTableQuery groupByExpiredDate() Group by the expired_date column
 * @method WsRoleTableQuery groupByCreateDate() Group by the create_date column
 * @method WsRoleTableQuery groupByLastUpdate() Group by the last_update column
 * @method WsRoleTableQuery groupByUpdaterId() Group by the updater_id column
 * @method WsRoleTableQuery groupByLastSync() Group by the last_sync column
 * @method WsRoleTableQuery groupBySoftDelete() Group by the soft_delete column
 * @method WsRoleTableQuery groupByNamaTable() Group by the nama_table column
 * @method WsRoleTableQuery groupByNamaAlias() Group by the nama_alias column
 *
 * @method WsRoleTableQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method WsRoleTableQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method WsRoleTableQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method WsRoleTableQuery leftJoinWsAplikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the WsAplikasi relation
 * @method WsRoleTableQuery rightJoinWsAplikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WsAplikasi relation
 * @method WsRoleTableQuery innerJoinWsAplikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the WsAplikasi relation
 *
 * @method WsRoleTableQuery leftJoinWsRoleColumn($relationAlias = null) Adds a LEFT JOIN clause to the query using the WsRoleColumn relation
 * @method WsRoleTableQuery rightJoinWsRoleColumn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WsRoleColumn relation
 * @method WsRoleTableQuery innerJoinWsRoleColumn($relationAlias = null) Adds a INNER JOIN clause to the query using the WsRoleColumn relation
 *
 * @method WsRoleTable findOne(PropelPDO $con = null) Return the first WsRoleTable matching the query
 * @method WsRoleTable findOneOrCreate(PropelPDO $con = null) Return the first WsRoleTable matching the query, or a new WsRoleTable object populated from the query conditions when no match is found
 *
 * @method WsRoleTable findOneByAplikasiId(string $aplikasi_id) Return the first WsRoleTable filtered by the aplikasi_id column
 * @method WsRoleTable findOneByRoleRead(string $role_read) Return the first WsRoleTable filtered by the role_read column
 * @method WsRoleTable findOneByRoleCreate(string $role_create) Return the first WsRoleTable filtered by the role_create column
 * @method WsRoleTable findOneByRoleUpdate(string $role_update) Return the first WsRoleTable filtered by the role_update column
 * @method WsRoleTable findOneByRoleDelete(string $role_delete) Return the first WsRoleTable filtered by the role_delete column
 * @method WsRoleTable findOneByAsalData(string $asal_data) Return the first WsRoleTable filtered by the asal_data column
 * @method WsRoleTable findOneByAktif(string $aktif) Return the first WsRoleTable filtered by the aktif column
 * @method WsRoleTable findOneByExpiredDate(string $expired_date) Return the first WsRoleTable filtered by the expired_date column
 * @method WsRoleTable findOneByCreateDate(string $create_date) Return the first WsRoleTable filtered by the create_date column
 * @method WsRoleTable findOneByLastUpdate(string $last_update) Return the first WsRoleTable filtered by the last_update column
 * @method WsRoleTable findOneByUpdaterId(string $updater_id) Return the first WsRoleTable filtered by the updater_id column
 * @method WsRoleTable findOneByLastSync(string $last_sync) Return the first WsRoleTable filtered by the last_sync column
 * @method WsRoleTable findOneBySoftDelete(int $soft_delete) Return the first WsRoleTable filtered by the soft_delete column
 * @method WsRoleTable findOneByNamaTable(string $nama_table) Return the first WsRoleTable filtered by the nama_table column
 * @method WsRoleTable findOneByNamaAlias(string $nama_alias) Return the first WsRoleTable filtered by the nama_alias column
 *
 * @method array findByRoleTableId(string $role_table_id) Return WsRoleTable objects filtered by the role_table_id column
 * @method array findByAplikasiId(string $aplikasi_id) Return WsRoleTable objects filtered by the aplikasi_id column
 * @method array findByRoleRead(string $role_read) Return WsRoleTable objects filtered by the role_read column
 * @method array findByRoleCreate(string $role_create) Return WsRoleTable objects filtered by the role_create column
 * @method array findByRoleUpdate(string $role_update) Return WsRoleTable objects filtered by the role_update column
 * @method array findByRoleDelete(string $role_delete) Return WsRoleTable objects filtered by the role_delete column
 * @method array findByAsalData(string $asal_data) Return WsRoleTable objects filtered by the asal_data column
 * @method array findByAktif(string $aktif) Return WsRoleTable objects filtered by the aktif column
 * @method array findByExpiredDate(string $expired_date) Return WsRoleTable objects filtered by the expired_date column
 * @method array findByCreateDate(string $create_date) Return WsRoleTable objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return WsRoleTable objects filtered by the last_update column
 * @method array findByUpdaterId(string $updater_id) Return WsRoleTable objects filtered by the updater_id column
 * @method array findByLastSync(string $last_sync) Return WsRoleTable objects filtered by the last_sync column
 * @method array findBySoftDelete(int $soft_delete) Return WsRoleTable objects filtered by the soft_delete column
 * @method array findByNamaTable(string $nama_table) Return WsRoleTable objects filtered by the nama_table column
 * @method array findByNamaAlias(string $nama_alias) Return WsRoleTable objects filtered by the nama_alias column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsRoleTableQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseWsRoleTableQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\WsRoleTable', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new WsRoleTableQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   WsRoleTableQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return WsRoleTableQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof WsRoleTableQuery) {
            return $criteria;
        }
        $query = new WsRoleTableQuery();
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
     * @return   WsRoleTable|WsRoleTable[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WsRoleTablePeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(WsRoleTablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WsRoleTable A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRoleTableId($key, $con = null)
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
     * @return                 WsRoleTable A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "role_table_id", "aplikasi_id", "role_read", "role_create", "role_update", "role_delete", "asal_data", "aktif", "expired_date", "create_date", "last_update", "updater_id", "last_sync", "soft_delete", "nama_table", "nama_alias" FROM "ws_role_table" WHERE "role_table_id" = :p0';
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
            $obj = new WsRoleTable();
            $obj->hydrate($row);
            WsRoleTablePeer::addInstanceToPool($obj, (string) $key);
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
     * @return WsRoleTable|WsRoleTable[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|WsRoleTable[]|mixed the list of results, formatted by the current formatter
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_TABLE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_TABLE_ID, $keys, Criteria::IN);
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
     * @return WsRoleTableQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_TABLE_ID, $roleTableId, $comparison);
    }

    /**
     * Filter the query on the aplikasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAplikasiId('fooValue');   // WHERE aplikasi_id = 'fooValue'
     * $query->filterByAplikasiId('%fooValue%'); // WHERE aplikasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aplikasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByAplikasiId($aplikasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aplikasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $aplikasiId)) {
                $aplikasiId = str_replace('*', '%', $aplikasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::APLIKASI_ID, $aplikasiId, $comparison);
    }

    /**
     * Filter the query on the role_read column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleRead(1234); // WHERE role_read = 1234
     * $query->filterByRoleRead(array(12, 34)); // WHERE role_read IN (12, 34)
     * $query->filterByRoleRead(array('min' => 12)); // WHERE role_read >= 12
     * $query->filterByRoleRead(array('max' => 12)); // WHERE role_read <= 12
     * </code>
     *
     * @param     mixed $roleRead The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByRoleRead($roleRead = null, $comparison = null)
    {
        if (is_array($roleRead)) {
            $useMinMax = false;
            if (isset($roleRead['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_READ, $roleRead['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleRead['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_READ, $roleRead['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_READ, $roleRead, $comparison);
    }

    /**
     * Filter the query on the role_create column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleCreate(1234); // WHERE role_create = 1234
     * $query->filterByRoleCreate(array(12, 34)); // WHERE role_create IN (12, 34)
     * $query->filterByRoleCreate(array('min' => 12)); // WHERE role_create >= 12
     * $query->filterByRoleCreate(array('max' => 12)); // WHERE role_create <= 12
     * </code>
     *
     * @param     mixed $roleCreate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByRoleCreate($roleCreate = null, $comparison = null)
    {
        if (is_array($roleCreate)) {
            $useMinMax = false;
            if (isset($roleCreate['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_CREATE, $roleCreate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleCreate['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_CREATE, $roleCreate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_CREATE, $roleCreate, $comparison);
    }

    /**
     * Filter the query on the role_update column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleUpdate(1234); // WHERE role_update = 1234
     * $query->filterByRoleUpdate(array(12, 34)); // WHERE role_update IN (12, 34)
     * $query->filterByRoleUpdate(array('min' => 12)); // WHERE role_update >= 12
     * $query->filterByRoleUpdate(array('max' => 12)); // WHERE role_update <= 12
     * </code>
     *
     * @param     mixed $roleUpdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByRoleUpdate($roleUpdate = null, $comparison = null)
    {
        if (is_array($roleUpdate)) {
            $useMinMax = false;
            if (isset($roleUpdate['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_UPDATE, $roleUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleUpdate['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_UPDATE, $roleUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_UPDATE, $roleUpdate, $comparison);
    }

    /**
     * Filter the query on the role_delete column
     *
     * Example usage:
     * <code>
     * $query->filterByRoleDelete(1234); // WHERE role_delete = 1234
     * $query->filterByRoleDelete(array(12, 34)); // WHERE role_delete IN (12, 34)
     * $query->filterByRoleDelete(array('min' => 12)); // WHERE role_delete >= 12
     * $query->filterByRoleDelete(array('max' => 12)); // WHERE role_delete <= 12
     * </code>
     *
     * @param     mixed $roleDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByRoleDelete($roleDelete = null, $comparison = null)
    {
        if (is_array($roleDelete)) {
            $useMinMax = false;
            if (isset($roleDelete['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_DELETE, $roleDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($roleDelete['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::ROLE_DELETE, $roleDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::ROLE_DELETE, $roleDelete, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData(1234); // WHERE asal_data = 1234
     * $query->filterByAsalData(array(12, 34)); // WHERE asal_data IN (12, 34)
     * $query->filterByAsalData(array('min' => 12)); // WHERE asal_data >= 12
     * $query->filterByAsalData(array('max' => 12)); // WHERE asal_data <= 12
     * </code>
     *
     * @param     mixed $asalData The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (is_array($asalData)) {
            $useMinMax = false;
            if (isset($asalData['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::ASAL_DATA, $asalData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asalData['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::ASAL_DATA, $asalData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::ASAL_DATA, $asalData, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::AKTIF, $aktif, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::CREATE_DATE, $createDate, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsRoleTablePeer::UPDATER_ID, $updaterId, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(WsRoleTablePeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(WsRoleTablePeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the nama_table column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaTable('fooValue');   // WHERE nama_table = 'fooValue'
     * $query->filterByNamaTable('%fooValue%'); // WHERE nama_table LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaTable The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByNamaTable($namaTable = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaTable)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaTable)) {
                $namaTable = str_replace('*', '%', $namaTable);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::NAMA_TABLE, $namaTable, $comparison);
    }

    /**
     * Filter the query on the nama_alias column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaAlias('fooValue');   // WHERE nama_alias = 'fooValue'
     * $query->filterByNamaAlias('%fooValue%'); // WHERE nama_alias LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaAlias The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function filterByNamaAlias($namaAlias = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaAlias)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaAlias)) {
                $namaAlias = str_replace('*', '%', $namaAlias);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsRoleTablePeer::NAMA_ALIAS, $namaAlias, $comparison);
    }

    /**
     * Filter the query by a related WsAplikasi object
     *
     * @param   WsAplikasi|PropelObjectCollection $wsAplikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 WsRoleTableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWsAplikasi($wsAplikasi, $comparison = null)
    {
        if ($wsAplikasi instanceof WsAplikasi) {
            return $this
                ->addUsingAlias(WsRoleTablePeer::APLIKASI_ID, $wsAplikasi->getAplikasiId(), $comparison);
        } elseif ($wsAplikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(WsRoleTablePeer::APLIKASI_ID, $wsAplikasi->toKeyValue('PrimaryKey', 'AplikasiId'), $comparison);
        } else {
            throw new PropelException('filterByWsAplikasi() only accepts arguments of type WsAplikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WsAplikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function joinWsAplikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WsAplikasi');

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
            $this->addJoinObject($join, 'WsAplikasi');
        }

        return $this;
    }

    /**
     * Use the WsAplikasi relation WsAplikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\WsAplikasiQuery A secondary query class using the current class as primary query
     */
    public function useWsAplikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWsAplikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WsAplikasi', '\DataDikdas\Model\WsAplikasiQuery');
    }

    /**
     * Filter the query by a related WsRoleColumn object
     *
     * @param   WsRoleColumn|PropelObjectCollection $wsRoleColumn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 WsRoleTableQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWsRoleColumn($wsRoleColumn, $comparison = null)
    {
        if ($wsRoleColumn instanceof WsRoleColumn) {
            return $this
                ->addUsingAlias(WsRoleTablePeer::ROLE_TABLE_ID, $wsRoleColumn->getRoleTableId(), $comparison);
        } elseif ($wsRoleColumn instanceof PropelObjectCollection) {
            return $this
                ->useWsRoleColumnQuery()
                ->filterByPrimaryKeys($wsRoleColumn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByWsRoleColumn() only accepts arguments of type WsRoleColumn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WsRoleColumn relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function joinWsRoleColumn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WsRoleColumn');

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
            $this->addJoinObject($join, 'WsRoleColumn');
        }

        return $this;
    }

    /**
     * Use the WsRoleColumn relation WsRoleColumn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\WsRoleColumnQuery A secondary query class using the current class as primary query
     */
    public function useWsRoleColumnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWsRoleColumn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WsRoleColumn', '\DataDikdas\Model\WsRoleColumnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   WsRoleTable $wsRoleTable Object to remove from the list of results
     *
     * @return WsRoleTableQuery The current query, for fluid interface
     */
    public function prune($wsRoleTable = null)
    {
        if ($wsRoleTable) {
            $this->addUsingAlias(WsRoleTablePeer::ROLE_TABLE_ID, $wsRoleTable->getRoleTableId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
