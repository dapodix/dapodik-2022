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
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanPeer;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\KelompokBidang;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\PemakaiPrasarana;
use DataDikdas\Model\PemakaiSarana;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\TemplateUn;

/**
 * Base class that represents a query for the 'ref.jurusan' table.
 *
 * 
 *
 * @method JurusanQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method JurusanQuery orderByNamaJurusan($order = Criteria::ASC) Order by the nama_jurusan column
 * @method JurusanQuery orderByUntukSma($order = Criteria::ASC) Order by the untuk_sma column
 * @method JurusanQuery orderByUntukSmk($order = Criteria::ASC) Order by the untuk_smk column
 * @method JurusanQuery orderByUntukPt($order = Criteria::ASC) Order by the untuk_pt column
 * @method JurusanQuery orderByUntukSlb($order = Criteria::ASC) Order by the untuk_slb column
 * @method JurusanQuery orderByUntukSmklb($order = Criteria::ASC) Order by the untuk_smklb column
 * @method JurusanQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method JurusanQuery orderByJurusanInduk($order = Criteria::ASC) Order by the jurusan_induk column
 * @method JurusanQuery orderByLevelBidangId($order = Criteria::ASC) Order by the level_bidang_id column
 * @method JurusanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JurusanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JurusanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JurusanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JurusanQuery groupByJurusanId() Group by the jurusan_id column
 * @method JurusanQuery groupByNamaJurusan() Group by the nama_jurusan column
 * @method JurusanQuery groupByUntukSma() Group by the untuk_sma column
 * @method JurusanQuery groupByUntukSmk() Group by the untuk_smk column
 * @method JurusanQuery groupByUntukPt() Group by the untuk_pt column
 * @method JurusanQuery groupByUntukSlb() Group by the untuk_slb column
 * @method JurusanQuery groupByUntukSmklb() Group by the untuk_smklb column
 * @method JurusanQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method JurusanQuery groupByJurusanInduk() Group by the jurusan_induk column
 * @method JurusanQuery groupByLevelBidangId() Group by the level_bidang_id column
 * @method JurusanQuery groupByCreateDate() Group by the create_date column
 * @method JurusanQuery groupByLastUpdate() Group by the last_update column
 * @method JurusanQuery groupByExpiredDate() Group by the expired_date column
 * @method JurusanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JurusanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JurusanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JurusanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JurusanQuery leftJoinJurusanRelatedByJurusanInduk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanRelatedByJurusanInduk relation
 * @method JurusanQuery rightJoinJurusanRelatedByJurusanInduk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanRelatedByJurusanInduk relation
 * @method JurusanQuery innerJoinJurusanRelatedByJurusanInduk($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanRelatedByJurusanInduk relation
 *
 * @method JurusanQuery leftJoinKelompokBidang($relationAlias = null) Adds a LEFT JOIN clause to the query using the KelompokBidang relation
 * @method JurusanQuery rightJoinKelompokBidang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KelompokBidang relation
 * @method JurusanQuery innerJoinKelompokBidang($relationAlias = null) Adds a INNER JOIN clause to the query using the KelompokBidang relation
 *
 * @method JurusanQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method JurusanQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method JurusanQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method JurusanQuery leftJoinJurusanRelatedByJurusanId($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanRelatedByJurusanId relation
 * @method JurusanQuery rightJoinJurusanRelatedByJurusanId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanRelatedByJurusanId relation
 * @method JurusanQuery innerJoinJurusanRelatedByJurusanId($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanRelatedByJurusanId relation
 *
 * @method JurusanQuery leftJoinJurusanSp($relationAlias = null) Adds a LEFT JOIN clause to the query using the JurusanSp relation
 * @method JurusanQuery rightJoinJurusanSp($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JurusanSp relation
 * @method JurusanQuery innerJoinJurusanSp($relationAlias = null) Adds a INNER JOIN clause to the query using the JurusanSp relation
 *
 * @method JurusanQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method JurusanQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method JurusanQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method JurusanQuery leftJoinMataPelajaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaran relation
 * @method JurusanQuery rightJoinMataPelajaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaran relation
 * @method JurusanQuery innerJoinMataPelajaran($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaran relation
 *
 * @method JurusanQuery leftJoinPemakaiPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the PemakaiPrasarana relation
 * @method JurusanQuery rightJoinPemakaiPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PemakaiPrasarana relation
 * @method JurusanQuery innerJoinPemakaiPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the PemakaiPrasarana relation
 *
 * @method JurusanQuery leftJoinPemakaiSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the PemakaiSarana relation
 * @method JurusanQuery rightJoinPemakaiSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PemakaiSarana relation
 * @method JurusanQuery innerJoinPemakaiSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the PemakaiSarana relation
 *
 * @method JurusanQuery leftJoinStandarSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the StandarSarana relation
 * @method JurusanQuery rightJoinStandarSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StandarSarana relation
 * @method JurusanQuery innerJoinStandarSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the StandarSarana relation
 *
 * @method JurusanQuery leftJoinTemplateUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUn relation
 * @method JurusanQuery rightJoinTemplateUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUn relation
 * @method JurusanQuery innerJoinTemplateUn($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUn relation
 *
 * @method Jurusan findOne(PropelPDO $con = null) Return the first Jurusan matching the query
 * @method Jurusan findOneOrCreate(PropelPDO $con = null) Return the first Jurusan matching the query, or a new Jurusan object populated from the query conditions when no match is found
 *
 * @method Jurusan findOneByNamaJurusan(string $nama_jurusan) Return the first Jurusan filtered by the nama_jurusan column
 * @method Jurusan findOneByUntukSma(string $untuk_sma) Return the first Jurusan filtered by the untuk_sma column
 * @method Jurusan findOneByUntukSmk(string $untuk_smk) Return the first Jurusan filtered by the untuk_smk column
 * @method Jurusan findOneByUntukPt(string $untuk_pt) Return the first Jurusan filtered by the untuk_pt column
 * @method Jurusan findOneByUntukSlb(string $untuk_slb) Return the first Jurusan filtered by the untuk_slb column
 * @method Jurusan findOneByUntukSmklb(string $untuk_smklb) Return the first Jurusan filtered by the untuk_smklb column
 * @method Jurusan findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first Jurusan filtered by the jenjang_pendidikan_id column
 * @method Jurusan findOneByJurusanInduk(string $jurusan_induk) Return the first Jurusan filtered by the jurusan_induk column
 * @method Jurusan findOneByLevelBidangId(string $level_bidang_id) Return the first Jurusan filtered by the level_bidang_id column
 * @method Jurusan findOneByCreateDate(string $create_date) Return the first Jurusan filtered by the create_date column
 * @method Jurusan findOneByLastUpdate(string $last_update) Return the first Jurusan filtered by the last_update column
 * @method Jurusan findOneByExpiredDate(string $expired_date) Return the first Jurusan filtered by the expired_date column
 * @method Jurusan findOneByLastSync(string $last_sync) Return the first Jurusan filtered by the last_sync column
 *
 * @method array findByJurusanId(string $jurusan_id) Return Jurusan objects filtered by the jurusan_id column
 * @method array findByNamaJurusan(string $nama_jurusan) Return Jurusan objects filtered by the nama_jurusan column
 * @method array findByUntukSma(string $untuk_sma) Return Jurusan objects filtered by the untuk_sma column
 * @method array findByUntukSmk(string $untuk_smk) Return Jurusan objects filtered by the untuk_smk column
 * @method array findByUntukPt(string $untuk_pt) Return Jurusan objects filtered by the untuk_pt column
 * @method array findByUntukSlb(string $untuk_slb) Return Jurusan objects filtered by the untuk_slb column
 * @method array findByUntukSmklb(string $untuk_smklb) Return Jurusan objects filtered by the untuk_smklb column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return Jurusan objects filtered by the jenjang_pendidikan_id column
 * @method array findByJurusanInduk(string $jurusan_induk) Return Jurusan objects filtered by the jurusan_induk column
 * @method array findByLevelBidangId(string $level_bidang_id) Return Jurusan objects filtered by the level_bidang_id column
 * @method array findByCreateDate(string $create_date) Return Jurusan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Jurusan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Jurusan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Jurusan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJurusanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJurusanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Jurusan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JurusanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JurusanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JurusanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JurusanQuery) {
            return $criteria;
        }
        $query = new JurusanQuery();
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
     * @return   Jurusan|Jurusan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JurusanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JurusanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Jurusan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJurusanId($key, $con = null)
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
     * @return                 Jurusan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jurusan_id", "nama_jurusan", "untuk_sma", "untuk_smk", "untuk_pt", "untuk_slb", "untuk_smklb", "jenjang_pendidikan_id", "jurusan_induk", "level_bidang_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jurusan" WHERE "jurusan_id" = :p0';
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
            $obj = new Jurusan();
            $obj->hydrate($row);
            JurusanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Jurusan|Jurusan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Jurusan[]|mixed the list of results, formatted by the current formatter
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
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JurusanPeer::JURUSAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JurusanPeer::JURUSAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanPeer::JURUSAN_ID, $jurusanId, $comparison);
    }

    /**
     * Filter the query on the nama_jurusan column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaJurusan('fooValue');   // WHERE nama_jurusan = 'fooValue'
     * $query->filterByNamaJurusan('%fooValue%'); // WHERE nama_jurusan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaJurusan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByNamaJurusan($namaJurusan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaJurusan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaJurusan)) {
                $namaJurusan = str_replace('*', '%', $namaJurusan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanPeer::NAMA_JURUSAN, $namaJurusan, $comparison);
    }

    /**
     * Filter the query on the untuk_sma column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSma(1234); // WHERE untuk_sma = 1234
     * $query->filterByUntukSma(array(12, 34)); // WHERE untuk_sma IN (12, 34)
     * $query->filterByUntukSma(array('min' => 12)); // WHERE untuk_sma >= 12
     * $query->filterByUntukSma(array('max' => 12)); // WHERE untuk_sma <= 12
     * </code>
     *
     * @param     mixed $untukSma The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByUntukSma($untukSma = null, $comparison = null)
    {
        if (is_array($untukSma)) {
            $useMinMax = false;
            if (isset($untukSma['min'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMA, $untukSma['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSma['max'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMA, $untukSma['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::UNTUK_SMA, $untukSma, $comparison);
    }

    /**
     * Filter the query on the untuk_smk column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSmk(1234); // WHERE untuk_smk = 1234
     * $query->filterByUntukSmk(array(12, 34)); // WHERE untuk_smk IN (12, 34)
     * $query->filterByUntukSmk(array('min' => 12)); // WHERE untuk_smk >= 12
     * $query->filterByUntukSmk(array('max' => 12)); // WHERE untuk_smk <= 12
     * </code>
     *
     * @param     mixed $untukSmk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByUntukSmk($untukSmk = null, $comparison = null)
    {
        if (is_array($untukSmk)) {
            $useMinMax = false;
            if (isset($untukSmk['min'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMK, $untukSmk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSmk['max'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMK, $untukSmk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::UNTUK_SMK, $untukSmk, $comparison);
    }

    /**
     * Filter the query on the untuk_pt column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukPt(1234); // WHERE untuk_pt = 1234
     * $query->filterByUntukPt(array(12, 34)); // WHERE untuk_pt IN (12, 34)
     * $query->filterByUntukPt(array('min' => 12)); // WHERE untuk_pt >= 12
     * $query->filterByUntukPt(array('max' => 12)); // WHERE untuk_pt <= 12
     * </code>
     *
     * @param     mixed $untukPt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByUntukPt($untukPt = null, $comparison = null)
    {
        if (is_array($untukPt)) {
            $useMinMax = false;
            if (isset($untukPt['min'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_PT, $untukPt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukPt['max'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_PT, $untukPt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::UNTUK_PT, $untukPt, $comparison);
    }

    /**
     * Filter the query on the untuk_slb column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSlb(1234); // WHERE untuk_slb = 1234
     * $query->filterByUntukSlb(array(12, 34)); // WHERE untuk_slb IN (12, 34)
     * $query->filterByUntukSlb(array('min' => 12)); // WHERE untuk_slb >= 12
     * $query->filterByUntukSlb(array('max' => 12)); // WHERE untuk_slb <= 12
     * </code>
     *
     * @param     mixed $untukSlb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByUntukSlb($untukSlb = null, $comparison = null)
    {
        if (is_array($untukSlb)) {
            $useMinMax = false;
            if (isset($untukSlb['min'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SLB, $untukSlb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSlb['max'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SLB, $untukSlb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::UNTUK_SLB, $untukSlb, $comparison);
    }

    /**
     * Filter the query on the untuk_smklb column
     *
     * Example usage:
     * <code>
     * $query->filterByUntukSmklb(1234); // WHERE untuk_smklb = 1234
     * $query->filterByUntukSmklb(array(12, 34)); // WHERE untuk_smklb IN (12, 34)
     * $query->filterByUntukSmklb(array('min' => 12)); // WHERE untuk_smklb >= 12
     * $query->filterByUntukSmklb(array('max' => 12)); // WHERE untuk_smklb <= 12
     * </code>
     *
     * @param     mixed $untukSmklb The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByUntukSmklb($untukSmklb = null, $comparison = null)
    {
        if (is_array($untukSmklb)) {
            $useMinMax = false;
            if (isset($untukSmklb['min'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMKLB, $untukSmklb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($untukSmklb['max'])) {
                $this->addUsingAlias(JurusanPeer::UNTUK_SMKLB, $untukSmklb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::UNTUK_SMKLB, $untukSmklb, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanId(1234); // WHERE jenjang_pendidikan_id = 1234
     * $query->filterByJenjangPendidikanId(array(12, 34)); // WHERE jenjang_pendidikan_id IN (12, 34)
     * $query->filterByJenjangPendidikanId(array('min' => 12)); // WHERE jenjang_pendidikan_id >= 12
     * $query->filterByJenjangPendidikanId(array('max' => 12)); // WHERE jenjang_pendidikan_id <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikan()
     *
     * @param     mixed $jenjangPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(JurusanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(JurusanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
    }

    /**
     * Filter the query on the jurusan_induk column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanInduk('fooValue');   // WHERE jurusan_induk = 'fooValue'
     * $query->filterByJurusanInduk('%fooValue%'); // WHERE jurusan_induk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanInduk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByJurusanInduk($jurusanInduk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanInduk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanInduk)) {
                $jurusanInduk = str_replace('*', '%', $jurusanInduk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanPeer::JURUSAN_INDUK, $jurusanInduk, $comparison);
    }

    /**
     * Filter the query on the level_bidang_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelBidangId('fooValue');   // WHERE level_bidang_id = 'fooValue'
     * $query->filterByLevelBidangId('%fooValue%'); // WHERE level_bidang_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $levelBidangId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByLevelBidangId($levelBidangId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($levelBidangId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $levelBidangId)) {
                $levelBidangId = str_replace('*', '%', $levelBidangId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JurusanPeer::LEVEL_BIDANG_ID, $levelBidangId, $comparison);
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
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JurusanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JurusanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JurusanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JurusanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the expired_date column
     *
     * Example usage:
     * <code>
     * $query->filterByExpiredDate('2011-03-14'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate('now'); // WHERE expired_date = '2011-03-14'
     * $query->filterByExpiredDate(array('max' => 'yesterday')); // WHERE expired_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $expiredDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JurusanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JurusanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JurusanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JurusanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JurusanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JurusanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanRelatedByJurusanInduk($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_INDUK, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_INDUK, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
        } else {
            throw new PropelException('filterByJurusanRelatedByJurusanInduk() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanRelatedByJurusanInduk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinJurusanRelatedByJurusanInduk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanRelatedByJurusanInduk');

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
            $this->addJoinObject($join, 'JurusanRelatedByJurusanInduk');
        }

        return $this;
    }

    /**
     * Use the JurusanRelatedByJurusanInduk relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanRelatedByJurusanIndukQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusanRelatedByJurusanInduk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanRelatedByJurusanInduk', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related KelompokBidang object
     *
     * @param   KelompokBidang|PropelObjectCollection $kelompokBidang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKelompokBidang($kelompokBidang, $comparison = null)
    {
        if ($kelompokBidang instanceof KelompokBidang) {
            return $this
                ->addUsingAlias(JurusanPeer::LEVEL_BIDANG_ID, $kelompokBidang->getLevelBidangId(), $comparison);
        } elseif ($kelompokBidang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanPeer::LEVEL_BIDANG_ID, $kelompokBidang->toKeyValue('PrimaryKey', 'LevelBidangId'), $comparison);
        } else {
            throw new PropelException('filterByKelompokBidang() only accepts arguments of type KelompokBidang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KelompokBidang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinKelompokBidang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KelompokBidang');

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
            $this->addJoinObject($join, 'KelompokBidang');
        }

        return $this;
    }

    /**
     * Use the KelompokBidang relation KelompokBidang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KelompokBidangQuery A secondary query class using the current class as primary query
     */
    public function useKelompokBidangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKelompokBidang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KelompokBidang', '\DataDikdas\Model\KelompokBidangQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(JurusanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(JurusanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikan() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikan');

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
            $this->addJoinObject($join, 'JenjangPendidikan');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikan relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanRelatedByJurusanId($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $jurusan->getJurusanInduk(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            return $this
                ->useJurusanRelatedByJurusanIdQuery()
                ->filterByPrimaryKeys($jurusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanRelatedByJurusanId() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanRelatedByJurusanId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinJurusanRelatedByJurusanId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanRelatedByJurusanId');

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
            $this->addJoinObject($join, 'JurusanRelatedByJurusanId');
        }

        return $this;
    }

    /**
     * Use the JurusanRelatedByJurusanId relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanRelatedByJurusanIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusanRelatedByJurusanId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanRelatedByJurusanId', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related JurusanSp object
     *
     * @param   JurusanSp|PropelObjectCollection $jurusanSp  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusanSp($jurusanSp, $comparison = null)
    {
        if ($jurusanSp instanceof JurusanSp) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $jurusanSp->getJurusanId(), $comparison);
        } elseif ($jurusanSp instanceof PropelObjectCollection) {
            return $this
                ->useJurusanSpQuery()
                ->filterByPrimaryKeys($jurusanSp->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusanSp() only accepts arguments of type JurusanSp or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JurusanSp relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinJurusanSp($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JurusanSp');

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
            $this->addJoinObject($join, 'JurusanSp');
        }

        return $this;
    }

    /**
     * Use the JurusanSp relation JurusanSp object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanSpQuery A secondary query class using the current class as primary query
     */
    public function useJurusanSpQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJurusanSp($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JurusanSp', '\DataDikdas\Model\JurusanSpQuery');
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $kurikulum->getJurusanId(), $comparison);
        } elseif ($kurikulum instanceof PropelObjectCollection) {
            return $this
                ->useKurikulumQuery()
                ->filterByPrimaryKeys($kurikulum->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKurikulum() only accepts arguments of type Kurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinKurikulum($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kurikulum');

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
            $this->addJoinObject($join, 'Kurikulum');
        }

        return $this;
    }

    /**
     * Use the Kurikulum relation Kurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KurikulumQuery A secondary query class using the current class as primary query
     */
    public function useKurikulumQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kurikulum', '\DataDikdas\Model\KurikulumQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaran($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $mataPelajaran->getJurusanId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            return $this
                ->useMataPelajaranQuery()
                ->filterByPrimaryKeys($mataPelajaran->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMataPelajaran() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinMataPelajaran($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaran');

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
            $this->addJoinObject($join, 'MataPelajaran');
        }

        return $this;
    }

    /**
     * Use the MataPelajaran relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaran', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related PemakaiPrasarana object
     *
     * @param   PemakaiPrasarana|PropelObjectCollection $pemakaiPrasarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPemakaiPrasarana($pemakaiPrasarana, $comparison = null)
    {
        if ($pemakaiPrasarana instanceof PemakaiPrasarana) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $pemakaiPrasarana->getJurusanId(), $comparison);
        } elseif ($pemakaiPrasarana instanceof PropelObjectCollection) {
            return $this
                ->usePemakaiPrasaranaQuery()
                ->filterByPrimaryKeys($pemakaiPrasarana->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPemakaiPrasarana() only accepts arguments of type PemakaiPrasarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PemakaiPrasarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinPemakaiPrasarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PemakaiPrasarana');

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
            $this->addJoinObject($join, 'PemakaiPrasarana');
        }

        return $this;
    }

    /**
     * Use the PemakaiPrasarana relation PemakaiPrasarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PemakaiPrasaranaQuery A secondary query class using the current class as primary query
     */
    public function usePemakaiPrasaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPemakaiPrasarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PemakaiPrasarana', '\DataDikdas\Model\PemakaiPrasaranaQuery');
    }

    /**
     * Filter the query by a related PemakaiSarana object
     *
     * @param   PemakaiSarana|PropelObjectCollection $pemakaiSarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPemakaiSarana($pemakaiSarana, $comparison = null)
    {
        if ($pemakaiSarana instanceof PemakaiSarana) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $pemakaiSarana->getJurusanId(), $comparison);
        } elseif ($pemakaiSarana instanceof PropelObjectCollection) {
            return $this
                ->usePemakaiSaranaQuery()
                ->filterByPrimaryKeys($pemakaiSarana->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPemakaiSarana() only accepts arguments of type PemakaiSarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PemakaiSarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinPemakaiSarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PemakaiSarana');

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
            $this->addJoinObject($join, 'PemakaiSarana');
        }

        return $this;
    }

    /**
     * Use the PemakaiSarana relation PemakaiSarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PemakaiSaranaQuery A secondary query class using the current class as primary query
     */
    public function usePemakaiSaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPemakaiSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PemakaiSarana', '\DataDikdas\Model\PemakaiSaranaQuery');
    }

    /**
     * Filter the query by a related StandarSarana object
     *
     * @param   StandarSarana|PropelObjectCollection $standarSarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStandarSarana($standarSarana, $comparison = null)
    {
        if ($standarSarana instanceof StandarSarana) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $standarSarana->getJurusanId(), $comparison);
        } elseif ($standarSarana instanceof PropelObjectCollection) {
            return $this
                ->useStandarSaranaQuery()
                ->filterByPrimaryKeys($standarSarana->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByStandarSarana() only accepts arguments of type StandarSarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StandarSarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinStandarSarana($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StandarSarana');

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
            $this->addJoinObject($join, 'StandarSarana');
        }

        return $this;
    }

    /**
     * Use the StandarSarana relation StandarSarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StandarSaranaQuery A secondary query class using the current class as primary query
     */
    public function useStandarSaranaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinStandarSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StandarSarana', '\DataDikdas\Model\StandarSaranaQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JurusanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUn($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(JurusanPeer::JURUSAN_ID, $templateUn->getJurusanId(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            return $this
                ->useTemplateUnQuery()
                ->filterByPrimaryKeys($templateUn->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateUn() only accepts arguments of type TemplateUn or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateUn relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function joinTemplateUn($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateUn');

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
            $this->addJoinObject($join, 'TemplateUn');
        }

        return $this;
    }

    /**
     * Use the TemplateUn relation TemplateUn object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateUnQuery A secondary query class using the current class as primary query
     */
    public function useTemplateUnQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTemplateUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUn', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Jurusan $jurusan Object to remove from the list of results
     *
     * @return JurusanQuery The current query, for fluid interface
     */
    public function prune($jurusan = null)
    {
        if ($jurusan) {
            $this->addUsingAlias(JurusanPeer::JURUSAN_ID, $jurusan->getJurusanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
