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
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\BantuanPd;
use DataDikdas\Model\BantuanPdPeer;
use DataDikdas\Model\BantuanPdQuery;
use DataDikdas\Model\JenisBantuan;

/**
 * Base class that represents a query for the 'bantuan_pd' table.
 *
 * 
 *
 * @method BantuanPdQuery orderByIdBantuanPd($order = Criteria::ASC) Order by the id_bantuan_pd column
 * @method BantuanPdQuery orderByJenisBantuanId($order = Criteria::ASC) Order by the jenis_bantuan_id column
 * @method BantuanPdQuery orderByAnggotaRombelId($order = Criteria::ASC) Order by the anggota_rombel_id column
 * @method BantuanPdQuery orderByBesarBantuan($order = Criteria::ASC) Order by the besar_bantuan column
 * @method BantuanPdQuery orderByDanaPendamping($order = Criteria::ASC) Order by the dana_pendamping column
 * @method BantuanPdQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BantuanPdQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BantuanPdQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BantuanPdQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BantuanPdQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BantuanPdQuery groupByIdBantuanPd() Group by the id_bantuan_pd column
 * @method BantuanPdQuery groupByJenisBantuanId() Group by the jenis_bantuan_id column
 * @method BantuanPdQuery groupByAnggotaRombelId() Group by the anggota_rombel_id column
 * @method BantuanPdQuery groupByBesarBantuan() Group by the besar_bantuan column
 * @method BantuanPdQuery groupByDanaPendamping() Group by the dana_pendamping column
 * @method BantuanPdQuery groupByCreateDate() Group by the create_date column
 * @method BantuanPdQuery groupByLastUpdate() Group by the last_update column
 * @method BantuanPdQuery groupBySoftDelete() Group by the soft_delete column
 * @method BantuanPdQuery groupByLastSync() Group by the last_sync column
 * @method BantuanPdQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BantuanPdQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BantuanPdQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BantuanPdQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BantuanPdQuery leftJoinAnggotaRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaRombel relation
 * @method BantuanPdQuery rightJoinAnggotaRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaRombel relation
 * @method BantuanPdQuery innerJoinAnggotaRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaRombel relation
 *
 * @method BantuanPdQuery leftJoinJenisBantuan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisBantuan relation
 * @method BantuanPdQuery rightJoinJenisBantuan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisBantuan relation
 * @method BantuanPdQuery innerJoinJenisBantuan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisBantuan relation
 *
 * @method BantuanPd findOne(PropelPDO $con = null) Return the first BantuanPd matching the query
 * @method BantuanPd findOneOrCreate(PropelPDO $con = null) Return the first BantuanPd matching the query, or a new BantuanPd object populated from the query conditions when no match is found
 *
 * @method BantuanPd findOneByJenisBantuanId(int $jenis_bantuan_id) Return the first BantuanPd filtered by the jenis_bantuan_id column
 * @method BantuanPd findOneByAnggotaRombelId(string $anggota_rombel_id) Return the first BantuanPd filtered by the anggota_rombel_id column
 * @method BantuanPd findOneByBesarBantuan(string $besar_bantuan) Return the first BantuanPd filtered by the besar_bantuan column
 * @method BantuanPd findOneByDanaPendamping(string $dana_pendamping) Return the first BantuanPd filtered by the dana_pendamping column
 * @method BantuanPd findOneByCreateDate(string $create_date) Return the first BantuanPd filtered by the create_date column
 * @method BantuanPd findOneByLastUpdate(string $last_update) Return the first BantuanPd filtered by the last_update column
 * @method BantuanPd findOneBySoftDelete(string $soft_delete) Return the first BantuanPd filtered by the soft_delete column
 * @method BantuanPd findOneByLastSync(string $last_sync) Return the first BantuanPd filtered by the last_sync column
 * @method BantuanPd findOneByUpdaterId(string $updater_id) Return the first BantuanPd filtered by the updater_id column
 *
 * @method array findByIdBantuanPd(string $id_bantuan_pd) Return BantuanPd objects filtered by the id_bantuan_pd column
 * @method array findByJenisBantuanId(int $jenis_bantuan_id) Return BantuanPd objects filtered by the jenis_bantuan_id column
 * @method array findByAnggotaRombelId(string $anggota_rombel_id) Return BantuanPd objects filtered by the anggota_rombel_id column
 * @method array findByBesarBantuan(string $besar_bantuan) Return BantuanPd objects filtered by the besar_bantuan column
 * @method array findByDanaPendamping(string $dana_pendamping) Return BantuanPd objects filtered by the dana_pendamping column
 * @method array findByCreateDate(string $create_date) Return BantuanPd objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BantuanPd objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BantuanPd objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BantuanPd objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BantuanPd objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBantuanPdQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBantuanPdQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BantuanPd', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BantuanPdQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BantuanPdQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BantuanPdQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BantuanPdQuery) {
            return $criteria;
        }
        $query = new BantuanPdQuery();
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
     * @return   BantuanPd|BantuanPd[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BantuanPdPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BantuanPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BantuanPd A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdBantuanPd($key, $con = null)
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
     * @return                 BantuanPd A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_bantuan_pd", "jenis_bantuan_id", "anggota_rombel_id", "besar_bantuan", "dana_pendamping", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "bantuan_pd" WHERE "id_bantuan_pd" = :p0';
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
            $obj = new BantuanPd();
            $obj->hydrate($row);
            BantuanPdPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BantuanPd|BantuanPd[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BantuanPd[]|mixed the list of results, formatted by the current formatter
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
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BantuanPdPeer::ID_BANTUAN_PD, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BantuanPdPeer::ID_BANTUAN_PD, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_bantuan_pd column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBantuanPd('fooValue');   // WHERE id_bantuan_pd = 'fooValue'
     * $query->filterByIdBantuanPd('%fooValue%'); // WHERE id_bantuan_pd LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBantuanPd The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByIdBantuanPd($idBantuanPd = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBantuanPd)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBantuanPd)) {
                $idBantuanPd = str_replace('*', '%', $idBantuanPd);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::ID_BANTUAN_PD, $idBantuanPd, $comparison);
    }

    /**
     * Filter the query on the jenis_bantuan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisBantuanId(1234); // WHERE jenis_bantuan_id = 1234
     * $query->filterByJenisBantuanId(array(12, 34)); // WHERE jenis_bantuan_id IN (12, 34)
     * $query->filterByJenisBantuanId(array('min' => 12)); // WHERE jenis_bantuan_id >= 12
     * $query->filterByJenisBantuanId(array('max' => 12)); // WHERE jenis_bantuan_id <= 12
     * </code>
     *
     * @see       filterByJenisBantuan()
     *
     * @param     mixed $jenisBantuanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByJenisBantuanId($jenisBantuanId = null, $comparison = null)
    {
        if (is_array($jenisBantuanId)) {
            $useMinMax = false;
            if (isset($jenisBantuanId['min'])) {
                $this->addUsingAlias(BantuanPdPeer::JENIS_BANTUAN_ID, $jenisBantuanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBantuanId['max'])) {
                $this->addUsingAlias(BantuanPdPeer::JENIS_BANTUAN_ID, $jenisBantuanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::JENIS_BANTUAN_ID, $jenisBantuanId, $comparison);
    }

    /**
     * Filter the query on the anggota_rombel_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAnggotaRombelId('fooValue');   // WHERE anggota_rombel_id = 'fooValue'
     * $query->filterByAnggotaRombelId('%fooValue%'); // WHERE anggota_rombel_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $anggotaRombelId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByAnggotaRombelId($anggotaRombelId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($anggotaRombelId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $anggotaRombelId)) {
                $anggotaRombelId = str_replace('*', '%', $anggotaRombelId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::ANGGOTA_ROMBEL_ID, $anggotaRombelId, $comparison);
    }

    /**
     * Filter the query on the besar_bantuan column
     *
     * Example usage:
     * <code>
     * $query->filterByBesarBantuan(1234); // WHERE besar_bantuan = 1234
     * $query->filterByBesarBantuan(array(12, 34)); // WHERE besar_bantuan IN (12, 34)
     * $query->filterByBesarBantuan(array('min' => 12)); // WHERE besar_bantuan >= 12
     * $query->filterByBesarBantuan(array('max' => 12)); // WHERE besar_bantuan <= 12
     * </code>
     *
     * @param     mixed $besarBantuan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByBesarBantuan($besarBantuan = null, $comparison = null)
    {
        if (is_array($besarBantuan)) {
            $useMinMax = false;
            if (isset($besarBantuan['min'])) {
                $this->addUsingAlias(BantuanPdPeer::BESAR_BANTUAN, $besarBantuan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($besarBantuan['max'])) {
                $this->addUsingAlias(BantuanPdPeer::BESAR_BANTUAN, $besarBantuan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::BESAR_BANTUAN, $besarBantuan, $comparison);
    }

    /**
     * Filter the query on the dana_pendamping column
     *
     * Example usage:
     * <code>
     * $query->filterByDanaPendamping(1234); // WHERE dana_pendamping = 1234
     * $query->filterByDanaPendamping(array(12, 34)); // WHERE dana_pendamping IN (12, 34)
     * $query->filterByDanaPendamping(array('min' => 12)); // WHERE dana_pendamping >= 12
     * $query->filterByDanaPendamping(array('max' => 12)); // WHERE dana_pendamping <= 12
     * </code>
     *
     * @param     mixed $danaPendamping The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByDanaPendamping($danaPendamping = null, $comparison = null)
    {
        if (is_array($danaPendamping)) {
            $useMinMax = false;
            if (isset($danaPendamping['min'])) {
                $this->addUsingAlias(BantuanPdPeer::DANA_PENDAMPING, $danaPendamping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($danaPendamping['max'])) {
                $this->addUsingAlias(BantuanPdPeer::DANA_PENDAMPING, $danaPendamping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::DANA_PENDAMPING, $danaPendamping, $comparison);
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
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BantuanPdPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BantuanPdPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BantuanPdPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BantuanPdPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BantuanPdPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BantuanPdPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BantuanPdPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BantuanPdPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BantuanPdPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BantuanPdQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BantuanPdPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related AnggotaRombel object
     *
     * @param   AnggotaRombel|PropelObjectCollection $anggotaRombel The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BantuanPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaRombel($anggotaRombel, $comparison = null)
    {
        if ($anggotaRombel instanceof AnggotaRombel) {
            return $this
                ->addUsingAlias(BantuanPdPeer::ANGGOTA_ROMBEL_ID, $anggotaRombel->getAnggotaRombelId(), $comparison);
        } elseif ($anggotaRombel instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BantuanPdPeer::ANGGOTA_ROMBEL_ID, $anggotaRombel->toKeyValue('PrimaryKey', 'AnggotaRombelId'), $comparison);
        } else {
            throw new PropelException('filterByAnggotaRombel() only accepts arguments of type AnggotaRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function joinAnggotaRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaRombel');

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
            $this->addJoinObject($join, 'AnggotaRombel');
        }

        return $this;
    }

    /**
     * Use the AnggotaRombel relation AnggotaRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaRombelQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaRombel', '\DataDikdas\Model\AnggotaRombelQuery');
    }

    /**
     * Filter the query by a related JenisBantuan object
     *
     * @param   JenisBantuan|PropelObjectCollection $jenisBantuan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BantuanPdQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisBantuan($jenisBantuan, $comparison = null)
    {
        if ($jenisBantuan instanceof JenisBantuan) {
            return $this
                ->addUsingAlias(BantuanPdPeer::JENIS_BANTUAN_ID, $jenisBantuan->getJenisBantuanId(), $comparison);
        } elseif ($jenisBantuan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BantuanPdPeer::JENIS_BANTUAN_ID, $jenisBantuan->toKeyValue('PrimaryKey', 'JenisBantuanId'), $comparison);
        } else {
            throw new PropelException('filterByJenisBantuan() only accepts arguments of type JenisBantuan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisBantuan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function joinJenisBantuan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisBantuan');

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
            $this->addJoinObject($join, 'JenisBantuan');
        }

        return $this;
    }

    /**
     * Use the JenisBantuan relation JenisBantuan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisBantuanQuery A secondary query class using the current class as primary query
     */
    public function useJenisBantuanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisBantuan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisBantuan', '\DataDikdas\Model\JenisBantuanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BantuanPd $bantuanPd Object to remove from the list of results
     *
     * @return BantuanPdQuery The current query, for fluid interface
     */
    public function prune($bantuanPd = null)
    {
        if ($bantuanPd) {
            $this->addUsingAlias(BantuanPdPeer::ID_BANTUAN_PD, $bantuanPd->getIdBantuanPd(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
