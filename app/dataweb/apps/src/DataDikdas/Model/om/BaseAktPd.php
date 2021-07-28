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
use DataDikdas\Model\AktPd;
use DataDikdas\Model\AktPdPeer;
use DataDikdas\Model\AktPdQuery;
use DataDikdas\Model\AnggotaAktPd;
use DataDikdas\Model\AnggotaAktPdQuery;
use DataDikdas\Model\BimbingPd;
use DataDikdas\Model\BimbingPdQuery;
use DataDikdas\Model\JenisAktPd;
use DataDikdas\Model\JenisAktPdQuery;
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\VldAktPd;
use DataDikdas\Model\VldAktPdQuery;

/**
 * Base class that represents a row from the 'akt_pd' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseAktPd extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\AktPdPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        AktPdPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_akt_pd field.
     * @var        string
     */
    protected $id_akt_pd;

    /**
     * The value for the mou_id field.
     * @var        string
     */
    protected $mou_id;

    /**
     * The value for the id_jns_akt_pd field.
     * @var        string
     */
    protected $id_jns_akt_pd;

    /**
     * The value for the judul_akt_pd field.
     * @var        string
     */
    protected $judul_akt_pd;

    /**
     * The value for the sk_tugas field.
     * @var        string
     */
    protected $sk_tugas;

    /**
     * The value for the tgl_sk_tugas field.
     * @var        string
     */
    protected $tgl_sk_tugas;

    /**
     * The value for the ket_akt field.
     * @var        string
     */
    protected $ket_akt;

    /**
     * The value for the a_komunal field.
     * @var        string
     */
    protected $a_komunal;

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
     * @var        Mou
     */
    protected $aMou;

    /**
     * @var        JenisAktPd
     */
    protected $aJenisAktPd;

    /**
     * @var        PropelObjectCollection|AnggotaAktPd[] Collection to store aggregation of AnggotaAktPd objects.
     */
    protected $collAnggotaAktPds;
    protected $collAnggotaAktPdsPartial;

    /**
     * @var        PropelObjectCollection|BimbingPd[] Collection to store aggregation of BimbingPd objects.
     */
    protected $collBimbingPds;
    protected $collBimbingPdsPartial;

    /**
     * @var        PropelObjectCollection|VldAktPd[] Collection to store aggregation of VldAktPd objects.
     */
    protected $collVldAktPds;
    protected $collVldAktPdsPartial;

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
    protected $anggotaAktPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bimbingPdsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $vldAktPdsScheduledForDeletion = null;

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
     * Initializes internal state of BaseAktPd object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_akt_pd] column value.
     * 
     * @return string
     */
    public function getIdAktPd()
    {
        return $this->id_akt_pd;
    }

    /**
     * Get the [mou_id] column value.
     * 
     * @return string
     */
    public function getMouId()
    {
        return $this->mou_id;
    }

    /**
     * Get the [id_jns_akt_pd] column value.
     * 
     * @return string
     */
    public function getIdJnsAktPd()
    {
        return $this->id_jns_akt_pd;
    }

    /**
     * Get the [judul_akt_pd] column value.
     * 
     * @return string
     */
    public function getJudulAktPd()
    {
        return $this->judul_akt_pd;
    }

    /**
     * Get the [sk_tugas] column value.
     * 
     * @return string
     */
    public function getSkTugas()
    {
        return $this->sk_tugas;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_tugas] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkTugas($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_tugas === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_tugas);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_tugas, true), $x);
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
     * Get the [ket_akt] column value.
     * 
     * @return string
     */
    public function getKetAkt()
    {
        return $this->ket_akt;
    }

    /**
     * Get the [a_komunal] column value.
     * 
     * @return string
     */
    public function getAKomunal()
    {
        return $this->a_komunal;
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
     * Set the value of [id_akt_pd] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setIdAktPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_akt_pd !== $v) {
            $this->id_akt_pd = $v;
            $this->modifiedColumns[] = AktPdPeer::ID_AKT_PD;
        }


        return $this;
    } // setIdAktPd()

    /**
     * Set the value of [mou_id] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setMouId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mou_id !== $v) {
            $this->mou_id = $v;
            $this->modifiedColumns[] = AktPdPeer::MOU_ID;
        }

        if ($this->aMou !== null && $this->aMou->getMouId() !== $v) {
            $this->aMou = null;
        }


        return $this;
    } // setMouId()

    /**
     * Set the value of [id_jns_akt_pd] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setIdJnsAktPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_jns_akt_pd !== $v) {
            $this->id_jns_akt_pd = $v;
            $this->modifiedColumns[] = AktPdPeer::ID_JNS_AKT_PD;
        }

        if ($this->aJenisAktPd !== null && $this->aJenisAktPd->getIdJnsAktPd() !== $v) {
            $this->aJenisAktPd = null;
        }


        return $this;
    } // setIdJnsAktPd()

    /**
     * Set the value of [judul_akt_pd] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setJudulAktPd($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->judul_akt_pd !== $v) {
            $this->judul_akt_pd = $v;
            $this->modifiedColumns[] = AktPdPeer::JUDUL_AKT_PD;
        }


        return $this;
    } // setJudulAktPd()

    /**
     * Set the value of [sk_tugas] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setSkTugas($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_tugas !== $v) {
            $this->sk_tugas = $v;
            $this->modifiedColumns[] = AktPdPeer::SK_TUGAS;
        }


        return $this;
    } // setSkTugas()

    /**
     * Sets the value of [tgl_sk_tugas] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AktPd The current object (for fluent API support)
     */
    public function setTglSkTugas($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_tugas !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_tugas !== null && $tmpDt = new DateTime($this->tgl_sk_tugas)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_tugas = $newDateAsString;
                $this->modifiedColumns[] = AktPdPeer::TGL_SK_TUGAS;
            }
        } // if either are not null


        return $this;
    } // setTglSkTugas()

    /**
     * Set the value of [ket_akt] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setKetAkt($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_akt !== $v) {
            $this->ket_akt = $v;
            $this->modifiedColumns[] = AktPdPeer::KET_AKT;
        }


        return $this;
    } // setKetAkt()

    /**
     * Set the value of [a_komunal] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setAKomunal($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_komunal !== $v) {
            $this->a_komunal = $v;
            $this->modifiedColumns[] = AktPdPeer::A_KOMUNAL;
        }


        return $this;
    } // setAKomunal()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AktPd The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = AktPdPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AktPd The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = AktPdPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = AktPdPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return AktPd The current object (for fluent API support)
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
                $this->modifiedColumns[] = AktPdPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return AktPd The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = AktPdPeer::UPDATER_ID;
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

            $this->id_akt_pd = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->mou_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_jns_akt_pd = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->judul_akt_pd = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->sk_tugas = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tgl_sk_tugas = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->ket_akt = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->a_komunal = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->create_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_update = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->soft_delete = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_sync = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->updater_id = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 13; // 13 = AktPdPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating AktPd object", $e);
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

        if ($this->aMou !== null && $this->mou_id !== $this->aMou->getMouId()) {
            $this->aMou = null;
        }
        if ($this->aJenisAktPd !== null && $this->id_jns_akt_pd !== $this->aJenisAktPd->getIdJnsAktPd()) {
            $this->aJenisAktPd = null;
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
            $con = Propel::getConnection(AktPdPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = AktPdPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMou = null;
            $this->aJenisAktPd = null;
            $this->collAnggotaAktPds = null;

            $this->collBimbingPds = null;

            $this->collVldAktPds = null;

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
            $con = Propel::getConnection(AktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = AktPdQuery::create()
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
            $con = Propel::getConnection(AktPdPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                AktPdPeer::addInstanceToPool($this);
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

            if ($this->aMou !== null) {
                if ($this->aMou->isModified() || $this->aMou->isNew()) {
                    $affectedRows += $this->aMou->save($con);
                }
                $this->setMou($this->aMou);
            }

            if ($this->aJenisAktPd !== null) {
                if ($this->aJenisAktPd->isModified() || $this->aJenisAktPd->isNew()) {
                    $affectedRows += $this->aJenisAktPd->save($con);
                }
                $this->setJenisAktPd($this->aJenisAktPd);
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

            if ($this->anggotaAktPdsScheduledForDeletion !== null) {
                if (!$this->anggotaAktPdsScheduledForDeletion->isEmpty()) {
                    AnggotaAktPdQuery::create()
                        ->filterByPrimaryKeys($this->anggotaAktPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anggotaAktPdsScheduledForDeletion = null;
                }
            }

            if ($this->collAnggotaAktPds !== null) {
                foreach ($this->collAnggotaAktPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bimbingPdsScheduledForDeletion !== null) {
                if (!$this->bimbingPdsScheduledForDeletion->isEmpty()) {
                    BimbingPdQuery::create()
                        ->filterByPrimaryKeys($this->bimbingPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bimbingPdsScheduledForDeletion = null;
                }
            }

            if ($this->collBimbingPds !== null) {
                foreach ($this->collBimbingPds as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->vldAktPdsScheduledForDeletion !== null) {
                if (!$this->vldAktPdsScheduledForDeletion->isEmpty()) {
                    VldAktPdQuery::create()
                        ->filterByPrimaryKeys($this->vldAktPdsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldAktPdsScheduledForDeletion = null;
                }
            }

            if ($this->collVldAktPds !== null) {
                foreach ($this->collVldAktPds as $referrerFK) {
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
        if ($this->isColumnModified(AktPdPeer::ID_AKT_PD)) {
            $modifiedColumns[':p' . $index++]  = '"id_akt_pd"';
        }
        if ($this->isColumnModified(AktPdPeer::MOU_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mou_id"';
        }
        if ($this->isColumnModified(AktPdPeer::ID_JNS_AKT_PD)) {
            $modifiedColumns[':p' . $index++]  = '"id_jns_akt_pd"';
        }
        if ($this->isColumnModified(AktPdPeer::JUDUL_AKT_PD)) {
            $modifiedColumns[':p' . $index++]  = '"judul_akt_pd"';
        }
        if ($this->isColumnModified(AktPdPeer::SK_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"sk_tugas"';
        }
        if ($this->isColumnModified(AktPdPeer::TGL_SK_TUGAS)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_tugas"';
        }
        if ($this->isColumnModified(AktPdPeer::KET_AKT)) {
            $modifiedColumns[':p' . $index++]  = '"ket_akt"';
        }
        if ($this->isColumnModified(AktPdPeer::A_KOMUNAL)) {
            $modifiedColumns[':p' . $index++]  = '"a_komunal"';
        }
        if ($this->isColumnModified(AktPdPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(AktPdPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(AktPdPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(AktPdPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(AktPdPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "akt_pd" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_akt_pd"':						
                        $stmt->bindValue($identifier, $this->id_akt_pd, PDO::PARAM_STR);
                        break;
                    case '"mou_id"':						
                        $stmt->bindValue($identifier, $this->mou_id, PDO::PARAM_STR);
                        break;
                    case '"id_jns_akt_pd"':						
                        $stmt->bindValue($identifier, $this->id_jns_akt_pd, PDO::PARAM_STR);
                        break;
                    case '"judul_akt_pd"':						
                        $stmt->bindValue($identifier, $this->judul_akt_pd, PDO::PARAM_STR);
                        break;
                    case '"sk_tugas"':						
                        $stmt->bindValue($identifier, $this->sk_tugas, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_tugas"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_tugas, PDO::PARAM_STR);
                        break;
                    case '"ket_akt"':						
                        $stmt->bindValue($identifier, $this->ket_akt, PDO::PARAM_STR);
                        break;
                    case '"a_komunal"':						
                        $stmt->bindValue($identifier, $this->a_komunal, PDO::PARAM_STR);
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

            if ($this->aMou !== null) {
                if (!$this->aMou->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMou->getValidationFailures());
                }
            }

            if ($this->aJenisAktPd !== null) {
                if (!$this->aJenisAktPd->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisAktPd->getValidationFailures());
                }
            }


            if (($retval = AktPdPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnggotaAktPds !== null) {
                    foreach ($this->collAnggotaAktPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBimbingPds !== null) {
                    foreach ($this->collBimbingPds as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collVldAktPds !== null) {
                    foreach ($this->collVldAktPds as $referrerFK) {
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
        $pos = AktPdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdAktPd();
                break;
            case 1:
                return $this->getMouId();
                break;
            case 2:
                return $this->getIdJnsAktPd();
                break;
            case 3:
                return $this->getJudulAktPd();
                break;
            case 4:
                return $this->getSkTugas();
                break;
            case 5:
                return $this->getTglSkTugas();
                break;
            case 6:
                return $this->getKetAkt();
                break;
            case 7:
                return $this->getAKomunal();
                break;
            case 8:
                return $this->getCreateDate();
                break;
            case 9:
                return $this->getLastUpdate();
                break;
            case 10:
                return $this->getSoftDelete();
                break;
            case 11:
                return $this->getLastSync();
                break;
            case 12:
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
        if (isset($alreadyDumpedObjects['AktPd'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['AktPd'][$this->getPrimaryKey()] = true;
        $keys = AktPdPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdAktPd(),
            $keys[1] => $this->getMouId(),
            $keys[2] => $this->getIdJnsAktPd(),
            $keys[3] => $this->getJudulAktPd(),
            $keys[4] => $this->getSkTugas(),
            $keys[5] => $this->getTglSkTugas(),
            $keys[6] => $this->getKetAkt(),
            $keys[7] => $this->getAKomunal(),
            $keys[8] => $this->getCreateDate(),
            $keys[9] => $this->getLastUpdate(),
            $keys[10] => $this->getSoftDelete(),
            $keys[11] => $this->getLastSync(),
            $keys[12] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMou) {
                $result['Mou'] = $this->aMou->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisAktPd) {
                $result['JenisAktPd'] = $this->aJenisAktPd->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAnggotaAktPds) {
                $result['AnggotaAktPds'] = $this->collAnggotaAktPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBimbingPds) {
                $result['BimbingPds'] = $this->collBimbingPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collVldAktPds) {
                $result['VldAktPds'] = $this->collVldAktPds->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = AktPdPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdAktPd($value);
                break;
            case 1:
                $this->setMouId($value);
                break;
            case 2:
                $this->setIdJnsAktPd($value);
                break;
            case 3:
                $this->setJudulAktPd($value);
                break;
            case 4:
                $this->setSkTugas($value);
                break;
            case 5:
                $this->setTglSkTugas($value);
                break;
            case 6:
                $this->setKetAkt($value);
                break;
            case 7:
                $this->setAKomunal($value);
                break;
            case 8:
                $this->setCreateDate($value);
                break;
            case 9:
                $this->setLastUpdate($value);
                break;
            case 10:
                $this->setSoftDelete($value);
                break;
            case 11:
                $this->setLastSync($value);
                break;
            case 12:
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
        $keys = AktPdPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdAktPd($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMouId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdJnsAktPd($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJudulAktPd($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSkTugas($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTglSkTugas($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKetAkt($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAKomunal($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setCreateDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastUpdate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSoftDelete($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastSync($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setUpdaterId($arr[$keys[12]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(AktPdPeer::DATABASE_NAME);

        if ($this->isColumnModified(AktPdPeer::ID_AKT_PD)) $criteria->add(AktPdPeer::ID_AKT_PD, $this->id_akt_pd);
        if ($this->isColumnModified(AktPdPeer::MOU_ID)) $criteria->add(AktPdPeer::MOU_ID, $this->mou_id);
        if ($this->isColumnModified(AktPdPeer::ID_JNS_AKT_PD)) $criteria->add(AktPdPeer::ID_JNS_AKT_PD, $this->id_jns_akt_pd);
        if ($this->isColumnModified(AktPdPeer::JUDUL_AKT_PD)) $criteria->add(AktPdPeer::JUDUL_AKT_PD, $this->judul_akt_pd);
        if ($this->isColumnModified(AktPdPeer::SK_TUGAS)) $criteria->add(AktPdPeer::SK_TUGAS, $this->sk_tugas);
        if ($this->isColumnModified(AktPdPeer::TGL_SK_TUGAS)) $criteria->add(AktPdPeer::TGL_SK_TUGAS, $this->tgl_sk_tugas);
        if ($this->isColumnModified(AktPdPeer::KET_AKT)) $criteria->add(AktPdPeer::KET_AKT, $this->ket_akt);
        if ($this->isColumnModified(AktPdPeer::A_KOMUNAL)) $criteria->add(AktPdPeer::A_KOMUNAL, $this->a_komunal);
        if ($this->isColumnModified(AktPdPeer::CREATE_DATE)) $criteria->add(AktPdPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(AktPdPeer::LAST_UPDATE)) $criteria->add(AktPdPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(AktPdPeer::SOFT_DELETE)) $criteria->add(AktPdPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(AktPdPeer::LAST_SYNC)) $criteria->add(AktPdPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(AktPdPeer::UPDATER_ID)) $criteria->add(AktPdPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(AktPdPeer::DATABASE_NAME);
        $criteria->add(AktPdPeer::ID_AKT_PD, $this->id_akt_pd);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdAktPd();
    }

    /**
     * Generic method to set the primary key (id_akt_pd column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdAktPd($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdAktPd();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of AktPd (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMouId($this->getMouId());
        $copyObj->setIdJnsAktPd($this->getIdJnsAktPd());
        $copyObj->setJudulAktPd($this->getJudulAktPd());
        $copyObj->setSkTugas($this->getSkTugas());
        $copyObj->setTglSkTugas($this->getTglSkTugas());
        $copyObj->setKetAkt($this->getKetAkt());
        $copyObj->setAKomunal($this->getAKomunal());
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

            foreach ($this->getAnggotaAktPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnggotaAktPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBimbingPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBimbingPd($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getVldAktPds() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldAktPd($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdAktPd(NULL); // this is a auto-increment column, so set to default value
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
     * @return AktPd Clone of current object.
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
     * @return AktPdPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new AktPdPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Mou object.
     *
     * @param             Mou $v
     * @return AktPd The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMou(Mou $v = null)
    {
        if ($v === null) {
            $this->setMouId(NULL);
        } else {
            $this->setMouId($v->getMouId());
        }

        $this->aMou = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Mou object, it will not be re-added.
        if ($v !== null) {
            $v->addAktPd($this);
        }


        return $this;
    }


    /**
     * Get the associated Mou object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Mou The associated Mou object.
     * @throws PropelException
     */
    public function getMou(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMou === null && (($this->mou_id !== "" && $this->mou_id !== null)) && $doQuery) {
            $this->aMou = MouQuery::create()->findPk($this->mou_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMou->addAktPds($this);
             */
        }

        return $this->aMou;
    }

    /**
     * Declares an association between this object and a JenisAktPd object.
     *
     * @param             JenisAktPd $v
     * @return AktPd The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisAktPd(JenisAktPd $v = null)
    {
        if ($v === null) {
            $this->setIdJnsAktPd(NULL);
        } else {
            $this->setIdJnsAktPd($v->getIdJnsAktPd());
        }

        $this->aJenisAktPd = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisAktPd object, it will not be re-added.
        if ($v !== null) {
            $v->addAktPd($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisAktPd object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisAktPd The associated JenisAktPd object.
     * @throws PropelException
     */
    public function getJenisAktPd(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisAktPd === null && (($this->id_jns_akt_pd !== "" && $this->id_jns_akt_pd !== null)) && $doQuery) {
            $this->aJenisAktPd = JenisAktPdQuery::create()->findPk($this->id_jns_akt_pd, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisAktPd->addAktPds($this);
             */
        }

        return $this->aJenisAktPd;
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
        if ('AnggotaAktPd' == $relationName) {
            $this->initAnggotaAktPds();
        }
        if ('BimbingPd' == $relationName) {
            $this->initBimbingPds();
        }
        if ('VldAktPd' == $relationName) {
            $this->initVldAktPds();
        }
    }

    /**
     * Clears out the collAnggotaAktPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return AktPd The current object (for fluent API support)
     * @see        addAnggotaAktPds()
     */
    public function clearAnggotaAktPds()
    {
        $this->collAnggotaAktPds = null; // important to set this to null since that means it is uninitialized
        $this->collAnggotaAktPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collAnggotaAktPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnggotaAktPds($v = true)
    {
        $this->collAnggotaAktPdsPartial = $v;
    }

    /**
     * Initializes the collAnggotaAktPds collection.
     *
     * By default this just sets the collAnggotaAktPds collection to an empty array (like clearcollAnggotaAktPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnggotaAktPds($overrideExisting = true)
    {
        if (null !== $this->collAnggotaAktPds && !$overrideExisting) {
            return;
        }
        $this->collAnggotaAktPds = new PropelObjectCollection();
        $this->collAnggotaAktPds->setModel('AnggotaAktPd');
    }

    /**
     * Gets an array of AnggotaAktPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this AktPd is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AnggotaAktPd[] List of AnggotaAktPd objects
     * @throws PropelException
     */
    public function getAnggotaAktPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaAktPdsPartial && !$this->isNew();
        if (null === $this->collAnggotaAktPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnggotaAktPds) {
                // return empty collection
                $this->initAnggotaAktPds();
            } else {
                $collAnggotaAktPds = AnggotaAktPdQuery::create(null, $criteria)
                    ->filterByAktPd($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnggotaAktPdsPartial && count($collAnggotaAktPds)) {
                      $this->initAnggotaAktPds(false);

                      foreach($collAnggotaAktPds as $obj) {
                        if (false == $this->collAnggotaAktPds->contains($obj)) {
                          $this->collAnggotaAktPds->append($obj);
                        }
                      }

                      $this->collAnggotaAktPdsPartial = true;
                    }

                    $collAnggotaAktPds->getInternalIterator()->rewind();
                    return $collAnggotaAktPds;
                }

                if($partial && $this->collAnggotaAktPds) {
                    foreach($this->collAnggotaAktPds as $obj) {
                        if($obj->isNew()) {
                            $collAnggotaAktPds[] = $obj;
                        }
                    }
                }

                $this->collAnggotaAktPds = $collAnggotaAktPds;
                $this->collAnggotaAktPdsPartial = false;
            }
        }

        return $this->collAnggotaAktPds;
    }

    /**
     * Sets a collection of AnggotaAktPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anggotaAktPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return AktPd The current object (for fluent API support)
     */
    public function setAnggotaAktPds(PropelCollection $anggotaAktPds, PropelPDO $con = null)
    {
        $anggotaAktPdsToDelete = $this->getAnggotaAktPds(new Criteria(), $con)->diff($anggotaAktPds);

        $this->anggotaAktPdsScheduledForDeletion = unserialize(serialize($anggotaAktPdsToDelete));

        foreach ($anggotaAktPdsToDelete as $anggotaAktPdRemoved) {
            $anggotaAktPdRemoved->setAktPd(null);
        }

        $this->collAnggotaAktPds = null;
        foreach ($anggotaAktPds as $anggotaAktPd) {
            $this->addAnggotaAktPd($anggotaAktPd);
        }

        $this->collAnggotaAktPds = $anggotaAktPds;
        $this->collAnggotaAktPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AnggotaAktPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AnggotaAktPd objects.
     * @throws PropelException
     */
    public function countAnggotaAktPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnggotaAktPdsPartial && !$this->isNew();
        if (null === $this->collAnggotaAktPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnggotaAktPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnggotaAktPds());
            }
            $query = AnggotaAktPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAktPd($this)
                ->count($con);
        }

        return count($this->collAnggotaAktPds);
    }

    /**
     * Method called to associate a AnggotaAktPd object to this object
     * through the AnggotaAktPd foreign key attribute.
     *
     * @param    AnggotaAktPd $l AnggotaAktPd
     * @return AktPd The current object (for fluent API support)
     */
    public function addAnggotaAktPd(AnggotaAktPd $l)
    {
        if ($this->collAnggotaAktPds === null) {
            $this->initAnggotaAktPds();
            $this->collAnggotaAktPdsPartial = true;
        }
        if (!in_array($l, $this->collAnggotaAktPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnggotaAktPd($l);
        }

        return $this;
    }

    /**
     * @param	AnggotaAktPd $anggotaAktPd The anggotaAktPd object to add.
     */
    protected function doAddAnggotaAktPd($anggotaAktPd)
    {
        $this->collAnggotaAktPds[]= $anggotaAktPd;
        $anggotaAktPd->setAktPd($this);
    }

    /**
     * @param	AnggotaAktPd $anggotaAktPd The anggotaAktPd object to remove.
     * @return AktPd The current object (for fluent API support)
     */
    public function removeAnggotaAktPd($anggotaAktPd)
    {
        if ($this->getAnggotaAktPds()->contains($anggotaAktPd)) {
            $this->collAnggotaAktPds->remove($this->collAnggotaAktPds->search($anggotaAktPd));
            if (null === $this->anggotaAktPdsScheduledForDeletion) {
                $this->anggotaAktPdsScheduledForDeletion = clone $this->collAnggotaAktPds;
                $this->anggotaAktPdsScheduledForDeletion->clear();
            }
            $this->anggotaAktPdsScheduledForDeletion[]= clone $anggotaAktPd;
            $anggotaAktPd->setAktPd(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AktPd is new, it will return
     * an empty collection; or if this AktPd has previously
     * been saved, it will retrieve related AnggotaAktPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AktPd.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AnggotaAktPd[] List of AnggotaAktPd objects
     */
    public function getAnggotaAktPdsJoinRegistrasiPesertaDidik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnggotaAktPdQuery::create(null, $criteria);
        $query->joinWith('RegistrasiPesertaDidik', $join_behavior);

        return $this->getAnggotaAktPds($query, $con);
    }

    /**
     * Clears out the collBimbingPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return AktPd The current object (for fluent API support)
     * @see        addBimbingPds()
     */
    public function clearBimbingPds()
    {
        $this->collBimbingPds = null; // important to set this to null since that means it is uninitialized
        $this->collBimbingPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collBimbingPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialBimbingPds($v = true)
    {
        $this->collBimbingPdsPartial = $v;
    }

    /**
     * Initializes the collBimbingPds collection.
     *
     * By default this just sets the collBimbingPds collection to an empty array (like clearcollBimbingPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBimbingPds($overrideExisting = true)
    {
        if (null !== $this->collBimbingPds && !$overrideExisting) {
            return;
        }
        $this->collBimbingPds = new PropelObjectCollection();
        $this->collBimbingPds->setModel('BimbingPd');
    }

    /**
     * Gets an array of BimbingPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this AktPd is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BimbingPd[] List of BimbingPd objects
     * @throws PropelException
     */
    public function getBimbingPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBimbingPdsPartial && !$this->isNew();
        if (null === $this->collBimbingPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBimbingPds) {
                // return empty collection
                $this->initBimbingPds();
            } else {
                $collBimbingPds = BimbingPdQuery::create(null, $criteria)
                    ->filterByAktPd($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBimbingPdsPartial && count($collBimbingPds)) {
                      $this->initBimbingPds(false);

                      foreach($collBimbingPds as $obj) {
                        if (false == $this->collBimbingPds->contains($obj)) {
                          $this->collBimbingPds->append($obj);
                        }
                      }

                      $this->collBimbingPdsPartial = true;
                    }

                    $collBimbingPds->getInternalIterator()->rewind();
                    return $collBimbingPds;
                }

                if($partial && $this->collBimbingPds) {
                    foreach($this->collBimbingPds as $obj) {
                        if($obj->isNew()) {
                            $collBimbingPds[] = $obj;
                        }
                    }
                }

                $this->collBimbingPds = $collBimbingPds;
                $this->collBimbingPdsPartial = false;
            }
        }

        return $this->collBimbingPds;
    }

    /**
     * Sets a collection of BimbingPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bimbingPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return AktPd The current object (for fluent API support)
     */
    public function setBimbingPds(PropelCollection $bimbingPds, PropelPDO $con = null)
    {
        $bimbingPdsToDelete = $this->getBimbingPds(new Criteria(), $con)->diff($bimbingPds);

        $this->bimbingPdsScheduledForDeletion = unserialize(serialize($bimbingPdsToDelete));

        foreach ($bimbingPdsToDelete as $bimbingPdRemoved) {
            $bimbingPdRemoved->setAktPd(null);
        }

        $this->collBimbingPds = null;
        foreach ($bimbingPds as $bimbingPd) {
            $this->addBimbingPd($bimbingPd);
        }

        $this->collBimbingPds = $bimbingPds;
        $this->collBimbingPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BimbingPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BimbingPd objects.
     * @throws PropelException
     */
    public function countBimbingPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBimbingPdsPartial && !$this->isNew();
        if (null === $this->collBimbingPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBimbingPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBimbingPds());
            }
            $query = BimbingPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAktPd($this)
                ->count($con);
        }

        return count($this->collBimbingPds);
    }

    /**
     * Method called to associate a BimbingPd object to this object
     * through the BimbingPd foreign key attribute.
     *
     * @param    BimbingPd $l BimbingPd
     * @return AktPd The current object (for fluent API support)
     */
    public function addBimbingPd(BimbingPd $l)
    {
        if ($this->collBimbingPds === null) {
            $this->initBimbingPds();
            $this->collBimbingPdsPartial = true;
        }
        if (!in_array($l, $this->collBimbingPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBimbingPd($l);
        }

        return $this;
    }

    /**
     * @param	BimbingPd $bimbingPd The bimbingPd object to add.
     */
    protected function doAddBimbingPd($bimbingPd)
    {
        $this->collBimbingPds[]= $bimbingPd;
        $bimbingPd->setAktPd($this);
    }

    /**
     * @param	BimbingPd $bimbingPd The bimbingPd object to remove.
     * @return AktPd The current object (for fluent API support)
     */
    public function removeBimbingPd($bimbingPd)
    {
        if ($this->getBimbingPds()->contains($bimbingPd)) {
            $this->collBimbingPds->remove($this->collBimbingPds->search($bimbingPd));
            if (null === $this->bimbingPdsScheduledForDeletion) {
                $this->bimbingPdsScheduledForDeletion = clone $this->collBimbingPds;
                $this->bimbingPdsScheduledForDeletion->clear();
            }
            $this->bimbingPdsScheduledForDeletion[]= clone $bimbingPd;
            $bimbingPd->setAktPd(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AktPd is new, it will return
     * an empty collection; or if this AktPd has previously
     * been saved, it will retrieve related BimbingPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AktPd.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BimbingPd[] List of BimbingPd objects
     */
    public function getBimbingPdsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BimbingPdQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getBimbingPds($query, $con);
    }

    /**
     * Clears out the collVldAktPds collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return AktPd The current object (for fluent API support)
     * @see        addVldAktPds()
     */
    public function clearVldAktPds()
    {
        $this->collVldAktPds = null; // important to set this to null since that means it is uninitialized
        $this->collVldAktPdsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldAktPds collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldAktPds($v = true)
    {
        $this->collVldAktPdsPartial = $v;
    }

    /**
     * Initializes the collVldAktPds collection.
     *
     * By default this just sets the collVldAktPds collection to an empty array (like clearcollVldAktPds());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldAktPds($overrideExisting = true)
    {
        if (null !== $this->collVldAktPds && !$overrideExisting) {
            return;
        }
        $this->collVldAktPds = new PropelObjectCollection();
        $this->collVldAktPds->setModel('VldAktPd');
    }

    /**
     * Gets an array of VldAktPd objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this AktPd is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldAktPd[] List of VldAktPd objects
     * @throws PropelException
     */
    public function getVldAktPds($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldAktPdsPartial && !$this->isNew();
        if (null === $this->collVldAktPds || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldAktPds) {
                // return empty collection
                $this->initVldAktPds();
            } else {
                $collVldAktPds = VldAktPdQuery::create(null, $criteria)
                    ->filterByAktPd($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldAktPdsPartial && count($collVldAktPds)) {
                      $this->initVldAktPds(false);

                      foreach($collVldAktPds as $obj) {
                        if (false == $this->collVldAktPds->contains($obj)) {
                          $this->collVldAktPds->append($obj);
                        }
                      }

                      $this->collVldAktPdsPartial = true;
                    }

                    $collVldAktPds->getInternalIterator()->rewind();
                    return $collVldAktPds;
                }

                if($partial && $this->collVldAktPds) {
                    foreach($this->collVldAktPds as $obj) {
                        if($obj->isNew()) {
                            $collVldAktPds[] = $obj;
                        }
                    }
                }

                $this->collVldAktPds = $collVldAktPds;
                $this->collVldAktPdsPartial = false;
            }
        }

        return $this->collVldAktPds;
    }

    /**
     * Sets a collection of VldAktPd objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldAktPds A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return AktPd The current object (for fluent API support)
     */
    public function setVldAktPds(PropelCollection $vldAktPds, PropelPDO $con = null)
    {
        $vldAktPdsToDelete = $this->getVldAktPds(new Criteria(), $con)->diff($vldAktPds);

        $this->vldAktPdsScheduledForDeletion = unserialize(serialize($vldAktPdsToDelete));

        foreach ($vldAktPdsToDelete as $vldAktPdRemoved) {
            $vldAktPdRemoved->setAktPd(null);
        }

        $this->collVldAktPds = null;
        foreach ($vldAktPds as $vldAktPd) {
            $this->addVldAktPd($vldAktPd);
        }

        $this->collVldAktPds = $vldAktPds;
        $this->collVldAktPdsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldAktPd objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldAktPd objects.
     * @throws PropelException
     */
    public function countVldAktPds(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldAktPdsPartial && !$this->isNew();
        if (null === $this->collVldAktPds || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldAktPds) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldAktPds());
            }
            $query = VldAktPdQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByAktPd($this)
                ->count($con);
        }

        return count($this->collVldAktPds);
    }

    /**
     * Method called to associate a VldAktPd object to this object
     * through the VldAktPd foreign key attribute.
     *
     * @param    VldAktPd $l VldAktPd
     * @return AktPd The current object (for fluent API support)
     */
    public function addVldAktPd(VldAktPd $l)
    {
        if ($this->collVldAktPds === null) {
            $this->initVldAktPds();
            $this->collVldAktPdsPartial = true;
        }
        if (!in_array($l, $this->collVldAktPds->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldAktPd($l);
        }

        return $this;
    }

    /**
     * @param	VldAktPd $vldAktPd The vldAktPd object to add.
     */
    protected function doAddVldAktPd($vldAktPd)
    {
        $this->collVldAktPds[]= $vldAktPd;
        $vldAktPd->setAktPd($this);
    }

    /**
     * @param	VldAktPd $vldAktPd The vldAktPd object to remove.
     * @return AktPd The current object (for fluent API support)
     */
    public function removeVldAktPd($vldAktPd)
    {
        if ($this->getVldAktPds()->contains($vldAktPd)) {
            $this->collVldAktPds->remove($this->collVldAktPds->search($vldAktPd));
            if (null === $this->vldAktPdsScheduledForDeletion) {
                $this->vldAktPdsScheduledForDeletion = clone $this->collVldAktPds;
                $this->vldAktPdsScheduledForDeletion->clear();
            }
            $this->vldAktPdsScheduledForDeletion[]= clone $vldAktPd;
            $vldAktPd->setAktPd(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this AktPd is new, it will return
     * an empty collection; or if this AktPd has previously
     * been saved, it will retrieve related VldAktPds from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in AktPd.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldAktPd[] List of VldAktPd objects
     */
    public function getVldAktPdsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldAktPdQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldAktPds($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_akt_pd = null;
        $this->mou_id = null;
        $this->id_jns_akt_pd = null;
        $this->judul_akt_pd = null;
        $this->sk_tugas = null;
        $this->tgl_sk_tugas = null;
        $this->ket_akt = null;
        $this->a_komunal = null;
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
            if ($this->collAnggotaAktPds) {
                foreach ($this->collAnggotaAktPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBimbingPds) {
                foreach ($this->collBimbingPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collVldAktPds) {
                foreach ($this->collVldAktPds as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMou instanceof Persistent) {
              $this->aMou->clearAllReferences($deep);
            }
            if ($this->aJenisAktPd instanceof Persistent) {
              $this->aJenisAktPd->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnggotaAktPds instanceof PropelCollection) {
            $this->collAnggotaAktPds->clearIterator();
        }
        $this->collAnggotaAktPds = null;
        if ($this->collBimbingPds instanceof PropelCollection) {
            $this->collBimbingPds->clearIterator();
        }
        $this->collBimbingPds = null;
        if ($this->collVldAktPds instanceof PropelCollection) {
            $this->collVldAktPds->clearIterator();
        }
        $this->collVldAktPds = null;
        $this->aMou = null;
        $this->aJenisAktPd = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(AktPdPeer::DEFAULT_STRING_FORMAT);
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
