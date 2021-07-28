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
use DataDikdas\Model\AlatDariBlockgrant;
use DataDikdas\Model\AngkutanDariBlockgrant;
use DataDikdas\Model\BangunanDariBlockgrant;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\BlockgrantPeer;
use DataDikdas\Model\BlockgrantQuery;
use DataDikdas\Model\JenisBantuan;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\TanahDariBlockgrant;

/**
 * Base class that represents a query for the 'blockgrant' table.
 *
 * 
 *
 * @method BlockgrantQuery orderByBlockgrantId($order = Criteria::ASC) Order by the blockgrant_id column
 * @method BlockgrantQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method BlockgrantQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method BlockgrantQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method BlockgrantQuery orderByJenisBantuanId($order = Criteria::ASC) Order by the jenis_bantuan_id column
 * @method BlockgrantQuery orderBySumberDanaId($order = Criteria::ASC) Order by the sumber_dana_id column
 * @method BlockgrantQuery orderByBesarBantuan($order = Criteria::ASC) Order by the besar_bantuan column
 * @method BlockgrantQuery orderByDanaPendamping($order = Criteria::ASC) Order by the dana_pendamping column
 * @method BlockgrantQuery orderByPeruntukanDana($order = Criteria::ASC) Order by the peruntukan_dana column
 * @method BlockgrantQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method BlockgrantQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BlockgrantQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BlockgrantQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BlockgrantQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BlockgrantQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BlockgrantQuery groupByBlockgrantId() Group by the blockgrant_id column
 * @method BlockgrantQuery groupBySekolahId() Group by the sekolah_id column
 * @method BlockgrantQuery groupByNama() Group by the nama column
 * @method BlockgrantQuery groupByTahun() Group by the tahun column
 * @method BlockgrantQuery groupByJenisBantuanId() Group by the jenis_bantuan_id column
 * @method BlockgrantQuery groupBySumberDanaId() Group by the sumber_dana_id column
 * @method BlockgrantQuery groupByBesarBantuan() Group by the besar_bantuan column
 * @method BlockgrantQuery groupByDanaPendamping() Group by the dana_pendamping column
 * @method BlockgrantQuery groupByPeruntukanDana() Group by the peruntukan_dana column
 * @method BlockgrantQuery groupByAsalData() Group by the asal_data column
 * @method BlockgrantQuery groupByCreateDate() Group by the create_date column
 * @method BlockgrantQuery groupByLastUpdate() Group by the last_update column
 * @method BlockgrantQuery groupBySoftDelete() Group by the soft_delete column
 * @method BlockgrantQuery groupByLastSync() Group by the last_sync column
 * @method BlockgrantQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BlockgrantQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BlockgrantQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BlockgrantQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BlockgrantQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method BlockgrantQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method BlockgrantQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method BlockgrantQuery leftJoinJenisBantuan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisBantuan relation
 * @method BlockgrantQuery rightJoinJenisBantuan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisBantuan relation
 * @method BlockgrantQuery innerJoinJenisBantuan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisBantuan relation
 *
 * @method BlockgrantQuery leftJoinSumberDana($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberDana relation
 * @method BlockgrantQuery rightJoinSumberDana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberDana relation
 * @method BlockgrantQuery innerJoinSumberDana($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberDana relation
 *
 * @method BlockgrantQuery leftJoinAlatDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlatDariBlockgrant relation
 * @method BlockgrantQuery rightJoinAlatDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlatDariBlockgrant relation
 * @method BlockgrantQuery innerJoinAlatDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the AlatDariBlockgrant relation
 *
 * @method BlockgrantQuery leftJoinAngkutanDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the AngkutanDariBlockgrant relation
 * @method BlockgrantQuery rightJoinAngkutanDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AngkutanDariBlockgrant relation
 * @method BlockgrantQuery innerJoinAngkutanDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the AngkutanDariBlockgrant relation
 *
 * @method BlockgrantQuery leftJoinBangunanDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the BangunanDariBlockgrant relation
 * @method BlockgrantQuery rightJoinBangunanDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BangunanDariBlockgrant relation
 * @method BlockgrantQuery innerJoinBangunanDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the BangunanDariBlockgrant relation
 *
 * @method BlockgrantQuery leftJoinTanahDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the TanahDariBlockgrant relation
 * @method BlockgrantQuery rightJoinTanahDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TanahDariBlockgrant relation
 * @method BlockgrantQuery innerJoinTanahDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the TanahDariBlockgrant relation
 *
 * @method Blockgrant findOne(PropelPDO $con = null) Return the first Blockgrant matching the query
 * @method Blockgrant findOneOrCreate(PropelPDO $con = null) Return the first Blockgrant matching the query, or a new Blockgrant object populated from the query conditions when no match is found
 *
 * @method Blockgrant findOneBySekolahId(string $sekolah_id) Return the first Blockgrant filtered by the sekolah_id column
 * @method Blockgrant findOneByNama(string $nama) Return the first Blockgrant filtered by the nama column
 * @method Blockgrant findOneByTahun(string $tahun) Return the first Blockgrant filtered by the tahun column
 * @method Blockgrant findOneByJenisBantuanId(int $jenis_bantuan_id) Return the first Blockgrant filtered by the jenis_bantuan_id column
 * @method Blockgrant findOneBySumberDanaId(string $sumber_dana_id) Return the first Blockgrant filtered by the sumber_dana_id column
 * @method Blockgrant findOneByBesarBantuan(string $besar_bantuan) Return the first Blockgrant filtered by the besar_bantuan column
 * @method Blockgrant findOneByDanaPendamping(string $dana_pendamping) Return the first Blockgrant filtered by the dana_pendamping column
 * @method Blockgrant findOneByPeruntukanDana(string $peruntukan_dana) Return the first Blockgrant filtered by the peruntukan_dana column
 * @method Blockgrant findOneByAsalData(string $asal_data) Return the first Blockgrant filtered by the asal_data column
 * @method Blockgrant findOneByCreateDate(string $create_date) Return the first Blockgrant filtered by the create_date column
 * @method Blockgrant findOneByLastUpdate(string $last_update) Return the first Blockgrant filtered by the last_update column
 * @method Blockgrant findOneBySoftDelete(string $soft_delete) Return the first Blockgrant filtered by the soft_delete column
 * @method Blockgrant findOneByLastSync(string $last_sync) Return the first Blockgrant filtered by the last_sync column
 * @method Blockgrant findOneByUpdaterId(string $updater_id) Return the first Blockgrant filtered by the updater_id column
 *
 * @method array findByBlockgrantId(string $blockgrant_id) Return Blockgrant objects filtered by the blockgrant_id column
 * @method array findBySekolahId(string $sekolah_id) Return Blockgrant objects filtered by the sekolah_id column
 * @method array findByNama(string $nama) Return Blockgrant objects filtered by the nama column
 * @method array findByTahun(string $tahun) Return Blockgrant objects filtered by the tahun column
 * @method array findByJenisBantuanId(int $jenis_bantuan_id) Return Blockgrant objects filtered by the jenis_bantuan_id column
 * @method array findBySumberDanaId(string $sumber_dana_id) Return Blockgrant objects filtered by the sumber_dana_id column
 * @method array findByBesarBantuan(string $besar_bantuan) Return Blockgrant objects filtered by the besar_bantuan column
 * @method array findByDanaPendamping(string $dana_pendamping) Return Blockgrant objects filtered by the dana_pendamping column
 * @method array findByPeruntukanDana(string $peruntukan_dana) Return Blockgrant objects filtered by the peruntukan_dana column
 * @method array findByAsalData(string $asal_data) Return Blockgrant objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Blockgrant objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Blockgrant objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Blockgrant objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Blockgrant objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Blockgrant objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBlockgrantQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBlockgrantQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Blockgrant', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BlockgrantQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BlockgrantQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BlockgrantQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BlockgrantQuery) {
            return $criteria;
        }
        $query = new BlockgrantQuery();
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
     * @return   Blockgrant|Blockgrant[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BlockgrantPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Blockgrant A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBlockgrantId($key, $con = null)
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
     * @return                 Blockgrant A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "blockgrant_id", "sekolah_id", "nama", "tahun", "jenis_bantuan_id", "sumber_dana_id", "besar_bantuan", "dana_pendamping", "peruntukan_dana", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "blockgrant" WHERE "blockgrant_id" = :p0';
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
            $obj = new Blockgrant();
            $obj->hydrate($row);
            BlockgrantPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Blockgrant|Blockgrant[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Blockgrant[]|mixed the list of results, formatted by the current formatter
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the blockgrant_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlockgrantId('fooValue');   // WHERE blockgrant_id = 'fooValue'
     * $query->filterByBlockgrantId('%fooValue%'); // WHERE blockgrant_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blockgrantId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByBlockgrantId($blockgrantId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blockgrantId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blockgrantId)) {
                $blockgrantId = str_replace('*', '%', $blockgrantId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $blockgrantId, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlockgrantPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByTahun(1234); // WHERE tahun = 1234
     * $query->filterByTahun(array(12, 34)); // WHERE tahun IN (12, 34)
     * $query->filterByTahun(array('min' => 12)); // WHERE tahun >= 12
     * $query->filterByTahun(array('max' => 12)); // WHERE tahun <= 12
     * </code>
     *
     * @param     mixed $tahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(BlockgrantPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(BlockgrantPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::TAHUN, $tahun, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByJenisBantuanId($jenisBantuanId = null, $comparison = null)
    {
        if (is_array($jenisBantuanId)) {
            $useMinMax = false;
            if (isset($jenisBantuanId['min'])) {
                $this->addUsingAlias(BlockgrantPeer::JENIS_BANTUAN_ID, $jenisBantuanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisBantuanId['max'])) {
                $this->addUsingAlias(BlockgrantPeer::JENIS_BANTUAN_ID, $jenisBantuanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::JENIS_BANTUAN_ID, $jenisBantuanId, $comparison);
    }

    /**
     * Filter the query on the sumber_dana_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDanaId(1234); // WHERE sumber_dana_id = 1234
     * $query->filterBySumberDanaId(array(12, 34)); // WHERE sumber_dana_id IN (12, 34)
     * $query->filterBySumberDanaId(array('min' => 12)); // WHERE sumber_dana_id >= 12
     * $query->filterBySumberDanaId(array('max' => 12)); // WHERE sumber_dana_id <= 12
     * </code>
     *
     * @see       filterBySumberDana()
     *
     * @param     mixed $sumberDanaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterBySumberDanaId($sumberDanaId = null, $comparison = null)
    {
        if (is_array($sumberDanaId)) {
            $useMinMax = false;
            if (isset($sumberDanaId['min'])) {
                $this->addUsingAlias(BlockgrantPeer::SUMBER_DANA_ID, $sumberDanaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberDanaId['max'])) {
                $this->addUsingAlias(BlockgrantPeer::SUMBER_DANA_ID, $sumberDanaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::SUMBER_DANA_ID, $sumberDanaId, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByBesarBantuan($besarBantuan = null, $comparison = null)
    {
        if (is_array($besarBantuan)) {
            $useMinMax = false;
            if (isset($besarBantuan['min'])) {
                $this->addUsingAlias(BlockgrantPeer::BESAR_BANTUAN, $besarBantuan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($besarBantuan['max'])) {
                $this->addUsingAlias(BlockgrantPeer::BESAR_BANTUAN, $besarBantuan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::BESAR_BANTUAN, $besarBantuan, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByDanaPendamping($danaPendamping = null, $comparison = null)
    {
        if (is_array($danaPendamping)) {
            $useMinMax = false;
            if (isset($danaPendamping['min'])) {
                $this->addUsingAlias(BlockgrantPeer::DANA_PENDAMPING, $danaPendamping['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($danaPendamping['max'])) {
                $this->addUsingAlias(BlockgrantPeer::DANA_PENDAMPING, $danaPendamping['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::DANA_PENDAMPING, $danaPendamping, $comparison);
    }

    /**
     * Filter the query on the peruntukan_dana column
     *
     * Example usage:
     * <code>
     * $query->filterByPeruntukanDana('fooValue');   // WHERE peruntukan_dana = 'fooValue'
     * $query->filterByPeruntukanDana('%fooValue%'); // WHERE peruntukan_dana LIKE '%fooValue%'
     * </code>
     *
     * @param     string $peruntukanDana The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByPeruntukanDana($peruntukanDana = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($peruntukanDana)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $peruntukanDana)) {
                $peruntukanDana = str_replace('*', '%', $peruntukanDana);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::PERUNTUKAN_DANA, $peruntukanDana, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlockgrantPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BlockgrantPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BlockgrantPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BlockgrantPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BlockgrantPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BlockgrantPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BlockgrantPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BlockgrantPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BlockgrantPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BlockgrantPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BlockgrantPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(BlockgrantPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlockgrantPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
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
     * Filter the query by a related JenisBantuan object
     *
     * @param   JenisBantuan|PropelObjectCollection $jenisBantuan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisBantuan($jenisBantuan, $comparison = null)
    {
        if ($jenisBantuan instanceof JenisBantuan) {
            return $this
                ->addUsingAlias(BlockgrantPeer::JENIS_BANTUAN_ID, $jenisBantuan->getJenisBantuanId(), $comparison);
        } elseif ($jenisBantuan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlockgrantPeer::JENIS_BANTUAN_ID, $jenisBantuan->toKeyValue('PrimaryKey', 'JenisBantuanId'), $comparison);
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
     * @return BlockgrantQuery The current query, for fluid interface
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
     * Filter the query by a related SumberDana object
     *
     * @param   SumberDana|PropelObjectCollection $sumberDana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberDana($sumberDana, $comparison = null)
    {
        if ($sumberDana instanceof SumberDana) {
            return $this
                ->addUsingAlias(BlockgrantPeer::SUMBER_DANA_ID, $sumberDana->getSumberDanaId(), $comparison);
        } elseif ($sumberDana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BlockgrantPeer::SUMBER_DANA_ID, $sumberDana->toKeyValue('PrimaryKey', 'SumberDanaId'), $comparison);
        } else {
            throw new PropelException('filterBySumberDana() only accepts arguments of type SumberDana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberDana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function joinSumberDana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberDana');

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
            $this->addJoinObject($join, 'SumberDana');
        }

        return $this;
    }

    /**
     * Use the SumberDana relation SumberDana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberDanaQuery A secondary query class using the current class as primary query
     */
    public function useSumberDanaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberDana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberDana', '\DataDikdas\Model\SumberDanaQuery');
    }

    /**
     * Filter the query by a related AlatDariBlockgrant object
     *
     * @param   AlatDariBlockgrant|PropelObjectCollection $alatDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlatDariBlockgrant($alatDariBlockgrant, $comparison = null)
    {
        if ($alatDariBlockgrant instanceof AlatDariBlockgrant) {
            return $this
                ->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $alatDariBlockgrant->getBlockgrantId(), $comparison);
        } elseif ($alatDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useAlatDariBlockgrantQuery()
                ->filterByPrimaryKeys($alatDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlatDariBlockgrant() only accepts arguments of type AlatDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlatDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function joinAlatDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlatDariBlockgrant');

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
            $this->addJoinObject($join, 'AlatDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the AlatDariBlockgrant relation AlatDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useAlatDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlatDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlatDariBlockgrant', '\DataDikdas\Model\AlatDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related AngkutanDariBlockgrant object
     *
     * @param   AngkutanDariBlockgrant|PropelObjectCollection $angkutanDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutanDariBlockgrant($angkutanDariBlockgrant, $comparison = null)
    {
        if ($angkutanDariBlockgrant instanceof AngkutanDariBlockgrant) {
            return $this
                ->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $angkutanDariBlockgrant->getBlockgrantId(), $comparison);
        } elseif ($angkutanDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanDariBlockgrantQuery()
                ->filterByPrimaryKeys($angkutanDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutanDariBlockgrant() only accepts arguments of type AngkutanDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AngkutanDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function joinAngkutanDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AngkutanDariBlockgrant');

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
            $this->addJoinObject($join, 'AngkutanDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the AngkutanDariBlockgrant relation AngkutanDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutanDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AngkutanDariBlockgrant', '\DataDikdas\Model\AngkutanDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related BangunanDariBlockgrant object
     *
     * @param   BangunanDariBlockgrant|PropelObjectCollection $bangunanDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunanDariBlockgrant($bangunanDariBlockgrant, $comparison = null)
    {
        if ($bangunanDariBlockgrant instanceof BangunanDariBlockgrant) {
            return $this
                ->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $bangunanDariBlockgrant->getBlockgrantId(), $comparison);
        } elseif ($bangunanDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useBangunanDariBlockgrantQuery()
                ->filterByPrimaryKeys($bangunanDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunanDariBlockgrant() only accepts arguments of type BangunanDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BangunanDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function joinBangunanDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BangunanDariBlockgrant');

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
            $this->addJoinObject($join, 'BangunanDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the BangunanDariBlockgrant relation BangunanDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useBangunanDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunanDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BangunanDariBlockgrant', '\DataDikdas\Model\BangunanDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related TanahDariBlockgrant object
     *
     * @param   TanahDariBlockgrant|PropelObjectCollection $tanahDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BlockgrantQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanahDariBlockgrant($tanahDariBlockgrant, $comparison = null)
    {
        if ($tanahDariBlockgrant instanceof TanahDariBlockgrant) {
            return $this
                ->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $tanahDariBlockgrant->getBlockgrantId(), $comparison);
        } elseif ($tanahDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useTanahDariBlockgrantQuery()
                ->filterByPrimaryKeys($tanahDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanahDariBlockgrant() only accepts arguments of type TanahDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TanahDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function joinTanahDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TanahDariBlockgrant');

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
            $this->addJoinObject($join, 'TanahDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the TanahDariBlockgrant relation TanahDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useTanahDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanahDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TanahDariBlockgrant', '\DataDikdas\Model\TanahDariBlockgrantQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Blockgrant $blockgrant Object to remove from the list of results
     *
     * @return BlockgrantQuery The current query, for fluid interface
     */
    public function prune($blockgrant = null)
    {
        if ($blockgrant) {
            $this->addUsingAlias(BlockgrantPeer::BLOCKGRANT_ID, $blockgrant->getBlockgrantId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
