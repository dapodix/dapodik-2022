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
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Publisher;
use DataDikdas\Model\PublisherPeer;
use DataDikdas\Model\PublisherQuery;

/**
 * Base class that represents a row from the 'pustaka.publisher' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePublisher extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\PublisherPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        PublisherPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_publisher field.
     * @var        string
     */
    protected $id_publisher;

    /**
     * The value for the name field.
     * @var        string
     */
    protected $name;

    /**
     * The value for the address field.
     * @var        string
     */
    protected $address;

    /**
     * The value for the phone field.
     * @var        string
     */
    protected $phone;

    /**
     * The value for the email field.
     * @var        string
     */
    protected $email;

    /**
     * The value for the head_office field.
     * @var        string
     */
    protected $head_office;

    /**
     * The value for the director_name field.
     * @var        string
     */
    protected $director_name;

    /**
     * The value for the director_phone field.
     * @var        string
     */
    protected $director_phone;

    /**
     * The value for the director_email field.
     * @var        string
     */
    protected $director_email;

    /**
     * The value for the contact_person field.
     * @var        string
     */
    protected $contact_person;

    /**
     * The value for the cp_phone field.
     * @var        string
     */
    protected $cp_phone;

    /**
     * The value for the contact_person2 field.
     * @var        string
     */
    protected $contact_person2;

    /**
     * The value for the cp_phone2 field.
     * @var        string
     */
    protected $cp_phone2;

    /**
     * The value for the npwp field.
     * @var        string
     */
    protected $npwp;

    /**
     * The value for the siup field.
     * @var        string
     */
    protected $siup;

    /**
     * The value for the akta field.
     * @var        string
     */
    protected $akta;

    /**
     * The value for the no_kta field.
     * @var        string
     */
    protected $no_kta;

    /**
     * The value for the kta field.
     * @var        string
     */
    protected $kta;

    /**
     * The value for the surat field.
     * @var        string
     */
    protected $surat;

    /**
     * The value for the surat_pernyataan field.
     * @var        string
     */
    protected $surat_pernyataan;

    /**
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

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
     * @var        MstWilayah
     */
    protected $aMstWilayah;

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
     * Initializes internal state of BasePublisher object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_publisher] column value.
     * 
     * @return string
     */
    public function getIdPublisher()
    {
        return $this->id_publisher;
    }

    /**
     * Get the [name] column value.
     * 
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the [address] column value.
     * 
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Get the [phone] column value.
     * 
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Get the [email] column value.
     * 
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Get the [head_office] column value.
     * 
     * @return string
     */
    public function getHeadOffice()
    {
        return $this->head_office;
    }

    /**
     * Get the [director_name] column value.
     * 
     * @return string
     */
    public function getDirectorName()
    {
        return $this->director_name;
    }

    /**
     * Get the [director_phone] column value.
     * 
     * @return string
     */
    public function getDirectorPhone()
    {
        return $this->director_phone;
    }

    /**
     * Get the [director_email] column value.
     * 
     * @return string
     */
    public function getDirectorEmail()
    {
        return $this->director_email;
    }

    /**
     * Get the [contact_person] column value.
     * 
     * @return string
     */
    public function getContactPerson()
    {
        return $this->contact_person;
    }

    /**
     * Get the [cp_phone] column value.
     * 
     * @return string
     */
    public function getCpPhone()
    {
        return $this->cp_phone;
    }

    /**
     * Get the [contact_person2] column value.
     * 
     * @return string
     */
    public function getContactPerson2()
    {
        return $this->contact_person2;
    }

    /**
     * Get the [cp_phone2] column value.
     * 
     * @return string
     */
    public function getCpPhone2()
    {
        return $this->cp_phone2;
    }

    /**
     * Get the [npwp] column value.
     * 
     * @return string
     */
    public function getNpwp()
    {
        return $this->npwp;
    }

    /**
     * Get the [siup] column value.
     * 
     * @return string
     */
    public function getSiup()
    {
        return $this->siup;
    }

    /**
     * Get the [akta] column value.
     * 
     * @return string
     */
    public function getAkta()
    {
        return $this->akta;
    }

    /**
     * Get the [no_kta] column value.
     * 
     * @return string
     */
    public function getNoKta()
    {
        return $this->no_kta;
    }

    /**
     * Get the [kta] column value.
     * 
     * @return string
     */
    public function getKta()
    {
        return $this->kta;
    }

    /**
     * Get the [surat] column value.
     * 
     * @return string
     */
    public function getSurat()
    {
        return $this->surat;
    }

    /**
     * Get the [surat_pernyataan] column value.
     * 
     * @return string
     */
    public function getSuratPernyataan()
    {
        return $this->surat_pernyataan;
    }

    /**
     * Get the [kode_wilayah] column value.
     * 
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
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
     * Set the value of [id_publisher] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setIdPublisher($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_publisher !== $v) {
            $this->id_publisher = $v;
            $this->modifiedColumns[] = PublisherPeer::ID_PUBLISHER;
        }


        return $this;
    } // setIdPublisher()

    /**
     * Set the value of [name] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->name !== $v) {
            $this->name = $v;
            $this->modifiedColumns[] = PublisherPeer::NAME;
        }


        return $this;
    } // setName()

    /**
     * Set the value of [address] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->address !== $v) {
            $this->address = $v;
            $this->modifiedColumns[] = PublisherPeer::ADDRESS;
        }


        return $this;
    } // setAddress()

    /**
     * Set the value of [phone] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->phone !== $v) {
            $this->phone = $v;
            $this->modifiedColumns[] = PublisherPeer::PHONE;
        }


        return $this;
    } // setPhone()

    /**
     * Set the value of [email] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->email !== $v) {
            $this->email = $v;
            $this->modifiedColumns[] = PublisherPeer::EMAIL;
        }


        return $this;
    } // setEmail()

    /**
     * Set the value of [head_office] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setHeadOffice($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->head_office !== $v) {
            $this->head_office = $v;
            $this->modifiedColumns[] = PublisherPeer::HEAD_OFFICE;
        }


        return $this;
    } // setHeadOffice()

    /**
     * Set the value of [director_name] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setDirectorName($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->director_name !== $v) {
            $this->director_name = $v;
            $this->modifiedColumns[] = PublisherPeer::DIRECTOR_NAME;
        }


        return $this;
    } // setDirectorName()

    /**
     * Set the value of [director_phone] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setDirectorPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->director_phone !== $v) {
            $this->director_phone = $v;
            $this->modifiedColumns[] = PublisherPeer::DIRECTOR_PHONE;
        }


        return $this;
    } // setDirectorPhone()

    /**
     * Set the value of [director_email] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setDirectorEmail($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->director_email !== $v) {
            $this->director_email = $v;
            $this->modifiedColumns[] = PublisherPeer::DIRECTOR_EMAIL;
        }


        return $this;
    } // setDirectorEmail()

    /**
     * Set the value of [contact_person] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setContactPerson($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->contact_person !== $v) {
            $this->contact_person = $v;
            $this->modifiedColumns[] = PublisherPeer::CONTACT_PERSON;
        }


        return $this;
    } // setContactPerson()

    /**
     * Set the value of [cp_phone] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setCpPhone($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cp_phone !== $v) {
            $this->cp_phone = $v;
            $this->modifiedColumns[] = PublisherPeer::CP_PHONE;
        }


        return $this;
    } // setCpPhone()

    /**
     * Set the value of [contact_person2] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setContactPerson2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->contact_person2 !== $v) {
            $this->contact_person2 = $v;
            $this->modifiedColumns[] = PublisherPeer::CONTACT_PERSON2;
        }


        return $this;
    } // setContactPerson2()

    /**
     * Set the value of [cp_phone2] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setCpPhone2($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->cp_phone2 !== $v) {
            $this->cp_phone2 = $v;
            $this->modifiedColumns[] = PublisherPeer::CP_PHONE2;
        }


        return $this;
    } // setCpPhone2()

    /**
     * Set the value of [npwp] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setNpwp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->npwp !== $v) {
            $this->npwp = $v;
            $this->modifiedColumns[] = PublisherPeer::NPWP;
        }


        return $this;
    } // setNpwp()

    /**
     * Set the value of [siup] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setSiup($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->siup !== $v) {
            $this->siup = $v;
            $this->modifiedColumns[] = PublisherPeer::SIUP;
        }


        return $this;
    } // setSiup()

    /**
     * Set the value of [akta] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setAkta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->akta !== $v) {
            $this->akta = $v;
            $this->modifiedColumns[] = PublisherPeer::AKTA;
        }


        return $this;
    } // setAkta()

    /**
     * Set the value of [no_kta] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setNoKta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_kta !== $v) {
            $this->no_kta = $v;
            $this->modifiedColumns[] = PublisherPeer::NO_KTA;
        }


        return $this;
    } // setNoKta()

    /**
     * Set the value of [kta] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setKta($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kta !== $v) {
            $this->kta = $v;
            $this->modifiedColumns[] = PublisherPeer::KTA;
        }


        return $this;
    } // setKta()

    /**
     * Set the value of [surat] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setSurat($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->surat !== $v) {
            $this->surat = $v;
            $this->modifiedColumns[] = PublisherPeer::SURAT;
        }


        return $this;
    } // setSurat()

    /**
     * Set the value of [surat_pernyataan] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setSuratPernyataan($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->surat_pernyataan !== $v) {
            $this->surat_pernyataan = $v;
            $this->modifiedColumns[] = PublisherPeer::SURAT_PERNYATAAN;
        }


        return $this;
    } // setSuratPernyataan()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Publisher The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = PublisherPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Publisher The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = PublisherPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Publisher The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = PublisherPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Publisher The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = PublisherPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return Publisher The current object (for fluent API support)
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
                $this->modifiedColumns[] = PublisherPeer::LAST_SYNC;
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

            $this->id_publisher = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->name = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->address = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->phone = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->email = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->head_office = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->director_name = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->director_phone = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->director_email = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->contact_person = ($row[$startcol + 9] !== null) ? (string) $row[$startcol + 9] : null;
            $this->cp_phone = ($row[$startcol + 10] !== null) ? (string) $row[$startcol + 10] : null;
            $this->contact_person2 = ($row[$startcol + 11] !== null) ? (string) $row[$startcol + 11] : null;
            $this->cp_phone2 = ($row[$startcol + 12] !== null) ? (string) $row[$startcol + 12] : null;
            $this->npwp = ($row[$startcol + 13] !== null) ? (string) $row[$startcol + 13] : null;
            $this->siup = ($row[$startcol + 14] !== null) ? (string) $row[$startcol + 14] : null;
            $this->akta = ($row[$startcol + 15] !== null) ? (string) $row[$startcol + 15] : null;
            $this->no_kta = ($row[$startcol + 16] !== null) ? (string) $row[$startcol + 16] : null;
            $this->kta = ($row[$startcol + 17] !== null) ? (string) $row[$startcol + 17] : null;
            $this->surat = ($row[$startcol + 18] !== null) ? (string) $row[$startcol + 18] : null;
            $this->surat_pernyataan = ($row[$startcol + 19] !== null) ? (string) $row[$startcol + 19] : null;
            $this->kode_wilayah = ($row[$startcol + 20] !== null) ? (string) $row[$startcol + 20] : null;
            $this->create_date = ($row[$startcol + 21] !== null) ? (string) $row[$startcol + 21] : null;
            $this->last_update = ($row[$startcol + 22] !== null) ? (string) $row[$startcol + 22] : null;
            $this->expired_date = ($row[$startcol + 23] !== null) ? (string) $row[$startcol + 23] : null;
            $this->last_sync = ($row[$startcol + 24] !== null) ? (string) $row[$startcol + 24] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 25; // 25 = PublisherPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Publisher object", $e);
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

        if ($this->aMstWilayah !== null && $this->kode_wilayah !== $this->aMstWilayah->getKodeWilayah()) {
            $this->aMstWilayah = null;
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
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = PublisherPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
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
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = PublisherQuery::create()
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
            $con = Propel::getConnection(PublisherPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                PublisherPeer::addInstanceToPool($this);
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

            if ($this->aMstWilayah !== null) {
                if ($this->aMstWilayah->isModified() || $this->aMstWilayah->isNew()) {
                    $affectedRows += $this->aMstWilayah->save($con);
                }
                $this->setMstWilayah($this->aMstWilayah);
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
        if ($this->isColumnModified(PublisherPeer::ID_PUBLISHER)) {
            $modifiedColumns[':p' . $index++]  = '"id_publisher"';
        }
        if ($this->isColumnModified(PublisherPeer::NAME)) {
            $modifiedColumns[':p' . $index++]  = '"name"';
        }
        if ($this->isColumnModified(PublisherPeer::ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '"address"';
        }
        if ($this->isColumnModified(PublisherPeer::PHONE)) {
            $modifiedColumns[':p' . $index++]  = '"phone"';
        }
        if ($this->isColumnModified(PublisherPeer::EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"email"';
        }
        if ($this->isColumnModified(PublisherPeer::HEAD_OFFICE)) {
            $modifiedColumns[':p' . $index++]  = '"head_office"';
        }
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_NAME)) {
            $modifiedColumns[':p' . $index++]  = '"director_name"';
        }
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '"director_phone"';
        }
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_EMAIL)) {
            $modifiedColumns[':p' . $index++]  = '"director_email"';
        }
        if ($this->isColumnModified(PublisherPeer::CONTACT_PERSON)) {
            $modifiedColumns[':p' . $index++]  = '"contact_person"';
        }
        if ($this->isColumnModified(PublisherPeer::CP_PHONE)) {
            $modifiedColumns[':p' . $index++]  = '"cp_phone"';
        }
        if ($this->isColumnModified(PublisherPeer::CONTACT_PERSON2)) {
            $modifiedColumns[':p' . $index++]  = '"contact_person2"';
        }
        if ($this->isColumnModified(PublisherPeer::CP_PHONE2)) {
            $modifiedColumns[':p' . $index++]  = '"cp_phone2"';
        }
        if ($this->isColumnModified(PublisherPeer::NPWP)) {
            $modifiedColumns[':p' . $index++]  = '"npwp"';
        }
        if ($this->isColumnModified(PublisherPeer::SIUP)) {
            $modifiedColumns[':p' . $index++]  = '"siup"';
        }
        if ($this->isColumnModified(PublisherPeer::AKTA)) {
            $modifiedColumns[':p' . $index++]  = '"akta"';
        }
        if ($this->isColumnModified(PublisherPeer::NO_KTA)) {
            $modifiedColumns[':p' . $index++]  = '"no_kta"';
        }
        if ($this->isColumnModified(PublisherPeer::KTA)) {
            $modifiedColumns[':p' . $index++]  = '"kta"';
        }
        if ($this->isColumnModified(PublisherPeer::SURAT)) {
            $modifiedColumns[':p' . $index++]  = '"surat"';
        }
        if ($this->isColumnModified(PublisherPeer::SURAT_PERNYATAAN)) {
            $modifiedColumns[':p' . $index++]  = '"surat_pernyataan"';
        }
        if ($this->isColumnModified(PublisherPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(PublisherPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(PublisherPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(PublisherPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(PublisherPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }

        $sql = sprintf(
            'INSERT INTO "pustaka"."publisher" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_publisher"':						
                        $stmt->bindValue($identifier, $this->id_publisher, PDO::PARAM_STR);
                        break;
                    case '"name"':						
                        $stmt->bindValue($identifier, $this->name, PDO::PARAM_STR);
                        break;
                    case '"address"':						
                        $stmt->bindValue($identifier, $this->address, PDO::PARAM_STR);
                        break;
                    case '"phone"':						
                        $stmt->bindValue($identifier, $this->phone, PDO::PARAM_STR);
                        break;
                    case '"email"':						
                        $stmt->bindValue($identifier, $this->email, PDO::PARAM_STR);
                        break;
                    case '"head_office"':						
                        $stmt->bindValue($identifier, $this->head_office, PDO::PARAM_STR);
                        break;
                    case '"director_name"':						
                        $stmt->bindValue($identifier, $this->director_name, PDO::PARAM_STR);
                        break;
                    case '"director_phone"':						
                        $stmt->bindValue($identifier, $this->director_phone, PDO::PARAM_STR);
                        break;
                    case '"director_email"':						
                        $stmt->bindValue($identifier, $this->director_email, PDO::PARAM_STR);
                        break;
                    case '"contact_person"':						
                        $stmt->bindValue($identifier, $this->contact_person, PDO::PARAM_STR);
                        break;
                    case '"cp_phone"':						
                        $stmt->bindValue($identifier, $this->cp_phone, PDO::PARAM_STR);
                        break;
                    case '"contact_person2"':						
                        $stmt->bindValue($identifier, $this->contact_person2, PDO::PARAM_STR);
                        break;
                    case '"cp_phone2"':						
                        $stmt->bindValue($identifier, $this->cp_phone2, PDO::PARAM_STR);
                        break;
                    case '"npwp"':						
                        $stmt->bindValue($identifier, $this->npwp, PDO::PARAM_STR);
                        break;
                    case '"siup"':						
                        $stmt->bindValue($identifier, $this->siup, PDO::PARAM_STR);
                        break;
                    case '"akta"':						
                        $stmt->bindValue($identifier, $this->akta, PDO::PARAM_STR);
                        break;
                    case '"no_kta"':						
                        $stmt->bindValue($identifier, $this->no_kta, PDO::PARAM_STR);
                        break;
                    case '"kta"':						
                        $stmt->bindValue($identifier, $this->kta, PDO::PARAM_STR);
                        break;
                    case '"surat"':						
                        $stmt->bindValue($identifier, $this->surat, PDO::PARAM_STR);
                        break;
                    case '"surat_pernyataan"':						
                        $stmt->bindValue($identifier, $this->surat_pernyataan, PDO::PARAM_STR);
                        break;
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
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

            if ($this->aMstWilayah !== null) {
                if (!$this->aMstWilayah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMstWilayah->getValidationFailures());
                }
            }


            if (($retval = PublisherPeer::doValidate($this, $columns)) !== true) {
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
        $pos = PublisherPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdPublisher();
                break;
            case 1:
                return $this->getName();
                break;
            case 2:
                return $this->getAddress();
                break;
            case 3:
                return $this->getPhone();
                break;
            case 4:
                return $this->getEmail();
                break;
            case 5:
                return $this->getHeadOffice();
                break;
            case 6:
                return $this->getDirectorName();
                break;
            case 7:
                return $this->getDirectorPhone();
                break;
            case 8:
                return $this->getDirectorEmail();
                break;
            case 9:
                return $this->getContactPerson();
                break;
            case 10:
                return $this->getCpPhone();
                break;
            case 11:
                return $this->getContactPerson2();
                break;
            case 12:
                return $this->getCpPhone2();
                break;
            case 13:
                return $this->getNpwp();
                break;
            case 14:
                return $this->getSiup();
                break;
            case 15:
                return $this->getAkta();
                break;
            case 16:
                return $this->getNoKta();
                break;
            case 17:
                return $this->getKta();
                break;
            case 18:
                return $this->getSurat();
                break;
            case 19:
                return $this->getSuratPernyataan();
                break;
            case 20:
                return $this->getKodeWilayah();
                break;
            case 21:
                return $this->getCreateDate();
                break;
            case 22:
                return $this->getLastUpdate();
                break;
            case 23:
                return $this->getExpiredDate();
                break;
            case 24:
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
        if (isset($alreadyDumpedObjects['Publisher'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Publisher'][$this->getPrimaryKey()] = true;
        $keys = PublisherPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdPublisher(),
            $keys[1] => $this->getName(),
            $keys[2] => $this->getAddress(),
            $keys[3] => $this->getPhone(),
            $keys[4] => $this->getEmail(),
            $keys[5] => $this->getHeadOffice(),
            $keys[6] => $this->getDirectorName(),
            $keys[7] => $this->getDirectorPhone(),
            $keys[8] => $this->getDirectorEmail(),
            $keys[9] => $this->getContactPerson(),
            $keys[10] => $this->getCpPhone(),
            $keys[11] => $this->getContactPerson2(),
            $keys[12] => $this->getCpPhone2(),
            $keys[13] => $this->getNpwp(),
            $keys[14] => $this->getSiup(),
            $keys[15] => $this->getAkta(),
            $keys[16] => $this->getNoKta(),
            $keys[17] => $this->getKta(),
            $keys[18] => $this->getSurat(),
            $keys[19] => $this->getSuratPernyataan(),
            $keys[20] => $this->getKodeWilayah(),
            $keys[21] => $this->getCreateDate(),
            $keys[22] => $this->getLastUpdate(),
            $keys[23] => $this->getExpiredDate(),
            $keys[24] => $this->getLastSync(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = PublisherPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdPublisher($value);
                break;
            case 1:
                $this->setName($value);
                break;
            case 2:
                $this->setAddress($value);
                break;
            case 3:
                $this->setPhone($value);
                break;
            case 4:
                $this->setEmail($value);
                break;
            case 5:
                $this->setHeadOffice($value);
                break;
            case 6:
                $this->setDirectorName($value);
                break;
            case 7:
                $this->setDirectorPhone($value);
                break;
            case 8:
                $this->setDirectorEmail($value);
                break;
            case 9:
                $this->setContactPerson($value);
                break;
            case 10:
                $this->setCpPhone($value);
                break;
            case 11:
                $this->setContactPerson2($value);
                break;
            case 12:
                $this->setCpPhone2($value);
                break;
            case 13:
                $this->setNpwp($value);
                break;
            case 14:
                $this->setSiup($value);
                break;
            case 15:
                $this->setAkta($value);
                break;
            case 16:
                $this->setNoKta($value);
                break;
            case 17:
                $this->setKta($value);
                break;
            case 18:
                $this->setSurat($value);
                break;
            case 19:
                $this->setSuratPernyataan($value);
                break;
            case 20:
                $this->setKodeWilayah($value);
                break;
            case 21:
                $this->setCreateDate($value);
                break;
            case 22:
                $this->setLastUpdate($value);
                break;
            case 23:
                $this->setExpiredDate($value);
                break;
            case 24:
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
        $keys = PublisherPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdPublisher($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setAddress($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPhone($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setEmail($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setHeadOffice($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setDirectorName($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setDirectorPhone($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setDirectorEmail($arr[$keys[8]]);
        if (array_key_exists($keys[9], $arr)) $this->setContactPerson($arr[$keys[9]]);
        if (array_key_exists($keys[10], $arr)) $this->setCpPhone($arr[$keys[10]]);
        if (array_key_exists($keys[11], $arr)) $this->setContactPerson2($arr[$keys[11]]);
        if (array_key_exists($keys[12], $arr)) $this->setCpPhone2($arr[$keys[12]]);
        if (array_key_exists($keys[13], $arr)) $this->setNpwp($arr[$keys[13]]);
        if (array_key_exists($keys[14], $arr)) $this->setSiup($arr[$keys[14]]);
        if (array_key_exists($keys[15], $arr)) $this->setAkta($arr[$keys[15]]);
        if (array_key_exists($keys[16], $arr)) $this->setNoKta($arr[$keys[16]]);
        if (array_key_exists($keys[17], $arr)) $this->setKta($arr[$keys[17]]);
        if (array_key_exists($keys[18], $arr)) $this->setSurat($arr[$keys[18]]);
        if (array_key_exists($keys[19], $arr)) $this->setSuratPernyataan($arr[$keys[19]]);
        if (array_key_exists($keys[20], $arr)) $this->setKodeWilayah($arr[$keys[20]]);
        if (array_key_exists($keys[21], $arr)) $this->setCreateDate($arr[$keys[21]]);
        if (array_key_exists($keys[22], $arr)) $this->setLastUpdate($arr[$keys[22]]);
        if (array_key_exists($keys[23], $arr)) $this->setExpiredDate($arr[$keys[23]]);
        if (array_key_exists($keys[24], $arr)) $this->setLastSync($arr[$keys[24]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(PublisherPeer::DATABASE_NAME);

        if ($this->isColumnModified(PublisherPeer::ID_PUBLISHER)) $criteria->add(PublisherPeer::ID_PUBLISHER, $this->id_publisher);
        if ($this->isColumnModified(PublisherPeer::NAME)) $criteria->add(PublisherPeer::NAME, $this->name);
        if ($this->isColumnModified(PublisherPeer::ADDRESS)) $criteria->add(PublisherPeer::ADDRESS, $this->address);
        if ($this->isColumnModified(PublisherPeer::PHONE)) $criteria->add(PublisherPeer::PHONE, $this->phone);
        if ($this->isColumnModified(PublisherPeer::EMAIL)) $criteria->add(PublisherPeer::EMAIL, $this->email);
        if ($this->isColumnModified(PublisherPeer::HEAD_OFFICE)) $criteria->add(PublisherPeer::HEAD_OFFICE, $this->head_office);
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_NAME)) $criteria->add(PublisherPeer::DIRECTOR_NAME, $this->director_name);
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_PHONE)) $criteria->add(PublisherPeer::DIRECTOR_PHONE, $this->director_phone);
        if ($this->isColumnModified(PublisherPeer::DIRECTOR_EMAIL)) $criteria->add(PublisherPeer::DIRECTOR_EMAIL, $this->director_email);
        if ($this->isColumnModified(PublisherPeer::CONTACT_PERSON)) $criteria->add(PublisherPeer::CONTACT_PERSON, $this->contact_person);
        if ($this->isColumnModified(PublisherPeer::CP_PHONE)) $criteria->add(PublisherPeer::CP_PHONE, $this->cp_phone);
        if ($this->isColumnModified(PublisherPeer::CONTACT_PERSON2)) $criteria->add(PublisherPeer::CONTACT_PERSON2, $this->contact_person2);
        if ($this->isColumnModified(PublisherPeer::CP_PHONE2)) $criteria->add(PublisherPeer::CP_PHONE2, $this->cp_phone2);
        if ($this->isColumnModified(PublisherPeer::NPWP)) $criteria->add(PublisherPeer::NPWP, $this->npwp);
        if ($this->isColumnModified(PublisherPeer::SIUP)) $criteria->add(PublisherPeer::SIUP, $this->siup);
        if ($this->isColumnModified(PublisherPeer::AKTA)) $criteria->add(PublisherPeer::AKTA, $this->akta);
        if ($this->isColumnModified(PublisherPeer::NO_KTA)) $criteria->add(PublisherPeer::NO_KTA, $this->no_kta);
        if ($this->isColumnModified(PublisherPeer::KTA)) $criteria->add(PublisherPeer::KTA, $this->kta);
        if ($this->isColumnModified(PublisherPeer::SURAT)) $criteria->add(PublisherPeer::SURAT, $this->surat);
        if ($this->isColumnModified(PublisherPeer::SURAT_PERNYATAAN)) $criteria->add(PublisherPeer::SURAT_PERNYATAAN, $this->surat_pernyataan);
        if ($this->isColumnModified(PublisherPeer::KODE_WILAYAH)) $criteria->add(PublisherPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(PublisherPeer::CREATE_DATE)) $criteria->add(PublisherPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(PublisherPeer::LAST_UPDATE)) $criteria->add(PublisherPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(PublisherPeer::EXPIRED_DATE)) $criteria->add(PublisherPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(PublisherPeer::LAST_SYNC)) $criteria->add(PublisherPeer::LAST_SYNC, $this->last_sync);

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
        $criteria = new Criteria(PublisherPeer::DATABASE_NAME);
        $criteria->add(PublisherPeer::ID_PUBLISHER, $this->id_publisher);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdPublisher();
    }

    /**
     * Generic method to set the primary key (id_publisher column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdPublisher($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdPublisher();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Publisher (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setName($this->getName());
        $copyObj->setAddress($this->getAddress());
        $copyObj->setPhone($this->getPhone());
        $copyObj->setEmail($this->getEmail());
        $copyObj->setHeadOffice($this->getHeadOffice());
        $copyObj->setDirectorName($this->getDirectorName());
        $copyObj->setDirectorPhone($this->getDirectorPhone());
        $copyObj->setDirectorEmail($this->getDirectorEmail());
        $copyObj->setContactPerson($this->getContactPerson());
        $copyObj->setCpPhone($this->getCpPhone());
        $copyObj->setContactPerson2($this->getContactPerson2());
        $copyObj->setCpPhone2($this->getCpPhone2());
        $copyObj->setNpwp($this->getNpwp());
        $copyObj->setSiup($this->getSiup());
        $copyObj->setAkta($this->getAkta());
        $copyObj->setNoKta($this->getNoKta());
        $copyObj->setKta($this->getKta());
        $copyObj->setSurat($this->getSurat());
        $copyObj->setSuratPernyataan($this->getSuratPernyataan());
        $copyObj->setKodeWilayah($this->getKodeWilayah());
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

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdPublisher(NULL); // this is a auto-increment column, so set to default value
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
     * @return Publisher Clone of current object.
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
     * @return PublisherPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new PublisherPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Publisher The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMstWilayah(MstWilayah $v = null)
    {
        if ($v === null) {
            $this->setKodeWilayah(NULL);
        } else {
            $this->setKodeWilayah($v->getKodeWilayah());
        }

        $this->aMstWilayah = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MstWilayah object, it will not be re-added.
        if ($v !== null) {
            $v->addPublisher($this);
        }


        return $this;
    }


    /**
     * Get the associated MstWilayah object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MstWilayah The associated MstWilayah object.
     * @throws PropelException
     */
    public function getMstWilayah(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMstWilayah === null && (($this->kode_wilayah !== "" && $this->kode_wilayah !== null)) && $doQuery) {
            $this->aMstWilayah = MstWilayahQuery::create()->findPk($this->kode_wilayah, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMstWilayah->addPublishers($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_publisher = null;
        $this->name = null;
        $this->address = null;
        $this->phone = null;
        $this->email = null;
        $this->head_office = null;
        $this->director_name = null;
        $this->director_phone = null;
        $this->director_email = null;
        $this->contact_person = null;
        $this->cp_phone = null;
        $this->contact_person2 = null;
        $this->cp_phone2 = null;
        $this->npwp = null;
        $this->siup = null;
        $this->akta = null;
        $this->no_kta = null;
        $this->kta = null;
        $this->surat = null;
        $this->surat_pernyataan = null;
        $this->kode_wilayah = null;
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
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aMstWilayah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(PublisherPeer::DEFAULT_STRING_FORMAT);
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
