// 데이터베이스 생성
CREATE DATABASE mhf;
use mhf;

// 테이블 생성
// 회원가입
create table member(
    custom_id int primary key auto_increment,
    username varchar(20) not null,
    userid varchar(20) not null,
    userpw varchar(30) not null,
    userbirth date not null,
    tel varchar(13) not null,
    email varchar(30) not null,
    useraddr varchar(100) not null,
    useraddr_detail varchar(30) not null,
    useraddr_num varchar(10) not null
);

// 상품
create table product(
    prd_id int primary key auto_increment,
    prd_name varchar(100) not null,
    prd_price int not null,
    prd_photo varchar(100),
    prd_content varchar(100),
    prd_group varchar(100) not null
);

// 고객지원
create table board_ask(
    num int primary key auto_increment,
    ask_date date not null,
    ask_title varchar(30) not null,
    ask_content text not null,
    custom_id int,
    ask_photo varchar(100),
    FOREIGN KEY(custom_id) REFERENCES member(custom_id)
);
 
// 리뷰
create table board_review(
    id int primary key auto_increment,
    rating varchar(30) not null,
    review_content text not null,
    wdate date not null,
    prd_id int,
    custom_id int,
    FOREIGN KEY(custom_id) REFERENCES member(custom_id),
    FOREIGN KEY(prd_id) REFERENCES product(prd_id)
)

select * from board_review order by id desc limit 10,10;

// 장바구니
create table cart(
    id int primary key auto_increment,
    prd_num int not null,
    prd_id int,
    custom_id int,
    total_price varchar(10000) not null,
    FOREIGN KEY(custom_id) REFERENCES member(custom_id),
    FOREIGN KEY(prd_id) REFERENCES product(prd_id)
);
