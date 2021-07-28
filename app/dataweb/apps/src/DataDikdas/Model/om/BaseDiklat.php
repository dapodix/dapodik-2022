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
use DataDikdas\Model\Diklat;
use DataDikdas\Model\DiklatPeer;
use DataDikdas\Model\DiklatQuery;
use DataDikdas\Model\JenisDiklat;
use DataDikdas\Model\JenisDiklatQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;

/**
 * Base class that represents a row from the 'diklat' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseDiklat extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\DiklatPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        DiklatPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the diklat_id field.
     * @var        string
     */
    protected $diklat_id;

    /**
     * The value for the jenis_diklat_id field.
     * @var        int
     */
    protected $jenis_diklat_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

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
     * The value for the tahun field.
     * @var        string
     */
    protected $tahun;

    /**
     * The value for the peran field.
     * @var        string
     */
    protected $peran;

    /**
     * The value for the tingkat field.
     * @var        string
     */
    protected $tingkat;

    /**
     * The value for the berapa_jam field.
     * @var        string
     */
    protected $berapa_jam;

    /**
     * The value for the sertifikat_diklat field.
     * @var        string
     */
    protected $sertifikat_diklat;

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
     * @var        JenisDiklat
     */
    protected $aJenisDiklat;

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
        $this->asal_data = '1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseDiklat object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [diklat_id] column value.
     * 
     * @return string
     */
    public function getDiklatId()
    {
        return $this->diklat_id;
    }

    /**
     * Get the [jenis_diklat_id] column value.
     * 
     * @return int
     */
    public function getJenisDiklatId()
    {
        return $this->jenis_diklat_id;
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
     * Get the [tahun] column value.
     * 
     * @return string
     */
    public function getTahun()
    {
        return $this->tahun;
    }

    /**
     * Get the [peran] column value.
     * 
     * @return string
     */
    public function getPeran()
    {
        return $this->peran;
    }

    /**
     * Get the [tingkat] column value.
     * 
     * @return string
     */
    public function getTingkat()
    {
        return $this->tingkat;
    }

    /**
     * Get the [berapa_jam] column value.
     * 
     * @return string
     */
    public function getBerapaJam()
    {
        return $this->berapa_jam;
    }

    /**
     * Get the [sertifikat_diklat] column value.
     * 
     * @return string
     */
    public function getSertifikatDiklat()
    {
        return $this->sertifikat_diklat;
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
     * Set the value of [diklat_id] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setDiklatId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->diklat_id !== $v) {
            $this->diklat_id = $v;
            $this->modifiedColumns[] = DiklatPeer::DIKLAT_ID;
        }


        return $this;
    } // setDiklatId()

    /**
     * Set the value of [jenis_diklat_id] column.
     * 
     * @param int $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setJenisDiklatId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_diklat_id !== $v) {
            $this->jenis_diklat_id = $v;
            $this->modifiedColumns[] = DiklatPeer::JENIS_DIKLAT_ID;
        }

        if ($this->aJenisDiklat !== null && $this->aJenisDiklat->getJenisDiklatId() !== $v) {
            $this->aJenisDiklat = null;
        }


        return $this;
    } // setJenisDiklatId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = DiklatPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = DiklatPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [penyelenggara] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setPenyelenggara($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penyelenggara !== $v) {
            $this->penyelenggara = $v;
            $this->modifiedColumns[] = DiklatPeer::PENYELENGGARA;
        }


        return $this;
    } // setPenyelenggara()

    /**
     * Set the value of [tahun] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun !== $v) {
            $this->tahun = $v;
            $this->modifiedColumns[] = DiklatPeer::TAHUN;
        }


        return $this;
    } // setTahun()

    /**
     * Set the value of [peran] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setPeran($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peran !== $v) {
            $this->peran = $v;
            $this->modifiedColumns[] = DiklatPeer::PERAN;
        }


        return $this;
    } // setPeran()

    /**
     * Set the value of [tingkat] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setTingkat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat !== $v) {
            $this->tingkat = $v;
            $this->modifiedColumns[] = DiklatPeer::TINGKAT;
        }


        return $this;
    } // setTingkat()

    /**
     * Set the value of [berapa_jam] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setBerapaJam($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->berapa_jam !== $v) {
            $this->berapa_jam = $v;
            $this->modifiedColumns[] = DiklatPeer::BERAPA_JAM;
        }


        return $this;
    } // setBerapaJam()

    /**
     * Set the value of [sertifikat_diklat] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setSertifikatDiklat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sertifikat_diklat !== $v) {
            $this->sertifikat_diklat = $v;
            $this->modifiedColumns[] = DiklatPeer::SERTIFIKAT_DIKLAT;
        }


        return $this;
    } // setSertifikatDiklat()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = DiklatPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diklat The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = DiklatPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diklat The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = DiklatPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = DiklatPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Diklat The current object (for fluent API support)
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
                $this->modifiedColumns[] = DiklatPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Diklat The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = DiklatPeer::UPDATER_ID;
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

            $this->diklat_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_diklat_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->ptk_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nama = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->penyelenggara = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tahun = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->peran = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tingkat = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->berapa_jam = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->sertifikat_diklat = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->asal_data = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->create_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_update = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->soft_delete = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_sync = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->updater_id = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = DiklatPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Diklat object", $e);
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

        if ($this->aJenisDiklat !== null && $this->jenis_diklat_id !== $this->aJenisDiklat->getJenisDiklatId()) {
            $this->aJenisDiklat = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
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
            $con = Propel::getConnection(DiklatPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = DiklatPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPtk = null;
            $this->aJenisDiklat = null;
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
            $con = Propel::getConnection(DiklatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = DiklatQuery::create()
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
            $con = Propel::getConnection(DiklatPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                DiklatPeer::addInstanceToPool($this);
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

            if ($this->aJenisDiklat !== null) {
                if ($this->aJenisDiklat->isModified() || $this->aJenisDiklat->isNew()) {
                    $affectedRows += $this->aJenisDiklat->save($con);
                }
                $this->setJenisDiklat($this->aJenisDiklat);
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
        if ($this->isColumnModified(DiklatPeer::DIKLAT_ID)) {
            $modifiedColumns[':p' . $index++]  = '"diklat_id"';
        }
        if ($this->isColumnModified(DiklatPeer::JENIS_DIKLAT_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_diklat_id"';
        }
        if ($this->isColumnModified(DiklatPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(DiklatPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(DiklatPeer::PENYELENGGARA)) {
            $modifiedColumns[':p' . $index++]  = '"penyelenggara"';
        }
        if ($this->isColumnModified(DiklatPeer::TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"tahun"';
        }
        if ($this->isColumnModified(DiklatPeer::PERAN)) {
            $modifiedColumns[':p' . $index++]  = '"peran"';
        }
        if ($this->isColumnModified(DiklatPeer::TINGKAT)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat"';
        }
        if ($this->isColumnModified(DiklatPeer::BERAPA_JAM)) {
            $modifiedColumns[':p' . $index++]  = '"berapa_jam"';
        }
        if ($this->isColumnModified(DiklatPeer::SERTIFIKAT_DIKLAT)) {
            $modifiedColumns[':p' . $index++]  = '"sertifikat_diklat"';
        }
        if ($this->isColumnModified(DiklatPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(DiklatPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(DiklatPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(DiklatPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(DiklatPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(DiklatPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "diklat" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"diklat_id"':						
                        $stmt->bindValue($identifier, $this->diklat_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_diklat_id"':						
                        $stmt->bindValue($identifier, $this->jenis_diklat_id, PDO::PARAM_INT);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"penyelenggara"':						
                        $stmt->bindValue($identifier, $this->penyelenggara, PDO::PARAM_STR);
                        break;
                    case '"tahun"':						
                        $stmt->bindValue($identifier, $this->tahun, PDO::PARAM_STR);
                        break;
                    case '"peran"':						
                        $stmt->bindValue($identifier, $this->peran, PDO::PARAM_STR);
                        break;
                    case '"tingkat"':						
                        $stmt->bindValue($identifier, $this->tingkat, PDO::PARAM_STR);
                        break;
                    case '"berapa_jam"':						
                        $stmt->bindValue($identifier, $this->berapa_jam, PDO::PARAM_STR);
                        break;
                    case '"sertifikat_diklat"':						
                        $stmt->bindValue($identifier, $this->sertifikat_diklat, PDO::PARAM_STR);
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

            if ($this->aJenisDiklat !== null) {
                if (!$this->aJenisDiklat->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisDiklat->getValidationFailures());
                }
            }


            if (($retval = DiklatPeer::doValidate($this, $columns)) !== true) {
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
        $pos = DiklatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getDiklatId();
                break;
            case 1:
                return $this->getJenisDiklatId();
                break;
            case 2:
                return $this->getPtkId();
                break;
            case 3:
                return $this->getNama();
                break;
            case 4:
                return $this->getPenyelenggara();
                break;
            case 5:
                return $this->getTahun();
                break;
            case 6:
                return $this->getPeran();
                break;
            case 7:
                return $this->getTingkat();
                break;
            case 8:
                return $this->getBerapaJam();
                break;
            case 9:
                return $this->getSertifikatDiklat();
                break;
            case 10:
                return $this->getAsalData();
                break;
            case 11:
                return $this->getCreateDate();
                break;
            case 12:
                return $this->getLastUpdate();
                break;
            case 13:
                return $this->getSoftDelete();
                break;
            case 14:
                return $this->getLastSync();
                break;
            case 15:
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
        if (isset($alreadyDumpedObjects['Diklat'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Diklat'][$this->getPrimaryKey()] = true;
        $keys = DiklatPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getDiklatId(),
            $keys[1] => $this->getJenisDiklatId(),
            $keys[2] => $this->getPtkId(),
            $keys[3] => $this->getNama(),
            $keys[4] => $this->getPenyelenggara(),
            $keys[5] => $this->getTahun(),
            $keys[6] => $this->getPeran(),
            $keys[7] => $this->getTingkat(),
            $keys[8] => $this->getBerapaJam(),
            $keys[9] => $this->getSertifikatDiklat(),
            $keys[10] => $this->getAsalData(),
            $keys[11] => $this->getCreateDate(),
            $keys[12] => $this->getLastUpdate(),
            $keys[13] => $this->getSoftDelete(),
            $keys[14] => $this->getLastSync(),
            $keys[15] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisDiklat) {
                $result['JenisDiklat'] = $this->aJenisDiklat->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = DiklatPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setDiklatId($value);
                break;
            case 1:
                $this->setJenisDiklatId($value);
                break;
            case 2:
                $this->setPtkId($value);
                break;
            case 3:
                $this->setNama($value);
                break;
            case 4:
                $this->setPenyelenggara($value);
                break;
            case 5:
                $this->setTahun($value);
                break;
            case 6:
                $this->setPeran($value);
                break;
            case 7:
                $this->setTingkat($value);
                break;
            case 8:
                $this->setBerapaJam($value);
                break;
            case 9:
                $this->setSertifikatDiklat($value);
                break;
            case 10:
                $this->setAsalData($value);
                break;
            case 11:
                $this->setCreateDate($value);
                break;
            case 12:
                $this->setLastUpdate($value);
                break;
            case 13:
                $this->setSoftDelete($value);
                break;
            case 14:
                $this->setLastSync($value);
                break;
            case 15:
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
        $keys = DiklatPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setDiklatId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisDiklatId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPtkId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNama($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPenyelenggara($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTahun($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPeran($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTingkat($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setBerapaJam($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSertifikatDiklat($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setAsalData($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreateDate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastUpdate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSoftDelete($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastSync($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setUpdaterId($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(DiklatPeer::DATABASE_NAME);

        if ($this->isColumnModified(DiklatPeer::DIKLAT_ID)) $criteria->add(DiklatPeer::DIKLAT_ID, $this->diklat_id);
        if ($this->isColumnModified(DiklatPeer::JENIS_DIKLAT_ID)) $criteria->add(DiklatPeer::JENIS_DIKLAT_ID, $this->jenis_diklat_id);
        if ($this->isColumnModified(DiklatPeer::PTK_ID)) $criteria->add(DiklatPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(DiklatPeer::NAMA)) $criteria->add(DiklatPeer::NAMA, $this->nama);
        if ($this->isColumnModified(DiklatPeer::PENYELENGGARA)) $criteria->add(DiklatPeer::PENYELENGGARA, $this->penyelenggara);
        if ($this->isColumnModified(DiklatPeer::TAHUN)) $criteria->add(DiklatPeer::TAHUN, $this->tahun);
        if ($this->isColumnModified(DiklatPeer::PERAN)) $criteria->add(DiklatPeer::PERAN, $this->peran);
        if ($this->isColumnModified(DiklatPeer::TINGKAT)) $criteria->add(DiklatPeer::TINGKAT, $this->tingkat);
        if ($this->isColumnModified(DiklatPeer::BERAPA_JAM)) $criteria->add(DiklatPeer::BERAPA_JAM, $this->berapa_jam);
        if ($this->isColumnModified(DiklatPeer::SERTIFIKAT_DIKLAT)) $criteria->add(DiklatPeer::SERTIFIKAT_DIKLAT, $this->sertifikat_diklat);
        if ($this->isColumnModified(DiklatPeer::ASAL_DATA)) $criteria->add(DiklatPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(DiklatPeer::CREATE_DATE)) $criteria->add(DiklatPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(DiklatPeer::LAST_UPDATE)) $criteria->add(DiklatPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(DiklatPeer::SOFT_DELETE)) $criteria->add(DiklatPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(DiklatPeer::LAST_SYNC)) $criteria->add(DiklatPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(DiklatPeer::UPDATER_ID)) $criteria->add(DiklatPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(DiklatPeer::DATABASE_NAME);
        $criteria->add(DiklatPeer::DIKLAT_ID, $this->diklat_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getDiklatId();
    }

    /**
     * Generic method to set the primary key (diklat_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setDiklatId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getDiklatId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Diklat (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisDiklatId($this->getJenisDiklatId());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setNama($this->getNama());
        $copyObj->setPenyelenggara($this->getPenyelenggara());
        $copyObj->setTahun($this->getTahun());
        $copyObj->setPeran($this->getPeran());
        $copyObj->setTingkat($this->getTingkat());
        $copyObj->setBerapaJam($this->getBerapaJam());
        $copyObj->setSertifikatDiklat($this->getSertifikatDiklat());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setDiklatId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Diklat Clone of current object.
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
     * @return DiklatPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new DiklatPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return Diklat The current object (for fluent API support)
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
            $v->addDiklat($this);
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
                $this->aPtk->addDiklats($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a JenisDiklat object.
     *
     * @param             JenisDiklat $v
     * @return Diklat The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisDiklat(JenisDiklat $v = null)
    {
        if ($v === null) {
            $this->setJenisDiklatId(NULL);
        } else {
            $this->setJenisDiklatId($v->getJenisDiklatId());
        }

        $this->aJenisDiklat = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisDiklat object, it will not be re-added.
        if ($v !== null) {
            $v->addDiklat($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisDiklat object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisDiklat The associated JenisDiklat object.
     * @throws PropelException
     */
    public function getJenisDiklat(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisDiklat === null && ($this->jenis_diklat_id !== null) && $doQuery) {
            $this->aJenisDiklat = JenisDiklatQuery::create()->findPk($this->jenis_diklat_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisDiklat->addDiklats($this);
             */
        }

        return $this->aJenisDiklat;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->diklat_id = null;
        $this->jenis_diklat_id = null;
        $this->ptk_id = null;
        $this->nama = null;
        $this->penyelenggara = null;
        $this->tahun = null;
        $this->peran = null;
        $this->tingkat = null;
        $this->berapa_jam = null;
        $this->sertifikat_diklat = null;
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
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aJenisDiklat instanceof Persistent) {
              $this->aJenisDiklat->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aPtk = null;
        $this->aJenisDiklat = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(DiklatPeer::DEFAULT_STRING_FORMAT);
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
