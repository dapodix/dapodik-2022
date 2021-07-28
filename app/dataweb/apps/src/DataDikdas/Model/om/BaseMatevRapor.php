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
use DataDikdas\Model\MataPelajaran;
use DataDikdas\Model\MataPelajaranQuery;
use DataDikdas\Model\MatevRapor;
use DataDikdas\Model\MatevRaporPeer;
use DataDikdas\Model\MatevRaporQuery;
use DataDikdas\Model\NilaiRapor;
use DataDikdas\Model\NilaiRaporQuery;

/**
 * Base class that represents a row from the 'nilai.matev_rapor' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseMatevRapor extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\MatevRaporPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        MatevRaporPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_evaluasi field.
     * @var        string
     */
    protected $id_evaluasi;

    /**
     * The value for the nm_mata_evaluasi field.
     * @var        string
     */
    protected $nm_mata_evaluasi;

    /**
     * The value for the a_dari_template field.
     * @var        string
     */
    protected $a_dari_template;

    /**
     * The value for the no_urut field.
     * @var        string
     */
    protected $no_urut;

    /**
     * The value for the kkm_kognitif field.
     * @var        string
     */
    protected $kkm_kognitif;

    /**
     * The value for the kkm_psikomotorik field.
     * @var        string
     */
    protected $kkm_psikomotorik;

    /**
     * The value for the rombongan_belajar_id field.
     * @var        string
     */
    protected $rombongan_belajar_id;

    /**
     * The value for the mata_pelajaran_id field.
     * @var        int
     */
    protected $mata_pelajaran_id;

    /**
     * The value for the pembelajaran_id field.
     * @var        string
     */
    protected $pembelajaran_id;

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
     * @var        MataPelajaran
     */
    protected $aMataPelajaran;

    /**
     * @var        PropelObjectCollection|NilaiRapor[] Collection to store aggregation of NilaiRapor objects.
     */
    protected $collNilaiRapors;
    protected $collNilaiRaporsPartial;

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
    protected $nilaiRaporsScheduledForDeletion = null;

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
     * Initializes internal state of BaseMatevRapor object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_evaluasi] column value.
     * 
     * @return string
     */
    public function getIdEvaluasi()
    {
        return $this->id_evaluasi;
    }

    /**
     * Get the [nm_mata_evaluasi] column value.
     * 
     * @return string
     */
    public function getNmMataEvaluasi()
    {
        return $this->nm_mata_evaluasi;
    }

    /**
     * Get the [a_dari_template] column value.
     * 
     * @return string
     */
    public function getADariTemplate()
    {
        return $this->a_dari_template;
    }

    /**
     * Get the [no_urut] column value.
     * 
     * @return string
     */
    public function getNoUrut()
    {
        return $this->no_urut;
    }

    /**
     * Get the [kkm_kognitif] column value.
     * 
     * @return string
     */
    public function getKkmKognitif()
    {
        return $this->kkm_kognitif;
    }

    /**
     * Get the [kkm_psikomotorik] column value.
     * 
     * @return string
     */
    public function getKkmPsikomotorik()
    {
        return $this->kkm_psikomotorik;
    }

    /**
     * Get the [rombongan_belajar_id] column value.
     * 
     * @return string
     */
    public function getRombonganBelajarId()
    {
        return $this->rombongan_belajar_id;
    }

    /**
     * Get the [mata_pelajaran_id] column value.
     * 
     * @return int
     */
    public function getMataPelajaranId()
    {
        return $this->mata_pelajaran_id;
    }

    /**
     * Get the [pembelajaran_id] column value.
     * 
     * @return string
     */
    public function getPembelajaranId()
    {
        return $this->pembelajaran_id;
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
     * Set the value of [id_evaluasi] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setIdEvaluasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_evaluasi !== $v) {
            $this->id_evaluasi = $v;
            $this->modifiedColumns[] = MatevRaporPeer::ID_EVALUASI;
        }


        return $this;
    } // setIdEvaluasi()

    /**
     * Set the value of [nm_mata_evaluasi] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setNmMataEvaluasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->nm_mata_evaluasi !== $v) {
            $this->nm_mata_evaluasi = $v;
            $this->modifiedColumns[] = MatevRaporPeer::NM_MATA_EVALUASI;
        }


        return $this;
    } // setNmMataEvaluasi()

    /**
     * Set the value of [a_dari_template] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setADariTemplate($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_dari_template !== $v) {
            $this->a_dari_template = $v;
            $this->modifiedColumns[] = MatevRaporPeer::A_DARI_TEMPLATE;
        }


        return $this;
    } // setADariTemplate()

    /**
     * Set the value of [no_urut] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setNoUrut($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->no_urut !== $v) {
            $this->no_urut = $v;
            $this->modifiedColumns[] = MatevRaporPeer::NO_URUT;
        }


        return $this;
    } // setNoUrut()

    /**
     * Set the value of [kkm_kognitif] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setKkmKognitif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kkm_kognitif !== $v) {
            $this->kkm_kognitif = $v;
            $this->modifiedColumns[] = MatevRaporPeer::KKM_KOGNITIF;
        }


        return $this;
    } // setKkmKognitif()

    /**
     * Set the value of [kkm_psikomotorik] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setKkmPsikomotorik($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kkm_psikomotorik !== $v) {
            $this->kkm_psikomotorik = $v;
            $this->modifiedColumns[] = MatevRaporPeer::KKM_PSIKOMOTORIK;
        }


        return $this;
    } // setKkmPsikomotorik()

    /**
     * Set the value of [rombongan_belajar_id] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setRombonganBelajarId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->rombongan_belajar_id !== $v) {
            $this->rombongan_belajar_id = $v;
            $this->modifiedColumns[] = MatevRaporPeer::ROMBONGAN_BELAJAR_ID;
        }


        return $this;
    } // setRombonganBelajarId()

    /**
     * Set the value of [mata_pelajaran_id] column.
     * 
     * @param int $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setMataPelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (int) $v;
        }

        if ($this->mata_pelajaran_id !== $v) {
            $this->mata_pelajaran_id = $v;
            $this->modifiedColumns[] = MatevRaporPeer::MATA_PELAJARAN_ID;
        }

        if ($this->aMataPelajaran !== null && $this->aMataPelajaran->getMataPelajaranId() !== $v) {
            $this->aMataPelajaran = null;
        }


        return $this;
    } // setMataPelajaranId()

    /**
     * Set the value of [pembelajaran_id] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setPembelajaranId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pembelajaran_id !== $v) {
            $this->pembelajaran_id = $v;
            $this->modifiedColumns[] = MatevRaporPeer::PEMBELAJARAN_ID;
        }


        return $this;
    } // setPembelajaranId()

    /**
     * Sets the value of [create_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setCreateDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->create_date !== null || $dt !== null) {
            $currentDateAsString = ($this->create_date !== null && $tmpDt = new DateTime($this->create_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->create_date = $newDateAsString;
                $this->modifiedColumns[] = MatevRaporPeer::CREATE_DATE;
            }
        } // if either are not null


        return $this;
    } // setCreateDate()

    /**
     * Sets the value of [last_update] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setLastUpdate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->last_update !== null || $dt !== null) {
            $currentDateAsString = ($this->last_update !== null && $tmpDt = new DateTime($this->last_update)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->last_update = $newDateAsString;
                $this->modifiedColumns[] = MatevRaporPeer::LAST_UPDATE;
            }
        } // if either are not null


        return $this;
    } // setLastUpdate()

    /**
     * Set the value of [soft_delete] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setSoftDelete($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->soft_delete !== $v) {
            $this->soft_delete = $v;
            $this->modifiedColumns[] = MatevRaporPeer::SOFT_DELETE;
        }


        return $this;
    } // setSoftDelete()

    /**
     * Sets the value of [last_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return MatevRapor The current object (for fluent API support)
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
                $this->modifiedColumns[] = MatevRaporPeer::LAST_SYNC;
            }
        } // if either are not null


        return $this;
    } // setLastSync()

    /**
     * Set the value of [updater_id] column.
     * 
     * @param string $v new value
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setUpdaterId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->updater_id !== $v) {
            $this->updater_id = $v;
            $this->modifiedColumns[] = MatevRaporPeer::UPDATER_ID;
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

            $this->id_evaluasi = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->nm_mata_evaluasi = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->a_dari_template = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->no_urut = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->kkm_kognitif = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->kkm_psikomotorik = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->rombongan_belajar_id = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->mata_pelajaran_id = ($row[$startcol + 7] !== null) ? (int) $row[$startcol + 7] : null;
            $this->pembelajaran_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
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
            return $startcol + 14; // 14 = MatevRaporPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating MatevRapor object", $e);
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

        if ($this->aMataPelajaran !== null && $this->mata_pelajaran_id !== $this->aMataPelajaran->getMataPelajaranId()) {
            $this->aMataPelajaran = null;
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
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = MatevRaporPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMataPelajaran = null;
            $this->collNilaiRapors = null;

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
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = MatevRaporQuery::create()
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
            $con = Propel::getConnection(MatevRaporPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                MatevRaporPeer::addInstanceToPool($this);
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

            if ($this->aMataPelajaran !== null) {
                if ($this->aMataPelajaran->isModified() || $this->aMataPelajaran->isNew()) {
                    $affectedRows += $this->aMataPelajaran->save($con);
                }
                $this->setMataPelajaran($this->aMataPelajaran);
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

            if ($this->nilaiRaporsScheduledForDeletion !== null) {
                if (!$this->nilaiRaporsScheduledForDeletion->isEmpty()) {
                    NilaiRaporQuery::create()
                        ->filterByPrimaryKeys($this->nilaiRaporsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->nilaiRaporsScheduledForDeletion = null;
                }
            }

            if ($this->collNilaiRapors !== null) {
                foreach ($this->collNilaiRapors as $referrerFK) {
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
        if ($this->isColumnModified(MatevRaporPeer::ID_EVALUASI)) {
            $modifiedColumns[':p' . $index++]  = '"id_evaluasi"';
        }
        if ($this->isColumnModified(MatevRaporPeer::NM_MATA_EVALUASI)) {
            $modifiedColumns[':p' . $index++]  = '"nm_mata_evaluasi"';
        }
        if ($this->isColumnModified(MatevRaporPeer::A_DARI_TEMPLATE)) {
            $modifiedColumns[':p' . $index++]  = '"a_dari_template"';
        }
        if ($this->isColumnModified(MatevRaporPeer::NO_URUT)) {
            $modifiedColumns[':p' . $index++]  = '"no_urut"';
        }
        if ($this->isColumnModified(MatevRaporPeer::KKM_KOGNITIF)) {
            $modifiedColumns[':p' . $index++]  = '"kkm_kognitif"';
        }
        if ($this->isColumnModified(MatevRaporPeer::KKM_PSIKOMOTORIK)) {
            $modifiedColumns[':p' . $index++]  = '"kkm_psikomotorik"';
        }
        if ($this->isColumnModified(MatevRaporPeer::ROMBONGAN_BELAJAR_ID)) {
            $modifiedColumns[':p' . $index++]  = '"rombongan_belajar_id"';
        }
        if ($this->isColumnModified(MatevRaporPeer::MATA_PELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"mata_pelajaran_id"';
        }
        if ($this->isColumnModified(MatevRaporPeer::PEMBELAJARAN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pembelajaran_id"';
        }
        if ($this->isColumnModified(MatevRaporPeer::CREATE_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"create_date"';
        }
        if ($this->isColumnModified(MatevRaporPeer::LAST_UPDATE)) {
            $modifiedColumns[':p' . $index++]  = '"last_update"';
        }
        if ($this->isColumnModified(MatevRaporPeer::SOFT_DELETE)) {
            $modifiedColumns[':p' . $index++]  = '"soft_delete"';
        }
        if ($this->isColumnModified(MatevRaporPeer::LAST_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"last_sync"';
        }
        if ($this->isColumnModified(MatevRaporPeer::UPDATER_ID)) {
            $modifiedColumns[':p' . $index++]  = '"updater_id"';
        }

        $sql = sprintf(
            'INSERT INTO "nilai"."matev_rapor" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_evaluasi"':						
                        $stmt->bindValue($identifier, $this->id_evaluasi, PDO::PARAM_STR);
                        break;
                    case '"nm_mata_evaluasi"':						
                        $stmt->bindValue($identifier, $this->nm_mata_evaluasi, PDO::PARAM_STR);
                        break;
                    case '"a_dari_template"':						
                        $stmt->bindValue($identifier, $this->a_dari_template, PDO::PARAM_STR);
                        break;
                    case '"no_urut"':						
                        $stmt->bindValue($identifier, $this->no_urut, PDO::PARAM_STR);
                        break;
                    case '"kkm_kognitif"':						
                        $stmt->bindValue($identifier, $this->kkm_kognitif, PDO::PARAM_STR);
                        break;
                    case '"kkm_psikomotorik"':						
                        $stmt->bindValue($identifier, $this->kkm_psikomotorik, PDO::PARAM_STR);
                        break;
                    case '"rombongan_belajar_id"':						
                        $stmt->bindValue($identifier, $this->rombongan_belajar_id, PDO::PARAM_STR);
                        break;
                    case '"mata_pelajaran_id"':						
                        $stmt->bindValue($identifier, $this->mata_pelajaran_id, PDO::PARAM_INT);
                        break;
                    case '"pembelajaran_id"':						
                        $stmt->bindValue($identifier, $this->pembelajaran_id, PDO::PARAM_STR);
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

            if ($this->aMataPelajaran !== null) {
                if (!$this->aMataPelajaran->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aMataPelajaran->getValidationFailures());
                }
            }


            if (($retval = MatevRaporPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collNilaiRapors !== null) {
                    foreach ($this->collNilaiRapors as $referrerFK) {
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
        $pos = MatevRaporPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdEvaluasi();
                break;
            case 1:
                return $this->getNmMataEvaluasi();
                break;
            case 2:
                return $this->getADariTemplate();
                break;
            case 3:
                return $this->getNoUrut();
                break;
            case 4:
                return $this->getKkmKognitif();
                break;
            case 5:
                return $this->getKkmPsikomotorik();
                break;
            case 6:
                return $this->getRombonganBelajarId();
                break;
            case 7:
                return $this->getMataPelajaranId();
                break;
            case 8:
                return $this->getPembelajaranId();
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
        if (isset($alreadyDumpedObjects['MatevRapor'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['MatevRapor'][$this->getPrimaryKey()] = true;
        $keys = MatevRaporPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdEvaluasi(),
            $keys[1] => $this->getNmMataEvaluasi(),
            $keys[2] => $this->getADariTemplate(),
            $keys[3] => $this->getNoUrut(),
            $keys[4] => $this->getKkmKognitif(),
            $keys[5] => $this->getKkmPsikomotorik(),
            $keys[6] => $this->getRombonganBelajarId(),
            $keys[7] => $this->getMataPelajaranId(),
            $keys[8] => $this->getPembelajaranId(),
            $keys[9] => $this->getCreateDate(),
            $keys[10] => $this->getLastUpdate(),
            $keys[11] => $this->getSoftDelete(),
            $keys[12] => $this->getLastSync(),
            $keys[13] => $this->getUpdaterId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMataPelajaran) {
                $result['MataPelajaran'] = $this->aMataPelajaran->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collNilaiRapors) {
                $result['NilaiRapors'] = $this->collNilaiRapors->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = MatevRaporPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdEvaluasi($value);
                break;
            case 1:
                $this->setNmMataEvaluasi($value);
                break;
            case 2:
                $this->setADariTemplate($value);
                break;
            case 3:
                $this->setNoUrut($value);
                break;
            case 4:
                $this->setKkmKognitif($value);
                break;
            case 5:
                $this->setKkmPsikomotorik($value);
                break;
            case 6:
                $this->setRombonganBelajarId($value);
                break;
            case 7:
                $this->setMataPelajaranId($value);
                break;
            case 8:
                $this->setPembelajaranId($value);
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
        $keys = MatevRaporPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdEvaluasi($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setNmMataEvaluasi($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setADariTemplate($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setNoUrut($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setKkmKognitif($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKkmPsikomotorik($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRombonganBelajarId($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setMataPelajaranId($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setPembelajaranId($arr[$keys[8]]);
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
        $criteria = new Criteria(MatevRaporPeer::DATABASE_NAME);

        if ($this->isColumnModified(MatevRaporPeer::ID_EVALUASI)) $criteria->add(MatevRaporPeer::ID_EVALUASI, $this->id_evaluasi);
        if ($this->isColumnModified(MatevRaporPeer::NM_MATA_EVALUASI)) $criteria->add(MatevRaporPeer::NM_MATA_EVALUASI, $this->nm_mata_evaluasi);
        if ($this->isColumnModified(MatevRaporPeer::A_DARI_TEMPLATE)) $criteria->add(MatevRaporPeer::A_DARI_TEMPLATE, $this->a_dari_template);
        if ($this->isColumnModified(MatevRaporPeer::NO_URUT)) $criteria->add(MatevRaporPeer::NO_URUT, $this->no_urut);
        if ($this->isColumnModified(MatevRaporPeer::KKM_KOGNITIF)) $criteria->add(MatevRaporPeer::KKM_KOGNITIF, $this->kkm_kognitif);
        if ($this->isColumnModified(MatevRaporPeer::KKM_PSIKOMOTORIK)) $criteria->add(MatevRaporPeer::KKM_PSIKOMOTORIK, $this->kkm_psikomotorik);
        if ($this->isColumnModified(MatevRaporPeer::ROMBONGAN_BELAJAR_ID)) $criteria->add(MatevRaporPeer::ROMBONGAN_BELAJAR_ID, $this->rombongan_belajar_id);
        if ($this->isColumnModified(MatevRaporPeer::MATA_PELAJARAN_ID)) $criteria->add(MatevRaporPeer::MATA_PELAJARAN_ID, $this->mata_pelajaran_id);
        if ($this->isColumnModified(MatevRaporPeer::PEMBELAJARAN_ID)) $criteria->add(MatevRaporPeer::PEMBELAJARAN_ID, $this->pembelajaran_id);
        if ($this->isColumnModified(MatevRaporPeer::CREATE_DATE)) $criteria->add(MatevRaporPeer::CREATE_DATE, $this->create_date);
        if ($this->isColumnModified(MatevRaporPeer::LAST_UPDATE)) $criteria->add(MatevRaporPeer::LAST_UPDATE, $this->last_update);
        if ($this->isColumnModified(MatevRaporPeer::SOFT_DELETE)) $criteria->add(MatevRaporPeer::SOFT_DELETE, $this->soft_delete);
        if ($this->isColumnModified(MatevRaporPeer::LAST_SYNC)) $criteria->add(MatevRaporPeer::LAST_SYNC, $this->last_sync);
        if ($this->isColumnModified(MatevRaporPeer::UPDATER_ID)) $criteria->add(MatevRaporPeer::UPDATER_ID, $this->updater_id);

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
        $criteria = new Criteria(MatevRaporPeer::DATABASE_NAME);
        $criteria->add(MatevRaporPeer::ID_EVALUASI, $this->id_evaluasi);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdEvaluasi();
    }

    /**
     * Generic method to set the primary key (id_evaluasi column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdEvaluasi($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdEvaluasi();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of MatevRapor (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setNmMataEvaluasi($this->getNmMataEvaluasi());
        $copyObj->setADariTemplate($this->getADariTemplate());
        $copyObj->setNoUrut($this->getNoUrut());
        $copyObj->setKkmKognitif($this->getKkmKognitif());
        $copyObj->setKkmPsikomotorik($this->getKkmPsikomotorik());
        $copyObj->setRombonganBelajarId($this->getRombonganBelajarId());
        $copyObj->setMataPelajaranId($this->getMataPelajaranId());
        $copyObj->setPembelajaranId($this->getPembelajaranId());
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

            foreach ($this->getNilaiRapors() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addNilaiRapor($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdEvaluasi(NULL); // this is a auto-increment column, so set to default value
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
     * @return MatevRapor Clone of current object.
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
     * @return MatevRaporPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new MatevRaporPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MataPelajaran object.
     *
     * @param             MataPelajaran $v
     * @return MatevRapor The current object (for fluent API support)
     * @throws PropelException
     */
    public function setMataPelajaran(MataPelajaran $v = null)
    {
        if ($v === null) {
            $this->setMataPelajaranId(NULL);
        } else {
            $this->setMataPelajaranId($v->getMataPelajaranId());
        }

        $this->aMataPelajaran = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the MataPelajaran object, it will not be re-added.
        if ($v !== null) {
            $v->addMatevRapor($this);
        }


        return $this;
    }


    /**
     * Get the associated MataPelajaran object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return MataPelajaran The associated MataPelajaran object.
     * @throws PropelException
     */
    public function getMataPelajaran(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aMataPelajaran === null && ($this->mata_pelajaran_id !== null) && $doQuery) {
            $this->aMataPelajaran = MataPelajaranQuery::create()->findPk($this->mata_pelajaran_id, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aMataPelajaran->addMatevRapors($this);
             */
        }

        return $this->aMataPelajaran;
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
        if ('NilaiRapor' == $relationName) {
            $this->initNilaiRapors();
        }
    }

    /**
     * Clears out the collNilaiRapors collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return MatevRapor The current object (for fluent API support)
     * @see        addNilaiRapors()
     */
    public function clearNilaiRapors()
    {
        $this->collNilaiRapors = null; // important to set this to null since that means it is uninitialized
        $this->collNilaiRaporsPartial = null;

        return $this;
    }

    /**
     * reset is the collNilaiRapors collection loaded partially
     *
     * @return void
     */
    public function resetPartialNilaiRapors($v = true)
    {
        $this->collNilaiRaporsPartial = $v;
    }

    /**
     * Initializes the collNilaiRapors collection.
     *
     * By default this just sets the collNilaiRapors collection to an empty array (like clearcollNilaiRapors());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initNilaiRapors($overrideExisting = true)
    {
        if (null !== $this->collNilaiRapors && !$overrideExisting) {
            return;
        }
        $this->collNilaiRapors = new PropelObjectCollection();
        $this->collNilaiRapors->setModel('NilaiRapor');
    }

    /**
     * Gets an array of NilaiRapor objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this MatevRapor is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|NilaiRapor[] List of NilaiRapor objects
     * @throws PropelException
     */
    public function getNilaiRapors($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collNilaiRaporsPartial && !$this->isNew();
        if (null === $this->collNilaiRapors || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collNilaiRapors) {
                // return empty collection
                $this->initNilaiRapors();
            } else {
                $collNilaiRapors = NilaiRaporQuery::create(null, $criteria)
                    ->filterByMatevRapor($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collNilaiRaporsPartial && count($collNilaiRapors)) {
                      $this->initNilaiRapors(false);

                      foreach($collNilaiRapors as $obj) {
                        if (false == $this->collNilaiRapors->contains($obj)) {
                          $this->collNilaiRapors->append($obj);
                        }
                      }

                      $this->collNilaiRaporsPartial = true;
                    }

                    $collNilaiRapors->getInternalIterator()->rewind();
                    return $collNilaiRapors;
                }

                if($partial && $this->collNilaiRapors) {
                    foreach($this->collNilaiRapors as $obj) {
                        if($obj->isNew()) {
                            $collNilaiRapors[] = $obj;
                        }
                    }
                }

                $this->collNilaiRapors = $collNilaiRapors;
                $this->collNilaiRaporsPartial = false;
            }
        }

        return $this->collNilaiRapors;
    }

    /**
     * Sets a collection of NilaiRapor objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $nilaiRapors A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return MatevRapor The current object (for fluent API support)
     */
    public function setNilaiRapors(PropelCollection $nilaiRapors, PropelPDO $con = null)
    {
        $nilaiRaporsToDelete = $this->getNilaiRapors(new Criteria(), $con)->diff($nilaiRapors);

        $this->nilaiRaporsScheduledForDeletion = unserialize(serialize($nilaiRaporsToDelete));

        foreach ($nilaiRaporsToDelete as $nilaiRaporRemoved) {
            $nilaiRaporRemoved->setMatevRapor(null);
        }

        $this->collNilaiRapors = null;
        foreach ($nilaiRapors as $nilaiRapor) {
            $this->addNilaiRapor($nilaiRapor);
        }

        $this->collNilaiRapors = $nilaiRapors;
        $this->collNilaiRaporsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related NilaiRapor objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related NilaiRapor objects.
     * @throws PropelException
     */
    public function countNilaiRapors(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collNilaiRaporsPartial && !$this->isNew();
        if (null === $this->collNilaiRapors || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collNilaiRapors) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getNilaiRapors());
            }
            $query = NilaiRaporQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByMatevRapor($this)
                ->count($con);
        }

        return count($this->collNilaiRapors);
    }

    /**
     * Method called to associate a NilaiRapor object to this object
     * through the NilaiRapor foreign key attribute.
     *
     * @param    NilaiRapor $l NilaiRapor
     * @return MatevRapor The current object (for fluent API support)
     */
    public function addNilaiRapor(NilaiRapor $l)
    {
        if ($this->collNilaiRapors === null) {
            $this->initNilaiRapors();
            $this->collNilaiRaporsPartial = true;
        }
        if (!in_array($l, $this->collNilaiRapors->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddNilaiRapor($l);
        }

        return $this;
    }

    /**
     * @param	NilaiRapor $nilaiRapor The nilaiRapor object to add.
     */
    protected function doAddNilaiRapor($nilaiRapor)
    {
        $this->collNilaiRapors[]= $nilaiRapor;
        $nilaiRapor->setMatevRapor($this);
    }

    /**
     * @param	NilaiRapor $nilaiRapor The nilaiRapor object to remove.
     * @return MatevRapor The current object (for fluent API support)
     */
    public function removeNilaiRapor($nilaiRapor)
    {
        if ($this->getNilaiRapors()->contains($nilaiRapor)) {
            $this->collNilaiRapors->remove($this->collNilaiRapors->search($nilaiRapor));
            if (null === $this->nilaiRaporsScheduledForDeletion) {
                $this->nilaiRaporsScheduledForDeletion = clone $this->collNilaiRapors;
                $this->nilaiRaporsScheduledForDeletion->clear();
            }
            $this->nilaiRaporsScheduledForDeletion[]= clone $nilaiRapor;
            $nilaiRapor->setMatevRapor(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_evaluasi = null;
        $this->nm_mata_evaluasi = null;
        $this->a_dari_template = null;
        $this->no_urut = null;
        $this->kkm_kognitif = null;
        $this->kkm_psikomotorik = null;
        $this->rombongan_belajar_id = null;
        $this->mata_pelajaran_id = null;
        $this->pembelajaran_id = null;
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
            if ($this->collNilaiRapors) {
                foreach ($this->collNilaiRapors as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMataPelajaran instanceof Persistent) {
              $this->aMataPelajaran->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collNilaiRapors instanceof PropelCollection) {
            $this->collNilaiRapors->clearIterator();
        }
        $this->collNilaiRapors = null;
        $this->aMataPelajaran = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(MatevRaporPeer::DEFAULT_STRING_FORMAT);
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
