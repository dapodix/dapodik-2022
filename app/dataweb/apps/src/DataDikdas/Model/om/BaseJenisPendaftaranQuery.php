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
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\JenisPendaftaranPeer;
use DataDikdas\Model\JenisPendaftaranQuery;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\RegistrasiPesertaDidik;

/**
 * Base class that represents a query for the 'ref.jenis_pendaftaran' table.
 *
 * 
 *
 * @method JenisPendaftaranQuery orderByJenisPendaftaranId($order = Criteria::ASC) Order by the jenis_pendaftaran_id column
 * @method JenisPendaftaranQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisPendaftaranQuery orderByDaftarSekolah($order = Criteria::ASC) Order by the daftar_sekolah column
 * @method JenisPendaftaranQuery orderByDaftarRombel($order = Criteria::ASC) Order by the daftar_rombel column
 * @method JenisPendaftaranQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisPendaftaranQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisPendaftaranQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisPendaftaranQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisPendaftaranQuery groupByJenisPendaftaranId() Group by the jenis_pendaftaran_id column
 * @method JenisPendaftaranQuery groupByNama() Group by the nama column
 * @method JenisPendaftaranQuery groupByDaftarSekolah() Group by the daftar_sekolah column
 * @method JenisPendaftaranQuery groupByDaftarRombel() Group by the daftar_rombel column
 * @method JenisPendaftaranQuery groupByCreateDate() Group by the create_date column
 * @method JenisPendaftaranQuery groupByLastUpdate() Group by the last_update column
 * @method JenisPendaftaranQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisPendaftaranQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisPendaftaranQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisPendaftaranQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisPendaftaranQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisPendaftaranQuery leftJoinAnggotaRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaRombel relation
 * @method JenisPendaftaranQuery rightJoinAnggotaRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaRombel relation
 * @method JenisPendaftaranQuery innerJoinAnggotaRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaRombel relation
 *
 * @method JenisPendaftaranQuery leftJoinPesertaDidikBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikBaru relation
 * @method JenisPendaftaranQuery rightJoinPesertaDidikBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikBaru relation
 * @method JenisPendaftaranQuery innerJoinPesertaDidikBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikBaru relation
 *
 * @method JenisPendaftaranQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisPendaftaranQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisPendaftaranQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method JenisPendaftaran findOne(PropelPDO $con = null) Return the first JenisPendaftaran matching the query
 * @method JenisPendaftaran findOneOrCreate(PropelPDO $con = null) Return the first JenisPendaftaran matching the query, or a new JenisPendaftaran object populated from the query conditions when no match is found
 *
 * @method JenisPendaftaran findOneByNama(string $nama) Return the first JenisPendaftaran filtered by the nama column
 * @method JenisPendaftaran findOneByDaftarSekolah(string $daftar_sekolah) Return the first JenisPendaftaran filtered by the daftar_sekolah column
 * @method JenisPendaftaran findOneByDaftarRombel(string $daftar_rombel) Return the first JenisPendaftaran filtered by the daftar_rombel column
 * @method JenisPendaftaran findOneByCreateDate(string $create_date) Return the first JenisPendaftaran filtered by the create_date column
 * @method JenisPendaftaran findOneByLastUpdate(string $last_update) Return the first JenisPendaftaran filtered by the last_update column
 * @method JenisPendaftaran findOneByExpiredDate(string $expired_date) Return the first JenisPendaftaran filtered by the expired_date column
 * @method JenisPendaftaran findOneByLastSync(string $last_sync) Return the first JenisPendaftaran filtered by the last_sync column
 *
 * @method array findByJenisPendaftaranId(string $jenis_pendaftaran_id) Return JenisPendaftaran objects filtered by the jenis_pendaftaran_id column
 * @method array findByNama(string $nama) Return JenisPendaftaran objects filtered by the nama column
 * @method array findByDaftarSekolah(string $daftar_sekolah) Return JenisPendaftaran objects filtered by the daftar_sekolah column
 * @method array findByDaftarRombel(string $daftar_rombel) Return JenisPendaftaran objects filtered by the daftar_rombel column
 * @method array findByCreateDate(string $create_date) Return JenisPendaftaran objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisPendaftaran objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisPendaftaran objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisPendaftaran objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPendaftaranQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisPendaftaranQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisPendaftaran', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisPendaftaranQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisPendaftaranQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisPendaftaranQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisPendaftaranQuery) {
            return $criteria;
        }
        $query = new JenisPendaftaranQuery();
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
     * @return   JenisPendaftaran|JenisPendaftaran[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisPendaftaranPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisPendaftaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisPendaftaran A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisPendaftaranId($key, $con = null)
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
     * @return                 JenisPendaftaran A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_pendaftaran_id", "nama", "daftar_sekolah", "daftar_rombel", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_pendaftaran" WHERE "jenis_pendaftaran_id" = :p0';
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
            $obj = new JenisPendaftaran();
            $obj->hydrate($row);
            JenisPendaftaranPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisPendaftaran|JenisPendaftaran[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisPendaftaran[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $keys, Criteria::IN);
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
     * @param     mixed $jenisPendaftaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByJenisPendaftaranId($jenisPendaftaranId = null, $comparison = null)
    {
        if (is_array($jenisPendaftaranId)) {
            $useMinMax = false;
            if (isset($jenisPendaftaranId['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPendaftaranId['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId, $comparison);
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisPendaftaranPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the daftar_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByDaftarSekolah(1234); // WHERE daftar_sekolah = 1234
     * $query->filterByDaftarSekolah(array(12, 34)); // WHERE daftar_sekolah IN (12, 34)
     * $query->filterByDaftarSekolah(array('min' => 12)); // WHERE daftar_sekolah >= 12
     * $query->filterByDaftarSekolah(array('max' => 12)); // WHERE daftar_sekolah <= 12
     * </code>
     *
     * @param     mixed $daftarSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByDaftarSekolah($daftarSekolah = null, $comparison = null)
    {
        if (is_array($daftarSekolah)) {
            $useMinMax = false;
            if (isset($daftarSekolah['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_SEKOLAH, $daftarSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($daftarSekolah['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_SEKOLAH, $daftarSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_SEKOLAH, $daftarSekolah, $comparison);
    }

    /**
     * Filter the query on the daftar_rombel column
     *
     * Example usage:
     * <code>
     * $query->filterByDaftarRombel(1234); // WHERE daftar_rombel = 1234
     * $query->filterByDaftarRombel(array(12, 34)); // WHERE daftar_rombel IN (12, 34)
     * $query->filterByDaftarRombel(array('min' => 12)); // WHERE daftar_rombel >= 12
     * $query->filterByDaftarRombel(array('max' => 12)); // WHERE daftar_rombel <= 12
     * </code>
     *
     * @param     mixed $daftarRombel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByDaftarRombel($daftarRombel = null, $comparison = null)
    {
        if (is_array($daftarRombel)) {
            $useMinMax = false;
            if (isset($daftarRombel['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_ROMBEL, $daftarRombel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($daftarRombel['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_ROMBEL, $daftarRombel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::DAFTAR_ROMBEL, $daftarRombel, $comparison);
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisPendaftaranPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPendaftaranPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related AnggotaRombel object
     *
     * @param   AnggotaRombel|PropelObjectCollection $anggotaRombel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPendaftaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaRombel($anggotaRombel, $comparison = null)
    {
        if ($anggotaRombel instanceof AnggotaRombel) {
            return $this
                ->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $anggotaRombel->getJenisPendaftaranId(), $comparison);
        } elseif ($anggotaRombel instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaRombelQuery()
                ->filterByPrimaryKeys($anggotaRombel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaRombel() only accepts arguments of type AnggotaRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function joinAnggotaRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaRombel');

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
            $this->addJoinObject($join, 'AnggotaRombel');
        }

        return $this;
    }

    /**
     * Use the AnggotaRombel relation AnggotaRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaRombelQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaRombel', '\DataDikdas\Model\AnggotaRombelQuery');
    }

    /**
     * Filter the query by a related PesertaDidikBaru object
     *
     * @param   PesertaDidikBaru|PropelObjectCollection $pesertaDidikBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPendaftaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikBaru($pesertaDidikBaru, $comparison = null)
    {
        if ($pesertaDidikBaru instanceof PesertaDidikBaru) {
            return $this
                ->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $pesertaDidikBaru->getJenisPendaftaranId(), $comparison);
        } elseif ($pesertaDidikBaru instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikBaruQuery()
                ->filterByPrimaryKeys($pesertaDidikBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikBaru() only accepts arguments of type PesertaDidikBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function joinPesertaDidikBaru($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikBaru');

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
            $this->addJoinObject($join, 'PesertaDidikBaru');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikBaru relation PesertaDidikBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikBaruQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikBaruQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikBaru', '\DataDikdas\Model\PesertaDidikBaruQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPendaftaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $registrasiPesertaDidik->getJenisPendaftaranId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useRegistrasiPesertaDidikQuery()
                ->filterByPrimaryKeys($registrasiPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisPendaftaran $jenisPendaftaran Object to remove from the list of results
     *
     * @return JenisPendaftaranQuery The current query, for fluid interface
     */
    public function prune($jenisPendaftaran = null)
    {
        if ($jenisPendaftaran) {
            $this->addUsingAlias(JenisPendaftaranPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->getJenisPendaftaranId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
