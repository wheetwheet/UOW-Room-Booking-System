/*
insert data into building table
*/

insert into building values ('A', 'Blk A');
insert into building values ('B', 'Blk B');
insert into building values ('C', 'Blk C');

/*
insert data into room table
*/
insert into room values ('A', 1, 1, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');
                      
                        
insert into room values ('A', 1, 2, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');


insert into room values ('A', 1, 3, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');


insert into room values ('B', 1, 1, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');
                      
                        
insert into room values ('B', 1, 2, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');


insert into room values ('B', 1, 3, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N', 'NULL');

/*
insert into room values ('', 1, 1, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N');
                      
                        
insert into room values ('A', 1, 2, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N');


insert into room values ('A', 1, 3, NULL, NULL, '09:00', '17:00', null, 8, 8.00, 'N', 'N', 'N');
                   */     
                        
                        
/*
insert data into role table
*/
insert into role values (0, 'student');
insert into role values (1, 'admin');
insert into role values (2, 'user admin');
insert into role values (3, 'system admin');


/*, '0000-00-00 00:00:00', '0000-00-00 00:00:00'
insert data into user table
*/
insert into user (username, password, first_name, last_name, dob, email, role_id, status) 
values ('student', 'student', 'test', 'student', STR_TO_DATE('01-05-2020', '%d-%m-%Y'), 'user1@xyz.com', 0, 'active');
                    
insert into user (username, password, first_name, last_name, dob, email, role_id, status) 
values ('student2', 'student2', 'test', 'student2', STR_TO_DATE('02-05-2020', '%d-%m-%Y'), 'user1@xyz.com', 0, 'inactive');
                        
insert into user (username, password, first_name, last_name, dob, email, role_id, status) 
values ('admin', 'admin', 'test', 'admin', STR_TO_DATE('02-05-2020', '%d-%m-%Y'), 'user2@xyz.com', 1, 'active');
                        
insert into user (username, password, first_name, last_name, dob, email, role_id, status) 
values ('useradmin', 'useradmin', 'test', 'useradmin', STR_TO_DATE('03-05-2020', '%d-%m-%Y'), 'user3@xyz.com', 2, 'active');
                        

/*
insert data into booking table
*/
insert into booking(username, blk, floor, room_num, book_start_date, book_end_date, book_start_time, book_end_time) values
('student', 'A', 1, 1, STR_TO_DATE('22-05-2020', '%d-%m-%Y'), STR_TO_DATE('22-05-2020', '%d-%m-%Y'), '10:00', '11:00');

insert into booking(username, blk, floor, room_num, book_start_date, book_end_date, book_start_time, book_end_time) values
('student', 'A', 1, 2, STR_TO_DATE('23-05-2020', '%d-%m-%Y'), STR_TO_DATE('23-05-2020', '%d-%m-%Y'), '14:00', '15:00');
