<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.menu_role' table.
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
class MenuRoleTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MenuRoleTableMap';

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
        $this->setName('man_akses.menu_role');
        $this->setPhpName('MenuRole');
        $this->setClassname('DataDikdas\\Model\\MenuRole');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_menu', 'IdMenu', 'VARCHAR' , 'man_akses.menu', 'id_menu', true, null, null);
        $this->addForeignPrimaryKey('peran_id', 'PeranId', 'INTEGER' , 'man_akses.peran', 'peran_id', true, null, null);
        $this->addColumn('akses_menu', 'AksesMenu', 'VARCHAR', false, 50, null);
        $this->addColumn('a_boleh_insert', 'ABolehInsert', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_boleh_delete', 'ABolehDelete', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_boleh_update', 'ABolehUpdate', 'DECIMAL', false, 65536, null);
        $this->addColumn('a_boleh_sanggah', 'ABolehSanggah', 'DECIMAL', false, 65536, null);
        $this->addColumn('approval_menu', 'ApprovalMenu', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('Menu', 'DataDikdas\\Model\\Menu', RelationMap::MANY_TO_ONE, array('id_menu' => 'id_menu', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Peran', 'DataDikdas\\Model\\Peran', RelationMap::MANY_TO_ONE, array('peran_id' => 'peran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // MenuRoleTableMap
