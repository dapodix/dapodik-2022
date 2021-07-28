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
use DataDikdas\Model\AlasanLayakPip;
use DataDikdas\Model\AlasanLayakPipPeer;
use DataDikdas\Model\AlasanLayakPipQuery;
use DataDikdas\Model\PesertaDidik;

/**
 * Base class that represents a query for the 'ref.alasan_layak_pip' table.
 *
 * 
 *
 * @method AlasanLayakPipQuery orderByIdLayakPip($order = Criteria::ASC) Order by the id_layak_pip column
 * @method AlasanLayakPipQuery orderByAlasanLayakPip($order = Criteria::ASC) Order by the alasan_layak_pip column
 * @method AlasanLayakPipQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AlasanLayakPipQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AlasanLayakPipQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method AlasanLayakPipQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method AlasanLayakPipQuery groupByIdLayakPip() Group by the id_layak_pip column
 * @method AlasanLayakPipQuery groupByAlasanLayakPip() Group by the alasan_layak_pip column
 * @method AlasanLayakPipQuery groupByCreateDate() Group by the create_date column
 * @method AlasanLayakPipQuery groupByLastUpdate() Group by the last_update column
 * @method AlasanLayakPipQuery groupByExpiredDate() Group by the expired_date column
 * @method AlasanLayakPipQuery groupByLastSync() Group by the last_sync column
 *
 * @method AlasanLayakPipQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlasanLayakPipQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlasanLayakPipQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlasanLayakPipQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method AlasanLayakPipQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method AlasanLayakPipQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method AlasanLayakPip findOne(PropelPDO $con = null) Return the first AlasanLayakPip matching the query
 * @method AlasanLayakPip findOneOrCreate(PropelPDO $con = null) Return the first AlasanLayakPip matching the query, or a new AlasanLayakPip object populated from the query conditions when no match is found
 *
 * @method AlasanLayakPip findOneByAlasanLayakPip(string $alasan_layak_pip) Return the first AlasanLayakPip filtered by the alasan_layak_pip column
 * @method AlasanLayakPip findOneByCreateDate(string $create_date) Return the first AlasanLayakPip filtered by the create_date column
 * @method AlasanLayakPip findOneByLastUpdate(string $last_update) Return the first AlasanLayakPip filtered by the last_update column
 * @method AlasanLayakPip findOneByExpiredDate(string $expired_date) Return the first AlasanLayakPip filtered by the expired_date column
 * @method AlasanLayakPip findOneByLastSync(string $last_sync) Return the first AlasanLayakPip filtered by the last_sync column
 *
 * @method array findByIdLayakPip(string $id_layak_pip) Return AlasanLayakPip objects filtered by the id_layak_pip column
 * @method array findByAlasanLayakPip(string $alasan_layak_pip) Return AlasanLayakPip objects filtered by the alasan_layak_pip column
 * @method array findByCreateDate(string $create_date) Return AlasanLayakPip objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AlasanLayakPip objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return AlasanLayakPip objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return AlasanLayakPip objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlasanLayakPipQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlasanLayakPipQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AlasanLayakPip', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlasanLayakPipQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlasanLayakPipQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlasanLayakPipQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlasanLayakPipQuery) {
            return $criteria;
        }
        $query = new AlasanLayakPipQuery();
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
     * @return   AlasanLayakPip|AlasanLayakPip[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlasanLayakPipPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlasanLayakPipPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AlasanLayakPip A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdLayakPip($key, $con = null)
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
     * @return                 AlasanLayakPip A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_layak_pip", "alasan_layak_pip", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."alasan_layak_pip" WHERE "id_layak_pip" = :p0';
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
            $obj = new AlasanLayakPip();
            $obj->hydrate($row);
            AlasanLayakPipPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AlasanLayakPip|AlasanLayakPip[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AlasanLayakPip[]|mixed the list of results, formatted by the current formatter
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
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_layak_pip column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLayakPip(1234); // WHERE id_layak_pip = 1234
     * $query->filterByIdLayakPip(array(12, 34)); // WHERE id_layak_pip IN (12, 34)
     * $query->filterByIdLayakPip(array('min' => 12)); // WHERE id_layak_pip >= 12
     * $query->filterByIdLayakPip(array('max' => 12)); // WHERE id_layak_pip <= 12
     * </code>
     *
     * @param     mixed $idLayakPip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByIdLayakPip($idLayakPip = null, $comparison = null)
    {
        if (is_array($idLayakPip)) {
            $useMinMax = false;
            if (isset($idLayakPip['min'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $idLayakPip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLayakPip['max'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $idLayakPip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $idLayakPip, $comparison);
    }

    /**
     * Filter the query on the alasan_layak_pip column
     *
     * Example usage:
     * <code>
     * $query->filterByAlasanLayakPip('fooValue');   // WHERE alasan_layak_pip = 'fooValue'
     * $query->filterByAlasanLayakPip('%fooValue%'); // WHERE alasan_layak_pip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alasanLayakPip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByAlasanLayakPip($alasanLayakPip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alasanLayakPip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alasanLayakPip)) {
                $alasanLayakPip = str_replace('*', '%', $alasanLayakPip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::ALASAN_LAYAK_PIP, $alasanLayakPip, $comparison);
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
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AlasanLayakPipPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlasanLayakPipPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlasanLayakPipQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $pesertaDidik->getIdLayakPip(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AlasanLayakPip $alasanLayakPip Object to remove from the list of results
     *
     * @return AlasanLayakPipQuery The current query, for fluid interface
     */
    public function prune($alasanLayakPip = null)
    {
        if ($alasanLayakPip) {
            $this->addUsingAlias(AlasanLayakPipPeer::ID_LAYAK_PIP, $alasanLayakPip->getIdLayakPip(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
