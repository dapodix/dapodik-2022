<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_pendaftaran' table.
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
class JenisPendaftaranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisPendaftaranTableMap';

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
        $this->setName('ref.jenis_pendaftaran');
        $this->setPhpName('JenisPendaftaran');
        $this->setClassname('DataDikdas\\Model\\JenisPendaftaran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_pendaftaran_id', 'JenisPendaftaranId', 'DECIMAL', true, 65536, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 20, null);
        $this->addColumn('daftar_sekolah', 'DaftarSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('daftar_rombel', 'DaftarRombel', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('AnggotaRombel', 'DataDikdas\\Model\\AnggotaRombel', RelationMap::ONE_TO_MANY, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT', 'AnggotaRombels');
        $this->addRelation('PesertaDidikBaru', 'DataDikdas\\Model\\PesertaDidikBaru', RelationMap::ONE_TO_MANY, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikBarus');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::ONE_TO_MANY, array('jenis_pendaftaran_id' => 'jenis_pendaftaran_id', ), 'RESTRICT', 'RESTRICT', 'RegistrasiPesertaDidiks');
    } // buildRelations()

} // JenisPendaftaranTableMap
