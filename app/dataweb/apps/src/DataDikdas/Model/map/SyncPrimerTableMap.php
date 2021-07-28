<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sync_primer' table.
 *
 *
 *
 * This map class is used by Propel to do runtime db structure discovery.
 * For example, the createSelectSql() method checks the type of a given column used in an
 * ORDER BY clause to know whether it needs to apply SQL to make the ORDER BY case-insensitive
 * (i.e. if it's a text column type).
 *
 * @package    propel.generator.DataDikdas.Model.map
 */
class SyncPrimerTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SyncPrimerTableMap';

    /**
     * Initialize the table attributes, columns and validators
     * Relations are not initialized by this method since they are lazy loaded
     *
     * @return void
     * @throws PropelException
     */
    public function initialize()
    {
        // attributes
        $this->setName('sync_primer');
        $this->setPhpName('SyncPrimer');
        $this->setClassname('DataDikdas\\Model\\SyncPrimer');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('table_name', 'TableName', 'VARCHAR' , 'table_sync_log', 'table_name', true, 30, null);
        $this->addForeignPrimaryKey('id_instalasi', 'IdInstalasi', 'VARCHAR' , 'table_sync_log', 'id_instalasi', true, null, null);
        $this->addPrimaryKey('id_thread', 'IdThread', 'SMALLINT', true, null, null);
        $this->addColumn('sync_ket', 'SyncKet', 'VARCHAR', false, 100, null);
        $this->addColumn('sync_status', 'SyncStatus', 'SMALLINT', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TableSyncLog', 'DataDikdas\\Model\\TableSyncLog', RelationMap::MANY_TO_ONE, array('id_instalasi' => 'id_instalasi', 'table_name' => 'table_name', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // SyncPrimerTableMap
