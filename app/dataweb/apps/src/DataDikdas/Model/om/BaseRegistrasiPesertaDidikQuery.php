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
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\JenisCita;
use DataDikdas\Model\JenisHobby;
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\RegistrasiPesertaDidikPeer;
use DataDikdas\Model\RegistrasiPesertaDidikQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\VldRegPd;

/**
 * Base class that represents a query for the 'registrasi_peserta_didik' table.
 *
 * 
 *
 * @method RegistrasiPesertaDidikQuery orderByRegistrasiId($order = Criteria::ASC) Order by the registrasi_id column
 * @method RegistrasiPesertaDidikQuery orderByJurusanSpId($order = Criteria::ASC) Order by the jurusan_sp_id column
 * @method RegistrasiPesertaDidikQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method RegistrasiPesertaDidikQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method RegistrasiPesertaDidikQuery orderByJenisPendaftaranId($order = Criteria::ASC) Order by the jenis_pendaftaran_id column
 * @method RegistrasiPesertaDidikQuery orderByNipd($order = Criteria::ASC) Order by the nipd column
 * @method RegistrasiPesertaDidikQuery orderByTanggalMasukSekolah($order = Criteria::ASC) Order by the tanggal_masuk_sekolah column
 * @method RegistrasiPesertaDidikQuery orderByJenisKeluarId($order = Criteria::ASC) Order by the jenis_keluar_id column
 * @method RegistrasiPesertaDidikQuery orderByTanggalKeluar($order = Criteria::ASC) Order by the tanggal_keluar column
 * @method RegistrasiPesertaDidikQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method RegistrasiPesertaDidikQuery orderByNoSkhun($order = Criteria::ASC) Order by the no_skhun column
 * @method RegistrasiPesertaDidikQuery orderByNoPesertaUjian($order = Criteria::ASC) Order by the no_peserta_ujian column
 * @method RegistrasiPesertaDidikQuery orderByNoSeriIjazah($order = Criteria::ASC) Order by the no_seri_ijazah column
 * @method RegistrasiPesertaDidikQuery orderByAPernahPaud($order = Criteria::ASC) Order by the a_pernah_paud column
 * @method RegistrasiPesertaDidikQuery orderByAPernahTk($order = Criteria::ASC) Order by the a_pernah_tk column
 * @method RegistrasiPesertaDidikQuery orderBySekolahAsal($order = Criteria::ASC) Order by the sekolah_asal column
 * @method RegistrasiPesertaDidikQuery orderByIdHobby($order = Criteria::ASC) Order by the id_hobby column
 * @method RegistrasiPesertaDidikQuery orderByIdCita($order = Criteria::ASC) Order by the id_cita column
 * @method RegistrasiPesertaDidikQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RegistrasiPesertaDidikQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RegistrasiPesertaDidikQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RegistrasiPesertaDidikQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RegistrasiPesertaDidikQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RegistrasiPesertaDidikQuery groupByRegistrasiId() Group by the registrasi_id column
 * @method RegistrasiPesertaDidikQuery groupByJurusanSpId() Group by the jurusan_sp_id column
 * @method RegistrasiPesertaDidikQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method RegistrasiPesertaDidikQuery groupBySekolahId() Group by the sekolah_id column
 * @method RegistrasiPesertaDidikQuery groupByJenisPendaftaranId() Group by the jenis_pendaftaran_id column
 * @method RegistrasiPesertaDidikQuery groupByNipd() Group by the nipd column
 * @method RegistrasiPesertaDidikQuery groupByTanggalMasukSekolah() Group by the tanggal_masuk_sekolah column
 * @method RegistrasiPesertaDidikQuery groupByJenisKeluarId() Group by the jenis_keluar_id column
 * @method RegistrasiPesertaDidikQuery groupByTanggalKeluar() Group by the tanggal_keluar column
 * @method RegistrasiPesertaDidikQuery groupByKeterangan() Group by the keterangan column
 * @method RegistrasiPesertaDidikQuery groupByNoSkhun() Group by the no_skhun column
 * @method RegistrasiPesertaDidikQuery groupByNoPesertaUjian() Group by the no_peserta_ujian column
 * @method RegistrasiPesertaDidikQuery groupByNoSeriIjazah() Group by the no_seri_ijazah column
 * @method RegistrasiPesertaDidikQuery groupByAPernahPaud() Group by the a_pernah_paud column
 * @method RegistrasiPesertaDidikQuery groupByAPernahTk() Group by the a_pernah_tk column
 * @method RegistrasiPesertaDidikQuery groupBySekolahAsal() Group by the sekolah_asal column
 * @method RegistrasiPesertaDidikQuery groupByIdHobby() Group by the id_hobby column
 * @method RegistrasiPesertaDidikQuery groupByIdCita() Group by the id_cita column
 * @method RegistrasiPesertaDidikQuery groupByCreateDate() Group by the create_date column
 * @method RegistrasiPesertaDidikQuery groupByLastUpdate() Group by the last_update column
 * @method RegistrasiPesertaDidikQuery groupBySoftDelete() Group by the soft_delete column
 * @method RegistrasiPesertaDidikQuery groupByLastSync() Group by the last_sync column
 * @method RegistrasiPesertaDidikQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RegistrasiPesertaDidikQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RegistrasiPesertaDidikQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RegistrasiPesertaDidikQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RegistrasiPesertaDidikQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method RegistrasiPesertaDidikQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method RegistrasiPesertaDidikQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method RegistrasiPesertaDidikQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method RegistrasiPesertaDidikQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method RegistrasiPesertaDidikQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method RegistrasiPesertaDidikQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinJenisPendaftaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPendaftaran relation
 * @method RegistrasiPesertaDidikQuery rightJoinJenisPendaftaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPendaftaran relation
 * @method RegistrasiPesertaDidikQuery innerJoinJenisPendaftaran($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPendaftaran relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinJenisKeluar($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKeluar relation
 * @method RegistrasiPesertaDidikQuery rightJoinJenisKeluar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKeluar relation
 * @method RegistrasiPesertaDidikQuery innerJoinJenisKeluar($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKeluar relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinJenisCita($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisCita relation
 * @method RegistrasiPesertaDidikQuery rightJoinJenisCita($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisCita relation
 * @method RegistrasiPesertaDidikQuery innerJoinJenisCita($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisCita relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinJenisHobby($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHobby relation
 * @method RegistrasiPesertaDidikQuery rightJoinJenisHobby($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHobby relation
 * @method RegistrasiPesertaDidikQuery innerJoinJenisHobby($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHobby relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinAnggotaAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaAktPd relation
 * @method RegistrasiPesertaDidikQuery rightJoinAnggotaAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaAktPd relation
 * @method RegistrasiPesertaDidikQuery innerJoinAnggotaAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaAktPd relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinTracerLulusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TracerLulusan relation
 * @method RegistrasiPesertaDidikQuery rightJoinTracerLulusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TracerLulusan relation
 * @method RegistrasiPesertaDidikQuery innerJoinTracerLulusan($relationAlias = null) Adds a INNER JOIN clause to the query using the TracerLulusan relation
 *
 * @method RegistrasiPesertaDidikQuery leftJoinVldRegPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRegPd relation
 * @method RegistrasiPesertaDidikQuery rightJoinVldRegPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRegPd relation
 * @method RegistrasiPesertaDidikQuery innerJoinVldRegPd($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRegPd relation
 *
 * @method RegistrasiPesertaDidik findOne(PropelPDO $con = null) Return the first RegistrasiPesertaDidik matching the query
 * @method RegistrasiPesertaDidik findOneOrCreate(PropelPDO $con = null) Return the first RegistrasiPesertaDidik matching the query, or a new RegistrasiPesertaDidik object populated from the query conditions when no match is found
 *
 * @method RegistrasiPesertaDidik findOneByJurusanSpId(string $jurusan_sp_id) Return the first RegistrasiPesertaDidik filtered by the jurusan_sp_id column
 * @method RegistrasiPesertaDidik findOneByPesertaDidikId(string $peserta_didik_id) Return the first RegistrasiPesertaDidik filtered by the peserta_didik_id column
 * @method RegistrasiPesertaDidik findOneBySekolahId(string $sekolah_id) Return the first RegistrasiPesertaDidik filtered by the sekolah_id column
 * @method RegistrasiPesertaDidik findOneByJenisPendaftaranId(string $jenis_pendaftaran_id) Return the first RegistrasiPesertaDidik filtered by the jenis_pendaftaran_id column
 * @method RegistrasiPesertaDidik findOneByNipd(string $nipd) Return the first RegistrasiPesertaDidik filtered by the nipd column
 * @method RegistrasiPesertaDidik findOneByTanggalMasukSekolah(string $tanggal_masuk_sekolah) Return the first RegistrasiPesertaDidik filtered by the tanggal_masuk_sekolah column
 * @method RegistrasiPesertaDidik findOneByJenisKeluarId(string $jenis_keluar_id) Return the first RegistrasiPesertaDidik filtered by the jenis_keluar_id column
 * @method RegistrasiPesertaDidik findOneByTanggalKeluar(string $tanggal_keluar) Return the first RegistrasiPesertaDidik filtered by the tanggal_keluar column
 * @method RegistrasiPesertaDidik findOneByKeterangan(string $keterangan) Return the first RegistrasiPesertaDidik filtered by the keterangan column
 * @method RegistrasiPesertaDidik findOneByNoSkhun(string $no_skhun) Return the first RegistrasiPesertaDidik filtered by the no_skhun column
 * @method RegistrasiPesertaDidik findOneByNoPesertaUjian(string $no_peserta_ujian) Return the first RegistrasiPesertaDidik filtered by the no_peserta_ujian column
 * @method RegistrasiPesertaDidik findOneByNoSeriIjazah(string $no_seri_ijazah) Return the first RegistrasiPesertaDidik filtered by the no_seri_ijazah column
 * @method RegistrasiPesertaDidik findOneByAPernahPaud(string $a_pernah_paud) Return the first RegistrasiPesertaDidik filtered by the a_pernah_paud column
 * @method RegistrasiPesertaDidik findOneByAPernahTk(string $a_pernah_tk) Return the first RegistrasiPesertaDidik filtered by the a_pernah_tk column
 * @method RegistrasiPesertaDidik findOneBySekolahAsal(string $sekolah_asal) Return the first RegistrasiPesertaDidik filtered by the sekolah_asal column
 * @method RegistrasiPesertaDidik findOneByIdHobby(string $id_hobby) Return the first RegistrasiPesertaDidik filtered by the id_hobby column
 * @method RegistrasiPesertaDidik findOneByIdCita(string $id_cita) Return the first RegistrasiPesertaDidik filtered by the id_cita column
 * @method RegistrasiPesertaDidik findOneByCreateDate(string $create_date) Return the first RegistrasiPesertaDidik filtered by the create_date column
 * @method RegistrasiPesertaDidik findOneByLastUpdate(string $last_update) Return the first RegistrasiPesertaDidik filtered by the last_update column
 * @method RegistrasiPesertaDidik findOneBySoftDelete(string $soft_delete) Return the first RegistrasiPesertaDidik filtered by the soft_delete column
 * @method RegistrasiPesertaDidik findOneByLastSync(string $last_sync) Return the first RegistrasiPesertaDidik filtered by the last_sync column
 * @method RegistrasiPesertaDidik findOneByUpdaterId(string $updater_id) Return the first RegistrasiPesertaDidik filtered by the updater_id column
 *
 * @method array findByRegistrasiId(string $registrasi_id) Return RegistrasiPesertaDidik objects filtered by the registrasi_id column
 * @method array findByJurusanSpId(string $jurusan_sp_id) Return RegistrasiPesertaDidik objects filtered by the jurusan_sp_id column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return RegistrasiPesertaDidik objects filtered by the peserta_didik_id column
 * @method array findBySekolahId(string $sekolah_id) Return RegistrasiPesertaDidik objects filtered by the sekolah_id column
 * @method array findByJenisPendaftaranId(string $jenis_pendaftaran_id) Return RegistrasiPesertaDidik objects filtered by the jenis_pendaftaran_id column
 * @method array findByNipd(string $nipd) Return RegistrasiPesertaDidik objects filtered by the nipd column
 * @method array findByTanggalMasukSekolah(string $tanggal_masuk_sekolah) Return RegistrasiPesertaDidik objects filtered by the tanggal_masuk_sekolah column
 * @method array findByJenisKeluarId(string $jenis_keluar_id) Return RegistrasiPesertaDidik objects filtered by the jenis_keluar_id column
 * @method array findByTanggalKeluar(string $tanggal_keluar) Return RegistrasiPesertaDidik objects filtered by the tanggal_keluar column
 * @method array findByKeterangan(string $keterangan) Return RegistrasiPesertaDidik objects filtered by the keterangan column
 * @method array findByNoSkhun(string $no_skhun) Return RegistrasiPesertaDidik objects filtered by the no_skhun column
 * @method array findByNoPesertaUjian(string $no_peserta_ujian) Return RegistrasiPesertaDidik objects filtered by the no_peserta_ujian column
 * @method array findByNoSeriIjazah(string $no_seri_ijazah) Return RegistrasiPesertaDidik objects filtered by the no_seri_ijazah column
 * @method array findByAPernahPaud(string $a_pernah_paud) Return RegistrasiPesertaDidik objects filtered by the a_pernah_paud column
 * @method array findByAPernahTk(string $a_pernah_tk) Return RegistrasiPesertaDidik objects filtered by the a_pernah_tk column
 * @method array findBySekolahAsal(string $sekolah_asal) Return RegistrasiPesertaDidik objects filtered by the sekolah_asal column
 * @method array findByIdHobby(string $id_hobby) Return RegistrasiPesertaDidik objects filtered by the id_hobby column
 * @method array findByIdCita(string $id_cita) Return RegistrasiPesertaDidik objects filtered by the id_cita column
 * @method array findByCreateDate(string $create_date) Return RegistrasiPesertaDidik objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RegistrasiPesertaDidik objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RegistrasiPesertaDidik objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RegistrasiPesertaDidik objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RegistrasiPesertaDidik objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRegistrasiPesertaDidikQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRegistrasiPesertaDidikQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RegistrasiPesertaDidik', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RegistrasiPesertaDidikQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RegistrasiPesertaDidikQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RegistrasiPesertaDidikQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RegistrasiPesertaDidikQuery) {
            return $criteria;
        }
        $query = new RegistrasiPesertaDidikQuery();
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
     * @return   RegistrasiPesertaDidik|RegistrasiPesertaDidik[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RegistrasiPesertaDidikPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RegistrasiPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RegistrasiPesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRegistrasiId($key, $con = null)
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
     * @return                 RegistrasiPesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "registrasi_id", "jurusan_sp_id", "peserta_didik_id", "sekolah_id", "jenis_pendaftaran_id", "nipd", "tanggal_masuk_sekolah", "jenis_keluar_id", "tanggal_keluar", "keterangan", "no_skhun", "no_peserta_ujian", "no_seri_ijazah", "a_pernah_paud", "a_pernah_tk", "sekolah_asal", "id_hobby", "id_cita", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "registrasi_peserta_didik" WHERE "registrasi_id" = :p0';
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
            $obj = new RegistrasiPesertaDidik();
            $obj->hydrate($row);
            RegistrasiPesertaDidikPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RegistrasiPesertaDidik|RegistrasiPesertaDidik[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RegistrasiPesertaDidik[]|mixed the list of results, formatted by the current formatter
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $keys, Criteria::IN);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $registrasiId, $comparison);
    }

    /**
     * Filter the query on the jurusan_sp_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanSpId('fooValue');   // WHERE jurusan_sp_id = 'fooValue'
     * $query->filterByJurusanSpId('%fooValue%'); // WHERE jurusan_sp_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanSpId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJurusanSpId($jurusanSpId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanSpId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanSpId)) {
                $jurusanSpId = str_replace('*', '%', $jurusanSpId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, $jurusanSpId, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenisPendaftaranId($jenisPendaftaranId = null, $comparison = null)
    {
        if (is_array($jenisPendaftaranId)) {
            $useMinMax = false;
            if (isset($jenisPendaftaranId['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPendaftaranId['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId, $comparison);
    }

    /**
     * Filter the query on the nipd column
     *
     * Example usage:
     * <code>
     * $query->filterByNipd('fooValue');   // WHERE nipd = 'fooValue'
     * $query->filterByNipd('%fooValue%'); // WHERE nipd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nipd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNipd($nipd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nipd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nipd)) {
                $nipd = str_replace('*', '%', $nipd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::NIPD, $nipd, $comparison);
    }

    /**
     * Filter the query on the tanggal_masuk_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalMasukSekolah('2011-03-14'); // WHERE tanggal_masuk_sekolah = '2011-03-14'
     * $query->filterByTanggalMasukSekolah('now'); // WHERE tanggal_masuk_sekolah = '2011-03-14'
     * $query->filterByTanggalMasukSekolah(array('max' => 'yesterday')); // WHERE tanggal_masuk_sekolah > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalMasukSekolah The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTanggalMasukSekolah($tanggalMasukSekolah = null, $comparison = null)
    {
        if (is_array($tanggalMasukSekolah)) {
            $useMinMax = false;
            if (isset($tanggalMasukSekolah['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH, $tanggalMasukSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalMasukSekolah['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH, $tanggalMasukSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_MASUK_SEKOLAH, $tanggalMasukSekolah, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, $jenisKeluarId, $comparison);
    }

    /**
     * Filter the query on the tanggal_keluar column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalKeluar('2011-03-14'); // WHERE tanggal_keluar = '2011-03-14'
     * $query->filterByTanggalKeluar('now'); // WHERE tanggal_keluar = '2011-03-14'
     * $query->filterByTanggalKeluar(array('max' => 'yesterday')); // WHERE tanggal_keluar > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalKeluar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTanggalKeluar($tanggalKeluar = null, $comparison = null)
    {
        if (is_array($tanggalKeluar)) {
            $useMinMax = false;
            if (isset($tanggalKeluar['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR, $tanggalKeluar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalKeluar['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR, $tanggalKeluar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::TANGGAL_KELUAR, $tanggalKeluar, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the no_skhun column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSkhun('fooValue');   // WHERE no_skhun = 'fooValue'
     * $query->filterByNoSkhun('%fooValue%'); // WHERE no_skhun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSkhun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoSkhun($noSkhun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSkhun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSkhun)) {
                $noSkhun = str_replace('*', '%', $noSkhun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::NO_SKHUN, $noSkhun, $comparison);
    }

    /**
     * Filter the query on the no_peserta_ujian column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPesertaUjian('fooValue');   // WHERE no_peserta_ujian = 'fooValue'
     * $query->filterByNoPesertaUjian('%fooValue%'); // WHERE no_peserta_ujian LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPesertaUjian The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoPesertaUjian($noPesertaUjian = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPesertaUjian)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPesertaUjian)) {
                $noPesertaUjian = str_replace('*', '%', $noPesertaUjian);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::NO_PESERTA_UJIAN, $noPesertaUjian, $comparison);
    }

    /**
     * Filter the query on the no_seri_ijazah column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSeriIjazah('fooValue');   // WHERE no_seri_ijazah = 'fooValue'
     * $query->filterByNoSeriIjazah('%fooValue%'); // WHERE no_seri_ijazah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSeriIjazah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoSeriIjazah($noSeriIjazah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSeriIjazah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSeriIjazah)) {
                $noSeriIjazah = str_replace('*', '%', $noSeriIjazah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::NO_SERI_IJAZAH, $noSeriIjazah, $comparison);
    }

    /**
     * Filter the query on the a_pernah_paud column
     *
     * Example usage:
     * <code>
     * $query->filterByAPernahPaud(1234); // WHERE a_pernah_paud = 1234
     * $query->filterByAPernahPaud(array(12, 34)); // WHERE a_pernah_paud IN (12, 34)
     * $query->filterByAPernahPaud(array('min' => 12)); // WHERE a_pernah_paud >= 12
     * $query->filterByAPernahPaud(array('max' => 12)); // WHERE a_pernah_paud <= 12
     * </code>
     *
     * @param     mixed $aPernahPaud The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByAPernahPaud($aPernahPaud = null, $comparison = null)
    {
        if (is_array($aPernahPaud)) {
            $useMinMax = false;
            if (isset($aPernahPaud['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD, $aPernahPaud['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPernahPaud['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD, $aPernahPaud['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_PAUD, $aPernahPaud, $comparison);
    }

    /**
     * Filter the query on the a_pernah_tk column
     *
     * Example usage:
     * <code>
     * $query->filterByAPernahTk(1234); // WHERE a_pernah_tk = 1234
     * $query->filterByAPernahTk(array(12, 34)); // WHERE a_pernah_tk IN (12, 34)
     * $query->filterByAPernahTk(array('min' => 12)); // WHERE a_pernah_tk >= 12
     * $query->filterByAPernahTk(array('max' => 12)); // WHERE a_pernah_tk <= 12
     * </code>
     *
     * @param     mixed $aPernahTk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByAPernahTk($aPernahTk = null, $comparison = null)
    {
        if (is_array($aPernahTk)) {
            $useMinMax = false;
            if (isset($aPernahTk['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_TK, $aPernahTk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aPernahTk['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_TK, $aPernahTk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::A_PERNAH_TK, $aPernahTk, $comparison);
    }

    /**
     * Filter the query on the sekolah_asal column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahAsal('fooValue');   // WHERE sekolah_asal = 'fooValue'
     * $query->filterBySekolahAsal('%fooValue%'); // WHERE sekolah_asal LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahAsal The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterBySekolahAsal($sekolahAsal = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahAsal)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahAsal)) {
                $sekolahAsal = str_replace('*', '%', $sekolahAsal);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::SEKOLAH_ASAL, $sekolahAsal, $comparison);
    }

    /**
     * Filter the query on the id_hobby column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHobby(1234); // WHERE id_hobby = 1234
     * $query->filterByIdHobby(array(12, 34)); // WHERE id_hobby IN (12, 34)
     * $query->filterByIdHobby(array('min' => 12)); // WHERE id_hobby >= 12
     * $query->filterByIdHobby(array('max' => 12)); // WHERE id_hobby <= 12
     * </code>
     *
     * @see       filterByJenisHobby()
     *
     * @param     mixed $idHobby The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByIdHobby($idHobby = null, $comparison = null)
    {
        if (is_array($idHobby)) {
            $useMinMax = false;
            if (isset($idHobby['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_HOBBY, $idHobby['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idHobby['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_HOBBY, $idHobby['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_HOBBY, $idHobby, $comparison);
    }

    /**
     * Filter the query on the id_cita column
     *
     * Example usage:
     * <code>
     * $query->filterByIdCita(1234); // WHERE id_cita = 1234
     * $query->filterByIdCita(array(12, 34)); // WHERE id_cita IN (12, 34)
     * $query->filterByIdCita(array('min' => 12)); // WHERE id_cita >= 12
     * $query->filterByIdCita(array('max' => 12)); // WHERE id_cita <= 12
     * </code>
     *
     * @see       filterByJenisCita()
     *
     * @param     mixed $idCita The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByIdCita($idCita = null, $comparison = null)
    {
        if (is_array($idCita)) {
            $useMinMax = false;
            if (isset($idCita['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_CITA, $idCita['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idCita['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_CITA, $idCita['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::ID_CITA, $idCita, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RegistrasiPesertaDidikPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, $jurusanSp->getJurusanSpId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JURUSAN_SP_ID, $jurusanSp->toKeyValue('PrimaryKey', 'JurusanSpId'), $comparison);
        } else {
            throw new PropelException('filterByJurusanSp() only accepts arguments of type JurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanSp');

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
            $this->addJoinObject($join, 'JurusanSp');
        }

        return $this;
    }

    /**
     * Use the JurusanSp relation JurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related JenisPendaftaran object
     *
     * @param   JenisPendaftaran|PropelObjectCollection $jenisPendaftaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPendaftaran($jenisPendaftaran, $comparison = null)
    {
        if ($jenisPendaftaran instanceof JenisPendaftaran) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->getJenisPendaftaranId(), $comparison);
        } elseif ($jenisPendaftaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->toKeyValue('PrimaryKey', 'JenisPendaftaranId'), $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related JenisKeluar object
     *
     * @param   JenisKeluar|PropelObjectCollection $jenisKeluar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKeluar($jenisKeluar, $comparison = null)
    {
        if ($jenisKeluar instanceof JenisKeluar) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, $jenisKeluar->getJenisKeluarId(), $comparison);
        } elseif ($jenisKeluar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::JENIS_KELUAR_ID, $jenisKeluar->toKeyValue('PrimaryKey', 'JenisKeluarId'), $comparison);
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
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related JenisCita object
     *
     * @param   JenisCita|PropelObjectCollection $jenisCita The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisCita($jenisCita, $comparison = null)
    {
        if ($jenisCita instanceof JenisCita) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::ID_CITA, $jenisCita->getIdCita(), $comparison);
        } elseif ($jenisCita instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::ID_CITA, $jenisCita->toKeyValue('PrimaryKey', 'IdCita'), $comparison);
        } else {
            throw new PropelException('filterByJenisCita() only accepts arguments of type JenisCita or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisCita relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenisCita($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisCita');

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
            $this->addJoinObject($join, 'JenisCita');
        }

        return $this;
    }

    /**
     * Use the JenisCita relation JenisCita object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisCitaQuery A secondary query class using the current class as primary query
     */
    public function useJenisCitaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisCita($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisCita', '\DataDikdas\Model\JenisCitaQuery');
    }

    /**
     * Filter the query by a related JenisHobby object
     *
     * @param   JenisHobby|PropelObjectCollection $jenisHobby The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHobby($jenisHobby, $comparison = null)
    {
        if ($jenisHobby instanceof JenisHobby) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::ID_HOBBY, $jenisHobby->getIdHobby(), $comparison);
        } elseif ($jenisHobby instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::ID_HOBBY, $jenisHobby->toKeyValue('PrimaryKey', 'IdHobby'), $comparison);
        } else {
            throw new PropelException('filterByJenisHobby() only accepts arguments of type JenisHobby or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisHobby relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenisHobby($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisHobby');

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
            $this->addJoinObject($join, 'JenisHobby');
        }

        return $this;
    }

    /**
     * Use the JenisHobby relation JenisHobby object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisHobbyQuery A secondary query class using the current class as primary query
     */
    public function useJenisHobbyQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisHobby($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisHobby', '\DataDikdas\Model\JenisHobbyQuery');
    }

    /**
     * Filter the query by a related AnggotaAktPd object
     *
     * @param   AnggotaAktPd|PropelObjectCollection $anggotaAktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaAktPd($anggotaAktPd, $comparison = null)
    {
        if ($anggotaAktPd instanceof AnggotaAktPd) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $anggotaAktPd->getRegistrasiId(), $comparison);
        } elseif ($anggotaAktPd instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaAktPdQuery()
                ->filterByPrimaryKeys($anggotaAktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaAktPd() only accepts arguments of type AnggotaAktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaAktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinAnggotaAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaAktPd');

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
            $this->addJoinObject($join, 'AnggotaAktPd');
        }

        return $this;
    }

    /**
     * Use the AnggotaAktPd relation AnggotaAktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaAktPdQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaAktPd', '\DataDikdas\Model\AnggotaAktPdQuery');
    }

    /**
     * Filter the query by a related TracerLulusan object
     *
     * @param   TracerLulusan|PropelObjectCollection $tracerLulusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracerLulusan($tracerLulusan, $comparison = null)
    {
        if ($tracerLulusan instanceof TracerLulusan) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $tracerLulusan->getRegistrasiId(), $comparison);
        } elseif ($tracerLulusan instanceof PropelObjectCollection) {
            return $this
                ->useTracerLulusanQuery()
                ->filterByPrimaryKeys($tracerLulusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTracerLulusan() only accepts arguments of type TracerLulusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TracerLulusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinTracerLulusan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TracerLulusan');

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
            $this->addJoinObject($join, 'TracerLulusan');
        }

        return $this;
    }

    /**
     * Use the TracerLulusan relation TracerLulusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TracerLulusanQuery A secondary query class using the current class as primary query
     */
    public function useTracerLulusanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTracerLulusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TracerLulusan', '\DataDikdas\Model\TracerLulusanQuery');
    }

    /**
     * Filter the query by a related VldRegPd object
     *
     * @param   VldRegPd|PropelObjectCollection $vldRegPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RegistrasiPesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRegPd($vldRegPd, $comparison = null)
    {
        if ($vldRegPd instanceof VldRegPd) {
            return $this
                ->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $vldRegPd->getRegistrasiId(), $comparison);
        } elseif ($vldRegPd instanceof PropelObjectCollection) {
            return $this
                ->useVldRegPdQuery()
                ->filterByPrimaryKeys($vldRegPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRegPd() only accepts arguments of type VldRegPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRegPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function joinVldRegPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRegPd');

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
            $this->addJoinObject($join, 'VldRegPd');
        }

        return $this;
    }

    /**
     * Use the VldRegPd relation VldRegPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRegPdQuery A secondary query class using the current class as primary query
     */
    public function useVldRegPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRegPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRegPd', '\DataDikdas\Model\VldRegPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RegistrasiPesertaDidik $registrasiPesertaDidik Object to remove from the list of results
     *
     * @return RegistrasiPesertaDidikQuery The current query, for fluid interface
     */
    public function prune($registrasiPesertaDidik = null)
    {
        if ($registrasiPesertaDidik) {
            $this->addUsingAlias(RegistrasiPesertaDidikPeer::REGISTRASI_ID, $registrasiPesertaDidik->getRegistrasiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
