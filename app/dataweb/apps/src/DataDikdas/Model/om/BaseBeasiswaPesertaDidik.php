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
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\BeasiswaPesertaDidikPeer;
use DataDikdas\Model\BeasiswaPesertaDidikQuery;
use DataDikdas\Model\JenisBeasiswa;
use DataDikdas\Model\JenisBeasiswaQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\TahunAjaran;
use DataDikdas\Model\TahunAjaranQuery;
use DataDikdas\Model\VldBeaPd;
use DataDikdas\Model\VldBeaPdQuery;

/**
 * Base class that represents a row from the 'beasiswa_peserta_didik' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBeasiswaPesertaDidik extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BeasiswaPesertaDidikPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BeasiswaPesertaDidikPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the beasiswa_peserta_didik_id field.
     * @var        string
     */
    protected $beasiswa_peserta_didik_id;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the jenis_beasiswa_id field.
     * @var        int
     */
    protected $jenis_beasiswa_id;

    /**
     * The value for the keterangan field.
     * @var        string
     */
    protected $keterangan;

    /**
     * The value for the tahun_mulai field.
     * @var        string
     */
    protected $tahun_mulai;

    /**
     * The value for the tahun_selesai field.
     * @var        string
     */
    protected $tahun_selesai;

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
     * @var        PesertaDidik
     */
    protected $aPesertaDidik;

    /**
     * @var        TahunAjaran
     */
    protected $aTahunAjaranRelatedByTahunSelesai;

    /**
     * @var        TahunAjaran
     */
    protected $aTahunAjaranRelatedByTahunMulai;

    /**
     * @var        JenisBeasiswa
     */
    protected $aJenisBeasiswa;

    /**
     * @var        PropelObjectCollection|VldBeaPd[] Collection to store aggregation of VldBeaPd objects.
     */
    protected $collVldBeaPds;
    protected $collVldBeaPdsPartial;

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
    protected $vldBeaPdsScheduledForDeletion = null;

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
     * Initializes internal state of BaseBeasiswaPesertaDidik object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [beasiswa_peserta_didik_id] column value.
     * 
     * @return string
     */
    public function getBeasiswaPesertaDidikId()
    {
        return $this->beasiswa_peserta_didik_id;
    }

    /**
     * Get the [peserta_didik_id] column value.
     * 
     * @return string
     */
    public function getPesertaDidikId()
    {
        return $this->peserta_didik_id;
    }

    /**
     * Get the [jenis_beasiswa_id] column value.
     * 
     * @return int
     */
    public function getJenisBeasiswaId()
    {
        return $this->jenis_beasiswa_id;
    }

    /**
     * Get the [keterangan] column value.
     * 
     * @return string
     */
    public function getKeterangan()
    {
        return $this->keterangan;
    }

    /**
     * Get the [tahun_mulai] column value.
     * 
     * @return string
     */
    public function getTahunMulai()
    {
        return $this->tahun_mulai;
    }

    /**
     * Get the [tahun_selesai] column value.
     * 
     * @return string
     */
    public function getTahunSelesai()
    {
        return $this->tahun_selesai;
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
     * Set the value of [beasiswa_peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setBeasiswaPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->beasiswa_peserta_didik_id !== $v) {
            $this->beasiswa_peserta_didik_id = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID;
        }


        return $this;
    } // setBeasiswaPesertaDidikId()

    /**
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID;
        }

        if ($this->aPesertaDidik !== null && $this->aPesertaDidik->getPesertaDidikId() !== $v) {
            $this->aPesertaDidik = null;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [jenis_beasiswa_id] column.
     * 
     * @param int $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setJenisBeasiswaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_beasiswa_id !== $v) {
            $this->jenis_beasiswa_id = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID;
        }

        if ($this->aJenisBeasiswa !== null && $this->aJenisBeasiswa->getJenisBeasiswaId() !== $v) {
            $this->aJenisBeasiswa = null;
        }


        return $this;
    } // setJenisBeasiswaId()

    /**
     * Set the value of [keterangan] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::KETERANGAN;
        }


        return $this;
    } // setKeterangan()

    /**
     * Set the value of [tahun_mulai] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setTahunMulai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_mulai !== $v) {
            $this->tahun_mulai = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::TAHUN_MULAI;
        }

        if ($this->aTahunAjaranRelatedByTahunMulai !== null && $this->aTahunAjaranRelatedByTahunMulai->getTahunAjaranId() !== $v) {
            $this->aTahunAjaranRelatedByTahunMulai = null;
        }


        return $this;
    } // setTahunMulai()

    /**
     * Set the value of [tahun_selesai] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setTahunSelesai($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_selesai !== $v) {
            $this->tahun_selesai = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::TAHUN_SELESAI;
        }

        if ($this->aTahunAjaranRelatedByTahunSelesai !== null && $this->aTahunAjaranRelatedByTahunSelesai->getTahunAjaranId() !== $v) {
            $this->aTahunAjaranRelatedByTahunSelesai = null;
        }


        return $this;
    } // setTahunSelesai()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
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
                $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = BeasiswaPesertaDidikPeer::UPDATER_ID;
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

            $this->beasiswa_peserta_didik_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->peserta_didik_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenis_beasiswa_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->keterangan = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->tahun_mulai = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tahun_selesai = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->asal_data = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
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
            return $startcol + 12; // 12 = BeasiswaPesertaDidikPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating BeasiswaPesertaDidik object", $e);
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

        if ($this->aPesertaDidik !== null && $this->peserta_didik_id !== $this->aPesertaDidik->getPesertaDidikId()) {
            $this->aPesertaDidik = null;
        }
        if ($this->aJenisBeasiswa !== null && $this->jenis_beasiswa_id !== $this->aJenisBeasiswa->getJenisBeasiswaId()) {
            $this->aJenisBeasiswa = null;
        }
        if ($this->aTahunAjaranRelatedByTahunMulai !== null && $this->tahun_mulai !== $this->aTahunAjaranRelatedByTahunMulai->getTahunAjaranId()) {
            $this->aTahunAjaranRelatedByTahunMulai = null;
        }
        if ($this->aTahunAjaranRelatedByTahunSelesai !== null && $this->tahun_selesai !== $this->aTahunAjaranRelatedByTahunSelesai->getTahunAjaranId()) {
            $this->aTahunAjaranRelatedByTahunSelesai = null;
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
            $con = Propel::getConnection(BeasiswaPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BeasiswaPesertaDidikPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aPesertaDidik = null;
            $this->aTahunAjaranRelatedByTahunSelesai = null;
            $this->aTahunAjaranRelatedByTahunMulai = null;
            $this->aJenisBeasiswa = null;
            $this->collVldBeaPds = null;

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
            $con = Propel::getConnection(BeasiswaPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BeasiswaPesertaDidikQuery::create()
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
            $con = Propel::getConnection(BeasiswaPesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BeasiswaPesertaDidikPeer::addInstanceToPool($this);
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

            if ($this->aPesertaDidik !== null) {
                if ($this->aPesertaDidik->isModified() || $this->aPesertaDidik->isNew()) {
                    $affectedRows += $this->aPesertaDidik->save($con);
                }
                $this->setPesertaDidik($this->aPesertaDidik);
            }

            if ($this->aTahunAjaranRelatedByTahunSelesai !== null) {
                if ($this->aTahunAjaranRelatedByTahunSelesai->isModified() || $this->aTahunAjaranRelatedByTahunSelesai->isNew()) {
                    $affectedRows += $this->aTahunAjaranRelatedByTahunSelesai->save($con);
                }
                $this->setTahunAjaranRelatedByTahunSelesai($this->aTahunAjaranRelatedByTahunSelesai);
            }

            if ($this->aTahunAjaranRelatedByTahunMulai !== null) {
                if ($this->aTahunAjaranRelatedByTahunMulai->isModified() || $this->aTahunAjaranRelatedByTahunMulai->isNew()) {
                    $affectedRows += $this->aTahunAjaranRelatedByTahunMulai->save($con);
                }
                $this->setTahunAjaranRelatedByTahunMulai($this->aTahunAjaranRelatedByTahunMulai);
            }

            if ($this->aJenisBeasiswa !== null) {
                if ($this->aJenisBeasiswa->isModified() || $this->aJenisBeasiswa->isNew()) {
                    $affectedRows += $this->aJenisBeasiswa->save($con);
                }
                $this->setJenisBeasiswa($this->aJenisBeasiswa);
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

            if ($this->vldBeaPdsScheduledForDeletion !== null) {
                if (!$this->vldBeaPdsScheduledForDeletion->isEmpty()) {
                    VldBeaPdQuery::create()
                        ->filterByPrimaryKeys($this->vldBeaPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldBeaPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldBeaPds !== null) {
                foreach ($this->collVldBeaPds as $referrerFK) {
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
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"beasiswa_peserta_didik_id"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_beasiswa_id"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"keterangan"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::TAHUN_MULAI)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_mulai"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::TAHUN_SELESAI)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_selesai"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "beasiswa_peserta_didik" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"beasiswa_peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->beasiswa_peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_beasiswa_id"':						
                        $stmt->bindValue($identifier, $this->jenis_beasiswa_id, PDO::PARAM_INT);
                        break;
                    case '"keterangan"':						
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
                        break;
                    case '"tahun_mulai"':						
                        $stmt->bindValue($identifier, $this->tahun_mulai, PDO::PARAM_STR);
                        break;
                    case '"tahun_selesai"':						
                        $stmt->bindValue($identifier, $this->tahun_selesai, PDO::PARAM_STR);
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

            if ($this->aPesertaDidik !== null) {
                if (!$this->aPesertaDidik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPesertaDidik->getValidationFailures());
                }
            }

            if ($this->aTahunAjaranRelatedByTahunSelesai !== null) {
                if (!$this->aTahunAjaranRelatedByTahunSelesai->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaranRelatedByTahunSelesai->getValidationFailures());
                }
            }

            if ($this->aTahunAjaranRelatedByTahunMulai !== null) {
                if (!$this->aTahunAjaranRelatedByTahunMulai->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTahunAjaranRelatedByTahunMulai->getValidationFailures());
                }
            }

            if ($this->aJenisBeasiswa !== null) {
                if (!$this->aJenisBeasiswa->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisBeasiswa->getValidationFailures());
                }
            }


            if (($retval = BeasiswaPesertaDidikPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldBeaPds !== null) {
                    foreach ($this->collVldBeaPds as $referrerFK) {
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
        $pos = BeasiswaPesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getBeasiswaPesertaDidikId();
                break;
            case 1:
                return $this->getPesertaDidikId();
                break;
            case 2:
                return $this->getJenisBeasiswaId();
                break;
            case 3:
                return $this->getKeterangan();
                break;
            case 4:
                return $this->getTahunMulai();
                break;
            case 5:
                return $this->getTahunSelesai();
                break;
            case 6:
                return $this->getAsalData();
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
        if (isset($alreadyDumpedObjects['BeasiswaPesertaDidik'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['BeasiswaPesertaDidik'][$this->getPrimaryKey()] = true;
        $keys = BeasiswaPesertaDidikPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBeasiswaPesertaDidikId(),
            $keys[1] => $this->getPesertaDidikId(),
            $keys[2] => $this->getJenisBeasiswaId(),
            $keys[3] => $this->getKeterangan(),
            $keys[4] => $this->getTahunMulai(),
            $keys[5] => $this->getTahunSelesai(),
            $keys[6] => $this->getAsalData(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getSoftDelete(),
            $keys[10] => $this->getLastSync(),
            $keys[11] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aPesertaDidik) {
                $result['PesertaDidik'] = $this->aPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTahunAjaranRelatedByTahunSelesai) {
                $result['TahunAjaranRelatedByTahunSelesai'] = $this->aTahunAjaranRelatedByTahunSelesai->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTahunAjaranRelatedByTahunMulai) {
                $result['TahunAjaranRelatedByTahunMulai'] = $this->aTahunAjaranRelatedByTahunMulai->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisBeasiswa) {
                $result['JenisBeasiswa'] = $this->aJenisBeasiswa->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldBeaPds) {
                $result['VldBeaPds'] = $this->collVldBeaPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BeasiswaPesertaDidikPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setBeasiswaPesertaDidikId($value);
                break;
            case 1:
                $this->setPesertaDidikId($value);
                break;
            case 2:
                $this->setJenisBeasiswaId($value);
                break;
            case 3:
                $this->setKeterangan($value);
                break;
            case 4:
                $this->setTahunMulai($value);
                break;
            case 5:
                $this->setTahunSelesai($value);
                break;
            case 6:
                $this->setAsalData($value);
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
        $keys = BeasiswaPesertaDidikPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setBeasiswaPesertaDidikId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPesertaDidikId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenisBeasiswaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKeterangan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setTahunMulai($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTahunSelesai($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAsalData($arr[$keys[6]]);
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
        $criteria = new Criteria(BeasiswaPesertaDidikPeer::DATABASE_NAME);

        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID)) $criteria->add(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $this->beasiswa_peserta_didik_id);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID)) $criteria->add(BeasiswaPesertaDidikPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID)) $criteria->add(BeasiswaPesertaDidikPeer::JENIS_BEASISWA_ID, $this->jenis_beasiswa_id);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::KETERANGAN)) $criteria->add(BeasiswaPesertaDidikPeer::KETERANGAN, $this->keterangan);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::TAHUN_MULAI)) $criteria->add(BeasiswaPesertaDidikPeer::TAHUN_MULAI, $this->tahun_mulai);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::TAHUN_SELESAI)) $criteria->add(BeasiswaPesertaDidikPeer::TAHUN_SELESAI, $this->tahun_selesai);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::ASAL_DATA)) $criteria->add(BeasiswaPesertaDidikPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::CREATE_DATE)) $criteria->add(BeasiswaPesertaDidikPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::LAST_UPDATE)) $criteria->add(BeasiswaPesertaDidikPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::SOFT_DELETE)) $criteria->add(BeasiswaPesertaDidikPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::LAST_SYNC)) $criteria->add(BeasiswaPesertaDidikPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BeasiswaPesertaDidikPeer::UPDATER_ID)) $criteria->add(BeasiswaPesertaDidikPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(BeasiswaPesertaDidikPeer::DATABASE_NAME);
        $criteria->add(BeasiswaPesertaDidikPeer::BEASISWA_PESERTA_DIDIK_ID, $this->beasiswa_peserta_didik_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getBeasiswaPesertaDidikId();
    }

    /**
     * Generic method to set the primary key (beasiswa_peserta_didik_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBeasiswaPesertaDidikId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getBeasiswaPesertaDidikId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of BeasiswaPesertaDidik (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
        $copyObj->setJenisBeasiswaId($this->getJenisBeasiswaId());
        $copyObj->setKeterangan($this->getKeterangan());
        $copyObj->setTahunMulai($this->getTahunMulai());
        $copyObj->setTahunSelesai($this->getTahunSelesai());
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

            foreach ($this->getVldBeaPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldBeaPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBeasiswaPesertaDidikId(NULL); // this is a auto-increment column, so set to default value
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
     * @return BeasiswaPesertaDidik Clone of current object.
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
     * @return BeasiswaPesertaDidikPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BeasiswaPesertaDidikPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a PesertaDidik object.
     *
     * @param             PesertaDidik $v
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPesertaDidik(PesertaDidik $v = null)
    {
        if ($v === null) {
            $this->setPesertaDidikId(NULL);
        } else {
            $this->setPesertaDidikId($v->getPesertaDidikId());
        }

        $this->aPesertaDidik = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the PesertaDidik object, it will not be re-added.
        if ($v !== null) {
            $v->addBeasiswaPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated PesertaDidik object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return PesertaDidik The associated PesertaDidik object.
     * @throws PropelException
     */
    public function getPesertaDidik(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPesertaDidik === null && (($this->peserta_didik_id !== "" && $this->peserta_didik_id !== null)) && $doQuery) {
            $this->aPesertaDidik = PesertaDidikQuery::create()->findPk($this->peserta_didik_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPesertaDidik->addBeasiswaPesertaDidiks($this);
             */
        }

        return $this->aPesertaDidik;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTahunAjaranRelatedByTahunSelesai(TahunAjaran $v = null)
    {
        if ($v === null) {
            $this->setTahunSelesai(NULL);
        } else {
            $this->setTahunSelesai($v->getTahunAjaranId());
        }

        $this->aTahunAjaranRelatedByTahunSelesai = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TahunAjaran object, it will not be re-added.
        if ($v !== null) {
            $v->addBeasiswaPesertaDidikRelatedByTahunSelesai($this);
        }


        return $this;
    }


    /**
     * Get the associated TahunAjaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TahunAjaran The associated TahunAjaran object.
     * @throws PropelException
     */
    public function getTahunAjaranRelatedByTahunSelesai(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTahunAjaranRelatedByTahunSelesai === null && (($this->tahun_selesai !== "" && $this->tahun_selesai !== null)) && $doQuery) {
            $this->aTahunAjaranRelatedByTahunSelesai = TahunAjaranQuery::create()->findPk($this->tahun_selesai, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTahunAjaranRelatedByTahunSelesai->addBeasiswaPesertaDidiksRelatedByTahunSelesai($this);
             */
        }

        return $this->aTahunAjaranRelatedByTahunSelesai;
    }

    /**
     * Declares an association between this object and a TahunAjaran object.
     *
     * @param             TahunAjaran $v
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTahunAjaranRelatedByTahunMulai(TahunAjaran $v = null)
    {
        if ($v === null) {
            $this->setTahunMulai(NULL);
        } else {
            $this->setTahunMulai($v->getTahunAjaranId());
        }

        $this->aTahunAjaranRelatedByTahunMulai = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TahunAjaran object, it will not be re-added.
        if ($v !== null) {
            $v->addBeasiswaPesertaDidikRelatedByTahunMulai($this);
        }


        return $this;
    }


    /**
     * Get the associated TahunAjaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TahunAjaran The associated TahunAjaran object.
     * @throws PropelException
     */
    public function getTahunAjaranRelatedByTahunMulai(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTahunAjaranRelatedByTahunMulai === null && (($this->tahun_mulai !== "" && $this->tahun_mulai !== null)) && $doQuery) {
            $this->aTahunAjaranRelatedByTahunMulai = TahunAjaranQuery::create()->findPk($this->tahun_mulai, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTahunAjaranRelatedByTahunMulai->addBeasiswaPesertaDidiksRelatedByTahunMulai($this);
             */
        }

        return $this->aTahunAjaranRelatedByTahunMulai;
    }

    /**
     * Declares an association between this object and a JenisBeasiswa object.
     *
     * @param             JenisBeasiswa $v
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisBeasiswa(JenisBeasiswa $v = null)
    {
        if ($v === null) {
            $this->setJenisBeasiswaId(NULL);
        } else {
            $this->setJenisBeasiswaId($v->getJenisBeasiswaId());
        }

        $this->aJenisBeasiswa = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisBeasiswa object, it will not be re-added.
        if ($v !== null) {
            $v->addBeasiswaPesertaDidik($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisBeasiswa object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisBeasiswa The associated JenisBeasiswa object.
     * @throws PropelException
     */
    public function getJenisBeasiswa(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisBeasiswa === null && ($this->jenis_beasiswa_id !== null) && $doQuery) {
            $this->aJenisBeasiswa = JenisBeasiswaQuery::create()->findPk($this->jenis_beasiswa_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisBeasiswa->addBeasiswaPesertaDidiks($this);
             */
        }

        return $this->aJenisBeasiswa;
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
        if ('VldBeaPd' == $relationName) {
            $this->initVldBeaPds();
        }
    }

    /**
     * Clears out the collVldBeaPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     * @see        addVldBeaPds()
     */
    public function clearVldBeaPds()
    {
        $this->collVldBeaPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldBeaPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldBeaPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldBeaPds($v = true)
    {
        $this->collVldBeaPdsPartial = $v;
    }

    /**
     * Initializes the collVldBeaPds collection.
     *
     * By default this just sets the collVldBeaPds collection to an empty array (like clearcollVldBeaPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldBeaPds($overrideExisting = true)
    {
        if (null !== $this->collVldBeaPds && !$overrideExisting) {
            return;
        }
        $this->collVldBeaPds = new PropelObjectCollection();
        $this->collVldBeaPds->setModel('VldBeaPd');
    }

    /**
     * Gets an array of VldBeaPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this BeasiswaPesertaDidik is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldBeaPd[] List of VldBeaPd objects
     * @throws PropelException
     */
    public function getVldBeaPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPdsPartial && !$this->isNew();
        if (null === $this->collVldBeaPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPds) {
                // return empty collection
                $this->initVldBeaPds();
            } else {
                $collVldBeaPds = VldBeaPdQuery::create(null, $criteria)
                    ->filterByBeasiswaPesertaDidik($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldBeaPdsPartial && count($collVldBeaPds)) {
                      $this->initVldBeaPds(false);

                      foreach($collVldBeaPds as $obj) {
                        if (false == $this->collVldBeaPds->contains($obj)) {
                          $this->collVldBeaPds->append($obj);
                        }
                      }

                      $this->collVldBeaPdsPartial = true;
                    }

                    $collVldBeaPds->getInternalIterator()->rewind();
                    return $collVldBeaPds;
                }

                if($partial && $this->collVldBeaPds) {
                    foreach($this->collVldBeaPds as $obj) {
                        if($obj->isNew()) {
                            $collVldBeaPds[] = $obj;
                        }
                    }
                }

                $this->collVldBeaPds = $collVldBeaPds;
                $this->collVldBeaPdsPartial = false;
            }
        }

        return $this->collVldBeaPds;
    }

    /**
     * Sets a collection of VldBeaPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldBeaPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function setVldBeaPds(PropelCollection $vldBeaPds, PropelPDO $con = null)
    {
        $vldBeaPdsToDelete = $this->getVldBeaPds(new Criteria(), $con)->diff($vldBeaPds);

        $this->vldBeaPdsScheduledForDeletion = unserialize(serialize($vldBeaPdsToDelete));

        foreach ($vldBeaPdsToDelete as $vldBeaPdRemoved) {
            $vldBeaPdRemoved->setBeasiswaPesertaDidik(null);
        }

        $this->collVldBeaPds = null;
        foreach ($vldBeaPds as $vldBeaPd) {
            $this->addVldBeaPd($vldBeaPd);
        }

        $this->collVldBeaPds = $vldBeaPds;
        $this->collVldBeaPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldBeaPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldBeaPd objects.
     * @throws PropelException
     */
    public function countVldBeaPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldBeaPdsPartial && !$this->isNew();
        if (null === $this->collVldBeaPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldBeaPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldBeaPds());
            }
            $query = VldBeaPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBeasiswaPesertaDidik($this)
                ->count($con);
        }

        return count($this->collVldBeaPds);
    }

    /**
     * Method called to associate a VldBeaPd object to this object
     * through the VldBeaPd foreign key attribute.
     *
     * @param    VldBeaPd $l VldBeaPd
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function addVldBeaPd(VldBeaPd $l)
    {
        if ($this->collVldBeaPds === null) {
            $this->initVldBeaPds();
            $this->collVldBeaPdsPartial = true;
        }
        if (!in_array($l, $this->collVldBeaPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldBeaPd($l);
        }

        return $this;
    }

    /**
     * @param	VldBeaPd $vldBeaPd The vldBeaPd object to add.
     */
    protected function doAddVldBeaPd($vldBeaPd)
    {
        $this->collVldBeaPds[]= $vldBeaPd;
        $vldBeaPd->setBeasiswaPesertaDidik($this);
    }

    /**
     * @param	VldBeaPd $vldBeaPd The vldBeaPd object to remove.
     * @return BeasiswaPesertaDidik The current object (for fluent API support)
     */
    public function removeVldBeaPd($vldBeaPd)
    {
        if ($this->getVldBeaPds()->contains($vldBeaPd)) {
            $this->collVldBeaPds->remove($this->collVldBeaPds->search($vldBeaPd));
            if (null === $this->vldBeaPdsScheduledForDeletion) {
                $this->vldBeaPdsScheduledForDeletion = clone $this->collVldBeaPds;
                $this->vldBeaPdsScheduledForDeletion->clear();
            }
            $this->vldBeaPdsScheduledForDeletion[]= clone $vldBeaPd;
            $vldBeaPd->setBeasiswaPesertaDidik(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this BeasiswaPesertaDidik is new, it will return
     * an empty collection; or if this BeasiswaPesertaDidik has previously
     * been saved, it will retrieve related VldBeaPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in BeasiswaPesertaDidik.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldBeaPd[] List of VldBeaPd objects
     */
    public function getVldBeaPdsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldBeaPdQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldBeaPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->beasiswa_peserta_didik_id = null;
        $this->peserta_didik_id = null;
        $this->jenis_beasiswa_id = null;
        $this->keterangan = null;
        $this->tahun_mulai = null;
        $this->tahun_selesai = null;
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
            if ($this->collVldBeaPds) {
                foreach ($this->collVldBeaPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aPesertaDidik instanceof Persistent) {
              $this->aPesertaDidik->clearAllReferences($deep);
            }
            if ($this->aTahunAjaranRelatedByTahunSelesai instanceof Persistent) {
              $this->aTahunAjaranRelatedByTahunSelesai->clearAllReferences($deep);
            }
            if ($this->aTahunAjaranRelatedByTahunMulai instanceof Persistent) {
              $this->aTahunAjaranRelatedByTahunMulai->clearAllReferences($deep);
            }
            if ($this->aJenisBeasiswa instanceof Persistent) {
              $this->aJenisBeasiswa->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldBeaPds instanceof PropelCollection) {
            $this->collVldBeaPds->clearIterator();
        }
        $this->collVldBeaPds = null;
        $this->aPesertaDidik = null;
        $this->aTahunAjaranRelatedByTahunSelesai = null;
        $this->aTahunAjaranRelatedByTahunMulai = null;
        $this->aJenisBeasiswa = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BeasiswaPesertaDidikPeer::DEFAULT_STRING_FORMAT);
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
