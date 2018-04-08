import taters.locations
import re

def ignore( files ):
    for f in files:
        if re.match( '(tato\.py.?|locations\.py(.?|\.example)|\.git.*)', f.name ):
            continue

        yield f

def build( files ):
    for f in files:
        yield f
