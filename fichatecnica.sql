--
-- PostgreSQL database dump
--

-- Dumped from database version 9.1.13
-- Dumped by pg_dump version 9.4.3
-- Started on 2016-03-18 09:36:43 VET

SET statement_timeout = 0;
SET lock_timeout = 0;
SET client_encoding = 'LATIN1';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- TOC entry 171 (class 3079 OID 11652)
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- TOC entry 1910 (class 0 OID 0)
-- Dependencies: 171
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- TOC entry 161 (class 1259 OID 28203)
-- Name: acceso; Type: TABLE; Schema: public; Owner: fichatecnica; Tablespace: 
--

CREATE TABLE acceso (
    id integer NOT NULL,
    login text,
    nivel text
);


ALTER TABLE acceso OWNER TO fichatecnica;

--
-- TOC entry 162 (class 1259 OID 28209)
-- Name: acceso_id_seq; Type: SEQUENCE; Schema: public; Owner: fichatecnica
--

CREATE SEQUENCE acceso_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE acceso_id_seq OWNER TO fichatecnica;

--
-- TOC entry 1911 (class 0 OID 0)
-- Dependencies: 162
-- Name: acceso_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fichatecnica
--

ALTER SEQUENCE acceso_id_seq OWNED BY acceso.id;


--
-- TOC entry 163 (class 1259 OID 28211)
-- Name: regiones; Type: TABLE; Schema: public; Owner: fichatecnica; Tablespace: 
--

CREATE TABLE regiones (
    id integer NOT NULL,
    region text
);


ALTER TABLE regiones OWNER TO fichatecnica;

--
-- TOC entry 164 (class 1259 OID 28217)
-- Name: regiones_id_seq; Type: SEQUENCE; Schema: public; Owner: fichatecnica
--

CREATE SEQUENCE regiones_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE regiones_id_seq OWNER TO fichatecnica;

--
-- TOC entry 1912 (class 0 OID 0)
-- Dependencies: 164
-- Name: regiones_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fichatecnica
--

ALTER SEQUENCE regiones_id_seq OWNED BY regiones.id;


--
-- TOC entry 165 (class 1259 OID 28219)
-- Name: servicios; Type: TABLE; Schema: public; Owner: fichatecnica; Tablespace: 
--

CREATE TABLE servicios (
    id integer NOT NULL,
    region text,
    nombres_ldap text,
    estados_ldap text,
    nombres_dns text,
    estados_dns text,
    nombres_dhcp text,
    estados_dhcp text,
    nombres_correo text,
    estados_correo text,
    nombres_proxy text,
    estados_proxy text,
    nombres_repositorio text,
    estados_repositorio text,
    observaciones text
);


ALTER TABLE servicios OWNER TO fichatecnica;

--
-- TOC entry 166 (class 1259 OID 28225)
-- Name: servicios_id_seq; Type: SEQUENCE; Schema: public; Owner: fichatecnica
--

CREATE SEQUENCE servicios_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE servicios_id_seq OWNER TO fichatecnica;

--
-- TOC entry 1913 (class 0 OID 0)
-- Dependencies: 166
-- Name: servicios_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fichatecnica
--

ALTER SEQUENCE servicios_id_seq OWNED BY servicios.id;


--
-- TOC entry 167 (class 1259 OID 28227)
-- Name: subredes; Type: TABLE; Schema: public; Owner: fichatecnica; Tablespace: 
--

CREATE TABLE subredes (
    id integer NOT NULL,
    region integer,
    subredes text,
    estados text,
    observaciones text
);


ALTER TABLE subredes OWNER TO fichatecnica;

--
-- TOC entry 168 (class 1259 OID 28233)
-- Name: subredes_id_seq; Type: SEQUENCE; Schema: public; Owner: fichatecnica
--

CREATE SEQUENCE subredes_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE subredes_id_seq OWNER TO fichatecnica;

--
-- TOC entry 1914 (class 0 OID 0)
-- Dependencies: 168
-- Name: subredes_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fichatecnica
--

ALTER SEQUENCE subredes_id_seq OWNED BY subredes.id;


