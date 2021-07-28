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
use DataDikdas\Model\AktivitasKepanitiaan;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\BangunanLongitudinal;
use DataDikdas\Model\BatasWaktuRapor;
use DataDikdas\Model\BukuLongitudinal;
use DataDikdas\Model\JurSpLong;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RuangLongitudinal;
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\Semester;
use DataDikdas\Model\SemesterPeer;
use DataDikdas\Model\SemesterQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\Tunjangan;

/**
 * Base class that represents a query for the 'ref.semester' table.
 *
 * 
 *
 * @method SemesterQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method SemesterQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method SemesterQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method SemesterQuery orderBySemester($order = Criteria::ASC) Order by the semester column
 * @method SemesterQuery orderByPeriodeAktif($order = Criteria::ASC) Order by the periode_aktif column
 * @method SemesterQuery orderByTanggalMulai($order = Criteria::ASC) Order by the tanggal_mulai column
 * @method SemesterQuery orderByTanggalSelesai($order = Criteria::ASC) Order by the tanggal_selesai column
 * @method SemesterQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SemesterQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SemesterQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method SemesterQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method SemesterQuery groupBySemesterId() Group by the semester_id column
 * @method SemesterQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method SemesterQuery groupByNama() Group by the nama column
 * @method SemesterQuery groupBySemester() Group by the semester column
 * @method SemesterQuery groupByPeriodeAktif() Group by the periode_aktif column
 * @method SemesterQuery groupByTanggalMulai() Group by the tanggal_mulai column
 * @method SemesterQuery groupByTanggalSelesai() Group by the tanggal_selesai column
 * @method SemesterQuery groupByCreateDate() Group by the create_date column
 * @method SemesterQuery groupByLastUpdate() Group by the last_update column
 * @method SemesterQuery groupByExpiredDate() Group by the expired_date column
 * @method SemesterQuery groupByLastSync() Group by the last_sync column
 *
 * @method SemesterQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SemesterQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SemesterQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SemesterQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method SemesterQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method SemesterQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method SemesterQuery leftJoinAktivitasKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method SemesterQuery rightJoinAktivitasKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method SemesterQuery innerJoinAktivitasKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the AktivitasKepanitiaan relation
 *
 * @method SemesterQuery leftJoinAlatLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlatLongitudinal relation
 * @method SemesterQuery rightJoinAlatLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlatLongitudinal relation
 * @method SemesterQuery innerJoinAlatLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the AlatLongitudinal relation
 *
 * @method SemesterQuery leftJoinBangunanLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the BangunanLongitudinal relation
 * @method SemesterQuery rightJoinBangunanLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BangunanLongitudinal relation
 * @method SemesterQuery innerJoinBangunanLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the BangunanLongitudinal relation
 *
 * @method SemesterQuery leftJoinBatasWaktuRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the BatasWaktuRapor relation
 * @method SemesterQuery rightJoinBatasWaktuRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BatasWaktuRapor relation
 * @method SemesterQuery innerJoinBatasWaktuRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the BatasWaktuRapor relation
 *
 * @method SemesterQuery leftJoinBukuLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the BukuLongitudinal relation
 * @method SemesterQuery rightJoinBukuLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BukuLongitudinal relation
 * @method SemesterQuery innerJoinBukuLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the BukuLongitudinal relation
 *
 * @method SemesterQuery leftJoinJurSpLong($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurSpLong relation
 * @method SemesterQuery rightJoinJurSpLong($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurSpLong relation
 * @method SemesterQuery innerJoinJurSpLong($relationAlias = null) Adds a INNER JOIN clause to the query using the JurSpLong relation
 *
 * @method SemesterQuery leftJoinPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pembelajaran relation
 * @method SemesterQuery rightJoinPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pembelajaran relation
 * @method SemesterQuery innerJoinPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the Pembelajaran relation
 *
 * @method SemesterQuery leftJoinPesertaDidikLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikLongitudinal relation
 * @method SemesterQuery rightJoinPesertaDidikLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikLongitudinal relation
 * @method SemesterQuery innerJoinPesertaDidikLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikLongitudinal relation
 *
 * @method SemesterQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method SemesterQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method SemesterQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method SemesterQuery leftJoinRuangLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RuangLongitudinal relation
 * @method SemesterQuery rightJoinRuangLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RuangLongitudinal relation
 * @method SemesterQuery innerJoinRuangLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the RuangLongitudinal relation
 *
 * @method SemesterQuery leftJoinSanitasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sanitasi relation
 * @method SemesterQuery rightJoinSanitasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sanitasi relation
 * @method SemesterQuery innerJoinSanitasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Sanitasi relation
 *
 * @method SemesterQuery leftJoinSekolahLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahLongitudinal relation
 * @method SemesterQuery rightJoinSekolahLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahLongitudinal relation
 * @method SemesterQuery innerJoinSekolahLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahLongitudinal relation
 *
 * @method SemesterQuery leftJoinTunjangan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tunjangan relation
 * @method SemesterQuery rightJoinTunjangan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tunjangan relation
 * @method SemesterQuery innerJoinTunjangan($relationAlias = null) Adds a INNER JOIN clause to the query using the Tunjangan relation
 *
 * @method Semester findOne(PropelPDO $con = null) Return the first Semester matching the query
 * @method Semester findOneOrCreate(PropelPDO $con = null) Return the first Semester matching the query, or a new Semester object populated from the query conditions when no match is found
 *
 * @method Semester findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first Semester filtered by the tahun_ajaran_id column
 * @method Semester findOneByNama(string $nama) Return the first Semester filtered by the nama column
 * @method Semester findOneBySemester(string $semester) Return the first Semester filtered by the semester column
 * @method Semester findOneByPeriodeAktif(string $periode_aktif) Return the first Semester filtered by the periode_aktif column
 * @method Semester findOneByTanggalMulai(string $tanggal_mulai) Return the first Semester filtered by the tanggal_mulai column
 * @method Semester findOneByTanggalSelesai(string $tanggal_selesai) Return the first Semester filtered by the tanggal_selesai column
 * @method Semester findOneByCreateDate(string $create_date) Return the first Semester filtered by the create_date column
 * @method Semester findOneByLastUpdate(string $last_update) Return the first Semester filtered by the last_update column
 * @method Semester findOneByExpiredDate(string $expired_date) Return the first Semester filtered by the expired_date column
 * @method Semester findOneByLastSync(string $last_sync) Return the first Semester filtered by the last_sync column
 *
 * @method array findBySemesterId(string $semester_id) Return Semester objects filtered by the semester_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return Semester objects filtered by the tahun_ajaran_id column
 * @method array findByNama(string $nama) Return Semester objects filtered by the nama column
 * @method array findBySemester(string $semester) Return Semester objects filtered by the semester column
 * @method array findByPeriodeAktif(string $periode_aktif) Return Semester objects filtered by the periode_aktif column
 * @method array findByTanggalMulai(string $tanggal_mulai) Return Semester objects filtered by the tanggal_mulai column
 * @method array findByTanggalSelesai(string $tanggal_selesai) Return Semester objects filtered by the tanggal_selesai column
 * @method array findByCreateDate(string $create_date) Return Semester objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Semester objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Semester objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Semester objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSemesterQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSemesterQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Semester', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SemesterQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SemesterQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SemesterQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SemesterQuery) {
            return $criteria;
        }
        $query = new SemesterQuery();
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
     * @return   Semester|Semester[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SemesterPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SemesterPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Semester A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySemesterId($key, $con = null)
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
     * @return                 Semester A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "semester_id", "tahun_ajaran_id", "nama", "semester", "periode_aktif", "tanggal_mulai", "tanggal_selesai", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."semester" WHERE "semester_id" = :p0';
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
            $obj = new Semester();
            $obj->hydrate($row);
            SemesterPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Semester|Semester[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Semester[]|mixed the list of results, formatted by the current formatter
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SemesterPeer::SEMESTER_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SemesterPeer::SEMESTER_ID, $keys, Criteria::IN);
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
     * @return SemesterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SemesterPeer::SEMESTER_ID, $semesterId, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(SemesterPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(SemesterPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SemesterPeer::NAMA, $nama, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterBySemester($semester = null, $comparison = null)
    {
        if (is_array($semester)) {
            $useMinMax = false;
            if (isset($semester['min'])) {
                $this->addUsingAlias(SemesterPeer::SEMESTER, $semester['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($semester['max'])) {
                $this->addUsingAlias(SemesterPeer::SEMESTER, $semester['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::SEMESTER, $semester, $comparison);
    }

    /**
     * Filter the query on the periode_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriodeAktif(1234); // WHERE periode_aktif = 1234
     * $query->filterByPeriodeAktif(array(12, 34)); // WHERE periode_aktif IN (12, 34)
     * $query->filterByPeriodeAktif(array('min' => 12)); // WHERE periode_aktif >= 12
     * $query->filterByPeriodeAktif(array('max' => 12)); // WHERE periode_aktif <= 12
     * </code>
     *
     * @param     mixed $periodeAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByPeriodeAktif($periodeAktif = null, $comparison = null)
    {
        if (is_array($periodeAktif)) {
            $useMinMax = false;
            if (isset($periodeAktif['min'])) {
                $this->addUsingAlias(SemesterPeer::PERIODE_AKTIF, $periodeAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($periodeAktif['max'])) {
                $this->addUsingAlias(SemesterPeer::PERIODE_AKTIF, $periodeAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::PERIODE_AKTIF, $periodeAktif, $comparison);
    }

    /**
     * Filter the query on the tanggal_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalMulai('2011-03-14'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai('now'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai(array('max' => 'yesterday')); // WHERE tanggal_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByTanggalMulai($tanggalMulai = null, $comparison = null)
    {
        if (is_array($tanggalMulai)) {
            $useMinMax = false;
            if (isset($tanggalMulai['min'])) {
                $this->addUsingAlias(SemesterPeer::TANGGAL_MULAI, $tanggalMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalMulai['max'])) {
                $this->addUsingAlias(SemesterPeer::TANGGAL_MULAI, $tanggalMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::TANGGAL_MULAI, $tanggalMulai, $comparison);
    }

    /**
     * Filter the query on the tanggal_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSelesai('2011-03-14'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai('now'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai(array('max' => 'yesterday')); // WHERE tanggal_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByTanggalSelesai($tanggalSelesai = null, $comparison = null)
    {
        if (is_array($tanggalSelesai)) {
            $useMinMax = false;
            if (isset($tanggalSelesai['min'])) {
                $this->addUsingAlias(SemesterPeer::TANGGAL_SELESAI, $tanggalSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSelesai['max'])) {
                $this->addUsingAlias(SemesterPeer::TANGGAL_SELESAI, $tanggalSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::TANGGAL_SELESAI, $tanggalSelesai, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SemesterPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SemesterPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SemesterPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SemesterPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(SemesterPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(SemesterPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SemesterPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SemesterPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SemesterPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(SemesterPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SemesterPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return SemesterQuery The current query, for fluid interface
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
     * Filter the query by a related AktivitasKepanitiaan object
     *
     * @param   AktivitasKepanitiaan|PropelObjectCollection $aktivitasKepanitiaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktivitasKepanitiaan($aktivitasKepanitiaan, $comparison = null)
    {
        if ($aktivitasKepanitiaan instanceof AktivitasKepanitiaan) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $aktivitasKepanitiaan->getSemesterId(), $comparison);
        } elseif ($aktivitasKepanitiaan instanceof PropelObjectCollection) {
            return $this
                ->useAktivitasKepanitiaanQuery()
                ->filterByPrimaryKeys($aktivitasKepanitiaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAktivitasKepanitiaan() only accepts arguments of type AktivitasKepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktivitasKepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinAktivitasKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktivitasKepanitiaan');

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
            $this->addJoinObject($join, 'AktivitasKepanitiaan');
        }

        return $this;
    }

    /**
     * Use the AktivitasKepanitiaan relation AktivitasKepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktivitasKepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useAktivitasKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktivitasKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktivitasKepanitiaan', '\DataDikdas\Model\AktivitasKepanitiaanQuery');
    }

    /**
     * Filter the query by a related AlatLongitudinal object
     *
     * @param   AlatLongitudinal|PropelObjectCollection $alatLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlatLongitudinal($alatLongitudinal, $comparison = null)
    {
        if ($alatLongitudinal instanceof AlatLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $alatLongitudinal->getSemesterId(), $comparison);
        } elseif ($alatLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useAlatLongitudinalQuery()
                ->filterByPrimaryKeys($alatLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlatLongitudinal() only accepts arguments of type AlatLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlatLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinAlatLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlatLongitudinal');

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
            $this->addJoinObject($join, 'AlatLongitudinal');
        }

        return $this;
    }

    /**
     * Use the AlatLongitudinal relation AlatLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useAlatLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlatLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlatLongitudinal', '\DataDikdas\Model\AlatLongitudinalQuery');
    }

    /**
     * Filter the query by a related BangunanLongitudinal object
     *
     * @param   BangunanLongitudinal|PropelObjectCollection $bangunanLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunanLongitudinal($bangunanLongitudinal, $comparison = null)
    {
        if ($bangunanLongitudinal instanceof BangunanLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $bangunanLongitudinal->getSemesterId(), $comparison);
        } elseif ($bangunanLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useBangunanLongitudinalQuery()
                ->filterByPrimaryKeys($bangunanLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunanLongitudinal() only accepts arguments of type BangunanLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BangunanLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinBangunanLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BangunanLongitudinal');

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
            $this->addJoinObject($join, 'BangunanLongitudinal');
        }

        return $this;
    }

    /**
     * Use the BangunanLongitudinal relation BangunanLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useBangunanLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunanLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BangunanLongitudinal', '\DataDikdas\Model\BangunanLongitudinalQuery');
    }

    /**
     * Filter the query by a related BatasWaktuRapor object
     *
     * @param   BatasWaktuRapor|PropelObjectCollection $batasWaktuRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBatasWaktuRapor($batasWaktuRapor, $comparison = null)
    {
        if ($batasWaktuRapor instanceof BatasWaktuRapor) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $batasWaktuRapor->getSemesterId(), $comparison);
        } elseif ($batasWaktuRapor instanceof PropelObjectCollection) {
            return $this
                ->useBatasWaktuRaporQuery()
                ->filterByPrimaryKeys($batasWaktuRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBatasWaktuRapor() only accepts arguments of type BatasWaktuRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BatasWaktuRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinBatasWaktuRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BatasWaktuRapor');

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
            $this->addJoinObject($join, 'BatasWaktuRapor');
        }

        return $this;
    }

    /**
     * Use the BatasWaktuRapor relation BatasWaktuRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BatasWaktuRaporQuery A secondary query class using the current class as primary query
     */
    public function useBatasWaktuRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBatasWaktuRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BatasWaktuRapor', '\DataDikdas\Model\BatasWaktuRaporQuery');
    }

    /**
     * Filter the query by a related BukuLongitudinal object
     *
     * @param   BukuLongitudinal|PropelObjectCollection $bukuLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBukuLongitudinal($bukuLongitudinal, $comparison = null)
    {
        if ($bukuLongitudinal instanceof BukuLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $bukuLongitudinal->getSemesterId(), $comparison);
        } elseif ($bukuLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useBukuLongitudinalQuery()
                ->filterByPrimaryKeys($bukuLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBukuLongitudinal() only accepts arguments of type BukuLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BukuLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinBukuLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BukuLongitudinal');

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
            $this->addJoinObject($join, 'BukuLongitudinal');
        }

        return $this;
    }

    /**
     * Use the BukuLongitudinal relation BukuLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useBukuLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBukuLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BukuLongitudinal', '\DataDikdas\Model\BukuLongitudinalQuery');
    }

    /**
     * Filter the query by a related JurSpLong object
     *
     * @param   JurSpLong|PropelObjectCollection $jurSpLong  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurSpLong($jurSpLong, $comparison = null)
    {
        if ($jurSpLong instanceof JurSpLong) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $jurSpLong->getSemesterId(), $comparison);
        } elseif ($jurSpLong instanceof PropelObjectCollection) {
            return $this
                ->useJurSpLongQuery()
                ->filterByPrimaryKeys($jurSpLong->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurSpLong() only accepts arguments of type JurSpLong or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurSpLong relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinJurSpLong($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurSpLong');

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
            $this->addJoinObject($join, 'JurSpLong');
        }

        return $this;
    }

    /**
     * Use the JurSpLong relation JurSpLong object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurSpLongQuery A secondary query class using the current class as primary query
     */
    public function useJurSpLongQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurSpLong($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurSpLong', '\DataDikdas\Model\JurSpLongQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaran($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $pembelajaran->getSemesterId(), $comparison);
        } elseif ($pembelajaran instanceof PropelObjectCollection) {
            return $this
                ->usePembelajaranQuery()
                ->filterByPrimaryKeys($pembelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPembelajaran() only accepts arguments of type Pembelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pembelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinPembelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pembelajaran');

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
            $this->addJoinObject($join, 'Pembelajaran');
        }

        return $this;
    }

    /**
     * Use the Pembelajaran relation Pembelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PembelajaranQuery A secondary query class using the current class as primary query
     */
    public function usePembelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPembelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pembelajaran', '\DataDikdas\Model\PembelajaranQuery');
    }

    /**
     * Filter the query by a related PesertaDidikLongitudinal object
     *
     * @param   PesertaDidikLongitudinal|PropelObjectCollection $pesertaDidikLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikLongitudinal($pesertaDidikLongitudinal, $comparison = null)
    {
        if ($pesertaDidikLongitudinal instanceof PesertaDidikLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $pesertaDidikLongitudinal->getSemesterId(), $comparison);
        } elseif ($pesertaDidikLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikLongitudinalQuery()
                ->filterByPrimaryKeys($pesertaDidikLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikLongitudinal() only accepts arguments of type PesertaDidikLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinPesertaDidikLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikLongitudinal');

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
            $this->addJoinObject($join, 'PesertaDidikLongitudinal');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikLongitudinal relation PesertaDidikLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikLongitudinal', '\DataDikdas\Model\PesertaDidikLongitudinalQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $rombonganBelajar->getSemesterId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related RuangLongitudinal object
     *
     * @param   RuangLongitudinal|PropelObjectCollection $ruangLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuangLongitudinal($ruangLongitudinal, $comparison = null)
    {
        if ($ruangLongitudinal instanceof RuangLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $ruangLongitudinal->getSemesterId(), $comparison);
        } elseif ($ruangLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useRuangLongitudinalQuery()
                ->filterByPrimaryKeys($ruangLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRuangLongitudinal() only accepts arguments of type RuangLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RuangLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinRuangLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RuangLongitudinal');

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
            $this->addJoinObject($join, 'RuangLongitudinal');
        }

        return $this;
    }

    /**
     * Use the RuangLongitudinal relation RuangLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useRuangLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuangLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RuangLongitudinal', '\DataDikdas\Model\RuangLongitudinalQuery');
    }

    /**
     * Filter the query by a related Sanitasi object
     *
     * @param   Sanitasi|PropelObjectCollection $sanitasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySanitasi($sanitasi, $comparison = null)
    {
        if ($sanitasi instanceof Sanitasi) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $sanitasi->getSemesterId(), $comparison);
        } elseif ($sanitasi instanceof PropelObjectCollection) {
            return $this
                ->useSanitasiQuery()
                ->filterByPrimaryKeys($sanitasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySanitasi() only accepts arguments of type Sanitasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sanitasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinSanitasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sanitasi');

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
            $this->addJoinObject($join, 'Sanitasi');
        }

        return $this;
    }

    /**
     * Use the Sanitasi relation Sanitasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SanitasiQuery A secondary query class using the current class as primary query
     */
    public function useSanitasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSanitasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sanitasi', '\DataDikdas\Model\SanitasiQuery');
    }

    /**
     * Filter the query by a related SekolahLongitudinal object
     *
     * @param   SekolahLongitudinal|PropelObjectCollection $sekolahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahLongitudinal($sekolahLongitudinal, $comparison = null)
    {
        if ($sekolahLongitudinal instanceof SekolahLongitudinal) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $sekolahLongitudinal->getSemesterId(), $comparison);
        } elseif ($sekolahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useSekolahLongitudinalQuery()
                ->filterByPrimaryKeys($sekolahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahLongitudinal() only accepts arguments of type SekolahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinSekolahLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahLongitudinal');

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
            $this->addJoinObject($join, 'SekolahLongitudinal');
        }

        return $this;
    }

    /**
     * Use the SekolahLongitudinal relation SekolahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useSekolahLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahLongitudinal', '\DataDikdas\Model\SekolahLongitudinalQuery');
    }

    /**
     * Filter the query by a related Tunjangan object
     *
     * @param   Tunjangan|PropelObjectCollection $tunjangan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SemesterQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTunjangan($tunjangan, $comparison = null)
    {
        if ($tunjangan instanceof Tunjangan) {
            return $this
                ->addUsingAlias(SemesterPeer::SEMESTER_ID, $tunjangan->getSemesterId(), $comparison);
        } elseif ($tunjangan instanceof PropelObjectCollection) {
            return $this
                ->useTunjanganQuery()
                ->filterByPrimaryKeys($tunjangan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTunjangan() only accepts arguments of type Tunjangan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tunjangan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function joinTunjangan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tunjangan');

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
            $this->addJoinObject($join, 'Tunjangan');
        }

        return $this;
    }

    /**
     * Use the Tunjangan relation Tunjangan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TunjanganQuery A secondary query class using the current class as primary query
     */
    public function useTunjanganQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTunjangan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tunjangan', '\DataDikdas\Model\TunjanganQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Semester $semester Object to remove from the list of results
     *
     * @return SemesterQuery The current query, for fluid interface
     */
    public function prune($semester = null)
    {
        if ($semester) {
            $this->addUsingAlias(SemesterPeer::SEMESTER_ID, $semester->getSemesterId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
