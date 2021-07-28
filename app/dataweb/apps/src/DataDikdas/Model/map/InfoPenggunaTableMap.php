<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'info_pengguna' table.
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
class InfoPenggunaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.InfoPenggunaTableMap';

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
        $this->setName('info_pengguna');
        $this->setPhpName('InfoPengguna');
        $this->setClassname('DataDikdas\\Model\\InfoPengguna');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('info_pengguna_id', 'InfoPenggunaId', 'VARCHAR', true, null, null);
        $this->addColumn('pengguna_id', 'PenggunaId', 'VARCHAR', false, null, null);
        $this->addColumn('gambar', 'Gambar', 'VARCHAR', false, 500, null);
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

} // InfoPenggunaTableMap
