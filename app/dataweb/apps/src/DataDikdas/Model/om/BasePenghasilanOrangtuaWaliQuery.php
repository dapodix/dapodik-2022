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
use DataDikdas\Model\PenghasilanOrangtuaWali;
use DataDikdas\Model\PenghasilanOrangtuaWaliPeer;
use DataDikdas\Model\PenghasilanOrangtuaWaliQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\TracerLulusan;

/**
 * Base class that represents a query for the 'ref.penghasilan_orangtua_wali' table.
 *
 * 
 *
 * @method PenghasilanOrangtuaWaliQuery orderByPenghasilanOrangtuaWaliId($order = Criteria::ASC) Order by the penghasilan_orangtua_wali_id column
 * @method PenghasilanOrangtuaWaliQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PenghasilanOrangtuaWaliQuery orderByBatasBawah($order = Criteria::ASC) Order by the batas_bawah column
 * @method PenghasilanOrangtuaWaliQuery orderByBatasAtas($order = Criteria::ASC) Order by the batas_atas column
 * @method PenghasilanOrangtuaWaliQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PenghasilanOrangtuaWaliQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PenghasilanOrangtuaWaliQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PenghasilanOrangtuaWaliQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PenghasilanOrangtuaWaliQuery groupByPenghasilanOrangtuaWaliId() Group by the penghasilan_orangtua_wali_id column
 * @method PenghasilanOrangtuaWaliQuery groupByNama() Group by the nama column
 * @method PenghasilanOrangtuaWaliQuery groupByBatasBawah() Group by the batas_bawah column
 * @method PenghasilanOrangtuaWaliQuery groupByBatasAtas() Group by the batas_atas column
 * @method PenghasilanOrangtuaWaliQuery groupByCreateDate() Group by the create_date column
 * @method PenghasilanOrangtuaWaliQuery groupByLastUpdate() Group by the last_update column
 * @method PenghasilanOrangtuaWaliQuery groupByExpiredDate() Group by the expired_date column
 * @method PenghasilanOrangtuaWaliQuery groupByLastSync() Group by the last_sync column
 *
 * @method PenghasilanOrangtuaWaliQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PenghasilanOrangtuaWaliQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PenghasilanOrangtuaWaliQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PenghasilanOrangtuaWaliQuery leftJoinPesertaDidikRelatedByPenghasilanIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdAyah relation
 * @method PenghasilanOrangtuaWaliQuery rightJoinPesertaDidikRelatedByPenghasilanIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdAyah relation
 * @method PenghasilanOrangtuaWaliQuery innerJoinPesertaDidikRelatedByPenghasilanIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdAyah relation
 *
 * @method PenghasilanOrangtuaWaliQuery leftJoinPesertaDidikRelatedByPenghasilanIdWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdWali relation
 * @method PenghasilanOrangtuaWaliQuery rightJoinPesertaDidikRelatedByPenghasilanIdWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdWali relation
 * @method PenghasilanOrangtuaWaliQuery innerJoinPesertaDidikRelatedByPenghasilanIdWali($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdWali relation
 *
 * @method PenghasilanOrangtuaWaliQuery leftJoinPesertaDidikRelatedByPenghasilanIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdIbu relation
 * @method PenghasilanOrangtuaWaliQuery rightJoinPesertaDidikRelatedByPenghasilanIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdIbu relation
 * @method PenghasilanOrangtuaWaliQuery innerJoinPesertaDidikRelatedByPenghasilanIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdIbu relation
 *
 * @method PenghasilanOrangtuaWaliQuery leftJoinTracerLulusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TracerLulusan relation
 * @method PenghasilanOrangtuaWaliQuery rightJoinTracerLulusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TracerLulusan relation
 * @method PenghasilanOrangtuaWaliQuery innerJoinTracerLulusan($relationAlias = null) Adds a INNER JOIN clause to the query using the TracerLulusan relation
 *
 * @method PenghasilanOrangtuaWali findOne(PropelPDO $con = null) Return the first PenghasilanOrangtuaWali matching the query
 * @method PenghasilanOrangtuaWali findOneOrCreate(PropelPDO $con = null) Return the first PenghasilanOrangtuaWali matching the query, or a new PenghasilanOrangtuaWali object populated from the query conditions when no match is found
 *
 * @method PenghasilanOrangtuaWali findOneByNama(string $nama) Return the first PenghasilanOrangtuaWali filtered by the nama column
 * @method PenghasilanOrangtuaWali findOneByBatasBawah(int $batas_bawah) Return the first PenghasilanOrangtuaWali filtered by the batas_bawah column
 * @method PenghasilanOrangtuaWali findOneByBatasAtas(int $batas_atas) Return the first PenghasilanOrangtuaWali filtered by the batas_atas column
 * @method PenghasilanOrangtuaWali findOneByCreateDate(string $create_date) Return the first PenghasilanOrangtuaWali filtered by the create_date column
 * @method PenghasilanOrangtuaWali findOneByLastUpdate(string $last_update) Return the first PenghasilanOrangtuaWali filtered by the last_update column
 * @method PenghasilanOrangtuaWali findOneByExpiredDate(string $expired_date) Return the first PenghasilanOrangtuaWali filtered by the expired_date column
 * @method PenghasilanOrangtuaWali findOneByLastSync(string $last_sync) Return the first PenghasilanOrangtuaWali filtered by the last_sync column
 *
 * @method array findByPenghasilanOrangtuaWaliId(int $penghasilan_orangtua_wali_id) Return PenghasilanOrangtuaWali objects filtered by the penghasilan_orangtua_wali_id column
 * @method array findByNama(string $nama) Return PenghasilanOrangtuaWali objects filtered by the nama column
 * @method array findByBatasBawah(int $batas_bawah) Return PenghasilanOrangtuaWali objects filtered by the batas_bawah column
 * @method array findByBatasAtas(int $batas_atas) Return PenghasilanOrangtuaWali objects filtered by the batas_atas column
 * @method array findByCreateDate(string $create_date) Return PenghasilanOrangtuaWali objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PenghasilanOrangtuaWali objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return PenghasilanOrangtuaWali objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return PenghasilanOrangtuaWali objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePenghasilanOrangtuaWaliQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePenghasilanOrangtuaWaliQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PenghasilanOrangtuaWali', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PenghasilanOrangtuaWaliQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PenghasilanOrangtuaWaliQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PenghasilanOrangtuaWaliQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PenghasilanOrangtuaWaliQuery) {
            return $criteria;
        }
        $query = new PenghasilanOrangtuaWaliQuery();
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
     * @return   PenghasilanOrangtuaWali|PenghasilanOrangtuaWali[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PenghasilanOrangtuaWaliPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PenghasilanOrangtuaWaliPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PenghasilanOrangtuaWali A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPenghasilanOrangtuaWaliId($key, $con = null)
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
     * @return                 PenghasilanOrangtuaWali A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "penghasilan_orangtua_wali_id", "nama", "batas_bawah", "batas_atas", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."penghasilan_orangtua_wali" WHERE "penghasilan_orangtua_wali_id" = :p0';
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
            $obj = new PenghasilanOrangtuaWali();
            $obj->hydrate($row);
            PenghasilanOrangtuaWaliPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PenghasilanOrangtuaWali|PenghasilanOrangtuaWali[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PenghasilanOrangtuaWali[]|mixed the list of results, formatted by the current formatter
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the penghasilan_orangtua_wali_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghasilanOrangtuaWaliId(1234); // WHERE penghasilan_orangtua_wali_id = 1234
     * $query->filterByPenghasilanOrangtuaWaliId(array(12, 34)); // WHERE penghasilan_orangtua_wali_id IN (12, 34)
     * $query->filterByPenghasilanOrangtuaWaliId(array('min' => 12)); // WHERE penghasilan_orangtua_wali_id >= 12
     * $query->filterByPenghasilanOrangtuaWaliId(array('max' => 12)); // WHERE penghasilan_orangtua_wali_id <= 12
     * </code>
     *
     * @param     mixed $penghasilanOrangtuaWaliId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByPenghasilanOrangtuaWaliId($penghasilanOrangtuaWaliId = null, $comparison = null)
    {
        if (is_array($penghasilanOrangtuaWaliId)) {
            $useMinMax = false;
            if (isset($penghasilanOrangtuaWaliId['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $penghasilanOrangtuaWaliId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penghasilanOrangtuaWaliId['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $penghasilanOrangtuaWaliId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $penghasilanOrangtuaWaliId, $comparison);
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the batas_bawah column
     *
     * Example usage:
     * <code>
     * $query->filterByBatasBawah(1234); // WHERE batas_bawah = 1234
     * $query->filterByBatasBawah(array(12, 34)); // WHERE batas_bawah IN (12, 34)
     * $query->filterByBatasBawah(array('min' => 12)); // WHERE batas_bawah >= 12
     * $query->filterByBatasBawah(array('max' => 12)); // WHERE batas_bawah <= 12
     * </code>
     *
     * @param     mixed $batasBawah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByBatasBawah($batasBawah = null, $comparison = null)
    {
        if (is_array($batasBawah)) {
            $useMinMax = false;
            if (isset($batasBawah['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_BAWAH, $batasBawah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($batasBawah['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_BAWAH, $batasBawah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_BAWAH, $batasBawah, $comparison);
    }

    /**
     * Filter the query on the batas_atas column
     *
     * Example usage:
     * <code>
     * $query->filterByBatasAtas(1234); // WHERE batas_atas = 1234
     * $query->filterByBatasAtas(array(12, 34)); // WHERE batas_atas IN (12, 34)
     * $query->filterByBatasAtas(array('min' => 12)); // WHERE batas_atas >= 12
     * $query->filterByBatasAtas(array('max' => 12)); // WHERE batas_atas <= 12
     * </code>
     *
     * @param     mixed $batasAtas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByBatasAtas($batasAtas = null, $comparison = null)
    {
        if (is_array($batasAtas)) {
            $useMinMax = false;
            if (isset($batasAtas['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_ATAS, $batasAtas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($batasAtas['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_ATAS, $batasAtas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::BATAS_ATAS, $batasAtas, $comparison);
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPenghasilanIdAyah($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $pesertaDidik->getPenghasilanIdAyah(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPenghasilanIdAyahQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPenghasilanIdAyah() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPenghasilanIdAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPenghasilanIdAyah');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPenghasilanIdAyah');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPenghasilanIdAyah relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPenghasilanIdAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPenghasilanIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPenghasilanIdAyah', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPenghasilanIdWali($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $pesertaDidik->getPenghasilanIdWali(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPenghasilanIdWaliQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPenghasilanIdWali() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPenghasilanIdWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPenghasilanIdWali');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPenghasilanIdWali');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPenghasilanIdWali relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPenghasilanIdWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPenghasilanIdWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPenghasilanIdWali', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByPenghasilanIdIbu($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $pesertaDidik->getPenghasilanIdIbu(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByPenghasilanIdIbuQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByPenghasilanIdIbu() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByPenghasilanIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByPenghasilanIdIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByPenghasilanIdIbu');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByPenghasilanIdIbu');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByPenghasilanIdIbu relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByPenghasilanIdIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByPenghasilanIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByPenghasilanIdIbu', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related TracerLulusan object
     *
     * @param   TracerLulusan|PropelObjectCollection $tracerLulusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracerLulusan($tracerLulusan, $comparison = null)
    {
        if ($tracerLulusan instanceof TracerLulusan) {
            return $this
                ->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $tracerLulusan->getPenghasilanId(), $comparison);
        } elseif ($tracerLulusan instanceof PropelObjectCollection) {
            return $this
                ->useTracerLulusanQuery()
                ->filterByPrimaryKeys($tracerLulusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTracerLulusan() only accepts arguments of type TracerLulusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TracerLulusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function joinTracerLulusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TracerLulusan');

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
            $this->addJoinObject($join, 'TracerLulusan');
        }

        return $this;
    }

    /**
     * Use the TracerLulusan relation TracerLulusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TracerLulusanQuery A secondary query class using the current class as primary query
     */
    public function useTracerLulusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTracerLulusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TracerLulusan', '\DataDikdas\Model\TracerLulusanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PenghasilanOrangtuaWali $penghasilanOrangtuaWali Object to remove from the list of results
     *
     * @return PenghasilanOrangtuaWaliQuery The current query, for fluid interface
     */
    public function prune($penghasilanOrangtuaWali = null)
    {
        if ($penghasilanOrangtuaWali) {
            $this->addUsingAlias(PenghasilanOrangtuaWaliPeer::PENGHASILAN_ORANGTUA_WALI_ID, $penghasilanOrangtuaWali->getPenghasilanOrangtuaWaliId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
