create table major 

(

   majorname                  char(99)                      not null,

   majorid                 integer                        not null,

   constraint PK_major primary key (majorid)

);



create table assistant 

(

   id                   integer                        not null,

   teacherid                 integer                        null,

   name                   char(99)                      not null,

   majorid                 integer                        null,

   gender                   char(99)                      null,

   grade                   integer                        null,

   assistantid                 integer                        null,

   constraint PK_assistant primary key clustered (id)

);



create table student 

(

   name                   char(99)                      not null,

   id                   integer                        not null,

   majorid                 integer                        null,

   gender                   char(99)                      null,

   grade                   integer                        null,

   constraint PK_student primary key (id)

);





create table kaishe 

(

   majorid                 integer                        not null,

   courseid                 integer                        not null,

   constraint PK_kaishe primary key clustered (majorid, courseid)

);





create table teacher 

(

   name                   char(99)                      not null,

   gender                   char(99)                      null,

   post                  char(99)                      null,

   teacherid                 integer                        not null,

   constraint PK_teacher primary key (teacherid)

);





create table course 

(

   coursename                  char(99)                      not null,

   courseid                 integer                        not null,

   teacherid                 integer                        null,

   keshi                   integer                        null,

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




alter table student

   add constraint FK1 foreign key (majorid)

      references major (majorid)

      on update restrict

      on delete restrict;



alter table kaishe

   add constraint FK2 foreign key (majorid)

      references major (majorid)

      on update restrict

      on delete restrict;



alter table kaishe

   add constraint FK3 foreign key (courseid)

      references course (courseid)

      on update restrict

      on delete restrict;



alter table course

   add constraint FK4 foreign key (teacherid)

      references teacher (teacherid)

      on update restrict

      on delete restrict;



alter table choose

   add constraint FK5 foreign key (id)

      references student (id)

      on update restrict

      on delete restrict;



alter table choose

   add constraint FK6 foreign key (courseid)

      references course (courseid)

      on update restrict

      on delete restrict;

delimiter //

	create trigger genderchecktrigger

	after insert on teacher

	for each row

	begin
	
	set teacher.gender ='unknown'
	
	where new.gender=teacher.gender and new.gender !='male' and new.gender!='female';
	 
	end//
delimiter //

create trigger stutrigger1

before update on student

 for each row

 begin
 if new.id!= old.id then

 update choose

 set id=new.id

 where choose.id=old.id;
 
 end if;
 
 end//
 
delimiter //

create trigger stutrigger2

after delete on student

for	 each  row

begin

delete from choose where choose.id=old.id;

end//

delimiter //

create trigger coursetrigger

 before update on course
 
 for each row

 begin

if new.courseid!=old.courseid then

 update kaishe

 set courseid=new.courseid

where	kaishe.courseid=old.courseid;

end if;

 end//

delimiter //

create procedure updategrade(

		IN studentid char(20),
		
    	IN newcourseid	char(20),
		
		IN newgrade  char(4)
	)
	begin
	
	update choose

	set coursegrade=newgrade
	
	where id=studentid and courseid=newcourseid;
	
	end//
	
	create view unpass as

		select *

    		from choose 

    		where choose.coursegrade<60;
	

	


