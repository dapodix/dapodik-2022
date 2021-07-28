<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'table_sync_log' table.
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
class TableSyncLogTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TableSyncLogTableMap';

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
        $this->setName('table_sync_log');
        $this->setPhpName('TableSyncLog');
        $this->setClassname('DataDikdas\\Model\\TableSyncLog');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('table_name', 'TableName', 'VARCHAR' , 'ref.table_sync', 'table_name', true, 30, null);
        $this->addForeignPrimaryKey('id_instalasi', 'IdInstalasi', 'VARCHAR' , 'instalasi', 'id_instalasi', true, null, null);
        $this->addColumn('begin_sync', 'BeginSync', 'TIMESTAMP', true, null, null);
        $this->addColumn('end_sync', 'EndSync', 'TIMESTAMP', false, null, null);
        $this->addColumn('sync_media', 'SyncMedia', 'CHAR', true, 1, '1');
        $this->addColumn('is_success', 'IsSuccess', 'DECIMAL', true, 65536, null);
        $this->addColumn('selisih_waktu_server', 'SelisihWaktuServer', 'BIGINT', true, null, null);
        $this->addColumn('n_create', 'NCreate', 'INTEGER', true, null, null);
        $this->addColumn('n_update', 'NUpdate', 'INTEGER', true, null, null);
        $this->addColumn('n_hapus', 'NHapus', 'INTEGER', true, null, null);
        $this->addColumn('n_konflik', 'NKonflik', 'INTEGER', true, null, null);
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('sync_page', 'SyncPage', 'INTEGER', false, null, 0);
        $this->addColumn('alamat_ip', 'AlamatIp', 'VARCHAR', true, 50, null);
        $this->addColumn('pengguna_id', 'PenggunaId', 'VARCHAR', true, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Instalasi', 'DataDikdas\\Model\\Instalasi', RelationMap::MANY_TO_ONE, array('id_instalasi' => 'id_instalasi', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TableSync', 'DataDikdas\\Model\\TableSync', RelationMap::MANY_TO_ONE, array('table_name' => 'table_name', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SyncPrimer', 'DataDikdas\\Model\\SyncPrimer', RelationMap::ONE_TO_MANY, array('id_instalasi' => 'id_instalasi', 'table_name' => 'table_name', ), 'RESTRICT', 'RESTRICT', 'SyncPrimers');
    } // buildRelations()

} // TableSyncLogTableMap
