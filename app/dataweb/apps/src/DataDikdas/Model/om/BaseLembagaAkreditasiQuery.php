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
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiSp;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaAkreditasiPeer;
use DataDikdas\Model\LembagaAkreditasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\RolePengguna;

/**
 * Base class that represents a query for the 'ref.lembaga_akreditasi' table.
 *
 * 
 *
 * @method LembagaAkreditasiQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method LembagaAkreditasiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method LembagaAkreditasiQuery orderByLaTglMulai($order = Criteria::ASC) Order by the la_tgl_mulai column
 * @method LembagaAkreditasiQuery orderByLaKet($order = Criteria::ASC) Order by the la_ket column
 * @method LembagaAkreditasiQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method LembagaAkreditasiQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method LembagaAkreditasiQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method LembagaAkreditasiQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method LembagaAkreditasiQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method LembagaAkreditasiQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method LembagaAkreditasiQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method LembagaAkreditasiQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method LembagaAkreditasiQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method LembagaAkreditasiQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method LembagaAkreditasiQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method LembagaAkreditasiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method LembagaAkreditasiQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method LembagaAkreditasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LembagaAkreditasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LembagaAkreditasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method LembagaAkreditasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method LembagaAkreditasiQuery groupByLaId() Group by the la_id column
 * @method LembagaAkreditasiQuery groupByNama() Group by the nama column
 * @method LembagaAkreditasiQuery groupByLaTglMulai() Group by the la_tgl_mulai column
 * @method LembagaAkreditasiQuery groupByLaKet() Group by the la_ket column
 * @method LembagaAkreditasiQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method LembagaAkreditasiQuery groupByRt() Group by the rt column
 * @method LembagaAkreditasiQuery groupByRw() Group by the rw column
 * @method LembagaAkreditasiQuery groupByNamaDusun() Group by the nama_dusun column
 * @method LembagaAkreditasiQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method LembagaAkreditasiQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method LembagaAkreditasiQuery groupByKodePos() Group by the kode_pos column
 * @method LembagaAkreditasiQuery groupByLintang() Group by the lintang column
 * @method LembagaAkreditasiQuery groupByBujur() Group by the bujur column
 * @method LembagaAkreditasiQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method LembagaAkreditasiQuery groupByNomorFax() Group by the nomor_fax column
 * @method LembagaAkreditasiQuery groupByEmail() Group by the email column
 * @method LembagaAkreditasiQuery groupByWebsite() Group by the website column
 * @method LembagaAkreditasiQuery groupByCreateDate() Group by the create_date column
 * @method LembagaAkreditasiQuery groupByLastUpdate() Group by the last_update column
 * @method LembagaAkreditasiQuery groupByExpiredDate() Group by the expired_date column
 * @method LembagaAkreditasiQuery groupByLastSync() Group by the last_sync column
 *
 * @method LembagaAkreditasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LembagaAkreditasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LembagaAkreditasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LembagaAkreditasiQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method LembagaAkreditasiQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method LembagaAkreditasiQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method LembagaAkreditasiQuery leftJoinAkreditasiProdi($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiProdi relation
 * @method LembagaAkreditasiQuery rightJoinAkreditasiProdi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiProdi relation
 * @method LembagaAkreditasiQuery innerJoinAkreditasiProdi($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiProdi relation
 *
 * @method LembagaAkreditasiQuery leftJoinAkreditasiSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the AkreditasiSp relation
 * @method LembagaAkreditasiQuery rightJoinAkreditasiSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AkreditasiSp relation
 * @method LembagaAkreditasiQuery innerJoinAkreditasiSp($relationAlias = null) Adds a INNER JOIN clause to the query using the AkreditasiSp relation
 *
 * @method LembagaAkreditasiQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method LembagaAkreditasiQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method LembagaAkreditasiQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method LembagaAkreditasiQuery leftJoinRolePengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the RolePengguna relation
 * @method LembagaAkreditasiQuery rightJoinRolePengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RolePengguna relation
 * @method LembagaAkreditasiQuery innerJoinRolePengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the RolePengguna relation
 *
 * @method LembagaAkreditasi findOne(PropelPDO $con = null) Return the first LembagaAkreditasi matching the query
 * @method LembagaAkreditasi findOneOrCreate(PropelPDO $con = null) Return the first LembagaAkreditasi matching the query, or a new LembagaAkreditasi object populated from the query conditions when no match is found
 *
 * @method LembagaAkreditasi findOneByNama(string $nama) Return the first LembagaAkreditasi filtered by the nama column
 * @method LembagaAkreditasi findOneByLaTglMulai(string $la_tgl_mulai) Return the first LembagaAkreditasi filtered by the la_tgl_mulai column
 * @method LembagaAkreditasi findOneByLaKet(string $la_ket) Return the first LembagaAkreditasi filtered by the la_ket column
 * @method LembagaAkreditasi findOneByAlamatJalan(string $alamat_jalan) Return the first LembagaAkreditasi filtered by the alamat_jalan column
 * @method LembagaAkreditasi findOneByRt(string $rt) Return the first LembagaAkreditasi filtered by the rt column
 * @method LembagaAkreditasi findOneByRw(string $rw) Return the first LembagaAkreditasi filtered by the rw column
 * @method LembagaAkreditasi findOneByNamaDusun(string $nama_dusun) Return the first LembagaAkreditasi filtered by the nama_dusun column
 * @method LembagaAkreditasi findOneByDesaKelurahan(string $desa_kelurahan) Return the first LembagaAkreditasi filtered by the desa_kelurahan column
 * @method LembagaAkreditasi findOneByKodeWilayah(string $kode_wilayah) Return the first LembagaAkreditasi filtered by the kode_wilayah column
 * @method LembagaAkreditasi findOneByKodePos(string $kode_pos) Return the first LembagaAkreditasi filtered by the kode_pos column
 * @method LembagaAkreditasi findOneByLintang(string $lintang) Return the first LembagaAkreditasi filtered by the lintang column
 * @method LembagaAkreditasi findOneByBujur(string $bujur) Return the first LembagaAkreditasi filtered by the bujur column
 * @method LembagaAkreditasi findOneByNomorTelepon(string $nomor_telepon) Return the first LembagaAkreditasi filtered by the nomor_telepon column
 * @method LembagaAkreditasi findOneByNomorFax(string $nomor_fax) Return the first LembagaAkreditasi filtered by the nomor_fax column
 * @method LembagaAkreditasi findOneByEmail(string $email) Return the first LembagaAkreditasi filtered by the email column
 * @method LembagaAkreditasi findOneByWebsite(string $website) Return the first LembagaAkreditasi filtered by the website column
 * @method LembagaAkreditasi findOneByCreateDate(string $create_date) Return the first LembagaAkreditasi filtered by the create_date column
 * @method LembagaAkreditasi findOneByLastUpdate(string $last_update) Return the first LembagaAkreditasi filtered by the last_update column
 * @method LembagaAkreditasi findOneByExpiredDate(string $expired_date) Return the first LembagaAkreditasi filtered by the expired_date column
 * @method LembagaAkreditasi findOneByLastSync(string $last_sync) Return the first LembagaAkreditasi filtered by the last_sync column
 *
 * @method array findByLaId(string $la_id) Return LembagaAkreditasi objects filtered by the la_id column
 * @method array findByNama(string $nama) Return LembagaAkreditasi objects filtered by the nama column
 * @method array findByLaTglMulai(string $la_tgl_mulai) Return LembagaAkreditasi objects filtered by the la_tgl_mulai column
 * @method array findByLaKet(string $la_ket) Return LembagaAkreditasi objects filtered by the la_ket column
 * @method array findByAlamatJalan(string $alamat_jalan) Return LembagaAkreditasi objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return LembagaAkreditasi objects filtered by the rt column
 * @method array findByRw(string $rw) Return LembagaAkreditasi objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return LembagaAkreditasi objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return LembagaAkreditasi objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return LembagaAkreditasi objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return LembagaAkreditasi objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return LembagaAkreditasi objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return LembagaAkreditasi objects filtered by the bujur column
 * @method array findByNomorTelepon(string $nomor_telepon) Return LembagaAkreditasi objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return LembagaAkreditasi objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return LembagaAkreditasi objects filtered by the email column
 * @method array findByWebsite(string $website) Return LembagaAkreditasi objects filtered by the website column
 * @method array findByCreateDate(string $create_date) Return LembagaAkreditasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LembagaAkreditasi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return LembagaAkreditasi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return LembagaAkreditasi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembagaAkreditasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLembagaAkreditasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LembagaAkreditasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LembagaAkreditasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LembagaAkreditasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LembagaAkreditasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LembagaAkreditasiQuery) {
            return $criteria;
        }
        $query = new LembagaAkreditasiQuery();
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
     * @return   LembagaAkreditasi|LembagaAkreditasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LembagaAkreditasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LembagaAkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembagaAkreditasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByLaId($key, $con = null)
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
     * @return                 LembagaAkreditasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "la_id", "nama", "la_tgl_mulai", "la_ket", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."lembaga_akreditasi" WHERE "la_id" = :p0';
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
            $obj = new LembagaAkreditasi();
            $obj->hydrate($row);
            LembagaAkreditasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LembagaAkreditasi|LembagaAkreditasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LembagaAkreditasi[]|mixed the list of results, formatted by the current formatter
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $keys, Criteria::IN);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $laId, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaAkreditasiPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the la_tgl_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByLaTglMulai('2011-03-14'); // WHERE la_tgl_mulai = '2011-03-14'
     * $query->filterByLaTglMulai('now'); // WHERE la_tgl_mulai = '2011-03-14'
     * $query->filterByLaTglMulai(array('max' => 'yesterday')); // WHERE la_tgl_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $laTglMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByLaTglMulai($laTglMulai = null, $comparison = null)
    {
        if (is_array($laTglMulai)) {
            $useMinMax = false;
            if (isset($laTglMulai['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LA_TGL_MULAI, $laTglMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($laTglMulai['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LA_TGL_MULAI, $laTglMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::LA_TGL_MULAI, $laTglMulai, $comparison);
    }

    /**
     * Filter the query on the la_ket column
     *
     * Example usage:
     * <code>
     * $query->filterByLaKet('fooValue');   // WHERE la_ket = 'fooValue'
     * $query->filterByLaKet('%fooValue%'); // WHERE la_ket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $laKet The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByLaKet($laKet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($laKet)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $laKet)) {
                $laKet = str_replace('*', '%', $laKet);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::LA_KET, $laKet, $comparison);
    }

    /**
     * Filter the query on the alamat_jalan column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatJalan('fooValue');   // WHERE alamat_jalan = 'fooValue'
     * $query->filterByAlamatJalan('%fooValue%'); // WHERE alamat_jalan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatJalan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByAlamatJalan($alamatJalan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatJalan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatJalan)) {
                $alamatJalan = str_replace('*', '%', $alamatJalan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
    }

    /**
     * Filter the query on the rt column
     *
     * Example usage:
     * <code>
     * $query->filterByRt(1234); // WHERE rt = 1234
     * $query->filterByRt(array(12, 34)); // WHERE rt IN (12, 34)
     * $query->filterByRt(array('min' => 12)); // WHERE rt >= 12
     * $query->filterByRt(array('max' => 12)); // WHERE rt <= 12
     * </code>
     *
     * @param     mixed $rt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::RT, $rt, $comparison);
    }

    /**
     * Filter the query on the rw column
     *
     * Example usage:
     * <code>
     * $query->filterByRw(1234); // WHERE rw = 1234
     * $query->filterByRw(array(12, 34)); // WHERE rw IN (12, 34)
     * $query->filterByRw(array('min' => 12)); // WHERE rw >= 12
     * $query->filterByRw(array('max' => 12)); // WHERE rw <= 12
     * </code>
     *
     * @param     mixed $rw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::RW, $rw, $comparison);
    }

    /**
     * Filter the query on the nama_dusun column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDusun('fooValue');   // WHERE nama_dusun = 'fooValue'
     * $query->filterByNamaDusun('%fooValue%'); // WHERE nama_dusun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDusun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByNamaDusun($namaDusun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDusun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaDusun)) {
                $namaDusun = str_replace('*', '%', $namaDusun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::NAMA_DUSUN, $namaDusun, $comparison);
    }

    /**
     * Filter the query on the desa_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaKelurahan('fooValue');   // WHERE desa_kelurahan = 'fooValue'
     * $query->filterByDesaKelurahan('%fooValue%'); // WHERE desa_kelurahan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaKelurahan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByDesaKelurahan($desaKelurahan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaKelurahan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $desaKelurahan)) {
                $desaKelurahan = str_replace('*', '%', $desaKelurahan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaAkreditasiPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the kode_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePos('fooValue');   // WHERE kode_pos = 'fooValue'
     * $query->filterByKodePos('%fooValue%'); // WHERE kode_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByKodePos($kodePos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodePos)) {
                $kodePos = str_replace('*', '%', $kodePos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::KODE_POS, $kodePos, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang >= 12
     * $query->filterByLintang(array('max' => 12)); // WHERE lintang <= 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur >= 12
     * $query->filterByBujur(array('max' => 12)); // WHERE bujur <= 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the nomor_telepon column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorTelepon('fooValue');   // WHERE nomor_telepon = 'fooValue'
     * $query->filterByNomorTelepon('%fooValue%'); // WHERE nomor_telepon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorTelepon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByNomorTelepon($nomorTelepon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorTelepon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorTelepon)) {
                $nomorTelepon = str_replace('*', '%', $nomorTelepon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
    }

    /**
     * Filter the query on the nomor_fax column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorFax('fooValue');   // WHERE nomor_fax = 'fooValue'
     * $query->filterByNomorFax('%fooValue%'); // WHERE nomor_fax LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorFax The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByNomorFax($nomorFax = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorFax)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorFax)) {
                $nomorFax = str_replace('*', '%', $nomorFax);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::NOMOR_FAX, $nomorFax, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the website column
     *
     * Example usage:
     * <code>
     * $query->filterByWebsite('fooValue');   // WHERE website = 'fooValue'
     * $query->filterByWebsite('%fooValue%'); // WHERE website LIKE '%fooValue%'
     * </code>
     *
     * @param     string $website The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByWebsite($website = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($website)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $website)) {
                $website = str_replace('*', '%', $website);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::WEBSITE, $website, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LembagaAkreditasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaAkreditasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaAkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
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
     * Filter the query by a related AkreditasiProdi object
     *
     * @param   AkreditasiProdi|PropelObjectCollection $akreditasiProdi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaAkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiProdi($akreditasiProdi, $comparison = null)
    {
        if ($akreditasiProdi instanceof AkreditasiProdi) {
            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $akreditasiProdi->getLaId(), $comparison);
        } elseif ($akreditasiProdi instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiProdiQuery()
                ->filterByPrimaryKeys($akreditasiProdi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiProdi() only accepts arguments of type AkreditasiProdi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiProdi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function joinAkreditasiProdi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiProdi');

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
            $this->addJoinObject($join, 'AkreditasiProdi');
        }

        return $this;
    }

    /**
     * Use the AkreditasiProdi relation AkreditasiProdi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiProdiQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiProdiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiProdi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiProdi', '\DataDikdas\Model\AkreditasiProdiQuery');
    }

    /**
     * Filter the query by a related AkreditasiSp object
     *
     * @param   AkreditasiSp|PropelObjectCollection $akreditasiSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaAkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasiSp($akreditasiSp, $comparison = null)
    {
        if ($akreditasiSp instanceof AkreditasiSp) {
            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $akreditasiSp->getLaId(), $comparison);
        } elseif ($akreditasiSp instanceof PropelObjectCollection) {
            return $this
                ->useAkreditasiSpQuery()
                ->filterByPrimaryKeys($akreditasiSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAkreditasiSp() only accepts arguments of type AkreditasiSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AkreditasiSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function joinAkreditasiSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AkreditasiSp');

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
            $this->addJoinObject($join, 'AkreditasiSp');
        }

        return $this;
    }

    /**
     * Use the AkreditasiSp relation AkreditasiSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiSpQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasiSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AkreditasiSp', '\DataDikdas\Model\AkreditasiSpQuery');
    }

    /**
     * Filter the query by a related Pengguna object
     *
     * @param   Pengguna|PropelObjectCollection $pengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaAkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof Pengguna) {
            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $pengguna->getLaId(), $comparison);
        } elseif ($pengguna instanceof PropelObjectCollection) {
            return $this
                ->usePenggunaQuery()
                ->filterByPrimaryKeys($pengguna->getPrimaryKeys())
                ->endUse();
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function joinPengguna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePenggunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pengguna', '\DataDikdas\Model\PenggunaQuery');
    }

    /**
     * Filter the query by a related RolePengguna object
     *
     * @param   RolePengguna|PropelObjectCollection $rolePengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaAkreditasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRolePengguna($rolePengguna, $comparison = null)
    {
        if ($rolePengguna instanceof RolePengguna) {
            return $this
                ->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $rolePengguna->getLaId(), $comparison);
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
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function joinRolePengguna($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useRolePenggunaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRolePengguna($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RolePengguna', '\DataDikdas\Model\RolePenggunaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LembagaAkreditasi $lembagaAkreditasi Object to remove from the list of results
     *
     * @return LembagaAkreditasiQuery The current query, for fluid interface
     */
    public function prune($lembagaAkreditasi = null)
    {
        if ($lembagaAkreditasi) {
            $this->addUsingAlias(LembagaAkreditasiPeer::LA_ID, $lembagaAkreditasi->getLaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
