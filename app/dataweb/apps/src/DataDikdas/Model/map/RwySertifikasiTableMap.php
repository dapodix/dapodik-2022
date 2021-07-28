<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'rwy_sertifikasi' table.
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
class RwySertifikasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.RwySertifikasiTableMap';

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
        $this->setName('rwy_sertifikasi');
        $this->setPhpName('RwySertifikasi');
        $this->setClassname('DataDikdas\\Model\\RwySertifikasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('riwayat_sertifikasi_id', 'RiwayatSertifikasiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('kode_lemb_sert', 'KodeLembSert', 'DECIMAL', 'ref.lemb_sertifikasi', 'kode_lemb_sert', true, 327680, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', true, null, null);
        $this->addForeignKey('bidang_studi_id', 'BidangStudiId', 'INTEGER', 'ref.bidang_studi', 'bidang_studi_id', true, null, null);
        $this->addForeignKey('id_jenis_sertifikasi', 'IdJenisSertifikasi', 'DECIMAL', 'ref.jenis_sertifikasi', 'id_jenis_sertifikasi', true, 196608, null);
        $this->addColumn('tgl_sert', 'TglSert', 'DATE', true, null, null);
        $this->addColumn('tgl_exp_sert', 'TglExpSert', 'DATE', false, null, null);
        $this->addColumn('nomor_sertifikat', 'NomorSertifikat', 'VARCHAR', true, 80, null);
        $this->addColumn('nomer_registrasi', 'NomerRegistrasi', 'VARCHAR', false, 80, null);
        $this->addColumn('nomor_peserta', 'NomorPeserta', 'VARCHAR', false, 80, null);
        $this->addColumn('kualifikasi', 'Kualifikasi', 'VARCHAR', false, 100, null);
        $this->addColumn('asal_data', 'AsalData', 'CHAR', true, 1, '1');
        $this->addColumn('create_date', 'CreateDate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
        $this->addColumn('last_update', 'LastUpdate', 'TIMESTAMP', true, null, '2021-06-07 11:49:57.910477');
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
        $this->addRelation('BidangStudi', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisSertifikasi', 'DataDikdas\\Model\\JenisSertifikasi', RelationMap::MANY_TO_ONE, array('id_jenis_sertifikasi' => 'id_jenis_sertifikasi', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembSertifikasi', 'DataDikdas\\Model\\LembSertifikasi', RelationMap::MANY_TO_ONE, array('kode_lemb_sert' => 'kode_lemb_sert', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldRwySertifikasi', 'DataDikdas\\Model\\VldRwySertifikasi', RelationMap::ONE_TO_MANY, array('riwayat_sertifikasi_id' => 'riwayat_sertifikasi_id', ), 'RESTRICT', 'RESTRICT', 'VldRwySertifikasis');
    } // buildRelations()

} // RwySertifikasiTableMap
