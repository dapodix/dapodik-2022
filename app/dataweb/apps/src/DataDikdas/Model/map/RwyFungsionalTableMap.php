<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rwy_fungsional' table.
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
class RwyFungsionalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RwyFungsionalTableMap';

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
        $this->setName('rwy_fungsional');
        $this->setPhpName('RwyFungsional');
        $this->setClassname('DataDikdas\\Model\\RwyFungsional');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('riwayat_fungsional_id', 'RiwayatFungsionalId', 'VARCHAR', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('jabatan_fungsional_id', 'JabatanFungsionalId', 'DECIMAL', 'ref.jabatan_fungsional', 'jabatan_fungsional_id', true, 327680, null);
        $this->addColumn('sk_jabfung', 'SkJabfung', 'VARCHAR', true, 80, null);
        $this->addColumn('tmt_jabatan', 'TmtJabatan', 'DATE', true, null, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JabatanFungsional', 'DataDikdas\\Model\\JabatanFungsional', RelationMap::MANY_TO_ONE, array('jabatan_fungsional_id' => 'jabatan_fungsional_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldRwyFungsional', 'DataDikdas\\Model\\VldRwyFungsional', RelationMap::ONE_TO_MANY, array('riwayat_fungsional_id' => 'riwayat_fungsional_id', ), 'RESTRICT', 'RESTRICT', 'VldRwyFungsionals');
    } // buildRelations()

} // RwyFungsionalTableMap
