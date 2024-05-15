Gerekli Modüller:
pip install flask <br>
pip install openpyxl <br>
pip install pandas <br>
pip install flask <br>
pip install mysql-connector-python <br>

Ayarlar İçin:<br>

Veritabanı Ayarları İçin:
db.py =><br>

mydb = mysql.connector.connect(<br>
  host="localhost",<br>
  user="root",<br>
  password="",<br>
  database="ai_api"<br>
)<br>
index.php içinde=><br>
var serverlink = "http://ip:port";<br>
var sunuculink = "http://localhost/dosyakonumu/"<br>
var dosyaisim ="datas";<br>

!dosyaisim değiştirmek için ayrıca gen.py içinde konum değişmeli =><br>

hasta_verileri.to_excel('datas/'+dosyaisim+'.xlsx', index=False)<br>
hasta_verileri.to_csv('datas/'+dosyaisim+'.csv', index=False)<br>

Çalıştırmak İçin:<br>
<br>
1) database içe aktarma<br>
2) server.py çalıştırma<br>
3) php server + mysql server başlatma<br>
