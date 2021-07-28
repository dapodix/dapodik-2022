<?php

namespace DataDikdas\Model\om;

use \BaseObject;
use \BasePeer;
use \Criteria;
use \Exception;
use \PDO;
use \Persistent;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Instalasi;
use DataDikdas\Model\InstalasiPeer;
use DataDikdas\Model\InstalasiQuery;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\MstWilayahQuery;
use DataDikdas\Model\Sekolah;
use DataDikdas\Model\SekolahQuery;
use DataDikdas\Model\SyncLog;
use DataDikdas\Model\SyncLogQuery;

/**
 * Base class that represents a row from the 'instalasi' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseInstalasi extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\InstalasiPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        InstalasiPeer
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
     * The value for the kode_wilayah field.
     * @var        string
     */
    protected $kode_wilayah;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

    /**
     * The value for the jns_instalasi field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $jns_instalasi;

    /**
     * The value for the a_link_aktif field.
     * Note: this column has a database default value of: '1'
     * @var        string
     */
    protected $a_link_aktif;

    /**
     * The value for the ket_link field.
     * @var        string
     */
    protected $ket_link;

    /**
     * @var        MstWilayah
     */
    protected $aMstWilayah;

    /**
     * @var        Sekolah
     */
    protected $aSekolah;

    /**
     * @var        PropelObjectCollection|SyncLog[] Collection to store aggregation of SyncLog objects.
     */
    protected $collSyncLogs;
    protected $collSyncLogsPartial;

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
    protected $syncLogsScheduledForDeletion = null;

    /**
     * Applies default values to this object.
     * This method should be called from the object's constructor (or
     * equivalent initialization method).
     * @see        __construct()
     */
    public function applyDefaultValues()
    {
        $this->jns_instalasi = '1';
        $this->a_link_aktif = '1';
    }

    /**
     * Initializes internal state of BaseInstalasi object.
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
     * Get the [kode_wilayah] column value.
     * 
     * @return string
     */
    public function getKodeWilayah()
    {
        return $this->kode_wilayah;
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
     * Get the [jns_instalasi] column value.
     * 
     * @return string
     */
    public function getJnsInstalasi()
    {
        return $this->jns_instalasi;
    }

    /**
     * Get the [a_link_aktif] column value.
     * 
     * @return string
     */
    public function getALinkAktif()
    {
        return $this->a_link_aktif;
    }

    /**
     * Get the [ket_link] column value.
     * 
     * @return string
     */
    public function getKetLink()
    {
        return $this->ket_link;
    }

    /**
     * Set the value of [id_instalasi] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setIdInstalasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->id_instalasi !== $v) {
            $this->id_instalasi = $v;
            $this->modifiedColumns[] = InstalasiPeer::ID_INSTALASI;
        }


        return $this;
    } // setIdInstalasi()

    /**
     * Set the value of [kode_wilayah] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setKodeWilayah($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->kode_wilayah !== $v) {
            $this->kode_wilayah = $v;
            $this->modifiedColumns[] = InstalasiPeer::KODE_WILAYAH;
        }

        if ($this->aMstWilayah !== null && $this->aMstWilayah->getKodeWilayah() !== $v) {
            $this->aMstWilayah = null;
        }


        return $this;
    } // setKodeWilayah()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = InstalasiPeer::SEKOLAH_ID;
        }

        if ($this->aSekolah !== null && $this->aSekolah->getSekolahId() !== $v) {
            $this->aSekolah = null;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [jns_instalasi] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setJnsInstalasi($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->jns_instalasi !== $v) {
            $this->jns_instalasi = $v;
            $this->modifiedColumns[] = InstalasiPeer::JNS_INSTALASI;
        }


        return $this;
    } // setJnsInstalasi()

    /**
     * Set the value of [a_link_aktif] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setALinkAktif($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->a_link_aktif !== $v) {
            $this->a_link_aktif = $v;
            $this->modifiedColumns[] = InstalasiPeer::A_LINK_AKTIF;
        }


        return $this;
    } // setALinkAktif()

    /**
     * Set the value of [ket_link] column.
     * 
     * @param string $v new value
     * @return Instalasi The current object (for fluent API support)
     */
    public function setKetLink($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ket_link !== $v) {
            $this->ket_link = $v;
            $this->modifiedColumns[] = InstalasiPeer::KET_LINK;
        }


        return $this;
    } // setKetLink()

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
            if ($this->jns_instalasi !== '1') {
                return false;
            }

            if ($this->a_link_aktif !== '1') {
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
            $this->kode_wilayah = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->sekolah_id = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->jns_instalasi = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->a_link_aktif = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->ket_link = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 6; // 6 = InstalasiPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating Instalasi object", $e);
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
            $con = Propel::getConnection(InstalasiPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = InstalasiPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

            $this->aMstWilayah = null;
            $this->aSekolah = null;
            $this->collSyncLogs = null;

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
            $con = Propel::getConnection(InstalasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = InstalasiQuery::create()
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
            $con = Propel::getConnection(InstalasiPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                InstalasiPeer::addInstanceToPool($this);
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

            if ($this->syncLogsScheduledForDeletion !== null) {
                if (!$this->syncLogsScheduledForDeletion->isEmpty()) {
                    SyncLogQuery::create()
                        ->filterByPrimaryKeys($this->syncLogsScheduledForDeletion->getPrimaryKeys(false))
                        ->delete($con);
                    $this->syncLogsScheduledForDeletion = null;
                }
            }

            if ($this->collSyncLogs !== null) {
                foreach ($this->collSyncLogs as $referrerFK) {
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
        if ($this->isColumnModified(InstalasiPeer::ID_INSTALASI)) {
            $modifiedColumns[':p' . $index++]  = '"id_instalasi"';
        }
        if ($this->isColumnModified(InstalasiPeer::KODE_WILAYAH)) {
            $modifiedColumns[':p' . $index++]  = '"kode_wilayah"';
        }
        if ($this->isColumnModified(InstalasiPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(InstalasiPeer::JNS_INSTALASI)) {
            $modifiedColumns[':p' . $index++]  = '"jns_instalasi"';
        }
        if ($this->isColumnModified(InstalasiPeer::A_LINK_AKTIF)) {
            $modifiedColumns[':p' . $index++]  = '"a_link_aktif"';
        }
        if ($this->isColumnModified(InstalasiPeer::KET_LINK)) {
            $modifiedColumns[':p' . $index++]  = '"ket_link"';
        }

        $sql = sprintf(
            'INSERT INTO "instalasi" (%s) VALUES (%s)',
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
                    case '"kode_wilayah"':						
                        $stmt->bindValue($identifier, $this->kode_wilayah, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
                        break;
                    case '"jns_instalasi"':						
                        $stmt->bindValue($identifier, $this->jns_instalasi, PDO::PARAM_STR);
                        break;
                    case '"a_link_aktif"':						
                        $stmt->bindValue($identifier, $this->a_link_aktif, PDO::PARAM_STR);
                        break;
                    case '"ket_link"':						
                        $stmt->bindValue($identifier, $this->ket_link, PDO::PARAM_STR);
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

            if ($this->aSekolah !== null) {
                if (!$this->aSekolah->validate($columns)) {
                    $failureMap = array_merge($failureMap, $this->aSekolah->getValidationFailures());
                }
            }


            if (($retval = InstalasiPeer::doValidate($this, $columns)) !== true) {
                $failureMap = array_merge($failureMap, $retval);
            }


                if ($this->collSyncLogs !== null) {
                    foreach ($this->collSyncLogs as $referrerFK) {
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
        $pos = InstalasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getKodeWilayah();
                break;
            case 2:
                return $this->getSekolahId();
                break;
            case 3:
                return $this->getJnsInstalasi();
                break;
            case 4:
                return $this->getALinkAktif();
                break;
            case 5:
                return $this->getKetLink();
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
        if (isset($alreadyDumpedObjects['Instalasi'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['Instalasi'][$this->getPrimaryKey()] = true;
        $keys = InstalasiPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getIdInstalasi(),
            $keys[1] => $this->getKodeWilayah(),
            $keys[2] => $this->getSekolahId(),
            $keys[3] => $this->getJnsInstalasi(),
            $keys[4] => $this->getALinkAktif(),
            $keys[5] => $this->getKetLink(),
        );
        if ($includeForeignObjects) {
            if (null !== $this->aMstWilayah) {
                $result['MstWilayah'] = $this->aMstWilayah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->aSekolah) {
                $result['Sekolah'] = $this->aSekolah->toArray($keyType, $includeLazyLoadColumns,  $alreadyDumpedObjects, true);
            }
            if (null !== $this->collSyncLogs) {
                $result['SyncLogs'] = $this->collSyncLogs->toArray(null, true, $keyType, $includeLazyLoadColumns, $alreadyDumpedObjects);
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
        $pos = InstalasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setKodeWilayah($value);
                break;
            case 2:
                $this->setSekolahId($value);
                break;
            case 3:
                $this->setJnsInstalasi($value);
                break;
            case 4:
                $this->setALinkAktif($value);
                break;
            case 5:
                $this->setKetLink($value);
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
        $keys = InstalasiPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setIdInstalasi($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setKodeWilayah($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setSekolahId($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setJnsInstalasi($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setALinkAktif($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setKetLink($arr[$keys[5]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(InstalasiPeer::DATABASE_NAME);

        if ($this->isColumnModified(InstalasiPeer::ID_INSTALASI)) $criteria->add(InstalasiPeer::ID_INSTALASI, $this->id_instalasi);
        if ($this->isColumnModified(InstalasiPeer::KODE_WILAYAH)) $criteria->add(InstalasiPeer::KODE_WILAYAH, $this->kode_wilayah);
        if ($this->isColumnModified(InstalasiPeer::SEKOLAH_ID)) $criteria->add(InstalasiPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(InstalasiPeer::JNS_INSTALASI)) $criteria->add(InstalasiPeer::JNS_INSTALASI, $this->jns_instalasi);
        if ($this->isColumnModified(InstalasiPeer::A_LINK_AKTIF)) $criteria->add(InstalasiPeer::A_LINK_AKTIF, $this->a_link_aktif);
        if ($this->isColumnModified(InstalasiPeer::KET_LINK)) $criteria->add(InstalasiPeer::KET_LINK, $this->ket_link);

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
        $criteria = new Criteria(InstalasiPeer::DATABASE_NAME);
        $criteria->add(InstalasiPeer::ID_INSTALASI, $this->id_instalasi);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getIdInstalasi();
    }

    /**
     * Generic method to set the primary key (id_instalasi column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setIdInstalasi($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getIdInstalasi();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of Instalasi (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setKodeWilayah($this->getKodeWilayah());
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setJnsInstalasi($this->getJnsInstalasi());
        $copyObj->setALinkAktif($this->getALinkAktif());
        $copyObj->setKetLink($this->getKetLink());

        if ($deepCopy && !$this->startCopy) {
            // important: temporarily setNew(false) because this affects the behavior of
            // the getter/setter methods for fkey referrer objects.
            $copyObj->setNew(false);
            // store object hash to prevent cycle
            $this->startCopy = true;

            foreach ($this->getSyncLogs() as $relObj) {
                if ($relObj !== $this) {  // ensure that we don't try to copy a reference to ourselves
                    $copyObj->addSyncLog($relObj->copy($deepCopy));
                }
            }

            //unflag object copy
            $this->startCopy = false;
        } // if ($deepCopy)

        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setIdInstalasi(NULL); // this is a auto-increment column, so set to default value
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
     * @return Instalasi Clone of current object.
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
     * @return InstalasiPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new InstalasiPeer();
        }

        return self::$peer;
    }

    /**
     * Declares an association between this object and a MstWilayah object.
     *
     * @param             MstWilayah $v
     * @return Instalasi The current object (for fluent API support)
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
            $v->addInstalasi($this);
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
                $this->aMstWilayah->addInstalasis($this);
             */
        }

        return $this->aMstWilayah;
    }

    /**
     * Declares an association between this object and a Sekolah object.
     *
     * @param             Sekolah $v
     * @return Instalasi The current object (for fluent API support)
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
            $v->addInstalasi($this);
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
                $this->aSekolah->addInstalasis($this);
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
        if ('SyncLog' == $relationName) {
            $this->initSyncLogs();
        }
    }

    /**
     * Clears out the collSyncLogs collection
     *
     * This does not modify the database; however, it will remove any associated objects, causing
     * them to be refetched by subsequent calls to accessor method.
     *
     * @return Instalasi The current object (for fluent API support)
     * @see        addSyncLogs()
     */
    public function clearSyncLogs()
    {
        $this->collSyncLogs = null; // important to set this to null since that means it is uninitialized
        $this->collSyncLogsPartial = null;

        return $this;
    }

    /**
     * reset is the collSyncLogs collection loaded partially
     *
     * @return void
     */
    public function resetPartialSyncLogs($v = true)
    {
        $this->collSyncLogsPartial = $v;
    }

    /**
     * Initializes the collSyncLogs collection.
     *
     * By default this just sets the collSyncLogs collection to an empty array (like clearcollSyncLogs());
     * however, you may wish to override this method in your stub class to provide setting appropriate
     * to your application -- for example, setting the initial array to the values stored in database.
     *
     * @param boolean $overrideExisting If set to true, the method call initializes
     *                                        the collection even if it is not empty
     *
     * @return void
     */
    public function initSyncLogs($overrideExisting = true)
    {
        if (null !== $this->collSyncLogs && !$overrideExisting) {
            return;
        }
        $this->collSyncLogs = new PropelObjectCollection();
        $this->collSyncLogs->setModel('SyncLog');
    }

    /**
     * Gets an array of SyncLog objects which contain a foreign key that references this object.
     *
     * If the $criteria is not null, it is used to always fetch the results from the database.
     * Otherwise the results are fetched from the database the first time, then cached.
     * Next time the same method is called without $criteria, the cached collection is returned.
     * If this Instalasi is new, it will return
     * an empty collection or the current collection; the criteria is ignored on a new object.
     *
     * @param Criteria $criteria optional Criteria object to narrow the query
     * @param PropelPDO $con optional connection object
     * @return PropelObjectCollection|SyncLog[] List of SyncLog objects
     * @throws PropelException
     */
    public function getSyncLogs($criteria = null, PropelPDO $con = null)
    {
        $partial = $this->collSyncLogsPartial && !$this->isNew();
        if (null === $this->collSyncLogs || null !== $criteria  || $partial) {
            if ($this->isNew() && null === $this->collSyncLogs) {
                // return empty collection
                $this->initSyncLogs();
            } else {
                $collSyncLogs = SyncLogQuery::create(null, $criteria)
                    ->filterByInstalasi($this)
                    ->find($con);
                if (null !== $criteria) {
                    if (false !== $this->collSyncLogsPartial && count($collSyncLogs)) {
                      $this->initSyncLogs(false);

                      foreach($collSyncLogs as $obj) {
                        if (false == $this->collSyncLogs->contains($obj)) {
                          $this->collSyncLogs->append($obj);
                        }
                      }

                      $this->collSyncLogsPartial = true;
                    }

                    $collSyncLogs->getInternalIterator()->rewind();
                    return $collSyncLogs;
                }

                if($partial && $this->collSyncLogs) {
                    foreach($this->collSyncLogs as $obj) {
                        if($obj->isNew()) {
                            $collSyncLogs[] = $obj;
                        }
                    }
                }

                $this->collSyncLogs = $collSyncLogs;
                $this->collSyncLogsPartial = false;
            }
        }

        return $this->collSyncLogs;
    }

    /**
     * Sets a collection of SyncLog objects related by a one-to-many relationship
     * to the current object.
     * It will also schedule objects for deletion based on a diff between old objects (aka persisted)
     * and new objects from the given Propel collection.
     *
     * @param PropelCollection $syncLogs A Propel collection.
     * @param PropelPDO $con Optional connection object
     * @return Instalasi The current object (for fluent API support)
     */
    public function setSyncLogs(PropelCollection $syncLogs, PropelPDO $con = null)
    {
        $syncLogsToDelete = $this->getSyncLogs(new Criteria(), $con)->diff($syncLogs);

        $this->syncLogsScheduledForDeletion = unserialize(serialize($syncLogsToDelete));

        foreach ($syncLogsToDelete as $syncLogRemoved) {
            $syncLogRemoved->setInstalasi(null);
        }

        $this->collSyncLogs = null;
        foreach ($syncLogs as $syncLog) {
            $this->addSyncLog($syncLog);
        }

        $this->collSyncLogs = $syncLogs;
        $this->collSyncLogsPartial = false;

        return $this;
    }

    /**
     * Returns the number of related SyncLog objects.
     *
     * @param Criteria $criteria
     * @param boolean $distinct
     * @param PropelPDO $con
     * @return int             Count of related SyncLog objects.
     * @throws PropelException
     */
    public function countSyncLogs(Criteria $criteria = null, $distinct = false, PropelPDO $con = null)
    {
        $partial = $this->collSyncLogsPartial && !$this->isNew();
        if (null === $this->collSyncLogs || null !== $criteria || $partial) {
            if ($this->isNew() && null === $this->collSyncLogs) {
                return 0;
            }

            if($partial && !$criteria) {
                return count($this->getSyncLogs());
            }
            $query = SyncLogQuery::create(null, $criteria);
            if ($distinct) {
                $query->distinct();
            }

            return $query
                ->filterByInstalasi($this)
                ->count($con);
        }

        return count($this->collSyncLogs);
    }

    /**
     * Method called to associate a SyncLog object to this object
     * through the SyncLog foreign key attribute.
     *
     * @param    SyncLog $l SyncLog
     * @return Instalasi The current object (for fluent API support)
     */
    public function addSyncLog(SyncLog $l)
    {
        if ($this->collSyncLogs === null) {
            $this->initSyncLogs();
            $this->collSyncLogsPartial = true;
        }
        if (!in_array($l, $this->collSyncLogs->getArrayCopy(), true)) { // only add it if the **same** object is not already associated
            $this->doAddSyncLog($l);
        }

        return $this;
    }

    /**
     * @param	SyncLog $syncLog The syncLog object to add.
     */
    protected function doAddSyncLog($syncLog)
    {
        $this->collSyncLogs[]= $syncLog;
        $syncLog->setInstalasi($this);
    }

    /**
     * @param	SyncLog $syncLog The syncLog object to remove.
     * @return Instalasi The current object (for fluent API support)
     */
    public function removeSyncLog($syncLog)
    {
        if ($this->getSyncLogs()->contains($syncLog)) {
            $this->collSyncLogs->remove($this->collSyncLogs->search($syncLog));
            if (null === $this->syncLogsScheduledForDeletion) {
                $this->syncLogsScheduledForDeletion = clone $this->collSyncLogs;
                $this->syncLogsScheduledForDeletion->clear();
            }
            $this->syncLogsScheduledForDeletion[]= clone $syncLog;
            $syncLog->setInstalasi(null);
        }

        return $this;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->id_instalasi = null;
        $this->kode_wilayah = null;
        $this->sekolah_id = null;
        $this->jns_instalasi = null;
        $this->a_link_aktif = null;
        $this->ket_link = null;
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
            if ($this->collSyncLogs) {
                foreach ($this->collSyncLogs as $o) {
                    $o->clearAllReferences($deep);
                }
            }
            if ($this->aMstWilayah instanceof Persistent) {
              $this->aMstWilayah->clearAllReferences($deep);
            }
            if ($this->aSekolah instanceof Persistent) {
              $this->aSekolah->clearAllReferences($deep);
            }

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

        if ($this->collSyncLogs instanceof PropelCollection) {
            $this->collSyncLogs->clearIterator();
        }
        $this->collSyncLogs = null;
        $this->aMstWilayah = null;
        $this->aSekolah = null;
    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(InstalasiPeer::DEFAULT_STRING_FORMAT);
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
