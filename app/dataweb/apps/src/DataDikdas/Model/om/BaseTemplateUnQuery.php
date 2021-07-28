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
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TemplateRapor;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnPeer;
use DataDikdas\Model\TemplateUnQuery;
use DataDikdas\Model\Un;

/**
 * Base class that represents a query for the 'ref.template_un' table.
 *
 * 
 *
 * @method TemplateUnQuery orderByTemplateId($order = Criteria::ASC) Order by the template_id column
 * @method TemplateUnQuery orderByJenjangPendidikanId($order = Criteria::ASC) Order by the jenjang_pendidikan_id column
 * @method TemplateUnQuery orderByTahunAjaranId($order = Criteria::ASC) Order by the tahun_ajaran_id column
 * @method TemplateUnQuery orderByJurusanId($order = Criteria::ASC) Order by the jurusan_id column
 * @method TemplateUnQuery orderByTemplateKet($order = Criteria::ASC) Order by the template_ket column
 * @method TemplateUnQuery orderByMp1Id($order = Criteria::ASC) Order by the mp1_id column
 * @method TemplateUnQuery orderByMp2Id($order = Criteria::ASC) Order by the mp2_id column
 * @method TemplateUnQuery orderByMp3Id($order = Criteria::ASC) Order by the mp3_id column
 * @method TemplateUnQuery orderByMp4Id($order = Criteria::ASC) Order by the mp4_id column
 * @method TemplateUnQuery orderByMp5Id($order = Criteria::ASC) Order by the mp5_id column
 * @method TemplateUnQuery orderByMp6Id($order = Criteria::ASC) Order by the mp6_id column
 * @method TemplateUnQuery orderByMp7Id($order = Criteria::ASC) Order by the mp7_id column
 * @method TemplateUnQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TemplateUnQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TemplateUnQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method TemplateUnQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method TemplateUnQuery groupByTemplateId() Group by the template_id column
 * @method TemplateUnQuery groupByJenjangPendidikanId() Group by the jenjang_pendidikan_id column
 * @method TemplateUnQuery groupByTahunAjaranId() Group by the tahun_ajaran_id column
 * @method TemplateUnQuery groupByJurusanId() Group by the jurusan_id column
 * @method TemplateUnQuery groupByTemplateKet() Group by the template_ket column
 * @method TemplateUnQuery groupByMp1Id() Group by the mp1_id column
 * @method TemplateUnQuery groupByMp2Id() Group by the mp2_id column
 * @method TemplateUnQuery groupByMp3Id() Group by the mp3_id column
 * @method TemplateUnQuery groupByMp4Id() Group by the mp4_id column
 * @method TemplateUnQuery groupByMp5Id() Group by the mp5_id column
 * @method TemplateUnQuery groupByMp6Id() Group by the mp6_id column
 * @method TemplateUnQuery groupByMp7Id() Group by the mp7_id column
 * @method TemplateUnQuery groupByCreateDate() Group by the create_date column
 * @method TemplateUnQuery groupByLastUpdate() Group by the last_update column
 * @method TemplateUnQuery groupByExpiredDate() Group by the expired_date column
 * @method TemplateUnQuery groupByLastSync() Group by the last_sync column
 *
 * @method TemplateUnQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TemplateUnQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TemplateUnQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TemplateUnQuery leftJoinJenjangPendidikan($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikan relation
 * @method TemplateUnQuery rightJoinJenjangPendidikan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikan relation
 * @method TemplateUnQuery innerJoinJenjangPendidikan($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikan relation
 *
 * @method TemplateUnQuery leftJoinJurusan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Jurusan relation
 * @method TemplateUnQuery rightJoinJurusan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Jurusan relation
 * @method TemplateUnQuery innerJoinJurusan($relationAlias = null) Adds a INNER JOIN clause to the query using the Jurusan relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp3Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp3Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp3Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp3Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp3Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp3Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp4Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp4Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp4Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp4Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp4Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp4Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp7Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp7Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp7Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp7Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp7Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp7Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp5Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp5Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp5Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp5Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp5Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp5Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp1Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp1Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp1Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp1Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp1Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp1Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp2Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp2Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp2Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp2Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp2Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp2Id relation
 *
 * @method TemplateUnQuery leftJoinMataPelajaranRelatedByMp6Id($relationAlias = null) Adds a LEFT JOIN clause to the query using the MataPelajaranRelatedByMp6Id relation
 * @method TemplateUnQuery rightJoinMataPelajaranRelatedByMp6Id($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MataPelajaranRelatedByMp6Id relation
 * @method TemplateUnQuery innerJoinMataPelajaranRelatedByMp6Id($relationAlias = null) Adds a INNER JOIN clause to the query using the MataPelajaranRelatedByMp6Id relation
 *
 * @method TemplateUnQuery leftJoinTahunAjaran($relationAlias = null) Adds a LEFT JOIN clause to the query using the TahunAjaran relation
 * @method TemplateUnQuery rightJoinTahunAjaran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TahunAjaran relation
 * @method TemplateUnQuery innerJoinTahunAjaran($relationAlias = null) Adds a INNER JOIN clause to the query using the TahunAjaran relation
 *
 * @method TemplateUnQuery leftJoinTemplateRapor($relationAlias = null) Adds a LEFT JOIN clause to the query using the TemplateRapor relation
 * @method TemplateUnQuery rightJoinTemplateRapor($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TemplateRapor relation
 * @method TemplateUnQuery innerJoinTemplateRapor($relationAlias = null) Adds a INNER JOIN clause to the query using the TemplateRapor relation
 *
 * @method TemplateUnQuery leftJoinUn($relationAlias = null) Adds a LEFT JOIN clause to the query using the Un relation
 * @method TemplateUnQuery rightJoinUn($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Un relation
 * @method TemplateUnQuery innerJoinUn($relationAlias = null) Adds a INNER JOIN clause to the query using the Un relation
 *
 * @method TemplateUn findOne(PropelPDO $con = null) Return the first TemplateUn matching the query
 * @method TemplateUn findOneOrCreate(PropelPDO $con = null) Return the first TemplateUn matching the query, or a new TemplateUn object populated from the query conditions when no match is found
 *
 * @method TemplateUn findOneByJenjangPendidikanId(string $jenjang_pendidikan_id) Return the first TemplateUn filtered by the jenjang_pendidikan_id column
 * @method TemplateUn findOneByTahunAjaranId(string $tahun_ajaran_id) Return the first TemplateUn filtered by the tahun_ajaran_id column
 * @method TemplateUn findOneByJurusanId(string $jurusan_id) Return the first TemplateUn filtered by the jurusan_id column
 * @method TemplateUn findOneByTemplateKet(string $template_ket) Return the first TemplateUn filtered by the template_ket column
 * @method TemplateUn findOneByMp1Id(int $mp1_id) Return the first TemplateUn filtered by the mp1_id column
 * @method TemplateUn findOneByMp2Id(int $mp2_id) Return the first TemplateUn filtered by the mp2_id column
 * @method TemplateUn findOneByMp3Id(int $mp3_id) Return the first TemplateUn filtered by the mp3_id column
 * @method TemplateUn findOneByMp4Id(int $mp4_id) Return the first TemplateUn filtered by the mp4_id column
 * @method TemplateUn findOneByMp5Id(int $mp5_id) Return the first TemplateUn filtered by the mp5_id column
 * @method TemplateUn findOneByMp6Id(int $mp6_id) Return the first TemplateUn filtered by the mp6_id column
 * @method TemplateUn findOneByMp7Id(int $mp7_id) Return the first TemplateUn filtered by the mp7_id column
 * @method TemplateUn findOneByCreateDate(string $create_date) Return the first TemplateUn filtered by the create_date column
 * @method TemplateUn findOneByLastUpdate(string $last_update) Return the first TemplateUn filtered by the last_update column
 * @method TemplateUn findOneByExpiredDate(string $expired_date) Return the first TemplateUn filtered by the expired_date column
 * @method TemplateUn findOneByLastSync(string $last_sync) Return the first TemplateUn filtered by the last_sync column
 *
 * @method array findByTemplateId(string $template_id) Return TemplateUn objects filtered by the template_id column
 * @method array findByJenjangPendidikanId(string $jenjang_pendidikan_id) Return TemplateUn objects filtered by the jenjang_pendidikan_id column
 * @method array findByTahunAjaranId(string $tahun_ajaran_id) Return TemplateUn objects filtered by the tahun_ajaran_id column
 * @method array findByJurusanId(string $jurusan_id) Return TemplateUn objects filtered by the jurusan_id column
 * @method array findByTemplateKet(string $template_ket) Return TemplateUn objects filtered by the template_ket column
 * @method array findByMp1Id(int $mp1_id) Return TemplateUn objects filtered by the mp1_id column
 * @method array findByMp2Id(int $mp2_id) Return TemplateUn objects filtered by the mp2_id column
 * @method array findByMp3Id(int $mp3_id) Return TemplateUn objects filtered by the mp3_id column
 * @method array findByMp4Id(int $mp4_id) Return TemplateUn objects filtered by the mp4_id column
 * @method array findByMp5Id(int $mp5_id) Return TemplateUn objects filtered by the mp5_id column
 * @method array findByMp6Id(int $mp6_id) Return TemplateUn objects filtered by the mp6_id column
 * @method array findByMp7Id(int $mp7_id) Return TemplateUn objects filtered by the mp7_id column
 * @method array findByCreateDate(string $create_date) Return TemplateUn objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TemplateUn objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return TemplateUn objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return TemplateUn objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTemplateUnQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTemplateUnQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TemplateUn', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TemplateUnQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TemplateUnQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TemplateUnQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TemplateUnQuery) {
            return $criteria;
        }
        $query = new TemplateUnQuery();
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
     * @return   TemplateUn|TemplateUn[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TemplateUnPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TemplateUnPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TemplateUn A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTemplateId($key, $con = null)
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
     * @return                 TemplateUn A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "template_id", "jenjang_pendidikan_id", "tahun_ajaran_id", "jurusan_id", "template_ket", "mp1_id", "mp2_id", "mp3_id", "mp4_id", "mp5_id", "mp6_id", "mp7_id", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."template_un" WHERE "template_id" = :p0';
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
            $obj = new TemplateUn();
            $obj->hydrate($row);
            TemplateUnPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TemplateUn|TemplateUn[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TemplateUn[]|mixed the list of results, formatted by the current formatter
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $keys, Criteria::IN);
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
     * @return TemplateUnQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $templateId, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanId($jenjangPendidikanId = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanId)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanId['min'])) {
                $this->addUsingAlias(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanId['max'])) {
                $this->addUsingAlias(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikanId, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByTahunAjaranId($tahunAjaranId = null, $comparison = null)
    {
        if (is_array($tahunAjaranId)) {
            $useMinMax = false;
            if (isset($tahunAjaranId['min'])) {
                $this->addUsingAlias(TemplateUnPeer::TAHUN_AJARAN_ID, $tahunAjaranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunAjaranId['max'])) {
                $this->addUsingAlias(TemplateUnPeer::TAHUN_AJARAN_ID, $tahunAjaranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::TAHUN_AJARAN_ID, $tahunAjaranId, $comparison);
    }

    /**
     * Filter the query on the jurusan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJurusanId('fooValue');   // WHERE jurusan_id = 'fooValue'
     * $query->filterByJurusanId('%fooValue%'); // WHERE jurusan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jurusanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByJurusanId($jurusanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jurusanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jurusanId)) {
                $jurusanId = str_replace('*', '%', $jurusanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::JURUSAN_ID, $jurusanId, $comparison);
    }

    /**
     * Filter the query on the template_ket column
     *
     * Example usage:
     * <code>
     * $query->filterByTemplateKet('fooValue');   // WHERE template_ket = 'fooValue'
     * $query->filterByTemplateKet('%fooValue%'); // WHERE template_ket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $templateKet The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByTemplateKet($templateKet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($templateKet)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $templateKet)) {
                $templateKet = str_replace('*', '%', $templateKet);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::TEMPLATE_KET, $templateKet, $comparison);
    }

    /**
     * Filter the query on the mp1_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp1Id(1234); // WHERE mp1_id = 1234
     * $query->filterByMp1Id(array(12, 34)); // WHERE mp1_id IN (12, 34)
     * $query->filterByMp1Id(array('min' => 12)); // WHERE mp1_id >= 12
     * $query->filterByMp1Id(array('max' => 12)); // WHERE mp1_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp1Id()
     *
     * @param     mixed $mp1Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp1Id($mp1Id = null, $comparison = null)
    {
        if (is_array($mp1Id)) {
            $useMinMax = false;
            if (isset($mp1Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP1_ID, $mp1Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp1Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP1_ID, $mp1Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP1_ID, $mp1Id, $comparison);
    }

    /**
     * Filter the query on the mp2_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp2Id(1234); // WHERE mp2_id = 1234
     * $query->filterByMp2Id(array(12, 34)); // WHERE mp2_id IN (12, 34)
     * $query->filterByMp2Id(array('min' => 12)); // WHERE mp2_id >= 12
     * $query->filterByMp2Id(array('max' => 12)); // WHERE mp2_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp2Id()
     *
     * @param     mixed $mp2Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp2Id($mp2Id = null, $comparison = null)
    {
        if (is_array($mp2Id)) {
            $useMinMax = false;
            if (isset($mp2Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP2_ID, $mp2Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp2Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP2_ID, $mp2Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP2_ID, $mp2Id, $comparison);
    }

    /**
     * Filter the query on the mp3_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp3Id(1234); // WHERE mp3_id = 1234
     * $query->filterByMp3Id(array(12, 34)); // WHERE mp3_id IN (12, 34)
     * $query->filterByMp3Id(array('min' => 12)); // WHERE mp3_id >= 12
     * $query->filterByMp3Id(array('max' => 12)); // WHERE mp3_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp3Id()
     *
     * @param     mixed $mp3Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp3Id($mp3Id = null, $comparison = null)
    {
        if (is_array($mp3Id)) {
            $useMinMax = false;
            if (isset($mp3Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP3_ID, $mp3Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp3Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP3_ID, $mp3Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP3_ID, $mp3Id, $comparison);
    }

    /**
     * Filter the query on the mp4_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp4Id(1234); // WHERE mp4_id = 1234
     * $query->filterByMp4Id(array(12, 34)); // WHERE mp4_id IN (12, 34)
     * $query->filterByMp4Id(array('min' => 12)); // WHERE mp4_id >= 12
     * $query->filterByMp4Id(array('max' => 12)); // WHERE mp4_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp4Id()
     *
     * @param     mixed $mp4Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp4Id($mp4Id = null, $comparison = null)
    {
        if (is_array($mp4Id)) {
            $useMinMax = false;
            if (isset($mp4Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP4_ID, $mp4Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp4Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP4_ID, $mp4Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP4_ID, $mp4Id, $comparison);
    }

    /**
     * Filter the query on the mp5_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp5Id(1234); // WHERE mp5_id = 1234
     * $query->filterByMp5Id(array(12, 34)); // WHERE mp5_id IN (12, 34)
     * $query->filterByMp5Id(array('min' => 12)); // WHERE mp5_id >= 12
     * $query->filterByMp5Id(array('max' => 12)); // WHERE mp5_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp5Id()
     *
     * @param     mixed $mp5Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp5Id($mp5Id = null, $comparison = null)
    {
        if (is_array($mp5Id)) {
            $useMinMax = false;
            if (isset($mp5Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP5_ID, $mp5Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp5Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP5_ID, $mp5Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP5_ID, $mp5Id, $comparison);
    }

    /**
     * Filter the query on the mp6_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp6Id(1234); // WHERE mp6_id = 1234
     * $query->filterByMp6Id(array(12, 34)); // WHERE mp6_id IN (12, 34)
     * $query->filterByMp6Id(array('min' => 12)); // WHERE mp6_id >= 12
     * $query->filterByMp6Id(array('max' => 12)); // WHERE mp6_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp6Id()
     *
     * @param     mixed $mp6Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp6Id($mp6Id = null, $comparison = null)
    {
        if (is_array($mp6Id)) {
            $useMinMax = false;
            if (isset($mp6Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP6_ID, $mp6Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp6Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP6_ID, $mp6Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP6_ID, $mp6Id, $comparison);
    }

    /**
     * Filter the query on the mp7_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMp7Id(1234); // WHERE mp7_id = 1234
     * $query->filterByMp7Id(array(12, 34)); // WHERE mp7_id IN (12, 34)
     * $query->filterByMp7Id(array('min' => 12)); // WHERE mp7_id >= 12
     * $query->filterByMp7Id(array('max' => 12)); // WHERE mp7_id <= 12
     * </code>
     *
     * @see       filterByMataPelajaranRelatedByMp7Id()
     *
     * @param     mixed $mp7Id The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByMp7Id($mp7Id = null, $comparison = null)
    {
        if (is_array($mp7Id)) {
            $useMinMax = false;
            if (isset($mp7Id['min'])) {
                $this->addUsingAlias(TemplateUnPeer::MP7_ID, $mp7Id['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mp7Id['max'])) {
                $this->addUsingAlias(TemplateUnPeer::MP7_ID, $mp7Id['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::MP7_ID, $mp7Id, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TemplateUnPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TemplateUnPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TemplateUnPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TemplateUnPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(TemplateUnPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(TemplateUnPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TemplateUnPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TemplateUnPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TemplateUnPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikan($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::JENJANG_PENDIDIKAN_ID, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
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
     * Filter the query by a related Jurusan object
     *
     * @param   Jurusan|PropelObjectCollection $jurusan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJurusan($jurusan, $comparison = null)
    {
        if ($jurusan instanceof Jurusan) {
            return $this
                ->addUsingAlias(TemplateUnPeer::JURUSAN_ID, $jurusan->getJurusanId(), $comparison);
        } elseif ($jurusan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::JURUSAN_ID, $jurusan->toKeyValue('PrimaryKey', 'JurusanId'), $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
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
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp3Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP3_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP3_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp3Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp3Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp3Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp3Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp3Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp3Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp3IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp3Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp3Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp4Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP4_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP4_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp4Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp4Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp4Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp4Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp4Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp4Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp4IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp4Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp4Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp7Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP7_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP7_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp7Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp7Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp7Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp7Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp7Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp7Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp7IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp7Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp7Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp5Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP5_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP5_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp5Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp5Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp5Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp5Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp5Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp5Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp5IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp5Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp5Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp1Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP1_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP1_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp1Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp1Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp1Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp1Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp1Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp1Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp1IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp1Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp1Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp2Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP2_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP2_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp2Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp2Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp2Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp2Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp2Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp2Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp2IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp2Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp2Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related MataPelajaran object
     *
     * @param   MataPelajaran|PropelObjectCollection $mataPelajaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMataPelajaranRelatedByMp6Id($mataPelajaran, $comparison = null)
    {
        if ($mataPelajaran instanceof MataPelajaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::MP6_ID, $mataPelajaran->getMataPelajaranId(), $comparison);
        } elseif ($mataPelajaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::MP6_ID, $mataPelajaran->toKeyValue('PrimaryKey', 'MataPelajaranId'), $comparison);
        } else {
            throw new PropelException('filterByMataPelajaranRelatedByMp6Id() only accepts arguments of type MataPelajaran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MataPelajaranRelatedByMp6Id relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinMataPelajaranRelatedByMp6Id($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MataPelajaranRelatedByMp6Id');

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
            $this->addJoinObject($join, 'MataPelajaranRelatedByMp6Id');
        }

        return $this;
    }

    /**
     * Use the MataPelajaranRelatedByMp6Id relation MataPelajaran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MataPelajaranQuery A secondary query class using the current class as primary query
     */
    public function useMataPelajaranRelatedByMp6IdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMataPelajaranRelatedByMp6Id($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MataPelajaranRelatedByMp6Id', '\DataDikdas\Model\MataPelajaranQuery');
    }

    /**
     * Filter the query by a related TahunAjaran object
     *
     * @param   TahunAjaran|PropelObjectCollection $tahunAjaran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTahunAjaran($tahunAjaran, $comparison = null)
    {
        if ($tahunAjaran instanceof TahunAjaran) {
            return $this
                ->addUsingAlias(TemplateUnPeer::TAHUN_AJARAN_ID, $tahunAjaran->getTahunAjaranId(), $comparison);
        } elseif ($tahunAjaran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TemplateUnPeer::TAHUN_AJARAN_ID, $tahunAjaran->toKeyValue('PrimaryKey', 'TahunAjaranId'), $comparison);
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
     * @return TemplateUnQuery The current query, for fluid interface
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
     * Filter the query by a related TemplateRapor object
     *
     * @param   TemplateRapor|PropelObjectCollection $templateRapor  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTemplateRapor($templateRapor, $comparison = null)
    {
        if ($templateRapor instanceof TemplateRapor) {
            return $this
                ->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $templateRapor->getTemplateId(), $comparison);
        } elseif ($templateRapor instanceof PropelObjectCollection) {
            return $this
                ->useTemplateRaporQuery()
                ->filterByPrimaryKeys($templateRapor->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTemplateRapor() only accepts arguments of type TemplateRapor or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TemplateRapor relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinTemplateRapor($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TemplateRapor');

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
            $this->addJoinObject($join, 'TemplateRapor');
        }

        return $this;
    }

    /**
     * Use the TemplateRapor relation TemplateRapor object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TemplateRaporQuery A secondary query class using the current class as primary query
     */
    public function useTemplateRaporQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTemplateRapor($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TemplateRapor', '\DataDikdas\Model\TemplateRaporQuery');
    }

    /**
     * Filter the query by a related Un object
     *
     * @param   Un|PropelObjectCollection $un  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TemplateUnQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUn($un, $comparison = null)
    {
        if ($un instanceof Un) {
            return $this
                ->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $un->getTemplateId(), $comparison);
        } elseif ($un instanceof PropelObjectCollection) {
            return $this
                ->useUnQuery()
                ->filterByPrimaryKeys($un->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByUn() only accepts arguments of type Un or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Un relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function joinUn($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Un');

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
            $this->addJoinObject($join, 'Un');
        }

        return $this;
    }

    /**
     * Use the Un relation Un object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnQuery A secondary query class using the current class as primary query
     */
    public function useUnQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUn($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Un', '\DataDikdas\Model\UnQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TemplateUn $templateUn Object to remove from the list of results
     *
     * @return TemplateUnQuery The current query, for fluid interface
     */
    public function prune($templateUn = null)
    {
        if ($templateUn) {
            $this->addUsingAlias(TemplateUnPeer::TEMPLATE_ID, $templateUn->getTemplateId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
