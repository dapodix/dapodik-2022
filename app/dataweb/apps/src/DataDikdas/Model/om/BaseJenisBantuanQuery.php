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
use DataDikdas\Model\BantuanPd;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\JenisBantuan;
use DataDikdas\Model\JenisBantuanPeer;
use DataDikdas\Model\JenisBantuanQuery;

/**
 * Base class that represents a query for the 'ref.jenis_bantuan' table.
 *
 * 
 *
 * @method JenisBantuanQuery orderByJenisBantuanId($order = Criteria::ASC) Order by the jenis_bantuan_id column
 * @method JenisBantuanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisBantuanQuery orderByUntukSekolah($order = Criteria::ASC) Order by the untuk_sekolah column
 * @method JenisBantuanQuery orderByUntukPd($order = Criteria::ASC) Order by the untuk_pd column
 * @method JenisBantuanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisBantuanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisBantuanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisBantuanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisBantuanQuery groupByJenisBantuanId() Group by the jenis_bantuan_id column
 * @method JenisBantuanQuery groupByNama() Group by the nama column
 * @method JenisBantuanQuery groupByUntukSekolah() Group by the untuk_sekolah column
 * @method JenisBantuanQuery groupByUntukPd() Group by the untuk_pd column
 * @method JenisBantuanQuery groupByCreateDate() Group by the create_date column
 * @method JenisBantuanQuery groupByLastUpdate() Group by the last_update column
 * @method JenisBantuanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisBantuanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisBantuanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisBantuanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisBantuanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisBantuanQuery leftJoinBantuanPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the BantuanPd relation
 * @method JenisBantuanQuery rightJoinBantuanPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BantuanPd relation
 * @method JenisBantuanQuery innerJoinBantuanPd($relationAlias = null) Adds a INNER JOIN clause to the query using the BantuanPd relation
 *
 * @method JenisBantuanQuery leftJoinBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the Blockgrant relation
 * @method JenisBantuanQuery rightJoinBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Blockgrant relation
 * @method JenisBantuanQuery innerJoinBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the Blockgrant relation
 *
 * @method JenisBantuan findOne(PropelPDO $con = null) Return the first JenisBantuan matching the query
 * @method JenisBantuan findOneOrCreate(PropelPDO $con = null) Return the first JenisBantuan matching the query, or a new JenisBantuan object populated from the query conditions when no match is found
 *
 * @method JenisBantuan findOneByNama(string $nama) Return the first JenisBantuan filtered by the nama column
 * @method JenisBantuan findOneByUntukSekolah(string $untuk_sekolah) Return the first JenisBantuan filtered by the untuk_sekolah column
 * @method JenisBantuan findOneByUntukPd(string $untuk_pd) Return the first JenisBantuan filtered by the untuk_pd column
 * @method JenisBantuan findOneByCreateDate(string $create_date) Return the first JenisBantuan filtered by the create_date column
 * @method JenisBantuan findOneByLastUpdate(string $last_update) Return the first JenisBantuan filtered by the last_update column
 * @method JenisBantuan findOneByExpiredDate(string $expired_date) Return the first JenisBantuan filtered by the expired_date column
 * @method JenisBantuan findOneByLastSync(string $last_sync) Return the first JenisBantuan filtered by the last_sync column
 *
 * @method array findByJenisBantuanId(int $jenis_bantuan_id) Return JenisBantuan objects filtered by the jenis_bantuan_id column
 * @method array findByNama(string $nama) Return JenisBantuan objects filtered by the nama column
 * @method array findByUntukSekolah(string $untuk_sekolah) Return JenisBantuan objects filtered by the untuk_sekolah column
 * @method array findByUntukPd(string $untuk_pd) Return JenisBantuan objects filtered by the untuk_pd column
 * @method array findByCreateDate(string $create_date) Return JenisBantuan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisBantuan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisBantuan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisBantuan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisBantuanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisBantuanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisBantuan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisBantuanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisBantuanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisBantuanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisBantuanQuery) {
            return $criteria;
        }
        $query = new JenisBantuanQuery();
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
     * @return   JenisBantuan|JenisBantuan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisBantuanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisBantuanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisBantuan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisBantuanId($key, $con = null)
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
     * @return                 JenisBantuan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_bantuan_id", "nama", "untuk_sekolah", "untuk_pd", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_bantuan" WHERE "jenis_bantuan_id" = :p0';
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
            $obj = new JenisBantuan();
            $obj->hydrate($row);
            JenisBantuanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisBantuan|JenisBantuan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisBantuan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_bantuan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisBantuanId(1234); // WHERE jenis_bantuan_id = 1234
     * $query->filterByJenisBantuanId(array(12, 34)); // WHERE jenis_bantuan_id IN (12, 34)
     * $query->filterByJenisBantuanId(array('min' => 12)); // WHERE jenis_bantuan_id >= 12
     * $query->filterByJenisBantuanId(array('max' => 12)); // WHERE jenis_bantuan_id <= 12
     * </code>
     *
     * @param     mixed $jenisBantuanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByJenisBantuanId($jenisBantuanId = null, $comparison = null)
    {
        if (is_array($jenisBantuanId)) {
            $useMinMax = false;
            if (isset($jenisBantuanId['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $jenisBantuanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBantuanId['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $jenisBantuanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $jenisBantuanId, $comparison);
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
     * @return JenisBantuanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisBantuanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the untuk_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSekolah(1234); // WHERE untuk_sekolah = 1234
     * $query->filterByUntukSekolah(array(12, 34)); // WHERE untuk_sekolah IN (12, 34)
     * $query->filterByUntukSekolah(array('min' => 12)); // WHERE untuk_sekolah >= 12
     * $query->filterByUntukSekolah(array('max' => 12)); // WHERE untuk_sekolah <= 12
     * </code>
     *
     * @param     mixed $untukSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByUntukSekolah($untukSekolah = null, $comparison = null)
    {
        if (is_array($untukSekolah)) {
            $useMinMax = false;
            if (isset($untukSekolah['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::UNTUK_SEKOLAH, $untukSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSekolah['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::UNTUK_SEKOLAH, $untukSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::UNTUK_SEKOLAH, $untukSekolah, $comparison);
    }

    /**
     * Filter the query on the untuk_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPd(1234); // WHERE untuk_pd = 1234
     * $query->filterByUntukPd(array(12, 34)); // WHERE untuk_pd IN (12, 34)
     * $query->filterByUntukPd(array('min' => 12)); // WHERE untuk_pd >= 12
     * $query->filterByUntukPd(array('max' => 12)); // WHERE untuk_pd <= 12
     * </code>
     *
     * @param     mixed $untukPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByUntukPd($untukPd = null, $comparison = null)
    {
        if (is_array($untukPd)) {
            $useMinMax = false;
            if (isset($untukPd['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::UNTUK_PD, $untukPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPd['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::UNTUK_PD, $untukPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::UNTUK_PD, $untukPd, $comparison);
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
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisBantuanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisBantuanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisBantuanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related BantuanPd object
     *
     * @param   BantuanPd|PropelObjectCollection $bantuanPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisBantuanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBantuanPd($bantuanPd, $comparison = null)
    {
        if ($bantuanPd instanceof BantuanPd) {
            return $this
                ->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $bantuanPd->getJenisBantuanId(), $comparison);
        } elseif ($bantuanPd instanceof PropelObjectCollection) {
            return $this
                ->useBantuanPdQuery()
                ->filterByPrimaryKeys($bantuanPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBantuanPd() only accepts arguments of type BantuanPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BantuanPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function joinBantuanPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BantuanPd');

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
            $this->addJoinObject($join, 'BantuanPd');
        }

        return $this;
    }

    /**
     * Use the BantuanPd relation BantuanPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BantuanPdQuery A secondary query class using the current class as primary query
     */
    public function useBantuanPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBantuanPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BantuanPd', '\DataDikdas\Model\BantuanPdQuery');
    }

    /**
     * Filter the query by a related Blockgrant object
     *
     * @param   Blockgrant|PropelObjectCollection $blockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisBantuanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBlockgrant($blockgrant, $comparison = null)
    {
        if ($blockgrant instanceof Blockgrant) {
            return $this
                ->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $blockgrant->getJenisBantuanId(), $comparison);
        } elseif ($blockgrant instanceof PropelObjectCollection) {
            return $this
                ->useBlockgrantQuery()
                ->filterByPrimaryKeys($blockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBlockgrant() only accepts arguments of type Blockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Blockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function joinBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Blockgrant');

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
            $this->addJoinObject($join, 'Blockgrant');
        }

        return $this;
    }

    /**
     * Use the Blockgrant relation Blockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Blockgrant', '\DataDikdas\Model\BlockgrantQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisBantuan $jenisBantuan Object to remove from the list of results
     *
     * @return JenisBantuanQuery The current query, for fluid interface
     */
    public function prune($jenisBantuan = null)
    {
        if ($jenisBantuan) {
            $this->addUsingAlias(JenisBantuanPeer::JENIS_BANTUAN_ID, $jenisBantuan->getJenisBantuanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
