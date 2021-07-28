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
use DataDikdas\Model\BeasiswaPtk;
use DataDikdas\Model\BeasiswaPtkPeer;
use DataDikdas\Model\BeasiswaPtkQuery;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldBeaPtk;

/**
 * Base class that represents a query for the 'beasiswa_ptk' table.
 *
 * 
 *
 * @method BeasiswaPtkQuery orderByBeasiswaPtkId($order = Criteria::ASC) Order by the beasiswa_ptk_id column
 * @method BeasiswaPtkQuery orderByJenisBeasiswaId($order = Criteria::ASC) Order by the jenis_beasiswa_id column
 * @method BeasiswaPtkQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method BeasiswaPtkQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method BeasiswaPtkQuery orderByTahunMulai($order = Criteria::ASC) Order by the tahun_mulai column
 * @method BeasiswaPtkQuery orderByTahunAkhir($order = Criteria::ASC) Order by the tahun_akhir column
 * @method BeasiswaPtkQuery orderByMasihMenerima($order = Criteria::ASC) Order by the masih_menerima column
 * @method BeasiswaPtkQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BeasiswaPtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BeasiswaPtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BeasiswaPtkQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BeasiswaPtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BeasiswaPtkQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BeasiswaPtkQuery groupByBeasiswaPtkId() Group by the beasiswa_ptk_id column
 * @method BeasiswaPtkQuery groupByJenisBeasiswaId() Group by the jenis_beasiswa_id column
 * @method BeasiswaPtkQuery groupByPtkId() Group by the ptk_id column
 * @method BeasiswaPtkQuery groupByKeterangan() Group by the keterangan column
 * @method BeasiswaPtkQuery groupByTahunMulai() Group by the tahun_mulai column
 * @method BeasiswaPtkQuery groupByTahunAkhir() Group by the tahun_akhir column
 * @method BeasiswaPtkQuery groupByMasihMenerima() Group by the masih_menerima column
 * @method BeasiswaPtkQuery groupByAsalData() Group by the asal_data column
 * @method BeasiswaPtkQuery groupByCreateDate() Group by the create_date column
 * @method BeasiswaPtkQuery groupByLastUpdate() Group by the last_update column
 * @method BeasiswaPtkQuery groupBySoftDelete() Group by the soft_delete column
 * @method BeasiswaPtkQuery groupByLastSync() Group by the last_sync column
 * @method BeasiswaPtkQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BeasiswaPtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BeasiswaPtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BeasiswaPtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BeasiswaPtkQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BeasiswaPtkQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BeasiswaPtkQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BeasiswaPtkQuery leftJoinJenisBeasiswa($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisBeasiswa relation
 * @method BeasiswaPtkQuery rightJoinJenisBeasiswa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisBeasiswa relation
 * @method BeasiswaPtkQuery innerJoinJenisBeasiswa($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisBeasiswa relation
 *
 * @method BeasiswaPtkQuery leftJoinVldBeaPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBeaPtk relation
 * @method BeasiswaPtkQuery rightJoinVldBeaPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBeaPtk relation
 * @method BeasiswaPtkQuery innerJoinVldBeaPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBeaPtk relation
 *
 * @method BeasiswaPtk findOne(PropelPDO $con = null) Return the first BeasiswaPtk matching the query
 * @method BeasiswaPtk findOneOrCreate(PropelPDO $con = null) Return the first BeasiswaPtk matching the query, or a new BeasiswaPtk object populated from the query conditions when no match is found
 *
 * @method BeasiswaPtk findOneByJenisBeasiswaId(int $jenis_beasiswa_id) Return the first BeasiswaPtk filtered by the jenis_beasiswa_id column
 * @method BeasiswaPtk findOneByPtkId(string $ptk_id) Return the first BeasiswaPtk filtered by the ptk_id column
 * @method BeasiswaPtk findOneByKeterangan(string $keterangan) Return the first BeasiswaPtk filtered by the keterangan column
 * @method BeasiswaPtk findOneByTahunMulai(string $tahun_mulai) Return the first BeasiswaPtk filtered by the tahun_mulai column
 * @method BeasiswaPtk findOneByTahunAkhir(string $tahun_akhir) Return the first BeasiswaPtk filtered by the tahun_akhir column
 * @method BeasiswaPtk findOneByMasihMenerima(string $masih_menerima) Return the first BeasiswaPtk filtered by the masih_menerima column
 * @method BeasiswaPtk findOneByAsalData(string $asal_data) Return the first BeasiswaPtk filtered by the asal_data column
 * @method BeasiswaPtk findOneByCreateDate(string $create_date) Return the first BeasiswaPtk filtered by the create_date column
 * @method BeasiswaPtk findOneByLastUpdate(string $last_update) Return the first BeasiswaPtk filtered by the last_update column
 * @method BeasiswaPtk findOneBySoftDelete(string $soft_delete) Return the first BeasiswaPtk filtered by the soft_delete column
 * @method BeasiswaPtk findOneByLastSync(string $last_sync) Return the first BeasiswaPtk filtered by the last_sync column
 * @method BeasiswaPtk findOneByUpdaterId(string $updater_id) Return the first BeasiswaPtk filtered by the updater_id column
 *
 * @method array findByBeasiswaPtkId(string $beasiswa_ptk_id) Return BeasiswaPtk objects filtered by the beasiswa_ptk_id column
 * @method array findByJenisBeasiswaId(int $jenis_beasiswa_id) Return BeasiswaPtk objects filtered by the jenis_beasiswa_id column
 * @method array findByPtkId(string $ptk_id) Return BeasiswaPtk objects filtered by the ptk_id column
 * @method array findByKeterangan(string $keterangan) Return BeasiswaPtk objects filtered by the keterangan column
 * @method array findByTahunMulai(string $tahun_mulai) Return BeasiswaPtk objects filtered by the tahun_mulai column
 * @method array findByTahunAkhir(string $tahun_akhir) Return BeasiswaPtk objects filtered by the tahun_akhir column
 * @method array findByMasihMenerima(string $masih_menerima) Return BeasiswaPtk objects filtered by the masih_menerima column
 * @method array findByAsalData(string $asal_data) Return BeasiswaPtk objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return BeasiswaPtk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BeasiswaPtk objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BeasiswaPtk objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BeasiswaPtk objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BeasiswaPtk objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBeasiswaPtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBeasiswaPtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BeasiswaPtk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BeasiswaPtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BeasiswaPtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BeasiswaPtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BeasiswaPtkQuery) {
            return $criteria;
        }
        $query = new BeasiswaPtkQuery();
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
     * @return   BeasiswaPtk|BeasiswaPtk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BeasiswaPtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BeasiswaPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BeasiswaPtk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBeasiswaPtkId($key, $con = null)
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
     * @return                 BeasiswaPtk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "beasiswa_ptk_id", "jenis_beasiswa_id", "ptk_id", "keterangan", "tahun_mulai", "tahun_akhir", "masih_menerima", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "beasiswa_ptk" WHERE "beasiswa_ptk_id" = :p0';
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
            $obj = new BeasiswaPtk();
            $obj->hydrate($row);
            BeasiswaPtkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BeasiswaPtk|BeasiswaPtk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BeasiswaPtk[]|mixed the list of results, formatted by the current formatter
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BeasiswaPtkPeer::BEASISWA_PTK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BeasiswaPtkPeer::BEASISWA_PTK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the beasiswa_ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBeasiswaPtkId('fooValue');   // WHERE beasiswa_ptk_id = 'fooValue'
     * $query->filterByBeasiswaPtkId('%fooValue%'); // WHERE beasiswa_ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beasiswaPtkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByBeasiswaPtkId($beasiswaPtkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beasiswaPtkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $beasiswaPtkId)) {
                $beasiswaPtkId = str_replace('*', '%', $beasiswaPtkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::BEASISWA_PTK_ID, $beasiswaPtkId, $comparison);
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
     * @see       filterByJenisBeasiswa()
     *
     * @param     mixed $jenisBeasiswaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByJenisBeasiswaId($jenisBeasiswaId = null, $comparison = null)
    {
        if (is_array($jenisBeasiswaId)) {
            $useMinMax = false;
            if (isset($jenisBeasiswaId['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBeasiswaId['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPtkPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the tahun_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunMulai(1234); // WHERE tahun_mulai = 1234
     * $query->filterByTahunMulai(array(12, 34)); // WHERE tahun_mulai IN (12, 34)
     * $query->filterByTahunMulai(array('min' => 12)); // WHERE tahun_mulai >= 12
     * $query->filterByTahunMulai(array('max' => 12)); // WHERE tahun_mulai <= 12
     * </code>
     *
     * @param     mixed $tahunMulai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByTahunMulai($tahunMulai = null, $comparison = null)
    {
        if (is_array($tahunMulai)) {
            $useMinMax = false;
            if (isset($tahunMulai['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_MULAI, $tahunMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunMulai['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_MULAI, $tahunMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_MULAI, $tahunMulai, $comparison);
    }

    /**
     * Filter the query on the tahun_akhir column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunAkhir(1234); // WHERE tahun_akhir = 1234
     * $query->filterByTahunAkhir(array(12, 34)); // WHERE tahun_akhir IN (12, 34)
     * $query->filterByTahunAkhir(array('min' => 12)); // WHERE tahun_akhir >= 12
     * $query->filterByTahunAkhir(array('max' => 12)); // WHERE tahun_akhir <= 12
     * </code>
     *
     * @param     mixed $tahunAkhir The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByTahunAkhir($tahunAkhir = null, $comparison = null)
    {
        if (is_array($tahunAkhir)) {
            $useMinMax = false;
            if (isset($tahunAkhir['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_AKHIR, $tahunAkhir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAkhir['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_AKHIR, $tahunAkhir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::TAHUN_AKHIR, $tahunAkhir, $comparison);
    }

    /**
     * Filter the query on the masih_menerima column
     *
     * Example usage:
     * <code>
     * $query->filterByMasihMenerima(1234); // WHERE masih_menerima = 1234
     * $query->filterByMasihMenerima(array(12, 34)); // WHERE masih_menerima IN (12, 34)
     * $query->filterByMasihMenerima(array('min' => 12)); // WHERE masih_menerima >= 12
     * $query->filterByMasihMenerima(array('max' => 12)); // WHERE masih_menerima <= 12
     * </code>
     *
     * @param     mixed $masihMenerima The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByMasihMenerima($masihMenerima = null, $comparison = null)
    {
        if (is_array($masihMenerima)) {
            $useMinMax = false;
            if (isset($masihMenerima['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::MASIH_MENERIMA, $masihMenerima['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masihMenerima['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::MASIH_MENERIMA, $masihMenerima['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::MASIH_MENERIMA, $masihMenerima, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPtkPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BeasiswaPtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPtkPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPtkPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BeasiswaPtkPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPtkPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return BeasiswaPtkQuery The current query, for fluid interface
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
     * Filter the query by a related JenisBeasiswa object
     *
     * @param   JenisBeasiswa|PropelObjectCollection $jenisBeasiswa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisBeasiswa($jenisBeasiswa, $comparison = null)
    {
        if ($jenisBeasiswa instanceof JenisBeasiswa) {
            return $this
                ->addUsingAlias(BeasiswaPtkPeer::JENIS_BEASISWA_ID, $jenisBeasiswa->getJenisBeasiswaId(), $comparison);
        } elseif ($jenisBeasiswa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPtkPeer::JENIS_BEASISWA_ID, $jenisBeasiswa->toKeyValue('PrimaryKey', 'JenisBeasiswaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisBeasiswa() only accepts arguments of type JenisBeasiswa or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisBeasiswa relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function joinJenisBeasiswa($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisBeasiswa');

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
            $this->addJoinObject($join, 'JenisBeasiswa');
        }

        return $this;
    }

    /**
     * Use the JenisBeasiswa relation JenisBeasiswa object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisBeasiswaQuery A secondary query class using the current class as primary query
     */
    public function useJenisBeasiswaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisBeasiswa($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisBeasiswa', '\DataDikdas\Model\JenisBeasiswaQuery');
    }

    /**
     * Filter the query by a related VldBeaPtk object
     *
     * @param   VldBeaPtk|PropelObjectCollection $vldBeaPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBeaPtk($vldBeaPtk, $comparison = null)
    {
        if ($vldBeaPtk instanceof VldBeaPtk) {
            return $this
                ->addUsingAlias(BeasiswaPtkPeer::BEASISWA_PTK_ID, $vldBeaPtk->getBeasiswaPtkId(), $comparison);
        } elseif ($vldBeaPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldBeaPtkQuery()
                ->filterByPrimaryKeys($vldBeaPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBeaPtk() only accepts arguments of type VldBeaPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBeaPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function joinVldBeaPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBeaPtk');

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
            $this->addJoinObject($join, 'VldBeaPtk');
        }

        return $this;
    }

    /**
     * Use the VldBeaPtk relation VldBeaPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBeaPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldBeaPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBeaPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBeaPtk', '\DataDikdas\Model\VldBeaPtkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BeasiswaPtk $beasiswaPtk Object to remove from the list of results
     *
     * @return BeasiswaPtkQuery The current query, for fluid interface
     */
    public function prune($beasiswaPtk = null)
    {
        if ($beasiswaPtk) {
            $this->addUsingAlias(BeasiswaPtkPeer::BEASISWA_PTK_ID, $beasiswaPtk->getBeasiswaPtkId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
