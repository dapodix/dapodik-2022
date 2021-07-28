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
use DataDikdas\Model\BidangUsaha;
use DataDikdas\Model\Dudi;
use DataDikdas\Model\DudiPeer;
use DataDikdas\Model\DudiQuery;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\TracerLulusan;
use DataDikdas\Model\VldDudi;

/**
 * Base class that represents a query for the 'dudi' table.
 *
 * 
 *
 * @method DudiQuery orderByDudiId($order = Criteria::ASC) Order by the dudi_id column
 * @method DudiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method DudiQuery orderByBidangUsahaId($order = Criteria::ASC) Order by the bidang_usaha_id column
 * @method DudiQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method DudiQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method DudiQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method DudiQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method DudiQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method DudiQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method DudiQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method DudiQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method DudiQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method DudiQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method DudiQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method DudiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method DudiQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method DudiQuery orderByNpwp($order = Criteria::ASC) Order by the npwp column
 * @method DudiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method DudiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method DudiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method DudiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method DudiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method DudiQuery groupByDudiId() Group by the dudi_id column
 * @method DudiQuery groupByNama() Group by the nama column
 * @method DudiQuery groupByBidangUsahaId() Group by the bidang_usaha_id column
 * @method DudiQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method DudiQuery groupByRt() Group by the rt column
 * @method DudiQuery groupByRw() Group by the rw column
 * @method DudiQuery groupByNamaDusun() Group by the nama_dusun column
 * @method DudiQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method DudiQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method DudiQuery groupByKodePos() Group by the kode_pos column
 * @method DudiQuery groupByLintang() Group by the lintang column
 * @method DudiQuery groupByBujur() Group by the bujur column
 * @method DudiQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method DudiQuery groupByNomorFax() Group by the nomor_fax column
 * @method DudiQuery groupByEmail() Group by the email column
 * @method DudiQuery groupByWebsite() Group by the website column
 * @method DudiQuery groupByNpwp() Group by the npwp column
 * @method DudiQuery groupByCreateDate() Group by the create_date column
 * @method DudiQuery groupByLastUpdate() Group by the last_update column
 * @method DudiQuery groupBySoftDelete() Group by the soft_delete column
 * @method DudiQuery groupByLastSync() Group by the last_sync column
 * @method DudiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method DudiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DudiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DudiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DudiQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method DudiQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method DudiQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method DudiQuery leftJoinBidangUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangUsaha relation
 * @method DudiQuery rightJoinBidangUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangUsaha relation
 * @method DudiQuery innerJoinBidangUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangUsaha relation
 *
 * @method DudiQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method DudiQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method DudiQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method DudiQuery leftJoinTracerLulusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TracerLulusan relation
 * @method DudiQuery rightJoinTracerLulusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TracerLulusan relation
 * @method DudiQuery innerJoinTracerLulusan($relationAlias = null) Adds a INNER JOIN clause to the query using the TracerLulusan relation
 *
 * @method DudiQuery leftJoinVldDudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldDudi relation
 * @method DudiQuery rightJoinVldDudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldDudi relation
 * @method DudiQuery innerJoinVldDudi($relationAlias = null) Adds a INNER JOIN clause to the query using the VldDudi relation
 *
 * @method Dudi findOne(PropelPDO $con = null) Return the first Dudi matching the query
 * @method Dudi findOneOrCreate(PropelPDO $con = null) Return the first Dudi matching the query, or a new Dudi object populated from the query conditions when no match is found
 *
 * @method Dudi findOneByNama(string $nama) Return the first Dudi filtered by the nama column
 * @method Dudi findOneByBidangUsahaId(string $bidang_usaha_id) Return the first Dudi filtered by the bidang_usaha_id column
 * @method Dudi findOneByAlamatJalan(string $alamat_jalan) Return the first Dudi filtered by the alamat_jalan column
 * @method Dudi findOneByRt(string $rt) Return the first Dudi filtered by the rt column
 * @method Dudi findOneByRw(string $rw) Return the first Dudi filtered by the rw column
 * @method Dudi findOneByNamaDusun(string $nama_dusun) Return the first Dudi filtered by the nama_dusun column
 * @method Dudi findOneByDesaKelurahan(string $desa_kelurahan) Return the first Dudi filtered by the desa_kelurahan column
 * @method Dudi findOneByKodeWilayah(string $kode_wilayah) Return the first Dudi filtered by the kode_wilayah column
 * @method Dudi findOneByKodePos(string $kode_pos) Return the first Dudi filtered by the kode_pos column
 * @method Dudi findOneByLintang(string $lintang) Return the first Dudi filtered by the lintang column
 * @method Dudi findOneByBujur(string $bujur) Return the first Dudi filtered by the bujur column
 * @method Dudi findOneByNomorTelepon(string $nomor_telepon) Return the first Dudi filtered by the nomor_telepon column
 * @method Dudi findOneByNomorFax(string $nomor_fax) Return the first Dudi filtered by the nomor_fax column
 * @method Dudi findOneByEmail(string $email) Return the first Dudi filtered by the email column
 * @method Dudi findOneByWebsite(string $website) Return the first Dudi filtered by the website column
 * @method Dudi findOneByNpwp(string $npwp) Return the first Dudi filtered by the npwp column
 * @method Dudi findOneByCreateDate(string $create_date) Return the first Dudi filtered by the create_date column
 * @method Dudi findOneByLastUpdate(string $last_update) Return the first Dudi filtered by the last_update column
 * @method Dudi findOneBySoftDelete(string $soft_delete) Return the first Dudi filtered by the soft_delete column
 * @method Dudi findOneByLastSync(string $last_sync) Return the first Dudi filtered by the last_sync column
 * @method Dudi findOneByUpdaterId(string $updater_id) Return the first Dudi filtered by the updater_id column
 *
 * @method array findByDudiId(string $dudi_id) Return Dudi objects filtered by the dudi_id column
 * @method array findByNama(string $nama) Return Dudi objects filtered by the nama column
 * @method array findByBidangUsahaId(string $bidang_usaha_id) Return Dudi objects filtered by the bidang_usaha_id column
 * @method array findByAlamatJalan(string $alamat_jalan) Return Dudi objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return Dudi objects filtered by the rt column
 * @method array findByRw(string $rw) Return Dudi objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return Dudi objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return Dudi objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Dudi objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return Dudi objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return Dudi objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return Dudi objects filtered by the bujur column
 * @method array findByNomorTelepon(string $nomor_telepon) Return Dudi objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return Dudi objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return Dudi objects filtered by the email column
 * @method array findByWebsite(string $website) Return Dudi objects filtered by the website column
 * @method array findByNpwp(string $npwp) Return Dudi objects filtered by the npwp column
 * @method array findByCreateDate(string $create_date) Return Dudi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Dudi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Dudi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Dudi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Dudi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDudiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDudiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Dudi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DudiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DudiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DudiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DudiQuery) {
            return $criteria;
        }
        $query = new DudiQuery();
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
     * @return   Dudi|Dudi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DudiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DudiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Dudi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDudiId($key, $con = null)
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
     * @return                 Dudi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "dudi_id", "nama", "bidang_usaha_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nomor_telepon", "nomor_fax", "email", "website", "npwp", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "dudi" WHERE "dudi_id" = :p0';
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
            $obj = new Dudi();
            $obj->hydrate($row);
            DudiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Dudi|Dudi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Dudi[]|mixed the list of results, formatted by the current formatter
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DudiPeer::DUDI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DudiPeer::DUDI_ID, $keys, Criteria::IN);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::DUDI_ID, $dudiId, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the bidang_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangUsahaId('fooValue');   // WHERE bidang_usaha_id = 'fooValue'
     * $query->filterByBidangUsahaId('%fooValue%'); // WHERE bidang_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bidangUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByBidangUsahaId($bidangUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bidangUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bidangUsahaId)) {
                $bidangUsahaId = str_replace('*', '%', $bidangUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DudiPeer::BIDANG_USAHA_ID, $bidangUsahaId, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(DudiPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(DudiPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::RT, $rt, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(DudiPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(DudiPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::RW, $rw, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::NAMA_DUSUN, $namaDusun, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::KODE_POS, $kodePos, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(DudiPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(DudiPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::LINTANG, $lintang, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(DudiPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(DudiPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::BUJUR, $bujur, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::NOMOR_FAX, $nomorFax, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::EMAIL, $email, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::WEBSITE, $website, $comparison);
    }

    /**
     * Filter the query on the npwp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwp('fooValue');   // WHERE npwp = 'fooValue'
     * $query->filterByNpwp('%fooValue%'); // WHERE npwp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByNpwp($npwp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npwp)) {
                $npwp = str_replace('*', '%', $npwp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DudiPeer::NPWP, $npwp, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(DudiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(DudiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(DudiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(DudiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(DudiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(DudiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(DudiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(DudiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DudiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DudiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(DudiPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DudiPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return DudiQuery The current query, for fluid interface
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
     * Filter the query by a related BidangUsaha object
     *
     * @param   BidangUsaha|PropelObjectCollection $bidangUsaha The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangUsaha($bidangUsaha, $comparison = null)
    {
        if ($bidangUsaha instanceof BidangUsaha) {
            return $this
                ->addUsingAlias(DudiPeer::BIDANG_USAHA_ID, $bidangUsaha->getBidangUsahaId(), $comparison);
        } elseif ($bidangUsaha instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DudiPeer::BIDANG_USAHA_ID, $bidangUsaha->toKeyValue('PrimaryKey', 'BidangUsahaId'), $comparison);
        } else {
            throw new PropelException('filterByBidangUsaha() only accepts arguments of type BidangUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function joinBidangUsaha($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangUsaha');

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
            $this->addJoinObject($join, 'BidangUsaha');
        }

        return $this;
    }

    /**
     * Use the BidangUsaha relation BidangUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangUsahaQuery A secondary query class using the current class as primary query
     */
    public function useBidangUsahaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBidangUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangUsaha', '\DataDikdas\Model\BidangUsahaQuery');
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(DudiPeer::DUDI_ID, $mou->getDudiId(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            return $this
                ->useMouQuery()
                ->filterByPrimaryKeys($mou->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMou() only accepts arguments of type Mou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function joinMou($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mou');

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
            $this->addJoinObject($join, 'Mou');
        }

        return $this;
    }

    /**
     * Use the Mou relation Mou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MouQuery A secondary query class using the current class as primary query
     */
    public function useMouQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mou', '\DataDikdas\Model\MouQuery');
    }

    /**
     * Filter the query by a related TracerLulusan object
     *
     * @param   TracerLulusan|PropelObjectCollection $tracerLulusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTracerLulusan($tracerLulusan, $comparison = null)
    {
        if ($tracerLulusan instanceof TracerLulusan) {
            return $this
                ->addUsingAlias(DudiPeer::DUDI_ID, $tracerLulusan->getDudiId(), $comparison);
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
     * @return DudiQuery The current query, for fluid interface
     */
    public function joinTracerLulusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useTracerLulusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTracerLulusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TracerLulusan', '\DataDikdas\Model\TracerLulusanQuery');
    }

    /**
     * Filter the query by a related VldDudi object
     *
     * @param   VldDudi|PropelObjectCollection $vldDudi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DudiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldDudi($vldDudi, $comparison = null)
    {
        if ($vldDudi instanceof VldDudi) {
            return $this
                ->addUsingAlias(DudiPeer::DUDI_ID, $vldDudi->getDudiId(), $comparison);
        } elseif ($vldDudi instanceof PropelObjectCollection) {
            return $this
                ->useVldDudiQuery()
                ->filterByPrimaryKeys($vldDudi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldDudi() only accepts arguments of type VldDudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldDudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function joinVldDudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldDudi');

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
            $this->addJoinObject($join, 'VldDudi');
        }

        return $this;
    }

    /**
     * Use the VldDudi relation VldDudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldDudiQuery A secondary query class using the current class as primary query
     */
    public function useVldDudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldDudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldDudi', '\DataDikdas\Model\VldDudiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Dudi $dudi Object to remove from the list of results
     *
     * @return DudiQuery The current query, for fluid interface
     */
    public function prune($dudi = null)
    {
        if ($dudi) {
            $this->addUsingAlias(DudiPeer::DUDI_ID, $dudi->getDudiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
