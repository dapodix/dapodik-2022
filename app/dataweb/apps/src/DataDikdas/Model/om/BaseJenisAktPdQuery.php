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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\JenisAktPd;
use DataDikdas\Model\JenisAktPdPeer;
use DataDikdas\Model\JenisAktPdQuery;

/**
 * Base class that represents a query for the 'ref.jenis_akt_pd' table.
 *
 * 
 *
 * @method JenisAktPdQuery orderByIdJnsAktPd($order = Criteria::ASC) Order by the id_jns_akt_pd column
 * @method JenisAktPdQuery orderByNmJnsAktPd($order = Criteria::ASC) Order by the nm_jns_akt_pd column
 * @method JenisAktPdQuery orderByKetJnsAktPd($order = Criteria::ASC) Order by the ket_jns_akt_pd column
 * @method JenisAktPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisAktPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisAktPdQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisAktPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisAktPdQuery groupByIdJnsAktPd() Group by the id_jns_akt_pd column
 * @method JenisAktPdQuery groupByNmJnsAktPd() Group by the nm_jns_akt_pd column
 * @method JenisAktPdQuery groupByKetJnsAktPd() Group by the ket_jns_akt_pd column
 * @method JenisAktPdQuery groupByCreateDate() Group by the create_date column
 * @method JenisAktPdQuery groupByLastUpdate() Group by the last_update column
 * @method JenisAktPdQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisAktPdQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisAktPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisAktPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisAktPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisAktPdQuery leftJoinAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktPd relation
 * @method JenisAktPdQuery rightJoinAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktPd relation
 * @method JenisAktPdQuery innerJoinAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AktPd relation
 *
 * @method JenisAktPd findOne(PropelPDO $con = null) Return the first JenisAktPd matching the query
 * @method JenisAktPd findOneOrCreate(PropelPDO $con = null) Return the first JenisAktPd matching the query, or a new JenisAktPd object populated from the query conditions when no match is found
 *
 * @method JenisAktPd findOneByNmJnsAktPd(string $nm_jns_akt_pd) Return the first JenisAktPd filtered by the nm_jns_akt_pd column
 * @method JenisAktPd findOneByKetJnsAktPd(string $ket_jns_akt_pd) Return the first JenisAktPd filtered by the ket_jns_akt_pd column
 * @method JenisAktPd findOneByCreateDate(string $create_date) Return the first JenisAktPd filtered by the create_date column
 * @method JenisAktPd findOneByLastUpdate(string $last_update) Return the first JenisAktPd filtered by the last_update column
 * @method JenisAktPd findOneByExpiredDate(string $expired_date) Return the first JenisAktPd filtered by the expired_date column
 * @method JenisAktPd findOneByLastSync(string $last_sync) Return the first JenisAktPd filtered by the last_sync column
 *
 * @method array findByIdJnsAktPd(string $id_jns_akt_pd) Return JenisAktPd objects filtered by the id_jns_akt_pd column
 * @method array findByNmJnsAktPd(string $nm_jns_akt_pd) Return JenisAktPd objects filtered by the nm_jns_akt_pd column
 * @method array findByKetJnsAktPd(string $ket_jns_akt_pd) Return JenisAktPd objects filtered by the ket_jns_akt_pd column
 * @method array findByCreateDate(string $create_date) Return JenisAktPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisAktPd objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisAktPd objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisAktPd objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisAktPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisAktPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisAktPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisAktPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisAktPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisAktPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisAktPdQuery) {
            return $criteria;
        }
        $query = new JenisAktPdQuery();
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
     * @return   JenisAktPd|JenisAktPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisAktPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisAktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisAktPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJnsAktPd($key, $con = null)
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
     * @return                 JenisAktPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jns_akt_pd", "nm_jns_akt_pd", "ket_jns_akt_pd", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_akt_pd" WHERE "id_jns_akt_pd" = :p0';
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
            $obj = new JenisAktPd();
            $obj->hydrate($row);
            JenisAktPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisAktPd|JenisAktPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisAktPd[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jns_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsAktPd(1234); // WHERE id_jns_akt_pd = 1234
     * $query->filterByIdJnsAktPd(array(12, 34)); // WHERE id_jns_akt_pd IN (12, 34)
     * $query->filterByIdJnsAktPd(array('min' => 12)); // WHERE id_jns_akt_pd >= 12
     * $query->filterByIdJnsAktPd(array('max' => 12)); // WHERE id_jns_akt_pd <= 12
     * </code>
     *
     * @param     mixed $idJnsAktPd The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByIdJnsAktPd($idJnsAktPd = null, $comparison = null)
    {
        if (is_array($idJnsAktPd)) {
            $useMinMax = false;
            if (isset($idJnsAktPd['min'])) {
                $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsAktPd['max'])) {
                $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $idJnsAktPd, $comparison);
    }

    /**
     * Filter the query on the nm_jns_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJnsAktPd('fooValue');   // WHERE nm_jns_akt_pd = 'fooValue'
     * $query->filterByNmJnsAktPd('%fooValue%'); // WHERE nm_jns_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJnsAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByNmJnsAktPd($nmJnsAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJnsAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJnsAktPd)) {
                $nmJnsAktPd = str_replace('*', '%', $nmJnsAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::NM_JNS_AKT_PD, $nmJnsAktPd, $comparison);
    }

    /**
     * Filter the query on the ket_jns_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByKetJnsAktPd('fooValue');   // WHERE ket_jns_akt_pd = 'fooValue'
     * $query->filterByKetJnsAktPd('%fooValue%'); // WHERE ket_jns_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketJnsAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByKetJnsAktPd($ketJnsAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketJnsAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketJnsAktPd)) {
                $ketJnsAktPd = str_replace('*', '%', $ketJnsAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::KET_JNS_AKT_PD, $ketJnsAktPd, $comparison);
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
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisAktPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisAktPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisAktPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisAktPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisAktPdPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisAktPdPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisAktPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisAktPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktPdPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related AktPd object
     *
     * @param   AktPd|PropelObjectCollection $aktPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisAktPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktPd($aktPd, $comparison = null)
    {
        if ($aktPd instanceof AktPd) {
            return $this
                ->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $aktPd->getIdJnsAktPd(), $comparison);
        } elseif ($aktPd instanceof PropelObjectCollection) {
            return $this
                ->useAktPdQuery()
                ->filterByPrimaryKeys($aktPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAktPd() only accepts arguments of type AktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function joinAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktPd');

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
            $this->addJoinObject($join, 'AktPd');
        }

        return $this;
    }

    /**
     * Use the AktPd relation AktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktPdQuery A secondary query class using the current class as primary query
     */
    public function useAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktPd', '\DataDikdas\Model\AktPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisAktPd $jenisAktPd Object to remove from the list of results
     *
     * @return JenisAktPdQuery The current query, for fluid interface
     */
    public function prune($jenisAktPd = null)
    {
        if ($jenisAktPd) {
            $this->addUsingAlias(JenisAktPdPeer::ID_JNS_AKT_PD, $jenisAktPd->getIdJnsAktPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
