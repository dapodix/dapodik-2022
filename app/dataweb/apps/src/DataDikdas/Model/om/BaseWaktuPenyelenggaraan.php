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
use \PropelCollection;
use \PropelDateTime;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\SekolahLongitudinal;
use DataDikdas\Model\SekolahLongitudinalQuery;
use DataDikdas\Model\WaktuPenyelenggaraan;
use DataDikdas\Model\WaktuPenyelenggaraanPeer;
use DataDikdas\Model\WaktuPenyelenggaraanQuery;

/**
 * Base class that represents a row from the 'ref.waktu_penyelenggaraan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWaktuPenyelenggaraan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\WaktuPenyelenggaraanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        WaktuPenyelenggaraanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the waktu_penyelenggaraan_id field.
     * @var        string
     */
    protected $waktu_penyelenggaraan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

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
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * @var        PropelObjectCollection|SekolahLongitudinal[] Collection to store aggregation of SekolahLongitudinal objects.
     */
    protected $collSekolahLongitudinals;
    protected $collSekolahLongitudinalsPartial;

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
    protected $sekolahLongitudinalsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseWaktuPenyelenggaraan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [waktu_penyelenggaraan_id] column value.
     * 
     * @return string
     */
    public function getWaktuPenyelenggaraanId()
    {
        return $this->waktu_penyelenggaraan_id;
    }

    /**
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
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
     * Get the [optionally formatted] temporal [expired_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getExpiredDate($format = 'Y-m-d H:i:s')
    {
        if ($this->expired_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->expired_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->expired_date, true), $x);
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
     * Get the [optionally formatted] temporal [last_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getLastSync($format = 'Y-m-d H:i:s')
    {
        if ($this->last_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->last_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->last_sync, true), $x);
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
     * Set the value of [waktu_penyelenggaraan_id] column.
     * 
     * @param string $v new value
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setWaktuPenyelenggaraanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->waktu_penyelenggaraan_id !== $v) {
            $this->waktu_penyelenggaraan_id = $v;
            $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID;
        }


        return $this;
    } // setWaktuPenyelenggaraanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ( ($currentDateAsString !== $newDateAsString) // normalized values don't match
                || ($dt->format('Y-m-d H:i:s') === '1901-01-01 00:00:00') // or the entered value matches the default
                 ) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = WaktuPenyelenggaraanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

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
            if ($this->last_sync !== '1901-01-01 00:00:00') {
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

            $this->waktu_penyelenggaraan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->create_date = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->last_update = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->expired_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_sync = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = WaktuPenyelenggaraanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating WaktuPenyelenggaraan object", $e);
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
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = WaktuPenyelenggaraanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSekolahLongitudinals = null;

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
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = WaktuPenyelenggaraanQuery::create()
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
            $con = Propel::getConnection(WaktuPenyelenggaraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                WaktuPenyelenggaraanPeer::addInstanceToPool($this);
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

            if ($this->sekolahLongitudinalsScheduledForDeletion !== null) {
                if (!$this->sekolahLongitudinalsScheduledForDeletion->isEmpty()) {
                    SekolahLongitudinalQuery::create()
                        ->filterByPrimaryKeys($this->sekolahLongitudinalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sekolahLongitudinalsScheduledForDeletion = null;
                }
            }

            if ($this->collSekolahLongitudinals !== null) {
                foreach ($this->collSekolahLongitudinals as $referrerFK) {
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
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"waktu_penyelenggaraan_id"';
        }
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."waktu_penyelenggaraan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"waktu_penyelenggaraan_id"':						
                        $stmt->bindValue($identifier, $this->waktu_penyelenggaraan_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
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


            if (($retval = WaktuPenyelenggaraanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSekolahLongitudinals !== null) {
                    foreach ($this->collSekolahLongitudinals as $referrerFK) {
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
        $pos = WaktuPenyelenggaraanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getWaktuPenyelenggaraanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getCreateDate();
                break;
            case 3:
                return $this->getLastUpdate();
                break;
            case 4:
                return $this->getExpiredDate();
                break;
            case 5:
                return $this->getLastSync();
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
        if (isset($alreadyDumpedObjects['WaktuPenyelenggaraan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WaktuPenyelenggaraan'][$this->getPrimaryKey()] = true;
        $keys = WaktuPenyelenggaraanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getWaktuPenyelenggaraanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getCreateDate(),
            $keys[3] => $this->getLastUpdate(),
            $keys[4] => $this->getExpiredDate(),
            $keys[5] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSekolahLongitudinals) {
                $result['SekolahLongitudinals'] = $this->collSekolahLongitudinals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = WaktuPenyelenggaraanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setWaktuPenyelenggaraanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setCreateDate($value);
                break;
            case 3:
                $this->setLastUpdate($value);
                break;
            case 4:
                $this->setExpiredDate($value);
                break;
            case 5:
                $this->setLastSync($value);
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
        $keys = WaktuPenyelenggaraanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setWaktuPenyelenggaraanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setCreateDate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setLastUpdate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setExpiredDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastSync($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);

        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID)) $criteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $this->waktu_penyelenggaraan_id);
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::NAMA)) $criteria->add(WaktuPenyelenggaraanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::CREATE_DATE)) $criteria->add(WaktuPenyelenggaraanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::LAST_UPDATE)) $criteria->add(WaktuPenyelenggaraanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::EXPIRED_DATE)) $criteria->add(WaktuPenyelenggaraanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(WaktuPenyelenggaraanPeer::LAST_SYNC)) $criteria->add(WaktuPenyelenggaraanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(WaktuPenyelenggaraanPeer::DATABASE_NAME);
        $criteria->add(WaktuPenyelenggaraanPeer::WAKTU_PENYELENGGARAAN_ID, $this->waktu_penyelenggaraan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getWaktuPenyelenggaraanId();
    }

    /**
     * Generic method to set the primary key (waktu_penyelenggaraan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setWaktuPenyelenggaraanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getWaktuPenyelenggaraanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of WaktuPenyelenggaraan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setLastSync($this->getLastSync());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSekolahLongitudinals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSekolahLongitudinal($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setWaktuPenyelenggaraanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return WaktuPenyelenggaraan Clone of current object.
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
     * @return WaktuPenyelenggaraanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new WaktuPenyelenggaraanPeer();
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
        if ('SekolahLongitudinal' == $relationName) {
            $this->initSekolahLongitudinals();
        }
    }

    /**
     * Clears out the collSekolahLongitudinals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     * @see        addSekolahLongitudinals()
     */
    public function clearSekolahLongitudinals()
    {
        $this->collSekolahLongitudinals = null; // important to set this to null since that means it is uninitialized
        $this->collSekolahLongitudinalsPartial = null;

        return $this;
    }

    /**
     * reset is the collSekolahLongitudinals collection loaded partially
     *
     * @return void
     */
    public function resetPartialSekolahLongitudinals($v = true)
    {
        $this->collSekolahLongitudinalsPartial = $v;
    }

    /**
     * Initializes the collSekolahLongitudinals collection.
     *
     * By default this just sets the collSekolahLongitudinals collection to an empty array (like clearcollSekolahLongitudinals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSekolahLongitudinals($overrideExisting = true)
    {
        if (null !== $this->collSekolahLongitudinals && !$overrideExisting) {
            return;
        }
        $this->collSekolahLongitudinals = new PropelObjectCollection();
        $this->collSekolahLongitudinals->setModel('SekolahLongitudinal');
    }

    /**
     * Gets an array of SekolahLongitudinal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this WaktuPenyelenggaraan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     * @throws PropelException
     */
    public function getSekolahLongitudinals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                // return empty collection
                $this->initSekolahLongitudinals();
            } else {
                $collSekolahLongitudinals = SekolahLongitudinalQuery::create(null, $criteria)
                    ->filterByWaktuPenyelenggaraan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSekolahLongitudinalsPartial && count($collSekolahLongitudinals)) {
                      $this->initSekolahLongitudinals(false);

                      foreach($collSekolahLongitudinals as $obj) {
                        if (false == $this->collSekolahLongitudinals->contains($obj)) {
                          $this->collSekolahLongitudinals->append($obj);
                        }
                      }

                      $this->collSekolahLongitudinalsPartial = true;
                    }

                    $collSekolahLongitudinals->getInternalIterator()->rewind();
                    return $collSekolahLongitudinals;
                }

                if($partial && $this->collSekolahLongitudinals) {
                    foreach($this->collSekolahLongitudinals as $obj) {
                        if($obj->isNew()) {
                            $collSekolahLongitudinals[] = $obj;
                        }
                    }
                }

                $this->collSekolahLongitudinals = $collSekolahLongitudinals;
                $this->collSekolahLongitudinalsPartial = false;
            }
        }

        return $this->collSekolahLongitudinals;
    }

    /**
     * Sets a collection of SekolahLongitudinal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sekolahLongitudinals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function setSekolahLongitudinals(PropelCollection $sekolahLongitudinals, PropelPDO $con = null)
    {
        $sekolahLongitudinalsToDelete = $this->getSekolahLongitudinals(new Criteria(), $con)->diff($sekolahLongitudinals);

        $this->sekolahLongitudinalsScheduledForDeletion = unserialize(serialize($sekolahLongitudinalsToDelete));

        foreach ($sekolahLongitudinalsToDelete as $sekolahLongitudinalRemoved) {
            $sekolahLongitudinalRemoved->setWaktuPenyelenggaraan(null);
        }

        $this->collSekolahLongitudinals = null;
        foreach ($sekolahLongitudinals as $sekolahLongitudinal) {
            $this->addSekolahLongitudinal($sekolahLongitudinal);
        }

        $this->collSekolahLongitudinals = $sekolahLongitudinals;
        $this->collSekolahLongitudinalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SekolahLongitudinal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SekolahLongitudinal objects.
     * @throws PropelException
     */
    public function countSekolahLongitudinals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSekolahLongitudinalsPartial && !$this->isNew();
        if (null === $this->collSekolahLongitudinals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSekolahLongitudinals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSekolahLongitudinals());
            }
            $query = SekolahLongitudinalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByWaktuPenyelenggaraan($this)
                ->count($con);
        }

        return count($this->collSekolahLongitudinals);
    }

    /**
     * Method called to associate a SekolahLongitudinal object to this object
     * through the SekolahLongitudinal foreign key attribute.
     *
     * @param    SekolahLongitudinal $l SekolahLongitudinal
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function addSekolahLongitudinal(SekolahLongitudinal $l)
    {
        if ($this->collSekolahLongitudinals === null) {
            $this->initSekolahLongitudinals();
            $this->collSekolahLongitudinalsPartial = true;
        }
        if (!in_array($l, $this->collSekolahLongitudinals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSekolahLongitudinal($l);
        }

        return $this;
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to add.
     */
    protected function doAddSekolahLongitudinal($sekolahLongitudinal)
    {
        $this->collSekolahLongitudinals[]= $sekolahLongitudinal;
        $sekolahLongitudinal->setWaktuPenyelenggaraan($this);
    }

    /**
     * @param	SekolahLongitudinal $sekolahLongitudinal The sekolahLongitudinal object to remove.
     * @return WaktuPenyelenggaraan The current object (for fluent API support)
     */
    public function removeSekolahLongitudinal($sekolahLongitudinal)
    {
        if ($this->getSekolahLongitudinals()->contains($sekolahLongitudinal)) {
            $this->collSekolahLongitudinals->remove($this->collSekolahLongitudinals->search($sekolahLongitudinal));
            if (null === $this->sekolahLongitudinalsScheduledForDeletion) {
                $this->sekolahLongitudinalsScheduledForDeletion = clone $this->collSekolahLongitudinals;
                $this->sekolahLongitudinalsScheduledForDeletion->clear();
            }
            $this->sekolahLongitudinalsScheduledForDeletion[]= clone $sekolahLongitudinal;
            $sekolahLongitudinal->setWaktuPenyelenggaraan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinLargeObject($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('LargeObject', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSertifikasiIso($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SertifikasiIso', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinSumberListrik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('SumberListrik', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternetId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternetId', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this WaktuPenyelenggaraan is new, it will return
     * an empty collection; or if this WaktuPenyelenggaraan has previously
     * been saved, it will retrieve related SekolahLongitudinals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in WaktuPenyelenggaraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|SekolahLongitudinal[] List of SekolahLongitudinal objects
     */
    public function getSekolahLongitudinalsJoinAksesInternetRelatedByAksesInternet2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SekolahLongitudinalQuery::create(null, $criteria);
        $query->joinWith('AksesInternetRelatedByAksesInternet2Id', $join_behavior);

        return $this->getSekolahLongitudinals($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->waktu_penyelenggaraan_id = null;
        $this->nama = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->expired_date = null;
        $this->last_sync = null;
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
            if ($this->collSekolahLongitudinals) {
                foreach ($this->collSekolahLongitudinals as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSekolahLongitudinals instanceof PropelCollection) {
            $this->collSekolahLongitudinals->clearIterator();
        }
        $this->collSekolahLongitudinals = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WaktuPenyelenggaraanPeer::DEFAULT_STRING_FORMAT);
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
