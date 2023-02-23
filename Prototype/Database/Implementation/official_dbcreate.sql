create table building(
blk                 varchar(3)      not null,
name                varchar(20)     not null,
 constraint     BUILDING_PK PRIMARY KEY(blk) );


create table room(
blk                 varchar(3)      not null,
floor               int             not null,
room_num            int             not null,
start_date          date            null,
end_date            date            null,
start_time          varchar(50)     null,
end_time            varchar(50)     null,
promo_code          varchar(50)     null,
capacity            int             not null,
price               decimal(5, 2)   not null,
creation_status     char(1)         not null,
launch_status       char(1)         not null,
availability        char(1)         not null, 
image               longtext        null,
 constraint     ROOM_PK     PRIMARY KEY(blk, floor, room_num),
 constraint     ROOM_FK1    FOREIGN KEY(blk)
                REFERENCES building(blk) );


create table role(
role_id             int             not null,
description         varchar(255)    not null,
 constraint     ROLE_PK     PRIMARY KEY(role_id) );



create table user(
username            varchar(50)     not null,
password            varchar(255)    not null,
first_name          varchar(255)    not null,
last_name           varchar(255)    not null,
dob                 date            not null,
email               varchar(255)    not null,
role_id             int             not null,
login_datetime      datetime        null,
logout_datetime     datetime        null,
status              varchar(20)     not null,
    constraint USER_PK      PRIMARY KEY(username),
    constraint USER_FK1     FOREIGN KEY(role_id)
                            REFERENCES role(role_id) );



create table booking(
booking_id          int AUTO_INCREMENT,
username            varchar(50)     not null,
blk                 varchar(3)      not null,
floor               int             not null,
room_num            int             not null,
book_start_date     date            not null,
book_end_date       date            not null,
book_start_time     varchar(255)    not null,
book_end_time       varchar(255)    not null,
 constraint BOOKING_PK      PRIMARY KEY(booking_id),
 constraint BOOKING_FK1     FOREIGN KEY(username)
                            REFERENCES user(username) ON UPDATE CASCADE ON DELETE CASCADE,
 constraint BOOKING_FK2     FOREIGN KEY(blk, floor, room_num)
                            REFERENCES room(blk, floor, room_num) );