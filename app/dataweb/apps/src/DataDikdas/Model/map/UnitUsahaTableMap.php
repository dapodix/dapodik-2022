<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'unit_usaha' table.
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
class UnitUsahaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.UnitUsahaTableMap';

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
        $this->setName('unit_usaha');
        $this->setPhpName('UnitUsaha');
        $this->setClassname('DataDikdas\\Model\\UnitUsaha');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('unit_usaha_id', 'UnitUsahaId', 'VARCHAR', true, null, null);
        $this->addForeignKey('kelompok_usaha_id', 'KelompokUsahaId', 'CHAR', 'ref.kelompok_usaha', 'kelompok_usaha_id', true, 8, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addColumn('nama_unit_usaha', 'NamaUnitUsaha', 'VARCHAR', true, 100, null);
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
        $this->addRelation('KelompokUsaha', 'DataDikdas\\Model\\KelompokUsaha', RelationMap::MANY_TO_ONE, array('kelompok_usaha_id' => 'kelompok_usaha_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('UnitUsahaKerjasama', 'DataDikdas\\Model\\UnitUsahaKerjasama', RelationMap::ONE_TO_MANY, array('unit_usaha_id' => 'unit_usaha_id', ), 'RESTRICT', 'RESTRICT', 'UnitUsahaKerjasamas');
    } // buildRelations()

} // UnitUsahaTableMap
