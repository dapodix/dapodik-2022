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
use DataDikdas\Model\DataDynamic;
use DataDikdas\Model\DataDynamicPeer;
use DataDikdas\Model\DataDynamicQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\Variabel;

/**
 * Base class that represents a query for the 'data_dynamic' table.
 *
 * 
 *
 * @method DataDynamicQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method DataDynamicQuery orderByVariabelId($order = Criteria::ASC) Order by the variabel_id column
 * @method DataDynamicQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method DataDynamicQuery orderByValueInt($order = Criteria::ASC) Order by the value_int column
 * @method DataDynamicQuery orderByValueDouble($order = Criteria::ASC) Order by the value_double column
 * @method DataDynamicQuery orderByValueString($order = Criteria::ASC) Order by the value_string column
 * @method DataDynamicQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method DataDynamicQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method DataDynamicQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method DataDynamicQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method DataDynamicQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method DataDynamicQuery groupBySekolahId() Group by the sekolah_id column
 * @method DataDynamicQuery groupByVariabelId() Group by the variabel_id column
 * @method DataDynamicQuery groupByAsalData() Group by the asal_data column
 * @method DataDynamicQuery groupByValueInt() Group by the value_int column
 * @method DataDynamicQuery groupByValueDouble() Group by the value_double column
 * @method DataDynamicQuery groupByValueString() Group by the value_string column
 * @method DataDynamicQuery groupByCreateDate() Group by the create_date column
 * @method DataDynamicQuery groupByLastUpdate() Group by the last_update column
 * @method DataDynamicQuery groupBySoftDelete() Group by the soft_delete column
 * @method DataDynamicQuery groupByLastSync() Group by the last_sync column
 * @method DataDynamicQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method DataDynamicQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DataDynamicQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DataDynamicQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DataDynamicQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method DataDynamicQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method DataDynamicQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method DataDynamicQuery leftJoinVariabel($relationAlias = null) Adds a LEFT JOIN clause to the query using the Variabel relation
 * @method DataDynamicQuery rightJoinVariabel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Variabel relation
 * @method DataDynamicQuery innerJoinVariabel($relationAlias = null) Adds a INNER JOIN clause to the query using the Variabel relation
 *
 * @method DataDynamic findOne(PropelPDO $con = null) Return the first DataDynamic matching the query
 * @method DataDynamic findOneOrCreate(PropelPDO $con = null) Return the first DataDynamic matching the query, or a new DataDynamic object populated from the query conditions when no match is found
 *
 * @method DataDynamic findOneBySekolahId(string $sekolah_id) Return the first DataDynamic filtered by the sekolah_id column
 * @method DataDynamic findOneByVariabelId(string $variabel_id) Return the first DataDynamic filtered by the variabel_id column
 * @method DataDynamic findOneByAsalData(string $asal_data) Return the first DataDynamic filtered by the asal_data column
 * @method DataDynamic findOneByValueInt(int $value_int) Return the first DataDynamic filtered by the value_int column
 * @method DataDynamic findOneByValueDouble(string $value_double) Return the first DataDynamic filtered by the value_double column
 * @method DataDynamic findOneByValueString(string $value_string) Return the first DataDynamic filtered by the value_string column
 * @method DataDynamic findOneByCreateDate(string $create_date) Return the first DataDynamic filtered by the create_date column
 * @method DataDynamic findOneByLastUpdate(string $last_update) Return the first DataDynamic filtered by the last_update column
 * @method DataDynamic findOneBySoftDelete(string $soft_delete) Return the first DataDynamic filtered by the soft_delete column
 * @method DataDynamic findOneByLastSync(string $last_sync) Return the first DataDynamic filtered by the last_sync column
 * @method DataDynamic findOneByUpdaterId(string $updater_id) Return the first DataDynamic filtered by the updater_id column
 *
 * @method array findBySekolahId(string $sekolah_id) Return DataDynamic objects filtered by the sekolah_id column
 * @method array findByVariabelId(string $variabel_id) Return DataDynamic objects filtered by the variabel_id column
 * @method array findByAsalData(string $asal_data) Return DataDynamic objects filtered by the asal_data column
 * @method array findByValueInt(int $value_int) Return DataDynamic objects filtered by the value_int column
 * @method array findByValueDouble(string $value_double) Return DataDynamic objects filtered by the value_double column
 * @method array findByValueString(string $value_string) Return DataDynamic objects filtered by the value_string column
 * @method array findByCreateDate(string $create_date) Return DataDynamic objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return DataDynamic objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return DataDynamic objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return DataDynamic objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return DataDynamic objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDataDynamicQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDataDynamicQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\DataDynamic', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DataDynamicQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DataDynamicQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DataDynamicQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DataDynamicQuery) {
            return $criteria;
        }
        $query = new DataDynamicQuery();
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
                         A Primary key composition: [$sekolah_id, $variabel_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   DataDynamic|DataDynamic[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DataDynamicPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DataDynamicPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 DataDynamic A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "sekolah_id", "variabel_id", "asal_data", "value_int", "value_double", "value_string", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "data_dynamic" WHERE "sekolah_id" = :p0 AND "variabel_id" = :p1';
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
            $obj = new DataDynamic();
            $obj->hydrate($row);
            DataDynamicPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return DataDynamic|DataDynamic[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|DataDynamic[]|mixed the list of results, formatted by the current formatter
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
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(DataDynamicPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(DataDynamicPeer::VARIABEL_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(DataDynamicPeer::SEKOLAH_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(DataDynamicPeer::VARIABEL_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the variabel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByVariabelId('fooValue');   // WHERE variabel_id = 'fooValue'
     * $query->filterByVariabelId('%fooValue%'); // WHERE variabel_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $variabelId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByVariabelId($variabelId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($variabelId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $variabelId)) {
                $variabelId = str_replace('*', '%', $variabelId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::VARIABEL_ID, $variabelId, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DataDynamicPeer::ASAL_DATA, $asalData, $comparison);
    }

    /**
     * Filter the query on the value_int column
     *
     * Example usage:
     * <code>
     * $query->filterByValueInt(1234); // WHERE value_int = 1234
     * $query->filterByValueInt(array(12, 34)); // WHERE value_int IN (12, 34)
     * $query->filterByValueInt(array('min' => 12)); // WHERE value_int >= 12
     * $query->filterByValueInt(array('max' => 12)); // WHERE value_int <= 12
     * </code>
     *
     * @param     mixed $valueInt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByValueInt($valueInt = null, $comparison = null)
    {
        if (is_array($valueInt)) {
            $useMinMax = false;
            if (isset($valueInt['min'])) {
                $this->addUsingAlias(DataDynamicPeer::VALUE_INT, $valueInt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valueInt['max'])) {
                $this->addUsingAlias(DataDynamicPeer::VALUE_INT, $valueInt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::VALUE_INT, $valueInt, $comparison);
    }

    /**
     * Filter the query on the value_double column
     *
     * Example usage:
     * <code>
     * $query->filterByValueDouble(1234); // WHERE value_double = 1234
     * $query->filterByValueDouble(array(12, 34)); // WHERE value_double IN (12, 34)
     * $query->filterByValueDouble(array('min' => 12)); // WHERE value_double >= 12
     * $query->filterByValueDouble(array('max' => 12)); // WHERE value_double <= 12
     * </code>
     *
     * @param     mixed $valueDouble The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByValueDouble($valueDouble = null, $comparison = null)
    {
        if (is_array($valueDouble)) {
            $useMinMax = false;
            if (isset($valueDouble['min'])) {
                $this->addUsingAlias(DataDynamicPeer::VALUE_DOUBLE, $valueDouble['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($valueDouble['max'])) {
                $this->addUsingAlias(DataDynamicPeer::VALUE_DOUBLE, $valueDouble['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::VALUE_DOUBLE, $valueDouble, $comparison);
    }

    /**
     * Filter the query on the value_string column
     *
     * Example usage:
     * <code>
     * $query->filterByValueString('fooValue');   // WHERE value_string = 'fooValue'
     * $query->filterByValueString('%fooValue%'); // WHERE value_string LIKE '%fooValue%'
     * </code>
     *
     * @param     string $valueString The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByValueString($valueString = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($valueString)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $valueString)) {
                $valueString = str_replace('*', '%', $valueString);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::VALUE_STRING, $valueString, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(DataDynamicPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(DataDynamicPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(DataDynamicPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(DataDynamicPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(DataDynamicPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(DataDynamicPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(DataDynamicPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(DataDynamicPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DataDynamicPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return DataDynamicQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DataDynamicPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DataDynamicQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(DataDynamicPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DataDynamicPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

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
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related Variabel object
     *
     * @param   Variabel|PropelObjectCollection $variabel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DataDynamicQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVariabel($variabel, $comparison = null)
    {
        if ($variabel instanceof Variabel) {
            return $this
                ->addUsingAlias(DataDynamicPeer::VARIABEL_ID, $variabel->getVariabelId(), $comparison);
        } elseif ($variabel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DataDynamicPeer::VARIABEL_ID, $variabel->toKeyValue('PrimaryKey', 'VariabelId'), $comparison);
        } else {
            throw new PropelException('filterByVariabel() only accepts arguments of type Variabel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Variabel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function joinVariabel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Variabel');

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
            $this->addJoinObject($join, 'Variabel');
        }

        return $this;
    }

    /**
     * Use the Variabel relation Variabel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VariabelQuery A secondary query class using the current class as primary query
     */
    public function useVariabelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVariabel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Variabel', '\DataDikdas\Model\VariabelQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   DataDynamic $dataDynamic Object to remove from the list of results
     *
     * @return DataDynamicQuery The current query, for fluid interface
     */
    public function prune($dataDynamic = null)
    {
        if ($dataDynamic) {
            $this->addCond('pruneCond0', $this->getAliasedColName(DataDynamicPeer::SEKOLAH_ID), $dataDynamic->getSekolahId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(DataDynamicPeer::VARIABEL_ID), $dataDynamic->getVariabelId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
