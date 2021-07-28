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
use DataDikdas\Model\WsToken;
use DataDikdas\Model\WsTokenPeer;
use DataDikdas\Model\WsTokenQuery;

/**
 * Base class that represents a row from the 'ws_token' table.
 *
 * 
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BaseWsToken extends BaseObject implements Persistent
{
    /**
     * Peer class name
     */
    const PEER = 'DataDikdas\\Model\\WsTokenPeer';

    /**
     * The Peer class.
     * Instance provides a convenient way of calling static methods on a class
     * that calling code may not be able to identify.
     * @var        WsTokenPeer
     */
    protected static $peer;

    /**
     * The flag var to prevent infinit loop in deep copy
     * @var       boolean
     */
    protected $startCopy = false;

    /**
     * The value for the ws_token_id field.
     * @var        string
     */
    protected $ws_token_id;

    /**
     * The value for the sekolah_id field.
     * @var        string
     */
    protected $sekolah_id;

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
     * The value for the token field.
     * @var        string
     */
    protected $token;

    /**
     * The value for the request_date field.
     * @var        string
     */
    protected $request_date;

    /**
     * The value for the expired_date field.
     * @var        string
     */
    protected $expired_date;

    /**
     * The value for the ws_aplikasi_id field.
     * @var        string
     */
    protected $ws_aplikasi_id;

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
     * Get the [ws_token_id] column value.
     * 
     * @return string
     */
    public function getWsTokenId()
    {
        return $this->ws_token_id;
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
     * Get the [token] column value.
     * 
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * Get the [optionally formatted] temporal [request_date] column value.
     * 
     *
     * @param string $format The date/time format string (either date()-style or strftime()-style).
     *				 If format is null, then the raw DateTime object will be returned.
     * @return mixed Formatted date/time value as string or DateTime object (if format is null), null if column is null
     * @throws PropelException - if unable to parse/validate the date/time value.
     */
    public function getRequestDate($format = 'Y-m-d H:i:s')
    {
        if ($this->request_date === null) {
            return null;
        }


        try {
            $dt = new DateTime($this->request_date);
        } catch (Exception $x) {
            throw new PropelException("Internally stored date/time/timestamp value could not be converted to DateTime: " . var_export($this->request_date, true), $x);
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
     * Get the [ws_aplikasi_id] column value.
     * 
     * @return string
     */
    public function getWsAplikasiId()
    {
        return $this->ws_aplikasi_id;
    }

    /**
     * Set the value of [ws_token_id] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setWsTokenId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ws_token_id !== $v) {
            $this->ws_token_id = $v;
            $this->modifiedColumns[] = WsTokenPeer::WS_TOKEN_ID;
        }


        return $this;
    } // setWsTokenId()

    /**
     * Set the value of [sekolah_id] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setSekolahId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->sekolah_id !== $v) {
            $this->sekolah_id = $v;
            $this->modifiedColumns[] = WsTokenPeer::SEKOLAH_ID;
        }


        return $this;
    } // setSekolahId()

    /**
     * Set the value of [ip_address] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setIpAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ip_address !== $v) {
            $this->ip_address = $v;
            $this->modifiedColumns[] = WsTokenPeer::IP_ADDRESS;
        }


        return $this;
    } // setIpAddress()

    /**
     * Set the value of [port] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setPort($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->port !== $v) {
            $this->port = $v;
            $this->modifiedColumns[] = WsTokenPeer::PORT;
        }


        return $this;
    } // setPort()

    /**
     * Set the value of [mac_address] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setMacAddress($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->mac_address !== $v) {
            $this->mac_address = $v;
            $this->modifiedColumns[] = WsTokenPeer::MAC_ADDRESS;
        }


        return $this;
    } // setMacAddress()

    /**
     * Set the value of [token] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setToken($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->token !== $v) {
            $this->token = $v;
            $this->modifiedColumns[] = WsTokenPeer::TOKEN;
        }


        return $this;
    } // setToken()

    /**
     * Sets the value of [request_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsToken The current object (for fluent API support)
     */
    public function setRequestDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->request_date !== null || $dt !== null) {
            $currentDateAsString = ($this->request_date !== null && $tmpDt = new DateTime($this->request_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->request_date = $newDateAsString;
                $this->modifiedColumns[] = WsTokenPeer::REQUEST_DATE;
            }
        } // if either are not null


        return $this;
    } // setRequestDate()

    /**
     * Sets the value of [expired_date] column to a normalized version of the date/time value specified.
     * 
     * @param mixed $v string, integer (timestamp), or DateTime value.
     *               Empty strings are treated as null.
     * @return WsToken The current object (for fluent API support)
     */
    public function setExpiredDate($v)
    {
        $dt = PropelDateTime::newInstance($v, null, 'DateTime');
        if ($this->expired_date !== null || $dt !== null) {
            $currentDateAsString = ($this->expired_date !== null && $tmpDt = new DateTime($this->expired_date)) ? $tmpDt->format('Y-m-d H:i:s') : null;
            $newDateAsString = $dt ? $dt->format('Y-m-d H:i:s') : null;
            if ($currentDateAsString !== $newDateAsString) {
                $this->expired_date = $newDateAsString;
                $this->modifiedColumns[] = WsTokenPeer::EXPIRED_DATE;
            }
        } // if either are not null


        return $this;
    } // setExpiredDate()

    /**
     * Set the value of [ws_aplikasi_id] column.
     * 
     * @param string $v new value
     * @return WsToken The current object (for fluent API support)
     */
    public function setWsAplikasiId($v)
    {
        if ($v !== null && is_numeric($v)) {
            $v = (string) $v;
        }

        if ($this->ws_aplikasi_id !== $v) {
            $this->ws_aplikasi_id = $v;
            $this->modifiedColumns[] = WsTokenPeer::WS_APLIKASI_ID;
        }


        return $this;
    } // setWsAplikasiId()

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

            $this->ws_token_id = ($row[$startcol + 0] !== null) ? (string) $row[$startcol + 0] : null;
            $this->sekolah_id = ($row[$startcol + 1] !== null) ? (string) $row[$startcol + 1] : null;
            $this->ip_address = ($row[$startcol + 2] !== null) ? (string) $row[$startcol + 2] : null;
            $this->port = ($row[$startcol + 3] !== null) ? (string) $row[$startcol + 3] : null;
            $this->mac_address = ($row[$startcol + 4] !== null) ? (string) $row[$startcol + 4] : null;
            $this->token = ($row[$startcol + 5] !== null) ? (string) $row[$startcol + 5] : null;
            $this->request_date = ($row[$startcol + 6] !== null) ? (string) $row[$startcol + 6] : null;
            $this->expired_date = ($row[$startcol + 7] !== null) ? (string) $row[$startcol + 7] : null;
            $this->ws_aplikasi_id = ($row[$startcol + 8] !== null) ? (string) $row[$startcol + 8] : null;
            $this->resetModified();

            $this->setNew(false);

            if ($rehydrate) {
                $this->ensureConsistency();
            }
            $this->postHydrate($row, $startcol, $rehydrate);
            return $startcol + 9; // 9 = WsTokenPeer::NUM_HYDRATE_COLUMNS.

        } catch (Exception $e) {
            throw new PropelException("Error populating WsToken object", $e);
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
            $con = Propel::getConnection(WsTokenPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }

        // We don't need to alter the object instance pool; we're just modifying this instance
        // already in the pool.

        $stmt = WsTokenPeer::doSelectStmt($this->buildPkeyCriteria(), $con);
        $row = $stmt->fetch(PDO::FETCH_NUM);
        $stmt->closeCursor();
        if (!$row) {
            throw new PropelException('Cannot find matching row in the database to reload object values.');
        }
        $this->hydrate($row, 0, true); // rehydrate

        if ($deep) {  // also de-associate any related objects?

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
            $con = Propel::getConnection(WsTokenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
        }

        $con->beginTransaction();
        try {
            $deleteQuery = WsTokenQuery::create()
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
            $con = Propel::getConnection(WsTokenPeer::DATABASE_NAME, Propel::CONNECTION_WRITE);
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
                WsTokenPeer::addInstanceToPool($this);
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
        if ($this->isColumnModified(WsTokenPeer::WS_TOKEN_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ws_token_id"';
        }
        if ($this->isColumnModified(WsTokenPeer::SEKOLAH_ID)) {
            $modifiedColumns[':p' . $index++]  = '"sekolah_id"';
        }
        if ($this->isColumnModified(WsTokenPeer::IP_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '"ip_address"';
        }
        if ($this->isColumnModified(WsTokenPeer::PORT)) {
            $modifiedColumns[':p' . $index++]  = '"port"';
        }
        if ($this->isColumnModified(WsTokenPeer::MAC_ADDRESS)) {
            $modifiedColumns[':p' . $index++]  = '"mac_address"';
        }
        if ($this->isColumnModified(WsTokenPeer::TOKEN)) {
            $modifiedColumns[':p' . $index++]  = '"token"';
        }
        if ($this->isColumnModified(WsTokenPeer::REQUEST_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"request_date"';
        }
        if ($this->isColumnModified(WsTokenPeer::EXPIRED_DATE)) {
            $modifiedColumns[':p' . $index++]  = '"expired_date"';
        }
        if ($this->isColumnModified(WsTokenPeer::WS_APLIKASI_ID)) {
            $modifiedColumns[':p' . $index++]  = '"ws_aplikasi_id"';
        }

        $sql = sprintf(
            'INSERT INTO "ws_token" (%s) VALUES (%s)',
            implode(', ', $modifiedColumns),
            implode(', ', array_keys($modifiedColumns))
        );

        try {
            $stmt = $con->prepare($sql);
            foreach ($modifiedColumns as $identifier => $columnName) {
                switch ($columnName) {
                    case '"ws_token_id"':						
                        $stmt->bindValue($identifier, $this->ws_token_id, PDO::PARAM_STR);
                        break;
                    case '"sekolah_id"':						
                        $stmt->bindValue($identifier, $this->sekolah_id, PDO::PARAM_STR);
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
                    case '"token"':						
                        $stmt->bindValue($identifier, $this->token, PDO::PARAM_STR);
                        break;
                    case '"request_date"':						
                        $stmt->bindValue($identifier, $this->request_date, PDO::PARAM_STR);
                        break;
                    case '"expired_date"':						
                        $stmt->bindValue($identifier, $this->expired_date, PDO::PARAM_STR);
                        break;
                    case '"ws_aplikasi_id"':						
                        $stmt->bindValue($identifier, $this->ws_aplikasi_id, PDO::PARAM_STR);
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


            if (($retval = WsTokenPeer::doValidate($this, $columns)) !== true) {
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
        $pos = WsTokenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
                return $this->getWsTokenId();
                break;
            case 1:
                return $this->getSekolahId();
                break;
            case 2:
                return $this->getIpAddress();
                break;
            case 3:
                return $this->getPort();
                break;
            case 4:
                return $this->getMacAddress();
                break;
            case 5:
                return $this->getToken();
                break;
            case 6:
                return $this->getRequestDate();
                break;
            case 7:
                return $this->getExpiredDate();
                break;
            case 8:
                return $this->getWsAplikasiId();
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
     *
     * @return array an associative array containing the field names (as keys) and field values
     */
    public function toArray($keyType = BasePeer::TYPE_FIELDNAME, $includeLazyLoadColumns = true, $alreadyDumpedObjects = array())
    {
        if (isset($alreadyDumpedObjects['WsToken'][$this->getPrimaryKey()])) {
            return '*RECURSION*';
        }
        $alreadyDumpedObjects['WsToken'][$this->getPrimaryKey()] = true;
        $keys = WsTokenPeer::getFieldNames($keyType);
        $result = array(
            $keys[0] => $this->getWsTokenId(),
            $keys[1] => $this->getSekolahId(),
            $keys[2] => $this->getIpAddress(),
            $keys[3] => $this->getPort(),
            $keys[4] => $this->getMacAddress(),
            $keys[5] => $this->getToken(),
            $keys[6] => $this->getRequestDate(),
            $keys[7] => $this->getExpiredDate(),
            $keys[8] => $this->getWsAplikasiId(),
        );

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
        $pos = WsTokenPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);

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
                $this->setWsTokenId($value);
                break;
            case 1:
                $this->setSekolahId($value);
                break;
            case 2:
                $this->setIpAddress($value);
                break;
            case 3:
                $this->setPort($value);
                break;
            case 4:
                $this->setMacAddress($value);
                break;
            case 5:
                $this->setToken($value);
                break;
            case 6:
                $this->setRequestDate($value);
                break;
            case 7:
                $this->setExpiredDate($value);
                break;
            case 8:
                $this->setWsAplikasiId($value);
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
        $keys = WsTokenPeer::getFieldNames($keyType);

        if (array_key_exists($keys[0], $arr)) $this->setWsTokenId($arr[$keys[0]]);
        if (array_key_exists($keys[1], $arr)) $this->setSekolahId($arr[$keys[1]]);
        if (array_key_exists($keys[2], $arr)) $this->setIpAddress($arr[$keys[2]]);
        if (array_key_exists($keys[3], $arr)) $this->setPort($arr[$keys[3]]);
        if (array_key_exists($keys[4], $arr)) $this->setMacAddress($arr[$keys[4]]);
        if (array_key_exists($keys[5], $arr)) $this->setToken($arr[$keys[5]]);
        if (array_key_exists($keys[6], $arr)) $this->setRequestDate($arr[$keys[6]]);
        if (array_key_exists($keys[7], $arr)) $this->setExpiredDate($arr[$keys[7]]);
        if (array_key_exists($keys[8], $arr)) $this->setWsAplikasiId($arr[$keys[8]]);
    }

    /**
     * Build a Criteria object containing the values of all modified columns in this object.
     *
     * @return Criteria The Criteria object containing all modified values.
     */
    public function buildCriteria()
    {
        $criteria = new Criteria(WsTokenPeer::DATABASE_NAME);

        if ($this->isColumnModified(WsTokenPeer::WS_TOKEN_ID)) $criteria->add(WsTokenPeer::WS_TOKEN_ID, $this->ws_token_id);
        if ($this->isColumnModified(WsTokenPeer::SEKOLAH_ID)) $criteria->add(WsTokenPeer::SEKOLAH_ID, $this->sekolah_id);
        if ($this->isColumnModified(WsTokenPeer::IP_ADDRESS)) $criteria->add(WsTokenPeer::IP_ADDRESS, $this->ip_address);
        if ($this->isColumnModified(WsTokenPeer::PORT)) $criteria->add(WsTokenPeer::PORT, $this->port);
        if ($this->isColumnModified(WsTokenPeer::MAC_ADDRESS)) $criteria->add(WsTokenPeer::MAC_ADDRESS, $this->mac_address);
        if ($this->isColumnModified(WsTokenPeer::TOKEN)) $criteria->add(WsTokenPeer::TOKEN, $this->token);
        if ($this->isColumnModified(WsTokenPeer::REQUEST_DATE)) $criteria->add(WsTokenPeer::REQUEST_DATE, $this->request_date);
        if ($this->isColumnModified(WsTokenPeer::EXPIRED_DATE)) $criteria->add(WsTokenPeer::EXPIRED_DATE, $this->expired_date);
        if ($this->isColumnModified(WsTokenPeer::WS_APLIKASI_ID)) $criteria->add(WsTokenPeer::WS_APLIKASI_ID, $this->ws_aplikasi_id);

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
        $criteria = new Criteria(WsTokenPeer::DATABASE_NAME);
        $criteria->add(WsTokenPeer::WS_TOKEN_ID, $this->ws_token_id);

        return $criteria;
    }

    /**
     * Returns the primary key for this object (row).
     * @return string
     */
    public function getPrimaryKey()
    {
        return $this->getWsTokenId();
    }

    /**
     * Generic method to set the primary key (ws_token_id column).
     *
     * @param  string $key Primary key.
     * @return void
     */
    public function setPrimaryKey($key)
    {
        $this->setWsTokenId($key);
    }

    /**
     * Returns true if the primary key for this object is null.
     * @return boolean
     */
    public function isPrimaryKeyNull()
    {

        return null === $this->getWsTokenId();
    }

    /**
     * Sets contents of passed object to values from current object.
     *
     * If desired, this method can also make copies of all associated (fkey referrers)
     * objects.
     *
     * @param object $copyObj An object of WsToken (or compatible) type.
     * @param boolean $deepCopy Whether to also copy all rows that refer (by fkey) to the current row.
     * @param boolean $makeNew Whether to reset autoincrement PKs and make the object new.
     * @throws PropelException
     */
    public function copyInto($copyObj, $deepCopy = false, $makeNew = true)
    {
        $copyObj->setSekolahId($this->getSekolahId());
        $copyObj->setIpAddress($this->getIpAddress());
        $copyObj->setPort($this->getPort());
        $copyObj->setMacAddress($this->getMacAddress());
        $copyObj->setToken($this->getToken());
        $copyObj->setRequestDate($this->getRequestDate());
        $copyObj->setExpiredDate($this->getExpiredDate());
        $copyObj->setWsAplikasiId($this->getWsAplikasiId());
        if ($makeNew) {
            $copyObj->setNew(true);
            $copyObj->setWsTokenId(NULL); // this is a auto-increment column, so set to default value
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
     * @return WsToken Clone of current object.
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
     * @return WsTokenPeer
     */
    public function getPeer()
    {
        if (self::$peer === null) {
            self::$peer = new WsTokenPeer();
        }

        return self::$peer;
    }

    /**
     * Clears the current object and sets all attributes to their default values
     */
    public function clear()
    {
        $this->ws_token_id = null;
        $this->sekolah_id = null;
        $this->ip_address = null;
        $this->port = null;
        $this->mac_address = null;
        $this->token = null;
        $this->request_date = null;
        $this->expired_date = null;
        $this->ws_aplikasi_id = null;
        $this->alreadyInSave = false;
        $this->alreadyInValidation = false;
        $this->alreadyInClearAllReferencesDeep = false;
        $this->clearAllReferences();
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

            $this->alreadyInClearAllReferencesDeep = false;
        } // if ($deep)

    }

    /**
     * return the string representation of this object
     *
     * @return string
     */
    public function __toString()
    {
        return (string) $this->exportTo(WsTokenPeer::DEFAULT_STRING_FORMAT);
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
