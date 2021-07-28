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
use DataDikdas\Model\AnggotaRombelPeer;
use DataDikdas\Model\AnggotaRombelQuery;
use DataDikdas\Model\BantuanPd;
use DataDikdas\Model\JenisPendaftaran;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\RombonganBelajar;

/**
 * Base class that represents a query for the 'anggota_rombel' table.
 *
 * 
 *
 * @method AnggotaRombelQuery orderByAnggotaRombelId($order = Criteria::ASC) Order by the anggota_rombel_id column
 * @method AnggotaRombelQuery orderByRombonganBelajarId($order = Criteria::ASC) Order by the rombongan_belajar_id column
 * @method AnggotaRombelQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method AnggotaRombelQuery orderByJenisPendaftaranId($order = Criteria::ASC) Order by the jenis_pendaftaran_id column
 * @method AnggotaRombelQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AnggotaRombelQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AnggotaRombelQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AnggotaRombelQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AnggotaRombelQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AnggotaRombelQuery groupByAnggotaRombelId() Group by the anggota_rombel_id column
 * @method AnggotaRombelQuery groupByRombonganBelajarId() Group by the rombongan_belajar_id column
 * @method AnggotaRombelQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method AnggotaRombelQuery groupByJenisPendaftaranId() Group by the jenis_pendaftaran_id column
 * @method AnggotaRombelQuery groupByCreateDate() Group by the create_date column
 * @method AnggotaRombelQuery groupByLastUpdate() Group by the last_update column
 * @method AnggotaRombelQuery groupBySoftDelete() Group by the soft_delete column
 * @method AnggotaRombelQuery groupByLastSync() Group by the last_sync column
 * @method AnggotaRombelQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AnggotaRombelQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AnggotaRombelQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AnggotaRombelQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AnggotaRombelQuery leftJoinPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidik relation
 * @method AnggotaRombelQuery rightJoinPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidik relation
 * @method AnggotaRombelQuery innerJoinPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidik relation
 *
 * @method AnggotaRombelQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method AnggotaRombelQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method AnggotaRombelQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method AnggotaRombelQuery leftJoinJenisPendaftaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPendaftaran relation
 * @method AnggotaRombelQuery rightJoinJenisPendaftaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPendaftaran relation
 * @method AnggotaRombelQuery innerJoinJenisPendaftaran($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPendaftaran relation
 *
 * @method AnggotaRombelQuery leftJoinBantuanPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the BantuanPd relation
 * @method AnggotaRombelQuery rightJoinBantuanPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BantuanPd relation
 * @method AnggotaRombelQuery innerJoinBantuanPd($relationAlias = null) Adds a INNER JOIN clause to the query using the BantuanPd relation
 *
 * @method AnggotaRombel findOne(PropelPDO $con = null) Return the first AnggotaRombel matching the query
 * @method AnggotaRombel findOneOrCreate(PropelPDO $con = null) Return the first AnggotaRombel matching the query, or a new AnggotaRombel object populated from the query conditions when no match is found
 *
 * @method AnggotaRombel findOneByRombonganBelajarId(string $rombongan_belajar_id) Return the first AnggotaRombel filtered by the rombongan_belajar_id column
 * @method AnggotaRombel findOneByPesertaDidikId(string $peserta_didik_id) Return the first AnggotaRombel filtered by the peserta_didik_id column
 * @method AnggotaRombel findOneByJenisPendaftaranId(string $jenis_pendaftaran_id) Return the first AnggotaRombel filtered by the jenis_pendaftaran_id column
 * @method AnggotaRombel findOneByCreateDate(string $create_date) Return the first AnggotaRombel filtered by the create_date column
 * @method AnggotaRombel findOneByLastUpdate(string $last_update) Return the first AnggotaRombel filtered by the last_update column
 * @method AnggotaRombel findOneBySoftDelete(string $soft_delete) Return the first AnggotaRombel filtered by the soft_delete column
 * @method AnggotaRombel findOneByLastSync(string $last_sync) Return the first AnggotaRombel filtered by the last_sync column
 * @method AnggotaRombel findOneByUpdaterId(string $updater_id) Return the first AnggotaRombel filtered by the updater_id column
 *
 * @method array findByAnggotaRombelId(string $anggota_rombel_id) Return AnggotaRombel objects filtered by the anggota_rombel_id column
 * @method array findByRombonganBelajarId(string $rombongan_belajar_id) Return AnggotaRombel objects filtered by the rombongan_belajar_id column
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return AnggotaRombel objects filtered by the peserta_didik_id column
 * @method array findByJenisPendaftaranId(string $jenis_pendaftaran_id) Return AnggotaRombel objects filtered by the jenis_pendaftaran_id column
 * @method array findByCreateDate(string $create_date) Return AnggotaRombel objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return AnggotaRombel objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return AnggotaRombel objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return AnggotaRombel objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return AnggotaRombel objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAnggotaRombelQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAnggotaRombelQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\AnggotaRombel', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AnggotaRombelQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AnggotaRombelQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AnggotaRombelQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AnggotaRombelQuery) {
            return $criteria;
        }
        $query = new AnggotaRombelQuery();
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
     * @return   AnggotaRombel|AnggotaRombel[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AnggotaRombelPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AnggotaRombelPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 AnggotaRombel A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByAnggotaRombelId($key, $con = null)
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
     * @return                 AnggotaRombel A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "anggota_rombel_id", "rombongan_belajar_id", "peserta_didik_id", "jenis_pendaftaran_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "anggota_rombel" WHERE "anggota_rombel_id" = :p0';
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
            $obj = new AnggotaRombel();
            $obj->hydrate($row);
            AnggotaRombelPeer::addInstanceToPool($obj, (string) $key);
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
     * @return AnggotaRombel|AnggotaRombel[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|AnggotaRombel[]|mixed the list of results, formatted by the current formatter
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
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $keys, Criteria::IN);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $anggotaRombelId, $comparison);
    }

    /**
     * Filter the query on the rombongan_belajar_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRombonganBelajarId('fooValue');   // WHERE rombongan_belajar_id = 'fooValue'
     * $query->filterByRombonganBelajarId('%fooValue%'); // WHERE rombongan_belajar_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rombonganBelajarId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByRombonganBelajarId($rombonganBelajarId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rombonganBelajarId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rombonganBelajarId)) {
                $rombonganBelajarId = str_replace('*', '%', $rombonganBelajarId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajarId, $comparison);
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
    }

    /**
     * Filter the query on the jenis_pendaftaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPendaftaranId(1234); // WHERE jenis_pendaftaran_id = 1234
     * $query->filterByJenisPendaftaranId(array(12, 34)); // WHERE jenis_pendaftaran_id IN (12, 34)
     * $query->filterByJenisPendaftaranId(array('min' => 12)); // WHERE jenis_pendaftaran_id >= 12
     * $query->filterByJenisPendaftaranId(array('max' => 12)); // WHERE jenis_pendaftaran_id <= 12
     * </code>
     *
     * @see       filterByJenisPendaftaran()
     *
     * @param     mixed $jenisPendaftaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByJenisPendaftaranId($jenisPendaftaranId = null, $comparison = null)
    {
        if (is_array($jenisPendaftaranId)) {
            $useMinMax = false;
            if (isset($jenisPendaftaranId['min'])) {
                $this->addUsingAlias(AnggotaRombelPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPendaftaranId['max'])) {
                $this->addUsingAlias(AnggotaRombelPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaranId, $comparison);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AnggotaRombelPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AnggotaRombelPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AnggotaRombelPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AnggotaRombelPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AnggotaRombelPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AnggotaRombelPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AnggotaRombelPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AnggotaRombelPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AnggotaRombelPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AnggotaRombelQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AnggotaRombelPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaRombelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidik($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(AnggotaRombelPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaRombelPeer::PESERTA_DIDIK_ID, $pesertaDidik->toKeyValue('PrimaryKey', 'PesertaDidikId'), $comparison);
        } else {
            throw new PropelException('filterByPesertaDidik() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function joinPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidik');

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
            $this->addJoinObject($join, 'PesertaDidik');
        }

        return $this;
    }

    /**
     * Use the PesertaDidik relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidik', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaRombelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->getRombonganBelajarId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaRombelPeer::ROMBONGAN_BELAJAR_ID, $rombonganBelajar->toKeyValue('PrimaryKey', 'RombonganBelajarId'), $comparison);
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related JenisPendaftaran object
     *
     * @param   JenisPendaftaran|PropelObjectCollection $jenisPendaftaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaRombelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPendaftaran($jenisPendaftaran, $comparison = null)
    {
        if ($jenisPendaftaran instanceof JenisPendaftaran) {
            return $this
                ->addUsingAlias(AnggotaRombelPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->getJenisPendaftaranId(), $comparison);
        } elseif ($jenisPendaftaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AnggotaRombelPeer::JENIS_PENDAFTARAN_ID, $jenisPendaftaran->toKeyValue('PrimaryKey', 'JenisPendaftaranId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPendaftaran() only accepts arguments of type JenisPendaftaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPendaftaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function joinJenisPendaftaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPendaftaran');

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
            $this->addJoinObject($join, 'JenisPendaftaran');
        }

        return $this;
    }

    /**
     * Use the JenisPendaftaran relation JenisPendaftaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPendaftaranQuery A secondary query class using the current class as primary query
     */
    public function useJenisPendaftaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPendaftaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPendaftaran', '\DataDikdas\Model\JenisPendaftaranQuery');
    }

    /**
     * Filter the query by a related BantuanPd object
     *
     * @param   BantuanPd|PropelObjectCollection $bantuanPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AnggotaRombelQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBantuanPd($bantuanPd, $comparison = null)
    {
        if ($bantuanPd instanceof BantuanPd) {
            return $this
                ->addUsingAlias(AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $bantuanPd->getAnggotaRombelId(), $comparison);
        } elseif ($bantuanPd instanceof PropelObjectCollection) {
            return $this
                ->useBantuanPdQuery()
                ->filterByPrimaryKeys($bantuanPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBantuanPd() only accepts arguments of type BantuanPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BantuanPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function joinBantuanPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BantuanPd');

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
            $this->addJoinObject($join, 'BantuanPd');
        }

        return $this;
    }

    /**
     * Use the BantuanPd relation BantuanPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BantuanPdQuery A secondary query class using the current class as primary query
     */
    public function useBantuanPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBantuanPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BantuanPd', '\DataDikdas\Model\BantuanPdQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   AnggotaRombel $anggotaRombel Object to remove from the list of results
     *
     * @return AnggotaRombelQuery The current query, for fluid interface
     */
    public function prune($anggotaRombel = null)
    {
        if ($anggotaRombel) {
            $this->addUsingAlias(AnggotaRombelPeer::ANGGOTA_ROMBEL_ID, $anggotaRombel->getAnggotaRombelId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
