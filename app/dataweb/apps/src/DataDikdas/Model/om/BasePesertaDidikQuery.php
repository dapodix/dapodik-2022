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
use DataDikdas\Model\AlasanLayakPip;
use DataDikdas\Model\AlatTransportasi;
use DataDikdas\Model\AnggotaPanitia;
use DataDikdas\Model\AnggotaRombel;
use DataDikdas\Model\Bank;
use DataDikdas\Model\BeasiswaPesertaDidik;
use DataDikdas\Model\JenisTinggal;
use DataDikdas\Model\JenjangPendidikan;
use DataDikdas\Model\KebutuhanKhusus;
use DataDikdas\Model\KesejahteraanPd;
use DataDikdas\Model\KitasPd;
use DataDikdas\Model\MstWilayah;
use DataDikdas\Model\Negara;
use DataDikdas\Model\PasporPd;
use DataDikdas\Model\Pekerjaan;
use DataDikdas\Model\Penghasilan;
use DataDikdas\Model\PesertaDidik;
use DataDikdas\Model\PesertaDidikBaru;
use DataDikdas\Model\PesertaDidikLongitudinal;
use DataDikdas\Model\PesertaDidikPeer;
use DataDikdas\Model\PesertaDidikQuery;
use DataDikdas\Model\Prestasi;
use DataDikdas\Model\RegistrasiPesertaDidik;
use DataDikdas\Model\SertifikasiPd;
use DataDikdas\Model\VldPesertaDidik;

