create table 专业 
(
   专业名                  char(256)                      not null,
   专业代码                 integer                        not null,
   constraint PK_专业 primary key (专业代码)
);

create table 助教 
(
   学号                   integer                        not null,
   教师编号                 integer                        null,
   姓名                   char(256)                      not null,
   专业代码                 integer                        null,
   性别                   char(256)                      null,
   年级                   integer                        null,
   助教编号                 integer                        null,
   constraint PK_助教 primary key clustered (学号)
);

create table 学生 
(
   姓名                   char(256)                      not null,
   学号                   integer                        not null,
   专业代码                 integer                        null,
   性别                   char(256)                      null,
   年级                   integer                        null,
   constraint PK_学生 primary key (学号)
);


create table 开设 
(
   专业代码                 integer                        not null,
   课程代码                 integer                        not null,
   constraint PK_开设 primary key clustered (专业代码, 课程代码)
);


create table 教师 
(
   姓名                   char(256)                      not null,
   性别                   char(256)                      null,
   职称                   char(256)                      null,
   教师编号                 integer                        not null,
   constraint PK_教师 primary key (教师编号)
);


create table 课程 
(
   课程名                  char(256)                      not null,
   课程代码                 integer                        not null,
   教师编号                 integer                        null,
   课时                   integer                        null,
   学分                   integer                        null,
   constraint PK_课程 primary key (课程代码)
);


create table 选课 
(
   学号                   integer                        not null,
   课程代码                 integer                        not null,
   课程成绩                 integer                        null,
   constraint PK_选课 primary key clustered (学号, 课程代码)
);
create trigger stutrigger
 on 学生
 for update
 AS
 if update(学号)
 begin
 update 选课
 set 学号=i.学号
 from 选课 br,deleted d,inserted i
 where br.学号=d.学号
 end
GO
create trigger coursetrigger
 on 课程
 for update
 AS
 if update(课程代码)
 begin
 update 开设
 set 课程代码=i.课程代码
 from 开设 br,deleted d,inserted i
 where br.课程代码=d.课程代码
 end
GO