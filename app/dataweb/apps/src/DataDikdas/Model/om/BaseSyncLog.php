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
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\InstalasiQuery;
use DataDikdas\Model\SyncLog;
use DataDikdas\Model\SyncLogPeer;
use DataDikdas\Model\SyncLogQuery;

/**
 * Base class that represents a row from the 'sync_log' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseSyncLog extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\SyncLogPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        SyncLogPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the id_instalasi field.
     * @var        string
     */
    protected $id_instalasi;

    /**
     * The value for the begin_sync field.
     * @var        string
     */
    protected $begin_sync;

    /**
     * The value for the end_sync field.
     * @var        string
     */
    protected $end_sync;

    /**
     * The value for the sync_media field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $sync_media;

    /**
     * The value for the is_success field.
     * @var        string
     */
    protected $is_success;

    /**
     * The value for the selisih_waktu_server field.
     * @var        string
     */
    protected $selisih_waktu_server;

    /**
     * The value for the alamat_ip field.
     * @var        string
     */
    protected $alamat_ip;

    /**
     * The value for the pengguna_id field.
     * @var        string
     */
    protected $pengguna_id;

    /**
     * @var        Instalasi
     */
    protected $aInstalasi;

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
        $this->sync_media = '1';
    }

    /**
     * Initializes internal state of BaseSyncLog object.
     * @see        applyDefaults()
     */
    public function __construct()
    {
        parent::__construct();
        $this->applyDefaultValues();
    }

    /**
     * Get the [id_instalasi] column value.
     * 
     * @return string
     */
    public function getIdInstalasi()
    {
        return $this->id_instalasi;
    }

    /**
     * Get the [optionally formatted] temporal [begin_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getBeginSync($format = 'Y-m-d H:i:s')
    {
        if ($this->begin_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->begin_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->begin_sync, true), $x);
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
     * Get the [optionally formatted] temporal [end_sync] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getEndSync($format = 'Y-m-d H:i:s')
    {
        if ($this->end_sync === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->end_sync);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->end_sync, true), $x);
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
     * Get the [sync_media] column value.
     * 
     * @return string
     */
    public function getSyncMedia()
    {
        return $this->sync_media;
    }

    /**
     * Get the [is_success] column value.
     * 
     * @return string
     */
    public function getIsSuccess()
    {
        return $this->is_success;
    }

    /**
     * Get the [selisih_waktu_server] column value.
     * 
     * @return string
     */
    public function getSelisihWaktuServer()
    {
        return $this->selisih_waktu_server;
    }

    /**
     * Get the [alamat_ip] column value.
     * 
     * @return string
     */
    public function getAlamatIp()
    {
        return $this->alamat_ip;
    }

    /**
     * Get the [pengguna_id] column value.
     * 
     * @return string
     */
    public function getPenggunaId()
    {
        return $this->pengguna_id;
    }

    /**
     * Set the value of [id_instalasi] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setIdInstalasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_instalasi !== $v) {
            $this->id_instalasi = $v;
            $this->modifiedColumns[] = SyncLogPeer::ID_INSTALASI;
        }

        if ($this->aInstalasi !== null && $this->aInstalasi->getIdInstalasi() !== $v) {
            $this->aInstalasi = null;
        }


        return $this;
    } // setIdInstalasi()

    /**
     * Sets the value of [begin_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SyncLog The current object (for fluent API support)
     */
    public function setBeginSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->begin_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->begin_sync !== null && $tmpDt = new DateTime($this->begin_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->begin_sync = $newDateAsString;
                $this->modifiedColumns[] = SyncLogPeer::BEGIN_SYNC;
            }
        } // if either are not null


        return $this;
    } // setBeginSync()

    /**
     * Sets the value of [end_sync] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return SyncLog The current object (for fluent API support)
     */
    public function setEndSync($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->end_sync !== null || $dt !== null) {
            $currentDateAsString = ($this->end_sync !== null && $tmpDt = new DateTime($this->end_sync)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->end_sync = $newDateAsString;
                $this->modifiedColumns[] = SyncLogPeer::END_SYNC;
            }
        } // if either are not null


        return $this;
    } // setEndSync()

    /**
     * Set the value of [sync_media] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setSyncMedia($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sync_media !== $v) {
            $this->sync_media = $v;
            $this->modifiedColumns[] = SyncLogPeer::SYNC_MEDIA;
        }


        return $this;
    } // setSyncMedia()

    /**
     * Set the value of [is_success] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setIsSuccess($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->is_success !== $v) {
            $this->is_success = $v;
            $this->modifiedColumns[] = SyncLogPeer::IS_SUCCESS;
        }


        return $this;
    } // setIsSuccess()

    /**
     * Set the value of [selisih_waktu_server] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setSelisihWaktuServer($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->selisih_waktu_server !== $v) {
            $this->selisih_waktu_server = $v;
            $this->modifiedColumns[] = SyncLogPeer::SELISIH_WAKTU_SERVER;
        }


        return $this;
    } // setSelisihWaktuServer()

    /**
     * Set the value of [alamat_ip] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setAlamatIp($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->alamat_ip !== $v) {
            $this->alamat_ip = $v;
            $this->modifiedColumns[] = SyncLogPeer::ALAMAT_IP;
        }


        return $this;
    } // setAlamatIp()

    /**
     * Set the value of [pengguna_id] column.
     * 
     * @param string $v new value
     * @return SyncLog The current object (for fluent API support)
     */
    public function setPenggunaId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->pengguna_id !== $v) {
            $this->pengguna_id = $v;
            $this->modifiedColumns[] = SyncLogPeer::PENGGUNA_ID;
        }


        return $this;
    } // setPenggunaId()

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
            if ($this->sync_media !== '1') {
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

            $this->id_instalasi = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->begin_sync = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->end_sync = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->sync_media = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->is_success = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->selisih_waktu_server = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->alamat_ip = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->pengguna_id = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 8; // 8 = SyncLogPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating SyncLog object", $e);
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

        if ($this->aInstalasi !== null && $this->id_instalasi !== $this->aInstalasi->getIdInstalasi()) {
            $this->aInstalasi = null;
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
            $con = Propel::getConnection(SyncLogPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = SyncLogPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aInstalasi = null;
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
            $con = Propel::getConnection(SyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = SyncLogQuery::create()
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
            $con = Propel::getConnection(SyncLogPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                SyncLogPeer::addInstanceToPool($this);
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

            if ($this->aInstalasi !== null) {
                if ($this->aInstalasi->isModified() || $this->aInstalasi->isNew()) {
                    $affectedRows += $this->aInstalasi->save($con);
                }
                $this->setInstalasi($this->aInstalasi);
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
        if ($this->isColumnModified(SyncLogPeer::ID_INSTALASI)) {
            $modifiedColumns[':p' . $index++]  = '"id_instalasi"';
        }
        if ($this->isColumnModified(SyncLogPeer::BEGIN_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"begin_sync"';
        }
        if ($this->isColumnModified(SyncLogPeer::END_SYNC)) {
            $modifiedColumns[':p' . $index++]  = '"end_sync"';
        }
        if ($this->isColumnModified(SyncLogPeer::SYNC_MEDIA)) {
            $modifiedColumns[':p' . $index++]  = '"sync_media"';
        }
        if ($this->isColumnModified(SyncLogPeer::IS_SUCCESS)) {
            $modifiedColumns[':p' . $index++]  = '"is_success"';
        }
        if ($this->isColumnModified(SyncLogPeer::SELISIH_WAKTU_SERVER)) {
            $modifiedColumns[':p' . $index++]  = '"selisih_waktu_server"';
        }
        if ($this->isColumnModified(SyncLogPeer::ALAMAT_IP)) {
            $modifiedColumns[':p' . $index++]  = '"alamat_ip"';
        }
        if ($this->isColumnModified(SyncLogPeer::PENGGUNA_ID)) {
            $modifiedColumns[':p' . $index++]  = '"pengguna_id"';
        }

        $sql = sprintf(
            'INSERT INTO "sync_log" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"id_instalasi"':						
                        $stmt->bindValue($identifier, $this->id_instalasi, PDO::PARAM_STR);
                        break;
                    case '"begin_sync"':						
                        $stmt->bindValue($identifier, $this->begin_sync, PDO::PARAM_STR);
                        break;
                    case '"end_sync"':						
                        $stmt->bindValue($identifier, $this->end_sync, PDO::PARAM_STR);
                        break;
                    case '"sync_media"':						
                        $stmt->bindValue($identifier, $this->sync_media, PDO::PARAM_STR);
                        break;
                    case '"is_success"':						
                        $stmt->bindValue($identifier, $this->is_success, PDO::PARAM_STR);
                        break;
                    case '"selisih_waktu_server"':						
                        $stmt->bindValue($identifier, $this->selisih_waktu_server, PDO::PARAM_STR);
                        break;
                    case '"alamat_ip"':						
                        $stmt->bindValue($identifier, $this->alamat_ip, PDO::PARAM_STR);
                        break;
                    case '"pengguna_id"':						
                        $stmt->bindValue($identifier, $this->pengguna_id, PDO::PARAM_STR);
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

            if ($this->aInstalasi !== null) {
                if (!$this->aInstalasi->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aInstalasi->getValidationFailures());
                }
            }


            if (($retval = SyncLogPeer::doValidate($this, $columns)) !== true) {
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
        $pos = SyncLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getIdInstalasi();
                break;
            case 1:
                return $this->getBeginSync();
                break;
            case 2:
                return $this->getEndSync();
                break;
            case 3:
                return $this->getSyncMedia();
                break;
            case 4:
                return $this->getIsSuccess();
                break;
            case 5:
                return $this->getSelisihWaktuServer();
                break;
            case 6:
                return $this->getAlamatIp();
                break;
            case 7:
                return $this->getPenggunaId();
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
        if (isset($alreadyDumpedObjects['SyncLog'][serialize($this->getPrimaryKey())])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['SyncLog'][serialize($this->getPrimaryKey())] = true;
        $keys = SyncLogPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdInstalasi(),
            $keys[1] => $this->getBeginSync(),
            $keys[2] => $this->getEndSync(),
            $keys[3] => $this->getSyncMedia(),
            $keys[4] => $this->getIsSuccess(),
            $keys[5] => $this->getSelisihWaktuServer(),
            $keys[6] => $this->getAlamatIp(),
            $keys[7] => $this->getPenggunaId(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aInstalasi) {
                $result['Instalasi'] = $this->aInstalasi->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
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
        $pos = SyncLogPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setIdInstalasi($value);
                break;
            case 1:
                $this->setBeginSync($value);
                break;
            case 2:
                $this->setEndSync($value);
                break;
            case 3:
                $this->setSyncMedia($value);
                break;
            case 4:
                $this->setIsSuccess($value);
                break;
            case 5:
                $this->setSelisihWaktuServer($value);
                break;
            case 6:
                $this->setAlamatIp($value);
                break;
            case 7:
                $this->setPenggunaId($value);
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
        $keys = SyncLogPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdInstalasi($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setBeginSync($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setEndSync($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setSyncMedia($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setIsSuccess($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setSelisihWaktuServer($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setAlamatIp($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setPenggunaId($arr[$keys[7]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(SyncLogPeer::DATABASE_NAME);

        if ($this->isColumnModified(SyncLogPeer::ID_INSTALASI)) $criteria->add(SyncLogPeer::ID_INSTALASI, $this->id_instalasi);
        if ($this->isColumnModified(SyncLogPeer::BEGIN_SYNC)) $criteria->add(SyncLogPeer::BEGIN_SYNC, $this->begin_sync);
        if ($this->isColumnModified(SyncLogPeer::END_SYNC)) $criteria->add(SyncLogPeer::END_SYNC, $this->end_sync);
        if ($this->isColumnModified(SyncLogPeer::SYNC_MEDIA)) $criteria->add(SyncLogPeer::SYNC_MEDIA, $this->sync_media);
        if ($this->isColumnModified(SyncLogPeer::IS_SUCCESS)) $criteria->add(SyncLogPeer::IS_SUCCESS, $this->is_success);
        if ($this->isColumnModified(SyncLogPeer::SELISIH_WAKTU_SERVER)) $criteria->add(SyncLogPeer::SELISIH_WAKTU_SERVER, $this->selisih_waktu_server);
        if ($this->isColumnModified(SyncLogPeer::ALAMAT_IP)) $criteria->add(SyncLogPeer::ALAMAT_IP, $this->alamat_ip);
        if ($this->isColumnModified(SyncLogPeer::PENGGUNA_ID)) $criteria->add(SyncLogPeer::PENGGUNA_ID, $this->pengguna_id);

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
        $criteria = new Criteria(SyncLogPeer::DATABASE_NAME);
        $criteria->add(SyncLogPeer::ID_INSTALASI, $this->id_instalasi);
        $criteria->add(SyncLogPeer::BEGIN_SYNC, $this->begin_sync);

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
        $pks[0] = $this->getIdInstalasi();
        $pks[1] = $this->getBeginSync();

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
        $this->setIdInstalasi($keys[0]);
        $this->setBeginSync($keys[1]);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return (null === $this->getIdInstalasi()) && (null === $this->getBeginSync());
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of SyncLog (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setIdInstalasi($this->getIdInstalasi());
        $copyObj->setBeginSync($this->getBeginSync());
        $copyObj->setEndSync($this->getEndSync());
        $copyObj->setSyncMedia($this->getSyncMedia());
        $copyObj->setIsSuccess($this->getIsSuccess());
        $copyObj->setSelisihWaktuServer($this->getSelisihWaktuServer());
        $copyObj->setAlamatIp($this->getAlamatIp());
        $copyObj->setPenggunaId($this->getPenggunaId());

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
     * @return SyncLog Clone of current object.
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
     * @return SyncLogPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new SyncLogPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a Instalasi object.
     *
     * @param             Instalasi $v
     * @return SyncLog The current object (for fluent API support)
     * @throws PropelException
     */
    public function setInstalasi(Instalasi $v = null)
    {
        if ($v === null) {
            $this->setIdInstalasi(NULL);
        } else {
            $this->setIdInstalasi($v->getIdInstalasi());
        }

        $this->aInstalasi = $v;

        // Add binding for other direction of this n:n relationship.
        // If this object has already been added to the Instalasi object, it will not be re-added.
        if ($v !== null) {
            $v->addSyncLog($this);
        }


        return $this;
    }


    /**
     * Get the associated Instalasi object
     *
     * @param PropelPDO $con Optional Connection object.
     * @param $doQuery Executes a query to get the object if required
     * @return Instalasi The associated Instalasi object.
     * @throws PropelException
     */
    public function getInstalasi(PropelPDO $con = null, $doQuery = true)
    {
        if ($this->aInstalasi === null && (($this->id_instalasi !== "" && $this->id_instalasi !== null)) && $doQuery) {
            $this->aInstalasi = InstalasiQuery::create()->findPk($this->id_instalasi, $con);
            /* The following can be used additionally to
                guarantee the related object contains a reference
                to this object.  This level of coupling may, however, be
                undesirable since it could result in an only partially populated collection
                in the referenced object.
                $this->aInstalasi->addSyncLogs($this);
             */
        }

        return $this->aInstalasi;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_instalasi = null;
        $this->begin_sync = null;
        $this->end_sync = null;
        $this->sync_media = null;
        $this->is_success = null;
        $this->selisih_waktu_server = null;
        $this->alamat_ip = null;
        $this->pengguna_id = null;
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
            if ($this->aInstalasi instanceof Persistent) {
              $this->aInstalasi->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        $this->aInstalasi = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(SyncLogPeer::DEFAULT_STRING_FORMAT);
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
