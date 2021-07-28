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
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\JenisPrasarana;
use DataDikdas\Model\JenisPrasaranaPeer;
use DataDikdas\Model\JenisPrasaranaQuery;
use DataDikdas\Model\PemakaiPrasarana;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\Tanah;

/**
 * Base class that represents a query for the 'ref.jenis_prasarana' table.
 *
 * 
 *
 * @method JenisPrasaranaQuery orderByJenisPrasaranaId($order = Criteria::ASC) Order by the jenis_prasarana_id column
 * @method JenisPrasaranaQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JenisPrasaranaQuery orderByAUnitOrganisasi($order = Criteria::ASC) Order by the a_unit_organisasi column
 * @method JenisPrasaranaQuery orderByATanah($order = Criteria::ASC) Order by the a_tanah column
 * @method JenisPrasaranaQuery orderByABangunan($order = Criteria::ASC) Order by the a_bangunan column
 * @method JenisPrasaranaQuery orderByARuang($order = Criteria::ASC) Order by the a_ruang column
 * @method JenisPrasaranaQuery orderByASub($order = Criteria::ASC) Order by the a_sub column
 * @method JenisPrasaranaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JenisPrasaranaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JenisPrasaranaQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JenisPrasaranaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JenisPrasaranaQuery groupByJenisPrasaranaId() Group by the jenis_prasarana_id column
 * @method JenisPrasaranaQuery groupByNama() Group by the nama column
 * @method JenisPrasaranaQuery groupByAUnitOrganisasi() Group by the a_unit_organisasi column
 * @method JenisPrasaranaQuery groupByATanah() Group by the a_tanah column
 * @method JenisPrasaranaQuery groupByABangunan() Group by the a_bangunan column
 * @method JenisPrasaranaQuery groupByARuang() Group by the a_ruang column
 * @method JenisPrasaranaQuery groupByASub() Group by the a_sub column
 * @method JenisPrasaranaQuery groupByCreateDate() Group by the create_date column
 * @method JenisPrasaranaQuery groupByLastUpdate() Group by the last_update column
 * @method JenisPrasaranaQuery groupByExpiredDate() Group by the expired_date column
 * @method JenisPrasaranaQuery groupByLastSync() Group by the last_sync column
 *
 * @method JenisPrasaranaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JenisPrasaranaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JenisPrasaranaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JenisPrasaranaQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method JenisPrasaranaQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method JenisPrasaranaQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method JenisPrasaranaQuery leftJoinPemakaiPrasarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the PemakaiPrasarana relation
 * @method JenisPrasaranaQuery rightJoinPemakaiPrasarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PemakaiPrasarana relation
 * @method JenisPrasaranaQuery innerJoinPemakaiPrasarana($relationAlias = null) Adds a INNER JOIN clause to the query using the PemakaiPrasarana relation
 *
 * @method JenisPrasaranaQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method JenisPrasaranaQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method JenisPrasaranaQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method JenisPrasaranaQuery leftJoinStandarSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the StandarSarana relation
 * @method JenisPrasaranaQuery rightJoinStandarSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StandarSarana relation
 * @method JenisPrasaranaQuery innerJoinStandarSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the StandarSarana relation
 *
 * @method JenisPrasaranaQuery leftJoinTanah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tanah relation
 * @method JenisPrasaranaQuery rightJoinTanah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tanah relation
 * @method JenisPrasaranaQuery innerJoinTanah($relationAlias = null) Adds a INNER JOIN clause to the query using the Tanah relation
 *
 * @method JenisPrasarana findOne(PropelPDO $con = null) Return the first JenisPrasarana matching the query
 * @method JenisPrasarana findOneOrCreate(PropelPDO $con = null) Return the first JenisPrasarana matching the query, or a new JenisPrasarana object populated from the query conditions when no match is found
 *
 * @method JenisPrasarana findOneByNama(string $nama) Return the first JenisPrasarana filtered by the nama column
 * @method JenisPrasarana findOneByAUnitOrganisasi(string $a_unit_organisasi) Return the first JenisPrasarana filtered by the a_unit_organisasi column
 * @method JenisPrasarana findOneByATanah(string $a_tanah) Return the first JenisPrasarana filtered by the a_tanah column
 * @method JenisPrasarana findOneByABangunan(string $a_bangunan) Return the first JenisPrasarana filtered by the a_bangunan column
 * @method JenisPrasarana findOneByARuang(string $a_ruang) Return the first JenisPrasarana filtered by the a_ruang column
 * @method JenisPrasarana findOneByASub(string $a_sub) Return the first JenisPrasarana filtered by the a_sub column
 * @method JenisPrasarana findOneByCreateDate(string $create_date) Return the first JenisPrasarana filtered by the create_date column
 * @method JenisPrasarana findOneByLastUpdate(string $last_update) Return the first JenisPrasarana filtered by the last_update column
 * @method JenisPrasarana findOneByExpiredDate(string $expired_date) Return the first JenisPrasarana filtered by the expired_date column
 * @method JenisPrasarana findOneByLastSync(string $last_sync) Return the first JenisPrasarana filtered by the last_sync column
 *
 * @method array findByJenisPrasaranaId(int $jenis_prasarana_id) Return JenisPrasarana objects filtered by the jenis_prasarana_id column
 * @method array findByNama(string $nama) Return JenisPrasarana objects filtered by the nama column
 * @method array findByAUnitOrganisasi(string $a_unit_organisasi) Return JenisPrasarana objects filtered by the a_unit_organisasi column
 * @method array findByATanah(string $a_tanah) Return JenisPrasarana objects filtered by the a_tanah column
 * @method array findByABangunan(string $a_bangunan) Return JenisPrasarana objects filtered by the a_bangunan column
 * @method array findByARuang(string $a_ruang) Return JenisPrasarana objects filtered by the a_ruang column
 * @method array findByASub(string $a_sub) Return JenisPrasarana objects filtered by the a_sub column
 * @method array findByCreateDate(string $create_date) Return JenisPrasarana objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JenisPrasarana objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JenisPrasarana objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JenisPrasarana objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisPrasaranaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJenisPrasaranaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JenisPrasarana', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JenisPrasaranaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JenisPrasaranaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JenisPrasaranaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JenisPrasaranaQuery) {
            return $criteria;
        }
        $query = new JenisPrasaranaQuery();
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
     * @return   JenisPrasarana|JenisPrasarana[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JenisPrasaranaPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JenisPrasaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JenisPrasarana A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJenisPrasaranaId($key, $con = null)
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
     * @return                 JenisPrasarana A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jenis_prasarana_id", "nama", "a_unit_organisasi", "a_tanah", "a_bangunan", "a_ruang", "a_sub", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jenis_prasarana" WHERE "jenis_prasarana_id" = :p0';
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
            $obj = new JenisPrasarana();
            $obj->hydrate($row);
            JenisPrasaranaPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JenisPrasarana|JenisPrasarana[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JenisPrasarana[]|mixed the list of results, formatted by the current formatter
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jenis_prasarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPrasaranaId(1234); // WHERE jenis_prasarana_id = 1234
     * $query->filterByJenisPrasaranaId(array(12, 34)); // WHERE jenis_prasarana_id IN (12, 34)
     * $query->filterByJenisPrasaranaId(array('min' => 12)); // WHERE jenis_prasarana_id >= 12
     * $query->filterByJenisPrasaranaId(array('max' => 12)); // WHERE jenis_prasarana_id <= 12
     * </code>
     *
     * @param     mixed $jenisPrasaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByJenisPrasaranaId($jenisPrasaranaId = null, $comparison = null)
    {
        if (is_array($jenisPrasaranaId)) {
            $useMinMax = false;
            if (isset($jenisPrasaranaId['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPrasaranaId['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasaranaId, $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JenisPrasaranaPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the a_unit_organisasi column
     *
     * Example usage:
     * <code>
     * $query->filterByAUnitOrganisasi(1234); // WHERE a_unit_organisasi = 1234
     * $query->filterByAUnitOrganisasi(array(12, 34)); // WHERE a_unit_organisasi IN (12, 34)
     * $query->filterByAUnitOrganisasi(array('min' => 12)); // WHERE a_unit_organisasi >= 12
     * $query->filterByAUnitOrganisasi(array('max' => 12)); // WHERE a_unit_organisasi <= 12
     * </code>
     *
     * @param     mixed $aUnitOrganisasi The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByAUnitOrganisasi($aUnitOrganisasi = null, $comparison = null)
    {
        if (is_array($aUnitOrganisasi)) {
            $useMinMax = false;
            if (isset($aUnitOrganisasi['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_UNIT_ORGANISASI, $aUnitOrganisasi['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aUnitOrganisasi['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_UNIT_ORGANISASI, $aUnitOrganisasi['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::A_UNIT_ORGANISASI, $aUnitOrganisasi, $comparison);
    }

    /**
     * Filter the query on the a_tanah column
     *
     * Example usage:
     * <code>
     * $query->filterByATanah(1234); // WHERE a_tanah = 1234
     * $query->filterByATanah(array(12, 34)); // WHERE a_tanah IN (12, 34)
     * $query->filterByATanah(array('min' => 12)); // WHERE a_tanah >= 12
     * $query->filterByATanah(array('max' => 12)); // WHERE a_tanah <= 12
     * </code>
     *
     * @param     mixed $aTanah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByATanah($aTanah = null, $comparison = null)
    {
        if (is_array($aTanah)) {
            $useMinMax = false;
            if (isset($aTanah['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_TANAH, $aTanah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTanah['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_TANAH, $aTanah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::A_TANAH, $aTanah, $comparison);
    }

    /**
     * Filter the query on the a_bangunan column
     *
     * Example usage:
     * <code>
     * $query->filterByABangunan(1234); // WHERE a_bangunan = 1234
     * $query->filterByABangunan(array(12, 34)); // WHERE a_bangunan IN (12, 34)
     * $query->filterByABangunan(array('min' => 12)); // WHERE a_bangunan >= 12
     * $query->filterByABangunan(array('max' => 12)); // WHERE a_bangunan <= 12
     * </code>
     *
     * @param     mixed $aBangunan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByABangunan($aBangunan = null, $comparison = null)
    {
        if (is_array($aBangunan)) {
            $useMinMax = false;
            if (isset($aBangunan['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_BANGUNAN, $aBangunan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBangunan['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_BANGUNAN, $aBangunan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::A_BANGUNAN, $aBangunan, $comparison);
    }

    /**
     * Filter the query on the a_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByARuang(1234); // WHERE a_ruang = 1234
     * $query->filterByARuang(array(12, 34)); // WHERE a_ruang IN (12, 34)
     * $query->filterByARuang(array('min' => 12)); // WHERE a_ruang >= 12
     * $query->filterByARuang(array('max' => 12)); // WHERE a_ruang <= 12
     * </code>
     *
     * @param     mixed $aRuang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByARuang($aRuang = null, $comparison = null)
    {
        if (is_array($aRuang)) {
            $useMinMax = false;
            if (isset($aRuang['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_RUANG, $aRuang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aRuang['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_RUANG, $aRuang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::A_RUANG, $aRuang, $comparison);
    }

    /**
     * Filter the query on the a_sub column
     *
     * Example usage:
     * <code>
     * $query->filterByASub(1234); // WHERE a_sub = 1234
     * $query->filterByASub(array(12, 34)); // WHERE a_sub IN (12, 34)
     * $query->filterByASub(array('min' => 12)); // WHERE a_sub >= 12
     * $query->filterByASub(array('max' => 12)); // WHERE a_sub <= 12
     * </code>
     *
     * @param     mixed $aSub The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByASub($aSub = null, $comparison = null)
    {
        if (is_array($aSub)) {
            $useMinMax = false;
            if (isset($aSub['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_SUB, $aSub['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aSub['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::A_SUB, $aSub['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::A_SUB, $aSub, $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JenisPrasaranaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JenisPrasaranaPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $bangunan->getJenisPrasaranaId(), $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related PemakaiPrasarana object
     *
     * @param   PemakaiPrasarana|PropelObjectCollection $pemakaiPrasarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPemakaiPrasarana($pemakaiPrasarana, $comparison = null)
    {
        if ($pemakaiPrasarana instanceof PemakaiPrasarana) {
            return $this
                ->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $pemakaiPrasarana->getJenisPrasaranaId(), $comparison);
        } elseif ($pemakaiPrasarana instanceof PropelObjectCollection) {
            return $this
                ->usePemakaiPrasaranaQuery()
                ->filterByPrimaryKeys($pemakaiPrasarana->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPemakaiPrasarana() only accepts arguments of type PemakaiPrasarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PemakaiPrasarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function joinPemakaiPrasarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PemakaiPrasarana');

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
            $this->addJoinObject($join, 'PemakaiPrasarana');
        }

        return $this;
    }

    /**
     * Use the PemakaiPrasarana relation PemakaiPrasarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PemakaiPrasaranaQuery A secondary query class using the current class as primary query
     */
    public function usePemakaiPrasaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPemakaiPrasarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PemakaiPrasarana', '\DataDikdas\Model\PemakaiPrasaranaQuery');
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $ruang->getJenisPrasaranaId(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            return $this
                ->useRuangQuery()
                ->filterByPrimaryKeys($ruang->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRuang() only accepts arguments of type Ruang or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Ruang relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Ruang');

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
            $this->addJoinObject($join, 'Ruang');
        }

        return $this;
    }

    /**
     * Use the Ruang relation Ruang object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RuangQuery A secondary query class using the current class as primary query
     */
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related StandarSarana object
     *
     * @param   StandarSarana|PropelObjectCollection $standarSarana  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStandarSarana($standarSarana, $comparison = null)
    {
        if ($standarSarana instanceof StandarSarana) {
            return $this
                ->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $standarSarana->getJenisPrasaranaId(), $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
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
     * Filter the query by a related Tanah object
     *
     * @param   Tanah|PropelObjectCollection $tanah  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JenisPrasaranaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTanah($tanah, $comparison = null)
    {
        if ($tanah instanceof Tanah) {
            return $this
                ->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $tanah->getJenisPrasaranaId(), $comparison);
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
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function joinTanah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
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
    public function useTanahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTanah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tanah', '\DataDikdas\Model\TanahQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JenisPrasarana $jenisPrasarana Object to remove from the list of results
     *
     * @return JenisPrasaranaQuery The current query, for fluid interface
     */
    public function prune($jenisPrasarana = null)
    {
        if ($jenisPrasarana) {
            $this->addUsingAlias(JenisPrasaranaPeer::JENIS_PRASARANA_ID, $jenisPrasarana->getJenisPrasaranaId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
