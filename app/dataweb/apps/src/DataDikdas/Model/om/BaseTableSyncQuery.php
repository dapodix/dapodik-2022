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
use DataDikdas\Model\TableSync;
use DataDikdas\Model\TableSyncLog;
use DataDikdas\Model\TableSyncPeer;
use DataDikdas\Model\TableSyncQuery;

/**
 * Base class that represents a query for the 'ref.table_sync' table.
 *
 * 
 *
 * @method TableSyncQuery orderByTableName($order = Criteria::ASC) Order by the table_name column
 * @method TableSyncQuery orderByTableAlias($order = Criteria::ASC) Order by the table_alias column
 * @method TableSyncQuery orderBySyncType($order = Criteria::ASC) Order by the sync_type column
 * @method TableSyncQuery orderBySyncSeq($order = Criteria::ASC) Order by the sync_seq column
 * @method TableSyncQuery orderByKolomKecuali($order = Criteria::ASC) Order by the kolom_kecuali column
 * @method TableSyncQuery orderByTableStatus($order = Criteria::ASC) Order by the table_status column
 * @method TableSyncQuery orderByTableKet($order = Criteria::ASC) Order by the table_ket column
 * @method TableSyncQuery orderByJmlThread($order = Criteria::ASC) Order by the jml_thread column
 * @method TableSyncQuery orderByBarisPerThread($order = Criteria::ASC) Order by the baris_per_thread column
 * @method TableSyncQuery orderByOrderEkstra($order = Criteria::ASC) Order by the order_ekstra column
 * @method TableSyncQuery orderByATableAktif($order = Criteria::ASC) Order by the a_table_aktif column
 *
 * @method TableSyncQuery groupByTableName() Group by the table_name column
 * @method TableSyncQuery groupByTableAlias() Group by the table_alias column
 * @method TableSyncQuery groupBySyncType() Group by the sync_type column
 * @method TableSyncQuery groupBySyncSeq() Group by the sync_seq column
 * @method TableSyncQuery groupByKolomKecuali() Group by the kolom_kecuali column
 * @method TableSyncQuery groupByTableStatus() Group by the table_status column
 * @method TableSyncQuery groupByTableKet() Group by the table_ket column
 * @method TableSyncQuery groupByJmlThread() Group by the jml_thread column
 * @method TableSyncQuery groupByBarisPerThread() Group by the baris_per_thread column
 * @method TableSyncQuery groupByOrderEkstra() Group by the order_ekstra column
 * @method TableSyncQuery groupByATableAktif() Group by the a_table_aktif column
 *
 * @method TableSyncQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method TableSyncQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method TableSyncQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method TableSyncQuery leftJoinTableSyncLog($relationAlias = null) Adds a LEFT JOIN clause to the query using the TableSyncLog relation
 * @method TableSyncQuery rightJoinTableSyncLog($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TableSyncLog relation
 * @method TableSyncQuery innerJoinTableSyncLog($relationAlias = null) Adds a INNER JOIN clause to the query using the TableSyncLog relation
 *
 * @method TableSync findOne(PropelPDO $con = null) Return the first TableSync matching the query
 * @method TableSync findOneOrCreate(PropelPDO $con = null) Return the first TableSync matching the query, or a new TableSync object populated from the query conditions when no match is found
 *
 * @method TableSync findOneByTableAlias(string $table_alias) Return the first TableSync filtered by the table_alias column
 * @method TableSync findOneBySyncType(string $sync_type) Return the first TableSync filtered by the sync_type column
 * @method TableSync findOneBySyncSeq(string $sync_seq) Return the first TableSync filtered by the sync_seq column
 * @method TableSync findOneByKolomKecuali(string $kolom_kecuali) Return the first TableSync filtered by the kolom_kecuali column
 * @method TableSync findOneByTableStatus(int $table_status) Return the first TableSync filtered by the table_status column
 * @method TableSync findOneByTableKet(string $table_ket) Return the first TableSync filtered by the table_ket column
 * @method TableSync findOneByJmlThread(int $jml_thread) Return the first TableSync filtered by the jml_thread column
 * @method TableSync findOneByBarisPerThread(int $baris_per_thread) Return the first TableSync filtered by the baris_per_thread column
 * @method TableSync findOneByOrderEkstra(string $order_ekstra) Return the first TableSync filtered by the order_ekstra column
 * @method TableSync findOneByATableAktif(string $a_table_aktif) Return the first TableSync filtered by the a_table_aktif column
 *
 * @method array findByTableName(string $table_name) Return TableSync objects filtered by the table_name column
 * @method array findByTableAlias(string $table_alias) Return TableSync objects filtered by the table_alias column
 * @method array findBySyncType(string $sync_type) Return TableSync objects filtered by the sync_type column
 * @method array findBySyncSeq(string $sync_seq) Return TableSync objects filtered by the sync_seq column
 * @method array findByKolomKecuali(string $kolom_kecuali) Return TableSync objects filtered by the kolom_kecuali column
 * @method array findByTableStatus(int $table_status) Return TableSync objects filtered by the table_status column
 * @method array findByTableKet(string $table_ket) Return TableSync objects filtered by the table_ket column
 * @method array findByJmlThread(int $jml_thread) Return TableSync objects filtered by the jml_thread column
 * @method array findByBarisPerThread(int $baris_per_thread) Return TableSync objects filtered by the baris_per_thread column
 * @method array findByOrderEkstra(string $order_ekstra) Return TableSync objects filtered by the order_ekstra column
 * @method array findByATableAktif(string $a_table_aktif) Return TableSync objects filtered by the a_table_aktif column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTableSyncQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BaseTableSyncQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\TableSync', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new TableSyncQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   TableSyncQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return TableSyncQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof TableSyncQuery) {
            return $criteria;
        }
        $query = new TableSyncQuery();
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
     * @return   TableSync|TableSync[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = TableSyncPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 TableSync A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByTableName($key, $con = null)
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
     * @return                 TableSync A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "table_name", "table_alias", "sync_type", "sync_seq", "kolom_kecuali", "table_status", "table_ket", "jml_thread", "baris_per_thread", "order_ekstra", "a_table_aktif" FROM "ref"."table_sync" WHERE "table_name" = :p0';
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
            $obj = new TableSync();
            $obj->hydrate($row);
            TableSyncPeer::addInstanceToPool($obj, (string) $key);
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
     * @return TableSync|TableSync[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|TableSync[]|mixed the list of results, formatted by the current formatter
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
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(TableSyncPeer::TABLE_NAME, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(TableSyncPeer::TABLE_NAME, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the table_name column
     *
     * Example usage:
     * <code>
     * $query->filterByTableName('fooValue');   // WHERE table_name = 'fooValue'
     * $query->filterByTableName('%fooValue%'); // WHERE table_name LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableName The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByTableName($tableName = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableName)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableName)) {
                $tableName = str_replace('*', '%', $tableName);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::TABLE_NAME, $tableName, $comparison);
    }

    /**
     * Filter the query on the table_alias column
     *
     * Example usage:
     * <code>
     * $query->filterByTableAlias('fooValue');   // WHERE table_alias = 'fooValue'
     * $query->filterByTableAlias('%fooValue%'); // WHERE table_alias LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableAlias The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByTableAlias($tableAlias = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableAlias)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableAlias)) {
                $tableAlias = str_replace('*', '%', $tableAlias);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::TABLE_ALIAS, $tableAlias, $comparison);
    }

    /**
     * Filter the query on the sync_type column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncType('fooValue');   // WHERE sync_type = 'fooValue'
     * $query->filterBySyncType('%fooValue%'); // WHERE sync_type LIKE '%fooValue%'
     * </code>
     *
     * @param     string $syncType The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterBySyncType($syncType = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($syncType)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $syncType)) {
                $syncType = str_replace('*', '%', $syncType);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::SYNC_TYPE, $syncType, $comparison);
    }

    /**
     * Filter the query on the sync_seq column
     *
     * Example usage:
     * <code>
     * $query->filterBySyncSeq(1234); // WHERE sync_seq = 1234
     * $query->filterBySyncSeq(array(12, 34)); // WHERE sync_seq IN (12, 34)
     * $query->filterBySyncSeq(array('min' => 12)); // WHERE sync_seq >= 12
     * $query->filterBySyncSeq(array('max' => 12)); // WHERE sync_seq <= 12
     * </code>
     *
     * @param     mixed $syncSeq The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterBySyncSeq($syncSeq = null, $comparison = null)
    {
        if (is_array($syncSeq)) {
            $useMinMax = false;
            if (isset($syncSeq['min'])) {
                $this->addUsingAlias(TableSyncPeer::SYNC_SEQ, $syncSeq['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($syncSeq['max'])) {
                $this->addUsingAlias(TableSyncPeer::SYNC_SEQ, $syncSeq['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::SYNC_SEQ, $syncSeq, $comparison);
    }

    /**
     * Filter the query on the kolom_kecuali column
     *
     * Example usage:
     * <code>
     * $query->filterByKolomKecuali('fooValue');   // WHERE kolom_kecuali = 'fooValue'
     * $query->filterByKolomKecuali('%fooValue%'); // WHERE kolom_kecuali LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kolomKecuali The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByKolomKecuali($kolomKecuali = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kolomKecuali)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kolomKecuali)) {
                $kolomKecuali = str_replace('*', '%', $kolomKecuali);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::KOLOM_KECUALI, $kolomKecuali, $comparison);
    }

    /**
     * Filter the query on the table_status column
     *
     * Example usage:
     * <code>
     * $query->filterByTableStatus(1234); // WHERE table_status = 1234
     * $query->filterByTableStatus(array(12, 34)); // WHERE table_status IN (12, 34)
     * $query->filterByTableStatus(array('min' => 12)); // WHERE table_status >= 12
     * $query->filterByTableStatus(array('max' => 12)); // WHERE table_status <= 12
     * </code>
     *
     * @param     mixed $tableStatus The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByTableStatus($tableStatus = null, $comparison = null)
    {
        if (is_array($tableStatus)) {
            $useMinMax = false;
            if (isset($tableStatus['min'])) {
                $this->addUsingAlias(TableSyncPeer::TABLE_STATUS, $tableStatus['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tableStatus['max'])) {
                $this->addUsingAlias(TableSyncPeer::TABLE_STATUS, $tableStatus['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::TABLE_STATUS, $tableStatus, $comparison);
    }

    /**
     * Filter the query on the table_ket column
     *
     * Example usage:
     * <code>
     * $query->filterByTableKet('fooValue');   // WHERE table_ket = 'fooValue'
     * $query->filterByTableKet('%fooValue%'); // WHERE table_ket LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tableKet The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByTableKet($tableKet = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tableKet)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tableKet)) {
                $tableKet = str_replace('*', '%', $tableKet);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::TABLE_KET, $tableKet, $comparison);
    }

    /**
     * Filter the query on the jml_thread column
     *
     * Example usage:
     * <code>
     * $query->filterByJmlThread(1234); // WHERE jml_thread = 1234
     * $query->filterByJmlThread(array(12, 34)); // WHERE jml_thread IN (12, 34)
     * $query->filterByJmlThread(array('min' => 12)); // WHERE jml_thread >= 12
     * $query->filterByJmlThread(array('max' => 12)); // WHERE jml_thread <= 12
     * </code>
     *
     * @param     mixed $jmlThread The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByJmlThread($jmlThread = null, $comparison = null)
    {
        if (is_array($jmlThread)) {
            $useMinMax = false;
            if (isset($jmlThread['min'])) {
                $this->addUsingAlias(TableSyncPeer::JML_THREAD, $jmlThread['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jmlThread['max'])) {
                $this->addUsingAlias(TableSyncPeer::JML_THREAD, $jmlThread['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::JML_THREAD, $jmlThread, $comparison);
    }

    /**
     * Filter the query on the baris_per_thread column
     *
     * Example usage:
     * <code>
     * $query->filterByBarisPerThread(1234); // WHERE baris_per_thread = 1234
     * $query->filterByBarisPerThread(array(12, 34)); // WHERE baris_per_thread IN (12, 34)
     * $query->filterByBarisPerThread(array('min' => 12)); // WHERE baris_per_thread >= 12
     * $query->filterByBarisPerThread(array('max' => 12)); // WHERE baris_per_thread <= 12
     * </code>
     *
     * @param     mixed $barisPerThread The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByBarisPerThread($barisPerThread = null, $comparison = null)
    {
        if (is_array($barisPerThread)) {
            $useMinMax = false;
            if (isset($barisPerThread['min'])) {
                $this->addUsingAlias(TableSyncPeer::BARIS_PER_THREAD, $barisPerThread['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($barisPerThread['max'])) {
                $this->addUsingAlias(TableSyncPeer::BARIS_PER_THREAD, $barisPerThread['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::BARIS_PER_THREAD, $barisPerThread, $comparison);
    }

    /**
     * Filter the query on the order_ekstra column
     *
     * Example usage:
     * <code>
     * $query->filterByOrderEkstra('fooValue');   // WHERE order_ekstra = 'fooValue'
     * $query->filterByOrderEkstra('%fooValue%'); // WHERE order_ekstra LIKE '%fooValue%'
     * </code>
     *
     * @param     string $orderEkstra The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByOrderEkstra($orderEkstra = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($orderEkstra)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $orderEkstra)) {
                $orderEkstra = str_replace('*', '%', $orderEkstra);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::ORDER_EKSTRA, $orderEkstra, $comparison);
    }

    /**
     * Filter the query on the a_table_aktif column
     *
     * Example usage:
     * <code>
     * $query->filterByATableAktif(1234); // WHERE a_table_aktif = 1234
     * $query->filterByATableAktif(array(12, 34)); // WHERE a_table_aktif IN (12, 34)
     * $query->filterByATableAktif(array('min' => 12)); // WHERE a_table_aktif >= 12
     * $query->filterByATableAktif(array('max' => 12)); // WHERE a_table_aktif <= 12
     * </code>
     *
     * @param     mixed $aTableAktif The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function filterByATableAktif($aTableAktif = null, $comparison = null)
    {
        if (is_array($aTableAktif)) {
            $useMinMax = false;
            if (isset($aTableAktif['min'])) {
                $this->addUsingAlias(TableSyncPeer::A_TABLE_AKTIF, $aTableAktif['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($aTableAktif['max'])) {
                $this->addUsingAlias(TableSyncPeer::A_TABLE_AKTIF, $aTableAktif['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(TableSyncPeer::A_TABLE_AKTIF, $aTableAktif, $comparison);
    }

    /**
     * Filter the query by a related TableSyncLog object
     *
     * @param   TableSyncLog|PropelObjectCollection $tableSyncLog  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 TableSyncQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTableSyncLog($tableSyncLog, $comparison = null)
    {
        if ($tableSyncLog instanceof TableSyncLog) {
            return $this
                ->addUsingAlias(TableSyncPeer::TABLE_NAME, $tableSyncLog->getTableName(), $comparison);
        } elseif ($tableSyncLog instanceof PropelObjectCollection) {
            return $this
                ->useTableSyncLogQuery()
                ->filterByPrimaryKeys($tableSyncLog->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTableSyncLog() only accepts arguments of type TableSyncLog or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TableSyncLog relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function joinTableSyncLog($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TableSyncLog');

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
            $this->addJoinObject($join, 'TableSyncLog');
        }

        return $this;
    }

    /**
     * Use the TableSyncLog relation TableSyncLog object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TableSyncLogQuery A secondary query class using the current class as primary query
     */
    public function useTableSyncLogQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTableSyncLog($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TableSyncLog', '\DataDikdas\Model\TableSyncLogQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   TableSync $tableSync Object to remove from the list of results
     *
     * @return TableSyncQuery The current query, for fluid interface
     */
    public function prune($tableSync = null)
    {
        if ($tableSync) {
            $this->addUsingAlias(TableSyncPeer::TABLE_NAME, $tableSync->getTableName(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
