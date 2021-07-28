--
-- PostgreSQL database dump
--

-- Dumped from database version 9.2.4
-- Dumped by pg_dump version 10.4

-- Started on 2019-01-15 15:10:56

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 169 (class 1259 OID 20669)
-- Name: bitter_table; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.bitter_table (
    bitter_table_id uuid NOT NULL,
    param_1 uuid NOT NULL,
    param_2 integer NOT NULL,
    param_3 uuid NOT NULL,
    param_4 text NOT NULL,
    create_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_update timestamp(6) without time zone DEFAULT now() NOT NULL,
    count_update smallint DEFAULT 1 NOT NULL,
    param_5 text,
    param_6 text
);


ALTER TABLE public.bitter_table OWNER TO postgres;

--
-- TOC entry 2016 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN bitter_table.param_1; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitter_table.param_1 IS 'sekolah_id';


--
-- TOC entry 2017 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN bitter_table.param_2; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitter_table.param_2 IS 'table_name';


--
-- TOC entry 2018 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN bitter_table.param_3; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitter_table.param_3 IS 'table_id';


--
-- TOC entry 2019 (class 0 OID 0)
-- Dependencies: 169
-- Name: COLUMN bitter_table.param_4; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.bitter_table.param_4 IS 'ciphertext';


--
-- TOC entry 170 (class 1259 OID 20678)
-- Name: info_pengguna; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.info_pengguna (
    info_pengguna_id uuid NOT NULL,
    pengguna_id uuid,
    gambar character varying(500),
    soft_delete smallint,
    last_update timestamp(6) without time zone,
    updater_id uuid
);


ALTER TABLE public.info_pengguna OWNER TO postgres;

--
-- TOC entry 171 (class 1259 OID 20684)
-- Name: info_sekolah; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.info_sekolah (
    info_sekolah_id uuid NOT NULL,
    sekolah_id uuid,
    gambar character varying(200),
    soft_delete smallint,
    last_update timestamp(6) without time zone,
    updater_id uuid
);


ALTER TABLE public.info_sekolah OWNER TO postgres;

--
-- TOC entry 172 (class 1259 OID 20687)
-- Name: pengaturan; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.pengaturan (
    pengaturan_id character varying NOT NULL,
    sekolah_id character varying NOT NULL,
    param_key character varying(50) NOT NULL,
    param_value character varying(50) NOT NULL,
    soft_delete smallint,
    last_update timestamp without time zone,
    updater_id character varying
);


ALTER TABLE public.pengaturan OWNER TO postgres;

--
-- TOC entry 173 (class 1259 OID 20693)
-- Name: ws_aplikasi; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ws_aplikasi (
    sekolah_id uuid NOT NULL,
    aplikasi_id uuid NOT NULL,
    nama character varying(50) NOT NULL,
    token text,
    password character varying(15) NOT NULL,
    ip_address character varying(20),
    port character varying(5),
    mac_address character varying(20),
    asal_data numeric(1,0) NOT NULL,
    aktif numeric(1,0) DEFAULT 1 NOT NULL,
    expired_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    create_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_update timestamp(6) without time zone DEFAULT now() NOT NULL,
    updater_id uuid NOT NULL,
    last_sync timestamp without time zone NOT NULL,
    soft_delete smallint DEFAULT 0 NOT NULL
);


ALTER TABLE public.ws_aplikasi OWNER TO postgres;

--
-- TOC entry 174 (class 1259 OID 20704)
-- Name: ws_role_column; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ws_role_column (
    role_column_id uuid NOT NULL,
    role_table_id uuid NOT NULL,
    aktif numeric(1,0) DEFAULT 1 NOT NULL,
    expired_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    create_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_update timestamp(6) without time zone DEFAULT now() NOT NULL,
    updater_id uuid NOT NULL,
    last_sync timestamp without time zone NOT NULL,
    soft_delete smallint DEFAULT 0 NOT NULL
);


ALTER TABLE public.ws_role_column OWNER TO postgres;

