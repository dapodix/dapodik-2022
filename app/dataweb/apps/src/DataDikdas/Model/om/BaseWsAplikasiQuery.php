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
use DataDikdas\Model\WsAplikasiPeer;
use DataDikdas\Model\WsAplikasiQuery;
use DataDikdas\Model\WsRoleTable;

/**
 * Base class that represents a query for the 'ws_aplikasi' table.
 *
 * 
 *
 * @method WsAplikasiQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method WsAplikasiQuery orderByAplikasiId($order = Criteria::ASC) Order by the aplikasi_id column
 * @method WsAplikasiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method WsAplikasiQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method WsAplikasiQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method WsAplikasiQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method WsAplikasiQuery orderByPort($order = Criteria::ASC) Order by the port column
 * @method WsAplikasiQuery orderByMacAddress($order = Criteria::ASC) Order by the mac_address column
 * @method WsAplikasiQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method WsAplikasiQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method WsAplikasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method WsAplikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method WsAplikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method WsAplikasiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 * @method WsAplikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method WsAplikasiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 *
 * @method WsAplikasiQuery groupBySekolahId() Group by the sekolah_id column
 * @method WsAplikasiQuery groupByAplikasiId() Group by the aplikasi_id column
 * @method WsAplikasiQuery groupByNama() Group by the nama column
 * @method WsAplikasiQuery groupByToken() Group by the token column
 * @method WsAplikasiQuery groupByPassword() Group by the password column
 * @method WsAplikasiQuery groupByIpAddress() Group by the ip_address column
 * @method WsAplikasiQuery groupByPort() Group by the port column
 * @method WsAplikasiQuery groupByMacAddress() Group by the mac_address column
 * @method WsAplikasiQuery groupByAsalData() Group by the asal_data column
 * @method WsAplikasiQuery groupByAktif() Group by the aktif column
 * @method WsAplikasiQuery groupByExpiredDate() Group by the expired_date column
 * @method WsAplikasiQuery groupByCreateDate() Group by the create_date column
 * @method WsAplikasiQuery groupByLastUpdate() Group by the last_update column
 * @method WsAplikasiQuery groupByUpdaterId() Group by the updater_id column
 * @method WsAplikasiQuery groupByLastSync() Group by the last_sync column
 * @method WsAplikasiQuery groupBySoftDelete() Group by the soft_delete column
 *
 * @method WsAplikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method WsAplikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method WsAplikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method WsAplikasiQuery leftJoinWsRoleTable($relationAlias = null) Adds a LEFT JOIN clause to the query using the WsRoleTable relation
 * @method WsAplikasiQuery rightJoinWsRoleTable($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WsRoleTable relation
 * @method WsAplikasiQuery innerJoinWsRoleTable($relationAlias = null) Adds a INNER JOIN clause to the query using the WsRoleTable relation
 *
 * @method WsAplikasi findOne(PropelPDO $con = null) Return the first WsAplikasi matching the query
 * @method WsAplikasi findOneOrCreate(PropelPDO $con = null) Return the first WsAplikasi matching the query, or a new WsAplikasi object populated from the query conditions when no match is found
 *
 * @method WsAplikasi findOneBySekolahId(string $sekolah_id) Return the first WsAplikasi filtered by the sekolah_id column
 * @method WsAplikasi findOneByNama(string $nama) Return the first WsAplikasi filtered by the nama column
 * @method WsAplikasi findOneByToken(string $token) Return the first WsAplikasi filtered by the token column
 * @method WsAplikasi findOneByPassword(string $password) Return the first WsAplikasi filtered by the password column
 * @method WsAplikasi findOneByIpAddress(string $ip_address) Return the first WsAplikasi filtered by the ip_address column
 * @method WsAplikasi findOneByPort(string $port) Return the first WsAplikasi filtered by the port column
 * @method WsAplikasi findOneByMacAddress(string $mac_address) Return the first WsAplikasi filtered by the mac_address column
 * @method WsAplikasi findOneByAsalData(string $asal_data) Return the first WsAplikasi filtered by the asal_data column
 * @method WsAplikasi findOneByAktif(string $aktif) Return the first WsAplikasi filtered by the aktif column
 * @method WsAplikasi findOneByExpiredDate(string $expired_date) Return the first WsAplikasi filtered by the expired_date column
 * @method WsAplikasi findOneByCreateDate(string $create_date) Return the first WsAplikasi filtered by the create_date column
 * @method WsAplikasi findOneByLastUpdate(string $last_update) Return the first WsAplikasi filtered by the last_update column
 * @method WsAplikasi findOneByUpdaterId(string $updater_id) Return the first WsAplikasi filtered by the updater_id column
 * @method WsAplikasi findOneByLastSync(string $last_sync) Return the first WsAplikasi filtered by the last_sync column
 * @method WsAplikasi findOneBySoftDelete(int $soft_delete) Return the first WsAplikasi filtered by the soft_delete column
 *
 * @method array findBySekolahId(string $sekolah_id) Return WsAplikasi objects filtered by the sekolah_id column
 * @method array findByAplikasiId(string $aplikasi_id) Return WsAplikasi objects filtered by the aplikasi_id column
 * @method array findByNama(string $nama) Return WsAplikasi objects filtered by the nama column
 * @method array findByToken(string $token) Return WsAplikasi objects filtered by the token column
 * @method array findByPassword(string $password) Return WsAplikasi objects filtered by the password column
 * @method array findByIpAddress(string $ip_address) Return WsAplikasi objects filtered by the ip_address column
 * @method array findByPort(string $port) Return WsAplikasi objects filtered by the port column
 * @method array findByMacAddress(string $mac_address) Return WsAplikasi objects filtered by the mac_address column
 * @method array findByAsalData(string $asal_data) Return WsAplikasi objects filtered by the asal_data column
 * @method array findByAktif(string $aktif) Return WsAplikasi objects filtered by the aktif column
 * @method array findByExpiredDate(string $expired_date) Return WsAplikasi objects filtered by the expired_date column
 * @method array findByCreateDate(string $create_date) Return WsAplikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return WsAplikasi objects filtered by the last_update column
 * @method array findByUpdaterId(string $updater_id) Return WsAplikasi objects filtered by the updater_id column
 * @method array findByLastSync(string $last_sync) Return WsAplikasi objects filtered by the last_sync column
 * @method array findBySoftDelete(int $soft_delete) Return WsAplikasi objects filtered by the soft_delete column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsAplikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseWsAplikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\WsAplikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new WsAplikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   WsAplikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return WsAplikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof WsAplikasiQuery) {
            return $criteria;
        }
        $query = new WsAplikasiQuery();
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
     * @return   WsAplikasi|WsAplikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WsAplikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WsAplikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAplikasiId($key, $con = null)
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
     * @return                 WsAplikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "aplikasi_id", "nama", "token", "password", "ip_address", "port", "mac_address", "asal_data", "aktif", "expired_date", "create_date", "last_update", "updater_id", "last_sync", "soft_delete" FROM "ws_aplikasi" WHERE "aplikasi_id" = :p0';
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
            $obj = new WsAplikasi();
            $obj->hydrate($row);
            WsAplikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return WsAplikasi|WsAplikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|WsAplikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WsAplikasiPeer::APLIKASI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WsAplikasiPeer::APLIKASI_ID, $keys, Criteria::IN);
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
     * @return WsAplikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsAplikasiPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsAplikasiPeer::APLIKASI_ID, $aplikasiId, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsAplikasiPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $token)) {
                $token = str_replace('*', '%', $token);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the ip_address column
     *
     * Example usage:
     * <code>
     * $query->filterByIpAddress('fooValue');   // WHERE ip_address = 'fooValue'
     * $query->filterByIpAddress('%fooValue%'); // WHERE ip_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ipAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByIpAddress($ipAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ipAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ipAddress)) {
                $ipAddress = str_replace('*', '%', $ipAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::IP_ADDRESS, $ipAddress, $comparison);
    }

    /**
     * Filter the query on the port column
     *
     * Example usage:
     * <code>
     * $query->filterByPort('fooValue');   // WHERE port = 'fooValue'
     * $query->filterByPort('%fooValue%'); // WHERE port LIKE '%fooValue%'
     * </code>
     *
     * @param     string $port The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByPort($port = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($port)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $port)) {
                $port = str_replace('*', '%', $port);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::PORT, $port, $comparison);
    }

    /**
     * Filter the query on the mac_address column
     *
     * Example usage:
     * <code>
     * $query->filterByMacAddress('fooValue');   // WHERE mac_address = 'fooValue'
     * $query->filterByMacAddress('%fooValue%'); // WHERE mac_address LIKE '%fooValue%'
     * </code>
     *
     * @param     string $macAddress The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByMacAddress($macAddress = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($macAddress)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $macAddress)) {
                $macAddress = str_replace('*', '%', $macAddress);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::MAC_ADDRESS, $macAddress, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (is_array($asalData)) {
            $useMinMax = false;
            if (isset($asalData['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::ASAL_DATA, $asalData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($asalData['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::ASAL_DATA, $asalData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::AKTIF, $aktif, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsAplikasiPeer::UPDATER_ID, $updaterId, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(WsAplikasiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(WsAplikasiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsAplikasiPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query by a related WsRoleTable object
     *
     * @param   WsRoleTable|PropelObjectCollection $wsRoleTable  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 WsAplikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWsRoleTable($wsRoleTable, $comparison = null)
    {
        if ($wsRoleTable instanceof WsRoleTable) {
            return $this
                ->addUsingAlias(WsAplikasiPeer::APLIKASI_ID, $wsRoleTable->getAplikasiId(), $comparison);
        } elseif ($wsRoleTable instanceof PropelObjectCollection) {
            return $this
                ->useWsRoleTableQuery()
                ->filterByPrimaryKeys($wsRoleTable->getPrimaryKeys())
                ->endUse();
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
     * @return WsAplikasiQuery The current query, for fluid interface
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
     * @param   WsAplikasi $wsAplikasi Object to remove from the list of results
     *
     * @return WsAplikasiQuery The current query, for fluid interface
     */
    public function prune($wsAplikasi = null)
    {
        if ($wsAplikasi) {
            $this->addUsingAlias(WsAplikasiPeer::APLIKASI_ID, $wsAplikasi->getAplikasiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
