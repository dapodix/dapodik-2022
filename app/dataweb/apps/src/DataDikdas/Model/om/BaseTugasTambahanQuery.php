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
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanPeer;
use DataDikdas\Model\TugasTambahanQuery;
use DataDikdas\Model\VldTugasTambahan;

/**
 * Base class that represents a query for the 'tugas_tambahan' table.
 *
 * 
 *
 * @method TugasTambahanQuery orderByPtkTugasTambahanId($order = Criteria::ASC) Order by the ptk_tugas_tambahan_id column
 * @method TugasTambahanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method TugasTambahanQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method TugasTambahanQuery orderByJabatanPtkId($order = Criteria::ASC) Order by the jabatan_ptk_id column
 * @method TugasTambahanQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method TugasTambahanQuery orderByJumlahJam($order = Criteria::ASC) Order by the jumlah_jam column
 * @method TugasTambahanQuery orderByNomorSk($order = Criteria::ASC) Order by the nomor_sk column
 * @method TugasTambahanQuery orderByTmtTambahan($order = Criteria::ASC) Order by the tmt_tambahan column
 * @method TugasTambahanQuery orderByTstTambahan($order = Criteria::ASC) Order by the tst_tambahan column
 * @method TugasTambahanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method TugasTambahanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method TugasTambahanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method TugasTambahanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method TugasTambahanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method TugasTambahanQuery groupByPtkTugasTambahanId() Group by the ptk_tugas_tambahan_id column
 * @method TugasTambahanQuery groupByPtkId() Group by the ptk_id column
 * @method TugasTambahanQuery groupByIdRuang() Group by the id_ruang column
 * @method TugasTambahanQuery groupByJabatanPtkId() Group by the jabatan_ptk_id column
 * @method TugasTambahanQuery groupBySekolahId() Group by the sekolah_id column
 * @method TugasTambahanQuery groupByJumlahJam() Group by the jumlah_jam column
 * @method TugasTambahanQuery groupByNomorSk() Group by the nomor_sk column
 * @method TugasTambahanQuery groupByTmtTambahan() Group by the tmt_tambahan column
 * @method TugasTambahanQuery groupByTstTambahan() Group by the tst_tambahan column
 * @method TugasTambahanQuery groupByCreateDate() Group by the create_date column
 * @method TugasTambahanQuery groupByLastUpdate() Group by the last_update column
 * @method TugasTambahanQuery groupBySoftDelete() Group by the soft_delete column
 * @method TugasTambahanQuery groupByLastSync() Group by the last_sync column
 * @method TugasTambahanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method TugasTambahanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TugasTambahanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TugasTambahanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TugasTambahanQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method TugasTambahanQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method TugasTambahanQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method TugasTambahanQuery leftJoinJabatanTugasPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JabatanTugasPtk relation
 * @method TugasTambahanQuery rightJoinJabatanTugasPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JabatanTugasPtk relation
 * @method TugasTambahanQuery innerJoinJabatanTugasPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the JabatanTugasPtk relation
 *
 * @method TugasTambahanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method TugasTambahanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method TugasTambahanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method TugasTambahanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method TugasTambahanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method TugasTambahanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method TugasTambahanQuery leftJoinVldTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldTugasTambahan relation
 * @method TugasTambahanQuery rightJoinVldTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldTugasTambahan relation
 * @method TugasTambahanQuery innerJoinVldTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldTugasTambahan relation
 *
 * @method TugasTambahan findOne(PropelPDO $con = null) Return the first TugasTambahan matching the query
 * @method TugasTambahan findOneOrCreate(PropelPDO $con = null) Return the first TugasTambahan matching the query, or a new TugasTambahan object populated from the query conditions when no match is found
 *
 * @method TugasTambahan findOneByPtkId(string $ptk_id) Return the first TugasTambahan filtered by the ptk_id column
 * @method TugasTambahan findOneByIdRuang(string $id_ruang) Return the first TugasTambahan filtered by the id_ruang column
 * @method TugasTambahan findOneByJabatanPtkId(string $jabatan_ptk_id) Return the first TugasTambahan filtered by the jabatan_ptk_id column
 * @method TugasTambahan findOneBySekolahId(string $sekolah_id) Return the first TugasTambahan filtered by the sekolah_id column
 * @method TugasTambahan findOneByJumlahJam(string $jumlah_jam) Return the first TugasTambahan filtered by the jumlah_jam column
 * @method TugasTambahan findOneByNomorSk(string $nomor_sk) Return the first TugasTambahan filtered by the nomor_sk column
 * @method TugasTambahan findOneByTmtTambahan(string $tmt_tambahan) Return the first TugasTambahan filtered by the tmt_tambahan column
 * @method TugasTambahan findOneByTstTambahan(string $tst_tambahan) Return the first TugasTambahan filtered by the tst_tambahan column
 * @method TugasTambahan findOneByCreateDate(string $create_date) Return the first TugasTambahan filtered by the create_date column
 * @method TugasTambahan findOneByLastUpdate(string $last_update) Return the first TugasTambahan filtered by the last_update column
 * @method TugasTambahan findOneBySoftDelete(string $soft_delete) Return the first TugasTambahan filtered by the soft_delete column
 * @method TugasTambahan findOneByLastSync(string $last_sync) Return the first TugasTambahan filtered by the last_sync column
 * @method TugasTambahan findOneByUpdaterId(string $updater_id) Return the first TugasTambahan filtered by the updater_id column
 *
 * @method array findByPtkTugasTambahanId(string $ptk_tugas_tambahan_id) Return TugasTambahan objects filtered by the ptk_tugas_tambahan_id column
 * @method array findByPtkId(string $ptk_id) Return TugasTambahan objects filtered by the ptk_id column
 * @method array findByIdRuang(string $id_ruang) Return TugasTambahan objects filtered by the id_ruang column
 * @method array findByJabatanPtkId(string $jabatan_ptk_id) Return TugasTambahan objects filtered by the jabatan_ptk_id column
 * @method array findBySekolahId(string $sekolah_id) Return TugasTambahan objects filtered by the sekolah_id column
 * @method array findByJumlahJam(string $jumlah_jam) Return TugasTambahan objects filtered by the jumlah_jam column
 * @method array findByNomorSk(string $nomor_sk) Return TugasTambahan objects filtered by the nomor_sk column
 * @method array findByTmtTambahan(string $tmt_tambahan) Return TugasTambahan objects filtered by the tmt_tambahan column
 * @method array findByTstTambahan(string $tst_tambahan) Return TugasTambahan objects filtered by the tst_tambahan column
 * @method array findByCreateDate(string $create_date) Return TugasTambahan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return TugasTambahan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return TugasTambahan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return TugasTambahan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return TugasTambahan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTugasTambahanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTugasTambahanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TugasTambahan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TugasTambahanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TugasTambahanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TugasTambahanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TugasTambahanQuery) {
            return $criteria;
        }
        $query = new TugasTambahanQuery();
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
     * @return   TugasTambahan|TugasTambahan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TugasTambahanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TugasTambahan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPtkTugasTambahanId($key, $con = null)
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
     * @return                 TugasTambahan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ptk_tugas_tambahan_id", "ptk_id", "id_ruang", "jabatan_ptk_id", "sekolah_id", "jumlah_jam", "nomor_sk", "tmt_tambahan", "tst_tambahan", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "tugas_tambahan" WHERE "ptk_tugas_tambahan_id" = :p0';
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
            $obj = new TugasTambahan();
            $obj->hydrate($row);
            TugasTambahanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TugasTambahan|TugasTambahan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TugasTambahan[]|mixed the list of results, formatted by the current formatter
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ptk_tugas_tambahan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkTugasTambahanId('fooValue');   // WHERE ptk_tugas_tambahan_id = 'fooValue'
     * $query->filterByPtkTugasTambahanId('%fooValue%'); // WHERE ptk_tugas_tambahan_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkTugasTambahanId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByPtkTugasTambahanId($ptkTugasTambahanId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkTugasTambahanId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkTugasTambahanId)) {
                $ptkTugasTambahanId = str_replace('*', '%', $ptkTugasTambahanId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $ptkTugasTambahanId, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TugasTambahanPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the id_ruang column
     *
     * Example usage:
     * <code>
     * $query->filterByIdRuang('fooValue');   // WHERE id_ruang = 'fooValue'
     * $query->filterByIdRuang('%fooValue%'); // WHERE id_ruang LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idRuang The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByIdRuang($idRuang = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idRuang)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idRuang)) {
                $idRuang = str_replace('*', '%', $idRuang);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::ID_RUANG, $idRuang, $comparison);
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
     * @see       filterByJabatanTugasPtk()
     *
     * @param     mixed $jabatanPtkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByJabatanPtkId($jabatanPtkId = null, $comparison = null)
    {
        if (is_array($jabatanPtkId)) {
            $useMinMax = false;
            if (isset($jabatanPtkId['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::JABATAN_PTK_ID, $jabatanPtkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jabatanPtkId['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::JABATAN_PTK_ID, $jabatanPtkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::JABATAN_PTK_ID, $jabatanPtkId, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TugasTambahanPeer::SEKOLAH_ID, $sekolahId, $comparison);
    }

    /**
     * Filter the query on the jumlah_jam column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahJam(1234); // WHERE jumlah_jam = 1234
     * $query->filterByJumlahJam(array(12, 34)); // WHERE jumlah_jam IN (12, 34)
     * $query->filterByJumlahJam(array('min' => 12)); // WHERE jumlah_jam >= 12
     * $query->filterByJumlahJam(array('max' => 12)); // WHERE jumlah_jam <= 12
     * </code>
     *
     * @param     mixed $jumlahJam The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByJumlahJam($jumlahJam = null, $comparison = null)
    {
        if (is_array($jumlahJam)) {
            $useMinMax = false;
            if (isset($jumlahJam['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::JUMLAH_JAM, $jumlahJam['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahJam['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::JUMLAH_JAM, $jumlahJam['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::JUMLAH_JAM, $jumlahJam, $comparison);
    }

    /**
     * Filter the query on the nomor_sk column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorSk('fooValue');   // WHERE nomor_sk = 'fooValue'
     * $query->filterByNomorSk('%fooValue%'); // WHERE nomor_sk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorSk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByNomorSk($nomorSk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorSk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorSk)) {
                $nomorSk = str_replace('*', '%', $nomorSk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::NOMOR_SK, $nomorSk, $comparison);
    }

    /**
     * Filter the query on the tmt_tambahan column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtTambahan('2011-03-14'); // WHERE tmt_tambahan = '2011-03-14'
     * $query->filterByTmtTambahan('now'); // WHERE tmt_tambahan = '2011-03-14'
     * $query->filterByTmtTambahan(array('max' => 'yesterday')); // WHERE tmt_tambahan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtTambahan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByTmtTambahan($tmtTambahan = null, $comparison = null)
    {
        if (is_array($tmtTambahan)) {
            $useMinMax = false;
            if (isset($tmtTambahan['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::TMT_TAMBAHAN, $tmtTambahan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtTambahan['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::TMT_TAMBAHAN, $tmtTambahan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::TMT_TAMBAHAN, $tmtTambahan, $comparison);
    }

    /**
     * Filter the query on the tst_tambahan column
     *
     * Example usage:
     * <code>
     * $query->filterByTstTambahan('2011-03-14'); // WHERE tst_tambahan = '2011-03-14'
     * $query->filterByTstTambahan('now'); // WHERE tst_tambahan = '2011-03-14'
     * $query->filterByTstTambahan(array('max' => 'yesterday')); // WHERE tst_tambahan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tstTambahan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByTstTambahan($tstTambahan = null, $comparison = null)
    {
        if (is_array($tstTambahan)) {
            $useMinMax = false;
            if (isset($tstTambahan['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::TST_TAMBAHAN, $tstTambahan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tstTambahan['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::TST_TAMBAHAN, $tstTambahan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::TST_TAMBAHAN, $tstTambahan, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(TugasTambahanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(TugasTambahanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TugasTambahanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(TugasTambahanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TugasTambahanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(TugasTambahanPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TugasTambahanPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function joinRuang($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
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
    public function useRuangQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRuang($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Ruang', '\DataDikdas\Model\RuangQuery');
    }

    /**
     * Filter the query by a related JabatanTugasPtk object
     *
     * @param   JabatanTugasPtk|PropelObjectCollection $jabatanTugasPtk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TugasTambahanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJabatanTugasPtk($jabatanTugasPtk, $comparison = null)
    {
        if ($jabatanTugasPtk instanceof JabatanTugasPtk) {
            return $this
                ->addUsingAlias(TugasTambahanPeer::JABATAN_PTK_ID, $jabatanTugasPtk->getJabatanPtkId(), $comparison);
        } elseif ($jabatanTugasPtk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TugasTambahanPeer::JABATAN_PTK_ID, $jabatanTugasPtk->toKeyValue('PrimaryKey', 'JabatanPtkId'), $comparison);
        } else {
            throw new PropelException('filterByJabatanTugasPtk() only accepts arguments of type JabatanTugasPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JabatanTugasPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function joinJabatanTugasPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JabatanTugasPtk');

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
            $this->addJoinObject($join, 'JabatanTugasPtk');
        }

        return $this;
    }

    /**
     * Use the JabatanTugasPtk relation JabatanTugasPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JabatanTugasPtkQuery A secondary query class using the current class as primary query
     */
    public function useJabatanTugasPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJabatanTugasPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JabatanTugasPtk', '\DataDikdas\Model\JabatanTugasPtkQuery');
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TugasTambahanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(TugasTambahanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TugasTambahanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
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
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TugasTambahanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(TugasTambahanPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(TugasTambahanPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return TugasTambahanQuery The current query, for fluid interface
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
     * Filter the query by a related VldTugasTambahan object
     *
     * @param   VldTugasTambahan|PropelObjectCollection $vldTugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TugasTambahanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldTugasTambahan($vldTugasTambahan, $comparison = null)
    {
        if ($vldTugasTambahan instanceof VldTugasTambahan) {
            return $this
                ->addUsingAlias(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $vldTugasTambahan->getPtkTugasTambahanId(), $comparison);
        } elseif ($vldTugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useVldTugasTambahanQuery()
                ->filterByPrimaryKeys($vldTugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldTugasTambahan() only accepts arguments of type VldTugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldTugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function joinVldTugasTambahan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldTugasTambahan');

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
            $this->addJoinObject($join, 'VldTugasTambahan');
        }

        return $this;
    }

    /**
     * Use the VldTugasTambahan relation VldTugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldTugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useVldTugasTambahanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldTugasTambahan', '\DataDikdas\Model\VldTugasTambahanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TugasTambahan $tugasTambahan Object to remove from the list of results
     *
     * @return TugasTambahanQuery The current query, for fluid interface
     */
    public function prune($tugasTambahan = null)
    {
        if ($tugasTambahan) {
            $this->addUsingAlias(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $tugasTambahan->getPtkTugasTambahanId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
