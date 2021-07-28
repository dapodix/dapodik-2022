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
use DataDikdas\Model\KelompokUsaha;
use DataDikdas\Model\KelompokUsahaPeer;
use DataDikdas\Model\KelompokUsahaQuery;
use DataDikdas\Model\UnitUsaha;

/**
 * Base class that represents a query for the 'ref.kelompok_usaha' table.
 *
 * 
 *
 * @method KelompokUsahaQuery orderByKelompokUsahaId($order = Criteria::ASC) Order by the kelompok_usaha_id column
 * @method KelompokUsahaQuery orderByNamaKelompokUsaha($order = Criteria::ASC) Order by the nama_kelompok_usaha column
 * @method KelompokUsahaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KelompokUsahaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KelompokUsahaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method KelompokUsahaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method KelompokUsahaQuery groupByKelompokUsahaId() Group by the kelompok_usaha_id column
 * @method KelompokUsahaQuery groupByNamaKelompokUsaha() Group by the nama_kelompok_usaha column
 * @method KelompokUsahaQuery groupByCreateDate() Group by the create_date column
 * @method KelompokUsahaQuery groupByLastUpdate() Group by the last_update column
 * @method KelompokUsahaQuery groupByExpiredDate() Group by the expired_date column
 * @method KelompokUsahaQuery groupByLastSync() Group by the last_sync column
 *
 * @method KelompokUsahaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KelompokUsahaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KelompokUsahaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KelompokUsahaQuery leftJoinUnitUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsaha relation
 * @method KelompokUsahaQuery rightJoinUnitUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsaha relation
 * @method KelompokUsahaQuery innerJoinUnitUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsaha relation
 *
 * @method KelompokUsaha findOne(PropelPDO $con = null) Return the first KelompokUsaha matching the query
 * @method KelompokUsaha findOneOrCreate(PropelPDO $con = null) Return the first KelompokUsaha matching the query, or a new KelompokUsaha object populated from the query conditions when no match is found
 *
 * @method KelompokUsaha findOneByNamaKelompokUsaha(string $nama_kelompok_usaha) Return the first KelompokUsaha filtered by the nama_kelompok_usaha column
 * @method KelompokUsaha findOneByCreateDate(string $create_date) Return the first KelompokUsaha filtered by the create_date column
 * @method KelompokUsaha findOneByLastUpdate(string $last_update) Return the first KelompokUsaha filtered by the last_update column
 * @method KelompokUsaha findOneByExpiredDate(string $expired_date) Return the first KelompokUsaha filtered by the expired_date column
 * @method KelompokUsaha findOneByLastSync(string $last_sync) Return the first KelompokUsaha filtered by the last_sync column
 *
 * @method array findByKelompokUsahaId(string $kelompok_usaha_id) Return KelompokUsaha objects filtered by the kelompok_usaha_id column
 * @method array findByNamaKelompokUsaha(string $nama_kelompok_usaha) Return KelompokUsaha objects filtered by the nama_kelompok_usaha column
 * @method array findByCreateDate(string $create_date) Return KelompokUsaha objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KelompokUsaha objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return KelompokUsaha objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return KelompokUsaha objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelompokUsahaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKelompokUsahaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KelompokUsaha', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KelompokUsahaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KelompokUsahaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KelompokUsahaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KelompokUsahaQuery) {
            return $criteria;
        }
        $query = new KelompokUsahaQuery();
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
     * @return   KelompokUsaha|KelompokUsaha[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KelompokUsahaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KelompokUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KelompokUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKelompokUsahaId($key, $con = null)
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
     * @return                 KelompokUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "kelompok_usaha_id", "nama_kelompok_usaha", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."kelompok_usaha" WHERE "kelompok_usaha_id" = :p0';
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
            $obj = new KelompokUsaha();
            $obj->hydrate($row);
            KelompokUsahaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KelompokUsaha|KelompokUsaha[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KelompokUsaha[]|mixed the list of results, formatted by the current formatter
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
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KelompokUsahaPeer::KELOMPOK_USAHA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KelompokUsahaPeer::KELOMPOK_USAHA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the kelompok_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKelompokUsahaId('fooValue');   // WHERE kelompok_usaha_id = 'fooValue'
     * $query->filterByKelompokUsahaId('%fooValue%'); // WHERE kelompok_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kelompokUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByKelompokUsahaId($kelompokUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kelompokUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kelompokUsahaId)) {
                $kelompokUsahaId = str_replace('*', '%', $kelompokUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::KELOMPOK_USAHA_ID, $kelompokUsahaId, $comparison);
    }

    /**
     * Filter the query on the nama_kelompok_usaha column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaKelompokUsaha('fooValue');   // WHERE nama_kelompok_usaha = 'fooValue'
     * $query->filterByNamaKelompokUsaha('%fooValue%'); // WHERE nama_kelompok_usaha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaKelompokUsaha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByNamaKelompokUsaha($namaKelompokUsaha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaKelompokUsaha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaKelompokUsaha)) {
                $namaKelompokUsaha = str_replace('*', '%', $namaKelompokUsaha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::NAMA_KELOMPOK_USAHA, $namaKelompokUsaha, $comparison);
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
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KelompokUsahaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KelompokUsahaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KelompokUsahaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KelompokUsahaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(KelompokUsahaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(KelompokUsahaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KelompokUsahaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KelompokUsahaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KelompokUsahaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related UnitUsaha object
     *
     * @param   UnitUsaha|PropelObjectCollection $unitUsaha  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KelompokUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsaha($unitUsaha, $comparison = null)
    {
        if ($unitUsaha instanceof UnitUsaha) {
            return $this
                ->addUsingAlias(KelompokUsahaPeer::KELOMPOK_USAHA_ID, $unitUsaha->getKelompokUsahaId(), $comparison);
        } elseif ($unitUsaha instanceof PropelObjectCollection) {
            return $this
                ->useUnitUsahaQuery()
                ->filterByPrimaryKeys($unitUsaha->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUnitUsaha() only accepts arguments of type UnitUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function joinUnitUsaha($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsaha');

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
            $this->addJoinObject($join, 'UnitUsaha');
        }

        return $this;
    }

    /**
     * Use the UnitUsaha relation UnitUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsaha', '\DataDikdas\Model\UnitUsahaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KelompokUsaha $kelompokUsaha Object to remove from the list of results
     *
     * @return KelompokUsahaQuery The current query, for fluid interface
     */
    public function prune($kelompokUsaha = null)
    {
        if ($kelompokUsaha) {
            $this->addUsingAlias(KelompokUsahaPeer::KELOMPOK_USAHA_ID, $kelompokUsaha->getKelompokUsahaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
