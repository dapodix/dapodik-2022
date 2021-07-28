<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_sarana' table.
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
class JenisSaranaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisSaranaTableMap';

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
        $this->setName('ref.jenis_sarana');
        $this->setPhpName('JenisSarana');
        $this->setClassname('DataDikdas\\Model\\JenisSarana');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_sarana_id', 'JenisSaranaId', 'INTEGER', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 60, null);
        $this->addColumn('kelompok', 'Kelompok', 'VARCHAR', false, 50, null);
        $this->addColumn('perlu_penempatan', 'PerluPenempatan', 'DECIMAL', true, 65536, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 128, null);
        $this->addColumn('a_alat', 'AAlat', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_angkutan', 'AAngkutan', 'DECIMAL', true, 65536, 0);
        $this->addColumn('spm_qty_min_per_siswa', 'SpmQtyMinPerSiswa', 'DECIMAL', true, 196609, -1);
        $this->addColumn('spm_qty_min_per_sekolah', 'SpmQtyMinPerSekolah', 'DECIMAL', true, 262144, -1);
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
        $this->addRelation('Alat', 'DataDikdas\\Model\\Alat', RelationMap::ONE_TO_MANY, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT', 'Alats');
        $this->addRelation('Angkutan', 'DataDikdas\\Model\\Angkutan', RelationMap::ONE_TO_MANY, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT', 'Angkutans');
        $this->addRelation('PemakaiSarana', 'DataDikdas\\Model\\PemakaiSarana', RelationMap::ONE_TO_MANY, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT', 'PemakaiSaranas');
        $this->addRelation('StandarSarana', 'DataDikdas\\Model\\StandarSarana', RelationMap::ONE_TO_MANY, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT', 'StandarSaranas');
    } // buildRelations()

} // JenisSaranaTableMap
