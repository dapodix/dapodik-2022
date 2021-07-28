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
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\VldYayasan;
use DataDikdas\Model\Yayasan;
use DataDikdas\Model\YayasanPeer;
use DataDikdas\Model\YayasanQuery;

/**
 * Base class that represents a query for the 'yayasan' table.
 *
 * 
 *
 * @method YayasanQuery orderByYayasanId($order = Criteria::ASC) Order by the yayasan_id column
 * @method YayasanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method YayasanQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method YayasanQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method YayasanQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method YayasanQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method YayasanQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method YayasanQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method YayasanQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method YayasanQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method YayasanQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method YayasanQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method YayasanQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method YayasanQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method YayasanQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method YayasanQuery orderByNpyp($order = Criteria::ASC) Order by the npyp column
 * @method YayasanQuery orderByNamaPimpinanYayasan($order = Criteria::ASC) Order by the nama_pimpinan_yayasan column
 * @method YayasanQuery orderByNoPendirianYayasan($order = Criteria::ASC) Order by the no_pendirian_yayasan column
 * @method YayasanQuery orderByTanggalPendirianYayasan($order = Criteria::ASC) Order by the tanggal_pendirian_yayasan column
 * @method YayasanQuery orderByNomorPengesahanPnLn($order = Criteria::ASC) Order by the nomor_pengesahan_pn_ln column
 * @method YayasanQuery orderByNomorSkBn($order = Criteria::ASC) Order by the nomor_sk_bn column
 * @method YayasanQuery orderByTanggalSkBn($order = Criteria::ASC) Order by the tanggal_sk_bn column
 * @method YayasanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method YayasanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method YayasanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method YayasanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method YayasanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method YayasanQuery groupByYayasanId() Group by the yayasan_id column
 * @method YayasanQuery groupByNama() Group by the nama column
 * @method YayasanQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method YayasanQuery groupByRt() Group by the rt column
 * @method YayasanQuery groupByRw() Group by the rw column
 * @method YayasanQuery groupByNamaDusun() Group by the nama_dusun column
 * @method YayasanQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method YayasanQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method YayasanQuery groupByKodePos() Group by the kode_pos column
 * @method YayasanQuery groupByLintang() Group by the lintang column
 * @method YayasanQuery groupByBujur() Group by the bujur column
 * @method YayasanQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method YayasanQuery groupByNomorFax() Group by the nomor_fax column
 * @method YayasanQuery groupByEmail() Group by the email column
 * @method YayasanQuery groupByWebsite() Group by the website column
 * @method YayasanQuery groupByNpyp() Group by the npyp column
 * @method YayasanQuery groupByNamaPimpinanYayasan() Group by the nama_pimpinan_yayasan column
 * @method YayasanQuery groupByNoPendirianYayasan() Group by the no_pendirian_yayasan column
 * @method YayasanQuery groupByTanggalPendirianYayasan() Group by the tanggal_pendirian_yayasan column
 * @method YayasanQuery groupByNomorPengesahanPnLn() Group by the nomor_pengesahan_pn_ln column
 * @method YayasanQuery groupByNomorSkBn() Group by the nomor_sk_bn column
 * @method YayasanQuery groupByTanggalSkBn() Group by the tanggal_sk_bn column
 * @method YayasanQuery groupByCreateDate() Group by the create_date column
 * @method YayasanQuery groupByLastUpdate() Group by the last_update column
 * @method YayasanQuery groupBySoftDelete() Group by the soft_delete column
 * @method YayasanQuery groupByLastSync() Group by the last_sync column
 * @method YayasanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method YayasanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method YayasanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method YayasanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method YayasanQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method YayasanQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method YayasanQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method YayasanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method YayasanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method YayasanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method YayasanQuery leftJoinVldYayasan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldYayasan relation
 * @method YayasanQuery rightJoinVldYayasan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldYayasan relation
 * @method YayasanQuery innerJoinVldYayasan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldYayasan relation
 *
 * @method Yayasan findOne(PropelPDO $con = null) Return the first Yayasan matching the query
 * @method Yayasan findOneOrCreate(PropelPDO $con = null) Return the first Yayasan matching the query, or a new Yayasan object populated from the query conditions when no match is found
 *
 * @method Yayasan findOneByNama(string $nama) Return the first Yayasan filtered by the nama column
 * @method Yayasan findOneByAlamatJalan(string $alamat_jalan) Return the first Yayasan filtered by the alamat_jalan column
 * @method Yayasan findOneByRt(string $rt) Return the first Yayasan filtered by the rt column
 * @method Yayasan findOneByRw(string $rw) Return the first Yayasan filtered by the rw column
 * @method Yayasan findOneByNamaDusun(string $nama_dusun) Return the first Yayasan filtered by the nama_dusun column
 * @method Yayasan findOneByDesaKelurahan(string $desa_kelurahan) Return the first Yayasan filtered by the desa_kelurahan column
 * @method Yayasan findOneByKodeWilayah(string $kode_wilayah) Return the first Yayasan filtered by the kode_wilayah column
 * @method Yayasan findOneByKodePos(string $kode_pos) Return the first Yayasan filtered by the kode_pos column
 * @method Yayasan findOneByLintang(string $lintang) Return the first Yayasan filtered by the lintang column
 * @method Yayasan findOneByBujur(string $bujur) Return the first Yayasan filtered by the bujur column
 * @method Yayasan findOneByNomorTelepon(string $nomor_telepon) Return the first Yayasan filtered by the nomor_telepon column
 * @method Yayasan findOneByNomorFax(string $nomor_fax) Return the first Yayasan filtered by the nomor_fax column
 * @method Yayasan findOneByEmail(string $email) Return the first Yayasan filtered by the email column
 * @method Yayasan findOneByWebsite(string $website) Return the first Yayasan filtered by the website column
 * @method Yayasan findOneByNpyp(string $npyp) Return the first Yayasan filtered by the npyp column
 * @method Yayasan findOneByNamaPimpinanYayasan(string $nama_pimpinan_yayasan) Return the first Yayasan filtered by the nama_pimpinan_yayasan column
 * @method Yayasan findOneByNoPendirianYayasan(string $no_pendirian_yayasan) Return the first Yayasan filtered by the no_pendirian_yayasan column
 * @method Yayasan findOneByTanggalPendirianYayasan(string $tanggal_pendirian_yayasan) Return the first Yayasan filtered by the tanggal_pendirian_yayasan column
 * @method Yayasan findOneByNomorPengesahanPnLn(string $nomor_pengesahan_pn_ln) Return the first Yayasan filtered by the nomor_pengesahan_pn_ln column
 * @method Yayasan findOneByNomorSkBn(string $nomor_sk_bn) Return the first Yayasan filtered by the nomor_sk_bn column
 * @method Yayasan findOneByTanggalSkBn(string $tanggal_sk_bn) Return the first Yayasan filtered by the tanggal_sk_bn column
 * @method Yayasan findOneByCreateDate(string $create_date) Return the first Yayasan filtered by the create_date column
 * @method Yayasan findOneByLastUpdate(string $last_update) Return the first Yayasan filtered by the last_update column
 * @method Yayasan findOneBySoftDelete(string $soft_delete) Return the first Yayasan filtered by the soft_delete column
 * @method Yayasan findOneByLastSync(string $last_sync) Return the first Yayasan filtered by the last_sync column
 * @method Yayasan findOneByUpdaterId(string $updater_id) Return the first Yayasan filtered by the updater_id column
 *
 * @method array findByYayasanId(string $yayasan_id) Return Yayasan objects filtered by the yayasan_id column
 * @method array findByNama(string $nama) Return Yayasan objects filtered by the nama column
 * @method array findByAlamatJalan(string $alamat_jalan) Return Yayasan objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return Yayasan objects filtered by the rt column
 * @method array findByRw(string $rw) Return Yayasan objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return Yayasan objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return Yayasan objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Yayasan objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return Yayasan objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return Yayasan objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return Yayasan objects filtered by the bujur column
 * @method array findByNomorTelepon(string $nomor_telepon) Return Yayasan objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return Yayasan objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return Yayasan objects filtered by the email column
 * @method array findByWebsite(string $website) Return Yayasan objects filtered by the website column
 * @method array findByNpyp(string $npyp) Return Yayasan objects filtered by the npyp column
 * @method array findByNamaPimpinanYayasan(string $nama_pimpinan_yayasan) Return Yayasan objects filtered by the nama_pimpinan_yayasan column
 * @method array findByNoPendirianYayasan(string $no_pendirian_yayasan) Return Yayasan objects filtered by the no_pendirian_yayasan column
 * @method array findByTanggalPendirianYayasan(string $tanggal_pendirian_yayasan) Return Yayasan objects filtered by the tanggal_pendirian_yayasan column
 * @method array findByNomorPengesahanPnLn(string $nomor_pengesahan_pn_ln) Return Yayasan objects filtered by the nomor_pengesahan_pn_ln column
 * @method array findByNomorSkBn(string $nomor_sk_bn) Return Yayasan objects filtered by the nomor_sk_bn column
 * @method array findByTanggalSkBn(string $tanggal_sk_bn) Return Yayasan objects filtered by the tanggal_sk_bn column
 * @method array findByCreateDate(string $create_date) Return Yayasan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Yayasan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Yayasan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Yayasan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Yayasan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseYayasanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseYayasanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Yayasan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new YayasanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   YayasanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return YayasanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof YayasanQuery) {
            return $criteria;
        }
        $query = new YayasanQuery();
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
     * @return   Yayasan|Yayasan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = YayasanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(YayasanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Yayasan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByYayasanId($key, $con = null)
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
     * @return                 Yayasan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "yayasan_id", "nama", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "npyp", "nama_pimpinan_yayasan", "no_pendirian_yayasan", "tanggal_pendirian_yayasan", "nomor_pengesahan_pn_ln", "nomor_sk_bn", "tanggal_sk_bn", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "yayasan" WHERE "yayasan_id" = :p0';
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
            $obj = new Yayasan();
            $obj->hydrate($row);
            YayasanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Yayasan|Yayasan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Yayasan[]|mixed the list of results, formatted by the current formatter
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(YayasanPeer::YAYASAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(YayasanPeer::YAYASAN_ID, $keys, Criteria::IN);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::YAYASAN_ID, $yayasanId, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::NAMA, $nama, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(YayasanPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(YayasanPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::RT, $rt, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(YayasanPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(YayasanPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::RW, $rw, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::NAMA_DUSUN, $namaDusun, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::KODE_POS, $kodePos, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(YayasanPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(YayasanPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::LINTANG, $lintang, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(YayasanPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(YayasanPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::BUJUR, $bujur, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::NOMOR_FAX, $nomorFax, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::EMAIL, $email, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the npyp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpyp('fooValue');   // WHERE npyp = 'fooValue'
     * $query->filterByNpyp('%fooValue%'); // WHERE npyp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npyp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByNpyp($npyp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npyp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npyp)) {
                $npyp = str_replace('*', '%', $npyp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YayasanPeer::NPYP, $npyp, $comparison);
    }

    /**
     * Filter the query on the nama_pimpinan_yayasan column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaPimpinanYayasan('fooValue');   // WHERE nama_pimpinan_yayasan = 'fooValue'
     * $query->filterByNamaPimpinanYayasan('%fooValue%'); // WHERE nama_pimpinan_yayasan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaPimpinanYayasan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByNamaPimpinanYayasan($namaPimpinanYayasan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaPimpinanYayasan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaPimpinanYayasan)) {
                $namaPimpinanYayasan = str_replace('*', '%', $namaPimpinanYayasan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YayasanPeer::NAMA_PIMPINAN_YAYASAN, $namaPimpinanYayasan, $comparison);
    }

    /**
     * Filter the query on the no_pendirian_yayasan column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPendirianYayasan('fooValue');   // WHERE no_pendirian_yayasan = 'fooValue'
     * $query->filterByNoPendirianYayasan('%fooValue%'); // WHERE no_pendirian_yayasan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPendirianYayasan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByNoPendirianYayasan($noPendirianYayasan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPendirianYayasan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPendirianYayasan)) {
                $noPendirianYayasan = str_replace('*', '%', $noPendirianYayasan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YayasanPeer::NO_PENDIRIAN_YAYASAN, $noPendirianYayasan, $comparison);
    }

    /**
     * Filter the query on the tanggal_pendirian_yayasan column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalPendirianYayasan('2011-03-14'); // WHERE tanggal_pendirian_yayasan = '2011-03-14'
     * $query->filterByTanggalPendirianYayasan('now'); // WHERE tanggal_pendirian_yayasan = '2011-03-14'
     * $query->filterByTanggalPendirianYayasan(array('max' => 'yesterday')); // WHERE tanggal_pendirian_yayasan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalPendirianYayasan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByTanggalPendirianYayasan($tanggalPendirianYayasan = null, $comparison = null)
    {
        if (is_array($tanggalPendirianYayasan)) {
            $useMinMax = false;
            if (isset($tanggalPendirianYayasan['min'])) {
                $this->addUsingAlias(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN, $tanggalPendirianYayasan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalPendirianYayasan['max'])) {
                $this->addUsingAlias(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN, $tanggalPendirianYayasan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::TANGGAL_PENDIRIAN_YAYASAN, $tanggalPendirianYayasan, $comparison);
    }

    /**
     * Filter the query on the nomor_pengesahan_pn_ln column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorPengesahanPnLn('fooValue');   // WHERE nomor_pengesahan_pn_ln = 'fooValue'
     * $query->filterByNomorPengesahanPnLn('%fooValue%'); // WHERE nomor_pengesahan_pn_ln LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorPengesahanPnLn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByNomorPengesahanPnLn($nomorPengesahanPnLn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorPengesahanPnLn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorPengesahanPnLn)) {
                $nomorPengesahanPnLn = str_replace('*', '%', $nomorPengesahanPnLn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YayasanPeer::NOMOR_PENGESAHAN_PN_LN, $nomorPengesahanPnLn, $comparison);
    }

    /**
     * Filter the query on the nomor_sk_bn column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorSkBn('fooValue');   // WHERE nomor_sk_bn = 'fooValue'
     * $query->filterByNomorSkBn('%fooValue%'); // WHERE nomor_sk_bn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorSkBn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByNomorSkBn($nomorSkBn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorSkBn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorSkBn)) {
                $nomorSkBn = str_replace('*', '%', $nomorSkBn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(YayasanPeer::NOMOR_SK_BN, $nomorSkBn, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk_bn column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSkBn('2011-03-14'); // WHERE tanggal_sk_bn = '2011-03-14'
     * $query->filterByTanggalSkBn('now'); // WHERE tanggal_sk_bn = '2011-03-14'
     * $query->filterByTanggalSkBn(array('max' => 'yesterday')); // WHERE tanggal_sk_bn > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSkBn The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByTanggalSkBn($tanggalSkBn = null, $comparison = null)
    {
        if (is_array($tanggalSkBn)) {
            $useMinMax = false;
            if (isset($tanggalSkBn['min'])) {
                $this->addUsingAlias(YayasanPeer::TANGGAL_SK_BN, $tanggalSkBn['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSkBn['max'])) {
                $this->addUsingAlias(YayasanPeer::TANGGAL_SK_BN, $tanggalSkBn['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::TANGGAL_SK_BN, $tanggalSkBn, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(YayasanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(YayasanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(YayasanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(YayasanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(YayasanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(YayasanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(YayasanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(YayasanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(YayasanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(YayasanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 YayasanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(YayasanPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(YayasanPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return YayasanQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 YayasanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(YayasanPeer::YAYASAN_ID, $sekolah->getYayasanId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            return $this
                ->useSekolahQuery()
                ->filterByPrimaryKeys($sekolah->getPrimaryKeys())
                ->endUse();
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
     * @return YayasanQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related VldYayasan object
     *
     * @param   VldYayasan|PropelObjectCollection $vldYayasan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 YayasanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldYayasan($vldYayasan, $comparison = null)
    {
        if ($vldYayasan instanceof VldYayasan) {
            return $this
                ->addUsingAlias(YayasanPeer::YAYASAN_ID, $vldYayasan->getYayasanId(), $comparison);
        } elseif ($vldYayasan instanceof PropelObjectCollection) {
            return $this
                ->useVldYayasanQuery()
                ->filterByPrimaryKeys($vldYayasan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldYayasan() only accepts arguments of type VldYayasan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldYayasan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function joinVldYayasan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldYayasan');

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
            $this->addJoinObject($join, 'VldYayasan');
        }

        return $this;
    }

    /**
     * Use the VldYayasan relation VldYayasan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldYayasanQuery A secondary query class using the current class as primary query
     */
    public function useVldYayasanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldYayasan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldYayasan', '\DataDikdas\Model\VldYayasanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Yayasan $yayasan Object to remove from the list of results
     *
     * @return YayasanQuery The current query, for fluid interface
     */
    public function prune($yayasan = null)
    {
        if ($yayasan) {
            $this->addUsingAlias(YayasanPeer::YAYASAN_ID, $yayasan->getYayasanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
