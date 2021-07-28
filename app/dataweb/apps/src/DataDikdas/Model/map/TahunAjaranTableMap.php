<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.tahun_ajaran' table.
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
class TahunAjaranTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.TahunAjaranTableMap';

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
        $this->setName('ref.tahun_ajaran');
        $this->setPhpName('TahunAjaran');
        $this->setClassname('DataDikdas\\Model\\TahunAjaran');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', true, 262144, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 10, null);
        $this->addColumn('periode_aktif', 'PeriodeAktif', 'DECIMAL', true, 65536, null);
        $this->addColumn('tanggal_mulai', 'TanggalMulai', 'DATE', true, null, null);
        $this->addColumn('tanggal_selesai', 'TanggalSelesai', 'DATE', true, null, null);
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
        $this->addRelation('BeasiswaPesertaDidikRelatedByTahunSelesai', 'DataDikdas\\Model\\BeasiswaPesertaDidik', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_selesai', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPesertaDidiksRelatedByTahunSelesai');
        $this->addRelation('BeasiswaPesertaDidikRelatedByTahunMulai', 'DataDikdas\\Model\\BeasiswaPesertaDidik', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_mulai', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPesertaDidiksRelatedByTahunMulai');
        $this->addRelation('Demografi', 'DataDikdas\\Model\\Demografi', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'Demografis');
        $this->addRelation('PengawasTerdaftar', 'DataDikdas\\Model\\PengawasTerdaftar', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'PengawasTerdaftars');
        $this->addRelation('PesertaDidikBaru', 'DataDikdas\\Model\\PesertaDidikBaru', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikBarus');
        $this->addRelation('PtkBaru', 'DataDikdas\\Model\\PtkBaru', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'PtkBarus');
        $this->addRelation('PtkTerdaftar', 'DataDikdas\\Model\\PtkTerdaftar', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'PtkTerdaftars');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'Semesters');
        $this->addRelation('TanahLongitudinal', 'DataDikdas\\Model\\TanahLongitudinal', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'TanahLongitudinals');
        $this->addRelation('TemplateUn', 'DataDikdas\\Model\\TemplateUn', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'TemplateUns');
        $this->addRelation('Un', 'DataDikdas\\Model\\Un', RelationMap::ONE_TO_MANY, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT', 'Uns');
    } // buildRelations()

} // TahunAjaranTableMap
