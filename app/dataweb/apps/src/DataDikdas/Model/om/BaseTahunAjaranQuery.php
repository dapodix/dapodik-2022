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
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\Demografi;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\Semester;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranPeer;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\TanahLongitudinal;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\Un;

/**
 * Base class that represents a query for the 'ref.tahun_ajaran' table.
 *
 * 
 *
 * @method TahunAjaranQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method TahunAjaranQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method TahunAjaranQuery orderByPeriodeAktif($order = Criteria::ASC) Order by the periode_aktif column
 * @method TahunAjaranQuery orderByTanggalMulai($order = Criteria::ASC) Order by the tanggal_mulai column
 * @method TahunAjaranQuery orderByTanggalSelesai($order = Criteria::ASC) Order by the tanggal_selesai column
 * @method TahunAjaranQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TahunAjaranQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TahunAjaranQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TahunAjaranQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TahunAjaranQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method TahunAjaranQuery groupByNama() Group by the nama column
 * @method TahunAjaranQuery groupByPeriodeAktif() Group by the periode_aktif column
 * @method TahunAjaranQuery groupByTanggalMulai() Group by the tanggal_mulai column
 * @method TahunAjaranQuery groupByTanggalSelesai() Group by the tanggal_selesai column
 * @method TahunAjaranQuery groupByCreateDate() Group by the create_date column
 * @method TahunAjaranQuery groupByLastUpdate() Group by the last_update column
 * @method TahunAjaranQuery groupByExpiredDate() Group by the expired_date column
 * @method TahunAjaranQuery groupByLastSync() Group by the last_sync column
 *
 * @method TahunAjaranQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TahunAjaranQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TahunAjaranQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TahunAjaranQuery leftJoinBeasiswaPesertaDidikRelatedByTahunSelesai($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunSelesai relation
 * @method TahunAjaranQuery rightJoinBeasiswaPesertaDidikRelatedByTahunSelesai($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunSelesai relation
 * @method TahunAjaranQuery innerJoinBeasiswaPesertaDidikRelatedByTahunSelesai($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunSelesai relation
 *
 * @method TahunAjaranQuery leftJoinBeasiswaPesertaDidikRelatedByTahunMulai($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunMulai relation
 * @method TahunAjaranQuery rightJoinBeasiswaPesertaDidikRelatedByTahunMulai($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunMulai relation
 * @method TahunAjaranQuery innerJoinBeasiswaPesertaDidikRelatedByTahunMulai($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunMulai relation
 *
 * @method TahunAjaranQuery leftJoinDemografi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Demografi relation
 * @method TahunAjaranQuery rightJoinDemografi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Demografi relation
 * @method TahunAjaranQuery innerJoinDemografi($relationAlias = null) Adds a INNER JOIN clause to the query using the Demografi relation
 *
 * @method TahunAjaranQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method TahunAjaranQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method TahunAjaranQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method TahunAjaranQuery leftJoinPesertaDidikBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikBaru relation
 * @method TahunAjaranQuery rightJoinPesertaDidikBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikBaru relation
 * @method TahunAjaranQuery innerJoinPesertaDidikBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikBaru relation
 *
 * @method TahunAjaranQuery leftJoinPtkBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkBaru relation
 * @method TahunAjaranQuery rightJoinPtkBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkBaru relation
 * @method TahunAjaranQuery innerJoinPtkBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkBaru relation
 *
 * @method TahunAjaranQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method TahunAjaranQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method TahunAjaranQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method TahunAjaranQuery leftJoinSemester($relationAlias = null) Adds a LEFT JOIN clause to the query using the Semester relation
 * @method TahunAjaranQuery rightJoinSemester($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Semester relation
 * @method TahunAjaranQuery innerJoinSemester($relationAlias = null) Adds a INNER JOIN clause to the query using the Semester relation
 *
 * @method TahunAjaranQuery leftJoinTanahLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the TanahLongitudinal relation
 * @method TahunAjaranQuery rightJoinTanahLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TanahLongitudinal relation
 * @method TahunAjaranQuery innerJoinTanahLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the TanahLongitudinal relation
 *
 * @method TahunAjaranQuery leftJoinTemplateUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUn relation
 * @method TahunAjaranQuery rightJoinTemplateUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUn relation
 * @method TahunAjaranQuery innerJoinTemplateUn($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUn relation
 *
 * @method TahunAjaranQuery leftJoinUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the Un relation
 * @method TahunAjaranQuery rightJoinUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Un relation
 * @method TahunAjaranQuery innerJoinUn($relationAlias = null) Adds a INNER JOIN clause to the query using the Un relation
 *
 * @method TahunAjaran findOne(PropelPDO $con = null) Return the first TahunAjaran matching the query
 * @method TahunAjaran findOneOrCreate(PropelPDO $con = null) Return the first TahunAjaran matching the query, or a new TahunAjaran object populated from the query conditions when no match is found
 *
 * @method TahunAjaran findOneByNama(string $nama) Return the first TahunAjaran filtered by the nama column
 * @method TahunAjaran findOneByPeriodeAktif(string $periode_aktif) Return the first TahunAjaran filtered by the periode_aktif column
 * @method TahunAjaran findOneByTanggalMulai(string $tanggal_mulai) Return the first TahunAjaran filtered by the tanggal_mulai column
 * @method TahunAjaran findOneByTanggalSelesai(string $tanggal_selesai) Return the first TahunAjaran filtered by the tanggal_selesai column
 * @method TahunAjaran findOneByCreateDate(string $create_date) Return the first TahunAjaran filtered by the create_date column
 * @method TahunAjaran findOneByLastUpdate(string $last_update) Return the first TahunAjaran filtered by the last_update column
 * @method TahunAjaran findOneByExpiredDate(string $expired_date) Return the first TahunAjaran filtered by the expired_date column
 * @method TahunAjaran findOneByLastSync(string $last_sync) Return the first TahunAjaran filtered by the last_sync column
 *
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return TahunAjaran objects filtered by the tahun_ajaran_id column
 * @method array findByNama(string $nama) Return TahunAjaran objects filtered by the nama column
 * @method array findByPeriodeAktif(string $periode_aktif) Return TahunAjaran objects filtered by the periode_aktif column
 * @method array findByTanggalMulai(string $tanggal_mulai) Return TahunAjaran objects filtered by the tanggal_mulai column
 * @method array findByTanggalSelesai(string $tanggal_selesai) Return TahunAjaran objects filtered by the tanggal_selesai column
 * @method array findByCreateDate(string $create_date) Return TahunAjaran objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TahunAjaran objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TahunAjaran objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TahunAjaran objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTahunAjaranQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTahunAjaranQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TahunAjaran', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TahunAjaranQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TahunAjaranQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TahunAjaranQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TahunAjaranQuery) {
            return $criteria;
        }
        $query = new TahunAjaranQuery();
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
     * @return   TahunAjaran|TahunAjaran[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TahunAjaranPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TahunAjaranPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TahunAjaran A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTahunAjaranId($key, $con = null)
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
     * @return                 TahunAjaran A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "tahun_ajaran_id", "nama", "periode_aktif", "tanggal_mulai", "tanggal_selesai", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."tahun_ajaran" WHERE "tahun_ajaran_id" = :p0';
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
            $obj = new TahunAjaran();
            $obj->hydrate($row);
            TahunAjaranPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TahunAjaran|TahunAjaran[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TahunAjaran[]|mixed the list of results, formatted by the current formatter
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tahun_ajaran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunAjaranId(1234); // WHERE tahun_ajaran_id = 1234
     * $query->filterByTahunAjaranId(array(12, 34)); // WHERE tahun_ajaran_id IN (12, 34)
     * $query->filterByTahunAjaranId(array('min' => 12)); // WHERE tahun_ajaran_id >= 12
     * $query->filterByTahunAjaranId(array('max' => 12)); // WHERE tahun_ajaran_id <= 12
     * </code>
     *
     * @param     mixed $tahunAjaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TahunAjaranPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the periode_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByPeriodeAktif(1234); // WHERE periode_aktif = 1234
     * $query->filterByPeriodeAktif(array(12, 34)); // WHERE periode_aktif IN (12, 34)
     * $query->filterByPeriodeAktif(array('min' => 12)); // WHERE periode_aktif >= 12
     * $query->filterByPeriodeAktif(array('max' => 12)); // WHERE periode_aktif <= 12
     * </code>
     *
     * @param     mixed $periodeAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByPeriodeAktif($periodeAktif = null, $comparison = null)
    {
        if (is_array($periodeAktif)) {
            $useMinMax = false;
            if (isset($periodeAktif['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::PERIODE_AKTIF, $periodeAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($periodeAktif['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::PERIODE_AKTIF, $periodeAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::PERIODE_AKTIF, $periodeAktif, $comparison);
    }

    /**
     * Filter the query on the tanggal_mulai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalMulai('2011-03-14'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai('now'); // WHERE tanggal_mulai = '2011-03-14'
     * $query->filterByTanggalMulai(array('max' => 'yesterday')); // WHERE tanggal_mulai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalMulai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByTanggalMulai($tanggalMulai = null, $comparison = null)
    {
        if (is_array($tanggalMulai)) {
            $useMinMax = false;
            if (isset($tanggalMulai['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::TANGGAL_MULAI, $tanggalMulai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalMulai['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::TANGGAL_MULAI, $tanggalMulai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::TANGGAL_MULAI, $tanggalMulai, $comparison);
    }

    /**
     * Filter the query on the tanggal_selesai column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalSelesai('2011-03-14'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai('now'); // WHERE tanggal_selesai = '2011-03-14'
     * $query->filterByTanggalSelesai(array('max' => 'yesterday')); // WHERE tanggal_selesai > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalSelesai The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByTanggalSelesai($tanggalSelesai = null, $comparison = null)
    {
        if (is_array($tanggalSelesai)) {
            $useMinMax = false;
            if (isset($tanggalSelesai['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::TANGGAL_SELESAI, $tanggalSelesai['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalSelesai['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::TANGGAL_SELESAI, $tanggalSelesai['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::TANGGAL_SELESAI, $tanggalSelesai, $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TahunAjaranPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TahunAjaranPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TahunAjaranPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related BeasiswaPesertaDidik object
     *
     * @param   BeasiswaPesertaDidik|PropelObjectCollection $beasiswaPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPesertaDidikRelatedByTahunSelesai($beasiswaPesertaDidik, $comparison = null)
    {
        if ($beasiswaPesertaDidik instanceof BeasiswaPesertaDidik) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $beasiswaPesertaDidik->getTahunSelesai(), $comparison);
        } elseif ($beasiswaPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPesertaDidikRelatedByTahunSelesaiQuery()
                ->filterByPrimaryKeys($beasiswaPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPesertaDidikRelatedByTahunSelesai() only accepts arguments of type BeasiswaPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunSelesai relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinBeasiswaPesertaDidikRelatedByTahunSelesai($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPesertaDidikRelatedByTahunSelesai');

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
            $this->addJoinObject($join, 'BeasiswaPesertaDidikRelatedByTahunSelesai');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPesertaDidikRelatedByTahunSelesai relation BeasiswaPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPesertaDidikRelatedByTahunSelesaiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPesertaDidikRelatedByTahunSelesai($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPesertaDidikRelatedByTahunSelesai', '\DataDikdas\Model\BeasiswaPesertaDidikQuery');
    }

    /**
     * Filter the query by a related BeasiswaPesertaDidik object
     *
     * @param   BeasiswaPesertaDidik|PropelObjectCollection $beasiswaPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPesertaDidikRelatedByTahunMulai($beasiswaPesertaDidik, $comparison = null)
    {
        if ($beasiswaPesertaDidik instanceof BeasiswaPesertaDidik) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $beasiswaPesertaDidik->getTahunMulai(), $comparison);
        } elseif ($beasiswaPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPesertaDidikRelatedByTahunMulaiQuery()
                ->filterByPrimaryKeys($beasiswaPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPesertaDidikRelatedByTahunMulai() only accepts arguments of type BeasiswaPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPesertaDidikRelatedByTahunMulai relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinBeasiswaPesertaDidikRelatedByTahunMulai($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPesertaDidikRelatedByTahunMulai');

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
            $this->addJoinObject($join, 'BeasiswaPesertaDidikRelatedByTahunMulai');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPesertaDidikRelatedByTahunMulai relation BeasiswaPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPesertaDidikRelatedByTahunMulaiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPesertaDidikRelatedByTahunMulai($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPesertaDidikRelatedByTahunMulai', '\DataDikdas\Model\BeasiswaPesertaDidikQuery');
    }

    /**
     * Filter the query by a related Demografi object
     *
     * @param   Demografi|PropelObjectCollection $demografi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDemografi($demografi, $comparison = null)
    {
        if ($demografi instanceof Demografi) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $demografi->getTahunAjaranId(), $comparison);
        } elseif ($demografi instanceof PropelObjectCollection) {
            return $this
                ->useDemografiQuery()
                ->filterByPrimaryKeys($demografi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDemografi() only accepts arguments of type Demografi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Demografi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinDemografi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Demografi');

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
            $this->addJoinObject($join, 'Demografi');
        }

        return $this;
    }

    /**
     * Use the Demografi relation Demografi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DemografiQuery A secondary query class using the current class as primary query
     */
    public function useDemografiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDemografi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Demografi', '\DataDikdas\Model\DemografiQuery');
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $pengawasTerdaftar->getTahunAjaranId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

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
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related PesertaDidikBaru object
     *
     * @param   PesertaDidikBaru|PropelObjectCollection $pesertaDidikBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikBaru($pesertaDidikBaru, $comparison = null)
    {
        if ($pesertaDidikBaru instanceof PesertaDidikBaru) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $pesertaDidikBaru->getTahunAjaranId(), $comparison);
        } elseif ($pesertaDidikBaru instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikBaruQuery()
                ->filterByPrimaryKeys($pesertaDidikBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikBaru() only accepts arguments of type PesertaDidikBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinPesertaDidikBaru($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikBaru');

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
            $this->addJoinObject($join, 'PesertaDidikBaru');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikBaru relation PesertaDidikBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikBaruQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikBaruQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikBaru', '\DataDikdas\Model\PesertaDidikBaruQuery');
    }

    /**
     * Filter the query by a related PtkBaru object
     *
     * @param   PtkBaru|PropelObjectCollection $ptkBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkBaru($ptkBaru, $comparison = null)
    {
        if ($ptkBaru instanceof PtkBaru) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $ptkBaru->getTahunAjaranId(), $comparison);
        } elseif ($ptkBaru instanceof PropelObjectCollection) {
            return $this
                ->usePtkBaruQuery()
                ->filterByPrimaryKeys($ptkBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkBaru() only accepts arguments of type PtkBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinPtkBaru($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkBaru');

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
            $this->addJoinObject($join, 'PtkBaru');
        }

        return $this;
    }

    /**
     * Use the PtkBaru relation PtkBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkBaruQuery A secondary query class using the current class as primary query
     */
    public function usePtkBaruQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkBaru', '\DataDikdas\Model\PtkBaruQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $ptkTerdaftar->getTahunAjaranId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePtkTerdaftarQuery()
                ->filterByPrimaryKeys($ptkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

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
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related Semester object
     *
     * @param   Semester|PropelObjectCollection $semester  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySemester($semester, $comparison = null)
    {
        if ($semester instanceof Semester) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $semester->getTahunAjaranId(), $comparison);
        } elseif ($semester instanceof PropelObjectCollection) {
            return $this
                ->useSemesterQuery()
                ->filterByPrimaryKeys($semester->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySemester() only accepts arguments of type Semester or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Semester relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinSemester($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Semester');

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
            $this->addJoinObject($join, 'Semester');
        }

        return $this;
    }

    /**
     * Use the Semester relation Semester object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SemesterQuery A secondary query class using the current class as primary query
     */
    public function useSemesterQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSemester($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Semester', '\DataDikdas\Model\SemesterQuery');
    }

    /**
     * Filter the query by a related TanahLongitudinal object
     *
     * @param   TanahLongitudinal|PropelObjectCollection $tanahLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanahLongitudinal($tanahLongitudinal, $comparison = null)
    {
        if ($tanahLongitudinal instanceof TanahLongitudinal) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $tanahLongitudinal->getTahunAjaranId(), $comparison);
        } elseif ($tanahLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useTanahLongitudinalQuery()
                ->filterByPrimaryKeys($tanahLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanahLongitudinal() only accepts arguments of type TanahLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TanahLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinTanahLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TanahLongitudinal');

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
            $this->addJoinObject($join, 'TanahLongitudinal');
        }

        return $this;
    }

    /**
     * Use the TanahLongitudinal relation TanahLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useTanahLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanahLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TanahLongitudinal', '\DataDikdas\Model\TanahLongitudinalQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUn($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $templateUn->getTahunAjaranId(), $comparison);
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
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinTemplateUn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useTemplateUnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemplateUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateUn', '\DataDikdas\Model\TemplateUnQuery');
    }

    /**
     * Filter the query by a related Un object
     *
     * @param   Un|PropelObjectCollection $un  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TahunAjaranQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUn($un, $comparison = null)
    {
        if ($un instanceof Un) {
            return $this
                ->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $un->getTahunAjaranId(), $comparison);
        } elseif ($un instanceof PropelObjectCollection) {
            return $this
                ->useUnQuery()
                ->filterByPrimaryKeys($un->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUn() only accepts arguments of type Un or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Un relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function joinUn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Un');

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
            $this->addJoinObject($join, 'Un');
        }

        return $this;
    }

    /**
     * Use the Un relation Un object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnQuery A secondary query class using the current class as primary query
     */
    public function useUnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Un', '\DataDikdas\Model\UnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TahunAjaran $tahunAjaran Object to remove from the list of results
     *
     * @return TahunAjaranQuery The current query, for fluid interface
     */
    public function prune($tahunAjaran = null)
    {
        if ($tahunAjaran) {
            $this->addUsingAlias(TahunAjaranPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