--
-- TOC entry 175 (class 1259 OID 20712)
-- Name: ws_role_table; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ws_role_table (
    role_table_id uuid NOT NULL,
    aplikasi_id uuid NOT NULL,
    role_read numeric(1,0) DEFAULT 0 NOT NULL,
    role_create numeric(1,0) DEFAULT 0 NOT NULL,
    role_update numeric(1,0) DEFAULT 0 NOT NULL,
    role_delete numeric(1,0) DEFAULT 0 NOT NULL,
    asal_data numeric(1,0) DEFAULT 1 NOT NULL,
    aktif numeric(1,0) DEFAULT 1 NOT NULL,
    expired_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    create_date timestamp(6) without time zone DEFAULT now() NOT NULL,
    last_update timestamp(6) without time zone DEFAULT now() NOT NULL,
    updater_id uuid NOT NULL,
    last_sync timestamp without time zone NOT NULL,
    soft_delete smallint DEFAULT 0 NOT NULL,
    nama_table character varying(20) NOT NULL,
    nama_alias character varying(30)
);


ALTER TABLE public.ws_role_table OWNER TO postgres;

--
-- TOC entry 2020 (class 0 OID 0)
-- Dependencies: 175
-- Name: COLUMN ws_role_table.asal_data; Type: COMMENT; Schema: public; Owner: postgres
--

COMMENT ON COLUMN public.ws_role_table.asal_data IS '1: ops, diatas 2: kementerian';


--
-- TOC entry 176 (class 1259 OID 20725)
-- Name: ws_token; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.ws_token (
    ws_token_id uuid NOT NULL,
    sekolah_id uuid NOT NULL,
    ip_address character varying(15),
    port character varying(5),
    mac_address character varying(20),
    token character varying(100) NOT NULL,
    request_date timestamp without time zone NOT NULL,
    expired_date time without time zone NOT NULL,
    ws_aplikasi_id uuid NOT NULL
);


ALTER TABLE public.ws_token OWNER TO postgres;

--
-- TOC entry 2001 (class 0 OID 20669)
-- Dependencies: 169
-- Data for Name: bitter_table; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.bitter_table (bitter_table_id, param_1, param_2, param_3, param_4, create_date, last_update, count_update, param_5, param_6) FROM stdin;
\.


--
-- TOC entry 2002 (class 0 OID 20678)
-- Dependencies: 170
-- Data for Name: info_pengguna; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.info_pengguna (info_pengguna_id, pengguna_id, gambar, soft_delete, last_update, updater_id) FROM stdin;
\.


--
-- TOC entry 2003 (class 0 OID 20684)
-- Dependencies: 171
-- Data for Name: info_sekolah; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.info_sekolah (info_sekolah_id, sekolah_id, gambar, soft_delete, last_update, updater_id) FROM stdin;
\.


--
-- TOC entry 2004 (class 0 OID 20687)
-- Dependencies: 172
-- Data for Name: pengaturan; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.pengaturan (pengaturan_id, sekolah_id, param_key, param_value, soft_delete, last_update, updater_id) FROM stdin;
\.


--
-- TOC entry 2005 (class 0 OID 20693)
-- Dependencies: 173
-- Data for Name: ws_aplikasi; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ws_aplikasi (sekolah_id, aplikasi_id, nama, token, password, ip_address, port, mac_address, asal_data, aktif, expired_date, create_date, last_update, updater_id, last_sync, soft_delete) FROM stdin;
\.


--
-- TOC entry 2006 (class 0 OID 20704)
-- Dependencies: 174
-- Data for Name: ws_role_column; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ws_role_column (role_column_id, role_table_id, aktif, expired_date, create_date, last_update, updater_id, last_sync, soft_delete) FROM stdin;
\.


--
-- TOC entry 2007 (class 0 OID 20712)
-- Dependencies: 175
-- Data for Name: ws_role_table; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ws_role_table (role_table_id, aplikasi_id, role_read, role_create, role_update, role_delete, asal_data, aktif, expired_date, create_date, last_update, updater_id, last_sync, soft_delete, nama_table, nama_alias) FROM stdin;
\.


--
-- TOC entry 2008 (class 0 OID 20725)
-- Dependencies: 176
-- Data for Name: ws_token; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.ws_token (ws_token_id, sekolah_id, ip_address, port, mac_address, token, request_date, expired_date, ws_aplikasi_id) FROM stdin;
\.


--
-- TOC entry 1866 (class 2606 OID 20729)
-- Name: bitter_table bitter_table_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitter_table
    ADD CONSTRAINT bitter_table_pkey PRIMARY KEY (bitter_table_id);


--
-- TOC entry 1870 (class 2606 OID 20731)
-- Name: info_pengguna info_pengguna_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.info_pengguna
    ADD CONSTRAINT info_pengguna_pkey PRIMARY KEY (info_pengguna_id);


--
-- TOC entry 1872 (class 2606 OID 20733)
-- Name: info_sekolah info_sekolah_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.info_sekolah
    ADD CONSTRAINT info_sekolah_pkey PRIMARY KEY (info_sekolah_id);


