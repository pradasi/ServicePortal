import numpy as np
import pandas as pd
import matplotlib.pyplot as plt
from matplotlib import rcParams
from matplotlib.cm import rainbow
import warnings
warnings.filterwarnings('ignore')
import pickle
from sklearn.preprocessing import StandardScaler
import sys

#header_list = ['age', 'sex', 'cp','trestbps','chol','fbs','restecg','thalach','exang','oldpeak','slope','ca','thal']

data = pd.read_csv('heart.csv')

#values = sys.argv[1];

import csv
with open('text.csv', 'a',newline='') as csvfile:
    writer = csv.writer(csvfile)
    for i in range(1,300):
      writer.writerow(data.iloc[i,:-1])
    csvfile.close()

inp = pd.read_csv('text.csv')
inp = pd.get_dummies(inp, columns = ['sex', 'cp', 'fbs', 'restecg', 'exang', 'slope', 'ca', 'thal'])

standardScaler = StandardScaler()
columns_to_scale = ['age', 'trestbps', 'chol', 'thalach', 'oldpeak']
inp[columns_to_scale] = standardScaler.fit_transform(inp[columns_to_scale])

put = inp.iloc[:,:]
infile = open('model.pkl','rb')
new_dict = pickle.load(infile)
y = new_dict.predict(put)
print(y[0])
infile.close()



