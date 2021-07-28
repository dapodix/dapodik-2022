<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'bantuan_pd' table.
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
class BantuanPdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BantuanPdTableMap';

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
        $this->setName('bantuan_pd');
        $this->setPhpName('BantuanPd');
        $this->setClassname('DataDikdas\\Model\\BantuanPd');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_bantuan_pd', 'IdBantuanPd', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_bantuan_id', 'JenisBantuanId', 'INTEGER', 'ref.jenis_bantuan', 'jenis_bantuan_id', true, null, null);
        $this->addForeignKey('anggota_rombel_id', 'AnggotaRombelId', 'VARCHAR', 'anggota_rombel', 'anggota_rombel_id', true, null, null);
        $this->addColumn('besar_bantuan', 'BesarBantuan', 'DECIMAL', true, 983040, null);
        $this->addColumn('dana_pendamping', 'DanaPendamping', 'DECIMAL', true, 983040, null);
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
        $this->addRelation('AnggotaRombel', 'DataDikdas\\Model\\AnggotaRombel', RelationMap::MANY_TO_ONE, array('anggota_rombel_id' => 'anggota_rombel_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisBantuan', 'DataDikdas\\Model\\JenisBantuan', RelationMap::MANY_TO_ONE, array('jenis_bantuan_id' => 'jenis_bantuan_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // BantuanPdTableMap
