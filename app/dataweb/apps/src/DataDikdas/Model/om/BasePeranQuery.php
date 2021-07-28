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
use DataDikdas\Model\BentukPendidikan;
use DataDikdas\Model\MenuRole;
use DataDikdas\Model\Peran;
use DataDikdas\Model\PeranPeer;
use DataDikdas\Model\PeranQuery;
use DataDikdas\Model\RolePengguna;

/**
 * Base class that represents a query for the 'man_akses.peran' table.
 *
 * 
 *
 * @method PeranQuery orderByPeranId($order = Criteria::ASC) Order by the peran_id column
 * @method PeranQuery orderByBentukPendidikanId($order = Criteria::ASC) Order by the bentuk_pendidikan_id column
 * @method PeranQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PeranQuery orderByAPerluSk($order = Criteria::ASC) Order by the a_perlu_sk column
 * @method PeranQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PeranQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PeranQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PeranQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PeranQuery groupByPeranId() Group by the peran_id column
 * @method PeranQuery groupByBentukPendidikanId() Group by the bentuk_pendidikan_id column
 * @method PeranQuery groupByNama() Group by the nama column
 * @method PeranQuery groupByAPerluSk() Group by the a_perlu_sk column
 * @method PeranQuery groupByCreateDate() Group by the create_date column
 * @method PeranQuery groupByLastUpdate() Group by the last_update column
 * @method PeranQuery groupByExpiredDate() Group by the expired_date column
 * @method PeranQuery groupByLastSync() Group by the last_sync column
 *
 * @method PeranQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PeranQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PeranQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PeranQuery leftJoinBentukPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the BentukPendidikan relation
 * @method PeranQuery rightJoinBentukPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BentukPendidikan relation
 * @method PeranQuery innerJoinBentukPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the BentukPendidikan relation
 *
 * @method PeranQuery leftJoinMenuRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRole relation
 * @method PeranQuery rightJoinMenuRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRole relation
 * @method PeranQuery innerJoinMenuRole($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRole relation
 *
 * @method PeranQuery leftJoinRolePengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the RolePengguna relation
 * @method PeranQuery rightJoinRolePengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RolePengguna relation
 * @method PeranQuery innerJoinRolePengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the RolePengguna relation
 *
 * @method Peran findOne(PropelPDO $con = null) Return the first Peran matching the query
 * @method Peran findOneOrCreate(PropelPDO $con = null) Return the first Peran matching the query, or a new Peran object populated from the query conditions when no match is found
 *
 * @method Peran findOneByBentukPendidikanId(int $bentuk_pendidikan_id) Return the first Peran filtered by the bentuk_pendidikan_id column
 * @method Peran findOneByNama(string $nama) Return the first Peran filtered by the nama column
 * @method Peran findOneByAPerluSk(string $a_perlu_sk) Return the first Peran filtered by the a_perlu_sk column
 * @method Peran findOneByCreateDate(string $create_date) Return the first Peran filtered by the create_date column
 * @method Peran findOneByLastUpdate(string $last_update) Return the first Peran filtered by the last_update column
 * @method Peran findOneByExpiredDate(string $expired_date) Return the first Peran filtered by the expired_date column
 * @method Peran findOneByLastSync(string $last_sync) Return the first Peran filtered by the last_sync column
 *
 * @method array findByPeranId(int $peran_id) Return Peran objects filtered by the peran_id column
 * @method array findByBentukPendidikanId(int $bentuk_pendidikan_id) Return Peran objects filtered by the bentuk_pendidikan_id column
 * @method array findByNama(string $nama) Return Peran objects filtered by the nama column
 * @method array findByAPerluSk(string $a_perlu_sk) Return Peran objects filtered by the a_perlu_sk column
 * @method array findByCreateDate(string $create_date) Return Peran objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Peran objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Peran objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Peran objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePeranQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePeranQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Peran', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PeranQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PeranQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PeranQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PeranQuery) {
            return $criteria;
        }
        $query = new PeranQuery();
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
     * @return   Peran|Peran[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PeranPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PeranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Peran A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPeranId($key, $con = null)
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
     * @return                 Peran A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "peran_id", "bentuk_pendidikan_id", "nama", "a_perlu_sk", "create_date", "last_update", "expired_date", "last_sync" FROM "man_akses"."peran" WHERE "peran_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Peran();
            $obj->hydrate($row);
            PeranPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Peran|Peran[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Peran[]|mixed the list of results, formatted by the current formatter
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
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PeranPeer::PERAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PeranPeer::PERAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the peran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranId(1234); // WHERE peran_id = 1234
     * $query->filterByPeranId(array(12, 34)); // WHERE peran_id IN (12, 34)
     * $query->filterByPeranId(array('min' => 12)); // WHERE peran_id >= 12
     * $query->filterByPeranId(array('max' => 12)); // WHERE peran_id <= 12
     * </code>
     *
     * @param     mixed $peranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByPeranId($peranId = null, $comparison = null)
    {
        if (is_array($peranId)) {
            $useMinMax = false;
            if (isset($peranId['min'])) {
                $this->addUsingAlias(PeranPeer::PERAN_ID, $peranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peranId['max'])) {
                $this->addUsingAlias(PeranPeer::PERAN_ID, $peranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::PERAN_ID, $peranId, $comparison);
    }

    /**
     * Filter the query on the bentuk_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBentukPendidikanId(1234); // WHERE bentuk_pendidikan_id = 1234
     * $query->filterByBentukPendidikanId(array(12, 34)); // WHERE bentuk_pendidikan_id IN (12, 34)
     * $query->filterByBentukPendidikanId(array('min' => 12)); // WHERE bentuk_pendidikan_id >= 12
     * $query->filterByBentukPendidikanId(array('max' => 12)); // WHERE bentuk_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByBentukPendidikan()
     *
     * @param     mixed $bentukPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByBentukPendidikanId($bentukPendidikanId = null, $comparison = null)
    {
        if (is_array($bentukPendidikanId)) {
            $useMinMax = false;
            if (isset($bentukPendidikanId['min'])) {
                $this->addUsingAlias(PeranPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukPendidikanId['max'])) {
                $this->addUsingAlias(PeranPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikanId, $comparison);
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
     * @return PeranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PeranPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the a_perlu_sk column
     *
     * Example usage:
     * <code>
     * $query->filterByAPerluSk(1234); // WHERE a_perlu_sk = 1234
     * $query->filterByAPerluSk(array(12, 34)); // WHERE a_perlu_sk IN (12, 34)
     * $query->filterByAPerluSk(array('min' => 12)); // WHERE a_perlu_sk >= 12
     * $query->filterByAPerluSk(array('max' => 12)); // WHERE a_perlu_sk <= 12
     * </code>
     *
     * @param     mixed $aPerluSk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByAPerluSk($aPerluSk = null, $comparison = null)
    {
        if (is_array($aPerluSk)) {
            $useMinMax = false;
            if (isset($aPerluSk['min'])) {
                $this->addUsingAlias(PeranPeer::A_PERLU_SK, $aPerluSk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPerluSk['max'])) {
                $this->addUsingAlias(PeranPeer::A_PERLU_SK, $aPerluSk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::A_PERLU_SK, $aPerluSk, $comparison);
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
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PeranPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PeranPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PeranPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PeranPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PeranPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PeranPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PeranQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PeranPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PeranPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PeranPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related BentukPendidikan object
     *
     * @param   BentukPendidikan|PropelObjectCollection $bentukPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PeranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBentukPendidikan($bentukPendidikan, $comparison = null)
    {
        if ($bentukPendidikan instanceof BentukPendidikan) {
            return $this
                ->addUsingAlias(PeranPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->getBentukPendidikanId(), $comparison);
        } elseif ($bentukPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PeranPeer::BENTUK_PENDIDIKAN_ID, $bentukPendidikan->toKeyValue('PrimaryKey', 'BentukPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByBentukPendidikan() only accepts arguments of type BentukPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BentukPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function joinBentukPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BentukPendidikan');

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
            $this->addJoinObject($join, 'BentukPendidikan');
        }

        return $this;
    }

    /**
     * Use the BentukPendidikan relation BentukPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BentukPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useBentukPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBentukPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BentukPendidikan', '\DataDikdas\Model\BentukPendidikanQuery');
    }

    /**
     * Filter the query by a related MenuRole object
     *
     * @param   MenuRole|PropelObjectCollection $menuRole  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PeranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRole($menuRole, $comparison = null)
    {
        if ($menuRole instanceof MenuRole) {
            return $this
                ->addUsingAlias(PeranPeer::PERAN_ID, $menuRole->getPeranId(), $comparison);
        } elseif ($menuRole instanceof PropelObjectCollection) {
            return $this
                ->useMenuRoleQuery()
                ->filterByPrimaryKeys($menuRole->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMenuRole() only accepts arguments of type MenuRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function joinMenuRole($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRole');

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
            $this->addJoinObject($join, 'MenuRole');
        }

        return $this;
    }

    /**
     * Use the MenuRole relation MenuRole object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuRoleQuery A secondary query class using the current class as primary query
     */
    public function useMenuRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMenuRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRole', '\DataDikdas\Model\MenuRoleQuery');
    }

    /**
     * Filter the query by a related RolePengguna object
     *
     * @param   RolePengguna|PropelObjectCollection $rolePengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PeranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRolePengguna($rolePengguna, $comparison = null)
    {
        if ($rolePengguna instanceof RolePengguna) {
            return $this
                ->addUsingAlias(PeranPeer::PERAN_ID, $rolePengguna->getPeranId(), $comparison);
        } elseif ($rolePengguna instanceof PropelObjectCollection) {
            return $this
                ->useRolePenggunaQuery()
                ->filterByPrimaryKeys($rolePengguna->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRolePengguna() only accepts arguments of type RolePengguna or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RolePengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function joinRolePengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RolePengguna');

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
            $this->addJoinObject($join, 'RolePengguna');
        }

        return $this;
    }

    /**
     * Use the RolePengguna relation RolePengguna object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RolePenggunaQuery A secondary query class using the current class as primary query
     */
    public function useRolePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRolePengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RolePengguna', '\DataDikdas\Model\RolePenggunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Peran $peran Object to remove from the list of results
     *
     * @return PeranQuery The current query, for fluid interface
     */
    public function prune($peran = null)
    {
        if ($peran) {
            $this->addUsingAlias(PeranPeer::PERAN_ID, $peran->getPeranId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
