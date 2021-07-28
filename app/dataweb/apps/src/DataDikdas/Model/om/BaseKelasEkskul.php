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
use DataDikdas\Model\EkstraKurikuler;
use DataDikdas\Model\EkstraKurikulerQuery;
use DataDikdas\Model\KelasEkskul;
use DataDikdas\Model\KelasEkskulPeer;
use DataDikdas\Model\KelasEkskulQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;

/**
 * Base class that represents a row from the 'kelas_ekskul' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseKelasEkskul extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\KelasEkskulPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        KelasEkskulPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_kelas_ekskul field.
     * @var        string
     */
    protected $id_kelas_ekskul;

    /**
     * The value for the rombongan_belajar_id field.
     * @var        string
     */
    protected $rombongan_belajar_id;

    /**
     * The value for the id_ekskul field.
     * @var        int
     */
    protected $id_ekskul;

    /**
     * The value for the nm_ekskul field.
     * @var        string
     */
    protected $nm_ekskul;

    /**
     * The value for the sk_ekskul field.
     * @var        string
     */
    protected $sk_ekskul;

    /**
     * The value for the tgl_sk_ekskul field.
     * @var        string
     */
    protected $tgl_sk_ekskul;

    /**
     * The value for the jam_kegiatan_per_minggu field.
     * @var        string
     */
    protected $jam_kegiatan_per_minggu;

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
     * @var        RombonganBelajar
     */
    protected $aRombonganBelajar;

    /**
     * @var        EkstraKurikuler
     */
    protected $aEkstraKurikuler;

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
     * Initializes internal state of BaseKelasEkskul object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_kelas_ekskul] column value.
     * 
     * @return string
     */
    public function getIdKelasEkskul()
    {
        return $this->id_kelas_ekskul;
    }

    /**
     * Get the [rombongan_belajar_id] column value.
     * 
     * @return string
     */
    public function getRombonganBelajarId()
    {
        return $this->rombongan_belajar_id;
    }

    /**
     * Get the [id_ekskul] column value.
     * 
     * @return int
     */
    public function getIdEkskul()
    {
        return $this->id_ekskul;
    }

    /**
     * Get the [nm_ekskul] column value.
     * 
     * @return string
     */
    public function getNmEkskul()
    {
        return $this->nm_ekskul;
    }

    /**
     * Get the [sk_ekskul] column value.
     * 
     * @return string
     */
    public function getSkEkskul()
    {
        return $this->sk_ekskul;
    }

    /**
     * Get the [optionally formatted] temporal [tgl_sk_ekskul] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTglSkEkskul($format = '%Y-%m-%d')
    {
        if ($this->tgl_sk_ekskul === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tgl_sk_ekskul);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tgl_sk_ekskul, true), $x);
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
     * Get the [jam_kegiatan_per_minggu] column value.
     * 
     * @return string
     */
    public function getJamKegiatanPerMinggu()
    {
        return $this->jam_kegiatan_per_minggu;
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
     * Set the value of [id_kelas_ekskul] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setIdKelasEkskul($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_kelas_ekskul !== $v) {
            $this->id_kelas_ekskul = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::ID_KELAS_EKSKUL;
        }


        return $this;
    } // setIdKelasEkskul()

    /**
     * Set the value of [rombongan_belajar_id] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setRombonganBelajarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rombongan_belajar_id !== $v) {
            $this->rombongan_belajar_id = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::ROMBONGAN_BELAJAR_ID;
        }

        if ($this->aRombonganBelajar !== null && $this->aRombonganBelajar->getRombonganBelajarId() !== $v) {
            $this->aRombonganBelajar = null;
        }


        return $this;
    } // setRombonganBelajarId()

    /**
     * Set the value of [id_ekskul] column.
     * 
     * @param int $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setIdEkskul($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->id_ekskul !== $v) {
            $this->id_ekskul = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::ID_EKSKUL;
        }

        if ($this->aEkstraKurikuler !== null && $this->aEkstraKurikuler->getIdEkskul() !== $v) {
            $this->aEkstraKurikuler = null;
        }


        return $this;
    } // setIdEkskul()

    /**
     * Set the value of [nm_ekskul] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setNmEkskul($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_ekskul !== $v) {
            $this->nm_ekskul = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::NM_EKSKUL;
        }


        return $this;
    } // setNmEkskul()

    /**
     * Set the value of [sk_ekskul] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setSkEkskul($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sk_ekskul !== $v) {
            $this->sk_ekskul = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::SK_EKSKUL;
        }


        return $this;
    } // setSkEkskul()

    /**
     * Sets the value of [tgl_sk_ekskul] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setTglSkEkskul($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tgl_sk_ekskul !== null || $dt !== null) {
            $currentDateAsString = ($this->tgl_sk_ekskul !== null && $tmpDt = new DateTime($this->tgl_sk_ekskul)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tgl_sk_ekskul = $newDateAsString;
                $this->modifiedColumns[] = KelasEkskulPeer::TGL_SK_EKSKUL;
            }
        } // if either are not null


        return $this;
    } // setTglSkEkskul()

    /**
     * Set the value of [jam_kegiatan_per_minggu] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setJamKegiatanPerMinggu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jam_kegiatan_per_minggu !== $v) {
            $this->jam_kegiatan_per_minggu = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU;
        }


        return $this;
    } // setJamKegiatanPerMinggu()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = KelasEkskulPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = KelasEkskulPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return KelasEkskul The current object (for fluent API support)
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
                $this->modifiedColumns[] = KelasEkskulPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return KelasEkskul The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = KelasEkskulPeer::UPDATER_ID;
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

            $this->id_kelas_ekskul = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->rombongan_belajar_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_ekskul = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->nm_ekskul = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->sk_ekskul = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tgl_sk_ekskul = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->jam_kegiatan_per_minggu = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
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
            return $startcol + 12; // 12 = KelasEkskulPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating KelasEkskul object", $e);
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

        if ($this->aRombonganBelajar !== null && $this->rombongan_belajar_id !== $this->aRombonganBelajar->getRombonganBelajarId()) {
            $this->aRombonganBelajar = null;
        }
        if ($this->aEkstraKurikuler !== null && $this->id_ekskul !== $this->aEkstraKurikuler->getIdEkskul()) {
            $this->aEkstraKurikuler = null;
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
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = KelasEkskulPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRombonganBelajar = null;
            $this->aEkstraKurikuler = null;
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
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = KelasEkskulQuery::create()
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
            $con = Propel::getConnection(KelasEkskulPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                KelasEkskulPeer::addInstanceToPool($this);
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

            if ($this->aRombonganBelajar !== null) {
                if ($this->aRombonganBelajar->isModified() || $this->aRombonganBelajar->isNew()) {
                    $affectedRows += $this->aRombonganBelajar->save($con);
                }
                $this->setRombonganBelajar($this->aRombonganBelajar);
            }

            if ($this->aEkstraKurikuler !== null) {
                if ($this->aEkstraKurikuler->isModified() || $this->aEkstraKurikuler->isNew()) {
                    $affectedRows += $this->aEkstraKurikuler->save($con);
                }
                $this->setEkstraKurikuler($this->aEkstraKurikuler);
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
        if ($this->isColumnModified(KelasEkskulPeer::ID_KELAS_EKSKUL)) {
            $modifiedColumns[':p' . $index++]  = '"id_kelas_ekskul"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"rombongan_belajar_id"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::ID_EKSKUL)) {
            $modifiedColumns[':p' . $index++]  = '"id_ekskul"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::NM_EKSKUL)) {
            $modifiedColumns[':p' . $index++]  = '"nm_ekskul"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::SK_EKSKUL)) {
            $modifiedColumns[':p' . $index++]  = '"sk_ekskul"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::TGL_SK_EKSKUL)) {
            $modifiedColumns[':p' . $index++]  = '"tgl_sk_ekskul"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU)) {
            $modifiedColumns[':p' . $index++]  = '"jam_kegiatan_per_minggu"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(KelasEkskulPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "kelas_ekskul" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_kelas_ekskul"':						
                        $stmt->bindValue($identifier, $this->id_kelas_ekskul, PDO::PARAM_STR);
                        break;
                    case '"rombongan_belajar_id"':						
                        $stmt->bindValue($identifier, $this->rombongan_belajar_id, PDO::PARAM_STR);
                        break;
                    case '"id_ekskul"':						
                        $stmt->bindValue($identifier, $this->id_ekskul, PDO::PARAM_INT);
                        break;
                    case '"nm_ekskul"':						
                        $stmt->bindValue($identifier, $this->nm_ekskul, PDO::PARAM_STR);
                        break;
                    case '"sk_ekskul"':						
                        $stmt->bindValue($identifier, $this->sk_ekskul, PDO::PARAM_STR);
                        break;
                    case '"tgl_sk_ekskul"':						
                        $stmt->bindValue($identifier, $this->tgl_sk_ekskul, PDO::PARAM_STR);
                        break;
                    case '"jam_kegiatan_per_minggu"':						
                        $stmt->bindValue($identifier, $this->jam_kegiatan_per_minggu, PDO::PARAM_STR);
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

            if ($this->aRombonganBelajar !== null) {
                if (!$this->aRombonganBelajar->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRombonganBelajar->getValidationFailures());
                }
            }

            if ($this->aEkstraKurikuler !== null) {
                if (!$this->aEkstraKurikuler->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aEkstraKurikuler->getValidationFailures());
                }
            }


            if (($retval = KelasEkskulPeer::doValidate($this, $columns)) !== true) {
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
        $pos = KelasEkskulPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdKelasEkskul();
                break;
            case 1:
                return $this->getRombonganBelajarId();
                break;
            case 2:
                return $this->getIdEkskul();
                break;
            case 3:
                return $this->getNmEkskul();
                break;
            case 4:
                return $this->getSkEkskul();
                break;
            case 5:
                return $this->getTglSkEkskul();
                break;
            case 6:
                return $this->getJamKegiatanPerMinggu();
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
        if (isset($alreadyDumpedObjects['KelasEkskul'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['KelasEkskul'][$this->getPrimaryKey()] = true;
        $keys = KelasEkskulPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdKelasEkskul(),
            $keys[1] => $this->getRombonganBelajarId(),
            $keys[2] => $this->getIdEkskul(),
            $keys[3] => $this->getNmEkskul(),
            $keys[4] => $this->getSkEkskul(),
            $keys[5] => $this->getTglSkEkskul(),
            $keys[6] => $this->getJamKegiatanPerMinggu(),
            $keys[7] => $this->getCreateDate(),
            $keys[8] => $this->getLastUpdate(),
            $keys[9] => $this->getSoftDelete(),
            $keys[10] => $this->getLastSync(),
            $keys[11] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRombonganBelajar) {
                $result['RombonganBelajar'] = $this->aRombonganBelajar->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aEkstraKurikuler) {
                $result['EkstraKurikuler'] = $this->aEkstraKurikuler->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = KelasEkskulPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdKelasEkskul($value);
                break;
            case 1:
                $this->setRombonganBelajarId($value);
                break;
            case 2:
                $this->setIdEkskul($value);
                break;
            case 3:
                $this->setNmEkskul($value);
                break;
            case 4:
                $this->setSkEkskul($value);
                break;
            case 5:
                $this->setTglSkEkskul($value);
                break;
            case 6:
                $this->setJamKegiatanPerMinggu($value);
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
        $keys = KelasEkskulPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdKelasEkskul($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setRombonganBelajarId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdEkskul($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNmEkskul($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSkEkskul($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTglSkEkskul($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setJamKegiatanPerMinggu($arr[$keys[6]]);
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
        $criteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);

        if ($this->isColumnModified(KelasEkskulPeer::ID_KELAS_EKSKUL)) $criteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, $this->id_kelas_ekskul);
        if ($this->isColumnModified(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID)) $criteria->add(KelasEkskulPeer::ROMBONGAN_BELAJAR_ID, $this->rombongan_belajar_id);
        if ($this->isColumnModified(KelasEkskulPeer::ID_EKSKUL)) $criteria->add(KelasEkskulPeer::ID_EKSKUL, $this->id_ekskul);
        if ($this->isColumnModified(KelasEkskulPeer::NM_EKSKUL)) $criteria->add(KelasEkskulPeer::NM_EKSKUL, $this->nm_ekskul);
        if ($this->isColumnModified(KelasEkskulPeer::SK_EKSKUL)) $criteria->add(KelasEkskulPeer::SK_EKSKUL, $this->sk_ekskul);
        if ($this->isColumnModified(KelasEkskulPeer::TGL_SK_EKSKUL)) $criteria->add(KelasEkskulPeer::TGL_SK_EKSKUL, $this->tgl_sk_ekskul);
        if ($this->isColumnModified(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU)) $criteria->add(KelasEkskulPeer::JAM_KEGIATAN_PER_MINGGU, $this->jam_kegiatan_per_minggu);
        if ($this->isColumnModified(KelasEkskulPeer::CREATE_DATE)) $criteria->add(KelasEkskulPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(KelasEkskulPeer::LAST_UPDATE)) $criteria->add(KelasEkskulPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(KelasEkskulPeer::SOFT_DELETE)) $criteria->add(KelasEkskulPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(KelasEkskulPeer::LAST_SYNC)) $criteria->add(KelasEkskulPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(KelasEkskulPeer::UPDATER_ID)) $criteria->add(KelasEkskulPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(KelasEkskulPeer::DATABASE_NAME);
        $criteria->add(KelasEkskulPeer::ID_KELAS_EKSKUL, $this->id_kelas_ekskul);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdKelasEkskul();
    }

    /**
     * Generic method to set the primary key (id_kelas_ekskul column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdKelasEkskul($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdKelasEkskul();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of KelasEkskul (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setRombonganBelajarId($this->getRombonganBelajarId());
        $copyObj->setIdEkskul($this->getIdEkskul());
        $copyObj->setNmEkskul($this->getNmEkskul());
        $copyObj->setSkEkskul($this->getSkEkskul());
        $copyObj->setTglSkEkskul($this->getTglSkEkskul());
        $copyObj->setJamKegiatanPerMinggu($this->getJamKegiatanPerMinggu());
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
            $copyObj->setIdKelasEkskul(NULL); // this is a auto-increment column, so set to default value
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
     * @return KelasEkskul Clone of current object.
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
     * @return KelasEkskulPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new KelasEkskulPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a RombonganBelajar object.
     *
     * @param             RombonganBelajar $v
     * @return KelasEkskul The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRombonganBelajar(RombonganBelajar $v = null)
    {
        if ($v === null) {
            $this->setRombonganBelajarId(NULL);
        } else {
            $this->setRombonganBelajarId($v->getRombonganBelajarId());
        }

        $this->aRombonganBelajar = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the RombonganBelajar object, it will not be re-added.
        if ($v !== null) {
            $v->addKelasEkskul($this);
        }


        return $this;
    }


    /**
     * Get the associated RombonganBelajar object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return RombonganBelajar The associated RombonganBelajar object.
     * @throws PropelException
     */
    public function getRombonganBelajar(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRombonganBelajar === null && (($this->rombongan_belajar_id !== "" && $this->rombongan_belajar_id !== null)) && $doQuery) {
            $this->aRombonganBelajar = RombonganBelajarQuery::create()->findPk($this->rombongan_belajar_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRombonganBelajar->addKelasEkskuls($this);
             */
        }

        return $this->aRombonganBelajar;
    }

    /**
     * Declares an association between this object and a EkstraKurikuler object.
     *
     * @param             EkstraKurikuler $v
     * @return KelasEkskul The current object (for fluent API support)
     * @throws PropelException
     */
    public function setEkstraKurikuler(EkstraKurikuler $v = null)
    {
        if ($v === null) {
            $this->setIdEkskul(NULL);
        } else {
            $this->setIdEkskul($v->getIdEkskul());
        }

        $this->aEkstraKurikuler = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the EkstraKurikuler object, it will not be re-added.
        if ($v !== null) {
            $v->addKelasEkskul($this);
        }


        return $this;
    }


    /**
     * Get the associated EkstraKurikuler object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return EkstraKurikuler The associated EkstraKurikuler object.
     * @throws PropelException
     */
    public function getEkstraKurikuler(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aEkstraKurikuler === null && ($this->id_ekskul !== null) && $doQuery) {
            $this->aEkstraKurikuler = EkstraKurikulerQuery::create()->findPk($this->id_ekskul, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aEkstraKurikuler->addKelasEkskuls($this);
             */
        }

        return $this->aEkstraKurikuler;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_kelas_ekskul = null;
        $this->rombongan_belajar_id = null;
        $this->id_ekskul = null;
        $this->nm_ekskul = null;
        $this->sk_ekskul = null;
        $this->tgl_sk_ekskul = null;
        $this->jam_kegiatan_per_minggu = null;
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
            if ($this->aRombonganBelajar instanceof Persistent) {
              $this->aRombonganBelajar->clearAllReferences($deep);
            }
            if ($this->aEkstraKurikuler instanceof Persistent) {
              $this->aEkstraKurikuler->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aRombonganBelajar = null;
        $this->aEkstraKurikuler = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(KelasEkskulPeer::DEFAULT_STRING_FORMAT);
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
