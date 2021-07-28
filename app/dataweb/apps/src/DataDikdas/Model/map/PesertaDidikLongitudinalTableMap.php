<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'peserta_didik_longitudinal' table.
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
class PesertaDidikLongitudinalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PesertaDidikLongitudinalTableMap';

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
        $this->setName('peserta_didik_longitudinal');
        $this->setPhpName('PesertaDidikLongitudinal');
        $this->setClassname('DataDikdas\\Model\\PesertaDidikLongitudinal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR' , 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addColumn('tinggi_badan', 'TinggiBadan', 'DECIMAL', true, 196608, null);
        $this->addColumn('berat_badan', 'BeratBadan', 'DECIMAL', true, 196608, null);
        $this->addColumn('lingkar_kepala', 'LingkarKepala', 'DECIMAL', false, 196608, null);
        $this->addColumn('jarak_rumah_ke_sekolah', 'JarakRumahKeSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('jarak_rumah_ke_sekolah_km', 'JarakRumahKeSekolahKm', 'DECIMAL', false, 196608, null);
        $this->addColumn('waktu_tempuh_ke_sekolah', 'WaktuTempuhKeSekolah', 'DECIMAL', true, 65536, null);
        $this->addColumn('menit_tempuh_ke_sekolah', 'MenitTempuhKeSekolah', 'DECIMAL', false, 196608, null);
        $this->addColumn('jumlah_saudara_kandung', 'JumlahSaudaraKandung', 'DECIMAL', true, 131072, null);
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
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldPdLong', 'DataDikdas\\Model\\VldPdLong', RelationMap::ONE_TO_MANY, array('peserta_didik_id' => 'peserta_didik_id', 'semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT', 'VldPdLongs');
    } // buildRelations()

} // PesertaDidikLongitudinalTableMap
