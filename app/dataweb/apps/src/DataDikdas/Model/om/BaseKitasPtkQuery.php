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
use DataDikdas\Model\KitasPtk;
use DataDikdas\Model\KitasPtkPeer;
use DataDikdas\Model\KitasPtkQuery;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'kitas_ptk' table.
 *
 * 
 *
 * @method KitasPtkQuery orderByNoKitas($order = Criteria::ASC) Order by the no_kitas column
 * @method KitasPtkQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method KitasPtkQuery orderByTmtKitas($order = Criteria::ASC) Order by the tmt_kitas column
 * @method KitasPtkQuery orderByTstKitas($order = Criteria::ASC) Order by the tst_kitas column
 * @method KitasPtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KitasPtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KitasPtkQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KitasPtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KitasPtkQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KitasPtkQuery groupByNoKitas() Group by the no_kitas column
 * @method KitasPtkQuery groupByPtkId() Group by the ptk_id column
 * @method KitasPtkQuery groupByTmtKitas() Group by the tmt_kitas column
 * @method KitasPtkQuery groupByTstKitas() Group by the tst_kitas column
 * @method KitasPtkQuery groupByCreateDate() Group by the create_date column
 * @method KitasPtkQuery groupByLastUpdate() Group by the last_update column
 * @method KitasPtkQuery groupBySoftDelete() Group by the soft_delete column
 * @method KitasPtkQuery groupByLastSync() Group by the last_sync column
 * @method KitasPtkQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KitasPtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KitasPtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KitasPtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KitasPtkQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method KitasPtkQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method KitasPtkQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method KitasPtk findOne(PropelPDO $con = null) Return the first KitasPtk matching the query
 * @method KitasPtk findOneOrCreate(PropelPDO $con = null) Return the first KitasPtk matching the query, or a new KitasPtk object populated from the query conditions when no match is found
 *
 * @method KitasPtk findOneByPtkId(string $ptk_id) Return the first KitasPtk filtered by the ptk_id column
 * @method KitasPtk findOneByTmtKitas(string $tmt_kitas) Return the first KitasPtk filtered by the tmt_kitas column
 * @method KitasPtk findOneByTstKitas(string $tst_kitas) Return the first KitasPtk filtered by the tst_kitas column
 * @method KitasPtk findOneByCreateDate(string $create_date) Return the first KitasPtk filtered by the create_date column
 * @method KitasPtk findOneByLastUpdate(string $last_update) Return the first KitasPtk filtered by the last_update column
 * @method KitasPtk findOneBySoftDelete(string $soft_delete) Return the first KitasPtk filtered by the soft_delete column
 * @method KitasPtk findOneByLastSync(string $last_sync) Return the first KitasPtk filtered by the last_sync column
 * @method KitasPtk findOneByUpdaterId(string $updater_id) Return the first KitasPtk filtered by the updater_id column
 *
 * @method array findByNoKitas(string $no_kitas) Return KitasPtk objects filtered by the no_kitas column
 * @method array findByPtkId(string $ptk_id) Return KitasPtk objects filtered by the ptk_id column
 * @method array findByTmtKitas(string $tmt_kitas) Return KitasPtk objects filtered by the tmt_kitas column
 * @method array findByTstKitas(string $tst_kitas) Return KitasPtk objects filtered by the tst_kitas column
 * @method array findByCreateDate(string $create_date) Return KitasPtk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KitasPtk objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return KitasPtk objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return KitasPtk objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return KitasPtk objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKitasPtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKitasPtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KitasPtk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KitasPtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KitasPtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KitasPtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KitasPtkQuery) {
            return $criteria;
        }
        $query = new KitasPtkQuery();
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
     * @return   KitasPtk|KitasPtk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KitasPtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KitasPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KitasPtk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByNoKitas($key, $con = null)
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
     * @return                 KitasPtk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "no_kitas", "ptk_id", "tmt_kitas", "tst_kitas", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "kitas_ptk" WHERE "no_kitas" = :p0';
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
            $obj = new KitasPtk();
            $obj->hydrate($row);
            KitasPtkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KitasPtk|KitasPtk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KitasPtk[]|mixed the list of results, formatted by the current formatter
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
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KitasPtkPeer::NO_KITAS, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KitasPtkPeer::NO_KITAS, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the no_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKitas('fooValue');   // WHERE no_kitas = 'fooValue'
     * $query->filterByNoKitas('%fooValue%'); // WHERE no_kitas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKitas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByNoKitas($noKitas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKitas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKitas)) {
                $noKitas = str_replace('*', '%', $noKitas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::NO_KITAS, $noKitas, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KitasPtkPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the tmt_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtKitas('2011-03-14'); // WHERE tmt_kitas = '2011-03-14'
     * $query->filterByTmtKitas('now'); // WHERE tmt_kitas = '2011-03-14'
     * $query->filterByTmtKitas(array('max' => 'yesterday')); // WHERE tmt_kitas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtKitas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByTmtKitas($tmtKitas = null, $comparison = null)
    {
        if (is_array($tmtKitas)) {
            $useMinMax = false;
            if (isset($tmtKitas['min'])) {
                $this->addUsingAlias(KitasPtkPeer::TMT_KITAS, $tmtKitas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtKitas['max'])) {
                $this->addUsingAlias(KitasPtkPeer::TMT_KITAS, $tmtKitas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::TMT_KITAS, $tmtKitas, $comparison);
    }

    /**
     * Filter the query on the tst_kitas column
     *
     * Example usage:
     * <code>
     * $query->filterByTstKitas('2011-03-14'); // WHERE tst_kitas = '2011-03-14'
     * $query->filterByTstKitas('now'); // WHERE tst_kitas = '2011-03-14'
     * $query->filterByTstKitas(array('max' => 'yesterday')); // WHERE tst_kitas > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstKitas The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByTstKitas($tstKitas = null, $comparison = null)
    {
        if (is_array($tstKitas)) {
            $useMinMax = false;
            if (isset($tstKitas['min'])) {
                $this->addUsingAlias(KitasPtkPeer::TST_KITAS, $tstKitas['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstKitas['max'])) {
                $this->addUsingAlias(KitasPtkPeer::TST_KITAS, $tstKitas['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::TST_KITAS, $tstKitas, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KitasPtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KitasPtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KitasPtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KitasPtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KitasPtkPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KitasPtkPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KitasPtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KitasPtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KitasPtkPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KitasPtkPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KitasPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(KitasPtkPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KitasPtkPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return KitasPtkQuery The current query, for fluid interface
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
     * Exclude object from result
     *
     * @param   KitasPtk $kitasPtk Object to remove from the list of results
     *
     * @return KitasPtkQuery The current query, for fluid interface
     */
    public function prune($kitasPtk = null)
    {
        if ($kitasPtk) {
            $this->addUsingAlias(KitasPtkPeer::NO_KITAS, $kitasPtk->getNoKitas(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
