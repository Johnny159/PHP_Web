set names 'utf8';
drop database if exists mydb_1;
create database mydb_1
	character set 'utf8'
	collate 'utf8_general_ci';
use mydb_1;


-- 玩家会员等级价格
create table tb_vip(
	id int(2) primary key auto_increment,
	level varchar(4) not null unique,
	price int(6) not null
);
insert into tb_vip (level, price)values
	('vip1', 10),
	('vip2', 50),
	('vip3', 100);


-- 赛事
create table tb_stage(
	id int(3) primary key,
	img varchar(20) 
);


--赛道
create table tb_map(
	stage_id int(3),
	map_id int(3),
	img varchar(20),
	primary key(stage_id, map_id),
	foreign key (stage_id) references tb_stage(id)
);


-- 玩家
create table tb_player(
	username varchar(20) primary key,
	password varchar(20) not null,
	vip varchar(4),
	coins int(6),
	exp int(8),
	foreign key (vip) references tb_vip(level)
);


-- 玩家赛事记录
create table tb_player_map_record(
	username varchar(20),
	stage_id int(3),
	locked boolean,
	primary key(username, stage_id),
	foreign key (stage_id) references tb_map(stage_id),
	foreign key (username) references tb_player(username)
);


-- 玩家赛段记录
create table tb_player_map_record(
	username varchar(20),
	stage_id int(3),
	map_id int(3),
	star int(2),
	primary key(username, stage_id, map_id),
	foreign key (stage_id) references tb_map(stage_id),
	foreign key (map_id) references tb_map(map_id),
	foreign key (username) references tb_player(username)
);


-- 商品
create table tb_shopitem(
	id int(4) primary key,
	name char(10) not null,
	img_1 varchar(20) not null,
	img_2 varchar(20),
	func_value int(4) not null 
);


-- 用户购买记录
create table tb_user_buy(
	username varchar(20),
	item_id int(4),
	primary key(username, item_id),
	foreign key(username) references tb_player(username),
	foreign key(item_id) references tb_shopitem(id)
);


-- 用户使用记录
create table tb_user_use(
	username varchar(20),
	item_id int(4),
	primary key(username, item_id),
	foreign key(username) references tb_player(username),
	foreign key(item_id) references tb_shopitem(id)
);


-- 管理员
create table tb_admin(
	username varchar(20) primary key,
	password varchar(20) not null,
	level int(2)
);

insert into tb_admin values 
	('admin', 'admin', 0),
	('admin9', 'admin', 0),
	('admin8', 'admin', 0),
	('admin7', 'admin', 0),
	('admin6', 'admin', 0),
	('admin5', 'admin', 0),
	('admin4', 'admin', 0),
	('admin3', 'admin', 0),
	('admin2', 'admin', 0),
	('admin1', 'admin1', 1);

-- 后台菜单
create table tb_menu(
	id int(2) primary key,
	title char(8) not null,
	fid int(2) not null,
	url varchar(32)
);
insert into tb_menu values
	(1, '菜单1', 0, 'www1'),
	(2, '菜单2', 0, 'www2'),
	(3, '菜单3', 0, 'www3'),
	(4, '子菜单1', 1, 'www4'),
	(5, '子菜单2', 1, 'www5'),
	(6, '子菜单3', 1, 'www6'),
	(7, '子菜单4', 2, 'www7'),
	(8, '子菜单5', 2, 'www8'),
	(9, '子菜单6', 3, 'www9'),
	(10, '子菜单7', 3, 'www10'),
	(11, '子菜单8', 3, 'www11');

