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
use DataDikdas\Model\JenisKesejahteraanPeer;
use DataDikdas\Model\JenisKesejahteraanQuery;
use DataDikdas\Model\Kesejahteraan;
use DataDikdas\Model\KesejahteraanPd;

/**
 * Base class that represents a query for the 'ref.jenis_kesejahteraan' table.
 *
 * 
 *
 * @method JenisKesejahteraanQuery orderByJenisKesejahteraanId($order = Criteria::ASC) Order by the jenis_kesejahteraan_id column
 * @method JenisKesejahteraanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisKesejahteraanQuery orderByPenyelenggara($order = Criteria::ASC) Order by the penyelenggara column
 * @method JenisKesejahteraanQuery orderByUPtk($order = Criteria::ASC) Order by the u_ptk column
 * @method JenisKesejahteraanQuery orderByUPd($order = Criteria::ASC) Order by the u_pd column
 * @method JenisKesejahteraanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisKesejahteraanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisKesejahteraanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisKesejahteraanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisKesejahteraanQuery groupByJenisKesejahteraanId() Group by the jenis_kesejahteraan_id column
 * @method JenisKesejahteraanQuery groupByNama() Group by the nama column
 * @method JenisKesejahteraanQuery groupByPenyelenggara() Group by the penyelenggara column
 * @method JenisKesejahteraanQuery groupByUPtk() Group by the u_ptk column
 * @method JenisKesejahteraanQuery groupByUPd() Group by the u_pd column
 * @method JenisKesejahteraanQuery groupByCreateDate() Group by the create_date column
 * @method JenisKesejahteraanQuery groupByLastUpdate() Group by the last_update column
 * @method JenisKesejahteraanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisKesejahteraanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisKesejahteraanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisKesejahteraanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisKesejahteraanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisKesejahteraanQuery leftJoinKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kesejahteraan relation
 * @method JenisKesejahteraanQuery rightJoinKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kesejahteraan relation
 * @method JenisKesejahteraanQuery innerJoinKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kesejahteraan relation
 *
 * @method JenisKesejahteraanQuery leftJoinKesejahteraanPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the KesejahteraanPd relation
 * @method JenisKesejahteraanQuery rightJoinKesejahteraanPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KesejahteraanPd relation
 * @method JenisKesejahteraanQuery innerJoinKesejahteraanPd($relationAlias = null) Adds a INNER JOIN clause to the query using the KesejahteraanPd relation
 *
 * @method JenisKesejahteraan findOne(PropelPDO $con = null) Return the first JenisKesejahteraan matching the query
 * @method JenisKesejahteraan findOneOrCreate(PropelPDO $con = null) Return the first JenisKesejahteraan matching the query, or a new JenisKesejahteraan object populated from the query conditions when no match is found
 *
 * @method JenisKesejahteraan findOneByNama(string $nama) Return the first JenisKesejahteraan filtered by the nama column
 * @method JenisKesejahteraan findOneByPenyelenggara(string $penyelenggara) Return the first JenisKesejahteraan filtered by the penyelenggara column
 * @method JenisKesejahteraan findOneByUPtk(string $u_ptk) Return the first JenisKesejahteraan filtered by the u_ptk column
 * @method JenisKesejahteraan findOneByUPd(string $u_pd) Return the first JenisKesejahteraan filtered by the u_pd column
 * @method JenisKesejahteraan findOneByCreateDate(string $create_date) Return the first JenisKesejahteraan filtered by the create_date column
 * @method JenisKesejahteraan findOneByLastUpdate(string $last_update) Return the first JenisKesejahteraan filtered by the last_update column
 * @method JenisKesejahteraan findOneByExpiredDate(string $expired_date) Return the first JenisKesejahteraan filtered by the expired_date column
 * @method JenisKesejahteraan findOneByLastSync(string $last_sync) Return the first JenisKesejahteraan filtered by the last_sync column
 *
 * @method array findByJenisKesejahteraanId(int $jenis_kesejahteraan_id) Return JenisKesejahteraan objects filtered by the jenis_kesejahteraan_id column
 * @method array findByNama(string $nama) Return JenisKesejahteraan objects filtered by the nama column
 * @method array findByPenyelenggara(string $penyelenggara) Return JenisKesejahteraan objects filtered by the penyelenggara column
 * @method array findByUPtk(string $u_ptk) Return JenisKesejahteraan objects filtered by the u_ptk column
 * @method array findByUPd(string $u_pd) Return JenisKesejahteraan objects filtered by the u_pd column
 * @method array findByCreateDate(string $create_date) Return JenisKesejahteraan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisKesejahteraan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisKesejahteraan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisKesejahteraan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisKesejahteraanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisKesejahteraanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisKesejahteraan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisKesejahteraanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisKesejahteraanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisKesejahteraanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisKesejahteraanQuery) {
            return $criteria;
        }
        $query = new JenisKesejahteraanQuery();
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
     * @return   JenisKesejahteraan|JenisKesejahteraan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisKesejahteraanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisKesejahteraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisKesejahteraan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisKesejahteraanId($key, $con = null)
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
     * @return                 JenisKesejahteraan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_kesejahteraan_id", "nama", "penyelenggara", "u_ptk", "u_pd", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_kesejahteraan" WHERE "jenis_kesejahteraan_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new JenisKesejahteraan();
            $obj->hydrate($row);
            JenisKesejahteraanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisKesejahteraan|JenisKesejahteraan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisKesejahteraan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $keys, Criteria::IN);
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
     * @param     mixed $jenisKesejahteraanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByJenisKesejahteraanId($jenisKesejahteraanId = null, $comparison = null)
    {
        if (is_array($jenisKesejahteraanId)) {
            $useMinMax = false;
            if (isset($jenisKesejahteraanId['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisKesejahteraanId['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraanId, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisKesejahteraanPeer::NAMA, $nama, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisKesejahteraanPeer::PENYELENGGARA, $penyelenggara, $comparison);
    }

    /**
     * Filter the query on the u_ptk column
     *
     * Example usage:
     * <code>
     * $query->filterByUPtk(1234); // WHERE u_ptk = 1234
     * $query->filterByUPtk(array(12, 34)); // WHERE u_ptk IN (12, 34)
     * $query->filterByUPtk(array('min' => 12)); // WHERE u_ptk >= 12
     * $query->filterByUPtk(array('max' => 12)); // WHERE u_ptk <= 12
     * </code>
     *
     * @param     mixed $uPtk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByUPtk($uPtk = null, $comparison = null)
    {
        if (is_array($uPtk)) {
            $useMinMax = false;
            if (isset($uPtk['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::U_PTK, $uPtk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uPtk['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::U_PTK, $uPtk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::U_PTK, $uPtk, $comparison);
    }

    /**
     * Filter the query on the u_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByUPd(1234); // WHERE u_pd = 1234
     * $query->filterByUPd(array(12, 34)); // WHERE u_pd IN (12, 34)
     * $query->filterByUPd(array('min' => 12)); // WHERE u_pd >= 12
     * $query->filterByUPd(array('max' => 12)); // WHERE u_pd <= 12
     * </code>
     *
     * @param     mixed $uPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByUPd($uPd = null, $comparison = null)
    {
        if (is_array($uPd)) {
            $useMinMax = false;
            if (isset($uPd['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::U_PD, $uPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uPd['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::U_PD, $uPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::U_PD, $uPd, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisKesejahteraanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKesejahteraanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Kesejahteraan object
     *
     * @param   Kesejahteraan|PropelObjectCollection $kesejahteraan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKesejahteraanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKesejahteraan($kesejahteraan, $comparison = null)
    {
        if ($kesejahteraan instanceof Kesejahteraan) {
            return $this
                ->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $kesejahteraan->getJenisKesejahteraanId(), $comparison);
        } elseif ($kesejahteraan instanceof PropelObjectCollection) {
            return $this
                ->useKesejahteraanQuery()
                ->filterByPrimaryKeys($kesejahteraan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKesejahteraan() only accepts arguments of type Kesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function joinKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kesejahteraan');

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
            $this->addJoinObject($join, 'Kesejahteraan');
        }

        return $this;
    }

    /**
     * Use the Kesejahteraan relation Kesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kesejahteraan', '\DataDikdas\Model\KesejahteraanQuery');
    }

    /**
     * Filter the query by a related KesejahteraanPd object
     *
     * @param   KesejahteraanPd|PropelObjectCollection $kesejahteraanPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKesejahteraanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKesejahteraanPd($kesejahteraanPd, $comparison = null)
    {
        if ($kesejahteraanPd instanceof KesejahteraanPd) {
            return $this
                ->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $kesejahteraanPd->getJenisKesejahteraanId(), $comparison);
        } elseif ($kesejahteraanPd instanceof PropelObjectCollection) {
            return $this
                ->useKesejahteraanPdQuery()
                ->filterByPrimaryKeys($kesejahteraanPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKesejahteraanPd() only accepts arguments of type KesejahteraanPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KesejahteraanPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function joinKesejahteraanPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KesejahteraanPd');

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
            $this->addJoinObject($join, 'KesejahteraanPd');
        }

        return $this;
    }

    /**
     * Use the KesejahteraanPd relation KesejahteraanPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KesejahteraanPdQuery A secondary query class using the current class as primary query
     */
    public function useKesejahteraanPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKesejahteraanPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KesejahteraanPd', '\DataDikdas\Model\KesejahteraanPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisKesejahteraan $jenisKesejahteraan Object to remove from the list of results
     *
     * @return JenisKesejahteraanQuery The current query, for fluid interface
     */
    public function prune($jenisKesejahteraan = null)
    {
        if ($jenisKesejahteraan) {
            $this->addUsingAlias(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $jenisKesejahteraan->getJenisKesejahteraanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
