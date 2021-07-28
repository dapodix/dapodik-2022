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
use DataDikdas\Model\BidangSdm;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BidangStudiPeer;
use DataDikdas\Model\BidangStudiQuery;
use DataDikdas\Model\MapBidangMataPelajaran;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\SertifikasiPd;

/**
 * Base class that represents a query for the 'ref.bidang_studi' table.
 *
 * 
 *
 * @method BidangStudiQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method BidangStudiQuery orderByKelompokBidangStudiId($order = Criteria::ASC) Order by the kelompok_bidang_studi_id column
 * @method BidangStudiQuery orderByKode($order = Criteria::ASC) Order by the kode column
 * @method BidangStudiQuery orderByBidangStudi($order = Criteria::ASC) Order by the bidang_studi column
 * @method BidangStudiQuery orderByKelompok($order = Criteria::ASC) Order by the kelompok column
 * @method BidangStudiQuery orderByJenjangPaud($order = Criteria::ASC) Order by the jenjang_paud column
 * @method BidangStudiQuery orderByJenjangTk($order = Criteria::ASC) Order by the jenjang_tk column
 * @method BidangStudiQuery orderByJenjangSd($order = Criteria::ASC) Order by the jenjang_sd column
 * @method BidangStudiQuery orderByJenjangSmp($order = Criteria::ASC) Order by the jenjang_smp column
 * @method BidangStudiQuery orderByJenjangSma($order = Criteria::ASC) Order by the jenjang_sma column
 * @method BidangStudiQuery orderByJenjangTinggi($order = Criteria::ASC) Order by the jenjang_tinggi column
 * @method BidangStudiQuery orderByASertKomp($order = Criteria::ASC) Order by the a_sert_komp column
 * @method BidangStudiQuery orderByASertProfesi($order = Criteria::ASC) Order by the a_sert_profesi column
 * @method BidangStudiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BidangStudiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BidangStudiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method BidangStudiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method BidangStudiQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method BidangStudiQuery groupByKelompokBidangStudiId() Group by the kelompok_bidang_studi_id column
 * @method BidangStudiQuery groupByKode() Group by the kode column
 * @method BidangStudiQuery groupByBidangStudi() Group by the bidang_studi column
 * @method BidangStudiQuery groupByKelompok() Group by the kelompok column
 * @method BidangStudiQuery groupByJenjangPaud() Group by the jenjang_paud column
 * @method BidangStudiQuery groupByJenjangTk() Group by the jenjang_tk column
 * @method BidangStudiQuery groupByJenjangSd() Group by the jenjang_sd column
 * @method BidangStudiQuery groupByJenjangSmp() Group by the jenjang_smp column
 * @method BidangStudiQuery groupByJenjangSma() Group by the jenjang_sma column
 * @method BidangStudiQuery groupByJenjangTinggi() Group by the jenjang_tinggi column
 * @method BidangStudiQuery groupByASertKomp() Group by the a_sert_komp column
 * @method BidangStudiQuery groupByASertProfesi() Group by the a_sert_profesi column
 * @method BidangStudiQuery groupByCreateDate() Group by the create_date column
 * @method BidangStudiQuery groupByLastUpdate() Group by the last_update column
 * @method BidangStudiQuery groupByExpiredDate() Group by the expired_date column
 * @method BidangStudiQuery groupByLastSync() Group by the last_sync column
 *
 * @method BidangStudiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BidangStudiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BidangStudiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BidangStudiQuery leftJoinBidangStudiRelatedByKelompokBidangStudiId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudiRelatedByKelompokBidangStudiId relation
 * @method BidangStudiQuery rightJoinBidangStudiRelatedByKelompokBidangStudiId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudiRelatedByKelompokBidangStudiId relation
 * @method BidangStudiQuery innerJoinBidangStudiRelatedByKelompokBidangStudiId($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudiRelatedByKelompokBidangStudiId relation
 *
 * @method BidangStudiQuery leftJoinBidangSdm($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangSdm relation
 * @method BidangStudiQuery rightJoinBidangSdm($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangSdm relation
 * @method BidangStudiQuery innerJoinBidangSdm($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangSdm relation
 *
 * @method BidangStudiQuery leftJoinBidangStudiRelatedByBidangStudiId($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudiRelatedByBidangStudiId relation
 * @method BidangStudiQuery rightJoinBidangStudiRelatedByBidangStudiId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudiRelatedByBidangStudiId relation
 * @method BidangStudiQuery innerJoinBidangStudiRelatedByBidangStudiId($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudiRelatedByBidangStudiId relation
 *
 * @method BidangStudiQuery leftJoinMapBidangMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MapBidangMataPelajaran relation
 * @method BidangStudiQuery rightJoinMapBidangMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MapBidangMataPelajaran relation
 * @method BidangStudiQuery innerJoinMapBidangMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MapBidangMataPelajaran relation
 *
 * @method BidangStudiQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method BidangStudiQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method BidangStudiQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method BidangStudiQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BidangStudiQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BidangStudiQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BidangStudiQuery leftJoinRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyPendFormal relation
 * @method BidangStudiQuery rightJoinRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyPendFormal relation
 * @method BidangStudiQuery innerJoinRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyPendFormal relation
 *
 * @method BidangStudiQuery leftJoinRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwySertifikasi relation
 * @method BidangStudiQuery rightJoinRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwySertifikasi relation
 * @method BidangStudiQuery innerJoinRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the RwySertifikasi relation
 *
 * @method BidangStudiQuery leftJoinSertifikasiPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the SertifikasiPd relation
 * @method BidangStudiQuery rightJoinSertifikasiPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SertifikasiPd relation
 * @method BidangStudiQuery innerJoinSertifikasiPd($relationAlias = null) Adds a INNER JOIN clause to the query using the SertifikasiPd relation
 *
 * @method BidangStudi findOne(PropelPDO $con = null) Return the first BidangStudi matching the query
 * @method BidangStudi findOneOrCreate(PropelPDO $con = null) Return the first BidangStudi matching the query, or a new BidangStudi object populated from the query conditions when no match is found
 *
 * @method BidangStudi findOneByKelompokBidangStudiId(int $kelompok_bidang_studi_id) Return the first BidangStudi filtered by the kelompok_bidang_studi_id column
 * @method BidangStudi findOneByKode(string $kode) Return the first BidangStudi filtered by the kode column
 * @method BidangStudi findOneByBidangStudi(string $bidang_studi) Return the first BidangStudi filtered by the bidang_studi column
 * @method BidangStudi findOneByKelompok(string $kelompok) Return the first BidangStudi filtered by the kelompok column
 * @method BidangStudi findOneByJenjangPaud(string $jenjang_paud) Return the first BidangStudi filtered by the jenjang_paud column
 * @method BidangStudi findOneByJenjangTk(string $jenjang_tk) Return the first BidangStudi filtered by the jenjang_tk column
 * @method BidangStudi findOneByJenjangSd(string $jenjang_sd) Return the first BidangStudi filtered by the jenjang_sd column
 * @method BidangStudi findOneByJenjangSmp(string $jenjang_smp) Return the first BidangStudi filtered by the jenjang_smp column
 * @method BidangStudi findOneByJenjangSma(string $jenjang_sma) Return the first BidangStudi filtered by the jenjang_sma column
 * @method BidangStudi findOneByJenjangTinggi(string $jenjang_tinggi) Return the first BidangStudi filtered by the jenjang_tinggi column
 * @method BidangStudi findOneByASertKomp(string $a_sert_komp) Return the first BidangStudi filtered by the a_sert_komp column
 * @method BidangStudi findOneByASertProfesi(string $a_sert_profesi) Return the first BidangStudi filtered by the a_sert_profesi column
 * @method BidangStudi findOneByCreateDate(string $create_date) Return the first BidangStudi filtered by the create_date column
 * @method BidangStudi findOneByLastUpdate(string $last_update) Return the first BidangStudi filtered by the last_update column
 * @method BidangStudi findOneByExpiredDate(string $expired_date) Return the first BidangStudi filtered by the expired_date column
 * @method BidangStudi findOneByLastSync(string $last_sync) Return the first BidangStudi filtered by the last_sync column
 *
 * @method array findByBidangStudiId(int $bidang_studi_id) Return BidangStudi objects filtered by the bidang_studi_id column
 * @method array findByKelompokBidangStudiId(int $kelompok_bidang_studi_id) Return BidangStudi objects filtered by the kelompok_bidang_studi_id column
 * @method array findByKode(string $kode) Return BidangStudi objects filtered by the kode column
 * @method array findByBidangStudi(string $bidang_studi) Return BidangStudi objects filtered by the bidang_studi column
 * @method array findByKelompok(string $kelompok) Return BidangStudi objects filtered by the kelompok column
 * @method array findByJenjangPaud(string $jenjang_paud) Return BidangStudi objects filtered by the jenjang_paud column
 * @method array findByJenjangTk(string $jenjang_tk) Return BidangStudi objects filtered by the jenjang_tk column
 * @method array findByJenjangSd(string $jenjang_sd) Return BidangStudi objects filtered by the jenjang_sd column
 * @method array findByJenjangSmp(string $jenjang_smp) Return BidangStudi objects filtered by the jenjang_smp column
 * @method array findByJenjangSma(string $jenjang_sma) Return BidangStudi objects filtered by the jenjang_sma column
 * @method array findByJenjangTinggi(string $jenjang_tinggi) Return BidangStudi objects filtered by the jenjang_tinggi column
 * @method array findByASertKomp(string $a_sert_komp) Return BidangStudi objects filtered by the a_sert_komp column
 * @method array findByASertProfesi(string $a_sert_profesi) Return BidangStudi objects filtered by the a_sert_profesi column
 * @method array findByCreateDate(string $create_date) Return BidangStudi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BidangStudi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return BidangStudi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return BidangStudi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBidangStudiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBidangStudiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BidangStudi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BidangStudiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BidangStudiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BidangStudiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BidangStudiQuery) {
            return $criteria;
        }
        $query = new BidangStudiQuery();
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
     * @return   BidangStudi|BidangStudi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BidangStudiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BidangStudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BidangStudi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBidangStudiId($key, $con = null)
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
     * @return                 BidangStudi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "bidang_studi_id", "kelompok_bidang_studi_id", "kode", "bidang_studi", "kelompok", "jenjang_paud", "jenjang_tk", "jenjang_sd", "jenjang_smp", "jenjang_sma", "jenjang_tinggi", "a_sert_komp", "a_sert_profesi", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."bidang_studi" WHERE "bidang_studi_id" = :p0';
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
            $obj = new BidangStudi();
            $obj->hydrate($row);
            BidangStudiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BidangStudi|BidangStudi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BidangStudi[]|mixed the list of results, formatted by the current formatter
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $keys, Criteria::IN);
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
     * @param     mixed $bidangStudiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
    }

    /**
     * Filter the query on the kelompok_bidang_studi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKelompokBidangStudiId(1234); // WHERE kelompok_bidang_studi_id = 1234
     * $query->filterByKelompokBidangStudiId(array(12, 34)); // WHERE kelompok_bidang_studi_id IN (12, 34)
     * $query->filterByKelompokBidangStudiId(array('min' => 12)); // WHERE kelompok_bidang_studi_id >= 12
     * $query->filterByKelompokBidangStudiId(array('max' => 12)); // WHERE kelompok_bidang_studi_id <= 12
     * </code>
     *
     * @see       filterByBidangStudiRelatedByKelompokBidangStudiId()
     *
     * @param     mixed $kelompokBidangStudiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByKelompokBidangStudiId($kelompokBidangStudiId = null, $comparison = null)
    {
        if (is_array($kelompokBidangStudiId)) {
            $useMinMax = false;
            if (isset($kelompokBidangStudiId['min'])) {
                $this->addUsingAlias(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $kelompokBidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kelompokBidangStudiId['max'])) {
                $this->addUsingAlias(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $kelompokBidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $kelompokBidangStudiId, $comparison);
    }

    /**
     * Filter the query on the kode column
     *
     * Example usage:
     * <code>
     * $query->filterByKode('fooValue');   // WHERE kode = 'fooValue'
     * $query->filterByKode('%fooValue%'); // WHERE kode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByKode($kode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kode)) {
                $kode = str_replace('*', '%', $kode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::KODE, $kode, $comparison);
    }

    /**
     * Filter the query on the bidang_studi column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangStudi('fooValue');   // WHERE bidang_studi = 'fooValue'
     * $query->filterByBidangStudi('%fooValue%'); // WHERE bidang_studi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bidangStudi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByBidangStudi($bidangStudi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bidangStudi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bidangStudi)) {
                $bidangStudi = str_replace('*', '%', $bidangStudi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI, $bidangStudi, $comparison);
    }

    /**
     * Filter the query on the kelompok column
     *
     * Example usage:
     * <code>
     * $query->filterByKelompok(1234); // WHERE kelompok = 1234
     * $query->filterByKelompok(array(12, 34)); // WHERE kelompok IN (12, 34)
     * $query->filterByKelompok(array('min' => 12)); // WHERE kelompok >= 12
     * $query->filterByKelompok(array('max' => 12)); // WHERE kelompok <= 12
     * </code>
     *
     * @param     mixed $kelompok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByKelompok($kelompok = null, $comparison = null)
    {
        if (is_array($kelompok)) {
            $useMinMax = false;
            if (isset($kelompok['min'])) {
                $this->addUsingAlias(BidangStudiPeer::KELOMPOK, $kelompok['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kelompok['max'])) {
                $this->addUsingAlias(BidangStudiPeer::KELOMPOK, $kelompok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::KELOMPOK, $kelompok, $comparison);
    }

    /**
     * Filter the query on the jenjang_paud column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPaud(1234); // WHERE jenjang_paud = 1234
     * $query->filterByJenjangPaud(array(12, 34)); // WHERE jenjang_paud IN (12, 34)
     * $query->filterByJenjangPaud(array('min' => 12)); // WHERE jenjang_paud >= 12
     * $query->filterByJenjangPaud(array('max' => 12)); // WHERE jenjang_paud <= 12
     * </code>
     *
     * @param     mixed $jenjangPaud The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangPaud($jenjangPaud = null, $comparison = null)
    {
        if (is_array($jenjangPaud)) {
            $useMinMax = false;
            if (isset($jenjangPaud['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_PAUD, $jenjangPaud['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPaud['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_PAUD, $jenjangPaud['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_PAUD, $jenjangPaud, $comparison);
    }

    /**
     * Filter the query on the jenjang_tk column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangTk(1234); // WHERE jenjang_tk = 1234
     * $query->filterByJenjangTk(array(12, 34)); // WHERE jenjang_tk IN (12, 34)
     * $query->filterByJenjangTk(array('min' => 12)); // WHERE jenjang_tk >= 12
     * $query->filterByJenjangTk(array('max' => 12)); // WHERE jenjang_tk <= 12
     * </code>
     *
     * @param     mixed $jenjangTk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangTk($jenjangTk = null, $comparison = null)
    {
        if (is_array($jenjangTk)) {
            $useMinMax = false;
            if (isset($jenjangTk['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_TK, $jenjangTk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangTk['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_TK, $jenjangTk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_TK, $jenjangTk, $comparison);
    }

    /**
     * Filter the query on the jenjang_sd column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSd(1234); // WHERE jenjang_sd = 1234
     * $query->filterByJenjangSd(array(12, 34)); // WHERE jenjang_sd IN (12, 34)
     * $query->filterByJenjangSd(array('min' => 12)); // WHERE jenjang_sd >= 12
     * $query->filterByJenjangSd(array('max' => 12)); // WHERE jenjang_sd <= 12
     * </code>
     *
     * @param     mixed $jenjangSd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangSd($jenjangSd = null, $comparison = null)
    {
        if (is_array($jenjangSd)) {
            $useMinMax = false;
            if (isset($jenjangSd['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SD, $jenjangSd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSd['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SD, $jenjangSd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_SD, $jenjangSd, $comparison);
    }

    /**
     * Filter the query on the jenjang_smp column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSmp(1234); // WHERE jenjang_smp = 1234
     * $query->filterByJenjangSmp(array(12, 34)); // WHERE jenjang_smp IN (12, 34)
     * $query->filterByJenjangSmp(array('min' => 12)); // WHERE jenjang_smp >= 12
     * $query->filterByJenjangSmp(array('max' => 12)); // WHERE jenjang_smp <= 12
     * </code>
     *
     * @param     mixed $jenjangSmp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangSmp($jenjangSmp = null, $comparison = null)
    {
        if (is_array($jenjangSmp)) {
            $useMinMax = false;
            if (isset($jenjangSmp['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SMP, $jenjangSmp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSmp['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SMP, $jenjangSmp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_SMP, $jenjangSmp, $comparison);
    }

    /**
     * Filter the query on the jenjang_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangSma(1234); // WHERE jenjang_sma = 1234
     * $query->filterByJenjangSma(array(12, 34)); // WHERE jenjang_sma IN (12, 34)
     * $query->filterByJenjangSma(array('min' => 12)); // WHERE jenjang_sma >= 12
     * $query->filterByJenjangSma(array('max' => 12)); // WHERE jenjang_sma <= 12
     * </code>
     *
     * @param     mixed $jenjangSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangSma($jenjangSma = null, $comparison = null)
    {
        if (is_array($jenjangSma)) {
            $useMinMax = false;
            if (isset($jenjangSma['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SMA, $jenjangSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangSma['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_SMA, $jenjangSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_SMA, $jenjangSma, $comparison);
    }

    /**
     * Filter the query on the jenjang_tinggi column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangTinggi(1234); // WHERE jenjang_tinggi = 1234
     * $query->filterByJenjangTinggi(array(12, 34)); // WHERE jenjang_tinggi IN (12, 34)
     * $query->filterByJenjangTinggi(array('min' => 12)); // WHERE jenjang_tinggi >= 12
     * $query->filterByJenjangTinggi(array('max' => 12)); // WHERE jenjang_tinggi <= 12
     * </code>
     *
     * @param     mixed $jenjangTinggi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByJenjangTinggi($jenjangTinggi = null, $comparison = null)
    {
        if (is_array($jenjangTinggi)) {
            $useMinMax = false;
            if (isset($jenjangTinggi['min'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_TINGGI, $jenjangTinggi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangTinggi['max'])) {
                $this->addUsingAlias(BidangStudiPeer::JENJANG_TINGGI, $jenjangTinggi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::JENJANG_TINGGI, $jenjangTinggi, $comparison);
    }

    /**
     * Filter the query on the a_sert_komp column
     *
     * Example usage:
     * <code>
     * $query->filterByASertKomp(1234); // WHERE a_sert_komp = 1234
     * $query->filterByASertKomp(array(12, 34)); // WHERE a_sert_komp IN (12, 34)
     * $query->filterByASertKomp(array('min' => 12)); // WHERE a_sert_komp >= 12
     * $query->filterByASertKomp(array('max' => 12)); // WHERE a_sert_komp <= 12
     * </code>
     *
     * @param     mixed $aSertKomp The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByASertKomp($aSertKomp = null, $comparison = null)
    {
        if (is_array($aSertKomp)) {
            $useMinMax = false;
            if (isset($aSertKomp['min'])) {
                $this->addUsingAlias(BidangStudiPeer::A_SERT_KOMP, $aSertKomp['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSertKomp['max'])) {
                $this->addUsingAlias(BidangStudiPeer::A_SERT_KOMP, $aSertKomp['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::A_SERT_KOMP, $aSertKomp, $comparison);
    }

    /**
     * Filter the query on the a_sert_profesi column
     *
     * Example usage:
     * <code>
     * $query->filterByASertProfesi(1234); // WHERE a_sert_profesi = 1234
     * $query->filterByASertProfesi(array(12, 34)); // WHERE a_sert_profesi IN (12, 34)
     * $query->filterByASertProfesi(array('min' => 12)); // WHERE a_sert_profesi >= 12
     * $query->filterByASertProfesi(array('max' => 12)); // WHERE a_sert_profesi <= 12
     * </code>
     *
     * @param     mixed $aSertProfesi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByASertProfesi($aSertProfesi = null, $comparison = null)
    {
        if (is_array($aSertProfesi)) {
            $useMinMax = false;
            if (isset($aSertProfesi['min'])) {
                $this->addUsingAlias(BidangStudiPeer::A_SERT_PROFESI, $aSertProfesi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSertProfesi['max'])) {
                $this->addUsingAlias(BidangStudiPeer::A_SERT_PROFESI, $aSertProfesi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::A_SERT_PROFESI, $aSertProfesi, $comparison);
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BidangStudiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BidangStudiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BidangStudiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BidangStudiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(BidangStudiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(BidangStudiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BidangStudiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BidangStudiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangStudiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudiRelatedByKelompokBidangStudiId($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BidangStudiPeer::KELOMPOK_BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
        } else {
            throw new PropelException('filterByBidangStudiRelatedByKelompokBidangStudiId() only accepts arguments of type BidangStudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangStudiRelatedByKelompokBidangStudiId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinBidangStudiRelatedByKelompokBidangStudiId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangStudiRelatedByKelompokBidangStudiId');

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
            $this->addJoinObject($join, 'BidangStudiRelatedByKelompokBidangStudiId');
        }

        return $this;
    }

    /**
     * Use the BidangStudiRelatedByKelompokBidangStudiId relation BidangStudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangStudiQuery A secondary query class using the current class as primary query
     */
    public function useBidangStudiRelatedByKelompokBidangStudiIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBidangStudiRelatedByKelompokBidangStudiId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudiRelatedByKelompokBidangStudiId', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Filter the query by a related BidangSdm object
     *
     * @param   BidangSdm|PropelObjectCollection $bidangSdm  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangSdm($bidangSdm, $comparison = null)
    {
        if ($bidangSdm instanceof BidangSdm) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangSdm->getBidangStudiId(), $comparison);
        } elseif ($bidangSdm instanceof PropelObjectCollection) {
            return $this
                ->useBidangSdmQuery()
                ->filterByPrimaryKeys($bidangSdm->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBidangSdm() only accepts arguments of type BidangSdm or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangSdm relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinBidangSdm($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangSdm');

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
            $this->addJoinObject($join, 'BidangSdm');
        }

        return $this;
    }

    /**
     * Use the BidangSdm relation BidangSdm object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangSdmQuery A secondary query class using the current class as primary query
     */
    public function useBidangSdmQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBidangSdm($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangSdm', '\DataDikdas\Model\BidangSdmQuery');
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudiRelatedByBidangStudiId($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangStudi->getKelompokBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            return $this
                ->useBidangStudiRelatedByBidangStudiIdQuery()
                ->filterByPrimaryKeys($bidangStudi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBidangStudiRelatedByBidangStudiId() only accepts arguments of type BidangStudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangStudiRelatedByBidangStudiId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinBidangStudiRelatedByBidangStudiId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangStudiRelatedByBidangStudiId');

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
            $this->addJoinObject($join, 'BidangStudiRelatedByBidangStudiId');
        }

        return $this;
    }

    /**
     * Use the BidangStudiRelatedByBidangStudiId relation BidangStudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangStudiQuery A secondary query class using the current class as primary query
     */
    public function useBidangStudiRelatedByBidangStudiIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBidangStudiRelatedByBidangStudiId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudiRelatedByBidangStudiId', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Filter the query by a related MapBidangMataPelajaran object
     *
     * @param   MapBidangMataPelajaran|PropelObjectCollection $mapBidangMataPelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMapBidangMataPelajaran($mapBidangMataPelajaran, $comparison = null)
    {
        if ($mapBidangMataPelajaran instanceof MapBidangMataPelajaran) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $mapBidangMataPelajaran->getBidangStudiId(), $comparison);
        } elseif ($mapBidangMataPelajaran instanceof PropelObjectCollection) {
            return $this
                ->useMapBidangMataPelajaranQuery()
                ->filterByPrimaryKeys($mapBidangMataPelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMapBidangMataPelajaran() only accepts arguments of type MapBidangMataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MapBidangMataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinMapBidangMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MapBidangMataPelajaran');

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
            $this->addJoinObject($join, 'MapBidangMataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MapBidangMataPelajaran relation MapBidangMataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MapBidangMataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMapBidangMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMapBidangMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MapBidangMataPelajaran', '\DataDikdas\Model\MapBidangMataPelajaranQuery');
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $pengawasTerdaftar->getBidangStudiId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $ptk->getPengawasBidangStudiId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
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
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related RwyPendFormal object
     *
     * @param   RwyPendFormal|PropelObjectCollection $rwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyPendFormal($rwyPendFormal, $comparison = null)
    {
        if ($rwyPendFormal instanceof RwyPendFormal) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $rwyPendFormal->getBidangStudiId(), $comparison);
        } elseif ($rwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useRwyPendFormalQuery()
                ->filterByPrimaryKeys($rwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyPendFormal() only accepts arguments of type RwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyPendFormal');

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
            $this->addJoinObject($join, 'RwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the RwyPendFormal relation RwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyPendFormal', '\DataDikdas\Model\RwyPendFormalQuery');
    }

    /**
     * Filter the query by a related RwySertifikasi object
     *
     * @param   RwySertifikasi|PropelObjectCollection $rwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwySertifikasi($rwySertifikasi, $comparison = null)
    {
        if ($rwySertifikasi instanceof RwySertifikasi) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $rwySertifikasi->getBidangStudiId(), $comparison);
        } elseif ($rwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useRwySertifikasiQuery()
                ->filterByPrimaryKeys($rwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwySertifikasi() only accepts arguments of type RwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwySertifikasi');

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
            $this->addJoinObject($join, 'RwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the RwySertifikasi relation RwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwySertifikasi', '\DataDikdas\Model\RwySertifikasiQuery');
    }

    /**
     * Filter the query by a related SertifikasiPd object
     *
     * @param   SertifikasiPd|PropelObjectCollection $sertifikasiPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangStudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySertifikasiPd($sertifikasiPd, $comparison = null)
    {
        if ($sertifikasiPd instanceof SertifikasiPd) {
            return $this
                ->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $sertifikasiPd->getBidangStudiId(), $comparison);
        } elseif ($sertifikasiPd instanceof PropelObjectCollection) {
            return $this
                ->useSertifikasiPdQuery()
                ->filterByPrimaryKeys($sertifikasiPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySertifikasiPd() only accepts arguments of type SertifikasiPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SertifikasiPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function joinSertifikasiPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SertifikasiPd');

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
            $this->addJoinObject($join, 'SertifikasiPd');
        }

        return $this;
    }

    /**
     * Use the SertifikasiPd relation SertifikasiPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SertifikasiPdQuery A secondary query class using the current class as primary query
     */
    public function useSertifikasiPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSertifikasiPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SertifikasiPd', '\DataDikdas\Model\SertifikasiPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BidangStudi $bidangStudi Object to remove from the list of results
     *
     * @return BidangStudiQuery The current query, for fluid interface
     */
    public function prune($bidangStudi = null)
    {
        if ($bidangStudi) {
            $this->addUsingAlias(BidangStudiPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
