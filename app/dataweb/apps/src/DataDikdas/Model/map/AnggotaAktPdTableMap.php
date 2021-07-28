<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'anggota_akt_pd' table.
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
class AnggotaAktPdTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.AnggotaAktPdTableMap';

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
        $this->setName('anggota_akt_pd');
        $this->setPhpName('AnggotaAktPd');
        $this->setClassname('DataDikdas\\Model\\AnggotaAktPd');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_ang_akt_pd', 'IdAngAktPd', 'VARCHAR', true, null, null);
        $this->addForeignKey('id_akt_pd', 'IdAktPd', 'VARCHAR', 'akt_pd', 'id_akt_pd', true, null, null);
        $this->addForeignKey('registrasi_id', 'RegistrasiId', 'VARCHAR', 'registrasi_peserta_didik', 'registrasi_id', true, null, null);
        $this->addColumn('nm_pd', 'NmPd', 'VARCHAR', true, 100, null);
        $this->addColumn('nipd', 'Nipd', 'VARCHAR', true, 24, null);
        $this->addColumn('jns_peran_pd', 'JnsPeranPd', 'CHAR', true, 1, '3');
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
        $this->addRelation('AktPd', 'DataDikdas\\Model\\AktPd', RelationMap::MANY_TO_ONE, array('id_akt_pd' => 'id_akt_pd', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('RegistrasiPesertaDidik', 'DataDikdas\\Model\\RegistrasiPesertaDidik', RelationMap::MANY_TO_ONE, array('registrasi_id' => 'registrasi_id', ), 'RESTRICT', 'RESTRICT');
    } // buildRelations()

} // AnggotaAktPdTableMap
