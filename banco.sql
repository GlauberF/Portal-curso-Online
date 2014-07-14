SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Banco de Dados: `curso_online`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE IF NOT EXISTS `aluno` (
  `idaluno` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `tel` varchar(45) DEFAULT NULL,
  `cel` varchar(45) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cidade` varchar(120) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idaluno`),
  KEY `fk_aluno_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno_venda`
--

CREATE TABLE IF NOT EXISTS `aluno_venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `aluno_id` int(11) NOT NULL,
  `venda_id` int(11) NOT NULL,
  `liberacao` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_alunovenda_aluno` (`aluno_id`),
  KEY `fk_alunovenda_venda` (`venda_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `aula`
--

CREATE TABLE IF NOT EXISTS `aula` (
  `idaula` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `endereco_video` varchar(200) NOT NULL,
  `descricao` text NOT NULL,
  `curso_idcurso` int(11) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idaula`),
  KEY `fk_aula_curso1` (`curso_idcurso`),
  KEY `FK_aula_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE IF NOT EXISTS `cidades` (
  `estados_cod_estados` int(11) DEFAULT NULL,
  `cod_cidades` int(11) NOT NULL DEFAULT '0',
  `nome` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cep` varchar(8) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`cod_cidades`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `idcliente` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) DEFAULT NULL,
  `cnpj` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `senha` varchar(60) DEFAULT NULL,
  `site` varchar(120) DEFAULT NULL,
  `endereco` varchar(120) DEFAULT NULL,
  `complemento` varchar(120) DEFAULT NULL,
  `bairro` varchar(45) DEFAULT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(120) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `telefone` varchar(45) DEFAULT NULL,
  `ativo` varchar(45) DEFAULT NULL,
  `folder` varchar(45) DEFAULT NULL,
  `simulado` int(11) DEFAULT NULL,
  `online` int(11) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra`
--

CREATE TABLE IF NOT EXISTS `compra` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` date NOT NULL,
  `modo_pag` varchar(40) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `status` varchar(120) NOT NULL,
  `aluno_idaluno` int(11) NOT NULL,
  `notification_id` varchar(100) NOT NULL,
  `cliente_idcliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compra_aluno` (`aluno_idaluno`),
  KEY `fk_compra_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `compra_curso`
--

CREATE TABLE IF NOT EXISTS `compra_curso` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `venda_id` int(11) NOT NULL,
  `nome` varchar(120) NOT NULL,
  `compra_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_compracurso_venda` (`venda_id`),
  KEY `fk_compracurso_compra` (`compra_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `concurso`
--

