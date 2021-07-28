<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'anggota_panitia' table.
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
class AnggotaPanitiaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AnggotaPanitiaTableMap';

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
        $this->setName('anggota_panitia');
        $this->setPhpName('AnggotaPanitia');
        $this->setClassname('DataDikdas\\Model\\AnggotaPanitia');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_ang_panitia', 'IdAngPanitia', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_panitia', 'IdPanitia', 'VARCHAR', 'kepanitiaan', 'id_panitia', true, null, null);
        $this->addColumn('nm_ang', 'NmAng', 'VARCHAR', false, 100, null);
        $this->addColumn('no_kontak', 'NoKontak', 'VARCHAR', false, 20, null);
        $this->addColumn('peran_ang', 'PeranAng', 'VARCHAR', true, 30, null);
        $this->addColumn('unsur_ang', 'UnsurAng', 'CHAR', true, 1, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', false, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', false, null, null);
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Kepanitiaan', 'DataDikdas\\Model\\Kepanitiaan', RelationMap::MANY_TO_ONE, array('id_panitia' => 'id_panitia', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // AnggotaPanitiaTableMap
