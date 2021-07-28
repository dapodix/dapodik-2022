<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'pengaturan' table.
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
class PengaturanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PengaturanTableMap';

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
        $this->setName('pengaturan');
        $this->setPhpName('Pengaturan');
        $this->setClassname('DataDikdas\\Model\\Pengaturan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('pengaturan_id', 'PengaturanId', 'VARCHAR', true, null, null);
        $this->addColumn('sekolah_id', 'SekolahId', 'VARCHAR', true, null, null);
        $this->addColumn('param_key', 'ParamKey', 'VARCHAR', true, 50, null);
        $this->addColumn('param_value', 'ParamValue', 'VARCHAR', true, 50, null);
        $this->addColumn('soft_delete', 'SoftDelete', 'SMALLINT', false, null, null);
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', false, null, null);
        $this->addColumn('updater_id', 'UpdaterId', 'VARCHAR', false, null, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
    } // buildRelations()

} // PengaturanTableMap
