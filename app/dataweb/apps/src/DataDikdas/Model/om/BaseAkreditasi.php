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
use DataDikdas\Model\Akreditasi;
use DataDikdas\Model\AkreditasiPeer;
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiProdiQuery;
use DataDikdas\Model\AkreditasiQuery;
use DataDikdas\Model\AkreditasiSp;
use DataDikdas\Model\AkreditasiSpQuery;

/**
 * Base class that represents a row from the 'ref.akreditasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AkreditasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AkreditasiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the akreditasi_id field.
     * @var        string
     */
    protected $akreditasi_id;

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
     * @var        PropelObjectCollection|AkreditasiProdi[] Collection to store aggregation of AkreditasiProdi objects.
     */
    protected $collAkreditasiProdis;
    protected $collAkreditasiProdisPartial;

    /**
     * @var        PropelObjectCollection|AkreditasiSp[] Collection to store aggregation of AkreditasiSp objects.
     */
    protected $collAkreditasiSps;
    protected $collAkreditasiSpsPartial;

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
    protected $akreditasiProdisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $akreditasiSpsScheduledForDeletion = null;

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
     * Initializes internal state of BaseAkreditasi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [akreditasi_id] column value.
     * 
     * @return string
     */
    public function getAkreditasiId()
    {
        return $this->akreditasi_id;
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
     * Set the value of [akreditasi_id] column.
     * 
     * @param string $v new value
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setAkreditasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akreditasi_id !== $v) {
            $this->akreditasi_id = $v;
            $this->modifiedColumns[] = AkreditasiPeer::AKREDITASI_ID;
        }


        return $this;
    } // setAkreditasiId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = AkreditasiPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Akreditasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = AkreditasiPeer::LAST_SYNC;
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

            $this->akreditasi_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
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
            return $startcol + 6; // 6 = AkreditasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Akreditasi object", $e);
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
            $con = Propel::getConnection(AkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AkreditasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAkreditasiProdis = null;

            $this->collAkreditasiSps = null;

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
            $con = Propel::getConnection(AkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AkreditasiQuery::create()
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
            $con = Propel::getConnection(AkreditasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AkreditasiPeer::addInstanceToPool($this);
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

            if ($this->akreditasiProdisScheduledForDeletion !== null) {
                if (!$this->akreditasiProdisScheduledForDeletion->isEmpty()) {
                    AkreditasiProdiQuery::create()
                        ->filterByPrimaryKeys($this->akreditasiProdisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->akreditasiProdisScheduledForDeletion = null;
                }
            }

            if ($this->collAkreditasiProdis !== null) {
                foreach ($this->collAkreditasiProdis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->akreditasiSpsScheduledForDeletion !== null) {
                if (!$this->akreditasiSpsScheduledForDeletion->isEmpty()) {
                    AkreditasiSpQuery::create()
                        ->filterByPrimaryKeys($this->akreditasiSpsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->akreditasiSpsScheduledForDeletion = null;
                }
            }

            if ($this->collAkreditasiSps !== null) {
                foreach ($this->collAkreditasiSps as $referrerFK) {
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
        if ($this->isColumnModified(AkreditasiPeer::AKREDITASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akreditasi_id"';
        }
        if ($this->isColumnModified(AkreditasiPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(AkreditasiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AkreditasiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AkreditasiPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(AkreditasiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."akreditasi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"akreditasi_id"':						
                        $stmt->bindValue($identifier, $this->akreditasi_id, PDO::PARAM_STR);
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


            if (($retval = AkreditasiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAkreditasiProdis !== null) {
                    foreach ($this->collAkreditasiProdis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAkreditasiSps !== null) {
                    foreach ($this->collAkreditasiSps as $referrerFK) {
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
        $pos = AkreditasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAkreditasiId();
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
        if (isset($alreadyDumpedObjects['Akreditasi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Akreditasi'][$this->getPrimaryKey()] = true;
        $keys = AkreditasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAkreditasiId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getCreateDate(),
            $keys[3] => $this->getLastUpdate(),
            $keys[4] => $this->getExpiredDate(),
            $keys[5] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAkreditasiProdis) {
                $result['AkreditasiProdis'] = $this->collAkreditasiProdis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAkreditasiSps) {
                $result['AkreditasiSps'] = $this->collAkreditasiSps->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AkreditasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAkreditasiId($value);
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
        $keys = AkreditasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAkreditasiId($arr[$keys[0]]);
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
        $criteria = new Criteria(AkreditasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(AkreditasiPeer::AKREDITASI_ID)) $criteria->add(AkreditasiPeer::AKREDITASI_ID, $this->akreditasi_id);
        if ($this->isColumnModified(AkreditasiPeer::NAMA)) $criteria->add(AkreditasiPeer::NAMA, $this->nama);
        if ($this->isColumnModified(AkreditasiPeer::CREATE_DATE)) $criteria->add(AkreditasiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AkreditasiPeer::LAST_UPDATE)) $criteria->add(AkreditasiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AkreditasiPeer::EXPIRED_DATE)) $criteria->add(AkreditasiPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(AkreditasiPeer::LAST_SYNC)) $criteria->add(AkreditasiPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(AkreditasiPeer::DATABASE_NAME);
        $criteria->add(AkreditasiPeer::AKREDITASI_ID, $this->akreditasi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getAkreditasiId();
    }

    /**
     * Generic method to set the primary key (akreditasi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAkreditasiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAkreditasiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Akreditasi (or compatible) type.
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

            foreach ($this->getAkreditasiProdis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAkreditasiProdi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAkreditasiSps() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAkreditasiSp($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAkreditasiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Akreditasi Clone of current object.
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
     * @return AkreditasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AkreditasiPeer();
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
        if ('AkreditasiProdi' == $relationName) {
            $this->initAkreditasiProdis();
        }
        if ('AkreditasiSp' == $relationName) {
            $this->initAkreditasiSps();
        }
    }

    /**
     * Clears out the collAkreditasiProdis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Akreditasi The current object (for fluent API support)
     * @see        addAkreditasiProdis()
     */
    public function clearAkreditasiProdis()
    {
        $this->collAkreditasiProdis = null; // important to set this to null since that means it is uninitialized
        $this->collAkreditasiProdisPartial = null;

        return $this;
    }

    /**
     * reset is the collAkreditasiProdis collection loaded partially
     *
     * @return void
     */
    public function resetPartialAkreditasiProdis($v = true)
    {
        $this->collAkreditasiProdisPartial = $v;
    }

    /**
     * Initializes the collAkreditasiProdis collection.
     *
     * By default this just sets the collAkreditasiProdis collection to an empty array (like clearcollAkreditasiProdis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAkreditasiProdis($overrideExisting = true)
    {
        if (null !== $this->collAkreditasiProdis && !$overrideExisting) {
            return;
        }
        $this->collAkreditasiProdis = new PropelObjectCollection();
        $this->collAkreditasiProdis->setModel('AkreditasiProdi');
    }

    /**
     * Gets an array of AkreditasiProdi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Akreditasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     * @throws PropelException
     */
    public function getAkreditasiProdis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiProdisPartial && !$this->isNew();
        if (null === $this->collAkreditasiProdis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiProdis) {
                // return empty collection
                $this->initAkreditasiProdis();
            } else {
                $collAkreditasiProdis = AkreditasiProdiQuery::create(null, $criteria)
                    ->filterByAkreditasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAkreditasiProdisPartial && count($collAkreditasiProdis)) {
                      $this->initAkreditasiProdis(false);

                      foreach($collAkreditasiProdis as $obj) {
                        if (false == $this->collAkreditasiProdis->contains($obj)) {
                          $this->collAkreditasiProdis->append($obj);
                        }
                      }

                      $this->collAkreditasiProdisPartial = true;
                    }

                    $collAkreditasiProdis->getInternalIterator()->rewind();
                    return $collAkreditasiProdis;
                }

                if($partial && $this->collAkreditasiProdis) {
                    foreach($this->collAkreditasiProdis as $obj) {
                        if($obj->isNew()) {
                            $collAkreditasiProdis[] = $obj;
                        }
                    }
                }

                $this->collAkreditasiProdis = $collAkreditasiProdis;
                $this->collAkreditasiProdisPartial = false;
            }
        }

        return $this->collAkreditasiProdis;
    }

    /**
     * Sets a collection of AkreditasiProdi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $akreditasiProdis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setAkreditasiProdis(PropelCollection $akreditasiProdis, PropelPDO $con = null)
    {
        $akreditasiProdisToDelete = $this->getAkreditasiProdis(new Criteria(), $con)->diff($akreditasiProdis);

        $this->akreditasiProdisScheduledForDeletion = unserialize(serialize($akreditasiProdisToDelete));

        foreach ($akreditasiProdisToDelete as $akreditasiProdiRemoved) {
            $akreditasiProdiRemoved->setAkreditasi(null);
        }

        $this->collAkreditasiProdis = null;
        foreach ($akreditasiProdis as $akreditasiProdi) {
            $this->addAkreditasiProdi($akreditasiProdi);
        }

        $this->collAkreditasiProdis = $akreditasiProdis;
        $this->collAkreditasiProdisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AkreditasiProdi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AkreditasiProdi objects.
     * @throws PropelException
     */
    public function countAkreditasiProdis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiProdisPartial && !$this->isNew();
        if (null === $this->collAkreditasiProdis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiProdis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAkreditasiProdis());
            }
            $query = AkreditasiProdiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAkreditasi($this)
                ->count($con);
        }

        return count($this->collAkreditasiProdis);
    }

    /**
     * Method called to associate a AkreditasiProdi object to this object
     * through the AkreditasiProdi foreign key attribute.
     *
     * @param    AkreditasiProdi $l AkreditasiProdi
     * @return Akreditasi The current object (for fluent API support)
     */
    public function addAkreditasiProdi(AkreditasiProdi $l)
    {
        if ($this->collAkreditasiProdis === null) {
            $this->initAkreditasiProdis();
            $this->collAkreditasiProdisPartial = true;
        }
        if (!in_array($l, $this->collAkreditasiProdis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAkreditasiProdi($l);
        }

        return $this;
    }

    /**
     * @param	AkreditasiProdi $akreditasiProdi The akreditasiProdi object to add.
     */
    protected function doAddAkreditasiProdi($akreditasiProdi)
    {
        $this->collAkreditasiProdis[]= $akreditasiProdi;
        $akreditasiProdi->setAkreditasi($this);
    }

    /**
     * @param	AkreditasiProdi $akreditasiProdi The akreditasiProdi object to remove.
     * @return Akreditasi The current object (for fluent API support)
     */
    public function removeAkreditasiProdi($akreditasiProdi)
    {
        if ($this->getAkreditasiProdis()->contains($akreditasiProdi)) {
            $this->collAkreditasiProdis->remove($this->collAkreditasiProdis->search($akreditasiProdi));
            if (null === $this->akreditasiProdisScheduledForDeletion) {
                $this->akreditasiProdisScheduledForDeletion = clone $this->collAkreditasiProdis;
                $this->akreditasiProdisScheduledForDeletion->clear();
            }
            $this->akreditasiProdisScheduledForDeletion[]= clone $akreditasiProdi;
            $akreditasiProdi->setAkreditasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Akreditasi is new, it will return
     * an empty collection; or if this Akreditasi has previously
     * been saved, it will retrieve related AkreditasiProdis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Akreditasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     */
    public function getAkreditasiProdisJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiProdiQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getAkreditasiProdis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Akreditasi is new, it will return
     * an empty collection; or if this Akreditasi has previously
     * been saved, it will retrieve related AkreditasiProdis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Akreditasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiProdi[] List of AkreditasiProdi objects
     */
    public function getAkreditasiProdisJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiProdiQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getAkreditasiProdis($query, $con);
    }

    /**
     * Clears out the collAkreditasiSps collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Akreditasi The current object (for fluent API support)
     * @see        addAkreditasiSps()
     */
    public function clearAkreditasiSps()
    {
        $this->collAkreditasiSps = null; // important to set this to null since that means it is uninitialized
        $this->collAkreditasiSpsPartial = null;

        return $this;
    }

    /**
     * reset is the collAkreditasiSps collection loaded partially
     *
     * @return void
     */
    public function resetPartialAkreditasiSps($v = true)
    {
        $this->collAkreditasiSpsPartial = $v;
    }

    /**
     * Initializes the collAkreditasiSps collection.
     *
     * By default this just sets the collAkreditasiSps collection to an empty array (like clearcollAkreditasiSps());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAkreditasiSps($overrideExisting = true)
    {
        if (null !== $this->collAkreditasiSps && !$overrideExisting) {
            return;
        }
        $this->collAkreditasiSps = new PropelObjectCollection();
        $this->collAkreditasiSps->setModel('AkreditasiSp');
    }

    /**
     * Gets an array of AkreditasiSp objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Akreditasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     * @throws PropelException
     */
    public function getAkreditasiSps($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiSpsPartial && !$this->isNew();
        if (null === $this->collAkreditasiSps || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiSps) {
                // return empty collection
                $this->initAkreditasiSps();
            } else {
                $collAkreditasiSps = AkreditasiSpQuery::create(null, $criteria)
                    ->filterByAkreditasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAkreditasiSpsPartial && count($collAkreditasiSps)) {
                      $this->initAkreditasiSps(false);

                      foreach($collAkreditasiSps as $obj) {
                        if (false == $this->collAkreditasiSps->contains($obj)) {
                          $this->collAkreditasiSps->append($obj);
                        }
                      }

                      $this->collAkreditasiSpsPartial = true;
                    }

                    $collAkreditasiSps->getInternalIterator()->rewind();
                    return $collAkreditasiSps;
                }

                if($partial && $this->collAkreditasiSps) {
                    foreach($this->collAkreditasiSps as $obj) {
                        if($obj->isNew()) {
                            $collAkreditasiSps[] = $obj;
                        }
                    }
                }

                $this->collAkreditasiSps = $collAkreditasiSps;
                $this->collAkreditasiSpsPartial = false;
            }
        }

        return $this->collAkreditasiSps;
    }

    /**
     * Sets a collection of AkreditasiSp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $akreditasiSps A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Akreditasi The current object (for fluent API support)
     */
    public function setAkreditasiSps(PropelCollection $akreditasiSps, PropelPDO $con = null)
    {
        $akreditasiSpsToDelete = $this->getAkreditasiSps(new Criteria(), $con)->diff($akreditasiSps);

        $this->akreditasiSpsScheduledForDeletion = unserialize(serialize($akreditasiSpsToDelete));

        foreach ($akreditasiSpsToDelete as $akreditasiSpRemoved) {
            $akreditasiSpRemoved->setAkreditasi(null);
        }

        $this->collAkreditasiSps = null;
        foreach ($akreditasiSps as $akreditasiSp) {
            $this->addAkreditasiSp($akreditasiSp);
        }

        $this->collAkreditasiSps = $akreditasiSps;
        $this->collAkreditasiSpsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AkreditasiSp objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AkreditasiSp objects.
     * @throws PropelException
     */
    public function countAkreditasiSps(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAkreditasiSpsPartial && !$this->isNew();
        if (null === $this->collAkreditasiSps || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAkreditasiSps) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAkreditasiSps());
            }
            $query = AkreditasiSpQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAkreditasi($this)
                ->count($con);
        }

        return count($this->collAkreditasiSps);
    }

    /**
     * Method called to associate a AkreditasiSp object to this object
     * through the AkreditasiSp foreign key attribute.
     *
     * @param    AkreditasiSp $l AkreditasiSp
     * @return Akreditasi The current object (for fluent API support)
     */
    public function addAkreditasiSp(AkreditasiSp $l)
    {
        if ($this->collAkreditasiSps === null) {
            $this->initAkreditasiSps();
            $this->collAkreditasiSpsPartial = true;
        }
        if (!in_array($l, $this->collAkreditasiSps->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAkreditasiSp($l);
        }

        return $this;
    }

    /**
     * @param	AkreditasiSp $akreditasiSp The akreditasiSp object to add.
     */
    protected function doAddAkreditasiSp($akreditasiSp)
    {
        $this->collAkreditasiSps[]= $akreditasiSp;
        $akreditasiSp->setAkreditasi($this);
    }

    /**
     * @param	AkreditasiSp $akreditasiSp The akreditasiSp object to remove.
     * @return Akreditasi The current object (for fluent API support)
     */
    public function removeAkreditasiSp($akreditasiSp)
    {
        if ($this->getAkreditasiSps()->contains($akreditasiSp)) {
            $this->collAkreditasiSps->remove($this->collAkreditasiSps->search($akreditasiSp));
            if (null === $this->akreditasiSpsScheduledForDeletion) {
                $this->akreditasiSpsScheduledForDeletion = clone $this->collAkreditasiSps;
                $this->akreditasiSpsScheduledForDeletion->clear();
            }
            $this->akreditasiSpsScheduledForDeletion[]= clone $akreditasiSp;
            $akreditasiSp->setAkreditasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Akreditasi is new, it will return
     * an empty collection; or if this Akreditasi has previously
     * been saved, it will retrieve related AkreditasiSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Akreditasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     */
    public function getAkreditasiSpsJoinLembagaAkreditasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiSpQuery::create(null, $criteria);
        $query->joinWith('LembagaAkreditasi', $join_behavior);

        return $this->getAkreditasiSps($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Akreditasi is new, it will return
     * an empty collection; or if this Akreditasi has previously
     * been saved, it will retrieve related AkreditasiSps from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Akreditasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AkreditasiSp[] List of AkreditasiSp objects
     */
    public function getAkreditasiSpsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AkreditasiSpQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAkreditasiSps($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->akreditasi_id = null;
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
            if ($this->collAkreditasiProdis) {
                foreach ($this->collAkreditasiProdis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAkreditasiSps) {
                foreach ($this->collAkreditasiSps as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAkreditasiProdis instanceof PropelCollection) {
            $this->collAkreditasiProdis->clearIterator();
        }
        $this->collAkreditasiProdis = null;
        if ($this->collAkreditasiSps instanceof PropelCollection) {
            $this->collAkreditasiSps->clearIterator();
        }
        $this->collAkreditasiSps = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AkreditasiPeer::DEFAULT_STRING_FORMAT);
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
