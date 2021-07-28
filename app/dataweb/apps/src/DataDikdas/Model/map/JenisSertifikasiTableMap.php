<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_sertifikasi' table.
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
class JenisSertifikasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisSertifikasiTableMap';

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
        $this->setName('ref.jenis_sertifikasi');
        $this->setPhpName('JenisSertifikasi');
        $this->setClassname('DataDikdas\\Model\\JenisSertifikasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_jenis_sertifikasi', 'IdJenisSertifikasi', 'DECIMAL', true, 196608, null);
        $this->addColumn('jenis_sertifikasi', 'JenisSertifikasi', 'VARCHAR', true, 30, null);
        $this->addColumn('prof_guru', 'ProfGuru', 'DECIMAL', true, 65536, null);
        $this->addColumn('kepala_sekolah', 'KepalaSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('laboran', 'Laboran', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_pd', 'APd', 'DECIMAL', true, 65536, 0);
        $this->addForeignKey('kebutuhan_khusus_id', 'KebutuhanKhususId', 'INTEGER', 'ref.kebutuhan_khusus', 'kebutuhan_khusus_id', true, null, null);
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
        $this->addRelation('KebutuhanKhusus', 'DataDikdas\\Model\\KebutuhanKhusus', RelationMap::MANY_TO_ONE, array('kebutuhan_khusus_id' => 'kebutuhan_khusus_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('RwySertifikasi', 'DataDikdas\\Model\\RwySertifikasi', RelationMap::ONE_TO_MANY, array('id_jenis_sertifikasi' => 'id_jenis_sertifikasi', ), 'RESTRICT', 'RESTRICT', 'RwySertifikasis');
        $this->addRelation('SertifikasiPd', 'DataDikdas\\Model\\SertifikasiPd', RelationMap::ONE_TO_MANY, array('id_jenis_sertifikasi' => 'id_jenis_sertifikasi', ), 'RESTRICT', 'RESTRICT', 'SertifikasiPds');
    } // buildRelations()

} // JenisSertifikasiTableMap
