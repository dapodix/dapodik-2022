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
use DataDikdas\Model\BukuPtk;
use DataDikdas\Model\BukuPtkPeer;
use DataDikdas\Model\BukuPtkQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldBukuPtk;

/**
 * Base class that represents a query for the 'buku_ptk' table.
 *
 * 
 *
 * @method BukuPtkQuery orderByBukuId($order = Criteria::ASC) Order by the buku_id column
 * @method BukuPtkQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method BukuPtkQuery orderByJudulBuku($order = Criteria::ASC) Order by the judul_buku column
 * @method BukuPtkQuery orderByTahun($order = Criteria::ASC) Order by the tahun column
 * @method BukuPtkQuery orderByPenerbit($order = Criteria::ASC) Order by the penerbit column
 * @method BukuPtkQuery orderByIsbn($order = Criteria::ASC) Order by the isbn column
 * @method BukuPtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method BukuPtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method BukuPtkQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method BukuPtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method BukuPtkQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method BukuPtkQuery groupByBukuId() Group by the buku_id column
 * @method BukuPtkQuery groupByPtkId() Group by the ptk_id column
 * @method BukuPtkQuery groupByJudulBuku() Group by the judul_buku column
 * @method BukuPtkQuery groupByTahun() Group by the tahun column
 * @method BukuPtkQuery groupByPenerbit() Group by the penerbit column
 * @method BukuPtkQuery groupByIsbn() Group by the isbn column
 * @method BukuPtkQuery groupByCreateDate() Group by the create_date column
 * @method BukuPtkQuery groupByLastUpdate() Group by the last_update column
 * @method BukuPtkQuery groupBySoftDelete() Group by the soft_delete column
 * @method BukuPtkQuery groupByLastSync() Group by the last_sync column
 * @method BukuPtkQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method BukuPtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method BukuPtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method BukuPtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method BukuPtkQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method BukuPtkQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method BukuPtkQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method BukuPtkQuery leftJoinVldBukuPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldBukuPtk relation
 * @method BukuPtkQuery rightJoinVldBukuPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldBukuPtk relation
 * @method BukuPtkQuery innerJoinVldBukuPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldBukuPtk relation
 *
 * @method BukuPtk findOne(PropelPDO $con = null) Return the first BukuPtk matching the query
 * @method BukuPtk findOneOrCreate(PropelPDO $con = null) Return the first BukuPtk matching the query, or a new BukuPtk object populated from the query conditions when no match is found
 *
 * @method BukuPtk findOneByPtkId(string $ptk_id) Return the first BukuPtk filtered by the ptk_id column
 * @method BukuPtk findOneByJudulBuku(string $judul_buku) Return the first BukuPtk filtered by the judul_buku column
 * @method BukuPtk findOneByTahun(string $tahun) Return the first BukuPtk filtered by the tahun column
 * @method BukuPtk findOneByPenerbit(string $penerbit) Return the first BukuPtk filtered by the penerbit column
 * @method BukuPtk findOneByIsbn(string $isbn) Return the first BukuPtk filtered by the isbn column
 * @method BukuPtk findOneByCreateDate(string $create_date) Return the first BukuPtk filtered by the create_date column
 * @method BukuPtk findOneByLastUpdate(string $last_update) Return the first BukuPtk filtered by the last_update column
 * @method BukuPtk findOneBySoftDelete(string $soft_delete) Return the first BukuPtk filtered by the soft_delete column
 * @method BukuPtk findOneByLastSync(string $last_sync) Return the first BukuPtk filtered by the last_sync column
 * @method BukuPtk findOneByUpdaterId(string $updater_id) Return the first BukuPtk filtered by the updater_id column
 *
 * @method array findByBukuId(string $buku_id) Return BukuPtk objects filtered by the buku_id column
 * @method array findByPtkId(string $ptk_id) Return BukuPtk objects filtered by the ptk_id column
 * @method array findByJudulBuku(string $judul_buku) Return BukuPtk objects filtered by the judul_buku column
 * @method array findByTahun(string $tahun) Return BukuPtk objects filtered by the tahun column
 * @method array findByPenerbit(string $penerbit) Return BukuPtk objects filtered by the penerbit column
 * @method array findByIsbn(string $isbn) Return BukuPtk objects filtered by the isbn column
 * @method array findByCreateDate(string $create_date) Return BukuPtk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return BukuPtk objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return BukuPtk objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return BukuPtk objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return BukuPtk objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBukuPtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseBukuPtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\BukuPtk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new BukuPtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   BukuPtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return BukuPtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof BukuPtkQuery) {
            return $criteria;
        }
        $query = new BukuPtkQuery();
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
     * @return   BukuPtk|BukuPtk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = BukuPtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(BukuPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 BukuPtk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByBukuId($key, $con = null)
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
     * @return                 BukuPtk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "buku_id", "ptk_id", "judul_buku", "tahun", "penerbit", "isbn", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "buku_ptk" WHERE "buku_id" = :p0';
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
            $obj = new BukuPtk();
            $obj->hydrate($row);
            BukuPtkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return BukuPtk|BukuPtk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|BukuPtk[]|mixed the list of results, formatted by the current formatter
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
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(BukuPtkPeer::BUKU_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(BukuPtkPeer::BUKU_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the buku_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBukuId('fooValue');   // WHERE buku_id = 'fooValue'
     * $query->filterByBukuId('%fooValue%'); // WHERE buku_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $bukuId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByBukuId($bukuId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($bukuId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $bukuId)) {
                $bukuId = str_replace('*', '%', $bukuId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::BUKU_ID, $bukuId, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BukuPtkPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the judul_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByJudulBuku('fooValue');   // WHERE judul_buku = 'fooValue'
     * $query->filterByJudulBuku('%fooValue%'); // WHERE judul_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $judulBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByJudulBuku($judulBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($judulBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $judulBuku)) {
                $judulBuku = str_replace('*', '%', $judulBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::JUDUL_BUKU, $judulBuku, $comparison);
    }

    /**
     * Filter the query on the tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByTahun(1234); // WHERE tahun = 1234
     * $query->filterByTahun(array(12, 34)); // WHERE tahun IN (12, 34)
     * $query->filterByTahun(array('min' => 12)); // WHERE tahun >= 12
     * $query->filterByTahun(array('max' => 12)); // WHERE tahun <= 12
     * </code>
     *
     * @param     mixed $tahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByTahun($tahun = null, $comparison = null)
    {
        if (is_array($tahun)) {
            $useMinMax = false;
            if (isset($tahun['min'])) {
                $this->addUsingAlias(BukuPtkPeer::TAHUN, $tahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahun['max'])) {
                $this->addUsingAlias(BukuPtkPeer::TAHUN, $tahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::TAHUN, $tahun, $comparison);
    }

    /**
     * Filter the query on the penerbit column
     *
     * Example usage:
     * <code>
     * $query->filterByPenerbit('fooValue');   // WHERE penerbit = 'fooValue'
     * $query->filterByPenerbit('%fooValue%'); // WHERE penerbit LIKE '%fooValue%'
     * </code>
     *
     * @param     string $penerbit The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByPenerbit($penerbit = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($penerbit)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $penerbit)) {
                $penerbit = str_replace('*', '%', $penerbit);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::PENERBIT, $penerbit, $comparison);
    }

    /**
     * Filter the query on the isbn column
     *
     * Example usage:
     * <code>
     * $query->filterByIsbn('fooValue');   // WHERE isbn = 'fooValue'
     * $query->filterByIsbn('%fooValue%'); // WHERE isbn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $isbn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByIsbn($isbn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($isbn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $isbn)) {
                $isbn = str_replace('*', '%', $isbn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::ISBN, $isbn, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(BukuPtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(BukuPtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(BukuPtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(BukuPtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(BukuPtkPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(BukuPtkPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(BukuPtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(BukuPtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(BukuPtkPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(BukuPtkPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(BukuPtkPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(BukuPtkPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return BukuPtkQuery The current query, for fluid interface
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
     * Filter the query by a related VldBukuPtk object
     *
     * @param   VldBukuPtk|PropelObjectCollection $vldBukuPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 BukuPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldBukuPtk($vldBukuPtk, $comparison = null)
    {
        if ($vldBukuPtk instanceof VldBukuPtk) {
            return $this
                ->addUsingAlias(BukuPtkPeer::BUKU_ID, $vldBukuPtk->getBukuId(), $comparison);
        } elseif ($vldBukuPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldBukuPtkQuery()
                ->filterByPrimaryKeys($vldBukuPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldBukuPtk() only accepts arguments of type VldBukuPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldBukuPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function joinVldBukuPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldBukuPtk');

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
            $this->addJoinObject($join, 'VldBukuPtk');
        }

        return $this;
    }

    /**
     * Use the VldBukuPtk relation VldBukuPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldBukuPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldBukuPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldBukuPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldBukuPtk', '\DataDikdas\Model\VldBukuPtkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   BukuPtk $bukuPtk Object to remove from the list of results
     *
     * @return BukuPtkQuery The current query, for fluid interface
     */
    public function prune($bukuPtk = null)
    {
        if ($bukuPtk) {
            $this->addUsingAlias(BukuPtkPeer::BUKU_ID, $bukuPtk->getBukuId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
