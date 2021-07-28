<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.bidang_studi' table.
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
class BidangStudiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BidangStudiTableMap';

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
        $this->setName('ref.bidang_studi');
        $this->setPhpName('BidangStudi');
        $this->setClassname('DataDikdas\\Model\\BidangStudi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('bidang_studi_id', 'BidangStudiId', 'INTEGER', true, null, null);
        $this->addForeignKey('kelompok_bidang_studi_id', 'KelompokBidangStudiId', 'INTEGER', 'ref.bidang_studi', 'bidang_studi_id', false, null, null);
        $this->addColumn('kode', 'Kode', 'VARCHAR', false, 30, null);
        $this->addColumn('bidang_studi', 'BidangStudi', 'VARCHAR', true, 40, null);
        $this->addColumn('kelompok', 'Kelompok', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_paud', 'JenjangPaud', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_tk', 'JenjangTk', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_sd', 'JenjangSd', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_smp', 'JenjangSmp', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_sma', 'JenjangSma', 'DECIMAL', true, 65536, null);
        $this->addColumn('jenjang_tinggi', 'JenjangTinggi', 'DECIMAL', true, 65536, null);
        $this->addColumn('a_sert_komp', 'ASertKomp', 'DECIMAL', true, 65536, 0);
        $this->addColumn('a_sert_profesi', 'ASertProfesi', 'DECIMAL', true, 65536, 0);
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
        $this->addRelation('BidangStudiRelatedByKelompokBidangStudiId', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('kelompok_bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BidangSdm', 'DataDikdas\\Model\\BidangSdm', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'BidangSdms');
        $this->addRelation('BidangStudiRelatedByBidangStudiId', 'DataDikdas\\Model\\BidangStudi', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'kelompok_bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'BidangStudisRelatedByBidangStudiId');
        $this->addRelation('MapBidangMataPelajaran', 'DataDikdas\\Model\\MapBidangMataPelajaran', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'MapBidangMataPelajarans');
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'PengawasTerdaftars');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'pengawas_bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'Ptks');
        $this->addRelation('RwyPendFormal', 'DataDikdas\\Model\\RwyPendFormal', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'RwyPendFormals');
        $this->addRelation('RwySertifikasi', 'DataDikdas\\Model\\RwySertifikasi', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'RwySertifikasis');
        $this->addRelation('SertifikasiPd', 'DataDikdas\\Model\\SertifikasiPd', RelationMap::ONE_TO_MANY, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT', 'SertifikasiPds');
    } // buildRelations()

} // BidangStudiTableMap
