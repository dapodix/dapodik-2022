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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\Buku;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisHapusBukuPeer;
use DataDikdas\Model\JenisHapusBukuQuery;
use DataDikdas\Model\Tanah;

/**
 * Base class that represents a query for the 'ref.jenis_hapus_buku' table.
 *
 * 
 *
 * @method JenisHapusBukuQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method JenisHapusBukuQuery orderByKetHapusBuku($order = Criteria::ASC) Order by the ket_hapus_buku column
 * @method JenisHapusBukuQuery orderByUPrasarana($order = Criteria::ASC) Order by the u_prasarana column
 * @method JenisHapusBukuQuery orderByUSarana($order = Criteria::ASC) Order by the u_sarana column
 * @method JenisHapusBukuQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisHapusBukuQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisHapusBukuQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisHapusBukuQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisHapusBukuQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method JenisHapusBukuQuery groupByKetHapusBuku() Group by the ket_hapus_buku column
 * @method JenisHapusBukuQuery groupByUPrasarana() Group by the u_prasarana column
 * @method JenisHapusBukuQuery groupByUSarana() Group by the u_sarana column
 * @method JenisHapusBukuQuery groupByCreateDate() Group by the create_date column
 * @method JenisHapusBukuQuery groupByLastUpdate() Group by the last_update column
 * @method JenisHapusBukuQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisHapusBukuQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisHapusBukuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisHapusBukuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisHapusBukuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisHapusBukuQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method JenisHapusBukuQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method JenisHapusBukuQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method JenisHapusBukuQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method JenisHapusBukuQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method JenisHapusBukuQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method JenisHapusBukuQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method JenisHapusBukuQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method JenisHapusBukuQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method JenisHapusBukuQuery leftJoinBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the Buku relation
 * @method JenisHapusBukuQuery rightJoinBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Buku relation
 * @method JenisHapusBukuQuery innerJoinBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the Buku relation
 *
 * @method JenisHapusBukuQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method JenisHapusBukuQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method JenisHapusBukuQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method JenisHapusBuku findOne(PropelPDO $con = null) Return the first JenisHapusBuku matching the query
 * @method JenisHapusBuku findOneOrCreate(PropelPDO $con = null) Return the first JenisHapusBuku matching the query, or a new JenisHapusBuku object populated from the query conditions when no match is found
 *
 * @method JenisHapusBuku findOneByKetHapusBuku(string $ket_hapus_buku) Return the first JenisHapusBuku filtered by the ket_hapus_buku column
 * @method JenisHapusBuku findOneByUPrasarana(string $u_prasarana) Return the first JenisHapusBuku filtered by the u_prasarana column
 * @method JenisHapusBuku findOneByUSarana(string $u_sarana) Return the first JenisHapusBuku filtered by the u_sarana column
 * @method JenisHapusBuku findOneByCreateDate(string $create_date) Return the first JenisHapusBuku filtered by the create_date column
 * @method JenisHapusBuku findOneByLastUpdate(string $last_update) Return the first JenisHapusBuku filtered by the last_update column
 * @method JenisHapusBuku findOneByExpiredDate(string $expired_date) Return the first JenisHapusBuku filtered by the expired_date column
 * @method JenisHapusBuku findOneByLastSync(string $last_sync) Return the first JenisHapusBuku filtered by the last_sync column
 *
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return JenisHapusBuku objects filtered by the id_hapus_buku column
 * @method array findByKetHapusBuku(string $ket_hapus_buku) Return JenisHapusBuku objects filtered by the ket_hapus_buku column
 * @method array findByUPrasarana(string $u_prasarana) Return JenisHapusBuku objects filtered by the u_prasarana column
 * @method array findByUSarana(string $u_sarana) Return JenisHapusBuku objects filtered by the u_sarana column
 * @method array findByCreateDate(string $create_date) Return JenisHapusBuku objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisHapusBuku objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisHapusBuku objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisHapusBuku objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisHapusBukuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisHapusBukuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisHapusBuku', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisHapusBukuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisHapusBukuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisHapusBukuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisHapusBukuQuery) {
            return $criteria;
        }
        $query = new JenisHapusBukuQuery();
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
     * @return   JenisHapusBuku|JenisHapusBuku[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisHapusBukuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisHapusBukuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisHapusBuku A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdHapusBuku($key, $con = null)
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
     * @return                 JenisHapusBuku A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_hapus_buku", "ket_hapus_buku", "u_prasarana", "u_sarana", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_hapus_buku" WHERE "id_hapus_buku" = :p0';
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
            $obj = new JenisHapusBuku();
            $obj->hydrate($row);
            JenisHapusBukuPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisHapusBuku|JenisHapusBuku[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisHapusBuku[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByIdHapusBuku('fooValue');   // WHERE id_hapus_buku = 'fooValue'
     * $query->filterByIdHapusBuku('%fooValue%'); // WHERE id_hapus_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idHapusBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByIdHapusBuku($idHapusBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idHapusBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idHapusBuku)) {
                $idHapusBuku = str_replace('*', '%', $idHapusBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
    }

    /**
     * Filter the query on the ket_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByKetHapusBuku('fooValue');   // WHERE ket_hapus_buku = 'fooValue'
     * $query->filterByKetHapusBuku('%fooValue%'); // WHERE ket_hapus_buku LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ketHapusBuku The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByKetHapusBuku($ketHapusBuku = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ketHapusBuku)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ketHapusBuku)) {
                $ketHapusBuku = str_replace('*', '%', $ketHapusBuku);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::KET_HAPUS_BUKU, $ketHapusBuku, $comparison);
    }

    /**
     * Filter the query on the u_prasarana column
     *
     * Example usage:
     * <code>
     * $query->filterByUPrasarana(1234); // WHERE u_prasarana = 1234
     * $query->filterByUPrasarana(array(12, 34)); // WHERE u_prasarana IN (12, 34)
     * $query->filterByUPrasarana(array('min' => 12)); // WHERE u_prasarana >= 12
     * $query->filterByUPrasarana(array('max' => 12)); // WHERE u_prasarana <= 12
     * </code>
     *
     * @param     mixed $uPrasarana The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByUPrasarana($uPrasarana = null, $comparison = null)
    {
        if (is_array($uPrasarana)) {
            $useMinMax = false;
            if (isset($uPrasarana['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::U_PRASARANA, $uPrasarana['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uPrasarana['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::U_PRASARANA, $uPrasarana['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::U_PRASARANA, $uPrasarana, $comparison);
    }

    /**
     * Filter the query on the u_sarana column
     *
     * Example usage:
     * <code>
     * $query->filterByUSarana(1234); // WHERE u_sarana = 1234
     * $query->filterByUSarana(array(12, 34)); // WHERE u_sarana IN (12, 34)
     * $query->filterByUSarana(array('min' => 12)); // WHERE u_sarana >= 12
     * $query->filterByUSarana(array('max' => 12)); // WHERE u_sarana <= 12
     * </code>
     *
     * @param     mixed $uSarana The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByUSarana($uSarana = null, $comparison = null)
    {
        if (is_array($uSarana)) {
            $useMinMax = false;
            if (isset($uSarana['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::U_SARANA, $uSarana['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($uSarana['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::U_SARANA, $uSarana['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::U_SARANA, $uSarana, $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisHapusBukuPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisHapusBukuPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisHapusBukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $alat->getIdHapusBuku(), $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
     * @return                 JenisHapusBukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $angkutan->getIdHapusBuku(), $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisHapusBukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $bangunan->getIdHapusBuku(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            return $this
                ->useBangunanQuery()
                ->filterByPrimaryKeys($bangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

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
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related Buku object
     *
     * @param   Buku|PropelObjectCollection $buku  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisHapusBukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBuku($buku, $comparison = null)
    {
        if ($buku instanceof Buku) {
            return $this
                ->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $buku->getIdHapusBuku(), $comparison);
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
     * @return JenisHapusBukuQuery The current query, for fluid interface
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
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisHapusBukuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $tanah->getIdHapusBuku(), $comparison);
        } elseif ($tanah instanceof PropelObjectCollection) {
            return $this
                ->useTanahQuery()
                ->filterByPrimaryKeys($tanah->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTanah() only accepts arguments of type Tanah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tanah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tanah');

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
            $this->addJoinObject($join, 'Tanah');
        }

        return $this;
    }

    /**
     * Use the Tanah relation Tanah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TanahQuery A secondary query class using the current class as primary query
     */
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisHapusBuku $jenisHapusBuku Object to remove from the list of results
     *
     * @return JenisHapusBukuQuery The current query, for fluid interface
     */
    public function prune($jenisHapusBuku = null)
    {
        if ($jenisHapusBuku) {
            $this->addUsingAlias(JenisHapusBukuPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
