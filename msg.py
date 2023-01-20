import pywhatkit as pwk
import sys
num=sys.argv[1]
msg=sys.argv[2]
pwk.sendwhatmsg_instantly(num, msg, 30, tab_close=True)