<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.table_sync' table.
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
class TableSyncTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TableSyncTableMap';

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
        $this->setName('ref.table_sync');
        $this->setPhpName('TableSync');
        $this->setClassname('DataDikdas\\Model\\TableSync');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('table_name', 'TableName', 'VARCHAR', true, 30, null);
        $this->addColumn('table_alias', 'TableAlias', 'VARCHAR', false, 50, null);
        $this->addColumn('sync_type', 'SyncType', 'CHAR', true, 1, null);
        $this->addColumn('sync_seq', 'SyncSeq', 'DECIMAL', true, 262144, null);
        $this->addColumn('kolom_kecuali', 'KolomKecuali', 'VARCHAR', false, 200, null);
        $this->addColumn('table_status', 'TableStatus', 'SMALLINT', false, null, null);
        $this->addColumn('table_ket', 'TableKet', 'VARCHAR', false, 100, null);
        $this->addColumn('jml_thread', 'JmlThread', 'SMALLINT', false, null, 5);
        $this->addColumn('baris_per_thread', 'BarisPerThread', 'INTEGER', false, null, 500);
        $this->addColumn('order_ekstra', 'OrderEkstra', 'VARCHAR', false, 100, null);
        $this->addColumn('a_table_aktif', 'ATableAktif', 'DECIMAL', true, 65536, 1);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('TableSyncLog', 'DataDikdas\\Model\\TableSyncLog', RelationMap::ONE_TO_MANY, array('table_name' => 'table_name', ), 'RESTRICT', 'RESTRICT', 'TableSyncLogs');
    } // buildRelations()

} // TableSyncTableMap
