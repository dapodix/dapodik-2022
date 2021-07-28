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
use DataDikdas\Model\JenisKs;
use DataDikdas\Model\JenisKsPeer;
use DataDikdas\Model\JenisKsQuery;
use DataDikdas\Model\Mou;

/**
 * Base class that represents a query for the 'ref.jenis_ks' table.
 *
 * 
 *
 * @method JenisKsQuery orderByIdJnsKs($order = Criteria::ASC) Order by the id_jns_ks column
 * @method JenisKsQuery orderByNmJnsKs($order = Criteria::ASC) Order by the nm_jns_ks column
 * @method JenisKsQuery orderByKetJnsKs($order = Criteria::ASC) Order by the ket_jns_ks column
 * @method JenisKsQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisKsQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisKsQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisKsQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisKsQuery groupByIdJnsKs() Group by the id_jns_ks column
 * @method JenisKsQuery groupByNmJnsKs() Group by the nm_jns_ks column
 * @method JenisKsQuery groupByKetJnsKs() Group by the ket_jns_ks column
 * @method JenisKsQuery groupByCreateDate() Group by the create_date column
 * @method JenisKsQuery groupByLastUpdate() Group by the last_update column
 * @method JenisKsQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisKsQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisKsQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisKsQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisKsQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisKsQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method JenisKsQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method JenisKsQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method JenisKs findOne(PropelPDO $con = null) Return the first JenisKs matching the query
 * @method JenisKs findOneOrCreate(PropelPDO $con = null) Return the first JenisKs matching the query, or a new JenisKs object populated from the query conditions when no match is found
 *
 * @method JenisKs findOneByNmJnsKs(string $nm_jns_ks) Return the first JenisKs filtered by the nm_jns_ks column
 * @method JenisKs findOneByKetJnsKs(string $ket_jns_ks) Return the first JenisKs filtered by the ket_jns_ks column
 * @method JenisKs findOneByCreateDate(string $create_date) Return the first JenisKs filtered by the create_date column
 * @method JenisKs findOneByLastUpdate(string $last_update) Return the first JenisKs filtered by the last_update column
 * @method JenisKs findOneByExpiredDate(string $expired_date) Return the first JenisKs filtered by the expired_date column
 * @method JenisKs findOneByLastSync(string $last_sync) Return the first JenisKs filtered by the last_sync column
 *
 * @method array findByIdJnsKs(string $id_jns_ks) Return JenisKs objects filtered by the id_jns_ks column
 * @method array findByNmJnsKs(string $nm_jns_ks) Return JenisKs objects filtered by the nm_jns_ks column
 * @method array findByKetJnsKs(string $ket_jns_ks) Return JenisKs objects filtered by the ket_jns_ks column
 * @method array findByCreateDate(string $create_date) Return JenisKs objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisKs objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisKs objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisKs objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisKsQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisKsQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisKs', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisKsQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisKsQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisKsQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisKsQuery) {
            return $criteria;
        }
        $query = new JenisKsQuery();
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
     * @return   JenisKs|JenisKs[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisKsPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisKsPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisKs A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJnsKs($key, $con = null)
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
     * @return                 JenisKs A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jns_ks", "nm_jns_ks", "ket_jns_ks", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_ks" WHERE "id_jns_ks" = :p0';
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
            $obj = new JenisKs();
            $obj->hydrate($row);
            JenisKsPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisKs|JenisKs[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisKs[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jns_ks column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsKs(1234); // WHERE id_jns_ks = 1234
     * $query->filterByIdJnsKs(array(12, 34)); // WHERE id_jns_ks IN (12, 34)
     * $query->filterByIdJnsKs(array('min' => 12)); // WHERE id_jns_ks >= 12
     * $query->filterByIdJnsKs(array('max' => 12)); // WHERE id_jns_ks <= 12
     * </code>
     *
     * @param     mixed $idJnsKs The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByIdJnsKs($idJnsKs = null, $comparison = null)
    {
        if (is_array($idJnsKs)) {
            $useMinMax = false;
            if (isset($idJnsKs['min'])) {
                $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $idJnsKs['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsKs['max'])) {
                $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $idJnsKs['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $idJnsKs, $comparison);
    }

    /**
     * Filter the query on the nm_jns_ks column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJnsKs('fooValue');   // WHERE nm_jns_ks = 'fooValue'
     * $query->filterByNmJnsKs('%fooValue%'); // WHERE nm_jns_ks LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJnsKs The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByNmJnsKs($nmJnsKs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJnsKs)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJnsKs)) {
                $nmJnsKs = str_replace('*', '%', $nmJnsKs);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::NM_JNS_KS, $nmJnsKs, $comparison);
    }

    /**
     * Filter the query on the ket_jns_ks column
     *
     * Example usage:
     * <code>
     * $query->filterByKetJnsKs('fooValue');   // WHERE ket_jns_ks = 'fooValue'
     * $query->filterByKetJnsKs('%fooValue%'); // WHERE ket_jns_ks LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketJnsKs The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByKetJnsKs($ketJnsKs = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketJnsKs)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketJnsKs)) {
                $ketJnsKs = str_replace('*', '%', $ketJnsKs);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::KET_JNS_KS, $ketJnsKs, $comparison);
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
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisKsPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisKsPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisKsPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisKsPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisKsPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisKsPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisKsPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisKsPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKsPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKsQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(JenisKsPeer::ID_JNS_KS, $mou->getIdJnsKs(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            return $this
                ->useMouQuery()
                ->filterByPrimaryKeys($mou->getPrimaryKeys())
                ->endUse();
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
     * @return JenisKsQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   JenisKs $jenisKs Object to remove from the list of results
     *
     * @return JenisKsQuery The current query, for fluid interface
     */
    public function prune($jenisKs = null)
    {
        if ($jenisKs) {
            $this->addUsingAlias(JenisKsPeer::ID_JNS_KS, $jenisKs->getIdJnsKs(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
