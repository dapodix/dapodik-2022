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
use DataDikdas\Model\Sanitasi;
use DataDikdas\Model\SanitasiQuery;
use DataDikdas\Model\SumberAir;
use DataDikdas\Model\SumberAirPeer;
use DataDikdas\Model\SumberAirQuery;

/**
 * Base class that represents a row from the 'ref.sumber_air' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSumberAir extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SumberAirPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SumberAirPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the sumber_air_id field.
     * @var        string
     */
    protected $sumber_air_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the sumber_air field.
     * @var        string
     */
    protected $sumber_air;

    /**
     * The value for the sumber_minum field.
     * @var        string
     */
    protected $sumber_minum;

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
     * @var        PropelObjectCollection|Sanitasi[] Collection to store aggregation of Sanitasi objects.
     */
    protected $collSanitasisRelatedBySumberAirId;
    protected $collSanitasisRelatedBySumberAirIdPartial;

    /**
     * @var        PropelObjectCollection|Sanitasi[] Collection to store aggregation of Sanitasi objects.
     */
    protected $collSanitasisRelatedBySumberAirMinumId;
    protected $collSanitasisRelatedBySumberAirMinumIdPartial;

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
    protected $sanitasisRelatedBySumberAirIdScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $sanitasisRelatedBySumberAirMinumIdScheduledForDeletion = null;

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
     * Initializes internal state of BaseSumberAir object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [sumber_air_id] column value.
     * 
     * @return string
     */
    public function getSumberAirId()
    {
        return $this->sumber_air_id;
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
     * Get the [sumber_air] column value.
     * 
     * @return string
     */
    public function getSumberAir()
    {
        return $this->sumber_air;
    }

    /**
     * Get the [sumber_minum] column value.
     * 
     * @return string
     */
    public function getSumberMinum()
    {
        return $this->sumber_minum;
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
     * Set the value of [sumber_air_id] column.
     * 
     * @param string $v new value
     * @return SumberAir The current object (for fluent API support)
     */
    public function setSumberAirId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_air_id !== $v) {
            $this->sumber_air_id = $v;
            $this->modifiedColumns[] = SumberAirPeer::SUMBER_AIR_ID;
        }


        return $this;
    } // setSumberAirId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return SumberAir The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = SumberAirPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [sumber_air] column.
     * 
     * @param string $v new value
     * @return SumberAir The current object (for fluent API support)
     */
    public function setSumberAir($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_air !== $v) {
            $this->sumber_air = $v;
            $this->modifiedColumns[] = SumberAirPeer::SUMBER_AIR;
        }


        return $this;
    } // setSumberAir()

    /**
     * Set the value of [sumber_minum] column.
     * 
     * @param string $v new value
     * @return SumberAir The current object (for fluent API support)
     */
    public function setSumberMinum($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_minum !== $v) {
            $this->sumber_minum = $v;
            $this->modifiedColumns[] = SumberAirPeer::SUMBER_MINUM;
        }


        return $this;
    } // setSumberMinum()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SumberAir The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = SumberAirPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SumberAir The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = SumberAirPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SumberAir The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = SumberAirPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SumberAir The current object (for fluent API support)
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
                $this->modifiedColumns[] = SumberAirPeer::LAST_SYNC;
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

            $this->sumber_air_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->sumber_air = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sumber_minum = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->create_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->expired_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_sync = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = SumberAirPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SumberAir object", $e);
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
            $con = Propel::getConnection(SumberAirPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SumberAirPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collSanitasisRelatedBySumberAirId = null;

            $this->collSanitasisRelatedBySumberAirMinumId = null;

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
            $con = Propel::getConnection(SumberAirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SumberAirQuery::create()
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
            $con = Propel::getConnection(SumberAirPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SumberAirPeer::addInstanceToPool($this);
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

            if ($this->sanitasisRelatedBySumberAirIdScheduledForDeletion !== null) {
                if (!$this->sanitasisRelatedBySumberAirIdScheduledForDeletion->isEmpty()) {
                    SanitasiQuery::create()
                        ->filterByPrimaryKeys($this->sanitasisRelatedBySumberAirIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sanitasisRelatedBySumberAirIdScheduledForDeletion = null;
                }
            }

            if ($this->collSanitasisRelatedBySumberAirId !== null) {
                foreach ($this->collSanitasisRelatedBySumberAirId as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion !== null) {
                if (!$this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion->isEmpty()) {
                    SanitasiQuery::create()
                        ->filterByPrimaryKeys($this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion = null;
                }
            }

            if ($this->collSanitasisRelatedBySumberAirMinumId !== null) {
                foreach ($this->collSanitasisRelatedBySumberAirMinumId as $referrerFK) {
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
        if ($this->isColumnModified(SumberAirPeer::SUMBER_AIR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_air_id"';
        }
        if ($this->isColumnModified(SumberAirPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(SumberAirPeer::SUMBER_AIR)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_air"';
        }
        if ($this->isColumnModified(SumberAirPeer::SUMBER_MINUM)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_minum"';
        }
        if ($this->isColumnModified(SumberAirPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(SumberAirPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(SumberAirPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(SumberAirPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."sumber_air" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"sumber_air_id"':						
                        $stmt->bindValue($identifier, $this->sumber_air_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"sumber_air"':						
                        $stmt->bindValue($identifier, $this->sumber_air, PDO::PARAM_STR);
                        break;
                    case '"sumber_minum"':						
                        $stmt->bindValue($identifier, $this->sumber_minum, PDO::PARAM_STR);
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


            if (($retval = SumberAirPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSanitasisRelatedBySumberAirId !== null) {
                    foreach ($this->collSanitasisRelatedBySumberAirId as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collSanitasisRelatedBySumberAirMinumId !== null) {
                    foreach ($this->collSanitasisRelatedBySumberAirMinumId as $referrerFK) {
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
        $pos = SumberAirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSumberAirId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getSumberAir();
                break;
            case 3:
                return $this->getSumberMinum();
                break;
            case 4:
                return $this->getCreateDate();
                break;
            case 5:
                return $this->getLastUpdate();
                break;
            case 6:
                return $this->getExpiredDate();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['SumberAir'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SumberAir'][$this->getPrimaryKey()] = true;
        $keys = SumberAirPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSumberAirId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getSumberAir(),
            $keys[3] => $this->getSumberMinum(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getExpiredDate(),
            $keys[7] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collSanitasisRelatedBySumberAirId) {
                $result['SanitasisRelatedBySumberAirId'] = $this->collSanitasisRelatedBySumberAirId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collSanitasisRelatedBySumberAirMinumId) {
                $result['SanitasisRelatedBySumberAirMinumId'] = $this->collSanitasisRelatedBySumberAirMinumId->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = SumberAirPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSumberAirId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setSumberAir($value);
                break;
            case 3:
                $this->setSumberMinum($value);
                break;
            case 4:
                $this->setCreateDate($value);
                break;
            case 5:
                $this->setLastUpdate($value);
                break;
            case 6:
                $this->setExpiredDate($value);
                break;
            case 7:
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
        $keys = SumberAirPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSumberAirId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSumberAir($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSumberMinum($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreateDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpiredDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastSync($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SumberAirPeer::DATABASE_NAME);

        if ($this->isColumnModified(SumberAirPeer::SUMBER_AIR_ID)) $criteria->add(SumberAirPeer::SUMBER_AIR_ID, $this->sumber_air_id);
        if ($this->isColumnModified(SumberAirPeer::NAMA)) $criteria->add(SumberAirPeer::NAMA, $this->nama);
        if ($this->isColumnModified(SumberAirPeer::SUMBER_AIR)) $criteria->add(SumberAirPeer::SUMBER_AIR, $this->sumber_air);
        if ($this->isColumnModified(SumberAirPeer::SUMBER_MINUM)) $criteria->add(SumberAirPeer::SUMBER_MINUM, $this->sumber_minum);
        if ($this->isColumnModified(SumberAirPeer::CREATE_DATE)) $criteria->add(SumberAirPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(SumberAirPeer::LAST_UPDATE)) $criteria->add(SumberAirPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(SumberAirPeer::EXPIRED_DATE)) $criteria->add(SumberAirPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(SumberAirPeer::LAST_SYNC)) $criteria->add(SumberAirPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(SumberAirPeer::DATABASE_NAME);
        $criteria->add(SumberAirPeer::SUMBER_AIR_ID, $this->sumber_air_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getSumberAirId();
    }

    /**
     * Generic method to set the primary key (sumber_air_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setSumberAirId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getSumberAirId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SumberAir (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setSumberAir($this->getSumberAir());
        $copyObj->setSumberMinum($this->getSumberMinum());
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

            foreach ($this->getSanitasisRelatedBySumberAirId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSanitasiRelatedBySumberAirId($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getSanitasisRelatedBySumberAirMinumId() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSanitasiRelatedBySumberAirMinumId($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setSumberAirId(NULL); // this is a auto-increment column, so set to default value
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
     * @return SumberAir Clone of current object.
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
     * @return SumberAirPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SumberAirPeer();
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
        if ('SanitasiRelatedBySumberAirId' == $relationName) {
            $this->initSanitasisRelatedBySumberAirId();
        }
        if ('SanitasiRelatedBySumberAirMinumId' == $relationName) {
            $this->initSanitasisRelatedBySumberAirMinumId();
        }
    }

    /**
     * Clears out the collSanitasisRelatedBySumberAirId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SumberAir The current object (for fluent API support)
     * @see        addSanitasisRelatedBySumberAirId()
     */
    public function clearSanitasisRelatedBySumberAirId()
    {
        $this->collSanitasisRelatedBySumberAirId = null; // important to set this to null since that means it is uninitialized
        $this->collSanitasisRelatedBySumberAirIdPartial = null;

        return $this;
    }

    /**
     * reset is the collSanitasisRelatedBySumberAirId collection loaded partially
     *
     * @return void
     */
    public function resetPartialSanitasisRelatedBySumberAirId($v = true)
    {
        $this->collSanitasisRelatedBySumberAirIdPartial = $v;
    }

    /**
     * Initializes the collSanitasisRelatedBySumberAirId collection.
     *
     * By default this just sets the collSanitasisRelatedBySumberAirId collection to an empty array (like clearcollSanitasisRelatedBySumberAirId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSanitasisRelatedBySumberAirId($overrideExisting = true)
    {
        if (null !== $this->collSanitasisRelatedBySumberAirId && !$overrideExisting) {
            return;
        }
        $this->collSanitasisRelatedBySumberAirId = new PropelObjectCollection();
        $this->collSanitasisRelatedBySumberAirId->setModel('Sanitasi');
    }

    /**
     * Gets an array of Sanitasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SumberAir is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     * @throws PropelException
     */
    public function getSanitasisRelatedBySumberAirId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisRelatedBySumberAirIdPartial && !$this->isNew();
        if (null === $this->collSanitasisRelatedBySumberAirId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSanitasisRelatedBySumberAirId) {
                // return empty collection
                $this->initSanitasisRelatedBySumberAirId();
            } else {
                $collSanitasisRelatedBySumberAirId = SanitasiQuery::create(null, $criteria)
                    ->filterBySumberAirRelatedBySumberAirId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSanitasisRelatedBySumberAirIdPartial && count($collSanitasisRelatedBySumberAirId)) {
                      $this->initSanitasisRelatedBySumberAirId(false);

                      foreach($collSanitasisRelatedBySumberAirId as $obj) {
                        if (false == $this->collSanitasisRelatedBySumberAirId->contains($obj)) {
                          $this->collSanitasisRelatedBySumberAirId->append($obj);
                        }
                      }

                      $this->collSanitasisRelatedBySumberAirIdPartial = true;
                    }

                    $collSanitasisRelatedBySumberAirId->getInternalIterator()->rewind();
                    return $collSanitasisRelatedBySumberAirId;
                }

                if($partial && $this->collSanitasisRelatedBySumberAirId) {
                    foreach($this->collSanitasisRelatedBySumberAirId as $obj) {
                        if($obj->isNew()) {
                            $collSanitasisRelatedBySumberAirId[] = $obj;
                        }
                    }
                }

                $this->collSanitasisRelatedBySumberAirId = $collSanitasisRelatedBySumberAirId;
                $this->collSanitasisRelatedBySumberAirIdPartial = false;
            }
        }

        return $this->collSanitasisRelatedBySumberAirId;
    }

    /**
     * Sets a collection of SanitasiRelatedBySumberAirId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sanitasisRelatedBySumberAirId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SumberAir The current object (for fluent API support)
     */
    public function setSanitasisRelatedBySumberAirId(PropelCollection $sanitasisRelatedBySumberAirId, PropelPDO $con = null)
    {
        $sanitasisRelatedBySumberAirIdToDelete = $this->getSanitasisRelatedBySumberAirId(new Criteria(), $con)->diff($sanitasisRelatedBySumberAirId);

        $this->sanitasisRelatedBySumberAirIdScheduledForDeletion = unserialize(serialize($sanitasisRelatedBySumberAirIdToDelete));

        foreach ($sanitasisRelatedBySumberAirIdToDelete as $sanitasiRelatedBySumberAirIdRemoved) {
            $sanitasiRelatedBySumberAirIdRemoved->setSumberAirRelatedBySumberAirId(null);
        }

        $this->collSanitasisRelatedBySumberAirId = null;
        foreach ($sanitasisRelatedBySumberAirId as $sanitasiRelatedBySumberAirId) {
            $this->addSanitasiRelatedBySumberAirId($sanitasiRelatedBySumberAirId);
        }

        $this->collSanitasisRelatedBySumberAirId = $sanitasisRelatedBySumberAirId;
        $this->collSanitasisRelatedBySumberAirIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sanitasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sanitasi objects.
     * @throws PropelException
     */
    public function countSanitasisRelatedBySumberAirId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisRelatedBySumberAirIdPartial && !$this->isNew();
        if (null === $this->collSanitasisRelatedBySumberAirId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSanitasisRelatedBySumberAirId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSanitasisRelatedBySumberAirId());
            }
            $query = SanitasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySumberAirRelatedBySumberAirId($this)
                ->count($con);
        }

        return count($this->collSanitasisRelatedBySumberAirId);
    }

    /**
     * Method called to associate a Sanitasi object to this object
     * through the Sanitasi foreign key attribute.
     *
     * @param    Sanitasi $l Sanitasi
     * @return SumberAir The current object (for fluent API support)
     */
    public function addSanitasiRelatedBySumberAirId(Sanitasi $l)
    {
        if ($this->collSanitasisRelatedBySumberAirId === null) {
            $this->initSanitasisRelatedBySumberAirId();
            $this->collSanitasisRelatedBySumberAirIdPartial = true;
        }
        if (!in_array($l, $this->collSanitasisRelatedBySumberAirId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSanitasiRelatedBySumberAirId($l);
        }

        return $this;
    }

    /**
     * @param	SanitasiRelatedBySumberAirId $sanitasiRelatedBySumberAirId The sanitasiRelatedBySumberAirId object to add.
     */
    protected function doAddSanitasiRelatedBySumberAirId($sanitasiRelatedBySumberAirId)
    {
        $this->collSanitasisRelatedBySumberAirId[]= $sanitasiRelatedBySumberAirId;
        $sanitasiRelatedBySumberAirId->setSumberAirRelatedBySumberAirId($this);
    }

    /**
     * @param	SanitasiRelatedBySumberAirId $sanitasiRelatedBySumberAirId The sanitasiRelatedBySumberAirId object to remove.
     * @return SumberAir The current object (for fluent API support)
     */
    public function removeSanitasiRelatedBySumberAirId($sanitasiRelatedBySumberAirId)
    {
        if ($this->getSanitasisRelatedBySumberAirId()->contains($sanitasiRelatedBySumberAirId)) {
            $this->collSanitasisRelatedBySumberAirId->remove($this->collSanitasisRelatedBySumberAirId->search($sanitasiRelatedBySumberAirId));
            if (null === $this->sanitasisRelatedBySumberAirIdScheduledForDeletion) {
                $this->sanitasisRelatedBySumberAirIdScheduledForDeletion = clone $this->collSanitasisRelatedBySumberAirId;
                $this->sanitasisRelatedBySumberAirIdScheduledForDeletion->clear();
            }
            $this->sanitasisRelatedBySumberAirIdScheduledForDeletion[]= clone $sanitasiRelatedBySumberAirId;
            $sanitasiRelatedBySumberAirId->setSumberAirRelatedBySumberAirId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SumberAir is new, it will return
     * an empty collection; or if this SumberAir has previously
     * been saved, it will retrieve related SanitasisRelatedBySumberAirId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SumberAir.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisRelatedBySumberAirIdJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSanitasisRelatedBySumberAirId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SumberAir is new, it will return
     * an empty collection; or if this SumberAir has previously
     * been saved, it will retrieve related SanitasisRelatedBySumberAirId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SumberAir.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisRelatedBySumberAirIdJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSanitasisRelatedBySumberAirId($query, $con);
    }

    /**
     * Clears out the collSanitasisRelatedBySumberAirMinumId collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return SumberAir The current object (for fluent API support)
     * @see        addSanitasisRelatedBySumberAirMinumId()
     */
    public function clearSanitasisRelatedBySumberAirMinumId()
    {
        $this->collSanitasisRelatedBySumberAirMinumId = null; // important to set this to null since that means it is uninitialized
        $this->collSanitasisRelatedBySumberAirMinumIdPartial = null;

        return $this;
    }

    /**
     * reset is the collSanitasisRelatedBySumberAirMinumId collection loaded partially
     *
     * @return void
     */
    public function resetPartialSanitasisRelatedBySumberAirMinumId($v = true)
    {
        $this->collSanitasisRelatedBySumberAirMinumIdPartial = $v;
    }

    /**
     * Initializes the collSanitasisRelatedBySumberAirMinumId collection.
     *
     * By default this just sets the collSanitasisRelatedBySumberAirMinumId collection to an empty array (like clearcollSanitasisRelatedBySumberAirMinumId());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSanitasisRelatedBySumberAirMinumId($overrideExisting = true)
    {
        if (null !== $this->collSanitasisRelatedBySumberAirMinumId && !$overrideExisting) {
            return;
        }
        $this->collSanitasisRelatedBySumberAirMinumId = new PropelObjectCollection();
        $this->collSanitasisRelatedBySumberAirMinumId->setModel('Sanitasi');
    }

    /**
     * Gets an array of Sanitasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this SumberAir is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     * @throws PropelException
     */
    public function getSanitasisRelatedBySumberAirMinumId($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisRelatedBySumberAirMinumIdPartial && !$this->isNew();
        if (null === $this->collSanitasisRelatedBySumberAirMinumId || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSanitasisRelatedBySumberAirMinumId) {
                // return empty collection
                $this->initSanitasisRelatedBySumberAirMinumId();
            } else {
                $collSanitasisRelatedBySumberAirMinumId = SanitasiQuery::create(null, $criteria)
                    ->filterBySumberAirRelatedBySumberAirMinumId($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSanitasisRelatedBySumberAirMinumIdPartial && count($collSanitasisRelatedBySumberAirMinumId)) {
                      $this->initSanitasisRelatedBySumberAirMinumId(false);

                      foreach($collSanitasisRelatedBySumberAirMinumId as $obj) {
                        if (false == $this->collSanitasisRelatedBySumberAirMinumId->contains($obj)) {
                          $this->collSanitasisRelatedBySumberAirMinumId->append($obj);
                        }
                      }

                      $this->collSanitasisRelatedBySumberAirMinumIdPartial = true;
                    }

                    $collSanitasisRelatedBySumberAirMinumId->getInternalIterator()->rewind();
                    return $collSanitasisRelatedBySumberAirMinumId;
                }

                if($partial && $this->collSanitasisRelatedBySumberAirMinumId) {
                    foreach($this->collSanitasisRelatedBySumberAirMinumId as $obj) {
                        if($obj->isNew()) {
                            $collSanitasisRelatedBySumberAirMinumId[] = $obj;
                        }
                    }
                }

                $this->collSanitasisRelatedBySumberAirMinumId = $collSanitasisRelatedBySumberAirMinumId;
                $this->collSanitasisRelatedBySumberAirMinumIdPartial = false;
            }
        }

        return $this->collSanitasisRelatedBySumberAirMinumId;
    }

    /**
     * Sets a collection of SanitasiRelatedBySumberAirMinumId objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $sanitasisRelatedBySumberAirMinumId A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return SumberAir The current object (for fluent API support)
     */
    public function setSanitasisRelatedBySumberAirMinumId(PropelCollection $sanitasisRelatedBySumberAirMinumId, PropelPDO $con = null)
    {
        $sanitasisRelatedBySumberAirMinumIdToDelete = $this->getSanitasisRelatedBySumberAirMinumId(new Criteria(), $con)->diff($sanitasisRelatedBySumberAirMinumId);

        $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion = unserialize(serialize($sanitasisRelatedBySumberAirMinumIdToDelete));

        foreach ($sanitasisRelatedBySumberAirMinumIdToDelete as $sanitasiRelatedBySumberAirMinumIdRemoved) {
            $sanitasiRelatedBySumberAirMinumIdRemoved->setSumberAirRelatedBySumberAirMinumId(null);
        }

        $this->collSanitasisRelatedBySumberAirMinumId = null;
        foreach ($sanitasisRelatedBySumberAirMinumId as $sanitasiRelatedBySumberAirMinumId) {
            $this->addSanitasiRelatedBySumberAirMinumId($sanitasiRelatedBySumberAirMinumId);
        }

        $this->collSanitasisRelatedBySumberAirMinumId = $sanitasisRelatedBySumberAirMinumId;
        $this->collSanitasisRelatedBySumberAirMinumIdPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Sanitasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Sanitasi objects.
     * @throws PropelException
     */
    public function countSanitasisRelatedBySumberAirMinumId(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSanitasisRelatedBySumberAirMinumIdPartial && !$this->isNew();
        if (null === $this->collSanitasisRelatedBySumberAirMinumId || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSanitasisRelatedBySumberAirMinumId) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSanitasisRelatedBySumberAirMinumId());
            }
            $query = SanitasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterBySumberAirRelatedBySumberAirMinumId($this)
                ->count($con);
        }

        return count($this->collSanitasisRelatedBySumberAirMinumId);
    }

    /**
     * Method called to associate a Sanitasi object to this object
     * through the Sanitasi foreign key attribute.
     *
     * @param    Sanitasi $l Sanitasi
     * @return SumberAir The current object (for fluent API support)
     */
    public function addSanitasiRelatedBySumberAirMinumId(Sanitasi $l)
    {
        if ($this->collSanitasisRelatedBySumberAirMinumId === null) {
            $this->initSanitasisRelatedBySumberAirMinumId();
            $this->collSanitasisRelatedBySumberAirMinumIdPartial = true;
        }
        if (!in_array($l, $this->collSanitasisRelatedBySumberAirMinumId->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSanitasiRelatedBySumberAirMinumId($l);
        }

        return $this;
    }

    /**
     * @param	SanitasiRelatedBySumberAirMinumId $sanitasiRelatedBySumberAirMinumId The sanitasiRelatedBySumberAirMinumId object to add.
     */
    protected function doAddSanitasiRelatedBySumberAirMinumId($sanitasiRelatedBySumberAirMinumId)
    {
        $this->collSanitasisRelatedBySumberAirMinumId[]= $sanitasiRelatedBySumberAirMinumId;
        $sanitasiRelatedBySumberAirMinumId->setSumberAirRelatedBySumberAirMinumId($this);
    }

    /**
     * @param	SanitasiRelatedBySumberAirMinumId $sanitasiRelatedBySumberAirMinumId The sanitasiRelatedBySumberAirMinumId object to remove.
     * @return SumberAir The current object (for fluent API support)
     */
    public function removeSanitasiRelatedBySumberAirMinumId($sanitasiRelatedBySumberAirMinumId)
    {
        if ($this->getSanitasisRelatedBySumberAirMinumId()->contains($sanitasiRelatedBySumberAirMinumId)) {
            $this->collSanitasisRelatedBySumberAirMinumId->remove($this->collSanitasisRelatedBySumberAirMinumId->search($sanitasiRelatedBySumberAirMinumId));
            if (null === $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion) {
                $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion = clone $this->collSanitasisRelatedBySumberAirMinumId;
                $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion->clear();
            }
            $this->sanitasisRelatedBySumberAirMinumIdScheduledForDeletion[]= clone $sanitasiRelatedBySumberAirMinumId;
            $sanitasiRelatedBySumberAirMinumId->setSumberAirRelatedBySumberAirMinumId(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SumberAir is new, it will return
     * an empty collection; or if this SumberAir has previously
     * been saved, it will retrieve related SanitasisRelatedBySumberAirMinumId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SumberAir.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisRelatedBySumberAirMinumIdJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getSanitasisRelatedBySumberAirMinumId($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this SumberAir is new, it will return
     * an empty collection; or if this SumberAir has previously
     * been saved, it will retrieve related SanitasisRelatedBySumberAirMinumId from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in SumberAir.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Sanitasi[] List of Sanitasi objects
     */
    public function getSanitasisRelatedBySumberAirMinumIdJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = SanitasiQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getSanitasisRelatedBySumberAirMinumId($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sumber_air_id = null;
        $this->nama = null;
        $this->sumber_air = null;
        $this->sumber_minum = null;
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
            if ($this->collSanitasisRelatedBySumberAirId) {
                foreach ($this->collSanitasisRelatedBySumberAirId as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collSanitasisRelatedBySumberAirMinumId) {
                foreach ($this->collSanitasisRelatedBySumberAirMinumId as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSanitasisRelatedBySumberAirId instanceof PropelCollection) {
            $this->collSanitasisRelatedBySumberAirId->clearIterator();
        }
        $this->collSanitasisRelatedBySumberAirId = null;
        if ($this->collSanitasisRelatedBySumberAirMinumId instanceof PropelCollection) {
            $this->collSanitasisRelatedBySumberAirMinumId->clearIterator();
        }
        $this->collSanitasisRelatedBySumberAirMinumId = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SumberAirPeer::DEFAULT_STRING_FORMAT);
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
