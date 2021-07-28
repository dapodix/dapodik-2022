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
use DataDikdas\Model\JenisTest;
use DataDikdas\Model\JenisTestPeer;
use DataDikdas\Model\JenisTestQuery;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\NilaiTestQuery;

/**
 * Base class that represents a row from the 'ref.jenis_test' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseJenisTest extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\JenisTestPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        JenisTestPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the jenis_test_id field.
     * @var        string
     */
    protected $jenis_test_id;

    /**
     * The value for the jenis_test field.
     * @var        string
     */
    protected $jenis_test;

    /**
     * The value for the keterangan field.
     * @var        string
     */
    protected $keterangan;

    /**
     * The value for the nilai_maks field.
     * @var        string
     */
    protected $nilai_maks;

    /**
     * The value for the ket_skor1 field.
     * @var        string
     */
    protected $ket_skor1;

    /**
     * The value for the ket_skor2 field.
     * @var        string
     */
    protected $ket_skor2;

    /**
     * The value for the ket_skor3 field.
     * @var        string
     */
    protected $ket_skor3;

    /**
     * The value for the ket_skor4 field.
     * @var        string
     */
    protected $ket_skor4;

    /**
     * The value for the ket_skor5 field.
     * @var        string
     */
    protected $ket_skor5;

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
     * @var        PropelObjectCollection|NilaiTest[] Collection to store aggregation of NilaiTest objects.
     */
    protected $collNilaiTests;
    protected $collNilaiTestsPartial;

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
    protected $nilaiTestsScheduledForDeletion = null;

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
     * Initializes internal state of BaseJenisTest object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [jenis_test_id] column value.
     * 
     * @return string
     */
    public function getJenisTestId()
    {
        return $this->jenis_test_id;
    }

    /**
     * Get the [jenis_test] column value.
     * 
     * @return string
     */
    public function getJenisTest()
    {
        return $this->jenis_test;
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
     * Get the [nilai_maks] column value.
     * 
     * @return string
     */
    public function getNilaiMaks()
    {
        return $this->nilai_maks;
    }

    /**
     * Get the [ket_skor1] column value.
     * 
     * @return string
     */
    public function getKetSkor1()
    {
        return $this->ket_skor1;
    }

    /**
     * Get the [ket_skor2] column value.
     * 
     * @return string
     */
    public function getKetSkor2()
    {
        return $this->ket_skor2;
    }

    /**
     * Get the [ket_skor3] column value.
     * 
     * @return string
     */
    public function getKetSkor3()
    {
        return $this->ket_skor3;
    }

    /**
     * Get the [ket_skor4] column value.
     * 
     * @return string
     */
    public function getKetSkor4()
    {
        return $this->ket_skor4;
    }

    /**
     * Get the [ket_skor5] column value.
     * 
     * @return string
     */
    public function getKetSkor5()
    {
        return $this->ket_skor5;
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
     * Set the value of [jenis_test_id] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setJenisTestId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_test_id !== $v) {
            $this->jenis_test_id = $v;
            $this->modifiedColumns[] = JenisTestPeer::JENIS_TEST_ID;
        }


        return $this;
    } // setJenisTestId()

    /**
     * Set the value of [jenis_test] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setJenisTest($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_test !== $v) {
            $this->jenis_test = $v;
            $this->modifiedColumns[] = JenisTestPeer::JENIS_TEST;
        }


        return $this;
    } // setJenisTest()

    /**
     * Set the value of [keterangan] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKeterangan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->keterangan !== $v) {
            $this->keterangan = $v;
            $this->modifiedColumns[] = JenisTestPeer::KETERANGAN;
        }


        return $this;
    } // setKeterangan()

    /**
     * Set the value of [nilai_maks] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setNilaiMaks($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_maks !== $v) {
            $this->nilai_maks = $v;
            $this->modifiedColumns[] = JenisTestPeer::NILAI_MAKS;
        }


        return $this;
    } // setNilaiMaks()

    /**
     * Set the value of [ket_skor1] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKetSkor1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_skor1 !== $v) {
            $this->ket_skor1 = $v;
            $this->modifiedColumns[] = JenisTestPeer::KET_SKOR1;
        }


        return $this;
    } // setKetSkor1()

    /**
     * Set the value of [ket_skor2] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKetSkor2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_skor2 !== $v) {
            $this->ket_skor2 = $v;
            $this->modifiedColumns[] = JenisTestPeer::KET_SKOR2;
        }


        return $this;
    } // setKetSkor2()

    /**
     * Set the value of [ket_skor3] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKetSkor3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_skor3 !== $v) {
            $this->ket_skor3 = $v;
            $this->modifiedColumns[] = JenisTestPeer::KET_SKOR3;
        }


        return $this;
    } // setKetSkor3()

    /**
     * Set the value of [ket_skor4] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKetSkor4($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_skor4 !== $v) {
            $this->ket_skor4 = $v;
            $this->modifiedColumns[] = JenisTestPeer::KET_SKOR4;
        }


        return $this;
    } // setKetSkor4()

    /**
     * Set the value of [ket_skor5] column.
     * 
     * @param string $v new value
     * @return JenisTest The current object (for fluent API support)
     */
    public function setKetSkor5($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_skor5 !== $v) {
            $this->ket_skor5 = $v;
            $this->modifiedColumns[] = JenisTestPeer::KET_SKOR5;
        }


        return $this;
    } // setKetSkor5()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisTest The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = JenisTestPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisTest The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = JenisTestPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisTest The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = JenisTestPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return JenisTest The current object (for fluent API support)
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
                $this->modifiedColumns[] = JenisTestPeer::LAST_SYNC;
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

            $this->jenis_test_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_test = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->keterangan = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nilai_maks = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->ket_skor1 = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ket_skor2 = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->ket_skor3 = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->ket_skor4 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->ket_skor5 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
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
            return $startcol + 13; // 13 = JenisTestPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating JenisTest object", $e);
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
            $con = Propel::getConnection(JenisTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = JenisTestPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collNilaiTests = null;

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
            $con = Propel::getConnection(JenisTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = JenisTestQuery::create()
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
            $con = Propel::getConnection(JenisTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                JenisTestPeer::addInstanceToPool($this);
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

            if ($this->nilaiTestsScheduledForDeletion !== null) {
                if (!$this->nilaiTestsScheduledForDeletion->isEmpty()) {
                    NilaiTestQuery::create()
                        ->filterByPrimaryKeys($this->nilaiTestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nilaiTestsScheduledForDeletion = null;
                }
            }

            if ($this->collNilaiTests !== null) {
                foreach ($this->collNilaiTests as $referrerFK) {
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
        if ($this->isColumnModified(JenisTestPeer::JENIS_TEST_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_test_id"';
        }
        if ($this->isColumnModified(JenisTestPeer::JENIS_TEST)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_test"';
        }
        if ($this->isColumnModified(JenisTestPeer::KETERANGAN)) {
            $modifiedColumns[':p' . $index++]  = '"keterangan"';
        }
        if ($this->isColumnModified(JenisTestPeer::NILAI_MAKS)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_maks"';
        }
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR1)) {
            $modifiedColumns[':p' . $index++]  = '"ket_skor1"';
        }
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR2)) {
            $modifiedColumns[':p' . $index++]  = '"ket_skor2"';
        }
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR3)) {
            $modifiedColumns[':p' . $index++]  = '"ket_skor3"';
        }
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR4)) {
            $modifiedColumns[':p' . $index++]  = '"ket_skor4"';
        }
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR5)) {
            $modifiedColumns[':p' . $index++]  = '"ket_skor5"';
        }
        if ($this->isColumnModified(JenisTestPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(JenisTestPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(JenisTestPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(JenisTestPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "ref"."jenis_test" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"jenis_test_id"':						
                        $stmt->bindValue($identifier, $this->jenis_test_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_test"':						
                        $stmt->bindValue($identifier, $this->jenis_test, PDO::PARAM_STR);
                        break;
                    case '"keterangan"':						
                        $stmt->bindValue($identifier, $this->keterangan, PDO::PARAM_STR);
                        break;
                    case '"nilai_maks"':						
                        $stmt->bindValue($identifier, $this->nilai_maks, PDO::PARAM_STR);
                        break;
                    case '"ket_skor1"':						
                        $stmt->bindValue($identifier, $this->ket_skor1, PDO::PARAM_STR);
                        break;
                    case '"ket_skor2"':						
                        $stmt->bindValue($identifier, $this->ket_skor2, PDO::PARAM_STR);
                        break;
                    case '"ket_skor3"':						
                        $stmt->bindValue($identifier, $this->ket_skor3, PDO::PARAM_STR);
                        break;
                    case '"ket_skor4"':						
                        $stmt->bindValue($identifier, $this->ket_skor4, PDO::PARAM_STR);
                        break;
                    case '"ket_skor5"':						
                        $stmt->bindValue($identifier, $this->ket_skor5, PDO::PARAM_STR);
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


            if (($retval = JenisTestPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collNilaiTests !== null) {
                    foreach ($this->collNilaiTests as $referrerFK) {
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
        $pos = JenisTestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getJenisTestId();
                break;
            case 1:
                return $this->getJenisTest();
                break;
            case 2:
                return $this->getKeterangan();
                break;
            case 3:
                return $this->getNilaiMaks();
                break;
            case 4:
                return $this->getKetSkor1();
                break;
            case 5:
                return $this->getKetSkor2();
                break;
            case 6:
                return $this->getKetSkor3();
                break;
            case 7:
                return $this->getKetSkor4();
                break;
            case 8:
                return $this->getKetSkor5();
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
        if (isset($alreadyDumpedObjects['JenisTest'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['JenisTest'][$this->getPrimaryKey()] = true;
        $keys = JenisTestPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getJenisTestId(),
            $keys[1] => $this->getJenisTest(),
            $keys[2] => $this->getKeterangan(),
            $keys[3] => $this->getNilaiMaks(),
            $keys[4] => $this->getKetSkor1(),
            $keys[5] => $this->getKetSkor2(),
            $keys[6] => $this->getKetSkor3(),
            $keys[7] => $this->getKetSkor4(),
            $keys[8] => $this->getKetSkor5(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getExpiredDate(),
            $keys[12] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collNilaiTests) {
                $result['NilaiTests'] = $this->collNilaiTests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = JenisTestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setJenisTestId($value);
                break;
            case 1:
                $this->setJenisTest($value);
                break;
            case 2:
                $this->setKeterangan($value);
                break;
            case 3:
                $this->setNilaiMaks($value);
                break;
            case 4:
                $this->setKetSkor1($value);
                break;
            case 5:
                $this->setKetSkor2($value);
                break;
            case 6:
                $this->setKetSkor3($value);
                break;
            case 7:
                $this->setKetSkor4($value);
                break;
            case 8:
                $this->setKetSkor5($value);
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
        $keys = JenisTestPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setJenisTestId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisTest($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setKeterangan($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNilaiMaks($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKetSkor1($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKetSkor2($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setKetSkor3($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setKetSkor4($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setKetSkor5($arr[$keys[8]]);
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
        $criteria = new Criteria(JenisTestPeer::DATABASE_NAME);

        if ($this->isColumnModified(JenisTestPeer::JENIS_TEST_ID)) $criteria->add(JenisTestPeer::JENIS_TEST_ID, $this->jenis_test_id);
        if ($this->isColumnModified(JenisTestPeer::JENIS_TEST)) $criteria->add(JenisTestPeer::JENIS_TEST, $this->jenis_test);
        if ($this->isColumnModified(JenisTestPeer::KETERANGAN)) $criteria->add(JenisTestPeer::KETERANGAN, $this->keterangan);
        if ($this->isColumnModified(JenisTestPeer::NILAI_MAKS)) $criteria->add(JenisTestPeer::NILAI_MAKS, $this->nilai_maks);
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR1)) $criteria->add(JenisTestPeer::KET_SKOR1, $this->ket_skor1);
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR2)) $criteria->add(JenisTestPeer::KET_SKOR2, $this->ket_skor2);
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR3)) $criteria->add(JenisTestPeer::KET_SKOR3, $this->ket_skor3);
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR4)) $criteria->add(JenisTestPeer::KET_SKOR4, $this->ket_skor4);
        if ($this->isColumnModified(JenisTestPeer::KET_SKOR5)) $criteria->add(JenisTestPeer::KET_SKOR5, $this->ket_skor5);
        if ($this->isColumnModified(JenisTestPeer::CREATE_DATE)) $criteria->add(JenisTestPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(JenisTestPeer::LAST_UPDATE)) $criteria->add(JenisTestPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(JenisTestPeer::EXPIRED_DATE)) $criteria->add(JenisTestPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(JenisTestPeer::LAST_SYNC)) $criteria->add(JenisTestPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(JenisTestPeer::DATABASE_NAME);
        $criteria->add(JenisTestPeer::JENIS_TEST_ID, $this->jenis_test_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getJenisTestId();
    }

    /**
     * Generic method to set the primary key (jenis_test_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setJenisTestId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getJenisTestId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of JenisTest (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisTest($this->getJenisTest());
        $copyObj->setKeterangan($this->getKeterangan());
        $copyObj->setNilaiMaks($this->getNilaiMaks());
        $copyObj->setKetSkor1($this->getKetSkor1());
        $copyObj->setKetSkor2($this->getKetSkor2());
        $copyObj->setKetSkor3($this->getKetSkor3());
        $copyObj->setKetSkor4($this->getKetSkor4());
        $copyObj->setKetSkor5($this->getKetSkor5());
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

            foreach ($this->getNilaiTests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNilaiTest($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setJenisTestId(NULL); // this is a auto-increment column, so set to default value
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
     * @return JenisTest Clone of current object.
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
     * @return JenisTestPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new JenisTestPeer();
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
        if ('NilaiTest' == $relationName) {
            $this->initNilaiTests();
        }
    }

    /**
     * Clears out the collNilaiTests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return JenisTest The current object (for fluent API support)
     * @see        addNilaiTests()
     */
    public function clearNilaiTests()
    {
        $this->collNilaiTests = null; // important to set this to null since that means it is uninitialized
        $this->collNilaiTestsPartial = null;

        return $this;
    }

    /**
     * reset is the collNilaiTests collection loaded partially
     *
     * @return void
     */
    public function resetPartialNilaiTests($v = true)
    {
        $this->collNilaiTestsPartial = $v;
    }

    /**
     * Initializes the collNilaiTests collection.
     *
     * By default this just sets the collNilaiTests collection to an empty array (like clearcollNilaiTests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNilaiTests($overrideExisting = true)
    {
        if (null !== $this->collNilaiTests && !$overrideExisting) {
            return;
        }
        $this->collNilaiTests = new PropelObjectCollection();
        $this->collNilaiTests->setModel('NilaiTest');
    }

    /**
     * Gets an array of NilaiTest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this JenisTest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NilaiTest[] List of NilaiTest objects
     * @throws PropelException
     */
    public function getNilaiTests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNilaiTestsPartial && !$this->isNew();
        if (null === $this->collNilaiTests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNilaiTests) {
                // return empty collection
                $this->initNilaiTests();
            } else {
                $collNilaiTests = NilaiTestQuery::create(null, $criteria)
                    ->filterByJenisTest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNilaiTestsPartial && count($collNilaiTests)) {
                      $this->initNilaiTests(false);

                      foreach($collNilaiTests as $obj) {
                        if (false == $this->collNilaiTests->contains($obj)) {
                          $this->collNilaiTests->append($obj);
                        }
                      }

                      $this->collNilaiTestsPartial = true;
                    }

                    $collNilaiTests->getInternalIterator()->rewind();
                    return $collNilaiTests;
                }

                if($partial && $this->collNilaiTests) {
                    foreach($this->collNilaiTests as $obj) {
                        if($obj->isNew()) {
                            $collNilaiTests[] = $obj;
                        }
                    }
                }

                $this->collNilaiTests = $collNilaiTests;
                $this->collNilaiTestsPartial = false;
            }
        }

        return $this->collNilaiTests;
    }

    /**
     * Sets a collection of NilaiTest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nilaiTests A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return JenisTest The current object (for fluent API support)
     */
    public function setNilaiTests(PropelCollection $nilaiTests, PropelPDO $con = null)
    {
        $nilaiTestsToDelete = $this->getNilaiTests(new Criteria(), $con)->diff($nilaiTests);

        $this->nilaiTestsScheduledForDeletion = unserialize(serialize($nilaiTestsToDelete));

        foreach ($nilaiTestsToDelete as $nilaiTestRemoved) {
            $nilaiTestRemoved->setJenisTest(null);
        }

        $this->collNilaiTests = null;
        foreach ($nilaiTests as $nilaiTest) {
            $this->addNilaiTest($nilaiTest);
        }

        $this->collNilaiTests = $nilaiTests;
        $this->collNilaiTestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related NilaiTest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related NilaiTest objects.
     * @throws PropelException
     */
    public function countNilaiTests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNilaiTestsPartial && !$this->isNew();
        if (null === $this->collNilaiTests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNilaiTests) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNilaiTests());
            }
            $query = NilaiTestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByJenisTest($this)
                ->count($con);
        }

        return count($this->collNilaiTests);
    }

    /**
     * Method called to associate a NilaiTest object to this object
     * through the NilaiTest foreign key attribute.
     *
     * @param    NilaiTest $l NilaiTest
     * @return JenisTest The current object (for fluent API support)
     */
    public function addNilaiTest(NilaiTest $l)
    {
        if ($this->collNilaiTests === null) {
            $this->initNilaiTests();
            $this->collNilaiTestsPartial = true;
        }
        if (!in_array($l, $this->collNilaiTests->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNilaiTest($l);
        }

        return $this;
    }

    /**
     * @param	NilaiTest $nilaiTest The nilaiTest object to add.
     */
    protected function doAddNilaiTest($nilaiTest)
    {
        $this->collNilaiTests[]= $nilaiTest;
        $nilaiTest->setJenisTest($this);
    }

    /**
     * @param	NilaiTest $nilaiTest The nilaiTest object to remove.
     * @return JenisTest The current object (for fluent API support)
     */
    public function removeNilaiTest($nilaiTest)
    {
        if ($this->getNilaiTests()->contains($nilaiTest)) {
            $this->collNilaiTests->remove($this->collNilaiTests->search($nilaiTest));
            if (null === $this->nilaiTestsScheduledForDeletion) {
                $this->nilaiTestsScheduledForDeletion = clone $this->collNilaiTests;
                $this->nilaiTestsScheduledForDeletion->clear();
            }
            $this->nilaiTestsScheduledForDeletion[]= clone $nilaiTest;
            $nilaiTest->setJenisTest(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this JenisTest is new, it will return
     * an empty collection; or if this JenisTest has previously
     * been saved, it will retrieve related NilaiTests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in JenisTest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|NilaiTest[] List of NilaiTest objects
     */
    public function getNilaiTestsJoinPtk($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = NilaiTestQuery::create(null, $criteria);
        $query->joinWith('Ptk', $join_behavior);

        return $this->getNilaiTests($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->jenis_test_id = null;
        $this->jenis_test = null;
        $this->keterangan = null;
        $this->nilai_maks = null;
        $this->ket_skor1 = null;
        $this->ket_skor2 = null;
        $this->ket_skor3 = null;
        $this->ket_skor4 = null;
        $this->ket_skor5 = null;
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
            if ($this->collNilaiTests) {
                foreach ($this->collNilaiTests as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collNilaiTests instanceof PropelCollection) {
            $this->collNilaiTests->clearIterator();
        }
        $this->collNilaiTests = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(JenisTestPeer::DEFAULT_STRING_FORMAT);
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
