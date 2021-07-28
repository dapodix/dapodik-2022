<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.log_otorisasi' table.
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
class LogOtorisasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.LogOtorisasiTableMap';

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
        $this->setName('man_akses.log_otorisasi');
        $this->setPhpName('LogOtorisasi');
        $this->setClassname('DataDikdas\\Model\\LogOtorisasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('token_sesi', 'TokenSesi', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_role_pengguna', 'IdRolePengguna', 'VARCHAR', 'man_akses.role_pengguna', 'id_role_pengguna', true, null, null);
        $this->addColumn('last_activity', 'LastActivity', 'TIMESTAMP', false, null, 'now()');
        $this->addColumn('log_off', 'LogOff', 'TIMESTAMP', false, null, null);
        $this->addColumn('a_time_out', 'ATimeOut', 'DECIMAL', true, 65536, 0);
        $this->addColumn('alamat_ip', 'AlamatIp', 'VARCHAR', false, 50, null);
        $this->addColumn('a_sesi_aktif', 'ASesiAktif', 'DECIMAL', true, 65536, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('soft_delete', 'SoftDelete', 'DECIMAL', true, 65536, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('RolePengguna', 'DataDikdas\\Model\\RolePengguna', RelationMap::MANY_TO_ONE, array('id_role_pengguna' => 'id_role_pengguna', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // LogOtorisasiTableMap
