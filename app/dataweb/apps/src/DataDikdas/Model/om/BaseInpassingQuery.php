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
use DataDikdas\Model\Inpassing;
use DataDikdas\Model\InpassingPeer;
use DataDikdas\Model\InpassingQuery;
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\VldInpassing;

/**
 * Base class that represents a query for the 'inpassing' table.
 *
 * 
 *
 * @method InpassingQuery orderByInpassingId($order = Criteria::ASC) Order by the inpassing_id column
 * @method InpassingQuery orderByPangkatGolonganId($order = Criteria::ASC) Order by the pangkat_golongan_id column
 * @method InpassingQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method InpassingQuery orderByNoSkInpassing($order = Criteria::ASC) Order by the no_sk_inpassing column
 * @method InpassingQuery orderByTglSkInpassing($order = Criteria::ASC) Order by the tgl_sk_inpassing column
 * @method InpassingQuery orderByTmtInpassing($order = Criteria::ASC) Order by the tmt_inpassing column
 * @method InpassingQuery orderByAngkaKredit($order = Criteria::ASC) Order by the angka_kredit column
 * @method InpassingQuery orderByMasaKerjaTahun($order = Criteria::ASC) Order by the masa_kerja_tahun column
 * @method InpassingQuery orderByMasaKerjaBulan($order = Criteria::ASC) Order by the masa_kerja_bulan column
 * @method InpassingQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method InpassingQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method InpassingQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method InpassingQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method InpassingQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method InpassingQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method InpassingQuery groupByInpassingId() Group by the inpassing_id column
 * @method InpassingQuery groupByPangkatGolonganId() Group by the pangkat_golongan_id column
 * @method InpassingQuery groupByPtkId() Group by the ptk_id column
 * @method InpassingQuery groupByNoSkInpassing() Group by the no_sk_inpassing column
 * @method InpassingQuery groupByTglSkInpassing() Group by the tgl_sk_inpassing column
 * @method InpassingQuery groupByTmtInpassing() Group by the tmt_inpassing column
 * @method InpassingQuery groupByAngkaKredit() Group by the angka_kredit column
 * @method InpassingQuery groupByMasaKerjaTahun() Group by the masa_kerja_tahun column
 * @method InpassingQuery groupByMasaKerjaBulan() Group by the masa_kerja_bulan column
 * @method InpassingQuery groupByAsalData() Group by the asal_data column
 * @method InpassingQuery groupByCreateDate() Group by the create_date column
 * @method InpassingQuery groupByLastUpdate() Group by the last_update column
 * @method InpassingQuery groupBySoftDelete() Group by the soft_delete column
 * @method InpassingQuery groupByLastSync() Group by the last_sync column
 * @method InpassingQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method InpassingQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method InpassingQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method InpassingQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method InpassingQuery leftJoinPangkatGolongan($relationAlias = null) Adds a LEFT JOIN clause to the query using the PangkatGolongan relation
 * @method InpassingQuery rightJoinPangkatGolongan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PangkatGolongan relation
 * @method InpassingQuery innerJoinPangkatGolongan($relationAlias = null) Adds a INNER JOIN clause to the query using the PangkatGolongan relation
 *
 * @method InpassingQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method InpassingQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method InpassingQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method InpassingQuery leftJoinVldInpassing($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldInpassing relation
 * @method InpassingQuery rightJoinVldInpassing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldInpassing relation
 * @method InpassingQuery innerJoinVldInpassing($relationAlias = null) Adds a INNER JOIN clause to the query using the VldInpassing relation
 *
 * @method Inpassing findOne(PropelPDO $con = null) Return the first Inpassing matching the query
 * @method Inpassing findOneOrCreate(PropelPDO $con = null) Return the first Inpassing matching the query, or a new Inpassing object populated from the query conditions when no match is found
 *
 * @method Inpassing findOneByPangkatGolonganId(string $pangkat_golongan_id) Return the first Inpassing filtered by the pangkat_golongan_id column
 * @method Inpassing findOneByPtkId(string $ptk_id) Return the first Inpassing filtered by the ptk_id column
 * @method Inpassing findOneByNoSkInpassing(string $no_sk_inpassing) Return the first Inpassing filtered by the no_sk_inpassing column
 * @method Inpassing findOneByTglSkInpassing(string $tgl_sk_inpassing) Return the first Inpassing filtered by the tgl_sk_inpassing column
 * @method Inpassing findOneByTmtInpassing(string $tmt_inpassing) Return the first Inpassing filtered by the tmt_inpassing column
 * @method Inpassing findOneByAngkaKredit(string $angka_kredit) Return the first Inpassing filtered by the angka_kredit column
 * @method Inpassing findOneByMasaKerjaTahun(string $masa_kerja_tahun) Return the first Inpassing filtered by the masa_kerja_tahun column
 * @method Inpassing findOneByMasaKerjaBulan(string $masa_kerja_bulan) Return the first Inpassing filtered by the masa_kerja_bulan column
 * @method Inpassing findOneByAsalData(string $asal_data) Return the first Inpassing filtered by the asal_data column
 * @method Inpassing findOneByCreateDate(string $create_date) Return the first Inpassing filtered by the create_date column
 * @method Inpassing findOneByLastUpdate(string $last_update) Return the first Inpassing filtered by the last_update column
 * @method Inpassing findOneBySoftDelete(string $soft_delete) Return the first Inpassing filtered by the soft_delete column
 * @method Inpassing findOneByLastSync(string $last_sync) Return the first Inpassing filtered by the last_sync column
 * @method Inpassing findOneByUpdaterId(string $updater_id) Return the first Inpassing filtered by the updater_id column
 *
 * @method array findByInpassingId(string $inpassing_id) Return Inpassing objects filtered by the inpassing_id column
 * @method array findByPangkatGolonganId(string $pangkat_golongan_id) Return Inpassing objects filtered by the pangkat_golongan_id column
 * @method array findByPtkId(string $ptk_id) Return Inpassing objects filtered by the ptk_id column
 * @method array findByNoSkInpassing(string $no_sk_inpassing) Return Inpassing objects filtered by the no_sk_inpassing column
 * @method array findByTglSkInpassing(string $tgl_sk_inpassing) Return Inpassing objects filtered by the tgl_sk_inpassing column
 * @method array findByTmtInpassing(string $tmt_inpassing) Return Inpassing objects filtered by the tmt_inpassing column
 * @method array findByAngkaKredit(string $angka_kredit) Return Inpassing objects filtered by the angka_kredit column
 * @method array findByMasaKerjaTahun(string $masa_kerja_tahun) Return Inpassing objects filtered by the masa_kerja_tahun column
 * @method array findByMasaKerjaBulan(string $masa_kerja_bulan) Return Inpassing objects filtered by the masa_kerja_bulan column
 * @method array findByAsalData(string $asal_data) Return Inpassing objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Inpassing objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Inpassing objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Inpassing objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Inpassing objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Inpassing objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseInpassingQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseInpassingQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Inpassing', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new InpassingQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   InpassingQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return InpassingQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof InpassingQuery) {
            return $criteria;
        }
        $query = new InpassingQuery();
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
     * @return   Inpassing|Inpassing[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = InpassingPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(InpassingPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Inpassing A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByInpassingId($key, $con = null)
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
     * @return                 Inpassing A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "inpassing_id", "pangkat_golongan_id", "ptk_id", "no_sk_inpassing", "tgl_sk_inpassing", "tmt_inpassing", "angka_kredit", "masa_kerja_tahun", "masa_kerja_bulan", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "inpassing" WHERE "inpassing_id" = :p0';
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
            $obj = new Inpassing();
            $obj->hydrate($row);
            InpassingPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Inpassing|Inpassing[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Inpassing[]|mixed the list of results, formatted by the current formatter
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(InpassingPeer::INPASSING_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(InpassingPeer::INPASSING_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the inpassing_id column
     *
     * Example usage:
     * <code>
     * $query->filterByInpassingId('fooValue');   // WHERE inpassing_id = 'fooValue'
     * $query->filterByInpassingId('%fooValue%'); // WHERE inpassing_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $inpassingId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByInpassingId($inpassingId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($inpassingId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $inpassingId)) {
                $inpassingId = str_replace('*', '%', $inpassingId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InpassingPeer::INPASSING_ID, $inpassingId, $comparison);
    }

    /**
     * Filter the query on the pangkat_golongan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPangkatGolonganId(1234); // WHERE pangkat_golongan_id = 1234
     * $query->filterByPangkatGolonganId(array(12, 34)); // WHERE pangkat_golongan_id IN (12, 34)
     * $query->filterByPangkatGolonganId(array('min' => 12)); // WHERE pangkat_golongan_id >= 12
     * $query->filterByPangkatGolonganId(array('max' => 12)); // WHERE pangkat_golongan_id <= 12
     * </code>
     *
     * @see       filterByPangkatGolongan()
     *
     * @param     mixed $pangkatGolonganId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByPangkatGolonganId($pangkatGolonganId = null, $comparison = null)
    {
        if (is_array($pangkatGolonganId)) {
            $useMinMax = false;
            if (isset($pangkatGolonganId['min'])) {
                $this->addUsingAlias(InpassingPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pangkatGolonganId['max'])) {
                $this->addUsingAlias(InpassingPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InpassingPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the no_sk_inpassing column
     *
     * Example usage:
     * <code>
     * $query->filterByNoSkInpassing('fooValue');   // WHERE no_sk_inpassing = 'fooValue'
     * $query->filterByNoSkInpassing('%fooValue%'); // WHERE no_sk_inpassing LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noSkInpassing The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByNoSkInpassing($noSkInpassing = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noSkInpassing)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noSkInpassing)) {
                $noSkInpassing = str_replace('*', '%', $noSkInpassing);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InpassingPeer::NO_SK_INPASSING, $noSkInpassing, $comparison);
    }

    /**
     * Filter the query on the tgl_sk_inpassing column
     *
     * Example usage:
     * <code>
     * $query->filterByTglSkInpassing('2011-03-14'); // WHERE tgl_sk_inpassing = '2011-03-14'
     * $query->filterByTglSkInpassing('now'); // WHERE tgl_sk_inpassing = '2011-03-14'
     * $query->filterByTglSkInpassing(array('max' => 'yesterday')); // WHERE tgl_sk_inpassing > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglSkInpassing The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByTglSkInpassing($tglSkInpassing = null, $comparison = null)
    {
        if (is_array($tglSkInpassing)) {
            $useMinMax = false;
            if (isset($tglSkInpassing['min'])) {
                $this->addUsingAlias(InpassingPeer::TGL_SK_INPASSING, $tglSkInpassing['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglSkInpassing['max'])) {
                $this->addUsingAlias(InpassingPeer::TGL_SK_INPASSING, $tglSkInpassing['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::TGL_SK_INPASSING, $tglSkInpassing, $comparison);
    }

    /**
     * Filter the query on the tmt_inpassing column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtInpassing('2011-03-14'); // WHERE tmt_inpassing = '2011-03-14'
     * $query->filterByTmtInpassing('now'); // WHERE tmt_inpassing = '2011-03-14'
     * $query->filterByTmtInpassing(array('max' => 'yesterday')); // WHERE tmt_inpassing > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtInpassing The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByTmtInpassing($tmtInpassing = null, $comparison = null)
    {
        if (is_array($tmtInpassing)) {
            $useMinMax = false;
            if (isset($tmtInpassing['min'])) {
                $this->addUsingAlias(InpassingPeer::TMT_INPASSING, $tmtInpassing['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtInpassing['max'])) {
                $this->addUsingAlias(InpassingPeer::TMT_INPASSING, $tmtInpassing['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::TMT_INPASSING, $tmtInpassing, $comparison);
    }

    /**
     * Filter the query on the angka_kredit column
     *
     * Example usage:
     * <code>
     * $query->filterByAngkaKredit(1234); // WHERE angka_kredit = 1234
     * $query->filterByAngkaKredit(array(12, 34)); // WHERE angka_kredit IN (12, 34)
     * $query->filterByAngkaKredit(array('min' => 12)); // WHERE angka_kredit >= 12
     * $query->filterByAngkaKredit(array('max' => 12)); // WHERE angka_kredit <= 12
     * </code>
     *
     * @param     mixed $angkaKredit The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByAngkaKredit($angkaKredit = null, $comparison = null)
    {
        if (is_array($angkaKredit)) {
            $useMinMax = false;
            if (isset($angkaKredit['min'])) {
                $this->addUsingAlias(InpassingPeer::ANGKA_KREDIT, $angkaKredit['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($angkaKredit['max'])) {
                $this->addUsingAlias(InpassingPeer::ANGKA_KREDIT, $angkaKredit['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::ANGKA_KREDIT, $angkaKredit, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_tahun column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaTahun(1234); // WHERE masa_kerja_tahun = 1234
     * $query->filterByMasaKerjaTahun(array(12, 34)); // WHERE masa_kerja_tahun IN (12, 34)
     * $query->filterByMasaKerjaTahun(array('min' => 12)); // WHERE masa_kerja_tahun >= 12
     * $query->filterByMasaKerjaTahun(array('max' => 12)); // WHERE masa_kerja_tahun <= 12
     * </code>
     *
     * @param     mixed $masaKerjaTahun The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaTahun($masaKerjaTahun = null, $comparison = null)
    {
        if (is_array($masaKerjaTahun)) {
            $useMinMax = false;
            if (isset($masaKerjaTahun['min'])) {
                $this->addUsingAlias(InpassingPeer::MASA_KERJA_TAHUN, $masaKerjaTahun['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaTahun['max'])) {
                $this->addUsingAlias(InpassingPeer::MASA_KERJA_TAHUN, $masaKerjaTahun['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::MASA_KERJA_TAHUN, $masaKerjaTahun, $comparison);
    }

    /**
     * Filter the query on the masa_kerja_bulan column
     *
     * Example usage:
     * <code>
     * $query->filterByMasaKerjaBulan(1234); // WHERE masa_kerja_bulan = 1234
     * $query->filterByMasaKerjaBulan(array(12, 34)); // WHERE masa_kerja_bulan IN (12, 34)
     * $query->filterByMasaKerjaBulan(array('min' => 12)); // WHERE masa_kerja_bulan >= 12
     * $query->filterByMasaKerjaBulan(array('max' => 12)); // WHERE masa_kerja_bulan <= 12
     * </code>
     *
     * @param     mixed $masaKerjaBulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByMasaKerjaBulan($masaKerjaBulan = null, $comparison = null)
    {
        if (is_array($masaKerjaBulan)) {
            $useMinMax = false;
            if (isset($masaKerjaBulan['min'])) {
                $this->addUsingAlias(InpassingPeer::MASA_KERJA_BULAN, $masaKerjaBulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($masaKerjaBulan['max'])) {
                $this->addUsingAlias(InpassingPeer::MASA_KERJA_BULAN, $masaKerjaBulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::MASA_KERJA_BULAN, $masaKerjaBulan, $comparison);
    }

    /**
     * Filter the query on the asal_data column
     *
     * Example usage:
     * <code>
     * $query->filterByAsalData('fooValue');   // WHERE asal_data = 'fooValue'
     * $query->filterByAsalData('%fooValue%'); // WHERE asal_data LIKE '%fooValue%'
     * </code>
     *
     * @param     string $asalData The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByAsalData($asalData = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($asalData)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $asalData)) {
                $asalData = str_replace('*', '%', $asalData);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(InpassingPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(InpassingPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(InpassingPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(InpassingPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(InpassingPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(InpassingPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(InpassingPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(InpassingPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(InpassingPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(InpassingPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
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

        return $this->addUsingAlias(InpassingPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related PangkatGolongan object
     *
     * @param   PangkatGolongan|PropelObjectCollection $pangkatGolongan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InpassingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPangkatGolongan($pangkatGolongan, $comparison = null)
    {
        if ($pangkatGolongan instanceof PangkatGolongan) {
            return $this
                ->addUsingAlias(InpassingPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->getPangkatGolonganId(), $comparison);
        } elseif ($pangkatGolongan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InpassingPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->toKeyValue('PrimaryKey', 'PangkatGolonganId'), $comparison);
        } else {
            throw new PropelException('filterByPangkatGolongan() only accepts arguments of type PangkatGolongan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PangkatGolongan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function joinPangkatGolongan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PangkatGolongan');

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
            $this->addJoinObject($join, 'PangkatGolongan');
        }

        return $this;
    }

    /**
     * Use the PangkatGolongan relation PangkatGolongan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PangkatGolonganQuery A secondary query class using the current class as primary query
     */
    public function usePangkatGolonganQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPangkatGolongan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PangkatGolongan', '\DataDikdas\Model\PangkatGolonganQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InpassingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(InpassingPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(InpassingPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return InpassingQuery The current query, for fluid interface
     */
    public function joinPtk($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function usePtkQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ptk', '\DataDikdas\Model\PtkQuery');
    }

    /**
     * Filter the query by a related VldInpassing object
     *
     * @param   VldInpassing|PropelObjectCollection $vldInpassing  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 InpassingQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldInpassing($vldInpassing, $comparison = null)
    {
        if ($vldInpassing instanceof VldInpassing) {
            return $this
                ->addUsingAlias(InpassingPeer::INPASSING_ID, $vldInpassing->getInpassingId(), $comparison);
        } elseif ($vldInpassing instanceof PropelObjectCollection) {
            return $this
                ->useVldInpassingQuery()
                ->filterByPrimaryKeys($vldInpassing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldInpassing() only accepts arguments of type VldInpassing or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldInpassing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function joinVldInpassing($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldInpassing');

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
            $this->addJoinObject($join, 'VldInpassing');
        }

        return $this;
    }

    /**
     * Use the VldInpassing relation VldInpassing object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldInpassingQuery A secondary query class using the current class as primary query
     */
    public function useVldInpassingQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldInpassing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldInpassing', '\DataDikdas\Model\VldInpassingQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Inpassing $inpassing Object to remove from the list of results
     *
     * @return InpassingQuery The current query, for fluid interface
     */
    public function prune($inpassing = null)
    {
        if ($inpassing) {
            $this->addUsingAlias(InpassingPeer::INPASSING_ID, $inpassing->getInpassingId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
