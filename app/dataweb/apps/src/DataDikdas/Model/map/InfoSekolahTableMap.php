<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'info_sekolah' table.
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
class InfoSekolahTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.InfoSekolahTableMap';

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
        $this->setName('info_sekolah');
        $this->setPhpName('InfoSekolah');
        $this->setClassname('DataDikdas\\Model\\InfoSekolah');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('info_sekolah_id', 'InfoSekolahId', 'VARCHAR', true, null, null);
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', false, null, null);
        $this->addColumn('gambar', 'Gambar', 'VARCHAR', false, 200, null);
        $this->addColumn('soft_delete', 'SoftDelete', 'SMALLINT', false, null, null);
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', false, 2, null);
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // InfoSekolahTableMap
