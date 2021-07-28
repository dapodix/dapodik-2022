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
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\SyncPrimer;
use DataDikdas\Model\TableSync;
use DataDikdas\Model\TableSyncLog;
use DataDikdas\Model\TableSyncLogPeer;
use DataDikdas\Model\TableSyncLogQuery;

/**
 * Base class that represents a query for the 'table_sync_log' table.
 *
 * 
 *
 * @method TableSyncLogQuery orderByTableName($order = Criteria::ASC) Order by the table_name column
 * @method TableSyncLogQuery orderByIdInstalasi($order = Criteria::ASC) Order by the id_instalasi column
 * @method TableSyncLogQuery orderByBeginSync($order = Criteria::ASC) Order by the begin_sync column
 * @method TableSyncLogQuery orderByEndSync($order = Criteria::ASC) Order by the end_sync column
 * @method TableSyncLogQuery orderBySyncMedia($order = Criteria::ASC) Order by the sync_media column
 * @method TableSyncLogQuery orderByIsSuccess($order = Criteria::ASC) Order by the is_success column
 * @method TableSyncLogQuery orderBySelisihWaktuServer($order = Criteria::ASC) Order by the selisih_waktu_server column
 * @method TableSyncLogQuery orderByNCreate($order = Criteria::ASC) Order by the n_create column
 * @method TableSyncLogQuery orderByNUpdate($order = Criteria::ASC) Order by the n_update column
 * @method TableSyncLogQuery orderByNHapus($order = Criteria::ASC) Order by the n_hapus column
 * @method TableSyncLogQuery orderByNKonflik($order = Criteria::ASC) Order by the n_konflik column
 * @method TableSyncLogQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TableSyncLogQuery orderBySyncPage($order = Criteria::ASC) Order by the sync_page column
 * @method TableSyncLogQuery orderByAlamatIp($order = Criteria::ASC) Order by the alamat_ip column
 * @method TableSyncLogQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 *
 * @method TableSyncLogQuery groupByTableName() Group by the table_name column
 * @method TableSyncLogQuery groupByIdInstalasi() Group by the id_instalasi column
 * @method TableSyncLogQuery groupByBeginSync() Group by the begin_sync column
 * @method TableSyncLogQuery groupByEndSync() Group by the end_sync column
 * @method TableSyncLogQuery groupBySyncMedia() Group by the sync_media column
 * @method TableSyncLogQuery groupByIsSuccess() Group by the is_success column
 * @method TableSyncLogQuery groupBySelisihWaktuServer() Group by the selisih_waktu_server column
 * @method TableSyncLogQuery groupByNCreate() Group by the n_create column
 * @method TableSyncLogQuery groupByNUpdate() Group by the n_update column
 * @method TableSyncLogQuery groupByNHapus() Group by the n_hapus column
 * @method TableSyncLogQuery groupByNKonflik() Group by the n_konflik column
 * @method TableSyncLogQuery groupByLastUpdate() Group by the last_update column
 * @method TableSyncLogQuery groupBySyncPage() Group by the sync_page column
 * @method TableSyncLogQuery groupByAlamatIp() Group by the alamat_ip column
 * @method TableSyncLogQuery groupByPenggunaId() Group by the pengguna_id column
 *
 * @method TableSyncLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TableSyncLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TableSyncLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TableSyncLogQuery leftJoinInstalasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Instalasi relation
 * @method TableSyncLogQuery rightJoinInstalasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Instalasi relation
 * @method TableSyncLogQuery innerJoinInstalasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Instalasi relation
 *
 * @method TableSyncLogQuery leftJoinTableSync($relationAlias = null) Adds a LEFT JOIN clause to the query using the TableSync relation
 * @method TableSyncLogQuery rightJoinTableSync($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TableSync relation
 * @method TableSyncLogQuery innerJoinTableSync($relationAlias = null) Adds a INNER JOIN clause to the query using the TableSync relation
 *
 * @method TableSyncLogQuery leftJoinSyncPrimer($relationAlias = null) Adds a LEFT JOIN clause to the query using the SyncPrimer relation
 * @method TableSyncLogQuery rightJoinSyncPrimer($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SyncPrimer relation
 * @method TableSyncLogQuery innerJoinSyncPrimer($relationAlias = null) Adds a INNER JOIN clause to the query using the SyncPrimer relation
 *
 * @method TableSyncLog findOne(PropelPDO $con = null) Return the first TableSyncLog matching the query
 * @method TableSyncLog findOneOrCreate(PropelPDO $con = null) Return the first TableSyncLog matching the query, or a new TableSyncLog object populated from the query conditions when no match is found
 *
 * @method TableSyncLog findOneByTableName(string $table_name) Return the first TableSyncLog filtered by the table_name column
 * @method TableSyncLog findOneByIdInstalasi(string $id_instalasi) Return the first TableSyncLog filtered by the id_instalasi column
 * @method TableSyncLog findOneByBeginSync(string $begin_sync) Return the first TableSyncLog filtered by the begin_sync column
 * @method TableSyncLog findOneByEndSync(string $end_sync) Return the first TableSyncLog filtered by the end_sync column
 * @method TableSyncLog findOneBySyncMedia(string $sync_media) Return the first TableSyncLog filtered by the sync_media column
 * @method TableSyncLog findOneByIsSuccess(string $is_success) Return the first TableSyncLog filtered by the is_success column
 * @method TableSyncLog findOneBySelisihWaktuServer(string $selisih_waktu_server) Return the first TableSyncLog filtered by the selisih_waktu_server column
 * @method TableSyncLog findOneByNCreate(int $n_create) Return the first TableSyncLog filtered by the n_create column
 * @method TableSyncLog findOneByNUpdate(int $n_update) Return the first TableSyncLog filtered by the n_update column
 * @method TableSyncLog findOneByNHapus(int $n_hapus) Return the first TableSyncLog filtered by the n_hapus column
 * @method TableSyncLog findOneByNKonflik(int $n_konflik) Return the first TableSyncLog filtered by the n_konflik column
 * @method TableSyncLog findOneByLastUpdate(string $last_update) Return the first TableSyncLog filtered by the last_update column
 * @method TableSyncLog findOneBySyncPage(int $sync_page) Return the first TableSyncLog filtered by the sync_page column
 * @method TableSyncLog findOneByAlamatIp(string $alamat_ip) Return the first TableSyncLog filtered by the alamat_ip column
 * @method TableSyncLog findOneByPenggunaId(string $pengguna_id) Return the first TableSyncLog filtered by the pengguna_id column
 *
 * @method array findByTableName(string $table_name) Return TableSyncLog objects filtered by the table_name column
 * @method array findByIdInstalasi(string $id_instalasi) Return TableSyncLog objects filtered by the id_instalasi column
 * @method array findByBeginSync(string $begin_sync) Return TableSyncLog objects filtered by the begin_sync column
 * @method array findByEndSync(string $end_sync) Return TableSyncLog objects filtered by the end_sync column
 * @method array findBySyncMedia(string $sync_media) Return TableSyncLog objects filtered by the sync_media column
 * @method array findByIsSuccess(string $is_success) Return TableSyncLog objects filtered by the is_success column
 * @method array findBySelisihWaktuServer(string $selisih_waktu_server) Return TableSyncLog objects filtered by the selisih_waktu_server column
 * @method array findByNCreate(int $n_create) Return TableSyncLog objects filtered by the n_create column
 * @method array findByNUpdate(int $n_update) Return TableSyncLog objects filtered by the n_update column
 * @method array findByNHapus(int $n_hapus) Return TableSyncLog objects filtered by the n_hapus column
 * @method array findByNKonflik(int $n_konflik) Return TableSyncLog objects filtered by the n_konflik column
 * @method array findByLastUpdate(string $last_update) Return TableSyncLog objects filtered by the last_update column
 * @method array findBySyncPage(int $sync_page) Return TableSyncLog objects filtered by the sync_page column
 * @method array findByAlamatIp(string $alamat_ip) Return TableSyncLog objects filtered by the alamat_ip column
 * @method array findByPenggunaId(string $pengguna_id) Return TableSyncLog objects filtered by the pengguna_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTableSyncLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTableSyncLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TableSyncLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TableSyncLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TableSyncLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TableSyncLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TableSyncLogQuery) {
            return $criteria;
        }
        $query = new TableSyncLogQuery();
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
                         A Primary key composition: [$table_name, $id_instalasi]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TableSyncLog|TableSyncLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TableSyncLogPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TableSyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TableSyncLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "table_name", "id_instalasi", "begin_sync", "end_sync", "sync_media", "is_success", "selisih_waktu_server", "n_create", "n_update", "n_hapus", "n_konflik", "last_update", "sync_page", "alamat_ip", "pengguna_id" FROM "table_sync_log" WHERE "table_name" = :p0 AND "id_instalasi" = :p1';
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
            $obj = new TableSyncLog();
            $obj->hydrate($row);
            TableSyncLogPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return TableSyncLog|TableSyncLog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TableSyncLog[]|mixed the list of results, formatted by the current formatter
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
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TableSyncLogPeer::TABLE_NAME, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TableSyncLogPeer::ID_INSTALASI, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TableSyncLogPeer::TABLE_NAME, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TableSyncLogPeer::ID_INSTALASI, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the table_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTableName('fooValue');   // WHERE table_name = 'fooValue'
     * $query->filterByTableName('%fooValue%'); // WHERE table_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByTableName($tableName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableName)) {
                $tableName = str_replace('*', '%', $tableName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::TABLE_NAME, $tableName, $comparison);
    }

    /**
     * Filter the query on the id_instalasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInstalasi('fooValue');   // WHERE id_instalasi = 'fooValue'
     * $query->filterByIdInstalasi('%fooValue%'); // WHERE id_instalasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idInstalasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByIdInstalasi($idInstalasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idInstalasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idInstalasi)) {
                $idInstalasi = str_replace('*', '%', $idInstalasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::ID_INSTALASI, $idInstalasi, $comparison);
    }

    /**
     * Filter the query on the begin_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByBeginSync('2011-03-14'); // WHERE begin_sync = '2011-03-14'
     * $query->filterByBeginSync('now'); // WHERE begin_sync = '2011-03-14'
     * $query->filterByBeginSync(array('max' => 'yesterday')); // WHERE begin_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $beginSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByBeginSync($beginSync = null, $comparison = null)
    {
        if (is_array($beginSync)) {
            $useMinMax = false;
            if (isset($beginSync['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::BEGIN_SYNC, $beginSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beginSync['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::BEGIN_SYNC, $beginSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::BEGIN_SYNC, $beginSync, $comparison);
    }

    /**
     * Filter the query on the end_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByEndSync('2011-03-14'); // WHERE end_sync = '2011-03-14'
     * $query->filterByEndSync('now'); // WHERE end_sync = '2011-03-14'
     * $query->filterByEndSync(array('max' => 'yesterday')); // WHERE end_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $endSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByEndSync($endSync = null, $comparison = null)
    {
        if (is_array($endSync)) {
            $useMinMax = false;
            if (isset($endSync['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::END_SYNC, $endSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endSync['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::END_SYNC, $endSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::END_SYNC, $endSync, $comparison);
    }

    /**
     * Filter the query on the sync_media column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncMedia('fooValue');   // WHERE sync_media = 'fooValue'
     * $query->filterBySyncMedia('%fooValue%'); // WHERE sync_media LIKE '%fooValue%'
     * </code>
     *
     * @param     string $syncMedia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterBySyncMedia($syncMedia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($syncMedia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $syncMedia)) {
                $syncMedia = str_replace('*', '%', $syncMedia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::SYNC_MEDIA, $syncMedia, $comparison);
    }

    /**
     * Filter the query on the is_success column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSuccess(1234); // WHERE is_success = 1234
     * $query->filterByIsSuccess(array(12, 34)); // WHERE is_success IN (12, 34)
     * $query->filterByIsSuccess(array('min' => 12)); // WHERE is_success >= 12
     * $query->filterByIsSuccess(array('max' => 12)); // WHERE is_success <= 12
     * </code>
     *
     * @param     mixed $isSuccess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByIsSuccess($isSuccess = null, $comparison = null)
    {
        if (is_array($isSuccess)) {
            $useMinMax = false;
            if (isset($isSuccess['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::IS_SUCCESS, $isSuccess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isSuccess['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::IS_SUCCESS, $isSuccess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::IS_SUCCESS, $isSuccess, $comparison);
    }

    /**
     * Filter the query on the selisih_waktu_server column
     *
     * Example usage:
     * <code>
     * $query->filterBySelisihWaktuServer(1234); // WHERE selisih_waktu_server = 1234
     * $query->filterBySelisihWaktuServer(array(12, 34)); // WHERE selisih_waktu_server IN (12, 34)
     * $query->filterBySelisihWaktuServer(array('min' => 12)); // WHERE selisih_waktu_server >= 12
     * $query->filterBySelisihWaktuServer(array('max' => 12)); // WHERE selisih_waktu_server <= 12
     * </code>
     *
     * @param     mixed $selisihWaktuServer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterBySelisihWaktuServer($selisihWaktuServer = null, $comparison = null)
    {
        if (is_array($selisihWaktuServer)) {
            $useMinMax = false;
            if (isset($selisihWaktuServer['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($selisihWaktuServer['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer, $comparison);
    }

    /**
     * Filter the query on the n_create column
     *
     * Example usage:
     * <code>
     * $query->filterByNCreate(1234); // WHERE n_create = 1234
     * $query->filterByNCreate(array(12, 34)); // WHERE n_create IN (12, 34)
     * $query->filterByNCreate(array('min' => 12)); // WHERE n_create >= 12
     * $query->filterByNCreate(array('max' => 12)); // WHERE n_create <= 12
     * </code>
     *
     * @param     mixed $nCreate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByNCreate($nCreate = null, $comparison = null)
    {
        if (is_array($nCreate)) {
            $useMinMax = false;
            if (isset($nCreate['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_CREATE, $nCreate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nCreate['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_CREATE, $nCreate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::N_CREATE, $nCreate, $comparison);
    }

    /**
     * Filter the query on the n_update column
     *
     * Example usage:
     * <code>
     * $query->filterByNUpdate(1234); // WHERE n_update = 1234
     * $query->filterByNUpdate(array(12, 34)); // WHERE n_update IN (12, 34)
     * $query->filterByNUpdate(array('min' => 12)); // WHERE n_update >= 12
     * $query->filterByNUpdate(array('max' => 12)); // WHERE n_update <= 12
     * </code>
     *
     * @param     mixed $nUpdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByNUpdate($nUpdate = null, $comparison = null)
    {
        if (is_array($nUpdate)) {
            $useMinMax = false;
            if (isset($nUpdate['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_UPDATE, $nUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nUpdate['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_UPDATE, $nUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::N_UPDATE, $nUpdate, $comparison);
    }

    /**
     * Filter the query on the n_hapus column
     *
     * Example usage:
     * <code>
     * $query->filterByNHapus(1234); // WHERE n_hapus = 1234
     * $query->filterByNHapus(array(12, 34)); // WHERE n_hapus IN (12, 34)
     * $query->filterByNHapus(array('min' => 12)); // WHERE n_hapus >= 12
     * $query->filterByNHapus(array('max' => 12)); // WHERE n_hapus <= 12
     * </code>
     *
     * @param     mixed $nHapus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByNHapus($nHapus = null, $comparison = null)
    {
        if (is_array($nHapus)) {
            $useMinMax = false;
            if (isset($nHapus['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_HAPUS, $nHapus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nHapus['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_HAPUS, $nHapus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::N_HAPUS, $nHapus, $comparison);
    }

    /**
     * Filter the query on the n_konflik column
     *
     * Example usage:
     * <code>
     * $query->filterByNKonflik(1234); // WHERE n_konflik = 1234
     * $query->filterByNKonflik(array(12, 34)); // WHERE n_konflik IN (12, 34)
     * $query->filterByNKonflik(array('min' => 12)); // WHERE n_konflik >= 12
     * $query->filterByNKonflik(array('max' => 12)); // WHERE n_konflik <= 12
     * </code>
     *
     * @param     mixed $nKonflik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByNKonflik($nKonflik = null, $comparison = null)
    {
        if (is_array($nKonflik)) {
            $useMinMax = false;
            if (isset($nKonflik['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_KONFLIK, $nKonflik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nKonflik['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::N_KONFLIK, $nKonflik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::N_KONFLIK, $nKonflik, $comparison);
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
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the sync_page column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncPage(1234); // WHERE sync_page = 1234
     * $query->filterBySyncPage(array(12, 34)); // WHERE sync_page IN (12, 34)
     * $query->filterBySyncPage(array('min' => 12)); // WHERE sync_page >= 12
     * $query->filterBySyncPage(array('max' => 12)); // WHERE sync_page <= 12
     * </code>
     *
     * @param     mixed $syncPage The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterBySyncPage($syncPage = null, $comparison = null)
    {
        if (is_array($syncPage)) {
            $useMinMax = false;
            if (isset($syncPage['min'])) {
                $this->addUsingAlias(TableSyncLogPeer::SYNC_PAGE, $syncPage['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($syncPage['max'])) {
                $this->addUsingAlias(TableSyncLogPeer::SYNC_PAGE, $syncPage['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::SYNC_PAGE, $syncPage, $comparison);
    }

    /**
     * Filter the query on the alamat_ip column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatIp('fooValue');   // WHERE alamat_ip = 'fooValue'
     * $query->filterByAlamatIp('%fooValue%'); // WHERE alamat_ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatIp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByAlamatIp($alamatIp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatIp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatIp)) {
                $alamatIp = str_replace('*', '%', $alamatIp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::ALAMAT_IP, $alamatIp, $comparison);
    }

    /**
     * Filter the query on the pengguna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenggunaId('fooValue');   // WHERE pengguna_id = 'fooValue'
     * $query->filterByPenggunaId('%fooValue%'); // WHERE pengguna_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penggunaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penggunaId)) {
                $penggunaId = str_replace('*', '%', $penggunaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncLogPeer::PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query by a related Instalasi object
     *
     * @param   Instalasi|PropelObjectCollection $instalasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TableSyncLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInstalasi($instalasi, $comparison = null)
    {
        if ($instalasi instanceof Instalasi) {
            return $this
                ->addUsingAlias(TableSyncLogPeer::ID_INSTALASI, $instalasi->getIdInstalasi(), $comparison);
        } elseif ($instalasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TableSyncLogPeer::ID_INSTALASI, $instalasi->toKeyValue('PrimaryKey', 'IdInstalasi'), $comparison);
        } else {
            throw new PropelException('filterByInstalasi() only accepts arguments of type Instalasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Instalasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function joinInstalasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Instalasi');

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
            $this->addJoinObject($join, 'Instalasi');
        }

        return $this;
    }

    /**
     * Use the Instalasi relation Instalasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InstalasiQuery A secondary query class using the current class as primary query
     */
    public function useInstalasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstalasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Instalasi', '\DataDikdas\Model\InstalasiQuery');
    }

    /**
     * Filter the query by a related TableSync object
     *
     * @param   TableSync|PropelObjectCollection $tableSync The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TableSyncLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTableSync($tableSync, $comparison = null)
    {
        if ($tableSync instanceof TableSync) {
            return $this
                ->addUsingAlias(TableSyncLogPeer::TABLE_NAME, $tableSync->getTableName(), $comparison);
        } elseif ($tableSync instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TableSyncLogPeer::TABLE_NAME, $tableSync->toKeyValue('PrimaryKey', 'TableName'), $comparison);
        } else {
            throw new PropelException('filterByTableSync() only accepts arguments of type TableSync or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TableSync relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function joinTableSync($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TableSync');

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
            $this->addJoinObject($join, 'TableSync');
        }

        return $this;
    }

    /**
     * Use the TableSync relation TableSync object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TableSyncQuery A secondary query class using the current class as primary query
     */
    public function useTableSyncQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTableSync($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TableSync', '\DataDikdas\Model\TableSyncQuery');
    }

    /**
     * Filter the query by a related SyncPrimer object
     *
     * @param   SyncPrimer|PropelObjectCollection $syncPrimer  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TableSyncLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySyncPrimer($syncPrimer, $comparison = null)
    {
        if ($syncPrimer instanceof SyncPrimer) {
            return $this
                ->addUsingAlias(TableSyncLogPeer::ID_INSTALASI, $syncPrimer->getIdInstalasi(), $comparison)
                ->addUsingAlias(TableSyncLogPeer::TABLE_NAME, $syncPrimer->getTableName(), $comparison);
        } else {
            throw new PropelException('filterBySyncPrimer() only accepts arguments of type SyncPrimer');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SyncPrimer relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function joinSyncPrimer($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SyncPrimer');

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
            $this->addJoinObject($join, 'SyncPrimer');
        }

        return $this;
    }

    /**
     * Use the SyncPrimer relation SyncPrimer object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SyncPrimerQuery A secondary query class using the current class as primary query
     */
    public function useSyncPrimerQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSyncPrimer($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SyncPrimer', '\DataDikdas\Model\SyncPrimerQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TableSyncLog $tableSyncLog Object to remove from the list of results
     *
     * @return TableSyncLogQuery The current query, for fluid interface
     */
    public function prune($tableSyncLog = null)
    {
        if ($tableSyncLog) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TableSyncLogPeer::TABLE_NAME), $tableSyncLog->getTableName(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TableSyncLogPeer::ID_INSTALASI), $tableSyncLog->getIdInstalasi(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
