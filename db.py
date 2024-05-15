import mysql.connector

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="ai_api"
)


def get_api_data(key):
 mycursor = mydb.cursor()
 mycursor.execute("SELECT * FROM api_keys Where api_key="+key)
 myresult = mycursor.fetchone()
 mydb.commit()
 mycursor.close()
 if myresult:
  return  myresult
 else:
  return 0

def save(key,token,link):
 mycursor = mydb.cursor()
 sql = "INSERT INTO requests (link, api_key,token) VALUES (%s,%s,%s)"
 val = (str(link), str(key),str(token))
 mycursor.execute(sql, val)
 mydb.commit()
 myresult = mycursor.rowcount
 mycursor.close()
 if myresult:
  return link,token
 else:
  return 0

def balance(key,token):
 mycursor = mydb.cursor()
 mycursor.execute("UPDATE api_keys SET api_balance = api_balance-"+str(token)+" WHERE api_key ="+str(key))
 mydb.commit()
 myresult = mycursor.rowcount
 mycursor.close()
 if myresult:
  return 1
 else:
  return 0