/**
 * Base class that represents a query for the 'peserta_didik' table.
 *
 * 
 *
 * @method PesertaDidikQuery orderByPesertaDidikId($order = Criteria::ASC) Order by the peserta_didik_id column
 * @method PesertaDidikQuery orderByNama($order = Criteria::ASC) Order by the nama column
 * @method PesertaDidikQuery orderByJenisKelamin($order = Criteria::ASC) Order by the jenis_kelamin column
 * @method PesertaDidikQuery orderByNisn($order = Criteria::ASC) Order by the nisn column
 * @method PesertaDidikQuery orderByNik($order = Criteria::ASC) Order by the nik column
 * @method PesertaDidikQuery orderByNoKk($order = Criteria::ASC) Order by the no_kk column
 * @method PesertaDidikQuery orderByTempatLahir($order = Criteria::ASC) Order by the tempat_lahir column
 * @method PesertaDidikQuery orderByTanggalLahir($order = Criteria::ASC) Order by the tanggal_lahir column
 * @method PesertaDidikQuery orderByAgamaId($order = Criteria::ASC) Order by the agama_id column
 * @method PesertaDidikQuery orderByKebutuhanKhususId($order = Criteria::ASC) Order by the kebutuhan_khusus_id column
 * @method PesertaDidikQuery orderByAlamatJalan($order = Criteria::ASC) Order by the alamat_jalan column
 * @method PesertaDidikQuery orderByRt($order = Criteria::ASC) Order by the rt column
 * @method PesertaDidikQuery orderByRw($order = Criteria::ASC) Order by the rw column
 * @method PesertaDidikQuery orderByNamaDusun($order = Criteria::ASC) Order by the nama_dusun column
 * @method PesertaDidikQuery orderByDesaKelurahan($order = Criteria::ASC) Order by the desa_kelurahan column
 * @method PesertaDidikQuery orderByKodeWilayah($order = Criteria::ASC) Order by the kode_wilayah column
 * @method PesertaDidikQuery orderByKodePos($order = Criteria::ASC) Order by the kode_pos column
 * @method PesertaDidikQuery orderByLintang($order = Criteria::ASC) Order by the lintang column
 * @method PesertaDidikQuery orderByBujur($order = Criteria::ASC) Order by the bujur column
 * @method PesertaDidikQuery orderByJenisTinggalId($order = Criteria::ASC) Order by the jenis_tinggal_id column
 * @method PesertaDidikQuery orderByAlatTransportasiId($order = Criteria::ASC) Order by the alat_transportasi_id column
 * @method PesertaDidikQuery orderByNikAyah($order = Criteria::ASC) Order by the nik_ayah column
 * @method PesertaDidikQuery orderByNikIbu($order = Criteria::ASC) Order by the nik_ibu column
 * @method PesertaDidikQuery orderByAnakKeberapa($order = Criteria::ASC) Order by the anak_keberapa column
 * @method PesertaDidikQuery orderByNikWali($order = Criteria::ASC) Order by the nik_wali column
 * @method PesertaDidikQuery orderByNomorTeleponRumah($order = Criteria::ASC) Order by the nomor_telepon_rumah column
 * @method PesertaDidikQuery orderByNomorTeleponSeluler($order = Criteria::ASC) Order by the nomor_telepon_seluler column
 * @method PesertaDidikQuery orderByEmail($order = Criteria::ASC) Order by the email column
 * @method PesertaDidikQuery orderByPenerimaKps($order = Criteria::ASC) Order by the penerima_kps column
 * @method PesertaDidikQuery orderByNoKps($order = Criteria::ASC) Order by the no_kps column
 * @method PesertaDidikQuery orderByLayakPip($order = Criteria::ASC) Order by the layak_pip column
 * @method PesertaDidikQuery orderByPenerimaKip($order = Criteria::ASC) Order by the penerima_kip column
 * @method PesertaDidikQuery orderByNoKip($order = Criteria::ASC) Order by the no_kip column
 * @method PesertaDidikQuery orderByNmKip($order = Criteria::ASC) Order by the nm_kip column
 * @method PesertaDidikQuery orderByNoKks($order = Criteria::ASC) Order by the no_kks column
 * @method PesertaDidikQuery orderByRegAktaLahir($order = Criteria::ASC) Order by the reg_akta_lahir column
 * @method PesertaDidikQuery orderByIdLayakPip($order = Criteria::ASC) Order by the id_layak_pip column
 * @method PesertaDidikQuery orderByIdBank($order = Criteria::ASC) Order by the id_bank column
 * @method PesertaDidikQuery orderByRekeningBank($order = Criteria::ASC) Order by the rekening_bank column
 * @method PesertaDidikQuery orderByNamaKcp($order = Criteria::ASC) Order by the nama_kcp column
 * @method PesertaDidikQuery orderByRekeningAtasNama($order = Criteria::ASC) Order by the rekening_atas_nama column
 * @method PesertaDidikQuery orderByStatusData($order = Criteria::ASC) Order by the status_data column
 * @method PesertaDidikQuery orderByNamaAyah($order = Criteria::ASC) Order by the nama_ayah column
 * @method PesertaDidikQuery orderByTahunLahirAyah($order = Criteria::ASC) Order by the tahun_lahir_ayah column
 * @method PesertaDidikQuery orderByJenjangPendidikanAyah($order = Criteria::ASC) Order by the jenjang_pendidikan_ayah column
 * @method PesertaDidikQuery orderByPekerjaanIdAyah($order = Criteria::ASC) Order by the pekerjaan_id_ayah column
 * @method PesertaDidikQuery orderByPenghasilanIdAyah($order = Criteria::ASC) Order by the penghasilan_id_ayah column
 * @method PesertaDidikQuery orderByKebutuhanKhususIdAyah($order = Criteria::ASC) Order by the kebutuhan_khusus_id_ayah column
 * @method PesertaDidikQuery orderByNamaIbuKandung($order = Criteria::ASC) Order by the nama_ibu_kandung column
 * @method PesertaDidikQuery orderByTahunLahirIbu($order = Criteria::ASC) Order by the tahun_lahir_ibu column
 * @method PesertaDidikQuery orderByJenjangPendidikanIbu($order = Criteria::ASC) Order by the jenjang_pendidikan_ibu column
 * @method PesertaDidikQuery orderByPenghasilanIdIbu($order = Criteria::ASC) Order by the penghasilan_id_ibu column
 * @method PesertaDidikQuery orderByPekerjaanIdIbu($order = Criteria::ASC) Order by the pekerjaan_id_ibu column
 * @method PesertaDidikQuery orderByKebutuhanKhususIdIbu($order = Criteria::ASC) Order by the kebutuhan_khusus_id_ibu column
 * @method PesertaDidikQuery orderByNamaWali($order = Criteria::ASC) Order by the nama_wali column
 * @method PesertaDidikQuery orderByTahunLahirWali($order = Criteria::ASC) Order by the tahun_lahir_wali column
 * @method PesertaDidikQuery orderByJenjangPendidikanWali($order = Criteria::ASC) Order by the jenjang_pendidikan_wali column
 * @method PesertaDidikQuery orderByPekerjaanIdWali($order = Criteria::ASC) Order by the pekerjaan_id_wali column
 * @method PesertaDidikQuery orderByPenghasilanIdWali($order = Criteria::ASC) Order by the penghasilan_id_wali column
 * @method PesertaDidikQuery orderByKewarganegaraan($order = Criteria::ASC) Order by the kewarganegaraan column
 * @method PesertaDidikQuery orderByPekerjaanId($order = Criteria::ASC) Order by the pekerjaan_id column
 * @method PesertaDidikQuery orderByCreateDate($order = Criteria::ASC) Order by the create_date column
 * @method PesertaDidikQuery orderByLastUpdate($order = Criteria::ASC) Order by the last_update column
 * @method PesertaDidikQuery orderBySoftDelete($order = Criteria::ASC) Order by the soft_delete column
 * @method PesertaDidikQuery orderByLastSync($order = Criteria::ASC) Order by the last_sync column
 * @method PesertaDidikQuery orderByUpdaterId($order = Criteria::ASC) Order by the updater_id column
 *
 * @method PesertaDidikQuery groupByPesertaDidikId() Group by the peserta_didik_id column
 * @method PesertaDidikQuery groupByNama() Group by the nama column
 * @method PesertaDidikQuery groupByJenisKelamin() Group by the jenis_kelamin column
 * @method PesertaDidikQuery groupByNisn() Group by the nisn column
 * @method PesertaDidikQuery groupByNik() Group by the nik column
 * @method PesertaDidikQuery groupByNoKk() Group by the no_kk column
 * @method PesertaDidikQuery groupByTempatLahir() Group by the tempat_lahir column
 * @method PesertaDidikQuery groupByTanggalLahir() Group by the tanggal_lahir column
 * @method PesertaDidikQuery groupByAgamaId() Group by the agama_id column
 * @method PesertaDidikQuery groupByKebutuhanKhususId() Group by the kebutuhan_khusus_id column
 * @method PesertaDidikQuery groupByAlamatJalan() Group by the alamat_jalan column
 * @method PesertaDidikQuery groupByRt() Group by the rt column
 * @method PesertaDidikQuery groupByRw() Group by the rw column
 * @method PesertaDidikQuery groupByNamaDusun() Group by the nama_dusun column
 * @method PesertaDidikQuery groupByDesaKelurahan() Group by the desa_kelurahan column
 * @method PesertaDidikQuery groupByKodeWilayah() Group by the kode_wilayah column
 * @method PesertaDidikQuery groupByKodePos() Group by the kode_pos column
 * @method PesertaDidikQuery groupByLintang() Group by the lintang column
 * @method PesertaDidikQuery groupByBujur() Group by the bujur column
 * @method PesertaDidikQuery groupByJenisTinggalId() Group by the jenis_tinggal_id column
 * @method PesertaDidikQuery groupByAlatTransportasiId() Group by the alat_transportasi_id column
 * @method PesertaDidikQuery groupByNikAyah() Group by the nik_ayah column
 * @method PesertaDidikQuery groupByNikIbu() Group by the nik_ibu column
 * @method PesertaDidikQuery groupByAnakKeberapa() Group by the anak_keberapa column
 * @method PesertaDidikQuery groupByNikWali() Group by the nik_wali column
 * @method PesertaDidikQuery groupByNomorTeleponRumah() Group by the nomor_telepon_rumah column
 * @method PesertaDidikQuery groupByNomorTeleponSeluler() Group by the nomor_telepon_seluler column
 * @method PesertaDidikQuery groupByEmail() Group by the email column
 * @method PesertaDidikQuery groupByPenerimaKps() Group by the penerima_kps column
 * @method PesertaDidikQuery groupByNoKps() Group by the no_kps column
 * @method PesertaDidikQuery groupByLayakPip() Group by the layak_pip column
 * @method PesertaDidikQuery groupByPenerimaKip() Group by the penerima_kip column
 * @method PesertaDidikQuery groupByNoKip() Group by the no_kip column
 * @method PesertaDidikQuery groupByNmKip() Group by the nm_kip column
 * @method PesertaDidikQuery groupByNoKks() Group by the no_kks column
 * @method PesertaDidikQuery groupByRegAktaLahir() Group by the reg_akta_lahir column
 * @method PesertaDidikQuery groupByIdLayakPip() Group by the id_layak_pip column
 * @method PesertaDidikQuery groupByIdBank() Group by the id_bank column
 * @method PesertaDidikQuery groupByRekeningBank() Group by the rekening_bank column
 * @method PesertaDidikQuery groupByNamaKcp() Group by the nama_kcp column
 * @method PesertaDidikQuery groupByRekeningAtasNama() Group by the rekening_atas_nama column
 * @method PesertaDidikQuery groupByStatusData() Group by the status_data column
 * @method PesertaDidikQuery groupByNamaAyah() Group by the nama_ayah column
 * @method PesertaDidikQuery groupByTahunLahirAyah() Group by the tahun_lahir_ayah column
 * @method PesertaDidikQuery groupByJenjangPendidikanAyah() Group by the jenjang_pendidikan_ayah column
 * @method PesertaDidikQuery groupByPekerjaanIdAyah() Group by the pekerjaan_id_ayah column
 * @method PesertaDidikQuery groupByPenghasilanIdAyah() Group by the penghasilan_id_ayah column
 * @method PesertaDidikQuery groupByKebutuhanKhususIdAyah() Group by the kebutuhan_khusus_id_ayah column
 * @method PesertaDidikQuery groupByNamaIbuKandung() Group by the nama_ibu_kandung column
 * @method PesertaDidikQuery groupByTahunLahirIbu() Group by the tahun_lahir_ibu column
 * @method PesertaDidikQuery groupByJenjangPendidikanIbu() Group by the jenjang_pendidikan_ibu column
 * @method PesertaDidikQuery groupByPenghasilanIdIbu() Group by the penghasilan_id_ibu column
 * @method PesertaDidikQuery groupByPekerjaanIdIbu() Group by the pekerjaan_id_ibu column
 * @method PesertaDidikQuery groupByKebutuhanKhususIdIbu() Group by the kebutuhan_khusus_id_ibu column
 * @method PesertaDidikQuery groupByNamaWali() Group by the nama_wali column
 * @method PesertaDidikQuery groupByTahunLahirWali() Group by the tahun_lahir_wali column
 * @method PesertaDidikQuery groupByJenjangPendidikanWali() Group by the jenjang_pendidikan_wali column
 * @method PesertaDidikQuery groupByPekerjaanIdWali() Group by the pekerjaan_id_wali column
 * @method PesertaDidikQuery groupByPenghasilanIdWali() Group by the penghasilan_id_wali column
 * @method PesertaDidikQuery groupByKewarganegaraan() Group by the kewarganegaraan column
 * @method PesertaDidikQuery groupByPekerjaanId() Group by the pekerjaan_id column
 * @method PesertaDidikQuery groupByCreateDate() Group by the create_date column
 * @method PesertaDidikQuery groupByLastUpdate() Group by the last_update column
 * @method PesertaDidikQuery groupBySoftDelete() Group by the soft_delete column
 * @method PesertaDidikQuery groupByLastSync() Group by the last_sync column
 * @method PesertaDidikQuery groupByUpdaterId() Group by the updater_id column
 *
 * @method PesertaDidikQuery leftJoin($relation) Adds a LEFT JOIN clause to the query
 * @method PesertaDidikQuery rightJoin($relation) Adds a RIGHT JOIN clause to the query
 * @method PesertaDidikQuery innerJoin($relation) Adds a INNER JOIN clause to the query
 *
 * @method PesertaDidikQuery leftJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdAyah relation
 * @method PesertaDidikQuery rightJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdAyah relation
 * @method PesertaDidikQuery innerJoinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdAyah relation
 *
 * @method PesertaDidikQuery leftJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdIbu relation
 * @method PesertaDidikQuery rightJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdIbu relation
 * @method PesertaDidikQuery innerJoinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdIbu relation
 *
 * @method PesertaDidikQuery leftJoinNegara($relationAlias = null) Adds a LEFT JOIN clause to the query using the Negara relation
 * @method PesertaDidikQuery rightJoinNegara($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Negara relation
 * @method PesertaDidikQuery innerJoinNegara($relationAlias = null) Adds a INNER JOIN clause to the query using the Negara relation
 *
 * @method PesertaDidikQuery leftJoinAlasanLayakPip($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlasanLayakPip relation
 * @method PesertaDidikQuery rightJoinAlasanLayakPip($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlasanLayakPip relation
 * @method PesertaDidikQuery innerJoinAlasanLayakPip($relationAlias = null) Adds a INNER JOIN clause to the query using the AlasanLayakPip relation
 *
 * @method PesertaDidikQuery leftJoinBank($relationAlias = null) Adds a LEFT JOIN clause to the query using the Bank relation
 * @method PesertaDidikQuery rightJoinBank($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Bank relation
 * @method PesertaDidikQuery innerJoinBank($relationAlias = null) Adds a INNER JOIN clause to the query using the Bank relation
 *
 * @method PesertaDidikQuery leftJoinMstWilayah($relationAlias = null) Adds a LEFT JOIN clause to the query using the MstWilayah relation
 * @method PesertaDidikQuery rightJoinMstWilayah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the MstWilayah relation
 * @method PesertaDidikQuery innerJoinMstWilayah($relationAlias = null) Adds a INNER JOIN clause to the query using the MstWilayah relation
 *
 * @method PesertaDidikQuery leftJoinKebutuhanKhususRelatedByKebutuhanKhususId($relationAlias = null) Adds a LEFT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususId relation
 * @method PesertaDidikQuery rightJoinKebutuhanKhususRelatedByKebutuhanKhususId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususId relation
 * @method PesertaDidikQuery innerJoinKebutuhanKhususRelatedByKebutuhanKhususId($relationAlias = null) Adds a INNER JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususId relation
 *
 * @method PesertaDidikQuery leftJoinPekerjaanRelatedByPekerjaanId($relationAlias = null) Adds a LEFT JOIN clause to the query using the PekerjaanRelatedByPekerjaanId relation
 * @method PesertaDidikQuery rightJoinPekerjaanRelatedByPekerjaanId($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PekerjaanRelatedByPekerjaanId relation
 * @method PesertaDidikQuery innerJoinPekerjaanRelatedByPekerjaanId($relationAlias = null) Adds a INNER JOIN clause to the query using the PekerjaanRelatedByPekerjaanId relation
 *
 * @method PesertaDidikQuery leftJoinAgama($relationAlias = null) Adds a LEFT JOIN clause to the query using the Agama relation
 * @method PesertaDidikQuery rightJoinAgama($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Agama relation
 * @method PesertaDidikQuery innerJoinAgama($relationAlias = null) Adds a INNER JOIN clause to the query using the Agama relation
 *
 * @method PesertaDidikQuery leftJoinPenghasilanRelatedByPenghasilanIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdAyah relation
 * @method PesertaDidikQuery rightJoinPenghasilanRelatedByPenghasilanIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdAyah relation
 * @method PesertaDidikQuery innerJoinPenghasilanRelatedByPenghasilanIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdAyah relation
 *
 * @method PesertaDidikQuery leftJoinJenisTinggal($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenisTinggal relation
 * @method PesertaDidikQuery rightJoinJenisTinggal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenisTinggal relation
 * @method PesertaDidikQuery innerJoinJenisTinggal($relationAlias = null) Adds a INNER JOIN clause to the query using the JenisTinggal relation
 *
 * @method PesertaDidikQuery leftJoinAlatTransportasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the AlatTransportasi relation
 * @method PesertaDidikQuery rightJoinAlatTransportasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AlatTransportasi relation
 * @method PesertaDidikQuery innerJoinAlatTransportasi($relationAlias = null) Adds a INNER JOIN clause to the query using the AlatTransportasi relation
 *
 * @method PesertaDidikQuery leftJoinPekerjaanRelatedByPekerjaanIdAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdAyah relation
 * @method PesertaDidikQuery rightJoinPekerjaanRelatedByPekerjaanIdAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdAyah relation
 * @method PesertaDidikQuery innerJoinPekerjaanRelatedByPekerjaanIdAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdAyah relation
 *
 * @method PesertaDidikQuery leftJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanIbu relation
 * @method PesertaDidikQuery rightJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanIbu relation
 * @method PesertaDidikQuery innerJoinJenjangPendidikanRelatedByJenjangPendidikanIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanIbu relation
 *
 * @method PesertaDidikQuery leftJoinPenghasilanRelatedByPenghasilanIdWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdWali relation
 * @method PesertaDidikQuery rightJoinPenghasilanRelatedByPenghasilanIdWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdWali relation
 * @method PesertaDidikQuery innerJoinPenghasilanRelatedByPenghasilanIdWali($relationAlias = null) Adds a INNER JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdWali relation
 *
 * @method PesertaDidikQuery leftJoinPekerjaanRelatedByPekerjaanIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdIbu relation
 * @method PesertaDidikQuery rightJoinPekerjaanRelatedByPekerjaanIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdIbu relation
 * @method PesertaDidikQuery innerJoinPekerjaanRelatedByPekerjaanIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdIbu relation
 *
 * @method PesertaDidikQuery leftJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanAyah relation
 * @method PesertaDidikQuery rightJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanAyah relation
 * @method PesertaDidikQuery innerJoinJenjangPendidikanRelatedByJenjangPendidikanAyah($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanAyah relation
 *
 * @method PesertaDidikQuery leftJoinPenghasilanRelatedByPenghasilanIdIbu($relationAlias = null) Adds a LEFT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdIbu relation
 * @method PesertaDidikQuery rightJoinPenghasilanRelatedByPenghasilanIdIbu($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdIbu relation
 * @method PesertaDidikQuery innerJoinPenghasilanRelatedByPenghasilanIdIbu($relationAlias = null) Adds a INNER JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdIbu relation
 *
 * @method PesertaDidikQuery leftJoinPekerjaanRelatedByPekerjaanIdWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdWali relation
 * @method PesertaDidikQuery rightJoinPekerjaanRelatedByPekerjaanIdWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdWali relation
 * @method PesertaDidikQuery innerJoinPekerjaanRelatedByPekerjaanIdWali($relationAlias = null) Adds a INNER JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdWali relation
 *
 * @method PesertaDidikQuery leftJoinJenjangPendidikanRelatedByJenjangPendidikanWali($relationAlias = null) Adds a LEFT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanWali relation
 * @method PesertaDidikQuery rightJoinJenjangPendidikanRelatedByJenjangPendidikanWali($relationAlias = null) Adds a RIGHT JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanWali relation
 * @method PesertaDidikQuery innerJoinJenjangPendidikanRelatedByJenjangPendidikanWali($relationAlias = null) Adds a INNER JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanWali relation
 *
 * @method PesertaDidikQuery leftJoinAnggotaPanitia($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaPanitia relation
 * @method PesertaDidikQuery rightJoinAnggotaPanitia($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaPanitia relation
 * @method PesertaDidikQuery innerJoinAnggotaPanitia($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaPanitia relation
 *
 * @method PesertaDidikQuery leftJoinAnggotaRombel($relationAlias = null) Adds a LEFT JOIN clause to the query using the AnggotaRombel relation
 * @method PesertaDidikQuery rightJoinAnggotaRombel($relationAlias = null) Adds a RIGHT JOIN clause to the query using the AnggotaRombel relation
 * @method PesertaDidikQuery innerJoinAnggotaRombel($relationAlias = null) Adds a INNER JOIN clause to the query using the AnggotaRombel relation
 *
 * @method PesertaDidikQuery leftJoinBeasiswaPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the BeasiswaPesertaDidik relation
 * @method PesertaDidikQuery rightJoinBeasiswaPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the BeasiswaPesertaDidik relation
 * @method PesertaDidikQuery innerJoinBeasiswaPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the BeasiswaPesertaDidik relation
 *
 * @method PesertaDidikQuery leftJoinKesejahteraanPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the KesejahteraanPd relation
 * @method PesertaDidikQuery rightJoinKesejahteraanPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KesejahteraanPd relation
 * @method PesertaDidikQuery innerJoinKesejahteraanPd($relationAlias = null) Adds a INNER JOIN clause to the query using the KesejahteraanPd relation
 *
 * @method PesertaDidikQuery leftJoinKitasPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the KitasPd relation
 * @method PesertaDidikQuery rightJoinKitasPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the KitasPd relation
 * @method PesertaDidikQuery innerJoinKitasPd($relationAlias = null) Adds a INNER JOIN clause to the query using the KitasPd relation
 *
 * @method PesertaDidikQuery leftJoinPasporPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the PasporPd relation
 * @method PesertaDidikQuery rightJoinPasporPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PasporPd relation
 * @method PesertaDidikQuery innerJoinPasporPd($relationAlias = null) Adds a INNER JOIN clause to the query using the PasporPd relation
 *
 * @method PesertaDidikQuery leftJoinPesertaDidikBaru($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikBaru relation
 * @method PesertaDidikQuery rightJoinPesertaDidikBaru($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikBaru relation
 * @method PesertaDidikQuery innerJoinPesertaDidikBaru($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikBaru relation
 *
 * @method PesertaDidikQuery leftJoinPesertaDidikLongitudinal($relationAlias = null) Adds a LEFT JOIN clause to the query using the PesertaDidikLongitudinal relation
 * @method PesertaDidikQuery rightJoinPesertaDidikLongitudinal($relationAlias = null) Adds a RIGHT JOIN clause to the query using the PesertaDidikLongitudinal relation
 * @method PesertaDidikQuery innerJoinPesertaDidikLongitudinal($relationAlias = null) Adds a INNER JOIN clause to the query using the PesertaDidikLongitudinal relation
 *
 * @method PesertaDidikQuery leftJoinPrestasi($relationAlias = null) Adds a LEFT JOIN clause to the query using the Prestasi relation
 * @method PesertaDidikQuery rightJoinPrestasi($relationAlias = null) Adds a RIGHT JOIN clause to the query using the Prestasi relation
 * @method PesertaDidikQuery innerJoinPrestasi($relationAlias = null) Adds a INNER JOIN clause to the query using the Prestasi relation
 *
 * @method PesertaDidikQuery leftJoinRegistrasiPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method PesertaDidikQuery rightJoinRegistrasiPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the RegistrasiPesertaDidik relation
 * @method PesertaDidikQuery innerJoinRegistrasiPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the RegistrasiPesertaDidik relation
 *
 * @method PesertaDidikQuery leftJoinSertifikasiPd($relationAlias = null) Adds a LEFT JOIN clause to the query using the SertifikasiPd relation
 * @method PesertaDidikQuery rightJoinSertifikasiPd($relationAlias = null) Adds a RIGHT JOIN clause to the query using the SertifikasiPd relation
 * @method PesertaDidikQuery innerJoinSertifikasiPd($relationAlias = null) Adds a INNER JOIN clause to the query using the SertifikasiPd relation
 *
 * @method PesertaDidikQuery leftJoinVldPesertaDidik($relationAlias = null) Adds a LEFT JOIN clause to the query using the VldPesertaDidik relation
 * @method PesertaDidikQuery rightJoinVldPesertaDidik($relationAlias = null) Adds a RIGHT JOIN clause to the query using the VldPesertaDidik relation
 * @method PesertaDidikQuery innerJoinVldPesertaDidik($relationAlias = null) Adds a INNER JOIN clause to the query using the VldPesertaDidik relation
 *
 * @method PesertaDidik findOne(PropelPDO $con = null) Return the first PesertaDidik matching the query
 * @method PesertaDidik findOneOrCreate(PropelPDO $con = null) Return the first PesertaDidik matching the query, or a new PesertaDidik object populated from the query conditions when no match is found
 *
 * @method PesertaDidik findOneByNama(string $nama) Return the first PesertaDidik filtered by the nama column
 * @method PesertaDidik findOneByJenisKelamin(string $jenis_kelamin) Return the first PesertaDidik filtered by the jenis_kelamin column
 * @method PesertaDidik findOneByNisn(string $nisn) Return the first PesertaDidik filtered by the nisn column
 * @method PesertaDidik findOneByNik(string $nik) Return the first PesertaDidik filtered by the nik column
 * @method PesertaDidik findOneByNoKk(string $no_kk) Return the first PesertaDidik filtered by the no_kk column
 * @method PesertaDidik findOneByTempatLahir(string $tempat_lahir) Return the first PesertaDidik filtered by the tempat_lahir column
 * @method PesertaDidik findOneByTanggalLahir(string $tanggal_lahir) Return the first PesertaDidik filtered by the tanggal_lahir column
 * @method PesertaDidik findOneByAgamaId(int $agama_id) Return the first PesertaDidik filtered by the agama_id column
 * @method PesertaDidik findOneByKebutuhanKhususId(int $kebutuhan_khusus_id) Return the first PesertaDidik filtered by the kebutuhan_khusus_id column
 * @method PesertaDidik findOneByAlamatJalan(string $alamat_jalan) Return the first PesertaDidik filtered by the alamat_jalan column
 * @method PesertaDidik findOneByRt(string $rt) Return the first PesertaDidik filtered by the rt column
 * @method PesertaDidik findOneByRw(string $rw) Return the first PesertaDidik filtered by the rw column
 * @method PesertaDidik findOneByNamaDusun(string $nama_dusun) Return the first PesertaDidik filtered by the nama_dusun column
 * @method PesertaDidik findOneByDesaKelurahan(string $desa_kelurahan) Return the first PesertaDidik filtered by the desa_kelurahan column
 * @method PesertaDidik findOneByKodeWilayah(string $kode_wilayah) Return the first PesertaDidik filtered by the kode_wilayah column
 * @method PesertaDidik findOneByKodePos(string $kode_pos) Return the first PesertaDidik filtered by the kode_pos column
 * @method PesertaDidik findOneByLintang(string $lintang) Return the first PesertaDidik filtered by the lintang column
 * @method PesertaDidik findOneByBujur(string $bujur) Return the first PesertaDidik filtered by the bujur column
 * @method PesertaDidik findOneByJenisTinggalId(string $jenis_tinggal_id) Return the first PesertaDidik filtered by the jenis_tinggal_id column
 * @method PesertaDidik findOneByAlatTransportasiId(string $alat_transportasi_id) Return the first PesertaDidik filtered by the alat_transportasi_id column
 * @method PesertaDidik findOneByNikAyah(string $nik_ayah) Return the first PesertaDidik filtered by the nik_ayah column
 * @method PesertaDidik findOneByNikIbu(string $nik_ibu) Return the first PesertaDidik filtered by the nik_ibu column
 * @method PesertaDidik findOneByAnakKeberapa(string $anak_keberapa) Return the first PesertaDidik filtered by the anak_keberapa column
 * @method PesertaDidik findOneByNikWali(string $nik_wali) Return the first PesertaDidik filtered by the nik_wali column
 * @method PesertaDidik findOneByNomorTeleponRumah(string $nomor_telepon_rumah) Return the first PesertaDidik filtered by the nomor_telepon_rumah column
 * @method PesertaDidik findOneByNomorTeleponSeluler(string $nomor_telepon_seluler) Return the first PesertaDidik filtered by the nomor_telepon_seluler column
 * @method PesertaDidik findOneByEmail(string $email) Return the first PesertaDidik filtered by the email column
 * @method PesertaDidik findOneByPenerimaKps(string $penerima_kps) Return the first PesertaDidik filtered by the penerima_kps column
 * @method PesertaDidik findOneByNoKps(string $no_kps) Return the first PesertaDidik filtered by the no_kps column
 * @method PesertaDidik findOneByLayakPip(string $layak_pip) Return the first PesertaDidik filtered by the layak_pip column
 * @method PesertaDidik findOneByPenerimaKip(string $penerima_kip) Return the first PesertaDidik filtered by the penerima_kip column
 * @method PesertaDidik findOneByNoKip(string $no_kip) Return the first PesertaDidik filtered by the no_kip column
 * @method PesertaDidik findOneByNmKip(string $nm_kip) Return the first PesertaDidik filtered by the nm_kip column
 * @method PesertaDidik findOneByNoKks(string $no_kks) Return the first PesertaDidik filtered by the no_kks column
 * @method PesertaDidik findOneByRegAktaLahir(string $reg_akta_lahir) Return the first PesertaDidik filtered by the reg_akta_lahir column
 * @method PesertaDidik findOneByIdLayakPip(string $id_layak_pip) Return the first PesertaDidik filtered by the id_layak_pip column
 * @method PesertaDidik findOneByIdBank(string $id_bank) Return the first PesertaDidik filtered by the id_bank column
 * @method PesertaDidik findOneByRekeningBank(string $rekening_bank) Return the first PesertaDidik filtered by the rekening_bank column
 * @method PesertaDidik findOneByNamaKcp(string $nama_kcp) Return the first PesertaDidik filtered by the nama_kcp column
 * @method PesertaDidik findOneByRekeningAtasNama(string $rekening_atas_nama) Return the first PesertaDidik filtered by the rekening_atas_nama column
 * @method PesertaDidik findOneByStatusData(int $status_data) Return the first PesertaDidik filtered by the status_data column
 * @method PesertaDidik findOneByNamaAyah(string $nama_ayah) Return the first PesertaDidik filtered by the nama_ayah column
 * @method PesertaDidik findOneByTahunLahirAyah(string $tahun_lahir_ayah) Return the first PesertaDidik filtered by the tahun_lahir_ayah column
 * @method PesertaDidik findOneByJenjangPendidikanAyah(string $jenjang_pendidikan_ayah) Return the first PesertaDidik filtered by the jenjang_pendidikan_ayah column
 * @method PesertaDidik findOneByPekerjaanIdAyah(int $pekerjaan_id_ayah) Return the first PesertaDidik filtered by the pekerjaan_id_ayah column
 * @method PesertaDidik findOneByPenghasilanIdAyah(int $penghasilan_id_ayah) Return the first PesertaDidik filtered by the penghasilan_id_ayah column
 * @method PesertaDidik findOneByKebutuhanKhususIdAyah(int $kebutuhan_khusus_id_ayah) Return the first PesertaDidik filtered by the kebutuhan_khusus_id_ayah column
 * @method PesertaDidik findOneByNamaIbuKandung(string $nama_ibu_kandung) Return the first PesertaDidik filtered by the nama_ibu_kandung column
 * @method PesertaDidik findOneByTahunLahirIbu(string $tahun_lahir_ibu) Return the first PesertaDidik filtered by the tahun_lahir_ibu column
 * @method PesertaDidik findOneByJenjangPendidikanIbu(string $jenjang_pendidikan_ibu) Return the first PesertaDidik filtered by the jenjang_pendidikan_ibu column
 * @method PesertaDidik findOneByPenghasilanIdIbu(int $penghasilan_id_ibu) Return the first PesertaDidik filtered by the penghasilan_id_ibu column
 * @method PesertaDidik findOneByPekerjaanIdIbu(int $pekerjaan_id_ibu) Return the first PesertaDidik filtered by the pekerjaan_id_ibu column
 * @method PesertaDidik findOneByKebutuhanKhususIdIbu(int $kebutuhan_khusus_id_ibu) Return the first PesertaDidik filtered by the kebutuhan_khusus_id_ibu column
 * @method PesertaDidik findOneByNamaWali(string $nama_wali) Return the first PesertaDidik filtered by the nama_wali column
 * @method PesertaDidik findOneByTahunLahirWali(string $tahun_lahir_wali) Return the first PesertaDidik filtered by the tahun_lahir_wali column
 * @method PesertaDidik findOneByJenjangPendidikanWali(string $jenjang_pendidikan_wali) Return the first PesertaDidik filtered by the jenjang_pendidikan_wali column
 * @method PesertaDidik findOneByPekerjaanIdWali(int $pekerjaan_id_wali) Return the first PesertaDidik filtered by the pekerjaan_id_wali column
 * @method PesertaDidik findOneByPenghasilanIdWali(int $penghasilan_id_wali) Return the first PesertaDidik filtered by the penghasilan_id_wali column
 * @method PesertaDidik findOneByKewarganegaraan(string $kewarganegaraan) Return the first PesertaDidik filtered by the kewarganegaraan column
 * @method PesertaDidik findOneByPekerjaanId(int $pekerjaan_id) Return the first PesertaDidik filtered by the pekerjaan_id column
 * @method PesertaDidik findOneByCreateDate(string $create_date) Return the first PesertaDidik filtered by the create_date column
 * @method PesertaDidik findOneByLastUpdate(string $last_update) Return the first PesertaDidik filtered by the last_update column
 * @method PesertaDidik findOneBySoftDelete(string $soft_delete) Return the first PesertaDidik filtered by the soft_delete column
 * @method PesertaDidik findOneByLastSync(string $last_sync) Return the first PesertaDidik filtered by the last_sync column
 * @method PesertaDidik findOneByUpdaterId(string $updater_id) Return the first PesertaDidik filtered by the updater_id column
 *
 * @method array findByPesertaDidikId(string $peserta_didik_id) Return PesertaDidik objects filtered by the peserta_didik_id column
 * @method array findByNama(string $nama) Return PesertaDidik objects filtered by the nama column
 * @method array findByJenisKelamin(string $jenis_kelamin) Return PesertaDidik objects filtered by the jenis_kelamin column
 * @method array findByNisn(string $nisn) Return PesertaDidik objects filtered by the nisn column
 * @method array findByNik(string $nik) Return PesertaDidik objects filtered by the nik column
 * @method array findByNoKk(string $no_kk) Return PesertaDidik objects filtered by the no_kk column
 * @method array findByTempatLahir(string $tempat_lahir) Return PesertaDidik objects filtered by the tempat_lahir column
 * @method array findByTanggalLahir(string $tanggal_lahir) Return PesertaDidik objects filtered by the tanggal_lahir column
 * @method array findByAgamaId(int $agama_id) Return PesertaDidik objects filtered by the agama_id column
 * @method array findByKebutuhanKhususId(int $kebutuhan_khusus_id) Return PesertaDidik objects filtered by the kebutuhan_khusus_id column
 * @method array findByAlamatJalan(string $alamat_jalan) Return PesertaDidik objects filtered by the alamat_jalan column
 * @method array findByRt(string $rt) Return PesertaDidik objects filtered by the rt column
 * @method array findByRw(string $rw) Return PesertaDidik objects filtered by the rw column
 * @method array findByNamaDusun(string $nama_dusun) Return PesertaDidik objects filtered by the nama_dusun column
 * @method array findByDesaKelurahan(string $desa_kelurahan) Return PesertaDidik objects filtered by the desa_kelurahan column
 * @method array findByKodeWilayah(string $kode_wilayah) Return PesertaDidik objects filtered by the kode_wilayah column
 * @method array findByKodePos(string $kode_pos) Return PesertaDidik objects filtered by the kode_pos column
 * @method array findByLintang(string $lintang) Return PesertaDidik objects filtered by the lintang column
 * @method array findByBujur(string $bujur) Return PesertaDidik objects filtered by the bujur column
 * @method array findByJenisTinggalId(string $jenis_tinggal_id) Return PesertaDidik objects filtered by the jenis_tinggal_id column
 * @method array findByAlatTransportasiId(string $alat_transportasi_id) Return PesertaDidik objects filtered by the alat_transportasi_id column
 * @method array findByNikAyah(string $nik_ayah) Return PesertaDidik objects filtered by the nik_ayah column
 * @method array findByNikIbu(string $nik_ibu) Return PesertaDidik objects filtered by the nik_ibu column
 * @method array findByAnakKeberapa(string $anak_keberapa) Return PesertaDidik objects filtered by the anak_keberapa column
 * @method array findByNikWali(string $nik_wali) Return PesertaDidik objects filtered by the nik_wali column
 * @method array findByNomorTeleponRumah(string $nomor_telepon_rumah) Return PesertaDidik objects filtered by the nomor_telepon_rumah column
 * @method array findByNomorTeleponSeluler(string $nomor_telepon_seluler) Return PesertaDidik objects filtered by the nomor_telepon_seluler column
 * @method array findByEmail(string $email) Return PesertaDidik objects filtered by the email column
 * @method array findByPenerimaKps(string $penerima_kps) Return PesertaDidik objects filtered by the penerima_kps column
 * @method array findByNoKps(string $no_kps) Return PesertaDidik objects filtered by the no_kps column
 * @method array findByLayakPip(string $layak_pip) Return PesertaDidik objects filtered by the layak_pip column
 * @method array findByPenerimaKip(string $penerima_kip) Return PesertaDidik objects filtered by the penerima_kip column
 * @method array findByNoKip(string $no_kip) Return PesertaDidik objects filtered by the no_kip column
 * @method array findByNmKip(string $nm_kip) Return PesertaDidik objects filtered by the nm_kip column
 * @method array findByNoKks(string $no_kks) Return PesertaDidik objects filtered by the no_kks column
 * @method array findByRegAktaLahir(string $reg_akta_lahir) Return PesertaDidik objects filtered by the reg_akta_lahir column
 * @method array findByIdLayakPip(string $id_layak_pip) Return PesertaDidik objects filtered by the id_layak_pip column
 * @method array findByIdBank(string $id_bank) Return PesertaDidik objects filtered by the id_bank column
 * @method array findByRekeningBank(string $rekening_bank) Return PesertaDidik objects filtered by the rekening_bank column
 * @method array findByNamaKcp(string $nama_kcp) Return PesertaDidik objects filtered by the nama_kcp column
 * @method array findByRekeningAtasNama(string $rekening_atas_nama) Return PesertaDidik objects filtered by the rekening_atas_nama column
 * @method array findByStatusData(int $status_data) Return PesertaDidik objects filtered by the status_data column
 * @method array findByNamaAyah(string $nama_ayah) Return PesertaDidik objects filtered by the nama_ayah column
 * @method array findByTahunLahirAyah(string $tahun_lahir_ayah) Return PesertaDidik objects filtered by the tahun_lahir_ayah column
 * @method array findByJenjangPendidikanAyah(string $jenjang_pendidikan_ayah) Return PesertaDidik objects filtered by the jenjang_pendidikan_ayah column
 * @method array findByPekerjaanIdAyah(int $pekerjaan_id_ayah) Return PesertaDidik objects filtered by the pekerjaan_id_ayah column
 * @method array findByPenghasilanIdAyah(int $penghasilan_id_ayah) Return PesertaDidik objects filtered by the penghasilan_id_ayah column
 * @method array findByKebutuhanKhususIdAyah(int $kebutuhan_khusus_id_ayah) Return PesertaDidik objects filtered by the kebutuhan_khusus_id_ayah column
 * @method array findByNamaIbuKandung(string $nama_ibu_kandung) Return PesertaDidik objects filtered by the nama_ibu_kandung column
 * @method array findByTahunLahirIbu(string $tahun_lahir_ibu) Return PesertaDidik objects filtered by the tahun_lahir_ibu column
 * @method array findByJenjangPendidikanIbu(string $jenjang_pendidikan_ibu) Return PesertaDidik objects filtered by the jenjang_pendidikan_ibu column
 * @method array findByPenghasilanIdIbu(int $penghasilan_id_ibu) Return PesertaDidik objects filtered by the penghasilan_id_ibu column
 * @method array findByPekerjaanIdIbu(int $pekerjaan_id_ibu) Return PesertaDidik objects filtered by the pekerjaan_id_ibu column
 * @method array findByKebutuhanKhususIdIbu(int $kebutuhan_khusus_id_ibu) Return PesertaDidik objects filtered by the kebutuhan_khusus_id_ibu column
 * @method array findByNamaWali(string $nama_wali) Return PesertaDidik objects filtered by the nama_wali column
 * @method array findByTahunLahirWali(string $tahun_lahir_wali) Return PesertaDidik objects filtered by the tahun_lahir_wali column
 * @method array findByJenjangPendidikanWali(string $jenjang_pendidikan_wali) Return PesertaDidik objects filtered by the jenjang_pendidikan_wali column
 * @method array findByPekerjaanIdWali(int $pekerjaan_id_wali) Return PesertaDidik objects filtered by the pekerjaan_id_wali column
 * @method array findByPenghasilanIdWali(int $penghasilan_id_wali) Return PesertaDidik objects filtered by the penghasilan_id_wali column
 * @method array findByKewarganegaraan(string $kewarganegaraan) Return PesertaDidik objects filtered by the kewarganegaraan column
 * @method array findByPekerjaanId(int $pekerjaan_id) Return PesertaDidik objects filtered by the pekerjaan_id column
 * @method array findByCreateDate(string $create_date) Return PesertaDidik objects filtered by the create_date column
 * @method array findByLastUpdate(string $last_update) Return PesertaDidik objects filtered by the last_update column
 * @method array findBySoftDelete(string $soft_delete) Return PesertaDidik objects filtered by the soft_delete column
 * @method array findByLastSync(string $last_sync) Return PesertaDidik objects filtered by the last_sync column
 * @method array findByUpdaterId(string $updater_id) Return PesertaDidik objects filtered by the updater_id column
 *
 * @package    propel.generator.DataDikdas.Model.om
 */
