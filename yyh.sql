create table major 
(
   majorname                  char(256)                      not null,
   majorid                 integer                        not null,
   constraint PK_major primary key (majorid)
);

create table assistant 
(
   id                   integer                        not null,
   teacherid                 integer                        null,
   name                   char(256)                      not null,
   majorid                 integer                        null,
   gender                   char(256)                      null,
   grade                   integer                        null,
   assistantid                 integer                        null,
   constraint PK_assistant primary key clustered (id)
);

create table student 
(
   name                   char(256)                      not null,
   id                   integer                        not null,
   majorid                 integer                        null,
   gender                   char(256)                      null,
   grade                   integer                        null,
   constraint PK_student primary key (id)
);


create table open 
(
   majorid                 integer                        not null,
   courseid                 integer                        not null,
   constraint PK_open primary key clustered (majorid, courseid)
);


create table teacher 
(
   name                   char(256)                      not null,
   gender                   char(256)                      null,
   post                  char(256)                      null,
   teacherid                 integer                        not null,
   constraint PK_teacher primary key (teacherid)
);


create table course 
(
   coursename                  char(256)                      not null,
   courseid                 integer                        not null,
   teacherid                 integer                        null,
   hour                   integer                        null,
   credit                   integer                        null,
   constraint PK_course primary key (courseid)
);


create table choose 
(
   id                   integer                        not null,
   courseid                 integer                        not null,
   coursegrade                 integer                        null,
   constraint PK_choose primary key clustered (id, courseid)
);
alter table assistant
   add constraint FK1 foreign key (id)
      references student (id)
      on update restrict
      on delete restrict;

alter table assistant
   add constraint FK2 foreign key ()
      references teacher (id)
      on update restrict
      on delete restrict;

alter table student
   add constraint FK3 foreign key (majorid)
      references major (majorid)
      on update restrict
      on delete restrict;

alter table open
   add constraint FK4 foreign key (majorid)
      references major (majorid)
      on update restrict
      on delete restrict;

alter table open
   add constraint FK5 foreign key (courseid)
      references course (courseid)
      on update restrict
      on delete restrict;

alter table course
   add constraint FK6 foreign key (teacherid)
      references teacher (teacherid)
      on update restrict
      on delete restrict;

alter table choose
   add constraint FK7 foreign key (id)
      references student (id)
      on update restrict
      on delete restrict;

alter table choose
   add constraint FK8 foreign key (courseid)
      references course (courseid)
      on update restrict
      on delete restrict;
delimiter //
create trigger stutrigger
 after update on student(id)
 for each row
 begin
 update choose
 set id=i.id
 from choose br,deleted d,inserted i
 where br.id=d.id;
 end//
delimiter //
create trigger coursetrigger
 after update on course(courseid)
 begin
 update open
 set courseid=i.courseid
 from open br,deleted d,inserted i
 where br.courseid=d.courseid;
 end//
