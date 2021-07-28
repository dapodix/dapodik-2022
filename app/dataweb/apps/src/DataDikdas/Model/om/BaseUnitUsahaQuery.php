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
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\UnitUsahaPeer;
use DataDikdas\Model\UnitUsahaQuery;

/**
 * Base class that represents a query for the 'unit_usaha' table.
 *
 * 
 *
 * @method UnitUsahaQuery orderByUnitUsahaId($order = Criteria::ASC) Order by the unit_usaha_id column
 * @method UnitUsahaQuery orderByKelompokUsahaId($order = Criteria::ASC) Order by the kelompok_usaha_id column
 * @method UnitUsahaQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method UnitUsahaQuery orderByNamaUnitUsaha($order = Criteria::ASC) Order by the nama_unit_usaha column
 * @method UnitUsahaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method UnitUsahaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method UnitUsahaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method UnitUsahaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method UnitUsahaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method UnitUsahaQuery groupByUnitUsahaId() Group by the unit_usaha_id column
 * @method UnitUsahaQuery groupByKelompokUsahaId() Group by the kelompok_usaha_id column
 * @method UnitUsahaQuery groupBySekolahId() Group by the sekolah_id column
 * @method UnitUsahaQuery groupByNamaUnitUsaha() Group by the nama_unit_usaha column
 * @method UnitUsahaQuery groupByCreateDate() Group by the create_date column
 * @method UnitUsahaQuery groupByLastUpdate() Group by the last_update column
 * @method UnitUsahaQuery groupBySoftDelete() Group by the soft_delete column
 * @method UnitUsahaQuery groupByLastSync() Group by the last_sync column
 * @method UnitUsahaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method UnitUsahaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UnitUsahaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UnitUsahaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UnitUsahaQuery leftJoinKelompokUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelompokUsaha relation
 * @method UnitUsahaQuery rightJoinKelompokUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelompokUsaha relation
 * @method UnitUsahaQuery innerJoinKelompokUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the KelompokUsaha relation
 *
 * @method UnitUsahaQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method UnitUsahaQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method UnitUsahaQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method UnitUsahaQuery leftJoinUnitUsahaKerjasama($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method UnitUsahaQuery rightJoinUnitUsahaKerjasama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsahaKerjasama relation
 * @method UnitUsahaQuery innerJoinUnitUsahaKerjasama($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsahaKerjasama relation
 *
 * @method UnitUsaha findOne(PropelPDO $con = null) Return the first UnitUsaha matching the query
 * @method UnitUsaha findOneOrCreate(PropelPDO $con = null) Return the first UnitUsaha matching the query, or a new UnitUsaha object populated from the query conditions when no match is found
 *
 * @method UnitUsaha findOneByKelompokUsahaId(string $kelompok_usaha_id) Return the first UnitUsaha filtered by the kelompok_usaha_id column
 * @method UnitUsaha findOneBySekolahId(string $sekolah_id) Return the first UnitUsaha filtered by the sekolah_id column
 * @method UnitUsaha findOneByNamaUnitUsaha(string $nama_unit_usaha) Return the first UnitUsaha filtered by the nama_unit_usaha column
 * @method UnitUsaha findOneByCreateDate(string $create_date) Return the first UnitUsaha filtered by the create_date column
 * @method UnitUsaha findOneByLastUpdate(string $last_update) Return the first UnitUsaha filtered by the last_update column
 * @method UnitUsaha findOneBySoftDelete(string $soft_delete) Return the first UnitUsaha filtered by the soft_delete column
 * @method UnitUsaha findOneByLastSync(string $last_sync) Return the first UnitUsaha filtered by the last_sync column
 * @method UnitUsaha findOneByUpdaterId(string $updater_id) Return the first UnitUsaha filtered by the updater_id column
 *
 * @method array findByUnitUsahaId(string $unit_usaha_id) Return UnitUsaha objects filtered by the unit_usaha_id column
 * @method array findByKelompokUsahaId(string $kelompok_usaha_id) Return UnitUsaha objects filtered by the kelompok_usaha_id column
 * @method array findBySekolahId(string $sekolah_id) Return UnitUsaha objects filtered by the sekolah_id column
 * @method array findByNamaUnitUsaha(string $nama_unit_usaha) Return UnitUsaha objects filtered by the nama_unit_usaha column
 * @method array findByCreateDate(string $create_date) Return UnitUsaha objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return UnitUsaha objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return UnitUsaha objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return UnitUsaha objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return UnitUsaha objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnitUsahaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUnitUsahaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\UnitUsaha', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UnitUsahaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UnitUsahaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UnitUsahaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UnitUsahaQuery) {
            return $criteria;
        }
        $query = new UnitUsahaQuery();
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
     * @return   UnitUsaha|UnitUsaha[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UnitUsahaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 UnitUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByUnitUsahaId($key, $con = null)
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
     * @return                 UnitUsaha A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "unit_usaha_id", "kelompok_usaha_id", "sekolah_id", "nama_unit_usaha", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "unit_usaha" WHERE "unit_usaha_id" = :p0';
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
            $obj = new UnitUsaha();
            $obj->hydrate($row);
            UnitUsahaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return UnitUsaha|UnitUsaha[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|UnitUsaha[]|mixed the list of results, formatted by the current formatter
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
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UnitUsahaPeer::UNIT_USAHA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UnitUsahaPeer::UNIT_USAHA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the unit_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitUsahaId('fooValue');   // WHERE unit_usaha_id = 'fooValue'
     * $query->filterByUnitUsahaId('%fooValue%'); // WHERE unit_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unitUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByUnitUsahaId($unitUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unitUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unitUsahaId)) {
                $unitUsahaId = str_replace('*', '%', $unitUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::UNIT_USAHA_ID, $unitUsahaId, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UnitUsahaPeer::KELOMPOK_USAHA_ID, $kelompokUsahaId, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UnitUsahaPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the nama_unit_usaha column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaUnitUsaha('fooValue');   // WHERE nama_unit_usaha = 'fooValue'
     * $query->filterByNamaUnitUsaha('%fooValue%'); // WHERE nama_unit_usaha LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaUnitUsaha The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByNamaUnitUsaha($namaUnitUsaha = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaUnitUsaha)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaUnitUsaha)) {
                $namaUnitUsaha = str_replace('*', '%', $namaUnitUsaha);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::NAMA_UNIT_USAHA, $namaUnitUsaha, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(UnitUsahaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(UnitUsahaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(UnitUsahaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(UnitUsahaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(UnitUsahaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(UnitUsahaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(UnitUsahaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(UnitUsahaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UnitUsahaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related KelompokUsaha object
     *
     * @param   KelompokUsaha|PropelObjectCollection $kelompokUsaha The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelompokUsaha($kelompokUsaha, $comparison = null)
    {
        if ($kelompokUsaha instanceof KelompokUsaha) {
            return $this
                ->addUsingAlias(UnitUsahaPeer::KELOMPOK_USAHA_ID, $kelompokUsaha->getKelompokUsahaId(), $comparison);
        } elseif ($kelompokUsaha instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnitUsahaPeer::KELOMPOK_USAHA_ID, $kelompokUsaha->toKeyValue('PrimaryKey', 'KelompokUsahaId'), $comparison);
        } else {
            throw new PropelException('filterByKelompokUsaha() only accepts arguments of type KelompokUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelompokUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function joinKelompokUsaha($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelompokUsaha');

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
            $this->addJoinObject($join, 'KelompokUsaha');
        }

        return $this;
    }

    /**
     * Use the KelompokUsaha relation KelompokUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelompokUsahaQuery A secondary query class using the current class as primary query
     */
    public function useKelompokUsahaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKelompokUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelompokUsaha', '\DataDikdas\Model\KelompokUsahaQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(UnitUsahaPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnitUsahaPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return UnitUsahaQuery The current query, for fluid interface
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
     * Filter the query by a related UnitUsahaKerjasama object
     *
     * @param   UnitUsahaKerjasama|PropelObjectCollection $unitUsahaKerjasama  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsahaKerjasama($unitUsahaKerjasama, $comparison = null)
    {
        if ($unitUsahaKerjasama instanceof UnitUsahaKerjasama) {
            return $this
                ->addUsingAlias(UnitUsahaPeer::UNIT_USAHA_ID, $unitUsahaKerjasama->getUnitUsahaId(), $comparison);
        } elseif ($unitUsahaKerjasama instanceof PropelObjectCollection) {
            return $this
                ->useUnitUsahaKerjasamaQuery()
                ->filterByPrimaryKeys($unitUsahaKerjasama->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUnitUsahaKerjasama() only accepts arguments of type UnitUsahaKerjasama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsahaKerjasama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function joinUnitUsahaKerjasama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsahaKerjasama');

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
            $this->addJoinObject($join, 'UnitUsahaKerjasama');
        }

        return $this;
    }

    /**
     * Use the UnitUsahaKerjasama relation UnitUsahaKerjasama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaKerjasamaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaKerjasamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsahaKerjasama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsahaKerjasama', '\DataDikdas\Model\UnitUsahaKerjasamaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UnitUsaha $unitUsaha Object to remove from the list of results
     *
     * @return UnitUsahaQuery The current query, for fluid interface
     */
    public function prune($unitUsaha = null)
    {
        if ($unitUsaha) {
            $this->addUsingAlias(UnitUsahaPeer::UNIT_USAHA_ID, $unitUsaha->getUnitUsahaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
