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
use DataDikdas\Model\Akreditasi;
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiProdiPeer;
use DataDikdas\Model\AkreditasiProdiQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\LembagaAkreditasi;

/**
 * Base class that represents a query for the 'akreditasi_prodi' table.
 *
 * 
 *
 * @method AkreditasiProdiQuery orderByAkredProdiId($order = Criteria::ASC) Order by the akred_prodi_id column
 * @method AkreditasiProdiQuery orderByAkreditasiId($order = Criteria::ASC) Order by the akreditasi_id column
 * @method AkreditasiProdiQuery orderByLaId($order = Criteria::ASC) Order by the la_id column
 * @method AkreditasiProdiQuery orderByJurusanSpId($order = Criteria::ASC) Order by the jurusan_sp_id column
 * @method AkreditasiProdiQuery orderByNoSkAkred($order = Criteria::ASC) Order by the no_sk_akred column
 * @method AkreditasiProdiQuery orderByTglSkAkred($order = Criteria::ASC) Order by the tgl_sk_akred column
 * @method AkreditasiProdiQuery orderByTglAkhirAkred($order = Criteria::ASC) Order by the tgl_akhir_akred column
 * @method AkreditasiProdiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AkreditasiProdiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AkreditasiProdiQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AkreditasiProdiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AkreditasiProdiQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AkreditasiProdiQuery groupByAkredProdiId() Group by the akred_prodi_id column
 * @method AkreditasiProdiQuery groupByAkreditasiId() Group by the akreditasi_id column
 * @method AkreditasiProdiQuery groupByLaId() Group by the la_id column
 * @method AkreditasiProdiQuery groupByJurusanSpId() Group by the jurusan_sp_id column
 * @method AkreditasiProdiQuery groupByNoSkAkred() Group by the no_sk_akred column
 * @method AkreditasiProdiQuery groupByTglSkAkred() Group by the tgl_sk_akred column
 * @method AkreditasiProdiQuery groupByTglAkhirAkred() Group by the tgl_akhir_akred column
 * @method AkreditasiProdiQuery groupByCreateDate() Group by the create_date column
 * @method AkreditasiProdiQuery groupByLastUpdate() Group by the last_update column
 * @method AkreditasiProdiQuery groupBySoftDelete() Group by the soft_delete column
 * @method AkreditasiProdiQuery groupByLastSync() Group by the last_sync column
 * @method AkreditasiProdiQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AkreditasiProdiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AkreditasiProdiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AkreditasiProdiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AkreditasiProdiQuery leftJoinLembagaAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaAkreditasi relation
 * @method AkreditasiProdiQuery rightJoinLembagaAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaAkreditasi relation
 * @method AkreditasiProdiQuery innerJoinLembagaAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaAkreditasi relation
 *
 * @method AkreditasiProdiQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method AkreditasiProdiQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method AkreditasiProdiQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method AkreditasiProdiQuery leftJoinAkreditasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Akreditasi relation
 * @method AkreditasiProdiQuery rightJoinAkreditasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Akreditasi relation
 * @method AkreditasiProdiQuery innerJoinAkreditasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Akreditasi relation
 *
 * @method AkreditasiProdi findOne(PropelPDO $con = null) Return the first AkreditasiProdi matching the query
 * @method AkreditasiProdi findOneOrCreate(PropelPDO $con = null) Return the first AkreditasiProdi matching the query, or a new AkreditasiProdi object populated from the query conditions when no match is found
 *
 * @method AkreditasiProdi findOneByAkreditasiId(string $akreditasi_id) Return the first AkreditasiProdi filtered by the akreditasi_id column
 * @method AkreditasiProdi findOneByLaId(string $la_id) Return the first AkreditasiProdi filtered by the la_id column
 * @method AkreditasiProdi findOneByJurusanSpId(string $jurusan_sp_id) Return the first AkreditasiProdi filtered by the jurusan_sp_id column
 * @method AkreditasiProdi findOneByNoSkAkred(string $no_sk_akred) Return the first AkreditasiProdi filtered by the no_sk_akred column
 * @method AkreditasiProdi findOneByTglSkAkred(string $tgl_sk_akred) Return the first AkreditasiProdi filtered by the tgl_sk_akred column
 * @method AkreditasiProdi findOneByTglAkhirAkred(string $tgl_akhir_akred) Return the first AkreditasiProdi filtered by the tgl_akhir_akred column
 * @method AkreditasiProdi findOneByCreateDate(string $create_date) Return the first AkreditasiProdi filtered by the create_date column
 * @method AkreditasiProdi findOneByLastUpdate(string $last_update) Return the first AkreditasiProdi filtered by the last_update column
 * @method AkreditasiProdi findOneBySoftDelete(string $soft_delete) Return the first AkreditasiProdi filtered by the soft_delete column
 * @method AkreditasiProdi findOneByLastSync(string $last_sync) Return the first AkreditasiProdi filtered by the last_sync column
 * @method AkreditasiProdi findOneByUpdaterId(string $updater_id) Return the first AkreditasiProdi filtered by the updater_id column
 *
 * @method array findByAkredProdiId(string $akred_prodi_id) Return AkreditasiProdi objects filtered by the akred_prodi_id column
 * @method array findByAkreditasiId(string $akreditasi_id) Return AkreditasiProdi objects filtered by the akreditasi_id column
 * @method array findByLaId(string $la_id) Return AkreditasiProdi objects filtered by the la_id column
 * @method array findByJurusanSpId(string $jurusan_sp_id) Return AkreditasiProdi objects filtered by the jurusan_sp_id column
 * @method array findByNoSkAkred(string $no_sk_akred) Return AkreditasiProdi objects filtered by the no_sk_akred column
 * @method array findByTglSkAkred(string $tgl_sk_akred) Return AkreditasiProdi objects filtered by the tgl_sk_akred column
 * @method array findByTglAkhirAkred(string $tgl_akhir_akred) Return AkreditasiProdi objects filtered by the tgl_akhir_akred column
 * @method array findByCreateDate(string $create_date) Return AkreditasiProdi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AkreditasiProdi objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AkreditasiProdi objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AkreditasiProdi objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AkreditasiProdi objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasiProdiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAkreditasiProdiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AkreditasiProdi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AkreditasiProdiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AkreditasiProdiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AkreditasiProdiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AkreditasiProdiQuery) {
            return $criteria;
        }
        $query = new AkreditasiProdiQuery();
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
     * @return   AkreditasiProdi|AkreditasiProdi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AkreditasiProdiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AkreditasiProdi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAkredProdiId($key, $con = null)
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
     * @return                 AkreditasiProdi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "akred_prodi_id", "akreditasi_id", "la_id", "jurusan_sp_id", "no_sk_akred", "tgl_sk_akred", "tgl_akhir_akred", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "akreditasi_prodi" WHERE "akred_prodi_id" = :p0';
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
            $obj = new AkreditasiProdi();
            $obj->hydrate($row);
            AkreditasiProdiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AkreditasiProdi|AkreditasiProdi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AkreditasiProdi[]|mixed the list of results, formatted by the current formatter
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AkreditasiProdiPeer::AKRED_PRODI_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AkreditasiProdiPeer::AKRED_PRODI_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the akred_prodi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAkredProdiId('fooValue');   // WHERE akred_prodi_id = 'fooValue'
     * $query->filterByAkredProdiId('%fooValue%'); // WHERE akred_prodi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $akredProdiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByAkredProdiId($akredProdiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($akredProdiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $akredProdiId)) {
                $akredProdiId = str_replace('*', '%', $akredProdiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::AKRED_PRODI_ID, $akredProdiId, $comparison);
    }

    /**
     * Filter the query on the akreditasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAkreditasiId(1234); // WHERE akreditasi_id = 1234
     * $query->filterByAkreditasiId(array(12, 34)); // WHERE akreditasi_id IN (12, 34)
     * $query->filterByAkreditasiId(array('min' => 12)); // WHERE akreditasi_id >= 12
     * $query->filterByAkreditasiId(array('max' => 12)); // WHERE akreditasi_id <= 12
     * </code>
     *
     * @see       filterByAkreditasi()
     *
     * @param     mixed $akreditasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByAkreditasiId($akreditasiId = null, $comparison = null)
    {
        if (is_array($akreditasiId)) {
            $useMinMax = false;
            if (isset($akreditasiId['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::AKREDITASI_ID, $akreditasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($akreditasiId['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::AKREDITASI_ID, $akreditasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::AKREDITASI_ID, $akreditasiId, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiProdiPeer::LA_ID, $laId, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiProdiPeer::JURUSAN_SP_ID, $jurusanSpId, $comparison);
    }

    /**
     * Filter the query on the no_sk_akred column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSkAkred('fooValue');   // WHERE no_sk_akred = 'fooValue'
     * $query->filterByNoSkAkred('%fooValue%'); // WHERE no_sk_akred LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSkAkred The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByNoSkAkred($noSkAkred = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSkAkred)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSkAkred)) {
                $noSkAkred = str_replace('*', '%', $noSkAkred);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::NO_SK_AKRED, $noSkAkred, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_akred column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkAkred('2011-03-14'); // WHERE tgl_sk_akred = '2011-03-14'
     * $query->filterByTglSkAkred('now'); // WHERE tgl_sk_akred = '2011-03-14'
     * $query->filterByTglSkAkred(array('max' => 'yesterday')); // WHERE tgl_sk_akred > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkAkred The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByTglSkAkred($tglSkAkred = null, $comparison = null)
    {
        if (is_array($tglSkAkred)) {
            $useMinMax = false;
            if (isset($tglSkAkred['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::TGL_SK_AKRED, $tglSkAkred['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkAkred['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::TGL_SK_AKRED, $tglSkAkred['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::TGL_SK_AKRED, $tglSkAkred, $comparison);
    }

    /**
     * Filter the query on the tgl_akhir_akred column
     *
     * Example usage:
     * <code>
     * $query->filterByTglAkhirAkred('2011-03-14'); // WHERE tgl_akhir_akred = '2011-03-14'
     * $query->filterByTglAkhirAkred('now'); // WHERE tgl_akhir_akred = '2011-03-14'
     * $query->filterByTglAkhirAkred(array('max' => 'yesterday')); // WHERE tgl_akhir_akred > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglAkhirAkred The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByTglAkhirAkred($tglAkhirAkred = null, $comparison = null)
    {
        if (is_array($tglAkhirAkred)) {
            $useMinMax = false;
            if (isset($tglAkhirAkred['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::TGL_AKHIR_AKRED, $tglAkhirAkred['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglAkhirAkred['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::TGL_AKHIR_AKRED, $tglAkhirAkred['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::TGL_AKHIR_AKRED, $tglAkhirAkred, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AkreditasiProdiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AkreditasiProdiPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AkreditasiProdiPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related LembagaAkreditasi object
     *
     * @param   LembagaAkreditasi|PropelObjectCollection $lembagaAkreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiProdiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaAkreditasi($lembagaAkreditasi, $comparison = null)
    {
        if ($lembagaAkreditasi instanceof LembagaAkreditasi) {
            return $this
                ->addUsingAlias(AkreditasiProdiPeer::LA_ID, $lembagaAkreditasi->getLaId(), $comparison);
        } elseif ($lembagaAkreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiProdiPeer::LA_ID, $lembagaAkreditasi->toKeyValue('PrimaryKey', 'LaId'), $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function joinLembagaAkreditasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useLembagaAkreditasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaAkreditasi', '\DataDikdas\Model\LembagaAkreditasiQuery');
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiProdiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(AkreditasiProdiPeer::JURUSAN_SP_ID, $jurusanSp->getJurusanSpId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiProdiPeer::JURUSAN_SP_ID, $jurusanSp->toKeyValue('PrimaryKey', 'JurusanSpId'), $comparison);
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
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related Akreditasi object
     *
     * @param   Akreditasi|PropelObjectCollection $akreditasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AkreditasiProdiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAkreditasi($akreditasi, $comparison = null)
    {
        if ($akreditasi instanceof Akreditasi) {
            return $this
                ->addUsingAlias(AkreditasiProdiPeer::AKREDITASI_ID, $akreditasi->getAkreditasiId(), $comparison);
        } elseif ($akreditasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AkreditasiProdiPeer::AKREDITASI_ID, $akreditasi->toKeyValue('PrimaryKey', 'AkreditasiId'), $comparison);
        } else {
            throw new PropelException('filterByAkreditasi() only accepts arguments of type Akreditasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Akreditasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function joinAkreditasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Akreditasi');

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
            $this->addJoinObject($join, 'Akreditasi');
        }

        return $this;
    }

    /**
     * Use the Akreditasi relation Akreditasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AkreditasiQuery A secondary query class using the current class as primary query
     */
    public function useAkreditasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAkreditasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Akreditasi', '\DataDikdas\Model\AkreditasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AkreditasiProdi $akreditasiProdi Object to remove from the list of results
     *
     * @return AkreditasiProdiQuery The current query, for fluid interface
     */
    public function prune($akreditasiProdi = null)
    {
        if ($akreditasiProdi) {
            $this->addUsingAlias(AkreditasiProdiPeer::AKRED_PRODI_ID, $akreditasiProdi->getAkredProdiId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
