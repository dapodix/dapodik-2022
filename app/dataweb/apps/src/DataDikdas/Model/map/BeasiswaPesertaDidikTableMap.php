<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'beasiswa_peserta_didik' table.
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
class BeasiswaPesertaDidikTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BeasiswaPesertaDidikTableMap';

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
        $this->setName('beasiswa_peserta_didik');
        $this->setPhpName('BeasiswaPesertaDidik');
        $this->setClassname('DataDikdas\\Model\\BeasiswaPesertaDidik');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('beasiswa_peserta_didik_id', 'BeasiswaPesertaDidikId', 'VARCHAR', true, null, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addForeignKey('jenis_beasiswa_id', 'JenisBeasiswaId', 'INTEGER', 'ref.jenis_beasiswa', 'jenis_beasiswa_id', true, null, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', true, 80, null);
        $this->addForeignKey('tahun_mulai', 'TahunMulai', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addForeignKey('tahun_selesai', 'TahunSelesai', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
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
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaranRelatedByTahunSelesai', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_selesai' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TahunAjaranRelatedByTahunMulai', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_mulai' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisBeasiswa', 'DataDikdas\\Model\\JenisBeasiswa', RelationMap::MANY_TO_ONE, array('jenis_beasiswa_id' => 'jenis_beasiswa_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldBeaPd', 'DataDikdas\\Model\\VldBeaPd', RelationMap::ONE_TO_MANY, array('beasiswa_peserta_didik_id' => 'beasiswa_peserta_didik_id', ), 'RESTRICT', 'RESTRICT', 'VldBeaPds');
    } // buildRelations()

} // BeasiswaPesertaDidikTableMap
