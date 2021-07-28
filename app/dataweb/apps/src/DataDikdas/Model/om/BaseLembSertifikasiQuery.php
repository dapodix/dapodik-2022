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
use DataDikdas\Model\LembSertifikasiPeer;
use DataDikdas\Model\LembSertifikasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Pengguna;
use DataDikdas\Model\RolePengguna;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\SertifikasiPd;

/**
 * Base class that represents a query for the 'ref.lemb_sertifikasi' table.
 *
 * 
 *
 * @method LembSertifikasiQuery orderByKodeLembSert($order = Criteria::ASC) Order by the kode_lemb_sert column
 * @method LembSertifikasiQuery orderByNmLembSert($order = Criteria::ASC) Order by the nm_lemb_sert column
 * @method LembSertifikasiQuery orderByTmtLembSert($order = Criteria::ASC) Order by the tmt_lemb_sert column
 * @method LembSertifikasiQuery orderByKetLembSert($order = Criteria::ASC) Order by the ket_lemb_sert column
 * @method LembSertifikasiQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method LembSertifikasiQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method LembSertifikasiQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method LembSertifikasiQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method LembSertifikasiQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method LembSertifikasiQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method LembSertifikasiQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method LembSertifikasiQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method LembSertifikasiQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method LembSertifikasiQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method LembSertifikasiQuery orderByNomorTelepon($order = Criteria::ASC) Order by the nomor_telepon column
 * @method LembSertifikasiQuery orderByNomorFax($order = Criteria::ASC) Order by the nomor_fax column
 * @method LembSertifikasiQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method LembSertifikasiQuery orderByWebsite($order = Criteria::ASC) Order by the website column
 * @method LembSertifikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method LembSertifikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method LembSertifikasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method LembSertifikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method LembSertifikasiQuery groupByKodeLembSert() Group by the kode_lemb_sert column
 * @method LembSertifikasiQuery groupByNmLembSert() Group by the nm_lemb_sert column
 * @method LembSertifikasiQuery groupByTmtLembSert() Group by the tmt_lemb_sert column
 * @method LembSertifikasiQuery groupByKetLembSert() Group by the ket_lemb_sert column
 * @method LembSertifikasiQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method LembSertifikasiQuery groupByRt() Group by the rt column
 * @method LembSertifikasiQuery groupByRw() Group by the rw column
 * @method LembSertifikasiQuery groupByNamaDusun() Group by the nama_dusun column
 * @method LembSertifikasiQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method LembSertifikasiQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method LembSertifikasiQuery groupByKodePos() Group by the kode_pos column
 * @method LembSertifikasiQuery groupByLintang() Group by the lintang column
 * @method LembSertifikasiQuery groupByBujur() Group by the bujur column
 * @method LembSertifikasiQuery groupByNama() Group by the nama column
 * @method LembSertifikasiQuery groupByNomorTelepon() Group by the nomor_telepon column
 * @method LembSertifikasiQuery groupByNomorFax() Group by the nomor_fax column
 * @method LembSertifikasiQuery groupByEmail() Group by the email column
 * @method LembSertifikasiQuery groupByWebsite() Group by the website column
 * @method LembSertifikasiQuery groupByCreateDate() Group by the create_date column
 * @method LembSertifikasiQuery groupByLastUpdate() Group by the last_update column
 * @method LembSertifikasiQuery groupByExpiredDate() Group by the expired_date column
 * @method LembSertifikasiQuery groupByLastSync() Group by the last_sync column
 *
 * @method LembSertifikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method LembSertifikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method LembSertifikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method LembSertifikasiQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method LembSertifikasiQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method LembSertifikasiQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method LembSertifikasiQuery leftJoinPengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pengguna relation
 * @method LembSertifikasiQuery rightJoinPengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pengguna relation
 * @method LembSertifikasiQuery innerJoinPengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the Pengguna relation
 *
 * @method LembSertifikasiQuery leftJoinRolePengguna($relationAlias = null) Adds a LEFT JOIN clause to the query using the RolePengguna relation
 * @method LembSertifikasiQuery rightJoinRolePengguna($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RolePengguna relation
 * @method LembSertifikasiQuery innerJoinRolePengguna($relationAlias = null) Adds a INNER JOIN clause to the query using the RolePengguna relation
 *
 * @method LembSertifikasiQuery leftJoinRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwySertifikasi relation
 * @method LembSertifikasiQuery rightJoinRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwySertifikasi relation
 * @method LembSertifikasiQuery innerJoinRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the RwySertifikasi relation
 *
 * @method LembSertifikasiQuery leftJoinSertifikasiPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the SertifikasiPd relation
 * @method LembSertifikasiQuery rightJoinSertifikasiPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SertifikasiPd relation
 * @method LembSertifikasiQuery innerJoinSertifikasiPd($relationAlias = null) Adds a INNER JOIN clause to the query using the SertifikasiPd relation
 *
 * @method LembSertifikasi findOne(PropelPDO $con = null) Return the first LembSertifikasi matching the query
 * @method LembSertifikasi findOneOrCreate(PropelPDO $con = null) Return the first LembSertifikasi matching the query, or a new LembSertifikasi object populated from the query conditions when no match is found
 *
 * @method LembSertifikasi findOneByNmLembSert(string $nm_lemb_sert) Return the first LembSertifikasi filtered by the nm_lemb_sert column
 * @method LembSertifikasi findOneByTmtLembSert(string $tmt_lemb_sert) Return the first LembSertifikasi filtered by the tmt_lemb_sert column
 * @method LembSertifikasi findOneByKetLembSert(string $ket_lemb_sert) Return the first LembSertifikasi filtered by the ket_lemb_sert column
 * @method LembSertifikasi findOneByAlamatJalan(string $alamat_jalan) Return the first LembSertifikasi filtered by the alamat_jalan column
 * @method LembSertifikasi findOneByRt(string $rt) Return the first LembSertifikasi filtered by the rt column
 * @method LembSertifikasi findOneByRw(string $rw) Return the first LembSertifikasi filtered by the rw column
 * @method LembSertifikasi findOneByNamaDusun(string $nama_dusun) Return the first LembSertifikasi filtered by the nama_dusun column
 * @method LembSertifikasi findOneByDesaKelurahan(string $desa_kelurahan) Return the first LembSertifikasi filtered by the desa_kelurahan column
 * @method LembSertifikasi findOneByKodeWilayah(string $kode_wilayah) Return the first LembSertifikasi filtered by the kode_wilayah column
 * @method LembSertifikasi findOneByKodePos(string $kode_pos) Return the first LembSertifikasi filtered by the kode_pos column
 * @method LembSertifikasi findOneByLintang(string $lintang) Return the first LembSertifikasi filtered by the lintang column
 * @method LembSertifikasi findOneByBujur(string $bujur) Return the first LembSertifikasi filtered by the bujur column
 * @method LembSertifikasi findOneByNama(string $nama) Return the first LembSertifikasi filtered by the nama column
 * @method LembSertifikasi findOneByNomorTelepon(string $nomor_telepon) Return the first LembSertifikasi filtered by the nomor_telepon column
 * @method LembSertifikasi findOneByNomorFax(string $nomor_fax) Return the first LembSertifikasi filtered by the nomor_fax column
 * @method LembSertifikasi findOneByEmail(string $email) Return the first LembSertifikasi filtered by the email column
 * @method LembSertifikasi findOneByWebsite(string $website) Return the first LembSertifikasi filtered by the website column
 * @method LembSertifikasi findOneByCreateDate(string $create_date) Return the first LembSertifikasi filtered by the create_date column
 * @method LembSertifikasi findOneByLastUpdate(string $last_update) Return the first LembSertifikasi filtered by the last_update column
 * @method LembSertifikasi findOneByExpiredDate(string $expired_date) Return the first LembSertifikasi filtered by the expired_date column
 * @method LembSertifikasi findOneByLastSync(string $last_sync) Return the first LembSertifikasi filtered by the last_sync column
 *
 * @method array findByKodeLembSert(string $kode_lemb_sert) Return LembSertifikasi objects filtered by the kode_lemb_sert column
 * @method array findByNmLembSert(string $nm_lemb_sert) Return LembSertifikasi objects filtered by the nm_lemb_sert column
 * @method array findByTmtLembSert(string $tmt_lemb_sert) Return LembSertifikasi objects filtered by the tmt_lemb_sert column
 * @method array findByKetLembSert(string $ket_lemb_sert) Return LembSertifikasi objects filtered by the ket_lemb_sert column
 * @method array findByAlamatJalan(string $alamat_jalan) Return LembSertifikasi objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return LembSertifikasi objects filtered by the rt column
 * @method array findByRw(string $rw) Return LembSertifikasi objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return LembSertifikasi objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return LembSertifikasi objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return LembSertifikasi objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return LembSertifikasi objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return LembSertifikasi objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return LembSertifikasi objects filtered by the bujur column
 * @method array findByNama(string $nama) Return LembSertifikasi objects filtered by the nama column
 * @method array findByNomorTelepon(string $nomor_telepon) Return LembSertifikasi objects filtered by the nomor_telepon column
 * @method array findByNomorFax(string $nomor_fax) Return LembSertifikasi objects filtered by the nomor_fax column
 * @method array findByEmail(string $email) Return LembSertifikasi objects filtered by the email column
 * @method array findByWebsite(string $website) Return LembSertifikasi objects filtered by the website column
 * @method array findByCreateDate(string $create_date) Return LembSertifikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return LembSertifikasi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return LembSertifikasi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return LembSertifikasi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseLembSertifikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseLembSertifikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\LembSertifikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new LembSertifikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   LembSertifikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return LembSertifikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof LembSertifikasiQuery) {
            return $criteria;
        }
        $query = new LembSertifikasiQuery();
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
     * @return   LembSertifikasi|LembSertifikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = LembSertifikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(LembSertifikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 LembSertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKodeLembSert($key, $con = null)
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
     * @return                 LembSertifikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kode_lemb_sert", "nm_lemb_sert", "tmt_lemb_sert", "ket_lemb_sert", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "nama", "nomor_telepon", "nomor_fax", "email", "website", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."lemb_sertifikasi" WHERE "kode_lemb_sert" = :p0';
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
            $obj = new LembSertifikasi();
            $obj->hydrate($row);
            LembSertifikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return LembSertifikasi|LembSertifikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|LembSertifikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $keys, Criteria::IN);
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
     * @param     mixed $kodeLembSert The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByKodeLembSert($kodeLembSert = null, $comparison = null)
    {
        if (is_array($kodeLembSert)) {
            $useMinMax = false;
            if (isset($kodeLembSert['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kodeLembSert['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $kodeLembSert, $comparison);
    }

    /**
     * Filter the query on the nm_lemb_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByNmLembSert('fooValue');   // WHERE nm_lemb_sert = 'fooValue'
     * $query->filterByNmLembSert('%fooValue%'); // WHERE nm_lemb_sert LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmLembSert The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByNmLembSert($nmLembSert = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmLembSert)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmLembSert)) {
                $nmLembSert = str_replace('*', '%', $nmLembSert);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::NM_LEMB_SERT, $nmLembSert, $comparison);
    }

    /**
     * Filter the query on the tmt_lemb_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtLembSert('2011-03-14'); // WHERE tmt_lemb_sert = '2011-03-14'
     * $query->filterByTmtLembSert('now'); // WHERE tmt_lemb_sert = '2011-03-14'
     * $query->filterByTmtLembSert(array('max' => 'yesterday')); // WHERE tmt_lemb_sert > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtLembSert The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByTmtLembSert($tmtLembSert = null, $comparison = null)
    {
        if (is_array($tmtLembSert)) {
            $useMinMax = false;
            if (isset($tmtLembSert['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::TMT_LEMB_SERT, $tmtLembSert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtLembSert['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::TMT_LEMB_SERT, $tmtLembSert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::TMT_LEMB_SERT, $tmtLembSert, $comparison);
    }

    /**
     * Filter the query on the ket_lemb_sert column
     *
     * Example usage:
     * <code>
     * $query->filterByKetLembSert('fooValue');   // WHERE ket_lemb_sert = 'fooValue'
     * $query->filterByKetLembSert('%fooValue%'); // WHERE ket_lemb_sert LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketLembSert The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByKetLembSert($ketLembSert = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketLembSert)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketLembSert)) {
                $ketLembSert = str_replace('*', '%', $ketLembSert);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::KET_LEMB_SERT, $ketLembSert, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::RT, $rt, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::RW, $rw, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::NAMA_DUSUN, $namaDusun, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::KODE_POS, $kodePos, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::LINTANG, $lintang, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::BUJUR, $bujur, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::NAMA, $nama, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::NOMOR_TELEPON, $nomorTelepon, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::NOMOR_FAX, $nomorFax, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::EMAIL, $email, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(LembSertifikasiPeer::WEBSITE, $website, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(LembSertifikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(LembSertifikasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related Pengguna object
     *
     * @param   Pengguna|PropelObjectCollection $pengguna  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengguna($pengguna, $comparison = null)
    {
        if ($pengguna instanceof Pengguna) {
            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $pengguna->getKodeLembSert(), $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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
     * @return                 LembSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRolePengguna($rolePengguna, $comparison = null)
    {
        if ($rolePengguna instanceof RolePengguna) {
            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $rolePengguna->getKodeLembSert(), $comparison);
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
     * @return LembSertifikasiQuery The current query, for fluid interface
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
     * Filter the query by a related RwySertifikasi object
     *
     * @param   RwySertifikasi|PropelObjectCollection $rwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwySertifikasi($rwySertifikasi, $comparison = null)
    {
        if ($rwySertifikasi instanceof RwySertifikasi) {
            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $rwySertifikasi->getKodeLembSert(), $comparison);
        } elseif ($rwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useRwySertifikasiQuery()
                ->filterByPrimaryKeys($rwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwySertifikasi() only accepts arguments of type RwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function joinRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwySertifikasi');

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
            $this->addJoinObject($join, 'RwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the RwySertifikasi relation RwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwySertifikasi', '\DataDikdas\Model\RwySertifikasiQuery');
    }

    /**
     * Filter the query by a related SertifikasiPd object
     *
     * @param   SertifikasiPd|PropelObjectCollection $sertifikasiPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 LembSertifikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySertifikasiPd($sertifikasiPd, $comparison = null)
    {
        if ($sertifikasiPd instanceof SertifikasiPd) {
            return $this
                ->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $sertifikasiPd->getKodeLembSert(), $comparison);
        } elseif ($sertifikasiPd instanceof PropelObjectCollection) {
            return $this
                ->useSertifikasiPdQuery()
                ->filterByPrimaryKeys($sertifikasiPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySertifikasiPd() only accepts arguments of type SertifikasiPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SertifikasiPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function joinSertifikasiPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SertifikasiPd');

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
            $this->addJoinObject($join, 'SertifikasiPd');
        }

        return $this;
    }

    /**
     * Use the SertifikasiPd relation SertifikasiPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SertifikasiPdQuery A secondary query class using the current class as primary query
     */
    public function useSertifikasiPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSertifikasiPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SertifikasiPd', '\DataDikdas\Model\SertifikasiPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   LembSertifikasi $lembSertifikasi Object to remove from the list of results
     *
     * @return LembSertifikasiQuery The current query, for fluid interface
     */
    public function prune($lembSertifikasi = null)
    {
        if ($lembSertifikasi) {
            $this->addUsingAlias(LembSertifikasiPeer::KODE_LEMB_SERT, $lembSertifikasi->getKodeLembSert(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
