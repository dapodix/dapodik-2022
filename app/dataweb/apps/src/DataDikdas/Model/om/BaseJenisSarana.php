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
use DataDikdas\Model\Alat;
use DataDikdas\Model\AlatQuery;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\AngkutanQuery;
use DataDikdas\Model\JenisSarana;
use DataDikdas\Model\JenisSaranaPeer;
use DataDikdas\Model\JenisSaranaQuery;
use DataDikdas\Model\PemakaiSarana;
use DataDikdas\Model\PemakaiSaranaQuery;
use DataDikdas\Model\StandarSarana;
use DataDikdas\Model\StandarSaranaQuery;

/**
 * Base class that represents a row from the 'ref.jenis_sarana' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisSarana extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisSaranaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisSaranaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_sarana_id field.
     * @var        int
     */
    protected $jenis_sarana_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the kelompok field.
     * @var        string
     */
    protected $kelompok;

    /**
     * The value for the perlu_penempatan field.
     * @var        string
     */
    protected $perlu_penempatan;

    /**
     * The value for the keterangan field.
     * @var        string
     */
    protected $keterangan;

    /**
     * The value for the a_alat field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_alat;

    /**
     * The value for the a_angkutan field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_angkutan;

    /**
     * The value for the spm_qty_min_per_siswa field.
     * Note: this column has a database default value of: '-1'
     * @var        string
     */
    protected $spm_qty_min_per_siswa;

    /**
     * The value for the spm_qty_min_per_sekolah field.
     * Note: this column has a database default value of: '-1'
     * @var        string
     */
    protected $spm_qty_min_per_sekolah;

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
     * @var        PropelObjectCollection|Alat[] Collection to store aggregation of Alat objects.
     */
    protected $collAlats;
    protected $collAlatsPartial;

    /**
     * @var        PropelObjectCollection|Angkutan[] Collection to store aggregation of Angkutan objects.
     */
    protected $collAngkutans;
    protected $collAngkutansPartial;

    /**
     * @var        PropelObjectCollection|PemakaiSarana[] Collection to store aggregation of PemakaiSarana objects.
     */
    protected $collPemakaiSaranas;
    protected $collPemakaiSaranasPartial;

    /**
     * @var        PropelObjectCollection|StandarSarana[] Collection to store aggregation of StandarSarana objects.
     */
    protected $collStandarSaranas;
    protected $collStandarSaranasPartial;

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
    protected $alatsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $angkutansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pemakaiSaranasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $standarSaranasScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->a_alat = '0';
        $this->a_angkutan = '0';
        $this->spm_qty_min_per_siswa = '-1';
        $this->spm_qty_min_per_sekolah = '-1';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJenisSarana object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenis_sarana_id] column value.
     * 
     * @return int
     */
    public function getJenisSaranaId()
    {
        return $this->jenis_sarana_id;
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
     * Get the [kelompok] column value.
     * 
     * @return string
     */
    public function getKelompok()
    {
        return $this->kelompok;
    }

    /**
     * Get the [perlu_penempatan] column value.
     * 
     * @return string
     */
    public function getPerluPenempatan()
    {
        return $this->perlu_penempatan;
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
     * Get the [a_alat] column value.
     * 
     * @return string
     */
    public function getAAlat()
    {
        return $this->a_alat;
    }

    /**
     * Get the [a_angkutan] column value.
     * 
     * @return string
     */
    public function getAAngkutan()
    {
        return $this->a_angkutan;
    }

    /**
     * Get the [spm_qty_min_per_siswa] column value.
     * 
     * @return string
     */
    public function getSpmQtyMinPerSiswa()
    {
        return $this->spm_qty_min_per_siswa;
    }

    /**
     * Get the [spm_qty_min_per_sekolah] column value.
     * 
     * @return string
     */
    public function getSpmQtyMinPerSekolah()
    {
        return $this->spm_qty_min_per_sekolah;
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
     * Set the value of [jenis_sarana_id] column.
     * 
     * @param int $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setJenisSaranaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_sarana_id !== $v) {
            $this->jenis_sarana_id = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::JENIS_SARANA_ID;
        }


        return $this;
    } // setJenisSaranaId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [kelompok] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setKelompok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kelompok !== $v) {
            $this->kelompok = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::KELOMPOK;
        }


        return $this;
    } // setKelompok()

    /**
     * Set the value of [perlu_penempatan] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setPerluPenempatan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->perlu_penempatan !== $v) {
            $this->perlu_penempatan = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::PERLU_PENEMPATAN;
        }


        return $this;
    } // setPerluPenempatan()

    /**
     * Set the value of [keterangan] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::KETERANGAN;
        }


        return $this;
    } // setKeterangan()

    /**
     * Set the value of [a_alat] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setAAlat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_alat !== $v) {
            $this->a_alat = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::A_ALAT;
        }


        return $this;
    } // setAAlat()

    /**
     * Set the value of [a_angkutan] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setAAngkutan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_angkutan !== $v) {
            $this->a_angkutan = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::A_ANGKUTAN;
        }


        return $this;
    } // setAAngkutan()

    /**
     * Set the value of [spm_qty_min_per_siswa] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setSpmQtyMinPerSiswa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->spm_qty_min_per_siswa !== $v) {
            $this->spm_qty_min_per_siswa = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA;
        }


        return $this;
    } // setSpmQtyMinPerSiswa()

    /**
     * Set the value of [spm_qty_min_per_sekolah] column.
     * 
     * @param string $v new value
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setSpmQtyMinPerSekolah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->spm_qty_min_per_sekolah !== $v) {
            $this->spm_qty_min_per_sekolah = $v;
            $this->modifiedColumns[] = JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH;
        }


        return $this;
    } // setSpmQtyMinPerSekolah()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisSaranaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisSaranaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisSaranaPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisSarana The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisSaranaPeer::LAST_SYNC;
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
            if ($this->a_alat !== '0') {
                return false;
            }

            if ($this->a_angkutan !== '0') {
                return false;
            }

            if ($this->spm_qty_min_per_siswa !== '-1') {
                return false;
            }

            if ($this->spm_qty_min_per_sekolah !== '-1') {
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

            $this->jenis_sarana_id = ($row[$startcol + 0] !== null) ? (int) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->kelompok = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->perlu_penempatan = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->keterangan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->a_alat = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->a_angkutan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->spm_qty_min_per_siswa = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->spm_qty_min_per_sekolah = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->create_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_update = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->expired_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_sync = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = JenisSaranaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisSarana object", $e);
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
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisSaranaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAlats = null;

            $this->collAngkutans = null;

            $this->collPemakaiSaranas = null;

            $this->collStandarSaranas = null;

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
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisSaranaQuery::create()
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
            $con = Propel::getConnection(JenisSaranaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisSaranaPeer::addInstanceToPool($this);
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

            if ($this->alatsScheduledForDeletion !== null) {
                if (!$this->alatsScheduledForDeletion->isEmpty()) {
                    AlatQuery::create()
                        ->filterByPrimaryKeys($this->alatsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alatsScheduledForDeletion = null;
                }
            }

            if ($this->collAlats !== null) {
                foreach ($this->collAlats as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->angkutansScheduledForDeletion !== null) {
                if (!$this->angkutansScheduledForDeletion->isEmpty()) {
                    AngkutanQuery::create()
                        ->filterByPrimaryKeys($this->angkutansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->angkutansScheduledForDeletion = null;
                }
            }

            if ($this->collAngkutans !== null) {
                foreach ($this->collAngkutans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pemakaiSaranasScheduledForDeletion !== null) {
                if (!$this->pemakaiSaranasScheduledForDeletion->isEmpty()) {
                    PemakaiSaranaQuery::create()
                        ->filterByPrimaryKeys($this->pemakaiSaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->pemakaiSaranasScheduledForDeletion = null;
                }
            }

            if ($this->collPemakaiSaranas !== null) {
                foreach ($this->collPemakaiSaranas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->standarSaranasScheduledForDeletion !== null) {
                if (!$this->standarSaranasScheduledForDeletion->isEmpty()) {
                    StandarSaranaQuery::create()
                        ->filterByPrimaryKeys($this->standarSaranasScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->standarSaranasScheduledForDeletion = null;
                }
            }

            if ($this->collStandarSaranas !== null) {
                foreach ($this->collStandarSaranas as $referrerFK) {
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
        if ($this->isColumnModified(JenisSaranaPeer::JENIS_SARANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_sarana_id"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::KELOMPOK)) {
            $modifiedColumns[':p' . $index++]  = '"kelompok"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::PERLU_PENEMPATAN)) {
            $modifiedColumns[':p' . $index++]  = '"perlu_penempatan"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"keterangan"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::A_ALAT)) {
            $modifiedColumns[':p' . $index++]  = '"a_alat"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::A_ANGKUTAN)) {
            $modifiedColumns[':p' . $index++]  = '"a_angkutan"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA)) {
            $modifiedColumns[':p' . $index++]  = '"spm_qty_min_per_siswa"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH)) {
            $modifiedColumns[':p' . $index++]  = '"spm_qty_min_per_sekolah"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisSaranaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_sarana" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_sarana_id"':						
                        $stmt->bindValue($identifier, $this->jenis_sarana_id, PDO::PARAM_INT);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"kelompok"':						
                        $stmt->bindValue($identifier, $this->kelompok, PDO::PARAM_STR);
                        break;
                    case '"perlu_penempatan"':						
                        $stmt->bindValue($identifier, $this->perlu_penempatan, PDO::PARAM_STR);
                        break;
                    case '"keterangan"':						
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
                        break;
                    case '"a_alat"':						
                        $stmt->bindValue($identifier, $this->a_alat, PDO::PARAM_STR);
                        break;
                    case '"a_angkutan"':						
                        $stmt->bindValue($identifier, $this->a_angkutan, PDO::PARAM_STR);
                        break;
                    case '"spm_qty_min_per_siswa"':						
                        $stmt->bindValue($identifier, $this->spm_qty_min_per_siswa, PDO::PARAM_STR);
                        break;
                    case '"spm_qty_min_per_sekolah"':						
                        $stmt->bindValue($identifier, $this->spm_qty_min_per_sekolah, PDO::PARAM_STR);
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


            if (($retval = JenisSaranaPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlats !== null) {
                    foreach ($this->collAlats as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAngkutans !== null) {
                    foreach ($this->collAngkutans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPemakaiSaranas !== null) {
                    foreach ($this->collPemakaiSaranas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collStandarSaranas !== null) {
                    foreach ($this->collStandarSaranas as $referrerFK) {
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
        $pos = JenisSaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisSaranaId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getKelompok();
                break;
            case 3:
                return $this->getPerluPenempatan();
                break;
            case 4:
                return $this->getKeterangan();
                break;
            case 5:
                return $this->getAAlat();
                break;
            case 6:
                return $this->getAAngkutan();
                break;
            case 7:
                return $this->getSpmQtyMinPerSiswa();
                break;
            case 8:
                return $this->getSpmQtyMinPerSekolah();
                break;
            case 9:
                return $this->getCreateDate();
                break;
            case 10:
                return $this->getLastUpdate();
                break;
            case 11:
                return $this->getExpiredDate();
                break;
            case 12:
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
        if (isset($alreadyDumpedObjects['JenisSarana'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisSarana'][$this->getPrimaryKey()] = true;
        $keys = JenisSaranaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisSaranaId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getKelompok(),
            $keys[3] => $this->getPerluPenempatan(),
            $keys[4] => $this->getKeterangan(),
            $keys[5] => $this->getAAlat(),
            $keys[6] => $this->getAAngkutan(),
            $keys[7] => $this->getSpmQtyMinPerSiswa(),
            $keys[8] => $this->getSpmQtyMinPerSekolah(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getExpiredDate(),
            $keys[12] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAlats) {
                $result['Alats'] = $this->collAlats->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAngkutans) {
                $result['Angkutans'] = $this->collAngkutans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPemakaiSaranas) {
                $result['PemakaiSaranas'] = $this->collPemakaiSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collStandarSaranas) {
                $result['StandarSaranas'] = $this->collStandarSaranas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisSaranaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisSaranaId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setKelompok($value);
                break;
            case 3:
                $this->setPerluPenempatan($value);
                break;
            case 4:
                $this->setKeterangan($value);
                break;
            case 5:
                $this->setAAlat($value);
                break;
            case 6:
                $this->setAAngkutan($value);
                break;
            case 7:
                $this->setSpmQtyMinPerSiswa($value);
                break;
            case 8:
                $this->setSpmQtyMinPerSekolah($value);
                break;
            case 9:
                $this->setCreateDate($value);
                break;
            case 10:
                $this->setLastUpdate($value);
                break;
            case 11:
                $this->setExpiredDate($value);
                break;
            case 12:
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
        $keys = JenisSaranaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisSaranaId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKelompok($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPerluPenempatan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKeterangan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setAAlat($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAAngkutan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSpmQtyMinPerSiswa($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSpmQtyMinPerSekolah($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreateDate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastUpdate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setExpiredDate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastSync($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisSaranaPeer::JENIS_SARANA_ID)) $criteria->add(JenisSaranaPeer::JENIS_SARANA_ID, $this->jenis_sarana_id);
        if ($this->isColumnModified(JenisSaranaPeer::NAMA)) $criteria->add(JenisSaranaPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenisSaranaPeer::KELOMPOK)) $criteria->add(JenisSaranaPeer::KELOMPOK, $this->kelompok);
        if ($this->isColumnModified(JenisSaranaPeer::PERLU_PENEMPATAN)) $criteria->add(JenisSaranaPeer::PERLU_PENEMPATAN, $this->perlu_penempatan);
        if ($this->isColumnModified(JenisSaranaPeer::KETERANGAN)) $criteria->add(JenisSaranaPeer::KETERANGAN, $this->keterangan);
        if ($this->isColumnModified(JenisSaranaPeer::A_ALAT)) $criteria->add(JenisSaranaPeer::A_ALAT, $this->a_alat);
        if ($this->isColumnModified(JenisSaranaPeer::A_ANGKUTAN)) $criteria->add(JenisSaranaPeer::A_ANGKUTAN, $this->a_angkutan);
        if ($this->isColumnModified(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA)) $criteria->add(JenisSaranaPeer::SPM_QTY_MIN_PER_SISWA, $this->spm_qty_min_per_siswa);
        if ($this->isColumnModified(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH)) $criteria->add(JenisSaranaPeer::SPM_QTY_MIN_PER_SEKOLAH, $this->spm_qty_min_per_sekolah);
        if ($this->isColumnModified(JenisSaranaPeer::CREATE_DATE)) $criteria->add(JenisSaranaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisSaranaPeer::LAST_UPDATE)) $criteria->add(JenisSaranaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisSaranaPeer::EXPIRED_DATE)) $criteria->add(JenisSaranaPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisSaranaPeer::LAST_SYNC)) $criteria->add(JenisSaranaPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisSaranaPeer::DATABASE_NAME);
        $criteria->add(JenisSaranaPeer::JENIS_SARANA_ID, $this->jenis_sarana_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return int
     */
    public function getPrimaryKey()
    {
        return $this->getJenisSaranaId();
    }

    /**
     * Generic method to set the primary key (jenis_sarana_id column).
     *
     * @param  int $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisSaranaId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisSaranaId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisSarana (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setKelompok($this->getKelompok());
        $copyObj->setPerluPenempatan($this->getPerluPenempatan());
        $copyObj->setKeterangan($this->getKeterangan());
        $copyObj->setAAlat($this->getAAlat());
        $copyObj->setAAngkutan($this->getAAngkutan());
        $copyObj->setSpmQtyMinPerSiswa($this->getSpmQtyMinPerSiswa());
        $copyObj->setSpmQtyMinPerSekolah($this->getSpmQtyMinPerSekolah());
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

            foreach ($this->getAlats() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlat($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAngkutans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAngkutan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPemakaiSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPemakaiSarana($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getStandarSaranas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addStandarSarana($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisSaranaId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisSarana Clone of current object.
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
     * @return JenisSaranaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisSaranaPeer();
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
        if ('Alat' == $relationName) {
            $this->initAlats();
        }
        if ('Angkutan' == $relationName) {
            $this->initAngkutans();
        }
        if ('PemakaiSarana' == $relationName) {
            $this->initPemakaiSaranas();
        }
        if ('StandarSarana' == $relationName) {
            $this->initStandarSaranas();
        }
    }

    /**
     * Clears out the collAlats collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisSarana The current object (for fluent API support)
     * @see        addAlats()
     */
    public function clearAlats()
    {
        $this->collAlats = null; // important to set this to null since that means it is uninitialized
        $this->collAlatsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlats collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlats($v = true)
    {
        $this->collAlatsPartial = $v;
    }

    /**
     * Initializes the collAlats collection.
     *
     * By default this just sets the collAlats collection to an empty array (like clearcollAlats());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlats($overrideExisting = true)
    {
        if (null !== $this->collAlats && !$overrideExisting) {
            return;
        }
        $this->collAlats = new PropelObjectCollection();
        $this->collAlats->setModel('Alat');
    }

    /**
     * Gets an array of Alat objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisSarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Alat[] List of Alat objects
     * @throws PropelException
     */
    public function getAlats($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                // return empty collection
                $this->initAlats();
            } else {
                $collAlats = AlatQuery::create(null, $criteria)
                    ->filterByJenisSarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatsPartial && count($collAlats)) {
                      $this->initAlats(false);

                      foreach($collAlats as $obj) {
                        if (false == $this->collAlats->contains($obj)) {
                          $this->collAlats->append($obj);
                        }
                      }

                      $this->collAlatsPartial = true;
                    }

                    $collAlats->getInternalIterator()->rewind();
                    return $collAlats;
                }

                if($partial && $this->collAlats) {
                    foreach($this->collAlats as $obj) {
                        if($obj->isNew()) {
                            $collAlats[] = $obj;
                        }
                    }
                }

                $this->collAlats = $collAlats;
                $this->collAlatsPartial = false;
            }
        }

        return $this->collAlats;
    }

    /**
     * Sets a collection of Alat objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alats A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setAlats(PropelCollection $alats, PropelPDO $con = null)
    {
        $alatsToDelete = $this->getAlats(new Criteria(), $con)->diff($alats);

        $this->alatsScheduledForDeletion = unserialize(serialize($alatsToDelete));

        foreach ($alatsToDelete as $alatRemoved) {
            $alatRemoved->setJenisSarana(null);
        }

        $this->collAlats = null;
        foreach ($alats as $alat) {
            $this->addAlat($alat);
        }

        $this->collAlats = $alats;
        $this->collAlatsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Alat objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Alat objects.
     * @throws PropelException
     */
    public function countAlats(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatsPartial && !$this->isNew();
        if (null === $this->collAlats || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlats) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlats());
            }
            $query = AlatQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisSarana($this)
                ->count($con);
        }

        return count($this->collAlats);
    }

    /**
     * Method called to associate a Alat object to this object
     * through the Alat foreign key attribute.
     *
     * @param    Alat $l Alat
     * @return JenisSarana The current object (for fluent API support)
     */
    public function addAlat(Alat $l)
    {
        if ($this->collAlats === null) {
            $this->initAlats();
            $this->collAlatsPartial = true;
        }
        if (!in_array($l, $this->collAlats->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlat($l);
        }

        return $this;
    }

    /**
     * @param	Alat $alat The alat object to add.
     */
    protected function doAddAlat($alat)
    {
        $this->collAlats[]= $alat;
        $alat->setJenisSarana($this);
    }

    /**
     * @param	Alat $alat The alat object to remove.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function removeAlat($alat)
    {
        if ($this->getAlats()->contains($alat)) {
            $this->collAlats->remove($this->collAlats->search($alat));
            if (null === $this->alatsScheduledForDeletion) {
                $this->alatsScheduledForDeletion = clone $this->collAlats;
                $this->alatsScheduledForDeletion->clear();
            }
            $this->alatsScheduledForDeletion[]= clone $alat;
            $alat->setJenisSarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAlats($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Alats from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Alat[] List of Alat objects
     */
    public function getAlatsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAlats($query, $con);
    }

    /**
     * Clears out the collAngkutans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisSarana The current object (for fluent API support)
     * @see        addAngkutans()
     */
    public function clearAngkutans()
    {
        $this->collAngkutans = null; // important to set this to null since that means it is uninitialized
        $this->collAngkutansPartial = null;

        return $this;
    }

    /**
     * reset is the collAngkutans collection loaded partially
     *
     * @return void
     */
    public function resetPartialAngkutans($v = true)
    {
        $this->collAngkutansPartial = $v;
    }

    /**
     * Initializes the collAngkutans collection.
     *
     * By default this just sets the collAngkutans collection to an empty array (like clearcollAngkutans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAngkutans($overrideExisting = true)
    {
        if (null !== $this->collAngkutans && !$overrideExisting) {
            return;
        }
        $this->collAngkutans = new PropelObjectCollection();
        $this->collAngkutans->setModel('Angkutan');
    }

    /**
     * Gets an array of Angkutan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisSarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     * @throws PropelException
     */
    public function getAngkutans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                // return empty collection
                $this->initAngkutans();
            } else {
                $collAngkutans = AngkutanQuery::create(null, $criteria)
                    ->filterByJenisSarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAngkutansPartial && count($collAngkutans)) {
                      $this->initAngkutans(false);

                      foreach($collAngkutans as $obj) {
                        if (false == $this->collAngkutans->contains($obj)) {
                          $this->collAngkutans->append($obj);
                        }
                      }

                      $this->collAngkutansPartial = true;
                    }

                    $collAngkutans->getInternalIterator()->rewind();
                    return $collAngkutans;
                }

                if($partial && $this->collAngkutans) {
                    foreach($this->collAngkutans as $obj) {
                        if($obj->isNew()) {
                            $collAngkutans[] = $obj;
                        }
                    }
                }

                $this->collAngkutans = $collAngkutans;
                $this->collAngkutansPartial = false;
            }
        }

        return $this->collAngkutans;
    }

    /**
     * Sets a collection of Angkutan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $angkutans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setAngkutans(PropelCollection $angkutans, PropelPDO $con = null)
    {
        $angkutansToDelete = $this->getAngkutans(new Criteria(), $con)->diff($angkutans);

        $this->angkutansScheduledForDeletion = unserialize(serialize($angkutansToDelete));

        foreach ($angkutansToDelete as $angkutanRemoved) {
            $angkutanRemoved->setJenisSarana(null);
        }

        $this->collAngkutans = null;
        foreach ($angkutans as $angkutan) {
            $this->addAngkutan($angkutan);
        }

        $this->collAngkutans = $angkutans;
        $this->collAngkutansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Angkutan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Angkutan objects.
     * @throws PropelException
     */
    public function countAngkutans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAngkutansPartial && !$this->isNew();
        if (null === $this->collAngkutans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAngkutans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAngkutans());
            }
            $query = AngkutanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisSarana($this)
                ->count($con);
        }

        return count($this->collAngkutans);
    }

    /**
     * Method called to associate a Angkutan object to this object
     * through the Angkutan foreign key attribute.
     *
     * @param    Angkutan $l Angkutan
     * @return JenisSarana The current object (for fluent API support)
     */
    public function addAngkutan(Angkutan $l)
    {
        if ($this->collAngkutans === null) {
            $this->initAngkutans();
            $this->collAngkutansPartial = true;
        }
        if (!in_array($l, $this->collAngkutans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAngkutan($l);
        }

        return $this;
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to add.
     */
    protected function doAddAngkutan($angkutan)
    {
        $this->collAngkutans[]= $angkutan;
        $angkutan->setJenisSarana($this);
    }

    /**
     * @param	Angkutan $angkutan The angkutan object to remove.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function removeAngkutan($angkutan)
    {
        if ($this->getAngkutans()->contains($angkutan)) {
            $this->collAngkutans->remove($this->collAngkutans->search($angkutan));
            if (null === $this->angkutansScheduledForDeletion) {
                $this->angkutansScheduledForDeletion = clone $this->collAngkutans;
                $this->angkutansScheduledForDeletion->clear();
            }
            $this->angkutansScheduledForDeletion[]= clone $angkutan;
            $angkutan->setJenisSarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinStatusKepemilikanSarpras($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('StatusKepemilikanSarpras', $join_behavior);

        return $this->getAngkutans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related Angkutans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Angkutan[] List of Angkutan objects
     */
    public function getAngkutansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getAngkutans($query, $con);
    }

    /**
     * Clears out the collPemakaiSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisSarana The current object (for fluent API support)
     * @see        addPemakaiSaranas()
     */
    public function clearPemakaiSaranas()
    {
        $this->collPemakaiSaranas = null; // important to set this to null since that means it is uninitialized
        $this->collPemakaiSaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collPemakaiSaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialPemakaiSaranas($v = true)
    {
        $this->collPemakaiSaranasPartial = $v;
    }

    /**
     * Initializes the collPemakaiSaranas collection.
     *
     * By default this just sets the collPemakaiSaranas collection to an empty array (like clearcollPemakaiSaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPemakaiSaranas($overrideExisting = true)
    {
        if (null !== $this->collPemakaiSaranas && !$overrideExisting) {
            return;
        }
        $this->collPemakaiSaranas = new PropelObjectCollection();
        $this->collPemakaiSaranas->setModel('PemakaiSarana');
    }

    /**
     * Gets an array of PemakaiSarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisSarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PemakaiSarana[] List of PemakaiSarana objects
     * @throws PropelException
     */
    public function getPemakaiSaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiSaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiSaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPemakaiSaranas) {
                // return empty collection
                $this->initPemakaiSaranas();
            } else {
                $collPemakaiSaranas = PemakaiSaranaQuery::create(null, $criteria)
                    ->filterByJenisSarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPemakaiSaranasPartial && count($collPemakaiSaranas)) {
                      $this->initPemakaiSaranas(false);

                      foreach($collPemakaiSaranas as $obj) {
                        if (false == $this->collPemakaiSaranas->contains($obj)) {
                          $this->collPemakaiSaranas->append($obj);
                        }
                      }

                      $this->collPemakaiSaranasPartial = true;
                    }

                    $collPemakaiSaranas->getInternalIterator()->rewind();
                    return $collPemakaiSaranas;
                }

                if($partial && $this->collPemakaiSaranas) {
                    foreach($this->collPemakaiSaranas as $obj) {
                        if($obj->isNew()) {
                            $collPemakaiSaranas[] = $obj;
                        }
                    }
                }

                $this->collPemakaiSaranas = $collPemakaiSaranas;
                $this->collPemakaiSaranasPartial = false;
            }
        }

        return $this->collPemakaiSaranas;
    }

    /**
     * Sets a collection of PemakaiSarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pemakaiSaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setPemakaiSaranas(PropelCollection $pemakaiSaranas, PropelPDO $con = null)
    {
        $pemakaiSaranasToDelete = $this->getPemakaiSaranas(new Criteria(), $con)->diff($pemakaiSaranas);

        $this->pemakaiSaranasScheduledForDeletion = unserialize(serialize($pemakaiSaranasToDelete));

        foreach ($pemakaiSaranasToDelete as $pemakaiSaranaRemoved) {
            $pemakaiSaranaRemoved->setJenisSarana(null);
        }

        $this->collPemakaiSaranas = null;
        foreach ($pemakaiSaranas as $pemakaiSarana) {
            $this->addPemakaiSarana($pemakaiSarana);
        }

        $this->collPemakaiSaranas = $pemakaiSaranas;
        $this->collPemakaiSaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PemakaiSarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PemakaiSarana objects.
     * @throws PropelException
     */
    public function countPemakaiSaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPemakaiSaranasPartial && !$this->isNew();
        if (null === $this->collPemakaiSaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPemakaiSaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPemakaiSaranas());
            }
            $query = PemakaiSaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisSarana($this)
                ->count($con);
        }

        return count($this->collPemakaiSaranas);
    }

    /**
     * Method called to associate a PemakaiSarana object to this object
     * through the PemakaiSarana foreign key attribute.
     *
     * @param    PemakaiSarana $l PemakaiSarana
     * @return JenisSarana The current object (for fluent API support)
     */
    public function addPemakaiSarana(PemakaiSarana $l)
    {
        if ($this->collPemakaiSaranas === null) {
            $this->initPemakaiSaranas();
            $this->collPemakaiSaranasPartial = true;
        }
        if (!in_array($l, $this->collPemakaiSaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPemakaiSarana($l);
        }

        return $this;
    }

    /**
     * @param	PemakaiSarana $pemakaiSarana The pemakaiSarana object to add.
     */
    protected function doAddPemakaiSarana($pemakaiSarana)
    {
        $this->collPemakaiSaranas[]= $pemakaiSarana;
        $pemakaiSarana->setJenisSarana($this);
    }

    /**
     * @param	PemakaiSarana $pemakaiSarana The pemakaiSarana object to remove.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function removePemakaiSarana($pemakaiSarana)
    {
        if ($this->getPemakaiSaranas()->contains($pemakaiSarana)) {
            $this->collPemakaiSaranas->remove($this->collPemakaiSaranas->search($pemakaiSarana));
            if (null === $this->pemakaiSaranasScheduledForDeletion) {
                $this->pemakaiSaranasScheduledForDeletion = clone $this->collPemakaiSaranas;
                $this->pemakaiSaranasScheduledForDeletion->clear();
            }
            $this->pemakaiSaranasScheduledForDeletion[]= clone $pemakaiSarana;
            $pemakaiSarana->setJenisSarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related PemakaiSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PemakaiSarana[] List of PemakaiSarana objects
     */
    public function getPemakaiSaranasJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PemakaiSaranaQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getPemakaiSaranas($query, $con);
    }

    /**
     * Clears out the collStandarSaranas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisSarana The current object (for fluent API support)
     * @see        addStandarSaranas()
     */
    public function clearStandarSaranas()
    {
        $this->collStandarSaranas = null; // important to set this to null since that means it is uninitialized
        $this->collStandarSaranasPartial = null;

        return $this;
    }

    /**
     * reset is the collStandarSaranas collection loaded partially
     *
     * @return void
     */
    public function resetPartialStandarSaranas($v = true)
    {
        $this->collStandarSaranasPartial = $v;
    }

    /**
     * Initializes the collStandarSaranas collection.
     *
     * By default this just sets the collStandarSaranas collection to an empty array (like clearcollStandarSaranas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initStandarSaranas($overrideExisting = true)
    {
        if (null !== $this->collStandarSaranas && !$overrideExisting) {
            return;
        }
        $this->collStandarSaranas = new PropelObjectCollection();
        $this->collStandarSaranas->setModel('StandarSarana');
    }

    /**
     * Gets an array of StandarSarana objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisSarana is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     * @throws PropelException
     */
    public function getStandarSaranas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                // return empty collection
                $this->initStandarSaranas();
            } else {
                $collStandarSaranas = StandarSaranaQuery::create(null, $criteria)
                    ->filterByJenisSarana($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collStandarSaranasPartial && count($collStandarSaranas)) {
                      $this->initStandarSaranas(false);

                      foreach($collStandarSaranas as $obj) {
                        if (false == $this->collStandarSaranas->contains($obj)) {
                          $this->collStandarSaranas->append($obj);
                        }
                      }

                      $this->collStandarSaranasPartial = true;
                    }

                    $collStandarSaranas->getInternalIterator()->rewind();
                    return $collStandarSaranas;
                }

                if($partial && $this->collStandarSaranas) {
                    foreach($this->collStandarSaranas as $obj) {
                        if($obj->isNew()) {
                            $collStandarSaranas[] = $obj;
                        }
                    }
                }

                $this->collStandarSaranas = $collStandarSaranas;
                $this->collStandarSaranasPartial = false;
            }
        }

        return $this->collStandarSaranas;
    }

    /**
     * Sets a collection of StandarSarana objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $standarSaranas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisSarana The current object (for fluent API support)
     */
    public function setStandarSaranas(PropelCollection $standarSaranas, PropelPDO $con = null)
    {
        $standarSaranasToDelete = $this->getStandarSaranas(new Criteria(), $con)->diff($standarSaranas);

        $this->standarSaranasScheduledForDeletion = unserialize(serialize($standarSaranasToDelete));

        foreach ($standarSaranasToDelete as $standarSaranaRemoved) {
            $standarSaranaRemoved->setJenisSarana(null);
        }

        $this->collStandarSaranas = null;
        foreach ($standarSaranas as $standarSarana) {
            $this->addStandarSarana($standarSarana);
        }

        $this->collStandarSaranas = $standarSaranas;
        $this->collStandarSaranasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related StandarSarana objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related StandarSarana objects.
     * @throws PropelException
     */
    public function countStandarSaranas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collStandarSaranasPartial && !$this->isNew();
        if (null === $this->collStandarSaranas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collStandarSaranas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getStandarSaranas());
            }
            $query = StandarSaranaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisSarana($this)
                ->count($con);
        }

        return count($this->collStandarSaranas);
    }

    /**
     * Method called to associate a StandarSarana object to this object
     * through the StandarSarana foreign key attribute.
     *
     * @param    StandarSarana $l StandarSarana
     * @return JenisSarana The current object (for fluent API support)
     */
    public function addStandarSarana(StandarSarana $l)
    {
        if ($this->collStandarSaranas === null) {
            $this->initStandarSaranas();
            $this->collStandarSaranasPartial = true;
        }
        if (!in_array($l, $this->collStandarSaranas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddStandarSarana($l);
        }

        return $this;
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to add.
     */
    protected function doAddStandarSarana($standarSarana)
    {
        $this->collStandarSaranas[]= $standarSarana;
        $standarSarana->setJenisSarana($this);
    }

    /**
     * @param	StandarSarana $standarSarana The standarSarana object to remove.
     * @return JenisSarana The current object (for fluent API support)
     */
    public function removeStandarSarana($standarSarana)
    {
        if ($this->getStandarSaranas()->contains($standarSarana)) {
            $this->collStandarSaranas->remove($this->collStandarSaranas->search($standarSarana));
            if (null === $this->standarSaranasScheduledForDeletion) {
                $this->standarSaranasScheduledForDeletion = clone $this->collStandarSaranas;
                $this->standarSaranasScheduledForDeletion->clear();
            }
            $this->standarSaranasScheduledForDeletion[]= clone $standarSarana;
            $standarSarana->setJenisSarana(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinBentukPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('BentukPendidikan', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJenisPrasarana($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('JenisPrasarana', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisSarana is new, it will return
     * an empty collection; or if this JenisSarana has previously
     * been saved, it will retrieve related StandarSaranas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisSarana.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|StandarSarana[] List of StandarSarana objects
     */
    public function getStandarSaranasJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = StandarSaranaQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getStandarSaranas($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_sarana_id = null;
        $this->nama = null;
        $this->kelompok = null;
        $this->perlu_penempatan = null;
        $this->keterangan = null;
        $this->a_alat = null;
        $this->a_angkutan = null;
        $this->spm_qty_min_per_siswa = null;
        $this->spm_qty_min_per_sekolah = null;
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
            if ($this->collAlats) {
                foreach ($this->collAlats as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAngkutans) {
                foreach ($this->collAngkutans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPemakaiSaranas) {
                foreach ($this->collPemakaiSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collStandarSaranas) {
                foreach ($this->collStandarSaranas as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlats instanceof PropelCollection) {
            $this->collAlats->clearIterator();
        }
        $this->collAlats = null;
        if ($this->collAngkutans instanceof PropelCollection) {
            $this->collAngkutans->clearIterator();
        }
        $this->collAngkutans = null;
        if ($this->collPemakaiSaranas instanceof PropelCollection) {
            $this->collPemakaiSaranas->clearIterator();
        }
        $this->collPemakaiSaranas = null;
        if ($this->collStandarSaranas instanceof PropelCollection) {
            $this->collStandarSaranas->clearIterator();
        }
        $this->collStandarSaranas = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisSaranaPeer::DEFAULT_STRING_FORMAT);
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
