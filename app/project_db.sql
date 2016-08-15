SET NAMES 'utf8';
DROP DATABASE IF EXISTS mydb_1;
CREATE DATABASE mydb_1
  CHARACTER SET 'utf8'
  COLLATE 'utf8_general_ci';
USE mydb_1;


# 会员等级规则
CREATE TABLE tb_vip (
  id      INT(2) PRIMARY KEY AUTO_INCREMENT,
  level   VARCHAR(16) NOT NULL UNIQUE,
  price   INT(8)      NOT NULL,
  deleted BOOLEAN
);
INSERT INTO tb_vip (level, price, deleted) VALUES
  ('vip0', 0, 0),
  ('vip1', 10, 0),
  ('vip2', 50, 0),
  ('vip3', 100, 0);


# 玩家
CREATE TABLE tb_player (
  username        VARCHAR(20) PRIMARY KEY,
  password        VARCHAR(20) NOT NULL,
  vip             VARCHAR(4),
  coins           INT(8),
  exp             INT(8),
  sign_time       DATETIME,
  last_login_time DATETIME,
  money_charged   INT(8),
  locked          BOOLEAN,
  record_stage    INT(4),
  record_map      INT(4),
  FOREIGN KEY (vip) REFERENCES tb_vip (level)
);
INSERT INTO tb_player (username, password, vip, coins, exp, sign_time, last_login_time, money_charged, locked, record_stage, record_map)
VALUES
  ('asdasd', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd1', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd2', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd3', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd4', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd5', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd6', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd7', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd8', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1),
  ('asdasd9', 'asdasd', 'vip3', 12344, 32432, now(), now(), 0, FALSE, 1, 1);


# 管理员
CREATE TABLE tb_admin (
  username VARCHAR(20) PRIMARY KEY,
  password VARCHAR(20) NOT NULL,
  level    INT(2)
);

INSERT INTO tb_admin VALUES
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

# 后台菜单
CREATE TABLE tb_menu (
  id    INT(2) PRIMARY KEY,
  title CHAR(8) NOT NULL,
  fid   INT(2)  NOT NULL,
  url   VARCHAR(128)
);
INSERT INTO tb_menu VALUES
  (1, '玩家管理', 0, 'index.php?ctrl=Index&act=player'),
  (2, '游戏设定', 0, 'index.php?ctrl=Index&act=setting'),
  (3, '游戏过程', 0, 'index.php?ctrl=Index&act=procedure'),
  (4, '运营统计', 0, 'index.php?ctrl=Index&act=statistic'),
  (16, '玩家管理', 1, 'www4'),
  (5, '公告管理', 2, 'index.php?ctrl=Index&act=setting'),
  (6, 'VIP 规则', 2, 'index.php?ctrl=Index&act=setting_vip'),
  (7, '赛事管理', 2, 'index.php?ctrl=Index&act=setting_stage'),
  (8, '交易物品管理', 2, 'index.php?ctrl=Index&act=setting_item'),
  (13, '充值记录', 3, 'index.php?ctrl=Index&act=procedure_charge'),
  (14, '游戏记录', 3, 'index.php?ctrl=Index&act=procedure_game'),
  (15, '购买记录', 3, 'index.php?ctrl=Index&act=procedure_sell'),
  (9, '营收分析', 4, 'www9'),
  (10, '玩家分析', 4, 'www10'),
  (11, '交易分析', 4, 'www11'),
  (12, '游戏分析', 4, 'www12');


