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
use DataDikdas\Model\AlatDariBlockgrant;
use DataDikdas\Model\AlatLongitudinal;
use DataDikdas\Model\AlatPeer;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\VldAlat;

/**
 * Base class that represents a query for the 'alat' table.
 *
 * 
 *
 * @method AlatQuery orderByIdAlat($order = Criteria::ASC) Order by the id_alat column
 * @method AlatQuery orderByJenisSaranaId($order = Criteria::ASC) Order by the jenis_sarana_id column
 * @method AlatQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method AlatQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method AlatQuery orderByIdRuang($order = Criteria::ASC) Order by the id_ruang column
 * @method AlatQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method AlatQuery orderByKepemilikanSarprasId($order = Criteria::ASC) Order by the kepemilikan_sarpras_id column
 * @method AlatQuery orderByKdKl($order = Criteria::ASC) Order by the kd_kl column
 * @method AlatQuery orderByKdSatker($order = Criteria::ASC) Order by the kd_satker column
 * @method AlatQuery orderByKdBrg($order = Criteria::ASC) Order by the kd_brg column
 * @method AlatQuery orderByNup($order = Criteria::ASC) Order by the nup column
 * @method AlatQuery orderByKodeEselon1($order = Criteria::ASC) Order by the kode_eselon1 column
 * @method AlatQuery orderByNamaEselon1($order = Criteria::ASC) Order by the nama_eselon1 column
 * @method AlatQuery orderByKodeSubSatker($order = Criteria::ASC) Order by the kode_sub_satker column
 * @method AlatQuery orderByNamaSubSatker($order = Criteria::ASC) Order by the nama_sub_satker column
 * @method AlatQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method AlatQuery orderBySpesifikasi($order = Criteria::ASC) Order by the spesifikasi column
 * @method AlatQuery orderByTglHapusBuku($order = Criteria::ASC) Order by the tgl_hapus_buku column
 * @method AlatQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method AlatQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AlatQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AlatQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AlatQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AlatQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AlatQuery groupByIdAlat() Group by the id_alat column
 * @method AlatQuery groupByJenisSaranaId() Group by the jenis_sarana_id column
 * @method AlatQuery groupBySekolahId() Group by the sekolah_id column
 * @method AlatQuery groupByPtkId() Group by the ptk_id column
 * @method AlatQuery groupByIdRuang() Group by the id_ruang column
 * @method AlatQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method AlatQuery groupByKepemilikanSarprasId() Group by the kepemilikan_sarpras_id column
 * @method AlatQuery groupByKdKl() Group by the kd_kl column
 * @method AlatQuery groupByKdSatker() Group by the kd_satker column
 * @method AlatQuery groupByKdBrg() Group by the kd_brg column
 * @method AlatQuery groupByNup() Group by the nup column
 * @method AlatQuery groupByKodeEselon1() Group by the kode_eselon1 column
 * @method AlatQuery groupByNamaEselon1() Group by the nama_eselon1 column
 * @method AlatQuery groupByKodeSubSatker() Group by the kode_sub_satker column
 * @method AlatQuery groupByNamaSubSatker() Group by the nama_sub_satker column
 * @method AlatQuery groupByNama() Group by the nama column
 * @method AlatQuery groupBySpesifikasi() Group by the spesifikasi column
 * @method AlatQuery groupByTglHapusBuku() Group by the tgl_hapus_buku column
 * @method AlatQuery groupByAsalData() Group by the asal_data column
 * @method AlatQuery groupByCreateDate() Group by the create_date column
 * @method AlatQuery groupByLastUpdate() Group by the last_update column
 * @method AlatQuery groupBySoftDelete() Group by the soft_delete column
 * @method AlatQuery groupByLastSync() Group by the last_sync column
 * @method AlatQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AlatQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AlatQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AlatQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AlatQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method AlatQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method AlatQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method AlatQuery leftJoinRuang($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ruang relation
 * @method AlatQuery rightJoinRuang($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ruang relation
 * @method AlatQuery innerJoinRuang($relationAlias = null) Adds a INNER JOIN clause to the query using the Ruang relation
 *
 * @method AlatQuery leftJoinJenisHapusBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHapusBuku relation
 * @method AlatQuery rightJoinJenisHapusBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHapusBuku relation
 * @method AlatQuery innerJoinJenisHapusBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHapusBuku relation
 *
 * @method AlatQuery leftJoinJenisSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSarana relation
 * @method AlatQuery rightJoinJenisSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSarana relation
 * @method AlatQuery innerJoinJenisSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSarana relation
 *
 * @method AlatQuery leftJoinStatusKepemilikanSarpras($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method AlatQuery rightJoinStatusKepemilikanSarpras($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method AlatQuery innerJoinStatusKepemilikanSarpras($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepemilikanSarpras relation
 *
 * @method AlatQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method AlatQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method AlatQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method AlatQuery leftJoinAlatDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlatDariBlockgrant relation
 * @method AlatQuery rightJoinAlatDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlatDariBlockgrant relation
 * @method AlatQuery innerJoinAlatDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the AlatDariBlockgrant relation
 *
 * @method AlatQuery leftJoinAlatLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlatLongitudinal relation
 * @method AlatQuery rightJoinAlatLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlatLongitudinal relation
 * @method AlatQuery innerJoinAlatLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the AlatLongitudinal relation
 *
 * @method AlatQuery leftJoinVldAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAlat relation
 * @method AlatQuery rightJoinVldAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAlat relation
 * @method AlatQuery innerJoinVldAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAlat relation
 *
 * @method Alat findOne(PropelPDO $con = null) Return the first Alat matching the query
 * @method Alat findOneOrCreate(PropelPDO $con = null) Return the first Alat matching the query, or a new Alat object populated from the query conditions when no match is found
 *
 * @method Alat findOneByJenisSaranaId(int $jenis_sarana_id) Return the first Alat filtered by the jenis_sarana_id column
 * @method Alat findOneBySekolahId(string $sekolah_id) Return the first Alat filtered by the sekolah_id column
 * @method Alat findOneByPtkId(string $ptk_id) Return the first Alat filtered by the ptk_id column
 * @method Alat findOneByIdRuang(string $id_ruang) Return the first Alat filtered by the id_ruang column
 * @method Alat findOneByIdHapusBuku(string $id_hapus_buku) Return the first Alat filtered by the id_hapus_buku column
 * @method Alat findOneByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return the first Alat filtered by the kepemilikan_sarpras_id column
 * @method Alat findOneByKdKl(string $kd_kl) Return the first Alat filtered by the kd_kl column
 * @method Alat findOneByKdSatker(string $kd_satker) Return the first Alat filtered by the kd_satker column
 * @method Alat findOneByKdBrg(string $kd_brg) Return the first Alat filtered by the kd_brg column
 * @method Alat findOneByNup(int $nup) Return the first Alat filtered by the nup column
 * @method Alat findOneByKodeEselon1(string $kode_eselon1) Return the first Alat filtered by the kode_eselon1 column
 * @method Alat findOneByNamaEselon1(string $nama_eselon1) Return the first Alat filtered by the nama_eselon1 column
 * @method Alat findOneByKodeSubSatker(string $kode_sub_satker) Return the first Alat filtered by the kode_sub_satker column
 * @method Alat findOneByNamaSubSatker(string $nama_sub_satker) Return the first Alat filtered by the nama_sub_satker column
 * @method Alat findOneByNama(string $nama) Return the first Alat filtered by the nama column
 * @method Alat findOneBySpesifikasi(string $spesifikasi) Return the first Alat filtered by the spesifikasi column
 * @method Alat findOneByTglHapusBuku(string $tgl_hapus_buku) Return the first Alat filtered by the tgl_hapus_buku column
 * @method Alat findOneByAsalData(string $asal_data) Return the first Alat filtered by the asal_data column
 * @method Alat findOneByCreateDate(string $create_date) Return the first Alat filtered by the create_date column
 * @method Alat findOneByLastUpdate(string $last_update) Return the first Alat filtered by the last_update column
 * @method Alat findOneBySoftDelete(string $soft_delete) Return the first Alat filtered by the soft_delete column
 * @method Alat findOneByLastSync(string $last_sync) Return the first Alat filtered by the last_sync column
 * @method Alat findOneByUpdaterId(string $updater_id) Return the first Alat filtered by the updater_id column
 *
 * @method array findByIdAlat(string $id_alat) Return Alat objects filtered by the id_alat column
 * @method array findByJenisSaranaId(int $jenis_sarana_id) Return Alat objects filtered by the jenis_sarana_id column
 * @method array findBySekolahId(string $sekolah_id) Return Alat objects filtered by the sekolah_id column
 * @method array findByPtkId(string $ptk_id) Return Alat objects filtered by the ptk_id column
 * @method array findByIdRuang(string $id_ruang) Return Alat objects filtered by the id_ruang column
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return Alat objects filtered by the id_hapus_buku column
 * @method array findByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return Alat objects filtered by the kepemilikan_sarpras_id column
 * @method array findByKdKl(string $kd_kl) Return Alat objects filtered by the kd_kl column
 * @method array findByKdSatker(string $kd_satker) Return Alat objects filtered by the kd_satker column
 * @method array findByKdBrg(string $kd_brg) Return Alat objects filtered by the kd_brg column
 * @method array findByNup(int $nup) Return Alat objects filtered by the nup column
 * @method array findByKodeEselon1(string $kode_eselon1) Return Alat objects filtered by the kode_eselon1 column
 * @method array findByNamaEselon1(string $nama_eselon1) Return Alat objects filtered by the nama_eselon1 column
 * @method array findByKodeSubSatker(string $kode_sub_satker) Return Alat objects filtered by the kode_sub_satker column
 * @method array findByNamaSubSatker(string $nama_sub_satker) Return Alat objects filtered by the nama_sub_satker column
 * @method array findByNama(string $nama) Return Alat objects filtered by the nama column
 * @method array findBySpesifikasi(string $spesifikasi) Return Alat objects filtered by the spesifikasi column
 * @method array findByTglHapusBuku(string $tgl_hapus_buku) Return Alat objects filtered by the tgl_hapus_buku column
 * @method array findByAsalData(string $asal_data) Return Alat objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Alat objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Alat objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Alat objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Alat objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Alat objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAlatQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAlatQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Alat', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AlatQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AlatQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AlatQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AlatQuery) {
            return $criteria;
        }
        $query = new AlatQuery();
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
     * @return   Alat|Alat[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AlatPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AlatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Alat A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAlat($key, $con = null)
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
     * @return                 Alat A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_alat", "jenis_sarana_id", "sekolah_id", "ptk_id", "id_ruang", "id_hapus_buku", "kepemilikan_sarpras_id", "kd_kl", "kd_satker", "kd_brg", "nup", "kode_eselon1", "nama_eselon1", "kode_sub_satker", "nama_sub_satker", "nama", "spesifikasi", "tgl_hapus_buku", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "alat" WHERE "id_alat" = :p0';
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
            $obj = new Alat();
            $obj->hydrate($row);
            AlatPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Alat|Alat[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Alat[]|mixed the list of results, formatted by the current formatter
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
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AlatPeer::ID_ALAT, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AlatPeer::ID_ALAT, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_alat column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAlat('fooValue');   // WHERE id_alat = 'fooValue'
     * $query->filterByIdAlat('%fooValue%'); // WHERE id_alat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAlat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByIdAlat($idAlat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAlat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAlat)) {
                $idAlat = str_replace('*', '%', $idAlat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::ID_ALAT, $idAlat, $comparison);
    }

    /**
     * Filter the query on the jenis_sarana_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisSaranaId(1234); // WHERE jenis_sarana_id = 1234
     * $query->filterByJenisSaranaId(array(12, 34)); // WHERE jenis_sarana_id IN (12, 34)
     * $query->filterByJenisSaranaId(array('min' => 12)); // WHERE jenis_sarana_id >= 12
     * $query->filterByJenisSaranaId(array('max' => 12)); // WHERE jenis_sarana_id <= 12
     * </code>
     *
     * @see       filterByJenisSarana()
     *
     * @param     mixed $jenisSaranaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByJenisSaranaId($jenisSaranaId = null, $comparison = null)
    {
        if (is_array($jenisSaranaId)) {
            $useMinMax = false;
            if (isset($jenisSaranaId['min'])) {
                $this->addUsingAlias(AlatPeer::JENIS_SARANA_ID, $jenisSaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisSaranaId['max'])) {
                $this->addUsingAlias(AlatPeer::JENIS_SARANA_ID, $jenisSaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::JENIS_SARANA_ID, $jenisSaranaId, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::PTK_ID, $ptkId, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::ID_RUANG, $idRuang, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
    }

    /**
     * Filter the query on the kepemilikan_sarpras_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKepemilikanSarprasId(1234); // WHERE kepemilikan_sarpras_id = 1234
     * $query->filterByKepemilikanSarprasId(array(12, 34)); // WHERE kepemilikan_sarpras_id IN (12, 34)
     * $query->filterByKepemilikanSarprasId(array('min' => 12)); // WHERE kepemilikan_sarpras_id >= 12
     * $query->filterByKepemilikanSarprasId(array('max' => 12)); // WHERE kepemilikan_sarpras_id <= 12
     * </code>
     *
     * @see       filterByStatusKepemilikanSarpras()
     *
     * @param     mixed $kepemilikanSarprasId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKepemilikanSarprasId($kepemilikanSarprasId = null, $comparison = null)
    {
        if (is_array($kepemilikanSarprasId)) {
            $useMinMax = false;
            if (isset($kepemilikanSarprasId['min'])) {
                $this->addUsingAlias(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepemilikanSarprasId['max'])) {
                $this->addUsingAlias(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId, $comparison);
    }

    /**
     * Filter the query on the kd_kl column
     *
     * Example usage:
     * <code>
     * $query->filterByKdKl('fooValue');   // WHERE kd_kl = 'fooValue'
     * $query->filterByKdKl('%fooValue%'); // WHERE kd_kl LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdKl The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKdKl($kdKl = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdKl)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdKl)) {
                $kdKl = str_replace('*', '%', $kdKl);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::KD_KL, $kdKl, $comparison);
    }

    /**
     * Filter the query on the kd_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByKdSatker('fooValue');   // WHERE kd_satker = 'fooValue'
     * $query->filterByKdSatker('%fooValue%'); // WHERE kd_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKdSatker($kdSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdSatker)) {
                $kdSatker = str_replace('*', '%', $kdSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::KD_SATKER, $kdSatker, $comparison);
    }

    /**
     * Filter the query on the kd_brg column
     *
     * Example usage:
     * <code>
     * $query->filterByKdBrg('fooValue');   // WHERE kd_brg = 'fooValue'
     * $query->filterByKdBrg('%fooValue%'); // WHERE kd_brg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kdBrg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKdBrg($kdBrg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kdBrg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kdBrg)) {
                $kdBrg = str_replace('*', '%', $kdBrg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::KD_BRG, $kdBrg, $comparison);
    }

    /**
     * Filter the query on the nup column
     *
     * Example usage:
     * <code>
     * $query->filterByNup(1234); // WHERE nup = 1234
     * $query->filterByNup(array(12, 34)); // WHERE nup IN (12, 34)
     * $query->filterByNup(array('min' => 12)); // WHERE nup >= 12
     * $query->filterByNup(array('max' => 12)); // WHERE nup <= 12
     * </code>
     *
     * @param     mixed $nup The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByNup($nup = null, $comparison = null)
    {
        if (is_array($nup)) {
            $useMinMax = false;
            if (isset($nup['min'])) {
                $this->addUsingAlias(AlatPeer::NUP, $nup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nup['max'])) {
                $this->addUsingAlias(AlatPeer::NUP, $nup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::NUP, $nup, $comparison);
    }

    /**
     * Filter the query on the kode_eselon1 column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeEselon1('fooValue');   // WHERE kode_eselon1 = 'fooValue'
     * $query->filterByKodeEselon1('%fooValue%'); // WHERE kode_eselon1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeEselon1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKodeEselon1($kodeEselon1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeEselon1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeEselon1)) {
                $kodeEselon1 = str_replace('*', '%', $kodeEselon1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::KODE_ESELON1, $kodeEselon1, $comparison);
    }

    /**
     * Filter the query on the nama_eselon1 column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaEselon1('fooValue');   // WHERE nama_eselon1 = 'fooValue'
     * $query->filterByNamaEselon1('%fooValue%'); // WHERE nama_eselon1 LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaEselon1 The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByNamaEselon1($namaEselon1 = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaEselon1)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaEselon1)) {
                $namaEselon1 = str_replace('*', '%', $namaEselon1);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::NAMA_ESELON1, $namaEselon1, $comparison);
    }

    /**
     * Filter the query on the kode_sub_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeSubSatker('fooValue');   // WHERE kode_sub_satker = 'fooValue'
     * $query->filterByKodeSubSatker('%fooValue%'); // WHERE kode_sub_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeSubSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByKodeSubSatker($kodeSubSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeSubSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeSubSatker)) {
                $kodeSubSatker = str_replace('*', '%', $kodeSubSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::KODE_SUB_SATKER, $kodeSubSatker, $comparison);
    }

    /**
     * Filter the query on the nama_sub_satker column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaSubSatker('fooValue');   // WHERE nama_sub_satker = 'fooValue'
     * $query->filterByNamaSubSatker('%fooValue%'); // WHERE nama_sub_satker LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaSubSatker The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByNamaSubSatker($namaSubSatker = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaSubSatker)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaSubSatker)) {
                $namaSubSatker = str_replace('*', '%', $namaSubSatker);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::NAMA_SUB_SATKER, $namaSubSatker, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the spesifikasi column
     *
     * Example usage:
     * <code>
     * $query->filterBySpesifikasi('fooValue');   // WHERE spesifikasi = 'fooValue'
     * $query->filterBySpesifikasi('%fooValue%'); // WHERE spesifikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $spesifikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterBySpesifikasi($spesifikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($spesifikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $spesifikasi)) {
                $spesifikasi = str_replace('*', '%', $spesifikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AlatPeer::SPESIFIKASI, $spesifikasi, $comparison);
    }

    /**
     * Filter the query on the tgl_hapus_buku column
     *
     * Example usage:
     * <code>
     * $query->filterByTglHapusBuku('2011-03-14'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku('now'); // WHERE tgl_hapus_buku = '2011-03-14'
     * $query->filterByTglHapusBuku(array('max' => 'yesterday')); // WHERE tgl_hapus_buku > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglHapusBuku The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByTglHapusBuku($tglHapusBuku = null, $comparison = null)
    {
        if (is_array($tglHapusBuku)) {
            $useMinMax = false;
            if (isset($tglHapusBuku['min'])) {
                $this->addUsingAlias(AlatPeer::TGL_HAPUS_BUKU, $tglHapusBuku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglHapusBuku['max'])) {
                $this->addUsingAlias(AlatPeer::TGL_HAPUS_BUKU, $tglHapusBuku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::TGL_HAPUS_BUKU, $tglHapusBuku, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AlatPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AlatPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AlatPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AlatPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AlatPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AlatPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AlatPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AlatPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AlatPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AlatPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(AlatPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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
     * Filter the query by a related Ruang object
     *
     * @param   Ruang|PropelObjectCollection $ruang The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRuang($ruang, $comparison = null)
    {
        if ($ruang instanceof Ruang) {
            return $this
                ->addUsingAlias(AlatPeer::ID_RUANG, $ruang->getIdRuang(), $comparison);
        } elseif ($ruang instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::ID_RUANG, $ruang->toKeyValue('PrimaryKey', 'IdRuang'), $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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
     * Filter the query by a related JenisHapusBuku object
     *
     * @param   JenisHapusBuku|PropelObjectCollection $jenisHapusBuku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHapusBuku($jenisHapusBuku, $comparison = null)
    {
        if ($jenisHapusBuku instanceof JenisHapusBuku) {
            return $this
                ->addUsingAlias(AlatPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), $comparison);
        } elseif ($jenisHapusBuku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::ID_HAPUS_BUKU, $jenisHapusBuku->toKeyValue('PrimaryKey', 'IdHapusBuku'), $comparison);
        } else {
            throw new PropelException('filterByJenisHapusBuku() only accepts arguments of type JenisHapusBuku or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisHapusBuku relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinJenisHapusBuku($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisHapusBuku');

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
            $this->addJoinObject($join, 'JenisHapusBuku');
        }

        return $this;
    }

    /**
     * Use the JenisHapusBuku relation JenisHapusBuku object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisHapusBukuQuery A secondary query class using the current class as primary query
     */
    public function useJenisHapusBukuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisHapusBuku($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisHapusBuku', '\DataDikdas\Model\JenisHapusBukuQuery');
    }

    /**
     * Filter the query by a related JenisSarana object
     *
     * @param   JenisSarana|PropelObjectCollection $jenisSarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSarana($jenisSarana, $comparison = null)
    {
        if ($jenisSarana instanceof JenisSarana) {
            return $this
                ->addUsingAlias(AlatPeer::JENIS_SARANA_ID, $jenisSarana->getJenisSaranaId(), $comparison);
        } elseif ($jenisSarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::JENIS_SARANA_ID, $jenisSarana->toKeyValue('PrimaryKey', 'JenisSaranaId'), $comparison);
        } else {
            throw new PropelException('filterByJenisSarana() only accepts arguments of type JenisSarana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisSarana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinJenisSarana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisSarana');

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
            $this->addJoinObject($join, 'JenisSarana');
        }

        return $this;
    }

    /**
     * Use the JenisSarana relation JenisSarana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisSaranaQuery A secondary query class using the current class as primary query
     */
    public function useJenisSaranaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisSarana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisSarana', '\DataDikdas\Model\JenisSaranaQuery');
    }

    /**
     * Filter the query by a related StatusKepemilikanSarpras object
     *
     * @param   StatusKepemilikanSarpras|PropelObjectCollection $statusKepemilikanSarpras The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepemilikanSarpras($statusKepemilikanSarpras, $comparison = null)
    {
        if ($statusKepemilikanSarpras instanceof StatusKepemilikanSarpras) {
            return $this
                ->addUsingAlias(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->getKepemilikanSarprasId(), $comparison);
        } elseif ($statusKepemilikanSarpras instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->toKeyValue('PrimaryKey', 'KepemilikanSarprasId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKepemilikanSarpras() only accepts arguments of type StatusKepemilikanSarpras or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKepemilikanSarpras relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinStatusKepemilikanSarpras($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKepemilikanSarpras');

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
            $this->addJoinObject($join, 'StatusKepemilikanSarpras');
        }

        return $this;
    }

    /**
     * Use the StatusKepemilikanSarpras relation StatusKepemilikanSarpras object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKepemilikanSarprasQuery A secondary query class using the current class as primary query
     */
    public function useStatusKepemilikanSarprasQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKepemilikanSarpras($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKepemilikanSarpras', '\DataDikdas\Model\StatusKepemilikanSarprasQuery');
    }

    /**
     * Filter the query by a related Sekolah object
     *
     * @param   Sekolah|PropelObjectCollection $sekolah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(AlatPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AlatPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return AlatQuery The current query, for fluid interface
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
     * Filter the query by a related AlatDariBlockgrant object
     *
     * @param   AlatDariBlockgrant|PropelObjectCollection $alatDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlatDariBlockgrant($alatDariBlockgrant, $comparison = null)
    {
        if ($alatDariBlockgrant instanceof AlatDariBlockgrant) {
            return $this
                ->addUsingAlias(AlatPeer::ID_ALAT, $alatDariBlockgrant->getIdAlat(), $comparison);
        } elseif ($alatDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useAlatDariBlockgrantQuery()
                ->filterByPrimaryKeys($alatDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlatDariBlockgrant() only accepts arguments of type AlatDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlatDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinAlatDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlatDariBlockgrant');

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
            $this->addJoinObject($join, 'AlatDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the AlatDariBlockgrant relation AlatDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useAlatDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlatDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlatDariBlockgrant', '\DataDikdas\Model\AlatDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related AlatLongitudinal object
     *
     * @param   AlatLongitudinal|PropelObjectCollection $alatLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlatLongitudinal($alatLongitudinal, $comparison = null)
    {
        if ($alatLongitudinal instanceof AlatLongitudinal) {
            return $this
                ->addUsingAlias(AlatPeer::ID_ALAT, $alatLongitudinal->getIdAlat(), $comparison);
        } elseif ($alatLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->useAlatLongitudinalQuery()
                ->filterByPrimaryKeys($alatLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlatLongitudinal() only accepts arguments of type AlatLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlatLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinAlatLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlatLongitudinal');

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
            $this->addJoinObject($join, 'AlatLongitudinal');
        }

        return $this;
    }

    /**
     * Use the AlatLongitudinal relation AlatLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function useAlatLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAlatLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlatLongitudinal', '\DataDikdas\Model\AlatLongitudinalQuery');
    }

    /**
     * Filter the query by a related VldAlat object
     *
     * @param   VldAlat|PropelObjectCollection $vldAlat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AlatQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAlat($vldAlat, $comparison = null)
    {
        if ($vldAlat instanceof VldAlat) {
            return $this
                ->addUsingAlias(AlatPeer::ID_ALAT, $vldAlat->getIdAlat(), $comparison);
        } elseif ($vldAlat instanceof PropelObjectCollection) {
            return $this
                ->useVldAlatQuery()
                ->filterByPrimaryKeys($vldAlat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAlat() only accepts arguments of type VldAlat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAlat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function joinVldAlat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAlat');

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
            $this->addJoinObject($join, 'VldAlat');
        }

        return $this;
    }

    /**
     * Use the VldAlat relation VldAlat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAlatQuery A secondary query class using the current class as primary query
     */
    public function useVldAlatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAlat', '\DataDikdas\Model\VldAlatQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Alat $alat Object to remove from the list of results
     *
     * @return AlatQuery The current query, for fluid interface
     */
    public function prune($alat = null)
    {
        if ($alat) {
            $this->addUsingAlias(AlatPeer::ID_ALAT, $alat->getIdAlat(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
