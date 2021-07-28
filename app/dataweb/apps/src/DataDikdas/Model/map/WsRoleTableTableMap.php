<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ws_role_table' table.
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
class WsRoleTableTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.WsRoleTableTableMap';

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
        $this->setName('ws_role_table');
        $this->setPhpName('WsRoleTable');
        $this->setClassname('DataDikdas\\Model\\WsRoleTable');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('role_table_id', 'RoleTableId', 'VARCHAR', true, null, null);
        $this->addForeignKey('aplikasi_id', 'AplikasiId', 'VARCHAR', 'ws_aplikasi', 'aplikasi_id', true, null, null);
        $this->addColumn('role_read', 'RoleRead', 'DECIMAL', true, 65536, 0);
        $this->addColumn('role_create', 'RoleCreate', 'DECIMAL', true, 65536, 0);
        $this->addColumn('role_update', 'RoleUpdate', 'DECIMAL', true, 65536, 0);
        $this->addColumn('role_delete', 'RoleDelete', 'DECIMAL', true, 65536, 0);
        $this->addColumn('asal_data', 'AsalData', 'DECIMAL', true, 65536, 1);
        $this->addColumn('aktif', 'Aktif', 'DECIMAL', true, 65536, 1);
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, 2, 'now()');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, null);
        $this->addColumn('soft_delete', 'SoftDelete', 'SMALLINT', true, null, 0);
        $this->addColumn('nama_table', 'NamaTable', 'VARCHAR', true, 20, null);
        $this->addColumn('nama_alias', 'NamaAlias', 'VARCHAR', false, 30, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('WsAplikasi', 'DataDikdas\\Model\\WsAplikasi', RelationMap::MANY_TO_ONE, array('aplikasi_id' => 'aplikasi_id', ), 'CASCADE', null);
        $this->addRelation('WsRoleColumn', 'DataDikdas\\Model\\WsRoleColumn', RelationMap::ONE_TO_MANY, array('role_table_id' => 'role_table_id', ), 'CASCADE', null, 'WsRoleColumns');
    } // buildRelations()

} // WsRoleTableTableMap
