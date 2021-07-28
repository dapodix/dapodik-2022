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
use DataDikdas\Model\NilaiSmt;
use DataDikdas\Model\NilaiSmtPeer;
use DataDikdas\Model\NilaiSmtQuery;

/**
 * Base class that represents a row from the 'nilai.nilai_smt' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiSmt extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\NilaiSmtPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NilaiSmtPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the anggota_rombel_id field.
     * @var        string
     */
    protected $anggota_rombel_id;

    /**
     * The value for the nilai_afektif_angka field.
     * @var        string
     */
    protected $nilai_afektif_angka;

    /**
     * The value for the nilai_afektif_huruf field.
     * @var        string
     */
    protected $nilai_afektif_huruf;

    /**
     * The value for the ket_afektif field.
     * @var        string
     */
    protected $ket_afektif;

    /**
     * The value for the nilai_afektif2_angka field.
     * @var        string
     */
    protected $nilai_afektif2_angka;

    /**
     * The value for the nilai_afektif2_huruf field.
     * @var        string
     */
    protected $nilai_afektif2_huruf;

    /**
     * The value for the ket_afektif2 field.
     * @var        string
     */
    protected $ket_afektif2;

    /**
     * The value for the a_beku field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $a_beku;

    /**
     * The value for the rapor_ke field.
     * @var        string
     */
    protected $rapor_ke;

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
        $this->a_beku = '0';
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseNilaiSmt object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [anggota_rombel_id] column value.
     * 
     * @return string
     */
    public function getAnggotaRombelId()
    {
        return $this->anggota_rombel_id;
    }

    /**
     * Get the [nilai_afektif_angka] column value.
     * 
     * @return string
     */
    public function getNilaiAfektifAngka()
    {
        return $this->nilai_afektif_angka;
    }

    /**
     * Get the [nilai_afektif_huruf] column value.
     * 
     * @return string
     */
    public function getNilaiAfektifHuruf()
    {
        return $this->nilai_afektif_huruf;
    }

    /**
     * Get the [ket_afektif] column value.
     * 
     * @return string
     */
    public function getKetAfektif()
    {
        return $this->ket_afektif;
    }

    /**
     * Get the [nilai_afektif2_angka] column value.
     * 
     * @return string
     */
    public function getNilaiAfektif2Angka()
    {
        return $this->nilai_afektif2_angka;
    }

    /**
     * Get the [nilai_afektif2_huruf] column value.
     * 
     * @return string
     */
    public function getNilaiAfektif2Huruf()
    {
        return $this->nilai_afektif2_huruf;
    }

    /**
     * Get the [ket_afektif2] column value.
     * 
     * @return string
     */
    public function getKetAfektif2()
    {
        return $this->ket_afektif2;
    }

    /**
     * Get the [a_beku] column value.
     * 
     * @return string
     */
    public function getABeku()
    {
        return $this->a_beku;
    }

    /**
     * Get the [rapor_ke] column value.
     * 
     * @return string
     */
    public function getRaporKe()
    {
        return $this->rapor_ke;
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
     * Set the value of [anggota_rombel_id] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setAnggotaRombelId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->anggota_rombel_id !== $v) {
            $this->anggota_rombel_id = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::ANGGOTA_ROMBEL_ID;
        }


        return $this;
    } // setAnggotaRombelId()

    /**
     * Set the value of [nilai_afektif_angka] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setNilaiAfektifAngka($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_afektif_angka !== $v) {
            $this->nilai_afektif_angka = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::NILAI_AFEKTIF_ANGKA;
        }


        return $this;
    } // setNilaiAfektifAngka()

    /**
     * Set the value of [nilai_afektif_huruf] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setNilaiAfektifHuruf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_afektif_huruf !== $v) {
            $this->nilai_afektif_huruf = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::NILAI_AFEKTIF_HURUF;
        }


        return $this;
    } // setNilaiAfektifHuruf()

    /**
     * Set the value of [ket_afektif] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setKetAfektif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_afektif !== $v) {
            $this->ket_afektif = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::KET_AFEKTIF;
        }


        return $this;
    } // setKetAfektif()

    /**
     * Set the value of [nilai_afektif2_angka] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setNilaiAfektif2Angka($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_afektif2_angka !== $v) {
            $this->nilai_afektif2_angka = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA;
        }


        return $this;
    } // setNilaiAfektif2Angka()

    /**
     * Set the value of [nilai_afektif2_huruf] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setNilaiAfektif2Huruf($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_afektif2_huruf !== $v) {
            $this->nilai_afektif2_huruf = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::NILAI_AFEKTIF2_HURUF;
        }


        return $this;
    } // setNilaiAfektif2Huruf()

    /**
     * Set the value of [ket_afektif2] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setKetAfektif2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_afektif2 !== $v) {
            $this->ket_afektif2 = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::KET_AFEKTIF2;
        }


        return $this;
    } // setKetAfektif2()

    /**
     * Set the value of [a_beku] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setABeku($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_beku !== $v) {
            $this->a_beku = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::A_BEKU;
        }


        return $this;
    } // setABeku()

    /**
     * Set the value of [rapor_ke] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setRaporKe($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rapor_ke !== $v) {
            $this->rapor_ke = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::RAPOR_KE;
        }


        return $this;
    } // setRaporKe()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = NilaiSmtPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = NilaiSmtPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiSmt The current object (for fluent API support)
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
                $this->modifiedColumns[] = NilaiSmtPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return NilaiSmt The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = NilaiSmtPeer::UPDATER_ID;
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
            if ($this->a_beku !== '0') {
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

            $this->anggota_rombel_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nilai_afektif_angka = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nilai_afektif_huruf = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->ket_afektif = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nilai_afektif2_angka = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->nilai_afektif2_huruf = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->ket_afektif2 = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->a_beku = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->rapor_ke = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
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
            return $startcol + 14; // 14 = NilaiSmtPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating NilaiSmt object", $e);
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
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NilaiSmtPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NilaiSmtQuery::create()
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
            $con = Propel::getConnection(NilaiSmtPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                NilaiSmtPeer::addInstanceToPool($this);
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
        if ($this->isColumnModified(NilaiSmtPeer::ANGGOTA_ROMBEL_ID)) {
            $modifiedColumns[':p' . $index++]  = '"anggota_rombel_id"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_afektif_angka"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF_HURUF)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_afektif_huruf"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::KET_AFEKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"ket_afektif"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_afektif2_angka"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF2_HURUF)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_afektif2_huruf"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::KET_AFEKTIF2)) {
            $modifiedColumns[':p' . $index++]  = '"ket_afektif2"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::A_BEKU)) {
            $modifiedColumns[':p' . $index++]  = '"a_beku"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::RAPOR_KE)) {
            $modifiedColumns[':p' . $index++]  = '"rapor_ke"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(NilaiSmtPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "nilai"."nilai_smt" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"anggota_rombel_id"':						
                        $stmt->bindValue($identifier, $this->anggota_rombel_id, PDO::PARAM_STR);
                        break;
                    case '"nilai_afektif_angka"':						
                        $stmt->bindValue($identifier, $this->nilai_afektif_angka, PDO::PARAM_STR);
                        break;
                    case '"nilai_afektif_huruf"':						
                        $stmt->bindValue($identifier, $this->nilai_afektif_huruf, PDO::PARAM_STR);
                        break;
                    case '"ket_afektif"':						
                        $stmt->bindValue($identifier, $this->ket_afektif, PDO::PARAM_STR);
                        break;
                    case '"nilai_afektif2_angka"':						
                        $stmt->bindValue($identifier, $this->nilai_afektif2_angka, PDO::PARAM_STR);
                        break;
                    case '"nilai_afektif2_huruf"':						
                        $stmt->bindValue($identifier, $this->nilai_afektif2_huruf, PDO::PARAM_STR);
                        break;
                    case '"ket_afektif2"':						
                        $stmt->bindValue($identifier, $this->ket_afektif2, PDO::PARAM_STR);
                        break;
                    case '"a_beku"':						
                        $stmt->bindValue($identifier, $this->a_beku, PDO::PARAM_STR);
                        break;
                    case '"rapor_ke"':						
                        $stmt->bindValue($identifier, $this->rapor_ke, PDO::PARAM_STR);
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


            if (($retval = NilaiSmtPeer::doValidate($this, $columns)) !== true) {
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
        $pos = NilaiSmtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getAnggotaRombelId();
                break;
            case 1:
                return $this->getNilaiAfektifAngka();
                break;
            case 2:
                return $this->getNilaiAfektifHuruf();
                break;
            case 3:
                return $this->getKetAfektif();
                break;
            case 4:
                return $this->getNilaiAfektif2Angka();
                break;
            case 5:
                return $this->getNilaiAfektif2Huruf();
                break;
            case 6:
                return $this->getKetAfektif2();
                break;
            case 7:
                return $this->getABeku();
                break;
            case 8:
                return $this->getRaporKe();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['NilaiSmt'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['NilaiSmt'][$this->getPrimaryKey()] = true;
        $keys = NilaiSmtPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getAnggotaRombelId(),
            $keys[1] => $this->getNilaiAfektifAngka(),
            $keys[2] => $this->getNilaiAfektifHuruf(),
            $keys[3] => $this->getKetAfektif(),
            $keys[4] => $this->getNilaiAfektif2Angka(),
            $keys[5] => $this->getNilaiAfektif2Huruf(),
            $keys[6] => $this->getKetAfektif2(),
            $keys[7] => $this->getABeku(),
            $keys[8] => $this->getRaporKe(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getSoftDelete(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getUpdaterId(),
        );

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
        $pos = NilaiSmtPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setAnggotaRombelId($value);
                break;
            case 1:
                $this->setNilaiAfektifAngka($value);
                break;
            case 2:
                $this->setNilaiAfektifHuruf($value);
                break;
            case 3:
                $this->setKetAfektif($value);
                break;
            case 4:
                $this->setNilaiAfektif2Angka($value);
                break;
            case 5:
                $this->setNilaiAfektif2Huruf($value);
                break;
            case 6:
                $this->setKetAfektif2($value);
                break;
            case 7:
                $this->setABeku($value);
                break;
            case 8:
                $this->setRaporKe($value);
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
        $keys = NilaiSmtPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setAnggotaRombelId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNilaiAfektifAngka($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNilaiAfektifHuruf($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setKetAfektif($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNilaiAfektif2Angka($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setNilaiAfektif2Huruf($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKetAfektif2($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setABeku($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setRaporKe($arr[$keys[8]]);
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
        $criteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);

        if ($this->isColumnModified(NilaiSmtPeer::ANGGOTA_ROMBEL_ID)) $criteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $this->anggota_rombel_id);
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA)) $criteria->add(NilaiSmtPeer::NILAI_AFEKTIF_ANGKA, $this->nilai_afektif_angka);
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF_HURUF)) $criteria->add(NilaiSmtPeer::NILAI_AFEKTIF_HURUF, $this->nilai_afektif_huruf);
        if ($this->isColumnModified(NilaiSmtPeer::KET_AFEKTIF)) $criteria->add(NilaiSmtPeer::KET_AFEKTIF, $this->ket_afektif);
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA)) $criteria->add(NilaiSmtPeer::NILAI_AFEKTIF2_ANGKA, $this->nilai_afektif2_angka);
        if ($this->isColumnModified(NilaiSmtPeer::NILAI_AFEKTIF2_HURUF)) $criteria->add(NilaiSmtPeer::NILAI_AFEKTIF2_HURUF, $this->nilai_afektif2_huruf);
        if ($this->isColumnModified(NilaiSmtPeer::KET_AFEKTIF2)) $criteria->add(NilaiSmtPeer::KET_AFEKTIF2, $this->ket_afektif2);
        if ($this->isColumnModified(NilaiSmtPeer::A_BEKU)) $criteria->add(NilaiSmtPeer::A_BEKU, $this->a_beku);
        if ($this->isColumnModified(NilaiSmtPeer::RAPOR_KE)) $criteria->add(NilaiSmtPeer::RAPOR_KE, $this->rapor_ke);
        if ($this->isColumnModified(NilaiSmtPeer::CREATE_DATE)) $criteria->add(NilaiSmtPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(NilaiSmtPeer::LAST_UPDATE)) $criteria->add(NilaiSmtPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(NilaiSmtPeer::SOFT_DELETE)) $criteria->add(NilaiSmtPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(NilaiSmtPeer::LAST_SYNC)) $criteria->add(NilaiSmtPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(NilaiSmtPeer::UPDATER_ID)) $criteria->add(NilaiSmtPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(NilaiSmtPeer::DATABASE_NAME);
        $criteria->add(NilaiSmtPeer::ANGGOTA_ROMBEL_ID, $this->anggota_rombel_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getAnggotaRombelId();
    }

    /**
     * Generic method to set the primary key (anggota_rombel_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAnggotaRombelId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAnggotaRombelId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of NilaiSmt (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNilaiAfektifAngka($this->getNilaiAfektifAngka());
        $copyObj->setNilaiAfektifHuruf($this->getNilaiAfektifHuruf());
        $copyObj->setKetAfektif($this->getKetAfektif());
        $copyObj->setNilaiAfektif2Angka($this->getNilaiAfektif2Angka());
        $copyObj->setNilaiAfektif2Huruf($this->getNilaiAfektif2Huruf());
        $copyObj->setKetAfektif2($this->getKetAfektif2());
        $copyObj->setABeku($this->getABeku());
        $copyObj->setRaporKe($this->getRaporKe());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setUpdaterId($this->getUpdaterId());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAnggotaRombelId(NULL); // this is a auto-increment column, so set to default value
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
     * @return NilaiSmt Clone of current object.
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
     * @return NilaiSmtPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NilaiSmtPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->anggota_rombel_id = null;
        $this->nilai_afektif_angka = null;
        $this->nilai_afektif_huruf = null;
        $this->ket_afektif = null;
        $this->nilai_afektif2_angka = null;
        $this->nilai_afektif2_huruf = null;
        $this->ket_afektif2 = null;
        $this->a_beku = null;
        $this->rapor_ke = null;
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NilaiSmtPeer::DEFAULT_STRING_FORMAT);
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
