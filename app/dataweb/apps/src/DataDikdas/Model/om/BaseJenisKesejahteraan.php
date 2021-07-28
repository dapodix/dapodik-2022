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
use DataDikdas\Model\JenisKesejahteraan;
use DataDikdas\Model\JenisKesejahteraanPeer;
use DataDikdas\Model\JenisKesejahteraanQuery;
use DataDikdas\Model\Kesejahteraan;
use DataDikdas\Model\KesejahteraanPd;
use DataDikdas\Model\KesejahteraanPdQuery;
use DataDikdas\Model\KesejahteraanQuery;

/**
 * Base class that represents a row from the 'ref.jenis_kesejahteraan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisKesejahteraan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisKesejahteraanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisKesejahteraanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_kesejahteraan_id field.
     * @var        int
     */
    protected $jenis_kesejahteraan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the penyelenggara field.
     * @var        string
     */
    protected $penyelenggara;

    /**
     * The value for the u_ptk field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $u_ptk;

    /**
     * The value for the u_pd field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $u_pd;

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
     * @var        PropelObjectCollection|Kesejahteraan[] Collection to store aggregation of Kesejahteraan objects.
     */
    protected $collKesejahteraans;
    protected $collKesejahteraansPartial;

    /**
     * @var        PropelObjectCollection|KesejahteraanPd[] Collection to store aggregation of KesejahteraanPd objects.
     */
    protected $collKesejahteraanPds;
    protected $collKesejahteraanPdsPartial;

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
    protected $kesejahteraansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kesejahteraanPdsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->u_ptk = '1';
        $this->u_pd = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJenisKesejahteraan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenis_kesejahteraan_id] column value.
     * 
     * @return int
     */
    public function getJenisKesejahteraanId()
    {
        return $this->jenis_kesejahteraan_id;
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
     * Get the [penyelenggara] column value.
     * 
     * @return string
     */
    public function getPenyelenggara()
    {
        return $this->penyelenggara;
    }

    /**
     * Get the [u_ptk] column value.
     * 
     * @return string
     */
    public function getUPtk()
    {
        return $this->u_ptk;
    }

    /**
     * Get the [u_pd] column value.
     * 
     * @return string
     */
    public function getUPd()
    {
        return $this->u_pd;
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
     * Set the value of [jenis_kesejahteraan_id] column.
     * 
     * @param int $v new value
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setJenisKesejahteraanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_kesejahteraan_id !== $v) {
            $this->jenis_kesejahteraan_id = $v;
            $this->modifiedColumns[] = JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID;
        }


        return $this;
    } // setJenisKesejahteraanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenisKesejahteraanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [penyelenggara] column.
     * 
     * @param string $v new value
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setPenyelenggara($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penyelenggara !== $v) {
            $this->penyelenggara = $v;
            $this->modifiedColumns[] = JenisKesejahteraanPeer::PENYELENGGARA;
        }


        return $this;
    } // setPenyelenggara()

    /**
     * Set the value of [u_ptk] column.
     * 
     * @param string $v new value
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setUPtk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->u_ptk !== $v) {
            $this->u_ptk = $v;
            $this->modifiedColumns[] = JenisKesejahteraanPeer::U_PTK;
        }


        return $this;
    } // setUPtk()

    /**
     * Set the value of [u_pd] column.
     * 
     * @param string $v new value
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setUPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->u_pd !== $v) {
            $this->u_pd = $v;
            $this->modifiedColumns[] = JenisKesejahteraanPeer::U_PD;
        }


        return $this;
    } // setUPd()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisKesejahteraanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisKesejahteraanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisKesejahteraanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisKesejahteraan The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisKesejahteraanPeer::LAST_SYNC;
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
            if ($this->u_ptk !== '1') {
                return false;
            }

            if ($this->u_pd !== '0') {
                return false;
            }

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

            $this->jenis_kesejahteraan_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->penyelenggara = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->u_ptk = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->u_pd = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->create_date = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->last_update = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->expired_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_sync = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = JenisKesejahteraanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisKesejahteraan object", $e);
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
            $con = Propel::getConnection(JenisKesejahteraanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisKesejahteraanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collKesejahteraans = null;

            $this->collKesejahteraanPds = null;

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
            $con = Propel::getConnection(JenisKesejahteraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisKesejahteraanQuery::create()
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
            $con = Propel::getConnection(JenisKesejahteraanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisKesejahteraanPeer::addInstanceToPool($this);
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

            if ($this->kesejahteraansScheduledForDeletion !== null) {
                if (!$this->kesejahteraansScheduledForDeletion->isEmpty()) {
                    KesejahteraanQuery::create()
                        ->filterByPrimaryKeys($this->kesejahteraansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kesejahteraansScheduledForDeletion = null;
                }
            }

            if ($this->collKesejahteraans !== null) {
                foreach ($this->collKesejahteraans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kesejahteraanPdsScheduledForDeletion !== null) {
                if (!$this->kesejahteraanPdsScheduledForDeletion->isEmpty()) {
                    KesejahteraanPdQuery::create()
                        ->filterByPrimaryKeys($this->kesejahteraanPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kesejahteraanPdsScheduledForDeletion = null;
                }
            }

            if ($this->collKesejahteraanPds !== null) {
                foreach ($this->collKesejahteraanPds as $referrerFK) {
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
        if ($this->isColumnModified(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_kesejahteraan_id"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::PENYELENGGARA)) {
            $modifiedColumns[':p' . $index++]  = '"penyelenggara"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::U_PTK)) {
            $modifiedColumns[':p' . $index++]  = '"u_ptk"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::U_PD)) {
            $modifiedColumns[':p' . $index++]  = '"u_pd"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisKesejahteraanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_kesejahteraan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_kesejahteraan_id"':						
                        $stmt->bindValue($identifier, $this->jenis_kesejahteraan_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"penyelenggara"':						
                        $stmt->bindValue($identifier, $this->penyelenggara, PDO::PARAM_STR);
                        break;
                    case '"u_ptk"':						
                        $stmt->bindValue($identifier, $this->u_ptk, PDO::PARAM_STR);
                        break;
                    case '"u_pd"':						
                        $stmt->bindValue($identifier, $this->u_pd, PDO::PARAM_STR);
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


            if (($retval = JenisKesejahteraanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collKesejahteraans !== null) {
                    foreach ($this->collKesejahteraans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKesejahteraanPds !== null) {
                    foreach ($this->collKesejahteraanPds as $referrerFK) {
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
        $pos = JenisKesejahteraanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisKesejahteraanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getPenyelenggara();
                break;
            case 3:
                return $this->getUPtk();
                break;
            case 4:
                return $this->getUPd();
                break;
            case 5:
                return $this->getCreateDate();
                break;
            case 6:
                return $this->getLastUpdate();
                break;
            case 7:
                return $this->getExpiredDate();
                break;
            case 8:
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
        if (isset($alreadyDumpedObjects['JenisKesejahteraan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisKesejahteraan'][$this->getPrimaryKey()] = true;
        $keys = JenisKesejahteraanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisKesejahteraanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getPenyelenggara(),
            $keys[3] => $this->getUPtk(),
            $keys[4] => $this->getUPd(),
            $keys[5] => $this->getCreateDate(),
            $keys[6] => $this->getLastUpdate(),
            $keys[7] => $this->getExpiredDate(),
            $keys[8] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collKesejahteraans) {
                $result['Kesejahteraans'] = $this->collKesejahteraans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKesejahteraanPds) {
                $result['KesejahteraanPds'] = $this->collKesejahteraanPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisKesejahteraanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisKesejahteraanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setPenyelenggara($value);
                break;
            case 3:
                $this->setUPtk($value);
                break;
            case 4:
                $this->setUPd($value);
                break;
            case 5:
                $this->setCreateDate($value);
                break;
            case 6:
                $this->setLastUpdate($value);
                break;
            case 7:
                $this->setExpiredDate($value);
                break;
            case 8:
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
        $keys = JenisKesejahteraanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisKesejahteraanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPenyelenggara($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setUPtk($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setUPd($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setCreateDate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLastUpdate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExpiredDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastSync($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenisKesejahteraanPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID)) $criteria->add(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $this->jenis_kesejahteraan_id);
        if ($this->isColumnModified(JenisKesejahteraanPeer::NAMA)) $criteria->add(JenisKesejahteraanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenisKesejahteraanPeer::PENYELENGGARA)) $criteria->add(JenisKesejahteraanPeer::PENYELENGGARA, $this->penyelenggara);
        if ($this->isColumnModified(JenisKesejahteraanPeer::U_PTK)) $criteria->add(JenisKesejahteraanPeer::U_PTK, $this->u_ptk);
        if ($this->isColumnModified(JenisKesejahteraanPeer::U_PD)) $criteria->add(JenisKesejahteraanPeer::U_PD, $this->u_pd);
        if ($this->isColumnModified(JenisKesejahteraanPeer::CREATE_DATE)) $criteria->add(JenisKesejahteraanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisKesejahteraanPeer::LAST_UPDATE)) $criteria->add(JenisKesejahteraanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisKesejahteraanPeer::EXPIRED_DATE)) $criteria->add(JenisKesejahteraanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisKesejahteraanPeer::LAST_SYNC)) $criteria->add(JenisKesejahteraanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisKesejahteraanPeer::DATABASE_NAME);
        $criteria->add(JenisKesejahteraanPeer::JENIS_KESEJAHTERAAN_ID, $this->jenis_kesejahteraan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getJenisKesejahteraanId();
    }

    /**
     * Generic method to set the primary key (jenis_kesejahteraan_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisKesejahteraanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisKesejahteraanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisKesejahteraan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setPenyelenggara($this->getPenyelenggara());
        $copyObj->setUPtk($this->getUPtk());
        $copyObj->setUPd($this->getUPd());
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

            foreach ($this->getKesejahteraans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKesejahteraan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKesejahteraanPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKesejahteraanPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisKesejahteraanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisKesejahteraan Clone of current object.
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
     * @return JenisKesejahteraanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisKesejahteraanPeer();
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
        if ('Kesejahteraan' == $relationName) {
            $this->initKesejahteraans();
        }
        if ('KesejahteraanPd' == $relationName) {
            $this->initKesejahteraanPds();
        }
    }

    /**
     * Clears out the collKesejahteraans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisKesejahteraan The current object (for fluent API support)
     * @see        addKesejahteraans()
     */
    public function clearKesejahteraans()
    {
        $this->collKesejahteraans = null; // important to set this to null since that means it is uninitialized
        $this->collKesejahteraansPartial = null;

        return $this;
    }

    /**
     * reset is the collKesejahteraans collection loaded partially
     *
     * @return void
     */
    public function resetPartialKesejahteraans($v = true)
    {
        $this->collKesejahteraansPartial = $v;
    }

    /**
     * Initializes the collKesejahteraans collection.
     *
     * By default this just sets the collKesejahteraans collection to an empty array (like clearcollKesejahteraans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKesejahteraans($overrideExisting = true)
    {
        if (null !== $this->collKesejahteraans && !$overrideExisting) {
            return;
        }
        $this->collKesejahteraans = new PropelObjectCollection();
        $this->collKesejahteraans->setModel('Kesejahteraan');
    }

    /**
     * Gets an array of Kesejahteraan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisKesejahteraan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kesejahteraan[] List of Kesejahteraan objects
     * @throws PropelException
     */
    public function getKesejahteraans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraansPartial && !$this->isNew();
        if (null === $this->collKesejahteraans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraans) {
                // return empty collection
                $this->initKesejahteraans();
            } else {
                $collKesejahteraans = KesejahteraanQuery::create(null, $criteria)
                    ->filterByJenisKesejahteraan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKesejahteraansPartial && count($collKesejahteraans)) {
                      $this->initKesejahteraans(false);

                      foreach($collKesejahteraans as $obj) {
                        if (false == $this->collKesejahteraans->contains($obj)) {
                          $this->collKesejahteraans->append($obj);
                        }
                      }

                      $this->collKesejahteraansPartial = true;
                    }

                    $collKesejahteraans->getInternalIterator()->rewind();
                    return $collKesejahteraans;
                }

                if($partial && $this->collKesejahteraans) {
                    foreach($this->collKesejahteraans as $obj) {
                        if($obj->isNew()) {
                            $collKesejahteraans[] = $obj;
                        }
                    }
                }

                $this->collKesejahteraans = $collKesejahteraans;
                $this->collKesejahteraansPartial = false;
            }
        }

        return $this->collKesejahteraans;
    }

    /**
     * Sets a collection of Kesejahteraan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kesejahteraans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setKesejahteraans(PropelCollection $kesejahteraans, PropelPDO $con = null)
    {
        $kesejahteraansToDelete = $this->getKesejahteraans(new Criteria(), $con)->diff($kesejahteraans);

        $this->kesejahteraansScheduledForDeletion = unserialize(serialize($kesejahteraansToDelete));

        foreach ($kesejahteraansToDelete as $kesejahteraanRemoved) {
            $kesejahteraanRemoved->setJenisKesejahteraan(null);
        }

        $this->collKesejahteraans = null;
        foreach ($kesejahteraans as $kesejahteraan) {
            $this->addKesejahteraan($kesejahteraan);
        }

        $this->collKesejahteraans = $kesejahteraans;
        $this->collKesejahteraansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kesejahteraan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kesejahteraan objects.
     * @throws PropelException
     */
    public function countKesejahteraans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraansPartial && !$this->isNew();
        if (null === $this->collKesejahteraans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKesejahteraans());
            }
            $query = KesejahteraanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisKesejahteraan($this)
                ->count($con);
        }

        return count($this->collKesejahteraans);
    }

    /**
     * Method called to associate a Kesejahteraan object to this object
     * through the Kesejahteraan foreign key attribute.
     *
     * @param    Kesejahteraan $l Kesejahteraan
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function addKesejahteraan(Kesejahteraan $l)
    {
        if ($this->collKesejahteraans === null) {
            $this->initKesejahteraans();
            $this->collKesejahteraansPartial = true;
        }
        if (!in_array($l, $this->collKesejahteraans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKesejahteraan($l);
        }

        return $this;
    }

    /**
     * @param	Kesejahteraan $kesejahteraan The kesejahteraan object to add.
     */
    protected function doAddKesejahteraan($kesejahteraan)
    {
        $this->collKesejahteraans[]= $kesejahteraan;
        $kesejahteraan->setJenisKesejahteraan($this);
    }

    /**
     * @param	Kesejahteraan $kesejahteraan The kesejahteraan object to remove.
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function removeKesejahteraan($kesejahteraan)
    {
        if ($this->getKesejahteraans()->contains($kesejahteraan)) {
            $this->collKesejahteraans->remove($this->collKesejahteraans->search($kesejahteraan));
            if (null === $this->kesejahteraansScheduledForDeletion) {
                $this->kesejahteraansScheduledForDeletion = clone $this->collKesejahteraans;
                $this->kesejahteraansScheduledForDeletion->clear();
            }
            $this->kesejahteraansScheduledForDeletion[]= clone $kesejahteraan;
            $kesejahteraan->setJenisKesejahteraan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisKesejahteraan is new, it will return
     * an empty collection; or if this JenisKesejahteraan has previously
     * been saved, it will retrieve related Kesejahteraans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisKesejahteraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kesejahteraan[] List of Kesejahteraan objects
     */
    public function getKesejahteraansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KesejahteraanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getKesejahteraans($query, $con);
    }

    /**
     * Clears out the collKesejahteraanPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisKesejahteraan The current object (for fluent API support)
     * @see        addKesejahteraanPds()
     */
    public function clearKesejahteraanPds()
    {
        $this->collKesejahteraanPds = null; // important to set this to null since that means it is uninitialized
        $this->collKesejahteraanPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collKesejahteraanPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialKesejahteraanPds($v = true)
    {
        $this->collKesejahteraanPdsPartial = $v;
    }

    /**
     * Initializes the collKesejahteraanPds collection.
     *
     * By default this just sets the collKesejahteraanPds collection to an empty array (like clearcollKesejahteraanPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKesejahteraanPds($overrideExisting = true)
    {
        if (null !== $this->collKesejahteraanPds && !$overrideExisting) {
            return;
        }
        $this->collKesejahteraanPds = new PropelObjectCollection();
        $this->collKesejahteraanPds->setModel('KesejahteraanPd');
    }

    /**
     * Gets an array of KesejahteraanPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisKesejahteraan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|KesejahteraanPd[] List of KesejahteraanPd objects
     * @throws PropelException
     */
    public function getKesejahteraanPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraanPdsPartial && !$this->isNew();
        if (null === $this->collKesejahteraanPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraanPds) {
                // return empty collection
                $this->initKesejahteraanPds();
            } else {
                $collKesejahteraanPds = KesejahteraanPdQuery::create(null, $criteria)
                    ->filterByJenisKesejahteraan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKesejahteraanPdsPartial && count($collKesejahteraanPds)) {
                      $this->initKesejahteraanPds(false);

                      foreach($collKesejahteraanPds as $obj) {
                        if (false == $this->collKesejahteraanPds->contains($obj)) {
                          $this->collKesejahteraanPds->append($obj);
                        }
                      }

                      $this->collKesejahteraanPdsPartial = true;
                    }

                    $collKesejahteraanPds->getInternalIterator()->rewind();
                    return $collKesejahteraanPds;
                }

                if($partial && $this->collKesejahteraanPds) {
                    foreach($this->collKesejahteraanPds as $obj) {
                        if($obj->isNew()) {
                            $collKesejahteraanPds[] = $obj;
                        }
                    }
                }

                $this->collKesejahteraanPds = $collKesejahteraanPds;
                $this->collKesejahteraanPdsPartial = false;
            }
        }

        return $this->collKesejahteraanPds;
    }

    /**
     * Sets a collection of KesejahteraanPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kesejahteraanPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function setKesejahteraanPds(PropelCollection $kesejahteraanPds, PropelPDO $con = null)
    {
        $kesejahteraanPdsToDelete = $this->getKesejahteraanPds(new Criteria(), $con)->diff($kesejahteraanPds);

        $this->kesejahteraanPdsScheduledForDeletion = unserialize(serialize($kesejahteraanPdsToDelete));

        foreach ($kesejahteraanPdsToDelete as $kesejahteraanPdRemoved) {
            $kesejahteraanPdRemoved->setJenisKesejahteraan(null);
        }

        $this->collKesejahteraanPds = null;
        foreach ($kesejahteraanPds as $kesejahteraanPd) {
            $this->addKesejahteraanPd($kesejahteraanPd);
        }

        $this->collKesejahteraanPds = $kesejahteraanPds;
        $this->collKesejahteraanPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related KesejahteraanPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related KesejahteraanPd objects.
     * @throws PropelException
     */
    public function countKesejahteraanPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKesejahteraanPdsPartial && !$this->isNew();
        if (null === $this->collKesejahteraanPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKesejahteraanPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKesejahteraanPds());
            }
            $query = KesejahteraanPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisKesejahteraan($this)
                ->count($con);
        }

        return count($this->collKesejahteraanPds);
    }

    /**
     * Method called to associate a KesejahteraanPd object to this object
     * through the KesejahteraanPd foreign key attribute.
     *
     * @param    KesejahteraanPd $l KesejahteraanPd
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function addKesejahteraanPd(KesejahteraanPd $l)
    {
        if ($this->collKesejahteraanPds === null) {
            $this->initKesejahteraanPds();
            $this->collKesejahteraanPdsPartial = true;
        }
        if (!in_array($l, $this->collKesejahteraanPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKesejahteraanPd($l);
        }

        return $this;
    }

    /**
     * @param	KesejahteraanPd $kesejahteraanPd The kesejahteraanPd object to add.
     */
    protected function doAddKesejahteraanPd($kesejahteraanPd)
    {
        $this->collKesejahteraanPds[]= $kesejahteraanPd;
        $kesejahteraanPd->setJenisKesejahteraan($this);
    }

    /**
     * @param	KesejahteraanPd $kesejahteraanPd The kesejahteraanPd object to remove.
     * @return JenisKesejahteraan The current object (for fluent API support)
     */
    public function removeKesejahteraanPd($kesejahteraanPd)
    {
        if ($this->getKesejahteraanPds()->contains($kesejahteraanPd)) {
            $this->collKesejahteraanPds->remove($this->collKesejahteraanPds->search($kesejahteraanPd));
            if (null === $this->kesejahteraanPdsScheduledForDeletion) {
                $this->kesejahteraanPdsScheduledForDeletion = clone $this->collKesejahteraanPds;
                $this->kesejahteraanPdsScheduledForDeletion->clear();
            }
            $this->kesejahteraanPdsScheduledForDeletion[]= clone $kesejahteraanPd;
            $kesejahteraanPd->setJenisKesejahteraan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisKesejahteraan is new, it will return
     * an empty collection; or if this JenisKesejahteraan has previously
     * been saved, it will retrieve related KesejahteraanPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisKesejahteraan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|KesejahteraanPd[] List of KesejahteraanPd objects
     */
    public function getKesejahteraanPdsJoinPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KesejahteraanPdQuery::create(null, $criteria);
        $query->joinWith('PesertaDidik', $join_behavior);

        return $this->getKesejahteraanPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_kesejahteraan_id = null;
        $this->nama = null;
        $this->penyelenggara = null;
        $this->u_ptk = null;
        $this->u_pd = null;
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
            if ($this->collKesejahteraans) {
                foreach ($this->collKesejahteraans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKesejahteraanPds) {
                foreach ($this->collKesejahteraanPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collKesejahteraans instanceof PropelCollection) {
            $this->collKesejahteraans->clearIterator();
        }
        $this->collKesejahteraans = null;
        if ($this->collKesejahteraanPds instanceof PropelCollection) {
            $this->collKesejahteraanPds->clearIterator();
        }
        $this->collKesejahteraanPds = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisKesejahteraanPeer::DEFAULT_STRING_FORMAT);
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
