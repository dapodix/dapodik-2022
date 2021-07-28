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
use DataDikdas\Model\RwyKepangkatan;
use DataDikdas\Model\RwyKepangkatanPeer;
use DataDikdas\Model\RwyKepangkatanQuery;
use DataDikdas\Model\VldRwyKepangkatan;

/**
 * Base class that represents a query for the 'rwy_kepangkatan' table.
 *
 * 
 *
 * @method RwyKepangkatanQuery orderByRiwayatKepangkatanId($order = Criteria::ASC) Order by the riwayat_kepangkatan_id column
 * @method RwyKepangkatanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method RwyKepangkatanQuery orderByPangkatGolonganId($order = Criteria::ASC) Order by the pangkat_golongan_id column
 * @method RwyKepangkatanQuery orderByNomorSk($order = Criteria::ASC) Order by the nomor_sk column
 * @method RwyKepangkatanQuery orderByTanggalSk($order = Criteria::ASC) Order by the tanggal_sk column
 * @method RwyKepangkatanQuery orderByTmtPangkat($order = Criteria::ASC) Order by the tmt_pangkat column
 * @method RwyKepangkatanQuery orderByMasaKerjaGolTahun($order = Criteria::ASC) Order by the masa_kerja_gol_tahun column
 * @method RwyKepangkatanQuery orderByMasaKerjaGolBulan($order = Criteria::ASC) Order by the masa_kerja_gol_bulan column
 * @method RwyKepangkatanQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method RwyKepangkatanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method RwyKepangkatanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method RwyKepangkatanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method RwyKepangkatanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method RwyKepangkatanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method RwyKepangkatanQuery groupByRiwayatKepangkatanId() Group by the riwayat_kepangkatan_id column
 * @method RwyKepangkatanQuery groupByPtkId() Group by the ptk_id column
 * @method RwyKepangkatanQuery groupByPangkatGolonganId() Group by the pangkat_golongan_id column
 * @method RwyKepangkatanQuery groupByNomorSk() Group by the nomor_sk column
 * @method RwyKepangkatanQuery groupByTanggalSk() Group by the tanggal_sk column
 * @method RwyKepangkatanQuery groupByTmtPangkat() Group by the tmt_pangkat column
 * @method RwyKepangkatanQuery groupByMasaKerjaGolTahun() Group by the masa_kerja_gol_tahun column
 * @method RwyKepangkatanQuery groupByMasaKerjaGolBulan() Group by the masa_kerja_gol_bulan column
 * @method RwyKepangkatanQuery groupByAsalData() Group by the asal_data column
 * @method RwyKepangkatanQuery groupByCreateDate() Group by the create_date column
 * @method RwyKepangkatanQuery groupByLastUpdate() Group by the last_update column
 * @method RwyKepangkatanQuery groupBySoftDelete() Group by the soft_delete column
 * @method RwyKepangkatanQuery groupByLastSync() Group by the last_sync column
 * @method RwyKepangkatanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method RwyKepangkatanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method RwyKepangkatanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method RwyKepangkatanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method RwyKepangkatanQuery leftJoinPangkatGolongan($relationAlias = null) Adds a LEFT JOIN clause to the query using the PangkatGolongan relation
 * @method RwyKepangkatanQuery rightJoinPangkatGolongan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PangkatGolongan relation
 * @method RwyKepangkatanQuery innerJoinPangkatGolongan($relationAlias = null) Adds a INNER JOIN clause to the query using the PangkatGolongan relation
 *
 * @method RwyKepangkatanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method RwyKepangkatanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method RwyKepangkatanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method RwyKepangkatanQuery leftJoinVldRwyKepangkatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldRwyKepangkatan relation
 * @method RwyKepangkatanQuery rightJoinVldRwyKepangkatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldRwyKepangkatan relation
 * @method RwyKepangkatanQuery innerJoinVldRwyKepangkatan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldRwyKepangkatan relation
 *
 * @method RwyKepangkatan findOne(PropelPDO $con = null) Return the first RwyKepangkatan matching the query
 * @method RwyKepangkatan findOneOrCreate(PropelPDO $con = null) Return the first RwyKepangkatan matching the query, or a new RwyKepangkatan object populated from the query conditions when no match is found
 *
 * @method RwyKepangkatan findOneByPtkId(string $ptk_id) Return the first RwyKepangkatan filtered by the ptk_id column
 * @method RwyKepangkatan findOneByPangkatGolonganId(string $pangkat_golongan_id) Return the first RwyKepangkatan filtered by the pangkat_golongan_id column
 * @method RwyKepangkatan findOneByNomorSk(string $nomor_sk) Return the first RwyKepangkatan filtered by the nomor_sk column
 * @method RwyKepangkatan findOneByTanggalSk(string $tanggal_sk) Return the first RwyKepangkatan filtered by the tanggal_sk column
 * @method RwyKepangkatan findOneByTmtPangkat(string $tmt_pangkat) Return the first RwyKepangkatan filtered by the tmt_pangkat column
 * @method RwyKepangkatan findOneByMasaKerjaGolTahun(string $masa_kerja_gol_tahun) Return the first RwyKepangkatan filtered by the masa_kerja_gol_tahun column
 * @method RwyKepangkatan findOneByMasaKerjaGolBulan(string $masa_kerja_gol_bulan) Return the first RwyKepangkatan filtered by the masa_kerja_gol_bulan column
 * @method RwyKepangkatan findOneByAsalData(string $asal_data) Return the first RwyKepangkatan filtered by the asal_data column
 * @method RwyKepangkatan findOneByCreateDate(string $create_date) Return the first RwyKepangkatan filtered by the create_date column
 * @method RwyKepangkatan findOneByLastUpdate(string $last_update) Return the first RwyKepangkatan filtered by the last_update column
 * @method RwyKepangkatan findOneBySoftDelete(string $soft_delete) Return the first RwyKepangkatan filtered by the soft_delete column
 * @method RwyKepangkatan findOneByLastSync(string $last_sync) Return the first RwyKepangkatan filtered by the last_sync column
 * @method RwyKepangkatan findOneByUpdaterId(string $updater_id) Return the first RwyKepangkatan filtered by the updater_id column
 *
 * @method array findByRiwayatKepangkatanId(string $riwayat_kepangkatan_id) Return RwyKepangkatan objects filtered by the riwayat_kepangkatan_id column
 * @method array findByPtkId(string $ptk_id) Return RwyKepangkatan objects filtered by the ptk_id column
 * @method array findByPangkatGolonganId(string $pangkat_golongan_id) Return RwyKepangkatan objects filtered by the pangkat_golongan_id column
 * @method array findByNomorSk(string $nomor_sk) Return RwyKepangkatan objects filtered by the nomor_sk column
 * @method array findByTanggalSk(string $tanggal_sk) Return RwyKepangkatan objects filtered by the tanggal_sk column
 * @method array findByTmtPangkat(string $tmt_pangkat) Return RwyKepangkatan objects filtered by the tmt_pangkat column
 * @method array findByMasaKerjaGolTahun(string $masa_kerja_gol_tahun) Return RwyKepangkatan objects filtered by the masa_kerja_gol_tahun column
 * @method array findByMasaKerjaGolBulan(string $masa_kerja_gol_bulan) Return RwyKepangkatan objects filtered by the masa_kerja_gol_bulan column
 * @method array findByAsalData(string $asal_data) Return RwyKepangkatan objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return RwyKepangkatan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return RwyKepangkatan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return RwyKepangkatan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return RwyKepangkatan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return RwyKepangkatan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyKepangkatanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseRwyKepangkatanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\RwyKepangkatan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new RwyKepangkatanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   RwyKepangkatanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return RwyKepangkatanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof RwyKepangkatanQuery) {
            return $criteria;
        }
        $query = new RwyKepangkatanQuery();
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
     * @return   RwyKepangkatan|RwyKepangkatan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = RwyKepangkatanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(RwyKepangkatanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 RwyKepangkatan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByRiwayatKepangkatanId($key, $con = null)
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
     * @return                 RwyKepangkatan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "riwayat_kepangkatan_id", "ptk_id", "pangkat_golongan_id", "nomor_sk", "tanggal_sk", "tmt_pangkat", "masa_kerja_gol_tahun", "masa_kerja_gol_bulan", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "rwy_kepangkatan" WHERE "riwayat_kepangkatan_id" = :p0';
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
            $obj = new RwyKepangkatan();
            $obj->hydrate($row);
            RwyKepangkatanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return RwyKepangkatan|RwyKepangkatan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|RwyKepangkatan[]|mixed the list of results, formatted by the current formatter
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the riwayat_kepangkatan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRiwayatKepangkatanId('fooValue');   // WHERE riwayat_kepangkatan_id = 'fooValue'
     * $query->filterByRiwayatKepangkatanId('%fooValue%'); // WHERE riwayat_kepangkatan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $riwayatKepangkatanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByRiwayatKepangkatanId($riwayatKepangkatanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($riwayatKepangkatanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $riwayatKepangkatanId)) {
                $riwayatKepangkatanId = str_replace('*', '%', $riwayatKepangkatanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $riwayatKepangkatanId, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyKepangkatanPeer::PTK_ID, $ptkId, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByPangkatGolonganId($pangkatGolonganId = null, $comparison = null)
    {
        if (is_array($pangkatGolonganId)) {
            $useMinMax = false;
            if (isset($pangkatGolonganId['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pangkatGolonganId['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyKepangkatanPeer::NOMOR_SK, $nomorSk, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByTanggalSk($tanggalSk = null, $comparison = null)
    {
        if (is_array($tanggalSk)) {
            $useMinMax = false;
            if (isset($tanggalSk['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::TANGGAL_SK, $tanggalSk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSk['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::TANGGAL_SK, $tanggalSk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::TANGGAL_SK, $tanggalSk, $comparison);
    }

    /**
     * Filter the query on the tmt_pangkat column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtPangkat('2011-03-14'); // WHERE tmt_pangkat = '2011-03-14'
     * $query->filterByTmtPangkat('now'); // WHERE tmt_pangkat = '2011-03-14'
     * $query->filterByTmtPangkat(array('max' => 'yesterday')); // WHERE tmt_pangkat > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtPangkat The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByTmtPangkat($tmtPangkat = null, $comparison = null)
    {
        if (is_array($tmtPangkat)) {
            $useMinMax = false;
            if (isset($tmtPangkat['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::TMT_PANGKAT, $tmtPangkat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtPangkat['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::TMT_PANGKAT, $tmtPangkat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::TMT_PANGKAT, $tmtPangkat, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_gol_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaGolTahun(1234); // WHERE masa_kerja_gol_tahun = 1234
     * $query->filterByMasaKerjaGolTahun(array(12, 34)); // WHERE masa_kerja_gol_tahun IN (12, 34)
     * $query->filterByMasaKerjaGolTahun(array('min' => 12)); // WHERE masa_kerja_gol_tahun >= 12
     * $query->filterByMasaKerjaGolTahun(array('max' => 12)); // WHERE masa_kerja_gol_tahun <= 12
     * </code>
     *
     * @param     mixed $masaKerjaGolTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaGolTahun($masaKerjaGolTahun = null, $comparison = null)
    {
        if (is_array($masaKerjaGolTahun)) {
            $useMinMax = false;
            if (isset($masaKerjaGolTahun['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN, $masaKerjaGolTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaGolTahun['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN, $masaKerjaGolTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_TAHUN, $masaKerjaGolTahun, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_gol_bulan column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaGolBulan(1234); // WHERE masa_kerja_gol_bulan = 1234
     * $query->filterByMasaKerjaGolBulan(array(12, 34)); // WHERE masa_kerja_gol_bulan IN (12, 34)
     * $query->filterByMasaKerjaGolBulan(array('min' => 12)); // WHERE masa_kerja_gol_bulan >= 12
     * $query->filterByMasaKerjaGolBulan(array('max' => 12)); // WHERE masa_kerja_gol_bulan <= 12
     * </code>
     *
     * @param     mixed $masaKerjaGolBulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaGolBulan($masaKerjaGolBulan = null, $comparison = null)
    {
        if (is_array($masaKerjaGolBulan)) {
            $useMinMax = false;
            if (isset($masaKerjaGolBulan['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN, $masaKerjaGolBulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaGolBulan['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN, $masaKerjaGolBulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::MASA_KERJA_GOL_BULAN, $masaKerjaGolBulan, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyKepangkatanPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(RwyKepangkatanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(RwyKepangkatanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(RwyKepangkatanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PangkatGolongan object
     *
     * @param   PangkatGolongan|PropelObjectCollection $pangkatGolongan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKepangkatanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPangkatGolongan($pangkatGolongan, $comparison = null)
    {
        if ($pangkatGolongan instanceof PangkatGolongan) {
            return $this
                ->addUsingAlias(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->getPangkatGolonganId(), $comparison);
        } elseif ($pangkatGolongan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKepangkatanPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->toKeyValue('PrimaryKey', 'PangkatGolonganId'), $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKepangkatanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(RwyKepangkatanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(RwyKepangkatanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return RwyKepangkatanQuery The current query, for fluid interface
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
     * Filter the query by a related VldRwyKepangkatan object
     *
     * @param   VldRwyKepangkatan|PropelObjectCollection $vldRwyKepangkatan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 RwyKepangkatanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldRwyKepangkatan($vldRwyKepangkatan, $comparison = null)
    {
        if ($vldRwyKepangkatan instanceof VldRwyKepangkatan) {
            return $this
                ->addUsingAlias(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $vldRwyKepangkatan->getRiwayatKepangkatanId(), $comparison);
        } elseif ($vldRwyKepangkatan instanceof PropelObjectCollection) {
            return $this
                ->useVldRwyKepangkatanQuery()
                ->filterByPrimaryKeys($vldRwyKepangkatan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldRwyKepangkatan() only accepts arguments of type VldRwyKepangkatan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldRwyKepangkatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function joinVldRwyKepangkatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldRwyKepangkatan');

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
            $this->addJoinObject($join, 'VldRwyKepangkatan');
        }

        return $this;
    }

    /**
     * Use the VldRwyKepangkatan relation VldRwyKepangkatan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldRwyKepangkatanQuery A secondary query class using the current class as primary query
     */
    public function useVldRwyKepangkatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldRwyKepangkatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldRwyKepangkatan', '\DataDikdas\Model\VldRwyKepangkatanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   RwyKepangkatan $rwyKepangkatan Object to remove from the list of results
     *
     * @return RwyKepangkatanQuery The current query, for fluid interface
     */
    public function prune($rwyKepangkatan = null)
    {
        if ($rwyKepangkatan) {
            $this->addUsingAlias(RwyKepangkatanPeer::RIWAYAT_KEPANGKATAN_ID, $rwyKepangkatan->getRiwayatKepangkatanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
