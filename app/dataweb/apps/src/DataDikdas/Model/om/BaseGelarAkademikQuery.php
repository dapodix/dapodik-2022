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
use DataDikdas\Model\GelarAkademik;
use DataDikdas\Model\GelarAkademikPeer;
use DataDikdas\Model\GelarAkademikQuery;
use DataDikdas\Model\RwyPendFormal;

/**
 * Base class that represents a query for the 'ref.gelar_akademik' table.
 *
 * 
 *
 * @method GelarAkademikQuery orderByGelarAkademikId($order = Criteria::ASC) Order by the gelar_akademik_id column
 * @method GelarAkademikQuery orderByKode($order = Criteria::ASC) Order by the kode column
 * @method GelarAkademikQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method GelarAkademikQuery orderByPosisiGelar($order = Criteria::ASC) Order by the posisi_gelar column
 * @method GelarAkademikQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method GelarAkademikQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method GelarAkademikQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method GelarAkademikQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method GelarAkademikQuery groupByGelarAkademikId() Group by the gelar_akademik_id column
 * @method GelarAkademikQuery groupByKode() Group by the kode column
 * @method GelarAkademikQuery groupByNama() Group by the nama column
 * @method GelarAkademikQuery groupByPosisiGelar() Group by the posisi_gelar column
 * @method GelarAkademikQuery groupByCreateDate() Group by the create_date column
 * @method GelarAkademikQuery groupByLastUpdate() Group by the last_update column
 * @method GelarAkademikQuery groupByExpiredDate() Group by the expired_date column
 * @method GelarAkademikQuery groupByLastSync() Group by the last_sync column
 *
 * @method GelarAkademikQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GelarAkademikQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GelarAkademikQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GelarAkademikQuery leftJoinRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyPendFormal relation
 * @method GelarAkademikQuery rightJoinRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyPendFormal relation
 * @method GelarAkademikQuery innerJoinRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyPendFormal relation
 *
 * @method GelarAkademik findOne(PropelPDO $con = null) Return the first GelarAkademik matching the query
 * @method GelarAkademik findOneOrCreate(PropelPDO $con = null) Return the first GelarAkademik matching the query, or a new GelarAkademik object populated from the query conditions when no match is found
 *
 * @method GelarAkademik findOneByKode(string $kode) Return the first GelarAkademik filtered by the kode column
 * @method GelarAkademik findOneByNama(string $nama) Return the first GelarAkademik filtered by the nama column
 * @method GelarAkademik findOneByPosisiGelar(string $posisi_gelar) Return the first GelarAkademik filtered by the posisi_gelar column
 * @method GelarAkademik findOneByCreateDate(string $create_date) Return the first GelarAkademik filtered by the create_date column
 * @method GelarAkademik findOneByLastUpdate(string $last_update) Return the first GelarAkademik filtered by the last_update column
 * @method GelarAkademik findOneByExpiredDate(string $expired_date) Return the first GelarAkademik filtered by the expired_date column
 * @method GelarAkademik findOneByLastSync(string $last_sync) Return the first GelarAkademik filtered by the last_sync column
 *
 * @method array findByGelarAkademikId(int $gelar_akademik_id) Return GelarAkademik objects filtered by the gelar_akademik_id column
 * @method array findByKode(string $kode) Return GelarAkademik objects filtered by the kode column
 * @method array findByNama(string $nama) Return GelarAkademik objects filtered by the nama column
 * @method array findByPosisiGelar(string $posisi_gelar) Return GelarAkademik objects filtered by the posisi_gelar column
 * @method array findByCreateDate(string $create_date) Return GelarAkademik objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return GelarAkademik objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return GelarAkademik objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return GelarAkademik objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGelarAkademikQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGelarAkademikQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\GelarAkademik', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GelarAkademikQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GelarAkademikQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GelarAkademikQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GelarAkademikQuery) {
            return $criteria;
        }
        $query = new GelarAkademikQuery();
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
     * @return   GelarAkademik|GelarAkademik[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GelarAkademikPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GelarAkademikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GelarAkademik A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByGelarAkademikId($key, $con = null)
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
     * @return                 GelarAkademik A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "gelar_akademik_id", "kode", "nama", "posisi_gelar", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."gelar_akademik" WHERE "gelar_akademik_id" = :p0';
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
            $obj = new GelarAkademik();
            $obj->hydrate($row);
            GelarAkademikPeer::addInstanceToPool($obj, (string) $key);
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
     * @return GelarAkademik|GelarAkademik[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GelarAkademik[]|mixed the list of results, formatted by the current formatter
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
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the gelar_akademik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByGelarAkademikId(1234); // WHERE gelar_akademik_id = 1234
     * $query->filterByGelarAkademikId(array(12, 34)); // WHERE gelar_akademik_id IN (12, 34)
     * $query->filterByGelarAkademikId(array('min' => 12)); // WHERE gelar_akademik_id >= 12
     * $query->filterByGelarAkademikId(array('max' => 12)); // WHERE gelar_akademik_id <= 12
     * </code>
     *
     * @param     mixed $gelarAkademikId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByGelarAkademikId($gelarAkademikId = null, $comparison = null)
    {
        if (is_array($gelarAkademikId)) {
            $useMinMax = false;
            if (isset($gelarAkademikId['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $gelarAkademikId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gelarAkademikId['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $gelarAkademikId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $gelarAkademikId, $comparison);
    }

    /**
     * Filter the query on the kode column
     *
     * Example usage:
     * <code>
     * $query->filterByKode('fooValue');   // WHERE kode = 'fooValue'
     * $query->filterByKode('%fooValue%'); // WHERE kode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByKode($kode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kode)) {
                $kode = str_replace('*', '%', $kode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::KODE, $kode, $comparison);
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
     * @return GelarAkademikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GelarAkademikPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the posisi_gelar column
     *
     * Example usage:
     * <code>
     * $query->filterByPosisiGelar(1234); // WHERE posisi_gelar = 1234
     * $query->filterByPosisiGelar(array(12, 34)); // WHERE posisi_gelar IN (12, 34)
     * $query->filterByPosisiGelar(array('min' => 12)); // WHERE posisi_gelar >= 12
     * $query->filterByPosisiGelar(array('max' => 12)); // WHERE posisi_gelar <= 12
     * </code>
     *
     * @param     mixed $posisiGelar The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByPosisiGelar($posisiGelar = null, $comparison = null)
    {
        if (is_array($posisiGelar)) {
            $useMinMax = false;
            if (isset($posisiGelar['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::POSISI_GELAR, $posisiGelar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($posisiGelar['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::POSISI_GELAR, $posisiGelar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::POSISI_GELAR, $posisiGelar, $comparison);
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
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(GelarAkademikPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(GelarAkademikPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GelarAkademikPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related RwyPendFormal object
     *
     * @param   RwyPendFormal|PropelObjectCollection $rwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GelarAkademikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyPendFormal($rwyPendFormal, $comparison = null)
    {
        if ($rwyPendFormal instanceof RwyPendFormal) {
            return $this
                ->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $rwyPendFormal->getGelarAkademikId(), $comparison);
        } elseif ($rwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useRwyPendFormalQuery()
                ->filterByPrimaryKeys($rwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyPendFormal() only accepts arguments of type RwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function joinRwyPendFormal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyPendFormal');

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
            $this->addJoinObject($join, 'RwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the RwyPendFormal relation RwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyPendFormal', '\DataDikdas\Model\RwyPendFormalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GelarAkademik $gelarAkademik Object to remove from the list of results
     *
     * @return GelarAkademikQuery The current query, for fluid interface
     */
    public function prune($gelarAkademik = null)
    {
        if ($gelarAkademik) {
            $this->addUsingAlias(GelarAkademikPeer::GELAR_AKADEMIK_ID, $gelarAkademik->getGelarAkademikId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
