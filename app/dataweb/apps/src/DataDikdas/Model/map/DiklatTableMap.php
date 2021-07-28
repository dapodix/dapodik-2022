<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'diklat' table.
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
class DiklatTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.DiklatTableMap';

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
        $this->setName('diklat');
        $this->setPhpName('Diklat');
        $this->setClassname('DataDikdas\\Model\\Diklat');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('diklat_id', 'DiklatId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_diklat_id', 'JenisDiklatId', 'INTEGER', 'ref.jenis_diklat', 'jenis_diklat_id', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('penyelenggara', 'Penyelenggara', 'VARCHAR', false, 100, null);
        $this->addColumn('tahun', 'Tahun', 'DECIMAL', true, 262144, null);
        $this->addColumn('peran', 'Peran', 'VARCHAR', false, 30, null);
        $this->addColumn('tingkat', 'Tingkat', 'DECIMAL', false, 131072, null);
        $this->addColumn('berapa_jam', 'BerapaJam', 'DECIMAL', true, 262144, null);
        $this->addColumn('sertifikat_diklat', 'SertifikatDiklat', 'VARCHAR', false, 80, null);
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
        $this->addRelation('JenisDiklat', 'DataDikdas\\Model\\JenisDiklat', RelationMap::MANY_TO_ONE, array('jenis_diklat_id' => 'jenis_diklat_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // DiklatTableMap
