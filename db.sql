-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 30/08/2016 às 04:23
-- Versão do servidor: 5.5.50-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `db`
--

DELIMITER $$
--
-- Procedimentos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `ANALISE_REDE_ID`(IN `ID_BENEFICIARIO` INT)
BEGIN
SET @rownr=0;
SELECT 
@rownr:=@rownr+1 AS rowNumber,
       
      n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                                 END AS situacao,
      7 as nivel,' indicação (-6º Nível)' as descricao ,6 AS VALOR, p.id_patrocinador,n1.data_cadastro,
      if( data_cadastro < '2016-05-13', 0, 6 )  AS VALOR_POR_DATA
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario
      where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario 
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 6 AS NIVEL,' indicação (-5º Nível)' as descricao, 5  AS VALOR, p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 5 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                             END AS situacao,
 5 AS NIVEL,' indicação (-4º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 3 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 4 AS NIVEL,' indicação (-3º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 3 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 3 AS NIVEL,' indicação (-2º Nível)' as descricao, 4  AS VALOR, p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 4 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 2 AS NIVEL,' indicação (-1º Nível)' as descricao, 6  AS VALOR, p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 6 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario
                         LEFT JOIN faturas f ON p.id_usuario = f.id_user =1
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 1 AS NIVEL ,' indicação direta ()' as descricao, 18  AS VALOR,p.id_patrocinador,n1.data_cadastro,
 if( data_cadastro < '2016-05-13', 0, 18 )  AS VALOR_POR_DATA
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador=ID_BENEFICIARIO
 order by 6,2;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `ANALISE_REDE_ID_ORDEM`(ID_BENEFICIARIO INT)
BEGIN
SET @rownr=0;
SELECT 
@rownr:=@rownr+1 AS rowNumber,
       
      n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                                 END AS situacao,
      7 as nivel,' indicação (-6º Nível)' as descricao ,6 AS VALOR, p.id_patrocinador,n1.data_cadastro
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario
      where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario 
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 6 AS NIVEL,' indicação (-5º Nível)' as descricao, 5  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                             END AS situacao,
 5 AS NIVEL,' indicação (-4º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 4 AS NIVEL,' indicação (-3º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 3 AS NIVEL,' indicação (-2º Nível)' as descricao, 4  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))
 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 2 AS NIVEL,' indicação (-1º Nível)' as descricao, 6  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario
                         LEFT JOIN faturas f ON p.id_usuario = f.id_user =1
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select @rownr:=@rownr+1 AS rowNumber, n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 1 AS NIVEL ,' indicação direta ()' as descricao, 18  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador=ID_BENEFICIARIO
 order by 1 DESC;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `CRIA_TABLE_REDE_ID`(IN `ID_BENEFICIARIO` INT)
BEGIN

SET @droptab=CONCAT("DROP TABLE IF EXISTS publicca.saldo_rede_id",ID_BENEFICIARIO);

