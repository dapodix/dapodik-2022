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
use DataDikdas\Model\LogOtentikasi;
use DataDikdas\Model\LogOtentikasiPeer;
use DataDikdas\Model\LogOtentikasiQuery;
use DataDikdas\Model\Pengguna;

/**
 * Base class that represents a query for the 'man_akses.log_otentikasi' table.
 *
 * 
 *
 * @method LogOtentikasiQuery orderByTokenSesi($order = Criteria::ASC) Order by the token_sesi column
 * @method LogOtentikasiQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method LogOtentikasiQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 * @method LogOtentikasiQuery orderByLogOff($order = Criteria::ASC) Order by the log_off column
 * @method LogOtentikasiQuery orderByATimeOut($order = Criteria::ASC) Order by the a_time_out column
 * @method LogOtentikasiQuery orderByAlamatIp($order = Criteria::ASC) Order by the alamat_ip column
 * @method LogOtentikasiQuery orderByASesiAktif($order = Criteria::ASC) Order by the a_sesi_aktif column
 * @method LogOtentikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LogOtentikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LogOtentikasiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method LogOtentikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method LogOtentikasiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method LogOtentikasiQuery groupByTokenSesi() Group by the token_sesi column
 * @method LogOtentikasiQuery groupByPenggunaId() Group by the pengguna_id column
 * @method LogOtentikasiQuery groupByLastActivity() Group by the last_activity column
 * @method LogOtentikasiQuery groupByLogOff() Group by the log_off column
 * @method LogOtentikasiQuery groupByATimeOut() Group by the a_time_out column
 * @method LogOtentikasiQuery groupByAlamatIp() Group by the alamat_ip column
 * @method LogOtentikasiQuery groupByASesiAktif() Group by the a_sesi_aktif column
 * @method LogOtentikasiQuery groupByCreateDate() Group by the create_date column
 * @method LogOtentikasiQuery groupByLastUpdate() Group by the last_update column
 * @method LogOtentikasiQuery groupBySoftDelete() Group by the soft_delete column
 * @method LogOtentikasiQuery groupByLastSync() Group by the last_sync column
 * @method LogOtentikasiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method LogOtentikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LogOtentikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LogOtentikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LogOtentikasiQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method LogOtentikasiQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method LogOtentikasiQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method LogOtentikasi findOne(PropelPDO $con = null) Return the first LogOtentikasi matching the query
 * @method LogOtentikasi findOneOrCreate(PropelPDO $con = null) Return the first LogOtentikasi matching the query, or a new LogOtentikasi object populated from the query conditions when no match is found
 *
 * @method LogOtentikasi findOneByPenggunaId(string $pengguna_id) Return the first LogOtentikasi filtered by the pengguna_id column
 * @method LogOtentikasi findOneByLastActivity(string $last_activity) Return the first LogOtentikasi filtered by the last_activity column
 * @method LogOtentikasi findOneByLogOff(string $log_off) Return the first LogOtentikasi filtered by the log_off column
 * @method LogOtentikasi findOneByATimeOut(string $a_time_out) Return the first LogOtentikasi filtered by the a_time_out column
 * @method LogOtentikasi findOneByAlamatIp(string $alamat_ip) Return the first LogOtentikasi filtered by the alamat_ip column
 * @method LogOtentikasi findOneByASesiAktif(string $a_sesi_aktif) Return the first LogOtentikasi filtered by the a_sesi_aktif column
 * @method LogOtentikasi findOneByCreateDate(string $create_date) Return the first LogOtentikasi filtered by the create_date column
 * @method LogOtentikasi findOneByLastUpdate(string $last_update) Return the first LogOtentikasi filtered by the last_update column
 * @method LogOtentikasi findOneBySoftDelete(string $soft_delete) Return the first LogOtentikasi filtered by the soft_delete column
 * @method LogOtentikasi findOneByLastSync(string $last_sync) Return the first LogOtentikasi filtered by the last_sync column
 * @method LogOtentikasi findOneByUpdaterId(string $updater_id) Return the first LogOtentikasi filtered by the updater_id column
 *
 * @method array findByTokenSesi(string $token_sesi) Return LogOtentikasi objects filtered by the token_sesi column
 * @method array findByPenggunaId(string $pengguna_id) Return LogOtentikasi objects filtered by the pengguna_id column
 * @method array findByLastActivity(string $last_activity) Return LogOtentikasi objects filtered by the last_activity column
 * @method array findByLogOff(string $log_off) Return LogOtentikasi objects filtered by the log_off column
 * @method array findByATimeOut(string $a_time_out) Return LogOtentikasi objects filtered by the a_time_out column
 * @method array findByAlamatIp(string $alamat_ip) Return LogOtentikasi objects filtered by the alamat_ip column
 * @method array findByASesiAktif(string $a_sesi_aktif) Return LogOtentikasi objects filtered by the a_sesi_aktif column
 * @method array findByCreateDate(string $create_date) Return LogOtentikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LogOtentikasi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return LogOtentikasi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return LogOtentikasi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return LogOtentikasi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLogOtentikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLogOtentikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LogOtentikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LogOtentikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LogOtentikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LogOtentikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LogOtentikasiQuery) {
            return $criteria;
        }
        $query = new LogOtentikasiQuery();
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
     * @return   LogOtentikasi|LogOtentikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LogOtentikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LogOtentikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LogOtentikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTokenSesi($key, $con = null)
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
     * @return                 LogOtentikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "token_sesi", "pengguna_id", "last_activity", "log_off", "a_time_out", "alamat_ip", "a_sesi_aktif", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "man_akses"."log_otentikasi" WHERE "token_sesi" = :p0';
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
            $obj = new LogOtentikasi();
            $obj->hydrate($row);
            LogOtentikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LogOtentikasi|LogOtentikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LogOtentikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LogOtentikasiPeer::TOKEN_SESI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LogOtentikasiPeer::TOKEN_SESI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the token_sesi column
     *
     * Example usage:
     * <code>
     * $query->filterByTokenSesi('fooValue');   // WHERE token_sesi = 'fooValue'
     * $query->filterByTokenSesi('%fooValue%'); // WHERE token_sesi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tokenSesi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByTokenSesi($tokenSesi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tokenSesi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tokenSesi)) {
                $tokenSesi = str_replace('*', '%', $tokenSesi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::TOKEN_SESI, $tokenSesi, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LogOtentikasiPeer::PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity('2011-03-14'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity('now'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity(array('max' => 'yesterday')); // WHERE last_activity > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActivity The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::LAST_ACTIVITY, $lastActivity, $comparison);
    }

    /**
     * Filter the query on the log_off column
     *
     * Example usage:
     * <code>
     * $query->filterByLogOff('2011-03-14'); // WHERE log_off = '2011-03-14'
     * $query->filterByLogOff('now'); // WHERE log_off = '2011-03-14'
     * $query->filterByLogOff(array('max' => 'yesterday')); // WHERE log_off > '2011-03-13'
     * </code>
     *
     * @param     mixed $logOff The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByLogOff($logOff = null, $comparison = null)
    {
        if (is_array($logOff)) {
            $useMinMax = false;
            if (isset($logOff['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LOG_OFF, $logOff['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($logOff['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LOG_OFF, $logOff['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::LOG_OFF, $logOff, $comparison);
    }

    /**
     * Filter the query on the a_time_out column
     *
     * Example usage:
     * <code>
     * $query->filterByATimeOut(1234); // WHERE a_time_out = 1234
     * $query->filterByATimeOut(array(12, 34)); // WHERE a_time_out IN (12, 34)
     * $query->filterByATimeOut(array('min' => 12)); // WHERE a_time_out >= 12
     * $query->filterByATimeOut(array('max' => 12)); // WHERE a_time_out <= 12
     * </code>
     *
     * @param     mixed $aTimeOut The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByATimeOut($aTimeOut = null, $comparison = null)
    {
        if (is_array($aTimeOut)) {
            $useMinMax = false;
            if (isset($aTimeOut['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::A_TIME_OUT, $aTimeOut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTimeOut['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::A_TIME_OUT, $aTimeOut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::A_TIME_OUT, $aTimeOut, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LogOtentikasiPeer::ALAMAT_IP, $alamatIp, $comparison);
    }

    /**
     * Filter the query on the a_sesi_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByASesiAktif(1234); // WHERE a_sesi_aktif = 1234
     * $query->filterByASesiAktif(array(12, 34)); // WHERE a_sesi_aktif IN (12, 34)
     * $query->filterByASesiAktif(array('min' => 12)); // WHERE a_sesi_aktif >= 12
     * $query->filterByASesiAktif(array('max' => 12)); // WHERE a_sesi_aktif <= 12
     * </code>
     *
     * @param     mixed $aSesiAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByASesiAktif($aSesiAktif = null, $comparison = null)
    {
        if (is_array($aSesiAktif)) {
            $useMinMax = false;
            if (isset($aSesiAktif['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::A_SESI_AKTIF, $aSesiAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSesiAktif['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::A_SESI_AKTIF, $aSesiAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::A_SESI_AKTIF, $aSesiAktif, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LogOtentikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LogOtentikasiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return LogOtentikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LogOtentikasiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Pengguna object
     *
     * @param   Pengguna|PropelObjectCollection $pengguna The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LogOtentikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof Pengguna) {
            return $this
                ->addUsingAlias(LogOtentikasiPeer::PENGGUNA_ID, $pengguna->getPenggunaId(), $comparison);
        } elseif ($pengguna instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LogOtentikasiPeer::PENGGUNA_ID, $pengguna->toKeyValue('PrimaryKey', 'PenggunaId'), $comparison);
        } else {
            throw new PropelException('filterByPengguna() only accepts arguments of type Pengguna or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pengguna');

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
            $this->addJoinObject($join, 'Pengguna');
        }

        return $this;
    }

    /**
     * Use the Pengguna relation Pengguna object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenggunaQuery A secondary query class using the current class as primary query
     */
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\DataDikdas\Model\PenggunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LogOtentikasi $logOtentikasi Object to remove from the list of results
     *
     * @return LogOtentikasiQuery The current query, for fluid interface
     */
    public function prune($logOtentikasi = null)
    {
        if ($logOtentikasi) {
            $this->addUsingAlias(LogOtentikasiPeer::TOKEN_SESI, $logOtentikasi->getTokenSesi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
