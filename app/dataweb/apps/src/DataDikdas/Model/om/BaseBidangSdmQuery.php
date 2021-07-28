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
use DataDikdas\Model\BidangSdm;
use DataDikdas\Model\BidangSdmPeer;
use DataDikdas\Model\BidangSdmQuery;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'bidang_sdm' table.
 *
 * 
 *
 * @method BidangSdmQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method BidangSdmQuery orderByBidangStudiId($order = Criteria::ASC) Order by the bidang_studi_id column
 * @method BidangSdmQuery orderByUrutan($order = Criteria::ASC) Order by the urutan column
 * @method BidangSdmQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BidangSdmQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BidangSdmQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BidangSdmQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BidangSdmQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BidangSdmQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BidangSdmQuery groupByPtkId() Group by the ptk_id column
 * @method BidangSdmQuery groupByBidangStudiId() Group by the bidang_studi_id column
 * @method BidangSdmQuery groupByUrutan() Group by the urutan column
 * @method BidangSdmQuery groupByAsalData() Group by the asal_data column
 * @method BidangSdmQuery groupByCreateDate() Group by the create_date column
 * @method BidangSdmQuery groupByLastUpdate() Group by the last_update column
 * @method BidangSdmQuery groupBySoftDelete() Group by the soft_delete column
 * @method BidangSdmQuery groupByLastSync() Group by the last_sync column
 * @method BidangSdmQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BidangSdmQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BidangSdmQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BidangSdmQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BidangSdmQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BidangSdmQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BidangSdmQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BidangSdmQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method BidangSdmQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method BidangSdmQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method BidangSdm findOne(PropelPDO $con = null) Return the first BidangSdm matching the query
 * @method BidangSdm findOneOrCreate(PropelPDO $con = null) Return the first BidangSdm matching the query, or a new BidangSdm object populated from the query conditions when no match is found
 *
 * @method BidangSdm findOneByPtkId(string $ptk_id) Return the first BidangSdm filtered by the ptk_id column
 * @method BidangSdm findOneByBidangStudiId(int $bidang_studi_id) Return the first BidangSdm filtered by the bidang_studi_id column
 * @method BidangSdm findOneByUrutan(string $urutan) Return the first BidangSdm filtered by the urutan column
 * @method BidangSdm findOneByAsalData(string $asal_data) Return the first BidangSdm filtered by the asal_data column
 * @method BidangSdm findOneByCreateDate(string $create_date) Return the first BidangSdm filtered by the create_date column
 * @method BidangSdm findOneByLastUpdate(string $last_update) Return the first BidangSdm filtered by the last_update column
 * @method BidangSdm findOneBySoftDelete(string $soft_delete) Return the first BidangSdm filtered by the soft_delete column
 * @method BidangSdm findOneByLastSync(string $last_sync) Return the first BidangSdm filtered by the last_sync column
 * @method BidangSdm findOneByUpdaterId(string $updater_id) Return the first BidangSdm filtered by the updater_id column
 *
 * @method array findByPtkId(string $ptk_id) Return BidangSdm objects filtered by the ptk_id column
 * @method array findByBidangStudiId(int $bidang_studi_id) Return BidangSdm objects filtered by the bidang_studi_id column
 * @method array findByUrutan(string $urutan) Return BidangSdm objects filtered by the urutan column
 * @method array findByAsalData(string $asal_data) Return BidangSdm objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return BidangSdm objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BidangSdm objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BidangSdm objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BidangSdm objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BidangSdm objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBidangSdmQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBidangSdmQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BidangSdm', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BidangSdmQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BidangSdmQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BidangSdmQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BidangSdmQuery) {
            return $criteria;
        }
        $query = new BidangSdmQuery();
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
                         A Primary key composition: [$ptk_id, $bidang_studi_id, $urutan]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   BidangSdm|BidangSdm[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BidangSdmPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1], (string) $key[2]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BidangSdmPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BidangSdm A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ptk_id", "bidang_studi_id", "urutan", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "bidang_sdm" WHERE "ptk_id" = :p0 AND "bidang_studi_id" = :p1 AND "urutan" = :p2';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);			
            $stmt->bindValue(':p2', $key[2], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new BidangSdm();
            $obj->hydrate($row);
            BidangSdmPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1], (string) $key[2])));
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
     * @return BidangSdm|BidangSdm[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BidangSdm[]|mixed the list of results, formatted by the current formatter
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
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(BidangSdmPeer::PTK_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $key[1], Criteria::EQUAL);
        $this->addUsingAlias(BidangSdmPeer::URUTAN, $key[2], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(BidangSdmPeer::PTK_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(BidangSdmPeer::BIDANG_STUDI_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $cton2 = $this->getNewCriterion(BidangSdmPeer::URUTAN, $key[2], Criteria::EQUAL);
            $cton0->addAnd($cton2);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the bidang_studi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBidangStudiId(1234); // WHERE bidang_studi_id = 1234
     * $query->filterByBidangStudiId(array(12, 34)); // WHERE bidang_studi_id IN (12, 34)
     * $query->filterByBidangStudiId(array('min' => 12)); // WHERE bidang_studi_id >= 12
     * $query->filterByBidangStudiId(array('max' => 12)); // WHERE bidang_studi_id <= 12
     * </code>
     *
     * @see       filterByBidangStudi()
     *
     * @param     mixed $bidangStudiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByBidangStudiId($bidangStudiId = null, $comparison = null)
    {
        if (is_array($bidangStudiId)) {
            $useMinMax = false;
            if (isset($bidangStudiId['min'])) {
                $this->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $bidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bidangStudiId['max'])) {
                $this->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $bidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $bidangStudiId, $comparison);
    }

    /**
     * Filter the query on the urutan column
     *
     * Example usage:
     * <code>
     * $query->filterByUrutan(1234); // WHERE urutan = 1234
     * $query->filterByUrutan(array(12, 34)); // WHERE urutan IN (12, 34)
     * $query->filterByUrutan(array('min' => 12)); // WHERE urutan >= 12
     * $query->filterByUrutan(array('max' => 12)); // WHERE urutan <= 12
     * </code>
     *
     * @param     mixed $urutan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByUrutan($urutan = null, $comparison = null)
    {
        if (is_array($urutan)) {
            $useMinMax = false;
            if (isset($urutan['min'])) {
                $this->addUsingAlias(BidangSdmPeer::URUTAN, $urutan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($urutan['max'])) {
                $this->addUsingAlias(BidangSdmPeer::URUTAN, $urutan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::URUTAN, $urutan, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BidangSdmPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BidangSdmPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BidangSdmPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BidangSdmPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BidangSdmPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BidangSdmPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BidangSdmPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BidangSdmPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BidangSdmPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangSdmQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BidangSdmPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BidangSdmPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BidangSdmQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BidangSdmPeer::BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
        } else {
            throw new PropelException('filterByBidangStudi() only accepts arguments of type BidangStudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangStudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function joinBidangStudi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangStudi');

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
            $this->addJoinObject($join, 'BidangStudi');
        }

        return $this;
    }

    /**
     * Use the BidangStudi relation BidangStudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangStudiQuery A secondary query class using the current class as primary query
     */
    public function useBidangStudiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBidangStudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudi', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BidangSdm $bidangSdm Object to remove from the list of results
     *
     * @return BidangSdmQuery The current query, for fluid interface
     */
    public function prune($bidangSdm = null)
    {
        if ($bidangSdm) {
            $this->addCond('pruneCond0', $this->getAliasedColName(BidangSdmPeer::PTK_ID), $bidangSdm->getPtkId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(BidangSdmPeer::BIDANG_STUDI_ID), $bidangSdm->getBidangStudiId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond2', $this->getAliasedColName(BidangSdmPeer::URUTAN), $bidangSdm->getUrutan(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1', 'pruneCond2'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
