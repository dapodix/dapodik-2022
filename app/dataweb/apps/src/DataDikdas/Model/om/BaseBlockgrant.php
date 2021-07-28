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
use DataDikdas\Model\AlatDariBlockgrant;
use DataDikdas\Model\AlatDariBlockgrantQuery;
use DataDikdas\Model\AngkutanDariBlockgrant;
use DataDikdas\Model\AngkutanDariBlockgrantQuery;
use DataDikdas\Model\BangunanDariBlockgrant;
use DataDikdas\Model\BangunanDariBlockgrantQuery;
use DataDikdas\Model\Blockgrant;
use DataDikdas\Model\BlockgrantPeer;
use DataDikdas\Model\BlockgrantQuery;
use DataDikdas\Model\JenisBantuan;
use DataDikdas\Model\JenisBantuanQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\SumberDanaQuery;
use DataDikdas\Model\TanahDariBlockgrant;
use DataDikdas\Model\TanahDariBlockgrantQuery;

/**
 * Base class that represents a row from the 'blockgrant' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseBlockgrant extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\BlockgrantPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        BlockgrantPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the blockgrant_id field.
     * @var        string
     */
    protected $blockgrant_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the tahun field.
     * @var        string
     */
    protected $tahun;

    /**
     * The value for the jenis_bantuan_id field.
     * @var        int
     */
    protected $jenis_bantuan_id;

    /**
     * The value for the sumber_dana_id field.
     * @var        string
     */
    protected $sumber_dana_id;

    /**
     * The value for the besar_bantuan field.
     * @var        string
     */
    protected $besar_bantuan;

    /**
     * The value for the dana_pendamping field.
     * @var        string
     */
    protected $dana_pendamping;

    /**
     * The value for the peruntukan_dana field.
     * @var        string
     */
    protected $peruntukan_dana;

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
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        JenisBantuan
     */
    protected $aJenisBantuan;

    /**
     * @var        SumberDana
     */
    protected $aSumberDana;

    /**
     * @var        PropelObjectCollection|AlatDariBlockgrant[] Collection to store aggregation of AlatDariBlockgrant objects.
     */
    protected $collAlatDariBlockgrants;
    protected $collAlatDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|AngkutanDariBlockgrant[] Collection to store aggregation of AngkutanDariBlockgrant objects.
     */
    protected $collAngkutanDariBlockgrants;
    protected $collAngkutanDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|BangunanDariBlockgrant[] Collection to store aggregation of BangunanDariBlockgrant objects.
     */
    protected $collBangunanDariBlockgrants;
    protected $collBangunanDariBlockgrantsPartial;

    /**
     * @var        PropelObjectCollection|TanahDariBlockgrant[] Collection to store aggregation of TanahDariBlockgrant objects.
     */
    protected $collTanahDariBlockgrants;
    protected $collTanahDariBlockgrantsPartial;

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
    protected $alatDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $angkutanDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $bangunanDariBlockgrantsScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $tanahDariBlockgrantsScheduledForDeletion = null;

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
     * Initializes internal state of BaseBlockgrant object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [blockgrant_id] column value.
     * 
     * @return string
     */
    public function getBlockgrantId()
    {
        return $this->blockgrant_id;
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
     * Get the [nama] column value.
     * 
     * @return string
     */
    public function getNama()
    {
        return $this->nama;
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
     * Get the [jenis_bantuan_id] column value.
     * 
     * @return int
     */
    public function getJenisBantuanId()
    {
        return $this->jenis_bantuan_id;
    }

    /**
     * Get the [sumber_dana_id] column value.
     * 
     * @return string
     */
    public function getSumberDanaId()
    {
        return $this->sumber_dana_id;
    }

    /**
     * Get the [besar_bantuan] column value.
     * 
     * @return string
     */
    public function getBesarBantuan()
    {
        return $this->besar_bantuan;
    }

    /**
     * Get the [dana_pendamping] column value.
     * 
     * @return string
     */
    public function getDanaPendamping()
    {
        return $this->dana_pendamping;
    }

    /**
     * Get the [peruntukan_dana] column value.
     * 
     * @return string
     */
    public function getPeruntukanDana()
    {
        return $this->peruntukan_dana;
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
     * Set the value of [blockgrant_id] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setBlockgrantId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->blockgrant_id !== $v) {
            $this->blockgrant_id = $v;
            $this->modifiedColumns[] = BlockgrantPeer::BLOCKGRANT_ID;
        }


        return $this;
    } // setBlockgrantId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = BlockgrantPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = BlockgrantPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [tahun] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setTahun($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->tahun !== $v) {
            $this->tahun = $v;
            $this->modifiedColumns[] = BlockgrantPeer::TAHUN;
        }


        return $this;
    } // setTahun()

    /**
     * Set the value of [jenis_bantuan_id] column.
     * 
     * @param int $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setJenisBantuanId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->jenis_bantuan_id !== $v) {
            $this->jenis_bantuan_id = $v;
            $this->modifiedColumns[] = BlockgrantPeer::JENIS_BANTUAN_ID;
        }

        if ($this->aJenisBantuan !== null && $this->aJenisBantuan->getJenisBantuanId() !== $v) {
            $this->aJenisBantuan = null;
        }


        return $this;
    } // setJenisBantuanId()

    /**
     * Set the value of [sumber_dana_id] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setSumberDanaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_dana_id !== $v) {
            $this->sumber_dana_id = $v;
            $this->modifiedColumns[] = BlockgrantPeer::SUMBER_DANA_ID;
        }

        if ($this->aSumberDana !== null && $this->aSumberDana->getSumberDanaId() !== $v) {
            $this->aSumberDana = null;
        }


        return $this;
    } // setSumberDanaId()

    /**
     * Set the value of [besar_bantuan] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setBesarBantuan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->besar_bantuan !== $v) {
            $this->besar_bantuan = $v;
            $this->modifiedColumns[] = BlockgrantPeer::BESAR_BANTUAN;
        }


        return $this;
    } // setBesarBantuan()

    /**
     * Set the value of [dana_pendamping] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setDanaPendamping($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->dana_pendamping !== $v) {
            $this->dana_pendamping = $v;
            $this->modifiedColumns[] = BlockgrantPeer::DANA_PENDAMPING;
        }


        return $this;
    } // setDanaPendamping()

    /**
     * Set the value of [peruntukan_dana] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setPeruntukanDana($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->peruntukan_dana !== $v) {
            $this->peruntukan_dana = $v;
            $this->modifiedColumns[] = BlockgrantPeer::PERUNTUKAN_DANA;
        }


        return $this;
    } // setPeruntukanDana()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = BlockgrantPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = BlockgrantPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = BlockgrantPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = BlockgrantPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Blockgrant The current object (for fluent API support)
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
                $this->modifiedColumns[] = BlockgrantPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = BlockgrantPeer::UPDATER_ID;
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

            $this->blockgrant_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->tahun = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jenis_bantuan_id = ($row[$startcol + 4] !== null) ? (int) $row[$startcol + 4] : null;
            $this->sumber_dana_id = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->besar_bantuan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->dana_pendamping = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->peruntukan_dana = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->asal_data = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->soft_delete = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->updater_id = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 15; // 15 = BlockgrantPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Blockgrant object", $e);
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

        if ($this->aSekolah !== null && $this->sekolah_id !== $this->aSekolah->getSekolahId()) {
            $this->aSekolah = null;
        }
        if ($this->aJenisBantuan !== null && $this->jenis_bantuan_id !== $this->aJenisBantuan->getJenisBantuanId()) {
            $this->aJenisBantuan = null;
        }
        if ($this->aSumberDana !== null && $this->sumber_dana_id !== $this->aSumberDana->getSumberDanaId()) {
            $this->aSumberDana = null;
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
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = BlockgrantPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aSekolah = null;
            $this->aJenisBantuan = null;
            $this->aSumberDana = null;
            $this->collAlatDariBlockgrants = null;

            $this->collAngkutanDariBlockgrants = null;

            $this->collBangunanDariBlockgrants = null;

            $this->collTanahDariBlockgrants = null;

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
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = BlockgrantQuery::create()
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
            $con = Propel::getConnection(BlockgrantPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                BlockgrantPeer::addInstanceToPool($this);
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

            if ($this->aSekolah !== null) {
                if ($this->aSekolah->isModified() || $this->aSekolah->isNew()) {
                    $affectedRows += $this->aSekolah->save($con);
                }
                $this->setSekolah($this->aSekolah);
            }

            if ($this->aJenisBantuan !== null) {
                if ($this->aJenisBantuan->isModified() || $this->aJenisBantuan->isNew()) {
                    $affectedRows += $this->aJenisBantuan->save($con);
                }
                $this->setJenisBantuan($this->aJenisBantuan);
            }

            if ($this->aSumberDana !== null) {
                if ($this->aSumberDana->isModified() || $this->aSumberDana->isNew()) {
                    $affectedRows += $this->aSumberDana->save($con);
                }
                $this->setSumberDana($this->aSumberDana);
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

            if ($this->alatDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->alatDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    AlatDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->alatDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->alatDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collAlatDariBlockgrants !== null) {
                foreach ($this->collAlatDariBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->angkutanDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->angkutanDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    AngkutanDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->angkutanDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->angkutanDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collAngkutanDariBlockgrants !== null) {
                foreach ($this->collAngkutanDariBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->bangunanDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->bangunanDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    BangunanDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->bangunanDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->bangunanDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collBangunanDariBlockgrants !== null) {
                foreach ($this->collBangunanDariBlockgrants as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->tanahDariBlockgrantsScheduledForDeletion !== null) {
                if (!$this->tanahDariBlockgrantsScheduledForDeletion->isEmpty()) {
                    TanahDariBlockgrantQuery::create()
                        ->filterByPrimaryKeys($this->tanahDariBlockgrantsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->tanahDariBlockgrantsScheduledForDeletion = null;
                }
            }

            if ($this->collTanahDariBlockgrants !== null) {
                foreach ($this->collTanahDariBlockgrants as $referrerFK) {
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
        if ($this->isColumnModified(BlockgrantPeer::BLOCKGRANT_ID)) {
            $modifiedColumns[':p' . $index++]  = '"blockgrant_id"';
        }
        if ($this->isColumnModified(BlockgrantPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(BlockgrantPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(BlockgrantPeer::TAHUN)) {
            $modifiedColumns[':p' . $index++]  = '"tahun"';
        }
        if ($this->isColumnModified(BlockgrantPeer::JENIS_BANTUAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"jenis_bantuan_id"';
        }
        if ($this->isColumnModified(BlockgrantPeer::SUMBER_DANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_dana_id"';
        }
        if ($this->isColumnModified(BlockgrantPeer::BESAR_BANTUAN)) {
            $modifiedColumns[':p' . $index++]  = '"besar_bantuan"';
        }
        if ($this->isColumnModified(BlockgrantPeer::DANA_PENDAMPING)) {
            $modifiedColumns[':p' . $index++]  = '"dana_pendamping"';
        }
        if ($this->isColumnModified(BlockgrantPeer::PERUNTUKAN_DANA)) {
            $modifiedColumns[':p' . $index++]  = '"peruntukan_dana"';
        }
        if ($this->isColumnModified(BlockgrantPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(BlockgrantPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(BlockgrantPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(BlockgrantPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(BlockgrantPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(BlockgrantPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "blockgrant" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"blockgrant_id"':						
                        $stmt->bindValue($identifier, $this->blockgrant_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"tahun"':						
                        $stmt->bindValue($identifier, $this->tahun, PDO::PARAM_STR);
                        break;
                    case '"jenis_bantuan_id"':						
                        $stmt->bindValue($identifier, $this->jenis_bantuan_id, PDO::PARAM_INT);
                        break;
                    case '"sumber_dana_id"':						
                        $stmt->bindValue($identifier, $this->sumber_dana_id, PDO::PARAM_STR);
                        break;
                    case '"besar_bantuan"':						
                        $stmt->bindValue($identifier, $this->besar_bantuan, PDO::PARAM_STR);
                        break;
                    case '"dana_pendamping"':						
                        $stmt->bindValue($identifier, $this->dana_pendamping, PDO::PARAM_STR);
                        break;
                    case '"peruntukan_dana"':						
                        $stmt->bindValue($identifier, $this->peruntukan_dana, PDO::PARAM_STR);
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

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }

            if ($this->aJenisBantuan !== null) {
                if (!$this->aJenisBantuan->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aJenisBantuan->getValidationFailures());
                }
            }

            if ($this->aSumberDana !== null) {
                if (!$this->aSumberDana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberDana->getValidationFailures());
                }
            }


            if (($retval = BlockgrantPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collAlatDariBlockgrants !== null) {
                    foreach ($this->collAlatDariBlockgrants as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collAngkutanDariBlockgrants !== null) {
                    foreach ($this->collAngkutanDariBlockgrants as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collBangunanDariBlockgrants !== null) {
                    foreach ($this->collBangunanDariBlockgrants as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collTanahDariBlockgrants !== null) {
                    foreach ($this->collTanahDariBlockgrants as $referrerFK) {
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
        $pos = BlockgrantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getBlockgrantId();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getTahun();
                break;
            case 4:
                return $this->getJenisBantuanId();
                break;
            case 5:
                return $this->getSumberDanaId();
                break;
            case 6:
                return $this->getBesarBantuan();
                break;
            case 7:
                return $this->getDanaPendamping();
                break;
            case 8:
                return $this->getPeruntukanDana();
                break;
            case 9:
                return $this->getAsalData();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getSoftDelete();
                break;
            case 13:
                return $this->getLastSync();
                break;
            case 14:
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
        if (isset($alreadyDumpedObjects['Blockgrant'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Blockgrant'][$this->getPrimaryKey()] = true;
        $keys = BlockgrantPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getBlockgrantId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getTahun(),
            $keys[4] => $this->getJenisBantuanId(),
            $keys[5] => $this->getSumberDanaId(),
            $keys[6] => $this->getBesarBantuan(),
            $keys[7] => $this->getDanaPendamping(),
            $keys[8] => $this->getPeruntukanDana(),
            $keys[9] => $this->getAsalData(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getSoftDelete(),
            $keys[13] => $this->getLastSync(),
            $keys[14] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aJenisBantuan) {
                $result['JenisBantuan'] = $this->aJenisBantuan->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberDana) {
                $result['SumberDana'] = $this->aSumberDana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collAlatDariBlockgrants) {
                $result['AlatDariBlockgrants'] = $this->collAlatDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collAngkutanDariBlockgrants) {
                $result['AngkutanDariBlockgrants'] = $this->collAngkutanDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collBangunanDariBlockgrants) {
                $result['BangunanDariBlockgrants'] = $this->collBangunanDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collTanahDariBlockgrants) {
                $result['TanahDariBlockgrants'] = $this->collTanahDariBlockgrants->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = BlockgrantPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setBlockgrantId($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setTahun($value);
                break;
            case 4:
                $this->setJenisBantuanId($value);
                break;
            case 5:
                $this->setSumberDanaId($value);
                break;
            case 6:
                $this->setBesarBantuan($value);
                break;
            case 7:
                $this->setDanaPendamping($value);
                break;
            case 8:
                $this->setPeruntukanDana($value);
                break;
            case 9:
                $this->setAsalData($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setSoftDelete($value);
                break;
            case 13:
                $this->setLastSync($value);
                break;
            case 14:
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
        $keys = BlockgrantPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setBlockgrantId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setTahun($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJenisBantuanId($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSumberDanaId($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setBesarBantuan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDanaPendamping($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPeruntukanDana($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAsalData($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setSoftDelete($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setUpdaterId($arr[$keys[14]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(BlockgrantPeer::DATABASE_NAME);

        if ($this->isColumnModified(BlockgrantPeer::BLOCKGRANT_ID)) $criteria->add(BlockgrantPeer::BLOCKGRANT_ID, $this->blockgrant_id);
        if ($this->isColumnModified(BlockgrantPeer::SEKOLAH_ID)) $criteria->add(BlockgrantPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(BlockgrantPeer::NAMA)) $criteria->add(BlockgrantPeer::NAMA, $this->nama);
        if ($this->isColumnModified(BlockgrantPeer::TAHUN)) $criteria->add(BlockgrantPeer::TAHUN, $this->tahun);
        if ($this->isColumnModified(BlockgrantPeer::JENIS_BANTUAN_ID)) $criteria->add(BlockgrantPeer::JENIS_BANTUAN_ID, $this->jenis_bantuan_id);
        if ($this->isColumnModified(BlockgrantPeer::SUMBER_DANA_ID)) $criteria->add(BlockgrantPeer::SUMBER_DANA_ID, $this->sumber_dana_id);
        if ($this->isColumnModified(BlockgrantPeer::BESAR_BANTUAN)) $criteria->add(BlockgrantPeer::BESAR_BANTUAN, $this->besar_bantuan);
        if ($this->isColumnModified(BlockgrantPeer::DANA_PENDAMPING)) $criteria->add(BlockgrantPeer::DANA_PENDAMPING, $this->dana_pendamping);
        if ($this->isColumnModified(BlockgrantPeer::PERUNTUKAN_DANA)) $criteria->add(BlockgrantPeer::PERUNTUKAN_DANA, $this->peruntukan_dana);
        if ($this->isColumnModified(BlockgrantPeer::ASAL_DATA)) $criteria->add(BlockgrantPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(BlockgrantPeer::CREATE_DATE)) $criteria->add(BlockgrantPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(BlockgrantPeer::LAST_UPDATE)) $criteria->add(BlockgrantPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(BlockgrantPeer::SOFT_DELETE)) $criteria->add(BlockgrantPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(BlockgrantPeer::LAST_SYNC)) $criteria->add(BlockgrantPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(BlockgrantPeer::UPDATER_ID)) $criteria->add(BlockgrantPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(BlockgrantPeer::DATABASE_NAME);
        $criteria->add(BlockgrantPeer::BLOCKGRANT_ID, $this->blockgrant_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getBlockgrantId();
    }

    /**
     * Generic method to set the primary key (blockgrant_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setBlockgrantId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getBlockgrantId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Blockgrant (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setNama($this->getNama());
        $copyObj->setTahun($this->getTahun());
        $copyObj->setJenisBantuanId($this->getJenisBantuanId());
        $copyObj->setSumberDanaId($this->getSumberDanaId());
        $copyObj->setBesarBantuan($this->getBesarBantuan());
        $copyObj->setDanaPendamping($this->getDanaPendamping());
        $copyObj->setPeruntukanDana($this->getPeruntukanDana());
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

            foreach ($this->getAlatDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAlatDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getAngkutanDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addAngkutanDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getBangunanDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addBangunanDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getTanahDariBlockgrants() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addTanahDariBlockgrant($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setBlockgrantId(NULL); // this is a auto-increment column, so set to default value
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
     * @return Blockgrant Clone of current object.
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
     * @return BlockgrantPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new BlockgrantPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Blockgrant The current object (for fluent API support)
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
            $v->addBlockgrant($this);
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
                $this->aSekolah->addBlockgrants($this);
             */
        }

        return $this->aSekolah;
    }

    /**
     * Declares an association between this object and a JenisBantuan object.
     *
     * @param             JenisBantuan $v
     * @return Blockgrant The current object (for fluent API support)
     * @throws PropelException
     */
    public function setJenisBantuan(JenisBantuan $v = null)
    {
        if ($v === null) {
            $this->setJenisBantuanId(NULL);
        } else {
            $this->setJenisBantuanId($v->getJenisBantuanId());
        }

        $this->aJenisBantuan = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the JenisBantuan object, it will not be re-added.
        if ($v !== null) {
            $v->addBlockgrant($this);
        }


        return $this;
    }


    /**
     * Get the associated JenisBantuan object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return JenisBantuan The associated JenisBantuan object.
     * @throws PropelException
     */
    public function getJenisBantuan(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aJenisBantuan === null && ($this->jenis_bantuan_id !== null) && $doQuery) {
            $this->aJenisBantuan = JenisBantuanQuery::create()->findPk($this->jenis_bantuan_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aJenisBantuan->addBlockgrants($this);
             */
        }

        return $this->aJenisBantuan;
    }

    /**
     * Declares an association between this object and a SumberDana object.
     *
     * @param             SumberDana $v
     * @return Blockgrant The current object (for fluent API support)
     * @throws PropelException
     */
    public function setSumberDana(SumberDana $v = null)
    {
        if ($v === null) {
            $this->setSumberDanaId(NULL);
        } else {
            $this->setSumberDanaId($v->getSumberDanaId());
        }

        $this->aSumberDana = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the SumberDana object, it will not be re-added.
        if ($v !== null) {
            $v->addBlockgrant($this);
        }


        return $this;
    }


    /**
     * Get the associated SumberDana object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return SumberDana The associated SumberDana object.
     * @throws PropelException
     */
    public function getSumberDana(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aSumberDana === null && (($this->sumber_dana_id !== "" && $this->sumber_dana_id !== null)) && $doQuery) {
            $this->aSumberDana = SumberDanaQuery::create()->findPk($this->sumber_dana_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aSumberDana->addBlockgrants($this);
             */
        }

        return $this->aSumberDana;
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
        if ('AlatDariBlockgrant' == $relationName) {
            $this->initAlatDariBlockgrants();
        }
        if ('AngkutanDariBlockgrant' == $relationName) {
            $this->initAngkutanDariBlockgrants();
        }
        if ('BangunanDariBlockgrant' == $relationName) {
            $this->initBangunanDariBlockgrants();
        }
        if ('TanahDariBlockgrant' == $relationName) {
            $this->initTanahDariBlockgrants();
        }
    }

    /**
     * Clears out the collAlatDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Blockgrant The current object (for fluent API support)
     * @see        addAlatDariBlockgrants()
     */
    public function clearAlatDariBlockgrants()
    {
        $this->collAlatDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collAlatDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collAlatDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialAlatDariBlockgrants($v = true)
    {
        $this->collAlatDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collAlatDariBlockgrants collection.
     *
     * By default this just sets the collAlatDariBlockgrants collection to an empty array (like clearcollAlatDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAlatDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collAlatDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collAlatDariBlockgrants = new PropelObjectCollection();
        $this->collAlatDariBlockgrants->setModel('AlatDariBlockgrant');
    }

    /**
     * Gets an array of AlatDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Blockgrant is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AlatDariBlockgrant[] List of AlatDariBlockgrant objects
     * @throws PropelException
     */
    public function getAlatDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAlatDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAlatDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAlatDariBlockgrants) {
                // return empty collection
                $this->initAlatDariBlockgrants();
            } else {
                $collAlatDariBlockgrants = AlatDariBlockgrantQuery::create(null, $criteria)
                    ->filterByBlockgrant($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAlatDariBlockgrantsPartial && count($collAlatDariBlockgrants)) {
                      $this->initAlatDariBlockgrants(false);

                      foreach($collAlatDariBlockgrants as $obj) {
                        if (false == $this->collAlatDariBlockgrants->contains($obj)) {
                          $this->collAlatDariBlockgrants->append($obj);
                        }
                      }

                      $this->collAlatDariBlockgrantsPartial = true;
                    }

                    $collAlatDariBlockgrants->getInternalIterator()->rewind();
                    return $collAlatDariBlockgrants;
                }

                if($partial && $this->collAlatDariBlockgrants) {
                    foreach($this->collAlatDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collAlatDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collAlatDariBlockgrants = $collAlatDariBlockgrants;
                $this->collAlatDariBlockgrantsPartial = false;
            }
        }

        return $this->collAlatDariBlockgrants;
    }

    /**
     * Sets a collection of AlatDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $alatDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setAlatDariBlockgrants(PropelCollection $alatDariBlockgrants, PropelPDO $con = null)
    {
        $alatDariBlockgrantsToDelete = $this->getAlatDariBlockgrants(new Criteria(), $con)->diff($alatDariBlockgrants);

        $this->alatDariBlockgrantsScheduledForDeletion = unserialize(serialize($alatDariBlockgrantsToDelete));

        foreach ($alatDariBlockgrantsToDelete as $alatDariBlockgrantRemoved) {
            $alatDariBlockgrantRemoved->setBlockgrant(null);
        }

        $this->collAlatDariBlockgrants = null;
        foreach ($alatDariBlockgrants as $alatDariBlockgrant) {
            $this->addAlatDariBlockgrant($alatDariBlockgrant);
        }

        $this->collAlatDariBlockgrants = $alatDariBlockgrants;
        $this->collAlatDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AlatDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AlatDariBlockgrant objects.
     * @throws PropelException
     */
    public function countAlatDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAlatDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAlatDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAlatDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAlatDariBlockgrants());
            }
            $query = AlatDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBlockgrant($this)
                ->count($con);
        }

        return count($this->collAlatDariBlockgrants);
    }

    /**
     * Method called to associate a AlatDariBlockgrant object to this object
     * through the AlatDariBlockgrant foreign key attribute.
     *
     * @param    AlatDariBlockgrant $l AlatDariBlockgrant
     * @return Blockgrant The current object (for fluent API support)
     */
    public function addAlatDariBlockgrant(AlatDariBlockgrant $l)
    {
        if ($this->collAlatDariBlockgrants === null) {
            $this->initAlatDariBlockgrants();
            $this->collAlatDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collAlatDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAlatDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	AlatDariBlockgrant $alatDariBlockgrant The alatDariBlockgrant object to add.
     */
    protected function doAddAlatDariBlockgrant($alatDariBlockgrant)
    {
        $this->collAlatDariBlockgrants[]= $alatDariBlockgrant;
        $alatDariBlockgrant->setBlockgrant($this);
    }

    /**
     * @param	AlatDariBlockgrant $alatDariBlockgrant The alatDariBlockgrant object to remove.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function removeAlatDariBlockgrant($alatDariBlockgrant)
    {
        if ($this->getAlatDariBlockgrants()->contains($alatDariBlockgrant)) {
            $this->collAlatDariBlockgrants->remove($this->collAlatDariBlockgrants->search($alatDariBlockgrant));
            if (null === $this->alatDariBlockgrantsScheduledForDeletion) {
                $this->alatDariBlockgrantsScheduledForDeletion = clone $this->collAlatDariBlockgrants;
                $this->alatDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->alatDariBlockgrantsScheduledForDeletion[]= clone $alatDariBlockgrant;
            $alatDariBlockgrant->setBlockgrant(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Blockgrant is new, it will return
     * an empty collection; or if this Blockgrant has previously
     * been saved, it will retrieve related AlatDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Blockgrant.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AlatDariBlockgrant[] List of AlatDariBlockgrant objects
     */
    public function getAlatDariBlockgrantsJoinAlat($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AlatDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Alat', $join_behavior);

        return $this->getAlatDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collAngkutanDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Blockgrant The current object (for fluent API support)
     * @see        addAngkutanDariBlockgrants()
     */
    public function clearAngkutanDariBlockgrants()
    {
        $this->collAngkutanDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collAngkutanDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collAngkutanDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialAngkutanDariBlockgrants($v = true)
    {
        $this->collAngkutanDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collAngkutanDariBlockgrants collection.
     *
     * By default this just sets the collAngkutanDariBlockgrants collection to an empty array (like clearcollAngkutanDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initAngkutanDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collAngkutanDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collAngkutanDariBlockgrants = new PropelObjectCollection();
        $this->collAngkutanDariBlockgrants->setModel('AngkutanDariBlockgrant');
    }

    /**
     * Gets an array of AngkutanDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Blockgrant is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|AngkutanDariBlockgrant[] List of AngkutanDariBlockgrant objects
     * @throws PropelException
     */
    public function getAngkutanDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collAngkutanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAngkutanDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collAngkutanDariBlockgrants) {
                // return empty collection
                $this->initAngkutanDariBlockgrants();
            } else {
                $collAngkutanDariBlockgrants = AngkutanDariBlockgrantQuery::create(null, $criteria)
                    ->filterByBlockgrant($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collAngkutanDariBlockgrantsPartial && count($collAngkutanDariBlockgrants)) {
                      $this->initAngkutanDariBlockgrants(false);

                      foreach($collAngkutanDariBlockgrants as $obj) {
                        if (false == $this->collAngkutanDariBlockgrants->contains($obj)) {
                          $this->collAngkutanDariBlockgrants->append($obj);
                        }
                      }

                      $this->collAngkutanDariBlockgrantsPartial = true;
                    }

                    $collAngkutanDariBlockgrants->getInternalIterator()->rewind();
                    return $collAngkutanDariBlockgrants;
                }

                if($partial && $this->collAngkutanDariBlockgrants) {
                    foreach($this->collAngkutanDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collAngkutanDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collAngkutanDariBlockgrants = $collAngkutanDariBlockgrants;
                $this->collAngkutanDariBlockgrantsPartial = false;
            }
        }

        return $this->collAngkutanDariBlockgrants;
    }

    /**
     * Sets a collection of AngkutanDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $angkutanDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setAngkutanDariBlockgrants(PropelCollection $angkutanDariBlockgrants, PropelPDO $con = null)
    {
        $angkutanDariBlockgrantsToDelete = $this->getAngkutanDariBlockgrants(new Criteria(), $con)->diff($angkutanDariBlockgrants);

        $this->angkutanDariBlockgrantsScheduledForDeletion = unserialize(serialize($angkutanDariBlockgrantsToDelete));

        foreach ($angkutanDariBlockgrantsToDelete as $angkutanDariBlockgrantRemoved) {
            $angkutanDariBlockgrantRemoved->setBlockgrant(null);
        }

        $this->collAngkutanDariBlockgrants = null;
        foreach ($angkutanDariBlockgrants as $angkutanDariBlockgrant) {
            $this->addAngkutanDariBlockgrant($angkutanDariBlockgrant);
        }

        $this->collAngkutanDariBlockgrants = $angkutanDariBlockgrants;
        $this->collAngkutanDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related AngkutanDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related AngkutanDariBlockgrant objects.
     * @throws PropelException
     */
    public function countAngkutanDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collAngkutanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collAngkutanDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collAngkutanDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getAngkutanDariBlockgrants());
            }
            $query = AngkutanDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBlockgrant($this)
                ->count($con);
        }

        return count($this->collAngkutanDariBlockgrants);
    }

    /**
     * Method called to associate a AngkutanDariBlockgrant object to this object
     * through the AngkutanDariBlockgrant foreign key attribute.
     *
     * @param    AngkutanDariBlockgrant $l AngkutanDariBlockgrant
     * @return Blockgrant The current object (for fluent API support)
     */
    public function addAngkutanDariBlockgrant(AngkutanDariBlockgrant $l)
    {
        if ($this->collAngkutanDariBlockgrants === null) {
            $this->initAngkutanDariBlockgrants();
            $this->collAngkutanDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collAngkutanDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddAngkutanDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	AngkutanDariBlockgrant $angkutanDariBlockgrant The angkutanDariBlockgrant object to add.
     */
    protected function doAddAngkutanDariBlockgrant($angkutanDariBlockgrant)
    {
        $this->collAngkutanDariBlockgrants[]= $angkutanDariBlockgrant;
        $angkutanDariBlockgrant->setBlockgrant($this);
    }

    /**
     * @param	AngkutanDariBlockgrant $angkutanDariBlockgrant The angkutanDariBlockgrant object to remove.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function removeAngkutanDariBlockgrant($angkutanDariBlockgrant)
    {
        if ($this->getAngkutanDariBlockgrants()->contains($angkutanDariBlockgrant)) {
            $this->collAngkutanDariBlockgrants->remove($this->collAngkutanDariBlockgrants->search($angkutanDariBlockgrant));
            if (null === $this->angkutanDariBlockgrantsScheduledForDeletion) {
                $this->angkutanDariBlockgrantsScheduledForDeletion = clone $this->collAngkutanDariBlockgrants;
                $this->angkutanDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->angkutanDariBlockgrantsScheduledForDeletion[]= clone $angkutanDariBlockgrant;
            $angkutanDariBlockgrant->setBlockgrant(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Blockgrant is new, it will return
     * an empty collection; or if this Blockgrant has previously
     * been saved, it will retrieve related AngkutanDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Blockgrant.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|AngkutanDariBlockgrant[] List of AngkutanDariBlockgrant objects
     */
    public function getAngkutanDariBlockgrantsJoinAngkutan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = AngkutanDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Angkutan', $join_behavior);

        return $this->getAngkutanDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collBangunanDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Blockgrant The current object (for fluent API support)
     * @see        addBangunanDariBlockgrants()
     */
    public function clearBangunanDariBlockgrants()
    {
        $this->collBangunanDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collBangunanDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collBangunanDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialBangunanDariBlockgrants($v = true)
    {
        $this->collBangunanDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collBangunanDariBlockgrants collection.
     *
     * By default this just sets the collBangunanDariBlockgrants collection to an empty array (like clearcollBangunanDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initBangunanDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collBangunanDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collBangunanDariBlockgrants = new PropelObjectCollection();
        $this->collBangunanDariBlockgrants->setModel('BangunanDariBlockgrant');
    }

    /**
     * Gets an array of BangunanDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Blockgrant is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|BangunanDariBlockgrant[] List of BangunanDariBlockgrant objects
     * @throws PropelException
     */
    public function getBangunanDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collBangunanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBangunanDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collBangunanDariBlockgrants) {
                // return empty collection
                $this->initBangunanDariBlockgrants();
            } else {
                $collBangunanDariBlockgrants = BangunanDariBlockgrantQuery::create(null, $criteria)
                    ->filterByBlockgrant($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collBangunanDariBlockgrantsPartial && count($collBangunanDariBlockgrants)) {
                      $this->initBangunanDariBlockgrants(false);

                      foreach($collBangunanDariBlockgrants as $obj) {
                        if (false == $this->collBangunanDariBlockgrants->contains($obj)) {
                          $this->collBangunanDariBlockgrants->append($obj);
                        }
                      }

                      $this->collBangunanDariBlockgrantsPartial = true;
                    }

                    $collBangunanDariBlockgrants->getInternalIterator()->rewind();
                    return $collBangunanDariBlockgrants;
                }

                if($partial && $this->collBangunanDariBlockgrants) {
                    foreach($this->collBangunanDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collBangunanDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collBangunanDariBlockgrants = $collBangunanDariBlockgrants;
                $this->collBangunanDariBlockgrantsPartial = false;
            }
        }

        return $this->collBangunanDariBlockgrants;
    }

    /**
     * Sets a collection of BangunanDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $bangunanDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setBangunanDariBlockgrants(PropelCollection $bangunanDariBlockgrants, PropelPDO $con = null)
    {
        $bangunanDariBlockgrantsToDelete = $this->getBangunanDariBlockgrants(new Criteria(), $con)->diff($bangunanDariBlockgrants);

        $this->bangunanDariBlockgrantsScheduledForDeletion = unserialize(serialize($bangunanDariBlockgrantsToDelete));

        foreach ($bangunanDariBlockgrantsToDelete as $bangunanDariBlockgrantRemoved) {
            $bangunanDariBlockgrantRemoved->setBlockgrant(null);
        }

        $this->collBangunanDariBlockgrants = null;
        foreach ($bangunanDariBlockgrants as $bangunanDariBlockgrant) {
            $this->addBangunanDariBlockgrant($bangunanDariBlockgrant);
        }

        $this->collBangunanDariBlockgrants = $bangunanDariBlockgrants;
        $this->collBangunanDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related BangunanDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related BangunanDariBlockgrant objects.
     * @throws PropelException
     */
    public function countBangunanDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collBangunanDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collBangunanDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collBangunanDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getBangunanDariBlockgrants());
            }
            $query = BangunanDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBlockgrant($this)
                ->count($con);
        }

        return count($this->collBangunanDariBlockgrants);
    }

    /**
     * Method called to associate a BangunanDariBlockgrant object to this object
     * through the BangunanDariBlockgrant foreign key attribute.
     *
     * @param    BangunanDariBlockgrant $l BangunanDariBlockgrant
     * @return Blockgrant The current object (for fluent API support)
     */
    public function addBangunanDariBlockgrant(BangunanDariBlockgrant $l)
    {
        if ($this->collBangunanDariBlockgrants === null) {
            $this->initBangunanDariBlockgrants();
            $this->collBangunanDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collBangunanDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddBangunanDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	BangunanDariBlockgrant $bangunanDariBlockgrant The bangunanDariBlockgrant object to add.
     */
    protected function doAddBangunanDariBlockgrant($bangunanDariBlockgrant)
    {
        $this->collBangunanDariBlockgrants[]= $bangunanDariBlockgrant;
        $bangunanDariBlockgrant->setBlockgrant($this);
    }

    /**
     * @param	BangunanDariBlockgrant $bangunanDariBlockgrant The bangunanDariBlockgrant object to remove.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function removeBangunanDariBlockgrant($bangunanDariBlockgrant)
    {
        if ($this->getBangunanDariBlockgrants()->contains($bangunanDariBlockgrant)) {
            $this->collBangunanDariBlockgrants->remove($this->collBangunanDariBlockgrants->search($bangunanDariBlockgrant));
            if (null === $this->bangunanDariBlockgrantsScheduledForDeletion) {
                $this->bangunanDariBlockgrantsScheduledForDeletion = clone $this->collBangunanDariBlockgrants;
                $this->bangunanDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->bangunanDariBlockgrantsScheduledForDeletion[]= clone $bangunanDariBlockgrant;
            $bangunanDariBlockgrant->setBlockgrant(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Blockgrant is new, it will return
     * an empty collection; or if this Blockgrant has previously
     * been saved, it will retrieve related BangunanDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Blockgrant.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|BangunanDariBlockgrant[] List of BangunanDariBlockgrant objects
     */
    public function getBangunanDariBlockgrantsJoinBangunan($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = BangunanDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Bangunan', $join_behavior);

        return $this->getBangunanDariBlockgrants($query, $con);
    }

    /**
     * Clears out the collTanahDariBlockgrants collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Blockgrant The current object (for fluent API support)
     * @see        addTanahDariBlockgrants()
     */
    public function clearTanahDariBlockgrants()
    {
        $this->collTanahDariBlockgrants = null; // important to set this to null since that means it is uninitialized
        $this->collTanahDariBlockgrantsPartial = null;

        return $this;
    }

    /**
     * reset is the collTanahDariBlockgrants collection loaded partially
     *
     * @return void
     */
    public function resetPartialTanahDariBlockgrants($v = true)
    {
        $this->collTanahDariBlockgrantsPartial = $v;
    }

    /**
     * Initializes the collTanahDariBlockgrants collection.
     *
     * By default this just sets the collTanahDariBlockgrants collection to an empty array (like clearcollTanahDariBlockgrants());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initTanahDariBlockgrants($overrideExisting = true)
    {
        if (null !== $this->collTanahDariBlockgrants && !$overrideExisting) {
            return;
        }
        $this->collTanahDariBlockgrants = new PropelObjectCollection();
        $this->collTanahDariBlockgrants->setModel('TanahDariBlockgrant');
    }

    /**
     * Gets an array of TanahDariBlockgrant objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Blockgrant is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|TanahDariBlockgrant[] List of TanahDariBlockgrant objects
     * @throws PropelException
     */
    public function getTanahDariBlockgrants($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collTanahDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collTanahDariBlockgrants || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collTanahDariBlockgrants) {
                // return empty collection
                $this->initTanahDariBlockgrants();
            } else {
                $collTanahDariBlockgrants = TanahDariBlockgrantQuery::create(null, $criteria)
                    ->filterByBlockgrant($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collTanahDariBlockgrantsPartial && count($collTanahDariBlockgrants)) {
                      $this->initTanahDariBlockgrants(false);

                      foreach($collTanahDariBlockgrants as $obj) {
                        if (false == $this->collTanahDariBlockgrants->contains($obj)) {
                          $this->collTanahDariBlockgrants->append($obj);
                        }
                      }

                      $this->collTanahDariBlockgrantsPartial = true;
                    }

                    $collTanahDariBlockgrants->getInternalIterator()->rewind();
                    return $collTanahDariBlockgrants;
                }

                if($partial && $this->collTanahDariBlockgrants) {
                    foreach($this->collTanahDariBlockgrants as $obj) {
                        if($obj->isNew()) {
                            $collTanahDariBlockgrants[] = $obj;
                        }
                    }
                }

                $this->collTanahDariBlockgrants = $collTanahDariBlockgrants;
                $this->collTanahDariBlockgrantsPartial = false;
            }
        }

        return $this->collTanahDariBlockgrants;
    }

    /**
     * Sets a collection of TanahDariBlockgrant objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $tanahDariBlockgrants A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Blockgrant The current object (for fluent API support)
     */
    public function setTanahDariBlockgrants(PropelCollection $tanahDariBlockgrants, PropelPDO $con = null)
    {
        $tanahDariBlockgrantsToDelete = $this->getTanahDariBlockgrants(new Criteria(), $con)->diff($tanahDariBlockgrants);

        $this->tanahDariBlockgrantsScheduledForDeletion = unserialize(serialize($tanahDariBlockgrantsToDelete));

        foreach ($tanahDariBlockgrantsToDelete as $tanahDariBlockgrantRemoved) {
            $tanahDariBlockgrantRemoved->setBlockgrant(null);
        }

        $this->collTanahDariBlockgrants = null;
        foreach ($tanahDariBlockgrants as $tanahDariBlockgrant) {
            $this->addTanahDariBlockgrant($tanahDariBlockgrant);
        }

        $this->collTanahDariBlockgrants = $tanahDariBlockgrants;
        $this->collTanahDariBlockgrantsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related TanahDariBlockgrant objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related TanahDariBlockgrant objects.
     * @throws PropelException
     */
    public function countTanahDariBlockgrants(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collTanahDariBlockgrantsPartial && !$this->isNew();
        if (null === $this->collTanahDariBlockgrants || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collTanahDariBlockgrants) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getTanahDariBlockgrants());
            }
            $query = TanahDariBlockgrantQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByBlockgrant($this)
                ->count($con);
        }

        return count($this->collTanahDariBlockgrants);
    }

    /**
     * Method called to associate a TanahDariBlockgrant object to this object
     * through the TanahDariBlockgrant foreign key attribute.
     *
     * @param    TanahDariBlockgrant $l TanahDariBlockgrant
     * @return Blockgrant The current object (for fluent API support)
     */
    public function addTanahDariBlockgrant(TanahDariBlockgrant $l)
    {
        if ($this->collTanahDariBlockgrants === null) {
            $this->initTanahDariBlockgrants();
            $this->collTanahDariBlockgrantsPartial = true;
        }
        if (!in_array($l, $this->collTanahDariBlockgrants->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddTanahDariBlockgrant($l);
        }

        return $this;
    }

    /**
     * @param	TanahDariBlockgrant $tanahDariBlockgrant The tanahDariBlockgrant object to add.
     */
    protected function doAddTanahDariBlockgrant($tanahDariBlockgrant)
    {
        $this->collTanahDariBlockgrants[]= $tanahDariBlockgrant;
        $tanahDariBlockgrant->setBlockgrant($this);
    }

    /**
     * @param	TanahDariBlockgrant $tanahDariBlockgrant The tanahDariBlockgrant object to remove.
     * @return Blockgrant The current object (for fluent API support)
     */
    public function removeTanahDariBlockgrant($tanahDariBlockgrant)
    {
        if ($this->getTanahDariBlockgrants()->contains($tanahDariBlockgrant)) {
            $this->collTanahDariBlockgrants->remove($this->collTanahDariBlockgrants->search($tanahDariBlockgrant));
            if (null === $this->tanahDariBlockgrantsScheduledForDeletion) {
                $this->tanahDariBlockgrantsScheduledForDeletion = clone $this->collTanahDariBlockgrants;
                $this->tanahDariBlockgrantsScheduledForDeletion->clear();
            }
            $this->tanahDariBlockgrantsScheduledForDeletion[]= clone $tanahDariBlockgrant;
            $tanahDariBlockgrant->setBlockgrant(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Blockgrant is new, it will return
     * an empty collection; or if this Blockgrant has previously
     * been saved, it will retrieve related TanahDariBlockgrants from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Blockgrant.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|TanahDariBlockgrant[] List of TanahDariBlockgrant objects
     */
    public function getTanahDariBlockgrantsJoinTanah($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = TanahDariBlockgrantQuery::create(null, $criteria);
        $query->joinWith('Tanah', $join_behavior);

        return $this->getTanahDariBlockgrants($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->blockgrant_id = null;
        $this->sekolah_id = null;
        $this->nama = null;
        $this->tahun = null;
        $this->jenis_bantuan_id = null;
        $this->sumber_dana_id = null;
        $this->besar_bantuan = null;
        $this->dana_pendamping = null;
        $this->peruntukan_dana = null;
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
            if ($this->collAlatDariBlockgrants) {
                foreach ($this->collAlatDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collAngkutanDariBlockgrants) {
                foreach ($this->collAngkutanDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collBangunanDariBlockgrants) {
                foreach ($this->collBangunanDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collTanahDariBlockgrants) {
                foreach ($this->collTanahDariBlockgrants as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }
            if ($this->aJenisBantuan instanceof Persistent) {
              $this->aJenisBantuan->clearAllReferences($deep);
            }
            if ($this->aSumberDana instanceof Persistent) {
              $this->aSumberDana->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collAlatDariBlockgrants instanceof PropelCollection) {
            $this->collAlatDariBlockgrants->clearIterator();
        }
        $this->collAlatDariBlockgrants = null;
        if ($this->collAngkutanDariBlockgrants instanceof PropelCollection) {
            $this->collAngkutanDariBlockgrants->clearIterator();
        }
        $this->collAngkutanDariBlockgrants = null;
        if ($this->collBangunanDariBlockgrants instanceof PropelCollection) {
            $this->collBangunanDariBlockgrants->clearIterator();
        }
        $this->collBangunanDariBlockgrants = null;
        if ($this->collTanahDariBlockgrants instanceof PropelCollection) {
            $this->collTanahDariBlockgrants->clearIterator();
        }
        $this->collTanahDariBlockgrants = null;
        $this->aSekolah = null;
        $this->aJenisBantuan = null;
        $this->aSumberDana = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(BlockgrantPeer::DEFAULT_STRING_FORMAT);
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
