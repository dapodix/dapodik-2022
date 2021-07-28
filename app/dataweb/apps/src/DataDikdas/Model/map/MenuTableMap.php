<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'man_akses.menu' table.
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
class MenuTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.MenuTableMap';

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
        $this->setName('man_akses.menu');
        $this->setPhpName('Menu');
        $this->setClassname('DataDikdas\\Model\\Menu');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_menu', 'IdMenu', 'VARCHAR', true, null, null);
        $this->addForeignKey('men_id_menu', 'MenIdMenu', 'VARCHAR', 'man_akses.menu', 'id_menu', false, null, null);
        $this->addForeignKey('id_aplikasi', 'IdAplikasi', 'VARCHAR', 'man_akses.aplikasi', 'id_aplikasi', true, null, null);
        $this->addColumn('nm_menu', 'NmMenu', 'VARCHAR', true, 100, null);
        $this->addColumn('nm_file', 'NmFile', 'VARCHAR', false, 100, null);
        $this->addColumn('level_menu', 'LevelMenu', 'DECIMAL', false, 196608, null);
        $this->addColumn('urutan_menu', 'UrutanMenu', 'INTEGER', true, null, null);
        $this->addColumn('a_aktif', 'AAktif', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_tampil', 'ATampil', 'DECIMAL', true, 65536, null);
        $this->addColumn('icon', 'Icon', 'VARCHAR', false, 100, null);
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
        $this->addRelation('Aplikasi', 'DataDikdas\\Model\\Aplikasi', RelationMap::MANY_TO_ONE, array('id_aplikasi' => 'id_aplikasi', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MenuRelatedByMenIdMenu', 'DataDikdas\\Model\\Menu', RelationMap::MANY_TO_ONE, array('men_id_menu' => 'id_menu', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('MenuRelatedByIdMenu', 'DataDikdas\\Model\\Menu', RelationMap::ONE_TO_MANY, array('id_menu' => 'men_id_menu', ), 'RESTRICT', 'RESTRICT', 'MenusRelatedByIdMenu');
        $this->addRelation('MenuRole', 'DataDikdas\\Model\\MenuRole', RelationMap::ONE_TO_MANY, array('id_menu' => 'id_menu', ), 'RESTRICT', 'RESTRICT', 'MenuRoles');
    } // buildRelations()

} // MenuTableMap
