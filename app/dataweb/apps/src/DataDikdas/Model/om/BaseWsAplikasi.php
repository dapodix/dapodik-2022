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
use DataDikdas\Model\WsAplikasiPeer;
use DataDikdas\Model\WsAplikasiQuery;
use DataDikdas\Model\WsRoleTable;
use DataDikdas\Model\WsRoleTableQuery;

/**
 * Base class that represents a row from the 'ws_aplikasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsAplikasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\WsAplikasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        WsAplikasiPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the aplikasi_id field.
     * @var        string
     */
    protected $aplikasi_id;

    /**
     * The value for the nama field.
     * @var        string
     */
    protected $nama;

    /**
     * The value for the token field.
     * @var        string
     */
    protected $token;

    /**
     * The value for the password field.
     * @var        string
     */
    protected $password;

    /**
     * The value for the ip_address field.
     * @var        string
     */
    protected $ip_address;

    /**
     * The value for the port field.
     * @var        string
     */
    protected $port;

    /**
     * The value for the mac_address field.
     * @var        string
     */
    protected $mac_address;

    /**
     * The value for the asal_data field.
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
     * @var        PropelObjectCollection|WsRoleTable[] Collection to store aggregation of WsRoleTable objects.
     */
    protected $collWsRoleTables;
    protected $collWsRoleTablesPartial;

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
    protected $wsRoleTablesScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->aktif = '1';
        $this->soft_delete = 0;
    }

    /**
     * Initializes internal state of BaseWsAplikasi object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
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
     * Get the [aplikasi_id] column value.
     * 
     * @return string
     */
    public function getAplikasiId()
    {
        return $this->aplikasi_id;
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
     * Get the [token] column value.
     * 
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the [password] column value.
     * 
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the [ip_address] column value.
     * 
     * @return string
     */
    public function getIpAddress()
    {
        return $this->ip_address;
    }

    /**
     * Get the [port] column value.
     * 
     * @return string
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * Get the [mac_address] column value.
     * 
     * @return string
     */
    public function getMacAddress()
    {
        return $this->mac_address;
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
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::SEKOLAH_ID;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [aplikasi_id] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setAplikasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aplikasi_id !== $v) {
            $this->aplikasi_id = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::APLIKASI_ID;
        }


        return $this;
    } // setAplikasiId()

    /**
     * Set the value of [nama] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setNama($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nama !== $v) {
            $this->nama = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::NAMA;
        }


        return $this;
    } // setNama()

    /**
     * Set the value of [token] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setToken($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->token !== $v) {
            $this->token = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::TOKEN;
        }


        return $this;
    } // setToken()

    /**
     * Set the value of [password] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setPassword($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->password !== $v) {
            $this->password = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::PASSWORD;
        }


        return $this;
    } // setPassword()

    /**
     * Set the value of [ip_address] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setIpAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ip_address !== $v) {
            $this->ip_address = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::IP_ADDRESS;
        }


        return $this;
    } // setIpAddress()

    /**
     * Set the value of [port] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setPort($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->port !== $v) {
            $this->port = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::PORT;
        }


        return $this;
    } // setPort()

    /**
     * Set the value of [mac_address] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setMacAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mac_address !== $v) {
            $this->mac_address = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::MAC_ADDRESS;
        }


        return $this;
    } // setMacAddress()

    /**
     * Set the value of [asal_data] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setAsalData($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->asal_data !== $v) {
            $this->asal_data = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::ASAL_DATA;
        }


        return $this;
    } // setAsalData()

    /**
     * Set the value of [aktif] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->aktif !== $v) {
            $this->aktif = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::AKTIF;
        }


        return $this;
    } // setAktif()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = WsAplikasiPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = WsAplikasiPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = WsAplikasiPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::UPDATER_ID;
        }


        return $this;
    } // setUpdaterId()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setLastSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->last_sync !== null && $tmpDt = new DateTime($this->last_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_sync = $newDateAsString;
                $this->modifiedColumns[] = WsAplikasiPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param int $v new value
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = WsAplikasiPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

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

            $this->sekolah_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->aplikasi_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->nama = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->token = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->password = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ip_address = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->port = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->mac_address = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->asal_data = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->aktif = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->expired_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->create_date = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->last_update = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->updater_id = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->last_sync = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->soft_delete = ($row[$startcol + 15] !== null) ? (int) $row[$startcol + 15] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 16; // 16 = WsAplikasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating WsAplikasi object", $e);
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
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = WsAplikasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->collWsRoleTables = null;

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
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = WsAplikasiQuery::create()
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
            $con = Propel::getConnection(WsAplikasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                WsAplikasiPeer::addInstanceToPool($this);
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

            if ($this->wsRoleTablesScheduledForDeletion !== null) {
                if (!$this->wsRoleTablesScheduledForDeletion->isEmpty()) {
                    WsRoleTableQuery::create()
                        ->filterByPrimaryKeys($this->wsRoleTablesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->wsRoleTablesScheduledForDeletion = null;
                }
            }

            if ($this->collWsRoleTables !== null) {
                foreach ($this->collWsRoleTables as $referrerFK) {
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
        if ($this->isColumnModified(WsAplikasiPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::APLIKASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"aplikasi_id"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::NAMA)) {
            $modifiedColumns[':p' . $index++]  = '"nama"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '"token"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::PASSWORD)) {
            $modifiedColumns[':p' . $index++]  = '"password"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::IP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '"ip_address"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::PORT)) {
            $modifiedColumns[':p' . $index++]  = '"port"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::MAC_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '"mac_address"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::ASAL_DATA)) {
            $modifiedColumns[':p' . $index++]  = '"asal_data"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"aktif"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(WsAplikasiPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }

        $sql = sprintf(
            'INSERT INTO "ws_aplikasi" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"aplikasi_id"':						
                        $stmt->bindValue($identifier, $this->aplikasi_id, PDO::PARAM_STR);
                        break;
                    case '"nama"':						
                        $stmt->bindValue($identifier, $this->nama, PDO::PARAM_STR);
                        break;
                    case '"token"':						
                        $stmt->bindValue($identifier, $this->token, PDO::PARAM_STR);
                        break;
                    case '"password"':						
                        $stmt->bindValue($identifier, $this->password, PDO::PARAM_STR);
                        break;
                    case '"ip_address"':						
                        $stmt->bindValue($identifier, $this->ip_address, PDO::PARAM_STR);
                        break;
                    case '"port"':						
                        $stmt->bindValue($identifier, $this->port, PDO::PARAM_STR);
                        break;
                    case '"mac_address"':						
                        $stmt->bindValue($identifier, $this->mac_address, PDO::PARAM_STR);
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


            if (($retval = WsAplikasiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collWsRoleTables !== null) {
                    foreach ($this->collWsRoleTables as $referrerFK) {
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
        $pos = WsAplikasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getSekolahId();
                break;
            case 1:
                return $this->getAplikasiId();
                break;
            case 2:
                return $this->getNama();
                break;
            case 3:
                return $this->getToken();
                break;
            case 4:
                return $this->getPassword();
                break;
            case 5:
                return $this->getIpAddress();
                break;
            case 6:
                return $this->getPort();
                break;
            case 7:
                return $this->getMacAddress();
                break;
            case 8:
                return $this->getAsalData();
                break;
            case 9:
                return $this->getAktif();
                break;
            case 10:
                return $this->getExpiredDate();
                break;
            case 11:
                return $this->getCreateDate();
                break;
            case 12:
                return $this->getLastUpdate();
                break;
            case 13:
                return $this->getUpdaterId();
                break;
            case 14:
                return $this->getLastSync();
                break;
            case 15:
                return $this->getSoftDelete();
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
        if (isset($alreadyDumpedObjects['WsAplikasi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WsAplikasi'][$this->getPrimaryKey()] = true;
        $keys = WsAplikasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getSekolahId(),
            $keys[1] => $this->getAplikasiId(),
            $keys[2] => $this->getNama(),
            $keys[3] => $this->getToken(),
            $keys[4] => $this->getPassword(),
            $keys[5] => $this->getIpAddress(),
            $keys[6] => $this->getPort(),
            $keys[7] => $this->getMacAddress(),
            $keys[8] => $this->getAsalData(),
            $keys[9] => $this->getAktif(),
            $keys[10] => $this->getExpiredDate(),
            $keys[11] => $this->getCreateDate(),
            $keys[12] => $this->getLastUpdate(),
            $keys[13] => $this->getUpdaterId(),
            $keys[14] => $this->getLastSync(),
            $keys[15] => $this->getSoftDelete(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->collWsRoleTables) {
                $result['WsRoleTables'] = $this->collWsRoleTables->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = WsAplikasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setSekolahId($value);
                break;
            case 1:
                $this->setAplikasiId($value);
                break;
            case 2:
                $this->setNama($value);
                break;
            case 3:
                $this->setToken($value);
                break;
            case 4:
                $this->setPassword($value);
                break;
            case 5:
                $this->setIpAddress($value);
                break;
            case 6:
                $this->setPort($value);
                break;
            case 7:
                $this->setMacAddress($value);
                break;
            case 8:
                $this->setAsalData($value);
                break;
            case 9:
                $this->setAktif($value);
                break;
            case 10:
                $this->setExpiredDate($value);
                break;
            case 11:
                $this->setCreateDate($value);
                break;
            case 12:
                $this->setLastUpdate($value);
                break;
            case 13:
                $this->setUpdaterId($value);
                break;
            case 14:
                $this->setLastSync($value);
                break;
            case 15:
                $this->setSoftDelete($value);
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
        $keys = WsAplikasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setSekolahId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setAplikasiId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setToken($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setIpAddress($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setPort($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMacAddress($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setAsalData($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setAktif($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setExpiredDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setCreateDate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setLastUpdate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setUpdaterId($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setLastSync($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setSoftDelete($arr[$keys[15]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(WsAplikasiPeer::SEKOLAH_ID)) $criteria->add(WsAplikasiPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(WsAplikasiPeer::APLIKASI_ID)) $criteria->add(WsAplikasiPeer::APLIKASI_ID, $this->aplikasi_id);
        if ($this->isColumnModified(WsAplikasiPeer::NAMA)) $criteria->add(WsAplikasiPeer::NAMA, $this->nama);
        if ($this->isColumnModified(WsAplikasiPeer::TOKEN)) $criteria->add(WsAplikasiPeer::TOKEN, $this->token);
        if ($this->isColumnModified(WsAplikasiPeer::PASSWORD)) $criteria->add(WsAplikasiPeer::PASSWORD, $this->password);
        if ($this->isColumnModified(WsAplikasiPeer::IP_ADDRESS)) $criteria->add(WsAplikasiPeer::IP_ADDRESS, $this->ip_address);
        if ($this->isColumnModified(WsAplikasiPeer::PORT)) $criteria->add(WsAplikasiPeer::PORT, $this->port);
        if ($this->isColumnModified(WsAplikasiPeer::MAC_ADDRESS)) $criteria->add(WsAplikasiPeer::MAC_ADDRESS, $this->mac_address);
        if ($this->isColumnModified(WsAplikasiPeer::ASAL_DATA)) $criteria->add(WsAplikasiPeer::ASAL_DATA, $this->asal_data);
        if ($this->isColumnModified(WsAplikasiPeer::AKTIF)) $criteria->add(WsAplikasiPeer::AKTIF, $this->aktif);
        if ($this->isColumnModified(WsAplikasiPeer::EXPIRED_DATE)) $criteria->add(WsAplikasiPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(WsAplikasiPeer::CREATE_DATE)) $criteria->add(WsAplikasiPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(WsAplikasiPeer::LAST_UPDATE)) $criteria->add(WsAplikasiPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(WsAplikasiPeer::UPDATER_ID)) $criteria->add(WsAplikasiPeer::UPDATER_ID, $this->updater_id);
        if ($this->isColumnModified(WsAplikasiPeer::LAST_SYNC)) $criteria->add(WsAplikasiPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(WsAplikasiPeer::SOFT_DELETE)) $criteria->add(WsAplikasiPeer::SOFT_DELETE, $this->soft_delete);

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
        $criteria = new Criteria(WsAplikasiPeer::DATABASE_NAME);
        $criteria->add(WsAplikasiPeer::APLIKASI_ID, $this->aplikasi_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getAplikasiId();
    }

    /**
     * Generic method to set the primary key (aplikasi_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setAplikasiId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getAplikasiId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of WsAplikasi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setNama($this->getNama());
        $copyObj->setToken($this->getToken());
        $copyObj->setPassword($this->getPassword());
        $copyObj->setIpAddress($this->getIpAddress());
        $copyObj->setPort($this->getPort());
        $copyObj->setMacAddress($this->getMacAddress());
        $copyObj->setAsalData($this->getAsalData());
        $copyObj->setAktif($this->getAktif());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setCreateDate($this->getCreateDate());
        $copyObj->setLastUpdate($this->getLastUpdate());
        $copyObj->setUpdaterId($this->getUpdaterId());
        $copyObj->setLastSync($this->getLastSync());
        $copyObj->setSoftDelete($this->getSoftDelete());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getWsRoleTables() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addWsRoleTable($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setAplikasiId(NULL); // this is a auto-increment column, so set to default value
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
     * @return WsAplikasi Clone of current object.
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
     * @return WsAplikasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new WsAplikasiPeer();
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
        if ('WsRoleTable' == $relationName) {
            $this->initWsRoleTables();
        }
    }

    /**
     * Clears out the collWsRoleTables collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return WsAplikasi The current object (for fluent API support)
     * @see        addWsRoleTables()
     */
    public function clearWsRoleTables()
    {
        $this->collWsRoleTables = null; // important to set this to null since that means it is uninitialized
        $this->collWsRoleTablesPartial = null;

        return $this;
    }

    /**
     * reset is the collWsRoleTables collection loaded partially
     *
     * @return void
     */
    public function resetPartialWsRoleTables($v = true)
    {
        $this->collWsRoleTablesPartial = $v;
    }

    /**
     * Initializes the collWsRoleTables collection.
     *
     * By default this just sets the collWsRoleTables collection to an empty array (like clearcollWsRoleTables());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initWsRoleTables($overrideExisting = true)
    {
        if (null !== $this->collWsRoleTables && !$overrideExisting) {
            return;
        }
        $this->collWsRoleTables = new PropelObjectCollection();
        $this->collWsRoleTables->setModel('WsRoleTable');
    }

    /**
     * Gets an array of WsRoleTable objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this WsAplikasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|WsRoleTable[] List of WsRoleTable objects
     * @throws PropelException
     */
    public function getWsRoleTables($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collWsRoleTablesPartial && !$this->isNew();
        if (null === $this->collWsRoleTables || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collWsRoleTables) {
                // return empty collection
                $this->initWsRoleTables();
            } else {
                $collWsRoleTables = WsRoleTableQuery::create(null, $criteria)
                    ->filterByWsAplikasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collWsRoleTablesPartial && count($collWsRoleTables)) {
                      $this->initWsRoleTables(false);

                      foreach($collWsRoleTables as $obj) {
                        if (false == $this->collWsRoleTables->contains($obj)) {
                          $this->collWsRoleTables->append($obj);
                        }
                      }

                      $this->collWsRoleTablesPartial = true;
                    }

                    $collWsRoleTables->getInternalIterator()->rewind();
                    return $collWsRoleTables;
                }

                if($partial && $this->collWsRoleTables) {
                    foreach($this->collWsRoleTables as $obj) {
                        if($obj->isNew()) {
                            $collWsRoleTables[] = $obj;
                        }
                    }
                }

                $this->collWsRoleTables = $collWsRoleTables;
                $this->collWsRoleTablesPartial = false;
            }
        }

        return $this->collWsRoleTables;
    }

    /**
     * Sets a collection of WsRoleTable objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $wsRoleTables A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function setWsRoleTables(PropelCollection $wsRoleTables, PropelPDO $con = null)
    {
        $wsRoleTablesToDelete = $this->getWsRoleTables(new Criteria(), $con)->diff($wsRoleTables);

        $this->wsRoleTablesScheduledForDeletion = unserialize(serialize($wsRoleTablesToDelete));

        foreach ($wsRoleTablesToDelete as $wsRoleTableRemoved) {
            $wsRoleTableRemoved->setWsAplikasi(null);
        }

        $this->collWsRoleTables = null;
        foreach ($wsRoleTables as $wsRoleTable) {
            $this->addWsRoleTable($wsRoleTable);
        }

        $this->collWsRoleTables = $wsRoleTables;
        $this->collWsRoleTablesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related WsRoleTable objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related WsRoleTable objects.
     * @throws PropelException
     */
    public function countWsRoleTables(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collWsRoleTablesPartial && !$this->isNew();
        if (null === $this->collWsRoleTables || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collWsRoleTables) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getWsRoleTables());
            }
            $query = WsRoleTableQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByWsAplikasi($this)
                ->count($con);
        }

        return count($this->collWsRoleTables);
    }

    /**
     * Method called to associate a WsRoleTable object to this object
     * through the WsRoleTable foreign key attribute.
     *
     * @param    WsRoleTable $l WsRoleTable
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function addWsRoleTable(WsRoleTable $l)
    {
        if ($this->collWsRoleTables === null) {
            $this->initWsRoleTables();
            $this->collWsRoleTablesPartial = true;
        }
        if (!in_array($l, $this->collWsRoleTables->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddWsRoleTable($l);
        }

        return $this;
    }

    /**
     * @param	WsRoleTable $wsRoleTable The wsRoleTable object to add.
     */
    protected function doAddWsRoleTable($wsRoleTable)
    {
        $this->collWsRoleTables[]= $wsRoleTable;
        $wsRoleTable->setWsAplikasi($this);
    }

    /**
     * @param	WsRoleTable $wsRoleTable The wsRoleTable object to remove.
     * @return WsAplikasi The current object (for fluent API support)
     */
    public function removeWsRoleTable($wsRoleTable)
    {
        if ($this->getWsRoleTables()->contains($wsRoleTable)) {
            $this->collWsRoleTables->remove($this->collWsRoleTables->search($wsRoleTable));
            if (null === $this->wsRoleTablesScheduledForDeletion) {
                $this->wsRoleTablesScheduledForDeletion = clone $this->collWsRoleTables;
                $this->wsRoleTablesScheduledForDeletion->clear();
            }
            $this->wsRoleTablesScheduledForDeletion[]= clone $wsRoleTable;
            $wsRoleTable->setWsAplikasi(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->sekolah_id = null;
        $this->aplikasi_id = null;
        $this->nama = null;
        $this->token = null;
        $this->password = null;
        $this->ip_address = null;
        $this->port = null;
        $this->mac_address = null;
        $this->asal_data = null;
        $this->aktif = null;
        $this->expired_date = null;
        $this->create_date = null;
        $this->last_update = null;
        $this->updater_id = null;
        $this->last_sync = null;
        $this->soft_delete = null;
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
            if ($this->collWsRoleTables) {
                foreach ($this->collWsRoleTables as $o) {
                    $o->clearAllReferences($deep);
                }
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collWsRoleTables instanceof PropelCollection) {
            $this->collWsRoleTables->clearIterator();
        }
        $this->collWsRoleTables = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WsAplikasiPeer::DEFAULT_STRING_FORMAT);
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
