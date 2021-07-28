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
use DataDikdas\Model\AksesInternet;
use DataDikdas\Model\Jadwal;
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalPeer;
use DataDikdas\Model\SekolahLongitudinalQuery;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SertifikasiIso;
use DataDikdas\Model\SumberListrik;
use DataDikdas\Model\WaktuPenyelenggaraan;

/**
 * Base class that represents a query for the 'sekolah_longitudinal' table.
 *
 * 
 *
 * @method SekolahLongitudinalQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method SekolahLongitudinalQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method SekolahLongitudinalQuery orderByWaktuPenyelenggaraanId($order = Criteria::ASC) Order by the waktu_penyelenggaraan_id column
 * @method SekolahLongitudinalQuery orderByKontinuitasListrik($order = Criteria::ASC) Order by the kontinuitas_listrik column
 * @method SekolahLongitudinalQuery orderByJarakListrik($order = Criteria::ASC) Order by the jarak_listrik column
 * @method SekolahLongitudinalQuery orderByWilayahTerpencil($order = Criteria::ASC) Order by the wilayah_terpencil column
 * @method SekolahLongitudinalQuery orderByWilayahPerbatasan($order = Criteria::ASC) Order by the wilayah_perbatasan column
 * @method SekolahLongitudinalQuery orderByWilayahTransmigrasi($order = Criteria::ASC) Order by the wilayah_transmigrasi column
 * @method SekolahLongitudinalQuery orderByWilayahAdatTerpencil($order = Criteria::ASC) Order by the wilayah_adat_terpencil column
 * @method SekolahLongitudinalQuery orderByWilayahBencanaAlam($order = Criteria::ASC) Order by the wilayah_bencana_alam column
 * @method SekolahLongitudinalQuery orderByWilayahBencanaSosial($order = Criteria::ASC) Order by the wilayah_bencana_sosial column
 * @method SekolahLongitudinalQuery orderByPartisipasiBos($order = Criteria::ASC) Order by the partisipasi_bos column
 * @method SekolahLongitudinalQuery orderBySertifikasiIsoId($order = Criteria::ASC) Order by the sertifikasi_iso_id column
 * @method SekolahLongitudinalQuery orderBySumberListrikId($order = Criteria::ASC) Order by the sumber_listrik_id column
 * @method SekolahLongitudinalQuery orderByDayaListrik($order = Criteria::ASC) Order by the daya_listrik column
 * @method SekolahLongitudinalQuery orderByAksesInternetId($order = Criteria::ASC) Order by the akses_internet_id column
 * @method SekolahLongitudinalQuery orderByAksesInternet2Id($order = Criteria::ASC) Order by the akses_internet_2_id column
 * @method SekolahLongitudinalQuery orderByBlobId($order = Criteria::ASC) Order by the blob_id column
 * @method SekolahLongitudinalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SekolahLongitudinalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SekolahLongitudinalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method SekolahLongitudinalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method SekolahLongitudinalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method SekolahLongitudinalQuery groupBySekolahId() Group by the sekolah_id column
 * @method SekolahLongitudinalQuery groupBySemesterId() Group by the semester_id column
 * @method SekolahLongitudinalQuery groupByWaktuPenyelenggaraanId() Group by the waktu_penyelenggaraan_id column
 * @method SekolahLongitudinalQuery groupByKontinuitasListrik() Group by the kontinuitas_listrik column
 * @method SekolahLongitudinalQuery groupByJarakListrik() Group by the jarak_listrik column
 * @method SekolahLongitudinalQuery groupByWilayahTerpencil() Group by the wilayah_terpencil column
 * @method SekolahLongitudinalQuery groupByWilayahPerbatasan() Group by the wilayah_perbatasan column
 * @method SekolahLongitudinalQuery groupByWilayahTransmigrasi() Group by the wilayah_transmigrasi column
 * @method SekolahLongitudinalQuery groupByWilayahAdatTerpencil() Group by the wilayah_adat_terpencil column
 * @method SekolahLongitudinalQuery groupByWilayahBencanaAlam() Group by the wilayah_bencana_alam column
 * @method SekolahLongitudinalQuery groupByWilayahBencanaSosial() Group by the wilayah_bencana_sosial column
 * @method SekolahLongitudinalQuery groupByPartisipasiBos() Group by the partisipasi_bos column
 * @method SekolahLongitudinalQuery groupBySertifikasiIsoId() Group by the sertifikasi_iso_id column
 * @method SekolahLongitudinalQuery groupBySumberListrikId() Group by the sumber_listrik_id column
 * @method SekolahLongitudinalQuery groupByDayaListrik() Group by the daya_listrik column
 * @method SekolahLongitudinalQuery groupByAksesInternetId() Group by the akses_internet_id column
 * @method SekolahLongitudinalQuery groupByAksesInternet2Id() Group by the akses_internet_2_id column
 * @method SekolahLongitudinalQuery groupByBlobId() Group by the blob_id column
 * @method SekolahLongitudinalQuery groupByCreateDate() Group by the create_date column
 * @method SekolahLongitudinalQuery groupByLastUpdate() Group by the last_update column
 * @method SekolahLongitudinalQuery groupBySoftDelete() Group by the soft_delete column
 * @method SekolahLongitudinalQuery groupByLastSync() Group by the last_sync column
 * @method SekolahLongitudinalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method SekolahLongitudinalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SekolahLongitudinalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SekolahLongitudinalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SekolahLongitudinalQuery leftJoinLargeObject($relationAlias = null) Adds a LEFT JOIN clause to the query using the LargeObject relation
 * @method SekolahLongitudinalQuery rightJoinLargeObject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LargeObject relation
 * @method SekolahLongitudinalQuery innerJoinLargeObject($relationAlias = null) Adds a INNER JOIN clause to the query using the LargeObject relation
 *
 * @method SekolahLongitudinalQuery leftJoinSertifikasiIso($relationAlias = null) Adds a LEFT JOIN clause to the query using the SertifikasiIso relation
 * @method SekolahLongitudinalQuery rightJoinSertifikasiIso($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SertifikasiIso relation
 * @method SekolahLongitudinalQuery innerJoinSertifikasiIso($relationAlias = null) Adds a INNER JOIN clause to the query using the SertifikasiIso relation
 *
 * @method SekolahLongitudinalQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method SekolahLongitudinalQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method SekolahLongitudinalQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method SekolahLongitudinalQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method SekolahLongitudinalQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method SekolahLongitudinalQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method SekolahLongitudinalQuery leftJoinSumberListrik($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberListrik relation
 * @method SekolahLongitudinalQuery rightJoinSumberListrik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberListrik relation
 * @method SekolahLongitudinalQuery innerJoinSumberListrik($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberListrik relation
 *
 * @method SekolahLongitudinalQuery leftJoinWaktuPenyelenggaraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the WaktuPenyelenggaraan relation
 * @method SekolahLongitudinalQuery rightJoinWaktuPenyelenggaraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the WaktuPenyelenggaraan relation
 * @method SekolahLongitudinalQuery innerJoinWaktuPenyelenggaraan($relationAlias = null) Adds a INNER JOIN clause to the query using the WaktuPenyelenggaraan relation
 *
 * @method SekolahLongitudinalQuery leftJoinAksesInternetRelatedByAksesInternetId($relationAlias = null) Adds a LEFT JOIN clause to the query using the AksesInternetRelatedByAksesInternetId relation
 * @method SekolahLongitudinalQuery rightJoinAksesInternetRelatedByAksesInternetId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AksesInternetRelatedByAksesInternetId relation
 * @method SekolahLongitudinalQuery innerJoinAksesInternetRelatedByAksesInternetId($relationAlias = null) Adds a INNER JOIN clause to the query using the AksesInternetRelatedByAksesInternetId relation
 *
 * @method SekolahLongitudinalQuery leftJoinAksesInternetRelatedByAksesInternet2Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the AksesInternetRelatedByAksesInternet2Id relation
 * @method SekolahLongitudinalQuery rightJoinAksesInternetRelatedByAksesInternet2Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AksesInternetRelatedByAksesInternet2Id relation
 * @method SekolahLongitudinalQuery innerJoinAksesInternetRelatedByAksesInternet2Id($relationAlias = null) Adds a INNER JOIN clause to the query using the AksesInternetRelatedByAksesInternet2Id relation
 *
 * @method SekolahLongitudinalQuery leftJoinJadwal($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jadwal relation
 * @method SekolahLongitudinalQuery rightJoinJadwal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jadwal relation
 * @method SekolahLongitudinalQuery innerJoinJadwal($relationAlias = null) Adds a INNER JOIN clause to the query using the Jadwal relation
 *
 * @method SekolahLongitudinal findOne(PropelPDO $con = null) Return the first SekolahLongitudinal matching the query
 * @method SekolahLongitudinal findOneOrCreate(PropelPDO $con = null) Return the first SekolahLongitudinal matching the query, or a new SekolahLongitudinal object populated from the query conditions when no match is found
 *
 * @method SekolahLongitudinal findOneBySekolahId(string $sekolah_id) Return the first SekolahLongitudinal filtered by the sekolah_id column
 * @method SekolahLongitudinal findOneBySemesterId(string $semester_id) Return the first SekolahLongitudinal filtered by the semester_id column
 * @method SekolahLongitudinal findOneByWaktuPenyelenggaraanId(string $waktu_penyelenggaraan_id) Return the first SekolahLongitudinal filtered by the waktu_penyelenggaraan_id column
 * @method SekolahLongitudinal findOneByKontinuitasListrik(string $kontinuitas_listrik) Return the first SekolahLongitudinal filtered by the kontinuitas_listrik column
 * @method SekolahLongitudinal findOneByJarakListrik(string $jarak_listrik) Return the first SekolahLongitudinal filtered by the jarak_listrik column
 * @method SekolahLongitudinal findOneByWilayahTerpencil(string $wilayah_terpencil) Return the first SekolahLongitudinal filtered by the wilayah_terpencil column
 * @method SekolahLongitudinal findOneByWilayahPerbatasan(string $wilayah_perbatasan) Return the first SekolahLongitudinal filtered by the wilayah_perbatasan column
 * @method SekolahLongitudinal findOneByWilayahTransmigrasi(string $wilayah_transmigrasi) Return the first SekolahLongitudinal filtered by the wilayah_transmigrasi column
 * @method SekolahLongitudinal findOneByWilayahAdatTerpencil(string $wilayah_adat_terpencil) Return the first SekolahLongitudinal filtered by the wilayah_adat_terpencil column
 * @method SekolahLongitudinal findOneByWilayahBencanaAlam(string $wilayah_bencana_alam) Return the first SekolahLongitudinal filtered by the wilayah_bencana_alam column
 * @method SekolahLongitudinal findOneByWilayahBencanaSosial(string $wilayah_bencana_sosial) Return the first SekolahLongitudinal filtered by the wilayah_bencana_sosial column
 * @method SekolahLongitudinal findOneByPartisipasiBos(string $partisipasi_bos) Return the first SekolahLongitudinal filtered by the partisipasi_bos column
 * @method SekolahLongitudinal findOneBySertifikasiIsoId(int $sertifikasi_iso_id) Return the first SekolahLongitudinal filtered by the sertifikasi_iso_id column
 * @method SekolahLongitudinal findOneBySumberListrikId(string $sumber_listrik_id) Return the first SekolahLongitudinal filtered by the sumber_listrik_id column
 * @method SekolahLongitudinal findOneByDayaListrik(string $daya_listrik) Return the first SekolahLongitudinal filtered by the daya_listrik column
 * @method SekolahLongitudinal findOneByAksesInternetId(int $akses_internet_id) Return the first SekolahLongitudinal filtered by the akses_internet_id column
 * @method SekolahLongitudinal findOneByAksesInternet2Id(int $akses_internet_2_id) Return the first SekolahLongitudinal filtered by the akses_internet_2_id column
 * @method SekolahLongitudinal findOneByBlobId(string $blob_id) Return the first SekolahLongitudinal filtered by the blob_id column
 * @method SekolahLongitudinal findOneByCreateDate(string $create_date) Return the first SekolahLongitudinal filtered by the create_date column
 * @method SekolahLongitudinal findOneByLastUpdate(string $last_update) Return the first SekolahLongitudinal filtered by the last_update column
 * @method SekolahLongitudinal findOneBySoftDelete(string $soft_delete) Return the first SekolahLongitudinal filtered by the soft_delete column
 * @method SekolahLongitudinal findOneByLastSync(string $last_sync) Return the first SekolahLongitudinal filtered by the last_sync column
 * @method SekolahLongitudinal findOneByUpdaterId(string $updater_id) Return the first SekolahLongitudinal filtered by the updater_id column
 *
 * @method array findBySekolahId(string $sekolah_id) Return SekolahLongitudinal objects filtered by the sekolah_id column
 * @method array findBySemesterId(string $semester_id) Return SekolahLongitudinal objects filtered by the semester_id column
 * @method array findByWaktuPenyelenggaraanId(string $waktu_penyelenggaraan_id) Return SekolahLongitudinal objects filtered by the waktu_penyelenggaraan_id column
 * @method array findByKontinuitasListrik(string $kontinuitas_listrik) Return SekolahLongitudinal objects filtered by the kontinuitas_listrik column
 * @method array findByJarakListrik(string $jarak_listrik) Return SekolahLongitudinal objects filtered by the jarak_listrik column
 * @method array findByWilayahTerpencil(string $wilayah_terpencil) Return SekolahLongitudinal objects filtered by the wilayah_terpencil column
 * @method array findByWilayahPerbatasan(string $wilayah_perbatasan) Return SekolahLongitudinal objects filtered by the wilayah_perbatasan column
 * @method array findByWilayahTransmigrasi(string $wilayah_transmigrasi) Return SekolahLongitudinal objects filtered by the wilayah_transmigrasi column
 * @method array findByWilayahAdatTerpencil(string $wilayah_adat_terpencil) Return SekolahLongitudinal objects filtered by the wilayah_adat_terpencil column
 * @method array findByWilayahBencanaAlam(string $wilayah_bencana_alam) Return SekolahLongitudinal objects filtered by the wilayah_bencana_alam column
 * @method array findByWilayahBencanaSosial(string $wilayah_bencana_sosial) Return SekolahLongitudinal objects filtered by the wilayah_bencana_sosial column
 * @method array findByPartisipasiBos(string $partisipasi_bos) Return SekolahLongitudinal objects filtered by the partisipasi_bos column
 * @method array findBySertifikasiIsoId(int $sertifikasi_iso_id) Return SekolahLongitudinal objects filtered by the sertifikasi_iso_id column
 * @method array findBySumberListrikId(string $sumber_listrik_id) Return SekolahLongitudinal objects filtered by the sumber_listrik_id column
 * @method array findByDayaListrik(string $daya_listrik) Return SekolahLongitudinal objects filtered by the daya_listrik column
 * @method array findByAksesInternetId(int $akses_internet_id) Return SekolahLongitudinal objects filtered by the akses_internet_id column
 * @method array findByAksesInternet2Id(int $akses_internet_2_id) Return SekolahLongitudinal objects filtered by the akses_internet_2_id column
 * @method array findByBlobId(string $blob_id) Return SekolahLongitudinal objects filtered by the blob_id column
 * @method array findByCreateDate(string $create_date) Return SekolahLongitudinal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return SekolahLongitudinal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return SekolahLongitudinal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return SekolahLongitudinal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return SekolahLongitudinal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahLongitudinalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSekolahLongitudinalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SekolahLongitudinal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SekolahLongitudinalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SekolahLongitudinalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SekolahLongitudinalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SekolahLongitudinalQuery) {
            return $criteria;
        }
        $query = new SekolahLongitudinalQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$sekolah_id, $semester_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SekolahLongitudinal|SekolahLongitudinal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SekolahLongitudinalPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SekolahLongitudinalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 SekolahLongitudinal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "semester_id", "waktu_penyelenggaraan_id", "kontinuitas_listrik", "jarak_listrik", "wilayah_terpencil", "wilayah_perbatasan", "wilayah_transmigrasi", "wilayah_adat_terpencil", "wilayah_bencana_alam", "wilayah_bencana_sosial", "partisipasi_bos", "sertifikasi_iso_id", "sumber_listrik_id", "daya_listrik", "akses_internet_id", "akses_internet_2_id", "blob_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "sekolah_longitudinal" WHERE "sekolah_id" = :p0 AND "semester_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SekolahLongitudinal();
            $obj->hydrate($row);
            SekolahLongitudinalPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SekolahLongitudinal|SekolahLongitudinal[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|SekolahLongitudinal[]|mixed the list of results, formatted by the current formatter
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SekolahLongitudinalPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SekolahLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SekolahLongitudinalPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SekolahLongitudinalPeer::SEMESTER_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the waktu_penyelenggaraan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByWaktuPenyelenggaraanId(1234); // WHERE waktu_penyelenggaraan_id = 1234
     * $query->filterByWaktuPenyelenggaraanId(array(12, 34)); // WHERE waktu_penyelenggaraan_id IN (12, 34)
     * $query->filterByWaktuPenyelenggaraanId(array('min' => 12)); // WHERE waktu_penyelenggaraan_id >= 12
     * $query->filterByWaktuPenyelenggaraanId(array('max' => 12)); // WHERE waktu_penyelenggaraan_id <= 12
     * </code>
     *
     * @see       filterByWaktuPenyelenggaraan()
     *
     * @param     mixed $waktuPenyelenggaraanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWaktuPenyelenggaraanId($waktuPenyelenggaraanId = null, $comparison = null)
    {
        if (is_array($waktuPenyelenggaraanId)) {
            $useMinMax = false;
            if (isset($waktuPenyelenggaraanId['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $waktuPenyelenggaraanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($waktuPenyelenggaraanId['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $waktuPenyelenggaraanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $waktuPenyelenggaraanId, $comparison);
    }

    /**
     * Filter the query on the kontinuitas_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByKontinuitasListrik('fooValue');   // WHERE kontinuitas_listrik = 'fooValue'
     * $query->filterByKontinuitasListrik('%fooValue%'); // WHERE kontinuitas_listrik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kontinuitasListrik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByKontinuitasListrik($kontinuitasListrik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kontinuitasListrik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kontinuitasListrik)) {
                $kontinuitasListrik = str_replace('*', '%', $kontinuitasListrik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::KONTINUITAS_LISTRIK, $kontinuitasListrik, $comparison);
    }

    /**
     * Filter the query on the jarak_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByJarakListrik(1234); // WHERE jarak_listrik = 1234
     * $query->filterByJarakListrik(array(12, 34)); // WHERE jarak_listrik IN (12, 34)
     * $query->filterByJarakListrik(array('min' => 12)); // WHERE jarak_listrik >= 12
     * $query->filterByJarakListrik(array('max' => 12)); // WHERE jarak_listrik <= 12
     * </code>
     *
     * @param     mixed $jarakListrik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByJarakListrik($jarakListrik = null, $comparison = null)
    {
        if (is_array($jarakListrik)) {
            $useMinMax = false;
            if (isset($jarakListrik['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::JARAK_LISTRIK, $jarakListrik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jarakListrik['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::JARAK_LISTRIK, $jarakListrik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::JARAK_LISTRIK, $jarakListrik, $comparison);
    }

    /**
     * Filter the query on the wilayah_terpencil column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahTerpencil(1234); // WHERE wilayah_terpencil = 1234
     * $query->filterByWilayahTerpencil(array(12, 34)); // WHERE wilayah_terpencil IN (12, 34)
     * $query->filterByWilayahTerpencil(array('min' => 12)); // WHERE wilayah_terpencil >= 12
     * $query->filterByWilayahTerpencil(array('max' => 12)); // WHERE wilayah_terpencil <= 12
     * </code>
     *
     * @param     mixed $wilayahTerpencil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahTerpencil($wilayahTerpencil = null, $comparison = null)
    {
        if (is_array($wilayahTerpencil)) {
            $useMinMax = false;
            if (isset($wilayahTerpencil['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TERPENCIL, $wilayahTerpencil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahTerpencil['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TERPENCIL, $wilayahTerpencil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TERPENCIL, $wilayahTerpencil, $comparison);
    }

    /**
     * Filter the query on the wilayah_perbatasan column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahPerbatasan(1234); // WHERE wilayah_perbatasan = 1234
     * $query->filterByWilayahPerbatasan(array(12, 34)); // WHERE wilayah_perbatasan IN (12, 34)
     * $query->filterByWilayahPerbatasan(array('min' => 12)); // WHERE wilayah_perbatasan >= 12
     * $query->filterByWilayahPerbatasan(array('max' => 12)); // WHERE wilayah_perbatasan <= 12
     * </code>
     *
     * @param     mixed $wilayahPerbatasan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahPerbatasan($wilayahPerbatasan = null, $comparison = null)
    {
        if (is_array($wilayahPerbatasan)) {
            $useMinMax = false;
            if (isset($wilayahPerbatasan['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_PERBATASAN, $wilayahPerbatasan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahPerbatasan['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_PERBATASAN, $wilayahPerbatasan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_PERBATASAN, $wilayahPerbatasan, $comparison);
    }

    /**
     * Filter the query on the wilayah_transmigrasi column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahTransmigrasi(1234); // WHERE wilayah_transmigrasi = 1234
     * $query->filterByWilayahTransmigrasi(array(12, 34)); // WHERE wilayah_transmigrasi IN (12, 34)
     * $query->filterByWilayahTransmigrasi(array('min' => 12)); // WHERE wilayah_transmigrasi >= 12
     * $query->filterByWilayahTransmigrasi(array('max' => 12)); // WHERE wilayah_transmigrasi <= 12
     * </code>
     *
     * @param     mixed $wilayahTransmigrasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahTransmigrasi($wilayahTransmigrasi = null, $comparison = null)
    {
        if (is_array($wilayahTransmigrasi)) {
            $useMinMax = false;
            if (isset($wilayahTransmigrasi['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI, $wilayahTransmigrasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahTransmigrasi['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI, $wilayahTransmigrasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_TRANSMIGRASI, $wilayahTransmigrasi, $comparison);
    }

    /**
     * Filter the query on the wilayah_adat_terpencil column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahAdatTerpencil(1234); // WHERE wilayah_adat_terpencil = 1234
     * $query->filterByWilayahAdatTerpencil(array(12, 34)); // WHERE wilayah_adat_terpencil IN (12, 34)
     * $query->filterByWilayahAdatTerpencil(array('min' => 12)); // WHERE wilayah_adat_terpencil >= 12
     * $query->filterByWilayahAdatTerpencil(array('max' => 12)); // WHERE wilayah_adat_terpencil <= 12
     * </code>
     *
     * @param     mixed $wilayahAdatTerpencil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahAdatTerpencil($wilayahAdatTerpencil = null, $comparison = null)
    {
        if (is_array($wilayahAdatTerpencil)) {
            $useMinMax = false;
            if (isset($wilayahAdatTerpencil['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL, $wilayahAdatTerpencil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahAdatTerpencil['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL, $wilayahAdatTerpencil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_ADAT_TERPENCIL, $wilayahAdatTerpencil, $comparison);
    }

    /**
     * Filter the query on the wilayah_bencana_alam column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahBencanaAlam(1234); // WHERE wilayah_bencana_alam = 1234
     * $query->filterByWilayahBencanaAlam(array(12, 34)); // WHERE wilayah_bencana_alam IN (12, 34)
     * $query->filterByWilayahBencanaAlam(array('min' => 12)); // WHERE wilayah_bencana_alam >= 12
     * $query->filterByWilayahBencanaAlam(array('max' => 12)); // WHERE wilayah_bencana_alam <= 12
     * </code>
     *
     * @param     mixed $wilayahBencanaAlam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahBencanaAlam($wilayahBencanaAlam = null, $comparison = null)
    {
        if (is_array($wilayahBencanaAlam)) {
            $useMinMax = false;
            if (isset($wilayahBencanaAlam['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM, $wilayahBencanaAlam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahBencanaAlam['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM, $wilayahBencanaAlam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_ALAM, $wilayahBencanaAlam, $comparison);
    }

    /**
     * Filter the query on the wilayah_bencana_sosial column
     *
     * Example usage:
     * <code>
     * $query->filterByWilayahBencanaSosial(1234); // WHERE wilayah_bencana_sosial = 1234
     * $query->filterByWilayahBencanaSosial(array(12, 34)); // WHERE wilayah_bencana_sosial IN (12, 34)
     * $query->filterByWilayahBencanaSosial(array('min' => 12)); // WHERE wilayah_bencana_sosial >= 12
     * $query->filterByWilayahBencanaSosial(array('max' => 12)); // WHERE wilayah_bencana_sosial <= 12
     * </code>
     *
     * @param     mixed $wilayahBencanaSosial The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByWilayahBencanaSosial($wilayahBencanaSosial = null, $comparison = null)
    {
        if (is_array($wilayahBencanaSosial)) {
            $useMinMax = false;
            if (isset($wilayahBencanaSosial['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL, $wilayahBencanaSosial['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($wilayahBencanaSosial['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL, $wilayahBencanaSosial['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::WILAYAH_BENCANA_SOSIAL, $wilayahBencanaSosial, $comparison);
    }

    /**
     * Filter the query on the partisipasi_bos column
     *
     * Example usage:
     * <code>
     * $query->filterByPartisipasiBos(1234); // WHERE partisipasi_bos = 1234
     * $query->filterByPartisipasiBos(array(12, 34)); // WHERE partisipasi_bos IN (12, 34)
     * $query->filterByPartisipasiBos(array('min' => 12)); // WHERE partisipasi_bos >= 12
     * $query->filterByPartisipasiBos(array('max' => 12)); // WHERE partisipasi_bos <= 12
     * </code>
     *
     * @param     mixed $partisipasiBos The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByPartisipasiBos($partisipasiBos = null, $comparison = null)
    {
        if (is_array($partisipasiBos)) {
            $useMinMax = false;
            if (isset($partisipasiBos['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::PARTISIPASI_BOS, $partisipasiBos['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($partisipasiBos['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::PARTISIPASI_BOS, $partisipasiBos['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::PARTISIPASI_BOS, $partisipasiBos, $comparison);
    }

    /**
     * Filter the query on the sertifikasi_iso_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySertifikasiIsoId(1234); // WHERE sertifikasi_iso_id = 1234
     * $query->filterBySertifikasiIsoId(array(12, 34)); // WHERE sertifikasi_iso_id IN (12, 34)
     * $query->filterBySertifikasiIsoId(array('min' => 12)); // WHERE sertifikasi_iso_id >= 12
     * $query->filterBySertifikasiIsoId(array('max' => 12)); // WHERE sertifikasi_iso_id <= 12
     * </code>
     *
     * @see       filterBySertifikasiIso()
     *
     * @param     mixed $sertifikasiIsoId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySertifikasiIsoId($sertifikasiIsoId = null, $comparison = null)
    {
        if (is_array($sertifikasiIsoId)) {
            $useMinMax = false;
            if (isset($sertifikasiIsoId['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $sertifikasiIsoId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sertifikasiIsoId['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $sertifikasiIsoId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $sertifikasiIsoId, $comparison);
    }

    /**
     * Filter the query on the sumber_listrik_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberListrikId(1234); // WHERE sumber_listrik_id = 1234
     * $query->filterBySumberListrikId(array(12, 34)); // WHERE sumber_listrik_id IN (12, 34)
     * $query->filterBySumberListrikId(array('min' => 12)); // WHERE sumber_listrik_id >= 12
     * $query->filterBySumberListrikId(array('max' => 12)); // WHERE sumber_listrik_id <= 12
     * </code>
     *
     * @see       filterBySumberListrik()
     *
     * @param     mixed $sumberListrikId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySumberListrikId($sumberListrikId = null, $comparison = null)
    {
        if (is_array($sumberListrikId)) {
            $useMinMax = false;
            if (isset($sumberListrikId['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $sumberListrikId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberListrikId['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $sumberListrikId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $sumberListrikId, $comparison);
    }

    /**
     * Filter the query on the daya_listrik column
     *
     * Example usage:
     * <code>
     * $query->filterByDayaListrik(1234); // WHERE daya_listrik = 1234
     * $query->filterByDayaListrik(array(12, 34)); // WHERE daya_listrik IN (12, 34)
     * $query->filterByDayaListrik(array('min' => 12)); // WHERE daya_listrik >= 12
     * $query->filterByDayaListrik(array('max' => 12)); // WHERE daya_listrik <= 12
     * </code>
     *
     * @param     mixed $dayaListrik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByDayaListrik($dayaListrik = null, $comparison = null)
    {
        if (is_array($dayaListrik)) {
            $useMinMax = false;
            if (isset($dayaListrik['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::DAYA_LISTRIK, $dayaListrik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dayaListrik['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::DAYA_LISTRIK, $dayaListrik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::DAYA_LISTRIK, $dayaListrik, $comparison);
    }

    /**
     * Filter the query on the akses_internet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAksesInternetId(1234); // WHERE akses_internet_id = 1234
     * $query->filterByAksesInternetId(array(12, 34)); // WHERE akses_internet_id IN (12, 34)
     * $query->filterByAksesInternetId(array('min' => 12)); // WHERE akses_internet_id >= 12
     * $query->filterByAksesInternetId(array('max' => 12)); // WHERE akses_internet_id <= 12
     * </code>
     *
     * @see       filterByAksesInternetRelatedByAksesInternetId()
     *
     * @param     mixed $aksesInternetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByAksesInternetId($aksesInternetId = null, $comparison = null)
    {
        if (is_array($aksesInternetId)) {
            $useMinMax = false;
            if (isset($aksesInternetId['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $aksesInternetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aksesInternetId['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $aksesInternetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $aksesInternetId, $comparison);
    }

    /**
     * Filter the query on the akses_internet_2_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAksesInternet2Id(1234); // WHERE akses_internet_2_id = 1234
     * $query->filterByAksesInternet2Id(array(12, 34)); // WHERE akses_internet_2_id IN (12, 34)
     * $query->filterByAksesInternet2Id(array('min' => 12)); // WHERE akses_internet_2_id >= 12
     * $query->filterByAksesInternet2Id(array('max' => 12)); // WHERE akses_internet_2_id <= 12
     * </code>
     *
     * @see       filterByAksesInternetRelatedByAksesInternet2Id()
     *
     * @param     mixed $aksesInternet2Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByAksesInternet2Id($aksesInternet2Id = null, $comparison = null)
    {
        if (is_array($aksesInternet2Id)) {
            $useMinMax = false;
            if (isset($aksesInternet2Id['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $aksesInternet2Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aksesInternet2Id['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $aksesInternet2Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $aksesInternet2Id, $comparison);
    }

    /**
     * Filter the query on the blob_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlobId('fooValue');   // WHERE blob_id = 'fooValue'
     * $query->filterByBlobId('%fooValue%'); // WHERE blob_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blobId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByBlobId($blobId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blobId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blobId)) {
                $blobId = str_replace('*', '%', $blobId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::BLOB_ID, $blobId, $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SekolahLongitudinalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahLongitudinalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SekolahLongitudinalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related LargeObject object
     *
     * @param   LargeObject|PropelObjectCollection $largeObject The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLargeObject($largeObject, $comparison = null)
    {
        if ($largeObject instanceof LargeObject) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::BLOB_ID, $largeObject->getBlobId(), $comparison);
        } elseif ($largeObject instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::BLOB_ID, $largeObject->toKeyValue('PrimaryKey', 'BlobId'), $comparison);
        } else {
            throw new PropelException('filterByLargeObject() only accepts arguments of type LargeObject or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LargeObject relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinLargeObject($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LargeObject');

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
            $this->addJoinObject($join, 'LargeObject');
        }

        return $this;
    }

    /**
     * Use the LargeObject relation LargeObject object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LargeObjectQuery A secondary query class using the current class as primary query
     */
    public function useLargeObjectQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLargeObject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LargeObject', '\DataDikdas\Model\LargeObjectQuery');
    }

    /**
     * Filter the query by a related SertifikasiIso object
     *
     * @param   SertifikasiIso|PropelObjectCollection $sertifikasiIso The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySertifikasiIso($sertifikasiIso, $comparison = null)
    {
        if ($sertifikasiIso instanceof SertifikasiIso) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $sertifikasiIso->getSertifikasiIsoId(), $comparison);
        } elseif ($sertifikasiIso instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SERTIFIKASI_ISO_ID, $sertifikasiIso->toKeyValue('PrimaryKey', 'SertifikasiIsoId'), $comparison);
        } else {
            throw new PropelException('filterBySertifikasiIso() only accepts arguments of type SertifikasiIso or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SertifikasiIso relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinSertifikasiIso($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SertifikasiIso');

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
            $this->addJoinObject($join, 'SertifikasiIso');
        }

        return $this;
    }

    /**
     * Use the SertifikasiIso relation SertifikasiIso object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SertifikasiIsoQuery A secondary query class using the current class as primary query
     */
    public function useSertifikasiIsoQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSertifikasiIso($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SertifikasiIso', '\DataDikdas\Model\SertifikasiIsoQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Filter the query by a related SumberListrik object
     *
     * @param   SumberListrik|PropelObjectCollection $sumberListrik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberListrik($sumberListrik, $comparison = null)
    {
        if ($sumberListrik instanceof SumberListrik) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $sumberListrik->getSumberListrikId(), $comparison);
        } elseif ($sumberListrik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SUMBER_LISTRIK_ID, $sumberListrik->toKeyValue('PrimaryKey', 'SumberListrikId'), $comparison);
        } else {
            throw new PropelException('filterBySumberListrik() only accepts arguments of type SumberListrik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberListrik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinSumberListrik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberListrik');

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
            $this->addJoinObject($join, 'SumberListrik');
        }

        return $this;
    }

    /**
     * Use the SumberListrik relation SumberListrik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberListrikQuery A secondary query class using the current class as primary query
     */
    public function useSumberListrikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberListrik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberListrik', '\DataDikdas\Model\SumberListrikQuery');
    }

    /**
     * Filter the query by a related WaktuPenyelenggaraan object
     *
     * @param   WaktuPenyelenggaraan|PropelObjectCollection $waktuPenyelenggaraan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByWaktuPenyelenggaraan($waktuPenyelenggaraan, $comparison = null)
    {
        if ($waktuPenyelenggaraan instanceof WaktuPenyelenggaraan) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $waktuPenyelenggaraan->getWaktuPenyelenggaraanId(), $comparison);
        } elseif ($waktuPenyelenggaraan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::WAKTU_PENYELENGGARAAN_ID, $waktuPenyelenggaraan->toKeyValue('PrimaryKey', 'WaktuPenyelenggaraanId'), $comparison);
        } else {
            throw new PropelException('filterByWaktuPenyelenggaraan() only accepts arguments of type WaktuPenyelenggaraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the WaktuPenyelenggaraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinWaktuPenyelenggaraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('WaktuPenyelenggaraan');

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
            $this->addJoinObject($join, 'WaktuPenyelenggaraan');
        }

        return $this;
    }

    /**
     * Use the WaktuPenyelenggaraan relation WaktuPenyelenggaraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\WaktuPenyelenggaraanQuery A secondary query class using the current class as primary query
     */
    public function useWaktuPenyelenggaraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinWaktuPenyelenggaraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'WaktuPenyelenggaraan', '\DataDikdas\Model\WaktuPenyelenggaraanQuery');
    }

    /**
     * Filter the query by a related AksesInternet object
     *
     * @param   AksesInternet|PropelObjectCollection $aksesInternet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAksesInternetRelatedByAksesInternetId($aksesInternet, $comparison = null)
    {
        if ($aksesInternet instanceof AksesInternet) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $aksesInternet->getAksesInternetId(), $comparison);
        } elseif ($aksesInternet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_ID, $aksesInternet->toKeyValue('PrimaryKey', 'AksesInternetId'), $comparison);
        } else {
            throw new PropelException('filterByAksesInternetRelatedByAksesInternetId() only accepts arguments of type AksesInternet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AksesInternetRelatedByAksesInternetId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinAksesInternetRelatedByAksesInternetId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AksesInternetRelatedByAksesInternetId');

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
            $this->addJoinObject($join, 'AksesInternetRelatedByAksesInternetId');
        }

        return $this;
    }

    /**
     * Use the AksesInternetRelatedByAksesInternetId relation AksesInternet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AksesInternetQuery A secondary query class using the current class as primary query
     */
    public function useAksesInternetRelatedByAksesInternetIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAksesInternetRelatedByAksesInternetId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AksesInternetRelatedByAksesInternetId', '\DataDikdas\Model\AksesInternetQuery');
    }

    /**
     * Filter the query by a related AksesInternet object
     *
     * @param   AksesInternet|PropelObjectCollection $aksesInternet The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAksesInternetRelatedByAksesInternet2Id($aksesInternet, $comparison = null)
    {
        if ($aksesInternet instanceof AksesInternet) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $aksesInternet->getAksesInternetId(), $comparison);
        } elseif ($aksesInternet instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::AKSES_INTERNET_2_ID, $aksesInternet->toKeyValue('PrimaryKey', 'AksesInternetId'), $comparison);
        } else {
            throw new PropelException('filterByAksesInternetRelatedByAksesInternet2Id() only accepts arguments of type AksesInternet or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AksesInternetRelatedByAksesInternet2Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinAksesInternetRelatedByAksesInternet2Id($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AksesInternetRelatedByAksesInternet2Id');

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
            $this->addJoinObject($join, 'AksesInternetRelatedByAksesInternet2Id');
        }

        return $this;
    }

    /**
     * Use the AksesInternetRelatedByAksesInternet2Id relation AksesInternet object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AksesInternetQuery A secondary query class using the current class as primary query
     */
    public function useAksesInternetRelatedByAksesInternet2IdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAksesInternetRelatedByAksesInternet2Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AksesInternetRelatedByAksesInternet2Id', '\DataDikdas\Model\AksesInternetQuery');
    }

    /**
     * Filter the query by a related Jadwal object
     *
     * @param   Jadwal|PropelObjectCollection $jadwal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahLongitudinalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwal($jadwal, $comparison = null)
    {
        if ($jadwal instanceof Jadwal) {
            return $this
                ->addUsingAlias(SekolahLongitudinalPeer::SEKOLAH_ID, $jadwal->getSekolahId(), $comparison)
                ->addUsingAlias(SekolahLongitudinalPeer::SEMESTER_ID, $jadwal->getSemesterId(), $comparison);
        } else {
            throw new PropelException('filterByJadwal() only accepts arguments of type Jadwal');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jadwal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function joinJadwal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jadwal');

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
            $this->addJoinObject($join, 'Jadwal');
        }

        return $this;
    }

    /**
     * Use the Jadwal relation Jadwal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalQuery A secondary query class using the current class as primary query
     */
    public function useJadwalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jadwal', '\DataDikdas\Model\JadwalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SekolahLongitudinal $sekolahLongitudinal Object to remove from the list of results
     *
     * @return SekolahLongitudinalQuery The current query, for fluid interface
     */
    public function prune($sekolahLongitudinal = null)
    {
        if ($sekolahLongitudinal) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SekolahLongitudinalPeer::SEKOLAH_ID), $sekolahLongitudinal->getSekolahId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SekolahLongitudinalPeer::SEMESTER_ID), $sekolahLongitudinal->getSemesterId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
