<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'anggota_rombel' table.
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
class AnggotaRombelTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AnggotaRombelTableMap';

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
        $this->setName('anggota_rombel');
        $this->setPhpName('AnggotaRombel');
        $this->setClassname('DataDikdas\\Model\\AnggotaRombel');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('anggota_rombel_id', 'AnggotaRombelId', 'VARCHAR', true, null, null);
        $this->addForeignKey('rombongan_belajar_id', 'RombonganBelajarId', 'VARCHAR', 'rombongan_belajar', 'rombongan_belajar_id', true, null, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addForeignKey('jenis_pendaftaran_id', 'JenisPendaftaranId', 'DECIMAL', 'ref.jenis_pendaftaran', 'jenis_pendaftaran_id', true, 65536, null);
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
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::MANY_TO_ONE, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPendaftaran', 'DataDikdas\\Model\\JenisPendaftaran', RelationMap::MANY_TO_ONE, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BantuanPd', 'DataDikdas\\Model\\BantuanPd', RelationMap::ONE_TO_MANY, array('anggota_rombel_id' => 'anggota_rombel_id', ), 'RESTRICT', 'RESTRICT', 'BantuanPds');
    } // buildRelations()

} // AnggotaRombelTableMap
