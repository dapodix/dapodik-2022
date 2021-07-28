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
use DataDikdas\Model\AktivitasKepanitiaan;
use DataDikdas\Model\JenisAktivitasKepanitiaan;
use DataDikdas\Model\JenisAktivitasKepanitiaanPeer;
use DataDikdas\Model\JenisAktivitasKepanitiaanQuery;

/**
 * Base class that represents a query for the 'ref.jenis_aktivitas_kepanitiaan' table.
 *
 * 
 *
 * @method JenisAktivitasKepanitiaanQuery orderByIdJnsAktPan($order = Criteria::ASC) Order by the id_jns_akt_pan column
 * @method JenisAktivitasKepanitiaanQuery orderByNmJnsAktPan($order = Criteria::ASC) Order by the nm_jns_akt_pan column
 * @method JenisAktivitasKepanitiaanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisAktivitasKepanitiaanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisAktivitasKepanitiaanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisAktivitasKepanitiaanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisAktivitasKepanitiaanQuery groupByIdJnsAktPan() Group by the id_jns_akt_pan column
 * @method JenisAktivitasKepanitiaanQuery groupByNmJnsAktPan() Group by the nm_jns_akt_pan column
 * @method JenisAktivitasKepanitiaanQuery groupByCreateDate() Group by the create_date column
 * @method JenisAktivitasKepanitiaanQuery groupByLastUpdate() Group by the last_update column
 * @method JenisAktivitasKepanitiaanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisAktivitasKepanitiaanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisAktivitasKepanitiaanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisAktivitasKepanitiaanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisAktivitasKepanitiaanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisAktivitasKepanitiaanQuery leftJoinAktivitasKepanitiaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method JenisAktivitasKepanitiaanQuery rightJoinAktivitasKepanitiaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktivitasKepanitiaan relation
 * @method JenisAktivitasKepanitiaanQuery innerJoinAktivitasKepanitiaan($relationAlias = null) Adds a INNER JOIN clause to the query using the AktivitasKepanitiaan relation
 *
 * @method JenisAktivitasKepanitiaan findOne(PropelPDO $con = null) Return the first JenisAktivitasKepanitiaan matching the query
 * @method JenisAktivitasKepanitiaan findOneOrCreate(PropelPDO $con = null) Return the first JenisAktivitasKepanitiaan matching the query, or a new JenisAktivitasKepanitiaan object populated from the query conditions when no match is found
 *
 * @method JenisAktivitasKepanitiaan findOneByNmJnsAktPan(string $nm_jns_akt_pan) Return the first JenisAktivitasKepanitiaan filtered by the nm_jns_akt_pan column
 * @method JenisAktivitasKepanitiaan findOneByCreateDate(string $create_date) Return the first JenisAktivitasKepanitiaan filtered by the create_date column
 * @method JenisAktivitasKepanitiaan findOneByLastUpdate(string $last_update) Return the first JenisAktivitasKepanitiaan filtered by the last_update column
 * @method JenisAktivitasKepanitiaan findOneByExpiredDate(string $expired_date) Return the first JenisAktivitasKepanitiaan filtered by the expired_date column
 * @method JenisAktivitasKepanitiaan findOneByLastSync(string $last_sync) Return the first JenisAktivitasKepanitiaan filtered by the last_sync column
 *
 * @method array findByIdJnsAktPan(string $id_jns_akt_pan) Return JenisAktivitasKepanitiaan objects filtered by the id_jns_akt_pan column
 * @method array findByNmJnsAktPan(string $nm_jns_akt_pan) Return JenisAktivitasKepanitiaan objects filtered by the nm_jns_akt_pan column
 * @method array findByCreateDate(string $create_date) Return JenisAktivitasKepanitiaan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisAktivitasKepanitiaan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisAktivitasKepanitiaan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisAktivitasKepanitiaan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisAktivitasKepanitiaanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisAktivitasKepanitiaanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisAktivitasKepanitiaan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisAktivitasKepanitiaanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisAktivitasKepanitiaanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisAktivitasKepanitiaanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisAktivitasKepanitiaanQuery) {
            return $criteria;
        }
        $query = new JenisAktivitasKepanitiaanQuery();
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
     * @return   JenisAktivitasKepanitiaan|JenisAktivitasKepanitiaan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisAktivitasKepanitiaanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisAktivitasKepanitiaanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisAktivitasKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdJnsAktPan($key, $con = null)
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
     * @return                 JenisAktivitasKepanitiaan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_jns_akt_pan", "nm_jns_akt_pan", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_aktivitas_kepanitiaan" WHERE "id_jns_akt_pan" = :p0';
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
            $obj = new JenisAktivitasKepanitiaan();
            $obj->hydrate($row);
            JenisAktivitasKepanitiaanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisAktivitasKepanitiaan|JenisAktivitasKepanitiaan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisAktivitasKepanitiaan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_jns_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdJnsAktPan(1234); // WHERE id_jns_akt_pan = 1234
     * $query->filterByIdJnsAktPan(array(12, 34)); // WHERE id_jns_akt_pan IN (12, 34)
     * $query->filterByIdJnsAktPan(array('min' => 12)); // WHERE id_jns_akt_pan >= 12
     * $query->filterByIdJnsAktPan(array('max' => 12)); // WHERE id_jns_akt_pan <= 12
     * </code>
     *
     * @param     mixed $idJnsAktPan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByIdJnsAktPan($idJnsAktPan = null, $comparison = null)
    {
        if (is_array($idJnsAktPan)) {
            $useMinMax = false;
            if (isset($idJnsAktPan['min'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idJnsAktPan['max'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $idJnsAktPan, $comparison);
    }

    /**
     * Filter the query on the nm_jns_akt_pan column
     *
     * Example usage:
     * <code>
     * $query->filterByNmJnsAktPan('fooValue');   // WHERE nm_jns_akt_pan = 'fooValue'
     * $query->filterByNmJnsAktPan('%fooValue%'); // WHERE nm_jns_akt_pan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmJnsAktPan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByNmJnsAktPan($nmJnsAktPan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmJnsAktPan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmJnsAktPan)) {
                $nmJnsAktPan = str_replace('*', '%', $nmJnsAktPan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::NM_JNS_AKT_PAN, $nmJnsAktPan, $comparison);
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
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related AktivitasKepanitiaan object
     *
     * @param   AktivitasKepanitiaan|PropelObjectCollection $aktivitasKepanitiaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktivitasKepanitiaan($aktivitasKepanitiaan, $comparison = null)
    {
        if ($aktivitasKepanitiaan instanceof AktivitasKepanitiaan) {
            return $this
                ->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $aktivitasKepanitiaan->getIdJnsAktPan(), $comparison);
        } elseif ($aktivitasKepanitiaan instanceof PropelObjectCollection) {
            return $this
                ->useAktivitasKepanitiaanQuery()
                ->filterByPrimaryKeys($aktivitasKepanitiaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAktivitasKepanitiaan() only accepts arguments of type AktivitasKepanitiaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktivitasKepanitiaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function joinAktivitasKepanitiaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktivitasKepanitiaan');

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
            $this->addJoinObject($join, 'AktivitasKepanitiaan');
        }

        return $this;
    }

    /**
     * Use the AktivitasKepanitiaan relation AktivitasKepanitiaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktivitasKepanitiaanQuery A secondary query class using the current class as primary query
     */
    public function useAktivitasKepanitiaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktivitasKepanitiaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktivitasKepanitiaan', '\DataDikdas\Model\AktivitasKepanitiaanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisAktivitasKepanitiaan $jenisAktivitasKepanitiaan Object to remove from the list of results
     *
     * @return JenisAktivitasKepanitiaanQuery The current query, for fluid interface
     */
    public function prune($jenisAktivitasKepanitiaan = null)
    {
        if ($jenisAktivitasKepanitiaan) {
            $this->addUsingAlias(JenisAktivitasKepanitiaanPeer::ID_JNS_AKT_PAN, $jenisAktivitasKepanitiaan->getIdJnsAktPan(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
