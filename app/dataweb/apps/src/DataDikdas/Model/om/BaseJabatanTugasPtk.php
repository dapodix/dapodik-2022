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
use DataDikdas\Model\JabatanTugasPtk;
use DataDikdas\Model\JabatanTugasPtkPeer;
use DataDikdas\Model\JabatanTugasPtkQuery;
use DataDikdas\Model\RwyStruktural;
use DataDikdas\Model\RwyStrukturalQuery;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanQuery;

/**
 * Base class that represents a row from the 'ref.jabatan_tugas_ptk' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJabatanTugasPtk extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JabatanTugasPtkPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JabatanTugasPtkPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jabatan_ptk_id field.
     * @var        string
     */
    protected $jabatan_ptk_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the jabatan_utama field.
     * @var        string
     */
    protected $jabatan_utama;

    /**
     * The value for the tugas_tambahan_guru field.
     * @var        string
     */
    protected $tugas_tambahan_guru;

    /**
     * The value for the jumlah_jam_diakui field.
     * @var        string
     */
    protected $jumlah_jam_diakui;

    /**
     * The value for the harus_refer_unit_org field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $harus_refer_unit_org;

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
     * @var        PropelObjectCollection|RwyStruktural[] Collection to store aggregation of RwyStruktural objects.
     */
    protected $collRwyStrukturals;
    protected $collRwyStrukturalsPartial;

    /**
     * @var        PropelObjectCollection|TugasTambahan[] Collection to store aggregation of TugasTambahan objects.
     */
    protected $collTugasTambahans;
    protected $collTugasTambahansPartial;

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
    protected $rwyStrukturalsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tugasTambahansScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->harus_refer_unit_org = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseJabatanTugasPtk object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jabatan_ptk_id] column value.
     * 
     * @return string
     */
    public function getJabatanPtkId()
    {
        return $this->jabatan_ptk_id;
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
     * Get the [jabatan_utama] column value.
     * 
     * @return string
     */
    public function getJabatanUtama()
    {
        return $this->jabatan_utama;
    }

    /**
     * Get the [tugas_tambahan_guru] column value.
     * 
     * @return string
     */
    public function getTugasTambahanGuru()
    {
        return $this->tugas_tambahan_guru;
    }

    /**
     * Get the [jumlah_jam_diakui] column value.
     * 
     * @return string
     */
    public function getJumlahJamDiakui()
    {
        return $this->jumlah_jam_diakui;
    }

    /**
     * Get the [harus_refer_unit_org] column value.
     * 
     * @return string
     */
    public function getHarusReferUnitOrg()
    {
        return $this->harus_refer_unit_org;
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
     * Set the value of [jabatan_ptk_id] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setJabatanPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_ptk_id !== $v) {
            $this->jabatan_ptk_id = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::JABATAN_PTK_ID;
        }


        return $this;
    } // setJabatanPtkId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [jabatan_utama] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setJabatanUtama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_utama !== $v) {
            $this->jabatan_utama = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::JABATAN_UTAMA;
        }


        return $this;
    } // setJabatanUtama()

    /**
     * Set the value of [tugas_tambahan_guru] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setTugasTambahanGuru($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tugas_tambahan_guru !== $v) {
            $this->tugas_tambahan_guru = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU;
        }


        return $this;
    } // setTugasTambahanGuru()

    /**
     * Set the value of [jumlah_jam_diakui] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setJumlahJamDiakui($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jumlah_jam_diakui !== $v) {
            $this->jumlah_jam_diakui = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI;
        }


        return $this;
    } // setJumlahJamDiakui()

    /**
     * Set the value of [harus_refer_unit_org] column.
     * 
     * @param string $v new value
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setHarusReferUnitOrg($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->harus_refer_unit_org !== $v) {
            $this->harus_refer_unit_org = $v;
            $this->modifiedColumns[] = JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG;
        }


        return $this;
    } // setHarusReferUnitOrg()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JabatanTugasPtkPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JabatanTugasPtkPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JabatanTugasPtkPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JabatanTugasPtk The current object (for fluent API support)
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
                $this->modifiedColumns[] = JabatanTugasPtkPeer::LAST_SYNC;
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
            if ($this->harus_refer_unit_org !== '0') {
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

            $this->jabatan_ptk_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nama = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->jabatan_utama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tugas_tambahan_guru = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jumlah_jam_diakui = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->harus_refer_unit_org = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->create_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->last_update = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->expired_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->last_sync = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 10; // 10 = JabatanTugasPtkPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JabatanTugasPtk object", $e);
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
            $con = Propel::getConnection(JabatanTugasPtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JabatanTugasPtkPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collRwyStrukturals = null;

            $this->collTugasTambahans = null;

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
            $con = Propel::getConnection(JabatanTugasPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JabatanTugasPtkQuery::create()
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
            $con = Propel::getConnection(JabatanTugasPtkPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JabatanTugasPtkPeer::addInstanceToPool($this);
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

            if ($this->rwyStrukturalsScheduledForDeletion !== null) {
                if (!$this->rwyStrukturalsScheduledForDeletion->isEmpty()) {
                    RwyStrukturalQuery::create()
                        ->filterByPrimaryKeys($this->rwyStrukturalsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->rwyStrukturalsScheduledForDeletion = null;
                }
            }

            if ($this->collRwyStrukturals !== null) {
                foreach ($this->collRwyStrukturals as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tugasTambahansScheduledForDeletion !== null) {
                if (!$this->tugasTambahansScheduledForDeletion->isEmpty()) {
                    TugasTambahanQuery::create()
                        ->filterByPrimaryKeys($this->tugasTambahansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tugasTambahansScheduledForDeletion = null;
                }
            }

            if ($this->collTugasTambahans !== null) {
                foreach ($this->collTugasTambahans as $referrerFK) {
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
        if ($this->isColumnModified(JabatanTugasPtkPeer::JABATAN_PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_ptk_id"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::JABATAN_UTAMA)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_utama"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU)) {
            $modifiedColumns[':p' . $index++]  = '"tugas_tambahan_guru"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_jam_diakui"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG)) {
            $modifiedColumns[':p' . $index++]  = '"harus_refer_unit_org"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JabatanTugasPtkPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jabatan_tugas_ptk" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jabatan_ptk_id"':						
                        $stmt->bindValue($identifier, $this->jabatan_ptk_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"jabatan_utama"':						
                        $stmt->bindValue($identifier, $this->jabatan_utama, PDO::PARAM_STR);
                        break;
                    case '"tugas_tambahan_guru"':						
                        $stmt->bindValue($identifier, $this->tugas_tambahan_guru, PDO::PARAM_STR);
                        break;
                    case '"jumlah_jam_diakui"':						
                        $stmt->bindValue($identifier, $this->jumlah_jam_diakui, PDO::PARAM_STR);
                        break;
                    case '"harus_refer_unit_org"':						
                        $stmt->bindValue($identifier, $this->harus_refer_unit_org, PDO::PARAM_STR);
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


            if (($retval = JabatanTugasPtkPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collRwyStrukturals !== null) {
                    foreach ($this->collRwyStrukturals as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTugasTambahans !== null) {
                    foreach ($this->collTugasTambahans as $referrerFK) {
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
        $pos = JabatanTugasPtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJabatanPtkId();
                break;
            case 1:
                return $this->getNama();
                break;
            case 2:
                return $this->getJabatanUtama();
                break;
            case 3:
                return $this->getTugasTambahanGuru();
                break;
            case 4:
                return $this->getJumlahJamDiakui();
                break;
            case 5:
                return $this->getHarusReferUnitOrg();
                break;
            case 6:
                return $this->getCreateDate();
                break;
            case 7:
                return $this->getLastUpdate();
                break;
            case 8:
                return $this->getExpiredDate();
                break;
            case 9:
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
        if (isset($alreadyDumpedObjects['JabatanTugasPtk'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JabatanTugasPtk'][$this->getPrimaryKey()] = true;
        $keys = JabatanTugasPtkPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJabatanPtkId(),
            $keys[1] => $this->getNama(),
            $keys[2] => $this->getJabatanUtama(),
            $keys[3] => $this->getTugasTambahanGuru(),
            $keys[4] => $this->getJumlahJamDiakui(),
            $keys[5] => $this->getHarusReferUnitOrg(),
            $keys[6] => $this->getCreateDate(),
            $keys[7] => $this->getLastUpdate(),
            $keys[8] => $this->getExpiredDate(),
            $keys[9] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collRwyStrukturals) {
                $result['RwyStrukturals'] = $this->collRwyStrukturals->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTugasTambahans) {
                $result['TugasTambahans'] = $this->collTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JabatanTugasPtkPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJabatanPtkId($value);
                break;
            case 1:
                $this->setNama($value);
                break;
            case 2:
                $this->setJabatanUtama($value);
                break;
            case 3:
                $this->setTugasTambahanGuru($value);
                break;
            case 4:
                $this->setJumlahJamDiakui($value);
                break;
            case 5:
                $this->setHarusReferUnitOrg($value);
                break;
            case 6:
                $this->setCreateDate($value);
                break;
            case 7:
                $this->setLastUpdate($value);
                break;
            case 8:
                $this->setExpiredDate($value);
                break;
            case 9:
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
        $keys = JabatanTugasPtkPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJabatanPtkId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setJabatanUtama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTugasTambahanGuru($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJumlahJamDiakui($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setHarusReferUnitOrg($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setCreateDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setLastUpdate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setExpiredDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setLastSync($arr[$keys[9]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(JabatanTugasPtkPeer::DATABASE_NAME);

        if ($this->isColumnModified(JabatanTugasPtkPeer::JABATAN_PTK_ID)) $criteria->add(JabatanTugasPtkPeer::JABATAN_PTK_ID, $this->jabatan_ptk_id);
        if ($this->isColumnModified(JabatanTugasPtkPeer::NAMA)) $criteria->add(JabatanTugasPtkPeer::NAMA, $this->nama);
        if ($this->isColumnModified(JabatanTugasPtkPeer::JABATAN_UTAMA)) $criteria->add(JabatanTugasPtkPeer::JABATAN_UTAMA, $this->jabatan_utama);
        if ($this->isColumnModified(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU)) $criteria->add(JabatanTugasPtkPeer::TUGAS_TAMBAHAN_GURU, $this->tugas_tambahan_guru);
        if ($this->isColumnModified(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI)) $criteria->add(JabatanTugasPtkPeer::JUMLAH_JAM_DIAKUI, $this->jumlah_jam_diakui);
        if ($this->isColumnModified(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG)) $criteria->add(JabatanTugasPtkPeer::HARUS_REFER_UNIT_ORG, $this->harus_refer_unit_org);
        if ($this->isColumnModified(JabatanTugasPtkPeer::CREATE_DATE)) $criteria->add(JabatanTugasPtkPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JabatanTugasPtkPeer::LAST_UPDATE)) $criteria->add(JabatanTugasPtkPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JabatanTugasPtkPeer::EXPIRED_DATE)) $criteria->add(JabatanTugasPtkPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JabatanTugasPtkPeer::LAST_SYNC)) $criteria->add(JabatanTugasPtkPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JabatanTugasPtkPeer::DATABASE_NAME);
        $criteria->add(JabatanTugasPtkPeer::JABATAN_PTK_ID, $this->jabatan_ptk_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJabatanPtkId();
    }

    /**
     * Generic method to set the primary key (jabatan_ptk_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJabatanPtkId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJabatanPtkId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JabatanTugasPtk (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNama($this->getNama());
        $copyObj->setJabatanUtama($this->getJabatanUtama());
        $copyObj->setTugasTambahanGuru($this->getTugasTambahanGuru());
        $copyObj->setJumlahJamDiakui($this->getJumlahJamDiakui());
        $copyObj->setHarusReferUnitOrg($this->getHarusReferUnitOrg());
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

            foreach ($this->getRwyStrukturals() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addRwyStruktural($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTugasTambahan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJabatanPtkId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JabatanTugasPtk Clone of current object.
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
     * @return JabatanTugasPtkPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JabatanTugasPtkPeer();
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
        if ('RwyStruktural' == $relationName) {
            $this->initRwyStrukturals();
        }
        if ('TugasTambahan' == $relationName) {
            $this->initTugasTambahans();
        }
    }

    /**
     * Clears out the collRwyStrukturals collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JabatanTugasPtk The current object (for fluent API support)
     * @see        addRwyStrukturals()
     */
    public function clearRwyStrukturals()
    {
        $this->collRwyStrukturals = null; // important to set this to null since that means it is uninitialized
        $this->collRwyStrukturalsPartial = null;

        return $this;
    }

    /**
     * reset is the collRwyStrukturals collection loaded partially
     *
     * @return void
     */
    public function resetPartialRwyStrukturals($v = true)
    {
        $this->collRwyStrukturalsPartial = $v;
    }

    /**
     * Initializes the collRwyStrukturals collection.
     *
     * By default this just sets the collRwyStrukturals collection to an empty array (like clearcollRwyStrukturals());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initRwyStrukturals($overrideExisting = true)
    {
        if (null !== $this->collRwyStrukturals && !$overrideExisting) {
            return;
        }
        $this->collRwyStrukturals = new PropelObjectCollection();
        $this->collRwyStrukturals->setModel('RwyStruktural');
    }

    /**
     * Gets an array of RwyStruktural objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JabatanTugasPtk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|RwyStruktural[] List of RwyStruktural objects
     * @throws PropelException
     */
    public function getRwyStrukturals($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collRwyStrukturals || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collRwyStrukturals) {
                // return empty collection
                $this->initRwyStrukturals();
            } else {
                $collRwyStrukturals = RwyStrukturalQuery::create(null, $criteria)
                    ->filterByJabatanTugasPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collRwyStrukturalsPartial && count($collRwyStrukturals)) {
                      $this->initRwyStrukturals(false);

                      foreach($collRwyStrukturals as $obj) {
                        if (false == $this->collRwyStrukturals->contains($obj)) {
                          $this->collRwyStrukturals->append($obj);
                        }
                      }

                      $this->collRwyStrukturalsPartial = true;
                    }

                    $collRwyStrukturals->getInternalIterator()->rewind();
                    return $collRwyStrukturals;
                }

                if($partial && $this->collRwyStrukturals) {
                    foreach($this->collRwyStrukturals as $obj) {
                        if($obj->isNew()) {
                            $collRwyStrukturals[] = $obj;
                        }
                    }
                }

                $this->collRwyStrukturals = $collRwyStrukturals;
                $this->collRwyStrukturalsPartial = false;
            }
        }

        return $this->collRwyStrukturals;
    }

    /**
     * Sets a collection of RwyStruktural objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $rwyStrukturals A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setRwyStrukturals(PropelCollection $rwyStrukturals, PropelPDO $con = null)
    {
        $rwyStrukturalsToDelete = $this->getRwyStrukturals(new Criteria(), $con)->diff($rwyStrukturals);

        $this->rwyStrukturalsScheduledForDeletion = unserialize(serialize($rwyStrukturalsToDelete));

        foreach ($rwyStrukturalsToDelete as $rwyStrukturalRemoved) {
            $rwyStrukturalRemoved->setJabatanTugasPtk(null);
        }

        $this->collRwyStrukturals = null;
        foreach ($rwyStrukturals as $rwyStruktural) {
            $this->addRwyStruktural($rwyStruktural);
        }

        $this->collRwyStrukturals = $rwyStrukturals;
        $this->collRwyStrukturalsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related RwyStruktural objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related RwyStruktural objects.
     * @throws PropelException
     */
    public function countRwyStrukturals(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collRwyStrukturalsPartial && !$this->isNew();
        if (null === $this->collRwyStrukturals || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collRwyStrukturals) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getRwyStrukturals());
            }
            $query = RwyStrukturalQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJabatanTugasPtk($this)
                ->count($con);
        }

        return count($this->collRwyStrukturals);
    }

    /**
     * Method called to associate a RwyStruktural object to this object
     * through the RwyStruktural foreign key attribute.
     *
     * @param    RwyStruktural $l RwyStruktural
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function addRwyStruktural(RwyStruktural $l)
    {
        if ($this->collRwyStrukturals === null) {
            $this->initRwyStrukturals();
            $this->collRwyStrukturalsPartial = true;
        }
        if (!in_array($l, $this->collRwyStrukturals->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddRwyStruktural($l);
        }

        return $this;
    }

    /**
     * @param	RwyStruktural $rwyStruktural The rwyStruktural object to add.
     */
    protected function doAddRwyStruktural($rwyStruktural)
    {
        $this->collRwyStrukturals[]= $rwyStruktural;
        $rwyStruktural->setJabatanTugasPtk($this);
    }

    /**
     * @param	RwyStruktural $rwyStruktural The rwyStruktural object to remove.
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function removeRwyStruktural($rwyStruktural)
    {
        if ($this->getRwyStrukturals()->contains($rwyStruktural)) {
            $this->collRwyStrukturals->remove($this->collRwyStrukturals->search($rwyStruktural));
            if (null === $this->rwyStrukturalsScheduledForDeletion) {
                $this->rwyStrukturalsScheduledForDeletion = clone $this->collRwyStrukturals;
                $this->rwyStrukturalsScheduledForDeletion->clear();
            }
            $this->rwyStrukturalsScheduledForDeletion[]= clone $rwyStruktural;
            $rwyStruktural->setJabatanTugasPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JabatanTugasPtk is new, it will return
     * an empty collection; or if this JabatanTugasPtk has previously
     * been saved, it will retrieve related RwyStrukturals from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JabatanTugasPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|RwyStruktural[] List of RwyStruktural objects
     */
    public function getRwyStrukturalsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = RwyStrukturalQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getRwyStrukturals($query, $con);
    }

    /**
     * Clears out the collTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JabatanTugasPtk The current object (for fluent API support)
     * @see        addTugasTambahans()
     */
    public function clearTugasTambahans()
    {
        $this->collTugasTambahans = null; // important to set this to null since that means it is uninitialized
        $this->collTugasTambahansPartial = null;

        return $this;
    }

    /**
     * reset is the collTugasTambahans collection loaded partially
     *
     * @return void
     */
    public function resetPartialTugasTambahans($v = true)
    {
        $this->collTugasTambahansPartial = $v;
    }

    /**
     * Initializes the collTugasTambahans collection.
     *
     * By default this just sets the collTugasTambahans collection to an empty array (like clearcollTugasTambahans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTugasTambahans($overrideExisting = true)
    {
        if (null !== $this->collTugasTambahans && !$overrideExisting) {
            return;
        }
        $this->collTugasTambahans = new PropelObjectCollection();
        $this->collTugasTambahans->setModel('TugasTambahan');
    }

    /**
     * Gets an array of TugasTambahan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JabatanTugasPtk is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     * @throws PropelException
     */
    public function getTugasTambahans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTugasTambahansPartial && !$this->isNew();
        if (null === $this->collTugasTambahans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTugasTambahans) {
                // return empty collection
                $this->initTugasTambahans();
            } else {
                $collTugasTambahans = TugasTambahanQuery::create(null, $criteria)
                    ->filterByJabatanTugasPtk($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTugasTambahansPartial && count($collTugasTambahans)) {
                      $this->initTugasTambahans(false);

                      foreach($collTugasTambahans as $obj) {
                        if (false == $this->collTugasTambahans->contains($obj)) {
                          $this->collTugasTambahans->append($obj);
                        }
                      }

                      $this->collTugasTambahansPartial = true;
                    }

                    $collTugasTambahans->getInternalIterator()->rewind();
                    return $collTugasTambahans;
                }

                if($partial && $this->collTugasTambahans) {
                    foreach($this->collTugasTambahans as $obj) {
                        if($obj->isNew()) {
                            $collTugasTambahans[] = $obj;
                        }
                    }
                }

                $this->collTugasTambahans = $collTugasTambahans;
                $this->collTugasTambahansPartial = false;
            }
        }

        return $this->collTugasTambahans;
    }

    /**
     * Sets a collection of TugasTambahan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tugasTambahans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function setTugasTambahans(PropelCollection $tugasTambahans, PropelPDO $con = null)
    {
        $tugasTambahansToDelete = $this->getTugasTambahans(new Criteria(), $con)->diff($tugasTambahans);

        $this->tugasTambahansScheduledForDeletion = unserialize(serialize($tugasTambahansToDelete));

        foreach ($tugasTambahansToDelete as $tugasTambahanRemoved) {
            $tugasTambahanRemoved->setJabatanTugasPtk(null);
        }

        $this->collTugasTambahans = null;
        foreach ($tugasTambahans as $tugasTambahan) {
            $this->addTugasTambahan($tugasTambahan);
        }

        $this->collTugasTambahans = $tugasTambahans;
        $this->collTugasTambahansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TugasTambahan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TugasTambahan objects.
     * @throws PropelException
     */
    public function countTugasTambahans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTugasTambahansPartial && !$this->isNew();
        if (null === $this->collTugasTambahans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTugasTambahans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTugasTambahans());
            }
            $query = TugasTambahanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJabatanTugasPtk($this)
                ->count($con);
        }

        return count($this->collTugasTambahans);
    }

    /**
     * Method called to associate a TugasTambahan object to this object
     * through the TugasTambahan foreign key attribute.
     *
     * @param    TugasTambahan $l TugasTambahan
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function addTugasTambahan(TugasTambahan $l)
    {
        if ($this->collTugasTambahans === null) {
            $this->initTugasTambahans();
            $this->collTugasTambahansPartial = true;
        }
        if (!in_array($l, $this->collTugasTambahans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTugasTambahan($l);
        }

        return $this;
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to add.
     */
    protected function doAddTugasTambahan($tugasTambahan)
    {
        $this->collTugasTambahans[]= $tugasTambahan;
        $tugasTambahan->setJabatanTugasPtk($this);
    }

    /**
     * @param	TugasTambahan $tugasTambahan The tugasTambahan object to remove.
     * @return JabatanTugasPtk The current object (for fluent API support)
     */
    public function removeTugasTambahan($tugasTambahan)
    {
        if ($this->getTugasTambahans()->contains($tugasTambahan)) {
            $this->collTugasTambahans->remove($this->collTugasTambahans->search($tugasTambahan));
            if (null === $this->tugasTambahansScheduledForDeletion) {
                $this->tugasTambahansScheduledForDeletion = clone $this->collTugasTambahans;
                $this->tugasTambahansScheduledForDeletion->clear();
            }
            $this->tugasTambahansScheduledForDeletion[]= clone $tugasTambahan;
            $tugasTambahan->setJabatanTugasPtk(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JabatanTugasPtk is new, it will return
     * an empty collection; or if this JabatanTugasPtk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JabatanTugasPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinRuang($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Ruang', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JabatanTugasPtk is new, it will return
     * an empty collection; or if this JabatanTugasPtk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JabatanTugasPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JabatanTugasPtk is new, it will return
     * an empty collection; or if this JabatanTugasPtk has previously
     * been saved, it will retrieve related TugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JabatanTugasPtk.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TugasTambahan[] List of TugasTambahan objects
     */
    public function getTugasTambahansJoinSekolah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Sekolah', $join_behavior);

        return $this->getTugasTambahans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jabatan_ptk_id = null;
        $this->nama = null;
        $this->jabatan_utama = null;
        $this->tugas_tambahan_guru = null;
        $this->jumlah_jam_diakui = null;
        $this->harus_refer_unit_org = null;
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
            if ($this->collRwyStrukturals) {
                foreach ($this->collRwyStrukturals as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTugasTambahans) {
                foreach ($this->collTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collRwyStrukturals instanceof PropelCollection) {
            $this->collRwyStrukturals->clearIterator();
        }
        $this->collRwyStrukturals = null;
        if ($this->collTugasTambahans instanceof PropelCollection) {
            $this->collTugasTambahans->clearIterator();
        }
        $this->collTugasTambahans = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JabatanTugasPtkPeer::DEFAULT_STRING_FORMAT);
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