--
-- TOC entry 1874 (class 2606 OID 20735)
-- Name: pengaturan pengaturan_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.pengaturan
    ADD CONSTRAINT pengaturan_pkey PRIMARY KEY (pengaturan_id);


--
-- TOC entry 1868 (class 2606 OID 20737)
-- Name: bitter_table unique_1; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.bitter_table
    ADD CONSTRAINT unique_1 UNIQUE (param_1, param_2, param_3);


--
-- TOC entry 1876 (class 2606 OID 20739)
-- Name: ws_aplikasi ws_aplikasi_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_aplikasi
    ADD CONSTRAINT ws_aplikasi_pkey PRIMARY KEY (aplikasi_id);


--
-- TOC entry 1878 (class 2606 OID 65557)
-- Name: ws_aplikasi ws_aplikasi_unique_1; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_aplikasi
    ADD CONSTRAINT ws_aplikasi_unique_1 UNIQUE (password, sekolah_id);


--
-- TOC entry 1880 (class 2606 OID 65559)
-- Name: ws_aplikasi ws_aplikasi_unique_2; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_aplikasi
    ADD CONSTRAINT ws_aplikasi_unique_2 UNIQUE (sekolah_id, token);


--
-- TOC entry 1886 (class 2606 OID 20743)
-- Name: ws_role_column ws_role_column_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_role_column
    ADD CONSTRAINT ws_role_column_pkey PRIMARY KEY (role_column_id);


--
-- TOC entry 1890 (class 2606 OID 20745)
-- Name: ws_role_table ws_role_table_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_role_table
    ADD CONSTRAINT ws_role_table_pkey PRIMARY KEY (role_table_id);


--
-- TOC entry 1892 (class 2606 OID 20747)
-- Name: ws_token ws_token_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_token
    ADD CONSTRAINT ws_token_pkey PRIMARY KEY (ws_token_id);


--
-- TOC entry 1863 (class 1259 OID 20748)
-- Name: bitter_table_index_fk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX bitter_table_index_fk ON public.bitter_table USING btree (param_1, param_2, param_3);


--
-- TOC entry 1864 (class 1259 OID 20749)
-- Name: bitter_table_index_pk; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX bitter_table_index_pk ON public.bitter_table USING btree (bitter_table_id);


--
-- TOC entry 1881 (class 1259 OID 20750)
-- Name: ws_app_index_1; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX ws_app_index_1 ON public.ws_aplikasi USING btree (aplikasi_id);


--
-- TOC entry 1882 (class 1259 OID 20751)
-- Name: ws_app_index_2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ws_app_index_2 ON public.ws_aplikasi USING btree (aktif);


--
-- TOC entry 1883 (class 1259 OID 20752)
-- Name: ws_role_column_index_1; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ws_role_column_index_1 ON public.ws_role_column USING btree (role_column_id);


--
-- TOC entry 1884 (class 1259 OID 20753)
-- Name: ws_role_column_index_2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ws_role_column_index_2 ON public.ws_role_column USING btree (role_table_id);


--
-- TOC entry 1887 (class 1259 OID 20754)
-- Name: ws_role_table_index_1; Type: INDEX; Schema: public; Owner: postgres
--

CREATE UNIQUE INDEX ws_role_table_index_1 ON public.ws_role_table USING btree (role_table_id);


--
-- TOC entry 1888 (class 1259 OID 20755)
-- Name: ws_role_table_index_2; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX ws_role_table_index_2 ON public.ws_role_table USING btree (aplikasi_id);


--
-- TOC entry 1893 (class 2606 OID 20756)
-- Name: ws_role_column ws_role_column_role_table_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_role_column
    ADD CONSTRAINT ws_role_column_role_table_id_fkey FOREIGN KEY (role_table_id) REFERENCES public.ws_role_table(role_table_id) ON DELETE CASCADE;


--
-- TOC entry 1894 (class 2606 OID 20761)
-- Name: ws_role_table ws_role_table_aplikasi_id_fkey; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.ws_role_table
    ADD CONSTRAINT ws_role_table_aplikasi_id_fkey FOREIGN KEY (aplikasi_id) REFERENCES public.ws_aplikasi(aplikasi_id) ON DELETE CASCADE;


--
-- TOC entry 2015 (class 0 OID 0)
-- Dependencies: 7
-- Name: SCHEMA public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2019-01-15 15:10:57

--
-- PostgreSQL database dump complete
--

