<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\WsToken;
use DataDikdas\Model\WsTokenPeer;
use DataDikdas\Model\WsTokenQuery;

/**
 * Base class that represents a query for the 'ws_token' table.
 *
 * 
 *
 * @method WsTokenQuery orderByWsTokenId($order = Criteria::ASC) Order by the ws_token_id column
 * @method WsTokenQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method WsTokenQuery orderByIpAddress($order = Criteria::ASC) Order by the ip_address column
 * @method WsTokenQuery orderByPort($order = Criteria::ASC) Order by the port column
 * @method WsTokenQuery orderByMacAddress($order = Criteria::ASC) Order by the mac_address column
 * @method WsTokenQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method WsTokenQuery orderByRequestDate($order = Criteria::ASC) Order by the request_date column
 * @method WsTokenQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method WsTokenQuery orderByWsAplikasiId($order = Criteria::ASC) Order by the ws_aplikasi_id column
 *
 * @method WsTokenQuery groupByWsTokenId() Group by the ws_token_id column
 * @method WsTokenQuery groupBySekolahId() Group by the sekolah_id column
 * @method WsTokenQuery groupByIpAddress() Group by the ip_address column
 * @method WsTokenQuery groupByPort() Group by the port column
 * @method WsTokenQuery groupByMacAddress() Group by the mac_address column
 * @method WsTokenQuery groupByToken() Group by the token column
 * @method WsTokenQuery groupByRequestDate() Group by the request_date column
 * @method WsTokenQuery groupByExpiredDate() Group by the expired_date column
 * @method WsTokenQuery groupByWsAplikasiId() Group by the ws_aplikasi_id column
 *
 * @method WsTokenQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method WsTokenQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method WsTokenQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method WsToken findOne(PropelPDO $con = null) Return the first WsToken matching the query
 * @method WsToken findOneOrCreate(PropelPDO $con = null) Return the first WsToken matching the query, or a new WsToken object populated from the query conditions when no match is found
 *
 * @method WsToken findOneBySekolahId(string $sekolah_id) Return the first WsToken filtered by the sekolah_id column
 * @method WsToken findOneByIpAddress(string $ip_address) Return the first WsToken filtered by the ip_address column
 * @method WsToken findOneByPort(string $port) Return the first WsToken filtered by the port column
 * @method WsToken findOneByMacAddress(string $mac_address) Return the first WsToken filtered by the mac_address column
 * @method WsToken findOneByToken(string $token) Return the first WsToken filtered by the token column
 * @method WsToken findOneByRequestDate(string $request_date) Return the first WsToken filtered by the request_date column
 * @method WsToken findOneByExpiredDate(string $expired_date) Return the first WsToken filtered by the expired_date column
 * @method WsToken findOneByWsAplikasiId(string $ws_aplikasi_id) Return the first WsToken filtered by the ws_aplikasi_id column
 *
 * @method array findByWsTokenId(string $ws_token_id) Return WsToken objects filtered by the ws_token_id column
 * @method array findBySekolahId(string $sekolah_id) Return WsToken objects filtered by the sekolah_id column
 * @method array findByIpAddress(string $ip_address) Return WsToken objects filtered by the ip_address column
 * @method array findByPort(string $port) Return WsToken objects filtered by the port column
 * @method array findByMacAddress(string $mac_address) Return WsToken objects filtered by the mac_address column
 * @method array findByToken(string $token) Return WsToken objects filtered by the token column
 * @method array findByRequestDate(string $request_date) Return WsToken objects filtered by the request_date column
 * @method array findByExpiredDate(string $expired_date) Return WsToken objects filtered by the expired_date column
 * @method array findByWsAplikasiId(string $ws_aplikasi_id) Return WsToken objects filtered by the ws_aplikasi_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsTokenQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseWsTokenQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\WsToken', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new WsTokenQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   WsTokenQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return WsTokenQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof WsTokenQuery) {
            return $criteria;
        }
        $query = new WsTokenQuery();
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
     * @return   WsToken|WsToken[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = WsTokenPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(WsTokenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 WsToken A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByWsTokenId($key, $con = null)
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
     * @return                 WsToken A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ws_token_id", "sekolah_id", "ip_address", "port", "mac_address", "token", "request_date", "expired_date", "ws_aplikasi_id" FROM "ws_token" WHERE "ws_token_id" = :p0';
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
            $obj = new WsToken();
            $obj->hydrate($row);
            WsTokenPeer::addInstanceToPool($obj, (string) $key);
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
     * @return WsToken|WsToken[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|WsToken[]|mixed the list of results, formatted by the current formatter
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
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(WsTokenPeer::WS_TOKEN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(WsTokenPeer::WS_TOKEN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ws_token_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWsTokenId('fooValue');   // WHERE ws_token_id = 'fooValue'
     * $query->filterByWsTokenId('%fooValue%'); // WHERE ws_token_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wsTokenId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByWsTokenId($wsTokenId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wsTokenId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $wsTokenId)) {
                $wsTokenId = str_replace('*', '%', $wsTokenId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsTokenPeer::WS_TOKEN_ID, $wsTokenId, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsTokenPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsTokenPeer::IP_ADDRESS, $ipAddress, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsTokenPeer::PORT, $port, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsTokenPeer::MAC_ADDRESS, $macAddress, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
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

        return $this->addUsingAlias(WsTokenPeer::TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the request_date column
     *
     * Example usage:
     * <code>
     * $query->filterByRequestDate('2011-03-14'); // WHERE request_date = '2011-03-14'
     * $query->filterByRequestDate('now'); // WHERE request_date = '2011-03-14'
     * $query->filterByRequestDate(array('max' => 'yesterday')); // WHERE request_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $requestDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByRequestDate($requestDate = null, $comparison = null)
    {
        if (is_array($requestDate)) {
            $useMinMax = false;
            if (isset($requestDate['min'])) {
                $this->addUsingAlias(WsTokenPeer::REQUEST_DATE, $requestDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($requestDate['max'])) {
                $this->addUsingAlias(WsTokenPeer::REQUEST_DATE, $requestDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsTokenPeer::REQUEST_DATE, $requestDate, $comparison);
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
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(WsTokenPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(WsTokenPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(WsTokenPeer::EXPIRED_DATE, $expiredDate, $comparison);
    }

    /**
     * Filter the query on the ws_aplikasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWsAplikasiId('fooValue');   // WHERE ws_aplikasi_id = 'fooValue'
     * $query->filterByWsAplikasiId('%fooValue%'); // WHERE ws_aplikasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $wsAplikasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function filterByWsAplikasiId($wsAplikasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($wsAplikasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $wsAplikasiId)) {
                $wsAplikasiId = str_replace('*', '%', $wsAplikasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(WsTokenPeer::WS_APLIKASI_ID, $wsAplikasiId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   WsToken $wsToken Object to remove from the list of results
     *
     * @return WsTokenQuery The current query, for fluid interface
     */
    public function prune($wsToken = null)
    {
        if ($wsToken) {
            $this->addUsingAlias(WsTokenPeer::WS_TOKEN_ID, $wsToken->getWsTokenId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
