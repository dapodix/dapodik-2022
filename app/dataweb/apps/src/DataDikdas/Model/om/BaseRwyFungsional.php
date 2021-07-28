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
use DataDikdas\Model\JabatanFungsional;
use DataDikdas\Model\JabatanFungsionalQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\RwyFungsional;
use DataDikdas\Model\RwyFungsionalPeer;
use DataDikdas\Model\RwyFungsionalQuery;
use DataDikdas\Model\VldRwyFungsional;
use DataDikdas\Model\VldRwyFungsionalQuery;

/**
 * Base class that represents a row from the 'rwy_fungsional' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseRwyFungsional extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\RwyFungsionalPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        RwyFungsionalPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the riwayat_fungsional_id field.
     * @var        string
     */
    protected $riwayat_fungsional_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the jabatan_fungsional_id field.
     * @var        string
     */
    protected $jabatan_fungsional_id;

    /**
     * The value for the sk_jabfung field.
     * @var        string
     */
    protected $sk_jabfung;

    /**
     * The value for the tmt_jabatan field.
     * @var        string
     */
    protected $tmt_jabatan;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

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
     * The value for the soft_delete field.
     * @var        string
     */
    protected $soft_delete;

    /**
     * The value for the last_sync field.
     * Note: this column has a database default value of: '1901-01-01 00:00:00'
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        JabatanFungsional
     */
    protected $aJabatanFungsional;

    /**
     * @var        PropelObjectCollection|VldRwyFungsional[] Collection to store aggregation of VldRwyFungsional objects.
     */
    protected $collVldRwyFungsionals;
    protected $collVldRwyFungsionalsPartial;

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
    protected $vldRwyFungsionalsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseRwyFungsional object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [riwayat_fungsional_id] column value.
     * 
     * @return string
     */
    public function getRiwayatFungsionalId()
    {
        return $this->riwayat_fungsional_id;
    }

    /**
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
    }

    /**
     * Get the [jabatan_fungsional_id] column value.
     * 
     * @return string
     */
    public function getJabatanFungsionalId()
    {
        return $this->jabatan_fungsional_id;
    }

    /**
     * Get the [sk_jabfung] column value.
     * 
     * @return string
     */
    public function getSkJabfung()
    {
        return $this->sk_jabfung;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_jabatan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtJabatan($format = '%Y-%m-%d')
    {
        if ($this->tmt_jabatan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_jabatan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_jabatan, true), $x);
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
     * Get the [asal_data] column value.
     * 
     * @return string
     */
    public function getAsalData()
    {
        return $this->asal_data;
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
     * Get the [soft_delete] column value.
     * 
     * @return string
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
    }

    /**
     * Set the value of [riwayat_fungsional_id] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setRiwayatFungsionalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->riwayat_fungsional_id !== $v) {
            $this->riwayat_fungsional_id = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID;
        }


        return $this;
    } // setRiwayatFungsionalId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [jabatan_fungsional_id] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setJabatanFungsionalId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_fungsional_id !== $v) {
            $this->jabatan_fungsional_id = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID;
        }

        if ($this->aJabatanFungsional !== null && $this->aJabatanFungsional->getJabatanFungsionalId() !== $v) {
            $this->aJabatanFungsional = null;
        }


        return $this;
    } // setJabatanFungsionalId()

    /**
     * Set the value of [sk_jabfung] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setSkJabfung($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_jabfung !== $v) {
            $this->sk_jabfung = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::SK_JABFUNG;
        }


        return $this;
    } // setSkJabfung()

    /**
     * Sets the value of [tmt_jabatan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setTmtJabatan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_jabatan !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_jabatan !== null && $tmpDt = new DateTime($this->tmt_jabatan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_jabatan = $newDateAsString;
                $this->modifiedColumns[] = RwyFungsionalPeer::TMT_JABATAN;
            }
        } // if either are not null


        return $this;
    } // setTmtJabatan()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = RwyFungsionalPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = RwyFungsionalPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return RwyFungsional The current object (for fluent API support)
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
                $this->modifiedColumns[] = RwyFungsionalPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = RwyFungsionalPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

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
            if ($this->asal_data !== '1') {
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

            $this->riwayat_fungsional_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jabatan_fungsional_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sk_jabfung = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tmt_jabatan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->asal_data = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->create_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_update = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->soft_delete = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_sync = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->updater_id = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 11; // 11 = RwyFungsionalPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating RwyFungsional object", $e);
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

        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aJabatanFungsional !== null && $this->jabatan_fungsional_id !== $this->aJabatanFungsional->getJabatanFungsionalId()) {
            $this->aJabatanFungsional = null;
        }
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
            $con = Propel::getConnection(RwyFungsionalPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = RwyFungsionalPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aJabatanFungsional = null;
            $this->collVldRwyFungsionals = null;

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
            $con = Propel::getConnection(RwyFungsionalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = RwyFungsionalQuery::create()
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
            $con = Propel::getConnection(RwyFungsionalPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                RwyFungsionalPeer::addInstanceToPool($this);
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

            // We call the save method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aJabatanFungsional !== null) {
                if ($this->aJabatanFungsional->isModified() || $this->aJabatanFungsional->isNew()) {
                    $affectedRows += $this->aJabatanFungsional->save($con);
                }
                $this->setJabatanFungsional($this->aJabatanFungsional);
            }

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

            if ($this->vldRwyFungsionalsScheduledForDeletion !== null) {
                if (!$this->vldRwyFungsionalsScheduledForDeletion->isEmpty()) {
                    VldRwyFungsionalQuery::create()
                        ->filterByPrimaryKeys($this->vldRwyFungsionalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldRwyFungsionalsScheduledForDeletion = null;
                }
            }

            if ($this->collVldRwyFungsionals !== null) {
                foreach ($this->collVldRwyFungsionals as $referrerFK) {
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
        if ($this->isColumnModified(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"riwayat_fungsional_id"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_fungsional_id"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::SK_JABFUNG)) {
            $modifiedColumns[':p' . $index++]  = '"sk_jabfung"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::TMT_JABATAN)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_jabatan"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(RwyFungsionalPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "rwy_fungsional" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"riwayat_fungsional_id"':						
                        $stmt->bindValue($identifier, $this->riwayat_fungsional_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"jabatan_fungsional_id"':						
                        $stmt->bindValue($identifier, $this->jabatan_fungsional_id, PDO::PARAM_STR);
                        break;
                    case '"sk_jabfung"':						
                        $stmt->bindValue($identifier, $this->sk_jabfung, PDO::PARAM_STR);
                        break;
                    case '"tmt_jabatan"':						
                        $stmt->bindValue($identifier, $this->tmt_jabatan, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aJabatanFungsional !== null) {
                if (!$this->aJabatanFungsional->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJabatanFungsional->getValidationFailures());
                }
            }


            if (($retval = RwyFungsionalPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldRwyFungsionals !== null) {
                    foreach ($this->collVldRwyFungsionals as $referrerFK) {
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
        $pos = RwyFungsionalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRiwayatFungsionalId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getJabatanFungsionalId();
                break;
            case 3:
                return $this->getSkJabfung();
                break;
            case 4:
                return $this->getTmtJabatan();
                break;
            case 5:
                return $this->getAsalData();
                break;
            case 6:
                return $this->getCreateDate();
                break;
            case 7:
                return $this->getLastUpdate();
                break;
            case 8:
                return $this->getSoftDelete();
                break;
            case 9:
                return $this->getLastSync();
                break;
            case 10:
                return $this->getUpdaterId();
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
        if (isset($alreadyDumpedObjects['RwyFungsional'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['RwyFungsional'][$this->getPrimaryKey()] = true;
        $keys = RwyFungsionalPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRiwayatFungsionalId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getJabatanFungsionalId(),
            $keys[3] => $this->getSkJabfung(),
            $keys[4] => $this->getTmtJabatan(),
            $keys[5] => $this->getAsalData(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getSoftDelete(),
            $keys[9] => $this->getLastSync(),
            $keys[10] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJabatanFungsional) {
                $result['JabatanFungsional'] = $this->aJabatanFungsional->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldRwyFungsionals) {
                $result['VldRwyFungsionals'] = $this->collVldRwyFungsionals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = RwyFungsionalPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRiwayatFungsionalId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setJabatanFungsionalId($value);
                break;
            case 3:
                $this->setSkJabfung($value);
                break;
            case 4:
                $this->setTmtJabatan($value);
                break;
            case 5:
                $this->setAsalData($value);
                break;
            case 6:
                $this->setCreateDate($value);
                break;
            case 7:
                $this->setLastUpdate($value);
                break;
            case 8:
                $this->setSoftDelete($value);
                break;
            case 9:
                $this->setLastSync($value);
                break;
            case 10:
                $this->setUpdaterId($value);
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
        $keys = RwyFungsionalPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRiwayatFungsionalId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJabatanFungsionalId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSkJabfung($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTmtJabatan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAsalData($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreateDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastUpdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSoftDelete($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastSync($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setUpdaterId($arr[$keys[10]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(RwyFungsionalPeer::DATABASE_NAME);

        if ($this->isColumnModified(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID)) $criteria->add(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $this->riwayat_fungsional_id);
        if ($this->isColumnModified(RwyFungsionalPeer::PTK_ID)) $criteria->add(RwyFungsionalPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID)) $criteria->add(RwyFungsionalPeer::JABATAN_FUNGSIONAL_ID, $this->jabatan_fungsional_id);
        if ($this->isColumnModified(RwyFungsionalPeer::SK_JABFUNG)) $criteria->add(RwyFungsionalPeer::SK_JABFUNG, $this->sk_jabfung);
        if ($this->isColumnModified(RwyFungsionalPeer::TMT_JABATAN)) $criteria->add(RwyFungsionalPeer::TMT_JABATAN, $this->tmt_jabatan);
        if ($this->isColumnModified(RwyFungsionalPeer::ASAL_DATA)) $criteria->add(RwyFungsionalPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(RwyFungsionalPeer::CREATE_DATE)) $criteria->add(RwyFungsionalPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(RwyFungsionalPeer::LAST_UPDATE)) $criteria->add(RwyFungsionalPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(RwyFungsionalPeer::SOFT_DELETE)) $criteria->add(RwyFungsionalPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(RwyFungsionalPeer::LAST_SYNC)) $criteria->add(RwyFungsionalPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(RwyFungsionalPeer::UPDATER_ID)) $criteria->add(RwyFungsionalPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(RwyFungsionalPeer::DATABASE_NAME);
        $criteria->add(RwyFungsionalPeer::RIWAYAT_FUNGSIONAL_ID, $this->riwayat_fungsional_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRiwayatFungsionalId();
    }

    /**
     * Generic method to set the primary key (riwayat_fungsional_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRiwayatFungsionalId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRiwayatFungsionalId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of RwyFungsional (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setJabatanFungsionalId($this->getJabatanFungsionalId());
        $copyObj->setSkJabfung($this->getSkJabfung());
        $copyObj->setTmtJabatan($this->getTmtJabatan());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getVldRwyFungsionals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldRwyFungsional($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRiwayatFungsionalId(NULL); // this is a auto-increment column, so set to default value
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
     * @return RwyFungsional Clone of current object.
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
     * @return RwyFungsionalPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new RwyFungsionalPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return RwyFungsional The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtk(Ptk $v = null)
    {
        if ($v === null) {
            $this->setPtkId(NULL);
        } else {
            $this->setPtkId($v->getPtkId());
        }

        $this->aPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ptk object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyFungsional($this);
        }


        return $this;
    }


    /**
     * Get the associated Ptk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ptk The associated Ptk object.
     * @throws PropelException
     */
    public function getPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtk === null && (($this->ptk_id !== "" && $this->ptk_id !== null)) && $doQuery) {
            $this->aPtk = PtkQuery::create()->findPk($this->ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtk->addRwyFungsionals($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a JabatanFungsional object.
     *
     * @param             JabatanFungsional $v
     * @return RwyFungsional The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJabatanFungsional(JabatanFungsional $v = null)
    {
        if ($v === null) {
            $this->setJabatanFungsionalId(NULL);
        } else {
            $this->setJabatanFungsionalId($v->getJabatanFungsionalId());
        }

        $this->aJabatanFungsional = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JabatanFungsional object, it will not be re-added.
        if ($v !== null) {
            $v->addRwyFungsional($this);
        }


        return $this;
    }


    /**
     * Get the associated JabatanFungsional object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JabatanFungsional The associated JabatanFungsional object.
     * @throws PropelException
     */
    public function getJabatanFungsional(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJabatanFungsional === null && (($this->jabatan_fungsional_id !== "" && $this->jabatan_fungsional_id !== null)) && $doQuery) {
            $this->aJabatanFungsional = JabatanFungsionalQuery::create()->findPk($this->jabatan_fungsional_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJabatanFungsional->addRwyFungsionals($this);
             */
        }

        return $this->aJabatanFungsional;
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
        if ('VldRwyFungsional' == $relationName) {
            $this->initVldRwyFungsionals();
        }
    }

    /**
     * Clears out the collVldRwyFungsionals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return RwyFungsional The current object (for fluent API support)
     * @see        addVldRwyFungsionals()
     */
    public function clearVldRwyFungsionals()
    {
        $this->collVldRwyFungsionals = null; // important to set this to null since that means it is uninitialized
        $this->collVldRwyFungsionalsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldRwyFungsionals collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldRwyFungsionals($v = true)
    {
        $this->collVldRwyFungsionalsPartial = $v;
    }

    /**
     * Initializes the collVldRwyFungsionals collection.
     *
     * By default this just sets the collVldRwyFungsionals collection to an empty array (like clearcollVldRwyFungsionals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldRwyFungsionals($overrideExisting = true)
    {
        if (null !== $this->collVldRwyFungsionals && !$overrideExisting) {
            return;
        }
        $this->collVldRwyFungsionals = new PropelObjectCollection();
        $this->collVldRwyFungsionals->setModel('VldRwyFungsional');
    }

    /**
     * Gets an array of VldRwyFungsional objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this RwyFungsional is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldRwyFungsional[] List of VldRwyFungsional objects
     * @throws PropelException
     */
    public function getVldRwyFungsionals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collVldRwyFungsionals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldRwyFungsionals) {
                // return empty collection
                $this->initVldRwyFungsionals();
            } else {
                $collVldRwyFungsionals = VldRwyFungsionalQuery::create(null, $criteria)
                    ->filterByRwyFungsional($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldRwyFungsionalsPartial && count($collVldRwyFungsionals)) {
                      $this->initVldRwyFungsionals(false);

                      foreach($collVldRwyFungsionals as $obj) {
                        if (false == $this->collVldRwyFungsionals->contains($obj)) {
                          $this->collVldRwyFungsionals->append($obj);
                        }
                      }

                      $this->collVldRwyFungsionalsPartial = true;
                    }

                    $collVldRwyFungsionals->getInternalIterator()->rewind();
                    return $collVldRwyFungsionals;
                }

                if($partial && $this->collVldRwyFungsionals) {
                    foreach($this->collVldRwyFungsionals as $obj) {
                        if($obj->isNew()) {
                            $collVldRwyFungsionals[] = $obj;
                        }
                    }
                }

                $this->collVldRwyFungsionals = $collVldRwyFungsionals;
                $this->collVldRwyFungsionalsPartial = false;
            }
        }

        return $this->collVldRwyFungsionals;
    }

    /**
     * Sets a collection of VldRwyFungsional objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldRwyFungsionals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function setVldRwyFungsionals(PropelCollection $vldRwyFungsionals, PropelPDO $con = null)
    {
        $vldRwyFungsionalsToDelete = $this->getVldRwyFungsionals(new Criteria(), $con)->diff($vldRwyFungsionals);

        $this->vldRwyFungsionalsScheduledForDeletion = unserialize(serialize($vldRwyFungsionalsToDelete));

        foreach ($vldRwyFungsionalsToDelete as $vldRwyFungsionalRemoved) {
            $vldRwyFungsionalRemoved->setRwyFungsional(null);
        }

        $this->collVldRwyFungsionals = null;
        foreach ($vldRwyFungsionals as $vldRwyFungsional) {
            $this->addVldRwyFungsional($vldRwyFungsional);
        }

        $this->collVldRwyFungsionals = $vldRwyFungsionals;
        $this->collVldRwyFungsionalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldRwyFungsional objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldRwyFungsional objects.
     * @throws PropelException
     */
    public function countVldRwyFungsionals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldRwyFungsionalsPartial && !$this->isNew();
        if (null === $this->collVldRwyFungsionals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldRwyFungsionals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldRwyFungsionals());
            }
            $query = VldRwyFungsionalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByRwyFungsional($this)
                ->count($con);
        }

        return count($this->collVldRwyFungsionals);
    }

    /**
     * Method called to associate a VldRwyFungsional object to this object
     * through the VldRwyFungsional foreign key attribute.
     *
     * @param    VldRwyFungsional $l VldRwyFungsional
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function addVldRwyFungsional(VldRwyFungsional $l)
    {
        if ($this->collVldRwyFungsionals === null) {
            $this->initVldRwyFungsionals();
            $this->collVldRwyFungsionalsPartial = true;
        }
        if (!in_array($l, $this->collVldRwyFungsionals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldRwyFungsional($l);
        }

        return $this;
    }

    /**
     * @param	VldRwyFungsional $vldRwyFungsional The vldRwyFungsional object to add.
     */
    protected function doAddVldRwyFungsional($vldRwyFungsional)
    {
        $this->collVldRwyFungsionals[]= $vldRwyFungsional;
        $vldRwyFungsional->setRwyFungsional($this);
    }

    /**
     * @param	VldRwyFungsional $vldRwyFungsional The vldRwyFungsional object to remove.
     * @return RwyFungsional The current object (for fluent API support)
     */
    public function removeVldRwyFungsional($vldRwyFungsional)
    {
        if ($this->getVldRwyFungsionals()->contains($vldRwyFungsional)) {
            $this->collVldRwyFungsionals->remove($this->collVldRwyFungsionals->search($vldRwyFungsional));
            if (null === $this->vldRwyFungsionalsScheduledForDeletion) {
                $this->vldRwyFungsionalsScheduledForDeletion = clone $this->collVldRwyFungsionals;
                $this->vldRwyFungsionalsScheduledForDeletion->clear();
            }
            $this->vldRwyFungsionalsScheduledForDeletion[]= clone $vldRwyFungsional;
            $vldRwyFungsional->setRwyFungsional(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this RwyFungsional is new, it will return
     * an empty collection; or if this RwyFungsional has previously
     * been saved, it will retrieve related VldRwyFungsionals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in RwyFungsional.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldRwyFungsional[] List of VldRwyFungsional objects
     */
    public function getVldRwyFungsionalsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldRwyFungsionalQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldRwyFungsionals($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->riwayat_fungsional_id = null;
        $this->ptk_id = null;
        $this->jabatan_fungsional_id = null;
        $this->sk_jabfung = null;
        $this->tmt_jabatan = null;
        $this->asal_data = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->soft_delete = null;
        $this->last_sync = null;
        $this->updater_id = null;
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
            if ($this->collVldRwyFungsionals) {
                foreach ($this->collVldRwyFungsionals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aJabatanFungsional instanceof Persistent) {
              $this->aJabatanFungsional->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldRwyFungsionals instanceof PropelCollection) {
            $this->collVldRwyFungsionals->clearIterator();
        }
        $this->collVldRwyFungsionals = null;
        $this->aPtk = null;
        $this->aJabatanFungsional = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(RwyFungsionalPeer::DEFAULT_STRING_FORMAT);
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
