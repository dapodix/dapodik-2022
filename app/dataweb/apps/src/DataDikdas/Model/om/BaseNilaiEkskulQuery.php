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
use DataDikdas\Model\NilaiEkskul;
use DataDikdas\Model\NilaiEkskulPeer;
use DataDikdas\Model\NilaiEkskulQuery;

/**
 * Base class that represents a query for the 'nilai.nilai_ekskul' table.
 *
 * 
 *
 * @method NilaiEkskulQuery orderByIdNilaiX($order = Criteria::ASC) Order by the id_nilai_x column
 * @method NilaiEkskulQuery orderByIdKelasEkskul($order = Criteria::ASC) Order by the id_kelas_ekskul column
 * @method NilaiEkskulQuery orderByAnggotaRombelId($order = Criteria::ASC) Order by the anggota_rombel_id column
 * @method NilaiEkskulQuery orderByNilaiAngka($order = Criteria::ASC) Order by the nilai_angka column
 * @method NilaiEkskulQuery orderByNilaiHuruf($order = Criteria::ASC) Order by the nilai_huruf column
 * @method NilaiEkskulQuery orderByKet($order = Criteria::ASC) Order by the ket column
 * @method NilaiEkskulQuery orderByABeku($order = Criteria::ASC) Order by the a_beku column
 * @method NilaiEkskulQuery orderByRaporKe($order = Criteria::ASC) Order by the rapor_ke column
 * @method NilaiEkskulQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method NilaiEkskulQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method NilaiEkskulQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method NilaiEkskulQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method NilaiEkskulQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method NilaiEkskulQuery groupByIdNilaiX() Group by the id_nilai_x column
 * @method NilaiEkskulQuery groupByIdKelasEkskul() Group by the id_kelas_ekskul column
 * @method NilaiEkskulQuery groupByAnggotaRombelId() Group by the anggota_rombel_id column
 * @method NilaiEkskulQuery groupByNilaiAngka() Group by the nilai_angka column
 * @method NilaiEkskulQuery groupByNilaiHuruf() Group by the nilai_huruf column
 * @method NilaiEkskulQuery groupByKet() Group by the ket column
 * @method NilaiEkskulQuery groupByABeku() Group by the a_beku column
 * @method NilaiEkskulQuery groupByRaporKe() Group by the rapor_ke column
 * @method NilaiEkskulQuery groupByCreateDate() Group by the create_date column
 * @method NilaiEkskulQuery groupByLastUpdate() Group by the last_update column
 * @method NilaiEkskulQuery groupBySoftDelete() Group by the soft_delete column
 * @method NilaiEkskulQuery groupByLastSync() Group by the last_sync column
 * @method NilaiEkskulQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method NilaiEkskulQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method NilaiEkskulQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method NilaiEkskulQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method NilaiEkskul findOne(PropelPDO $con = null) Return the first NilaiEkskul matching the query
 * @method NilaiEkskul findOneOrCreate(PropelPDO $con = null) Return the first NilaiEkskul matching the query, or a new NilaiEkskul object populated from the query conditions when no match is found
 *
 * @method NilaiEkskul findOneByIdKelasEkskul(string $id_kelas_ekskul) Return the first NilaiEkskul filtered by the id_kelas_ekskul column
 * @method NilaiEkskul findOneByAnggotaRombelId(string $anggota_rombel_id) Return the first NilaiEkskul filtered by the anggota_rombel_id column
 * @method NilaiEkskul findOneByNilaiAngka(string $nilai_angka) Return the first NilaiEkskul filtered by the nilai_angka column
 * @method NilaiEkskul findOneByNilaiHuruf(string $nilai_huruf) Return the first NilaiEkskul filtered by the nilai_huruf column
 * @method NilaiEkskul findOneByKet(string $ket) Return the first NilaiEkskul filtered by the ket column
 * @method NilaiEkskul findOneByABeku(string $a_beku) Return the first NilaiEkskul filtered by the a_beku column
 * @method NilaiEkskul findOneByRaporKe(string $rapor_ke) Return the first NilaiEkskul filtered by the rapor_ke column
 * @method NilaiEkskul findOneByCreateDate(string $create_date) Return the first NilaiEkskul filtered by the create_date column
 * @method NilaiEkskul findOneByLastUpdate(string $last_update) Return the first NilaiEkskul filtered by the last_update column
 * @method NilaiEkskul findOneBySoftDelete(string $soft_delete) Return the first NilaiEkskul filtered by the soft_delete column
 * @method NilaiEkskul findOneByLastSync(string $last_sync) Return the first NilaiEkskul filtered by the last_sync column
 * @method NilaiEkskul findOneByUpdaterId(string $updater_id) Return the first NilaiEkskul filtered by the updater_id column
 *
 * @method array findByIdNilaiX(string $id_nilai_x) Return NilaiEkskul objects filtered by the id_nilai_x column
 * @method array findByIdKelasEkskul(string $id_kelas_ekskul) Return NilaiEkskul objects filtered by the id_kelas_ekskul column
 * @method array findByAnggotaRombelId(string $anggota_rombel_id) Return NilaiEkskul objects filtered by the anggota_rombel_id column
 * @method array findByNilaiAngka(string $nilai_angka) Return NilaiEkskul objects filtered by the nilai_angka column
 * @method array findByNilaiHuruf(string $nilai_huruf) Return NilaiEkskul objects filtered by the nilai_huruf column
 * @method array findByKet(string $ket) Return NilaiEkskul objects filtered by the ket column
 * @method array findByABeku(string $a_beku) Return NilaiEkskul objects filtered by the a_beku column
 * @method array findByRaporKe(string $rapor_ke) Return NilaiEkskul objects filtered by the rapor_ke column
 * @method array findByCreateDate(string $create_date) Return NilaiEkskul objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return NilaiEkskul objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return NilaiEkskul objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return NilaiEkskul objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return NilaiEkskul objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiEkskulQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseNilaiEkskulQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\NilaiEkskul', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new NilaiEkskulQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   NilaiEkskulQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return NilaiEkskulQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof NilaiEkskulQuery) {
            return $criteria;
        }
        $query = new NilaiEkskulQuery();
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
     * @return   NilaiEkskul|NilaiEkskul[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = NilaiEkskulPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(NilaiEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 NilaiEkskul A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdNilaiX($key, $con = null)
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
     * @return                 NilaiEkskul A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_nilai_x", "id_kelas_ekskul", "anggota_rombel_id", "nilai_angka", "nilai_huruf", "ket", "a_beku", "rapor_ke", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai"."nilai_ekskul" WHERE "id_nilai_x" = :p0';
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
            $obj = new NilaiEkskul();
            $obj->hydrate($row);
            NilaiEkskulPeer::addInstanceToPool($obj, (string) $key);
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
     * @return NilaiEkskul|NilaiEkskul[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|NilaiEkskul[]|mixed the list of results, formatted by the current formatter
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(NilaiEkskulPeer::ID_NILAI_X, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(NilaiEkskulPeer::ID_NILAI_X, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_nilai_x column
     *
     * Example usage:
     * <code>
     * $query->filterByIdNilaiX('fooValue');   // WHERE id_nilai_x = 'fooValue'
     * $query->filterByIdNilaiX('%fooValue%'); // WHERE id_nilai_x LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idNilaiX The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByIdNilaiX($idNilaiX = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idNilaiX)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idNilaiX)) {
                $idNilaiX = str_replace('*', '%', $idNilaiX);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::ID_NILAI_X, $idNilaiX, $comparison);
    }

    /**
     * Filter the query on the id_kelas_ekskul column
     *
     * Example usage:
     * <code>
     * $query->filterByIdKelasEkskul('fooValue');   // WHERE id_kelas_ekskul = 'fooValue'
     * $query->filterByIdKelasEkskul('%fooValue%'); // WHERE id_kelas_ekskul LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idKelasEkskul The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByIdKelasEkskul($idKelasEkskul = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idKelasEkskul)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idKelasEkskul)) {
                $idKelasEkskul = str_replace('*', '%', $idKelasEkskul);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::ID_KELAS_EKSKUL, $idKelasEkskul, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiEkskulPeer::ANGGOTA_ROMBEL_ID, $anggotaRombelId, $comparison);
    }

    /**
     * Filter the query on the nilai_angka column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiAngka(1234); // WHERE nilai_angka = 1234
     * $query->filterByNilaiAngka(array(12, 34)); // WHERE nilai_angka IN (12, 34)
     * $query->filterByNilaiAngka(array('min' => 12)); // WHERE nilai_angka >= 12
     * $query->filterByNilaiAngka(array('max' => 12)); // WHERE nilai_angka <= 12
     * </code>
     *
     * @param     mixed $nilaiAngka The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByNilaiAngka($nilaiAngka = null, $comparison = null)
    {
        if (is_array($nilaiAngka)) {
            $useMinMax = false;
            if (isset($nilaiAngka['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::NILAI_ANGKA, $nilaiAngka['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilaiAngka['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::NILAI_ANGKA, $nilaiAngka['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::NILAI_ANGKA, $nilaiAngka, $comparison);
    }

    /**
     * Filter the query on the nilai_huruf column
     *
     * Example usage:
     * <code>
     * $query->filterByNilaiHuruf('fooValue');   // WHERE nilai_huruf = 'fooValue'
     * $query->filterByNilaiHuruf('%fooValue%'); // WHERE nilai_huruf LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nilaiHuruf The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByNilaiHuruf($nilaiHuruf = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nilaiHuruf)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nilaiHuruf)) {
                $nilaiHuruf = str_replace('*', '%', $nilaiHuruf);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::NILAI_HURUF, $nilaiHuruf, $comparison);
    }

    /**
     * Filter the query on the ket column
     *
     * Example usage:
     * <code>
     * $query->filterByKet('fooValue');   // WHERE ket = 'fooValue'
     * $query->filterByKet('%fooValue%'); // WHERE ket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ket The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByKet($ket = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ket)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ket)) {
                $ket = str_replace('*', '%', $ket);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::KET, $ket, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByABeku($aBeku = null, $comparison = null)
    {
        if (is_array($aBeku)) {
            $useMinMax = false;
            if (isset($aBeku['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::A_BEKU, $aBeku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBeku['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::A_BEKU, $aBeku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::A_BEKU, $aBeku, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByRaporKe($raporKe = null, $comparison = null)
    {
        if (is_array($raporKe)) {
            $useMinMax = false;
            if (isset($raporKe['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::RAPOR_KE, $raporKe['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($raporKe['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::RAPOR_KE, $raporKe['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::RAPOR_KE, $raporKe, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(NilaiEkskulPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(NilaiEkskulPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(NilaiEkskulPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return NilaiEkskulQuery The current query, for fluid interface
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

        return $this->addUsingAlias(NilaiEkskulPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Exclude object from result
     *
     * @param   NilaiEkskul $nilaiEkskul Object to remove from the list of results
     *
     * @return NilaiEkskulQuery The current query, for fluid interface
     */
    public function prune($nilaiEkskul = null)
    {
        if ($nilaiEkskul) {
            $this->addUsingAlias(NilaiEkskulPeer::ID_NILAI_X, $nilaiEkskul->getIdNilaiX(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
