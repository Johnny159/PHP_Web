set names 'utf8';
drop database if exists mydb_1;
create database mydb_1
	character set 'utf8'
	collate 'utf8_general_ci';
use mydb_1;


-- 会员等级规则
create table tb_vip(
	id int(2) primary key auto_increment,
	level varchar(4) not null unique,
	price int(6) not null
);
insert into tb_vip (level, price)values
	('vip0', 0),
	('vip1', 10),
	('vip2', 50),
	('vip3', 100);


-- 玩家
create table tb_player(
	username varchar(20) primary key,
	password varchar(20) not null,
	vip varchar(4),
	coins int(8),
	exp int(8),
	sign_time datetime,
	last_login_time datetime,
	money_charged int(8),
	locked BOOLEAN,
	record_stage int(4),
	record_map int(4),
	foreign key (vip) references tb_vip(level)
);
insert into tb_player (username, password, vip, coins, exp, sign_time, last_login_time, money_charged, locked, record_stage, record_map) values
	('asdasd','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd1','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd2','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd3','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd4','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd5','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd6','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd7','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd8','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1),
	('asdasd9','asdasd','vip3', 12344, 32432, now(), now(), 0, false,1,1);



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
	url varchar(128)
);
insert into tb_menu values
	(1, '玩家管理', 0, 'index.php?ctrl=Index&act=player'),
	(2, '游戏设定', 0, 'index.php?ctrl=Index&act=setting'),
	(3, '游戏过程', 0, 'index.php?ctrl=Index&act=procedure'),
	(4, '运营统计', 0, 'index.php?ctrl=Index&act=statistic'),
	(16, '玩家管理', 1, 'www4'),
	(5, '公告管理', 2, 'index.php?ctrl=Index&act=setting'),
	(6, 'VIP 规则', 2, 'www6'),
	(7, '赛事管理', 2, 'www7'),
	(8, '交易物品管理', 2, 'www8'),
	(13, '充值记录', 3, 'index.php?ctrl=Index&act=procedure_charge'),
	(14, '游戏记录', 3, 'index.php?ctrl=Index&act=procedure_game'),
	(15, '购买记录', 3, 'index.php?ctrl=Index&act=procedure_sell'),
	(9, '营收分析', 4, 'www9'),
	(10, '玩家分析', 4, 'www10'),
	(11, '交易分析', 4, 'www11'),
	(12, '游戏分析', 4, 'www12');


# 商品
create table tb_equip(
	id int(4) primary key,
	name varchar(8),
	img_1 varchar(32),
	img_2 varchar(32),
	func_value int(4) not null,
	type varchar(8)
);
insert into tb_equip values
	(1, '车手1', '', '', 100, 'biker'),
	(2, '车手1', '', '', 100, 'biker'),
	(3, '车手1', '', '', 100, 'biker'),
	(4, '车手1', '', '', 100, 'biker'),
	(5, '车手1', '', '', 100, 'biker'),
	(6, '车手1', '', '', 100, 'biker'),
	(7, '车手1', '', '', 100, 'biker'),
	(8, '车手1', '', '', 100, 'biker');

# 用户购买记录
create table tb_user_buy(
	username varchar(20),
	item_id int(4),
	type char(8),
	buy_time DATETIME,
	vip varchar(8),
	primary key(username, item_id),
	foreign key(username) references tb_player(username),
	foreign key(item_id) references tb_equip(id)
);
insert into tb_user_buy (username, item_id, type, buy_time, vip) values
	('asdasd', 1, 'biker', now(), 'vip1'),
	('asdasd', 2, 'biker', now(), 'vip1'),
	('asdasd', 3, 'biker', now(), 'vip1'),
	('asdasd', 4, 'biker', now(), 'vip1'),
	('asdasd', 5, 'biker', now(), 'vip1'),
	('asdasd', 6, 'biker', now(), 'vip1'),
	('asdasd', 7, 'biker', now(), 'vip1'),
	('asdasd', 8, 'biker', now(), 'vip1');

# 用户充值记录
create table tb_user_charge (
	id int(128) auto_increment primary key,
	username varchar(32),
	charge_money int(8),
	charge_time datetime,
	vip varchar(8),
	foreign key(username) references tb_player(username)
);
insert into tb_user_charge (username, charge_money, charge_time, vip) VALUES
	('asdasd', 1000, now(), 'vip1'),
	('asdasd', 500, now(), 'vip1'),
	('asdasd', 500, now(), 'vip1'),
	('asdasd', 100, now(), 'vip1'),
	('asdasd', 500, now(), 'vip1'),
	('asdasd', 200, now(), 'vip1'),
	('asdasd', 300, now(), 'vip1'),
	('asdasd', 200, now(), 'vip1'),
	('asdasd', 200, now(), 'vip1'),
	('asdasd', 500, now(), 'vip1');


create table tb_user_exp (
	id int(128) auto_increment primary key,
	username varchar(32),
	game_time DATETIME,
	stage int(4),
	map int(4),
	coins int(8),
	exp int(8),
	foreign key(username) references tb_player(username)
);
insert into tb_user_exp (username, game_time, stage, map, coins, exp) VALUES
	('asdasd', now(), 1, 1, 100, 100),
	('asdasd', now(), 1, 2, 100, 100),
	('asdasd', now(), 1, 3, 100, 100),
	('asdasd', now(), 1, 4, 100, 100),
	('asdasd', now(), 1, 5, 100, 100),
	('asdasd', now(), 1, 6, 100, 100),
	('asdasd', now(), 1, 7, 100, 100),
	('asdasd', now(), 1, 8, 100, 100),
	('asdasd1', now(), 1, 1, 100, 100);

# 公告
create table tb_notice (
	id int(128) auto_increment primary key,
	title varchar(32),
	content varchar(128),
	publish_time datetime,
	active_time int(32),
	deleted boolean
);
insert into tb_notice (title, content, publish_time, active_time, deleted) VALUES
	('通知', '天干物燥 小心火烛', now(), 36000, 0),
	('通知', '天干物燥 小心火烛', now(), 36000, 0),
	('通知', '天干物燥 小心火烛', now(), 36000, 0),
	('通知', '天干物燥 小心火烛', now(), 36000, 0),
	('通知', '天干物燥 小心火烛', now(), 36000, 0),
	('通知', '天干物燥 小心火烛', now(), 36000, 0);


-- 赛事
# create table tb_stage(
# 	id int(3) primary key,
# 	img varchar(20)
# );


--赛道
# create table tb_map(
# 	stage_id int(3),
# 	map_id int(3),
# 	img varchar(20),
# 	primary key(stage_id, map_id),
# 	foreign key (stage_id) references tb_stage(id)
# );








-- 用户使用记录
# create table tb_user_use(
# 	username varchar(20),
# 	item_id int(4),
# 	primary key(username, item_id),
# 	foreign key(username) references tb_player(username),
# 	foreign key(item_id) references tb_equip(id)
# );



-- 公告