SET @createtab=CONCAT("create table publicca_dbsaldos.saldo_rede_id",ID_BENEFICIARIO,"
 (id smallint, nome varchar(60),nivel char(1),valor decimal(10,2), id_patrocinador smallint)");

SET @inserttab=CONCAT("INSERT INTO publicca.saldo_rede_id",ID_BENEFICIARIO, "   
      select n1.id,nome,7 as nivel,6 AS VALOR, p.id_patrocinador
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario  
      where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,6 AS NIVEL, 5  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,5 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,4 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,3 AS NIVEL, 4  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,2 AS NIVEL, 6  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,1 AS NIVEL, 18  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador=ID_BENEFICIARIO
 order by 3,4,1");
 
 PREPARE stmtDrop FROM @droptab;
 EXECUTE stmtDrop;	

 PREPARE stmtCreate FROM @createtab;
 EXECUTE stmtCreate;

 PREPARE stmtInserttab FROM @inserttab;
 EXECUTE stmtInserttab;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `LISTA_REDE_ID`(IN `ID_BENEFICIARIO` INT)
BEGIN
       
      select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                                 END AS situacao,
      7 as nivel,' indicação (-6º Nível)' as descricao ,6 AS VALOR, p.id_patrocinador,n1.data_cadastro
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario
      where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario 
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 6 AS NIVEL,' indicação (-5º Nível)' as descricao, 5  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                             END AS situacao,
 5 AS NIVEL,' indicação (-4º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 4 AS NIVEL,' indicação (-3º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 3 AS NIVEL,' indicação (-2º Nível)' as descricao, 4  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 2 AS NIVEL,' indicação (-1º Nível)' as descricao, 6  AS VALOR, p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario
                         LEFT JOIN faturas f ON p.id_usuario = f.id_user =1
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 1 AS NIVEL ,' indicação direta ()' as descricao, 18  AS VALOR,p.id_patrocinador,n1.data_cadastro
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador=ID_BENEFICIARIO
 order by 5,1;

END$$

--
-- Funções
--
CREATE DEFINER=`root`@`localhost` FUNCTION `SALDO_DISPONIVEL`(`ID_BENEFICIARIO` INT) RETURNS int(11)
BEGIN
     DECLARE VVALOR INT;
     SET VVALOR=(select SUM(VALOR) from
     (  
      select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                                 END AS situacao,
      7 as nivel,' indicação (-6º Nível)' as descricao ,6 AS VALOR, p.id_patrocinador
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario
      where block=0 and id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario 
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 6 AS NIVEL,' indicação (-5º Nível)' as descricao, 5  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                             END AS situacao,
 5 AS NIVEL,' indicação (-4º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 4 AS NIVEL,' indicação (-3º Nível)' as descricao, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 3 AS NIVEL,' indicação (-2º Nível)' as descricao, 4  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 2 AS NIVEL,' indicação (-1º Nível)' as descricao, 6  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario
                         LEFT JOIN faturas f ON p.id_usuario = f.id_user =1
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 1 AS NIVEL ,' indicação direta ()' as descricao, 18  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador=ID_BENEFICIARIO
 order by 5,6,1) AS SALDO_DISPONIVEL);

 RETURN VVALOR;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `SALDO_DISPONIVEL_DT`(`ID_BENEFICIARIO` INT) RETURNS int(11)
BEGIN
     DECLARE VVALOR INT;
     SET VVALOR=(select SUM(VALOR) from
     (  
      select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                                 END AS situacao,
      7 as nivel,' indicação (-6º Nível)' as descricao ,if( data_cadastro < '2016-05-14', 0, 6 )  AS VALOR, p.id_patrocinador
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario
      where block=0 and id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario 
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 6 AS NIVEL,' indicação (-5º Nível)' as descricao, if( data_cadastro < '2016-05-14', 0, 5 )  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                             END AS situacao,
 5 AS NIVEL,' indicação (-4º Nível)' as descricao, if( data_cadastro < '2016-05-14', 0, 3 )  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 4 AS NIVEL,' indicação (-3º Nível)' as descricao, if( data_cadastro < '2016-05-14', 0, 3 )  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 3 AS NIVEL,' indicação (-2º Nível)' as descricao, if( data_cadastro < '2016-05-14', 0, 4 )  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
                         where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 2 AS NIVEL,' indicação (-1º Nível)' as descricao, if( data_cadastro < '2016-05-14', 0, 6 )  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario
                         LEFT JOIN faturas f ON p.id_usuario = f.id_user =1
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,n1.login,CASE block WHEN 1
                                            THEN 'inativo'
                                            ELSE 'ativo'
                            END AS situacao,
 1 AS NIVEL ,' indicação direta ()' as descricao, if( data_cadastro < '2016-05-14', 0, 18 )  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where block=0 and id_patrocinador=ID_BENEFICIARIO
 order by 5,6,1) AS SALDO_DISPONIVEL);

 RETURN VVALOR;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `SALDO_DISPONIVEL_GERAL`(ID_BENEFICIARIO INT) RETURNS int(11)
BEGIN
     DECLARE VVALOR INT;
     SET VVALOR=(select SUM(VALOR) from
     (  
      select n1.id,nome,7 as nivel,6 AS VALOR, p.id_patrocinador
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario  
      where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,6 AS NIVEL, 5  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,5 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,4 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,3 AS NIVEL, 4  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,2 AS NIVEL, 6  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,1 AS NIVEL, 18  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where id_patrocinador=ID_BENEFICIARIO
 order by 3,4,1) AS SALDO_DISPONIVEL);

 RETURN VVALOR;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `SALDO_DISPONIVEL_GERAL_ATIVOS`(ID_BENEFICIARIO INT) RETURNS int(11)
BEGIN
     DECLARE VVALOR INT;
     SET VVALOR=(select SUM(VALOR) from
     (  
      select n1.id,nome,7 as nivel,6 AS VALOR, p.id_patrocinador
      from usuarios n1
      left join patrocinadores p ON n1.id =p.id_usuario  
      where BLOCK=0 AND id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))))
 union
 select n1.id,nome,6 AS NIVEL, 5  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador in
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))))
 union
 select n1.id,nome,5 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador in

                       (select n1.id 
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))))
 union
 select n1.id,nome,4 AS NIVEL, 3  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)))
 union
 select n1.id,nome,3 AS NIVEL, 4  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador in 
                       (select n1.id
                        from usuarios n1
                        left join patrocinadores p ON n1.id =p.id_usuario  
                        where id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO))
 union
 select n1.id,nome,2 AS NIVEL, 6  AS VALOR, p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador in
						(select n1.id
						 from usuarios n1
						 left join patrocinadores p ON n1.id =p.id_usuario  
						 where id_patrocinador=ID_BENEFICIARIO)

 union
 select n1.id,nome,1 AS NIVEL, 18  AS VALOR,p.id_patrocinador
 from usuarios n1
 left join patrocinadores p ON n1.id =p.id_usuario  
 where BLOCK=0 AND id_patrocinador=ID_BENEFICIARIO
 order by 3,4,1) AS SALDO_DISPONIVEL);

 RETURN VVALOR;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `admin_login`
