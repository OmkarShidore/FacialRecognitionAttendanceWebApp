import os
import numpy as np
import pandas as pd
from sqlalchemy import create_engine
import sqlalchemy
import pymysql

#to create folder
def createFolder(directory):
    try:
        if not os.path.exists(directory):
            os.makedirs(directory)
    except OSError:
        print ('Error: Creating directory. ' +  directory)


#to extract Id,Name from a particular image from data images
def keyValuePairs(path):
    imagePaths=[os.path.join(path,f) for f in os.listdir(path)] 
    Ids=[]
    UserNames=[]
    for imagePath in imagePaths:   
        Id=int(os.path.split(imagePath)[-1].split(".")[1])
        UserName=str(os.path.split(imagePath)[-1].split(".")[2])    
        Ids.append(Id)
        UserNames.append(UserName)
    keyValues = dict(zip(Ids, UserNames))
    return Ids,UserNames,keyValues

def upload_to_database():
    employee_details_path='./EmployeeDetails/employee_details.csv'
    employee_access_details_path='./EmployeeDetails/employee_access_details.csv'
    admin_details_path='./AdminDetails/admin_details.csv'
    employee_attendance='./Attendance/employee_attendance'
    main_attendance='./Attendance/main_attendance'


    #uploading employee details
    employee_details_engine = create_engine("mysql+pymysql://{user}:{pw}@localhost/{db}"
                       .format(user="root",
                               pw="root",
                               db="employee_details"))

    df=pd.read_csv(employee_details_path)
    df.to_sql('employee_details', con = employee_details_engine, if_exists = 'replace', chunksize = 1000)
    #print("Uploaded employee_details")


    #uploading employee access details
    employee_access_details_engine = create_engine("mysql+pymysql://{user}:{pw}@localhost/{db}"
                       .format(user="root",
                               pw="root",
                               db="employee_access_details"))

    df0=pd.read_csv(employee_access_details_path)
    df0.to_sql('employee_access_details', con = employee_access_details_engine, if_exists = 'replace', chunksize = 1000)
    #print("Uploaded employee_access_details")                               


    if os.path.exists(admin_details_path):
        admin_details_engine = create_engine("mysql+pymysql://{user}:{pw}@localhost/{db}"
                       .format(user="root",
                               pw="root",
                               db="admin_details"))
    
        df3=pd.read_csv(admin_details_path)
        df3.to_sql('admin_details', con = admin_details_engine, if_exists = 'replace', chunksize = 1000)
        #print("Uploaded employee_details")




    #uploading employee attendance
    employee_attendance_engine = create_engine("mysql+pymysql://{user}:{pw}@localhost/{db}"
                       .format(user="root",
                               pw="root",
                               db="employee_attendance"))

    for a in os.listdir(employee_attendance):
        b=os.path.join(employee_attendance+'\\'+a)
        df1=pd.read_csv(b)
        b=b.split('\\')[1]
        b=b.split('.')[0]
        #print(b)
        df1.to_sql(name=b.lower(),con=employee_attendance_engine,if_exists ='replace',chunksize=1000)


    #uploading main_attendacne
    main_attendance_engine = create_engine("mysql+pymysql://{user}:{pw}@localhost/{db}"
                       .format(user="root",
                               pw="root",
                               db="main_attendance"))

    year_list=os.listdir(main_attendance)
    #print("Uploaded main_attendance: ")
    for year in os.listdir(main_attendance):
        a=os.path.join(main_attendance+'/'+year)
        for months in os.listdir(a):
            b=os.path.join(main_attendance+'/'+year+'/'+months)
            for csv_ in os.listdir(b):
                csv=os.path.join(main_attendance+'/'+year+'/'+months+'\\'+csv_)
                a=csv
                a=a.split('.')
                a=a[-2].split('\\')
                b=a[1]
                df2=pd.read_csv(csv)
                b=b.split('_')[0]
                df2.to_sql(name=b,con=main_attendance_engine,if_exists='replace',chunksize=1000)
        
    
