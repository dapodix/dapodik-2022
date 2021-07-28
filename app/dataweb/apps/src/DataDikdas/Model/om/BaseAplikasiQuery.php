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
use DataDikdas\Model\Aplikasi;
use DataDikdas\Model\AplikasiPeer;
use DataDikdas\Model\AplikasiQuery;
use DataDikdas\Model\Menu;

/**
 * Base class that represents a query for the 'man_akses.aplikasi' table.
 *
 * 
 *
 * @method AplikasiQuery orderByIdAplikasi($order = Criteria::ASC) Order by the id_aplikasi column
 * @method AplikasiQuery orderByNmAplikasi($order = Criteria::ASC) Order by the nm_aplikasi column
 * @method AplikasiQuery orderByKetAplikasi($order = Criteria::ASC) Order by the ket_aplikasi column
 * @method AplikasiQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AplikasiQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AplikasiQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method AplikasiQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method AplikasiQuery groupByIdAplikasi() Group by the id_aplikasi column
 * @method AplikasiQuery groupByNmAplikasi() Group by the nm_aplikasi column
 * @method AplikasiQuery groupByKetAplikasi() Group by the ket_aplikasi column
 * @method AplikasiQuery groupByCreateDate() Group by the create_date column
 * @method AplikasiQuery groupByLastUpdate() Group by the last_update column
 * @method AplikasiQuery groupByExpiredDate() Group by the expired_date column
 * @method AplikasiQuery groupByLastSync() Group by the last_sync column
 *
 * @method AplikasiQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AplikasiQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AplikasiQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AplikasiQuery leftJoinMenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Menu relation
 * @method AplikasiQuery rightJoinMenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Menu relation
 * @method AplikasiQuery innerJoinMenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Menu relation
 *
 * @method Aplikasi findOne(PropelPDO $con = null) Return the first Aplikasi matching the query
 * @method Aplikasi findOneOrCreate(PropelPDO $con = null) Return the first Aplikasi matching the query, or a new Aplikasi object populated from the query conditions when no match is found
 *
 * @method Aplikasi findOneByNmAplikasi(string $nm_aplikasi) Return the first Aplikasi filtered by the nm_aplikasi column
 * @method Aplikasi findOneByKetAplikasi(string $ket_aplikasi) Return the first Aplikasi filtered by the ket_aplikasi column
 * @method Aplikasi findOneByCreateDate(string $create_date) Return the first Aplikasi filtered by the create_date column
 * @method Aplikasi findOneByLastUpdate(string $last_update) Return the first Aplikasi filtered by the last_update column
 * @method Aplikasi findOneByExpiredDate(string $expired_date) Return the first Aplikasi filtered by the expired_date column
 * @method Aplikasi findOneByLastSync(string $last_sync) Return the first Aplikasi filtered by the last_sync column
 *
 * @method array findByIdAplikasi(string $id_aplikasi) Return Aplikasi objects filtered by the id_aplikasi column
 * @method array findByNmAplikasi(string $nm_aplikasi) Return Aplikasi objects filtered by the nm_aplikasi column
 * @method array findByKetAplikasi(string $ket_aplikasi) Return Aplikasi objects filtered by the ket_aplikasi column
 * @method array findByCreateDate(string $create_date) Return Aplikasi objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Aplikasi objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Aplikasi objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Aplikasi objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAplikasiQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAplikasiQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Aplikasi', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AplikasiQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AplikasiQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AplikasiQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AplikasiQuery) {
            return $criteria;
        }
        $query = new AplikasiQuery();
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
     * @return   Aplikasi|Aplikasi[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AplikasiPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Aplikasi A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAplikasi($key, $con = null)
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
     * @return                 Aplikasi A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_aplikasi", "nm_aplikasi", "ket_aplikasi", "create_date", "last_update", "expired_date", "last_sync" FROM "man_akses"."aplikasi" WHERE "id_aplikasi" = :p0';
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
            $obj = new Aplikasi();
            $obj->hydrate($row);
            AplikasiPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Aplikasi|Aplikasi[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Aplikasi[]|mixed the list of results, formatted by the current formatter
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
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AplikasiPeer::ID_APLIKASI, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AplikasiPeer::ID_APLIKASI, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_aplikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAplikasi('fooValue');   // WHERE id_aplikasi = 'fooValue'
     * $query->filterByIdAplikasi('%fooValue%'); // WHERE id_aplikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAplikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByIdAplikasi($idAplikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAplikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAplikasi)) {
                $idAplikasi = str_replace('*', '%', $idAplikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::ID_APLIKASI, $idAplikasi, $comparison);
    }

    /**
     * Filter the query on the nm_aplikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByNmAplikasi('fooValue');   // WHERE nm_aplikasi = 'fooValue'
     * $query->filterByNmAplikasi('%fooValue%'); // WHERE nm_aplikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmAplikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByNmAplikasi($nmAplikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmAplikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmAplikasi)) {
                $nmAplikasi = str_replace('*', '%', $nmAplikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::NM_APLIKASI, $nmAplikasi, $comparison);
    }

    /**
     * Filter the query on the ket_aplikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAplikasi('fooValue');   // WHERE ket_aplikasi = 'fooValue'
     * $query->filterByKetAplikasi('%fooValue%'); // WHERE ket_aplikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAplikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByKetAplikasi($ketAplikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAplikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAplikasi)) {
                $ketAplikasi = str_replace('*', '%', $ketAplikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::KET_APLIKASI, $ketAplikasi, $comparison);
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
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AplikasiPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AplikasiPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AplikasiPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AplikasiPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(AplikasiPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(AplikasiPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AplikasiPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AplikasiPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AplikasiPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AplikasiQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenu($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(AplikasiPeer::ID_APLIKASI, $menu->getIdAplikasi(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            return $this
                ->useMenuQuery()
                ->filterByPrimaryKeys($menu->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMenu() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Menu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function joinMenu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Menu');

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
            $this->addJoinObject($join, 'Menu');
        }

        return $this;
    }

    /**
     * Use the Menu relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Menu', '\DataDikdas\Model\MenuQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Aplikasi $aplikasi Object to remove from the list of results
     *
     * @return AplikasiQuery The current query, for fluid interface
     */
    public function prune($aplikasi = null)
    {
        if ($aplikasi) {
            $this->addUsingAlias(AplikasiPeer::ID_APLIKASI, $aplikasi->getIdAplikasi(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