--

CREATE TABLE IF NOT EXISTS `admin_login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(150) NOT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `permissao` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `admin_login`
--

INSERT INTO `admin_login` (`id`, `nome`, `login`, `senha`, `permissao`) VALUES
(1, 'Admin', 'adm', '202cb962ac59075b964b07152d234b70', 2);

-- --------------------------------------------------------

--
-- Estrutura para tabela `anuncios`
--

CREATE TABLE IF NOT EXISTS `anuncios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `descricao` text NOT NULL,
  `link` varchar(150) NOT NULL,
  `cliques` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `boletos`
--

CREATE TABLE IF NOT EXISTS `boletos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fatura` int(11) NOT NULL,
  `chave_boleto` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `comprovantes`
--

CREATE TABLE IF NOT EXISTS `comprovantes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_fatura` int(11) NOT NULL,
  `comprovante` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `contas_bancarias`
--

CREATE TABLE IF NOT EXISTS `contas_bancarias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `banco` varchar(150) NOT NULL,
  `agencia` varchar(15) NOT NULL,
  `conta` varchar(30) NOT NULL,
  `tipo_conta` varchar(200) NOT NULL,
  `titular` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `contas_bancarias`
--

INSERT INTO `contas_bancarias` (`id`, `banco`, `agencia`, `conta`, `tipo_conta`, `titular`) VALUES
(1, '0', '0', '0', '155vXUwh2qwJ64oXi1JM7hpDNUvvg2bGxL', 'Nifty Capital - BlockChain.info');

-- --------------------------------------------------------

--
-- Estrutura para tabela `cotas`
--

CREATE TABLE IF NOT EXISTS `cotas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `quantidade` int(11) NOT NULL,
  `primeiro_recebimento` int(20) NOT NULL,
  `ultimo_recebimento` int(20) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cron`
--

CREATE TABLE IF NOT EXISTS `cron` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proxima_execucao` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `cron`
--

INSERT INTO `cron` (`id`, `proxima_execucao`) VALUES
(1, 1472428800);

-- --------------------------------------------------------

--
-- Estrutura para tabela `extrato`
--

