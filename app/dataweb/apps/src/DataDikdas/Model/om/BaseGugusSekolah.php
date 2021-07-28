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
use DataDikdas\Model\AnggotaGugus;
use DataDikdas\Model\AnggotaGugusQuery;
use DataDikdas\Model\GugusSekolah;
use DataDikdas\Model\GugusSekolahPeer;
use DataDikdas\Model\GugusSekolahQuery;
use DataDikdas\Model\JenisGugus;
use DataDikdas\Model\JenisGugusQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;

/**
 * Base class that represents a row from the 'gugus_sekolah' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseGugusSekolah extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\GugusSekolahPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        GugusSekolahPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the gugus_id field.
     * @var        string
     */
    protected $gugus_id;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the sk_gugus field.
     * @var        string
     */
    protected $sk_gugus;

    /**
     * The value for the jenis_gugus_id field.
     * @var        string
     */
    protected $jenis_gugus_id;

    /**
     * The value for the sekolah_inti_id field.
     * @var        string
     */
    protected $sekolah_inti_id;

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
     * @var        JenisGugus
     */
    protected $aJenisGugus;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|AnggotaGugus[] Collection to store aggregation of AnggotaGugus objects.
     */
    protected $collAnggotaGuguses;
    protected $collAnggotaGugusesPartial;

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
    protected $anggotaGugusesScheduledForDeletion = null;

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
     * Initializes internal state of BaseGugusSekolah object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [gugus_id] column value.
     * 
     * @return string
     */
    public function getGugusId()
    {
        return $this->gugus_id;
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [sk_gugus] column value.
     * 
     * @return string
     */
    public function getSkGugus()
    {
        return $this->sk_gugus;
    }

    /**
     * Get the [jenis_gugus_id] column value.
     * 
     * @return string
     */
    public function getJenisGugusId()
    {
        return $this->jenis_gugus_id;
    }

    /**
     * Get the [sekolah_inti_id] column value.
     * 
     * @return string
     */
    public function getSekolahIntiId()
    {
        return $this->sekolah_inti_id;
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
     * Set the value of [gugus_id] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setGugusId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->gugus_id !== $v) {
            $this->gugus_id = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::GUGUS_ID;
        }


        return $this;
    } // setGugusId()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [sk_gugus] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setSkGugus($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_gugus !== $v) {
            $this->sk_gugus = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::SK_GUGUS;
        }


        return $this;
    } // setSkGugus()

    /**
     * Set the value of [jenis_gugus_id] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setJenisGugusId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_gugus_id !== $v) {
            $this->jenis_gugus_id = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::JENIS_GUGUS_ID;
        }

        if ($this->aJenisGugus !== null && $this->aJenisGugus->getJenisGugusId() !== $v) {
            $this->aJenisGugus = null;
        }


        return $this;
    } // setJenisGugusId()

    /**
     * Set the value of [sekolah_inti_id] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setSekolahIntiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_inti_id !== $v) {
            $this->sekolah_inti_id = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::SEKOLAH_INTI_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahIntiId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = GugusSekolahPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = GugusSekolahPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return GugusSekolah The current object (for fluent API support)
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
                $this->modifiedColumns[] = GugusSekolahPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = GugusSekolahPeer::UPDATER_ID;
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

            $this->gugus_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->asal_data = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sk_gugus = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenis_gugus_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->sekolah_inti_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
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
            return $startcol + 11; // 11 = GugusSekolahPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating GugusSekolah object", $e);
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

        if ($this->aJenisGugus !== null && $this->jenis_gugus_id !== $this->aJenisGugus->getJenisGugusId()) {
            $this->aJenisGugus = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_inti_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
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
            $con = Propel::getConnection(GugusSekolahPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = GugusSekolahPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisGugus = null;
            $this->aSekolah = null;
            $this->collAnggotaGuguses = null;

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
            $con = Propel::getConnection(GugusSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = GugusSekolahQuery::create()
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
            $con = Propel::getConnection(GugusSekolahPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                GugusSekolahPeer::addInstanceToPool($this);
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

            if ($this->aJenisGugus !== null) {
                if ($this->aJenisGugus->isModified() || $this->aJenisGugus->isNew()) {
                    $affectedRows += $this->aJenisGugus->save($con);
                }
                $this->setJenisGugus($this->aJenisGugus);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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

            if ($this->anggotaGugusesScheduledForDeletion !== null) {
                if (!$this->anggotaGugusesScheduledForDeletion->isEmpty()) {
                    AnggotaGugusQuery::create()
                        ->filterByPrimaryKeys($this->anggotaGugusesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaGugusesScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaGuguses !== null) {
                foreach ($this->collAnggotaGuguses as $referrerFK) {
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
        if ($this->isColumnModified(GugusSekolahPeer::GUGUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"gugus_id"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::SK_GUGUS)) {
            $modifiedColumns[':p' . $index++]  = '"sk_gugus"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::JENIS_GUGUS_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_gugus_id"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::SEKOLAH_INTI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_inti_id"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(GugusSekolahPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "gugus_sekolah" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"gugus_id"':						
                        $stmt->bindValue($identifier, $this->gugus_id, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"sk_gugus"':						
                        $stmt->bindValue($identifier, $this->sk_gugus, PDO::PARAM_STR);
                        break;
                    case '"jenis_gugus_id"':						
                        $stmt->bindValue($identifier, $this->jenis_gugus_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_inti_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_inti_id, PDO::PARAM_STR);
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

            if ($this->aJenisGugus !== null) {
                if (!$this->aJenisGugus->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisGugus->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = GugusSekolahPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnggotaGuguses !== null) {
                    foreach ($this->collAnggotaGuguses as $referrerFK) {
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
        $pos = GugusSekolahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getGugusId();
                break;
            case 1:
                return $this->getAsalData();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getSkGugus();
                break;
            case 4:
                return $this->getJenisGugusId();
                break;
            case 5:
                return $this->getSekolahIntiId();
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
        if (isset($alreadyDumpedObjects['GugusSekolah'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['GugusSekolah'][$this->getPrimaryKey()] = true;
        $keys = GugusSekolahPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getGugusId(),
            $keys[1] => $this->getAsalData(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getSkGugus(),
            $keys[4] => $this->getJenisGugusId(),
            $keys[5] => $this->getSekolahIntiId(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getSoftDelete(),
            $keys[9] => $this->getLastSync(),
            $keys[10] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisGugus) {
                $result['JenisGugus'] = $this->aJenisGugus->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAnggotaGuguses) {
                $result['AnggotaGuguses'] = $this->collAnggotaGuguses->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = GugusSekolahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setGugusId($value);
                break;
            case 1:
                $this->setAsalData($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setSkGugus($value);
                break;
            case 4:
                $this->setJenisGugusId($value);
                break;
            case 5:
                $this->setSekolahIntiId($value);
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
        $keys = GugusSekolahPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setGugusId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAsalData($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSkGugus($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenisGugusId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSekolahIntiId($arr[$keys[5]]);
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
        $criteria = new Criteria(GugusSekolahPeer::DATABASE_NAME);

        if ($this->isColumnModified(GugusSekolahPeer::GUGUS_ID)) $criteria->add(GugusSekolahPeer::GUGUS_ID, $this->gugus_id);
        if ($this->isColumnModified(GugusSekolahPeer::ASAL_DATA)) $criteria->add(GugusSekolahPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(GugusSekolahPeer::NAMA)) $criteria->add(GugusSekolahPeer::NAMA, $this->nama);
        if ($this->isColumnModified(GugusSekolahPeer::SK_GUGUS)) $criteria->add(GugusSekolahPeer::SK_GUGUS, $this->sk_gugus);
        if ($this->isColumnModified(GugusSekolahPeer::JENIS_GUGUS_ID)) $criteria->add(GugusSekolahPeer::JENIS_GUGUS_ID, $this->jenis_gugus_id);
        if ($this->isColumnModified(GugusSekolahPeer::SEKOLAH_INTI_ID)) $criteria->add(GugusSekolahPeer::SEKOLAH_INTI_ID, $this->sekolah_inti_id);
        if ($this->isColumnModified(GugusSekolahPeer::CREATE_DATE)) $criteria->add(GugusSekolahPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(GugusSekolahPeer::LAST_UPDATE)) $criteria->add(GugusSekolahPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(GugusSekolahPeer::SOFT_DELETE)) $criteria->add(GugusSekolahPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(GugusSekolahPeer::LAST_SYNC)) $criteria->add(GugusSekolahPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(GugusSekolahPeer::UPDATER_ID)) $criteria->add(GugusSekolahPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(GugusSekolahPeer::DATABASE_NAME);
        $criteria->add(GugusSekolahPeer::GUGUS_ID, $this->gugus_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getGugusId();
    }

    /**
     * Generic method to set the primary key (gugus_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setGugusId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getGugusId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of GugusSekolah (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setNama($this->getNama());
        $copyObj->setSkGugus($this->getSkGugus());
        $copyObj->setJenisGugusId($this->getJenisGugusId());
        $copyObj->setSekolahIntiId($this->getSekolahIntiId());
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

            foreach ($this->getAnggotaGuguses() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaGugus($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setGugusId(NULL); // this is a auto-increment column, so set to default value
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
     * @return GugusSekolah Clone of current object.
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
     * @return GugusSekolahPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new GugusSekolahPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisGugus object.
     *
     * @param             JenisGugus $v
     * @return GugusSekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisGugus(JenisGugus $v = null)
    {
        if ($v === null) {
            $this->setJenisGugusId(NULL);
        } else {
            $this->setJenisGugusId($v->getJenisGugusId());
        }

        $this->aJenisGugus = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisGugus object, it will not be re-added.
        if ($v !== null) {
            $v->addGugusSekolah($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisGugus object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisGugus The associated JenisGugus object.
     * @throws PropelException
     */
    public function getJenisGugus(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisGugus === null && (($this->jenis_gugus_id !== "" && $this->jenis_gugus_id !== null)) && $doQuery) {
            $this->aJenisGugus = JenisGugusQuery::create()->findPk($this->jenis_gugus_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisGugus->addGugusSekolahs($this);
             */
        }

        return $this->aJenisGugus;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return GugusSekolah The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahIntiId(NULL);
        } else {
            $this->setSekolahIntiId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addGugusSekolah($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_inti_id !== "" && $this->sekolah_inti_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_inti_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addGugusSekolahs($this);
             */
        }

        return $this->aSekolah;
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
        if ('AnggotaGugus' == $relationName) {
            $this->initAnggotaGuguses();
        }
    }

    /**
     * Clears out the collAnggotaGuguses collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return GugusSekolah The current object (for fluent API support)
     * @see        addAnggotaGuguses()
     */
    public function clearAnggotaGuguses()
    {
        $this->collAnggotaGuguses = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaGugusesPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaGuguses collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaGuguses($v = true)
    {
        $this->collAnggotaGugusesPartial = $v;
    }

    /**
     * Initializes the collAnggotaGuguses collection.
     *
     * By default this just sets the collAnggotaGuguses collection to an empty array (like clearcollAnggotaGuguses());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaGuguses($overrideExisting = true)
    {
        if (null !== $this->collAnggotaGuguses && !$overrideExisting) {
            return;
        }
        $this->collAnggotaGuguses = new PropelObjectCollection();
        $this->collAnggotaGuguses->setModel('AnggotaGugus');
    }

    /**
     * Gets an array of AnggotaGugus objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this GugusSekolah is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaGugus[] List of AnggotaGugus objects
     * @throws PropelException
     */
    public function getAnggotaGuguses($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaGugusesPartial && !$this->isNew();
        if (null === $this->collAnggotaGuguses || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaGuguses) {
                // return empty collection
                $this->initAnggotaGuguses();
            } else {
                $collAnggotaGuguses = AnggotaGugusQuery::create(null, $criteria)
                    ->filterByGugusSekolah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaGugusesPartial && count($collAnggotaGuguses)) {
                      $this->initAnggotaGuguses(false);

                      foreach($collAnggotaGuguses as $obj) {
                        if (false == $this->collAnggotaGuguses->contains($obj)) {
                          $this->collAnggotaGuguses->append($obj);
                        }
                      }

                      $this->collAnggotaGugusesPartial = true;
                    }

                    $collAnggotaGuguses->getInternalIterator()->rewind();
                    return $collAnggotaGuguses;
                }

                if($partial && $this->collAnggotaGuguses) {
                    foreach($this->collAnggotaGuguses as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaGuguses[] = $obj;
                        }
                    }
                }

                $this->collAnggotaGuguses = $collAnggotaGuguses;
                $this->collAnggotaGugusesPartial = false;
            }
        }

        return $this->collAnggotaGuguses;
    }

    /**
     * Sets a collection of AnggotaGugus objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaGuguses A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function setAnggotaGuguses(PropelCollection $anggotaGuguses, PropelPDO $con = null)
    {
        $anggotaGugusesToDelete = $this->getAnggotaGuguses(new Criteria(), $con)->diff($anggotaGuguses);

        $this->anggotaGugusesScheduledForDeletion = unserialize(serialize($anggotaGugusesToDelete));

        foreach ($anggotaGugusesToDelete as $anggotaGugusRemoved) {
            $anggotaGugusRemoved->setGugusSekolah(null);
        }

        $this->collAnggotaGuguses = null;
        foreach ($anggotaGuguses as $anggotaGugus) {
            $this->addAnggotaGugus($anggotaGugus);
        }

        $this->collAnggotaGuguses = $anggotaGuguses;
        $this->collAnggotaGugusesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaGugus objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaGugus objects.
     * @throws PropelException
     */
    public function countAnggotaGuguses(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaGugusesPartial && !$this->isNew();
        if (null === $this->collAnggotaGuguses || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaGuguses) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaGuguses());
            }
            $query = AnggotaGugusQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByGugusSekolah($this)
                ->count($con);
        }

        return count($this->collAnggotaGuguses);
    }

    /**
     * Method called to associate a AnggotaGugus object to this object
     * through the AnggotaGugus foreign key attribute.
     *
     * @param    AnggotaGugus $l AnggotaGugus
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function addAnggotaGugus(AnggotaGugus $l)
    {
        if ($this->collAnggotaGuguses === null) {
            $this->initAnggotaGuguses();
            $this->collAnggotaGugusesPartial = true;
        }
        if (!in_array($l, $this->collAnggotaGuguses->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaGugus($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaGugus $anggotaGugus The anggotaGugus object to add.
     */
    protected function doAddAnggotaGugus($anggotaGugus)
    {
        $this->collAnggotaGuguses[]= $anggotaGugus;
        $anggotaGugus->setGugusSekolah($this);
    }

    /**
     * @param	AnggotaGugus $anggotaGugus The anggotaGugus object to remove.
     * @return GugusSekolah The current object (for fluent API support)
     */
    public function removeAnggotaGugus($anggotaGugus)
    {
        if ($this->getAnggotaGuguses()->contains($anggotaGugus)) {
            $this->collAnggotaGuguses->remove($this->collAnggotaGuguses->search($anggotaGugus));
            if (null === $this->anggotaGugusesScheduledForDeletion) {
                $this->anggotaGugusesScheduledForDeletion = clone $this->collAnggotaGuguses;
                $this->anggotaGugusesScheduledForDeletion->clear();
            }
            $this->anggotaGugusesScheduledForDeletion[]= clone $anggotaGugus;
            $anggotaGugus->setGugusSekolah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this GugusSekolah is new, it will return
     * an empty collection; or if this GugusSekolah has previously
     * been saved, it will retrieve related AnggotaGuguses from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in GugusSekolah.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaGugus[] List of AnggotaGugus objects
     */
    public function getAnggotaGugusesJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaGugusQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAnggotaGuguses($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->gugus_id = null;
        $this->asal_data = null;
        $this->nama = null;
        $this->sk_gugus = null;
        $this->jenis_gugus_id = null;
        $this->sekolah_inti_id = null;
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
            if ($this->collAnggotaGuguses) {
                foreach ($this->collAnggotaGuguses as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisGugus instanceof Persistent) {
              $this->aJenisGugus->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnggotaGuguses instanceof PropelCollection) {
            $this->collAnggotaGuguses->clearIterator();
        }
        $this->collAnggotaGuguses = null;
        $this->aJenisGugus = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(GugusSekolahPeer::DEFAULT_STRING_FORMAT);
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
