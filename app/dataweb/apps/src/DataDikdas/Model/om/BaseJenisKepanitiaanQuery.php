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
use DataDikdas\Model\JenisKepanitiaan;
use DataDikdas\Model\JenisKepanitiaanPeer;
use DataDikdas\Model\JenisKepanitiaanQuery;
use DataDikdas\Model\Kepanitiaan;

/**
 * Base class that represents a query for the 'ref.jenis_kepanitiaan' table.
 *
 * 
 *
 * @method JenisKepanitiaanQuery orderByIdJnsPanitia($order = Criteria::ASC) Order by the id_jns_panitia column
 * @method JenisKepanitiaanQuery orderByNmJnsPanitia($order = Criteria::ASC) Order by the nm_jns_panitia column
 * @method JenisKepanitiaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisKepanitiaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisKepanitiaanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisKepanitiaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisKepanitiaanQuery groupByIdJnsPanitia() Group by the id_jns_panitia column
 * @method JenisKepanitiaanQuery groupByNmJnsPanitia() Group by the nm_jns_panitia column
 * @method JenisKepanitiaanQuery groupByCreateDate() Group by the create_date column
 * @method JenisKepanitiaanQuery groupByLastUpdate() Group by the last_update column
 * @method JenisKepanitiaanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisKepanitiaanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisKepanitiaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisKepanitiaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisKepanitiaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisKepanitiaanQuery leftJoinKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kepanitiaan relation
 * @method JenisKepanitiaanQuery rightJoinKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kepanitiaan relation
 * @method JenisKepanitiaanQuery innerJoinKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kepanitiaan relation
 *
 * @method JenisKepanitiaan findOne(PropelPDO $con = null) Return the first JenisKepanitiaan matching the query
 * @method JenisKepanitiaan findOneOrCreate(PropelPDO $con = null) Return the first JenisKepanitiaan matching the query, or a new JenisKepanitiaan object populated from the query conditions when no match is found
 *
 * @method JenisKepanitiaan findOneByNmJnsPanitia(string $nm_jns_panitia) Return the first JenisKepanitiaan filtered by the nm_jns_panitia column
 * @method JenisKepanitiaan findOneByCreateDate(string $create_date) Return the first JenisKepanitiaan filtered by the create_date column
 * @method JenisKepanitiaan findOneByLastUpdate(string $last_update) Return the first JenisKepanitiaan filtered by the last_update column
 * @method JenisKepanitiaan findOneByExpiredDate(string $expired_date) Return the first JenisKepanitiaan filtered by the expired_date column
 * @method JenisKepanitiaan findOneByLastSync(string $last_sync) Return the first JenisKepanitiaan filtered by the last_sync column
 *
 * @method array findByIdJnsPanitia(int $id_jns_panitia) Return JenisKepanitiaan objects filtered by the id_jns_panitia column
 * @method array findByNmJnsPanitia(string $nm_jns_panitia) Return JenisKepanitiaan objects filtered by the nm_jns_panitia column
 * @method array findByCreateDate(string $create_date) Return JenisKepanitiaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisKepanitiaan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisKepanitiaan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisKepanitiaan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisKepanitiaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisKepanitiaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisKepanitiaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisKepanitiaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisKepanitiaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisKepanitiaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisKepanitiaanQuery) {
            return $criteria;
        }
        $query = new JenisKepanitiaanQuery();
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
     * @return   JenisKepanitiaan|JenisKepanitiaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisKepanitiaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisKepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJnsPanitia($key, $con = null)
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
     * @return                 JenisKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jns_panitia", "nm_jns_panitia", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_kepanitiaan" WHERE "id_jns_panitia" = :p0';
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
            $obj = new JenisKepanitiaan();
            $obj->hydrate($row);
            JenisKepanitiaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisKepanitiaan|JenisKepanitiaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisKepanitiaan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jns_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsPanitia(1234); // WHERE id_jns_panitia = 1234
     * $query->filterByIdJnsPanitia(array(12, 34)); // WHERE id_jns_panitia IN (12, 34)
     * $query->filterByIdJnsPanitia(array('min' => 12)); // WHERE id_jns_panitia >= 12
     * $query->filterByIdJnsPanitia(array('max' => 12)); // WHERE id_jns_panitia <= 12
     * </code>
     *
     * @param     mixed $idJnsPanitia The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdJnsPanitia($idJnsPanitia = null, $comparison = null)
    {
        if (is_array($idJnsPanitia)) {
            $useMinMax = false;
            if (isset($idJnsPanitia['min'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsPanitia['max'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $idJnsPanitia, $comparison);
    }

    /**
     * Filter the query on the nm_jns_panitia column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJnsPanitia('fooValue');   // WHERE nm_jns_panitia = 'fooValue'
     * $query->filterByNmJnsPanitia('%fooValue%'); // WHERE nm_jns_panitia LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJnsPanitia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByNmJnsPanitia($nmJnsPanitia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJnsPanitia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJnsPanitia)) {
                $nmJnsPanitia = str_replace('*', '%', $nmJnsPanitia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::NM_JNS_PANITIA, $nmJnsPanitia, $comparison);
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
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisKepanitiaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisKepanitiaanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Kepanitiaan object
     *
     * @param   Kepanitiaan|PropelObjectCollection $kepanitiaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisKepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKepanitiaan($kepanitiaan, $comparison = null)
    {
        if ($kepanitiaan instanceof Kepanitiaan) {
            return $this
                ->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $kepanitiaan->getIdJnsPanitia(), $comparison);
        } elseif ($kepanitiaan instanceof PropelObjectCollection) {
            return $this
                ->useKepanitiaanQuery()
                ->filterByPrimaryKeys($kepanitiaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKepanitiaan() only accepts arguments of type Kepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function joinKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kepanitiaan');

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
            $this->addJoinObject($join, 'Kepanitiaan');
        }

        return $this;
    }

    /**
     * Use the Kepanitiaan relation Kepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kepanitiaan', '\DataDikdas\Model\KepanitiaanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisKepanitiaan $jenisKepanitiaan Object to remove from the list of results
     *
     * @return JenisKepanitiaanQuery The current query, for fluid interface
     */
    public function prune($jenisKepanitiaan = null)
    {
        if ($jenisKepanitiaan) {
            $this->addUsingAlias(JenisKepanitiaanPeer::ID_JNS_PANITIA, $jenisKepanitiaan->getIdJnsPanitia(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
