import cv2
import os
import pandas as pd
import csv
from functions import createFolder

createFolder('./AdminDetails')

try:
    if os.path.exists('./AdminDetails/admin_details.csv'):
        print('Details directory already exists')
    else:
        print("Details directory doesn't Exist")
        with open('./AdminDetails/admin_details.csv','w') as file:
            writer=csv.writer(file)
            writer.writerow(["AdminIds","AdminUserNames","AdminPhoneNumbers","AdminEmailIds","AdminPasswords"])
        print("Creating new directory for employee_details.csv.")
except OSError:
    print("File Already Exists")


AdminId=int(input("Enter ID: "))
AdminUserName=input("Enter Name: ")
AdminPhoneNumber=input("Enter Phone Number: ")
if len(AdminPhoneNumber)!=10:
    print("Enter Correct Number!")
AdminEmailId=input("Enter Email Id: ")
AdminPassword=input("Enter Password: ")

df=pd.read_csv('./AdminDetails/admin_details.csv')

if int(AdminId) in df.AdminIds:
    print("\nAdmin already exists!!!")
    print("\nExiting.")
else:
    print("\nCreating New Admin.")
    data=[{'AdminIds':AdminId,'AdminUserNames':AdminUserName,'AdminPhoneNumbers':AdminPhoneNumber,'AdminEmailIds':AdminEmailId,'AdminPasswords':AdminPassword}]
    df=pd.read_csv('./AdminDetails/admin_details.csv')
    df=df.append(data,ignore_index=True,sort=False)
    df.to_csv('./AdminDetails/admin_details.csv', index=False )