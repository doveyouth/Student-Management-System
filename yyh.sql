create table רҵ 
(
   רҵ��                  char(256)                      not null,
   רҵ����                 integer                        not null,
   constraint PK_רҵ primary key (רҵ����)
);

create table ���� 
(
   ѧ��                   integer                        not null,
   ��ʦ���                 integer                        null,
   ����                   char(256)                      not null,
   רҵ����                 integer                        null,
   �Ա�                   char(256)                      null,
   �꼶                   integer                        null,
   ���̱��                 integer                        null,
   constraint PK_���� primary key clustered (ѧ��)
);

create table ѧ�� 
(
   ����                   char(256)                      not null,
   ѧ��                   integer                        not null,
   רҵ����                 integer                        null,
   �Ա�                   char(256)                      null,
   �꼶                   integer                        null,
   constraint PK_ѧ�� primary key (ѧ��)
);


create table ���� 
(
   רҵ����                 integer                        not null,
   �γ̴���                 integer                        not null,
   constraint PK_���� primary key clustered (רҵ����, �γ̴���)
);


create table ��ʦ 
(
   ����                   char(256)                      not null,
   �Ա�                   char(256)                      null,
   ְ��                   char(256)                      null,
   ��ʦ���                 integer                        not null,
   constraint PK_��ʦ primary key (��ʦ���)
);


create table �γ� 
(
   �γ���                  char(256)                      not null,
   �γ̴���                 integer                        not null,
   ��ʦ���                 integer                        null,
   ��ʱ                   integer                        null,
   ѧ��                   integer                        null,
   constraint PK_�γ� primary key (�γ̴���)
);


create table ѡ�� 
(
   ѧ��                   integer                        not null,
   �γ̴���                 integer                        not null,
   �γ̳ɼ�                 integer                        null,
   constraint PK_ѡ�� primary key clustered (ѧ��, �γ̴���)
);
create trigger stutrigger
 on ѧ��
 for update
 AS
 if update(ѧ��)
 begin
 update ѡ��
 set ѧ��=i.ѧ��
 from ѡ�� br,deleted d,inserted i
 where br.ѧ��=d.ѧ��
 end
GO
create trigger coursetrigger
 on �γ�
 for update
 AS
 if update(�γ̴���)
 begin
 update ����
 set �γ̴���=i.�γ̴���
 from ���� br,deleted d,inserted i
 where br.�γ̴���=d.�γ̴���
 end
GO