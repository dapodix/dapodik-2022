<?php

namespace DataDikdas\Model\om;

use \Criteria;
use \Exception;
use \ModelCriteria;
use \ModelJoin;
use \PDO;
use \Propel;
use \PropelCollection;
use \PropelException;
use \PropelObjectCollection;
use \PropelPDO;
use DataDikdas\Model\Agama;
use DataDikdas\Model\Alat;
use DataDikdas\Model\Anak;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\Angkutan;
use DataDikdas\Model\Bangunan;
use DataDikdas\Model\Bank;
use DataDikdas\Model\BeasiswaPtk;
use DataDikdas\Model\BidangSdm;
use DataDikdas\Model\BidangStudi;
use DataDikdas\Model\BimbingPd;
use DataDikdas\Model\BukuPtk;
use DataDikdas\Model\Diklat;
use DataDikdas\Model\Inpassing;
use DataDikdas\Model\JenisPtk;
use DataDikdas\Model\KaryaTulis;
use DataDikdas\Model\KeahlianLaboratorium;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\Kesejahteraan;
use DataDikdas\Model\KitasPtk;
use DataDikdas\Model\LargeObject;
use DataDikdas\Model\LembagaPengangkat;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Negara;
use DataDikdas\Model\NilaiTest;
use DataDikdas\Model\PangkatGolongan;
use DataDikdas\Model\PasporPtk;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\PengawasTerdaftar;
use DataDikdas\Model\Penghargaan;
use DataDikdas\Model\Ptk;
use DataDikdas\Model\PtkBaru;
use DataDikdas\Model\PtkPeer;
use DataDikdas\Model\PtkQuery;
use DataDikdas\Model\PtkTerdaftar;
use DataDikdas\Model\RiwayatGajiBerkala;
use DataDikdas\Model\RombonganBelajar;
use DataDikdas\Model\RwyFungsional;
use DataDikdas\Model\RwyKepangkatan;
use DataDikdas\Model\RwyKerja;
use DataDikdas\Model\RwyPendFormal;
use DataDikdas\Model\RwySertifikasi;
use DataDikdas\Model\RwyStruktural;
use DataDikdas\Model\StatusKeaktifanPegawai;
use DataDikdas\Model\StatusKepegawaian;
use DataDikdas\Model\SumberGaji;
use DataDikdas\Model\TugasTambahan;
use DataDikdas\Model\Tunjangan;
use DataDikdas\Model\VldPtk;

