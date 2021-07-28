<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ws_aplikasi' table.
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
class WsAplikasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.WsAplikasiTableMap';

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
        $this->setName('ws_aplikasi');
        $this->setPhpName('WsAplikasi');
        $this->setClassname('DataDikdas\\Model\\WsAplikasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', true, null, null);
        $this->addPrimaryKey('aplikasi_id', 'AplikasiId', 'VARCHAR', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('token', 'Token', 'LONGVARCHAR', false, null, null);
        $this->addColumn('password', 'Password', 'VARCHAR', true, 15, null);
        $this->addColumn('ip_address', 'IpAddress', 'VARCHAR', false, 20, null);
        $this->addColumn('port', 'Port', 'VARCHAR', false, 5, null);
        $this->addColumn('mac_address', 'MacAddress', 'VARCHAR', false, 20, null);
        $this->addColumn('asal_data', 'AsalData', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('WsRoleTable', 'DataDikdas\\Model\\WsRoleTable', RelationMap::ONE_TO_MANY, array('aplikasi_id' => 'aplikasi_id', ), 'CASCADE', null, 'WsRoleTables');
    } // buildRelations()

} // WsAplikasiTableMap
