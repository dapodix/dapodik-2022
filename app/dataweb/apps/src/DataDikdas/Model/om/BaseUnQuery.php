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
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\Un;
use DataDikdas\Model\UnPeer;
use DataDikdas\Model\UnQuery;

/**
 * Base class that represents a query for the 'nilai.un' table.
 *
 * 
 *
 * @method UnQuery orderByUnId($order = Criteria::ASC) Order by the un_id column
 * @method UnQuery orderByRegistrasiId($order = Criteria::ASC) Order by the registrasi_id column
 * @method UnQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method UnQuery orderByUnTglDaftar($order = Criteria::ASC) Order by the un_tgl_daftar column
 * @method UnQuery orderByNomorUn($order = Criteria::ASC) Order by the nomor_un column
 * @method UnQuery orderByNoSkhun($order = Criteria::ASC) Order by the no_skhun column
 * @method UnQuery orderByNilai1($order = Criteria::ASC) Order by the nilai_1 column
 * @method UnQuery orderByNilai2($order = Criteria::ASC) Order by the nilai_2 column
 * @method UnQuery orderByNilai3($order = Criteria::ASC) Order by the nilai_3 column
 * @method UnQuery orderByNilai4($order = Criteria::ASC) Order by the nilai_4 column
 * @method UnQuery orderByNilai5($order = Criteria::ASC) Order by the nilai_5 column
 * @method UnQuery orderByNilai6($order = Criteria::ASC) Order by the nilai_6 column
 * @method UnQuery orderByNilai7($order = Criteria::ASC) Order by the nilai_7 column
 * @method UnQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method UnQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method UnQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method UnQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method UnQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method UnQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method UnQuery groupByUnId() Group by the un_id column
 * @method UnQuery groupByRegistrasiId() Group by the registrasi_id column
 * @method UnQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method UnQuery groupByUnTglDaftar() Group by the un_tgl_daftar column
 * @method UnQuery groupByNomorUn() Group by the nomor_un column
 * @method UnQuery groupByNoSkhun() Group by the no_skhun column
 * @method UnQuery groupByNilai1() Group by the nilai_1 column
 * @method UnQuery groupByNilai2() Group by the nilai_2 column
 * @method UnQuery groupByNilai3() Group by the nilai_3 column
 * @method UnQuery groupByNilai4() Group by the nilai_4 column
 * @method UnQuery groupByNilai5() Group by the nilai_5 column
 * @method UnQuery groupByNilai6() Group by the nilai_6 column
 * @method UnQuery groupByNilai7() Group by the nilai_7 column
 * @method UnQuery groupByTemplateId() Group by the template_id column
 * @method UnQuery groupByCreateDate() Group by the create_date column
 * @method UnQuery groupByLastUpdate() Group by the last_update column
 * @method UnQuery groupBySoftDelete() Group by the soft_delete column
 * @method UnQuery groupByLastSync() Group by the last_sync column
 * @method UnQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method UnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UnQuery leftJoinTemplateUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUn relation
 * @method UnQuery rightJoinTemplateUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUn relation
 * @method UnQuery innerJoinTemplateUn($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUn relation
 *
 * @method UnQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method UnQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method UnQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method Un findOne(PropelPDO $con = null) Return the first Un matching the query
 * @method Un findOneOrCreate(PropelPDO $con = null) Return the first Un matching the query, or a new Un object populated from the query conditions when no match is found
 *
 * @method Un findOneByRegistrasiId(string $registrasi_id) Return the first Un filtered by the registrasi_id column
 * @method Un findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first Un filtered by the tahun_ajaran_id column
 * @method Un findOneByUnTglDaftar(string $un_tgl_daftar) Return the first Un filtered by the un_tgl_daftar column
 * @method Un findOneByNomorUn(string $nomor_un) Return the first Un filtered by the nomor_un column
 * @method Un findOneByNoSkhun(string $no_skhun) Return the first Un filtered by the no_skhun column
 * @method Un findOneByNilai1(string $nilai_1) Return the first Un filtered by the nilai_1 column
 * @method Un findOneByNilai2(string $nilai_2) Return the first Un filtered by the nilai_2 column
 * @method Un findOneByNilai3(string $nilai_3) Return the first Un filtered by the nilai_3 column
 * @method Un findOneByNilai4(string $nilai_4) Return the first Un filtered by the nilai_4 column
 * @method Un findOneByNilai5(string $nilai_5) Return the first Un filtered by the nilai_5 column
 * @method Un findOneByNilai6(string $nilai_6) Return the first Un filtered by the nilai_6 column
 * @method Un findOneByNilai7(string $nilai_7) Return the first Un filtered by the nilai_7 column
 * @method Un findOneByTemplateId(string $template_id) Return the first Un filtered by the template_id column
 * @method Un findOneByCreateDate(string $create_date) Return the first Un filtered by the create_date column
 * @method Un findOneByLastUpdate(string $last_update) Return the first Un filtered by the last_update column
 * @method Un findOneBySoftDelete(string $soft_delete) Return the first Un filtered by the soft_delete column
 * @method Un findOneByLastSync(string $last_sync) Return the first Un filtered by the last_sync column
 * @method Un findOneByUpdaterId(string $updater_id) Return the first Un filtered by the updater_id column
 *
 * @method array findByUnId(string $un_id) Return Un objects filtered by the un_id column
 * @method array findByRegistrasiId(string $registrasi_id) Return Un objects filtered by the registrasi_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return Un objects filtered by the tahun_ajaran_id column
 * @method array findByUnTglDaftar(string $un_tgl_daftar) Return Un objects filtered by the un_tgl_daftar column
 * @method array findByNomorUn(string $nomor_un) Return Un objects filtered by the nomor_un column
 * @method array findByNoSkhun(string $no_skhun) Return Un objects filtered by the no_skhun column
 * @method array findByNilai1(string $nilai_1) Return Un objects filtered by the nilai_1 column
 * @method array findByNilai2(string $nilai_2) Return Un objects filtered by the nilai_2 column
 * @method array findByNilai3(string $nilai_3) Return Un objects filtered by the nilai_3 column
 * @method array findByNilai4(string $nilai_4) Return Un objects filtered by the nilai_4 column
 * @method array findByNilai5(string $nilai_5) Return Un objects filtered by the nilai_5 column
 * @method array findByNilai6(string $nilai_6) Return Un objects filtered by the nilai_6 column
 * @method array findByNilai7(string $nilai_7) Return Un objects filtered by the nilai_7 column
 * @method array findByTemplateId(string $template_id) Return Un objects filtered by the template_id column
 * @method array findByCreateDate(string $create_date) Return Un objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Un objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Un objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Un objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Un objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUnQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Un', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UnQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UnQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UnQuery) {
            return $criteria;
        }
        $query = new UnQuery();
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
     * @return   Un|Un[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UnPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Un A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByUnId($key, $con = null)
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
     * @return                 Un A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "un_id", "registrasi_id", "tahun_ajaran_id", "un_tgl_daftar", "nomor_un", "no_skhun", "nilai_1", "nilai_2", "nilai_3", "nilai_4", "nilai_5", "nilai_6", "nilai_7", "template_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "nilai"."un" WHERE "un_id" = :p0';
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
            $obj = new Un();
            $obj->hydrate($row);
            UnPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Un|Un[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Un[]|mixed the list of results, formatted by the current formatter
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
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(UnPeer::UN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(UnPeer::UN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the un_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnId('fooValue');   // WHERE un_id = 'fooValue'
     * $query->filterByUnId('%fooValue%'); // WHERE un_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByUnId($unId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unId)) {
                $unId = str_replace('*', '%', $unId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnPeer::UN_ID, $unId, $comparison);
    }

    /**
     * Filter the query on the registrasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByRegistrasiId('fooValue');   // WHERE registrasi_id = 'fooValue'
     * $query->filterByRegistrasiId('%fooValue%'); // WHERE registrasi_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $registrasiId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByRegistrasiId($registrasiId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($registrasiId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $registrasiId)) {
                $registrasiId = str_replace('*', '%', $registrasiId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnPeer::REGISTRASI_ID, $registrasiId, $comparison);
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
     * @see       filterByTahunAjaran()
     *
     * @param     mixed $tahunAjaranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(UnPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(UnPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the un_tgl_daftar column
     *
     * Example usage:
     * <code>
     * $query->filterByUnTglDaftar('2011-03-14'); // WHERE un_tgl_daftar = '2011-03-14'
     * $query->filterByUnTglDaftar('now'); // WHERE un_tgl_daftar = '2011-03-14'
     * $query->filterByUnTglDaftar(array('max' => 'yesterday')); // WHERE un_tgl_daftar > '2011-03-13'
     * </code>
     *
     * @param     mixed $unTglDaftar The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByUnTglDaftar($unTglDaftar = null, $comparison = null)
    {
        if (is_array($unTglDaftar)) {
            $useMinMax = false;
            if (isset($unTglDaftar['min'])) {
                $this->addUsingAlias(UnPeer::UN_TGL_DAFTAR, $unTglDaftar['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($unTglDaftar['max'])) {
                $this->addUsingAlias(UnPeer::UN_TGL_DAFTAR, $unTglDaftar['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::UN_TGL_DAFTAR, $unTglDaftar, $comparison);
    }

    /**
     * Filter the query on the nomor_un column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorUn('fooValue');   // WHERE nomor_un = 'fooValue'
     * $query->filterByNomorUn('%fooValue%'); // WHERE nomor_un LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorUn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNomorUn($nomorUn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorUn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorUn)) {
                $nomorUn = str_replace('*', '%', $nomorUn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnPeer::NOMOR_UN, $nomorUn, $comparison);
    }

    /**
     * Filter the query on the no_skhun column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSkhun('fooValue');   // WHERE no_skhun = 'fooValue'
     * $query->filterByNoSkhun('%fooValue%'); // WHERE no_skhun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSkhun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNoSkhun($noSkhun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSkhun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSkhun)) {
                $noSkhun = str_replace('*', '%', $noSkhun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnPeer::NO_SKHUN, $noSkhun, $comparison);
    }

    /**
     * Filter the query on the nilai_1 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai1(1234); // WHERE nilai_1 = 1234
     * $query->filterByNilai1(array(12, 34)); // WHERE nilai_1 IN (12, 34)
     * $query->filterByNilai1(array('min' => 12)); // WHERE nilai_1 >= 12
     * $query->filterByNilai1(array('max' => 12)); // WHERE nilai_1 <= 12
     * </code>
     *
     * @param     mixed $nilai1 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai1($nilai1 = null, $comparison = null)
    {
        if (is_array($nilai1)) {
            $useMinMax = false;
            if (isset($nilai1['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_1, $nilai1['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai1['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_1, $nilai1['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_1, $nilai1, $comparison);
    }

    /**
     * Filter the query on the nilai_2 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai2(1234); // WHERE nilai_2 = 1234
     * $query->filterByNilai2(array(12, 34)); // WHERE nilai_2 IN (12, 34)
     * $query->filterByNilai2(array('min' => 12)); // WHERE nilai_2 >= 12
     * $query->filterByNilai2(array('max' => 12)); // WHERE nilai_2 <= 12
     * </code>
     *
     * @param     mixed $nilai2 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai2($nilai2 = null, $comparison = null)
    {
        if (is_array($nilai2)) {
            $useMinMax = false;
            if (isset($nilai2['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_2, $nilai2['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai2['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_2, $nilai2['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_2, $nilai2, $comparison);
    }

    /**
     * Filter the query on the nilai_3 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai3(1234); // WHERE nilai_3 = 1234
     * $query->filterByNilai3(array(12, 34)); // WHERE nilai_3 IN (12, 34)
     * $query->filterByNilai3(array('min' => 12)); // WHERE nilai_3 >= 12
     * $query->filterByNilai3(array('max' => 12)); // WHERE nilai_3 <= 12
     * </code>
     *
     * @param     mixed $nilai3 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai3($nilai3 = null, $comparison = null)
    {
        if (is_array($nilai3)) {
            $useMinMax = false;
            if (isset($nilai3['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_3, $nilai3['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai3['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_3, $nilai3['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_3, $nilai3, $comparison);
    }

    /**
     * Filter the query on the nilai_4 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai4(1234); // WHERE nilai_4 = 1234
     * $query->filterByNilai4(array(12, 34)); // WHERE nilai_4 IN (12, 34)
     * $query->filterByNilai4(array('min' => 12)); // WHERE nilai_4 >= 12
     * $query->filterByNilai4(array('max' => 12)); // WHERE nilai_4 <= 12
     * </code>
     *
     * @param     mixed $nilai4 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai4($nilai4 = null, $comparison = null)
    {
        if (is_array($nilai4)) {
            $useMinMax = false;
            if (isset($nilai4['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_4, $nilai4['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai4['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_4, $nilai4['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_4, $nilai4, $comparison);
    }

    /**
     * Filter the query on the nilai_5 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai5(1234); // WHERE nilai_5 = 1234
     * $query->filterByNilai5(array(12, 34)); // WHERE nilai_5 IN (12, 34)
     * $query->filterByNilai5(array('min' => 12)); // WHERE nilai_5 >= 12
     * $query->filterByNilai5(array('max' => 12)); // WHERE nilai_5 <= 12
     * </code>
     *
     * @param     mixed $nilai5 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai5($nilai5 = null, $comparison = null)
    {
        if (is_array($nilai5)) {
            $useMinMax = false;
            if (isset($nilai5['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_5, $nilai5['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai5['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_5, $nilai5['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_5, $nilai5, $comparison);
    }

    /**
     * Filter the query on the nilai_6 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai6(1234); // WHERE nilai_6 = 1234
     * $query->filterByNilai6(array(12, 34)); // WHERE nilai_6 IN (12, 34)
     * $query->filterByNilai6(array('min' => 12)); // WHERE nilai_6 >= 12
     * $query->filterByNilai6(array('max' => 12)); // WHERE nilai_6 <= 12
     * </code>
     *
     * @param     mixed $nilai6 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai6($nilai6 = null, $comparison = null)
    {
        if (is_array($nilai6)) {
            $useMinMax = false;
            if (isset($nilai6['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_6, $nilai6['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai6['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_6, $nilai6['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_6, $nilai6, $comparison);
    }

    /**
     * Filter the query on the nilai_7 column
     *
     * Example usage:
     * <code>
     * $query->filterByNilai7(1234); // WHERE nilai_7 = 1234
     * $query->filterByNilai7(array(12, 34)); // WHERE nilai_7 IN (12, 34)
     * $query->filterByNilai7(array('min' => 12)); // WHERE nilai_7 >= 12
     * $query->filterByNilai7(array('max' => 12)); // WHERE nilai_7 <= 12
     * </code>
     *
     * @param     mixed $nilai7 The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByNilai7($nilai7 = null, $comparison = null)
    {
        if (is_array($nilai7)) {
            $useMinMax = false;
            if (isset($nilai7['min'])) {
                $this->addUsingAlias(UnPeer::NILAI_7, $nilai7['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nilai7['max'])) {
                $this->addUsingAlias(UnPeer::NILAI_7, $nilai7['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::NILAI_7, $nilai7, $comparison);
    }

    /**
     * Filter the query on the template_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateId('fooValue');   // WHERE template_id = 'fooValue'
     * $query->filterByTemplateId('%fooValue%'); // WHERE template_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $templateId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByTemplateId($templateId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($templateId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $templateId)) {
                $templateId = str_replace('*', '%', $templateId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnPeer::TEMPLATE_ID, $templateId, $comparison);
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
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(UnPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(UnPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(UnPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(UnPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return UnQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(UnPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(UnPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return UnQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(UnPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(UnPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return UnQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UnPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUn($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(UnPeer::TEMPLATE_ID, $templateUn->getTemplateId(), $comparison);
        } elseif ($templateUn instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnPeer::TEMPLATE_ID, $templateUn->toKeyValue('PrimaryKey', 'TemplateId'), $comparison);
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
     * @return UnQuery The current query, for fluid interface
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
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(UnPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
        } else {
            throw new PropelException('filterByTahunAjaran() only accepts arguments of type TahunAjaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TahunAjaran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function joinTahunAjaran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TahunAjaran');

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
            $this->addJoinObject($join, 'TahunAjaran');
        }

        return $this;
    }

    /**
     * Use the TahunAjaran relation TahunAjaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TahunAjaranQuery A secondary query class using the current class as primary query
     */
    public function useTahunAjaranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTahunAjaran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TahunAjaran', '\DataDikdas\Model\TahunAjaranQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Un $un Object to remove from the list of results
     *
     * @return UnQuery The current query, for fluid interface
     */
    public function prune($un = null)
    {
        if ($un) {
            $this->addUsingAlias(UnPeer::UN_ID, $un->getUnId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
