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
use DataDikdas\Model\BidangUsaha;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\Penghasilan;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\TracerLulusanPeer;
use DataDikdas\Model\TracerLulusanQuery;

/**
 * Base class that represents a query for the 'tracer_lulusan' table.
 *
 * 
 *
 * @method TracerLulusanQuery orderByIdTracer($order = Criteria::ASC) Order by the id_tracer column
 * @method TracerLulusanQuery orderByPenghasilanId($order = Criteria::ASC) Order by the penghasilan_id column
 * @method TracerLulusanQuery orderByRegistrasiId($order = Criteria::ASC) Order by the registrasi_id column
 * @method TracerLulusanQuery orderByTglEntry($order = Criteria::ASC) Order by the tgl_entry column
 * @method TracerLulusanQuery orderByAktSetelahLulus($order = Criteria::ASC) Order by the akt_setelah_lulus column
 * @method TracerLulusanQuery orderByNmInstPerusahaan($order = Criteria::ASC) Order by the nm_inst_perusahaan column
 * @method TracerLulusanQuery orderByNmSp($order = Criteria::ASC) Order by the nm_sp column
 * @method TracerLulusanQuery orderByNmProdi($order = Criteria::ASC) Order by the nm_prodi column
 * @method TracerLulusanQuery orderByKetTracer($order = Criteria::ASC) Order by the ket_tracer column
 * @method TracerLulusanQuery orderByPekerjaanId($order = Criteria::ASC) Order by the pekerjaan_id column
 * @method TracerLulusanQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method TracerLulusanQuery orderByBidangUsahaId($order = Criteria::ASC) Order by the bidang_usaha_id column
 * @method TracerLulusanQuery orderByIdProdi($order = Criteria::ASC) Order by the id_prodi column
 * @method TracerLulusanQuery orderByStatTracer($order = Criteria::ASC) Order by the stat_tracer column
 * @method TracerLulusanQuery orderByIkatanKerja($order = Criteria::ASC) Order by the ikatan_kerja column
 * @method TracerLulusanQuery orderByASesuaiKompetensi($order = Criteria::ASC) Order by the a_sesuai_kompetensi column
 * @method TracerLulusanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TracerLulusanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TracerLulusanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method TracerLulusanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method TracerLulusanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method TracerLulusanQuery groupByIdTracer() Group by the id_tracer column
 * @method TracerLulusanQuery groupByPenghasilanId() Group by the penghasilan_id column
 * @method TracerLulusanQuery groupByRegistrasiId() Group by the registrasi_id column
 * @method TracerLulusanQuery groupByTglEntry() Group by the tgl_entry column
 * @method TracerLulusanQuery groupByAktSetelahLulus() Group by the akt_setelah_lulus column
 * @method TracerLulusanQuery groupByNmInstPerusahaan() Group by the nm_inst_perusahaan column
 * @method TracerLulusanQuery groupByNmSp() Group by the nm_sp column
 * @method TracerLulusanQuery groupByNmProdi() Group by the nm_prodi column
 * @method TracerLulusanQuery groupByKetTracer() Group by the ket_tracer column
 * @method TracerLulusanQuery groupByPekerjaanId() Group by the pekerjaan_id column
 * @method TracerLulusanQuery groupByDudiId() Group by the dudi_id column
 * @method TracerLulusanQuery groupByBidangUsahaId() Group by the bidang_usaha_id column
 * @method TracerLulusanQuery groupByIdProdi() Group by the id_prodi column
 * @method TracerLulusanQuery groupByStatTracer() Group by the stat_tracer column
 * @method TracerLulusanQuery groupByIkatanKerja() Group by the ikatan_kerja column
 * @method TracerLulusanQuery groupByASesuaiKompetensi() Group by the a_sesuai_kompetensi column
 * @method TracerLulusanQuery groupByCreateDate() Group by the create_date column
 * @method TracerLulusanQuery groupByLastUpdate() Group by the last_update column
 * @method TracerLulusanQuery groupBySoftDelete() Group by the soft_delete column
 * @method TracerLulusanQuery groupByLastSync() Group by the last_sync column
 * @method TracerLulusanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method TracerLulusanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TracerLulusanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TracerLulusanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TracerLulusanQuery leftJoinPenghasilan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Penghasilan relation
 * @method TracerLulusanQuery rightJoinPenghasilan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Penghasilan relation
 * @method TracerLulusanQuery innerJoinPenghasilan($relationAlias = null) Adds a INNER JOIN clause to the query using the Penghasilan relation
 *
 * @method TracerLulusanQuery leftJoinBidangUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangUsaha relation
 * @method TracerLulusanQuery rightJoinBidangUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangUsaha relation
 * @method TracerLulusanQuery innerJoinBidangUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangUsaha relation
 *
 * @method TracerLulusanQuery leftJoinDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Dudi relation
 * @method TracerLulusanQuery rightJoinDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Dudi relation
 * @method TracerLulusanQuery innerJoinDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the Dudi relation
 *
 * @method TracerLulusanQuery leftJoinPekerjaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pekerjaan relation
 * @method TracerLulusanQuery rightJoinPekerjaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pekerjaan relation
 * @method TracerLulusanQuery innerJoinPekerjaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Pekerjaan relation
 *
 * @method TracerLulusanQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method TracerLulusanQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method TracerLulusanQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method TracerLulusan findOne(PropelPDO $con = null) Return the first TracerLulusan matching the query
 * @method TracerLulusan findOneOrCreate(PropelPDO $con = null) Return the first TracerLulusan matching the query, or a new TracerLulusan object populated from the query conditions when no match is found
 *
 * @method TracerLulusan findOneByPenghasilanId(int $penghasilan_id) Return the first TracerLulusan filtered by the penghasilan_id column
 * @method TracerLulusan findOneByRegistrasiId(string $registrasi_id) Return the first TracerLulusan filtered by the registrasi_id column
 * @method TracerLulusan findOneByTglEntry(string $tgl_entry) Return the first TracerLulusan filtered by the tgl_entry column
 * @method TracerLulusan findOneByAktSetelahLulus(string $akt_setelah_lulus) Return the first TracerLulusan filtered by the akt_setelah_lulus column
 * @method TracerLulusan findOneByNmInstPerusahaan(string $nm_inst_perusahaan) Return the first TracerLulusan filtered by the nm_inst_perusahaan column
 * @method TracerLulusan findOneByNmSp(string $nm_sp) Return the first TracerLulusan filtered by the nm_sp column
 * @method TracerLulusan findOneByNmProdi(string $nm_prodi) Return the first TracerLulusan filtered by the nm_prodi column
 * @method TracerLulusan findOneByKetTracer(string $ket_tracer) Return the first TracerLulusan filtered by the ket_tracer column
 * @method TracerLulusan findOneByPekerjaanId(int $pekerjaan_id) Return the first TracerLulusan filtered by the pekerjaan_id column
 * @method TracerLulusan findOneByDudiId(string $dudi_id) Return the first TracerLulusan filtered by the dudi_id column
 * @method TracerLulusan findOneByBidangUsahaId(string $bidang_usaha_id) Return the first TracerLulusan filtered by the bidang_usaha_id column
 * @method TracerLulusan findOneByIdProdi(string $id_prodi) Return the first TracerLulusan filtered by the id_prodi column
 * @method TracerLulusan findOneByStatTracer(string $stat_tracer) Return the first TracerLulusan filtered by the stat_tracer column
 * @method TracerLulusan findOneByIkatanKerja(string $ikatan_kerja) Return the first TracerLulusan filtered by the ikatan_kerja column
 * @method TracerLulusan findOneByASesuaiKompetensi(string $a_sesuai_kompetensi) Return the first TracerLulusan filtered by the a_sesuai_kompetensi column
 * @method TracerLulusan findOneByCreateDate(string $create_date) Return the first TracerLulusan filtered by the create_date column
 * @method TracerLulusan findOneByLastUpdate(string $last_update) Return the first TracerLulusan filtered by the last_update column
 * @method TracerLulusan findOneBySoftDelete(string $soft_delete) Return the first TracerLulusan filtered by the soft_delete column
 * @method TracerLulusan findOneByLastSync(string $last_sync) Return the first TracerLulusan filtered by the last_sync column
 * @method TracerLulusan findOneByUpdaterId(string $updater_id) Return the first TracerLulusan filtered by the updater_id column
 *
 * @method array findByIdTracer(string $id_tracer) Return TracerLulusan objects filtered by the id_tracer column
 * @method array findByPenghasilanId(int $penghasilan_id) Return TracerLulusan objects filtered by the penghasilan_id column
 * @method array findByRegistrasiId(string $registrasi_id) Return TracerLulusan objects filtered by the registrasi_id column
 * @method array findByTglEntry(string $tgl_entry) Return TracerLulusan objects filtered by the tgl_entry column
 * @method array findByAktSetelahLulus(string $akt_setelah_lulus) Return TracerLulusan objects filtered by the akt_setelah_lulus column
 * @method array findByNmInstPerusahaan(string $nm_inst_perusahaan) Return TracerLulusan objects filtered by the nm_inst_perusahaan column
 * @method array findByNmSp(string $nm_sp) Return TracerLulusan objects filtered by the nm_sp column
 * @method array findByNmProdi(string $nm_prodi) Return TracerLulusan objects filtered by the nm_prodi column
 * @method array findByKetTracer(string $ket_tracer) Return TracerLulusan objects filtered by the ket_tracer column
 * @method array findByPekerjaanId(int $pekerjaan_id) Return TracerLulusan objects filtered by the pekerjaan_id column
 * @method array findByDudiId(string $dudi_id) Return TracerLulusan objects filtered by the dudi_id column
 * @method array findByBidangUsahaId(string $bidang_usaha_id) Return TracerLulusan objects filtered by the bidang_usaha_id column
 * @method array findByIdProdi(string $id_prodi) Return TracerLulusan objects filtered by the id_prodi column
 * @method array findByStatTracer(string $stat_tracer) Return TracerLulusan objects filtered by the stat_tracer column
 * @method array findByIkatanKerja(string $ikatan_kerja) Return TracerLulusan objects filtered by the ikatan_kerja column
 * @method array findByASesuaiKompetensi(string $a_sesuai_kompetensi) Return TracerLulusan objects filtered by the a_sesuai_kompetensi column
 * @method array findByCreateDate(string $create_date) Return TracerLulusan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TracerLulusan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return TracerLulusan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return TracerLulusan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return TracerLulusan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTracerLulusanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTracerLulusanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TracerLulusan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TracerLulusanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TracerLulusanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TracerLulusanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TracerLulusanQuery) {
            return $criteria;
        }
        $query = new TracerLulusanQuery();
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
     * @return   TracerLulusan|TracerLulusan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TracerLulusanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TracerLulusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TracerLulusan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdTracer($key, $con = null)
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
     * @return                 TracerLulusan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_tracer", "penghasilan_id", "registrasi_id", "tgl_entry", "akt_setelah_lulus", "nm_inst_perusahaan", "nm_sp", "nm_prodi", "ket_tracer", "pekerjaan_id", "dudi_id", "bidang_usaha_id", "id_prodi", "stat_tracer", "ikatan_kerja", "a_sesuai_kompetensi", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "tracer_lulusan" WHERE "id_tracer" = :p0';
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
            $obj = new TracerLulusan();
            $obj->hydrate($row);
            TracerLulusanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TracerLulusan|TracerLulusan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TracerLulusan[]|mixed the list of results, formatted by the current formatter
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
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TracerLulusanPeer::ID_TRACER, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TracerLulusanPeer::ID_TRACER, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_tracer column
     *
     * Example usage:
     * <code>
     * $query->filterByIdTracer('fooValue');   // WHERE id_tracer = 'fooValue'
     * $query->filterByIdTracer('%fooValue%'); // WHERE id_tracer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idTracer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByIdTracer($idTracer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idTracer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idTracer)) {
                $idTracer = str_replace('*', '%', $idTracer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::ID_TRACER, $idTracer, $comparison);
    }

    /**
     * Filter the query on the penghasilan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghasilanId(1234); // WHERE penghasilan_id = 1234
     * $query->filterByPenghasilanId(array(12, 34)); // WHERE penghasilan_id IN (12, 34)
     * $query->filterByPenghasilanId(array('min' => 12)); // WHERE penghasilan_id >= 12
     * $query->filterByPenghasilanId(array('max' => 12)); // WHERE penghasilan_id <= 12
     * </code>
     *
     * @see       filterByPenghasilan()
     *
     * @param     mixed $penghasilanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByPenghasilanId($penghasilanId = null, $comparison = null)
    {
        if (is_array($penghasilanId)) {
            $useMinMax = false;
            if (isset($penghasilanId['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::PENGHASILAN_ID, $penghasilanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penghasilanId['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::PENGHASILAN_ID, $penghasilanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::PENGHASILAN_ID, $penghasilanId, $comparison);
    }

    /**
     * Filter the query on the registrasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistrasiId('fooValue');   // WHERE registrasi_id = 'fooValue'
     * $query->filterByRegistrasiId('%fooValue%'); // WHERE registrasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registrasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByRegistrasiId($registrasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registrasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registrasiId)) {
                $registrasiId = str_replace('*', '%', $registrasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::REGISTRASI_ID, $registrasiId, $comparison);
    }

    /**
     * Filter the query on the tgl_entry column
     *
     * Example usage:
     * <code>
     * $query->filterByTglEntry('2011-03-14'); // WHERE tgl_entry = '2011-03-14'
     * $query->filterByTglEntry('now'); // WHERE tgl_entry = '2011-03-14'
     * $query->filterByTglEntry(array('max' => 'yesterday')); // WHERE tgl_entry > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglEntry The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByTglEntry($tglEntry = null, $comparison = null)
    {
        if (is_array($tglEntry)) {
            $useMinMax = false;
            if (isset($tglEntry['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::TGL_ENTRY, $tglEntry['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglEntry['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::TGL_ENTRY, $tglEntry['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::TGL_ENTRY, $tglEntry, $comparison);
    }

    /**
     * Filter the query on the akt_setelah_lulus column
     *
     * Example usage:
     * <code>
     * $query->filterByAktSetelahLulus('fooValue');   // WHERE akt_setelah_lulus = 'fooValue'
     * $query->filterByAktSetelahLulus('%fooValue%'); // WHERE akt_setelah_lulus LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aktSetelahLulus The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByAktSetelahLulus($aktSetelahLulus = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aktSetelahLulus)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $aktSetelahLulus)) {
                $aktSetelahLulus = str_replace('*', '%', $aktSetelahLulus);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::AKT_SETELAH_LULUS, $aktSetelahLulus, $comparison);
    }

    /**
     * Filter the query on the nm_inst_perusahaan column
     *
     * Example usage:
     * <code>
     * $query->filterByNmInstPerusahaan('fooValue');   // WHERE nm_inst_perusahaan = 'fooValue'
     * $query->filterByNmInstPerusahaan('%fooValue%'); // WHERE nm_inst_perusahaan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmInstPerusahaan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByNmInstPerusahaan($nmInstPerusahaan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmInstPerusahaan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmInstPerusahaan)) {
                $nmInstPerusahaan = str_replace('*', '%', $nmInstPerusahaan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::NM_INST_PERUSAHAAN, $nmInstPerusahaan, $comparison);
    }

    /**
     * Filter the query on the nm_sp column
     *
     * Example usage:
     * <code>
     * $query->filterByNmSp('fooValue');   // WHERE nm_sp = 'fooValue'
     * $query->filterByNmSp('%fooValue%'); // WHERE nm_sp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmSp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByNmSp($nmSp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmSp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmSp)) {
                $nmSp = str_replace('*', '%', $nmSp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::NM_SP, $nmSp, $comparison);
    }

    /**
     * Filter the query on the nm_prodi column
     *
     * Example usage:
     * <code>
     * $query->filterByNmProdi('fooValue');   // WHERE nm_prodi = 'fooValue'
     * $query->filterByNmProdi('%fooValue%'); // WHERE nm_prodi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmProdi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByNmProdi($nmProdi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmProdi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmProdi)) {
                $nmProdi = str_replace('*', '%', $nmProdi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::NM_PRODI, $nmProdi, $comparison);
    }

    /**
     * Filter the query on the ket_tracer column
     *
     * Example usage:
     * <code>
     * $query->filterByKetTracer('fooValue');   // WHERE ket_tracer = 'fooValue'
     * $query->filterByKetTracer('%fooValue%'); // WHERE ket_tracer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketTracer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByKetTracer($ketTracer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketTracer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketTracer)) {
                $ketTracer = str_replace('*', '%', $ketTracer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::KET_TRACER, $ketTracer, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanId(1234); // WHERE pekerjaan_id = 1234
     * $query->filterByPekerjaanId(array(12, 34)); // WHERE pekerjaan_id IN (12, 34)
     * $query->filterByPekerjaanId(array('min' => 12)); // WHERE pekerjaan_id >= 12
     * $query->filterByPekerjaanId(array('max' => 12)); // WHERE pekerjaan_id <= 12
     * </code>
     *
     * @see       filterByPekerjaan()
     *
     * @param     mixed $pekerjaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByPekerjaanId($pekerjaanId = null, $comparison = null)
    {
        if (is_array($pekerjaanId)) {
            $useMinMax = false;
            if (isset($pekerjaanId['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::PEKERJAAN_ID, $pekerjaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanId['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::PEKERJAAN_ID, $pekerjaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::PEKERJAAN_ID, $pekerjaanId, $comparison);
    }

    /**
     * Filter the query on the dudi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDudiId('fooValue');   // WHERE dudi_id = 'fooValue'
     * $query->filterByDudiId('%fooValue%'); // WHERE dudi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $dudiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByDudiId($dudiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($dudiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $dudiId)) {
                $dudiId = str_replace('*', '%', $dudiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::DUDI_ID, $dudiId, $comparison);
    }

    /**
     * Filter the query on the bidang_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangUsahaId('fooValue');   // WHERE bidang_usaha_id = 'fooValue'
     * $query->filterByBidangUsahaId('%fooValue%'); // WHERE bidang_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bidangUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByBidangUsahaId($bidangUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bidangUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bidangUsahaId)) {
                $bidangUsahaId = str_replace('*', '%', $bidangUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::BIDANG_USAHA_ID, $bidangUsahaId, $comparison);
    }

    /**
     * Filter the query on the id_prodi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdProdi('fooValue');   // WHERE id_prodi = 'fooValue'
     * $query->filterByIdProdi('%fooValue%'); // WHERE id_prodi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idProdi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByIdProdi($idProdi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idProdi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idProdi)) {
                $idProdi = str_replace('*', '%', $idProdi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::ID_PRODI, $idProdi, $comparison);
    }

    /**
     * Filter the query on the stat_tracer column
     *
     * Example usage:
     * <code>
     * $query->filterByStatTracer('fooValue');   // WHERE stat_tracer = 'fooValue'
     * $query->filterByStatTracer('%fooValue%'); // WHERE stat_tracer LIKE '%fooValue%'
     * </code>
     *
     * @param     string $statTracer The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByStatTracer($statTracer = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($statTracer)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $statTracer)) {
                $statTracer = str_replace('*', '%', $statTracer);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::STAT_TRACER, $statTracer, $comparison);
    }

    /**
     * Filter the query on the ikatan_kerja column
     *
     * Example usage:
     * <code>
     * $query->filterByIkatanKerja('fooValue');   // WHERE ikatan_kerja = 'fooValue'
     * $query->filterByIkatanKerja('%fooValue%'); // WHERE ikatan_kerja LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ikatanKerja The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByIkatanKerja($ikatanKerja = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ikatanKerja)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ikatanKerja)) {
                $ikatanKerja = str_replace('*', '%', $ikatanKerja);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::IKATAN_KERJA, $ikatanKerja, $comparison);
    }

    /**
     * Filter the query on the a_sesuai_kompetensi column
     *
     * Example usage:
     * <code>
     * $query->filterByASesuaiKompetensi(1234); // WHERE a_sesuai_kompetensi = 1234
     * $query->filterByASesuaiKompetensi(array(12, 34)); // WHERE a_sesuai_kompetensi IN (12, 34)
     * $query->filterByASesuaiKompetensi(array('min' => 12)); // WHERE a_sesuai_kompetensi >= 12
     * $query->filterByASesuaiKompetensi(array('max' => 12)); // WHERE a_sesuai_kompetensi <= 12
     * </code>
     *
     * @param     mixed $aSesuaiKompetensi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByASesuaiKompetensi($aSesuaiKompetensi = null, $comparison = null)
    {
        if (is_array($aSesuaiKompetensi)) {
            $useMinMax = false;
            if (isset($aSesuaiKompetensi['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::A_SESUAI_KOMPETENSI, $aSesuaiKompetensi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSesuaiKompetensi['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::A_SESUAI_KOMPETENSI, $aSesuaiKompetensi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::A_SESUAI_KOMPETENSI, $aSesuaiKompetensi, $comparison);
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
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TracerLulusanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TracerLulusanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TracerLulusanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return TracerLulusanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TracerLulusanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Penghasilan object
     *
     * @param   Penghasilan|PropelObjectCollection $penghasilan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TracerLulusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghasilan($penghasilan, $comparison = null)
    {
        if ($penghasilan instanceof Penghasilan) {
            return $this
                ->addUsingAlias(TracerLulusanPeer::PENGHASILAN_ID, $penghasilan->getPenghasilanId(), $comparison);
        } elseif ($penghasilan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TracerLulusanPeer::PENGHASILAN_ID, $penghasilan->toKeyValue('PrimaryKey', 'PenghasilanId'), $comparison);
        } else {
            throw new PropelException('filterByPenghasilan() only accepts arguments of type Penghasilan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Penghasilan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function joinPenghasilan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Penghasilan');

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
            $this->addJoinObject($join, 'Penghasilan');
        }

        return $this;
    }

    /**
     * Use the Penghasilan relation Penghasilan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghasilanQuery A secondary query class using the current class as primary query
     */
    public function usePenghasilanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPenghasilan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Penghasilan', '\DataDikdas\Model\PenghasilanQuery');
    }

    /**
     * Filter the query by a related BidangUsaha object
     *
     * @param   BidangUsaha|PropelObjectCollection $bidangUsaha The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TracerLulusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangUsaha($bidangUsaha, $comparison = null)
    {
        if ($bidangUsaha instanceof BidangUsaha) {
            return $this
                ->addUsingAlias(TracerLulusanPeer::BIDANG_USAHA_ID, $bidangUsaha->getBidangUsahaId(), $comparison);
        } elseif ($bidangUsaha instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TracerLulusanPeer::BIDANG_USAHA_ID, $bidangUsaha->toKeyValue('PrimaryKey', 'BidangUsahaId'), $comparison);
        } else {
            throw new PropelException('filterByBidangUsaha() only accepts arguments of type BidangUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function joinBidangUsaha($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangUsaha');

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
            $this->addJoinObject($join, 'BidangUsaha');
        }

        return $this;
    }

    /**
     * Use the BidangUsaha relation BidangUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangUsahaQuery A secondary query class using the current class as primary query
     */
    public function useBidangUsahaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBidangUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangUsaha', '\DataDikdas\Model\BidangUsahaQuery');
    }

    /**
     * Filter the query by a related Dudi object
     *
     * @param   Dudi|PropelObjectCollection $dudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TracerLulusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDudi($dudi, $comparison = null)
    {
        if ($dudi instanceof Dudi) {
            return $this
                ->addUsingAlias(TracerLulusanPeer::DUDI_ID, $dudi->getDudiId(), $comparison);
        } elseif ($dudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TracerLulusanPeer::DUDI_ID, $dudi->toKeyValue('PrimaryKey', 'DudiId'), $comparison);
        } else {
            throw new PropelException('filterByDudi() only accepts arguments of type Dudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Dudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function joinDudi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Dudi');

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
            $this->addJoinObject($join, 'Dudi');
        }

        return $this;
    }

    /**
     * Use the Dudi relation Dudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DudiQuery A secondary query class using the current class as primary query
     */
    public function useDudiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Dudi', '\DataDikdas\Model\DudiQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TracerLulusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaan($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(TracerLulusanPeer::PEKERJAAN_ID, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TracerLulusanPeer::PEKERJAAN_ID, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaan() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pekerjaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function joinPekerjaan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pekerjaan');

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
            $this->addJoinObject($join, 'Pekerjaan');
        }

        return $this;
    }

    /**
     * Use the Pekerjaan relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPekerjaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pekerjaan', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TracerLulusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(TracerLulusanPeer::REGISTRASI_ID, $registrasiPesertaDidik->getRegistrasiId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TracerLulusanPeer::REGISTRASI_ID, $registrasiPesertaDidik->toKeyValue('PrimaryKey', 'RegistrasiId'), $comparison);
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TracerLulusan $tracerLulusan Object to remove from the list of results
     *
     * @return TracerLulusanQuery The current query, for fluid interface
     */
    public function prune($tracerLulusan = null)
    {
        if ($tracerLulusan) {
            $this->addUsingAlias(TracerLulusanPeer::ID_TRACER, $tracerLulusan->getIdTracer(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
