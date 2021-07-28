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
use DataDikdas\Model\BeasiswaPesertaDidikPeer;
use DataDikdas\Model\BeasiswaPesertaDidikQuery;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\VldBeaPd;

/**
 * Base class that represents a query for the 'beasiswa_peserta_didik' table.
 *
 * 
 *
 * @method BeasiswaPesertaDidikQuery orderByBeasiswaPesertaDidikId($order = Criteria::ASC) Order by the beasiswa_peserta_didik_id column
 * @method BeasiswaPesertaDidikQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method BeasiswaPesertaDidikQuery orderByJenisBeasiswaId($order = Criteria::ASC) Order by the jenis_beasiswa_id column
 * @method BeasiswaPesertaDidikQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method BeasiswaPesertaDidikQuery orderByTahunMulai($order = Criteria::ASC) Order by the tahun_mulai column
 * @method BeasiswaPesertaDidikQuery orderByTahunSelesai($order = Criteria::ASC) Order by the tahun_selesai column
 * @method BeasiswaPesertaDidikQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BeasiswaPesertaDidikQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BeasiswaPesertaDidikQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BeasiswaPesertaDidikQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BeasiswaPesertaDidikQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BeasiswaPesertaDidikQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BeasiswaPesertaDidikQuery groupByBeasiswaPesertaDidikId() Group by the beasiswa_peserta_didik_id column
 * @method BeasiswaPesertaDidikQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method BeasiswaPesertaDidikQuery groupByJenisBeasiswaId() Group by the jenis_beasiswa_id column
 * @method BeasiswaPesertaDidikQuery groupByKeterangan() Group by the keterangan column
 * @method BeasiswaPesertaDidikQuery groupByTahunMulai() Group by the tahun_mulai column
 * @method BeasiswaPesertaDidikQuery groupByTahunSelesai() Group by the tahun_selesai column
 * @method BeasiswaPesertaDidikQuery groupByAsalData() Group by the asal_data column
 * @method BeasiswaPesertaDidikQuery groupByCreateDate() Group by the create_date column
 * @method BeasiswaPesertaDidikQuery groupByLastUpdate() Group by the last_update column
 * @method BeasiswaPesertaDidikQuery groupBySoftDelete() Group by the soft_delete column
 * @method BeasiswaPesertaDidikQuery groupByLastSync() Group by the last_sync column
 * @method BeasiswaPesertaDidikQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BeasiswaPesertaDidikQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BeasiswaPesertaDidikQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BeasiswaPesertaDidikQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BeasiswaPesertaDidikQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method BeasiswaPesertaDidikQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method BeasiswaPesertaDidikQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method BeasiswaPesertaDidikQuery leftJoinTahunAjaranRelatedByTahunSelesai($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaranRelatedByTahunSelesai relation
 * @method BeasiswaPesertaDidikQuery rightJoinTahunAjaranRelatedByTahunSelesai($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaranRelatedByTahunSelesai relation
 * @method BeasiswaPesertaDidikQuery innerJoinTahunAjaranRelatedByTahunSelesai($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaranRelatedByTahunSelesai relation
 *
 * @method BeasiswaPesertaDidikQuery leftJoinTahunAjaranRelatedByTahunMulai($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaranRelatedByTahunMulai relation
 * @method BeasiswaPesertaDidikQuery rightJoinTahunAjaranRelatedByTahunMulai($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaranRelatedByTahunMulai relation
 * @method BeasiswaPesertaDidikQuery innerJoinTahunAjaranRelatedByTahunMulai($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaranRelatedByTahunMulai relation
 *
 * @method BeasiswaPesertaDidikQuery leftJoinJenisBeasiswa($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisBeasiswa relation
 * @method BeasiswaPesertaDidikQuery rightJoinJenisBeasiswa($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisBeasiswa relation
 * @method BeasiswaPesertaDidikQuery innerJoinJenisBeasiswa($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisBeasiswa relation
 *
 * @method BeasiswaPesertaDidikQuery leftJoinVldBeaPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBeaPd relation
 * @method BeasiswaPesertaDidikQuery rightJoinVldBeaPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBeaPd relation
 * @method BeasiswaPesertaDidikQuery innerJoinVldBeaPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBeaPd relation
 *
 * @method BeasiswaPesertaDidik findOne(PropelPDO $con = null) Return the first BeasiswaPesertaDidik matching the query
 * @method BeasiswaPesertaDidik findOneOrCreate(PropelPDO $con = null) Return the first BeasiswaPesertaDidik matching the query, or a new BeasiswaPesertaDidik object populated from the query conditions when no match is found
 *
 * @method BeasiswaPesertaDidik findOneByPesertaDidikId(string $peserta_didik_id) Return the first BeasiswaPesertaDidik filtered by the peserta_didik_id column
 * @method BeasiswaPesertaDidik findOneByJenisBeasiswaId(int $jenis_beasiswa_id) Return the first BeasiswaPesertaDidik filtered by the jenis_beasiswa_id column
 * @method BeasiswaPesertaDidik findOneByKeterangan(string $keterangan) Return the first BeasiswaPesertaDidik filtered by the keterangan column
 * @method BeasiswaPesertaDidik findOneByTahunMulai(string $tahun_mulai) Return the first BeasiswaPesertaDidik filtered by the tahun_mulai column
 * @method BeasiswaPesertaDidik findOneByTahunSelesai(string $tahun_selesai) Return the first BeasiswaPesertaDidik filtered by the tahun_selesai column
 * @method BeasiswaPesertaDidik findOneByAsalData(string $asal_data) Return the first BeasiswaPesertaDidik filtered by the asal_data column
 * @method BeasiswaPesertaDidik findOneByCreateDate(string $create_date) Return the first BeasiswaPesertaDidik filtered by the create_date column
 * @method BeasiswaPesertaDidik findOneByLastUpdate(string $last_update) Return the first BeasiswaPesertaDidik filtered by the last_update column
 * @method BeasiswaPesertaDidik findOneBySoftDelete(string $soft_delete) Return the first BeasiswaPesertaDidik filtered by the soft_delete column
 * @method BeasiswaPesertaDidik findOneByLastSync(string $last_sync) Return the first BeasiswaPesertaDidik filtered by the last_sync column
 * @method BeasiswaPesertaDidik findOneByUpdaterId(string $updater_id) Return the first BeasiswaPesertaDidik filtered by the updater_id column
 *
 * @method array findByBeasiswaPesertaDidikId(string $beasiswa_peserta_didik_id) Return BeasiswaPesertaDidik objects filtered by the beasiswa_peserta_didik_id column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return BeasiswaPesertaDidik objects filtered by the peserta_didik_id column
 * @method array findByJenisBeasiswaId(int $jenis_beasiswa_id) Return BeasiswaPesertaDidik objects filtered by the jenis_beasiswa_id column
 * @method array findByKeterangan(string $keterangan) Return BeasiswaPesertaDidik objects filtered by the keterangan column
 * @method array findByTahunMulai(string $tahun_mulai) Return BeasiswaPesertaDidik objects filtered by the tahun_mulai column
 * @method array findByTahunSelesai(string $tahun_selesai) Return BeasiswaPesertaDidik objects filtered by the tahun_selesai column
 * @method array findByAsalData(string $asal_data) Return BeasiswaPesertaDidik objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return BeasiswaPesertaDidik objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BeasiswaPesertaDidik objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BeasiswaPesertaDidik objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BeasiswaPesertaDidik objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BeasiswaPesertaDidik objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBeasiswaPesertaDidikQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBeasiswaPesertaDidikQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BeasiswaPesertaDidik', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BeasiswaPesertaDidikQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BeasiswaPesertaDidikQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BeasiswaPesertaDidikQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BeasiswaPesertaDidikQuery) {
            return $criteria;
        }
        $query = new BeasiswaPesertaDidikQuery();
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
     * @return   BeasiswaPesertaDidik|BeasiswaPesertaDidik[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BeasiswaPesertaDidikPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BeasiswaPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BeasiswaPesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBeasiswaPesertaDidikId($key, $con = null)
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
     * @return                 BeasiswaPesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "beasiswa_peserta_didik_id", "peserta_didik_id", "jenis_beasiswa_id", "keterangan", "tahun_mulai", "tahun_selesai", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "beasiswa_peserta_didik" WHERE "beasiswa_peserta_didik_id" = :p0';
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
            $obj = new BeasiswaPesertaDidik();
            $obj->hydrate($row);
            BeasiswaPesertaDidikPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BeasiswaPesertaDidik|BeasiswaPesertaDidik[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BeasiswaPesertaDidik[]|mixed the list of results, formatted by the current formatter
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the beasiswa_peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBeasiswaPesertaDidikId('fooValue');   // WHERE beasiswa_peserta_didik_id = 'fooValue'
     * $query->filterByBeasiswaPesertaDidikId('%fooValue%'); // WHERE beasiswa_peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $beasiswaPesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByBeasiswaPesertaDidikId($beasiswaPesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($beasiswaPesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $beasiswaPesertaDidikId)) {
                $beasiswaPesertaDidikId = str_replace('*', '%', $beasiswaPesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $beasiswaPesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenisBeasiswaId($jenisBeasiswaId = null, $comparison = null)
    {
        if (is_array($jenisBeasiswaId)) {
            $useMinMax = false;
            if (isset($jenisBeasiswaId['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBeasiswaId['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $jenisBeasiswaId, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::KETERANGAN, $keterangan, $comparison);
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
     * @see       filterByTahunAjaranRelatedByTahunMulai()
     *
     * @param     mixed $tahunMulai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTahunMulai($tahunMulai = null, $comparison = null)
    {
        if (is_array($tahunMulai)) {
            $useMinMax = false;
            if (isset($tahunMulai['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $tahunMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunMulai['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $tahunMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $tahunMulai, $comparison);
    }

    /**
     * Filter the query on the tahun_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunSelesai(1234); // WHERE tahun_selesai = 1234
     * $query->filterByTahunSelesai(array(12, 34)); // WHERE tahun_selesai IN (12, 34)
     * $query->filterByTahunSelesai(array('min' => 12)); // WHERE tahun_selesai >= 12
     * $query->filterByTahunSelesai(array('max' => 12)); // WHERE tahun_selesai <= 12
     * </code>
     *
     * @see       filterByTahunAjaranRelatedByTahunSelesai()
     *
     * @param     mixed $tahunSelesai The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTahunSelesai($tahunSelesai = null, $comparison = null)
    {
        if (is_array($tahunSelesai)) {
            $useMinMax = false;
            if (isset($tahunSelesai['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $tahunSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunSelesai['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $tahunSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $tahunSelesai, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BeasiswaPesertaDidikPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaranRelatedByTahunSelesai($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
        } else {
            throw new PropelException('filterByTahunAjaranRelatedByTahunSelesai() only accepts arguments of type TahunAjaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TahunAjaranRelatedByTahunSelesai relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function joinTahunAjaranRelatedByTahunSelesai($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TahunAjaranRelatedByTahunSelesai');

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
            $this->addJoinObject($join, 'TahunAjaranRelatedByTahunSelesai');
        }

        return $this;
    }

    /**
     * Use the TahunAjaranRelatedByTahunSelesai relation TahunAjaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TahunAjaranQuery A secondary query class using the current class as primary query
     */
    public function useTahunAjaranRelatedByTahunSelesaiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTahunAjaranRelatedByTahunSelesai($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TahunAjaranRelatedByTahunSelesai', '\DataDikdas\Model\TahunAjaranQuery');
    }

    /**
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaranRelatedByTahunMulai($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
        } else {
            throw new PropelException('filterByTahunAjaranRelatedByTahunMulai() only accepts arguments of type TahunAjaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TahunAjaranRelatedByTahunMulai relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function joinTahunAjaranRelatedByTahunMulai($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TahunAjaranRelatedByTahunMulai');

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
            $this->addJoinObject($join, 'TahunAjaranRelatedByTahunMulai');
        }

        return $this;
    }

    /**
     * Use the TahunAjaranRelatedByTahunMulai relation TahunAjaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TahunAjaranQuery A secondary query class using the current class as primary query
     */
    public function useTahunAjaranRelatedByTahunMulaiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTahunAjaranRelatedByTahunMulai($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TahunAjaranRelatedByTahunMulai', '\DataDikdas\Model\TahunAjaranQuery');
    }

    /**
     * Filter the query by a related JenisBeasiswa object
     *
     * @param   JenisBeasiswa|PropelObjectCollection $jenisBeasiswa The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisBeasiswa($jenisBeasiswa, $comparison = null)
    {
        if ($jenisBeasiswa instanceof JenisBeasiswa) {
            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $jenisBeasiswa->getJenisBeasiswaId(), $comparison);
        } elseif ($jenisBeasiswa instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $jenisBeasiswa->toKeyValue('PrimaryKey', 'JenisBeasiswaId'), $comparison);
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
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related VldBeaPd object
     *
     * @param   VldBeaPd|PropelObjectCollection $vldBeaPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BeasiswaPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBeaPd($vldBeaPd, $comparison = null)
    {
        if ($vldBeaPd instanceof VldBeaPd) {
            return $this
                ->addUsingAlias(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $vldBeaPd->getBeasiswaPesertaDidikId(), $comparison);
        } elseif ($vldBeaPd instanceof PropelObjectCollection) {
            return $this
                ->useVldBeaPdQuery()
                ->filterByPrimaryKeys($vldBeaPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBeaPd() only accepts arguments of type VldBeaPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBeaPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function joinVldBeaPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBeaPd');

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
            $this->addJoinObject($join, 'VldBeaPd');
        }

        return $this;
    }

    /**
     * Use the VldBeaPd relation VldBeaPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBeaPdQuery A secondary query class using the current class as primary query
     */
    public function useVldBeaPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBeaPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBeaPd', '\DataDikdas\Model\VldBeaPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BeasiswaPesertaDidik $beasiswaPesertaDidik Object to remove from the list of results
     *
     * @return BeasiswaPesertaDidikQuery The current query, for fluid interface
     */
    public function prune($beasiswaPesertaDidik = null)
    {
        if ($beasiswaPesertaDidik) {
            $this->addUsingAlias(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $beasiswaPesertaDidik->getBeasiswaPesertaDidikId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
