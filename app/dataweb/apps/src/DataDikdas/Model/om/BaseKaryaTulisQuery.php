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
use DataDikdas\Model\KaryaTulis;
use DataDikdas\Model\KaryaTulisPeer;
use DataDikdas\Model\KaryaTulisQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldKaryaTulis;

/**
 * Base class that represents a query for the 'karya_tulis' table.
 *
 * 
 *
 * @method KaryaTulisQuery orderByKaryaTulisId($order = Criteria::ASC) Order by the karya_tulis_id column
 * @method KaryaTulisQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method KaryaTulisQuery orderByJudul($order = Criteria::ASC) Order by the judul column
 * @method KaryaTulisQuery orderByTahunPembuatan($order = Criteria::ASC) Order by the tahun_pembuatan column
 * @method KaryaTulisQuery orderByPublikasi($order = Criteria::ASC) Order by the publikasi column
 * @method KaryaTulisQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method KaryaTulisQuery orderByUrlPublikasi($order = Criteria::ASC) Order by the url_publikasi column
 * @method KaryaTulisQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method KaryaTulisQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method KaryaTulisQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method KaryaTulisQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method KaryaTulisQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method KaryaTulisQuery groupByKaryaTulisId() Group by the karya_tulis_id column
 * @method KaryaTulisQuery groupByPtkId() Group by the ptk_id column
 * @method KaryaTulisQuery groupByJudul() Group by the judul column
 * @method KaryaTulisQuery groupByTahunPembuatan() Group by the tahun_pembuatan column
 * @method KaryaTulisQuery groupByPublikasi() Group by the publikasi column
 * @method KaryaTulisQuery groupByKeterangan() Group by the keterangan column
 * @method KaryaTulisQuery groupByUrlPublikasi() Group by the url_publikasi column
 * @method KaryaTulisQuery groupByCreateDate() Group by the create_date column
 * @method KaryaTulisQuery groupByLastUpdate() Group by the last_update column
 * @method KaryaTulisQuery groupBySoftDelete() Group by the soft_delete column
 * @method KaryaTulisQuery groupByLastSync() Group by the last_sync column
 * @method KaryaTulisQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method KaryaTulisQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method KaryaTulisQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method KaryaTulisQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method KaryaTulisQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method KaryaTulisQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method KaryaTulisQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method KaryaTulisQuery leftJoinVldKaryaTulis($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldKaryaTulis relation
 * @method KaryaTulisQuery rightJoinVldKaryaTulis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldKaryaTulis relation
 * @method KaryaTulisQuery innerJoinVldKaryaTulis($relationAlias = null) Adds a INNER JOIN clause to the query using the VldKaryaTulis relation
 *
 * @method KaryaTulis findOne(PropelPDO $con = null) Return the first KaryaTulis matching the query
 * @method KaryaTulis findOneOrCreate(PropelPDO $con = null) Return the first KaryaTulis matching the query, or a new KaryaTulis object populated from the query conditions when no match is found
 *
 * @method KaryaTulis findOneByPtkId(string $ptk_id) Return the first KaryaTulis filtered by the ptk_id column
 * @method KaryaTulis findOneByJudul(string $judul) Return the first KaryaTulis filtered by the judul column
 * @method KaryaTulis findOneByTahunPembuatan(string $tahun_pembuatan) Return the first KaryaTulis filtered by the tahun_pembuatan column
 * @method KaryaTulis findOneByPublikasi(string $publikasi) Return the first KaryaTulis filtered by the publikasi column
 * @method KaryaTulis findOneByKeterangan(string $keterangan) Return the first KaryaTulis filtered by the keterangan column
 * @method KaryaTulis findOneByUrlPublikasi(string $url_publikasi) Return the first KaryaTulis filtered by the url_publikasi column
 * @method KaryaTulis findOneByCreateDate(string $create_date) Return the first KaryaTulis filtered by the create_date column
 * @method KaryaTulis findOneByLastUpdate(string $last_update) Return the first KaryaTulis filtered by the last_update column
 * @method KaryaTulis findOneBySoftDelete(string $soft_delete) Return the first KaryaTulis filtered by the soft_delete column
 * @method KaryaTulis findOneByLastSync(string $last_sync) Return the first KaryaTulis filtered by the last_sync column
 * @method KaryaTulis findOneByUpdaterId(string $updater_id) Return the first KaryaTulis filtered by the updater_id column
 *
 * @method array findByKaryaTulisId(string $karya_tulis_id) Return KaryaTulis objects filtered by the karya_tulis_id column
 * @method array findByPtkId(string $ptk_id) Return KaryaTulis objects filtered by the ptk_id column
 * @method array findByJudul(string $judul) Return KaryaTulis objects filtered by the judul column
 * @method array findByTahunPembuatan(string $tahun_pembuatan) Return KaryaTulis objects filtered by the tahun_pembuatan column
 * @method array findByPublikasi(string $publikasi) Return KaryaTulis objects filtered by the publikasi column
 * @method array findByKeterangan(string $keterangan) Return KaryaTulis objects filtered by the keterangan column
 * @method array findByUrlPublikasi(string $url_publikasi) Return KaryaTulis objects filtered by the url_publikasi column
 * @method array findByCreateDate(string $create_date) Return KaryaTulis objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return KaryaTulis objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return KaryaTulis objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return KaryaTulis objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return KaryaTulis objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKaryaTulisQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseKaryaTulisQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\KaryaTulis', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new KaryaTulisQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   KaryaTulisQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return KaryaTulisQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof KaryaTulisQuery) {
            return $criteria;
        }
        $query = new KaryaTulisQuery();
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
     * @return   KaryaTulis|KaryaTulis[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = KaryaTulisPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(KaryaTulisPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 KaryaTulis A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByKaryaTulisId($key, $con = null)
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
     * @return                 KaryaTulis A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "karya_tulis_id", "ptk_id", "judul", "tahun_pembuatan", "publikasi", "keterangan", "url_publikasi", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "karya_tulis" WHERE "karya_tulis_id" = :p0';
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
            $obj = new KaryaTulis();
            $obj->hydrate($row);
            KaryaTulisPeer::addInstanceToPool($obj, (string) $key);
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
     * @return KaryaTulis|KaryaTulis[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|KaryaTulis[]|mixed the list of results, formatted by the current formatter
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
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(KaryaTulisPeer::KARYA_TULIS_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(KaryaTulisPeer::KARYA_TULIS_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the karya_tulis_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKaryaTulisId('fooValue');   // WHERE karya_tulis_id = 'fooValue'
     * $query->filterByKaryaTulisId('%fooValue%'); // WHERE karya_tulis_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $karyaTulisId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByKaryaTulisId($karyaTulisId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($karyaTulisId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $karyaTulisId)) {
                $karyaTulisId = str_replace('*', '%', $karyaTulisId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::KARYA_TULIS_ID, $karyaTulisId, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KaryaTulisPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the judul column
     *
     * Example usage:
     * <code>
     * $query->filterByJudul('fooValue');   // WHERE judul = 'fooValue'
     * $query->filterByJudul('%fooValue%'); // WHERE judul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByJudul($judul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judul)) {
                $judul = str_replace('*', '%', $judul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::JUDUL, $judul, $comparison);
    }

    /**
     * Filter the query on the tahun_pembuatan column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunPembuatan(1234); // WHERE tahun_pembuatan = 1234
     * $query->filterByTahunPembuatan(array(12, 34)); // WHERE tahun_pembuatan IN (12, 34)
     * $query->filterByTahunPembuatan(array('min' => 12)); // WHERE tahun_pembuatan >= 12
     * $query->filterByTahunPembuatan(array('max' => 12)); // WHERE tahun_pembuatan <= 12
     * </code>
     *
     * @param     mixed $tahunPembuatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByTahunPembuatan($tahunPembuatan = null, $comparison = null)
    {
        if (is_array($tahunPembuatan)) {
            $useMinMax = false;
            if (isset($tahunPembuatan['min'])) {
                $this->addUsingAlias(KaryaTulisPeer::TAHUN_PEMBUATAN, $tahunPembuatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunPembuatan['max'])) {
                $this->addUsingAlias(KaryaTulisPeer::TAHUN_PEMBUATAN, $tahunPembuatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::TAHUN_PEMBUATAN, $tahunPembuatan, $comparison);
    }

    /**
     * Filter the query on the publikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByPublikasi('fooValue');   // WHERE publikasi = 'fooValue'
     * $query->filterByPublikasi('%fooValue%'); // WHERE publikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $publikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByPublikasi($publikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($publikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $publikasi)) {
                $publikasi = str_replace('*', '%', $publikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::PUBLIKASI, $publikasi, $comparison);
    }

    /**
     * Filter the query on the keterangan column
     *
     * Example usage:
     * <code>
     * $query->filterByKeterangan('fooValue');   // WHERE keterangan = 'fooValue'
     * $query->filterByKeterangan('%fooValue%'); // WHERE keterangan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $keterangan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByKeterangan($keterangan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($keterangan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $keterangan)) {
                $keterangan = str_replace('*', '%', $keterangan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the url_publikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByUrlPublikasi('fooValue');   // WHERE url_publikasi = 'fooValue'
     * $query->filterByUrlPublikasi('%fooValue%'); // WHERE url_publikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $urlPublikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByUrlPublikasi($urlPublikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($urlPublikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $urlPublikasi)) {
                $urlPublikasi = str_replace('*', '%', $urlPublikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::URL_PUBLIKASI, $urlPublikasi, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(KaryaTulisPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(KaryaTulisPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(KaryaTulisPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(KaryaTulisPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(KaryaTulisPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(KaryaTulisPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(KaryaTulisPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(KaryaTulisPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(KaryaTulisPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
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

        return $this->addUsingAlias(KaryaTulisPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KaryaTulisQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(KaryaTulisPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(KaryaTulisPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return KaryaTulisQuery The current query, for fluid interface
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
     * Filter the query by a related VldKaryaTulis object
     *
     * @param   VldKaryaTulis|PropelObjectCollection $vldKaryaTulis  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 KaryaTulisQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldKaryaTulis($vldKaryaTulis, $comparison = null)
    {
        if ($vldKaryaTulis instanceof VldKaryaTulis) {
            return $this
                ->addUsingAlias(KaryaTulisPeer::KARYA_TULIS_ID, $vldKaryaTulis->getKaryaTulisId(), $comparison);
        } elseif ($vldKaryaTulis instanceof PropelObjectCollection) {
            return $this
                ->useVldKaryaTulisQuery()
                ->filterByPrimaryKeys($vldKaryaTulis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldKaryaTulis() only accepts arguments of type VldKaryaTulis or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldKaryaTulis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function joinVldKaryaTulis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldKaryaTulis');

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
            $this->addJoinObject($join, 'VldKaryaTulis');
        }

        return $this;
    }

    /**
     * Use the VldKaryaTulis relation VldKaryaTulis object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldKaryaTulisQuery A secondary query class using the current class as primary query
     */
    public function useVldKaryaTulisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldKaryaTulis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldKaryaTulis', '\DataDikdas\Model\VldKaryaTulisQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   KaryaTulis $karyaTulis Object to remove from the list of results
     *
     * @return KaryaTulisQuery The current query, for fluid interface
     */
    public function prune($karyaTulis = null)
    {
        if ($karyaTulis) {
            $this->addUsingAlias(KaryaTulisPeer::KARYA_TULIS_ID, $karyaTulis->getKaryaTulisId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
