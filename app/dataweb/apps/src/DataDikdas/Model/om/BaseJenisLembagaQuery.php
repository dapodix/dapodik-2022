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
use DataDikdas\Model\JenisLembaga;
use DataDikdas\Model\JenisLembagaPeer;
use DataDikdas\Model\JenisLembagaQuery;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\RwyKerja;

/**
 * Base class that represents a query for the 'ref.jenis_lembaga' table.
 *
 * 
 *
 * @method JenisLembagaQuery orderByJenisLembagaId($order = Criteria::ASC) Order by the jenis_lembaga_id column
 * @method JenisLembagaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisLembagaQuery orderByTempatPengawas($order = Criteria::ASC) Order by the tempat_pengawas column
 * @method JenisLembagaQuery orderBySimpulPendataan($order = Criteria::ASC) Order by the simpul_pendataan column
 * @method JenisLembagaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisLembagaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisLembagaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisLembagaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisLembagaQuery groupByJenisLembagaId() Group by the jenis_lembaga_id column
 * @method JenisLembagaQuery groupByNama() Group by the nama column
 * @method JenisLembagaQuery groupByTempatPengawas() Group by the tempat_pengawas column
 * @method JenisLembagaQuery groupBySimpulPendataan() Group by the simpul_pendataan column
 * @method JenisLembagaQuery groupByCreateDate() Group by the create_date column
 * @method JenisLembagaQuery groupByLastUpdate() Group by the last_update column
 * @method JenisLembagaQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisLembagaQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisLembagaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisLembagaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisLembagaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisLembagaQuery leftJoinLembagaNonSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaNonSekolah relation
 * @method JenisLembagaQuery rightJoinLembagaNonSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaNonSekolah relation
 * @method JenisLembagaQuery innerJoinLembagaNonSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaNonSekolah relation
 *
 * @method JenisLembagaQuery leftJoinRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKerja relation
 * @method JenisLembagaQuery rightJoinRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKerja relation
 * @method JenisLembagaQuery innerJoinRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKerja relation
 *
 * @method JenisLembaga findOne(PropelPDO $con = null) Return the first JenisLembaga matching the query
 * @method JenisLembaga findOneOrCreate(PropelPDO $con = null) Return the first JenisLembaga matching the query, or a new JenisLembaga object populated from the query conditions when no match is found
 *
 * @method JenisLembaga findOneByNama(string $nama) Return the first JenisLembaga filtered by the nama column
 * @method JenisLembaga findOneByTempatPengawas(string $tempat_pengawas) Return the first JenisLembaga filtered by the tempat_pengawas column
 * @method JenisLembaga findOneBySimpulPendataan(string $simpul_pendataan) Return the first JenisLembaga filtered by the simpul_pendataan column
 * @method JenisLembaga findOneByCreateDate(string $create_date) Return the first JenisLembaga filtered by the create_date column
 * @method JenisLembaga findOneByLastUpdate(string $last_update) Return the first JenisLembaga filtered by the last_update column
 * @method JenisLembaga findOneByExpiredDate(string $expired_date) Return the first JenisLembaga filtered by the expired_date column
 * @method JenisLembaga findOneByLastSync(string $last_sync) Return the first JenisLembaga filtered by the last_sync column
 *
 * @method array findByJenisLembagaId(string $jenis_lembaga_id) Return JenisLembaga objects filtered by the jenis_lembaga_id column
 * @method array findByNama(string $nama) Return JenisLembaga objects filtered by the nama column
 * @method array findByTempatPengawas(string $tempat_pengawas) Return JenisLembaga objects filtered by the tempat_pengawas column
 * @method array findBySimpulPendataan(string $simpul_pendataan) Return JenisLembaga objects filtered by the simpul_pendataan column
 * @method array findByCreateDate(string $create_date) Return JenisLembaga objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisLembaga objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisLembaga objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisLembaga objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisLembagaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisLembagaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisLembaga', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisLembagaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisLembagaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisLembagaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisLembagaQuery) {
            return $criteria;
        }
        $query = new JenisLembagaQuery();
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
     * @return   JenisLembaga|JenisLembaga[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisLembagaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisLembagaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisLembaga A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisLembagaId($key, $con = null)
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
     * @return                 JenisLembaga A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_lembaga_id", "nama", "tempat_pengawas", "simpul_pendataan", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_lembaga" WHERE "jenis_lembaga_id" = :p0';
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
            $obj = new JenisLembaga();
            $obj->hydrate($row);
            JenisLembagaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisLembaga|JenisLembaga[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisLembaga[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisLembagaId(1234); // WHERE jenis_lembaga_id = 1234
     * $query->filterByJenisLembagaId(array(12, 34)); // WHERE jenis_lembaga_id IN (12, 34)
     * $query->filterByJenisLembagaId(array('min' => 12)); // WHERE jenis_lembaga_id >= 12
     * $query->filterByJenisLembagaId(array('max' => 12)); // WHERE jenis_lembaga_id <= 12
     * </code>
     *
     * @param     mixed $jenisLembagaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByJenisLembagaId($jenisLembagaId = null, $comparison = null)
    {
        if (is_array($jenisLembagaId)) {
            $useMinMax = false;
            if (isset($jenisLembagaId['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisLembagaId['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $jenisLembagaId, $comparison);
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
     * @return JenisLembagaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisLembagaPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the tempat_pengawas column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatPengawas(1234); // WHERE tempat_pengawas = 1234
     * $query->filterByTempatPengawas(array(12, 34)); // WHERE tempat_pengawas IN (12, 34)
     * $query->filterByTempatPengawas(array('min' => 12)); // WHERE tempat_pengawas >= 12
     * $query->filterByTempatPengawas(array('max' => 12)); // WHERE tempat_pengawas <= 12
     * </code>
     *
     * @param     mixed $tempatPengawas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByTempatPengawas($tempatPengawas = null, $comparison = null)
    {
        if (is_array($tempatPengawas)) {
            $useMinMax = false;
            if (isset($tempatPengawas['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::TEMPAT_PENGAWAS, $tempatPengawas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tempatPengawas['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::TEMPAT_PENGAWAS, $tempatPengawas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::TEMPAT_PENGAWAS, $tempatPengawas, $comparison);
    }

    /**
     * Filter the query on the simpul_pendataan column
     *
     * Example usage:
     * <code>
     * $query->filterBySimpulPendataan(1234); // WHERE simpul_pendataan = 1234
     * $query->filterBySimpulPendataan(array(12, 34)); // WHERE simpul_pendataan IN (12, 34)
     * $query->filterBySimpulPendataan(array('min' => 12)); // WHERE simpul_pendataan >= 12
     * $query->filterBySimpulPendataan(array('max' => 12)); // WHERE simpul_pendataan <= 12
     * </code>
     *
     * @param     mixed $simpulPendataan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterBySimpulPendataan($simpulPendataan = null, $comparison = null)
    {
        if (is_array($simpulPendataan)) {
            $useMinMax = false;
            if (isset($simpulPendataan['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::SIMPUL_PENDATAAN, $simpulPendataan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($simpulPendataan['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::SIMPUL_PENDATAAN, $simpulPendataan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::SIMPUL_PENDATAAN, $simpulPendataan, $comparison);
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
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisLembagaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisLembagaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLembagaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related LembagaNonSekolah object
     *
     * @param   LembagaNonSekolah|PropelObjectCollection $lembagaNonSekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisLembagaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaNonSekolah($lembagaNonSekolah, $comparison = null)
    {
        if ($lembagaNonSekolah instanceof LembagaNonSekolah) {
            return $this
                ->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $lembagaNonSekolah->getJenisLembagaId(), $comparison);
        } elseif ($lembagaNonSekolah instanceof PropelObjectCollection) {
            return $this
                ->useLembagaNonSekolahQuery()
                ->filterByPrimaryKeys($lembagaNonSekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLembagaNonSekolah() only accepts arguments of type LembagaNonSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaNonSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function joinLembagaNonSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaNonSekolah');

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
            $this->addJoinObject($join, 'LembagaNonSekolah');
        }

        return $this;
    }

    /**
     * Use the LembagaNonSekolah relation LembagaNonSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaNonSekolahQuery A secondary query class using the current class as primary query
     */
    public function useLembagaNonSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaNonSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaNonSekolah', '\DataDikdas\Model\LembagaNonSekolahQuery');
    }

    /**
     * Filter the query by a related RwyKerja object
     *
     * @param   RwyKerja|PropelObjectCollection $rwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisLembagaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKerja($rwyKerja, $comparison = null)
    {
        if ($rwyKerja instanceof RwyKerja) {
            return $this
                ->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $rwyKerja->getJenisLembagaId(), $comparison);
        } elseif ($rwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useRwyKerjaQuery()
                ->filterByPrimaryKeys($rwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKerja() only accepts arguments of type RwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function joinRwyKerja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKerja');

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
            $this->addJoinObject($join, 'RwyKerja');
        }

        return $this;
    }

    /**
     * Use the RwyKerja relation RwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useRwyKerjaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKerja', '\DataDikdas\Model\RwyKerjaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisLembaga $jenisLembaga Object to remove from the list of results
     *
     * @return JenisLembagaQuery The current query, for fluid interface
     */
    public function prune($jenisLembaga = null)
    {
        if ($jenisLembaga) {
            $this->addUsingAlias(JenisLembagaPeer::JENIS_LEMBAGA_ID, $jenisLembaga->getJenisLembagaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
