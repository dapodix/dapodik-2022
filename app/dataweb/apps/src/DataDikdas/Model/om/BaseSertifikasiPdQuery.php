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
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\JenisSertifikasi;
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\SertifikasiPdPeer;
use DataDikdas\Model\SertifikasiPdQuery;

/**
 * Base class that represents a query for the 'sertifikasi_pd' table.
 *
 * 
 *
 * @method SertifikasiPdQuery orderByIdSertPd($order = Criteria::ASC) Order by the id_sert_pd column
 * @method SertifikasiPdQuery orderByIdJenisSertifikasi($order = Criteria::ASC) Order by the id_jenis_sertifikasi column
 * @method SertifikasiPdQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method SertifikasiPdQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method SertifikasiPdQuery orderByNoSertPd($order = Criteria::ASC) Order by the no_sert_pd column
 * @method SertifikasiPdQuery orderByTglSertPd($order = Criteria::ASC) Order by the tgl_sert_pd column
 * @method SertifikasiPdQuery orderByTglExpSertPd($order = Criteria::ASC) Order by the tgl_exp_sert_pd column
 * @method SertifikasiPdQuery orderByNoPesertaSertPd($order = Criteria::ASC) Order by the no_peserta_sert_pd column
 * @method SertifikasiPdQuery orderByKodeLembSert($order = Criteria::ASC) Order by the kode_lemb_sert column
 * @method SertifikasiPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SertifikasiPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SertifikasiPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method SertifikasiPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method SertifikasiPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method SertifikasiPdQuery groupByIdSertPd() Group by the id_sert_pd column
 * @method SertifikasiPdQuery groupByIdJenisSertifikasi() Group by the id_jenis_sertifikasi column
 * @method SertifikasiPdQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method SertifikasiPdQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method SertifikasiPdQuery groupByNoSertPd() Group by the no_sert_pd column
 * @method SertifikasiPdQuery groupByTglSertPd() Group by the tgl_sert_pd column
 * @method SertifikasiPdQuery groupByTglExpSertPd() Group by the tgl_exp_sert_pd column
 * @method SertifikasiPdQuery groupByNoPesertaSertPd() Group by the no_peserta_sert_pd column
 * @method SertifikasiPdQuery groupByKodeLembSert() Group by the kode_lemb_sert column
 * @method SertifikasiPdQuery groupByCreateDate() Group by the create_date column
 * @method SertifikasiPdQuery groupByLastUpdate() Group by the last_update column
 * @method SertifikasiPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method SertifikasiPdQuery groupByLastSync() Group by the last_sync column
 * @method SertifikasiPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method SertifikasiPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SertifikasiPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SertifikasiPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SertifikasiPdQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method SertifikasiPdQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method SertifikasiPdQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method SertifikasiPdQuery leftJoinJenisSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSertifikasi relation
 * @method SertifikasiPdQuery rightJoinJenisSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSertifikasi relation
 * @method SertifikasiPdQuery innerJoinJenisSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSertifikasi relation
 *
 * @method SertifikasiPdQuery leftJoinLembSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembSertifikasi relation
 * @method SertifikasiPdQuery rightJoinLembSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembSertifikasi relation
 * @method SertifikasiPdQuery innerJoinLembSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembSertifikasi relation
 *
 * @method SertifikasiPdQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method SertifikasiPdQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method SertifikasiPdQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method SertifikasiPd findOne(PropelPDO $con = null) Return the first SertifikasiPd matching the query
 * @method SertifikasiPd findOneOrCreate(PropelPDO $con = null) Return the first SertifikasiPd matching the query, or a new SertifikasiPd object populated from the query conditions when no match is found
 *
 * @method SertifikasiPd findOneByIdJenisSertifikasi(string $id_jenis_sertifikasi) Return the first SertifikasiPd filtered by the id_jenis_sertifikasi column
 * @method SertifikasiPd findOneByPesertaDidikId(string $peserta_didik_id) Return the first SertifikasiPd filtered by the peserta_didik_id column
 * @method SertifikasiPd findOneByBidangStudiId(int $bidang_studi_id) Return the first SertifikasiPd filtered by the bidang_studi_id column
 * @method SertifikasiPd findOneByNoSertPd(string $no_sert_pd) Return the first SertifikasiPd filtered by the no_sert_pd column
 * @method SertifikasiPd findOneByTglSertPd(string $tgl_sert_pd) Return the first SertifikasiPd filtered by the tgl_sert_pd column
 * @method SertifikasiPd findOneByTglExpSertPd(string $tgl_exp_sert_pd) Return the first SertifikasiPd filtered by the tgl_exp_sert_pd column
 * @method SertifikasiPd findOneByNoPesertaSertPd(string $no_peserta_sert_pd) Return the first SertifikasiPd filtered by the no_peserta_sert_pd column
 * @method SertifikasiPd findOneByKodeLembSert(string $kode_lemb_sert) Return the first SertifikasiPd filtered by the kode_lemb_sert column
 * @method SertifikasiPd findOneByCreateDate(string $create_date) Return the first SertifikasiPd filtered by the create_date column
 * @method SertifikasiPd findOneByLastUpdate(string $last_update) Return the first SertifikasiPd filtered by the last_update column
 * @method SertifikasiPd findOneBySoftDelete(string $soft_delete) Return the first SertifikasiPd filtered by the soft_delete column
 * @method SertifikasiPd findOneByLastSync(string $last_sync) Return the first SertifikasiPd filtered by the last_sync column
 * @method SertifikasiPd findOneByUpdaterId(string $updater_id) Return the first SertifikasiPd filtered by the updater_id column
 *
 * @method array findByIdSertPd(string $id_sert_pd) Return SertifikasiPd objects filtered by the id_sert_pd column
 * @method array findByIdJenisSertifikasi(string $id_jenis_sertifikasi) Return SertifikasiPd objects filtered by the id_jenis_sertifikasi column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return SertifikasiPd objects filtered by the peserta_didik_id column
 * @method array findByBidangStudiId(int $bidang_studi_id) Return SertifikasiPd objects filtered by the bidang_studi_id column
 * @method array findByNoSertPd(string $no_sert_pd) Return SertifikasiPd objects filtered by the no_sert_pd column
 * @method array findByTglSertPd(string $tgl_sert_pd) Return SertifikasiPd objects filtered by the tgl_sert_pd column
 * @method array findByTglExpSertPd(string $tgl_exp_sert_pd) Return SertifikasiPd objects filtered by the tgl_exp_sert_pd column
 * @method array findByNoPesertaSertPd(string $no_peserta_sert_pd) Return SertifikasiPd objects filtered by the no_peserta_sert_pd column
 * @method array findByKodeLembSert(string $kode_lemb_sert) Return SertifikasiPd objects filtered by the kode_lemb_sert column
 * @method array findByCreateDate(string $create_date) Return SertifikasiPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return SertifikasiPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return SertifikasiPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return SertifikasiPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return SertifikasiPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSertifikasiPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSertifikasiPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SertifikasiPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SertifikasiPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SertifikasiPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SertifikasiPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SertifikasiPdQuery) {
            return $criteria;
        }
        $query = new SertifikasiPdQuery();
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
     * @return   SertifikasiPd|SertifikasiPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SertifikasiPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SertifikasiPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SertifikasiPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdSertPd($key, $con = null)
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
     * @return                 SertifikasiPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_sert_pd", "id_jenis_sertifikasi", "peserta_didik_id", "bidang_studi_id", "no_sert_pd", "tgl_sert_pd", "tgl_exp_sert_pd", "no_peserta_sert_pd", "kode_lemb_sert", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "sertifikasi_pd" WHERE "id_sert_pd" = :p0';
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
            $obj = new SertifikasiPd();
            $obj->hydrate($row);
            SertifikasiPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SertifikasiPd|SertifikasiPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SertifikasiPd[]|mixed the list of results, formatted by the current formatter
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
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SertifikasiPdPeer::ID_SERT_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SertifikasiPdPeer::ID_SERT_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_sert_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSertPd('fooValue');   // WHERE id_sert_pd = 'fooValue'
     * $query->filterByIdSertPd('%fooValue%'); // WHERE id_sert_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idSertPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByIdSertPd($idSertPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idSertPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idSertPd)) {
                $idSertPd = str_replace('*', '%', $idSertPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::ID_SERT_PD, $idSertPd, $comparison);
    }

    /**
     * Filter the query on the id_jenis_sertifikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJenisSertifikasi(1234); // WHERE id_jenis_sertifikasi = 1234
     * $query->filterByIdJenisSertifikasi(array(12, 34)); // WHERE id_jenis_sertifikasi IN (12, 34)
     * $query->filterByIdJenisSertifikasi(array('min' => 12)); // WHERE id_jenis_sertifikasi >= 12
     * $query->filterByIdJenisSertifikasi(array('max' => 12)); // WHERE id_jenis_sertifikasi <= 12
     * </code>
     *
     * @see       filterByJenisSertifikasi()
     *
     * @param     mixed $idJenisSertifikasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByIdJenisSertifikasi($idJenisSertifikasi = null, $comparison = null)
    {
        if (is_array($idJenisSertifikasi)) {
            $useMinMax = false;
            if (isset($idJenisSertifikasi['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJenisSertifikasi['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SertifikasiPdPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the bidang_studi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangStudiId(1234); // WHERE bidang_studi_id = 1234
     * $query->filterByBidangStudiId(array(12, 34)); // WHERE bidang_studi_id IN (12, 34)
     * $query->filterByBidangStudiId(array('min' => 12)); // WHERE bidang_studi_id >= 12
     * $query->filterByBidangStudiId(array('max' => 12)); // WHERE bidang_studi_id <= 12
     * </code>
     *
     * @see       filterByBidangStudi()
     *
     * @param     mixed $bidangStudiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
    }

    /**
     * Filter the query on the no_sert_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSertPd('fooValue');   // WHERE no_sert_pd = 'fooValue'
     * $query->filterByNoSertPd('%fooValue%'); // WHERE no_sert_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSertPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByNoSertPd($noSertPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSertPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSertPd)) {
                $noSertPd = str_replace('*', '%', $noSertPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::NO_SERT_PD, $noSertPd, $comparison);
    }

    /**
     * Filter the query on the tgl_sert_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSertPd('2011-03-14'); // WHERE tgl_sert_pd = '2011-03-14'
     * $query->filterByTglSertPd('now'); // WHERE tgl_sert_pd = '2011-03-14'
     * $query->filterByTglSertPd(array('max' => 'yesterday')); // WHERE tgl_sert_pd > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSertPd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByTglSertPd($tglSertPd = null, $comparison = null)
    {
        if (is_array($tglSertPd)) {
            $useMinMax = false;
            if (isset($tglSertPd['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::TGL_SERT_PD, $tglSertPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSertPd['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::TGL_SERT_PD, $tglSertPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::TGL_SERT_PD, $tglSertPd, $comparison);
    }

    /**
     * Filter the query on the tgl_exp_sert_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByTglExpSertPd('2011-03-14'); // WHERE tgl_exp_sert_pd = '2011-03-14'
     * $query->filterByTglExpSertPd('now'); // WHERE tgl_exp_sert_pd = '2011-03-14'
     * $query->filterByTglExpSertPd(array('max' => 'yesterday')); // WHERE tgl_exp_sert_pd > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglExpSertPd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByTglExpSertPd($tglExpSertPd = null, $comparison = null)
    {
        if (is_array($tglExpSertPd)) {
            $useMinMax = false;
            if (isset($tglExpSertPd['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::TGL_EXP_SERT_PD, $tglExpSertPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglExpSertPd['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::TGL_EXP_SERT_PD, $tglExpSertPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::TGL_EXP_SERT_PD, $tglExpSertPd, $comparison);
    }

    /**
     * Filter the query on the no_peserta_sert_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPesertaSertPd('fooValue');   // WHERE no_peserta_sert_pd = 'fooValue'
     * $query->filterByNoPesertaSertPd('%fooValue%'); // WHERE no_peserta_sert_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPesertaSertPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByNoPesertaSertPd($noPesertaSertPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPesertaSertPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPesertaSertPd)) {
                $noPesertaSertPd = str_replace('*', '%', $noPesertaSertPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::NO_PESERTA_SERT_PD, $noPesertaSertPd, $comparison);
    }

    /**
     * Filter the query on the kode_lemb_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeLembSert(1234); // WHERE kode_lemb_sert = 1234
     * $query->filterByKodeLembSert(array(12, 34)); // WHERE kode_lemb_sert IN (12, 34)
     * $query->filterByKodeLembSert(array('min' => 12)); // WHERE kode_lemb_sert >= 12
     * $query->filterByKodeLembSert(array('max' => 12)); // WHERE kode_lemb_sert <= 12
     * </code>
     *
     * @see       filterByLembSertifikasi()
     *
     * @param     mixed $kodeLembSert The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByKodeLembSert($kodeLembSert = null, $comparison = null)
    {
        if (is_array($kodeLembSert)) {
            $useMinMax = false;
            if (isset($kodeLembSert['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::KODE_LEMB_SERT, $kodeLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLembSert['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::KODE_LEMB_SERT, $kodeLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::KODE_LEMB_SERT, $kodeLembSert, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SertifikasiPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SertifikasiPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SertifikasiPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SertifikasiPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SertifikasiPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(SertifikasiPdPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SertifikasiPdPeer::BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
        } else {
            throw new PropelException('filterByBidangStudi() only accepts arguments of type BidangStudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangStudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function joinBidangStudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangStudi');

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
            $this->addJoinObject($join, 'BidangStudi');
        }

        return $this;
    }

    /**
     * Use the BidangStudi relation BidangStudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangStudiQuery A secondary query class using the current class as primary query
     */
    public function useBidangStudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBidangStudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudi', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Filter the query by a related JenisSertifikasi object
     *
     * @param   JenisSertifikasi|PropelObjectCollection $jenisSertifikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SertifikasiPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSertifikasi($jenisSertifikasi, $comparison = null)
    {
        if ($jenisSertifikasi instanceof JenisSertifikasi) {
            return $this
                ->addUsingAlias(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, $jenisSertifikasi->getIdJenisSertifikasi(), $comparison);
        } elseif ($jenisSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SertifikasiPdPeer::ID_JENIS_SERTIFIKASI, $jenisSertifikasi->toKeyValue('PrimaryKey', 'IdJenisSertifikasi'), $comparison);
        } else {
            throw new PropelException('filterByJenisSertifikasi() only accepts arguments of type JenisSertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisSertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function joinJenisSertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisSertifikasi');

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
            $this->addJoinObject($join, 'JenisSertifikasi');
        }

        return $this;
    }

    /**
     * Use the JenisSertifikasi relation JenisSertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisSertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useJenisSertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisSertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisSertifikasi', '\DataDikdas\Model\JenisSertifikasiQuery');
    }

    /**
     * Filter the query by a related LembSertifikasi object
     *
     * @param   LembSertifikasi|PropelObjectCollection $lembSertifikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SertifikasiPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembSertifikasi($lembSertifikasi, $comparison = null)
    {
        if ($lembSertifikasi instanceof LembSertifikasi) {
            return $this
                ->addUsingAlias(SertifikasiPdPeer::KODE_LEMB_SERT, $lembSertifikasi->getKodeLembSert(), $comparison);
        } elseif ($lembSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SertifikasiPdPeer::KODE_LEMB_SERT, $lembSertifikasi->toKeyValue('PrimaryKey', 'KodeLembSert'), $comparison);
        } else {
            throw new PropelException('filterByLembSertifikasi() only accepts arguments of type LembSertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembSertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function joinLembSertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembSertifikasi');

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
            $this->addJoinObject($join, 'LembSertifikasi');
        }

        return $this;
    }

    /**
     * Use the LembSertifikasi relation LembSertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembSertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useLembSertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembSertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembSertifikasi', '\DataDikdas\Model\LembSertifikasiQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SertifikasiPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(SertifikasiPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SertifikasiPdPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return SertifikasiPdQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   SertifikasiPd $sertifikasiPd Object to remove from the list of results
     *
     * @return SertifikasiPdQuery The current query, for fluid interface
     */
    public function prune($sertifikasiPd = null)
    {
        if ($sertifikasiPd) {
            $this->addUsingAlias(SertifikasiPdPeer::ID_SERT_PD, $sertifikasiPd->getIdSertPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
