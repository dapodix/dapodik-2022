<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sync_session' table.
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
class SyncSessionTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SyncSessionTableMap';

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
        $this->setName('sync_session');
        $this->setPhpName('SyncSession');
        $this->setClassname('DataDikdas\\Model\\SyncSession');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('token', 'Token', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_instalasi', 'IdInstalasi', 'VARCHAR', 'instalasi', 'id_instalasi', true, null, null);
        $this->addColumn('pengguna_id', 'PenggunaId', 'VARCHAR', true, null, null);
        $this->addColumn('create_time', 'CreateTime', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_activity', 'LastActivity', 'TIMESTAMP', false, null, 'now()');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Instalasi', 'DataDikdas\\Model\\Instalasi', RelationMap::MANY_TO_ONE, array('id_instalasi' => 'id_instalasi', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // SyncSessionTableMap
