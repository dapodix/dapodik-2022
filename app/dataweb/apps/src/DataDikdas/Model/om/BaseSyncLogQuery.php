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
use DataDikdas\Model\SyncLog;
use DataDikdas\Model\SyncLogPeer;
use DataDikdas\Model\SyncLogQuery;

/**
 * Base class that represents a query for the 'sync_log' table.
 *
 * 
 *
 * @method SyncLogQuery orderByIdInstalasi($order = Criteria::ASC) Order by the id_instalasi column
 * @method SyncLogQuery orderByBeginSync($order = Criteria::ASC) Order by the begin_sync column
 * @method SyncLogQuery orderByEndSync($order = Criteria::ASC) Order by the end_sync column
 * @method SyncLogQuery orderBySyncMedia($order = Criteria::ASC) Order by the sync_media column
 * @method SyncLogQuery orderByIsSuccess($order = Criteria::ASC) Order by the is_success column
 * @method SyncLogQuery orderBySelisihWaktuServer($order = Criteria::ASC) Order by the selisih_waktu_server column
 * @method SyncLogQuery orderByAlamatIp($order = Criteria::ASC) Order by the alamat_ip column
 * @method SyncLogQuery orderByPenggunaId($order = Criteria::ASC) Order by the pengguna_id column
 *
 * @method SyncLogQuery groupByIdInstalasi() Group by the id_instalasi column
 * @method SyncLogQuery groupByBeginSync() Group by the begin_sync column
 * @method SyncLogQuery groupByEndSync() Group by the end_sync column
 * @method SyncLogQuery groupBySyncMedia() Group by the sync_media column
 * @method SyncLogQuery groupByIsSuccess() Group by the is_success column
 * @method SyncLogQuery groupBySelisihWaktuServer() Group by the selisih_waktu_server column
 * @method SyncLogQuery groupByAlamatIp() Group by the alamat_ip column
 * @method SyncLogQuery groupByPenggunaId() Group by the pengguna_id column
 *
 * @method SyncLogQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method SyncLogQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method SyncLogQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method SyncLogQuery leftJoinInstalasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Instalasi relation
 * @method SyncLogQuery rightJoinInstalasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Instalasi relation
 * @method SyncLogQuery innerJoinInstalasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Instalasi relation
 *
 * @method SyncLog findOne(PropelPDO $con = null) Return the first SyncLog matching the query
 * @method SyncLog findOneOrCreate(PropelPDO $con = null) Return the first SyncLog matching the query, or a new SyncLog object populated from the query conditions when no match is found
 *
 * @method SyncLog findOneByIdInstalasi(string $id_instalasi) Return the first SyncLog filtered by the id_instalasi column
 * @method SyncLog findOneByBeginSync(string $begin_sync) Return the first SyncLog filtered by the begin_sync column
 * @method SyncLog findOneByEndSync(string $end_sync) Return the first SyncLog filtered by the end_sync column
 * @method SyncLog findOneBySyncMedia(string $sync_media) Return the first SyncLog filtered by the sync_media column
 * @method SyncLog findOneByIsSuccess(string $is_success) Return the first SyncLog filtered by the is_success column
 * @method SyncLog findOneBySelisihWaktuServer(string $selisih_waktu_server) Return the first SyncLog filtered by the selisih_waktu_server column
 * @method SyncLog findOneByAlamatIp(string $alamat_ip) Return the first SyncLog filtered by the alamat_ip column
 * @method SyncLog findOneByPenggunaId(string $pengguna_id) Return the first SyncLog filtered by the pengguna_id column
 *
 * @method array findByIdInstalasi(string $id_instalasi) Return SyncLog objects filtered by the id_instalasi column
 * @method array findByBeginSync(string $begin_sync) Return SyncLog objects filtered by the begin_sync column
 * @method array findByEndSync(string $end_sync) Return SyncLog objects filtered by the end_sync column
 * @method array findBySyncMedia(string $sync_media) Return SyncLog objects filtered by the sync_media column
 * @method array findByIsSuccess(string $is_success) Return SyncLog objects filtered by the is_success column
 * @method array findBySelisihWaktuServer(string $selisih_waktu_server) Return SyncLog objects filtered by the selisih_waktu_server column
 * @method array findByAlamatIp(string $alamat_ip) Return SyncLog objects filtered by the alamat_ip column
 * @method array findByPenggunaId(string $pengguna_id) Return SyncLog objects filtered by the pengguna_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSyncLogQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseSyncLogQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\SyncLog', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new SyncLogQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   SyncLogQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return SyncLogQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof SyncLogQuery) {
            return $criteria;
        }
        $query = new SyncLogQuery();
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
                         A Primary key composition: [$id_instalasi, $begin_sync]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   SyncLog|SyncLog[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = SyncLogPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(SyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 SyncLog A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_instalasi", "begin_sync", "end_sync", "sync_media", "is_success", "selisih_waktu_server", "alamat_ip", "pengguna_id" FROM "sync_log" WHERE "id_instalasi" = :p0 AND "begin_sync" = :p1';
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
            $obj = new SyncLog();
            $obj->hydrate($row);
            SyncLogPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return SyncLog|SyncLog[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|SyncLog[]|mixed the list of results, formatted by the current formatter
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
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(SyncLogPeer::ID_INSTALASI, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(SyncLogPeer::BEGIN_SYNC, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(SyncLogPeer::ID_INSTALASI, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(SyncLogPeer::BEGIN_SYNC, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return SyncLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SyncLogPeer::ID_INSTALASI, $idInstalasi, $comparison);
    }

    /**
     * Filter the query on the begin_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByBeginSync('2011-03-14'); // WHERE begin_sync = '2011-03-14'
     * $query->filterByBeginSync('now'); // WHERE begin_sync = '2011-03-14'
     * $query->filterByBeginSync(array('max' => 'yesterday')); // WHERE begin_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $beginSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByBeginSync($beginSync = null, $comparison = null)
    {
        if (is_array($beginSync)) {
            $useMinMax = false;
            if (isset($beginSync['min'])) {
                $this->addUsingAlias(SyncLogPeer::BEGIN_SYNC, $beginSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($beginSync['max'])) {
                $this->addUsingAlias(SyncLogPeer::BEGIN_SYNC, $beginSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::BEGIN_SYNC, $beginSync, $comparison);
    }

    /**
     * Filter the query on the end_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByEndSync('2011-03-14'); // WHERE end_sync = '2011-03-14'
     * $query->filterByEndSync('now'); // WHERE end_sync = '2011-03-14'
     * $query->filterByEndSync(array('max' => 'yesterday')); // WHERE end_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $endSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByEndSync($endSync = null, $comparison = null)
    {
        if (is_array($endSync)) {
            $useMinMax = false;
            if (isset($endSync['min'])) {
                $this->addUsingAlias(SyncLogPeer::END_SYNC, $endSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($endSync['max'])) {
                $this->addUsingAlias(SyncLogPeer::END_SYNC, $endSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::END_SYNC, $endSync, $comparison);
    }

    /**
     * Filter the query on the sync_media column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncMedia('fooValue');   // WHERE sync_media = 'fooValue'
     * $query->filterBySyncMedia('%fooValue%'); // WHERE sync_media LIKE '%fooValue%'
     * </code>
     *
     * @param     string $syncMedia The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterBySyncMedia($syncMedia = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($syncMedia)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $syncMedia)) {
                $syncMedia = str_replace('*', '%', $syncMedia);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::SYNC_MEDIA, $syncMedia, $comparison);
    }

    /**
     * Filter the query on the is_success column
     *
     * Example usage:
     * <code>
     * $query->filterByIsSuccess(1234); // WHERE is_success = 1234
     * $query->filterByIsSuccess(array(12, 34)); // WHERE is_success IN (12, 34)
     * $query->filterByIsSuccess(array('min' => 12)); // WHERE is_success >= 12
     * $query->filterByIsSuccess(array('max' => 12)); // WHERE is_success <= 12
     * </code>
     *
     * @param     mixed $isSuccess The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByIsSuccess($isSuccess = null, $comparison = null)
    {
        if (is_array($isSuccess)) {
            $useMinMax = false;
            if (isset($isSuccess['min'])) {
                $this->addUsingAlias(SyncLogPeer::IS_SUCCESS, $isSuccess['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($isSuccess['max'])) {
                $this->addUsingAlias(SyncLogPeer::IS_SUCCESS, $isSuccess['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::IS_SUCCESS, $isSuccess, $comparison);
    }

    /**
     * Filter the query on the selisih_waktu_server column
     *
     * Example usage:
     * <code>
     * $query->filterBySelisihWaktuServer(1234); // WHERE selisih_waktu_server = 1234
     * $query->filterBySelisihWaktuServer(array(12, 34)); // WHERE selisih_waktu_server IN (12, 34)
     * $query->filterBySelisihWaktuServer(array('min' => 12)); // WHERE selisih_waktu_server >= 12
     * $query->filterBySelisihWaktuServer(array('max' => 12)); // WHERE selisih_waktu_server <= 12
     * </code>
     *
     * @param     mixed $selisihWaktuServer The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterBySelisihWaktuServer($selisihWaktuServer = null, $comparison = null)
    {
        if (is_array($selisihWaktuServer)) {
            $useMinMax = false;
            if (isset($selisihWaktuServer['min'])) {
                $this->addUsingAlias(SyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($selisihWaktuServer['max'])) {
                $this->addUsingAlias(SyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::SELISIH_WAKTU_SERVER, $selisihWaktuServer, $comparison);
    }

    /**
     * Filter the query on the alamat_ip column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatIp('fooValue');   // WHERE alamat_ip = 'fooValue'
     * $query->filterByAlamatIp('%fooValue%'); // WHERE alamat_ip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatIp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function filterByAlamatIp($alamatIp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatIp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatIp)) {
                $alamatIp = str_replace('*', '%', $alamatIp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(SyncLogPeer::ALAMAT_IP, $alamatIp, $comparison);
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
     * @return SyncLogQuery The current query, for fluid interface
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

        return $this->addUsingAlias(SyncLogPeer::PENGGUNA_ID, $penggunaId, $comparison);
    }

    /**
     * Filter the query by a related Instalasi object
     *
     * @param   Instalasi|PropelObjectCollection $instalasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 SyncLogQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInstalasi($instalasi, $comparison = null)
    {
        if ($instalasi instanceof Instalasi) {
            return $this
                ->addUsingAlias(SyncLogPeer::ID_INSTALASI, $instalasi->getIdInstalasi(), $comparison);
        } elseif ($instalasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(SyncLogPeer::ID_INSTALASI, $instalasi->toKeyValue('PrimaryKey', 'IdInstalasi'), $comparison);
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
     * @return SyncLogQuery The current query, for fluid interface
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
     * @param   SyncLog $syncLog Object to remove from the list of results
     *
     * @return SyncLogQuery The current query, for fluid interface
     */
    public function prune($syncLog = null)
    {
        if ($syncLog) {
            $this->addCond('pruneCond0', $this->getAliasedColName(SyncLogPeer::ID_INSTALASI), $syncLog->getIdInstalasi(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(SyncLogPeer::BEGIN_SYNC), $syncLog->getBeginSync(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
