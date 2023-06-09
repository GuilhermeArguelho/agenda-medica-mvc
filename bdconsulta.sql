PGDMP     (            
        {         
   bdconsulta    14.2    14.2     �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false                        1262    66792 
   bdconsulta    DATABASE     j   CREATE DATABASE bdconsulta WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Portuguese_Brazil.1252';
    DROP DATABASE bdconsulta;
                postgres    false            �            1255    66854    validacpf()    FUNCTION     �   CREATE FUNCTION public.validacpf() RETURNS trigger
    LANGUAGE plpgsql
    AS $$
declare
	
begin
	if not exists (select * from consulta where consulta.cpf = new.cpf) then
		RETURN NEW; 
	end if;
	RETURN NULL;
end
$$;
 "   DROP FUNCTION public.validacpf();
       public          postgres    false            �            1259    66881    consulta    TABLE     )  CREATE TABLE public.consulta (
    id integer NOT NULL,
    nome_paciente character varying(50) NOT NULL,
    cpf character varying(11) NOT NULL,
    telefone character varying(20),
    data date,
    horario time without time zone,
    descricao character varying(1000),
    doutor_id integer
);
    DROP TABLE public.consulta;
       public         heap    postgres    false            �            1259    66880    consulta_id_seq    SEQUENCE     �   CREATE SEQUENCE public.consulta_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 &   DROP SEQUENCE public.consulta_id_seq;
       public          postgres    false    210                       0    0    consulta_id_seq    SEQUENCE OWNED BY     C   ALTER SEQUENCE public.consulta_id_seq OWNED BY public.consulta.id;
          public          postgres    false    209            �            1259    66963    doutor    TABLE     }   CREATE TABLE public.doutor (
    id integer NOT NULL,
    nome character varying(100),
    atuacao character varying(100)
);
    DROP TABLE public.doutor;
       public         heap    postgres    false            �            1259    66962    doutor_id_seq    SEQUENCE     �   CREATE SEQUENCE public.doutor_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.doutor_id_seq;
       public          postgres    false    212                       0    0    doutor_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.doutor_id_seq OWNED BY public.doutor.id;
          public          postgres    false    211            b           2604    66884    consulta id    DEFAULT     j   ALTER TABLE ONLY public.consulta ALTER COLUMN id SET DEFAULT nextval('public.consulta_id_seq'::regclass);
 :   ALTER TABLE public.consulta ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    210    209    210            c           2604    66966 	   doutor id    DEFAULT     f   ALTER TABLE ONLY public.doutor ALTER COLUMN id SET DEFAULT nextval('public.doutor_id_seq'::regclass);
 8   ALTER TABLE public.doutor ALTER COLUMN id DROP DEFAULT;
       public          postgres    false    211    212    212            �          0    66881    consulta 
   TABLE DATA           i   COPY public.consulta (id, nome_paciente, cpf, telefone, data, horario, descricao, doutor_id) FROM stdin;
    public          postgres    false    210   z       �          0    66963    doutor 
   TABLE DATA           3   COPY public.doutor (id, nome, atuacao) FROM stdin;
    public          postgres    false    212   2                  0    0    consulta_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.consulta_id_seq', 42, true);
          public          postgres    false    209                       0    0    doutor_id_seq    SEQUENCE SET     <   SELECT pg_catalog.setval('public.doutor_id_seq', 19, true);
          public          postgres    false    211            e           2606    66888    consulta consulta_cpf_key 
   CONSTRAINT     S   ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT consulta_cpf_key UNIQUE (cpf);
 C   ALTER TABLE ONLY public.consulta DROP CONSTRAINT consulta_cpf_key;
       public            postgres    false    210            g           2606    66970    consulta consulta_pkey 
   CONSTRAINT     T   ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT consulta_pkey PRIMARY KEY (id);
 @   ALTER TABLE ONLY public.consulta DROP CONSTRAINT consulta_pkey;
       public            postgres    false    210            j           2606    66968    doutor doutor_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.doutor
    ADD CONSTRAINT doutor_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.doutor DROP CONSTRAINT doutor_pkey;
       public            postgres    false    212            h           1259    66976    fki_doutor_id    INDEX     G   CREATE INDEX fki_doutor_id ON public.consulta USING btree (doutor_id);
 !   DROP INDEX public.fki_doutor_id;
       public            postgres    false    210            k           2606    66971    consulta doutor_id    FK CONSTRAINT     ~   ALTER TABLE ONLY public.consulta
    ADD CONSTRAINT doutor_id FOREIGN KEY (doutor_id) REFERENCES public.doutor(id) NOT VALID;
 <   ALTER TABLE ONLY public.consulta DROP CONSTRAINT doutor_id;
       public          postgres    false    212    210    3178            �   �   x�u�=�0����+2��rwI?ҵ�����I
�&��M���/����n�D�}��h@D"bfc`S7[��]��h�@�C��ɧq�A�tc(�Ze	��_����.�_�*�zu{Ir�d�)˰��tb�VӒ�Y�c��ժ�μ�cL>d,D��F]J���;8      �   m   x�34���)��KT�LJ�,�Wp,J/M�����/*�/HM�,.I�2����?�8_!,�(Q�)?7-3W��%5����ӽ43'#�(7U!(?/1'�3 �9��(�+F��� �0$     