abstract class BasePesertaDidikQuery extends ModelCriteria
{
    /**
     * Initializes internal state of BasePesertaDidikQuery object.
     *
     * @param     string $dbName The dabase name
     * @param     string $modelName The phpName of a model, e.g. 'Book'
     * @param     string $modelAlias The alias for the model in this query, e.g. 'b'
     */
    public function __construct($dbName = 'pendataan', $modelName = 'DataDikdas\\Model\\PesertaDidik', $modelAlias = null)
    {
        parent::__construct($dbName, $modelName, $modelAlias);
    }

    /**
     * Returns a new PesertaDidikQuery object.
     *
     * @param     string $modelAlias The alias of a model in the query
     * @param   PesertaDidikQuery|Criteria $criteria Optional Criteria to build the query from
     *
     * @return PesertaDidikQuery
     */
    public static function create($modelAlias = null, $criteria = null)
    {
        if ($criteria instanceof PesertaDidikQuery) {
            return $criteria;
        }
        $query = new PesertaDidikQuery();
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
     * @return   PesertaDidik|PesertaDidik[]|mixed the result, formatted by the current formatter
     */
    public function findPk($key, $con = null)
    {
        if ($key === null) {
            return null;
        }
        if ((null !== ($obj = PesertaDidikPeer::getInstanceFromPool((string) $key))) && !$this->formatter) {
            // the object is alredy in the instance pool
            return $obj;
        }
        if ($con === null) {
            $con = Propel::getConnection(PesertaDidikPeer::DATABASE_NAME, Propel::CONNECTION_READ);
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
     * @return                 PesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
     public function findOneByPesertaDidikId($key, $con = null)
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
     * @return                 PesertaDidik A model object, or null if the key is not found
     * @throws PropelException
     */
    protected function findPkSimple($key, $con)
    {
        $sql = 'SELECT "peserta_didik_id", "nama", "jenis_kelamin", "nisn", "nik", "no_kk", "tempat_lahir", "tanggal_lahir", "agama_id", "kebutuhan_khusus_id", "alamat_jalan", "rt", "rw", "nama_dusun", "desa_kelurahan", "kode_wilayah", "kode_pos", "lintang", "bujur", "jenis_tinggal_id", "alat_transportasi_id", "nik_ayah", "nik_ibu", "anak_keberapa", "nik_wali", "nomor_telepon_rumah", "nomor_telepon_seluler", "email", "penerima_kps", "no_kps", "layak_pip", "penerima_kip", "no_kip", "nm_kip", "no_kks", "reg_akta_lahir", "id_layak_pip", "id_bank", "rekening_bank", "nama_kcp", "rekening_atas_nama", "status_data", "nama_ayah", "tahun_lahir_ayah", "jenjang_pendidikan_ayah", "pekerjaan_id_ayah", "penghasilan_id_ayah", "kebutuhan_khusus_id_ayah", "nama_ibu_kandung", "tahun_lahir_ibu", "jenjang_pendidikan_ibu", "penghasilan_id_ibu", "pekerjaan_id_ibu", "kebutuhan_khusus_id_ibu", "nama_wali", "tahun_lahir_wali", "jenjang_pendidikan_wali", "pekerjaan_id_wali", "penghasilan_id_wali", "kewarganegaraan", "pekerjaan_id", "create_date", "last_update", "soft_delete", "last_sync", "updater_id" FROM "peserta_didik" WHERE "peserta_didik_id" = :p0';
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
            $obj = new PesertaDidik();
            $obj->hydrate($row);
            PesertaDidikPeer::addInstanceToPool($obj, (string) $key);
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
     * @return PesertaDidik|PesertaDidik[]|mixed the result, formatted by the current formatter
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
     * @return PropelObjectCollection|PesertaDidik[]|mixed the list of results, formatted by the current formatter
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKey($key)
    {

        return $this->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $key, Criteria::EQUAL);
    }

    /**
     * Filter the query by a list of primary keys
     *
     * @param     array $keys The list of primary key to use for the query
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPrimaryKeys($keys)
    {

        return $this->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $keys, Criteria::IN);
    }

    /**
     * Filter the query on the peserta_didik_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPesertaDidikId('fooValue');   // WHERE peserta_didik_id = 'fooValue'
     * $query->filterByPesertaDidikId('%fooValue%'); // WHERE peserta_didik_id LIKE '%fooValue%'
     * </code>
     *
     * @param     string $pesertaDidikId The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPesertaDidikId($pesertaDidikId = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($pesertaDidikId)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $pesertaDidikId)) {
                $pesertaDidikId = str_replace('*', '%', $pesertaDidikId);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidikId, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::NAMA, $nama, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::JENIS_KELAMIN, $jenisKelamin, $comparison);
    }

    /**
     * Filter the query on the nisn column
     *
     * Example usage:
     * <code>
     * $query->filterByNisn('fooValue');   // WHERE nisn = 'fooValue'
     * $query->filterByNisn('%fooValue%'); // WHERE nisn LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nisn The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNisn($nisn = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nisn)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nisn)) {
                $nisn = str_replace('*', '%', $nisn);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NISN, $nisn, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::NIK, $nik, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::NO_KK, $noKk, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::TEMPAT_LAHIR, $tempatLahir, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTanggalLahir($tanggalLahir = null, $comparison = null)
    {
        if (is_array($tanggalLahir)) {
            $useMinMax = false;
            if (isset($tanggalLahir['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::TANGGAL_LAHIR, $tanggalLahir['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tanggalLahir['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::TANGGAL_LAHIR, $tanggalLahir['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::TANGGAL_LAHIR, $tanggalLahir, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByAgamaId($agamaId = null, $comparison = null)
    {
        if (is_array($agamaId)) {
            $useMinMax = false;
            if (isset($agamaId['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::AGAMA_ID, $agamaId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($agamaId['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::AGAMA_ID, $agamaId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::AGAMA_ID, $agamaId, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususId(1234); // WHERE kebutuhan_khusus_id = 1234
     * $query->filterByKebutuhanKhususId(array(12, 34)); // WHERE kebutuhan_khusus_id IN (12, 34)
     * $query->filterByKebutuhanKhususId(array('min' => 12)); // WHERE kebutuhan_khusus_id >= 12
     * $query->filterByKebutuhanKhususId(array('max' => 12)); // WHERE kebutuhan_khusus_id <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhususRelatedByKebutuhanKhususId()
     *
     * @param     mixed $kebutuhanKhususId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususId($kebutuhanKhususId = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususId)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususId['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususId['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhususId, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::ALAMAT_JALAN, $alamatJalan, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByRt($rt = null, $comparison = null)
    {
        if (is_array($rt)) {
            $useMinMax = false;
            if (isset($rt['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::RT, $rt['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rt['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::RT, $rt['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::RT, $rt, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByRw($rw = null, $comparison = null)
    {
        if (is_array($rw)) {
            $useMinMax = false;
            if (isset($rw['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::RW, $rw['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($rw['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::RW, $rw['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::RW, $rw, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::NAMA_DUSUN, $namaDusun, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::DESA_KELURAHAN, $desaKelurahan, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::KODE_WILAYAH, $kodeWilayah, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::KODE_POS, $kodePos, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLintang($lintang = null, $comparison = null)
    {
        if (is_array($lintang)) {
            $useMinMax = false;
            if (isset($lintang['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::LINTANG, $lintang['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lintang['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::LINTANG, $lintang['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::LINTANG, $lintang, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByBujur($bujur = null, $comparison = null)
    {
        if (is_array($bujur)) {
            $useMinMax = false;
            if (isset($bujur['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::BUJUR, $bujur['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($bujur['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::BUJUR, $bujur['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::BUJUR, $bujur, $comparison);
    }

    /**
     * Filter the query on the jenis_tinggal_id column
     *
     * Example usage:
     * <code>
     * $query->filterByJenisTinggalId(1234); // WHERE jenis_tinggal_id = 1234
     * $query->filterByJenisTinggalId(array(12, 34)); // WHERE jenis_tinggal_id IN (12, 34)
     * $query->filterByJenisTinggalId(array('min' => 12)); // WHERE jenis_tinggal_id >= 12
     * $query->filterByJenisTinggalId(array('max' => 12)); // WHERE jenis_tinggal_id <= 12
     * </code>
     *
     * @see       filterByJenisTinggal()
     *
     * @param     mixed $jenisTinggalId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenisTinggalId($jenisTinggalId = null, $comparison = null)
    {
        if (is_array($jenisTinggalId)) {
            $useMinMax = false;
            if (isset($jenisTinggalId['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENIS_TINGGAL_ID, $jenisTinggalId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenisTinggalId['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENIS_TINGGAL_ID, $jenisTinggalId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::JENIS_TINGGAL_ID, $jenisTinggalId, $comparison);
    }

    /**
     * Filter the query on the alat_transportasi_id column
     *
     * Example usage:
     * <code>
     * $query->filterByAlatTransportasiId(1234); // WHERE alat_transportasi_id = 1234
     * $query->filterByAlatTransportasiId(array(12, 34)); // WHERE alat_transportasi_id IN (12, 34)
     * $query->filterByAlatTransportasiId(array('min' => 12)); // WHERE alat_transportasi_id >= 12
     * $query->filterByAlatTransportasiId(array('max' => 12)); // WHERE alat_transportasi_id <= 12
     * </code>
     *
     * @see       filterByAlatTransportasi()
     *
     * @param     mixed $alatTransportasiId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByAlatTransportasiId($alatTransportasiId = null, $comparison = null)
    {
        if (is_array($alatTransportasiId)) {
            $useMinMax = false;
            if (isset($alatTransportasiId['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $alatTransportasiId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($alatTransportasiId['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $alatTransportasiId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $alatTransportasiId, $comparison);
    }

    /**
     * Filter the query on the nik_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByNikAyah('fooValue');   // WHERE nik_ayah = 'fooValue'
     * $query->filterByNikAyah('%fooValue%'); // WHERE nik_ayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nikAyah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNikAyah($nikAyah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nikAyah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nikAyah)) {
                $nikAyah = str_replace('*', '%', $nikAyah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NIK_AYAH, $nikAyah, $comparison);
    }

    /**
     * Filter the query on the nik_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByNikIbu('fooValue');   // WHERE nik_ibu = 'fooValue'
     * $query->filterByNikIbu('%fooValue%'); // WHERE nik_ibu LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nikIbu The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNikIbu($nikIbu = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nikIbu)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nikIbu)) {
                $nikIbu = str_replace('*', '%', $nikIbu);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NIK_IBU, $nikIbu, $comparison);
    }

    /**
     * Filter the query on the anak_keberapa column
     *
     * Example usage:
     * <code>
     * $query->filterByAnakKeberapa(1234); // WHERE anak_keberapa = 1234
     * $query->filterByAnakKeberapa(array(12, 34)); // WHERE anak_keberapa IN (12, 34)
     * $query->filterByAnakKeberapa(array('min' => 12)); // WHERE anak_keberapa >= 12
     * $query->filterByAnakKeberapa(array('max' => 12)); // WHERE anak_keberapa <= 12
     * </code>
     *
     * @param     mixed $anakKeberapa The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByAnakKeberapa($anakKeberapa = null, $comparison = null)
    {
        if (is_array($anakKeberapa)) {
            $useMinMax = false;
            if (isset($anakKeberapa['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::ANAK_KEBERAPA, $anakKeberapa['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($anakKeberapa['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::ANAK_KEBERAPA, $anakKeberapa['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::ANAK_KEBERAPA, $anakKeberapa, $comparison);
    }

    /**
     * Filter the query on the nik_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByNikWali('fooValue');   // WHERE nik_wali = 'fooValue'
     * $query->filterByNikWali('%fooValue%'); // WHERE nik_wali LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nikWali The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNikWali($nikWali = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nikWali)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nikWali)) {
                $nikWali = str_replace('*', '%', $nikWali);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NIK_WALI, $nikWali, $comparison);
    }

    /**
     * Filter the query on the nomor_telepon_rumah column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorTeleponRumah('fooValue');   // WHERE nomor_telepon_rumah = 'fooValue'
     * $query->filterByNomorTeleponRumah('%fooValue%'); // WHERE nomor_telepon_rumah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorTeleponRumah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNomorTeleponRumah($nomorTeleponRumah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorTeleponRumah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorTeleponRumah)) {
                $nomorTeleponRumah = str_replace('*', '%', $nomorTeleponRumah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NOMOR_TELEPON_RUMAH, $nomorTeleponRumah, $comparison);
    }

    /**
     * Filter the query on the nomor_telepon_seluler column
     *
     * Example usage:
     * <code>
     * $query->filterByNomorTeleponSeluler('fooValue');   // WHERE nomor_telepon_seluler = 'fooValue'
     * $query->filterByNomorTeleponSeluler('%fooValue%'); // WHERE nomor_telepon_seluler LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nomorTeleponSeluler The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNomorTeleponSeluler($nomorTeleponSeluler = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nomorTeleponSeluler)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nomorTeleponSeluler)) {
                $nomorTeleponSeluler = str_replace('*', '%', $nomorTeleponSeluler);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NOMOR_TELEPON_SELULER, $nomorTeleponSeluler, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::EMAIL, $email, $comparison);
    }

    /**
     * Filter the query on the penerima_kps column
     *
     * Example usage:
     * <code>
     * $query->filterByPenerimaKps(1234); // WHERE penerima_kps = 1234
     * $query->filterByPenerimaKps(array(12, 34)); // WHERE penerima_kps IN (12, 34)
     * $query->filterByPenerimaKps(array('min' => 12)); // WHERE penerima_kps >= 12
     * $query->filterByPenerimaKps(array('max' => 12)); // WHERE penerima_kps <= 12
     * </code>
     *
     * @param     mixed $penerimaKps The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPenerimaKps($penerimaKps = null, $comparison = null)
    {
        if (is_array($penerimaKps)) {
            $useMinMax = false;
            if (isset($penerimaKps['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KPS, $penerimaKps['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penerimaKps['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KPS, $penerimaKps['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KPS, $penerimaKps, $comparison);
    }

    /**
     * Filter the query on the no_kps column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKps('fooValue');   // WHERE no_kps = 'fooValue'
     * $query->filterByNoKps('%fooValue%'); // WHERE no_kps LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKps The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoKps($noKps = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKps)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKps)) {
                $noKps = str_replace('*', '%', $noKps);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NO_KPS, $noKps, $comparison);
    }

    /**
     * Filter the query on the layak_pip column
     *
     * Example usage:
     * <code>
     * $query->filterByLayakPip(1234); // WHERE layak_pip = 1234
     * $query->filterByLayakPip(array(12, 34)); // WHERE layak_pip IN (12, 34)
     * $query->filterByLayakPip(array('min' => 12)); // WHERE layak_pip >= 12
     * $query->filterByLayakPip(array('max' => 12)); // WHERE layak_pip <= 12
     * </code>
     *
     * @param     mixed $layakPip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLayakPip($layakPip = null, $comparison = null)
    {
        if (is_array($layakPip)) {
            $useMinMax = false;
            if (isset($layakPip['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAYAK_PIP, $layakPip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($layakPip['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAYAK_PIP, $layakPip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::LAYAK_PIP, $layakPip, $comparison);
    }

    /**
     * Filter the query on the penerima_kip column
     *
     * Example usage:
     * <code>
     * $query->filterByPenerimaKip(1234); // WHERE penerima_kip = 1234
     * $query->filterByPenerimaKip(array(12, 34)); // WHERE penerima_kip IN (12, 34)
     * $query->filterByPenerimaKip(array('min' => 12)); // WHERE penerima_kip >= 12
     * $query->filterByPenerimaKip(array('max' => 12)); // WHERE penerima_kip <= 12
     * </code>
     *
     * @param     mixed $penerimaKip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPenerimaKip($penerimaKip = null, $comparison = null)
    {
        if (is_array($penerimaKip)) {
            $useMinMax = false;
            if (isset($penerimaKip['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KIP, $penerimaKip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penerimaKip['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KIP, $penerimaKip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PENERIMA_KIP, $penerimaKip, $comparison);
    }

    /**
     * Filter the query on the no_kip column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKip('fooValue');   // WHERE no_kip = 'fooValue'
     * $query->filterByNoKip('%fooValue%'); // WHERE no_kip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoKip($noKip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKip)) {
                $noKip = str_replace('*', '%', $noKip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NO_KIP, $noKip, $comparison);
    }

    /**
     * Filter the query on the nm_kip column
     *
     * Example usage:
     * <code>
     * $query->filterByNmKip('fooValue');   // WHERE nm_kip = 'fooValue'
     * $query->filterByNmKip('%fooValue%'); // WHERE nm_kip LIKE '%fooValue%'
     * </code>
     *
     * @param     string $nmKip The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNmKip($nmKip = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($nmKip)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $nmKip)) {
                $nmKip = str_replace('*', '%', $nmKip);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NM_KIP, $nmKip, $comparison);
    }

    /**
     * Filter the query on the no_kks column
     *
     * Example usage:
     * <code>
     * $query->filterByNoKks('fooValue');   // WHERE no_kks = 'fooValue'
     * $query->filterByNoKks('%fooValue%'); // WHERE no_kks LIKE '%fooValue%'
     * </code>
     *
     * @param     string $noKks The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNoKks($noKks = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($noKks)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $noKks)) {
                $noKks = str_replace('*', '%', $noKks);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NO_KKS, $noKks, $comparison);
    }

    /**
     * Filter the query on the reg_akta_lahir column
     *
     * Example usage:
     * <code>
     * $query->filterByRegAktaLahir('fooValue');   // WHERE reg_akta_lahir = 'fooValue'
     * $query->filterByRegAktaLahir('%fooValue%'); // WHERE reg_akta_lahir LIKE '%fooValue%'
     * </code>
     *
     * @param     string $regAktaLahir The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByRegAktaLahir($regAktaLahir = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($regAktaLahir)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $regAktaLahir)) {
                $regAktaLahir = str_replace('*', '%', $regAktaLahir);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::REG_AKTA_LAHIR, $regAktaLahir, $comparison);
    }

    /**
     * Filter the query on the id_layak_pip column
     *
     * Example usage:
     * <code>
     * $query->filterByIdLayakPip(1234); // WHERE id_layak_pip = 1234
     * $query->filterByIdLayakPip(array(12, 34)); // WHERE id_layak_pip IN (12, 34)
     * $query->filterByIdLayakPip(array('min' => 12)); // WHERE id_layak_pip >= 12
     * $query->filterByIdLayakPip(array('max' => 12)); // WHERE id_layak_pip <= 12
     * </code>
     *
     * @see       filterByAlasanLayakPip()
     *
     * @param     mixed $idLayakPip The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByIdLayakPip($idLayakPip = null, $comparison = null)
    {
        if (is_array($idLayakPip)) {
            $useMinMax = false;
            if (isset($idLayakPip['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::ID_LAYAK_PIP, $idLayakPip['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($idLayakPip['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::ID_LAYAK_PIP, $idLayakPip['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::ID_LAYAK_PIP, $idLayakPip, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::ID_BANK, $idBank, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::REKENING_BANK, $rekeningBank, $comparison);
    }

    /**
     * Filter the query on the nama_kcp column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaKcp('fooValue');   // WHERE nama_kcp = 'fooValue'
     * $query->filterByNamaKcp('%fooValue%'); // WHERE nama_kcp LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaKcp The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNamaKcp($namaKcp = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaKcp)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaKcp)) {
                $namaKcp = str_replace('*', '%', $namaKcp);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NAMA_KCP, $namaKcp, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::REKENING_ATAS_NAMA, $rekeningAtasNama, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByStatusData($statusData = null, $comparison = null)
    {
        if (is_array($statusData)) {
            $useMinMax = false;
            if (isset($statusData['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::STATUS_DATA, $statusData['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($statusData['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::STATUS_DATA, $statusData['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::STATUS_DATA, $statusData, $comparison);
    }

    /**
     * Filter the query on the nama_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaAyah('fooValue');   // WHERE nama_ayah = 'fooValue'
     * $query->filterByNamaAyah('%fooValue%'); // WHERE nama_ayah LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaAyah The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNamaAyah($namaAyah = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaAyah)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaAyah)) {
                $namaAyah = str_replace('*', '%', $namaAyah);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NAMA_AYAH, $namaAyah, $comparison);
    }

    /**
     * Filter the query on the tahun_lahir_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunLahirAyah(1234); // WHERE tahun_lahir_ayah = 1234
     * $query->filterByTahunLahirAyah(array(12, 34)); // WHERE tahun_lahir_ayah IN (12, 34)
     * $query->filterByTahunLahirAyah(array('min' => 12)); // WHERE tahun_lahir_ayah >= 12
     * $query->filterByTahunLahirAyah(array('max' => 12)); // WHERE tahun_lahir_ayah <= 12
     * </code>
     *
     * @param     mixed $tahunLahirAyah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTahunLahirAyah($tahunLahirAyah = null, $comparison = null)
    {
        if (is_array($tahunLahirAyah)) {
            $useMinMax = false;
            if (isset($tahunLahirAyah['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_AYAH, $tahunLahirAyah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunLahirAyah['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_AYAH, $tahunLahirAyah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_AYAH, $tahunLahirAyah, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanAyah(1234); // WHERE jenjang_pendidikan_ayah = 1234
     * $query->filterByJenjangPendidikanAyah(array(12, 34)); // WHERE jenjang_pendidikan_ayah IN (12, 34)
     * $query->filterByJenjangPendidikanAyah(array('min' => 12)); // WHERE jenjang_pendidikan_ayah >= 12
     * $query->filterByJenjangPendidikanAyah(array('max' => 12)); // WHERE jenjang_pendidikan_ayah <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikanRelatedByJenjangPendidikanAyah()
     *
     * @param     mixed $jenjangPendidikanAyah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanAyah($jenjangPendidikanAyah = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanAyah)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanAyah['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $jenjangPendidikanAyah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanAyah['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $jenjangPendidikanAyah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $jenjangPendidikanAyah, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_id_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanIdAyah(1234); // WHERE pekerjaan_id_ayah = 1234
     * $query->filterByPekerjaanIdAyah(array(12, 34)); // WHERE pekerjaan_id_ayah IN (12, 34)
     * $query->filterByPekerjaanIdAyah(array('min' => 12)); // WHERE pekerjaan_id_ayah >= 12
     * $query->filterByPekerjaanIdAyah(array('max' => 12)); // WHERE pekerjaan_id_ayah <= 12
     * </code>
     *
     * @see       filterByPekerjaanRelatedByPekerjaanIdAyah()
     *
     * @param     mixed $pekerjaanIdAyah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPekerjaanIdAyah($pekerjaanIdAyah = null, $comparison = null)
    {
        if (is_array($pekerjaanIdAyah)) {
            $useMinMax = false;
            if (isset($pekerjaanIdAyah['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $pekerjaanIdAyah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanIdAyah['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $pekerjaanIdAyah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $pekerjaanIdAyah, $comparison);
    }

    /**
     * Filter the query on the penghasilan_id_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghasilanIdAyah(1234); // WHERE penghasilan_id_ayah = 1234
     * $query->filterByPenghasilanIdAyah(array(12, 34)); // WHERE penghasilan_id_ayah IN (12, 34)
     * $query->filterByPenghasilanIdAyah(array('min' => 12)); // WHERE penghasilan_id_ayah >= 12
     * $query->filterByPenghasilanIdAyah(array('max' => 12)); // WHERE penghasilan_id_ayah <= 12
     * </code>
     *
     * @see       filterByPenghasilanRelatedByPenghasilanIdAyah()
     *
     * @param     mixed $penghasilanIdAyah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPenghasilanIdAyah($penghasilanIdAyah = null, $comparison = null)
    {
        if (is_array($penghasilanIdAyah)) {
            $useMinMax = false;
            if (isset($penghasilanIdAyah['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $penghasilanIdAyah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penghasilanIdAyah['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $penghasilanIdAyah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $penghasilanIdAyah, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id_ayah column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususIdAyah(1234); // WHERE kebutuhan_khusus_id_ayah = 1234
     * $query->filterByKebutuhanKhususIdAyah(array(12, 34)); // WHERE kebutuhan_khusus_id_ayah IN (12, 34)
     * $query->filterByKebutuhanKhususIdAyah(array('min' => 12)); // WHERE kebutuhan_khusus_id_ayah >= 12
     * $query->filterByKebutuhanKhususIdAyah(array('max' => 12)); // WHERE kebutuhan_khusus_id_ayah <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhususRelatedByKebutuhanKhususIdAyah()
     *
     * @param     mixed $kebutuhanKhususIdAyah The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususIdAyah($kebutuhanKhususIdAyah = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususIdAyah)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususIdAyah['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $kebutuhanKhususIdAyah['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususIdAyah['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $kebutuhanKhususIdAyah['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $kebutuhanKhususIdAyah, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::NAMA_IBU_KANDUNG, $namaIbuKandung, $comparison);
    }

    /**
     * Filter the query on the tahun_lahir_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunLahirIbu(1234); // WHERE tahun_lahir_ibu = 1234
     * $query->filterByTahunLahirIbu(array(12, 34)); // WHERE tahun_lahir_ibu IN (12, 34)
     * $query->filterByTahunLahirIbu(array('min' => 12)); // WHERE tahun_lahir_ibu >= 12
     * $query->filterByTahunLahirIbu(array('max' => 12)); // WHERE tahun_lahir_ibu <= 12
     * </code>
     *
     * @param     mixed $tahunLahirIbu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTahunLahirIbu($tahunLahirIbu = null, $comparison = null)
    {
        if (is_array($tahunLahirIbu)) {
            $useMinMax = false;
            if (isset($tahunLahirIbu['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_IBU, $tahunLahirIbu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunLahirIbu['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_IBU, $tahunLahirIbu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_IBU, $tahunLahirIbu, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanIbu(1234); // WHERE jenjang_pendidikan_ibu = 1234
     * $query->filterByJenjangPendidikanIbu(array(12, 34)); // WHERE jenjang_pendidikan_ibu IN (12, 34)
     * $query->filterByJenjangPendidikanIbu(array('min' => 12)); // WHERE jenjang_pendidikan_ibu >= 12
     * $query->filterByJenjangPendidikanIbu(array('max' => 12)); // WHERE jenjang_pendidikan_ibu <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikanRelatedByJenjangPendidikanIbu()
     *
     * @param     mixed $jenjangPendidikanIbu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanIbu($jenjangPendidikanIbu = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanIbu)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanIbu['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $jenjangPendidikanIbu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanIbu['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $jenjangPendidikanIbu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $jenjangPendidikanIbu, $comparison);
    }

    /**
     * Filter the query on the penghasilan_id_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghasilanIdIbu(1234); // WHERE penghasilan_id_ibu = 1234
     * $query->filterByPenghasilanIdIbu(array(12, 34)); // WHERE penghasilan_id_ibu IN (12, 34)
     * $query->filterByPenghasilanIdIbu(array('min' => 12)); // WHERE penghasilan_id_ibu >= 12
     * $query->filterByPenghasilanIdIbu(array('max' => 12)); // WHERE penghasilan_id_ibu <= 12
     * </code>
     *
     * @see       filterByPenghasilanRelatedByPenghasilanIdIbu()
     *
     * @param     mixed $penghasilanIdIbu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPenghasilanIdIbu($penghasilanIdIbu = null, $comparison = null)
    {
        if (is_array($penghasilanIdIbu)) {
            $useMinMax = false;
            if (isset($penghasilanIdIbu['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_IBU, $penghasilanIdIbu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penghasilanIdIbu['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_IBU, $penghasilanIdIbu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_IBU, $penghasilanIdIbu, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_id_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanIdIbu(1234); // WHERE pekerjaan_id_ibu = 1234
     * $query->filterByPekerjaanIdIbu(array(12, 34)); // WHERE pekerjaan_id_ibu IN (12, 34)
     * $query->filterByPekerjaanIdIbu(array('min' => 12)); // WHERE pekerjaan_id_ibu >= 12
     * $query->filterByPekerjaanIdIbu(array('max' => 12)); // WHERE pekerjaan_id_ibu <= 12
     * </code>
     *
     * @see       filterByPekerjaanRelatedByPekerjaanIdIbu()
     *
     * @param     mixed $pekerjaanIdIbu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPekerjaanIdIbu($pekerjaanIdIbu = null, $comparison = null)
    {
        if (is_array($pekerjaanIdIbu)) {
            $useMinMax = false;
            if (isset($pekerjaanIdIbu['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_IBU, $pekerjaanIdIbu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanIdIbu['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_IBU, $pekerjaanIdIbu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_IBU, $pekerjaanIdIbu, $comparison);
    }

    /**
     * Filter the query on the kebutuhan_khusus_id_ibu column
     *
     * Example usage:
     * <code>
     * $query->filterByKebutuhanKhususIdIbu(1234); // WHERE kebutuhan_khusus_id_ibu = 1234
     * $query->filterByKebutuhanKhususIdIbu(array(12, 34)); // WHERE kebutuhan_khusus_id_ibu IN (12, 34)
     * $query->filterByKebutuhanKhususIdIbu(array('min' => 12)); // WHERE kebutuhan_khusus_id_ibu >= 12
     * $query->filterByKebutuhanKhususIdIbu(array('max' => 12)); // WHERE kebutuhan_khusus_id_ibu <= 12
     * </code>
     *
     * @see       filterByKebutuhanKhususRelatedByKebutuhanKhususIdIbu()
     *
     * @param     mixed $kebutuhanKhususIdIbu The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByKebutuhanKhususIdIbu($kebutuhanKhususIdIbu = null, $comparison = null)
    {
        if (is_array($kebutuhanKhususIdIbu)) {
            $useMinMax = false;
            if (isset($kebutuhanKhususIdIbu['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $kebutuhanKhususIdIbu['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($kebutuhanKhususIdIbu['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $kebutuhanKhususIdIbu['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $kebutuhanKhususIdIbu, $comparison);
    }

    /**
     * Filter the query on the nama_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByNamaWali('fooValue');   // WHERE nama_wali = 'fooValue'
     * $query->filterByNamaWali('%fooValue%'); // WHERE nama_wali LIKE '%fooValue%'
     * </code>
     *
     * @param     string $namaWali The value to use as filter.
     *              Accepts wildcards (* and % trigger a LIKE)
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByNamaWali($namaWali = null, $comparison = null)
    {
        if (null === $comparison) {
            if (is_array($namaWali)) {
                $comparison = Criteria::IN;
            } elseif (preg_match('/[\%\*]/', $namaWali)) {
                $namaWali = str_replace('*', '%', $namaWali);
                $comparison = Criteria::LIKE;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::NAMA_WALI, $namaWali, $comparison);
    }

    /**
     * Filter the query on the tahun_lahir_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByTahunLahirWali(1234); // WHERE tahun_lahir_wali = 1234
     * $query->filterByTahunLahirWali(array(12, 34)); // WHERE tahun_lahir_wali IN (12, 34)
     * $query->filterByTahunLahirWali(array('min' => 12)); // WHERE tahun_lahir_wali >= 12
     * $query->filterByTahunLahirWali(array('max' => 12)); // WHERE tahun_lahir_wali <= 12
     * </code>
     *
     * @param     mixed $tahunLahirWali The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByTahunLahirWali($tahunLahirWali = null, $comparison = null)
    {
        if (is_array($tahunLahirWali)) {
            $useMinMax = false;
            if (isset($tahunLahirWali['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_WALI, $tahunLahirWali['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($tahunLahirWali['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_WALI, $tahunLahirWali['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::TAHUN_LAHIR_WALI, $tahunLahirWali, $comparison);
    }

    /**
     * Filter the query on the jenjang_pendidikan_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByJenjangPendidikanWali(1234); // WHERE jenjang_pendidikan_wali = 1234
     * $query->filterByJenjangPendidikanWali(array(12, 34)); // WHERE jenjang_pendidikan_wali IN (12, 34)
     * $query->filterByJenjangPendidikanWali(array('min' => 12)); // WHERE jenjang_pendidikan_wali >= 12
     * $query->filterByJenjangPendidikanWali(array('max' => 12)); // WHERE jenjang_pendidikan_wali <= 12
     * </code>
     *
     * @see       filterByJenjangPendidikanRelatedByJenjangPendidikanWali()
     *
     * @param     mixed $jenjangPendidikanWali The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByJenjangPendidikanWali($jenjangPendidikanWali = null, $comparison = null)
    {
        if (is_array($jenjangPendidikanWali)) {
            $useMinMax = false;
            if (isset($jenjangPendidikanWali['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $jenjangPendidikanWali['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($jenjangPendidikanWali['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $jenjangPendidikanWali['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $jenjangPendidikanWali, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_id_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanIdWali(1234); // WHERE pekerjaan_id_wali = 1234
     * $query->filterByPekerjaanIdWali(array(12, 34)); // WHERE pekerjaan_id_wali IN (12, 34)
     * $query->filterByPekerjaanIdWali(array('min' => 12)); // WHERE pekerjaan_id_wali >= 12
     * $query->filterByPekerjaanIdWali(array('max' => 12)); // WHERE pekerjaan_id_wali <= 12
     * </code>
     *
     * @see       filterByPekerjaanRelatedByPekerjaanIdWali()
     *
     * @param     mixed $pekerjaanIdWali The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPekerjaanIdWali($pekerjaanIdWali = null, $comparison = null)
    {
        if (is_array($pekerjaanIdWali)) {
            $useMinMax = false;
            if (isset($pekerjaanIdWali['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_WALI, $pekerjaanIdWali['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanIdWali['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_WALI, $pekerjaanIdWali['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_WALI, $pekerjaanIdWali, $comparison);
    }

    /**
     * Filter the query on the penghasilan_id_wali column
     *
     * Example usage:
     * <code>
     * $query->filterByPenghasilanIdWali(1234); // WHERE penghasilan_id_wali = 1234
     * $query->filterByPenghasilanIdWali(array(12, 34)); // WHERE penghasilan_id_wali IN (12, 34)
     * $query->filterByPenghasilanIdWali(array('min' => 12)); // WHERE penghasilan_id_wali >= 12
     * $query->filterByPenghasilanIdWali(array('max' => 12)); // WHERE penghasilan_id_wali <= 12
     * </code>
     *
     * @see       filterByPenghasilanRelatedByPenghasilanIdWali()
     *
     * @param     mixed $penghasilanIdWali The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPenghasilanIdWali($penghasilanIdWali = null, $comparison = null)
    {
        if (is_array($penghasilanIdWali)) {
            $useMinMax = false;
            if (isset($penghasilanIdWali['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_WALI, $penghasilanIdWali['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($penghasilanIdWali['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_WALI, $penghasilanIdWali['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_WALI, $penghasilanIdWali, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::KEWARGANEGARAAN, $kewarganegaraan, $comparison);
    }

    /**
     * Filter the query on the pekerjaan_id column
     *
     * Example usage:
     * <code>
     * $query->filterByPekerjaanId(1234); // WHERE pekerjaan_id = 1234
     * $query->filterByPekerjaanId(array(12, 34)); // WHERE pekerjaan_id IN (12, 34)
     * $query->filterByPekerjaanId(array('min' => 12)); // WHERE pekerjaan_id >= 12
     * $query->filterByPekerjaanId(array('max' => 12)); // WHERE pekerjaan_id <= 12
     * </code>
     *
     * @see       filterByPekerjaanRelatedByPekerjaanId()
     *
     * @param     mixed $pekerjaanId The value to use as filter.
     *              Use scalar values for equality.
     *              Use array values for in_array() equivalent.
     *              Use associative array('min' => $minValue, 'max' => $maxValue) for intervals.
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByPekerjaanId($pekerjaanId = null, $comparison = null)
    {
        if (is_array($pekerjaanId)) {
            $useMinMax = false;
            if (isset($pekerjaanId['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID, $pekerjaanId['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($pekerjaanId['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID, $pekerjaanId['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID, $pekerjaanId, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByCreateDate($createDate = null, $comparison = null)
    {
        if (is_array($createDate)) {
            $useMinMax = false;
            if (isset($createDate['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::CREATE_DATE, $createDate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($createDate['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::CREATE_DATE, $createDate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::CREATE_DATE, $createDate, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastUpdate($lastUpdate = null, $comparison = null)
    {
        if (is_array($lastUpdate)) {
            $useMinMax = false;
            if (isset($lastUpdate['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAST_UPDATE, $lastUpdate['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastUpdate['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAST_UPDATE, $lastUpdate['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::LAST_UPDATE, $lastUpdate, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterBySoftDelete($softDelete = null, $comparison = null)
    {
        if (is_array($softDelete)) {
            $useMinMax = false;
            if (isset($softDelete['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::SOFT_DELETE, $softDelete['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($softDelete['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::SOFT_DELETE, $softDelete['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::SOFT_DELETE, $softDelete, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function filterByLastSync($lastSync = null, $comparison = null)
    {
        if (is_array($lastSync)) {
            $useMinMax = false;
            if (isset($lastSync['min'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAST_SYNC, $lastSync['min'], Criteria::GREATER_EQUAL);
                $useMinMax = true;
            }
            if (isset($lastSync['max'])) {
                $this->addUsingAlias(PesertaDidikPeer::LAST_SYNC, $lastSync['max'], Criteria::LESS_EQUAL);
                $useMinMax = true;
            }
            if ($useMinMax) {
                return $this;
            }
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }
        }

        return $this->addUsingAlias(PesertaDidikPeer::LAST_SYNC, $lastSync, $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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

        return $this->addUsingAlias(PesertaDidikPeer::UPDATER_ID, $updaterId, $comparison);
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhususRelatedByKebutuhanKhususIdAyah($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_AYAH, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhususRelatedByKebutuhanKhususIdAyah() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhususRelatedByKebutuhanKhususIdAyah');

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
            $this->addJoinObject($join, 'KebutuhanKhususRelatedByKebutuhanKhususIdAyah');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhususRelatedByKebutuhanKhususIdAyah relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususRelatedByKebutuhanKhususIdAyahQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhususRelatedByKebutuhanKhususIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhususRelatedByKebutuhanKhususIdAyah', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related KebutuhanKhusus object
     *
     * @param   KebutuhanKhusus|PropelObjectCollection $kebutuhanKhusus The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhususRelatedByKebutuhanKhususIdIbu($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID_IBU, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhususRelatedByKebutuhanKhususIdIbu() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhususRelatedByKebutuhanKhususIdIbu');

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
            $this->addJoinObject($join, 'KebutuhanKhususRelatedByKebutuhanKhususIdIbu');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhususRelatedByKebutuhanKhususIdIbu relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususRelatedByKebutuhanKhususIdIbuQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhususRelatedByKebutuhanKhususIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhususRelatedByKebutuhanKhususIdIbu', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related Negara object
     *
     * @param   Negara|PropelObjectCollection $negara The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByNegara($negara, $comparison = null)
    {
        if ($negara instanceof Negara) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::KEWARGANEGARAAN, $negara->getNegaraId(), $comparison);
        } elseif ($negara instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::KEWARGANEGARAAN, $negara->toKeyValue('PrimaryKey', 'NegaraId'), $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related AlasanLayakPip object
     *
     * @param   AlasanLayakPip|PropelObjectCollection $alasanLayakPip The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlasanLayakPip($alasanLayakPip, $comparison = null)
    {
        if ($alasanLayakPip instanceof AlasanLayakPip) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::ID_LAYAK_PIP, $alasanLayakPip->getIdLayakPip(), $comparison);
        } elseif ($alasanLayakPip instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::ID_LAYAK_PIP, $alasanLayakPip->toKeyValue('PrimaryKey', 'IdLayakPip'), $comparison);
        } else {
            throw new PropelException('filterByAlasanLayakPip() only accepts arguments of type AlasanLayakPip or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlasanLayakPip relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinAlasanLayakPip($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlasanLayakPip');

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
            $this->addJoinObject($join, 'AlasanLayakPip');
        }

        return $this;
    }

    /**
     * Use the AlasanLayakPip relation AlasanLayakPip object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlasanLayakPipQuery A secondary query class using the current class as primary query
     */
    public function useAlasanLayakPipQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlasanLayakPip($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlasanLayakPip', '\DataDikdas\Model\AlasanLayakPipQuery');
    }

    /**
     * Filter the query by a related Bank object
     *
     * @param   Bank|PropelObjectCollection $bank The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBank($bank, $comparison = null)
    {
        if ($bank instanceof Bank) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::ID_BANK, $bank->getIdBank(), $comparison);
        } elseif ($bank instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::ID_BANK, $bank->toKeyValue('PrimaryKey', 'IdBank'), $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related MstWilayah object
     *
     * @param   MstWilayah|PropelObjectCollection $mstWilayah The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByMstWilayah($mstWilayah, $comparison = null)
    {
        if ($mstWilayah instanceof MstWilayah) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::KODE_WILAYAH, $mstWilayah->getKodeWilayah(), $comparison);
        } elseif ($mstWilayah instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::KODE_WILAYAH, $mstWilayah->toKeyValue('PrimaryKey', 'KodeWilayah'), $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKebutuhanKhususRelatedByKebutuhanKhususId($kebutuhanKhusus, $comparison = null)
    {
        if ($kebutuhanKhusus instanceof KebutuhanKhusus) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->getKebutuhanKhususId(), $comparison);
        } elseif ($kebutuhanKhusus instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::KEBUTUHAN_KHUSUS_ID, $kebutuhanKhusus->toKeyValue('PrimaryKey', 'KebutuhanKhususId'), $comparison);
        } else {
            throw new PropelException('filterByKebutuhanKhususRelatedByKebutuhanKhususId() only accepts arguments of type KebutuhanKhusus or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KebutuhanKhususRelatedByKebutuhanKhususId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinKebutuhanKhususRelatedByKebutuhanKhususId($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KebutuhanKhususRelatedByKebutuhanKhususId');

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
            $this->addJoinObject($join, 'KebutuhanKhususRelatedByKebutuhanKhususId');
        }

        return $this;
    }

    /**
     * Use the KebutuhanKhususRelatedByKebutuhanKhususId relation KebutuhanKhusus object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KebutuhanKhususQuery A secondary query class using the current class as primary query
     */
    public function useKebutuhanKhususRelatedByKebutuhanKhususIdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKebutuhanKhususRelatedByKebutuhanKhususId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KebutuhanKhususRelatedByKebutuhanKhususId', '\DataDikdas\Model\KebutuhanKhususQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaanRelatedByPekerjaanId($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaanRelatedByPekerjaanId() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PekerjaanRelatedByPekerjaanId relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPekerjaanRelatedByPekerjaanId($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PekerjaanRelatedByPekerjaanId');

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
            $this->addJoinObject($join, 'PekerjaanRelatedByPekerjaanId');
        }

        return $this;
    }

    /**
     * Use the PekerjaanRelatedByPekerjaanId relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanRelatedByPekerjaanIdQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPekerjaanRelatedByPekerjaanId($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PekerjaanRelatedByPekerjaanId', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related Agama object
     *
     * @param   Agama|PropelObjectCollection $agama The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAgama($agama, $comparison = null)
    {
        if ($agama instanceof Agama) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::AGAMA_ID, $agama->getAgamaId(), $comparison);
        } elseif ($agama instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::AGAMA_ID, $agama->toKeyValue('PrimaryKey', 'AgamaId'), $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related Penghasilan object
     *
     * @param   Penghasilan|PropelObjectCollection $penghasilan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghasilanRelatedByPenghasilanIdAyah($penghasilan, $comparison = null)
    {
        if ($penghasilan instanceof Penghasilan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $penghasilan->getPenghasilanId(), $comparison);
        } elseif ($penghasilan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_AYAH, $penghasilan->toKeyValue('PrimaryKey', 'PenghasilanId'), $comparison);
        } else {
            throw new PropelException('filterByPenghasilanRelatedByPenghasilanIdAyah() only accepts arguments of type Penghasilan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPenghasilanRelatedByPenghasilanIdAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PenghasilanRelatedByPenghasilanIdAyah');

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
            $this->addJoinObject($join, 'PenghasilanRelatedByPenghasilanIdAyah');
        }

        return $this;
    }

    /**
     * Use the PenghasilanRelatedByPenghasilanIdAyah relation Penghasilan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghasilanQuery A secondary query class using the current class as primary query
     */
    public function usePenghasilanRelatedByPenghasilanIdAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPenghasilanRelatedByPenghasilanIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PenghasilanRelatedByPenghasilanIdAyah', '\DataDikdas\Model\PenghasilanQuery');
    }

    /**
     * Filter the query by a related JenisTinggal object
     *
     * @param   JenisTinggal|PropelObjectCollection $jenisTinggal The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenisTinggal($jenisTinggal, $comparison = null)
    {
        if ($jenisTinggal instanceof JenisTinggal) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::JENIS_TINGGAL_ID, $jenisTinggal->getJenisTinggalId(), $comparison);
        } elseif ($jenisTinggal instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::JENIS_TINGGAL_ID, $jenisTinggal->toKeyValue('PrimaryKey', 'JenisTinggalId'), $comparison);
        } else {
            throw new PropelException('filterByJenisTinggal() only accepts arguments of type JenisTinggal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenisTinggal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenisTinggal($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenisTinggal');

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
            $this->addJoinObject($join, 'JenisTinggal');
        }

        return $this;
    }

    /**
     * Use the JenisTinggal relation JenisTinggal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenisTinggalQuery A secondary query class using the current class as primary query
     */
    public function useJenisTinggalQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenisTinggal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenisTinggal', '\DataDikdas\Model\JenisTinggalQuery');
    }

    /**
     * Filter the query by a related AlatTransportasi object
     *
     * @param   AlatTransportasi|PropelObjectCollection $alatTransportasi The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAlatTransportasi($alatTransportasi, $comparison = null)
    {
        if ($alatTransportasi instanceof AlatTransportasi) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $alatTransportasi->getAlatTransportasiId(), $comparison);
        } elseif ($alatTransportasi instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::ALAT_TRANSPORTASI_ID, $alatTransportasi->toKeyValue('PrimaryKey', 'AlatTransportasiId'), $comparison);
        } else {
            throw new PropelException('filterByAlatTransportasi() only accepts arguments of type AlatTransportasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AlatTransportasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinAlatTransportasi($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AlatTransportasi');

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
            $this->addJoinObject($join, 'AlatTransportasi');
        }

        return $this;
    }

    /**
     * Use the AlatTransportasi relation AlatTransportasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AlatTransportasiQuery A secondary query class using the current class as primary query
     */
    public function useAlatTransportasiQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinAlatTransportasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AlatTransportasi', '\DataDikdas\Model\AlatTransportasiQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaanRelatedByPekerjaanIdAyah($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_AYAH, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaanRelatedByPekerjaanIdAyah() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPekerjaanRelatedByPekerjaanIdAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PekerjaanRelatedByPekerjaanIdAyah');

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
            $this->addJoinObject($join, 'PekerjaanRelatedByPekerjaanIdAyah');
        }

        return $this;
    }

