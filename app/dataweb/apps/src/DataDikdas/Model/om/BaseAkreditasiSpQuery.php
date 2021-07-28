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
use DataDikdas\Model\Akreditasi;
use DataDikdas\Model\AkreditasiSp;
use DataDikdas\Model\AkreditasiSpPeer;
use DataDikdas\Model\AkreditasiSpQuery;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'akreditasi_sp' table.
 *
 * 
 *
 * @method AkreditasiSpQuery orderByAkredSpId($order = Criteria::ASC) Order by the akred_sp_id column
 * @method AkreditasiSpQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method AkreditasiSpQuery orderByAkredSpSk($order = Criteria::ASC) Order by the akred_sp_sk column
 * @method AkreditasiSpQuery orderByAkredSpTmt($order = Criteria::ASC) Order by the akred_sp_tmt column
 * @method AkreditasiSpQuery orderByAkredSpTst($order = Criteria::ASC) Order by the akred_sp_tst column
 * @method AkreditasiSpQuery orderByAkreditasiId($order = Criteria::ASC) Order by the akreditasi_id column
 * @method AkreditasiSpQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method AkreditasiSpQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AkreditasiSpQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AkreditasiSpQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AkreditasiSpQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AkreditasiSpQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AkreditasiSpQuery groupByAkredSpId() Group by the akred_sp_id column
 * @method AkreditasiSpQuery groupBySekolahId() Group by the sekolah_id column
 * @method AkreditasiSpQuery groupByAkredSpSk() Group by the akred_sp_sk column
 * @method AkreditasiSpQuery groupByAkredSpTmt() Group by the akred_sp_tmt column
 * @method AkreditasiSpQuery groupByAkredSpTst() Group by the akred_sp_tst column
 * @method AkreditasiSpQuery groupByAkreditasiId() Group by the akreditasi_id column
 * @method AkreditasiSpQuery groupByLaId() Group by the la_id column
 * @method AkreditasiSpQuery groupByCreateDate() Group by the create_date column
 * @method AkreditasiSpQuery groupByLastUpdate() Group by the last_update column
 * @method AkreditasiSpQuery groupBySoftDelete() Group by the soft_delete column
 * @method AkreditasiSpQuery groupByLastSync() Group by the last_sync column
 * @method AkreditasiSpQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AkreditasiSpQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AkreditasiSpQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AkreditasiSpQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AkreditasiSpQuery leftJoinAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Akreditasi relation
 * @method AkreditasiSpQuery rightJoinAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Akreditasi relation
 * @method AkreditasiSpQuery innerJoinAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Akreditasi relation
 *
 * @method AkreditasiSpQuery leftJoinLembagaAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaAkreditasi relation
 * @method AkreditasiSpQuery rightJoinLembagaAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaAkreditasi relation
 * @method AkreditasiSpQuery innerJoinLembagaAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaAkreditasi relation
 *
 * @method AkreditasiSpQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method AkreditasiSpQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method AkreditasiSpQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method AkreditasiSp findOne(PropelPDO $con = null) Return the first AkreditasiSp matching the query
 * @method AkreditasiSp findOneOrCreate(PropelPDO $con = null) Return the first AkreditasiSp matching the query, or a new AkreditasiSp object populated from the query conditions when no match is found
 *
 * @method AkreditasiSp findOneBySekolahId(string $sekolah_id) Return the first AkreditasiSp filtered by the sekolah_id column
 * @method AkreditasiSp findOneByAkredSpSk(string $akred_sp_sk) Return the first AkreditasiSp filtered by the akred_sp_sk column
 * @method AkreditasiSp findOneByAkredSpTmt(string $akred_sp_tmt) Return the first AkreditasiSp filtered by the akred_sp_tmt column
 * @method AkreditasiSp findOneByAkredSpTst(string $akred_sp_tst) Return the first AkreditasiSp filtered by the akred_sp_tst column
 * @method AkreditasiSp findOneByAkreditasiId(string $akreditasi_id) Return the first AkreditasiSp filtered by the akreditasi_id column
 * @method AkreditasiSp findOneByLaId(string $la_id) Return the first AkreditasiSp filtered by the la_id column
 * @method AkreditasiSp findOneByCreateDate(string $create_date) Return the first AkreditasiSp filtered by the create_date column
 * @method AkreditasiSp findOneByLastUpdate(string $last_update) Return the first AkreditasiSp filtered by the last_update column
 * @method AkreditasiSp findOneBySoftDelete(string $soft_delete) Return the first AkreditasiSp filtered by the soft_delete column
 * @method AkreditasiSp findOneByLastSync(string $last_sync) Return the first AkreditasiSp filtered by the last_sync column
 * @method AkreditasiSp findOneByUpdaterId(string $updater_id) Return the first AkreditasiSp filtered by the updater_id column
 *
 * @method array findByAkredSpId(string $akred_sp_id) Return AkreditasiSp objects filtered by the akred_sp_id column
 * @method array findBySekolahId(string $sekolah_id) Return AkreditasiSp objects filtered by the sekolah_id column
 * @method array findByAkredSpSk(string $akred_sp_sk) Return AkreditasiSp objects filtered by the akred_sp_sk column
 * @method array findByAkredSpTmt(string $akred_sp_tmt) Return AkreditasiSp objects filtered by the akred_sp_tmt column
 * @method array findByAkredSpTst(string $akred_sp_tst) Return AkreditasiSp objects filtered by the akred_sp_tst column
 * @method array findByAkreditasiId(string $akreditasi_id) Return AkreditasiSp objects filtered by the akreditasi_id column
 * @method array findByLaId(string $la_id) Return AkreditasiSp objects filtered by the la_id column
 * @method array findByCreateDate(string $create_date) Return AkreditasiSp objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AkreditasiSp objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AkreditasiSp objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AkreditasiSp objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AkreditasiSp objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasiSpQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAkreditasiSpQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AkreditasiSp', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AkreditasiSpQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AkreditasiSpQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AkreditasiSpQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AkreditasiSpQuery) {
            return $criteria;
        }
        $query = new AkreditasiSpQuery();
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
     * @return   AkreditasiSp|AkreditasiSp[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AkreditasiSpPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiSpPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AkreditasiSp A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAkredSpId($key, $con = null)
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
     * @return                 AkreditasiSp A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "akred_sp_id", "sekolah_id", "akred_sp_sk", "akred_sp_tmt", "akred_sp_tst", "akreditasi_id", "la_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "akreditasi_sp" WHERE "akred_sp_id" = :p0';
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
            $obj = new AkreditasiSp();
            $obj->hydrate($row);
            AkreditasiSpPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AkreditasiSp|AkreditasiSp[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AkreditasiSp[]|mixed the list of results, formatted by the current formatter
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
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the akred_sp_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAkredSpId('fooValue');   // WHERE akred_sp_id = 'fooValue'
     * $query->filterByAkredSpId('%fooValue%'); // WHERE akred_sp_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $akredSpId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByAkredSpId($akredSpId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($akredSpId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $akredSpId)) {
                $akredSpId = str_replace('*', '%', $akredSpId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_ID, $akredSpId, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiSpPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the akred_sp_sk column
     *
     * Example usage:
     * <code>
     * $query->filterByAkredSpSk('fooValue');   // WHERE akred_sp_sk = 'fooValue'
     * $query->filterByAkredSpSk('%fooValue%'); // WHERE akred_sp_sk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $akredSpSk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByAkredSpSk($akredSpSk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($akredSpSk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $akredSpSk)) {
                $akredSpSk = str_replace('*', '%', $akredSpSk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_SK, $akredSpSk, $comparison);
    }

    /**
     * Filter the query on the akred_sp_tmt column
     *
     * Example usage:
     * <code>
     * $query->filterByAkredSpTmt('2011-03-14'); // WHERE akred_sp_tmt = '2011-03-14'
     * $query->filterByAkredSpTmt('now'); // WHERE akred_sp_tmt = '2011-03-14'
     * $query->filterByAkredSpTmt(array('max' => 'yesterday')); // WHERE akred_sp_tmt > '2011-03-13'
     * </code>
     *
     * @param     mixed $akredSpTmt The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByAkredSpTmt($akredSpTmt = null, $comparison = null)
    {
        if (is_array($akredSpTmt)) {
            $useMinMax = false;
            if (isset($akredSpTmt['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TMT, $akredSpTmt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($akredSpTmt['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TMT, $akredSpTmt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TMT, $akredSpTmt, $comparison);
    }

    /**
     * Filter the query on the akred_sp_tst column
     *
     * Example usage:
     * <code>
     * $query->filterByAkredSpTst('2011-03-14'); // WHERE akred_sp_tst = '2011-03-14'
     * $query->filterByAkredSpTst('now'); // WHERE akred_sp_tst = '2011-03-14'
     * $query->filterByAkredSpTst(array('max' => 'yesterday')); // WHERE akred_sp_tst > '2011-03-13'
     * </code>
     *
     * @param     mixed $akredSpTst The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByAkredSpTst($akredSpTst = null, $comparison = null)
    {
        if (is_array($akredSpTst)) {
            $useMinMax = false;
            if (isset($akredSpTst['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TST, $akredSpTst['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($akredSpTst['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TST, $akredSpTst['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_TST, $akredSpTst, $comparison);
    }

    /**
     * Filter the query on the akreditasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAkreditasiId(1234); // WHERE akreditasi_id = 1234
     * $query->filterByAkreditasiId(array(12, 34)); // WHERE akreditasi_id IN (12, 34)
     * $query->filterByAkreditasiId(array('min' => 12)); // WHERE akreditasi_id >= 12
     * $query->filterByAkreditasiId(array('max' => 12)); // WHERE akreditasi_id <= 12
     * </code>
     *
     * @see       filterByAkreditasi()
     *
     * @param     mixed $akreditasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByAkreditasiId($akreditasiId = null, $comparison = null)
    {
        if (is_array($akreditasiId)) {
            $useMinMax = false;
            if (isset($akreditasiId['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKREDITASI_ID, $akreditasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($akreditasiId['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::AKREDITASI_ID, $akreditasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::AKREDITASI_ID, $akreditasiId, $comparison);
    }

    /**
     * Filter the query on the la_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLaId('fooValue');   // WHERE la_id = 'fooValue'
     * $query->filterByLaId('%fooValue%'); // WHERE la_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $laId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByLaId($laId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($laId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $laId)) {
                $laId = str_replace('*', '%', $laId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::LA_ID, $laId, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AkreditasiSpPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AkreditasiSpPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiSpPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiSpPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Akreditasi object
     *
     * @param   Akreditasi|PropelObjectCollection $akreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasi($akreditasi, $comparison = null)
    {
        if ($akreditasi instanceof Akreditasi) {
            return $this
                ->addUsingAlias(AkreditasiSpPeer::AKREDITASI_ID, $akreditasi->getAkreditasiId(), $comparison);
        } elseif ($akreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiSpPeer::AKREDITASI_ID, $akreditasi->toKeyValue('PrimaryKey', 'AkreditasiId'), $comparison);
        } else {
            throw new PropelException('filterByAkreditasi() only accepts arguments of type Akreditasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Akreditasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function joinAkreditasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Akreditasi');

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
            $this->addJoinObject($join, 'Akreditasi');
        }

        return $this;
    }

    /**
     * Use the Akreditasi relation Akreditasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Akreditasi', '\DataDikdas\Model\AkreditasiQuery');
    }

    /**
     * Filter the query by a related LembagaAkreditasi object
     *
     * @param   LembagaAkreditasi|PropelObjectCollection $lembagaAkreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaAkreditasi($lembagaAkreditasi, $comparison = null)
    {
        if ($lembagaAkreditasi instanceof LembagaAkreditasi) {
            return $this
                ->addUsingAlias(AkreditasiSpPeer::LA_ID, $lembagaAkreditasi->getLaId(), $comparison);
        } elseif ($lembagaAkreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiSpPeer::LA_ID, $lembagaAkreditasi->toKeyValue('PrimaryKey', 'LaId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaAkreditasi() only accepts arguments of type LembagaAkreditasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaAkreditasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function joinLembagaAkreditasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaAkreditasi');

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
            $this->addJoinObject($join, 'LembagaAkreditasi');
        }

        return $this;
    }

    /**
     * Use the LembagaAkreditasi relation LembagaAkreditasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaAkreditasiQuery A secondary query class using the current class as primary query
     */
    public function useLembagaAkreditasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaAkreditasi', '\DataDikdas\Model\LembagaAkreditasiQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiSpQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(AkreditasiSpPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiSpPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return AkreditasiSpQuery The current query, for fluid interface
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
     * @param   AkreditasiSp $akreditasiSp Object to remove from the list of results
     *
     * @return AkreditasiSpQuery The current query, for fluid interface
     */
    public function prune($akreditasiSp = null)
    {
        if ($akreditasiSp) {
            $this->addUsingAlias(AkreditasiSpPeer::AKRED_SP_ID, $akreditasiSp->getAkredSpId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
