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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\BimbingPd;
use DataDikdas\Model\BimbingPdPeer;
use DataDikdas\Model\BimbingPdQuery;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'bimbing_pd' table.
 *
 * 
 *
 * @method BimbingPdQuery orderByIdBimbPd($order = Criteria::ASC) Order by the id_bimb_pd column
 * @method BimbingPdQuery orderByIdAktPd($order = Criteria::ASC) Order by the id_akt_pd column
 * @method BimbingPdQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method BimbingPdQuery orderByUrutanPembimbing($order = Criteria::ASC) Order by the urutan_pembimbing column
 * @method BimbingPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BimbingPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BimbingPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BimbingPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BimbingPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BimbingPdQuery groupByIdBimbPd() Group by the id_bimb_pd column
 * @method BimbingPdQuery groupByIdAktPd() Group by the id_akt_pd column
 * @method BimbingPdQuery groupByPtkId() Group by the ptk_id column
 * @method BimbingPdQuery groupByUrutanPembimbing() Group by the urutan_pembimbing column
 * @method BimbingPdQuery groupByCreateDate() Group by the create_date column
 * @method BimbingPdQuery groupByLastUpdate() Group by the last_update column
 * @method BimbingPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method BimbingPdQuery groupByLastSync() Group by the last_sync column
 * @method BimbingPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BimbingPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BimbingPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BimbingPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BimbingPdQuery leftJoinAktPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the AktPd relation
 * @method BimbingPdQuery rightJoinAktPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AktPd relation
 * @method BimbingPdQuery innerJoinAktPd($relationAlias = null) Adds a INNER JOIN clause to the query using the AktPd relation
 *
 * @method BimbingPdQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BimbingPdQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BimbingPdQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BimbingPd findOne(PropelPDO $con = null) Return the first BimbingPd matching the query
 * @method BimbingPd findOneOrCreate(PropelPDO $con = null) Return the first BimbingPd matching the query, or a new BimbingPd object populated from the query conditions when no match is found
 *
 * @method BimbingPd findOneByIdAktPd(string $id_akt_pd) Return the first BimbingPd filtered by the id_akt_pd column
 * @method BimbingPd findOneByPtkId(string $ptk_id) Return the first BimbingPd filtered by the ptk_id column
 * @method BimbingPd findOneByUrutanPembimbing(string $urutan_pembimbing) Return the first BimbingPd filtered by the urutan_pembimbing column
 * @method BimbingPd findOneByCreateDate(string $create_date) Return the first BimbingPd filtered by the create_date column
 * @method BimbingPd findOneByLastUpdate(string $last_update) Return the first BimbingPd filtered by the last_update column
 * @method BimbingPd findOneBySoftDelete(string $soft_delete) Return the first BimbingPd filtered by the soft_delete column
 * @method BimbingPd findOneByLastSync(string $last_sync) Return the first BimbingPd filtered by the last_sync column
 * @method BimbingPd findOneByUpdaterId(string $updater_id) Return the first BimbingPd filtered by the updater_id column
 *
 * @method array findByIdBimbPd(string $id_bimb_pd) Return BimbingPd objects filtered by the id_bimb_pd column
 * @method array findByIdAktPd(string $id_akt_pd) Return BimbingPd objects filtered by the id_akt_pd column
 * @method array findByPtkId(string $ptk_id) Return BimbingPd objects filtered by the ptk_id column
 * @method array findByUrutanPembimbing(string $urutan_pembimbing) Return BimbingPd objects filtered by the urutan_pembimbing column
 * @method array findByCreateDate(string $create_date) Return BimbingPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BimbingPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BimbingPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BimbingPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BimbingPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBimbingPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBimbingPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BimbingPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BimbingPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BimbingPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BimbingPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BimbingPdQuery) {
            return $criteria;
        }
        $query = new BimbingPdQuery();
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
     * @return   BimbingPd|BimbingPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BimbingPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BimbingPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BimbingPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdBimbPd($key, $con = null)
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
     * @return                 BimbingPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_bimb_pd", "id_akt_pd", "ptk_id", "urutan_pembimbing", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "bimbing_pd" WHERE "id_bimb_pd" = :p0';
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
            $obj = new BimbingPd();
            $obj->hydrate($row);
            BimbingPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BimbingPd|BimbingPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BimbingPd[]|mixed the list of results, formatted by the current formatter
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
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BimbingPdPeer::ID_BIMB_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BimbingPdPeer::ID_BIMB_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_bimb_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBimbPd('fooValue');   // WHERE id_bimb_pd = 'fooValue'
     * $query->filterByIdBimbPd('%fooValue%'); // WHERE id_bimb_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBimbPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByIdBimbPd($idBimbPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBimbPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBimbPd)) {
                $idBimbPd = str_replace('*', '%', $idBimbPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::ID_BIMB_PD, $idBimbPd, $comparison);
    }

    /**
     * Filter the query on the id_akt_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAktPd('fooValue');   // WHERE id_akt_pd = 'fooValue'
     * $query->filterByIdAktPd('%fooValue%'); // WHERE id_akt_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAktPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByIdAktPd($idAktPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAktPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAktPd)) {
                $idAktPd = str_replace('*', '%', $idAktPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::ID_AKT_PD, $idAktPd, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BimbingPdPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the urutan_pembimbing column
     *
     * Example usage:
     * <code>
     * $query->filterByUrutanPembimbing(1234); // WHERE urutan_pembimbing = 1234
     * $query->filterByUrutanPembimbing(array(12, 34)); // WHERE urutan_pembimbing IN (12, 34)
     * $query->filterByUrutanPembimbing(array('min' => 12)); // WHERE urutan_pembimbing >= 12
     * $query->filterByUrutanPembimbing(array('max' => 12)); // WHERE urutan_pembimbing <= 12
     * </code>
     *
     * @param     mixed $urutanPembimbing The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByUrutanPembimbing($urutanPembimbing = null, $comparison = null)
    {
        if (is_array($urutanPembimbing)) {
            $useMinMax = false;
            if (isset($urutanPembimbing['min'])) {
                $this->addUsingAlias(BimbingPdPeer::URUTAN_PEMBIMBING, $urutanPembimbing['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($urutanPembimbing['max'])) {
                $this->addUsingAlias(BimbingPdPeer::URUTAN_PEMBIMBING, $urutanPembimbing['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::URUTAN_PEMBIMBING, $urutanPembimbing, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BimbingPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BimbingPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BimbingPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BimbingPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BimbingPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BimbingPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BimbingPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BimbingPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BimbingPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BimbingPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related AktPd object
     *
     * @param   AktPd|PropelObjectCollection $aktPd The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BimbingPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAktPd($aktPd, $comparison = null)
    {
        if ($aktPd instanceof AktPd) {
            return $this
                ->addUsingAlias(BimbingPdPeer::ID_AKT_PD, $aktPd->getIdAktPd(), $comparison);
        } elseif ($aktPd instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BimbingPdPeer::ID_AKT_PD, $aktPd->toKeyValue('PrimaryKey', 'IdAktPd'), $comparison);
        } else {
            throw new PropelException('filterByAktPd() only accepts arguments of type AktPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AktPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function joinAktPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AktPd');

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
            $this->addJoinObject($join, 'AktPd');
        }

        return $this;
    }

    /**
     * Use the AktPd relation AktPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AktPdQuery A secondary query class using the current class as primary query
     */
    public function useAktPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAktPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AktPd', '\DataDikdas\Model\AktPdQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BimbingPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BimbingPdPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BimbingPdPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return BimbingPdQuery The current query, for fluid interface
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
     * @param   BimbingPd $bimbingPd Object to remove from the list of results
     *
     * @return BimbingPdQuery The current query, for fluid interface
     */
    public function prune($bimbingPd = null)
    {
        if ($bimbingPd) {
            $this->addUsingAlias(BimbingPdPeer::ID_BIMB_PD, $bimbingPd->getIdBimbPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
