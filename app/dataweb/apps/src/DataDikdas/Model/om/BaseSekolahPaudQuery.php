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
use DataDikdas\Model\BentukLembaga;
use DataDikdas\Model\FasilitasLayanan;
use DataDikdas\Model\JadwalPaud;
use DataDikdas\Model\KategoriTk;
use DataDikdas\Model\KlasifikasiLembaga;
use DataDikdas\Model\LembagaPengangkat;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahPaud;
use DataDikdas\Model\SekolahPaudPeer;
use DataDikdas\Model\SekolahPaudQuery;
use DataDikdas\Model\SumberDanaSekolah;

/**
 * Base class that represents a query for the 'sekolah_paud' table.
 *
 * 
 *
 * @method SekolahPaudQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method SekolahPaudQuery orderByKategoriTkId($order = Criteria::ASC) Order by the kategori_tk_id column
 * @method SekolahPaudQuery orderByKlasifikasiLembagaId($order = Criteria::ASC) Order by the klasifikasi_lembaga_id column
 * @method SekolahPaudQuery orderBySumberDanaSekolahId($order = Criteria::ASC) Order by the sumber_dana_sekolah_id column
 * @method SekolahPaudQuery orderByFasilitasLayananId($order = Criteria::ASC) Order by the fasilitas_layanan_id column
 * @method SekolahPaudQuery orderByJadwalPmtas($order = Criteria::ASC) Order by the jadwal_pmtas column
 * @method SekolahPaudQuery orderByLembagaPengangkatId($order = Criteria::ASC) Order by the lembaga_pengangkat_id column
 * @method SekolahPaudQuery orderByJadwalDdtk($order = Criteria::ASC) Order by the jadwal_ddtk column
 * @method SekolahPaudQuery orderByFreqParenting($order = Criteria::ASC) Order by the freq_parenting column
 * @method SekolahPaudQuery orderByBentukLembagaId($order = Criteria::ASC) Order by the bentuk_lembaga_id column
 * @method SekolahPaudQuery orderByJadwalKesehatan($order = Criteria::ASC) Order by the jadwal_kesehatan column
 * @method SekolahPaudQuery orderByIzinPaud($order = Criteria::ASC) Order by the izin_paud column
 * @method SekolahPaudQuery orderByPencatatanDdtk($order = Criteria::ASC) Order by the pencatatan_ddtk column
 * @method SekolahPaudQuery orderByRujukanDdtk($order = Criteria::ASC) Order by the rujukan_ddtk column
 * @method SekolahPaudQuery orderByPelaksanaanParenting($order = Criteria::ASC) Order by the pelaksanaan_parenting column
 * @method SekolahPaudQuery orderByParentingKpo($order = Criteria::ASC) Order by the parenting_kpo column
 * @method SekolahPaudQuery orderByParentingKelas($order = Criteria::ASC) Order by the parenting_kelas column
 * @method SekolahPaudQuery orderByParentingKegiatan($order = Criteria::ASC) Order by the parenting_kegiatan column
 * @method SekolahPaudQuery orderByParentingKonsultasi($order = Criteria::ASC) Order by the parenting_konsultasi column
 * @method SekolahPaudQuery orderByParentingKunjungan($order = Criteria::ASC) Order by the parenting_kunjungan column
 * @method SekolahPaudQuery orderByParentingLainnya($order = Criteria::ASC) Order by the parenting_lainnya column
 * @method SekolahPaudQuery orderByNilk($order = Criteria::ASC) Order by the nilk column
 * @method SekolahPaudQuery orderByNilm($order = Criteria::ASC) Order by the nilm column
 * @method SekolahPaudQuery orderByNoPenetapanPnf($order = Criteria::ASC) Order by the no_penetapan_pnf column
 * @method SekolahPaudQuery orderByTanggalPenetapanPnf($order = Criteria::ASC) Order by the tanggal_penetapan_pnf column
 * @method SekolahPaudQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method SekolahPaudQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method SekolahPaudQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method SekolahPaudQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method SekolahPaudQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method SekolahPaudQuery groupBySekolahId() Group by the sekolah_id column
 * @method SekolahPaudQuery groupByKategoriTkId() Group by the kategori_tk_id column
 * @method SekolahPaudQuery groupByKlasifikasiLembagaId() Group by the klasifikasi_lembaga_id column
 * @method SekolahPaudQuery groupBySumberDanaSekolahId() Group by the sumber_dana_sekolah_id column
 * @method SekolahPaudQuery groupByFasilitasLayananId() Group by the fasilitas_layanan_id column
 * @method SekolahPaudQuery groupByJadwalPmtas() Group by the jadwal_pmtas column
 * @method SekolahPaudQuery groupByLembagaPengangkatId() Group by the lembaga_pengangkat_id column
 * @method SekolahPaudQuery groupByJadwalDdtk() Group by the jadwal_ddtk column
 * @method SekolahPaudQuery groupByFreqParenting() Group by the freq_parenting column
 * @method SekolahPaudQuery groupByBentukLembagaId() Group by the bentuk_lembaga_id column
 * @method SekolahPaudQuery groupByJadwalKesehatan() Group by the jadwal_kesehatan column
 * @method SekolahPaudQuery groupByIzinPaud() Group by the izin_paud column
 * @method SekolahPaudQuery groupByPencatatanDdtk() Group by the pencatatan_ddtk column
 * @method SekolahPaudQuery groupByRujukanDdtk() Group by the rujukan_ddtk column
 * @method SekolahPaudQuery groupByPelaksanaanParenting() Group by the pelaksanaan_parenting column
 * @method SekolahPaudQuery groupByParentingKpo() Group by the parenting_kpo column
 * @method SekolahPaudQuery groupByParentingKelas() Group by the parenting_kelas column
 * @method SekolahPaudQuery groupByParentingKegiatan() Group by the parenting_kegiatan column
 * @method SekolahPaudQuery groupByParentingKonsultasi() Group by the parenting_konsultasi column
 * @method SekolahPaudQuery groupByParentingKunjungan() Group by the parenting_kunjungan column
 * @method SekolahPaudQuery groupByParentingLainnya() Group by the parenting_lainnya column
 * @method SekolahPaudQuery groupByNilk() Group by the nilk column
 * @method SekolahPaudQuery groupByNilm() Group by the nilm column
 * @method SekolahPaudQuery groupByNoPenetapanPnf() Group by the no_penetapan_pnf column
 * @method SekolahPaudQuery groupByTanggalPenetapanPnf() Group by the tanggal_penetapan_pnf column
 * @method SekolahPaudQuery groupByCreateDate() Group by the create_date column
 * @method SekolahPaudQuery groupByLastUpdate() Group by the last_update column
 * @method SekolahPaudQuery groupBySoftDelete() Group by the soft_delete column
 * @method SekolahPaudQuery groupByLastSync() Group by the last_sync column
 * @method SekolahPaudQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method SekolahPaudQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SekolahPaudQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SekolahPaudQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SekolahPaudQuery leftJoinBentukLembaga($relationAlias = null) Adds a LEFT JOIN clause to the query using the BentukLembaga relation
 * @method SekolahPaudQuery rightJoinBentukLembaga($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BentukLembaga relation
 * @method SekolahPaudQuery innerJoinBentukLembaga($relationAlias = null) Adds a INNER JOIN clause to the query using the BentukLembaga relation
 *
 * @method SekolahPaudQuery leftJoinFasilitasLayanan($relationAlias = null) Adds a LEFT JOIN clause to the query using the FasilitasLayanan relation
 * @method SekolahPaudQuery rightJoinFasilitasLayanan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the FasilitasLayanan relation
 * @method SekolahPaudQuery innerJoinFasilitasLayanan($relationAlias = null) Adds a INNER JOIN clause to the query using the FasilitasLayanan relation
 *
 * @method SekolahPaudQuery leftJoinJadwalPaudRelatedByFreqParenting($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalPaudRelatedByFreqParenting relation
 * @method SekolahPaudQuery rightJoinJadwalPaudRelatedByFreqParenting($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalPaudRelatedByFreqParenting relation
 * @method SekolahPaudQuery innerJoinJadwalPaudRelatedByFreqParenting($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalPaudRelatedByFreqParenting relation
 *
 * @method SekolahPaudQuery leftJoinJadwalPaudRelatedByJadwalDdtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalPaudRelatedByJadwalDdtk relation
 * @method SekolahPaudQuery rightJoinJadwalPaudRelatedByJadwalDdtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalPaudRelatedByJadwalDdtk relation
 * @method SekolahPaudQuery innerJoinJadwalPaudRelatedByJadwalDdtk($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalPaudRelatedByJadwalDdtk relation
 *
 * @method SekolahPaudQuery leftJoinJadwalPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalPaudRelatedByJadwalKesehatan relation
 * @method SekolahPaudQuery rightJoinJadwalPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalPaudRelatedByJadwalKesehatan relation
 * @method SekolahPaudQuery innerJoinJadwalPaudRelatedByJadwalKesehatan($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalPaudRelatedByJadwalKesehatan relation
 *
 * @method SekolahPaudQuery leftJoinJadwalPaudRelatedByJadwalPmtas($relationAlias = null) Adds a LEFT JOIN clause to the query using the JadwalPaudRelatedByJadwalPmtas relation
 * @method SekolahPaudQuery rightJoinJadwalPaudRelatedByJadwalPmtas($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JadwalPaudRelatedByJadwalPmtas relation
 * @method SekolahPaudQuery innerJoinJadwalPaudRelatedByJadwalPmtas($relationAlias = null) Adds a INNER JOIN clause to the query using the JadwalPaudRelatedByJadwalPmtas relation
 *
 * @method SekolahPaudQuery leftJoinKategoriTk($relationAlias = null) Adds a LEFT JOIN clause to the query using the KategoriTk relation
 * @method SekolahPaudQuery rightJoinKategoriTk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KategoriTk relation
 * @method SekolahPaudQuery innerJoinKategoriTk($relationAlias = null) Adds a INNER JOIN clause to the query using the KategoriTk relation
 *
 * @method SekolahPaudQuery leftJoinKlasifikasiLembaga($relationAlias = null) Adds a LEFT JOIN clause to the query using the KlasifikasiLembaga relation
 * @method SekolahPaudQuery rightJoinKlasifikasiLembaga($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KlasifikasiLembaga relation
 * @method SekolahPaudQuery innerJoinKlasifikasiLembaga($relationAlias = null) Adds a INNER JOIN clause to the query using the KlasifikasiLembaga relation
 *
 * @method SekolahPaudQuery leftJoinLembagaPengangkat($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaPengangkat relation
 * @method SekolahPaudQuery rightJoinLembagaPengangkat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaPengangkat relation
 * @method SekolahPaudQuery innerJoinLembagaPengangkat($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaPengangkat relation
 *
 * @method SekolahPaudQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method SekolahPaudQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method SekolahPaudQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method SekolahPaudQuery leftJoinSumberDanaSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberDanaSekolah relation
 * @method SekolahPaudQuery rightJoinSumberDanaSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberDanaSekolah relation
 * @method SekolahPaudQuery innerJoinSumberDanaSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberDanaSekolah relation
 *
 * @method SekolahPaud findOne(PropelPDO $con = null) Return the first SekolahPaud matching the query
 * @method SekolahPaud findOneOrCreate(PropelPDO $con = null) Return the first SekolahPaud matching the query, or a new SekolahPaud object populated from the query conditions when no match is found
 *
 * @method SekolahPaud findOneByKategoriTkId(string $kategori_tk_id) Return the first SekolahPaud filtered by the kategori_tk_id column
 * @method SekolahPaud findOneByKlasifikasiLembagaId(string $klasifikasi_lembaga_id) Return the first SekolahPaud filtered by the klasifikasi_lembaga_id column
 * @method SekolahPaud findOneBySumberDanaSekolahId(string $sumber_dana_sekolah_id) Return the first SekolahPaud filtered by the sumber_dana_sekolah_id column
 * @method SekolahPaud findOneByFasilitasLayananId(string $fasilitas_layanan_id) Return the first SekolahPaud filtered by the fasilitas_layanan_id column
 * @method SekolahPaud findOneByJadwalPmtas(string $jadwal_pmtas) Return the first SekolahPaud filtered by the jadwal_pmtas column
 * @method SekolahPaud findOneByLembagaPengangkatId(string $lembaga_pengangkat_id) Return the first SekolahPaud filtered by the lembaga_pengangkat_id column
 * @method SekolahPaud findOneByJadwalDdtk(string $jadwal_ddtk) Return the first SekolahPaud filtered by the jadwal_ddtk column
 * @method SekolahPaud findOneByFreqParenting(string $freq_parenting) Return the first SekolahPaud filtered by the freq_parenting column
 * @method SekolahPaud findOneByBentukLembagaId(string $bentuk_lembaga_id) Return the first SekolahPaud filtered by the bentuk_lembaga_id column
 * @method SekolahPaud findOneByJadwalKesehatan(string $jadwal_kesehatan) Return the first SekolahPaud filtered by the jadwal_kesehatan column
 * @method SekolahPaud findOneByIzinPaud(string $izin_paud) Return the first SekolahPaud filtered by the izin_paud column
 * @method SekolahPaud findOneByPencatatanDdtk(string $pencatatan_ddtk) Return the first SekolahPaud filtered by the pencatatan_ddtk column
 * @method SekolahPaud findOneByRujukanDdtk(string $rujukan_ddtk) Return the first SekolahPaud filtered by the rujukan_ddtk column
 * @method SekolahPaud findOneByPelaksanaanParenting(string $pelaksanaan_parenting) Return the first SekolahPaud filtered by the pelaksanaan_parenting column
 * @method SekolahPaud findOneByParentingKpo(string $parenting_kpo) Return the first SekolahPaud filtered by the parenting_kpo column
 * @method SekolahPaud findOneByParentingKelas(string $parenting_kelas) Return the first SekolahPaud filtered by the parenting_kelas column
 * @method SekolahPaud findOneByParentingKegiatan(string $parenting_kegiatan) Return the first SekolahPaud filtered by the parenting_kegiatan column
 * @method SekolahPaud findOneByParentingKonsultasi(string $parenting_konsultasi) Return the first SekolahPaud filtered by the parenting_konsultasi column
 * @method SekolahPaud findOneByParentingKunjungan(string $parenting_kunjungan) Return the first SekolahPaud filtered by the parenting_kunjungan column
 * @method SekolahPaud findOneByParentingLainnya(string $parenting_lainnya) Return the first SekolahPaud filtered by the parenting_lainnya column
 * @method SekolahPaud findOneByNilk(string $nilk) Return the first SekolahPaud filtered by the nilk column
 * @method SekolahPaud findOneByNilm(string $nilm) Return the first SekolahPaud filtered by the nilm column
 * @method SekolahPaud findOneByNoPenetapanPnf(string $no_penetapan_pnf) Return the first SekolahPaud filtered by the no_penetapan_pnf column
 * @method SekolahPaud findOneByTanggalPenetapanPnf(string $tanggal_penetapan_pnf) Return the first SekolahPaud filtered by the tanggal_penetapan_pnf column
 * @method SekolahPaud findOneByCreateDate(string $create_date) Return the first SekolahPaud filtered by the create_date column
 * @method SekolahPaud findOneByLastUpdate(string $last_update) Return the first SekolahPaud filtered by the last_update column
 * @method SekolahPaud findOneBySoftDelete(string $soft_delete) Return the first SekolahPaud filtered by the soft_delete column
 * @method SekolahPaud findOneByLastSync(string $last_sync) Return the first SekolahPaud filtered by the last_sync column
 * @method SekolahPaud findOneByUpdaterId(string $updater_id) Return the first SekolahPaud filtered by the updater_id column
 *
 * @method array findBySekolahId(string $sekolah_id) Return SekolahPaud objects filtered by the sekolah_id column
 * @method array findByKategoriTkId(string $kategori_tk_id) Return SekolahPaud objects filtered by the kategori_tk_id column
 * @method array findByKlasifikasiLembagaId(string $klasifikasi_lembaga_id) Return SekolahPaud objects filtered by the klasifikasi_lembaga_id column
 * @method array findBySumberDanaSekolahId(string $sumber_dana_sekolah_id) Return SekolahPaud objects filtered by the sumber_dana_sekolah_id column
 * @method array findByFasilitasLayananId(string $fasilitas_layanan_id) Return SekolahPaud objects filtered by the fasilitas_layanan_id column
 * @method array findByJadwalPmtas(string $jadwal_pmtas) Return SekolahPaud objects filtered by the jadwal_pmtas column
 * @method array findByLembagaPengangkatId(string $lembaga_pengangkat_id) Return SekolahPaud objects filtered by the lembaga_pengangkat_id column
 * @method array findByJadwalDdtk(string $jadwal_ddtk) Return SekolahPaud objects filtered by the jadwal_ddtk column
 * @method array findByFreqParenting(string $freq_parenting) Return SekolahPaud objects filtered by the freq_parenting column
 * @method array findByBentukLembagaId(string $bentuk_lembaga_id) Return SekolahPaud objects filtered by the bentuk_lembaga_id column
 * @method array findByJadwalKesehatan(string $jadwal_kesehatan) Return SekolahPaud objects filtered by the jadwal_kesehatan column
 * @method array findByIzinPaud(string $izin_paud) Return SekolahPaud objects filtered by the izin_paud column
 * @method array findByPencatatanDdtk(string $pencatatan_ddtk) Return SekolahPaud objects filtered by the pencatatan_ddtk column
 * @method array findByRujukanDdtk(string $rujukan_ddtk) Return SekolahPaud objects filtered by the rujukan_ddtk column
 * @method array findByPelaksanaanParenting(string $pelaksanaan_parenting) Return SekolahPaud objects filtered by the pelaksanaan_parenting column
 * @method array findByParentingKpo(string $parenting_kpo) Return SekolahPaud objects filtered by the parenting_kpo column
 * @method array findByParentingKelas(string $parenting_kelas) Return SekolahPaud objects filtered by the parenting_kelas column
 * @method array findByParentingKegiatan(string $parenting_kegiatan) Return SekolahPaud objects filtered by the parenting_kegiatan column
 * @method array findByParentingKonsultasi(string $parenting_konsultasi) Return SekolahPaud objects filtered by the parenting_konsultasi column
 * @method array findByParentingKunjungan(string $parenting_kunjungan) Return SekolahPaud objects filtered by the parenting_kunjungan column
 * @method array findByParentingLainnya(string $parenting_lainnya) Return SekolahPaud objects filtered by the parenting_lainnya column
 * @method array findByNilk(string $nilk) Return SekolahPaud objects filtered by the nilk column
 * @method array findByNilm(string $nilm) Return SekolahPaud objects filtered by the nilm column
 * @method array findByNoPenetapanPnf(string $no_penetapan_pnf) Return SekolahPaud objects filtered by the no_penetapan_pnf column
 * @method array findByTanggalPenetapanPnf(string $tanggal_penetapan_pnf) Return SekolahPaud objects filtered by the tanggal_penetapan_pnf column
 * @method array findByCreateDate(string $create_date) Return SekolahPaud objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return SekolahPaud objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return SekolahPaud objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return SekolahPaud objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return SekolahPaud objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSekolahPaudQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSekolahPaudQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SekolahPaud', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SekolahPaudQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SekolahPaudQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SekolahPaudQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SekolahPaudQuery) {
            return $criteria;
        }
        $query = new SekolahPaudQuery();
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
     * @return   SekolahPaud|SekolahPaud[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SekolahPaudPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SekolahPaudPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SekolahPaud A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneBySekolahId($key, $con = null)
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
     * @return                 SekolahPaud A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "kategori_tk_id", "klasifikasi_lembaga_id", "sumber_dana_sekolah_id", "fasilitas_layanan_id", "jadwal_pmtas", "lembaga_pengangkat_id", "jadwal_ddtk", "freq_parenting", "bentuk_lembaga_id", "jadwal_kesehatan", "izin_paud", "pencatatan_ddtk", "rujukan_ddtk", "pelaksanaan_parenting", "parenting_kpo", "parenting_kelas", "parenting_kegiatan", "parenting_konsultasi", "parenting_kunjungan", "parenting_lainnya", "nilk", "nilm", "no_penetapan_pnf", "tanggal_penetapan_pnf", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "sekolah_paud" WHERE "sekolah_id" = :p0';
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
            $obj = new SekolahPaud();
            $obj->hydrate($row);
            SekolahPaudPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SekolahPaud|SekolahPaud[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SekolahPaud[]|mixed the list of results, formatted by the current formatter
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
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $keys, Criteria::IN);
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
     * @return SekolahPaudQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the kategori_tk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKategoriTkId(1234); // WHERE kategori_tk_id = 1234
     * $query->filterByKategoriTkId(array(12, 34)); // WHERE kategori_tk_id IN (12, 34)
     * $query->filterByKategoriTkId(array('min' => 12)); // WHERE kategori_tk_id >= 12
     * $query->filterByKategoriTkId(array('max' => 12)); // WHERE kategori_tk_id <= 12
     * </code>
     *
     * @see       filterByKategoriTk()
     *
     * @param     mixed $kategoriTkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByKategoriTkId($kategoriTkId = null, $comparison = null)
    {
        if (is_array($kategoriTkId)) {
            $useMinMax = false;
            if (isset($kategoriTkId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::KATEGORI_TK_ID, $kategoriTkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kategoriTkId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::KATEGORI_TK_ID, $kategoriTkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::KATEGORI_TK_ID, $kategoriTkId, $comparison);
    }

    /**
     * Filter the query on the klasifikasi_lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKlasifikasiLembagaId(1234); // WHERE klasifikasi_lembaga_id = 1234
     * $query->filterByKlasifikasiLembagaId(array(12, 34)); // WHERE klasifikasi_lembaga_id IN (12, 34)
     * $query->filterByKlasifikasiLembagaId(array('min' => 12)); // WHERE klasifikasi_lembaga_id >= 12
     * $query->filterByKlasifikasiLembagaId(array('max' => 12)); // WHERE klasifikasi_lembaga_id <= 12
     * </code>
     *
     * @see       filterByKlasifikasiLembaga()
     *
     * @param     mixed $klasifikasiLembagaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByKlasifikasiLembagaId($klasifikasiLembagaId = null, $comparison = null)
    {
        if (is_array($klasifikasiLembagaId)) {
            $useMinMax = false;
            if (isset($klasifikasiLembagaId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $klasifikasiLembagaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($klasifikasiLembagaId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $klasifikasiLembagaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $klasifikasiLembagaId, $comparison);
    }

    /**
     * Filter the query on the sumber_dana_sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDanaSekolahId(1234); // WHERE sumber_dana_sekolah_id = 1234
     * $query->filterBySumberDanaSekolahId(array(12, 34)); // WHERE sumber_dana_sekolah_id IN (12, 34)
     * $query->filterBySumberDanaSekolahId(array('min' => 12)); // WHERE sumber_dana_sekolah_id >= 12
     * $query->filterBySumberDanaSekolahId(array('max' => 12)); // WHERE sumber_dana_sekolah_id <= 12
     * </code>
     *
     * @see       filterBySumberDanaSekolah()
     *
     * @param     mixed $sumberDanaSekolahId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterBySumberDanaSekolahId($sumberDanaSekolahId = null, $comparison = null)
    {
        if (is_array($sumberDanaSekolahId)) {
            $useMinMax = false;
            if (isset($sumberDanaSekolahId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $sumberDanaSekolahId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberDanaSekolahId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $sumberDanaSekolahId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $sumberDanaSekolahId, $comparison);
    }

    /**
     * Filter the query on the fasilitas_layanan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByFasilitasLayananId(1234); // WHERE fasilitas_layanan_id = 1234
     * $query->filterByFasilitasLayananId(array(12, 34)); // WHERE fasilitas_layanan_id IN (12, 34)
     * $query->filterByFasilitasLayananId(array('min' => 12)); // WHERE fasilitas_layanan_id >= 12
     * $query->filterByFasilitasLayananId(array('max' => 12)); // WHERE fasilitas_layanan_id <= 12
     * </code>
     *
     * @see       filterByFasilitasLayanan()
     *
     * @param     mixed $fasilitasLayananId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByFasilitasLayananId($fasilitasLayananId = null, $comparison = null)
    {
        if (is_array($fasilitasLayananId)) {
            $useMinMax = false;
            if (isset($fasilitasLayananId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $fasilitasLayananId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($fasilitasLayananId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $fasilitasLayananId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $fasilitasLayananId, $comparison);
    }

    /**
     * Filter the query on the jadwal_pmtas column
     *
     * Example usage:
     * <code>
     * $query->filterByJadwalPmtas(1234); // WHERE jadwal_pmtas = 1234
     * $query->filterByJadwalPmtas(array(12, 34)); // WHERE jadwal_pmtas IN (12, 34)
     * $query->filterByJadwalPmtas(array('min' => 12)); // WHERE jadwal_pmtas >= 12
     * $query->filterByJadwalPmtas(array('max' => 12)); // WHERE jadwal_pmtas <= 12
     * </code>
     *
     * @see       filterByJadwalPaudRelatedByJadwalPmtas()
     *
     * @param     mixed $jadwalPmtas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByJadwalPmtas($jadwalPmtas = null, $comparison = null)
    {
        if (is_array($jadwalPmtas)) {
            $useMinMax = false;
            if (isset($jadwalPmtas['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_PMTAS, $jadwalPmtas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jadwalPmtas['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_PMTAS, $jadwalPmtas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::JADWAL_PMTAS, $jadwalPmtas, $comparison);
    }

    /**
     * Filter the query on the lembaga_pengangkat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaPengangkatId(1234); // WHERE lembaga_pengangkat_id = 1234
     * $query->filterByLembagaPengangkatId(array(12, 34)); // WHERE lembaga_pengangkat_id IN (12, 34)
     * $query->filterByLembagaPengangkatId(array('min' => 12)); // WHERE lembaga_pengangkat_id >= 12
     * $query->filterByLembagaPengangkatId(array('max' => 12)); // WHERE lembaga_pengangkat_id <= 12
     * </code>
     *
     * @see       filterByLembagaPengangkat()
     *
     * @param     mixed $lembagaPengangkatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByLembagaPengangkatId($lembagaPengangkatId = null, $comparison = null)
    {
        if (is_array($lembagaPengangkatId)) {
            $useMinMax = false;
            if (isset($lembagaPengangkatId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lembagaPengangkatId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId, $comparison);
    }

    /**
     * Filter the query on the jadwal_ddtk column
     *
     * Example usage:
     * <code>
     * $query->filterByJadwalDdtk(1234); // WHERE jadwal_ddtk = 1234
     * $query->filterByJadwalDdtk(array(12, 34)); // WHERE jadwal_ddtk IN (12, 34)
     * $query->filterByJadwalDdtk(array('min' => 12)); // WHERE jadwal_ddtk >= 12
     * $query->filterByJadwalDdtk(array('max' => 12)); // WHERE jadwal_ddtk <= 12
     * </code>
     *
     * @see       filterByJadwalPaudRelatedByJadwalDdtk()
     *
     * @param     mixed $jadwalDdtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByJadwalDdtk($jadwalDdtk = null, $comparison = null)
    {
        if (is_array($jadwalDdtk)) {
            $useMinMax = false;
            if (isset($jadwalDdtk['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_DDTK, $jadwalDdtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jadwalDdtk['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_DDTK, $jadwalDdtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::JADWAL_DDTK, $jadwalDdtk, $comparison);
    }

    /**
     * Filter the query on the freq_parenting column
     *
     * Example usage:
     * <code>
     * $query->filterByFreqParenting(1234); // WHERE freq_parenting = 1234
     * $query->filterByFreqParenting(array(12, 34)); // WHERE freq_parenting IN (12, 34)
     * $query->filterByFreqParenting(array('min' => 12)); // WHERE freq_parenting >= 12
     * $query->filterByFreqParenting(array('max' => 12)); // WHERE freq_parenting <= 12
     * </code>
     *
     * @see       filterByJadwalPaudRelatedByFreqParenting()
     *
     * @param     mixed $freqParenting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByFreqParenting($freqParenting = null, $comparison = null)
    {
        if (is_array($freqParenting)) {
            $useMinMax = false;
            if (isset($freqParenting['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::FREQ_PARENTING, $freqParenting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($freqParenting['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::FREQ_PARENTING, $freqParenting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::FREQ_PARENTING, $freqParenting, $comparison);
    }

    /**
     * Filter the query on the bentuk_lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBentukLembagaId(1234); // WHERE bentuk_lembaga_id = 1234
     * $query->filterByBentukLembagaId(array(12, 34)); // WHERE bentuk_lembaga_id IN (12, 34)
     * $query->filterByBentukLembagaId(array('min' => 12)); // WHERE bentuk_lembaga_id >= 12
     * $query->filterByBentukLembagaId(array('max' => 12)); // WHERE bentuk_lembaga_id <= 12
     * </code>
     *
     * @see       filterByBentukLembaga()
     *
     * @param     mixed $bentukLembagaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByBentukLembagaId($bentukLembagaId = null, $comparison = null)
    {
        if (is_array($bentukLembagaId)) {
            $useMinMax = false;
            if (isset($bentukLembagaId['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $bentukLembagaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bentukLembagaId['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $bentukLembagaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $bentukLembagaId, $comparison);
    }

    /**
     * Filter the query on the jadwal_kesehatan column
     *
     * Example usage:
     * <code>
     * $query->filterByJadwalKesehatan(1234); // WHERE jadwal_kesehatan = 1234
     * $query->filterByJadwalKesehatan(array(12, 34)); // WHERE jadwal_kesehatan IN (12, 34)
     * $query->filterByJadwalKesehatan(array('min' => 12)); // WHERE jadwal_kesehatan >= 12
     * $query->filterByJadwalKesehatan(array('max' => 12)); // WHERE jadwal_kesehatan <= 12
     * </code>
     *
     * @see       filterByJadwalPaudRelatedByJadwalKesehatan()
     *
     * @param     mixed $jadwalKesehatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByJadwalKesehatan($jadwalKesehatan = null, $comparison = null)
    {
        if (is_array($jadwalKesehatan)) {
            $useMinMax = false;
            if (isset($jadwalKesehatan['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_KESEHATAN, $jadwalKesehatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jadwalKesehatan['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::JADWAL_KESEHATAN, $jadwalKesehatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::JADWAL_KESEHATAN, $jadwalKesehatan, $comparison);
    }

    /**
     * Filter the query on the izin_paud column
     *
     * Example usage:
     * <code>
     * $query->filterByIzinPaud(1234); // WHERE izin_paud = 1234
     * $query->filterByIzinPaud(array(12, 34)); // WHERE izin_paud IN (12, 34)
     * $query->filterByIzinPaud(array('min' => 12)); // WHERE izin_paud >= 12
     * $query->filterByIzinPaud(array('max' => 12)); // WHERE izin_paud <= 12
     * </code>
     *
     * @param     mixed $izinPaud The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByIzinPaud($izinPaud = null, $comparison = null)
    {
        if (is_array($izinPaud)) {
            $useMinMax = false;
            if (isset($izinPaud['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::IZIN_PAUD, $izinPaud['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($izinPaud['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::IZIN_PAUD, $izinPaud['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::IZIN_PAUD, $izinPaud, $comparison);
    }

    /**
     * Filter the query on the pencatatan_ddtk column
     *
     * Example usage:
     * <code>
     * $query->filterByPencatatanDdtk(1234); // WHERE pencatatan_ddtk = 1234
     * $query->filterByPencatatanDdtk(array(12, 34)); // WHERE pencatatan_ddtk IN (12, 34)
     * $query->filterByPencatatanDdtk(array('min' => 12)); // WHERE pencatatan_ddtk >= 12
     * $query->filterByPencatatanDdtk(array('max' => 12)); // WHERE pencatatan_ddtk <= 12
     * </code>
     *
     * @param     mixed $pencatatanDdtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByPencatatanDdtk($pencatatanDdtk = null, $comparison = null)
    {
        if (is_array($pencatatanDdtk)) {
            $useMinMax = false;
            if (isset($pencatatanDdtk['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PENCATATAN_DDTK, $pencatatanDdtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pencatatanDdtk['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PENCATATAN_DDTK, $pencatatanDdtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PENCATATAN_DDTK, $pencatatanDdtk, $comparison);
    }

    /**
     * Filter the query on the rujukan_ddtk column
     *
     * Example usage:
     * <code>
     * $query->filterByRujukanDdtk(1234); // WHERE rujukan_ddtk = 1234
     * $query->filterByRujukanDdtk(array(12, 34)); // WHERE rujukan_ddtk IN (12, 34)
     * $query->filterByRujukanDdtk(array('min' => 12)); // WHERE rujukan_ddtk >= 12
     * $query->filterByRujukanDdtk(array('max' => 12)); // WHERE rujukan_ddtk <= 12
     * </code>
     *
     * @param     mixed $rujukanDdtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByRujukanDdtk($rujukanDdtk = null, $comparison = null)
    {
        if (is_array($rujukanDdtk)) {
            $useMinMax = false;
            if (isset($rujukanDdtk['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::RUJUKAN_DDTK, $rujukanDdtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rujukanDdtk['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::RUJUKAN_DDTK, $rujukanDdtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::RUJUKAN_DDTK, $rujukanDdtk, $comparison);
    }

    /**
     * Filter the query on the pelaksanaan_parenting column
     *
     * Example usage:
     * <code>
     * $query->filterByPelaksanaanParenting(1234); // WHERE pelaksanaan_parenting = 1234
     * $query->filterByPelaksanaanParenting(array(12, 34)); // WHERE pelaksanaan_parenting IN (12, 34)
     * $query->filterByPelaksanaanParenting(array('min' => 12)); // WHERE pelaksanaan_parenting >= 12
     * $query->filterByPelaksanaanParenting(array('max' => 12)); // WHERE pelaksanaan_parenting <= 12
     * </code>
     *
     * @param     mixed $pelaksanaanParenting The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByPelaksanaanParenting($pelaksanaanParenting = null, $comparison = null)
    {
        if (is_array($pelaksanaanParenting)) {
            $useMinMax = false;
            if (isset($pelaksanaanParenting['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PELAKSANAAN_PARENTING, $pelaksanaanParenting['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pelaksanaanParenting['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PELAKSANAAN_PARENTING, $pelaksanaanParenting['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PELAKSANAAN_PARENTING, $pelaksanaanParenting, $comparison);
    }

    /**
     * Filter the query on the parenting_kpo column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingKpo(1234); // WHERE parenting_kpo = 1234
     * $query->filterByParentingKpo(array(12, 34)); // WHERE parenting_kpo IN (12, 34)
     * $query->filterByParentingKpo(array('min' => 12)); // WHERE parenting_kpo >= 12
     * $query->filterByParentingKpo(array('max' => 12)); // WHERE parenting_kpo <= 12
     * </code>
     *
     * @param     mixed $parentingKpo The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingKpo($parentingKpo = null, $comparison = null)
    {
        if (is_array($parentingKpo)) {
            $useMinMax = false;
            if (isset($parentingKpo['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KPO, $parentingKpo['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingKpo['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KPO, $parentingKpo['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_KPO, $parentingKpo, $comparison);
    }

    /**
     * Filter the query on the parenting_kelas column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingKelas(1234); // WHERE parenting_kelas = 1234
     * $query->filterByParentingKelas(array(12, 34)); // WHERE parenting_kelas IN (12, 34)
     * $query->filterByParentingKelas(array('min' => 12)); // WHERE parenting_kelas >= 12
     * $query->filterByParentingKelas(array('max' => 12)); // WHERE parenting_kelas <= 12
     * </code>
     *
     * @param     mixed $parentingKelas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingKelas($parentingKelas = null, $comparison = null)
    {
        if (is_array($parentingKelas)) {
            $useMinMax = false;
            if (isset($parentingKelas['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KELAS, $parentingKelas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingKelas['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KELAS, $parentingKelas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_KELAS, $parentingKelas, $comparison);
    }

    /**
     * Filter the query on the parenting_kegiatan column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingKegiatan(1234); // WHERE parenting_kegiatan = 1234
     * $query->filterByParentingKegiatan(array(12, 34)); // WHERE parenting_kegiatan IN (12, 34)
     * $query->filterByParentingKegiatan(array('min' => 12)); // WHERE parenting_kegiatan >= 12
     * $query->filterByParentingKegiatan(array('max' => 12)); // WHERE parenting_kegiatan <= 12
     * </code>
     *
     * @param     mixed $parentingKegiatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingKegiatan($parentingKegiatan = null, $comparison = null)
    {
        if (is_array($parentingKegiatan)) {
            $useMinMax = false;
            if (isset($parentingKegiatan['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KEGIATAN, $parentingKegiatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingKegiatan['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KEGIATAN, $parentingKegiatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_KEGIATAN, $parentingKegiatan, $comparison);
    }

    /**
     * Filter the query on the parenting_konsultasi column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingKonsultasi(1234); // WHERE parenting_konsultasi = 1234
     * $query->filterByParentingKonsultasi(array(12, 34)); // WHERE parenting_konsultasi IN (12, 34)
     * $query->filterByParentingKonsultasi(array('min' => 12)); // WHERE parenting_konsultasi >= 12
     * $query->filterByParentingKonsultasi(array('max' => 12)); // WHERE parenting_konsultasi <= 12
     * </code>
     *
     * @param     mixed $parentingKonsultasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingKonsultasi($parentingKonsultasi = null, $comparison = null)
    {
        if (is_array($parentingKonsultasi)) {
            $useMinMax = false;
            if (isset($parentingKonsultasi['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KONSULTASI, $parentingKonsultasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingKonsultasi['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KONSULTASI, $parentingKonsultasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_KONSULTASI, $parentingKonsultasi, $comparison);
    }

    /**
     * Filter the query on the parenting_kunjungan column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingKunjungan(1234); // WHERE parenting_kunjungan = 1234
     * $query->filterByParentingKunjungan(array(12, 34)); // WHERE parenting_kunjungan IN (12, 34)
     * $query->filterByParentingKunjungan(array('min' => 12)); // WHERE parenting_kunjungan >= 12
     * $query->filterByParentingKunjungan(array('max' => 12)); // WHERE parenting_kunjungan <= 12
     * </code>
     *
     * @param     mixed $parentingKunjungan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingKunjungan($parentingKunjungan = null, $comparison = null)
    {
        if (is_array($parentingKunjungan)) {
            $useMinMax = false;
            if (isset($parentingKunjungan['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KUNJUNGAN, $parentingKunjungan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingKunjungan['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_KUNJUNGAN, $parentingKunjungan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_KUNJUNGAN, $parentingKunjungan, $comparison);
    }

    /**
     * Filter the query on the parenting_lainnya column
     *
     * Example usage:
     * <code>
     * $query->filterByParentingLainnya(1234); // WHERE parenting_lainnya = 1234
     * $query->filterByParentingLainnya(array(12, 34)); // WHERE parenting_lainnya IN (12, 34)
     * $query->filterByParentingLainnya(array('min' => 12)); // WHERE parenting_lainnya >= 12
     * $query->filterByParentingLainnya(array('max' => 12)); // WHERE parenting_lainnya <= 12
     * </code>
     *
     * @param     mixed $parentingLainnya The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByParentingLainnya($parentingLainnya = null, $comparison = null)
    {
        if (is_array($parentingLainnya)) {
            $useMinMax = false;
            if (isset($parentingLainnya['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_LAINNYA, $parentingLainnya['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($parentingLainnya['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::PARENTING_LAINNYA, $parentingLainnya['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::PARENTING_LAINNYA, $parentingLainnya, $comparison);
    }

    /**
     * Filter the query on the nilk column
     *
     * Example usage:
     * <code>
     * $query->filterByNilk('fooValue');   // WHERE nilk = 'fooValue'
     * $query->filterByNilk('%fooValue%'); // WHERE nilk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByNilk($nilk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilk)) {
                $nilk = str_replace('*', '%', $nilk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::NILK, $nilk, $comparison);
    }

    /**
     * Filter the query on the nilm column
     *
     * Example usage:
     * <code>
     * $query->filterByNilm('fooValue');   // WHERE nilm = 'fooValue'
     * $query->filterByNilm('%fooValue%'); // WHERE nilm LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilm The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByNilm($nilm = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilm)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilm)) {
                $nilm = str_replace('*', '%', $nilm);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::NILM, $nilm, $comparison);
    }

    /**
     * Filter the query on the no_penetapan_pnf column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPenetapanPnf('fooValue');   // WHERE no_penetapan_pnf = 'fooValue'
     * $query->filterByNoPenetapanPnf('%fooValue%'); // WHERE no_penetapan_pnf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPenetapanPnf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByNoPenetapanPnf($noPenetapanPnf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPenetapanPnf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPenetapanPnf)) {
                $noPenetapanPnf = str_replace('*', '%', $noPenetapanPnf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::NO_PENETAPAN_PNF, $noPenetapanPnf, $comparison);
    }

    /**
     * Filter the query on the tanggal_penetapan_pnf column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalPenetapanPnf('2011-03-14'); // WHERE tanggal_penetapan_pnf = '2011-03-14'
     * $query->filterByTanggalPenetapanPnf('now'); // WHERE tanggal_penetapan_pnf = '2011-03-14'
     * $query->filterByTanggalPenetapanPnf(array('max' => 'yesterday')); // WHERE tanggal_penetapan_pnf > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalPenetapanPnf The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByTanggalPenetapanPnf($tanggalPenetapanPnf = null, $comparison = null)
    {
        if (is_array($tanggalPenetapanPnf)) {
            $useMinMax = false;
            if (isset($tanggalPenetapanPnf['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF, $tanggalPenetapanPnf['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalPenetapanPnf['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF, $tanggalPenetapanPnf['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::TANGGAL_PENETAPAN_PNF, $tanggalPenetapanPnf, $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(SekolahPaudPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(SekolahPaudPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SekolahPaudPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SekolahPaudPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related BentukLembaga object
     *
     * @param   BentukLembaga|PropelObjectCollection $bentukLembaga The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBentukLembaga($bentukLembaga, $comparison = null)
    {
        if ($bentukLembaga instanceof BentukLembaga) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $bentukLembaga->getBentukLembagaId(), $comparison);
        } elseif ($bentukLembaga instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::BENTUK_LEMBAGA_ID, $bentukLembaga->toKeyValue('PrimaryKey', 'BentukLembagaId'), $comparison);
        } else {
            throw new PropelException('filterByBentukLembaga() only accepts arguments of type BentukLembaga or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BentukLembaga relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinBentukLembaga($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BentukLembaga');

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
            $this->addJoinObject($join, 'BentukLembaga');
        }

        return $this;
    }

    /**
     * Use the BentukLembaga relation BentukLembaga object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BentukLembagaQuery A secondary query class using the current class as primary query
     */
    public function useBentukLembagaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBentukLembaga($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BentukLembaga', '\DataDikdas\Model\BentukLembagaQuery');
    }

    /**
     * Filter the query by a related FasilitasLayanan object
     *
     * @param   FasilitasLayanan|PropelObjectCollection $fasilitasLayanan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByFasilitasLayanan($fasilitasLayanan, $comparison = null)
    {
        if ($fasilitasLayanan instanceof FasilitasLayanan) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $fasilitasLayanan->getFasilitasLayananId(), $comparison);
        } elseif ($fasilitasLayanan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::FASILITAS_LAYANAN_ID, $fasilitasLayanan->toKeyValue('PrimaryKey', 'FasilitasLayananId'), $comparison);
        } else {
            throw new PropelException('filterByFasilitasLayanan() only accepts arguments of type FasilitasLayanan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the FasilitasLayanan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinFasilitasLayanan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('FasilitasLayanan');

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
            $this->addJoinObject($join, 'FasilitasLayanan');
        }

        return $this;
    }

    /**
     * Use the FasilitasLayanan relation FasilitasLayanan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\FasilitasLayananQuery A secondary query class using the current class as primary query
     */
    public function useFasilitasLayananQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinFasilitasLayanan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'FasilitasLayanan', '\DataDikdas\Model\FasilitasLayananQuery');
    }

    /**
     * Filter the query by a related JadwalPaud object
     *
     * @param   JadwalPaud|PropelObjectCollection $jadwalPaud The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalPaudRelatedByFreqParenting($jadwalPaud, $comparison = null)
    {
        if ($jadwalPaud instanceof JadwalPaud) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::FREQ_PARENTING, $jadwalPaud->getJadwalId(), $comparison);
        } elseif ($jadwalPaud instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::FREQ_PARENTING, $jadwalPaud->toKeyValue('PrimaryKey', 'JadwalId'), $comparison);
        } else {
            throw new PropelException('filterByJadwalPaudRelatedByFreqParenting() only accepts arguments of type JadwalPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalPaudRelatedByFreqParenting relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinJadwalPaudRelatedByFreqParenting($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalPaudRelatedByFreqParenting');

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
            $this->addJoinObject($join, 'JadwalPaudRelatedByFreqParenting');
        }

        return $this;
    }

    /**
     * Use the JadwalPaudRelatedByFreqParenting relation JadwalPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalPaudQuery A secondary query class using the current class as primary query
     */
    public function useJadwalPaudRelatedByFreqParentingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwalPaudRelatedByFreqParenting($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalPaudRelatedByFreqParenting', '\DataDikdas\Model\JadwalPaudQuery');
    }

    /**
     * Filter the query by a related JadwalPaud object
     *
     * @param   JadwalPaud|PropelObjectCollection $jadwalPaud The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalPaudRelatedByJadwalDdtk($jadwalPaud, $comparison = null)
    {
        if ($jadwalPaud instanceof JadwalPaud) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_DDTK, $jadwalPaud->getJadwalId(), $comparison);
        } elseif ($jadwalPaud instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_DDTK, $jadwalPaud->toKeyValue('PrimaryKey', 'JadwalId'), $comparison);
        } else {
            throw new PropelException('filterByJadwalPaudRelatedByJadwalDdtk() only accepts arguments of type JadwalPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalPaudRelatedByJadwalDdtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinJadwalPaudRelatedByJadwalDdtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalPaudRelatedByJadwalDdtk');

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
            $this->addJoinObject($join, 'JadwalPaudRelatedByJadwalDdtk');
        }

        return $this;
    }

    /**
     * Use the JadwalPaudRelatedByJadwalDdtk relation JadwalPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalPaudQuery A secondary query class using the current class as primary query
     */
    public function useJadwalPaudRelatedByJadwalDdtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwalPaudRelatedByJadwalDdtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalPaudRelatedByJadwalDdtk', '\DataDikdas\Model\JadwalPaudQuery');
    }

    /**
     * Filter the query by a related JadwalPaud object
     *
     * @param   JadwalPaud|PropelObjectCollection $jadwalPaud The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalPaudRelatedByJadwalKesehatan($jadwalPaud, $comparison = null)
    {
        if ($jadwalPaud instanceof JadwalPaud) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_KESEHATAN, $jadwalPaud->getJadwalId(), $comparison);
        } elseif ($jadwalPaud instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_KESEHATAN, $jadwalPaud->toKeyValue('PrimaryKey', 'JadwalId'), $comparison);
        } else {
            throw new PropelException('filterByJadwalPaudRelatedByJadwalKesehatan() only accepts arguments of type JadwalPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalPaudRelatedByJadwalKesehatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinJadwalPaudRelatedByJadwalKesehatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalPaudRelatedByJadwalKesehatan');

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
            $this->addJoinObject($join, 'JadwalPaudRelatedByJadwalKesehatan');
        }

        return $this;
    }

    /**
     * Use the JadwalPaudRelatedByJadwalKesehatan relation JadwalPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalPaudQuery A secondary query class using the current class as primary query
     */
    public function useJadwalPaudRelatedByJadwalKesehatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwalPaudRelatedByJadwalKesehatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalPaudRelatedByJadwalKesehatan', '\DataDikdas\Model\JadwalPaudQuery');
    }

    /**
     * Filter the query by a related JadwalPaud object
     *
     * @param   JadwalPaud|PropelObjectCollection $jadwalPaud The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJadwalPaudRelatedByJadwalPmtas($jadwalPaud, $comparison = null)
    {
        if ($jadwalPaud instanceof JadwalPaud) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_PMTAS, $jadwalPaud->getJadwalId(), $comparison);
        } elseif ($jadwalPaud instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::JADWAL_PMTAS, $jadwalPaud->toKeyValue('PrimaryKey', 'JadwalId'), $comparison);
        } else {
            throw new PropelException('filterByJadwalPaudRelatedByJadwalPmtas() only accepts arguments of type JadwalPaud or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JadwalPaudRelatedByJadwalPmtas relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinJadwalPaudRelatedByJadwalPmtas($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JadwalPaudRelatedByJadwalPmtas');

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
            $this->addJoinObject($join, 'JadwalPaudRelatedByJadwalPmtas');
        }

        return $this;
    }

    /**
     * Use the JadwalPaudRelatedByJadwalPmtas relation JadwalPaud object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JadwalPaudQuery A secondary query class using the current class as primary query
     */
    public function useJadwalPaudRelatedByJadwalPmtasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJadwalPaudRelatedByJadwalPmtas($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JadwalPaudRelatedByJadwalPmtas', '\DataDikdas\Model\JadwalPaudQuery');
    }

    /**
     * Filter the query by a related KategoriTk object
     *
     * @param   KategoriTk|PropelObjectCollection $kategoriTk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKategoriTk($kategoriTk, $comparison = null)
    {
        if ($kategoriTk instanceof KategoriTk) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::KATEGORI_TK_ID, $kategoriTk->getKategoriTkId(), $comparison);
        } elseif ($kategoriTk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::KATEGORI_TK_ID, $kategoriTk->toKeyValue('PrimaryKey', 'KategoriTkId'), $comparison);
        } else {
            throw new PropelException('filterByKategoriTk() only accepts arguments of type KategoriTk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KategoriTk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinKategoriTk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KategoriTk');

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
            $this->addJoinObject($join, 'KategoriTk');
        }

        return $this;
    }

    /**
     * Use the KategoriTk relation KategoriTk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KategoriTkQuery A secondary query class using the current class as primary query
     */
    public function useKategoriTkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKategoriTk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KategoriTk', '\DataDikdas\Model\KategoriTkQuery');
    }

    /**
     * Filter the query by a related KlasifikasiLembaga object
     *
     * @param   KlasifikasiLembaga|PropelObjectCollection $klasifikasiLembaga The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKlasifikasiLembaga($klasifikasiLembaga, $comparison = null)
    {
        if ($klasifikasiLembaga instanceof KlasifikasiLembaga) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $klasifikasiLembaga->getKlasifikasiLembagaId(), $comparison);
        } elseif ($klasifikasiLembaga instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::KLASIFIKASI_LEMBAGA_ID, $klasifikasiLembaga->toKeyValue('PrimaryKey', 'KlasifikasiLembagaId'), $comparison);
        } else {
            throw new PropelException('filterByKlasifikasiLembaga() only accepts arguments of type KlasifikasiLembaga or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KlasifikasiLembaga relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinKlasifikasiLembaga($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KlasifikasiLembaga');

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
            $this->addJoinObject($join, 'KlasifikasiLembaga');
        }

        return $this;
    }

    /**
     * Use the KlasifikasiLembaga relation KlasifikasiLembaga object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KlasifikasiLembagaQuery A secondary query class using the current class as primary query
     */
    public function useKlasifikasiLembagaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKlasifikasiLembaga($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KlasifikasiLembaga', '\DataDikdas\Model\KlasifikasiLembagaQuery');
    }

    /**
     * Filter the query by a related LembagaPengangkat object
     *
     * @param   LembagaPengangkat|PropelObjectCollection $lembagaPengangkat The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaPengangkat($lembagaPengangkat, $comparison = null)
    {
        if ($lembagaPengangkat instanceof LembagaPengangkat) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkat->getLembagaPengangkatId(), $comparison);
        } elseif ($lembagaPengangkat instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkat->toKeyValue('PrimaryKey', 'LembagaPengangkatId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaPengangkat() only accepts arguments of type LembagaPengangkat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaPengangkat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinLembagaPengangkat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaPengangkat');

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
            $this->addJoinObject($join, 'LembagaPengangkat');
        }

        return $this;
    }

    /**
     * Use the LembagaPengangkat relation LembagaPengangkat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaPengangkatQuery A secondary query class using the current class as primary query
     */
    public function useLembagaPengangkatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaPengangkat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaPengangkat', '\DataDikdas\Model\LembagaPengangkatQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return SekolahPaudQuery The current query, for fluid interface
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
     * Filter the query by a related SumberDanaSekolah object
     *
     * @param   SumberDanaSekolah|PropelObjectCollection $sumberDanaSekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SekolahPaudQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberDanaSekolah($sumberDanaSekolah, $comparison = null)
    {
        if ($sumberDanaSekolah instanceof SumberDanaSekolah) {
            return $this
                ->addUsingAlias(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $sumberDanaSekolah->getSumberDanaSekolahId(), $comparison);
        } elseif ($sumberDanaSekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SekolahPaudPeer::SUMBER_DANA_SEKOLAH_ID, $sumberDanaSekolah->toKeyValue('PrimaryKey', 'SumberDanaSekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySumberDanaSekolah() only accepts arguments of type SumberDanaSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberDanaSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function joinSumberDanaSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberDanaSekolah');

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
            $this->addJoinObject($join, 'SumberDanaSekolah');
        }

        return $this;
    }

    /**
     * Use the SumberDanaSekolah relation SumberDanaSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberDanaSekolahQuery A secondary query class using the current class as primary query
     */
    public function useSumberDanaSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberDanaSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberDanaSekolah', '\DataDikdas\Model\SumberDanaSekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SekolahPaud $sekolahPaud Object to remove from the list of results
     *
     * @return SekolahPaudQuery The current query, for fluid interface
     */
    public function prune($sekolahPaud = null)
    {
        if ($sekolahPaud) {
            $this->addUsingAlias(SekolahPaudPeer::SEKOLAH_ID, $sekolahPaud->getSekolahId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
