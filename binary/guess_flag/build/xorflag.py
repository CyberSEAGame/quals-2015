#!/usr/bin/env python
import sys
flag = open(sys.argv[1]).read() + '\0'
print ', '.join('0x%02x'%(ord(c) ^ 0xff) for c in flag)
