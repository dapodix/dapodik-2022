<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\SyncPrimer;
use DataDikdas\Model\SyncPrimerPeer;
use DataDikdas\Model\SyncPrimerQuery;
use DataDikdas\Model\TableSyncLog;

/**
 * Base class that represents a query for the 'sync_primer' table.
 *
 * 
 *
 * @method SyncPrimerQuery orderByTableName($order = Criteria::ASC) Order by the table_name column
 * @method SyncPrimerQuery orderByIdInstalasi($order = Criteria::ASC) Order by the id_instalasi column
 * @method SyncPrimerQuery orderByIdThread($order = Criteria::ASC) Order by the id_thread column
 * @method SyncPrimerQuery orderBySyncKet($order = Criteria::ASC) Order by the sync_ket column
 * @method SyncPrimerQuery orderBySyncStatus($order = Criteria::ASC) Order by the sync_status column
 *
 * @method SyncPrimerQuery groupByTableName() Group by the table_name column
 * @method SyncPrimerQuery groupByIdInstalasi() Group by the id_instalasi column
 * @method SyncPrimerQuery groupByIdThread() Group by the id_thread column
 * @method SyncPrimerQuery groupBySyncKet() Group by the sync_ket column
 * @method SyncPrimerQuery groupBySyncStatus() Group by the sync_status column
 *
 * @method SyncPrimerQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SyncPrimerQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SyncPrimerQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SyncPrimerQuery leftJoinTableSyncLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TableSyncLog relation
 * @method SyncPrimerQuery rightJoinTableSyncLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TableSyncLog relation
 * @method SyncPrimerQuery innerJoinTableSyncLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TableSyncLog relation
 *
 * @method SyncPrimer findOne(PropelPDO $con = null) Return the first SyncPrimer matching the query
 * @method SyncPrimer findOneOrCreate(PropelPDO $con = null) Return the first SyncPrimer matching the query, or a new SyncPrimer object populated from the query conditions when no match is found
 *
 * @method SyncPrimer findOneByTableName(string $table_name) Return the first SyncPrimer filtered by the table_name column
 * @method SyncPrimer findOneByIdInstalasi(string $id_instalasi) Return the first SyncPrimer filtered by the id_instalasi column
 * @method SyncPrimer findOneByIdThread(int $id_thread) Return the first SyncPrimer filtered by the id_thread column
 * @method SyncPrimer findOneBySyncKet(string $sync_ket) Return the first SyncPrimer filtered by the sync_ket column
 * @method SyncPrimer findOneBySyncStatus(int $sync_status) Return the first SyncPrimer filtered by the sync_status column
 *
 * @method array findByTableName(string $table_name) Return SyncPrimer objects filtered by the table_name column
 * @method array findByIdInstalasi(string $id_instalasi) Return SyncPrimer objects filtered by the id_instalasi column
 * @method array findByIdThread(int $id_thread) Return SyncPrimer objects filtered by the id_thread column
 * @method array findBySyncKet(string $sync_ket) Return SyncPrimer objects filtered by the sync_ket column
 * @method array findBySyncStatus(int $sync_status) Return SyncPrimer objects filtered by the sync_status column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSyncPrimerQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSyncPrimerQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SyncPrimer', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SyncPrimerQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SyncPrimerQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SyncPrimerQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SyncPrimerQuery) {
            return $criteria;
        }
        $query = new SyncPrimerQuery();
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
     * $obj = $c->findPk(array(12, 34, 56), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$table_name, $id_instalasi, $id_thread]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SyncPrimer|SyncPrimer[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SyncPrimerPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SyncPrimerPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SyncPrimer A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "table_name", "id_instalasi", "id_thread", "sync_ket", "sync_status" FROM "sync_primer" WHERE "table_name" = :p0 AND "id_instalasi" = :p1 AND "id_thread" = :p2';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);			
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new SyncPrimer();
            $obj->hydrate($row);
            SyncPrimerPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return SyncPrimer|SyncPrimer[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SyncPrimer[]|mixed the list of results, formatted by the current formatter
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
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SyncPrimerPeer::TABLE_NAME, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SyncPrimerPeer::ID_INSTALASI, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(SyncPrimerPeer::ID_THREAD, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SyncPrimerPeer::TABLE_NAME, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SyncPrimerPeer::ID_INSTALASI, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(SyncPrimerPeer::ID_THREAD, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the table_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTableName('fooValue');   // WHERE table_name = 'fooValue'
     * $query->filterByTableName('%fooValue%'); // WHERE table_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterByTableName($tableName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableName)) {
                $tableName = str_replace('*', '%', $tableName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncPrimerPeer::TABLE_NAME, $tableName, $comparison);
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
     * @return SyncPrimerQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SyncPrimerPeer::ID_INSTALASI, $idInstalasi, $comparison);
    }

    /**
     * Filter the query on the id_thread column
     *
     * Example usage:
     * <code>
     * $query->filterByIdThread(1234); // WHERE id_thread = 1234
     * $query->filterByIdThread(array(12, 34)); // WHERE id_thread IN (12, 34)
     * $query->filterByIdThread(array('min' => 12)); // WHERE id_thread >= 12
     * $query->filterByIdThread(array('max' => 12)); // WHERE id_thread <= 12
     * </code>
     *
     * @param     mixed $idThread The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterByIdThread($idThread = null, $comparison = null)
    {
        if (is_array($idThread)) {
            $useMinMax = false;
            if (isset($idThread['min'])) {
                $this->addUsingAlias(SyncPrimerPeer::ID_THREAD, $idThread['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idThread['max'])) {
                $this->addUsingAlias(SyncPrimerPeer::ID_THREAD, $idThread['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncPrimerPeer::ID_THREAD, $idThread, $comparison);
    }

    /**
     * Filter the query on the sync_ket column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncKet('fooValue');   // WHERE sync_ket = 'fooValue'
     * $query->filterBySyncKet('%fooValue%'); // WHERE sync_ket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $syncKet The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterBySyncKet($syncKet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($syncKet)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $syncKet)) {
                $syncKet = str_replace('*', '%', $syncKet);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncPrimerPeer::SYNC_KET, $syncKet, $comparison);
    }

    /**
     * Filter the query on the sync_status column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncStatus(1234); // WHERE sync_status = 1234
     * $query->filterBySyncStatus(array(12, 34)); // WHERE sync_status IN (12, 34)
     * $query->filterBySyncStatus(array('min' => 12)); // WHERE sync_status >= 12
     * $query->filterBySyncStatus(array('max' => 12)); // WHERE sync_status <= 12
     * </code>
     *
     * @param     mixed $syncStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function filterBySyncStatus($syncStatus = null, $comparison = null)
    {
        if (is_array($syncStatus)) {
            $useMinMax = false;
            if (isset($syncStatus['min'])) {
                $this->addUsingAlias(SyncPrimerPeer::SYNC_STATUS, $syncStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($syncStatus['max'])) {
                $this->addUsingAlias(SyncPrimerPeer::SYNC_STATUS, $syncStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncPrimerPeer::SYNC_STATUS, $syncStatus, $comparison);
    }

    /**
     * Filter the query by a related TableSyncLog object
     *
     * @param   TableSyncLog $tableSyncLog The related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SyncPrimerQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTableSyncLog($tableSyncLog, $comparison = null)
    {
        if ($tableSyncLog instanceof TableSyncLog) {
            return $this
                ->addUsingAlias(SyncPrimerPeer::ID_INSTALASI, $tableSyncLog->getIdInstalasi(), $comparison)
                ->addUsingAlias(SyncPrimerPeer::TABLE_NAME, $tableSyncLog->getTableName(), $comparison);
        } else {
            throw new PropelException('filterByTableSyncLog() only accepts arguments of type TableSyncLog');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TableSyncLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function joinTableSyncLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TableSyncLog');

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
            $this->addJoinObject($join, 'TableSyncLog');
        }

        return $this;
    }

    /**
     * Use the TableSyncLog relation TableSyncLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TableSyncLogQuery A secondary query class using the current class as primary query
     */
    public function useTableSyncLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTableSyncLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TableSyncLog', '\DataDikdas\Model\TableSyncLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   SyncPrimer $syncPrimer Object to remove from the list of results
     *
     * @return SyncPrimerQuery The current query, for fluid interface
     */
    public function prune($syncPrimer = null)
    {
        if ($syncPrimer) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SyncPrimerPeer::TABLE_NAME), $syncPrimer->getTableName(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SyncPrimerPeer::ID_INSTALASI), $syncPrimer->getIdInstalasi(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(SyncPrimerPeer::ID_THREAD), $syncPrimer->getIdThread(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
