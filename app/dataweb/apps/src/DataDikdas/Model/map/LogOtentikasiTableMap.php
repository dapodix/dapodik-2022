<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.log_otentikasi' table.
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
class LogOtentikasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.LogOtentikasiTableMap';

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
        $this->setName('man_akses.log_otentikasi');
        $this->setPhpName('LogOtentikasi');
        $this->setClassname('DataDikdas\\Model\\LogOtentikasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('token_sesi', 'TokenSesi', 'VARCHAR', true, null, null);
        $this->addForeignKey('pengguna_id', 'PenggunaId', 'VARCHAR', 'man_akses.pengguna', 'pengguna_id', true, null, null);
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
        $this->addRelation('Pengguna', 'DataDikdas\\Model\\Pengguna', RelationMap::MANY_TO_ONE, array('pengguna_id' => 'pengguna_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // LogOtentikasiTableMap
