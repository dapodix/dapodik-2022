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
use DataDikdas\Model\LogOtorisasi;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\Peran;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RolePenggunaPeer;
use DataDikdas\Model\RolePenggunaQuery;

/**
 * Base class that represents a query for the 'man_akses.role_pengguna' table.
 *
 * 
 *
 * @method RolePenggunaQuery orderByIdRolePengguna($order = Criteria::ASC) Order by the id_role_pengguna column
 * @method RolePenggunaQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method RolePenggunaQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method RolePenggunaQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method RolePenggunaQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method RolePenggunaQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method RolePenggunaQuery orderByKodeLembSert($order = Criteria::ASC) Order by the kode_lemb_sert column
 * @method RolePenggunaQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method RolePenggunaQuery orderByPeranId($order = Criteria::ASC) Order by the peran_id column
 * @method RolePenggunaQuery orderBySkPenugasan($order = Criteria::ASC) Order by the sk_penugasan column
 * @method RolePenggunaQuery orderByTglSkPenugasan($order = Criteria::ASC) Order by the tgl_sk_penugasan column
 * @method RolePenggunaQuery orderByApprovalPeran($order = Criteria::ASC) Order by the approval_peran column
 * @method RolePenggunaQuery orderByTglKadaluwarsa($order = Criteria::ASC) Order by the tgl_kadaluwarsa column
 * @method RolePenggunaQuery orderByLastActive($order = Criteria::ASC) Order by the last_active column
 * @method RolePenggunaQuery orderByJenisLembaga($order = Criteria::ASC) Order by the jenis_lembaga column
 * @method RolePenggunaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RolePenggunaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RolePenggunaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method RolePenggunaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method RolePenggunaQuery groupByIdRolePengguna() Group by the id_role_pengguna column
 * @method RolePenggunaQuery groupBySekolahId() Group by the sekolah_id column
 * @method RolePenggunaQuery groupByLembagaId() Group by the lembaga_id column
 * @method RolePenggunaQuery groupByYayasanId() Group by the yayasan_id column
 * @method RolePenggunaQuery groupByLaId() Group by the la_id column
 * @method RolePenggunaQuery groupByDudiId() Group by the dudi_id column
 * @method RolePenggunaQuery groupByKodeLembSert() Group by the kode_lemb_sert column
 * @method RolePenggunaQuery groupByPenggunaId() Group by the pengguna_id column
 * @method RolePenggunaQuery groupByPeranId() Group by the peran_id column
 * @method RolePenggunaQuery groupBySkPenugasan() Group by the sk_penugasan column
 * @method RolePenggunaQuery groupByTglSkPenugasan() Group by the tgl_sk_penugasan column
 * @method RolePenggunaQuery groupByApprovalPeran() Group by the approval_peran column
 * @method RolePenggunaQuery groupByTglKadaluwarsa() Group by the tgl_kadaluwarsa column
 * @method RolePenggunaQuery groupByLastActive() Group by the last_active column
 * @method RolePenggunaQuery groupByJenisLembaga() Group by the jenis_lembaga column
 * @method RolePenggunaQuery groupByCreateDate() Group by the create_date column
 * @method RolePenggunaQuery groupByLastUpdate() Group by the last_update column
 * @method RolePenggunaQuery groupByExpiredDate() Group by the expired_date column
 * @method RolePenggunaQuery groupByLastSync() Group by the last_sync column
 *
 * @method RolePenggunaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RolePenggunaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RolePenggunaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RolePenggunaQuery leftJoinPeran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Peran relation
 * @method RolePenggunaQuery rightJoinPeran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Peran relation
 * @method RolePenggunaQuery innerJoinPeran($relationAlias = null) Adds a INNER JOIN clause to the query using the Peran relation
 *
 * @method RolePenggunaQuery leftJoinLembSertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembSertifikasi relation
 * @method RolePenggunaQuery rightJoinLembSertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembSertifikasi relation
 * @method RolePenggunaQuery innerJoinLembSertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembSertifikasi relation
 *
 * @method RolePenggunaQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method RolePenggunaQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method RolePenggunaQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method RolePenggunaQuery leftJoinLembagaAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaAkreditasi relation
 * @method RolePenggunaQuery rightJoinLembagaAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaAkreditasi relation
 * @method RolePenggunaQuery innerJoinLembagaAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaAkreditasi relation
 *
 * @method RolePenggunaQuery leftJoinLogOtorisasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LogOtorisasi relation
 * @method RolePenggunaQuery rightJoinLogOtorisasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LogOtorisasi relation
 * @method RolePenggunaQuery innerJoinLogOtorisasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LogOtorisasi relation
 *
 * @method RolePengguna findOne(PropelPDO $con = null) Return the first RolePengguna matching the query
 * @method RolePengguna findOneOrCreate(PropelPDO $con = null) Return the first RolePengguna matching the query, or a new RolePengguna object populated from the query conditions when no match is found
 *
 * @method RolePengguna findOneBySekolahId(string $sekolah_id) Return the first RolePengguna filtered by the sekolah_id column
 * @method RolePengguna findOneByLembagaId(string $lembaga_id) Return the first RolePengguna filtered by the lembaga_id column
 * @method RolePengguna findOneByYayasanId(string $yayasan_id) Return the first RolePengguna filtered by the yayasan_id column
 * @method RolePengguna findOneByLaId(string $la_id) Return the first RolePengguna filtered by the la_id column
 * @method RolePengguna findOneByDudiId(string $dudi_id) Return the first RolePengguna filtered by the dudi_id column
 * @method RolePengguna findOneByKodeLembSert(string $kode_lemb_sert) Return the first RolePengguna filtered by the kode_lemb_sert column
 * @method RolePengguna findOneByPenggunaId(string $pengguna_id) Return the first RolePengguna filtered by the pengguna_id column
 * @method RolePengguna findOneByPeranId(int $peran_id) Return the first RolePengguna filtered by the peran_id column
 * @method RolePengguna findOneBySkPenugasan(string $sk_penugasan) Return the first RolePengguna filtered by the sk_penugasan column
 * @method RolePengguna findOneByTglSkPenugasan(string $tgl_sk_penugasan) Return the first RolePengguna filtered by the tgl_sk_penugasan column
 * @method RolePengguna findOneByApprovalPeran(string $approval_peran) Return the first RolePengguna filtered by the approval_peran column
 * @method RolePengguna findOneByTglKadaluwarsa(string $tgl_kadaluwarsa) Return the first RolePengguna filtered by the tgl_kadaluwarsa column
 * @method RolePengguna findOneByLastActive(string $last_active) Return the first RolePengguna filtered by the last_active column
 * @method RolePengguna findOneByJenisLembaga(string $jenis_lembaga) Return the first RolePengguna filtered by the jenis_lembaga column
 * @method RolePengguna findOneByCreateDate(string $create_date) Return the first RolePengguna filtered by the create_date column
 * @method RolePengguna findOneByLastUpdate(string $last_update) Return the first RolePengguna filtered by the last_update column
 * @method RolePengguna findOneByExpiredDate(string $expired_date) Return the first RolePengguna filtered by the expired_date column
 * @method RolePengguna findOneByLastSync(string $last_sync) Return the first RolePengguna filtered by the last_sync column
 *
 * @method array findByIdRolePengguna(string $id_role_pengguna) Return RolePengguna objects filtered by the id_role_pengguna column
 * @method array findBySekolahId(string $sekolah_id) Return RolePengguna objects filtered by the sekolah_id column
 * @method array findByLembagaId(string $lembaga_id) Return RolePengguna objects filtered by the lembaga_id column
 * @method array findByYayasanId(string $yayasan_id) Return RolePengguna objects filtered by the yayasan_id column
 * @method array findByLaId(string $la_id) Return RolePengguna objects filtered by the la_id column
 * @method array findByDudiId(string $dudi_id) Return RolePengguna objects filtered by the dudi_id column
 * @method array findByKodeLembSert(string $kode_lemb_sert) Return RolePengguna objects filtered by the kode_lemb_sert column
 * @method array findByPenggunaId(string $pengguna_id) Return RolePengguna objects filtered by the pengguna_id column
 * @method array findByPeranId(int $peran_id) Return RolePengguna objects filtered by the peran_id column
 * @method array findBySkPenugasan(string $sk_penugasan) Return RolePengguna objects filtered by the sk_penugasan column
 * @method array findByTglSkPenugasan(string $tgl_sk_penugasan) Return RolePengguna objects filtered by the tgl_sk_penugasan column
 * @method array findByApprovalPeran(string $approval_peran) Return RolePengguna objects filtered by the approval_peran column
 * @method array findByTglKadaluwarsa(string $tgl_kadaluwarsa) Return RolePengguna objects filtered by the tgl_kadaluwarsa column
 * @method array findByLastActive(string $last_active) Return RolePengguna objects filtered by the last_active column
 * @method array findByJenisLembaga(string $jenis_lembaga) Return RolePengguna objects filtered by the jenis_lembaga column
 * @method array findByCreateDate(string $create_date) Return RolePengguna objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RolePengguna objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return RolePengguna objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return RolePengguna objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRolePenggunaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRolePenggunaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RolePengguna', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RolePenggunaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RolePenggunaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RolePenggunaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RolePenggunaQuery) {
            return $criteria;
        }
        $query = new RolePenggunaQuery();
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
     * @return   RolePengguna|RolePengguna[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RolePenggunaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RolePenggunaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RolePengguna A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdRolePengguna($key, $con = null)
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
     * @return                 RolePengguna A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_role_pengguna", "sekolah_id", "lembaga_id", "yayasan_id", "la_id", "dudi_id", "kode_lemb_sert", "pengguna_id", "peran_id", "sk_penugasan", "tgl_sk_penugasan", "approval_peran", "tgl_kadaluwarsa", "last_active", "jenis_lembaga", "create_date", "last_update", "expired_date", "last_sync" FROM "man_akses"."role_pengguna" WHERE "id_role_pengguna" = :p0';
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
            $obj = new RolePengguna();
            $obj->hydrate($row);
            RolePenggunaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RolePengguna|RolePengguna[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RolePengguna[]|mixed the list of results, formatted by the current formatter
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RolePenggunaPeer::ID_ROLE_PENGGUNA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RolePenggunaPeer::ID_ROLE_PENGGUNA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_role_pengguna column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRolePengguna('fooValue');   // WHERE id_role_pengguna = 'fooValue'
     * $query->filterByIdRolePengguna('%fooValue%'); // WHERE id_role_pengguna LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRolePengguna The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByIdRolePengguna($idRolePengguna = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRolePengguna)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRolePengguna)) {
                $idRolePengguna = str_replace('*', '%', $idRolePengguna);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::ID_ROLE_PENGGUNA, $idRolePengguna, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::LEMBAGA_ID, $lembagaId, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::YAYASAN_ID, $yayasanId, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::LA_ID, $laId, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::DUDI_ID, $dudiId, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByKodeLembSert($kodeLembSert = null, $comparison = null)
    {
        if (is_array($kodeLembSert)) {
            $useMinMax = false;
            if (isset($kodeLembSert['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::KODE_LEMB_SERT, $kodeLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLembSert['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::KODE_LEMB_SERT, $kodeLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::KODE_LEMB_SERT, $kodeLembSert, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RolePenggunaPeer::PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the peran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranId(1234); // WHERE peran_id = 1234
     * $query->filterByPeranId(array(12, 34)); // WHERE peran_id IN (12, 34)
     * $query->filterByPeranId(array('min' => 12)); // WHERE peran_id >= 12
     * $query->filterByPeranId(array('max' => 12)); // WHERE peran_id <= 12
     * </code>
     *
     * @see       filterByPeran()
     *
     * @param     mixed $peranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByPeranId($peranId = null, $comparison = null)
    {
        if (is_array($peranId)) {
            $useMinMax = false;
            if (isset($peranId['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::PERAN_ID, $peranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peranId['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::PERAN_ID, $peranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::PERAN_ID, $peranId, $comparison);
    }

    /**
     * Filter the query on the sk_penugasan column
     *
     * Example usage:
     * <code>
     * $query->filterBySkPenugasan('fooValue');   // WHERE sk_penugasan = 'fooValue'
     * $query->filterBySkPenugasan('%fooValue%'); // WHERE sk_penugasan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skPenugasan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterBySkPenugasan($skPenugasan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skPenugasan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skPenugasan)) {
                $skPenugasan = str_replace('*', '%', $skPenugasan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::SK_PENUGASAN, $skPenugasan, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_penugasan column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkPenugasan('2011-03-14'); // WHERE tgl_sk_penugasan = '2011-03-14'
     * $query->filterByTglSkPenugasan('now'); // WHERE tgl_sk_penugasan = '2011-03-14'
     * $query->filterByTglSkPenugasan(array('max' => 'yesterday')); // WHERE tgl_sk_penugasan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkPenugasan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByTglSkPenugasan($tglSkPenugasan = null, $comparison = null)
    {
        if (is_array($tglSkPenugasan)) {
            $useMinMax = false;
            if (isset($tglSkPenugasan['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::TGL_SK_PENUGASAN, $tglSkPenugasan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkPenugasan['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::TGL_SK_PENUGASAN, $tglSkPenugasan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::TGL_SK_PENUGASAN, $tglSkPenugasan, $comparison);
    }

    /**
     * Filter the query on the approval_peran column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovalPeran(1234); // WHERE approval_peran = 1234
     * $query->filterByApprovalPeran(array(12, 34)); // WHERE approval_peran IN (12, 34)
     * $query->filterByApprovalPeran(array('min' => 12)); // WHERE approval_peran >= 12
     * $query->filterByApprovalPeran(array('max' => 12)); // WHERE approval_peran <= 12
     * </code>
     *
     * @param     mixed $approvalPeran The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByApprovalPeran($approvalPeran = null, $comparison = null)
    {
        if (is_array($approvalPeran)) {
            $useMinMax = false;
            if (isset($approvalPeran['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::APPROVAL_PERAN, $approvalPeran['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approvalPeran['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::APPROVAL_PERAN, $approvalPeran['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::APPROVAL_PERAN, $approvalPeran, $comparison);
    }

    /**
     * Filter the query on the tgl_kadaluwarsa column
     *
     * Example usage:
     * <code>
     * $query->filterByTglKadaluwarsa('2011-03-14'); // WHERE tgl_kadaluwarsa = '2011-03-14'
     * $query->filterByTglKadaluwarsa('now'); // WHERE tgl_kadaluwarsa = '2011-03-14'
     * $query->filterByTglKadaluwarsa(array('max' => 'yesterday')); // WHERE tgl_kadaluwarsa > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglKadaluwarsa The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByTglKadaluwarsa($tglKadaluwarsa = null, $comparison = null)
    {
        if (is_array($tglKadaluwarsa)) {
            $useMinMax = false;
            if (isset($tglKadaluwarsa['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::TGL_KADALUWARSA, $tglKadaluwarsa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglKadaluwarsa['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::TGL_KADALUWARSA, $tglKadaluwarsa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::TGL_KADALUWARSA, $tglKadaluwarsa, $comparison);
    }

    /**
     * Filter the query on the last_active column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActive('2011-03-14'); // WHERE last_active = '2011-03-14'
     * $query->filterByLastActive('now'); // WHERE last_active = '2011-03-14'
     * $query->filterByLastActive(array('max' => 'yesterday')); // WHERE last_active > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActive The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByLastActive($lastActive = null, $comparison = null)
    {
        if (is_array($lastActive)) {
            $useMinMax = false;
            if (isset($lastActive['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_ACTIVE, $lastActive['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActive['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_ACTIVE, $lastActive['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::LAST_ACTIVE, $lastActive, $comparison);
    }

    /**
     * Filter the query on the jenis_lembaga column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisLembaga('fooValue');   // WHERE jenis_lembaga = 'fooValue'
     * $query->filterByJenisLembaga('%fooValue%'); // WHERE jenis_lembaga LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisLembaga The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByJenisLembaga($jenisLembaga = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisLembaga)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisLembaga)) {
                $jenisLembaga = str_replace('*', '%', $jenisLembaga);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::JENIS_LEMBAGA, $jenisLembaga, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RolePenggunaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RolePenggunaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Peran object
     *
     * @param   Peran|PropelObjectCollection $peran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RolePenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPeran($peran, $comparison = null)
    {
        if ($peran instanceof Peran) {
            return $this
                ->addUsingAlias(RolePenggunaPeer::PERAN_ID, $peran->getPeranId(), $comparison);
        } elseif ($peran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RolePenggunaPeer::PERAN_ID, $peran->toKeyValue('PrimaryKey', 'PeranId'), $comparison);
        } else {
            throw new PropelException('filterByPeran() only accepts arguments of type Peran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Peran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function joinPeran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Peran');

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
            $this->addJoinObject($join, 'Peran');
        }

        return $this;
    }

    /**
     * Use the Peran relation Peran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PeranQuery A secondary query class using the current class as primary query
     */
    public function usePeranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPeran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Peran', '\DataDikdas\Model\PeranQuery');
    }

    /**
     * Filter the query by a related LembSertifikasi object
     *
     * @param   LembSertifikasi|PropelObjectCollection $lembSertifikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RolePenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembSertifikasi($lembSertifikasi, $comparison = null)
    {
        if ($lembSertifikasi instanceof LembSertifikasi) {
            return $this
                ->addUsingAlias(RolePenggunaPeer::KODE_LEMB_SERT, $lembSertifikasi->getKodeLembSert(), $comparison);
        } elseif ($lembSertifikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RolePenggunaPeer::KODE_LEMB_SERT, $lembSertifikasi->toKeyValue('PrimaryKey', 'KodeLembSert'), $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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
     * Filter the query by a related Pengguna object
     *
     * @param   Pengguna|PropelObjectCollection $pengguna The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RolePenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof Pengguna) {
            return $this
                ->addUsingAlias(RolePenggunaPeer::PENGGUNA_ID, $pengguna->getPenggunaId(), $comparison);
        } elseif ($pengguna instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RolePenggunaPeer::PENGGUNA_ID, $pengguna->toKeyValue('PrimaryKey', 'PenggunaId'), $comparison);
        } else {
            throw new PropelException('filterByPengguna() only accepts arguments of type Pengguna or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pengguna relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pengguna');

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
            $this->addJoinObject($join, 'Pengguna');
        }

        return $this;
    }

    /**
     * Use the Pengguna relation Pengguna object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenggunaQuery A secondary query class using the current class as primary query
     */
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\DataDikdas\Model\PenggunaQuery');
    }

    /**
     * Filter the query by a related LembagaAkreditasi object
     *
     * @param   LembagaAkreditasi|PropelObjectCollection $lembagaAkreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RolePenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaAkreditasi($lembagaAkreditasi, $comparison = null)
    {
        if ($lembagaAkreditasi instanceof LembagaAkreditasi) {
            return $this
                ->addUsingAlias(RolePenggunaPeer::LA_ID, $lembagaAkreditasi->getLaId(), $comparison);
        } elseif ($lembagaAkreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RolePenggunaPeer::LA_ID, $lembagaAkreditasi->toKeyValue('PrimaryKey', 'LaId'), $comparison);
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
     * @return RolePenggunaQuery The current query, for fluid interface
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
     * Filter the query by a related LogOtorisasi object
     *
     * @param   LogOtorisasi|PropelObjectCollection $logOtorisasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RolePenggunaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLogOtorisasi($logOtorisasi, $comparison = null)
    {
        if ($logOtorisasi instanceof LogOtorisasi) {
            return $this
                ->addUsingAlias(RolePenggunaPeer::ID_ROLE_PENGGUNA, $logOtorisasi->getIdRolePengguna(), $comparison);
        } elseif ($logOtorisasi instanceof PropelObjectCollection) {
            return $this
                ->useLogOtorisasiQuery()
                ->filterByPrimaryKeys($logOtorisasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLogOtorisasi() only accepts arguments of type LogOtorisasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LogOtorisasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function joinLogOtorisasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LogOtorisasi');

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
            $this->addJoinObject($join, 'LogOtorisasi');
        }

        return $this;
    }

    /**
     * Use the LogOtorisasi relation LogOtorisasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LogOtorisasiQuery A secondary query class using the current class as primary query
     */
    public function useLogOtorisasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLogOtorisasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LogOtorisasi', '\DataDikdas\Model\LogOtorisasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RolePengguna $rolePengguna Object to remove from the list of results
     *
     * @return RolePenggunaQuery The current query, for fluid interface
     */
    public function prune($rolePengguna = null)
    {
        if ($rolePengguna) {
            $this->addUsingAlias(RolePenggunaPeer::ID_ROLE_PENGGUNA, $rolePengguna->getIdRolePengguna(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
