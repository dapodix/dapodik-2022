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
use DataDikdas\Model\JabatanTugasPtkQuery;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\Ruang;
use DataDikdas\Model\RuangQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\TugasTambahanPeer;
use DataDikdas\Model\TugasTambahanQuery;
use DataDikdas\Model\VldTugasTambahan;
use DataDikdas\Model\VldTugasTambahanQuery;

/**
 * Base class that represents a row from the 'tugas_tambahan' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseTugasTambahan extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\TugasTambahanPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        TugasTambahanPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the ptk_tugas_tambahan_id field.
     * @var        string
     */
    protected $ptk_tugas_tambahan_id;

    /**
     * The value for the ptk_id field.
     * @var        string
     */
    protected $ptk_id;

    /**
     * The value for the id_ruang field.
     * @var        string
     */
    protected $id_ruang;

    /**
     * The value for the jabatan_ptk_id field.
     * @var        string
     */
    protected $jabatan_ptk_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the jumlah_jam field.
     * @var        string
     */
    protected $jumlah_jam;

    /**
     * The value for the nomor_sk field.
     * @var        string
     */
    protected $nomor_sk;

    /**
     * The value for the tmt_tambahan field.
     * @var        string
     */
    protected $tmt_tambahan;

    /**
     * The value for the tst_tambahan field.
     * @var        string
     */
    protected $tst_tambahan;

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
     * @var        Ruang
     */
    protected $aRuang;

    /**
     * @var        JabatanTugasPtk
     */
    protected $aJabatanTugasPtk;

    /**
     * @var        Ptk
     */
    protected $aPtk;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|VldTugasTambahan[] Collection to store aggregation of VldTugasTambahan objects.
     */
    protected $collVldTugasTambahans;
    protected $collVldTugasTambahansPartial;

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
    protected $vldTugasTambahansScheduledForDeletion = null;

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
     * Initializes internal state of BaseTugasTambahan object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [ptk_tugas_tambahan_id] column value.
     * 
     * @return string
     */
    public function getPtkTugasTambahanId()
    {
        return $this->ptk_tugas_tambahan_id;
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
     * Get the [id_ruang] column value.
     * 
     * @return string
     */
    public function getIdRuang()
    {
        return $this->id_ruang;
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
     * Get the [sekolah_id] column value.
     * 
     * @return string
     */
    public function getSekolahId()
    {
        return $this->sekolah_id;
    }

    /**
     * Get the [jumlah_jam] column value.
     * 
     * @return string
     */
    public function getJumlahJam()
    {
        return $this->jumlah_jam;
    }

    /**
     * Get the [nomor_sk] column value.
     * 
     * @return string
     */
    public function getNomorSk()
    {
        return $this->nomor_sk;
    }

    /**
     * Get the [optionally formatted] temporal [tmt_tambahan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTmtTambahan($format = '%Y-%m-%d')
    {
        if ($this->tmt_tambahan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tmt_tambahan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tmt_tambahan, true), $x);
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
     * Get the [optionally formatted] temporal [tst_tambahan] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getTstTambahan($format = '%Y-%m-%d')
    {
        if ($this->tst_tambahan === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->tst_tambahan);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->tst_tambahan, true), $x);
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
     * Set the value of [ptk_tugas_tambahan_id] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setPtkTugasTambahanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_tugas_tambahan_id !== $v) {
            $this->ptk_tugas_tambahan_id = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID;
        }


        return $this;
    } // setPtkTugasTambahanId()

    /**
     * Set the value of [ptk_id] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ptk_id !== $v) {
            $this->ptk_id = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::PTK_ID;
        }

        if ($this->aPtk !== null && $this->aPtk->getPtkId() !== $v) {
            $this->aPtk = null;
        }


        return $this;
    } // setPtkId()

    /**
     * Set the value of [id_ruang] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setIdRuang($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_ruang !== $v) {
            $this->id_ruang = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::ID_RUANG;
        }

        if ($this->aRuang !== null && $this->aRuang->getIdRuang() !== $v) {
            $this->aRuang = null;
        }


        return $this;
    } // setIdRuang()

    /**
     * Set the value of [jabatan_ptk_id] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setJabatanPtkId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jabatan_ptk_id !== $v) {
            $this->jabatan_ptk_id = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::JABATAN_PTK_ID;
        }

        if ($this->aJabatanTugasPtk !== null && $this->aJabatanTugasPtk->getJabatanPtkId() !== $v) {
            $this->aJabatanTugasPtk = null;
        }


        return $this;
    } // setJabatanPtkId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [jumlah_jam] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setJumlahJam($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jumlah_jam !== $v) {
            $this->jumlah_jam = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::JUMLAH_JAM;
        }


        return $this;
    } // setJumlahJam()

    /**
     * Set the value of [nomor_sk] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setNomorSk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nomor_sk !== $v) {
            $this->nomor_sk = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::NOMOR_SK;
        }


        return $this;
    } // setNomorSk()

    /**
     * Sets the value of [tmt_tambahan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setTmtTambahan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tmt_tambahan !== null || $dt !== null) {
            $currentDateAsString = ($this->tmt_tambahan !== null && $tmpDt = new DateTime($this->tmt_tambahan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tmt_tambahan = $newDateAsString;
                $this->modifiedColumns[] = TugasTambahanPeer::TMT_TAMBAHAN;
            }
        } // if either are not null


        return $this;
    } // setTmtTambahan()

    /**
     * Sets the value of [tst_tambahan] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setTstTambahan($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->tst_tambahan !== null || $dt !== null) {
            $currentDateAsString = ($this->tst_tambahan !== null && $tmpDt = new DateTime($this->tst_tambahan)) ? $tmpDt->format('Y-m-d') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->tst_tambahan = $newDateAsString;
                $this->modifiedColumns[] = TugasTambahanPeer::TST_TAMBAHAN;
            }
        } // if either are not null


        return $this;
    } // setTstTambahan()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = TugasTambahanPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = TugasTambahanPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return TugasTambahan The current object (for fluent API support)
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
                $this->modifiedColumns[] = TugasTambahanPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = TugasTambahanPeer::UPDATER_ID;
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

            $this->ptk_tugas_tambahan_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->ptk_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_ruang = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jabatan_ptk_id = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->sekolah_id = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->jumlah_jam = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->nomor_sk = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->tmt_tambahan = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->tst_tambahan = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
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
            return $startcol + 14; // 14 = TugasTambahanPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating TugasTambahan object", $e);
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

        if ($this->aPtk !== null && $this->ptk_id !== $this->aPtk->getPtkId()) {
            $this->aPtk = null;
        }
        if ($this->aRuang !== null && $this->id_ruang !== $this->aRuang->getIdRuang()) {
            $this->aRuang = null;
        }
        if ($this->aJabatanTugasPtk !== null && $this->jabatan_ptk_id !== $this->aJabatanTugasPtk->getJabatanPtkId()) {
            $this->aJabatanTugasPtk = null;
        }
        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
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
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = TugasTambahanPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aRuang = null;
            $this->aJabatanTugasPtk = null;
            $this->aPtk = null;
            $this->aSekolah = null;
            $this->collVldTugasTambahans = null;

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
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = TugasTambahanQuery::create()
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
            $con = Propel::getConnection(TugasTambahanPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                TugasTambahanPeer::addInstanceToPool($this);
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

            if ($this->aRuang !== null) {
                if ($this->aRuang->isModified() || $this->aRuang->isNew()) {
                    $affectedRows += $this->aRuang->save($con);
                }
                $this->setRuang($this->aRuang);
            }

            if ($this->aJabatanTugasPtk !== null) {
                if ($this->aJabatanTugasPtk->isModified() || $this->aJabatanTugasPtk->isNew()) {
                    $affectedRows += $this->aJabatanTugasPtk->save($con);
                }
                $this->setJabatanTugasPtk($this->aJabatanTugasPtk);
            }

            if ($this->aPtk !== null) {
                if ($this->aPtk->isModified() || $this->aPtk->isNew()) {
                    $affectedRows += $this->aPtk->save($con);
                }
                $this->setPtk($this->aPtk);
            }

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
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

            if ($this->vldTugasTambahansScheduledForDeletion !== null) {
                if (!$this->vldTugasTambahansScheduledForDeletion->isEmpty()) {
                    VldTugasTambahanQuery::create()
                        ->filterByPrimaryKeys($this->vldTugasTambahansScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->vldTugasTambahansScheduledForDeletion = null;
                }
            }

            if ($this->collVldTugasTambahans !== null) {
                foreach ($this->collVldTugasTambahans as $referrerFK) {
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
        if ($this->isColumnModified(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_tugas_tambahan_id"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ptk_id"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::ID_RUANG)) {
            $modifiedColumns[':p' . $index++]  = '"id_ruang"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::JABATAN_PTK_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jabatan_ptk_id"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::JUMLAH_JAM)) {
            $modifiedColumns[':p' . $index++]  = '"jumlah_jam"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::NOMOR_SK)) {
            $modifiedColumns[':p' . $index++]  = '"nomor_sk"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::TMT_TAMBAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"tmt_tambahan"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::TST_TAMBAHAN)) {
            $modifiedColumns[':p' . $index++]  = '"tst_tambahan"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(TugasTambahanPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "tugas_tambahan" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"ptk_tugas_tambahan_id"':						
                        $stmt->bindValue($identifier, $this->ptk_tugas_tambahan_id, PDO::PARAM_STR);
                        break;
                    case '"ptk_id"':						
                        $stmt->bindValue($identifier, $this->ptk_id, PDO::PARAM_STR);
                        break;
                    case '"id_ruang"':						
                        $stmt->bindValue($identifier, $this->id_ruang, PDO::PARAM_STR);
                        break;
                    case '"jabatan_ptk_id"':						
                        $stmt->bindValue($identifier, $this->jabatan_ptk_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"jumlah_jam"':						
                        $stmt->bindValue($identifier, $this->jumlah_jam, PDO::PARAM_STR);
                        break;
                    case '"nomor_sk"':						
                        $stmt->bindValue($identifier, $this->nomor_sk, PDO::PARAM_STR);
                        break;
                    case '"tmt_tambahan"':						
                        $stmt->bindValue($identifier, $this->tmt_tambahan, PDO::PARAM_STR);
                        break;
                    case '"tst_tambahan"':						
                        $stmt->bindValue($identifier, $this->tst_tambahan, PDO::PARAM_STR);
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

            if ($this->aRuang !== null) {
                if (!$this->aRuang->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aRuang->getValidationFailures());
                }
            }

            if ($this->aJabatanTugasPtk !== null) {
                if (!$this->aJabatanTugasPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJabatanTugasPtk->getValidationFailures());
                }
            }

            if ($this->aPtk !== null) {
                if (!$this->aPtk->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aPtk->getValidationFailures());
                }
            }

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = TugasTambahanPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collVldTugasTambahans !== null) {
                    foreach ($this->collVldTugasTambahans as $referrerFK) {
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
        $pos = TugasTambahanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getPtkTugasTambahanId();
                break;
            case 1:
                return $this->getPtkId();
                break;
            case 2:
                return $this->getIdRuang();
                break;
            case 3:
                return $this->getJabatanPtkId();
                break;
            case 4:
                return $this->getSekolahId();
                break;
            case 5:
                return $this->getJumlahJam();
                break;
            case 6:
                return $this->getNomorSk();
                break;
            case 7:
                return $this->getTmtTambahan();
                break;
            case 8:
                return $this->getTstTambahan();
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
        if (isset($alreadyDumpedObjects['TugasTambahan'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['TugasTambahan'][$this->getPrimaryKey()] = true;
        $keys = TugasTambahanPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getPtkTugasTambahanId(),
            $keys[1] => $this->getPtkId(),
            $keys[2] => $this->getIdRuang(),
            $keys[3] => $this->getJabatanPtkId(),
            $keys[4] => $this->getSekolahId(),
            $keys[5] => $this->getJumlahJam(),
            $keys[6] => $this->getNomorSk(),
            $keys[7] => $this->getTmtTambahan(),
            $keys[8] => $this->getTstTambahan(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getSoftDelete(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aRuang) {
                $result['Ruang'] = $this->aRuang->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJabatanTugasPtk) {
                $result['JabatanTugasPtk'] = $this->aJabatanTugasPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aPtk) {
                $result['Ptk'] = $this->aPtk->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collVldTugasTambahans) {
                $result['VldTugasTambahans'] = $this->collVldTugasTambahans->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = TugasTambahanPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setPtkTugasTambahanId($value);
                break;
            case 1:
                $this->setPtkId($value);
                break;
            case 2:
                $this->setIdRuang($value);
                break;
            case 3:
                $this->setJabatanPtkId($value);
                break;
            case 4:
                $this->setSekolahId($value);
                break;
            case 5:
                $this->setJumlahJam($value);
                break;
            case 6:
                $this->setNomorSk($value);
                break;
            case 7:
                $this->setTmtTambahan($value);
                break;
            case 8:
                $this->setTstTambahan($value);
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
        $keys = TugasTambahanPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setPtkTugasTambahanId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setPtkId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdRuang($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJabatanPtkId($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setSekolahId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setJumlahJam($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setNomorSk($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setTmtTambahan($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setTstTambahan($arr[$keys[8]]);
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
        $criteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);

        if ($this->isColumnModified(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID)) $criteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $this->ptk_tugas_tambahan_id);
        if ($this->isColumnModified(TugasTambahanPeer::PTK_ID)) $criteria->add(TugasTambahanPeer::PTK_ID, $this->ptk_id);
        if ($this->isColumnModified(TugasTambahanPeer::ID_RUANG)) $criteria->add(TugasTambahanPeer::ID_RUANG, $this->id_ruang);
        if ($this->isColumnModified(TugasTambahanPeer::JABATAN_PTK_ID)) $criteria->add(TugasTambahanPeer::JABATAN_PTK_ID, $this->jabatan_ptk_id);
        if ($this->isColumnModified(TugasTambahanPeer::SEKOLAH_ID)) $criteria->add(TugasTambahanPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(TugasTambahanPeer::JUMLAH_JAM)) $criteria->add(TugasTambahanPeer::JUMLAH_JAM, $this->jumlah_jam);
        if ($this->isColumnModified(TugasTambahanPeer::NOMOR_SK)) $criteria->add(TugasTambahanPeer::NOMOR_SK, $this->nomor_sk);
        if ($this->isColumnModified(TugasTambahanPeer::TMT_TAMBAHAN)) $criteria->add(TugasTambahanPeer::TMT_TAMBAHAN, $this->tmt_tambahan);
        if ($this->isColumnModified(TugasTambahanPeer::TST_TAMBAHAN)) $criteria->add(TugasTambahanPeer::TST_TAMBAHAN, $this->tst_tambahan);
        if ($this->isColumnModified(TugasTambahanPeer::CREATE_DATE)) $criteria->add(TugasTambahanPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(TugasTambahanPeer::LAST_UPDATE)) $criteria->add(TugasTambahanPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(TugasTambahanPeer::SOFT_DELETE)) $criteria->add(TugasTambahanPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(TugasTambahanPeer::LAST_SYNC)) $criteria->add(TugasTambahanPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(TugasTambahanPeer::UPDATER_ID)) $criteria->add(TugasTambahanPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(TugasTambahanPeer::DATABASE_NAME);
        $criteria->add(TugasTambahanPeer::PTK_TUGAS_TAMBAHAN_ID, $this->ptk_tugas_tambahan_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getPtkTugasTambahanId();
    }

    /**
     * Generic method to set the primary key (ptk_tugas_tambahan_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setPtkTugasTambahanId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getPtkTugasTambahanId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of TugasTambahan (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setPtkId($this->getPtkId());
        $copyObj->setIdRuang($this->getIdRuang());
        $copyObj->setJabatanPtkId($this->getJabatanPtkId());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setJumlahJam($this->getJumlahJam());
        $copyObj->setNomorSk($this->getNomorSk());
        $copyObj->setTmtTambahan($this->getTmtTambahan());
        $copyObj->setTstTambahan($this->getTstTambahan());
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

            foreach ($this->getVldTugasTambahans() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addVldTugasTambahan($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setPtkTugasTambahanId(NULL); // this is a auto-increment column, so set to default value
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
     * @return TugasTambahan Clone of current object.
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
     * @return TugasTambahanPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new TugasTambahanPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Ruang object.
     *
     * @param             Ruang $v
     * @return TugasTambahan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setRuang(Ruang $v = null)
    {
        if ($v === null) {
            $this->setIdRuang(NULL);
        } else {
            $this->setIdRuang($v->getIdRuang());
        }

        $this->aRuang = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Ruang object, it will not be re-added.
        if ($v !== null) {
            $v->addTugasTambahan($this);
        }


        return $this;
    }


    /**
     * Get the associated Ruang object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Ruang The associated Ruang object.
     * @throws PropelException
     */
    public function getRuang(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aRuang === null && (($this->id_ruang !== "" && $this->id_ruang !== null)) && $doQuery) {
            $this->aRuang = RuangQuery::create()->findPk($this->id_ruang, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aRuang->addTugasTambahans($this);
             */
        }

        return $this->aRuang;
    }

    /**
     * Declares an association between this object and a JabatanTugasPtk object.
     *
     * @param             JabatanTugasPtk $v
     * @return TugasTambahan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJabatanTugasPtk(JabatanTugasPtk $v = null)
    {
        if ($v === null) {
            $this->setJabatanPtkId(NULL);
        } else {
            $this->setJabatanPtkId($v->getJabatanPtkId());
        }

        $this->aJabatanTugasPtk = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JabatanTugasPtk object, it will not be re-added.
        if ($v !== null) {
            $v->addTugasTambahan($this);
        }


        return $this;
    }


    /**
     * Get the associated JabatanTugasPtk object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JabatanTugasPtk The associated JabatanTugasPtk object.
     * @throws PropelException
     */
    public function getJabatanTugasPtk(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJabatanTugasPtk === null && (($this->jabatan_ptk_id !== "" && $this->jabatan_ptk_id !== null)) && $doQuery) {
            $this->aJabatanTugasPtk = JabatanTugasPtkQuery::create()->findPk($this->jabatan_ptk_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJabatanTugasPtk->addTugasTambahans($this);
             */
        }

        return $this->aJabatanTugasPtk;
    }

    /**
     * Declares an association between this object and a Ptk object.
     *
     * @param             Ptk $v
     * @return TugasTambahan The current object (for fluent API support)
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
            $v->addTugasTambahan($this);
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
                $this->aPtk->addTugasTambahans($this);
             */
        }

        return $this->aPtk;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return TugasTambahan The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSekolah(Sekolah $v = null)
    {
        if ($v === null) {
            $this->setSekolahId(NULL);
        } else {
            $this->setSekolahId($v->getSekolahId());
        }

        $this->aSekolah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Sekolah object, it will not be re-added.
        if ($v !== null) {
            $v->addTugasTambahan($this);
        }


        return $this;
    }


    /**
     * Get the associated Sekolah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Sekolah The associated Sekolah object.
     * @throws PropelException
     */
    public function getSekolah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSekolah === null && (($this->sekolah_id !== "" && $this->sekolah_id !== null)) && $doQuery) {
            $this->aSekolah = SekolahQuery::create()->findPk($this->sekolah_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSekolah->addTugasTambahans($this);
             */
        }

        return $this->aSekolah;
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
        if ('VldTugasTambahan' == $relationName) {
            $this->initVldTugasTambahans();
        }
    }

    /**
     * Clears out the collVldTugasTambahans collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return TugasTambahan The current object (for fluent API support)
     * @see        addVldTugasTambahans()
     */
    public function clearVldTugasTambahans()
    {
        $this->collVldTugasTambahans = null; // important to set this to null since that means it is uninitialized
        $this->collVldTugasTambahansPartial = null;

        return $this;
    }

    /**
     * reset is the collVldTugasTambahans collection loaded partially
     *
     * @return void
     */
    public function resetPartialVldTugasTambahans($v = true)
    {
        $this->collVldTugasTambahansPartial = $v;
    }

    /**
     * Initializes the collVldTugasTambahans collection.
     *
     * By default this just sets the collVldTugasTambahans collection to an empty array (like clearcollVldTugasTambahans());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initVldTugasTambahans($overrideExisting = true)
    {
        if (null !== $this->collVldTugasTambahans && !$overrideExisting) {
            return;
        }
        $this->collVldTugasTambahans = new PropelObjectCollection();
        $this->collVldTugasTambahans->setModel('VldTugasTambahan');
    }

    /**
     * Gets an array of VldTugasTambahan objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this TugasTambahan is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|VldTugasTambahan[] List of VldTugasTambahan objects
     * @throws PropelException
     */
    public function getVldTugasTambahans($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collVldTugasTambahansPartial && !$this->isNew();
        if (null === $this->collVldTugasTambahans || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collVldTugasTambahans) {
                // return empty collection
                $this->initVldTugasTambahans();
            } else {
                $collVldTugasTambahans = VldTugasTambahanQuery::create(null, $criteria)
                    ->filterByTugasTambahan($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collVldTugasTambahansPartial && count($collVldTugasTambahans)) {
                      $this->initVldTugasTambahans(false);

                      foreach($collVldTugasTambahans as $obj) {
                        if (false == $this->collVldTugasTambahans->contains($obj)) {
                          $this->collVldTugasTambahans->append($obj);
                        }
                      }

                      $this->collVldTugasTambahansPartial = true;
                    }

                    $collVldTugasTambahans->getInternalIterator()->rewind();
                    return $collVldTugasTambahans;
                }

                if($partial && $this->collVldTugasTambahans) {
                    foreach($this->collVldTugasTambahans as $obj) {
                        if($obj->isNew()) {
                            $collVldTugasTambahans[] = $obj;
                        }
                    }
                }

                $this->collVldTugasTambahans = $collVldTugasTambahans;
                $this->collVldTugasTambahansPartial = false;
            }
        }

        return $this->collVldTugasTambahans;
    }

    /**
     * Sets a collection of VldTugasTambahan objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $vldTugasTambahans A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function setVldTugasTambahans(PropelCollection $vldTugasTambahans, PropelPDO $con = null)
    {
        $vldTugasTambahansToDelete = $this->getVldTugasTambahans(new Criteria(), $con)->diff($vldTugasTambahans);

        $this->vldTugasTambahansScheduledForDeletion = unserialize(serialize($vldTugasTambahansToDelete));

        foreach ($vldTugasTambahansToDelete as $vldTugasTambahanRemoved) {
            $vldTugasTambahanRemoved->setTugasTambahan(null);
        }

        $this->collVldTugasTambahans = null;
        foreach ($vldTugasTambahans as $vldTugasTambahan) {
            $this->addVldTugasTambahan($vldTugasTambahan);
        }

        $this->collVldTugasTambahans = $vldTugasTambahans;
        $this->collVldTugasTambahansPartial = false;

        return $this;
    }

    /**
     * Returns the number of related VldTugasTambahan objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related VldTugasTambahan objects.
     * @throws PropelException
     */
    public function countVldTugasTambahans(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collVldTugasTambahansPartial && !$this->isNew();
        if (null === $this->collVldTugasTambahans || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collVldTugasTambahans) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getVldTugasTambahans());
            }
            $query = VldTugasTambahanQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByTugasTambahan($this)
                ->count($con);
        }

        return count($this->collVldTugasTambahans);
    }

    /**
     * Method called to associate a VldTugasTambahan object to this object
     * through the VldTugasTambahan foreign key attribute.
     *
     * @param    VldTugasTambahan $l VldTugasTambahan
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function addVldTugasTambahan(VldTugasTambahan $l)
    {
        if ($this->collVldTugasTambahans === null) {
            $this->initVldTugasTambahans();
            $this->collVldTugasTambahansPartial = true;
        }
        if (!in_array($l, $this->collVldTugasTambahans->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddVldTugasTambahan($l);
        }

        return $this;
    }

    /**
     * @param	VldTugasTambahan $vldTugasTambahan The vldTugasTambahan object to add.
     */
    protected function doAddVldTugasTambahan($vldTugasTambahan)
    {
        $this->collVldTugasTambahans[]= $vldTugasTambahan;
        $vldTugasTambahan->setTugasTambahan($this);
    }

    /**
     * @param	VldTugasTambahan $vldTugasTambahan The vldTugasTambahan object to remove.
     * @return TugasTambahan The current object (for fluent API support)
     */
    public function removeVldTugasTambahan($vldTugasTambahan)
    {
        if ($this->getVldTugasTambahans()->contains($vldTugasTambahan)) {
            $this->collVldTugasTambahans->remove($this->collVldTugasTambahans->search($vldTugasTambahan));
            if (null === $this->vldTugasTambahansScheduledForDeletion) {
                $this->vldTugasTambahansScheduledForDeletion = clone $this->collVldTugasTambahans;
                $this->vldTugasTambahansScheduledForDeletion->clear();
            }
            $this->vldTugasTambahansScheduledForDeletion[]= clone $vldTugasTambahan;
            $vldTugasTambahan->setTugasTambahan(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this TugasTambahan is new, it will return
     * an empty collection; or if this TugasTambahan has previously
     * been saved, it will retrieve related VldTugasTambahans from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in TugasTambahan.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|VldTugasTambahan[] List of VldTugasTambahan objects
     */
    public function getVldTugasTambahansJoinErrortype($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = VldTugasTambahanQuery::create(null, $criteria);
        $query->joinWith('Errortype', $join_behavior);

        return $this->getVldTugasTambahans($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->ptk_tugas_tambahan_id = null;
        $this->ptk_id = null;
        $this->id_ruang = null;
        $this->jabatan_ptk_id = null;
        $this->sekolah_id = null;
        $this->jumlah_jam = null;
        $this->nomor_sk = null;
        $this->tmt_tambahan = null;
        $this->tst_tambahan = null;
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
            if ($this->collVldTugasTambahans) {
                foreach ($this->collVldTugasTambahans as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aRuang instanceof Persistent) {
              $this->aRuang->clearAllReferences($deep);
            }
            if ($this->aJabatanTugasPtk instanceof Persistent) {
              $this->aJabatanTugasPtk->clearAllReferences($deep);
            }
            if ($this->aPtk instanceof Persistent) {
              $this->aPtk->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collVldTugasTambahans instanceof PropelCollection) {
            $this->collVldTugasTambahans->clearIterator();
        }
        $this->collVldTugasTambahans = null;
        $this->aRuang = null;
        $this->aJabatanTugasPtk = null;
        $this->aPtk = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(TugasTambahanPeer::DEFAULT_STRING_FORMAT);
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
