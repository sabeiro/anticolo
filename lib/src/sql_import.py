import os, sys, gzip, random, json, datetime, re, io
import pandas as pd
import numpy as np
from scipy import stats as st
import scipy as sp
import joypy
import matplotlib.pyplot as plt
import seaborn as sns

dL = os.listdir(os.environ['HOME']+'/lav/src/')
sys.path = list(set(sys.path + [os.environ['HOME']+'/lav/src/'+x for x in dL]))
baseDir = os.environ['HOME'] + '/lav/aff/'
import albio.series_stat as s_s
import importlib

cred = json.load(open(baseDir + "credenza/anticolo.json"))['db_con']
from sqlalchemy import create_engine
import pymysql

dashD = json.load(open(baseDir + "anticolo/data/cust/dash_sky.json"))
engine = create_engine("mysql+pymysql://{user}:{pw}@{host}/{db}"
                       .format(host=cred['host'],db=cred['db'],user=cred['user'],pw=cred['pass']))

weatL = pd.read_csv(baseDir + "../siti/assessment/weather/raw/weather_h.csv.gz")
vis = np.mean(weatL['visibility'])
weatL.loc[:,"visible"] = (weatL['visibility']>vis+vis*.01) | (weatL['visibility']<vis-vis*.01)
weatL.loc[:,"visible"] = weatL.loc[:,"visible"]*1.
tL = ['precipIntensity','precipProbability','temperature','apparentTemperature','dewPoint','humidity','windSpeed','windGust','windBearing','cloudCover','uvIndex','visibility','precipAccumulation','pressure','ozone']

for t in tL: weatL.loc[:,t] = t_r.normPercentile(weatL[t],perc=[1,99])
weatL[tL].boxplot()
plt.xticks(rotation=15)
plt.show()
weatD = weatL.groupby("day").agg(np.nanmean).reset_index()
weatD.loc[:,"dt"] = weatD['day'].apply(lambda x: datetime.datetime.strptime(x,"%Y-%m-%d"))
weatD.loc[:,"time"] = weatD['time'].apply(lambda x: int(x))
weatD.index = weatD['day']
weatD.drop(columns={"day"},inplace=True)
weatD.loc[:,"month"] = weatD['dt'].apply(lambda x: x.strftime('%Y-%m'))
weatD.loc[:,"week"]  = weatD['dt'].apply(lambda x: str(x.isocalendar()[0]) + "-" + "%02d" % x.isocalendar()[1])
weatW = weatD.groupby("week").agg(np.nanmean)
weatW.loc[:,"time"] = weatW['time'].apply(lambda x: int(x))
weatW.loc[:,'day'] = weatW['time'].apply(lambda x: datetime.datetime.fromtimestamp(x).date().strftime('%Y-%m-%d'))
weatM = weatD.groupby("month").agg(np.nanmean)
weatM.loc[:,"time"] = weatM['time'].apply(lambda x: int(x))
weatM.loc[:,'day'] = weatM['time'].apply(lambda x: datetime.datetime.fromtimestamp(x).date().strftime('%Y-%m-%d'))

from sqlalchemy.types import VARCHAR
frame = weatL.loc[:1000,].to_sql("weather_h",engine,if_exists='replace',index=False);
maxL = weatD.index.get_level_values('day').str.len().max()
frame = weatD.to_sql("weather_d",engine,if_exists='replace',dtype={'day': VARCHAR(maxL)});
frame = weatW.to_sql("weather_w",engine,if_exists='replace',dtype={'week': VARCHAR(maxL)});
frame = weatM.to_sql("weather_m",engine,if_exists='replace',dtype={'month': VARCHAR(maxL)});
