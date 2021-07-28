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
use DataDikdas\Model\WsAplikasi;
use DataDikdas\Model\WsAplikasiQuery;
use DataDikdas\Model\WsRoleColumn;
use DataDikdas\Model\WsRoleColumnQuery;
use DataDikdas\Model\WsRoleTable;
use DataDikdas\Model\WsRoleTablePeer;
use DataDikdas\Model\WsRoleTableQuery;

/**
 * Base class that represents a row from the 'ws_role_table' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsRoleTable extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\WsRoleTablePeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        WsRoleTablePeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the role_table_id field.
     * @var        string
     */
    protected $role_table_id;

    /**
     * The value for the aplikasi_id field.
     * @var        string
     */
    protected $aplikasi_id;

    /**
     * The value for the role_read field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $role_read;

    /**
     * The value for the role_create field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $role_create;

    /**
     * The value for the role_update field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $role_update;

    /**
     * The value for the role_delete field.
     * Note: this column has a database default value of: '0'
     * @var        string
     */
    protected $role_delete;

    /**
     * The value for the asal_data field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $asal_data;

    /**
     * The value for the aktif field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $aktif;

    /**
     * The value for the expired_date field.
     * Note: this column has a database default value of: (expression) now()
     * @var        string
     */
    protected $expired_date;

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
     * The value for the updater_id field.
     * @var        string
     */
    protected $updater_id;

    /**
     * The value for the last_sync field.
     * @var        string
     */
    protected $last_sync;

    /**
     * The value for the soft_delete field.
     * Note: this column has a database default value of: 0
     * @var        int
     */
    protected $soft_delete;

    /**
     * The value for the nama_table field.
     * @var        string
     */
    protected $nama_table;

    /**
     * The value for the nama_alias field.
     * @var        string
     */
    protected $nama_alias;

    /**
     * @var        WsAplikasi
     */
    protected $aWsAplikasi;

    /**
     * @var        PropelObjectCollection|WsRoleColumn[] Collection to store aggregation of WsRoleColumn objects.
     */
    protected $collWsRoleColumns;
    protected $collWsRoleColumnsPartial;

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
    protected $wsRoleColumnsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->role_read = '0';
        $this->role_create = '0';
        $this->role_update = '0';
        $this->role_delete = '0';
        $this->asal_data = '1';
        $this->aktif = '1';
        $this->soft_delete = 0;
    }

    /**
     * Initializes internal state of BaseWsRoleTable object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [role_table_id] column value.
     * 
     * @return string
     */
    public function getRoleTableId()
    {
        return $this->role_table_id;
    }

    /**
     * Get the [aplikasi_id] column value.
     * 
     * @return string
     */
    public function getAplikasiId()
    {
        return $this->aplikasi_id;
    }

    /**
     * Get the [role_read] column value.
     * 
     * @return string
     */
    public function getRoleRead()
    {
        return $this->role_read;
    }

    /**
     * Get the [role_create] column value.
     * 
     * @return string
     */
    public function getRoleCreate()
    {
        return $this->role_create;
    }

    /**
     * Get the [role_update] column value.
     * 
     * @return string
     */
    public function getRoleUpdate()
    {
        return $this->role_update;
    }

    /**
     * Get the [role_delete] column value.
     * 
     * @return string
     */
    public function getRoleDelete()
    {
        return $this->role_delete;
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
     * Get the [aktif] column value.
     * 
     * @return string
     */
    public function getAktif()
    {
        return $this->aktif;
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
     * Get the [updater_id] column value.
     * 
     * @return string
     */
    public function getUpdaterId()
    {
        return $this->updater_id;
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
     * Get the [soft_delete] column value.
     * 
     * @return int
     */
    public function getSoftDelete()
    {
        return $this->soft_delete;
    }

    /**
     * Get the [nama_table] column value.
     * 
     * @return string
     */
    public function getNamaTable()
    {
        return $this->nama_table;
    }

    /**
     * Get the [nama_alias] column value.
     * 
     * @return string
     */
    public function getNamaAlias()
    {
        return $this->nama_alias;
    }

    /**
     * Set the value of [role_table_id] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setRoleTableId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->role_table_id !== $v) {
            $this->role_table_id = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ROLE_TABLE_ID;
        }


        return $this;
    } // setRoleTableId()

    /**
     * Set the value of [aplikasi_id] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setAplikasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aplikasi_id !== $v) {
            $this->aplikasi_id = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::APLIKASI_ID;
        }

        if ($this->aWsAplikasi !== null && $this->aWsAplikasi->getAplikasiId() !== $v) {
            $this->aWsAplikasi = null;
        }


        return $this;
    } // setAplikasiId()

    /**
     * Set the value of [role_read] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setRoleRead($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->role_read !== $v) {
            $this->role_read = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ROLE_READ;
        }


        return $this;
    } // setRoleRead()

    /**
     * Set the value of [role_create] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setRoleCreate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->role_create !== $v) {
            $this->role_create = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ROLE_CREATE;
        }


        return $this;
    } // setRoleCreate()

    /**
     * Set the value of [role_update] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setRoleUpdate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->role_update !== $v) {
            $this->role_update = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ROLE_UPDATE;
        }


        return $this;
    } // setRoleUpdate()

    /**
     * Set the value of [role_delete] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setRoleDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->role_delete !== $v) {
            $this->role_delete = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ROLE_DELETE;
        }


        return $this;
    } // setRoleDelete()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Set the value of [aktif] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif !== $v) {
            $this->aktif = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::AKTIF;
        }


        return $this;
    } // setAktif()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = WsRoleTablePeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = WsRoleTablePeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = WsRoleTablePeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = WsRoleTablePeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param int $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Set the value of [nama_table] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setNamaTable($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_table !== $v) {
            $this->nama_table = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::NAMA_TABLE;
        }


        return $this;
    } // setNamaTable()

    /**
     * Set the value of [nama_alias] column.
     * 
     * @param string $v new value
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setNamaAlias($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama_alias !== $v) {
            $this->nama_alias = $v;
            $this->modifiedColumns[] = WsRoleTablePeer::NAMA_ALIAS;
        }


        return $this;
    } // setNamaAlias()

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
            if ($this->role_read !== '0') {
                return false;
            }

            if ($this->role_create !== '0') {
                return false;
            }

            if ($this->role_update !== '0') {
                return false;
            }

            if ($this->role_delete !== '0') {
                return false;
            }

            if ($this->asal_data !== '1') {
                return false;
            }

            if ($this->aktif !== '1') {
                return false;
            }

            if ($this->soft_delete !== 0) {
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

            $this->role_table_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->aplikasi_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->role_read = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->role_create = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->role_update = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->role_delete = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->asal_data = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->aktif = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->expired_date = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->create_date = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->last_update = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->updater_id = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_sync = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->soft_delete = ($row[$startcol + 13] !== null) ? (int) $row[$startcol + 13] : null;
            $this->nama_table = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->nama_alias = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = WsRoleTablePeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating WsRoleTable object", $e);
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

        if ($this->aWsAplikasi !== null && $this->aplikasi_id !== $this->aWsAplikasi->getAplikasiId()) {
            $this->aWsAplikasi = null;
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
            $con = Propel::getConnection(WsRoleTablePeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = WsRoleTablePeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aWsAplikasi = null;
            $this->collWsRoleColumns = null;

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
            $con = Propel::getConnection(WsRoleTablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = WsRoleTableQuery::create()
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
            $con = Propel::getConnection(WsRoleTablePeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                WsRoleTablePeer::addInstanceToPool($this);
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

            if ($this->aWsAplikasi !== null) {
                if ($this->aWsAplikasi->isModified() || $this->aWsAplikasi->isNew()) {
                    $affectedRows += $this->aWsAplikasi->save($con);
                }
                $this->setWsAplikasi($this->aWsAplikasi);
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

            if ($this->wsRoleColumnsScheduledForDeletion !== null) {
                if (!$this->wsRoleColumnsScheduledForDeletion->isEmpty()) {
                    WsRoleColumnQuery::create()
                        ->filterByPrimaryKeys($this->wsRoleColumnsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->wsRoleColumnsScheduledForDeletion = null;
                }
            }

            if ($this->collWsRoleColumns !== null) {
                foreach ($this->collWsRoleColumns as $referrerFK) {
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
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_TABLE_ID)) {
            $modifiedColumns[':p' . $index++]  = '"role_table_id"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::APLIKASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"aplikasi_id"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_READ)) {
            $modifiedColumns[':p' . $index++]  = '"role_read"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_CREATE)) {
            $modifiedColumns[':p' . $index++]  = '"role_create"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"role_update"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"role_delete"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"aktif"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::NAMA_TABLE)) {
            $modifiedColumns[':p' . $index++]  = '"nama_table"';
        }
        if ($this->isColumnModified(WsRoleTablePeer::NAMA_ALIAS)) {
            $modifiedColumns[':p' . $index++]  = '"nama_alias"';
        }

        $sql = sprintf(
            'INSERT INTO "ws_role_table" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"role_table_id"':						
                        $stmt->bindValue($identifier, $this->role_table_id, PDO::PARAM_STR);
                        break;
                    case '"aplikasi_id"':						
                        $stmt->bindValue($identifier, $this->aplikasi_id, PDO::PARAM_STR);
                        break;
                    case '"role_read"':						
                        $stmt->bindValue($identifier, $this->role_read, PDO::PARAM_STR);
                        break;
                    case '"role_create"':						
                        $stmt->bindValue($identifier, $this->role_create, PDO::PARAM_STR);
                        break;
                    case '"role_update"':						
                        $stmt->bindValue($identifier, $this->role_update, PDO::PARAM_STR);
                        break;
                    case '"role_delete"':						
                        $stmt->bindValue($identifier, $this->role_delete, PDO::PARAM_STR);
                        break;
                    case '"asal_data"':						
                        $stmt->bindValue($identifier, $this->asal_data, PDO::PARAM_STR);
                        break;
                    case '"aktif"':						
                        $stmt->bindValue($identifier, $this->aktif, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"create_date"':						
                        $stmt->bindValue($identifier, $this->create_date, PDO::PARAM_STR);
                        break;
                    case '"last_update"':						
                        $stmt->bindValue($identifier, $this->last_update, PDO::PARAM_STR);
                        break;
                    case '"updater_id"':						
                        $stmt->bindValue($identifier, $this->updater_id, PDO::PARAM_STR);
                        break;
                    case '"last_sync"':						
                        $stmt->bindValue($identifier, $this->last_sync, PDO::PARAM_STR);
                        break;
                    case '"soft_delete"':						
                        $stmt->bindValue($identifier, $this->soft_delete, PDO::PARAM_INT);
                        break;
                    case '"nama_table"':						
                        $stmt->bindValue($identifier, $this->nama_table, PDO::PARAM_STR);
                        break;
                    case '"nama_alias"':						
                        $stmt->bindValue($identifier, $this->nama_alias, PDO::PARAM_STR);
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

            if ($this->aWsAplikasi !== null) {
                if (!$this->aWsAplikasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aWsAplikasi->getValidationFailures());
                }
            }


            if (($retval = WsRoleTablePeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collWsRoleColumns !== null) {
                    foreach ($this->collWsRoleColumns as $referrerFK) {
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
        $pos = WsRoleTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getRoleTableId();
                break;
            case 1:
                return $this->getAplikasiId();
                break;
            case 2:
                return $this->getRoleRead();
                break;
            case 3:
                return $this->getRoleCreate();
                break;
            case 4:
                return $this->getRoleUpdate();
                break;
            case 5:
                return $this->getRoleDelete();
                break;
            case 6:
                return $this->getAsalData();
                break;
            case 7:
                return $this->getAktif();
                break;
            case 8:
                return $this->getExpiredDate();
                break;
            case 9:
                return $this->getCreateDate();
                break;
            case 10:
                return $this->getLastUpdate();
                break;
            case 11:
                return $this->getUpdaterId();
                break;
            case 12:
                return $this->getLastSync();
                break;
            case 13:
                return $this->getSoftDelete();
                break;
            case 14:
                return $this->getNamaTable();
                break;
            case 15:
                return $this->getNamaAlias();
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
        if (isset($alreadyDumpedObjects['WsRoleTable'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WsRoleTable'][$this->getPrimaryKey()] = true;
        $keys = WsRoleTablePeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getRoleTableId(),
            $keys[1] => $this->getAplikasiId(),
            $keys[2] => $this->getRoleRead(),
            $keys[3] => $this->getRoleCreate(),
            $keys[4] => $this->getRoleUpdate(),
            $keys[5] => $this->getRoleDelete(),
            $keys[6] => $this->getAsalData(),
            $keys[7] => $this->getAktif(),
            $keys[8] => $this->getExpiredDate(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getUpdaterId(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getSoftDelete(),
            $keys[14] => $this->getNamaTable(),
            $keys[15] => $this->getNamaAlias(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aWsAplikasi) {
                $result['WsAplikasi'] = $this->aWsAplikasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collWsRoleColumns) {
                $result['WsRoleColumns'] = $this->collWsRoleColumns->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = WsRoleTablePeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setRoleTableId($value);
                break;
            case 1:
                $this->setAplikasiId($value);
                break;
            case 2:
                $this->setRoleRead($value);
                break;
            case 3:
                $this->setRoleCreate($value);
                break;
            case 4:
                $this->setRoleUpdate($value);
                break;
            case 5:
                $this->setRoleDelete($value);
                break;
            case 6:
                $this->setAsalData($value);
                break;
            case 7:
                $this->setAktif($value);
                break;
            case 8:
                $this->setExpiredDate($value);
                break;
            case 9:
                $this->setCreateDate($value);
                break;
            case 10:
                $this->setLastUpdate($value);
                break;
            case 11:
                $this->setUpdaterId($value);
                break;
            case 12:
                $this->setLastSync($value);
                break;
            case 13:
                $this->setSoftDelete($value);
                break;
            case 14:
                $this->setNamaTable($value);
                break;
            case 15:
                $this->setNamaAlias($value);
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
        $keys = WsRoleTablePeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setRoleTableId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAplikasiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setRoleRead($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setRoleCreate($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setRoleUpdate($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setRoleDelete($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAsalData($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAktif($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setExpiredDate($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setCreateDate($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setLastUpdate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setUpdaterId($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastSync($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setSoftDelete($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setNamaTable($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setNamaAlias($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WsRoleTablePeer::DATABASE_NAME);

        if ($this->isColumnModified(WsRoleTablePeer::ROLE_TABLE_ID)) $criteria->add(WsRoleTablePeer::ROLE_TABLE_ID, $this->role_table_id);
        if ($this->isColumnModified(WsRoleTablePeer::APLIKASI_ID)) $criteria->add(WsRoleTablePeer::APLIKASI_ID, $this->aplikasi_id);
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_READ)) $criteria->add(WsRoleTablePeer::ROLE_READ, $this->role_read);
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_CREATE)) $criteria->add(WsRoleTablePeer::ROLE_CREATE, $this->role_create);
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_UPDATE)) $criteria->add(WsRoleTablePeer::ROLE_UPDATE, $this->role_update);
        if ($this->isColumnModified(WsRoleTablePeer::ROLE_DELETE)) $criteria->add(WsRoleTablePeer::ROLE_DELETE, $this->role_delete);
        if ($this->isColumnModified(WsRoleTablePeer::ASAL_DATA)) $criteria->add(WsRoleTablePeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(WsRoleTablePeer::AKTIF)) $criteria->add(WsRoleTablePeer::AKTIF, $this->aktif);
        if ($this->isColumnModified(WsRoleTablePeer::EXPIRED_DATE)) $criteria->add(WsRoleTablePeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(WsRoleTablePeer::CREATE_DATE)) $criteria->add(WsRoleTablePeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(WsRoleTablePeer::LAST_UPDATE)) $criteria->add(WsRoleTablePeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(WsRoleTablePeer::UPDATER_ID)) $criteria->add(WsRoleTablePeer::UPDATER_ID, $this->updater_id);
        if ($this->isColumnModified(WsRoleTablePeer::LAST_SYNC)) $criteria->add(WsRoleTablePeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(WsRoleTablePeer::SOFT_DELETE)) $criteria->add(WsRoleTablePeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(WsRoleTablePeer::NAMA_TABLE)) $criteria->add(WsRoleTablePeer::NAMA_TABLE, $this->nama_table);
        if ($this->isColumnModified(WsRoleTablePeer::NAMA_ALIAS)) $criteria->add(WsRoleTablePeer::NAMA_ALIAS, $this->nama_alias);

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
        $criteria = new Criteria(WsRoleTablePeer::DATABASE_NAME);
        $criteria->add(WsRoleTablePeer::ROLE_TABLE_ID, $this->role_table_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getRoleTableId();
    }

    /**
     * Generic method to set the primary key (role_table_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setRoleTableId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getRoleTableId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of WsRoleTable (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setAplikasiId($this->getAplikasiId());
        $copyObj->setRoleRead($this->getRoleRead());
        $copyObj->setRoleCreate($this->getRoleCreate());
        $copyObj->setRoleUpdate($this->getRoleUpdate());
        $copyObj->setRoleDelete($this->getRoleDelete());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setAktif($this->getAktif());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setUpdaterId($this->getUpdaterId());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setSoftDelete($this->getSoftDelete());
        $copyObj->setNamaTable($this->getNamaTable());
        $copyObj->setNamaAlias($this->getNamaAlias());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getWsRoleColumns() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWsRoleColumn($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setRoleTableId(NULL); // this is a auto-increment column, so set to default value
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
     * @return WsRoleTable Clone of current object.
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
     * @return WsRoleTablePeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new WsRoleTablePeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a WsAplikasi object.
     *
     * @param             WsAplikasi $v
     * @return WsRoleTable The current object (for fluent API support)
     * @throws PropelException
     */
    public function setWsAplikasi(WsAplikasi $v = null)
    {
        if ($v === null) {
            $this->setAplikasiId(NULL);
        } else {
            $this->setAplikasiId($v->getAplikasiId());
        }

        $this->aWsAplikasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the WsAplikasi object, it will not be re-added.
        if ($v !== null) {
            $v->addWsRoleTable($this);
        }


        return $this;
    }


    /**
     * Get the associated WsAplikasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return WsAplikasi The associated WsAplikasi object.
     * @throws PropelException
     */
    public function getWsAplikasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aWsAplikasi === null && (($this->aplikasi_id !== "" && $this->aplikasi_id !== null)) && $doQuery) {
            $this->aWsAplikasi = WsAplikasiQuery::create()->findPk($this->aplikasi_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aWsAplikasi->addWsRoleTables($this);
             */
        }

        return $this->aWsAplikasi;
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
        if ('WsRoleColumn' == $relationName) {
            $this->initWsRoleColumns();
        }
    }

    /**
     * Clears out the collWsRoleColumns collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return WsRoleTable The current object (for fluent API support)
     * @see        addWsRoleColumns()
     */
    public function clearWsRoleColumns()
    {
        $this->collWsRoleColumns = null; // important to set this to null since that means it is uninitialized
        $this->collWsRoleColumnsPartial = null;

        return $this;
    }

    /**
     * reset is the collWsRoleColumns collection loaded partially
     *
     * @return void
     */
    public function resetPartialWsRoleColumns($v = true)
    {
        $this->collWsRoleColumnsPartial = $v;
    }

    /**
     * Initializes the collWsRoleColumns collection.
     *
     * By default this just sets the collWsRoleColumns collection to an empty array (like clearcollWsRoleColumns());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWsRoleColumns($overrideExisting = true)
    {
        if (null !== $this->collWsRoleColumns && !$overrideExisting) {
            return;
        }
        $this->collWsRoleColumns = new PropelObjectCollection();
        $this->collWsRoleColumns->setModel('WsRoleColumn');
    }

    /**
     * Gets an array of WsRoleColumn objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this WsRoleTable is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|WsRoleColumn[] List of WsRoleColumn objects
     * @throws PropelException
     */
    public function getWsRoleColumns($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collWsRoleColumnsPartial && !$this->isNew();
        if (null === $this->collWsRoleColumns || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collWsRoleColumns) {
                // return empty collection
                $this->initWsRoleColumns();
            } else {
                $collWsRoleColumns = WsRoleColumnQuery::create(null, $criteria)
                    ->filterByWsRoleTable($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collWsRoleColumnsPartial && count($collWsRoleColumns)) {
                      $this->initWsRoleColumns(false);

                      foreach($collWsRoleColumns as $obj) {
                        if (false == $this->collWsRoleColumns->contains($obj)) {
                          $this->collWsRoleColumns->append($obj);
                        }
                      }

                      $this->collWsRoleColumnsPartial = true;
                    }

                    $collWsRoleColumns->getInternalIterator()->rewind();
                    return $collWsRoleColumns;
                }

                if($partial && $this->collWsRoleColumns) {
                    foreach($this->collWsRoleColumns as $obj) {
                        if($obj->isNew()) {
                            $collWsRoleColumns[] = $obj;
                        }
                    }
                }

                $this->collWsRoleColumns = $collWsRoleColumns;
                $this->collWsRoleColumnsPartial = false;
            }
        }

        return $this->collWsRoleColumns;
    }

    /**
     * Sets a collection of WsRoleColumn objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $wsRoleColumns A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function setWsRoleColumns(PropelCollection $wsRoleColumns, PropelPDO $con = null)
    {
        $wsRoleColumnsToDelete = $this->getWsRoleColumns(new Criteria(), $con)->diff($wsRoleColumns);

        $this->wsRoleColumnsScheduledForDeletion = unserialize(serialize($wsRoleColumnsToDelete));

        foreach ($wsRoleColumnsToDelete as $wsRoleColumnRemoved) {
            $wsRoleColumnRemoved->setWsRoleTable(null);
        }

        $this->collWsRoleColumns = null;
        foreach ($wsRoleColumns as $wsRoleColumn) {
            $this->addWsRoleColumn($wsRoleColumn);
        }

        $this->collWsRoleColumns = $wsRoleColumns;
        $this->collWsRoleColumnsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related WsRoleColumn objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related WsRoleColumn objects.
     * @throws PropelException
     */
    public function countWsRoleColumns(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collWsRoleColumnsPartial && !$this->isNew();
        if (null === $this->collWsRoleColumns || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collWsRoleColumns) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getWsRoleColumns());
            }
            $query = WsRoleColumnQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByWsRoleTable($this)
                ->count($con);
        }

        return count($this->collWsRoleColumns);
    }

    /**
     * Method called to associate a WsRoleColumn object to this object
     * through the WsRoleColumn foreign key attribute.
     *
     * @param    WsRoleColumn $l WsRoleColumn
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function addWsRoleColumn(WsRoleColumn $l)
    {
        if ($this->collWsRoleColumns === null) {
            $this->initWsRoleColumns();
            $this->collWsRoleColumnsPartial = true;
        }
        if (!in_array($l, $this->collWsRoleColumns->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddWsRoleColumn($l);
        }

        return $this;
    }

    /**
     * @param	WsRoleColumn $wsRoleColumn The wsRoleColumn object to add.
     */
    protected function doAddWsRoleColumn($wsRoleColumn)
    {
        $this->collWsRoleColumns[]= $wsRoleColumn;
        $wsRoleColumn->setWsRoleTable($this);
    }

    /**
     * @param	WsRoleColumn $wsRoleColumn The wsRoleColumn object to remove.
     * @return WsRoleTable The current object (for fluent API support)
     */
    public function removeWsRoleColumn($wsRoleColumn)
    {
        if ($this->getWsRoleColumns()->contains($wsRoleColumn)) {
            $this->collWsRoleColumns->remove($this->collWsRoleColumns->search($wsRoleColumn));
            if (null === $this->wsRoleColumnsScheduledForDeletion) {
                $this->wsRoleColumnsScheduledForDeletion = clone $this->collWsRoleColumns;
                $this->wsRoleColumnsScheduledForDeletion->clear();
            }
            $this->wsRoleColumnsScheduledForDeletion[]= clone $wsRoleColumn;
            $wsRoleColumn->setWsRoleTable(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->role_table_id = null;
        $this->aplikasi_id = null;
        $this->role_read = null;
        $this->role_create = null;
        $this->role_update = null;
        $this->role_delete = null;
        $this->asal_data = null;
        $this->aktif = null;
        $this->expired_date = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->updater_id = null;
        $this->last_sync = null;
        $this->soft_delete = null;
        $this->nama_table = null;
        $this->nama_alias = null;
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
            if ($this->collWsRoleColumns) {
                foreach ($this->collWsRoleColumns as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aWsAplikasi instanceof Persistent) {
              $this->aWsAplikasi->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collWsRoleColumns instanceof PropelCollection) {
            $this->collWsRoleColumns->clearIterator();
        }
        $this->collWsRoleColumns = null;
        $this->aWsAplikasi = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WsRoleTablePeer::DEFAULT_STRING_FORMAT);
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
