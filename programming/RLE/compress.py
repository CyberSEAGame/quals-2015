#!/usr/bin/python
# 
# CAUTION!
# DO NOT DISTRIBUTE THE FILE. THIS IS

key = "f1l1a1g1{1u5s3e4t6g4v10f10o9z15q10m4l10w3y19y5e3f7c4b5n10}1"
# flag{uuuuussseeeettttttggggvvvvvvvvvvffffffffffooooooooozzzzzzzzzzzzzzzqqqqqqqqqqmmmmllllllllllwwwyyyyyyyyyyyyyyyyyyyyyyyyeeefffffffccccbbbbbnnnnnnnnnn}

text=''
i = 0
while( i < len(key)-1 ):
    if key[i] in 'abcdefghijklmnopqrstuvwxyz{}':
        c = key[i]
        i += 1
        j = i
        while i < len(key) and key[i] in '0123456789':
            i += 1
        num = key[j:i]
        print c+':'+num
        text += c * int(num)
print text
