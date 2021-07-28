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
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\PemakaiPrasarana;
use DataDikdas\Model\PemakaiPrasaranaPeer;
use DataDikdas\Model\PemakaiPrasaranaQuery;

/**
 * Base class that represents a query for the 'ref.pemakai_prasarana' table.
 *
 * 
 *
 * @method PemakaiPrasaranaQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method PemakaiPrasaranaQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method PemakaiPrasaranaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PemakaiPrasaranaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PemakaiPrasaranaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PemakaiPrasaranaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PemakaiPrasaranaQuery orderByJmlStdMin($order = Criteria::ASC) Order by the jml_std_min column
 *
 * @method PemakaiPrasaranaQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method PemakaiPrasaranaQuery groupByJurusanId() Group by the jurusan_id column
 * @method PemakaiPrasaranaQuery groupByCreateDate() Group by the create_date column
 * @method PemakaiPrasaranaQuery groupByLastUpdate() Group by the last_update column
 * @method PemakaiPrasaranaQuery groupByExpiredDate() Group by the expired_date column
 * @method PemakaiPrasaranaQuery groupByLastSync() Group by the last_sync column
 * @method PemakaiPrasaranaQuery groupByJmlStdMin() Group by the jml_std_min column
 *
 * @method PemakaiPrasaranaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PemakaiPrasaranaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PemakaiPrasaranaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PemakaiPrasaranaQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method PemakaiPrasaranaQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method PemakaiPrasaranaQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method PemakaiPrasaranaQuery leftJoinJenisPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPrasarana relation
 * @method PemakaiPrasaranaQuery rightJoinJenisPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPrasarana relation
 * @method PemakaiPrasaranaQuery innerJoinJenisPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPrasarana relation
 *
 * @method PemakaiPrasarana findOne(PropelPDO $con = null) Return the first PemakaiPrasarana matching the query
 * @method PemakaiPrasarana findOneOrCreate(PropelPDO $con = null) Return the first PemakaiPrasarana matching the query, or a new PemakaiPrasarana object populated from the query conditions when no match is found
 *
 * @method PemakaiPrasarana findOneByJenisPrasaranaId(int $jenis_prasarana_id) Return the first PemakaiPrasarana filtered by the jenis_prasarana_id column
 * @method PemakaiPrasarana findOneByJurusanId(string $jurusan_id) Return the first PemakaiPrasarana filtered by the jurusan_id column
 * @method PemakaiPrasarana findOneByCreateDate(string $create_date) Return the first PemakaiPrasarana filtered by the create_date column
 * @method PemakaiPrasarana findOneByLastUpdate(string $last_update) Return the first PemakaiPrasarana filtered by the last_update column
 * @method PemakaiPrasarana findOneByExpiredDate(string $expired_date) Return the first PemakaiPrasarana filtered by the expired_date column
 * @method PemakaiPrasarana findOneByLastSync(string $last_sync) Return the first PemakaiPrasarana filtered by the last_sync column
 * @method PemakaiPrasarana findOneByJmlStdMin(string $jml_std_min) Return the first PemakaiPrasarana filtered by the jml_std_min column
 *
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return PemakaiPrasarana objects filtered by the jenis_prasarana_id column
 * @method array findByJurusanId(string $jurusan_id) Return PemakaiPrasarana objects filtered by the jurusan_id column
 * @method array findByCreateDate(string $create_date) Return PemakaiPrasarana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PemakaiPrasarana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return PemakaiPrasarana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return PemakaiPrasarana objects filtered by the last_sync column
 * @method array findByJmlStdMin(string $jml_std_min) Return PemakaiPrasarana objects filtered by the jml_std_min column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePemakaiPrasaranaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePemakaiPrasaranaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PemakaiPrasarana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PemakaiPrasaranaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PemakaiPrasaranaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PemakaiPrasaranaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PemakaiPrasaranaQuery) {
            return $criteria;
        }
        $query = new PemakaiPrasaranaQuery();
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
                         A Primary key composition: [$jenis_prasarana_id, $jurusan_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   PemakaiPrasarana|PemakaiPrasarana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PemakaiPrasaranaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PemakaiPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PemakaiPrasarana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_prasarana_id", "jurusan_id", "create_date", "last_update", "expired_date", "last_sync", "jml_std_min" FROM "ref"."pemakai_prasarana" WHERE "jenis_prasarana_id" = :p0 AND "jurusan_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_INT);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new PemakaiPrasarana();
            $obj->hydrate($row);
            PemakaiPrasaranaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return PemakaiPrasarana|PemakaiPrasarana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PemakaiPrasarana[]|mixed the list of results, formatted by the current formatter
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
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(PemakaiPrasaranaPeer::JURUSAN_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(PemakaiPrasaranaPeer::JURUSAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the jenis_prasarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPrasaranaId(1234); // WHERE jenis_prasarana_id = 1234
     * $query->filterByJenisPrasaranaId(array(12, 34)); // WHERE jenis_prasarana_id IN (12, 34)
     * $query->filterByJenisPrasaranaId(array('min' => 12)); // WHERE jenis_prasarana_id >= 12
     * $query->filterByJenisPrasaranaId(array('max' => 12)); // WHERE jenis_prasarana_id <= 12
     * </code>
     *
     * @see       filterByJenisPrasarana()
     *
     * @param     mixed $jenisPrasaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::JURUSAN_ID, $jurusanId, $comparison);
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
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the jml_std_min column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlStdMin(1234); // WHERE jml_std_min = 1234
     * $query->filterByJmlStdMin(array(12, 34)); // WHERE jml_std_min IN (12, 34)
     * $query->filterByJmlStdMin(array('min' => 12)); // WHERE jml_std_min >= 12
     * $query->filterByJmlStdMin(array('max' => 12)); // WHERE jml_std_min <= 12
     * </code>
     *
     * @param     mixed $jmlStdMin The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function filterByJmlStdMin($jmlStdMin = null, $comparison = null)
    {
        if (is_array($jmlStdMin)) {
            $useMinMax = false;
            if (isset($jmlStdMin['min'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::JML_STD_MIN, $jmlStdMin['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlStdMin['max'])) {
                $this->addUsingAlias(PemakaiPrasaranaPeer::JML_STD_MIN, $jmlStdMin['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PemakaiPrasaranaPeer::JML_STD_MIN, $jmlStdMin, $comparison);
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PemakaiPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(PemakaiPrasaranaPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PemakaiPrasaranaPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
        } else {
            throw new PropelException('filterByJurusan() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jurusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jurusan');

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
            $this->addJoinObject($join, 'Jurusan');
        }

        return $this;
    }

    /**
     * Use the Jurusan relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related JenisPrasarana object
     *
     * @param   JenisPrasarana|PropelObjectCollection $jenisPrasarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PemakaiPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPrasarana($jenisPrasarana, $comparison = null)
    {
        if ($jenisPrasarana instanceof JenisPrasarana) {
            return $this
                ->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($jenisPrasarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasarana->toKeyValue('PrimaryKey', 'JenisPrasaranaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPrasarana() only accepts arguments of type JenisPrasarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPrasarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function joinJenisPrasarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPrasarana');

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
            $this->addJoinObject($join, 'JenisPrasarana');
        }

        return $this;
    }

    /**
     * Use the JenisPrasarana relation JenisPrasarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPrasaranaQuery A secondary query class using the current class as primary query
     */
    public function useJenisPrasaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPrasarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPrasarana', '\DataDikdas\Model\JenisPrasaranaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PemakaiPrasarana $pemakaiPrasarana Object to remove from the list of results
     *
     * @return PemakaiPrasaranaQuery The current query, for fluid interface
     */
    public function prune($pemakaiPrasarana = null)
    {
        if ($pemakaiPrasarana) {
            $this->addCond('pruneCond0', $this->getAliasedColName(PemakaiPrasaranaPeer::JENIS_PRASARANA_ID), $pemakaiPrasarana->getJenisPrasaranaId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(PemakaiPrasaranaPeer::JURUSAN_ID), $pemakaiPrasarana->getJurusanId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
