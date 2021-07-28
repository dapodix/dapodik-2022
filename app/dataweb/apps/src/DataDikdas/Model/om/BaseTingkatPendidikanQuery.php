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
use DataDikdas\Model\Buku;
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\TingkatBiblio;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a query for the 'ref.tingkat_pendidikan' table.
 *
 * 
 *
 * @method TingkatPendidikanQuery orderByTingkatPendidikanId($order = Criteria::ASC) Order by the tingkat_pendidikan_id column
 * @method TingkatPendidikanQuery orderByKode($order = Criteria::ASC) Order by the kode column
 * @method TingkatPendidikanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method TingkatPendidikanQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method TingkatPendidikanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TingkatPendidikanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TingkatPendidikanQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TingkatPendidikanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TingkatPendidikanQuery groupByTingkatPendidikanId() Group by the tingkat_pendidikan_id column
 * @method TingkatPendidikanQuery groupByKode() Group by the kode column
 * @method TingkatPendidikanQuery groupByNama() Group by the nama column
 * @method TingkatPendidikanQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method TingkatPendidikanQuery groupByCreateDate() Group by the create_date column
 * @method TingkatPendidikanQuery groupByLastUpdate() Group by the last_update column
 * @method TingkatPendidikanQuery groupByExpiredDate() Group by the expired_date column
 * @method TingkatPendidikanQuery groupByLastSync() Group by the last_sync column
 *
 * @method TingkatPendidikanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TingkatPendidikanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TingkatPendidikanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TingkatPendidikanQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method TingkatPendidikanQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method TingkatPendidikanQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method TingkatPendidikanQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method TingkatPendidikanQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method TingkatPendidikanQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method TingkatPendidikanQuery leftJoinGroupMatpel($relationAlias = null) Adds a LEFT JOIN clause to the query using the GroupMatpel relation
 * @method TingkatPendidikanQuery rightJoinGroupMatpel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the GroupMatpel relation
 * @method TingkatPendidikanQuery innerJoinGroupMatpel($relationAlias = null) Adds a INNER JOIN clause to the query using the GroupMatpel relation
 *
 * @method TingkatPendidikanQuery leftJoinKompetensi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kompetensi relation
 * @method TingkatPendidikanQuery rightJoinKompetensi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kompetensi relation
 * @method TingkatPendidikanQuery innerJoinKompetensi($relationAlias = null) Adds a INNER JOIN clause to the query using the Kompetensi relation
 *
 * @method TingkatPendidikanQuery leftJoinMataPelajaranKurikulum($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method TingkatPendidikanQuery rightJoinMataPelajaranKurikulum($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranKurikulum relation
 * @method TingkatPendidikanQuery innerJoinMataPelajaranKurikulum($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranKurikulum relation
 *
 * @method TingkatPendidikanQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method TingkatPendidikanQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method TingkatPendidikanQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method TingkatPendidikanQuery leftJoinTingkatBiblio($relationAlias = null) Adds a LEFT JOIN clause to the query using the TingkatBiblio relation
 * @method TingkatPendidikanQuery rightJoinTingkatBiblio($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TingkatBiblio relation
 * @method TingkatPendidikanQuery innerJoinTingkatBiblio($relationAlias = null) Adds a INNER JOIN clause to the query using the TingkatBiblio relation
 *
 * @method TingkatPendidikan findOne(PropelPDO $con = null) Return the first TingkatPendidikan matching the query
 * @method TingkatPendidikan findOneOrCreate(PropelPDO $con = null) Return the first TingkatPendidikan matching the query, or a new TingkatPendidikan object populated from the query conditions when no match is found
 *
 * @method TingkatPendidikan findOneByKode(string $kode) Return the first TingkatPendidikan filtered by the kode column
 * @method TingkatPendidikan findOneByNama(string $nama) Return the first TingkatPendidikan filtered by the nama column
 * @method TingkatPendidikan findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first TingkatPendidikan filtered by the jenjang_pendidikan_id column
 * @method TingkatPendidikan findOneByCreateDate(string $create_date) Return the first TingkatPendidikan filtered by the create_date column
 * @method TingkatPendidikan findOneByLastUpdate(string $last_update) Return the first TingkatPendidikan filtered by the last_update column
 * @method TingkatPendidikan findOneByExpiredDate(string $expired_date) Return the first TingkatPendidikan filtered by the expired_date column
 * @method TingkatPendidikan findOneByLastSync(string $last_sync) Return the first TingkatPendidikan filtered by the last_sync column
 *
 * @method array findByTingkatPendidikanId(string $tingkat_pendidikan_id) Return TingkatPendidikan objects filtered by the tingkat_pendidikan_id column
 * @method array findByKode(string $kode) Return TingkatPendidikan objects filtered by the kode column
 * @method array findByNama(string $nama) Return TingkatPendidikan objects filtered by the nama column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return TingkatPendidikan objects filtered by the jenjang_pendidikan_id column
 * @method array findByCreateDate(string $create_date) Return TingkatPendidikan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TingkatPendidikan objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TingkatPendidikan objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TingkatPendidikan objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTingkatPendidikanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTingkatPendidikanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TingkatPendidikan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TingkatPendidikanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TingkatPendidikanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TingkatPendidikanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TingkatPendidikanQuery) {
            return $criteria;
        }
        $query = new TingkatPendidikanQuery();
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
     * @return   TingkatPendidikan|TingkatPendidikan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TingkatPendidikanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TingkatPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TingkatPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTingkatPendidikanId($key, $con = null)
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
     * @return                 TingkatPendidikan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "tingkat_pendidikan_id", "kode", "nama", "jenjang_pendidikan_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."tingkat_pendidikan" WHERE "tingkat_pendidikan_id" = :p0';
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
            $obj = new TingkatPendidikan();
            $obj->hydrate($row);
            TingkatPendidikanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TingkatPendidikan|TingkatPendidikan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TingkatPendidikan[]|mixed the list of results, formatted by the current formatter
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the tingkat_pendidikan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByTingkatPendidikanId(1234); // WHERE tingkat_pendidikan_id = 1234
     * $query->filterByTingkatPendidikanId(array(12, 34)); // WHERE tingkat_pendidikan_id IN (12, 34)
     * $query->filterByTingkatPendidikanId(array('min' => 12)); // WHERE tingkat_pendidikan_id >= 12
     * $query->filterByTingkatPendidikanId(array('max' => 12)); // WHERE tingkat_pendidikan_id <= 12
     * </code>
     *
     * @param     mixed $tingkatPendidikanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByTingkatPendidikanId($tingkatPendidikanId = null, $comparison = null)
    {
        if (is_array($tingkatPendidikanId)) {
            $useMinMax = false;
            if (isset($tingkatPendidikanId['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tingkatPendidikanId['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikanId, $comparison);
    }

    /**
     * Filter the query on the kode column
     *
     * Example usage:
     * <code>
     * $query->filterByKode('fooValue');   // WHERE kode = 'fooValue'
     * $query->filterByKode('%fooValue%'); // WHERE kode LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kode The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByKode($kode = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kode)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kode)) {
                $kode = str_replace('*', '%', $kode);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::KODE, $kode, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TingkatPendidikanPeer::NAMA, $nama, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TingkatPendidikanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TingkatPendidikanPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
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
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useJenjangPendidikanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenjangPendidikan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikan', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $buku->getTingkatPendidikanId(), $comparison);
        } elseif ($buku instanceof PropelObjectCollection) {
            return $this
                ->useBukuQuery()
                ->filterByPrimaryKeys($buku->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBuku() only accepts arguments of type Buku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Buku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Buku');

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
            $this->addJoinObject($join, 'Buku');
        }

        return $this;
    }

    /**
     * Use the Buku relation Buku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuQuery A secondary query class using the current class as primary query
     */
    public function useBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Buku', '\DataDikdas\Model\BukuQuery');
    }

    /**
     * Filter the query by a related GroupMatpel object
     *
     * @param   GroupMatpel|PropelObjectCollection $groupMatpel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByGroupMatpel($groupMatpel, $comparison = null)
    {
        if ($groupMatpel instanceof GroupMatpel) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $groupMatpel->getTingkatPendidikanId(), $comparison);
        } elseif ($groupMatpel instanceof PropelObjectCollection) {
            return $this
                ->useGroupMatpelQuery()
                ->filterByPrimaryKeys($groupMatpel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByGroupMatpel() only accepts arguments of type GroupMatpel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the GroupMatpel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinGroupMatpel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('GroupMatpel');

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
            $this->addJoinObject($join, 'GroupMatpel');
        }

        return $this;
    }

    /**
     * Use the GroupMatpel relation GroupMatpel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\GroupMatpelQuery A secondary query class using the current class as primary query
     */
    public function useGroupMatpelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinGroupMatpel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'GroupMatpel', '\DataDikdas\Model\GroupMatpelQuery');
    }

    /**
     * Filter the query by a related Kompetensi object
     *
     * @param   Kompetensi|PropelObjectCollection $kompetensi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKompetensi($kompetensi, $comparison = null)
    {
        if ($kompetensi instanceof Kompetensi) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $kompetensi->getTingkatPendidikanId(), $comparison);
        } elseif ($kompetensi instanceof PropelObjectCollection) {
            return $this
                ->useKompetensiQuery()
                ->filterByPrimaryKeys($kompetensi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKompetensi() only accepts arguments of type Kompetensi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kompetensi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinKompetensi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kompetensi');

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
            $this->addJoinObject($join, 'Kompetensi');
        }

        return $this;
    }

    /**
     * Use the Kompetensi relation Kompetensi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KompetensiQuery A secondary query class using the current class as primary query
     */
    public function useKompetensiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKompetensi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kompetensi', '\DataDikdas\Model\KompetensiQuery');
    }

    /**
     * Filter the query by a related MataPelajaranKurikulum object
     *
     * @param   MataPelajaranKurikulum|PropelObjectCollection $mataPelajaranKurikulum  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranKurikulum($mataPelajaranKurikulum, $comparison = null)
    {
        if ($mataPelajaranKurikulum instanceof MataPelajaranKurikulum) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $mataPelajaranKurikulum->getTingkatPendidikanId(), $comparison);
        } elseif ($mataPelajaranKurikulum instanceof PropelObjectCollection) {
            return $this
                ->useMataPelajaranKurikulumQuery()
                ->filterByPrimaryKeys($mataPelajaranKurikulum->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMataPelajaranKurikulum() only accepts arguments of type MataPelajaranKurikulum or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranKurikulum relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinMataPelajaranKurikulum($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranKurikulum');

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
            $this->addJoinObject($join, 'MataPelajaranKurikulum');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranKurikulum relation MataPelajaranKurikulum object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranKurikulumQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranKurikulumQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMataPelajaranKurikulum($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranKurikulum', '\DataDikdas\Model\MataPelajaranKurikulumQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $rombonganBelajar->getTingkatPendidikanId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

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
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related TingkatBiblio object
     *
     * @param   TingkatBiblio|PropelObjectCollection $tingkatBiblio  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TingkatPendidikanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTingkatBiblio($tingkatBiblio, $comparison = null)
    {
        if ($tingkatBiblio instanceof TingkatBiblio) {
            return $this
                ->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $tingkatBiblio->getTingkatPendidikanId(), $comparison);
        } elseif ($tingkatBiblio instanceof PropelObjectCollection) {
            return $this
                ->useTingkatBiblioQuery()
                ->filterByPrimaryKeys($tingkatBiblio->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTingkatBiblio() only accepts arguments of type TingkatBiblio or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TingkatBiblio relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function joinTingkatBiblio($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TingkatBiblio');

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
            $this->addJoinObject($join, 'TingkatBiblio');
        }

        return $this;
    }

    /**
     * Use the TingkatBiblio relation TingkatBiblio object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TingkatBiblioQuery A secondary query class using the current class as primary query
     */
    public function useTingkatBiblioQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTingkatBiblio($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TingkatBiblio', '\DataDikdas\Model\TingkatBiblioQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TingkatPendidikan $tingkatPendidikan Object to remove from the list of results
     *
     * @return TingkatPendidikanQuery The current query, for fluid interface
     */
    public function prune($tingkatPendidikan = null)
    {
        if ($tingkatPendidikan) {
            $this->addUsingAlias(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $tingkatPendidikan->getTingkatPendidikanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
