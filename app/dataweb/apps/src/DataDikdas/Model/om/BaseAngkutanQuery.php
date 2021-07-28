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
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanDariBlockgrant;
use DataDikdas\Model\AngkutanPeer;
use DataDikdas\Model\AngkutanQuery;
use DataDikdas\Model\JenisHapusBuku;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\StatusKepemilikanSarpras;
use DataDikdas\Model\VldAngkutan;

/**
 * Base class that represents a query for the 'angkutan' table.
 *
 * 
 *
 * @method AngkutanQuery orderByIdAngkutan($order = Criteria::ASC) Order by the id_angkutan column
 * @method AngkutanQuery orderBySekolahId($order = Criteria::ASC) Order by the sekolah_id column
 * @method AngkutanQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method AngkutanQuery orderByJenisSaranaId($order = Criteria::ASC) Order by the jenis_sarana_id column
 * @method AngkutanQuery orderByIdHapusBuku($order = Criteria::ASC) Order by the id_hapus_buku column
 * @method AngkutanQuery orderByKepemilikanSarprasId($order = Criteria::ASC) Order by the kepemilikan_sarpras_id column
 * @method AngkutanQuery orderByKdKl($order = Criteria::ASC) Order by the kd_kl column
 * @method AngkutanQuery orderByKdSatker($order = Criteria::ASC) Order by the kd_satker column
 * @method AngkutanQuery orderByKdBrg($order = Criteria::ASC) Order by the kd_brg column
 * @method AngkutanQuery orderByNup($order = Criteria::ASC) Order by the nup column
 * @method AngkutanQuery orderByKodeEselon1($order = Criteria::ASC) Order by the kode_eselon1 column
 * @method AngkutanQuery orderByNamaEselon1($order = Criteria::ASC) Order by the nama_eselon1 column
 * @method AngkutanQuery orderByKodeSubSatker($order = Criteria::ASC) Order by the kode_sub_satker column
 * @method AngkutanQuery orderByNamaSubSatker($order = Criteria::ASC) Order by the nama_sub_satker column
 * @method AngkutanQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method AngkutanQuery orderBySpesifikasi($order = Criteria::ASC) Order by the spesifikasi column
 * @method AngkutanQuery orderByTglHapusBuku($order = Criteria::ASC) Order by the tgl_hapus_buku column
 * @method AngkutanQuery orderByMerk($order = Criteria::ASC) Order by the merk column
 * @method AngkutanQuery orderByNoPolisi($order = Criteria::ASC) Order by the no_polisi column
 * @method AngkutanQuery orderByNoBpkb($order = Criteria::ASC) Order by the no_bpkb column
 * @method AngkutanQuery orderByAlamat($order = Criteria::ASC) Order by the alamat column
 * @method AngkutanQuery orderByAsalData($order = Criteria::ASC) Order by the asal_data column
 * @method AngkutanQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method AngkutanQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method AngkutanQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method AngkutanQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method AngkutanQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method AngkutanQuery groupByIdAngkutan() Group by the id_angkutan column
 * @method AngkutanQuery groupBySekolahId() Group by the sekolah_id column
 * @method AngkutanQuery groupByPtkId() Group by the ptk_id column
 * @method AngkutanQuery groupByJenisSaranaId() Group by the jenis_sarana_id column
 * @method AngkutanQuery groupByIdHapusBuku() Group by the id_hapus_buku column
 * @method AngkutanQuery groupByKepemilikanSarprasId() Group by the kepemilikan_sarpras_id column
 * @method AngkutanQuery groupByKdKl() Group by the kd_kl column
 * @method AngkutanQuery groupByKdSatker() Group by the kd_satker column
 * @method AngkutanQuery groupByKdBrg() Group by the kd_brg column
 * @method AngkutanQuery groupByNup() Group by the nup column
 * @method AngkutanQuery groupByKodeEselon1() Group by the kode_eselon1 column
 * @method AngkutanQuery groupByNamaEselon1() Group by the nama_eselon1 column
 * @method AngkutanQuery groupByKodeSubSatker() Group by the kode_sub_satker column
 * @method AngkutanQuery groupByNamaSubSatker() Group by the nama_sub_satker column
 * @method AngkutanQuery groupByNama() Group by the nama column
 * @method AngkutanQuery groupBySpesifikasi() Group by the spesifikasi column
 * @method AngkutanQuery groupByTglHapusBuku() Group by the tgl_hapus_buku column
 * @method AngkutanQuery groupByMerk() Group by the merk column
 * @method AngkutanQuery groupByNoPolisi() Group by the no_polisi column
 * @method AngkutanQuery groupByNoBpkb() Group by the no_bpkb column
 * @method AngkutanQuery groupByAlamat() Group by the alamat column
 * @method AngkutanQuery groupByAsalData() Group by the asal_data column
 * @method AngkutanQuery groupByCreateDate() Group by the create_date column
 * @method AngkutanQuery groupByLastUpdate() Group by the last_update column
 * @method AngkutanQuery groupBySoftDelete() Group by the soft_delete column
 * @method AngkutanQuery groupByLastSync() Group by the last_sync column
 * @method AngkutanQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method AngkutanQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method AngkutanQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method AngkutanQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method AngkutanQuery leftJoinPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the Ptk relation
 * @method AngkutanQuery rightJoinPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Ptk relation
 * @method AngkutanQuery innerJoinPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the Ptk relation
 *
 * @method AngkutanQuery leftJoinJenisHapusBuku($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisHapusBuku relation
 * @method AngkutanQuery rightJoinJenisHapusBuku($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisHapusBuku relation
 * @method AngkutanQuery innerJoinJenisHapusBuku($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisHapusBuku relation
 *
 * @method AngkutanQuery leftJoinStatusKepemilikanSarpras($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method AngkutanQuery rightJoinStatusKepemilikanSarpras($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepemilikanSarpras relation
 * @method AngkutanQuery innerJoinStatusKepemilikanSarpras($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepemilikanSarpras relation
 *
 * @method AngkutanQuery leftJoinSekolah($relationAlias = null) Adds a LEFT JOIN clause to the query using the Sekolah relation
 * @method AngkutanQuery rightJoinSekolah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Sekolah relation
 * @method AngkutanQuery innerJoinSekolah($relationAlias = null) Adds a INNER JOIN clause to the query using the Sekolah relation
 *
 * @method AngkutanQuery leftJoinJenisSarana($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisSarana relation
 * @method AngkutanQuery rightJoinJenisSarana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisSarana relation
 * @method AngkutanQuery innerJoinJenisSarana($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisSarana relation
 *
 * @method AngkutanQuery leftJoinAngkutanDariBlockgrant($relationAlias = null) Adds a LEFT JOIN clause to the query using the AngkutanDariBlockgrant relation
 * @method AngkutanQuery rightJoinAngkutanDariBlockgrant($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AngkutanDariBlockgrant relation
 * @method AngkutanQuery innerJoinAngkutanDariBlockgrant($relationAlias = null) Adds a INNER JOIN clause to the query using the AngkutanDariBlockgrant relation
 *
 * @method AngkutanQuery leftJoinVldAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldAngkutan relation
 * @method AngkutanQuery rightJoinVldAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldAngkutan relation
 * @method AngkutanQuery innerJoinVldAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the VldAngkutan relation
 *
 * @method Angkutan findOne(PropelPDO $con = null) Return the first Angkutan matching the query
 * @method Angkutan findOneOrCreate(PropelPDO $con = null) Return the first Angkutan matching the query, or a new Angkutan object populated from the query conditions when no match is found
 *
 * @method Angkutan findOneBySekolahId(string $sekolah_id) Return the first Angkutan filtered by the sekolah_id column
 * @method Angkutan findOneByPtkId(string $ptk_id) Return the first Angkutan filtered by the ptk_id column
 * @method Angkutan findOneByJenisSaranaId(int $jenis_sarana_id) Return the first Angkutan filtered by the jenis_sarana_id column
 * @method Angkutan findOneByIdHapusBuku(string $id_hapus_buku) Return the first Angkutan filtered by the id_hapus_buku column
 * @method Angkutan findOneByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return the first Angkutan filtered by the kepemilikan_sarpras_id column
 * @method Angkutan findOneByKdKl(string $kd_kl) Return the first Angkutan filtered by the kd_kl column
 * @method Angkutan findOneByKdSatker(string $kd_satker) Return the first Angkutan filtered by the kd_satker column
 * @method Angkutan findOneByKdBrg(string $kd_brg) Return the first Angkutan filtered by the kd_brg column
 * @method Angkutan findOneByNup(int $nup) Return the first Angkutan filtered by the nup column
 * @method Angkutan findOneByKodeEselon1(string $kode_eselon1) Return the first Angkutan filtered by the kode_eselon1 column
 * @method Angkutan findOneByNamaEselon1(string $nama_eselon1) Return the first Angkutan filtered by the nama_eselon1 column
 * @method Angkutan findOneByKodeSubSatker(string $kode_sub_satker) Return the first Angkutan filtered by the kode_sub_satker column
 * @method Angkutan findOneByNamaSubSatker(string $nama_sub_satker) Return the first Angkutan filtered by the nama_sub_satker column
 * @method Angkutan findOneByNama(string $nama) Return the first Angkutan filtered by the nama column
 * @method Angkutan findOneBySpesifikasi(string $spesifikasi) Return the first Angkutan filtered by the spesifikasi column
 * @method Angkutan findOneByTglHapusBuku(string $tgl_hapus_buku) Return the first Angkutan filtered by the tgl_hapus_buku column
 * @method Angkutan findOneByMerk(string $merk) Return the first Angkutan filtered by the merk column
 * @method Angkutan findOneByNoPolisi(string $no_polisi) Return the first Angkutan filtered by the no_polisi column
 * @method Angkutan findOneByNoBpkb(string $no_bpkb) Return the first Angkutan filtered by the no_bpkb column
 * @method Angkutan findOneByAlamat(string $alamat) Return the first Angkutan filtered by the alamat column
 * @method Angkutan findOneByAsalData(string $asal_data) Return the first Angkutan filtered by the asal_data column
 * @method Angkutan findOneByCreateDate(string $create_date) Return the first Angkutan filtered by the create_date column
 * @method Angkutan findOneByLastUpdate(string $last_update) Return the first Angkutan filtered by the last_update column
 * @method Angkutan findOneBySoftDelete(string $soft_delete) Return the first Angkutan filtered by the soft_delete column
 * @method Angkutan findOneByLastSync(string $last_sync) Return the first Angkutan filtered by the last_sync column
 * @method Angkutan findOneByUpdaterId(string $updater_id) Return the first Angkutan filtered by the updater_id column
 *
 * @method array findByIdAngkutan(string $id_angkutan) Return Angkutan objects filtered by the id_angkutan column
 * @method array findBySekolahId(string $sekolah_id) Return Angkutan objects filtered by the sekolah_id column
 * @method array findByPtkId(string $ptk_id) Return Angkutan objects filtered by the ptk_id column
 * @method array findByJenisSaranaId(int $jenis_sarana_id) Return Angkutan objects filtered by the jenis_sarana_id column
 * @method array findByIdHapusBuku(string $id_hapus_buku) Return Angkutan objects filtered by the id_hapus_buku column
 * @method array findByKepemilikanSarprasId(string $kepemilikan_sarpras_id) Return Angkutan objects filtered by the kepemilikan_sarpras_id column
 * @method array findByKdKl(string $kd_kl) Return Angkutan objects filtered by the kd_kl column
 * @method array findByKdSatker(string $kd_satker) Return Angkutan objects filtered by the kd_satker column
 * @method array findByKdBrg(string $kd_brg) Return Angkutan objects filtered by the kd_brg column
 * @method array findByNup(int $nup) Return Angkutan objects filtered by the nup column
 * @method array findByKodeEselon1(string $kode_eselon1) Return Angkutan objects filtered by the kode_eselon1 column
 * @method array findByNamaEselon1(string $nama_eselon1) Return Angkutan objects filtered by the nama_eselon1 column
 * @method array findByKodeSubSatker(string $kode_sub_satker) Return Angkutan objects filtered by the kode_sub_satker column
 * @method array findByNamaSubSatker(string $nama_sub_satker) Return Angkutan objects filtered by the nama_sub_satker column
 * @method array findByNama(string $nama) Return Angkutan objects filtered by the nama column
 * @method array findBySpesifikasi(string $spesifikasi) Return Angkutan objects filtered by the spesifikasi column
 * @method array findByTglHapusBuku(string $tgl_hapus_buku) Return Angkutan objects filtered by the tgl_hapus_buku column
 * @method array findByMerk(string $merk) Return Angkutan objects filtered by the merk column
 * @method array findByNoPolisi(string $no_polisi) Return Angkutan objects filtered by the no_polisi column
 * @method array findByNoBpkb(string $no_bpkb) Return Angkutan objects filtered by the no_bpkb column
 * @method array findByAlamat(string $alamat) Return Angkutan objects filtered by the alamat column
 * @method array findByAsalData(string $asal_data) Return Angkutan objects filtered by the asal_data column
 * @method array findByCreateDate(string $create_date) Return Angkutan objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Angkutan objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Angkutan objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Angkutan objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Angkutan objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAngkutanQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseAngkutanQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Angkutan', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new AngkutanQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   AngkutanQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return AngkutanQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof AngkutanQuery) {
            return $criteria;
        }
        $query = new AngkutanQuery();
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
     * @return   Angkutan|Angkutan[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = AngkutanPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(AngkutanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Angkutan A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdAngkutan($key, $con = null)
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
     * @return                 Angkutan A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_angkutan", "sekolah_id", "ptk_id", "jenis_sarana_id", "id_hapus_buku", "kepemilikan_sarpras_id", "kd_kl", "kd_satker", "kd_brg", "nup", "kode_eselon1", "nama_eselon1", "kode_sub_satker", "nama_sub_satker", "nama", "spesifikasi", "tgl_hapus_buku", "merk", "no_polisi", "no_bpkb", "alamat", "asal_data", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "angkutan" WHERE "id_angkutan" = :p0';
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
            $obj = new Angkutan();
            $obj->hydrate($row);
            AngkutanPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Angkutan|Angkutan[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Angkutan[]|mixed the list of results, formatted by the current formatter
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_angkutan column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAngkutan('fooValue');   // WHERE id_angkutan = 'fooValue'
     * $query->filterByIdAngkutan('%fooValue%'); // WHERE id_angkutan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAngkutan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByIdAngkutan($idAngkutan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAngkutan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAngkutan)) {
                $idAngkutan = str_replace('*', '%', $idAngkutan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $idAngkutan, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::SEKOLAH_ID, $sekolahId, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::PTK_ID, $ptkId, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByJenisSaranaId($jenisSaranaId = null, $comparison = null)
    {
        if (is_array($jenisSaranaId)) {
            $useMinMax = false;
            if (isset($jenisSaranaId['min'])) {
                $this->addUsingAlias(AngkutanPeer::JENIS_SARANA_ID, $jenisSaranaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisSaranaId['max'])) {
                $this->addUsingAlias(AngkutanPeer::JENIS_SARANA_ID, $jenisSaranaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::JENIS_SARANA_ID, $jenisSaranaId, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::ID_HAPUS_BUKU, $idHapusBuku, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByKepemilikanSarprasId($kepemilikanSarprasId = null, $comparison = null)
    {
        if (is_array($kepemilikanSarprasId)) {
            $useMinMax = false;
            if (isset($kepemilikanSarprasId['min'])) {
                $this->addUsingAlias(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kepemilikanSarprasId['max'])) {
                $this->addUsingAlias(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, $kepemilikanSarprasId, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::KD_KL, $kdKl, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::KD_SATKER, $kdSatker, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::KD_BRG, $kdBrg, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByNup($nup = null, $comparison = null)
    {
        if (is_array($nup)) {
            $useMinMax = false;
            if (isset($nup['min'])) {
                $this->addUsingAlias(AngkutanPeer::NUP, $nup['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($nup['max'])) {
                $this->addUsingAlias(AngkutanPeer::NUP, $nup['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::NUP, $nup, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::KODE_ESELON1, $kodeEselon1, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::NAMA_ESELON1, $namaEselon1, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::KODE_SUB_SATKER, $kodeSubSatker, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::NAMA_SUB_SATKER, $namaSubSatker, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::NAMA, $nama, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::SPESIFIKASI, $spesifikasi, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByTglHapusBuku($tglHapusBuku = null, $comparison = null)
    {
        if (is_array($tglHapusBuku)) {
            $useMinMax = false;
            if (isset($tglHapusBuku['min'])) {
                $this->addUsingAlias(AngkutanPeer::TGL_HAPUS_BUKU, $tglHapusBuku['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglHapusBuku['max'])) {
                $this->addUsingAlias(AngkutanPeer::TGL_HAPUS_BUKU, $tglHapusBuku['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::TGL_HAPUS_BUKU, $tglHapusBuku, $comparison);
    }

    /**
     * Filter the query on the merk column
     *
     * Example usage:
     * <code>
     * $query->filterByMerk('fooValue');   // WHERE merk = 'fooValue'
     * $query->filterByMerk('%fooValue%'); // WHERE merk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $merk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByMerk($merk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($merk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $merk)) {
                $merk = str_replace('*', '%', $merk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::MERK, $merk, $comparison);
    }

    /**
     * Filter the query on the no_polisi column
     *
     * Example usage:
     * <code>
     * $query->filterByNoPolisi('fooValue');   // WHERE no_polisi = 'fooValue'
     * $query->filterByNoPolisi('%fooValue%'); // WHERE no_polisi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noPolisi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByNoPolisi($noPolisi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noPolisi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noPolisi)) {
                $noPolisi = str_replace('*', '%', $noPolisi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::NO_POLISI, $noPolisi, $comparison);
    }

    /**
     * Filter the query on the no_bpkb column
     *
     * Example usage:
     * <code>
     * $query->filterByNoBpkb('fooValue');   // WHERE no_bpkb = 'fooValue'
     * $query->filterByNoBpkb('%fooValue%'); // WHERE no_bpkb LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noBpkb The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByNoBpkb($noBpkb = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noBpkb)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noBpkb)) {
                $noBpkb = str_replace('*', '%', $noBpkb);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::NO_BPKB, $noBpkb, $comparison);
    }

    /**
     * Filter the query on the alamat column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamat('fooValue');   // WHERE alamat = 'fooValue'
     * $query->filterByAlamat('%fooValue%'); // WHERE alamat LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamat The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByAlamat($alamat = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamat)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamat)) {
                $alamat = str_replace('*', '%', $alamat);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::ALAMAT, $alamat, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::ASAL_DATA, $asalData, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(AngkutanPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(AngkutanPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(AngkutanPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(AngkutanPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(AngkutanPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(AngkutanPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(AngkutanPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(AngkutanPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(AngkutanPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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

        return $this->addUsingAlias(AngkutanPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Ptk object
     *
     * @param   Ptk|PropelObjectCollection $ptk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtk($ptk, $comparison = null)
    {
        if ($ptk instanceof Ptk) {
            return $this
                ->addUsingAlias(AngkutanPeer::PTK_ID, $ptk->getPtkId(), $comparison);
        } elseif ($ptk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanPeer::PTK_ID, $ptk->toKeyValue('PrimaryKey', 'PtkId'), $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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
     * Filter the query by a related JenisHapusBuku object
     *
     * @param   JenisHapusBuku|PropelObjectCollection $jenisHapusBuku The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisHapusBuku($jenisHapusBuku, $comparison = null)
    {
        if ($jenisHapusBuku instanceof JenisHapusBuku) {
            return $this
                ->addUsingAlias(AngkutanPeer::ID_HAPUS_BUKU, $jenisHapusBuku->getIdHapusBuku(), $comparison);
        } elseif ($jenisHapusBuku instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanPeer::ID_HAPUS_BUKU, $jenisHapusBuku->toKeyValue('PrimaryKey', 'IdHapusBuku'), $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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
     * Filter the query by a related StatusKepemilikanSarpras object
     *
     * @param   StatusKepemilikanSarpras|PropelObjectCollection $statusKepemilikanSarpras The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepemilikanSarpras($statusKepemilikanSarpras, $comparison = null)
    {
        if ($statusKepemilikanSarpras instanceof StatusKepemilikanSarpras) {
            return $this
                ->addUsingAlias(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->getKepemilikanSarprasId(), $comparison);
        } elseif ($statusKepemilikanSarpras instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanPeer::KEPEMILIKAN_SARPRAS_ID, $statusKepemilikanSarpras->toKeyValue('PrimaryKey', 'KepemilikanSarprasId'), $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySekolah($sekolah, $comparison = null)
    {
        if ($sekolah instanceof Sekolah) {
            return $this
                ->addUsingAlias(AngkutanPeer::SEKOLAH_ID, $sekolah->getSekolahId(), $comparison);
        } elseif ($sekolah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanPeer::SEKOLAH_ID, $sekolah->toKeyValue('PrimaryKey', 'SekolahId'), $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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
     * Filter the query by a related JenisSarana object
     *
     * @param   JenisSarana|PropelObjectCollection $jenisSarana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisSarana($jenisSarana, $comparison = null)
    {
        if ($jenisSarana instanceof JenisSarana) {
            return $this
                ->addUsingAlias(AngkutanPeer::JENIS_SARANA_ID, $jenisSarana->getJenisSaranaId(), $comparison);
        } elseif ($jenisSarana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(AngkutanPeer::JENIS_SARANA_ID, $jenisSarana->toKeyValue('PrimaryKey', 'JenisSaranaId'), $comparison);
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
     * @return AngkutanQuery The current query, for fluid interface
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
     * Filter the query by a related AngkutanDariBlockgrant object
     *
     * @param   AngkutanDariBlockgrant|PropelObjectCollection $angkutanDariBlockgrant  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutanDariBlockgrant($angkutanDariBlockgrant, $comparison = null)
    {
        if ($angkutanDariBlockgrant instanceof AngkutanDariBlockgrant) {
            return $this
                ->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $angkutanDariBlockgrant->getIdAngkutan(), $comparison);
        } elseif ($angkutanDariBlockgrant instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanDariBlockgrantQuery()
                ->filterByPrimaryKeys($angkutanDariBlockgrant->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutanDariBlockgrant() only accepts arguments of type AngkutanDariBlockgrant or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AngkutanDariBlockgrant relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function joinAngkutanDariBlockgrant($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AngkutanDariBlockgrant');

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
            $this->addJoinObject($join, 'AngkutanDariBlockgrant');
        }

        return $this;
    }

    /**
     * Use the AngkutanDariBlockgrant relation AngkutanDariBlockgrant object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanDariBlockgrantQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanDariBlockgrantQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAngkutanDariBlockgrant($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AngkutanDariBlockgrant', '\DataDikdas\Model\AngkutanDariBlockgrantQuery');
    }

    /**
     * Filter the query by a related VldAngkutan object
     *
     * @param   VldAngkutan|PropelObjectCollection $vldAngkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 AngkutanQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldAngkutan($vldAngkutan, $comparison = null)
    {
        if ($vldAngkutan instanceof VldAngkutan) {
            return $this
                ->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $vldAngkutan->getIdAngkutan(), $comparison);
        } elseif ($vldAngkutan instanceof PropelObjectCollection) {
            return $this
                ->useVldAngkutanQuery()
                ->filterByPrimaryKeys($vldAngkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldAngkutan() only accepts arguments of type VldAngkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldAngkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function joinVldAngkutan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldAngkutan');

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
            $this->addJoinObject($join, 'VldAngkutan');
        }

        return $this;
    }

    /**
     * Use the VldAngkutan relation VldAngkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldAngkutanQuery A secondary query class using the current class as primary query
     */
    public function useVldAngkutanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldAngkutan', '\DataDikdas\Model\VldAngkutanQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Angkutan $angkutan Object to remove from the list of results
     *
     * @return AngkutanQuery The current query, for fluid interface
     */
    public function prune($angkutan = null)
    {
        if ($angkutan) {
            $this->addUsingAlias(AngkutanPeer::ID_ANGKUTAN, $angkutan->getIdAngkutan(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
