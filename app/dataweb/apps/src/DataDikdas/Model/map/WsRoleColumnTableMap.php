<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ws_role_column' table.
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
class WsRoleColumnTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.WsRoleColumnTableMap';

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
        $this->setName('ws_role_column');
        $this->setPhpName('WsRoleColumn');
        $this->setClassname('DataDikdas\\Model\\WsRoleColumn');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('role_column_id', 'RoleColumnId', 'VARCHAR', true, null, null);
        $this->addForeignKey('role_table_id', 'RoleTableId', 'VARCHAR', 'ws_role_table', 'role_table_id', true, null, null);
        $this->addColumn('aktif', 'Aktif', 'DECIMAL', true, 65536, 1);
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, null);
        $this->addColumn('soft_delete', 'SoftDelete', 'SMALLINT', true, null, 0);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('WsRoleTable', 'DataDikdas\\Model\\WsRoleTable', RelationMap::MANY_TO_ONE, array('role_table_id' => 'role_table_id', ), 'CASCADE', null);
    } // buildRelations()

} // WsRoleColumnTableMap
