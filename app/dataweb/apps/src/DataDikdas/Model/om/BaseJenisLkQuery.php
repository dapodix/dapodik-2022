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
use DataDikdas\Model\JenisLk;
use DataDikdas\Model\JenisLkPeer;
use DataDikdas\Model\JenisLkQuery;
use DataDikdas\Model\LayananKhusus;

/**
 * Base class that represents a query for the 'ref.jenis_lk' table.
 *
 * 
 *
 * @method JenisLkQuery orderByIdJenisLk($order = Criteria::ASC) Order by the id_jenis_lk column
 * @method JenisLkQuery orderByNmJenisLk($order = Criteria::ASC) Order by the nm_jenis_lk column
 * @method JenisLkQuery orderByKetJenisLk($order = Criteria::ASC) Order by the ket_jenis_lk column
 * @method JenisLkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisLkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisLkQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisLkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisLkQuery groupByIdJenisLk() Group by the id_jenis_lk column
 * @method JenisLkQuery groupByNmJenisLk() Group by the nm_jenis_lk column
 * @method JenisLkQuery groupByKetJenisLk() Group by the ket_jenis_lk column
 * @method JenisLkQuery groupByCreateDate() Group by the create_date column
 * @method JenisLkQuery groupByLastUpdate() Group by the last_update column
 * @method JenisLkQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisLkQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisLkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisLkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisLkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisLkQuery leftJoinLayananKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the LayananKhusus relation
 * @method JenisLkQuery rightJoinLayananKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LayananKhusus relation
 * @method JenisLkQuery innerJoinLayananKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the LayananKhusus relation
 *
 * @method JenisLk findOne(PropelPDO $con = null) Return the first JenisLk matching the query
 * @method JenisLk findOneOrCreate(PropelPDO $con = null) Return the first JenisLk matching the query, or a new JenisLk object populated from the query conditions when no match is found
 *
 * @method JenisLk findOneByNmJenisLk(string $nm_jenis_lk) Return the first JenisLk filtered by the nm_jenis_lk column
 * @method JenisLk findOneByKetJenisLk(string $ket_jenis_lk) Return the first JenisLk filtered by the ket_jenis_lk column
 * @method JenisLk findOneByCreateDate(string $create_date) Return the first JenisLk filtered by the create_date column
 * @method JenisLk findOneByLastUpdate(string $last_update) Return the first JenisLk filtered by the last_update column
 * @method JenisLk findOneByExpiredDate(string $expired_date) Return the first JenisLk filtered by the expired_date column
 * @method JenisLk findOneByLastSync(string $last_sync) Return the first JenisLk filtered by the last_sync column
 *
 * @method array findByIdJenisLk(string $id_jenis_lk) Return JenisLk objects filtered by the id_jenis_lk column
 * @method array findByNmJenisLk(string $nm_jenis_lk) Return JenisLk objects filtered by the nm_jenis_lk column
 * @method array findByKetJenisLk(string $ket_jenis_lk) Return JenisLk objects filtered by the ket_jenis_lk column
 * @method array findByCreateDate(string $create_date) Return JenisLk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisLk objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisLk objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisLk objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisLkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisLkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisLk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisLkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisLkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisLkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisLkQuery) {
            return $criteria;
        }
        $query = new JenisLkQuery();
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
     * @return   JenisLk|JenisLk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisLkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisLkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisLk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJenisLk($key, $con = null)
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
     * @return                 JenisLk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jenis_lk", "nm_jenis_lk", "ket_jenis_lk", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_lk" WHERE "id_jenis_lk" = :p0';
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
            $obj = new JenisLk();
            $obj->hydrate($row);
            JenisLkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisLk|JenisLk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisLk[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisLkPeer::ID_JENIS_LK, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisLkPeer::ID_JENIS_LK, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jenis_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJenisLk('fooValue');   // WHERE id_jenis_lk = 'fooValue'
     * $query->filterByIdJenisLk('%fooValue%'); // WHERE id_jenis_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idJenisLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByIdJenisLk($idJenisLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idJenisLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idJenisLk)) {
                $idJenisLk = str_replace('*', '%', $idJenisLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::ID_JENIS_LK, $idJenisLk, $comparison);
    }

    /**
     * Filter the query on the nm_jenis_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJenisLk('fooValue');   // WHERE nm_jenis_lk = 'fooValue'
     * $query->filterByNmJenisLk('%fooValue%'); // WHERE nm_jenis_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJenisLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByNmJenisLk($nmJenisLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJenisLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJenisLk)) {
                $nmJenisLk = str_replace('*', '%', $nmJenisLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::NM_JENIS_LK, $nmJenisLk, $comparison);
    }

    /**
     * Filter the query on the ket_jenis_lk column
     *
     * Example usage:
     * <code>
     * $query->filterByKetJenisLk('fooValue');   // WHERE ket_jenis_lk = 'fooValue'
     * $query->filterByKetJenisLk('%fooValue%'); // WHERE ket_jenis_lk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketJenisLk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByKetJenisLk($ketJenisLk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketJenisLk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketJenisLk)) {
                $ketJenisLk = str_replace('*', '%', $ketJenisLk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::KET_JENIS_LK, $ketJenisLk, $comparison);
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
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisLkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisLkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisLkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisLkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisLkPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisLkPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisLkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisLkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisLkPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related LayananKhusus object
     *
     * @param   LayananKhusus|PropelObjectCollection $layananKhusus  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisLkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLayananKhusus($layananKhusus, $comparison = null)
    {
        if ($layananKhusus instanceof LayananKhusus) {
            return $this
                ->addUsingAlias(JenisLkPeer::ID_JENIS_LK, $layananKhusus->getIdJenisLk(), $comparison);
        } elseif ($layananKhusus instanceof PropelObjectCollection) {
            return $this
                ->useLayananKhususQuery()
                ->filterByPrimaryKeys($layananKhusus->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByLayananKhusus() only accepts arguments of type LayananKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LayananKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function joinLayananKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LayananKhusus');

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
            $this->addJoinObject($join, 'LayananKhusus');
        }

        return $this;
    }

    /**
     * Use the LayananKhusus relation LayananKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LayananKhususQuery A secondary query class using the current class as primary query
     */
    public function useLayananKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLayananKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LayananKhusus', '\DataDikdas\Model\LayananKhususQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisLk $jenisLk Object to remove from the list of results
     *
     * @return JenisLkQuery The current query, for fluid interface
     */
    public function prune($jenisLk = null)
    {
        if ($jenisLk) {
            $this->addUsingAlias(JenisLkPeer::ID_JENIS_LK, $jenisLk->getIdJenisLk(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
