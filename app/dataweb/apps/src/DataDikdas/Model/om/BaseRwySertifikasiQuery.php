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
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwySertifikasiPeer;
use DataDikdas\Model\RwySertifikasiQuery;
use DataDikdas\Model\VldRwySertifikasi;

/**
 * Base class that represents a query for the 'rwy_sertifikasi' table.
 *
 * 
 *
 * @method RwySertifikasiQuery orderByRiwayatSertifikasiId($order = Criteria::ASC) Order by the riwayat_sertifikasi_id column
 * @method RwySertifikasiQuery orderByKodeLembSert($order = Criteria::ASC) Order by the kode_lemb_sert column
 * @method RwySertifikasiQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RwySertifikasiQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method RwySertifikasiQuery orderByIdJenisSertifikasi($order = Criteria::ASC) Order by the id_jenis_sertifikasi column
 * @method RwySertifikasiQuery orderByTglSert($order = Criteria::ASC) Order by the tgl_sert column
 * @method RwySertifikasiQuery orderByTglExpSert($order = Criteria::ASC) Order by the tgl_exp_sert column
 * @method RwySertifikasiQuery orderByNomorSertifikat($order = Criteria::ASC) Order by the nomor_sertifikat column
 * @method RwySertifikasiQuery orderByNomerRegistrasi($order = Criteria::ASC) Order by the nomer_registrasi column
 * @method RwySertifikasiQuery orderByNomorPeserta($order = Criteria::ASC) Order by the nomor_peserta column
 * @method RwySertifikasiQuery orderByKualifikasi($order = Criteria::ASC) Order by the kualifikasi column
 * @method RwySertifikasiQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method RwySertifikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RwySertifikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RwySertifikasiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RwySertifikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RwySertifikasiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RwySertifikasiQuery groupByRiwayatSertifikasiId() Group by the riwayat_sertifikasi_id column
 * @method RwySertifikasiQuery groupByKodeLembSert() Group by the kode_lemb_sert column
 * @method RwySertifikasiQuery groupByPtkId() Group by the ptk_id column
 * @method RwySertifikasiQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method RwySertifikasiQuery groupByIdJenisSertifikasi() Group by the id_jenis_sertifikasi column
 * @method RwySertifikasiQuery groupByTglSert() Group by the tgl_sert column
 * @method RwySertifikasiQuery groupByTglExpSert() Group by the tgl_exp_sert column
 * @method RwySertifikasiQuery groupByNomorSertifikat() Group by the nomor_sertifikat column
 * @method RwySertifikasiQuery groupByNomerRegistrasi() Group by the nomer_registrasi column
 * @method RwySertifikasiQuery groupByNomorPeserta() Group by the nomor_peserta column
 * @method RwySertifikasiQuery groupByKualifikasi() Group by the kualifikasi column
 * @method RwySertifikasiQuery groupByAsalData() Group by the asal_data column
 * @method RwySertifikasiQuery groupByCreateDate() Group by the create_date column
 * @method RwySertifikasiQuery groupByLastUpdate() Group by the last_update column
 * @method RwySertifikasiQuery groupBySoftDelete() Group by the soft_delete column
 * @method RwySertifikasiQuery groupByLastSync() Group by the last_sync column
 * @method RwySertifikasiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RwySertifikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RwySertifikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RwySertifikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RwySertifikasiQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method RwySertifikasiQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method RwySertifikasiQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method RwySertifikasiQuery leftJoinJenisSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSertifikasi relation
 * @method RwySertifikasiQuery rightJoinJenisSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSertifikasi relation
 * @method RwySertifikasiQuery innerJoinJenisSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSertifikasi relation
 *
 * @method RwySertifikasiQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RwySertifikasiQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RwySertifikasiQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RwySertifikasiQuery leftJoinLembSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembSertifikasi relation
 * @method RwySertifikasiQuery rightJoinLembSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembSertifikasi relation
 * @method RwySertifikasiQuery innerJoinLembSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembSertifikasi relation
 *
 * @method RwySertifikasiQuery leftJoinVldRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwySertifikasi relation
 * @method RwySertifikasiQuery rightJoinVldRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwySertifikasi relation
 * @method RwySertifikasiQuery innerJoinVldRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwySertifikasi relation
 *
 * @method RwySertifikasi findOne(PropelPDO $con = null) Return the first RwySertifikasi matching the query
 * @method RwySertifikasi findOneOrCreate(PropelPDO $con = null) Return the first RwySertifikasi matching the query, or a new RwySertifikasi object populated from the query conditions when no match is found
 *
 * @method RwySertifikasi findOneByKodeLembSert(string $kode_lemb_sert) Return the first RwySertifikasi filtered by the kode_lemb_sert column
 * @method RwySertifikasi findOneByPtkId(string $ptk_id) Return the first RwySertifikasi filtered by the ptk_id column
 * @method RwySertifikasi findOneByBidangStudiId(int $bidang_studi_id) Return the first RwySertifikasi filtered by the bidang_studi_id column
 * @method RwySertifikasi findOneByIdJenisSertifikasi(string $id_jenis_sertifikasi) Return the first RwySertifikasi filtered by the id_jenis_sertifikasi column
 * @method RwySertifikasi findOneByTglSert(string $tgl_sert) Return the first RwySertifikasi filtered by the tgl_sert column
 * @method RwySertifikasi findOneByTglExpSert(string $tgl_exp_sert) Return the first RwySertifikasi filtered by the tgl_exp_sert column
 * @method RwySertifikasi findOneByNomorSertifikat(string $nomor_sertifikat) Return the first RwySertifikasi filtered by the nomor_sertifikat column
 * @method RwySertifikasi findOneByNomerRegistrasi(string $nomer_registrasi) Return the first RwySertifikasi filtered by the nomer_registrasi column
 * @method RwySertifikasi findOneByNomorPeserta(string $nomor_peserta) Return the first RwySertifikasi filtered by the nomor_peserta column
 * @method RwySertifikasi findOneByKualifikasi(string $kualifikasi) Return the first RwySertifikasi filtered by the kualifikasi column
 * @method RwySertifikasi findOneByAsalData(string $asal_data) Return the first RwySertifikasi filtered by the asal_data column
 * @method RwySertifikasi findOneByCreateDate(string $create_date) Return the first RwySertifikasi filtered by the create_date column
 * @method RwySertifikasi findOneByLastUpdate(string $last_update) Return the first RwySertifikasi filtered by the last_update column
 * @method RwySertifikasi findOneBySoftDelete(string $soft_delete) Return the first RwySertifikasi filtered by the soft_delete column
 * @method RwySertifikasi findOneByLastSync(string $last_sync) Return the first RwySertifikasi filtered by the last_sync column
 * @method RwySertifikasi findOneByUpdaterId(string $updater_id) Return the first RwySertifikasi filtered by the updater_id column
 *
 * @method array findByRiwayatSertifikasiId(string $riwayat_sertifikasi_id) Return RwySertifikasi objects filtered by the riwayat_sertifikasi_id column
 * @method array findByKodeLembSert(string $kode_lemb_sert) Return RwySertifikasi objects filtered by the kode_lemb_sert column
 * @method array findByPtkId(string $ptk_id) Return RwySertifikasi objects filtered by the ptk_id column
 * @method array findByBidangStudiId(int $bidang_studi_id) Return RwySertifikasi objects filtered by the bidang_studi_id column
 * @method array findByIdJenisSertifikasi(string $id_jenis_sertifikasi) Return RwySertifikasi objects filtered by the id_jenis_sertifikasi column
 * @method array findByTglSert(string $tgl_sert) Return RwySertifikasi objects filtered by the tgl_sert column
 * @method array findByTglExpSert(string $tgl_exp_sert) Return RwySertifikasi objects filtered by the tgl_exp_sert column
 * @method array findByNomorSertifikat(string $nomor_sertifikat) Return RwySertifikasi objects filtered by the nomor_sertifikat column
 * @method array findByNomerRegistrasi(string $nomer_registrasi) Return RwySertifikasi objects filtered by the nomer_registrasi column
 * @method array findByNomorPeserta(string $nomor_peserta) Return RwySertifikasi objects filtered by the nomor_peserta column
 * @method array findByKualifikasi(string $kualifikasi) Return RwySertifikasi objects filtered by the kualifikasi column
 * @method array findByAsalData(string $asal_data) Return RwySertifikasi objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return RwySertifikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RwySertifikasi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RwySertifikasi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RwySertifikasi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RwySertifikasi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwySertifikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRwySertifikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RwySertifikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RwySertifikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RwySertifikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RwySertifikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RwySertifikasiQuery) {
            return $criteria;
        }
        $query = new RwySertifikasiQuery();
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
     * @return   RwySertifikasi|RwySertifikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RwySertifikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RwySertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwySertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRiwayatSertifikasiId($key, $con = null)
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
     * @return                 RwySertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "riwayat_sertifikasi_id", "kode_lemb_sert", "ptk_id", "bidang_studi_id", "id_jenis_sertifikasi", "tgl_sert", "tgl_exp_sert", "nomor_sertifikat", "nomer_registrasi", "nomor_peserta", "kualifikasi", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rwy_sertifikasi" WHERE "riwayat_sertifikasi_id" = :p0';
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
            $obj = new RwySertifikasi();
            $obj->hydrate($row);
            RwySertifikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RwySertifikasi|RwySertifikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RwySertifikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the riwayat_sertifikasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatSertifikasiId('fooValue');   // WHERE riwayat_sertifikasi_id = 'fooValue'
     * $query->filterByRiwayatSertifikasiId('%fooValue%'); // WHERE riwayat_sertifikasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatSertifikasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByRiwayatSertifikasiId($riwayatSertifikasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatSertifikasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatSertifikasiId)) {
                $riwayatSertifikasiId = str_replace('*', '%', $riwayatSertifikasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $riwayatSertifikasiId, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByKodeLembSert($kodeLembSert = null, $comparison = null)
    {
        if (is_array($kodeLembSert)) {
            $useMinMax = false;
            if (isset($kodeLembSert['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLembSert['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwySertifikasiPeer::PTK_ID, $ptkId, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByIdJenisSertifikasi($idJenisSertifikasi = null, $comparison = null)
    {
        if (is_array($idJenisSertifikasi)) {
            $useMinMax = false;
            if (isset($idJenisSertifikasi['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJenisSertifikasi['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, $idJenisSertifikasi, $comparison);
    }

    /**
     * Filter the query on the tgl_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSert('2011-03-14'); // WHERE tgl_sert = '2011-03-14'
     * $query->filterByTglSert('now'); // WHERE tgl_sert = '2011-03-14'
     * $query->filterByTglSert(array('max' => 'yesterday')); // WHERE tgl_sert > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSert The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByTglSert($tglSert = null, $comparison = null)
    {
        if (is_array($tglSert)) {
            $useMinMax = false;
            if (isset($tglSert['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::TGL_SERT, $tglSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSert['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::TGL_SERT, $tglSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::TGL_SERT, $tglSert, $comparison);
    }

    /**
     * Filter the query on the tgl_exp_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByTglExpSert('2011-03-14'); // WHERE tgl_exp_sert = '2011-03-14'
     * $query->filterByTglExpSert('now'); // WHERE tgl_exp_sert = '2011-03-14'
     * $query->filterByTglExpSert(array('max' => 'yesterday')); // WHERE tgl_exp_sert > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglExpSert The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByTglExpSert($tglExpSert = null, $comparison = null)
    {
        if (is_array($tglExpSert)) {
            $useMinMax = false;
            if (isset($tglExpSert['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::TGL_EXP_SERT, $tglExpSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglExpSert['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::TGL_EXP_SERT, $tglExpSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::TGL_EXP_SERT, $tglExpSert, $comparison);
    }

    /**
     * Filter the query on the nomor_sertifikat column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorSertifikat('fooValue');   // WHERE nomor_sertifikat = 'fooValue'
     * $query->filterByNomorSertifikat('%fooValue%'); // WHERE nomor_sertifikat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorSertifikat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByNomorSertifikat($nomorSertifikat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorSertifikat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorSertifikat)) {
                $nomorSertifikat = str_replace('*', '%', $nomorSertifikat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::NOMOR_SERTIFIKAT, $nomorSertifikat, $comparison);
    }

    /**
     * Filter the query on the nomer_registrasi column
     *
     * Example usage:
     * <code>
     * $query->filterByNomerRegistrasi('fooValue');   // WHERE nomer_registrasi = 'fooValue'
     * $query->filterByNomerRegistrasi('%fooValue%'); // WHERE nomer_registrasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomerRegistrasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByNomerRegistrasi($nomerRegistrasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomerRegistrasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomerRegistrasi)) {
                $nomerRegistrasi = str_replace('*', '%', $nomerRegistrasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::NOMER_REGISTRASI, $nomerRegistrasi, $comparison);
    }

    /**
     * Filter the query on the nomor_peserta column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorPeserta('fooValue');   // WHERE nomor_peserta = 'fooValue'
     * $query->filterByNomorPeserta('%fooValue%'); // WHERE nomor_peserta LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorPeserta The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByNomorPeserta($nomorPeserta = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorPeserta)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorPeserta)) {
                $nomorPeserta = str_replace('*', '%', $nomorPeserta);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::NOMOR_PESERTA, $nomorPeserta, $comparison);
    }

    /**
     * Filter the query on the kualifikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKualifikasi('fooValue');   // WHERE kualifikasi = 'fooValue'
     * $query->filterByKualifikasi('%fooValue%'); // WHERE kualifikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kualifikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByKualifikasi($kualifikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kualifikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kualifikasi)) {
                $kualifikasi = str_replace('*', '%', $kualifikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::KUALIFIKASI, $kualifikasi, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwySertifikasiPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RwySertifikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RwySertifikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwySertifikasiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwySertifikasiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwySertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(RwySertifikasiPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwySertifikasiPeer::BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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
     * @return                 RwySertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSertifikasi($jenisSertifikasi, $comparison = null)
    {
        if ($jenisSertifikasi instanceof JenisSertifikasi) {
            return $this
                ->addUsingAlias(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, $jenisSertifikasi->getIdJenisSertifikasi(), $comparison);
        } elseif ($jenisSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwySertifikasiPeer::ID_JENIS_SERTIFIKASI, $jenisSertifikasi->toKeyValue('PrimaryKey', 'IdJenisSertifikasi'), $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwySertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RwySertifikasiPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwySertifikasiPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related LembSertifikasi object
     *
     * @param   LembSertifikasi|PropelObjectCollection $lembSertifikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwySertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembSertifikasi($lembSertifikasi, $comparison = null)
    {
        if ($lembSertifikasi instanceof LembSertifikasi) {
            return $this
                ->addUsingAlias(RwySertifikasiPeer::KODE_LEMB_SERT, $lembSertifikasi->getKodeLembSert(), $comparison);
        } elseif ($lembSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwySertifikasiPeer::KODE_LEMB_SERT, $lembSertifikasi->toKeyValue('PrimaryKey', 'KodeLembSert'), $comparison);
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
     * @return RwySertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related VldRwySertifikasi object
     *
     * @param   VldRwySertifikasi|PropelObjectCollection $vldRwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwySertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwySertifikasi($vldRwySertifikasi, $comparison = null)
    {
        if ($vldRwySertifikasi instanceof VldRwySertifikasi) {
            return $this
                ->addUsingAlias(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $vldRwySertifikasi->getRiwayatSertifikasiId(), $comparison);
        } elseif ($vldRwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useVldRwySertifikasiQuery()
                ->filterByPrimaryKeys($vldRwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwySertifikasi() only accepts arguments of type VldRwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function joinVldRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwySertifikasi');

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
            $this->addJoinObject($join, 'VldRwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the VldRwySertifikasi relation VldRwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useVldRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwySertifikasi', '\DataDikdas\Model\VldRwySertifikasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RwySertifikasi $rwySertifikasi Object to remove from the list of results
     *
     * @return RwySertifikasiQuery The current query, for fluid interface
     */
    public function prune($rwySertifikasi = null)
    {
        if ($rwySertifikasi) {
            $this->addUsingAlias(RwySertifikasiPeer::RIWAYAT_SERTIFIKASI_ID, $rwySertifikasi->getRiwayatSertifikasiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
