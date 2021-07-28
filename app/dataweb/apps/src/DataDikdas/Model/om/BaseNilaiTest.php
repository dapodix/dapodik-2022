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
use DataDikdas\Model\JenisTestQuery;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\NilaiTestPeer;
use DataDikdas\Model\NilaiTestQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\VldNilaiTest;
use DataDikdas\Model\VldNilaiTestQuery;

/**
 * Base class that represents a row from the 'nilai_test' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseNilaiTest extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\NilaiTestPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        NilaiTestPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the nilai_test_id field.
     * @var        string
     */
    protected $nilai_test_id;

    /**
     * The value for the jenis_test_id field.
     * @var        string
     */
    protected $jenis_test_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the penyelenggara field.
     * @var        string
     */
    protected $penyelenggara;

    /**
     * The value for the tahun field.
     * @var        string
     */
    protected $tahun;

    /**
     * The value for the skor field.
     * @var        string
     */
    protected $skor;

    /**
     * The value for the skor1 field.
     * @var        string
     */
    protected $skor1;

    /**
     * The value for the skor2 field.
     * @var        string
     */
    protected $skor2;

    /**
     * The value for the skor3 field.
     * @var        string
     */
    protected $skor3;

    /**
     * The value for the skor4 field.
     * @var        string
     */
    protected $skor4;

    /**
     * The value for the skor5 field.
     * @var        string
     */
    protected $skor5;

    /**
     * The value for the nomor_peserta field.
     * @var        string
     */
    protected $nomor_peserta;

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
     * @var        JenisTest
     */
    protected $aJenisTest;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        PropelObjectCollection|VldNilaiTest[] Collection to store aggregation of VldNilaiTest objects.
     */
    protected $collVldNilaiTests;
    protected $collVldNilaiTestsPartial;

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
    protected $vldNilaiTestsScheduledForDeletion = null;

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
     * Initializes internal state of BaseNilaiTest object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [nilai_test_id] column value.
     * 
     * @return string
     */
    public function getNilaiTestId()
    {
        return $this->nilai_test_id;
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
     * Get the [ptk_id] column value.
     * 
     * @return string
     */
    public function getPtkId()
    {
        return $this->ptk_id;
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
     * Get the [penyelenggara] column value.
     * 
     * @return string
     */
    public function getPenyelenggara()
    {
        return $this->penyelenggara;
    }

    /**
     * Get the [tahun] column value.
     * 
     * @return string
     */
    public function getTahun()
    {
        return $this->tahun;
    }

    /**
     * Get the [skor] column value.
     * 
     * @return string
     */
    public function getSkor()
    {
        return $this->skor;
    }

    /**
     * Get the [skor1] column value.
     * 
     * @return string
     */
    public function getSkor1()
    {
        return $this->skor1;
    }

    /**
     * Get the [skor2] column value.
     * 
     * @return string
     */
    public function getSkor2()
    {
        return $this->skor2;
    }

    /**
     * Get the [skor3] column value.
     * 
     * @return string
     */
    public function getSkor3()
    {
        return $this->skor3;
    }

    /**
     * Get the [skor4] column value.
     * 
     * @return string
     */
    public function getSkor4()
    {
        return $this->skor4;
    }

    /**
     * Get the [skor5] column value.
     * 
     * @return string
     */
    public function getSkor5()
    {
        return $this->skor5;
    }

    /**
     * Get the [nomor_peserta] column value.
     * 
     * @return string
     */
    public function getNomorPeserta()
    {
        return $this->nomor_peserta;
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
     * Set the value of [nilai_test_id] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setNilaiTestId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nilai_test_id !== $v) {
            $this->nilai_test_id = $v;
            $this->modifiedColumns[] = NilaiTestPeer::NILAI_TEST_ID;
        }


        return $this;
    } // setNilaiTestId()

    /**
     * Set the value of [jenis_test_id] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setJenisTestId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jenis_test_id !== $v) {
            $this->jenis_test_id = $v;
            $this->modifiedColumns[] = NilaiTestPeer::JENIS_TEST_ID;
        }

        if ($this->aJenisTest !== null && $this->aJenisTest->getJenisTestId() !== $v) {
            $this->aJenisTest = null;
        }


        return $this;
    } // setJenisTestId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = NilaiTestPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = NilaiTestPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [penyelenggara] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setPenyelenggara($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->penyelenggara !== $v) {
            $this->penyelenggara = $v;
            $this->modifiedColumns[] = NilaiTestPeer::PENYELENGGARA;
        }


        return $this;
    } // setPenyelenggara()

    /**
     * Set the value of [tahun] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun !== $v) {
            $this->tahun = $v;
            $this->modifiedColumns[] = NilaiTestPeer::TAHUN;
        }


        return $this;
    } // setTahun()

    /**
     * Set the value of [skor] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor !== $v) {
            $this->skor = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR;
        }


        return $this;
    } // setSkor()

    /**
     * Set the value of [skor1] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor1($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor1 !== $v) {
            $this->skor1 = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR1;
        }


        return $this;
    } // setSkor1()

    /**
     * Set the value of [skor2] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor2 !== $v) {
            $this->skor2 = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR2;
        }


        return $this;
    } // setSkor2()

    /**
     * Set the value of [skor3] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor3($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor3 !== $v) {
            $this->skor3 = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR3;
        }


        return $this;
    } // setSkor3()

    /**
     * Set the value of [skor4] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor4($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor4 !== $v) {
            $this->skor4 = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR4;
        }


        return $this;
    } // setSkor4()

    /**
     * Set the value of [skor5] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSkor5($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->skor5 !== $v) {
            $this->skor5 = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SKOR5;
        }


        return $this;
    } // setSkor5()

    /**
     * Set the value of [nomor_peserta] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setNomorPeserta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_peserta !== $v) {
            $this->nomor_peserta = $v;
            $this->modifiedColumns[] = NilaiTestPeer::NOMOR_PESERTA;
        }


        return $this;
    } // setNomorPeserta()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = NilaiTestPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = NilaiTestPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = NilaiTestPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = NilaiTestPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return NilaiTest The current object (for fluent API support)
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
                $this->modifiedColumns[] = NilaiTestPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = NilaiTestPeer::UPDATER_ID;
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

            $this->nilai_test_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->jenis_test_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ptk_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nama = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->penyelenggara = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->tahun = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->skor = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->skor1 = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->skor2 = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->skor3 = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->skor4 = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->skor5 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->nomor_peserta = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->asal_data = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->create_date = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->last_update = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->soft_delete = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->last_sync = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->updater_id = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 19; // 19 = NilaiTestPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating NilaiTest object", $e);
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

        if ($this->aJenisTest !== null && $this->jenis_test_id !== $this->aJenisTest->getJenisTestId()) {
            $this->aJenisTest = null;
        }
        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
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
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = NilaiTestPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aJenisTest = null;
            $this->aPtk = null;
            $this->collVldNilaiTests = null;

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
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = NilaiTestQuery::create()
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
            $con = Propel::getConnection(NilaiTestPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                NilaiTestPeer::addInstanceToPool($this);
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

            if ($this->aJenisTest !== null) {
                if ($this->aJenisTest->isModified() || $this->aJenisTest->isNew()) {
                    $affectedRows += $this->aJenisTest->save($con);
                }
                $this->setJenisTest($this->aJenisTest);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
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

            if ($this->vldNilaiTestsScheduledForDeletion !== null) {
                if (!$this->vldNilaiTestsScheduledForDeletion->isEmpty()) {
                    VldNilaiTestQuery::create()
                        ->filterByPrimaryKeys($this->vldNilaiTestsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldNilaiTestsScheduledForDeletion = null;
                }
            }

            if ($this->collVldNilaiTests !== null) {
                foreach ($this->collVldNilaiTests as $referrerFK) {
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
        if ($this->isColumnModified(NilaiTestPeer::NILAI_TEST_ID)) {
            $modifiedColumns[':p' . $index++]  = '"nilai_test_id"';
        }
        if ($this->isColumnModified(NilaiTestPeer::JENIS_TEST_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_test_id"';
        }
        if ($this->isColumnModified(NilaiTestPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(NilaiTestPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(NilaiTestPeer::PENYELENGGARA)) {
            $modifiedColumns[':p' . $index++]  = '"penyelenggara"';
        }
        if ($this->isColumnModified(NilaiTestPeer::TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"tahun"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR)) {
            $modifiedColumns[':p' . $index++]  = '"skor"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR1)) {
            $modifiedColumns[':p' . $index++]  = '"skor1"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR2)) {
            $modifiedColumns[':p' . $index++]  = '"skor2"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR3)) {
            $modifiedColumns[':p' . $index++]  = '"skor3"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR4)) {
            $modifiedColumns[':p' . $index++]  = '"skor4"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SKOR5)) {
            $modifiedColumns[':p' . $index++]  = '"skor5"';
        }
        if ($this->isColumnModified(NilaiTestPeer::NOMOR_PESERTA)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_peserta"';
        }
        if ($this->isColumnModified(NilaiTestPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(NilaiTestPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(NilaiTestPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(NilaiTestPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(NilaiTestPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(NilaiTestPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "nilai_test" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"nilai_test_id"':						
                        $stmt->bindValue($identifier, $this->nilai_test_id, PDO::PARAM_STR);
                        break;
                    case '"jenis_test_id"':						
                        $stmt->bindValue($identifier, $this->jenis_test_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"penyelenggara"':						
                        $stmt->bindValue($identifier, $this->penyelenggara, PDO::PARAM_STR);
                        break;
                    case '"tahun"':						
                        $stmt->bindValue($identifier, $this->tahun, PDO::PARAM_STR);
                        break;
                    case '"skor"':						
                        $stmt->bindValue($identifier, $this->skor, PDO::PARAM_STR);
                        break;
                    case '"skor1"':						
                        $stmt->bindValue($identifier, $this->skor1, PDO::PARAM_STR);
                        break;
                    case '"skor2"':						
                        $stmt->bindValue($identifier, $this->skor2, PDO::PARAM_STR);
                        break;
                    case '"skor3"':						
                        $stmt->bindValue($identifier, $this->skor3, PDO::PARAM_STR);
                        break;
                    case '"skor4"':						
                        $stmt->bindValue($identifier, $this->skor4, PDO::PARAM_STR);
                        break;
                    case '"skor5"':						
                        $stmt->bindValue($identifier, $this->skor5, PDO::PARAM_STR);
                        break;
                    case '"nomor_peserta"':						
                        $stmt->bindValue($identifier, $this->nomor_peserta, PDO::PARAM_STR);
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

            if ($this->aJenisTest !== null) {
                if (!$this->aJenisTest->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisTest->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }


            if (($retval = NilaiTestPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldNilaiTests !== null) {
                    foreach ($this->collVldNilaiTests as $referrerFK) {
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
        $pos = NilaiTestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getNilaiTestId();
                break;
            case 1:
                return $this->getJenisTestId();
                break;
            case 2:
                return $this->getPtkId();
                break;
            case 3:
                return $this->getNama();
                break;
            case 4:
                return $this->getPenyelenggara();
                break;
            case 5:
                return $this->getTahun();
                break;
            case 6:
                return $this->getSkor();
                break;
            case 7:
                return $this->getSkor1();
                break;
            case 8:
                return $this->getSkor2();
                break;
            case 9:
                return $this->getSkor3();
                break;
            case 10:
                return $this->getSkor4();
                break;
            case 11:
                return $this->getSkor5();
                break;
            case 12:
                return $this->getNomorPeserta();
                break;
            case 13:
                return $this->getAsalData();
                break;
            case 14:
                return $this->getCreateDate();
                break;
            case 15:
                return $this->getLastUpdate();
                break;
            case 16:
                return $this->getSoftDelete();
                break;
            case 17:
                return $this->getLastSync();
                break;
            case 18:
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
        if (isset($alreadyDumpedObjects['NilaiTest'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['NilaiTest'][$this->getPrimaryKey()] = true;
        $keys = NilaiTestPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getNilaiTestId(),
            $keys[1] => $this->getJenisTestId(),
            $keys[2] => $this->getPtkId(),
            $keys[3] => $this->getNama(),
            $keys[4] => $this->getPenyelenggara(),
            $keys[5] => $this->getTahun(),
            $keys[6] => $this->getSkor(),
            $keys[7] => $this->getSkor1(),
            $keys[8] => $this->getSkor2(),
            $keys[9] => $this->getSkor3(),
            $keys[10] => $this->getSkor4(),
            $keys[11] => $this->getSkor5(),
            $keys[12] => $this->getNomorPeserta(),
            $keys[13] => $this->getAsalData(),
            $keys[14] => $this->getCreateDate(),
            $keys[15] => $this->getLastUpdate(),
            $keys[16] => $this->getSoftDelete(),
            $keys[17] => $this->getLastSync(),
            $keys[18] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aJenisTest) {
                $result['JenisTest'] = $this->aJenisTest->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldNilaiTests) {
                $result['VldNilaiTests'] = $this->collVldNilaiTests->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = NilaiTestPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setNilaiTestId($value);
                break;
            case 1:
                $this->setJenisTestId($value);
                break;
            case 2:
                $this->setPtkId($value);
                break;
            case 3:
                $this->setNama($value);
                break;
            case 4:
                $this->setPenyelenggara($value);
                break;
            case 5:
                $this->setTahun($value);
                break;
            case 6:
                $this->setSkor($value);
                break;
            case 7:
                $this->setSkor1($value);
                break;
            case 8:
                $this->setSkor2($value);
                break;
            case 9:
                $this->setSkor3($value);
                break;
            case 10:
                $this->setSkor4($value);
                break;
            case 11:
                $this->setSkor5($value);
                break;
            case 12:
                $this->setNomorPeserta($value);
                break;
            case 13:
                $this->setAsalData($value);
                break;
            case 14:
                $this->setCreateDate($value);
                break;
            case 15:
                $this->setLastUpdate($value);
                break;
            case 16:
                $this->setSoftDelete($value);
                break;
            case 17:
                $this->setLastSync($value);
                break;
            case 18:
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
        $keys = NilaiTestPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setNilaiTestId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setJenisTestId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setPtkId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNama($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPenyelenggara($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setTahun($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setSkor($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setSkor1($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setSkor2($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setSkor3($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setSkor4($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setSkor5($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setNomorPeserta($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setAsalData($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setCreateDate($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setLastUpdate($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setSoftDelete($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setLastSync($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setUpdaterId($arr[$keys[18]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(NilaiTestPeer::DATABASE_NAME);

        if ($this->isColumnModified(NilaiTestPeer::NILAI_TEST_ID)) $criteria->add(NilaiTestPeer::NILAI_TEST_ID, $this->nilai_test_id);
        if ($this->isColumnModified(NilaiTestPeer::JENIS_TEST_ID)) $criteria->add(NilaiTestPeer::JENIS_TEST_ID, $this->jenis_test_id);
        if ($this->isColumnModified(NilaiTestPeer::PTK_ID)) $criteria->add(NilaiTestPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(NilaiTestPeer::NAMA)) $criteria->add(NilaiTestPeer::NAMA, $this->nama);
        if ($this->isColumnModified(NilaiTestPeer::PENYELENGGARA)) $criteria->add(NilaiTestPeer::PENYELENGGARA, $this->penyelenggara);
        if ($this->isColumnModified(NilaiTestPeer::TAHUN)) $criteria->add(NilaiTestPeer::TAHUN, $this->tahun);
        if ($this->isColumnModified(NilaiTestPeer::SKOR)) $criteria->add(NilaiTestPeer::SKOR, $this->skor);
        if ($this->isColumnModified(NilaiTestPeer::SKOR1)) $criteria->add(NilaiTestPeer::SKOR1, $this->skor1);
        if ($this->isColumnModified(NilaiTestPeer::SKOR2)) $criteria->add(NilaiTestPeer::SKOR2, $this->skor2);
        if ($this->isColumnModified(NilaiTestPeer::SKOR3)) $criteria->add(NilaiTestPeer::SKOR3, $this->skor3);
        if ($this->isColumnModified(NilaiTestPeer::SKOR4)) $criteria->add(NilaiTestPeer::SKOR4, $this->skor4);
        if ($this->isColumnModified(NilaiTestPeer::SKOR5)) $criteria->add(NilaiTestPeer::SKOR5, $this->skor5);
        if ($this->isColumnModified(NilaiTestPeer::NOMOR_PESERTA)) $criteria->add(NilaiTestPeer::NOMOR_PESERTA, $this->nomor_peserta);
        if ($this->isColumnModified(NilaiTestPeer::ASAL_DATA)) $criteria->add(NilaiTestPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(NilaiTestPeer::CREATE_DATE)) $criteria->add(NilaiTestPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(NilaiTestPeer::LAST_UPDATE)) $criteria->add(NilaiTestPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(NilaiTestPeer::SOFT_DELETE)) $criteria->add(NilaiTestPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(NilaiTestPeer::LAST_SYNC)) $criteria->add(NilaiTestPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(NilaiTestPeer::UPDATER_ID)) $criteria->add(NilaiTestPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(NilaiTestPeer::DATABASE_NAME);
        $criteria->add(NilaiTestPeer::NILAI_TEST_ID, $this->nilai_test_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getNilaiTestId();
    }

    /**
     * Generic method to set the primary key (nilai_test_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setNilaiTestId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getNilaiTestId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of NilaiTest (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setJenisTestId($this->getJenisTestId());
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setNama($this->getNama());
        $copyObj->setPenyelenggara($this->getPenyelenggara());
        $copyObj->setTahun($this->getTahun());
        $copyObj->setSkor($this->getSkor());
        $copyObj->setSkor1($this->getSkor1());
        $copyObj->setSkor2($this->getSkor2());
        $copyObj->setSkor3($this->getSkor3());
        $copyObj->setSkor4($this->getSkor4());
        $copyObj->setSkor5($this->getSkor5());
        $copyObj->setNomorPeserta($this->getNomorPeserta());
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

            foreach ($this->getVldNilaiTests() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldNilaiTest($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setNilaiTestId(NULL); // this is a auto-increment column, so set to default value
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
     * @return NilaiTest Clone of current object.
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
     * @return NilaiTestPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new NilaiTestPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a JenisTest object.
     *
     * @param             JenisTest $v
     * @return NilaiTest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisTest(JenisTest $v = null)
    {
        if ($v === null) {
            $this->setJenisTestId(NULL);
        } else {
            $this->setJenisTestId($v->getJenisTestId());
        }

        $this->aJenisTest = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisTest object, it will not be re-added.
        if ($v !== null) {
            $v->addNilaiTest($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisTest object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisTest The associated JenisTest object.
     * @throws PropelException
     */
    public function getJenisTest(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisTest === null && (($this->jenis_test_id !== "" && $this->jenis_test_id !== null)) && $doQuery) {
            $this->aJenisTest = JenisTestQuery::create()->findPk($this->jenis_test_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisTest->addNilaiTests($this);
             */
        }

        return $this->aJenisTest;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return NilaiTest The current object (for fluent API support)
     * @throws PropelException
     */
    public function setPtk(Ptk $v = null)
    {
        if ($v === null) {
            $this->setPtkId(NULL);
        } else {
            $this->setPtkId($v->getPtkId());
        }

        $this->aPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ptk object, it will not be re-added.
        if ($v !== null) {
            $v->addNilaiTest($this);
        }


        return $this;
    }


    /**
     * Get the associated Ptk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ptk The associated Ptk object.
     * @throws PropelException
     */
    public function getPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aPtk === null && (($this->ptk_id !== "" && $this->ptk_id !== null)) && $doQuery) {
            $this->aPtk = PtkQuery::create()->findPk($this->ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aPtk->addNilaiTests($this);
             */
        }

        return $this->aPtk;
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
        if ('VldNilaiTest' == $relationName) {
            $this->initVldNilaiTests();
        }
    }

    /**
     * Clears out the collVldNilaiTests collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return NilaiTest The current object (for fluent API support)
     * @see        addVldNilaiTests()
     */
    public function clearVldNilaiTests()
    {
        $this->collVldNilaiTests = null; // important to set this to null since that means it is uninitialized
        $this->collVldNilaiTestsPartial = null;

        return $this;
    }

    /**
     * reset is the collVldNilaiTests collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldNilaiTests($v = true)
    {
        $this->collVldNilaiTestsPartial = $v;
    }

    /**
     * Initializes the collVldNilaiTests collection.
     *
     * By default this just sets the collVldNilaiTests collection to an empty array (like clearcollVldNilaiTests());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldNilaiTests($overrideExisting = true)
    {
        if (null !== $this->collVldNilaiTests && !$overrideExisting) {
            return;
        }
        $this->collVldNilaiTests = new PropelObjectCollection();
        $this->collVldNilaiTests->setModel('VldNilaiTest');
    }

    /**
     * Gets an array of VldNilaiTest objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this NilaiTest is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldNilaiTest[] List of VldNilaiTest objects
     * @throws PropelException
     */
    public function getVldNilaiTests($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiTestsPartial && !$this->isNew();
        if (null === $this->collVldNilaiTests || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiTests) {
                // return empty collection
                $this->initVldNilaiTests();
            } else {
                $collVldNilaiTests = VldNilaiTestQuery::create(null, $criteria)
                    ->filterByNilaiTest($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldNilaiTestsPartial && count($collVldNilaiTests)) {
                      $this->initVldNilaiTests(false);

                      foreach($collVldNilaiTests as $obj) {
                        if (false == $this->collVldNilaiTests->contains($obj)) {
                          $this->collVldNilaiTests->append($obj);
                        }
                      }

                      $this->collVldNilaiTestsPartial = true;
                    }

                    $collVldNilaiTests->getInternalIterator()->rewind();
                    return $collVldNilaiTests;
                }

                if($partial && $this->collVldNilaiTests) {
                    foreach($this->collVldNilaiTests as $obj) {
                        if($obj->isNew()) {
                            $collVldNilaiTests[] = $obj;
                        }
                    }
                }

                $this->collVldNilaiTests = $collVldNilaiTests;
                $this->collVldNilaiTestsPartial = false;
            }
        }

        return $this->collVldNilaiTests;
    }

    /**
     * Sets a collection of VldNilaiTest objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldNilaiTests A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return NilaiTest The current object (for fluent API support)
     */
    public function setVldNilaiTests(PropelCollection $vldNilaiTests, PropelPDO $con = null)
    {
        $vldNilaiTestsToDelete = $this->getVldNilaiTests(new Criteria(), $con)->diff($vldNilaiTests);

        $this->vldNilaiTestsScheduledForDeletion = unserialize(serialize($vldNilaiTestsToDelete));

        foreach ($vldNilaiTestsToDelete as $vldNilaiTestRemoved) {
            $vldNilaiTestRemoved->setNilaiTest(null);
        }

        $this->collVldNilaiTests = null;
        foreach ($vldNilaiTests as $vldNilaiTest) {
            $this->addVldNilaiTest($vldNilaiTest);
        }

        $this->collVldNilaiTests = $vldNilaiTests;
        $this->collVldNilaiTestsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldNilaiTest objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldNilaiTest objects.
     * @throws PropelException
     */
    public function countVldNilaiTests(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldNilaiTestsPartial && !$this->isNew();
        if (null === $this->collVldNilaiTests || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldNilaiTests) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldNilaiTests());
            }
            $query = VldNilaiTestQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByNilaiTest($this)
                ->count($con);
        }

        return count($this->collVldNilaiTests);
    }

    /**
     * Method called to associate a VldNilaiTest object to this object
     * through the VldNilaiTest foreign key attribute.
     *
     * @param    VldNilaiTest $l VldNilaiTest
     * @return NilaiTest The current object (for fluent API support)
     */
    public function addVldNilaiTest(VldNilaiTest $l)
    {
        if ($this->collVldNilaiTests === null) {
            $this->initVldNilaiTests();
            $this->collVldNilaiTestsPartial = true;
        }
        if (!in_array($l, $this->collVldNilaiTests->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldNilaiTest($l);
        }

        return $this;
    }

    /**
     * @param	VldNilaiTest $vldNilaiTest The vldNilaiTest object to add.
     */
    protected function doAddVldNilaiTest($vldNilaiTest)
    {
        $this->collVldNilaiTests[]= $vldNilaiTest;
        $vldNilaiTest->setNilaiTest($this);
    }

    /**
     * @param	VldNilaiTest $vldNilaiTest The vldNilaiTest object to remove.
     * @return NilaiTest The current object (for fluent API support)
     */
    public function removeVldNilaiTest($vldNilaiTest)
    {
        if ($this->getVldNilaiTests()->contains($vldNilaiTest)) {
            $this->collVldNilaiTests->remove($this->collVldNilaiTests->search($vldNilaiTest));
            if (null === $this->vldNilaiTestsScheduledForDeletion) {
                $this->vldNilaiTestsScheduledForDeletion = clone $this->collVldNilaiTests;
                $this->vldNilaiTestsScheduledForDeletion->clear();
            }
            $this->vldNilaiTestsScheduledForDeletion[]= clone $vldNilaiTest;
            $vldNilaiTest->setNilaiTest(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this NilaiTest is new, it will return
     * an empty collection; or if this NilaiTest has previously
     * been saved, it will retrieve related VldNilaiTests from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in NilaiTest.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldNilaiTest[] List of VldNilaiTest objects
     */
    public function getVldNilaiTestsJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldNilaiTestQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldNilaiTests($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->nilai_test_id = null;
        $this->jenis_test_id = null;
        $this->ptk_id = null;
        $this->nama = null;
        $this->penyelenggara = null;
        $this->tahun = null;
        $this->skor = null;
        $this->skor1 = null;
        $this->skor2 = null;
        $this->skor3 = null;
        $this->skor4 = null;
        $this->skor5 = null;
        $this->nomor_peserta = null;
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
            if ($this->collVldNilaiTests) {
                foreach ($this->collVldNilaiTests as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aJenisTest instanceof Persistent) {
              $this->aJenisTest->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldNilaiTests instanceof PropelCollection) {
            $this->collVldNilaiTests->clearIterator();
        }
        $this->collVldNilaiTests = null;
        $this->aJenisTest = null;
        $this->aPtk = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(NilaiTestPeer::DEFAULT_STRING_FORMAT);
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
