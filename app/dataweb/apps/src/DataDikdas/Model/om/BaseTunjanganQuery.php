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
use DataDikdas\Model\JenisTunjangan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Semester;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\TunjanganPeer;
use DataDikdas\Model\TunjanganQuery;
use DataDikdas\Model\VldTunjangan;

/**
 * Base class that represents a query for the 'tunjangan' table.
 *
 * 
 *
 * @method TunjanganQuery orderByTunjanganId($order = Criteria::ASC) Order by the tunjangan_id column
 * @method TunjanganQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method TunjanganQuery orderByJenisTunjanganId($order = Criteria::ASC) Order by the jenis_tunjangan_id column
 * @method TunjanganQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method TunjanganQuery orderByInstansi($order = Criteria::ASC) Order by the instansi column
 * @method TunjanganQuery orderBySkTunjangan($order = Criteria::ASC) Order by the sk_tunjangan column
 * @method TunjanganQuery orderByTglSkTunjangan($order = Criteria::ASC) Order by the tgl_sk_tunjangan column
 * @method TunjanganQuery orderBySemesterId($order = Criteria::ASC) Order by the semester_id column
 * @method TunjanganQuery orderBySumberDana($order = Criteria::ASC) Order by the sumber_dana column
 * @method TunjanganQuery orderByDariTahun($order = Criteria::ASC) Order by the dari_tahun column
 * @method TunjanganQuery orderBySampaiTahun($order = Criteria::ASC) Order by the sampai_tahun column
 * @method TunjanganQuery orderByNominal($order = Criteria::ASC) Order by the nominal column
 * @method TunjanganQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method TunjanganQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method TunjanganQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TunjanganQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TunjanganQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method TunjanganQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method TunjanganQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method TunjanganQuery groupByTunjanganId() Group by the tunjangan_id column
 * @method TunjanganQuery groupByPtkId() Group by the ptk_id column
 * @method TunjanganQuery groupByJenisTunjanganId() Group by the jenis_tunjangan_id column
 * @method TunjanganQuery groupByNama() Group by the nama column
 * @method TunjanganQuery groupByInstansi() Group by the instansi column
 * @method TunjanganQuery groupBySkTunjangan() Group by the sk_tunjangan column
 * @method TunjanganQuery groupByTglSkTunjangan() Group by the tgl_sk_tunjangan column
 * @method TunjanganQuery groupBySemesterId() Group by the semester_id column
 * @method TunjanganQuery groupBySumberDana() Group by the sumber_dana column
 * @method TunjanganQuery groupByDariTahun() Group by the dari_tahun column
 * @method TunjanganQuery groupBySampaiTahun() Group by the sampai_tahun column
 * @method TunjanganQuery groupByNominal() Group by the nominal column
 * @method TunjanganQuery groupByStatus() Group by the status column
 * @method TunjanganQuery groupByAsalData() Group by the asal_data column
 * @method TunjanganQuery groupByCreateDate() Group by the create_date column
 * @method TunjanganQuery groupByLastUpdate() Group by the last_update column
 * @method TunjanganQuery groupBySoftDelete() Group by the soft_delete column
 * @method TunjanganQuery groupByLastSync() Group by the last_sync column
 * @method TunjanganQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method TunjanganQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TunjanganQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TunjanganQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TunjanganQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method TunjanganQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method TunjanganQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method TunjanganQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method TunjanganQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method TunjanganQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method TunjanganQuery leftJoinJenisTunjangan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisTunjangan relation
 * @method TunjanganQuery rightJoinJenisTunjangan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisTunjangan relation
 * @method TunjanganQuery innerJoinJenisTunjangan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisTunjangan relation
 *
 * @method TunjanganQuery leftJoinVldTunjangan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTunjangan relation
 * @method TunjanganQuery rightJoinVldTunjangan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTunjangan relation
 * @method TunjanganQuery innerJoinVldTunjangan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTunjangan relation
 *
 * @method Tunjangan findOne(PropelPDO $con = null) Return the first Tunjangan matching the query
 * @method Tunjangan findOneOrCreate(PropelPDO $con = null) Return the first Tunjangan matching the query, or a new Tunjangan object populated from the query conditions when no match is found
 *
 * @method Tunjangan findOneByPtkId(string $ptk_id) Return the first Tunjangan filtered by the ptk_id column
 * @method Tunjangan findOneByJenisTunjanganId(int $jenis_tunjangan_id) Return the first Tunjangan filtered by the jenis_tunjangan_id column
 * @method Tunjangan findOneByNama(string $nama) Return the first Tunjangan filtered by the nama column
 * @method Tunjangan findOneByInstansi(string $instansi) Return the first Tunjangan filtered by the instansi column
 * @method Tunjangan findOneBySkTunjangan(string $sk_tunjangan) Return the first Tunjangan filtered by the sk_tunjangan column
 * @method Tunjangan findOneByTglSkTunjangan(string $tgl_sk_tunjangan) Return the first Tunjangan filtered by the tgl_sk_tunjangan column
 * @method Tunjangan findOneBySemesterId(string $semester_id) Return the first Tunjangan filtered by the semester_id column
 * @method Tunjangan findOneBySumberDana(string $sumber_dana) Return the first Tunjangan filtered by the sumber_dana column
 * @method Tunjangan findOneByDariTahun(string $dari_tahun) Return the first Tunjangan filtered by the dari_tahun column
 * @method Tunjangan findOneBySampaiTahun(string $sampai_tahun) Return the first Tunjangan filtered by the sampai_tahun column
 * @method Tunjangan findOneByNominal(string $nominal) Return the first Tunjangan filtered by the nominal column
 * @method Tunjangan findOneByStatus(int $status) Return the first Tunjangan filtered by the status column
 * @method Tunjangan findOneByAsalData(string $asal_data) Return the first Tunjangan filtered by the asal_data column
 * @method Tunjangan findOneByCreateDate(string $create_date) Return the first Tunjangan filtered by the create_date column
 * @method Tunjangan findOneByLastUpdate(string $last_update) Return the first Tunjangan filtered by the last_update column
 * @method Tunjangan findOneBySoftDelete(string $soft_delete) Return the first Tunjangan filtered by the soft_delete column
 * @method Tunjangan findOneByLastSync(string $last_sync) Return the first Tunjangan filtered by the last_sync column
 * @method Tunjangan findOneByUpdaterId(string $updater_id) Return the first Tunjangan filtered by the updater_id column
 *
 * @method array findByTunjanganId(string $tunjangan_id) Return Tunjangan objects filtered by the tunjangan_id column
 * @method array findByPtkId(string $ptk_id) Return Tunjangan objects filtered by the ptk_id column
 * @method array findByJenisTunjanganId(int $jenis_tunjangan_id) Return Tunjangan objects filtered by the jenis_tunjangan_id column
 * @method array findByNama(string $nama) Return Tunjangan objects filtered by the nama column
 * @method array findByInstansi(string $instansi) Return Tunjangan objects filtered by the instansi column
 * @method array findBySkTunjangan(string $sk_tunjangan) Return Tunjangan objects filtered by the sk_tunjangan column
 * @method array findByTglSkTunjangan(string $tgl_sk_tunjangan) Return Tunjangan objects filtered by the tgl_sk_tunjangan column
 * @method array findBySemesterId(string $semester_id) Return Tunjangan objects filtered by the semester_id column
 * @method array findBySumberDana(string $sumber_dana) Return Tunjangan objects filtered by the sumber_dana column
 * @method array findByDariTahun(string $dari_tahun) Return Tunjangan objects filtered by the dari_tahun column
 * @method array findBySampaiTahun(string $sampai_tahun) Return Tunjangan objects filtered by the sampai_tahun column
 * @method array findByNominal(string $nominal) Return Tunjangan objects filtered by the nominal column
 * @method array findByStatus(int $status) Return Tunjangan objects filtered by the status column
 * @method array findByAsalData(string $asal_data) Return Tunjangan objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Tunjangan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Tunjangan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Tunjangan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Tunjangan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Tunjangan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTunjanganQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTunjanganQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Tunjangan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TunjanganQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TunjanganQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TunjanganQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TunjanganQuery) {
            return $criteria;
        }
        $query = new TunjanganQuery();
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
     * @return   Tunjangan|Tunjangan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TunjanganPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TunjanganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Tunjangan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTunjanganId($key, $con = null)
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
     * @return                 Tunjangan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "tunjangan_id", "ptk_id", "jenis_tunjangan_id", "nama", "instansi", "sk_tunjangan", "tgl_sk_tunjangan", "semester_id", "sumber_dana", "dari_tahun", "sampai_tahun", "nominal", "status", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "tunjangan" WHERE "tunjangan_id" = :p0';
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
            $obj = new Tunjangan();
            $obj->hydrate($row);
            TunjanganPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Tunjangan|Tunjangan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Tunjangan[]|mixed the list of results, formatted by the current formatter
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
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TunjanganPeer::TUNJANGAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TunjanganPeer::TUNJANGAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tunjangan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTunjanganId('fooValue');   // WHERE tunjangan_id = 'fooValue'
     * $query->filterByTunjanganId('%fooValue%'); // WHERE tunjangan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tunjanganId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByTunjanganId($tunjanganId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tunjanganId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tunjanganId)) {
                $tunjanganId = str_replace('*', '%', $tunjanganId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::TUNJANGAN_ID, $tunjanganId, $comparison);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the jenis_tunjangan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisTunjanganId(1234); // WHERE jenis_tunjangan_id = 1234
     * $query->filterByJenisTunjanganId(array(12, 34)); // WHERE jenis_tunjangan_id IN (12, 34)
     * $query->filterByJenisTunjanganId(array('min' => 12)); // WHERE jenis_tunjangan_id >= 12
     * $query->filterByJenisTunjanganId(array('max' => 12)); // WHERE jenis_tunjangan_id <= 12
     * </code>
     *
     * @see       filterByJenisTunjangan()
     *
     * @param     mixed $jenisTunjanganId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByJenisTunjanganId($jenisTunjanganId = null, $comparison = null)
    {
        if (is_array($jenisTunjanganId)) {
            $useMinMax = false;
            if (isset($jenisTunjanganId['min'])) {
                $this->addUsingAlias(TunjanganPeer::JENIS_TUNJANGAN_ID, $jenisTunjanganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisTunjanganId['max'])) {
                $this->addUsingAlias(TunjanganPeer::JENIS_TUNJANGAN_ID, $jenisTunjanganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::JENIS_TUNJANGAN_ID, $jenisTunjanganId, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TunjanganPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the instansi column
     *
     * Example usage:
     * <code>
     * $query->filterByInstansi('fooValue');   // WHERE instansi = 'fooValue'
     * $query->filterByInstansi('%fooValue%'); // WHERE instansi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $instansi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByInstansi($instansi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($instansi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $instansi)) {
                $instansi = str_replace('*', '%', $instansi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::INSTANSI, $instansi, $comparison);
    }

    /**
     * Filter the query on the sk_tunjangan column
     *
     * Example usage:
     * <code>
     * $query->filterBySkTunjangan('fooValue');   // WHERE sk_tunjangan = 'fooValue'
     * $query->filterBySkTunjangan('%fooValue%'); // WHERE sk_tunjangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skTunjangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterBySkTunjangan($skTunjangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skTunjangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skTunjangan)) {
                $skTunjangan = str_replace('*', '%', $skTunjangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::SK_TUNJANGAN, $skTunjangan, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_tunjangan column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkTunjangan('2011-03-14'); // WHERE tgl_sk_tunjangan = '2011-03-14'
     * $query->filterByTglSkTunjangan('now'); // WHERE tgl_sk_tunjangan = '2011-03-14'
     * $query->filterByTglSkTunjangan(array('max' => 'yesterday')); // WHERE tgl_sk_tunjangan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkTunjangan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByTglSkTunjangan($tglSkTunjangan = null, $comparison = null)
    {
        if (is_array($tglSkTunjangan)) {
            $useMinMax = false;
            if (isset($tglSkTunjangan['min'])) {
                $this->addUsingAlias(TunjanganPeer::TGL_SK_TUNJANGAN, $tglSkTunjangan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkTunjangan['max'])) {
                $this->addUsingAlias(TunjanganPeer::TGL_SK_TUNJANGAN, $tglSkTunjangan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::TGL_SK_TUNJANGAN, $tglSkTunjangan, $comparison);
    }

    /**
     * Filter the query on the semester_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySemesterId('fooValue');   // WHERE semester_id = 'fooValue'
     * $query->filterBySemesterId('%fooValue%'); // WHERE semester_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $semesterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterBySemesterId($semesterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($semesterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $semesterId)) {
                $semesterId = str_replace('*', '%', $semesterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::SEMESTER_ID, $semesterId, $comparison);
    }

    /**
     * Filter the query on the sumber_dana column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDana('fooValue');   // WHERE sumber_dana = 'fooValue'
     * $query->filterBySumberDana('%fooValue%'); // WHERE sumber_dana LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sumberDana The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterBySumberDana($sumberDana = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sumberDana)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sumberDana)) {
                $sumberDana = str_replace('*', '%', $sumberDana);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::SUMBER_DANA, $sumberDana, $comparison);
    }

    /**
     * Filter the query on the dari_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByDariTahun(1234); // WHERE dari_tahun = 1234
     * $query->filterByDariTahun(array(12, 34)); // WHERE dari_tahun IN (12, 34)
     * $query->filterByDariTahun(array('min' => 12)); // WHERE dari_tahun >= 12
     * $query->filterByDariTahun(array('max' => 12)); // WHERE dari_tahun <= 12
     * </code>
     *
     * @param     mixed $dariTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByDariTahun($dariTahun = null, $comparison = null)
    {
        if (is_array($dariTahun)) {
            $useMinMax = false;
            if (isset($dariTahun['min'])) {
                $this->addUsingAlias(TunjanganPeer::DARI_TAHUN, $dariTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dariTahun['max'])) {
                $this->addUsingAlias(TunjanganPeer::DARI_TAHUN, $dariTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::DARI_TAHUN, $dariTahun, $comparison);
    }

    /**
     * Filter the query on the sampai_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterBySampaiTahun(1234); // WHERE sampai_tahun = 1234
     * $query->filterBySampaiTahun(array(12, 34)); // WHERE sampai_tahun IN (12, 34)
     * $query->filterBySampaiTahun(array('min' => 12)); // WHERE sampai_tahun >= 12
     * $query->filterBySampaiTahun(array('max' => 12)); // WHERE sampai_tahun <= 12
     * </code>
     *
     * @param     mixed $sampaiTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterBySampaiTahun($sampaiTahun = null, $comparison = null)
    {
        if (is_array($sampaiTahun)) {
            $useMinMax = false;
            if (isset($sampaiTahun['min'])) {
                $this->addUsingAlias(TunjanganPeer::SAMPAI_TAHUN, $sampaiTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sampaiTahun['max'])) {
                $this->addUsingAlias(TunjanganPeer::SAMPAI_TAHUN, $sampaiTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::SAMPAI_TAHUN, $sampaiTahun, $comparison);
    }

    /**
     * Filter the query on the nominal column
     *
     * Example usage:
     * <code>
     * $query->filterByNominal(1234); // WHERE nominal = 1234
     * $query->filterByNominal(array(12, 34)); // WHERE nominal IN (12, 34)
     * $query->filterByNominal(array('min' => 12)); // WHERE nominal >= 12
     * $query->filterByNominal(array('max' => 12)); // WHERE nominal <= 12
     * </code>
     *
     * @param     mixed $nominal The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByNominal($nominal = null, $comparison = null)
    {
        if (is_array($nominal)) {
            $useMinMax = false;
            if (isset($nominal['min'])) {
                $this->addUsingAlias(TunjanganPeer::NOMINAL, $nominal['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nominal['max'])) {
                $this->addUsingAlias(TunjanganPeer::NOMINAL, $nominal['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::NOMINAL, $nominal, $comparison);
    }

    /**
     * Filter the query on the status column
     *
     * Example usage:
     * <code>
     * $query->filterByStatus(1234); // WHERE status = 1234
     * $query->filterByStatus(array(12, 34)); // WHERE status IN (12, 34)
     * $query->filterByStatus(array('min' => 12)); // WHERE status >= 12
     * $query->filterByStatus(array('max' => 12)); // WHERE status <= 12
     * </code>
     *
     * @param     mixed $status The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(TunjanganPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(TunjanganPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::STATUS, $status, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TunjanganPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TunjanganPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TunjanganPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TunjanganPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(TunjanganPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(TunjanganPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TunjanganPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TunjanganPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TunjanganPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TunjanganPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TunjanganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(TunjanganPeer::SEMESTER_ID, $semester->getSemesterId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TunjanganPeer::SEMESTER_ID, $semester->toKeyValue('PrimaryKey', 'SemesterId'), $comparison);
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TunjanganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(TunjanganPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TunjanganPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return TunjanganQuery The current query, for fluid interface
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
     * Filter the query by a related JenisTunjangan object
     *
     * @param   JenisTunjangan|PropelObjectCollection $jenisTunjangan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TunjanganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisTunjangan($jenisTunjangan, $comparison = null)
    {
        if ($jenisTunjangan instanceof JenisTunjangan) {
            return $this
                ->addUsingAlias(TunjanganPeer::JENIS_TUNJANGAN_ID, $jenisTunjangan->getJenisTunjanganId(), $comparison);
        } elseif ($jenisTunjangan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TunjanganPeer::JENIS_TUNJANGAN_ID, $jenisTunjangan->toKeyValue('PrimaryKey', 'JenisTunjanganId'), $comparison);
        } else {
            throw new PropelException('filterByJenisTunjangan() only accepts arguments of type JenisTunjangan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisTunjangan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function joinJenisTunjangan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisTunjangan');

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
            $this->addJoinObject($join, 'JenisTunjangan');
        }

        return $this;
    }

    /**
     * Use the JenisTunjangan relation JenisTunjangan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisTunjanganQuery A secondary query class using the current class as primary query
     */
    public function useJenisTunjanganQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisTunjangan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisTunjangan', '\DataDikdas\Model\JenisTunjanganQuery');
    }

    /**
     * Filter the query by a related VldTunjangan object
     *
     * @param   VldTunjangan|PropelObjectCollection $vldTunjangan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TunjanganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTunjangan($vldTunjangan, $comparison = null)
    {
        if ($vldTunjangan instanceof VldTunjangan) {
            return $this
                ->addUsingAlias(TunjanganPeer::TUNJANGAN_ID, $vldTunjangan->getTunjanganId(), $comparison);
        } elseif ($vldTunjangan instanceof PropelObjectCollection) {
            return $this
                ->useVldTunjanganQuery()
                ->filterByPrimaryKeys($vldTunjangan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTunjangan() only accepts arguments of type VldTunjangan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTunjangan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function joinVldTunjangan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTunjangan');

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
            $this->addJoinObject($join, 'VldTunjangan');
        }

        return $this;
    }

    /**
     * Use the VldTunjangan relation VldTunjangan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTunjanganQuery A secondary query class using the current class as primary query
     */
    public function useVldTunjanganQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTunjangan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTunjangan', '\DataDikdas\Model\VldTunjanganQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Tunjangan $tunjangan Object to remove from the list of results
     *
     * @return TunjanganQuery The current query, for fluid interface
     */
    public function prune($tunjangan = null)
    {
        if ($tunjangan) {
            $this->addUsingAlias(TunjanganPeer::TUNJANGAN_ID, $tunjangan->getTunjanganId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
