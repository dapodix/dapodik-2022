<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'vld_rwy_kepangkatan' table.
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
class VldRwyKepangkatanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.VldRwyKepangkatanTableMap';

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
        $this->setName('vld_rwy_kepangkatan');
        $this->setPhpName('VldRwyKepangkatan');
        $this->setClassname('DataDikdas\\Model\\VldRwyKepangkatan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('logid', 'Logid', 'VARCHAR', true, null, null);
        $this->addForeignKey('riwayat_kepangkatan_id', 'RiwayatKepangkatanId', 'VARCHAR', 'rwy_kepangkatan', 'riwayat_kepangkatan_id', true, null, null);
        $this->addForeignKey('idtype', 'Idtype', 'INTEGER', 'ref.errortype', 'idtype', true, null, null);
        $this->addColumn('status_validasi', 'StatusValidasi', 'DECIMAL', false, 131072, null);
        $this->addColumn('field_error', 'FieldError', 'VARCHAR', false, 30, null);
        $this->addColumn('error_message', 'ErrorMessage', 'VARCHAR', false, 150, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 255, null);
        $this->addColumn('app_username', 'AppUsername', 'VARCHAR', false, 50, null);
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
        $this->addRelation('RwyKepangkatan', 'DataDikdas\\Model\\RwyKepangkatan', RelationMap::MANY_TO_ONE, array('riwayat_kepangkatan_id' => 'riwayat_kepangkatan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Errortype', 'DataDikdas\\Model\\Errortype', RelationMap::MANY_TO_ONE, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // VldRwyKepangkatanTableMap
