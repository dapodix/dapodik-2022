<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'kelas_ekskul' table.
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
class KelasEkskulTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.KelasEkskulTableMap';

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
        $this->setName('kelas_ekskul');
        $this->setPhpName('KelasEkskul');
        $this->setClassname('DataDikdas\\Model\\KelasEkskul');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_kelas_ekskul', 'IdKelasEkskul', 'VARCHAR', true, null, null);
        $this->addForeignKey('rombongan_belajar_id', 'RombonganBelajarId', 'VARCHAR', 'rombongan_belajar', 'rombongan_belajar_id', true, null, null);
        $this->addForeignKey('id_ekskul', 'IdEkskul', 'INTEGER', 'ref.ekstra_kurikuler', 'id_ekskul', true, null, null);
        $this->addColumn('nm_ekskul', 'NmEkskul', 'VARCHAR', true, 80, null);
        $this->addColumn('sk_ekskul', 'SkEkskul', 'VARCHAR', true, 80, null);
        $this->addColumn('tgl_sk_ekskul', 'TglSkEkskul', 'DATE', false, null, null);
        $this->addColumn('jam_kegiatan_per_minggu', 'JamKegiatanPerMinggu', 'DECIMAL', false, 131072, null);
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
        $this->addRelation('RombonganBelajar', 'DataDikdas\\Model\\RombonganBelajar', RelationMap::MANY_TO_ONE, array('rombongan_belajar_id' => 'rombongan_belajar_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('EkstraKurikuler', 'DataDikdas\\Model\\EkstraKurikuler', RelationMap::MANY_TO_ONE, array('id_ekskul' => 'id_ekskul', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // KelasEkskulTableMap
