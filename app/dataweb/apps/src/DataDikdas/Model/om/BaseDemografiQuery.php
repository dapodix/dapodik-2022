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
use DataDikdas\Model\Demografi;
use DataDikdas\Model\DemografiPeer;
use DataDikdas\Model\DemografiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\VldDemografi;

/**
 * Base class that represents a query for the 'demografi' table.
 *
 * 
 *
 * @method DemografiQuery orderByDemografiId($order = Criteria::ASC) Order by the demografi_id column
 * @method DemografiQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method DemografiQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method DemografiQuery orderByUsia5($order = Criteria::ASC) Order by the usia_5 column
 * @method DemografiQuery orderByUsia7($order = Criteria::ASC) Order by the usia_7 column
 * @method DemografiQuery orderByUsia13($order = Criteria::ASC) Order by the usia_13 column
 * @method DemografiQuery orderByUsia16($order = Criteria::ASC) Order by the usia_16 column
 * @method DemografiQuery orderByUsia18($order = Criteria::ASC) Order by the usia_18 column
 * @method DemografiQuery orderByJumlahPenduduk($order = Criteria::ASC) Order by the jumlah_penduduk column
 * @method DemografiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method DemografiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method DemografiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method DemografiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method DemografiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method DemografiQuery groupByDemografiId() Group by the demografi_id column
 * @method DemografiQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method DemografiQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method DemografiQuery groupByUsia5() Group by the usia_5 column
 * @method DemografiQuery groupByUsia7() Group by the usia_7 column
 * @method DemografiQuery groupByUsia13() Group by the usia_13 column
 * @method DemografiQuery groupByUsia16() Group by the usia_16 column
 * @method DemografiQuery groupByUsia18() Group by the usia_18 column
 * @method DemografiQuery groupByJumlahPenduduk() Group by the jumlah_penduduk column
 * @method DemografiQuery groupByCreateDate() Group by the create_date column
 * @method DemografiQuery groupByLastUpdate() Group by the last_update column
 * @method DemografiQuery groupBySoftDelete() Group by the soft_delete column
 * @method DemografiQuery groupByLastSync() Group by the last_sync column
 * @method DemografiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method DemografiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DemografiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DemografiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DemografiQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method DemografiQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method DemografiQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method DemografiQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method DemografiQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method DemografiQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method DemografiQuery leftJoinVldDemografi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldDemografi relation
 * @method DemografiQuery rightJoinVldDemografi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldDemografi relation
 * @method DemografiQuery innerJoinVldDemografi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldDemografi relation
 *
 * @method Demografi findOne(PropelPDO $con = null) Return the first Demografi matching the query
 * @method Demografi findOneOrCreate(PropelPDO $con = null) Return the first Demografi matching the query, or a new Demografi object populated from the query conditions when no match is found
 *
 * @method Demografi findOneByKodeWilayah(string $kode_wilayah) Return the first Demografi filtered by the kode_wilayah column
 * @method Demografi findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first Demografi filtered by the tahun_ajaran_id column
 * @method Demografi findOneByUsia5(string $usia_5) Return the first Demografi filtered by the usia_5 column
 * @method Demografi findOneByUsia7(string $usia_7) Return the first Demografi filtered by the usia_7 column
 * @method Demografi findOneByUsia13(string $usia_13) Return the first Demografi filtered by the usia_13 column
 * @method Demografi findOneByUsia16(string $usia_16) Return the first Demografi filtered by the usia_16 column
 * @method Demografi findOneByUsia18(string $usia_18) Return the first Demografi filtered by the usia_18 column
 * @method Demografi findOneByJumlahPenduduk(string $jumlah_penduduk) Return the first Demografi filtered by the jumlah_penduduk column
 * @method Demografi findOneByCreateDate(string $create_date) Return the first Demografi filtered by the create_date column
 * @method Demografi findOneByLastUpdate(string $last_update) Return the first Demografi filtered by the last_update column
 * @method Demografi findOneBySoftDelete(string $soft_delete) Return the first Demografi filtered by the soft_delete column
 * @method Demografi findOneByLastSync(string $last_sync) Return the first Demografi filtered by the last_sync column
 * @method Demografi findOneByUpdaterId(string $updater_id) Return the first Demografi filtered by the updater_id column
 *
 * @method array findByDemografiId(string $demografi_id) Return Demografi objects filtered by the demografi_id column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Demografi objects filtered by the kode_wilayah column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return Demografi objects filtered by the tahun_ajaran_id column
 * @method array findByUsia5(string $usia_5) Return Demografi objects filtered by the usia_5 column
 * @method array findByUsia7(string $usia_7) Return Demografi objects filtered by the usia_7 column
 * @method array findByUsia13(string $usia_13) Return Demografi objects filtered by the usia_13 column
 * @method array findByUsia16(string $usia_16) Return Demografi objects filtered by the usia_16 column
 * @method array findByUsia18(string $usia_18) Return Demografi objects filtered by the usia_18 column
 * @method array findByJumlahPenduduk(string $jumlah_penduduk) Return Demografi objects filtered by the jumlah_penduduk column
 * @method array findByCreateDate(string $create_date) Return Demografi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Demografi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Demografi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Demografi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Demografi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDemografiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDemografiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Demografi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DemografiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DemografiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DemografiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DemografiQuery) {
            return $criteria;
        }
        $query = new DemografiQuery();
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
     * @return   Demografi|Demografi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DemografiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DemografiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Demografi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDemografiId($key, $con = null)
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
     * @return                 Demografi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "demografi_id", "kode_wilayah", "tahun_ajaran_id", "usia_5", "usia_7", "usia_13", "usia_16", "usia_18", "jumlah_penduduk", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "demografi" WHERE "demografi_id" = :p0';
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
            $obj = new Demografi();
            $obj->hydrate($row);
            DemografiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Demografi|Demografi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Demografi[]|mixed the list of results, formatted by the current formatter
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
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DemografiPeer::DEMOGRAFI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DemografiPeer::DEMOGRAFI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the demografi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDemografiId('fooValue');   // WHERE demografi_id = 'fooValue'
     * $query->filterByDemografiId('%fooValue%'); // WHERE demografi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $demografiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByDemografiId($demografiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($demografiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $demografiId)) {
                $demografiId = str_replace('*', '%', $demografiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DemografiPeer::DEMOGRAFI_ID, $demografiId, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DemografiPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the tahun_ajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunAjaranId(1234); // WHERE tahun_ajaran_id = 1234
     * $query->filterByTahunAjaranId(array(12, 34)); // WHERE tahun_ajaran_id IN (12, 34)
     * $query->filterByTahunAjaranId(array('min' => 12)); // WHERE tahun_ajaran_id >= 12
     * $query->filterByTahunAjaranId(array('max' => 12)); // WHERE tahun_ajaran_id <= 12
     * </code>
     *
     * @see       filterByTahunAjaran()
     *
     * @param     mixed $tahunAjaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(DemografiPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(DemografiPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the usia_5 column
     *
     * Example usage:
     * <code>
     * $query->filterByUsia5(1234); // WHERE usia_5 = 1234
     * $query->filterByUsia5(array(12, 34)); // WHERE usia_5 IN (12, 34)
     * $query->filterByUsia5(array('min' => 12)); // WHERE usia_5 >= 12
     * $query->filterByUsia5(array('max' => 12)); // WHERE usia_5 <= 12
     * </code>
     *
     * @param     mixed $usia5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByUsia5($usia5 = null, $comparison = null)
    {
        if (is_array($usia5)) {
            $useMinMax = false;
            if (isset($usia5['min'])) {
                $this->addUsingAlias(DemografiPeer::USIA_5, $usia5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usia5['max'])) {
                $this->addUsingAlias(DemografiPeer::USIA_5, $usia5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::USIA_5, $usia5, $comparison);
    }

    /**
     * Filter the query on the usia_7 column
     *
     * Example usage:
     * <code>
     * $query->filterByUsia7(1234); // WHERE usia_7 = 1234
     * $query->filterByUsia7(array(12, 34)); // WHERE usia_7 IN (12, 34)
     * $query->filterByUsia7(array('min' => 12)); // WHERE usia_7 >= 12
     * $query->filterByUsia7(array('max' => 12)); // WHERE usia_7 <= 12
     * </code>
     *
     * @param     mixed $usia7 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByUsia7($usia7 = null, $comparison = null)
    {
        if (is_array($usia7)) {
            $useMinMax = false;
            if (isset($usia7['min'])) {
                $this->addUsingAlias(DemografiPeer::USIA_7, $usia7['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usia7['max'])) {
                $this->addUsingAlias(DemografiPeer::USIA_7, $usia7['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::USIA_7, $usia7, $comparison);
    }

    /**
     * Filter the query on the usia_13 column
     *
     * Example usage:
     * <code>
     * $query->filterByUsia13(1234); // WHERE usia_13 = 1234
     * $query->filterByUsia13(array(12, 34)); // WHERE usia_13 IN (12, 34)
     * $query->filterByUsia13(array('min' => 12)); // WHERE usia_13 >= 12
     * $query->filterByUsia13(array('max' => 12)); // WHERE usia_13 <= 12
     * </code>
     *
     * @param     mixed $usia13 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByUsia13($usia13 = null, $comparison = null)
    {
        if (is_array($usia13)) {
            $useMinMax = false;
            if (isset($usia13['min'])) {
                $this->addUsingAlias(DemografiPeer::USIA_13, $usia13['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usia13['max'])) {
                $this->addUsingAlias(DemografiPeer::USIA_13, $usia13['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::USIA_13, $usia13, $comparison);
    }

    /**
     * Filter the query on the usia_16 column
     *
     * Example usage:
     * <code>
     * $query->filterByUsia16(1234); // WHERE usia_16 = 1234
     * $query->filterByUsia16(array(12, 34)); // WHERE usia_16 IN (12, 34)
     * $query->filterByUsia16(array('min' => 12)); // WHERE usia_16 >= 12
     * $query->filterByUsia16(array('max' => 12)); // WHERE usia_16 <= 12
     * </code>
     *
     * @param     mixed $usia16 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByUsia16($usia16 = null, $comparison = null)
    {
        if (is_array($usia16)) {
            $useMinMax = false;
            if (isset($usia16['min'])) {
                $this->addUsingAlias(DemografiPeer::USIA_16, $usia16['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usia16['max'])) {
                $this->addUsingAlias(DemografiPeer::USIA_16, $usia16['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::USIA_16, $usia16, $comparison);
    }

    /**
     * Filter the query on the usia_18 column
     *
     * Example usage:
     * <code>
     * $query->filterByUsia18(1234); // WHERE usia_18 = 1234
     * $query->filterByUsia18(array(12, 34)); // WHERE usia_18 IN (12, 34)
     * $query->filterByUsia18(array('min' => 12)); // WHERE usia_18 >= 12
     * $query->filterByUsia18(array('max' => 12)); // WHERE usia_18 <= 12
     * </code>
     *
     * @param     mixed $usia18 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByUsia18($usia18 = null, $comparison = null)
    {
        if (is_array($usia18)) {
            $useMinMax = false;
            if (isset($usia18['min'])) {
                $this->addUsingAlias(DemografiPeer::USIA_18, $usia18['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($usia18['max'])) {
                $this->addUsingAlias(DemografiPeer::USIA_18, $usia18['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::USIA_18, $usia18, $comparison);
    }

    /**
     * Filter the query on the jumlah_penduduk column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahPenduduk(1234); // WHERE jumlah_penduduk = 1234
     * $query->filterByJumlahPenduduk(array(12, 34)); // WHERE jumlah_penduduk IN (12, 34)
     * $query->filterByJumlahPenduduk(array('min' => 12)); // WHERE jumlah_penduduk >= 12
     * $query->filterByJumlahPenduduk(array('max' => 12)); // WHERE jumlah_penduduk <= 12
     * </code>
     *
     * @param     mixed $jumlahPenduduk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByJumlahPenduduk($jumlahPenduduk = null, $comparison = null)
    {
        if (is_array($jumlahPenduduk)) {
            $useMinMax = false;
            if (isset($jumlahPenduduk['min'])) {
                $this->addUsingAlias(DemografiPeer::JUMLAH_PENDUDUK, $jumlahPenduduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahPenduduk['max'])) {
                $this->addUsingAlias(DemografiPeer::JUMLAH_PENDUDUK, $jumlahPenduduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::JUMLAH_PENDUDUK, $jumlahPenduduk, $comparison);
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
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(DemografiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(DemografiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(DemografiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(DemografiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(DemografiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(DemografiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return DemografiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(DemografiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(DemografiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DemografiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return DemografiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DemografiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DemografiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(DemografiPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DemografiPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DemografiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(DemografiPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DemografiPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
        } else {
            throw new PropelException('filterByTahunAjaran() only accepts arguments of type TahunAjaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TahunAjaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function joinTahunAjaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TahunAjaran');

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
            $this->addJoinObject($join, 'TahunAjaran');
        }

        return $this;
    }

    /**
     * Use the TahunAjaran relation TahunAjaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TahunAjaranQuery A secondary query class using the current class as primary query
     */
    public function useTahunAjaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTahunAjaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TahunAjaran', '\DataDikdas\Model\TahunAjaranQuery');
    }

    /**
     * Filter the query by a related VldDemografi object
     *
     * @param   VldDemografi|PropelObjectCollection $vldDemografi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DemografiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldDemografi($vldDemografi, $comparison = null)
    {
        if ($vldDemografi instanceof VldDemografi) {
            return $this
                ->addUsingAlias(DemografiPeer::DEMOGRAFI_ID, $vldDemografi->getDemografiId(), $comparison);
        } elseif ($vldDemografi instanceof PropelObjectCollection) {
            return $this
                ->useVldDemografiQuery()
                ->filterByPrimaryKeys($vldDemografi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldDemografi() only accepts arguments of type VldDemografi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldDemografi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function joinVldDemografi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldDemografi');

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
            $this->addJoinObject($join, 'VldDemografi');
        }

        return $this;
    }

    /**
     * Use the VldDemografi relation VldDemografi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldDemografiQuery A secondary query class using the current class as primary query
     */
    public function useVldDemografiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldDemografi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldDemografi', '\DataDikdas\Model\VldDemografiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Demografi $demografi Object to remove from the list of results
     *
     * @return DemografiQuery The current query, for fluid interface
     */
    public function prune($demografi = null)
    {
        if ($demografi) {
            $this->addUsingAlias(DemografiPeer::DEMOGRAFI_ID, $demografi->getDemografiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
