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
use DataDikdas\Model\LembSertifikasi;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LogOtentikasi;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\PenggunaPeer;
use DataDikdas\Model\PenggunaQuery;
use DataDikdas\Model\RolePengguna;

/**
 * Base class that represents a query for the 'man_akses.pengguna' table.
 *
 * 
 *
 * @method PenggunaQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method PenggunaQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method PenggunaQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method PenggunaQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method PenggunaQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method PenggunaQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method PenggunaQuery orderByKodeLembSert($order = Criteria::ASC) Order by the kode_lemb_sert column
 * @method PenggunaQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PenggunaQuery orderByUsername($order = Criteria::ASC) Order by the username column
 * @method PenggunaQuery orderByABot($order = Criteria::ASC) Order by the a_bot column
 * @method PenggunaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PenggunaQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method PenggunaQuery orderByTglLahir($order = Criteria::ASC) Order by the tgl_lahir column
 * @method PenggunaQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PenggunaQuery orderByNipNim($order = Criteria::ASC) Order by the nip_nim column
 * @method PenggunaQuery orderByJabatanLembaga($order = Criteria::ASC) Order by the jabatan_lembaga column
 * @method PenggunaQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method PenggunaQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method PenggunaQuery orderByNoTelepon($order = Criteria::ASC) Order by the no_telepon column
 * @method PenggunaQuery orderByNoHp($order = Criteria::ASC) Order by the no_hp column
 * @method PenggunaQuery orderByApprovalPengguna($order = Criteria::ASC) Order by the approval_pengguna column
 * @method PenggunaQuery orderByAktif($order = Criteria::ASC) Order by the aktif column
 * @method PenggunaQuery orderByPassword($order = Criteria::ASC) Order by the password column
 * @method PenggunaQuery orderByPasswordLama($order = Criteria::ASC) Order by the password_lama column
 * @method PenggunaQuery orderByTglGantiPwd($order = Criteria::ASC) Order by the tgl_ganti_pwd column
 * @method PenggunaQuery orderByIdSdmPengguna($order = Criteria::ASC) Order by the id_sdm_pengguna column
 * @method PenggunaQuery orderByIdPdPengguna($order = Criteria::ASC) Order by the id_pd_pengguna column
 * @method PenggunaQuery orderByTokenReg($order = Criteria::ASC) Order by the token_reg column
 * @method PenggunaQuery orderByJabatan($order = Criteria::ASC) Order by the jabatan column
 * @method PenggunaQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PenggunaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PenggunaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PenggunaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PenggunaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PenggunaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PenggunaQuery groupByPenggunaId() Group by the pengguna_id column
 * @method PenggunaQuery groupBySekolahId() Group by the sekolah_id column
 * @method PenggunaQuery groupByLembagaId() Group by the lembaga_id column
 * @method PenggunaQuery groupByYayasanId() Group by the yayasan_id column
 * @method PenggunaQuery groupByLaId() Group by the la_id column
 * @method PenggunaQuery groupByDudiId() Group by the dudi_id column
 * @method PenggunaQuery groupByKodeLembSert() Group by the kode_lemb_sert column
 * @method PenggunaQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PenggunaQuery groupByUsername() Group by the username column
 * @method PenggunaQuery groupByABot() Group by the a_bot column
 * @method PenggunaQuery groupByNama() Group by the nama column
 * @method PenggunaQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method PenggunaQuery groupByTglLahir() Group by the tgl_lahir column
 * @method PenggunaQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PenggunaQuery groupByNipNim() Group by the nip_nim column
 * @method PenggunaQuery groupByJabatanLembaga() Group by the jabatan_lembaga column
 * @method PenggunaQuery groupByAlamat() Group by the alamat column
 * @method PenggunaQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method PenggunaQuery groupByNoTelepon() Group by the no_telepon column
 * @method PenggunaQuery groupByNoHp() Group by the no_hp column
 * @method PenggunaQuery groupByApprovalPengguna() Group by the approval_pengguna column
 * @method PenggunaQuery groupByAktif() Group by the aktif column
 * @method PenggunaQuery groupByPassword() Group by the password column
 * @method PenggunaQuery groupByPasswordLama() Group by the password_lama column
 * @method PenggunaQuery groupByTglGantiPwd() Group by the tgl_ganti_pwd column
 * @method PenggunaQuery groupByIdSdmPengguna() Group by the id_sdm_pengguna column
 * @method PenggunaQuery groupByIdPdPengguna() Group by the id_pd_pengguna column
 * @method PenggunaQuery groupByTokenReg() Group by the token_reg column
 * @method PenggunaQuery groupByJabatan() Group by the jabatan column
 * @method PenggunaQuery groupByPtkId() Group by the ptk_id column
 * @method PenggunaQuery groupByCreateDate() Group by the create_date column
 * @method PenggunaQuery groupByLastUpdate() Group by the last_update column
 * @method PenggunaQuery groupBySoftDelete() Group by the soft_delete column
 * @method PenggunaQuery groupByLastSync() Group by the last_sync column
 * @method PenggunaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PenggunaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PenggunaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PenggunaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PenggunaQuery leftJoinLembagaAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaAkreditasi relation
 * @method PenggunaQuery rightJoinLembagaAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaAkreditasi relation
 * @method PenggunaQuery innerJoinLembagaAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaAkreditasi relation
 *
 * @method PenggunaQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method PenggunaQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method PenggunaQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method PenggunaQuery leftJoinLembSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembSertifikasi relation
 * @method PenggunaQuery rightJoinLembSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembSertifikasi relation
 * @method PenggunaQuery innerJoinLembSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembSertifikasi relation
 *
 * @method PenggunaQuery leftJoinLogOtentikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LogOtentikasi relation
 * @method PenggunaQuery rightJoinLogOtentikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LogOtentikasi relation
 * @method PenggunaQuery innerJoinLogOtentikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LogOtentikasi relation
 *
 * @method PenggunaQuery leftJoinRolePengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the RolePengguna relation
 * @method PenggunaQuery rightJoinRolePengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RolePengguna relation
 * @method PenggunaQuery innerJoinRolePengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the RolePengguna relation
 *
 * @method Pengguna findOne(PropelPDO $con = null) Return the first Pengguna matching the query
 * @method Pengguna findOneOrCreate(PropelPDO $con = null) Return the first Pengguna matching the query, or a new Pengguna object populated from the query conditions when no match is found
 *
 * @method Pengguna findOneBySekolahId(string $sekolah_id) Return the first Pengguna filtered by the sekolah_id column
 * @method Pengguna findOneByLembagaId(string $lembaga_id) Return the first Pengguna filtered by the lembaga_id column
 * @method Pengguna findOneByYayasanId(string $yayasan_id) Return the first Pengguna filtered by the yayasan_id column
 * @method Pengguna findOneByLaId(string $la_id) Return the first Pengguna filtered by the la_id column
 * @method Pengguna findOneByDudiId(string $dudi_id) Return the first Pengguna filtered by the dudi_id column
 * @method Pengguna findOneByKodeLembSert(string $kode_lemb_sert) Return the first Pengguna filtered by the kode_lemb_sert column
 * @method Pengguna findOneByPesertaDidikId(string $peserta_didik_id) Return the first Pengguna filtered by the peserta_didik_id column
 * @method Pengguna findOneByUsername(string $username) Return the first Pengguna filtered by the username column
 * @method Pengguna findOneByABot(string $a_bot) Return the first Pengguna filtered by the a_bot column
 * @method Pengguna findOneByNama(string $nama) Return the first Pengguna filtered by the nama column
 * @method Pengguna findOneByTempatLahir(string $tempat_lahir) Return the first Pengguna filtered by the tempat_lahir column
 * @method Pengguna findOneByTglLahir(string $tgl_lahir) Return the first Pengguna filtered by the tgl_lahir column
 * @method Pengguna findOneByJenisKelamin(string $jenis_kelamin) Return the first Pengguna filtered by the jenis_kelamin column
 * @method Pengguna findOneByNipNim(string $nip_nim) Return the first Pengguna filtered by the nip_nim column
 * @method Pengguna findOneByJabatanLembaga(string $jabatan_lembaga) Return the first Pengguna filtered by the jabatan_lembaga column
 * @method Pengguna findOneByAlamat(string $alamat) Return the first Pengguna filtered by the alamat column
 * @method Pengguna findOneByKodeWilayah(string $kode_wilayah) Return the first Pengguna filtered by the kode_wilayah column
 * @method Pengguna findOneByNoTelepon(string $no_telepon) Return the first Pengguna filtered by the no_telepon column
 * @method Pengguna findOneByNoHp(string $no_hp) Return the first Pengguna filtered by the no_hp column
 * @method Pengguna findOneByApprovalPengguna(string $approval_pengguna) Return the first Pengguna filtered by the approval_pengguna column
 * @method Pengguna findOneByAktif(string $aktif) Return the first Pengguna filtered by the aktif column
 * @method Pengguna findOneByPassword(string $password) Return the first Pengguna filtered by the password column
 * @method Pengguna findOneByPasswordLama(string $password_lama) Return the first Pengguna filtered by the password_lama column
 * @method Pengguna findOneByTglGantiPwd(string $tgl_ganti_pwd) Return the first Pengguna filtered by the tgl_ganti_pwd column
 * @method Pengguna findOneByIdSdmPengguna(string $id_sdm_pengguna) Return the first Pengguna filtered by the id_sdm_pengguna column
 * @method Pengguna findOneByIdPdPengguna(string $id_pd_pengguna) Return the first Pengguna filtered by the id_pd_pengguna column
 * @method Pengguna findOneByTokenReg(string $token_reg) Return the first Pengguna filtered by the token_reg column
 * @method Pengguna findOneByJabatan(string $jabatan) Return the first Pengguna filtered by the jabatan column
 * @method Pengguna findOneByPtkId(string $ptk_id) Return the first Pengguna filtered by the ptk_id column
 * @method Pengguna findOneByCreateDate(string $create_date) Return the first Pengguna filtered by the create_date column
 * @method Pengguna findOneByLastUpdate(string $last_update) Return the first Pengguna filtered by the last_update column
 * @method Pengguna findOneBySoftDelete(string $soft_delete) Return the first Pengguna filtered by the soft_delete column
 * @method Pengguna findOneByLastSync(string $last_sync) Return the first Pengguna filtered by the last_sync column
 * @method Pengguna findOneByUpdaterId(string $updater_id) Return the first Pengguna filtered by the updater_id column
 *
 * @method array findByPenggunaId(string $pengguna_id) Return Pengguna objects filtered by the pengguna_id column
 * @method array findBySekolahId(string $sekolah_id) Return Pengguna objects filtered by the sekolah_id column
 * @method array findByLembagaId(string $lembaga_id) Return Pengguna objects filtered by the lembaga_id column
 * @method array findByYayasanId(string $yayasan_id) Return Pengguna objects filtered by the yayasan_id column
 * @method array findByLaId(string $la_id) Return Pengguna objects filtered by the la_id column
 * @method array findByDudiId(string $dudi_id) Return Pengguna objects filtered by the dudi_id column
 * @method array findByKodeLembSert(string $kode_lemb_sert) Return Pengguna objects filtered by the kode_lemb_sert column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return Pengguna objects filtered by the peserta_didik_id column
 * @method array findByUsername(string $username) Return Pengguna objects filtered by the username column
 * @method array findByABot(string $a_bot) Return Pengguna objects filtered by the a_bot column
 * @method array findByNama(string $nama) Return Pengguna objects filtered by the nama column
 * @method array findByTempatLahir(string $tempat_lahir) Return Pengguna objects filtered by the tempat_lahir column
 * @method array findByTglLahir(string $tgl_lahir) Return Pengguna objects filtered by the tgl_lahir column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return Pengguna objects filtered by the jenis_kelamin column
 * @method array findByNipNim(string $nip_nim) Return Pengguna objects filtered by the nip_nim column
 * @method array findByJabatanLembaga(string $jabatan_lembaga) Return Pengguna objects filtered by the jabatan_lembaga column
 * @method array findByAlamat(string $alamat) Return Pengguna objects filtered by the alamat column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Pengguna objects filtered by the kode_wilayah column
 * @method array findByNoTelepon(string $no_telepon) Return Pengguna objects filtered by the no_telepon column
 * @method array findByNoHp(string $no_hp) Return Pengguna objects filtered by the no_hp column
 * @method array findByApprovalPengguna(string $approval_pengguna) Return Pengguna objects filtered by the approval_pengguna column
 * @method array findByAktif(string $aktif) Return Pengguna objects filtered by the aktif column
 * @method array findByPassword(string $password) Return Pengguna objects filtered by the password column
 * @method array findByPasswordLama(string $password_lama) Return Pengguna objects filtered by the password_lama column
 * @method array findByTglGantiPwd(string $tgl_ganti_pwd) Return Pengguna objects filtered by the tgl_ganti_pwd column
 * @method array findByIdSdmPengguna(string $id_sdm_pengguna) Return Pengguna objects filtered by the id_sdm_pengguna column
 * @method array findByIdPdPengguna(string $id_pd_pengguna) Return Pengguna objects filtered by the id_pd_pengguna column
 * @method array findByTokenReg(string $token_reg) Return Pengguna objects filtered by the token_reg column
 * @method array findByJabatan(string $jabatan) Return Pengguna objects filtered by the jabatan column
 * @method array findByPtkId(string $ptk_id) Return Pengguna objects filtered by the ptk_id column
 * @method array findByCreateDate(string $create_date) Return Pengguna objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Pengguna objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Pengguna objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Pengguna objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Pengguna objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePenggunaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePenggunaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Pengguna', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PenggunaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PenggunaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PenggunaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PenggunaQuery) {
            return $criteria;
        }
        $query = new PenggunaQuery();
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
     * @return   Pengguna|Pengguna[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PenggunaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Pengguna A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPenggunaId($key, $con = null)
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
     * @return                 Pengguna A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pengguna_id", "sekolah_id", "lembaga_id", "yayasan_id", "la_id", "dudi_id", "kode_lemb_sert", "peserta_didik_id", "username", "a_bot", "nama", "tempat_lahir", "tgl_lahir", "jenis_kelamin", "nip_nim", "jabatan_lembaga", "alamat", "kode_wilayah", "no_telepon", "no_hp", "approval_pengguna", "aktif", "password", "password_lama", "tgl_ganti_pwd", "id_sdm_pengguna", "id_pd_pengguna", "token_reg", "jabatan", "ptk_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "man_akses"."pengguna" WHERE "pengguna_id" = :p0';
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
            $obj = new Pengguna();
            $obj->hydrate($row);
            PenggunaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Pengguna|Pengguna[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Pengguna[]|mixed the list of results, formatted by the current formatter
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
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pengguna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenggunaId('fooValue');   // WHERE pengguna_id = 'fooValue'
     * $query->filterByPenggunaId('%fooValue%'); // WHERE pengguna_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penggunaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penggunaId)) {
                $penggunaId = str_replace('*', '%', $penggunaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $penggunaId, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::LEMBAGA_ID, $lembagaId, $comparison);
    }

    /**
     * Filter the query on the yayasan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByYayasanId('fooValue');   // WHERE yayasan_id = 'fooValue'
     * $query->filterByYayasanId('%fooValue%'); // WHERE yayasan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $yayasanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByYayasanId($yayasanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($yayasanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $yayasanId)) {
                $yayasanId = str_replace('*', '%', $yayasanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::YAYASAN_ID, $yayasanId, $comparison);
    }

    /**
     * Filter the query on the la_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLaId('fooValue');   // WHERE la_id = 'fooValue'
     * $query->filterByLaId('%fooValue%'); // WHERE la_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $laId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByLaId($laId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($laId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $laId)) {
                $laId = str_replace('*', '%', $laId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::LA_ID, $laId, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::DUDI_ID, $dudiId, $comparison);
    }

    /**
     * Filter the query on the kode_lemb_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeLembSert(1234); // WHERE kode_lemb_sert = 1234
     * $query->filterByKodeLembSert(array(12, 34)); // WHERE kode_lemb_sert IN (12, 34)
     * $query->filterByKodeLembSert(array('min' => 12)); // WHERE kode_lemb_sert >= 12
     * $query->filterByKodeLembSert(array('max' => 12)); // WHERE kode_lemb_sert <= 12
     * </code>
     *
     * @see       filterByLembSertifikasi()
     *
     * @param     mixed $kodeLembSert The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByKodeLembSert($kodeLembSert = null, $comparison = null)
    {
        if (is_array($kodeLembSert)) {
            $useMinMax = false;
            if (isset($kodeLembSert['min'])) {
                $this->addUsingAlias(PenggunaPeer::KODE_LEMB_SERT, $kodeLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLembSert['max'])) {
                $this->addUsingAlias(PenggunaPeer::KODE_LEMB_SERT, $kodeLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::KODE_LEMB_SERT, $kodeLembSert, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the username column
     *
     * Example usage:
     * <code>
     * $query->filterByUsername('fooValue');   // WHERE username = 'fooValue'
     * $query->filterByUsername('%fooValue%'); // WHERE username LIKE '%fooValue%'
     * </code>
     *
     * @param     string $username The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByUsername($username = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($username)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $username)) {
                $username = str_replace('*', '%', $username);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::USERNAME, $username, $comparison);
    }

    /**
     * Filter the query on the a_bot column
     *
     * Example usage:
     * <code>
     * $query->filterByABot(1234); // WHERE a_bot = 1234
     * $query->filterByABot(array(12, 34)); // WHERE a_bot IN (12, 34)
     * $query->filterByABot(array('min' => 12)); // WHERE a_bot >= 12
     * $query->filterByABot(array('max' => 12)); // WHERE a_bot <= 12
     * </code>
     *
     * @param     mixed $aBot The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByABot($aBot = null, $comparison = null)
    {
        if (is_array($aBot)) {
            $useMinMax = false;
            if (isset($aBot['min'])) {
                $this->addUsingAlias(PenggunaPeer::A_BOT, $aBot['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBot['max'])) {
                $this->addUsingAlias(PenggunaPeer::A_BOT, $aBot['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::A_BOT, $aBot, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::NAMA, $nama, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
    }

    /**
     * Filter the query on the tgl_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTglLahir('2011-03-14'); // WHERE tgl_lahir = '2011-03-14'
     * $query->filterByTglLahir('now'); // WHERE tgl_lahir = '2011-03-14'
     * $query->filterByTglLahir(array('max' => 'yesterday')); // WHERE tgl_lahir > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglLahir The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByTglLahir($tglLahir = null, $comparison = null)
    {
        if (is_array($tglLahir)) {
            $useMinMax = false;
            if (isset($tglLahir['min'])) {
                $this->addUsingAlias(PenggunaPeer::TGL_LAHIR, $tglLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglLahir['max'])) {
                $this->addUsingAlias(PenggunaPeer::TGL_LAHIR, $tglLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::TGL_LAHIR, $tglLahir, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the nip_nim column
     *
     * Example usage:
     * <code>
     * $query->filterByNipNim('fooValue');   // WHERE nip_nim = 'fooValue'
     * $query->filterByNipNim('%fooValue%'); // WHERE nip_nim LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nipNim The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByNipNim($nipNim = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nipNim)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nipNim)) {
                $nipNim = str_replace('*', '%', $nipNim);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::NIP_NIM, $nipNim, $comparison);
    }

    /**
     * Filter the query on the jabatan_lembaga column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanLembaga('fooValue');   // WHERE jabatan_lembaga = 'fooValue'
     * $query->filterByJabatanLembaga('%fooValue%'); // WHERE jabatan_lembaga LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jabatanLembaga The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByJabatanLembaga($jabatanLembaga = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jabatanLembaga)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jabatanLembaga)) {
                $jabatanLembaga = str_replace('*', '%', $jabatanLembaga);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::JABATAN_LEMBAGA, $jabatanLembaga, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%'); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamat)) {
                $alamat = str_replace('*', '%', $alamat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::ALAMAT, $alamat, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the no_telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByNoTelepon('fooValue');   // WHERE no_telepon = 'fooValue'
     * $query->filterByNoTelepon('%fooValue%'); // WHERE no_telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noTelepon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByNoTelepon($noTelepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTelepon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noTelepon)) {
                $noTelepon = str_replace('*', '%', $noTelepon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::NO_TELEPON, $noTelepon, $comparison);
    }

    /**
     * Filter the query on the no_hp column
     *
     * Example usage:
     * <code>
     * $query->filterByNoHp('fooValue');   // WHERE no_hp = 'fooValue'
     * $query->filterByNoHp('%fooValue%'); // WHERE no_hp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noHp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByNoHp($noHp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noHp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noHp)) {
                $noHp = str_replace('*', '%', $noHp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::NO_HP, $noHp, $comparison);
    }

    /**
     * Filter the query on the approval_pengguna column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovalPengguna(1234); // WHERE approval_pengguna = 1234
     * $query->filterByApprovalPengguna(array(12, 34)); // WHERE approval_pengguna IN (12, 34)
     * $query->filterByApprovalPengguna(array('min' => 12)); // WHERE approval_pengguna >= 12
     * $query->filterByApprovalPengguna(array('max' => 12)); // WHERE approval_pengguna <= 12
     * </code>
     *
     * @param     mixed $approvalPengguna The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByApprovalPengguna($approvalPengguna = null, $comparison = null)
    {
        if (is_array($approvalPengguna)) {
            $useMinMax = false;
            if (isset($approvalPengguna['min'])) {
                $this->addUsingAlias(PenggunaPeer::APPROVAL_PENGGUNA, $approvalPengguna['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approvalPengguna['max'])) {
                $this->addUsingAlias(PenggunaPeer::APPROVAL_PENGGUNA, $approvalPengguna['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::APPROVAL_PENGGUNA, $approvalPengguna, $comparison);
    }

    /**
     * Filter the query on the aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByAktif(1234); // WHERE aktif = 1234
     * $query->filterByAktif(array(12, 34)); // WHERE aktif IN (12, 34)
     * $query->filterByAktif(array('min' => 12)); // WHERE aktif >= 12
     * $query->filterByAktif(array('max' => 12)); // WHERE aktif <= 12
     * </code>
     *
     * @param     mixed $aktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByAktif($aktif = null, $comparison = null)
    {
        if (is_array($aktif)) {
            $useMinMax = false;
            if (isset($aktif['min'])) {
                $this->addUsingAlias(PenggunaPeer::AKTIF, $aktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aktif['max'])) {
                $this->addUsingAlias(PenggunaPeer::AKTIF, $aktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::AKTIF, $aktif, $comparison);
    }

    /**
     * Filter the query on the password column
     *
     * Example usage:
     * <code>
     * $query->filterByPassword('fooValue');   // WHERE password = 'fooValue'
     * $query->filterByPassword('%fooValue%'); // WHERE password LIKE '%fooValue%'
     * </code>
     *
     * @param     string $password The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByPassword($password = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($password)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $password)) {
                $password = str_replace('*', '%', $password);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::PASSWORD, $password, $comparison);
    }

    /**
     * Filter the query on the password_lama column
     *
     * Example usage:
     * <code>
     * $query->filterByPasswordLama('fooValue');   // WHERE password_lama = 'fooValue'
     * $query->filterByPasswordLama('%fooValue%'); // WHERE password_lama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $passwordLama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByPasswordLama($passwordLama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($passwordLama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $passwordLama)) {
                $passwordLama = str_replace('*', '%', $passwordLama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::PASSWORD_LAMA, $passwordLama, $comparison);
    }

    /**
     * Filter the query on the tgl_ganti_pwd column
     *
     * Example usage:
     * <code>
     * $query->filterByTglGantiPwd('2011-03-14'); // WHERE tgl_ganti_pwd = '2011-03-14'
     * $query->filterByTglGantiPwd('now'); // WHERE tgl_ganti_pwd = '2011-03-14'
     * $query->filterByTglGantiPwd(array('max' => 'yesterday')); // WHERE tgl_ganti_pwd > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglGantiPwd The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByTglGantiPwd($tglGantiPwd = null, $comparison = null)
    {
        if (is_array($tglGantiPwd)) {
            $useMinMax = false;
            if (isset($tglGantiPwd['min'])) {
                $this->addUsingAlias(PenggunaPeer::TGL_GANTI_PWD, $tglGantiPwd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglGantiPwd['max'])) {
                $this->addUsingAlias(PenggunaPeer::TGL_GANTI_PWD, $tglGantiPwd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::TGL_GANTI_PWD, $tglGantiPwd, $comparison);
    }

    /**
     * Filter the query on the id_sdm_pengguna column
     *
     * Example usage:
     * <code>
     * $query->filterByIdSdmPengguna('fooValue');   // WHERE id_sdm_pengguna = 'fooValue'
     * $query->filterByIdSdmPengguna('%fooValue%'); // WHERE id_sdm_pengguna LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idSdmPengguna The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByIdSdmPengguna($idSdmPengguna = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idSdmPengguna)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idSdmPengguna)) {
                $idSdmPengguna = str_replace('*', '%', $idSdmPengguna);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::ID_SDM_PENGGUNA, $idSdmPengguna, $comparison);
    }

    /**
     * Filter the query on the id_pd_pengguna column
     *
     * Example usage:
     * <code>
     * $query->filterByIdPdPengguna('fooValue');   // WHERE id_pd_pengguna = 'fooValue'
     * $query->filterByIdPdPengguna('%fooValue%'); // WHERE id_pd_pengguna LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idPdPengguna The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByIdPdPengguna($idPdPengguna = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idPdPengguna)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idPdPengguna)) {
                $idPdPengguna = str_replace('*', '%', $idPdPengguna);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::ID_PD_PENGGUNA, $idPdPengguna, $comparison);
    }

    /**
     * Filter the query on the token_reg column
     *
     * Example usage:
     * <code>
     * $query->filterByTokenReg('fooValue');   // WHERE token_reg = 'fooValue'
     * $query->filterByTokenReg('%fooValue%'); // WHERE token_reg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tokenReg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByTokenReg($tokenReg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tokenReg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tokenReg)) {
                $tokenReg = str_replace('*', '%', $tokenReg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::TOKEN_REG, $tokenReg, $comparison);
    }

    /**
     * Filter the query on the jabatan column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatan('fooValue');   // WHERE jabatan = 'fooValue'
     * $query->filterByJabatan('%fooValue%'); // WHERE jabatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jabatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByJabatan($jabatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jabatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jabatan)) {
                $jabatan = str_replace('*', '%', $jabatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::JABATAN, $jabatan, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::PTK_ID, $ptkId, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PenggunaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PenggunaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PenggunaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PenggunaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PenggunaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PenggunaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PenggunaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PenggunaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PenggunaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PenggunaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related LembagaAkreditasi object
     *
     * @param   LembagaAkreditasi|PropelObjectCollection $lembagaAkreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaAkreditasi($lembagaAkreditasi, $comparison = null)
    {
        if ($lembagaAkreditasi instanceof LembagaAkreditasi) {
            return $this
                ->addUsingAlias(PenggunaPeer::LA_ID, $lembagaAkreditasi->getLaId(), $comparison);
        } elseif ($lembagaAkreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenggunaPeer::LA_ID, $lembagaAkreditasi->toKeyValue('PrimaryKey', 'LaId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaAkreditasi() only accepts arguments of type LembagaAkreditasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaAkreditasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function joinLembagaAkreditasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaAkreditasi');

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
            $this->addJoinObject($join, 'LembagaAkreditasi');
        }

        return $this;
    }

    /**
     * Use the LembagaAkreditasi relation LembagaAkreditasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaAkreditasiQuery A secondary query class using the current class as primary query
     */
    public function useLembagaAkreditasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLembagaAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaAkreditasi', '\DataDikdas\Model\LembagaAkreditasiQuery');
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(PenggunaPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenggunaPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

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
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related LembSertifikasi object
     *
     * @param   LembSertifikasi|PropelObjectCollection $lembSertifikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembSertifikasi($lembSertifikasi, $comparison = null)
    {
        if ($lembSertifikasi instanceof LembSertifikasi) {
            return $this
                ->addUsingAlias(PenggunaPeer::KODE_LEMB_SERT, $lembSertifikasi->getKodeLembSert(), $comparison);
        } elseif ($lembSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PenggunaPeer::KODE_LEMB_SERT, $lembSertifikasi->toKeyValue('PrimaryKey', 'KodeLembSert'), $comparison);
        } else {
            throw new PropelException('filterByLembSertifikasi() only accepts arguments of type LembSertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembSertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function joinLembSertifikasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembSertifikasi');

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
            $this->addJoinObject($join, 'LembSertifikasi');
        }

        return $this;
    }

    /**
     * Use the LembSertifikasi relation LembSertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembSertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useLembSertifikasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLembSertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembSertifikasi', '\DataDikdas\Model\LembSertifikasiQuery');
    }

    /**
     * Filter the query by a related LogOtentikasi object
     *
     * @param   LogOtentikasi|PropelObjectCollection $logOtentikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLogOtentikasi($logOtentikasi, $comparison = null)
    {
        if ($logOtentikasi instanceof LogOtentikasi) {
            return $this
                ->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $logOtentikasi->getPenggunaId(), $comparison);
        } elseif ($logOtentikasi instanceof PropelObjectCollection) {
            return $this
                ->useLogOtentikasiQuery()
                ->filterByPrimaryKeys($logOtentikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLogOtentikasi() only accepts arguments of type LogOtentikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LogOtentikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function joinLogOtentikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LogOtentikasi');

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
            $this->addJoinObject($join, 'LogOtentikasi');
        }

        return $this;
    }

    /**
     * Use the LogOtentikasi relation LogOtentikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LogOtentikasiQuery A secondary query class using the current class as primary query
     */
    public function useLogOtentikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLogOtentikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LogOtentikasi', '\DataDikdas\Model\LogOtentikasiQuery');
    }

    /**
     * Filter the query by a related RolePengguna object
     *
     * @param   RolePengguna|PropelObjectCollection $rolePengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRolePengguna($rolePengguna, $comparison = null)
    {
        if ($rolePengguna instanceof RolePengguna) {
            return $this
                ->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $rolePengguna->getPenggunaId(), $comparison);
        } elseif ($rolePengguna instanceof PropelObjectCollection) {
            return $this
                ->useRolePenggunaQuery()
                ->filterByPrimaryKeys($rolePengguna->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRolePengguna() only accepts arguments of type RolePengguna or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RolePengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function joinRolePengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RolePengguna');

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
            $this->addJoinObject($join, 'RolePengguna');
        }

        return $this;
    }

    /**
     * Use the RolePengguna relation RolePengguna object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RolePenggunaQuery A secondary query class using the current class as primary query
     */
    public function useRolePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRolePengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RolePengguna', '\DataDikdas\Model\RolePenggunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Pengguna $pengguna Object to remove from the list of results
     *
     * @return PenggunaQuery The current query, for fluid interface
     */
    public function prune($pengguna = null)
    {
        if ($pengguna) {
            $this->addUsingAlias(PenggunaPeer::PENGGUNA_ID, $pengguna->getPenggunaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
