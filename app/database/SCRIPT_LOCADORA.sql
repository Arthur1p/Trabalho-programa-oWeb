CREATE DATABASE locadora
DEFAULT CHARACTER SET utf8
DEFAULT COLLATE utf8_general_ci;

USE locadora;

create table usuario(
	nome varchar(100) not null,
	senha varchar(100) not null,
	primary key (nome)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO usuario VALUES 
	('admin',sha1('admin'));


create table cliente(
	codigo int(10)  auto_increment,
	nome varchar(50) not null,
	cpf char(11) not null unique,
	celular char(11) not null,
	primary key (codigo)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO cliente VALUES 
	(null,'Alan Rick','00000000110','83910011001'),
	(null,'Marcio Bittar','00000000220','83910021000'),
	(null,'Sérgio Petecão','10000000012','83910031001'),
	(null,'Fernando Farias','12000000013','83910042001'),
	(null,'Renan Calheiros','20000000012','83910141001');
INSERT INTO cliente (nome,cpf,celular) VALUES 	
	('Pandorano Silva','22450000012','83910141221'),
	('Fudustreco Pessoense','33300000012','83923166001'),
	('Cicrado Talher','98550000012','83988841001'),
	('Pindorama Zero','99880000012','83977784101'),
	('Maria José','55689000012','83939978001'),
	('Marcio Ponciano','65800135412','83998561021'),
	('Pedro Lázaro','50060000019','83994481772');


create table marca(
	codigo int(10) auto_increment,
	nome varchar(50) not null,
	primary key (codigo)
)ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO marca (nome) VALUES
	('Kia'),
	('Jeep'),
	('JAC'),
	('Hyundai'),
	('Ford'),
	('Fiat'),
	('Peugeot'),
	('Citroën'),
	('Chevrolet'),
	('Chery'),
	('Honda');


create table categoria(
	codigo int(10) auto_increment,
	descricao varchar(50) not null, 
	primary key (codigo)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO categoria (descricao) VALUES
	('Básico'),
	('Compacto'),
	('Sedan'),
	('Família'),
	('Luxo');


create table veiculo(
	codigo int(10) auto_increment,
	placa varchar(10) not null,
	codigoMarca int(10) not null,
	codigoCategoria int (10) not null,
	primary key (codigo),
	foreign key (codigoMarca) references marca(codigo),
	foreign key (codigoCategoria) references categoria(codigo)
) ENGINE=INNODB DEFAULT CHARSET=utf8;

INSERT INTO veiculo VALUES
(null,'ABA2C78',1,4),
(null,'BBW9E66',4,3),
(null,'BTA5G52',6,2),
(null,'EKA5T29',2,1),
(null,'FOR2B47',3,1),
(null,'GRT1D13',9,2),
(null,'CDB8A58',5,3),
(null,'DAD8C15',4,5),
(null,'TAG2B95',1,3),
(null,'NOR6C86',2,4);


create table locacao(
	id_locacao int(10) auto_increment,
	dt_inicial date,
	dt_final date,
	vl_locacao decimal(7,2),
	codigoCliente int(10),
	codigoVeiculo int (10),
	primary key (id_locacao),
	foreign key (codigoCliente) references cliente(codigo),
	foreign key (codigoVeiculo) references veiculo(codigo)
) ENGINE=INNODB DEFAULT CHARSET=utf8;
	
INSERT INTO locacao VALUES
(null,'2023-11-05', '2023-11-10',570.24,9,5),
(null,'2023-11-10', '2023-11-13',450.51,5,4),
(null,'2023-11-18', '2023-11-22',490.78,1,4),
(null,'2023-12-01', '2023-12-08',620.33,10,6),
(null,'2023-12-09', '2023-12-15',701.99,3,7),
(null,'2023-12-17', '2023-12-22',889.44,7,8),
(null,'2023-12-23', '2023-12-29',1520.56,8,10),
(null,'2024-01-02', '2024-01-10',1841.19,11,10),
(null,'2024-01-04', '2024-01-12',1750.14,12,9),
(null,'2024-01-10', '2024-01-20',970.15,2,5),
(null,'2024-01-13', '2024-01-17',444.20,4,4),
(null,'2024-01-14', '2024-01-17',289.39,6,10),
(null,'2024-02-09', '2024-02-14',600.10,1,6),
(null,'2024-02-10', '2024-02-19',460.14,7,5),
(null,'2024-02-12', '2024-02-17',399.99,9,9),
(null,'2024-03-01', '2024-03-10',810.77,10,8),
(null,'2024-03-07', '2024-03-20',981.57,12,9),
(null,'2024-03-20', '2024-03-25',510.35,2,5),
(null,'2024-04-10', '2024-04-14',420.13,1,1),
(null,'2024-04-15', '2024-04-20',700.30,9,9);

CREATE USER 'user_locadora'@'localhost' IDENTIFIED BY 'user%locadora#';
GRANT ALL PRIVILEGES ON locadora.* TO 'user_locadora'@'localhost';