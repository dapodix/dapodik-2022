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
use DataDikdas\Model\GuruSasaranPengawas;
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\Pembelajaran;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\PtkTerdaftarPeer;
use DataDikdas\Model\PtkTerdaftarQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\VldPtkTerdaftar;

/**
 * Base class that represents a query for the 'ptk_terdaftar' table.
 *
 * 
 *
 * @method PtkTerdaftarQuery orderByPtkTerdaftarId($order = Criteria::ASC) Order by the ptk_terdaftar_id column
 * @method PtkTerdaftarQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PtkTerdaftarQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method PtkTerdaftarQuery orderByJenisKeluarId($order = Criteria::ASC) Order by the jenis_keluar_id column
 * @method PtkTerdaftarQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method PtkTerdaftarQuery orderByNomorSuratTugas($order = Criteria::ASC) Order by the nomor_surat_tugas column
 * @method PtkTerdaftarQuery orderByTanggalSuratTugas($order = Criteria::ASC) Order by the tanggal_surat_tugas column
 * @method PtkTerdaftarQuery orderByPtkInduk($order = Criteria::ASC) Order by the ptk_induk column
 * @method PtkTerdaftarQuery orderByTmtTugas($order = Criteria::ASC) Order by the tmt_tugas column
 * @method PtkTerdaftarQuery orderByAktifBulan01($order = Criteria::ASC) Order by the aktif_bulan_01 column
 * @method PtkTerdaftarQuery orderByAktifBulan02($order = Criteria::ASC) Order by the aktif_bulan_02 column
 * @method PtkTerdaftarQuery orderByAktifBulan03($order = Criteria::ASC) Order by the aktif_bulan_03 column
 * @method PtkTerdaftarQuery orderByAktifBulan04($order = Criteria::ASC) Order by the aktif_bulan_04 column
 * @method PtkTerdaftarQuery orderByAktifBulan05($order = Criteria::ASC) Order by the aktif_bulan_05 column
 * @method PtkTerdaftarQuery orderByAktifBulan06($order = Criteria::ASC) Order by the aktif_bulan_06 column
 * @method PtkTerdaftarQuery orderByAktifBulan07($order = Criteria::ASC) Order by the aktif_bulan_07 column
 * @method PtkTerdaftarQuery orderByAktifBulan08($order = Criteria::ASC) Order by the aktif_bulan_08 column
 * @method PtkTerdaftarQuery orderByAktifBulan09($order = Criteria::ASC) Order by the aktif_bulan_09 column
 * @method PtkTerdaftarQuery orderByAktifBulan10($order = Criteria::ASC) Order by the aktif_bulan_10 column
 * @method PtkTerdaftarQuery orderByAktifBulan11($order = Criteria::ASC) Order by the aktif_bulan_11 column
 * @method PtkTerdaftarQuery orderByAktifBulan12($order = Criteria::ASC) Order by the aktif_bulan_12 column
 * @method PtkTerdaftarQuery orderByTglPtkKeluar($order = Criteria::ASC) Order by the tgl_ptk_keluar column
 * @method PtkTerdaftarQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PtkTerdaftarQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PtkTerdaftarQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PtkTerdaftarQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PtkTerdaftarQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PtkTerdaftarQuery groupByPtkTerdaftarId() Group by the ptk_terdaftar_id column
 * @method PtkTerdaftarQuery groupByPtkId() Group by the ptk_id column
 * @method PtkTerdaftarQuery groupBySekolahId() Group by the sekolah_id column
 * @method PtkTerdaftarQuery groupByJenisKeluarId() Group by the jenis_keluar_id column
 * @method PtkTerdaftarQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method PtkTerdaftarQuery groupByNomorSuratTugas() Group by the nomor_surat_tugas column
 * @method PtkTerdaftarQuery groupByTanggalSuratTugas() Group by the tanggal_surat_tugas column
 * @method PtkTerdaftarQuery groupByPtkInduk() Group by the ptk_induk column
 * @method PtkTerdaftarQuery groupByTmtTugas() Group by the tmt_tugas column
 * @method PtkTerdaftarQuery groupByAktifBulan01() Group by the aktif_bulan_01 column
 * @method PtkTerdaftarQuery groupByAktifBulan02() Group by the aktif_bulan_02 column
 * @method PtkTerdaftarQuery groupByAktifBulan03() Group by the aktif_bulan_03 column
 * @method PtkTerdaftarQuery groupByAktifBulan04() Group by the aktif_bulan_04 column
 * @method PtkTerdaftarQuery groupByAktifBulan05() Group by the aktif_bulan_05 column
 * @method PtkTerdaftarQuery groupByAktifBulan06() Group by the aktif_bulan_06 column
 * @method PtkTerdaftarQuery groupByAktifBulan07() Group by the aktif_bulan_07 column
 * @method PtkTerdaftarQuery groupByAktifBulan08() Group by the aktif_bulan_08 column
 * @method PtkTerdaftarQuery groupByAktifBulan09() Group by the aktif_bulan_09 column
 * @method PtkTerdaftarQuery groupByAktifBulan10() Group by the aktif_bulan_10 column
 * @method PtkTerdaftarQuery groupByAktifBulan11() Group by the aktif_bulan_11 column
 * @method PtkTerdaftarQuery groupByAktifBulan12() Group by the aktif_bulan_12 column
 * @method PtkTerdaftarQuery groupByTglPtkKeluar() Group by the tgl_ptk_keluar column
 * @method PtkTerdaftarQuery groupByCreateDate() Group by the create_date column
 * @method PtkTerdaftarQuery groupByLastUpdate() Group by the last_update column
 * @method PtkTerdaftarQuery groupBySoftDelete() Group by the soft_delete column
 * @method PtkTerdaftarQuery groupByLastSync() Group by the last_sync column
 * @method PtkTerdaftarQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PtkTerdaftarQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PtkTerdaftarQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PtkTerdaftarQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PtkTerdaftarQuery leftJoinJenisKeluar($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKeluar relation
 * @method PtkTerdaftarQuery rightJoinJenisKeluar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKeluar relation
 * @method PtkTerdaftarQuery innerJoinJenisKeluar($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKeluar relation
 *
 * @method PtkTerdaftarQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PtkTerdaftarQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PtkTerdaftarQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PtkTerdaftarQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method PtkTerdaftarQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method PtkTerdaftarQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method PtkTerdaftarQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method PtkTerdaftarQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method PtkTerdaftarQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method PtkTerdaftarQuery leftJoinGuruSasaranPengawas($relationAlias = null) Adds a LEFT JOIN clause to the query using the GuruSasaranPengawas relation
 * @method PtkTerdaftarQuery rightJoinGuruSasaranPengawas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GuruSasaranPengawas relation
 * @method PtkTerdaftarQuery innerJoinGuruSasaranPengawas($relationAlias = null) Adds a INNER JOIN clause to the query using the GuruSasaranPengawas relation
 *
 * @method PtkTerdaftarQuery leftJoinPembelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pembelajaran relation
 * @method PtkTerdaftarQuery rightJoinPembelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pembelajaran relation
 * @method PtkTerdaftarQuery innerJoinPembelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the Pembelajaran relation
 *
 * @method PtkTerdaftarQuery leftJoinVldPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPtkTerdaftar relation
 * @method PtkTerdaftarQuery rightJoinVldPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPtkTerdaftar relation
 * @method PtkTerdaftarQuery innerJoinVldPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPtkTerdaftar relation
 *
 * @method PtkTerdaftar findOne(PropelPDO $con = null) Return the first PtkTerdaftar matching the query
 * @method PtkTerdaftar findOneOrCreate(PropelPDO $con = null) Return the first PtkTerdaftar matching the query, or a new PtkTerdaftar object populated from the query conditions when no match is found
 *
 * @method PtkTerdaftar findOneByPtkId(string $ptk_id) Return the first PtkTerdaftar filtered by the ptk_id column
 * @method PtkTerdaftar findOneBySekolahId(string $sekolah_id) Return the first PtkTerdaftar filtered by the sekolah_id column
 * @method PtkTerdaftar findOneByJenisKeluarId(string $jenis_keluar_id) Return the first PtkTerdaftar filtered by the jenis_keluar_id column
 * @method PtkTerdaftar findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first PtkTerdaftar filtered by the tahun_ajaran_id column
 * @method PtkTerdaftar findOneByNomorSuratTugas(string $nomor_surat_tugas) Return the first PtkTerdaftar filtered by the nomor_surat_tugas column
 * @method PtkTerdaftar findOneByTanggalSuratTugas(string $tanggal_surat_tugas) Return the first PtkTerdaftar filtered by the tanggal_surat_tugas column
 * @method PtkTerdaftar findOneByPtkInduk(string $ptk_induk) Return the first PtkTerdaftar filtered by the ptk_induk column
 * @method PtkTerdaftar findOneByTmtTugas(string $tmt_tugas) Return the first PtkTerdaftar filtered by the tmt_tugas column
 * @method PtkTerdaftar findOneByAktifBulan01(string $aktif_bulan_01) Return the first PtkTerdaftar filtered by the aktif_bulan_01 column
 * @method PtkTerdaftar findOneByAktifBulan02(string $aktif_bulan_02) Return the first PtkTerdaftar filtered by the aktif_bulan_02 column
 * @method PtkTerdaftar findOneByAktifBulan03(string $aktif_bulan_03) Return the first PtkTerdaftar filtered by the aktif_bulan_03 column
 * @method PtkTerdaftar findOneByAktifBulan04(string $aktif_bulan_04) Return the first PtkTerdaftar filtered by the aktif_bulan_04 column
 * @method PtkTerdaftar findOneByAktifBulan05(string $aktif_bulan_05) Return the first PtkTerdaftar filtered by the aktif_bulan_05 column
 * @method PtkTerdaftar findOneByAktifBulan06(string $aktif_bulan_06) Return the first PtkTerdaftar filtered by the aktif_bulan_06 column
 * @method PtkTerdaftar findOneByAktifBulan07(string $aktif_bulan_07) Return the first PtkTerdaftar filtered by the aktif_bulan_07 column
 * @method PtkTerdaftar findOneByAktifBulan08(string $aktif_bulan_08) Return the first PtkTerdaftar filtered by the aktif_bulan_08 column
 * @method PtkTerdaftar findOneByAktifBulan09(string $aktif_bulan_09) Return the first PtkTerdaftar filtered by the aktif_bulan_09 column
 * @method PtkTerdaftar findOneByAktifBulan10(string $aktif_bulan_10) Return the first PtkTerdaftar filtered by the aktif_bulan_10 column
 * @method PtkTerdaftar findOneByAktifBulan11(string $aktif_bulan_11) Return the first PtkTerdaftar filtered by the aktif_bulan_11 column
 * @method PtkTerdaftar findOneByAktifBulan12(string $aktif_bulan_12) Return the first PtkTerdaftar filtered by the aktif_bulan_12 column
 * @method PtkTerdaftar findOneByTglPtkKeluar(string $tgl_ptk_keluar) Return the first PtkTerdaftar filtered by the tgl_ptk_keluar column
 * @method PtkTerdaftar findOneByCreateDate(string $create_date) Return the first PtkTerdaftar filtered by the create_date column
 * @method PtkTerdaftar findOneByLastUpdate(string $last_update) Return the first PtkTerdaftar filtered by the last_update column
 * @method PtkTerdaftar findOneBySoftDelete(string $soft_delete) Return the first PtkTerdaftar filtered by the soft_delete column
 * @method PtkTerdaftar findOneByLastSync(string $last_sync) Return the first PtkTerdaftar filtered by the last_sync column
 * @method PtkTerdaftar findOneByUpdaterId(string $updater_id) Return the first PtkTerdaftar filtered by the updater_id column
 *
 * @method array findByPtkTerdaftarId(string $ptk_terdaftar_id) Return PtkTerdaftar objects filtered by the ptk_terdaftar_id column
 * @method array findByPtkId(string $ptk_id) Return PtkTerdaftar objects filtered by the ptk_id column
 * @method array findBySekolahId(string $sekolah_id) Return PtkTerdaftar objects filtered by the sekolah_id column
 * @method array findByJenisKeluarId(string $jenis_keluar_id) Return PtkTerdaftar objects filtered by the jenis_keluar_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return PtkTerdaftar objects filtered by the tahun_ajaran_id column
 * @method array findByNomorSuratTugas(string $nomor_surat_tugas) Return PtkTerdaftar objects filtered by the nomor_surat_tugas column
 * @method array findByTanggalSuratTugas(string $tanggal_surat_tugas) Return PtkTerdaftar objects filtered by the tanggal_surat_tugas column
 * @method array findByPtkInduk(string $ptk_induk) Return PtkTerdaftar objects filtered by the ptk_induk column
 * @method array findByTmtTugas(string $tmt_tugas) Return PtkTerdaftar objects filtered by the tmt_tugas column
 * @method array findByAktifBulan01(string $aktif_bulan_01) Return PtkTerdaftar objects filtered by the aktif_bulan_01 column
 * @method array findByAktifBulan02(string $aktif_bulan_02) Return PtkTerdaftar objects filtered by the aktif_bulan_02 column
 * @method array findByAktifBulan03(string $aktif_bulan_03) Return PtkTerdaftar objects filtered by the aktif_bulan_03 column
 * @method array findByAktifBulan04(string $aktif_bulan_04) Return PtkTerdaftar objects filtered by the aktif_bulan_04 column
 * @method array findByAktifBulan05(string $aktif_bulan_05) Return PtkTerdaftar objects filtered by the aktif_bulan_05 column
 * @method array findByAktifBulan06(string $aktif_bulan_06) Return PtkTerdaftar objects filtered by the aktif_bulan_06 column
 * @method array findByAktifBulan07(string $aktif_bulan_07) Return PtkTerdaftar objects filtered by the aktif_bulan_07 column
 * @method array findByAktifBulan08(string $aktif_bulan_08) Return PtkTerdaftar objects filtered by the aktif_bulan_08 column
 * @method array findByAktifBulan09(string $aktif_bulan_09) Return PtkTerdaftar objects filtered by the aktif_bulan_09 column
 * @method array findByAktifBulan10(string $aktif_bulan_10) Return PtkTerdaftar objects filtered by the aktif_bulan_10 column
 * @method array findByAktifBulan11(string $aktif_bulan_11) Return PtkTerdaftar objects filtered by the aktif_bulan_11 column
 * @method array findByAktifBulan12(string $aktif_bulan_12) Return PtkTerdaftar objects filtered by the aktif_bulan_12 column
 * @method array findByTglPtkKeluar(string $tgl_ptk_keluar) Return PtkTerdaftar objects filtered by the tgl_ptk_keluar column
 * @method array findByCreateDate(string $create_date) Return PtkTerdaftar objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PtkTerdaftar objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PtkTerdaftar objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PtkTerdaftar objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PtkTerdaftar objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkTerdaftarQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePtkTerdaftarQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PtkTerdaftar', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PtkTerdaftarQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PtkTerdaftarQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PtkTerdaftarQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PtkTerdaftarQuery) {
            return $criteria;
        }
        $query = new PtkTerdaftarQuery();
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
     * @return   PtkTerdaftar|PtkTerdaftar[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PtkTerdaftarPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PtkTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PtkTerdaftar A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPtkTerdaftarId($key, $con = null)
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
     * @return                 PtkTerdaftar A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ptk_terdaftar_id", "ptk_id", "sekolah_id", "jenis_keluar_id", "tahun_ajaran_id", "nomor_surat_tugas", "tanggal_surat_tugas", "ptk_induk", "tmt_tugas", "aktif_bulan_01", "aktif_bulan_02", "aktif_bulan_03", "aktif_bulan_04", "aktif_bulan_05", "aktif_bulan_06", "aktif_bulan_07", "aktif_bulan_08", "aktif_bulan_09", "aktif_bulan_10", "aktif_bulan_11", "aktif_bulan_12", "tgl_ptk_keluar", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "ptk_terdaftar" WHERE "ptk_terdaftar_id" = :p0';
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
            $obj = new PtkTerdaftar();
            $obj->hydrate($row);
            PtkTerdaftarPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PtkTerdaftar|PtkTerdaftar[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PtkTerdaftar[]|mixed the list of results, formatted by the current formatter
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ptk_terdaftar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkTerdaftarId('fooValue');   // WHERE ptk_terdaftar_id = 'fooValue'
     * $query->filterByPtkTerdaftarId('%fooValue%'); // WHERE ptk_terdaftar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkTerdaftarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPtkTerdaftarId($ptkTerdaftarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkTerdaftarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkTerdaftarId)) {
                $ptkTerdaftarId = str_replace('*', '%', $ptkTerdaftarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $ptkTerdaftarId, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkTerdaftarPeer::PTK_ID, $ptkId, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkTerdaftarPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the jenis_keluar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKeluarId('fooValue');   // WHERE jenis_keluar_id = 'fooValue'
     * $query->filterByJenisKeluarId('%fooValue%'); // WHERE jenis_keluar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisKeluarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByJenisKeluarId($jenisKeluarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisKeluarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisKeluarId)) {
                $jenisKeluarId = str_replace('*', '%', $jenisKeluarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluarId, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the nomor_surat_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorSuratTugas('fooValue');   // WHERE nomor_surat_tugas = 'fooValue'
     * $query->filterByNomorSuratTugas('%fooValue%'); // WHERE nomor_surat_tugas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorSuratTugas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByNomorSuratTugas($nomorSuratTugas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorSuratTugas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorSuratTugas)) {
                $nomorSuratTugas = str_replace('*', '%', $nomorSuratTugas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::NOMOR_SURAT_TUGAS, $nomorSuratTugas, $comparison);
    }

    /**
     * Filter the query on the tanggal_surat_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSuratTugas('2011-03-14'); // WHERE tanggal_surat_tugas = '2011-03-14'
     * $query->filterByTanggalSuratTugas('now'); // WHERE tanggal_surat_tugas = '2011-03-14'
     * $query->filterByTanggalSuratTugas(array('max' => 'yesterday')); // WHERE tanggal_surat_tugas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSuratTugas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTanggalSuratTugas($tanggalSuratTugas = null, $comparison = null)
    {
        if (is_array($tanggalSuratTugas)) {
            $useMinMax = false;
            if (isset($tanggalSuratTugas['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSuratTugas['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas, $comparison);
    }

    /**
     * Filter the query on the ptk_induk column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkInduk(1234); // WHERE ptk_induk = 1234
     * $query->filterByPtkInduk(array(12, 34)); // WHERE ptk_induk IN (12, 34)
     * $query->filterByPtkInduk(array('min' => 12)); // WHERE ptk_induk >= 12
     * $query->filterByPtkInduk(array('max' => 12)); // WHERE ptk_induk <= 12
     * </code>
     *
     * @param     mixed $ptkInduk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPtkInduk($ptkInduk = null, $comparison = null)
    {
        if (is_array($ptkInduk)) {
            $useMinMax = false;
            if (isset($ptkInduk['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::PTK_INDUK, $ptkInduk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($ptkInduk['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::PTK_INDUK, $ptkInduk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::PTK_INDUK, $ptkInduk, $comparison);
    }

    /**
     * Filter the query on the tmt_tugas column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtTugas('2011-03-14'); // WHERE tmt_tugas = '2011-03-14'
     * $query->filterByTmtTugas('now'); // WHERE tmt_tugas = '2011-03-14'
     * $query->filterByTmtTugas(array('max' => 'yesterday')); // WHERE tmt_tugas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtTugas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTmtTugas($tmtTugas = null, $comparison = null)
    {
        if (is_array($tmtTugas)) {
            $useMinMax = false;
            if (isset($tmtTugas['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TMT_TUGAS, $tmtTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtTugas['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TMT_TUGAS, $tmtTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::TMT_TUGAS, $tmtTugas, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_01 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan01(1234); // WHERE aktif_bulan_01 = 1234
     * $query->filterByAktifBulan01(array(12, 34)); // WHERE aktif_bulan_01 IN (12, 34)
     * $query->filterByAktifBulan01(array('min' => 12)); // WHERE aktif_bulan_01 >= 12
     * $query->filterByAktifBulan01(array('max' => 12)); // WHERE aktif_bulan_01 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan01 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan01($aktifBulan01 = null, $comparison = null)
    {
        if (is_array($aktifBulan01)) {
            $useMinMax = false;
            if (isset($aktifBulan01['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan01['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_02 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan02(1234); // WHERE aktif_bulan_02 = 1234
     * $query->filterByAktifBulan02(array(12, 34)); // WHERE aktif_bulan_02 IN (12, 34)
     * $query->filterByAktifBulan02(array('min' => 12)); // WHERE aktif_bulan_02 >= 12
     * $query->filterByAktifBulan02(array('max' => 12)); // WHERE aktif_bulan_02 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan02 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan02($aktifBulan02 = null, $comparison = null)
    {
        if (is_array($aktifBulan02)) {
            $useMinMax = false;
            if (isset($aktifBulan02['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan02['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_03 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan03(1234); // WHERE aktif_bulan_03 = 1234
     * $query->filterByAktifBulan03(array(12, 34)); // WHERE aktif_bulan_03 IN (12, 34)
     * $query->filterByAktifBulan03(array('min' => 12)); // WHERE aktif_bulan_03 >= 12
     * $query->filterByAktifBulan03(array('max' => 12)); // WHERE aktif_bulan_03 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan03 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan03($aktifBulan03 = null, $comparison = null)
    {
        if (is_array($aktifBulan03)) {
            $useMinMax = false;
            if (isset($aktifBulan03['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan03['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_04 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan04(1234); // WHERE aktif_bulan_04 = 1234
     * $query->filterByAktifBulan04(array(12, 34)); // WHERE aktif_bulan_04 IN (12, 34)
     * $query->filterByAktifBulan04(array('min' => 12)); // WHERE aktif_bulan_04 >= 12
     * $query->filterByAktifBulan04(array('max' => 12)); // WHERE aktif_bulan_04 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan04 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan04($aktifBulan04 = null, $comparison = null)
    {
        if (is_array($aktifBulan04)) {
            $useMinMax = false;
            if (isset($aktifBulan04['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan04['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_05 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan05(1234); // WHERE aktif_bulan_05 = 1234
     * $query->filterByAktifBulan05(array(12, 34)); // WHERE aktif_bulan_05 IN (12, 34)
     * $query->filterByAktifBulan05(array('min' => 12)); // WHERE aktif_bulan_05 >= 12
     * $query->filterByAktifBulan05(array('max' => 12)); // WHERE aktif_bulan_05 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan05 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan05($aktifBulan05 = null, $comparison = null)
    {
        if (is_array($aktifBulan05)) {
            $useMinMax = false;
            if (isset($aktifBulan05['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan05['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_06 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan06(1234); // WHERE aktif_bulan_06 = 1234
     * $query->filterByAktifBulan06(array(12, 34)); // WHERE aktif_bulan_06 IN (12, 34)
     * $query->filterByAktifBulan06(array('min' => 12)); // WHERE aktif_bulan_06 >= 12
     * $query->filterByAktifBulan06(array('max' => 12)); // WHERE aktif_bulan_06 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan06 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan06($aktifBulan06 = null, $comparison = null)
    {
        if (is_array($aktifBulan06)) {
            $useMinMax = false;
            if (isset($aktifBulan06['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan06['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_07 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan07(1234); // WHERE aktif_bulan_07 = 1234
     * $query->filterByAktifBulan07(array(12, 34)); // WHERE aktif_bulan_07 IN (12, 34)
     * $query->filterByAktifBulan07(array('min' => 12)); // WHERE aktif_bulan_07 >= 12
     * $query->filterByAktifBulan07(array('max' => 12)); // WHERE aktif_bulan_07 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan07 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan07($aktifBulan07 = null, $comparison = null)
    {
        if (is_array($aktifBulan07)) {
            $useMinMax = false;
            if (isset($aktifBulan07['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan07['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_08 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan08(1234); // WHERE aktif_bulan_08 = 1234
     * $query->filterByAktifBulan08(array(12, 34)); // WHERE aktif_bulan_08 IN (12, 34)
     * $query->filterByAktifBulan08(array('min' => 12)); // WHERE aktif_bulan_08 >= 12
     * $query->filterByAktifBulan08(array('max' => 12)); // WHERE aktif_bulan_08 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan08 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan08($aktifBulan08 = null, $comparison = null)
    {
        if (is_array($aktifBulan08)) {
            $useMinMax = false;
            if (isset($aktifBulan08['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan08['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_09 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan09(1234); // WHERE aktif_bulan_09 = 1234
     * $query->filterByAktifBulan09(array(12, 34)); // WHERE aktif_bulan_09 IN (12, 34)
     * $query->filterByAktifBulan09(array('min' => 12)); // WHERE aktif_bulan_09 >= 12
     * $query->filterByAktifBulan09(array('max' => 12)); // WHERE aktif_bulan_09 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan09 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan09($aktifBulan09 = null, $comparison = null)
    {
        if (is_array($aktifBulan09)) {
            $useMinMax = false;
            if (isset($aktifBulan09['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan09['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_10 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan10(1234); // WHERE aktif_bulan_10 = 1234
     * $query->filterByAktifBulan10(array(12, 34)); // WHERE aktif_bulan_10 IN (12, 34)
     * $query->filterByAktifBulan10(array('min' => 12)); // WHERE aktif_bulan_10 >= 12
     * $query->filterByAktifBulan10(array('max' => 12)); // WHERE aktif_bulan_10 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan10 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan10($aktifBulan10 = null, $comparison = null)
    {
        if (is_array($aktifBulan10)) {
            $useMinMax = false;
            if (isset($aktifBulan10['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan10['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_11 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan11(1234); // WHERE aktif_bulan_11 = 1234
     * $query->filterByAktifBulan11(array(12, 34)); // WHERE aktif_bulan_11 IN (12, 34)
     * $query->filterByAktifBulan11(array('min' => 12)); // WHERE aktif_bulan_11 >= 12
     * $query->filterByAktifBulan11(array('max' => 12)); // WHERE aktif_bulan_11 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan11 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan11($aktifBulan11 = null, $comparison = null)
    {
        if (is_array($aktifBulan11)) {
            $useMinMax = false;
            if (isset($aktifBulan11['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan11['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11, $comparison);
    }

    /**
     * Filter the query on the aktif_bulan_12 column
     *
     * Example usage:
     * <code>
     * $query->filterByAktifBulan12(1234); // WHERE aktif_bulan_12 = 1234
     * $query->filterByAktifBulan12(array(12, 34)); // WHERE aktif_bulan_12 IN (12, 34)
     * $query->filterByAktifBulan12(array('min' => 12)); // WHERE aktif_bulan_12 >= 12
     * $query->filterByAktifBulan12(array('max' => 12)); // WHERE aktif_bulan_12 <= 12
     * </code>
     *
     * @param     mixed $aktifBulan12 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan12($aktifBulan12 = null, $comparison = null)
    {
        if (is_array($aktifBulan12)) {
            $useMinMax = false;
            if (isset($aktifBulan12['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan12['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12, $comparison);
    }

    /**
     * Filter the query on the tgl_ptk_keluar column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPtkKeluar('2011-03-14'); // WHERE tgl_ptk_keluar = '2011-03-14'
     * $query->filterByTglPtkKeluar('now'); // WHERE tgl_ptk_keluar = '2011-03-14'
     * $query->filterByTglPtkKeluar(array('max' => 'yesterday')); // WHERE tgl_ptk_keluar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPtkKeluar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTglPtkKeluar($tglPtkKeluar = null, $comparison = null)
    {
        if (is_array($tglPtkKeluar)) {
            $useMinMax = false;
            if (isset($tglPtkKeluar['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TGL_PTK_KELUAR, $tglPtkKeluar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPtkKeluar['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::TGL_PTK_KELUAR, $tglPtkKeluar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::TGL_PTK_KELUAR, $tglPtkKeluar, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PtkTerdaftarPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkTerdaftarPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PtkTerdaftarPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JenisKeluar object
     *
     * @param   JenisKeluar|PropelObjectCollection $jenisKeluar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKeluar($jenisKeluar, $comparison = null)
    {
        if ($jenisKeluar instanceof JenisKeluar) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluar->getJenisKeluarId(), $comparison);
        } elseif ($jenisKeluar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluar->toKeyValue('PrimaryKey', 'JenisKeluarId'), $comparison);
        } else {
            throw new PropelException('filterByJenisKeluar() only accepts arguments of type JenisKeluar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisKeluar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function joinJenisKeluar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisKeluar');

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
            $this->addJoinObject($join, 'JenisKeluar');
        }

        return $this;
    }

    /**
     * Use the JenisKeluar relation JenisKeluar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisKeluarQuery A secondary query class using the current class as primary query
     */
    public function useJenisKeluarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisKeluar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisKeluar', '\DataDikdas\Model\JenisKeluarQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkTerdaftarPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkTerdaftarPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related GuruSasaranPengawas object
     *
     * @param   GuruSasaranPengawas|PropelObjectCollection $guruSasaranPengawas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGuruSasaranPengawas($guruSasaranPengawas, $comparison = null)
    {
        if ($guruSasaranPengawas instanceof GuruSasaranPengawas) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $guruSasaranPengawas->getPtkTerdaftarId(), $comparison);
        } elseif ($guruSasaranPengawas instanceof PropelObjectCollection) {
            return $this
                ->useGuruSasaranPengawasQuery()
                ->filterByPrimaryKeys($guruSasaranPengawas->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGuruSasaranPengawas() only accepts arguments of type GuruSasaranPengawas or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GuruSasaranPengawas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function joinGuruSasaranPengawas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GuruSasaranPengawas');

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
            $this->addJoinObject($join, 'GuruSasaranPengawas');
        }

        return $this;
    }

    /**
     * Use the GuruSasaranPengawas relation GuruSasaranPengawas object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GuruSasaranPengawasQuery A secondary query class using the current class as primary query
     */
    public function useGuruSasaranPengawasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGuruSasaranPengawas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GuruSasaranPengawas', '\DataDikdas\Model\GuruSasaranPengawasQuery');
    }

    /**
     * Filter the query by a related Pembelajaran object
     *
     * @param   Pembelajaran|PropelObjectCollection $pembelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPembelajaran($pembelajaran, $comparison = null)
    {
        if ($pembelajaran instanceof Pembelajaran) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $pembelajaran->getPtkTerdaftarId(), $comparison);
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
     * @return PtkTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related VldPtkTerdaftar object
     *
     * @param   VldPtkTerdaftar|PropelObjectCollection $vldPtkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPtkTerdaftar($vldPtkTerdaftar, $comparison = null)
    {
        if ($vldPtkTerdaftar instanceof VldPtkTerdaftar) {
            return $this
                ->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $vldPtkTerdaftar->getPtkTerdaftarId(), $comparison);
        } elseif ($vldPtkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->useVldPtkTerdaftarQuery()
                ->filterByPrimaryKeys($vldPtkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPtkTerdaftar() only accepts arguments of type VldPtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function joinVldPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPtkTerdaftar');

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
            $this->addJoinObject($join, 'VldPtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the VldPtkTerdaftar relation VldPtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function useVldPtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPtkTerdaftar', '\DataDikdas\Model\VldPtkTerdaftarQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PtkTerdaftar $ptkTerdaftar Object to remove from the list of results
     *
     * @return PtkTerdaftarQuery The current query, for fluid interface
     */
    public function prune($ptkTerdaftar = null)
    {
        if ($ptkTerdaftar) {
            $this->addUsingAlias(PtkTerdaftarPeer::PTK_TERDAFTAR_ID, $ptkTerdaftar->getPtkTerdaftarId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
