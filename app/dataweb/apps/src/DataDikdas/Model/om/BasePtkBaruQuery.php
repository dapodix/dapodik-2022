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
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkBaruPeer;
use DataDikdas\Model\PtkBaruQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TahunAjaran;

/**
 * Base class that represents a query for the 'ptk_baru' table.
 *
 * 
 *
 * @method PtkBaruQuery orderByPtkBaruId($order = Criteria::ASC) Order by the ptk_baru_id column
 * @method PtkBaruQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method PtkBaruQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method PtkBaruQuery orderByNamaPtk($order = Criteria::ASC) Order by the nama_ptk column
 * @method PtkBaruQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PtkBaruQuery orderByNuptk($order = Criteria::ASC) Order by the nuptk column
 * @method PtkBaruQuery orderByNik($order = Criteria::ASC) Order by the nik column
 * @method PtkBaruQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method PtkBaruQuery orderByTanggalLahir($order = Criteria::ASC) Order by the tanggal_lahir column
 * @method PtkBaruQuery orderByNamaIbuKandung($order = Criteria::ASC) Order by the nama_ibu_kandung column
 * @method PtkBaruQuery orderBySudahDiproses($order = Criteria::ASC) Order by the sudah_diproses column
 * @method PtkBaruQuery orderByBerhasilDiproses($order = Criteria::ASC) Order by the berhasil_diproses column
 * @method PtkBaruQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PtkBaruQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PtkBaruQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PtkBaruQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PtkBaruQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PtkBaruQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PtkBaruQuery groupByPtkBaruId() Group by the ptk_baru_id column
 * @method PtkBaruQuery groupBySekolahId() Group by the sekolah_id column
 * @method PtkBaruQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method PtkBaruQuery groupByNamaPtk() Group by the nama_ptk column
 * @method PtkBaruQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PtkBaruQuery groupByNuptk() Group by the nuptk column
 * @method PtkBaruQuery groupByNik() Group by the nik column
 * @method PtkBaruQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method PtkBaruQuery groupByTanggalLahir() Group by the tanggal_lahir column
 * @method PtkBaruQuery groupByNamaIbuKandung() Group by the nama_ibu_kandung column
 * @method PtkBaruQuery groupBySudahDiproses() Group by the sudah_diproses column
 * @method PtkBaruQuery groupByBerhasilDiproses() Group by the berhasil_diproses column
 * @method PtkBaruQuery groupByPtkId() Group by the ptk_id column
 * @method PtkBaruQuery groupByCreateDate() Group by the create_date column
 * @method PtkBaruQuery groupByLastUpdate() Group by the last_update column
 * @method PtkBaruQuery groupBySoftDelete() Group by the soft_delete column
 * @method PtkBaruQuery groupByLastSync() Group by the last_sync column
 * @method PtkBaruQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PtkBaruQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PtkBaruQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PtkBaruQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PtkBaruQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PtkBaruQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PtkBaruQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PtkBaruQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method PtkBaruQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method PtkBaruQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method PtkBaruQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method PtkBaruQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method PtkBaruQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method PtkBaru findOne(PropelPDO $con = null) Return the first PtkBaru matching the query
 * @method PtkBaru findOneOrCreate(PropelPDO $con = null) Return the first PtkBaru matching the query, or a new PtkBaru object populated from the query conditions when no match is found
 *
 * @method PtkBaru findOneBySekolahId(string $sekolah_id) Return the first PtkBaru filtered by the sekolah_id column
 * @method PtkBaru findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first PtkBaru filtered by the tahun_ajaran_id column
 * @method PtkBaru findOneByNamaPtk(string $nama_ptk) Return the first PtkBaru filtered by the nama_ptk column
 * @method PtkBaru findOneByJenisKelamin(string $jenis_kelamin) Return the first PtkBaru filtered by the jenis_kelamin column
 * @method PtkBaru findOneByNuptk(string $nuptk) Return the first PtkBaru filtered by the nuptk column
 * @method PtkBaru findOneByNik(string $nik) Return the first PtkBaru filtered by the nik column
 * @method PtkBaru findOneByTempatLahir(string $tempat_lahir) Return the first PtkBaru filtered by the tempat_lahir column
 * @method PtkBaru findOneByTanggalLahir(string $tanggal_lahir) Return the first PtkBaru filtered by the tanggal_lahir column
 * @method PtkBaru findOneByNamaIbuKandung(string $nama_ibu_kandung) Return the first PtkBaru filtered by the nama_ibu_kandung column
 * @method PtkBaru findOneBySudahDiproses(string $sudah_diproses) Return the first PtkBaru filtered by the sudah_diproses column
 * @method PtkBaru findOneByBerhasilDiproses(string $berhasil_diproses) Return the first PtkBaru filtered by the berhasil_diproses column
 * @method PtkBaru findOneByPtkId(string $ptk_id) Return the first PtkBaru filtered by the ptk_id column
 * @method PtkBaru findOneByCreateDate(string $create_date) Return the first PtkBaru filtered by the create_date column
 * @method PtkBaru findOneByLastUpdate(string $last_update) Return the first PtkBaru filtered by the last_update column
 * @method PtkBaru findOneBySoftDelete(string $soft_delete) Return the first PtkBaru filtered by the soft_delete column
 * @method PtkBaru findOneByLastSync(string $last_sync) Return the first PtkBaru filtered by the last_sync column
 * @method PtkBaru findOneByUpdaterId(string $updater_id) Return the first PtkBaru filtered by the updater_id column
 *
 * @method array findByPtkBaruId(string $ptk_baru_id) Return PtkBaru objects filtered by the ptk_baru_id column
 * @method array findBySekolahId(string $sekolah_id) Return PtkBaru objects filtered by the sekolah_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return PtkBaru objects filtered by the tahun_ajaran_id column
 * @method array findByNamaPtk(string $nama_ptk) Return PtkBaru objects filtered by the nama_ptk column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return PtkBaru objects filtered by the jenis_kelamin column
 * @method array findByNuptk(string $nuptk) Return PtkBaru objects filtered by the nuptk column
 * @method array findByNik(string $nik) Return PtkBaru objects filtered by the nik column
 * @method array findByTempatLahir(string $tempat_lahir) Return PtkBaru objects filtered by the tempat_lahir column
 * @method array findByTanggalLahir(string $tanggal_lahir) Return PtkBaru objects filtered by the tanggal_lahir column
 * @method array findByNamaIbuKandung(string $nama_ibu_kandung) Return PtkBaru objects filtered by the nama_ibu_kandung column
 * @method array findBySudahDiproses(string $sudah_diproses) Return PtkBaru objects filtered by the sudah_diproses column
 * @method array findByBerhasilDiproses(string $berhasil_diproses) Return PtkBaru objects filtered by the berhasil_diproses column
 * @method array findByPtkId(string $ptk_id) Return PtkBaru objects filtered by the ptk_id column
 * @method array findByCreateDate(string $create_date) Return PtkBaru objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PtkBaru objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PtkBaru objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PtkBaru objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PtkBaru objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkBaruQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePtkBaruQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PtkBaru', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PtkBaruQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PtkBaruQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PtkBaruQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PtkBaruQuery) {
            return $criteria;
        }
        $query = new PtkBaruQuery();
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
     * @return   PtkBaru|PtkBaru[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PtkBaruPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PtkBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PtkBaru A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPtkBaruId($key, $con = null)
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
     * @return                 PtkBaru A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ptk_baru_id", "sekolah_id", "tahun_ajaran_id", "nama_ptk", "jenis_kelamin", "nuptk", "nik", "tempat_lahir", "tanggal_lahir", "nama_ibu_kandung", "sudah_diproses", "berhasil_diproses", "ptk_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "ptk_baru" WHERE "ptk_baru_id" = :p0';
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
            $obj = new PtkBaru();
            $obj->hydrate($row);
            PtkBaruPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PtkBaru|PtkBaru[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PtkBaru[]|mixed the list of results, formatted by the current formatter
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PtkBaruPeer::PTK_BARU_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PtkBaruPeer::PTK_BARU_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ptk_baru_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkBaruId('fooValue');   // WHERE ptk_baru_id = 'fooValue'
     * $query->filterByPtkBaruId('%fooValue%'); // WHERE ptk_baru_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkBaruId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByPtkBaruId($ptkBaruId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkBaruId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkBaruId)) {
                $ptkBaruId = str_replace('*', '%', $ptkBaruId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::PTK_BARU_ID, $ptkBaruId, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkBaruPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(PtkBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(PtkBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the nama_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaPtk('fooValue');   // WHERE nama_ptk = 'fooValue'
     * $query->filterByNamaPtk('%fooValue%'); // WHERE nama_ptk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaPtk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByNamaPtk($namaPtk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaPtk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaPtk)) {
                $namaPtk = str_replace('*', '%', $namaPtk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::NAMA_PTK, $namaPtk, $comparison);
    }

    /**
     * Filter the query on the jenis_kelamin column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKelamin('fooValue');   // WHERE jenis_kelamin = 'fooValue'
     * $query->filterByJenisKelamin('%fooValue%'); // WHERE jenis_kelamin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisKelamin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByJenisKelamin($jenisKelamin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisKelamin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisKelamin)) {
                $jenisKelamin = str_replace('*', '%', $jenisKelamin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the nuptk column
     *
     * Example usage:
     * <code>
     * $query->filterByNuptk('fooValue');   // WHERE nuptk = 'fooValue'
     * $query->filterByNuptk('%fooValue%'); // WHERE nuptk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuptk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByNuptk($nuptk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuptk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuptk)) {
                $nuptk = str_replace('*', '%', $nuptk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::NUPTK, $nuptk, $comparison);
    }

    /**
     * Filter the query on the nik column
     *
     * Example usage:
     * <code>
     * $query->filterByNik('fooValue');   // WHERE nik = 'fooValue'
     * $query->filterByNik('%fooValue%'); // WHERE nik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByNik($nik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nik)) {
                $nik = str_replace('*', '%', $nik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::NIK, $nik, $comparison);
    }

    /**
     * Filter the query on the tempat_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatLahir('fooValue');   // WHERE tempat_lahir = 'fooValue'
     * $query->filterByTempatLahir('%fooValue%'); // WHERE tempat_lahir LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempatLahir The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByTempatLahir($tempatLahir = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempatLahir)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempatLahir)) {
                $tempatLahir = str_replace('*', '%', $tempatLahir);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
    }

    /**
     * Filter the query on the tanggal_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalLahir('2011-03-14'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir('now'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir(array('max' => 'yesterday')); // WHERE tanggal_lahir > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalLahir The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByTanggalLahir($tanggalLahir = null, $comparison = null)
    {
        if (is_array($tanggalLahir)) {
            $useMinMax = false;
            if (isset($tanggalLahir['min'])) {
                $this->addUsingAlias(PtkBaruPeer::TANGGAL_LAHIR, $tanggalLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalLahir['max'])) {
                $this->addUsingAlias(PtkBaruPeer::TANGGAL_LAHIR, $tanggalLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::TANGGAL_LAHIR, $tanggalLahir, $comparison);
    }

    /**
     * Filter the query on the nama_ibu_kandung column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaIbuKandung('fooValue');   // WHERE nama_ibu_kandung = 'fooValue'
     * $query->filterByNamaIbuKandung('%fooValue%'); // WHERE nama_ibu_kandung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaIbuKandung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByNamaIbuKandung($namaIbuKandung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaIbuKandung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaIbuKandung)) {
                $namaIbuKandung = str_replace('*', '%', $namaIbuKandung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::NAMA_IBU_KANDUNG, $namaIbuKandung, $comparison);
    }

    /**
     * Filter the query on the sudah_diproses column
     *
     * Example usage:
     * <code>
     * $query->filterBySudahDiproses(1234); // WHERE sudah_diproses = 1234
     * $query->filterBySudahDiproses(array(12, 34)); // WHERE sudah_diproses IN (12, 34)
     * $query->filterBySudahDiproses(array('min' => 12)); // WHERE sudah_diproses >= 12
     * $query->filterBySudahDiproses(array('max' => 12)); // WHERE sudah_diproses <= 12
     * </code>
     *
     * @param     mixed $sudahDiproses The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterBySudahDiproses($sudahDiproses = null, $comparison = null)
    {
        if (is_array($sudahDiproses)) {
            $useMinMax = false;
            if (isset($sudahDiproses['min'])) {
                $this->addUsingAlias(PtkBaruPeer::SUDAH_DIPROSES, $sudahDiproses['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sudahDiproses['max'])) {
                $this->addUsingAlias(PtkBaruPeer::SUDAH_DIPROSES, $sudahDiproses['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::SUDAH_DIPROSES, $sudahDiproses, $comparison);
    }

    /**
     * Filter the query on the berhasil_diproses column
     *
     * Example usage:
     * <code>
     * $query->filterByBerhasilDiproses(1234); // WHERE berhasil_diproses = 1234
     * $query->filterByBerhasilDiproses(array(12, 34)); // WHERE berhasil_diproses IN (12, 34)
     * $query->filterByBerhasilDiproses(array('min' => 12)); // WHERE berhasil_diproses >= 12
     * $query->filterByBerhasilDiproses(array('max' => 12)); // WHERE berhasil_diproses <= 12
     * </code>
     *
     * @param     mixed $berhasilDiproses The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByBerhasilDiproses($berhasilDiproses = null, $comparison = null)
    {
        if (is_array($berhasilDiproses)) {
            $useMinMax = false;
            if (isset($berhasilDiproses['min'])) {
                $this->addUsingAlias(PtkBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($berhasilDiproses['max'])) {
                $this->addUsingAlias(PtkBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkBaruPeer::PTK_ID, $ptkId, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PtkBaruPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PtkBaruPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PtkBaruPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PtkBaruPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PtkBaruPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PtkBaruPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PtkBaruPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PtkBaruPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkBaruPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkBaruPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PtkBaruPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkBaruPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(PtkBaruPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkBaruPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(PtkBaruPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkBaruPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return PtkBaruQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   PtkBaru $ptkBaru Object to remove from the list of results
     *
     * @return PtkBaruQuery The current query, for fluid interface
     */
    public function prune($ptkBaru = null)
    {
        if ($ptkBaru) {
            $this->addUsingAlias(PtkBaruPeer::PTK_BARU_ID, $ptkBaru->getPtkBaruId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
