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
sys.path = list(set(sys.path + [os.environ['HOME']+'/lav/aff/src/dyntarget_sky/src/']))
baseDir = os.environ['HOME'] + '/lav/aff/'

import lernia.train_viz as t_v

colorL = ['rgba(54,117,40,0.7)', 'rgba(158,80,219,0.3)', 'rgba(171,221,164,0.7)', 'rgba(171,221,164,0.3)', 'rgba(54,117,40,0.3)', 'rgba(213,62,79,0.3)', 'rgba(253,174,97,0.3)', 'rgba(244,109,67,0.7)', 'rgba(158,1,66,0.3)', 'rgba(253,174,97,0.7)', 'rgba(158,1,66,0.7)', 'rgba(213,62,79,0.7)', 'rgba(79,159,47,0.3)', 'rgba(79,159,47,0.7)', 'rgba(158,80,219,0.7)', 'rgba(230,230,230,0.9)', 'rgba(244,109,67,0.3)']
colorL = t_v.colorL
wordL = pd.read_csv(baseDir + "/anticolo/src/random_words.csv")
wordL = list(wordL.iloc[:,0].values)
nLev0, nLev1, nLev2 = 3, 10, 10

print('heatmap')
def randomEntry(c=None):
    w = np.random.choice(wordL)
    d = {"label_short":w,"label_long":w}
    d['values'] = [np.random.uniform()*100 for x in range(nLev1)]
    return d

def randomTree():
    w = np.random.choice(wordL)
    heatD = {"title":w,"name":w,"depth":2,"label_short":w,"label_long":w}
    heatD['menu'] = [np.random.choice(wordL) for x in range(4)]
    child0 = []
    c = np.random.choice(colorL) + "22"
    for k in range(nLev0):
        level0 = randomEntry(c)
        child1 = []
        n = int(np.random.uniform()*nLev1) + 2
        c = np.random.choice(colorL) + "44"
        for i in range(n):
            level = randomEntry(c)
            child2 = []
            n = int(np.random.uniform()*nLev2) + 2
            c = np.random.choice(colorL) + "77"
            for j in range(n):
                d = randomEntry(c)
                child2.append(d)
            level['children'] = child2
            child1.append(level)
        level0['children'] = child1
        child0.append(level0)
    heatD['children'] = child0
    return heatD


heatD = randomTree()
json.dump(heatD,open(baseDir + "anticolo/data/heatmap_demo.json","w"))

print('audience')
nLev0, nLev1, nLev2 = 7, 3, 4
def randomEntry(c=None):
    w = np.random.choice(wordL)
    w1 = np.random.choice(wordL)
    s = np.random.uniform()*10
    if not c:
        c = np.random.choice(t_v.colorL)
    d = {"name":w,"size":s,"label":"%.2f" % s,"color":c,"role":w1}
    return d

heatD = randomTree()
json.dump(heatD,open(baseDir + "anticolo/data/audience_demo.json","w"))


if False:
    print("------------------------gen-to-join----------------")
    today = datetime.datetime.today()
    dL = [today - datetime.timedelta(days=x) for x in range(30)]
    dL = [x.strftime("%Y-%m-%d") for x in dL]
    agentL = [np.random.choice(wordL) for x in range(20)]
    agnL = pd.DataFrame({"agent":agentL})
    agnL.loc[:,"skill_level"] = [10*np.random.uniform() for x in range(len(agnL))]
    agnL.loc[:,"save_rate"] = [np.random.uniform() for x in range(len(agnL))]
    agnL.loc[:,"compensation"] = [2*np.random.uniform() for x in range(len(agnL))]
    index = pd.MultiIndex.from_product([dL, agentL], names = ["day", "agent"])
    hstL = pd.DataFrame(index = index).reset_index()
    hstL.loc[:,"call_off"] = [int(100*np.random.uniform()) for x in range(len(hstL))]
    hstL.loc[:,"call_on"] = [int(300*np.random.uniform()) for x in range(len(hstL))]
    agnL.to_csv(baseDir + "raw/demo_a
    gent.csv",index=False)
    hstL.to_csv(baseDir + "raw/demo_history.csv",index=False)
