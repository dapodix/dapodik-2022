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
use DataDikdas\Model\JenisKesejahteraan;
use DataDikdas\Model\Kesejahteraan;
use DataDikdas\Model\KesejahteraanPeer;
use DataDikdas\Model\KesejahteraanQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldKesejahteraan;

/**
 * Base class that represents a query for the 'kesejahteraan' table.
 *
 * 
 *
 * @method KesejahteraanQuery orderByKesejahteraanId($order = Criteria::ASC) Order by the kesejahteraan_id column
 * @method KesejahteraanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method KesejahteraanQuery orderByJenisKesejahteraanId($order = Criteria::ASC) Order by the jenis_kesejahteraan_id column
 * @method KesejahteraanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method KesejahteraanQuery orderByPenyelenggara($order = Criteria::ASC) Order by the penyelenggara column
 * @method KesejahteraanQuery orderByDariTahun($order = Criteria::ASC) Order by the dari_tahun column
 * @method KesejahteraanQuery orderBySampaiTahun($order = Criteria::ASC) Order by the sampai_tahun column
 * @method KesejahteraanQuery orderByStatus($order = Criteria::ASC) Order by the status column
 * @method KesejahteraanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KesejahteraanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KesejahteraanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KesejahteraanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KesejahteraanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KesejahteraanQuery groupByKesejahteraanId() Group by the kesejahteraan_id column
 * @method KesejahteraanQuery groupByPtkId() Group by the ptk_id column
 * @method KesejahteraanQuery groupByJenisKesejahteraanId() Group by the jenis_kesejahteraan_id column
 * @method KesejahteraanQuery groupByNama() Group by the nama column
 * @method KesejahteraanQuery groupByPenyelenggara() Group by the penyelenggara column
 * @method KesejahteraanQuery groupByDariTahun() Group by the dari_tahun column
 * @method KesejahteraanQuery groupBySampaiTahun() Group by the sampai_tahun column
 * @method KesejahteraanQuery groupByStatus() Group by the status column
 * @method KesejahteraanQuery groupByCreateDate() Group by the create_date column
 * @method KesejahteraanQuery groupByLastUpdate() Group by the last_update column
 * @method KesejahteraanQuery groupBySoftDelete() Group by the soft_delete column
 * @method KesejahteraanQuery groupByLastSync() Group by the last_sync column
 * @method KesejahteraanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KesejahteraanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KesejahteraanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KesejahteraanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KesejahteraanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method KesejahteraanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method KesejahteraanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method KesejahteraanQuery leftJoinJenisKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisKesejahteraan relation
 * @method KesejahteraanQuery rightJoinJenisKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisKesejahteraan relation
 * @method KesejahteraanQuery innerJoinJenisKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisKesejahteraan relation
 *
 * @method KesejahteraanQuery leftJoinVldKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldKesejahteraan relation
 * @method KesejahteraanQuery rightJoinVldKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldKesejahteraan relation
 * @method KesejahteraanQuery innerJoinVldKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldKesejahteraan relation
 *
 * @method Kesejahteraan findOne(PropelPDO $con = null) Return the first Kesejahteraan matching the query
 * @method Kesejahteraan findOneOrCreate(PropelPDO $con = null) Return the first Kesejahteraan matching the query, or a new Kesejahteraan object populated from the query conditions when no match is found
 *
 * @method Kesejahteraan findOneByPtkId(string $ptk_id) Return the first Kesejahteraan filtered by the ptk_id column
 * @method Kesejahteraan findOneByJenisKesejahteraanId(int $jenis_kesejahteraan_id) Return the first Kesejahteraan filtered by the jenis_kesejahteraan_id column
 * @method Kesejahteraan findOneByNama(string $nama) Return the first Kesejahteraan filtered by the nama column
 * @method Kesejahteraan findOneByPenyelenggara(string $penyelenggara) Return the first Kesejahteraan filtered by the penyelenggara column
 * @method Kesejahteraan findOneByDariTahun(string $dari_tahun) Return the first Kesejahteraan filtered by the dari_tahun column
 * @method Kesejahteraan findOneBySampaiTahun(string $sampai_tahun) Return the first Kesejahteraan filtered by the sampai_tahun column
 * @method Kesejahteraan findOneByStatus(int $status) Return the first Kesejahteraan filtered by the status column
 * @method Kesejahteraan findOneByCreateDate(string $create_date) Return the first Kesejahteraan filtered by the create_date column
 * @method Kesejahteraan findOneByLastUpdate(string $last_update) Return the first Kesejahteraan filtered by the last_update column
 * @method Kesejahteraan findOneBySoftDelete(string $soft_delete) Return the first Kesejahteraan filtered by the soft_delete column
 * @method Kesejahteraan findOneByLastSync(string $last_sync) Return the first Kesejahteraan filtered by the last_sync column
 * @method Kesejahteraan findOneByUpdaterId(string $updater_id) Return the first Kesejahteraan filtered by the updater_id column
 *
 * @method array findByKesejahteraanId(string $kesejahteraan_id) Return Kesejahteraan objects filtered by the kesejahteraan_id column
 * @method array findByPtkId(string $ptk_id) Return Kesejahteraan objects filtered by the ptk_id column
 * @method array findByJenisKesejahteraanId(int $jenis_kesejahteraan_id) Return Kesejahteraan objects filtered by the jenis_kesejahteraan_id column
 * @method array findByNama(string $nama) Return Kesejahteraan objects filtered by the nama column
 * @method array findByPenyelenggara(string $penyelenggara) Return Kesejahteraan objects filtered by the penyelenggara column
 * @method array findByDariTahun(string $dari_tahun) Return Kesejahteraan objects filtered by the dari_tahun column
 * @method array findBySampaiTahun(string $sampai_tahun) Return Kesejahteraan objects filtered by the sampai_tahun column
 * @method array findByStatus(int $status) Return Kesejahteraan objects filtered by the status column
 * @method array findByCreateDate(string $create_date) Return Kesejahteraan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Kesejahteraan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Kesejahteraan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Kesejahteraan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Kesejahteraan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKesejahteraanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKesejahteraanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Kesejahteraan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KesejahteraanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KesejahteraanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KesejahteraanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KesejahteraanQuery) {
            return $criteria;
        }
        $query = new KesejahteraanQuery();
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
     * @return   Kesejahteraan|Kesejahteraan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KesejahteraanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KesejahteraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Kesejahteraan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKesejahteraanId($key, $con = null)
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
     * @return                 Kesejahteraan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kesejahteraan_id", "ptk_id", "jenis_kesejahteraan_id", "nama", "penyelenggara", "dari_tahun", "sampai_tahun", "status", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kesejahteraan" WHERE "kesejahteraan_id" = :p0';
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
            $obj = new Kesejahteraan();
            $obj->hydrate($row);
            KesejahteraanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Kesejahteraan|Kesejahteraan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Kesejahteraan[]|mixed the list of results, formatted by the current formatter
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KesejahteraanPeer::KESEJAHTERAAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KesejahteraanPeer::KESEJAHTERAAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the kesejahteraan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKesejahteraanId('fooValue');   // WHERE kesejahteraan_id = 'fooValue'
     * $query->filterByKesejahteraanId('%fooValue%'); // WHERE kesejahteraan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kesejahteraanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByKesejahteraanId($kesejahteraanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kesejahteraanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kesejahteraanId)) {
                $kesejahteraanId = str_replace('*', '%', $kesejahteraanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::KESEJAHTERAAN_ID, $kesejahteraanId, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KesejahteraanPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the jenis_kesejahteraan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKesejahteraanId(1234); // WHERE jenis_kesejahteraan_id = 1234
     * $query->filterByJenisKesejahteraanId(array(12, 34)); // WHERE jenis_kesejahteraan_id IN (12, 34)
     * $query->filterByJenisKesejahteraanId(array('min' => 12)); // WHERE jenis_kesejahteraan_id >= 12
     * $query->filterByJenisKesejahteraanId(array('max' => 12)); // WHERE jenis_kesejahteraan_id <= 12
     * </code>
     *
     * @see       filterByJenisKesejahteraan()
     *
     * @param     mixed $jenisKesejahteraanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByJenisKesejahteraanId($jenisKesejahteraanId = null, $comparison = null)
    {
        if (is_array($jenisKesejahteraanId)) {
            $useMinMax = false;
            if (isset($jenisKesejahteraanId['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisKesejahteraanId['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KesejahteraanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the penyelenggara column
     *
     * Example usage:
     * <code>
     * $query->filterByPenyelenggara('fooValue');   // WHERE penyelenggara = 'fooValue'
     * $query->filterByPenyelenggara('%fooValue%'); // WHERE penyelenggara LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penyelenggara The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByPenyelenggara($penyelenggara = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penyelenggara)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penyelenggara)) {
                $penyelenggara = str_replace('*', '%', $penyelenggara);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::PENYELENGGARA, $penyelenggara, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByDariTahun($dariTahun = null, $comparison = null)
    {
        if (is_array($dariTahun)) {
            $useMinMax = false;
            if (isset($dariTahun['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::DARI_TAHUN, $dariTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($dariTahun['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::DARI_TAHUN, $dariTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::DARI_TAHUN, $dariTahun, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterBySampaiTahun($sampaiTahun = null, $comparison = null)
    {
        if (is_array($sampaiTahun)) {
            $useMinMax = false;
            if (isset($sampaiTahun['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::SAMPAI_TAHUN, $sampaiTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sampaiTahun['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::SAMPAI_TAHUN, $sampaiTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::SAMPAI_TAHUN, $sampaiTahun, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByStatus($status = null, $comparison = null)
    {
        if (is_array($status)) {
            $useMinMax = false;
            if (isset($status['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::STATUS, $status['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($status['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::STATUS, $status['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::STATUS, $status, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KesejahteraanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KesejahteraanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KesejahteraanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KesejahteraanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KesejahteraanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(KesejahteraanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KesejahteraanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return KesejahteraanQuery The current query, for fluid interface
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
     * Filter the query by a related JenisKesejahteraan object
     *
     * @param   JenisKesejahteraan|PropelObjectCollection $jenisKesejahteraan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KesejahteraanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisKesejahteraan($jenisKesejahteraan, $comparison = null)
    {
        if ($jenisKesejahteraan instanceof JenisKesejahteraan) {
            return $this
                ->addUsingAlias(KesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraan->getJenisKesejahteraanId(), $comparison);
        } elseif ($jenisKesejahteraan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraan->toKeyValue('PrimaryKey', 'JenisKesejahteraanId'), $comparison);
        } else {
            throw new PropelException('filterByJenisKesejahteraan() only accepts arguments of type JenisKesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisKesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function joinJenisKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisKesejahteraan');

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
            $this->addJoinObject($join, 'JenisKesejahteraan');
        }

        return $this;
    }

    /**
     * Use the JenisKesejahteraan relation JenisKesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisKesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useJenisKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisKesejahteraan', '\DataDikdas\Model\JenisKesejahteraanQuery');
    }

    /**
     * Filter the query by a related VldKesejahteraan object
     *
     * @param   VldKesejahteraan|PropelObjectCollection $vldKesejahteraan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KesejahteraanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldKesejahteraan($vldKesejahteraan, $comparison = null)
    {
        if ($vldKesejahteraan instanceof VldKesejahteraan) {
            return $this
                ->addUsingAlias(KesejahteraanPeer::KESEJAHTERAAN_ID, $vldKesejahteraan->getKesejahteraanId(), $comparison);
        } elseif ($vldKesejahteraan instanceof PropelObjectCollection) {
            return $this
                ->useVldKesejahteraanQuery()
                ->filterByPrimaryKeys($vldKesejahteraan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldKesejahteraan() only accepts arguments of type VldKesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldKesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function joinVldKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldKesejahteraan');

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
            $this->addJoinObject($join, 'VldKesejahteraan');
        }

        return $this;
    }

    /**
     * Use the VldKesejahteraan relation VldKesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldKesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useVldKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldKesejahteraan', '\DataDikdas\Model\VldKesejahteraanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Kesejahteraan $kesejahteraan Object to remove from the list of results
     *
     * @return KesejahteraanQuery The current query, for fluid interface
     */
    public function prune($kesejahteraan = null)
    {
        if ($kesejahteraan) {
            $this->addUsingAlias(KesejahteraanPeer::KESEJAHTERAAN_ID, $kesejahteraan->getKesejahteraanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
