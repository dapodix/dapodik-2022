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
use DataDikdas\Model\Diklat;
use DataDikdas\Model\DiklatPeer;
use DataDikdas\Model\DiklatQuery;
use DataDikdas\Model\JenisDiklat;
use DataDikdas\Model\Ptk;

/**
 * Base class that represents a query for the 'diklat' table.
 *
 * 
 *
 * @method DiklatQuery orderByDiklatId($order = Criteria::ASC) Order by the diklat_id column
 * @method DiklatQuery orderByJenisDiklatId($order = Criteria::ASC) Order by the jenis_diklat_id column
 * @method DiklatQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method DiklatQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method DiklatQuery orderByPenyelenggara($order = Criteria::ASC) Order by the penyelenggara column
 * @method DiklatQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method DiklatQuery orderByPeran($order = Criteria::ASC) Order by the peran column
 * @method DiklatQuery orderByTingkat($order = Criteria::ASC) Order by the tingkat column
 * @method DiklatQuery orderByBerapaJam($order = Criteria::ASC) Order by the berapa_jam column
 * @method DiklatQuery orderBySertifikatDiklat($order = Criteria::ASC) Order by the sertifikat_diklat column
 * @method DiklatQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method DiklatQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method DiklatQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method DiklatQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method DiklatQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method DiklatQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method DiklatQuery groupByDiklatId() Group by the diklat_id column
 * @method DiklatQuery groupByJenisDiklatId() Group by the jenis_diklat_id column
 * @method DiklatQuery groupByPtkId() Group by the ptk_id column
 * @method DiklatQuery groupByNama() Group by the nama column
 * @method DiklatQuery groupByPenyelenggara() Group by the penyelenggara column
 * @method DiklatQuery groupByTahun() Group by the tahun column
 * @method DiklatQuery groupByPeran() Group by the peran column
 * @method DiklatQuery groupByTingkat() Group by the tingkat column
 * @method DiklatQuery groupByBerapaJam() Group by the berapa_jam column
 * @method DiklatQuery groupBySertifikatDiklat() Group by the sertifikat_diklat column
 * @method DiklatQuery groupByAsalData() Group by the asal_data column
 * @method DiklatQuery groupByCreateDate() Group by the create_date column
 * @method DiklatQuery groupByLastUpdate() Group by the last_update column
 * @method DiklatQuery groupBySoftDelete() Group by the soft_delete column
 * @method DiklatQuery groupByLastSync() Group by the last_sync column
 * @method DiklatQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method DiklatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method DiklatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method DiklatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method DiklatQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method DiklatQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method DiklatQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method DiklatQuery leftJoinJenisDiklat($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisDiklat relation
 * @method DiklatQuery rightJoinJenisDiklat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisDiklat relation
 * @method DiklatQuery innerJoinJenisDiklat($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisDiklat relation
 *
 * @method Diklat findOne(PropelPDO $con = null) Return the first Diklat matching the query
 * @method Diklat findOneOrCreate(PropelPDO $con = null) Return the first Diklat matching the query, or a new Diklat object populated from the query conditions when no match is found
 *
 * @method Diklat findOneByJenisDiklatId(int $jenis_diklat_id) Return the first Diklat filtered by the jenis_diklat_id column
 * @method Diklat findOneByPtkId(string $ptk_id) Return the first Diklat filtered by the ptk_id column
 * @method Diklat findOneByNama(string $nama) Return the first Diklat filtered by the nama column
 * @method Diklat findOneByPenyelenggara(string $penyelenggara) Return the first Diklat filtered by the penyelenggara column
 * @method Diklat findOneByTahun(string $tahun) Return the first Diklat filtered by the tahun column
 * @method Diklat findOneByPeran(string $peran) Return the first Diklat filtered by the peran column
 * @method Diklat findOneByTingkat(string $tingkat) Return the first Diklat filtered by the tingkat column
 * @method Diklat findOneByBerapaJam(string $berapa_jam) Return the first Diklat filtered by the berapa_jam column
 * @method Diklat findOneBySertifikatDiklat(string $sertifikat_diklat) Return the first Diklat filtered by the sertifikat_diklat column
 * @method Diklat findOneByAsalData(string $asal_data) Return the first Diklat filtered by the asal_data column
 * @method Diklat findOneByCreateDate(string $create_date) Return the first Diklat filtered by the create_date column
 * @method Diklat findOneByLastUpdate(string $last_update) Return the first Diklat filtered by the last_update column
 * @method Diklat findOneBySoftDelete(string $soft_delete) Return the first Diklat filtered by the soft_delete column
 * @method Diklat findOneByLastSync(string $last_sync) Return the first Diklat filtered by the last_sync column
 * @method Diklat findOneByUpdaterId(string $updater_id) Return the first Diklat filtered by the updater_id column
 *
 * @method array findByDiklatId(string $diklat_id) Return Diklat objects filtered by the diklat_id column
 * @method array findByJenisDiklatId(int $jenis_diklat_id) Return Diklat objects filtered by the jenis_diklat_id column
 * @method array findByPtkId(string $ptk_id) Return Diklat objects filtered by the ptk_id column
 * @method array findByNama(string $nama) Return Diklat objects filtered by the nama column
 * @method array findByPenyelenggara(string $penyelenggara) Return Diklat objects filtered by the penyelenggara column
 * @method array findByTahun(string $tahun) Return Diklat objects filtered by the tahun column
 * @method array findByPeran(string $peran) Return Diklat objects filtered by the peran column
 * @method array findByTingkat(string $tingkat) Return Diklat objects filtered by the tingkat column
 * @method array findByBerapaJam(string $berapa_jam) Return Diklat objects filtered by the berapa_jam column
 * @method array findBySertifikatDiklat(string $sertifikat_diklat) Return Diklat objects filtered by the sertifikat_diklat column
 * @method array findByAsalData(string $asal_data) Return Diklat objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Diklat objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Diklat objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Diklat objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Diklat objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Diklat objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDiklatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseDiklatQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Diklat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new DiklatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   DiklatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return DiklatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof DiklatQuery) {
            return $criteria;
        }
        $query = new DiklatQuery();
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
     * @return   Diklat|Diklat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = DiklatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(DiklatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Diklat A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByDiklatId($key, $con = null)
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
     * @return                 Diklat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "diklat_id", "jenis_diklat_id", "ptk_id", "nama", "penyelenggara", "tahun", "peran", "tingkat", "berapa_jam", "sertifikat_diklat", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "diklat" WHERE "diklat_id" = :p0';
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
            $obj = new Diklat();
            $obj->hydrate($row);
            DiklatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Diklat|Diklat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Diklat[]|mixed the list of results, formatted by the current formatter
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(DiklatPeer::DIKLAT_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(DiklatPeer::DIKLAT_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the diklat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByDiklatId('fooValue');   // WHERE diklat_id = 'fooValue'
     * $query->filterByDiklatId('%fooValue%'); // WHERE diklat_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $diklatId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByDiklatId($diklatId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($diklatId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $diklatId)) {
                $diklatId = str_replace('*', '%', $diklatId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiklatPeer::DIKLAT_ID, $diklatId, $comparison);
    }

    /**
     * Filter the query on the jenis_diklat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisDiklatId(1234); // WHERE jenis_diklat_id = 1234
     * $query->filterByJenisDiklatId(array(12, 34)); // WHERE jenis_diklat_id IN (12, 34)
     * $query->filterByJenisDiklatId(array('min' => 12)); // WHERE jenis_diklat_id >= 12
     * $query->filterByJenisDiklatId(array('max' => 12)); // WHERE jenis_diklat_id <= 12
     * </code>
     *
     * @see       filterByJenisDiklat()
     *
     * @param     mixed $jenisDiklatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByJenisDiklatId($jenisDiklatId = null, $comparison = null)
    {
        if (is_array($jenisDiklatId)) {
            $useMinMax = false;
            if (isset($jenisDiklatId['min'])) {
                $this->addUsingAlias(DiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisDiklatId['max'])) {
                $this->addUsingAlias(DiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::JENIS_DIKLAT_ID, $jenisDiklatId, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiklatPeer::PTK_ID, $ptkId, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiklatPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the penyelenggara column
     *
     * Example usage:
     * <code>
     * $query->filterByPenyelenggara('fooValue');   // WHERE penyelenggara = 'fooValue'
     * $query->filterByPenyelenggara('%fooValue%'); // WHERE penyelenggara LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penyelenggara The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByPenyelenggara($penyelenggara = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penyelenggara)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penyelenggara)) {
                $penyelenggara = str_replace('*', '%', $penyelenggara);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiklatPeer::PENYELENGGARA, $penyelenggara, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(DiklatPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(DiklatPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::TAHUN, $tahun, $comparison);
    }

    /**
     * Filter the query on the peran column
     *
     * Example usage:
     * <code>
     * $query->filterByPeran('fooValue');   // WHERE peran = 'fooValue'
     * $query->filterByPeran('%fooValue%'); // WHERE peran LIKE '%fooValue%'
     * </code>
     *
     * @param     string $peran The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByPeran($peran = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($peran)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $peran)) {
                $peran = str_replace('*', '%', $peran);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiklatPeer::PERAN, $peran, $comparison);
    }

    /**
     * Filter the query on the tingkat column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkat(1234); // WHERE tingkat = 1234
     * $query->filterByTingkat(array(12, 34)); // WHERE tingkat IN (12, 34)
     * $query->filterByTingkat(array('min' => 12)); // WHERE tingkat >= 12
     * $query->filterByTingkat(array('max' => 12)); // WHERE tingkat <= 12
     * </code>
     *
     * @param     mixed $tingkat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByTingkat($tingkat = null, $comparison = null)
    {
        if (is_array($tingkat)) {
            $useMinMax = false;
            if (isset($tingkat['min'])) {
                $this->addUsingAlias(DiklatPeer::TINGKAT, $tingkat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkat['max'])) {
                $this->addUsingAlias(DiklatPeer::TINGKAT, $tingkat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::TINGKAT, $tingkat, $comparison);
    }

    /**
     * Filter the query on the berapa_jam column
     *
     * Example usage:
     * <code>
     * $query->filterByBerapaJam(1234); // WHERE berapa_jam = 1234
     * $query->filterByBerapaJam(array(12, 34)); // WHERE berapa_jam IN (12, 34)
     * $query->filterByBerapaJam(array('min' => 12)); // WHERE berapa_jam >= 12
     * $query->filterByBerapaJam(array('max' => 12)); // WHERE berapa_jam <= 12
     * </code>
     *
     * @param     mixed $berapaJam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByBerapaJam($berapaJam = null, $comparison = null)
    {
        if (is_array($berapaJam)) {
            $useMinMax = false;
            if (isset($berapaJam['min'])) {
                $this->addUsingAlias(DiklatPeer::BERAPA_JAM, $berapaJam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($berapaJam['max'])) {
                $this->addUsingAlias(DiklatPeer::BERAPA_JAM, $berapaJam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::BERAPA_JAM, $berapaJam, $comparison);
    }

    /**
     * Filter the query on the sertifikat_diklat column
     *
     * Example usage:
     * <code>
     * $query->filterBySertifikatDiklat('fooValue');   // WHERE sertifikat_diklat = 'fooValue'
     * $query->filterBySertifikatDiklat('%fooValue%'); // WHERE sertifikat_diklat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sertifikatDiklat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterBySertifikatDiklat($sertifikatDiklat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sertifikatDiklat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sertifikatDiklat)) {
                $sertifikatDiklat = str_replace('*', '%', $sertifikatDiklat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(DiklatPeer::SERTIFIKAT_DIKLAT, $sertifikatDiklat, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiklatPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(DiklatPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(DiklatPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(DiklatPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(DiklatPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(DiklatPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(DiklatPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(DiklatPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(DiklatPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(DiklatPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(DiklatPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DiklatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(DiklatPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiklatPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return DiklatQuery The current query, for fluid interface
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
     * Filter the query by a related JenisDiklat object
     *
     * @param   JenisDiklat|PropelObjectCollection $jenisDiklat The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 DiklatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisDiklat($jenisDiklat, $comparison = null)
    {
        if ($jenisDiklat instanceof JenisDiklat) {
            return $this
                ->addUsingAlias(DiklatPeer::JENIS_DIKLAT_ID, $jenisDiklat->getJenisDiklatId(), $comparison);
        } elseif ($jenisDiklat instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(DiklatPeer::JENIS_DIKLAT_ID, $jenisDiklat->toKeyValue('PrimaryKey', 'JenisDiklatId'), $comparison);
        } else {
            throw new PropelException('filterByJenisDiklat() only accepts arguments of type JenisDiklat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisDiklat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function joinJenisDiklat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisDiklat');

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
            $this->addJoinObject($join, 'JenisDiklat');
        }

        return $this;
    }

    /**
     * Use the JenisDiklat relation JenisDiklat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisDiklatQuery A secondary query class using the current class as primary query
     */
    public function useJenisDiklatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisDiklat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisDiklat', '\DataDikdas\Model\JenisDiklatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Diklat $diklat Object to remove from the list of results
     *
     * @return DiklatQuery The current query, for fluid interface
     */
    public function prune($diklat = null)
    {
        if ($diklat) {
            $this->addUsingAlias(DiklatPeer::DIKLAT_ID, $diklat->getDiklatId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
