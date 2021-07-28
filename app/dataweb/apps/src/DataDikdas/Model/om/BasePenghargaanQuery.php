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
use DataDikdas\Model\JenisPenghargaan;
use DataDikdas\Model\Penghargaan;
use DataDikdas\Model\PenghargaanPeer;
use DataDikdas\Model\PenghargaanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\TingkatPenghargaan;
use DataDikdas\Model\VldPenghargaan;

/**
 * Base class that represents a query for the 'penghargaan' table.
 *
 * 
 *
 * @method PenghargaanQuery orderByPenghargaanId($order = Criteria::ASC) Order by the penghargaan_id column
 * @method PenghargaanQuery orderByTingkatPenghargaanId($order = Criteria::ASC) Order by the tingkat_penghargaan_id column
 * @method PenghargaanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PenghargaanQuery orderByJenisPenghargaanId($order = Criteria::ASC) Order by the jenis_penghargaan_id column
 * @method PenghargaanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PenghargaanQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method PenghargaanQuery orderByInstansi($order = Criteria::ASC) Order by the instansi column
 * @method PenghargaanQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method PenghargaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PenghargaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PenghargaanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PenghargaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PenghargaanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PenghargaanQuery groupByPenghargaanId() Group by the penghargaan_id column
 * @method PenghargaanQuery groupByTingkatPenghargaanId() Group by the tingkat_penghargaan_id column
 * @method PenghargaanQuery groupByPtkId() Group by the ptk_id column
 * @method PenghargaanQuery groupByJenisPenghargaanId() Group by the jenis_penghargaan_id column
 * @method PenghargaanQuery groupByNama() Group by the nama column
 * @method PenghargaanQuery groupByTahun() Group by the tahun column
 * @method PenghargaanQuery groupByInstansi() Group by the instansi column
 * @method PenghargaanQuery groupByAsalData() Group by the asal_data column
 * @method PenghargaanQuery groupByCreateDate() Group by the create_date column
 * @method PenghargaanQuery groupByLastUpdate() Group by the last_update column
 * @method PenghargaanQuery groupBySoftDelete() Group by the soft_delete column
 * @method PenghargaanQuery groupByLastSync() Group by the last_sync column
 * @method PenghargaanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PenghargaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PenghargaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PenghargaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PenghargaanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PenghargaanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PenghargaanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PenghargaanQuery leftJoinJenisPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPenghargaan relation
 * @method PenghargaanQuery rightJoinJenisPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPenghargaan relation
 * @method PenghargaanQuery innerJoinJenisPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPenghargaan relation
 *
 * @method PenghargaanQuery leftJoinTingkatPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPenghargaan relation
 * @method PenghargaanQuery rightJoinTingkatPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPenghargaan relation
 * @method PenghargaanQuery innerJoinTingkatPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPenghargaan relation
 *
 * @method PenghargaanQuery leftJoinVldPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPenghargaan relation
 * @method PenghargaanQuery rightJoinVldPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPenghargaan relation
 * @method PenghargaanQuery innerJoinVldPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPenghargaan relation
 *
 * @method Penghargaan findOne(PropelPDO $con = null) Return the first Penghargaan matching the query
 * @method Penghargaan findOneOrCreate(PropelPDO $con = null) Return the first Penghargaan matching the query, or a new Penghargaan object populated from the query conditions when no match is found
 *
 * @method Penghargaan findOneByTingkatPenghargaanId(int $tingkat_penghargaan_id) Return the first Penghargaan filtered by the tingkat_penghargaan_id column
 * @method Penghargaan findOneByPtkId(string $ptk_id) Return the first Penghargaan filtered by the ptk_id column
 * @method Penghargaan findOneByJenisPenghargaanId(int $jenis_penghargaan_id) Return the first Penghargaan filtered by the jenis_penghargaan_id column
 * @method Penghargaan findOneByNama(string $nama) Return the first Penghargaan filtered by the nama column
 * @method Penghargaan findOneByTahun(string $tahun) Return the first Penghargaan filtered by the tahun column
 * @method Penghargaan findOneByInstansi(string $instansi) Return the first Penghargaan filtered by the instansi column
 * @method Penghargaan findOneByAsalData(string $asal_data) Return the first Penghargaan filtered by the asal_data column
 * @method Penghargaan findOneByCreateDate(string $create_date) Return the first Penghargaan filtered by the create_date column
 * @method Penghargaan findOneByLastUpdate(string $last_update) Return the first Penghargaan filtered by the last_update column
 * @method Penghargaan findOneBySoftDelete(string $soft_delete) Return the first Penghargaan filtered by the soft_delete column
 * @method Penghargaan findOneByLastSync(string $last_sync) Return the first Penghargaan filtered by the last_sync column
 * @method Penghargaan findOneByUpdaterId(string $updater_id) Return the first Penghargaan filtered by the updater_id column
 *
 * @method array findByPenghargaanId(string $penghargaan_id) Return Penghargaan objects filtered by the penghargaan_id column
 * @method array findByTingkatPenghargaanId(int $tingkat_penghargaan_id) Return Penghargaan objects filtered by the tingkat_penghargaan_id column
 * @method array findByPtkId(string $ptk_id) Return Penghargaan objects filtered by the ptk_id column
 * @method array findByJenisPenghargaanId(int $jenis_penghargaan_id) Return Penghargaan objects filtered by the jenis_penghargaan_id column
 * @method array findByNama(string $nama) Return Penghargaan objects filtered by the nama column
 * @method array findByTahun(string $tahun) Return Penghargaan objects filtered by the tahun column
 * @method array findByInstansi(string $instansi) Return Penghargaan objects filtered by the instansi column
 * @method array findByAsalData(string $asal_data) Return Penghargaan objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Penghargaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Penghargaan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Penghargaan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Penghargaan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Penghargaan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePenghargaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePenghargaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Penghargaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PenghargaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PenghargaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PenghargaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PenghargaanQuery) {
            return $criteria;
        }
        $query = new PenghargaanQuery();
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
     * @return   Penghargaan|Penghargaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PenghargaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PenghargaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Penghargaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPenghargaanId($key, $con = null)
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
     * @return                 Penghargaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "penghargaan_id", "tingkat_penghargaan_id", "ptk_id", "jenis_penghargaan_id", "nama", "tahun", "instansi", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "penghargaan" WHERE "penghargaan_id" = :p0';
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
            $obj = new Penghargaan();
            $obj->hydrate($row);
            PenghargaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Penghargaan|Penghargaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Penghargaan[]|mixed the list of results, formatted by the current formatter
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
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PenghargaanPeer::PENGHARGAAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PenghargaanPeer::PENGHARGAAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the penghargaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghargaanId('fooValue');   // WHERE penghargaan_id = 'fooValue'
     * $query->filterByPenghargaanId('%fooValue%'); // WHERE penghargaan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penghargaanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByPenghargaanId($penghargaanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penghargaanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penghargaanId)) {
                $penghargaanId = str_replace('*', '%', $penghargaanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::PENGHARGAAN_ID, $penghargaanId, $comparison);
    }

    /**
     * Filter the query on the tingkat_penghargaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPenghargaanId(1234); // WHERE tingkat_penghargaan_id = 1234
     * $query->filterByTingkatPenghargaanId(array(12, 34)); // WHERE tingkat_penghargaan_id IN (12, 34)
     * $query->filterByTingkatPenghargaanId(array('min' => 12)); // WHERE tingkat_penghargaan_id >= 12
     * $query->filterByTingkatPenghargaanId(array('max' => 12)); // WHERE tingkat_penghargaan_id <= 12
     * </code>
     *
     * @see       filterByTingkatPenghargaan()
     *
     * @param     mixed $tingkatPenghargaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByTingkatPenghargaanId($tingkatPenghargaanId = null, $comparison = null)
    {
        if (is_array($tingkatPenghargaanId)) {
            $useMinMax = false;
            if (isset($tingkatPenghargaanId['min'])) {
                $this->addUsingAlias(PenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPenghargaanId['max'])) {
                $this->addUsingAlias(PenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaanId, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the jenis_penghargaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPenghargaanId(1234); // WHERE jenis_penghargaan_id = 1234
     * $query->filterByJenisPenghargaanId(array(12, 34)); // WHERE jenis_penghargaan_id IN (12, 34)
     * $query->filterByJenisPenghargaanId(array('min' => 12)); // WHERE jenis_penghargaan_id >= 12
     * $query->filterByJenisPenghargaanId(array('max' => 12)); // WHERE jenis_penghargaan_id <= 12
     * </code>
     *
     * @see       filterByJenisPenghargaan()
     *
     * @param     mixed $jenisPenghargaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByJenisPenghargaanId($jenisPenghargaanId = null, $comparison = null)
    {
        if (is_array($jenisPenghargaanId)) {
            $useMinMax = false;
            if (isset($jenisPenghargaanId['min'])) {
                $this->addUsingAlias(PenghargaanPeer::JENIS_PENGHARGAAN_ID, $jenisPenghargaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPenghargaanId['max'])) {
                $this->addUsingAlias(PenghargaanPeer::JENIS_PENGHARGAAN_ID, $jenisPenghargaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::JENIS_PENGHARGAAN_ID, $jenisPenghargaanId, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenghargaanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByTahun(1234); // WHERE tahun = 1234
     * $query->filterByTahun(array(12, 34)); // WHERE tahun IN (12, 34)
     * $query->filterByTahun(array('min' => 12)); // WHERE tahun >= 12
     * $query->filterByTahun(array('max' => 12)); // WHERE tahun <= 12
     * </code>
     *
     * @param     mixed $tahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(PenghargaanPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(PenghargaanPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::TAHUN, $tahun, $comparison);
    }

    /**
     * Filter the query on the instansi column
     *
     * Example usage:
     * <code>
     * $query->filterByInstansi('fooValue');   // WHERE instansi = 'fooValue'
     * $query->filterByInstansi('%fooValue%'); // WHERE instansi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instansi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByInstansi($instansi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instansi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $instansi)) {
                $instansi = str_replace('*', '%', $instansi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::INSTANSI, $instansi, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenghargaanPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PenghargaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PenghargaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PenghargaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PenghargaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PenghargaanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PenghargaanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PenghargaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PenghargaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenghargaanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PenghargaanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenghargaanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghargaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PenghargaanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenghargaanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related JenisPenghargaan object
     *
     * @param   JenisPenghargaan|PropelObjectCollection $jenisPenghargaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghargaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPenghargaan($jenisPenghargaan, $comparison = null)
    {
        if ($jenisPenghargaan instanceof JenisPenghargaan) {
            return $this
                ->addUsingAlias(PenghargaanPeer::JENIS_PENGHARGAAN_ID, $jenisPenghargaan->getJenisPenghargaanId(), $comparison);
        } elseif ($jenisPenghargaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenghargaanPeer::JENIS_PENGHARGAAN_ID, $jenisPenghargaan->toKeyValue('PrimaryKey', 'JenisPenghargaanId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPenghargaan() only accepts arguments of type JenisPenghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPenghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function joinJenisPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPenghargaan');

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
            $this->addJoinObject($join, 'JenisPenghargaan');
        }

        return $this;
    }

    /**
     * Use the JenisPenghargaan relation JenisPenghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPenghargaanQuery A secondary query class using the current class as primary query
     */
    public function useJenisPenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPenghargaan', '\DataDikdas\Model\JenisPenghargaanQuery');
    }

    /**
     * Filter the query by a related TingkatPenghargaan object
     *
     * @param   TingkatPenghargaan|PropelObjectCollection $tingkatPenghargaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghargaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPenghargaan($tingkatPenghargaan, $comparison = null)
    {
        if ($tingkatPenghargaan instanceof TingkatPenghargaan) {
            return $this
                ->addUsingAlias(PenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaan->getTingkatPenghargaanId(), $comparison);
        } elseif ($tingkatPenghargaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenghargaanPeer::TINGKAT_PENGHARGAAN_ID, $tingkatPenghargaan->toKeyValue('PrimaryKey', 'TingkatPenghargaanId'), $comparison);
        } else {
            throw new PropelException('filterByTingkatPenghargaan() only accepts arguments of type TingkatPenghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPenghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function joinTingkatPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPenghargaan');

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
            $this->addJoinObject($join, 'TingkatPenghargaan');
        }

        return $this;
    }

    /**
     * Use the TingkatPenghargaan relation TingkatPenghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPenghargaanQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPenghargaan', '\DataDikdas\Model\TingkatPenghargaanQuery');
    }

    /**
     * Filter the query by a related VldPenghargaan object
     *
     * @param   VldPenghargaan|PropelObjectCollection $vldPenghargaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenghargaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPenghargaan($vldPenghargaan, $comparison = null)
    {
        if ($vldPenghargaan instanceof VldPenghargaan) {
            return $this
                ->addUsingAlias(PenghargaanPeer::PENGHARGAAN_ID, $vldPenghargaan->getPenghargaanId(), $comparison);
        } elseif ($vldPenghargaan instanceof PropelObjectCollection) {
            return $this
                ->useVldPenghargaanQuery()
                ->filterByPrimaryKeys($vldPenghargaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPenghargaan() only accepts arguments of type VldPenghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPenghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function joinVldPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPenghargaan');

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
            $this->addJoinObject($join, 'VldPenghargaan');
        }

        return $this;
    }

    /**
     * Use the VldPenghargaan relation VldPenghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPenghargaanQuery A secondary query class using the current class as primary query
     */
    public function useVldPenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPenghargaan', '\DataDikdas\Model\VldPenghargaanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Penghargaan $penghargaan Object to remove from the list of results
     *
     * @return PenghargaanQuery The current query, for fluid interface
     */
    public function prune($penghargaan = null)
    {
        if ($penghargaan) {
            $this->addUsingAlias(PenghargaanPeer::PENGHARGAAN_ID, $penghargaan->getPenghargaanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
