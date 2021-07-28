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
use DataDikdas\Model\Menu;
use DataDikdas\Model\MenuRole;
use DataDikdas\Model\MenuRolePeer;
use DataDikdas\Model\MenuRoleQuery;
use DataDikdas\Model\Peran;

/**
 * Base class that represents a query for the 'man_akses.menu_role' table.
 *
 * 
 *
 * @method MenuRoleQuery orderByIdMenu($order = Criteria::ASC) Order by the id_menu column
 * @method MenuRoleQuery orderByPeranId($order = Criteria::ASC) Order by the peran_id column
 * @method MenuRoleQuery orderByAksesMenu($order = Criteria::ASC) Order by the akses_menu column
 * @method MenuRoleQuery orderByABolehInsert($order = Criteria::ASC) Order by the a_boleh_insert column
 * @method MenuRoleQuery orderByABolehDelete($order = Criteria::ASC) Order by the a_boleh_delete column
 * @method MenuRoleQuery orderByABolehUpdate($order = Criteria::ASC) Order by the a_boleh_update column
 * @method MenuRoleQuery orderByABolehSanggah($order = Criteria::ASC) Order by the a_boleh_sanggah column
 * @method MenuRoleQuery orderByApprovalMenu($order = Criteria::ASC) Order by the approval_menu column
 * @method MenuRoleQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method MenuRoleQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method MenuRoleQuery orderByExpiredDate($order = Criteria::ASC) Order by the expired_date column
 * @method MenuRoleQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 *
 * @method MenuRoleQuery groupByIdMenu() Group by the id_menu column
 * @method MenuRoleQuery groupByPeranId() Group by the peran_id column
 * @method MenuRoleQuery groupByAksesMenu() Group by the akses_menu column
 * @method MenuRoleQuery groupByABolehInsert() Group by the a_boleh_insert column
 * @method MenuRoleQuery groupByABolehDelete() Group by the a_boleh_delete column
 * @method MenuRoleQuery groupByABolehUpdate() Group by the a_boleh_update column
 * @method MenuRoleQuery groupByABolehSanggah() Group by the a_boleh_sanggah column
 * @method MenuRoleQuery groupByApprovalMenu() Group by the approval_menu column
 * @method MenuRoleQuery groupByCreateDate() Group by the create_date column
 * @method MenuRoleQuery groupByLastUpdate() Group by the last_update column
 * @method MenuRoleQuery groupByExpiredDate() Group by the expired_date column
 * @method MenuRoleQuery groupByLastSync() Group by the last_sync column
 *
 * @method MenuRoleQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method MenuRoleQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method MenuRoleQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method MenuRoleQuery leftJoinMenu($relationAlias = null) Adds a LEFT JOIN clause to the query using the Menu relation
 * @method MenuRoleQuery rightJoinMenu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Menu relation
 * @method MenuRoleQuery innerJoinMenu($relationAlias = null) Adds a INNER JOIN clause to the query using the Menu relation
 *
 * @method MenuRoleQuery leftJoinPeran($relationAlias = null) Adds a LEFT JOIN clause to the query using the Peran relation
 * @method MenuRoleQuery rightJoinPeran($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Peran relation
 * @method MenuRoleQuery innerJoinPeran($relationAlias = null) Adds a INNER JOIN clause to the query using the Peran relation
 *
 * @method MenuRole findOne(PropelPDO $con = null) Return the first MenuRole matching the query
 * @method MenuRole findOneOrCreate(PropelPDO $con = null) Return the first MenuRole matching the query, or a new MenuRole object populated from the query conditions when no match is found
 *
 * @method MenuRole findOneByIdMenu(string $id_menu) Return the first MenuRole filtered by the id_menu column
 * @method MenuRole findOneByPeranId(int $peran_id) Return the first MenuRole filtered by the peran_id column
 * @method MenuRole findOneByAksesMenu(string $akses_menu) Return the first MenuRole filtered by the akses_menu column
 * @method MenuRole findOneByABolehInsert(string $a_boleh_insert) Return the first MenuRole filtered by the a_boleh_insert column
 * @method MenuRole findOneByABolehDelete(string $a_boleh_delete) Return the first MenuRole filtered by the a_boleh_delete column
 * @method MenuRole findOneByABolehUpdate(string $a_boleh_update) Return the first MenuRole filtered by the a_boleh_update column
 * @method MenuRole findOneByABolehSanggah(string $a_boleh_sanggah) Return the first MenuRole filtered by the a_boleh_sanggah column
 * @method MenuRole findOneByApprovalMenu(string $approval_menu) Return the first MenuRole filtered by the approval_menu column
 * @method MenuRole findOneByCreateDate(string $create_date) Return the first MenuRole filtered by the create_date column
 * @method MenuRole findOneByLastUpdate(string $last_update) Return the first MenuRole filtered by the last_update column
 * @method MenuRole findOneByExpiredDate(string $expired_date) Return the first MenuRole filtered by the expired_date column
 * @method MenuRole findOneByLastSync(string $last_sync) Return the first MenuRole filtered by the last_sync column
 *
 * @method array findByIdMenu(string $id_menu) Return MenuRole objects filtered by the id_menu column
 * @method array findByPeranId(int $peran_id) Return MenuRole objects filtered by the peran_id column
 * @method array findByAksesMenu(string $akses_menu) Return MenuRole objects filtered by the akses_menu column
 * @method array findByABolehInsert(string $a_boleh_insert) Return MenuRole objects filtered by the a_boleh_insert column
 * @method array findByABolehDelete(string $a_boleh_delete) Return MenuRole objects filtered by the a_boleh_delete column
 * @method array findByABolehUpdate(string $a_boleh_update) Return MenuRole objects filtered by the a_boleh_update column
 * @method array findByABolehSanggah(string $a_boleh_sanggah) Return MenuRole objects filtered by the a_boleh_sanggah column
 * @method array findByApprovalMenu(string $approval_menu) Return MenuRole objects filtered by the approval_menu column
 * @method array findByCreateDate(string $create_date) Return MenuRole objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return MenuRole objects filtered by the last_update column
 * @method array findByExpiredDate(string $expired_date) Return MenuRole objects filtered by the expired_date column
 * @method array findByLastSync(string $last_sync) Return MenuRole objects filtered by the last_sync column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMenuRoleQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseMenuRoleQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\MenuRole', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new MenuRoleQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   MenuRoleQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return MenuRoleQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof MenuRoleQuery) {
            return $criteria;
        }
        $query = new MenuRoleQuery();
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
                         A Primary key composition: [$id_menu, $peran_id]
     * @param     PropelPDO $con an optional connection object
     *
     * @return   MenuRole|MenuRole[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = MenuRolePeer::getInstanceFromPool(serialize(array((string) $key[0], (string) $key[1]))))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(MenuRolePeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 MenuRole A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "id_menu", "peran_id", "akses_menu", "a_boleh_insert", "a_boleh_delete", "a_boleh_update", "a_boleh_sanggah", "approval_menu", "create_date", "last_update", "expired_date", "last_sync" FROM "man_akses"."menu_role" WHERE "id_menu" = :p0 AND "peran_id" = :p1';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key[0], PDO::PARAM_STR);			
            $stmt->bindValue(':p1', $key[1], PDO::PARAM_INT);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new MenuRole();
            $obj->hydrate($row);
            MenuRolePeer::addInstanceToPool($obj, serialize(array((string) $key[0], (string) $key[1])));
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
     * @return MenuRole|MenuRole[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|MenuRole[]|mixed the list of results, formatted by the current formatter
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
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {
        $this->addUsingAlias(MenuRolePeer::ID_MENU, $key[0], Criteria::EQUAL);
        $this->addUsingAlias(MenuRolePeer::PERAN_ID, $key[1], Criteria::EQUAL);

        return $this;
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {
        if (empty($keys)) {
            return $this->add(null, '1<>1', Criteria::CUSTOM);
        }
        foreach ($keys as $key) {
            $cton0 = $this->getNewCriterion(MenuRolePeer::ID_MENU, $key[0], Criteria::EQUAL);
            $cton1 = $this->getNewCriterion(MenuRolePeer::PERAN_ID, $key[1], Criteria::EQUAL);
            $cton0->addAnd($cton1);
            $this->addOr($cton0);
        }

        return $this;
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
     * @return MenuRoleQuery The current query, for fluid interface
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

        return $this->addUsingAlias(MenuRolePeer::ID_MENU, $idMenu, $comparison);
    }

    /**
     * Filter the query on the peran_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPeranId(1234); // WHERE peran_id = 1234
     * $query->filterByPeranId(array(12, 34)); // WHERE peran_id IN (12, 34)
     * $query->filterByPeranId(array('min' => 12)); // WHERE peran_id >= 12
     * $query->filterByPeranId(array('max' => 12)); // WHERE peran_id <= 12
     * </code>
     *
     * @see       filterByPeran()
     *
     * @param     mixed $peranId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByPeranId($peranId = null, $comparison = null)
    {
        if (is_array($peranId)) {
            $useMinMax = false;
            if (isset($peranId['min'])) {
                $this->addUsingAlias(MenuRolePeer::PERAN_ID, $peranId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($peranId['max'])) {
                $this->addUsingAlias(MenuRolePeer::PERAN_ID, $peranId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::PERAN_ID, $peranId, $comparison);
    }

    /**
     * Filter the query on the akses_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByAksesMenu('fooValue');   // WHERE akses_menu = 'fooValue'
     * $query->filterByAksesMenu('%fooValue%'); // WHERE akses_menu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $aksesMenu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByAksesMenu($aksesMenu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($aksesMenu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $aksesMenu)) {
                $aksesMenu = str_replace('*', '%', $aksesMenu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::AKSES_MENU, $aksesMenu, $comparison);
    }

    /**
     * Filter the query on the a_boleh_insert column
     *
     * Example usage:
     * <code>
     * $query->filterByABolehInsert(1234); // WHERE a_boleh_insert = 1234
     * $query->filterByABolehInsert(array(12, 34)); // WHERE a_boleh_insert IN (12, 34)
     * $query->filterByABolehInsert(array('min' => 12)); // WHERE a_boleh_insert >= 12
     * $query->filterByABolehInsert(array('max' => 12)); // WHERE a_boleh_insert <= 12
     * </code>
     *
     * @param     mixed $aBolehInsert The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByABolehInsert($aBolehInsert = null, $comparison = null)
    {
        if (is_array($aBolehInsert)) {
            $useMinMax = false;
            if (isset($aBolehInsert['min'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_INSERT, $aBolehInsert['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBolehInsert['max'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_INSERT, $aBolehInsert['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::A_BOLEH_INSERT, $aBolehInsert, $comparison);
    }

    /**
     * Filter the query on the a_boleh_delete column
     *
     * Example usage:
     * <code>
     * $query->filterByABolehDelete(1234); // WHERE a_boleh_delete = 1234
     * $query->filterByABolehDelete(array(12, 34)); // WHERE a_boleh_delete IN (12, 34)
     * $query->filterByABolehDelete(array('min' => 12)); // WHERE a_boleh_delete >= 12
     * $query->filterByABolehDelete(array('max' => 12)); // WHERE a_boleh_delete <= 12
     * </code>
     *
     * @param     mixed $aBolehDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByABolehDelete($aBolehDelete = null, $comparison = null)
    {
        if (is_array($aBolehDelete)) {
            $useMinMax = false;
            if (isset($aBolehDelete['min'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_DELETE, $aBolehDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBolehDelete['max'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_DELETE, $aBolehDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::A_BOLEH_DELETE, $aBolehDelete, $comparison);
    }

    /**
     * Filter the query on the a_boleh_update column
     *
     * Example usage:
     * <code>
     * $query->filterByABolehUpdate(1234); // WHERE a_boleh_update = 1234
     * $query->filterByABolehUpdate(array(12, 34)); // WHERE a_boleh_update IN (12, 34)
     * $query->filterByABolehUpdate(array('min' => 12)); // WHERE a_boleh_update >= 12
     * $query->filterByABolehUpdate(array('max' => 12)); // WHERE a_boleh_update <= 12
     * </code>
     *
     * @param     mixed $aBolehUpdate The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByABolehUpdate($aBolehUpdate = null, $comparison = null)
    {
        if (is_array($aBolehUpdate)) {
            $useMinMax = false;
            if (isset($aBolehUpdate['min'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_UPDATE, $aBolehUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBolehUpdate['max'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_UPDATE, $aBolehUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::A_BOLEH_UPDATE, $aBolehUpdate, $comparison);
    }

    /**
     * Filter the query on the a_boleh_sanggah column
     *
     * Example usage:
     * <code>
     * $query->filterByABolehSanggah(1234); // WHERE a_boleh_sanggah = 1234
     * $query->filterByABolehSanggah(array(12, 34)); // WHERE a_boleh_sanggah IN (12, 34)
     * $query->filterByABolehSanggah(array('min' => 12)); // WHERE a_boleh_sanggah >= 12
     * $query->filterByABolehSanggah(array('max' => 12)); // WHERE a_boleh_sanggah <= 12
     * </code>
     *
     * @param     mixed $aBolehSanggah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByABolehSanggah($aBolehSanggah = null, $comparison = null)
    {
        if (is_array($aBolehSanggah)) {
            $useMinMax = false;
            if (isset($aBolehSanggah['min'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_SANGGAH, $aBolehSanggah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aBolehSanggah['max'])) {
                $this->addUsingAlias(MenuRolePeer::A_BOLEH_SANGGAH, $aBolehSanggah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::A_BOLEH_SANGGAH, $aBolehSanggah, $comparison);
    }

    /**
     * Filter the query on the approval_menu column
     *
     * Example usage:
     * <code>
     * $query->filterByApprovalMenu(1234); // WHERE approval_menu = 1234
     * $query->filterByApprovalMenu(array(12, 34)); // WHERE approval_menu IN (12, 34)
     * $query->filterByApprovalMenu(array('min' => 12)); // WHERE approval_menu >= 12
     * $query->filterByApprovalMenu(array('max' => 12)); // WHERE approval_menu <= 12
     * </code>
     *
     * @param     mixed $approvalMenu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByApprovalMenu($approvalMenu = null, $comparison = null)
    {
        if (is_array($approvalMenu)) {
            $useMinMax = false;
            if (isset($approvalMenu['min'])) {
                $this->addUsingAlias(MenuRolePeer::APPROVAL_MENU, $approvalMenu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($approvalMenu['max'])) {
                $this->addUsingAlias(MenuRolePeer::APPROVAL_MENU, $approvalMenu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::APPROVAL_MENU, $approvalMenu, $comparison);
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
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(MenuRolePeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(MenuRolePeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::CREATE_DATE, $createDate, $comparison);
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
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(MenuRolePeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(MenuRolePeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByExpiredDate($expiredDate = null, $comparison = null)
    {
        if (is_array($expiredDate)) {
            $useMinMax = false;
            if (isset($expiredDate['min'])) {
                $this->addUsingAlias(MenuRolePeer::EXPIRED_DATE, $expiredDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($expiredDate['max'])) {
                $this->addUsingAlias(MenuRolePeer::EXPIRED_DATE, $expiredDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::EXPIRED_DATE, $expiredDate, $comparison);
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
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(MenuRolePeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(MenuRolePeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(MenuRolePeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query by a related Menu object
     *
     * @param   Menu|PropelObjectCollection $menu The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMenu($menu, $comparison = null)
    {
        if ($menu instanceof Menu) {
            return $this
                ->addUsingAlias(MenuRolePeer::ID_MENU, $menu->getIdMenu(), $comparison);
        } elseif ($menu instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuRolePeer::ID_MENU, $menu->toKeyValue('PrimaryKey', 'IdMenu'), $comparison);
        } else {
            throw new PropelException('filterByMenu() only accepts arguments of type Menu or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Menu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function joinMenu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Menu');

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
            $this->addJoinObject($join, 'Menu');
        }

        return $this;
    }

    /**
     * Use the Menu relation Menu object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MenuQuery A secondary query class using the current class as primary query
     */
    public function useMenuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMenu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Menu', '\DataDikdas\Model\MenuQuery');
    }

    /**
     * Filter the query by a related Peran object
     *
     * @param   Peran|PropelObjectCollection $peran The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 MenuRoleQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPeran($peran, $comparison = null)
    {
        if ($peran instanceof Peran) {
            return $this
                ->addUsingAlias(MenuRolePeer::PERAN_ID, $peran->getPeranId(), $comparison);
        } elseif ($peran instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(MenuRolePeer::PERAN_ID, $peran->toKeyValue('PrimaryKey', 'PeranId'), $comparison);
        } else {
            throw new PropelException('filterByPeran() only accepts arguments of type Peran or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Peran relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function joinPeran($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Peran');

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
            $this->addJoinObject($join, 'Peran');
        }

        return $this;
    }

    /**
     * Use the Peran relation Peran object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PeranQuery A secondary query class using the current class as primary query
     */
    public function usePeranQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPeran($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Peran', '\DataDikdas\Model\PeranQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   MenuRole $menuRole Object to remove from the list of results
     *
     * @return MenuRoleQuery The current query, for fluid interface
     */
    public function prune($menuRole = null)
    {
        if ($menuRole) {
            $this->addCond('pruneCond0', $this->getAliasedColName(MenuRolePeer::ID_MENU), $menuRole->getIdMenu(), Criteria::NOT_EQUAL);
            $this->addCond('pruneCond1', $this->getAliasedColName(MenuRolePeer::PERAN_ID), $menuRole->getPeranId(), Criteria::NOT_EQUAL);
            $this->combine(array('pruneCond0', 'pruneCond1'), Criteria::LOGICAL_OR);
        }

        return $this;
    }

}
