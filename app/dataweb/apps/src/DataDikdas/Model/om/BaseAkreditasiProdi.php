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
use DataDikdas\Model\Akreditasi;
use DataDikdas\Model\AkreditasiProdi;
use DataDikdas\Model\AkreditasiProdiPeer;
use DataDikdas\Model\AkreditasiProdiQuery;
use DataDikdas\Model\AkreditasiQuery;
use DataDikdas\Model\JurusanSp;
use DataDikdas\Model\JurusanSpQuery;
use DataDikdas\Model\LembagaAkreditasi;
use DataDikdas\Model\LembagaAkreditasiQuery;

/**
 * Base class that represents a row from the 'akreditasi_prodi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAkreditasiProdi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AkreditasiProdiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AkreditasiProdiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the akred_prodi_id field.
     * @var        string
     */
    protected $akred_prodi_id;

    /**
     * The value for the akreditasi_id field.
     * @var        string
     */
    protected $akreditasi_id;

    /**
     * The value for the la_id field.
     * @var        string
     */
    protected $la_id;

    /**
     * The value for the jurusan_sp_id field.
     * @var        string
     */
    protected $jurusan_sp_id;

    /**
     * The value for the no_sk_akred field.
     * @var        string
     */
    protected $no_sk_akred;

    /**
     * The value for the tgl_sk_akred field.
     * @var        string
     */
    protected $tgl_sk_akred;

    /**
     * The value for the tgl_akhir_akred field.
     * @var        string
     */
    protected $tgl_akhir_akred;

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
     * @var        LembagaAkreditasi
     */
    protected $aLembagaAkreditasi;

    /**
     * @var        JurusanSp
     */
    protected $aJurusanSp;

    /**
     * @var        Akreditasi
     */
    protected $aAkreditasi;

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
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseAkreditasiProdi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [akred_prodi_id] column value.
     * 
     * @return string
     */
    public function getAkredProdiId()
    {
        return $this->akred_prodi_id;
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
     * Get the [la_id] column value.
     * 
     * @return string
     */
    public function getLaId()
    {
        return $this->la_id;
    }

    /**
     * Get the [jurusan_sp_id] column value.
     * 
     * @return string
     */
    public function getJurusanSpId()
    {
        return $this->jurusan_sp_id;
    }

    /**
     * Get the [no_sk_akred] column value.
     * 
     * @return string
     */
    public function getNoSkAkred()
    {
        return $this->no_sk_akred;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_akred] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkAkred($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_akred === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_akred);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_akred, true), $x);
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
     * Get the [optionally formatted] temporal [tgl_akhir_akred] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglAkhirAkred($format = '%Y-%m-%d')
    {
        if ($this->tgl_akhir_akred === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_akhir_akred);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_akhir_akred, true), $x);
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
     * Set the value of [akred_prodi_id] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setAkredProdiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akred_prodi_id !== $v) {
            $this->akred_prodi_id = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::AKRED_PRODI_ID;
        }


        return $this;
    } // setAkredProdiId()

    /**
     * Set the value of [akreditasi_id] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setAkreditasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akreditasi_id !== $v) {
            $this->akreditasi_id = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::AKREDITASI_ID;
        }

        if ($this->aAkreditasi !== null && $this->aAkreditasi->getAkreditasiId() !== $v) {
            $this->aAkreditasi = null;
        }


        return $this;
    } // setAkreditasiId()

    /**
     * Set the value of [la_id] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setLaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->la_id !== $v) {
            $this->la_id = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::LA_ID;
        }

        if ($this->aLembagaAkreditasi !== null && $this->aLembagaAkreditasi->getLaId() !== $v) {
            $this->aLembagaAkreditasi = null;
        }


        return $this;
    } // setLaId()

    /**
     * Set the value of [jurusan_sp_id] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setJurusanSpId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jurusan_sp_id !== $v) {
            $this->jurusan_sp_id = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::JURUSAN_SP_ID;
        }

        if ($this->aJurusanSp !== null && $this->aJurusanSp->getJurusanSpId() !== $v) {
            $this->aJurusanSp = null;
        }


        return $this;
    } // setJurusanSpId()

    /**
     * Set the value of [no_sk_akred] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setNoSkAkred($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_sk_akred !== $v) {
            $this->no_sk_akred = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::NO_SK_AKRED;
        }


        return $this;
    } // setNoSkAkred()

    /**
     * Sets the value of [tgl_sk_akred] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setTglSkAkred($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_akred !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_akred !== null && $tmpDt = new DateTime($this->tgl_sk_akred)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_akred = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiProdiPeer::TGL_SK_AKRED;
            }
        } // if either are not null


        return $this;
    } // setTglSkAkred()

    /**
     * Sets the value of [tgl_akhir_akred] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setTglAkhirAkred($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_akhir_akred !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_akhir_akred !== null && $tmpDt = new DateTime($this->tgl_akhir_akred)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_akhir_akred = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiProdiPeer::TGL_AKHIR_AKRED;
            }
        } // if either are not null


        return $this;
    } // setTglAkhirAkred()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiProdiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AkreditasiProdiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AkreditasiProdi The current object (for fluent API support)
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
                $this->modifiedColumns[] = AkreditasiProdiPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return AkreditasiProdi The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = AkreditasiProdiPeer::UPDATER_ID;
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

            $this->akred_prodi_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->akreditasi_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->la_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jurusan_sp_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->no_sk_akred = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tgl_sk_akred = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->tgl_akhir_akred = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->create_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->last_update = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->soft_delete = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_sync = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updater_id = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 12; // 12 = AkreditasiProdiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating AkreditasiProdi object", $e);
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

        if ($this->aAkreditasi !== null && $this->akreditasi_id !== $this->aAkreditasi->getAkreditasiId()) {
            $this->aAkreditasi = null;
        }
        if ($this->aLembagaAkreditasi !== null && $this->la_id !== $this->aLembagaAkreditasi->getLaId()) {
            $this->aLembagaAkreditasi = null;
        }
        if ($this->aJurusanSp !== null && $this->jurusan_sp_id !== $this->aJurusanSp->getJurusanSpId()) {
            $this->aJurusanSp = null;
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
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AkreditasiProdiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aLembagaAkreditasi = null;
            $this->aJurusanSp = null;
            $this->aAkreditasi = null;
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
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AkreditasiProdiQuery::create()
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
            $con = Propel::getConnection(AkreditasiProdiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AkreditasiProdiPeer::addInstanceToPool($this);
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

            if ($this->aLembagaAkreditasi !== null) {
                if ($this->aLembagaAkreditasi->isModified() || $this->aLembagaAkreditasi->isNew()) {
                    $affectedRows += $this->aLembagaAkreditasi->save($con);
                }
                $this->setLembagaAkreditasi($this->aLembagaAkreditasi);
            }

            if ($this->aJurusanSp !== null) {
                if ($this->aJurusanSp->isModified() || $this->aJurusanSp->isNew()) {
                    $affectedRows += $this->aJurusanSp->save($con);
                }
                $this->setJurusanSp($this->aJurusanSp);
            }

            if ($this->aAkreditasi !== null) {
                if ($this->aAkreditasi->isModified() || $this->aAkreditasi->isNew()) {
                    $affectedRows += $this->aAkreditasi->save($con);
                }
                $this->setAkreditasi($this->aAkreditasi);
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
        if ($this->isColumnModified(AkreditasiProdiPeer::AKRED_PRODI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akred_prodi_id"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::AKREDITASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"akreditasi_id"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::LA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"la_id"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::JURUSAN_SP_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jurusan_sp_id"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::NO_SK_AKRED)) {
            $modifiedColumns[':p' . $index++]  = '"no_sk_akred"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::TGL_SK_AKRED)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_akred"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::TGL_AKHIR_AKRED)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_akhir_akred"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(AkreditasiProdiPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "akreditasi_prodi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"akred_prodi_id"':						
                        $stmt->bindValue($identifier, $this->akred_prodi_id, PDO::PARAM_STR);
                        break;
                    case '"akreditasi_id"':						
                        $stmt->bindValue($identifier, $this->akreditasi_id, PDO::PARAM_STR);
                        break;
                    case '"la_id"':						
                        $stmt->bindValue($identifier, $this->la_id, PDO::PARAM_STR);
                        break;
                    case '"jurusan_sp_id"':						
                        $stmt->bindValue($identifier, $this->jurusan_sp_id, PDO::PARAM_STR);
                        break;
                    case '"no_sk_akred"':						
                        $stmt->bindValue($identifier, $this->no_sk_akred, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_akred"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_akred, PDO::PARAM_STR);
                        break;
                    case '"tgl_akhir_akred"':						
                        $stmt->bindValue($identifier, $this->tgl_akhir_akred, PDO::PARAM_STR);
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

            if ($this->aLembagaAkreditasi !== null) {
                if (!$this->aLembagaAkreditasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aLembagaAkreditasi->getValidationFailures());
                }
            }

            if ($this->aJurusanSp !== null) {
                if (!$this->aJurusanSp->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJurusanSp->getValidationFailures());
                }
            }

            if ($this->aAkreditasi !== null) {
                if (!$this->aAkreditasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAkreditasi->getValidationFailures());
                }
            }


            if (($retval = AkreditasiProdiPeer::doValidate($this, $columns)) !== true) {
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
        $pos = AkreditasiProdiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAkredProdiId();
                break;
            case 1:
                return $this->getAkreditasiId();
                break;
            case 2:
                return $this->getLaId();
                break;
            case 3:
                return $this->getJurusanSpId();
                break;
            case 4:
                return $this->getNoSkAkred();
                break;
            case 5:
                return $this->getTglSkAkred();
                break;
            case 6:
                return $this->getTglAkhirAkred();
                break;
            case 7:
                return $this->getCreateDate();
                break;
            case 8:
                return $this->getLastUpdate();
                break;
            case 9:
                return $this->getSoftDelete();
                break;
            case 10:
                return $this->getLastSync();
                break;
            case 11:
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
        if (isset($alreadyDumpedObjects['AkreditasiProdi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AkreditasiProdi'][$this->getPrimaryKey()] = true;
        $keys = AkreditasiProdiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAkredProdiId(),
            $keys[1] => $this->getAkreditasiId(),
            $keys[2] => $this->getLaId(),
            $keys[3] => $this->getJurusanSpId(),
            $keys[4] => $this->getNoSkAkred(),
            $keys[5] => $this->getTglSkAkred(),
            $keys[6] => $this->getTglAkhirAkred(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getSoftDelete(),
            $keys[10] => $this->getLastSync(),
            $keys[11] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aLembagaAkreditasi) {
                $result['LembagaAkreditasi'] = $this->aLembagaAkreditasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJurusanSp) {
                $result['JurusanSp'] = $this->aJurusanSp->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aAkreditasi) {
                $result['Akreditasi'] = $this->aAkreditasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = AkreditasiProdiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAkredProdiId($value);
                break;
            case 1:
                $this->setAkreditasiId($value);
                break;
            case 2:
                $this->setLaId($value);
                break;
            case 3:
                $this->setJurusanSpId($value);
                break;
            case 4:
                $this->setNoSkAkred($value);
                break;
            case 5:
                $this->setTglSkAkred($value);
                break;
            case 6:
                $this->setTglAkhirAkred($value);
                break;
            case 7:
                $this->setCreateDate($value);
                break;
            case 8:
                $this->setLastUpdate($value);
                break;
            case 9:
                $this->setSoftDelete($value);
                break;
            case 10:
                $this->setLastSync($value);
                break;
            case 11:
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
        $keys = AkreditasiProdiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAkredProdiId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAkreditasiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setLaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJurusanSpId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNoSkAkred($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTglSkAkred($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setTglAkhirAkred($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setCreateDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setLastUpdate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSoftDelete($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastSync($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdaterId($arr[$keys[11]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);

        if ($this->isColumnModified(AkreditasiProdiPeer::AKRED_PRODI_ID)) $criteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, $this->akred_prodi_id);
        if ($this->isColumnModified(AkreditasiProdiPeer::AKREDITASI_ID)) $criteria->add(AkreditasiProdiPeer::AKREDITASI_ID, $this->akreditasi_id);
        if ($this->isColumnModified(AkreditasiProdiPeer::LA_ID)) $criteria->add(AkreditasiProdiPeer::LA_ID, $this->la_id);
        if ($this->isColumnModified(AkreditasiProdiPeer::JURUSAN_SP_ID)) $criteria->add(AkreditasiProdiPeer::JURUSAN_SP_ID, $this->jurusan_sp_id);
        if ($this->isColumnModified(AkreditasiProdiPeer::NO_SK_AKRED)) $criteria->add(AkreditasiProdiPeer::NO_SK_AKRED, $this->no_sk_akred);
        if ($this->isColumnModified(AkreditasiProdiPeer::TGL_SK_AKRED)) $criteria->add(AkreditasiProdiPeer::TGL_SK_AKRED, $this->tgl_sk_akred);
        if ($this->isColumnModified(AkreditasiProdiPeer::TGL_AKHIR_AKRED)) $criteria->add(AkreditasiProdiPeer::TGL_AKHIR_AKRED, $this->tgl_akhir_akred);
        if ($this->isColumnModified(AkreditasiProdiPeer::CREATE_DATE)) $criteria->add(AkreditasiProdiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AkreditasiProdiPeer::LAST_UPDATE)) $criteria->add(AkreditasiProdiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AkreditasiProdiPeer::SOFT_DELETE)) $criteria->add(AkreditasiProdiPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(AkreditasiProdiPeer::LAST_SYNC)) $criteria->add(AkreditasiProdiPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(AkreditasiProdiPeer::UPDATER_ID)) $criteria->add(AkreditasiProdiPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(AkreditasiProdiPeer::DATABASE_NAME);
        $criteria->add(AkreditasiProdiPeer::AKRED_PRODI_ID, $this->akred_prodi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getAkredProdiId();
    }

    /**
     * Generic method to set the primary key (akred_prodi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAkredProdiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAkredProdiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of AkreditasiProdi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAkreditasiId($this->getAkreditasiId());
        $copyObj->setLaId($this->getLaId());
        $copyObj->setJurusanSpId($this->getJurusanSpId());
        $copyObj->setNoSkAkred($this->getNoSkAkred());
        $copyObj->setTglSkAkred($this->getTglSkAkred());
        $copyObj->setTglAkhirAkred($this->getTglAkhirAkred());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAkredProdiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return AkreditasiProdi Clone of current object.
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
     * @return AkreditasiProdiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AkreditasiProdiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a LembagaAkreditasi object.
     *
     * @param             LembagaAkreditasi $v
     * @return AkreditasiProdi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setLembagaAkreditasi(LembagaAkreditasi $v = null)
    {
        if ($v === null) {
            $this->setLaId(NULL);
        } else {
            $this->setLaId($v->getLaId());
        }

        $this->aLembagaAkreditasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the LembagaAkreditasi object, it will not be re-added.
        if ($v !== null) {
            $v->addAkreditasiProdi($this);
        }


        return $this;
    }


    /**
     * Get the associated LembagaAkreditasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return LembagaAkreditasi The associated LembagaAkreditasi object.
     * @throws PropelException
     */
    public function getLembagaAkreditasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aLembagaAkreditasi === null && (($this->la_id !== "" && $this->la_id !== null)) && $doQuery) {
            $this->aLembagaAkreditasi = LembagaAkreditasiQuery::create()->findPk($this->la_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aLembagaAkreditasi->addAkreditasiProdis($this);
             */
        }

        return $this->aLembagaAkreditasi;
    }

    /**
     * Declares an association between this object and a JurusanSp object.
     *
     * @param             JurusanSp $v
     * @return AkreditasiProdi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJurusanSp(JurusanSp $v = null)
    {
        if ($v === null) {
            $this->setJurusanSpId(NULL);
        } else {
            $this->setJurusanSpId($v->getJurusanSpId());
        }

        $this->aJurusanSp = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JurusanSp object, it will not be re-added.
        if ($v !== null) {
            $v->addAkreditasiProdi($this);
        }


        return $this;
    }


    /**
     * Get the associated JurusanSp object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JurusanSp The associated JurusanSp object.
     * @throws PropelException
     */
    public function getJurusanSp(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJurusanSp === null && (($this->jurusan_sp_id !== "" && $this->jurusan_sp_id !== null)) && $doQuery) {
            $this->aJurusanSp = JurusanSpQuery::create()->findPk($this->jurusan_sp_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJurusanSp->addAkreditasiProdis($this);
             */
        }

        return $this->aJurusanSp;
    }

    /**
     * Declares an association between this object and a Akreditasi object.
     *
     * @param             Akreditasi $v
     * @return AkreditasiProdi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAkreditasi(Akreditasi $v = null)
    {
        if ($v === null) {
            $this->setAkreditasiId(NULL);
        } else {
            $this->setAkreditasiId($v->getAkreditasiId());
        }

        $this->aAkreditasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Akreditasi object, it will not be re-added.
        if ($v !== null) {
            $v->addAkreditasiProdi($this);
        }


        return $this;
    }


    /**
     * Get the associated Akreditasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Akreditasi The associated Akreditasi object.
     * @throws PropelException
     */
    public function getAkreditasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAkreditasi === null && (($this->akreditasi_id !== "" && $this->akreditasi_id !== null)) && $doQuery) {
            $this->aAkreditasi = AkreditasiQuery::create()->findPk($this->akreditasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAkreditasi->addAkreditasiProdis($this);
             */
        }

        return $this->aAkreditasi;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->akred_prodi_id = null;
        $this->akreditasi_id = null;
        $this->la_id = null;
        $this->jurusan_sp_id = null;
        $this->no_sk_akred = null;
        $this->tgl_sk_akred = null;
        $this->tgl_akhir_akred = null;
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
            if ($this->aLembagaAkreditasi instanceof Persistent) {
              $this->aLembagaAkreditasi->clearAllReferences($deep);
            }
            if ($this->aJurusanSp instanceof Persistent) {
              $this->aJurusanSp->clearAllReferences($deep);
            }
            if ($this->aAkreditasi instanceof Persistent) {
              $this->aAkreditasi->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aLembagaAkreditasi = null;
        $this->aJurusanSp = null;
        $this->aAkreditasi = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AkreditasiProdiPeer::DEFAULT_STRING_FORMAT);
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
