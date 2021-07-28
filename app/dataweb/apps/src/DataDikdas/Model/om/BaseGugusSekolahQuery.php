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
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\GugusSekolahPeer;
use DataDikdas\Model\GugusSekolahQuery;
use DataDikdas\Model\JenisGugus;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'gugus_sekolah' table.
 *
 * 
 *
 * @method GugusSekolahQuery orderByGugusId($order = Criteria::ASC) Order by the gugus_id column
 * @method GugusSekolahQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method GugusSekolahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method GugusSekolahQuery orderBySkGugus($order = Criteria::ASC) Order by the sk_gugus column
 * @method GugusSekolahQuery orderByJenisGugusId($order = Criteria::ASC) Order by the jenis_gugus_id column
 * @method GugusSekolahQuery orderBySekolahIntiId($order = Criteria::ASC) Order by the sekolah_inti_id column
 * @method GugusSekolahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method GugusSekolahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method GugusSekolahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method GugusSekolahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method GugusSekolahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method GugusSekolahQuery groupByGugusId() Group by the gugus_id column
 * @method GugusSekolahQuery groupByAsalData() Group by the asal_data column
 * @method GugusSekolahQuery groupByNama() Group by the nama column
 * @method GugusSekolahQuery groupBySkGugus() Group by the sk_gugus column
 * @method GugusSekolahQuery groupByJenisGugusId() Group by the jenis_gugus_id column
 * @method GugusSekolahQuery groupBySekolahIntiId() Group by the sekolah_inti_id column
 * @method GugusSekolahQuery groupByCreateDate() Group by the create_date column
 * @method GugusSekolahQuery groupByLastUpdate() Group by the last_update column
 * @method GugusSekolahQuery groupBySoftDelete() Group by the soft_delete column
 * @method GugusSekolahQuery groupByLastSync() Group by the last_sync column
 * @method GugusSekolahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method GugusSekolahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GugusSekolahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GugusSekolahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GugusSekolahQuery leftJoinJenisGugus($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisGugus relation
 * @method GugusSekolahQuery rightJoinJenisGugus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisGugus relation
 * @method GugusSekolahQuery innerJoinJenisGugus($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisGugus relation
 *
 * @method GugusSekolahQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method GugusSekolahQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method GugusSekolahQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method GugusSekolahQuery leftJoinAnggotaGugus($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaGugus relation
 * @method GugusSekolahQuery rightJoinAnggotaGugus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaGugus relation
 * @method GugusSekolahQuery innerJoinAnggotaGugus($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaGugus relation
 *
 * @method GugusSekolah findOne(PropelPDO $con = null) Return the first GugusSekolah matching the query
 * @method GugusSekolah findOneOrCreate(PropelPDO $con = null) Return the first GugusSekolah matching the query, or a new GugusSekolah object populated from the query conditions when no match is found
 *
 * @method GugusSekolah findOneByAsalData(string $asal_data) Return the first GugusSekolah filtered by the asal_data column
 * @method GugusSekolah findOneByNama(string $nama) Return the first GugusSekolah filtered by the nama column
 * @method GugusSekolah findOneBySkGugus(string $sk_gugus) Return the first GugusSekolah filtered by the sk_gugus column
 * @method GugusSekolah findOneByJenisGugusId(string $jenis_gugus_id) Return the first GugusSekolah filtered by the jenis_gugus_id column
 * @method GugusSekolah findOneBySekolahIntiId(string $sekolah_inti_id) Return the first GugusSekolah filtered by the sekolah_inti_id column
 * @method GugusSekolah findOneByCreateDate(string $create_date) Return the first GugusSekolah filtered by the create_date column
 * @method GugusSekolah findOneByLastUpdate(string $last_update) Return the first GugusSekolah filtered by the last_update column
 * @method GugusSekolah findOneBySoftDelete(string $soft_delete) Return the first GugusSekolah filtered by the soft_delete column
 * @method GugusSekolah findOneByLastSync(string $last_sync) Return the first GugusSekolah filtered by the last_sync column
 * @method GugusSekolah findOneByUpdaterId(string $updater_id) Return the first GugusSekolah filtered by the updater_id column
 *
 * @method array findByGugusId(string $gugus_id) Return GugusSekolah objects filtered by the gugus_id column
 * @method array findByAsalData(string $asal_data) Return GugusSekolah objects filtered by the asal_data column
 * @method array findByNama(string $nama) Return GugusSekolah objects filtered by the nama column
 * @method array findBySkGugus(string $sk_gugus) Return GugusSekolah objects filtered by the sk_gugus column
 * @method array findByJenisGugusId(string $jenis_gugus_id) Return GugusSekolah objects filtered by the jenis_gugus_id column
 * @method array findBySekolahIntiId(string $sekolah_inti_id) Return GugusSekolah objects filtered by the sekolah_inti_id column
 * @method array findByCreateDate(string $create_date) Return GugusSekolah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return GugusSekolah objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return GugusSekolah objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return GugusSekolah objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return GugusSekolah objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGugusSekolahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGugusSekolahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\GugusSekolah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GugusSekolahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GugusSekolahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GugusSekolahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GugusSekolahQuery) {
            return $criteria;
        }
        $query = new GugusSekolahQuery();
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
     * @return   GugusSekolah|GugusSekolah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GugusSekolahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GugusSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GugusSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByGugusId($key, $con = null)
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
     * @return                 GugusSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "gugus_id", "asal_data", "nama", "sk_gugus", "jenis_gugus_id", "sekolah_inti_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "gugus_sekolah" WHERE "gugus_id" = :p0';
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
            $obj = new GugusSekolah();
            $obj->hydrate($row);
            GugusSekolahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GugusSekolah|GugusSekolah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GugusSekolah[]|mixed the list of results, formatted by the current formatter
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GugusSekolahPeer::GUGUS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GugusSekolahPeer::GUGUS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the gugus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGugusId('fooValue');   // WHERE gugus_id = 'fooValue'
     * $query->filterByGugusId('%fooValue%'); // WHERE gugus_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gugusId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByGugusId($gugusId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gugusId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gugusId)) {
                $gugusId = str_replace('*', '%', $gugusId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::GUGUS_ID, $gugusId, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GugusSekolahPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the sk_gugus column
     *
     * Example usage:
     * <code>
     * $query->filterBySkGugus('fooValue');   // WHERE sk_gugus = 'fooValue'
     * $query->filterBySkGugus('%fooValue%'); // WHERE sk_gugus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skGugus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterBySkGugus($skGugus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skGugus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skGugus)) {
                $skGugus = str_replace('*', '%', $skGugus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::SK_GUGUS, $skGugus, $comparison);
    }

    /**
     * Filter the query on the jenis_gugus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisGugusId(1234); // WHERE jenis_gugus_id = 1234
     * $query->filterByJenisGugusId(array(12, 34)); // WHERE jenis_gugus_id IN (12, 34)
     * $query->filterByJenisGugusId(array('min' => 12)); // WHERE jenis_gugus_id >= 12
     * $query->filterByJenisGugusId(array('max' => 12)); // WHERE jenis_gugus_id <= 12
     * </code>
     *
     * @see       filterByJenisGugus()
     *
     * @param     mixed $jenisGugusId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByJenisGugusId($jenisGugusId = null, $comparison = null)
    {
        if (is_array($jenisGugusId)) {
            $useMinMax = false;
            if (isset($jenisGugusId['min'])) {
                $this->addUsingAlias(GugusSekolahPeer::JENIS_GUGUS_ID, $jenisGugusId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisGugusId['max'])) {
                $this->addUsingAlias(GugusSekolahPeer::JENIS_GUGUS_ID, $jenisGugusId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::JENIS_GUGUS_ID, $jenisGugusId, $comparison);
    }

    /**
     * Filter the query on the sekolah_inti_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahIntiId('fooValue');   // WHERE sekolah_inti_id = 'fooValue'
     * $query->filterBySekolahIntiId('%fooValue%'); // WHERE sekolah_inti_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahIntiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterBySekolahIntiId($sekolahIntiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahIntiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahIntiId)) {
                $sekolahIntiId = str_replace('*', '%', $sekolahIntiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolahIntiId, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(GugusSekolahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(GugusSekolahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(GugusSekolahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(GugusSekolahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(GugusSekolahPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(GugusSekolahPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(GugusSekolahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(GugusSekolahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GugusSekolahPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GugusSekolahPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisGugus object
     *
     * @param   JenisGugus|PropelObjectCollection $jenisGugus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GugusSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisGugus($jenisGugus, $comparison = null)
    {
        if ($jenisGugus instanceof JenisGugus) {
            return $this
                ->addUsingAlias(GugusSekolahPeer::JENIS_GUGUS_ID, $jenisGugus->getJenisGugusId(), $comparison);
        } elseif ($jenisGugus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GugusSekolahPeer::JENIS_GUGUS_ID, $jenisGugus->toKeyValue('PrimaryKey', 'JenisGugusId'), $comparison);
        } else {
            throw new PropelException('filterByJenisGugus() only accepts arguments of type JenisGugus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisGugus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function joinJenisGugus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisGugus');

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
            $this->addJoinObject($join, 'JenisGugus');
        }

        return $this;
    }

    /**
     * Use the JenisGugus relation JenisGugus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisGugusQuery A secondary query class using the current class as primary query
     */
    public function useJenisGugusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisGugus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisGugus', '\DataDikdas\Model\JenisGugusQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GugusSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GugusSekolahPeer::SEKOLAH_INTI_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related AnggotaGugus object
     *
     * @param   AnggotaGugus|PropelObjectCollection $anggotaGugus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GugusSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaGugus($anggotaGugus, $comparison = null)
    {
        if ($anggotaGugus instanceof AnggotaGugus) {
            return $this
                ->addUsingAlias(GugusSekolahPeer::GUGUS_ID, $anggotaGugus->getGugusId(), $comparison);
        } elseif ($anggotaGugus instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaGugusQuery()
                ->filterByPrimaryKeys($anggotaGugus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaGugus() only accepts arguments of type AnggotaGugus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaGugus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function joinAnggotaGugus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaGugus');

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
            $this->addJoinObject($join, 'AnggotaGugus');
        }

        return $this;
    }

    /**
     * Use the AnggotaGugus relation AnggotaGugus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaGugusQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaGugusQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaGugus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaGugus', '\DataDikdas\Model\AnggotaGugusQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GugusSekolah $gugusSekolah Object to remove from the list of results
     *
     * @return GugusSekolahQuery The current query, for fluid interface
     */
    public function prune($gugusSekolah = null)
    {
        if ($gugusSekolah) {
            $this->addUsingAlias(GugusSekolahPeer::GUGUS_ID, $gugusSekolah->getGugusId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
