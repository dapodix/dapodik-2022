<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'instalasi' table.
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
class InstalasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.InstalasiTableMap';

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
        $this->setName('instalasi');
        $this->setPhpName('Instalasi');
        $this->setClassname('DataDikdas\\Model\\Instalasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_instalasi', 'IdInstalasi', 'VARCHAR', true, null, null);
        $this->addForeignKey('kode_wilayah', 'KodeWilayah', 'CHAR', 'ref.mst_wilayah', 'kode_wilayah', false, 8, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', false, null, null);
        $this->addColumn('jns_instalasi', 'JnsInstalasi', 'CHAR', true, 1, '1');
        $this->addColumn('a_link_aktif', 'ALinkAktif', 'DECIMAL', true, 65536, 1);
        $this->addColumn('ket_link', 'KetLink', 'VARCHAR', false, 100, null);
        // validators
    } // initialize()

    /**
     * Build the RelationMap objects for this table relationships
     */
    public function buildRelations()
    {
        $this->addRelation('MstWilayah', 'DataDikdas\\Model\\MstWilayah', RelationMap::MANY_TO_ONE, array('kode_wilayah' => 'kode_wilayah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SyncLog', 'DataDikdas\\Model\\SyncLog', RelationMap::ONE_TO_MANY, array('id_instalasi' => 'id_instalasi', ), 'RESTRICT', 'RESTRICT', 'SyncLogs');
    } // buildRelations()

} // InstalasiTableMap
