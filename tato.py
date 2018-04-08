import taters.locations
import re

def ignore( files ):
    for f in files:
        if re.match( '(tater\.py.?|locations\.py(.?|\.example))', f.name ):
            continue

        yield f

def build( files ):
    for f in files:
        yield f
