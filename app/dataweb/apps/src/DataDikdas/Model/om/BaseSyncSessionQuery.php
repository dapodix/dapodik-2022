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
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\SyncSession;
use DataDikdas\Model\SyncSessionPeer;
use DataDikdas\Model\SyncSessionQuery;

/**
 * Base class that represents a query for the 'sync_session' table.
 *
 * 
 *
 * @method SyncSessionQuery orderByToken($order = Criteria::ASC) Order by the token column
 * @method SyncSessionQuery orderByIdInstalasi($order = Criteria::ASC) Order by the id_instalasi column
 * @method SyncSessionQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 * @method SyncSessionQuery orderByCreateTime($order = Criteria::ASC) Order by the create_time column
 * @method SyncSessionQuery orderByLastActivity($order = Criteria::ASC) Order by the last_activity column
 *
 * @method SyncSessionQuery groupByToken() Group by the token column
 * @method SyncSessionQuery groupByIdInstalasi() Group by the id_instalasi column
 * @method SyncSessionQuery groupByPenggunaId() Group by the pengguna_id column
 * @method SyncSessionQuery groupByCreateTime() Group by the create_time column
 * @method SyncSessionQuery groupByLastActivity() Group by the last_activity column
 *
 * @method SyncSessionQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SyncSessionQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SyncSessionQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SyncSessionQuery leftJoinInstalasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Instalasi relation
 * @method SyncSessionQuery rightJoinInstalasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Instalasi relation
 * @method SyncSessionQuery innerJoinInstalasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Instalasi relation
 *
 * @method SyncSession findOne(PropelPDO $con = null) Return the first SyncSession matching the query
 * @method SyncSession findOneOrCreate(PropelPDO $con = null) Return the first SyncSession matching the query, or a new SyncSession object populated from the query conditions when no match is found
 *
 * @method SyncSession findOneByIdInstalasi(string $id_instalasi) Return the first SyncSession filtered by the id_instalasi column
 * @method SyncSession findOneByPenggunaId(string $pengguna_id) Return the first SyncSession filtered by the pengguna_id column
 * @method SyncSession findOneByCreateTime(string $create_time) Return the first SyncSession filtered by the create_time column
 * @method SyncSession findOneByLastActivity(string $last_activity) Return the first SyncSession filtered by the last_activity column
 *
 * @method array findByToken(string $token) Return SyncSession objects filtered by the token column
 * @method array findByIdInstalasi(string $id_instalasi) Return SyncSession objects filtered by the id_instalasi column
 * @method array findByPenggunaId(string $pengguna_id) Return SyncSession objects filtered by the pengguna_id column
 * @method array findByCreateTime(string $create_time) Return SyncSession objects filtered by the create_time column
 * @method array findByLastActivity(string $last_activity) Return SyncSession objects filtered by the last_activity column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSyncSessionQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSyncSessionQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SyncSession', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SyncSessionQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SyncSessionQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SyncSessionQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SyncSessionQuery) {
            return $criteria;
        }
        $query = new SyncSessionQuery();
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
     * @return   SyncSession|SyncSession[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SyncSessionPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SyncSessionPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SyncSession A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByToken($key, $con = null)
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
     * @return                 SyncSession A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "token", "id_instalasi", "pengguna_id", "create_time", "last_activity" FROM "sync_session" WHERE "token" = :p0';
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
            $obj = new SyncSession();
            $obj->hydrate($row);
            SyncSessionPeer::addInstanceToPool($obj, (string) $key);
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
     * @return SyncSession|SyncSession[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SyncSession[]|mixed the list of results, formatted by the current formatter
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
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(SyncSessionPeer::TOKEN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(SyncSessionPeer::TOKEN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the token column
     *
     * Example usage:
     * <code>
     * $query->filterByToken('fooValue');   // WHERE token = 'fooValue'
     * $query->filterByToken('%fooValue%'); // WHERE token LIKE '%fooValue%'
     * </code>
     *
     * @param     string $token The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByToken($token = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($token)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $token)) {
                $token = str_replace('*', '%', $token);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncSessionPeer::TOKEN, $token, $comparison);
    }

    /**
     * Filter the query on the id_instalasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdInstalasi('fooValue');   // WHERE id_instalasi = 'fooValue'
     * $query->filterByIdInstalasi('%fooValue%'); // WHERE id_instalasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idInstalasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByIdInstalasi($idInstalasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idInstalasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idInstalasi)) {
                $idInstalasi = str_replace('*', '%', $idInstalasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncSessionPeer::ID_INSTALASI, $idInstalasi, $comparison);
    }

    /**
     * Filter the query on the pengguna_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPenggunaId('fooValue');   // WHERE pengguna_id = 'fooValue'
     * $query->filterByPenggunaId('%fooValue%'); // WHERE pengguna_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penggunaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByPenggunaId($penggunaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penggunaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penggunaId)) {
                $penggunaId = str_replace('*', '%', $penggunaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncSessionPeer::PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query on the create_time column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateTime('2011-03-14'); // WHERE create_time = '2011-03-14'
     * $query->filterByCreateTime('now'); // WHERE create_time = '2011-03-14'
     * $query->filterByCreateTime(array('max' => 'yesterday')); // WHERE create_time > '2011-03-13'
     * </code>
     *
     * @param     mixed $createTime The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByCreateTime($createTime = null, $comparison = null)
    {
        if (is_array($createTime)) {
            $useMinMax = false;
            if (isset($createTime['min'])) {
                $this->addUsingAlias(SyncSessionPeer::CREATE_TIME, $createTime['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createTime['max'])) {
                $this->addUsingAlias(SyncSessionPeer::CREATE_TIME, $createTime['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncSessionPeer::CREATE_TIME, $createTime, $comparison);
    }

    /**
     * Filter the query on the last_activity column
     *
     * Example usage:
     * <code>
     * $query->filterByLastActivity('2011-03-14'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity('now'); // WHERE last_activity = '2011-03-14'
     * $query->filterByLastActivity(array('max' => 'yesterday')); // WHERE last_activity > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastActivity The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function filterByLastActivity($lastActivity = null, $comparison = null)
    {
        if (is_array($lastActivity)) {
            $useMinMax = false;
            if (isset($lastActivity['min'])) {
                $this->addUsingAlias(SyncSessionPeer::LAST_ACTIVITY, $lastActivity['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastActivity['max'])) {
                $this->addUsingAlias(SyncSessionPeer::LAST_ACTIVITY, $lastActivity['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncSessionPeer::LAST_ACTIVITY, $lastActivity, $comparison);
    }

    /**
     * Filter the query by a related Instalasi object
     *
     * @param   Instalasi|PropelObjectCollection $instalasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SyncSessionQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInstalasi($instalasi, $comparison = null)
    {
        if ($instalasi instanceof Instalasi) {
            return $this
                ->addUsingAlias(SyncSessionPeer::ID_INSTALASI, $instalasi->getIdInstalasi(), $comparison);
        } elseif ($instalasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SyncSessionPeer::ID_INSTALASI, $instalasi->toKeyValue('PrimaryKey', 'IdInstalasi'), $comparison);
        } else {
            throw new PropelException('filterByInstalasi() only accepts arguments of type Instalasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Instalasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function joinInstalasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Instalasi');

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
            $this->addJoinObject($join, 'Instalasi');
        }

        return $this;
    }

    /**
     * Use the Instalasi relation Instalasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InstalasiQuery A secondary query class using the current class as primary query
     */
    public function useInstalasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInstalasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Instalasi', '\DataDikdas\Model\InstalasiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SyncSession $syncSession Object to remove from the list of results
     *
     * @return SyncSessionQuery The current query, for fluid interface
     */
    public function prune($syncSession = null)
    {
        if ($syncSession) {
            $this->addUsingAlias(SyncSessionPeer::TOKEN, $syncSession->getToken(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
