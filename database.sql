-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 30/07/2016 às 22:57
-- Versão do servidor: 5.6.28-0ubuntu0.14.04.1
-- Versão do PHP: 5.5.9-1ubuntu4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de dados: `mypubliccard`
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `tipo_conta` varchar(20) NOT NULL,
  `titular` varchar(60) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `cron`
--

CREATE TABLE IF NOT EXISTS `cron` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `proxima_execucao` int(15) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  KEY `idx_cpf` (`cpf`),
  KEY `idx_data_cadastro` (`data_cadastro`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

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
  `valor_minimo_pago` varchar(3) NOT NULL,
  `valor_maximo_pago` varchar(3) NOT NULL,
  `permitir_renovacao_automatica` int(11) NOT NULL,
  `paga_fim_de_semana` int(11) NOT NULL,
  `ativa_gerencianet` int(11) NOT NULL,
  `token_gerencianet` varchar(200) NOT NULL,
  `permitir_cadastro_anuncio` int(11) NOT NULL DEFAULT '1',
  `valor_reserva` double(10,2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