    /**
     * Use the PekerjaanRelatedByPekerjaanIdAyah relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanRelatedByPekerjaanIdAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPekerjaanRelatedByPekerjaanIdAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PekerjaanRelatedByPekerjaanIdAyah', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikanRelatedByJenjangPendidikanIbu($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_IBU, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikanRelatedByJenjangPendidikanIbu() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikanRelatedByJenjangPendidikanIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikanRelatedByJenjangPendidikanIbu');

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
            $this->addJoinObject($join, 'JenjangPendidikanRelatedByJenjangPendidikanIbu');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikanRelatedByJenjangPendidikanIbu relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanRelatedByJenjangPendidikanIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenjangPendidikanRelatedByJenjangPendidikanIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikanRelatedByJenjangPendidikanIbu', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related Penghasilan object
     *
     * @param   Penghasilan|PropelObjectCollection $penghasilan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghasilanRelatedByPenghasilanIdWali($penghasilan, $comparison = null)
    {
        if ($penghasilan instanceof Penghasilan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_WALI, $penghasilan->getPenghasilanId(), $comparison);
        } elseif ($penghasilan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_WALI, $penghasilan->toKeyValue('PrimaryKey', 'PenghasilanId'), $comparison);
        } else {
            throw new PropelException('filterByPenghasilanRelatedByPenghasilanIdWali() only accepts arguments of type Penghasilan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPenghasilanRelatedByPenghasilanIdWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PenghasilanRelatedByPenghasilanIdWali');

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
            $this->addJoinObject($join, 'PenghasilanRelatedByPenghasilanIdWali');
        }

        return $this;
    }

    /**
     * Use the PenghasilanRelatedByPenghasilanIdWali relation Penghasilan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghasilanQuery A secondary query class using the current class as primary query
     */
    public function usePenghasilanRelatedByPenghasilanIdWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPenghasilanRelatedByPenghasilanIdWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PenghasilanRelatedByPenghasilanIdWali', '\DataDikdas\Model\PenghasilanQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaanRelatedByPekerjaanIdIbu($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_IBU, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_IBU, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaanRelatedByPekerjaanIdIbu() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPekerjaanRelatedByPekerjaanIdIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PekerjaanRelatedByPekerjaanIdIbu');

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
            $this->addJoinObject($join, 'PekerjaanRelatedByPekerjaanIdIbu');
        }

