import smtplib
import sys

email = sys.argv[1]
date_time = sys.argv[2]

server = smtplib.SMTP('smtp.gmail.com',587)
server.starttls()
server.login('coebitshack@gmail.com','coesleek')
message = '''
Subject: Invigilation Duty - Regarding

Respected Staff,
You are been alloted for invigilation duty on {date_time}.




Thanks & Regards,
Controller of Examination,
Bannari Amman Institute of Technology
Sathyamangalam-638 401
Erode District, Tamilnadu
Ph: 04295-226122, 226123
'''.format(date_time)
server.sendmail('coebitshack@gmail.com',email,message)