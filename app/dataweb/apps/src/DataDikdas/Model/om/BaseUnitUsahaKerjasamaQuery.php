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
use DataDikdas\Model\Mou;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\UnitUsahaKerjasamaPeer;
use DataDikdas\Model\UnitUsahaKerjasamaQuery;

/**
 * Base class that represents a query for the 'unit_usaha_kerjasama' table.
 *
 * 
 *
 * @method UnitUsahaKerjasamaQuery orderByMouId($order = Criteria::ASC) Order by the mou_id column
 * @method UnitUsahaKerjasamaQuery orderByUnitUsahaId($order = Criteria::ASC) Order by the unit_usaha_id column
 * @method UnitUsahaKerjasamaQuery orderBySumberDanaId($order = Criteria::ASC) Order by the sumber_dana_id column
 * @method UnitUsahaKerjasamaQuery orderByProdukBarangDihasilkan($order = Criteria::ASC) Order by the produk_barang_dihasilkan column
 * @method UnitUsahaKerjasamaQuery orderByJasaProduksiDihasilkan($order = Criteria::ASC) Order by the jasa_produksi_dihasilkan column
 * @method UnitUsahaKerjasamaQuery orderByOmzetBarangPerbulan($order = Criteria::ASC) Order by the omzet_barang_perbulan column
 * @method UnitUsahaKerjasamaQuery orderByOmzetJasaPerbulan($order = Criteria::ASC) Order by the omzet_jasa_perbulan column
 * @method UnitUsahaKerjasamaQuery orderByPrestasiPenghargaan($order = Criteria::ASC) Order by the prestasi_penghargaan column
 * @method UnitUsahaKerjasamaQuery orderByPangsaPasarProduk($order = Criteria::ASC) Order by the pangsa_pasar_produk column
 * @method UnitUsahaKerjasamaQuery orderByPangsaPasarJasa($order = Criteria::ASC) Order by the pangsa_pasar_jasa column
 * @method UnitUsahaKerjasamaQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method UnitUsahaKerjasamaQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method UnitUsahaKerjasamaQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method UnitUsahaKerjasamaQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method UnitUsahaKerjasamaQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method UnitUsahaKerjasamaQuery groupByMouId() Group by the mou_id column
 * @method UnitUsahaKerjasamaQuery groupByUnitUsahaId() Group by the unit_usaha_id column
 * @method UnitUsahaKerjasamaQuery groupBySumberDanaId() Group by the sumber_dana_id column
 * @method UnitUsahaKerjasamaQuery groupByProdukBarangDihasilkan() Group by the produk_barang_dihasilkan column
 * @method UnitUsahaKerjasamaQuery groupByJasaProduksiDihasilkan() Group by the jasa_produksi_dihasilkan column
 * @method UnitUsahaKerjasamaQuery groupByOmzetBarangPerbulan() Group by the omzet_barang_perbulan column
 * @method UnitUsahaKerjasamaQuery groupByOmzetJasaPerbulan() Group by the omzet_jasa_perbulan column
 * @method UnitUsahaKerjasamaQuery groupByPrestasiPenghargaan() Group by the prestasi_penghargaan column
 * @method UnitUsahaKerjasamaQuery groupByPangsaPasarProduk() Group by the pangsa_pasar_produk column
 * @method UnitUsahaKerjasamaQuery groupByPangsaPasarJasa() Group by the pangsa_pasar_jasa column
 * @method UnitUsahaKerjasamaQuery groupByCreateDate() Group by the create_date column
 * @method UnitUsahaKerjasamaQuery groupByLastUpdate() Group by the last_update column
 * @method UnitUsahaKerjasamaQuery groupBySoftDelete() Group by the soft_delete column
 * @method UnitUsahaKerjasamaQuery groupByLastSync() Group by the last_sync column
 * @method UnitUsahaKerjasamaQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method UnitUsahaKerjasamaQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method UnitUsahaKerjasamaQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method UnitUsahaKerjasamaQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method UnitUsahaKerjasamaQuery leftJoinUnitUsaha($relationAlias = null) Adds a LEFT JOIN clause to the query using the UnitUsaha relation
 * @method UnitUsahaKerjasamaQuery rightJoinUnitUsaha($relationAlias = null) Adds a RIGHT JOIN clause to the query using the UnitUsaha relation
 * @method UnitUsahaKerjasamaQuery innerJoinUnitUsaha($relationAlias = null) Adds a INNER JOIN clause to the query using the UnitUsaha relation
 *
 * @method UnitUsahaKerjasamaQuery leftJoinMou($relationAlias = null) Adds a LEFT JOIN clause to the query using the Mou relation
 * @method UnitUsahaKerjasamaQuery rightJoinMou($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Mou relation
 * @method UnitUsahaKerjasamaQuery innerJoinMou($relationAlias = null) Adds a INNER JOIN clause to the query using the Mou relation
 *
 * @method UnitUsahaKerjasamaQuery leftJoinSumberDana($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberDana relation
 * @method UnitUsahaKerjasamaQuery rightJoinSumberDana($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberDana relation
 * @method UnitUsahaKerjasamaQuery innerJoinSumberDana($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberDana relation
 *
 * @method UnitUsahaKerjasama findOne(PropelPDO $con = null) Return the first UnitUsahaKerjasama matching the query
 * @method UnitUsahaKerjasama findOneOrCreate(PropelPDO $con = null) Return the first UnitUsahaKerjasama matching the query, or a new UnitUsahaKerjasama object populated from the query conditions when no match is found
 *
 * @method UnitUsahaKerjasama findOneByMouId(string $mou_id) Return the first UnitUsahaKerjasama filtered by the mou_id column
 * @method UnitUsahaKerjasama findOneByUnitUsahaId(string $unit_usaha_id) Return the first UnitUsahaKerjasama filtered by the unit_usaha_id column
 * @method UnitUsahaKerjasama findOneBySumberDanaId(string $sumber_dana_id) Return the first UnitUsahaKerjasama filtered by the sumber_dana_id column
 * @method UnitUsahaKerjasama findOneByProdukBarangDihasilkan(string $produk_barang_dihasilkan) Return the first UnitUsahaKerjasama filtered by the produk_barang_dihasilkan column
 * @method UnitUsahaKerjasama findOneByJasaProduksiDihasilkan(string $jasa_produksi_dihasilkan) Return the first UnitUsahaKerjasama filtered by the jasa_produksi_dihasilkan column
 * @method UnitUsahaKerjasama findOneByOmzetBarangPerbulan(string $omzet_barang_perbulan) Return the first UnitUsahaKerjasama filtered by the omzet_barang_perbulan column
 * @method UnitUsahaKerjasama findOneByOmzetJasaPerbulan(string $omzet_jasa_perbulan) Return the first UnitUsahaKerjasama filtered by the omzet_jasa_perbulan column
 * @method UnitUsahaKerjasama findOneByPrestasiPenghargaan(string $prestasi_penghargaan) Return the first UnitUsahaKerjasama filtered by the prestasi_penghargaan column
 * @method UnitUsahaKerjasama findOneByPangsaPasarProduk(string $pangsa_pasar_produk) Return the first UnitUsahaKerjasama filtered by the pangsa_pasar_produk column
 * @method UnitUsahaKerjasama findOneByPangsaPasarJasa(string $pangsa_pasar_jasa) Return the first UnitUsahaKerjasama filtered by the pangsa_pasar_jasa column
 * @method UnitUsahaKerjasama findOneByCreateDate(string $create_date) Return the first UnitUsahaKerjasama filtered by the create_date column
 * @method UnitUsahaKerjasama findOneByLastUpdate(string $last_update) Return the first UnitUsahaKerjasama filtered by the last_update column
 * @method UnitUsahaKerjasama findOneBySoftDelete(string $soft_delete) Return the first UnitUsahaKerjasama filtered by the soft_delete column
 * @method UnitUsahaKerjasama findOneByLastSync(string $last_sync) Return the first UnitUsahaKerjasama filtered by the last_sync column
 * @method UnitUsahaKerjasama findOneByUpdaterId(string $updater_id) Return the first UnitUsahaKerjasama filtered by the updater_id column
 *
 * @method array findByMouId(string $mou_id) Return UnitUsahaKerjasama objects filtered by the mou_id column
 * @method array findByUnitUsahaId(string $unit_usaha_id) Return UnitUsahaKerjasama objects filtered by the unit_usaha_id column
 * @method array findBySumberDanaId(string $sumber_dana_id) Return UnitUsahaKerjasama objects filtered by the sumber_dana_id column
 * @method array findByProdukBarangDihasilkan(string $produk_barang_dihasilkan) Return UnitUsahaKerjasama objects filtered by the produk_barang_dihasilkan column
 * @method array findByJasaProduksiDihasilkan(string $jasa_produksi_dihasilkan) Return UnitUsahaKerjasama objects filtered by the jasa_produksi_dihasilkan column
 * @method array findByOmzetBarangPerbulan(string $omzet_barang_perbulan) Return UnitUsahaKerjasama objects filtered by the omzet_barang_perbulan column
 * @method array findByOmzetJasaPerbulan(string $omzet_jasa_perbulan) Return UnitUsahaKerjasama objects filtered by the omzet_jasa_perbulan column
 * @method array findByPrestasiPenghargaan(string $prestasi_penghargaan) Return UnitUsahaKerjasama objects filtered by the prestasi_penghargaan column
 * @method array findByPangsaPasarProduk(string $pangsa_pasar_produk) Return UnitUsahaKerjasama objects filtered by the pangsa_pasar_produk column
 * @method array findByPangsaPasarJasa(string $pangsa_pasar_jasa) Return UnitUsahaKerjasama objects filtered by the pangsa_pasar_jasa column
 * @method array findByCreateDate(string $create_date) Return UnitUsahaKerjasama objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return UnitUsahaKerjasama objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return UnitUsahaKerjasama objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return UnitUsahaKerjasama objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return UnitUsahaKerjasama objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnitUsahaKerjasamaQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseUnitUsahaKerjasamaQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\UnitUsahaKerjasama', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new UnitUsahaKerjasamaQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   UnitUsahaKerjasamaQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return UnitUsahaKerjasamaQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof UnitUsahaKerjasamaQuery) {
            return $criteria;
        }
        $query = new UnitUsahaKerjasamaQuery();
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
     * $obj = $c->findPk(array(12, 34), $con);
     * </code>
     *
     * @param array $key Primary key to use for the query 
                         A Primary key composition: [$mou_id, $unit_usaha_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   UnitUsahaKerjasama|UnitUsahaKerjasama[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = UnitUsahaKerjasamaPeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 UnitUsahaKerjasama A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "mou_id", "unit_usaha_id", "sumber_dana_id", "produk_barang_dihasilkan", "jasa_produksi_dihasilkan", "omzet_barang_perbulan", "omzet_jasa_perbulan", "prestasi_penghargaan", "pangsa_pasar_produk", "pangsa_pasar_jasa", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "unit_usaha_kerjasama" WHERE "mou_id" = :p0 AND "unit_usaha_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new UnitUsahaKerjasama();
            $obj->hydrate($row);
            UnitUsahaKerjasamaPeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return UnitUsahaKerjasama|UnitUsahaKerjasama[]|mixed the result, formatted by the current formatter
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
     * $objs = $c->findPks(array(array(12, 56), array(832, 123), array(123, 456)), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|UnitUsahaKerjasama[]|mixed the list of results, formatted by the current formatter
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(UnitUsahaKerjasamaPeer::MOU_ID, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(UnitUsahaKerjasamaPeer::MOU_ID, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
    }

    /**
     * Filter the query on the mou_id column
     *
     * Example usage:
     * <code>
     * $query->filterByMouId('fooValue');   // WHERE mou_id = 'fooValue'
     * $query->filterByMouId('%fooValue%'); // WHERE mou_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $mouId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByMouId($mouId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($mouId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $mouId)) {
                $mouId = str_replace('*', '%', $mouId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::MOU_ID, $mouId, $comparison);
    }

    /**
     * Filter the query on the unit_usaha_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUnitUsahaId('fooValue');   // WHERE unit_usaha_id = 'fooValue'
     * $query->filterByUnitUsahaId('%fooValue%'); // WHERE unit_usaha_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $unitUsahaId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByUnitUsahaId($unitUsahaId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($unitUsahaId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $unitUsahaId)) {
                $unitUsahaId = str_replace('*', '%', $unitUsahaId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $unitUsahaId, $comparison);
    }

    /**
     * Filter the query on the sumber_dana_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberDanaId(1234); // WHERE sumber_dana_id = 1234
     * $query->filterBySumberDanaId(array(12, 34)); // WHERE sumber_dana_id IN (12, 34)
     * $query->filterBySumberDanaId(array('min' => 12)); // WHERE sumber_dana_id >= 12
     * $query->filterBySumberDanaId(array('max' => 12)); // WHERE sumber_dana_id <= 12
     * </code>
     *
     * @see       filterBySumberDana()
     *
     * @param     mixed $sumberDanaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterBySumberDanaId($sumberDanaId = null, $comparison = null)
    {
        if (is_array($sumberDanaId)) {
            $useMinMax = false;
            if (isset($sumberDanaId['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $sumberDanaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberDanaId['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $sumberDanaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $sumberDanaId, $comparison);
    }

    /**
     * Filter the query on the produk_barang_dihasilkan column
     *
     * Example usage:
     * <code>
     * $query->filterByProdukBarangDihasilkan('fooValue');   // WHERE produk_barang_dihasilkan = 'fooValue'
     * $query->filterByProdukBarangDihasilkan('%fooValue%'); // WHERE produk_barang_dihasilkan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $produkBarangDihasilkan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByProdukBarangDihasilkan($produkBarangDihasilkan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($produkBarangDihasilkan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $produkBarangDihasilkan)) {
                $produkBarangDihasilkan = str_replace('*', '%', $produkBarangDihasilkan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN, $produkBarangDihasilkan, $comparison);
    }

    /**
     * Filter the query on the jasa_produksi_dihasilkan column
     *
     * Example usage:
     * <code>
     * $query->filterByJasaProduksiDihasilkan('fooValue');   // WHERE jasa_produksi_dihasilkan = 'fooValue'
     * $query->filterByJasaProduksiDihasilkan('%fooValue%'); // WHERE jasa_produksi_dihasilkan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jasaProduksiDihasilkan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByJasaProduksiDihasilkan($jasaProduksiDihasilkan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jasaProduksiDihasilkan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jasaProduksiDihasilkan)) {
                $jasaProduksiDihasilkan = str_replace('*', '%', $jasaProduksiDihasilkan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN, $jasaProduksiDihasilkan, $comparison);
    }

    /**
     * Filter the query on the omzet_barang_perbulan column
     *
     * Example usage:
     * <code>
     * $query->filterByOmzetBarangPerbulan(1234); // WHERE omzet_barang_perbulan = 1234
     * $query->filterByOmzetBarangPerbulan(array(12, 34)); // WHERE omzet_barang_perbulan IN (12, 34)
     * $query->filterByOmzetBarangPerbulan(array('min' => 12)); // WHERE omzet_barang_perbulan >= 12
     * $query->filterByOmzetBarangPerbulan(array('max' => 12)); // WHERE omzet_barang_perbulan <= 12
     * </code>
     *
     * @param     mixed $omzetBarangPerbulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByOmzetBarangPerbulan($omzetBarangPerbulan = null, $comparison = null)
    {
        if (is_array($omzetBarangPerbulan)) {
            $useMinMax = false;
            if (isset($omzetBarangPerbulan['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN, $omzetBarangPerbulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($omzetBarangPerbulan['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN, $omzetBarangPerbulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN, $omzetBarangPerbulan, $comparison);
    }

    /**
     * Filter the query on the omzet_jasa_perbulan column
     *
     * Example usage:
     * <code>
     * $query->filterByOmzetJasaPerbulan(1234); // WHERE omzet_jasa_perbulan = 1234
     * $query->filterByOmzetJasaPerbulan(array(12, 34)); // WHERE omzet_jasa_perbulan IN (12, 34)
     * $query->filterByOmzetJasaPerbulan(array('min' => 12)); // WHERE omzet_jasa_perbulan >= 12
     * $query->filterByOmzetJasaPerbulan(array('max' => 12)); // WHERE omzet_jasa_perbulan <= 12
     * </code>
     *
     * @param     mixed $omzetJasaPerbulan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByOmzetJasaPerbulan($omzetJasaPerbulan = null, $comparison = null)
    {
        if (is_array($omzetJasaPerbulan)) {
            $useMinMax = false;
            if (isset($omzetJasaPerbulan['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN, $omzetJasaPerbulan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($omzetJasaPerbulan['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN, $omzetJasaPerbulan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN, $omzetJasaPerbulan, $comparison);
    }

    /**
     * Filter the query on the prestasi_penghargaan column
     *
     * Example usage:
     * <code>
     * $query->filterByPrestasiPenghargaan('fooValue');   // WHERE prestasi_penghargaan = 'fooValue'
     * $query->filterByPrestasiPenghargaan('%fooValue%'); // WHERE prestasi_penghargaan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $prestasiPenghargaan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPrestasiPenghargaan($prestasiPenghargaan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($prestasiPenghargaan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $prestasiPenghargaan)) {
                $prestasiPenghargaan = str_replace('*', '%', $prestasiPenghargaan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN, $prestasiPenghargaan, $comparison);
    }

    /**
     * Filter the query on the pangsa_pasar_produk column
     *
     * Example usage:
     * <code>
     * $query->filterByPangsaPasarProduk('fooValue');   // WHERE pangsa_pasar_produk = 'fooValue'
     * $query->filterByPangsaPasarProduk('%fooValue%'); // WHERE pangsa_pasar_produk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pangsaPasarProduk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPangsaPasarProduk($pangsaPasarProduk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pangsaPasarProduk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pangsaPasarProduk)) {
                $pangsaPasarProduk = str_replace('*', '%', $pangsaPasarProduk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK, $pangsaPasarProduk, $comparison);
    }

    /**
     * Filter the query on the pangsa_pasar_jasa column
     *
     * Example usage:
     * <code>
     * $query->filterByPangsaPasarJasa('fooValue');   // WHERE pangsa_pasar_jasa = 'fooValue'
     * $query->filterByPangsaPasarJasa('%fooValue%'); // WHERE pangsa_pasar_jasa LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pangsaPasarJasa The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByPangsaPasarJasa($pangsaPasarJasa = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pangsaPasarJasa)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pangsaPasarJasa)) {
                $pangsaPasarJasa = str_replace('*', '%', $pangsaPasarJasa);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA, $pangsaPasarJasa, $comparison);
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
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

        return $this->addUsingAlias(UnitUsahaKerjasamaPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related UnitUsaha object
     *
     * @param   UnitUsaha|PropelObjectCollection $unitUsaha The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaKerjasamaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByUnitUsaha($unitUsaha, $comparison = null)
    {
        if ($unitUsaha instanceof UnitUsaha) {
            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $unitUsaha->getUnitUsahaId(), $comparison);
        } elseif ($unitUsaha instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $unitUsaha->toKeyValue('PrimaryKey', 'UnitUsahaId'), $comparison);
        } else {
            throw new PropelException('filterByUnitUsaha() only accepts arguments of type UnitUsaha or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the UnitUsaha relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function joinUnitUsaha($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('UnitUsaha');

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
            $this->addJoinObject($join, 'UnitUsaha');
        }

        return $this;
    }

    /**
     * Use the UnitUsaha relation UnitUsaha object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\UnitUsahaQuery A secondary query class using the current class as primary query
     */
    public function useUnitUsahaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinUnitUsaha($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'UnitUsaha', '\DataDikdas\Model\UnitUsahaQuery');
    }

    /**
     * Filter the query by a related Mou object
     *
     * @param   Mou|PropelObjectCollection $mou The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaKerjasamaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMou($mou, $comparison = null)
    {
        if ($mou instanceof Mou) {
            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::MOU_ID, $mou->getMouId(), $comparison);
        } elseif ($mou instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::MOU_ID, $mou->toKeyValue('PrimaryKey', 'MouId'), $comparison);
        } else {
            throw new PropelException('filterByMou() only accepts arguments of type Mou or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Mou relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function joinMou($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Mou');

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
            $this->addJoinObject($join, 'Mou');
        }

        return $this;
    }

    /**
     * Use the Mou relation Mou object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MouQuery A secondary query class using the current class as primary query
     */
    public function useMouQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMou($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Mou', '\DataDikdas\Model\MouQuery');
    }

    /**
     * Filter the query by a related SumberDana object
     *
     * @param   SumberDana|PropelObjectCollection $sumberDana The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 UnitUsahaKerjasamaQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberDana($sumberDana, $comparison = null)
    {
        if ($sumberDana instanceof SumberDana) {
            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $sumberDana->getSumberDanaId(), $comparison);
        } elseif ($sumberDana instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $sumberDana->toKeyValue('PrimaryKey', 'SumberDanaId'), $comparison);
        } else {
            throw new PropelException('filterBySumberDana() only accepts arguments of type SumberDana or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberDana relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function joinSumberDana($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberDana');

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
            $this->addJoinObject($join, 'SumberDana');
        }

        return $this;
    }

    /**
     * Use the SumberDana relation SumberDana object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberDanaQuery A secondary query class using the current class as primary query
     */
    public function useSumberDanaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberDana($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberDana', '\DataDikdas\Model\SumberDanaQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   UnitUsahaKerjasama $unitUsahaKerjasama Object to remove from the list of results
     *
     * @return UnitUsahaKerjasamaQuery The current query, for fluid interface
     */
    public function prune($unitUsahaKerjasama = null)
    {
        if ($unitUsahaKerjasama) {
            $this->addCond('pruneCond0', $this->getAliasedColName(UnitUsahaKerjasamaPeer::MOU_ID), $unitUsahaKerjasama->getMouId(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID), $unitUsahaKerjasama->getUnitUsahaId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
