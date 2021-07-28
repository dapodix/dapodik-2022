<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \PDO;
use \Propel;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\NilaiSmt;
use DataDikdas\Model\NilaiSmtPeer;
use DataDikdas\Model\NilaiSmtQuery;

/**
 * Base class that represents a query for the 'nilai.nilai_smt' table.
 *
 * 
 *
 * @method NilaiSmtQuery orderByAnggotaRombelId($order = Criteria::ASC) Order by the anggota_rombel_id column
 * @method NilaiSmtQuery orderByNilaiAfektifAngka($order = Criteria::ASC) Order by the nilai_afektif_angka column
 * @method NilaiSmtQuery orderByNilaiAfektifHuruf($order = Criteria::ASC) Order by the nilai_afektif_huruf column
 * @method NilaiSmtQuery orderByKetAfektif($order = Criteria::ASC) Order by the ket_afektif column
 * @method NilaiSmtQuery orderByNilaiAfektif2Angka($order = Criteria::ASC) Order by the nilai_afektif2_angka column
 * @method NilaiSmtQuery orderByNilaiAfektif2Huruf($order = Criteria::ASC) Order by the nilai_afektif2_huruf column
 * @method NilaiSmtQuery orderByKetAfektif2($order = Criteria::ASC) Order by the ket_afektif2 column
 * @method NilaiSmtQuery orderByABeku($order = Criteria::ASC) Order by the a_beku column
 * @method NilaiSmtQuery orderByRaporKe($order = Criteria::ASC) Order by the rapor_ke column
 * @method NilaiSmtQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method NilaiSmtQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method NilaiSmtQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method NilaiSmtQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method NilaiSmtQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method NilaiSmtQuery groupByAnggotaRombelId() Group by the anggota_rombel_id column
 * @method NilaiSmtQuery groupByNilaiAfektifAngka() Group by the nilai_afektif_angka column
 * @method NilaiSmtQuery groupByNilaiAfektifHuruf() Group by the nilai_afektif_huruf column
 * @method NilaiSmtQuery groupByKetAfektif() Group by the ket_afektif column
 * @method NilaiSmtQuery groupByNilaiAfektif2Angka() Group by the nilai_afektif2_angka column
 * @method NilaiSmtQuery groupByNilaiAfektif2Huruf() Group by the nilai_afektif2_huruf column
 * @method NilaiSmtQuery groupByKetAfektif2() Group by the ket_afektif2 column
 * @method NilaiSmtQuery groupByABeku() Group by the a_beku column
 * @method NilaiSmtQuery groupByRaporKe() Group by the rapor_ke column
 * @method NilaiSmtQuery groupByCreateDate() Group by the create_date column
 * @method NilaiSmtQuery groupByLastUpdate() Group by the last_update column
 * @method NilaiSmtQuery groupBySoftDelete() Group by the soft_delete column
 * @method NilaiSmtQuery groupByLastSync() Group by the last_sync column
 * @method NilaiSmtQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method NilaiSmtQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NilaiSmtQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NilaiSmtQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NilaiSmt findOne(PropelPDO $con = null) Return the first NilaiSmt matching the query
 * @method NilaiSmt findOneOrCreate(PropelPDO $con = null) Return the first NilaiSmt matching the query, or a new NilaiSmt object populated from the query conditions when no match is found
 *
 * @method NilaiSmt findOneByNilaiAfektifAngka(string $nilai_afektif_angka) Return the first NilaiSmt filtered by the nilai_afektif_angka column
 * @method NilaiSmt findOneByNilaiAfektifHuruf(string $nilai_afektif_huruf) Return the first NilaiSmt filtered by the nilai_afektif_huruf column
 * @method NilaiSmt findOneByKetAfektif(string $ket_afektif) Return the first NilaiSmt filtered by the ket_afektif column
 * @method NilaiSmt findOneByNilaiAfektif2Angka(string $nilai_afektif2_angka) Return the first NilaiSmt filtered by the nilai_afektif2_angka column
 * @method NilaiSmt findOneByNilaiAfektif2Huruf(string $nilai_afektif2_huruf) Return the first NilaiSmt filtered by the nilai_afektif2_huruf column
 * @method NilaiSmt findOneByKetAfektif2(string $ket_afektif2) Return the first NilaiSmt filtered by the ket_afektif2 column
 * @method NilaiSmt findOneByABeku(string $a_beku) Return the first NilaiSmt filtered by the a_beku column
 * @method NilaiSmt findOneByRaporKe(string $rapor_ke) Return the first NilaiSmt filtered by the rapor_ke column
 * @method NilaiSmt findOneByCreateDate(string $create_date) Return the first NilaiSmt filtered by the create_date column
 * @method NilaiSmt findOneByLastUpdate(string $last_update) Return the first NilaiSmt filtered by the last_update column
 * @method NilaiSmt findOneBySoftDelete(string $soft_delete) Return the first NilaiSmt filtered by the soft_delete column
 * @method NilaiSmt findOneByLastSync(string $last_sync) Return the first NilaiSmt filtered by the last_sync column
 * @method NilaiSmt findOneByUpdaterId(string $updater_id) Return the first NilaiSmt filtered by the updater_id column
 *
 * @method array findByAnggotaRombelId(string $anggota_rombel_id) Return NilaiSmt objects filtered by the anggota_rombel_id column
 * @method array findByNilaiAfektifAngka(string $nilai_afektif_angka) Return NilaiSmt objects filtered by the nilai_afektif_angka column
 * @method array findByNilaiAfektifHuruf(string $nilai_afektif_huruf) Return NilaiSmt objects filtered by the nilai_afektif_huruf column
 * @method array findByKetAfektif(string $ket_afektif) Return NilaiSmt objects filtered by the ket_afektif column
 * @method array findByNilaiAfektif2Angka(string $nilai_afektif2_angka) Return NilaiSmt objects filtered by the nilai_afektif2_angka column
 * @method array findByNilaiAfektif2Huruf(string $nilai_afektif2_huruf) Return NilaiSmt objects filtered by the nilai_afektif2_huruf column
 * @method array findByKetAfektif2(string $ket_afektif2) Return NilaiSmt objects filtered by the ket_afektif2 column
 * @method array findByABeku(string $a_beku) Return NilaiSmt objects filtered by the a_beku column
 * @method array findByRaporKe(string $rapor_ke) Return NilaiSmt objects filtered by the rapor_ke column
 * @method array findByCreateDate(string $create_date) Return NilaiSmt objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return NilaiSmt objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return NilaiSmt objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return NilaiSmt objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return NilaiSmt objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiSmtQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNilaiSmtQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\NilaiSmt', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NilaiSmtQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NilaiSmtQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NilaiSmtQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NilaiSmtQuery) {
            return $criteria;
        }
        $query = new NilaiSmtQuery();
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
     * @return   NilaiSmt|NilaiSmt[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NilaiSmtPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiSmt A model object, or null if the key is not found
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
     * @return                 NilaiSmt A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "anggota_rombel_id", "nilai_afektif_angka", "nilai_afektif_huruf", "ket_afektif", "nilai_afektif2_angka", "nilai_afektif2_huruf", "ket_afektif2", "a_beku", "rapor_ke", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai"."nilai_smt" WHERE "anggota_rombel_id" = :p0';
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
            $obj = new NilaiSmt();
            $obj->hydrate($row);
            NilaiSmtPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NilaiSmt|NilaiSmt[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NilaiSmt[]|mixed the list of results, formatted by the current formatter
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
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $keys, Criteria::IN);
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
     * @return NilaiSmtQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $anggotaRombelId, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektifAngka(1234); // WHERE nilai_afektif_angka = 1234
     * $query->filterByNilaiAfektifAngka(array(12, 34)); // WHERE nilai_afektif_angka IN (12, 34)
     * $query->filterByNilaiAfektifAngka(array('min' => 12)); // WHERE nilai_afektif_angka >= 12
     * $query->filterByNilaiAfektifAngka(array('max' => 12)); // WHERE nilai_afektif_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiAfektifAngka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektifAngka($nilaiAfektifAngka = null, $comparison = null)
    {
        if (is_array($nilaiAfektifAngka)) {
            $useMinMax = false;
            if (isset($nilaiAfektifAngka['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiAfektifAngka['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA, $nilaiAfektifAngka, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektifHuruf('fooValue');   // WHERE nilai_afektif_huruf = 'fooValue'
     * $query->filterByNilaiAfektifHuruf('%fooValue%'); // WHERE nilai_afektif_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiAfektifHuruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektifHuruf($nilaiAfektifHuruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiAfektifHuruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiAfektifHuruf)) {
                $nilaiAfektifHuruf = str_replace('*', '%', $nilaiAfektifHuruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF_HURUF, $nilaiAfektifHuruf, $comparison);
    }

    /**
     * Filter the query on the ket_afektif column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAfektif('fooValue');   // WHERE ket_afektif = 'fooValue'
     * $query->filterByKetAfektif('%fooValue%'); // WHERE ket_afektif LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAfektif The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByKetAfektif($ketAfektif = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAfektif)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAfektif)) {
                $ketAfektif = str_replace('*', '%', $ketAfektif);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::KET_AFEKTIF, $ketAfektif, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif2_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektif2Angka(1234); // WHERE nilai_afektif2_angka = 1234
     * $query->filterByNilaiAfektif2Angka(array(12, 34)); // WHERE nilai_afektif2_angka IN (12, 34)
     * $query->filterByNilaiAfektif2Angka(array('min' => 12)); // WHERE nilai_afektif2_angka >= 12
     * $query->filterByNilaiAfektif2Angka(array('max' => 12)); // WHERE nilai_afektif2_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiAfektif2Angka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektif2Angka($nilaiAfektif2Angka = null, $comparison = null)
    {
        if (is_array($nilaiAfektif2Angka)) {
            $useMinMax = false;
            if (isset($nilaiAfektif2Angka['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiAfektif2Angka['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA, $nilaiAfektif2Angka, $comparison);
    }

    /**
     * Filter the query on the nilai_afektif2_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAfektif2Huruf('fooValue');   // WHERE nilai_afektif2_huruf = 'fooValue'
     * $query->filterByNilaiAfektif2Huruf('%fooValue%'); // WHERE nilai_afektif2_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiAfektif2Huruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByNilaiAfektif2Huruf($nilaiAfektif2Huruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiAfektif2Huruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiAfektif2Huruf)) {
                $nilaiAfektif2Huruf = str_replace('*', '%', $nilaiAfektif2Huruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::NILAI_AFEKTIF2_HURUF, $nilaiAfektif2Huruf, $comparison);
    }

    /**
     * Filter the query on the ket_afektif2 column
     *
     * Example usage:
     * <code>
     * $query->filterByKetAfektif2('fooValue');   // WHERE ket_afektif2 = 'fooValue'
     * $query->filterByKetAfektif2('%fooValue%'); // WHERE ket_afektif2 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketAfektif2 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByKetAfektif2($ketAfektif2 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketAfektif2)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketAfektif2)) {
                $ketAfektif2 = str_replace('*', '%', $ketAfektif2);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::KET_AFEKTIF2, $ketAfektif2, $comparison);
    }

    /**
     * Filter the query on the a_beku column
     *
     * Example usage:
     * <code>
     * $query->filterByABeku(1234); // WHERE a_beku = 1234
     * $query->filterByABeku(array(12, 34)); // WHERE a_beku IN (12, 34)
     * $query->filterByABeku(array('min' => 12)); // WHERE a_beku >= 12
     * $query->filterByABeku(array('max' => 12)); // WHERE a_beku <= 12
     * </code>
     *
     * @param     mixed $aBeku The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByABeku($aBeku = null, $comparison = null)
    {
        if (is_array($aBeku)) {
            $useMinMax = false;
            if (isset($aBeku['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::A_BEKU, $aBeku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBeku['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::A_BEKU, $aBeku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::A_BEKU, $aBeku, $comparison);
    }

    /**
     * Filter the query on the rapor_ke column
     *
     * Example usage:
     * <code>
     * $query->filterByRaporKe(1234); // WHERE rapor_ke = 1234
     * $query->filterByRaporKe(array(12, 34)); // WHERE rapor_ke IN (12, 34)
     * $query->filterByRaporKe(array('min' => 12)); // WHERE rapor_ke >= 12
     * $query->filterByRaporKe(array('max' => 12)); // WHERE rapor_ke <= 12
     * </code>
     *
     * @param     mixed $raporKe The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByRaporKe($raporKe = null, $comparison = null)
    {
        if (is_array($raporKe)) {
            $useMinMax = false;
            if (isset($raporKe['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::RAPOR_KE, $raporKe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($raporKe['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::RAPOR_KE, $raporKe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::RAPOR_KE, $raporKe, $comparison);
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
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(NilaiSmtPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(NilaiSmtPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiSmtPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return NilaiSmtQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiSmtPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   NilaiSmt $nilaiSmt Object to remove from the list of results
     *
     * @return NilaiSmtQuery The current query, for fluid interface
     */
    public function prune($nilaiSmt = null)
    {
        if ($nilaiSmt) {
            $this->addUsingAlias(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $nilaiSmt->getAnggotaRombelId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
