all: ../guess

../guess: guess.o
	gcc guess.c -o ../guess 

guess.o: flag.data

flag.data: xorflag.py ../flag.txt
	python xorflag.py ../flag.txt > flag.data
