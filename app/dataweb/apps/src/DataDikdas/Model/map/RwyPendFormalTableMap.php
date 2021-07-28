<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rwy_pend_formal' table.
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
class RwyPendFormalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RwyPendFormalTableMap';

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
        $this->setName('rwy_pend_formal');
        $this->setPhpName('RwyPendFormal');
        $this->setClassname('DataDikdas\\Model\\RwyPendFormal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('riwayat_pendidikan_formal_id', 'RiwayatPendidikanFormalId', 'VARCHAR', true, null, null);
        $this->addForeignKey('bidang_studi_id', 'BidangStudiId', 'INTEGER', 'ref.bidang_studi', 'bidang_studi_id', true, null, null);
        $this->addForeignKey('jenjang_pendidikan_id', 'JenjangPendidikanId', 'DECIMAL', 'ref.jenjang_pendidikan', 'jenjang_pendidikan_id', true, 131072, null);
        $this->addForeignKey('gelar_akademik_id', 'GelarAkademikId', 'INTEGER', 'ref.gelar_akademik', 'gelar_akademik_id', false, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addColumn('satuan_pendidikan_formal', 'SatuanPendidikanFormal', 'VARCHAR', true, 100, null);
        $this->addColumn('fakultas', 'Fakultas', 'VARCHAR', false, 30, null);
        $this->addColumn('kependidikan', 'Kependidikan', 'DECIMAL', true, 65536, null);
        $this->addColumn('tahun_masuk', 'TahunMasuk', 'DECIMAL', true, 262144, null);
        $this->addColumn('tahun_lulus', 'TahunLulus', 'DECIMAL', false, 262144, null);
        $this->addColumn('nim', 'Nim', 'VARCHAR', true, 12, null);
        $this->addColumn('status_kuliah', 'StatusKuliah', 'DECIMAL', true, 65536, null);
        $this->addColumn('semester', 'Semester', 'DECIMAL', false, 131072, null);
        $this->addColumn('ipk', 'Ipk', 'DECIMAL', true, 327682, null);
        $this->addColumn('prodi', 'Prodi', 'VARCHAR', false, null, null);
        $this->addColumn('id_reg_pd', 'IdRegPd', 'VARCHAR', false, null, null);
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
        $this->addRelation('GelarAkademik', 'DataDikdas\\Model\\GelarAkademik', RelationMap::MANY_TO_ONE, array('gelar_akademik_id' => 'gelar_akademik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BidangStudi', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenjangPendidikan', 'DataDikdas\\Model\\JenjangPendidikan', RelationMap::MANY_TO_ONE, array('jenjang_pendidikan_id' => 'jenjang_pendidikan_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldRwyPendFormal', 'DataDikdas\\Model\\VldRwyPendFormal', RelationMap::ONE_TO_MANY, array('riwayat_pendidikan_formal_id' => 'riwayat_pendidikan_formal_id', ), 'RESTRICT', 'RESTRICT', 'VldRwyPendFormals');
    } // buildRelations()

} // RwyPendFormalTableMap