CREATE TABLE IF NOT EXISTS `extrato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `descricao` text NOT NULL,
  `cor` varchar(10) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Fazendo dump de dados para tabela `extrato`
--

INSERT INTO `extrato` (`id`, `id_user`, `valor`, `descricao`, `cor`, `data`) VALUES
(1, 8, 180.00, 'indicação direta() ', '#FF0000', '2016-08-30'),
(2, 8, 150.00, 'indicação (-1º Nível)', '#FF0000', '2016-08-30'),
(3, 8, 150.00, 'indicação (-2º Nível)', '#FF0000', '2016-08-30');

-- --------------------------------------------------------

--
-- Estrutura para tabela `faturas`
--

CREATE TABLE IF NOT EXISTS `faturas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `quantidade_cotas` int(11) NOT NULL,
  `renovacao` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_id_user` (`id_user`),
  KEY `idx_status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=101 ;

--
-- Fazendo dump de dados para tabela `faturas`
--

INSERT INTO `faturas` (`id`, `id_user`, `quantidade_cotas`, `renovacao`, `status`) VALUES
(100, 101, 300, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `graduacoes`
--

CREATE TABLE IF NOT EXISTS `graduacoes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(250) NOT NULL,
  `pontuacao` int(11) NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'Ativa',
  `icone` varchar(100) NOT NULL,
  `grad_required` int(12) NOT NULL,
  `qntd_grad` int(12) NOT NULL,
  `imagem` varchar(255) NOT NULL,
  `ciclos` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `notificacoes`
--

CREATE TABLE IF NOT EXISTS `notificacoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `visto` int(11) NOT NULL,
  `data` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Fazendo dump de dados para tabela `notificacoes`
--

INSERT INTO `notificacoes` (`id`, `id_user`, `mensagem`, `visto`, `data`) VALUES
(1, 8, 'Fatura #106 liberada! 300 cota(s) ativada(s) !', 1, 1472530195);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pacotes`
--

CREATE TABLE IF NOT EXISTS `pacotes` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` varchar(10) NOT NULL,
  `nivel` decimal(10,2) NOT NULL,
  `nivel1` decimal(10,2) NOT NULL,
  `nivel2` decimal(10,2) NOT NULL,
  `nivel3` decimal(10,2) NOT NULL,
  `nivel4` decimal(10,2) NOT NULL,
  `nivel5` decimal(10,2) NOT NULL,
  `nivel6` decimal(10,2) NOT NULL,
  `nivel7` decimal(10,2) NOT NULL,
  `nivel8` decimal(10,2) NOT NULL,
  `nivel9` decimal(10,2) NOT NULL,
  `nivel10` decimal(10,2) NOT NULL,
  `nivel11` decimal(10,2) NOT NULL,
  `nivel12` decimal(10,2) NOT NULL,
  `nivel13` decimal(10,2) NOT NULL,
  `nivel14` decimal(10,2) NOT NULL,
  `cotas_qnt` int(11) NOT NULL,
  `saque_max` double(10,2) NOT NULL,
  `reserva` double(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cotas_qnt` (`cotas_qnt`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Fazendo dump de dados para tabela `pacotes`
--

INSERT INTO `pacotes` (`id`, `nome`, `valor`, `status`, `nivel`, `nivel1`, `nivel2`, `nivel3`, `nivel4`, `nivel5`, `nivel6`, `nivel7`, `nivel8`, `nivel9`, `nivel10`, `nivel11`, `nivel12`, `nivel13`, `nivel14`, `cotas_qnt`, `saque_max`, `reserva`) VALUES
(1, '[HB] BASIC', 0.00, 'Ativo', 0.50, 0.30, 0.20, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 1, 0.00, 0.00),
(2, '[HB] BASIC', 0.00, 'Ativo', 2.50, 1.50, 1.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 5, 0.00, 0.00),
(3, '[HB] BASIC', 0.00, 'Ativo', 4.00, 2.40, 1.60, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 8, 0.00, 0.00),
(4, '[HB] BASIC', 0.00, 'Ativo', 5.00, 3.00, 2.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 10, 0.00, 0.00),
(5, '[HB] MASTER', 0.00, 'Ativo', 9.00, 7.50, 6.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 15, 0.00, 0.00),
(6, '[HB] MASTER', 0.00, 'Ativo', 15.00, 12.50, 10.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 25, 0.00, 0.00),
(7, '[HB] MASTER', 0.00, 'Ativo', 30.00, 25.00, 20.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 50, 0.00, 0.00),
(8, '[HB] MASTER', 0.00, 'Ativo', 60.00, 50.00, 40.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 100, 0.00, 0.00),
(9, '[HB] ADVANCED', 0.00, 'Ativo', 90.00, 75.00, 75.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 150, 0.00, 0.00),
(10, '[HB] ADVANCED', 0.00, 'Ativo', 120.00, 100.00, 100.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 200, 0.00, 0.00),
(11, '[HB] ADVANCED', 0.00, 'Ativo', 150.00, 125.00, 125.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 250, 0.00, 0.00),
(12, '[HB] ADVANCED', 0.00, 'Ativo', 180.00, 150.00, 150.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 0.00, 300, 0.00, 0.00);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos_minas`
--

CREATE TABLE IF NOT EXISTS `pagamentos_minas` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` date NOT NULL,
  `block` int(11) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL,
  `saldo_calculado` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamentos_saldos_vmb`
--

CREATE TABLE IF NOT EXISTS `pagamentos_saldos_vmb` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL,
  `data_cadastro` date NOT NULL,
  `block` int(11) NOT NULL,
  `saldo_disponivel` int(11) NOT NULL,
  `saldo_calculado` int(11) DEFAULT NULL,
  `saldo_inferior100` int(1) NOT NULL DEFAULT '0',
  `saldo_a_pagar` int(1) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pagamento_id3906`
--

CREATE TABLE IF NOT EXISTS `pagamento_id3906` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `patrocinadores`
--

CREATE TABLE IF NOT EXISTS `patrocinadores` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(11) NOT NULL,
  `id_patrocinador` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_id_patrocinador` (`id_patrocinador`),
  KEY `idx_id_usuario` (`id_usuario`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Fazendo dump de dados para tabela `patrocinadores`
--

INSERT INTO `patrocinadores` (`id`, `id_usuario`, `id_patrocinador`) VALUES
(6, 8, 8),
(7, 101, 100);

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id160`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id160` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id161`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id161` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id3315`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id3315` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id3875`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id3875` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id3906`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id3906` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id4522`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id4522` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `id_patrocinador` (`id_patrocinador`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id4794`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id4794` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `id_patrocinador` (`id_patrocinador`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id4809`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id4809` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `id_patrocinador` (`id_patrocinador`),
  KEY `id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id4834`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id4834` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id5297`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id5297` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id5298`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id5298` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saldo_rede_id5425`
--

CREATE TABLE IF NOT EXISTS `saldo_rede_id5425` (
  `id` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(120) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `nivel` bigint(20) NOT NULL DEFAULT '0',
  `VALOR` bigint(20) NOT NULL DEFAULT '0',
  `id_patrocinador` int(11) DEFAULT NULL,
  KEY `idx_patrocinador` (`id_patrocinador`),
  KEY `idx_id` (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `saques`
--

CREATE TABLE IF NOT EXISTS `saques` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `data_pedido` date NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets`
--

CREATE TABLE IF NOT EXISTS `tickets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `titulo` varchar(150) NOT NULL,
  `data` date NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tickets_mensagem`
--

CREATE TABLE IF NOT EXISTS `tickets_mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_ticket` int(11) NOT NULL,
  `mensagem` text NOT NULL,
  `user` int(11) NOT NULL,
  `data` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) NOT NULL,
  `email` varchar(150) NOT NULL,
  `cpf` varchar(20) NOT NULL,
  `nascimento` date NOT NULL,
  `celular` varchar(15) NOT NULL,
  `login` varchar(25) NOT NULL,
  `senha` varchar(50) NOT NULL,
  `banco` varchar(100) DEFAULT NULL,
  `agencia` varchar(10) DEFAULT NULL,
  `conta` varchar(40) DEFAULT NULL,
  `tipo_conta` varchar(50) DEFAULT NULL,
  `titular` varchar(100) DEFAULT NULL,
  `block` int(11) NOT NULL,
  `saldo_disponivel` decimal(10,2) NOT NULL,
  `saldo_bloqueado` decimal(10,2) NOT NULL,
  `data_cadastro` date NOT NULL,
  `pacote` int(11) NOT NULL,
  `pontos` int(11) NOT NULL,
  `graduacao` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `idx_nome` (`nome`),
  KEY `idx_login` (`login`),
  KEY `idx_data_cadastro` (`data_cadastro`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=102 ;

--
-- Fazendo dump de dados para tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `email`, `cpf`, `nascimento`, `celular`, `login`, `senha`, `banco`, `agencia`, `conta`, `tipo_conta`, `titular`, `block`, `saldo_disponivel`, `saldo_bloqueado`, `data_cadastro`, `pacote`, `pontos`, `graduacao`) VALUES
(100, '', '', '', '0000-00-00', '', 'niftycapital', 'e79d400d4481dff1f2773e8fcd5f257a', NULL, NULL, NULL, NULL, NULL, 0, 0.00, 0.00, '0000-00-00', 0, 0, 0),
(101, 'Ronaldo Ribeiro Bueno', 'buenobl13@gmail.com', '1472530869', '1984-10-01', '(62) 98185-9193', 'lideraguia', '41922224c52c3b1bd2f2421f04309aa3', NULL, NULL, NULL, NULL, NULL, 1, 0.00, 0.00, '2016-08-30', 12, 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios_repetidos`
--

CREATE TABLE IF NOT EXISTS `usuarios_repetidos` (
  `login` varchar(25) CHARACTER SET utf8 NOT NULL,
  `qtde_dup` bigint(21) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura para tabela `website_config`
--

CREATE TABLE IF NOT EXISTS `website_config` (
  `id` int(11) NOT NULL DEFAULT '1',
  `nome_site` varchar(100) NOT NULL,
  `imagem_logo` varchar(150) NOT NULL,
  `imagem_logo_backoffice` varchar(200) NOT NULL,
  `imagem_logo_admin` varchar(150) NOT NULL,
  `favicon` varchar(150) NOT NULL,
  `valor_indicacao` decimal(10,2) NOT NULL,
  `email_remetente` varchar(150) NOT NULL,
  `valor_cota` decimal(10,2) NOT NULL,
  `maximo_cotas` int(11) NOT NULL,
  `validade_cotas` int(11) NOT NULL,
  `permitir_transferencia_membros` int(11) NOT NULL,
  `valor_minimo_transferencia` decimal(10,2) NOT NULL,
  `pagar_com_saldo` int(11) NOT NULL,
  `taxa_pagamento_saldo` decimal(10,2) NOT NULL,
  `saque_disponivel` int(11) NOT NULL,
  `valor_minimo_saque` decimal(10,2) NOT NULL,
  `dias_saque` int(11) NOT NULL,
  `taxa_saque` int(11) NOT NULL,
  `pagamento_automatico` int(11) NOT NULL,
  `hora_pagamento` varchar(5) NOT NULL,
  `valor_minimo_pago` varchar(6) NOT NULL,
  `valor_maximo_pago` varchar(6) NOT NULL,
  `permitir_renovacao_automatica` int(11) NOT NULL,
  `paga_fim_de_semana` int(11) NOT NULL,
  `ativa_gerencianet` int(11) NOT NULL,
  `token_gerencianet` varchar(200) NOT NULL,
  `xpub` text NOT NULL,
  `permitir_cadastro_anuncio` int(11) NOT NULL DEFAULT '1',
  `valor_reserva` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `website_config`
--

INSERT INTO `website_config` (`id`, `nome_site`, `imagem_logo`, `imagem_logo_backoffice`, `imagem_logo_admin`, `favicon`, `valor_indicacao`, `email_remetente`, `valor_cota`, `maximo_cotas`, `validade_cotas`, `permitir_transferencia_membros`, `valor_minimo_transferencia`, `pagar_com_saldo`, `taxa_pagamento_saldo`, `saque_disponivel`, `valor_minimo_saque`, `dias_saque`, `taxa_saque`, `pagamento_automatico`, `hora_pagamento`, `valor_minimo_pago`, `valor_maximo_pago`, `permitir_renovacao_automatica`, `paga_fim_de_semana`, `ativa_gerencianet`, `token_gerencianet`, `xpub`, `permitir_cadastro_anuncio`, `valor_reserva`) VALUES
(1, 'Nifty Capital', 'logo_login.png', 'logo_backoffice.png', 'logo_admin.png', 'favicon.png', 0.00, '', 10.00, 50000, 120, 0, 0.00, 0, 0.00, 1, 10.00, 0, 10, 1, '00:00', '020', '020', 1, 0, 1, '', '', 0, 0.00);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
