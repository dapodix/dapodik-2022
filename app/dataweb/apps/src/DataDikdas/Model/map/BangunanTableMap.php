<?php

namespace DataDikdas\Model\map;

use \RelationMap;
use \TableMap;


/**
 * This class defines the structure of the 'bangunan' table.
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
class BangunanTableMap extends TableMap
{

    /**
     * The (dot-path) name of this class
     */
    const CLASS_NAME = 'DataDikdas.Model.map.BangunanTableMap';

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
        $this->setName('bangunan');
        $this->setPhpName('Bangunan');
        $this->setClassname('DataDikdas\\Model\\Bangunan');
        $this->setPackage('DataDikdas.Model');
        $this->setUseIdGenerator(false);
        // columns
        $this->addPrimaryKey('id_bangunan', 'IdBangunan', 'VARCHAR', true, null, null);
        $this->addForeignKey('jenis_prasarana_id', 'JenisPrasaranaId', 'INTEGER', 'ref.jenis_prasarana', 'jenis_prasarana_id', true, null, null);
        $this->addForeignKey('sekolah_id', 'SekolahId', 'VARCHAR', 'sekolah', 'sekolah_id', true, null, null);
        $this->addForeignKey('id_tanah', 'IdTanah', 'VARCHAR', 'tanah', 'id_tanah', false, null, null);
        $this->addForeignKey('ptk_id', 'PtkId', 'VARCHAR', 'ptk', 'ptk_id', false, null, null);
        $this->addForeignKey('id_hapus_buku', 'IdHapusBuku', 'CHAR', 'ref.jenis_hapus_buku', 'id_hapus_buku', false, 1, null);
        $this->addForeignKey('kepemilikan_sarpras_id', 'KepemilikanSarprasId', 'DECIMAL', 'ref.status_kepemilikan_sarpras', 'kepemilikan_sarpras_id', true, 65536, null);
        $this->addColumn('kd_kl', 'KdKl', 'CHAR', false, 3, null);
        $this->addColumn('kd_satker', 'KdSatker', 'VARCHAR', false, 20, null);
        $this->addColumn('kd_brg', 'KdBrg', 'VARCHAR', false, 10, null);
        $this->addColumn('nup', 'Nup', 'INTEGER', false, null, null);
        $this->addColumn('kode_eselon1', 'KodeEselon1', 'VARCHAR', false, 2, null);
        $this->addColumn('nama_eselon1', 'NamaEselon1', 'VARCHAR', false, 255, null);
        $this->addColumn('kode_sub_satker', 'KodeSubSatker', 'VARCHAR', false, 3, null);
        $this->addColumn('nama_sub_satker', 'NamaSubSatker', 'VARCHAR', false, 255, null);
        $this->addColumn('nama', 'Nama', 'VARCHAR', true, 100, null);
        $this->addColumn('panjang', 'Panjang', 'DOUBLE', false, null, null);
        $this->addColumn('lebar', 'Lebar', 'DOUBLE', false, null, null);
        $this->addColumn('nilai_perolehan_aset', 'NilaiPerolehanAset', 'DECIMAL', false, 1310722, null);
        $this->addColumn('jml_lantai', 'JmlLantai', 'DECIMAL', true, 196608, 1);
        $this->addColumn('thn_dibangun', 'ThnDibangun', 'DECIMAL', false, 262144, null);
        $this->addColumn('luas_tapak_bangunan', 'LuasTapakBangunan', 'DECIMAL', false, 458753, null);
        $this->addColumn('vol_pondasi_m3', 'VolPondasiM3', 'DECIMAL', false, 458753, null);
        $this->addColumn('vol_sloop_kolom_balok_m3', 'VolSloopKolomBalokM3', 'DECIMAL', false, 458753, null);
        $this->addColumn('panj_kudakuda_m', 'PanjKudakudaM', 'DECIMAL', false, 458753, null);
        $this->addColumn('vol_kudakuda_m3', 'VolKudakudaM3', 'DECIMAL', false, 458753, null);
        $this->addColumn('panj_kaso_m', 'PanjKasoM', 'DECIMAL', false, 458753, null);
        $this->addColumn('panj_reng_m', 'PanjRengM', 'DECIMAL', false, 458753, null);
        $this->addColumn('luas_tutup_atap_m2', 'LuasTutupAtapM2', 'DECIMAL', false, 458753, null);
        $this->addColumn('kd_satker_tanah', 'KdSatkerTanah', 'VARCHAR', false, 255, null);
        $this->addColumn('nm_satker_tanah', 'NmSatkerTanah', 'VARCHAR', false, 255, null);
        $this->addColumn('kd_brg_tanah', 'KdBrgTanah', 'VARCHAR', false, 255, null);
        $this->addColumn('nm_brg_tanah', 'NmBrgTanah', 'VARCHAR', false, 255, null);
        $this->addColumn('nup_brg_tanah', 'NupBrgTanah', 'VARCHAR', false, 255, null);
        $this->addColumn('tgl_sk_pemakai', 'TglSkPemakai', 'DATE', false, null, null);
        $this->addColumn('tgl_hapus_buku', 'TglHapusBuku', 'DATE', false, null, null);
        $this->addColumn('ket_bangunan', 'KetBangunan', 'VARCHAR', false, 250, null);
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
        $this->addRelation('Ptk', 'DataDikdas\\Model\\Ptk', RelationMap::MANY_TO_ONE, array('ptk_id' => 'ptk_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisHapusBuku', 'DataDikdas\\Model\\JenisHapusBuku', RelationMap::MANY_TO_ONE, array('id_hapus_buku' => 'id_hapus_buku', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Tanah', 'DataDikdas\\Model\\Tanah', RelationMap::MANY_TO_ONE, array('id_tanah' => 'id_tanah', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('JenisPrasarana', 'DataDikdas\\Model\\JenisPrasarana', RelationMap::MANY_TO_ONE, array('jenis_prasarana_id' => 'jenis_prasarana_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('Sekolah', 'DataDikdas\\Model\\Sekolah', RelationMap::MANY_TO_ONE, array('sekolah_id' => 'sekolah_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('StatusKepemilikanSarpras', 'DataDikdas\\Model\\StatusKepemilikanSarpras', RelationMap::MANY_TO_ONE, array('kepemilikan_sarpras_id' => 'kepemilikan_sarpras_id', ), 'RESTRICT', 'RESTRICT');
        $this->addRelation('BangunanDariBlockgrant', 'DataDikdas\\Model\\BangunanDariBlockgrant', RelationMap::ONE_TO_MANY, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT', 'BangunanDariBlockgrants');
        $this->addRelation('BangunanLongitudinal', 'DataDikdas\\Model\\BangunanLongitudinal', RelationMap::ONE_TO_MANY, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT', 'BangunanLongitudinals');
        $this->addRelation('Ruang', 'DataDikdas\\Model\\Ruang', RelationMap::ONE_TO_MANY, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT', 'Ruangs');
        $this->addRelation('VldBangunan', 'DataDikdas\\Model\\VldBangunan', RelationMap::ONE_TO_MANY, array('id_bangunan' => 'id_bangunan', ), 'RESTRICT', 'RESTRICT', 'VldBangunans');
    } // buildRelations()

} // BangunanTableMap
