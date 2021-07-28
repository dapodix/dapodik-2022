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
use DataDikdas\Model\Aplikasi;
use DataDikdas\Model\AplikasiQuery;
use DataDikdas\Model\Menu;
use DataDikdas\Model\MenuPeer;
use DataDikdas\Model\MenuQuery;
use DataDikdas\Model\MenuRole;
use DataDikdas\Model\MenuRoleQuery;

/**
 * Base class that represents a row from the 'man_akses.menu' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMenu extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MenuPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MenuPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_menu field.
     * @var        string
     */
    protected $id_menu;

    /**
     * The value for the men_id_menu field.
     * @var        string
     */
    protected $men_id_menu;

    /**
     * The value for the id_aplikasi field.
     * @var        string
     */
    protected $id_aplikasi;

    /**
     * The value for the nm_menu field.
     * @var        string
     */
    protected $nm_menu;

    /**
     * The value for the nm_file field.
     * @var        string
     */
    protected $nm_file;

    /**
     * The value for the level_menu field.
     * @var        string
     */
    protected $level_menu;

    /**
     * The value for the urutan_menu field.
     * @var        int
     */
    protected $urutan_menu;

    /**
     * The value for the a_aktif field.
     * @var        string
     */
    protected $a_aktif;

    /**
     * The value for the a_tampil field.
     * @var        string
     */
    protected $a_tampil;

    /**
     * The value for the icon field.
     * @var        string
     */
    protected $icon;

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
     * @var        Aplikasi
     */
    protected $aAplikasi;

    /**
     * @var        Menu
     */
    protected $aMenuRelatedByMenIdMenu;

    /**
     * @var        PropelObjectCollection|Menu[] Collection to store aggregation of Menu objects.
     */
    protected $collMenusRelatedByIdMenu;
    protected $collMenusRelatedByIdMenuPartial;

    /**
     * @var        PropelObjectCollection|MenuRole[] Collection to store aggregation of MenuRole objects.
     */
    protected $collMenuRoles;
    protected $collMenuRolesPartial;

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
    protected $menusRelatedByIdMenuScheduledForDeletion = null;

    /**
     * An array of objects scheduled for deletion.
     * @var		PropelObjectCollection
     */
    protected $menuRolesScheduledForDeletion = null;

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
     * Initializes internal state of BaseMenu object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_menu] column value.
     * 
     * @return string
     */
    public function getIdMenu()
    {
        return $this->id_menu;
    }

    /**
     * Get the [men_id_menu] column value.
     * 
     * @return string
     */
    public function getMenIdMenu()
    {
        return $this->men_id_menu;
    }

    /**
     * Get the [id_aplikasi] column value.
     * 
     * @return string
     */
    public function getIdAplikasi()
    {
        return $this->id_aplikasi;
    }

    /**
     * Get the [nm_menu] column value.
     * 
     * @return string
     */
    public function getNmMenu()
    {
        return $this->nm_menu;
    }

    /**
     * Get the [nm_file] column value.
     * 
     * @return string
     */
    public function getNmFile()
    {
        return $this->nm_file;
    }

    /**
     * Get the [level_menu] column value.
     * 
     * @return string
     */
    public function getLevelMenu()
    {
        return $this->level_menu;
    }

    /**
     * Get the [urutan_menu] column value.
     * 
     * @return int
     */
    public function getUrutanMenu()
    {
        return $this->urutan_menu;
    }

    /**
     * Get the [a_aktif] column value.
     * 
     * @return string
     */
    public function getAAktif()
    {
        return $this->a_aktif;
    }

    /**
     * Get the [a_tampil] column value.
     * 
     * @return string
     */
    public function getATampil()
    {
        return $this->a_tampil;
    }

    /**
     * Get the [icon] column value.
     * 
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
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
     * Set the value of [id_menu] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setIdMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_menu !== $v) {
            $this->id_menu = $v;
            $this->modifiedColumns[] = MenuPeer::ID_MENU;
        }


        return $this;
    } // setIdMenu()

    /**
     * Set the value of [men_id_menu] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setMenIdMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->men_id_menu !== $v) {
            $this->men_id_menu = $v;
            $this->modifiedColumns[] = MenuPeer::MEN_ID_MENU;
        }

        if ($this->aMenuRelatedByMenIdMenu !== null && $this->aMenuRelatedByMenIdMenu->getIdMenu() !== $v) {
            $this->aMenuRelatedByMenIdMenu = null;
        }


        return $this;
    } // setMenIdMenu()

    /**
     * Set the value of [id_aplikasi] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setIdAplikasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_aplikasi !== $v) {
            $this->id_aplikasi = $v;
            $this->modifiedColumns[] = MenuPeer::ID_APLIKASI;
        }

        if ($this->aAplikasi !== null && $this->aAplikasi->getIdAplikasi() !== $v) {
            $this->aAplikasi = null;
        }


        return $this;
    } // setIdAplikasi()

    /**
     * Set the value of [nm_menu] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setNmMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_menu !== $v) {
            $this->nm_menu = $v;
            $this->modifiedColumns[] = MenuPeer::NM_MENU;
        }


        return $this;
    } // setNmMenu()

    /**
     * Set the value of [nm_file] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setNmFile($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_file !== $v) {
            $this->nm_file = $v;
            $this->modifiedColumns[] = MenuPeer::NM_FILE;
        }


        return $this;
    } // setNmFile()

    /**
     * Set the value of [level_menu] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setLevelMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->level_menu !== $v) {
            $this->level_menu = $v;
            $this->modifiedColumns[] = MenuPeer::LEVEL_MENU;
        }


        return $this;
    } // setLevelMenu()

    /**
     * Set the value of [urutan_menu] column.
     * 
     * @param int $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setUrutanMenu($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->urutan_menu !== $v) {
            $this->urutan_menu = $v;
            $this->modifiedColumns[] = MenuPeer::URUTAN_MENU;
        }


        return $this;
    } // setUrutanMenu()

    /**
     * Set the value of [a_aktif] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setAAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_aktif !== $v) {
            $this->a_aktif = $v;
            $this->modifiedColumns[] = MenuPeer::A_AKTIF;
        }


        return $this;
    } // setAAktif()

    /**
     * Set the value of [a_tampil] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setATampil($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_tampil !== $v) {
            $this->a_tampil = $v;
            $this->modifiedColumns[] = MenuPeer::A_TAMPIL;
        }


        return $this;
    } // setATampil()

    /**
     * Set the value of [icon] column.
     * 
     * @param string $v new value
     * @return Menu The current object (for fluent API support)
     */
    public function setIcon($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->icon !== $v) {
            $this->icon = $v;
            $this->modifiedColumns[] = MenuPeer::ICON;
        }


        return $this;
    } // setIcon()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Menu The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = MenuPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Menu The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = MenuPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Menu The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = MenuPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Menu The current object (for fluent API support)
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
                $this->modifiedColumns[] = MenuPeer::LAST_SYNC;
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

            $this->id_menu = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->men_id_menu = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->id_aplikasi = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->nm_menu = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->nm_file = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->level_menu = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->urutan_menu = ($row[$startcol + 6] !== null) ? (int) $row[$startcol + 6] : null;
            $this->a_aktif = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->a_tampil = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->icon = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->create_date = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->last_update = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->expired_date = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->last_sync = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 14; // 14 = MenuPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Menu object", $e);
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

        if ($this->aMenuRelatedByMenIdMenu !== null && $this->men_id_menu !== $this->aMenuRelatedByMenIdMenu->getIdMenu()) {
            $this->aMenuRelatedByMenIdMenu = null;
        }
        if ($this->aAplikasi !== null && $this->id_aplikasi !== $this->aAplikasi->getIdAplikasi()) {
            $this->aAplikasi = null;
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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MenuPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aAplikasi = null;
            $this->aMenuRelatedByMenIdMenu = null;
            $this->collMenusRelatedByIdMenu = null;

            $this->collMenuRoles = null;

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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MenuQuery::create()
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
            $con = Propel::getConnection(MenuPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MenuPeer::addInstanceToPool($this);
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

            if ($this->aAplikasi !== null) {
                if ($this->aAplikasi->isModified() || $this->aAplikasi->isNew()) {
                    $affectedRows += $this->aAplikasi->save($con);
                }
                $this->setAplikasi($this->aAplikasi);
            }

            if ($this->aMenuRelatedByMenIdMenu !== null) {
                if ($this->aMenuRelatedByMenIdMenu->isModified() || $this->aMenuRelatedByMenIdMenu->isNew()) {
                    $affectedRows += $this->aMenuRelatedByMenIdMenu->save($con);
                }
                $this->setMenuRelatedByMenIdMenu($this->aMenuRelatedByMenIdMenu);
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

            if ($this->menusRelatedByIdMenuScheduledForDeletion !== null) {
                if (!$this->menusRelatedByIdMenuScheduledForDeletion->isEmpty()) {
                    foreach ($this->menusRelatedByIdMenuScheduledForDeletion as $menuRelatedByIdMenu) {
                        // need to save related object because we set the relation to null
                        $menuRelatedByIdMenu->save($con);
                    }
                    $this->menusRelatedByIdMenuScheduledForDeletion = null;
                }
            }

            if ($this->collMenusRelatedByIdMenu !== null) {
                foreach ($this->collMenusRelatedByIdMenu as $referrerFK) {
                    if (!$referrerFK->isDeleted() && ($referrerFK->isNew() || $referrerFK->isModified())) {
                        $affectedRows += $referrerFK->save($con);
                    }
                }
            }

            if ($this->menuRolesScheduledForDeletion !== null) {
                if (!$this->menuRolesScheduledForDeletion->isEmpty()) {
                    MenuRoleQuery::create()
                        ->filterByPrimaryKeys($this->menuRolesScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->menuRolesScheduledForDeletion = null;
                }
            }

            if ($this->collMenuRoles !== null) {
                foreach ($this->collMenuRoles as $referrerFK) {
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
        if ($this->isColumnModified(MenuPeer::ID_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"id_menu"';
        }
        if ($this->isColumnModified(MenuPeer::MEN_ID_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"men_id_menu"';
        }
        if ($this->isColumnModified(MenuPeer::ID_APLIKASI)) {
            $modifiedColumns[':p' . $index++]  = '"id_aplikasi"';
        }
        if ($this->isColumnModified(MenuPeer::NM_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"nm_menu"';
        }
        if ($this->isColumnModified(MenuPeer::NM_FILE)) {
            $modifiedColumns[':p' . $index++]  = '"nm_file"';
        }
        if ($this->isColumnModified(MenuPeer::LEVEL_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"level_menu"';
        }
        if ($this->isColumnModified(MenuPeer::URUTAN_MENU)) {
            $modifiedColumns[':p' . $index++]  = '"urutan_menu"';
        }
        if ($this->isColumnModified(MenuPeer::A_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"a_aktif"';
        }
        if ($this->isColumnModified(MenuPeer::A_TAMPIL)) {
            $modifiedColumns[':p' . $index++]  = '"a_tampil"';
        }
        if ($this->isColumnModified(MenuPeer::ICON)) {
            $modifiedColumns[':p' . $index++]  = '"icon"';
        }
        if ($this->isColumnModified(MenuPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MenuPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MenuPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(MenuPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "man_akses"."menu" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_menu"':						
                        $stmt->bindValue($identifier, $this->id_menu, PDO::PARAM_STR);
                        break;
                    case '"men_id_menu"':						
                        $stmt->bindValue($identifier, $this->men_id_menu, PDO::PARAM_STR);
                        break;
                    case '"id_aplikasi"':						
                        $stmt->bindValue($identifier, $this->id_aplikasi, PDO::PARAM_STR);
                        break;
                    case '"nm_menu"':						
                        $stmt->bindValue($identifier, $this->nm_menu, PDO::PARAM_STR);
                        break;
                    case '"nm_file"':						
                        $stmt->bindValue($identifier, $this->nm_file, PDO::PARAM_STR);
                        break;
                    case '"level_menu"':						
                        $stmt->bindValue($identifier, $this->level_menu, PDO::PARAM_STR);
                        break;
                    case '"urutan_menu"':						
                        $stmt->bindValue($identifier, $this->urutan_menu, PDO::PARAM_INT);
                        break;
                    case '"a_aktif"':						
                        $stmt->bindValue($identifier, $this->a_aktif, PDO::PARAM_STR);
                        break;
                    case '"a_tampil"':						
                        $stmt->bindValue($identifier, $this->a_tampil, PDO::PARAM_STR);
                        break;
                    case '"icon"':						
                        $stmt->bindValue($identifier, $this->icon, PDO::PARAM_STR);
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

            if ($this->aAplikasi !== null) {
                if (!$this->aAplikasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aAplikasi->getValidationFailures());
                }
            }

            if ($this->aMenuRelatedByMenIdMenu !== null) {
                if (!$this->aMenuRelatedByMenIdMenu->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMenuRelatedByMenIdMenu->getValidationFailures());
                }
            }


            if (($retval = MenuPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collMenusRelatedByIdMenu !== null) {
                    foreach ($this->collMenusRelatedByIdMenu as $referrerFK) {
                        if (!$referrerFK->validate($columns)) {
                            $failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
                        }
                    }
                }

                if ($this->collMenuRoles !== null) {
                    foreach ($this->collMenuRoles as $referrerFK) {
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
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdMenu();
                break;
            case 1:
                return $this->getMenIdMenu();
                break;
            case 2:
                return $this->getIdAplikasi();
                break;
            case 3:
                return $this->getNmMenu();
                break;
            case 4:
                return $this->getNmFile();
                break;
            case 5:
                return $this->getLevelMenu();
                break;
            case 6:
                return $this->getUrutanMenu();
                break;
            case 7:
                return $this->getAAktif();
                break;
            case 8:
                return $this->getATampil();
                break;
            case 9:
                return $this->getIcon();
                break;
            case 10:
                return $this->getCreateDate();
                break;
            case 11:
                return $this->getLastUpdate();
                break;
            case 12:
                return $this->getExpiredDate();
                break;
            case 13:
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
        if (isset($alreadyDumpedObjects['Menu'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Menu'][$this->getPrimaryKey()] = true;
        $keys = MenuPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdMenu(),
            $keys[1] => $this->getMenIdMenu(),
            $keys[2] => $this->getIdAplikasi(),
            $keys[3] => $this->getNmMenu(),
            $keys[4] => $this->getNmFile(),
            $keys[5] => $this->getLevelMenu(),
            $keys[6] => $this->getUrutanMenu(),
            $keys[7] => $this->getAAktif(),
            $keys[8] => $this->getATampil(),
            $keys[9] => $this->getIcon(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getExpiredDate(),
            $keys[13] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aAplikasi) {
                $result['Aplikasi'] = $this->aAplikasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMenuRelatedByMenIdMenu) {
                $result['MenuRelatedByMenIdMenu'] = $this->aMenuRelatedByMenIdMenu->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collMenusRelatedByIdMenu) {
                $result['MenusRelatedByIdMenu'] = $this->collMenusRelatedByIdMenu->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
            }
            if (null !== $this->collMenuRoles) {
                $result['MenuRoles'] = $this->collMenuRoles->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MenuPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdMenu($value);
                break;
            case 1:
                $this->setMenIdMenu($value);
                break;
            case 2:
                $this->setIdAplikasi($value);
                break;
            case 3:
                $this->setNmMenu($value);
                break;
            case 4:
                $this->setNmFile($value);
                break;
            case 5:
                $this->setLevelMenu($value);
                break;
            case 6:
                $this->setUrutanMenu($value);
                break;
            case 7:
                $this->setAAktif($value);
                break;
            case 8:
                $this->setATampil($value);
                break;
            case 9:
                $this->setIcon($value);
                break;
            case 10:
                $this->setCreateDate($value);
                break;
            case 11:
                $this->setLastUpdate($value);
                break;
            case 12:
                $this->setExpiredDate($value);
                break;
            case 13:
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
        $keys = MenuPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdMenu($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setMenIdMenu($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIdAplikasi($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNmMenu($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setNmFile($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setLevelMenu($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setUrutanMenu($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setAAktif($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setATampil($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setIcon($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCreateDate($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setLastUpdate($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setExpiredDate($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setLastSync($arr[$keys[13]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);

        if ($this->isColumnModified(MenuPeer::ID_MENU)) $criteria->add(MenuPeer::ID_MENU, $this->id_menu);
        if ($this->isColumnModified(MenuPeer::MEN_ID_MENU)) $criteria->add(MenuPeer::MEN_ID_MENU, $this->men_id_menu);
        if ($this->isColumnModified(MenuPeer::ID_APLIKASI)) $criteria->add(MenuPeer::ID_APLIKASI, $this->id_aplikasi);
        if ($this->isColumnModified(MenuPeer::NM_MENU)) $criteria->add(MenuPeer::NM_MENU, $this->nm_menu);
        if ($this->isColumnModified(MenuPeer::NM_FILE)) $criteria->add(MenuPeer::NM_FILE, $this->nm_file);
        if ($this->isColumnModified(MenuPeer::LEVEL_MENU)) $criteria->add(MenuPeer::LEVEL_MENU, $this->level_menu);
        if ($this->isColumnModified(MenuPeer::URUTAN_MENU)) $criteria->add(MenuPeer::URUTAN_MENU, $this->urutan_menu);
        if ($this->isColumnModified(MenuPeer::A_AKTIF)) $criteria->add(MenuPeer::A_AKTIF, $this->a_aktif);
        if ($this->isColumnModified(MenuPeer::A_TAMPIL)) $criteria->add(MenuPeer::A_TAMPIL, $this->a_tampil);
        if ($this->isColumnModified(MenuPeer::ICON)) $criteria->add(MenuPeer::ICON, $this->icon);
        if ($this->isColumnModified(MenuPeer::CREATE_DATE)) $criteria->add(MenuPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MenuPeer::LAST_UPDATE)) $criteria->add(MenuPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MenuPeer::EXPIRED_DATE)) $criteria->add(MenuPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(MenuPeer::LAST_SYNC)) $criteria->add(MenuPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(MenuPeer::DATABASE_NAME);
        $criteria->add(MenuPeer::ID_MENU, $this->id_menu);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdMenu();
    }

    /**
     * Generic method to set the primary key (id_menu column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdMenu($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdMenu();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Menu (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMenIdMenu($this->getMenIdMenu());
        $copyObj->setIdAplikasi($this->getIdAplikasi());
        $copyObj->setNmMenu($this->getNmMenu());
        $copyObj->setNmFile($this->getNmFile());
        $copyObj->setLevelMenu($this->getLevelMenu());
        $copyObj->setUrutanMenu($this->getUrutanMenu());
        $copyObj->setAAktif($this->getAAktif());
        $copyObj->setATampil($this->getATampil());
        $copyObj->setIcon($this->getIcon());
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

            foreach ($this->getMenusRelatedByIdMenu() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMenuRelatedByIdMenu($relObj->copy($deepCopy));
                }
            }

            foreach ($this->getMenuRoles() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addMenuRole($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdMenu(NULL); // this is a auto-increment column, so set to default value
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
     * @return Menu Clone of current object.
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
     * @return MenuPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MenuPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Aplikasi object.
     *
     * @param             Aplikasi $v
     * @return Menu The current object (for fluent API support)
     * @throws PropelException
     */
    public function setAplikasi(Aplikasi $v = null)
    {
        if ($v === null) {
            $this->setIdAplikasi(NULL);
        } else {
            $this->setIdAplikasi($v->getIdAplikasi());
        }

        $this->aAplikasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Aplikasi object, it will not be re-added.
        if ($v !== null) {
            $v->addMenu($this);
        }


        return $this;
    }


    /**
     * Get the associated Aplikasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Aplikasi The associated Aplikasi object.
     * @throws PropelException
     */
    public function getAplikasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aAplikasi === null && (($this->id_aplikasi !== "" && $this->id_aplikasi !== null)) && $doQuery) {
            $this->aAplikasi = AplikasiQuery::create()->findPk($this->id_aplikasi, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aAplikasi->addMenus($this);
             */
        }

        return $this->aAplikasi;
    }

    /**
     * Declares an association between this object and a Menu object.
     *
     * @param             Menu $v
     * @return Menu The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMenuRelatedByMenIdMenu(Menu $v = null)
    {
        if ($v === null) {
            $this->setMenIdMenu(NULL);
        } else {
            $this->setMenIdMenu($v->getIdMenu());
        }

        $this->aMenuRelatedByMenIdMenu = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Menu object, it will not be re-added.
        if ($v !== null) {
            $v->addMenuRelatedByIdMenu($this);
        }


        return $this;
    }


    /**
     * Get the associated Menu object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Menu The associated Menu object.
     * @throws PropelException
     */
    public function getMenuRelatedByMenIdMenu(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMenuRelatedByMenIdMenu === null && (($this->men_id_menu !== "" && $this->men_id_menu !== null)) && $doQuery) {
            $this->aMenuRelatedByMenIdMenu = MenuQuery::create()->findPk($this->men_id_menu, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMenuRelatedByMenIdMenu->addMenusRelatedByIdMenu($this);
             */
        }

        return $this->aMenuRelatedByMenIdMenu;
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
        if ('MenuRelatedByIdMenu' == $relationName) {
            $this->initMenusRelatedByIdMenu();
        }
        if ('MenuRole' == $relationName) {
            $this->initMenuRoles();
        }
    }

    /**
     * Clears out the collMenusRelatedByIdMenu collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Menu The current object (for fluent API support)
     * @see        addMenusRelatedByIdMenu()
     */
    public function clearMenusRelatedByIdMenu()
    {
        $this->collMenusRelatedByIdMenu = null; // important to set this to null since that means it is uninitialized
        $this->collMenusRelatedByIdMenuPartial = null;

        return $this;
    }

    /**
     * reset is the collMenusRelatedByIdMenu collection loaded partially
     *
     * @return void
     */
    public function resetPartialMenusRelatedByIdMenu($v = true)
    {
        $this->collMenusRelatedByIdMenuPartial = $v;
    }

    /**
     * Initializes the collMenusRelatedByIdMenu collection.
     *
     * By default this just sets the collMenusRelatedByIdMenu collection to an empty array (like clearcollMenusRelatedByIdMenu());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMenusRelatedByIdMenu($overrideExisting = true)
    {
        if (null !== $this->collMenusRelatedByIdMenu && !$overrideExisting) {
            return;
        }
        $this->collMenusRelatedByIdMenu = new PropelObjectCollection();
        $this->collMenusRelatedByIdMenu->setModel('Menu');
    }

    /**
     * Gets an array of Menu objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Menu is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|Menu[] List of Menu objects
     * @throws PropelException
     */
    public function getMenusRelatedByIdMenu($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMenusRelatedByIdMenuPartial && !$this->isNew();
        if (null === $this->collMenusRelatedByIdMenu || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMenusRelatedByIdMenu) {
                // return empty collection
                $this->initMenusRelatedByIdMenu();
            } else {
                $collMenusRelatedByIdMenu = MenuQuery::create(null, $criteria)
                    ->filterByMenuRelatedByMenIdMenu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMenusRelatedByIdMenuPartial && count($collMenusRelatedByIdMenu)) {
                      $this->initMenusRelatedByIdMenu(false);

                      foreach($collMenusRelatedByIdMenu as $obj) {
                        if (false == $this->collMenusRelatedByIdMenu->contains($obj)) {
                          $this->collMenusRelatedByIdMenu->append($obj);
                        }
                      }

                      $this->collMenusRelatedByIdMenuPartial = true;
                    }

                    $collMenusRelatedByIdMenu->getInternalIterator()->rewind();
                    return $collMenusRelatedByIdMenu;
                }

                if($partial && $this->collMenusRelatedByIdMenu) {
                    foreach($this->collMenusRelatedByIdMenu as $obj) {
                        if($obj->isNew()) {
                            $collMenusRelatedByIdMenu[] = $obj;
                        }
                    }
                }

                $this->collMenusRelatedByIdMenu = $collMenusRelatedByIdMenu;
                $this->collMenusRelatedByIdMenuPartial = false;
            }
        }

        return $this->collMenusRelatedByIdMenu;
    }

    /**
     * Sets a collection of MenuRelatedByIdMenu objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $menusRelatedByIdMenu A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Menu The current object (for fluent API support)
     */
    public function setMenusRelatedByIdMenu(PropelCollection $menusRelatedByIdMenu, PropelPDO $con = null)
    {
        $menusRelatedByIdMenuToDelete = $this->getMenusRelatedByIdMenu(new Criteria(), $con)->diff($menusRelatedByIdMenu);

        $this->menusRelatedByIdMenuScheduledForDeletion = unserialize(serialize($menusRelatedByIdMenuToDelete));

        foreach ($menusRelatedByIdMenuToDelete as $menuRelatedByIdMenuRemoved) {
            $menuRelatedByIdMenuRemoved->setMenuRelatedByMenIdMenu(null);
        }

        $this->collMenusRelatedByIdMenu = null;
        foreach ($menusRelatedByIdMenu as $menuRelatedByIdMenu) {
            $this->addMenuRelatedByIdMenu($menuRelatedByIdMenu);
        }

        $this->collMenusRelatedByIdMenu = $menusRelatedByIdMenu;
        $this->collMenusRelatedByIdMenuPartial = false;

        return $this;
    }

    /**
     * Returns the number of related Menu objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related Menu objects.
     * @throws PropelException
     */
    public function countMenusRelatedByIdMenu(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMenusRelatedByIdMenuPartial && !$this->isNew();
        if (null === $this->collMenusRelatedByIdMenu || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMenusRelatedByIdMenu) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMenusRelatedByIdMenu());
            }
            $query = MenuQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMenuRelatedByMenIdMenu($this)
                ->count($con);
        }

        return count($this->collMenusRelatedByIdMenu);
    }

    /**
     * Method called to associate a Menu object to this object
     * through the Menu foreign key attribute.
     *
     * @param    Menu $l Menu
     * @return Menu The current object (for fluent API support)
     */
    public function addMenuRelatedByIdMenu(Menu $l)
    {
        if ($this->collMenusRelatedByIdMenu === null) {
            $this->initMenusRelatedByIdMenu();
            $this->collMenusRelatedByIdMenuPartial = true;
        }
        if (!in_array($l, $this->collMenusRelatedByIdMenu->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMenuRelatedByIdMenu($l);
        }

        return $this;
    }

    /**
     * @param	MenuRelatedByIdMenu $menuRelatedByIdMenu The menuRelatedByIdMenu object to add.
     */
    protected function doAddMenuRelatedByIdMenu($menuRelatedByIdMenu)
    {
        $this->collMenusRelatedByIdMenu[]= $menuRelatedByIdMenu;
        $menuRelatedByIdMenu->setMenuRelatedByMenIdMenu($this);
    }

    /**
     * @param	MenuRelatedByIdMenu $menuRelatedByIdMenu The menuRelatedByIdMenu object to remove.
     * @return Menu The current object (for fluent API support)
     */
    public function removeMenuRelatedByIdMenu($menuRelatedByIdMenu)
    {
        if ($this->getMenusRelatedByIdMenu()->contains($menuRelatedByIdMenu)) {
            $this->collMenusRelatedByIdMenu->remove($this->collMenusRelatedByIdMenu->search($menuRelatedByIdMenu));
            if (null === $this->menusRelatedByIdMenuScheduledForDeletion) {
                $this->menusRelatedByIdMenuScheduledForDeletion = clone $this->collMenusRelatedByIdMenu;
                $this->menusRelatedByIdMenuScheduledForDeletion->clear();
            }
            $this->menusRelatedByIdMenuScheduledForDeletion[]= $menuRelatedByIdMenu;
            $menuRelatedByIdMenu->setMenuRelatedByMenIdMenu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Menu is new, it will return
     * an empty collection; or if this Menu has previously
     * been saved, it will retrieve related MenusRelatedByIdMenu from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Menu.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|Menu[] List of Menu objects
     */
    public function getMenusRelatedByIdMenuJoinAplikasi($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MenuQuery::create(null, $criteria);
        $query->joinWith('Aplikasi', $join_behavior);

        return $this->getMenusRelatedByIdMenu($query, $con);
    }

    /**
     * Clears out the collMenuRoles collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Menu The current object (for fluent API support)
     * @see        addMenuRoles()
     */
    public function clearMenuRoles()
    {
        $this->collMenuRoles = null; // important to set this to null since that means it is uninitialized
        $this->collMenuRolesPartial = null;

        return $this;
    }

    /**
     * reset is the collMenuRoles collection loaded partially
     *
     * @return void
     */
    public function resetPartialMenuRoles($v = true)
    {
        $this->collMenuRolesPartial = $v;
    }

    /**
     * Initializes the collMenuRoles collection.
     *
     * By default this just sets the collMenuRoles collection to an empty array (like clearcollMenuRoles());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initMenuRoles($overrideExisting = true)
    {
        if (null !== $this->collMenuRoles && !$overrideExisting) {
            return;
        }
        $this->collMenuRoles = new PropelObjectCollection();
        $this->collMenuRoles->setModel('MenuRole');
    }

    /**
     * Gets an array of MenuRole objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Menu is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|MenuRole[] List of MenuRole objects
     * @throws PropelException
     */
    public function getMenuRoles($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collMenuRolesPartial && !$this->isNew();
        if (null === $this->collMenuRoles || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collMenuRoles) {
                // return empty collection
                $this->initMenuRoles();
            } else {
                $collMenuRoles = MenuRoleQuery::create(null, $criteria)
                    ->filterByMenu($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collMenuRolesPartial && count($collMenuRoles)) {
                      $this->initMenuRoles(false);

                      foreach($collMenuRoles as $obj) {
                        if (false == $this->collMenuRoles->contains($obj)) {
                          $this->collMenuRoles->append($obj);
                        }
                      }

                      $this->collMenuRolesPartial = true;
                    }

                    $collMenuRoles->getInternalIterator()->rewind();
                    return $collMenuRoles;
                }

                if($partial && $this->collMenuRoles) {
                    foreach($this->collMenuRoles as $obj) {
                        if($obj->isNew()) {
                            $collMenuRoles[] = $obj;
                        }
                    }
                }

                $this->collMenuRoles = $collMenuRoles;
                $this->collMenuRolesPartial = false;
            }
        }

        return $this->collMenuRoles;
    }

    /**
     * Sets a collection of MenuRole objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $menuRoles A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Menu The current object (for fluent API support)
     */
    public function setMenuRoles(PropelCollection $menuRoles, PropelPDO $con = null)
    {
        $menuRolesToDelete = $this->getMenuRoles(new Criteria(), $con)->diff($menuRoles);

        $this->menuRolesScheduledForDeletion = unserialize(serialize($menuRolesToDelete));

        foreach ($menuRolesToDelete as $menuRoleRemoved) {
            $menuRoleRemoved->setMenu(null);
        }

        $this->collMenuRoles = null;
        foreach ($menuRoles as $menuRole) {
            $this->addMenuRole($menuRole);
        }

        $this->collMenuRoles = $menuRoles;
        $this->collMenuRolesPartial = false;

        return $this;
    }

    /**
     * Returns the number of related MenuRole objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related MenuRole objects.
     * @throws PropelException
     */
    public function countMenuRoles(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collMenuRolesPartial && !$this->isNew();
        if (null === $this->collMenuRoles || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collMenuRoles) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getMenuRoles());
            }
            $query = MenuRoleQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMenu($this)
                ->count($con);
        }

        return count($this->collMenuRoles);
    }

    /**
     * Method called to associate a MenuRole object to this object
     * through the MenuRole foreign key attribute.
     *
     * @param    MenuRole $l MenuRole
     * @return Menu The current object (for fluent API support)
     */
    public function addMenuRole(MenuRole $l)
    {
        if ($this->collMenuRoles === null) {
            $this->initMenuRoles();
            $this->collMenuRolesPartial = true;
        }
        if (!in_array($l, $this->collMenuRoles->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddMenuRole($l);
        }

        return $this;
    }

    /**
     * @param	MenuRole $menuRole The menuRole object to add.
     */
    protected function doAddMenuRole($menuRole)
    {
        $this->collMenuRoles[]= $menuRole;
        $menuRole->setMenu($this);
    }

    /**
     * @param	MenuRole $menuRole The menuRole object to remove.
     * @return Menu The current object (for fluent API support)
     */
    public function removeMenuRole($menuRole)
    {
        if ($this->getMenuRoles()->contains($menuRole)) {
            $this->collMenuRoles->remove($this->collMenuRoles->search($menuRole));
            if (null === $this->menuRolesScheduledForDeletion) {
                $this->menuRolesScheduledForDeletion = clone $this->collMenuRoles;
                $this->menuRolesScheduledForDeletion->clear();
            }
            $this->menuRolesScheduledForDeletion[]= clone $menuRole;
            $menuRole->setMenu(null);
        }

        return $this;
    }


    /**
     * If this collection has already been initialized with
     * an identical criteria, it returns the collection.
     * Otherwise if this Menu is new, it will return
     * an empty collection; or if this Menu has previously
     * been saved, it will retrieve related MenuRoles from storage.
     *
     * This method is protected by default in order to keep the public
     * api reasonable.  You can provide public methods for those you
     * actually need in Menu.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @param string $join_behavior optional join type to use (defaults to Criteria::LEFT_JOIN)
     * @return PropelObjectCollection|MenuRole[] List of MenuRole objects
     */
    public function getMenuRolesJoinPeran($criteria = null, $con = null, $join_behavior = Criteria::LEFT_JOIN)
    {
        $query = MenuRoleQuery::create(null, $criteria);
        $query->joinWith('Peran', $join_behavior);

        return $this->getMenuRoles($query, $con);
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_menu = null;
        $this->men_id_menu = null;
        $this->id_aplikasi = null;
        $this->nm_menu = null;
        $this->nm_file = null;
        $this->level_menu = null;
        $this->urutan_menu = null;
        $this->a_aktif = null;
        $this->a_tampil = null;
        $this->icon = null;
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
            if ($this->collMenusRelatedByIdMenu) {
                foreach ($this->collMenusRelatedByIdMenu as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->collMenuRoles) {
                foreach ($this->collMenuRoles as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aAplikasi instanceof Persistent) {
              $this->aAplikasi->clearAllReferences($deep);
            }
            if ($this->aMenuRelatedByMenIdMenu instanceof Persistent) {
              $this->aMenuRelatedByMenIdMenu->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collMenusRelatedByIdMenu instanceof PropelCollection) {
            $this->collMenusRelatedByIdMenu->clearIterator();
        }
        $this->collMenusRelatedByIdMenu = null;
        if ($this->collMenuRoles instanceof PropelCollection) {
            $this->collMenuRoles->clearIterator();
        }
        $this->collMenuRoles = null;
        $this->aAplikasi = null;
        $this->aMenuRelatedByMenIdMenu = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MenuPeer::DEFAULT_STRING_FORMAT);
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
