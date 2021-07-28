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
use DataDikdas\Model\Anak;
use DataDikdas\Model\AnakQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanPeer;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Jurusan;
use DataDikdas\Model\JurusanQuery;
use DataDikdas\Model\Kurikulum;
use DataDikdas\Model\KurikulumQuery;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyKerjaQuery;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwyPendFormalQuery;
use DataDikdas\Model\TemplateUn;
use DataDikdas\Model\TemplateUnQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a row from the 'ref.jenjang_pendidikan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenjangPendidikan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenjangPendidikanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenjangPendidikanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenjang_lembaga field.
     * @var        string
     */
    protected $jenjang_lembaga;

    /**
     * The value for the jenjang_orang field.
     * @var        string
     */
    protected $jenjang_orang;

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
     * @var        PropelObjectCollection|Anak[] Collection to store aggregation of Anak objects.
     */
    protected $collAnaks;
    protected $collAnaksPartial;

    /**
     * @var        PropelObjectCollection|Jurusan[] Collection to store aggregation of Jurusan objects.
     */
    protected $collJurusans;
    protected $collJurusansPartial;

    /**
     * @var        PropelObjectCollection|Kurikulum[] Collection to store aggregation of Kurikulum objects.
     */
    protected $collKurikulums;
    protected $collKurikulumsPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByJenjangPendidikanIbu;
    protected $collPesertaDidiksRelatedByJenjangPendidikanIbuPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByJenjangPendidikanAyah;
    protected $collPesertaDidiksRelatedByJenjangPendidikanAyahPartial;

    /**
     * @var        PropelObjectCollection|PesertaDidik[] Collection to store aggregation of PesertaDidik objects.
     */
    protected $collPesertaDidiksRelatedByJenjangPendidikanWali;
    protected $collPesertaDidiksRelatedByJenjangPendidikanWaliPartial;

    /**
     * @var        PropelObjectCollection|RwyKerja[] Collection to store aggregation of RwyKerja objects.
     */
    protected $collRwyKerjas;
    protected $collRwyKerjasPartial;

    /**
     * @var        PropelObjectCollection|RwyPendFormal[] Collection to store aggregation of RwyPendFormal objects.
     */
    protected $collRwyPendFormals;
    protected $collRwyPendFormalsPartial;

    /**
     * @var        PropelObjectCollection|TemplateUn[] Collection to store aggregation of TemplateUn objects.
     */
    protected $collTemplateUns;
    protected $collTemplateUnsPartial;

    /**
     * @var        PropelObjectCollection|TingkatPendidikan[] Collection to store aggregation of TingkatPendidikan objects.
     */
    protected $collTingkatPendidikans;
    protected $collTingkatPendidikansPartial;

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
    protected $anaksScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $jurusansScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kurikulumsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyKerjasScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rwyPendFormalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $templateUnsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tingkatPendidikansScheduledForDeletion = null;

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
     * Initializes internal state of BaseJenjangPendidikan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenjang_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanId()
    {
        return $this->jenjang_pendidikan_id;
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
     * Get the [jenjang_lembaga] column value.
     * 
     * @return string
     */
    public function getJenjangLembaga()
    {
        return $this->jenjang_lembaga;
    }

    /**
     * Get the [jenjang_orang] column value.
     * 
     * @return string
     */
    public function getJenjangOrang()
    {
        return $this->jenjang_orang;
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
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JenjangPendidikanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenjang_lembaga] column.
     * 
     * @param string $v new value
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setJenjangLembaga($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_lembaga !== $v) {
            $this->jenjang_lembaga = $v;
            $this->modifiedColumns[] = JenjangPendidikanPeer::JENJANG_LEMBAGA;
        }


        return $this;
    } // setJenjangLembaga()

    /**
     * Set the value of [jenjang_orang] column.
     * 
     * @param string $v new value
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setJenjangOrang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_orang !== $v) {
            $this->jenjang_orang = $v;
            $this->modifiedColumns[] = JenjangPendidikanPeer::JENJANG_ORANG;
        }


        return $this;
    } // setJenjangOrang()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenjangPendidikanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenjangPendidikanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenjangPendidikanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenjangPendidikan The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenjangPendidikanPeer::LAST_SYNC;
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

            $this->jenjang_pendidikan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jenjang_lembaga = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenjang_orang = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->create_date = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->last_update = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->expired_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_sync = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = JenjangPendidikanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenjangPendidikan object", $e);
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
            $con = Propel::getConnection(JenjangPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenjangPendidikanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collAnaks = null;

            $this->collJurusans = null;

            $this->collKurikulums = null;

            $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = null;

            $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = null;

            $this->collPesertaDidiksRelatedByJenjangPendidikanWali = null;

            $this->collRwyKerjas = null;

            $this->collRwyPendFormals = null;

            $this->collTemplateUns = null;

            $this->collTingkatPendidikans = null;

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
            $con = Propel::getConnection(JenjangPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenjangPendidikanQuery::create()
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
            $con = Propel::getConnection(JenjangPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenjangPendidikanPeer::addInstanceToPool($this);
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

            if ($this->anaksScheduledForDeletion !== null) {
                if (!$this->anaksScheduledForDeletion->isEmpty()) {
                    AnakQuery::create()
                        ->filterByPrimaryKeys($this->anaksScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->anaksScheduledForDeletion = null;
                }
            }

            if ($this->collAnaks !== null) {
                foreach ($this->collAnaks as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->jurusansScheduledForDeletion !== null) {
                if (!$this->jurusansScheduledForDeletion->isEmpty()) {
                    foreach ($this->jurusansScheduledForDeletion as $jurusan) {
                        // need to save related object because we set the relation to null
                        $jurusan->save($con);
                    }
                    $this->jurusansScheduledForDeletion = null;
                }
            }

            if ($this->collJurusans !== null) {
                foreach ($this->collJurusans as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kurikulumsScheduledForDeletion !== null) {
                if (!$this->kurikulumsScheduledForDeletion->isEmpty()) {
                    KurikulumQuery::create()
                        ->filterByPrimaryKeys($this->kurikulumsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kurikulumsScheduledForDeletion = null;
                }
            }

            if ($this->collKurikulums !== null) {
                foreach ($this->collKurikulums as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion as $pesertaDidikRelatedByJenjangPendidikanIbu) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByJenjangPendidikanIbu->save($con);
                    }
                    $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu !== null) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion as $pesertaDidikRelatedByJenjangPendidikanAyah) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByJenjangPendidikanAyah->save($con);
                    }
                    $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah !== null) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion !== null) {
                if (!$this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion->isEmpty()) {
                    foreach ($this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion as $pesertaDidikRelatedByJenjangPendidikanWali) {
                        // need to save related object because we set the relation to null
                        $pesertaDidikRelatedByJenjangPendidikanWali->save($con);
                    }
                    $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion = null;
                }
            }

            if ($this->collPesertaDidiksRelatedByJenjangPendidikanWali !== null) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanWali as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyKerjasScheduledForDeletion !== null) {
                if (!$this->rwyKerjasScheduledForDeletion->isEmpty()) {
                    foreach ($this->rwyKerjasScheduledForDeletion as $rwyKerja) {
                        // need to save related object because we set the relation to null
                        $rwyKerja->save($con);
                    }
                    $this->rwyKerjasScheduledForDeletion = null;
                }
            }

            if ($this->collRwyKerjas !== null) {
                foreach ($this->collRwyKerjas as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rwyPendFormalsScheduledForDeletion !== null) {
                if (!$this->rwyPendFormalsScheduledForDeletion->isEmpty()) {
                    RwyPendFormalQuery::create()
                        ->filterByPrimaryKeys($this->rwyPendFormalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyPendFormalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyPendFormals !== null) {
                foreach ($this->collRwyPendFormals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->templateUnsScheduledForDeletion !== null) {
                if (!$this->templateUnsScheduledForDeletion->isEmpty()) {
                    TemplateUnQuery::create()
                        ->filterByPrimaryKeys($this->templateUnsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->templateUnsScheduledForDeletion = null;
                }
            }

            if ($this->collTemplateUns !== null) {
                foreach ($this->collTemplateUns as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tingkatPendidikansScheduledForDeletion !== null) {
                if (!$this->tingkatPendidikansScheduledForDeletion->isEmpty()) {
                    TingkatPendidikanQuery::create()
                        ->filterByPrimaryKeys($this->tingkatPendidikansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tingkatPendidikansScheduledForDeletion = null;
                }
            }

            if ($this->collTingkatPendidikans !== null) {
                foreach ($this->collTingkatPendidikans as $referrerFK) {
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
        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_LEMBAGA)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_lembaga"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_ORANG)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_orang"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenjangPendidikanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenjang_pendidikan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenjang_lembaga"':						
                        $stmt->bindValue($identifier, $this->jenjang_lembaga, PDO::PARAM_STR);
                        break;
                    case '"jenjang_orang"':						
                        $stmt->bindValue($identifier, $this->jenjang_orang, PDO::PARAM_STR);
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


            if (($retval = JenjangPendidikanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAnaks !== null) {
                    foreach ($this->collAnaks as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collJurusans !== null) {
                    foreach ($this->collJurusans as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKurikulums !== null) {
                    foreach ($this->collKurikulums as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu !== null) {
                    foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah !== null) {
                    foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collPesertaDidiksRelatedByJenjangPendidikanWali !== null) {
                    foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanWali as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyKerjas !== null) {
                    foreach ($this->collRwyKerjas as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRwyPendFormals !== null) {
                    foreach ($this->collRwyPendFormals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTemplateUns !== null) {
                    foreach ($this->collTemplateUns as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTingkatPendidikans !== null) {
                    foreach ($this->collTingkatPendidikans as $referrerFK) {
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
        $pos = JenjangPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenjangPendidikanId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getJenjangLembaga();
                break;
            case 3:
                return $this->getJenjangOrang();
                break;
            case 4:
                return $this->getCreateDate();
                break;
            case 5:
                return $this->getLastUpdate();
                break;
            case 6:
                return $this->getExpiredDate();
                break;
            case 7:
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
        if (isset($alreadyDumpedObjects['JenjangPendidikan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenjangPendidikan'][$this->getPrimaryKey()] = true;
        $keys = JenjangPendidikanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenjangPendidikanId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getJenjangLembaga(),
            $keys[3] => $this->getJenjangOrang(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getExpiredDate(),
            $keys[7] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collAnaks) {
                $result['Anaks'] = $this->collAnaks->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collJurusans) {
                $result['Jurusans'] = $this->collJurusans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKurikulums) {
                $result['Kurikulums'] = $this->collKurikulums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanIbu) {
                $result['PesertaDidiksRelatedByJenjangPendidikanIbu'] = $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanAyah) {
                $result['PesertaDidiksRelatedByJenjangPendidikanAyah'] = $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanWali) {
                $result['PesertaDidiksRelatedByJenjangPendidikanWali'] = $this->collPesertaDidiksRelatedByJenjangPendidikanWali->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyKerjas) {
                $result['RwyKerjas'] = $this->collRwyKerjas->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRwyPendFormals) {
                $result['RwyPendFormals'] = $this->collRwyPendFormals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTemplateUns) {
                $result['TemplateUns'] = $this->collTemplateUns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTingkatPendidikans) {
                $result['TingkatPendidikans'] = $this->collTingkatPendidikans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenjangPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenjangPendidikanId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setJenjangLembaga($value);
                break;
            case 3:
                $this->setJenjangOrang($value);
                break;
            case 4:
                $this->setCreateDate($value);
                break;
            case 5:
                $this->setLastUpdate($value);
                break;
            case 6:
                $this->setExpiredDate($value);
                break;
            case 7:
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
        $keys = JenjangPendidikanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenjangPendidikanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJenjangLembaga($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenjangOrang($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setCreateDate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLastUpdate($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setExpiredDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastSync($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JenjangPendidikanPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(JenjangPendidikanPeer::NAMA)) $criteria->add(JenjangPendidikanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_LEMBAGA)) $criteria->add(JenjangPendidikanPeer::JENJANG_LEMBAGA, $this->jenjang_lembaga);
        if ($this->isColumnModified(JenjangPendidikanPeer::JENJANG_ORANG)) $criteria->add(JenjangPendidikanPeer::JENJANG_ORANG, $this->jenjang_orang);
        if ($this->isColumnModified(JenjangPendidikanPeer::CREATE_DATE)) $criteria->add(JenjangPendidikanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenjangPendidikanPeer::LAST_UPDATE)) $criteria->add(JenjangPendidikanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenjangPendidikanPeer::EXPIRED_DATE)) $criteria->add(JenjangPendidikanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenjangPendidikanPeer::LAST_SYNC)) $criteria->add(JenjangPendidikanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenjangPendidikanPeer::DATABASE_NAME);
        $criteria->add(JenjangPendidikanPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJenjangPendidikanId();
    }

    /**
     * Generic method to set the primary key (jenjang_pendidikan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenjangPendidikanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenjangPendidikanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenjangPendidikan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setJenjangLembaga($this->getJenjangLembaga());
        $copyObj->setJenjangOrang($this->getJenjangOrang());
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

            foreach ($this->getAnaks() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAnak($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getJurusans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addJurusan($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKurikulums() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKurikulum($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByJenjangPendidikanIbu() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByJenjangPendidikanIbu($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByJenjangPendidikanAyah() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByJenjangPendidikanAyah($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getPesertaDidiksRelatedByJenjangPendidikanWali() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addPesertaDidikRelatedByJenjangPendidikanWali($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyKerjas() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyKerja($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRwyPendFormals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyPendFormal($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTemplateUns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTemplateUn($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTingkatPendidikans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTingkatPendidikan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenjangPendidikanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenjangPendidikan Clone of current object.
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
     * @return JenjangPendidikanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenjangPendidikanPeer();
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
        if ('Anak' == $relationName) {
            $this->initAnaks();
        }
        if ('Jurusan' == $relationName) {
            $this->initJurusans();
        }
        if ('Kurikulum' == $relationName) {
            $this->initKurikulums();
        }
        if ('PesertaDidikRelatedByJenjangPendidikanIbu' == $relationName) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanIbu();
        }
        if ('PesertaDidikRelatedByJenjangPendidikanAyah' == $relationName) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanAyah();
        }
        if ('PesertaDidikRelatedByJenjangPendidikanWali' == $relationName) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanWali();
        }
        if ('RwyKerja' == $relationName) {
            $this->initRwyKerjas();
        }
        if ('RwyPendFormal' == $relationName) {
            $this->initRwyPendFormals();
        }
        if ('TemplateUn' == $relationName) {
            $this->initTemplateUns();
        }
        if ('TingkatPendidikan' == $relationName) {
            $this->initTingkatPendidikans();
        }
    }

    /**
     * Clears out the collAnaks collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addAnaks()
     */
    public function clearAnaks()
    {
        $this->collAnaks = null; // important to set this to null since that means it is uninitialized
        $this->collAnaksPartial = null;

        return $this;
    }

    /**
     * reset is the collAnaks collection loaded partially
     *
     * @return void
     */
    public function resetPartialAnaks($v = true)
    {
        $this->collAnaksPartial = $v;
    }

    /**
     * Initializes the collAnaks collection.
     *
     * By default this just sets the collAnaks collection to an empty array (like clearcollAnaks());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAnaks($overrideExisting = true)
    {
        if (null !== $this->collAnaks && !$overrideExisting) {
            return;
        }
        $this->collAnaks = new PropelObjectCollection();
        $this->collAnaks->setModel('Anak');
    }

    /**
     * Gets an array of Anak objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Anak[] List of Anak objects
     * @throws PropelException
     */
    public function getAnaks($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAnaksPartial && !$this->isNew();
        if (null === $this->collAnaks || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAnaks) {
                // return empty collection
                $this->initAnaks();
            } else {
                $collAnaks = AnakQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAnaksPartial && count($collAnaks)) {
                      $this->initAnaks(false);

                      foreach($collAnaks as $obj) {
                        if (false == $this->collAnaks->contains($obj)) {
                          $this->collAnaks->append($obj);
                        }
                      }

                      $this->collAnaksPartial = true;
                    }

                    $collAnaks->getInternalIterator()->rewind();
                    return $collAnaks;
                }

                if($partial && $this->collAnaks) {
                    foreach($this->collAnaks as $obj) {
                        if($obj->isNew()) {
                            $collAnaks[] = $obj;
                        }
                    }
                }

                $this->collAnaks = $collAnaks;
                $this->collAnaksPartial = false;
            }
        }

        return $this->collAnaks;
    }

    /**
     * Sets a collection of Anak objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $anaks A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setAnaks(PropelCollection $anaks, PropelPDO $con = null)
    {
        $anaksToDelete = $this->getAnaks(new Criteria(), $con)->diff($anaks);

        $this->anaksScheduledForDeletion = unserialize(serialize($anaksToDelete));

        foreach ($anaksToDelete as $anakRemoved) {
            $anakRemoved->setJenjangPendidikan(null);
        }

        $this->collAnaks = null;
        foreach ($anaks as $anak) {
            $this->addAnak($anak);
        }

        $this->collAnaks = $anaks;
        $this->collAnaksPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Anak objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Anak objects.
     * @throws PropelException
     */
    public function countAnaks(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAnaksPartial && !$this->isNew();
        if (null === $this->collAnaks || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAnaks) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAnaks());
            }
            $query = AnakQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collAnaks);
    }

    /**
     * Method called to associate a Anak object to this object
     * through the Anak foreign key attribute.
     *
     * @param    Anak $l Anak
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addAnak(Anak $l)
    {
        if ($this->collAnaks === null) {
            $this->initAnaks();
            $this->collAnaksPartial = true;
        }
        if (!in_array($l, $this->collAnaks->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAnak($l);
        }

        return $this;
    }

    /**
     * @param	Anak $anak The anak object to add.
     */
    protected function doAddAnak($anak)
    {
        $this->collAnaks[]= $anak;
        $anak->setJenjangPendidikan($this);
    }

    /**
     * @param	Anak $anak The anak object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeAnak($anak)
    {
        if ($this->getAnaks()->contains($anak)) {
            $this->collAnaks->remove($this->collAnaks->search($anak));
            if (null === $this->anaksScheduledForDeletion) {
                $this->anaksScheduledForDeletion = clone $this->collAnaks;
                $this->anaksScheduledForDeletion->clear();
            }
            $this->anaksScheduledForDeletion[]= clone $anak;
            $anak->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related Anaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Anak[] List of Anak objects
     */
    public function getAnaksJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnakQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getAnaks($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related Anaks from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Anak[] List of Anak objects
     */
    public function getAnaksJoinStatusAnak($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AnakQuery::create(null, $criteria);
        $query->joinWith('StatusAnak', $join_behavior);

        return $this->getAnaks($query, $con);
    }

    /**
     * Clears out the collJurusans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addJurusans()
     */
    public function clearJurusans()
    {
        $this->collJurusans = null; // important to set this to null since that means it is uninitialized
        $this->collJurusansPartial = null;

        return $this;
    }

    /**
     * reset is the collJurusans collection loaded partially
     *
     * @return void
     */
    public function resetPartialJurusans($v = true)
    {
        $this->collJurusansPartial = $v;
    }

    /**
     * Initializes the collJurusans collection.
     *
     * By default this just sets the collJurusans collection to an empty array (like clearcollJurusans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initJurusans($overrideExisting = true)
    {
        if (null !== $this->collJurusans && !$overrideExisting) {
            return;
        }
        $this->collJurusans = new PropelObjectCollection();
        $this->collJurusans->setModel('Jurusan');
    }

    /**
     * Gets an array of Jurusan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     * @throws PropelException
     */
    public function getJurusans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collJurusansPartial && !$this->isNew();
        if (null === $this->collJurusans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collJurusans) {
                // return empty collection
                $this->initJurusans();
            } else {
                $collJurusans = JurusanQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collJurusansPartial && count($collJurusans)) {
                      $this->initJurusans(false);

                      foreach($collJurusans as $obj) {
                        if (false == $this->collJurusans->contains($obj)) {
                          $this->collJurusans->append($obj);
                        }
                      }

                      $this->collJurusansPartial = true;
                    }

                    $collJurusans->getInternalIterator()->rewind();
                    return $collJurusans;
                }

                if($partial && $this->collJurusans) {
                    foreach($this->collJurusans as $obj) {
                        if($obj->isNew()) {
                            $collJurusans[] = $obj;
                        }
                    }
                }

                $this->collJurusans = $collJurusans;
                $this->collJurusansPartial = false;
            }
        }

        return $this->collJurusans;
    }

    /**
     * Sets a collection of Jurusan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $jurusans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setJurusans(PropelCollection $jurusans, PropelPDO $con = null)
    {
        $jurusansToDelete = $this->getJurusans(new Criteria(), $con)->diff($jurusans);

        $this->jurusansScheduledForDeletion = unserialize(serialize($jurusansToDelete));

        foreach ($jurusansToDelete as $jurusanRemoved) {
            $jurusanRemoved->setJenjangPendidikan(null);
        }

        $this->collJurusans = null;
        foreach ($jurusans as $jurusan) {
            $this->addJurusan($jurusan);
        }

        $this->collJurusans = $jurusans;
        $this->collJurusansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Jurusan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Jurusan objects.
     * @throws PropelException
     */
    public function countJurusans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collJurusansPartial && !$this->isNew();
        if (null === $this->collJurusans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collJurusans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getJurusans());
            }
            $query = JurusanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collJurusans);
    }

    /**
     * Method called to associate a Jurusan object to this object
     * through the Jurusan foreign key attribute.
     *
     * @param    Jurusan $l Jurusan
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addJurusan(Jurusan $l)
    {
        if ($this->collJurusans === null) {
            $this->initJurusans();
            $this->collJurusansPartial = true;
        }
        if (!in_array($l, $this->collJurusans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddJurusan($l);
        }

        return $this;
    }

    /**
     * @param	Jurusan $jurusan The jurusan object to add.
     */
    protected function doAddJurusan($jurusan)
    {
        $this->collJurusans[]= $jurusan;
        $jurusan->setJenjangPendidikan($this);
    }

    /**
     * @param	Jurusan $jurusan The jurusan object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeJurusan($jurusan)
    {
        if ($this->getJurusans()->contains($jurusan)) {
            $this->collJurusans->remove($this->collJurusans->search($jurusan));
            if (null === $this->jurusansScheduledForDeletion) {
                $this->jurusansScheduledForDeletion = clone $this->collJurusans;
                $this->jurusansScheduledForDeletion->clear();
            }
            $this->jurusansScheduledForDeletion[]= $jurusan;
            $jurusan->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related Jurusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansJoinJurusanRelatedByJurusanInduk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('JurusanRelatedByJurusanInduk', $join_behavior);

        return $this->getJurusans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related Jurusans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Jurusan[] List of Jurusan objects
     */
    public function getJurusansJoinKelompokBidang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = JurusanQuery::create(null, $criteria);
        $query->joinWith('KelompokBidang', $join_behavior);

        return $this->getJurusans($query, $con);
    }

    /**
     * Clears out the collKurikulums collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addKurikulums()
     */
    public function clearKurikulums()
    {
        $this->collKurikulums = null; // important to set this to null since that means it is uninitialized
        $this->collKurikulumsPartial = null;

        return $this;
    }

    /**
     * reset is the collKurikulums collection loaded partially
     *
     * @return void
     */
    public function resetPartialKurikulums($v = true)
    {
        $this->collKurikulumsPartial = $v;
    }

    /**
     * Initializes the collKurikulums collection.
     *
     * By default this just sets the collKurikulums collection to an empty array (like clearcollKurikulums());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKurikulums($overrideExisting = true)
    {
        if (null !== $this->collKurikulums && !$overrideExisting) {
            return;
        }
        $this->collKurikulums = new PropelObjectCollection();
        $this->collKurikulums->setModel('Kurikulum');
    }

    /**
     * Gets an array of Kurikulum objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kurikulum[] List of Kurikulum objects
     * @throws PropelException
     */
    public function getKurikulums($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKurikulumsPartial && !$this->isNew();
        if (null === $this->collKurikulums || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKurikulums) {
                // return empty collection
                $this->initKurikulums();
            } else {
                $collKurikulums = KurikulumQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKurikulumsPartial && count($collKurikulums)) {
                      $this->initKurikulums(false);

                      foreach($collKurikulums as $obj) {
                        if (false == $this->collKurikulums->contains($obj)) {
                          $this->collKurikulums->append($obj);
                        }
                      }

                      $this->collKurikulumsPartial = true;
                    }

                    $collKurikulums->getInternalIterator()->rewind();
                    return $collKurikulums;
                }

                if($partial && $this->collKurikulums) {
                    foreach($this->collKurikulums as $obj) {
                        if($obj->isNew()) {
                            $collKurikulums[] = $obj;
                        }
                    }
                }

                $this->collKurikulums = $collKurikulums;
                $this->collKurikulumsPartial = false;
            }
        }

        return $this->collKurikulums;
    }

    /**
     * Sets a collection of Kurikulum objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kurikulums A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setKurikulums(PropelCollection $kurikulums, PropelPDO $con = null)
    {
        $kurikulumsToDelete = $this->getKurikulums(new Criteria(), $con)->diff($kurikulums);

        $this->kurikulumsScheduledForDeletion = unserialize(serialize($kurikulumsToDelete));

        foreach ($kurikulumsToDelete as $kurikulumRemoved) {
            $kurikulumRemoved->setJenjangPendidikan(null);
        }

        $this->collKurikulums = null;
        foreach ($kurikulums as $kurikulum) {
            $this->addKurikulum($kurikulum);
        }

        $this->collKurikulums = $kurikulums;
        $this->collKurikulumsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Kurikulum objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Kurikulum objects.
     * @throws PropelException
     */
    public function countKurikulums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKurikulumsPartial && !$this->isNew();
        if (null === $this->collKurikulums || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKurikulums) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKurikulums());
            }
            $query = KurikulumQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collKurikulums);
    }

    /**
     * Method called to associate a Kurikulum object to this object
     * through the Kurikulum foreign key attribute.
     *
     * @param    Kurikulum $l Kurikulum
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addKurikulum(Kurikulum $l)
    {
        if ($this->collKurikulums === null) {
            $this->initKurikulums();
            $this->collKurikulumsPartial = true;
        }
        if (!in_array($l, $this->collKurikulums->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKurikulum($l);
        }

        return $this;
    }

    /**
     * @param	Kurikulum $kurikulum The kurikulum object to add.
     */
    protected function doAddKurikulum($kurikulum)
    {
        $this->collKurikulums[]= $kurikulum;
        $kurikulum->setJenjangPendidikan($this);
    }

    /**
     * @param	Kurikulum $kurikulum The kurikulum object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeKurikulum($kurikulum)
    {
        if ($this->getKurikulums()->contains($kurikulum)) {
            $this->collKurikulums->remove($this->collKurikulums->search($kurikulum));
            if (null === $this->kurikulumsScheduledForDeletion) {
                $this->kurikulumsScheduledForDeletion = clone $this->collKurikulums;
                $this->kurikulumsScheduledForDeletion->clear();
            }
            $this->kurikulumsScheduledForDeletion[]= clone $kurikulum;
            $kurikulum->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related Kurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kurikulum[] List of Kurikulum objects
     */
    public function getKurikulumsJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KurikulumQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getKurikulums($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByJenjangPendidikanIbu collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByJenjangPendidikanIbu()
     */
    public function clearPesertaDidiksRelatedByJenjangPendidikanIbu()
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByJenjangPendidikanIbu collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByJenjangPendidikanIbu($v = true)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByJenjangPendidikanIbu collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByJenjangPendidikanIbu collection to an empty array (like clearcollPesertaDidiksRelatedByJenjangPendidikanIbu());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByJenjangPendidikanIbu($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanIbu && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbu($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanIbu || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanIbu) {
                // return empty collection
                $this->initPesertaDidiksRelatedByJenjangPendidikanIbu();
            } else {
                $collPesertaDidiksRelatedByJenjangPendidikanIbu = PesertaDidikQuery::create(null, $criteria)
                    ->filterByJenjangPendidikanRelatedByJenjangPendidikanIbu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial && count($collPesertaDidiksRelatedByJenjangPendidikanIbu)) {
                      $this->initPesertaDidiksRelatedByJenjangPendidikanIbu(false);

                      foreach($collPesertaDidiksRelatedByJenjangPendidikanIbu as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->contains($obj)) {
                          $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = true;
                    }

                    $collPesertaDidiksRelatedByJenjangPendidikanIbu->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByJenjangPendidikanIbu;
                }

                if($partial && $this->collPesertaDidiksRelatedByJenjangPendidikanIbu) {
                    foreach($this->collPesertaDidiksRelatedByJenjangPendidikanIbu as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByJenjangPendidikanIbu[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = $collPesertaDidiksRelatedByJenjangPendidikanIbu;
                $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByJenjangPendidikanIbu;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByJenjangPendidikanIbu objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByJenjangPendidikanIbu A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByJenjangPendidikanIbu(PropelCollection $pesertaDidiksRelatedByJenjangPendidikanIbu, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByJenjangPendidikanIbuToDelete = $this->getPesertaDidiksRelatedByJenjangPendidikanIbu(new Criteria(), $con)->diff($pesertaDidiksRelatedByJenjangPendidikanIbu);

        $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByJenjangPendidikanIbuToDelete));

        foreach ($pesertaDidiksRelatedByJenjangPendidikanIbuToDelete as $pesertaDidikRelatedByJenjangPendidikanIbuRemoved) {
            $pesertaDidikRelatedByJenjangPendidikanIbuRemoved->setJenjangPendidikanRelatedByJenjangPendidikanIbu(null);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = null;
        foreach ($pesertaDidiksRelatedByJenjangPendidikanIbu as $pesertaDidikRelatedByJenjangPendidikanIbu) {
            $this->addPesertaDidikRelatedByJenjangPendidikanIbu($pesertaDidikRelatedByJenjangPendidikanIbu);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = $pesertaDidiksRelatedByJenjangPendidikanIbu;
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidik objects.
     * @throws PropelException
     */
    public function countPesertaDidiksRelatedByJenjangPendidikanIbu(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanIbu || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanIbu) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByJenjangPendidikanIbu());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikanRelatedByJenjangPendidikanIbu($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByJenjangPendidikanIbu);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByJenjangPendidikanIbu(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu === null) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanIbu();
            $this->collPesertaDidiksRelatedByJenjangPendidikanIbuPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByJenjangPendidikanIbu($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanIbu $pesertaDidikRelatedByJenjangPendidikanIbu The pesertaDidikRelatedByJenjangPendidikanIbu object to add.
     */
    protected function doAddPesertaDidikRelatedByJenjangPendidikanIbu($pesertaDidikRelatedByJenjangPendidikanIbu)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu[]= $pesertaDidikRelatedByJenjangPendidikanIbu;
        $pesertaDidikRelatedByJenjangPendidikanIbu->setJenjangPendidikanRelatedByJenjangPendidikanIbu($this);
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanIbu $pesertaDidikRelatedByJenjangPendidikanIbu The pesertaDidikRelatedByJenjangPendidikanIbu object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByJenjangPendidikanIbu($pesertaDidikRelatedByJenjangPendidikanIbu)
    {
        if ($this->getPesertaDidiksRelatedByJenjangPendidikanIbu()->contains($pesertaDidikRelatedByJenjangPendidikanIbu)) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->remove($this->collPesertaDidiksRelatedByJenjangPendidikanIbu->search($pesertaDidikRelatedByJenjangPendidikanIbu));
            if (null === $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion) {
                $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion = clone $this->collPesertaDidiksRelatedByJenjangPendidikanIbu;
                $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByJenjangPendidikanIbuScheduledForDeletion[]= $pesertaDidikRelatedByJenjangPendidikanIbu;
            $pesertaDidikRelatedByJenjangPendidikanIbu->setJenjangPendidikanRelatedByJenjangPendidikanIbu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanIbu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanIbuJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanIbu($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByJenjangPendidikanAyah collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByJenjangPendidikanAyah()
     */
    public function clearPesertaDidiksRelatedByJenjangPendidikanAyah()
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByJenjangPendidikanAyah collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByJenjangPendidikanAyah($v = true)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByJenjangPendidikanAyah collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByJenjangPendidikanAyah collection to an empty array (like clearcollPesertaDidiksRelatedByJenjangPendidikanAyah());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByJenjangPendidikanAyah($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanAyah && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyah($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanAyah || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanAyah) {
                // return empty collection
                $this->initPesertaDidiksRelatedByJenjangPendidikanAyah();
            } else {
                $collPesertaDidiksRelatedByJenjangPendidikanAyah = PesertaDidikQuery::create(null, $criteria)
                    ->filterByJenjangPendidikanRelatedByJenjangPendidikanAyah($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial && count($collPesertaDidiksRelatedByJenjangPendidikanAyah)) {
                      $this->initPesertaDidiksRelatedByJenjangPendidikanAyah(false);

                      foreach($collPesertaDidiksRelatedByJenjangPendidikanAyah as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->contains($obj)) {
                          $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = true;
                    }

                    $collPesertaDidiksRelatedByJenjangPendidikanAyah->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByJenjangPendidikanAyah;
                }

                if($partial && $this->collPesertaDidiksRelatedByJenjangPendidikanAyah) {
                    foreach($this->collPesertaDidiksRelatedByJenjangPendidikanAyah as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByJenjangPendidikanAyah[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = $collPesertaDidiksRelatedByJenjangPendidikanAyah;
                $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByJenjangPendidikanAyah;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByJenjangPendidikanAyah objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByJenjangPendidikanAyah A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByJenjangPendidikanAyah(PropelCollection $pesertaDidiksRelatedByJenjangPendidikanAyah, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByJenjangPendidikanAyahToDelete = $this->getPesertaDidiksRelatedByJenjangPendidikanAyah(new Criteria(), $con)->diff($pesertaDidiksRelatedByJenjangPendidikanAyah);

        $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByJenjangPendidikanAyahToDelete));

        foreach ($pesertaDidiksRelatedByJenjangPendidikanAyahToDelete as $pesertaDidikRelatedByJenjangPendidikanAyahRemoved) {
            $pesertaDidikRelatedByJenjangPendidikanAyahRemoved->setJenjangPendidikanRelatedByJenjangPendidikanAyah(null);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = null;
        foreach ($pesertaDidiksRelatedByJenjangPendidikanAyah as $pesertaDidikRelatedByJenjangPendidikanAyah) {
            $this->addPesertaDidikRelatedByJenjangPendidikanAyah($pesertaDidikRelatedByJenjangPendidikanAyah);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = $pesertaDidiksRelatedByJenjangPendidikanAyah;
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidik objects.
     * @throws PropelException
     */
    public function countPesertaDidiksRelatedByJenjangPendidikanAyah(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanAyah || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanAyah) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByJenjangPendidikanAyah());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikanRelatedByJenjangPendidikanAyah($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByJenjangPendidikanAyah);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByJenjangPendidikanAyah(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah === null) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanAyah();
            $this->collPesertaDidiksRelatedByJenjangPendidikanAyahPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByJenjangPendidikanAyah($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanAyah $pesertaDidikRelatedByJenjangPendidikanAyah The pesertaDidikRelatedByJenjangPendidikanAyah object to add.
     */
    protected function doAddPesertaDidikRelatedByJenjangPendidikanAyah($pesertaDidikRelatedByJenjangPendidikanAyah)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah[]= $pesertaDidikRelatedByJenjangPendidikanAyah;
        $pesertaDidikRelatedByJenjangPendidikanAyah->setJenjangPendidikanRelatedByJenjangPendidikanAyah($this);
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanAyah $pesertaDidikRelatedByJenjangPendidikanAyah The pesertaDidikRelatedByJenjangPendidikanAyah object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByJenjangPendidikanAyah($pesertaDidikRelatedByJenjangPendidikanAyah)
    {
        if ($this->getPesertaDidiksRelatedByJenjangPendidikanAyah()->contains($pesertaDidikRelatedByJenjangPendidikanAyah)) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->remove($this->collPesertaDidiksRelatedByJenjangPendidikanAyah->search($pesertaDidikRelatedByJenjangPendidikanAyah));
            if (null === $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion) {
                $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion = clone $this->collPesertaDidiksRelatedByJenjangPendidikanAyah;
                $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByJenjangPendidikanAyahScheduledForDeletion[]= $pesertaDidikRelatedByJenjangPendidikanAyah;
            $pesertaDidikRelatedByJenjangPendidikanAyah->setJenjangPendidikanRelatedByJenjangPendidikanAyah(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanAyah from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanAyahJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanAyah($query, $con);
    }

    /**
     * Clears out the collPesertaDidiksRelatedByJenjangPendidikanWali collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addPesertaDidiksRelatedByJenjangPendidikanWali()
     */
    public function clearPesertaDidiksRelatedByJenjangPendidikanWali()
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanWali = null; // important to set this to null since that means it is uninitialized
        $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = null;

        return $this;
    }

    /**
     * reset is the collPesertaDidiksRelatedByJenjangPendidikanWali collection loaded partially
     *
     * @return void
     */
    public function resetPartialPesertaDidiksRelatedByJenjangPendidikanWali($v = true)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = $v;
    }

    /**
     * Initializes the collPesertaDidiksRelatedByJenjangPendidikanWali collection.
     *
     * By default this just sets the collPesertaDidiksRelatedByJenjangPendidikanWali collection to an empty array (like clearcollPesertaDidiksRelatedByJenjangPendidikanWali());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initPesertaDidiksRelatedByJenjangPendidikanWali($overrideExisting = true)
    {
        if (null !== $this->collPesertaDidiksRelatedByJenjangPendidikanWali && !$overrideExisting) {
            return;
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanWali = new PropelObjectCollection();
        $this->collPesertaDidiksRelatedByJenjangPendidikanWali->setModel('PesertaDidik');
    }

    /**
     * Gets an array of PesertaDidik objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     * @throws PropelException
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWali($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanWali || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanWali) {
                // return empty collection
                $this->initPesertaDidiksRelatedByJenjangPendidikanWali();
            } else {
                $collPesertaDidiksRelatedByJenjangPendidikanWali = PesertaDidikQuery::create(null, $criteria)
                    ->filterByJenjangPendidikanRelatedByJenjangPendidikanWali($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial && count($collPesertaDidiksRelatedByJenjangPendidikanWali)) {
                      $this->initPesertaDidiksRelatedByJenjangPendidikanWali(false);

                      foreach($collPesertaDidiksRelatedByJenjangPendidikanWali as $obj) {
                        if (false == $this->collPesertaDidiksRelatedByJenjangPendidikanWali->contains($obj)) {
                          $this->collPesertaDidiksRelatedByJenjangPendidikanWali->append($obj);
                        }
                      }

                      $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = true;
                    }

                    $collPesertaDidiksRelatedByJenjangPendidikanWali->getInternalIterator()->rewind();
                    return $collPesertaDidiksRelatedByJenjangPendidikanWali;
                }

                if($partial && $this->collPesertaDidiksRelatedByJenjangPendidikanWali) {
                    foreach($this->collPesertaDidiksRelatedByJenjangPendidikanWali as $obj) {
                        if($obj->isNew()) {
                            $collPesertaDidiksRelatedByJenjangPendidikanWali[] = $obj;
                        }
                    }
                }

                $this->collPesertaDidiksRelatedByJenjangPendidikanWali = $collPesertaDidiksRelatedByJenjangPendidikanWali;
                $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = false;
            }
        }

        return $this->collPesertaDidiksRelatedByJenjangPendidikanWali;
    }

    /**
     * Sets a collection of PesertaDidikRelatedByJenjangPendidikanWali objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $pesertaDidiksRelatedByJenjangPendidikanWali A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setPesertaDidiksRelatedByJenjangPendidikanWali(PropelCollection $pesertaDidiksRelatedByJenjangPendidikanWali, PropelPDO $con = null)
    {
        $pesertaDidiksRelatedByJenjangPendidikanWaliToDelete = $this->getPesertaDidiksRelatedByJenjangPendidikanWali(new Criteria(), $con)->diff($pesertaDidiksRelatedByJenjangPendidikanWali);

        $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion = unserialize(serialize($pesertaDidiksRelatedByJenjangPendidikanWaliToDelete));

        foreach ($pesertaDidiksRelatedByJenjangPendidikanWaliToDelete as $pesertaDidikRelatedByJenjangPendidikanWaliRemoved) {
            $pesertaDidikRelatedByJenjangPendidikanWaliRemoved->setJenjangPendidikanRelatedByJenjangPendidikanWali(null);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanWali = null;
        foreach ($pesertaDidiksRelatedByJenjangPendidikanWali as $pesertaDidikRelatedByJenjangPendidikanWali) {
            $this->addPesertaDidikRelatedByJenjangPendidikanWali($pesertaDidikRelatedByJenjangPendidikanWali);
        }

        $this->collPesertaDidiksRelatedByJenjangPendidikanWali = $pesertaDidiksRelatedByJenjangPendidikanWali;
        $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = false;

        return $this;
    }

    /**
     * Returns the number of related PesertaDidik objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related PesertaDidik objects.
     * @throws PropelException
     */
    public function countPesertaDidiksRelatedByJenjangPendidikanWali(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial && !$this->isNew();
        if (null === $this->collPesertaDidiksRelatedByJenjangPendidikanWali || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collPesertaDidiksRelatedByJenjangPendidikanWali) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getPesertaDidiksRelatedByJenjangPendidikanWali());
            }
            $query = PesertaDidikQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikanRelatedByJenjangPendidikanWali($this)
                ->count($con);
        }

        return count($this->collPesertaDidiksRelatedByJenjangPendidikanWali);
    }

    /**
     * Method called to associate a PesertaDidik object to this object
     * through the PesertaDidik foreign key attribute.
     *
     * @param    PesertaDidik $l PesertaDidik
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addPesertaDidikRelatedByJenjangPendidikanWali(PesertaDidik $l)
    {
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanWali === null) {
            $this->initPesertaDidiksRelatedByJenjangPendidikanWali();
            $this->collPesertaDidiksRelatedByJenjangPendidikanWaliPartial = true;
        }
        if (!in_array($l, $this->collPesertaDidiksRelatedByJenjangPendidikanWali->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddPesertaDidikRelatedByJenjangPendidikanWali($l);
        }

        return $this;
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanWali $pesertaDidikRelatedByJenjangPendidikanWali The pesertaDidikRelatedByJenjangPendidikanWali object to add.
     */
    protected function doAddPesertaDidikRelatedByJenjangPendidikanWali($pesertaDidikRelatedByJenjangPendidikanWali)
    {
        $this->collPesertaDidiksRelatedByJenjangPendidikanWali[]= $pesertaDidikRelatedByJenjangPendidikanWali;
        $pesertaDidikRelatedByJenjangPendidikanWali->setJenjangPendidikanRelatedByJenjangPendidikanWali($this);
    }

    /**
     * @param	PesertaDidikRelatedByJenjangPendidikanWali $pesertaDidikRelatedByJenjangPendidikanWali The pesertaDidikRelatedByJenjangPendidikanWali object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removePesertaDidikRelatedByJenjangPendidikanWali($pesertaDidikRelatedByJenjangPendidikanWali)
    {
        if ($this->getPesertaDidiksRelatedByJenjangPendidikanWali()->contains($pesertaDidikRelatedByJenjangPendidikanWali)) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanWali->remove($this->collPesertaDidiksRelatedByJenjangPendidikanWali->search($pesertaDidikRelatedByJenjangPendidikanWali));
            if (null === $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion) {
                $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion = clone $this->collPesertaDidiksRelatedByJenjangPendidikanWali;
                $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion->clear();
            }
            $this->pesertaDidiksRelatedByJenjangPendidikanWaliScheduledForDeletion[]= $pesertaDidikRelatedByJenjangPendidikanWali;
            $pesertaDidikRelatedByJenjangPendidikanWali->setJenjangPendidikanRelatedByJenjangPendidikanWali(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinNegara($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Negara', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinAlasanLayakPip($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlasanLayakPip', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinBank($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Bank', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinMstWilayah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('MstWilayah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinKebutuhanKhususRelatedByKebutuhanKhususId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhususRelatedByKebutuhanKhususId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPekerjaanRelatedByPekerjaanId($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanId', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinAgama($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('Agama', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPenghasilanRelatedByPenghasilanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinJenisTinggal($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('JenisTinggal', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinAlatTransportasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('AlatTransportasi', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPekerjaanRelatedByPekerjaanIdAyah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdAyah', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPenghasilanRelatedByPenghasilanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPekerjaanRelatedByPekerjaanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPenghasilanRelatedByPenghasilanIdIbu($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PenghasilanRelatedByPenghasilanIdIbu', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related PesertaDidiksRelatedByJenjangPendidikanWali from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|PesertaDidik[] List of PesertaDidik objects
     */
    public function getPesertaDidiksRelatedByJenjangPendidikanWaliJoinPekerjaanRelatedByPekerjaanIdWali($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = PesertaDidikQuery::create(null, $criteria);
        $query->joinWith('PekerjaanRelatedByPekerjaanIdWali', $join_behavior);

        return $this->getPesertaDidiksRelatedByJenjangPendidikanWali($query, $con);
    }

    /**
     * Clears out the collRwyKerjas collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addRwyKerjas()
     */
    public function clearRwyKerjas()
    {
        $this->collRwyKerjas = null; // important to set this to null since that means it is uninitialized
        $this->collRwyKerjasPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyKerjas collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyKerjas($v = true)
    {
        $this->collRwyKerjasPartial = $v;
    }

    /**
     * Initializes the collRwyKerjas collection.
     *
     * By default this just sets the collRwyKerjas collection to an empty array (like clearcollRwyKerjas());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyKerjas($overrideExisting = true)
    {
        if (null !== $this->collRwyKerjas && !$overrideExisting) {
            return;
        }
        $this->collRwyKerjas = new PropelObjectCollection();
        $this->collRwyKerjas->setModel('RwyKerja');
    }

    /**
     * Gets an array of RwyKerja objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     * @throws PropelException
     */
    public function getRwyKerjas($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                // return empty collection
                $this->initRwyKerjas();
            } else {
                $collRwyKerjas = RwyKerjaQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyKerjasPartial && count($collRwyKerjas)) {
                      $this->initRwyKerjas(false);

                      foreach($collRwyKerjas as $obj) {
                        if (false == $this->collRwyKerjas->contains($obj)) {
                          $this->collRwyKerjas->append($obj);
                        }
                      }

                      $this->collRwyKerjasPartial = true;
                    }

                    $collRwyKerjas->getInternalIterator()->rewind();
                    return $collRwyKerjas;
                }

                if($partial && $this->collRwyKerjas) {
                    foreach($this->collRwyKerjas as $obj) {
                        if($obj->isNew()) {
                            $collRwyKerjas[] = $obj;
                        }
                    }
                }

                $this->collRwyKerjas = $collRwyKerjas;
                $this->collRwyKerjasPartial = false;
            }
        }

        return $this->collRwyKerjas;
    }

    /**
     * Sets a collection of RwyKerja objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyKerjas A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setRwyKerjas(PropelCollection $rwyKerjas, PropelPDO $con = null)
    {
        $rwyKerjasToDelete = $this->getRwyKerjas(new Criteria(), $con)->diff($rwyKerjas);

        $this->rwyKerjasScheduledForDeletion = unserialize(serialize($rwyKerjasToDelete));

        foreach ($rwyKerjasToDelete as $rwyKerjaRemoved) {
            $rwyKerjaRemoved->setJenjangPendidikan(null);
        }

        $this->collRwyKerjas = null;
        foreach ($rwyKerjas as $rwyKerja) {
            $this->addRwyKerja($rwyKerja);
        }

        $this->collRwyKerjas = $rwyKerjas;
        $this->collRwyKerjasPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyKerja objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyKerja objects.
     * @throws PropelException
     */
    public function countRwyKerjas(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyKerjasPartial && !$this->isNew();
        if (null === $this->collRwyKerjas || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyKerjas) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyKerjas());
            }
            $query = RwyKerjaQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collRwyKerjas);
    }

    /**
     * Method called to associate a RwyKerja object to this object
     * through the RwyKerja foreign key attribute.
     *
     * @param    RwyKerja $l RwyKerja
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addRwyKerja(RwyKerja $l)
    {
        if ($this->collRwyKerjas === null) {
            $this->initRwyKerjas();
            $this->collRwyKerjasPartial = true;
        }
        if (!in_array($l, $this->collRwyKerjas->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyKerja($l);
        }

        return $this;
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to add.
     */
    protected function doAddRwyKerja($rwyKerja)
    {
        $this->collRwyKerjas[]= $rwyKerja;
        $rwyKerja->setJenjangPendidikan($this);
    }

    /**
     * @param	RwyKerja $rwyKerja The rwyKerja object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeRwyKerja($rwyKerja)
    {
        if ($this->getRwyKerjas()->contains($rwyKerja)) {
            $this->collRwyKerjas->remove($this->collRwyKerjas->search($rwyKerja));
            if (null === $this->rwyKerjasScheduledForDeletion) {
                $this->rwyKerjasScheduledForDeletion = clone $this->collRwyKerjas;
                $this->rwyKerjasScheduledForDeletion->clear();
            }
            $this->rwyKerjasScheduledForDeletion[]= $rwyKerja;
            $rwyKerja->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenisLembaga($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenisLembaga', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinJenisPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('JenisPtk', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyKerjas from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyKerja[] List of RwyKerja objects
     */
    public function getRwyKerjasJoinStatusKepegawaian($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyKerjaQuery::create(null, $criteria);
        $query->joinWith('StatusKepegawaian', $join_behavior);

        return $this->getRwyKerjas($query, $con);
    }

    /**
     * Clears out the collRwyPendFormals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addRwyPendFormals()
     */
    public function clearRwyPendFormals()
    {
        $this->collRwyPendFormals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyPendFormalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyPendFormals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyPendFormals($v = true)
    {
        $this->collRwyPendFormalsPartial = $v;
    }

    /**
     * Initializes the collRwyPendFormals collection.
     *
     * By default this just sets the collRwyPendFormals collection to an empty array (like clearcollRwyPendFormals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyPendFormals($overrideExisting = true)
    {
        if (null !== $this->collRwyPendFormals && !$overrideExisting) {
            return;
        }
        $this->collRwyPendFormals = new PropelObjectCollection();
        $this->collRwyPendFormals->setModel('RwyPendFormal');
    }

    /**
     * Gets an array of RwyPendFormal objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     * @throws PropelException
     */
    public function getRwyPendFormals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                // return empty collection
                $this->initRwyPendFormals();
            } else {
                $collRwyPendFormals = RwyPendFormalQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyPendFormalsPartial && count($collRwyPendFormals)) {
                      $this->initRwyPendFormals(false);

                      foreach($collRwyPendFormals as $obj) {
                        if (false == $this->collRwyPendFormals->contains($obj)) {
                          $this->collRwyPendFormals->append($obj);
                        }
                      }

                      $this->collRwyPendFormalsPartial = true;
                    }

                    $collRwyPendFormals->getInternalIterator()->rewind();
                    return $collRwyPendFormals;
                }

                if($partial && $this->collRwyPendFormals) {
                    foreach($this->collRwyPendFormals as $obj) {
                        if($obj->isNew()) {
                            $collRwyPendFormals[] = $obj;
                        }
                    }
                }

                $this->collRwyPendFormals = $collRwyPendFormals;
                $this->collRwyPendFormalsPartial = false;
            }
        }

        return $this->collRwyPendFormals;
    }

    /**
     * Sets a collection of RwyPendFormal objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyPendFormals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setRwyPendFormals(PropelCollection $rwyPendFormals, PropelPDO $con = null)
    {
        $rwyPendFormalsToDelete = $this->getRwyPendFormals(new Criteria(), $con)->diff($rwyPendFormals);

        $this->rwyPendFormalsScheduledForDeletion = unserialize(serialize($rwyPendFormalsToDelete));

        foreach ($rwyPendFormalsToDelete as $rwyPendFormalRemoved) {
            $rwyPendFormalRemoved->setJenjangPendidikan(null);
        }

        $this->collRwyPendFormals = null;
        foreach ($rwyPendFormals as $rwyPendFormal) {
            $this->addRwyPendFormal($rwyPendFormal);
        }

        $this->collRwyPendFormals = $rwyPendFormals;
        $this->collRwyPendFormalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyPendFormal objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyPendFormal objects.
     * @throws PropelException
     */
    public function countRwyPendFormals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyPendFormalsPartial && !$this->isNew();
        if (null === $this->collRwyPendFormals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyPendFormals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyPendFormals());
            }
            $query = RwyPendFormalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collRwyPendFormals);
    }

    /**
     * Method called to associate a RwyPendFormal object to this object
     * through the RwyPendFormal foreign key attribute.
     *
     * @param    RwyPendFormal $l RwyPendFormal
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addRwyPendFormal(RwyPendFormal $l)
    {
        if ($this->collRwyPendFormals === null) {
            $this->initRwyPendFormals();
            $this->collRwyPendFormalsPartial = true;
        }
        if (!in_array($l, $this->collRwyPendFormals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyPendFormal($l);
        }

        return $this;
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to add.
     */
    protected function doAddRwyPendFormal($rwyPendFormal)
    {
        $this->collRwyPendFormals[]= $rwyPendFormal;
        $rwyPendFormal->setJenjangPendidikan($this);
    }

    /**
     * @param	RwyPendFormal $rwyPendFormal The rwyPendFormal object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeRwyPendFormal($rwyPendFormal)
    {
        if ($this->getRwyPendFormals()->contains($rwyPendFormal)) {
            $this->collRwyPendFormals->remove($this->collRwyPendFormals->search($rwyPendFormal));
            if (null === $this->rwyPendFormalsScheduledForDeletion) {
                $this->rwyPendFormalsScheduledForDeletion = clone $this->collRwyPendFormals;
                $this->rwyPendFormalsScheduledForDeletion->clear();
            }
            $this->rwyPendFormalsScheduledForDeletion[]= clone $rwyPendFormal;
            $rwyPendFormal->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinGelarAkademik($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('GelarAkademik', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related RwyPendFormals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyPendFormal[] List of RwyPendFormal objects
     */
    public function getRwyPendFormalsJoinBidangStudi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyPendFormalQuery::create(null, $criteria);
        $query->joinWith('BidangStudi', $join_behavior);

        return $this->getRwyPendFormals($query, $con);
    }

    /**
     * Clears out the collTemplateUns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addTemplateUns()
     */
    public function clearTemplateUns()
    {
        $this->collTemplateUns = null; // important to set this to null since that means it is uninitialized
        $this->collTemplateUnsPartial = null;

        return $this;
    }

    /**
     * reset is the collTemplateUns collection loaded partially
     *
     * @return void
     */
    public function resetPartialTemplateUns($v = true)
    {
        $this->collTemplateUnsPartial = $v;
    }

    /**
     * Initializes the collTemplateUns collection.
     *
     * By default this just sets the collTemplateUns collection to an empty array (like clearcollTemplateUns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTemplateUns($overrideExisting = true)
    {
        if (null !== $this->collTemplateUns && !$overrideExisting) {
            return;
        }
        $this->collTemplateUns = new PropelObjectCollection();
        $this->collTemplateUns->setModel('TemplateUn');
    }

    /**
     * Gets an array of TemplateUn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     * @throws PropelException
     */
    public function getTemplateUns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                // return empty collection
                $this->initTemplateUns();
            } else {
                $collTemplateUns = TemplateUnQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTemplateUnsPartial && count($collTemplateUns)) {
                      $this->initTemplateUns(false);

                      foreach($collTemplateUns as $obj) {
                        if (false == $this->collTemplateUns->contains($obj)) {
                          $this->collTemplateUns->append($obj);
                        }
                      }

                      $this->collTemplateUnsPartial = true;
                    }

                    $collTemplateUns->getInternalIterator()->rewind();
                    return $collTemplateUns;
                }

                if($partial && $this->collTemplateUns) {
                    foreach($this->collTemplateUns as $obj) {
                        if($obj->isNew()) {
                            $collTemplateUns[] = $obj;
                        }
                    }
                }

                $this->collTemplateUns = $collTemplateUns;
                $this->collTemplateUnsPartial = false;
            }
        }

        return $this->collTemplateUns;
    }

    /**
     * Sets a collection of TemplateUn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $templateUns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setTemplateUns(PropelCollection $templateUns, PropelPDO $con = null)
    {
        $templateUnsToDelete = $this->getTemplateUns(new Criteria(), $con)->diff($templateUns);

        $this->templateUnsScheduledForDeletion = unserialize(serialize($templateUnsToDelete));

        foreach ($templateUnsToDelete as $templateUnRemoved) {
            $templateUnRemoved->setJenjangPendidikan(null);
        }

        $this->collTemplateUns = null;
        foreach ($templateUns as $templateUn) {
            $this->addTemplateUn($templateUn);
        }

        $this->collTemplateUns = $templateUns;
        $this->collTemplateUnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TemplateUn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TemplateUn objects.
     * @throws PropelException
     */
    public function countTemplateUns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTemplateUnsPartial && !$this->isNew();
        if (null === $this->collTemplateUns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTemplateUns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTemplateUns());
            }
            $query = TemplateUnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collTemplateUns);
    }

    /**
     * Method called to associate a TemplateUn object to this object
     * through the TemplateUn foreign key attribute.
     *
     * @param    TemplateUn $l TemplateUn
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addTemplateUn(TemplateUn $l)
    {
        if ($this->collTemplateUns === null) {
            $this->initTemplateUns();
            $this->collTemplateUnsPartial = true;
        }
        if (!in_array($l, $this->collTemplateUns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTemplateUn($l);
        }

        return $this;
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to add.
     */
    protected function doAddTemplateUn($templateUn)
    {
        $this->collTemplateUns[]= $templateUn;
        $templateUn->setJenjangPendidikan($this);
    }

    /**
     * @param	TemplateUn $templateUn The templateUn object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeTemplateUn($templateUn)
    {
        if ($this->getTemplateUns()->contains($templateUn)) {
            $this->collTemplateUns->remove($this->collTemplateUns->search($templateUn));
            if (null === $this->templateUnsScheduledForDeletion) {
                $this->templateUnsScheduledForDeletion = clone $this->collTemplateUns;
                $this->templateUnsScheduledForDeletion->clear();
            }
            $this->templateUnsScheduledForDeletion[]= clone $templateUn;
            $templateUn->setJenjangPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinJurusan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('Jurusan', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp3Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp3Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp4Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp4Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp7Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp7Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp5Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp5Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp1Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp1Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp2Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp2Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinMataPelajaranRelatedByMp6Id($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('MataPelajaranRelatedByMp6Id', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenjangPendidikan is new, it will return
     * an empty collection; or if this JenjangPendidikan has previously
     * been saved, it will retrieve related TemplateUns from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenjangPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TemplateUn[] List of TemplateUn objects
     */
    public function getTemplateUnsJoinTahunAjaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TemplateUnQuery::create(null, $criteria);
        $query->joinWith('TahunAjaran', $join_behavior);

        return $this->getTemplateUns($query, $con);
    }

    /**
     * Clears out the collTingkatPendidikans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenjangPendidikan The current object (for fluent API support)
     * @see        addTingkatPendidikans()
     */
    public function clearTingkatPendidikans()
    {
        $this->collTingkatPendidikans = null; // important to set this to null since that means it is uninitialized
        $this->collTingkatPendidikansPartial = null;

        return $this;
    }

    /**
     * reset is the collTingkatPendidikans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTingkatPendidikans($v = true)
    {
        $this->collTingkatPendidikansPartial = $v;
    }

    /**
     * Initializes the collTingkatPendidikans collection.
     *
     * By default this just sets the collTingkatPendidikans collection to an empty array (like clearcollTingkatPendidikans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTingkatPendidikans($overrideExisting = true)
    {
        if (null !== $this->collTingkatPendidikans && !$overrideExisting) {
            return;
        }
        $this->collTingkatPendidikans = new PropelObjectCollection();
        $this->collTingkatPendidikans->setModel('TingkatPendidikan');
    }

    /**
     * Gets an array of TingkatPendidikan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenjangPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TingkatPendidikan[] List of TingkatPendidikan objects
     * @throws PropelException
     */
    public function getTingkatPendidikans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTingkatPendidikansPartial && !$this->isNew();
        if (null === $this->collTingkatPendidikans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTingkatPendidikans) {
                // return empty collection
                $this->initTingkatPendidikans();
            } else {
                $collTingkatPendidikans = TingkatPendidikanQuery::create(null, $criteria)
                    ->filterByJenjangPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTingkatPendidikansPartial && count($collTingkatPendidikans)) {
                      $this->initTingkatPendidikans(false);

                      foreach($collTingkatPendidikans as $obj) {
                        if (false == $this->collTingkatPendidikans->contains($obj)) {
                          $this->collTingkatPendidikans->append($obj);
                        }
                      }

                      $this->collTingkatPendidikansPartial = true;
                    }

                    $collTingkatPendidikans->getInternalIterator()->rewind();
                    return $collTingkatPendidikans;
                }

                if($partial && $this->collTingkatPendidikans) {
                    foreach($this->collTingkatPendidikans as $obj) {
                        if($obj->isNew()) {
                            $collTingkatPendidikans[] = $obj;
                        }
                    }
                }

                $this->collTingkatPendidikans = $collTingkatPendidikans;
                $this->collTingkatPendidikansPartial = false;
            }
        }

        return $this->collTingkatPendidikans;
    }

    /**
     * Sets a collection of TingkatPendidikan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tingkatPendidikans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function setTingkatPendidikans(PropelCollection $tingkatPendidikans, PropelPDO $con = null)
    {
        $tingkatPendidikansToDelete = $this->getTingkatPendidikans(new Criteria(), $con)->diff($tingkatPendidikans);

        $this->tingkatPendidikansScheduledForDeletion = unserialize(serialize($tingkatPendidikansToDelete));

        foreach ($tingkatPendidikansToDelete as $tingkatPendidikanRemoved) {
            $tingkatPendidikanRemoved->setJenjangPendidikan(null);
        }

        $this->collTingkatPendidikans = null;
        foreach ($tingkatPendidikans as $tingkatPendidikan) {
            $this->addTingkatPendidikan($tingkatPendidikan);
        }

        $this->collTingkatPendidikans = $tingkatPendidikans;
        $this->collTingkatPendidikansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TingkatPendidikan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TingkatPendidikan objects.
     * @throws PropelException
     */
    public function countTingkatPendidikans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTingkatPendidikansPartial && !$this->isNew();
        if (null === $this->collTingkatPendidikans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTingkatPendidikans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTingkatPendidikans());
            }
            $query = TingkatPendidikanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenjangPendidikan($this)
                ->count($con);
        }

        return count($this->collTingkatPendidikans);
    }

    /**
     * Method called to associate a TingkatPendidikan object to this object
     * through the TingkatPendidikan foreign key attribute.
     *
     * @param    TingkatPendidikan $l TingkatPendidikan
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function addTingkatPendidikan(TingkatPendidikan $l)
    {
        if ($this->collTingkatPendidikans === null) {
            $this->initTingkatPendidikans();
            $this->collTingkatPendidikansPartial = true;
        }
        if (!in_array($l, $this->collTingkatPendidikans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTingkatPendidikan($l);
        }

        return $this;
    }

    /**
     * @param	TingkatPendidikan $tingkatPendidikan The tingkatPendidikan object to add.
     */
    protected function doAddTingkatPendidikan($tingkatPendidikan)
    {
        $this->collTingkatPendidikans[]= $tingkatPendidikan;
        $tingkatPendidikan->setJenjangPendidikan($this);
    }

    /**
     * @param	TingkatPendidikan $tingkatPendidikan The tingkatPendidikan object to remove.
     * @return JenjangPendidikan The current object (for fluent API support)
     */
    public function removeTingkatPendidikan($tingkatPendidikan)
    {
        if ($this->getTingkatPendidikans()->contains($tingkatPendidikan)) {
            $this->collTingkatPendidikans->remove($this->collTingkatPendidikans->search($tingkatPendidikan));
            if (null === $this->tingkatPendidikansScheduledForDeletion) {
                $this->tingkatPendidikansScheduledForDeletion = clone $this->collTingkatPendidikans;
                $this->tingkatPendidikansScheduledForDeletion->clear();
            }
            $this->tingkatPendidikansScheduledForDeletion[]= clone $tingkatPendidikan;
            $tingkatPendidikan->setJenjangPendidikan(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenjang_pendidikan_id = null;
        $this->nama = null;
        $this->jenjang_lembaga = null;
        $this->jenjang_orang = null;
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
            if ($this->collAnaks) {
                foreach ($this->collAnaks as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collJurusans) {
                foreach ($this->collJurusans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKurikulums) {
                foreach ($this->collKurikulums as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collPesertaDidiksRelatedByJenjangPendidikanWali) {
                foreach ($this->collPesertaDidiksRelatedByJenjangPendidikanWali as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyKerjas) {
                foreach ($this->collRwyKerjas as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRwyPendFormals) {
                foreach ($this->collRwyPendFormals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTemplateUns) {
                foreach ($this->collTemplateUns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTingkatPendidikans) {
                foreach ($this->collTingkatPendidikans as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAnaks instanceof PropelCollection) {
            $this->collAnaks->clearIterator();
        }
        $this->collAnaks = null;
        if ($this->collJurusans instanceof PropelCollection) {
            $this->collJurusans->clearIterator();
        }
        $this->collJurusans = null;
        if ($this->collKurikulums instanceof PropelCollection) {
            $this->collKurikulums->clearIterator();
        }
        $this->collKurikulums = null;
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanIbu instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanIbu->clearIterator();
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanIbu = null;
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanAyah instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanAyah->clearIterator();
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanAyah = null;
        if ($this->collPesertaDidiksRelatedByJenjangPendidikanWali instanceof PropelCollection) {
            $this->collPesertaDidiksRelatedByJenjangPendidikanWali->clearIterator();
        }
        $this->collPesertaDidiksRelatedByJenjangPendidikanWali = null;
        if ($this->collRwyKerjas instanceof PropelCollection) {
            $this->collRwyKerjas->clearIterator();
        }
        $this->collRwyKerjas = null;
        if ($this->collRwyPendFormals instanceof PropelCollection) {
            $this->collRwyPendFormals->clearIterator();
        }
        $this->collRwyPendFormals = null;
        if ($this->collTemplateUns instanceof PropelCollection) {
            $this->collTemplateUns->clearIterator();
        }
        $this->collTemplateUns = null;
        if ($this->collTingkatPendidikans instanceof PropelCollection) {
            $this->collTingkatPendidikans->clearIterator();
        }
        $this->collTingkatPendidikans = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenjangPendidikanPeer::DEFAULT_STRING_FORMAT);
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
