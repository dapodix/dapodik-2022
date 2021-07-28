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
use DataDikdas\Model\JabatanFungsional;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RwyFungsional;
use DataDikdas\Model\RwyFungsionalPeer;
use DataDikdas\Model\RwyFungsionalQuery;
use DataDikdas\Model\VldRwyFungsional;

/**
 * Base class that represents a query for the 'rwy_fungsional' table.
 *
 * 
 *
 * @method RwyFungsionalQuery orderByRiwayatFungsionalId($order = Criteria::ASC) Order by the riwayat_fungsional_id column
 * @method RwyFungsionalQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RwyFungsionalQuery orderByJabatanFungsionalId($order = Criteria::ASC) Order by the jabatan_fungsional_id column
 * @method RwyFungsionalQuery orderBySkJabfung($order = Criteria::ASC) Order by the sk_jabfung column
 * @method RwyFungsionalQuery orderByTmtJabatan($order = Criteria::ASC) Order by the tmt_jabatan column
 * @method RwyFungsionalQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method RwyFungsionalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RwyFungsionalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RwyFungsionalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RwyFungsionalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RwyFungsionalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RwyFungsionalQuery groupByRiwayatFungsionalId() Group by the riwayat_fungsional_id column
 * @method RwyFungsionalQuery groupByPtkId() Group by the ptk_id column
 * @method RwyFungsionalQuery groupByJabatanFungsionalId() Group by the jabatan_fungsional_id column
 * @method RwyFungsionalQuery groupBySkJabfung() Group by the sk_jabfung column
 * @method RwyFungsionalQuery groupByTmtJabatan() Group by the tmt_jabatan column
 * @method RwyFungsionalQuery groupByAsalData() Group by the asal_data column
 * @method RwyFungsionalQuery groupByCreateDate() Group by the create_date column
 * @method RwyFungsionalQuery groupByLastUpdate() Group by the last_update column
 * @method RwyFungsionalQuery groupBySoftDelete() Group by the soft_delete column
 * @method RwyFungsionalQuery groupByLastSync() Group by the last_sync column
 * @method RwyFungsionalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RwyFungsionalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RwyFungsionalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RwyFungsionalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RwyFungsionalQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RwyFungsionalQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RwyFungsionalQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RwyFungsionalQuery leftJoinJabatanFungsional($relationAlias = null) Adds a LEFT JOIN clause to the query using the JabatanFungsional relation
 * @method RwyFungsionalQuery rightJoinJabatanFungsional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JabatanFungsional relation
 * @method RwyFungsionalQuery innerJoinJabatanFungsional($relationAlias = null) Adds a INNER JOIN clause to the query using the JabatanFungsional relation
 *
 * @method RwyFungsionalQuery leftJoinVldRwyFungsional($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyFungsional relation
 * @method RwyFungsionalQuery rightJoinVldRwyFungsional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyFungsional relation
 * @method RwyFungsionalQuery innerJoinVldRwyFungsional($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyFungsional relation
 *
 * @method RwyFungsional findOne(PropelPDO $con = null) Return the first RwyFungsional matching the query
 * @method RwyFungsional findOneOrCreate(PropelPDO $con = null) Return the first RwyFungsional matching the query, or a new RwyFungsional object populated from the query conditions when no match is found
 *
 * @method RwyFungsional findOneByPtkId(string $ptk_id) Return the first RwyFungsional filtered by the ptk_id column
 * @method RwyFungsional findOneByJabatanFungsionalId(string $jabatan_fungsional_id) Return the first RwyFungsional filtered by the jabatan_fungsional_id column
 * @method RwyFungsional findOneBySkJabfung(string $sk_jabfung) Return the first RwyFungsional filtered by the sk_jabfung column
 * @method RwyFungsional findOneByTmtJabatan(string $tmt_jabatan) Return the first RwyFungsional filtered by the tmt_jabatan column
 * @method RwyFungsional findOneByAsalData(string $asal_data) Return the first RwyFungsional filtered by the asal_data column
 * @method RwyFungsional findOneByCreateDate(string $create_date) Return the first RwyFungsional filtered by the create_date column
 * @method RwyFungsional findOneByLastUpdate(string $last_update) Return the first RwyFungsional filtered by the last_update column
 * @method RwyFungsional findOneBySoftDelete(string $soft_delete) Return the first RwyFungsional filtered by the soft_delete column
 * @method RwyFungsional findOneByLastSync(string $last_sync) Return the first RwyFungsional filtered by the last_sync column
 * @method RwyFungsional findOneByUpdaterId(string $updater_id) Return the first RwyFungsional filtered by the updater_id column
 *
 * @method array findByRiwayatFungsionalId(string $riwayat_fungsional_id) Return RwyFungsional objects filtered by the riwayat_fungsional_id column
 * @method array findByPtkId(string $ptk_id) Return RwyFungsional objects filtered by the ptk_id column
 * @method array findByJabatanFungsionalId(string $jabatan_fungsional_id) Return RwyFungsional objects filtered by the jabatan_fungsional_id column
 * @method array findBySkJabfung(string $sk_jabfung) Return RwyFungsional objects filtered by the sk_jabfung column
 * @method array findByTmtJabatan(string $tmt_jabatan) Return RwyFungsional objects filtered by the tmt_jabatan column
 * @method array findByAsalData(string $asal_data) Return RwyFungsional objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return RwyFungsional objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RwyFungsional objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RwyFungsional objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RwyFungsional objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RwyFungsional objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyFungsionalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRwyFungsionalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RwyFungsional', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RwyFungsionalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RwyFungsionalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RwyFungsionalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RwyFungsionalQuery) {
            return $criteria;
        }
        $query = new RwyFungsionalQuery();
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
     * @return   RwyFungsional|RwyFungsional[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RwyFungsionalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RwyFungsionalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyFungsional A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRiwayatFungsionalId($key, $con = null)
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
     * @return                 RwyFungsional A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "riwayat_fungsional_id", "ptk_id", "jabatan_fungsional_id", "sk_jabfung", "tmt_jabatan", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rwy_fungsional" WHERE "riwayat_fungsional_id" = :p0';
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
            $obj = new RwyFungsional();
            $obj->hydrate($row);
            RwyFungsionalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RwyFungsional|RwyFungsional[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RwyFungsional[]|mixed the list of results, formatted by the current formatter
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
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the riwayat_fungsional_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatFungsionalId('fooValue');   // WHERE riwayat_fungsional_id = 'fooValue'
     * $query->filterByRiwayatFungsionalId('%fooValue%'); // WHERE riwayat_fungsional_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatFungsionalId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByRiwayatFungsionalId($riwayatFungsionalId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatFungsionalId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatFungsionalId)) {
                $riwayatFungsionalId = str_replace('*', '%', $riwayatFungsionalId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $riwayatFungsionalId, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyFungsionalPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the jabatan_fungsional_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanFungsionalId(1234); // WHERE jabatan_fungsional_id = 1234
     * $query->filterByJabatanFungsionalId(array(12, 34)); // WHERE jabatan_fungsional_id IN (12, 34)
     * $query->filterByJabatanFungsionalId(array('min' => 12)); // WHERE jabatan_fungsional_id >= 12
     * $query->filterByJabatanFungsionalId(array('max' => 12)); // WHERE jabatan_fungsional_id <= 12
     * </code>
     *
     * @see       filterByJabatanFungsional()
     *
     * @param     mixed $jabatanFungsionalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByJabatanFungsionalId($jabatanFungsionalId = null, $comparison = null)
    {
        if (is_array($jabatanFungsionalId)) {
            $useMinMax = false;
            if (isset($jabatanFungsionalId['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jabatanFungsionalId['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsionalId, $comparison);
    }

    /**
     * Filter the query on the sk_jabfung column
     *
     * Example usage:
     * <code>
     * $query->filterBySkJabfung('fooValue');   // WHERE sk_jabfung = 'fooValue'
     * $query->filterBySkJabfung('%fooValue%'); // WHERE sk_jabfung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skJabfung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterBySkJabfung($skJabfung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skJabfung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skJabfung)) {
                $skJabfung = str_replace('*', '%', $skJabfung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::SK_JABFUNG, $skJabfung, $comparison);
    }

    /**
     * Filter the query on the tmt_jabatan column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtJabatan('2011-03-14'); // WHERE tmt_jabatan = '2011-03-14'
     * $query->filterByTmtJabatan('now'); // WHERE tmt_jabatan = '2011-03-14'
     * $query->filterByTmtJabatan(array('max' => 'yesterday')); // WHERE tmt_jabatan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtJabatan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByTmtJabatan($tmtJabatan = null, $comparison = null)
    {
        if (is_array($tmtJabatan)) {
            $useMinMax = false;
            if (isset($tmtJabatan['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::TMT_JABATAN, $tmtJabatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtJabatan['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::TMT_JABATAN, $tmtJabatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::TMT_JABATAN, $tmtJabatan, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyFungsionalPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RwyFungsionalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RwyFungsionalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyFungsionalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyFungsionalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyFungsionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RwyFungsionalPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyFungsionalPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RwyFungsionalQuery The current query, for fluid interface
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
     * Filter the query by a related JabatanFungsional object
     *
     * @param   JabatanFungsional|PropelObjectCollection $jabatanFungsional The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyFungsionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJabatanFungsional($jabatanFungsional, $comparison = null)
    {
        if ($jabatanFungsional instanceof JabatanFungsional) {
            return $this
                ->addUsingAlias(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsional->getJabatanFungsionalId(), $comparison);
        } elseif ($jabatanFungsional instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $jabatanFungsional->toKeyValue('PrimaryKey', 'JabatanFungsionalId'), $comparison);
        } else {
            throw new PropelException('filterByJabatanFungsional() only accepts arguments of type JabatanFungsional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JabatanFungsional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function joinJabatanFungsional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JabatanFungsional');

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
            $this->addJoinObject($join, 'JabatanFungsional');
        }

        return $this;
    }

    /**
     * Use the JabatanFungsional relation JabatanFungsional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JabatanFungsionalQuery A secondary query class using the current class as primary query
     */
    public function useJabatanFungsionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJabatanFungsional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JabatanFungsional', '\DataDikdas\Model\JabatanFungsionalQuery');
    }

    /**
     * Filter the query by a related VldRwyFungsional object
     *
     * @param   VldRwyFungsional|PropelObjectCollection $vldRwyFungsional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyFungsionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyFungsional($vldRwyFungsional, $comparison = null)
    {
        if ($vldRwyFungsional instanceof VldRwyFungsional) {
            return $this
                ->addUsingAlias(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $vldRwyFungsional->getRiwayatFungsionalId(), $comparison);
        } elseif ($vldRwyFungsional instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyFungsionalQuery()
                ->filterByPrimaryKeys($vldRwyFungsional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyFungsional() only accepts arguments of type VldRwyFungsional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyFungsional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function joinVldRwyFungsional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyFungsional');

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
            $this->addJoinObject($join, 'VldRwyFungsional');
        }

        return $this;
    }

    /**
     * Use the VldRwyFungsional relation VldRwyFungsional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyFungsionalQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyFungsionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyFungsional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyFungsional', '\DataDikdas\Model\VldRwyFungsionalQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RwyFungsional $rwyFungsional Object to remove from the list of results
     *
     * @return RwyFungsionalQuery The current query, for fluid interface
     */
    public function prune($rwyFungsional = null)
    {
        if ($rwyFungsional) {
            $this->addUsingAlias(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $rwyFungsional->getRiwayatFungsionalId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
