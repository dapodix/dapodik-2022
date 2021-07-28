<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'ref.errortype' table.
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
class ErrortypeTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.ErrortypeTableMap';

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
        $this->setName('ref.errortype');
        $this->setPhpName('Errortype');
        $this->setClassname('DataDikdas\\Model\\Errortype');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('idtype', 'Idtype', 'INTEGER', true, null, null);
        $this->addColumn('kategori_error', 'KategoriError', 'INTEGER', false, null, null);
        $this->addColumn('keterangan', 'Keterangan', 'VARCHAR', false, 255, null);
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
        $this->addRelation('VldAktPd', 'DataDikdas\\Model\\VldAktPd', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldAktPds');
        $this->addRelation('VldAlat', 'DataDikdas\\Model\\VldAlat', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldAlats');
        $this->addRelation('VldAnak', 'DataDikdas\\Model\\VldAnak', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldAnaks');
        $this->addRelation('VldAngkutan', 'DataDikdas\\Model\\VldAngkutan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldAngkutans');
        $this->addRelation('VldBangunan', 'DataDikdas\\Model\\VldBangunan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldBangunans');
        $this->addRelation('VldBeaPd', 'DataDikdas\\Model\\VldBeaPd', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldBeaPds');
        $this->addRelation('VldBeaPtk', 'DataDikdas\\Model\\VldBeaPtk', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldBeaPtks');
        $this->addRelation('VldBukuPtk', 'DataDikdas\\Model\\VldBukuPtk', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldBukuPtks');
        $this->addRelation('VldDemografi', 'DataDikdas\\Model\\VldDemografi', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldDemografis');
        $this->addRelation('VldDudi', 'DataDikdas\\Model\\VldDudi', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldDudis');
        $this->addRelation('VldInpassing', 'DataDikdas\\Model\\VldInpassing', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldInpassings');
        $this->addRelation('VldJurusanSp', 'DataDikdas\\Model\\VldJurusanSp', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldJurusanSps');
        $this->addRelation('VldKaryaTulis', 'DataDikdas\\Model\\VldKaryaTulis', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldKaryaTuliss');
        $this->addRelation('VldKesejahteraan', 'DataDikdas\\Model\\VldKesejahteraan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldKesejahteraans');
        $this->addRelation('VldMou', 'DataDikdas\\Model\\VldMou', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldMous');
        $this->addRelation('VldNilaiRapor', 'DataDikdas\\Model\\VldNilaiRapor', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldNilaiRapors');
        $this->addRelation('VldNilaiTest', 'DataDikdas\\Model\\VldNilaiTest', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldNilaiTests');
        $this->addRelation('VldNonsekolah', 'DataDikdas\\Model\\VldNonsekolah', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldNonsekolahs');
        $this->addRelation('VldPdLong', 'DataDikdas\\Model\\VldPdLong', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPdLongs');
        $this->addRelation('VldPembelajaran', 'DataDikdas\\Model\\VldPembelajaran', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPembelajarans');
        $this->addRelation('VldPenghargaan', 'DataDikdas\\Model\\VldPenghargaan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPenghargaans');
        $this->addRelation('VldPesertaDidik', 'DataDikdas\\Model\\VldPesertaDidik', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPesertaDidiks');
        $this->addRelation('VldPrestasi', 'DataDikdas\\Model\\VldPrestasi', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPrestasis');
        $this->addRelation('VldPtk', 'DataDikdas\\Model\\VldPtk', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPtks');
        $this->addRelation('VldPtkTerdaftar', 'DataDikdas\\Model\\VldPtkTerdaftar', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldPtkTerdaftars');
        $this->addRelation('VldRegPd', 'DataDikdas\\Model\\VldRegPd', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRegPds');
        $this->addRelation('VldRombel', 'DataDikdas\\Model\\VldRombel', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRombels');
        $this->addRelation('VldRwyFungsional', 'DataDikdas\\Model\\VldRwyFungsional', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwyFungsionals');
        $this->addRelation('VldRwyKepangkatan', 'DataDikdas\\Model\\VldRwyKepangkatan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwyKepangkatans');
        $this->addRelation('VldRwyKerja', 'DataDikdas\\Model\\VldRwyKerja', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwyKerjas');
        $this->addRelation('VldRwyPendFormal', 'DataDikdas\\Model\\VldRwyPendFormal', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwyPendFormals');
        $this->addRelation('VldRwySertifikasi', 'DataDikdas\\Model\\VldRwySertifikasi', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwySertifikasis');
        $this->addRelation('VldRwyStruktural', 'DataDikdas\\Model\\VldRwyStruktural', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldRwyStrukturals');
        $this->addRelation('VldSekolah', 'DataDikdas\\Model\\VldSekolah', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldSekolahs');
        $this->addRelation('VldTanah', 'DataDikdas\\Model\\VldTanah', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldTanahs');
        $this->addRelation('VldTugasTambahan', 'DataDikdas\\Model\\VldTugasTambahan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldTugasTambahans');
        $this->addRelation('VldTunjangan', 'DataDikdas\\Model\\VldTunjangan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldTunjangans');
        $this->addRelation('VldUn', 'DataDikdas\\Model\\VldUn', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldUns');
        $this->addRelation('VldYayasan', 'DataDikdas\\Model\\VldYayasan', RelationMap::ONE_TO_MANY, array('idtype' => 'idtype', ), 'RESTRICT', 'RESTRICT', 'VldYayasans');
    } // buildRelations()

} // ErrortypeTableMap