/**
 * Base class that represents a query for the 'ptk' table.
 *
 * 
 *
 * @method PtkQuery orderByPtkId($order = Criteria::ASC) Order by the ptk_id column
 * @method PtkQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PtkQuery orderByNip($order = Criteria::ASC) Order by the nip column
 * @method PtkQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PtkQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method PtkQuery orderByTanggalLahir($order = Criteria::ASC) Order by the tanggal_lahir column
 * @method PtkQuery orderByNik($order = Criteria::ASC) Order by the nik column
 * @method PtkQuery orderByNoKk($order = Criteria::ASC) Order by the no_kk column
 * @method PtkQuery orderByNiyNigk($order = Criteria::ASC) Order by the niy_nigk column
 * @method PtkQuery orderByNuptk($order = Criteria::ASC) Order by the nuptk column
 * @method PtkQuery orderByNrg($order = Criteria::ASC) Order by the nrg column
 * @method PtkQuery orderByNuks($order = Criteria::ASC) Order by the nuks column
 * @method PtkQuery orderByStatusKepegawaianId($order = Criteria::ASC) Order by the status_kepegawaian_id column
 * @method PtkQuery orderByJenisPtkId($order = Criteria::ASC) Order by the jenis_ptk_id column
 * @method PtkQuery orderByPengawasBidangStudiId($order = Criteria::ASC) Order by the pengawas_bidang_studi_id column
 * @method PtkQuery orderByAgamaId($order = Criteria::ASC) Order by the agama_id column
 * @method PtkQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method PtkQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method PtkQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method PtkQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method PtkQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method PtkQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method PtkQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method PtkQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method PtkQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method PtkQuery orderByNoTeleponRumah($order = Criteria::ASC) Order by the no_telepon_rumah column
 * @method PtkQuery orderByNoHp($order = Criteria::ASC) Order by the no_hp column
 * @method PtkQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PtkQuery orderByStatusKeaktifanId($order = Criteria::ASC) Order by the status_keaktifan_id column
 * @method PtkQuery orderBySkCpns($order = Criteria::ASC) Order by the sk_cpns column
 * @method PtkQuery orderByTglCpns($order = Criteria::ASC) Order by the tgl_cpns column
 * @method PtkQuery orderBySkPengangkatan($order = Criteria::ASC) Order by the sk_pengangkatan column
 * @method PtkQuery orderByTmtPengangkatan($order = Criteria::ASC) Order by the tmt_pengangkatan column
 * @method PtkQuery orderByLembagaPengangkatId($order = Criteria::ASC) Order by the lembaga_pengangkat_id column
 * @method PtkQuery orderByPangkatGolonganId($order = Criteria::ASC) Order by the pangkat_golongan_id column
 * @method PtkQuery orderByKeahlianLaboratoriumId($order = Criteria::ASC) Order by the keahlian_laboratorium_id column
 * @method PtkQuery orderBySumberGajiId($order = Criteria::ASC) Order by the sumber_gaji_id column
 * @method PtkQuery orderByNamaIbuKandung($order = Criteria::ASC) Order by the nama_ibu_kandung column
 * @method PtkQuery orderByStatusPerkawinan($order = Criteria::ASC) Order by the status_perkawinan column
 * @method PtkQuery orderByNamaSuamiIstri($order = Criteria::ASC) Order by the nama_suami_istri column
 * @method PtkQuery orderByNipSuamiIstri($order = Criteria::ASC) Order by the nip_suami_istri column
 * @method PtkQuery orderByPekerjaanSuamiIstri($order = Criteria::ASC) Order by the pekerjaan_suami_istri column
 * @method PtkQuery orderByTmtPns($order = Criteria::ASC) Order by the tmt_pns column
 * @method PtkQuery orderBySudahLisensiKepalaSekolah($order = Criteria::ASC) Order by the sudah_lisensi_kepala_sekolah column
 * @method PtkQuery orderByJumlahSekolahBinaan($order = Criteria::ASC) Order by the jumlah_sekolah_binaan column
 * @method PtkQuery orderByPernahDiklatKepengawasan($order = Criteria::ASC) Order by the pernah_diklat_kepengawasan column
 * @method PtkQuery orderByNmWp($order = Criteria::ASC) Order by the nm_wp column
 * @method PtkQuery orderByStatusData($order = Criteria::ASC) Order by the status_data column
 * @method PtkQuery orderByKarpeg($order = Criteria::ASC) Order by the karpeg column
 * @method PtkQuery orderByKarpas($order = Criteria::ASC) Order by the karpas column
 * @method PtkQuery orderByMampuHandleKk($order = Criteria::ASC) Order by the mampu_handle_kk column
 * @method PtkQuery orderByKeahlianBraille($order = Criteria::ASC) Order by the keahlian_braille column
 * @method PtkQuery orderByKeahlianBhsIsyarat($order = Criteria::ASC) Order by the keahlian_bhs_isyarat column
 * @method PtkQuery orderByNpwp($order = Criteria::ASC) Order by the npwp column
 * @method PtkQuery orderByKewarganegaraan($order = Criteria::ASC) Order by the kewarganegaraan column
 * @method PtkQuery orderByIdBank($order = Criteria::ASC) Order by the id_bank column
 * @method PtkQuery orderByRekeningBank($order = Criteria::ASC) Order by the rekening_bank column
 * @method PtkQuery orderByRekeningAtasNama($order = Criteria::ASC) Order by the rekening_atas_nama column
 * @method PtkQuery orderByBlobId($order = Criteria::ASC) Order by the blob_id column
 * @method PtkQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PtkQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PtkQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PtkQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PtkQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PtkQuery groupByPtkId() Group by the ptk_id column
 * @method PtkQuery groupByNama() Group by the nama column
 * @method PtkQuery groupByNip() Group by the nip column
 * @method PtkQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PtkQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method PtkQuery groupByTanggalLahir() Group by the tanggal_lahir column
 * @method PtkQuery groupByNik() Group by the nik column
 * @method PtkQuery groupByNoKk() Group by the no_kk column
 * @method PtkQuery groupByNiyNigk() Group by the niy_nigk column
 * @method PtkQuery groupByNuptk() Group by the nuptk column
 * @method PtkQuery groupByNrg() Group by the nrg column
 * @method PtkQuery groupByNuks() Group by the nuks column
 * @method PtkQuery groupByStatusKepegawaianId() Group by the status_kepegawaian_id column
 * @method PtkQuery groupByJenisPtkId() Group by the jenis_ptk_id column
 * @method PtkQuery groupByPengawasBidangStudiId() Group by the pengawas_bidang_studi_id column
 * @method PtkQuery groupByAgamaId() Group by the agama_id column
 * @method PtkQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method PtkQuery groupByRt() Group by the rt column
 * @method PtkQuery groupByRw() Group by the rw column
 * @method PtkQuery groupByNamaDusun() Group by the nama_dusun column
 * @method PtkQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method PtkQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method PtkQuery groupByKodePos() Group by the kode_pos column
 * @method PtkQuery groupByLintang() Group by the lintang column
 * @method PtkQuery groupByBujur() Group by the bujur column
 * @method PtkQuery groupByNoTeleponRumah() Group by the no_telepon_rumah column
 * @method PtkQuery groupByNoHp() Group by the no_hp column
 * @method PtkQuery groupByEmail() Group by the email column
 * @method PtkQuery groupByStatusKeaktifanId() Group by the status_keaktifan_id column
 * @method PtkQuery groupBySkCpns() Group by the sk_cpns column
 * @method PtkQuery groupByTglCpns() Group by the tgl_cpns column
 * @method PtkQuery groupBySkPengangkatan() Group by the sk_pengangkatan column
 * @method PtkQuery groupByTmtPengangkatan() Group by the tmt_pengangkatan column
 * @method PtkQuery groupByLembagaPengangkatId() Group by the lembaga_pengangkat_id column
 * @method PtkQuery groupByPangkatGolonganId() Group by the pangkat_golongan_id column
 * @method PtkQuery groupByKeahlianLaboratoriumId() Group by the keahlian_laboratorium_id column
 * @method PtkQuery groupBySumberGajiId() Group by the sumber_gaji_id column
 * @method PtkQuery groupByNamaIbuKandung() Group by the nama_ibu_kandung column
 * @method PtkQuery groupByStatusPerkawinan() Group by the status_perkawinan column
 * @method PtkQuery groupByNamaSuamiIstri() Group by the nama_suami_istri column
 * @method PtkQuery groupByNipSuamiIstri() Group by the nip_suami_istri column
 * @method PtkQuery groupByPekerjaanSuamiIstri() Group by the pekerjaan_suami_istri column
 * @method PtkQuery groupByTmtPns() Group by the tmt_pns column
 * @method PtkQuery groupBySudahLisensiKepalaSekolah() Group by the sudah_lisensi_kepala_sekolah column
 * @method PtkQuery groupByJumlahSekolahBinaan() Group by the jumlah_sekolah_binaan column
 * @method PtkQuery groupByPernahDiklatKepengawasan() Group by the pernah_diklat_kepengawasan column
 * @method PtkQuery groupByNmWp() Group by the nm_wp column
 * @method PtkQuery groupByStatusData() Group by the status_data column
 * @method PtkQuery groupByKarpeg() Group by the karpeg column
 * @method PtkQuery groupByKarpas() Group by the karpas column
 * @method PtkQuery groupByMampuHandleKk() Group by the mampu_handle_kk column
 * @method PtkQuery groupByKeahlianBraille() Group by the keahlian_braille column
 * @method PtkQuery groupByKeahlianBhsIsyarat() Group by the keahlian_bhs_isyarat column
 * @method PtkQuery groupByNpwp() Group by the npwp column
 * @method PtkQuery groupByKewarganegaraan() Group by the kewarganegaraan column
 * @method PtkQuery groupByIdBank() Group by the id_bank column
 * @method PtkQuery groupByRekeningBank() Group by the rekening_bank column
 * @method PtkQuery groupByRekeningAtasNama() Group by the rekening_atas_nama column
 * @method PtkQuery groupByBlobId() Group by the blob_id column
 * @method PtkQuery groupByCreateDate() Group by the create_date column
 * @method PtkQuery groupByLastUpdate() Group by the last_update column
 * @method PtkQuery groupBySoftDelete() Group by the soft_delete column
 * @method PtkQuery groupByLastSync() Group by the last_sync column
 * @method PtkQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PtkQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PtkQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PtkQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PtkQuery leftJoinNegara($relationAlias = null) Adds a LEFT JOIN clause to the query using the Negara relation
 * @method PtkQuery rightJoinNegara($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Negara relation
 * @method PtkQuery innerJoinNegara($relationAlias = null) Adds a INNER JOIN clause to the query using the Negara relation
 *
 * @method PtkQuery leftJoinBank($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bank relation
 * @method PtkQuery rightJoinBank($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bank relation
 * @method PtkQuery innerJoinBank($relationAlias = null) Adds a INNER JOIN clause to the query using the Bank relation
 *
 * @method PtkQuery leftJoinLargeObject($relationAlias = null) Adds a LEFT JOIN clause to the query using the LargeObject relation
 * @method PtkQuery rightJoinLargeObject($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LargeObject relation
 * @method PtkQuery innerJoinLargeObject($relationAlias = null) Adds a INNER JOIN clause to the query using the LargeObject relation
 *
 * @method PtkQuery leftJoinJenisPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisPtk relation
 * @method PtkQuery rightJoinJenisPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisPtk relation
 * @method PtkQuery innerJoinJenisPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisPtk relation
 *
 * @method PtkQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method PtkQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method PtkQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method PtkQuery leftJoinKebutuhanKhusus($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhusus relation
 * @method PtkQuery rightJoinKebutuhanKhusus($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhusus relation
 * @method PtkQuery innerJoinKebutuhanKhusus($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhusus relation
 *
 * @method PtkQuery leftJoinLembagaPengangkat($relationAlias = null) Adds a LEFT JOIN clause to the query using the LembagaPengangkat relation
 * @method PtkQuery rightJoinLembagaPengangkat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the LembagaPengangkat relation
 * @method PtkQuery innerJoinLembagaPengangkat($relationAlias = null) Adds a INNER JOIN clause to the query using the LembagaPengangkat relation
 *
 * @method PtkQuery leftJoinStatusKeaktifanPegawai($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKeaktifanPegawai relation
 * @method PtkQuery rightJoinStatusKeaktifanPegawai($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKeaktifanPegawai relation
 * @method PtkQuery innerJoinStatusKeaktifanPegawai($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKeaktifanPegawai relation
 *
 * @method PtkQuery leftJoinSumberGaji($relationAlias = null) Adds a LEFT JOIN clause to the query using the SumberGaji relation
 * @method PtkQuery rightJoinSumberGaji($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SumberGaji relation
 * @method PtkQuery innerJoinSumberGaji($relationAlias = null) Adds a INNER JOIN clause to the query using the SumberGaji relation
 *
 * @method PtkQuery leftJoinPangkatGolongan($relationAlias = null) Adds a LEFT JOIN clause to the query using the PangkatGolongan relation
 * @method PtkQuery rightJoinPangkatGolongan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PangkatGolongan relation
 * @method PtkQuery innerJoinPangkatGolongan($relationAlias = null) Adds a INNER JOIN clause to the query using the PangkatGolongan relation
 *
 * @method PtkQuery leftJoinBidangStudi($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangStudi relation
 * @method PtkQuery rightJoinBidangStudi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangStudi relation
 * @method PtkQuery innerJoinBidangStudi($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangStudi relation
 *
 * @method PtkQuery leftJoinKeahlianLaboratorium($relationAlias = null) Adds a LEFT JOIN clause to the query using the KeahlianLaboratorium relation
 * @method PtkQuery rightJoinKeahlianLaboratorium($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KeahlianLaboratorium relation
 * @method PtkQuery innerJoinKeahlianLaboratorium($relationAlias = null) Adds a INNER JOIN clause to the query using the KeahlianLaboratorium relation
 *
 * @method PtkQuery leftJoinPekerjaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Pekerjaan relation
 * @method PtkQuery rightJoinPekerjaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Pekerjaan relation
 * @method PtkQuery innerJoinPekerjaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Pekerjaan relation
 *
 * @method PtkQuery leftJoinAgama($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agama relation
 * @method PtkQuery rightJoinAgama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agama relation
 * @method PtkQuery innerJoinAgama($relationAlias = null) Adds a INNER JOIN clause to the query using the Agama relation
 *
 * @method PtkQuery leftJoinStatusKepegawaian($relationAlias = null) Adds a LEFT JOIN clause to the query using the StatusKepegawaian relation
 * @method PtkQuery rightJoinStatusKepegawaian($relationAlias = null) Adds a RIGHT JOIN clause to the query using the StatusKepegawaian relation
 * @method PtkQuery innerJoinStatusKepegawaian($relationAlias = null) Adds a INNER JOIN clause to the query using the StatusKepegawaian relation
 *
 * @method PtkQuery leftJoinAlat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Alat relation
 * @method PtkQuery rightJoinAlat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Alat relation
 * @method PtkQuery innerJoinAlat($relationAlias = null) Adds a INNER JOIN clause to the query using the Alat relation
 *
 * @method PtkQuery leftJoinAnak($relationAlias = null) Adds a LEFT JOIN clause to the query using the Anak relation
 * @method PtkQuery rightJoinAnak($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Anak relation
 * @method PtkQuery innerJoinAnak($relationAlias = null) Adds a INNER JOIN clause to the query using the Anak relation
 *
 * @method PtkQuery leftJoinAnggotaPanitia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaPanitia relation
 * @method PtkQuery rightJoinAnggotaPanitia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaPanitia relation
 * @method PtkQuery innerJoinAnggotaPanitia($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaPanitia relation
 *
 * @method PtkQuery leftJoinAngkutan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Angkutan relation
 * @method PtkQuery rightJoinAngkutan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Angkutan relation
 * @method PtkQuery innerJoinAngkutan($relationAlias = null) Adds a INNER JOIN clause to the query using the Angkutan relation
 *
 * @method PtkQuery leftJoinBangunan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bangunan relation
 * @method PtkQuery rightJoinBangunan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bangunan relation
 * @method PtkQuery innerJoinBangunan($relationAlias = null) Adds a INNER JOIN clause to the query using the Bangunan relation
 *
 * @method PtkQuery leftJoinBeasiswaPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPtk relation
 * @method PtkQuery rightJoinBeasiswaPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPtk relation
 * @method PtkQuery innerJoinBeasiswaPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPtk relation
 *
 * @method PtkQuery leftJoinBidangSdm($relationAlias = null) Adds a LEFT JOIN clause to the query using the BidangSdm relation
 * @method PtkQuery rightJoinBidangSdm($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BidangSdm relation
 * @method PtkQuery innerJoinBidangSdm($relationAlias = null) Adds a INNER JOIN clause to the query using the BidangSdm relation
 *
 * @method PtkQuery leftJoinBimbingPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the BimbingPd relation
 * @method PtkQuery rightJoinBimbingPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BimbingPd relation
 * @method PtkQuery innerJoinBimbingPd($relationAlias = null) Adds a INNER JOIN clause to the query using the BimbingPd relation
 *
 * @method PtkQuery leftJoinBukuPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the BukuPtk relation
 * @method PtkQuery rightJoinBukuPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BukuPtk relation
 * @method PtkQuery innerJoinBukuPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the BukuPtk relation
 *
 * @method PtkQuery leftJoinDiklat($relationAlias = null) Adds a LEFT JOIN clause to the query using the Diklat relation
 * @method PtkQuery rightJoinDiklat($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Diklat relation
 * @method PtkQuery innerJoinDiklat($relationAlias = null) Adds a INNER JOIN clause to the query using the Diklat relation
 *
 * @method PtkQuery leftJoinInpassing($relationAlias = null) Adds a LEFT JOIN clause to the query using the Inpassing relation
 * @method PtkQuery rightJoinInpassing($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Inpassing relation
 * @method PtkQuery innerJoinInpassing($relationAlias = null) Adds a INNER JOIN clause to the query using the Inpassing relation
 *
 * @method PtkQuery leftJoinKaryaTulis($relationAlias = null) Adds a LEFT JOIN clause to the query using the KaryaTulis relation
 * @method PtkQuery rightJoinKaryaTulis($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KaryaTulis relation
 * @method PtkQuery innerJoinKaryaTulis($relationAlias = null) Adds a INNER JOIN clause to the query using the KaryaTulis relation
 *
 * @method PtkQuery leftJoinKesejahteraan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Kesejahteraan relation
 * @method PtkQuery rightJoinKesejahteraan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Kesejahteraan relation
 * @method PtkQuery innerJoinKesejahteraan($relationAlias = null) Adds a INNER JOIN clause to the query using the Kesejahteraan relation
 *
 * @method PtkQuery leftJoinKitasPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the KitasPtk relation
 * @method PtkQuery rightJoinKitasPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KitasPtk relation
 * @method PtkQuery innerJoinKitasPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the KitasPtk relation
 *
 * @method PtkQuery leftJoinNilaiTest($relationAlias = null) Adds a LEFT JOIN clause to the query using the NilaiTest relation
 * @method PtkQuery rightJoinNilaiTest($relationAlias = null) Adds a RIGHT JOIN clause to the query using the NilaiTest relation
 * @method PtkQuery innerJoinNilaiTest($relationAlias = null) Adds a INNER JOIN clause to the query using the NilaiTest relation
 *
 * @method PtkQuery leftJoinPasporPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the PasporPtk relation
 * @method PtkQuery rightJoinPasporPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PasporPtk relation
 * @method PtkQuery innerJoinPasporPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the PasporPtk relation
 *
 * @method PtkQuery leftJoinPengawasTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PengawasTerdaftar relation
 * @method PtkQuery rightJoinPengawasTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PengawasTerdaftar relation
 * @method PtkQuery innerJoinPengawasTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PengawasTerdaftar relation
 *
 * @method PtkQuery leftJoinPenghargaan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Penghargaan relation
 * @method PtkQuery rightJoinPenghargaan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Penghargaan relation
 * @method PtkQuery innerJoinPenghargaan($relationAlias = null) Adds a INNER JOIN clause to the query using the Penghargaan relation
 *
 * @method PtkQuery leftJoinPtkBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkBaru relation
 * @method PtkQuery rightJoinPtkBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkBaru relation
 * @method PtkQuery innerJoinPtkBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkBaru relation
 *
 * @method PtkQuery leftJoinPtkTerdaftar($relationAlias = null) Adds a LEFT JOIN clause to the query using the PtkTerdaftar relation
 * @method PtkQuery rightJoinPtkTerdaftar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PtkTerdaftar relation
 * @method PtkQuery innerJoinPtkTerdaftar($relationAlias = null) Adds a INNER JOIN clause to the query using the PtkTerdaftar relation
 *
 * @method PtkQuery leftJoinRiwayatGajiBerkala($relationAlias = null) Adds a LEFT JOIN clause to the query using the RiwayatGajiBerkala relation
 * @method PtkQuery rightJoinRiwayatGajiBerkala($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RiwayatGajiBerkala relation
 * @method PtkQuery innerJoinRiwayatGajiBerkala($relationAlias = null) Adds a INNER JOIN clause to the query using the RiwayatGajiBerkala relation
 *
 * @method PtkQuery leftJoinRombonganBelajar($relationAlias = null) Adds a LEFT JOIN clause to the query using the RombonganBelajar relation
 * @method PtkQuery rightJoinRombonganBelajar($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RombonganBelajar relation
 * @method PtkQuery innerJoinRombonganBelajar($relationAlias = null) Adds a INNER JOIN clause to the query using the RombonganBelajar relation
 *
 * @method PtkQuery leftJoinRwyFungsional($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyFungsional relation
 * @method PtkQuery rightJoinRwyFungsional($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyFungsional relation
 * @method PtkQuery innerJoinRwyFungsional($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyFungsional relation
 *
 * @method PtkQuery leftJoinRwyKepangkatan($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKepangkatan relation
 * @method PtkQuery rightJoinRwyKepangkatan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKepangkatan relation
 * @method PtkQuery innerJoinRwyKepangkatan($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKepangkatan relation
 *
 * @method PtkQuery leftJoinRwyKerja($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyKerja relation
 * @method PtkQuery rightJoinRwyKerja($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyKerja relation
 * @method PtkQuery innerJoinRwyKerja($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyKerja relation
 *
 * @method PtkQuery leftJoinRwyPendFormal($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyPendFormal relation
 * @method PtkQuery rightJoinRwyPendFormal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyPendFormal relation
 * @method PtkQuery innerJoinRwyPendFormal($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyPendFormal relation
 *
 * @method PtkQuery leftJoinRwySertifikasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwySertifikasi relation
 * @method PtkQuery rightJoinRwySertifikasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwySertifikasi relation
 * @method PtkQuery innerJoinRwySertifikasi($relationAlias = null) Adds a INNER JOIN clause to the query using the RwySertifikasi relation
 *
 * @method PtkQuery leftJoinRwyStruktural($relationAlias = null) Adds a LEFT JOIN clause to the query using the RwyStruktural relation
 * @method PtkQuery rightJoinRwyStruktural($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RwyStruktural relation
 * @method PtkQuery innerJoinRwyStruktural($relationAlias = null) Adds a INNER JOIN clause to the query using the RwyStruktural relation
 *
 * @method PtkQuery leftJoinTugasTambahan($relationAlias = null) Adds a LEFT JOIN clause to the query using the TugasTambahan relation
 * @method PtkQuery rightJoinTugasTambahan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the TugasTambahan relation
 * @method PtkQuery innerJoinTugasTambahan($relationAlias = null) Adds a INNER JOIN clause to the query using the TugasTambahan relation
 *
 * @method PtkQuery leftJoinTunjangan($relationAlias = null) Adds a LEFT JOIN clause to the query using the Tunjangan relation
 * @method PtkQuery rightJoinTunjangan($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Tunjangan relation
 * @method PtkQuery innerJoinTunjangan($relationAlias = null) Adds a INNER JOIN clause to the query using the Tunjangan relation
 *
 * @method PtkQuery leftJoinVldPtk($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPtk relation
 * @method PtkQuery rightJoinVldPtk($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPtk relation
 * @method PtkQuery innerJoinVldPtk($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPtk relation
 *
 * @method Ptk findOne(PropelPDO $con = null) Return the first Ptk matching the query
 * @method Ptk findOneOrCreate(PropelPDO $con = null) Return the first Ptk matching the query, or a new Ptk object populated from the query conditions when no match is found
 *
 * @method Ptk findOneByNama(string $nama) Return the first Ptk filtered by the nama column
 * @method Ptk findOneByNip(string $nip) Return the first Ptk filtered by the nip column
 * @method Ptk findOneByJenisKelamin(string $jenis_kelamin) Return the first Ptk filtered by the jenis_kelamin column
 * @method Ptk findOneByTempatLahir(string $tempat_lahir) Return the first Ptk filtered by the tempat_lahir column
 * @method Ptk findOneByTanggalLahir(string $tanggal_lahir) Return the first Ptk filtered by the tanggal_lahir column
 * @method Ptk findOneByNik(string $nik) Return the first Ptk filtered by the nik column
 * @method Ptk findOneByNoKk(string $no_kk) Return the first Ptk filtered by the no_kk column
 * @method Ptk findOneByNiyNigk(string $niy_nigk) Return the first Ptk filtered by the niy_nigk column
 * @method Ptk findOneByNuptk(string $nuptk) Return the first Ptk filtered by the nuptk column
 * @method Ptk findOneByNrg(string $nrg) Return the first Ptk filtered by the nrg column
 * @method Ptk findOneByNuks(string $nuks) Return the first Ptk filtered by the nuks column
 * @method Ptk findOneByStatusKepegawaianId(int $status_kepegawaian_id) Return the first Ptk filtered by the status_kepegawaian_id column
 * @method Ptk findOneByJenisPtkId(string $jenis_ptk_id) Return the first Ptk filtered by the jenis_ptk_id column
 * @method Ptk findOneByPengawasBidangStudiId(int $pengawas_bidang_studi_id) Return the first Ptk filtered by the pengawas_bidang_studi_id column
 * @method Ptk findOneByAgamaId(int $agama_id) Return the first Ptk filtered by the agama_id column
 * @method Ptk findOneByAlamatJalan(string $alamat_jalan) Return the first Ptk filtered by the alamat_jalan column
 * @method Ptk findOneByRt(string $rt) Return the first Ptk filtered by the rt column
 * @method Ptk findOneByRw(string $rw) Return the first Ptk filtered by the rw column
 * @method Ptk findOneByNamaDusun(string $nama_dusun) Return the first Ptk filtered by the nama_dusun column
 * @method Ptk findOneByDesaKelurahan(string $desa_kelurahan) Return the first Ptk filtered by the desa_kelurahan column
 * @method Ptk findOneByKodeWilayah(string $kode_wilayah) Return the first Ptk filtered by the kode_wilayah column
 * @method Ptk findOneByKodePos(string $kode_pos) Return the first Ptk filtered by the kode_pos column
 * @method Ptk findOneByLintang(string $lintang) Return the first Ptk filtered by the lintang column
 * @method Ptk findOneByBujur(string $bujur) Return the first Ptk filtered by the bujur column
 * @method Ptk findOneByNoTeleponRumah(string $no_telepon_rumah) Return the first Ptk filtered by the no_telepon_rumah column
 * @method Ptk findOneByNoHp(string $no_hp) Return the first Ptk filtered by the no_hp column
 * @method Ptk findOneByEmail(string $email) Return the first Ptk filtered by the email column
 * @method Ptk findOneByStatusKeaktifanId(string $status_keaktifan_id) Return the first Ptk filtered by the status_keaktifan_id column
 * @method Ptk findOneBySkCpns(string $sk_cpns) Return the first Ptk filtered by the sk_cpns column
 * @method Ptk findOneByTglCpns(string $tgl_cpns) Return the first Ptk filtered by the tgl_cpns column
 * @method Ptk findOneBySkPengangkatan(string $sk_pengangkatan) Return the first Ptk filtered by the sk_pengangkatan column
 * @method Ptk findOneByTmtPengangkatan(string $tmt_pengangkatan) Return the first Ptk filtered by the tmt_pengangkatan column
 * @method Ptk findOneByLembagaPengangkatId(string $lembaga_pengangkat_id) Return the first Ptk filtered by the lembaga_pengangkat_id column
 * @method Ptk findOneByPangkatGolonganId(string $pangkat_golongan_id) Return the first Ptk filtered by the pangkat_golongan_id column
 * @method Ptk findOneByKeahlianLaboratoriumId(int $keahlian_laboratorium_id) Return the first Ptk filtered by the keahlian_laboratorium_id column
 * @method Ptk findOneBySumberGajiId(string $sumber_gaji_id) Return the first Ptk filtered by the sumber_gaji_id column
 * @method Ptk findOneByNamaIbuKandung(string $nama_ibu_kandung) Return the first Ptk filtered by the nama_ibu_kandung column
 * @method Ptk findOneByStatusPerkawinan(string $status_perkawinan) Return the first Ptk filtered by the status_perkawinan column
 * @method Ptk findOneByNamaSuamiIstri(string $nama_suami_istri) Return the first Ptk filtered by the nama_suami_istri column
 * @method Ptk findOneByNipSuamiIstri(string $nip_suami_istri) Return the first Ptk filtered by the nip_suami_istri column
 * @method Ptk findOneByPekerjaanSuamiIstri(int $pekerjaan_suami_istri) Return the first Ptk filtered by the pekerjaan_suami_istri column
 * @method Ptk findOneByTmtPns(string $tmt_pns) Return the first Ptk filtered by the tmt_pns column
 * @method Ptk findOneBySudahLisensiKepalaSekolah(string $sudah_lisensi_kepala_sekolah) Return the first Ptk filtered by the sudah_lisensi_kepala_sekolah column
 * @method Ptk findOneByJumlahSekolahBinaan(int $jumlah_sekolah_binaan) Return the first Ptk filtered by the jumlah_sekolah_binaan column
 * @method Ptk findOneByPernahDiklatKepengawasan(string $pernah_diklat_kepengawasan) Return the first Ptk filtered by the pernah_diklat_kepengawasan column
 * @method Ptk findOneByNmWp(string $nm_wp) Return the first Ptk filtered by the nm_wp column
 * @method Ptk findOneByStatusData(int $status_data) Return the first Ptk filtered by the status_data column
 * @method Ptk findOneByKarpeg(string $karpeg) Return the first Ptk filtered by the karpeg column
 * @method Ptk findOneByKarpas(string $karpas) Return the first Ptk filtered by the karpas column
 * @method Ptk findOneByMampuHandleKk(int $mampu_handle_kk) Return the first Ptk filtered by the mampu_handle_kk column
 * @method Ptk findOneByKeahlianBraille(string $keahlian_braille) Return the first Ptk filtered by the keahlian_braille column
 * @method Ptk findOneByKeahlianBhsIsyarat(string $keahlian_bhs_isyarat) Return the first Ptk filtered by the keahlian_bhs_isyarat column
 * @method Ptk findOneByNpwp(string $npwp) Return the first Ptk filtered by the npwp column
 * @method Ptk findOneByKewarganegaraan(string $kewarganegaraan) Return the first Ptk filtered by the kewarganegaraan column
 * @method Ptk findOneByIdBank(string $id_bank) Return the first Ptk filtered by the id_bank column
 * @method Ptk findOneByRekeningBank(string $rekening_bank) Return the first Ptk filtered by the rekening_bank column
 * @method Ptk findOneByRekeningAtasNama(string $rekening_atas_nama) Return the first Ptk filtered by the rekening_atas_nama column
 * @method Ptk findOneByBlobId(string $blob_id) Return the first Ptk filtered by the blob_id column
 * @method Ptk findOneByCreateDate(string $create_date) Return the first Ptk filtered by the create_date column
 * @method Ptk findOneByLastUpdate(string $last_update) Return the first Ptk filtered by the last_update column
 * @method Ptk findOneBySoftDelete(string $soft_delete) Return the first Ptk filtered by the soft_delete column
 * @method Ptk findOneByLastSync(string $last_sync) Return the first Ptk filtered by the last_sync column
 * @method Ptk findOneByUpdaterId(string $updater_id) Return the first Ptk filtered by the updater_id column
 *
 * @method array findByPtkId(string $ptk_id) Return Ptk objects filtered by the ptk_id column
 * @method array findByNama(string $nama) Return Ptk objects filtered by the nama column
 * @method array findByNip(string $nip) Return Ptk objects filtered by the nip column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return Ptk objects filtered by the jenis_kelamin column
 * @method array findByTempatLahir(string $tempat_lahir) Return Ptk objects filtered by the tempat_lahir column
 * @method array findByTanggalLahir(string $tanggal_lahir) Return Ptk objects filtered by the tanggal_lahir column
 * @method array findByNik(string $nik) Return Ptk objects filtered by the nik column
 * @method array findByNoKk(string $no_kk) Return Ptk objects filtered by the no_kk column
 * @method array findByNiyNigk(string $niy_nigk) Return Ptk objects filtered by the niy_nigk column
 * @method array findByNuptk(string $nuptk) Return Ptk objects filtered by the nuptk column
 * @method array findByNrg(string $nrg) Return Ptk objects filtered by the nrg column
 * @method array findByNuks(string $nuks) Return Ptk objects filtered by the nuks column
 * @method array findByStatusKepegawaianId(int $status_kepegawaian_id) Return Ptk objects filtered by the status_kepegawaian_id column
 * @method array findByJenisPtkId(string $jenis_ptk_id) Return Ptk objects filtered by the jenis_ptk_id column
 * @method array findByPengawasBidangStudiId(int $pengawas_bidang_studi_id) Return Ptk objects filtered by the pengawas_bidang_studi_id column
 * @method array findByAgamaId(int $agama_id) Return Ptk objects filtered by the agama_id column
 * @method array findByAlamatJalan(string $alamat_jalan) Return Ptk objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return Ptk objects filtered by the rt column
 * @method array findByRw(string $rw) Return Ptk objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return Ptk objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return Ptk objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return Ptk objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return Ptk objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return Ptk objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return Ptk objects filtered by the bujur column
 * @method array findByNoTeleponRumah(string $no_telepon_rumah) Return Ptk objects filtered by the no_telepon_rumah column
 * @method array findByNoHp(string $no_hp) Return Ptk objects filtered by the no_hp column
 * @method array findByEmail(string $email) Return Ptk objects filtered by the email column
 * @method array findByStatusKeaktifanId(string $status_keaktifan_id) Return Ptk objects filtered by the status_keaktifan_id column
 * @method array findBySkCpns(string $sk_cpns) Return Ptk objects filtered by the sk_cpns column
 * @method array findByTglCpns(string $tgl_cpns) Return Ptk objects filtered by the tgl_cpns column
 * @method array findBySkPengangkatan(string $sk_pengangkatan) Return Ptk objects filtered by the sk_pengangkatan column
 * @method array findByTmtPengangkatan(string $tmt_pengangkatan) Return Ptk objects filtered by the tmt_pengangkatan column
 * @method array findByLembagaPengangkatId(string $lembaga_pengangkat_id) Return Ptk objects filtered by the lembaga_pengangkat_id column
 * @method array findByPangkatGolonganId(string $pangkat_golongan_id) Return Ptk objects filtered by the pangkat_golongan_id column
 * @method array findByKeahlianLaboratoriumId(int $keahlian_laboratorium_id) Return Ptk objects filtered by the keahlian_laboratorium_id column
 * @method array findBySumberGajiId(string $sumber_gaji_id) Return Ptk objects filtered by the sumber_gaji_id column
 * @method array findByNamaIbuKandung(string $nama_ibu_kandung) Return Ptk objects filtered by the nama_ibu_kandung column
 * @method array findByStatusPerkawinan(string $status_perkawinan) Return Ptk objects filtered by the status_perkawinan column
 * @method array findByNamaSuamiIstri(string $nama_suami_istri) Return Ptk objects filtered by the nama_suami_istri column
 * @method array findByNipSuamiIstri(string $nip_suami_istri) Return Ptk objects filtered by the nip_suami_istri column
 * @method array findByPekerjaanSuamiIstri(int $pekerjaan_suami_istri) Return Ptk objects filtered by the pekerjaan_suami_istri column
 * @method array findByTmtPns(string $tmt_pns) Return Ptk objects filtered by the tmt_pns column
 * @method array findBySudahLisensiKepalaSekolah(string $sudah_lisensi_kepala_sekolah) Return Ptk objects filtered by the sudah_lisensi_kepala_sekolah column
 * @method array findByJumlahSekolahBinaan(int $jumlah_sekolah_binaan) Return Ptk objects filtered by the jumlah_sekolah_binaan column
 * @method array findByPernahDiklatKepengawasan(string $pernah_diklat_kepengawasan) Return Ptk objects filtered by the pernah_diklat_kepengawasan column
 * @method array findByNmWp(string $nm_wp) Return Ptk objects filtered by the nm_wp column
 * @method array findByStatusData(int $status_data) Return Ptk objects filtered by the status_data column
 * @method array findByKarpeg(string $karpeg) Return Ptk objects filtered by the karpeg column
 * @method array findByKarpas(string $karpas) Return Ptk objects filtered by the karpas column
 * @method array findByMampuHandleKk(int $mampu_handle_kk) Return Ptk objects filtered by the mampu_handle_kk column
 * @method array findByKeahlianBraille(string $keahlian_braille) Return Ptk objects filtered by the keahlian_braille column
 * @method array findByKeahlianBhsIsyarat(string $keahlian_bhs_isyarat) Return Ptk objects filtered by the keahlian_bhs_isyarat column
 * @method array findByNpwp(string $npwp) Return Ptk objects filtered by the npwp column
 * @method array findByKewarganegaraan(string $kewarganegaraan) Return Ptk objects filtered by the kewarganegaraan column
 * @method array findByIdBank(string $id_bank) Return Ptk objects filtered by the id_bank column
 * @method array findByRekeningBank(string $rekening_bank) Return Ptk objects filtered by the rekening_bank column
 * @method array findByRekeningAtasNama(string $rekening_atas_nama) Return Ptk objects filtered by the rekening_atas_nama column
 * @method array findByBlobId(string $blob_id) Return Ptk objects filtered by the blob_id column
 * @method array findByCreateDate(string $create_date) Return Ptk objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return Ptk objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return Ptk objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return Ptk objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return Ptk objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePtkQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePtkQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\Ptk', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PtkQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PtkQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PtkQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PtkQuery) {
            return $criteria;
        }
        $query = new PtkQuery();
        if (null !== $modelAlias) {
            $query->setModelAlias($modelAlias);
        }
        if ($criteria instanceof Criteria) {
            $query->mergeWith($criteria);
        }

        return $query;
    }

    /**
     * Find object by primary key.
     * Propel uses the instance pool to skip the database if the object exists.
     * Go fast if the query is untouched.
     *
     * <code>
     * $obj  = $c->findPk(12, $con);
     * </code>
     *
     * @param mixed $key Primary key to use for the query 
     * @param     PropelPDO $con an optional connection object
     *
     * @return   Ptk|Ptk[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PtkPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PtkPeer::DATABASE_NAME, Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        if ($this->formatter || $this->modelAlias || $this->with || $this->select
         || $this->selectColumns || $this->asColumns || $this->selectModifiers
         || $this->map || $this->having || $this->joins) {
            return $this->findPkComplex($key, $con);
        } else {
            return $this->findPkSimple($key, $con);
        }
    }

    /**
     * Alias of findPk to use instance pooling
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Ptk A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPtkId($key, $con = null)
     {
        return $this->findPk($key, $con);
     }

    /**
     * Find object by primary key using raw SQL to go fast.
     * Bypass doSelect() and the object formatter by using generated code.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return                 Ptk A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "ptk_id", "nama", "nip", "jenis_kelamin", "tempat_lahir", "tanggal_lahir", "nik", "no_kk", "niy_nigk", "nuptk", "nrg", "nuks", "status_kepegawaian_id", "jenis_ptk_id", "pengawas_bidang_studi_id", "agama_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "no_telepon_rumah", "no_hp", "email", "status_keaktifan_id", "sk_cpns", "tgl_cpns", "sk_pengangkatan", "tmt_pengangkatan", "lembaga_pengangkat_id", "pangkat_golongan_id", "keahlian_laboratorium_id", "sumber_gaji_id", "nama_ibu_kandung", "status_perkawinan", "nama_suami_istri", "nip_suami_istri", "pekerjaan_suami_istri", "tmt_pns", "sudah_lisensi_kepala_sekolah", "jumlah_sekolah_binaan", "pernah_diklat_kepengawasan", "nm_wp", "status_data", "karpeg", "karpas", "mampu_handle_kk", "keahlian_braille", "keahlian_bhs_isyarat", "npwp", "kewarganegaraan", "id_bank", "rekening_bank", "rekening_atas_nama", "blob_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "ptk" WHERE "ptk_id" = :p0';
        try {
            $stmt = $con->prepare($sql);			
            $stmt->bindValue(':p0', $key, PDO::PARAM_STR);
            $stmt->execute();
        } catch (Exception $e) {
            Propel::log($e->getMessage(), Propel::LOG_ERR);
            throw new PropelException(sprintf('Unable to execute SELECT statement [%s]', $sql), $e);
        }
        $obj = null;
        if ($row = $stmt->fetch(PDO::FETCH_NUM)) {
            $obj = new Ptk();
            $obj->hydrate($row);
            PtkPeer::addInstanceToPool($obj, (string) $key);
        }
        $stmt->closeCursor();

        return $obj;
    }

    /**
     * Find object by primary key.
     *
     * @param     mixed $key Primary key to use for the query
     * @param     PropelPDO $con A connection object
     *
     * @return Ptk|Ptk[]|mixed the result, formatted by the current formatter
     */
    protected function findPkComplex($key, $con)
    {
        // As the query uses a PK condition, no limit(1) is necessary.
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKey($key)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->formatOne($stmt);
    }

    /**
     * Find objects by primary key
     * <code>
     * $objs = $c->findPks(array(12, 56, 832), $con);
     * </code>
     * @param     array $keys Primary keys to use for the query
     * @param     PropelPDO $con an optional connection object
     *
     * @return PropelObjectCollection|Ptk[]|mixed the list of results, formatted by the current formatter
     */
    public function findPks($keys, $con = null)
    {
        if ($con === null) {
            $con = Propel::getConnection($this->getDbName(), Propel::CONNECTION_READ);
        }
        $this->basePreSelect($con);
        $criteria = $this->isKeepQuery() ? clone $this : $this;
        $stmt = $criteria
            ->filterByPrimaryKeys($keys)
            ->doSelect($con);

        return $criteria->getFormatter()->init($criteria)->format($stmt);
    }

    /**
     * Filter the query by primary key
     *
     * @param     mixed $key Primary key to use for the query
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PtkPeer::PTK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PtkPeer::PTK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPtkId('fooValue');   // WHERE ptk_id = 'fooValue'
     * $query->filterByPtkId('%fooValue%'); // WHERE ptk_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $ptkId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPtkId($ptkId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($ptkId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $ptkId)) {
                $ptkId = str_replace('*', '%', $ptkId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::PTK_ID, $ptkId, $comparison);
    }

    /**
     * Filter the query on the nama column
     *
     * Example usage:
     * <code>
     * $query->filterByNama('fooValue');   // WHERE nama = 'fooValue'
     * $query->filterByNama('%fooValue%'); // WHERE nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNama($nama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nama)) {
                $nama = str_replace('*', '%', $nama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NAMA, $nama, $comparison);
    }

    /**
     * Filter the query on the nip column
     *
     * Example usage:
     * <code>
     * $query->filterByNip('fooValue');   // WHERE nip = 'fooValue'
     * $query->filterByNip('%fooValue%'); // WHERE nip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNip($nip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nip)) {
                $nip = str_replace('*', '%', $nip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NIP, $nip, $comparison);
    }

    /**
     * Filter the query on the jenis_kelamin column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisKelamin('fooValue');   // WHERE jenis_kelamin = 'fooValue'
     * $query->filterByJenisKelamin('%fooValue%'); // WHERE jenis_kelamin LIKE '%fooValue%'
     * </code>
     *
     * @param     string $jenisKelamin The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByJenisKelamin($jenisKelamin = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($jenisKelamin)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $jenisKelamin)) {
                $jenisKelamin = str_replace('*', '%', $jenisKelamin);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the tempat_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTempatLahir('fooValue');   // WHERE tempat_lahir = 'fooValue'
     * $query->filterByTempatLahir('%fooValue%'); // WHERE tempat_lahir LIKE '%fooValue%'
     * </code>
     *
     * @param     string $tempatLahir The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByTempatLahir($tempatLahir = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($tempatLahir)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $tempatLahir)) {
                $tempatLahir = str_replace('*', '%', $tempatLahir);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
    }

    /**
     * Filter the query on the tanggal_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByTanggalLahir('2011-03-14'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir('now'); // WHERE tanggal_lahir = '2011-03-14'
     * $query->filterByTanggalLahir(array('max' => 'yesterday')); // WHERE tanggal_lahir > '2011-03-13'
     * </code>
     *
     * @param     mixed $tanggalLahir The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByTanggalLahir($tanggalLahir = null, $comparison = null)
    {
        if (is_array($tanggalLahir)) {
            $useMinMax = false;
            if (isset($tanggalLahir['min'])) {
                $this->addUsingAlias(PtkPeer::TANGGAL_LAHIR, $tanggalLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalLahir['max'])) {
                $this->addUsingAlias(PtkPeer::TANGGAL_LAHIR, $tanggalLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::TANGGAL_LAHIR, $tanggalLahir, $comparison);
    }

    /**
     * Filter the query on the nik column
     *
     * Example usage:
     * <code>
     * $query->filterByNik('fooValue');   // WHERE nik = 'fooValue'
     * $query->filterByNik('%fooValue%'); // WHERE nik LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nik The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNik($nik = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nik)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nik)) {
                $nik = str_replace('*', '%', $nik);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NIK, $nik, $comparison);
    }

    /**
     * Filter the query on the no_kk column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKk('fooValue');   // WHERE no_kk = 'fooValue'
     * $query->filterByNoKk('%fooValue%'); // WHERE no_kk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNoKk($noKk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKk)) {
                $noKk = str_replace('*', '%', $noKk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NO_KK, $noKk, $comparison);
    }

    /**
     * Filter the query on the niy_nigk column
     *
     * Example usage:
     * <code>
     * $query->filterByNiyNigk('fooValue');   // WHERE niy_nigk = 'fooValue'
     * $query->filterByNiyNigk('%fooValue%'); // WHERE niy_nigk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $niyNigk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNiyNigk($niyNigk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($niyNigk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $niyNigk)) {
                $niyNigk = str_replace('*', '%', $niyNigk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NIY_NIGK, $niyNigk, $comparison);
    }

    /**
     * Filter the query on the nuptk column
     *
     * Example usage:
     * <code>
     * $query->filterByNuptk('fooValue');   // WHERE nuptk = 'fooValue'
     * $query->filterByNuptk('%fooValue%'); // WHERE nuptk LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuptk The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNuptk($nuptk = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuptk)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuptk)) {
                $nuptk = str_replace('*', '%', $nuptk);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NUPTK, $nuptk, $comparison);
    }

    /**
     * Filter the query on the nrg column
     *
     * Example usage:
     * <code>
     * $query->filterByNrg('fooValue');   // WHERE nrg = 'fooValue'
     * $query->filterByNrg('%fooValue%'); // WHERE nrg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nrg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNrg($nrg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nrg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nrg)) {
                $nrg = str_replace('*', '%', $nrg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NRG, $nrg, $comparison);
    }

    /**
     * Filter the query on the nuks column
     *
     * Example usage:
     * <code>
     * $query->filterByNuks('fooValue');   // WHERE nuks = 'fooValue'
     * $query->filterByNuks('%fooValue%'); // WHERE nuks LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nuks The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNuks($nuks = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nuks)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nuks)) {
                $nuks = str_replace('*', '%', $nuks);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NUKS, $nuks, $comparison);
    }

    /**
     * Filter the query on the status_kepegawaian_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKepegawaianId(1234); // WHERE status_kepegawaian_id = 1234
     * $query->filterByStatusKepegawaianId(array(12, 34)); // WHERE status_kepegawaian_id IN (12, 34)
     * $query->filterByStatusKepegawaianId(array('min' => 12)); // WHERE status_kepegawaian_id >= 12
     * $query->filterByStatusKepegawaianId(array('max' => 12)); // WHERE status_kepegawaian_id <= 12
     * </code>
     *
     * @see       filterByStatusKepegawaian()
     *
     * @param     mixed $statusKepegawaianId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByStatusKepegawaianId($statusKepegawaianId = null, $comparison = null)
    {
        if (is_array($statusKepegawaianId)) {
            $useMinMax = false;
            if (isset($statusKepegawaianId['min'])) {
                $this->addUsingAlias(PtkPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKepegawaianId['max'])) {
                $this->addUsingAlias(PtkPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaianId, $comparison);
    }

    /**
     * Filter the query on the jenis_ptk_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisPtkId(1234); // WHERE jenis_ptk_id = 1234
     * $query->filterByJenisPtkId(array(12, 34)); // WHERE jenis_ptk_id IN (12, 34)
     * $query->filterByJenisPtkId(array('min' => 12)); // WHERE jenis_ptk_id >= 12
     * $query->filterByJenisPtkId(array('max' => 12)); // WHERE jenis_ptk_id <= 12
     * </code>
     *
     * @see       filterByJenisPtk()
     *
     * @param     mixed $jenisPtkId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByJenisPtkId($jenisPtkId = null, $comparison = null)
    {
        if (is_array($jenisPtkId)) {
            $useMinMax = false;
            if (isset($jenisPtkId['min'])) {
                $this->addUsingAlias(PtkPeer::JENIS_PTK_ID, $jenisPtkId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisPtkId['max'])) {
                $this->addUsingAlias(PtkPeer::JENIS_PTK_ID, $jenisPtkId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::JENIS_PTK_ID, $jenisPtkId, $comparison);
    }

    /**
     * Filter the query on the pengawas_bidang_studi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPengawasBidangStudiId(1234); // WHERE pengawas_bidang_studi_id = 1234
     * $query->filterByPengawasBidangStudiId(array(12, 34)); // WHERE pengawas_bidang_studi_id IN (12, 34)
     * $query->filterByPengawasBidangStudiId(array('min' => 12)); // WHERE pengawas_bidang_studi_id >= 12
     * $query->filterByPengawasBidangStudiId(array('max' => 12)); // WHERE pengawas_bidang_studi_id <= 12
     * </code>
     *
     * @see       filterByBidangStudi()
     *
     * @param     mixed $pengawasBidangStudiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPengawasBidangStudiId($pengawasBidangStudiId = null, $comparison = null)
    {
        if (is_array($pengawasBidangStudiId)) {
            $useMinMax = false;
            if (isset($pengawasBidangStudiId['min'])) {
                $this->addUsingAlias(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $pengawasBidangStudiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pengawasBidangStudiId['max'])) {
                $this->addUsingAlias(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $pengawasBidangStudiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $pengawasBidangStudiId, $comparison);
    }

    /**
     * Filter the query on the agama_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAgamaId(1234); // WHERE agama_id = 1234
     * $query->filterByAgamaId(array(12, 34)); // WHERE agama_id IN (12, 34)
     * $query->filterByAgamaId(array('min' => 12)); // WHERE agama_id >= 12
     * $query->filterByAgamaId(array('max' => 12)); // WHERE agama_id <= 12
     * </code>
     *
     * @see       filterByAgama()
     *
     * @param     mixed $agamaId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByAgamaId($agamaId = null, $comparison = null)
    {
        if (is_array($agamaId)) {
            $useMinMax = false;
            if (isset($agamaId['min'])) {
                $this->addUsingAlias(PtkPeer::AGAMA_ID, $agamaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agamaId['max'])) {
                $this->addUsingAlias(PtkPeer::AGAMA_ID, $agamaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::AGAMA_ID, $agamaId, $comparison);
    }

    /**
     * Filter the query on the alamat_jalan column
     *
     * Example usage:
     * <code>
     * $query->filterByAlamatJalan('fooValue');   // WHERE alamat_jalan = 'fooValue'
     * $query->filterByAlamatJalan('%fooValue%'); // WHERE alamat_jalan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $alamatJalan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByAlamatJalan($alamatJalan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($alamatJalan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $alamatJalan)) {
                $alamatJalan = str_replace('*', '%', $alamatJalan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
    }

    /**
     * Filter the query on the rt column
     *
     * Example usage:
     * <code>
     * $query->filterByRt(1234); // WHERE rt = 1234
     * $query->filterByRt(array(12, 34)); // WHERE rt IN (12, 34)
     * $query->filterByRt(array('min' => 12)); // WHERE rt >= 12
     * $query->filterByRt(array('max' => 12)); // WHERE rt <= 12
     * </code>
     *
     * @param     mixed $rt The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(PtkPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(PtkPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::RT, $rt, $comparison);
    }

    /**
     * Filter the query on the rw column
     *
     * Example usage:
     * <code>
     * $query->filterByRw(1234); // WHERE rw = 1234
     * $query->filterByRw(array(12, 34)); // WHERE rw IN (12, 34)
     * $query->filterByRw(array('min' => 12)); // WHERE rw >= 12
     * $query->filterByRw(array('max' => 12)); // WHERE rw <= 12
     * </code>
     *
     * @param     mixed $rw The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(PtkPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(PtkPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::RW, $rw, $comparison);
    }

    /**
     * Filter the query on the nama_dusun column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaDusun('fooValue');   // WHERE nama_dusun = 'fooValue'
     * $query->filterByNamaDusun('%fooValue%'); // WHERE nama_dusun LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaDusun The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNamaDusun($namaDusun = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaDusun)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaDusun)) {
                $namaDusun = str_replace('*', '%', $namaDusun);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NAMA_DUSUN, $namaDusun, $comparison);
    }

    /**
     * Filter the query on the desa_kelurahan column
     *
     * Example usage:
     * <code>
     * $query->filterByDesaKelurahan('fooValue');   // WHERE desa_kelurahan = 'fooValue'
     * $query->filterByDesaKelurahan('%fooValue%'); // WHERE desa_kelurahan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $desaKelurahan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByDesaKelurahan($desaKelurahan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($desaKelurahan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $desaKelurahan)) {
                $desaKelurahan = str_replace('*', '%', $desaKelurahan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
    }

    /**
     * Filter the query on the kode_wilayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKodeWilayah('fooValue');   // WHERE kode_wilayah = 'fooValue'
     * $query->filterByKodeWilayah('%fooValue%'); // WHERE kode_wilayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodeWilayah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKodeWilayah($kodeWilayah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodeWilayah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodeWilayah)) {
                $kodeWilayah = str_replace('*', '%', $kodeWilayah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
    }

    /**
     * Filter the query on the kode_pos column
     *
     * Example usage:
     * <code>
     * $query->filterByKodePos('fooValue');   // WHERE kode_pos = 'fooValue'
     * $query->filterByKodePos('%fooValue%'); // WHERE kode_pos LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kodePos The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKodePos($kodePos = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kodePos)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kodePos)) {
                $kodePos = str_replace('*', '%', $kodePos);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::KODE_POS, $kodePos, $comparison);
    }

    /**
     * Filter the query on the lintang column
     *
     * Example usage:
     * <code>
     * $query->filterByLintang(1234); // WHERE lintang = 1234
     * $query->filterByLintang(array(12, 34)); // WHERE lintang IN (12, 34)
     * $query->filterByLintang(array('min' => 12)); // WHERE lintang >= 12
     * $query->filterByLintang(array('max' => 12)); // WHERE lintang <= 12
     * </code>
     *
     * @param     mixed $lintang The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(PtkPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(PtkPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::LINTANG, $lintang, $comparison);
    }

    /**
     * Filter the query on the bujur column
     *
     * Example usage:
     * <code>
     * $query->filterByBujur(1234); // WHERE bujur = 1234
     * $query->filterByBujur(array(12, 34)); // WHERE bujur IN (12, 34)
     * $query->filterByBujur(array('min' => 12)); // WHERE bujur >= 12
     * $query->filterByBujur(array('max' => 12)); // WHERE bujur <= 12
     * </code>
     *
     * @param     mixed $bujur The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(PtkPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(PtkPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the no_telepon_rumah column
     *
     * Example usage:
     * <code>
     * $query->filterByNoTeleponRumah('fooValue');   // WHERE no_telepon_rumah = 'fooValue'
     * $query->filterByNoTeleponRumah('%fooValue%'); // WHERE no_telepon_rumah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noTeleponRumah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNoTeleponRumah($noTeleponRumah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noTeleponRumah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noTeleponRumah)) {
                $noTeleponRumah = str_replace('*', '%', $noTeleponRumah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NO_TELEPON_RUMAH, $noTeleponRumah, $comparison);
    }

    /**
     * Filter the query on the no_hp column
     *
     * Example usage:
     * <code>
     * $query->filterByNoHp('fooValue');   // WHERE no_hp = 'fooValue'
     * $query->filterByNoHp('%fooValue%'); // WHERE no_hp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noHp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNoHp($noHp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noHp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noHp)) {
                $noHp = str_replace('*', '%', $noHp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NO_HP, $noHp, $comparison);
    }

    /**
     * Filter the query on the email column
     *
     * Example usage:
     * <code>
     * $query->filterByEmail('fooValue');   // WHERE email = 'fooValue'
     * $query->filterByEmail('%fooValue%'); // WHERE email LIKE '%fooValue%'
     * </code>
     *
     * @param     string $email The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByEmail($email = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($email)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $email)) {
                $email = str_replace('*', '%', $email);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the status_keaktifan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusKeaktifanId(1234); // WHERE status_keaktifan_id = 1234
     * $query->filterByStatusKeaktifanId(array(12, 34)); // WHERE status_keaktifan_id IN (12, 34)
     * $query->filterByStatusKeaktifanId(array('min' => 12)); // WHERE status_keaktifan_id >= 12
     * $query->filterByStatusKeaktifanId(array('max' => 12)); // WHERE status_keaktifan_id <= 12
     * </code>
     *
     * @see       filterByStatusKeaktifanPegawai()
     *
     * @param     mixed $statusKeaktifanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByStatusKeaktifanId($statusKeaktifanId = null, $comparison = null)
    {
        if (is_array($statusKeaktifanId)) {
            $useMinMax = false;
            if (isset($statusKeaktifanId['min'])) {
                $this->addUsingAlias(PtkPeer::STATUS_KEAKTIFAN_ID, $statusKeaktifanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusKeaktifanId['max'])) {
                $this->addUsingAlias(PtkPeer::STATUS_KEAKTIFAN_ID, $statusKeaktifanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::STATUS_KEAKTIFAN_ID, $statusKeaktifanId, $comparison);
    }

    /**
     * Filter the query on the sk_cpns column
     *
     * Example usage:
     * <code>
     * $query->filterBySkCpns('fooValue');   // WHERE sk_cpns = 'fooValue'
     * $query->filterBySkCpns('%fooValue%'); // WHERE sk_cpns LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skCpns The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterBySkCpns($skCpns = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skCpns)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skCpns)) {
                $skCpns = str_replace('*', '%', $skCpns);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::SK_CPNS, $skCpns, $comparison);
    }

    /**
     * Filter the query on the tgl_cpns column
     *
     * Example usage:
     * <code>
     * $query->filterByTglCpns('2011-03-14'); // WHERE tgl_cpns = '2011-03-14'
     * $query->filterByTglCpns('now'); // WHERE tgl_cpns = '2011-03-14'
     * $query->filterByTglCpns(array('max' => 'yesterday')); // WHERE tgl_cpns > '2011-03-13'
     * </code>
     *
     * @param     mixed $tglCpns The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByTglCpns($tglCpns = null, $comparison = null)
    {
        if (is_array($tglCpns)) {
            $useMinMax = false;
            if (isset($tglCpns['min'])) {
                $this->addUsingAlias(PtkPeer::TGL_CPNS, $tglCpns['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tglCpns['max'])) {
                $this->addUsingAlias(PtkPeer::TGL_CPNS, $tglCpns['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::TGL_CPNS, $tglCpns, $comparison);
    }

    /**
     * Filter the query on the sk_pengangkatan column
     *
     * Example usage:
     * <code>
     * $query->filterBySkPengangkatan('fooValue');   // WHERE sk_pengangkatan = 'fooValue'
     * $query->filterBySkPengangkatan('%fooValue%'); // WHERE sk_pengangkatan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $skPengangkatan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterBySkPengangkatan($skPengangkatan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($skPengangkatan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $skPengangkatan)) {
                $skPengangkatan = str_replace('*', '%', $skPengangkatan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::SK_PENGANGKATAN, $skPengangkatan, $comparison);
    }

    /**
     * Filter the query on the tmt_pengangkatan column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtPengangkatan('2011-03-14'); // WHERE tmt_pengangkatan = '2011-03-14'
     * $query->filterByTmtPengangkatan('now'); // WHERE tmt_pengangkatan = '2011-03-14'
     * $query->filterByTmtPengangkatan(array('max' => 'yesterday')); // WHERE tmt_pengangkatan > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtPengangkatan The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByTmtPengangkatan($tmtPengangkatan = null, $comparison = null)
    {
        if (is_array($tmtPengangkatan)) {
            $useMinMax = false;
            if (isset($tmtPengangkatan['min'])) {
                $this->addUsingAlias(PtkPeer::TMT_PENGANGKATAN, $tmtPengangkatan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtPengangkatan['max'])) {
                $this->addUsingAlias(PtkPeer::TMT_PENGANGKATAN, $tmtPengangkatan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::TMT_PENGANGKATAN, $tmtPengangkatan, $comparison);
    }

    /**
     * Filter the query on the lembaga_pengangkat_id column
     *
     * Example usage:
     * <code>
     * $query->filterByLembagaPengangkatId(1234); // WHERE lembaga_pengangkat_id = 1234
     * $query->filterByLembagaPengangkatId(array(12, 34)); // WHERE lembaga_pengangkat_id IN (12, 34)
     * $query->filterByLembagaPengangkatId(array('min' => 12)); // WHERE lembaga_pengangkat_id >= 12
     * $query->filterByLembagaPengangkatId(array('max' => 12)); // WHERE lembaga_pengangkat_id <= 12
     * </code>
     *
     * @see       filterByLembagaPengangkat()
     *
     * @param     mixed $lembagaPengangkatId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByLembagaPengangkatId($lembagaPengangkatId = null, $comparison = null)
    {
        if (is_array($lembagaPengangkatId)) {
            $useMinMax = false;
            if (isset($lembagaPengangkatId['min'])) {
                $this->addUsingAlias(PtkPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lembagaPengangkatId['max'])) {
                $this->addUsingAlias(PtkPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkatId, $comparison);
    }

    /**
     * Filter the query on the pangkat_golongan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPangkatGolonganId(1234); // WHERE pangkat_golongan_id = 1234
     * $query->filterByPangkatGolonganId(array(12, 34)); // WHERE pangkat_golongan_id IN (12, 34)
     * $query->filterByPangkatGolonganId(array('min' => 12)); // WHERE pangkat_golongan_id >= 12
     * $query->filterByPangkatGolonganId(array('max' => 12)); // WHERE pangkat_golongan_id <= 12
     * </code>
     *
     * @see       filterByPangkatGolongan()
     *
     * @param     mixed $pangkatGolonganId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPangkatGolonganId($pangkatGolonganId = null, $comparison = null)
    {
        if (is_array($pangkatGolonganId)) {
            $useMinMax = false;
            if (isset($pangkatGolonganId['min'])) {
                $this->addUsingAlias(PtkPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pangkatGolonganId['max'])) {
                $this->addUsingAlias(PtkPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::PANGKAT_GOLONGAN_ID, $pangkatGolonganId, $comparison);
    }

    /**
     * Filter the query on the keahlian_laboratorium_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKeahlianLaboratoriumId(1234); // WHERE keahlian_laboratorium_id = 1234
     * $query->filterByKeahlianLaboratoriumId(array(12, 34)); // WHERE keahlian_laboratorium_id IN (12, 34)
     * $query->filterByKeahlianLaboratoriumId(array('min' => 12)); // WHERE keahlian_laboratorium_id >= 12
     * $query->filterByKeahlianLaboratoriumId(array('max' => 12)); // WHERE keahlian_laboratorium_id <= 12
     * </code>
     *
     * @see       filterByKeahlianLaboratorium()
     *
     * @param     mixed $keahlianLaboratoriumId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKeahlianLaboratoriumId($keahlianLaboratoriumId = null, $comparison = null)
    {
        if (is_array($keahlianLaboratoriumId)) {
            $useMinMax = false;
            if (isset($keahlianLaboratoriumId['min'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keahlianLaboratoriumId['max'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratoriumId, $comparison);
    }

    /**
     * Filter the query on the sumber_gaji_id column
     *
     * Example usage:
     * <code>
     * $query->filterBySumberGajiId(1234); // WHERE sumber_gaji_id = 1234
     * $query->filterBySumberGajiId(array(12, 34)); // WHERE sumber_gaji_id IN (12, 34)
     * $query->filterBySumberGajiId(array('min' => 12)); // WHERE sumber_gaji_id >= 12
     * $query->filterBySumberGajiId(array('max' => 12)); // WHERE sumber_gaji_id <= 12
     * </code>
     *
     * @see       filterBySumberGaji()
     *
     * @param     mixed $sumberGajiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterBySumberGajiId($sumberGajiId = null, $comparison = null)
    {
        if (is_array($sumberGajiId)) {
            $useMinMax = false;
            if (isset($sumberGajiId['min'])) {
                $this->addUsingAlias(PtkPeer::SUMBER_GAJI_ID, $sumberGajiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sumberGajiId['max'])) {
                $this->addUsingAlias(PtkPeer::SUMBER_GAJI_ID, $sumberGajiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::SUMBER_GAJI_ID, $sumberGajiId, $comparison);
    }

    /**
     * Filter the query on the nama_ibu_kandung column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaIbuKandung('fooValue');   // WHERE nama_ibu_kandung = 'fooValue'
     * $query->filterByNamaIbuKandung('%fooValue%'); // WHERE nama_ibu_kandung LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaIbuKandung The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNamaIbuKandung($namaIbuKandung = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaIbuKandung)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaIbuKandung)) {
                $namaIbuKandung = str_replace('*', '%', $namaIbuKandung);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NAMA_IBU_KANDUNG, $namaIbuKandung, $comparison);
    }

    /**
     * Filter the query on the status_perkawinan column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusPerkawinan(1234); // WHERE status_perkawinan = 1234
     * $query->filterByStatusPerkawinan(array(12, 34)); // WHERE status_perkawinan IN (12, 34)
     * $query->filterByStatusPerkawinan(array('min' => 12)); // WHERE status_perkawinan >= 12
     * $query->filterByStatusPerkawinan(array('max' => 12)); // WHERE status_perkawinan <= 12
     * </code>
     *
     * @param     mixed $statusPerkawinan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByStatusPerkawinan($statusPerkawinan = null, $comparison = null)
    {
        if (is_array($statusPerkawinan)) {
            $useMinMax = false;
            if (isset($statusPerkawinan['min'])) {
                $this->addUsingAlias(PtkPeer::STATUS_PERKAWINAN, $statusPerkawinan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusPerkawinan['max'])) {
                $this->addUsingAlias(PtkPeer::STATUS_PERKAWINAN, $statusPerkawinan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::STATUS_PERKAWINAN, $statusPerkawinan, $comparison);
    }

    /**
     * Filter the query on the nama_suami_istri column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaSuamiIstri('fooValue');   // WHERE nama_suami_istri = 'fooValue'
     * $query->filterByNamaSuamiIstri('%fooValue%'); // WHERE nama_suami_istri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaSuamiIstri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNamaSuamiIstri($namaSuamiIstri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaSuamiIstri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaSuamiIstri)) {
                $namaSuamiIstri = str_replace('*', '%', $namaSuamiIstri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NAMA_SUAMI_ISTRI, $namaSuamiIstri, $comparison);
    }

    /**
     * Filter the query on the nip_suami_istri column
     *
     * Example usage:
     * <code>
     * $query->filterByNipSuamiIstri('fooValue');   // WHERE nip_suami_istri = 'fooValue'
     * $query->filterByNipSuamiIstri('%fooValue%'); // WHERE nip_suami_istri LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nipSuamiIstri The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNipSuamiIstri($nipSuamiIstri = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nipSuamiIstri)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nipSuamiIstri)) {
                $nipSuamiIstri = str_replace('*', '%', $nipSuamiIstri);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NIP_SUAMI_ISTRI, $nipSuamiIstri, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_suami_istri column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanSuamiIstri(1234); // WHERE pekerjaan_suami_istri = 1234
     * $query->filterByPekerjaanSuamiIstri(array(12, 34)); // WHERE pekerjaan_suami_istri IN (12, 34)
     * $query->filterByPekerjaanSuamiIstri(array('min' => 12)); // WHERE pekerjaan_suami_istri >= 12
     * $query->filterByPekerjaanSuamiIstri(array('max' => 12)); // WHERE pekerjaan_suami_istri <= 12
     * </code>
     *
     * @see       filterByPekerjaan()
     *
     * @param     mixed $pekerjaanSuamiIstri The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPekerjaanSuamiIstri($pekerjaanSuamiIstri = null, $comparison = null)
    {
        if (is_array($pekerjaanSuamiIstri)) {
            $useMinMax = false;
            if (isset($pekerjaanSuamiIstri['min'])) {
                $this->addUsingAlias(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $pekerjaanSuamiIstri['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanSuamiIstri['max'])) {
                $this->addUsingAlias(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $pekerjaanSuamiIstri['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $pekerjaanSuamiIstri, $comparison);
    }

    /**
     * Filter the query on the tmt_pns column
     *
     * Example usage:
     * <code>
     * $query->filterByTmtPns('2011-03-14'); // WHERE tmt_pns = '2011-03-14'
     * $query->filterByTmtPns('now'); // WHERE tmt_pns = '2011-03-14'
     * $query->filterByTmtPns(array('max' => 'yesterday')); // WHERE tmt_pns > '2011-03-13'
     * </code>
     *
     * @param     mixed $tmtPns The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByTmtPns($tmtPns = null, $comparison = null)
    {
        if (is_array($tmtPns)) {
            $useMinMax = false;
            if (isset($tmtPns['min'])) {
                $this->addUsingAlias(PtkPeer::TMT_PNS, $tmtPns['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tmtPns['max'])) {
                $this->addUsingAlias(PtkPeer::TMT_PNS, $tmtPns['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::TMT_PNS, $tmtPns, $comparison);
    }

    /**
     * Filter the query on the sudah_lisensi_kepala_sekolah column
     *
     * Example usage:
     * <code>
     * $query->filterBySudahLisensiKepalaSekolah(1234); // WHERE sudah_lisensi_kepala_sekolah = 1234
     * $query->filterBySudahLisensiKepalaSekolah(array(12, 34)); // WHERE sudah_lisensi_kepala_sekolah IN (12, 34)
     * $query->filterBySudahLisensiKepalaSekolah(array('min' => 12)); // WHERE sudah_lisensi_kepala_sekolah >= 12
     * $query->filterBySudahLisensiKepalaSekolah(array('max' => 12)); // WHERE sudah_lisensi_kepala_sekolah <= 12
     * </code>
     *
     * @param     mixed $sudahLisensiKepalaSekolah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterBySudahLisensiKepalaSekolah($sudahLisensiKepalaSekolah = null, $comparison = null)
    {
        if (is_array($sudahLisensiKepalaSekolah)) {
            $useMinMax = false;
            if (isset($sudahLisensiKepalaSekolah['min'])) {
                $this->addUsingAlias(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH, $sudahLisensiKepalaSekolah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($sudahLisensiKepalaSekolah['max'])) {
                $this->addUsingAlias(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH, $sudahLisensiKepalaSekolah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::SUDAH_LISENSI_KEPALA_SEKOLAH, $sudahLisensiKepalaSekolah, $comparison);
    }

    /**
     * Filter the query on the jumlah_sekolah_binaan column
     *
     * Example usage:
     * <code>
     * $query->filterByJumlahSekolahBinaan(1234); // WHERE jumlah_sekolah_binaan = 1234
     * $query->filterByJumlahSekolahBinaan(array(12, 34)); // WHERE jumlah_sekolah_binaan IN (12, 34)
     * $query->filterByJumlahSekolahBinaan(array('min' => 12)); // WHERE jumlah_sekolah_binaan >= 12
     * $query->filterByJumlahSekolahBinaan(array('max' => 12)); // WHERE jumlah_sekolah_binaan <= 12
     * </code>
     *
     * @param     mixed $jumlahSekolahBinaan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByJumlahSekolahBinaan($jumlahSekolahBinaan = null, $comparison = null)
    {
        if (is_array($jumlahSekolahBinaan)) {
            $useMinMax = false;
            if (isset($jumlahSekolahBinaan['min'])) {
                $this->addUsingAlias(PtkPeer::JUMLAH_SEKOLAH_BINAAN, $jumlahSekolahBinaan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jumlahSekolahBinaan['max'])) {
                $this->addUsingAlias(PtkPeer::JUMLAH_SEKOLAH_BINAAN, $jumlahSekolahBinaan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::JUMLAH_SEKOLAH_BINAAN, $jumlahSekolahBinaan, $comparison);
    }

    /**
     * Filter the query on the pernah_diklat_kepengawasan column
     *
     * Example usage:
     * <code>
     * $query->filterByPernahDiklatKepengawasan(1234); // WHERE pernah_diklat_kepengawasan = 1234
     * $query->filterByPernahDiklatKepengawasan(array(12, 34)); // WHERE pernah_diklat_kepengawasan IN (12, 34)
     * $query->filterByPernahDiklatKepengawasan(array('min' => 12)); // WHERE pernah_diklat_kepengawasan >= 12
     * $query->filterByPernahDiklatKepengawasan(array('max' => 12)); // WHERE pernah_diklat_kepengawasan <= 12
     * </code>
     *
     * @param     mixed $pernahDiklatKepengawasan The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByPernahDiklatKepengawasan($pernahDiklatKepengawasan = null, $comparison = null)
    {
        if (is_array($pernahDiklatKepengawasan)) {
            $useMinMax = false;
            if (isset($pernahDiklatKepengawasan['min'])) {
                $this->addUsingAlias(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN, $pernahDiklatKepengawasan['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pernahDiklatKepengawasan['max'])) {
                $this->addUsingAlias(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN, $pernahDiklatKepengawasan['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::PERNAH_DIKLAT_KEPENGAWASAN, $pernahDiklatKepengawasan, $comparison);
    }

    /**
     * Filter the query on the nm_wp column
     *
     * Example usage:
     * <code>
     * $query->filterByNmWp('fooValue');   // WHERE nm_wp = 'fooValue'
     * $query->filterByNmWp('%fooValue%'); // WHERE nm_wp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmWp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNmWp($nmWp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmWp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmWp)) {
                $nmWp = str_replace('*', '%', $nmWp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NM_WP, $nmWp, $comparison);
    }

    /**
     * Filter the query on the status_data column
     *
     * Example usage:
     * <code>
     * $query->filterByStatusData(1234); // WHERE status_data = 1234
     * $query->filterByStatusData(array(12, 34)); // WHERE status_data IN (12, 34)
     * $query->filterByStatusData(array('min' => 12)); // WHERE status_data >= 12
     * $query->filterByStatusData(array('max' => 12)); // WHERE status_data <= 12
     * </code>
     *
     * @param     mixed $statusData The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByStatusData($statusData = null, $comparison = null)
    {
        if (is_array($statusData)) {
            $useMinMax = false;
            if (isset($statusData['min'])) {
                $this->addUsingAlias(PtkPeer::STATUS_DATA, $statusData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusData['max'])) {
                $this->addUsingAlias(PtkPeer::STATUS_DATA, $statusData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::STATUS_DATA, $statusData, $comparison);
    }

    /**
     * Filter the query on the karpeg column
     *
     * Example usage:
     * <code>
     * $query->filterByKarpeg('fooValue');   // WHERE karpeg = 'fooValue'
     * $query->filterByKarpeg('%fooValue%'); // WHERE karpeg LIKE '%fooValue%'
     * </code>
     *
     * @param     string $karpeg The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKarpeg($karpeg = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($karpeg)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $karpeg)) {
                $karpeg = str_replace('*', '%', $karpeg);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::KARPEG, $karpeg, $comparison);
    }

    /**
     * Filter the query on the karpas column
     *
     * Example usage:
     * <code>
     * $query->filterByKarpas('fooValue');   // WHERE karpas = 'fooValue'
     * $query->filterByKarpas('%fooValue%'); // WHERE karpas LIKE '%fooValue%'
     * </code>
     *
     * @param     string $karpas The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKarpas($karpas = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($karpas)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $karpas)) {
                $karpas = str_replace('*', '%', $karpas);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::KARPAS, $karpas, $comparison);
    }

    /**
     * Filter the query on the mampu_handle_kk column
     *
     * Example usage:
     * <code>
     * $query->filterByMampuHandleKk(1234); // WHERE mampu_handle_kk = 1234
     * $query->filterByMampuHandleKk(array(12, 34)); // WHERE mampu_handle_kk IN (12, 34)
     * $query->filterByMampuHandleKk(array('min' => 12)); // WHERE mampu_handle_kk >= 12
     * $query->filterByMampuHandleKk(array('max' => 12)); // WHERE mampu_handle_kk <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhusus()
     *
     * @param     mixed $mampuHandleKk The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByMampuHandleKk($mampuHandleKk = null, $comparison = null)
    {
        if (is_array($mampuHandleKk)) {
            $useMinMax = false;
            if (isset($mampuHandleKk['min'])) {
                $this->addUsingAlias(PtkPeer::MAMPU_HANDLE_KK, $mampuHandleKk['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($mampuHandleKk['max'])) {
                $this->addUsingAlias(PtkPeer::MAMPU_HANDLE_KK, $mampuHandleKk['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::MAMPU_HANDLE_KK, $mampuHandleKk, $comparison);
    }

    /**
     * Filter the query on the keahlian_braille column
     *
     * Example usage:
     * <code>
     * $query->filterByKeahlianBraille(1234); // WHERE keahlian_braille = 1234
     * $query->filterByKeahlianBraille(array(12, 34)); // WHERE keahlian_braille IN (12, 34)
     * $query->filterByKeahlianBraille(array('min' => 12)); // WHERE keahlian_braille >= 12
     * $query->filterByKeahlianBraille(array('max' => 12)); // WHERE keahlian_braille <= 12
     * </code>
     *
     * @param     mixed $keahlianBraille The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKeahlianBraille($keahlianBraille = null, $comparison = null)
    {
        if (is_array($keahlianBraille)) {
            $useMinMax = false;
            if (isset($keahlianBraille['min'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_BRAILLE, $keahlianBraille['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keahlianBraille['max'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_BRAILLE, $keahlianBraille['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::KEAHLIAN_BRAILLE, $keahlianBraille, $comparison);
    }

    /**
     * Filter the query on the keahlian_bhs_isyarat column
     *
     * Example usage:
     * <code>
     * $query->filterByKeahlianBhsIsyarat(1234); // WHERE keahlian_bhs_isyarat = 1234
     * $query->filterByKeahlianBhsIsyarat(array(12, 34)); // WHERE keahlian_bhs_isyarat IN (12, 34)
     * $query->filterByKeahlianBhsIsyarat(array('min' => 12)); // WHERE keahlian_bhs_isyarat >= 12
     * $query->filterByKeahlianBhsIsyarat(array('max' => 12)); // WHERE keahlian_bhs_isyarat <= 12
     * </code>
     *
     * @param     mixed $keahlianBhsIsyarat The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKeahlianBhsIsyarat($keahlianBhsIsyarat = null, $comparison = null)
    {
        if (is_array($keahlianBhsIsyarat)) {
            $useMinMax = false;
            if (isset($keahlianBhsIsyarat['min'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_BHS_ISYARAT, $keahlianBhsIsyarat['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($keahlianBhsIsyarat['max'])) {
                $this->addUsingAlias(PtkPeer::KEAHLIAN_BHS_ISYARAT, $keahlianBhsIsyarat['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::KEAHLIAN_BHS_ISYARAT, $keahlianBhsIsyarat, $comparison);
    }

    /**
     * Filter the query on the npwp column
     *
     * Example usage:
     * <code>
     * $query->filterByNpwp('fooValue');   // WHERE npwp = 'fooValue'
     * $query->filterByNpwp('%fooValue%'); // WHERE npwp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $npwp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByNpwp($npwp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($npwp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $npwp)) {
                $npwp = str_replace('*', '%', $npwp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::NPWP, $npwp, $comparison);
    }

    /**
     * Filter the query on the kewarganegaraan column
     *
     * Example usage:
     * <code>
     * $query->filterByKewarganegaraan('fooValue');   // WHERE kewarganegaraan = 'fooValue'
     * $query->filterByKewarganegaraan('%fooValue%'); // WHERE kewarganegaraan LIKE '%fooValue%'
     * </code>
     *
     * @param     string $kewarganegaraan The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByKewarganegaraan($kewarganegaraan = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($kewarganegaraan)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $kewarganegaraan)) {
                $kewarganegaraan = str_replace('*', '%', $kewarganegaraan);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::KEWARGANEGARAAN, $kewarganegaraan, $comparison);
    }

    /**
     * Filter the query on the id_bank column
     *
     * Example usage:
     * <code>
     * $query->filterByIdBank('fooValue');   // WHERE id_bank = 'fooValue'
     * $query->filterByIdBank('%fooValue%'); // WHERE id_bank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $idBank The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByIdBank($idBank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($idBank)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $idBank)) {
                $idBank = str_replace('*', '%', $idBank);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::ID_BANK, $idBank, $comparison);
    }

    /**
     * Filter the query on the rekening_bank column
     *
     * Example usage:
     * <code>
     * $query->filterByRekeningBank('fooValue');   // WHERE rekening_bank = 'fooValue'
     * $query->filterByRekeningBank('%fooValue%'); // WHERE rekening_bank LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rekeningBank The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByRekeningBank($rekeningBank = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rekeningBank)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rekeningBank)) {
                $rekeningBank = str_replace('*', '%', $rekeningBank);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::REKENING_BANK, $rekeningBank, $comparison);
    }

    /**
     * Filter the query on the rekening_atas_nama column
     *
     * Example usage:
     * <code>
     * $query->filterByRekeningAtasNama('fooValue');   // WHERE rekening_atas_nama = 'fooValue'
     * $query->filterByRekeningAtasNama('%fooValue%'); // WHERE rekening_atas_nama LIKE '%fooValue%'
     * </code>
     *
     * @param     string $rekeningAtasNama The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByRekeningAtasNama($rekeningAtasNama = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($rekeningAtasNama)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $rekeningAtasNama)) {
                $rekeningAtasNama = str_replace('*', '%', $rekeningAtasNama);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::REKENING_ATAS_NAMA, $rekeningAtasNama, $comparison);
    }

    /**
     * Filter the query on the blob_id column
     *
     * Example usage:
     * <code>
     * $query->filterByBlobId('fooValue');   // WHERE blob_id = 'fooValue'
     * $query->filterByBlobId('%fooValue%'); // WHERE blob_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $blobId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByBlobId($blobId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($blobId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $blobId)) {
                $blobId = str_replace('*', '%', $blobId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::BLOB_ID, $blobId, $comparison);
    }

    /**
     * Filter the query on the create_date column
     *
     * Example usage:
     * <code>
     * $query->filterByCreateDate('2011-03-14'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate('now'); // WHERE create_date = '2011-03-14'
     * $query->filterByCreateDate(array('max' => 'yesterday')); // WHERE create_date > '2011-03-13'
     * </code>
     *
     * @param     mixed $createDate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PtkPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PtkPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::CREATE_DATE, $createDate, $comparison);
    }

    /**
     * Filter the query on the last_update column
     *
     * Example usage:
     * <code>
     * $query->filterByLastUpdate('2011-03-14'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate('now'); // WHERE last_update = '2011-03-14'
     * $query->filterByLastUpdate(array('max' => 'yesterday')); // WHERE last_update > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastUpdate The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PtkPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PtkPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::LAST_UPDATE, $lastUpdate, $comparison);
    }

    /**
     * Filter the query on the soft_delete column
     *
     * Example usage:
     * <code>
     * $query->filterBySoftDelete(1234); // WHERE soft_delete = 1234
     * $query->filterBySoftDelete(array(12, 34)); // WHERE soft_delete IN (12, 34)
     * $query->filterBySoftDelete(array('min' => 12)); // WHERE soft_delete >= 12
     * $query->filterBySoftDelete(array('max' => 12)); // WHERE soft_delete <= 12
     * </code>
     *
     * @param     mixed $softDelete The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PtkPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PtkPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::SOFT_DELETE, $softDelete, $comparison);
    }

    /**
     * Filter the query on the last_sync column
     *
     * Example usage:
     * <code>
     * $query->filterByLastSync('2011-03-14'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync('now'); // WHERE last_sync = '2011-03-14'
     * $query->filterByLastSync(array('max' => 'yesterday')); // WHERE last_sync > '2011-03-13'
     * </code>
     *
     * @param     mixed $lastSync The value to use as filter.
     *              Values can be integers (unix timestamps), DateTime objects, or strings.
     *              Empty strings are treated as NULL.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PtkPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PtkPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PtkPeer::LAST_SYNC, $lastSync, $comparison);
    }

    /**
     * Filter the query on the updater_id column
     *
     * Example usage:
     * <code>
     * $query->filterByUpdaterId('fooValue');   // WHERE updater_id = 'fooValue'
     * $query->filterByUpdaterId('%fooValue%'); // WHERE updater_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $updaterId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function filterByUpdaterId($updaterId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($updaterId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $updaterId)) {
                $updaterId = str_replace('*', '%', $updaterId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PtkPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related Negara object
     *
     * @param   Negara|PropelObjectCollection $negara The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNegara($negara, $comparison = null)
    {
        if ($negara instanceof Negara) {
            return $this
                ->addUsingAlias(PtkPeer::KEWARGANEGARAAN, $negara->getNegaraId(), $comparison);
        } elseif ($negara instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::KEWARGANEGARAAN, $negara->toKeyValue('PrimaryKey', 'NegaraId'), $comparison);
        } else {
            throw new PropelException('filterByNegara() only accepts arguments of type Negara or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Negara relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinNegara($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Negara');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Negara');
        }

        return $this;
    }

    /**
     * Use the Negara relation Negara object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NegaraQuery A secondary query class using the current class as primary query
     */
    public function useNegaraQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNegara($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Negara', '\DataDikdas\Model\NegaraQuery');
    }

    /**
     * Filter the query by a related Bank object
     *
     * @param   Bank|PropelObjectCollection $bank The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBank($bank, $comparison = null)
    {
        if ($bank instanceof Bank) {
            return $this
                ->addUsingAlias(PtkPeer::ID_BANK, $bank->getIdBank(), $comparison);
        } elseif ($bank instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::ID_BANK, $bank->toKeyValue('PrimaryKey', 'IdBank'), $comparison);
        } else {
            throw new PropelException('filterByBank() only accepts arguments of type Bank or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bank relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBank($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bank');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Bank');
        }

        return $this;
    }

    /**
     * Use the Bank relation Bank object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BankQuery A secondary query class using the current class as primary query
     */
    public function useBankQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBank($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bank', '\DataDikdas\Model\BankQuery');
    }

    /**
     * Filter the query by a related LargeObject object
     *
     * @param   LargeObject|PropelObjectCollection $largeObject The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLargeObject($largeObject, $comparison = null)
    {
        if ($largeObject instanceof LargeObject) {
            return $this
                ->addUsingAlias(PtkPeer::BLOB_ID, $largeObject->getBlobId(), $comparison);
        } elseif ($largeObject instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::BLOB_ID, $largeObject->toKeyValue('PrimaryKey', 'BlobId'), $comparison);
        } else {
            throw new PropelException('filterByLargeObject() only accepts arguments of type LargeObject or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LargeObject relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinLargeObject($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LargeObject');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'LargeObject');
        }

        return $this;
    }

    /**
     * Use the LargeObject relation LargeObject object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LargeObjectQuery A secondary query class using the current class as primary query
     */
    public function useLargeObjectQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinLargeObject($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LargeObject', '\DataDikdas\Model\LargeObjectQuery');
    }

    /**
     * Filter the query by a related JenisPtk object
     *
     * @param   JenisPtk|PropelObjectCollection $jenisPtk The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisPtk($jenisPtk, $comparison = null)
    {
        if ($jenisPtk instanceof JenisPtk) {
            return $this
                ->addUsingAlias(PtkPeer::JENIS_PTK_ID, $jenisPtk->getJenisPtkId(), $comparison);
        } elseif ($jenisPtk instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::JENIS_PTK_ID, $jenisPtk->toKeyValue('PrimaryKey', 'JenisPtkId'), $comparison);
        } else {
            throw new PropelException('filterByJenisPtk() only accepts arguments of type JenisPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinJenisPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'JenisPtk');
        }

        return $this;
    }

    /**
     * Use the JenisPtk relation JenisPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisPtkQuery A secondary query class using the current class as primary query
     */
    public function useJenisPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinJenisPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisPtk', '\DataDikdas\Model\JenisPtkQuery');
    }

    /**
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(PtkPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
        } else {
            throw new PropelException('filterByMstWilayah() only accepts arguments of type MstWilayah or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the MstWilayah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinMstWilayah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('MstWilayah');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'MstWilayah');
        }

        return $this;
    }

    /**
     * Use the MstWilayah relation MstWilayah object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\MstWilayahQuery A secondary query class using the current class as primary query
     */
    public function useMstWilayahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinMstWilayah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'MstWilayah', '\DataDikdas\Model\MstWilayahQuery');
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhusus($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(PtkPeer::MAMPU_HANDLE_KK, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::MAMPU_HANDLE_KK, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhusus() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhusus relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhusus($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhusus');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'KebutuhanKhusus');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhusus relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhusus($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhusus', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related LembagaPengangkat object
     *
     * @param   LembagaPengangkat|PropelObjectCollection $lembagaPengangkat The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByLembagaPengangkat($lembagaPengangkat, $comparison = null)
    {
        if ($lembagaPengangkat instanceof LembagaPengangkat) {
            return $this
                ->addUsingAlias(PtkPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkat->getLembagaPengangkatId(), $comparison);
        } elseif ($lembagaPengangkat instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::LEMBAGA_PENGANGKAT_ID, $lembagaPengangkat->toKeyValue('PrimaryKey', 'LembagaPengangkatId'), $comparison);
        } else {
            throw new PropelException('filterByLembagaPengangkat() only accepts arguments of type LembagaPengangkat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the LembagaPengangkat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinLembagaPengangkat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('LembagaPengangkat');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'LembagaPengangkat');
        }

        return $this;
    }

    /**
     * Use the LembagaPengangkat relation LembagaPengangkat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\LembagaPengangkatQuery A secondary query class using the current class as primary query
     */
    public function useLembagaPengangkatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinLembagaPengangkat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'LembagaPengangkat', '\DataDikdas\Model\LembagaPengangkatQuery');
    }

    /**
     * Filter the query by a related StatusKeaktifanPegawai object
     *
     * @param   StatusKeaktifanPegawai|PropelObjectCollection $statusKeaktifanPegawai The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKeaktifanPegawai($statusKeaktifanPegawai, $comparison = null)
    {
        if ($statusKeaktifanPegawai instanceof StatusKeaktifanPegawai) {
            return $this
                ->addUsingAlias(PtkPeer::STATUS_KEAKTIFAN_ID, $statusKeaktifanPegawai->getStatusKeaktifanId(), $comparison);
        } elseif ($statusKeaktifanPegawai instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::STATUS_KEAKTIFAN_ID, $statusKeaktifanPegawai->toKeyValue('PrimaryKey', 'StatusKeaktifanId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKeaktifanPegawai() only accepts arguments of type StatusKeaktifanPegawai or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKeaktifanPegawai relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinStatusKeaktifanPegawai($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKeaktifanPegawai');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StatusKeaktifanPegawai');
        }

        return $this;
    }

    /**
     * Use the StatusKeaktifanPegawai relation StatusKeaktifanPegawai object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKeaktifanPegawaiQuery A secondary query class using the current class as primary query
     */
    public function useStatusKeaktifanPegawaiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKeaktifanPegawai($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKeaktifanPegawai', '\DataDikdas\Model\StatusKeaktifanPegawaiQuery');
    }

    /**
     * Filter the query by a related SumberGaji object
     *
     * @param   SumberGaji|PropelObjectCollection $sumberGaji The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySumberGaji($sumberGaji, $comparison = null)
    {
        if ($sumberGaji instanceof SumberGaji) {
            return $this
                ->addUsingAlias(PtkPeer::SUMBER_GAJI_ID, $sumberGaji->getSumberGajiId(), $comparison);
        } elseif ($sumberGaji instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::SUMBER_GAJI_ID, $sumberGaji->toKeyValue('PrimaryKey', 'SumberGajiId'), $comparison);
        } else {
            throw new PropelException('filterBySumberGaji() only accepts arguments of type SumberGaji or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SumberGaji relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinSumberGaji($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SumberGaji');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'SumberGaji');
        }

        return $this;
    }

    /**
     * Use the SumberGaji relation SumberGaji object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SumberGajiQuery A secondary query class using the current class as primary query
     */
    public function useSumberGajiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSumberGaji($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SumberGaji', '\DataDikdas\Model\SumberGajiQuery');
    }

    /**
     * Filter the query by a related PangkatGolongan object
     *
     * @param   PangkatGolongan|PropelObjectCollection $pangkatGolongan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPangkatGolongan($pangkatGolongan, $comparison = null)
    {
        if ($pangkatGolongan instanceof PangkatGolongan) {
            return $this
                ->addUsingAlias(PtkPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->getPangkatGolonganId(), $comparison);
        } elseif ($pangkatGolongan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::PANGKAT_GOLONGAN_ID, $pangkatGolongan->toKeyValue('PrimaryKey', 'PangkatGolonganId'), $comparison);
        } else {
            throw new PropelException('filterByPangkatGolongan() only accepts arguments of type PangkatGolongan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PangkatGolongan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPangkatGolongan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PangkatGolongan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PangkatGolongan');
        }

        return $this;
    }

    /**
     * Use the PangkatGolongan relation PangkatGolongan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PangkatGolonganQuery A secondary query class using the current class as primary query
     */
    public function usePangkatGolonganQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPangkatGolongan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PangkatGolongan', '\DataDikdas\Model\PangkatGolonganQuery');
    }

    /**
     * Filter the query by a related BidangStudi object
     *
     * @param   BidangStudi|PropelObjectCollection $bidangStudi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangStudi($bidangStudi, $comparison = null)
    {
        if ($bidangStudi instanceof BidangStudi) {
            return $this
                ->addUsingAlias(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $bidangStudi->getBidangStudiId(), $comparison);
        } elseif ($bidangStudi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::PENGAWAS_BIDANG_STUDI_ID, $bidangStudi->toKeyValue('PrimaryKey', 'BidangStudiId'), $comparison);
        } else {
            throw new PropelException('filterByBidangStudi() only accepts arguments of type BidangStudi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangStudi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBidangStudi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangStudi');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BidangStudi');
        }

        return $this;
    }

    /**
     * Use the BidangStudi relation BidangStudi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangStudiQuery A secondary query class using the current class as primary query
     */
    public function useBidangStudiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBidangStudi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangStudi', '\DataDikdas\Model\BidangStudiQuery');
    }

    /**
     * Filter the query by a related KeahlianLaboratorium object
     *
     * @param   KeahlianLaboratorium|PropelObjectCollection $keahlianLaboratorium The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKeahlianLaboratorium($keahlianLaboratorium, $comparison = null)
    {
        if ($keahlianLaboratorium instanceof KeahlianLaboratorium) {
            return $this
                ->addUsingAlias(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratorium->getKeahlianLaboratoriumId(), $comparison);
        } elseif ($keahlianLaboratorium instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::KEAHLIAN_LABORATORIUM_ID, $keahlianLaboratorium->toKeyValue('PrimaryKey', 'KeahlianLaboratoriumId'), $comparison);
        } else {
            throw new PropelException('filterByKeahlianLaboratorium() only accepts arguments of type KeahlianLaboratorium or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KeahlianLaboratorium relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinKeahlianLaboratorium($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KeahlianLaboratorium');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'KeahlianLaboratorium');
        }

        return $this;
    }

    /**
     * Use the KeahlianLaboratorium relation KeahlianLaboratorium object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KeahlianLaboratoriumQuery A secondary query class using the current class as primary query
     */
    public function useKeahlianLaboratoriumQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinKeahlianLaboratorium($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KeahlianLaboratorium', '\DataDikdas\Model\KeahlianLaboratoriumQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaan($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::PEKERJAAN_SUAMI_ISTRI, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaan() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Pekerjaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPekerjaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Pekerjaan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Pekerjaan');
        }

        return $this;
    }

    /**
     * Use the Pekerjaan relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPekerjaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Pekerjaan', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related Agama object
     *
     * @param   Agama|PropelObjectCollection $agama The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAgama($agama, $comparison = null)
    {
        if ($agama instanceof Agama) {
            return $this
                ->addUsingAlias(PtkPeer::AGAMA_ID, $agama->getAgamaId(), $comparison);
        } elseif ($agama instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::AGAMA_ID, $agama->toKeyValue('PrimaryKey', 'AgamaId'), $comparison);
        } else {
            throw new PropelException('filterByAgama() only accepts arguments of type Agama or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Agama relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinAgama($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Agama');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Agama');
        }

        return $this;
    }

    /**
     * Use the Agama relation Agama object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AgamaQuery A secondary query class using the current class as primary query
     */
    public function useAgamaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAgama($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Agama', '\DataDikdas\Model\AgamaQuery');
    }

    /**
     * Filter the query by a related StatusKepegawaian object
     *
     * @param   StatusKepegawaian|PropelObjectCollection $statusKepegawaian The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByStatusKepegawaian($statusKepegawaian, $comparison = null)
    {
        if ($statusKepegawaian instanceof StatusKepegawaian) {
            return $this
                ->addUsingAlias(PtkPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaian->getStatusKepegawaianId(), $comparison);
        } elseif ($statusKepegawaian instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PtkPeer::STATUS_KEPEGAWAIAN_ID, $statusKepegawaian->toKeyValue('PrimaryKey', 'StatusKepegawaianId'), $comparison);
        } else {
            throw new PropelException('filterByStatusKepegawaian() only accepts arguments of type StatusKepegawaian or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the StatusKepegawaian relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinStatusKepegawaian($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('StatusKepegawaian');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'StatusKepegawaian');
        }

        return $this;
    }

    /**
     * Use the StatusKepegawaian relation StatusKepegawaian object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\StatusKepegawaianQuery A secondary query class using the current class as primary query
     */
    public function useStatusKepegawaianQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinStatusKepegawaian($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'StatusKepegawaian', '\DataDikdas\Model\StatusKepegawaianQuery');
    }

    /**
     * Filter the query by a related Alat object
     *
     * @param   Alat|PropelObjectCollection $alat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlat($alat, $comparison = null)
    {
        if ($alat instanceof Alat) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $alat->getPtkId(), $comparison);
        } elseif ($alat instanceof PropelObjectCollection) {
            return $this
                ->useAlatQuery()
                ->filterByPrimaryKeys($alat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAlat() only accepts arguments of type Alat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Alat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinAlat($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Alat');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Alat');
        }

        return $this;
    }

    /**
     * Use the Alat relation Alat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatQuery A secondary query class using the current class as primary query
     */
    public function useAlatQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Alat', '\DataDikdas\Model\AlatQuery');
    }

    /**
     * Filter the query by a related Anak object
     *
     * @param   Anak|PropelObjectCollection $anak  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnak($anak, $comparison = null)
    {
        if ($anak instanceof Anak) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $anak->getPtkId(), $comparison);
        } elseif ($anak instanceof PropelObjectCollection) {
            return $this
                ->useAnakQuery()
                ->filterByPrimaryKeys($anak->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnak() only accepts arguments of type Anak or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Anak relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinAnak($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Anak');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Anak');
        }

        return $this;
    }

    /**
     * Use the Anak relation Anak object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnakQuery A secondary query class using the current class as primary query
     */
    public function useAnakQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnak($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Anak', '\DataDikdas\Model\AnakQuery');
    }

    /**
     * Filter the query by a related AnggotaPanitia object
     *
     * @param   AnggotaPanitia|PropelObjectCollection $anggotaPanitia  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaPanitia($anggotaPanitia, $comparison = null)
    {
        if ($anggotaPanitia instanceof AnggotaPanitia) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $anggotaPanitia->getPtkId(), $comparison);
        } elseif ($anggotaPanitia instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaPanitiaQuery()
                ->filterByPrimaryKeys($anggotaPanitia->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaPanitia() only accepts arguments of type AnggotaPanitia or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaPanitia relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinAnggotaPanitia($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaPanitia');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'AnggotaPanitia');
        }

        return $this;
    }

    /**
     * Use the AnggotaPanitia relation AnggotaPanitia object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaPanitiaQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaPanitiaQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAnggotaPanitia($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaPanitia', '\DataDikdas\Model\AnggotaPanitiaQuery');
    }

    /**
     * Filter the query by a related Angkutan object
     *
     * @param   Angkutan|PropelObjectCollection $angkutan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAngkutan($angkutan, $comparison = null)
    {
        if ($angkutan instanceof Angkutan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $angkutan->getPtkId(), $comparison);
        } elseif ($angkutan instanceof PropelObjectCollection) {
            return $this
                ->useAngkutanQuery()
                ->filterByPrimaryKeys($angkutan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAngkutan() only accepts arguments of type Angkutan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Angkutan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinAngkutan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Angkutan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Angkutan');
        }

        return $this;
    }

    /**
     * Use the Angkutan relation Angkutan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AngkutanQuery A secondary query class using the current class as primary query
     */
    public function useAngkutanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAngkutan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Angkutan', '\DataDikdas\Model\AngkutanQuery');
    }

    /**
     * Filter the query by a related Bangunan object
     *
     * @param   Bangunan|PropelObjectCollection $bangunan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBangunan($bangunan, $comparison = null)
    {
        if ($bangunan instanceof Bangunan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $bangunan->getPtkId(), $comparison);
        } elseif ($bangunan instanceof PropelObjectCollection) {
            return $this
                ->useBangunanQuery()
                ->filterByPrimaryKeys($bangunan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBangunan() only accepts arguments of type Bangunan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Bangunan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBangunan($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Bangunan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Bangunan');
        }

        return $this;
    }

    /**
     * Use the Bangunan relation Bangunan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BangunanQuery A secondary query class using the current class as primary query
     */
    public function useBangunanQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinBangunan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Bangunan', '\DataDikdas\Model\BangunanQuery');
    }

    /**
     * Filter the query by a related BeasiswaPtk object
     *
     * @param   BeasiswaPtk|PropelObjectCollection $beasiswaPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPtk($beasiswaPtk, $comparison = null)
    {
        if ($beasiswaPtk instanceof BeasiswaPtk) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $beasiswaPtk->getPtkId(), $comparison);
        } elseif ($beasiswaPtk instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPtkQuery()
                ->filterByPrimaryKeys($beasiswaPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPtk() only accepts arguments of type BeasiswaPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBeasiswaPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BeasiswaPtk');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPtk relation BeasiswaPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPtkQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPtk', '\DataDikdas\Model\BeasiswaPtkQuery');
    }

    /**
     * Filter the query by a related BidangSdm object
     *
     * @param   BidangSdm|PropelObjectCollection $bidangSdm  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBidangSdm($bidangSdm, $comparison = null)
    {
        if ($bidangSdm instanceof BidangSdm) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $bidangSdm->getPtkId(), $comparison);
        } elseif ($bidangSdm instanceof PropelObjectCollection) {
            return $this
                ->useBidangSdmQuery()
                ->filterByPrimaryKeys($bidangSdm->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBidangSdm() only accepts arguments of type BidangSdm or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BidangSdm relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBidangSdm($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BidangSdm');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BidangSdm');
        }

        return $this;
    }

    /**
     * Use the BidangSdm relation BidangSdm object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BidangSdmQuery A secondary query class using the current class as primary query
     */
    public function useBidangSdmQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBidangSdm($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BidangSdm', '\DataDikdas\Model\BidangSdmQuery');
    }

    /**
     * Filter the query by a related BimbingPd object
     *
     * @param   BimbingPd|PropelObjectCollection $bimbingPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBimbingPd($bimbingPd, $comparison = null)
    {
        if ($bimbingPd instanceof BimbingPd) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $bimbingPd->getPtkId(), $comparison);
        } elseif ($bimbingPd instanceof PropelObjectCollection) {
            return $this
                ->useBimbingPdQuery()
                ->filterByPrimaryKeys($bimbingPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBimbingPd() only accepts arguments of type BimbingPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BimbingPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBimbingPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BimbingPd');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BimbingPd');
        }

        return $this;
    }

    /**
     * Use the BimbingPd relation BimbingPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BimbingPdQuery A secondary query class using the current class as primary query
     */
    public function useBimbingPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBimbingPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BimbingPd', '\DataDikdas\Model\BimbingPdQuery');
    }

    /**
     * Filter the query by a related BukuPtk object
     *
     * @param   BukuPtk|PropelObjectCollection $bukuPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBukuPtk($bukuPtk, $comparison = null)
    {
        if ($bukuPtk instanceof BukuPtk) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $bukuPtk->getPtkId(), $comparison);
        } elseif ($bukuPtk instanceof PropelObjectCollection) {
            return $this
                ->useBukuPtkQuery()
                ->filterByPrimaryKeys($bukuPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBukuPtk() only accepts arguments of type BukuPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BukuPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinBukuPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BukuPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'BukuPtk');
        }

        return $this;
    }

    /**
     * Use the BukuPtk relation BukuPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BukuPtkQuery A secondary query class using the current class as primary query
     */
    public function useBukuPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBukuPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BukuPtk', '\DataDikdas\Model\BukuPtkQuery');
    }

    /**
     * Filter the query by a related Diklat object
     *
     * @param   Diklat|PropelObjectCollection $diklat  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByDiklat($diklat, $comparison = null)
    {
        if ($diklat instanceof Diklat) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $diklat->getPtkId(), $comparison);
        } elseif ($diklat instanceof PropelObjectCollection) {
            return $this
                ->useDiklatQuery()
                ->filterByPrimaryKeys($diklat->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByDiklat() only accepts arguments of type Diklat or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Diklat relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinDiklat($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Diklat');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Diklat');
        }

        return $this;
    }

    /**
     * Use the Diklat relation Diklat object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\DiklatQuery A secondary query class using the current class as primary query
     */
    public function useDiklatQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinDiklat($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Diklat', '\DataDikdas\Model\DiklatQuery');
    }

    /**
     * Filter the query by a related Inpassing object
     *
     * @param   Inpassing|PropelObjectCollection $inpassing  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByInpassing($inpassing, $comparison = null)
    {
        if ($inpassing instanceof Inpassing) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $inpassing->getPtkId(), $comparison);
        } elseif ($inpassing instanceof PropelObjectCollection) {
            return $this
                ->useInpassingQuery()
                ->filterByPrimaryKeys($inpassing->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByInpassing() only accepts arguments of type Inpassing or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Inpassing relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinInpassing($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Inpassing');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Inpassing');
        }

        return $this;
    }

    /**
     * Use the Inpassing relation Inpassing object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\InpassingQuery A secondary query class using the current class as primary query
     */
    public function useInpassingQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinInpassing($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Inpassing', '\DataDikdas\Model\InpassingQuery');
    }

    /**
     * Filter the query by a related KaryaTulis object
     *
     * @param   KaryaTulis|PropelObjectCollection $karyaTulis  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKaryaTulis($karyaTulis, $comparison = null)
    {
        if ($karyaTulis instanceof KaryaTulis) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $karyaTulis->getPtkId(), $comparison);
        } elseif ($karyaTulis instanceof PropelObjectCollection) {
            return $this
                ->useKaryaTulisQuery()
                ->filterByPrimaryKeys($karyaTulis->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKaryaTulis() only accepts arguments of type KaryaTulis or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KaryaTulis relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinKaryaTulis($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KaryaTulis');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'KaryaTulis');
        }

        return $this;
    }

    /**
     * Use the KaryaTulis relation KaryaTulis object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KaryaTulisQuery A secondary query class using the current class as primary query
     */
    public function useKaryaTulisQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKaryaTulis($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KaryaTulis', '\DataDikdas\Model\KaryaTulisQuery');
    }

    /**
     * Filter the query by a related Kesejahteraan object
     *
     * @param   Kesejahteraan|PropelObjectCollection $kesejahteraan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKesejahteraan($kesejahteraan, $comparison = null)
    {
        if ($kesejahteraan instanceof Kesejahteraan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $kesejahteraan->getPtkId(), $comparison);
        } elseif ($kesejahteraan instanceof PropelObjectCollection) {
            return $this
                ->useKesejahteraanQuery()
                ->filterByPrimaryKeys($kesejahteraan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKesejahteraan() only accepts arguments of type Kesejahteraan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Kesejahteraan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinKesejahteraan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Kesejahteraan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Kesejahteraan');
        }

        return $this;
    }

    /**
     * Use the Kesejahteraan relation Kesejahteraan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KesejahteraanQuery A secondary query class using the current class as primary query
     */
    public function useKesejahteraanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKesejahteraan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Kesejahteraan', '\DataDikdas\Model\KesejahteraanQuery');
    }

    /**
     * Filter the query by a related KitasPtk object
     *
     * @param   KitasPtk|PropelObjectCollection $kitasPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKitasPtk($kitasPtk, $comparison = null)
    {
        if ($kitasPtk instanceof KitasPtk) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $kitasPtk->getPtkId(), $comparison);
        } elseif ($kitasPtk instanceof PropelObjectCollection) {
            return $this
                ->useKitasPtkQuery()
                ->filterByPrimaryKeys($kitasPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKitasPtk() only accepts arguments of type KitasPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KitasPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinKitasPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KitasPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'KitasPtk');
        }

        return $this;
    }

    /**
     * Use the KitasPtk relation KitasPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KitasPtkQuery A secondary query class using the current class as primary query
     */
    public function useKitasPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKitasPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KitasPtk', '\DataDikdas\Model\KitasPtkQuery');
    }

    /**
     * Filter the query by a related NilaiTest object
     *
     * @param   NilaiTest|PropelObjectCollection $nilaiTest  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNilaiTest($nilaiTest, $comparison = null)
    {
        if ($nilaiTest instanceof NilaiTest) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $nilaiTest->getPtkId(), $comparison);
        } elseif ($nilaiTest instanceof PropelObjectCollection) {
            return $this
                ->useNilaiTestQuery()
                ->filterByPrimaryKeys($nilaiTest->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByNilaiTest() only accepts arguments of type NilaiTest or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the NilaiTest relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinNilaiTest($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('NilaiTest');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'NilaiTest');
        }

        return $this;
    }

    /**
     * Use the NilaiTest relation NilaiTest object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\NilaiTestQuery A secondary query class using the current class as primary query
     */
    public function useNilaiTestQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinNilaiTest($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'NilaiTest', '\DataDikdas\Model\NilaiTestQuery');
    }

    /**
     * Filter the query by a related PasporPtk object
     *
     * @param   PasporPtk|PropelObjectCollection $pasporPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPasporPtk($pasporPtk, $comparison = null)
    {
        if ($pasporPtk instanceof PasporPtk) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $pasporPtk->getPtkId(), $comparison);
        } elseif ($pasporPtk instanceof PropelObjectCollection) {
            return $this
                ->usePasporPtkQuery()
                ->filterByPrimaryKeys($pasporPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPasporPtk() only accepts arguments of type PasporPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PasporPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPasporPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PasporPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PasporPtk');
        }

        return $this;
    }

    /**
     * Use the PasporPtk relation PasporPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PasporPtkQuery A secondary query class using the current class as primary query
     */
    public function usePasporPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPasporPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PasporPtk', '\DataDikdas\Model\PasporPtkQuery');
    }

    /**
     * Filter the query by a related PengawasTerdaftar object
     *
     * @param   PengawasTerdaftar|PropelObjectCollection $pengawasTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPengawasTerdaftar($pengawasTerdaftar, $comparison = null)
    {
        if ($pengawasTerdaftar instanceof PengawasTerdaftar) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $pengawasTerdaftar->getPtkId(), $comparison);
        } elseif ($pengawasTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePengawasTerdaftarQuery()
                ->filterByPrimaryKeys($pengawasTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPengawasTerdaftar() only accepts arguments of type PengawasTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PengawasTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPengawasTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PengawasTerdaftar');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PengawasTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PengawasTerdaftar relation PengawasTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PengawasTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePengawasTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPengawasTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PengawasTerdaftar', '\DataDikdas\Model\PengawasTerdaftarQuery');
    }

    /**
     * Filter the query by a related Penghargaan object
     *
     * @param   Penghargaan|PropelObjectCollection $penghargaan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghargaan($penghargaan, $comparison = null)
    {
        if ($penghargaan instanceof Penghargaan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $penghargaan->getPtkId(), $comparison);
        } elseif ($penghargaan instanceof PropelObjectCollection) {
            return $this
                ->usePenghargaanQuery()
                ->filterByPrimaryKeys($penghargaan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPenghargaan() only accepts arguments of type Penghargaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Penghargaan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPenghargaan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Penghargaan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Penghargaan');
        }

        return $this;
    }

    /**
     * Use the Penghargaan relation Penghargaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghargaanQuery A secondary query class using the current class as primary query
     */
    public function usePenghargaanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPenghargaan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Penghargaan', '\DataDikdas\Model\PenghargaanQuery');
    }

    /**
     * Filter the query by a related PtkBaru object
     *
     * @param   PtkBaru|PropelObjectCollection $ptkBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkBaru($ptkBaru, $comparison = null)
    {
        if ($ptkBaru instanceof PtkBaru) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $ptkBaru->getPtkId(), $comparison);
        } elseif ($ptkBaru instanceof PropelObjectCollection) {
            return $this
                ->usePtkBaruQuery()
                ->filterByPrimaryKeys($ptkBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkBaru() only accepts arguments of type PtkBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPtkBaru($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkBaru');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PtkBaru');
        }

        return $this;
    }

    /**
     * Use the PtkBaru relation PtkBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkBaruQuery A secondary query class using the current class as primary query
     */
    public function usePtkBaruQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPtkBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkBaru', '\DataDikdas\Model\PtkBaruQuery');
    }

    /**
     * Filter the query by a related PtkTerdaftar object
     *
     * @param   PtkTerdaftar|PropelObjectCollection $ptkTerdaftar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPtkTerdaftar($ptkTerdaftar, $comparison = null)
    {
        if ($ptkTerdaftar instanceof PtkTerdaftar) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $ptkTerdaftar->getPtkId(), $comparison);
        } elseif ($ptkTerdaftar instanceof PropelObjectCollection) {
            return $this
                ->usePtkTerdaftarQuery()
                ->filterByPrimaryKeys($ptkTerdaftar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPtkTerdaftar() only accepts arguments of type PtkTerdaftar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PtkTerdaftar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinPtkTerdaftar($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PtkTerdaftar');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'PtkTerdaftar');
        }

        return $this;
    }

    /**
     * Use the PtkTerdaftar relation PtkTerdaftar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PtkTerdaftarQuery A secondary query class using the current class as primary query
     */
    public function usePtkTerdaftarQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPtkTerdaftar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PtkTerdaftar', '\DataDikdas\Model\PtkTerdaftarQuery');
    }

    /**
     * Filter the query by a related RiwayatGajiBerkala object
     *
     * @param   RiwayatGajiBerkala|PropelObjectCollection $riwayatGajiBerkala  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRiwayatGajiBerkala($riwayatGajiBerkala, $comparison = null)
    {
        if ($riwayatGajiBerkala instanceof RiwayatGajiBerkala) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $riwayatGajiBerkala->getPtkId(), $comparison);
        } elseif ($riwayatGajiBerkala instanceof PropelObjectCollection) {
            return $this
                ->useRiwayatGajiBerkalaQuery()
                ->filterByPrimaryKeys($riwayatGajiBerkala->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRiwayatGajiBerkala() only accepts arguments of type RiwayatGajiBerkala or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RiwayatGajiBerkala relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRiwayatGajiBerkala($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RiwayatGajiBerkala');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RiwayatGajiBerkala');
        }

        return $this;
    }

    /**
     * Use the RiwayatGajiBerkala relation RiwayatGajiBerkala object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RiwayatGajiBerkalaQuery A secondary query class using the current class as primary query
     */
    public function useRiwayatGajiBerkalaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRiwayatGajiBerkala($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RiwayatGajiBerkala', '\DataDikdas\Model\RiwayatGajiBerkalaQuery');
    }

    /**
     * Filter the query by a related RombonganBelajar object
     *
     * @param   RombonganBelajar|PropelObjectCollection $rombonganBelajar  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRombonganBelajar($rombonganBelajar, $comparison = null)
    {
        if ($rombonganBelajar instanceof RombonganBelajar) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rombonganBelajar->getPtkId(), $comparison);
        } elseif ($rombonganBelajar instanceof PropelObjectCollection) {
            return $this
                ->useRombonganBelajarQuery()
                ->filterByPrimaryKeys($rombonganBelajar->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRombonganBelajar() only accepts arguments of type RombonganBelajar or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RombonganBelajar relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRombonganBelajar($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RombonganBelajar');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RombonganBelajar');
        }

        return $this;
    }

    /**
     * Use the RombonganBelajar relation RombonganBelajar object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RombonganBelajarQuery A secondary query class using the current class as primary query
     */
    public function useRombonganBelajarQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinRombonganBelajar($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RombonganBelajar', '\DataDikdas\Model\RombonganBelajarQuery');
    }

    /**
     * Filter the query by a related RwyFungsional object
     *
     * @param   RwyFungsional|PropelObjectCollection $rwyFungsional  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyFungsional($rwyFungsional, $comparison = null)
    {
        if ($rwyFungsional instanceof RwyFungsional) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwyFungsional->getPtkId(), $comparison);
        } elseif ($rwyFungsional instanceof PropelObjectCollection) {
            return $this
                ->useRwyFungsionalQuery()
                ->filterByPrimaryKeys($rwyFungsional->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyFungsional() only accepts arguments of type RwyFungsional or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyFungsional relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwyFungsional($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyFungsional');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwyFungsional');
        }

        return $this;
    }

    /**
     * Use the RwyFungsional relation RwyFungsional object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyFungsionalQuery A secondary query class using the current class as primary query
     */
    public function useRwyFungsionalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyFungsional($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyFungsional', '\DataDikdas\Model\RwyFungsionalQuery');
    }

    /**
     * Filter the query by a related RwyKepangkatan object
     *
     * @param   RwyKepangkatan|PropelObjectCollection $rwyKepangkatan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKepangkatan($rwyKepangkatan, $comparison = null)
    {
        if ($rwyKepangkatan instanceof RwyKepangkatan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwyKepangkatan->getPtkId(), $comparison);
        } elseif ($rwyKepangkatan instanceof PropelObjectCollection) {
            return $this
                ->useRwyKepangkatanQuery()
                ->filterByPrimaryKeys($rwyKepangkatan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKepangkatan() only accepts arguments of type RwyKepangkatan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKepangkatan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwyKepangkatan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKepangkatan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwyKepangkatan');
        }

        return $this;
    }

    /**
     * Use the RwyKepangkatan relation RwyKepangkatan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKepangkatanQuery A secondary query class using the current class as primary query
     */
    public function useRwyKepangkatanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyKepangkatan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKepangkatan', '\DataDikdas\Model\RwyKepangkatanQuery');
    }

    /**
     * Filter the query by a related RwyKerja object
     *
     * @param   RwyKerja|PropelObjectCollection $rwyKerja  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyKerja($rwyKerja, $comparison = null)
    {
        if ($rwyKerja instanceof RwyKerja) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwyKerja->getPtkId(), $comparison);
        } elseif ($rwyKerja instanceof PropelObjectCollection) {
            return $this
                ->useRwyKerjaQuery()
                ->filterByPrimaryKeys($rwyKerja->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyKerja() only accepts arguments of type RwyKerja or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyKerja relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwyKerja($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyKerja');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwyKerja');
        }

        return $this;
    }

    /**
     * Use the RwyKerja relation RwyKerja object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyKerjaQuery A secondary query class using the current class as primary query
     */
    public function useRwyKerjaQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyKerja($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyKerja', '\DataDikdas\Model\RwyKerjaQuery');
    }

    /**
     * Filter the query by a related RwyPendFormal object
     *
     * @param   RwyPendFormal|PropelObjectCollection $rwyPendFormal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyPendFormal($rwyPendFormal, $comparison = null)
    {
        if ($rwyPendFormal instanceof RwyPendFormal) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwyPendFormal->getPtkId(), $comparison);
        } elseif ($rwyPendFormal instanceof PropelObjectCollection) {
            return $this
                ->useRwyPendFormalQuery()
                ->filterByPrimaryKeys($rwyPendFormal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyPendFormal() only accepts arguments of type RwyPendFormal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyPendFormal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwyPendFormal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyPendFormal');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwyPendFormal');
        }

        return $this;
    }

    /**
     * Use the RwyPendFormal relation RwyPendFormal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyPendFormalQuery A secondary query class using the current class as primary query
     */
    public function useRwyPendFormalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyPendFormal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyPendFormal', '\DataDikdas\Model\RwyPendFormalQuery');
    }

    /**
     * Filter the query by a related RwySertifikasi object
     *
     * @param   RwySertifikasi|PropelObjectCollection $rwySertifikasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwySertifikasi($rwySertifikasi, $comparison = null)
    {
        if ($rwySertifikasi instanceof RwySertifikasi) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwySertifikasi->getPtkId(), $comparison);
        } elseif ($rwySertifikasi instanceof PropelObjectCollection) {
            return $this
                ->useRwySertifikasiQuery()
                ->filterByPrimaryKeys($rwySertifikasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwySertifikasi() only accepts arguments of type RwySertifikasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwySertifikasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwySertifikasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwySertifikasi');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwySertifikasi');
        }

        return $this;
    }

    /**
     * Use the RwySertifikasi relation RwySertifikasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwySertifikasiQuery A secondary query class using the current class as primary query
     */
    public function useRwySertifikasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwySertifikasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwySertifikasi', '\DataDikdas\Model\RwySertifikasiQuery');
    }

    /**
     * Filter the query by a related RwyStruktural object
     *
     * @param   RwyStruktural|PropelObjectCollection $rwyStruktural  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRwyStruktural($rwyStruktural, $comparison = null)
    {
        if ($rwyStruktural instanceof RwyStruktural) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $rwyStruktural->getPtkId(), $comparison);
        } elseif ($rwyStruktural instanceof PropelObjectCollection) {
            return $this
                ->useRwyStrukturalQuery()
                ->filterByPrimaryKeys($rwyStruktural->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRwyStruktural() only accepts arguments of type RwyStruktural or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RwyStruktural relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinRwyStruktural($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RwyStruktural');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'RwyStruktural');
        }

        return $this;
    }

    /**
     * Use the RwyStruktural relation RwyStruktural object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RwyStrukturalQuery A secondary query class using the current class as primary query
     */
    public function useRwyStrukturalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRwyStruktural($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RwyStruktural', '\DataDikdas\Model\RwyStrukturalQuery');
    }

    /**
     * Filter the query by a related TugasTambahan object
     *
     * @param   TugasTambahan|PropelObjectCollection $tugasTambahan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTugasTambahan($tugasTambahan, $comparison = null)
    {
        if ($tugasTambahan instanceof TugasTambahan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $tugasTambahan->getPtkId(), $comparison);
        } elseif ($tugasTambahan instanceof PropelObjectCollection) {
            return $this
                ->useTugasTambahanQuery()
                ->filterByPrimaryKeys($tugasTambahan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTugasTambahan() only accepts arguments of type TugasTambahan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the TugasTambahan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinTugasTambahan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('TugasTambahan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'TugasTambahan');
        }

        return $this;
    }

    /**
     * Use the TugasTambahan relation TugasTambahan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TugasTambahanQuery A secondary query class using the current class as primary query
     */
    public function useTugasTambahanQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTugasTambahan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'TugasTambahan', '\DataDikdas\Model\TugasTambahanQuery');
    }

    /**
     * Filter the query by a related Tunjangan object
     *
     * @param   Tunjangan|PropelObjectCollection $tunjangan  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByTunjangan($tunjangan, $comparison = null)
    {
        if ($tunjangan instanceof Tunjangan) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $tunjangan->getPtkId(), $comparison);
        } elseif ($tunjangan instanceof PropelObjectCollection) {
            return $this
                ->useTunjanganQuery()
                ->filterByPrimaryKeys($tunjangan->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByTunjangan() only accepts arguments of type Tunjangan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Tunjangan relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinTunjangan($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Tunjangan');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'Tunjangan');
        }

        return $this;
    }

    /**
     * Use the Tunjangan relation Tunjangan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\TunjanganQuery A secondary query class using the current class as primary query
     */
    public function useTunjanganQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinTunjangan($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Tunjangan', '\DataDikdas\Model\TunjanganQuery');
    }

    /**
     * Filter the query by a related VldPtk object
     *
     * @param   VldPtk|PropelObjectCollection $vldPtk  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PtkQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPtk($vldPtk, $comparison = null)
    {
        if ($vldPtk instanceof VldPtk) {
            return $this
                ->addUsingAlias(PtkPeer::PTK_ID, $vldPtk->getPtkId(), $comparison);
        } elseif ($vldPtk instanceof PropelObjectCollection) {
            return $this
                ->useVldPtkQuery()
                ->filterByPrimaryKeys($vldPtk->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPtk() only accepts arguments of type VldPtk or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPtk relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function joinVldPtk($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPtk');

        // create a ModelJoin object for this join
        $join = new ModelJoin();
        $join->setJoinType($joinType);
        $join->setRelationMap($relationMap, $this->useAliasInSQL ? $this->getModelAlias() : null, $relationAlias);
        if ($previousJoin = $this->getPreviousJoin()) {
            $join->setPreviousJoin($previousJoin);
        }

        // add the ModelJoin to the current object
        if ($relationAlias) {
            $this->addAlias($relationAlias, $relationMap->getRightTable()->getName());
            $this->addJoinObject($join, $relationAlias);
        } else {
            $this->addJoinObject($join, 'VldPtk');
        }

        return $this;
    }

    /**
     * Use the VldPtk relation VldPtk object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPtkQuery A secondary query class using the current class as primary query
     */
    public function useVldPtkQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPtk($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPtk', '\DataDikdas\Model\VldPtkQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   Ptk $ptk Object to remove from the list of results
     *
     * @return PtkQuery The current query, for fluid interface
     */
    public function prune($ptk = null)
    {
        if ($ptk) {
            $this->addUsingAlias(PtkPeer::PTK_ID, $ptk->getPtkId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
