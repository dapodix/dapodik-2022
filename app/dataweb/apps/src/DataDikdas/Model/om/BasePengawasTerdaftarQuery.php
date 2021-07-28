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
use DataDikdas\Model\GuruSasaranPengawas;
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\JenjangKepengawasan;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PengawasTerdaftarPeer;
use DataDikdas\Model\PengawasTerdaftarQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\SasaranPengawasan;
use DataDikdas\Model\TahunAjaran;

/**
 * Base class that represents a query for the 'pengawas_terdaftar' table.
 *
 * 
 *
 * @method PengawasTerdaftarQuery orderByPengawasTerdaftarId($order = Criteria::ASC) Order by the pengawas_terdaftar_id column
 * @method PengawasTerdaftarQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method PengawasTerdaftarQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PengawasTerdaftarQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method PengawasTerdaftarQuery orderByNomorSuratTugas($order = Criteria::ASC) Order by the nomor_surat_tugas column
 * @method PengawasTerdaftarQuery orderByTanggalSuratTugas($order = Criteria::ASC) Order by the tanggal_surat_tugas column
 * @method PengawasTerdaftarQuery orderByTmtTugas($order = Criteria::ASC) Order by the tmt_tugas column
 * @method PengawasTerdaftarQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method PengawasTerdaftarQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method PengawasTerdaftarQuery orderByJenjangKepengawasanId($order = Criteria::ASC) Order by the jenjang_kepengawasan_id column
 * @method PengawasTerdaftarQuery orderByAktifBulan01($order = Criteria::ASC) Order by the aktif_bulan_01 column
 * @method PengawasTerdaftarQuery orderByAktifBulan02($order = Criteria::ASC) Order by the aktif_bulan_02 column
 * @method PengawasTerdaftarQuery orderByAktifBulan03($order = Criteria::ASC) Order by the aktif_bulan_03 column
 * @method PengawasTerdaftarQuery orderByAktifBulan04($order = Criteria::ASC) Order by the aktif_bulan_04 column
 * @method PengawasTerdaftarQuery orderByAktifBulan05($order = Criteria::ASC) Order by the aktif_bulan_05 column
 * @method PengawasTerdaftarQuery orderByAktifBulan06($order = Criteria::ASC) Order by the aktif_bulan_06 column
 * @method PengawasTerdaftarQuery orderByAktifBulan07($order = Criteria::ASC) Order by the aktif_bulan_07 column
 * @method PengawasTerdaftarQuery orderByAktifBulan08($order = Criteria::ASC) Order by the aktif_bulan_08 column
 * @method PengawasTerdaftarQuery orderByAktifBulan09($order = Criteria::ASC) Order by the aktif_bulan_09 column
 * @method PengawasTerdaftarQuery orderByAktifBulan10($order = Criteria::ASC) Order by the aktif_bulan_10 column
 * @method PengawasTerdaftarQuery orderByAktifBulan11($order = Criteria::ASC) Order by the aktif_bulan_11 column
 * @method PengawasTerdaftarQuery orderByAktifBulan12($order = Criteria::ASC) Order by the aktif_bulan_12 column
 * @method PengawasTerdaftarQuery orderByJenisKeluarId($order = Criteria::ASC) Order by the jenis_keluar_id column
 * @method PengawasTerdaftarQuery orderByTglPengawasKeluar($order = Criteria::ASC) Order by the tgl_pengawas_keluar column
 * @method PengawasTerdaftarQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PengawasTerdaftarQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PengawasTerdaftarQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PengawasTerdaftarQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PengawasTerdaftarQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PengawasTerdaftarQuery groupByPengawasTerdaftarId() Group by the pengawas_terdaftar_id column
 * @method PengawasTerdaftarQuery groupByLembagaId() Group by the lembaga_id column
 * @method PengawasTerdaftarQuery groupByPtkId() Group by the ptk_id column
 * @method PengawasTerdaftarQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method PengawasTerdaftarQuery groupByNomorSuratTugas() Group by the nomor_surat_tugas column
 * @method PengawasTerdaftarQuery groupByTanggalSuratTugas() Group by the tanggal_surat_tugas column
 * @method PengawasTerdaftarQuery groupByTmtTugas() Group by the tmt_tugas column
 * @method PengawasTerdaftarQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method PengawasTerdaftarQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method PengawasTerdaftarQuery groupByJenjangKepengawasanId() Group by the jenjang_kepengawasan_id column
 * @method PengawasTerdaftarQuery groupByAktifBulan01() Group by the aktif_bulan_01 column
 * @method PengawasTerdaftarQuery groupByAktifBulan02() Group by the aktif_bulan_02 column
 * @method PengawasTerdaftarQuery groupByAktifBulan03() Group by the aktif_bulan_03 column
 * @method PengawasTerdaftarQuery groupByAktifBulan04() Group by the aktif_bulan_04 column
 * @method PengawasTerdaftarQuery groupByAktifBulan05() Group by the aktif_bulan_05 column
 * @method PengawasTerdaftarQuery groupByAktifBulan06() Group by the aktif_bulan_06 column
 * @method PengawasTerdaftarQuery groupByAktifBulan07() Group by the aktif_bulan_07 column
 * @method PengawasTerdaftarQuery groupByAktifBulan08() Group by the aktif_bulan_08 column
 * @method PengawasTerdaftarQuery groupByAktifBulan09() Group by the aktif_bulan_09 column
 * @method PengawasTerdaftarQuery groupByAktifBulan10() Group by the aktif_bulan_10 column
 * @method PengawasTerdaftarQuery groupByAktifBulan11() Group by the aktif_bulan_11 column
 * @method PengawasTerdaftarQuery groupByAktifBulan12() Group by the aktif_bulan_12 column
 * @method PengawasTerdaftarQuery groupByJenisKeluarId() Group by the jenis_keluar_id column
 * @method PengawasTerdaftarQuery groupByTglPengawasKeluar() Group by the tgl_pengawas_keluar column
 * @method PengawasTerdaftarQuery groupByCreateDate() Group by the create_date column
 * @method PengawasTerdaftarQuery groupByLastUpdate() Group by the last_update column
 * @method PengawasTerdaftarQuery groupBySoftDelete() Group by the soft_delete column
 * @method PengawasTerdaftarQuery groupByLastSync() Group by the last_sync column
 * @method PengawasTerdaftarQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PengawasTerdaftarQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PengawasTerdaftarQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PengawasTerdaftarQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PengawasTerdaftarQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method PengawasTerdaftarQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method PengawasTerdaftarQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method PengawasTerdaftarQuery leftJoinJenisKeluar($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKeluar relation
 * @method PengawasTerdaftarQuery rightJoinJenisKeluar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKeluar relation
 * @method PengawasTerdaftarQuery innerJoinJenisKeluar($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKeluar relation
 *
 * @method PengawasTerdaftarQuery leftJoinLembagaNonSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaNonSekolah relation
 * @method PengawasTerdaftarQuery rightJoinLembagaNonSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaNonSekolah relation
 * @method PengawasTerdaftarQuery innerJoinLembagaNonSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaNonSekolah relation
 *
 * @method PengawasTerdaftarQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method PengawasTerdaftarQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method PengawasTerdaftarQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method PengawasTerdaftarQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PengawasTerdaftarQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PengawasTerdaftarQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PengawasTerdaftarQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method PengawasTerdaftarQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method PengawasTerdaftarQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method PengawasTerdaftarQuery leftJoinJenjangKepengawasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangKepengawasan relation
 * @method PengawasTerdaftarQuery rightJoinJenjangKepengawasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangKepengawasan relation
 * @method PengawasTerdaftarQuery innerJoinJenjangKepengawasan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangKepengawasan relation
 *
 * @method PengawasTerdaftarQuery leftJoinGuruSasaranPengawas($relationAlias = null) Adds a LEFT JOIN clause to the query using the GuruSasaranPengawas relation
 * @method PengawasTerdaftarQuery rightJoinGuruSasaranPengawas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GuruSasaranPengawas relation
 * @method PengawasTerdaftarQuery innerJoinGuruSasaranPengawas($relationAlias = null) Adds a INNER JOIN clause to the query using the GuruSasaranPengawas relation
 *
 * @method PengawasTerdaftarQuery leftJoinSasaranPengawasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the SasaranPengawasan relation
 * @method PengawasTerdaftarQuery rightJoinSasaranPengawasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SasaranPengawasan relation
 * @method PengawasTerdaftarQuery innerJoinSasaranPengawasan($relationAlias = null) Adds a INNER JOIN clause to the query using the SasaranPengawasan relation
 *
 * @method PengawasTerdaftar findOne(PropelPDO $con = null) Return the first PengawasTerdaftar matching the query
 * @method PengawasTerdaftar findOneOrCreate(PropelPDO $con = null) Return the first PengawasTerdaftar matching the query, or a new PengawasTerdaftar object populated from the query conditions when no match is found
 *
 * @method PengawasTerdaftar findOneByLembagaId(string $lembaga_id) Return the first PengawasTerdaftar filtered by the lembaga_id column
 * @method PengawasTerdaftar findOneByPtkId(string $ptk_id) Return the first PengawasTerdaftar filtered by the ptk_id column
 * @method PengawasTerdaftar findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first PengawasTerdaftar filtered by the tahun_ajaran_id column
 * @method PengawasTerdaftar findOneByNomorSuratTugas(string $nomor_surat_tugas) Return the first PengawasTerdaftar filtered by the nomor_surat_tugas column
 * @method PengawasTerdaftar findOneByTanggalSuratTugas(string $tanggal_surat_tugas) Return the first PengawasTerdaftar filtered by the tanggal_surat_tugas column
 * @method PengawasTerdaftar findOneByTmtTugas(string $tmt_tugas) Return the first PengawasTerdaftar filtered by the tmt_tugas column
 * @method PengawasTerdaftar findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first PengawasTerdaftar filtered by the mata_pelajaran_id column
 * @method PengawasTerdaftar findOneByBidangStudiId(int $bidang_studi_id) Return the first PengawasTerdaftar filtered by the bidang_studi_id column
 * @method PengawasTerdaftar findOneByJenjangKepengawasanId(string $jenjang_kepengawasan_id) Return the first PengawasTerdaftar filtered by the jenjang_kepengawasan_id column
 * @method PengawasTerdaftar findOneByAktifBulan01(string $aktif_bulan_01) Return the first PengawasTerdaftar filtered by the aktif_bulan_01 column
 * @method PengawasTerdaftar findOneByAktifBulan02(string $aktif_bulan_02) Return the first PengawasTerdaftar filtered by the aktif_bulan_02 column
 * @method PengawasTerdaftar findOneByAktifBulan03(string $aktif_bulan_03) Return the first PengawasTerdaftar filtered by the aktif_bulan_03 column
 * @method PengawasTerdaftar findOneByAktifBulan04(string $aktif_bulan_04) Return the first PengawasTerdaftar filtered by the aktif_bulan_04 column
 * @method PengawasTerdaftar findOneByAktifBulan05(string $aktif_bulan_05) Return the first PengawasTerdaftar filtered by the aktif_bulan_05 column
 * @method PengawasTerdaftar findOneByAktifBulan06(string $aktif_bulan_06) Return the first PengawasTerdaftar filtered by the aktif_bulan_06 column
 * @method PengawasTerdaftar findOneByAktifBulan07(string $aktif_bulan_07) Return the first PengawasTerdaftar filtered by the aktif_bulan_07 column
 * @method PengawasTerdaftar findOneByAktifBulan08(string $aktif_bulan_08) Return the first PengawasTerdaftar filtered by the aktif_bulan_08 column
 * @method PengawasTerdaftar findOneByAktifBulan09(string $aktif_bulan_09) Return the first PengawasTerdaftar filtered by the aktif_bulan_09 column
 * @method PengawasTerdaftar findOneByAktifBulan10(string $aktif_bulan_10) Return the first PengawasTerdaftar filtered by the aktif_bulan_10 column
 * @method PengawasTerdaftar findOneByAktifBulan11(string $aktif_bulan_11) Return the first PengawasTerdaftar filtered by the aktif_bulan_11 column
 * @method PengawasTerdaftar findOneByAktifBulan12(string $aktif_bulan_12) Return the first PengawasTerdaftar filtered by the aktif_bulan_12 column
 * @method PengawasTerdaftar findOneByJenisKeluarId(string $jenis_keluar_id) Return the first PengawasTerdaftar filtered by the jenis_keluar_id column
 * @method PengawasTerdaftar findOneByTglPengawasKeluar(string $tgl_pengawas_keluar) Return the first PengawasTerdaftar filtered by the tgl_pengawas_keluar column
 * @method PengawasTerdaftar findOneByCreateDate(string $create_date) Return the first PengawasTerdaftar filtered by the create_date column
 * @method PengawasTerdaftar findOneByLastUpdate(string $last_update) Return the first PengawasTerdaftar filtered by the last_update column
 * @method PengawasTerdaftar findOneBySoftDelete(string $soft_delete) Return the first PengawasTerdaftar filtered by the soft_delete column
 * @method PengawasTerdaftar findOneByLastSync(string $last_sync) Return the first PengawasTerdaftar filtered by the last_sync column
 * @method PengawasTerdaftar findOneByUpdaterId(string $updater_id) Return the first PengawasTerdaftar filtered by the updater_id column
 *
 * @method array findByPengawasTerdaftarId(string $pengawas_terdaftar_id) Return PengawasTerdaftar objects filtered by the pengawas_terdaftar_id column
 * @method array findByLembagaId(string $lembaga_id) Return PengawasTerdaftar objects filtered by the lembaga_id column
 * @method array findByPtkId(string $ptk_id) Return PengawasTerdaftar objects filtered by the ptk_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return PengawasTerdaftar objects filtered by the tahun_ajaran_id column
 * @method array findByNomorSuratTugas(string $nomor_surat_tugas) Return PengawasTerdaftar objects filtered by the nomor_surat_tugas column
 * @method array findByTanggalSuratTugas(string $tanggal_surat_tugas) Return PengawasTerdaftar objects filtered by the tanggal_surat_tugas column
 * @method array findByTmtTugas(string $tmt_tugas) Return PengawasTerdaftar objects filtered by the tmt_tugas column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return PengawasTerdaftar objects filtered by the mata_pelajaran_id column
 * @method array findByBidangStudiId(int $bidang_studi_id) Return PengawasTerdaftar objects filtered by the bidang_studi_id column
 * @method array findByJenjangKepengawasanId(string $jenjang_kepengawasan_id) Return PengawasTerdaftar objects filtered by the jenjang_kepengawasan_id column
 * @method array findByAktifBulan01(string $aktif_bulan_01) Return PengawasTerdaftar objects filtered by the aktif_bulan_01 column
 * @method array findByAktifBulan02(string $aktif_bulan_02) Return PengawasTerdaftar objects filtered by the aktif_bulan_02 column
 * @method array findByAktifBulan03(string $aktif_bulan_03) Return PengawasTerdaftar objects filtered by the aktif_bulan_03 column
 * @method array findByAktifBulan04(string $aktif_bulan_04) Return PengawasTerdaftar objects filtered by the aktif_bulan_04 column
 * @method array findByAktifBulan05(string $aktif_bulan_05) Return PengawasTerdaftar objects filtered by the aktif_bulan_05 column
 * @method array findByAktifBulan06(string $aktif_bulan_06) Return PengawasTerdaftar objects filtered by the aktif_bulan_06 column
 * @method array findByAktifBulan07(string $aktif_bulan_07) Return PengawasTerdaftar objects filtered by the aktif_bulan_07 column
 * @method array findByAktifBulan08(string $aktif_bulan_08) Return PengawasTerdaftar objects filtered by the aktif_bulan_08 column
 * @method array findByAktifBulan09(string $aktif_bulan_09) Return PengawasTerdaftar objects filtered by the aktif_bulan_09 column
 * @method array findByAktifBulan10(string $aktif_bulan_10) Return PengawasTerdaftar objects filtered by the aktif_bulan_10 column
 * @method array findByAktifBulan11(string $aktif_bulan_11) Return PengawasTerdaftar objects filtered by the aktif_bulan_11 column
 * @method array findByAktifBulan12(string $aktif_bulan_12) Return PengawasTerdaftar objects filtered by the aktif_bulan_12 column
 * @method array findByJenisKeluarId(string $jenis_keluar_id) Return PengawasTerdaftar objects filtered by the jenis_keluar_id column
 * @method array findByTglPengawasKeluar(string $tgl_pengawas_keluar) Return PengawasTerdaftar objects filtered by the tgl_pengawas_keluar column
 * @method array findByCreateDate(string $create_date) Return PengawasTerdaftar objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PengawasTerdaftar objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PengawasTerdaftar objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PengawasTerdaftar objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PengawasTerdaftar objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePengawasTerdaftarQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePengawasTerdaftarQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PengawasTerdaftar', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PengawasTerdaftarQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PengawasTerdaftarQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PengawasTerdaftarQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PengawasTerdaftarQuery) {
            return $criteria;
        }
        $query = new PengawasTerdaftarQuery();
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
     * @return   PengawasTerdaftar|PengawasTerdaftar[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PengawasTerdaftarPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PengawasTerdaftarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PengawasTerdaftar A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPengawasTerdaftarId($key, $con = null)
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
     * @return                 PengawasTerdaftar A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pengawas_terdaftar_id", "lembaga_id", "ptk_id", "tahun_ajaran_id", "nomor_surat_tugas", "tanggal_surat_tugas", "tmt_tugas", "mata_pelajaran_id", "bidang_studi_id", "jenjang_kepengawasan_id", "aktif_bulan_01", "aktif_bulan_02", "aktif_bulan_03", "aktif_bulan_04", "aktif_bulan_05", "aktif_bulan_06", "aktif_bulan_07", "aktif_bulan_08", "aktif_bulan_09", "aktif_bulan_10", "aktif_bulan_11", "aktif_bulan_12", "jenis_keluar_id", "tgl_pengawas_keluar", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "pengawas_terdaftar" WHERE "pengawas_terdaftar_id" = :p0';
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
            $obj = new PengawasTerdaftar();
            $obj->hydrate($row);
            PengawasTerdaftarPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PengawasTerdaftar|PengawasTerdaftar[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PengawasTerdaftar[]|mixed the list of results, formatted by the current formatter
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pengawas_terdaftar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasTerdaftarId('fooValue');   // WHERE pengawas_terdaftar_id = 'fooValue'
     * $query->filterByPengawasTerdaftarId('%fooValue%'); // WHERE pengawas_terdaftar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengawasTerdaftarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByPengawasTerdaftarId($pengawasTerdaftarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengawasTerdaftarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pengawasTerdaftarId)) {
                $pengawasTerdaftarId = str_replace('*', '%', $pengawasTerdaftarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $pengawasTerdaftarId, $comparison);
    }

    /**
     * Filter the query on the lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaId('fooValue');   // WHERE lembaga_id = 'fooValue'
     * $query->filterByLembagaId('%fooValue%'); // WHERE lembaga_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lembagaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByLembagaId($lembagaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lembagaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lembagaId)) {
                $lembagaId = str_replace('*', '%', $lembagaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::LEMBAGA_ID, $lembagaId, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PengawasTerdaftarPeer::PTK_ID, $ptkId, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PengawasTerdaftarPeer::NOMOR_SURAT_TUGAS, $nomorSuratTugas, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTanggalSuratTugas($tanggalSuratTugas = null, $comparison = null)
    {
        if (is_array($tanggalSuratTugas)) {
            $useMinMax = false;
            if (isset($tanggalSuratTugas['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSuratTugas['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::TANGGAL_SURAT_TUGAS, $tanggalSuratTugas, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTmtTugas($tmtTugas = null, $comparison = null)
    {
        if (is_array($tmtTugas)) {
            $useMinMax = false;
            if (isset($tmtTugas['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TMT_TUGAS, $tmtTugas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtTugas['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TMT_TUGAS, $tmtTugas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::TMT_TUGAS, $tmtTugas, $comparison);
    }

    /**
     * Filter the query on the mata_pelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMataPelajaranId(1234); // WHERE mata_pelajaran_id = 1234
     * $query->filterByMataPelajaranId(array(12, 34)); // WHERE mata_pelajaran_id IN (12, 34)
     * $query->filterByMataPelajaranId(array('min' => 12)); // WHERE mata_pelajaran_id >= 12
     * $query->filterByMataPelajaranId(array('max' => 12)); // WHERE mata_pelajaran_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaran()
     *
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
    }

    /**
     * Filter the query on the jenjang_kepengawasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangKepengawasanId(1234); // WHERE jenjang_kepengawasan_id = 1234
     * $query->filterByJenjangKepengawasanId(array(12, 34)); // WHERE jenjang_kepengawasan_id IN (12, 34)
     * $query->filterByJenjangKepengawasanId(array('min' => 12)); // WHERE jenjang_kepengawasan_id >= 12
     * $query->filterByJenjangKepengawasanId(array('max' => 12)); // WHERE jenjang_kepengawasan_id <= 12
     * </code>
     *
     * @see       filterByJenjangKepengawasan()
     *
     * @param     mixed $jenjangKepengawasanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByJenjangKepengawasanId($jenjangKepengawasanId = null, $comparison = null)
    {
        if (is_array($jenjangKepengawasanId)) {
            $useMinMax = false;
            if (isset($jenjangKepengawasanId['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangKepengawasanId['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasanId, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan01($aktifBulan01 = null, $comparison = null)
    {
        if (is_array($aktifBulan01)) {
            $useMinMax = false;
            if (isset($aktifBulan01['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan01['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_01, $aktifBulan01, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan02($aktifBulan02 = null, $comparison = null)
    {
        if (is_array($aktifBulan02)) {
            $useMinMax = false;
            if (isset($aktifBulan02['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan02['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_02, $aktifBulan02, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan03($aktifBulan03 = null, $comparison = null)
    {
        if (is_array($aktifBulan03)) {
            $useMinMax = false;
            if (isset($aktifBulan03['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan03['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_03, $aktifBulan03, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan04($aktifBulan04 = null, $comparison = null)
    {
        if (is_array($aktifBulan04)) {
            $useMinMax = false;
            if (isset($aktifBulan04['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan04['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_04, $aktifBulan04, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan05($aktifBulan05 = null, $comparison = null)
    {
        if (is_array($aktifBulan05)) {
            $useMinMax = false;
            if (isset($aktifBulan05['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan05['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_05, $aktifBulan05, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan06($aktifBulan06 = null, $comparison = null)
    {
        if (is_array($aktifBulan06)) {
            $useMinMax = false;
            if (isset($aktifBulan06['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan06['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_06, $aktifBulan06, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan07($aktifBulan07 = null, $comparison = null)
    {
        if (is_array($aktifBulan07)) {
            $useMinMax = false;
            if (isset($aktifBulan07['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan07['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_07, $aktifBulan07, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan08($aktifBulan08 = null, $comparison = null)
    {
        if (is_array($aktifBulan08)) {
            $useMinMax = false;
            if (isset($aktifBulan08['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan08['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_08, $aktifBulan08, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan09($aktifBulan09 = null, $comparison = null)
    {
        if (is_array($aktifBulan09)) {
            $useMinMax = false;
            if (isset($aktifBulan09['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan09['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_09, $aktifBulan09, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan10($aktifBulan10 = null, $comparison = null)
    {
        if (is_array($aktifBulan10)) {
            $useMinMax = false;
            if (isset($aktifBulan10['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan10['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_10, $aktifBulan10, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan11($aktifBulan11 = null, $comparison = null)
    {
        if (is_array($aktifBulan11)) {
            $useMinMax = false;
            if (isset($aktifBulan11['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan11['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_11, $aktifBulan11, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByAktifBulan12($aktifBulan12 = null, $comparison = null)
    {
        if (is_array($aktifBulan12)) {
            $useMinMax = false;
            if (isset($aktifBulan12['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktifBulan12['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::AKTIF_BULAN_12, $aktifBulan12, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PengawasTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluarId, $comparison);
    }

    /**
     * Filter the query on the tgl_pengawas_keluar column
     *
     * Example usage:
     * <code>
     * $query->filterByTglPengawasKeluar('2011-03-14'); // WHERE tgl_pengawas_keluar = '2011-03-14'
     * $query->filterByTglPengawasKeluar('now'); // WHERE tgl_pengawas_keluar = '2011-03-14'
     * $query->filterByTglPengawasKeluar(array('max' => 'yesterday')); // WHERE tgl_pengawas_keluar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglPengawasKeluar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByTglPengawasKeluar($tglPengawasKeluar = null, $comparison = null)
    {
        if (is_array($tglPengawasKeluar)) {
            $useMinMax = false;
            if (isset($tglPengawasKeluar['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR, $tglPengawasKeluar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglPengawasKeluar['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR, $tglPengawasKeluar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::TGL_PENGAWAS_KELUAR, $tglPengawasKeluar, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PengawasTerdaftarPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PengawasTerdaftarPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PengawasTerdaftarPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function joinBidangStudi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useBidangStudiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBidangStudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudi', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Filter the query by a related JenisKeluar object
     *
     * @param   JenisKeluar|PropelObjectCollection $jenisKeluar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKeluar($jenisKeluar, $comparison = null)
    {
        if ($jenisKeluar instanceof JenisKeluar) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluar->getJenisKeluarId(), $comparison);
        } elseif ($jenisKeluar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::JENIS_KELUAR_ID, $jenisKeluar->toKeyValue('PrimaryKey', 'JenisKeluarId'), $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related LembagaNonSekolah object
     *
     * @param   LembagaNonSekolah|PropelObjectCollection $lembagaNonSekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaNonSekolah($lembagaNonSekolah, $comparison = null)
    {
        if ($lembagaNonSekolah instanceof LembagaNonSekolah) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::LEMBAGA_ID, $lembagaNonSekolah->getLembagaId(), $comparison);
        } elseif ($lembagaNonSekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::LEMBAGA_ID, $lembagaNonSekolah->toKeyValue('PrimaryKey', 'LembagaId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaNonSekolah() only accepts arguments of type LembagaNonSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaNonSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function joinLembagaNonSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaNonSekolah');

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
            $this->addJoinObject($join, 'LembagaNonSekolah');
        }

        return $this;
    }

    /**
     * Use the LembagaNonSekolah relation LembagaNonSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaNonSekolahQuery A secondary query class using the current class as primary query
     */
    public function useLembagaNonSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaNonSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaNonSekolah', '\DataDikdas\Model\LembagaNonSekolahQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related JenjangKepengawasan object
     *
     * @param   JenjangKepengawasan|PropelObjectCollection $jenjangKepengawasan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangKepengawasan($jenjangKepengawasan, $comparison = null)
    {
        if ($jenjangKepengawasan instanceof JenjangKepengawasan) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasan->getJenjangKepengawasanId(), $comparison);
        } elseif ($jenjangKepengawasan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::JENJANG_KEPENGAWASAN_ID, $jenjangKepengawasan->toKeyValue('PrimaryKey', 'JenjangKepengawasanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangKepengawasan() only accepts arguments of type JenjangKepengawasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangKepengawasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function joinJenjangKepengawasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangKepengawasan');

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
            $this->addJoinObject($join, 'JenjangKepengawasan');
        }

        return $this;
    }

    /**
     * Use the JenjangKepengawasan relation JenjangKepengawasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangKepengawasanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangKepengawasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenjangKepengawasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangKepengawasan', '\DataDikdas\Model\JenjangKepengawasanQuery');
    }

    /**
     * Filter the query by a related GuruSasaranPengawas object
     *
     * @param   GuruSasaranPengawas|PropelObjectCollection $guruSasaranPengawas  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGuruSasaranPengawas($guruSasaranPengawas, $comparison = null)
    {
        if ($guruSasaranPengawas instanceof GuruSasaranPengawas) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $guruSasaranPengawas->getPengawasTerdaftarId(), $comparison);
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
     * @return PengawasTerdaftarQuery The current query, for fluid interface
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
     * Filter the query by a related SasaranPengawasan object
     *
     * @param   SasaranPengawasan|PropelObjectCollection $sasaranPengawasan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PengawasTerdaftarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySasaranPengawasan($sasaranPengawasan, $comparison = null)
    {
        if ($sasaranPengawasan instanceof SasaranPengawasan) {
            return $this
                ->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $sasaranPengawasan->getPengawasTerdaftarId(), $comparison);
        } elseif ($sasaranPengawasan instanceof PropelObjectCollection) {
            return $this
                ->useSasaranPengawasanQuery()
                ->filterByPrimaryKeys($sasaranPengawasan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySasaranPengawasan() only accepts arguments of type SasaranPengawasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SasaranPengawasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function joinSasaranPengawasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SasaranPengawasan');

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
            $this->addJoinObject($join, 'SasaranPengawasan');
        }

        return $this;
    }

    /**
     * Use the SasaranPengawasan relation SasaranPengawasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SasaranPengawasanQuery A secondary query class using the current class as primary query
     */
    public function useSasaranPengawasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSasaranPengawasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SasaranPengawasan', '\DataDikdas\Model\SasaranPengawasanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PengawasTerdaftar $pengawasTerdaftar Object to remove from the list of results
     *
     * @return PengawasTerdaftarQuery The current query, for fluid interface
     */
    public function prune($pengawasTerdaftar = null)
    {
        if ($pengawasTerdaftar) {
            $this->addUsingAlias(PengawasTerdaftarPeer::PENGAWAS_TERDAFTAR_ID, $pengawasTerdaftar->getPengawasTerdaftarId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
