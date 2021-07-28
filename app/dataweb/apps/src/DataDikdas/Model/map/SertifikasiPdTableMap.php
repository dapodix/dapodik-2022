<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'sertifikasi_pd' table.
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
class SertifikasiPdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SertifikasiPdTableMap';

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
        $this->setName('sertifikasi_pd');
        $this->setPhpName('SertifikasiPd');
        $this->setClassname('DataDikdas\\Model\\SertifikasiPd');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_sert_pd', 'IdSertPd', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_jenis_sertifikasi', 'IdJenisSertifikasi', 'DECIMAL', 'ref.jenis_sertifikasi', 'id_jenis_sertifikasi', true, 196608, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addForeignKey('bidang_studi_id', 'BidangStudiId', 'INTEGER', 'ref.bidang_studi', 'bidang_studi_id', true, null, null);
        $this->addColumn('no_sert_pd', 'NoSertPd', 'VARCHAR', true, 30, null);
        $this->addColumn('tgl_sert_pd', 'TglSertPd', 'DATE', true, null, null);
        $this->addColumn('tgl_exp_sert_pd', 'TglExpSertPd', 'DATE', false, null, null);
        $this->addColumn('no_peserta_sert_pd', 'NoPesertaSertPd', 'VARCHAR', false, 30, null);
        $this->addForeignKey('kode_lemb_sert', 'KodeLembSert', 'DECIMAL', 'ref.lemb_sertifikasi', 'kode_lemb_sert', true, 327680, null);
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
        $this->addRelation('BidangStudi', 'DataDikdas\\Model\\BidangStudi', RelationMap::MANY_TO_ONE, array('bidang_studi_id' => 'bidang_studi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisSertifikasi', 'DataDikdas\\Model\\JenisSertifikasi', RelationMap::MANY_TO_ONE, array('id_jenis_sertifikasi' => 'id_jenis_sertifikasi', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembSertifikasi', 'DataDikdas\\Model\\LembSertifikasi', RelationMap::MANY_TO_ONE, array('kode_lemb_sert' => 'kode_lemb_sert', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // SertifikasiPdTableMap
