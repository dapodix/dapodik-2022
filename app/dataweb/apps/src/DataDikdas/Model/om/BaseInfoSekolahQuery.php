<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\InfoSekolah;
use DataDikdas\Model\InfoSekolahPeer;
use DataDikdas\Model\InfoSekolahQuery;

/**
 * Base class that represents a query for the 'info_sekolah' table.
 *
 * 
 *
 * @method InfoSekolahQuery orderByInfoSekolahId($order = Criteria::ASC) Order by the info_sekolah_id column
 * @method InfoSekolahQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method InfoSekolahQuery orderByGambar($order = Criteria::ASC) Order by the gambar column
 * @method InfoSekolahQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method InfoSekolahQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method InfoSekolahQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method InfoSekolahQuery groupByInfoSekolahId() Group by the info_sekolah_id column
 * @method InfoSekolahQuery groupBySekolahId() Group by the sekolah_id column
 * @method InfoSekolahQuery groupByGambar() Group by the gambar column
 * @method InfoSekolahQuery groupBySoftDelete() Group by the soft_delete column
 * @method InfoSekolahQuery groupByLastUpdate() Group by the last_update column
 * @method InfoSekolahQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method InfoSekolahQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InfoSekolahQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InfoSekolahQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InfoSekolah findOne(PropelPDO $con = null) Return the first InfoSekolah matching the query
 * @method InfoSekolah findOneOrCreate(PropelPDO $con = null) Return the first InfoSekolah matching the query, or a new InfoSekolah object populated from the query conditions when no match is found
 *
 * @method InfoSekolah findOneBySekolahId(string $sekolah_id) Return the first InfoSekolah filtered by the sekolah_id column
 * @method InfoSekolah findOneByGambar(string $gambar) Return the first InfoSekolah filtered by the gambar column
 * @method InfoSekolah findOneBySoftDelete(int $soft_delete) Return the first InfoSekolah filtered by the soft_delete column
 * @method InfoSekolah findOneByLastUpdate(string $last_update) Return the first InfoSekolah filtered by the last_update column
 * @method InfoSekolah findOneByUpdaterId(string $updater_id) Return the first InfoSekolah filtered by the updater_id column
 *
 * @method array findByInfoSekolahId(string $info_sekolah_id) Return InfoSekolah objects filtered by the info_sekolah_id column
 * @method array findBySekolahId(string $sekolah_id) Return InfoSekolah objects filtered by the sekolah_id column
 * @method array findByGambar(string $gambar) Return InfoSekolah objects filtered by the gambar column
 * @method array findBySoftDelete(int $soft_delete) Return InfoSekolah objects filtered by the soft_delete column
 * @method array findByLastUpdate(string $last_update) Return InfoSekolah objects filtered by the last_update column
 * @method array findByUpdaterId(string $updater_id) Return InfoSekolah objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseInfoSekolahQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInfoSekolahQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'dapodik_app', $modelName = 'DataDikdas\\Model\\InfoSekolah', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InfoSekolahQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InfoSekolahQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InfoSekolahQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InfoSekolahQuery) {
            return $criteria;
        }
        $query = new InfoSekolahQuery();
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
     * @return   InfoSekolah|InfoSekolah[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InfoSekolahPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InfoSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 InfoSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByInfoSekolahId($key, $con = null)
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
     * @return                 InfoSekolah A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "info_sekolah_id", "sekolah_id", "gambar", "soft_delete", "last_update", "updater_id" FROM "info_sekolah" WHERE "info_sekolah_id" = :p0';
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
            $obj = new InfoSekolah();
            $obj->hydrate($row);
            InfoSekolahPeer::addInstanceToPool($obj, (string) $key);
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
     * @return InfoSekolah|InfoSekolah[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|InfoSekolah[]|mixed the list of results, formatted by the current formatter
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
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InfoSekolahPeer::INFO_SEKOLAH_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InfoSekolahPeer::INFO_SEKOLAH_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the info_sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInfoSekolahId('fooValue');   // WHERE info_sekolah_id = 'fooValue'
     * $query->filterByInfoSekolahId('%fooValue%'); // WHERE info_sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $infoSekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterByInfoSekolahId($infoSekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($infoSekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $infoSekolahId)) {
                $infoSekolahId = str_replace('*', '%', $infoSekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InfoSekolahPeer::INFO_SEKOLAH_ID, $infoSekolahId, $comparison);
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
     * @return InfoSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InfoSekolahPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the gambar column
     *
     * Example usage:
     * <code>
     * $query->filterByGambar('fooValue');   // WHERE gambar = 'fooValue'
     * $query->filterByGambar('%fooValue%'); // WHERE gambar LIKE '%fooValue%'
     * </code>
     *
     * @param     string $gambar The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterByGambar($gambar = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($gambar)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $gambar)) {
                $gambar = str_replace('*', '%', $gambar);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InfoSekolahPeer::GAMBAR, $gambar, $comparison);
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
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(InfoSekolahPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(InfoSekolahPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfoSekolahPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(InfoSekolahPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(InfoSekolahPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InfoSekolahPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return InfoSekolahQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InfoSekolahPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   InfoSekolah $infoSekolah Object to remove from the list of results
     *
     * @return InfoSekolahQuery The current query, for fluid interface
     */
    public function prune($infoSekolah = null)
    {
        if ($infoSekolah) {
            $this->addUsingAlias(InfoSekolahPeer::INFO_SEKOLAH_ID, $infoSekolah->getInfoSekolahId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