CREATE TABLE IF NOT EXISTS `concurso` (
  `idconcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `descricao` text,
  `remuneracao` double(10,2) DEFAULT NULL,
  `vagas` int(11) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idconcurso`),
  KEY `fk_concurso_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `configuracao`
--

CREATE TABLE IF NOT EXISTS `configuracao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(80) DEFAULT NULL,
  `emailnews` varchar(80) DEFAULT NULL,
  `smtp` varchar(80) DEFAULT NULL,
  `bdbackup` date DEFAULT NULL,
  `filebackup` date DEFAULT NULL,
  `smtppass` varchar(60) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `cliente_idcliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `id_contato` int(11) NOT NULL AUTO_INCREMENT,
  `assunto` varchar(40) NOT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `novo` tinyint(1) NOT NULL,
  `texto` text NOT NULL,
  `type` tinyint(1) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_contato`),
  KEY `fk_contato_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `curso`
--

CREATE TABLE IF NOT EXISTS `curso` (
  `idcurso` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `descricao` text,
  `concurso_idconcurso` int(11) NOT NULL,
  `professor_idprofessor` int(11) NOT NULL,
  `cliente_idcliente` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `capa` varchar(100) DEFAULT NULL,
  `adicional` text,
  PRIMARY KEY (`idcurso`),
  KEY `fk_curso_concurso1` (`concurso_idconcurso`),
  KEY `fk_curso_professor1` (`professor_idprofessor`),
  KEY `fk_curso_professor` (`professor_idprofessor`),
  KEY `fk_curso_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `cod_estados` int(11) DEFAULT NULL,
  `sigla` varchar(2) COLLATE utf8_unicode_ci DEFAULT NULL,
  `nome` varchar(72) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gateway`
--

CREATE TABLE IF NOT EXISTS `gateway` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `token` varchar(80) DEFAULT NULL,
  `ativo` int(11) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_gateway_cliente` (`cliente_idcliente`),
  KEY `cliente_idcliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `layout`
--

CREATE TABLE IF NOT EXISTS `layout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente_idcliente` int(11) DEFAULT NULL,
  `tema_idtema` int(11) DEFAULT NULL,
  `ativo` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_layout_cliente` (`cliente_idcliente`),
  KEY `fk_layout_tema` (`tema_idtema`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `material`
--

CREATE TABLE IF NOT EXISTS `material` (
  `idmaterial` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `endereco` varchar(200) DEFAULT NULL,
  `descricao` text,
  `aula_idaula` int(11) NOT NULL,
  `cliente_idcliente` int(11) DEFAULT NULL,
  PRIMARY KEY (`idmaterial`),
  KEY `fk_material_aula1` (`aula_idaula`),
  KEY `fk_material_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pergunta`
--

CREATE TABLE IF NOT EXISTS `pergunta` (
  `idpergunta` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `correta` varchar(45) DEFAULT NULL,
  `questao_idquestao` int(11) NOT NULL,
  PRIMARY KEY (`idpergunta`),
  KEY `fk_pergunta_questao1` (`questao_idquestao`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `professor`
--

CREATE TABLE IF NOT EXISTS `professor` (
  `idprofessor` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `tel` varchar(12) DEFAULT NULL,
  `cel` varchar(12) DEFAULT NULL,
  `cpf` varchar(13) DEFAULT NULL,
  `cliente_idcliente` int(11) NOT NULL,
  `comissao` int(11) DEFAULT NULL,
  PRIMARY KEY (`idprofessor`),
  KEY `fk_cliente_idcliente` (`cliente_idcliente`),
  KEY `fk_professor_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questao`
--

CREATE TABLE IF NOT EXISTS `questao` (
  `idquestao` int(11) NOT NULL AUTO_INCREMENT,
  `questao` text,
  `simulado_idsimulado` int(11) NOT NULL,
  `valor` int(11) DEFAULT NULL,
  PRIMARY KEY (`idquestao`),
  KEY `fk_questao_simulado1` (`simulado_idsimulado`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `simulado`
--

CREATE TABLE IF NOT EXISTS `simulado` (
  `idsimulado` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) DEFAULT NULL,
  `valor` double(10,2) DEFAULT NULL,
  `descricao` text,
  `cliente_idcliente` int(11) NOT NULL,
  PRIMARY KEY (`idsimulado`),
  KEY `fk_simulado_cliente1` (`cliente_idcliente`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tema`
--

CREATE TABLE IF NOT EXISTS `tema` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `zip` varchar(100) DEFAULT NULL,
  `capa` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `password` varchar(60) NOT NULL,
  `email` varchar(128) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`nome`),
  UNIQUE KEY `email` (`email`),
  KEY `status` (`status`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=9 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda`
--

CREATE TABLE IF NOT EXISTS `venda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) DEFAULT NULL,
  `valor` decimal(10,2) DEFAULT NULL,
  `capa` varchar(100) DEFAULT NULL,
  `cliente_idcliente` int(11) DEFAULT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `descricao` text,
  `adicional` text,
  `pacote` int(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_venda_cliente` (`cliente_idcliente`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `venda_curso`
--

CREATE TABLE IF NOT EXISTS `venda_curso` (
  `venda_id` int(11) NOT NULL,
  `curso_id` int(11) NOT NULL,
  PRIMARY KEY (`venda_id`,`curso_id`),
  KEY `fk_curso` (`curso_id`),
  KEY `fk_venda` (`venda_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `versao`
--

CREATE TABLE IF NOT EXISTS `versao` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `atualizacao_numero` varchar(100) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `descricao` text,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `aluno`
--
ALTER TABLE `aluno`
  ADD CONSTRAINT `fk_aluno_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `aluno_venda`
--
ALTER TABLE `aluno_venda`
  ADD CONSTRAINT `fk_alunovenda_aluno` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_alunovenda_venda` FOREIGN KEY (`venda_id`) REFERENCES `venda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `aula`
--
ALTER TABLE `aula`
  ADD CONSTRAINT `fk_aula_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_aula_curso1` FOREIGN KEY (`curso_idcurso`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `compra`
--
ALTER TABLE `compra`
  ADD CONSTRAINT `fk_compra_aluno` FOREIGN KEY (`aluno_idaluno`) REFERENCES `aluno` (`idaluno`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compra_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `compra_curso`
--
ALTER TABLE `compra_curso`
  ADD CONSTRAINT `fk_compracurso_compra` FOREIGN KEY (`compra_id`) REFERENCES `compra` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_compracurso_venda` FOREIGN KEY (`venda_id`) REFERENCES `venda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `concurso`
--
ALTER TABLE `concurso`
  ADD CONSTRAINT `fk_concurso_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `configuracao`
--
ALTER TABLE `configuracao`
  ADD CONSTRAINT `configuracao_ibfk_1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`);

--
-- Restrições para a tabela `contato`
--
ALTER TABLE `contato`
  ADD CONSTRAINT `fk_contato_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `fk_curso_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_concurso1` FOREIGN KEY (`concurso_idconcurso`) REFERENCES `concurso` (`idconcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_curso_professor` FOREIGN KEY (`professor_idprofessor`) REFERENCES `professor` (`idprofessor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `gateway`
--
ALTER TABLE `gateway`
  ADD CONSTRAINT `fk_gateway_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `layout`
--
ALTER TABLE `layout`
  ADD CONSTRAINT `fk_layout_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_layout_tema` FOREIGN KEY (`tema_idtema`) REFERENCES `tema` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `material`
--
ALTER TABLE `material`
  ADD CONSTRAINT `fk_material_aula1` FOREIGN KEY (`aula_idaula`) REFERENCES `aula` (`idaula`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_material_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `pergunta`
--
ALTER TABLE `pergunta`
  ADD CONSTRAINT `fk_pergunta_questao1` FOREIGN KEY (`questao_idquestao`) REFERENCES `questao` (`idquestao`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `professor`
--
ALTER TABLE `professor`
  ADD CONSTRAINT `fk_professor_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `questao`
--
ALTER TABLE `questao`
  ADD CONSTRAINT `fk_questao_simulado1` FOREIGN KEY (`simulado_idsimulado`) REFERENCES `simulado` (`idsimulado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `simulado`
--
ALTER TABLE `simulado`
  ADD CONSTRAINT `fk_simulado_cliente1` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `venda`
--
ALTER TABLE `venda`
  ADD CONSTRAINT `fk_venda_cliente` FOREIGN KEY (`cliente_idcliente`) REFERENCES `cliente` (`idcliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para a tabela `venda_curso`
--
ALTER TABLE `venda_curso`
  ADD CONSTRAINT `fk_curso` FOREIGN KEY (`curso_id`) REFERENCES `curso` (`idcurso`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_venda` FOREIGN KEY (`venda_id`) REFERENCES `venda` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;