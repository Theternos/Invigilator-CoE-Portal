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
  host="sql6.freesqldatabase.com",
  user="sql6580075",
  password="dY8hdI24sj",
  database="sql6580075"
)
online_cursor = online_db.cursor()

#while True:
today = date.today()
mycursor.execute("SELECT * FROM invigilation.staff where status != 'ENDED'")
exam = mycursor.fetchall()
list = []
mycursor.execute("SELECT * FROM invigilation.venue where t_date <= '%s'" % today) 
venue_all = mycursor.fetchall()
for v in venue_all:
    v_venue = v[8]
    if(v_venue == 1):
        class_name = v[2]
        list.append(class_name)
    elif(v_venue == 2):
        class_name = v[2]
        list.append(class_name)
        list.append(class_name)
    elif(v_venue == 3):
        class_name = v[2]
        list.append(class_name)
        list.append(class_name)
        list.append(class_name)
print(list)
for x in exam:
    email = x[5]
    mycursor.execute("SELECT * FROM invigilation.biometric LIMIT 50;")
    punch = mycursor.fetchall()
    for y in punch:
        if(x[5] == y[2]):
            email = str(x[5])
            mail_date = x[8]
            date_time = mail_date + timedelta(days=1)
            if(y[4] <= x[7] and y[6] == date_time):
                a = "update `staff` SET status = 'ONGOING' WHERE email = '%s'" % email
                #print(a)
                mycursor.execute(a)
                mydb.commit()
                #print(mycursor.rowcount, "record(s) affected")
            if(y[5] >= x[9] and y[6] == date_time):
                a = "update `staff` SET status = 'ENDED' WHERE email = '%s'" % email
                #print(a)
                mycursor.execute(a)
                mydb.commit()
                #print(mycursor.rowcount, "record(s) affected")
                
    if(x[8] == today and x[10] == 'NOT MAILED'):
        a = "update `staff` SET mail_status = 'MAILED - REMAINDER' WHERE email = '%s'" % email
        #print(a)
        mycursor.execute(a)
        mydb.commit()
        #print(mycursor.rowcount, "record(s) affected")
        email = 'allwin.cs21@bitsathy.ac.in'
        date_time = x[3]
        timee = x[7]
        server = smtplib.SMTP('smtp.gmail.com',587)
        server.starttls()
        server.login('anusuya.cs21@bitsathy.ac.in','AnusuyaPrakash')
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
        server.sendmail('anusuya.cs21@bitsathy.ac.in',email,message)
        #print('Mailed')
    # Allocating the venues to the invigilators
    temp1 = x[8]
    date = temp1 + timedelta(days=1)
    date = today
    if(date == today and x[10] == 'MAILED - REMAINDER'):
        staff_email = x[5]
        print('1')
        temp = x[7]
        timee = temp - timedelta(minutes=15)
        #print(time)
        current_time = datetime.now()
        t = current_time.strftime("%H:%M:%S")
        t = "8:33:00"
        #print(t)
        if (str(timee) <= t):
            print('2')
            room = random.choice(list)
            for v in venue_all:
                if(date >= v[4] and date <= v[5]):
                    print('3')
                    datee_time = x[3]
                    if(room == v[2]):
                        a = "update `staff` SET venue = '%s' WHERE email = '%s' and date_time = '%s'" % (room,staff_email,datee_time)
                        #print(a)
                        mycursor.execute(a)
                        mydb.commit()
                        print(mycursor.rowcount, "record(s) affected")   
                        print(room)
                        list.remove(room)
                        break
    # mailing the venue to the respective staff

#Classroom allotment need to done4
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
        if(capacity > 60):
            a = "INSERT into `invigilation`.`venue` (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity, staff) VALUES ('%s','%s','%s','%s','%s','%s','%s','1')" % (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity)
        else:
            a = "INSERT into `invigilation`.`venue` (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity, staff) VALUES ('%s','%s','%s','%s','%s','%s','%s','2')" % (proposal, f_time, t_time, f_date, t_date, allocated_room_name, capacity)
        #print(a)
        mycursor.execute(a)
        mydb.commit()
        print(mycursor.rowcount, "record(s) affected")
        b = "DELETE from `form` where id = '%s'" % (idd)
        online_cursor.execute(b)
        online_db.commit()
        print(mycursor.rowcount, "record(s) affected")
        
mycursor.execute("SELECT * FROM invigilation.staff where status = 'UPCOMING'")
mailing = mycursor.fetchall()
for var in mailing:
    temp1 = var[8]
    date = temp1 + timedelta(days=1)
    date = today
    room = var[11] 
    #print('x: ',var[11])    
    #print('room: ',room) 
    if(date == today and var[10] == 'MAILED - REMAINDER'):  
        staff_email = var[5]
        staf_email = 'kavinkumar.cs21@bitsathy.ac.in'
        bio_time = var[7]
        server = smtplib.SMTP('smtp.gmail.com',587)
        server.starttls()
        server.login('anusuya.cs21@bitsathy.ac.in','AnusuyaPrakash')
        message = f'''\
Subject: Venue for your Invigilation Duty - Reg

Respected Staff,
       
        You are been alloted to venue of {room}. Collect the requirements before {bio_time}. 



Thanks & Regards,
Controller of Examination,
Bannari Amman Institute of Technology
Sathyamangalam-638 401
Erode District, Tamilnadu
Ph: 04295-226122, 226123
        '''.format(room, bio_time)
        #print(message)
        server.sendmail('anusuya.cs21@bitsathy.ac.in',staf_email,message)
        #print('Mailed')
        a = "update `staff` SET mail_status = 'MAILED' WHERE email = '%s'" % staff_email
        #print(a)
        mycursor.execute(a)
        mydb.commit()
        #print(mycursor.rowcount, "record(s) affected")
