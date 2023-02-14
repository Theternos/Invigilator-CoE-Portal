import mysql.connector
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

while True:
    mycursor.execute("SELECT * FROM `form` WHERE proposal LIKE '%CoE%' or proposal LIKE '%exam%'")
    venue = mycursor.fetchall()
    for x in venue:
        if(x[17] == 0 and x[16] == 'approved'):
            proposal = x[7]
            f_time = x[10]
            t_time = x[11]
            f_date = x[8]
            t_date = x[9]
            status = x[16]
            allocated_room_name = x[5]
            capacity = x[4]
            a = "INSERT into `form` (proposal, f_time, t_time, f_date, t_date, status, allocated_room_name, capacity) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s')" % (proposal, f_time, t_time, f_date, t_date, status, allocated_room_name, capacity)
            online_cursor.execute(a)
            online_db.commit()
            print(online_cursor.rowcount, "record(s) affected")
            state = x[0]
            b = "update `form` SET state = '1' where id = '%s'" % state
            #print(b)
            mycursor.execute(b)
            mydb.commit()
            print(mycursor.rowcount, "record(s) affected")
            time.sleep(600)