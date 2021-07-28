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
use DataDikdas\Model\Inpassing;
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\PangkatGolonganPeer;
use DataDikdas\Model\PangkatGolonganQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RwyKepangkatan;

/**
 * Base class that represents a query for the 'ref.pangkat_golongan' table.
 *
 * 
 *
 * @method PangkatGolonganQuery orderByPangkatGolonganId($order = Criteria::ASC) Order by the pangkat_golongan_id column
 * @method PangkatGolonganQuery orderByKode($order = Criteria::ASC) Order by the kode column
 * @method PangkatGolonganQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PangkatGolonganQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PangkatGolonganQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PangkatGolonganQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method PangkatGolonganQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method PangkatGolonganQuery groupByPangkatGolonganId() Group by the pangkat_golongan_id column
 * @method PangkatGolonganQuery groupByKode() Group by the kode column
 * @method PangkatGolonganQuery groupByNama() Group by the nama column
 * @method PangkatGolonganQuery groupByCreateDate() Group by the create_date column
 * @method PangkatGolonganQuery groupByLastUpdate() Group by the last_update column
 * @method PangkatGolonganQuery groupByExpiredDate() Group by the expired_date column
 * @method PangkatGolonganQuery groupByLastSync() Group by the last_sync column
 *
 * @method PangkatGolonganQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PangkatGolonganQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PangkatGolonganQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PangkatGolonganQuery leftJoinInpassing($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inpassing relation
 * @method PangkatGolonganQuery rightJoinInpassing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inpassing relation
 * @method PangkatGolonganQuery innerJoinInpassing($relationAlias = null) Adds a INNER JOIN clause to the query using the Inpassing relation
 *
 * @method PangkatGolonganQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method PangkatGolonganQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method PangkatGolonganQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method PangkatGolonganQuery leftJoinRiwayatGajiBerkala($relationAlias = null) Adds a LEFT JOIN clause to the query using the RiwayatGajiBerkala relation
 * @method PangkatGolonganQuery rightJoinRiwayatGajiBerkala($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RiwayatGajiBerkala relation
 * @method PangkatGolonganQuery innerJoinRiwayatGajiBerkala($relationAlias = null) Adds a INNER JOIN clause to the query using the RiwayatGajiBerkala relation
 *
 * @method PangkatGolonganQuery leftJoinRwyKepangkatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKepangkatan relation
 * @method PangkatGolonganQuery rightJoinRwyKepangkatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKepangkatan relation
 * @method PangkatGolonganQuery innerJoinRwyKepangkatan($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKepangkatan relation
 *
 * @method PangkatGolongan findOne(PropelPDO $con = null) Return the first PangkatGolongan matching the query
 * @method PangkatGolongan findOneOrCreate(PropelPDO $con = null) Return the first PangkatGolongan matching the query, or a new PangkatGolongan object populated from the query conditions when no match is found
 *
 * @method PangkatGolongan findOneByKode(string $kode) Return the first PangkatGolongan filtered by the kode column
 * @method PangkatGolongan findOneByNama(string $nama) Return the first PangkatGolongan filtered by the nama column
 * @method PangkatGolongan findOneByCreateDate(string $create_date) Return the first PangkatGolongan filtered by the create_date column
 * @method PangkatGolongan findOneByLastUpdate(string $last_update) Return the first PangkatGolongan filtered by the last_update column
 * @method PangkatGolongan findOneByExpiredDate(string $expired_date) Return the first PangkatGolongan filtered by the expired_date column
 * @method PangkatGolongan findOneByLastSync(string $last_sync) Return the first PangkatGolongan filtered by the last_sync column
 *
 * @method array findByPangkatGolonganId(string $pangkat_golongan_id) Return PangkatGolongan objects filtered by the pangkat_golongan_id column
 * @method array findByKode(string $kode) Return PangkatGolongan objects filtered by the kode column
 * @method array findByNama(string $nama) Return PangkatGolongan objects filtered by the nama column
 * @method array findByCreateDate(string $create_date) Return PangkatGolongan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PangkatGolongan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return PangkatGolongan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return PangkatGolongan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePangkatGolonganQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePangkatGolonganQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PangkatGolongan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PangkatGolonganQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PangkatGolonganQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PangkatGolonganQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PangkatGolonganQuery) {
            return $criteria;
        }
        $query = new PangkatGolonganQuery();
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
     * @return   PangkatGolongan|PangkatGolongan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PangkatGolonganPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PangkatGolonganPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PangkatGolongan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPangkatGolonganId($key, $con = null)
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
     * @return                 PangkatGolongan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pangkat_golongan_id", "kode", "nama", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."pangkat_golongan" WHERE "pangkat_golongan_id" = :p0';
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
            $obj = new PangkatGolongan();
            $obj->hydrate($row);
            PangkatGolonganPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PangkatGolongan|PangkatGolongan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PangkatGolongan[]|mixed the list of results, formatted by the current formatter
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
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the pangkat_golongan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPangkatGolonganId(1234); // WHERE pangkat_golongan_id = 1234
     * $query->filterByPangkatGolonganId(array(12, 34)); // WHERE pangkat_golongan_id IN (12, 34)
     * $query->filterByPangkatGolonganId(array('min' => 12)); // WHERE pangkat_golongan_id >= 12
     * $query->filterByPangkatGolonganId(array('max' => 12)); // WHERE pangkat_golongan_id <= 12
     * </code>
     *
     * @param     mixed $pangkatGolonganId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByPangkatGolonganId($pangkatGolonganId = null, $comparison = null)
    {
        if (is_array($pangkatGolonganId)) {
            $useMinMax = false;
            if (isset($pangkatGolonganId['min'])) {
                $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pangkatGolonganId['max'])) {
                $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId, $comparison);
    }

    /**
     * Filter the query on the kode column
     *
     * Example usage:
     * <code>
     * $query->filterByKode('fooValue');   // WHERE kode = 'fooValue'
     * $query->filterByKode('%fooValue%'); // WHERE kode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByKode($kode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kode)) {
                $kode = str_replace('*', '%', $kode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::KODE, $kode, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::NAMA, $nama, $comparison);
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
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PangkatGolonganPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PangkatGolonganPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PangkatGolonganPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PangkatGolonganPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(PangkatGolonganPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(PangkatGolonganPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PangkatGolonganPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PangkatGolonganPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PangkatGolonganPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Inpassing object
     *
     * @param   Inpassing|PropelObjectCollection $inpassing  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PangkatGolonganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInpassing($inpassing, $comparison = null)
    {
        if ($inpassing instanceof Inpassing) {
            return $this
                ->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $inpassing->getPangkatGolonganId(), $comparison);
        } elseif ($inpassing instanceof PropelObjectCollection) {
            return $this
                ->useInpassingQuery()
                ->filterByPrimaryKeys($inpassing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInpassing() only accepts arguments of type Inpassing or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inpassing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function joinInpassing($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inpassing');

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
            $this->addJoinObject($join, 'Inpassing');
        }

        return $this;
    }

    /**
     * Use the Inpassing relation Inpassing object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InpassingQuery A secondary query class using the current class as primary query
     */
    public function useInpassingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinInpassing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inpassing', '\DataDikdas\Model\InpassingQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PangkatGolonganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $ptk->getPangkatGolonganId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            return $this
                ->usePtkQuery()
                ->filterByPrimaryKeys($ptk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtk() only accepts arguments of type Ptk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ptk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ptk');

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
            $this->addJoinObject($join, 'Ptk');
        }

        return $this;
    }

    /**
     * Use the Ptk relation Ptk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkQuery A secondary query class using the current class as primary query
     */
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related RiwayatGajiBerkala object
     *
     * @param   RiwayatGajiBerkala|PropelObjectCollection $riwayatGajiBerkala  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PangkatGolonganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRiwayatGajiBerkala($riwayatGajiBerkala, $comparison = null)
    {
        if ($riwayatGajiBerkala instanceof RiwayatGajiBerkala) {
            return $this
                ->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $riwayatGajiBerkala->getPangkatGolonganId(), $comparison);
        } elseif ($riwayatGajiBerkala instanceof PropelObjectCollection) {
            return $this
                ->useRiwayatGajiBerkalaQuery()
                ->filterByPrimaryKeys($riwayatGajiBerkala->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRiwayatGajiBerkala() only accepts arguments of type RiwayatGajiBerkala or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RiwayatGajiBerkala relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function joinRiwayatGajiBerkala($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RiwayatGajiBerkala');

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
            $this->addJoinObject($join, 'RiwayatGajiBerkala');
        }

        return $this;
    }

    /**
     * Use the RiwayatGajiBerkala relation RiwayatGajiBerkala object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RiwayatGajiBerkalaQuery A secondary query class using the current class as primary query
     */
    public function useRiwayatGajiBerkalaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRiwayatGajiBerkala($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RiwayatGajiBerkala', '\DataDikdas\Model\RiwayatGajiBerkalaQuery');
    }

    /**
     * Filter the query by a related RwyKepangkatan object
     *
     * @param   RwyKepangkatan|PropelObjectCollection $rwyKepangkatan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PangkatGolonganQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKepangkatan($rwyKepangkatan, $comparison = null)
    {
        if ($rwyKepangkatan instanceof RwyKepangkatan) {
            return $this
                ->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $rwyKepangkatan->getPangkatGolonganId(), $comparison);
        } elseif ($rwyKepangkatan instanceof PropelObjectCollection) {
            return $this
                ->useRwyKepangkatanQuery()
                ->filterByPrimaryKeys($rwyKepangkatan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKepangkatan() only accepts arguments of type RwyKepangkatan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKepangkatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function joinRwyKepangkatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKepangkatan');

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
            $this->addJoinObject($join, 'RwyKepangkatan');
        }

        return $this;
    }

    /**
     * Use the RwyKepangkatan relation RwyKepangkatan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKepangkatanQuery A secondary query class using the current class as primary query
     */
    public function useRwyKepangkatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyKepangkatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKepangkatan', '\DataDikdas\Model\RwyKepangkatanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PangkatGolongan $pangkatGolongan Object to remove from the list of results
     *
     * @return PangkatGolonganQuery The current query, for fluid interface
     */
    public function prune($pangkatGolongan = null)
    {
        if ($pangkatGolongan) {
            $this->addUsingAlias(PangkatGolonganPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->getPangkatGolonganId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
