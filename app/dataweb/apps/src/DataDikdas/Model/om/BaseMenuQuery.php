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
use DataDikdas\Model\Aplikasi;
use DataDikdas\Model\Menu;
use DataDikdas\Model\MenuPeer;
use DataDikdas\Model\MenuQuery;
use DataDikdas\Model\MenuRole;

/**
 * Base class that represents a query for the 'man_akses.menu' table.
 *
 * 
 *
 * @method MenuQuery orderByIdMenu($order = Criteria::ASC) Order by the id_menu column
 * @method MenuQuery orderByMenIdMenu($order = Criteria::ASC) Order by the men_id_menu column
 * @method MenuQuery orderByIdAplikasi($order = Criteria::ASC) Order by the id_aplikasi column
 * @method MenuQuery orderByNmMenu($order = Criteria::ASC) Order by the nm_menu column
 * @method MenuQuery orderByNmFile($order = Criteria::ASC) Order by the nm_file column
 * @method MenuQuery orderByLevelMenu($order = Criteria::ASC) Order by the level_menu column
 * @method MenuQuery orderByUrutanMenu($order = Criteria::ASC) Order by the urutan_menu column
 * @method MenuQuery orderByAAktif($order = Criteria::ASC) Order by the a_aktif column
 * @method MenuQuery orderByATampil($order = Criteria::ASC) Order by the a_tampil column
 * @method MenuQuery orderByIcon($order = Criteria::ASC) Order by the icon column
 * @method MenuQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MenuQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MenuQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MenuQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MenuQuery groupByIdMenu() Group by the id_menu column
 * @method MenuQuery groupByMenIdMenu() Group by the men_id_menu column
 * @method MenuQuery groupByIdAplikasi() Group by the id_aplikasi column
 * @method MenuQuery groupByNmMenu() Group by the nm_menu column
 * @method MenuQuery groupByNmFile() Group by the nm_file column
 * @method MenuQuery groupByLevelMenu() Group by the level_menu column
 * @method MenuQuery groupByUrutanMenu() Group by the urutan_menu column
 * @method MenuQuery groupByAAktif() Group by the a_aktif column
 * @method MenuQuery groupByATampil() Group by the a_tampil column
 * @method MenuQuery groupByIcon() Group by the icon column
 * @method MenuQuery groupByCreateDate() Group by the create_date column
 * @method MenuQuery groupByLastUpdate() Group by the last_update column
 * @method MenuQuery groupByExpiredDate() Group by the expired_date column
 * @method MenuQuery groupByLastSync() Group by the last_sync column
 *
 * @method MenuQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MenuQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MenuQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MenuQuery leftJoinAplikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Aplikasi relation
 * @method MenuQuery rightJoinAplikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Aplikasi relation
 * @method MenuQuery innerJoinAplikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Aplikasi relation
 *
 * @method MenuQuery leftJoinMenuRelatedByMenIdMenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRelatedByMenIdMenu relation
 * @method MenuQuery rightJoinMenuRelatedByMenIdMenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRelatedByMenIdMenu relation
 * @method MenuQuery innerJoinMenuRelatedByMenIdMenu($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRelatedByMenIdMenu relation
 *
 * @method MenuQuery leftJoinMenuRelatedByIdMenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRelatedByIdMenu relation
 * @method MenuQuery rightJoinMenuRelatedByIdMenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRelatedByIdMenu relation
 * @method MenuQuery innerJoinMenuRelatedByIdMenu($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRelatedByIdMenu relation
 *
 * @method MenuQuery leftJoinMenuRole($relationAlias = null) Adds a LEFT JOIN clause to the query using the MenuRole relation
 * @method MenuQuery rightJoinMenuRole($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MenuRole relation
 * @method MenuQuery innerJoinMenuRole($relationAlias = null) Adds a INNER JOIN clause to the query using the MenuRole relation
 *
 * @method Menu findOne(PropelPDO $con = null) Return the first Menu matching the query
 * @method Menu findOneOrCreate(PropelPDO $con = null) Return the first Menu matching the query, or a new Menu object populated from the query conditions when no match is found
 *
 * @method Menu findOneByMenIdMenu(string $men_id_menu) Return the first Menu filtered by the men_id_menu column
 * @method Menu findOneByIdAplikasi(string $id_aplikasi) Return the first Menu filtered by the id_aplikasi column
 * @method Menu findOneByNmMenu(string $nm_menu) Return the first Menu filtered by the nm_menu column
 * @method Menu findOneByNmFile(string $nm_file) Return the first Menu filtered by the nm_file column
 * @method Menu findOneByLevelMenu(string $level_menu) Return the first Menu filtered by the level_menu column
 * @method Menu findOneByUrutanMenu(int $urutan_menu) Return the first Menu filtered by the urutan_menu column
 * @method Menu findOneByAAktif(string $a_aktif) Return the first Menu filtered by the a_aktif column
 * @method Menu findOneByATampil(string $a_tampil) Return the first Menu filtered by the a_tampil column
 * @method Menu findOneByIcon(string $icon) Return the first Menu filtered by the icon column
 * @method Menu findOneByCreateDate(string $create_date) Return the first Menu filtered by the create_date column
 * @method Menu findOneByLastUpdate(string $last_update) Return the first Menu filtered by the last_update column
 * @method Menu findOneByExpiredDate(string $expired_date) Return the first Menu filtered by the expired_date column
 * @method Menu findOneByLastSync(string $last_sync) Return the first Menu filtered by the last_sync column
 *
 * @method array findByIdMenu(string $id_menu) Return Menu objects filtered by the id_menu column
 * @method array findByMenIdMenu(string $men_id_menu) Return Menu objects filtered by the men_id_menu column
 * @method array findByIdAplikasi(string $id_aplikasi) Return Menu objects filtered by the id_aplikasi column
 * @method array findByNmMenu(string $nm_menu) Return Menu objects filtered by the nm_menu column
 * @method array findByNmFile(string $nm_file) Return Menu objects filtered by the nm_file column
 * @method array findByLevelMenu(string $level_menu) Return Menu objects filtered by the level_menu column
 * @method array findByUrutanMenu(int $urutan_menu) Return Menu objects filtered by the urutan_menu column
 * @method array findByAAktif(string $a_aktif) Return Menu objects filtered by the a_aktif column
 * @method array findByATampil(string $a_tampil) Return Menu objects filtered by the a_tampil column
 * @method array findByIcon(string $icon) Return Menu objects filtered by the icon column
 * @method array findByCreateDate(string $create_date) Return Menu objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Menu objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return Menu objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return Menu objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMenuQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMenuQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Menu', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MenuQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MenuQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MenuQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MenuQuery) {
            return $criteria;
        }
        $query = new MenuQuery();
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
     * @return   Menu|Menu[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MenuPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 Menu A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByIdMenu($key, $con = null)
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
     * @return                 Menu A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_menu", "men_id_menu", "id_aplikasi", "nm_menu", "nm_file", "level_menu", "urutan_menu", "a_aktif", "a_tampil", "icon", "create_date", "last_update", "expired_date", "last_sync" FROM "man_akses"."menu" WHERE "id_menu" = :p0';
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
            $obj = new Menu();
            $obj->hydrate($row);
            MenuPeer::addInstanceToPool($obj, (string) $key);
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
     * @return Menu|Menu[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|Menu[]|mixed the list of results, formatted by the current formatter
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(MenuPeer::ID_MENU, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(MenuPeer::ID_MENU, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the id_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByIdMenu('fooValue');   // WHERE id_menu = 'fooValue'
     * $query->filterByIdMenu('%fooValue%'); // WHERE id_menu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idMenu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByIdMenu($idMenu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idMenu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idMenu)) {
                $idMenu = str_replace('*', '%', $idMenu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::ID_MENU, $idMenu, $comparison);
    }

    /**
     * Filter the query on the men_id_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByMenIdMenu('fooValue');   // WHERE men_id_menu = 'fooValue'
     * $query->filterByMenIdMenu('%fooValue%'); // WHERE men_id_menu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $menIdMenu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByMenIdMenu($menIdMenu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($menIdMenu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $menIdMenu)) {
                $menIdMenu = str_replace('*', '%', $menIdMenu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::MEN_ID_MENU, $menIdMenu, $comparison);
    }

    /**
     * Filter the query on the id_aplikasi column
     *
     * Example usage:
     * <code>
     * $query->filterByIdAplikasi('fooValue');   // WHERE id_aplikasi = 'fooValue'
     * $query->filterByIdAplikasi('%fooValue%'); // WHERE id_aplikasi LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idAplikasi The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByIdAplikasi($idAplikasi = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idAplikasi)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idAplikasi)) {
                $idAplikasi = str_replace('*', '%', $idAplikasi);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::ID_APLIKASI, $idAplikasi, $comparison);
    }

    /**
     * Filter the query on the nm_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByNmMenu('fooValue');   // WHERE nm_menu = 'fooValue'
     * $query->filterByNmMenu('%fooValue%'); // WHERE nm_menu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmMenu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByNmMenu($nmMenu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmMenu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmMenu)) {
                $nmMenu = str_replace('*', '%', $nmMenu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::NM_MENU, $nmMenu, $comparison);
    }

    /**
     * Filter the query on the nm_file column
     *
     * Example usage:
     * <code>
     * $query->filterByNmFile('fooValue');   // WHERE nm_file = 'fooValue'
     * $query->filterByNmFile('%fooValue%'); // WHERE nm_file LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmFile The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByNmFile($nmFile = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmFile)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmFile)) {
                $nmFile = str_replace('*', '%', $nmFile);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::NM_FILE, $nmFile, $comparison);
    }

    /**
     * Filter the query on the level_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByLevelMenu(1234); // WHERE level_menu = 1234
     * $query->filterByLevelMenu(array(12, 34)); // WHERE level_menu IN (12, 34)
     * $query->filterByLevelMenu(array('min' => 12)); // WHERE level_menu >= 12
     * $query->filterByLevelMenu(array('max' => 12)); // WHERE level_menu <= 12
     * </code>
     *
     * @param     mixed $levelMenu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByLevelMenu($levelMenu = null, $comparison = null)
    {
        if (is_array($levelMenu)) {
            $useMinMax = false;
            if (isset($levelMenu['min'])) {
                $this->addUsingAlias(MenuPeer::LEVEL_MENU, $levelMenu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($levelMenu['max'])) {
                $this->addUsingAlias(MenuPeer::LEVEL_MENU, $levelMenu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::LEVEL_MENU, $levelMenu, $comparison);
    }

    /**
     * Filter the query on the urutan_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByUrutanMenu(1234); // WHERE urutan_menu = 1234
     * $query->filterByUrutanMenu(array(12, 34)); // WHERE urutan_menu IN (12, 34)
     * $query->filterByUrutanMenu(array('min' => 12)); // WHERE urutan_menu >= 12
     * $query->filterByUrutanMenu(array('max' => 12)); // WHERE urutan_menu <= 12
     * </code>
     *
     * @param     mixed $urutanMenu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByUrutanMenu($urutanMenu = null, $comparison = null)
    {
        if (is_array($urutanMenu)) {
            $useMinMax = false;
            if (isset($urutanMenu['min'])) {
                $this->addUsingAlias(MenuPeer::URUTAN_MENU, $urutanMenu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($urutanMenu['max'])) {
                $this->addUsingAlias(MenuPeer::URUTAN_MENU, $urutanMenu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::URUTAN_MENU, $urutanMenu, $comparison);
    }

    /**
     * Filter the query on the a_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByAAktif(1234); // WHERE a_aktif = 1234
     * $query->filterByAAktif(array(12, 34)); // WHERE a_aktif IN (12, 34)
     * $query->filterByAAktif(array('min' => 12)); // WHERE a_aktif >= 12
     * $query->filterByAAktif(array('max' => 12)); // WHERE a_aktif <= 12
     * </code>
     *
     * @param     mixed $aAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByAAktif($aAktif = null, $comparison = null)
    {
        if (is_array($aAktif)) {
            $useMinMax = false;
            if (isset($aAktif['min'])) {
                $this->addUsingAlias(MenuPeer::A_AKTIF, $aAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aAktif['max'])) {
                $this->addUsingAlias(MenuPeer::A_AKTIF, $aAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::A_AKTIF, $aAktif, $comparison);
    }

    /**
     * Filter the query on the a_tampil column
     *
     * Example usage:
     * <code>
     * $query->filterByATampil(1234); // WHERE a_tampil = 1234
     * $query->filterByATampil(array(12, 34)); // WHERE a_tampil IN (12, 34)
     * $query->filterByATampil(array('min' => 12)); // WHERE a_tampil >= 12
     * $query->filterByATampil(array('max' => 12)); // WHERE a_tampil <= 12
     * </code>
     *
     * @param     mixed $aTampil The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByATampil($aTampil = null, $comparison = null)
    {
        if (is_array($aTampil)) {
            $useMinMax = false;
            if (isset($aTampil['min'])) {
                $this->addUsingAlias(MenuPeer::A_TAMPIL, $aTampil['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTampil['max'])) {
                $this->addUsingAlias(MenuPeer::A_TAMPIL, $aTampil['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::A_TAMPIL, $aTampil, $comparison);
    }

    /**
     * Filter the query on the icon column
     *
     * Example usage:
     * <code>
     * $query->filterByIcon('fooValue');   // WHERE icon = 'fooValue'
     * $query->filterByIcon('%fooValue%'); // WHERE icon LIKE '%fooValue%'
     * </code>
     *
     * @param     string $icon The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByIcon($icon = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($icon)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $icon)) {
                $icon = str_replace('*', '%', $icon);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuPeer::ICON, $icon, $comparison);
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MenuPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MenuPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MenuPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MenuPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MenuPeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MenuPeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MenuQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MenuPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MenuPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Aplikasi object
     *
     * @param   Aplikasi|PropelObjectCollection $aplikasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAplikasi($aplikasi, $comparison = null)
    {
        if ($aplikasi instanceof Aplikasi) {
            return $this
                ->addUsingAlias(MenuPeer::ID_APLIKASI, $aplikasi->getIdAplikasi(), $comparison);
        } elseif ($aplikasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuPeer::ID_APLIKASI, $aplikasi->toKeyValue('PrimaryKey', 'IdAplikasi'), $comparison);
        } else {
            throw new PropelException('filterByAplikasi() only accepts arguments of type Aplikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Aplikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinAplikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Aplikasi');

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
            $this->addJoinObject($join, 'Aplikasi');
        }

        return $this;
    }

    /**
     * Use the Aplikasi relation Aplikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AplikasiQuery A secondary query class using the current class as primary query
     */
    public function useAplikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAplikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Aplikasi', '\DataDikdas\Model\AplikasiQuery');
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRelatedByMenIdMenu($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(MenuPeer::MEN_ID_MENU, $menu->getIdMenu(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuPeer::MEN_ID_MENU, $menu->toKeyValue('PrimaryKey', 'IdMenu'), $comparison);
        } else {
            throw new PropelException('filterByMenuRelatedByMenIdMenu() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRelatedByMenIdMenu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinMenuRelatedByMenIdMenu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRelatedByMenIdMenu');

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
            $this->addJoinObject($join, 'MenuRelatedByMenIdMenu');
        }

        return $this;
    }

    /**
     * Use the MenuRelatedByMenIdMenu relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuRelatedByMenIdMenuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMenuRelatedByMenIdMenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRelatedByMenIdMenu', '\DataDikdas\Model\MenuQuery');
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRelatedByIdMenu($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(MenuPeer::ID_MENU, $menu->getMenIdMenu(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            return $this
                ->useMenuRelatedByIdMenuQuery()
                ->filterByPrimaryKeys($menu->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMenuRelatedByIdMenu() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRelatedByIdMenu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinMenuRelatedByIdMenu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRelatedByIdMenu');

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
            $this->addJoinObject($join, 'MenuRelatedByIdMenu');
        }

        return $this;
    }

    /**
     * Use the MenuRelatedByIdMenu relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuRelatedByIdMenuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinMenuRelatedByIdMenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRelatedByIdMenu', '\DataDikdas\Model\MenuQuery');
    }

    /**
     * Filter the query by a related MenuRole object
     *
     * @param   MenuRole|PropelObjectCollection $menuRole  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenuRole($menuRole, $comparison = null)
    {
        if ($menuRole instanceof MenuRole) {
            return $this
                ->addUsingAlias(MenuPeer::ID_MENU, $menuRole->getIdMenu(), $comparison);
        } elseif ($menuRole instanceof PropelObjectCollection) {
            return $this
                ->useMenuRoleQuery()
                ->filterByPrimaryKeys($menuRole->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByMenuRole() only accepts arguments of type MenuRole or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MenuRole relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function joinMenuRole($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MenuRole');

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
            $this->addJoinObject($join, 'MenuRole');
        }

        return $this;
    }

    /**
     * Use the MenuRole relation MenuRole object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuRoleQuery A secondary query class using the current class as primary query
     */
    public function useMenuRoleQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMenuRole($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MenuRole', '\DataDikdas\Model\MenuRoleQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Menu $menu Object to remove from the list of results
     *
     * @return MenuQuery The current query, for fluid interface
     */
    public function prune($menu = null)
    {
        if ($menu) {
            $this->addUsingAlias(MenuPeer::ID_MENU, $menu->getIdMenu(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
