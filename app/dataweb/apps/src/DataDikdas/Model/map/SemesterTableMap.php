<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.semester' table.
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
class SemesterTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.SemesterTableMap';

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
        $this->setName('ref.semester');
        $this->setPhpName('Semester');
        $this->setClassname('DataDikdas\\Model\\Semester');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('semester_id', 'SemesterId', 'CHAR', true, 5, null);
        $this->addForeignKey('tahun_ajaran_id', 'TahunAjaranId', 'DECIMAL', 'ref.tahun_ajaran', 'tahun_ajaran_id', true, 262144, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 20, null);
        $this->addColumn('semester', 'Semester', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('TahunAjaran', 'DataDikdas\\Model\\TahunAjaran', RelationMap::MANY_TO_ONE, array('tahun_ajaran_id' => 'tahun_ajaran_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AktivitasKepanitiaan', 'DataDikdas\\Model\\AktivitasKepanitiaan', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'AktivitasKepanitiaans');
        $this->addRelation('AlatLongitudinal', 'DataDikdas\\Model\\AlatLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'AlatLongitudinals');
        $this->addRelation('BangunanLongitudinal', 'DataDikdas\\Model\\BangunanLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'BangunanLongitudinals');
        $this->addRelation('BatasWaktuRapor', 'DataDikdas\\Model\\BatasWaktuRapor', RelationMap::ONE_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BukuLongitudinal', 'DataDikdas\\Model\\BukuLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'BukuLongitudinals');
        $this->addRelation('JurSpLong', 'DataDikdas\\Model\\JurSpLong', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'JurSpLongs');
        $this->addRelation('Pembelajaran', 'DataDikdas\\Model\\Pembelajaran', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'Pembelajarans');
        $this->addRelation('PesertaDidikLongitudinal', 'DataDikdas\\Model\\PesertaDidikLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'PesertaDidikLongitudinals');
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'RombonganBelajars');
        $this->addRelation('RuangLongitudinal', 'DataDikdas\\Model\\RuangLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'RuangLongitudinals');
        $this->addRelation('Sanitasi', 'DataDikdas\\Model\\Sanitasi', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'Sanitasis');
        $this->addRelation('SekolahLongitudinal', 'DataDikdas\\Model\\SekolahLongitudinal', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'SekolahLongitudinals');
        $this->addRelation('Tunjangan', 'DataDikdas\\Model\\Tunjangan', RelationMap::ONE_TO_MANY, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'Tunjangans');
    } // buildRelations()

} // SemesterTableMap
