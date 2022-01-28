# Names: Samuel Munoz
# Names: Erik Cohen

# Create Database
create database ProjectCollection;
use ProjectCollection;

# Creeate Tables
# TABLES
# Administrators: Stores username and password for every admin
# Project: Stores all single-valued fields about a developer
# Developer: Stores all data for every developer that has been a part of the projects stored above
# ProjectDeveloper: Table to link a developer to a project
# ProjectFrontEnd: Table to link a project to a front-end tool used in given project; front-end tool's name is stored in the database as a string

create table Administrators (
	admin_id int auto_increment,
    email varchar(128) not null,
    password varchar(128) not null,
    
    primary key(admin_id)
);

create table Projects (
	id int auto_increment,
    name text not null,
    class_year varchar(11) not null,# maybe we can come up with some numeric convention to store these values
    class_name text not null, # not sure if this is the best data type to use here
    db varchar(128) not null,
    demo text, # not the best naming convention
    imagepath text,
    
    primary key(id)
);

create table Developers (
	id int auto_increment,
    fname varchar(128),
    lname varchar(128),
    imagepath text,
    class_year smallint,
    
    primary key(id)
);

# this table could erode performance of database if tables gets large enough
create table ProjectDeveloper (
	prj_id int,
    dev_id int,
    role text,
    
    foreign key(prj_id) references Projects(id) on update cascade,
    foreign key(dev_id) references Developers(id) on update cascade,
    primary key(prj_id, dev_id)
);

# this table could erode performance of database if tables gets large enough
create table ProjectFrontEnd (
	prj_id int,
    frontend varchar(128),
    
    foreign key(prj_id) references Projects(id) on update cascade,
    primary key(prj_id, frontend)
);

# this table could erode performance of database if tables gets large enough
create table ProjectBackEnd (
	prj_id int,
    backend varchar(128),
    
    foreign key(prj_id) references Projects(id) on update cascade,
    primary key(prj_id, backend)
);
