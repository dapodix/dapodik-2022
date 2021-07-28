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
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\JenisPtkPeer;
use DataDikdas\Model\JenisPtkQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwyKerja;

/**
 * Base class that represents a query for the 'ref.jenis_ptk' table.
 *
 * 
 *
 * @method JenisPtkQuery orderByJenisPtkId($order = Criteria::ASC) Order by the jenis_ptk_id column
 * @method JenisPtkQuery orderByJenisPtk($order = Criteria::ASC) Order by the jenis_ptk column
 * @method JenisPtkQuery orderByGuruKelas($order = Criteria::ASC) Order by the guru_kelas column
 * @method JenisPtkQuery orderByGuruMatpel($order = Criteria::ASC) Order by the guru_matpel column
 * @method JenisPtkQuery orderByGuruBk($order = Criteria::ASC) Order by the guru_bk column
 * @method JenisPtkQuery orderByGuruInklusi($order = Criteria::ASC) Order by the guru_inklusi column
 * @method JenisPtkQuery orderByGuruPengganti($order = Criteria::ASC) Order by the guru_pengganti column
 * @method JenisPtkQuery orderByPengawasSatdik($order = Criteria::ASC) Order by the pengawas_satdik column
 * @method JenisPtkQuery orderByPengawasPlb($order = Criteria::ASC) Order by the pengawas_plb column
 * @method JenisPtkQuery orderByPengawasMatpel($order = Criteria::ASC) Order by the pengawas_matpel column
 * @method JenisPtkQuery orderByPengawasBidang($order = Criteria::ASC) Order by the pengawas_bidang column
 * @method JenisPtkQuery orderByTas($order = Criteria::ASC) Order by the tas column
 * @method JenisPtkQuery orderByTendikLainnya($order = Criteria::ASC) Order by the tendik_lainnya column
 * @method JenisPtkQuery orderByFormal($order = Criteria::ASC) Order by the formal column
 * @method JenisPtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisPtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisPtkQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisPtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisPtkQuery groupByJenisPtkId() Group by the jenis_ptk_id column
 * @method JenisPtkQuery groupByJenisPtk() Group by the jenis_ptk column
 * @method JenisPtkQuery groupByGuruKelas() Group by the guru_kelas column
 * @method JenisPtkQuery groupByGuruMatpel() Group by the guru_matpel column
 * @method JenisPtkQuery groupByGuruBk() Group by the guru_bk column
 * @method JenisPtkQuery groupByGuruInklusi() Group by the guru_inklusi column
 * @method JenisPtkQuery groupByGuruPengganti() Group by the guru_pengganti column
 * @method JenisPtkQuery groupByPengawasSatdik() Group by the pengawas_satdik column
 * @method JenisPtkQuery groupByPengawasPlb() Group by the pengawas_plb column
 * @method JenisPtkQuery groupByPengawasMatpel() Group by the pengawas_matpel column
 * @method JenisPtkQuery groupByPengawasBidang() Group by the pengawas_bidang column
 * @method JenisPtkQuery groupByTas() Group by the tas column
 * @method JenisPtkQuery groupByTendikLainnya() Group by the tendik_lainnya column
 * @method JenisPtkQuery groupByFormal() Group by the formal column
 * @method JenisPtkQuery groupByCreateDate() Group by the create_date column
 * @method JenisPtkQuery groupByLastUpdate() Group by the last_update column
 * @method JenisPtkQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisPtkQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisPtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisPtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisPtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisPtkQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method JenisPtkQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method JenisPtkQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method JenisPtkQuery leftJoinRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKerja relation
 * @method JenisPtkQuery rightJoinRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKerja relation
 * @method JenisPtkQuery innerJoinRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKerja relation
 *
 * @method JenisPtk findOne(PropelPDO $con = null) Return the first JenisPtk matching the query
 * @method JenisPtk findOneOrCreate(PropelPDO $con = null) Return the first JenisPtk matching the query, or a new JenisPtk object populated from the query conditions when no match is found
 *
 * @method JenisPtk findOneByJenisPtk(string $jenis_ptk) Return the first JenisPtk filtered by the jenis_ptk column
 * @method JenisPtk findOneByGuruKelas(string $guru_kelas) Return the first JenisPtk filtered by the guru_kelas column
 * @method JenisPtk findOneByGuruMatpel(string $guru_matpel) Return the first JenisPtk filtered by the guru_matpel column
 * @method JenisPtk findOneByGuruBk(string $guru_bk) Return the first JenisPtk filtered by the guru_bk column
 * @method JenisPtk findOneByGuruInklusi(string $guru_inklusi) Return the first JenisPtk filtered by the guru_inklusi column
 * @method JenisPtk findOneByGuruPengganti(string $guru_pengganti) Return the first JenisPtk filtered by the guru_pengganti column
 * @method JenisPtk findOneByPengawasSatdik(string $pengawas_satdik) Return the first JenisPtk filtered by the pengawas_satdik column
 * @method JenisPtk findOneByPengawasPlb(string $pengawas_plb) Return the first JenisPtk filtered by the pengawas_plb column
 * @method JenisPtk findOneByPengawasMatpel(string $pengawas_matpel) Return the first JenisPtk filtered by the pengawas_matpel column
 * @method JenisPtk findOneByPengawasBidang(string $pengawas_bidang) Return the first JenisPtk filtered by the pengawas_bidang column
 * @method JenisPtk findOneByTas(string $tas) Return the first JenisPtk filtered by the tas column
 * @method JenisPtk findOneByTendikLainnya(string $tendik_lainnya) Return the first JenisPtk filtered by the tendik_lainnya column
 * @method JenisPtk findOneByFormal(string $formal) Return the first JenisPtk filtered by the formal column
 * @method JenisPtk findOneByCreateDate(string $create_date) Return the first JenisPtk filtered by the create_date column
 * @method JenisPtk findOneByLastUpdate(string $last_update) Return the first JenisPtk filtered by the last_update column
 * @method JenisPtk findOneByExpiredDate(string $expired_date) Return the first JenisPtk filtered by the expired_date column
 * @method JenisPtk findOneByLastSync(string $last_sync) Return the first JenisPtk filtered by the last_sync column
 *
 * @method array findByJenisPtkId(string $jenis_ptk_id) Return JenisPtk objects filtered by the jenis_ptk_id column
 * @method array findByJenisPtk(string $jenis_ptk) Return JenisPtk objects filtered by the jenis_ptk column
 * @method array findByGuruKelas(string $guru_kelas) Return JenisPtk objects filtered by the guru_kelas column
 * @method array findByGuruMatpel(string $guru_matpel) Return JenisPtk objects filtered by the guru_matpel column
 * @method array findByGuruBk(string $guru_bk) Return JenisPtk objects filtered by the guru_bk column
 * @method array findByGuruInklusi(string $guru_inklusi) Return JenisPtk objects filtered by the guru_inklusi column
 * @method array findByGuruPengganti(string $guru_pengganti) Return JenisPtk objects filtered by the guru_pengganti column
 * @method array findByPengawasSatdik(string $pengawas_satdik) Return JenisPtk objects filtered by the pengawas_satdik column
 * @method array findByPengawasPlb(string $pengawas_plb) Return JenisPtk objects filtered by the pengawas_plb column
 * @method array findByPengawasMatpel(string $pengawas_matpel) Return JenisPtk objects filtered by the pengawas_matpel column
 * @method array findByPengawasBidang(string $pengawas_bidang) Return JenisPtk objects filtered by the pengawas_bidang column
 * @method array findByTas(string $tas) Return JenisPtk objects filtered by the tas column
 * @method array findByTendikLainnya(string $tendik_lainnya) Return JenisPtk objects filtered by the tendik_lainnya column
 * @method array findByFormal(string $formal) Return JenisPtk objects filtered by the formal column
 * @method array findByCreateDate(string $create_date) Return JenisPtk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisPtk objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisPtk objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisPtk objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisPtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisPtk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisPtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisPtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisPtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisPtkQuery) {
            return $criteria;
        }
        $query = new JenisPtkQuery();
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
     * @return   JenisPtk|JenisPtk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisPtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisPtk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisPtkId($key, $con = null)
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
     * @return                 JenisPtk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_ptk_id", "jenis_ptk", "guru_kelas", "guru_matpel", "guru_bk", "guru_inklusi", "guru_pengganti", "pengawas_satdik", "pengawas_plb", "pengawas_matpel", "pengawas_bidang", "tas", "tendik_lainnya", "formal", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_ptk" WHERE "jenis_ptk_id" = :p0';
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
            $obj = new JenisPtk();
            $obj->hydrate($row);
            JenisPtkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisPtk|JenisPtk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisPtk[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPtkId(1234); // WHERE jenis_ptk_id = 1234
     * $query->filterByJenisPtkId(array(12, 34)); // WHERE jenis_ptk_id IN (12, 34)
     * $query->filterByJenisPtkId(array('min' => 12)); // WHERE jenis_ptk_id >= 12
     * $query->filterByJenisPtkId(array('max' => 12)); // WHERE jenis_ptk_id <= 12
     * </code>
     *
     * @param     mixed $jenisPtkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByJenisPtkId($jenisPtkId = null, $comparison = null)
    {
        if (is_array($jenisPtkId)) {
            $useMinMax = false;
            if (isset($jenisPtkId['min'])) {
                $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $jenisPtkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPtkId['max'])) {
                $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $jenisPtkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $jenisPtkId, $comparison);
    }

    /**
     * Filter the query on the jenis_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPtk('fooValue');   // WHERE jenis_ptk = 'fooValue'
     * $query->filterByJenisPtk('%fooValue%'); // WHERE jenis_ptk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisPtk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByJenisPtk($jenisPtk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisPtk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisPtk)) {
                $jenisPtk = str_replace('*', '%', $jenisPtk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::JENIS_PTK, $jenisPtk, $comparison);
    }

    /**
     * Filter the query on the guru_kelas column
     *
     * Example usage:
     * <code>
     * $query->filterByGuruKelas(1234); // WHERE guru_kelas = 1234
     * $query->filterByGuruKelas(array(12, 34)); // WHERE guru_kelas IN (12, 34)
     * $query->filterByGuruKelas(array('min' => 12)); // WHERE guru_kelas >= 12
     * $query->filterByGuruKelas(array('max' => 12)); // WHERE guru_kelas <= 12
     * </code>
     *
     * @param     mixed $guruKelas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByGuruKelas($guruKelas = null, $comparison = null)
    {
        if (is_array($guruKelas)) {
            $useMinMax = false;
            if (isset($guruKelas['min'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_KELAS, $guruKelas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guruKelas['max'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_KELAS, $guruKelas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::GURU_KELAS, $guruKelas, $comparison);
    }

    /**
     * Filter the query on the guru_matpel column
     *
     * Example usage:
     * <code>
     * $query->filterByGuruMatpel(1234); // WHERE guru_matpel = 1234
     * $query->filterByGuruMatpel(array(12, 34)); // WHERE guru_matpel IN (12, 34)
     * $query->filterByGuruMatpel(array('min' => 12)); // WHERE guru_matpel >= 12
     * $query->filterByGuruMatpel(array('max' => 12)); // WHERE guru_matpel <= 12
     * </code>
     *
     * @param     mixed $guruMatpel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByGuruMatpel($guruMatpel = null, $comparison = null)
    {
        if (is_array($guruMatpel)) {
            $useMinMax = false;
            if (isset($guruMatpel['min'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_MATPEL, $guruMatpel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guruMatpel['max'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_MATPEL, $guruMatpel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::GURU_MATPEL, $guruMatpel, $comparison);
    }

    /**
     * Filter the query on the guru_bk column
     *
     * Example usage:
     * <code>
     * $query->filterByGuruBk(1234); // WHERE guru_bk = 1234
     * $query->filterByGuruBk(array(12, 34)); // WHERE guru_bk IN (12, 34)
     * $query->filterByGuruBk(array('min' => 12)); // WHERE guru_bk >= 12
     * $query->filterByGuruBk(array('max' => 12)); // WHERE guru_bk <= 12
     * </code>
     *
     * @param     mixed $guruBk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByGuruBk($guruBk = null, $comparison = null)
    {
        if (is_array($guruBk)) {
            $useMinMax = false;
            if (isset($guruBk['min'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_BK, $guruBk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guruBk['max'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_BK, $guruBk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::GURU_BK, $guruBk, $comparison);
    }

    /**
     * Filter the query on the guru_inklusi column
     *
     * Example usage:
     * <code>
     * $query->filterByGuruInklusi(1234); // WHERE guru_inklusi = 1234
     * $query->filterByGuruInklusi(array(12, 34)); // WHERE guru_inklusi IN (12, 34)
     * $query->filterByGuruInklusi(array('min' => 12)); // WHERE guru_inklusi >= 12
     * $query->filterByGuruInklusi(array('max' => 12)); // WHERE guru_inklusi <= 12
     * </code>
     *
     * @param     mixed $guruInklusi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByGuruInklusi($guruInklusi = null, $comparison = null)
    {
        if (is_array($guruInklusi)) {
            $useMinMax = false;
            if (isset($guruInklusi['min'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_INKLUSI, $guruInklusi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guruInklusi['max'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_INKLUSI, $guruInklusi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::GURU_INKLUSI, $guruInklusi, $comparison);
    }

    /**
     * Filter the query on the guru_pengganti column
     *
     * Example usage:
     * <code>
     * $query->filterByGuruPengganti(1234); // WHERE guru_pengganti = 1234
     * $query->filterByGuruPengganti(array(12, 34)); // WHERE guru_pengganti IN (12, 34)
     * $query->filterByGuruPengganti(array('min' => 12)); // WHERE guru_pengganti >= 12
     * $query->filterByGuruPengganti(array('max' => 12)); // WHERE guru_pengganti <= 12
     * </code>
     *
     * @param     mixed $guruPengganti The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByGuruPengganti($guruPengganti = null, $comparison = null)
    {
        if (is_array($guruPengganti)) {
            $useMinMax = false;
            if (isset($guruPengganti['min'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_PENGGANTI, $guruPengganti['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($guruPengganti['max'])) {
                $this->addUsingAlias(JenisPtkPeer::GURU_PENGGANTI, $guruPengganti['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::GURU_PENGGANTI, $guruPengganti, $comparison);
    }

    /**
     * Filter the query on the pengawas_satdik column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasSatdik(1234); // WHERE pengawas_satdik = 1234
     * $query->filterByPengawasSatdik(array(12, 34)); // WHERE pengawas_satdik IN (12, 34)
     * $query->filterByPengawasSatdik(array('min' => 12)); // WHERE pengawas_satdik >= 12
     * $query->filterByPengawasSatdik(array('max' => 12)); // WHERE pengawas_satdik <= 12
     * </code>
     *
     * @param     mixed $pengawasSatdik The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPengawasSatdik($pengawasSatdik = null, $comparison = null)
    {
        if (is_array($pengawasSatdik)) {
            $useMinMax = false;
            if (isset($pengawasSatdik['min'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_SATDIK, $pengawasSatdik['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengawasSatdik['max'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_SATDIK, $pengawasSatdik['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::PENGAWAS_SATDIK, $pengawasSatdik, $comparison);
    }

    /**
     * Filter the query on the pengawas_plb column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasPlb(1234); // WHERE pengawas_plb = 1234
     * $query->filterByPengawasPlb(array(12, 34)); // WHERE pengawas_plb IN (12, 34)
     * $query->filterByPengawasPlb(array('min' => 12)); // WHERE pengawas_plb >= 12
     * $query->filterByPengawasPlb(array('max' => 12)); // WHERE pengawas_plb <= 12
     * </code>
     *
     * @param     mixed $pengawasPlb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPengawasPlb($pengawasPlb = null, $comparison = null)
    {
        if (is_array($pengawasPlb)) {
            $useMinMax = false;
            if (isset($pengawasPlb['min'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_PLB, $pengawasPlb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengawasPlb['max'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_PLB, $pengawasPlb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::PENGAWAS_PLB, $pengawasPlb, $comparison);
    }

    /**
     * Filter the query on the pengawas_matpel column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasMatpel(1234); // WHERE pengawas_matpel = 1234
     * $query->filterByPengawasMatpel(array(12, 34)); // WHERE pengawas_matpel IN (12, 34)
     * $query->filterByPengawasMatpel(array('min' => 12)); // WHERE pengawas_matpel >= 12
     * $query->filterByPengawasMatpel(array('max' => 12)); // WHERE pengawas_matpel <= 12
     * </code>
     *
     * @param     mixed $pengawasMatpel The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPengawasMatpel($pengawasMatpel = null, $comparison = null)
    {
        if (is_array($pengawasMatpel)) {
            $useMinMax = false;
            if (isset($pengawasMatpel['min'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_MATPEL, $pengawasMatpel['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengawasMatpel['max'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_MATPEL, $pengawasMatpel['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::PENGAWAS_MATPEL, $pengawasMatpel, $comparison);
    }

    /**
     * Filter the query on the pengawas_bidang column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasBidang(1234); // WHERE pengawas_bidang = 1234
     * $query->filterByPengawasBidang(array(12, 34)); // WHERE pengawas_bidang IN (12, 34)
     * $query->filterByPengawasBidang(array('min' => 12)); // WHERE pengawas_bidang >= 12
     * $query->filterByPengawasBidang(array('max' => 12)); // WHERE pengawas_bidang <= 12
     * </code>
     *
     * @param     mixed $pengawasBidang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByPengawasBidang($pengawasBidang = null, $comparison = null)
    {
        if (is_array($pengawasBidang)) {
            $useMinMax = false;
            if (isset($pengawasBidang['min'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_BIDANG, $pengawasBidang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengawasBidang['max'])) {
                $this->addUsingAlias(JenisPtkPeer::PENGAWAS_BIDANG, $pengawasBidang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::PENGAWAS_BIDANG, $pengawasBidang, $comparison);
    }

    /**
     * Filter the query on the tas column
     *
     * Example usage:
     * <code>
     * $query->filterByTas(1234); // WHERE tas = 1234
     * $query->filterByTas(array(12, 34)); // WHERE tas IN (12, 34)
     * $query->filterByTas(array('min' => 12)); // WHERE tas >= 12
     * $query->filterByTas(array('max' => 12)); // WHERE tas <= 12
     * </code>
     *
     * @param     mixed $tas The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByTas($tas = null, $comparison = null)
    {
        if (is_array($tas)) {
            $useMinMax = false;
            if (isset($tas['min'])) {
                $this->addUsingAlias(JenisPtkPeer::TAS, $tas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tas['max'])) {
                $this->addUsingAlias(JenisPtkPeer::TAS, $tas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::TAS, $tas, $comparison);
    }

    /**
     * Filter the query on the tendik_lainnya column
     *
     * Example usage:
     * <code>
     * $query->filterByTendikLainnya(1234); // WHERE tendik_lainnya = 1234
     * $query->filterByTendikLainnya(array(12, 34)); // WHERE tendik_lainnya IN (12, 34)
     * $query->filterByTendikLainnya(array('min' => 12)); // WHERE tendik_lainnya >= 12
     * $query->filterByTendikLainnya(array('max' => 12)); // WHERE tendik_lainnya <= 12
     * </code>
     *
     * @param     mixed $tendikLainnya The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByTendikLainnya($tendikLainnya = null, $comparison = null)
    {
        if (is_array($tendikLainnya)) {
            $useMinMax = false;
            if (isset($tendikLainnya['min'])) {
                $this->addUsingAlias(JenisPtkPeer::TENDIK_LAINNYA, $tendikLainnya['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tendikLainnya['max'])) {
                $this->addUsingAlias(JenisPtkPeer::TENDIK_LAINNYA, $tendikLainnya['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::TENDIK_LAINNYA, $tendikLainnya, $comparison);
    }

    /**
     * Filter the query on the formal column
     *
     * Example usage:
     * <code>
     * $query->filterByFormal(1234); // WHERE formal = 1234
     * $query->filterByFormal(array(12, 34)); // WHERE formal IN (12, 34)
     * $query->filterByFormal(array('min' => 12)); // WHERE formal >= 12
     * $query->filterByFormal(array('max' => 12)); // WHERE formal <= 12
     * </code>
     *
     * @param     mixed $formal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByFormal($formal = null, $comparison = null)
    {
        if (is_array($formal)) {
            $useMinMax = false;
            if (isset($formal['min'])) {
                $this->addUsingAlias(JenisPtkPeer::FORMAL, $formal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($formal['max'])) {
                $this->addUsingAlias(JenisPtkPeer::FORMAL, $formal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::FORMAL, $formal, $comparison);
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
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisPtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisPtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisPtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisPtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisPtkPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisPtkPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisPtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisPtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPtkPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $ptk->getJenisPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related RwyKerja object
     *
     * @param   RwyKerja|PropelObjectCollection $rwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKerja($rwyKerja, $comparison = null)
    {
        if ($rwyKerja instanceof RwyKerja) {
            return $this
                ->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $rwyKerja->getJenisPtkId(), $comparison);
        } elseif ($rwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useRwyKerjaQuery()
                ->filterByPrimaryKeys($rwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKerja() only accepts arguments of type RwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function joinRwyKerja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKerja');

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
            $this->addJoinObject($join, 'RwyKerja');
        }

        return $this;
    }

    /**
     * Use the RwyKerja relation RwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useRwyKerjaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKerja', '\DataDikdas\Model\RwyKerjaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisPtk $jenisPtk Object to remove from the list of results
     *
     * @return JenisPtkQuery The current query, for fluid interface
     */
    public function prune($jenisPtk = null)
    {
        if ($jenisPtk) {
            $this->addUsingAlias(JenisPtkPeer::JENIS_PTK_ID, $jenisPtk->getJenisPtkId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
