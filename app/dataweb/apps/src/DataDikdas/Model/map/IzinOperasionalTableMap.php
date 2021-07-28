<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'izin_operasional' table.
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
class IzinOperasionalTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.IzinOperasionalTableMap';

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
        $this->setName('izin_operasional');
        $this->setPhpName('IzinOperasional');
        $this->setClassname('DataDikdas\\Model\\IzinOperasional');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_izin_operasional', 'IdIzinOperasional', 'VARCHAR', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('lembaga_id', 'LembagaId', 'VARCHAR', 'lembaga_non_sekolah', 'lembaga_id', false, null, null);
        $this->addColumn('sk_izin_operasional', 'SkIzinOperasional', 'VARCHAR', true, 80, null);
        $this->addColumn('tmt_izin_operasional', 'TmtIzinOperasional', 'DATE', true, null, null);
        $this->addColumn('masa_berlaku', 'MasaBerlaku', 'DECIMAL', false, 131072, null);
        $this->addColumn('tst_izin_operasional', 'TstIzinOperasional', 'DATE', false, null, null);
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
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('LembagaNonSekolah', 'DataDikdas\\Model\\LembagaNonSekolah', RelationMap::MANY_TO_ONE, array('lembaga_id' => 'lembaga_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // IzinOperasionalTableMap
