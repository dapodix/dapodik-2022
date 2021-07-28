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
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\KompetensiPeer;
use DataDikdas\Model\KompetensiQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a row from the 'ref.kompetensi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKompetensi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\KompetensiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        KompetensiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_komp field.
     * @var        string
     */
    protected $id_komp;

    /**
     * The value for the desk field.
     * @var        string
     */
    protected $desk;

    /**
     * The value for the nmr field.
     * @var        string
     */
    protected $nmr;

    /**
     * The value for the kelompok field.
     * @var        string
     */
    protected $kelompok;

    /**
     * The value for the versi field.
     * @var        int
     */
    protected $versi;

    /**
     * The value for the id_inti_dasar field.
     * @var        string
     */
    protected $id_inti_dasar;

    /**
     * The value for the level_komp field.
     * @var        string
     */
    protected $level_komp;

    /**
     * The value for the tingkat_pendidikan_id field.
     * @var        string
     */
    protected $tingkat_pendidikan_id;

    /**
     * The value for the kurikulum_id field.
     * @var        int
     */
    protected $kurikulum_id;

    /**
     * The value for the mata_pelajaran_id field.
     * @var        int
     */
    protected $mata_pelajaran_id;

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
     * @var        Kompetensi
     */
    protected $aKompetensiRelatedByIdIntiDasar;

    /**
     * @var        Kurikulum
     */
    protected $aKurikulum;

    /**
     * @var        MataPelajaran
     */
    protected $aMataPelajaran;

    /**
     * @var        TingkatPendidikan
     */
    protected $aTingkatPendidikan;

    /**
     * @var        PropelObjectCollection|Kompetensi[] Collection to store aggregation of Kompetensi objects.
     */
    protected $collKompetensisRelatedByIdKomp;
    protected $collKompetensisRelatedByIdKompPartial;

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
    protected $kompetensisRelatedByIdKompScheduledForDeletion = null;

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
     * Initializes internal state of BaseKompetensi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_komp] column value.
     * 
     * @return string
     */
    public function getIdKomp()
    {
        return $this->id_komp;
    }

    /**
     * Get the [desk] column value.
     * 
     * @return string
     */
    public function getDesk()
    {
        return $this->desk;
    }

    /**
     * Get the [nmr] column value.
     * 
     * @return string
     */
    public function getNmr()
    {
        return $this->nmr;
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
     * Get the [versi] column value.
     * 
     * @return int
     */
    public function getVersi()
    {
        return $this->versi;
    }

    /**
     * Get the [id_inti_dasar] column value.
     * 
     * @return string
     */
    public function getIdIntiDasar()
    {
        return $this->id_inti_dasar;
    }

    /**
     * Get the [level_komp] column value.
     * 
     * @return string
     */
    public function getLevelKomp()
    {
        return $this->level_komp;
    }

    /**
     * Get the [tingkat_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getTingkatPendidikanId()
    {
        return $this->tingkat_pendidikan_id;
    }

    /**
     * Get the [kurikulum_id] column value.
     * 
     * @return int
     */
    public function getKurikulumId()
    {
        return $this->kurikulum_id;
    }

    /**
     * Get the [mata_pelajaran_id] column value.
     * 
     * @return int
     */
    public function getMataPelajaranId()
    {
        return $this->mata_pelajaran_id;
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
     * Set the value of [id_komp] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setIdKomp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_komp !== $v) {
            $this->id_komp = $v;
            $this->modifiedColumns[] = KompetensiPeer::ID_KOMP;
        }


        return $this;
    } // setIdKomp()

    /**
     * Set the value of [desk] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setDesk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->desk !== $v) {
            $this->desk = $v;
            $this->modifiedColumns[] = KompetensiPeer::DESK;
        }


        return $this;
    } // setDesk()

    /**
     * Set the value of [nmr] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setNmr($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nmr !== $v) {
            $this->nmr = $v;
            $this->modifiedColumns[] = KompetensiPeer::NMR;
        }


        return $this;
    } // setNmr()

    /**
     * Set the value of [kelompok] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setKelompok($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kelompok !== $v) {
            $this->kelompok = $v;
            $this->modifiedColumns[] = KompetensiPeer::KELOMPOK;
        }


        return $this;
    } // setKelompok()

    /**
     * Set the value of [versi] column.
     * 
     * @param int $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setVersi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->versi !== $v) {
            $this->versi = $v;
            $this->modifiedColumns[] = KompetensiPeer::VERSI;
        }


        return $this;
    } // setVersi()

    /**
     * Set the value of [id_inti_dasar] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setIdIntiDasar($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_inti_dasar !== $v) {
            $this->id_inti_dasar = $v;
            $this->modifiedColumns[] = KompetensiPeer::ID_INTI_DASAR;
        }

        if ($this->aKompetensiRelatedByIdIntiDasar !== null && $this->aKompetensiRelatedByIdIntiDasar->getIdKomp() !== $v) {
            $this->aKompetensiRelatedByIdIntiDasar = null;
        }


        return $this;
    } // setIdIntiDasar()

    /**
     * Set the value of [level_komp] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setLevelKomp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level_komp !== $v) {
            $this->level_komp = $v;
            $this->modifiedColumns[] = KompetensiPeer::LEVEL_KOMP;
        }


        return $this;
    } // setLevelKomp()

    /**
     * Set the value of [tingkat_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setTingkatPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat_pendidikan_id !== $v) {
            $this->tingkat_pendidikan_id = $v;
            $this->modifiedColumns[] = KompetensiPeer::TINGKAT_PENDIDIKAN_ID;
        }

        if ($this->aTingkatPendidikan !== null && $this->aTingkatPendidikan->getTingkatPendidikanId() !== $v) {
            $this->aTingkatPendidikan = null;
        }


        return $this;
    } // setTingkatPendidikanId()

    /**
     * Set the value of [kurikulum_id] column.
     * 
     * @param int $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setKurikulumId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->kurikulum_id !== $v) {
            $this->kurikulum_id = $v;
            $this->modifiedColumns[] = KompetensiPeer::KURIKULUM_ID;
        }

        if ($this->aKurikulum !== null && $this->aKurikulum->getKurikulumId() !== $v) {
            $this->aKurikulum = null;
        }


        return $this;
    } // setKurikulumId()

    /**
     * Set the value of [mata_pelajaran_id] column.
     * 
     * @param int $v new value
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setMataPelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mata_pelajaran_id !== $v) {
            $this->mata_pelajaran_id = $v;
            $this->modifiedColumns[] = KompetensiPeer::MATA_PELAJARAN_ID;
        }

        if ($this->aMataPelajaran !== null && $this->aMataPelajaran->getMataPelajaranId() !== $v) {
            $this->aMataPelajaran = null;
        }


        return $this;
    } // setMataPelajaranId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = KompetensiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = KompetensiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = KompetensiPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Kompetensi The current object (for fluent API support)
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
                $this->modifiedColumns[] = KompetensiPeer::LAST_SYNC;
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

            $this->id_komp = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->desk = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nmr = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->kelompok = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->versi = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->id_inti_dasar = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->level_komp = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tingkat_pendidikan_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->kurikulum_id = ($row[$startcol + 8] !== null) ? (int) $row[$startcol + 8] : null;
            $this->mata_pelajaran_id = ($row[$startcol + 9] !== null) ? (int) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->expired_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = KompetensiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Kompetensi object", $e);
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

        if ($this->aKompetensiRelatedByIdIntiDasar !== null && $this->id_inti_dasar !== $this->aKompetensiRelatedByIdIntiDasar->getIdKomp()) {
            $this->aKompetensiRelatedByIdIntiDasar = null;
        }
        if ($this->aTingkatPendidikan !== null && $this->tingkat_pendidikan_id !== $this->aTingkatPendidikan->getTingkatPendidikanId()) {
            $this->aTingkatPendidikan = null;
        }
        if ($this->aKurikulum !== null && $this->kurikulum_id !== $this->aKurikulum->getKurikulumId()) {
            $this->aKurikulum = null;
        }
        if ($this->aMataPelajaran !== null && $this->mata_pelajaran_id !== $this->aMataPelajaran->getMataPelajaranId()) {
            $this->aMataPelajaran = null;
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
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = KompetensiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aKompetensiRelatedByIdIntiDasar = null;
            $this->aKurikulum = null;
            $this->aMataPelajaran = null;
            $this->aTingkatPendidikan = null;
            $this->collKompetensisRelatedByIdKomp = null;

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
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = KompetensiQuery::create()
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
            $con = Propel::getConnection(KompetensiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                KompetensiPeer::addInstanceToPool($this);
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

            if ($this->aKompetensiRelatedByIdIntiDasar !== null) {
                if ($this->aKompetensiRelatedByIdIntiDasar->isModified() || $this->aKompetensiRelatedByIdIntiDasar->isNew()) {
                    $affectedRows += $this->aKompetensiRelatedByIdIntiDasar->save($con);
                }
                $this->setKompetensiRelatedByIdIntiDasar($this->aKompetensiRelatedByIdIntiDasar);
            }

            if ($this->aKurikulum !== null) {
                if ($this->aKurikulum->isModified() || $this->aKurikulum->isNew()) {
                    $affectedRows += $this->aKurikulum->save($con);
                }
                $this->setKurikulum($this->aKurikulum);
            }

            if ($this->aMataPelajaran !== null) {
                if ($this->aMataPelajaran->isModified() || $this->aMataPelajaran->isNew()) {
                    $affectedRows += $this->aMataPelajaran->save($con);
                }
                $this->setMataPelajaran($this->aMataPelajaran);
            }

            if ($this->aTingkatPendidikan !== null) {
                if ($this->aTingkatPendidikan->isModified() || $this->aTingkatPendidikan->isNew()) {
                    $affectedRows += $this->aTingkatPendidikan->save($con);
                }
                $this->setTingkatPendidikan($this->aTingkatPendidikan);
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

            if ($this->kompetensisRelatedByIdKompScheduledForDeletion !== null) {
                if (!$this->kompetensisRelatedByIdKompScheduledForDeletion->isEmpty()) {
                    foreach ($this->kompetensisRelatedByIdKompScheduledForDeletion as $kompetensiRelatedByIdKomp) {
                        // need to save related object because we set the relation to null
                        $kompetensiRelatedByIdKomp->save($con);
                    }
                    $this->kompetensisRelatedByIdKompScheduledForDeletion = null;
                }
            }

            if ($this->collKompetensisRelatedByIdKomp !== null) {
                foreach ($this->collKompetensisRelatedByIdKomp as $referrerFK) {
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
        if ($this->isColumnModified(KompetensiPeer::ID_KOMP)) {
            $modifiedColumns[':p' . $index++]  = '"id_komp"';
        }
        if ($this->isColumnModified(KompetensiPeer::DESK)) {
            $modifiedColumns[':p' . $index++]  = '"desk"';
        }
        if ($this->isColumnModified(KompetensiPeer::NMR)) {
            $modifiedColumns[':p' . $index++]  = '"nmr"';
        }
        if ($this->isColumnModified(KompetensiPeer::KELOMPOK)) {
            $modifiedColumns[':p' . $index++]  = '"kelompok"';
        }
        if ($this->isColumnModified(KompetensiPeer::VERSI)) {
            $modifiedColumns[':p' . $index++]  = '"versi"';
        }
        if ($this->isColumnModified(KompetensiPeer::ID_INTI_DASAR)) {
            $modifiedColumns[':p' . $index++]  = '"id_inti_dasar"';
        }
        if ($this->isColumnModified(KompetensiPeer::LEVEL_KOMP)) {
            $modifiedColumns[':p' . $index++]  = '"level_komp"';
        }
        if ($this->isColumnModified(KompetensiPeer::TINGKAT_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_pendidikan_id"';
        }
        if ($this->isColumnModified(KompetensiPeer::KURIKULUM_ID)) {
            $modifiedColumns[':p' . $index++]  = '"kurikulum_id"';
        }
        if ($this->isColumnModified(KompetensiPeer::MATA_PELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mata_pelajaran_id"';
        }
        if ($this->isColumnModified(KompetensiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(KompetensiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(KompetensiPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(KompetensiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."kompetensi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_komp"':						
                        $stmt->bindValue($identifier, $this->id_komp, PDO::PARAM_STR);
                        break;
                    case '"desk"':						
                        $stmt->bindValue($identifier, $this->desk, PDO::PARAM_STR);
                        break;
                    case '"nmr"':						
                        $stmt->bindValue($identifier, $this->nmr, PDO::PARAM_STR);
                        break;
                    case '"kelompok"':						
                        $stmt->bindValue($identifier, $this->kelompok, PDO::PARAM_STR);
                        break;
                    case '"versi"':						
                        $stmt->bindValue($identifier, $this->versi, PDO::PARAM_INT);
                        break;
                    case '"id_inti_dasar"':						
                        $stmt->bindValue($identifier, $this->id_inti_dasar, PDO::PARAM_STR);
                        break;
                    case '"level_komp"':						
                        $stmt->bindValue($identifier, $this->level_komp, PDO::PARAM_STR);
                        break;
                    case '"tingkat_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"kurikulum_id"':						
                        $stmt->bindValue($identifier, $this->kurikulum_id, PDO::PARAM_INT);
                        break;
                    case '"mata_pelajaran_id"':						
                        $stmt->bindValue($identifier, $this->mata_pelajaran_id, PDO::PARAM_INT);
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


            // We call the validate method on the following object(s) if they
            // were passed to this object by their coresponding set
            // method.  This object relates to these object(s) by a
            // foreign key reference.

            if ($this->aKompetensiRelatedByIdIntiDasar !== null) {
                if (!$this->aKompetensiRelatedByIdIntiDasar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKompetensiRelatedByIdIntiDasar->getValidationFailures());
                }
            }

            if ($this->aKurikulum !== null) {
                if (!$this->aKurikulum->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aKurikulum->getValidationFailures());
                }
            }

            if ($this->aMataPelajaran !== null) {
                if (!$this->aMataPelajaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaran->getValidationFailures());
                }
            }

            if ($this->aTingkatPendidikan !== null) {
                if (!$this->aTingkatPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTingkatPendidikan->getValidationFailures());
                }
            }


            if (($retval = KompetensiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collKompetensisRelatedByIdKomp !== null) {
                    foreach ($this->collKompetensisRelatedByIdKomp as $referrerFK) {
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
        $pos = KompetensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdKomp();
                break;
            case 1:
                return $this->getDesk();
                break;
            case 2:
                return $this->getNmr();
                break;
            case 3:
                return $this->getKelompok();
                break;
            case 4:
                return $this->getVersi();
                break;
            case 5:
                return $this->getIdIntiDasar();
                break;
            case 6:
                return $this->getLevelKomp();
                break;
            case 7:
                return $this->getTingkatPendidikanId();
                break;
            case 8:
                return $this->getKurikulumId();
                break;
            case 9:
                return $this->getMataPelajaranId();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getExpiredDate();
                break;
            case 13:
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
        if (isset($alreadyDumpedObjects['Kompetensi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Kompetensi'][$this->getPrimaryKey()] = true;
        $keys = KompetensiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdKomp(),
            $keys[1] => $this->getDesk(),
            $keys[2] => $this->getNmr(),
            $keys[3] => $this->getKelompok(),
            $keys[4] => $this->getVersi(),
            $keys[5] => $this->getIdIntiDasar(),
            $keys[6] => $this->getLevelKomp(),
            $keys[7] => $this->getTingkatPendidikanId(),
            $keys[8] => $this->getKurikulumId(),
            $keys[9] => $this->getMataPelajaranId(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getExpiredDate(),
            $keys[13] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aKompetensiRelatedByIdIntiDasar) {
                $result['KompetensiRelatedByIdIntiDasar'] = $this->aKompetensiRelatedByIdIntiDasar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aKurikulum) {
                $result['Kurikulum'] = $this->aKurikulum->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMataPelajaran) {
                $result['MataPelajaran'] = $this->aMataPelajaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTingkatPendidikan) {
                $result['TingkatPendidikan'] = $this->aTingkatPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collKompetensisRelatedByIdKomp) {
                $result['KompetensisRelatedByIdKomp'] = $this->collKompetensisRelatedByIdKomp->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = KompetensiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdKomp($value);
                break;
            case 1:
                $this->setDesk($value);
                break;
            case 2:
                $this->setNmr($value);
                break;
            case 3:
                $this->setKelompok($value);
                break;
            case 4:
                $this->setVersi($value);
                break;
            case 5:
                $this->setIdIntiDasar($value);
                break;
            case 6:
                $this->setLevelKomp($value);
                break;
            case 7:
                $this->setTingkatPendidikanId($value);
                break;
            case 8:
                $this->setKurikulumId($value);
                break;
            case 9:
                $this->setMataPelajaranId($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setExpiredDate($value);
                break;
            case 13:
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
        $keys = KompetensiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdKomp($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setDesk($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNmr($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKelompok($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setVersi($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIdIntiDasar($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setLevelKomp($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTingkatPendidikanId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKurikulumId($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setMataPelajaranId($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setExpiredDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(KompetensiPeer::DATABASE_NAME);

        if ($this->isColumnModified(KompetensiPeer::ID_KOMP)) $criteria->add(KompetensiPeer::ID_KOMP, $this->id_komp);
        if ($this->isColumnModified(KompetensiPeer::DESK)) $criteria->add(KompetensiPeer::DESK, $this->desk);
        if ($this->isColumnModified(KompetensiPeer::NMR)) $criteria->add(KompetensiPeer::NMR, $this->nmr);
        if ($this->isColumnModified(KompetensiPeer::KELOMPOK)) $criteria->add(KompetensiPeer::KELOMPOK, $this->kelompok);
        if ($this->isColumnModified(KompetensiPeer::VERSI)) $criteria->add(KompetensiPeer::VERSI, $this->versi);
        if ($this->isColumnModified(KompetensiPeer::ID_INTI_DASAR)) $criteria->add(KompetensiPeer::ID_INTI_DASAR, $this->id_inti_dasar);
        if ($this->isColumnModified(KompetensiPeer::LEVEL_KOMP)) $criteria->add(KompetensiPeer::LEVEL_KOMP, $this->level_komp);
        if ($this->isColumnModified(KompetensiPeer::TINGKAT_PENDIDIKAN_ID)) $criteria->add(KompetensiPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);
        if ($this->isColumnModified(KompetensiPeer::KURIKULUM_ID)) $criteria->add(KompetensiPeer::KURIKULUM_ID, $this->kurikulum_id);
        if ($this->isColumnModified(KompetensiPeer::MATA_PELAJARAN_ID)) $criteria->add(KompetensiPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);
        if ($this->isColumnModified(KompetensiPeer::CREATE_DATE)) $criteria->add(KompetensiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(KompetensiPeer::LAST_UPDATE)) $criteria->add(KompetensiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(KompetensiPeer::EXPIRED_DATE)) $criteria->add(KompetensiPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(KompetensiPeer::LAST_SYNC)) $criteria->add(KompetensiPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(KompetensiPeer::DATABASE_NAME);
        $criteria->add(KompetensiPeer::ID_KOMP, $this->id_komp);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdKomp();
    }

    /**
     * Generic method to set the primary key (id_komp column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdKomp($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdKomp();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Kompetensi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setDesk($this->getDesk());
        $copyObj->setNmr($this->getNmr());
        $copyObj->setKelompok($this->getKelompok());
        $copyObj->setVersi($this->getVersi());
        $copyObj->setIdIntiDasar($this->getIdIntiDasar());
        $copyObj->setLevelKomp($this->getLevelKomp());
        $copyObj->setTingkatPendidikanId($this->getTingkatPendidikanId());
        $copyObj->setKurikulumId($this->getKurikulumId());
        $copyObj->setMataPelajaranId($this->getMataPelajaranId());
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

            foreach ($this->getKompetensisRelatedByIdKomp() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKompetensiRelatedByIdKomp($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdKomp(NULL); // this is a auto-increment column, so set to default value
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
     * @return Kompetensi Clone of current object.
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
     * @return KompetensiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new KompetensiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Kompetensi object.
     *
     * @param             Kompetensi $v
     * @return Kompetensi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKompetensiRelatedByIdIntiDasar(Kompetensi $v = null)
    {
        if ($v === null) {
            $this->setIdIntiDasar(NULL);
        } else {
            $this->setIdIntiDasar($v->getIdKomp());
        }

        $this->aKompetensiRelatedByIdIntiDasar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Kompetensi object, it will not be re-added.
        if ($v !== null) {
            $v->addKompetensiRelatedByIdKomp($this);
        }


        return $this;
    }


    /**
     * Get the associated Kompetensi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Kompetensi The associated Kompetensi object.
     * @throws PropelException
     */
    public function getKompetensiRelatedByIdIntiDasar(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKompetensiRelatedByIdIntiDasar === null && (($this->id_inti_dasar !== "" && $this->id_inti_dasar !== null)) && $doQuery) {
            $this->aKompetensiRelatedByIdIntiDasar = KompetensiQuery::create()->findPk($this->id_inti_dasar, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKompetensiRelatedByIdIntiDasar->addKompetensisRelatedByIdKomp($this);
             */
        }

        return $this->aKompetensiRelatedByIdIntiDasar;
    }

    /**
     * Declares an association between this object and a Kurikulum object.
     *
     * @param             Kurikulum $v
     * @return Kompetensi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setKurikulum(Kurikulum $v = null)
    {
        if ($v === null) {
            $this->setKurikulumId(NULL);
        } else {
            $this->setKurikulumId($v->getKurikulumId());
        }

        $this->aKurikulum = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Kurikulum object, it will not be re-added.
        if ($v !== null) {
            $v->addKompetensi($this);
        }


        return $this;
    }


    /**
     * Get the associated Kurikulum object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Kurikulum The associated Kurikulum object.
     * @throws PropelException
     */
    public function getKurikulum(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aKurikulum === null && ($this->kurikulum_id !== null) && $doQuery) {
            $this->aKurikulum = KurikulumQuery::create()->findPk($this->kurikulum_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aKurikulum->addKompetensis($this);
             */
        }

        return $this->aKurikulum;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return Kompetensi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaran(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMataPelajaranId(NULL);
        } else {
            $this->setMataPelajaranId($v->getMataPelajaranId());
        }

        $this->aMataPelajaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addKompetensi($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaran === null && ($this->mata_pelajaran_id !== null) && $doQuery) {
            $this->aMataPelajaran = MataPelajaranQuery::create()->findPk($this->mata_pelajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaran->addKompetensis($this);
             */
        }

        return $this->aMataPelajaran;
    }

    /**
     * Declares an association between this object and a TingkatPendidikan object.
     *
     * @param             TingkatPendidikan $v
     * @return Kompetensi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTingkatPendidikan(TingkatPendidikan $v = null)
    {
        if ($v === null) {
            $this->setTingkatPendidikanId(NULL);
        } else {
            $this->setTingkatPendidikanId($v->getTingkatPendidikanId());
        }

        $this->aTingkatPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TingkatPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addKompetensi($this);
        }


        return $this;
    }


    /**
     * Get the associated TingkatPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TingkatPendidikan The associated TingkatPendidikan object.
     * @throws PropelException
     */
    public function getTingkatPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTingkatPendidikan === null && (($this->tingkat_pendidikan_id !== "" && $this->tingkat_pendidikan_id !== null)) && $doQuery) {
            $this->aTingkatPendidikan = TingkatPendidikanQuery::create()->findPk($this->tingkat_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTingkatPendidikan->addKompetensis($this);
             */
        }

        return $this->aTingkatPendidikan;
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
        if ('KompetensiRelatedByIdKomp' == $relationName) {
            $this->initKompetensisRelatedByIdKomp();
        }
    }

    /**
     * Clears out the collKompetensisRelatedByIdKomp collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Kompetensi The current object (for fluent API support)
     * @see        addKompetensisRelatedByIdKomp()
     */
    public function clearKompetensisRelatedByIdKomp()
    {
        $this->collKompetensisRelatedByIdKomp = null; // important to set this to null since that means it is uninitialized
        $this->collKompetensisRelatedByIdKompPartial = null;

        return $this;
    }

    /**
     * reset is the collKompetensisRelatedByIdKomp collection loaded partially
     *
     * @return void
     */
    public function resetPartialKompetensisRelatedByIdKomp($v = true)
    {
        $this->collKompetensisRelatedByIdKompPartial = $v;
    }

    /**
     * Initializes the collKompetensisRelatedByIdKomp collection.
     *
     * By default this just sets the collKompetensisRelatedByIdKomp collection to an empty array (like clearcollKompetensisRelatedByIdKomp());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKompetensisRelatedByIdKomp($overrideExisting = true)
    {
        if (null !== $this->collKompetensisRelatedByIdKomp && !$overrideExisting) {
            return;
        }
        $this->collKompetensisRelatedByIdKomp = new PropelObjectCollection();
        $this->collKompetensisRelatedByIdKomp->setModel('Kompetensi');
    }

    /**
     * Gets an array of Kompetensi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Kompetensi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     * @throws PropelException
     */
    public function getKompetensisRelatedByIdKomp($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisRelatedByIdKompPartial && !$this->isNew();
        if (null === $this->collKompetensisRelatedByIdKomp || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKompetensisRelatedByIdKomp) {
                // return empty collection
                $this->initKompetensisRelatedByIdKomp();
            } else {
                $collKompetensisRelatedByIdKomp = KompetensiQuery::create(null, $criteria)
                    ->filterByKompetensiRelatedByIdIntiDasar($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKompetensisRelatedByIdKompPartial && count($collKompetensisRelatedByIdKomp)) {
                      $this->initKompetensisRelatedByIdKomp(false);

                      foreach($collKompetensisRelatedByIdKomp as $obj) {
                        if (false == $this->collKompetensisRelatedByIdKomp->contains($obj)) {
                          $this->collKompetensisRelatedByIdKomp->append($obj);
                        }
                      }

                      $this->collKompetensisRelatedByIdKompPartial = true;
                    }

                    $collKompetensisRelatedByIdKomp->getInternalIterator()->rewind();
                    return $collKompetensisRelatedByIdKomp;
                }

                if($partial && $this->collKompetensisRelatedByIdKomp) {
                    foreach($this->collKompetensisRelatedByIdKomp as $obj) {
                        if($obj->isNew()) {
                            $collKompetensisRelatedByIdKomp[] = $obj;
                        }
                    }
                }

                $this->collKompetensisRelatedByIdKomp = $collKompetensisRelatedByIdKomp;
                $this->collKompetensisRelatedByIdKompPartial = false;
            }
        }

        return $this->collKompetensisRelatedByIdKomp;
    }

    /**
     * Sets a collection of KompetensiRelatedByIdKomp objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kompetensisRelatedByIdKomp A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Kompetensi The current object (for fluent API support)
     */
    public function setKompetensisRelatedByIdKomp(PropelCollection $kompetensisRelatedByIdKomp, PropelPDO $con = null)
    {
        $kompetensisRelatedByIdKompToDelete = $this->getKompetensisRelatedByIdKomp(new Criteria(), $con)->diff($kompetensisRelatedByIdKomp);

        $this->kompetensisRelatedByIdKompScheduledForDeletion = unserialize(serialize($kompetensisRelatedByIdKompToDelete));

        foreach ($kompetensisRelatedByIdKompToDelete as $kompetensiRelatedByIdKompRemoved) {
            $kompetensiRelatedByIdKompRemoved->setKompetensiRelatedByIdIntiDasar(null);
        }

        $this->collKompetensisRelatedByIdKomp = null;
        foreach ($kompetensisRelatedByIdKomp as $kompetensiRelatedByIdKomp) {
            $this->addKompetensiRelatedByIdKomp($kompetensiRelatedByIdKomp);
        }

        $this->collKompetensisRelatedByIdKomp = $kompetensisRelatedByIdKomp;
        $this->collKompetensisRelatedByIdKompPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kompetensi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kompetensi objects.
     * @throws PropelException
     */
    public function countKompetensisRelatedByIdKomp(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisRelatedByIdKompPartial && !$this->isNew();
        if (null === $this->collKompetensisRelatedByIdKomp || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKompetensisRelatedByIdKomp) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKompetensisRelatedByIdKomp());
            }
            $query = KompetensiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByKompetensiRelatedByIdIntiDasar($this)
                ->count($con);
        }

        return count($this->collKompetensisRelatedByIdKomp);
    }

    /**
     * Method called to associate a Kompetensi object to this object
     * through the Kompetensi foreign key attribute.
     *
     * @param    Kompetensi $l Kompetensi
     * @return Kompetensi The current object (for fluent API support)
     */
    public function addKompetensiRelatedByIdKomp(Kompetensi $l)
    {
        if ($this->collKompetensisRelatedByIdKomp === null) {
            $this->initKompetensisRelatedByIdKomp();
            $this->collKompetensisRelatedByIdKompPartial = true;
        }
        if (!in_array($l, $this->collKompetensisRelatedByIdKomp->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKompetensiRelatedByIdKomp($l);
        }

        return $this;
    }

    /**
     * @param	KompetensiRelatedByIdKomp $kompetensiRelatedByIdKomp The kompetensiRelatedByIdKomp object to add.
     */
    protected function doAddKompetensiRelatedByIdKomp($kompetensiRelatedByIdKomp)
    {
        $this->collKompetensisRelatedByIdKomp[]= $kompetensiRelatedByIdKomp;
        $kompetensiRelatedByIdKomp->setKompetensiRelatedByIdIntiDasar($this);
    }

    /**
     * @param	KompetensiRelatedByIdKomp $kompetensiRelatedByIdKomp The kompetensiRelatedByIdKomp object to remove.
     * @return Kompetensi The current object (for fluent API support)
     */
    public function removeKompetensiRelatedByIdKomp($kompetensiRelatedByIdKomp)
    {
        if ($this->getKompetensisRelatedByIdKomp()->contains($kompetensiRelatedByIdKomp)) {
            $this->collKompetensisRelatedByIdKomp->remove($this->collKompetensisRelatedByIdKomp->search($kompetensiRelatedByIdKomp));
            if (null === $this->kompetensisRelatedByIdKompScheduledForDeletion) {
                $this->kompetensisRelatedByIdKompScheduledForDeletion = clone $this->collKompetensisRelatedByIdKomp;
                $this->kompetensisRelatedByIdKompScheduledForDeletion->clear();
            }
            $this->kompetensisRelatedByIdKompScheduledForDeletion[]= $kompetensiRelatedByIdKomp;
            $kompetensiRelatedByIdKomp->setKompetensiRelatedByIdIntiDasar(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kompetensi is new, it will return
     * an empty collection; or if this Kompetensi has previously
     * been saved, it will retrieve related KompetensisRelatedByIdKomp from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kompetensi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisRelatedByIdKompJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getKompetensisRelatedByIdKomp($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kompetensi is new, it will return
     * an empty collection; or if this Kompetensi has previously
     * been saved, it will retrieve related KompetensisRelatedByIdKomp from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kompetensi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisRelatedByIdKompJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getKompetensisRelatedByIdKomp($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Kompetensi is new, it will return
     * an empty collection; or if this Kompetensi has previously
     * been saved, it will retrieve related KompetensisRelatedByIdKomp from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Kompetensi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisRelatedByIdKompJoinTingkatPendidikan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('TingkatPendidikan', $join_behavior);

        return $this->getKompetensisRelatedByIdKomp($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_komp = null;
        $this->desk = null;
        $this->nmr = null;
        $this->kelompok = null;
        $this->versi = null;
        $this->id_inti_dasar = null;
        $this->level_komp = null;
        $this->tingkat_pendidikan_id = null;
        $this->kurikulum_id = null;
        $this->mata_pelajaran_id = null;
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
            if ($this->collKompetensisRelatedByIdKomp) {
                foreach ($this->collKompetensisRelatedByIdKomp as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aKompetensiRelatedByIdIntiDasar instanceof Persistent) {
              $this->aKompetensiRelatedByIdIntiDasar->clearAllReferences($deep);
            }
            if ($this->aKurikulum instanceof Persistent) {
              $this->aKurikulum->clearAllReferences($deep);
            }
            if ($this->aMataPelajaran instanceof Persistent) {
              $this->aMataPelajaran->clearAllReferences($deep);
            }
            if ($this->aTingkatPendidikan instanceof Persistent) {
              $this->aTingkatPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collKompetensisRelatedByIdKomp instanceof PropelCollection) {
            $this->collKompetensisRelatedByIdKomp->clearIterator();
        }
        $this->collKompetensisRelatedByIdKomp = null;
        $this->aKompetensiRelatedByIdIntiDasar = null;
        $this->aKurikulum = null;
        $this->aMataPelajaran = null;
        $this->aTingkatPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KompetensiPeer::DEFAULT_STRING_FORMAT);
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
