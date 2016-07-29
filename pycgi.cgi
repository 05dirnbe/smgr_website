#!C:/Users/prei/AppData/Local/Programs/Python/Python35/python.exe

import sys, cgi, zipfile, os, io
import cgi
from array import array

#print ("Content-Type: text/html")
#print
#print ("""
#    <TITLE>CGI script ! Python</TITLE>
#    <H1>This is my first CGI script</H1>
#    Hello, world!
#""")

import sys
from gzip import GzipFile


   
try: # Windows only
 import msvcrt
 msvcrt.setmode(sys.stdout.fileno(), os.O_BINARY)
except ImportError: pass

HEADERS = '\r\n'.join(
 [
     "Content-type: %s;",
     "Content-Disposition: attachment; filename=%s",
     "Content-Title: %s",
     "\r\n",
     ]
 )

if __name__ == '__main__':
    arguments = cgi.FieldStorage()
    paths = arguments['paths'].value

    paths = paths.split(',')
  
    os.chdir(r'C:\xampp\htdocs\smgr_website')

    
    b = io.BytesIO()
    z = zipfile.ZipFile(b, 'w', zipfile.ZIP_STORED, allowZip64=True)
    for n in paths:
     z.write(n, n)

    z.close()

    length = b.tell()
    b.seek(0)
    sys.stdout.write(
     HEADERS % ('application/zip', 'download.zip', 'download.zip')
    )
    sys.stdout.flush()
    sys.stdout.buffer.write(b.read())
    b.close()