# 商品
CREATE TABLE tb_equip (
  id         INT(4) PRIMARY KEY AUTO_INCREMENT,
  name       VARCHAR(8),
  img_1      VARCHAR(64),
  img_2      VARCHAR(64),
  func_value INT(4) NOT NULL,
  type       VARCHAR(8),
  vip VARCHAR(8),
  deleted BOOLEAN
);
INSERT INTO tb_equip (id, name, img_1, img_2, func_value, type, vip, deleted) VALUES
  (1, '车手1', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (2, '车手2', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (3, '车手3', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (4, '车手4', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (5, '车手5', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (6, '车手6', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (7, '车手7', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (8, '车手8', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (9, '车手9', '', '../game/app/static/img/biker/c1.png', 100, 'biker', 'vip1', 0),
  (10, '车身1', '', '../game/app/static/img/moto/m1.png', 100, 'moto', 'vip1', 0),
  (11, '车身2', '', '', 100, 'moto', 'vip1', 0),
  (12, '车身3', '', '', 100, 'moto', 'vip1', 0),
  (13, '车身4', '', '', 100, 'moto', 'vip1', 0),
  (14, '车身5', '', '', 100, 'moto', 'vip1', 0),
  (15, '引擎1', '', '', 100, 'engine', 'vip1', 0),
  (16, '引擎2', '', '', 100, 'engine', 'vip1', 0),
  (17, '引擎3', '', '', 100, 'engine', 'vip1', 0),
  (18, '引擎4', '', '', 100, 'engine', 'vip1', 0),
  (19, '车轮1', '', '', 100, 'wheel', 'vip1', 0),
  (20, '车轮2', '', '', 100, 'wheel', 'vip1', 0),
  (21, '车轮3', '', '', 100, 'wheel', 'vip1', 0);



# 用户购买记录
CREATE TABLE tb_user_buy (
  username VARCHAR(20),
  item_id  INT(4),
  type     CHAR(8),
  buy_time DATETIME,
  vip      VARCHAR(8),
  PRIMARY KEY (username, item_id),
  FOREIGN KEY (username) REFERENCES tb_player (username),
  FOREIGN KEY (item_id) REFERENCES tb_equip (id)
);
INSERT INTO tb_user_buy (username, item_id, type, buy_time, vip) VALUES
  ('asdasd', 1, 'biker', now(), 'vip1'),
  ('asdasd', 2, 'biker', now(), 'vip1'),
  ('asdasd', 3, 'biker', now(), 'vip1'),
  ('asdasd', 4, 'biker', now(), 'vip1'),
  ('asdasd', 5, 'biker', now(), 'vip1'),
  ('asdasd', 6, 'biker', now(), 'vip1'),
  ('asdasd', 7, 'biker', now(), 'vip1'),
  ('asdasd', 8, 'biker', now(), 'vip1');


# 用户充值记录
CREATE TABLE tb_user_charge (
  id           INT(128) AUTO_INCREMENT PRIMARY KEY,
  username     VARCHAR(32),
  charge_money INT(8),
  charge_time  DATETIME,
  vip          VARCHAR(8),
  FOREIGN KEY (username) REFERENCES tb_player (username)
);
INSERT INTO tb_user_charge (username, charge_money, charge_time, vip) VALUES
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


# 用户经验记录
CREATE TABLE tb_user_exp (
  id        INT(128) AUTO_INCREMENT PRIMARY KEY,
  username  VARCHAR(32),
  game_time DATETIME,
  stage     INT(4),
  map       INT(4),
  coins     INT(8),
  exp       INT(8),
  FOREIGN KEY (username) REFERENCES tb_player (username)
);
INSERT INTO tb_user_exp (username, game_time, stage, map, coins, exp) VALUES
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
CREATE TABLE tb_notice (
  id           INT(128) AUTO_INCREMENT PRIMARY KEY,
  title        VARCHAR(32),
  content      VARCHAR(256),
  publish_time DATETIME,
  active_time  DATETIME,
  deleted      BOOLEAN
);
INSERT INTO tb_notice (title, content, publish_time, active_time, deleted) VALUES
  ('通知', '天干物燥 小心火烛', now(), now(), 0),
  ('通知', '天干物燥 小心火烛1', now(), now(), 0),
  ('通知', '天干物燥 小心火烛2', now(), now(), 0),
  ('通知', '天干物燥 小心火烛3', now(), now(), 0),
  ('通知', '天干物燥 小心火烛4', now(), now(), 0),
  ('通知', '天干物燥 小心火烛4', now(), now(), 0);


# 赛事
CREATE TABLE tb_stage (
  id      INT(3) PRIMARY KEY AUTO_INCREMENT,
  name    VARCHAR(8),
  img_1   VARCHAR(64),
  img_2   VARCHAR(64),
  deleted BOOLEAN
);
INSERT INTO tb_stage (id, name, img_1, img_2, deleted) VALUES
  (1, '赛事1', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (2, '赛事2', '../game/app/static/img/stage/WorldThumbnails2.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (3, '赛事3', '../game/app/static/img/stage/WorldThumbnails3.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (4, '赛事4', '../game/app/static/img/stage/WorldThumbnails4.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (5, '赛事5', '../game/app/static/img/stage/WorldThumbnails5.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (6, '赛事6', '../game/app/static/img/stage/WorldThumbnails6.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0),
  (7, '赛事7', '../game/app/static/img/stage/WorldThumbnails7.png', '../game/app/static/img/stage/WorldThumbnails1.png',
   0);


# 赛道
CREATE TABLE tb_map (
  stage_id INT(8),
  map_id   INT(8),
  name     VARCHAR(8),
  img_1    VARCHAR(64),
  img_2    VARCHAR(64),
  deleted  BOOLEAN,
  exp int(8),
  coins int(8),
  PRIMARY KEY (stage_id, map_id),
  FOREIGN KEY (stage_id) REFERENCES tb_stage (id)
);
INSERT INTO tb_map (stage_id, map_id, name, img_1, img_2, deleted, exp, coins) VALUES
  (1, 1, '赛段1', '../game/app/static/img/stage/WorldThumbnails1.png',
   '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (1, 2, '赛段2', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (1, 3, '赛段3', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (2, 1, '赛段4', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (2, 2, '赛段5', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (3, 1, '赛段6', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (3, 2, '赛段7', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (4, 2, '赛段8', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (5, 2, '赛段9', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (6, 2, '赛段10', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100),
  (7, 2, '赛段11', '../game/app/static/img/stage/WorldThumbnails1.png', '../game/app/static/img/stage/WorldThumbnails1.png', 0, 100, 100);


# 用户使用记录
# create table tb_user_use(
# 	username varchar(20),
# 	item_id int(4),
# 	primary key(username, item_id),
# 	foreign key(username) references tb_player(username),
# 	foreign key(item_id) references tb_equip(id)
# );



# 公告