        return $this;
    }

    /**
     * Use the PekerjaanRelatedByPekerjaanIdIbu relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanRelatedByPekerjaanIdIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPekerjaanRelatedByPekerjaanIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PekerjaanRelatedByPekerjaanIdIbu', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikanRelatedByJenjangPendidikanAyah($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_AYAH, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikanRelatedByJenjangPendidikanAyah() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanAyah relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikanRelatedByJenjangPendidikanAyah($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikanRelatedByJenjangPendidikanAyah');

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
            $this->addJoinObject($join, 'JenjangPendidikanRelatedByJenjangPendidikanAyah');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikanRelatedByJenjangPendidikanAyah relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanRelatedByJenjangPendidikanAyahQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenjangPendidikanRelatedByJenjangPendidikanAyah($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikanRelatedByJenjangPendidikanAyah', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related Penghasilan object
     *
     * @param   Penghasilan|PropelObjectCollection $penghasilan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPenghasilanRelatedByPenghasilanIdIbu($penghasilan, $comparison = null)
    {
        if ($penghasilan instanceof Penghasilan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_IBU, $penghasilan->getPenghasilanId(), $comparison);
        } elseif ($penghasilan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PENGHASILAN_ID_IBU, $penghasilan->toKeyValue('PrimaryKey', 'PenghasilanId'), $comparison);
        } else {
            throw new PropelException('filterByPenghasilanRelatedByPenghasilanIdIbu() only accepts arguments of type Penghasilan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PenghasilanRelatedByPenghasilanIdIbu relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPenghasilanRelatedByPenghasilanIdIbu($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PenghasilanRelatedByPenghasilanIdIbu');

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
            $this->addJoinObject($join, 'PenghasilanRelatedByPenghasilanIdIbu');
        }

        return $this;
    }

    /**
     * Use the PenghasilanRelatedByPenghasilanIdIbu relation Penghasilan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PenghasilanQuery A secondary query class using the current class as primary query
     */
    public function usePenghasilanRelatedByPenghasilanIdIbuQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPenghasilanRelatedByPenghasilanIdIbu($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PenghasilanRelatedByPenghasilanIdIbu', '\DataDikdas\Model\PenghasilanQuery');
    }

    /**
     * Filter the query by a related Pekerjaan object
     *
     * @param   Pekerjaan|PropelObjectCollection $pekerjaan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPekerjaanRelatedByPekerjaanIdWali($pekerjaan, $comparison = null)
    {
        if ($pekerjaan instanceof Pekerjaan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_WALI, $pekerjaan->getPekerjaanId(), $comparison);
        } elseif ($pekerjaan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::PEKERJAAN_ID_WALI, $pekerjaan->toKeyValue('PrimaryKey', 'PekerjaanId'), $comparison);
        } else {
            throw new PropelException('filterByPekerjaanRelatedByPekerjaanIdWali() only accepts arguments of type Pekerjaan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PekerjaanRelatedByPekerjaanIdWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPekerjaanRelatedByPekerjaanIdWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PekerjaanRelatedByPekerjaanIdWali');

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
            $this->addJoinObject($join, 'PekerjaanRelatedByPekerjaanIdWali');
        }

        return $this;
    }

    /**
     * Use the PekerjaanRelatedByPekerjaanIdWali relation Pekerjaan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PekerjaanQuery A secondary query class using the current class as primary query
     */
    public function usePekerjaanRelatedByPekerjaanIdWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPekerjaanRelatedByPekerjaanIdWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PekerjaanRelatedByPekerjaanIdWali', '\DataDikdas\Model\PekerjaanQuery');
    }

    /**
     * Filter the query by a related JenjangPendidikan object
     *
     * @param   JenjangPendidikan|PropelObjectCollection $jenjangPendidikan The related object(s) to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByJenjangPendidikanRelatedByJenjangPendidikanWali($jenjangPendidikan, $comparison = null)
    {
        if ($jenjangPendidikan instanceof JenjangPendidikan) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $jenjangPendidikan->getJenjangPendidikanId(), $comparison);
        } elseif ($jenjangPendidikan instanceof PropelObjectCollection) {
            if (null === $comparison) {
                $comparison = Criteria::IN;
            }

            return $this
                ->addUsingAlias(PesertaDidikPeer::JENJANG_PENDIDIKAN_WALI, $jenjangPendidikan->toKeyValue('PrimaryKey', 'JenjangPendidikanId'), $comparison);
        } else {
            throw new PropelException('filterByJenjangPendidikanRelatedByJenjangPendidikanWali() only accepts arguments of type JenjangPendidikan or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the JenjangPendidikanRelatedByJenjangPendidikanWali relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinJenjangPendidikanRelatedByJenjangPendidikanWali($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('JenjangPendidikanRelatedByJenjangPendidikanWali');

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
            $this->addJoinObject($join, 'JenjangPendidikanRelatedByJenjangPendidikanWali');
        }

        return $this;
    }

    /**
     * Use the JenjangPendidikanRelatedByJenjangPendidikanWali relation JenjangPendidikan object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\JenjangPendidikanQuery A secondary query class using the current class as primary query
     */
    public function useJenjangPendidikanRelatedByJenjangPendidikanWaliQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinJenjangPendidikanRelatedByJenjangPendidikanWali($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'JenjangPendidikanRelatedByJenjangPendidikanWali', '\DataDikdas\Model\JenjangPendidikanQuery');
    }

    /**
     * Filter the query by a related AnggotaPanitia object
     *
     * @param   AnggotaPanitia|PropelObjectCollection $anggotaPanitia  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaPanitia($anggotaPanitia, $comparison = null)
    {
        if ($anggotaPanitia instanceof AnggotaPanitia) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $anggotaPanitia->getPesertaDidikId(), $comparison);
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
     * @return PesertaDidikQuery The current query, for fluid interface
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
     * Filter the query by a related AnggotaRombel object
     *
     * @param   AnggotaRombel|PropelObjectCollection $anggotaRombel  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByAnggotaRombel($anggotaRombel, $comparison = null)
    {
        if ($anggotaRombel instanceof AnggotaRombel) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $anggotaRombel->getPesertaDidikId(), $comparison);
        } elseif ($anggotaRombel instanceof PropelObjectCollection) {
            return $this
                ->useAnggotaRombelQuery()
                ->filterByPrimaryKeys($anggotaRombel->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByAnggotaRombel() only accepts arguments of type AnggotaRombel or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the AnggotaRombel relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinAnggotaRombel($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('AnggotaRombel');

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
            $this->addJoinObject($join, 'AnggotaRombel');
        }

        return $this;
    }

    /**
     * Use the AnggotaRombel relation AnggotaRombel object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\AnggotaRombelQuery A secondary query class using the current class as primary query
     */
    public function useAnggotaRombelQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinAnggotaRombel($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'AnggotaRombel', '\DataDikdas\Model\AnggotaRombelQuery');
    }

    /**
     * Filter the query by a related BeasiswaPesertaDidik object
     *
     * @param   BeasiswaPesertaDidik|PropelObjectCollection $beasiswaPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByBeasiswaPesertaDidik($beasiswaPesertaDidik, $comparison = null)
    {
        if ($beasiswaPesertaDidik instanceof BeasiswaPesertaDidik) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $beasiswaPesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($beasiswaPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useBeasiswaPesertaDidikQuery()
                ->filterByPrimaryKeys($beasiswaPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByBeasiswaPesertaDidik() only accepts arguments of type BeasiswaPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the BeasiswaPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinBeasiswaPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('BeasiswaPesertaDidik');

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
            $this->addJoinObject($join, 'BeasiswaPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the BeasiswaPesertaDidik relation BeasiswaPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\BeasiswaPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useBeasiswaPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinBeasiswaPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'BeasiswaPesertaDidik', '\DataDikdas\Model\BeasiswaPesertaDidikQuery');
    }

    /**
     * Filter the query by a related KesejahteraanPd object
     *
     * @param   KesejahteraanPd|PropelObjectCollection $kesejahteraanPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKesejahteraanPd($kesejahteraanPd, $comparison = null)
    {
        if ($kesejahteraanPd instanceof KesejahteraanPd) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $kesejahteraanPd->getPesertaDidikId(), $comparison);
        } elseif ($kesejahteraanPd instanceof PropelObjectCollection) {
            return $this
                ->useKesejahteraanPdQuery()
                ->filterByPrimaryKeys($kesejahteraanPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKesejahteraanPd() only accepts arguments of type KesejahteraanPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KesejahteraanPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinKesejahteraanPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KesejahteraanPd');

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
            $this->addJoinObject($join, 'KesejahteraanPd');
        }

        return $this;
    }

    /**
     * Use the KesejahteraanPd relation KesejahteraanPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KesejahteraanPdQuery A secondary query class using the current class as primary query
     */
    public function useKesejahteraanPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKesejahteraanPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KesejahteraanPd', '\DataDikdas\Model\KesejahteraanPdQuery');
    }

    /**
     * Filter the query by a related KitasPd object
     *
     * @param   KitasPd|PropelObjectCollection $kitasPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByKitasPd($kitasPd, $comparison = null)
    {
        if ($kitasPd instanceof KitasPd) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $kitasPd->getPesertaDidikId(), $comparison);
        } elseif ($kitasPd instanceof PropelObjectCollection) {
            return $this
                ->useKitasPdQuery()
                ->filterByPrimaryKeys($kitasPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByKitasPd() only accepts arguments of type KitasPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the KitasPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinKitasPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('KitasPd');

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
            $this->addJoinObject($join, 'KitasPd');
        }

        return $this;
    }

    /**
     * Use the KitasPd relation KitasPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\KitasPdQuery A secondary query class using the current class as primary query
     */
    public function useKitasPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinKitasPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'KitasPd', '\DataDikdas\Model\KitasPdQuery');
    }

    /**
     * Filter the query by a related PasporPd object
     *
     * @param   PasporPd|PropelObjectCollection $pasporPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPasporPd($pasporPd, $comparison = null)
    {
        if ($pasporPd instanceof PasporPd) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $pasporPd->getPesertaDidikId(), $comparison);
        } elseif ($pasporPd instanceof PropelObjectCollection) {
            return $this
                ->usePasporPdQuery()
                ->filterByPrimaryKeys($pasporPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPasporPd() only accepts arguments of type PasporPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PasporPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPasporPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PasporPd');

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
            $this->addJoinObject($join, 'PasporPd');
        }

        return $this;
    }

    /**
     * Use the PasporPd relation PasporPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PasporPdQuery A secondary query class using the current class as primary query
     */
    public function usePasporPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPasporPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PasporPd', '\DataDikdas\Model\PasporPdQuery');
    }

    /**
     * Filter the query by a related PesertaDidikBaru object
     *
     * @param   PesertaDidikBaru|PropelObjectCollection $pesertaDidikBaru  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikBaru($pesertaDidikBaru, $comparison = null)
    {
        if ($pesertaDidikBaru instanceof PesertaDidikBaru) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidikBaru->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidikBaru instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikBaruQuery()
                ->filterByPrimaryKeys($pesertaDidikBaru->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikBaru() only accepts arguments of type PesertaDidikBaru or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikBaru relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPesertaDidikBaru($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikBaru');

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
            $this->addJoinObject($join, 'PesertaDidikBaru');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikBaru relation PesertaDidikBaru object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikBaruQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikBaruQuery($relationAlias = null, $joinType = Criteria::LEFT_JOIN)
    {
        return $this
            ->joinPesertaDidikBaru($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikBaru', '\DataDikdas\Model\PesertaDidikBaruQuery');
    }

    /**
     * Filter the query by a related PesertaDidikLongitudinal object
     *
     * @param   PesertaDidikLongitudinal|PropelObjectCollection $pesertaDidikLongitudinal  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPesertaDidikLongitudinal($pesertaDidikLongitudinal, $comparison = null)
    {
        if ($pesertaDidikLongitudinal instanceof PesertaDidikLongitudinal) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidikLongitudinal->getPesertaDidikId(), $comparison);
        } elseif ($pesertaDidikLongitudinal instanceof PropelObjectCollection) {
            return $this
                ->usePesertaDidikLongitudinalQuery()
                ->filterByPrimaryKeys($pesertaDidikLongitudinal->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPesertaDidikLongitudinal() only accepts arguments of type PesertaDidikLongitudinal or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the PesertaDidikLongitudinal relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPesertaDidikLongitudinal($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('PesertaDidikLongitudinal');

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
            $this->addJoinObject($join, 'PesertaDidikLongitudinal');
        }

        return $this;
    }

    /**
     * Use the PesertaDidikLongitudinal relation PesertaDidikLongitudinal object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PesertaDidikLongitudinalQuery A secondary query class using the current class as primary query
     */
    public function usePesertaDidikLongitudinalQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPesertaDidikLongitudinal($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'PesertaDidikLongitudinal', '\DataDikdas\Model\PesertaDidikLongitudinalQuery');
    }

    /**
     * Filter the query by a related Prestasi object
     *
     * @param   Prestasi|PropelObjectCollection $prestasi  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByPrestasi($prestasi, $comparison = null)
    {
        if ($prestasi instanceof Prestasi) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $prestasi->getPesertaDidikId(), $comparison);
        } elseif ($prestasi instanceof PropelObjectCollection) {
            return $this
                ->usePrestasiQuery()
                ->filterByPrimaryKeys($prestasi->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByPrestasi() only accepts arguments of type Prestasi or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the Prestasi relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinPrestasi($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('Prestasi');

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
            $this->addJoinObject($join, 'Prestasi');
        }

        return $this;
    }

    /**
     * Use the Prestasi relation Prestasi object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\PrestasiQuery A secondary query class using the current class as primary query
     */
    public function usePrestasiQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinPrestasi($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'Prestasi', '\DataDikdas\Model\PrestasiQuery');
    }

    /**
     * Filter the query by a related RegistrasiPesertaDidik object
     *
     * @param   RegistrasiPesertaDidik|PropelObjectCollection $registrasiPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByRegistrasiPesertaDidik($registrasiPesertaDidik, $comparison = null)
    {
        if ($registrasiPesertaDidik instanceof RegistrasiPesertaDidik) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $registrasiPesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($registrasiPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useRegistrasiPesertaDidikQuery()
                ->filterByPrimaryKeys($registrasiPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByRegistrasiPesertaDidik() only accepts arguments of type RegistrasiPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the RegistrasiPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinRegistrasiPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('RegistrasiPesertaDidik');

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
            $this->addJoinObject($join, 'RegistrasiPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the RegistrasiPesertaDidik relation RegistrasiPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\RegistrasiPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useRegistrasiPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinRegistrasiPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'RegistrasiPesertaDidik', '\DataDikdas\Model\RegistrasiPesertaDidikQuery');
    }

    /**
     * Filter the query by a related SertifikasiPd object
     *
     * @param   SertifikasiPd|PropelObjectCollection $sertifikasiPd  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterBySertifikasiPd($sertifikasiPd, $comparison = null)
    {
        if ($sertifikasiPd instanceof SertifikasiPd) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $sertifikasiPd->getPesertaDidikId(), $comparison);
        } elseif ($sertifikasiPd instanceof PropelObjectCollection) {
            return $this
                ->useSertifikasiPdQuery()
                ->filterByPrimaryKeys($sertifikasiPd->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterBySertifikasiPd() only accepts arguments of type SertifikasiPd or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the SertifikasiPd relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinSertifikasiPd($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('SertifikasiPd');

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
            $this->addJoinObject($join, 'SertifikasiPd');
        }

        return $this;
    }

    /**
     * Use the SertifikasiPd relation SertifikasiPd object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\SertifikasiPdQuery A secondary query class using the current class as primary query
     */
    public function useSertifikasiPdQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinSertifikasiPd($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'SertifikasiPd', '\DataDikdas\Model\SertifikasiPdQuery');
    }

    /**
     * Filter the query by a related VldPesertaDidik object
     *
     * @param   VldPesertaDidik|PropelObjectCollection $vldPesertaDidik  the related object to use as filter
     * @param     string $comparison Operator to use for the column comparison, defaults to Criteria::EQUAL
     *
     * @return                 PesertaDidikQuery The current query, for fluid interface
     * @throws PropelException - if the provided filter is invalid.
     */
    public function filterByVldPesertaDidik($vldPesertaDidik, $comparison = null)
    {
        if ($vldPesertaDidik instanceof VldPesertaDidik) {
            return $this
                ->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $vldPesertaDidik->getPesertaDidikId(), $comparison);
        } elseif ($vldPesertaDidik instanceof PropelObjectCollection) {
            return $this
                ->useVldPesertaDidikQuery()
                ->filterByPrimaryKeys($vldPesertaDidik->getPrimaryKeys())
                ->endUse();
        } else {
            throw new PropelException('filterByVldPesertaDidik() only accepts arguments of type VldPesertaDidik or PropelCollection');
        }
    }

    /**
     * Adds a JOIN clause to the query using the VldPesertaDidik relation
     *
     * @param     string $relationAlias optional alias for the relation
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function joinVldPesertaDidik($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        $tableMap = $this->getTableMap();
        $relationMap = $tableMap->getRelation('VldPesertaDidik');

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
            $this->addJoinObject($join, 'VldPesertaDidik');
        }

        return $this;
    }

    /**
     * Use the VldPesertaDidik relation VldPesertaDidik object
     *
     * @see       useQuery()
     *
     * @param     string $relationAlias optional alias for the relation,
     *                                   to be used as main alias in the secondary query
     * @param     string $joinType Accepted values are null, 'left join', 'right join', 'inner join'
     *
     * @return   \DataDikdas\Model\VldPesertaDidikQuery A secondary query class using the current class as primary query
     */
    public function useVldPesertaDidikQuery($relationAlias = null, $joinType = Criteria::INNER_JOIN)
    {
        return $this
            ->joinVldPesertaDidik($relationAlias, $joinType)
            ->useQuery($relationAlias ? $relationAlias : 'VldPesertaDidik', '\DataDikdas\Model\VldPesertaDidikQuery');
    }

    /**
     * Exclude object from result
     *
     * @param   PesertaDidik $pesertaDidik Object to remove from the list of results
     *
     * @return PesertaDidikQuery The current query, for fluid interface
     */
    public function prune($pesertaDidik = null)
    {
        if ($pesertaDidik) {
            $this->addUsingAlias(PesertaDidikPeer::PESERTA_DIDIK_ID, $pesertaDidik->getPesertaDidikId(), Criteria::NOT_EQUAL);
        }

        return $this;
    }

}
