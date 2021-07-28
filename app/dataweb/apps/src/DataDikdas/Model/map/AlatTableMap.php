<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'alat' table.
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
class AlatTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AlatTableMap';

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
        $this->setName('alat');
        $this->setPhpName('Alat');
        $this->setClassname('DataDikdas\\Model\\Alat');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_alat', 'IdAlat', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_sarana_id', 'JenisSaranaId', 'INTEGER', 'ref.jenis_sarana', 'jenis_sarana_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', false, null, null);
        $this->addForeignKey('id_ruang', 'IdRuang', 'VARCHAR', 'ruang', 'id_ruang', false, null, null);
        $this->addForeignKey('id_hapus_buku', 'IdHapusBuku', 'CHAR', 'ref.jenis_hapus_buku', 'id_hapus_buku', false, 1, null);
        $this->addForeignKey('kepemilikan_sarpras_id', 'KepemilikanSarprasId', 'DECIMAL', 'ref.status_kepemilikan_sarpras', 'kepemilikan_sarpras_id', true, 65536, null);
        $this->addColumn('kd_kl', 'KdKl', 'CHAR', false, 3, null);
        $this->addColumn('kd_satker', 'KdSatker', 'VARCHAR', false, 20, null);
        $this->addColumn('kd_brg', 'KdBrg', 'VARCHAR', false, 10, null);
        $this->addColumn('nup', 'Nup', 'INTEGER', false, null, null);
        $this->addColumn('kode_eselon1', 'KodeEselon1', 'VARCHAR', false, 2, null);
        $this->addColumn('nama_eselon1', 'NamaEselon1', 'VARCHAR', false, 255, null);
        $this->addColumn('kode_sub_satker', 'KodeSubSatker', 'VARCHAR', false, 3, null);
        $this->addColumn('nama_sub_satker', 'NamaSubSatker', 'VARCHAR', false, 255, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('spesifikasi', 'Spesifikasi', 'VARCHAR', false, 300, null);
        $this->addColumn('tgl_hapus_buku', 'TglHapusBuku', 'DATE', false, null, null);
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
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::MANY_TO_ONE, array('id_ruang' => 'id_ruang', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisHapusBuku', 'DataDikdas\\Model\\JenisHapusBuku', RelationMap::MANY_TO_ONE, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisSarana', 'DataDikdas\\Model\\JenisSarana', RelationMap::MANY_TO_ONE, array('jenis_sarana_id' => 'jenis_sarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepemilikanSarpras', 'DataDikdas\\Model\\StatusKepemilikanSarpras', RelationMap::MANY_TO_ONE, array('kepemilikan_sarpras_id' => 'kepemilikan_sarpras_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AlatDariBlockgrant', 'DataDikdas\\Model\\AlatDariBlockgrant', RelationMap::ONE_TO_MANY, array('id_alat' => 'id_alat', ), 'RESTRICT', 'RESTRICT', 'AlatDariBlockgrants');
        $this->addRelation('AlatLongitudinal', 'DataDikdas\\Model\\AlatLongitudinal', RelationMap::ONE_TO_MANY, array('id_alat' => 'id_alat', ), 'RESTRICT', 'RESTRICT', 'AlatLongitudinals');
        $this->addRelation('VldAlat', 'DataDikdas\\Model\\VldAlat', RelationMap::ONE_TO_MANY, array('id_alat' => 'id_alat', ), 'RESTRICT', 'RESTRICT', 'VldAlats');
    } // buildRelations()

} // AlatTableMap
