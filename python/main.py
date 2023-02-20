import mysql.connector
from datetime import *
import smtplib
import random
import time

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="invigilation"
)
mycursor = mydb.cursor()

online_db = mysql.connector.connect(
  host="sql12.freesqldatabase.com",
  user="sql12598321",
  password="saYvXENJg8",
  database="sql12598321"
)
online_cursor = online_db.cursor()

#while True:
today = date.today()
mycursor.execute("SELECT * FROM invigilation.staff where status != 'ENDED'")
exam = mycursor.fetchall()
class_list = []
qwerty ="SELECT * FROM invigilation.venue where f_date <= '%s' and t_date >= '%s'" % (today, today)
print(qwerty)
mycursor.execute(qwerty) 
venue_all = mycursor.fetchall()
for v in venue_all:
    v_venue = v[8]
    if(v_venue == '1'):
        class_name = v[6]
        class_list.append(class_name)
    elif(v_venue == '2'):
        class_name = v[6]
        class_list.append(class_name)
        class_list.append(class_name)
    elif(v_venue == '3'):
        class_name = v[6]
        class_list.append(class_name)
        class_list.append(class_name)
        class_list.append(class_name)
    
print(class_list)

for x in exam:
    email = x[5]
    mycursor.execute("SELECT * FROM invigilation.biometric LIMIT 50;")
    punch = mycursor.fetchall()
    for y in punch:
        if(x[5] == y[2]):
            email = str(x[5])
            mail_date = x[8]
            date_time = mail_date + timedelta(days=1)
            date_time = today
            if(y[4] <= x[7] and y[6] == date_time):
                a = "update `staff` SET status = 'ONGOING' WHERE email = '%s' and mail_date = '%s'" % (email, date_time)
                print(a)
                mycursor.execute(a)
                mydb.commit()
                print(mycursor.rowcount, "record(s) affected")
            if(y[5] >= x[9] and y[6] == date_time):
                a = "update `staff` SET status = 'ENDED' WHERE email = '%s' and mail_date = '%s'" % (email, date_time)
                print(a)
                mycursor.execute(a)
                mydb.commit()
                print(mycursor.rowcount, "record(s) affected")
        
            
    if(x[8] == today and x[11] == 'NOT MAILED'):
        a = "update `staff` SET mail_status = 'MAILED - REMAINDER' WHERE email = '%s' and mail_date = '%s'" % (email, today)
        print(a)
        mycursor.execute(a)
        mydb.commit()
        print(mycursor.rowcount, "record(s) affected")
        email = 'anusuya.cs21@bitsathy.ac.in'
        date_time = x[3]
        timee = x[7]
        server = smtplib.SMTP('smtp.gmail.com',587)
        server.starttls()
        server.login('coebitshack@gmail.com','pulpdyzaqfbtofqb')
        message = f'''\
Subject: Gentle remainder for Invigilation Duty!

Respected Staff,
    
        A gentle remainder your are been alloted with invigilation duty on {date_time}. Collect the requirements before {timee}. 



Thanks & Regards,
Controller of Examination,
Bannari Amman Institute of Technology
Sathyamangalam-638 401
Erode District, Tamilnadu
Ph: 04295-226122, 226123
        '''.format(date_time, timee)
        server.sendmail('coebitshack@gmail.com',email,message)
        print('Mailed')
        
    temp1 = x[8]    #mail_date
    exam_date = temp1 + timedelta(days=1)    #exam_date
    exam_date = today
    if(exam_date == today and x[11] == 'MAILED - REMAINDER'):
        staff_email = x[5]
        print('1')
        temp = x[7]
        timee = (temp - timedelta(minutes=15))
        print(timee)
        print(type(timee))
        from datetime import *
        
        current_time = datetime.now()
        t = current_time.strftime("%H:%M:%S")
        t = "09:03:00"
        
        import datetime
        time_delta = datetime.datetime.strptime(t, "%H:%M:%S") - datetime.datetime(1900, 1, 1)
        print(type(time_delta))
        print(time_delta)
        if (timee <= time_delta):
            print('2')
            room = random.choice(class_list)
            print(room)
            for v in venue_all:
                f_time = v[4]
                t_time = v[5]
                print(f_time,t_time, date)
                if(exam_date >= f_time):
                    if(exam_date <= t_time): 
                        print('3')
                        datee_time = x[3]  #date_time
                        a = "update `staff` SET venue = '%s' WHERE email = '%s' and date_time = '%s'" % (room,staff_email,datee_time)
                        print(a)
                        mycursor.execute(a)
                        mydb.commit()
                        
                        
                        
                        
                        print(mycursor.rowcount, "record(s) affected")   
                        print(room)
                        class_list.remove(room)
                        break;
                    
                    
online_cursor.execute("SELECT * FROM `form`")
importing = online_cursor.fetchall()
for imp in importing:
    if(imp[0] != ''):
        idd = imp[0]
        proposal = imp[1]
        f_time = imp[2]
        t_time = imp[3]
        f_date = imp[4]
        t_date = imp[5]
        allocated_room_name = imp[7]
        capacity = imp[8]
        if(capacity >= 60):
            a = "INSERT into `invigilation`.`venue` (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity, staff) VALUES ('%s','%s','%s','%s','%s','%s','%s','1')" % (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity)
        else:
            a = "INSERT into `invigilation`.`venue` (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity, staff) VALUES ('%s','%s','%s','%s','%s','%s','%s','2')" % (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity)
        print(a)
        mycursor.execute(a)
        mydb.commit()
        print(mycursor.rowcount, "record(s) affected")
        b = "DELETE from `form` where id = '%s'" % (idd)
        online_cursor.execute(b)
        online_db.commit()
        print(mycursor.rowcount, "record(s) affected")
        
#For Manually Scheduled Mail   
mycursor.execute("SELECT * FROM schedule_mail")
schedule_mail = mycursor.fetchall()
mycursor.execute("SELECT * FROM staff WHERE `status` = 'UPCOMING'")
staff_table = mycursor.fetchall()
for staff_date in staff_table:
    for date in schedule_mail:
        if(date[3] == staff_date[3]):
            now = datetime.now()
            if(date[2] > now):
                email = 'anusuya.cs21@bitsathy.ac.in'
                date_time = staff_date[3]
                timee = staff_date[7]
                server = smtplib.SMTP('smtp.gmail.com',587)
                server.starttls()
                server.login('coebitshack@gmail.com','pulpdyzaqfbtofqb')
                message = f'''\
Subject: Gentle remainder for Invigilation Duty!

Respected Staff,
    
        A gentle remainder your are been alloted with invigilation duty on {date_time}. Collect the requirements before {timee}. 



Thanks & Regards,
Controller of Examination,
Bannari Amman Institute of Technology
Sathyamangalam-638 401
Erode District, Tamilnadu
Ph: 04295-226122, 226123
        '''.format(date_time, timee)
                server.sendmail('coebitshack@gmail.com',email,message)
                print('Mailed')
                a = "DELETE FROM schedule_mail WHERE date_time = '%s'" % date_time
                mycursor.execute(a)
                
time.sleep(60)