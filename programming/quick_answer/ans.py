import socket

s = socket.socket();

port = 7777
host = "localhost"

s.connect((host, port))
v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

v = eval(s.recv(1024))
print v
s.send(str(v)+"\n")

print s.recv(1024)


