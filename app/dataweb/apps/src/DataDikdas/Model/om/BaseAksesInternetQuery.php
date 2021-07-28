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
use DataDikdas\Model\AksesInternet;
use DataDikdas\Model\AksesInternetPeer;
use DataDikdas\Model\AksesInternetQuery;
use DataDikdas\Model\SekolahLongitudinal;

/**
 * Base class that represents a query for the 'ref.akses_internet' table.
 *
 * 
 *
 * @method AksesInternetQuery orderByAksesInternetId($order = Criteria::ASC) Order by the akses_internet_id column
 * @method AksesInternetQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method AksesInternetQuery orderByMedia($order = Criteria::ASC) Order by the media column
 * @method AksesInternetQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AksesInternetQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AksesInternetQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method AksesInternetQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method AksesInternetQuery groupByAksesInternetId() Group by the akses_internet_id column
 * @method AksesInternetQuery groupByNama() Group by the nama column
 * @method AksesInternetQuery groupByMedia() Group by the media column
 * @method AksesInternetQuery groupByCreateDate() Group by the create_date column
 * @method AksesInternetQuery groupByLastUpdate() Group by the last_update column
 * @method AksesInternetQuery groupByExpiredDate() Group by the expired_date column
 * @method AksesInternetQuery groupByLastSync() Group by the last_sync column
 *
 * @method AksesInternetQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AksesInternetQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AksesInternetQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AksesInternetQuery leftJoinSekolahLongitudinalRelatedByAksesInternetId($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternetId relation
 * @method AksesInternetQuery rightJoinSekolahLongitudinalRelatedByAksesInternetId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternetId relation
 * @method AksesInternetQuery innerJoinSekolahLongitudinalRelatedByAksesInternetId($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternetId relation
 *
 * @method AksesInternetQuery leftJoinSekolahLongitudinalRelatedByAksesInternet2Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternet2Id relation
 * @method AksesInternetQuery rightJoinSekolahLongitudinalRelatedByAksesInternet2Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternet2Id relation
 * @method AksesInternetQuery innerJoinSekolahLongitudinalRelatedByAksesInternet2Id($relationAlias = null) Adds a INNER JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternet2Id relation
 *
 * @method AksesInternet findOne(PropelPDO $con = null) Return the first AksesInternet matching the query
 * @method AksesInternet findOneOrCreate(PropelPDO $con = null) Return the first AksesInternet matching the query, or a new AksesInternet object populated from the query conditions when no match is found
 *
 * @method AksesInternet findOneByNama(string $nama) Return the first AksesInternet filtered by the nama column
 * @method AksesInternet findOneByMedia(string $media) Return the first AksesInternet filtered by the media column
 * @method AksesInternet findOneByCreateDate(string $create_date) Return the first AksesInternet filtered by the create_date column
 * @method AksesInternet findOneByLastUpdate(string $last_update) Return the first AksesInternet filtered by the last_update column
 * @method AksesInternet findOneByExpiredDate(string $expired_date) Return the first AksesInternet filtered by the expired_date column
 * @method AksesInternet findOneByLastSync(string $last_sync) Return the first AksesInternet filtered by the last_sync column
 *
 * @method array findByAksesInternetId(int $akses_internet_id) Return AksesInternet objects filtered by the akses_internet_id column
 * @method array findByNama(string $nama) Return AksesInternet objects filtered by the nama column
 * @method array findByMedia(string $media) Return AksesInternet objects filtered by the media column
 * @method array findByCreateDate(string $create_date) Return AksesInternet objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AksesInternet objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return AksesInternet objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return AksesInternet objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAksesInternetQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAksesInternetQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AksesInternet', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AksesInternetQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AksesInternetQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AksesInternetQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AksesInternetQuery) {
            return $criteria;
        }
        $query = new AksesInternetQuery();
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
     * @return   AksesInternet|AksesInternet[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AksesInternetPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AksesInternetPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AksesInternet A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAksesInternetId($key, $con = null)
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
     * @return                 AksesInternet A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "akses_internet_id", "nama", "media", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."akses_internet" WHERE "akses_internet_id" = :p0';
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
            $obj = new AksesInternet();
            $obj->hydrate($row);
            AksesInternetPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AksesInternet|AksesInternet[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AksesInternet[]|mixed the list of results, formatted by the current formatter
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
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the akses_internet_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAksesInternetId(1234); // WHERE akses_internet_id = 1234
     * $query->filterByAksesInternetId(array(12, 34)); // WHERE akses_internet_id IN (12, 34)
     * $query->filterByAksesInternetId(array('min' => 12)); // WHERE akses_internet_id >= 12
     * $query->filterByAksesInternetId(array('max' => 12)); // WHERE akses_internet_id <= 12
     * </code>
     *
     * @param     mixed $aksesInternetId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByAksesInternetId($aksesInternetId = null, $comparison = null)
    {
        if (is_array($aksesInternetId)) {
            $useMinMax = false;
            if (isset($aksesInternetId['min'])) {
                $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $aksesInternetId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aksesInternetId['max'])) {
                $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $aksesInternetId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $aksesInternetId, $comparison);
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
     * @return AksesInternetQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AksesInternetPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the media column
     *
     * Example usage:
     * <code>
     * $query->filterByMedia(1234); // WHERE media = 1234
     * $query->filterByMedia(array(12, 34)); // WHERE media IN (12, 34)
     * $query->filterByMedia(array('min' => 12)); // WHERE media >= 12
     * $query->filterByMedia(array('max' => 12)); // WHERE media <= 12
     * </code>
     *
     * @param     mixed $media The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByMedia($media = null, $comparison = null)
    {
        if (is_array($media)) {
            $useMinMax = false;
            if (isset($media['min'])) {
                $this->addUsingAlias(AksesInternetPeer::MEDIA, $media['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($media['max'])) {
                $this->addUsingAlias(AksesInternetPeer::MEDIA, $media['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::MEDIA, $media, $comparison);
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
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AksesInternetPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AksesInternetPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AksesInternetPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AksesInternetPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(AksesInternetPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(AksesInternetPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AksesInternetPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AksesInternetPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AksesInternetPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related SekolahLongitudinal object
     *
     * @param   SekolahLongitudinal|PropelObjectCollection $sekolahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AksesInternetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahLongitudinalRelatedByAksesInternetId($sekolahLongitudinal, $comparison = null)
    {
        if ($sekolahLongitudinal instanceof SekolahLongitudinal) {
            return $this
                ->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $sekolahLongitudinal->getAksesInternetId(), $comparison);
        } elseif ($sekolahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useSekolahLongitudinalRelatedByAksesInternetIdQuery()
                ->filterByPrimaryKeys($sekolahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahLongitudinalRelatedByAksesInternetId() only accepts arguments of type SekolahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternetId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function joinSekolahLongitudinalRelatedByAksesInternetId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahLongitudinalRelatedByAksesInternetId');

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
            $this->addJoinObject($join, 'SekolahLongitudinalRelatedByAksesInternetId');
        }

        return $this;
    }

    /**
     * Use the SekolahLongitudinalRelatedByAksesInternetId relation SekolahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useSekolahLongitudinalRelatedByAksesInternetIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinSekolahLongitudinalRelatedByAksesInternetId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahLongitudinalRelatedByAksesInternetId', '\DataDikdas\Model\SekolahLongitudinalQuery');
    }

    /**
     * Filter the query by a related SekolahLongitudinal object
     *
     * @param   SekolahLongitudinal|PropelObjectCollection $sekolahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AksesInternetQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolahLongitudinalRelatedByAksesInternet2Id($sekolahLongitudinal, $comparison = null)
    {
        if ($sekolahLongitudinal instanceof SekolahLongitudinal) {
            return $this
                ->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $sekolahLongitudinal->getAksesInternet2Id(), $comparison);
        } elseif ($sekolahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useSekolahLongitudinalRelatedByAksesInternet2IdQuery()
                ->filterByPrimaryKeys($sekolahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySekolahLongitudinalRelatedByAksesInternet2Id() only accepts arguments of type SekolahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SekolahLongitudinalRelatedByAksesInternet2Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function joinSekolahLongitudinalRelatedByAksesInternet2Id($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SekolahLongitudinalRelatedByAksesInternet2Id');

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
            $this->addJoinObject($join, 'SekolahLongitudinalRelatedByAksesInternet2Id');
        }

        return $this;
    }

    /**
     * Use the SekolahLongitudinalRelatedByAksesInternet2Id relation SekolahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useSekolahLongitudinalRelatedByAksesInternet2IdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolahLongitudinalRelatedByAksesInternet2Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SekolahLongitudinalRelatedByAksesInternet2Id', '\DataDikdas\Model\SekolahLongitudinalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AksesInternet $aksesInternet Object to remove from the list of results
     *
     * @return AksesInternetQuery The current query, for fluid interface
     */
    public function prune($aksesInternet = null)
    {
        if ($aksesInternet) {
            $this->addUsingAlias(AksesInternetPeer::AKSES_INTERNET_ID, $aksesInternet->getAksesInternetId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
