<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'akt_pd' table.
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
class AktPdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AktPdTableMap';

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
        $this->setName('akt_pd');
        $this->setPhpName('AktPd');
        $this->setClassname('DataDikdas\\Model\\AktPd');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_akt_pd', 'IdAktPd', 'VARCHAR', true, null, null);
        $this->addForeignKey('mou_id', 'MouId', 'VARCHAR', 'mou', 'mou_id', true, null, null);
        $this->addForeignKey('id_jns_akt_pd', 'IdJnsAktPd', 'DECIMAL', 'ref.jenis_akt_pd', 'id_jns_akt_pd', true, 196608, null);
        $this->addColumn('judul_akt_pd', 'JudulAktPd', 'VARCHAR', true, 500, null);
        $this->addColumn('sk_tugas', 'SkTugas', 'VARCHAR', false, 80, null);
        $this->addColumn('tgl_sk_tugas', 'TglSkTugas', 'DATE', false, null, null);
        $this->addColumn('ket_akt', 'KetAkt', 'LONGVARCHAR', false, null, null);
        $this->addColumn('a_komunal', 'AKomunal', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('Mou', 'DataDikdas\\Model\\Mou', RelationMap::MANY_TO_ONE, array('mou_id' => 'mou_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisAktPd', 'DataDikdas\\Model\\JenisAktPd', RelationMap::MANY_TO_ONE, array('id_jns_akt_pd' => 'id_jns_akt_pd', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('AnggotaAktPd', 'DataDikdas\\Model\\AnggotaAktPd', RelationMap::ONE_TO_MANY, array('id_akt_pd' => 'id_akt_pd', ), 'RESTRICT', 'RESTRICT', 'AnggotaAktPds');
        $this->addRelation('BimbingPd', 'DataDikdas\\Model\\BimbingPd', RelationMap::ONE_TO_MANY, array('id_akt_pd' => 'id_akt_pd', ), 'RESTRICT', 'RESTRICT', 'BimbingPds');
        $this->addRelation('VldAktPd', 'DataDikdas\\Model\\VldAktPd', RelationMap::ONE_TO_MANY, array('id_akt_pd' => 'id_akt_pd', ), 'RESTRICT', 'RESTRICT', 'VldAktPds');
    } // buildRelations()

} // AktPdTableMap
