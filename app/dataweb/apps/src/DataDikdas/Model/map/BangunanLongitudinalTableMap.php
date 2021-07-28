<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'bangunan_longitudinal' table.
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
class BangunanLongitudinalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BangunanLongitudinalTableMap';

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
        $this->setName('bangunan_longitudinal');
        $this->setPhpName('BangunanLongitudinal');
        $this->setClassname('DataDikdas\\Model\\BangunanLongitudinal');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addForeignPrimaryKey('id_bangunan', 'IdBangunan', 'VARCHAR' , 'bangunan', 'id_bangunan', true, null, null);
        $this->addForeignPrimaryKey('semester_id', 'SemesterId', 'CHAR' , 'ref.semester', 'semester_id', true, 5, null);
        $this->addColumn('rusak_pondasi', 'RusakPondasi', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_pondasi', 'KetPondasi', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_sloop_kolom_balok', 'RusakSloopKolomBalok', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_sloop_kolom_balok', 'KetSloopKolomBalok', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_plester_struktur', 'RusakPlesterStruktur', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_plester_struktur', 'KetPlesterStruktur', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_kudakuda_atap', 'RusakKudakudaAtap', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_kudakuda_atap', 'KetKudakudaAtap', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_kaso_atap', 'RusakKasoAtap', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_kaso_atap', 'KetKasoAtap', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_reng_atap', 'RusakRengAtap', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_reng_atap', 'KetRengAtap', 'VARCHAR', false, 120, null);
        $this->addColumn('rusak_tutup_atap', 'RusakTutupAtap', 'DECIMAL', true, 393218, 0);
        $this->addColumn('ket_tutup_atap', 'KetTutupAtap', 'VARCHAR', false, 120, null);
        $this->addColumn('nilai_saat_ini', 'NilaiSaatIni', 'DECIMAL', false, 1310722, null);
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
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Bangunan', 'DataDikdas\\Model\\Bangunan', RelationMap::MANY_TO_ONE, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // BangunanLongitudinalTableMap
