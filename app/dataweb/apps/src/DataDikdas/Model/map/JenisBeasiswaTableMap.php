<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.jenis_beasiswa' table.
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
class JenisBeasiswaTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.JenisBeasiswaTableMap';

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
        $this->setName('ref.jenis_beasiswa');
        $this->setPhpName('JenisBeasiswa');
        $this->setClassname('DataDikdas\\Model\\JenisBeasiswa');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('jenis_beasiswa_id', 'JenisBeasiswaId', 'INTEGER', true, null, null);
        $this->addForeignKey('sumber_dana_id', 'SumberDanaId', 'DECIMAL', 'ref.sumber_dana', 'sumber_dana_id', true, 196608, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 50, null);
        $this->addColumn('untuk_pd', 'UntukPd', 'DECIMAL', true, 65536, null);
        $this->addColumn('untuk_ptk', 'UntukPtk', 'DECIMAL', true, 65536, null);
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
        $this->addRelation('SumberDana', 'DataDikdas\\Model\\SumberDana', RelationMap::MANY_TO_ONE, array('sumber_dana_id' => 'sumber_dana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BeasiswaPesertaDidik', 'DataDikdas\\Model\\BeasiswaPesertaDidik', RelationMap::ONE_TO_MANY, array('jenis_beasiswa_id' => 'jenis_beasiswa_id', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPesertaDidiks');
        $this->addRelation('BeasiswaPtk', 'DataDikdas\\Model\\BeasiswaPtk', RelationMap::ONE_TO_MANY, array('jenis_beasiswa_id' => 'jenis_beasiswa_id', ), 'RESTRICT', 'RESTRICT', 'BeasiswaPtks');
    } // buildRelations()

} // JenisBeasiswaTableMap
