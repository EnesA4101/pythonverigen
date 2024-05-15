import random
import pandas as pd
import secrets
import openpyxl

def enfeksiyon_hesapla(toplam):
 if toplam == 1:
    return random.choices([0,1],weights=[0.75,0.25])[0]
 if toplam == 0:
    return random.choices([0,1],weights=[0.95,0.05])[0]
 if toplam == 2:
    return random.randint(0,1)
 if toplam >= 3:
    return 1

def veri(token):
 hasta_verileri = pd.DataFrame(columns=['hasta_num','bogaz_agrisi','burun_akintisi','öksürük','ates','enfeksiyon'])
 for i in range(token):
  hasta_id = i + 1
  bogaz_agrisi = random.randint(0, 1)
  burun_akintisi = random.randint(0, 1)
  öksürük = random.randint(0, 1)
  ates = random.randint(0, 1)

  toplam = bogaz_agrisi+burun_akintisi+öksürük+ates
  enfeksiyon = enfeksiyon_hesapla(toplam) 

  hasta_verileri.loc[i] = [hasta_id, bogaz_agrisi,burun_akintisi,öksürük,ates,enfeksiyon]
 dosyaisim = secrets.token_hex(nbytes=16)
 hasta_verileri.to_excel('datas/'+dosyaisim+'.xlsx', index=False)
 hasta_verileri.to_csv('datas/'+dosyaisim+'.csv', index=False)
 return dosyaisim