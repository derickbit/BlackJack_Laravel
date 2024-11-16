INSERT INTO `produtos` (`id`, `nome`, `descricao`, `qtd_estoque`, `preco`, `importado`) VALUES
(111, 'Samsumg A5 - 2017', 'Samsumg A5 2017 2GB Exynos 8Core', 2, '4500.00', 0),
(112, 'Notebook DELL Inspiron 15', 'I5 7600HQ 8GBMen GTX1030m SSD 1TB', 300, '8500.00', 0),
(113, 'Notebook Samsumg Gamer', 'I7 10800HQ 16GB MEM NVIDIA-RTX2060m SSD 2TB', 150, '17500.00', 0),
(114, 'SSD 4TB', 'SSD SAMSUMG EVO 860 4TB', 200, '5750.00', 0),
(115, 'SSD 2TB', 'SSD SAMSUMG EVO 860 2TB', 150, '3750.00', 0),
(121, 'SSD 4TB', 'SSD WESTERN DIGITAL', 50, '4150.00', 0),
(122, 'GAINWARD PHOENIX RTX3080ti', 'GPU NVIDIA 12GB MEM GDDR6 256BITS GAINWARD PHOENIX ', 30, '14150.00', 0),
(123, 'GAINWARD PHOENIX RTX3070', 'GPU NVIDIA 8GB MEM GDDR6 256BITS GAINWARD PHOENIX ', 60, '7399.00', 0),
(124, 'ECHO DOT ALEXA', 'AMAZON ALEX ECHO DOT 3 GEN SMART SPEAKER', 1000, '200.00', 0),
(125, 'Monitor Asus BK 35\'\'', 'LED 35\" 3440x1440 Preto 1 HDMI(v1.4)', 500, '9990.00', 0);

INSERT INTO `denuncia` (`coddenuncia`,`denunciante`, `denunciado`,`descricao`) VALUES
(1,'JOÃO','MARIA','Denuncia teste 1'),
(2,'MARIA','JOÃO','Denuncia teste 2'),
(3,'JOSÉ','JOÃO','Denuncia teste 3'),
(4,'MARIA','JOSÉ','Denuncia teste 4');

INSERT INTO `partidas` (`codpartida`,`Jogador1`, `Jogador2`,`Vencedor`, `pontuacao`) VALUES
(1,'JOÃO','MARIA','MARIA',3),
(2,'MARIA','JOÃO','MARIA',5),
(3,'JOSÉ','JOÃO','JOSÉ',1),
(4,'MARIA','JOSÉ','JOSÉ',6);
