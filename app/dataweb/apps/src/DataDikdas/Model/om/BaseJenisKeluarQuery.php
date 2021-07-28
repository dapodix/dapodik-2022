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
use DataDikdas\Model\JenisKeluar;
use DataDikdas\Model\JenisKeluarPeer;
use DataDikdas\Model\JenisKeluarQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\RegistrasiPesertaDidik;

/**
 * Base class that represents a query for the 'ref.jenis_keluar' table.
 *
 * 
 *
 * @method JenisKeluarQuery orderByJenisKeluarId($order = Criteria::ASC) Order by the jenis_keluar_id column
 * @method JenisKeluarQuery orderByKetKeluar($order = Criteria::ASC) Order by the ket_keluar column
 * @method JenisKeluarQuery orderByKeluarPd($order = Criteria::ASC) Order by the keluar_pd column
 * @method JenisKeluarQuery orderByKeluarPtk($order = Criteria::ASC) Order by the keluar_ptk column
 * @method JenisKeluarQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisKeluarQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisKeluarQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisKeluarQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisKeluarQuery groupByJenisKeluarId() Group by the jenis_keluar_id column
 * @method JenisKeluarQuery groupByKetKeluar() Group by the ket_keluar column
 * @method JenisKeluarQuery groupByKeluarPd() Group by the keluar_pd column
 * @method JenisKeluarQuery groupByKeluarPtk() Group by the keluar_ptk column
 * @method JenisKeluarQuery groupByCreateDate() Group by the create_date column
 * @method JenisKeluarQuery groupByLastUpdate() Group by the last_update column
 * @method JenisKeluarQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisKeluarQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisKeluarQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisKeluarQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisKeluarQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisKeluarQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method JenisKeluarQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method JenisKeluarQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method JenisKeluarQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method JenisKeluarQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method JenisKeluarQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method JenisKeluarQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisKeluarQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method JenisKeluarQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method JenisKeluar findOne(PropelPDO $con = null) Return the first JenisKeluar matching the query
 * @method JenisKeluar findOneOrCreate(PropelPDO $con = null) Return the first JenisKeluar matching the query, or a new JenisKeluar object populated from the query conditions when no match is found
 *
 * @method JenisKeluar findOneByKetKeluar(string $ket_keluar) Return the first JenisKeluar filtered by the ket_keluar column
 * @method JenisKeluar findOneByKeluarPd(string $keluar_pd) Return the first JenisKeluar filtered by the keluar_pd column
 * @method JenisKeluar findOneByKeluarPtk(string $keluar_ptk) Return the first JenisKeluar filtered by the keluar_ptk column
 * @method JenisKeluar findOneByCreateDate(string $create_date) Return the first JenisKeluar filtered by the create_date column
 * @method JenisKeluar findOneByLastUpdate(string $last_update) Return the first JenisKeluar filtered by the last_update column
 * @method JenisKeluar findOneByExpiredDate(string $expired_date) Return the first JenisKeluar filtered by the expired_date column
 * @method JenisKeluar findOneByLastSync(string $last_sync) Return the first JenisKeluar filtered by the last_sync column
 *
 * @method array findByJenisKeluarId(string $jenis_keluar_id) Return JenisKeluar objects filtered by the jenis_keluar_id column
 * @method array findByKetKeluar(string $ket_keluar) Return JenisKeluar objects filtered by the ket_keluar column
 * @method array findByKeluarPd(string $keluar_pd) Return JenisKeluar objects filtered by the keluar_pd column
 * @method array findByKeluarPtk(string $keluar_ptk) Return JenisKeluar objects filtered by the keluar_ptk column
 * @method array findByCreateDate(string $create_date) Return JenisKeluar objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisKeluar objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisKeluar objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisKeluar objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisKeluarQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisKeluarQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisKeluar', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisKeluarQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisKeluarQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisKeluarQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisKeluarQuery) {
            return $criteria;
        }
        $query = new JenisKeluarQuery();
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
     * @return   JenisKeluar|JenisKeluar[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisKeluarPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisKeluarPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisKeluar A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisKeluarId($key, $con = null)
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
     * @return                 JenisKeluar A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_keluar_id", "ket_keluar", "keluar_pd", "keluar_ptk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_keluar" WHERE "jenis_keluar_id" = :p0';
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
            $obj = new JenisKeluar();
            $obj->hydrate($row);
            JenisKeluarPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisKeluar|JenisKeluar[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisKeluar[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $keys, Criteria::IN);
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
     * @return JenisKeluarQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $jenisKeluarId, $comparison);
    }

    /**
     * Filter the query on the ket_keluar column
     *
     * Example usage:
     * <code>
     * $query->filterByKetKeluar('fooValue');   // WHERE ket_keluar = 'fooValue'
     * $query->filterByKetKeluar('%fooValue%'); // WHERE ket_keluar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketKeluar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByKetKeluar($ketKeluar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketKeluar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketKeluar)) {
                $ketKeluar = str_replace('*', '%', $ketKeluar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::KET_KELUAR, $ketKeluar, $comparison);
    }

    /**
     * Filter the query on the keluar_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByKeluarPd(1234); // WHERE keluar_pd = 1234
     * $query->filterByKeluarPd(array(12, 34)); // WHERE keluar_pd IN (12, 34)
     * $query->filterByKeluarPd(array('min' => 12)); // WHERE keluar_pd >= 12
     * $query->filterByKeluarPd(array('max' => 12)); // WHERE keluar_pd <= 12
     * </code>
     *
     * @param     mixed $keluarPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByKeluarPd($keluarPd = null, $comparison = null)
    {
        if (is_array($keluarPd)) {
            $useMinMax = false;
            if (isset($keluarPd['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::KELUAR_PD, $keluarPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keluarPd['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::KELUAR_PD, $keluarPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::KELUAR_PD, $keluarPd, $comparison);
    }

    /**
     * Filter the query on the keluar_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByKeluarPtk(1234); // WHERE keluar_ptk = 1234
     * $query->filterByKeluarPtk(array(12, 34)); // WHERE keluar_ptk IN (12, 34)
     * $query->filterByKeluarPtk(array('min' => 12)); // WHERE keluar_ptk >= 12
     * $query->filterByKeluarPtk(array('max' => 12)); // WHERE keluar_ptk <= 12
     * </code>
     *
     * @param     mixed $keluarPtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByKeluarPtk($keluarPtk = null, $comparison = null)
    {
        if (is_array($keluarPtk)) {
            $useMinMax = false;
            if (isset($keluarPtk['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::KELUAR_PTK, $keluarPtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keluarPtk['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::KELUAR_PTK, $keluarPtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::KELUAR_PTK, $keluarPtk, $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisKeluarPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisKeluarPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKeluarPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKeluarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $pengawasTerdaftar->getJenisKeluarId(), $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKeluarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $ptkTerdaftar->getJenisKeluarId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePtkTerdaftarQuery()
                ->filterByPrimaryKeys($ptkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

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
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKeluarQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $registrasiPesertaDidik->getJenisKeluarId(), $comparison);
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
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisKeluar $jenisKeluar Object to remove from the list of results
     *
     * @return JenisKeluarQuery The current query, for fluid interface
     */
    public function prune($jenisKeluar = null)
    {
        if ($jenisKeluar) {
            $this->addUsingAlias(JenisKeluarPeer::JENIS_KELUAR_ID, $jenisKeluar->getJenisKeluarId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
