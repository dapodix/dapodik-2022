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
use DataDikdas\Model\JenisRombel;
use DataDikdas\Model\JenisRombelPeer;
use DataDikdas\Model\JenisRombelQuery;

/**
 * Base class that represents a query for the 'ref.jenis_rombel' table.
 *
 * 
 *
 * @method JenisRombelQuery orderByJenisRombel($order = Criteria::ASC) Order by the jenis_rombel column
 * @method JenisRombelQuery orderByNmJenisRombel($order = Criteria::ASC) Order by the nm_jenis_rombel column
 * @method JenisRombelQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisRombelQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisRombelQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisRombelQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisRombelQuery groupByJenisRombel() Group by the jenis_rombel column
 * @method JenisRombelQuery groupByNmJenisRombel() Group by the nm_jenis_rombel column
 * @method JenisRombelQuery groupByCreateDate() Group by the create_date column
 * @method JenisRombelQuery groupByLastUpdate() Group by the last_update column
 * @method JenisRombelQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisRombelQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisRombelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisRombelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisRombelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisRombel findOne(PropelPDO $con = null) Return the first JenisRombel matching the query
 * @method JenisRombel findOneOrCreate(PropelPDO $con = null) Return the first JenisRombel matching the query, or a new JenisRombel object populated from the query conditions when no match is found
 *
 * @method JenisRombel findOneByNmJenisRombel(string $nm_jenis_rombel) Return the first JenisRombel filtered by the nm_jenis_rombel column
 * @method JenisRombel findOneByCreateDate(string $create_date) Return the first JenisRombel filtered by the create_date column
 * @method JenisRombel findOneByLastUpdate(string $last_update) Return the first JenisRombel filtered by the last_update column
 * @method JenisRombel findOneByExpiredDate(string $expired_date) Return the first JenisRombel filtered by the expired_date column
 * @method JenisRombel findOneByLastSync(string $last_sync) Return the first JenisRombel filtered by the last_sync column
 *
 * @method array findByJenisRombel(string $jenis_rombel) Return JenisRombel objects filtered by the jenis_rombel column
 * @method array findByNmJenisRombel(string $nm_jenis_rombel) Return JenisRombel objects filtered by the nm_jenis_rombel column
 * @method array findByCreateDate(string $create_date) Return JenisRombel objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisRombel objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisRombel objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisRombel objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisRombelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisRombelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisRombel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisRombelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisRombelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisRombelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisRombelQuery) {
            return $criteria;
        }
        $query = new JenisRombelQuery();
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
     * @return   JenisRombel|JenisRombel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisRombelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisRombelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisRombel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisRombel($key, $con = null)
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
     * @return                 JenisRombel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_rombel", "nm_jenis_rombel", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_rombel" WHERE "jenis_rombel" = :p0';
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
            $obj = new JenisRombel();
            $obj->hydrate($row);
            JenisRombelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisRombel|JenisRombel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisRombel[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_rombel column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisRombel(1234); // WHERE jenis_rombel = 1234
     * $query->filterByJenisRombel(array(12, 34)); // WHERE jenis_rombel IN (12, 34)
     * $query->filterByJenisRombel(array('min' => 12)); // WHERE jenis_rombel >= 12
     * $query->filterByJenisRombel(array('max' => 12)); // WHERE jenis_rombel <= 12
     * </code>
     *
     * @param     mixed $jenisRombel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByJenisRombel($jenisRombel = null, $comparison = null)
    {
        if (is_array($jenisRombel)) {
            $useMinMax = false;
            if (isset($jenisRombel['min'])) {
                $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $jenisRombel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisRombel['max'])) {
                $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $jenisRombel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $jenisRombel, $comparison);
    }

    /**
     * Filter the query on the nm_jenis_rombel column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJenisRombel('fooValue');   // WHERE nm_jenis_rombel = 'fooValue'
     * $query->filterByNmJenisRombel('%fooValue%'); // WHERE nm_jenis_rombel LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJenisRombel The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByNmJenisRombel($nmJenisRombel = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJenisRombel)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJenisRombel)) {
                $nmJenisRombel = str_replace('*', '%', $nmJenisRombel);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::NM_JENIS_ROMBEL, $nmJenisRombel, $comparison);
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
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisRombelPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisRombelPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisRombelPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisRombelPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisRombelPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisRombelPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisRombelPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisRombelPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisRombelPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   JenisRombel $jenisRombel Object to remove from the list of results
     *
     * @return JenisRombelQuery The current query, for fluid interface
     */
    public function prune($jenisRombel = null)
    {
        if ($jenisRombel) {
            $this->addUsingAlias(JenisRombelPeer::JENIS_ROMBEL, $jenisRombel->getJenisRombel(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
