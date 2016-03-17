create database Liunian_ManageDB

create table Think_Employee
(
  ID int not null auto_increment,
  UpdateTime datetime null,
  CreateTime datetime not null,
  State int not null default 0,
  LoginName varchar(64) null,
  UserName varchar(64) null,
  Password varchar(64) null,
  LoginTimes int not null default 0,
  LatestLoginTime datetime null,
  CurrLoginTime datetime null,
  LatestLoginIP varchar(64)  null,
  CurrLoginIP varchar(64)  null,
  RoleId int not null default 0,
  IsUse tinyint not null default 1,
  primary key(ID)
)engine=innodb default charset=utf8 auto_increment=1;