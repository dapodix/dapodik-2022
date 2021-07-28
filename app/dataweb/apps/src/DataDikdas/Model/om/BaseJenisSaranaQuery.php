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
use DataDikdas\Model\Alat;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\JenisSaranaQuery;
use DataDikdas\Model\PemakaiSarana;
use DataDikdas\Model\StandarSarana;

/**
 * Base class that represents a query for the 'ref.jenis_sarana' table.
 *
 * 
 *
 * @method JenisSaranaQuery orderByJenisSaranaId($order = Criteria::ASC) Order by the jenis_sarana_id column
 * @method JenisSaranaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisSaranaQuery orderByKelompok($order = Criteria::ASC) Order by the kelompok column
 * @method JenisSaranaQuery orderByPerluPenempatan($order = Criteria::ASC) Order by the perlu_penempatan column
 * @method JenisSaranaQuery orderByKeterangan($order = Criteria::ASC) Order by the keterangan column
 * @method JenisSaranaQuery orderByAAlat($order = Criteria::ASC) Order by the a_alat column
 * @method JenisSaranaQuery orderByAAngkutan($order = Criteria::ASC) Order by the a_angkutan column
 * @method JenisSaranaQuery orderBySpmQtyMinPerSiswa($order = Criteria::ASC) Order by the spm_qty_min_per_siswa column
 * @method JenisSaranaQuery orderBySpmQtyMinPerSekolah($order = Criteria::ASC) Order by the spm_qty_min_per_sekolah column
 * @method JenisSaranaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisSaranaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisSaranaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisSaranaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisSaranaQuery groupByJenisSaranaId() Group by the jenis_sarana_id column
 * @method JenisSaranaQuery groupByNama() Group by the nama column
 * @method JenisSaranaQuery groupByKelompok() Group by the kelompok column
 * @method JenisSaranaQuery groupByPerluPenempatan() Group by the perlu_penempatan column
 * @method JenisSaranaQuery groupByKeterangan() Group by the keterangan column
 * @method JenisSaranaQuery groupByAAlat() Group by the a_alat column
 * @method JenisSaranaQuery groupByAAngkutan() Group by the a_angkutan column
 * @method JenisSaranaQuery groupBySpmQtyMinPerSiswa() Group by the spm_qty_min_per_siswa column
 * @method JenisSaranaQuery groupBySpmQtyMinPerSekolah() Group by the spm_qty_min_per_sekolah column
 * @method JenisSaranaQuery groupByCreateDate() Group by the create_date column
 * @method JenisSaranaQuery groupByLastUpdate() Group by the last_update column
 * @method JenisSaranaQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisSaranaQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisSaranaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisSaranaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisSaranaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisSaranaQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method JenisSaranaQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method JenisSaranaQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method JenisSaranaQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method JenisSaranaQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method JenisSaranaQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method JenisSaranaQuery leftJoinPemakaiSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the PemakaiSarana relation
 * @method JenisSaranaQuery rightJoinPemakaiSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PemakaiSarana relation
 * @method JenisSaranaQuery innerJoinPemakaiSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the PemakaiSarana relation
 *
 * @method JenisSaranaQuery leftJoinStandarSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the StandarSarana relation
 * @method JenisSaranaQuery rightJoinStandarSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StandarSarana relation
 * @method JenisSaranaQuery innerJoinStandarSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the StandarSarana relation
 *
 * @method JenisSarana findOne(PropelPDO $con = null) Return the first JenisSarana matching the query
 * @method JenisSarana findOneOrCreate(PropelPDO $con = null) Return the first JenisSarana matching the query, or a new JenisSarana object populated from the query conditions when no match is found
 *
 * @method JenisSarana findOneByNama(string $nama) Return the first JenisSarana filtered by the nama column
 * @method JenisSarana findOneByKelompok(string $kelompok) Return the first JenisSarana filtered by the kelompok column
 * @method JenisSarana findOneByPerluPenempatan(string $perlu_penempatan) Return the first JenisSarana filtered by the perlu_penempatan column
 * @method JenisSarana findOneByKeterangan(string $keterangan) Return the first JenisSarana filtered by the keterangan column
 * @method JenisSarana findOneByAAlat(string $a_alat) Return the first JenisSarana filtered by the a_alat column
 * @method JenisSarana findOneByAAngkutan(string $a_angkutan) Return the first JenisSarana filtered by the a_angkutan column
 * @method JenisSarana findOneBySpmQtyMinPerSiswa(string $spm_qty_min_per_siswa) Return the first JenisSarana filtered by the spm_qty_min_per_siswa column
 * @method JenisSarana findOneBySpmQtyMinPerSekolah(string $spm_qty_min_per_sekolah) Return the first JenisSarana filtered by the spm_qty_min_per_sekolah column
 * @method JenisSarana findOneByCreateDate(string $create_date) Return the first JenisSarana filtered by the create_date column
 * @method JenisSarana findOneByLastUpdate(string $last_update) Return the first JenisSarana filtered by the last_update column
 * @method JenisSarana findOneByExpiredDate(string $expired_date) Return the first JenisSarana filtered by the expired_date column
 * @method JenisSarana findOneByLastSync(string $last_sync) Return the first JenisSarana filtered by the last_sync column
 *
 * @method array findByJenisSaranaId(int $jenis_sarana_id) Return JenisSarana objects filtered by the jenis_sarana_id column
 * @method array findByNama(string $nama) Return JenisSarana objects filtered by the nama column
 * @method array findByKelompok(string $kelompok) Return JenisSarana objects filtered by the kelompok column
 * @method array findByPerluPenempatan(string $perlu_penempatan) Return JenisSarana objects filtered by the perlu_penempatan column
 * @method array findByKeterangan(string $keterangan) Return JenisSarana objects filtered by the keterangan column
 * @method array findByAAlat(string $a_alat) Return JenisSarana objects filtered by the a_alat column
 * @method array findByAAngkutan(string $a_angkutan) Return JenisSarana objects filtered by the a_angkutan column
 * @method array findBySpmQtyMinPerSiswa(string $spm_qty_min_per_siswa) Return JenisSarana objects filtered by the spm_qty_min_per_siswa column
 * @method array findBySpmQtyMinPerSekolah(string $spm_qty_min_per_sekolah) Return JenisSarana objects filtered by the spm_qty_min_per_sekolah column
 * @method array findByCreateDate(string $create_date) Return JenisSarana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisSarana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisSarana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisSarana objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisSaranaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisSaranaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisSarana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisSaranaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisSaranaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisSaranaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisSaranaQuery) {
            return $criteria;
        }
        $query = new JenisSaranaQuery();
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
     * @return   JenisSarana|JenisSarana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisSaranaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisSarana A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisSaranaId($key, $con = null)
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
     * @return                 JenisSarana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_sarana_id", "nama", "kelompok", "perlu_penempatan", "keterangan", "a_alat", "a_angkutan", "spm_qty_min_per_siswa", "spm_qty_min_per_sekolah", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_sarana" WHERE "jenis_sarana_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new JenisSarana();
            $obj->hydrate($row);
            JenisSaranaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisSarana|JenisSarana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisSarana[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_sarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisSaranaId(1234); // WHERE jenis_sarana_id = 1234
     * $query->filterByJenisSaranaId(array(12, 34)); // WHERE jenis_sarana_id IN (12, 34)
     * $query->filterByJenisSaranaId(array('min' => 12)); // WHERE jenis_sarana_id >= 12
     * $query->filterByJenisSaranaId(array('max' => 12)); // WHERE jenis_sarana_id <= 12
     * </code>
     *
     * @param     mixed $jenisSaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByJenisSaranaId($jenisSaranaId = null, $comparison = null)
    {
        if (is_array($jenisSaranaId)) {
            $useMinMax = false;
            if (isset($jenisSaranaId['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisSaranaId['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $jenisSaranaId, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisSaranaPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the kelompok column
     *
     * Example usage:
     * <code>
     * $query->filterByKelompok('fooValue');   // WHERE kelompok = 'fooValue'
     * $query->filterByKelompok('%fooValue%'); // WHERE kelompok LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kelompok The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByKelompok($kelompok = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kelompok)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kelompok)) {
                $kelompok = str_replace('*', '%', $kelompok);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::KELOMPOK, $kelompok, $comparison);
    }

    /**
     * Filter the query on the perlu_penempatan column
     *
     * Example usage:
     * <code>
     * $query->filterByPerluPenempatan(1234); // WHERE perlu_penempatan = 1234
     * $query->filterByPerluPenempatan(array(12, 34)); // WHERE perlu_penempatan IN (12, 34)
     * $query->filterByPerluPenempatan(array('min' => 12)); // WHERE perlu_penempatan >= 12
     * $query->filterByPerluPenempatan(array('max' => 12)); // WHERE perlu_penempatan <= 12
     * </code>
     *
     * @param     mixed $perluPenempatan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByPerluPenempatan($perluPenempatan = null, $comparison = null)
    {
        if (is_array($perluPenempatan)) {
            $useMinMax = false;
            if (isset($perluPenempatan['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::PERLU_PENEMPATAN, $perluPenempatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($perluPenempatan['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::PERLU_PENEMPATAN, $perluPenempatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::PERLU_PENEMPATAN, $perluPenempatan, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisSaranaPeer::KETERANGAN, $keterangan, $comparison);
    }

    /**
     * Filter the query on the a_alat column
     *
     * Example usage:
     * <code>
     * $query->filterByAAlat(1234); // WHERE a_alat = 1234
     * $query->filterByAAlat(array(12, 34)); // WHERE a_alat IN (12, 34)
     * $query->filterByAAlat(array('min' => 12)); // WHERE a_alat >= 12
     * $query->filterByAAlat(array('max' => 12)); // WHERE a_alat <= 12
     * </code>
     *
     * @param     mixed $aAlat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByAAlat($aAlat = null, $comparison = null)
    {
        if (is_array($aAlat)) {
            $useMinMax = false;
            if (isset($aAlat['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::A_ALAT, $aAlat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aAlat['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::A_ALAT, $aAlat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::A_ALAT, $aAlat, $comparison);
    }

    /**
     * Filter the query on the a_angkutan column
     *
     * Example usage:
     * <code>
     * $query->filterByAAngkutan(1234); // WHERE a_angkutan = 1234
     * $query->filterByAAngkutan(array(12, 34)); // WHERE a_angkutan IN (12, 34)
     * $query->filterByAAngkutan(array('min' => 12)); // WHERE a_angkutan >= 12
     * $query->filterByAAngkutan(array('max' => 12)); // WHERE a_angkutan <= 12
     * </code>
     *
     * @param     mixed $aAngkutan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByAAngkutan($aAngkutan = null, $comparison = null)
    {
        if (is_array($aAngkutan)) {
            $useMinMax = false;
            if (isset($aAngkutan['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::A_ANGKUTAN, $aAngkutan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aAngkutan['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::A_ANGKUTAN, $aAngkutan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::A_ANGKUTAN, $aAngkutan, $comparison);
    }

    /**
     * Filter the query on the spm_qty_min_per_siswa column
     *
     * Example usage:
     * <code>
     * $query->filterBySpmQtyMinPerSiswa(1234); // WHERE spm_qty_min_per_siswa = 1234
     * $query->filterBySpmQtyMinPerSiswa(array(12, 34)); // WHERE spm_qty_min_per_siswa IN (12, 34)
     * $query->filterBySpmQtyMinPerSiswa(array('min' => 12)); // WHERE spm_qty_min_per_siswa >= 12
     * $query->filterBySpmQtyMinPerSiswa(array('max' => 12)); // WHERE spm_qty_min_per_siswa <= 12
     * </code>
     *
     * @param     mixed $spmQtyMinPerSiswa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterBySpmQtyMinPerSiswa($spmQtyMinPerSiswa = null, $comparison = null)
    {
        if (is_array($spmQtyMinPerSiswa)) {
            $useMinMax = false;
            if (isset($spmQtyMinPerSiswa['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spmQtyMinPerSiswa['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA, $spmQtyMinPerSiswa, $comparison);
    }

    /**
     * Filter the query on the spm_qty_min_per_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterBySpmQtyMinPerSekolah(1234); // WHERE spm_qty_min_per_sekolah = 1234
     * $query->filterBySpmQtyMinPerSekolah(array(12, 34)); // WHERE spm_qty_min_per_sekolah IN (12, 34)
     * $query->filterBySpmQtyMinPerSekolah(array('min' => 12)); // WHERE spm_qty_min_per_sekolah >= 12
     * $query->filterBySpmQtyMinPerSekolah(array('max' => 12)); // WHERE spm_qty_min_per_sekolah <= 12
     * </code>
     *
     * @param     mixed $spmQtyMinPerSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterBySpmQtyMinPerSekolah($spmQtyMinPerSekolah = null, $comparison = null)
    {
        if (is_array($spmQtyMinPerSekolah)) {
            $useMinMax = false;
            if (isset($spmQtyMinPerSekolah['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($spmQtyMinPerSekolah['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH, $spmQtyMinPerSekolah, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisSaranaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisSaranaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisSaranaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $alat->getJenisSaranaId(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            return $this
                ->useAlatQuery()
                ->filterByPrimaryKeys($alat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

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
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related Angkutan object
     *
     * @param   Angkutan|PropelObjectCollection $angkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $angkutan->getJenisSaranaId(), $comparison);
        } elseif ($angkutan instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanQuery()
                ->filterByPrimaryKeys($angkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutan() only accepts arguments of type Angkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Angkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Angkutan');

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
            $this->addJoinObject($join, 'Angkutan');
        }

        return $this;
    }

    /**
     * Use the Angkutan relation Angkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related PemakaiSarana object
     *
     * @param   PemakaiSarana|PropelObjectCollection $pemakaiSarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPemakaiSarana($pemakaiSarana, $comparison = null)
    {
        if ($pemakaiSarana instanceof PemakaiSarana) {
            return $this
                ->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $pemakaiSarana->getJenisSaranaId(), $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
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
     * @return                 JenisSaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStandarSarana($standarSarana, $comparison = null)
    {
        if ($standarSarana instanceof StandarSarana) {
            return $this
                ->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $standarSarana->getJenisSaranaId(), $comparison);
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
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function joinStandarSarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useStandarSaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStandarSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StandarSarana', '\DataDikdas\Model\StandarSaranaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisSarana $jenisSarana Object to remove from the list of results
     *
     * @return JenisSaranaQuery The current query, for fluid interface
     */
    public function prune($jenisSarana = null)
    {
        if ($jenisSarana) {
            $this->addUsingAlias(JenisSaranaPeer::JENIS_SARANA_ID, $jenisSarana->getJenisSaranaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
