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
use DataDikdas\Model\JurusanKerjasama;
use DataDikdas\Model\JurusanKerjasamaPeer;
use DataDikdas\Model\JurusanKerjasamaQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\Mou;

/**
 * Base class that represents a query for the 'jurusan_kerjasama' table.
 *
 * 
 *
 * @method JurusanKerjasamaQuery orderByMouId($order = Criteria::ASC) Order by the mou_id column
 * @method JurusanKerjasamaQuery orderByJurusanSpId($order = Criteria::ASC) Order by the jurusan_sp_id column
 * @method JurusanKerjasamaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JurusanKerjasamaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JurusanKerjasamaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method JurusanKerjasamaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method JurusanKerjasamaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method JurusanKerjasamaQuery groupByMouId() Group by the mou_id column
 * @method JurusanKerjasamaQuery groupByJurusanSpId() Group by the jurusan_sp_id column
 * @method JurusanKerjasamaQuery groupByCreateDate() Group by the create_date column
 * @method JurusanKerjasamaQuery groupByLastUpdate() Group by the last_update column
 * @method JurusanKerjasamaQuery groupBySoftDelete() Group by the soft_delete column
 * @method JurusanKerjasamaQuery groupByLastSync() Group by the last_sync column
 * @method JurusanKerjasamaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method JurusanKerjasamaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JurusanKerjasamaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JurusanKerjasamaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JurusanKerjasamaQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method JurusanKerjasamaQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method JurusanKerjasamaQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method JurusanKerjasamaQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method JurusanKerjasamaQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method JurusanKerjasamaQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method JurusanKerjasama findOne(PropelPDO $con = null) Return the first JurusanKerjasama matching the query
 * @method JurusanKerjasama findOneOrCreate(PropelPDO $con = null) Return the first JurusanKerjasama matching the query, or a new JurusanKerjasama object populated from the query conditions when no match is found
 *
 * @method JurusanKerjasama findOneByMouId(string $mou_id) Return the first JurusanKerjasama filtered by the mou_id column
 * @method JurusanKerjasama findOneByJurusanSpId(string $jurusan_sp_id) Return the first JurusanKerjasama filtered by the jurusan_sp_id column
 * @method JurusanKerjasama findOneByCreateDate(string $create_date) Return the first JurusanKerjasama filtered by the create_date column
 * @method JurusanKerjasama findOneByLastUpdate(string $last_update) Return the first JurusanKerjasama filtered by the last_update column
 * @method JurusanKerjasama findOneBySoftDelete(string $soft_delete) Return the first JurusanKerjasama filtered by the soft_delete column
 * @method JurusanKerjasama findOneByLastSync(string $last_sync) Return the first JurusanKerjasama filtered by the last_sync column
 * @method JurusanKerjasama findOneByUpdaterId(string $updater_id) Return the first JurusanKerjasama filtered by the updater_id column
 *
 * @method array findByMouId(string $mou_id) Return JurusanKerjasama objects filtered by the mou_id column
 * @method array findByJurusanSpId(string $jurusan_sp_id) Return JurusanKerjasama objects filtered by the jurusan_sp_id column
 * @method array findByCreateDate(string $create_date) Return JurusanKerjasama objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JurusanKerjasama objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return JurusanKerjasama objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return JurusanKerjasama objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return JurusanKerjasama objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanKerjasamaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJurusanKerjasamaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JurusanKerjasama', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JurusanKerjasamaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JurusanKerjasamaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JurusanKerjasamaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JurusanKerjasamaQuery) {
            return $criteria;
        }
        $query = new JurusanKerjasamaQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$mou_id, $jurusan_sp_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   JurusanKerjasama|JurusanKerjasama[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JurusanKerjasamaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JurusanKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 JurusanKerjasama A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "mou_id", "jurusan_sp_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "jurusan_kerjasama" WHERE "mou_id" = :p0 AND "jurusan_sp_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new JurusanKerjasama();
            $obj->hydrate($row);
            JurusanKerjasamaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return JurusanKerjasama|JurusanKerjasama[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|JurusanKerjasama[]|mixed the list of results, formatted by the current formatter
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(JurusanKerjasamaPeer::MOU_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(JurusanKerjasamaPeer::JURUSAN_SP_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(JurusanKerjasamaPeer::MOU_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(JurusanKerjasamaPeer::JURUSAN_SP_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the mou_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMouId('fooValue');   // WHERE mou_id = 'fooValue'
     * $query->filterByMouId('%fooValue%'); // WHERE mou_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mouId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByMouId($mouId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mouId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mouId)) {
                $mouId = str_replace('*', '%', $mouId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanKerjasamaPeer::MOU_ID, $mouId, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JurusanKerjasamaPeer::JURUSAN_SP_ID, $jurusanSpId, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanKerjasamaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanKerjasamaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanKerjasamaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JurusanKerjasamaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanKerjasamaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JurusanKerjasamaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanKerjasamaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(JurusanKerjasamaPeer::MOU_ID, $mou->getMouId(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanKerjasamaPeer::MOU_ID, $mou->toKeyValue('PrimaryKey', 'MouId'), $comparison);
        } else {
            throw new PropelException('filterByMou() only accepts arguments of type Mou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function joinMou($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mou');

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
            $this->addJoinObject($join, 'Mou');
        }

        return $this;
    }

    /**
     * Use the Mou relation Mou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MouQuery A secondary query class using the current class as primary query
     */
    public function useMouQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mou', '\DataDikdas\Model\MouQuery');
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanKerjasamaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(JurusanKerjasamaPeer::JURUSAN_SP_ID, $jurusanSp->getJurusanSpId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanKerjasamaPeer::JURUSAN_SP_ID, $jurusanSp->toKeyValue('PrimaryKey', 'JurusanSpId'), $comparison);
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
     * @return JurusanKerjasamaQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   JurusanKerjasama $jurusanKerjasama Object to remove from the list of results
     *
     * @return JurusanKerjasamaQuery The current query, for fluid interface
     */
    public function prune($jurusanKerjasama = null)
    {
        if ($jurusanKerjasama) {
            $this->addCond('pruneCond0', $this->getAliasedColName(JurusanKerjasamaPeer::MOU_ID), $jurusanKerjasama->getMouId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(JurusanKerjasamaPeer::JURUSAN_SP_ID), $jurusanKerjasama->getJurusanSpId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
