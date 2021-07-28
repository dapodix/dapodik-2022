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
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikBaruPeer;
use DataDikdas\Model\PesertaDidikBaruQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TahunAjaran;

/**
 * Base class that represents a query for the 'peserta_didik_baru' table.
 *
 * 
 *
 * @method PesertaDidikBaruQuery orderByPdbId($order = Criteria::ASC) Order by the pdb_id column
 * @method PesertaDidikBaruQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method PesertaDidikBaruQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method PesertaDidikBaruQuery orderByNamaPd($order = Criteria::ASC) Order by the nama_pd column
 * @method PesertaDidikBaruQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PesertaDidikBaruQuery orderByNisn($order = Criteria::ASC) Order by the nisn column
 * @method PesertaDidikBaruQuery orderByNik($order = Criteria::ASC) Order by the nik column
 * @method PesertaDidikBaruQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method PesertaDidikBaruQuery orderByTanggalLahir($order = Criteria::ASC) Order by the tanggal_lahir column
 * @method PesertaDidikBaruQuery orderByNamaIbuKandung($order = Criteria::ASC) Order by the nama_ibu_kandung column
 * @method PesertaDidikBaruQuery orderByJenisPendaftaranId($order = Criteria::ASC) Order by the jenis_pendaftaran_id column
 * @method PesertaDidikBaruQuery orderBySudahDiproses($order = Criteria::ASC) Order by the sudah_diproses column
 * @method PesertaDidikBaruQuery orderByBerhasilDiproses($order = Criteria::ASC) Order by the berhasil_diproses column
 * @method PesertaDidikBaruQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PesertaDidikBaruQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PesertaDidikBaruQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PesertaDidikBaruQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PesertaDidikBaruQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PesertaDidikBaruQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PesertaDidikBaruQuery groupByPdbId() Group by the pdb_id column
 * @method PesertaDidikBaruQuery groupBySekolahId() Group by the sekolah_id column
 * @method PesertaDidikBaruQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method PesertaDidikBaruQuery groupByNamaPd() Group by the nama_pd column
 * @method PesertaDidikBaruQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PesertaDidikBaruQuery groupByNisn() Group by the nisn column
 * @method PesertaDidikBaruQuery groupByNik() Group by the nik column
 * @method PesertaDidikBaruQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method PesertaDidikBaruQuery groupByTanggalLahir() Group by the tanggal_lahir column
 * @method PesertaDidikBaruQuery groupByNamaIbuKandung() Group by the nama_ibu_kandung column
 * @method PesertaDidikBaruQuery groupByJenisPendaftaranId() Group by the jenis_pendaftaran_id column
 * @method PesertaDidikBaruQuery groupBySudahDiproses() Group by the sudah_diproses column
 * @method PesertaDidikBaruQuery groupByBerhasilDiproses() Group by the berhasil_diproses column
 * @method PesertaDidikBaruQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PesertaDidikBaruQuery groupByCreateDate() Group by the create_date column
 * @method PesertaDidikBaruQuery groupByLastUpdate() Group by the last_update column
 * @method PesertaDidikBaruQuery groupBySoftDelete() Group by the soft_delete column
 * @method PesertaDidikBaruQuery groupByLastSync() Group by the last_sync column
 * @method PesertaDidikBaruQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PesertaDidikBaruQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PesertaDidikBaruQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PesertaDidikBaruQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PesertaDidikBaruQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method PesertaDidikBaruQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method PesertaDidikBaruQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method PesertaDidikBaruQuery leftJoinJenisPendaftaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPendaftaran relation
 * @method PesertaDidikBaruQuery rightJoinJenisPendaftaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPendaftaran relation
 * @method PesertaDidikBaruQuery innerJoinJenisPendaftaran($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPendaftaran relation
 *
 * @method PesertaDidikBaruQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method PesertaDidikBaruQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method PesertaDidikBaruQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method PesertaDidikBaruQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method PesertaDidikBaruQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method PesertaDidikBaruQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method PesertaDidikBaru findOne(PropelPDO $con = null) Return the first PesertaDidikBaru matching the query
 * @method PesertaDidikBaru findOneOrCreate(PropelPDO $con = null) Return the first PesertaDidikBaru matching the query, or a new PesertaDidikBaru object populated from the query conditions when no match is found
 *
 * @method PesertaDidikBaru findOneBySekolahId(string $sekolah_id) Return the first PesertaDidikBaru filtered by the sekolah_id column
 * @method PesertaDidikBaru findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first PesertaDidikBaru filtered by the tahun_ajaran_id column
 * @method PesertaDidikBaru findOneByNamaPd(string $nama_pd) Return the first PesertaDidikBaru filtered by the nama_pd column
 * @method PesertaDidikBaru findOneByJenisKelamin(string $jenis_kelamin) Return the first PesertaDidikBaru filtered by the jenis_kelamin column
 * @method PesertaDidikBaru findOneByNisn(string $nisn) Return the first PesertaDidikBaru filtered by the nisn column
 * @method PesertaDidikBaru findOneByNik(string $nik) Return the first PesertaDidikBaru filtered by the nik column
 * @method PesertaDidikBaru findOneByTempatLahir(string $tempat_lahir) Return the first PesertaDidikBaru filtered by the tempat_lahir column
 * @method PesertaDidikBaru findOneByTanggalLahir(string $tanggal_lahir) Return the first PesertaDidikBaru filtered by the tanggal_lahir column
 * @method PesertaDidikBaru findOneByNamaIbuKandung(string $nama_ibu_kandung) Return the first PesertaDidikBaru filtered by the nama_ibu_kandung column
 * @method PesertaDidikBaru findOneByJenisPendaftaranId(string $jenis_pendaftaran_id) Return the first PesertaDidikBaru filtered by the jenis_pendaftaran_id column
 * @method PesertaDidikBaru findOneBySudahDiproses(string $sudah_diproses) Return the first PesertaDidikBaru filtered by the sudah_diproses column
 * @method PesertaDidikBaru findOneByBerhasilDiproses(string $berhasil_diproses) Return the first PesertaDidikBaru filtered by the berhasil_diproses column
 * @method PesertaDidikBaru findOneByPesertaDidikId(string $peserta_didik_id) Return the first PesertaDidikBaru filtered by the peserta_didik_id column
 * @method PesertaDidikBaru findOneByCreateDate(string $create_date) Return the first PesertaDidikBaru filtered by the create_date column
 * @method PesertaDidikBaru findOneByLastUpdate(string $last_update) Return the first PesertaDidikBaru filtered by the last_update column
 * @method PesertaDidikBaru findOneBySoftDelete(string $soft_delete) Return the first PesertaDidikBaru filtered by the soft_delete column
 * @method PesertaDidikBaru findOneByLastSync(string $last_sync) Return the first PesertaDidikBaru filtered by the last_sync column
 * @method PesertaDidikBaru findOneByUpdaterId(string $updater_id) Return the first PesertaDidikBaru filtered by the updater_id column
 *
 * @method array findByPdbId(string $pdb_id) Return PesertaDidikBaru objects filtered by the pdb_id column
 * @method array findBySekolahId(string $sekolah_id) Return PesertaDidikBaru objects filtered by the sekolah_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return PesertaDidikBaru objects filtered by the tahun_ajaran_id column
 * @method array findByNamaPd(string $nama_pd) Return PesertaDidikBaru objects filtered by the nama_pd column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return PesertaDidikBaru objects filtered by the jenis_kelamin column
 * @method array findByNisn(string $nisn) Return PesertaDidikBaru objects filtered by the nisn column
 * @method array findByNik(string $nik) Return PesertaDidikBaru objects filtered by the nik column
 * @method array findByTempatLahir(string $tempat_lahir) Return PesertaDidikBaru objects filtered by the tempat_lahir column
 * @method array findByTanggalLahir(string $tanggal_lahir) Return PesertaDidikBaru objects filtered by the tanggal_lahir column
 * @method array findByNamaIbuKandung(string $nama_ibu_kandung) Return PesertaDidikBaru objects filtered by the nama_ibu_kandung column
 * @method array findByJenisPendaftaranId(string $jenis_pendaftaran_id) Return PesertaDidikBaru objects filtered by the jenis_pendaftaran_id column
 * @method array findBySudahDiproses(string $sudah_diproses) Return PesertaDidikBaru objects filtered by the sudah_diproses column
 * @method array findByBerhasilDiproses(string $berhasil_diproses) Return PesertaDidikBaru objects filtered by the berhasil_diproses column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return PesertaDidikBaru objects filtered by the peserta_didik_id column
 * @method array findByCreateDate(string $create_date) Return PesertaDidikBaru objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PesertaDidikBaru objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PesertaDidikBaru objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PesertaDidikBaru objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PesertaDidikBaru objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikBaruQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePesertaDidikBaruQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PesertaDidikBaru', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PesertaDidikBaruQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PesertaDidikBaruQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PesertaDidikBaruQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PesertaDidikBaruQuery) {
            return $criteria;
        }
        $query = new PesertaDidikBaruQuery();
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
     * @return   PesertaDidikBaru|PesertaDidikBaru[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PesertaDidikBaruPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikBaruPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PesertaDidikBaru A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPdbId($key, $con = null)
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
     * @return                 PesertaDidikBaru A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pdb_id", "sekolah_id", "tahun_ajaran_id", "nama_pd", "jenis_kelamin", "nisn", "nik", "tempat_lahir", "tanggal_lahir", "nama_ibu_kandung", "jenis_pendaftaran_id", "sudah_diproses", "berhasil_diproses", "peserta_didik_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "peserta_didik_baru" WHERE "pdb_id" = :p0';
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
            $obj = new PesertaDidikBaru();
            $obj->hydrate($row);
            PesertaDidikBaruPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PesertaDidikBaru|PesertaDidikBaru[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PesertaDidikBaru[]|mixed the list of results, formatted by the current formatter
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PesertaDidikBaruPeer::PDB_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PesertaDidikBaruPeer::PDB_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pdb_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPdbId('fooValue');   // WHERE pdb_id = 'fooValue'
     * $query->filterByPdbId('%fooValue%'); // WHERE pdb_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pdbId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByPdbId($pdbId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pdbId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pdbId)) {
                $pdbId = str_replace('*', '%', $pdbId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::PDB_ID, $pdbId, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the nama_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaPd('fooValue');   // WHERE nama_pd = 'fooValue'
     * $query->filterByNamaPd('%fooValue%'); // WHERE nama_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByNamaPd($namaPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaPd)) {
                $namaPd = str_replace('*', '%', $namaPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::NAMA_PD, $namaPd, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the nisn column
     *
     * Example usage:
     * <code>
     * $query->filterByNisn('fooValue');   // WHERE nisn = 'fooValue'
     * $query->filterByNisn('%fooValue%'); // WHERE nisn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nisn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByNisn($nisn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nisn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nisn)) {
                $nisn = str_replace('*', '%', $nisn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::NISN, $nisn, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::NIK, $nik, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByTanggalLahir($tanggalLahir = null, $comparison = null)
    {
        if (is_array($tanggalLahir)) {
            $useMinMax = false;
            if (isset($tanggalLahir['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::TANGGAL_LAHIR, $tanggalLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalLahir['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::TANGGAL_LAHIR, $tanggalLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::TANGGAL_LAHIR, $tanggalLahir, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::NAMA_IBU_KANDUNG, $namaIbuKandung, $comparison);
    }

    /**
     * Filter the query on the jenis_pendaftaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPendaftaranId(1234); // WHERE jenis_pendaftaran_id = 1234
     * $query->filterByJenisPendaftaranId(array(12, 34)); // WHERE jenis_pendaftaran_id IN (12, 34)
     * $query->filterByJenisPendaftaranId(array('min' => 12)); // WHERE jenis_pendaftaran_id >= 12
     * $query->filterByJenisPendaftaranId(array('max' => 12)); // WHERE jenis_pendaftaran_id <= 12
     * </code>
     *
     * @see       filterByJenisPendaftaran()
     *
     * @param     mixed $jenisPendaftaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByJenisPendaftaranId($jenisPendaftaranId = null, $comparison = null)
    {
        if (is_array($jenisPendaftaranId)) {
            $useMinMax = false;
            if (isset($jenisPendaftaranId['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPendaftaranId['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterBySudahDiproses($sudahDiproses = null, $comparison = null)
    {
        if (is_array($sudahDiproses)) {
            $useMinMax = false;
            if (isset($sudahDiproses['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::SUDAH_DIPROSES, $sudahDiproses['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sudahDiproses['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::SUDAH_DIPROSES, $sudahDiproses['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::SUDAH_DIPROSES, $sudahDiproses, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByBerhasilDiproses($berhasilDiproses = null, $comparison = null)
    {
        if (is_array($berhasilDiproses)) {
            $useMinMax = false;
            if (isset($berhasilDiproses['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($berhasilDiproses['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::BERHASIL_DIPROSES, $berhasilDiproses, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PesertaDidikBaruPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikBaruPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikBaruPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related JenisPendaftaran object
     *
     * @param   JenisPendaftaran|PropelObjectCollection $jenisPendaftaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPendaftaran($jenisPendaftaran, $comparison = null)
    {
        if ($jenisPendaftaran instanceof JenisPendaftaran) {
            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->getJenisPendaftaranId(), $comparison);
        } elseif ($jenisPendaftaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->toKeyValue('PrimaryKey', 'JenisPendaftaranId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPendaftaran() only accepts arguments of type JenisPendaftaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPendaftaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function joinJenisPendaftaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPendaftaran');

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
            $this->addJoinObject($join, 'JenisPendaftaran');
        }

        return $this;
    }

    /**
     * Use the JenisPendaftaran relation JenisPendaftaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPendaftaranQuery A secondary query class using the current class as primary query
     */
    public function useJenisPendaftaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPendaftaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPendaftaran', '\DataDikdas\Model\JenisPendaftaranQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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
     * @return                 PesertaDidikBaruQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikBaruPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return PesertaDidikBaruQuery The current query, for fluid interface
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
     * @param   PesertaDidikBaru $pesertaDidikBaru Object to remove from the list of results
     *
     * @return PesertaDidikBaruQuery The current query, for fluid interface
     */
    public function prune($pesertaDidikBaru = null)
    {
        if ($pesertaDidikBaru) {
            $this->addUsingAlias(PesertaDidikBaruPeer::PDB_ID, $pesertaDidikBaru->getPdbId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