--
-- TOC entry 169 (class 1259 OID 28235)
-- Name: tecnicos; Type: TABLE; Schema: public; Owner: fichatecnica; Tablespace: 
--

CREATE TABLE tecnicos (
    id integer NOT NULL,
    region integer,
    tecnicospropetario text,
    tecnicoslibre text,
    observaciones text
);


ALTER TABLE tecnicos OWNER TO fichatecnica;

--
-- TOC entry 170 (class 1259 OID 28241)
-- Name: tecnicos_id_seq; Type: SEQUENCE; Schema: public; Owner: fichatecnica
--

CREATE SEQUENCE tecnicos_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE tecnicos_id_seq OWNER TO fichatecnica;

--
-- TOC entry 1915 (class 0 OID 0)
-- Dependencies: 170
-- Name: tecnicos_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: fichatecnica
--

ALTER SEQUENCE tecnicos_id_seq OWNED BY tecnicos.id;


--
-- TOC entry 1787 (class 2604 OID 28258)
-- Name: id; Type: DEFAULT; Schema: public; Owner: fichatecnica
--

ALTER TABLE ONLY acceso ALTER COLUMN id SET DEFAULT nextval('acceso_id_seq'::regclass);


--
-- TOC entry 1788 (class 2604 OID 28259)
-- Name: id; Type: DEFAULT; Schema: public; Owner: fichatecnica
--

ALTER TABLE ONLY regiones ALTER COLUMN id SET DEFAULT nextval('regiones_id_seq'::regclass);


--
-- TOC entry 1789 (class 2604 OID 28260)
-- Name: id; Type: DEFAULT; Schema: public; Owner: fichatecnica
--

ALTER TABLE ONLY servicios ALTER COLUMN id SET DEFAULT nextval('servicios_id_seq'::regclass);


--
-- TOC entry 1790 (class 2604 OID 28261)
-- Name: id; Type: DEFAULT; Schema: public; Owner: fichatecnica
--

ALTER TABLE ONLY subredes ALTER COLUMN id SET DEFAULT nextval('subredes_id_seq'::regclass);


--
-- TOC entry 1791 (class 2604 OID 28262)
-- Name: id; Type: DEFAULT; Schema: public; Owner: fichatecnica
--

ALTER TABLE ONLY tecnicos ALTER COLUMN id SET DEFAULT nextval('tecnicos_id_seq'::regclass);


--
-- TOC entry 1793 (class 2606 OID 28249)
-- Name: hcc_rep_otrs_pkey; Type: CONSTRAINT; Schema: public; Owner: fichatecnica; Tablespace: 
--

ALTER TABLE ONLY acceso
    ADD CONSTRAINT hcc_rep_otrs_pkey PRIMARY KEY (id);


--
-- TOC entry 1795 (class 2606 OID 28251)
-- Name: region_pkey; Type: CONSTRAINT; Schema: public; Owner: fichatecnica; Tablespace: 
--

ALTER TABLE ONLY regiones
    ADD CONSTRAINT region_pkey PRIMARY KEY (id);


--
-- TOC entry 1797 (class 2606 OID 28253)
-- Name: servicios_pkey; Type: CONSTRAINT; Schema: public; Owner: fichatecnica; Tablespace: 
--

ALTER TABLE ONLY servicios
    ADD CONSTRAINT servicios_pkey PRIMARY KEY (id);


--
-- TOC entry 1799 (class 2606 OID 28255)
-- Name: subredes_pkey; Type: CONSTRAINT; Schema: public; Owner: fichatecnica; Tablespace: 
--

ALTER TABLE ONLY subredes
    ADD CONSTRAINT subredes_pkey PRIMARY KEY (id);


--
-- TOC entry 1801 (class 2606 OID 28257)
-- Name: tecnicos_pkey; Type: CONSTRAINT; Schema: public; Owner: fichatecnica; Tablespace: 
--

ALTER TABLE ONLY tecnicos
    ADD CONSTRAINT tecnicos_pkey PRIMARY KEY (id);


--
-- TOC entry 1909 (class 0 OID 0)
-- Dependencies: 6
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


-- Completed on 2016-03-18 09:36:43 VET

--
-- PostgreSQL database dump complete
--

