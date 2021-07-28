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
use DataDikdas\Model\IzinOperasional;
use DataDikdas\Model\IzinOperasionalPeer;
use DataDikdas\Model\IzinOperasionalQuery;
use DataDikdas\Model\LembagaNonSekolah;
use DataDikdas\Model\Sekolah;

/**
 * Base class that represents a query for the 'izin_operasional' table.
 *
 * 
 *
 * @method IzinOperasionalQuery orderByIdIzinOperasional($order = Criteria::ASC) Order by the id_izin_operasional column
 * @method IzinOperasionalQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method IzinOperasionalQuery orderByLembagaId($order = Criteria::ASC) Order by the lembaga_id column
 * @method IzinOperasionalQuery orderBySkIzinOperasional($order = Criteria::ASC) Order by the sk_izin_operasional column
 * @method IzinOperasionalQuery orderByTmtIzinOperasional($order = Criteria::ASC) Order by the tmt_izin_operasional column
 * @method IzinOperasionalQuery orderByMasaBerlaku($order = Criteria::ASC) Order by the masa_berlaku column
 * @method IzinOperasionalQuery orderByTstIzinOperasional($order = Criteria::ASC) Order by the tst_izin_operasional column
 * @method IzinOperasionalQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method IzinOperasionalQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method IzinOperasionalQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method IzinOperasionalQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method IzinOperasionalQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method IzinOperasionalQuery groupByIdIzinOperasional() Group by the id_izin_operasional column
 * @method IzinOperasionalQuery groupBySekolahId() Group by the sekolah_id column
 * @method IzinOperasionalQuery groupByLembagaId() Group by the lembaga_id column
 * @method IzinOperasionalQuery groupBySkIzinOperasional() Group by the sk_izin_operasional column
 * @method IzinOperasionalQuery groupByTmtIzinOperasional() Group by the tmt_izin_operasional column
 * @method IzinOperasionalQuery groupByMasaBerlaku() Group by the masa_berlaku column
 * @method IzinOperasionalQuery groupByTstIzinOperasional() Group by the tst_izin_operasional column
 * @method IzinOperasionalQuery groupByCreateDate() Group by the create_date column
 * @method IzinOperasionalQuery groupByLastUpdate() Group by the last_update column
 * @method IzinOperasionalQuery groupBySoftDelete() Group by the soft_delete column
 * @method IzinOperasionalQuery groupByLastSync() Group by the last_sync column
 * @method IzinOperasionalQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method IzinOperasionalQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method IzinOperasionalQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method IzinOperasionalQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method IzinOperasionalQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method IzinOperasionalQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method IzinOperasionalQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method IzinOperasionalQuery leftJoinLembagaNonSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaNonSekolah relation
 * @method IzinOperasionalQuery rightJoinLembagaNonSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaNonSekolah relation
 * @method IzinOperasionalQuery innerJoinLembagaNonSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaNonSekolah relation
 *
 * @method IzinOperasional findOne(PropelPDO $con = null) Return the first IzinOperasional matching the query
 * @method IzinOperasional findOneOrCreate(PropelPDO $con = null) Return the first IzinOperasional matching the query, or a new IzinOperasional object populated from the query conditions when no match is found
 *
 * @method IzinOperasional findOneBySekolahId(string $sekolah_id) Return the first IzinOperasional filtered by the sekolah_id column
 * @method IzinOperasional findOneByLembagaId(string $lembaga_id) Return the first IzinOperasional filtered by the lembaga_id column
 * @method IzinOperasional findOneBySkIzinOperasional(string $sk_izin_operasional) Return the first IzinOperasional filtered by the sk_izin_operasional column
 * @method IzinOperasional findOneByTmtIzinOperasional(string $tmt_izin_operasional) Return the first IzinOperasional filtered by the tmt_izin_operasional column
 * @method IzinOperasional findOneByMasaBerlaku(string $masa_berlaku) Return the first IzinOperasional filtered by the masa_berlaku column
 * @method IzinOperasional findOneByTstIzinOperasional(string $tst_izin_operasional) Return the first IzinOperasional filtered by the tst_izin_operasional column
 * @method IzinOperasional findOneByCreateDate(string $create_date) Return the first IzinOperasional filtered by the create_date column
 * @method IzinOperasional findOneByLastUpdate(string $last_update) Return the first IzinOperasional filtered by the last_update column
 * @method IzinOperasional findOneBySoftDelete(string $soft_delete) Return the first IzinOperasional filtered by the soft_delete column
 * @method IzinOperasional findOneByLastSync(string $last_sync) Return the first IzinOperasional filtered by the last_sync column
 * @method IzinOperasional findOneByUpdaterId(string $updater_id) Return the first IzinOperasional filtered by the updater_id column
 *
 * @method array findByIdIzinOperasional(string $id_izin_operasional) Return IzinOperasional objects filtered by the id_izin_operasional column
 * @method array findBySekolahId(string $sekolah_id) Return IzinOperasional objects filtered by the sekolah_id column
 * @method array findByLembagaId(string $lembaga_id) Return IzinOperasional objects filtered by the lembaga_id column
 * @method array findBySkIzinOperasional(string $sk_izin_operasional) Return IzinOperasional objects filtered by the sk_izin_operasional column
 * @method array findByTmtIzinOperasional(string $tmt_izin_operasional) Return IzinOperasional objects filtered by the tmt_izin_operasional column
 * @method array findByMasaBerlaku(string $masa_berlaku) Return IzinOperasional objects filtered by the masa_berlaku column
 * @method array findByTstIzinOperasional(string $tst_izin_operasional) Return IzinOperasional objects filtered by the tst_izin_operasional column
 * @method array findByCreateDate(string $create_date) Return IzinOperasional objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return IzinOperasional objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return IzinOperasional objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return IzinOperasional objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return IzinOperasional objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseIzinOperasionalQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseIzinOperasionalQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\IzinOperasional', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new IzinOperasionalQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   IzinOperasionalQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return IzinOperasionalQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof IzinOperasionalQuery) {
            return $criteria;
        }
        $query = new IzinOperasionalQuery();
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
     * @return   IzinOperasional|IzinOperasional[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = IzinOperasionalPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(IzinOperasionalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 IzinOperasional A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdIzinOperasional($key, $con = null)
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
     * @return                 IzinOperasional A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_izin_operasional", "sekolah_id", "lembaga_id", "sk_izin_operasional", "tmt_izin_operasional", "masa_berlaku", "tst_izin_operasional", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "izin_operasional" WHERE "id_izin_operasional" = :p0';
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
            $obj = new IzinOperasional();
            $obj->hydrate($row);
            IzinOperasionalPeer::addInstanceToPool($obj, (string) $key);
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
     * @return IzinOperasional|IzinOperasional[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|IzinOperasional[]|mixed the list of results, formatted by the current formatter
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
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(IzinOperasionalPeer::ID_IZIN_OPERASIONAL, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(IzinOperasionalPeer::ID_IZIN_OPERASIONAL, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterByIdIzinOperasional('fooValue');   // WHERE id_izin_operasional = 'fooValue'
     * $query->filterByIdIzinOperasional('%fooValue%'); // WHERE id_izin_operasional LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idIzinOperasional The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByIdIzinOperasional($idIzinOperasional = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idIzinOperasional)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idIzinOperasional)) {
                $idIzinOperasional = str_replace('*', '%', $idIzinOperasional);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::ID_IZIN_OPERASIONAL, $idIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the sekolah_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySekolahId('fooValue');   // WHERE sekolah_id = 'fooValue'
     * $query->filterBySekolahId('%fooValue%'); // WHERE sekolah_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $sekolahId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterBySekolahId($sekolahId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($sekolahId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $sekolahId)) {
                $sekolahId = str_replace('*', '%', $sekolahId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the lembaga_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaId('fooValue');   // WHERE lembaga_id = 'fooValue'
     * $query->filterByLembagaId('%fooValue%'); // WHERE lembaga_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $lembagaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByLembagaId($lembagaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($lembagaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $lembagaId)) {
                $lembagaId = str_replace('*', '%', $lembagaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::LEMBAGA_ID, $lembagaId, $comparison);
    }

    /**
     * Filter the query on the sk_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterBySkIzinOperasional('fooValue');   // WHERE sk_izin_operasional = 'fooValue'
     * $query->filterBySkIzinOperasional('%fooValue%'); // WHERE sk_izin_operasional LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skIzinOperasional The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterBySkIzinOperasional($skIzinOperasional = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skIzinOperasional)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skIzinOperasional)) {
                $skIzinOperasional = str_replace('*', '%', $skIzinOperasional);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::SK_IZIN_OPERASIONAL, $skIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the tmt_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtIzinOperasional('2011-03-14'); // WHERE tmt_izin_operasional = '2011-03-14'
     * $query->filterByTmtIzinOperasional('now'); // WHERE tmt_izin_operasional = '2011-03-14'
     * $query->filterByTmtIzinOperasional(array('max' => 'yesterday')); // WHERE tmt_izin_operasional > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtIzinOperasional The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByTmtIzinOperasional($tmtIzinOperasional = null, $comparison = null)
    {
        if (is_array($tmtIzinOperasional)) {
            $useMinMax = false;
            if (isset($tmtIzinOperasional['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::TMT_IZIN_OPERASIONAL, $tmtIzinOperasional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtIzinOperasional['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::TMT_IZIN_OPERASIONAL, $tmtIzinOperasional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::TMT_IZIN_OPERASIONAL, $tmtIzinOperasional, $comparison);
    }

    /**
     * Filter the query on the masa_berlaku column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaBerlaku(1234); // WHERE masa_berlaku = 1234
     * $query->filterByMasaBerlaku(array(12, 34)); // WHERE masa_berlaku IN (12, 34)
     * $query->filterByMasaBerlaku(array('min' => 12)); // WHERE masa_berlaku >= 12
     * $query->filterByMasaBerlaku(array('max' => 12)); // WHERE masa_berlaku <= 12
     * </code>
     *
     * @param     mixed $masaBerlaku The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByMasaBerlaku($masaBerlaku = null, $comparison = null)
    {
        if (is_array($masaBerlaku)) {
            $useMinMax = false;
            if (isset($masaBerlaku['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::MASA_BERLAKU, $masaBerlaku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaBerlaku['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::MASA_BERLAKU, $masaBerlaku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::MASA_BERLAKU, $masaBerlaku, $comparison);
    }

    /**
     * Filter the query on the tst_izin_operasional column
     *
     * Example usage:
     * <code>
     * $query->filterByTstIzinOperasional('2011-03-14'); // WHERE tst_izin_operasional = '2011-03-14'
     * $query->filterByTstIzinOperasional('now'); // WHERE tst_izin_operasional = '2011-03-14'
     * $query->filterByTstIzinOperasional(array('max' => 'yesterday')); // WHERE tst_izin_operasional > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstIzinOperasional The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByTstIzinOperasional($tstIzinOperasional = null, $comparison = null)
    {
        if (is_array($tstIzinOperasional)) {
            $useMinMax = false;
            if (isset($tstIzinOperasional['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::TST_IZIN_OPERASIONAL, $tstIzinOperasional['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstIzinOperasional['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::TST_IZIN_OPERASIONAL, $tstIzinOperasional['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::TST_IZIN_OPERASIONAL, $tstIzinOperasional, $comparison);
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
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(IzinOperasionalPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(IzinOperasionalPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(IzinOperasionalPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return IzinOperasionalQuery The current query, for fluid interface
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

        return $this->addUsingAlias(IzinOperasionalPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 IzinOperasionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(IzinOperasionalPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(IzinOperasionalPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
        } else {
            throw new PropelException('filterBySekolah() only accepts arguments of type Sekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Sekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function joinSekolah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Sekolah');

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
            $this->addJoinObject($join, 'Sekolah');
        }

        return $this;
    }

    /**
     * Use the Sekolah relation Sekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SekolahQuery A secondary query class using the current class as primary query
     */
    public function useSekolahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Sekolah', '\DataDikdas\Model\SekolahQuery');
    }

    /**
     * Filter the query by a related LembagaNonSekolah object
     *
     * @param   LembagaNonSekolah|PropelObjectCollection $lembagaNonSekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 IzinOperasionalQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaNonSekolah($lembagaNonSekolah, $comparison = null)
    {
        if ($lembagaNonSekolah instanceof LembagaNonSekolah) {
            return $this
                ->addUsingAlias(IzinOperasionalPeer::LEMBAGA_ID, $lembagaNonSekolah->getLembagaId(), $comparison);
        } elseif ($lembagaNonSekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(IzinOperasionalPeer::LEMBAGA_ID, $lembagaNonSekolah->toKeyValue('PrimaryKey', 'LembagaId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaNonSekolah() only accepts arguments of type LembagaNonSekolah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaNonSekolah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function joinLembagaNonSekolah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaNonSekolah');

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
            $this->addJoinObject($join, 'LembagaNonSekolah');
        }

        return $this;
    }

    /**
     * Use the LembagaNonSekolah relation LembagaNonSekolah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaNonSekolahQuery A secondary query class using the current class as primary query
     */
    public function useLembagaNonSekolahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLembagaNonSekolah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaNonSekolah', '\DataDikdas\Model\LembagaNonSekolahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   IzinOperasional $izinOperasional Object to remove from the list of results
     *
     * @return IzinOperasionalQuery The current query, for fluid interface
     */
    public function prune($izinOperasional = null)
    {
        if ($izinOperasional) {
            $this->addUsingAlias(IzinOperasionalPeer::ID_IZIN_OPERASIONAL, $izinOperasional->getIdIzinOperasional(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
