import db
import gen

def get(key,token):
   
   datas = db.get_api_data(key)
   if datas:
    balance = datas[2]
    if int(balance) >= int(token):
      if db.balance(key,token):
          link = gen.veri(int(token))
          return db.save(key,token,link)
      else:
        return 0
    else:
      return 0
   else:
    return 0
