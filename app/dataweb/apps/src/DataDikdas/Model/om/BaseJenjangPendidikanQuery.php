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
use DataDikdas\Model\Anak;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TingkatPendidikan;

/**
 * Base class that represents a query for the 'ref.jenjang_pendidikan' table.
 *
 * 
 *
 * @method JenjangPendidikanQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method JenjangPendidikanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenjangPendidikanQuery orderByJenjangLembaga($order = Criteria::ASC) Order by the jenjang_lembaga column
 * @method JenjangPendidikanQuery orderByJenjangOrang($order = Criteria::ASC) Order by the jenjang_orang column
 * @method JenjangPendidikanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenjangPendidikanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenjangPendidikanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenjangPendidikanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenjangPendidikanQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method JenjangPendidikanQuery groupByNama() Group by the nama column
 * @method JenjangPendidikanQuery groupByJenjangLembaga() Group by the jenjang_lembaga column
 * @method JenjangPendidikanQuery groupByJenjangOrang() Group by the jenjang_orang column
 * @method JenjangPendidikanQuery groupByCreateDate() Group by the create_date column
 * @method JenjangPendidikanQuery groupByLastUpdate() Group by the last_update column
 * @method JenjangPendidikanQuery groupByExpiredDate() Group by the expired_date column
 * @method JenjangPendidikanQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenjangPendidikanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenjangPendidikanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenjangPendidikanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenjangPendidikanQuery leftJoinAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the Anak relation
 * @method JenjangPendidikanQuery rightJoinAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Anak relation
 * @method JenjangPendidikanQuery innerJoinAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the Anak relation
 *
 * @method JenjangPendidikanQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method JenjangPendidikanQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method JenjangPendidikanQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method JenjangPendidikanQuery leftJoinKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kurikulum relation
 * @method JenjangPendidikanQuery rightJoinKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kurikulum relation
 * @method JenjangPendidikanQuery innerJoinKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the Kurikulum relation
 *
 * @method JenjangPendidikanQuery leftJoinPesertaDidikRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanIbu relation
 * @method JenjangPendidikanQuery rightJoinPesertaDidikRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanIbu relation
 * @method JenjangPendidikanQuery innerJoinPesertaDidikRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanIbu relation
 *
 * @method JenjangPendidikanQuery leftJoinPesertaDidikRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanAyah relation
 * @method JenjangPendidikanQuery rightJoinPesertaDidikRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanAyah relation
 * @method JenjangPendidikanQuery innerJoinPesertaDidikRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanAyah relation
 *
 * @method JenjangPendidikanQuery leftJoinPesertaDidikRelatedByJenjangPendidikanWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanWali relation
 * @method JenjangPendidikanQuery rightJoinPesertaDidikRelatedByJenjangPendidikanWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanWali relation
 * @method JenjangPendidikanQuery innerJoinPesertaDidikRelatedByJenjangPendidikanWali($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanWali relation
 *
 * @method JenjangPendidikanQuery leftJoinRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKerja relation
 * @method JenjangPendidikanQuery rightJoinRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKerja relation
 * @method JenjangPendidikanQuery innerJoinRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKerja relation
 *
 * @method JenjangPendidikanQuery leftJoinRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyPendFormal relation
 * @method JenjangPendidikanQuery rightJoinRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyPendFormal relation
 * @method JenjangPendidikanQuery innerJoinRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyPendFormal relation
 *
 * @method JenjangPendidikanQuery leftJoinTemplateUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateUn relation
 * @method JenjangPendidikanQuery rightJoinTemplateUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateUn relation
 * @method JenjangPendidikanQuery innerJoinTemplateUn($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateUn relation
 *
 * @method JenjangPendidikanQuery leftJoinTingkatPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatPendidikan relation
 * @method JenjangPendidikanQuery rightJoinTingkatPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatPendidikan relation
 * @method JenjangPendidikanQuery innerJoinTingkatPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatPendidikan relation
 *
 * @method JenjangPendidikan findOne(PropelPDO $con = null) Return the first JenjangPendidikan matching the query
 * @method JenjangPendidikan findOneOrCreate(PropelPDO $con = null) Return the first JenjangPendidikan matching the query, or a new JenjangPendidikan object populated from the query conditions when no match is found
 *
 * @method JenjangPendidikan findOneByNama(string $nama) Return the first JenjangPendidikan filtered by the nama column
 * @method JenjangPendidikan findOneByJenjangLembaga(string $jenjang_lembaga) Return the first JenjangPendidikan filtered by the jenjang_lembaga column
 * @method JenjangPendidikan findOneByJenjangOrang(string $jenjang_orang) Return the first JenjangPendidikan filtered by the jenjang_orang column
 * @method JenjangPendidikan findOneByCreateDate(string $create_date) Return the first JenjangPendidikan filtered by the create_date column
 * @method JenjangPendidikan findOneByLastUpdate(string $last_update) Return the first JenjangPendidikan filtered by the last_update column
 * @method JenjangPendidikan findOneByExpiredDate(string $expired_date) Return the first JenjangPendidikan filtered by the expired_date column
 * @method JenjangPendidikan findOneByLastSync(string $last_sync) Return the first JenjangPendidikan filtered by the last_sync column
 *
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return JenjangPendidikan objects filtered by the jenjang_pendidikan_id column
 * @method array findByNama(string $nama) Return JenjangPendidikan objects filtered by the nama column
 * @method array findByJenjangLembaga(string $jenjang_lembaga) Return JenjangPendidikan objects filtered by the jenjang_lembaga column
 * @method array findByJenjangOrang(string $jenjang_orang) Return JenjangPendidikan objects filtered by the jenjang_orang column
 * @method array findByCreateDate(string $create_date) Return JenjangPendidikan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenjangPendidikan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenjangPendidikan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenjangPendidikan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenjangPendidikanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenjangPendidikanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenjangPendidikan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenjangPendidikanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenjangPendidikanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenjangPendidikanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenjangPendidikanQuery) {
            return $criteria;
        }
        $query = new JenjangPendidikanQuery();
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
     * @return   JenjangPendidikan|JenjangPendidikan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenjangPendidikanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenjangPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenjangPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenjangPendidikanId($key, $con = null)
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
     * @return                 JenjangPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenjang_pendidikan_id", "nama", "jenjang_lembaga", "jenjang_orang", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenjang_pendidikan" WHERE "jenjang_pendidikan_id" = :p0';
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
            $obj = new JenjangPendidikan();
            $obj->hydrate($row);
            JenjangPendidikanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenjangPendidikan|JenjangPendidikan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenjangPendidikan[]|mixed the list of results, formatted by the current formatter
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $keys, Criteria::IN);
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
     * @param     mixed $jenjangPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenjangPendidikanPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the jenjang_lembaga column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangLembaga(1234); // WHERE jenjang_lembaga = 1234
     * $query->filterByJenjangLembaga(array(12, 34)); // WHERE jenjang_lembaga IN (12, 34)
     * $query->filterByJenjangLembaga(array('min' => 12)); // WHERE jenjang_lembaga >= 12
     * $query->filterByJenjangLembaga(array('max' => 12)); // WHERE jenjang_lembaga <= 12
     * </code>
     *
     * @param     mixed $jenjangLembaga The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangLembaga($jenjangLembaga = null, $comparison = null)
    {
        if (is_array($jenjangLembaga)) {
            $useMinMax = false;
            if (isset($jenjangLembaga['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_LEMBAGA, $jenjangLembaga['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangLembaga['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_LEMBAGA, $jenjangLembaga['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_LEMBAGA, $jenjangLembaga, $comparison);
    }

    /**
     * Filter the query on the jenjang_orang column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangOrang(1234); // WHERE jenjang_orang = 1234
     * $query->filterByJenjangOrang(array(12, 34)); // WHERE jenjang_orang IN (12, 34)
     * $query->filterByJenjangOrang(array('min' => 12)); // WHERE jenjang_orang >= 12
     * $query->filterByJenjangOrang(array('max' => 12)); // WHERE jenjang_orang <= 12
     * </code>
     *
     * @param     mixed $jenjangOrang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangOrang($jenjangOrang = null, $comparison = null)
    {
        if (is_array($jenjangOrang)) {
            $useMinMax = false;
            if (isset($jenjangOrang['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_ORANG, $jenjangOrang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangOrang['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_ORANG, $jenjangOrang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_ORANG, $jenjangOrang, $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenjangPendidikanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenjangPendidikanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Anak object
     *
     * @param   Anak|PropelObjectCollection $anak  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnak($anak, $comparison = null)
    {
        if ($anak instanceof Anak) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $anak->getJenjangPendidikanId(), $comparison);
        } elseif ($anak instanceof PropelObjectCollection) {
            return $this
                ->useAnakQuery()
                ->filterByPrimaryKeys($anak->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnak() only accepts arguments of type Anak or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Anak relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinAnak($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Anak');

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
            $this->addJoinObject($join, 'Anak');
        }

        return $this;
    }

    /**
     * Use the Anak relation Anak object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnakQuery A secondary query class using the current class as primary query
     */
    public function useAnakQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnak($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Anak', '\DataDikdas\Model\AnakQuery');
    }

    /**
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jurusan->getJenjangPendidikanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            return $this
                ->useJurusanQuery()
                ->filterByPrimaryKeys($jurusan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByJurusan() only accepts arguments of type Jurusan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Jurusan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinJurusan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Jurusan');

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
            $this->addJoinObject($join, 'Jurusan');
        }

        return $this;
    }

    /**
     * Use the Jurusan relation Jurusan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JurusanQuery A secondary query class using the current class as primary query
     */
    public function useJurusanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJurusan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Jurusan', '\DataDikdas\Model\JurusanQuery');
    }

    /**
     * Filter the query by a related Kurikulum object
     *
     * @param   Kurikulum|PropelObjectCollection $kurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKurikulum($kurikulum, $comparison = null)
    {
        if ($kurikulum instanceof Kurikulum) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $kurikulum->getJenjangPendidikanId(), $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kurikulum', '\DataDikdas\Model\KurikulumQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByJenjangPendidikanIbu($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $pesertaDidik->getJenjangPendidikanIbu(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByJenjangPendidikanIbuQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByJenjangPendidikanIbu() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByJenjangPendidikanIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByJenjangPendidikanIbu');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByJenjangPendidikanIbu');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByJenjangPendidikanIbu relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByJenjangPendidikanIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByJenjangPendidikanIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByJenjangPendidikanIbu', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByJenjangPendidikanAyah($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $pesertaDidik->getJenjangPendidikanAyah(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByJenjangPendidikanAyahQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByJenjangPendidikanAyah() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByJenjangPendidikanAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByJenjangPendidikanAyah');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByJenjangPendidikanAyah');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByJenjangPendidikanAyah relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByJenjangPendidikanAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByJenjangPendidikanAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByJenjangPendidikanAyah', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related PesertaDidik object
     *
     * @param   PesertaDidik|PropelObjectCollection $pesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikRelatedByJenjangPendidikanWali($pesertaDidik, $comparison = null)
    {
        if ($pesertaDidik instanceof PesertaDidik) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $pesertaDidik->getJenjangPendidikanWali(), $comparison);
        } elseif ($pesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikRelatedByJenjangPendidikanWaliQuery()
                ->filterByPrimaryKeys($pesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikRelatedByJenjangPendidikanWali() only accepts arguments of type PesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikRelatedByJenjangPendidikanWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinPesertaDidikRelatedByJenjangPendidikanWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikRelatedByJenjangPendidikanWali');

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
            $this->addJoinObject($join, 'PesertaDidikRelatedByJenjangPendidikanWali');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikRelatedByJenjangPendidikanWali relation PesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikRelatedByJenjangPendidikanWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikRelatedByJenjangPendidikanWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikRelatedByJenjangPendidikanWali', '\DataDikdas\Model\PesertaDidikQuery');
    }

    /**
     * Filter the query by a related RwyKerja object
     *
     * @param   RwyKerja|PropelObjectCollection $rwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKerja($rwyKerja, $comparison = null)
    {
        if ($rwyKerja instanceof RwyKerja) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $rwyKerja->getJenjangPendidikanId(), $comparison);
        } elseif ($rwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useRwyKerjaQuery()
                ->filterByPrimaryKeys($rwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKerja() only accepts arguments of type RwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinRwyKerja($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKerja');

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
            $this->addJoinObject($join, 'RwyKerja');
        }

        return $this;
    }

    /**
     * Use the RwyKerja relation RwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useRwyKerjaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKerja', '\DataDikdas\Model\RwyKerjaQuery');
    }

    /**
     * Filter the query by a related RwyPendFormal object
     *
     * @param   RwyPendFormal|PropelObjectCollection $rwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyPendFormal($rwyPendFormal, $comparison = null)
    {
        if ($rwyPendFormal instanceof RwyPendFormal) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $rwyPendFormal->getJenjangPendidikanId(), $comparison);
        } elseif ($rwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useRwyPendFormalQuery()
                ->filterByPrimaryKeys($rwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyPendFormal() only accepts arguments of type RwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyPendFormal');

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
            $this->addJoinObject($join, 'RwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the RwyPendFormal relation RwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyPendFormal', '\DataDikdas\Model\RwyPendFormalQuery');
    }

    /**
     * Filter the query by a related TemplateUn object
     *
     * @param   TemplateUn|PropelObjectCollection $templateUn  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateUn($templateUn, $comparison = null)
    {
        if ($templateUn instanceof TemplateUn) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $templateUn->getJenjangPendidikanId(), $comparison);
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
     * @return JenjangPendidikanQuery The current query, for fluid interface
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
     * Filter the query by a related TingkatPendidikan object
     *
     * @param   TingkatPendidikan|PropelObjectCollection $tingkatPendidikan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenjangPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatPendidikan($tingkatPendidikan, $comparison = null)
    {
        if ($tingkatPendidikan instanceof TingkatPendidikan) {
            return $this
                ->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $tingkatPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($tingkatPendidikan instanceof PropelObjectCollection) {
            return $this
                ->useTingkatPendidikanQuery()
                ->filterByPrimaryKeys($tingkatPendidikan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTingkatPendidikan() only accepts arguments of type TingkatPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatPendidikan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function joinTingkatPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatPendidikan');

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
            $this->addJoinObject($join, 'TingkatPendidikan');
        }

        return $this;
    }

    /**
     * Use the TingkatPendidikan relation TingkatPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useTingkatPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatPendidikan', '\DataDikdas\Model\TingkatPendidikanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenjangPendidikan $jenjangPendidikan Object to remove from the list of results
     *
     * @return JenjangPendidikanQuery The current query, for fluid interface
     */
    public function prune($jenjangPendidikan = null)
    {
        if ($jenjangPendidikan) {
            $this->addUsingAlias(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
