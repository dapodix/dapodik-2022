<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\TableSync;
use DataDikdas\Model\TableSyncLog;
use DataDikdas\Model\TableSyncLogQuery;
use DataDikdas\Model\TableSyncPeer;
use DataDikdas\Model\TableSyncQuery;

/**
 * Base class that represents a row from the 'ref.table_sync' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTableSync extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TableSyncPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TableSyncPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the table_name field.
     * @var        string
     */
    protected $table_name;

    /**
     * The value for the table_alias field.
     * @var        string
     */
    protected $table_alias;

    /**
     * The value for the sync_type field.
     * @var        string
     */
    protected $sync_type;

    /**
     * The value for the sync_seq field.
     * @var        string
     */
    protected $sync_seq;

    /**
     * The value for the kolom_kecuali field.
     * @var        string
     */
    protected $kolom_kecuali;

    /**
     * The value for the table_status field.
     * @var        int
     */
    protected $table_status;

    /**
     * The value for the table_ket field.
     * @var        string
     */
    protected $table_ket;

    /**
     * The value for the jml_thread field.
     * Note: this column has a database default value of: 5
     * @var        int
     */
    protected $jml_thread;

    /**
     * The value for the baris_per_thread field.
     * Note: this column has a database default value of: 500
     * @var        int
     */
    protected $baris_per_thread;

    /**
     * The value for the order_ekstra field.
     * @var        string
     */
    protected $order_ekstra;

    /**
     * The value for the a_table_aktif field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $a_table_aktif;

    /**
     * @var        PropelObjectCollection|TableSyncLog[] Collection to store aggregation of TableSyncLog objects.
     */
    protected $collTableSyncLogs;
    protected $collTableSyncLogsPartial;

    /**
     * Flag to prevent endless save loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInSave = false;

    /**
     * Flag to prevent endless validation loop, if this object is referenced
     * by another object which falls in this transaction.
     * @var        boolean
     */
    protected $alreadyInValidation = false;

    /**
     * Flag to prevent endless clearAllReferences($deep=true) loop, if this object is referenced
     * @var        boolean
     */
    protected $alreadyInClearAllReferencesDeep = false;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tableSyncLogsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->jml_thread = 5;
        $this->baris_per_thread = 500;
        $this->a_table_aktif = '1';
    }

    /**
     * Initializes internal state of BaseTableSync object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [table_name] column value.
     * 
     * @return string
     */
    public function getTableName()
    {
        return $this->table_name;
    }

    /**
     * Get the [table_alias] column value.
     * 
     * @return string
     */
    public function getTableAlias()
    {
        return $this->table_alias;
    }

    /**
     * Get the [sync_type] column value.
     * 
     * @return string
     */
    public function getSyncType()
    {
        return $this->sync_type;
    }

    /**
     * Get the [sync_seq] column value.
     * 
     * @return string
     */
    public function getSyncSeq()
    {
        return $this->sync_seq;
    }

    /**
     * Get the [kolom_kecuali] column value.
     * 
     * @return string
     */
    public function getKolomKecuali()
    {
        return $this->kolom_kecuali;
    }

    /**
     * Get the [table_status] column value.
     * 
     * @return int
     */
    public function getTableStatus()
    {
        return $this->table_status;
    }

    /**
     * Get the [table_ket] column value.
     * 
     * @return string
     */
    public function getTableKet()
    {
        return $this->table_ket;
    }

    /**
     * Get the [jml_thread] column value.
     * 
     * @return int
     */
    public function getJmlThread()
    {
        return $this->jml_thread;
    }

    /**
     * Get the [baris_per_thread] column value.
     * 
     * @return int
     */
    public function getBarisPerThread()
    {
        return $this->baris_per_thread;
    }

    /**
     * Get the [order_ekstra] column value.
     * 
     * @return string
     */
    public function getOrderEkstra()
    {
        return $this->order_ekstra;
    }

    /**
     * Get the [a_table_aktif] column value.
     * 
     * @return string
     */
    public function getATableAktif()
    {
        return $this->a_table_aktif;
    }

    /**
     * Set the value of [table_name] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setTableName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->table_name !== $v) {
            $this->table_name = $v;
            $this->modifiedColumns[] = TableSyncPeer::TABLE_NAME;
        }


        return $this;
    } // setTableName()

    /**
     * Set the value of [table_alias] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setTableAlias($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->table_alias !== $v) {
            $this->table_alias = $v;
            $this->modifiedColumns[] = TableSyncPeer::TABLE_ALIAS;
        }


        return $this;
    } // setTableAlias()

    /**
     * Set the value of [sync_type] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setSyncType($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sync_type !== $v) {
            $this->sync_type = $v;
            $this->modifiedColumns[] = TableSyncPeer::SYNC_TYPE;
        }


        return $this;
    } // setSyncType()

    /**
     * Set the value of [sync_seq] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setSyncSeq($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sync_seq !== $v) {
            $this->sync_seq = $v;
            $this->modifiedColumns[] = TableSyncPeer::SYNC_SEQ;
        }


        return $this;
    } // setSyncSeq()

    /**
     * Set the value of [kolom_kecuali] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setKolomKecuali($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kolom_kecuali !== $v) {
            $this->kolom_kecuali = $v;
            $this->modifiedColumns[] = TableSyncPeer::KOLOM_KECUALI;
        }


        return $this;
    } // setKolomKecuali()

    /**
     * Set the value of [table_status] column.
     * 
     * @param int $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setTableStatus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->table_status !== $v) {
            $this->table_status = $v;
            $this->modifiedColumns[] = TableSyncPeer::TABLE_STATUS;
        }


        return $this;
    } // setTableStatus()

    /**
     * Set the value of [table_ket] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setTableKet($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->table_ket !== $v) {
            $this->table_ket = $v;
            $this->modifiedColumns[] = TableSyncPeer::TABLE_KET;
        }


        return $this;
    } // setTableKet()

    /**
     * Set the value of [jml_thread] column.
     * 
     * @param int $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setJmlThread($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jml_thread !== $v) {
            $this->jml_thread = $v;
            $this->modifiedColumns[] = TableSyncPeer::JML_THREAD;
        }


        return $this;
    } // setJmlThread()

    /**
     * Set the value of [baris_per_thread] column.
     * 
     * @param int $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setBarisPerThread($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->baris_per_thread !== $v) {
            $this->baris_per_thread = $v;
            $this->modifiedColumns[] = TableSyncPeer::BARIS_PER_THREAD;
        }


        return $this;
    } // setBarisPerThread()

    /**
     * Set the value of [order_ekstra] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setOrderEkstra($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->order_ekstra !== $v) {
            $this->order_ekstra = $v;
            $this->modifiedColumns[] = TableSyncPeer::ORDER_EKSTRA;
        }


        return $this;
    } // setOrderEkstra()

    /**
     * Set the value of [a_table_aktif] column.
     * 
     * @param string $v new value
     * @return TableSync The current object (for fluent API support)
     */
    public function setATableAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_table_aktif !== $v) {
            $this->a_table_aktif = $v;
            $this->modifiedColumns[] = TableSyncPeer::A_TABLE_AKTIF;
        }


        return $this;
    } // setATableAktif()

    /**
     * Indicates whether the columns in this object are only set to default values.
     *
     * This method can be used in conjunction with isModified() to indicate whether an object is both
     * modified _and_ has some values set which are non-default.
     *
     * @return boolean Whether the columns in this object are only been set with default values.
     */
    public function hasOnlyDefaultValues()
    {
            if ($this->jml_thread !== 5) {
                return false;
            }

            if ($this->baris_per_thread !== 500) {
                return false;
            }

            if ($this->a_table_aktif !== '1') {
                return false;
            }

        // otherwise, everything was equal, so return true
        return true;
    } // hasOnlyDefaultValues()

    /**
     * Hydrates (populates) the object variables with values from the database resultset.
     *
     * An offset (0-based "start column") is specified so that objects can be hydrated
     * with a subset of the columns in the resultset rows.  This is needed, for example,
     * for results of JOIN queries where the resultset row includes columns from two or
     * more tables.
     *
     * @param array $row The row returned by PDOStatement->fetch(PDO::FETCH_NUM)
     * @param int $startcol 0-based offset column which indicates which restultset column to start with.
     * @param boolean $rehydrate Whether this object is being re-hydrated from the database.
     * @return int             next starting column
     * @throws PropelException - Any caught Exception will be rewrapped as a PropelException.
     */
    public function hydrate($row, $startcol = 0, $rehydrate = false)
    {
        try {

            $this->table_name = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->table_alias = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->sync_type = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sync_seq = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kolom_kecuali = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->table_status = ($row[$startcol + 5] !== null) ? (int) $row[$startcol + 5] : null;
            $this->table_ket = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->jml_thread = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->baris_per_thread = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->order_ekstra = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->a_table_aktif = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = TableSyncPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TableSync object", $e);
        }
    }

    /**
     * Checks and repairs the internal consistency of the object.
     *
     * This method is executed after an already-instantiated object is re-hydrated
     * from the database.  It exists to check any foreign keys to make sure that
     * the objects related to the current object are correct based on foreign key.
     *
     * You can override this method in the stub class, but you should always invoke
     * the base method from the overridden method (i.e. parent::ensureConsistency()),
     * in case your model changes.
     *
     * @throws PropelException
     */
    public function ensureConsistency()
    {

    } // ensureConsistency

    /**
     * Reloads this object from datastore based on primary key and (optionally) resets all associated objects.
     *
     * This will only work if the object has been saved and has a valid primary key set.
     *
     * @param boolean $deep (optional) Whether to also de-associated any related objects.
     * @param PropelPDO $con (optional) The PropelPDO connection to use.
     * @return void
     * @throws PropelException - if this object is deleted, unsaved or doesn't have pk match in db
     */
    public function reload($deep = false, PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("Cannot reload a deleted object.");
        }

        if ($this->isNew()) {
            throw new PropelException("Cannot reload an unsaved object.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TableSyncPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collTableSyncLogs = null;

        } // if (deep)
    }

    /**
     * Removes this object from datastore and sets delete attribute.
     *
     * @param PropelPDO $con
     * @return void
     * @throws PropelException
     * @throws Exception
     * @see        BaseObject::setDeleted()
     * @see        BaseObject::isDeleted()
     */
    public function delete(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("This object has already been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TableSyncQuery::create()
                ->filterByPrimaryKey($this->getPrimaryKey());
            $ret = $this->preDelete($con);
            if ($ret) {
                $deleteQuery->delete($con);
                $this->postDelete($con);
                $con->commit();
                $this->setDeleted(true);
            } else {
                $con->commit();
            }
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Persists this object to the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All modified related objects will also be persisted in the doSave()
     * method.  This method wraps all precipitate database operations in a
     * single transaction.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @throws Exception
     * @see        doSave()
     */
    public function save(PropelPDO $con = null)
    {
        if ($this->isDeleted()) {
            throw new PropelException("You cannot save an object that has been deleted.");
        }

        if ($con === null) {
            $con = Propel::getConnection(TableSyncPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        $isInsert = $this->isNew();
        try {
            $ret = $this->preSave($con);
            if ($isInsert) {
                $ret = $ret && $this->preInsert($con);
            } else {
                $ret = $ret && $this->preUpdate($con);
            }
            if ($ret) {
                $affectedRows = $this->doSave($con);
                if ($isInsert) {
                    $this->postInsert($con);
                } else {
                    $this->postUpdate($con);
                }
                $this->postSave($con);
                TableSyncPeer::addInstanceToPool($this);
            } else {
                $affectedRows = 0;
            }
            $con->commit();

            return $affectedRows;
        } catch (Exception $e) {
            $con->rollBack();
            throw $e;
        }
    }

    /**
     * Performs the work of inserting or updating the row in the database.
     *
     * If the object is new, it inserts it; otherwise an update is performed.
     * All related objects are also updated in this method.
     *
     * @param PropelPDO $con
     * @return int             The number of rows affected by this insert/update and any referring fk objects' save() operations.
     * @throws PropelException
     * @see        save()
     */
    protected function doSave(PropelPDO $con)
    {
        $affectedRows = 0; // initialize var to track total num of affected rows
        if (!$this->alreadyInSave) {
            $this->alreadyInSave = true;

            if ($this->isNew() || $this->isModified()) {
                // persist changes
                if ($this->isNew()) {
                    $this->doInsert($con);
                } else {
                    $this->doUpdate($con);
                }
                $affectedRows += 1;
                $this->resetModified();
            }

            if ($this->tableSyncLogsScheduledForDeletion !== null) {
                if (!$this->tableSyncLogsScheduledForDeletion->isEmpty()) {
                    TableSyncLogQuery::create()
                        ->filterByPrimaryKeys($this->tableSyncLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tableSyncLogsScheduledForDeletion = null;
                }
            }

            if ($this->collTableSyncLogs !== null) {
                foreach ($this->collTableSyncLogs as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            $this->alreadyInSave = false;

        }

        return $affectedRows;
    } // doSave()

    /**
     * Insert the row in the database.
     *
     * @param PropelPDO $con
     *
     * @throws PropelException
     * @see        doSave()
     */
    protected function doInsert(PropelPDO $con)
    {
        $modifiedColumns = array();
        $index = 0;


         // check the columns in natural order for more readable SQL queries
        if ($this->isColumnModified(TableSyncPeer::TABLE_NAME)) {
            $modifiedColumns[':p' . $index++]  = '"table_name"';
        }
        if ($this->isColumnModified(TableSyncPeer::TABLE_ALIAS)) {
            $modifiedColumns[':p' . $index++]  = '"table_alias"';
        }
        if ($this->isColumnModified(TableSyncPeer::SYNC_TYPE)) {
            $modifiedColumns[':p' . $index++]  = '"sync_type"';
        }
        if ($this->isColumnModified(TableSyncPeer::SYNC_SEQ)) {
            $modifiedColumns[':p' . $index++]  = '"sync_seq"';
        }
        if ($this->isColumnModified(TableSyncPeer::KOLOM_KECUALI)) {
            $modifiedColumns[':p' . $index++]  = '"kolom_kecuali"';
        }
        if ($this->isColumnModified(TableSyncPeer::TABLE_STATUS)) {
            $modifiedColumns[':p' . $index++]  = '"table_status"';
        }
        if ($this->isColumnModified(TableSyncPeer::TABLE_KET)) {
            $modifiedColumns[':p' . $index++]  = '"table_ket"';
        }
        if ($this->isColumnModified(TableSyncPeer::JML_THREAD)) {
            $modifiedColumns[':p' . $index++]  = '"jml_thread"';
        }
        if ($this->isColumnModified(TableSyncPeer::BARIS_PER_THREAD)) {
            $modifiedColumns[':p' . $index++]  = '"baris_per_thread"';
        }
        if ($this->isColumnModified(TableSyncPeer::ORDER_EKSTRA)) {
            $modifiedColumns[':p' . $index++]  = '"order_ekstra"';
        }
        if ($this->isColumnModified(TableSyncPeer::A_TABLE_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"a_table_aktif"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."table_sync" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"table_name"':						
                        $stmt->bindValue($identifier, $this->table_name, PDO::PARAM_STR);
                        break;
                    case '"table_alias"':						
                        $stmt->bindValue($identifier, $this->table_alias, PDO::PARAM_STR);
                        break;
                    case '"sync_type"':						
                        $stmt->bindValue($identifier, $this->sync_type, PDO::PARAM_STR);
                        break;
                    case '"sync_seq"':						
                        $stmt->bindValue($identifier, $this->sync_seq, PDO::PARAM_STR);
                        break;
                    case '"kolom_kecuali"':						
                        $stmt->bindValue($identifier, $this->kolom_kecuali, PDO::PARAM_STR);
                        break;
                    case '"table_status"':						
                        $stmt->bindValue($identifier, $this->table_status, PDO::PARAM_INT);
                        break;
                    case '"table_ket"':						
                        $stmt->bindValue($identifier, $this->table_ket, PDO::PARAM_STR);
                        break;
                    case '"jml_thread"':						
                        $stmt->bindValue($identifier, $this->jml_thread, PDO::PARAM_INT);
                        break;
                    case '"baris_per_thread"':						
                        $stmt->bindValue($identifier, $this->baris_per_thread, PDO::PARAM_INT);
                        break;
                    case '"order_ekstra"':						
                        $stmt->bindValue($identifier, $this->order_ekstra, PDO::PARAM_STR);
                        break;
                    case '"a_table_aktif"':						
                        $stmt->bindValue($identifier, $this->a_table_aktif, PDO::PARAM_STR);
                        break;
                }
            }
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute INSERT statement [%s]', $sql), $e);
        }

        $this->setNew(false);
    }

    /**
     * Update the row in the database.
     *
     * @param PropelPDO $con
     *
     * @see        doSave()
     */
    protected function doUpdate(PropelPDO $con)
    {
        $selectCriteria = $this->buildPkeyCriteria();
        $valuesCriteria = $this->buildCriteria();
        BasePeer::doUpdate($selectCriteria, $valuesCriteria, $con);
    }

    /**
     * Array of ValidationFailed objects.
     * @var        array ValidationFailed[]
     */
    protected $validationFailures = array();

    /**
     * Gets any ValidationFailed objects that resulted from last call to validate().
     *
     *
     * @return array ValidationFailed[]
     * @see        validate()
     */
    public function getValidationFailures()
    {
        return $this->validationFailures;
    }

    /**
     * Validates the objects modified field values and all objects related to this table.
     *
     * If $columns is either a column name or an array of column names
     * only those columns are validated.
     *
     * @param mixed $columns Column name or an array of column names.
     * @return boolean Whether all columns pass validation.
     * @see        doValidate()
     * @see        getValidationFailures()
     */
    public function validate($columns = null)
    {
        $res = $this->doValidate($columns);
        if ($res === true) {
            $this->validationFailures = array();

            return true;
        }

        $this->validationFailures = $res;

        return false;
    }

    /**
     * This function performs the validation work for complex object models.
     *
     * In addition to checking the current object, all related objects will
     * also be validated.  If all pass then <code>true</code> is returned; otherwise
     * an aggreagated array of ValidationFailed objects will be returned.
     *
     * @param array $columns Array of column names to validate.
     * @return mixed <code>true</code> if all validations pass; array of <code>ValidationFailed</code> objets otherwise.
     */
    protected function doValidate($columns = null)
    {
        if (!$this->alreadyInValidation) {
            $this->alreadyInValidation = true;
            $retval = null;

            $failureMap = array();


            if (($retval = TableSyncPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collTableSyncLogs !== null) {
                    foreach ($this->collTableSyncLogs as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }


            $this->alreadyInValidation = false;
        }

        return (!empty($failureMap) ? $failureMap : true);
    }

    /**
     * Retrieves a field from the object by name passed in as a string.
     *
     * @param string $name name
     * @param string $type The type of fieldname the $name is of:
     *               one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *               BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *               Defaults to BasePeer::TYPE_FIELDNAME
     * @return mixed Value of field.
     */
    public function getByName($name, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = TableSyncPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
        $field = $this->getByPosition($pos);

        return $field;
    }

    /**
     * Retrieves a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @return mixed Value of field at $pos
     */
    public function getByPosition($pos)
    {
        switch ($pos) {
            case 0:
                return $this->getTableName();
                break;
            case 1:
                return $this->getTableAlias();
                break;
            case 2:
                return $this->getSyncType();
                break;
            case 3:
                return $this->getSyncSeq();
                break;
            case 4:
                return $this->getKolomKecuali();
                break;
            case 5:
                return $this->getTableStatus();
                break;
            case 6:
                return $this->getTableKet();
                break;
            case 7:
                return $this->getJmlThread();
                break;
            case 8:
                return $this->getBarisPerThread();
                break;
            case 9:
                return $this->getOrderEkstra();
                break;
            case 10:
                return $this->getATableAktif();
                break;
            default:
                return null;
                break;
        } // switch()
    }

    /**
     * Exports the object as an array.
     *
     * You can specify the key type of the array by passing one of the class
     * type constants.
     *
     * @param     string  $keyType (optional) One of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     *                    BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                    Defaults to BasePeer::TYPE_FIELDNAME.
     * @param     boolean $includeLazyLoadColumns (optional) Whether to include lazy loaded columns. Defaults to true.
     * @param     array $alreadyDumpedObjects List of objects to skip to avoid recursion
     * @param     boolean $includeForeignObjects (optional) Whether to include hydrated related objects. Default to FALSE.
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array(), $includeForeignObjects = false)
    {
        if (isset($alreadyDumpedObjects['TableSync'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TableSync'][$this->getPrimaryKey()] = true;
        $keys = TableSyncPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTableName(),
            $keys[1] => $this->getTableAlias(),
            $keys[2] => $this->getSyncType(),
            $keys[3] => $this->getSyncSeq(),
            $keys[4] => $this->getKolomKecuali(),
            $keys[5] => $this->getTableStatus(),
            $keys[6] => $this->getTableKet(),
            $keys[7] => $this->getJmlThread(),
            $keys[8] => $this->getBarisPerThread(),
            $keys[9] => $this->getOrderEkstra(),
            $keys[10] => $this->getATableAktif(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collTableSyncLogs) {
                $result['TableSyncLogs'] = $this->collTableSyncLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
        }

        return $result;
    }

    /**
     * Sets a field from the object by name passed in as a string.
     *
     * @param string $name peer name
     * @param mixed $value field value
     * @param string $type The type of fieldname the $name is of:
     *                     one of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME
     *                     BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     *                     Defaults to BasePeer::TYPE_FIELDNAME
     * @return void
     */
    public function setByName($name, $value, $type = BasePeer::TYPE_FIELDNAME)
    {
        $pos = TableSyncPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

        $this->setByPosition($pos, $value);
    }

    /**
     * Sets a field from the object by Position as specified in the xml schema.
     * Zero-based.
     *
     * @param int $pos position in xml schema
     * @param mixed $value field value
     * @return void
     */
    public function setByPosition($pos, $value)
    {
        switch ($pos) {
            case 0:
                $this->setTableName($value);
                break;
            case 1:
                $this->setTableAlias($value);
                break;
            case 2:
                $this->setSyncType($value);
                break;
            case 3:
                $this->setSyncSeq($value);
                break;
            case 4:
                $this->setKolomKecuali($value);
                break;
            case 5:
                $this->setTableStatus($value);
                break;
            case 6:
                $this->setTableKet($value);
                break;
            case 7:
                $this->setJmlThread($value);
                break;
            case 8:
                $this->setBarisPerThread($value);
                break;
            case 9:
                $this->setOrderEkstra($value);
                break;
            case 10:
                $this->setATableAktif($value);
                break;
        } // switch()
    }

    /**
     * Populates the object using an array.
     *
     * This is particularly useful when populating an object from one of the
     * request arrays (e.g. $_POST).  This method goes through the column
     * names, checking to see whether a matching key exists in populated
     * array. If so the setByName() method is called for that column.
     *
     * You can specify the key type of the array by additionally passing one
     * of the class type constants BasePeer::TYPE_PHPNAME, BasePeer::TYPE_STUDLYPHPNAME,
     * BasePeer::TYPE_COLNAME, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_NUM.
     * The default key type is the column's BasePeer::TYPE_FIELDNAME
     *
     * @param array  $arr     An array to populate the object from.
     * @param string $keyType The type of keys the array uses.
     * @return void
     */
    public function fromArray($arr, $keyType = BasePeer::TYPE_FIELDNAME)
    {
        $keys = TableSyncPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTableName($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setTableAlias($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSyncType($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSyncSeq($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKolomKecuali($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTableStatus($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTableKet($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setJmlThread($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBarisPerThread($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setOrderEkstra($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setATableAktif($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(TableSyncPeer::DATABASE_NAME);

        if ($this->isColumnModified(TableSyncPeer::TABLE_NAME)) $criteria->add(TableSyncPeer::TABLE_NAME, $this->table_name);
        if ($this->isColumnModified(TableSyncPeer::TABLE_ALIAS)) $criteria->add(TableSyncPeer::TABLE_ALIAS, $this->table_alias);
        if ($this->isColumnModified(TableSyncPeer::SYNC_TYPE)) $criteria->add(TableSyncPeer::SYNC_TYPE, $this->sync_type);
        if ($this->isColumnModified(TableSyncPeer::SYNC_SEQ)) $criteria->add(TableSyncPeer::SYNC_SEQ, $this->sync_seq);
        if ($this->isColumnModified(TableSyncPeer::KOLOM_KECUALI)) $criteria->add(TableSyncPeer::KOLOM_KECUALI, $this->kolom_kecuali);
        if ($this->isColumnModified(TableSyncPeer::TABLE_STATUS)) $criteria->add(TableSyncPeer::TABLE_STATUS, $this->table_status);
        if ($this->isColumnModified(TableSyncPeer::TABLE_KET)) $criteria->add(TableSyncPeer::TABLE_KET, $this->table_ket);
        if ($this->isColumnModified(TableSyncPeer::JML_THREAD)) $criteria->add(TableSyncPeer::JML_THREAD, $this->jml_thread);
        if ($this->isColumnModified(TableSyncPeer::BARIS_PER_THREAD)) $criteria->add(TableSyncPeer::BARIS_PER_THREAD, $this->baris_per_thread);
        if ($this->isColumnModified(TableSyncPeer::ORDER_EKSTRA)) $criteria->add(TableSyncPeer::ORDER_EKSTRA, $this->order_ekstra);
        if ($this->isColumnModified(TableSyncPeer::A_TABLE_AKTIF)) $criteria->add(TableSyncPeer::A_TABLE_AKTIF, $this->a_table_aktif);

        return $criteria;
    }

    /**
     * Builds a Criteria object containing the primary key for this object.
     *
     * Unlike buildCriteria() this method includes the primary key values regardless
     * of whether or not they have been modified.
     *
     * @return Criteria The Criteria object containing value(s) for primary key(s).
     */
    public function buildPkeyCriteria()
    {
        $criteria = new Criteria(TableSyncPeer::DATABASE_NAME);
        $criteria->add(TableSyncPeer::TABLE_NAME, $this->table_name);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTableName();
    }

    /**
     * Generic method to set the primary key (table_name column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTableName($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTableName();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TableSync (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setTableAlias($this->getTableAlias());
        $copyObj->setSyncType($this->getSyncType());
        $copyObj->setSyncSeq($this->getSyncSeq());
        $copyObj->setKolomKecuali($this->getKolomKecuali());
        $copyObj->setTableStatus($this->getTableStatus());
        $copyObj->setTableKet($this->getTableKet());
        $copyObj->setJmlThread($this->getJmlThread());
        $copyObj->setBarisPerThread($this->getBarisPerThread());
        $copyObj->setOrderEkstra($this->getOrderEkstra());
        $copyObj->setATableAktif($this->getATableAktif());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getTableSyncLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTableSyncLog($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTableName(NULL); // this is a auto-increment column, so set to default value
        }
    }

    /**
     * Makes a copy of this object that will be inserted as a new row in table when saved.
     * It creates a new object filling in the simple attributes, but skipping any primary
     * keys that are defined for the table.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @return TableSync Clone of current object.
     * @throws PropelException
     */
    public function copy($deepCopy = false)
    {
        // we use get_class(), because this might be a subclass
        $clazz = get_class($this);
        $copyObj = new $clazz();
        $this->copyInto($copyObj, $deepCopy);

        return $copyObj;
    }

    /**
     * Returns a peer instance associated with this om.
     *
     * Since Peer classes are not to have any instance attributes, this method returns the
     * same instance for all member of this class. The method could therefore
     * be static, but this would prevent one from overriding the behavior.
     *
     * @return TableSyncPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TableSyncPeer();
        }

        return self::$peer;
    }


    /**
     * Initializes a collection based on the name of a relation.
     * Avoids crafting an 'init[$relationName]s' method name
     * that wouldn't work when StandardEnglishPluralizer is used.
     *
     * @param string $relationName The name of the relation to initialize
     * @return void
     */
    public function initRelation($relationName)
    {
        if ('TableSyncLog' == $relationName) {
            $this->initTableSyncLogs();
        }
    }

    /**
     * Clears out the collTableSyncLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TableSync The current object (for fluent API support)
     * @see        addTableSyncLogs()
     */
    public function clearTableSyncLogs()
    {
        $this->collTableSyncLogs = null; // important to set this to null since that means it is uninitialized
        $this->collTableSyncLogsPartial = null;

        return $this;
    }

    /**
     * reset is the collTableSyncLogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialTableSyncLogs($v = true)
    {
        $this->collTableSyncLogsPartial = $v;
    }

    /**
     * Initializes the collTableSyncLogs collection.
     *
     * By default this just sets the collTableSyncLogs collection to an empty array (like clearcollTableSyncLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTableSyncLogs($overrideExisting = true)
    {
        if (null !== $this->collTableSyncLogs && !$overrideExisting) {
            return;
        }
        $this->collTableSyncLogs = new PropelObjectCollection();
        $this->collTableSyncLogs->setModel('TableSyncLog');
    }

    /**
     * Gets an array of TableSyncLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TableSync is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TableSyncLog[] List of TableSyncLog objects
     * @throws PropelException
     */
    public function getTableSyncLogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTableSyncLogsPartial && !$this->isNew();
        if (null === $this->collTableSyncLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTableSyncLogs) {
                // return empty collection
                $this->initTableSyncLogs();
            } else {
                $collTableSyncLogs = TableSyncLogQuery::create(null, $criteria)
                    ->filterByTableSync($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTableSyncLogsPartial && count($collTableSyncLogs)) {
                      $this->initTableSyncLogs(false);

                      foreach($collTableSyncLogs as $obj) {
                        if (false == $this->collTableSyncLogs->contains($obj)) {
                          $this->collTableSyncLogs->append($obj);
                        }
                      }

                      $this->collTableSyncLogsPartial = true;
                    }

                    $collTableSyncLogs->getInternalIterator()->rewind();
                    return $collTableSyncLogs;
                }

                if($partial && $this->collTableSyncLogs) {
                    foreach($this->collTableSyncLogs as $obj) {
                        if($obj->isNew()) {
                            $collTableSyncLogs[] = $obj;
                        }
                    }
                }

                $this->collTableSyncLogs = $collTableSyncLogs;
                $this->collTableSyncLogsPartial = false;
            }
        }

        return $this->collTableSyncLogs;
    }

    /**
     * Sets a collection of TableSyncLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tableSyncLogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TableSync The current object (for fluent API support)
     */
    public function setTableSyncLogs(PropelCollection $tableSyncLogs, PropelPDO $con = null)
    {
        $tableSyncLogsToDelete = $this->getTableSyncLogs(new Criteria(), $con)->diff($tableSyncLogs);

        $this->tableSyncLogsScheduledForDeletion = unserialize(serialize($tableSyncLogsToDelete));

        foreach ($tableSyncLogsToDelete as $tableSyncLogRemoved) {
            $tableSyncLogRemoved->setTableSync(null);
        }

        $this->collTableSyncLogs = null;
        foreach ($tableSyncLogs as $tableSyncLog) {
            $this->addTableSyncLog($tableSyncLog);
        }

        $this->collTableSyncLogs = $tableSyncLogs;
        $this->collTableSyncLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TableSyncLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TableSyncLog objects.
     * @throws PropelException
     */
    public function countTableSyncLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTableSyncLogsPartial && !$this->isNew();
        if (null === $this->collTableSyncLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTableSyncLogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTableSyncLogs());
            }
            $query = TableSyncLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTableSync($this)
                ->count($con);
        }

        return count($this->collTableSyncLogs);
    }

    /**
     * Method called to associate a TableSyncLog object to this object
     * through the TableSyncLog foreign key attribute.
     *
     * @param    TableSyncLog $l TableSyncLog
     * @return TableSync The current object (for fluent API support)
     */
    public function addTableSyncLog(TableSyncLog $l)
    {
        if ($this->collTableSyncLogs === null) {
            $this->initTableSyncLogs();
            $this->collTableSyncLogsPartial = true;
        }
        if (!in_array($l, $this->collTableSyncLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTableSyncLog($l);
        }

        return $this;
    }

    /**
     * @param	TableSyncLog $tableSyncLog The tableSyncLog object to add.
     */
    protected function doAddTableSyncLog($tableSyncLog)
    {
        $this->collTableSyncLogs[]= $tableSyncLog;
        $tableSyncLog->setTableSync($this);
    }

    /**
     * @param	TableSyncLog $tableSyncLog The tableSyncLog object to remove.
     * @return TableSync The current object (for fluent API support)
     */
    public function removeTableSyncLog($tableSyncLog)
    {
        if ($this->getTableSyncLogs()->contains($tableSyncLog)) {
            $this->collTableSyncLogs->remove($this->collTableSyncLogs->search($tableSyncLog));
            if (null === $this->tableSyncLogsScheduledForDeletion) {
                $this->tableSyncLogsScheduledForDeletion = clone $this->collTableSyncLogs;
                $this->tableSyncLogsScheduledForDeletion->clear();
            }
            $this->tableSyncLogsScheduledForDeletion[]= clone $tableSyncLog;
            $tableSyncLog->setTableSync(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TableSync is new, it will return
     * an empty collection; or if this TableSync has previously
     * been saved, it will retrieve related TableSyncLogs from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TableSync.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TableSyncLog[] List of TableSyncLog objects
     */
    public function getTableSyncLogsJoinInstalasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TableSyncLogQuery::create(null, $criteria);
        $query->joinWith('Instalasi', $join_behavior);

        return $this->getTableSyncLogs($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->table_name = null;
        $this->table_alias = null;
        $this->sync_type = null;
        $this->sync_seq = null;
        $this->kolom_kecuali = null;
        $this->table_status = null;
        $this->table_ket = null;
        $this->jml_thread = null;
        $this->baris_per_thread = null;
        $this->order_ekstra = null;
        $this->a_table_aktif = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
        $this->applyDefaultValues();
        $this->resetModified();
        $this->setNew(true);
        $this->setDeleted(false);
    }

    /**
     * Resets all references to other model objects or collections of model objects.
     *
     * This method is a user-space workaround for PHP's inability to garbage collect
     * objects with circular references (even in PHP 5.3). This is currently necessary
     * when using Propel in certain daemon or large-volumne/high-memory operations.
     *
     * @param boolean $deep Whether to also clear the references on all referrer objects.
     */
    public function clearAllReferences($deep = false)
    {
        if ($deep && !$this->alreadyInClearAllReferencesDeep) {
            $this->alreadyInClearAllReferencesDeep = true;
            if ($this->collTableSyncLogs) {
                foreach ($this->collTableSyncLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collTableSyncLogs instanceof PropelCollection) {
            $this->collTableSyncLogs->clearIterator();
        }
        $this->collTableSyncLogs = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TableSyncPeer::DEFAULT_STRING_FORMAT);
    }

    /**
     * return true is the object is in saving state
     *
     * @return boolean
     */
    public function isAlreadyInSave()
    {
        return $this->alreadyInSave;
    }

}
