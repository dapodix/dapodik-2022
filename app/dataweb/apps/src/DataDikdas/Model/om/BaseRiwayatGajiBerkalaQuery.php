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
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RiwayatGajiBerkalaPeer;
use DataDikdas\Model\RiwayatGajiBerkalaQuery;

/**
 * Base class that represents a query for the 'riwayat_gaji_berkala' table.
 *
 * 
 *
 * @method RiwayatGajiBerkalaQuery orderByRiwayatGajiBerkalaId($order = Criteria::ASC) Order by the riwayat_gaji_berkala_id column
 * @method RiwayatGajiBerkalaQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RiwayatGajiBerkalaQuery orderByPangkatGolonganId($order = Criteria::ASC) Order by the pangkat_golongan_id column
 * @method RiwayatGajiBerkalaQuery orderByNomorSk($order = Criteria::ASC) Order by the nomor_sk column
 * @method RiwayatGajiBerkalaQuery orderByTanggalSk($order = Criteria::ASC) Order by the tanggal_sk column
 * @method RiwayatGajiBerkalaQuery orderByTmtKgb($order = Criteria::ASC) Order by the tmt_kgb column
 * @method RiwayatGajiBerkalaQuery orderByMasaKerjaTahun($order = Criteria::ASC) Order by the masa_kerja_tahun column
 * @method RiwayatGajiBerkalaQuery orderByMasaKerjaBulan($order = Criteria::ASC) Order by the masa_kerja_bulan column
 * @method RiwayatGajiBerkalaQuery orderByGajiPokok($order = Criteria::ASC) Order by the gaji_pokok column
 * @method RiwayatGajiBerkalaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RiwayatGajiBerkalaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RiwayatGajiBerkalaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RiwayatGajiBerkalaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RiwayatGajiBerkalaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RiwayatGajiBerkalaQuery groupByRiwayatGajiBerkalaId() Group by the riwayat_gaji_berkala_id column
 * @method RiwayatGajiBerkalaQuery groupByPtkId() Group by the ptk_id column
 * @method RiwayatGajiBerkalaQuery groupByPangkatGolonganId() Group by the pangkat_golongan_id column
 * @method RiwayatGajiBerkalaQuery groupByNomorSk() Group by the nomor_sk column
 * @method RiwayatGajiBerkalaQuery groupByTanggalSk() Group by the tanggal_sk column
 * @method RiwayatGajiBerkalaQuery groupByTmtKgb() Group by the tmt_kgb column
 * @method RiwayatGajiBerkalaQuery groupByMasaKerjaTahun() Group by the masa_kerja_tahun column
 * @method RiwayatGajiBerkalaQuery groupByMasaKerjaBulan() Group by the masa_kerja_bulan column
 * @method RiwayatGajiBerkalaQuery groupByGajiPokok() Group by the gaji_pokok column
 * @method RiwayatGajiBerkalaQuery groupByCreateDate() Group by the create_date column
 * @method RiwayatGajiBerkalaQuery groupByLastUpdate() Group by the last_update column
 * @method RiwayatGajiBerkalaQuery groupBySoftDelete() Group by the soft_delete column
 * @method RiwayatGajiBerkalaQuery groupByLastSync() Group by the last_sync column
 * @method RiwayatGajiBerkalaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RiwayatGajiBerkalaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RiwayatGajiBerkalaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RiwayatGajiBerkalaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RiwayatGajiBerkalaQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RiwayatGajiBerkalaQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RiwayatGajiBerkalaQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RiwayatGajiBerkalaQuery leftJoinPangkatGolongan($relationAlias = null) Adds a LEFT JOIN clause to the query using the PangkatGolongan relation
 * @method RiwayatGajiBerkalaQuery rightJoinPangkatGolongan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PangkatGolongan relation
 * @method RiwayatGajiBerkalaQuery innerJoinPangkatGolongan($relationAlias = null) Adds a INNER JOIN clause to the query using the PangkatGolongan relation
 *
 * @method RiwayatGajiBerkala findOne(PropelPDO $con = null) Return the first RiwayatGajiBerkala matching the query
 * @method RiwayatGajiBerkala findOneOrCreate(PropelPDO $con = null) Return the first RiwayatGajiBerkala matching the query, or a new RiwayatGajiBerkala object populated from the query conditions when no match is found
 *
 * @method RiwayatGajiBerkala findOneByPtkId(string $ptk_id) Return the first RiwayatGajiBerkala filtered by the ptk_id column
 * @method RiwayatGajiBerkala findOneByPangkatGolonganId(string $pangkat_golongan_id) Return the first RiwayatGajiBerkala filtered by the pangkat_golongan_id column
 * @method RiwayatGajiBerkala findOneByNomorSk(string $nomor_sk) Return the first RiwayatGajiBerkala filtered by the nomor_sk column
 * @method RiwayatGajiBerkala findOneByTanggalSk(string $tanggal_sk) Return the first RiwayatGajiBerkala filtered by the tanggal_sk column
 * @method RiwayatGajiBerkala findOneByTmtKgb(string $tmt_kgb) Return the first RiwayatGajiBerkala filtered by the tmt_kgb column
 * @method RiwayatGajiBerkala findOneByMasaKerjaTahun(string $masa_kerja_tahun) Return the first RiwayatGajiBerkala filtered by the masa_kerja_tahun column
 * @method RiwayatGajiBerkala findOneByMasaKerjaBulan(string $masa_kerja_bulan) Return the first RiwayatGajiBerkala filtered by the masa_kerja_bulan column
 * @method RiwayatGajiBerkala findOneByGajiPokok(string $gaji_pokok) Return the first RiwayatGajiBerkala filtered by the gaji_pokok column
 * @method RiwayatGajiBerkala findOneByCreateDate(string $create_date) Return the first RiwayatGajiBerkala filtered by the create_date column
 * @method RiwayatGajiBerkala findOneByLastUpdate(string $last_update) Return the first RiwayatGajiBerkala filtered by the last_update column
 * @method RiwayatGajiBerkala findOneBySoftDelete(string $soft_delete) Return the first RiwayatGajiBerkala filtered by the soft_delete column
 * @method RiwayatGajiBerkala findOneByLastSync(string $last_sync) Return the first RiwayatGajiBerkala filtered by the last_sync column
 * @method RiwayatGajiBerkala findOneByUpdaterId(string $updater_id) Return the first RiwayatGajiBerkala filtered by the updater_id column
 *
 * @method array findByRiwayatGajiBerkalaId(string $riwayat_gaji_berkala_id) Return RiwayatGajiBerkala objects filtered by the riwayat_gaji_berkala_id column
 * @method array findByPtkId(string $ptk_id) Return RiwayatGajiBerkala objects filtered by the ptk_id column
 * @method array findByPangkatGolonganId(string $pangkat_golongan_id) Return RiwayatGajiBerkala objects filtered by the pangkat_golongan_id column
 * @method array findByNomorSk(string $nomor_sk) Return RiwayatGajiBerkala objects filtered by the nomor_sk column
 * @method array findByTanggalSk(string $tanggal_sk) Return RiwayatGajiBerkala objects filtered by the tanggal_sk column
 * @method array findByTmtKgb(string $tmt_kgb) Return RiwayatGajiBerkala objects filtered by the tmt_kgb column
 * @method array findByMasaKerjaTahun(string $masa_kerja_tahun) Return RiwayatGajiBerkala objects filtered by the masa_kerja_tahun column
 * @method array findByMasaKerjaBulan(string $masa_kerja_bulan) Return RiwayatGajiBerkala objects filtered by the masa_kerja_bulan column
 * @method array findByGajiPokok(string $gaji_pokok) Return RiwayatGajiBerkala objects filtered by the gaji_pokok column
 * @method array findByCreateDate(string $create_date) Return RiwayatGajiBerkala objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RiwayatGajiBerkala objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RiwayatGajiBerkala objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RiwayatGajiBerkala objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RiwayatGajiBerkala objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRiwayatGajiBerkalaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRiwayatGajiBerkalaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RiwayatGajiBerkala', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RiwayatGajiBerkalaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RiwayatGajiBerkalaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RiwayatGajiBerkalaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RiwayatGajiBerkalaQuery) {
            return $criteria;
        }
        $query = new RiwayatGajiBerkalaQuery();
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
     * @return   RiwayatGajiBerkala|RiwayatGajiBerkala[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RiwayatGajiBerkalaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RiwayatGajiBerkalaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RiwayatGajiBerkala A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRiwayatGajiBerkalaId($key, $con = null)
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
     * @return                 RiwayatGajiBerkala A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "riwayat_gaji_berkala_id", "ptk_id", "pangkat_golongan_id", "nomor_sk", "tanggal_sk", "tmt_kgb", "masa_kerja_tahun", "masa_kerja_bulan", "gaji_pokok", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "riwayat_gaji_berkala" WHERE "riwayat_gaji_berkala_id" = :p0';
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
            $obj = new RiwayatGajiBerkala();
            $obj->hydrate($row);
            RiwayatGajiBerkalaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RiwayatGajiBerkala|RiwayatGajiBerkala[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RiwayatGajiBerkala[]|mixed the list of results, formatted by the current formatter
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the riwayat_gaji_berkala_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatGajiBerkalaId('fooValue');   // WHERE riwayat_gaji_berkala_id = 'fooValue'
     * $query->filterByRiwayatGajiBerkalaId('%fooValue%'); // WHERE riwayat_gaji_berkala_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatGajiBerkalaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByRiwayatGajiBerkalaId($riwayatGajiBerkalaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatGajiBerkalaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatGajiBerkalaId)) {
                $riwayatGajiBerkalaId = str_replace('*', '%', $riwayatGajiBerkalaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $riwayatGajiBerkalaId, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the pangkat_golongan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPangkatGolonganId(1234); // WHERE pangkat_golongan_id = 1234
     * $query->filterByPangkatGolonganId(array(12, 34)); // WHERE pangkat_golongan_id IN (12, 34)
     * $query->filterByPangkatGolonganId(array('min' => 12)); // WHERE pangkat_golongan_id >= 12
     * $query->filterByPangkatGolonganId(array('max' => 12)); // WHERE pangkat_golongan_id <= 12
     * </code>
     *
     * @see       filterByPangkatGolongan()
     *
     * @param     mixed $pangkatGolonganId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByPangkatGolonganId($pangkatGolonganId = null, $comparison = null)
    {
        if (is_array($pangkatGolonganId)) {
            $useMinMax = false;
            if (isset($pangkatGolonganId['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pangkatGolonganId['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId, $comparison);
    }

    /**
     * Filter the query on the nomor_sk column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorSk('fooValue');   // WHERE nomor_sk = 'fooValue'
     * $query->filterByNomorSk('%fooValue%'); // WHERE nomor_sk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorSk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByNomorSk($nomorSk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorSk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorSk)) {
                $nomorSk = str_replace('*', '%', $nomorSk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::NOMOR_SK, $nomorSk, $comparison);
    }

    /**
     * Filter the query on the tanggal_sk column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSk('2011-03-14'); // WHERE tanggal_sk = '2011-03-14'
     * $query->filterByTanggalSk('now'); // WHERE tanggal_sk = '2011-03-14'
     * $query->filterByTanggalSk(array('max' => 'yesterday')); // WHERE tanggal_sk > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSk The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByTanggalSk($tanggalSk = null, $comparison = null)
    {
        if (is_array($tanggalSk)) {
            $useMinMax = false;
            if (isset($tanggalSk['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::TANGGAL_SK, $tanggalSk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSk['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::TANGGAL_SK, $tanggalSk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::TANGGAL_SK, $tanggalSk, $comparison);
    }

    /**
     * Filter the query on the tmt_kgb column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtKgb('2011-03-14'); // WHERE tmt_kgb = '2011-03-14'
     * $query->filterByTmtKgb('now'); // WHERE tmt_kgb = '2011-03-14'
     * $query->filterByTmtKgb(array('max' => 'yesterday')); // WHERE tmt_kgb > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtKgb The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByTmtKgb($tmtKgb = null, $comparison = null)
    {
        if (is_array($tmtKgb)) {
            $useMinMax = false;
            if (isset($tmtKgb['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::TMT_KGB, $tmtKgb['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtKgb['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::TMT_KGB, $tmtKgb['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::TMT_KGB, $tmtKgb, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaTahun(1234); // WHERE masa_kerja_tahun = 1234
     * $query->filterByMasaKerjaTahun(array(12, 34)); // WHERE masa_kerja_tahun IN (12, 34)
     * $query->filterByMasaKerjaTahun(array('min' => 12)); // WHERE masa_kerja_tahun >= 12
     * $query->filterByMasaKerjaTahun(array('max' => 12)); // WHERE masa_kerja_tahun <= 12
     * </code>
     *
     * @param     mixed $masaKerjaTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaTahun($masaKerjaTahun = null, $comparison = null)
    {
        if (is_array($masaKerjaTahun)) {
            $useMinMax = false;
            if (isset($masaKerjaTahun['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN, $masaKerjaTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaTahun['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN, $masaKerjaTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_TAHUN, $masaKerjaTahun, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_bulan column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaBulan(1234); // WHERE masa_kerja_bulan = 1234
     * $query->filterByMasaKerjaBulan(array(12, 34)); // WHERE masa_kerja_bulan IN (12, 34)
     * $query->filterByMasaKerjaBulan(array('min' => 12)); // WHERE masa_kerja_bulan >= 12
     * $query->filterByMasaKerjaBulan(array('max' => 12)); // WHERE masa_kerja_bulan <= 12
     * </code>
     *
     * @param     mixed $masaKerjaBulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaBulan($masaKerjaBulan = null, $comparison = null)
    {
        if (is_array($masaKerjaBulan)) {
            $useMinMax = false;
            if (isset($masaKerjaBulan['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN, $masaKerjaBulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaBulan['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN, $masaKerjaBulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::MASA_KERJA_BULAN, $masaKerjaBulan, $comparison);
    }

    /**
     * Filter the query on the gaji_pokok column
     *
     * Example usage:
     * <code>
     * $query->filterByGajiPokok(1234); // WHERE gaji_pokok = 1234
     * $query->filterByGajiPokok(array(12, 34)); // WHERE gaji_pokok IN (12, 34)
     * $query->filterByGajiPokok(array('min' => 12)); // WHERE gaji_pokok >= 12
     * $query->filterByGajiPokok(array('max' => 12)); // WHERE gaji_pokok <= 12
     * </code>
     *
     * @param     mixed $gajiPokok The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByGajiPokok($gajiPokok = null, $comparison = null)
    {
        if (is_array($gajiPokok)) {
            $useMinMax = false;
            if (isset($gajiPokok['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::GAJI_POKOK, $gajiPokok['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($gajiPokok['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::GAJI_POKOK, $gajiPokok['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::GAJI_POKOK, $gajiPokok, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RiwayatGajiBerkalaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RiwayatGajiBerkalaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RiwayatGajiBerkalaPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RiwayatGajiBerkalaPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
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
     * Filter the query by a related PangkatGolongan object
     *
     * @param   PangkatGolongan|PropelObjectCollection $pangkatGolongan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RiwayatGajiBerkalaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPangkatGolongan($pangkatGolongan, $comparison = null)
    {
        if ($pangkatGolongan instanceof PangkatGolongan) {
            return $this
                ->addUsingAlias(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->getPangkatGolonganId(), $comparison);
        } elseif ($pangkatGolongan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RiwayatGajiBerkalaPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->toKeyValue('PrimaryKey', 'PangkatGolonganId'), $comparison);
        } else {
            throw new PropelException('filterByPangkatGolongan() only accepts arguments of type PangkatGolongan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PangkatGolongan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function joinPangkatGolongan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PangkatGolongan');

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
            $this->addJoinObject($join, 'PangkatGolongan');
        }

        return $this;
    }

    /**
     * Use the PangkatGolongan relation PangkatGolongan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PangkatGolonganQuery A secondary query class using the current class as primary query
     */
    public function usePangkatGolonganQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPangkatGolongan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PangkatGolongan', '\DataDikdas\Model\PangkatGolonganQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RiwayatGajiBerkala $riwayatGajiBerkala Object to remove from the list of results
     *
     * @return RiwayatGajiBerkalaQuery The current query, for fluid interface
     */
    public function prune($riwayatGajiBerkala = null)
    {
        if ($riwayatGajiBerkala) {
            $this->addUsingAlias(RiwayatGajiBerkalaPeer::RIWAYAT_GAJI_BERKALA_ID, $riwayatGajiBerkala->getRiwayatGajiBerkalaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
