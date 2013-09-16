create table customers
(customerid int unsigned not null auto_increment primary key,
namefirst char(50) not null,
namelast char(50) not null,
address char(100) not null,
city char (30) not null,
cstate char (2) not null,
zip char(5) not null,
phone char(10) not null,
email char(30) not null,
customertype char(20)
);

create table equipment
(equipid int unsigned not null auto_increment primary key,
customerid int unsigned,
jobid int unsigned,
equiptype char(20) not null,
model char(20),
serial char(20),
supplier char(20),
equipstatus char (20),
po char (10),
stamp_created timestamp default '0000-00-00 00:00:00'
);

create table jobs
(jobid int unsigned not null auto_increment primary key,
customerid int unsigned not null,
jobname char(30),
jobaddress char (30),
jobcity char (30),
jstate char (2),
jzip char (5),
jobdescription char(200) not null,
jobtype char (20) not null,
jobstatus char(20),
stamp_created timestamp default '0000-00-00 00:00:00', 
stamp_updated timestamp default now() on update now() 
);

create table tasks
(taskid int unsigned not null auto_increment primary key,
jobid int unsigned not null,
taskname char(20),
createdby char(20),
assignedto char(20),
completeby char(10),
task_text char(200),
status enum('open', 'closed'),
stamp_created timestamp default '0000-00-00 00:00:00'
);

create table notes
(noteid int unsigned not null auto_increment primary key,
jobid int unsigned not null,
notename char(20),
notecreator char(20),
note_text tinytext,
stamp_created timestamp default '0000-00-00 00:00:00'
);

create table files
(fileid int unsigned not null auto_increment primary key,
ext char(5),
jobid int unsigned,
custid int unsigned,
ptitle char(30),
pdescrip char(200),
stamp_created timestamp default '0000-00-00 00:00:00'
);

create table service
(serviceid int unsigned not null auto_increment primary key,
customerid int unsigned not null,
snamefirst char(20),
snamelast char(20),
createdby char(20),
assignedto char(20),
sdescription char(200),
saddress char(30),
scity char(20),
sstate char(2),
szip char (12),
sphone char (15),
servicestatus char(20),
stamp_created timestamp default '0000-00-00 00:00:00',
assigneddate DATE,
scheduledfor char (15)
);

