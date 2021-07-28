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
use DataDikdas\Model\JabatanTugasPtk;
use DataDikdas\Model\JabatanTugasPtkPeer;
use DataDikdas\Model\JabatanTugasPtkQuery;
use DataDikdas\Model\RwyStruktural;
use DataDikdas\Model\TugasTambahan;

/**
 * Base class that represents a query for the 'ref.jabatan_tugas_ptk' table.
 *
 * 
 *
 * @method JabatanTugasPtkQuery orderByJabatanPtkId($order = Criteria::ASC) Order by the jabatan_ptk_id column
 * @method JabatanTugasPtkQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method JabatanTugasPtkQuery orderByJabatanUtama($order = Criteria::ASC) Order by the jabatan_utama column
 * @method JabatanTugasPtkQuery orderByTugasTambahanGuru($order = Criteria::ASC) Order by the tugas_tambahan_guru column
 * @method JabatanTugasPtkQuery orderByJumlahJamDiakui($order = Criteria::ASC) Order by the jumlah_jam_diakui column
 * @method JabatanTugasPtkQuery orderByHarusReferUnitOrg($order = Criteria::ASC) Order by the harus_refer_unit_org column
 * @method JabatanTugasPtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method JabatanTugasPtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method JabatanTugasPtkQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method JabatanTugasPtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method JabatanTugasPtkQuery groupByJabatanPtkId() Group by the jabatan_ptk_id column
 * @method JabatanTugasPtkQuery groupByNama() Group by the nama column
 * @method JabatanTugasPtkQuery groupByJabatanUtama() Group by the jabatan_utama column
 * @method JabatanTugasPtkQuery groupByTugasTambahanGuru() Group by the tugas_tambahan_guru column
 * @method JabatanTugasPtkQuery groupByJumlahJamDiakui() Group by the jumlah_jam_diakui column
 * @method JabatanTugasPtkQuery groupByHarusReferUnitOrg() Group by the harus_refer_unit_org column
 * @method JabatanTugasPtkQuery groupByCreateDate() Group by the create_date column
 * @method JabatanTugasPtkQuery groupByLastUpdate() Group by the last_update column
 * @method JabatanTugasPtkQuery groupByExpiredDate() Group by the expired_date column
 * @method JabatanTugasPtkQuery groupByLastSync() Group by the last_sync column
 *
 * @method JabatanTugasPtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method JabatanTugasPtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method JabatanTugasPtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method JabatanTugasPtkQuery leftJoinRwyStruktural($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyStruktural relation
 * @method JabatanTugasPtkQuery rightJoinRwyStruktural($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyStruktural relation
 * @method JabatanTugasPtkQuery innerJoinRwyStruktural($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyStruktural relation
 *
 * @method JabatanTugasPtkQuery leftJoinTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TugasTambahan relation
 * @method JabatanTugasPtkQuery rightJoinTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TugasTambahan relation
 * @method JabatanTugasPtkQuery innerJoinTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the TugasTambahan relation
 *
 * @method JabatanTugasPtk findOne(PropelPDO $con = null) Return the first JabatanTugasPtk matching the query
 * @method JabatanTugasPtk findOneOrCreate(PropelPDO $con = null) Return the first JabatanTugasPtk matching the query, or a new JabatanTugasPtk object populated from the query conditions when no match is found
 *
 * @method JabatanTugasPtk findOneByNama(string $nama) Return the first JabatanTugasPtk filtered by the nama column
 * @method JabatanTugasPtk findOneByJabatanUtama(string $jabatan_utama) Return the first JabatanTugasPtk filtered by the jabatan_utama column
 * @method JabatanTugasPtk findOneByTugasTambahanGuru(string $tugas_tambahan_guru) Return the first JabatanTugasPtk filtered by the tugas_tambahan_guru column
 * @method JabatanTugasPtk findOneByJumlahJamDiakui(string $jumlah_jam_diakui) Return the first JabatanTugasPtk filtered by the jumlah_jam_diakui column
 * @method JabatanTugasPtk findOneByHarusReferUnitOrg(string $harus_refer_unit_org) Return the first JabatanTugasPtk filtered by the harus_refer_unit_org column
 * @method JabatanTugasPtk findOneByCreateDate(string $create_date) Return the first JabatanTugasPtk filtered by the create_date column
 * @method JabatanTugasPtk findOneByLastUpdate(string $last_update) Return the first JabatanTugasPtk filtered by the last_update column
 * @method JabatanTugasPtk findOneByExpiredDate(string $expired_date) Return the first JabatanTugasPtk filtered by the expired_date column
 * @method JabatanTugasPtk findOneByLastSync(string $last_sync) Return the first JabatanTugasPtk filtered by the last_sync column
 *
 * @method array findByJabatanPtkId(string $jabatan_ptk_id) Return JabatanTugasPtk objects filtered by the jabatan_ptk_id column
 * @method array findByNama(string $nama) Return JabatanTugasPtk objects filtered by the nama column
 * @method array findByJabatanUtama(string $jabatan_utama) Return JabatanTugasPtk objects filtered by the jabatan_utama column
 * @method array findByTugasTambahanGuru(string $tugas_tambahan_guru) Return JabatanTugasPtk objects filtered by the tugas_tambahan_guru column
 * @method array findByJumlahJamDiakui(string $jumlah_jam_diakui) Return JabatanTugasPtk objects filtered by the jumlah_jam_diakui column
 * @method array findByHarusReferUnitOrg(string $harus_refer_unit_org) Return JabatanTugasPtk objects filtered by the harus_refer_unit_org column
 * @method array findByCreateDate(string $create_date) Return JabatanTugasPtk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return JabatanTugasPtk objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return JabatanTugasPtk objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return JabatanTugasPtk objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJabatanTugasPtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseJabatanTugasPtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\JabatanTugasPtk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new JabatanTugasPtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   JabatanTugasPtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return JabatanTugasPtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof JabatanTugasPtkQuery) {
            return $criteria;
        }
        $query = new JabatanTugasPtkQuery();
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
     * @return   JabatanTugasPtk|JabatanTugasPtk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = JabatanTugasPtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(JabatanTugasPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 JabatanTugasPtk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByJabatanPtkId($key, $con = null)
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
     * @return                 JabatanTugasPtk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "jabatan_ptk_id", "nama", "jabatan_utama", "tugas_tambahan_guru", "jumlah_jam_diakui", "harus_refer_unit_org", "create_date", "last_update", "expired_date", "last_sync" FROM "ref"."jabatan_tugas_ptk" WHERE "jabatan_ptk_id" = :p0';
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
            $obj = new JabatanTugasPtk();
            $obj->hydrate($row);
            JabatanTugasPtkPeer::addInstanceToPool($obj, (string) $key);
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
     * @return JabatanTugasPtk|JabatanTugasPtk[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|JabatanTugasPtk[]|mixed the list of results, formatted by the current formatter
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the jabatan_ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanPtkId(1234); // WHERE jabatan_ptk_id = 1234
     * $query->filterByJabatanPtkId(array(12, 34)); // WHERE jabatan_ptk_id IN (12, 34)
     * $query->filterByJabatanPtkId(array('min' => 12)); // WHERE jabatan_ptk_id >= 12
     * $query->filterByJabatanPtkId(array('max' => 12)); // WHERE jabatan_ptk_id <= 12
     * </code>
     *
     * @param     mixed $jabatanPtkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByJabatanPtkId($jabatanPtkId = null, $comparison = null)
    {
        if (is_array($jabatanPtkId)) {
            $useMinMax = false;
            if (isset($jabatanPtkId['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $jabatanPtkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jabatanPtkId['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $jabatanPtkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $jabatanPtkId, $comparison);
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
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

        return $this->addUsingAlias(JabatanTugasPtkPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the jabatan_utama column
     *
     * Example usage:
     * <code>
     * $query->filterByJabatanUtama(1234); // WHERE jabatan_utama = 1234
     * $query->filterByJabatanUtama(array(12, 34)); // WHERE jabatan_utama IN (12, 34)
     * $query->filterByJabatanUtama(array('min' => 12)); // WHERE jabatan_utama >= 12
     * $query->filterByJabatanUtama(array('max' => 12)); // WHERE jabatan_utama <= 12
     * </code>
     *
     * @param     mixed $jabatanUtama The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByJabatanUtama($jabatanUtama = null, $comparison = null)
    {
        if (is_array($jabatanUtama)) {
            $useMinMax = false;
            if (isset($jabatanUtama['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_UTAMA, $jabatanUtama['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jabatanUtama['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_UTAMA, $jabatanUtama['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_UTAMA, $jabatanUtama, $comparison);
    }

    /**
     * Filter the query on the tugas_tambahan_guru column
     *
     * Example usage:
     * <code>
     * $query->filterByTugasTambahanGuru(1234); // WHERE tugas_tambahan_guru = 1234
     * $query->filterByTugasTambahanGuru(array(12, 34)); // WHERE tugas_tambahan_guru IN (12, 34)
     * $query->filterByTugasTambahanGuru(array('min' => 12)); // WHERE tugas_tambahan_guru >= 12
     * $query->filterByTugasTambahanGuru(array('max' => 12)); // WHERE tugas_tambahan_guru <= 12
     * </code>
     *
     * @param     mixed $tugasTambahanGuru The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByTugasTambahanGuru($tugasTambahanGuru = null, $comparison = null)
    {
        if (is_array($tugasTambahanGuru)) {
            $useMinMax = false;
            if (isset($tugasTambahanGuru['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU, $tugasTambahanGuru['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tugasTambahanGuru['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU, $tugasTambahanGuru['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU, $tugasTambahanGuru, $comparison);
    }

    /**
     * Filter the query on the jumlah_jam_diakui column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahJamDiakui(1234); // WHERE jumlah_jam_diakui = 1234
     * $query->filterByJumlahJamDiakui(array(12, 34)); // WHERE jumlah_jam_diakui IN (12, 34)
     * $query->filterByJumlahJamDiakui(array('min' => 12)); // WHERE jumlah_jam_diakui >= 12
     * $query->filterByJumlahJamDiakui(array('max' => 12)); // WHERE jumlah_jam_diakui <= 12
     * </code>
     *
     * @param     mixed $jumlahJamDiakui The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByJumlahJamDiakui($jumlahJamDiakui = null, $comparison = null)
    {
        if (is_array($jumlahJamDiakui)) {
            $useMinMax = false;
            if (isset($jumlahJamDiakui['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI, $jumlahJamDiakui['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahJamDiakui['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI, $jumlahJamDiakui['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI, $jumlahJamDiakui, $comparison);
    }

    /**
     * Filter the query on the harus_refer_unit_org column
     *
     * Example usage:
     * <code>
     * $query->filterByHarusReferUnitOrg(1234); // WHERE harus_refer_unit_org = 1234
     * $query->filterByHarusReferUnitOrg(array(12, 34)); // WHERE harus_refer_unit_org IN (12, 34)
     * $query->filterByHarusReferUnitOrg(array('min' => 12)); // WHERE harus_refer_unit_org >= 12
     * $query->filterByHarusReferUnitOrg(array('max' => 12)); // WHERE harus_refer_unit_org <= 12
     * </code>
     *
     * @param     mixed $harusReferUnitOrg The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByHarusReferUnitOrg($harusReferUnitOrg = null, $comparison = null)
    {
        if (is_array($harusReferUnitOrg)) {
            $useMinMax = false;
            if (isset($harusReferUnitOrg['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG, $harusReferUnitOrg['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($harusReferUnitOrg['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG, $harusReferUnitOrg['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG, $harusReferUnitOrg, $comparison);
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(JabatanTugasPtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(JabatanTugasPtkPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related RwyStruktural object
     *
     * @param   RwyStruktural|PropelObjectCollection $rwyStruktural  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JabatanTugasPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyStruktural($rwyStruktural, $comparison = null)
    {
        if ($rwyStruktural instanceof RwyStruktural) {
            return $this
                ->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $rwyStruktural->getJabatanPtkId(), $comparison);
        } elseif ($rwyStruktural instanceof PropelObjectCollection) {
            return $this
                ->useRwyStrukturalQuery()
                ->filterByPrimaryKeys($rwyStruktural->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyStruktural() only accepts arguments of type RwyStruktural or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyStruktural relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function joinRwyStruktural($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyStruktural');

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
            $this->addJoinObject($join, 'RwyStruktural');
        }

        return $this;
    }

    /**
     * Use the RwyStruktural relation RwyStruktural object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyStrukturalQuery A secondary query class using the current class as primary query
     */
    public function useRwyStrukturalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyStruktural($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyStruktural', '\DataDikdas\Model\RwyStrukturalQuery');
    }

    /**
     * Filter the query by a related TugasTambahan object
     *
     * @param   TugasTambahan|PropelObjectCollection $tugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 JabatanTugasPtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTugasTambahan($tugasTambahan, $comparison = null)
    {
        if ($tugasTambahan instanceof TugasTambahan) {
            return $this
                ->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $tugasTambahan->getJabatanPtkId(), $comparison);
        } elseif ($tugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useTugasTambahanQuery()
                ->filterByPrimaryKeys($tugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTugasTambahan() only accepts arguments of type TugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function joinTugasTambahan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TugasTambahan');

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
            $this->addJoinObject($join, 'TugasTambahan');
        }

        return $this;
    }

    /**
     * Use the TugasTambahan relation TugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useTugasTambahanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TugasTambahan', '\DataDikdas\Model\TugasTambahanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   JabatanTugasPtk $jabatanTugasPtk Object to remove from the list of results
     *
     * @return JabatanTugasPtkQuery The current query, for fluid interface
     */
    public function prune($jabatanTugasPtk = null)
    {
        if ($jabatanTugasPtk) {
            $this->addUsingAlias(JabatanTugasPtkPeer::JABATAN_PTK_ID, $jabatanTugasPtk->getJabatanPtkId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
