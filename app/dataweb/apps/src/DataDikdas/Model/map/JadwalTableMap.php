<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'jadwal' table.
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
class JadwalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JadwalTableMap';

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
        $this->setName('jadwal');
        $this->setPhpName('Jadwal');
        $this->setClassname('DataDikdas\\Model\\Jadwal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('sekolah_id', 'SekolahId', 'VARCHAR' , 'sekolah_longitudinal', 'sekolah_id', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'sekolah_longitudinal', 'semester_id', true, 5, null);
        $this->addForeignPrimaryKey('id_ruang', 'IdRuang', 'VARCHAR' , 'ruang', 'id_ruang', true, null, null);
        $this->addPrimaryKey('hari', 'Hari', 'DECIMAL', true, 65536, null);
        $this->addForeignKey('bel_ke_01', 'BelKe01', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_02', 'BelKe02', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_03', 'BelKe03', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_04', 'BelKe04', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_05', 'BelKe05', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_06', 'BelKe06', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_07', 'BelKe07', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_08', 'BelKe08', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_09', 'BelKe09', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_10', 'BelKe10', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_11', 'BelKe11', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_12', 'BelKe12', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_13', 'BelKe13', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_14', 'BelKe14', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_15', 'BelKe15', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_16', 'BelKe16', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_17', 'BelKe17', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_18', 'BelKe18', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_19', 'BelKe19', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
        $this->addForeignKey('bel_ke_20', 'BelKe20', 'VARCHAR', 'pembelajaran', 'pembelajaran_id', false, null, null);
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
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('SekolahLongitudinal', 'DataDikdas\\Model\\SekolahLongitudinal', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', 'semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe01', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_01' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe02', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_02' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe03', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_03' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe04', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_04' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe05', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_05' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe06', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_06' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe07', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_07' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe08', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_08' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe09', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_09' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe10', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_10' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe11', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_11' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe12', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_12' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe13', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_13' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe14', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_14' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe15', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_15' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe16', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_16' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe17', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_17' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe18', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_18' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe19', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_19' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PembelajaranRelatedByBelKe20', 'DataDikdas\\Model\\Pembelajaran', RelationMap::MANY_TO_ONE, array('bel_ke_20' => 'pembelajaran_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // JadwalTableMap
