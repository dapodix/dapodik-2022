<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \DateTime;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelDateTime;
use \PropelException;
use \PropelPDO;
use DataDikdas\Model\BitterTable;
use DataDikdas\Model\BitterTablePeer;
use DataDikdas\Model\BitterTableQuery;

/**
 * Base class that represents a row from the 'bitter_table' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBitterTable extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BitterTablePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BitterTablePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the bitter_table_id field.
     * @var        string
     */
    protected $bitter_table_id;

    /**
     * The value for the param_1 field.
     * @var        string
     */
    protected $param_1;

    /**
     * The value for the param_2 field.
     * @var        int
     */
    protected $param_2;

    /**
     * The value for the param_3 field.
     * @var        string
     */
    protected $param_3;

    /**
     * The value for the param_4 field.
     * @var        string
     */
    protected $param_4;

    /**
     * The value for the create_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $create_date;

    /**
     * The value for the last_update field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $last_update;

    /**
     * The value for the count_update field.
     * Note: this column has a database default value of: 1
     * @var        int
     */
    protected $count_update;

    /**
     * The value for the param_5 field.
     * @var        string
     */
    protected $param_5;

    /**
     * The value for the param_6 field.
     * @var        string
     */
    protected $param_6;

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
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->count_update = 1;
    }

    /**
     * Initializes internal state of BaseBitterTable object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [bitter_table_id] column value.
     * 
     * @return string
     */
    public function getBitterTableId()
    {
        return $this->bitter_table_id;
    }

    /**
     * Get the [param_1] column value.
     * 
     * @return string
     */
    public function getParam1()
    {
        return $this->param_1;
    }

    /**
     * Get the [param_2] column value.
     * 
     * @return int
     */
    public function getParam2()
    {
        return $this->param_2;
    }

    /**
     * Get the [param_3] column value.
     * 
     * @return string
     */
    public function getParam3()
    {
        return $this->param_3;
    }

    /**
     * Get the [param_4] column value.
     * 
     * @return string
     */
    public function getParam4()
    {
        return $this->param_4;
    }

    /**
     * Get the [optionally formatted] temporal [create_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getCreateDate($format = 'Y-m-d H:i:s')
    {
        if ($this->create_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->create_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->create_date, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [optionally formatted] temporal [last_update] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastUpdate($format = 'Y-m-d H:i:s')
    {
        if ($this->last_update === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_update);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_update, true), $x);
        }

        if ($format === null) {
            // Because propel.useDateTimeClass is true, we return a DateTime object.
            return $dt;
        }

        if (strpos($format, '%') !== false) {
            return strftime($format, $dt->format('U'));
        }

        return $dt->format($format);
        
    }

    /**
     * Get the [count_update] column value.
     * 
     * @return int
     */
    public function getCountUpdate()
    {
        return $this->count_update;
    }

    /**
     * Get the [param_5] column value.
     * 
     * @return string
     */
    public function getParam5()
    {
        return $this->param_5;
    }

    /**
     * Get the [param_6] column value.
     * 
     * @return string
     */
    public function getParam6()
    {
        return $this->param_6;
    }

    /**
     * Set the value of [bitter_table_id] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setBitterTableId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->bitter_table_id !== $v) {
            $this->bitter_table_id = $v;
            $this->modifiedColumns[] = BitterTablePeer::BITTER_TABLE_ID;
        }


        return $this;
    } // setBitterTableId()

    /**
     * Set the value of [param_1] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->param_1 !== $v) {
            $this->param_1 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_1;
        }


        return $this;
    } // setParam1()

    /**
     * Set the value of [param_2] column.
     * 
     * @param int $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->param_2 !== $v) {
            $this->param_2 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_2;
        }


        return $this;
    } // setParam2()

    /**
     * Set the value of [param_3] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->param_3 !== $v) {
            $this->param_3 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_3;
        }


        return $this;
    } // setParam3()

    /**
     * Set the value of [param_4] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam4($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->param_4 !== $v) {
            $this->param_4 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_4;
        }


        return $this;
    } // setParam4()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BitterTable The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BitterTablePeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BitterTable The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BitterTablePeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [count_update] column.
     * 
     * @param int $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setCountUpdate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->count_update !== $v) {
            $this->count_update = $v;
            $this->modifiedColumns[] = BitterTablePeer::COUNT_UPDATE;
        }


        return $this;
    } // setCountUpdate()

    /**
     * Set the value of [param_5] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam5($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->param_5 !== $v) {
            $this->param_5 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_5;
        }


        return $this;
    } // setParam5()

    /**
     * Set the value of [param_6] column.
     * 
     * @param string $v new value
     * @return BitterTable The current object (for fluent API support)
     */
    public function setParam6($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->param_6 !== $v) {
            $this->param_6 = $v;
            $this->modifiedColumns[] = BitterTablePeer::PARAM_6;
        }


        return $this;
    } // setParam6()

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
            if ($this->count_update !== 1) {
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

            $this->bitter_table_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->param_1 = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->param_2 = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->param_3 = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->param_4 = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->create_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_update = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->count_update = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->param_5 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->param_6 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = BitterTablePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BitterTable object", $e);
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
            $con = Propel::getConnection(BitterTablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BitterTablePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(BitterTablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BitterTableQuery::create()
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
            $con = Propel::getConnection(BitterTablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BitterTablePeer::addInstanceToPool($this);
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
        if ($this->isColumnModified(BitterTablePeer::BITTER_TABLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '"bitter_table_id"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_1)) {
            $modifiedColumns[':p' . $index++]  = '"param_1"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_2)) {
            $modifiedColumns[':p' . $index++]  = '"param_2"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_3)) {
            $modifiedColumns[':p' . $index++]  = '"param_3"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_4)) {
            $modifiedColumns[':p' . $index++]  = '"param_4"';
        }
        if ($this->isColumnModified(BitterTablePeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BitterTablePeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BitterTablePeer::COUNT_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"count_update"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_5)) {
            $modifiedColumns[':p' . $index++]  = '"param_5"';
        }
        if ($this->isColumnModified(BitterTablePeer::PARAM_6)) {
            $modifiedColumns[':p' . $index++]  = '"param_6"';
        }

        $sql = sprintf(
            'INSERT INTO "bitter_table" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"bitter_table_id"':						
                        $stmt->bindValue($identifier, $this->bitter_table_id, PDO::PARAM_STR);
                        break;
                    case '"param_1"':						
                        $stmt->bindValue($identifier, $this->param_1, PDO::PARAM_STR);
                        break;
                    case '"param_2"':						
                        $stmt->bindValue($identifier, $this->param_2, PDO::PARAM_INT);
                        break;
                    case '"param_3"':						
                        $stmt->bindValue($identifier, $this->param_3, PDO::PARAM_STR);
                        break;
                    case '"param_4"':						
                        $stmt->bindValue($identifier, $this->param_4, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"count_update"':						
                        $stmt->bindValue($identifier, $this->count_update, PDO::PARAM_INT);
                        break;
                    case '"param_5"':						
                        $stmt->bindValue($identifier, $this->param_5, PDO::PARAM_STR);
                        break;
                    case '"param_6"':						
                        $stmt->bindValue($identifier, $this->param_6, PDO::PARAM_STR);
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


            if (($retval = BitterTablePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
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
        $pos = BitterTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getBitterTableId();
                break;
            case 1:
                return $this->getParam1();
                break;
            case 2:
                return $this->getParam2();
                break;
            case 3:
                return $this->getParam3();
                break;
            case 4:
                return $this->getParam4();
                break;
            case 5:
                return $this->getCreateDate();
                break;
            case 6:
                return $this->getLastUpdate();
                break;
            case 7:
                return $this->getCountUpdate();
                break;
            case 8:
                return $this->getParam5();
                break;
            case 9:
                return $this->getParam6();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['BitterTable'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BitterTable'][$this->getPrimaryKey()] = true;
        $keys = BitterTablePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBitterTableId(),
            $keys[1] => $this->getParam1(),
            $keys[2] => $this->getParam2(),
            $keys[3] => $this->getParam3(),
            $keys[4] => $this->getParam4(),
            $keys[5] => $this->getCreateDate(),
            $keys[6] => $this->getLastUpdate(),
            $keys[7] => $this->getCountUpdate(),
            $keys[8] => $this->getParam5(),
            $keys[9] => $this->getParam6(),
        );

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
        $pos = BitterTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setBitterTableId($value);
                break;
            case 1:
                $this->setParam1($value);
                break;
            case 2:
                $this->setParam2($value);
                break;
            case 3:
                $this->setParam3($value);
                break;
            case 4:
                $this->setParam4($value);
                break;
            case 5:
                $this->setCreateDate($value);
                break;
            case 6:
                $this->setLastUpdate($value);
                break;
            case 7:
                $this->setCountUpdate($value);
                break;
            case 8:
                $this->setParam5($value);
                break;
            case 9:
                $this->setParam6($value);
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
        $keys = BitterTablePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setBitterTableId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setParam1($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setParam2($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setParam3($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setParam4($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreateDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastUpdate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCountUpdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setParam5($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setParam6($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BitterTablePeer::DATABASE_NAME);

        if ($this->isColumnModified(BitterTablePeer::BITTER_TABLE_ID)) $criteria->add(BitterTablePeer::BITTER_TABLE_ID, $this->bitter_table_id);
        if ($this->isColumnModified(BitterTablePeer::PARAM_1)) $criteria->add(BitterTablePeer::PARAM_1, $this->param_1);
        if ($this->isColumnModified(BitterTablePeer::PARAM_2)) $criteria->add(BitterTablePeer::PARAM_2, $this->param_2);
        if ($this->isColumnModified(BitterTablePeer::PARAM_3)) $criteria->add(BitterTablePeer::PARAM_3, $this->param_3);
        if ($this->isColumnModified(BitterTablePeer::PARAM_4)) $criteria->add(BitterTablePeer::PARAM_4, $this->param_4);
        if ($this->isColumnModified(BitterTablePeer::CREATE_DATE)) $criteria->add(BitterTablePeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BitterTablePeer::LAST_UPDATE)) $criteria->add(BitterTablePeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BitterTablePeer::COUNT_UPDATE)) $criteria->add(BitterTablePeer::COUNT_UPDATE, $this->count_update);
        if ($this->isColumnModified(BitterTablePeer::PARAM_5)) $criteria->add(BitterTablePeer::PARAM_5, $this->param_5);
        if ($this->isColumnModified(BitterTablePeer::PARAM_6)) $criteria->add(BitterTablePeer::PARAM_6, $this->param_6);

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
        $criteria = new Criteria(BitterTablePeer::DATABASE_NAME);
        $criteria->add(BitterTablePeer::BITTER_TABLE_ID, $this->bitter_table_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getBitterTableId();
    }

    /**
     * Generic method to set the primary key (bitter_table_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBitterTableId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getBitterTableId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of BitterTable (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setParam1($this->getParam1());
        $copyObj->setParam2($this->getParam2());
        $copyObj->setParam3($this->getParam3());
        $copyObj->setParam4($this->getParam4());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setCountUpdate($this->getCountUpdate());
        $copyObj->setParam5($this->getParam5());
        $copyObj->setParam6($this->getParam6());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBitterTableId(NULL); // this is a auto-increment column, so set to default value
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
     * @return BitterTable Clone of current object.
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
     * @return BitterTablePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BitterTablePeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->bitter_table_id = null;
        $this->param_1 = null;
        $this->param_2 = null;
        $this->param_3 = null;
        $this->param_4 = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->count_update = null;
        $this->param_5 = null;
        $this->param_6 = null;
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BitterTablePeer::DEFAULT_STRING_FORMAT);
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
