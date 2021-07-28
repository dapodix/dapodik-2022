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
use DataDikdas\Model\JenisPrestasi;
use DataDikdas\Model\JenisPrestasiQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Prestasi;
use DataDikdas\Model\PrestasiPeer;
use DataDikdas\Model\PrestasiQuery;
use DataDikdas\Model\TingkatPrestasi;
use DataDikdas\Model\TingkatPrestasiQuery;
use DataDikdas\Model\VldPrestasi;
use DataDikdas\Model\VldPrestasiQuery;

/**
 * Base class that represents a row from the 'prestasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePrestasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PrestasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PrestasiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the prestasi_id field.
     * @var        string
     */
    protected $prestasi_id;

    /**
     * The value for the jenis_prestasi_id field.
     * @var        int
     */
    protected $jenis_prestasi_id;

    /**
     * The value for the tingkat_prestasi_id field.
     * @var        int
     */
    protected $tingkat_prestasi_id;

    /**
     * The value for the peserta_didik_id field.
     * @var        string
     */
    protected $peserta_didik_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the tahun_prestasi field.
     * @var        string
     */
    protected $tahun_prestasi;

    /**
     * The value for the penyelenggara field.
     * @var        string
     */
    protected $penyelenggara;

    /**
     * The value for the peringkat field.
     * @var        int
     */
    protected $peringkat;

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
     * @var        JenisPrestasi
     */
    protected $aJenisPrestasi;

    /**
     * @var        TingkatPrestasi
     */
    protected $aTingkatPrestasi;

    /**
     * @var        PesertaDidik
     */
    protected $aPesertaDidik;

    /**
     * @var        PropelObjectCollection|VldPrestasi[] Collection to store aggregation of VldPrestasi objects.
     */
    protected $collVldPrestasis;
    protected $collVldPrestasisPartial;

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
    protected $vldPrestasisScheduledForDeletion = null;

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
     * Initializes internal state of BasePrestasi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [prestasi_id] column value.
     * 
     * @return string
     */
    public function getPrestasiId()
    {
        return $this->prestasi_id;
    }

    /**
     * Get the [jenis_prestasi_id] column value.
     * 
     * @return int
     */
    public function getJenisPrestasiId()
    {
        return $this->jenis_prestasi_id;
    }

    /**
     * Get the [tingkat_prestasi_id] column value.
     * 
     * @return int
     */
    public function getTingkatPrestasiId()
    {
        return $this->tingkat_prestasi_id;
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
    }

    /**
     * Get the [tahun_prestasi] column value.
     * 
     * @return string
     */
    public function getTahunPrestasi()
    {
        return $this->tahun_prestasi;
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
     * Get the [peringkat] column value.
     * 
     * @return int
     */
    public function getPeringkat()
    {
        return $this->peringkat;
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
     * Set the value of [prestasi_id] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setPrestasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prestasi_id !== $v) {
            $this->prestasi_id = $v;
            $this->modifiedColumns[] = PrestasiPeer::PRESTASI_ID;
        }


        return $this;
    } // setPrestasiId()

    /**
     * Set the value of [jenis_prestasi_id] column.
     * 
     * @param int $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setJenisPrestasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_prestasi_id !== $v) {
            $this->jenis_prestasi_id = $v;
            $this->modifiedColumns[] = PrestasiPeer::JENIS_PRESTASI_ID;
        }

        if ($this->aJenisPrestasi !== null && $this->aJenisPrestasi->getJenisPrestasiId() !== $v) {
            $this->aJenisPrestasi = null;
        }


        return $this;
    } // setJenisPrestasiId()

    /**
     * Set the value of [tingkat_prestasi_id] column.
     * 
     * @param int $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setTingkatPrestasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->tingkat_prestasi_id !== $v) {
            $this->tingkat_prestasi_id = $v;
            $this->modifiedColumns[] = PrestasiPeer::TINGKAT_PRESTASI_ID;
        }

        if ($this->aTingkatPrestasi !== null && $this->aTingkatPrestasi->getTingkatPrestasiId() !== $v) {
            $this->aTingkatPrestasi = null;
        }


        return $this;
    } // setTingkatPrestasiId()

    /**
     * Set the value of [peserta_didik_id] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setPesertaDidikId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peserta_didik_id !== $v) {
            $this->peserta_didik_id = $v;
            $this->modifiedColumns[] = PrestasiPeer::PESERTA_DIDIK_ID;
        }

        if ($this->aPesertaDidik !== null && $this->aPesertaDidik->getPesertaDidikId() !== $v) {
            $this->aPesertaDidik = null;
        }


        return $this;
    } // setPesertaDidikId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = PrestasiPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [tahun_prestasi] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setTahunPrestasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun_prestasi !== $v) {
            $this->tahun_prestasi = $v;
            $this->modifiedColumns[] = PrestasiPeer::TAHUN_PRESTASI;
        }


        return $this;
    } // setTahunPrestasi()

    /**
     * Set the value of [penyelenggara] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setPenyelenggara($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penyelenggara !== $v) {
            $this->penyelenggara = $v;
            $this->modifiedColumns[] = PrestasiPeer::PENYELENGGARA;
        }


        return $this;
    } // setPenyelenggara()

    /**
     * Set the value of [peringkat] column.
     * 
     * @param int $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setPeringkat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->peringkat !== $v) {
            $this->peringkat = $v;
            $this->modifiedColumns[] = PrestasiPeer::PERINGKAT;
        }


        return $this;
    } // setPeringkat()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = PrestasiPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Prestasi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PrestasiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Prestasi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PrestasiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = PrestasiPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Prestasi The current object (for fluent API support)
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
                $this->modifiedColumns[] = PrestasiPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Prestasi The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = PrestasiPeer::UPDATER_ID;
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

            $this->prestasi_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_prestasi_id = ($row[$startcol + 1] !== null) ? (int) $row[$startcol + 1] : null;
            $this->tingkat_prestasi_id = ($row[$startcol + 2] !== null) ? (int) $row[$startcol + 2] : null;
            $this->peserta_didik_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nama = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tahun_prestasi = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->penyelenggara = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->peringkat = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->asal_data = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->create_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_update = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->soft_delete = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_sync = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->updater_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = PrestasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Prestasi object", $e);
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

        if ($this->aJenisPrestasi !== null && $this->jenis_prestasi_id !== $this->aJenisPrestasi->getJenisPrestasiId()) {
            $this->aJenisPrestasi = null;
        }
        if ($this->aTingkatPrestasi !== null && $this->tingkat_prestasi_id !== $this->aTingkatPrestasi->getTingkatPrestasiId()) {
            $this->aTingkatPrestasi = null;
        }
        if ($this->aPesertaDidik !== null && $this->peserta_didik_id !== $this->aPesertaDidik->getPesertaDidikId()) {
            $this->aPesertaDidik = null;
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
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PrestasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisPrestasi = null;
            $this->aTingkatPrestasi = null;
            $this->aPesertaDidik = null;
            $this->collVldPrestasis = null;

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
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PrestasiQuery::create()
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
            $con = Propel::getConnection(PrestasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PrestasiPeer::addInstanceToPool($this);
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

            if ($this->aJenisPrestasi !== null) {
                if ($this->aJenisPrestasi->isModified() || $this->aJenisPrestasi->isNew()) {
                    $affectedRows += $this->aJenisPrestasi->save($con);
                }
                $this->setJenisPrestasi($this->aJenisPrestasi);
            }

            if ($this->aTingkatPrestasi !== null) {
                if ($this->aTingkatPrestasi->isModified() || $this->aTingkatPrestasi->isNew()) {
                    $affectedRows += $this->aTingkatPrestasi->save($con);
                }
                $this->setTingkatPrestasi($this->aTingkatPrestasi);
            }

            if ($this->aPesertaDidik !== null) {
                if ($this->aPesertaDidik->isModified() || $this->aPesertaDidik->isNew()) {
                    $affectedRows += $this->aPesertaDidik->save($con);
                }
                $this->setPesertaDidik($this->aPesertaDidik);
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

            if ($this->vldPrestasisScheduledForDeletion !== null) {
                if (!$this->vldPrestasisScheduledForDeletion->isEmpty()) {
                    VldPrestasiQuery::create()
                        ->filterByPrimaryKeys($this->vldPrestasisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldPrestasisScheduledForDeletion = null;
                }
            }

            if ($this->collVldPrestasis !== null) {
                foreach ($this->collVldPrestasis as $referrerFK) {
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
        if ($this->isColumnModified(PrestasiPeer::PRESTASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"prestasi_id"';
        }
        if ($this->isColumnModified(PrestasiPeer::JENIS_PRESTASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_prestasi_id"';
        }
        if ($this->isColumnModified(PrestasiPeer::TINGKAT_PRESTASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_prestasi_id"';
        }
        if ($this->isColumnModified(PrestasiPeer::PESERTA_DIDIK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"peserta_didik_id"';
        }
        if ($this->isColumnModified(PrestasiPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(PrestasiPeer::TAHUN_PRESTASI)) {
            $modifiedColumns[':p' . $index++]  = '"tahun_prestasi"';
        }
        if ($this->isColumnModified(PrestasiPeer::PENYELENGGARA)) {
            $modifiedColumns[':p' . $index++]  = '"penyelenggara"';
        }
        if ($this->isColumnModified(PrestasiPeer::PERINGKAT)) {
            $modifiedColumns[':p' . $index++]  = '"peringkat"';
        }
        if ($this->isColumnModified(PrestasiPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(PrestasiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PrestasiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PrestasiPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(PrestasiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(PrestasiPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "prestasi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"prestasi_id"':						
                        $stmt->bindValue($identifier, $this->prestasi_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_prestasi_id"':						
                        $stmt->bindValue($identifier, $this->jenis_prestasi_id, PDO::PARAM_INT);
                        break;
                    case '"tingkat_prestasi_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_prestasi_id, PDO::PARAM_INT);
                        break;
                    case '"peserta_didik_id"':						
                        $stmt->bindValue($identifier, $this->peserta_didik_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"tahun_prestasi"':						
                        $stmt->bindValue($identifier, $this->tahun_prestasi, PDO::PARAM_STR);
                        break;
                    case '"penyelenggara"':						
                        $stmt->bindValue($identifier, $this->penyelenggara, PDO::PARAM_STR);
                        break;
                    case '"peringkat"':						
                        $stmt->bindValue($identifier, $this->peringkat, PDO::PARAM_INT);
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

            if ($this->aJenisPrestasi !== null) {
                if (!$this->aJenisPrestasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisPrestasi->getValidationFailures());
                }
            }

            if ($this->aTingkatPrestasi !== null) {
                if (!$this->aTingkatPrestasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aTingkatPrestasi->getValidationFailures());
                }
            }

            if ($this->aPesertaDidik !== null) {
                if (!$this->aPesertaDidik->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPesertaDidik->getValidationFailures());
                }
            }


            if (($retval = PrestasiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldPrestasis !== null) {
                    foreach ($this->collVldPrestasis as $referrerFK) {
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
        $pos = PrestasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPrestasiId();
                break;
            case 1:
                return $this->getJenisPrestasiId();
                break;
            case 2:
                return $this->getTingkatPrestasiId();
                break;
            case 3:
                return $this->getPesertaDidikId();
                break;
            case 4:
                return $this->getNama();
                break;
            case 5:
                return $this->getTahunPrestasi();
                break;
            case 6:
                return $this->getPenyelenggara();
                break;
            case 7:
                return $this->getPeringkat();
                break;
            case 8:
                return $this->getAsalData();
                break;
            case 9:
                return $this->getCreateDate();
                break;
            case 10:
                return $this->getLastUpdate();
                break;
            case 11:
                return $this->getSoftDelete();
                break;
            case 12:
                return $this->getLastSync();
                break;
            case 13:
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
        if (isset($alreadyDumpedObjects['Prestasi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Prestasi'][$this->getPrimaryKey()] = true;
        $keys = PrestasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPrestasiId(),
            $keys[1] => $this->getJenisPrestasiId(),
            $keys[2] => $this->getTingkatPrestasiId(),
            $keys[3] => $this->getPesertaDidikId(),
            $keys[4] => $this->getNama(),
            $keys[5] => $this->getTahunPrestasi(),
            $keys[6] => $this->getPenyelenggara(),
            $keys[7] => $this->getPeringkat(),
            $keys[8] => $this->getAsalData(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getSoftDelete(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisPrestasi) {
                $result['JenisPrestasi'] = $this->aJenisPrestasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aTingkatPrestasi) {
                $result['TingkatPrestasi'] = $this->aTingkatPrestasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPesertaDidik) {
                $result['PesertaDidik'] = $this->aPesertaDidik->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldPrestasis) {
                $result['VldPrestasis'] = $this->collVldPrestasis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = PrestasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPrestasiId($value);
                break;
            case 1:
                $this->setJenisPrestasiId($value);
                break;
            case 2:
                $this->setTingkatPrestasiId($value);
                break;
            case 3:
                $this->setPesertaDidikId($value);
                break;
            case 4:
                $this->setNama($value);
                break;
            case 5:
                $this->setTahunPrestasi($value);
                break;
            case 6:
                $this->setPenyelenggara($value);
                break;
            case 7:
                $this->setPeringkat($value);
                break;
            case 8:
                $this->setAsalData($value);
                break;
            case 9:
                $this->setCreateDate($value);
                break;
            case 10:
                $this->setLastUpdate($value);
                break;
            case 11:
                $this->setSoftDelete($value);
                break;
            case 12:
                $this->setLastSync($value);
                break;
            case 13:
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
        $keys = PrestasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPrestasiId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisPrestasiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setTingkatPrestasiId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPesertaDidikId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNama($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTahunPrestasi($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPenyelenggara($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPeringkat($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAsalData($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreateDate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastUpdate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSoftDelete($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastSync($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setUpdaterId($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PrestasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(PrestasiPeer::PRESTASI_ID)) $criteria->add(PrestasiPeer::PRESTASI_ID, $this->prestasi_id);
        if ($this->isColumnModified(PrestasiPeer::JENIS_PRESTASI_ID)) $criteria->add(PrestasiPeer::JENIS_PRESTASI_ID, $this->jenis_prestasi_id);
        if ($this->isColumnModified(PrestasiPeer::TINGKAT_PRESTASI_ID)) $criteria->add(PrestasiPeer::TINGKAT_PRESTASI_ID, $this->tingkat_prestasi_id);
        if ($this->isColumnModified(PrestasiPeer::PESERTA_DIDIK_ID)) $criteria->add(PrestasiPeer::PESERTA_DIDIK_ID, $this->peserta_didik_id);
        if ($this->isColumnModified(PrestasiPeer::NAMA)) $criteria->add(PrestasiPeer::NAMA, $this->nama);
        if ($this->isColumnModified(PrestasiPeer::TAHUN_PRESTASI)) $criteria->add(PrestasiPeer::TAHUN_PRESTASI, $this->tahun_prestasi);
        if ($this->isColumnModified(PrestasiPeer::PENYELENGGARA)) $criteria->add(PrestasiPeer::PENYELENGGARA, $this->penyelenggara);
        if ($this->isColumnModified(PrestasiPeer::PERINGKAT)) $criteria->add(PrestasiPeer::PERINGKAT, $this->peringkat);
        if ($this->isColumnModified(PrestasiPeer::ASAL_DATA)) $criteria->add(PrestasiPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(PrestasiPeer::CREATE_DATE)) $criteria->add(PrestasiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PrestasiPeer::LAST_UPDATE)) $criteria->add(PrestasiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PrestasiPeer::SOFT_DELETE)) $criteria->add(PrestasiPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(PrestasiPeer::LAST_SYNC)) $criteria->add(PrestasiPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(PrestasiPeer::UPDATER_ID)) $criteria->add(PrestasiPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(PrestasiPeer::DATABASE_NAME);
        $criteria->add(PrestasiPeer::PRESTASI_ID, $this->prestasi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPrestasiId();
    }

    /**
     * Generic method to set the primary key (prestasi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPrestasiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPrestasiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Prestasi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisPrestasiId($this->getJenisPrestasiId());
        $copyObj->setTingkatPrestasiId($this->getTingkatPrestasiId());
        $copyObj->setPesertaDidikId($this->getPesertaDidikId());
        $copyObj->setNama($this->getNama());
        $copyObj->setTahunPrestasi($this->getTahunPrestasi());
        $copyObj->setPenyelenggara($this->getPenyelenggara());
        $copyObj->setPeringkat($this->getPeringkat());
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

            foreach ($this->getVldPrestasis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldPrestasi($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPrestasiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Prestasi Clone of current object.
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
     * @return PrestasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PrestasiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisPrestasi object.
     *
     * @param             JenisPrestasi $v
     * @return Prestasi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisPrestasi(JenisPrestasi $v = null)
    {
        if ($v === null) {
            $this->setJenisPrestasiId(NULL);
        } else {
            $this->setJenisPrestasiId($v->getJenisPrestasiId());
        }

        $this->aJenisPrestasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisPrestasi object, it will not be re-added.
        if ($v !== null) {
            $v->addPrestasi($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisPrestasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisPrestasi The associated JenisPrestasi object.
     * @throws PropelException
     */
    public function getJenisPrestasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisPrestasi === null && ($this->jenis_prestasi_id !== null) && $doQuery) {
            $this->aJenisPrestasi = JenisPrestasiQuery::create()->findPk($this->jenis_prestasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisPrestasi->addPrestasis($this);
             */
        }

        return $this->aJenisPrestasi;
    }

    /**
     * Declares an association between this object and a TingkatPrestasi object.
     *
     * @param             TingkatPrestasi $v
     * @return Prestasi The current object (for fluent API support)
     * @throws PropelException
     */
    public function setTingkatPrestasi(TingkatPrestasi $v = null)
    {
        if ($v === null) {
            $this->setTingkatPrestasiId(NULL);
        } else {
            $this->setTingkatPrestasiId($v->getTingkatPrestasiId());
        }

        $this->aTingkatPrestasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the TingkatPrestasi object, it will not be re-added.
        if ($v !== null) {
            $v->addPrestasi($this);
        }


        return $this;
    }


    /**
     * Get the associated TingkatPrestasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return TingkatPrestasi The associated TingkatPrestasi object.
     * @throws PropelException
     */
    public function getTingkatPrestasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aTingkatPrestasi === null && ($this->tingkat_prestasi_id !== null) && $doQuery) {
            $this->aTingkatPrestasi = TingkatPrestasiQuery::create()->findPk($this->tingkat_prestasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aTingkatPrestasi->addPrestasis($this);
             */
        }

        return $this->aTingkatPrestasi;
    }

    /**
     * Declares an association between this object and a PesertaDidik object.
     *
     * @param             PesertaDidik $v
     * @return Prestasi The current object (for fluent API support)
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
            $v->addPrestasi($this);
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
                $this->aPesertaDidik->addPrestasis($this);
             */
        }

        return $this->aPesertaDidik;
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
        if ('VldPrestasi' == $relationName) {
            $this->initVldPrestasis();
        }
    }

    /**
     * Clears out the collVldPrestasis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Prestasi The current object (for fluent API support)
     * @see        addVldPrestasis()
     */
    public function clearVldPrestasis()
    {
        $this->collVldPrestasis = null; // important to set this to null since that means it is uninitialized
        $this->collVldPrestasisPartial = null;

        return $this;
    }

    /**
     * reset is the collVldPrestasis collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldPrestasis($v = true)
    {
        $this->collVldPrestasisPartial = $v;
    }

    /**
     * Initializes the collVldPrestasis collection.
     *
     * By default this just sets the collVldPrestasis collection to an empty array (like clearcollVldPrestasis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldPrestasis($overrideExisting = true)
    {
        if (null !== $this->collVldPrestasis && !$overrideExisting) {
            return;
        }
        $this->collVldPrestasis = new PropelObjectCollection();
        $this->collVldPrestasis->setModel('VldPrestasi');
    }

    /**
     * Gets an array of VldPrestasi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Prestasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldPrestasi[] List of VldPrestasi objects
     * @throws PropelException
     */
    public function getVldPrestasis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldPrestasisPartial && !$this->isNew();
        if (null === $this->collVldPrestasis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldPrestasis) {
                // return empty collection
                $this->initVldPrestasis();
            } else {
                $collVldPrestasis = VldPrestasiQuery::create(null, $criteria)
                    ->filterByPrestasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldPrestasisPartial && count($collVldPrestasis)) {
                      $this->initVldPrestasis(false);

                      foreach($collVldPrestasis as $obj) {
                        if (false == $this->collVldPrestasis->contains($obj)) {
                          $this->collVldPrestasis->append($obj);
                        }
                      }

                      $this->collVldPrestasisPartial = true;
                    }

                    $collVldPrestasis->getInternalIterator()->rewind();
                    return $collVldPrestasis;
                }

                if($partial && $this->collVldPrestasis) {
                    foreach($this->collVldPrestasis as $obj) {
                        if($obj->isNew()) {
                            $collVldPrestasis[] = $obj;
                        }
                    }
                }

                $this->collVldPrestasis = $collVldPrestasis;
                $this->collVldPrestasisPartial = false;
            }
        }

        return $this->collVldPrestasis;
    }

    /**
     * Sets a collection of VldPrestasi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldPrestasis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Prestasi The current object (for fluent API support)
     */
    public function setVldPrestasis(PropelCollection $vldPrestasis, PropelPDO $con = null)
    {
        $vldPrestasisToDelete = $this->getVldPrestasis(new Criteria(), $con)->diff($vldPrestasis);

        $this->vldPrestasisScheduledForDeletion = unserialize(serialize($vldPrestasisToDelete));

        foreach ($vldPrestasisToDelete as $vldPrestasiRemoved) {
            $vldPrestasiRemoved->setPrestasi(null);
        }

        $this->collVldPrestasis = null;
        foreach ($vldPrestasis as $vldPrestasi) {
            $this->addVldPrestasi($vldPrestasi);
        }

        $this->collVldPrestasis = $vldPrestasis;
        $this->collVldPrestasisPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldPrestasi objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldPrestasi objects.
     * @throws PropelException
     */
    public function countVldPrestasis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldPrestasisPartial && !$this->isNew();
        if (null === $this->collVldPrestasis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldPrestasis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldPrestasis());
            }
            $query = VldPrestasiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByPrestasi($this)
                ->count($con);
        }

        return count($this->collVldPrestasis);
    }

    /**
     * Method called to associate a VldPrestasi object to this object
     * through the VldPrestasi foreign key attribute.
     *
     * @param    VldPrestasi $l VldPrestasi
     * @return Prestasi The current object (for fluent API support)
     */
    public function addVldPrestasi(VldPrestasi $l)
    {
        if ($this->collVldPrestasis === null) {
            $this->initVldPrestasis();
            $this->collVldPrestasisPartial = true;
        }
        if (!in_array($l, $this->collVldPrestasis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldPrestasi($l);
        }

        return $this;
    }

    /**
     * @param	VldPrestasi $vldPrestasi The vldPrestasi object to add.
     */
    protected function doAddVldPrestasi($vldPrestasi)
    {
        $this->collVldPrestasis[]= $vldPrestasi;
        $vldPrestasi->setPrestasi($this);
    }

    /**
     * @param	VldPrestasi $vldPrestasi The vldPrestasi object to remove.
     * @return Prestasi The current object (for fluent API support)
     */
    public function removeVldPrestasi($vldPrestasi)
    {
        if ($this->getVldPrestasis()->contains($vldPrestasi)) {
            $this->collVldPrestasis->remove($this->collVldPrestasis->search($vldPrestasi));
            if (null === $this->vldPrestasisScheduledForDeletion) {
                $this->vldPrestasisScheduledForDeletion = clone $this->collVldPrestasis;
                $this->vldPrestasisScheduledForDeletion->clear();
            }
            $this->vldPrestasisScheduledForDeletion[]= clone $vldPrestasi;
            $vldPrestasi->setPrestasi(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Prestasi is new, it will return
     * an empty collection; or if this Prestasi has previously
     * been saved, it will retrieve related VldPrestasis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Prestasi.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldPrestasi[] List of VldPrestasi objects
     */
    public function getVldPrestasisJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldPrestasiQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldPrestasis($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->prestasi_id = null;
        $this->jenis_prestasi_id = null;
        $this->tingkat_prestasi_id = null;
        $this->peserta_didik_id = null;
        $this->nama = null;
        $this->tahun_prestasi = null;
        $this->penyelenggara = null;
        $this->peringkat = null;
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
            if ($this->collVldPrestasis) {
                foreach ($this->collVldPrestasis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisPrestasi instanceof Persistent) {
              $this->aJenisPrestasi->clearAllReferences($deep);
            }
            if ($this->aTingkatPrestasi instanceof Persistent) {
              $this->aTingkatPrestasi->clearAllReferences($deep);
            }
            if ($this->aPesertaDidik instanceof Persistent) {
              $this->aPesertaDidik->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldPrestasis instanceof PropelCollection) {
            $this->collVldPrestasis->clearIterator();
        }
        $this->collVldPrestasis = null;
        $this->aJenisPrestasi = null;
        $this->aTingkatPrestasi = null;
        $this->aPesertaDidik = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PrestasiPeer::DEFAULT_STRING_FORMAT);
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
