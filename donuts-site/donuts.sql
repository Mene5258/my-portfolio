-- DB作成（DB名：donuts）
drop database if exists donuts;
create database donuts default character set utf8 collate utf8_general_ci;

-- DB操作ユーザ作成（ユーザ名：donuts）
drop user if exists 'donuts'@'localhost';
create user 'donuts'@'localhost' identified by 'password';
grant all on donuts.* to 'donuts'@'localhost';
use donuts;

-- テーブル作成（テーブル名：customer）
create table customer (
	id int auto_increment primary key unique not null, 
	name varchar(100) not null, 
	kana varchar(100) not null,
	post_code varchar(100) not null,
	address varchar(200) not null, 
	mail varchar(100) not null unique, 
	password varchar(255) not null
);

-- テーブル作成（テーブル名：product）
create table product (
	id int auto_increment primary key unique not null, 
	name varchar(200) not null, 
	price int not null,
	description varchar(1000) not null,
	ranking int
);

-- テーブル作成（テーブル名：card）
create table card (
	id int primary key unique not null, 
	card_name varchar(100) not null,
	card_type varchar(100) not null,
	card_no varchar(22) unique not null,
	card_month int not null,
	card_year int not null,
	card_security_code int not null,
	foreign key(id) references customer(id)
);


-- テーブル作成（テーブル名：purchase）
create table purchase (
	id int not null primary key, 
	customer_id int not null, 
	foreign key(customer_id) references customer(id)
);

-- テーブル作成（テーブル名：purchase_detail）
create table purchase_detail (
	purchase_id int not null,
	product_id int not null, 
	count int not null, 
	primary key(purchase_id, product_id), 
	foreign key(purchase_id) references purchase(id), 
	foreign key(product_id) references product(id)
);

-- レコード作成（productテーブル）
insert into product values(null, 'CCドーナツ 当店オリジナル（5個入り）', 1500,'当店のオリジナル商品、CCドーナツは、サクサクの食感が特徴のプレーンタイプのドーナツです。素材にこだわり、丁寧に揚げた生地は軽やかでサクッとした食感が楽しめます。一口食べれば、口の中に広がる甘くて香ばしい香りと、口どけの良い食感が感じられます。',1);
insert into product values(null, 'チョコレートデライト（5個入り）', 1600,'この商品は、上品なホワイトストライプが施されたチョコレートドーナツです。しっとりとしたチョコレート生地と甘さ控えめなホワイトストライプの組み合わせが絶妙で、見た目にも美しい一品です。おやつやティータイムにぴったりの贅沢なスイーツです。',4);
insert into product values(null, 'キャラメルクリーム（5個入り）', 1600,'白いアイシングとキャラメルのストライプが施された美しいデザインが特徴です。甘さとほろ苦さが絶妙に調和し、見た目にも楽しませてくれます。おやつやデザートにぴったりの一品です。',7);
insert into product values(null, 'プレーンクラシック（5個入り）', 1500,'オーソドックスなチョコレートの美味しさを味わえる一品です。香ばしいコーヒーとの相性も抜群で、おしゃれなカフェスタイルを演出し、食卓を華やかに彩ります。',8);
insert into product values(null, '【新作】サマーシトラス（5個入り）', 1600,'レモンをトッピングしたドーナツのスタックです。ふんわりとした生地と甘さ控えめのグレーズが特徴で、爽やかなレモンの風味がアクセントとなっています。見た目にも美しく、特別な日のデザートやティータイムにぴったりの一品です。',9);
insert into product values(null, 'ストロベリークラッシュ（5個入り）', 1800,'バレンタインデーにぴったりのドーナツは、カラフルなスプリンクルで飾られた甘美なスイーツです。愛のメッセージを込めたこのドーナツは、特別な日の贈り物やパーティーに最適で、見た目にも楽しませてくれます。しっとりとした生地と甘さ控えめなグレーズが絶妙に組み合わさり、誰もが笑顔になる一品です。',6);
insert into product values(null, 'フルーツドーナツセット（12個入り）', 3500,'新鮮で豊かなフルーツをたっぷりと使用した贅沢な12個入りセットです。このセットには、季節の最高のフルーツを厳選し、ドーナツに取り入れました。口に入れた瞬間にフルーツの風味と生地のハーモニーが広がります。色鮮やかな見た目も魅力の一つです。',2);
insert into product values(null, 'フルーツドーナツセット（14個入り）', 4000,'フルーツで飾られた14種類のミニドーナツの盛り合わせです。色とりどりのフルーツがトッピングされたドーナツは、見た目にも楽しく、パーティーや特別なイベントにぴったりのデザートです。',3);
insert into product values(null, 'ベストセレクションボックス（4個入り）', 1200,'人気商品を集めたこのボックスには、カラフルなスプリンクルと濃厚なチョコレートで飾られた美味しいドーナツが詰まっています。見た目にも楽しく、特別な日のスイーツとして最適です。甘さと食感のバランスが絶妙で、誰もが楽しめる一品です。',5);
insert into product values(null, 'チョコクラッシュボックス（7個入り）', 2400,'カラフルなスプリンクルと香ばしいナッツがトッピングされた美味しいドーナツが7種詰まっています。見た目にも楽しく、特別な日のスイーツとして最適です。どなたでも楽しめる甘さと食感が魅力の一品です。',10);
insert into product values(null, 'クリームボックス（4個入り）', 1400,'4個入のボックスは、色とりどりのフロスティングとスプリンクルで飾られた美味しいドーナツが詰まっています。見た目にも楽しく、特別な日のスイーツとして最適です。新鮮な素材を使用し、ふんわりとした食感が特徴です。',11);
insert into product values(null, 'クリームボックス（9個入り）', 2800,'9個入のボックスは、色とりどりのフロスティングとスプリンクルで飾られた美味しいドーナツが詰まっています。見た目にも楽しく、特別な日のスイーツとして最適です。新鮮な素材を使用し、ふんわりとした食感が特徴です。',12);


-- ユーザアカウントはhtml側で作成するため記述してません

-- ★productテーブルにランキング入れてなかった人はカラム以下の「カラム追加」を行ってからフィールドを追加してください。
-- ほかの方はカラム追加を飛ばしてフィールド追加を行ってください。

-- カラム追加
ALTER TABLE product ADD ranking int;

-- フィールド追加
update product set ranking=1 where id=1;
update product set ranking=2 where id=7;
update product set ranking=3 where id=8;
update product set ranking=4 where id=2;
update product set ranking=5 where id=9;
update product set ranking=6 where id=6;
update product set ranking=7 where id=3;
update product set ranking=8 where id=4;
update product set ranking=9 where id=5;
update product set ranking=10 where id=10;
update product set ranking=11 where id=11;
update product set ranking=12 where id=12;

-- レコード作成（customerテーブル）
insert into customer values(null, '中央太郎','チュウオウタロウ',2770855,'千葉県柏市南柏１丁目１－２ 富士物産南柏駅前ビル4F・5F','cca@gmail.com','Cca12345');