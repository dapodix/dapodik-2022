<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'prestasi' table.
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
class PrestasiTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.PrestasiTableMap';

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
        $this->setName('prestasi');
        $this->setPhpName('Prestasi');
        $this->setClassname('DataDikdas\\Model\\Prestasi');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('prestasi_id', 'PrestasiId', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_prestasi_id', 'JenisPrestasiId', 'INTEGER', 'ref.jenis_prestasi', 'jenis_prestasi_id', true, null, null);
        $this->addForeignKey('tingkat_prestasi_id', 'TingkatPrestasiId', 'INTEGER', 'ref.tingkat_prestasi', 'tingkat_prestasi_id', true, null, null);
        $this->addForeignKey('peserta_didik_id', 'PesertaDidikId', 'VARCHAR', 'peserta_didik', 'peserta_didik_id', true, null, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 40, null);
        $this->addColumn('tahun_prestasi', 'TahunPrestasi', 'DECIMAL', true, 262144, null);
        $this->addColumn('penyelenggara', 'Penyelenggara', 'VARCHAR', false, 100, null);
        $this->addColumn('peringkat', 'Peringkat', 'INTEGER', false, null, null);
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
        $this->addRelation('JenisPrestasi', 'DataDikdas\\Model\\JenisPrestasi', RelationMap::MANY_TO_ONE, array('jenis_prestasi_id' => 'jenis_prestasi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('TingkatPrestasi', 'DataDikdas\\Model\\TingkatPrestasi', RelationMap::MANY_TO_ONE, array('tingkat_prestasi_id' => 'tingkat_prestasi_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('PesertaDidik', 'DataDikdas\\Model\\PesertaDidik', RelationMap::MANY_TO_ONE, array('peserta_didik_id' => 'peserta_didik_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('VldPrestasi', 'DataDikdas\\Model\\VldPrestasi', RelationMap::ONE_TO_MANY, array('prestasi_id' => 'prestasi_id', ), 'RESTRICT', 'RESTRICT', 'VldPrestasis');
    } // buildRelations()

} // PrestasiTableMap
