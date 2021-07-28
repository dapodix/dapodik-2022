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
use DataDikdas\Model\JadwalPaud;
use DataDikdas\Model\JadwalPaudPeer;
use DataDikdas\Model\JadwalPaudQuery;
use DataDikdas\Model\SekolahPaud;

/**
 * Base class that represents a query for the 'ref.jadwal_paud' table.
 *
 * 
 *
 * @method JadwalPaudQuery orderByJadwalId($order = Criteria::ASC) Order by the jadwal_id column
 * @method JadwalPaudQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JadwalPaudQuery orderByKesehatan($order = Criteria::ASC) Order by the kesehatan column
 * @method JadwalPaudQuery orderByPamts($order = Criteria::ASC) Order by the pamts column
 * @method JadwalPaudQuery orderByDdtk($order = Criteria::ASC) Order by the ddtk column
 * @method JadwalPaudQuery orderByFreqParenting($order = Criteria::ASC) Order by the freq_parenting column
 * @method JadwalPaudQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JadwalPaudQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JadwalPaudQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JadwalPaudQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JadwalPaudQuery groupByJadwalId() Group by the jadwal_id column
 * @method JadwalPaudQuery groupByNama() Group by the nama column
 * @method JadwalPaudQuery groupByKesehatan() Group by the kesehatan column
 * @method JadwalPaudQuery groupByPamts() Group by the pamts column
 * @method JadwalPaudQuery groupByDdtk() Group by the ddtk column
 * @method JadwalPaudQuery groupByFreqParenting() Group by the freq_parenting column
 * @method JadwalPaudQuery groupByCreateDate() Group by the create_date column
 * @method JadwalPaudQuery groupByLastUpdate() Group by the last_update column
 * @method JadwalPaudQuery groupByExpiredDate() Group by the expired_date column
 * @method JadwalPaudQuery groupByLastSync() Group by the last_sync column
 *
 * @method JadwalPaudQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JadwalPaudQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JadwalPaudQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JadwalPaudQuery leftJoinSekolahPaudRelatedByFreqParenting($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahPaudRelatedByFreqParenting relation
 * @method JadwalPaudQuery rightJoinSekolahPaudRelatedByFreqParenting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahPaudRelatedByFreqParenting relation
 * @method JadwalPaudQuery innerJoinSekolahPaudRelatedByFreqParenting($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahPaudRelatedByFreqParenting relation
 *
 * @method JadwalPaudQuery leftJoinSekolahPaudRelatedByJadwalDdtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahPaudRelatedByJadwalDdtk relation
 * @method JadwalPaudQuery rightJoinSekolahPaudRelatedByJadwalDdtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahPaudRelatedByJadwalDdtk relation
 * @method JadwalPaudQuery innerJoinSekolahPaudRelatedByJadwalDdtk($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahPaudRelatedByJadwalDdtk relation
 *
 * @method JadwalPaudQuery leftJoinSekolahPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahPaudRelatedByJadwalKesehatan relation
 * @method JadwalPaudQuery rightJoinSekolahPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahPaudRelatedByJadwalKesehatan relation
 * @method JadwalPaudQuery innerJoinSekolahPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahPaudRelatedByJadwalKesehatan relation
 *
 * @method JadwalPaudQuery leftJoinSekolahPaudRelatedByJadwalPmtas($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahPaudRelatedByJadwalPmtas relation
 * @method JadwalPaudQuery rightJoinSekolahPaudRelatedByJadwalPmtas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahPaudRelatedByJadwalPmtas relation
 * @method JadwalPaudQuery innerJoinSekolahPaudRelatedByJadwalPmtas($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahPaudRelatedByJadwalPmtas relation
 *
 * @method JadwalPaud findOne(PropelPDO $con = null) Return the first JadwalPaud matching the query
 * @method JadwalPaud findOneOrCreate(PropelPDO $con = null) Return the first JadwalPaud matching the query, or a new JadwalPaud object populated from the query conditions when no match is found
 *
 * @method JadwalPaud findOneByNama(string $nama) Return the first JadwalPaud filtered by the nama column
 * @method JadwalPaud findOneByKesehatan(string $kesehatan) Return the first JadwalPaud filtered by the kesehatan column
 * @method JadwalPaud findOneByPamts(string $pamts) Return the first JadwalPaud filtered by the pamts column
 * @method JadwalPaud findOneByDdtk(string $ddtk) Return the first JadwalPaud filtered by the ddtk column
 * @method JadwalPaud findOneByFreqParenting(string $freq_parenting) Return the first JadwalPaud filtered by the freq_parenting column
 * @method JadwalPaud findOneByCreateDate(string $create_date) Return the first JadwalPaud filtered by the create_date column
 * @method JadwalPaud findOneByLastUpdate(string $last_update) Return the first JadwalPaud filtered by the last_update column
 * @method JadwalPaud findOneByExpiredDate(string $expired_date) Return the first JadwalPaud filtered by the expired_date column
 * @method JadwalPaud findOneByLastSync(string $last_sync) Return the first JadwalPaud filtered by the last_sync column
 *
 * @method array findByJadwalId(string $jadwal_id) Return JadwalPaud objects filtered by the jadwal_id column
 * @method array findByNama(string $nama) Return JadwalPaud objects filtered by the nama column
 * @method array findByKesehatan(string $kesehatan) Return JadwalPaud objects filtered by the kesehatan column
 * @method array findByPamts(string $pamts) Return JadwalPaud objects filtered by the pamts column
 * @method array findByDdtk(string $ddtk) Return JadwalPaud objects filtered by the ddtk column
 * @method array findByFreqParenting(string $freq_parenting) Return JadwalPaud objects filtered by the freq_parenting column
 * @method array findByCreateDate(string $create_date) Return JadwalPaud objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JadwalPaud objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JadwalPaud objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JadwalPaud objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJadwalPaudQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJadwalPaudQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JadwalPaud', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JadwalPaudQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JadwalPaudQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JadwalPaudQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JadwalPaudQuery) {
            return $criteria;
        }
        $query = new JadwalPaudQuery();
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
     * @return   JadwalPaud|JadwalPaud[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JadwalPaudPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JadwalPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JadwalPaud A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJadwalId($key, $con = null)
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
     * @return                 JadwalPaud A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jadwal_id", "nama", "kesehatan", "pamts", "ddtk", "freq_parenting", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jadwal_paud" WHERE "jadwal_id" = :p0';
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
            $obj = new JadwalPaud();
            $obj->hydrate($row);
            JadwalPaudPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JadwalPaud|JadwalPaud[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JadwalPaud[]|mixed the list of results, formatted by the current formatter
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
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jadwal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJadwalId(1234); // WHERE jadwal_id = 1234
     * $query->filterByJadwalId(array(12, 34)); // WHERE jadwal_id IN (12, 34)
     * $query->filterByJadwalId(array('min' => 12)); // WHERE jadwal_id >= 12
     * $query->filterByJadwalId(array('max' => 12)); // WHERE jadwal_id <= 12
     * </code>
     *
     * @param     mixed $jadwalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByJadwalId($jadwalId = null, $comparison = null)
    {
        if (is_array($jadwalId)) {
            $useMinMax = false;
            if (isset($jadwalId['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $jadwalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jadwalId['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $jadwalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $jadwalId, $comparison);
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
     * @return JadwalPaudQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JadwalPaudPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the kesehatan column
     *
     * Example usage:
     * <code>
     * $query->filterByKesehatan(1234); // WHERE kesehatan = 1234
     * $query->filterByKesehatan(array(12, 34)); // WHERE kesehatan IN (12, 34)
     * $query->filterByKesehatan(array('min' => 12)); // WHERE kesehatan >= 12
     * $query->filterByKesehatan(array('max' => 12)); // WHERE kesehatan <= 12
     * </code>
     *
     * @param     mixed $kesehatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByKesehatan($kesehatan = null, $comparison = null)
    {
        if (is_array($kesehatan)) {
            $useMinMax = false;
            if (isset($kesehatan['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::KESEHATAN, $kesehatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kesehatan['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::KESEHATAN, $kesehatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::KESEHATAN, $kesehatan, $comparison);
    }

    /**
     * Filter the query on the pamts column
     *
     * Example usage:
     * <code>
     * $query->filterByPamts(1234); // WHERE pamts = 1234
     * $query->filterByPamts(array(12, 34)); // WHERE pamts IN (12, 34)
     * $query->filterByPamts(array('min' => 12)); // WHERE pamts >= 12
     * $query->filterByPamts(array('max' => 12)); // WHERE pamts <= 12
     * </code>
     *
     * @param     mixed $pamts The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByPamts($pamts = null, $comparison = null)
    {
        if (is_array($pamts)) {
            $useMinMax = false;
            if (isset($pamts['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::PAMTS, $pamts['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pamts['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::PAMTS, $pamts['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::PAMTS, $pamts, $comparison);
    }

    /**
     * Filter the query on the ddtk column
     *
     * Example usage:
     * <code>
     * $query->filterByDdtk(1234); // WHERE ddtk = 1234
     * $query->filterByDdtk(array(12, 34)); // WHERE ddtk IN (12, 34)
     * $query->filterByDdtk(array('min' => 12)); // WHERE ddtk >= 12
     * $query->filterByDdtk(array('max' => 12)); // WHERE ddtk <= 12
     * </code>
     *
     * @param     mixed $ddtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByDdtk($ddtk = null, $comparison = null)
    {
        if (is_array($ddtk)) {
            $useMinMax = false;
            if (isset($ddtk['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::DDTK, $ddtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ddtk['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::DDTK, $ddtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::DDTK, $ddtk, $comparison);
    }

    /**
     * Filter the query on the freq_parenting column
     *
     * Example usage:
     * <code>
     * $query->filterByFreqParenting(1234); // WHERE freq_parenting = 1234
     * $query->filterByFreqParenting(array(12, 34)); // WHERE freq_parenting IN (12, 34)
     * $query->filterByFreqParenting(array('min' => 12)); // WHERE freq_parenting >= 12
     * $query->filterByFreqParenting(array('max' => 12)); // WHERE freq_parenting <= 12
     * </code>
     *
     * @param     mixed $freqParenting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByFreqParenting($freqParenting = null, $comparison = null)
    {
        if (is_array($freqParenting)) {
            $useMinMax = false;
            if (isset($freqParenting['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::FREQ_PARENTING, $freqParenting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freqParenting['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::FREQ_PARENTING, $freqParenting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::FREQ_PARENTING, $freqParenting, $comparison);
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
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JadwalPaudPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JadwalPaudPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JadwalPaudPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related SekolahPaud object
     *
     * @param   SekolahPaud|PropelObjectCollection $sekolahPaud  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahPaudRelatedByFreqParenting($sekolahPaud, $comparison = null)
    {
        if ($sekolahPaud instanceof SekolahPaud) {
            return $this
                ->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $sekolahPaud->getFreqParenting(), $comparison);
        } elseif ($sekolahPaud instanceof PropelObjectCollection) {
            return $this
                ->useSekolahPaudRelatedByFreqParentingQuery()
                ->filterByPrimaryKeys($sekolahPaud->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahPaudRelatedByFreqParenting() only accepts arguments of type SekolahPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahPaudRelatedByFreqParenting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function joinSekolahPaudRelatedByFreqParenting($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahPaudRelatedByFreqParenting');

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
            $this->addJoinObject($join, 'SekolahPaudRelatedByFreqParenting');
        }

        return $this;
    }

    /**
     * Use the SekolahPaudRelatedByFreqParenting relation SekolahPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahPaudQuery A secondary query class using the current class as primary query
     */
    public function useSekolahPaudRelatedByFreqParentingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahPaudRelatedByFreqParenting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahPaudRelatedByFreqParenting', '\DataDikdas\Model\SekolahPaudQuery');
    }

    /**
     * Filter the query by a related SekolahPaud object
     *
     * @param   SekolahPaud|PropelObjectCollection $sekolahPaud  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahPaudRelatedByJadwalDdtk($sekolahPaud, $comparison = null)
    {
        if ($sekolahPaud instanceof SekolahPaud) {
            return $this
                ->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $sekolahPaud->getJadwalDdtk(), $comparison);
        } elseif ($sekolahPaud instanceof PropelObjectCollection) {
            return $this
                ->useSekolahPaudRelatedByJadwalDdtkQuery()
                ->filterByPrimaryKeys($sekolahPaud->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahPaudRelatedByJadwalDdtk() only accepts arguments of type SekolahPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahPaudRelatedByJadwalDdtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function joinSekolahPaudRelatedByJadwalDdtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahPaudRelatedByJadwalDdtk');

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
            $this->addJoinObject($join, 'SekolahPaudRelatedByJadwalDdtk');
        }

        return $this;
    }

    /**
     * Use the SekolahPaudRelatedByJadwalDdtk relation SekolahPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahPaudQuery A secondary query class using the current class as primary query
     */
    public function useSekolahPaudRelatedByJadwalDdtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahPaudRelatedByJadwalDdtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahPaudRelatedByJadwalDdtk', '\DataDikdas\Model\SekolahPaudQuery');
    }

    /**
     * Filter the query by a related SekolahPaud object
     *
     * @param   SekolahPaud|PropelObjectCollection $sekolahPaud  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahPaudRelatedByJadwalKesehatan($sekolahPaud, $comparison = null)
    {
        if ($sekolahPaud instanceof SekolahPaud) {
            return $this
                ->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $sekolahPaud->getJadwalKesehatan(), $comparison);
        } elseif ($sekolahPaud instanceof PropelObjectCollection) {
            return $this
                ->useSekolahPaudRelatedByJadwalKesehatanQuery()
                ->filterByPrimaryKeys($sekolahPaud->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahPaudRelatedByJadwalKesehatan() only accepts arguments of type SekolahPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahPaudRelatedByJadwalKesehatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function joinSekolahPaudRelatedByJadwalKesehatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahPaudRelatedByJadwalKesehatan');

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
            $this->addJoinObject($join, 'SekolahPaudRelatedByJadwalKesehatan');
        }

        return $this;
    }

    /**
     * Use the SekolahPaudRelatedByJadwalKesehatan relation SekolahPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahPaudQuery A secondary query class using the current class as primary query
     */
    public function useSekolahPaudRelatedByJadwalKesehatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahPaudRelatedByJadwalKesehatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahPaudRelatedByJadwalKesehatan', '\DataDikdas\Model\SekolahPaudQuery');
    }

    /**
     * Filter the query by a related SekolahPaud object
     *
     * @param   SekolahPaud|PropelObjectCollection $sekolahPaud  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JadwalPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahPaudRelatedByJadwalPmtas($sekolahPaud, $comparison = null)
    {
        if ($sekolahPaud instanceof SekolahPaud) {
            return $this
                ->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $sekolahPaud->getJadwalPmtas(), $comparison);
        } elseif ($sekolahPaud instanceof PropelObjectCollection) {
            return $this
                ->useSekolahPaudRelatedByJadwalPmtasQuery()
                ->filterByPrimaryKeys($sekolahPaud->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahPaudRelatedByJadwalPmtas() only accepts arguments of type SekolahPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahPaudRelatedByJadwalPmtas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function joinSekolahPaudRelatedByJadwalPmtas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahPaudRelatedByJadwalPmtas');

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
            $this->addJoinObject($join, 'SekolahPaudRelatedByJadwalPmtas');
        }

        return $this;
    }

    /**
     * Use the SekolahPaudRelatedByJadwalPmtas relation SekolahPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahPaudQuery A secondary query class using the current class as primary query
     */
    public function useSekolahPaudRelatedByJadwalPmtasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahPaudRelatedByJadwalPmtas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahPaudRelatedByJadwalPmtas', '\DataDikdas\Model\SekolahPaudQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JadwalPaud $jadwalPaud Object to remove from the list of results
     *
     * @return JadwalPaudQuery The current query, for fluid interface
     */
    public function prune($jadwalPaud = null)
    {
        if ($jadwalPaud) {
            $this->addUsingAlias(JadwalPaudPeer::JADWAL_ID, $jadwalPaud->getJadwalId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
