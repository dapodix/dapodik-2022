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
use DataDikdas\Model\GelarAkademik;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalPeer;
use DataDikdas\Model\RwyPendFormalQuery;
use DataDikdas\Model\VldRwyPendFormal;

/**
 * Base class that represents a query for the 'rwy_pend_formal' table.
 *
 * 
 *
 * @method RwyPendFormalQuery orderByRiwayatPendidikanFormalId($order = Criteria::ASC) Order by the riwayat_pendidikan_formal_id column
 * @method RwyPendFormalQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method RwyPendFormalQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method RwyPendFormalQuery orderByGelarAkademikId($order = Criteria::ASC) Order by the gelar_akademik_id column
 * @method RwyPendFormalQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RwyPendFormalQuery orderBySatuanPendidikanFormal($order = Criteria::ASC) Order by the satuan_pendidikan_formal column
 * @method RwyPendFormalQuery orderByFakultas($order = Criteria::ASC) Order by the fakultas column
 * @method RwyPendFormalQuery orderByKependidikan($order = Criteria::ASC) Order by the kependidikan column
 * @method RwyPendFormalQuery orderByTahunMasuk($order = Criteria::ASC) Order by the tahun_masuk column
 * @method RwyPendFormalQuery orderByTahunLulus($order = Criteria::ASC) Order by the tahun_lulus column
 * @method RwyPendFormalQuery orderByNim($order = Criteria::ASC) Order by the nim column
 * @method RwyPendFormalQuery orderByStatusKuliah($order = Criteria::ASC) Order by the status_kuliah column
 * @method RwyPendFormalQuery orderBySemester($order = Criteria::ASC) Order by the semester column
 * @method RwyPendFormalQuery orderByIpk($order = Criteria::ASC) Order by the ipk column
 * @method RwyPendFormalQuery orderByProdi($order = Criteria::ASC) Order by the prodi column
 * @method RwyPendFormalQuery orderByIdRegPd($order = Criteria::ASC) Order by the id_reg_pd column
 * @method RwyPendFormalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RwyPendFormalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RwyPendFormalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RwyPendFormalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RwyPendFormalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RwyPendFormalQuery groupByRiwayatPendidikanFormalId() Group by the riwayat_pendidikan_formal_id column
 * @method RwyPendFormalQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method RwyPendFormalQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method RwyPendFormalQuery groupByGelarAkademikId() Group by the gelar_akademik_id column
 * @method RwyPendFormalQuery groupByPtkId() Group by the ptk_id column
 * @method RwyPendFormalQuery groupBySatuanPendidikanFormal() Group by the satuan_pendidikan_formal column
 * @method RwyPendFormalQuery groupByFakultas() Group by the fakultas column
 * @method RwyPendFormalQuery groupByKependidikan() Group by the kependidikan column
 * @method RwyPendFormalQuery groupByTahunMasuk() Group by the tahun_masuk column
 * @method RwyPendFormalQuery groupByTahunLulus() Group by the tahun_lulus column
 * @method RwyPendFormalQuery groupByNim() Group by the nim column
 * @method RwyPendFormalQuery groupByStatusKuliah() Group by the status_kuliah column
 * @method RwyPendFormalQuery groupBySemester() Group by the semester column
 * @method RwyPendFormalQuery groupByIpk() Group by the ipk column
 * @method RwyPendFormalQuery groupByProdi() Group by the prodi column
 * @method RwyPendFormalQuery groupByIdRegPd() Group by the id_reg_pd column
 * @method RwyPendFormalQuery groupByCreateDate() Group by the create_date column
 * @method RwyPendFormalQuery groupByLastUpdate() Group by the last_update column
 * @method RwyPendFormalQuery groupBySoftDelete() Group by the soft_delete column
 * @method RwyPendFormalQuery groupByLastSync() Group by the last_sync column
 * @method RwyPendFormalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RwyPendFormalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RwyPendFormalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RwyPendFormalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RwyPendFormalQuery leftJoinGelarAkademik($relationAlias = null) Adds a LEFT JOIN clause to the query using the GelarAkademik relation
 * @method RwyPendFormalQuery rightJoinGelarAkademik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GelarAkademik relation
 * @method RwyPendFormalQuery innerJoinGelarAkademik($relationAlias = null) Adds a INNER JOIN clause to the query using the GelarAkademik relation
 *
 * @method RwyPendFormalQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RwyPendFormalQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RwyPendFormalQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RwyPendFormalQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method RwyPendFormalQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method RwyPendFormalQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method RwyPendFormalQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method RwyPendFormalQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method RwyPendFormalQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method RwyPendFormalQuery leftJoinVldRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyPendFormal relation
 * @method RwyPendFormalQuery rightJoinVldRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyPendFormal relation
 * @method RwyPendFormalQuery innerJoinVldRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyPendFormal relation
 *
 * @method RwyPendFormal findOne(PropelPDO $con = null) Return the first RwyPendFormal matching the query
 * @method RwyPendFormal findOneOrCreate(PropelPDO $con = null) Return the first RwyPendFormal matching the query, or a new RwyPendFormal object populated from the query conditions when no match is found
 *
 * @method RwyPendFormal findOneByBidangStudiId(int $bidang_studi_id) Return the first RwyPendFormal filtered by the bidang_studi_id column
 * @method RwyPendFormal findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first RwyPendFormal filtered by the jenjang_pendidikan_id column
 * @method RwyPendFormal findOneByGelarAkademikId(int $gelar_akademik_id) Return the first RwyPendFormal filtered by the gelar_akademik_id column
 * @method RwyPendFormal findOneByPtkId(string $ptk_id) Return the first RwyPendFormal filtered by the ptk_id column
 * @method RwyPendFormal findOneBySatuanPendidikanFormal(string $satuan_pendidikan_formal) Return the first RwyPendFormal filtered by the satuan_pendidikan_formal column
 * @method RwyPendFormal findOneByFakultas(string $fakultas) Return the first RwyPendFormal filtered by the fakultas column
 * @method RwyPendFormal findOneByKependidikan(string $kependidikan) Return the first RwyPendFormal filtered by the kependidikan column
 * @method RwyPendFormal findOneByTahunMasuk(string $tahun_masuk) Return the first RwyPendFormal filtered by the tahun_masuk column
 * @method RwyPendFormal findOneByTahunLulus(string $tahun_lulus) Return the first RwyPendFormal filtered by the tahun_lulus column
 * @method RwyPendFormal findOneByNim(string $nim) Return the first RwyPendFormal filtered by the nim column
 * @method RwyPendFormal findOneByStatusKuliah(string $status_kuliah) Return the first RwyPendFormal filtered by the status_kuliah column
 * @method RwyPendFormal findOneBySemester(string $semester) Return the first RwyPendFormal filtered by the semester column
 * @method RwyPendFormal findOneByIpk(string $ipk) Return the first RwyPendFormal filtered by the ipk column
 * @method RwyPendFormal findOneByProdi(string $prodi) Return the first RwyPendFormal filtered by the prodi column
 * @method RwyPendFormal findOneByIdRegPd(string $id_reg_pd) Return the first RwyPendFormal filtered by the id_reg_pd column
 * @method RwyPendFormal findOneByCreateDate(string $create_date) Return the first RwyPendFormal filtered by the create_date column
 * @method RwyPendFormal findOneByLastUpdate(string $last_update) Return the first RwyPendFormal filtered by the last_update column
 * @method RwyPendFormal findOneBySoftDelete(string $soft_delete) Return the first RwyPendFormal filtered by the soft_delete column
 * @method RwyPendFormal findOneByLastSync(string $last_sync) Return the first RwyPendFormal filtered by the last_sync column
 * @method RwyPendFormal findOneByUpdaterId(string $updater_id) Return the first RwyPendFormal filtered by the updater_id column
 *
 * @method array findByRiwayatPendidikanFormalId(string $riwayat_pendidikan_formal_id) Return RwyPendFormal objects filtered by the riwayat_pendidikan_formal_id column
 * @method array findByBidangStudiId(int $bidang_studi_id) Return RwyPendFormal objects filtered by the bidang_studi_id column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return RwyPendFormal objects filtered by the jenjang_pendidikan_id column
 * @method array findByGelarAkademikId(int $gelar_akademik_id) Return RwyPendFormal objects filtered by the gelar_akademik_id column
 * @method array findByPtkId(string $ptk_id) Return RwyPendFormal objects filtered by the ptk_id column
 * @method array findBySatuanPendidikanFormal(string $satuan_pendidikan_formal) Return RwyPendFormal objects filtered by the satuan_pendidikan_formal column
 * @method array findByFakultas(string $fakultas) Return RwyPendFormal objects filtered by the fakultas column
 * @method array findByKependidikan(string $kependidikan) Return RwyPendFormal objects filtered by the kependidikan column
 * @method array findByTahunMasuk(string $tahun_masuk) Return RwyPendFormal objects filtered by the tahun_masuk column
 * @method array findByTahunLulus(string $tahun_lulus) Return RwyPendFormal objects filtered by the tahun_lulus column
 * @method array findByNim(string $nim) Return RwyPendFormal objects filtered by the nim column
 * @method array findByStatusKuliah(string $status_kuliah) Return RwyPendFormal objects filtered by the status_kuliah column
 * @method array findBySemester(string $semester) Return RwyPendFormal objects filtered by the semester column
 * @method array findByIpk(string $ipk) Return RwyPendFormal objects filtered by the ipk column
 * @method array findByProdi(string $prodi) Return RwyPendFormal objects filtered by the prodi column
 * @method array findByIdRegPd(string $id_reg_pd) Return RwyPendFormal objects filtered by the id_reg_pd column
 * @method array findByCreateDate(string $create_date) Return RwyPendFormal objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RwyPendFormal objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RwyPendFormal objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RwyPendFormal objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RwyPendFormal objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyPendFormalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRwyPendFormalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RwyPendFormal', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RwyPendFormalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RwyPendFormalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RwyPendFormalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RwyPendFormalQuery) {
            return $criteria;
        }
        $query = new RwyPendFormalQuery();
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
     * @return   RwyPendFormal|RwyPendFormal[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RwyPendFormalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RwyPendFormalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyPendFormal A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRiwayatPendidikanFormalId($key, $con = null)
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
     * @return                 RwyPendFormal A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "riwayat_pendidikan_formal_id", "bidang_studi_id", "jenjang_pendidikan_id", "gelar_akademik_id", "ptk_id", "satuan_pendidikan_formal", "fakultas", "kependidikan", "tahun_masuk", "tahun_lulus", "nim", "status_kuliah", "semester", "ipk", "prodi", "id_reg_pd", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rwy_pend_formal" WHERE "riwayat_pendidikan_formal_id" = :p0';
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
            $obj = new RwyPendFormal();
            $obj->hydrate($row);
            RwyPendFormalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RwyPendFormal|RwyPendFormal[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RwyPendFormal[]|mixed the list of results, formatted by the current formatter
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the riwayat_pendidikan_formal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatPendidikanFormalId('fooValue');   // WHERE riwayat_pendidikan_formal_id = 'fooValue'
     * $query->filterByRiwayatPendidikanFormalId('%fooValue%'); // WHERE riwayat_pendidikan_formal_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatPendidikanFormalId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByRiwayatPendidikanFormalId($riwayatPendidikanFormalId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatPendidikanFormalId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatPendidikanFormalId)) {
                $riwayatPendidikanFormalId = str_replace('*', '%', $riwayatPendidikanFormalId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $riwayatPendidikanFormalId, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanId(1234); // WHERE jenjang_pendidikan_id = 1234
     * $query->filterByJenjangPendidikanId(array(12, 34)); // WHERE jenjang_pendidikan_id IN (12, 34)
     * $query->filterByJenjangPendidikanId(array('min' => 12)); // WHERE jenjang_pendidikan_id >= 12
     * $query->filterByJenjangPendidikanId(array('max' => 12)); // WHERE jenjang_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikan()
     *
     * @param     mixed $jenjangPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
    }

    /**
     * Filter the query on the gelar_akademik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGelarAkademikId(1234); // WHERE gelar_akademik_id = 1234
     * $query->filterByGelarAkademikId(array(12, 34)); // WHERE gelar_akademik_id IN (12, 34)
     * $query->filterByGelarAkademikId(array('min' => 12)); // WHERE gelar_akademik_id >= 12
     * $query->filterByGelarAkademikId(array('max' => 12)); // WHERE gelar_akademik_id <= 12
     * </code>
     *
     * @see       filterByGelarAkademik()
     *
     * @param     mixed $gelarAkademikId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByGelarAkademikId($gelarAkademikId = null, $comparison = null)
    {
        if (is_array($gelarAkademikId)) {
            $useMinMax = false;
            if (isset($gelarAkademikId['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $gelarAkademikId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gelarAkademikId['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $gelarAkademikId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $gelarAkademikId, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyPendFormalPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the satuan_pendidikan_formal column
     *
     * Example usage:
     * <code>
     * $query->filterBySatuanPendidikanFormal('fooValue');   // WHERE satuan_pendidikan_formal = 'fooValue'
     * $query->filterBySatuanPendidikanFormal('%fooValue%'); // WHERE satuan_pendidikan_formal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $satuanPendidikanFormal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterBySatuanPendidikanFormal($satuanPendidikanFormal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($satuanPendidikanFormal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $satuanPendidikanFormal)) {
                $satuanPendidikanFormal = str_replace('*', '%', $satuanPendidikanFormal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::SATUAN_PENDIDIKAN_FORMAL, $satuanPendidikanFormal, $comparison);
    }

    /**
     * Filter the query on the fakultas column
     *
     * Example usage:
     * <code>
     * $query->filterByFakultas('fooValue');   // WHERE fakultas = 'fooValue'
     * $query->filterByFakultas('%fooValue%'); // WHERE fakultas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $fakultas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByFakultas($fakultas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($fakultas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $fakultas)) {
                $fakultas = str_replace('*', '%', $fakultas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::FAKULTAS, $fakultas, $comparison);
    }

    /**
     * Filter the query on the kependidikan column
     *
     * Example usage:
     * <code>
     * $query->filterByKependidikan(1234); // WHERE kependidikan = 1234
     * $query->filterByKependidikan(array(12, 34)); // WHERE kependidikan IN (12, 34)
     * $query->filterByKependidikan(array('min' => 12)); // WHERE kependidikan >= 12
     * $query->filterByKependidikan(array('max' => 12)); // WHERE kependidikan <= 12
     * </code>
     *
     * @param     mixed $kependidikan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByKependidikan($kependidikan = null, $comparison = null)
    {
        if (is_array($kependidikan)) {
            $useMinMax = false;
            if (isset($kependidikan['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::KEPENDIDIKAN, $kependidikan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kependidikan['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::KEPENDIDIKAN, $kependidikan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::KEPENDIDIKAN, $kependidikan, $comparison);
    }

    /**
     * Filter the query on the tahun_masuk column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunMasuk(1234); // WHERE tahun_masuk = 1234
     * $query->filterByTahunMasuk(array(12, 34)); // WHERE tahun_masuk IN (12, 34)
     * $query->filterByTahunMasuk(array('min' => 12)); // WHERE tahun_masuk >= 12
     * $query->filterByTahunMasuk(array('max' => 12)); // WHERE tahun_masuk <= 12
     * </code>
     *
     * @param     mixed $tahunMasuk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByTahunMasuk($tahunMasuk = null, $comparison = null)
    {
        if (is_array($tahunMasuk)) {
            $useMinMax = false;
            if (isset($tahunMasuk['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::TAHUN_MASUK, $tahunMasuk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunMasuk['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::TAHUN_MASUK, $tahunMasuk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::TAHUN_MASUK, $tahunMasuk, $comparison);
    }

    /**
     * Filter the query on the tahun_lulus column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunLulus(1234); // WHERE tahun_lulus = 1234
     * $query->filterByTahunLulus(array(12, 34)); // WHERE tahun_lulus IN (12, 34)
     * $query->filterByTahunLulus(array('min' => 12)); // WHERE tahun_lulus >= 12
     * $query->filterByTahunLulus(array('max' => 12)); // WHERE tahun_lulus <= 12
     * </code>
     *
     * @param     mixed $tahunLulus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByTahunLulus($tahunLulus = null, $comparison = null)
    {
        if (is_array($tahunLulus)) {
            $useMinMax = false;
            if (isset($tahunLulus['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::TAHUN_LULUS, $tahunLulus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunLulus['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::TAHUN_LULUS, $tahunLulus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::TAHUN_LULUS, $tahunLulus, $comparison);
    }

    /**
     * Filter the query on the nim column
     *
     * Example usage:
     * <code>
     * $query->filterByNim('fooValue');   // WHERE nim = 'fooValue'
     * $query->filterByNim('%fooValue%'); // WHERE nim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByNim($nim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nim)) {
                $nim = str_replace('*', '%', $nim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::NIM, $nim, $comparison);
    }

    /**
     * Filter the query on the status_kuliah column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKuliah(1234); // WHERE status_kuliah = 1234
     * $query->filterByStatusKuliah(array(12, 34)); // WHERE status_kuliah IN (12, 34)
     * $query->filterByStatusKuliah(array('min' => 12)); // WHERE status_kuliah >= 12
     * $query->filterByStatusKuliah(array('max' => 12)); // WHERE status_kuliah <= 12
     * </code>
     *
     * @param     mixed $statusKuliah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByStatusKuliah($statusKuliah = null, $comparison = null)
    {
        if (is_array($statusKuliah)) {
            $useMinMax = false;
            if (isset($statusKuliah['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::STATUS_KULIAH, $statusKuliah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKuliah['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::STATUS_KULIAH, $statusKuliah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::STATUS_KULIAH, $statusKuliah, $comparison);
    }

    /**
     * Filter the query on the semester column
     *
     * Example usage:
     * <code>
     * $query->filterBySemester(1234); // WHERE semester = 1234
     * $query->filterBySemester(array(12, 34)); // WHERE semester IN (12, 34)
     * $query->filterBySemester(array('min' => 12)); // WHERE semester >= 12
     * $query->filterBySemester(array('max' => 12)); // WHERE semester <= 12
     * </code>
     *
     * @param     mixed $semester The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterBySemester($semester = null, $comparison = null)
    {
        if (is_array($semester)) {
            $useMinMax = false;
            if (isset($semester['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::SEMESTER, $semester['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semester['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::SEMESTER, $semester['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::SEMESTER, $semester, $comparison);
    }

    /**
     * Filter the query on the ipk column
     *
     * Example usage:
     * <code>
     * $query->filterByIpk(1234); // WHERE ipk = 1234
     * $query->filterByIpk(array(12, 34)); // WHERE ipk IN (12, 34)
     * $query->filterByIpk(array('min' => 12)); // WHERE ipk >= 12
     * $query->filterByIpk(array('max' => 12)); // WHERE ipk <= 12
     * </code>
     *
     * @param     mixed $ipk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByIpk($ipk = null, $comparison = null)
    {
        if (is_array($ipk)) {
            $useMinMax = false;
            if (isset($ipk['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::IPK, $ipk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ipk['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::IPK, $ipk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::IPK, $ipk, $comparison);
    }

    /**
     * Filter the query on the prodi column
     *
     * Example usage:
     * <code>
     * $query->filterByProdi('fooValue');   // WHERE prodi = 'fooValue'
     * $query->filterByProdi('%fooValue%'); // WHERE prodi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prodi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByProdi($prodi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prodi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prodi)) {
                $prodi = str_replace('*', '%', $prodi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::PRODI, $prodi, $comparison);
    }

    /**
     * Filter the query on the id_reg_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRegPd('fooValue');   // WHERE id_reg_pd = 'fooValue'
     * $query->filterByIdRegPd('%fooValue%'); // WHERE id_reg_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRegPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByIdRegPd($idRegPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRegPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRegPd)) {
                $idRegPd = str_replace('*', '%', $idRegPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::ID_REG_PD, $idRegPd, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RwyPendFormalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RwyPendFormalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyPendFormalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyPendFormalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related GelarAkademik object
     *
     * @param   GelarAkademik|PropelObjectCollection $gelarAkademik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGelarAkademik($gelarAkademik, $comparison = null)
    {
        if ($gelarAkademik instanceof GelarAkademik) {
            return $this
                ->addUsingAlias(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $gelarAkademik->getGelarAkademikId(), $comparison);
        } elseif ($gelarAkademik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyPendFormalPeer::GELAR_AKADEMIK_ID, $gelarAkademik->toKeyValue('PrimaryKey', 'GelarAkademikId'), $comparison);
        } else {
            throw new PropelException('filterByGelarAkademik() only accepts arguments of type GelarAkademik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GelarAkademik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function joinGelarAkademik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GelarAkademik');

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
            $this->addJoinObject($join, 'GelarAkademik');
        }

        return $this;
    }

    /**
     * Use the GelarAkademik relation GelarAkademik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GelarAkademikQuery A secondary query class using the current class as primary query
     */
    public function useGelarAkademikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinGelarAkademik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GelarAkademik', '\DataDikdas\Model\GelarAkademikQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RwyPendFormalPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyPendFormalPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
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
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(RwyPendFormalPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyPendFormalPeer::BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
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
     * @return RwyPendFormalQuery The current query, for fluid interface
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
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyPendFormalPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikan() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikan');

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
            $this->addJoinObject($join, 'JenjangPendidikan');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikan relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related VldRwyPendFormal object
     *
     * @param   VldRwyPendFormal|PropelObjectCollection $vldRwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyPendFormalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyPendFormal($vldRwyPendFormal, $comparison = null)
    {
        if ($vldRwyPendFormal instanceof VldRwyPendFormal) {
            return $this
                ->addUsingAlias(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $vldRwyPendFormal->getRiwayatPendidikanFormalId(), $comparison);
        } elseif ($vldRwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyPendFormalQuery()
                ->filterByPrimaryKeys($vldRwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyPendFormal() only accepts arguments of type VldRwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function joinVldRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyPendFormal');

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
            $this->addJoinObject($join, 'VldRwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the VldRwyPendFormal relation VldRwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyPendFormal', '\DataDikdas\Model\VldRwyPendFormalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RwyPendFormal $rwyPendFormal Object to remove from the list of results
     *
     * @return RwyPendFormalQuery The current query, for fluid interface
     */
    public function prune($rwyPendFormal = null)
    {
        if ($rwyPendFormal) {
            $this->addUsingAlias(RwyPendFormalPeer::RIWAYAT_PENDIDIKAN_FORMAL_ID, $rwyPendFormal->getRiwayatPendidikanFormalId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
