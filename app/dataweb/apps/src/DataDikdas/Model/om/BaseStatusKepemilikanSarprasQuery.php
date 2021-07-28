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
use DataDikdas\Model\Alat;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\StatusKepemilikanSarprasPeer;
use DataDikdas\Model\StatusKepemilikanSarprasQuery;
use DataDikdas\Model\Tanah;

/**
 * Base class that represents a query for the 'ref.status_kepemilikan_sarpras' table.
 *
 * 
 *
 * @method StatusKepemilikanSarprasQuery orderByKepemilikanSarprasId($order = Criteria::ASC) Order by the kepemilikan_sarpras_id column
 * @method StatusKepemilikanSarprasQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method StatusKepemilikanSarprasQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method StatusKepemilikanSarprasQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method StatusKepemilikanSarprasQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method StatusKepemilikanSarprasQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method StatusKepemilikanSarprasQuery groupByKepemilikanSarprasId() Group by the kepemilikan_sarpras_id column
 * @method StatusKepemilikanSarprasQuery groupByNama() Group by the nama column
 * @method StatusKepemilikanSarprasQuery groupByCreateDate() Group by the create_date column
 * @method StatusKepemilikanSarprasQuery groupByLastUpdate() Group by the last_update column
 * @method StatusKepemilikanSarprasQuery groupByExpiredDate() Group by the expired_date column
 * @method StatusKepemilikanSarprasQuery groupByLastSync() Group by the last_sync column
 *
 * @method StatusKepemilikanSarprasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method StatusKepemilikanSarprasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method StatusKepemilikanSarprasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method StatusKepemilikanSarprasQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method StatusKepemilikanSarprasQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method StatusKepemilikanSarprasQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method StatusKepemilikanSarprasQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method StatusKepemilikanSarprasQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method StatusKepemilikanSarprasQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method StatusKepemilikanSarprasQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method StatusKepemilikanSarprasQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method StatusKepemilikanSarprasQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method StatusKepemilikanSarprasQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method StatusKepemilikanSarprasQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method StatusKepemilikanSarprasQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method StatusKepemilikanSarpras findOne(PropelPDO $con = null) Return the first StatusKepemilikanSarpras matching the query
 * @method StatusKepemilikanSarpras findOneOrCreate(PropelPDO $con = null) Return the first StatusKepemilikanSarpras matching the query, or a new StatusKepemilikanSarpras object populated from the query conditions when no match is found
 *
 * @method StatusKepemilikanSarpras findOneByNama(string $nama) Return the first StatusKepemilikanSarpras filtered by the nama column
 * @method StatusKepemilikanSarpras findOneByCreateDate(string $create_date) Return the first StatusKepemilikanSarpras filtered by the create_date column
 * @method StatusKepemilikanSarpras findOneByLastUpdate(string $last_update) Return the first StatusKepemilikanSarpras filtered by the last_update column
 * @method StatusKepemilikanSarpras findOneByExpiredDate(string $expired_date) Return the first StatusKepemilikanSarpras filtered by the expired_date column
 * @method StatusKepemilikanSarpras findOneByLastSync(string $last_sync) Return the first StatusKepemilikanSarpras filtered by the last_sync column
 *
 * @method array findByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return StatusKepemilikanSarpras objects filtered by the kepemilikan_sarpras_id column
 * @method array findByNama(string $nama) Return StatusKepemilikanSarpras objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return StatusKepemilikanSarpras objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return StatusKepemilikanSarpras objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return StatusKepemilikanSarpras objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return StatusKepemilikanSarpras objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseStatusKepemilikanSarprasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseStatusKepemilikanSarprasQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\StatusKepemilikanSarpras', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new StatusKepemilikanSarprasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   StatusKepemilikanSarprasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return StatusKepemilikanSarprasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof StatusKepemilikanSarprasQuery) {
            return $criteria;
        }
        $query = new StatusKepemilikanSarprasQuery();
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
     * @return   StatusKepemilikanSarpras|StatusKepemilikanSarpras[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = StatusKepemilikanSarprasPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(StatusKepemilikanSarprasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 StatusKepemilikanSarpras A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKepemilikanSarprasId($key, $con = null)
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
     * @return                 StatusKepemilikanSarpras A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kepemilikan_sarpras_id", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."status_kepemilikan_sarpras" WHERE "kepemilikan_sarpras_id" = :p0';
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
            $obj = new StatusKepemilikanSarpras();
            $obj->hydrate($row);
            StatusKepemilikanSarprasPeer::addInstanceToPool($obj, (string) $key);
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
     * @return StatusKepemilikanSarpras|StatusKepemilikanSarpras[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|StatusKepemilikanSarpras[]|mixed the list of results, formatted by the current formatter
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the kepemilikan_sarpras_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKepemilikanSarprasId(1234); // WHERE kepemilikan_sarpras_id = 1234
     * $query->filterByKepemilikanSarprasId(array(12, 34)); // WHERE kepemilikan_sarpras_id IN (12, 34)
     * $query->filterByKepemilikanSarprasId(array('min' => 12)); // WHERE kepemilikan_sarpras_id >= 12
     * $query->filterByKepemilikanSarprasId(array('max' => 12)); // WHERE kepemilikan_sarpras_id <= 12
     * </code>
     *
     * @param     mixed $kepemilikanSarprasId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByKepemilikanSarprasId($kepemilikanSarprasId = null, $comparison = null)
    {
        if (is_array($kepemilikanSarprasId)) {
            $useMinMax = false;
            if (isset($kepemilikanSarprasId['min'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepemilikanSarprasId['max'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId, $comparison);
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
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

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::NAMA, $nama, $comparison);
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(StatusKepemilikanSarprasPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StatusKepemilikanSarprasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $alat->getKepemilikanSarprasId(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            return $this
                ->useAlatQuery()
                ->filterByPrimaryKeys($alat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related Angkutan object
     *
     * @param   Angkutan|PropelObjectCollection $angkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StatusKepemilikanSarprasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $angkutan->getKepemilikanSarprasId(), $comparison);
        } elseif ($angkutan instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanQuery()
                ->filterByPrimaryKeys($angkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutan() only accepts arguments of type Angkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Angkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Angkutan');

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
            $this->addJoinObject($join, 'Angkutan');
        }

        return $this;
    }

    /**
     * Use the Angkutan relation Angkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StatusKepemilikanSarprasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $bangunan->getKepemilikanSarprasId(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            return $this
                ->useBangunanQuery()
                ->filterByPrimaryKeys($bangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 StatusKepemilikanSarprasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $tanah->getKepemilikanSarprasId(), $comparison);
        } elseif ($tanah instanceof PropelObjectCollection) {
            return $this
                ->useTanahQuery()
                ->filterByPrimaryKeys($tanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanah() only accepts arguments of type Tanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tanah');

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
            $this->addJoinObject($join, 'Tanah');
        }

        return $this;
    }

    /**
     * Use the Tanah relation Tanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahQuery A secondary query class using the current class as primary query
     */
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   StatusKepemilikanSarpras $statusKepemilikanSarpras Object to remove from the list of results
     *
     * @return StatusKepemilikanSarprasQuery The current query, for fluid interface
     */
    public function prune($statusKepemilikanSarpras = null)
    {
        if ($statusKepemilikanSarpras) {
            $this->addUsingAlias(StatusKepemilikanSarprasPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->getKepemilikanSarprasId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
