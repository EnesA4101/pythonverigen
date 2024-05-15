Gerekli Modüller:
pip install flask
pip install openpyxl
pip install pandas
pip install flask
pip install mysql-connector-python

Ayarlar İçin:

Veritabanı Ayarları İçin:
db.py =>

mydb = mysql.connector.connect(
  host="localhost",
  user="root",
  password="",
  database="ai_api"
)
index.php içinde=>
var serverlink = "http://ip:port";
var sunuculink = "http://localhost/dosyakonumu/"
var dosyaisim ="datas";

!dosyaisim değiştirmek için ayrıca gen.py içinde konum değişmeli =>

hasta_verileri.to_excel('datas/'+dosyaisim+'.xlsx', index=False)
hasta_verileri.to_csv('datas/'+dosyaisim+'.csv', index=False)

Çalıştırmak İçin:

1) database içe aktarma
2) server.py çalıştırma
3) php server + mysql server başlatma
