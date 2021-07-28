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
use DataDikdas\Model\Buku;
use DataDikdas\Model\BukuQuery;
use DataDikdas\Model\GroupMatpel;
use DataDikdas\Model\GroupMatpelQuery;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\JenjangPendidikanQuery;
use DataDikdas\Model\Kompetensi;
use DataDikdas\Model\KompetensiQuery;
use DataDikdas\Model\MataPelajaranKurikulum;
use DataDikdas\Model\MataPelajaranKurikulumQuery;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RombonganBelajarQuery;
use DataDikdas\Model\TingkatBiblio;
use DataDikdas\Model\TingkatBiblioQuery;
use DataDikdas\Model\TingkatPendidikan;
use DataDikdas\Model\TingkatPendidikanPeer;
use DataDikdas\Model\TingkatPendidikanQuery;

/**
 * Base class that represents a row from the 'ref.tingkat_pendidikan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTingkatPendidikan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TingkatPendidikanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TingkatPendidikanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the tingkat_pendidikan_id field.
     * @var        string
     */
    protected $tingkat_pendidikan_id;

    /**
     * The value for the kode field.
     * @var        string
     */
    protected $kode;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jenjang_pendidikan_id field.
     * @var        string
     */
    protected $jenjang_pendidikan_id;

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
     * @var        JenjangPendidikan
     */
    protected $aJenjangPendidikan;

    /**
     * @var        PropelObjectCollection|Buku[] Collection to store aggregation of Buku objects.
     */
    protected $collBukus;
    protected $collBukusPartial;

    /**
     * @var        PropelObjectCollection|GroupMatpel[] Collection to store aggregation of GroupMatpel objects.
     */
    protected $collGroupMatpels;
    protected $collGroupMatpelsPartial;

    /**
     * @var        PropelObjectCollection|Kompetensi[] Collection to store aggregation of Kompetensi objects.
     */
    protected $collKompetensis;
    protected $collKompetensisPartial;

    /**
     * @var        PropelObjectCollection|MataPelajaranKurikulum[] Collection to store aggregation of MataPelajaranKurikulum objects.
     */
    protected $collMataPelajaranKurikulums;
    protected $collMataPelajaranKurikulumsPartial;

    /**
     * @var        PropelObjectCollection|RombonganBelajar[] Collection to store aggregation of RombonganBelajar objects.
     */
    protected $collRombonganBelajars;
    protected $collRombonganBelajarsPartial;

    /**
     * @var        PropelObjectCollection|TingkatBiblio[] Collection to store aggregation of TingkatBiblio objects.
     */
    protected $collTingkatBiblios;
    protected $collTingkatBibliosPartial;

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
    protected $bukusScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $groupMatpelsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $kompetensisScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $mataPelajaranKurikulumsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $rombonganBelajarsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tingkatBibliosScheduledForDeletion = null;

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
     * Initializes internal state of BaseTingkatPendidikan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [kode] column value.
     * 
     * @return string
     */
    public function getKode()
    {
        return $this->kode;
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
     * Get the [jenjang_pendidikan_id] column value.
     * 
     * @return string
     */
    public function getJenjangPendidikanId()
    {
        return $this->jenjang_pendidikan_id;
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
     * Set the value of [tingkat_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setTingkatPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tingkat_pendidikan_id !== $v) {
            $this->tingkat_pendidikan_id = $v;
            $this->modifiedColumns[] = TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID;
        }


        return $this;
    } // setTingkatPendidikanId()

    /**
     * Set the value of [kode] column.
     * 
     * @param string $v new value
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setKode($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode !== $v) {
            $this->kode = $v;
            $this->modifiedColumns[] = TingkatPendidikanPeer::KODE;
        }


        return $this;
    } // setKode()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = TingkatPendidikanPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jenjang_pendidikan_id] column.
     * 
     * @param string $v new value
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setJenjangPendidikanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenjang_pendidikan_id !== $v) {
            $this->jenjang_pendidikan_id = $v;
            $this->modifiedColumns[] = TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID;
        }

        if ($this->aJenjangPendidikan !== null && $this->aJenjangPendidikan->getJenjangPendidikanId() !== $v) {
            $this->aJenjangPendidikan = null;
        }


        return $this;
    } // setJenjangPendidikanId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TingkatPendidikanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TingkatPendidikanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = TingkatPendidikanPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TingkatPendidikan The current object (for fluent API support)
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
                $this->modifiedColumns[] = TingkatPendidikanPeer::LAST_SYNC;
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

            $this->tingkat_pendidikan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->kode = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jenjang_pendidikan_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
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
            return $startcol + 8; // 8 = TingkatPendidikanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TingkatPendidikan object", $e);
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

        if ($this->aJenjangPendidikan !== null && $this->jenjang_pendidikan_id !== $this->aJenjangPendidikan->getJenjangPendidikanId()) {
            $this->aJenjangPendidikan = null;
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
            $con = Propel::getConnection(TingkatPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TingkatPendidikanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenjangPendidikan = null;
            $this->collBukus = null;

            $this->collGroupMatpels = null;

            $this->collKompetensis = null;

            $this->collMataPelajaranKurikulums = null;

            $this->collRombonganBelajars = null;

            $this->collTingkatBiblios = null;

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
            $con = Propel::getConnection(TingkatPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TingkatPendidikanQuery::create()
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
            $con = Propel::getConnection(TingkatPendidikanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TingkatPendidikanPeer::addInstanceToPool($this);
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

            if ($this->aJenjangPendidikan !== null) {
                if ($this->aJenjangPendidikan->isModified() || $this->aJenjangPendidikan->isNew()) {
                    $affectedRows += $this->aJenjangPendidikan->save($con);
                }
                $this->setJenjangPendidikan($this->aJenjangPendidikan);
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

            if ($this->bukusScheduledForDeletion !== null) {
                if (!$this->bukusScheduledForDeletion->isEmpty()) {
                    foreach ($this->bukusScheduledForDeletion as $buku) {
                        // need to save related object because we set the relation to null
                        $buku->save($con);
                    }
                    $this->bukusScheduledForDeletion = null;
                }
            }

            if ($this->collBukus !== null) {
                foreach ($this->collBukus as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->groupMatpelsScheduledForDeletion !== null) {
                if (!$this->groupMatpelsScheduledForDeletion->isEmpty()) {
                    GroupMatpelQuery::create()
                        ->filterByPrimaryKeys($this->groupMatpelsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->groupMatpelsScheduledForDeletion = null;
                }
            }

            if ($this->collGroupMatpels !== null) {
                foreach ($this->collGroupMatpels as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->kompetensisScheduledForDeletion !== null) {
                if (!$this->kompetensisScheduledForDeletion->isEmpty()) {
                    KompetensiQuery::create()
                        ->filterByPrimaryKeys($this->kompetensisScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->kompetensisScheduledForDeletion = null;
                }
            }

            if ($this->collKompetensis !== null) {
                foreach ($this->collKompetensis as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->mataPelajaranKurikulumsScheduledForDeletion !== null) {
                if (!$this->mataPelajaranKurikulumsScheduledForDeletion->isEmpty()) {
                    MataPelajaranKurikulumQuery::create()
                        ->filterByPrimaryKeys($this->mataPelajaranKurikulumsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->mataPelajaranKurikulumsScheduledForDeletion = null;
                }
            }

            if ($this->collMataPelajaranKurikulums !== null) {
                foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->rombonganBelajarsScheduledForDeletion !== null) {
                if (!$this->rombonganBelajarsScheduledForDeletion->isEmpty()) {
                    RombonganBelajarQuery::create()
                        ->filterByPrimaryKeys($this->rombonganBelajarsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rombonganBelajarsScheduledForDeletion = null;
                }
            }

            if ($this->collRombonganBelajars !== null) {
                foreach ($this->collRombonganBelajars as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tingkatBibliosScheduledForDeletion !== null) {
                if (!$this->tingkatBibliosScheduledForDeletion->isEmpty()) {
                    TingkatBiblioQuery::create()
                        ->filterByPrimaryKeys($this->tingkatBibliosScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tingkatBibliosScheduledForDeletion = null;
                }
            }

            if ($this->collTingkatBiblios !== null) {
                foreach ($this->collTingkatBiblios as $referrerFK) {
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
        if ($this->isColumnModified(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"tingkat_pendidikan_id"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::KODE)) {
            $modifiedColumns[':p' . $index++]  = '"kode"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenjang_pendidikan_id"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(TingkatPendidikanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."tingkat_pendidikan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"tingkat_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->tingkat_pendidikan_id, PDO::PARAM_STR);
                        break;
                    case '"kode"':						
                        $stmt->bindValue($identifier, $this->kode, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jenjang_pendidikan_id"':						
                        $stmt->bindValue($identifier, $this->jenjang_pendidikan_id, PDO::PARAM_STR);
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

            if ($this->aJenjangPendidikan !== null) {
                if (!$this->aJenjangPendidikan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenjangPendidikan->getValidationFailures());
                }
            }


            if (($retval = TingkatPendidikanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collBukus !== null) {
                    foreach ($this->collBukus as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collGroupMatpels !== null) {
                    foreach ($this->collGroupMatpels as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collKompetensis !== null) {
                    foreach ($this->collKompetensis as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMataPelajaranKurikulums !== null) {
                    foreach ($this->collMataPelajaranKurikulums as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collRombonganBelajars !== null) {
                    foreach ($this->collRombonganBelajars as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTingkatBiblios !== null) {
                    foreach ($this->collTingkatBiblios as $referrerFK) {
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
        $pos = TingkatPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getTingkatPendidikanId();
                break;
            case 1:
                return $this->getKode();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getJenjangPendidikanId();
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
        if (isset($alreadyDumpedObjects['TingkatPendidikan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TingkatPendidikan'][$this->getPrimaryKey()] = true;
        $keys = TingkatPendidikanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getTingkatPendidikanId(),
            $keys[1] => $this->getKode(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getJenjangPendidikanId(),
            $keys[4] => $this->getCreateDate(),
            $keys[5] => $this->getLastUpdate(),
            $keys[6] => $this->getExpiredDate(),
            $keys[7] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenjangPendidikan) {
                $result['JenjangPendidikan'] = $this->aJenjangPendidikan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collBukus) {
                $result['Bukus'] = $this->collBukus->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collGroupMatpels) {
                $result['GroupMatpels'] = $this->collGroupMatpels->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collKompetensis) {
                $result['Kompetensis'] = $this->collKompetensis->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMataPelajaranKurikulums) {
                $result['MataPelajaranKurikulums'] = $this->collMataPelajaranKurikulums->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collRombonganBelajars) {
                $result['RombonganBelajars'] = $this->collRombonganBelajars->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTingkatBiblios) {
                $result['TingkatBiblios'] = $this->collTingkatBiblios->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TingkatPendidikanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setTingkatPendidikanId($value);
                break;
            case 1:
                $this->setKode($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setJenjangPendidikanId($value);
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
        $keys = TingkatPendidikanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setTingkatPendidikanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKode($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJenjangPendidikanId($arr[$keys[3]]);
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
        $criteria = new Criteria(TingkatPendidikanPeer::DATABASE_NAME);

        if ($this->isColumnModified(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID)) $criteria->add(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);
        if ($this->isColumnModified(TingkatPendidikanPeer::KODE)) $criteria->add(TingkatPendidikanPeer::KODE, $this->kode);
        if ($this->isColumnModified(TingkatPendidikanPeer::NAMA)) $criteria->add(TingkatPendidikanPeer::NAMA, $this->nama);
        if ($this->isColumnModified(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID)) $criteria->add(TingkatPendidikanPeer::JENJANG_PENDIDIKAN_ID, $this->jenjang_pendidikan_id);
        if ($this->isColumnModified(TingkatPendidikanPeer::CREATE_DATE)) $criteria->add(TingkatPendidikanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TingkatPendidikanPeer::LAST_UPDATE)) $criteria->add(TingkatPendidikanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TingkatPendidikanPeer::EXPIRED_DATE)) $criteria->add(TingkatPendidikanPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(TingkatPendidikanPeer::LAST_SYNC)) $criteria->add(TingkatPendidikanPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(TingkatPendidikanPeer::DATABASE_NAME);
        $criteria->add(TingkatPendidikanPeer::TINGKAT_PENDIDIKAN_ID, $this->tingkat_pendidikan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getTingkatPendidikanId();
    }

    /**
     * Generic method to set the primary key (tingkat_pendidikan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setTingkatPendidikanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getTingkatPendidikanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TingkatPendidikan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKode($this->getKode());
        $copyObj->setNama($this->getNama());
        $copyObj->setJenjangPendidikanId($this->getJenjangPendidikanId());
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

            foreach ($this->getBukus() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBuku($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getGroupMatpels() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addGroupMatpel($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getKompetensis() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addKompetensi($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMataPelajaranKurikulums() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMataPelajaranKurikulum($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getRombonganBelajars() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRombonganBelajar($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTingkatBiblios() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTingkatBiblio($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setTingkatPendidikanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return TingkatPendidikan Clone of current object.
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
     * @return TingkatPendidikanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TingkatPendidikanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenjangPendidikan object.
     *
     * @param             JenjangPendidikan $v
     * @return TingkatPendidikan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenjangPendidikan(JenjangPendidikan $v = null)
    {
        if ($v === null) {
            $this->setJenjangPendidikanId(NULL);
        } else {
            $this->setJenjangPendidikanId($v->getJenjangPendidikanId());
        }

        $this->aJenjangPendidikan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenjangPendidikan object, it will not be re-added.
        if ($v !== null) {
            $v->addTingkatPendidikan($this);
        }


        return $this;
    }


    /**
     * Get the associated JenjangPendidikan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenjangPendidikan The associated JenjangPendidikan object.
     * @throws PropelException
     */
    public function getJenjangPendidikan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenjangPendidikan === null && (($this->jenjang_pendidikan_id !== "" && $this->jenjang_pendidikan_id !== null)) && $doQuery) {
            $this->aJenjangPendidikan = JenjangPendidikanQuery::create()->findPk($this->jenjang_pendidikan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenjangPendidikan->addTingkatPendidikans($this);
             */
        }

        return $this->aJenjangPendidikan;
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
        if ('Buku' == $relationName) {
            $this->initBukus();
        }
        if ('GroupMatpel' == $relationName) {
            $this->initGroupMatpels();
        }
        if ('Kompetensi' == $relationName) {
            $this->initKompetensis();
        }
        if ('MataPelajaranKurikulum' == $relationName) {
            $this->initMataPelajaranKurikulums();
        }
        if ('RombonganBelajar' == $relationName) {
            $this->initRombonganBelajars();
        }
        if ('TingkatBiblio' == $relationName) {
            $this->initTingkatBiblios();
        }
    }

    /**
     * Clears out the collBukus collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addBukus()
     */
    public function clearBukus()
    {
        $this->collBukus = null; // important to set this to null since that means it is uninitialized
        $this->collBukusPartial = null;

        return $this;
    }

    /**
     * reset is the collBukus collection loaded partially
     *
     * @return void
     */
    public function resetPartialBukus($v = true)
    {
        $this->collBukusPartial = $v;
    }

    /**
     * Initializes the collBukus collection.
     *
     * By default this just sets the collBukus collection to an empty array (like clearcollBukus());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBukus($overrideExisting = true)
    {
        if (null !== $this->collBukus && !$overrideExisting) {
            return;
        }
        $this->collBukus = new PropelObjectCollection();
        $this->collBukus->setModel('Buku');
    }

    /**
     * Gets an array of Buku objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Buku[] List of Buku objects
     * @throws PropelException
     */
    public function getBukus($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                // return empty collection
                $this->initBukus();
            } else {
                $collBukus = BukuQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBukusPartial && count($collBukus)) {
                      $this->initBukus(false);

                      foreach($collBukus as $obj) {
                        if (false == $this->collBukus->contains($obj)) {
                          $this->collBukus->append($obj);
                        }
                      }

                      $this->collBukusPartial = true;
                    }

                    $collBukus->getInternalIterator()->rewind();
                    return $collBukus;
                }

                if($partial && $this->collBukus) {
                    foreach($this->collBukus as $obj) {
                        if($obj->isNew()) {
                            $collBukus[] = $obj;
                        }
                    }
                }

                $this->collBukus = $collBukus;
                $this->collBukusPartial = false;
            }
        }

        return $this->collBukus;
    }

    /**
     * Sets a collection of Buku objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bukus A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setBukus(PropelCollection $bukus, PropelPDO $con = null)
    {
        $bukusToDelete = $this->getBukus(new Criteria(), $con)->diff($bukus);

        $this->bukusScheduledForDeletion = unserialize(serialize($bukusToDelete));

        foreach ($bukusToDelete as $bukuRemoved) {
            $bukuRemoved->setTingkatPendidikan(null);
        }

        $this->collBukus = null;
        foreach ($bukus as $buku) {
            $this->addBuku($buku);
        }

        $this->collBukus = $bukus;
        $this->collBukusPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Buku objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Buku objects.
     * @throws PropelException
     */
    public function countBukus(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBukusPartial && !$this->isNew();
        if (null === $this->collBukus || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBukus) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBukus());
            }
            $query = BukuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collBukus);
    }

    /**
     * Method called to associate a Buku object to this object
     * through the Buku foreign key attribute.
     *
     * @param    Buku $l Buku
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addBuku(Buku $l)
    {
        if ($this->collBukus === null) {
            $this->initBukus();
            $this->collBukusPartial = true;
        }
        if (!in_array($l, $this->collBukus->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBuku($l);
        }

        return $this;
    }

    /**
     * @param	Buku $buku The buku object to add.
     */
    protected function doAddBuku($buku)
    {
        $this->collBukus[]= $buku;
        $buku->setTingkatPendidikan($this);
    }

    /**
     * @param	Buku $buku The buku object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeBuku($buku)
    {
        if ($this->getBukus()->contains($buku)) {
            $this->collBukus->remove($this->collBukus->search($buku));
            if (null === $this->bukusScheduledForDeletion) {
                $this->bukusScheduledForDeletion = clone $this->collBukus;
                $this->bukusScheduledForDeletion->clear();
            }
            $this->bukusScheduledForDeletion[]= $buku;
            $buku->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinJenisHapusBuku($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('JenisHapusBuku', $join_behavior);

        return $this->getBukus($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Bukus from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Buku[] List of Buku objects
     */
    public function getBukusJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BukuQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getBukus($query, $con);
    }

    /**
     * Clears out the collGroupMatpels collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addGroupMatpels()
     */
    public function clearGroupMatpels()
    {
        $this->collGroupMatpels = null; // important to set this to null since that means it is uninitialized
        $this->collGroupMatpelsPartial = null;

        return $this;
    }

    /**
     * reset is the collGroupMatpels collection loaded partially
     *
     * @return void
     */
    public function resetPartialGroupMatpels($v = true)
    {
        $this->collGroupMatpelsPartial = $v;
    }

    /**
     * Initializes the collGroupMatpels collection.
     *
     * By default this just sets the collGroupMatpels collection to an empty array (like clearcollGroupMatpels());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initGroupMatpels($overrideExisting = true)
    {
        if (null !== $this->collGroupMatpels && !$overrideExisting) {
            return;
        }
        $this->collGroupMatpels = new PropelObjectCollection();
        $this->collGroupMatpels->setModel('GroupMatpel');
    }

    /**
     * Gets an array of GroupMatpel objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|GroupMatpel[] List of GroupMatpel objects
     * @throws PropelException
     */
    public function getGroupMatpels($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collGroupMatpelsPartial && !$this->isNew();
        if (null === $this->collGroupMatpels || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collGroupMatpels) {
                // return empty collection
                $this->initGroupMatpels();
            } else {
                $collGroupMatpels = GroupMatpelQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collGroupMatpelsPartial && count($collGroupMatpels)) {
                      $this->initGroupMatpels(false);

                      foreach($collGroupMatpels as $obj) {
                        if (false == $this->collGroupMatpels->contains($obj)) {
                          $this->collGroupMatpels->append($obj);
                        }
                      }

                      $this->collGroupMatpelsPartial = true;
                    }

                    $collGroupMatpels->getInternalIterator()->rewind();
                    return $collGroupMatpels;
                }

                if($partial && $this->collGroupMatpels) {
                    foreach($this->collGroupMatpels as $obj) {
                        if($obj->isNew()) {
                            $collGroupMatpels[] = $obj;
                        }
                    }
                }

                $this->collGroupMatpels = $collGroupMatpels;
                $this->collGroupMatpelsPartial = false;
            }
        }

        return $this->collGroupMatpels;
    }

    /**
     * Sets a collection of GroupMatpel objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $groupMatpels A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setGroupMatpels(PropelCollection $groupMatpels, PropelPDO $con = null)
    {
        $groupMatpelsToDelete = $this->getGroupMatpels(new Criteria(), $con)->diff($groupMatpels);

        $this->groupMatpelsScheduledForDeletion = unserialize(serialize($groupMatpelsToDelete));

        foreach ($groupMatpelsToDelete as $groupMatpelRemoved) {
            $groupMatpelRemoved->setTingkatPendidikan(null);
        }

        $this->collGroupMatpels = null;
        foreach ($groupMatpels as $groupMatpel) {
            $this->addGroupMatpel($groupMatpel);
        }

        $this->collGroupMatpels = $groupMatpels;
        $this->collGroupMatpelsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related GroupMatpel objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related GroupMatpel objects.
     * @throws PropelException
     */
    public function countGroupMatpels(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collGroupMatpelsPartial && !$this->isNew();
        if (null === $this->collGroupMatpels || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collGroupMatpels) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getGroupMatpels());
            }
            $query = GroupMatpelQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collGroupMatpels);
    }

    /**
     * Method called to associate a GroupMatpel object to this object
     * through the GroupMatpel foreign key attribute.
     *
     * @param    GroupMatpel $l GroupMatpel
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addGroupMatpel(GroupMatpel $l)
    {
        if ($this->collGroupMatpels === null) {
            $this->initGroupMatpels();
            $this->collGroupMatpelsPartial = true;
        }
        if (!in_array($l, $this->collGroupMatpels->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddGroupMatpel($l);
        }

        return $this;
    }

    /**
     * @param	GroupMatpel $groupMatpel The groupMatpel object to add.
     */
    protected function doAddGroupMatpel($groupMatpel)
    {
        $this->collGroupMatpels[]= $groupMatpel;
        $groupMatpel->setTingkatPendidikan($this);
    }

    /**
     * @param	GroupMatpel $groupMatpel The groupMatpel object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeGroupMatpel($groupMatpel)
    {
        if ($this->getGroupMatpels()->contains($groupMatpel)) {
            $this->collGroupMatpels->remove($this->collGroupMatpels->search($groupMatpel));
            if (null === $this->groupMatpelsScheduledForDeletion) {
                $this->groupMatpelsScheduledForDeletion = clone $this->collGroupMatpels;
                $this->groupMatpelsScheduledForDeletion->clear();
            }
            $this->groupMatpelsScheduledForDeletion[]= clone $groupMatpel;
            $groupMatpel->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related GroupMatpels from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|GroupMatpel[] List of GroupMatpel objects
     */
    public function getGroupMatpelsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = GroupMatpelQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getGroupMatpels($query, $con);
    }

    /**
     * Clears out the collKompetensis collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addKompetensis()
     */
    public function clearKompetensis()
    {
        $this->collKompetensis = null; // important to set this to null since that means it is uninitialized
        $this->collKompetensisPartial = null;

        return $this;
    }

    /**
     * reset is the collKompetensis collection loaded partially
     *
     * @return void
     */
    public function resetPartialKompetensis($v = true)
    {
        $this->collKompetensisPartial = $v;
    }

    /**
     * Initializes the collKompetensis collection.
     *
     * By default this just sets the collKompetensis collection to an empty array (like clearcollKompetensis());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initKompetensis($overrideExisting = true)
    {
        if (null !== $this->collKompetensis && !$overrideExisting) {
            return;
        }
        $this->collKompetensis = new PropelObjectCollection();
        $this->collKompetensis->setModel('Kompetensi');
    }

    /**
     * Gets an array of Kompetensi objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     * @throws PropelException
     */
    public function getKompetensis($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisPartial && !$this->isNew();
        if (null === $this->collKompetensis || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collKompetensis) {
                // return empty collection
                $this->initKompetensis();
            } else {
                $collKompetensis = KompetensiQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collKompetensisPartial && count($collKompetensis)) {
                      $this->initKompetensis(false);

                      foreach($collKompetensis as $obj) {
                        if (false == $this->collKompetensis->contains($obj)) {
                          $this->collKompetensis->append($obj);
                        }
                      }

                      $this->collKompetensisPartial = true;
                    }

                    $collKompetensis->getInternalIterator()->rewind();
                    return $collKompetensis;
                }

                if($partial && $this->collKompetensis) {
                    foreach($this->collKompetensis as $obj) {
                        if($obj->isNew()) {
                            $collKompetensis[] = $obj;
                        }
                    }
                }

                $this->collKompetensis = $collKompetensis;
                $this->collKompetensisPartial = false;
            }
        }

        return $this->collKompetensis;
    }

    /**
     * Sets a collection of Kompetensi objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $kompetensis A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setKompetensis(PropelCollection $kompetensis, PropelPDO $con = null)
    {
        $kompetensisToDelete = $this->getKompetensis(new Criteria(), $con)->diff($kompetensis);

        $this->kompetensisScheduledForDeletion = unserialize(serialize($kompetensisToDelete));

        foreach ($kompetensisToDelete as $kompetensiRemoved) {
            $kompetensiRemoved->setTingkatPendidikan(null);
        }

        $this->collKompetensis = null;
        foreach ($kompetensis as $kompetensi) {
            $this->addKompetensi($kompetensi);
        }

        $this->collKompetensis = $kompetensis;
        $this->collKompetensisPartial = false;

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
    public function countKompetensis(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collKompetensisPartial && !$this->isNew();
        if (null === $this->collKompetensis || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collKompetensis) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getKompetensis());
            }
            $query = KompetensiQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collKompetensis);
    }

    /**
     * Method called to associate a Kompetensi object to this object
     * through the Kompetensi foreign key attribute.
     *
     * @param    Kompetensi $l Kompetensi
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addKompetensi(Kompetensi $l)
    {
        if ($this->collKompetensis === null) {
            $this->initKompetensis();
            $this->collKompetensisPartial = true;
        }
        if (!in_array($l, $this->collKompetensis->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddKompetensi($l);
        }

        return $this;
    }

    /**
     * @param	Kompetensi $kompetensi The kompetensi object to add.
     */
    protected function doAddKompetensi($kompetensi)
    {
        $this->collKompetensis[]= $kompetensi;
        $kompetensi->setTingkatPendidikan($this);
    }

    /**
     * @param	Kompetensi $kompetensi The kompetensi object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeKompetensi($kompetensi)
    {
        if ($this->getKompetensis()->contains($kompetensi)) {
            $this->collKompetensis->remove($this->collKompetensis->search($kompetensi));
            if (null === $this->kompetensisScheduledForDeletion) {
                $this->kompetensisScheduledForDeletion = clone $this->collKompetensis;
                $this->kompetensisScheduledForDeletion->clear();
            }
            $this->kompetensisScheduledForDeletion[]= clone $kompetensi;
            $kompetensi->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinKompetensiRelatedByIdIntiDasar($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('KompetensiRelatedByIdIntiDasar', $join_behavior);

        return $this->getKompetensis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getKompetensis($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related Kompetensis from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Kompetensi[] List of Kompetensi objects
     */
    public function getKompetensisJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = KompetensiQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getKompetensis($query, $con);
    }

    /**
     * Clears out the collMataPelajaranKurikulums collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addMataPelajaranKurikulums()
     */
    public function clearMataPelajaranKurikulums()
    {
        $this->collMataPelajaranKurikulums = null; // important to set this to null since that means it is uninitialized
        $this->collMataPelajaranKurikulumsPartial = null;

        return $this;
    }

    /**
     * reset is the collMataPelajaranKurikulums collection loaded partially
     *
     * @return void
     */
    public function resetPartialMataPelajaranKurikulums($v = true)
    {
        $this->collMataPelajaranKurikulumsPartial = $v;
    }

    /**
     * Initializes the collMataPelajaranKurikulums collection.
     *
     * By default this just sets the collMataPelajaranKurikulums collection to an empty array (like clearcollMataPelajaranKurikulums());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMataPelajaranKurikulums($overrideExisting = true)
    {
        if (null !== $this->collMataPelajaranKurikulums && !$overrideExisting) {
            return;
        }
        $this->collMataPelajaranKurikulums = new PropelObjectCollection();
        $this->collMataPelajaranKurikulums->setModel('MataPelajaranKurikulum');
    }

    /**
     * Gets an array of MataPelajaranKurikulum objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     * @throws PropelException
     */
    public function getMataPelajaranKurikulums($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                // return empty collection
                $this->initMataPelajaranKurikulums();
            } else {
                $collMataPelajaranKurikulums = MataPelajaranKurikulumQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMataPelajaranKurikulumsPartial && count($collMataPelajaranKurikulums)) {
                      $this->initMataPelajaranKurikulums(false);

                      foreach($collMataPelajaranKurikulums as $obj) {
                        if (false == $this->collMataPelajaranKurikulums->contains($obj)) {
                          $this->collMataPelajaranKurikulums->append($obj);
                        }
                      }

                      $this->collMataPelajaranKurikulumsPartial = true;
                    }

                    $collMataPelajaranKurikulums->getInternalIterator()->rewind();
                    return $collMataPelajaranKurikulums;
                }

                if($partial && $this->collMataPelajaranKurikulums) {
                    foreach($this->collMataPelajaranKurikulums as $obj) {
                        if($obj->isNew()) {
                            $collMataPelajaranKurikulums[] = $obj;
                        }
                    }
                }

                $this->collMataPelajaranKurikulums = $collMataPelajaranKurikulums;
                $this->collMataPelajaranKurikulumsPartial = false;
            }
        }

        return $this->collMataPelajaranKurikulums;
    }

    /**
     * Sets a collection of MataPelajaranKurikulum objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $mataPelajaranKurikulums A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setMataPelajaranKurikulums(PropelCollection $mataPelajaranKurikulums, PropelPDO $con = null)
    {
        $mataPelajaranKurikulumsToDelete = $this->getMataPelajaranKurikulums(new Criteria(), $con)->diff($mataPelajaranKurikulums);

        $this->mataPelajaranKurikulumsScheduledForDeletion = unserialize(serialize($mataPelajaranKurikulumsToDelete));

        foreach ($mataPelajaranKurikulumsToDelete as $mataPelajaranKurikulumRemoved) {
            $mataPelajaranKurikulumRemoved->setTingkatPendidikan(null);
        }

        $this->collMataPelajaranKurikulums = null;
        foreach ($mataPelajaranKurikulums as $mataPelajaranKurikulum) {
            $this->addMataPelajaranKurikulum($mataPelajaranKurikulum);
        }

        $this->collMataPelajaranKurikulums = $mataPelajaranKurikulums;
        $this->collMataPelajaranKurikulumsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MataPelajaranKurikulum objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MataPelajaranKurikulum objects.
     * @throws PropelException
     */
    public function countMataPelajaranKurikulums(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMataPelajaranKurikulumsPartial && !$this->isNew();
        if (null === $this->collMataPelajaranKurikulums || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMataPelajaranKurikulums) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMataPelajaranKurikulums());
            }
            $query = MataPelajaranKurikulumQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collMataPelajaranKurikulums);
    }

    /**
     * Method called to associate a MataPelajaranKurikulum object to this object
     * through the MataPelajaranKurikulum foreign key attribute.
     *
     * @param    MataPelajaranKurikulum $l MataPelajaranKurikulum
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addMataPelajaranKurikulum(MataPelajaranKurikulum $l)
    {
        if ($this->collMataPelajaranKurikulums === null) {
            $this->initMataPelajaranKurikulums();
            $this->collMataPelajaranKurikulumsPartial = true;
        }
        if (!in_array($l, $this->collMataPelajaranKurikulums->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMataPelajaranKurikulum($l);
        }

        return $this;
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to add.
     */
    protected function doAddMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        $this->collMataPelajaranKurikulums[]= $mataPelajaranKurikulum;
        $mataPelajaranKurikulum->setTingkatPendidikan($this);
    }

    /**
     * @param	MataPelajaranKurikulum $mataPelajaranKurikulum The mataPelajaranKurikulum object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeMataPelajaranKurikulum($mataPelajaranKurikulum)
    {
        if ($this->getMataPelajaranKurikulums()->contains($mataPelajaranKurikulum)) {
            $this->collMataPelajaranKurikulums->remove($this->collMataPelajaranKurikulums->search($mataPelajaranKurikulum));
            if (null === $this->mataPelajaranKurikulumsScheduledForDeletion) {
                $this->mataPelajaranKurikulumsScheduledForDeletion = clone $this->collMataPelajaranKurikulums;
                $this->mataPelajaranKurikulumsScheduledForDeletion->clear();
            }
            $this->mataPelajaranKurikulumsScheduledForDeletion[]= clone $mataPelajaranKurikulum;
            $mataPelajaranKurikulum->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinGroupMatpel($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('GroupMatpel', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related MataPelajaranKurikulums from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MataPelajaranKurikulum[] List of MataPelajaranKurikulum objects
     */
    public function getMataPelajaranKurikulumsJoinMataPelajaran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MataPelajaranKurikulumQuery::create(null, $criteria);
        $query->joinWith('MataPelajaran', $join_behavior);

        return $this->getMataPelajaranKurikulums($query, $con);
    }

    /**
     * Clears out the collRombonganBelajars collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addRombonganBelajars()
     */
    public function clearRombonganBelajars()
    {
        $this->collRombonganBelajars = null; // important to set this to null since that means it is uninitialized
        $this->collRombonganBelajarsPartial = null;

        return $this;
    }

    /**
     * reset is the collRombonganBelajars collection loaded partially
     *
     * @return void
     */
    public function resetPartialRombonganBelajars($v = true)
    {
        $this->collRombonganBelajarsPartial = $v;
    }

    /**
     * Initializes the collRombonganBelajars collection.
     *
     * By default this just sets the collRombonganBelajars collection to an empty array (like clearcollRombonganBelajars());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRombonganBelajars($overrideExisting = true)
    {
        if (null !== $this->collRombonganBelajars && !$overrideExisting) {
            return;
        }
        $this->collRombonganBelajars = new PropelObjectCollection();
        $this->collRombonganBelajars->setModel('RombonganBelajar');
    }

    /**
     * Gets an array of RombonganBelajar objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     * @throws PropelException
     */
    public function getRombonganBelajars($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRombonganBelajarsPartial && !$this->isNew();
        if (null === $this->collRombonganBelajars || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRombonganBelajars) {
                // return empty collection
                $this->initRombonganBelajars();
            } else {
                $collRombonganBelajars = RombonganBelajarQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRombonganBelajarsPartial && count($collRombonganBelajars)) {
                      $this->initRombonganBelajars(false);

                      foreach($collRombonganBelajars as $obj) {
                        if (false == $this->collRombonganBelajars->contains($obj)) {
                          $this->collRombonganBelajars->append($obj);
                        }
                      }

                      $this->collRombonganBelajarsPartial = true;
                    }

                    $collRombonganBelajars->getInternalIterator()->rewind();
                    return $collRombonganBelajars;
                }

                if($partial && $this->collRombonganBelajars) {
                    foreach($this->collRombonganBelajars as $obj) {
                        if($obj->isNew()) {
                            $collRombonganBelajars[] = $obj;
                        }
                    }
                }

                $this->collRombonganBelajars = $collRombonganBelajars;
                $this->collRombonganBelajarsPartial = false;
            }
        }

        return $this->collRombonganBelajars;
    }

    /**
     * Sets a collection of RombonganBelajar objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rombonganBelajars A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setRombonganBelajars(PropelCollection $rombonganBelajars, PropelPDO $con = null)
    {
        $rombonganBelajarsToDelete = $this->getRombonganBelajars(new Criteria(), $con)->diff($rombonganBelajars);

        $this->rombonganBelajarsScheduledForDeletion = unserialize(serialize($rombonganBelajarsToDelete));

        foreach ($rombonganBelajarsToDelete as $rombonganBelajarRemoved) {
            $rombonganBelajarRemoved->setTingkatPendidikan(null);
        }

        $this->collRombonganBelajars = null;
        foreach ($rombonganBelajars as $rombonganBelajar) {
            $this->addRombonganBelajar($rombonganBelajar);
        }

        $this->collRombonganBelajars = $rombonganBelajars;
        $this->collRombonganBelajarsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RombonganBelajar objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RombonganBelajar objects.
     * @throws PropelException
     */
    public function countRombonganBelajars(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRombonganBelajarsPartial && !$this->isNew();
        if (null === $this->collRombonganBelajars || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRombonganBelajars) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRombonganBelajars());
            }
            $query = RombonganBelajarQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collRombonganBelajars);
    }

    /**
     * Method called to associate a RombonganBelajar object to this object
     * through the RombonganBelajar foreign key attribute.
     *
     * @param    RombonganBelajar $l RombonganBelajar
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addRombonganBelajar(RombonganBelajar $l)
    {
        if ($this->collRombonganBelajars === null) {
            $this->initRombonganBelajars();
            $this->collRombonganBelajarsPartial = true;
        }
        if (!in_array($l, $this->collRombonganBelajars->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRombonganBelajar($l);
        }

        return $this;
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to add.
     */
    protected function doAddRombonganBelajar($rombonganBelajar)
    {
        $this->collRombonganBelajars[]= $rombonganBelajar;
        $rombonganBelajar->setTingkatPendidikan($this);
    }

    /**
     * @param	RombonganBelajar $rombonganBelajar The rombonganBelajar object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeRombonganBelajar($rombonganBelajar)
    {
        if ($this->getRombonganBelajars()->contains($rombonganBelajar)) {
            $this->collRombonganBelajars->remove($this->collRombonganBelajars->search($rombonganBelajar));
            if (null === $this->rombonganBelajarsScheduledForDeletion) {
                $this->rombonganBelajarsScheduledForDeletion = clone $this->collRombonganBelajars;
                $this->rombonganBelajarsScheduledForDeletion->clear();
            }
            $this->rombonganBelajarsScheduledForDeletion[]= clone $rombonganBelajar;
            $rombonganBelajar->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinJurusanSp($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('JurusanSp', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinKebutuhanKhusus($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('KebutuhanKhusus', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinKurikulum($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Kurikulum', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinSemester($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Semester', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related RombonganBelajars from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RombonganBelajar[] List of RombonganBelajar objects
     */
    public function getRombonganBelajarsJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RombonganBelajarQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getRombonganBelajars($query, $con);
    }

    /**
     * Clears out the collTingkatBiblios collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TingkatPendidikan The current object (for fluent API support)
     * @see        addTingkatBiblios()
     */
    public function clearTingkatBiblios()
    {
        $this->collTingkatBiblios = null; // important to set this to null since that means it is uninitialized
        $this->collTingkatBibliosPartial = null;

        return $this;
    }

    /**
     * reset is the collTingkatBiblios collection loaded partially
     *
     * @return void
     */
    public function resetPartialTingkatBiblios($v = true)
    {
        $this->collTingkatBibliosPartial = $v;
    }

    /**
     * Initializes the collTingkatBiblios collection.
     *
     * By default this just sets the collTingkatBiblios collection to an empty array (like clearcollTingkatBiblios());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTingkatBiblios($overrideExisting = true)
    {
        if (null !== $this->collTingkatBiblios && !$overrideExisting) {
            return;
        }
        $this->collTingkatBiblios = new PropelObjectCollection();
        $this->collTingkatBiblios->setModel('TingkatBiblio');
    }

    /**
     * Gets an array of TingkatBiblio objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TingkatPendidikan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TingkatBiblio[] List of TingkatBiblio objects
     * @throws PropelException
     */
    public function getTingkatBiblios($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTingkatBibliosPartial && !$this->isNew();
        if (null === $this->collTingkatBiblios || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTingkatBiblios) {
                // return empty collection
                $this->initTingkatBiblios();
            } else {
                $collTingkatBiblios = TingkatBiblioQuery::create(null, $criteria)
                    ->filterByTingkatPendidikan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTingkatBibliosPartial && count($collTingkatBiblios)) {
                      $this->initTingkatBiblios(false);

                      foreach($collTingkatBiblios as $obj) {
                        if (false == $this->collTingkatBiblios->contains($obj)) {
                          $this->collTingkatBiblios->append($obj);
                        }
                      }

                      $this->collTingkatBibliosPartial = true;
                    }

                    $collTingkatBiblios->getInternalIterator()->rewind();
                    return $collTingkatBiblios;
                }

                if($partial && $this->collTingkatBiblios) {
                    foreach($this->collTingkatBiblios as $obj) {
                        if($obj->isNew()) {
                            $collTingkatBiblios[] = $obj;
                        }
                    }
                }

                $this->collTingkatBiblios = $collTingkatBiblios;
                $this->collTingkatBibliosPartial = false;
            }
        }

        return $this->collTingkatBiblios;
    }

    /**
     * Sets a collection of TingkatBiblio objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tingkatBiblios A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function setTingkatBiblios(PropelCollection $tingkatBiblios, PropelPDO $con = null)
    {
        $tingkatBibliosToDelete = $this->getTingkatBiblios(new Criteria(), $con)->diff($tingkatBiblios);

        $this->tingkatBibliosScheduledForDeletion = unserialize(serialize($tingkatBibliosToDelete));

        foreach ($tingkatBibliosToDelete as $tingkatBiblioRemoved) {
            $tingkatBiblioRemoved->setTingkatPendidikan(null);
        }

        $this->collTingkatBiblios = null;
        foreach ($tingkatBiblios as $tingkatBiblio) {
            $this->addTingkatBiblio($tingkatBiblio);
        }

        $this->collTingkatBiblios = $tingkatBiblios;
        $this->collTingkatBibliosPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TingkatBiblio objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TingkatBiblio objects.
     * @throws PropelException
     */
    public function countTingkatBiblios(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTingkatBibliosPartial && !$this->isNew();
        if (null === $this->collTingkatBiblios || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTingkatBiblios) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTingkatBiblios());
            }
            $query = TingkatBiblioQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTingkatPendidikan($this)
                ->count($con);
        }

        return count($this->collTingkatBiblios);
    }

    /**
     * Method called to associate a TingkatBiblio object to this object
     * through the TingkatBiblio foreign key attribute.
     *
     * @param    TingkatBiblio $l TingkatBiblio
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function addTingkatBiblio(TingkatBiblio $l)
    {
        if ($this->collTingkatBiblios === null) {
            $this->initTingkatBiblios();
            $this->collTingkatBibliosPartial = true;
        }
        if (!in_array($l, $this->collTingkatBiblios->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTingkatBiblio($l);
        }

        return $this;
    }

    /**
     * @param	TingkatBiblio $tingkatBiblio The tingkatBiblio object to add.
     */
    protected function doAddTingkatBiblio($tingkatBiblio)
    {
        $this->collTingkatBiblios[]= $tingkatBiblio;
        $tingkatBiblio->setTingkatPendidikan($this);
    }

    /**
     * @param	TingkatBiblio $tingkatBiblio The tingkatBiblio object to remove.
     * @return TingkatPendidikan The current object (for fluent API support)
     */
    public function removeTingkatBiblio($tingkatBiblio)
    {
        if ($this->getTingkatBiblios()->contains($tingkatBiblio)) {
            $this->collTingkatBiblios->remove($this->collTingkatBiblios->search($tingkatBiblio));
            if (null === $this->tingkatBibliosScheduledForDeletion) {
                $this->tingkatBibliosScheduledForDeletion = clone $this->collTingkatBiblios;
                $this->tingkatBibliosScheduledForDeletion->clear();
            }
            $this->tingkatBibliosScheduledForDeletion[]= clone $tingkatBiblio;
            $tingkatBiblio->setTingkatPendidikan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TingkatPendidikan is new, it will return
     * an empty collection; or if this TingkatPendidikan has previously
     * been saved, it will retrieve related TingkatBiblios from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TingkatPendidikan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TingkatBiblio[] List of TingkatBiblio objects
     */
    public function getTingkatBibliosJoinBiblio($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TingkatBiblioQuery::create(null, $criteria);
        $query->joinWith('Biblio', $join_behavior);

        return $this->getTingkatBiblios($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->tingkat_pendidikan_id = null;
        $this->kode = null;
        $this->nama = null;
        $this->jenjang_pendidikan_id = null;
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
            if ($this->collBukus) {
                foreach ($this->collBukus as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collGroupMatpels) {
                foreach ($this->collGroupMatpels as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collKompetensis) {
                foreach ($this->collKompetensis as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMataPelajaranKurikulums) {
                foreach ($this->collMataPelajaranKurikulums as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collRombonganBelajars) {
                foreach ($this->collRombonganBelajars as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTingkatBiblios) {
                foreach ($this->collTingkatBiblios as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenjangPendidikan instanceof Persistent) {
              $this->aJenjangPendidikan->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collBukus instanceof PropelCollection) {
            $this->collBukus->clearIterator();
        }
        $this->collBukus = null;
        if ($this->collGroupMatpels instanceof PropelCollection) {
            $this->collGroupMatpels->clearIterator();
        }
        $this->collGroupMatpels = null;
        if ($this->collKompetensis instanceof PropelCollection) {
            $this->collKompetensis->clearIterator();
        }
        $this->collKompetensis = null;
        if ($this->collMataPelajaranKurikulums instanceof PropelCollection) {
            $this->collMataPelajaranKurikulums->clearIterator();
        }
        $this->collMataPelajaranKurikulums = null;
        if ($this->collRombonganBelajars instanceof PropelCollection) {
            $this->collRombonganBelajars->clearIterator();
        }
        $this->collRombonganBelajars = null;
        if ($this->collTingkatBiblios instanceof PropelCollection) {
            $this->collTingkatBiblios->clearIterator();
        }
        $this->collTingkatBiblios = null;
        $this->aJenjangPendidikan = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TingkatPendidikanPeer::DEFAULT_STRING_FORMAT);
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
