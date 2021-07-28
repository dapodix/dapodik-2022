<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.aplikasi' table.
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
class AplikasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AplikasiTableMap';

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
        $this->setName('man_akses.aplikasi');
        $this->setPhpName('Aplikasi');
        $this->setClassname('DataDikdas\\Model\\Aplikasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_aplikasi', 'IdAplikasi', 'VARCHAR', true, null, null);
        $this->addColumn('nm_aplikasi', 'NmAplikasi', 'VARCHAR', true, 100, null);
        $this->addColumn('ket_aplikasi', 'KetAplikasi', 'VARCHAR', false, 500, null);
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, 'now()');
        $this->addColumn('expired_date', 'ExpiredDate', 'TIMESTAMP', false, null, null);
        $this->addColumn('last_sync', 'LastSync', 'TIMESTAMP', true, null, '1901-01-01 00:00:00');
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('Menu', 'DataDikdas\\Model\\Menu', RelationMap::ONE_TO_MANY, array('id_aplikasi' => 'id_aplikasi', ), 'RESTRICT', 'RESTRICT', 'Menus');
    } // buildRelations()

} // AplikasiTableMap
