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
use DataDikdas\Model\BatasWaktuRapor;
use DataDikdas\Model\BatasWaktuRaporPeer;
use DataDikdas\Model\BatasWaktuRaporQuery;
use DataDikdas\Model\Semester;

/**
 * Base class that represents a query for the 'ref.batas_waktu_rapor' table.
 *
 * 
 *
 * @method BatasWaktuRaporQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method BatasWaktuRaporQuery orderByTglRaporMulai($order = Criteria::ASC) Order by the tgl_rapor_mulai column
 * @method BatasWaktuRaporQuery orderByTglRaporSelesai($order = Criteria::ASC) Order by the tgl_rapor_selesai column
 * @method BatasWaktuRaporQuery orderByTglUsmMulai($order = Criteria::ASC) Order by the tgl_usm_mulai column
 * @method BatasWaktuRaporQuery orderByTglUsmSelesai($order = Criteria::ASC) Order by the tgl_usm_selesai column
 * @method BatasWaktuRaporQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BatasWaktuRaporQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BatasWaktuRaporQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method BatasWaktuRaporQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method BatasWaktuRaporQuery groupBySemesterId() Group by the semester_id column
 * @method BatasWaktuRaporQuery groupByTglRaporMulai() Group by the tgl_rapor_mulai column
 * @method BatasWaktuRaporQuery groupByTglRaporSelesai() Group by the tgl_rapor_selesai column
 * @method BatasWaktuRaporQuery groupByTglUsmMulai() Group by the tgl_usm_mulai column
 * @method BatasWaktuRaporQuery groupByTglUsmSelesai() Group by the tgl_usm_selesai column
 * @method BatasWaktuRaporQuery groupByCreateDate() Group by the create_date column
 * @method BatasWaktuRaporQuery groupByLastUpdate() Group by the last_update column
 * @method BatasWaktuRaporQuery groupByExpiredDate() Group by the expired_date column
 * @method BatasWaktuRaporQuery groupByLastSync() Group by the last_sync column
 *
 * @method BatasWaktuRaporQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BatasWaktuRaporQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BatasWaktuRaporQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BatasWaktuRaporQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method BatasWaktuRaporQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method BatasWaktuRaporQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method BatasWaktuRapor findOne(PropelPDO $con = null) Return the first BatasWaktuRapor matching the query
 * @method BatasWaktuRapor findOneOrCreate(PropelPDO $con = null) Return the first BatasWaktuRapor matching the query, or a new BatasWaktuRapor object populated from the query conditions when no match is found
 *
 * @method BatasWaktuRapor findOneByTglRaporMulai(string $tgl_rapor_mulai) Return the first BatasWaktuRapor filtered by the tgl_rapor_mulai column
 * @method BatasWaktuRapor findOneByTglRaporSelesai(string $tgl_rapor_selesai) Return the first BatasWaktuRapor filtered by the tgl_rapor_selesai column
 * @method BatasWaktuRapor findOneByTglUsmMulai(string $tgl_usm_mulai) Return the first BatasWaktuRapor filtered by the tgl_usm_mulai column
 * @method BatasWaktuRapor findOneByTglUsmSelesai(string $tgl_usm_selesai) Return the first BatasWaktuRapor filtered by the tgl_usm_selesai column
 * @method BatasWaktuRapor findOneByCreateDate(string $create_date) Return the first BatasWaktuRapor filtered by the create_date column
 * @method BatasWaktuRapor findOneByLastUpdate(string $last_update) Return the first BatasWaktuRapor filtered by the last_update column
 * @method BatasWaktuRapor findOneByExpiredDate(string $expired_date) Return the first BatasWaktuRapor filtered by the expired_date column
 * @method BatasWaktuRapor findOneByLastSync(string $last_sync) Return the first BatasWaktuRapor filtered by the last_sync column
 *
 * @method array findBySemesterId(string $semester_id) Return BatasWaktuRapor objects filtered by the semester_id column
 * @method array findByTglRaporMulai(string $tgl_rapor_mulai) Return BatasWaktuRapor objects filtered by the tgl_rapor_mulai column
 * @method array findByTglRaporSelesai(string $tgl_rapor_selesai) Return BatasWaktuRapor objects filtered by the tgl_rapor_selesai column
 * @method array findByTglUsmMulai(string $tgl_usm_mulai) Return BatasWaktuRapor objects filtered by the tgl_usm_mulai column
 * @method array findByTglUsmSelesai(string $tgl_usm_selesai) Return BatasWaktuRapor objects filtered by the tgl_usm_selesai column
 * @method array findByCreateDate(string $create_date) Return BatasWaktuRapor objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BatasWaktuRapor objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return BatasWaktuRapor objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return BatasWaktuRapor objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBatasWaktuRaporQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBatasWaktuRaporQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BatasWaktuRapor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BatasWaktuRaporQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BatasWaktuRaporQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BatasWaktuRaporQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BatasWaktuRaporQuery) {
            return $criteria;
        }
        $query = new BatasWaktuRaporQuery();
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
     * @return   BatasWaktuRapor|BatasWaktuRapor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BatasWaktuRaporPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BatasWaktuRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BatasWaktuRapor A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySemesterId($key, $con = null)
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
     * @return                 BatasWaktuRapor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "semester_id", "tgl_rapor_mulai", "tgl_rapor_selesai", "tgl_usm_mulai", "tgl_usm_selesai", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."batas_waktu_rapor" WHERE "semester_id" = :p0';
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
            $obj = new BatasWaktuRapor();
            $obj->hydrate($row);
            BatasWaktuRaporPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BatasWaktuRapor|BatasWaktuRapor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BatasWaktuRapor[]|mixed the list of results, formatted by the current formatter
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
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the tgl_rapor_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTglRaporMulai('2011-03-14'); // WHERE tgl_rapor_mulai = '2011-03-14'
     * $query->filterByTglRaporMulai('now'); // WHERE tgl_rapor_mulai = '2011-03-14'
     * $query->filterByTglRaporMulai(array('max' => 'yesterday')); // WHERE tgl_rapor_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglRaporMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByTglRaporMulai($tglRaporMulai = null, $comparison = null)
    {
        if (is_array($tglRaporMulai)) {
            $useMinMax = false;
            if (isset($tglRaporMulai['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_MULAI, $tglRaporMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglRaporMulai['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_MULAI, $tglRaporMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_MULAI, $tglRaporMulai, $comparison);
    }

    /**
     * Filter the query on the tgl_rapor_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTglRaporSelesai('2011-03-14'); // WHERE tgl_rapor_selesai = '2011-03-14'
     * $query->filterByTglRaporSelesai('now'); // WHERE tgl_rapor_selesai = '2011-03-14'
     * $query->filterByTglRaporSelesai(array('max' => 'yesterday')); // WHERE tgl_rapor_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglRaporSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByTglRaporSelesai($tglRaporSelesai = null, $comparison = null)
    {
        if (is_array($tglRaporSelesai)) {
            $useMinMax = false;
            if (isset($tglRaporSelesai['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_SELESAI, $tglRaporSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglRaporSelesai['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_SELESAI, $tglRaporSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::TGL_RAPOR_SELESAI, $tglRaporSelesai, $comparison);
    }

    /**
     * Filter the query on the tgl_usm_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTglUsmMulai('2011-03-14'); // WHERE tgl_usm_mulai = '2011-03-14'
     * $query->filterByTglUsmMulai('now'); // WHERE tgl_usm_mulai = '2011-03-14'
     * $query->filterByTglUsmMulai(array('max' => 'yesterday')); // WHERE tgl_usm_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglUsmMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByTglUsmMulai($tglUsmMulai = null, $comparison = null)
    {
        if (is_array($tglUsmMulai)) {
            $useMinMax = false;
            if (isset($tglUsmMulai['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_MULAI, $tglUsmMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglUsmMulai['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_MULAI, $tglUsmMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_MULAI, $tglUsmMulai, $comparison);
    }

    /**
     * Filter the query on the tgl_usm_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTglUsmSelesai('2011-03-14'); // WHERE tgl_usm_selesai = '2011-03-14'
     * $query->filterByTglUsmSelesai('now'); // WHERE tgl_usm_selesai = '2011-03-14'
     * $query->filterByTglUsmSelesai(array('max' => 'yesterday')); // WHERE tgl_usm_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglUsmSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByTglUsmSelesai($tglUsmSelesai = null, $comparison = null)
    {
        if (is_array($tglUsmSelesai)) {
            $useMinMax = false;
            if (isset($tglUsmSelesai['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_SELESAI, $tglUsmSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglUsmSelesai['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_SELESAI, $tglUsmSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::TGL_USM_SELESAI, $tglUsmSelesai, $comparison);
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
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BatasWaktuRaporPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BatasWaktuRaporPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BatasWaktuRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BatasWaktuRapor $batasWaktuRapor Object to remove from the list of results
     *
     * @return BatasWaktuRaporQuery The current query, for fluid interface
     */
    public function prune($batasWaktuRapor = null)
    {
        if ($batasWaktuRapor) {
            $this->addUsingAlias(BatasWaktuRaporPeer::SEMESTER_ID, $batasWaktuRapor->getSemesterId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
