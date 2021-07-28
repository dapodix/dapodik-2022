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
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\TemplateRapor;
use DataDikdas\Model\TemplateRaporPeer;
use DataDikdas\Model\TemplateRaporQuery;
use DataDikdas\Model\TemplateUn;

/**
 * Base class that represents a query for the 'ref.template_rapor' table.
 *
 * 
 *
 * @method TemplateRaporQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method TemplateRaporQuery orderByMataPelajaranId($order = Criteria::ASC) Order by the mata_pelajaran_id column
 * @method TemplateRaporQuery orderByNoUrut($order = Criteria::ASC) Order by the no_urut column
 * @method TemplateRaporQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TemplateRaporQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TemplateRaporQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TemplateRaporQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TemplateRaporQuery groupByTemplateId() Group by the template_id column
 * @method TemplateRaporQuery groupByMataPelajaranId() Group by the mata_pelajaran_id column
 * @method TemplateRaporQuery groupByNoUrut() Group by the no_urut column
 * @method TemplateRaporQuery groupByCreateDate() Group by the create_date column
 * @method TemplateRaporQuery groupByLastUpdate() Group by the last_update column
 * @method TemplateRaporQuery groupByExpiredDate() Group by the expired_date column
 * @method TemplateRaporQuery groupByLastSync() Group by the last_sync column
 *
 * @method TemplateRaporQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TemplateRaporQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TemplateRaporQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TemplateRaporQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method TemplateRaporQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method TemplateRaporQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method TemplateRaporQuery leftJoinTemplateUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUn relation
 * @method TemplateRaporQuery rightJoinTemplateUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUn relation
 * @method TemplateRaporQuery innerJoinTemplateUn($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUn relation
 *
 * @method TemplateRapor findOne(PropelPDO $con = null) Return the first TemplateRapor matching the query
 * @method TemplateRapor findOneOrCreate(PropelPDO $con = null) Return the first TemplateRapor matching the query, or a new TemplateRapor object populated from the query conditions when no match is found
 *
 * @method TemplateRapor findOneByTemplateId(string $template_id) Return the first TemplateRapor filtered by the template_id column
 * @method TemplateRapor findOneByMataPelajaranId(int $mata_pelajaran_id) Return the first TemplateRapor filtered by the mata_pelajaran_id column
 * @method TemplateRapor findOneByNoUrut(string $no_urut) Return the first TemplateRapor filtered by the no_urut column
 * @method TemplateRapor findOneByCreateDate(string $create_date) Return the first TemplateRapor filtered by the create_date column
 * @method TemplateRapor findOneByLastUpdate(string $last_update) Return the first TemplateRapor filtered by the last_update column
 * @method TemplateRapor findOneByExpiredDate(string $expired_date) Return the first TemplateRapor filtered by the expired_date column
 * @method TemplateRapor findOneByLastSync(string $last_sync) Return the first TemplateRapor filtered by the last_sync column
 *
 * @method array findByTemplateId(string $template_id) Return TemplateRapor objects filtered by the template_id column
 * @method array findByMataPelajaranId(int $mata_pelajaran_id) Return TemplateRapor objects filtered by the mata_pelajaran_id column
 * @method array findByNoUrut(string $no_urut) Return TemplateRapor objects filtered by the no_urut column
 * @method array findByCreateDate(string $create_date) Return TemplateRapor objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TemplateRapor objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TemplateRapor objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TemplateRapor objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTemplateRaporQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTemplateRaporQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TemplateRapor', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TemplateRaporQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TemplateRaporQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TemplateRaporQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TemplateRaporQuery) {
            return $criteria;
        }
        $query = new TemplateRaporQuery();
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
                         A Primary key composition: [$template_id, $mata_pelajaran_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   TemplateRapor|TemplateRapor[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TemplateRaporPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TemplateRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TemplateRapor A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "template_id", "mata_pelajaran_id", "no_urut", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."template_rapor" WHERE "template_id" = :p0 AND "mata_pelajaran_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new TemplateRapor();
            $obj->hydrate($row);
            TemplateRaporPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return TemplateRapor|TemplateRapor[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TemplateRapor[]|mixed the list of results, formatted by the current formatter
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
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(TemplateRaporPeer::TEMPLATE_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(TemplateRaporPeer::TEMPLATE_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(TemplateRaporPeer::MATA_PELAJARAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the template_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateId('fooValue');   // WHERE template_id = 'fooValue'
     * $query->filterByTemplateId('%fooValue%'); // WHERE template_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $templateId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByTemplateId($templateId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($templateId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $templateId)) {
                $templateId = str_replace('*', '%', $templateId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::TEMPLATE_ID, $templateId, $comparison);
    }

    /**
     * Filter the query on the mata_pelajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMataPelajaranId(1234); // WHERE mata_pelajaran_id = 1234
     * $query->filterByMataPelajaranId(array(12, 34)); // WHERE mata_pelajaran_id IN (12, 34)
     * $query->filterByMataPelajaranId(array('min' => 12)); // WHERE mata_pelajaran_id >= 12
     * $query->filterByMataPelajaranId(array('max' => 12)); // WHERE mata_pelajaran_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaran()
     *
     * @param     mixed $mataPelajaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByMataPelajaranId($mataPelajaranId = null, $comparison = null)
    {
        if (is_array($mataPelajaranId)) {
            $useMinMax = false;
            if (isset($mataPelajaranId['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mataPelajaranId['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $mataPelajaranId, $comparison);
    }

    /**
     * Filter the query on the no_urut column
     *
     * Example usage:
     * <code>
     * $query->filterByNoUrut(1234); // WHERE no_urut = 1234
     * $query->filterByNoUrut(array(12, 34)); // WHERE no_urut IN (12, 34)
     * $query->filterByNoUrut(array('min' => 12)); // WHERE no_urut >= 12
     * $query->filterByNoUrut(array('max' => 12)); // WHERE no_urut <= 12
     * </code>
     *
     * @param     mixed $noUrut The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByNoUrut($noUrut = null, $comparison = null)
    {
        if (is_array($noUrut)) {
            $useMinMax = false;
            if (isset($noUrut['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::NO_URUT, $noUrut['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($noUrut['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::NO_URUT, $noUrut['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::NO_URUT, $noUrut, $comparison);
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
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TemplateRaporPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TemplateRaporPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateRaporPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateRaporPeer::MATA_PELAJARAN_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateRaporQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUn($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(TemplateRaporPeer::TEMPLATE_ID, $templateUn->getTemplateId(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateRaporPeer::TEMPLATE_ID, $templateUn->toKeyValue('PrimaryKey', 'TemplateId'), $comparison);
        } else {
            throw new PropelException('filterByTemplateUn() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUn relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function joinTemplateUn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUn');

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
            $this->addJoinObject($join, 'TemplateUn');
        }

        return $this;
    }

    /**
     * Use the TemplateUn relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemplateUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUn', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TemplateRapor $templateRapor Object to remove from the list of results
     *
     * @return TemplateRaporQuery The current query, for fluid interface
     */
    public function prune($templateRapor = null)
    {
        if ($templateRapor) {
            $this->addCond('pruneCond0', $this->getAliasedColName(TemplateRaporPeer::TEMPLATE_ID), $templateRapor->getTemplateId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(TemplateRaporPeer::MATA_PELAJARAN_ID), $templateRapor->getMataPelajaranId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
