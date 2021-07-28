<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'aktivitas_kepanitiaan' table.
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
class AktivitasKepanitiaanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AktivitasKepanitiaanTableMap';

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
        $this->setName('aktivitas_kepanitiaan');
        $this->setPhpName('AktivitasKepanitiaan');
        $this->setClassname('DataDikdas\\Model\\AktivitasKepanitiaan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_akt_pan', 'IdAktPan', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_panitia', 'IdPanitia', 'VARCHAR', 'kepanitiaan', 'id_panitia', true, null, null);
        $this->addForeignKey('semester_id', 'SemesterId', 'CHAR', 'ref.semester', 'semester_id', true, 5, null);
        $this->addForeignKey('id_jns_akt_pan', 'IdJnsAktPan', 'DECIMAL', 'ref.jenis_aktivitas_kepanitiaan', 'id_jns_akt_pan', true, 262144, null);
        $this->addColumn('frek_akt_pan', 'FrekAktPan', 'DECIMAL', true, 262144, null);
        $this->addColumn('ket_akt_pan', 'KetAktPan', 'VARCHAR', false, 300, null);
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
        $this->addRelation('JenisAktivitasKepanitiaan', 'DataDikdas\\Model\\JenisAktivitasKepanitiaan', RelationMap::MANY_TO_ONE, array('id_jns_akt_pan' => 'id_jns_akt_pan', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Kepanitiaan', 'DataDikdas\\Model\\Kepanitiaan', RelationMap::MANY_TO_ONE, array('id_panitia' => 'id_panitia', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Semester', 'DataDikdas\\Model\\Semester', RelationMap::MANY_TO_ONE, array('semester_id' => 'semester_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // AktivitasKepanitiaanTableMap
