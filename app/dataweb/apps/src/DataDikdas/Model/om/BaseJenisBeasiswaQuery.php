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
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\BeasiswaPtk;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\JenisBeasiswaPeer;
use DataDikdas\Model\JenisBeasiswaQuery;
use DataDikdas\Model\SumberDana;

/**
 * Base class that represents a query for the 'ref.jenis_beasiswa' table.
 *
 * 
 *
 * @method JenisBeasiswaQuery orderByJenisBeasiswaId($order = Criteria::ASC) Order by the jenis_beasiswa_id column
 * @method JenisBeasiswaQuery orderBySumberDanaId($order = Criteria::ASC) Order by the sumber_dana_id column
 * @method JenisBeasiswaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisBeasiswaQuery orderByUntukPd($order = Criteria::ASC) Order by the untuk_pd column
 * @method JenisBeasiswaQuery orderByUntukPtk($order = Criteria::ASC) Order by the untuk_ptk column
 * @method JenisBeasiswaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisBeasiswaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisBeasiswaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisBeasiswaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisBeasiswaQuery groupByJenisBeasiswaId() Group by the jenis_beasiswa_id column
 * @method JenisBeasiswaQuery groupBySumberDanaId() Group by the sumber_dana_id column
 * @method JenisBeasiswaQuery groupByNama() Group by the nama column
 * @method JenisBeasiswaQuery groupByUntukPd() Group by the untuk_pd column
 * @method JenisBeasiswaQuery groupByUntukPtk() Group by the untuk_ptk column
 * @method JenisBeasiswaQuery groupByCreateDate() Group by the create_date column
 * @method JenisBeasiswaQuery groupByLastUpdate() Group by the last_update column
 * @method JenisBeasiswaQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisBeasiswaQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisBeasiswaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisBeasiswaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisBeasiswaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisBeasiswaQuery leftJoinSumberDana($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberDana relation
 * @method JenisBeasiswaQuery rightJoinSumberDana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberDana relation
 * @method JenisBeasiswaQuery innerJoinSumberDana($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberDana relation
 *
 * @method JenisBeasiswaQuery leftJoinBeasiswaPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPesertaDidik relation
 * @method JenisBeasiswaQuery rightJoinBeasiswaPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPesertaDidik relation
 * @method JenisBeasiswaQuery innerJoinBeasiswaPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPesertaDidik relation
 *
 * @method JenisBeasiswaQuery leftJoinBeasiswaPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPtk relation
 * @method JenisBeasiswaQuery rightJoinBeasiswaPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPtk relation
 * @method JenisBeasiswaQuery innerJoinBeasiswaPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPtk relation
 *
 * @method JenisBeasiswa findOne(PropelPDO $con = null) Return the first JenisBeasiswa matching the query
 * @method JenisBeasiswa findOneOrCreate(PropelPDO $con = null) Return the first JenisBeasiswa matching the query, or a new JenisBeasiswa object populated from the query conditions when no match is found
 *
 * @method JenisBeasiswa findOneBySumberDanaId(string $sumber_dana_id) Return the first JenisBeasiswa filtered by the sumber_dana_id column
 * @method JenisBeasiswa findOneByNama(string $nama) Return the first JenisBeasiswa filtered by the nama column
 * @method JenisBeasiswa findOneByUntukPd(string $untuk_pd) Return the first JenisBeasiswa filtered by the untuk_pd column
 * @method JenisBeasiswa findOneByUntukPtk(string $untuk_ptk) Return the first JenisBeasiswa filtered by the untuk_ptk column
 * @method JenisBeasiswa findOneByCreateDate(string $create_date) Return the first JenisBeasiswa filtered by the create_date column
 * @method JenisBeasiswa findOneByLastUpdate(string $last_update) Return the first JenisBeasiswa filtered by the last_update column
 * @method JenisBeasiswa findOneByExpiredDate(string $expired_date) Return the first JenisBeasiswa filtered by the expired_date column
 * @method JenisBeasiswa findOneByLastSync(string $last_sync) Return the first JenisBeasiswa filtered by the last_sync column
 *
 * @method array findByJenisBeasiswaId(int $jenis_beasiswa_id) Return JenisBeasiswa objects filtered by the jenis_beasiswa_id column
 * @method array findBySumberDanaId(string $sumber_dana_id) Return JenisBeasiswa objects filtered by the sumber_dana_id column
 * @method array findByNama(string $nama) Return JenisBeasiswa objects filtered by the nama column
 * @method array findByUntukPd(string $untuk_pd) Return JenisBeasiswa objects filtered by the untuk_pd column
 * @method array findByUntukPtk(string $untuk_ptk) Return JenisBeasiswa objects filtered by the untuk_ptk column
 * @method array findByCreateDate(string $create_date) Return JenisBeasiswa objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisBeasiswa objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisBeasiswa objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisBeasiswa objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisBeasiswaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisBeasiswaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisBeasiswa', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisBeasiswaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisBeasiswaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisBeasiswaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisBeasiswaQuery) {
            return $criteria;
        }
        $query = new JenisBeasiswaQuery();
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
     * @return   JenisBeasiswa|JenisBeasiswa[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisBeasiswaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisBeasiswaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisBeasiswa A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisBeasiswaId($key, $con = null)
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
     * @return                 JenisBeasiswa A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_beasiswa_id", "sumber_dana_id", "nama", "untuk_pd", "untuk_ptk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_beasiswa" WHERE "jenis_beasiswa_id" = :p0';
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
            $obj = new JenisBeasiswa();
            $obj->hydrate($row);
            JenisBeasiswaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisBeasiswa|JenisBeasiswa[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisBeasiswa[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_beasiswa_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisBeasiswaId(1234); // WHERE jenis_beasiswa_id = 1234
     * $query->filterByJenisBeasiswaId(array(12, 34)); // WHERE jenis_beasiswa_id IN (12, 34)
     * $query->filterByJenisBeasiswaId(array('min' => 12)); // WHERE jenis_beasiswa_id >= 12
     * $query->filterByJenisBeasiswaId(array('max' => 12)); // WHERE jenis_beasiswa_id <= 12
     * </code>
     *
     * @param     mixed $jenisBeasiswaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByJenisBeasiswaId($jenisBeasiswaId = null, $comparison = null)
    {
        if (is_array($jenisBeasiswaId)) {
            $useMinMax = false;
            if (isset($jenisBeasiswaId['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBeasiswaId['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId, $comparison);
    }

    /**
     * Filter the query on the sumber_dana_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDanaId(1234); // WHERE sumber_dana_id = 1234
     * $query->filterBySumberDanaId(array(12, 34)); // WHERE sumber_dana_id IN (12, 34)
     * $query->filterBySumberDanaId(array('min' => 12)); // WHERE sumber_dana_id >= 12
     * $query->filterBySumberDanaId(array('max' => 12)); // WHERE sumber_dana_id <= 12
     * </code>
     *
     * @see       filterBySumberDana()
     *
     * @param     mixed $sumberDanaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterBySumberDanaId($sumberDanaId = null, $comparison = null)
    {
        if (is_array($sumberDanaId)) {
            $useMinMax = false;
            if (isset($sumberDanaId['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::SUMBER_DANA_ID, $sumberDanaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberDanaId['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::SUMBER_DANA_ID, $sumberDanaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::SUMBER_DANA_ID, $sumberDanaId, $comparison);
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisBeasiswaPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the untuk_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPd(1234); // WHERE untuk_pd = 1234
     * $query->filterByUntukPd(array(12, 34)); // WHERE untuk_pd IN (12, 34)
     * $query->filterByUntukPd(array('min' => 12)); // WHERE untuk_pd >= 12
     * $query->filterByUntukPd(array('max' => 12)); // WHERE untuk_pd <= 12
     * </code>
     *
     * @param     mixed $untukPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByUntukPd($untukPd = null, $comparison = null)
    {
        if (is_array($untukPd)) {
            $useMinMax = false;
            if (isset($untukPd['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PD, $untukPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPd['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PD, $untukPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PD, $untukPd, $comparison);
    }

    /**
     * Filter the query on the untuk_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPtk(1234); // WHERE untuk_ptk = 1234
     * $query->filterByUntukPtk(array(12, 34)); // WHERE untuk_ptk IN (12, 34)
     * $query->filterByUntukPtk(array('min' => 12)); // WHERE untuk_ptk >= 12
     * $query->filterByUntukPtk(array('max' => 12)); // WHERE untuk_ptk <= 12
     * </code>
     *
     * @param     mixed $untukPtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByUntukPtk($untukPtk = null, $comparison = null)
    {
        if (is_array($untukPtk)) {
            $useMinMax = false;
            if (isset($untukPtk['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PTK, $untukPtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPtk['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PTK, $untukPtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::UNTUK_PTK, $untukPtk, $comparison);
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisBeasiswaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBeasiswaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related SumberDana object
     *
     * @param   SumberDana|PropelObjectCollection $sumberDana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisBeasiswaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberDana($sumberDana, $comparison = null)
    {
        if ($sumberDana instanceof SumberDana) {
            return $this
                ->addUsingAlias(JenisBeasiswaPeer::SUMBER_DANA_ID, $sumberDana->getSumberDanaId(), $comparison);
        } elseif ($sumberDana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JenisBeasiswaPeer::SUMBER_DANA_ID, $sumberDana->toKeyValue('PrimaryKey', 'SumberDanaId'), $comparison);
        } else {
            throw new PropelException('filterBySumberDana() only accepts arguments of type SumberDana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberDana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function joinSumberDana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberDana');

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
            $this->addJoinObject($join, 'SumberDana');
        }

        return $this;
    }

    /**
     * Use the SumberDana relation SumberDana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberDanaQuery A secondary query class using the current class as primary query
     */
    public function useSumberDanaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberDana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberDana', '\DataDikdas\Model\SumberDanaQuery');
    }

    /**
     * Filter the query by a related BeasiswaPesertaDidik object
     *
     * @param   BeasiswaPesertaDidik|PropelObjectCollection $beasiswaPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisBeasiswaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPesertaDidik($beasiswaPesertaDidik, $comparison = null)
    {
        if ($beasiswaPesertaDidik instanceof BeasiswaPesertaDidik) {
            return $this
                ->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $beasiswaPesertaDidik->getJenisBeasiswaId(), $comparison);
        } elseif ($beasiswaPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPesertaDidikQuery()
                ->filterByPrimaryKeys($beasiswaPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPesertaDidik() only accepts arguments of type BeasiswaPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function joinBeasiswaPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPesertaDidik');

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
            $this->addJoinObject($join, 'BeasiswaPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPesertaDidik relation BeasiswaPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPesertaDidik', '\DataDikdas\Model\BeasiswaPesertaDidikQuery');
    }

    /**
     * Filter the query by a related BeasiswaPtk object
     *
     * @param   BeasiswaPtk|PropelObjectCollection $beasiswaPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisBeasiswaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPtk($beasiswaPtk, $comparison = null)
    {
        if ($beasiswaPtk instanceof BeasiswaPtk) {
            return $this
                ->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $beasiswaPtk->getJenisBeasiswaId(), $comparison);
        } elseif ($beasiswaPtk instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPtkQuery()
                ->filterByPrimaryKeys($beasiswaPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPtk() only accepts arguments of type BeasiswaPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function joinBeasiswaPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPtk');

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
            $this->addJoinObject($join, 'BeasiswaPtk');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPtk relation BeasiswaPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPtkQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPtk', '\DataDikdas\Model\BeasiswaPtkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisBeasiswa $jenisBeasiswa Object to remove from the list of results
     *
     * @return JenisBeasiswaQuery The current query, for fluid interface
     */
    public function prune($jenisBeasiswa = null)
    {
        if ($jenisBeasiswa) {
            $this->addUsingAlias(JenisBeasiswaPeer::JENIS_BEASISWA_ID, $jenisBeasiswa->getJenisBeasiswaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
