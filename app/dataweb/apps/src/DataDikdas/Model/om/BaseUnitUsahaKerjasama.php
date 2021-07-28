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
use DataDikdas\Model\Mou;
use DataDikdas\Model\MouQuery;
use DataDikdas\Model\SumberDana;
use DataDikdas\Model\SumberDanaQuery;
use DataDikdas\Model\UnitUsaha;
use DataDikdas\Model\UnitUsahaKerjasama;
use DataDikdas\Model\UnitUsahaKerjasamaPeer;
use DataDikdas\Model\UnitUsahaKerjasamaQuery;
use DataDikdas\Model\UnitUsahaQuery;

/**
 * Base class that represents a row from the 'unit_usaha_kerjasama' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseUnitUsahaKerjasama extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\UnitUsahaKerjasamaPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        UnitUsahaKerjasamaPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the mou_id field.
     * @var        string
     */
    protected $mou_id;

    /**
     * The value for the unit_usaha_id field.
     * @var        string
     */
    protected $unit_usaha_id;

    /**
     * The value for the sumber_dana_id field.
     * @var        string
     */
    protected $sumber_dana_id;

    /**
     * The value for the produk_barang_dihasilkan field.
     * @var        string
     */
    protected $produk_barang_dihasilkan;

    /**
     * The value for the jasa_produksi_dihasilkan field.
     * @var        string
     */
    protected $jasa_produksi_dihasilkan;

    /**
     * The value for the omzet_barang_perbulan field.
     * @var        string
     */
    protected $omzet_barang_perbulan;

    /**
     * The value for the omzet_jasa_perbulan field.
     * @var        string
     */
    protected $omzet_jasa_perbulan;

    /**
     * The value for the prestasi_penghargaan field.
     * @var        string
     */
    protected $prestasi_penghargaan;

    /**
     * The value for the pangsa_pasar_produk field.
     * @var        string
     */
    protected $pangsa_pasar_produk;

    /**
     * The value for the pangsa_pasar_jasa field.
     * @var        string
     */
    protected $pangsa_pasar_jasa;

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
     * @var        UnitUsaha
     */
    protected $aUnitUsaha;

    /**
     * @var        Mou
     */
    protected $aMou;

    /**
     * @var        SumberDana
     */
    protected $aSumberDana;

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
        $this->last_sync = '1901-01-01 00:00:00';
    }

    /**
     * Initializes internal state of BaseUnitUsahaKerjasama object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [mou_id] column value.
     * 
     * @return string
     */
    public function getMouId()
    {
        return $this->mou_id;
    }

    /**
     * Get the [unit_usaha_id] column value.
     * 
     * @return string
     */
    public function getUnitUsahaId()
    {
        return $this->unit_usaha_id;
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
     * Get the [produk_barang_dihasilkan] column value.
     * 
     * @return string
     */
    public function getProdukBarangDihasilkan()
    {
        return $this->produk_barang_dihasilkan;
    }

    /**
     * Get the [jasa_produksi_dihasilkan] column value.
     * 
     * @return string
     */
    public function getJasaProduksiDihasilkan()
    {
        return $this->jasa_produksi_dihasilkan;
    }

    /**
     * Get the [omzet_barang_perbulan] column value.
     * 
     * @return string
     */
    public function getOmzetBarangPerbulan()
    {
        return $this->omzet_barang_perbulan;
    }

    /**
     * Get the [omzet_jasa_perbulan] column value.
     * 
     * @return string
     */
    public function getOmzetJasaPerbulan()
    {
        return $this->omzet_jasa_perbulan;
    }

    /**
     * Get the [prestasi_penghargaan] column value.
     * 
     * @return string
     */
    public function getPrestasiPenghargaan()
    {
        return $this->prestasi_penghargaan;
    }

    /**
     * Get the [pangsa_pasar_produk] column value.
     * 
     * @return string
     */
    public function getPangsaPasarProduk()
    {
        return $this->pangsa_pasar_produk;
    }

    /**
     * Get the [pangsa_pasar_jasa] column value.
     * 
     * @return string
     */
    public function getPangsaPasarJasa()
    {
        return $this->pangsa_pasar_jasa;
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
     * Set the value of [mou_id] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setMouId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mou_id !== $v) {
            $this->mou_id = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::MOU_ID;
        }

        if ($this->aMou !== null && $this->aMou->getMouId() !== $v) {
            $this->aMou = null;
        }


        return $this;
    } // setMouId()

    /**
     * Set the value of [unit_usaha_id] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setUnitUsahaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->unit_usaha_id !== $v) {
            $this->unit_usaha_id = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::UNIT_USAHA_ID;
        }

        if ($this->aUnitUsaha !== null && $this->aUnitUsaha->getUnitUsahaId() !== $v) {
            $this->aUnitUsaha = null;
        }


        return $this;
    } // setUnitUsahaId()

    /**
     * Set the value of [sumber_dana_id] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setSumberDanaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sumber_dana_id !== $v) {
            $this->sumber_dana_id = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::SUMBER_DANA_ID;
        }

        if ($this->aSumberDana !== null && $this->aSumberDana->getSumberDanaId() !== $v) {
            $this->aSumberDana = null;
        }


        return $this;
    } // setSumberDanaId()

    /**
     * Set the value of [produk_barang_dihasilkan] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setProdukBarangDihasilkan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->produk_barang_dihasilkan !== $v) {
            $this->produk_barang_dihasilkan = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN;
        }


        return $this;
    } // setProdukBarangDihasilkan()

    /**
     * Set the value of [jasa_produksi_dihasilkan] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setJasaProduksiDihasilkan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jasa_produksi_dihasilkan !== $v) {
            $this->jasa_produksi_dihasilkan = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN;
        }


        return $this;
    } // setJasaProduksiDihasilkan()

    /**
     * Set the value of [omzet_barang_perbulan] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setOmzetBarangPerbulan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->omzet_barang_perbulan !== $v) {
            $this->omzet_barang_perbulan = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN;
        }


        return $this;
    } // setOmzetBarangPerbulan()

    /**
     * Set the value of [omzet_jasa_perbulan] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setOmzetJasaPerbulan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->omzet_jasa_perbulan !== $v) {
            $this->omzet_jasa_perbulan = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN;
        }


        return $this;
    } // setOmzetJasaPerbulan()

    /**
     * Set the value of [prestasi_penghargaan] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setPrestasiPenghargaan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->prestasi_penghargaan !== $v) {
            $this->prestasi_penghargaan = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN;
        }


        return $this;
    } // setPrestasiPenghargaan()

    /**
     * Set the value of [pangsa_pasar_produk] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setPangsaPasarProduk($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pangsa_pasar_produk !== $v) {
            $this->pangsa_pasar_produk = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK;
        }


        return $this;
    } // setPangsaPasarProduk()

    /**
     * Set the value of [pangsa_pasar_jasa] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setPangsaPasarJasa($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pangsa_pasar_jasa !== $v) {
            $this->pangsa_pasar_jasa = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA;
        }


        return $this;
    } // setPangsaPasarJasa()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return UnitUsahaKerjasama The current object (for fluent API support)
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
                $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = UnitUsahaKerjasamaPeer::UPDATER_ID;
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

            $this->mou_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->unit_usaha_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->sumber_dana_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->produk_barang_dihasilkan = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->jasa_produksi_dihasilkan = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->omzet_barang_perbulan = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->omzet_jasa_perbulan = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->prestasi_penghargaan = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->pangsa_pasar_produk = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->pangsa_pasar_jasa = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
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
            return $startcol + 15; // 15 = UnitUsahaKerjasamaPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating UnitUsahaKerjasama object", $e);
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

        if ($this->aMou !== null && $this->mou_id !== $this->aMou->getMouId()) {
            $this->aMou = null;
        }
        if ($this->aUnitUsaha !== null && $this->unit_usaha_id !== $this->aUnitUsaha->getUnitUsahaId()) {
            $this->aUnitUsaha = null;
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
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = UnitUsahaKerjasamaPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aUnitUsaha = null;
            $this->aMou = null;
            $this->aSumberDana = null;
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
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = UnitUsahaKerjasamaQuery::create()
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
            $con = Propel::getConnection(UnitUsahaKerjasamaPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                UnitUsahaKerjasamaPeer::addInstanceToPool($this);
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

            if ($this->aUnitUsaha !== null) {
                if ($this->aUnitUsaha->isModified() || $this->aUnitUsaha->isNew()) {
                    $affectedRows += $this->aUnitUsaha->save($con);
                }
                $this->setUnitUsaha($this->aUnitUsaha);
            }

            if ($this->aMou !== null) {
                if ($this->aMou->isModified() || $this->aMou->isNew()) {
                    $affectedRows += $this->aMou->save($con);
                }
                $this->setMou($this->aMou);
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
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::MOU_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mou_id"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"unit_usaha_id"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sumber_dana_id"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN)) {
            $modifiedColumns[':p' . $index++]  = '"produk_barang_dihasilkan"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN)) {
            $modifiedColumns[':p' . $index++]  = '"jasa_produksi_dihasilkan"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN)) {
            $modifiedColumns[':p' . $index++]  = '"omzet_barang_perbulan"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN)) {
            $modifiedColumns[':p' . $index++]  = '"omzet_jasa_perbulan"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN)) {
            $modifiedColumns[':p' . $index++]  = '"prestasi_penghargaan"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK)) {
            $modifiedColumns[':p' . $index++]  = '"pangsa_pasar_produk"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA)) {
            $modifiedColumns[':p' . $index++]  = '"pangsa_pasar_jasa"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "unit_usaha_kerjasama" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"mou_id"':						
                        $stmt->bindValue($identifier, $this->mou_id, PDO::PARAM_STR);
                        break;
                    case '"unit_usaha_id"':						
                        $stmt->bindValue($identifier, $this->unit_usaha_id, PDO::PARAM_STR);
                        break;
                    case '"sumber_dana_id"':						
                        $stmt->bindValue($identifier, $this->sumber_dana_id, PDO::PARAM_STR);
                        break;
                    case '"produk_barang_dihasilkan"':						
                        $stmt->bindValue($identifier, $this->produk_barang_dihasilkan, PDO::PARAM_STR);
                        break;
                    case '"jasa_produksi_dihasilkan"':						
                        $stmt->bindValue($identifier, $this->jasa_produksi_dihasilkan, PDO::PARAM_STR);
                        break;
                    case '"omzet_barang_perbulan"':						
                        $stmt->bindValue($identifier, $this->omzet_barang_perbulan, PDO::PARAM_STR);
                        break;
                    case '"omzet_jasa_perbulan"':						
                        $stmt->bindValue($identifier, $this->omzet_jasa_perbulan, PDO::PARAM_STR);
                        break;
                    case '"prestasi_penghargaan"':						
                        $stmt->bindValue($identifier, $this->prestasi_penghargaan, PDO::PARAM_STR);
                        break;
                    case '"pangsa_pasar_produk"':						
                        $stmt->bindValue($identifier, $this->pangsa_pasar_produk, PDO::PARAM_STR);
                        break;
                    case '"pangsa_pasar_jasa"':						
                        $stmt->bindValue($identifier, $this->pangsa_pasar_jasa, PDO::PARAM_STR);
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

            if ($this->aUnitUsaha !== null) {
                if (!$this->aUnitUsaha->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aUnitUsaha->getValidationFailures());
                }
            }

            if ($this->aMou !== null) {
                if (!$this->aMou->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMou->getValidationFailures());
                }
            }

            if ($this->aSumberDana !== null) {
                if (!$this->aSumberDana->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSumberDana->getValidationFailures());
                }
            }


            if (($retval = UnitUsahaKerjasamaPeer::doValidate($this, $columns)) !== true) {
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
        $pos = UnitUsahaKerjasamaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getMouId();
                break;
            case 1:
                return $this->getUnitUsahaId();
                break;
            case 2:
                return $this->getSumberDanaId();
                break;
            case 3:
                return $this->getProdukBarangDihasilkan();
                break;
            case 4:
                return $this->getJasaProduksiDihasilkan();
                break;
            case 5:
                return $this->getOmzetBarangPerbulan();
                break;
            case 6:
                return $this->getOmzetJasaPerbulan();
                break;
            case 7:
                return $this->getPrestasiPenghargaan();
                break;
            case 8:
                return $this->getPangsaPasarProduk();
                break;
            case 9:
                return $this->getPangsaPasarJasa();
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
        if (isset($alreadyDumpedObjects['UnitUsahaKerjasama'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['UnitUsahaKerjasama'][serialize($this->getPrimaryKey())] = true;
        $keys = UnitUsahaKerjasamaPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getMouId(),
            $keys[1] => $this->getUnitUsahaId(),
            $keys[2] => $this->getSumberDanaId(),
            $keys[3] => $this->getProdukBarangDihasilkan(),
            $keys[4] => $this->getJasaProduksiDihasilkan(),
            $keys[5] => $this->getOmzetBarangPerbulan(),
            $keys[6] => $this->getOmzetJasaPerbulan(),
            $keys[7] => $this->getPrestasiPenghargaan(),
            $keys[8] => $this->getPangsaPasarProduk(),
            $keys[9] => $this->getPangsaPasarJasa(),
            $keys[10] => $this->getCreateDate(),
            $keys[11] => $this->getLastUpdate(),
            $keys[12] => $this->getSoftDelete(),
            $keys[13] => $this->getLastSync(),
            $keys[14] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aUnitUsaha) {
                $result['UnitUsaha'] = $this->aUnitUsaha->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aMou) {
                $result['Mou'] = $this->aMou->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSumberDana) {
                $result['SumberDana'] = $this->aSumberDana->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = UnitUsahaKerjasamaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setMouId($value);
                break;
            case 1:
                $this->setUnitUsahaId($value);
                break;
            case 2:
                $this->setSumberDanaId($value);
                break;
            case 3:
                $this->setProdukBarangDihasilkan($value);
                break;
            case 4:
                $this->setJasaProduksiDihasilkan($value);
                break;
            case 5:
                $this->setOmzetBarangPerbulan($value);
                break;
            case 6:
                $this->setOmzetJasaPerbulan($value);
                break;
            case 7:
                $this->setPrestasiPenghargaan($value);
                break;
            case 8:
                $this->setPangsaPasarProduk($value);
                break;
            case 9:
                $this->setPangsaPasarJasa($value);
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
        $keys = UnitUsahaKerjasamaPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setMouId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setUnitUsahaId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSumberDanaId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setProdukBarangDihasilkan($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setJasaProduksiDihasilkan($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setOmzetBarangPerbulan($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setOmzetJasaPerbulan($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPrestasiPenghargaan($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPangsaPasarProduk($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setPangsaPasarJasa($arr[$keys[9]]);
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
        $criteria = new Criteria(UnitUsahaKerjasamaPeer::DATABASE_NAME);

        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::MOU_ID)) $criteria->add(UnitUsahaKerjasamaPeer::MOU_ID, $this->mou_id);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID)) $criteria->add(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $this->unit_usaha_id);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID)) $criteria->add(UnitUsahaKerjasamaPeer::SUMBER_DANA_ID, $this->sumber_dana_id);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN)) $criteria->add(UnitUsahaKerjasamaPeer::PRODUK_BARANG_DIHASILKAN, $this->produk_barang_dihasilkan);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN)) $criteria->add(UnitUsahaKerjasamaPeer::JASA_PRODUKSI_DIHASILKAN, $this->jasa_produksi_dihasilkan);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN)) $criteria->add(UnitUsahaKerjasamaPeer::OMZET_BARANG_PERBULAN, $this->omzet_barang_perbulan);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN)) $criteria->add(UnitUsahaKerjasamaPeer::OMZET_JASA_PERBULAN, $this->omzet_jasa_perbulan);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN)) $criteria->add(UnitUsahaKerjasamaPeer::PRESTASI_PENGHARGAAN, $this->prestasi_penghargaan);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK)) $criteria->add(UnitUsahaKerjasamaPeer::PANGSA_PASAR_PRODUK, $this->pangsa_pasar_produk);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA)) $criteria->add(UnitUsahaKerjasamaPeer::PANGSA_PASAR_JASA, $this->pangsa_pasar_jasa);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::CREATE_DATE)) $criteria->add(UnitUsahaKerjasamaPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::LAST_UPDATE)) $criteria->add(UnitUsahaKerjasamaPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::SOFT_DELETE)) $criteria->add(UnitUsahaKerjasamaPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::LAST_SYNC)) $criteria->add(UnitUsahaKerjasamaPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(UnitUsahaKerjasamaPeer::UPDATER_ID)) $criteria->add(UnitUsahaKerjasamaPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(UnitUsahaKerjasamaPeer::DATABASE_NAME);
        $criteria->add(UnitUsahaKerjasamaPeer::MOU_ID, $this->mou_id);
        $criteria->add(UnitUsahaKerjasamaPeer::UNIT_USAHA_ID, $this->unit_usaha_id);

        return $criteria;
    }

    /**
     * Returns the composite primary key for this object.
     * The array elements will be in same order as specified in XML.
     * @return array
     */
    public function getPrimaryKey()
    {
        $pks = array();
        $pks[0] = $this->getMouId();
        $pks[1] = $this->getUnitUsahaId();

        return $pks;
    }

    /**
     * Set the [composite] primary key.
     *
     * @param array $keys The elements of the composite key (order must match the order in XML file).
     * @return void
     */
    public function setPrimaryKey($keys)
    {
        $this->setMouId($keys[0]);
        $this->setUnitUsahaId($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getMouId()) && (null === $this->getUnitUsahaId());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of UnitUsahaKerjasama (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setMouId($this->getMouId());
        $copyObj->setUnitUsahaId($this->getUnitUsahaId());
        $copyObj->setSumberDanaId($this->getSumberDanaId());
        $copyObj->setProdukBarangDihasilkan($this->getProdukBarangDihasilkan());
        $copyObj->setJasaProduksiDihasilkan($this->getJasaProduksiDihasilkan());
        $copyObj->setOmzetBarangPerbulan($this->getOmzetBarangPerbulan());
        $copyObj->setOmzetJasaPerbulan($this->getOmzetJasaPerbulan());
        $copyObj->setPrestasiPenghargaan($this->getPrestasiPenghargaan());
        $copyObj->setPangsaPasarProduk($this->getPangsaPasarProduk());
        $copyObj->setPangsaPasarJasa($this->getPangsaPasarJasa());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
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
     * @return UnitUsahaKerjasama Clone of current object.
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
     * @return UnitUsahaKerjasamaPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new UnitUsahaKerjasamaPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a UnitUsaha object.
     *
     * @param             UnitUsaha $v
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     * @throws PropelException
     */
    public function setUnitUsaha(UnitUsaha $v = null)
    {
        if ($v === null) {
            $this->setUnitUsahaId(NULL);
        } else {
            $this->setUnitUsahaId($v->getUnitUsahaId());
        }

        $this->aUnitUsaha = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the UnitUsaha object, it will not be re-added.
        if ($v !== null) {
            $v->addUnitUsahaKerjasama($this);
        }


        return $this;
    }


    /**
     * Get the associated UnitUsaha object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return UnitUsaha The associated UnitUsaha object.
     * @throws PropelException
     */
    public function getUnitUsaha(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aUnitUsaha === null && (($this->unit_usaha_id !== "" && $this->unit_usaha_id !== null)) && $doQuery) {
            $this->aUnitUsaha = UnitUsahaQuery::create()->findPk($this->unit_usaha_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aUnitUsaha->addUnitUsahaKerjasamas($this);
             */
        }

        return $this->aUnitUsaha;
    }

    /**
     * Declares an association between this object and a Mou object.
     *
     * @param             Mou $v
     * @return UnitUsahaKerjasama The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMou(Mou $v = null)
    {
        if ($v === null) {
            $this->setMouId(NULL);
        } else {
            $this->setMouId($v->getMouId());
        }

        $this->aMou = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Mou object, it will not be re-added.
        if ($v !== null) {
            $v->addUnitUsahaKerjasama($this);
        }


        return $this;
    }


    /**
     * Get the associated Mou object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Mou The associated Mou object.
     * @throws PropelException
     */
    public function getMou(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMou === null && (($this->mou_id !== "" && $this->mou_id !== null)) && $doQuery) {
            $this->aMou = MouQuery::create()->findPk($this->mou_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMou->addUnitUsahaKerjasamas($this);
             */
        }

        return $this->aMou;
    }

    /**
     * Declares an association between this object and a SumberDana object.
     *
     * @param             SumberDana $v
     * @return UnitUsahaKerjasama The current object (for fluent API support)
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
            $v->addUnitUsahaKerjasama($this);
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
                $this->aSumberDana->addUnitUsahaKerjasamas($this);
             */
        }

        return $this->aSumberDana;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->mou_id = null;
        $this->unit_usaha_id = null;
        $this->sumber_dana_id = null;
        $this->produk_barang_dihasilkan = null;
        $this->jasa_produksi_dihasilkan = null;
        $this->omzet_barang_perbulan = null;
        $this->omzet_jasa_perbulan = null;
        $this->prestasi_penghargaan = null;
        $this->pangsa_pasar_produk = null;
        $this->pangsa_pasar_jasa = null;
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
            if ($this->aUnitUsaha instanceof Persistent) {
              $this->aUnitUsaha->clearAllReferences($deep);
            }
            if ($this->aMou instanceof Persistent) {
              $this->aMou->clearAllReferences($deep);
            }
            if ($this->aSumberDana instanceof Persistent) {
              $this->aSumberDana->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aUnitUsaha = null;
        $this->aMou = null;
        $this->aSumberDana = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(UnitUsahaKerjasamaPeer::DEFAULT_STRING_FORMAT);
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
