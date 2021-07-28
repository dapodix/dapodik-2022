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
use DataDikdas\Model\IzinOperasional;
use DataDikdas\Model\JenisLembaga;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\LembagaNonSekolahPeer;
use DataDikdas\Model\LembagaNonSekolahQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\VldNonsekolah;

/**
 * Base class that represents a query for the 'lembaga_non_sekolah' table.
 *
 * 
 *
 * @method LembagaNonSekolahQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method LembagaNonSekolahQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method LembagaNonSekolahQuery orderBySingkatan($order = Criteria::ASC) Order by the singkatan column
 * @method LembagaNonSekolahQuery orderByJenisLembagaId($order = Criteria::ASC) Order by the jenis_lembaga_id column
 * @method LembagaNonSekolahQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method LembagaNonSekolahQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method LembagaNonSekolahQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method LembagaNonSekolahQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method LembagaNonSekolahQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method LembagaNonSekolahQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method LembagaNonSekolahQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method LembagaNonSekolahQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method LembagaNonSekolahQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method LembagaNonSekolahQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method LembagaNonSekolahQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method LembagaNonSekolahQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method LembagaNonSekolahQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method LembagaNonSekolahQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LembagaNonSekolahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LembagaNonSekolahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method LembagaNonSekolahQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method LembagaNonSekolahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method LembagaNonSekolahQuery groupByLembagaId() Group by the lembaga_id column
 * @method LembagaNonSekolahQuery groupByNama() Group by the nama column
 * @method LembagaNonSekolahQuery groupBySingkatan() Group by the singkatan column
 * @method LembagaNonSekolahQuery groupByJenisLembagaId() Group by the jenis_lembaga_id column
 * @method LembagaNonSekolahQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method LembagaNonSekolahQuery groupByRt() Group by the rt column
 * @method LembagaNonSekolahQuery groupByRw() Group by the rw column
 * @method LembagaNonSekolahQuery groupByNamaDusun() Group by the nama_dusun column
 * @method LembagaNonSekolahQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method LembagaNonSekolahQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method LembagaNonSekolahQuery groupByKodePos() Group by the kode_pos column
 * @method LembagaNonSekolahQuery groupByLintang() Group by the lintang column
 * @method LembagaNonSekolahQuery groupByBujur() Group by the bujur column
 * @method LembagaNonSekolahQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method LembagaNonSekolahQuery groupByNomorFax() Group by the nomor_fax column
 * @method LembagaNonSekolahQuery groupByEmail() Group by the email column
 * @method LembagaNonSekolahQuery groupByWebsite() Group by the website column
 * @method LembagaNonSekolahQuery groupByCreateDate() Group by the create_date column
 * @method LembagaNonSekolahQuery groupByLastUpdate() Group by the last_update column
 * @method LembagaNonSekolahQuery groupBySoftDelete() Group by the soft_delete column
 * @method LembagaNonSekolahQuery groupByLastSync() Group by the last_sync column
 * @method LembagaNonSekolahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method LembagaNonSekolahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LembagaNonSekolahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LembagaNonSekolahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LembagaNonSekolahQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method LembagaNonSekolahQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method LembagaNonSekolahQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method LembagaNonSekolahQuery leftJoinJenisLembaga($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisLembaga relation
 * @method LembagaNonSekolahQuery rightJoinJenisLembaga($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisLembaga relation
 * @method LembagaNonSekolahQuery innerJoinJenisLembaga($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisLembaga relation
 *
 * @method LembagaNonSekolahQuery leftJoinIzinOperasional($relationAlias = null) Adds a LEFT JOIN clause to the query using the IzinOperasional relation
 * @method LembagaNonSekolahQuery rightJoinIzinOperasional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the IzinOperasional relation
 * @method LembagaNonSekolahQuery innerJoinIzinOperasional($relationAlias = null) Adds a INNER JOIN clause to the query using the IzinOperasional relation
 *
 * @method LembagaNonSekolahQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method LembagaNonSekolahQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method LembagaNonSekolahQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method LembagaNonSekolahQuery leftJoinVldNonsekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldNonsekolah relation
 * @method LembagaNonSekolahQuery rightJoinVldNonsekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldNonsekolah relation
 * @method LembagaNonSekolahQuery innerJoinVldNonsekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the VldNonsekolah relation
 *
 * @method LembagaNonSekolah findOne(PropelPDO $con = null) Return the first LembagaNonSekolah matching the query
 * @method LembagaNonSekolah findOneOrCreate(PropelPDO $con = null) Return the first LembagaNonSekolah matching the query, or a new LembagaNonSekolah object populated from the query conditions when no match is found
 *
 * @method LembagaNonSekolah findOneByNama(string $nama) Return the first LembagaNonSekolah filtered by the nama column
 * @method LembagaNonSekolah findOneBySingkatan(string $singkatan) Return the first LembagaNonSekolah filtered by the singkatan column
 * @method LembagaNonSekolah findOneByJenisLembagaId(string $jenis_lembaga_id) Return the first LembagaNonSekolah filtered by the jenis_lembaga_id column
 * @method LembagaNonSekolah findOneByAlamatJalan(string $alamat_jalan) Return the first LembagaNonSekolah filtered by the alamat_jalan column
 * @method LembagaNonSekolah findOneByRt(string $rt) Return the first LembagaNonSekolah filtered by the rt column
 * @method LembagaNonSekolah findOneByRw(string $rw) Return the first LembagaNonSekolah filtered by the rw column
 * @method LembagaNonSekolah findOneByNamaDusun(string $nama_dusun) Return the first LembagaNonSekolah filtered by the nama_dusun column
 * @method LembagaNonSekolah findOneByDesaKelurahan(string $desa_kelurahan) Return the first LembagaNonSekolah filtered by the desa_kelurahan column
 * @method LembagaNonSekolah findOneByKodeWilayah(string $kode_wilayah) Return the first LembagaNonSekolah filtered by the kode_wilayah column
 * @method LembagaNonSekolah findOneByKodePos(string $kode_pos) Return the first LembagaNonSekolah filtered by the kode_pos column
 * @method LembagaNonSekolah findOneByLintang(string $lintang) Return the first LembagaNonSekolah filtered by the lintang column
 * @method LembagaNonSekolah findOneByBujur(string $bujur) Return the first LembagaNonSekolah filtered by the bujur column
 * @method LembagaNonSekolah findOneByNomorTelepon(string $nomor_telepon) Return the first LembagaNonSekolah filtered by the nomor_telepon column
 * @method LembagaNonSekolah findOneByNomorFax(string $nomor_fax) Return the first LembagaNonSekolah filtered by the nomor_fax column
 * @method LembagaNonSekolah findOneByEmail(string $email) Return the first LembagaNonSekolah filtered by the email column
 * @method LembagaNonSekolah findOneByWebsite(string $website) Return the first LembagaNonSekolah filtered by the website column
 * @method LembagaNonSekolah findOneByCreateDate(string $create_date) Return the first LembagaNonSekolah filtered by the create_date column
 * @method LembagaNonSekolah findOneByLastUpdate(string $last_update) Return the first LembagaNonSekolah filtered by the last_update column
 * @method LembagaNonSekolah findOneBySoftDelete(string $soft_delete) Return the first LembagaNonSekolah filtered by the soft_delete column
 * @method LembagaNonSekolah findOneByLastSync(string $last_sync) Return the first LembagaNonSekolah filtered by the last_sync column
 * @method LembagaNonSekolah findOneByUpdaterId(string $updater_id) Return the first LembagaNonSekolah filtered by the updater_id column
 *
 * @method array findByLembagaId(string $lembaga_id) Return LembagaNonSekolah objects filtered by the lembaga_id column
 * @method array findByNama(string $nama) Return LembagaNonSekolah objects filtered by the nama column
 * @method array findBySingkatan(string $singkatan) Return LembagaNonSekolah objects filtered by the singkatan column
 * @method array findByJenisLembagaId(string $jenis_lembaga_id) Return LembagaNonSekolah objects filtered by the jenis_lembaga_id column
 * @method array findByAlamatJalan(string $alamat_jalan) Return LembagaNonSekolah objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return LembagaNonSekolah objects filtered by the rt column
 * @method array findByRw(string $rw) Return LembagaNonSekolah objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return LembagaNonSekolah objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return LembagaNonSekolah objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return LembagaNonSekolah objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return LembagaNonSekolah objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return LembagaNonSekolah objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return LembagaNonSekolah objects filtered by the bujur column
 * @method array findByNomorTelepon(string $nomor_telepon) Return LembagaNonSekolah objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return LembagaNonSekolah objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return LembagaNonSekolah objects filtered by the email column
 * @method array findByWebsite(string $website) Return LembagaNonSekolah objects filtered by the website column
 * @method array findByCreateDate(string $create_date) Return LembagaNonSekolah objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LembagaNonSekolah objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return LembagaNonSekolah objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return LembagaNonSekolah objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return LembagaNonSekolah objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembagaNonSekolahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLembagaNonSekolahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LembagaNonSekolah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LembagaNonSekolahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LembagaNonSekolahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LembagaNonSekolahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LembagaNonSekolahQuery) {
            return $criteria;
        }
        $query = new LembagaNonSekolahQuery();
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
     * @return   LembagaNonSekolah|LembagaNonSekolah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LembagaNonSekolahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LembagaNonSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembagaNonSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByLembagaId($key, $con = null)
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
     * @return                 LembagaNonSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "lembaga_id", "nama", "singkatan", "jenis_lembaga_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "lembaga_non_sekolah" WHERE "lembaga_id" = :p0';
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
            $obj = new LembagaNonSekolah();
            $obj->hydrate($row);
            LembagaNonSekolahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LembagaNonSekolah|LembagaNonSekolah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LembagaNonSekolah[]|mixed the list of results, formatted by the current formatter
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $keys, Criteria::IN);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $lembagaId, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the singkatan column
     *
     * Example usage:
     * <code>
     * $query->filterBySingkatan('fooValue');   // WHERE singkatan = 'fooValue'
     * $query->filterBySingkatan('%fooValue%'); // WHERE singkatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $singkatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterBySingkatan($singkatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($singkatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $singkatan)) {
                $singkatan = str_replace('*', '%', $singkatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::SINGKATAN, $singkatan, $comparison);
    }

    /**
     * Filter the query on the jenis_lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisLembagaId(1234); // WHERE jenis_lembaga_id = 1234
     * $query->filterByJenisLembagaId(array(12, 34)); // WHERE jenis_lembaga_id IN (12, 34)
     * $query->filterByJenisLembagaId(array('min' => 12)); // WHERE jenis_lembaga_id >= 12
     * $query->filterByJenisLembagaId(array('max' => 12)); // WHERE jenis_lembaga_id <= 12
     * </code>
     *
     * @see       filterByJenisLembaga()
     *
     * @param     mixed $jenisLembagaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByJenisLembagaId($jenisLembagaId = null, $comparison = null)
    {
        if (is_array($jenisLembagaId)) {
            $useMinMax = false;
            if (isset($jenisLembagaId['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisLembagaId['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, $jenisLembagaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, $jenisLembagaId, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::RT, $rt, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::RW, $rw, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::NAMA_DUSUN, $namaDusun, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::KODE_POS, $kodePos, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::LINTANG, $lintang, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::BUJUR, $bujur, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::NOMOR_FAX, $nomorFax, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::EMAIL, $email, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::WEBSITE, $website, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LembagaNonSekolahPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembagaNonSekolahPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembagaNonSekolahPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaNonSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return LembagaNonSekolahQuery The current query, for fluid interface
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
     * Filter the query by a related JenisLembaga object
     *
     * @param   JenisLembaga|PropelObjectCollection $jenisLembaga The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaNonSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisLembaga($jenisLembaga, $comparison = null)
    {
        if ($jenisLembaga instanceof JenisLembaga) {
            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, $jenisLembaga->getJenisLembagaId(), $comparison);
        } elseif ($jenisLembaga instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::JENIS_LEMBAGA_ID, $jenisLembaga->toKeyValue('PrimaryKey', 'JenisLembagaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisLembaga() only accepts arguments of type JenisLembaga or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisLembaga relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function joinJenisLembaga($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisLembaga');

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
            $this->addJoinObject($join, 'JenisLembaga');
        }

        return $this;
    }

    /**
     * Use the JenisLembaga relation JenisLembaga object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisLembagaQuery A secondary query class using the current class as primary query
     */
    public function useJenisLembagaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisLembaga($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisLembaga', '\DataDikdas\Model\JenisLembagaQuery');
    }

    /**
     * Filter the query by a related IzinOperasional object
     *
     * @param   IzinOperasional|PropelObjectCollection $izinOperasional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaNonSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByIzinOperasional($izinOperasional, $comparison = null)
    {
        if ($izinOperasional instanceof IzinOperasional) {
            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $izinOperasional->getLembagaId(), $comparison);
        } elseif ($izinOperasional instanceof PropelObjectCollection) {
            return $this
                ->useIzinOperasionalQuery()
                ->filterByPrimaryKeys($izinOperasional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByIzinOperasional() only accepts arguments of type IzinOperasional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the IzinOperasional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function joinIzinOperasional($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('IzinOperasional');

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
            $this->addJoinObject($join, 'IzinOperasional');
        }

        return $this;
    }

    /**
     * Use the IzinOperasional relation IzinOperasional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\IzinOperasionalQuery A secondary query class using the current class as primary query
     */
    public function useIzinOperasionalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinIzinOperasional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'IzinOperasional', '\DataDikdas\Model\IzinOperasionalQuery');
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaNonSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $pengawasTerdaftar->getLembagaId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related VldNonsekolah object
     *
     * @param   VldNonsekolah|PropelObjectCollection $vldNonsekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembagaNonSekolahQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldNonsekolah($vldNonsekolah, $comparison = null)
    {
        if ($vldNonsekolah instanceof VldNonsekolah) {
            return $this
                ->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $vldNonsekolah->getLembagaId(), $comparison);
        } elseif ($vldNonsekolah instanceof PropelObjectCollection) {
            return $this
                ->useVldNonsekolahQuery()
                ->filterByPrimaryKeys($vldNonsekolah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldNonsekolah() only accepts arguments of type VldNonsekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldNonsekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function joinVldNonsekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldNonsekolah');

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
            $this->addJoinObject($join, 'VldNonsekolah');
        }

        return $this;
    }

    /**
     * Use the VldNonsekolah relation VldNonsekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldNonsekolahQuery A secondary query class using the current class as primary query
     */
    public function useVldNonsekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldNonsekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldNonsekolah', '\DataDikdas\Model\VldNonsekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LembagaNonSekolah $lembagaNonSekolah Object to remove from the list of results
     *
     * @return LembagaNonSekolahQuery The current query, for fluid interface
     */
    public function prune($lembagaNonSekolah = null)
    {
        if ($lembagaNonSekolah) {
            $this->addUsingAlias(LembagaNonSekolahPeer::LEMBAGA_ID, $lembagaNonSekolah->getLembagaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
