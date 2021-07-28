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
use DataDikdas\Model\GuruSasaranPengawas;
use DataDikdas\Model\GuruSasaranPengawasPeer;
use DataDikdas\Model\GuruSasaranPengawasQuery;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PtkTerdaftar;

/**
 * Base class that represents a query for the 'guru_sasaran_pengawas' table.
 *
 * 
 *
 * @method GuruSasaranPengawasQuery orderByPengawasTerdaftarId($order = Criteria::ASC) Order by the pengawas_terdaftar_id column
 * @method GuruSasaranPengawasQuery orderByPtkTerdaftarId($order = Criteria::ASC) Order by the ptk_terdaftar_id column
 * @method GuruSasaranPengawasQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method GuruSasaranPengawasQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method GuruSasaranPengawasQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method GuruSasaranPengawasQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method GuruSasaranPengawasQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method GuruSasaranPengawasQuery groupByPengawasTerdaftarId() Group by the pengawas_terdaftar_id column
 * @method GuruSasaranPengawasQuery groupByPtkTerdaftarId() Group by the ptk_terdaftar_id column
 * @method GuruSasaranPengawasQuery groupByCreateDate() Group by the create_date column
 * @method GuruSasaranPengawasQuery groupByLastUpdate() Group by the last_update column
 * @method GuruSasaranPengawasQuery groupBySoftDelete() Group by the soft_delete column
 * @method GuruSasaranPengawasQuery groupByLastSync() Group by the last_sync column
 * @method GuruSasaranPengawasQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method GuruSasaranPengawasQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method GuruSasaranPengawasQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method GuruSasaranPengawasQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method GuruSasaranPengawasQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method GuruSasaranPengawasQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method GuruSasaranPengawasQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method GuruSasaranPengawasQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method GuruSasaranPengawasQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method GuruSasaranPengawasQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method GuruSasaranPengawas findOne(PropelPDO $con = null) Return the first GuruSasaranPengawas matching the query
 * @method GuruSasaranPengawas findOneOrCreate(PropelPDO $con = null) Return the first GuruSasaranPengawas matching the query, or a new GuruSasaranPengawas object populated from the query conditions when no match is found
 *
 * @method GuruSasaranPengawas findOneByPengawasTerdaftarId(string $pengawas_terdaftar_id) Return the first GuruSasaranPengawas filtered by the pengawas_terdaftar_id column
 * @method GuruSasaranPengawas findOneByPtkTerdaftarId(string $ptk_terdaftar_id) Return the first GuruSasaranPengawas filtered by the ptk_terdaftar_id column
 * @method GuruSasaranPengawas findOneByCreateDate(string $create_date) Return the first GuruSasaranPengawas filtered by the create_date column
 * @method GuruSasaranPengawas findOneByLastUpdate(string $last_update) Return the first GuruSasaranPengawas filtered by the last_update column
 * @method GuruSasaranPengawas findOneBySoftDelete(string $soft_delete) Return the first GuruSasaranPengawas filtered by the soft_delete column
 * @method GuruSasaranPengawas findOneByLastSync(string $last_sync) Return the first GuruSasaranPengawas filtered by the last_sync column
 * @method GuruSasaranPengawas findOneByUpdaterId(string $updater_id) Return the first GuruSasaranPengawas filtered by the updater_id column
 *
 * @method array findByPengawasTerdaftarId(string $pengawas_terdaftar_id) Return GuruSasaranPengawas objects filtered by the pengawas_terdaftar_id column
 * @method array findByPtkTerdaftarId(string $ptk_terdaftar_id) Return GuruSasaranPengawas objects filtered by the ptk_terdaftar_id column
 * @method array findByCreateDate(string $create_date) Return GuruSasaranPengawas objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return GuruSasaranPengawas objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return GuruSasaranPengawas objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return GuruSasaranPengawas objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return GuruSasaranPengawas objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGuruSasaranPengawasQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseGuruSasaranPengawasQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\GuruSasaranPengawas', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new GuruSasaranPengawasQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   GuruSasaranPengawasQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return GuruSasaranPengawasQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof GuruSasaranPengawasQuery) {
            return $criteria;
        }
        $query = new GuruSasaranPengawasQuery();
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
                         A Primary key composition: [$pengawas_terdaftar_id, $ptk_terdaftar_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   GuruSasaranPengawas|GuruSasaranPengawas[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = GuruSasaranPengawasPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(GuruSasaranPengawasPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 GuruSasaranPengawas A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "pengawas_terdaftar_id", "ptk_terdaftar_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "guru_sasaran_pengawas" WHERE "pengawas_terdaftar_id" = :p0 AND "ptk_terdaftar_id" = :p1';
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
            $obj = new GuruSasaranPengawas();
            $obj->hydrate($row);
            GuruSasaranPengawasPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return GuruSasaranPengawas|GuruSasaranPengawas[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|GuruSasaranPengawas[]|mixed the list of results, formatted by the current formatter
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the pengawas_terdaftar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasTerdaftarId('fooValue');   // WHERE pengawas_terdaftar_id = 'fooValue'
     * $query->filterByPengawasTerdaftarId('%fooValue%'); // WHERE pengawas_terdaftar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pengawasTerdaftarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByPengawasTerdaftarId($pengawasTerdaftarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pengawasTerdaftarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pengawasTerdaftarId)) {
                $pengawasTerdaftarId = str_replace('*', '%', $pengawasTerdaftarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID, $pengawasTerdaftarId, $comparison);
    }

    /**
     * Filter the query on the ptk_terdaftar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkTerdaftarId('fooValue');   // WHERE ptk_terdaftar_id = 'fooValue'
     * $query->filterByPtkTerdaftarId('%fooValue%'); // WHERE ptk_terdaftar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkTerdaftarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByPtkTerdaftarId($ptkTerdaftarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkTerdaftarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkTerdaftarId)) {
                $ptkTerdaftarId = str_replace('*', '%', $ptkTerdaftarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID, $ptkTerdaftarId, $comparison);
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(GuruSasaranPengawasPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
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

        return $this->addUsingAlias(GuruSasaranPengawasPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GuruSasaranPengawasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID, $pengawasTerdaftar->getPengawasTerdaftarId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID, $pengawasTerdaftar->toKeyValue('PrimaryKey', 'PengawasTerdaftarId'), $comparison);
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 GuruSasaranPengawasQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID, $ptkTerdaftar->getPtkTerdaftarId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID, $ptkTerdaftar->toKeyValue('PrimaryKey', 'PtkTerdaftarId'), $comparison);
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

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
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   GuruSasaranPengawas $guruSasaranPengawas Object to remove from the list of results
     *
     * @return GuruSasaranPengawasQuery The current query, for fluid interface
     */
    public function prune($guruSasaranPengawas = null)
    {
        if ($guruSasaranPengawas) {
            $this->addCond('pruneCond0', $this->getAliasedColName(GuruSasaranPengawasPeer::PENGAWAS_TERDAFTAR_ID), $guruSasaranPengawas->getPengawasTerdaftarId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(GuruSasaranPengawasPeer::PTK_TERDAFTAR_ID), $guruSasaranPengawas->getPtkTerdaftarId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
