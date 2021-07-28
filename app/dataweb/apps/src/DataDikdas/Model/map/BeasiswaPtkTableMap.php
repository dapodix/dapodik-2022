<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'beasiswa_ptk' table.
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
class BeasiswaPtkTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BeasiswaPtkTableMap';

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
        $this->setName('beasiswa_ptk');
        $this->setPhpName('BeasiswaPtk');
        $this->setClassname('DataDikdas\\Model\\BeasiswaPtk');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('beasiswa_ptk_id', 'BeasiswaPtkId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_beasiswa_id', 'JenisBeasiswaId', 'INTEGER', 'ref.jenis_beasiswa', 'jenis_beasiswa_id', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', true, 200, null);
        $this->addColumn('tahun_mulai', 'TahunMulai', 'DECIMAL', true, 262144, null);
        $this->addColumn('tahun_akhir', 'TahunAkhir', 'DECIMAL', false, 262144, null);
        $this->addColumn('masih_menerima', 'MasihMenerima', 'DECIMAL', true, 65536, 1);
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
        $this->addRelation('JenisBeasiswa', 'DataDikdas\\Model\\JenisBeasiswa', RelationMap::MANY_TO_ONE, array('jenis_beasiswa_id' => 'jenis_beasiswa_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldBeaPtk', 'DataDikdas\\Model\\VldBeaPtk', RelationMap::ONE_TO_MANY, array('beasiswa_ptk_id' => 'beasiswa_ptk_id', ), 'RESTRICT', 'RESTRICT', 'VldBeaPtks');
    } // buildRelations()

} // BeasiswaPtkTableMap
